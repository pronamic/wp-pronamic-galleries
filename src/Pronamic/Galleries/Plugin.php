<?php

/**
 * Base Frontend Plugin for Pronamic Galleries
 * 
 * @package Pronamic
 * @subpackage Galleries
 */
class Pronamic_Galleries_Plugin {
	
	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
	}
	
	/**
	 * Makes the pronamic_gallery post type.
	 */
	public function register_post_type() {

		$pronamic_gallery_labels = array(
			'name'               => _x( 'Galleries', 'Plural for Post Type Label', 'pronamic_galleries' ),
			'singular_name'      => _x( 'Gallery', 'Singular for Post Type Label', 'pronamic_galleries' ),
			'add_new'            => _x( 'Add New', 'gallery', 'pronamic_galleries' ),
			'add_new_item'       => __( 'Add New Gallery', 'pronamic_galleries' ),
			'edit_item'          => __( 'Edit Gallery', 'pronamic_galleries' ),
			'new_item'           => __( 'New Gallery', 'pronamic_galleries' ),
			'view_item'          => __( 'View Gallery', 'pronamic_galleries' ),
			'search_items'       => __( 'Search Galleries', 'pronamic_galleries' ),
			'not_found'          => __( 'No galleries found', 'pronamic_galleries' ),
			'not_found_in_trash' => __( 'No galleries found in Trash', 'pronamic_galleries' ),
			'menu_name'          => __( 'Galleries', 'pronamic_galleries' ),
		);

		$pronamic_gallery_arguments = array(
			'labels' => $pronamic_gallery_labels,
			'public' => true,
			'publicily_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 
				'slug' => get_option( 
					'pronamic_galleries_post_type_slug', 
					_x( 'gallery', 'Gallery Default URI Slug', 'pronamic_galleries' ) 
				) 
			),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt'
			)
		);

		register_post_type( 'pronamic_gallery', $pronamic_gallery_arguments );
	}
}