            <div style="margin: 0px 35px; font-size: 14px;">
                <?= $this->session->flashdata('pesan'); ?>
                <?= $this->session->unset_userdata('pesan'); ?>
            </div>
            <h5 class="title-h4" style="margin-top: 10px">Penambahan Data Transaksi</h5>
            <form action="<?php echo site_url('barangkeluar/simpan'); ?>" method="POST">
                <div class="table-data-input">
                    <h6>Tambah Data Transaksi Baru</h6>

                    <div class="input-group mb-4" style="padding-right: 20px;">
                        <label for="input" class="form-label">Nama Barang</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-nama.png"/ width="25px">
                        </span>
                        <select class="form-select" id="single-select-field-1" aria-label="Default select example" name="id_barang">
                            <option selected>Masukkan Nama Barang</option>
                            <?php foreach($barang as $b){ ?>
                                <?php if($b->stok <= 0){ ?>
                                    <option value="<?php echo $b->id; ?>" disabled="disabled"><?php echo $b->nama; ?> ( Stok Kosong)</option>
                                <?php }else{ ?>
                                    <option value="<?php echo $b->id; ?>"><?php echo $b->nama; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group date mb-4">
                        <label for="input1" class="form-label">Tanggal Keluar</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?= base_url('assets/icons/'); ?>kalender.png"/ width="25px">
                        </span>
                        <input type="text" class="form-control" id="datepicker" name="tgl_keluar" style="margin-right: 20px;" autocomplete="off" value="<?= date("d-m-Y"); ?>">
                        <span class="input-group-append">
                        </span>
                    </div>

                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Kuantitas</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-satuan.png"/ width="25px">
                        </span>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Kuantitas" aria-label="Nama" aria-describedby="basic-addon1" name="kuantitas" autocomplete="off">
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('barangkeluar')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>
     