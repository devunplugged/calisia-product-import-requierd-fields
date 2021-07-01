<?php
/**
 * Plugin Name: calisia-product-import-requierd-fields
 * Author: Tomasz Boroń
 * Text Domain: calisia-product-import-requierd-fields
 * Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

define('CALISIA_PRODUCT_IMPORT_REQUIERD_FIELDS_ROOT', __DIR__);
define('CALISIA_PRODUCT_IMPORT_REQUIERD_FIELDS_URL', plugin_dir_url( __FILE__ ));

//require_once CALISIA_PRODUCT_IMPORT_REQUIERD_FIELDS_ROOT . '/src/core/debugger.php';

add_filter( 'woocommerce_product_import_pre_insert_product_object', 'calisia_product_import_requierd_fields::validate', 10, 2 );

class calisia_product_import_requierd_fields{
    public static function validate($object, $data){

        if(!isset($data['name'])){

            throw new Exception( __('No product name provided.', 'calisia-product-import-requierd-fields') );
        }

        if(!isset($data['regular_price'])){

            throw new Exception( __('No product price provided.', 'calisia-product-import-requierd-fields') );
        }

        if(!isset($data['sku'])){

            throw new Exception( __('No SKU provided.', 'calisia-product-import-requierd-fields') );
        }

        return $object;
    }
}
