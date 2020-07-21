<?php

namespace Iziedev\Iziecode\App\Helpers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Iziedev\Iziecode\App\Models\Menu;

class AppHelper
{
    /**
     *@example : GlobalHelper::selected($var1,$var2)
     *@retrun : boolean
     */
    public static function selected($var1, $var2)
    {
        if ($var1 == $var2) {
            return 'selected';
        }
    }

    public static function IdEncryptor($id, $action)
    {
        $response = false;

        $encrypt_method = "AES-256-CBC";
        //key
        $secret_key = 'balilove';
        $secret_iv = 'lovebali';

        // hash
        $key = hash('sha256', $secret_key);

        // iv - encrypt method AES-256-CBC expects 16 bytes
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        if ($action == 'encrypt') {
            $response = openssl_encrypt($id, $encrypt_method, $key, 0, $iv);
            $response = base64_encode($response);
        } else if ($action == 'decrypt') {
            $response = openssl_decrypt(base64_decode($id), $encrypt_method, $key, 0, $iv);
        }

        return $response;
    }


    /**
     *@example : GlobalHelper::selected($sting,$var2)
     *@retrun : boolean
     *@param 1 : string explode to array
     *@param 2 : string
     */
    public static function selected_array($var1, $var2, $object = false)
    {
        // $var1 = (array) $var1;
        foreach ($var1 as $key => $value) {
            if ($object == false) {
                if ($value == $var2) {
                    return 'selected';
                }
            } else {
                if ($value->$object == $var2) {
                    return 'selected';
                }
            }
        }
    }
    

    public static function access($role)
    {
        $condition = false;
        foreach ($role as $key => $value) {
            if (Auth::guard('admin')->user()->role == $value) {
                $condition = true;
            }
        }
        return $condition;
    }


    
}
