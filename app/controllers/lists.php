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

      //show alist
    public function show($list_id){
      $data['list'] = $this->List_model->get_list($list_id);
      $data['main_content'] = 'lists/show';
      $this->load->view('layouts/main', $data);
    }

    //add a list
    public function add(){
      $this->load->helper('security');
      $this->form_validation->set_rules('list_name', 'List Name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('list_body', 'List Body', 'trim|required|xss_clean');

      if($this->form_validation->run() === FALSE){
        $data['main_content'] = 'lists/add_list';
        $this->load->view('layouts/main', $data);

      }
      else {
        $data = array(
                'list_name'      => $this->input->post('list_name'),
                'list_body'      => $this->input->post('list_body'),
                'list_user_id'   => $this->session->userdata('user_id')
        );
        if($this->List_model->create_list($data)){
          $this->session->set_flashdata('list_created', 'Your mission created');

          redirect('lists/index');
        }

      }
    }

    //edit method to edit my list
    public function edit($list_id){
      $this->load->helper('security');
       $this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
       $this->form_validation->set_rules('list_body','List Body','trim|required|xss_clean');

       if($this->form_validation->run() == FALSE){
         //Validation has ran and passed
          //Post values to array
          //Get the current list info
          $data['this_list'] = $this->List_model->get_list_data($list_id);
          //Load view and layout
          $data['main_content'] = 'lists/edit_list';
          $this->load->view('layouts/main',$data);

       } else {
         $data = array(
             'list_name'    => $this->input->post('list_name'),
             'list_body'    => $this->input->post('list_body'),
             'list_user_id' => $this->session->userdata('user_id')
         );
        if($this->List_model->edit_list($list_id, $data)){
             $this->session->set_flashdata('list_updated', 'Your task list has been updated');
             //Redirect to index page with error above
             redirect('lists/index');
        }
       }

   }

   public function delete($list_id){
           //Delete list
           $this->List_model->delete_list($list_id);
           //Create Message
           $this->session->set_flashdata('list_deleted', 'Your list has been deleted');
           //Redirect to list index
           redirect('lists/index');
    }

  }



?>
