<?php
/**
 * @author Benjamin Daschel
 * Date: 1/20/16
 */

function config_path($subPath){

    return dirname(__FILE__).'/config/'.$subPath;
}

function load_config_file($prefix, $file){

    if (file_exists($file)){
        $config = include($file);

        foreach($config as $key => $value){

            config([
                $prefix.'.'.$key => $value
            ]);
        }
    }
}