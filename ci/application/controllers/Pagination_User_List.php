<?php

class Pagination_User_List extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('ModelOfUser');
        $this->load->library('Pagination');
    }
    
    // setting array for pagination library
    public function index()
    {
        // $config array
        $config = array();
        
        // Three main and most commom thing in every pagination
        $config['base_url'] = "http://localhost/task1/ci/Index.php/index/userlist";
        $config['total_rows'] = $this->ModelOfUser->total_number_of_records_in_user_table();
        $config['per_page'] = 3;
        
        // initializing array
        $data["links"] = $this->Pagination->create_links();
        $this->Pagination->initialize('$config');
    }
}