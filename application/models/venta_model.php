<?php if ( ! defined('BASEPATH')) exit('Nondirect script access allows');

class Venta_model extends CI_Model {
    public $variable;

    public function __construct(){
        parent::__construct();
    }

    public function obt_num_vent_r(){
        $consulta = "select COUNT(*) as cant_v from venta";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0){
            $result = $query->result();
            return $result;
        }
        return false;
    }

    public function obt_all_venta(){
      $consulta = "select * 
      from venta v
      left outer join cliente c on v.Cliente_idCliente = c.idCliente";
      $query = $this->db->query($consulta);
      $arr_datos = $query->result();
      if (count($arr_datos) > 0){
      return $arr_datos;
      }
      return false;
    }

    public function obt_sig_consec_venta(){
      $consulta = "select `AUTO_INCREMENT`
      FROM  INFORMATION_SCHEMA.TABLES
      WHERE TABLE_SCHEMA = 'drogueria'
      AND   TABLE_NAME   = 'venta';";
      $query = $this->db->query($consulta);
      $arr_datos = $query->result();
      if (count($arr_datos) > 0){
        return $arr_datos;
      }
      return 0;
    }

    public function insert_venta(){
      $this->load->model("medicamento_model");
      date_default_timezone_set('UTC');
      date_default_timezone_set("America/Bogota");
      $arr_c["fecha"]=date('Ymd');
      $arr_c["total"]=$this->input->post('total_fact');
      $arr_c["Usuario_idUsuario"]=$this->session->userdata('id');
      if($this->input->post('cliente')!=="Anonimo"){$arr_c["Cliente_idCliente"]=$this->input->post('cliente');}
      if($this->db->insert("venta",$arr_c)){
        $idreg = $this->db->insert_id();
        $arr_productos = $this->input->post('productos');
        foreach($arr_productos as $producto){
          $arr_reg["Venta_idVenta"] = $idreg;
          $arr_reg["Venta_Usuario_idUsuario"] = $this->session->userdata('id');
          $arr_reg["Medicamento_idMedicamento"] = $producto;
          $arr_reg["cantidad"] = $this->input->post('cant_p_'.$producto);
          $med = $this->medicamento_model->obt_med_esp($producto);
          $arr_reg["valor_u"] = $med[0]->precio_u;
          $idreg2 = $this->db->insert("Venta_has_Medicamento",$arr_reg);
          if(!empty($idreg2)){
            $cantidad_v = intval($arr_reg["cantidad"]);
            $stock = intval($med[0]->stock);
            $arr_med["stock"] = $stock-$cantidad_v;
            $this->db->where("idMedicamento",$producto);
            $this->db->update("medicamento",$arr_med);
          }
        } 
        return true;
      }
      else{
        return false;
      }
    }
}