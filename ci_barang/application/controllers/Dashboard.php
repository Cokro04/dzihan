<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['barang'] = $this->admin->count('barang');
        $data['barang_masuk'] = $this->admin->count('barang_masuk');
        $data['barang_keluar'] = $this->admin->count('barang_keluar');
        $data['supplier'] = $this->admin->count('supplier');
        $data['user'] = $this->admin->count('user');
        $data['detail_barang'] = $this->admin->count('detail_barang');
        $data['stok_bk'] = $this->admin->stok('detail_barang', 'BK');
        $data['stok_bm'] = $this->admin->stok('detail_barang', 'BM');
        // $data['stok'] = $this->admin->sum('barang', 'stok');
        $data['barang_min'] = $this->admin->get('barang');
        $data['transaksi'] = [
            'barang_masuk' => $this->admin->getBarangMasuk(5),
            'barang_keluar' => $this->admin->getBarangKeluar(5)
        ];

        // Line Chart
        $bln = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $data['cbm'] = [];
        $data['cbk'] = [];

        foreach ($bln as $b) {
            $data['cbm'][] = $this->admin->chartBarangMasuk($b);
            $data['cbk'][] = $this->admin->chartBarangKeluar($b);
        }

        $d = $this->admin->joinBarang('B000001');
        // print_r($d);
        // die;

        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
