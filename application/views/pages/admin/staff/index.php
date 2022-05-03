<div style="margin: 0px 35px; font-size: 14px;">
  <?= $this->session->flashdata('pesan'); ?>
  <?= $this->session->unset_userdata('pesan'); ?>
</div>

<div class="top-table">
    <h5 class="title-h4" style="padding-top: 7px">Data Staff</h5>
    <a href="<?php echo site_url('staff/inputdata')?>" class="btn btn-primary mt-1" style="font-size: 14px;">Tambah Data Staff</a> 
</div> 

<div class="table-data">
    <table class="table" id="example">
    <thead>
        <tr class="tr-1">
            <th scope="col" width="5%">No</th>
            <th scope="col" width="25%">Nama Staff</th>
            <th scope="col" width="10%">Email</th>
            <th scope="col" width="17%">No. Hp</th>
            <th scope="col">Role</th>
            <th scope="col" style="text-align: center;">Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        <?php foreach($staff as $s) {?>
        <tr>
            <td scope="row" style="text-align: center;padding-right: 15px;"><?php echo $i; ?></td>
            <td width="25%"><?= $s->nama; ?></td>
            <td width="15%">
                <?php if($s->email == null){ echo "Tidak ada";}
                      else{echo $s->email;} ?>
            </td>
            <td width="17%">
                <?php if($s->no_hp == null){ echo "Tidak ada";}
                      else{echo $s->no_hp;} ?>       
            </td>
            <td>
                <?php if($s->role == null){ echo "Tidak ada";}
                      else{echo $s->role;} ?>  
            </td>
                <td style="text-align: center;">
                  <a href="<?php echo site_url('staff/hapus/'.$s->id)?>" style="padding: 3px 8px;font-size: 14px;" class="btn btn-danger">
                      <i class="fa-regular fa-trash-can"></i> Delete
                  </a>
                </td>
        </tr>
        <?php $i++; ?>
        <?php } ?>
    </tbody>
    </table>    
</div>
