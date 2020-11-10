<?php
class Parts_model extends CI_Model{
    
    public function add_parts($itemdata)
    {
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

    public function get_items_approved_parts()
    {
        $status = 'approved';
        $query = $this->db->get_where('parts', array('status' => $status));
        return $query->result();
    }


    public function get_items_parts($id)
    {
        $query = $this->db->get_where('parts', array('sellparts_id' => $id));
        return $query->result();
    }

    public function approve_part($id){
        $this->db->set('status', 'approved');
        $this->db->where('sellparts_id', $id);
        $this->db->update('parts'); 
    }

    public function decline_part($id){
        $this->db->set('status', 'removed');
        $this->db->where('sellparts_id', $id);
        $this->db->update('parts'); 
    }

    public function sold_part($id){
        $this->db->set('status', 'sold');
        $this->db->where('sellparts_id', $id);
        $this->db->update('parts'); 
    }

}
?>