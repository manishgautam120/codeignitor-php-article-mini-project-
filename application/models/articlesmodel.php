<?php
class Articlesmodel extends CI_model
{

    public function article_list($limit, $offset){
       $user_id = $this->session->userdata('user_id');
       $query =$this->db
                           ->select(['title','id']) //    ->select('title')
                           ->from('articles')
                            ->where('user_id',$user_id)
                            ->limit($limit, $offset)
                            ->get();
                return $query->result();
    }
    public function all_article_list($limit, $offset){
       $query =$this->db
                           ->select(['title','id','created_at']) //    ->select('title')
                           ->from('articles')
                            ->limit($limit, $offset)
                            ->order_by('created_at','DESC')
                            ->get();
                return $query->result();
    }

    public function add_article($array){
        return $this->db->insert('articles',$array);                     //if post fields name would be different on compare to database column name than you can't pass directly
                                                         //return true if atleast one row affected 
    }
    public function find_article($article_id){
       $q = $this->db->select(['id','title','body'])
                 ->where('id',$article_id)
                 ->get('articles');
                 return $q->row();
    }
    public function update_article($article_id,Array $article){
       
        return $this->db->where('id',$article_id)
                        ->update('articles',$article);
       
 
    }
    public function delete_article( $article_id){
       
        return $this->db->delete('articles',['id'=>$article_id]);
       
 
    }
    public function num_rows(){
        $user_id = $this->session->userdata('user_id');
        $query =$this->db
                            ->select(['title','id']) //    ->select('title')
                            ->from('articles')
                             ->where('user_id',$user_id)
                             ->get();
                 return $query->num_rows();
    }
    public function all_num_rows(){
       
        $query =$this->db
                            ->select(['title','id']) //    ->select('title')
                            ->from('articles')
                             ->get();
                 return $query->num_rows();
    }


    public function search($query,$limit,$offset){
       $q = $this->db->from('articles')
                     ->like( 'title', $query )
                     ->limit( $limit, $offset  )
                     ->get();
                     return $q->result();

    }
    public function count_search_results($query){

        $q = $this->db->from('articles')
                        ->like('title', $query)
                        ->get();
                        return $q->num_rows();
    }

    public function find($id){
        $q = $this->db->from('articles')
                      ->where(['id'=>$id])
                      ->get();
            if($q->num_rows()) 
                 return $q->row();
                return false;
               
    }
}