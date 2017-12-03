<?php
  class Users extends CI_Controller{

      // regisetr function
      public function register(){
        // set rules for register form
        // 'required' is echt belangrijk
        $this->form_validation->set_rules(
              'first_name', 'First Name', 'required',
              'trim|required|maxlength[50]','min_length[2]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'last_name', 'Last Name', 'required',
              'trim|required|maxlength[50]','min_length[2]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'email', 'Email', 'required',
              'trim|required|maxlength[50]','min_length[2]', 'xss_clean','valid_email'
                                        );
        $this->form_validation->set_rules(
              'username', 'Username', 'required',
              'trim|required|maxlength[20]','min_length[5]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'password', 'Password', 'required',
              'trim|required|maxlength[20]','min_length[6]', 'xss_clean'
                                        );
        $this->form_validation->set_rules(
              'password2', 'Confirm Password', 'required',
              'trim|required|maxlength[20]','min_length[6]', 'xss_clean|matches[password]'
                                        );
            if ($this->form_validation->run() === FALSE) {
              $data['main_content'] = 'users/register';
              $this->load->view('layouts/main', $data);
            }
            else{
              if($this->User_model->create_member()){
                 $this->session->set_flashdata('registered', 'You registered go to sign in');
                 redirect('home/index');
              }
            }
      }


        //login operation
    public function login(){
      $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean', 'valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

      if($this->form_validation->run() === true){
        //if form not registered do nothing
        // echo "string";
         $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
        redirect('home/index');
      }elseif (($this->form_validation->run() === FALSE)){
        $username = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        //i make a varabile for user_id
        //i create a function login_user as a method inUser_model
        $user_id = $this->User_model->login_user($username, $password);
        // var_dump($user_id);die();
        // if not false
        if($user_id){
          $user_data = array(
            'user_id'   => $user_id,
            'email'  => $username,
            'logged_in' => true
          );
          // var_dump($user_data); die();
          $this->session->set_userdata($user_data);
          $this->session->set_flashdata('login_success', 'Welcom back'.' '.$username );
            redirect('home/index');
        }else{
          $this->session->set_flashdata('login_failed', 'the password or email is wrong');
          redirect('home/index');
        }
      }
    }


  }



?>
