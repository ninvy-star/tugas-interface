<?php

abstract class Pembayaran {

    protected $jumlah;

    public function __construct($jumlah) {
        $this->jumlah = $jumlah;
    }

    abstract public function prosesPembayaran();

    public function validasi() {
        return $this->jumlah > 0;
    }

    public function hitungDiskon() {
        if ($this->jumlah >= 50000) {
            return $this->jumlah * 0.10;
        }
        return 0;
    }

    public function hitungPajak() {
        if ($this->jumlah >= 50000) {
        return $this->jumlah * 0.11;
        }
        return 0;
    }

    public function totalBayar() {
        $diskon = $this->hitungDiskon();
        $subtotal = $this->jumlah - $diskon;
        $pajak = $this->hitungPajak();

        return $subtotal + $pajak;

        }
}
?>
