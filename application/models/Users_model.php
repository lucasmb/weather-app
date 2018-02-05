<?php

class Users_model extends CI_Model {

	 function  __construct() {
        $this->table = 'users_search_data';
        parent::__construct();
    }

 function insert_search($data)
    {

        $this->db->trans_begin();
        $this->db->set('user_id', $data['user_id']);
        $this->db->set('city_name', $data['city_name']);
        $this->db->set('lng', $data['lng']);
        $this->db->set('lat', $data['lat']);
        $this->db->set('time', date("Y-m-d H:i:s"));

        $this->db->insert($this->table);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            return false;
        }
        $last_insert_id=$this->db->insert_id();
        $this->db->trans_commit();
        return $last_insert_id;
    }

    public function get_data_by_user_id($ota_id){
        $this->db->where('user_id', $ota_id);
        $this->db->order_by('city_name');
        $query_data =  $this->db->get($this->table);

        if (!empty($query_data))
        {
            $result = $query_data->result_array();
            $query_data->free_result();
            return $result;
        }
        else
            return false;
    }

 function delete_by_id($row_id) {
        $this->db->where('id', $row_id);
        $this->db->delete($this->table); 
 }


}