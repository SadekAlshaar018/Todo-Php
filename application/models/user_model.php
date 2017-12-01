<?php

  /**
   *
   */
  class User_model extends CI_Model{

      public function create_member(){
        //encrybt password
        $enc_password = md5($this->input->post('password'));

        //insert a data from input form in myphpadmin database
        $data = array(
          'first_name' => $this->input->post('first_name'),
          'last_name'  => $this->input->post('last_name'),
          'email'      => $this->input->post('email'),
          'username'   => $this->input->post('username'),
          'password'   => $enc_password
        );

        //insert data it is LIKE
        // $query = $this->db->insert('tablename', $data);
        $query = $this->db->insert('users', $data);
          return $insert;

      }
  }

?>
