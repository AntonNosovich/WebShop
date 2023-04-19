<?php

namespace App\Http\Controllers\Frontend\Auth;


use App\Admin\Actions\ClientMenuAction;
use App\Http\Controllers\Frontend\Requests\LoginRequest;
use App\Http\Controllers\Frontend\Requests\RegisterRequest;
use App\Models\Product;
use App\Models\User;
//use Illuminate\Http\Request;//Откатил назад
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller

{
    use AuthenticatesUsers;

    public function login()
    {

        return view('frontend.auth.login');
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function home()
    {
        return view('frontend.auth.auntificate');
    }

    public function postLogin(LoginRequest $request)
    {
        $formFields = $request->only(['email','password']);
        $remember = $request->input(['remember_me']);//?!

        if (Auth::attempt($formFields,$remember)) {
            /** @var User $user */
            $user = Auth::user();

            if ($user->hasAnyRole('super-manager','manager')){
                return redirect(route('users.create'));
            }

            return redirect()->intended('home');
        }

        return redirect(route('login'))->withErrors([
            'email'=>'Error password or email'
        ]);
    }
    public function postLogout()
    {
        $product = Product::all();
        dd($product[0]->tools->toArray());
        Auth::logout();

        return redirect('login');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $user->assignRole('user');

        if ($user) {
            auth('web')->login($user);
        }

        return redirect(route('home'));
    }
}

