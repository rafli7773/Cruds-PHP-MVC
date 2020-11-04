<?php

class barangModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query("SELECT * FROM barang ORDER BY id DESC ");
        return $this->db->getAllData();
    }

    public function getSpecificBarang($id)
    {
        $this->db->query("SELECT * FROM barang WHERE id = :id");
        $this->db->bind('id', $id);
        return $this->db->getSpecificData();
    }

    public function addBarang($data)
    {
        $query = "INSERT INTO barang VALUES('', :barang, :posisi)";
        $this->db->query($query);
        $this->db->bind('barang', $data['barang']);
        $this->db->bind('posisi', $data['posisi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusBarang($id)
    {
        $this->db->query("DELETE FROM barang WHERE id = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editBarang($data)
    {
        $query = "UPDATE barang SET barang = :barang, posisi = :posisi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('barang', $data['barang']);
        $this->db->bind('posisi', $data['posisi']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchBarang($data)
    {
        $keyword = $data['keyword'];
        $awalData = $data['awalData'];
        $jumlahDataHalaman = $data['jumlahDataHalaman'];

        $query = "SELECT * FROM barang WHERE barang LIKE :keyword OR posisi LIKE :keyword ORDER BY id DESC LIMIT $awalData, $jumlahDataHalaman";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->getAllData();
    }

    public function getLimitBarang($data)
    {
        $awalData = $data['awalData'];
        $jumlahDataHalaman = $data['jumlahDataHalaman'];
        $this->db->query("SELECT * FROM barang ORDER BY id DESC LIMIT $awalData, $jumlahDataHalaman");
        return $this->db->getAllData();
    }

    public function countBarang($keyword)
    {
        $query = "SELECT * FROM barang WHERE barang LIKE :keyword OR posisi LIKE :keyword ORDER BY id DESC ";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->getAllData();
    }
}
