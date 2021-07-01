<?php
namespace calisia_product_import_requierd_fields;

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

class debugger{

    public static function debug($element, $file = true){

        ob_start();
            print_r($element);
        $content = ob_get_contents();
        ob_end_clean();

        if($file){
            self::to_file($content);
        }else{
            echo "<pre>";
            echo $content;
            echo "</pre>";
        }
    }

   public static function to_file($text){
        $fp = fopen(CALISIA_PRODUCT_IMPORT_REQUIERD_FIELDS_ROOT . '/debug_log.txt', 'a');//opens file in append mode.
        fwrite($fp, "$text\n ");
        fclose($fp);
    }

}