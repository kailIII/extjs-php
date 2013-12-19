<?php
/**
 * Classe responsavel por manipular instruções Json
 * 
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */

namespace NCS\Common;

/**
 * Json
 * 
 * @package    NCS
 * @subpackage NCS\Common
 */
class Json {

/**
 * Transforma um array em instrução Json
 * 
 * @param  array $array
 * @return json
 */
    public static function encode($array) {
        return json_encode($array);
    }

/**
 * Transforma instruçaõ Json em array ou objeto
 * 
 * @param  string  $string
 * @param  boolean $returnArray
 * @return mixed
 */
    public static function decode($string, $returnArray = false) {
        return json_decode($string, $returnArray);
    }

}