<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Input Barang Keluar
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barangkeluar') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <form action="<?= base_url() . 'barangkeluar/addAksi'; ?>" method="post">
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="user_id"></label>
                        <div class="col-md-9">
                            <input value="<?= set_value('user_id', $this->session->userdata('login_session')['user']); ?>" name="user_id" id="user_id" type="text" class="form-control" placeholder="ID Barang...">
                            <?= form_error('user_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang_keluar">ID Transaksi Barang Masuk</label>
                        <div class="col-md-9">
                            <input readonly value="<?= set_value('id_barang_keluar', $id_barang_keluar); ?>" name="id_barang_keluar" id="id_barang_keluar" type="text" class="form-control" placeholder="ID Barang...">
                            <?= form_error('id_barang_keluar', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="tanggal_keluar">Tanggal Keluar</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('tanggal_keluar', date('Y-m-d')); ?>" name="tanggal_keluar" id="tanggal_keluar" type="text" class="form-control date" placeholder="Tanggal Masuk..." required>
                            <?= form_error('tanggal_keluar', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Barang</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="id_barang" id="id_barang" class="custom-select" required>
                                    <option value="" selected disabled>Pilih Barang</option>
                                    <?php foreach ($barang as $b) : ?>
                                        <option <?= set_select('id_barang', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('supplier/add'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('id_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col offset-md-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                    </from>
            </div>
        </div>
    </div>
</div>