            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>

            <div class="top-table">
                <h5 class="title-h4" style="padding-top: 7px">Laporan Barang Masuk</h5>
            </div> 

            <hr style="margin: 5px 40px 0px 40px; " size="1">
            <form action="<?= site_url('laporanmasuk/index'); ?>" method="POST">
                <div class="button-laporan">
                    <div class="tgl">
                        <input type="text" class="form-control" id="datepicker" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
                        sd
                        <input type="text" class="form-control" id="datepicker1" name="tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="<?= site_url('laporanmasuk/index'); ?>" style="color: #FFF;" class="btn btn-warning">Refresh</a>
                    <a href="<?= site_url('laporanmasuk/pdf'); ?>" target="blank" class="btn btn-danger">PDF</a> 
                </div>
            </form>

            <div class="table-data">
                <table class="table" id="example">
                <thead>
                    <tr class="tr-1">
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Jumlah Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($barang_msk as $b) {?>
                    <tr>
                        <td scope="row" style="padding-left: 20px;"><?php echo $i; ?></td>
                        <td><?= $b->nama; ?></td>
                        <td><?= $b->nama_supplier; ?></td>
                        <td style="padding-left: 30px;"><?= nice_date($b->tgl_masuk,'d-m-Y'); ?></td>
                        <td><?= $b->kuantitas;?> <?= $b->nama_satuan;?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php } ?>
                </tbody>
                </table>   
            </div>
        </div>