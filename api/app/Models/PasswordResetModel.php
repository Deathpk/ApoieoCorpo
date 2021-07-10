<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PasswordResetModel extends Model
{
    protected $table = 'password_resets';
    public $timestamps = true;
    protected $fillable = ['email','token'];

    public static function storePasswordResetInfo (string $email): void
    {
        $token = Str::random(60);
        try {
            PasswordResetModel::create([
                'email' => $email,
                'token' => $token
            ]);
        } catch(\Exception $e){
            throw new \Exception(
                'Falha ao criar token para reset de senha. msg: '
                .$e->getMessage()
            );
        }
    }

    public static function getResetInfo(string $email): self
    {
        return PasswordResetModel::where('email', $email)->first();
    }

}
