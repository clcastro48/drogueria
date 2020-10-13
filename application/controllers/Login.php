<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $password = $this->input->post("password");
        if(!empty($password)){
			$this->load->model('usuario_model');
			$usuario = $this->usuario_model->login($this->input->post("cc"),md5($this->input->post("password")));
            if($usuario!==false){
				$usuario_data = array(
					'id' => $usuario[0]->idUsuario,
					'nombre' => $usuario[0]->nombre_comp,
					'logueado' => TRUE
				);
				$this->session->set_userdata($usuario_data);
                redirect('welcome');
            }
            else{
                redirect('login');
            }
        }
        $this->load->view('login');
	}
}
