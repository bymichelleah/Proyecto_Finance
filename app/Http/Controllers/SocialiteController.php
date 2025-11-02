<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error al iniciar sesión con ' . ucfirst($provider));
        }

        // Buscar o crear usuario
        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'password' => bcrypt(str()->random(12)), // ← genera una contraseña aleatoria
            ]
        );


        Auth::login($user, true);

        return redirect('/productos');
    }
    public function destroy(Request $request)
{
    Auth::logout(); // Cierra la sesión del usuario autenticado
    $request->session()->invalidate(); // Invalida la sesión
    $request->session()->regenerateToken(); // Regenera el token CSRF

    return redirect('/login'); // Redirige al login
}

}

