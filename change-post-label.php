<?php
	/**
	 * Plugin Name: Change Post Label
	 * Plugin URI: https://github.com/fccoelho7/change-post-label
	 * Description: If you don't use WordPress like blog, it able you to rename the Post's label, dispensing the necessity of create a new custom post type or hide the Post menu item.
	 * Author: fccoelho7
	 * Author URI: http://www.fabioc.com.br/
	 * Version: 1.5
	 * License: GPLv2 or later
	 */

	if ( ! defined( 'ABSPATH' ) )
		exit; // Exit if accessed directly.

	add_action( 'admin_menu', 'change_post_label' );
	add_action( 'init', 'change_post_object' );
	add_action('admin_menu', 'register_change_post_label_page');

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

	function register_change_post_label_page(){
		add_submenu_page( 'options-general.php', 'Change Post Label', 'Change Post Label', 'manage_options', 'change-post-label', 'change_post_label_callback' );
	}

	function change_post_label_callback(){
		?>
		<div class="wrap">
			<h2>Change Post Label</h2>
			<p>Fill the form below and sets an exclusive name to default "Posts":</p>
			<form action="options-general.php?page=change-post-label" method="get">
				<table class="form-table">
					<tbody>
						<tr>
							<th><label for="cpl-name">Name</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-name" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-singular-name">Singular Name</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-singular-name" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-add-new">Add New</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-add-new" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-add-new-item">Add New Item</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-add-new-item" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-edit-item">Edit Item</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-edit-item" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-new-item">New Item</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-new-item" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-view-item">View Item</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-view-item" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-search-items">Search Items</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-search-items" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-not-found">Not Found</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-not-found" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-not-found-in-trash">Not Found in Trash</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-not-found-in-trash" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-all-items">All Items</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-all-items" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-menu-name">Menu Name</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-menu-name" class="regular-text" size="16" value="">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-name-admin-bar">Name Admin Bar</label></th>
							<td>
								<input type="text" name="cpl_data" id="cpl-name-admin-bar" class="regular-text" size="16" value="">
							</td>
						</tr>
					</tbody>
				</table>
				<p class="submit"><input type="submit" id="cpl-submit" class="button button-primary" value="Save"></p>
			</form>
		</div>
		<?php
	}

	function update_cpl(){

		$data = $_GET['cpl_data'];

		update_option( 'cpl_data', $data );

		var_dump( $data );

	}

	if( isset( $_GET['submit'] ) )
		update_cpl();

	var_dump( get_option( 'cpl_data' ) );