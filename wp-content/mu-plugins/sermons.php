<?php
/*
 * Plugin Name: Northrock Sermon Series
 * Description: Custom Post Type that syncs with the Northrock Vimeo channel
 * Author: Tucker Cowie
 * Text Domain: northrock-sermons
 */

function sermons_init() {
	register_post_type( 'series', array(
		'labels'            => array(
			'name'                => __( 'Sermon Series', 'northrock-sermons' ),
			'singular_name'       => __( 'Series', 'northrock-sermons' ),
			'all_items'           => __( 'All Sermon Series', 'northrock-sermons' ),
			'new_item'            => __( 'New Sermon Series', 'northrock-sermons' ),
			'add_new'             => __( 'Add New', 'northrock-sermons' ),
			'add_new_item'        => __( 'Add New Sermon Series', 'northrock-sermons' ),
			'edit_item'           => __( 'Edit Sermon Series', 'northrock-sermons' ),
			'view_item'           => __( 'View Sermon Series', 'northrock-sermons' ),
			'search_items'        => __( 'Search Sermons Series', 'northrock-sermons' ),
			'not_found'           => __( 'No Sermon Series found', 'northrock-sermons' ),
			'not_found_in_trash'  => __( 'No Sermon Series found in trash', 'northrock-sermons' ),
			'parent_item_colon'   => __( 'Parent Sermon Sermon Series', 'northrock-sermons' ),
			'menu_name'           => __( 'Sermon Series', 'northrock-sermons' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-book-alt',
	) );

}
add_action( 'init', 'sermons_init' );

function sermon_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['series'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Sermon updated. <a target="_blank" href="%s">View Sermon</a>', 'northrock-sermons'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'northrock-sermons'),
		3 => __('Custom field deleted.', 'northrock-sermons'),
		4 => __('Sermon updated.', 'northrock-sermons'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Sermon restored to revision from %s', 'northrock-sermons'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Sermon published. <a href="%s">View Sermon</a>', 'northrock-sermons'), esc_url( $permalink ) ),
		7 => __('Sermon saved.', 'northrock-sermons'),
		8 => sprintf( __('Sermon submitted. <a target="_blank" href="%s">Preview Sermons</a>', 'northrock-sermons'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Sermon scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Sermon</a>', 'northrock-sermons'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Sermon draft updated. <a target="_blank" href="%s">Preview Sermon</a>', 'northrock-sermons'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'sermon_updated_messages' );
