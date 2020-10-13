<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$cant_v = $this->venta_model->obt_num_vent_r();
		$arr_info['cant_v'] = $cant_v[0]->cant_v;

		$this->load->model('usuario_model');
		$cant_u = $this->usuario_model->obt_cant_usr();
		$arr_info['cant_u'] = $cant_u[0]->cant_u;

		$this->load->model('cliente_model');
		$cant_c = $this->cliente_model->obt_num_cliente();
		$arr_info['cant_c'] = $cant_c[0]->cant_cliente;

		$this->load->view('home',$arr_info);
	}
}
