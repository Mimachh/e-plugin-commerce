<?php 



function wpm_myme_types($mime_types){
    // $mime_types['ai'] = 'application/postscript'; //On autorise les .ai
    // $mime_types['rar-compressed'] = 'application/x-rar-compressed'; 
    // $mime_types['zip'] = 'application/zip';
    return array_merge($mime_types, array(
        'rar' => 'package/rar',
        'rar-compressed'=> 'application/x-rar-compressed',
        'rar-normal'=> 'application/rar',
        'css'                          => 'text/css',
		'htm|html'                     => 'text/html',
        'js'                           => 'application/javascript',
        'pot|pps|ppt'                  => 'application/vnd.ms-powerpoint',
        'ico'                          => 'image/x-icon',

    ));
    // $mime_types['rar'] = 'application/rar';
    return $mime_types;
}

add_filter('mime_types', 'wpm_myme_types', 1, 1);