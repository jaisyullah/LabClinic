<?php
class grid_normal_laboratory_lookup
{
//  
   function lookup_resulttype(&$resulttype) 
   {
      $conteudo = "" ; 
      if ($resulttype == "0")
      { 
          $conteudo = "Range";
      } 
      if ($resulttype == "1")
      { 
          $conteudo = "Selection";
      } 
      if ($resulttype == "2")
      { 
          $conteudo = "Description";
      } 
      if ($resulttype == "3")
      { 
          $conteudo = "Sub-Result";
      } 
      if (!empty($conteudo)) 
      { 
          $resulttype = $conteudo; 
      } 
   }  
}
?>
