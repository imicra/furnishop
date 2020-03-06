<?php
/* 
 * Custom Fields in WooCommerce Product Category
 * 
 * @package Furnishop
 */

//added form fields.
add_action('product_cat_add_form_fields', 'furnishop_taxonomy_add_new_meta_field', 100, 1);
add_action('product_cat_edit_form_fields', 'furnishop_taxonomy_edit_meta_field', 100, 1);

//Product Cat Create page
function furnishop_taxonomy_add_new_meta_field() {
    ?>   
    <div class="form-field">
        <label for="furnishop_meta_color">Цвет фона</label>
        <input type="text" name="furnishop_meta_color" id="furnishop_meta_color">
        <p class="description">Введите html код цвета</p>
    </div>
    <?php
}

//Product Cat Edit page
function furnishop_taxonomy_edit_meta_field($term) {
    //getting term ID
    $term_id = $term->term_id;
    // retrieve the existing value(s) for this meta field.
    $furnishop_meta_color = get_term_meta($term_id, 'furnishop_meta_color', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="furnishop_meta_color">Цвет фона</label></th>
        <td>
            <input type="text" name="furnishop_meta_color" id="furnishop_meta_color" value="<?php echo esc_attr($furnishop_meta_color) ? esc_attr($furnishop_meta_color) : ''; ?>">
            <p class="description">Введите html код цвета</p>
        </td>
    </tr>
    <?php
}

//handle the form request.
add_action('edited_product_cat', 'furnishop_save_taxonomy_custom_meta', 100, 1);
add_action('create_product_cat', 'furnishop_save_taxonomy_custom_meta', 100, 1);

// Save extra taxonomy fields callback function.
function furnishop_save_taxonomy_custom_meta($term_id) {
    $furnishop_meta_color = filter_input(INPUT_POST, 'furnishop_meta_color');
	
    update_term_meta($term_id, 'furnishop_meta_color', $furnishop_meta_color);
}

//Displaying Additional Columns
add_filter( 'manage_edit-product_cat_columns', 'furnishop_customFieldsListTitle' ); //Register Function
add_action( 'manage_product_cat_custom_column', 'furnishop_customFieldsListDisplay' , 10, 3); //Populating the Columns
/**
 * Color column added to category admin screen.
 *
 * @param mixed $columns
 * @return array
 */
function furnishop_customFieldsListTitle( $columns ) {
    $columns['pro_meta_color'] = 'Цвет';
    return $columns;
}
/**
 * Color column value added to product category admin screen.
 *
 * @param string $columns
 * @param string $column
 * @param int $id term ID
 *
 * @return string
 */
function furnishop_customFieldsListDisplay( $columns, $column, $id ) {
    if ( 'pro_meta_color' == $column ) {
        $columns = esc_html( get_term_meta($id, 'furnishop_meta_color', true) );
    }
	
	$output = '<div style="position:relative;">';
	$output .= '<div style="width:40px; height:40px; position: absolute; top:30px; border-radius:50%; background-color:' . $columns . '">';
	$output .= '</div>';
	$output .= '</div>';
	
    return $output;
}

/* 
 * Custom Fields in "Цвет фасада" Product Attribute
 */
//added form fields.
add_action('pa_color_front_add_form_fields', 'furnishop_attribute_add_new_meta_field', 100, 1);
add_action('pa_color_front_edit_form_fields', 'furnishop_attribute_edit_meta_field', 100, 1);

add_action('pa_color_carcass_add_form_fields', 'furnishop_attribute_add_new_meta_field', 100, 1);
add_action('pa_color_carcass_edit_form_fields', 'furnishop_attribute_edit_meta_field', 100, 1);

//Product Cat Create page
function furnishop_attribute_add_new_meta_field() {
    ?>   
    <div class="form-field">
        <label for="furnishop_tag_color">Цвет</label>
        <input type="text" name="furnishop_tag_color" id="furnishop_tag_color">
        <p class="description">Введите html код цвета</p>
    </div>
    <?php
}

//Product Cat Edit page
function furnishop_attribute_edit_meta_field($term) {
    //getting term ID
    $term_id = $term->term_id;
    // retrieve the existing value(s) for this meta field.
    $furnishop_tag_color = get_term_meta($term_id, 'furnishop_tag_color', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="furnishop_tag_color">Цвет</label></th>
        <td>
            <input type="text" name="furnishop_tag_color" id="furnishop_tag_color" value="<?php echo esc_attr($furnishop_tag_color) ? esc_attr($furnishop_tag_color) : ''; ?>">
            <p class="description">Введите html код цвета</p>
        </td>
    </tr>
    <?php
}

//handle the form request.
add_action('edited_pa_color_front', 'furnishop_save_attribute_custom_meta', 100, 1);
add_action('create_pa_color_front', 'furnishop_save_attribute_custom_meta', 100, 1);

add_action('edited_pa_color_carcass', 'furnishop_save_attribute_custom_meta', 100, 1);
add_action('create_pa_color_carcass', 'furnishop_save_attribute_custom_meta', 100, 1);

// Save extra taxonomy fields callback function.
function furnishop_save_attribute_custom_meta($term_id) {
    $furnishop_tag_color = filter_input(INPUT_POST, 'furnishop_tag_color');
	
    update_term_meta($term_id, 'furnishop_tag_color', $furnishop_tag_color);
}

//Displaying Additional Columns
add_filter( 'manage_edit-pa_color_front_columns', 'furnishop_custom_attr_col_title' ); //Register Function
add_action( 'manage_pa_color_front_custom_column', 'furnishop_custom_attr_col_display' , 10, 3); //Populating the Columns

add_filter( 'manage_edit-pa_color_carcass_columns', 'furnishop_custom_attr_col_title' );
add_action( 'manage_pa_color_carcass_custom_column', 'furnishop_custom_attr_col_display' , 10, 3);
/**
 * Color column added to category admin screen.
 *
 * @param mixed $columns
 * @return array
 */
function furnishop_custom_attr_col_title( $columns ) {
    $columns['pro_tag_color'] = 'Цвет';
    return $columns;
}
/**
 * Color column value added to product category admin screen.
 *
 * @param string $columns
 * @param string $column
 * @param int $id term ID
 *
 * @return string
 */
function furnishop_custom_attr_col_display( $columns, $column, $id ) {
    if ( 'pro_tag_color' == $column ) {
        $columns = esc_html( get_term_meta($id, 'furnishop_tag_color', true) );
    }
	
	$output = '<div>';
	$output .= '<div style="width:30px; height:30px; border-radius:50%; background-color:' . $columns . '">';
	$output .= '</div>';
	$output .= '</div>';
	
    return $output;
}