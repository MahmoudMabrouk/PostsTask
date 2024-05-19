<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Domain\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Api\RegisterRequest;
use App\Traits\ApiResponder;

class AuthController extends Controller
{

    use ApiResponder;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('auth:api', ['only' => ['logout', 'refresh']]);
        $this->userService = $userService;
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->userService->createUser($request->all());

            if (!$user){
                throw new Exception('User creation failed');
            }
            $credentials = request(['email', 'password']);
            if (! $token = auth('api')->attempt($credentials)) {
                 return $this->errorResponse('Unauthorized',401);
            }
            $responseData = $this->respondWithToken($token);
            DB::commit();
            return $responseData;
        } catch (Exception $e) {
            DB::rollBack();
             return $this->errorResponse(trans('something_went_wrong'),400);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            if (! $token = auth('api')->attempt($credentials)) {
                 return $this->errorResponse('Unauthorized',401);
            }
            return $this->respondWithToken($token);
        } catch (Exception $e) {
            return $this->errorResponse(trans('something_went_wrong'),400);
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
//    public function logout()
//    {
//        auth()->logout();
//        return $this->successResponse('Successfully logged out');
//    }

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
//    public function refresh()
//    {
//        return $this->respondWithToken(auth()->refresh());
//    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken($token)
    {
        return $this->validResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => new UserResource(auth('api')->user()),
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function profile()
    {
        return $this->successResponse('Success', new UserResource(auth('api')->user()));
    }

}
