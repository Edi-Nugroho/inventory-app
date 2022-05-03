            <h5 class="title-h4" style="margin-top: 10px">Penambahan Staff</h5>
            <form action="<?php echo site_url('staff/simpan'); ?>" method="POST">
                <div class="table-data-input">
                    <h6>Tambah Staff Baru</h6>

                    <div class="input-group mb-4">
                        <label for="input1" class="form-label">Nama Staff</label>
                        <input type="text" id="input1" class="form-control" placeholder="Masukkan Nama" aria-label="Nama" aria-describedby="basic-addon1" name="nama" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input2" class="form-label">Email</label>
                        <input type="text" id="input2" class="form-control" placeholder="Masukkan Email" aria-label="Nama" aria-describedby="basic-addon1" name="email" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input3" class="form-label">Nomor Hp</label>
                        <input type="text" id="input3" class="form-control" placeholder="Masukkan Nomor Hp" aria-label="Nama" aria-describedby="basic-addon1" name="no_hp" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input4" class="form-label">Role</label>
                        <select class="form-select" id="single-select-field" data-placeholder="Masukkan Role" name="role">
                            <option selected>Masukkan Role</option>
                                <option>Admin</option>
                                <option>Petugas</option>
                        </select>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input5" class="form-label">Password</label>
                        <input type="password" id="input5" class="form-control" placeholder="Masukkan password" aria-label="Nama" aria-describedby="basic-addon1" name="password" autocomplete="off">
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('staff')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>