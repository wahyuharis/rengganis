<?php
class Jabatan_model extends CI_Model
{

    private $table_name = '_jabatan';
    private $primary_key = 'id_jabatan';

    function list_order()
    {
        $order = array(
            '_jabatan.nama_jabatan',
            '_jabatan.id_jabatan'
        );

        return $order;
    }

    function list_sql($search, $orderby)
    {

        $sql = "SELECT 
        _jabatan.nama_jabatan ,
        _jabatan.id_jabatan
        FROM _jabatan
        WHERE
        _jabatan.deleted=0
        AND
        _jabatan.allow_delete=1
        and
        _jabatan.nama_jabatan like '%" . $this->db->escape_str($search) . "%'

            " . $orderby . "
        ";

        return $sql;
    }

    function get_row($id)
    {

        $this->db->where($this->primary_key, $id);
        $db = $this->db->get('_jabatan');

        if ($db->num_rows() > 0) {
            return $db->row_array();
        } else {
            return false;
        }
    }
}
