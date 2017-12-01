<?php

    //localhost:projectname/controller/method/params
    // class method extends CI_Controller {
    //   public function index(params){}
    // }
    //method = class Home of what ever
    //params: the name of function inside a method
class Home extends CI_Controller{

  public function index(){
    // $data['welcom'] = "Hoi Hoi ";
    $data['main_content'] = 'home';
    $this->load->view('layouts/main', $data);
  }
}

/**
 *
 */






?>
