<?php 
class Pais__model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    function save_pais($post){
        if(isset($post['campo'])){ 
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $id=$post[$post["campo"]];
            unset($post['campo']);
            $this->db->update('pais',$post);
        }else{
            $this->db->insert('pais',$post);
            $id=$this->db->insert_id();
        }
        return $id;
        
    }
    function delete_pais($post){
        $this->db->set('ACTIVO','N');
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $this->db->update('pais');
    }
    function edit_pais($post){
        $this->db->where($post["campo"],$post[$post["campo"]]);
        $datos=$this->db->get('pais',$post);
        return $datos=$datos->result();
    }
    function consult_pais($post){
            if(isset($post['pai_id']))
        if($post['pai_id']!="")
        $this->db->like('pai_id',$post['pai_id']);
                    if(isset($post['pai_nombre']))
        if($post['pai_nombre']!="")
        $this->db->like('pai_nombre',$post['pai_nombre']);
                    if(isset($post['activo']))
        if($post['activo']!="")
        $this->db->like('activo',$post['activo']);
                                    $this->db->select('pai_id');
                                $this->db->select('pai_nombre');
                        $this->db->where('ACTIVO','S');
        $datos=$this->db->get('pais');
        $datos=$datos->result();
        return $datos;
    }
}
?>
