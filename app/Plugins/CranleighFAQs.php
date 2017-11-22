<?php
namespace CranleighSchool\PhilosophyZoneTheme\Plugins;

use WP_Query;

class CranleighFAQs {

	public $collapsibles = "collapsibles";
	public $collapse = "collapse";

	function __construct() {
		add_action( 'init', array($this,'custom_post_type'), 0 );
		add_action( 'init', array($this,'faq_group_taxonomy'), 0 );
		add_shortcode( 'cranleigh_faqs', array($this, 'shortcode') );
		add_action('admin_enqueue_scripts', array($this,'admin_style'));
		add_action("admin_head", array($this,'custom_icon'));

	}
	function custom_icon() {
		echo '<style type="text/css" media="screen">
				#adminmenu .menu-icon-faqs div.wp-menu-image:before {
					font-family: cranfont !important;
					content: "\e91b"
				}
				</style>';
	}
	function admin_style() {
		wp_enqueue_style( 'cranfont', '//cdn.cranleigh.org/cranfont/style.css' );
	}

	function shortcode($atts, $content=null) {
		$a = shortcode_atts( [
			'group' => null,
		], $atts, 'cranleigh_faqs' );

		$args = [
			"posts_per_page" => -1,
			"post_type" => "faqs",
			'orderby' => 'menu_order title',
			'order'   => 'ASC',
		];
		if ($a['group']!==null) {
			$args["tax_query"] = [[
				"taxonomy" => "faq_groups",
				"field" => "slug",
				"terms" => $a['group']
			]];
		}

		$query = new WP_Query($args);
		$questions = '';
		while($query->have_posts()): $query->the_post();
			$questions .= '['.$this->collapse.' active="0" openfirst="false" type="cranleigh" title="'.get_the_title().'"]'.wpautop(get_the_content()).'[/'.$this->collapse.']';
		endwhile;
		wp_reset_postdata();

		$start = '['.$this->collapsibles.' active="999" collapsible="true"]';
		$finish = '[/'.$this->collapsibles.']';

		return do_shortcode( $start.$questions.$finish );
		/*
			[accordions autoclose="true" openfirst="false" openall="true"]
		[accordion title="Charges" autoclose="true" openfirst="false" openall="false"]
		Certain additional charges stem from the wide variety of activities and facilities available at Cranleigh. In principle, any service or item acquired by a pupil for personal use is charged to parents. These include purchases from the School Shop, other items of clothing and equipment, materials individually requested or those used in products retained by pupils, medical and dental charges, optional trips/tours/holidays of a sporting, musical, cultural or recreational nature as well as miscellaneous items such as taxis, telephone charges, CDs, personal newspapers, dry cleaning and similar items.[/accordion]
		*/

	}

	// Register Custom Post Type
	function custom_post_type() {

		$labels = array(
			'name'                  => _x( 'FAQs', 'Post Type General Name', 'cranleigh-2016' ),
			'singular_name'         => _x( 'FAQ', 'Post Type Singular Name', 'cranleigh-2016' ),
			'menu_name'             => __( 'FAQs', 'cranleigh-2016' ),
			'name_admin_bar'        => __( 'FAQs', 'cranleigh-2016' ),
			'archives'              => __( 'FAQ Archives', 'cranleigh-2016' ),
			'parent_item_colon'     => __( 'Parent Item:', 'cranleigh-2016' ),
			'all_items'             => __( 'All FAQs', 'cranleigh-2016' ),
			'add_new_item'          => __( 'Add New FAQ', 'cranleigh-2016' ),
			'add_new'               => __( 'Add New', 'cranleigh-2016' ),
			'new_item'              => __( 'New FAQ', 'cranleigh-2016' ),
			'edit_item'             => __( 'Edit FAQ', 'cranleigh-2016' ),
			'update_item'           => __( 'Update FAQ', 'cranleigh-2016' ),
			'view_item'             => __( 'View FAQ', 'cranleigh-2016' ),
			'search_items'          => __( 'Search FAQ', 'cranleigh-2016' ),
			'not_found'             => __( 'Not found', 'cranleigh-2016' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'cranleigh-2016' ),
			'featured_image'        => __( 'Featured Image', 'cranleigh-2016' ),
			'set_featured_image'    => __( 'Set featured image', 'cranleigh-2016' ),
			'remove_featured_image' => __( 'Remove featured image', 'cranleigh-2016' ),
			'use_featured_image'    => __( 'Use as featured image', 'cranleigh-2016' ),
			'insert_into_item'      => __( 'Insert into item', 'cranleigh-2016' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'cranleigh-2016' ),
			'items_list'            => __( 'Items list', 'cranleigh-2016' ),
			'items_list_navigation' => __( 'Items list navigation', 'cranleigh-2016' ),
			'filter_items_list'     => __( 'Filter items list', 'cranleigh-2016' ),
		);
		$args = array(
			'label'                 => __( 'FAQ', 'cranleigh-2016' ),
			'description'           => __( 'Cranleigh FAQs', 'cranleigh-2016' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'page-attributes'),
			'taxonomies'            => array( 'faq_groups' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 27,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'menu_icon'				=> 'dashicons-smiley',
		);
		register_post_type( 'faqs', $args );

	}

	// Register Custom Taxonomy
	function faq_group_taxonomy() {

		$labels = array(
			'name'                       => _x( 'FAQ Groups', 'Taxonomy General Name', 'cranleigh-2016' ),
			'singular_name'              => _x( 'FAQ Group', 'Taxonomy Singular Name', 'cranleigh-2016' ),
			'menu_name'                  => __( 'FAQ Groups', 'cranleigh-2016' ),
			'all_items'                  => __( 'All Groups', 'cranleigh-2016' ),
			'parent_item'                => __( 'Parent Group', 'cranleigh-2016' ),
			'parent_item_colon'          => __( 'Parent Group:', 'cranleigh-2016' ),
			'new_item_name'              => __( 'New Group Name', 'cranleigh-2016' ),
			'add_new_item'               => __( 'Add New Group', 'cranleigh-2016' ),
			'edit_item'                  => __( 'Edit Group', 'cranleigh-2016' ),
			'update_item'                => __( 'Update Group', 'cranleigh-2016' ),
			'view_item'                  => __( 'View Group', 'cranleigh-2016' ),
			'separate_items_with_commas' => __( 'Separate groups with commas', 'cranleigh-2016' ),
			'add_or_remove_items'        => __( 'Add or remove groups', 'cranleigh-2016' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'cranleigh-2016' ),
			'popular_items'              => __( 'Popular Groups', 'cranleigh-2016' ),
			'search_items'               => __( 'Search Items', 'cranleigh-2016' ),
			'not_found'                  => __( 'Not Found', 'cranleigh-2016' ),
			'no_terms'                   => __( 'No items', 'cranleigh-2016' ),
			'items_list'                 => __( 'Items list', 'cranleigh-2016' ),
			'items_list_navigation'      => __( 'Items list navigation', 'cranleigh-2016' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
		);
		register_taxonomy( 'faq_groups', array( 'faqs' ), $args );

	}


}
