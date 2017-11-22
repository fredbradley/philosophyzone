<?php
/**
 * Created by PhpStorm.
 * User: fredbradley
 * Date: 22/11/2017
 * Time: 15:54
 */

namespace CranleighSchool\PhilosophyZoneTheme;


class RolesAndCaps {

	public function __construct() {
		add_action('admin_init', array($this, 'allow_contributor_uploads'));
		add_action('add_meta_boxes', array($this, 'yoast_is_toast'), 99999999999);
		add_action( 'admin_init', array($this, 'remove_comments_menu') );
	}

	public function allow_contributor_uploads() {
		$contributor = get_role('contributor');
		$contributor->add_cap('upload_files');
	}

	public function yoast_is_toast(){
		//capability of 'manage_plugins' equals admin, therefore if NOT administrator
		//hide the meta box from all other roles on the following 'post_type'
		//such as post, page, custom_post_type, etc
		if (!current_user_can('activate_plugins')) {
			remove_meta_box('wpseo_meta', 'philosophy-doc', 'normal');
			remove_meta_box('wpseo_meta', 'post', 'normal');
			remove_meta_box('cranleigh_custom_author', 'post', 'side');
		}
	}

	function remove_comments_menu() {
		if (!current_user_can('delete_others_pages')) {
			remove_menu_page( 'edit-comments.php' ); // Comments
			remove_menu_page('edit.php?post_type=faqs');
		}
	}

}
