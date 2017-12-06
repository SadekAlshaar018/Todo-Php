<?php
  /**
   *
   */
  class Task_model extends CI_Model{
    public function get_task(){
      $query = $this->db->get('tasks');
              $this->db->where('id', $id);
              return $query->row();
    }
  }


 ?>
