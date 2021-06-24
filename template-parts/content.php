<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package coelix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog__card' ); ?>>
  <div class="blog__img-box">
    <?= get_the_post_thumbnail(); ?>
  </div>
  <div class="blog__text-box">
    <div class="blog__data">
      <div class="blog__date-box">
        <?= file_get_contents( get_attached_file( get_field( 'date_icon', 'option' ) ) ); ?>
        <p class="blog__date"><?= get_the_date(); ?></p>
      </div>
      <div class="blog__date-tags">
        <?php 
					$category = get_the_category();
					foreach ($category as $cat) :
				?>
        <a href="<?= get_category_link( $cat->term_id ); ?>" class='blog__category'><?= $cat->name; ?></a>
        <?php endforeach; ?>
      </div>
    </div>

    <h3 class="blog__title" style="-webkit-box-orient: vertical; -moz-box-orient: vertical; box-orient: vertical;">
      <?= get_the_title(); ?></h3>

    <div class="blog__content"><?php the_excerpt(); ?></div>

    <a href="<?= get_the_permalink() ?>" class="btn blog__btn">Read more</a>
  </div>
</article>