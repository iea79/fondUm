<!-- begin endowment-->
<section class="endowment section" id="endowment">
  <div class="container_center">
    <div class="endowment__content">
      <div class="endowment__top">
        <div class="quote-content"><?php echo SCF::get( 'quote-content' ); ?></div>
      </div>
      <div class="endowment__center">
        <div class="center-content">
          <div class="year"><?php echo SCF::get( 'year-bcg' ); ?></div>
          <div class="year-desc"><?php echo SCF::get( 'year_desc' ); ?></div>
        </div>
      </div>
      <div class="endowment__bottom">
        <div class="section__title endowment__title"><?php echo SCF::get( 'endowment__title' ); ?> </div>
        <div class="bottom__list">
              <?php
                  $bottom__list = SCF::get('bottom__list');

                  foreach ($bottom__list as $item) {
                      echo '<ul class="endowment__item">
                      <li class="endowment__list"> '.$item['endowment__list'].' </li>
                      </ul>';
                  };
              ?>

        </div>
        <p><?php echo SCF::get( 'endowment_desc' ); ?></p>
      </div>
    </div>
  </div>
</section>
<!-- end endowment-->
<?php
require get_template_directory() . '/inc/plate.php';
