<?php if ( ! defined('BASEPATH')) exit('Nondirect script access allows');

class Medicamento_model extends CI_Model {
    public $variable;

    public function __construct(){
        parent::__construct();
    }

    public function obt_all_med(){
        $consulta = "select * from medicamento;";
        $query = $this->db->query($consulta);
        $arr_datos = $query->result();
        if (count($arr_datos) > 0){
        return $arr_datos;
        }
        return false;
    }

    public function insert_med(){
      $arr_med["nombre"]=$this->input->post('nombre');
      $arr_med["precio_u"]=$this->input->post('val_u');
      $arr_med["stock"]=0;
      $arr_med["categoria"]=$this->input->post('categoria');
      $arr_med["presentacion"]=$this->input->post('presentacion');
      $arr_med["cantidad"]=$this->input->post('cantidad');
      if(!empty($this->input->post('lab'))){$arr_med["laboratorio"]=$this->input->post('lab');}
      if(!empty($this->input->post('concentracion'))){$arr_med["concentracion"]=$this->input->post('concentracion');}
      $arr_med["subcategoria"]=$this->input->post('subc');
      $arr_med["estado"]='Activo';
      if($this->db->insert("medicamento",$arr_med)){
        return true;
      }
      else{
        return false;
      }
    }

    public function obt_med_esp($id){
      $consulta = "select * from medicamento where idMedicamento = ".$id;
        $query = $this->db->query($consulta);
        $arr_datos = $query->result();
        if (count($arr_datos) > 0){
        return $arr_datos;
        }
        return false;
    }

    public function update_med($id, $stocka){
      $arr_med["precio_u"]=$this->input->post('val_u');
      $arr_med["laboratorio"]=$this->input->post('lab');
      $arr_med["estado"]=$this->input->post('estado');
      if(!empty($this->input->post('stock_add'))){
        $stock_ant = intval($stocka);
        $stock_add = intval($this->input->post('stock_add'));
        $stock = $stock_ant + $stock_add;
        $arr_med["stock"]=$stock;
      }
      $this->db->where("idMedicamento",$id);
      if($this->db->update("medicamento",$arr_med)){
        return true;
      }
      else{
        return false;
      }
    }
}