<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 04-Dec-18
 * Time: 3:27 PM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            "email" => 'required',
            "password" => 'required',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (Hash::check($request->input('password'), $user->password)) {

            $apikey = base64_encode(str_random(40));

            User::where('email', $request->input('email'))->update(['api_key' => "$apikey"]);;

            return response()->json(['status' => 'success', 'api_key' => $apikey]);

        } else {

            return response()->json(['status' => 'fail'], 401);

        }
    }
}