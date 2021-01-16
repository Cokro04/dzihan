<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Data Barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang/detailBarang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', []); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="id_detail_barang">ID Detail Barang</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('id_detail_barang', $id_detail_barang); ?>" name="id_detail_barang" id="id_detail_barang" type="text" class="form-control" placeholder="ID Barang...">
                        <input value="BM" name="aksi" id="aksi" type="text" class="form-control" hidden>
                        <?= form_error('id_detail_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_barang">Nama Barang</label>
                    <div class="col-md-9">
                        <input required value="<?= set_value('nama_barang'); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <?php if (isset($id_barang) == TRUE) : ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Id Barang</label>
                        <div class="col-md-9">
                            <input readonly value="<?= set_value('id_barang', $id_barang); ?>" name="id_barang" id="id_barang" type="text" class="form-control" placeholder="Nama Barang...">
                            <?= form_error('id_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row form-group">
                        <label class="col-md-3 text-md-right" for="id_barang">Id Barang</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <select name="id_barang" id="id_barang" class="custom-select">
                                    <option value="" selected disabled>Pilih Satuan Barang</option>
                                    <?php foreach ($barang as $b) : ?>
                                        <option <?= set_select('id_barang', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['id_barang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="input-group-append">
                                    <a class="btn btn-primary" href="<?= base_url('satuan/add'); ?>"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <?= form_error('id_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>