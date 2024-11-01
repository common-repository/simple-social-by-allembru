<?php
/*
Plugin Name: Simple Social by Allembru
Plugin URI: http://www.allembru.com/web-tools/simple-social/
Description: A simple social sharing plugin that uses the native API's of each social network in order to maintain full sharing functionality.
Version: 1.1
Author: Allembru.com
Author URI: http://www.allembru.com/
License: GPL2

Copyright 2012 Allembru  (email : wp-plugin@allembru.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

global $ss_allembru_db_version;
$ss_allembru_db_version = "1.0";

function ss_allembru_install() {
	global $ss_allembru_db_version;
	$ss_allembru_options = array(
						'post_before_active'=>0,
						'post_before_headline'=>"",
						'post_before_gplus'=>0,
						'post_before_facebook'=>0,
						'post_before_twitter'=>0,
						'post_before_linkedin'=>0,
						'post_after_active'=>1,
						'post_after_headline'=>"Share It!",
						'post_after_gplus'=>1,
						'post_after_facebook'=>1,
						'post_after_twitter'=>1,
						'post_after_linkedin'=>1
						);
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	add_option("ss_allembru_db", $ss_allembru_db_version);
	add_option("ss_allembru", $ss_allembru_options);
}
register_activation_hook(__FILE__,'ss_allembru_install');

function ss_allembru_uninstall() {
	delete_option("ss_allembru_db", $ss_allembru_db_version);
	delete_option("ss_allembru", $ss_allembru_options);
}
register_deactivation_hook(__FILE__,'ss_allembru_uninstall');

function ss_allembru_admin_init() {
	wp_register_style('ss-allembru-admin-css', plugins_url('css/admin.css', __FILE__));
	wp_enqueue_style('ss-allembru-admin-css');
}

add_action('admin_init', 'ss_allembru_admin_init');

function ss_allembru_header() {
	wp_enqueue_script('jquery');
	
	$ss_options = get_option('ss_allembru');
	if($ss_options['post_before_active']==1 || $ss_options['post_after_active']==1) {
		wp_register_style('ss_allembru-public-css', plugins_url('css/public.css', __FILE__));
		wp_enqueue_style('ss_allembru-public-css');
		
		wp_register_script('ss_allembru-public-js', plugins_url('js/public.js', __FILE__));
		wp_enqueue_script('ss_allembru-public-js');
		
		if($ss_options['post_before_active']==1) {
			add_filter('the_content', 'ss_allembru_before_content');
		}
		if($ss_options['post_after_active']==1) {
			add_filter('the_content', 'ss_allembru_after_content');
		}
	}
}    
add_action('wp_head', 'ss_allembru_header',0);

function ss_allembru_create_menu() {
	//create new top-level menu
	$page_title = 'Simple Social by Allembru';
	$menu_title = 'Simple Social';
	$capability = 'administrator';
	$menu_slug	= 'ss-allembru-edit';
	$function 	= 'ss_allembru_edit_page';
	$icon_url	= plugins_url('/img/menu_icon.png', __FILE__);
	$position	= __FILE__;
	add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url);
}
add_action('admin_menu', 'ss_allembru_create_menu');

function ss_allembru_edit_page() {
	require_once('allembru-ssocial-edit.php');
}

function ss_allembru_before_content($content) {
	global $post;
	$ss_options = get_option('ss_allembru');
	$postid = $post->ID;
	$posttitle = $post->post_title;
	if($ss_options['post_before_headline']!="") {
		$content = "<h3>".$ss_options['post_before_headline']."</h3>".ss_allembru_display($postid,$posttitle,"before").$content;
	} else {
		$content = ss_allembru_display($postid,$posttitle,"before").$content;
	}
	return $content;
}
function ss_allembru_after_content($content) {
	global $post;	
	$ss_options = get_option('ss_allembru');
	$postid = $post->ID;
	$posttitle = $post->post_title;
	if($ss_options['post_after_headline']!="") {
		$content = $content."<h3>".$ss_options['post_after_headline']."</h3>".ss_allembru_display($postid,$posttitle,"after");
	} else {
		$content = $content.ss_allembru_display($postid,$posttitle,"after");
	}
	return $content;
}
function ss_allembru_display($postid,$posttitle,$location) {
	$ss_options = get_option('ss_allembru');
	if($location=="before") {
		$show_gplus = $ss_options['post_before_gplus'];
		$show_facebook = $ss_options['post_before_facebook'];
		$show_twitter = $ss_options['post_before_twitter'];
		$show_linkedin = $ss_options['post_before_linkedin'];
	}
	if($location=="after") {
		$show_gplus = $ss_options['post_after_gplus'];
		$show_facebook = $ss_options['post_after_facebook'];
		$show_twitter = $ss_options['post_after_twitter'];
		$show_linkedin = $ss_options['post_after_linkedin'];
	}
	$display = '<div class="allembru-simple-social">';
	if($show_gplus==1) {
		$display .= '<div class="gplus">';
		$display .= '<div class="g-plusone" data-href="'.get_permalink($postid).'"></div>';
		$display .= '</div>';
	}
	if($show_facebook==1) {
		$display .= '<div class="facebook">';
		$display .= '<div class="fb-like" data-href="'.get_permalink($postid).'" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>';
		$display .= '</div>';
	}
	if($show_twitter==1) {
		$display .= '<div class="twitter">';
		$display .= '<a href="https://twitter.com/share" class="twitter-share-button"  data-url="'.get_permalink($postid).'" data-text="'.$posttitle.'" data-related="allembru" data-dnt="true">Tweet</a>';
		$display .= '</div>';
	}
	if($show_linkedin==1) {
		$display .= '<div class="linkedin">';
		$display .= '<script type="IN/Share" data-url="'.get_permalink($postid).'"></script>';
		$display .= '</div>';
	}
	$display .= '<div class="allembru-clear"></div>';
	$display .= '</div>';
	return $display;	
}
?>