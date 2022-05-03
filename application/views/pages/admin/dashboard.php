            <div class="dashboard-card">
                <div class="kotak">
                    <div class="data">
                        <h6>Data Barang</h6>
                        <h4 class="angka"><?php echo $countdata; ?></h4>   
                    </div>
                    <div class="icon">
                        <img src="<?php echo base_url('assets/icons/')?>data-barang.png"/ width="40px">
                    </div>
                </div>

                <div class="kotak-1">
                    <div class="data">
                        <h6>Transaksi Masuk</h6>
                        <h4 class="angka"><?php echo $countdata_msk; ?></h4>   
                    </div>
                    <div class="icon">
                        <img src="<?php echo base_url('assets/icons/')?>barang-masuk.png"/ width="40px">
                    </div>            
                </div>

                <div class="kotak">
                    <div class="data">
                        <h6>Transaksi Keluar</h6>
                        <h4 class="angka"><?php echo $countdata_klr; ?></h4>   
                    </div>
                    <div class="icon">
                        <img src="<?php echo base_url('assets/icons/')?>barang-keluar.png"/ width="40px">
                    </div>
                </div>                     
            </div>

            <h5 class="title-h4" style="margin-top: 20px;">Data Barang</h5>

            <div class="table-data">
                <table class="table">
                <thead>
                    <tr class="tr-1">
                        <th scope="col" width="5%">No</th>
                        <th scope="col" width="38%" style="padding-left: 50px;">Nama Barang</th>
                        <th scope="col" width="15%">Kategori</th>
                        <th scope="col" style="text-align: center;">Stok</th>
                        <th scope="col" style="text-align: center;">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($barang as $b){ ?>
                    <tr>
                        <td scope="row" style="text-align: center;padding-right: 15px;"><?php echo ++$start; ?></td>
                        <td width="30%" style="padding-left: 50px;"><?php echo $b->nama ?></td>
                        <td width="15%" style="padding: 15px;"><?php echo $b->nama_kategori ?></td>
                        <td style="text-align: center;"><?php echo $b->stok ?></td>
                        <td style="text-align: center;"><?php echo $b->nama_satuan ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table> 
            </div>
            <div style="font-size: 14px;">
               <?= $this->pagination->create_links();  ?> 
            </div>
        </div>