<?php

require_once 'TransferBank.php';
require_once 'Ewallet.php';
require_once 'QRIS.php';
require_once 'Cod.php';
require_once 'VA.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>Sistem Pembayaran</title>
</head>

<body>

<h2>Sistem Pembayaran</h2>

<form method="post">

Jumlah Bayar <br>
<input type="number" name="jumlah" required>

<br>

<small>Pembayaran lebih dari Rp 50000, akan dikenakan pajak dan diskon</small>

<br><br>

Metode Pembayaran <br>
<select name="metode">
<option value="transfer">Transfer Bank</option>
<option value="ewallet">E-Wallet</option>
<option value="qris">QRIS</option>
<option value="cod">COD</option>
<option value="va">Virtual Account</option>
</select>

<br><br>

<button type="submit" name="bayar">Proses Pembayaran</button>

</form>

<hr>

<?php

if(isset($_POST['bayar'])){

    $jumlah = $_POST['jumlah'];
    $metode = $_POST['metode'];

    if($metode == "transfer"){
        $pembayaran = new TransferBank($jumlah);
    }
    elseif($metode == "ewallet"){
        $pembayaran = new Ewallet($jumlah);
    }
    elseif($metode == "qris"){
        $pembayaran = new QRIS($jumlah);
    }
    elseif($metode == "cod"){
        $pembayaran = new Cod($jumlah);
    }
    elseif($metode == "va"){
        $pembayaran = new VA($jumlah);
    }

    echo $pembayaran->prosesPembayaran();
    echo "<br><br>";
    echo $pembayaran->cetakStruk();
}

?>

</body>
</html>