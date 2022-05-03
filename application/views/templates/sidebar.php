        <nav id="sidebar">
            <div class="sidebar-header">
                <h5 style="font-weight: bold;"><span style="color: #009EFF;">INVE</span>NTORY</h5>
            </div>

            <ul class="list-unstyled components">
                <li class="<?php if($this->uri->segment('1') == "dashboard") { echo("active"); } ?>">
                    <a href="<?php echo site_url('dashboard') ?>">
                        <img src="<?php echo base_url('assets/icons/')?>dashboard.png" width="24px" style="margin-left: 6px; margin-right: 15px; margin-bottom: 3px;">
                        Dashboard
                    </a>        
                </li>

                <p>Manajemen Barang</p>

                <li class="<?php 
                                if($this->uri->segment('1') == "databarang" || $this->uri->segment('1') == "kategori" || $this->uri->segment('1') == "satuan" || $this->uri->segment('1') == "supplier") { echo("active"); }
                            ?>">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="<?php echo base_url('assets/icons/')?>data-master.png" width="24px" style="margin-left: 6px; margin-right: 15px; margin-bottom: 5px;">
                        Data Master
                    </a>
                    <ul class="<?php 
                                    if($this->uri->segment('1') == "barangmasuk" || $this->uri->segment('1') == "barangkeluar" || $this->uri->segment('1') == "dashboard" || $this->uri->segment('1') == "laporanmasuk" || $this->uri->segment('1') == "laporankeluar" || $this->uri->segment('1') == "staff" || $this->uri->segment('1') == "myprofile" || $this->uri->segment('1') == "") { echo("collapse"); }
                                ?> list-unstyled" id="homeSubmenu">
                        <li class="<?php 
                                        if($this->uri->segment('1') == "databarang") { echo("active"); }
                                    ?>">
                            <a href="<?php echo site_url('databarang') ?>">Data Barang</a>
                        </li>
                        <li class="<?php 
                                        if($this->uri->segment('1') == "kategori") { echo("active"); } 
                                    ?>">
                            <a href="<?php echo site_url('kategori') ?>">Kategori</a>
                        </li>
                        <li class="<?php 
                                        if($this->uri->segment('1') == "satuan") { echo("active"); } 
                                    ?>">
                            <a href="<?php echo site_url('satuan') ?>">Satuan</a>
                        </li>
                        <li class="<?php 
                                        if($this->uri->segment('1') == "supplier") { echo("active"); } 
                                    ?>">
                            <a href="<?php echo site_url('supplier') ?>">Supplier</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php 
                                if($this->uri->segment('1') == "barangmasuk" || $this->uri->segment('1') == "barangkeluar") { echo("active"); }
                            ?>">
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="<?php echo base_url('assets/icons/')?>transaksi.png" width="28px" style="margin-left: 6px; margin-right: 12px; margin-bottom: 5px;">
                        Transaksi
                    </a>
                    <ul class="<?php 
                                    if($this->uri->segment('1') == "databarang" || $this->uri->segment('1') == "kategori" || $this->uri->segment('1') == "satuan" || $this->uri->segment('1') == "supplier" || $this->uri->segment('1') == "dashboard" || $this->uri->segment('1') == "laporanmasuk" || $this->uri->segment('1') == "laporankeluar" || $this->uri->segment('1') == "staff" || $this->uri->segment('1') == "myprofile" || $this->uri->segment('1') == "") { echo("collapse"); }
                                ?> list-unstyled" id="pageSubmenu">
                        <li class="<?php 
                                        if($this->uri->segment('1') == "barangmasuk") { echo("active"); }
                                    ?>">
                            <a href="<?php echo site_url('barangmasuk') ?>">Barang Masuk</a>
                        </li>
                        <li class="<?php 
                                        if($this->uri->segment('1') == "barangkeluar") { echo("active"); }
                                    ?>">
                            <a href="<?php echo site_url('barangkeluar') ?>">Barang Keluar</a>
                        </li>
                    </ul>
                </li>

                <li class="<?php 
                                if($this->uri->segment('1') == "laporanmasuk" || $this->uri->segment('1') == "laporankeluar") { echo("active"); }
                            ?>">
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <img src="<?php echo base_url('assets/icons/')?>laporan.png" width="30px" style="margin-left: 6px; margin-right: 13px; margin-bottom: 5px;">
                        Laporan
                    </a>
                    <ul class="<?php 
                                    if($this->uri->segment('1') == "databarang" || $this->uri->segment('1') == "kategori" || $this->uri->segment('1') == "satuan" || $this->uri->segment('1') == "supplier" || $this->uri->segment('1') == "dashboard" || $this->uri->segment('1') == "barangmasuk" || $this->uri->segment('1') == "barangkeluar" || $this->uri->segment('1') == "staff" || $this->uri->segment('1') == "myprofile" || $this->uri->segment('1') == "") { echo("collapse"); }
                                ?> list-unstyled" id="pageSubmenu1">
                        <li class="<?php 
                                        if($this->uri->segment('1') == "laporanmasuk") { echo("active"); }
                                    ?>">
                            <a href="<?php echo site_url('laporanmasuk') ?>">Barang Masuk</a>
                        </li>
                        <li class="<?php 
                                        if($this->uri->segment('1') == "laporankeluar") { echo("active"); }
                                    ?>">
                            <a href="<?php echo site_url('laporankeluar') ?>">Barang Keluar</a>
                        </li>
                    </ul>
                </li>
                <?php if($this->session->userdata('role') == 'Admin') {?>
                    <p>Manajemen Staff</p>

                    <li class="<?php if($this->uri->segment('1') == "staff") { echo("active"); } ?>">
                        <a href="<?php echo site_url('staff') ?>">
                            <img src="<?php echo base_url('assets/icons/')?>user.png" width="24px" style="margin-left: 6px; margin-right: 15px;">
                            Staff
                        </a>        
                    </li>
                <?php } ?>
            </ul>
        </nav>