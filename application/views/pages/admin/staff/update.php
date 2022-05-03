            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>

            <h5 class="title-h4" style="margin-top: 10px">Update Staff</h5>
            <form action="<?php echo site_url('myprofile/updatedata'); ?>" method="POST">
                <input type="hidden" name="id" value="<?= $this->session->userdata('id'); ?>">
                <div class="table-data-input">
                  <h6>Update Profile</h6>

                    <div class="input-group mb-4">
                        <label for="input1" class="form-label">Nama Staff</label>
                        <input type="text" id="input1" class="form-control" placeholder="Masukkan Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama" autocomplete="off" value="<?= $this->session->userdata('nama'); ?>">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input2" class="form-label">Email</label>
                        <input type="text" id="input2" class="form-control" placeholder="Masukkan Email" aria-label="Nama" aria-describedby="basic-addon1" name="email" autocomplete="off" value="<?= $this->session->userdata('email'); ?>">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input3" class="form-label">Nomor Hp</label>
                        <input type="text" id="input3" class="form-control" placeholder="Masukkan Nomor Hp" aria-label="Nama" aria-describedby="basic-addon1" name="no_hp" autocomplete="off" value="<?= $this->session->userdata('no_hp'); ?>">
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('myprofile')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                        <a href="<?php echo site_url('myprofile/editPass/'.$this->session->userdata('id'))?>" class="btn btn-success ml-1" style="font-size: 14px;">Change Password</a>
                    </div>
                </div>
            </form>