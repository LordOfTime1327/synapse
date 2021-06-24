<?php
/**
* Template Name: About us

* @package WordPress
* @subpackage Coelix
* @since Coelix 1.0
*/
get_header();
?>

<main class="about-us" style='background: url(<?= get_field( 'about_bg' ); ?>) bottom right no-repeat'>
  <section class="about-us__intro">
    <div class="container">
      <div class="about-us__intro-row">
        <h2 class="about-us__intro-title about-us__intro-title_mob"><?= get_field( 'about_title' ); ?></h2>

        <?php if( get_field( 'about_img' ) ) { ?>
        <div class="about-us__intro-img-box">
          <img src="<?= get_field( 'about_img' ); ?>" alt="">
        </div>
        <?php } ?>

        <div class="about-us__intro-text-box">
          <h1 class="about-us__intro-title about-us__intro-title_desk"><?= get_field( 'about_title' ); ?></h1>
          <div class="about-us__text-box">
            <?= get_field( 'intro_text' ); ?>
          </div>
          <a href="<?= home_url( '/contact-us' ); ?>" class="btn about-us__intro-btn">Learn more</a>
        </div>
      </div>
    </div>
  </section>

  <section class='about-us__goal'>
    <div class='container'>
      <?php if( have_rows('goal_items') ): ?>
      <div class="about-us__goal-box">
        <?php 
          while( have_rows('goal_items') ) : the_row();
          $title = get_sub_field('goal_title');
          $text = get_sub_field('goal_text');
        ?>
        <div class="about-us__goal-item">
          <h2 class='about-us__caption'><?= $title ?></h2>
          <div class="about-us__text-box">
            <p><?= $text; ?></p>
          </div>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <section class="about-us__grow">
    <div class="container">
      <div class="about-us__grow-box">
        <h2 class="about-us__caption about-us__caption_grow"><?= get_field( 'grow_title' ); ?></h2>
        <div class="about-us__text-box about-us__text-box_grow">
          <?= get_field( 'grow_text' ); ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php
get_footer();