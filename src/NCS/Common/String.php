<?php
/**
 * Classe responsavel pela manipulação de strings
 * 
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */

namespace NCS\Common;

/**
 * String
 * 
 * @package    NCS
 * @subpackage NCS\Common
 */
class String {

/**
 * Constante que guarda o encode utilizado nas funções
 */
    const ENCODE = 'utf-8';

/**
 * Converte string para maiusculo
 * 
 * @param  string $string
 * @return string
 * @access public
 * @static
 */
    public static function toUpper($string) {
        return mb_strtoupper($string, self::ENCODE);
    }

/**
 * Converte string para minusculo
 * 
 * @param  string $string
 * @return string
 * @access public
 * @static
 */
    public static function toLower($string) {
        return mb_strtolower($string, self::ENCODE);
    }

/**
 * Converte apenas primeira letra da string para maiusculo
 * 
 * @param  string $string
 * @return string
 * @access public
 * @static
 */
    public static function toUpperFirst($string) {
        return ucfirst($string);
    }

/**
 * Converte apenas primeira letra da string para minusculo
 * 
 * @param  string $string
 * @return string
 * @access public
 * @static
 */
    public static function toLowerFirst($string) {
        return lcfirst($string);
    }

/**
 * Converte a primeira letra de todas as palavras para maiusculo
 * 
 * @param  string $string
 * @return string
 * @access public
 * @static
 */
    public static function toUpperWords($string) {
        return ucwords($string);
    }

}