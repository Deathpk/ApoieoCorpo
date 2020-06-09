<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postdataModel extends Model
{
    //Model da table postData
    protected $table = 'postsdata';
    public $timestamps = false;

    public static function insertData($obj,$email){
       postdataModel::insert(['UserID'=>$email, 'Ramo'=>$obj->Ramo, 'Nome'=>$obj->nomeEstabelecimento,
       'Descricao'=>$obj->Descricao, 'Estado'=>$obj->Estado, 'Cidade'=>$obj->Cidade, 'Contato'=>$obj->Contato]);
    }

}
