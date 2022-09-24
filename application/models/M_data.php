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

        $query = $this->db->query("SELECT COUNT(" . $field . ") AS total FROM " . $table.' '.$whr);

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

    function get_learning_video($id_detail)
    {
        $query = $this->db->query(
            "SELECT
                *
            FROM
                learning_detail_video
            WHERE
                vid_learn_id_learn_det = " . $id_detail . "
            ORDER BY
                vid_learn_desc ASC"
        );

        return $query->result();
    }

    function get_user()
    {
        $query = $this->db->query(
            "SELECT
                *
            FROM
                user
            WHERE
                user_is_admin != 1 OR user_is_admin IS NULL
            ORDER BY
                user_is_registered DESC,
                user_name ASC"
        );

        return $query->result();
    }

    function get_sub_materi_user($id_learn_det)
    {
        $query = $this->db->query(
            "SELECT
                *
            FROM
                learning_dt_user
                LEFT JOIN user ON learn_dt_usr_id = id_user
            WHERE
                learn_dt_usr_learn_id = ".$id_learn_det. "
                AND user_is_registered IS TRUE
            ORDER BY
                user_name ASC"
        );

        return $query->result();
    }

    function get_user_learn_det($id_learn_det)
    {
        $id_usr = $this->get_user_assigned($id_learn_det);
        $query = $this->db->query(
            "SELECT
                *
            FROM
                user
            WHERE
                user_is_registered IS TRUE
                AND id_user NOT IN (".(!empty($id_usr[0]->id_user) ? $id_usr[0]->id_user : 0).")
            ORDER BY
                user_name ASC"
        );

        return $query->result();
    }

    function get_user_assigned($id_learn_det)
    {
        $query = $this->db->query(
            "SELECT GROUP_CONCAT( learn_dt_usr_id ) AS id_user FROM learning_dt_user WHERE learn_dt_usr_learn_id = ". $id_learn_det
        );

        return $query->result();
    }

    function get_user_is_assign($learn_desc)
    {
        $query = $this->db->query(
            "SELECT
                *
            FROM
                learning_dt_user
                LEFT JOIN user ON learn_dt_usr_id = id_user
                LEFT JOIN learning_detail ON learn_dt_usr_learn_id = id_learn_det
            WHERE
                learn_det_desc = '".strtoupper($learn_desc). "'
                AND learn_dt_usr_id = ".$this->session->userdata('id')."
            ORDER BY
                user_name ASC"
        );

        return $query->result();
    }

    function count_badges($id_user)
    {
        $query = $this->db->query(
            "SELECT
                COUNT(learn_dt_usr_id) AS jml_badges
            FROM
                learning_dt_user
            WHERE
                learn_dt_usr_id = ".$id_user
        );

        return $query->result();
    }

    function count_certificates($id_user)
    {
        $query = $this->db->query(
            "SELECT
                COUNT(id_cert) AS jml_cert
            FROM
                certificate
            WHERE
                cert_id_user = " . $id_user
        );

        return $query->result();
    }
}
