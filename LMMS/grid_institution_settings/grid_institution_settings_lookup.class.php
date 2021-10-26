<?php
class grid_institution_settings_lookup
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
//  
   function lookup_function(&$function) 
   {
      $conteudo = "" ; 
      if ($function == "1")
      { 
          $conteudo = "Registration";
      } 
      if ($function == "2")
      { 
          $conteudo = "Cashier";
      } 
      if (!empty($conteudo)) 
      { 
          $function = $conteudo; 
      } 
   }  
}
?>
