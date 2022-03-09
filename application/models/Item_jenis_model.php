<?php
class Item_jenis_model extends CI_Model
{

    private $table_name = 'item_jenis';
    private $primary_key = 'id_item_jenis';

    function list_order()
    {
        $order = array(
            'item_jenis.id_item_jenis',
            'item_jenis.item_jenis_nama',
          
        );

        return $order;
    }

    function list_sql($search, $orderby)
    {

        $sql = "SELECT 
        item_jenis.id_item_jenis,
        item_jenis.item_jenis_nama
       
        
        FROM item_jenis
        
     
        WHERE item_jenis.deleted=0
        and (
            item_jenis.item_jenis_nama like '%".$this->db->escape_str($search)."%' 
        )

            " . $orderby . "
        ";

        return $sql;
    }

    function get_row($id)
    {

        $this->db->where($this->primary_key, $id);
        $db = $this->db->get($this->table_name);

        if ($db->num_rows() > 0) {
            return $db->row_array();
        } else {
            return false;
        }
    }
}