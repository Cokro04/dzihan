<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
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
        $data['title'] = "Barang keluar";
        $data['barangkeluar'] = $this->admin->getBarangkeluar();
        $this->template->load('templates/dashboard', 'barang_keluar/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required|trim');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Barang Keluar";
            $data['barang'] = $this->admin->get('barang');

            // Mendapatkan dan men-generate kode transaksi barang keluar
            $kode = 'T-BK-' . date('ymd');
            $kode_terakhir = $this->admin->getMax('barang_keluar', 'id_barang_keluar', $kode);
            $kode_tambah = substr($kode_terakhir, -5, 5);
            $kode_tambah++;
            $number = str_pad($kode_tambah, 5, '0', STR_PAD_LEFT);
            $data['id_barang_keluar'] = $kode . $number;

            $this->template->load('templates/dashboard', 'barang_keluar/add', $data);
        } else {
        }
    }

    public function addAksi()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $id_barang_keluar    = $this->input->post('id_barang_keluar');
            $user_id            = $this->input->post('user_id');
            $id_barang          = $this->input->post('id_barang');
            $tanggal_keluar      = $this->input->post('tanggal_keluar');

            $dataBarangKeluar = array(
                'id_barang_keluar'   => $id_barang_keluar,
                'user_id'           => $user_id,
                'id_barang'         => $id_barang,
                'tanggal_keluar'     => $tanggal_keluar
            );

            $insertBarang = $this->admin->insert('barang_keluar', $dataBarangKeluar);

            // mengambil id barang terakhir
            $data = $id_barang;
            if ($insertBarang) {
                set_pesan('data berhasil masuk');
                redirect('barang/detailBarangKeluarId/' . $data);
            }
        }
    }

    public function update($getId)
    {
        $id = encode_php_tags($getId);
        $id_barang = $this->input->post('id_barang');
        $aksi = $this->input->post('aksi');
        $data = array(
            'aksi' => $aksi
        );
        $update = $this->admin->update('detail_barang', 'id_detail_barang', $id, $data);

        if ($update) {
            if (isset($id_barang) == TRUE) {
                set_pesan('data berhasil disimpan');
                redirect('barang/detailBarangKeluarId/' . $id_barang);
            } else {
                set_pesan('data berhasil disimpan');
                redirect('barang/detailKeluarBarang');
            }
        } else {
            set_pesan('gagal menyimpan data');
            redirect('barang/editDataBarang/' . $id);
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('barang_keluar', 'id_barang_keluar', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('barangkeluar');
    }
}
