<?php
/**
 * The template for displaying archive services pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coelix
 */

get_header();
?>

<main id="primary" class="site-main services-page">

  <section class="services">
    <div class="container">

      <h1 class="services__page-title"><?= get_field( 'services_title', 'option' ); ?></h1>

      <div class="services__row">
        <?php 
        $query = new WP_Query( [ 
          'post_type' => 'services', 
          'post_status' => array( 'publish' ),
          'posts_per_page' => '8',
          'paged' => $paged        
        ] );
        if( $query -> have_posts() ):
          while ( $query -> have_posts() ):
            $query -> the_post();
        ?>

        <div class="services__card">
          <div class="services__text-box">
            <h3 class="services__title"><?= get_the_title(); ?></h3>
            <p class="services__text"><?= get_the_excerpt(); ?></p>
            <a href="<?= get_the_permalink() ?>" class="btn2 services__btn">Learn more</a>
          </div>
          <div class="services__img-box">
            <?= get_the_post_thumbnail(); ?>
          </div>
        </div>

        <?php 
      endwhile;
      wp_reset_postdata();
    endif;
  ?>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();