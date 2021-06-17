<?php
/**
 * Plugin Name: calisia-product-import-requierd-fields
 * Author: Tomasz Boroń
 * Text Domain: calisia-product-import-requierd-fields
 * Domain Path: /languages
*/

define('CALISIA_PRODUCT_IMPORT_REQUIERD_FIELDS_ROOT', __DIR__);
define('CALISIA_PRODUCT_IMPORT_REQUIERD_FIELDS_URL', plugin_dir_url( __FILE__ ));



add_filter( 'woocommerce_product_import_pre_insert_product_object', 'calisia_product_import_requierd_fields::validate', 10, 2 );

class calisia_product_import_requierd_fields{
    public static function validate($object, $data){
     /*   ob_start();

       // print_r($object);

        print_r($data);
        $text = ob_get_contents();
        ob_end_clean();*/

        if(!isset($data['name']))
            throw new Exception( __('No product name provided.', 'calisia-product-import-requierd-fields') );

        if(!isset($data['regular_price']))
            throw new Exception( __('No product price provided.', 'calisia-product-import-requierd-fields') );

        if(!isset($data['sku']))
            throw new Exception( __('No SKU provided.', 'calisia-product-import-requierd-fields') );

        return $object;
    }
}
