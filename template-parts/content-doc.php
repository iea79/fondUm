<!-- begin documents-->
<section class="documents section" id="documents">
  <div class="container_center">
      <div class="documents__top">
          <img class="top__img" src="<?php echo wp_get_attachment_url(SCF::get( 'documents__top' )) ?>" alt="">
          <h2 class="section__title documents__title"><?php echo SCF::get( 'doc_title' ); ?></h2>
      </div>

    <div class="documents__content">
        <?php
            $doc__content = SCF::get('doc__content');

            foreach ($doc__content as $item) {
                echo '<div class="documents__item">
                        <div class="documents-item__content"><img src="'.wp_get_attachment_url( $item [ 'doc_format' ]) .'" alt=""/><a href="'.wp_get_attachment_url( $item [ 'doc_file' ]) .'" download="">'.$item['doc_name'].'</a></div>
                      </div>';
            };
        ?>
      </div>
    </div>
  </div>
</section>
<!-- end documents-->
<!-- begin reporting-->
<section class="reporting section" id="reporting">
    <?php $doc__content = SCF::get('report__content'); ?>
    <div class="container_center">
        <div class="reporting__top">
            <h2 class="section__title reporting__title"><?php echo SCF::get( 'report_title' ); ?></h2>
            <?php
            $years = [];
            foreach ($doc__content as $key => $val) {
                $years[$key] = $val['report_year'];
            }
            $years = array_unique($years);
            ?>
            <div class="reporting__drop">
                <div class="reporting-drop__name"><?php echo $years[0] ?></div>
                <div class="reporting-drop__list">
                    <?php
                    foreach ($years as $year) {
                        ?>
                        <div class="reporting-drop__item" data-year-toggle="<?php echo $year ?>"><?php echo $year ?></div>
                        <?php
                    };
                    ?>
                </div>
            </div>
        </div>
        <div class="reporting__content">
            <?php
            foreach ($doc__content as $item) {
                $hidden = 'hidden';
                if ($years[0] == $item['report_year']) {
                    $hidden = '';
                }
                echo '<div class="reporting__item '.$hidden.'" data-year="'.$item['report_year'].'">
                <div class="reporting-item__content"><img src="'.wp_get_attachment_url( $item [ 'report_format' ]) .'" alt=""/><a href="'.wp_get_attachment_url( $item [ 'report_file' ]) .'" download="">'.$item['report_doc'].'</a></div>
                </div>';
            };
            ?>

        </div>
    </div>
</section>
<!-- end reporting-->
<?php
require get_template_directory() . '/inc/plate.php';
