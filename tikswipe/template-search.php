<?php
/*
 * Template Name: Search
 */
defined( 'ABSPATH' ) || exit;
get_header();
$paged             = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$vids_args         = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'posts_per_page' => 12,
	'tax_query'      => array(
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => array(
				'post-format-video',
			),
			'operator' => 'IN',
		),
	),
	'paged'          => $paged,
);
$vids_search_query = new WP_Query( $vids_args );
$vids_count        = $vids_search_query->found_posts;
set_query_var( 'vids_count', $vids_count );

$pics_args         = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'posts_per_page' => 12,
	'tax_query'      => array(
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => array(
				'post-format-image',
			),
			'operator' => 'IN',
		),
	),
	'paged'          => $paged,
);
$pics_search_query = new WP_Query( $pics_args );
$pics_count        = $pics_search_query->found_posts;
set_query_var( 'pics_count', $pics_count );

$creators_query = new WP_User_Query(
	array(
		'role'                => 'author',
		'number'              => 12,
		'exclude'             => array( 1 ),
		'has_published_posts' => array( 'post' ),
	)
);
?>
<main>
	<div class="search-header">
		<?php if ( ! empty( $creators_query->results ) && get_theme_mod( 'wpst_enable_creators', '' ) === true ) : ?>
			<div class="search-pills">
				<a class="button button-outline-grey active" href="#!"><?php esc_html_e( 'Media', 'wpst' ); ?></a>
				<a class="button button-outline-grey" href="<?php echo esc_url( wpst_get_page_url( 'creators' ) ); ?>"><?php esc_html_e( 'Creators', 'wpst' ); ?></a>
			</div>
		<?php endif; ?>
		<?php get_search_form(); ?>
	</div>

	<?php eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'template_search_eval_1' ) ); ?>

	<div class="content-wrapper">
		<div id="tab-vids" class="tab-content active">			
			<?php if ( $vids_search_query->have_posts() ) : ?>
				<?php eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'template_search_eval_2' ) ); ?>
			<?php elseif ( ! $vids_search_query->have_posts() && ! empty( $search_query ) ) : ?>
				No video found.
			<?php else : ?>
				<?php eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'template_search_eval_3' ) ); ?>
			<?php endif; ?>
		</div>
		<div id="tab-pics" class="tab-content">
			<?php if ( $pics_search_query->have_posts() ) : ?>
				<?php eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'template_search_eval_4' ) ); ?>
			<?php elseif ( ! $pics_search_query->have_posts() && ! empty( $search_query ) ) : ?>
				No picture found.
			<?php else : ?>
				<?php eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'template_search_eval_5' ) ); ?>
			<?php endif; ?>
		</div>		
	</div>
</main>

<?php
get_footer();
