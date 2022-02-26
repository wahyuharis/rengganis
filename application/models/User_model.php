<?php
class User_model extends CI_Model{

    function user_list_order(){
       $order= [
            '_user.username',
            '_user.email',
            '_user.phone',
            '_user.fullname',
            '_user.id_user'
       ];
       return $order;
    }

    function user_list_sql($search,$orderby){
        $sql="SELECT 
        _user.username,
        _user.email,
        _user.phone,
        _user.fullname,
        _user.id_user
        FROM 
        _user
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

}