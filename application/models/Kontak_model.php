<?php
class Kontak_model extends CI_Model
{

    private $table_name = 'kontak';
    private $primary_key = 'id_kontak';

    function list_order()
    {
        $order = array(
            'kontak.nama_kontak',
            'kontak.jenis_kontak',
            'kontak.telphone_kantor',
            'kontak.whatsapp',
            'kontak.email',
            "CONCAT(_lok_regencies.`name`,' - ',_lok_provinces.`name`)"
        );

        return $order;
    }

    function list_sql($search, $orderby)
    {

        $sql = "SELECT 

            kontak.nama_kontak,
            kontak.jenis_kontak,
            kontak.telphone_kantor,
            kontak.whatsapp,
            kontak.email,
            CONCAT(_lok_regencies.`name`,' - ',_lok_provinces.`name`) AS alamat_kota,
            kontak.id_kontak
        
        FROM kontak
        
        LEFT JOIN _lok_regencies ON _lok_regencies.id=kontak.kota
        LEFT JOIN _lok_provinces ON _lok_provinces.id=_lok_regencies.province_id
        
        WHERE 
        kontak.deleted = 0
        AND (
            kontak.nama_kontak like '%" . $this->db->escape_str($search) . "%' or
            kontak.jenis_kontak like '%" . $this->db->escape_str($search) . "%' or
            kontak.telphone_kantor like '%" . $this->db->escape_str($search) . "%' or
            kontak.whatsapp like '%" . $this->db->escape_str($search) . "%' or
            kontak.email like '%" . $this->db->escape_str($search) . "%' or
            kontak.kota like '%" . $this->db->escape_str($search) . "%' or
            CONCAT(_lok_regencies.`name`,' - ',_lok_provinces.`name`) like '%" . $this->db->escape_str($search) . "%'
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

    function jenis_kontak(){
        $array=array(
            'supplier' => 'supplier',
            'customer' => 'customer'
        );

        return $array;
    }
}
