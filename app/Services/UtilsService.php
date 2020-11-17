<?php

namespace App\Services;

class UtilsService {

    /**
     * Formata um valor string do tipo moeda para float.
     *
     * @param  string  $valor
     * @return float
     */
    public static function converterMoneyToFloat(string $valor){
        $val = str_replace(",",".",$valor);
        $val = preg_replace('/\.(?=.*\.)/', '', $val);
        return floatval($val);
    }

}
