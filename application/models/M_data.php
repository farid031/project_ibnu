<?php
class M_data extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function get_data($table)
    {
        $db = $this->load->database('default', true);
        return $db->get($table);
    }
    function get_data_where($table, $where)
    {
        $db = $this->load->database('default', true);
        return $db->get_where($table, $where);
    }
    function simpan_data($table, $data)
    {
        $db = $this->load->database('default', true);
        $db->insert($table, $data);
    }
    function update_data($table, $data, $where)
    {
        $db = $this->load->database('default', true);
        $db->update($table, $data, $where);
    }
    function hapus_data($table, $where)
    {
        $db = $this->load->database('default', true);
        $db->delete($table, $where);
    }
    function kosong_data($table)
    {
        $db = $this->load->database('default', true);
        $db->truncate($table);
    }

    function get_all_certificate()
    {
        $query = $this->db->query(
            "SELECT 
                * 
            FROM 
                certificate
                LEFT JOIN ref_jns_certificate ON cert_id_jenis = id_jns_cert
                LEFT JOIN user ON id_user = cert_id_user
            ORDER BY 
                id_cert DESC"
        );

        return $query->result();
    }

    //get data certificate by id_user
    function get_data_certificate($id_user)
    {
        $query = $this->db->query(
            "SELECT 
                * 
            FROM 
                certificate
                LEFT JOIN ref_jns_certificate ON cert_id_jenis = id_jns_cert
                LEFT JOIN user ON id_user = cert_id_user
            WHERE 
                id_user = ".$id_user. "
            ORDER BY 
                id_cert DESC"
        );

        return $query->result();
    }

    function get_cert_by_numb($cert_number)
    {
        $query = $this->db->query(
            "SELECT 
                * 
            FROM 
                certificate
                LEFT JOIN ref_jns_certificate ON cert_id_jenis = id_jns_cert
                LEFT JOIN user ON id_user = cert_id_user
            WHERE 
                cert_no = '" . $cert_number."'"
        );

        return $query->result();
    }

    function get_cert_by_id($id_cert)
    {
        $query = $this->db->query(
            "SELECT 
                * 
            FROM 
                certificate
                LEFT JOIN ref_jns_certificate ON cert_id_jenis = id_jns_cert
                LEFT JOIN user ON id_user = cert_id_user
            WHERE 
                id_cert = " . $id_cert
        );

        return $query->result();
    }

    function get_data_catalog()
    {
        $query = $this->db->query(
            "SELECT 
                *,
                catalog_harga * (catalog_diskon/100) AS hrg_diskon
            FROM 
                catalog
                LEFT JOIN user ON id_user = catalog_created_by
            ORDER BY 
                catalog_created_at DESC"
        );

        return $query->result();
    }

    function get_max_id($table, $field)
    {
        $query = $this->db->query("SELECT MAX(".$field.") AS id FROM ".$table);

        return $query->result();
    }

    function get_count_data($table, $field, $where = '')
    {
        $whr = '';
        if (!empty($where)) {
            $whr = 'WHERE '.$where;
        }
        
        $query = $this->db->query("SELECT COUNT(" . $field . ") AS total FROM " . $table.$whr);

        return $query->result();
    }

    function get_count_member()
    {
        $query = $this->db->query("SELECT COUNT(id_user) AS total FROM user WHERE user_is_admin IS NOT TRUE AND user_is_registered IS TRUE");

        return $query->result();
    }
}
