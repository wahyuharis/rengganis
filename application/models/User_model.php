<?php
class User_model extends CI_Model
{

    function user_list_order()
    {
        $order = [
            '_user.id_user',
            '_user.username',
            '_user.email',
            '_user.phone',
            '_user.fullname',
            '_jabatan.nama_jabatan',
            '_user.id_user',
            '_user.id_user'
        ];
        return $order;
    }

    function user_list_sql($search, $orderby)
    {
        $sql = "SELECT 
        _user.id_user,
        _user.username,
        _user.email,
        _user.phone,
        _user.fullname,
        _jabatan.nama_jabatan,
        _user.allow_delete,
        _user.id_user
        FROM 
        _user
        
        LEFT JOIN _jabatan
        ON _jabatan.id_jabatan=_user.id_jabatan
        
        WHERE _user.deleted=0

        and (
            _user.username like '%" . $this->db->escape_str($search) . "%' or
            _user.email like '%" . $this->db->escape_str($search) . "%' or
            _user.phone like '%" . $this->db->escape_str($search) . "%' or
            _user.fullname like '%" . $this->db->escape_str($search) . "%' or
            _user.id_user like '%" . $this->db->escape_str($search) . "%'
        )
        " . $orderby . "
         ";

        return $sql;
    }

    function get_jabatan()
    {
        $this->db->where('_jabatan.deleted', 0);
        $db = $this->db->get('_jabatan');

        return $db->result_array();
    }

    function get_user_row($id)
    {
        $this->db->where('id_user', $id);
        $db = $this->db->get('_user');

        if ($db->num_rows() > 0) {
            return $db->row_array();
        } else {
            return false;
        }
    }
}
