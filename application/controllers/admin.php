<?php
class Admin extends My_Controller {

    
    public function dashboard(){
                                                        //setting pagination
                $this->load->library('pagination');
                $config=[
                    'base_url'                  =>   base_url('admin/dashboard'),
                    'per_page'                  =>   5,
                    'total_rows'                =>   $this->article->num_rows(),
                    'full_tag_open'             =>   "<ul class='pagination'>",
                    'full_tag_close'            =>   "</ul>",
                    'first_link_open'           =>   '<li>',
                    'first_link_close'           =>   '</li>',
                    'first_tag_open'           =>    '<li>',
                    'first_tag_close'          =>    '</li>',
                    'next_tag_open'             =>   '<li>',
                    'next_tag_close'            =>   '</li>',
                    'prev_tag_open'             =>   '<li>',
                    'prev_tag_close'            =>   '</li>',
                    'num_tag_open'              =>   '<li>',
                    'num_tag_close'             =>   '</li>',
                    'cur_tag_open'              =>   "<li class='active'><a>",
                    'cur_tag_close'             =>   '</a></li>',

                ];

                $this->pagination->initialize($config);

                 //form helper is loading from constructor
                //model is loading from constructor
                $articles = $this->article->article_list($config['per_page'],$this->uri->segment(3));
                $this->load->view('admin/dashboard', ['articles'=>$articles]);
    }
    public function add_article(){
               //form helper is loading from constructor
                $this->load->view('admin/add_article');               //if you redirect error massage will not shown
                
    }
   
    public function store_article(){
                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<small class="text-danger text-uppercase">', '</small>');

                if($this->form_validation->run('article_rules'))
    		    { 
                      $post = $this->input->post();     //this is latest form of taking all user input into one array but on this submit will also include which i dont want 
                      unset($post['submit']);
                     //model is loading from constructor
                     return $this->_flashAndRedirect(
                                                $this->article->add_article($post),
                                                'Article Added Successfully.',
                                                'Article Failed To Add ! Please Try Again.'
                                            );
                   
                }
                else
                {
                    $this->load->view('admin/add_article');

                }
      
    }
    public function edit_article($article_id){
        //form helper is loading from constructor
       //model is loading from constructor
        $article=$this->article->find_article($article_id);
        $this->load->view('admin/edit_article',['article'=>$article]);
        
       
 
    }
    public function update_article($article_id){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<small class="text-danger text-uppercase">', '</small>');
        if($this->form_validation->run('article_rules'))
        {
              $post = $this->input->post(); 
              unset($post['submit']);
             //model is loading from constructor
             //alert and redirect is calling from private method
             return $this->_flashAndRedirect(
                                          $this->article->update_article($article_id,$post),
                                         'Article Updated Successfully.',
                                         'Article Failed To update ! Please Try Again.'
                                     );
            
        }
        else
        {
            $this->load->view('admin/edit_article');

        }
       
 
    }
    public function delete_article(){

        $article_id = $this->input->post('article_id');
       
       //model is loading from constructor
       //model is loading from constructor
       //alert and redirect is calling from private method
       return $this->_flashAndRedirect(
                                    $this->article->delete_article($article_id),
                                    'Article Deleted Successfully.',
                                    'Article failed to Delete ! Please Try Again.'
                                );
 
    }
    
    public function __construct()
    {

        parent::__construct();
        if(!$this-> session->userdata('user_id'))
            return redirect('login');
            $this->load->model('articlesmodel','article');
            $this->load->helper('form');
    }
    private function _flashAndRedirect($successfull,$successMsg,$failureMsg){
        if($successfull){
            $this->session->set_flashdata('feedback',$successMsg);
            $this->session->set_flashdata('feedback_color_dynamic','alert-success');
            }
        else{
            $this->session->set_flashdata('feedback',$failureMsg);
            $this->session->set_flashdata('feedback_color_dynamic','alert-danger');
           }    
           return redirect('admin/dashboard');


    }
    

}