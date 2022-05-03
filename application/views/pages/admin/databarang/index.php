            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>
                

            <div class="top-table">
                <h5 class="title-h4" style="margin-top: 7px">Data Barang</h5>
                <?php if($this->session->userdata('role') == 'Admin'){ ?>
                    <a href="<?php echo site_url('databarang/inputdata')?>" class="btn btn-primary mt-1" style="font-size: 14px;">Tambah Data Barang</a> 
                <?php } ?>
            </div>

            <hr style="margin: 5px 40px 0px 40px; " size="1">

            <div class="table-data">
                <table class="table" id="example">
                <thead>
                    <tr class="tr-1">
                        <th scope="col" width="5%">No</th>
                        <th scope="col" width="25%">Nama Barang</th>
                        <th scope="col" width="10%">Kategori</th>
                        <th scope="col" width="25%">Supplier</th>
                        <th scope="col">Stok</th>
                        <?php if($this->session->userdata('role') == 'Admin'){?>
                            <th scope="col" style="text-align: center;">Opsi</th>
                        <?php }else{} ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($barang as $b){ ?>
                    <tr>
                        <td scope="row" style="text-align: center;padding-right: 15px;"><?php echo $i; ?></td>
                        <td width="25%"><?php echo $b->nama ?></td>
                        <td width="15%">
                            <?php if($b->nama_kategori == null){ echo "Tidak ada";}
                                  else{echo $b->nama_kategori;} ?>
                        </td>
                        <td width="25%">
                            <?php if($b->nama_supplier == null){ echo "Tidak ada";}
                                  else{echo $b->nama_supplier;} ?>       
                        </td>
                        <td>
                            <div class="<?php if($b->stok == 0){ echo 'badge badge-danger'; }?>"><?php echo $b->stok ?> <?php echo $b->nama_satuan ?></div>
                        </td>
                        <?php if($this->session->userdata('role') == 'Admin'){?>
                            <td style="text-align: center;">
                                <a href="<?php echo site_url('databarang/edit/'.$b->id) ?>" style="padding: 6px;" class="btn btn-primary mr-1 ">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a> 
                                <a href="<?php echo site_url('databarang/hapus/'.$b->id) ?>" style="padding: 6px 8px;" class="btn btn-danger">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        <?php }else{} ?>
                    </tr>
                    <?php $i++; ?>
                    <?php } ?>
                </tbody>
                </table>    
            </div>
        </div>