            <h5 class="title-h4" style="margin-top: 10px">Penambahan Data Supplier</h5>
            <form action="<?php echo site_url('supplier/simpan'); ?>" method="POST">
                <div class="table-data-input">
                    <h6>Tambah Data Supplier Baru</h6>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Nama Supplier</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Nama Supplier" aria-label="Nama" aria-describedby="basic-addon1" name="nama" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Email</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Email Supplier" aria-label="Nama" aria-describedby="basic-addon1" name="email" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">No. Hp</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan No. Hp Supplier" aria-label="Nama" aria-describedby="basic-addon1" name="no_hp" autocomplete="off">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Alamat</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Alamat Supplier" aria-label="Nama" aria-describedby="basic-addon1" name="alamat" autocomplete="off">
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('supplier')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>

            