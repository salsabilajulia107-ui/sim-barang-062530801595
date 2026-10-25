<?php
class Barang
{
    public $kode;
    public $nama;
    public $jumlah;

    public function __construct($kode, $nama, $jumlah)
    {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->jumlah = $jumlah;
    }

    // Method untuk menampilkan format informasi barang
    public function tampilkanInfo()
    {
        return $this->kode . " - " . $this->nama . " (Jumlah: " . $this->jumlah . ")";
    }
}