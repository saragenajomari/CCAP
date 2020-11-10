<?php
class Sellers_model extends CI_Model{ 

  	public function get_seller_list(){

		$this->db->select('*');
        $this->db->from('user');
        $this->db->where('type', 'seller');
        $this->db->where('status', 'active');
        $query=$this->db->get();
        return $query->result();
	}

	public function get_all_outdated_cars($id){
		$date = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('status', 'approved');
		$this->db->where('sellerId', $id);
		$this->db->where('update_car_on <=', $date);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_outdated_parts($id){ 
		$date = date('Y-m-d');

		$this->db->select('*');
		$this->db->from('parts');
		$this->db->where('status', 'approved');
		$this->db->where('seller_id', $id);
		$this->db->where('update_part_on <=', $date);
		$query = $this->db->get();
		return $query->result();
	}

	public function delete_seller($id){
		$status = 'deactivated';
		$data = array('status' => $status );
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('user');
	}

	public function delete_car($id){
		$status = 'removed';
		$data = array('status' => $status );
		$this->db->set($data);
		$this->db->where('sellcar_id', $id);
		$this->db->update('product');
	}

	public function update_car($id){
		$date = date('Y-m-d');
		$data = array('update_car_on' => $date );
		$this->db->set($data);
		$this->db->where('sellcar_id', $id);
		$this->db->update('product');
	}

	public function delete_part($id){
		$status = 'removed';
		$data = array('status' => $status );
		$this->db->set($data);
		$this->db->where('sellparts_id', $id);
		$this->db->update('parts');
	}
}
?>
