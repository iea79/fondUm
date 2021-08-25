<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package frondendie
*/

?>

<footer id="colophon" class="footer">
	<div class="footer-content" style="background-image: url(<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'footer_img' )) ?>)">
		<div class="footer-title"><?php echo SCF::get_option_meta( 'site-settings', 'footer_title' ); ?></div>
		<div class="footer-subtitle"><?php echo SCF::get_option_meta( 'site-settings', 'footer_subtitle' ); ?></div>
		<div class="footer-help__text"><?php echo SCF::get_option_meta( 'site-settings', 'help-text' ); ?></div>
		<div class="footer-action">
			<button class="btn footer-border__button" onclick="popup('.popup-fond')"><?php echo SCF::get_option_meta( 'site-settings', 'footer_btn_text' ); ?></button>
		</div>

	</div><!-- .site-info -->
	<div class="footer-question">
		<div class="question-title"><?php echo SCF::get_option_meta( 'site-settings', 'question_title' ); ?></div>
		<div class="question-button__box">
			<div class="button-item"><a href="tel: <?php echo SCF::get_option_meta( 'site-settings', 'call_button' ); ?>"><span class="btn orange-button call-button"><?php echo SCF::get_option_meta( 'site-settings', 'call_button' ); ?>   </span></a></div>
			<div class="button-item"><a href="mailto: <?php echo SCF::get_option_meta( 'site-settings', 'message_button' ); ?>"><span class="btn orange-button message-button"><?php echo SCF::get_option_meta( 'site-settings', 'message_button' ); ?>    </span></a></div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="footer-bottom__content">
			<div class="footer-logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'footer_logo' )) ?>" alt=""/></a></div>
			<div class="footer-menu">
				<nav class="footer-nav">
					<?php
					wp_nav_menu( [
						'menu'            => 'menu-1',
						'container'       => '',
						'menu_class'      => 'footer-navbar',
						] );

						?>
					</nav><!-- #site-navigation -->

				</div>
			</div>
		</div>

	</footer><!-- #colophon -->

	<!-- Tinkoff -->
	<script src="https://securepay.tinkoff.ru/html/payForm/js/tinkoff_v2.js"></script>
	<div class="popup-active">
		<div class="formBox"><img class="close-popup" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'close_icon' )) ?>" alt=""/>
			<div class="section__title popup__title"><?php echo SCF::get_option_meta('site-settings', 'form_title_tinkoff' ) ?></div>
			<div class="popup__subtitle"><?php echo SCF::get_option_meta('site-settings', 'form_tsubitle_tinkoff' ) ?></div>
			<form class="form form_grid TinkoffPayForm" onsubmit="pay(this); return false;" name="TinkoffPayForm">
				<input class="tinkoffPayRow" type="hidden" name="frame" value="false">
				<input class="tinkoffPayRow" type="hidden" name="terminalkey" value="<?php echo SCF::get_option_meta('site-settings', 'terminalkey' ) ?>">
				<input class="tinkoffPayRow" type="hidden" name="language" value="ru">

				<!-- Для регистрации автоплатежа измените значение атрибута value поля reccurentPayment на true и укажите идентификатор покупателя -->
				<input class="tinkoffPayRow" type="hidden" name="reccurentPayment" value="true">
				<input class="tinkoffPayRow" type="hidden" name="customerKey" value="">

				<!-- Сумма заказа -->
				<input class="tinkoffPayRow" type="hidden" name="amount" value="1000" required>

				<!-- Данные организации -->
				<input type="hidden" name="info" value="<?php echo SCF::get_option_meta('site-settings', 'order_sub_tinkoff' ) ?>">
				<input type="hidden" name="infoTitle" value='<?php echo SCF::get_option_meta('site-settings', 'order_organization_tinkoff' ) ?>'>

				<input type="hidden" name="bank" value='<?php echo SCF::get_option_meta('site-settings', 'order_bank_tinkoff' ) ?>'>
				<input type="hidden" name="inn" value='<?php echo SCF::get_option_meta('site-settings', 'order_inn_tinkoff' ) ?>'>
				<input type="hidden" name="kpp" value='<?php echo SCF::get_option_meta('site-settings', 'order_kpp_tinkoff' ) ?>'>
				<input type="hidden" name="rs" value='<?php echo SCF::get_option_meta('site-settings', 'order_rs_tinkoff' ) ?>'>
				<input type="hidden" name="ks" value='<?php echo SCF::get_option_meta('site-settings', 'order_ks_tinkoff' ) ?>'>
				<input type="hidden" name="bik" value='<?php echo SCF::get_option_meta('site-settings', 'order_bik_tinkoff' ) ?>'>


				<div class="formBox__content">
					<div class="formBox__variant">
						<div class="formBox__variant-btn">
							<input id="r1" type="radio" name="reccurent" value="true" checked="checked"/>
							<label for="r1">ЕЖЕМЕСЯЧНО</label>
						</div>
						<div class="formBox__variant-btn">
							<input id="r2" type="radio" name="reccurent" value="false"/>
							<label for="r2">РАЗОВО</label>
						</div>
					</div>
					<div class="formBox__amount">
						<div class="formBox__subtitle">РАЗМЕР ПОЖЕРТВОВАНИЯ</div>
						<div class="formBox__amount-content">
							<div class="amount__variant-btn">
								<input id="r3" type="radio" name="summ" value="1000" checked="checked"/>
								<label for="r3">1 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r4" type="radio" name="summ" value="2000"/>
								<label for="r4">2 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r5" type="radio" name="summ" value="5000"/>
								<label for="r5">5 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r6" type="radio" name="summ" value="10000"/>
								<label for="r6">10 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r7" type="radio" name="summ" value="50000"/>
								<label for="r7">50 000 ₽</label>
							</div>
							<div class="amount__variant-field">
								<input class="amount__input" type="number" placeholder="ВВЕДИТЕ СВОЮ СУММУ, ₽"/>
							</div>
						</div>
					</div>
					<div class="formBox__payment">
						<div class="formBox__subtitle">способ оплаты</div>
						<div class="formBox__payment-content">
							<div class="payment__variant-btn cart-payment"><img class="cart" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'logo_visa' )) ?>" alt=""/>
								<input id="r8" type="radio" name="paymentType" value="cart" checked="checked"/>
								<label for="r8">Банковская карта</label>
							</div>
							<div class="payment__variant-btn kvit-payment"><img class="kvit" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'logo_bank' )) ?>" alt=""/>
								<input id="r9" type="radio" name="paymentType" value="kvit"/>
								<label for="r9">Банковская платежная квитанция</label>
							</div>
						</div>
					</div>
					<div class="formBox__info">
						<div class="formBox__subtitle">Ваши данные</div>
						<div class="formBox__info-field">
							<input class="tinkoffPayRow" type="text" name="email" placeholder=" " required="required"/>
							<label>E-mail*</label>
						</div>
						<div class="formBox__info-field">
							<input class="tinkoffPayRow" type="text" name="phone" placeholder=" " required="required"/>
							<label>Телефон*</label>
						</div>
						<div class="formBox__info-field">
							<input class="tinkoffPayRow" type="text" name="name" placeholder=" " required="required"/>
							<label>Имя и фамилия*</label>
						</div>
						<div class="formBox__info-field">
							<textarea class="tinkoffPayRow" placeholder="" name="description"></textarea>
							<label>Комментарий</label>
						</div>
					</div>
					<div class="formBox__politic cart_payment_checkbox">
						<label class="popup__checkbox">
							<input type="checkbox" required="required"/>
							<span class="popup__checkbox-part">
								<?php echo SCF::get_option_meta('site-settings', 'offer_text' ); ?>
							</span>
						</label>
					</div>
					<div class="formBox__politic cart_payment_checkbox">
						<label class="popup__checkbox">
							<input type="checkbox" required="required"/>
							<span class="popup__checkbox-part">
								<?php echo SCF::get_option_meta('site-settings', 'policy_text'); ?>
							</span>
						</label>
					</div>
					<div class="formBox__action">
						<button class="btn blue-button" type="submit" id="form__btn">пожертвовать</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- end form-->
	<div class="popup-fond">
		<div class="formBox"><img class="close-popup" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'close_icon' )) ?>" alt=""/>
			<div class="section__title popup__title"><?php echo SCF::get_option_meta('site-settings', 'form_title_sber'); ?></div>
			<div class="popup__subtitle"><?php echo SCF::get_option_meta('site-settings', 'form_subtitle_sber'); ?></div>
			<form class="form form_grid sberPayForm" action="">
				<input type="hidden" name="userName" value="<?php echo SCF::get_option_meta('site-settings', 'userName_sber'); ?>">
				<input type="hidden" name="password" value="<?php echo SCF::get_option_meta('site-settings', 'password_sber'); ?>">
				<input type="hidden" name="returnUrl" value="https://umfond.ru/stranica-spasibo-sber/">
				<input type="hidden" name="failUrl" value="https://umfond.ru/">

				<input type="hidden" name="amount" value="100000">
				<input type="hidden" name="orderNumber" value="">
				<input type="hidden" name="back2app" value="true">
				<input type="hidden" name="recurringFrequency" value="<?php echo SCF::get_option_meta('site-settings', 'recurringFrequency'); ?>">
				<input type="hidden" name="recurringExpiry" value="<?php echo date("Ymd", strtotime("+ ".SCF::get_option_meta('site-settings', 'recurringExpiry')." day")); ?>">

				<input type="hidden" name="infoTitle" value="<?php echo SCF::get_option_meta('site-settings', 'order_organization_sber'); ?>">
				<input type="hidden" name="info" value="<?php echo SCF::get_option_meta('site-settings', 'order_sub_sber'); ?>">

				<input type="hidden" name="bank" value='<?php echo SCF::get_option_meta('site-settings', 'order_bank_sber' ) ?>'>
				<input type="hidden" name="inn" value='<?php echo SCF::get_option_meta('site-settings', 'order_inn_sber' ) ?>'>
				<input type="hidden" name="kpp" value='<?php echo SCF::get_option_meta('site-settings', 'order_kpp_sber' ) ?>'>
				<input type="hidden" name="rs" value='<?php echo SCF::get_option_meta('site-settings', 'order_rs_sber' ) ?>'>
				<input type="hidden" name="ks" value='<?php echo SCF::get_option_meta('site-settings', 'order_ks_sber' ) ?>'>
				<input type="hidden" name="bik" value='<?php echo SCF::get_option_meta('site-settings', 'order_bik_sber' ) ?>'>

				<!-- Return ?orderId=1193c112-4159-71cf-bf98-a8826a62f72b&lang=ru -->
				<!-- Return ?orderId=8cf265e5-0fb9-750f-9d98-2e306a62f72b&lang=ru -->

				<div class="formBox__content">
					<div class="formBox__variant">
						<div class="formBox__variant-btn">
							<input id="r10" type="radio" name="reccurentSber" value="true" checked="checked"/>
							<label for="r10">ЕЖЕМЕСЯЧНО</label>
						</div>
						<div class="formBox__variant-btn">
							<input id="r20" type="radio" name="reccurentSber" value="false"/>
							<label for="r20">РАЗОВО</label>
						</div>
					</div>
					<div class="formBox__amount">
						<div class="formBox__subtitle">РАЗМЕР ПОЖЕРТВОВАНИЯ</div>
						<div class="formBox__amount-content">
							<div class="amount__variant-btn">
								<input id="r30" type="radio" name="summSber" value="100000" checked="checked"/>
								<label for="r30">1 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r40" type="radio" name="summSber" value="200000"/>
								<label for="r40">2 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r50" type="radio" name="summSber" value="500000"/>
								<label for="r50">5 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r60" type="radio" name="summSber" value="1000000"/>
								<label for="r60">10 000 ₽</label>
							</div>
							<div class="amount__variant-btn">
								<input id="r70" type="radio" name="summSber" value="5000000"/>
								<label for="r70">50 000 ₽</label>
							</div>
							<div class="amount__variant-field">
								<input class="amount__input" type="text" placeholder="ВВЕДИТЕ СВОЮ СУММУ, ₽"/>
							</div>
						</div>
					</div>
					<div class="formBox__payment">
						<div class="formBox__subtitle">способ оплаты</div>
						<div class="formBox__payment-content">
							<div class="payment__variant-btn cart-payment"><img class="cart" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'logo_visa' )) ?>" alt=""/>
								<input id="r80" type="radio" name="paymentTypeSber" value="cart" checked="checked"/>
								<label for="r80">Банковская карта</label>
							</div>
							<div class="payment__variant-btn kvit-payment"><img class="kvit" src="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'logo_bank' )) ?>" alt=""/>
								<input id="r90" type="radio" name="paymentTypeSber" value="kvit"/>
								<label for="r90">Банковская платежная квитанция</label>
							</div>
						</div>
					</div>
					<div class="formBox__info">
						<div class="formBox__subtitle">Ваши данные</div>
						<div class="formBox__info-field">
							<input type="email" name="email" placeholder=" " required="required"/>
							<label>E-mail*</label>
						</div>
						<div class="formBox__info-field">
							<input type="tel" name="phone" placeholder=" " required="required"/>
							<label>Телефон*</label>
						</div>
						<div class="formBox__info-field">
							<input type="text" name="name" placeholder=" " required="required"/>
							<label>Имя и фамилия*</label>
						</div>
						<div class="formBox__info-field">
							<textarea name="description" placeholder=" "></textarea>
							<label>Комментарий</label>
						</div>
					</div>
					<div class="formBox__politic cart_payment_checkbox">
						<label class="popup__checkbox">
							<input type="checkbox" required="required"/>
							<span class="popup__checkbox-part">
								<!-- <span class="popup__checkbox-text">Соглашаюсь с </span><a class="popup-link" href="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'dogovor_file' )) ?>" download="" >публичным договором пожертвования с физическим лицом </a> -->
								<?php echo SCF::get_option_meta('site-settings', 'offer_text_sber'); ?>
							</span>
						</label>
					</div>
					<div class="formBox__politic cart_payment_checkbox">
						<label class="popup__checkbox">
							<input type="checkbox" required="required"/>
							<span class="popup__checkbox-part">
								<!-- <span class="popup__checkbox-text">Соглашаюсь на </span><a class="popup-link" href="<?php echo wp_get_attachment_url(SCF::get_option_meta('site-settings', 'agreement_file' )) ?>" download="" > обработку моих персональных данных</a> -->
								<?php echo SCF::get_option_meta('site-settings', 'policy_text_sber'); ?>
							</span>
						</label>
					</div>
					<div class="formBox__action">
						<button class="btn blue-button" type="submit">пожертвовать</button>
					</div>
					<div class="formBox__important">
						<?php echo SCF::get_option_meta('site-settings', 'sber_form_text_important'); ?>
					</div>
			</form>
			</div>
		</div>
	</div>
	<!-- end form-->



	<?php wp_footer(); ?>


</body>
</html>
