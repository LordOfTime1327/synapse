<?php
/**
* Template Name: Blog

* @package WordPress
* @subpackage Coelix
* @since Coelix 1.0
*/
get_header();
?>

<main class="blog-page">
  <section class="blog">
    <div class="container container_slim">
      <h1 class="blog__page-title">Blog</h1>

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

        <a href='<?= get_category_link( $num ); ?>' class='blog__cat'><?= $cat->name; ?></a>
        <?php
          endforeach;
        ?>
      </div>

      <?php 
          $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        
          $query = new WP_Query( [ 
            'post_status' => array( 'publish' ),
            'posts_per_page' => '4',
            'paged' => $paged     ,
            'orderby' => 'date',
            'order'   => 'DESC',
            
          ] );
          if( $query -> have_posts() ):
            while ( $query -> have_posts() ):
              $query -> the_post();
        ?>

      <?php get_template_part( 'template-parts/content', get_post_type() ); ?>

      <?php 
            endwhile;
            wp_reset_postdata();
          endif;
        ?>

      <nav class="pagination">
        <?php 
          $big = 999999999; // уникальное число

          echo paginate_links( array(
            'end_size' => 1,
            'mid_size' => 1,
            'prev_next' => false,
            'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'current' => max( 1, get_query_var('paged') ),
            'total'   => $query->max_num_pages
          ) );

          wp_reset_postdata();
        ?>
      </nav>

    </div>
  </section>
</main>

<?php
get_footer();