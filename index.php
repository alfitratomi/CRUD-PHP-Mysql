<?php
// panggi koneksi 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP & Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class="countainer m-5">
        <h3 class="text-center m-4">CRUD Pertama saya</h3>
        <div class="card">
            <div class="card-header bg-primary text-white">
                Data Mahasiswa
            </div>

            <div class="card-body">

                <!-- Awal Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#formMhs">
                    Tambah Data
                </button>
                <!-- Akhir Button trigger modal -->

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NIM</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">PRODI</th>
                            <th scope="col">AKSI</th>
                        </tr>
                    </thead>

                    <?php
                    
                    //menampilkan data 
                    $no = 1 ;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbmhs ORDER BY id_mhs DESC");
                    while ($data = mysqli_fetch_array($tampil)):


                    
                    ?>

                    <tbody>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data ['nim'] ?></td>
                            <td><?= $data ['nama'] ?></td>
                            <td><?= $data ['alamat'] ?></td>
                            <td><?= $data ['prodi'] ?></td>
                            <td>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalUbah<?= $no?>">Ubah</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalHapus<?= $no?>">Hapus</a>
                            </td>
                        </tr>
                    </tbody>

                    <!-- Awal Modal Ubah -->
                    <div class="modal fade" id="modalUbah<?= $no?>" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Ubah Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <!-- awal Isi Form -->
                                    <div class="modal-body">
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">
                                            <div class="mb-3">
                                                <label class="form-label">NIM</label>
                                                <input type="text" class="form-control" name="tnim"
                                                    placeholder="Masukan NIM Anda" value="<?= $data['nim']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">NAMA</label>
                                                <input type="text" class="form-control" name="tnama"
                                                    placeholder="Masukan Nama Lengkap Anda" value="<?= $data['nama']?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Alamat Lengkap</label>
                                                <textarea class="form-control" name="talamat"
                                                    rows="3"><?= $data ['alamat'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">PRODI</label>
                                                <select class="form-select" name="tprodi">
                                                    <option value="<?= $data['prodi']?>"><?= $data['prodi']?></option>
                                                    <option value="S1 - Sistem Komputer">Sistem Komputer</option>
                                                    <option value="S1 - Sistem Informasi">Sistem Informasi</option>
                                                    <option value="S1 - Teknik Informatika">Teknik Informatika</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="bUbah">Ubah</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- akhir Isi Form -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Ubah-->

                    <!-- Awal Modal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $no?>" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <!-- awal Isi Form -->
                                    <div class="modal-body">
                                        <form method="POST" action="aksi_crud.php">
                                            <input type="hidden" name="id_mhs" value="<?= $data['id_mhs']?>">
                                            <h5 class="text-center">Apakah Anda Yakin Akan Hapus Data <br><span
                                                    class="text-danger text-center">
                                                    <?= $data ['nim'] ?>-<?= $data ['nama'] ?></span>
                                            </h5>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="bHapus">Ya, Saya
                                                    Yakin!!!</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Keluar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- akhir Isi Form -->

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Hapus-->




                    <?php endwhile?>
                </table>


                <!-- Awal Modal -->
                <div class="modal fade" id="formMhs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">From Data Mahasiswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <!-- awal Isi Form -->
                                <div class="modal-body">
                                    <form method="POST" action="aksi_crud.php">
                                        <div class="mb-3">
                                            <label class="form-label">NIM</label>
                                            <input type="text" class="form-control" name="tnim"
                                                placeholder="Masukan NIM Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">NAMA</label>
                                            <input type="text" class="form-control" name="tnama"
                                                placeholder="Masukan Nama Lengkap Anda">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat Lengkap</label>
                                            <textarea class="form-control" name="talamat" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">PRODI</label>
                                            <select class="form-select" name="tprodi">
                                                <option value="">Pilih Prodi</option>
                                                <option value="S1 - Sistem Komputer">Sistem Komputer</option>
                                                <option value="S1 - Sistem Informasi">Sistem Informasi</option>
                                                <option value="S1 - Teknik Informatika">Teknik Informatika</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- akhir Isi Form -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal -->

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>