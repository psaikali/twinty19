<?php

namespace TwintyNineteen\Walkers;
use TwintyNineteen\Helpers;

class Header_Featured_Items extends \Walker {
	public $db_fields = [
		'parent'    => 'post_parent',
		'name'      => 'post_name',
		'term_name' => 'name',
		'id'        => 'ID',
	];

	/**
	 * At the start of each element, output a <li> and <a> tag structure.
	 * 
	 * Note: Menu objects include url and title properties, so we will use those.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		switch ( $item->type ) {
			case 'post_type':
				$slug = get_post( $item->object_id )->post_name;
				break;

			case 'taxonomy':
				$slug = get_term( $item->object_id, $item->object )->slug;
				break;

			default:
				$slug = $item->post_name;
				break;
		}

		ob_start();
		?>

		<article class="featured-item <?php echo esc_attr( $slug ); ?>">
			<a href="<?php echo esc_url( $item->url ); ?>">
				<h3><?php echo esc_html( $item->title ); ?></h3>
				<?php if ( strlen( $item->description ) > 0 ) { ?>
				<p><?php echo esc_html( $item->description ); ?></p>
				<?php } ?>
			</a>
		</article>

		<?php
		$output .= ob_get_clean();
	}
}
