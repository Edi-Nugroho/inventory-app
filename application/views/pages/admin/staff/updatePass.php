            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>

            <h5 class="title-h4" style="margin-top: 10px">Update Staff</h5>
            <form action="<?php echo site_url('myprofile/updatepass'); ?>" method="POST">
                <input type="hidden" name="id" value="<?= $this->session->userdata('id'); ?>">
                <div class="table-data-input">
                    <h6>Ganti Password</h6>
                    <div class="input-group mb-4">
                        <label for="input5" class="form-label">Password Saat Ini</label>
                        <input type="password" id="input5" class="form-control" placeholder="Masukkan password" aria-label="Nama" aria-describedby="basic-addon1" name="cekpass" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input5" class="form-label">New Password</label>
                        <input type="password" id="input5" class="form-control" placeholder="Masukkan password" aria-label="Nama" aria-describedby="basic-addon1" name="password" autocomplete="off">
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('myprofile')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>