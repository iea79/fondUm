<section class="contacts section" id="contacts">
  <div class="container_center">
    <h2 class="section__title contasts__title"><?php echo SCF::get( 'contacts__title' ); ?></h2>
    <div class="contacts__content">
      <div class="contacts__item"><span class="name-contacts">Получатель:</span><span class="value-contacts"><?php echo SCF::get( 'contacts__fond' ); ?></span></div>
      <div class="contacts__item"><span class="name-contacts">Наименование Банка получателя:</span><span class="value-contacts"><?php echo SCF::get( 'contacts__bank' ); ?></span></div>
      <div class="contacts__item"><span class="name-contacts">ИНН:</span><span class="value-contacts"><?php echo SCF::get( 'contacts__inn' ); ?></span></div>
      <div class="contacts__item"><span class="name-contacts">КПП:</span><span class="value-contacts"><?php echo SCF::get( 'contacts__kpp' ); ?></span></div>
      <div class="contacts__item"><span class="name-contacts">Номер расчетного счета получателя:</span><span class="value-contacts"><?php echo SCF::get( 'contacts__number' ); ?></span></div>
      <div class="contacts__item"><span class="name-contacts">Номер корреспондентского счета:</span><span class="value-contacts"><?php echo SCF::get( 'contacts__corr' ); ?></span></div>
      <div class="contacts__item"><span class="name-contacts">БИК:</span><span class="value-contacts"><?php echo SCF::get( 'contacts__bik' ); ?></span></div>
    </div>
  </div>
</section>
<!-- end contacts-->
<!-- begin contacts-map-->
<section class="contacts-map section" id="contacts-map">
  <div class="contacts-map__content">
    <div class="map-box"><script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7955221e47f2170b08430c9222feb69962641945dedf3970033b4547ce1885ce&amp;width=100%25&amp;height=533&amp;lang=ru_RU&amp;scroll=false"></script></div>
    <div class="container_center container_center-map">
      <div class="contacts-map__left">
        <div class="map__title">контакты</div>
        <div class="map__item"><span class="lite-font">Tелефон: </span><span class="bold-font"><?php echo SCF::get( 'phone_map' ); ?></span></div>
        <div class="map__item"><span class="lite-font">WA: </span><span class="bold-font"><?php echo SCF::get( 'wa_map' ); ?></span></div>
        <div class="map__item"><span class="lite-font">Email: </span><span class="bold-font"><?php echo SCF::get( 'email_map' ); ?></span></div>
        <div class="map__item"><span class="lite-font">Юридический и фактический адрес:     </span><br><span class="bold-font"><?php echo SCF::get( 'address_map' ); ?></span></div>
      </div>
    </div>
  </div>
</section>
<!-- end contacts-map-->
<?php
require get_template_directory() . '/inc/plate.php';
