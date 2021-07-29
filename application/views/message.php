<?php if ($this->session->has_userdata('danger')) { ?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="icon fas fa-ban"></i>
  <?= $this->session->flashdata('danger');?>    
</div>
<?php } ?>

<?php if ($this->session->has_userdata('success')) { ?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="icon fas fa-check"></i>
  <?= $this->session->flashdata('success');?>    
</div>
<?php } ?>

<?php if ($this->session->has_userdata('warning')) { ?>
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="icon fas fa-exclamation-triangle"></i>
  <?= $this->session->flashdata('warning');?>    
</div>
<?php } ?>

<?php if ($this->session->has_userdata('info')) { ?>
<div class="alert alert-info alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <i class="icon fas fa-info"></i>
  <?= $this->session->flashdata('info');?>    
</div>
<?php } ?>