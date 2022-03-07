<?php
class Gudang_model extends CI_Model
{

    private $table_name = 'gudang';
    private $primary_key = 'id_gudang';

    function list_order()
    {
        $order = array(
            'gudang.id_gudang',
            'gudang.nama_gudang',
            "CONCAT(_lok_regencies.`name`,' - ',_lok_provinces.`name`)",
            'gudang.phone',
            'gudang.allow_delete',
            'gudang.id_gudang'
        );

        return $order;
    }

    function list_sql($search, $orderby)
    {

        $sql = "SELECT 
        gudang.id_gudang,
        gudang.nama_gudang,
        CONCAT(_lok_regencies.`name`,' - ',_lok_provinces.`name`) AS kota,
        gudang.phone,
        gudang.allow_delete,
        gudang.id_gudang
        
        FROM gudang
        
        LEFT JOIN _lok_regencies ON _lok_regencies.id=gudang.kota
        LEFT JOIN _lok_provinces ON _lok_provinces.id=_lok_regencies.province_id

        WHERE gudang.deleted=0
        and gudang.is_sales=0
        and (
            gudang.nama_gudang like '%".$this->db->escape_str($search)."%' or 
            CONCAT(_lok_regencies.`name`,' - ',_lok_provinces.`name`) like '%".$this->db->escape_str($search)."%' or 
            gudang.phone like '%".$this->db->escape_str($search)."%' or 
            gudang.allow_delete like '%".$this->db->escape_str($search)."%' or 
            gudang.id_gudang like '%".$this->db->escape_str($search)."%'
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

    function alamat_kota()
    {
        $sql = "SELECT  
        _lok_regencies.id,
        CONCAT(_lok_regencies.`name`,' - ',_lok_provinces.`name`) AS `kota`
        FROM _lok_regencies
        LEFT JOIN _lok_provinces
        ON _lok_provinces.id=_lok_regencies.province_id";

        $db = $this->db->query($sql);

        return $db->result_array();
    }


}
