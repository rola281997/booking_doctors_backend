<?php 

namespace App\Services\Auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use stdClass;
class AuthService
{

    public function __constract(){

    }
   
    public function login(array $request,string $guard,object $typeRepository,string $column): ?object
    {
        $user = $typeRepository->findWhere([$column => $request[$column]])->first();
        if($user&&Hash::check($request['password'],$user->password)){
            $user->token = $user->createToken(uniqid())->plainTextToken; 
            return $user; 
        }
        return null; 
      
    }

    public function logout(object $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
