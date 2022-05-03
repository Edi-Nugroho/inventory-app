            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>

            <div class="top-table">
                <h5 class="title-h4" style="margin-top: 7px">Laporan Barang Keluar</h5>
            </div> 

            <hr style="margin: 5px 40px 0px 40px; " size="1">
            <form action="<?= site_url('laporankeluar/index'); ?>" method="POST">
                <div class="button-laporan">
                    <div class="tgl">
                        <input type="text" class="form-control" id="datepicker" name="tgl_awal" placeholder="Tanggal Awal" autocomplete="off">
                        sd
                        <input type="text" class="form-control" id="datepicker1" name="tgl_akhir" placeholder="Tanggal Akhir" autocomplete="off">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="<?= site_url('laporankeluar/index'); ?>" style="color: #FFF;" class="btn btn-warning">Refresh</a>
                    <a href="<?= site_url('laporankeluar/pdf'); ?>" target="blank" class="btn btn-danger">PDF</a> 
                </div>
            </form>

            <div class="table-data">
                <table class="table" id="example">
                <thead>
                    <tr class="tr-1">
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col">Jumlah Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($barang_klr as $b) {?>
                    <tr>
                        <td scope="row" style="padding-left: 20px;"><?php echo $i; ?></td>
                        <td><?= $b->nama; ?></td>
                        <td style="padding-left: 30px;"><?= nice_date($b->tgl_keluar,'d-m-Y'); ?></td>
                        <td><?= $b->kuantitas;?> <?= $b->nama_satuan;?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php } ?>
                </tbody>
                </table>    
            </div>
        </div>