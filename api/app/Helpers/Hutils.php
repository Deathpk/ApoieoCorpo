<?php

namespace App\Helpers;

class Hutils{
    public static function makeResponse($message, $error = null, $object = null) {
        return ['error' => $error, 'message' => $message, 'object' => $object];
    }

    public static function createWhatsAppLink($whatsAppNumber)
    {
        if ($whatsAppNumber != null){
            return "https://api.whatsapp.com/send?1=pt_BR&phone=55".$whatsAppNumber;
        }
        return null;
    }

    // public static function validateEmaillenght($email)
    // {

    // }
}