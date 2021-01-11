<?php

namespace App\Helpers;

class Hutils{
    public static function makeResponse($message, $error = null, $object = null) {
        return ['error' => $error, 'message' => $message, 'object' => $object];
    }
}