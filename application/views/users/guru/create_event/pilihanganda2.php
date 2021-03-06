<body onload="JavaScript:AutoRefresh(30000);">
    <div class="course-w3ls py-5">
        <div class="container">
            <h3 class="text-center mb-sm-5 mb-4">Tampil kuis</h3>
            <div class="row justify-content-center pt-7">
                <div class="col-lg-10 agile-course-main">
                    <div class="w3ls-cource-first">
                        <div class="px-md-5 px-4  pb-md-5 pb-4">
                            <br>
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php if ($title == 'Tampil kuis') : ?>
                                    <?= $mapel->mata_pelajaran; ?>
                                <?php else : ?>
                                    <?= $mapel; ?>
                                <?php endif; ?> </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= base_url('User/Guru/TampilKuis'); ?>">Semua Mapel</a>
                                <?php foreach ($mengajar as $t) :
                                ?>
                                    <a class="dropdown-item" href="<?= base_url('User/Guru/TampilKuis/mengajar/' . $t->id_mengajar); ?>"><?= $t->mata_pelajaran, " Di Kelas ", $t->kelas, " ", $t->nama_jurusan ?></a>
                                <?php endforeach; ?>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <div class="row">
                                    <?php if ($title == 'Tampil kuis') : ?>
                                        <form action="<?= base_url('User/Guru/TampilKuis/Mengajar/' . $mapel->id_mengajar); ?>" method="POST">
                                            <div class="col-sm-9">
                                                <select id="country" name="jenisujian" class="form-control">>
                                                    <option value="">Semua Jenis</option>
                                                    <option value="Ulangan Harian">Ulangan Harian</option>
                                                    <option value="Ulangan Tengah Semester">Ujian Tengah Semester</option>
                                                    <option value="Ulangan Akhir Sekolah">Ujian Akhir Sekolah</option>
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-sm-9" style="float: left;">
                                                <input type="date" id="tanggal" name="tanggal" class="form-control">
                                            </div>
                                            <!-- <select style="width: 175px; margin-bottom: 15px;" id="country" name="tanggal" class="form-control">
                                    <?php foreach ($tanggal as $m) : ?>
                                        <option value="<?= $m->tanggal ?>"> <?= $m->tanggal ?></option>
                                    <?php endforeach; ?>
                                </select> -->
                                            <button type="submit" class="btn btn-success">Cari</button>
                                        </form>
                                </div>
                            </div>
                            <br>
                            <br>
                        <?php else : ?>
                            <form action="<?= base_url('User/Guru/TampilKuis/'); ?>" method="POST">
                                <div class="col-sm-9">
                                    <select id="country" name="jenisujian" class="form-control">>
                                        <option value="">Semua Jenis</option>
                                        <option value="Ulangan Harian">Ulangan Harian</option>
                                        <option value="Ulangan Tengah Semester">Ujian Tengah Semester</option>
                                        <option value="Ulangan Akhir Sekolah">Ujian Akhir Sekolah</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-sm-9" style="float: left;">
                                    <input type="date" id="tanggal" name="tanggal" class="form-control">
                                </div>
                                <!-- <select style="width: 175px; margin-bottom: 15px;" id="country" name="tanggal" class="form-control">
                                    <?php foreach ($tanggal as $m) : ?>
                                        <option value="<?= $m->tanggal ?>"> <?= $m->tanggal ?></option>
                                    <?php endforeach; ?>
                                </select> -->
                                <button type="submit" class="btn btn-success">Cari</button>
                            </form>
                        <?php endif; ?>
                        <br>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIS</th>
                                    <th scope="col">Judul Kuis</th>
                                    <th scope="col">Jenis Ujian</th>
                                    <th scope="col">Tanggal Berakhir</th>
                                    <th scope="col">Nama Mapel</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php foreach ($absensi as $a) : ?>
                                <tbody>
                                    <tr>
                                        <td><?= $a->NAMA; ?></td>
                                        <td><?= $a->nis; ?></td>
                                        <td><?= $a->nama_ujian; ?></td>
                                        <td><?= $a->jenis; ?></td>
                                        <td><?= $a->tanggal_berakhir; ?></td>
                                        <td><?= $a->mata_pelajaran; ?></td>
                                        <td><?= $a->kelas, ' ', $a->nama_jurusan; ?></td>
                                        <?php if ($a->status == 1) : ?>
                                            <td>Mengerjakan</td>
                                            <td><?= $a->nilai; ?></td>
                                            <td> <?php
                                                    echo anchor(base_url('User/Guru/TampilKuis/Koreksi/' . $a->id_ujian), 'Koreksi');
                                                    echo ' | ';
                                                    echo anchor(base_url('User/Guru/TampilKuis/delete/' . $a->id_ujian), 'Delete'); ?>
                                            <?php else : ?>
                                            <td>Tidak Ikut Ujian</td>
                                            <td>-</td>
                                            <td>-</td>
                                        <?php endif; ?>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 agile-course-main-2 mt-4">
                <img src="images/am1.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</body>