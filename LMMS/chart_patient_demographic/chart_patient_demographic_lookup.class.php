<?php
class chart_patient_demographic_lookup
{
//  
   function lookup_sc_free_group_by_gender(&$gender) 
   {
      $conteudo = "" ; 
      if ($gender == "F")
      { 
          $conteudo = "Female";
      } 
      if ($gender == "M")
      { 
          $conteudo = "Male";
      } 
      if (!empty($conteudo)) 
      { 
          $gender = $conteudo; 
      } 
   }  
}
?>
