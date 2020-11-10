<?php
class Product_model extends CI_Model{
    
    public function add_product($itemdata)
    {
        $this->db->insert('product', $itemdata);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit_product($itemdata,$id){
        $this->db->where('sellcar_id', $id);
        $this->db->update('product', $itemdata);
    } 

    public function add_part($itemdata){
        $this->db->insert('parts', $itemdata);
        if ($this->db->affected_rows() == '1')
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function edit_parts($itemdata,$id){
        $this->db->where('sellparts_id', $id);
        $this->db->update('parts', $itemdata);
    } 

    public function get_items_approved()
    {
        $status = 'approved';
        $query = $this->db->get_where('product', array('status' => $status));
        return $query->result();
    }
    
    public function get_items($id)
    {
        $query = $this->db->get_where('product', array('sellcar_id' => $id));
        return $query->result();
    }

    public function approve_car($id){
        $this->db->set('status', 'approved');
        $this->db->where('sellcar_id', $id);
        $this->db->update('product'); 
    }

    public function decline_car($id){
        $this->db->set('status', 'removed');
        $this->db->where('sellcar_id', $id);
        $this->db->update('product'); 
    }

    public function sold_car($id){
        $this->db->set('status', 'sold');
        $this->db->where('sellcar_id', $id);
        $this->db->update('product'); 
    }
    
}
?>