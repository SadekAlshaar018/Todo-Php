<?php

    //localhost:projectname/controller/method/params
    // class method extends CI_Controller {
    //   public function index(params){}
    // }
    //method = class Home of what ever
    //params: the name of function inside a method
class Home extends CI_Controller{

  public function index(){

    //view table for lists users
    if($this->session->userdata('logged_in')){
      $user_id = $this->session->userdata('user_id');
      $data['lists'] = $this->List_model->get_all_lists($user_id);
      // $data = $this->Task_model->get_users_tasks($user_id);
    }
    // $data['welcom'] = "Hoi Hoi ";
    $data['main_content'] = 'home';
    $this->load->view('layouts/main', $data);


  }
}

/**
 *
 */






?>
