<?php
class grid_service_settings_lookup
{
//  
   function lookup_active(&$active) 
   {
      $conteudo = "" ; 
      if ($active == "1")
      { 
          $conteudo = "Active";
      } 
      if ($active == "0")
      { 
          $conteudo = "Inactive";
      } 
      if (!empty($conteudo)) 
      { 
          $active = $conteudo; 
      } 
   }  
//  
   function lookup_servicetype(&$servicetype) 
   {
      $conteudo = "" ; 
      if ($servicetype == "OT")
      { 
          $conteudo = "Outpatient";
      } 
      if ($servicetype == "IT")
      { 
          $conteudo = "Inpatient";
      } 
      if (!empty($conteudo)) 
      { 
          $servicetype = $conteudo; 
      } 
   }  
}
?>
