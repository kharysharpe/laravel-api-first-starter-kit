<?php namespace App\Http\Controllers;

use App\Transformers\UsersTransformer;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Log;


class SessionsController extends Controller
{
    use Helpers;

    /**
     * Returns the authenticated user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function index()
    {

        if (!$user = $this->auth->getUser()) {
            $this->response->errorNotFound();
        }

        return $this->response->item($user, new UsersTransformer());

    }

    /**
     *  API Login, on success return JWT Auth token
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    function store(Request $request)
    {

        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->response->array(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return $this->response->array(['error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        return $this->response->array(['token' => $token]);
    }

    /**
     * Refresh the token
     *
     * @return mixed
     */
    function update()
    {

        $token = JWTAuth::getToken();

        if (!$token) {
            $this->response->errorMethodNotAllowed('Token not provided');
        }

        try {
            $refreshedToken = JWTAuth::refresh($token);
        }
        catch (JWTException $e)
        {
            $this->response->errorInternal('Not able to refresh Token');
        }

        return $this->response->array(['token' => $refreshedToken]);

    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $token = JWTAuth::getToken();

        if (!$token) {
            $this->response->errorMethodNotAllowed('Token not provided');
        }

        JWTAuth::invalidate($token);

        return $this->response->array(['token' => 'Token destroyed']);

    }

}
