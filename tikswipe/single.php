<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
get_header(); ?>

<?php if ( have_posts() ) : ?>	
	<main>
		<div class="swiper">
			<div class="swiper-wrapper">
				<?php eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'single_eval_1' ) ); ?>
				<?php
					$paged                    = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$ads_displaying_frequency = get_theme_mod( 'wpst_ads_displaying_frequency', 5 );
					$args                     = array(
						'post_type'      => 'post',
						'post_status'    => 'publish',
						'author'         => $post->post_author,
						'posts_per_page' => $ads_displaying_frequency,
						'orderby'        => 'date',
						'order'          => 'DESC',
						'post__not_in'   => array( $post->ID ),
						'tax_query'      => array(
							array(
								'taxonomy' => 'post_format',
								'field'    => 'slug',
								'terms'    => array(
									'post-format-' . get_post_format( $post->ID ),
								),
								'operator' => 'IN',
							),
						),
						'paged'          => $paged,
					);
					$wp_query                 = new WP_Query( $args );
					if ( $wp_query->have_posts() ) :
						?>
						<?php
						while ( $wp_query->have_posts() ) :
							$wp_query->the_post();
							eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'single_eval_1' ) );
							?>
													<?php endwhile; ?>
						<?php
					endif;
					wp_reset_postdata();
					eval( WPSCORE()->eval_product_data( WPSCORE()->get_installed_theme( 'sku' ), 'single_eval_2' ) );
					?>
			</div>
			<!-- If we need navigation buttons -->
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	</main>
<?php endif; ?>

<?php
	get_footer();