<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Loading view of navigation bar
        $this->load->view('navigationBar');
        // Loading model class
        $this->load->model('ModelOfUser');
        // Loading library of pagination
        $this->load->library('pagination');
        $this->load->library('session');
    }

    public function index()
    {
        // do something
    }
    
    // fetching data from db and showing it on userlist page by calling userlist view and beside it passing array as an argument also apply pagination metods in it.
    public function userlist()
    {
        $config = array();
        $config['base_url'] = 'http://localhost/task1/ci/Index.php/index/userlist';
        $config['total_rows'] = $this->ModelOfUser->total_number_of_records_in_user_table();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        
     // initializing the library
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->ModelOfUser->get_all_user_data_from_user_table($config["per_page"], $page);
     //   echo $data["results"];die();
        $data["links"] = $this->pagination->create_links();
        
        $this->load->view("userlist", $data);
       // echo $this->uri->segment(4);
    }

    public function deleteUserRecord($haveUserId)
    {
        $this->ModelOfUser->deleteUserRecordById($haveUserId);
        $this->load->view('UserDeletedMessage');
    }

    public function viewOfUpdateUserRecord($haveUserId)
    {
        $this->load->view('updateUser');
    }

    public function updatingUserRecord($haveUserId)
    {
        $updateUser['first_name'] = $this->input->post('firstName');
        $updateUser['last_name'] = $this->input->post('lastName');
        
        $this->ModelOfUser->updateUserRecord($updateUser);
        $this->load->view('userUpdatedMessage');
    }

    public function viewOfLogInUser()
    {
        $this->load->view('logIn');
    }

    public function login()
    {
        $haveLogInData['email'] = $this->input->post('email');
        $haveLogInData['password'] = $this->input->post('password');
        $this->ModelOfUser->logInToUser($haveLogInData);
    }

    public function viewOfSignUp()
    {
        $this->load->view('signUp');
    }

    public function signUpUser()
    {
        $haveSignUpData['first_name'] = $this->input->post('fname');
        $haveSignUpData['last_name'] = $this->input->post('lname');
        $haveSignUpData['email'] = $this->input->post('email');
        $haveSignUpData['password'] = $this->input->post('psw');
        
        $this->db->from('user');
        $this->db->where('email', $haveSignUpData['email']);
        $query = $this->db->get();
        $row = $query->num_rows();
        if ($row > 0) {
            $this->load->view('emailAlreadyExixt');
        } else {
            $this->ModelOfUser->signUpToUser($haveSignUpData);
            $this->load->view('signUpSuccessfullMessage');
        }
    }

    public function export_All_User_Data_In_Csv_File()
    {
        $this->ModelOfUser->downloadUserDataInCsvFile();
    }

    public function contactUs()
    {
        $this->load->view('gmap');
       
    }
    public function email()
    {
         $this->load->library('email');
         
         $haveFirstNameOfSender = $this->input->post('firstname');
         $haveLastNameOfSender = $this->input->post('lastname');
         
         $haveSenderEmail = $this->input->post('email');
         
         $haveSenderMessageBody = $_POST['subject'];
         
       
         $this->email->from( $haveSenderEmail, $haveFirstNameOfSender );
         $this->email->to('irfanmehmood207@hotmail.com');

         $this->email->subject('Email Test');
         $this->email->message($haveSenderMessageBody);
    
         $this->email->send();
         
         if ($this->email->send(FALSE))
         {
             show_error( $this->email->print_debugger());
         }
         else{
             ?>
                <script>
                   alert("Email Send Successfully ");
                   window.location = "http://localhost/task1/ci/Index.php/index/contactUs";
                </script>
             <?php 
         }
    }
    public function forgetPasswordView()
    {
        $this->load->view('forgetPasswordView');
    }
    public function pwdRecovery()
    {
           $haveEmailTOWhomePasswordMustBeRest = $this->input->post('email');
           $this->db->from('user');
           $this->db->where('email', $haveEmailTOWhomePasswordMustBeRest );
           $query = $this->db->get();
           $row = $query->num_rows();
           if ($row > 0) 
           {
              $r = $query->result();
                 foreach ($r as $o) 
                 {
                     $haveName = $o->first_name;
                     $haveEmail = $o->email;
                     $havepassword = $o->password;
                 }
              $updatedvalue =  rand();
           
              $this->db->set('password',$updatedvalue);
              $this->db->where('email',$haveEmailTOWhomePasswordMustBeRest);
              $this->db->update('user'); 
              
              
              $this->load->library('email');
               
            
              $this->email->from( 'irfanmehmood207@hotmail.com', 'Admin' );
              $this->email->to($haveEmail);
              
              $this->email->subject('Password Recovery');
              $this->email->message($haveName.' Your New Password is = '.$updatedvalue);
              $this->email->send();
               ?>
               <script>  
                   alert("Password Reset Successfully . Please Check Your Email");
                   window.location = "http://localhost/task1/ci/Index.php/index/forgetPasswordView";
                </script>
               <?php 
              if ($this->email->send(FALSE))
              {
                  show_error( $this->email->print_debugger());
              }
           } 
           else 
           {
               ?>
                <script>              
                   alert("There Is No Such Email In DataBase");
                   window.location = "http://localhost/task1/ci/Index.php/index/forgetPasswordView";
                </script>
               <?php 
           }
    }
}// End Of Class
?>