            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>

            <div class="top-table">
                <h5 class="title-h4" style="margin-top: 7px">Data Satuan</h5>
                <?php if($this->session->userdata('role') == 'Admin'){?>
                    <a href="<?php echo site_url('satuan/inputdata')?>" class="btn btn-primary mt-1" style="font-size: 14px;">Tambah Data Satuan</a>  
                <?php } ?>
            </div>

            <hr style="margin: 5px 40px 0px 40px; " size="1">

            <div class="table-data">
            <table class="table" id="example">
                <thead>
                    <tr class="tr-1">
                        <th scope="col" width="20%">No</th>
                        <th scope="col" width="10%">Nama Satuan</th>
                        <?php if($this->session->userdata('role') == 'Admin'){?>
                            <th scope="col" style="text-align: center;">Opsi</th>
                        <?php }else{} ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($satuan as $s){ ?>
                    <tr>
                        <td scope="row"><?php echo $i; ?></td>
                        <td width="50%"><?php echo $s->nama_satuan ?></td>
                        <?php if($this->session->userdata('role') == 'Admin'){?>
                            <td style="text-align: center;padding: 15px;">
                                <a href="<?php echo site_url('satuan/hapus/'.$s->id) ?>" style="padding: 6px 8px;" class="btn btn-danger">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </td>
                        <?php }else{} ?>
                    </tr>
                    <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>    
            </div>
        </div>