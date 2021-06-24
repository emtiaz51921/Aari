<?php
/*
 * This file is usd for building search form of header
 */

if ( ! function_exists( 'aari_search_form' ) ) :

	function aari_search_form() {
		?>
		<div class="search-wrap">
			<div class="search-inner">
				<div class="search-cell">
					<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<div class="search-field-holder">
							<input type="search" class="search-field form-control main-search-input"  placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'aari' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s"/>
						</div>
					</form>
				</div>
				<span class="icon-close jam jam-close open" id="search-close"></span>
			</div>

		</div>

		<?php
	}

endif;
