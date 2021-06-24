<?php
/**
* Template Name: Homepage
*
* @package WordPress
* @subpackage Coelix
* @since Coelix 1.0
*/
get_header();
?>

<main id='fullpage' class="homepage">

  <div id="intro-particles">
    <section id='intro' class='intro'>
      <div class="container">
        <div class="intro__row">
          <div class="intro__text-box">
            <?php if(get_field( 'intro_title' ) ) { ?>
            <h1 class="intro__title"><?= get_field( 'intro_title' ); ?></h1>
            <?php } ?>
            <a href="<?= get_field( 'intro_link' ) ?>" class="btn intro__link intro__link_desk">
              <?php ( get_field( 'intro_btn' ) ) ? the_field( 'intro_btn' ) : 'Learn More'; ?>
            </a>
          </div>
          <div class="intro__img-box">
            <?= file_get_contents( get_attached_file( get_field( 'intro_img' ) ) ); ?>
          </div>
          <a href="<?= get_field( 'intro_link' ) ?>" class="btn intro__link intro__link_mob">
            <?php ( get_field( 'intro_btn' ) ) ? the_field( 'intro_btn' ) : 'Learn More'; ?>
          </a>
        </div>
      </div>
    </section>
  </div>

  <section id="home-services" class='home-services'>
    <div class="container">

      <h2 class="home-services__section-title"><?= get_field( 'services_section_title' ); ?></h2>

      <div class="swiper-container home-services__slider">
        <div class="swiper-wrapper">

          <div class="swiper-slide home-services__slide">
            <div class="home-services__text-box">
              <h2 class='home-services__title'><?= get_field( 'services_title' ); ?></h2>
              <p class="home-services__subtitle"><?= get_field( 'services_subtitle' ); ?></p>
              <a href='<?= get_field( 'services_link' ); ?>' class='btn2 home-services__link'>Learn more</a>
            </div>
            <div class="home-services__img-box">
              <img src="<?= get_field( 'services_img' ); ?>" alt="" class='home-services__img'>
            </div>
          </div>

          <?php 
            $query = new WP_Query( [ 
              'post_type' => 'services', 
              'post_status' => array( 'publish' ),
              'posts_per_page' => -1,
              'order'   => 'ASC'
            ] );
            if( $query -> have_posts() ):
              while ( $query -> have_posts() ):
                $query -> the_post();
          ?>

          <div class="swiper-slide home-services__slide">
            <div class="home-services__text-box">
              <h2 class='home-services__title'><?= get_the_title(); ?></h2>
              <p class="home-services__subtitle"><?= get_the_excerpt(); ?></p>
              <a href="<?= get_permalink(); ?>" class='btn2 home-services__link'>Learn more</a>
            </div>
            <div class="home-services__img-box">
              <?php echo get_the_post_thumbnail(); ?>
            </div>
          </div>

          <?php 
              endwhile;
              wp_reset_postdata();
            endif;
          ?>

        </div>
      </div>
      <div class="home-services__nav">
        <div class="home-services__arrow-box">
          <div class="swiper-button-prev home-services__arrow home-services__arrow_prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="62" viewBox="0 0 32 62" fill="none">
              <path d="M31 1L1 31L31 61" stroke="#FCFCFC" />
            </svg>
          </div>
          <div class="swiper-button-next home-services__arrow home-services__arrow_next">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="62" viewBox="0 0 32 62" fill="none">
              <path d="M1 1L31 31L1 61" stroke="#FCFCFC" />
            </svg>
          </div>
        </div>

        <div class="swiper-pagination home-services__pagination"></div>
      </div>

    </div>
  </section>

  <section class="advantages">
    <div class="container">
      <h2 class="advantages__section-title">
        <?= get_field( 'adv_section_title' ); ?>
      </h2>
      <div class="advantages__intro-text-box">
        <p class="advantages__intro-text"><?= get_field( 'adv_text1' ); ?></p>
        <p class="advantages__intro-text"><?= get_field( 'adv_text2' ); ?></p>
      </div>
      <?php 
          if( have_rows('adv_items') ): ?>
      <div class="advantages__box">
        <?php 
                while( have_rows('adv_items') ) : the_row();
                $img = get_sub_field('adv_image');
                $title = get_sub_field('adv_title');
                $text = get_sub_field('adv_text');
              ?>
        <div class="advantages__item">
          <div class="advantages__img-box">
            <img src="<?= $img ?>" alt="" class="advantages__img">
          </div>
          <div class="advantages__text-box">
            <h3 class="advantages__title"><?= $title ?></h3>
            <p class="advantages__text"><?= $text ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif;?>
    </div>
  </section>

  <section class="clients">
    <div class="container">
      <div class="clients__title-box">
        <h2 class="clients__title"><?= get_field( 'clients_title' ); ?></h2>
      </div>
      <div class="swiper-container clients__slider">
        <div class="swiper-wrapper clients__wrapper">
          <?php 
            if( have_rows('clients_slider') ):
              while( have_rows('clients_slider') ) : the_row();
            $img = get_sub_field('clients_img');
          ?>
          <div class="swiper-slide clients__slide">
            <div class="clients__img-box">
              <img src="<?= $img ?>" alt="" class="clients__img">
            </div>
          </div>
          <?php
            endwhile;
            endif;
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="home-contact-us">
    <div class="container">
      <div class="home-contact-us__row">
        <div class="home-contact-us__text-box">
          <h2 class="home-contact-us__title"><?= get_field( 'contact_title' ); ?></h2>
          <h3 class="home-contact-us__subtitle"><?= get_field( 'contact_subtitle' ); ?></h3>
          <p class="home-contact-us__text"><?= get_field( 'contact_text' ); ?></p>
        </div>

        <?php get_template_part( 'templates/form' ); ?>
      </div>
    </div>
  </section>

</main>


<?php
  get_footer();
?>