<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class userModel extends Model
{
    protected $table = 'users';
    public $timestamps = false;


    public static function getUserId()
    {
       return userModel::where('email','=', Auth::user()->email)->first('id');
    }



    public static function getUserName()
    {
       return userModel::where('email','=', Auth::user()->email)->first('name');
    }

    public static function getUsersCounter()
    {
        return userModel::all()->count();
    }

    public static function updateUserInformation($userInformation): void
    {
        foreach ($userInformation->except('id') as $key => $value){
            userModel::where('id','=',$userInformation['id']->id)->update([
                $key => $value
            ]);
        }
    }

    public static function updatePassword(User $user, string $newPassword): void
    {
        userModel::where('email',$user->email)->update([
            'password' => bcrypt($newPassword)
        ]);
    }

    public static function deleteUserAccount($accountId): void
    {
        userModel::where('id','=',$accountId)->delete();
    }

}
