<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php

 class Results_model extends CI_model{



    public function GetState_LGA(){
       // $this->db->limit(50);
       // $this->db->select('*');
       // $this->db->from('states');
       // $this->db->join('lga','states.state_id=lga.state_id');
       // $this->db->join('ward','lga.lga_id = ward.ward_id');
       // $this->db->join('polling_unit','ward.ward_id = polling_unit.polling_unit_id');
       // $this->db->join('announced_pu_results','polling_unit.polling_unit_id = announced_pu_results.polling_unit_uniqueid');
       // $this->db->where('lga.state_id','25');
       // $query = $this->db->get();
       // return $query->result();
    }

  public function polling_unit_result(){
     $this->db->select('*');
     $this->db->from('polling_unit');
     $this->db->join('announced_pu_results','polling_unit.polling_unit_id = announced_pu_results.polling_unit_uniqueid');
     $this->db->where('polling_unit.polling_unit_id','12');
     $query = $this->db->get();
     return $query->result();

  }
  public function summed_lga(){
     $this->db->select('*');
     $this->db->from('lga');
     $this->db->join('polling_unit','lga.lga_id = polling_unit.lga_id');
     $this->db->where('polling_unit.lga_id','6');
     $this->db->join('announced_pu_results','polling_unit.polling_unit_id = announced_pu_results.polling_unit_uniqueid ');
     $query = $this->db->get();
     return $query->result();

  }

  public function summed_result($num){
     $this->db->select('*');
     $this->db->from('polling_unit');
     $this->db->join('announced_pu_results','polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid');
     $this->db->where('announced_pu_results.polling_unit_uniqueid',$num);
     //$query = $this->db->get_where('announced_pu_results',array('polling_unit_uniqueid'=>$num));
     $query = $this->db->get();
     return $query->result();

  }



 }


?>
