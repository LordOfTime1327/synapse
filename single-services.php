<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package coelix
 */

get_header();
?>

<main class='single-services-page'>
  <section class="single-page">
    <div class="container container_slim">

      <h1 class="single-page__title single-page__title_services"><?= get_the_title(); ?></h1>
      <div class="single-page__img-box single-page__img-box_services"><?= get_the_post_thumbnail(); ?></div>
      <div class="single-page__content"><?php the_content(); ?></div>

      <article id='offer' class='offer'>
        <div class="offer__content-box">
          <p class="offer__text"><?= get_field( 'offer_text', 'option' ); ?></p>
          <a href="<?= home_url( '/contact-us' ); ?>"
            class="btn offer__btn"><?= get_field( 'offer_btn', 'option' ); ?></a>
        </div>

        <img src="<?= get_field( 'offer_bg', 'option' ); ?>" alt="" class='offer__bg'>
      </article>

    </div>
  </section>
</main>

<?php
get_footer();