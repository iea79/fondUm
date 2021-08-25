<!-- begin endowment-plate-->
<section class="endowment-plate section" id="endowment-plate">
  <div class="container_center">
    <div class="endowment-plate__content">
      <div class="endowment-plate__left">
        <h2 class="section__title endowment__title"><?php echo SCF::get_option_meta( 'site-settings', 'title-box' ); ?></h2>
      </div>
      <div class="shadow-plate min-plate">

        <div class="plate-icon">
                <img class="blue__icon" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'plate_img_blue_left' )) ?>" alt=""/>
                <img class="white__icon" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'plate_img_white_left' )) ?>" alt=""/>
        </div>

        <div class="plate-title"><?php echo SCF::get_option_meta( 'site-settings', 'left-plate' ); ?></div>
        <div class="plate-action">
          <button class="btn blue-button" onclick="popup('.popup-active')"><?php echo SCF::get_option_meta( 'site-settings', 'left_button' ); ?></button>
        </div>
      </div>
      <div class="shadow-plate min-plate">

        <div class="plate-icon">
            <img class="blue__icon" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'plate_img_blue_right' )) ?>" alt=""/>
            <img class="white__icon" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'plate_img_white_right' )) ?>" alt=""/>
        </div>

        <div class="plate-title"><?php echo SCF::get_option_meta( 'site-settings', 'right_plate' ); ?></div>
        <div class="plate-action">
          <button class="btn blue-button" onclick="popup('.popup-fond')"><?php echo SCF::get_option_meta('site-settings', 'right_button' ); ?></button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end endowment-plate-->
