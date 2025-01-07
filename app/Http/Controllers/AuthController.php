<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            if ($request->validated()) {
                $user = $this->userService->registerUser($request->input());
                $token = $user->createToken('authToken');

                return response()->json([
                    'data' => new UserResource($user),
                    'token' => $token->plainTextToken
                ], 201);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json([
            'error' => 'ошибка валидации'
        ]);
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $user = $this->userService->authenticateUser($request->validated());

            if (!$user) {
                return response()->json(['error' => 'Ошибка авторизации'], 401);
            }

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'data' => new UserResource($user),
                'token' => $token
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->userService->logoutUser($request->user());
            return response()->json(['message' => 'Вы вышли из системы']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
