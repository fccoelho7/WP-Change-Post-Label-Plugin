<?php
	/**
	 * Plugin Name: Change Post Label
	 * Plugin URI: 
	 * Description: If you don't use WordPress like blog, it able you to rename the Post's label, dispensing the necessity of create a new custom post type or hide the Post menu item.
	 * Author: fccoelho7
	 * Author URI: 
	 * Version: 1.0.0
	 * License: GPLv2 or later
	 */

	if ( ! defined( 'ABSPATH' ) )
		exit; // Exit if accessed directly.

	function change_post_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Notícias';
		$submenu['edit.php'][5][0] = 'Notícias';
		$submenu['edit.php'][10][0] = 'Nova Notícia';
		$submenu['edit.php'][16][0] = 'Notícia Tags';
		echo '';
	}

	function change_post_object() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Notícias';
		$labels->singular_name = 'Notícia';
		$labels->add_new = 'Nova Notícia';
		$labels->add_new_item = 'Nova Notícia';
		$labels->edit_item = 'Editar Notícia';
		$labels->new_item = 'Notícia';
		$labels->view_item = 'Ver Notícia';
		$labels->search_items = 'Procurar Notícias';
		$labels->not_found = 'Nenhuma Notícia encontrada';
		$labels->not_found_in_trash = 'Nenhuma Notícias encontra na Lixeira';
		$labels->all_items = 'Todas as Notícias';
		$labels->menu_name = 'Notícias';
		$labels->name_admin_bar = 'Notícias';
	}

	add_action( 'admin_menu', 'change_post_label' );
	add_action( 'init', 'change_post_object' );
