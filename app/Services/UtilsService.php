<?php

namespace App\Services;

class UtilsService {

    /**
     * Formata um valor string do tipo moeda para float de modo a ser persistido no banco de dados.
     *
     * @param  string  $valor
     * @return float
     */
    public static function converterMoedaParaFloat(string $valor){
        $val = str_replace(",",".",$valor);
        $val = preg_replace('/\.(?=.*\.)/', '', $val);
        return floatval($val);
    }

}
