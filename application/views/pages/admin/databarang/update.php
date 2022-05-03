            <h5 class="title-h4">Perubahan Data Barang</h5>
            <form action="<?php echo site_url('databarang/updatedata'); ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $barang->id?>">
                <div class="table-data-input">
                    <h6>Update Data Barang</h6>
                    <div class="input-group mb-4">
                        <label for="input" class="form-label">Nama Barang</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-nama.png"/ width="25px">
                        </span>
                        <input type="text" id="input" class="form-control" placeholder="Masukkan Nama Barang" aria-label="Nama" aria-describedby="basic-addon1" name="nama" value="<?php echo $barang->nama?>">
                    </div>

                    <div class="input-group mb-4" style="padding-right: 20px;">
                        <label for="input1" class="form-label">Kategori</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-kategori.png"/ width="24px">
                        </span>
                        <select class="form-select" id="single-select-field" aria-label="Default select example" name="id_ktg">
                            <?php 
                                foreach($kategori as $k){ 
                                    $selected = "";
                                    if ($k->id == $barang->id_ktg ){
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$k->id.'" '.$selected.'>'.$k->nama_kategori.'</option>';
                                } ?>
                        </select>
                    </div>

                    <div class="input-group mb-4" style="padding-right: 20px;">
                        <label for="input1" class="form-label">Supplier</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-nama.png"/ width="24px">
                        </span>
                        <select class="form-select" id="single-select-field-2" aria-label="Default select example" name="id_spl">
                            <?php 
                                foreach($supplier as $s){ 
                                    $selected = "";
                                    if ($s->id == $supplier->id_spl ){
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$s->id.'" '.$selected.'>'.$s->nama_supplier.'</option>';
                                } ?>
                        </select>
                    </div>

                    <div class="input-group mb-4" style="padding-right: 20px;">
                        <label for="input2" class="form-label">Satuan</label>
                        <span class="input-group-text" id="basic-addon1">
                            <img src="<?php echo base_url('assets/icons/')?>box-satuan.png"/ width="25px">
                        </span>
                        <select class="form-select" id="single-select-field-1" aria-label="Default select example" name="id_stn">
                            <?php 
                                foreach($satuan as $s){ 
                                    $selected = "";
                                    if ($s->id == $barang->id_stn ){
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$s->id.'" '.$selected.'>'.$s->nama_satuan.'</option>';
                                } ?>
                        </select>
                    </div>

                    <div class="button-group">
                        <button type="submit" class="btn btn-primary mr-1" style="font-size: 14px;">Submit</button>
                        <a href="<?php echo site_url('databarang')?>" class="btn btn-danger" style="font-size: 14px;">Batal</a>
                    </div>
                </div>
            </form>