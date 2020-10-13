<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
    $this->load->model('usuario_model');
    $arr_info["usuarios"] = $this->usuario_model->obt_all_usr();

    if(!empty($_GET['mensaje'])){
      $msj = base64_decode($_GET['mensaje']);
      $arr_info["msj"] = $msj;
    }
        
    $this->load->view('Listas\l_usuarios',$arr_info);
  }
    
  public function nuevo()
	{
    $funcion = $this->uri->segment(3,'0');
    switch($funcion){
      default:
        $this->load->view('Formularios\f_usuario_nuevo');   
      break;
      case "guardar":
        $this->load->model('usuario_model');
        $msj_usr = $this->usuario_model->insert_usr();
        if($msj_usr===true){
          $msj_usr = 'Usuario registrado correctamente.';
        }
        else{
          $msj_usr = 'Error al registrar usuario, intente nuevamente mas tarde.';
        }
        redirect(site_url()."/Usuarios/index?mensaje=".base64_encode($msj_usr));
      break;
    }
  }
  
  public function modificar()
	{
    $funcion = $this->uri->segment(4,'0');
    $id = $this->uri->segment(3,'0');
    switch($funcion){
      default:
        $this->load->model('usuario_model');
        $arr_info['usr'] = $this->usuario_model->obt_usr_esp($id);
        $this->load->view('Formularios\f_usuario_modificar',$arr_info);   
      break;
      case "guardar":
        $this->load->model('usuario_model');
        $msj_usr = $this->usuario_model->update_usr($id);
        if($msj_usr===true){
          $msj_usr = 'Usuario actualizado correctamente.';
        }
        else{
          $msj_usr = 'Error al actualizar usuario, intente nuevamente mas tarde.';
        }
        redirect(site_url()."/Usuarios/index?mensaje=".base64_encode($msj_usr));
      break;
    }
	}
}
