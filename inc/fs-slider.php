
<!-- begin firstScreen-->
<section class="firstScreen section" id="firstScreen">
  <div class="firstScreen-slider">

      <?php
          $fs__slider = SCF::get_option_meta('main-slider', 'fs__slider');

          foreach ($fs__slider as $item) {
              echo '
                  <div class="firstScreen-slider__item">
                      '.wp_get_attachment_image( $item [ 'fs__bcg' ], 'full' ) .'
                  </div>
              ';
          };
      ?>

  </div>
  <div class="firstScreen__Box">
    <div class="firstScreen__content">

        <?php
            $fs__plate = SCF::get_option_meta('main-slider', 'fs__plate');

            foreach ($fs__plate as $item) {
                echo '
                     <div class="firstScreen__plate">
                         '.$item['firstscreen__plate'].'
                     </div>
                     ';
            };
        ?>

    </div>
  </div>
  <div class="firstScreen-counter">
    <div class="counter__content">
      <div class="counter-text"><?php echo SCF::get_option_meta('site-settings', 'counter_text' ); ?></div>
      <div class="counter-numbers"><?php echo SCF::get_option_meta('site-settings', 'counter-number' ); ?>  ₽ </div>
    </div>
  </div>
</section>
<!-- end firstScreen-->
