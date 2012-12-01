<div class="row-fluid">
  <ul class="thumbnails">
    <?php foreach($documents as $doc){ ?>
    <li class="span3">
      <div class="thumbnail">
        <img alt="" src="<?php echo site_url('uploads/documents/images/' . $doc['image']); ?>" />
        <div class="caption">
          <h3><?php echo $doc['title']; ?></h3>
          <p><?php echo $doc['description']; ?></p>
          <p><a class="btn btn-primary" href="<?php echo site_url('client/documents/download/' . $doc['file_name']); ?>">Action</a></p>
        </div>
      </div>
    </li>
    <?php } ?>
  </ul>
</div>