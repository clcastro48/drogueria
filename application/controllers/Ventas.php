<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

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
    $this->load->model('venta_model');
    $arr_info["ventas"] = $this->venta_model->obt_all_venta();

    if(!empty($_GET['mensaje'])){
      $msj = base64_decode($_GET['mensaje']);
      $arr_info["msj"] = $msj;
    }
        
    $this->load->view('Listas\l_ventas',$arr_info);
  }

  
    
  public function nuevo()
	{
    $funcion = $this->uri->segment(3,'0');
    switch($funcion){
      default:
        $this->load->model('venta_model');
        $this->load->model('cliente_model');
        $this->load->model('medicamento_model');
        $arr_info['consec'] = intval($this->venta_model->obt_sig_consec_venta());
        $arr_info['clientes'] = $this->cliente_model->obt_all_cliente();
        $arr_info['medicamentos'] = $this->medicamento_model->obt_all_med();
        $this->load->view('Formularios\f_ventas_nuevo',$arr_info);   
      break;
      case "guardar":
        $this->load->model('venta_model');
        $msj_med = $this->venta_model->insert_venta();
        if($msj_med===true){
          $msj_med = 'Venta registrada correctamente.';
        }
        else{
          $msj_med = 'Error al registrar el venta, intente nuevamente mas tarde.';
        }
        redirect(site_url()."/Ventas/index?mensaje=".base64_encode($msj_med));
      break;
    }
  }
  
  /*public function modificar()
	{
    $funcion = $this->uri->segment(4,'0');
    $id = $this->uri->segment(3,'0');
    switch($funcion){
      default:
        $this->load->model('medicamento_model');
        $arr_info['med'] = $this->medicamento_model->obt_med_esp($id);
        $this->load->view('Formularios\f_medicamento_modificar',$arr_info);   
      break;
      case "guardar":
        $this->load->model('medicamento_model');
        $medicamento = $this->medicamento_model->obt_med_esp($id);
        $msj_med = $this->medicamento_model->update_med($id,$medicamento[0]->stock);
        if($msj_med===true){
          $msj_med = 'Medicamento actualizado correctamente.';
        }
        else{
          $msj_med = 'Error al actualizar medicamento, intente nuevamente mas tarde.';
        }
        redirect(site_url()."/Medicamentos/index?mensaje=".base64_encode($msj_med));
      break;
    }
  }*/
}