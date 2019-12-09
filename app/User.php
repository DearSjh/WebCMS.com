<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;


    public function add(array $data)
    {
        $user = new User();
        $user->user_name = $data['user_name'];
        $user->mobile = $data['mobile'];
        $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
        $user->status = $data['status'];
        $user->channel_sn = $data['channel_sn'];
        $user->game_id = $data['game_id'];
        $user->save();
        return $user;
    }

    public static function edit(User $user, array $data)
    {

        !empty($data['user_name']) && $user->user_name = $data['user_name'];
        !empty($data['mobile']) && $user->mobile = $data['mobile'];
        !empty($data['password']) && $user->password = password_hash($data['password'], PASSWORD_BCRYPT);
        !empty($data['status']) && $user->status = $data['status'];
        !empty($data['channel_sn']) && $user->channel_sn = $data['channel_sn'];
        !empty($data['game_id']) && $user->game_id = $data['game_id'];

        return $user->update();
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
