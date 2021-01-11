<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postdataModel extends Model
{
    protected $table = 'postsdata';
    public $timestamps = false;

    /**
    * INSERE UM NOVO ESTABELECIMENTO NO DASHBOARD
    *@param Request
    *@param mixed
    */
    public static function insertData($obj){
        
        $whatsAppLink = null;
        if ($obj->WhatsApp != null){
            $whatsAppLink ="https://api.whatsapp.com/send?1=pt_BR&phone=55";
        }
        
       postdataModel::insert(['UserID'=>$obj->email, 'Ramo'=>$obj->Ramo, 'Nome'=>$obj->nomeEstabelecimento,
       'Descricao'=>$obj->Descricao, 'Estado'=>$obj->Estado, 'Cidade'=>$obj->Cidade, 'Contato'=>$obj->Contato , 
       'Instagram'=>$obj->Instagram, 'Facebook'=>$obj->Facebook,'WhatsApp'=>$whatsAppLink.$obj->WhatsApp]);
    }

    

   
}
