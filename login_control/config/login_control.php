<?php
/**
 * Name:    Login_control
 * Author:  Pedro Ruiz Hidalgo
 *           correo@pedroruizhidalgo.es
 *           @pedroruizhidalg
 *
 *
 * Created:  2018-01-29
 * 
 * Description:  This install a login control to aid the package Ion_Auth to store it.
 *
 *
 * Requirements: PHP5 or above
 *
 * @package    Login_Control
 * @author     Pedro Ruiz hidalgo
 * @link       http://github.com/PedroRuiz/CodeIgniterLoginControl
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| List dateformat.
| -------------------------------------------------------------------------
| Formats supported by php's date().
*/
$config['lc_dateformat'] = 'd-m-Y h:i:s';

/*
| -------------------------------------------------------------------------
| Table Name
| -------------------------------------------------------------------------
| 
*/
$config['lc_tablename'] = 'login_control';


/*
| -------------------------------------------------------------------------
| Name of fieds in view
| -------------------------------------------------------------------------
| 
*/
$config['lc_names']['user_id']      = 'User id';
$config['lc_names']['ip_address']   = 'Ip Address';
$config['lc_names']['time']         = 'Date';




