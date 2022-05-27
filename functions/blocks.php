<?php

/*

	Guttemberg ACF Blocks

*/

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	if( function_exists('acf_register_block') ) {
		acf_register_block(array(
			'name'				=> 'example',
			'title'				=> __('Example'),
			'description'		=> __('A custom example block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'example', 'dropdown' ),
		));
		// Here we can add more blocks
		acf_register_block(array(
			'name'				=> 'posts-slider',
			'title'				=> __('News Slider block'),
			'description'		=> __('News Slider block.'),
			'render_callback'	=> 'posts_slider_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'excerpt-view',
			'keywords'			=> array( 'posts', 'news','posts-slider' ),
		));
		acf_register_block(array(
			'name'				=> 'hero-post',
			'title'				=> __('Hero post'),
			'description'		=> __('Homepage main post.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-post',
			'keywords'			=> array( 'posts', 'hero','posts-pick' ),

		));
		acf_register_block(array(
			'name'				=> 'academy-video',
			'title'				=> __('Academy banner'),
			'description'		=> __('Bloom academy banner'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'media',
			'icon'				=> 'media-video',
			'keywords'			=> array( 'posts', 'video','academy' ),
		));
		acf_register_block(array(
			'name'				=> 'featured-content',
			'title'				=> __('Featured content'),
			'description'		=> __('Block for featured content'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-post',
			'keywords'			=> array( 'posts', 'featured','content' ),
		));
		acf_register_block(array(
			'name'				=> 'features-list',
			'title'				=> __('Features list'),
			'description'		=> __('Block for features list'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'list-view',
			'keywords'			=> array( 'posts', 'features','list' ),
		));
		acf_register_block(array(
			'name'				=> 'category-slider',
			'title'				=> __('Category Slider'),
			'description'		=> __('Block to choose which category will be displayed'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'slides',
			'keywords'			=> array( 'posts', 'category','slider' ),
		));
	}
}

// Generic callback function to include “template parts” for our blocks.
function my_acf_block_render_callback( $block ) {
	$slug = str_replace('acf/', '', $block['name']);
	// include a template part from within the "blocks" folder
	if( file_exists( get_theme_file_path("/partials/blocks/block-{$slug}.php") ) ) {
		include( get_theme_file_path("/partials/blocks/block-{$slug}.php") );
	}
}
function posts_slider_block_render_callback( $block ) {
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "blocks" folder
    if( file_exists( get_theme_file_path("/partials/blocks/block-{$slug}.php") ) ) {
        include( get_theme_file_path("/partials/blocks/block-{$slug}.php") );
    }
}

?>