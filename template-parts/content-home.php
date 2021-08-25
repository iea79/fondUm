  <!-- begin school-->
  <section class="school section" id="school">
    <div class="container_center">
      <h2 class="section__title"><?php echo SCF::get( 'school-title' ); ?></h2>
      <div class="school__content">
          <div class="school__top">

          <div class="shadow-plate">

            <div class="plate-icon">
                <img class="blue__icon" src="<?php echo wp_get_attachment_url(SCF::get( 'blue_icon-left' )) ?>" alt=""/>
                <img class="white__icon" src="<?php echo wp_get_attachment_url(SCF::get( 'white_icon-left' )) ?>" alt=""/>
            </div>

            <div class="plate-title"><?php echo SCF::get( 'home-plate-left' ); ?></div>
            <div class="plate-action">
              <button class="btn blue-button" onclick="popup('.popup-active')"><?php echo SCF::get( 'home-plate-left-button' ); ?></button>
            </div>
          </div>


          <div class="shadow-plate">
            <div class="plate-icon">
                <img class="blue__icon" src="<?php echo wp_get_attachment_url(SCF::get( 'blue_icon-right' )) ?>" alt=""/>
                <img class="white__icon" src="<?php echo wp_get_attachment_url(SCF::get( 'white_icon-right' )) ?>" alt=""/>
            </div>
            <div class="plate-title"><?php echo SCF::get( 'home-plate-right' ); ?></div>
            <div class="plate-action">
              <button class="btn blue-button" onclick="popup('.popup-fond')"><?php echo SCF::get( 'home-plate-right-button' ); ?></button>
            </div>
          </div>
        </div>

        <div class="school__bottom">
            <?php
            $school__item = SCF::get('school__item');

            foreach ($school__item as $item) {
                echo '
                <div class="school__item">

                <div class="bottom-title">
                '.$item['bottom-title'].'</div>
                <div class="bottom-desc">
                '.$item['bottom-desc'].'</p>
                </div>
                </div>

                ';
            };
            ?>


        </div>
      </div>
    </div>
  </section>
  <!-- end school-->
