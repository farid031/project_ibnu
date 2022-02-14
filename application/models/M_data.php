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

    function get_data_wisata()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('kategori_wisata', 'id_wisata = kateg_id_wisata');
        $this->db->order_by('nama_wisata');

        $query = $this->db->get();
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
}
