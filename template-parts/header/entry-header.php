<?php if ( ! is_page() ) : ?>
<?php $discussion = twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null; ?>
<div class="<?php echo ( ! empty( $discussion ) && count( $discussion->authors ) > 0 ) ? 'entry-meta has-discussion' : 'entry-meta'; ?>">
	<?php twentynineteen_posted_by(); ?>
	<?php twentynineteen_estimated_read_time(); ?>
	<span class="comment-count">
		<?php if ( ! empty( $discussion ) ) twentynineteen_discussion_avatars_list( $discussion->authors ); ?>
		<?php twentynineteen_comment_count(); ?>
	</span>
</div><!-- .meta-info -->
<?php endif; ?>