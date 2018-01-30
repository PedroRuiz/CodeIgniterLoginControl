<?php
/**
 * Name:    Login Control
 * Author:  Pedro Ruiz Hidalgo
 *           correo@pedroruizhidalgo.es
 *           @pedroruizhidalg
 *
 *
 * Created:  2018-01-29
 *
 * Description:  Manages Ben Edmund's Ion Auth to control the users logins
 * Original Author name has been kept but that does not mean that the method has not been modified.
 *
 * Requirements: PHP5 or above
 *
 * @package    CodeIgniter-Login-Control
 * @author     Pedro Ruiz Hidalgo
 * @link       http://github.com/PedroRuiz/CodeIgniterLoginControl
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Login Control Model
 * @property Ion_auth $ion_auth The Ion_auth library
 */
class Login_control extends CI_Model
{
    private $table;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->database();

        $this->load->library('ion_auth');
        
        $this->load->config('login_control', TRUE);
		$this->table = $this->config->item('lc_tablename', 'login_control');
    }
    
    public function write_login($id_user)
    {
        $data=array(
            'user_id'       =>  $this->ion_auth->user()->row()->id,
            'ip_address'    =>  $this->input->ip_address(),
        );
        //var_dump($data); exit;
        $this->db->insert($this->table, $data);
    }
    
    public function get_logins($id=NULL)
    {
        if(is_null($id))
        {
            $_id    =   $this->ion_auth->user()->row()->id;
        } else
        {
            $_id    =   $id;
        }
        
        return $this->db->get_where($this->table,array('user_id'=>$_id))->result_array();
    }
    
    public function get_all()
    {
        return $this->db->get($this->table)->result_array();
    }
}