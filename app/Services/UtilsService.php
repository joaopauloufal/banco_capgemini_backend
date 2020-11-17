<?php

namespace App\Services;

class UtilsService {

    public static function converterMoneyToFloat($valor){
        $val = str_replace(",",".",$valor);
        $val = preg_replace('/\.(?=.*\.)/', '', $val);
        return floatval($val);
    }

}
