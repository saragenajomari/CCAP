<?php
class Rating_model extends CI_Model{

public function add_rating($ratingdata)
  {
    $car_id = $ratingdata['id'];
    $rating= $ratingdata['rating'];
    $comment = $ratingdata['comment'];
    $user = $ratingdata['user'];
    $comment_date = $ratingdata['comment_date'];
    
    $sql = "INSERT INTO car_rating(car_id, rating, comment, comment_date, user)
            VALUES ('$car_id','$rating','$comment','$comment_date','$user')";
    $this->db->query($sql);
  } 

  public function delete_rating($ratingdata)
  {
    $id = $ratingdata['id'];
   	$this->db->delete('car_rating', array('id' => $id));
  }

  public function add_rating_part($ratingdata)
  {
    $part_id = $ratingdata['id'];
    $rating= $ratingdata['rating'];
    $comment = $ratingdata['comment'];
    $user = $ratingdata['user'];
    $comment_date = $ratingdata['comment_date'];
    
    $sql = "INSERT INTO part_rating(part_id, rating, comment, comment_date, user)
            VALUES ('$part_id','$rating','$comment','$comment_date','$user')";
    $this->db->query($sql);
  } 

  public function delete_rating_part($ratingdata)
  {
    $id = $ratingdata['id'];
    $this->db->delete('part_rating', array('id' => $id));
  }

  public function data_ave($car_id){
    $this->db->select_avg('rating');
    $this->db->where('car_id', $car_id);
    $query = $this->db->get('car_rating');
    return $query->result();
  }

  public function data_count($car_id){
    $this->db->where('car_id', $car_id);
    return $this->db->count_all_results('car_rating'); 
  }

  public function data_count_one($car_id){
    $this->db->where('car_id', $car_id);
    $this->db->where('rating', 1);
    return $this->db->count_all_results('car_rating'); 
  }

  public function data_count_two($car_id){
    $this->db->where('car_id', $car_id);
    $this->db->where('rating', 2);
    return $this->db->count_all_results('car_rating'); 
  }

  public function data_count_three($car_id){
    $this->db->where('car_id', $car_id);
    $this->db->where('rating', 3);
    return $this->db->count_all_results('car_rating'); 
  }

  public function data_count_four($car_id){
    $this->db->where('car_id', $car_id);
    $this->db->where('rating', 4);
    return $this->db->count_all_results('car_rating'); 
  }

  public function data_count_five($car_id){
    $this->db->where('car_id', $car_id);
    $this->db->where('rating', 5);
    return $this->db->count_all_results('car_rating'); 
  }

  //parts
  public function data_ave_part($part_id){
    $this->db->select_avg('rating');
    $this->db->where('part_id', $part_id);
    $query = $this->db->get('part_rating');
    return $query->result();
  }

  public function data_count_part($part_id){
    $this->db->where('part_id', $part_id);
    return $this->db->count_all_results('part_rating'); 
  }

  public function data_count_one_part($part_id){
    $this->db->where('part_id', $part_id);
    $this->db->where('rating', 1);
    return $this->db->count_all_results('part_rating'); 
  }

  public function data_count_two_part($part_id){
    $this->db->where('part_id', $part_id);
    $this->db->where('rating', 2);
    return $this->db->count_all_results('part_rating'); 
  }

  public function data_count_three_part($part_id){
    $this->db->where('part_id', $part_id);
    $this->db->where('rating', 3);
    return $this->db->count_all_results('part_rating'); 
  }

  public function data_count_four_part($part_id){
    $this->db->where('part_id', $part_id);
    $this->db->where('rating', 4);
    return $this->db->count_all_results('part_rating'); 
  }

  public function data_count_five_part($part_id){
    $this->db->where('part_id', $part_id);
    $this->db->where('rating', 5);
    return $this->db->count_all_results('part_rating'); 
  }
}
?>