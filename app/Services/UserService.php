<?php
/**
 * Created by PhpStorm.
 * User: davit
 * Date: 07-Dec-18
 * Time: 1:54 PM
 */

namespace App\Services;

use App\Repositories\RepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserService implements ServiceInterface
{
    protected $user;

    public function __construct(RepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return User
     */
    public function getByEmail(Request $request): User
    {
        $validator = Validator::make($request->all(), [
            "email" => 'required',
            "password" => 'required',
        ]);

        if ($validator->fails()) {
            throw  new Exception($validator->errors());
        }

        $email = $request->input('email');
        return $this->user->getByEmail($email);
    }
}