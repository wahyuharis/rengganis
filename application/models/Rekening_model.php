<?php
class Rekening_model extends CI_Model
{

    private $table_name = 'buku_kas_rekening';
    private $primary_key = 'id_buku_kas_rekening';

    function list_order()
    {
        $order = array(
            'buku_kas_rekening.id_buku_kas_rekening',
            'buku_kas_rekening.nama_rekening',
            'buku_kas_rekening.nomor_rekening',
            'buku_kas_rekening.document',
         
        );

        return $order;
    }

    function list_sql($search, $orderby)
    {

        $sql = "SELECT 
        buku_kas_rekening.id_buku_kas_rekening,
        buku_kas_rekening.nama_rekening,
        buku_kas_rekening.nomor_rekening,
        buku_kas_rekening.document
        FROM buku_kas_rekening
        WHERE
        buku_kas_rekening.deleted=0
        and
        (
            
            buku_kas_rekening.nama_rekening like '%".$this->db->escape_str($search)."%' or
            buku_kas_rekening.nomor_rekening like '%".$this->db->escape_str($search)."%' 
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