<?php
  /**
   *
   */
  class Tasks extends CI_Controller{

  public function show($id){
    $data['this_task'] = $this->Task_model->get_task($id);
    $data['main_content'] = 'tasks/show';
    $this->load->view('layouts/main', $data);


    }
  }


 ?>
