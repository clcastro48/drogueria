<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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
    $this->load->model('cliente_model');
    $arr_info["clientes"] = $this->cliente_model->obt_all_cliente();

    if(!empty($_GET['mensaje'])){
      $msj = base64_decode($_GET['mensaje']);
      $arr_info["msj"] = $msj;
    }
        
    $this->load->view('Listas\l_clientes',$arr_info);
  }
    
  public function nuevo()
	{
    $funcion = $this->uri->segment(3,'0');
    switch($funcion){
      default:
        $this->load->view('Formularios\f_cliente_nuevo');   
      break;
      case "guardar":
        $this->load->model('cliente_model');
        $msj_cliente = $this->cliente_model->insert_cliente();
        if($msj_cliente===true){
          $msj_cliente = 'Cliente registrado correctamente.';
        }
        else{
          $msj_cliente = 'Error al registrar cliente, intente nuevamente mas tarde.';
        }
        redirect(site_url()."/Clientes/index?mensaje=".base64_encode($msj_cliente));
      break;
    }
  }
  
  public function modificar()
	{
    $funcion = $this->uri->segment(4,'0');
    $id = $this->uri->segment(3,'0');
    switch($funcion){
      default:
        $this->load->model('cliente_model');
        $arr_info['client'] = $this->cliente_model->obt_cliente_esp($id);
        $this->load->view('Formularios\f_cliente_modificar',$arr_info);   
      break;
      case "guardar":
        $this->load->model('cliente_model');
        $msj_cliente = $this->cliente_model->update_cliente($id);
        if($msj_cliente===true){
          $msj_cliente = 'Cliente actualizado correctamente.';
        }
        else{
          $msj_cliente = 'Error al actualizar cliente, intente nuevamente mas tarde.';
        }
        redirect(site_url()."/Clientes/index?mensaje=".base64_encode($msj_cliente));
      break;
    }
	}
}