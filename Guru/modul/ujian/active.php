<?php
$result_soal = mysqli_query($con, "SELECT * FROM soal WHERE id_ujian='$_GET[ujian]' ORDER BY id_soal ASC");

$result_ujian = mysqli_query($con, "SELECT * from ujian where id_ujian='{$_GET['ujian']}'");
$ujian = mysqli_fetch_array($result_ujian);


if ($ujian['jml_soal'] > mysqli_num_rows($tampil)) : ?>
  <script type='text/javascript'>
    setTimeout(function() {
      swal({
        title: 'Mohon Maaf Jumlah Soal Belum Cukup (<?= $ujian['jml_soal'] ?>)',
        text: '',
        type: 'error',
        timer: 3000,
        showConfirmButton: true
      });
      window.setTimeout(function() {
        window.location.replace('?page=ujian');
      }, 3000);
    }, 10);
  </script>
<?php else :
  $aktif = mysqli_query($con, "UPDATE kelas_ujian SET aktif='Y' WHERE id_ujian='$_GET[ujian]' ");
?>
  <?php if ($aktif) : ?>
    <script type='text/javascript'>
      setTimeout(function() {
        swal({
          title: 'UJIAN TELAH AKTIF',
          text: '',
          type: 'success',
          timer: 3000,
          showConfirmButton: true
        });
      }, 10);
      window.setTimeout(function() {
        window.location.replace('?page=ujian');
      }, 3000);
    </script>
  <?php endif; ?>
<?php endif; ?>