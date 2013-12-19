<?php
/**
 * Classe responsavel pelo lazyload de todas as classes do Core
 *
 * Esta classe segue o padrão PSR-0 para autoloading
 * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 * 
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */

namespace NCS\Loader;

/**
 * AutoLoad
 * 
 * @package    NCS
 * @subpackage NCS\Loader
 * @uses       NCS\Loader\ExtNSLoad
 */
class AutoLoad {

/**
 * Armazena lista de namespace x path
 * 
 * @var array
 * @access private
 * @static
 */
    private static $__namespace = array();

/**
 * Registra a classe como loader
 * 
 * @return bollean
 * @access public
 * @static
 */
    public static function register() {
        return spl_autoload_register(array(__CLASS__, 'load'));
    }

/**
 * Remove registro da classe como loader
 * 
 * @return bollean
 * @access public
 * @static
 */
    public static function unregister() {
        return spl_autoload_unregister(array(__CLASS__, 'load'));
    }

/**
 * Adiciona instrução namespace x path para o loader
 * 
 * @param string $namespace Nome do Namespace
 * @param string $path      Diretório para load
 * @access public
 * @static
 */
    public static function addPath($namespace, $path) {
        self::$__namespace[$namespace] = $path;
    }

/**
 * Retorna o path base para o namespace
 * 
 * @param  array $prefix Namespace completo em array
 * @return string
 * @access protected
 * @static
 */
    protected static function _findPath($prefix) {
       return (array_key_exists($prefix[0], self::$__namespace))
            ? self::$__namespace[$prefix[0]] . DS
            : ROOT . DS;
    }


/**
 * Função que carrega as classes de forma lazyload
 * 
 * @param  string $className
 * @return string
 * @access public
 * @static
 */
    public static function load($className) {

        /**
         * Para o namespace ExtJS
         */
        if (\NCS\Loader\ExtNSLoad::isExtNS($className)) {
            return \NCS\Loader\ExtNSLoad::load($className);
        }
            
        /**
         * AutoLoad no padrão PSR-0
         */
        $className = ltrim($className, '\\');
        if ($lastNsPos = strripos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
        } 
        $fileName = self::_findPath(explode('\\', $namespace))
                  . DS
                  . str_replace('\\', DS, $namespace)
                  . DS
                  . str_replace('_', DS, $className)
                  . '.php';
        return include $fileName;
    }

}

/**
 * Classe responsavel pelo lazyload de todas as classes
 * na convenção do ExtJS
 * 
 * @package    NCS
 * @subpackage NCS\Loader
 * @uses       NCS\Common\String
 */
class ExtNSLoad {

/**
 * Por convenção, todos os namespace no PHP devem começar com a primeira
 * letra maiuscula, diferente do ExtJS onde apenas o primeiro diretório e
 * o arquivo seguem este padrão.
 * 
 * Defina nesta constante qual o primeiro diretório da aplicação no padrão
 * namespace do PHP, assim, realizará a tradução correta dos diretórios.
 */
    const EXT_NAMESPACE = 'App';

/**
 * Verifica se a classe informada esta alocada em um namespace ExtJS
 * 
 * @param  string  $className
 * @return boolean
 * @access public
 * @static
 */
    public static function isExtNS($className) {
        if (substr($className, 0, strLen(self::EXT_NAMESPACE)) == self::EXT_NAMESPACE)
            return true;
        else
            return false;
    }

/**
 * Função que carrega as classes no namespace ExtJS
 * 
 * @param  string $className
 * @return string
 * @access public
 * @static
 */
    public static function load($className) {
        $className = \NCS\Common\String::toLower($className);
        $parts = explode('\\', $className);
        $parts[Count($parts) - 1] = \NCS\Common\String::toUpperFirst($parts[Count($parts) - 1]);
        $filename = ROOT
                  . DS
                  . implode(DS, $parts)
                  . '.php';
        return include $filename;
    }

}
