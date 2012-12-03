<div class="row-fluid">
  <ul class="thumbnails">
    <?php foreach($team as $t){ ?>
    <li class="span3">
      <div class="thumbnail">
        <?php if(!empty($t['image'])){ ?>
          <img alt="" src="<?php echo site_url('uploads/team/' . $t['image']); ?>" />
        <?php } else { ?>
          <img alt="" src="<?php echo site_url('uploads/team/300x200.gif'); ?>" />
        <?php } ?>
        <div class="caption">
          <h3><?php echo $t['name']; ?></h3>
          <small><?php echo $t['group']; ?></small>
          <br />
          <p><?php echo $t['bio']; ?></p>
          <p><a href="mailto:<?php echo $t['email']; ?>" class="btn btn-primary">Email</a></p>
        </div>
      </div>
    </li>
    <?php } ?>
  </ul>
</div>