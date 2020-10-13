<?php if ( ! defined('BASEPATH')) exit('Nondirect script access allows');

class Cliente_model extends CI_Model {
    public $variable;

    public function __construct(){
        parent::__construct();
    }

    public function obt_num_cliente(){
        $consulta = "select COUNT(*) as cant_cliente from cliente";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0){
            $result = $query->result();
            return $result;
        }
        return false;
    }

    public function obt_all_cliente(){
      $consulta = "select * from cliente order by nombre_comp";
      $query = $this->db->query($consulta);
      $arr_datos = $query->result();
      if (count($arr_datos) > 0){
      return $arr_datos;
      }
      return false;
  }

  public function insert_cliente(){
    $arr_c["nombre_comp"]=$this->input->post('nom_comp');
    $arr_c["n_identificacion"]=$this->input->post('n_id');
    if(!empty($this->input->post('tel'))){$arr_c["telefono"]=$this->input->post('tel');}
    $arr_c["tipo_identificacion"]=$this->input->post('tipo_id');
    if($this->db->insert("cliente",$arr_c)){
      return true;
    }
    else{
      return false;
    }
  }

  public function obt_cliente_esp($id){
    $consulta = "select * from cliente where idCliente = ".$id;
      $query = $this->db->query($consulta);
      $arr_datos = $query->result();
      if (count($arr_datos) > 0){
      return $arr_datos;
      }
      return false;
  }

  public function update_cliente($id){
    $arr_cliente["nombre_comp"]=$this->input->post('nom_comp');
    $arr_cliente["telefono"]=$this->input->post('tel');
    $this->db->where("idCliente",$id);
    if($this->db->update("cliente",$arr_cliente)){
      return true;
    }
    else{
      return false;
    }
  }
}