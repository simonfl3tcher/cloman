<div class="items-list">
  <ul class="items-list badge">
    <?php foreach($list_of_support_packs as $packs){ ?>
    <li class="item g33">  
      <div class="inner">
        <div class="header">
          <a href="<?php echo site_url(); ?>/support_packs/details/<?php echo $packs['support_packs_id']; ?>">
            <h2 title="<?php echo $packs['name']; ?>"><?php echo $packs['name']; ?></h2>
          </a>
        </div>
        <div class="contentWrapper">
          <div class="content">
            <div class="middle">
                <p>
                  <span class="label text-bold">Description:</span>
                  <span class="value">
                  <?php echo $packs['description']; ?>
                  </span>
                </p>
                <p>
                  <span class="label text-bold">Includes:</span>
                  <span class="value">
                  <?php echo $packs['includes']; ?>
                  </span>
                </p>
                <p>
                  <span class="label text-bold">Price:</span>
                  <span class="value">
                  <?php echo '&pound;' .  $packs['price']; ?>
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
          <div class="date">Free studio time:- <?php echo secondsToTime($packs['time_allowed_pm']); ?></div>
        </div>
      </div>
    </li>
<?php } ?>
  </ul>
</div>