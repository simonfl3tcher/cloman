<div class="items-list">
  <ul class="items-list badge">
    <?php foreach($list_of_support_packs as $packs){ ?>
    <li class="item g33">  
      <div class="inner">
        <div class="header">
          <a href="/packs/details/<?php echo $packs['project_id']; ?>">
            <h2 title="<?php echo $packs['name']; ?>"><?php echo $packs['name']; ?></h2>
          </a>
          <div class="comment-count badge text-bold">
            <?php echo $packs['status_id']; ?>
          </div>
        </div>
        <div class="contentWrapper">
          <div class="content">
            <div class="middle">
                <p>
                  <span class="label text-bold">Project Name:</span>
                  <span class="value">
                  <?php echo $packs['project_name']; ?>
                  </span>
                </p>
                <p>
                  <span class="label text-bold">Notes:</span>
                  <span class="value">
                  <?php echo $packs['notes']; ?>
                  </span>
                </p>
            </div>
            <div class="bottom">
              <div class="g50"></div>
                <div class="g50 float-right">
                  <div class="field-type-contact">
                    <ul class="contacts">
                    
                      <li title="Adam Howson" class="tooltip">
                          <img />
                      </li>
                    
                      <li title="Keith Bradley" class="tooltip">
                          <img />
                      </li>
                    
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="footer">
          <?php $formattedDate = dateDiff(date('m/d/Y h:i:s a', time()), $packs['internal_deadline']); ?>
          <div class="date"><span title="<?php echo date('d-M-Y', strtotime($packs['internal_deadline'])); ?>" class="timestamp"><?php if(substr($formattedDate, 0, 1) == '-'){ echo substr($formattedDate, 1) . ' days overdue'; } else { echo $formattedDate . ' days left'; } ?></span></div>
          <div class="author">
            <a href="#"><?php echo $packs['display_name']; ?></a>
          </div>
        </div>
      </div>
    </li>
<?php } ?>
  </ul>
</div>