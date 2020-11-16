<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Siswa</h6>
        </div>
        <div class="card-body">

            <form action="<?= base_url('Admin/datasiswa/update'); ?>" method="post">
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NIS</h6>
                    </label>
                    <input type="text" class="form-control" name="nis" id="nis" placeholder="nis" value="<?= $edit->nis ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NAMA</h6>
                    </label> <input type="text" class="form-control" name="nama" id="nama" placeholder="nama" value="<?= $edit->nama ?>" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">JENIS_KELAMIN</h6>
                    </label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value="laki-laki" <?php if ($edit->jenis_kelamin == 'laki-laki') echo "selected" ?>>laki-laki</option>
                        <option value="wanita" <?php if ($edit->jenis_kelamin == 'wanita') echo "selected" ?>>wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">ALAMAT</h6>
                    </label> <input type="text" class="form-control" name="alamat" id="alamat" placeholder="alamat" value="<?= $edit->alamat ?>" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">AGAMA</h6>
                    </label>
                    <select class="form-control" name="agama" id="agama">
                        <option value="Islam" <?php if ($edit->agama == 'Islam') echo "selected" ?>>Islam</option>
                        <option value="Kristen" <?php if ($edit->agama == 'Kristen') echo "selected" ?>>Kristen</option>
                        <option value="Hindu" <?php if ($edit->agama == 'Hindu') echo "selected" ?>>Hindu</option>
                        <option value="Buddha" <?php if ($edit->agama == 'Buddha') echo "selected" ?>>Buddha</option>
                        <option value="Khatolik" <?php if ($edit->agama == 'Khatolik') echo "selected" ?>>Khatolik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">NO HP</h6>
                    </label> <input type="number" class="form-control" name="no_hp" id="no_hp" maxlength="13" placeholder="Telp" value="<?= $edit->no_hp ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">
                        <h6 class="m-0 font-weight-bold text-dark">PASSWORD</h6>
                    </label> <input type="text" class="form-control" name="password" id="password" placeholder="password" value="<?= $edit->password ?>" />
                </div>
                <div class="form-group">
                    <label for="enum">
                        <h6 class="m-0 font-weight-bold text-dark">KELAS</h6>
                    </label>
                    <select class="form-control" name="kelas" id="kelas">
                        <option value="<?= $edit->id_kelas ?>"><?= $edit->kelas ?></option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('Admin/datasiswa'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>