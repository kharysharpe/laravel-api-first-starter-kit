<?php namespace App\Transformers;


use App\User;
use League\Fractal\TransformerAbstract;


class UsersTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'        => (int) $user->id,
            'name'      => $user->name,
            'email'     => $user->email,
        ];
    }
}