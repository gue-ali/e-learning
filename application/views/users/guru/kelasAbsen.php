<div class="course-w3ls py-5">
  <div class="container py-xl-5 py-lg-3">
    <h3 class="title text-capitalize font-weight-light text-dark text-center mb-sm-5 mb-4">Tabel Absen
    </h3>
    <div class="row justify-content-center pt-7">
      <?= $this->session->flashdata('message'); ?>
      <div class="col-lg-10 agile-course-main">
        <div class="w3ls-cource-first">
          <div class="px-md-5 px-4  pb-md-5 pb-4">
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>nip</th>
                  <th>nama</th>
                  <th>Nama Mapel</th>
                  <th>kelas</th>
                  <th>Nama jurusan</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($mengajar as $a) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $a->nip; ?></td>
                    <td><?= $a->nama; ?></td>
                    <td><?= $a->mata_pelajaran; ?></td>
                    <td><?= $a->kelas; ?></td>
                    <td><?= $a->nama_jurusan; ?></td>
                    <td><a class="badge badge-primary" href="<?= base_url('User/Guru/KelasAbsen/Tampil/' . $a->id_mengajar); ?>">Buat Absen</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container py-xl-5 py-lg-3">
    <h3 class="text-center mb-sm-5 mb-4">Detail Absen
    </h3>
    <div class="row justify-content-center pt-7">
      <div class="col-lg-10 agile-course-main">
        <div class="w3ls-cource-first">
          <div class="px-md-5 px-4  pb-md-5 pb-4">
            <br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>nip</th>
                  <th>nama</th>
                  <th>Nama Mapel</th>
                  <th>kelas</th>
                  <th>Nama jurusan</th>
                  <th>Tanggal</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($absen as $a) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $a->nip; ?></td>
                    <td><?= $a->nama; ?></td>
                    <td><?= $a->mata_pelajaran; ?></td>
                    <td><?= $a->kelas; ?></td>
                    <td><?= $a->nama_jurusan; ?></td>
                    <td><?= $a->tanggal; ?></td>
                    <td style="width: 140px;">
                      <a class="badge badge-primary" href="<?= base_url('User/Guru/KelasAbsen/TampilU/' . $a->id_absen); ?>">Edit</a> | <a class="badge badge-danger" onclick="javasciprt: return confirm('Anda Yakin Non-Aktifkan ?')" href="<?= base_url('User/Guru/KelasAbsen/Delete/' . $a->id_absen); ?>">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
$absen = "SELECT * FROM `absen_siswa`
JOIN mengajar ON mengajar.id_mengajar = absen_siswa.id_mengajar
JOIN penjurusan ON mengajar.id_jurusan = penjurusan.id_jurusan ";

$absensi = $this->db->query($absen)->result();

foreach ($absensi as $a) : {

    $quer = "SELECT * FROM siswa
            WHERE NOT EXISTS
            (SELECT * FROM tr_absen_siswa WHERE siswa.nis = tr_absen_siswa.nis AND tr_absen_siswa.id_absen = $a->id_absen)
            AND siswa.id_jurusan = $a->id_jurusan";

    $gu = $this->db->query($quer)->result();
    foreach ($gu as $g) : {
?>

        <script>
          // Mengatur waktu akhir perhitungan mundur
          var countDownDate = new Date("<?= $a->tanggal; ?>").getTime();

          // Memperbarui hitungan mundur setiap 1 detik


          // Untuk mendapatkan tanggal dan waktu hari ini
          var now = new Date().getTime();

          // Temukan jarak antara sekarang dan tanggal hitung mundur
          var distance = countDownDate - now;

          // Perhitungan waktu untuk hari, jam, menit dan detik
          // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // // Keluarkan hasil dalam elemen dengan id = "demo"
          // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
          //   minutes + "m " + seconds + "s ";

          // Jika hitungan mundur selesai, tulis beberapa teks 
          if (distance < 0) {
            // clearInterval(x);
            // document.getElementById("lo<?= $d, $s; ?>").innerHTML = "EX";
            <?php $data = [
              'id_absen' => $a->id_absen,
              'nis' => $g->nis,
              'status' => '4'
            ];

            $this->db->insert('tr_absen_siswa', $data);
            ?>
          }
        </script>
      <?php
      }
    endforeach;
  }
endforeach;

$absen = "SELECT * FROM absen_guru";

$absensi = $this->db->query($absen)->result();

