<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coelix
 */

get_header();
?>

<main id="primary" class="blog-page">

  <div class="container container_slim">

    <h1 class="blog__page-title">Blog</h1>

    <?php if ( have_posts() ) : ?>

    <div class="blog__cats-box">
      <?php 
				$cats = get_categories([
					'type' => 'post',
					'hierarchical' => 0,
					'hide_empty' => 1,
				]);
				foreach ($cats as $cat) :
					$num = $cat->term_id;
			?>

      <?php 
			$category = get_queried_object();
			$id = $category->term_id; 
			?>

      <a href='<?= get_category_link( $num ); ?>' class='blog__cat <?= ( $id == $num ) ? 'current' : ''; ?>'>
        <?= $cat->name; ?></a>
      <?php
      	endforeach;
      ?>

    </div>

    <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_pagination([
				'end_size' => 1,
				'mid_size' => 2,
				'prev_next' => false, 
				'screen_reader_text' => ' ',
			]);

		endif;
		?>

  </div>

</main>

<?php
get_footer();