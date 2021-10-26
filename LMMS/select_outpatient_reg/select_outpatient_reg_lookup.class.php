<?php
class select_outpatient_reg_lookup
{
//  
   function lookup_name(&$conteudo , $patientid, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT name + ' (' + patientCode + ')'  FROM patient_settings  WHERE patientCode = '" . substr($this->Db->qstr($patientid), 1 , -1) . "'  ORDER BY patientCode, name" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(name,' (',patientCode,')')  FROM patient_settings  WHERE patientCode = '" . substr($this->Db->qstr($patientid), 1 , -1) . "'  ORDER BY patientCode, name" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT name&' ('&patientCode&')'  FROM patient_settings  WHERE patientCode = '" . substr($this->Db->qstr($patientid), 1 , -1) . "'  ORDER BY patientCode, name" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT name||' ('||patientCode||')'  FROM patient_settings  WHERE patientCode = '" . substr($this->Db->qstr($patientid), 1 , -1) . "'  ORDER BY patientCode, name" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "SELECT name + ' (' + patientCode + ')'  FROM patient_settings  WHERE patientCode = '" . substr($this->Db->qstr($patientid), 1 , -1) . "'  ORDER BY patientCode, name" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
      { 
          $nm_comando = "SELECT name||' ('||patientCode||')'  FROM patient_settings  WHERE patientCode = '" . substr($this->Db->qstr($patientid), 1 , -1) . "'  ORDER BY patientCode, name" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT name||' ('||patientCode||')'  FROM patient_settings  WHERE patientCode = '" . substr($this->Db->qstr($patientid), 1 , -1) . "'  ORDER BY patientCode, name" ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "name,' (',patientCode,')'"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= trim($rx->fields[$x]);
                        if ($x != 0)
                        { 
                            $conteudo .= "&nbsp;";
                        } 
                        $conteudo .= trim($rx->fields[$x]);
                 }
                 $a++; 
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
   function lookup_deptid(&$deptid) 
   {
      $conteudo = "" ; 
      if ($deptid == "1")
      { 
          $conteudo = "Laboratory";
      } 
      if (!empty($conteudo)) 
      { 
          $deptid = $conteudo; 
      } 
   }  
//  
   function lookup_doctorid(&$conteudo , $doctorid) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $doctorid; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($doctorid) === "" || trim($doctorid) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select name from doctor_settings where ID = $doctorid order by name" ; 
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
   function lookup_paymentid(&$conteudo , $paymentid) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $paymentid; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($paymentid) === "" || trim($paymentid) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select name from payment_settings where ID = $paymentid order by name" ; 
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
   function lookup_statusid(&$statusid) 
   {
      $conteudo = "" ; 
      if ($statusid == "1")
      { 
          $conteudo = "Register";
      } 
      if ($statusid == "2")
      { 
          $conteudo = "Handled";
      } 
      if ($statusid == "3")
      { 
          $conteudo = "Done";
      } 
      if ($statusid == "4")
      { 
          $conteudo = "Completed";
      } 
      if ($statusid == "5")
      { 
          $conteudo = "Cancel";
      } 
      if (!empty($conteudo)) 
      { 
          $statusid = $conteudo; 
      } 
   }  
}
?>
