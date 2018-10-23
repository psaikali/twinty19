<?php the_post(); ?>
<div class="hentry">
	<?php if ( is_singular() && ! is_front_page() && twintynineteen_can_show_post_thumbnail() ) : ?>
		<div class="entry-header">
			<?php if ( ! is_page() ) : ?>
			<?php $discussion = twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null; ?>
			<?php endif; ?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( ! is_page() ) : ?>
			<div class="<?php echo ( ! empty( $discussion ) && count( $discussion->authors ) > 0 ) ? 'entry-meta has-discussion' : 'entry-meta'; ?>">
				<?php twentynineteen_posted_by(); ?>
				<?php twentynineteen_posted_on(); ?>
				<span class="comment-count">
					<?php if ( ! empty( $discussion ) ) twentynineteen_discussion_avatars_list( $discussion->authors ); ?>
					<?php twentynineteen_comment_count(); ?>
				</span>
				<?php // Edit post link.
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers. */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						),
						'<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ) ,
						'</span>'
					); ?>
			</div><!-- .meta-info -->
			<?php endif; ?>
		</div><!-- .entry-header -->
	<?php else : ?>
	<div class="entry-header">
		<?php do_action( 'twinty_header_alternative_content', $post ); ?>
	</div>
	<?php endif; ?>
</div>
<?php rewind_posts(); ?>