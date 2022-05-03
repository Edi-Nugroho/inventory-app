<div class="top-table">
    <h5 class="title-h4" style="padding-top: 7px">My Profile</h5>
</div> 

<hr style="margin: 5px 40px 0px 40px; " size="1">

<div class="staff">
  <div class="card-staff">
    <div class="card mb-3">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $this->session->userdata('nama'); ?></h5>
            <p class="card-text"><?= $this->session->userdata('email'); ?></p>
            <p class="card-text"><?= $this->session->userdata('no_hp'); ?></p>
            <p class="card-text"><?= $this->session->userdata('role'); ?></p>
          </div>
        </div>
      </div>
      <a href="<?php echo site_url('myprofile/edit/'.$this->session->userdata('id')) ?>" style="padding: 6px;" class="btn btn-primary">
        Update Profile
      </a> 
    </div>  

  </div>

</div>
