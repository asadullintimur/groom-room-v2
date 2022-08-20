<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->merge(["password" => bcrypt($request->password)])
            ->except("agreement", "password_repeat");

        $user = User::create($data);
        auth()->login($user);

        return redirect()->route("profile");
    }

    public function login(Request $request)
    {
        if (auth()->attempt($request->except("_token"))) {
            return redirect()->route("profile");
        } else {
            return back()
                ->withInput()
                ->withErrors(["login" => "login or password invalid"], "login");
        }
    }

    public function logout() {
        auth()->logout();
        return redirect()->route("home");
    }
}
