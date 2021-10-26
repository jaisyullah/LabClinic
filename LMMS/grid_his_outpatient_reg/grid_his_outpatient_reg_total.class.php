<?php

class grid_his_outpatient_reg_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("en_us");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_his_outpatient_reg']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_his_outpatient_reg']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->regdate = $Busca_temp['regdate']; 
          $tmp_pos = strpos($this->regdate, "##@@");
          if ($tmp_pos !== false && !is_array($this->regdate))
          {
              $this->regdate = substr($this->regdate, 0, $tmp_pos);
          }
          $regdate_2 = $Busca_temp['regdate_input_2']; 
          $this->regdate_2 = $Busca_temp['regdate_input_2']; 
          $this->servicedate = $Busca_temp['servicedate']; 
          $tmp_pos = strpos($this->servicedate, "##@@");
          if ($tmp_pos !== false && !is_array($this->servicedate))
          {
              $this->servicedate = substr($this->servicedate, 0, $tmp_pos);
          }
          $servicedate_2 = $Busca_temp['servicedate_input_2']; 
          $this->servicedate_2 = $Busca_temp['servicedate_input_2']; 
          $this->finishdate = $Busca_temp['finishdate']; 
          $tmp_pos = strpos($this->finishdate, "##@@");
          if ($tmp_pos !== false && !is_array($this->finishdate))
          {
              $this->finishdate = substr($this->finishdate, 0, $tmp_pos);
          }
          $finishdate_2 = $Busca_temp['finishdate_input_2']; 
          $this->finishdate_2 = $Busca_temp['finishdate_input_2']; 
          $this->doctorid = $Busca_temp['doctorid']; 
          $tmp_pos = strpos($this->doctorid, "##@@");
          if ($tmp_pos !== false && !is_array($this->doctorid))
          {
              $this->doctorid = substr($this->doctorid, 0, $tmp_pos);
          }
          $this->paymentid = $Busca_temp['paymentid']; 
          $tmp_pos = strpos($this->paymentid, "##@@");
          if ($tmp_pos !== false && !is_array($this->paymentid))
          {
              $this->paymentid = substr($this->paymentid, 0, $tmp_pos);
          }
          $this->statusid = $Busca_temp['statusid']; 
          $tmp_pos = strpos($this->statusid, "##@@");
          if ($tmp_pos !== false && !is_array($this->statusid))
          {
              $this->statusid = substr($this->statusid, 0, $tmp_pos);
          }
          $this->institutionid = $Busca_temp['institutionid']; 
          $tmp_pos = strpos($this->institutionid, "##@@");
          if ($tmp_pos !== false && !is_array($this->institutionid))
          {
              $this->institutionid = substr($this->institutionid, 0, $tmp_pos);
          }
          $this->staffid = $Busca_temp['staffid']; 
          $tmp_pos = strpos($this->staffid, "##@@");
          if ($tmp_pos !== false && !is_array($this->staffid))
          {
              $this->staffid = substr($this->staffid, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang , $doctorid, $paymentid, $staffid;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['contr_total_geral'] = "OK";
   } 

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
