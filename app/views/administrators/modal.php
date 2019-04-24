
<!-- The Modal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Delete <?php echo $type;?></h2>
    </div>
    <div class="modal-body">
      <p>Are you sure you wish to delete the selected <?php echo $type;?>?</p>
      <p>All data will be erased and there will be no way to retrieve those.</p>
      <p>Click Delete to confirm.</p>
      <br>
      <p style = "text-align: center;">
        <?php if($link!=false){?>
        <a href="<?php echo $link;?>">
          <button class="btn btn-delete">Delete</button>
        </a>
      <?php }
      else { ?>
        <b style="color: red;">*You cannot delete this record. Make sure no other record depends on it.</b>
      <?php } ?>
      </p>
    </div>
  </div>
</div>
<script>modal();</script>
