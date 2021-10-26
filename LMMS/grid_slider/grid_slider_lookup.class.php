<?php
class grid_slider_lookup
{
//  
   function lookup_active(&$active) 
   {
      $conteudo = "" ; 
      if ($active == "1")
      { 
          $conteudo = "Yes";
      } 
      if ($active == "0")
      { 
          $conteudo = "No";
      } 
      if (!empty($conteudo)) 
      { 
          $active = $conteudo; 
      } 
   }  
}
?>
