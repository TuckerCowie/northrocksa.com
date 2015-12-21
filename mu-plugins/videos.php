<?php
/*
 * Plugin Name: Northrock Videos
 * Description: Custom Post Type that allows the organization of a video gallery
 * Author: Tucker Cowie
 * Text Domain: northrock-videos
 */

function videos_init() {
	register_post_type( 'videos', array(
		'labels'            => array(
			'name'                => __( 'Videos', 'northrock-videos' ),
			'singular_name'       => __( 'Video', 'northrock-videos' ),
			'all_items'           => __( 'All Videos', 'northrock-videos' ),
			'new_item'            => __( 'New Video', 'northrock-videos' ),
			'add_new'             => __( 'Add New', 'northrock-videos' ),
			'add_new_item'        => __( 'Add New Video', 'northrock-videos' ),
			'edit_item'           => __( 'Edit Video', 'northrock-videos' ),
			'view_item'           => __( 'View Video', 'northrock-videos' ),
			'search_items'        => __( 'Search Videos', 'northrock-videos' ),
			'not_found'           => __( 'No Videos found', 'northrock-videos' ),
			'not_found_in_trash'  => __( 'No Videos found in trash', 'northrock-videos' ),
			'parent_item_colon'   => __( 'Parent Video', 'northrock-videos' ),
			'menu_name'           => __( 'Videos', 'northrock-videos' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'thumbnail' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-editor-video',
	) );

}
add_action( 'init', 'videos_init' );

function video_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['videos'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('video updated. <a target="_blank" href="%s">View video</a>', 'northrock-videos'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'northrock-videos'),
		3 => __('Custom field deleted.', 'northrock-videos'),
		4 => __('Video updated.', 'northrock-videos'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('video restored to revision from %s', 'northrock-videos'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Video published. <a href="%s">View video</a>', 'northrock-videos'), esc_url( $permalink ) ),
		7 => __('Video saved.', 'northrock-videos'),
		8 => sprintf( __('Video submitted. <a target="_blank" href="%s">Preview videos</a>', 'northrock-videos'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Video scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview video</a>', 'northrock-videos'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Video draft updated. <a target="_blank" href="%s">Preview video</a>', 'northrock-videos'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'video_updated_messages' );
