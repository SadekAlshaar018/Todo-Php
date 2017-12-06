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
    public function get_list($id){
       $this->db->select('*');
       $this->db->from('lists');
       $this->db->where('id',$id);
       $query = $this->db->get();
        if($query->num_rows() != 1){
           return FALSE;
       }else{
       return $query->row();
   }
}
    public function create_list($data){
        $insert = $this->db->insert('lists',$data);
        return $insert;
    }
    // inside this function i called ID list and i have to call a DATA ARRAY
    //because i want to change a spciefec list ==ID , then i want updat a naam or body of list
    public function edit_list($list_id, $data){
      $this->db->where('id', $list_id);
      $this->db->update('lists', $data);
      return TRUE;
    }
   //  // this function to returen a mission from DB after update
    public function get_list_data($list_id){
      $this->db->where('id', $list_id);
      $query = $this->db->get('lists');
      return $query->row();
    }
   //
    public function delete_list($list_id){
       $this->db->where('id',$list_id);
       $this->db->delete('lists');
       $this->delete_tasks_of_list($list_id);
       return;
   }

   //function to load all lists for users in home page after logged in
   public function get_all_lists($user_id){
     $this->db->where('list_user_id', $user_id);
     $this->db->order_by('created_at', 'asc');
     $query = $this->db->get('lists');
     return $query->result();
   }

  }


?>
