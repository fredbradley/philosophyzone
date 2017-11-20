<?php

namespace CranleighSchool\PhilosophyZoneTheme\CustomPostTypes;

class PhilosophyDocsCustomPostType extends BasePostType {

	protected static $post_type_key = "philosophy-doc";

	public function setup() {
		$this->setIcon('dashicons-welcome-learn-more');
		$this->setOptions([
			"has_archive" => "discussion",
			'rewrite' => [
				'slug' => 'discussion/%discussion-point%',
				'with_front' => false
			],
			"menu_position" => 27
		]);
		//$this->setLabels(['featured_image'=>'Venue Glamour Shot', "menu_name" => "Lettings"]);
		$this->addSupportFor("page-attributes");
	}

	public function render() {
		$this->post_type->taxonomy("discussion-point");
//		$this->post_type->taxonomy('category');
//		$this->post_type->taxonomy('post_tag');
	}
	public static function wpa_show_permalinks( $post_link, $post ){
		if ( is_object( $post ) && $post->post_type == 'philosophy-doc' ){
			$terms = wp_get_object_terms( $post->ID, 'discussion-point' );
			if( $terms ){
				return str_replace( '%discussion-point%' , $terms[0]->slug , $post_link );
			} else {
				return str_replace('%discussion-point%', $post->ID, $post_link);
			}
		}
		return $post_link;
	}
}
