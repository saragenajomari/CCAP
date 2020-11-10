<?php
class Accounts_model extends CI_Model{

  /*public function login(){
    $status = 0;
    $query = $this->db->get_where('user', array('email' => $this->email, 'password' => $this->password));
    return $query->result();
  }*/

  public function login($email,$password){
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    return $this->db->count_all_results('user'); 
  }

  public function login_get_user($email,$password){
    $query = $this->db->get_where('user', array('email' => $email, 'password' => $password));
    return $query->result();
  }
  
  public function add_account($userdata)
  {
    $email = $userdata['email'];
    $password = $userdata['password'];
    $fname = $userdata['fname'];
    $lname = $userdata['lname'];
    $address = $userdata['address'];
    $contact = $userdata['contact'];
    $type = $userdata['type'];
    $sql = "INSERT INTO user (email, password, fname, lname, address, contact, type)
            VALUES ('$email','$password','$fname','$lname','$address','$contact','$type')";
    $result = $this->db->query($sql);
  } 

  public function get_user($id){
    $query = $this->db->get_where('user', array('id' => $id));
    return $query->result();
  }

  public function update_account($userdata,$uid){
    $this->db->where('id',$uid);
    $this->db->update('user',$userdata);
  }
  
}
?>
