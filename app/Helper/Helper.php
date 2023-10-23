<?php

namespace App\Helper;

use App\Helper\Interface\HelperInterface;
use Illuminate\Support\Facades\Crypt;

class Helper implements HelperInterface
{
    public static function encryptFile($file)
    {
        return Crypt::encrypt($file);
    }

    public static function decryptFile($file)
    {
        return Crypt::decrypt($file);
    }
}
