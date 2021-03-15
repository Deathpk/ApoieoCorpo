<?php

namespace App\Models;

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

    public static function getUsersCounter()
    {
        return userModel::all()->count();
    }

    public static function updateUserInformation($userInformation)
    {
        foreach ($userInformation->except('id') as $key => $value){
            userModel::where('id','=',$userInformation['id']->id)->update([
                $key => $value
            ]);
        }
    }

    public static function deleteUserAccount($accountId)
    {
        userModel::where('id','=',$accountId)->delete();
    }

}
