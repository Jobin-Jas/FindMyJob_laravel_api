<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * create a user profile
     */
    public function create(CreateProfileRequest $request){

        $profile = auth()->user()->profile()->create($request->validated());
        return $this->SuccessResponse($profile);

    }
     /**
      *  view my Profile 
      */
      public function show(){
          $data = auth()->user()->with('profile')->first();
          return $this->SuccessResponse($data);
      }
      /*
       * update my profile info
       * 
       */
      public function update(CreateProfileRequest $request){
        $result = auth()->user()->profile()->update($request->validated());
        if(!$request){
            return $this->ErrorResponse('cant update user profile at the moment', 401);
        }
        return $this->SuccessResponse('Successfully Updated');
      }
}
