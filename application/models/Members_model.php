<?php
class Members_model extends CI_model {
    public function fetch_members(){
        return $this->db->get('members')->result_array();
    }

    public function insert_records($params){
        $this->db->insert('members',$params);
        return $this->db->insert_id();
    }

    public function delete($id){
        $this->db->delete('members',array('id'=>$id));
    }
    public function edit_members($id){
        return $this->db->get_where('members',array('id'=>$id))->result_array();
    }
}