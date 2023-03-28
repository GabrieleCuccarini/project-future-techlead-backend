<!-- 

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        dd($user);
        if (!$user || !$user->admin) {
            // Se l'utente non è autenticato o non è un amministratore, reindirizza alla pagina di login o a una pagina di errore
            return redirect()->route('login');
        }

        // Se l'utente è autenticato e ha il ruolo di amministratore, continua con la richiesta
        return $next($request);
    }
} -->
