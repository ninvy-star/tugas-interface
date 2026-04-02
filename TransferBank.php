<?php

require_once 'Pembayaran.php';
require_once 'cetak.php';

class TransferBank extends Pembayaran implements Cetak {

    public function prosesPembayaran() {

        if ($this->validasi()) {
            return "Transfer Bank sebesar Rp {$this->jumlah}";
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