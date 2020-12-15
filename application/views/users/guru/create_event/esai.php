<div class="card-body">
    <form class="form-horizontal" method="POST" action="<?= base_url('User/Guru/EssayEvent/tambahData'); ?>" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
                <label for="birthDate" class="col-sm-3 control-label">Pilih Mata Pelajaran</label>
                <div class="col-sm-9">
                    <select id="country" class="form-control" name="mapel" id="mapel">
                        <?php foreach ($mengajar as $m) : ?>
                            <option value="<?= $m->id_mengajar ?>"> <?= $m->mata_pelajaran ?> - <?= $m->kelas ?> <?= $m->nama_jurusan ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="namatugas" class="col-sm-3 control-label">Nama tugas</label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" id="nama" placeholder="nama tugas" name="nama">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                <div class="col-sm-9">
                    <input type="text" id="Keterangan" name="keterangan" placeholder="keterangan" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="birthDate" class="col-sm-3 control-label">Batas Akhir</label>
                <div class="col-sm-3">
                    <input type="datetime-local" id="tanggalberakhir" name="tanggalberakhir" class="form-control">
                    <?= form_error('tanggalberakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label for="keterangan" class="col-sm-3 control-label">Masukkan File</label>
                <div class="col-sm-9">
                    <input type="file" name="file_input" id="file_input" class="btn btn-info upload">
                    <?= form_error('file_input', '<small class="text-danger pl-3">', '</small>'); ?>

                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3 col-sm-offset-3">
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
    </form>
</div> <!-- /.form-group -->
</div>
</div>
</div>
</div>