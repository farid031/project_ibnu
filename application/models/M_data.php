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

    function get_data_banner()
    {
        $query = $this->db->query(
            "SELECT 
                *
            FROM 
                landing_page_banner
            ORDER BY 
                id_banner DESC"
        );

        return $query->result();
    }

    function get_banner_by_id($id_banner)
    {
        $query = $this->db->query(
            "SELECT 
                * 
            FROM 
                landing_page_banner
            WHERE 
                id_banner = " . $id_banner
        );

        return $query->result();
    }

    function get_learning_title()
    {
        $query = $this->db->query(
            "SELECT
                *,
                (SELECT COUNT(id_learn_head) FROM learning_header WHERE learn_head_id_title = id_learn_title) AS jml_header
            FROM
                learning_title 
            ORDER BY
                learn_title_desc ASC"
        );

        return $query->result();
    }

    function get_learning_header($id_title)
    {
        $query = $this->db->query(
            "SELECT
                *,
                (SELECT COUNT(id_learn_det) FROM learning_detail WHERE learn_det_id_header = id_learn_head) AS jml_header
            FROM
                learning_header
            WHERE
                learn_head_id_title = " . $id_title . "
            ORDER BY
                learn_head_desc ASC"
        );

        return $query->result();
    }

    function get_learning_detail($id_header)
    {
        $query = $this->db->query(
            "SELECT
                *
            FROM
                learning_detail
            WHERE
                learn_det_id_header = " . $id_header . "
            ORDER BY
                learn_det_desc ASC"
        );

        return $query->result();
    }

    function get_learning_detail_by_id($id_detail)
    {
        $query = $this->db->query(
            "SELECT
                *
            FROM
                learning_detail
            WHERE
                id_learn_det = " . $id_detail
        );

        return $query->result();
    }
}
