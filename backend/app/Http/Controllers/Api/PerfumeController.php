<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PerfumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfumes = Perfume::all();
        return response()->json($perfumes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
        //     'name' => 'required|max:255|string',
        //     'cover_img' => 'required|image',
        //     'quantity' => 'required|numeric|min:0',
        //     'price' => 'required|numeric|min:0',
        //     'show' => 'nullable|boolean',
        // ]);

        // if($request->has("cover_img")){
        //     $data["cover_img"] = Storage::put("/Perfumes", $data["cover_img"]);
        // }

        // $newPerfume = Perfume::create($data);

        // return response()->json($newPerfume);
        // return redirect()->action('PerfumeController@index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perfume = Perfume::findOrFail($id);
        return response()->json($perfume);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data = $request->validate([
        //     'name' => 'required|max:255|string',
        //     'cover_img' => 'required|image',
        //     'quantity' => 'required|numeric|min:0',
        //     'price' => 'required|numeric|min:0',
        //     'show' => 'nullable|boolean',
        // ]);

        // if($request->has("cover_img")){
        //     $data["cover_img"] = Storage::put("/Perfumes", $data["cover_img"]);
        // }

        // $newPerfume = Perfume::create()->update($data);

        // return response()->json($newPerfume);
        // return redirect()->action('PerfumeController@index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $perfume = Perfume::findOrFail($id);

        // if ($perfume->cover_img) {
        //     Storage::delete($perfume->cover_img);
        // }

        // $perfume->delete();

        // return response()->json($perfume);
    }
}
