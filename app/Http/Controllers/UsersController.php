<?php namespace App\Http\Controllers;

use App\Transformers\UsersTransformer;
use App\User;
use Dingo\Api\Http\Request;
use Dingo\Api\Routing\Helpers;


class UsersController extends Controller
{
    use Helpers;

    function index ()
    {
        $users = User::all();

        return $this->response->collection($users, new UsersTransformer());
    }

    function store(Request $request)
    {
        $input = $request->all();

        $user = User::Create($input);

        if ($user) {

            $response = $this->response->array($user);

            return $response->setStatusCode(201);

        }

        return $this->response->errorBadRequest();
    }

}
