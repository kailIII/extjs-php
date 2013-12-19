<?php
/**
 * Pardão Singleton (Desing Patterns)
 *
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */

namespace NCS\Common;

/**
 * Singleton
 * 
 * @package    NCS
 * @subpackage NCS\Common
 */
abstract class Singleton {

/**
 * Guarda todos os objetos instanciados
 *
 * @var array
 * @access private
 * @static
 */
    private static $__instances = array();

/**
 * Inicia a instancia de um objeto
 *
 * @access public
 * @return object
 * @static
 * @final
 */
    final public static function getInstance() {
        $className = get_called_class(); // __CLASS__
        if (!isset(self::$__instances[$className])) {
            self::$__instances[$className] = new $className;
        }
        return self::$__instances[$className];
    }

/**
 * Objetos Singleton não podem ser clonados
 *
 * @access private
 * @return void
 */
    final private function __clone() {

    }

}