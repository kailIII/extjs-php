<?php
/**
 * Bootstrap do NCS
 * Define todas as constantes necessárias e inicia autoload
 *
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */

ini_set('display_errors', 1);

if (!defined('DS'))
    define('DS', DIRECTORY_SEPARATOR);

/**
 * Diretórios
 */
if (!defined('ROOT'))
    define('ROOT', dirname(dirname(__FILE__)));
if (!defined('APP'))
    define('APP', ROOT . DS . 'app');
if (!defined('CONFIG'))
    define('CONFIG', ROOT . DS . 'config');

/**
 * Diretório do NCS
 */
if (!defined('SRC'))
    define('SRC', ROOT . DS . 'src');
if (!defined('CORE'))
    define('NCS', SRC . DS . 'NCS');
if (!defined('MODULE'))
    define('MODULE', SRC . DS . 'Module');

/**
 * Diretório dos componentes externos
 */
if (!defined('LIB'))
    define('LIB', ROOT . DS . 'lib');
if (!defined('VENDOR'))
    define('VENDOR', LIB . DS . 'vendor');

/**
 * Diretório www
 */
if (!defined('WEB'))
    define('WEB', ROOT . DS . 'web');


/*
 * Inicializa funções de AutoLoad
 */
require_once SRC . DS . 'autoload.php';
