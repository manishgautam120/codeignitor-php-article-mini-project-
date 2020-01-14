<?php
class Login extends My_Controller {

    public function index()
	  {
      if($this->session->userdata('user_id')) return redirect('admin/dashboard');
        $this->load->helper('form');
        $this->load->view('public/admin_login');
    }
    //here we validating form of public/admin_login(form validation + db validation) and seting to session if user has data match inside db 
  public function admin_login()
	{
      $this->load->library('form_validation');
      // $this->form_validation->set_rules('username', 'Username', 'required|alpha|trim');
      // $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_error_delimiters('<small class="text-danger text-uppercase">', '</small>');

      if ($this->form_validation->run('admin_rules'))
		  {
            //to recieve data from view to this page we will not use simple php core style 
            $username = $this->input->post('username');
            $password = $this->input->post('password');
          
            //now will laod model and use it for validation
            $this->load->model('loginmodel');
            $login_id = $this->loginmodel->login_valid($username,$password);     //we get id from model//if auth is success
            if($login_id)
            {
            //   $this->load->library('session');//went for auto reload
              $this->session->set_userdata('user_id', $login_id );
              return redirect('admin/dashboard');           //we redirecting we all session is set
            } 
            else    //if password not found we showing flashdata
            {
                $this->session->set_flashdata('login_failed','Invalid/Username & password.');
                return redirect('login');
            }


		 }
	  else
		{ 
            $this->load->view('public/admin_login');
        
		}
  }

  public function logout(){

    $this->session->unset_userdata('user_id');
    return redirect('login');
  }

}