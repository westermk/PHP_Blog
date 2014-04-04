<?php

class View {
   public function load( $folder, $file_name, $data = array()) 
   {
	  //Extracting the data for the controller 
      if( is_array($data) ) {
         extract($data);
      }
	  //Instantiating our user object
	  $u = new user();
	  //show the view
      include 'views/' . $folder . '/' . $file_name . '.php' ;
   }
}



