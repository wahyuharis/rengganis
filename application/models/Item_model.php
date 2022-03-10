<?php
class Item_model extends CI_Model
{

    private $table_name = 'item';
    private $primary_key = 'id_item';

    function list_order()
    {
        $order = array(
            'item.id_item',
            'item.kode_item',
            'item.foto',
            'item.item_nama',
            'item.satuan',
            'item.harga_jual',
            'item.harga_beli',
            'item_jenis_imp_f(item.id_item)',
           
        );

        return $order;
    }

    function list_sql($search, $orderby)
    {

        $sql = "SELECT 
        item.id_item, 
        item.kode_item,
        item.foto, 
        item.item_nama,
         item.satuan, 
         item.harga_jual, 
         item.harga_beli,
         item_jenis_imp_f(item.id_item) AS jenis_item
       
         FROM item 
        
         WHERE item.deleted=0 
        and
        (
            item.kode_item like '%" . $this->db->escape_str($search) . "%'  or
            item.item_nama like '%" . $this->db->escape_str($search) . "%'  or
            item.satuan like '%" . $this->db->escape_str($search) . "%'  or
            item.harga_jual like '%" . $this->db->escape_str($search) . "%'  or
            item.harga_beli like '%" . $this->db->escape_str($search) . "%'    or
            item_jenis_imp_f(item.id_item) like  '%" . $this->db->escape_str($search) . "%' 
        )

            " . $orderby . "
        ";

        return $sql;
    }

    function get_total_row($search=''){
        $where="item.deleted=0 
        and
        (
            item.kode_item like '%" . $this->db->escape_str($search) . "%'  or
            item.item_nama like '%" . $this->db->escape_str($search) . "%'  or
            item.satuan like '%" . $this->db->escape_str($search) . "%'  or
            item.harga_jual like '%" . $this->db->escape_str($search) . "%'  or
            item.harga_beli like '%" . $this->db->escape_str($search) . "%'    or
            item_jenis_imp_f(item.id_item) like  '%" . $this->db->escape_str($search) . "%' 
        )";
        $this->db->where($where);
        $this->db->select('item.id_item');

        return $this->db->count_all_results('item');
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


    function get_item_jenis()
    {
        $this->db->where('item_jenis.deleted', 0);
        $db = $this->db->get('item_jenis');

        if ($db->num_rows() > 0) {
            return $db->result_array();
        } else {
            return false;
        }
    }

    function get_item_jenis_selected($id_item)
    {
        $return = array();

        $this->db->where('id_item', $id_item);
        $this->db->select('id_item_jenis');
        $db = $this->db->get('item_rel_item_jenis');

        foreach ($db->result_array() as $row) {
            array_push($return, $row['id_item_jenis']);
        }

        if ($db->num_rows() > 0) {
            return $return;
        } else {
            return false;
        }
    }
}
