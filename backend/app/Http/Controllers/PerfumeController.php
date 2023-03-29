<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use App\Models\User;
use App\Http\Requests\StorePerfumeRequest;
use App\Http\Requests\UpdatePerfumeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use App\Functions\Helpers;

// ROTTE ADMIN IN QUESTO CONTROLLER 
class PerfumeController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $user = Auth::user();
            $perfumes = Perfume::all();
            // dd($perfumes);
            return view('perfumes.index', compact('perfumes'));
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $user = Auth::user();
            if ($user->isAdmin == 0) {
                abort(403);
            }

            return view('perfumes.create');
        }
    
        /**
         * Store a newly created resource in storage.
         */
        public function store(StorePerfumeRequest $request)
        {
            $user = Auth::user();
            if ($user->isAdmin == 0) {
                abort(403);
            }
            $data = $request->validated();
            
            // SET UP DI SLUG E PATH 
            $slug = Perfume::getSlug($request->name);
            $path = Storage::put("perfume", $data["cover_img"]);
            // $perfume->fill($data);
            if (!isset($data["show"])) {
                $data['show']=0;
            }
            // $data["cover_img"] = $path;
            // $data["restaurant_id"] = $user->id;
            
            $perfume = new Perfume;
            $perfume->cover_img = $path;
            $perfume->name = $data['name'];
            $perfume->slug =  $slug;
            $perfume->brand = $data['brand'];
            $perfume->quantity = $data['quantity'];
            $perfume->price = $data['price'];
            $perfume->show = $data['show'];
            // dd($perfume);
            $perfume->save();

            return redirect()->route("perfumes.show", compact('slug'));
        }
    
        /**
         * Display the specified resource.
         */
        public function show($slug)
        {
            $user = Auth::user();
            if ($user->isAdmin == 0) {
                abort(403);
            }

            $perfume_array = Perfume::where('slug', $slug)->get();
            $perfume = $perfume_array[0];

            // dd($perfume); 
            
            return view('perfumes.show',compact('perfume')); 
        }
    
        /**
         * Show the form for editing the specified resource.
         */
        public function edit($slug)
        {
            $user = Auth::user();
            if ($user->isAdmin == 0) {
                abort(403);
            }

            $perfume_array = Perfume::where('slug', $slug)->get();
            $perfume = $perfume_array[0];

            
            return view('perfumes.edit',compact('perfume'));
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(UpdatePerfumeRequest $request, $slug)
        {
            $user = Auth::user();
            if ($user->isAdmin == 0) {
                abort(403);
            }

            $data = $request->validated();
            $slug = Perfume::getSlug($request->name);
            $perfume_array = Perfume::where('slug', $slug)->get();
            $perfume = $perfume_array[0];
            
            if (!isset($data["show"])) {
                $perfume['show']=0;
            } else {
                $perfume['show']=1;
            }
            
            if ($request->has('cover_img')) {
                // Salva il percorso della nuova immagine
                $newCoverImgPath = $request->file('cover_img')->store('perfume');
                
                // Cancella l'immagine precedente (se presente)
                if ($perfume->cover_img) {
                    Storage::disk('public')->delete($perfume->cover_img);
                }
                
                // Aggiorna il valore della chiave "cover_img" con il nuovo percorso
                $perfume->update(['cover_img' => $newCoverImgPath]);
            }
            
            $perfume->update(['name' => $request['name']]);
            $perfume->update(['brand' => $request['brand']]);
            $perfume->update(['quantity' => $request['quantity']]);
            $perfume->update(['price' => $request['price']]);
            // dd($perfume, $data);

            return redirect()->route("perfumes.show", compact('slug'));
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy($slug)
            {
                $user = Auth::user();
                if ($user->isAdmin == 0) {
                    abort(403);
                }

                $perfume_array = Perfume::where('slug', $slug)->get(); 
                $perfume = $perfume_array[0];           
                
                if ($perfume->cover_img) {
                    Storage::delete($perfume->cover_img);
                }
                
                $perfume->delete();
                // dd($perfume);
        
                return redirect()->route("perfumes.index");
            }
    };
