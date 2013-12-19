<?php 
/**
 * Recebe todas as requisições e inicializa o bootstrap
 * 
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */

define('ROOT', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

//oi

/**
 * Inicializa Core
 */
require_once ROOT . DS . 'src'. DS . 'bootstrap.php';


include WEB . DS . 'webroot.php';

/*

$database = \NCS\Config\DataBase::getInstance();
echo $database->connections['default'];

\ActiveRecord\Config::initialize(function($cfg) use ($database) {
    $cfg->set_model_directory(ROOT);
    $cfg->set_connections($database->connections);
});

use \App\Admin\Model\User;
$users = User::find('all');
var_dump($users);
*/
