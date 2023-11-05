<?php

namespace App\Http\Controllers;

 use App\Models\User;
 use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Création d'un nouvel utilisateur
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Inscription réussie ! Vous pouvez maintenant vous connecter.');
    }

    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion de l'utilisateur
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentification réussie
            return redirect('/index')->with('success', 'Connexion réussie !');
        } else {
            // Authentification échouée
            return redirect()->back()->with('error', 'Identifiants invalides. Veuillez réessayer.');
        }
    }
}
