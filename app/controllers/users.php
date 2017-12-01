<?php
  class Users extends CI_Controller{

      // regisetr function
      public function register(){
        // set rules for register form
        $this->form_validation->set_rules(
              'first_name', 'First Name',
              'trim|required|maxlength[50]','min_length[2]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'last_name', 'Last Name',
              'trim|required|maxlength[50]','min_length[2]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'email', 'Email',
              'trim|required|maxlength[50]','min_length[2]', 'xss_clean','valid_email'
                                        );
        $this->form_validation->set_rules(
              'username', 'Username',
              'trim|required|maxlength[20]','min_length[5]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'password', 'Password',
              'trim|required|maxlength[20]','min_length[6]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'password2', 'Confirm Password',
              'trim|required|maxlength[50]','min_length[2]', 'xss_clean|matches[password]'
                                        );
            if ($this->form_validation->run() == FALSE) {
              $data['main_content'] = 'users/register';
              $this->load->view('layouts/main', $data);
            }else{
              if($this->User_model->create_member()){
                 $this->session->set_flashdata('registered', 'You registered go to sign in');
                 redirect('home/index');
              }
            }
      }



  }



?>
