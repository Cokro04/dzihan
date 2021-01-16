<?php if (is_admin()) : ?>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Barang Keluar
                    </h4>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>ID Satuan</th>
                        <th>Nama Detail Barang</th>
                        <th>Status</th>
                        <th>ID Jenis Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($dbarang) :
                        foreach ($dbarang as $b) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['id_detail_barang']; ?></td>
                                <td><?= $b['nama_barang']; ?></td>
                                <th><?= $b['aksi']; ?></th>
                                <td><?= $b['id_barang']; ?></td>
                                <td>
                                    <form action="<?= base_url() . 'barangkeluar/update/' . $b['id_detail_barang']; ?>" method="post">
                                        <input value="<?= $id_barang; ?>" name="id_barang" type="text" hidden>
                                        <input value="BK" name="aksi" type="text" hidden>
                                        <button type="submit" class="btn btn-sm btn-primary btn-icon-split">
                                            <span class="icon">
                                                <i class="fa fa-upload"></i>
                                            </span>
                                            <span class="text">
                                                Barang Keluar
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>

<?php if (is_gudang()) : ?>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header bg-white py-3">
            <div class="row">
                <div class="col">
                    <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                        Data Barang
                    </h4>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>ID Satuan</th>
                        <th>Nama Detail Barang</th>
                        <th>Status</th>
                        <th>ID Jenis Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if ($dbarang) :
                        foreach ($dbarang as $b) :
                    ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['id_detail_barang']; ?></td>
                                <td><?= $b['nama_barang']; ?></td>
                                <th><?= $b['aksi']; ?></th>
                                <td><?= $b['id_barang']; ?></td>
                                <td>
                                    <form action="<?= base_url() . 'barangkeluar/update/' . $b['id_detail_barang']; ?>" method="post">
                                        <input value="<?= $id_barang; ?>" name="id_barang" type="text" hidden>
                                        <input value="BK" name="aksi" type="text" hidden>
                                        <button type="submit" class="btn btn-sm btn-primary btn-icon-split">
                                            <span class="icon">
                                                <i class="fa fa-upload"></i>
                                            </span>
                                            <span class="text">
                                                Barang Keluar
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data Kosong
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>