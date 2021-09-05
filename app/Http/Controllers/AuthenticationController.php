<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    use ResponseTrait;
     /**
     * Create New User
     *
     * @param name string
     * @param email email
     * @param password password
     *
     * @return $user
     */
    public function createNewUser(CreateUserRequest $request){
        $user = User::create($request->validated());
        return $this->SuccessResponse($user);
    }

    /**
     * LogUser
     *
     * @param email email
     * @param password password
     *
     * @return $token
     */
    public function loginWIthEmail(LoginRequest $request){

        if(!Auth::attempt($request->validated())){
            return $this->ErrorResponse("Invalid Credentials");
        }
         
        $user = User::where('email', $request->email)->first();
        if(! Hash::check($request->password, $user->password, [])){
            return $this->ErrorResponse('Error In Login');
        }
        $token = $user->createToken('authToken')->plainTextToken;
        return $this->TokenResponse($token);
    }
}
