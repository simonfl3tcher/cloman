<div class="items-list">
  <ul class="items-list badge">
    <?php foreach($list_of_projects as $project){ ?>
    <li class="item g33">  
      <div class="inner">
        <div class="header">
          <a href="/projects/details/<?php echo $project['project_id']; ?>">
            <h2 title="<?php echo $project['name']; ?>"><?php echo $project['name']; ?></h2>
          </a>
          <div class="comment-count badge text-bold">
            <?php echo $project['status_id']; ?>
          </div>
        </div>
        <div class="contentWrapper">
          <div class="content">
            <div class="middle">
                <p>
                  <span class="label text-bold">Project Name:</span>
                  <span class="value">
                  <?php echo $project['project_name']; ?>
                  </span>
                </p>
                <p>
                  <span class="label text-bold">Notes:</span>
                  <span class="value">
                  <?php echo $project['notes']; ?>
                  </span>
                </p>
            </div>
            <div class="bottom">
              <div class="g50"></div>
                <div class="g50 float-right">
                  <div class="field-type-contact">
                    <ul class="contacts">
                    
                      <li title="Adam Howson" class="tooltip">
                          <img src="https://d3szoh0f46td6t.cloudfront.net/public/20491266/small">
                      </li>
                    
                      <li title="Keith Bradley" class="tooltip">
                          <img src="https://d3szoh0f46td6t.cloudfront.net/public/20290031/small">
                      </li>
                    
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="footer">
          <?php $formattedDate = dateDiff(date('m/d/Y h:i:s a', time()), $project['internal_deadline']); ?>
          <div class="date"><span title="<?php echo date('d-M-Y', strtotime($project['internal_deadline'])); ?>" class="timestamp"><?php if(substr($formattedDate, 0, 1) == '-'){ echo substr($formattedDate, 1) . ' days overdue'; } else { echo $formattedDate . ' days left'; } ?></span></div>
          <div class="author">
            <a href="#"><?php echo $project['display_name']; ?></a>
          </div>
        </div>
      </div>
    </li>
<?php } ?>
  </ul>
</div>