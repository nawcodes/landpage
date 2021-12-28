<?php
include "head.php";
?>

<!-- Body -->

<!-- Link Menu -->
<?php include "menu.php"; ?>

</div>
<br />

<div id="content">
    <!-- Page title -->
    <div class="page-title">
        <h5><i class="fa fa-desktop"></i> Halaman Admin</h5>
    </div>

    <!-- /page title -->
    <script type="text/javascript" src="../js/jquery-1.9.0.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.10.0.custom.js"></script>
    <?php
    $id_klasifikasi = $_GET['id_klasifikasi'];
    $query = mysqli_query($conn, "SELECT * FROM klasifikasi WHERE id_klasifikasi='" . $id_klasifikasi . "'");
    $dataku = mysqli_fetch_array($query);

    ?>

    <!-- Right labels -->
    <form class="form-horizontal" action="klasifikasi_edit.php" method="post" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h6 class="panel-title">Klasifikasi</h6>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Nama Siswa:</label>
                    <div class="col-sm-3">
                        <input type="text" name='id_mhs' id='id_mhs' value="<?= $dataku['id_mhs'] ?>" required >
                        <small><br>
                            ID SISWA JANGAN DI RUBAH</small>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Nilai Akhir:</label>
                    <div class="col-sm-3">
                        <input type="number" name='nilai_akhir' id='id_akhir' value="<?= $dataku['nilai_akhir']?>">
                        <!-- <select name='nilai_akhir' data-placeholder="Pilih Nilai Akhir..." class="required select">
                            <option></option>";
                            <?php
                            $query = "SELECT * FROM himpunan where id_kriteria='6' order by id_himpunan asc";
                            $hasil = mysqli_query($conn, $query);
                            while ($data = mysqli_fetch_array($hasil)) : ?>
                                <option value='<?= $data['nilai'] ?>' <?= $data['nilai'] === $dataku['nilai_akhir'] ? 'selected' : '' ?>> <?= $data['namahimpunan'] ?> </option>
                            <?php endwhile; ?>
                        </select> -->
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Jumlah Sertifikat:</label>
                    <div class="col-sm-4">
                        <select name='sertifikat' data-placeholder="Pilih Penghasilan Ortu..." class="required select">
                            <option></option>
                            <?php
                            $query = "SELECT * FROM himpunan where id_kriteria='7' order by id_himpunan asc";
                            $hasil = mysqli_query($conn, $query);
                            while ($data = mysqli_fetch_array($hasil)) :
                            ?>
                                <option value='<?= $data['nilai'] ?>' <?= $data['nilai'] === $dataku['sertifikat'] ? 'selected' : '' ?>> <?= $data['namahimpunan'] ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Nilai Sikap:</label>
                    <div class="col-sm-3">
                        <select name='nilai_sikap' data-placeholder="Pilih nilai_sikap..." class="required select">
                            <option></option>
                            <?php
                            $query = "SELECT * FROM himpunan where id_kriteria='8' order by id_himpunan asc";
                            $hasil = mysqli_query($conn, $query);
                            while ($data = mysqli_fetch_array($hasil)) :
                            ?>
                                <option value='<?= $data['nilai'] ?>' <?= $data['nilai'] === $dataku['nilai_sikap'] ? 'selected' : '' ?>> <?= $data['namahimpunan'] ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>



                <div class="form-action text-right">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default">
                </div>

            </div>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            var ac_config = {
                source: "mahasiswa_cari.php",
                select: function(event, ui) {
                    $("#nama_mhs").val(ui.item.nama_mhs);
                    $("#id_mhs").val(ui.item.id_mhs);
                },
                minLength: 1
            };
            $("#nama_mhs").autocomplete(ac_config);
        });
    </script>
    <?php
    if (isset($_POST['simpan'])) {
        $id_mhs     = $_POST['id_mhs'];
        $nilai_akhir  = $_POST['nilai_akhir'];
        $sertifikat = $_POST['sertifikat'];
        $nilai_sikap   = $_POST['nilai_sikap'];
        $query = mysqli_query($conn, "UPDATE `klasifikasi` SET `nilai_akhir` = '$nilai_akhir', `sertifikat` = '$sertifikat' , `nilai_sikap` = '$nilai_sikap' WHERE `klasifikasi`.`id_mhs` = '$id_mhs'") or die(mysqli_connect_error());
        
    //     $sql = "insert into klasifikasi values
    // ('','$id_mhs','$nilai_akhir','$sertifikat','$nilai_sikap')";
    //     $query = mysqli_query($conn, $sql) or die(mysqli_connect_error());
        if ($query) {
            echo "<script>window.alert('Klasifikasi berhasil di ubah');
            window.location=(href='klasifikasi.php')</script>";
        }
    }
    ?>
    <!-- /right lebels -->
    <?php include "footer.php" ?>