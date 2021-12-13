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

    function get_data_wisata_where($where)
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('kategori_wisata', 'id_wisata = kateg_id_wisata');
        $this->db->where($where);
        $this->db->order_by('nama_wisata');

        $query = $this->db->get();
        return $query->result();
    }

    function get_max_fasilitas($where)
    {
        $this->db->select_max('rating_fasilitas_saw', 'fasilitas');
        $this->db->from('kategori_wisata');
        $this->db->where_in('kateg_id_wisata', $where);

        $query = $this->db->get();
        return $query->result();
    }

    function get_min_jarak($where)
    {
        $this->db->select_min('rating_jarak_saw', 'jarak');
        $this->db->from('kategori_wisata');
        $this->db->where_in('kateg_id_wisata', $where);

        $query = $this->db->get();
        return $query->result();
    }

    function get_min_harga($where)
    {
        $this->db->select_min('rating_harga_saw', 'harga');
        $this->db->from('kategori_wisata');
        $this->db->where_in('kateg_id_wisata', $where);

        $query = $this->db->get();
        return $query->result();
    }

    function get_max_pengunjung($where)
    {
        $this->db->select_max('rating_pengunjung_saw', 'pengunjung');
        $this->db->from('kategori_wisata');
        $this->db->where_in('kateg_id_wisata', $where);

        $query = $this->db->get();
        return $query->result();
    }

    function get_data_saw()
    {
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('kategori_wisata', 'id_wisata = kateg_id_wisata', 'inner');
        $this->db->join('normalisasi_kategori', 'id_wisata = normalisasi_id_wisata', 'inner');
        $this->db->order_by('normalisasi_preferensi DESC');

        $query = $this->db->get();
        return $query->result();
    }

    function get_next_id_wisata()
    {
        $this->db->select('AUTO_INCREMENT AS id');
        $this->db->from('information_schema.TABLES');
        $this->db->where('table_name', 'wisata');
        $this->db->where('table_schema', 'ta_errys');

        $query = $this->db->get();
        return $query->result();
    }

    public function upload_data_wisata($filename)
    {
        $this->load->library('PHPExcel');

        ini_set('memory_limit', '-1');
        $inputFileName = './assets/' . $filename;
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file :' . $e->getMessage());
        }

        $worksheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        $numRows = count($worksheet);

        for ($i = 2; $i < ($numRows + 1); $i++) {
            //insert data wisata
            $ins_wisata = array(
                "id_wisata"     => $worksheet[$i]["A"],
                "nama_wisata"   => $worksheet[$i]["B"]
            );
            $db = $this->load->database('default', true);
            //$db->insert('wisata', $ins_wisata);

            //insetr kategori wisata
            $ins_kateg_wisata = array(
                "kateg_id_wisata"       => $worksheet[$i]["A"],
                "kateg_harga"           => $worksheet[$i]["F"],
                "kateg_jarak"           => $worksheet[$i]["E"],
                "kateg_pengunjung"      => $worksheet[$i]["G"],
                "kateg_fasilitas"       => $worksheet[$i]["C"],
                "kateg_fasilitas_label" => $worksheet[$i]["D"]
            );
            $db = $this->load->database('default', true);
            $db->insert('kategori_wisata', $ins_kateg_wisata);
        }
    }
}
