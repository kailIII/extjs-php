<?php
/**
 * Inicializa a classe \NCS\Common\AutoLoad para lazyload do Core
 * 
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */
require NCS . DS . 'Loader' . DS . 'AutoLoad.php';
use \NCS\Loader\AutoLoad;
AutoLoad::addPath('NCS', SRC);
AutoLoad::register();

/**
 * AutoLoad Composer
 */
require VENDOR . DS . 'autoload.php';


