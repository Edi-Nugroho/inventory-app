            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>
                

            <div class="top-table">
                <h5 class="title-h4" style="margin-top: 7px">Data Supplier</h5>
                <?php if($this->session->userdata('role') == 'Admin'){?>
                    <a href="<?= site_url('supplier/inputdata')?>" class="btn btn-primary mt-1" style="font-size: 14px;">Tambah Data Supplier</a> 
                <?php } ?>
            </div>

            <hr style="margin: 5px 40px 0px 40px; " size="1">

            <div class="table-data">
                <table class="table" id="example">
                <thead>
                    <tr class="tr-1">
                        <th scope="col" width="5%">No</th>
                        <th scope="col" width="25%">Nama Supplier</th>
                        <th scope="col" width="15%">Email</th>
                        <th scope="col" width="15%">No Hp</th>
                        <th scope="col" width="20%">Alamat</th>
                        <?php if($this->session->userdata('role') == 'Admin'){?>
                            <th scope="col" style="text-align: center;">Opsi</th>
                        <?php }else{} ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($supplier as $s){ ?>
                    <tr>
                        <td scope="row"><?= $i; ?></td>
                        <td><?= $s->nama_supplier ?></td>
                        <td><?= $s->email ?></td>
                        <td><?= $s->no_hp ?></td>
                        <td><?= $s->alamat ?></td>
                        <?php if($this->session->userdata('role') == 'Admin'){?>
                            <td style="text-align: center;">
                                <a href="<?= site_url('supplier/edit/'.$s->id) ?>" style="padding: 6px;" class="btn btn-primary mr-1 ">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a> 
                                <a href="<?= site_url('supplier/hapus/'.$s->id) ?>" style="padding: 6px 8px;" class="btn btn-danger">
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