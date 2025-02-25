<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'number'=>['required', 'numeric', 'digits_between:1,15'],
            'image'=>['required','image'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'number'=>$request->number,
            //'image'=>$request->file('image')->store('images','public'),
            'image' => $request->hasFile('image') ? $request->file('image')->store('images', 'public') : null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    // public function destroy(){
    //     $user=Auth::users();
    //     if ($user) {
    //         $user->delete(); // Supprimer l'utilisateur
    //         Auth::logout();
    //         return redirect('/')->with('success', 'Votre compte a été supprimé avec succès.');
    //         // return redirect()->route('welcome');
    //     };
    // }
}
