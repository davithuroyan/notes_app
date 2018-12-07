<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 04-Dec-18
 * Time: 3:27 PM
 */

namespace App\Http\Controllers;


use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function authenticate(Request $request)
    {
        $user = $this->userService->getByEmail($request);

        if ($user && Hash::check($request->input('password'), $user->password)) {

            $apiKey = base64_encode(str_random(40));
            $user->update(['api_key' => "$apiKey"]);

            return response()->json(['status' => 'success', 'api_key' => $apiKey]);
        } else {
            return response()->json(['status' => 'fail'], 401);
        }
    }
}