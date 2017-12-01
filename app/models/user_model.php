<?php

  class User_model extends CI_Model{

      public function create_member(){
        //encrybt password
        // $enc_password = md5($this->input->post('password'));

        //insert a data from input form in myphpadmin database
        $new_member = array(
          'first_name' => $this->input->post('first_name'),
          'last_name'  => $this->input->post('last_name'),
          'email'      => $this->input->post('email'),
          'username'   => $this->input->post('username'),
          'password'   => md5($this->input->post('password'))
        );

        //insert new_member it is LIKE
        // $query = $this->db->insert('tablename', $new_member);
        $insert = $this->db->insert('users', $new_member);
        // var_dump($insert); die();
          return $insert;

      }
  }

?>