foreach ($absensi as $ab) : {

    $que = "SELECT * FROM guru
  WHERE NOT EXISTS
  (SELECT * FROM tr_absen_guru WHERE guru.nip = tr_absen_guru.nip AND tr_absen_guru.id_absen = $ab->id_absen)";
    $gul = $this->db->query($que)->result();
    foreach ($gul as $gu) : { ?>

        <script>
          // Mengatur waktu akhir perhitungan mundur
          var countDownDate = new Date("<?= $a->tanggal; ?>").getTime();

          // Memperbarui hitungan mundur setiap 1 detik


          // Untuk mendapatkan tanggal dan waktu hari ini
          var now = new Date().getTime();

          // Temukan jarak antara sekarang dan tanggal hitung mundur
          var distance = countDownDate - now;

          // Perhitungan waktu untuk hari, jam, menit dan detik
          // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // // Keluarkan hasil dalam elemen dengan id = "demo"
          // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
          //   minutes + "m " + seconds + "s ";

          // Jika hitungan mundur selesai, tulis beberapa teks 
          if (distance < 0) {
            // clearInterval(x);
            <?php $data = [
              'id_absen' => $ab->id_absen,
              'nip' => $gu->nip,
              'status' => '4'
            ];

            $this->db->insert('tr_absen_guru', $data);
            ?>
          }
        </script>
      <?php }
    endforeach;
  }
endforeach;
$kuis = "SELECT * FROM kuis 
JOIN mengajar on mengajar.id_mengajar = kuis.id_mengajar
JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan";

$kuiss = $this->db->query($kuis)->result();

foreach ($kuiss as $t) : {
    $ujian = "SELECT * FROM siswa
    WHERE NOT EXISTS
    (SELECT * FROM ikut_ujian WHERE siswa.nis = ikut_ujian.nis AND ikut_ujian.id_kuis = $t->id_kuis)
    AND siswa.id_jurusan=$t->id_jurusan";
    $jawabann = $this->db->query($ujian)->result();
    foreach ($jawabann as $j) : { ?>

        <script>
          // Mengatur waktu akhir perhitungan mundur
          var countDownDate = new Date("<?= $t->tanggal_berakhir; ?>").getTime();

          // Memperbarui hitungan mundur setiap 1 detik


          // Untuk mendapatkan tanggal dan waktu hari ini
          var now = new Date().getTime();

          // Temukan jarak antara sekarang dan tanggal hitung mundur
          var distance = countDownDate - now;

          // Perhitungan waktu untuk hari, jam, menit dan detik
          // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // // Keluarkan hasil dalam elemen dengan id = "demo"
          // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
          //   minutes + "m " + seconds + "s ";

          // Jika hitungan mundur selesai, tulis beberapa teks 
          if (distance < 0) {
            // clearInterval(x);
            <?php $data = [
              'nis' => $j->nis,
              'id_kuis' => $t->id_kuis,
              'nilai' => 0,
              'status' => '2'
            ];

            $this->db->insert('ikut_ujian', $data);
            ?>

          }
        </script>
      <?php }
    endforeach;
  }
endforeach;
$tugas = "SELECT * FROM tugas_siswa 
JOIN mengajar on mengajar.id_mengajar = tugas_siswa.id_mengajar
JOIN penjurusan on penjurusan.id_jurusan = mengajar.id_jurusan";

$kuiss = $this->db->query($tugas)->result();

foreach ($kuiss as $t) : {
    $jawaban = "SELECT * FROM siswa
    WHERE NOT EXISTS
    (SELECT * FROM jawaban_tugas WHERE siswa.nis = jawaban_tugas.nis AND jawaban_tugas.id_tugas = $t->id_tugas)
    AND siswa.id_jurusan=$t->id_jurusan";
    $jawabann = $this->db->query($jawaban)->result();
    foreach ($jawabann as $j) : { ?>

        <script>
          // Mengatur waktu akhir perhitungan mundur
          var countDownDate = new Date("<?= $t->tanggal_berakhir; ?>").getTime();

          // Memperbarui hitungan mundur setiap 1 detik


          // Untuk mendapatkan tanggal dan waktu hari ini
          var now = new Date().getTime();

          // Temukan jarak antara sekarang dan tanggal hitung mundur
          var distance = countDownDate - now;

          // Perhitungan waktu untuk hari, jam, menit dan detik
          // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          // var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          // var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // // Keluarkan hasil dalam elemen dengan id = "demo"
          // document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
          //   minutes + "m " + seconds + "s ";

          // Jika hitungan mundur selesai, tulis beberapa teks 
          if (distance < 0) {
            // clearInterval(x);
            <?php $data = [
              'id_tugas' => $t->id_tugas,
              'nis' => $j->nis,
              'status' => '2',
              'nilai' => 0
            ];

            $this->db->insert('jawaban_tugas', $data);
            ?>

          }
        </script>
<?php }
    endforeach;
  }
endforeach;
?>