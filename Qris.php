<?php

require_once 'Pembayaran.php';
require_once 'cetak.php';

class QRIS extends Pembayaran implements Cetak {

    public function prosesPembayaran() {

        if ($this->validasi()) {
            return "Pembayaran QRIS Rp {$this->jumlah} berhasil";
        }

        return "Jumlah tidak valid";
    }

    public function cetakStruk() {

        $diskon = $this->hitungDiskon();
        $pajak = $this->hitungPajak();
        $total = $this->totalBayar();

        return "
        Jumlah : Rp {$this->jumlah} <br>
        Diskon 10% : Rp $diskon <br>
        Pajak 11% : Rp $pajak <br>
        Total Bayar : Rp $total
        ";
    }
}
?>