<?php
/**
 * Classe responsavel por carregar as configurações de banco de dados
 * 
 * @author  Pedro Elsner <pedro.elsner@gmail.com>
 * @since   2.0
 * @version 2.0
 */

namespace NCS\Config;

/**
 * DataBase
 * 
 * @package    NCS
 * @subpackage NCS\Config
 * @extends    NCS\Common\Singleon
 * @uses       NCS\Common\Json
 */
class DataBase extends \NCS\Common\Singleton {

/**
 * Define o arquivo de configuração
 */
    const CONFIG_FILE = 'database.json';

/**
 * Guarda conteúdo do arquivo de configuração em array
 *
 * @var  array
 * @access private
 * @static
 */
    private $__config = array();

/**
 * Armazena lista de conexões
 * 
 * @var array
 * @access public
 * @static
 */
    public $connections = array();

/**
 * Carrega o arquivo de configuração
 * 
 * Função protected para objeto ser instanciado somente
 * pela função getInstance()
 * 
 * @see NCS/Common/Singleton
 * 
 * @access protected
 * @static
 */
    protected function __construct() {
        $json = file_get_contents(CONFIG . DS . self::CONFIG_FILE);
        $this->__config = \NCS\Common\Json::decode($json, true);
        $this->_read();
    }

/**
 * Armazena as configurações do arquivo Json no array $this->connections
 * 
 * @access protected
 */
    protected function _read() {
        foreach ($this->__config as $connection => $options) {
            switch ($options['adapter']) {
                case 'mysql':
                    $this->connections[$connection] = $this->_mysql($options);
                    break;
                case 'pgsql':
                    $this->connections[$connection] = $this->_pgsql($options);
                    break;
                case 'sqlite':
                    $this->connections[$connection] = $this->_sqlite($options);
                    break;
                case 'oci':
                    $this->connections[$connection] = $this->_oci($options);
                    break;
                default:
                    break;
            }
        }
    }

/**
 * Monta a string de conexão para MySQL
 * 
 * @param  array $options
 * @return string
 * @access protected
 */
    protected function _mysql($options) {
        $string = 'mysql://'
                . $options['login']
                . ':'
                . $options['password']
                . '@'
                . $options['host']
                . '/'
                . $options['database'];
        if (isset($options['charset'])) {
            $string .= ';charset='
                     . $options['charset'];
        }
        return $string;
    }

/**
 * Monta a string de conexão para Postgree
 * 
 * @param  array $options
 * @return string
 * @access protected
 */
    protected function _pgsql($options) {
        $string = 'pgsql://'
                . $options['login']
                . ':'
                . $options['password']
                . '@'
                . $options['host']
                . '/'
                . $options['database'];
        return $string;
    }

/**
 * Monta a string de conexão para Oracle
 * 
 * @param  array $options
 * @return string
 * @access protected
 */
    protected function _oci($options) {
        $string = 'oci://'
                . $options['login']
                . ':'
                . $options['password']
                . '@'
                . $options['host']
                . '/'
                . $options['database'];
        return $string;
    }

/**
 * Monta a string de conexão para SQLite
 * 
 * @param  array $options
 * @return string
 * @access protected
 */
    protected function _sqlite($options) {
        $string = 'sqlite://'
                . $options['database']
                . ".db";
        return $string;
    }

}