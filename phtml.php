<?php
/* PHTML 1.0.0 - Super Simple PHP Template Engine
 * Copyright 2014 Philip Johnson
 * Released under the MIT license
 * http://github.com/u360/PHTML
 */

eval( call_user_func( function( $phtml ) {
  $php = array() ;
  $html = false ;
  foreach( explode( "\n", $phtml ) as $line ) {
    $data = trim( $line );
    if( $html || substr( $data, 0, 1 ) == "<" ) {
      $data = str_replace( "\\", "\\\\", $data );
      $data = str_replace( "'", "\\'", $data );
      $data = str_replace( "<?", "',", $data );
      $data = str_replace( "?>", ",'", $data );
      $php[] = "echo'" . $data . "';" ;
      if( substr( $data, -1 ) != ">"
          || $data == "<script>" || $data == "<style>" ) {
        $html = true ;
      } else {
        $html = false ;
      }
    } else {
      $php[] = $line ;
    }
  }
  return implode( "\n", $php );
}, $phtml ) );
