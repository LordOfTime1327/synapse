<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package coelix
 */

get_header();
?>

<main class='blog'>
  <section class="single-page single-page_blog">
    <div class="container container_slim">
      <h1 class=" single-page__title"><?= get_the_title(); ?></h1>
      <div class="single-page__data">
        <div class="single-page__date-box">
          <?= file_get_contents( get_attached_file( get_field( 'date_icon', 'option' ) ) ); ?>
          <p class="single-page__date"><?= get_the_date(); ?></p>
        </div>
        <div class="single-page__date-tags">
          <?php 
					$category = get_the_category();
					foreach ($category as $cat) :
				?>
          <a href="<?= get_category_link( $cat->term_id ); ?>" class='single-page__category'><?= $cat->name; ?></a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="single-page__img-box single-page__img-box_full">
        <?= get_the_post_thumbnail(); ?>
      </div>

      <div class="single-page__content">
        <?= get_the_content(); ?>
      </div>

      <div class="single-page__nav">
        <?php previous_post_link( '%link', 'Previous' ); ?>
        <?php next_post_link( '%link', 'Next' ); ?>
      </div>
    </div>
  </section>

  <section class="similar-posts">
    <div class="container container_slim">
      <h1 class="similar-posts__title"><?= get_field( 'similar_posts_title', 'option' ); ?></h1>
      <?php 
      $query = new WP_Query( [ 
        'post_status' => array( 'publish' ),
        'posts_per_page' => '2',
      ] );
      if( $query -> have_posts() ):
        while ( $query -> have_posts() ):
          $query -> the_post();

        get_template_part( 'template-parts/content', get_post_type() ); 

        endwhile;
        wp_reset_postdata();
      endif;
    ?>
    </div>
  </section>


</main>

<?php
get_footer();