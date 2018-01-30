<?php
class LogIn_controller extends CI_Controller
{
    public function index()
    {
         $this->load->view('logIn');
    }
    public function login()
    {
        echo "herer";
        /* $haveLogInData['email'] = $this->input->post('email');
        $haveLogInData['password'] = $this->input->post('password');
        $this->ModelOfUser->logInToUser($haveLogInData); */
    }
}