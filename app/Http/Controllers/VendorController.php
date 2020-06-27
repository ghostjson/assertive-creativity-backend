<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Requests\UpdateVendor;
use App\Http\Resources\VendorResource;
use App\User;
use Exception;

class VendorController extends Controller
{
    function index(){
        $users = User::where('role','vendor')->get();
        return VendorResource::collection($users);
    }

    function show(User $user){
        if(User::isVendor($user)){
            return new VendorResource($user);
        }else{
            return response()->json(['status'=> 'not found'], 404);
        }
    }

    function update(User $user, UpdateVendor $request){
        $user = User::isVendor($user) ? $user : abort(404);
        $user->update($request->validated());
        return $user;
    }

    function store(StoreUser $request){
        return User::createVendor($request);
    }

    function delete(User $user){
        $user = User::isVendor($user) ? $user : abort(404);
        try{
            $user->delete();
        }catch (Exception $e){
                return response()->json(['status'=>'could not Delete'], 400);
        }
    }
}
