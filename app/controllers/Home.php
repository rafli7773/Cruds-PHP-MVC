<?php

class Home extends Controller
{
    public function index($page = 1)
    {
        if (isset($_POST['keyword'])) {
            $_SESSION['cari'] = $_POST['keyword'];
            $data = [
                "keyword" => $_POST['keyword'],
                "page" => $page
            ];
            $this->cari($data);
        } else {
            if (is_null($_SESSION['cari'])) {
                $_SESSION['cari'] = "";
            }
            $data = [
                "keyword" => $_SESSION['cari'],
                "page" => $page
            ];
            $this->cari($data);
        }
        $jumlahDataHalaman = 5;
        $jumlahData = count($this->model('barangModel')->getAllBarang());
        $jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);
        $halamanAktif = (isset($page)) ? $page : 1;
        $awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

        $data = [
            "awalData" => $awalData,
            "jumlahHalaman" => $jumlahHalaman,
            "halamanAktif" => $halamanAktif,
            "jumlahDataHalaman" => $jumlahDataHalaman
        ];

        $data['title'] = "Home";
        $data['barang'] = $this->model('barangModel')->getLimitBarang($data);

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('barangModel')->addBarang($_POST) > 0) {
            Flasher::setFlash("Data Berhasil Di Tambahkan");
            header("location: " . BASEURL);
        }
    }

    public function hapus($id)
    {
        if ($this->model('barangModel')->hapusbarang($id) > 0) {
            Flasher::setFlash("Data Berhasil Di Hapus");
            header("location: " . BASEURL);
        }
    }

    public function getUbah($id)
    {
        $barang = $this->model('barangModel')->getSpecificBarang($id);
        echo json_encode($barang);
    }

    public function edit()
    {
        if ($this->model('barangModel')->editBarang($_POST) > 0) {
            Flasher::setFlash("Data Berhasil Di Ubah");
            header("location: " . BASEURL);
        }
    }

    public function cari($data)
    {
        $keyword = $data['keyword'];
        $jumlahDataHalaman = 5;
        $halamanAktif = (isset($data['page'])) ? $data['page'] : 1;
        $awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;
        $jumlahData = count($this->model('barangModel')->countBarang($keyword));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataHalaman);
        $data = [
            "keyword" => $keyword,
            "awalData" => $awalData,
            "jumlahHalaman" => $jumlahHalaman,
            "halamanAktif" => $halamanAktif,
            "jumlahDataHalaman" => $jumlahDataHalaman
        ];

        $data['title'] = "Home";
        $data['barang'] = $this->model('barangModel')->searchBarang($data);

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
