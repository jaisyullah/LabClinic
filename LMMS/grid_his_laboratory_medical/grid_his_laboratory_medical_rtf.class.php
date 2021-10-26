<?php

class grid_his_laboratory_medical_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("en_us");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_grid_his_laboratory_medical($cadapar[1]);
                   nm_protect_num_grid_his_laboratory_medical($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_his_laboratory_medical']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_his_laboratory_medical_total.class.php"); 
      $this->Tot      = new grid_his_laboratory_medical_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_his_laboratory_medical']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_his_laboratory_medical";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_his_laboratory_medical.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_his_laboratory_medical']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_his_laboratory_medical']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_his_laboratory_medical']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->trandate = $Busca_temp['trandate']; 
          $tmp_pos = strpos($this->trandate, "##@@");
          if ($tmp_pos !== false && !is_array($this->trandate))
          {
              $this->trandate = substr($this->trandate, 0, $tmp_pos);
          }
          $this->trandate_2 = $Busca_temp['trandate_input_2']; 
          $this->confirmdate = $Busca_temp['confirmdate']; 
          $tmp_pos = strpos($this->confirmdate, "##@@");
          if ($tmp_pos !== false && !is_array($this->confirmdate))
          {
              $this->confirmdate = substr($this->confirmdate, 0, $tmp_pos);
          }
          $this->confirmdate_2 = $Busca_temp['confirmdate_input_2']; 
          $this->finishdate = $Busca_temp['finishdate']; 
          $tmp_pos = strpos($this->finishdate, "##@@");
          if ($tmp_pos !== false && !is_array($this->finishdate))
          {
              $this->finishdate = substr($this->finishdate, 0, $tmp_pos);
          }
          $this->finishdate_2 = $Busca_temp['finishdate_input_2']; 
          $this->icdid = $Busca_temp['icdid']; 
          $tmp_pos = strpos($this->icdid, "##@@");
          if ($tmp_pos !== false && !is_array($this->icdid))
          {
              $this->icdid = substr($this->icdid, 0, $tmp_pos);
          }
          $this->staffid = $Busca_temp['staffid']; 
          $tmp_pos = strpos($this->staffid, "##@@");
          if ($tmp_pos !== false && !is_array($this->staffid))
          {
              $this->staffid = substr($this->staffid, 0, $tmp_pos);
          }
          $this->statusid = $Busca_temp['statusid']; 
          $tmp_pos = strpos($this->statusid, "##@@");
          if ($tmp_pos !== false && !is_array($this->statusid))
          {
              $this->statusid = substr($this->statusid, 0, $tmp_pos);
          }
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Transaction Code"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Transaction Date"; 
          if ($Cada_col == "trandate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['patientid'])) ? $this->New_label['patientid'] : "Patient No"; 
          if ($Cada_col == "patientid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['patientname'])) ? $this->New_label['patientname'] : "Patient Name"; 
          if ($Cada_col == "patientname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['birthdate'])) ? $this->New_label['birthdate'] : "Birth Date"; 
          if ($Cada_col == "birthdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['icdid'])) ? $this->New_label['icdid'] : "ICD-10"; 
          if ($Cada_col == "icdid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['confirmdate'])) ? $this->New_label['confirmdate'] : "Confirm Date"; 
          if ($Cada_col == "confirmdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['finishdate'])) ? $this->New_label['finishdate'] : "Finish Date"; 
          if ($Cada_col == "finishdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['staffid'])) ? $this->New_label['staffid'] : "Staff Input"; 
          if ($Cada_col == "staffid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['regcode'])) ? $this->New_label['regcode'] : "Registration Code"; 
          if ($Cada_col == "regcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['statusid'])) ? $this->New_label['statusid'] : "Status"; 
          if ($Cada_col == "statusid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, str_replace (convert(char(10),a.tranDate,102), '.', '-') + ' ' + convert(char(8),a.tranDate,20) as trandate, a.patientID as patientid, b.name as patientname, str_replace (convert(char(10),a.birthDate,102), '.', '-') + ' ' + convert(char(8),a.birthDate,20) as birthdate, a.icdID as icdid, str_replace (convert(char(10),a.confirmDate,102), '.', '-') + ' ' + convert(char(8),a.confirmDate,20) as confirmdate, str_replace (convert(char(10),a.finishDate,102), '.', '-') + ' ' + convert(char(8),a.finishDate,20) as finishdate, a.staffID as staffid, a.regCode as regcode, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, a.tranDate as trandate, a.patientID as patientid, b.name as patientname, a.birthDate as birthdate, a.icdID as icdid, a.confirmDate as confirmdate, a.finishDate as finishdate, a.staffID as staffid, a.regCode as regcode, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT a.tranCode as trancode, convert(char(23),a.tranDate,121) as trandate, a.patientID as patientid, b.name as patientname, convert(char(23),a.birthDate,121) as birthdate, a.icdID as icdid, convert(char(23),a.confirmDate,121) as confirmdate, convert(char(23),a.finishDate,121) as finishdate, a.staffID as staffid, a.regCode as regcode, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, a.tranDate as trandate, a.patientID as patientid, b.name as patientname, a.birthDate as birthdate, a.icdID as icdid, a.confirmDate as confirmdate, a.finishDate as finishdate, a.staffID as staffid, a.regCode as regcode, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, EXTEND(a.tranDate, YEAR TO FRACTION) as trandate, a.patientID as patientid, b.name as patientname, EXTEND(a.birthDate, YEAR TO FRACTION) as birthdate, a.icdID as icdid, EXTEND(a.confirmDate, YEAR TO FRACTION) as confirmdate, EXTEND(a.finishDate, YEAR TO FRACTION) as finishdate, a.staffID as staffid, a.regCode as regcode, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, a.tranDate as trandate, a.patientID as patientid, b.name as patientname, a.birthDate as birthdate, a.icdID as icdid, a.confirmDate as confirmdate, a.finishDate as finishdate, a.staffID as staffid, a.regCode as regcode, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->trancode = $rs->fields[0] ;  
         $this->trandate = $rs->fields[1] ;  
         $this->patientid = $rs->fields[2] ;  
         $this->patientname = $rs->fields[3] ;  
         $this->birthdate = $rs->fields[4] ;  
         $this->icdid = $rs->fields[5] ;  
         $this->confirmdate = $rs->fields[6] ;  
         $this->finishdate = $rs->fields[7] ;  
         $this->staffid = $rs->fields[8] ;  
         $this->staffid = (string)$this->staffid;
         $this->regcode = $rs->fields[9] ;  
         $this->statusid = $rs->fields[10] ;  
         $this->statusid = (string)$this->statusid;
         $this->id = $rs->fields[11] ;  
         $this->id = (string)$this->id;
         //----- lookup - staffid
         $this->look_staffid = $this->staffid; 
         $this->Lookup->lookup_staffid($this->look_staffid, $this->staffid) ; 
         $this->look_staffid = ($this->look_staffid == "&nbsp;") ? "" : $this->look_staffid; 
         //----- lookup - statusid
         $this->look_statusid = $this->statusid; 
         $this->Lookup->lookup_statusid($this->look_statusid); 
         $this->look_statusid = ($this->look_statusid == "&nbsp;") ? "" : $this->look_statusid; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- trancode
   function NM_export_trancode()
   {
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->trancode = strip_tags($this->trancode);
         $this->trancode = NM_charset_to_utf8($this->trancode);
         $this->trancode = str_replace('<', '&lt;', $this->trancode);
         $this->trancode = str_replace('>', '&gt;', $this->trancode);
         $this->Texto_tag .= "<td>" . $this->trancode . "</td>\r\n";
   }
   //----- trandate
   function NM_export_trandate()
   {
             if (substr($this->trandate, 10, 1) == "-") 
             { 
                 $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
             } 
             if (substr($this->trandate, 13, 1) == ".") 
             { 
                $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
             } 
             $conteudo_x =  $this->trandate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->trandate, "YYYY-MM-DD HH:II:SS  ");
                 $this->trandate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->trandate = NM_charset_to_utf8($this->trandate);
         $this->trandate = str_replace('<', '&lt;', $this->trandate);
         $this->trandate = str_replace('>', '&gt;', $this->trandate);
         $this->Texto_tag .= "<td>" . $this->trandate . "</td>\r\n";
   }
   //----- patientid
   function NM_export_patientid()
   {
         $this->patientid = html_entity_decode($this->patientid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->patientid = strip_tags($this->patientid);
         $this->patientid = NM_charset_to_utf8($this->patientid);
         $this->patientid = str_replace('<', '&lt;', $this->patientid);
         $this->patientid = str_replace('>', '&gt;', $this->patientid);
         $this->Texto_tag .= "<td>" . $this->patientid . "</td>\r\n";
   }
   //----- patientname
   function NM_export_patientname()
   {
         $this->patientname = html_entity_decode($this->patientname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->patientname = strip_tags($this->patientname);
         $this->patientname = NM_charset_to_utf8($this->patientname);
         $this->patientname = str_replace('<', '&lt;', $this->patientname);
         $this->patientname = str_replace('>', '&gt;', $this->patientname);
         $this->Texto_tag .= "<td>" . $this->patientname . "</td>\r\n";
   }
   //----- birthdate
   function NM_export_birthdate()
   {
             $conteudo_x =  $this->birthdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->birthdate, "YYYY-MM-DD  ");
                 $this->birthdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->birthdate = NM_charset_to_utf8($this->birthdate);
         $this->birthdate = str_replace('<', '&lt;', $this->birthdate);
         $this->birthdate = str_replace('>', '&gt;', $this->birthdate);
         $this->Texto_tag .= "<td>" . $this->birthdate . "</td>\r\n";
   }
   //----- icdid
   function NM_export_icdid()
   {
         $this->icdid = html_entity_decode($this->icdid, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->icdid = strip_tags($this->icdid);
         $this->icdid = NM_charset_to_utf8($this->icdid);
         $this->icdid = str_replace('<', '&lt;', $this->icdid);
         $this->icdid = str_replace('>', '&gt;', $this->icdid);
         $this->Texto_tag .= "<td>" . $this->icdid . "</td>\r\n";
   }
   //----- confirmdate
   function NM_export_confirmdate()
   {
             if (substr($this->confirmdate, 10, 1) == "-") 
             { 
                 $this->confirmdate = substr($this->confirmdate, 0, 10) . " " . substr($this->confirmdate, 11);
             } 
             if (substr($this->confirmdate, 13, 1) == ".") 
             { 
                $this->confirmdate = substr($this->confirmdate, 0, 13) . ":" . substr($this->confirmdate, 14, 2) . ":" . substr($this->confirmdate, 17);
             } 
             $conteudo_x =  $this->confirmdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->confirmdate, "YYYY-MM-DD HH:II:SS  ");
                 $this->confirmdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->confirmdate = NM_charset_to_utf8($this->confirmdate);
         $this->confirmdate = str_replace('<', '&lt;', $this->confirmdate);
         $this->confirmdate = str_replace('>', '&gt;', $this->confirmdate);
         $this->Texto_tag .= "<td>" . $this->confirmdate . "</td>\r\n";
   }
   //----- finishdate
   function NM_export_finishdate()
   {
             if (substr($this->finishdate, 10, 1) == "-") 
             { 
                 $this->finishdate = substr($this->finishdate, 0, 10) . " " . substr($this->finishdate, 11);
             } 
             if (substr($this->finishdate, 13, 1) == ".") 
             { 
                $this->finishdate = substr($this->finishdate, 0, 13) . ":" . substr($this->finishdate, 14, 2) . ":" . substr($this->finishdate, 17);
             } 
             $conteudo_x =  $this->finishdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->finishdate, "YYYY-MM-DD HH:II:SS  ");
                 $this->finishdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         $this->finishdate = NM_charset_to_utf8($this->finishdate);
         $this->finishdate = str_replace('<', '&lt;', $this->finishdate);
         $this->finishdate = str_replace('>', '&gt;', $this->finishdate);
         $this->Texto_tag .= "<td>" . $this->finishdate . "</td>\r\n";
   }
   //----- staffid
   function NM_export_staffid()
   {
         nmgp_Form_Num_Val($this->look_staffid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_staffid = NM_charset_to_utf8($this->look_staffid);
         $this->look_staffid = str_replace('<', '&lt;', $this->look_staffid);
         $this->look_staffid = str_replace('>', '&gt;', $this->look_staffid);
         $this->Texto_tag .= "<td>" . $this->look_staffid . "</td>\r\n";
   }
   //----- regcode
   function NM_export_regcode()
   {
         $this->regcode = html_entity_decode($this->regcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->regcode = strip_tags($this->regcode);
         $this->regcode = NM_charset_to_utf8($this->regcode);
         $this->regcode = str_replace('<', '&lt;', $this->regcode);
         $this->regcode = str_replace('>', '&gt;', $this->regcode);
         $this->Texto_tag .= "<td>" . $this->regcode . "</td>\r\n";
   }
   //----- statusid
   function NM_export_statusid()
   {
         $this->look_statusid = NM_charset_to_utf8($this->look_statusid);
         $this->look_statusid = str_replace('<', '&lt;', $this->look_statusid);
         $this->look_statusid = str_replace('>', '&gt;', $this->look_statusid);
         $this->Texto_tag .= "<td>" . $this->look_statusid . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_laboratory_medical'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> laboratory_medical :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_his_laboratory_medical_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_his_laboratory_medical"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
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
