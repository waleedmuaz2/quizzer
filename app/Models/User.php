<?php

namespace App\Models;

use App\Models\UserBoatSkinPivot;
use Faker\Factory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Friends;
class User extends Authenticatable implements JWTSubject
{
    use HasRoles;

    protected $appends = ['total_play_games','total_play_game_scores'] ;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'name',
        'email_verified_at',
        'password',
    ];

    use Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function userObj($user){
        return $data = [
            'id'=>$user->id,
            'email'=>    (!empty($user->email)?$user->email:""),
            'created_at'=>$user->created_at,
            'updated_at'=>$user->updated_at,
        ];
    }
}
