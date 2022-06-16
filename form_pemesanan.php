<?php 
    include('function.php');
    $list_wisata = array();
    $list_wisata['id'] = [0,  1,2];
    $list_wisata['tempat'] = ['Museum Lampung', 'Pantai Sariringgung','Kebun Binatang Surabaya'];
    $list_wisata['harga'] = [50000, 150000,500000];

    if (isset($_POST['submit'])) {
        if(insert($_POST)){
        header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container-fluid" style="padding-left:15% ; padding-right:15% ;" >

    
<div class="card" style="width: 100%;">
<h1 style="padding:15px ;">Form Pemesanan</h1>
  <div class="card-body">
    <form method="POST">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama">
           
        </div>
        <div class="mb-3">
            <label for="no_i" class="form-label">Nomor Identitas</label>
            <input type="text" class="form-control" id="no_i" name='no_i'>
        </div>
        <div class="mb-3">
            <label for="no_h" class="form-label">No. HP</label>
            <input type="text" class="form-control" id="no_h" name='no_h'>
        </div>
        <div class="mb-3">
            
            <label for="tempat" class="form-label">Tempat Wisata</label>
            <select name="tempat" id="tempat" onchange="ubah()" class="form-select">
                <?php $i=0;
                foreach($list_wisata as $lw) : ?>
                    <option id="select-<?= $list_wisata['id'][$i]?>" value="<?= $list_wisata['id'][$i]?>"><?= $list_wisata['tempat'][$i]?></option>
                <?php $i++; endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
            <input type="date" class="form-control" id="tanggal" name='tanggal'>
        </div>
        <div class="mb-3">
            <label for="dewasa" class="form-label">Pengunjung Dewasa</label>
            <input type="text" class="form-control" id="dewasa" name='dewasa'>
        </div>
        <div class="mb-3">
            <label for="anak" class="form-label">Pengunjung Anak-Anak (Umur < 12 Tahun)</label>
            <input type="text" class="form-control" id="anak" name='anak'>
        </div>
        <div class="mb-3">
            <table>
                <tr>
                    <td class="form-label">Harga Tiket  :  </td>
                    <td><ul class="form-label" id="harga-s"><?= $list_wisata['harga'][$_GET['id']]?></li></td>
                </tr>
            </table>
            <input type="hidden" class="form-control" id="harga" name='harga' value="<?= $list_wisata['harga'][$_GET['id']]?>">
            
        </div>
        <div class="mb-3">
            <table>
                <tr>
                    <td class="form-label">Total Harga  : </td>
                    <td><ul class="form-label"  id="totalharga-s" ></li></td>
                </tr>
            </table>
            
        </div>
        <div class="mb-3">
                <input type="checkbox" id='check' name="check" value='1' required> 
                <label for="vehicle3"> Saya dan/atau rombongan telah membaca, memahami dan setuju berdasarkan syarat dan ketentuan yang telah diterapkan</label>
               
                    
        </div>
        <div class="p-3" style="float:right ;">
            <button type="submit" id="submit" name="submit" class="btn btn-success">Pesan Tiket</button>
        </div>
        </form>
        <div class="p-3" style="float:right ;">
        <button style="float:right ;" class="btn btn-warning" onclick="hitung()">Hitung Total Pesanan </button>
        </div>
        <div class="p-3" style="float:right ;">
        <button style="float:right ;" class="btn btn-danger" onclick="window.location.href='./'">Cancel </button>
        </div>
    </div>
    </div>
    </div>
</body>
</html>

<script>
    document.getElementById('select-<?=$_GET['id'] ?>').setAttribute('selected','selected');

    function hitung(){
        let harga = document.getElementById('harga').value;
        let jd = document.getElementById('dewasa').value;
        let ja = document.getElementById('anak').value;
        let hd = harga*jd;
        let ha = harga*ja*0.5;
        document.getElementById('totalharga-s').textContent = hd+ha;
        
    }

    function ubah(){
        let harga = [50000, 150000,500000];
        let tempat = document.getElementById('tempat').value;
        document.getElementById('harga-s').textContent = harga[tempat];
        document.getElementById('harga').value = harga[tempat];
    }
</script>