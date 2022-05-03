        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn">
                        <i class="fa-solid fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" style="display: flex;">
                                <a class="nav-link" href="<?= site_url('myprofile') ?>"><?= $this->session->userdata('nama'); ?></a>
                                <a class="nav-link" href="<?= site_url('login/logout'); ?>">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>