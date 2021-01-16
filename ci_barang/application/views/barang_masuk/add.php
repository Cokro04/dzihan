<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Input Barang Masuk
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barangmasuk') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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

                <form action="<?= base_url() . 'barangmasuk/addAksi1'; ?>" method="post">

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="user_id"></label>
                        <div class="col-md-9">
                            <input hidden value="<?= set_value('user_id', $this->session->userdata('login_session')['user']); ?>" name="user_id" id="user_id" type="text" class="form-control" placeholder="ID Barang...">
                            <?= form_error('user_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang_masuk">ID Transaksi Barang Masuk</label>
                        <div class="col-md-9">
                            <input readonly value="<?= set_value('id_barang_masuk', $id_barang_masuk); ?>" name="id_barang_masuk" id="id_barang_masuk" type="text" class="form-control" placeholder="ID Barang...">
                            <?= form_error('id_barang_masuk', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="tanggal_masuk">Tanggal Masuk</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('tanggal_masuk', date('Y-m-d')); ?>" name="tanggal_masuk" id="tanggal_masuk" type="text" class="form-control date" placeholder="Tanggal Masuk..." required>
                            <?= form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="supplier_id">Supplier</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="supplier_id" id="supplier_id" class="custom-select" required>
                                    <option value="" selected disabled>Pilih Supplier</option>
                                    <?php foreach ($supplier as $s) : ?>
                                        <option <?= set_select('supplier_id', $s['id_supplier']) ?> value="<?= $s['id_supplier'] ?>"><?= $s['nama_supplier'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('supplier/add'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('supplier_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">ID Barang</label>
                        <div class="col-md-9">
                            <input readonly value="<?= set_value('id_barang', $id_barang); ?>" name="id_barang" id="id_barang" type="text" class="form-control" placeholder="ID Barang..." required>
                            <?= form_error('id_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                        <div class="col-md-9">
                            <input value="<?= set_value('nama_barang'); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang..." required>
                            <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="jenis_id">Jenis Barang</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="jenis_id" id="jenis_id" class="custom-select" required>
                                    <option value="" selected disabled>Pilih Jenis Barang</option>
                                    <?php foreach ($jenis as $j) : ?>
                                        <option <?= set_select('jenis_id', $j['id_jenis']) ?> value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="satuan_id">Satuan Barang</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="satuan_id" id="satuan_id" class="custom-select" required>
                                    <option value="" selected disabled>Pilih Satuan Barang</option>
                                    <?php foreach ($satuan as $s) : ?>
                                        <option <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('satuan/add'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col offset-md-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>