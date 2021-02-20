<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Hutils;

class postdataModel extends Model
{
    protected $table = 'postsdata';
    public $timestamps = false;

    /**
    * INSERE UM NOVO ESTABELECIMENTO NO DASHBOARD
    *@param Request
    *@param mixed
    */
    public static function insertData($obj)
    {
       $whatsAppLink = Hutils::createWhatsAppLink($obj->WhatsApp);
       
       postdataModel::insert(['UserID'=>$obj->email, 'Ramo'=>$obj->Ramo, 'Nome'=>$obj->nomeEstabelecimento,
       'Descricao'=>$obj->Descricao, 'Estado'=>$obj->Estado, 'Cidade'=>$obj->Cidade, 'Contato'=>$obj->Contato , 
       'Instagram'=>$obj->Instagram, 'Facebook'=>$obj->Facebook,'WhatsApp'=>$whatsAppLink]);
    }

    public static function updateData($businessData)
    {
        foreach ($businessData->except('business') as $key => $value){
            postdataModel::where('ID','=',$businessData->business)->update([
                $key => $value
            ]);
        }
    }

    public static function deleteUserPosts($userEmail)
    {   
        postdataModel::where('UserID','=',$userEmail)->delete();
    }
}
