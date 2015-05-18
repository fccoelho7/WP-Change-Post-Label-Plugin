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

		$data = get_option( 'cpl_data' );

		if( $data ){
			$menu[5][0] = $data['menu_name'];
			$submenu['edit.php'][5][0] = $data['name'];
			$submenu['edit.php'][10][0] = $data['add_new'];
		}

	}

	function change_post_object() {

		global $wp_post_types;

		$data = get_option( 'cpl_data' );

		if( $data ){
			$labels = &$wp_post_types['post']->labels;
			$labels->name = $data['name'];
			$labels->singular_name = $data['singular_name'];
			$labels->add_new = $data['add_new'];
			$labels->add_new_item = $data['add_new_item'];
			$labels->edit_item = $data['edit_item'];
			$labels->new_item = $data['new_item'];
			$labels->view_item = $data['view_item'];
			$labels->search_items = $data['search_items'];
			$labels->not_found = $data['not_found'];
			$labels->not_found_in_trash = $data['not_found_in_trash'];
			$labels->all_items = $data['all_items'];
			$labels->menu_name = $data['menu_name'];
			$labels->name_admin_bar = $data['name_admin_bar'];
		}
	}

	function register_change_post_label_page(){
		add_submenu_page( 'options-general.php', 'Change Post Label', 'Change Post Label', 'manage_options', 'change-post-label', 'change_post_label_callback' );
	}

	function change_post_label_callback(){
		?>
		<div class="wrap">
			<h2>Change Post Label</h2>
			<p>Fill the form below and sets an exclusive name to default "Posts":</p>
			<form action="options-general.php?page=change-post-label" method="POST">
				<table class="form-table">
					<tbody>
						<tr>
							<th><label for="cpl-name">Name</label></th>
							<td>
								<input type="text" name="cpl_data[name]" id="cpl-name" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'name' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-singular-name">Singular Name</label></th>
							<td>
								<input type="text" name="cpl_data[singular_name]" id="cpl-singular-name" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'singular_name' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-add-new">Add New</label></th>
							<td>
								<input type="text" name="cpl_data[add_new]" id="cpl-add-new" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'add_new' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-add-new-item">Add New Item</label></th>
							<td>
								<input type="text" name="cpl_data[add_new_item]" id="cpl-add-new-item" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'add_new_item' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-edit-item">Edit Item</label></th>
							<td>
								<input type="text" name="cpl_data[edit_item]" id="cpl-edit-item" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'edit_item' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-new-item">New Item</label></th>
							<td>
								<input type="text" name="cpl_data[new_item]" id="cpl-new-item" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'new_item' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-view-item">View Item</label></th>
							<td>
								<input type="text" name="cpl_data[view_item]" id="cpl-view-item" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'view_item' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-search-items">Search Items</label></th>
							<td>
								<input type="text" name="cpl_data[search_items]" id="cpl-search-items" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'search_items' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-not-found">Not Found</label></th>
							<td>
								<input type="text" name="cpl_data[not_found]" id="cpl-not-found" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'not_found' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-not-found-in-trash">Not Found in Trash</label></th>
							<td>
								<input type="text" name="cpl_data[not_found_in_trash]" id="cpl-not-found-in-trash" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'not_found_in_trash' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-all-items">All Items</label></th>
							<td>
								<input type="text" name="cpl_data[all_items]" id="cpl-all-items" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'all_items' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-menu-name">Menu Name</label></th>
							<td>
								<input type="text" name="cpl_data[menu_name]" id="cpl-menu-name" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'menu_name' ); ?>">
							</td>
						</tr>
						<tr>
							<th><label for="cpl-name-admin-bar">Name Admin Bar</label></th>
							<td>
								<input type="text" name="cpl_data[name_admin_bar]" id="cpl-name-admin-bar" class="regular-text" size="16" value="" placeholder="<?php echo verify_placeholder( 'name_admin_bar' ); ?>">
							</td>
						</tr>
					</tbody>
				</table>
				<p class="submit"><?php submit_button( 'Save', 'primary' ) ?></p>
			</form>
			<hr>
			<h3>Reset Labels</h3>
			<p>If you want back to default "Post" labels, just press the button below:</p>
			<form action="options-general.php?page=change-post-label" method="POST">
				<input type="hidden" name="reset_cpl_data" value="">
				<?php submit_button( 'Reset Labels', 'delete' ) ?>
			</form>
		</div>
		<?php
	}

	function object_to_array( $obj ) {
		if ( is_object( $obj ) ) {
			$obj = get_object_vars( $obj );
		}
		
		if ( is_array( $obj ) ) {
			return array_map( __FUNCTION__, $obj );
		}
		else {
			return $obj;
		}
	}

	function get_default_post_label(){
		return object_to_array( get_post_type_object( 'post' )->labels );
	}

	function verify_placeholder( $label_name ){
		
		$data = get_option( 'cpl_data' );

		if( $data ){
			return $data[ $label_name ];
		} else{
			return get_default_post_label()[ $label_name ];
		}
	}

	function update_data( $request_data ){

		$data = get_option( 'cpl_data' );

		if( ! $data )
			$data = get_default_post_label();

		foreach ( $request_data as $key => $value ) {

			if( empty( $value ) )
				return;

			if( $value != $data[$key] )
				$data = array_replace( $data, array( $key => $value ) );

			update_option( 'cpl_data', array_map( 'trim', $data ) );
		}

	}

	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
		
		if( isset( $_POST[ 'cpl_data' ] ) ){

			$data = $_POST[ 'cpl_data' ];

			if( ! isset( $data ) )
				return;

			update_data( $data );
		}

		if( isset( $_POST[ 'reset_cpl_data' ] ) )
			delete_option( 'cpl_data' );
	}
