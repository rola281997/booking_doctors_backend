<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Admins\AdminLoginRequest;
use App\Repositories\Admins\AdminRepository;
use App\Services\Auth\AuthService;
use App\Transformers\Admins\AdminLoginResource;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthController extends BaseController
{
    use ResponseHelper;
    protected $authService;
    protected $guard = 'admin';
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login(AdminLoginRequest $request)
    {
        try {
            $user = $this->authService->login($request->only('username', 'password'), $this->guard, App::make(AdminRepository::class), 'username');
            return (!$user)
            ? $this->error(Response::HTTP_UNPROCESSABLE_ENTITY, false, 'Wrong username or password', 'Wrong username or password')
            : $this->apiJson(Response::HTTP_OK, true, AdminLoginResource::make($user), 'Success');
        } catch (Exception $e) {
            return $this->error(Response::HTTP_BAD_REQUEST, false, 'Something is wrong', 'Something is wrong');
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->authService->logout($request);
            return $this->apiJson(Response::HTTP_OK, true, 'Success', 'Success');

        } catch (Exception $e) {
            return $this->error(Response::HTTP_BAD_REQUEST, false, 'Something is wrong', 'Something is wrong');
        }
    }
}
