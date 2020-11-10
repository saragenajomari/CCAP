<?php
class Ajax_pagination_model extends CI_Model{

    //test function
    function count_all_rating($search)
    {
        $this->db->select('*');
        $this->db->from('car_rating');
        $this->db->where('car_id', $search);
        $query = $this->db->get();
        return $query->num_rows();  
    }
    
    function count_all_rating_part($search)
    {
        $this->db->select('*');
        $this->db->from('part_rating');
        $this->db->where('part_id', $search);
        $query = $this->db->get();
        return $query->num_rows();  
    }

    function count_all($search)
    {
        if($search == 'car'){
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('status', 'pending');
            $query = $this->db->get();
            return $query->num_rows(); 
        }elseif($search == 'part'){
            $this->db->select('*');
            $this->db->from('parts');
            $this->db->where('status', 'pending');
            $query = $this->db->get();
            return $query->num_rows(); 
        }  
    }
    
    function count_all_cars($search){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('status', 'approved');
        if($search != ''){ 
        $this->db->where('seller_name', $search);
        $this->db->like('make',$search, 'after');
        $this->db->or_like('model',$search,'after');
        $this->db->or_like('year',$search,'after');
        $this->db->or_like('seating_capacity',$search,'after');
        $this->db->or_like('transmission',$search,'after');
        $this->db->or_like('bodystyle',$search,'after');
        $this->db->or_like('drive_type',$search,'after');
        $this->db->or_like('fuel_type',$search,'after');
        }
        $query = $this->db->get();
        return $query->num_rows();        
    }

    function count_all_parts($search){

        $this->db->select('*');
        $this->db->from('parts');
        $this->db->where('status', 'approved');
        if($search != ''){
        $this->db->where('seller_name', $search);
        $this->db->like('brand',$search);
        $this->db->or_like('desc',$search);
        $this->db->or_like('color',$search);
        $this->db->or_like('model_name',$search);
        $this->db->or_like('parts_category',$search);
        }
        $query = $this->db->get();
        return $query->num_rows(); 
    }

    function count_all_admin($search){

        if($search == 'car'){
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('status', 'pending');
            $query = $this->db->get();
            return $query->num_rows(); 
        }elseif($search == 'part'){
            $this->db->select('*');
            $this->db->from('parts');
            $this->db->where('status', 'pending');
            $query = $this->db->get();
            return $query->num_rows(); 
        }  
    }

    function count_all_seller($search){

        $uid = $_SESSION['uid'];

        if($search == 'car'){
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('status', 'approved');
            $this->db->where('sellerId', $uid);
            $query = $this->db->get();
            return $query->num_rows(); 
        }elseif($search == 'part'){
            $this->db->select('*');
            $this->db->from('parts');
            $this->db->where('status', 'approved');
            $this->db->where('seller_id', $uid);
            $query = $this->db->get();
            return $query->num_rows(); 
        }  
    }

