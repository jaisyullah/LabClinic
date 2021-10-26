<?php
class grid_patient_result_record_lookup
{
//  
   function lookup_gender(&$gender) 
   {
      $conteudo = "" ; 
      if ($gender == "M")
      { 
          $conteudo = "Male";
      } 
      if ($gender == "F")
      { 
          $conteudo = "Female";
      } 
      if (!empty($conteudo)) 
      { 
          $gender = $conteudo; 
      } 
   }  
//  
   function lookup_cityid(&$conteudo , $cityid) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $cityid; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;" || trim($cityid) === "" || trim($cityid) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT city_ascii + ' - ' + country  FROM worldcities where id = $cityid order by city_ascii, country" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(city_ascii,' - ', country)  FROM worldcities where id = $cityid order by city_ascii, country" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT city_ascii&' - '&country  FROM worldcities where id = $cityid order by city_ascii, country" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT city_ascii||' - '||country  FROM worldcities where id = $cityid order by city_ascii, country" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT city_ascii + ' - ' + country  FROM worldcities where id = $cityid order by city_ascii, country" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT city_ascii||' - '||country  FROM worldcities where id = $cityid order by city_ascii, country" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT city_ascii||' - '||country  FROM worldcities where id = $cityid order by city_ascii, country" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
