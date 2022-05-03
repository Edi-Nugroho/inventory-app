            <h5 class="title-h4" style="margin-top: 10px">Penambahan Data Barang</h5>
            <form action="<?php echo site_url('databarang/simpan'); ?>" method="POST">
                <div class="table-data-input">
                    <h6>Tambah Data Barang Baru</h6>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Nama Barang</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-nama.png"/ width="25px">
                        </span>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Nama" aria-describedby="basic-addon1" name="nama" autocomplete="off">
                    </div>

                    <div class="input-group mb-4" style="padding-right: 20px;">
                        <label for="input1" class="form-label">Kategori</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-kategori.png"/ width="24px">
                        </span>
                        <select class="form-select" id="single-select-field" data-placeholder="Masukkan Kategori" name="id_ktg">
                            <option selected>Masukkan Kategori</option>
                            <?php foreach($kategori as $k){ ?>
                                <option value="<?php echo $k->id; ?>"><?php echo $k->nama_kategori; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group mb-4" style="padding-right: 20px;">
                        <label for="input3" class="form-label">Supplier</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-nama.png"/ width="24px">
                        </span>
                        <select class="form-select" id="single-select-field-2" data-placeholder="Masukkan Supplier" name="id_spl">
                            <option selected>Masukkan Supplier</option>
                            <?php foreach($supplier as $s){ ?>
                                <option value="<?php echo $s->id; ?>"><?php echo $s->nama_supplier; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group mb-4" style="padding-right: 20px;">
                        <label for="input2" class="form-label">Satuan</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-satuan.png"/ width="25px">
                        </span>
                        <select class="form-select" id="single-select-field-1" data-placeholder="Masukkan Satuan" name="id_stn">
                            <option selected>Masukkan Satuan</option>
                            <?php foreach($satuan as $s){ ?>
                                <option value="<?php echo $s->id; ?>"><?php echo $s->nama_satuan; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('databarang')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>

            