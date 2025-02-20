<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    /**
     * Muestra la vista del formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('auth.signin');
    }


    /**
     * Autentica al usuario a partir de las credenciales proporcionada
     * s y gestiona la redirección según el tipo de usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if (!auth()->attempt($request->only('email', 'password'))) {
                throw new \Exception('El correo electrónico o la contraseña son incorrectos. Por favor, inténtalo de nuevo.');
            }

            $user = auth()->user();
            Log::info('Usuario Logeado: ' . $user->email);
            return redirect()->to('/');
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error de autenticación: ' . $e->getMessage());
            return back()->withErrors(['message' => $e->getMessage()]);
        }
    }
    /**
     * Cierra la sesión del usuario autenticado.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {

        auth()->logout();

        return redirect()->to('/login');
    }
}
