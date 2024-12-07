<?php get_header(); ?>

<div class="container">
    <h1><?php esc_html_e( 'Page Not Found', 'tikswipe' ); ?></h1>
    <p><?php esc_html_e( 'Sorry, the page you are looking for does not exist. You can go back to the homepage or use the search form below.', 'tikswipe' ); ?></p>
    <?php get_search_form(); ?>
</div>

<?php get_footer(); ?>