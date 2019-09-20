<?php
/**
 * @package tests
 * @subpackage configurators
 * @author VxR <vxr@vxr.it>
 * @version $Revision: 1.4 $
 * @since 0.5
 */

/**
 * @var array Test array
 */
$tests = array(
    'LoggerPropertyConfigurator_01'     => array(
        '__COMMENT__'           => 'Basic LoggerPropertyConfigurator',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerPropertyConfigurator_01.properties'
     ),
    'LoggerPropertyConfigurator_02'     => array( 
        '__COMMENT__'           => 'LoggerPropertyConfigurator with variable substitution',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerPropertyConfigurator_02.properties'
    ),     
    'LoggerPropertyConfigurator_03'     => array( 
        '__COMMENT__'           => 'LoggerPropertyConfigurator with bad configuration file',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerPropertyConfigurator_03.properties'
    ),     
    'LoggerPropertyConfigurator_04'     => array( 
        '__COMMENT__'           => 'LoggerPropertyConfigurator with factory',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerPropertyConfigurator_04.properties'
    ),
    'LoggerDOMConfigurator_01'     => array( 
        '__COMMENT__'           => 'LoggerDOMConfigurator with variable substitution',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerDOMConfigurator_01.xml'
    ),     
    'LoggerDOMConfigurator_02'     => array( 
        '__COMMENT__'           => 'LoggerDOMConfigurator with class factory',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerDOMConfigurator_02.xml'
    ),     
    'LoggerDOMConfigurator_03'     => array( 
        '__COMMENT__'           => 'LoggerDOMConfigurator with bad configuration file',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerDOMConfigurator_03.xml'
    ),     
    'LoggerDOMConfigurator_04'     => array( 
        '__COMMENT__'           => 'LoggerDOMConfigurator with bad configuration file (xml not well formed)',
        'LOG4PHP_DIR'           => null,
        'LOG4PHP_CONFIGURATION' => './configs/LoggerDOMConfigurator_04.xml'
    ),     
     
);

define('MY_CONSTANT', 'hello world!');

require_once('../test_core.php');

?>