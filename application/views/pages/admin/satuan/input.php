            <h5 class="title-h4" style="margin-top: 10px">Penambahan Data Satuan</h5>
            <form action="<?php echo site_url('satuan/simpan'); ?>" method="POST">
                <div class="table-data-input">
                    <h6>Tambah Data Satuan Baru</h6>

                    <div class="input-group mb-4">
                        <label for="input1" class="form-label">Nama Satuan</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-satuan.png"/ width="25px">
                        </span>
                        <input type="text" id="input1" class="form-control" placeholder="Masukkan Satuan" aria-label="Kategori" aria-describedby="basic-addon1" name="nama">
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('satuan')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>

            