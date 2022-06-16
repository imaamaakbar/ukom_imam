<?php
    $conn = mysqli_connect("localhost", "root", "", "tiket");
    function insert($data){
        global $conn;
        $list_wisata['tempat'] = ['Museum Lampung', 'Pantai Sariringgung','Kebun Binatang Surabaya'];
        $nama = $data['nama'];
        $no_i = $data['no_i'];
        $no_h = $data['no_h'];
        $tempat = $list_wisata['tempat'][$data['tempat']];
        $tanggal = $data['tanggal'];
        $dewasa = $data['dewasa'].' orang';
        $anak = $data['anak'].' orang';
        $harga = 'Rp '.$data['harga'];
        $tot_harga = 'Rp '.($data['anak']*$data['harga']*0.5)+($data['dewasa']*$data['harga']);

        $query = "INSERT INTO pesanan VALUES ('', '$nama', '$no_i', '$no_h','$tempat','$tanggal','$dewasa','$anak','$harga','$tot_harga')";
        if(mysqli_query($conn,$query)){
            return true;
            echo "New Record create success";
        }
        else{
            return false;
            echo "Error: ".$query."<br>".mysqli_error($conn);
        }
    }
?>