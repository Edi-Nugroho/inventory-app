            <h5 class="title-h4">Perubahan Data Supplier</h5>
            <form action="<?php echo site_url('supplier/updatedata'); ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $supplier->id?>">
                <div class="table-data-input">
                    <h6>Update Data Supplier</h6>
                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Nama Supplier</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Nama" aria-describedby="basic-addon1" name="nama" value="<?php echo $supplier->nama_supplier?>">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Email</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Nama" aria-describedby="basic-addon1" name="email" value="<?php echo $supplier->email?>">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">No. Hp</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Nama" aria-describedby="basic-addon1" name="no_hp" value="<?php echo $supplier->no_hp?>">
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Alamat</label>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Nama" aria-describedby="basic-addon1" name="alamat" value="<?php echo $supplier->alamat?>">
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('supplier')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>