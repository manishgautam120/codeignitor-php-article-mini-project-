<?php
class Loginmodel extends CI_model
{
                                
    public function login_valid($username , $password)     //taking two value to check 
    {
       
        $q = $this->db->where(['uname'=>$username,'pword'=>$password])
                      ->get('users');                                             
                                                     //checking after qwery if row is there than return id of that row 
          if($q->num_rows()) 
          {
              return $q->row()->id;      //return true;
          }
          else 
          return false;

    }
}