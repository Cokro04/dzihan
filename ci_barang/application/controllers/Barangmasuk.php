<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Barang Masuk";
        $data['barangmasuk'] = $this->admin->getBarangMasuk();
        $this->template->load('templates/dashboard', 'barang_masuk/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required|trim|numeric|greater_than[0]');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang Masuk";
            $data['supplier'] = $this->admin->get('supplier');
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->admin->getMax('barang_masuk', 'id_barang_masuk', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_masuk'] = $kode . $number;

            // Mengenerate ID Barang
            $kode_terakhir = $this->admin->getMax('barang', 'id_barang');
            $kode_tambah = substr($kode_terakhir, -6, 6);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
            $data['id_barang'] = 'B' . $number;

            // mengambil id barang terakhir
            $asdw = $this->admin->getFor('barang');
            foreach ($asdw as $d) {
                $data['id_barang2'] = $d['id_barang'];
            }

            $this->template->load('templates/dashboard', 'barang_masuk/add', $data);
        } else {
        }
    }


    public function addAksi1()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $id_barang_masuk    = $this->input->post('id_barang_masuk');
            $supplier_id        = $this->input->post('supplier_id');
            $user_id            = $this->input->post('user_id');
            $id_barang          = $this->input->post('id_barang');
            $tanggal_masuk      = $this->input->post('tanggal_masuk');

            $nama_barang        = $this->input->post('nama_barang');
            $satuan_id          = $this->input->post('satuan_id');
            $jenis_id           = $this->input->post('jenis_id');

            $dataBarang = array(
                'id_barang'         => $id_barang,
                'nama_barang'       => $nama_barang,
                'satuan_id'         => $satuan_id,
                'jenis_id'          => $jenis_id
            );

            $dataBarangMasuk = array(
                'id_barang_masuk'   => $id_barang_masuk,
                'supplier_id'       => $supplier_id,
                'user_id'           => $user_id,
                'id_barang'         => $id_barang,
                'tanggal_masuk'     => $tanggal_masuk
            );

            $insert = $this->admin->insert('barang', $dataBarang);
            $insertBarang = $this->admin->insert('barang_masuk', $dataBarangMasuk);

            // mengambil id barang terakhir
            $asdw = $this->admin->getFor('barang');
            foreach ($asdw as $d) {
                $data = $d['id_barang'];
            }
            if ($insertBarang) {
                set_pesan('data berhasil masuk');
                redirect('barang/detailBarangId/' . $data);
            }
        }
    }

    public function addAksi()
    {
        $id_barang          = $this->input->post('id_barang');
        $nama_barang        = $this->input->post('nama_barang');
        $satuan_id          = $this->input->post('satuan_id');
        $jenis_id           = $this->input->post('jenis_id');

        $dataBarang = array(
            'id_barang'         => $id_barang,
            'nama_barang'       => $nama_barang,
            'satuan_id'         => $satuan_id,
            'jenis_id'          => $jenis_id
        );

        $insert = $this->admin->insert('barang', $dataBarang);

        if ($insert) {

            $data['title'] = "Barang Masuk";
            $data['supplier'] = $this->admin->get('supplier');
            $data['jenis'] = $this->admin->get('jenis');
            $data['satuan'] = $this->admin->get('satuan');

            // Mendapatkan dan men-generate kode transaksi barang masuk
            $kode = 'T-BM-' . date('ymd');
            $kode_terakhir = $this->admin->getMax('barang_masuk', 'id_barang_masuk', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_masuk'] = $kode . $number;

            $asdw = $this->admin->getFor('barang');
            foreach ($asdw as $d) {
                $data['id_barang2'] = $d['id_barang'];
            }

            $this->template->load('templates/dashboard', 'barang_masuk/addBarangMasuk', $data);
        } else {
            set_pesan('Opps ada kesalahan!');
            redirect('barangmasuk/add');
        }
    }

    public function addTRMasuk()
    {
        $id_barang_masuk    = $this->input->post('id_barang_masuk');
        $supplier_id        = $this->input->post('supplier_id');
        $user_id            = $this->input->post('user_id');
        $id_barang          = $this->input->post('id_barang');
        $tanggal_masuk      = $this->input->post('tanggal_masuk');

        $dataBarangMasuk = array(
            'id_barang_masuk'   => $id_barang_masuk,
            'supplier_id'       => $supplier_id,
            'user_id'           => $user_id,
            'id_barang'         => $id_barang,
            'tanggal_masuk'     => $tanggal_masuk
        );

        $insertBarang = $this->admin->insert('barang_masuk', $dataBarangMasuk);
        if ($insertBarang) {
            set_pesan('data berhasil masuk');
            redirect('barangmasuk');
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang_masuk', 'id_barang_masuk', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('barangmasuk');
    }
}
