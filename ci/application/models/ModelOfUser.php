<?php
class ModelOfUser extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database('codeigniter-task1');
    }
    //getting all data from database from user table and getting value of parameter of limit and start from index contrler/userlist method
    public function get_all_user_data_from_user_table($limit, $start)
    {
        $this->db->limit($limit, $start);
        
        //select all data from user
        $query = $this->db->get('user');
        
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    //counting total number of records in user table 
    public function total_number_of_records_in_user_table()
    {
        return $this->db->count_all("user");
    }
    public function deleteUserRecordById($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
    public function updateUserRecord($updateUser)
    {
        $haveUserId =  $this->uri->segment(3);
        $array = array(
           'first_name' => $updateUser['first_name'],
           'last_name' => $updateUser['last_name'],
        );
        $this->db->where('id', $haveUserId);
        $this->db->update('user', $array);
    }
    public function logInToUser($haveLogInData)
    {
       $haveEmail = $haveLogInData['email'];
       $havePassword = $haveLogInData['password'];
       
       $this->db->from('user');
       $this->db->where('email',$haveEmail);
       $query =  $this->db->get();
       
       $count = $query->num_rows();
       if($count > 0)
       {
           
          foreach($query->result() as $row )
          {
            $emailFromDb = $row->email;
            $pwdFromDb = $row->password;
          }
          if($pwdFromDb == $havePassword && $emailFromDb == $haveEmail )
            {
                 $newdata = array(
                 'userId'  => $row->id,
                 'userName' => $row->first_name
                  );
                 $this->session->set_userdata($newdata);
                 $userId = $this->session->userdata('userId');
                 $userName= $this->session->userdata('userName');
                // echo "route to log in page";
                 echo "<br>";
                 echo "User Name =".$userName;
             }
          else
             {
               $this->load->view('logInError');
             } // end of inner else
           
       }// end of outer if
       else
       {
            $this->load->view('logInError');
       }// end of outer else
    }
    public function signUpToUser($haveSignUpData)
    {
        
        $data = array(
            'first_name' => $haveSignUpData['first_name'],
            'last_name'  => $haveSignUpData['last_name'],
             'email'     => $haveSignUpData['email'],
            'password'   => $haveSignUpData['password']
        );
         $this->db->insert('user', $data);
        $this->load->view('signUpSuccessfullMessage');
    }
    public function downloadUserDataInCsvFile()
    {
         $query =  $this->db->get('user');
       //  $row = $query->num_rows();
   
          if($query->num_rows() > 0)
         {

             $filedSeperator = ",";
             $filename = "User_Data-List.csv";
             $f = fopen('php://memory', 'w');
             
             //set column headers
             $fields = array( 'Student_ID', 'First_Name', 'Last_Name', 'Email');
             
             //fputcsv($fileName,$dataForm,$seperaotr)
             fputcsv($f, $fields, $filedSeperator);

             foreach ($query->result() as $row) 
             {
                 $lineData = array($row->id , $row->first_name , $row->last_name , $row->email);
                 fputcsv($f, $lineData, $filedSeperator);
             }
             
             //move back to beginning of file
             fseek($f, 0);
             
             //set headers to download file rather than displayed
             header('Content-Type: text/csv');
             header('Content-Disposition: attachment; filename="' . $filename . '";');
             
             //output all remaining data on a file pointer
             fpassthru($f);
         }
         exit; 
    }
}//end of class
