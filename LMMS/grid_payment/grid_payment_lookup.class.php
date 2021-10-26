<?php
class grid_payment_lookup
{
//  
   function lookup_curr1(&$conteudo, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT b.symbol
FROM profile a left join currency b on b.code = a.currency
ORDER BY b.code" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          while (!$rx->EOF) 
          { 
                 if (isset($rx->fields[0]))
                 { 
                     $nm_array_retorno_lookup[$a][0] = trim($rx->fields[0]);
                     $a++; 
                     if ($y == 1)
                     { 
                          $conteudo .= "<br>";
                          $y = 0; 
                     } 
                     if ($y != 0)
                     { 
                          $conteudo .= "";
                     } 
                     $y++; 
                     $nm_tmp_form = trim($rx->fields[0]); 
                     $conteudo .= $nm_tmp_form;
                 } 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
//  
   function lookup_curr2(&$conteudo, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      $nm_comando = "SELECT b.symbol
FROM profile a left join currency b on b.code = a.currency
ORDER BY b.code" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          while (!$rx->EOF) 
          { 
                 if (isset($rx->fields[0]))
                 { 
                     $nm_array_retorno_lookup[$a][0] = trim($rx->fields[0]);
                     $a++; 
                     if ($y == 1)
                     { 
                          $conteudo .= "<br>";
                          $y = 0; 
                     } 
                     if ($y != 0)
                     { 
                          $conteudo .= "";
                     } 
                     $y++; 
                     $nm_tmp_form = trim($rx->fields[0]); 
                     $conteudo .= $nm_tmp_form;
                 } 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
//  
   function lookup_type(&$conteudo , $type) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $type; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($type) === "" || trim($type) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select name from payment_settings where ID = $type order by name" ; 
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
//  
   function lookup_status(&$status) 
   {
      $conteudo = "" ; 
      if ($status == "1")
      { 
          $conteudo = "Process";
      } 
      if ($status == "2")
      { 
          $conteudo = "Completed";
      } 
      if ($status == "0")
      { 
          $conteudo = "Cancel";
      } 
      if (!empty($conteudo)) 
      { 
          $status = $conteudo; 
      } 
   }  
}
?>