     function fetch_details_rating_part($limit, $start, $search, $type)
    {
        $output='';
        $i = 0;

            $this->db->select('*');
            $this->db->from('part_rating');
            $this->db->where('part_id', $search);
            $this->db->limit($limit, $start);  
            $query=$this->db->get();
                
            foreach($query->result() as $row){
            if($i%2==1){
                if ($row->rating == 1) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star5"></label> 
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }

                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 2) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 3) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                   
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 4) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 5) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }
           
                
            }else{
                if($row->rating == 1) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" checked disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 2) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" checked disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 3) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" checked disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 4) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" checked disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 5) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" checked disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label>
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }        
            }
            $i++;       
            }
        return $output;     
    }

    //test function
    function fetch_details_rating($limit, $start, $search, $type)
    {
        $output='';
        $i = 0;

            $this->db->select('*');
            $this->db->from('car_rating');
            $this->db->where('car_id', $search);
            $this->db->limit($limit, $start);  
            $query=$this->db->get();
                
            foreach($query->result() as $row){
            if($i%2==1){
                if ($row->rating == 1) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star5"></label> 
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }

                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 2) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 3) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                   
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 4) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 5) {
                    
                    $output .='
                        <div class="rating1">
                        <input type="radio" id="star1" checked disabled><label  id="lab" for="star1" ></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star2"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star3"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star4"></label> 
                        <input type="radio" id="star1" disabled><label  id="lab" for="star5"></label>
                        </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }
           
                
            }else{
                if($row->rating == 1) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" checked disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 2) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" checked disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 3) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" checked disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 4) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" checked disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label> 
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }elseif($row->rating == 5) {
                    $output .='
                    <div class="rating">
                        <input type="radio" name="star" id="star1" checked disabled><label for="star1" ></label> 
                        <input type="radio" name="star" id="star2" disabled><label for="star2"></label> 
                        <input type="radio" name="star" id="star3" disabled><label for="star3"></label> 
                        <input type="radio" name="star" id="star4" disabled><label for="star4"></label> 
                        <input type="radio" name="star" id="star5" disabled><label for="star5"></label>
                        
                    </div>';

                    if($type == "admin"){
                        $output .='<p class="delete_review"><i class="fa fa-trash" onclick="delete_func('.$row->id.')"></i></p>';
                    }
                    
                    $output .='
                        <p class="date_comment">'.$row->comment_date.'</p>
                        <p class="user_info"> By: '.$row->user.'</p>
                        <p class="numeric_rate">'.$row->comment.'</p>
                        
                    ';
                }        
            }
            $i++;       
            }
        return $output;     
    }

    function fetch_details_cars($limit,$start,$search){

        $flag = 0;
        $output=''; 
        if($search != ''){
            $flag = 1;
            $search = strtoupper($search);
            if(preg_match('/\s/',$search)){
                $flag = 2;
                $searchname = explode(" ", $search);
                $search_first = reset($searchname);
                $search_last = end($searchname);
            }
        }
        if($flag == 1){
            $output='';   
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('status', 'approved');
            $this->db->like('make', $search,'both');
            $this->db->or_like('model', $search,'both');
            $this->db->or_like('year',$search,'both');
            $this->db->or_like('seating_capacity',$search,'both');
            $this->db->or_like('transmission',$search,'both');
            $this->db->or_like('bodystyle',$search,'both');
            $this->db->or_like('drive_type',$search,'both');
            $this->db->or_like('fuel_type',$search,'both');
            $this->db->limit($limit,$start);  
            $query=$this->db->get();
            
            foreach($query->result() as $row){
                 $output .='
                <div class="col-md-2 column productbox">
                    <img class="img" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" class="img-responsive">
                    <div class="producttitle">'.$row->year.' '.$row->make.' '.$row->model.'</div>
                    <div class="productprice"><div class="pull-right"><a href="'.site_url('pages/car_details/'.$row->sellcar_id).'" class="btn btn-danger btn-sm" role="button">Check Details</a></div><div class="pricetext"><span style="font-size:15px;">&#8369;</span> '.number_format($row->price,2).'</div></div>
                 </div>
                ';
            }
        }elseif ($flag == 2) {
            $output='';   
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('status', 'approved');
            
            $this->db->where('seller_name', $search);
            $this->db->or_where('model', $search); 
            $this->db->like('make', $search_first);
            $this->db->or_like('model', $search_last, 'both');
            $this->db->or_like('year',$search_last,'both');
            $this->db->or_like('seating_capacity',$search_last,'both');
            $this->db->or_like('transmission',$search_last,'both');
            $this->db->or_like('bodystyle',$search_last,'both');
            $this->db->or_like('drive_type',$search_last,'both');
            $this->db->or_like('fuel_type',$search_last,'both');
            
            $this->db->limit($limit,$start);  
            $query=$this->db->get();
            
            foreach($query->result() as $row){
               $output .='
                <div class="col-md-2 column productbox">
                    <img class="img" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" class="img-responsive">
                    <div class="producttitle">'.$row->year.' '.$row->make.' '.$row->model.'</div>
                    <div class="productprice"><div class="pull-right"><a href="'.site_url('pages/car_details/'.$row->sellcar_id).'" class="btn btn-danger btn-sm" role="button">Check Details</a></div><div class="pricetext"><span style="font-size:15px;">&#8369;</span> '.number_format($row->price,2).'</div></div>
                 </div>
                ';
            }
        }else{
            $output='';   
            $this->db->select('*');
            $this->db->from('product');
            $this->db->where('status', 'approved'); 
            $this->db->limit($limit,$start);  
            $query=$this->db->get();
            
            foreach($query->result() as $row){
                $output .='
                <div class="col-md-2 column productbox">
                <img class="img" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" class="img-responsive">
                <div class="producttitle">'.$row->year.' '.$row->make.' '.$row->model.'</div>
                <div class="productprice"><div class="pull-right"><a href="'.site_url("pages/car_details/".$row->sellcar_id).'" class="btn btn-danger btn-sm" role="button">Check Details</a></div><div class="pricetext"><span style="font-size:15px;">&#8369;</span> '.number_format($row->price,2).'</div></div>
                </div>
                ';
                }
        }    
        
        return $output;
    }

    function fetch_details_parts($limit,$start,$search){
       
        $output='';
        $flag = 0;
        if($search != ''){
            $flag = 1;
            $search = strtoupper($search);
            if(preg_match('/\s/',$search)){
                $flag = 2;
                $searchname = explode(" ", $search);
                $search_first = reset($searchname);
                $search_last = end($searchname);
            }
        }
        

        if($flag == 1){
            $output='';
            $this->db->select('*');
            $this->db->from('parts');
            $this->db->where('status', 'approved');
            $this->db->like('parts_category', $search, 'both');
            $this->db->or_like('brand',$search, 'both');
            $this->db->or_like('model_name',$search, 'both');
            $this->db->limit($limit, $start);  
            $query=$this->db->get();
            
            foreach($query->result() as $row){
                 $output .='
                 <div class="col-md-2 column productbox">
                    <img class="img" src="'.base_url().'uploads/parts/'.$row->picture.'" class="img-responsive">
                    <div class="producttitle">'.$row->brand.' '.$row->model_name.'</div>
                    <div class="productprice"><div class="pull-right"><a href="'.site_url('pages/parts_details/'.$row->sellparts_id).'" class="btn btn-danger btn-sm" role="button">Check Details</a></div><div class="pricetext"><span style="font-size:15px;">&#8369;</span> '.number_format($row->price_range,2).'</div></div>
                </div>';
            }
            return $output;
        }elseif($flag == 2){
            $this->db->select('*');
            $this->db->from('parts');
            $this->db->where('status','approved');
            $this->db->like('parts_category', $search, 'both');
            $this->db->or_like('brand', $search_first, 'both');    
            $this->db->or_like('model_name', $search_last, 'both');
            $this->db->or_like('seller_name', $search, 'both');

            $this->db->limit($limit, $start);  
            $query=$this->db->get();
            
            foreach($query->result() as $row){
            $output .='<div class="col-md-2 column productbox">
                <img class="img" src="'.base_url().'uploads/parts/'.$row->picture.'" class="img-responsive">
                <div class="producttitle">'.$row->brand.' '.$row->model_name.'</div>
                <div class="productprice"><div class="pull-right"><a href="'.site_url('pages/parts_details/'.$row->sellparts_id).'" class="btn btn-danger btn-sm" role="button">Check Details</a></div><div class="pricetext"><span style="font-size:15px;">&#8369;</span> '.number_format($row->price_range,2).'</div></div>
             </div>';
            }
            return $output;
        }else{
            $this->db->select('*');
            $this->db->from('parts');
            $this->db->where('status', 'approved');
            $this->db->limit($limit, $start);  
            $query=$this->db->get();
            
            foreach($query->result() as $row){
            $output .='<div class="col-md-2 column productbox">
                <img class="img" src="'.base_url().'uploads/parts/'.$row->picture.'" class="img-responsive">
                <div class="producttitle">'.$row->brand.' '.$row->model_name.'</div>
                <div class="productprice"><div class="pull-right"><a href="'.site_url('pages/parts_details/'.$row->sellparts_id).'" class="btn btn-danger btn-sm" role="button">Check Details</a></div><div class="pricetext"><span style="font-size:15px;">&#8369;</span> '.number_format($row->price_range,2).'</div></div>
             </div>';
            }  
            return $output;
        }
        //return $output; 
    }

    function fetch_details_admin($limit,$start,$search){
       
        $output='';
        $uid = $_SESSION['uid'];
            if($search=='car'){
                $this->db->select('*');
                $this->db->from('product');
                $this->db->where('status', 'pending');
                $this->db->limit($limit, $start);  
                $query=$this->db->get();
                $link = base_url().'uploads/cars/';
                $i = 1;
                $tran;

                foreach($query->result() as $row){
                    if($row->transmission == 'AT'){
                        $tran = 'Automatic';
                    }else if($row->transmission == 'MT'){
                        $tran = 'Manual';
                    }else{
                        $tran = 'CVT';

                    }
                    if(($i % 2) == 1){
                        $output .= '
                        <div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplace" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImage(\''.$row->pictureOne.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureThree.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureFour.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFour.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureFive.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFive.'" alt="" /></a>
                            </div>
                        </div>
                        <div class="item-description-dash">
                            <p class="detail" id="">'.$row->year.'</p>
                            <p class="detail" id="">'.$row->make.'</p>
                            <p class="detail" id="">'.$row->model.'</p>
                            <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price,2).'</p>
                            <div style="font-weight:bold;" class="detail-body">
                            <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                            <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                            </div>
                            <div class="detail-body">
                            <p class="detail-left">Transmission: <b><em>'.$tran.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Cylinder Engine: <b><em>'.ucfirst($row->cylinder_engine).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Drive Type: <b><em>'.ucfirst($row->drive_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Fuel Type: <b><em>'.ucfirst($row->fuel_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Mileage: <b><em>'.number_format($row->mileage).' km</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Seating Capacity: <b><em>'.$row->seating_capacity.'</em></p><p class="detail-divider">|</p>
                            <p class="detail-left">Body Style: <b><em>'.ucfirst($row->bodystyle).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Doors: <b><em>'.ucfirst($row->door).'</em></b></p><p class="detail-divider">|</p>
                            </div>
                            <div class="detail-body">
                            <p class="">Note: <b><em>'.$row->note.'</em></b></p>
                            <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></b></p><br>
                            </div>
                        </div>
                        <div class="detail-button">
                            <button onclick="carApprove('.$row->sellcar_id.')" style="float:left; margin-right:2pt;" class="btn btn-success">Approve</button>
                            <button onclick="carDecline('.$row->sellcar_id.')" style="float:left;" class="btn btn-danger">Decline</button>
                        </div>
                        </div>
                        ';
                    }else if(($i % 2) == 0){
                        $output .= '
                        <a href=""><div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplaceTwo" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureOne.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureThree.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureFour.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFour.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureFive.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFive.'" alt="" /></a>
                            </div>
                        </div>
                        <div class="item-description-dash">
                            <p class="detail" id="">'.$row->year.'</p>
                            <p class="detail" id="">'.$row->make.'</p>
                            <p class="detail" id="">'.$row->model.'</p>
                            <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price,2).'</p>
                            <div style="font-weight:bold;" class="detail-body">
                            <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                            <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                            </div>
                            <div class="detail-body">
                            <p class="detail-left">Transmission: <b><em>'.$tran.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Cylinder Engine: <b><em>'.ucfirst($row->cylinder_engine).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Drive Type: <b><em>'.ucfirst($row->drive_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Fuel Type: <b><em>'.ucfirst($row->fuel_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Mileage: <b><em>'.number_format($row->mileage).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Seating Capacity: <b><em>'.$row->seating_capacity.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Body Style: <b><em>'.ucfirst($row->bodystyle).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Doors: <b><em>'.ucfirst($row->door).'</em></b></p><p class="detail-divider">|</p>
                            </div>
                            <div class="detail-body">
                            <p class="">Note: <b><em>'.$row->note.'</em></b></p>
                            <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></b></p><br>
                            </div>
                        </div>
                        <div class="detail-button">
                        <button onclick="carApprove('.$row->sellcar_id.')" style="float:left; margin-right:2pt;" class="btn btn-success">Approve</button>
                        <button onclick="carDecline('.$row->sellcar_id.')" style="float:left;" class="btn btn-danger">Decline</button>
                        </div>
                        </div></a>
                        ';  
                    }   
                     $i++;   
                }
                return $output;
            }elseif($search == 'part'){
                $this->db->select('*');
                $this->db->from('parts');
                $this->db->where('status','pending');
                $this->db->limit($limit,$start);  
                $query=$this->db->get();
                $link = base_url().'uploads/parts/';
                $i = 1;

                foreach($query->result() as $row){

                    $cat = strtolower($row->parts_category); 
                    if(($i % 2) == 1){
                        $output .= '
                        <div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplace" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImage(\''.$row->picture.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureThree.'" alt="" /></a>
                            </div>
                        </div>
                        <div class="item-description-dash">
                            <p class="detail" id="">'.$row->brand.'</p>
                            <p class="detail" id="">'.$row->model_name.'</p>
                            <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price_range,2).'</p>
                            <div style="font-weight:bold;" class="detail-body">
                            <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                            <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                            </div>
                            <div class="detail-body">
                            <p class="detail-left">Category: <b><em>'.ucfirst($cat).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                            </div>
                            <div class="detail-body">
                            <p class="">Description: <b><em>'.$row->desc.'</em></b></p>
                            <p class="">Description: <b><em>'.$row->note.'</em></b></p>
                            <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></b></p><br>
                            </div>
                        </div>
                        <div class="detail-button">
                            <button onclick="partApprove('.$row->sellparts_id.')" style="float:left; margin-right:2pt;" class="btn btn-success">Approve</button>
                            <button onclick="partDecline('.$row->sellparts_id.')" style="float:left;" class="btn btn-danger">Decline</button>
                        </div>
                        </div>
                        ';
                    }else if(($i % 2) == 0){
                        $output .= '
                        <a href=""><div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplaceTwo" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImageSecond(\''.$row->picture.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureThree.'" alt="" /></a>
                        </div>
                        </div>
                        <div class="item-description-dash">
                        <p class="detail" id="">'.$row->brand.'</p>
                        <p class="detail" id="">'.$row->model_name.'</p>
                        <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price_range,2).'</p>
                        <div style="font-weight:bold;" class="detail-body">
                        <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                        <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                        </div>
                        <div class="detail-body">
                        <p class="detail-left">Category: <b><em>'.ucfirst($cat).'</em></b></p><p class="detail-divider">|</p>
                        <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                        </div>
                        <div class="detail-body">
                        <p class="">Description: <b><em>'.$row->desc.'</em></b></p>
                        <p class="">Description: <b><em>'.$row->note.'</em></b></p>
                        <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></b></p><br>
                        </div>
                    </div>
                    <div class="detail-button">
                        <button onclick="partApprove('.$row->sellparts_id.')" style="float:left; margin-right:2pt;" class="btn btn-success">Approve</button>
                        <button onclick="partDecline('.$row->sellparts_id.')" style="float:left;" class="btn btn-danger">Decline</button>
                    </div>
                        </div></a>
                        ';  
                    }   
                     $i++;   
                }
            return $output;
            }
    }

    function fetch_details_seller($limit,$start,$search){
       
             $output='';
            $uid = $_SESSION['uid'];

            if($search=='car'){
                $this->db->select('*');
                $this->db->from('product');
                $this->db->where('status', 'approved');
                $this->db->where('sellerId', $uid);
                $this->db->limit($limit, $start);  
                $query=$this->db->get();
                $link = base_url().'uploads/cars/';
                $i = 1;
                $tran;

                foreach($query->result() as $row){
                    if($row->transmission == 'AT'){
                        $tran = 'Automatic';
                    }else{
                        $tran = 'Manual';
                    }
                    if(($i % 2) == 1){
                        $output .= '
                        <div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplace" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImage(\''.$row->pictureOne.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureThree.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureFour.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFour.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureFive.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFive.'" alt="" /></a>
                            </div>
                        </div>
                        <div class="item-description-dash">
                            <p class="detail" id="">'.$row->year.'</p>
                            <p class="detail" id="">'.$row->make.'</p>
                            <p class="detail" id="">'.$row->model.'</p>
                            <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price,2).'</p>
                            <div style="font-weight:bold;" class="detail-body">
                            <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                            <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                            </div>
                            <div class="detail-body">
                            <p class="detail-left">Transmission: <b><em>'.$tran.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Cylinder Engine: <b><em>'.ucfirst($row->cylinder_engine).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Drive Type: <b><em>'.ucfirst($row->drive_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Fuel Type: <b><em>'.ucfirst($row->fuel_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Mileage: <b><em>'.$row->mileage.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Seating Capacity: <b><em>'.$row->seating_capacity.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Body Style: <b><em>'.ucfirst($row->bodystyle).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Doors: <b><em>'.ucfirst($row->door).'</em></b></p><p class="detail-divider">|</p>
                            </div>
                            <div class="detail-body">
                            <p class="">Note: <b><em>'.$row->note.'</em></b></p>
                            <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></p></b><br>
                            </div> 
                        </div>
                        <div class="detail-button">
                        <a href="'.site_url('pages/edit_car/'.$row->sellcar_id).'"><button onclick="" style="float:left; margin-right:2pt;" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button></a>
                        <button onclick="carSold('.$row->sellcar_id.')" style="float:left; margin-right:2pt;" class="btn btn-success"><i class="fa fa-check"></i> Mark As Sold</button>
                        <button onclick="carDecline('.$row->sellcar_id.')" style="float:left;" class="btn btn-danger"><i class="fa fa-trash"></i> Remove Post</button>
                        </div>
                        </div>
                        ';
                    }else if(($i % 2) == 0){
                        $output .= '
                        <a href=""><div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplaceTwo" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureOne.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureOne.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureThree.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureFour.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFour.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureFive.'\');"><img class="img-option-pic" src="'.base_url().'uploads/cars/'.$row->pictureFive.'" alt="" /></a>
                            </div>
                        </div>
                        <div class="item-description-dash">
                            <p class="detail" id="">'.$row->year.'</p>
                            <p class="detail" id="">'.$row->make.'</p>
                            <p class="detail" id="">'.$row->model.'</p>
                            <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price,2).'</p>
                            <div style="font-weight:bold;" class="detail-body">
                            <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                            <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                            </div>
                            <div class="detail-body">
                            <p class="detail-left">Transmission: <b><em>'.$tran.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Cylinder Engine: <b><em>'.ucfirst($row->cylinder_engine).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Drive Type: <b><em>'.ucfirst($row->drive_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Fuel Type: <b><em>'.ucfirst($row->fuel_type).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Mileage: <b><em>'.$row->mileage.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Seating Capacity: <b><em>'.$row->seating_capacity.'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Body Style: <b><em>'.ucfirst($row->bodystyle).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Doors: <b><em>'.ucfirst($row->door).'</em></b></p><p class="detail-divider">|</p>
                            </div>
                            <div class="detail-body">
                            <p class="">Note: <b><em>'.$row->note.'</em></b></p>
                            <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></b></p><br>
                            </div>
                        </div>
                        <div class="detail-button">
                        <a href="'.site_url('pages/edit_car/'.$row->sellcar_id).'"><button onclick="" style="float:left; margin-right:2pt;" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button></a>
                        <button onclick="carSold('.$row->sellcar_id.')" style="float:left; margin-right:2pt;" class="btn btn-success"><i class="fa fa-check"></i> Mark As Sold</button>
                        <button onclick="carDecline('.$row->sellcar_id.')" style="float:left;" class="btn btn-danger"><i class="fa fa-trash"></i> Remove Post</button>
                        </div>
                        </div></a>
                        ';  
                    }   
                     $i++;   
                }
                return $output;
            }elseif($search == 'part'){
                $this->db->select('*');
                $this->db->from('parts');
                $this->db->where('status', 'approved');
                $this->db->where('seller_id', $uid);
                $this->db->limit($limit, $start);  
                $query=$this->db->get();
                $link = base_url().'uploads/parts/';
                $i = 1;

                foreach($query->result() as $row){

                    $cat = strtolower($row->parts_category); 
                    if(($i % 2) == 1){
                        $output .= '
                        <div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplace" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImage(\''.$row->picture.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImage(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureThree.'" alt="" /></a>
                            </div>
                        </div>
                        <div class="item-description-dash">
                            <p class="detail" id="">'.$row->brand.'</p>
                            <p class="detail" id="">'.$row->model_name.'</p>
                            <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price_range,2).'</p>
                            <div style="font-weight:bold;" class="detail-body">
                            <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                            <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                            </div>
                            <div class="detail-body">
                            <p class="detail-left">Category: <b><em>'.ucfirst($cat).'</em></b></p><p class="detail-divider">|</p>
                            <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                            </div>
                            <div class="detail-body">
                            <p class="">Description: <b><em>'.$row->desc.'</em></b></p>
                            <p class="">Note: <b><em>'.$row->note.'</em></b></p>
                            <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></b></p><br>
                            </div>
                        </div>
                        <div class="detail-button">
                        <a href="'.site_url('pages/edit_part/'.$row->sellparts_id).'"><button onclick="" style="float:left; margin-right:2pt;" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button></a>
                        <button onclick="partSold('.$row->sellparts_id.')" style="float:left; margin-right:2pt;" class="btn btn-success"><i class="fa fa-check"></i> Mark As Sold</button>
                        <button onclick="partDecline('.$row->sellparts_id.')" style="float:left;" class="btn btn-danger"><i class="fa fa-trash"></i> Remove Post</button>
                        </div>
                        </div>
                        ';
                    }else if(($i % 2) == 0){
                        $output .= '
                        <a href=""><div class="item item_thmbnl_dash">
                        <div class="img-div">
                            <img class="img_dash" id="imageReplaceTwo" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" />
                            <div class="img-option">
                            <a href="#" onclick="changeImageSecond(\''.$row->picture.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->picture.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureTwo.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureTwo.'" alt="" /></a>
                            <a href="#" onclick="changeImageSecond(\''.$row->pictureThree.'\');"><img class="img-option-pic" src="'.base_url().'uploads/parts/'.$row->pictureThree.'" alt="" /></a>
                        </div>
                        </div>
                        <div class="item-description-dash">
                        <p class="detail" id="">'.$row->brand.'</p>
                        <p class="detail" id="">'.$row->model_name.'</p>
                        <p style="float:right; color:#ff5500;" class="detail"><span style="font-size:22px;">&#8369;</span> '.number_format($row->price_range,2).'</p>
                        <div style="font-weight:bold;" class="detail-body">
                        <p class="detail-left">Dealer Name: '.$row->seller_name.'</p>
                        <p class="detail-right">Date Posted: '.$row->post_date.'</p><br>
                        </div>
                        <div class="detail-body">
                        <p class="detail-left">Category: <b><em>'.ucfirst($cat).'</em></b></p><p class="detail-divider">|</p>
                        <p class="detail-left">Color: <b><em>'.ucfirst($row->color).'</em></b></p><p class="detail-divider">|</p>
                        </div>
                        <div class="detail-body">
                        <p class="">Description: <b><em>'.$row->desc.'</em></b></p>
                        <p class="">Note: <b><em>'.$row->note.'</em></b></p>
                        <p style="margin-bottom:0pt; padding-bottom:0pt;" class="">Reason For Selling: <b><em>'.$row->rfs.'</em></b></p><br>
                        </div>
                    </div>
                    <div class="detail-button">
                        <a href="'.site_url('pages/edit_part/'.$row->sellparts_id).'"><button onclick="" style="float:left; margin-right:2pt;" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</button></a>
                        <button onclick="partSold('.$row->sellparts_id.')" style="float:left; margin-right:2pt;" class="btn btn-success"><i class="fa fa-check"></i> Mark As Sold</button>
                        <button onclick="partDecline('.$row->sellparts_id.')" style="float:left;" class="btn btn-danger"><i class="fa fa-trash"></i> Remove Post</button>
                        </div>
                    </div></a>
                        ';  
                    }   
                     $i++;   
                }
                return $output;
            }
    }
} 
?>