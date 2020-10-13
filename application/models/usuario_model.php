<?php if ( ! defined('BASEPATH')) exit('Nondirect script access allows');

class Usuario_model extends CI_Model {
    public $variable;

    public function __construct(){
        parent::__construct();
    }

    public function login($username, $password){
        $this->db->where('cedula',$username);
        $this->db->where('password',$password);
        $this->db->where('estado','Activo');
        $query = $this->db->get('usuario');
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function obt_cant_usr(){
        $consulta = "select COUNT(*) as cant_u from usuario";
        $query = $this->db->query($consulta);
        if ($query->num_rows() > 0){
            $result = $query->result();
            return $result;
        }
        return false;
    }

    public function obt_all_usr(){
        $consulta = "select idUsuario, nombre_comp, cedula, estado from usuario";
        $query = $this->db->query($consulta);
        $arr_datos = $query->result();
        if (count($arr_datos) > 0){
        return $arr_datos;
        }
        return false;
    }

    public function insert_usr(){
      $arr_usr["nombre_comp"]=$this->input->post('nom_comp');
      $arr_usr["cedula"]=$this->input->post('cedula');
      $arr_usr["password"]=md5($this->input->post('password'));
      $arr_usr["estado"]='Activo';
      if($this->db->insert("usuario",$arr_usr)){
        return true;
      }
      else{
        return false;
      }
    }

    public function obt_usr_esp($id){
      $consulta = "select * from usuario where idUsuario = ".$id;
        $query = $this->db->query($consulta);
        $arr_datos = $query->result();
        if (count($arr_datos) > 0){
        return $arr_datos;
        }
        return false;
    }

    public function update_usr($id){
      if(!empty($this->input->post('nom_comp'))){$arr_usr["nombre_comp"]=$this->input->post('nom_comp');}
      $arr_usr["password"]=md5($this->input->post('password'));
      if(!empty($this->input->post('estado'))){$arr_usr["estado"]=$this->input->post('estado');}
      $this->db->where("idUsuario",$id);
      if($this->db->update("usuario",$arr_usr)){
        return true;
      }
      else{
        return false;
      }
    }
}