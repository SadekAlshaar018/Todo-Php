<?php


  class User_model extends CI_Model{

      public function create_member(){
        //encrybt password
        // $enc_password = md5($this->input->post('password'));

        //insert a data from input form in myphpadmin database
        //here we code the name's from database
        $new_member = array(
          'first_name' => $this->input->post('first_name'),
          'last_name'  => $this->input->post('last_name'),
          'email'      => $this->input->post('email'),
          'user_name'   => $this->input->post('username'),
          'password'   => md5($this->input->post('password'))
        );

        //insert new_member it is LIKE
        // $query = $this->db->insert('tablename', $new_member);
        $insert = $this->db->insert('users', $new_member);
        // var_dump($insert); die();
          return $insert;

      }

      //login method
    public function login_user($username, $password){
      $enc_password = md5($password);

      $this->db->where('email',$username);
      $this->db->where('password', $enc_password);

      $resualt = $this->db->get('users');
        if($resualt->num_rows() == 1){
          return $resualt->row(0)->id;
        }
        else {
          return false;
        }
    }
  }

?>
