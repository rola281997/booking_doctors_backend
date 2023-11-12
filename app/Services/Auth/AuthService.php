<?php 

namespace App\Services\Auth;

use Illuminate\Support\Facades\Hash;
class AuthService
{

    public function __constract(){

    }
   
    public function login(array $request,object $typeRepository,string $column): ?object
    {
        $user = $typeRepository->findWhere([$column => $request[$column]])->first();
        if($user&&Hash::check($request['password'],$user->password)){
            $user->token = $user->createToken(uniqid())->plainTextToken; 
            return $user; 
        }
        return null; 
      
    }

    public function logout(object $request) :?bool
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
