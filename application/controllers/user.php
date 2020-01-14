<?php
class User extends My_Controller {

    public function index()
	{
        $this->load->helper('form');
        $this->load->model('articlesmodel' );
       
        $this->load->library('pagination');
        $config=[
            'base_url'                  =>   base_url('user/index'),
            'per_page'                  =>   5,
            'total_rows'                =>   $this->articlesmodel->all_num_rows(),
            'full_tag_open'             =>   "<ul class='pagination'>",
            'full_tag_close'            =>   "</ul>",
            'first_link_open'           =>   'First',
            'first_link_close'           =>  'Last',
            'first_tag_open'            =>    "<li>",
            'first_tag_close'           =>    "</li>",
            'next_tag_open'             =>   '<li>',
            'next_tag_close'            =>   '</li>',
            'prev_tag_open'             =>   '<li>',
            'prev_tag_close'            =>   '</li>',
            'num_tag_open'              =>   '<li>',
            'num_tag_close'             =>   '</li>',
            'cur_tag_open'              =>   "<li class='active'><a>",
            'cur_tag_close'             =>   "</a></li>"

        ];

        $this->pagination->initialize($config);

        $articles = $this->articlesmodel->all_article_list($config['per_page'],$this->uri->segment(3));
        $this->load->view('public/article_list',compact('articles'));
    }
    
    public function search(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('query','Query','required');
        if(!$this->form_validation->run())
            return $this->index();
            $query = $this->input->post('query');
            return redirect ("user/search_results/$query");
            // $this->load->model('articlesmodel','articles');
            // $articles = $this->articles->search($query);
            // $this->load->view('public/search_result',compact('articles'));
           
    }

    public function search_results($query){
        $this->load->helper('form');
        $this->load->model('articlesmodel' ,'articles');
        $this->load->library('pagination');

        $config=[
                    'base_url'                  =>   base_url("user/search_results/$query"),
                    'per_page'                  =>   5,
                    'total_rows'                =>   $this->articles->count_search_results($query),
                    'full_tag_open'             =>   "<ul class='pagination'>",
                    'full_tag_close'            =>   "</ul>",
                    'first_link_open'           =>   '<li>',
                    'uri_segment'               =>     4,
                    'first_link_close'          =>   '</li>',
                    'first_tag_open'            =>    "<li>",
                    'first_tag_close'           =>    "</li>",
                    'next_tag_open'             =>   '<li>',
                    'next_tag_close'            =>   '</li>',
                    'prev_tag_open'             =>   '<li>',
                    'prev_tag_close'            =>   '</li>',
                    'num_tag_open'              =>   '<li>',
                    'num_tag_close'             =>   '</li>',
                    'cur_tag_open'              =>   "<li class='active'><a>",
                    'cur_tag_close'             =>   "</a></li>"

        ];

        $this->pagination->initialize($config);

        $articles = $this->articles->search($query, $config['per_page'], $this->uri->segment(4));
        $this->load->view('public/search_result',compact('articles'));

    }
    
    public function article($id){
        $this->load->helper('form');
        $this->load->model('articlesmodel','articles');
        $article = $this->articles->find($id); 
        $this->load->view('public/article_detail', compact('article'));
    }
  

}