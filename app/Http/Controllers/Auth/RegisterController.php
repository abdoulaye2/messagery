<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserIdRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::UTILISATEUR;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:50'],
            'prenom' => ['required', 'string', 'max:50'],
            'telephone' => ['required', 'integer', 'digits_between:0,20'],
            'email' => ['nullable', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
            'isAdmin' => $data['role'],
            'bloquer' => 0,
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function update(UserRequest $request)
    {
        User::where('id', $request->id)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'telephone' => $request->telephone,
            'isAdmin' => $request->role,
            'email' => $request->email,
        ]);

        $request->session()->flash('success', 'Ce profile a bien été mise à jour.');

        return redirect('/gestion-des-utilisateurs');
    }

    protected function bloquer(UserIdRequest $request)
    {
        $id = intval($request->id);

        $veri = User::where('id', $id)->exists();

        if ($veri) 
        {
            $val = 1;

            User::where('id', $id)->update(['bloquer'=>$val]);

            $request->session()->flash('success', 'Ce compte utilisateur est bloqué.');

            return redirect('/gestion-des-utilisateurs');
        }
        else
        {
            $request->session('error', 'Ce compte utilisateur n\'existe pas');

            return redirect('/gestion-des-utilisateurs');
        }
    }

    protected function debloquer(UserIdRequest $request)
    {
        $id = intval($request->id);

        $veri = User::where('id', $id)->exists();

        if ($veri) 
        {
            $val = 0;

            User::where('id', $id)->update(['bloquer'=>$val]);

            $request->session()->flash('success', 'Ce compte utilisateur est débloquer.');

            return redirect('/gestion-des-utilisateurs');
        }
        else
        {
            $request->session('error', 'Ce compte utilisateur n\'existe pas');

            return redirect('/gestion-des-utilisateurs');
        }
    }
}
