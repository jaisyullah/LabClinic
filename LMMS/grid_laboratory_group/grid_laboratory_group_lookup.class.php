<?php
class grid_laboratory_group_lookup
{
//  
   function lookup_active(&$active) 
   {
      $conteudo = "" ; 
      if ($active == "Y")
      { 
          $conteudo = "Yes";
      } 
      if ($active == "N")
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
