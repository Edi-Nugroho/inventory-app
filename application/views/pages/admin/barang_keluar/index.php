            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>

            <div class="top-table">
                <h5 class="title-h4" style="margin-top: 7px">Data Transaksi Keluar</h5>
                <a href="<?php echo site_url('barangkeluar/inputdata')?>" class="btn btn-primary mt-1" style="font-size: 14px;">Tambah Data Transaksi</a> 
            </div> 

            <hr style="margin: 5px 40px 0px 40px; " size="1">

            <div class="table-data">
                <table class="table" id="example">
                <thead>
                    <tr class="tr-1">
                        <th scope="col">No</th>
                        <th scope="col" style="padding-left: 30px;">Nama Barang</th>
                        <th scope="col" style="text-align: center;">Tanggal Keluar</th>
                        <th scope="col" style="text-align: center;">Jumlah Keluar</th>
                        <th scope="col" style="text-align: center;">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($barang_klr as $b) {?>
                    <tr>
                        <td scope="row" style="padding-left: 20px;padding-right: 30px;"><?php echo $i; ?></td>
                        <td style="padding-left: 30px;"><?= $b->nama; ?></td>
                        <td style="text-align: center;"><?= nice_date($b->tgl_keluar,'d-m-Y'); ?></td>
                        <td style="text-align: center;"><?= $b->kuantitas;?> <?= $b->nama_satuan;?></td>
                        <td style="text-align: center;">
                            <a href="<?php echo site_url('barangkeluar/detail/'.$b->id) ?>" style="padding: 5px; font-size: 12px;" class="btn btn-primary mr-1 ">
                                Detail
                            </a> 
                            <a href="<?php echo site_url('barangkeluar/hapus/'.$b->id)?>" style="padding: 3px 8px;" class="btn btn-danger">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php } ?>
                </tbody>
                </table>    
            </div>
            <div style="font-size: 14px;">
               <?= $this->pagination->create_links();  ?> 
            </div>
        </div>