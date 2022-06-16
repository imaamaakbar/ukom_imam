<?php
    include('function.php');
    $list_wisata = array();
    $list_wisata['id'] = [0,  1,2];
    $list_wisata['tempat'] = ['Museum Lampung', 'Pantai Sariringgung','Kebun Binatang Surabaya'];
    $list_wisata['harga'] = [50000, 150000,500000];
    $list_wisata['link'] = ['https://www.youtube.com/embed/qGnOGkweBUE','https://www.youtube.com/embed/8kCH-V_rg9M','https://www.youtube.com/embed/JMZ0wfWXsKc'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Sistem Pemesanan Tiket</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <h1 style="text-align: Center ;">
                Selamat Datang
            </h1>
            <center>
            <div class="col">
            <button  class="btn btn-primary" onclick="window.location.href='./form_pemesanan.php?id=0'">Pesan Sekarang</button>
            </div>
            </center>
            
            
        </div>

        <div class="container mt-3">
            <div class="row">
                <div class="col" style="border-radius:2px; box-shadow: 3px; padding:10px;">
                <h3 style="text-align:center ;">
                    
                </h3>
                <div class="col mt-3">
                <?php   $i =0;
                        foreach($list_wisata['tempat'] as $lw) :?>
                        <div class="card p-3" style="width: 100%;">
                        <form action="./form_pemesanan.php" method="get">
                            <div class="row">
                                <div class="col-6">
                                <img width="420" height="315"src="./asset/img/gambar-<?=$list_wisata["id"][$i]+1?>.jpg" class="figure-img img-fluid rounded" alt="...">
                                </div>
                                <div class="col-6">
                                <iframe width="420" height="315"
                            src="<?=$list_wisata['link'][$i]?>">
                            </iframe>
                                </div>

                            </div>
                            <div class="row">
                            <h3>
                                   <?=$list_wisata['tempat'][$i]?> 
                        </h3>
                        
                                <figcaption class="figure-caption text-end">Harga : Rp. <?= $list_wisata['harga'][$i] ?>
                                    <br>
                                    <button type= "submit" class="btn btn-primary">Pesan</button>
                                </figcaption>
                            <input type="hidden" id="id" name="id" value="<?=$list_wisata["id"][$i]?>">
                            </div>
                        </form>
                        </div>
                        <?php $i++; endforeach;?>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>