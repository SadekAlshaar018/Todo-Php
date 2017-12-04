<?php
  class Lists extends CI_Controller{
// i created __construct because the users can not see a lists if he/she not logged in
//i do not need a spicefice function
     public  function __construct(){
        parent::__construct();
        if(!$this->session->userdata('logged_in')){
          $this->session->set_flashdata('noaccess', 'You have log in to access lists');
          redirect('home/index');
        }
    }

    public function index(){
      $user_id = $this->session->userdata('user_id');
      //grap my lists from list table
      $data['lists'] = $this->List_model->get_lists($user_id);
      $data['main_content'] = 'lists/index';
      $this->load->view('layouts/main', $data);
    }
    public function show($list_id){
      $data['list'] = $this->List_model->get_list($list_id);
      $data['main_content'] = 'lists/show';
      $this->load->view('layouts/main', $data);
    }

    public function add(){
      $this->form_validation->set_rules('list_name', 'List Name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('list_body', 'List Body', 'trim|xss_clean');

      if($this->form_validation->run() === FALSE){
          $data['main_content'] = 'lists/add_list';
          $this->load->view('layouts/main', $data);
      }
      else {

            $data = array(
                    'list_name'   => $this->input->post('list_name'),
                    'list_body'   => $this->input->post('list_body'),
                    'list_user_id'   => $this->input->post('user_id')
            );
            if($this->List_model->create_list($data)){
              $this->session->set_flashdata('list_created', 'Your mission created');

              redirect('lists/index');
            }
      }
    }
  }



?>
