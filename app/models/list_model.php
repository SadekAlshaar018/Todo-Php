<?php
  class List_model extends CI_Model{
    public function get_lists($user_id){
      // $query = $this->db->get('lists');
      //   return $query->$result();
        $this->db->where('list_user_id', $user_id);
        $this->db->order_by('created_at', 'asc');
        $query = $this->db->get('lists');
        return $query->result();
    }
    //get list
    public function get_list($list_id){
        $query = $this->db->get('lists');
                $this->db->where('id', $list_id);
                return $query->row();
    }
  }


?>
