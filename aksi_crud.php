<?php

//panggil koneksi
include "koneksi.php";

// uji tombol
if(isset($_POST['bsimpan'])){

    //persiapan simpan data baru

    $simpan = mysqli_query($koneksi, "INSERT INTO tbmhs (nim, nama, alamat, prodi)
                                            VALUES ('$_POST[tnim]',
                                                    '$_POST[tnama]',
                                                    '$_POST[talamat]',
                                                    '$_POST[tprodi]') ");

    //jika simpannya sukses
    if($simpan){
        echo  "<script>
                    alert('Simpan data sukses');
                    document.location='index.php';
                </script>";
    }else{
        echo  "<script>
                    alert('Simpan data gagal');
                    document.location='index.php';
                </script>";
    }


}



if(isset($_POST['bUbah'])){

    //persiapan simpan data baru

    $ubah = mysqli_query($koneksi, "UPDATE tbmhs SET nim = '$_POST[tnim]',
                                                    nama = '$_POST[tnama]',
                                                    alamat = '$_POST[talamat]',
                                                    prodi = '$_POST[tprodi]' 
                                                WHERE id_mhs = '$_POST[id_mhs]' 
                                                ");

    //jika simpannya sukses
    if($ubah){
        echo  "<script>
                    alert('Ubah data sukses');
                    document.location='index.php';
                </script>";
    }else{
        echo  "<script>
                    alert('Ubah data gagal');
                    document.location='index.php';
                </script>";
    }


}

if(isset($_POST['bHapus'])){

    //persiapan simpan data baru

    $hapus = mysqli_query($koneksi, "DELETE FROM tbmhs WHERE id_mhs = '$_POST[id_mhs]'");

    //jika hapus sukses
    if($hapus){
        echo  "<script>
                    alert('Hapus data sukses');
                    document.location='index.php';
                </script>";
    }else{
        echo  "<script>
                    alert('Hapus data gagal');
                    document.location='index.php';
                </script>";
    }


}