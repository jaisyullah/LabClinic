<?php

class grid_his_outpatient_reg_rtf
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
                   nm_limpa_str_grid_his_outpatient_reg($cadapar[1]);
                   nm_protect_num_grid_his_outpatient_reg($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['grid_his_outpatient_reg']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_his_outpatient_reg_total.class.php"); 
      $this->Tot      = new grid_his_outpatient_reg_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_his_outpatient_reg']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_his_outpatient_reg";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_his_outpatient_reg.rtf";
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
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_his_outpatient_reg']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_his_outpatient_reg']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_his_outpatient_reg']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']))
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
          $this->regdate_2 = $Busca_temp['regdate_input_2']; 
          $this->servicedate = $Busca_temp['servicedate']; 
          $tmp_pos = strpos($this->servicedate, "##@@");
          if ($tmp_pos !== false && !is_array($this->servicedate))
          {
              $this->servicedate = substr($this->servicedate, 0, $tmp_pos);
          }
          $this->servicedate_2 = $Busca_temp['servicedate_input_2']; 
          $this->finishdate = $Busca_temp['finishdate']; 
          $tmp_pos = strpos($this->finishdate, "##@@");
          if ($tmp_pos !== false && !is_array($this->finishdate))
          {
              $this->finishdate = substr($this->finishdate, 0, $tmp_pos);
          }
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Transaction Code"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['deptid'])) ? $this->New_label['deptid'] : "Clinic"; 
          if ($Cada_col == "deptid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['doctorid'])) ? $this->New_label['doctorid'] : "Doctor"; 
          if ($Cada_col == "doctorid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['regdate'])) ? $this->New_label['regdate'] : "Register Date"; 
          if ($Cada_col == "regdate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['regtime'])) ? $this->New_label['regtime'] : "Register Time"; 
          if ($Cada_col == "regtime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['queueno'])) ? $this->New_label['queueno'] : "Queue No"; 
          if ($Cada_col == "queueno" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['paymentid'])) ? $this->New_label['paymentid'] : "Payment"; 
          if ($Cada_col == "paymentid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['staffid'])) ? $this->New_label['staffid'] : "Staff"; 
          if ($Cada_col == "staffid" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT a.tranCode as trancode, a.patientID as patientid, b.name as patientname, a.deptID as deptid, a.doctorID as doctorid, str_replace (convert(char(10),a.regDate,102), '.', '-') + ' ' + convert(char(8),a.regDate,20) as regdate, str_replace (convert(char(10),a.regTime,102), '.', '-') + ' ' + convert(char(8),a.regTime,20) as regtime, a.queueNo as queueno, a.paymentID as paymentid, a.staffID as staffid, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, a.patientID as patientid, b.name as patientname, a.deptID as deptid, a.doctorID as doctorid, a.regDate as regdate, a.regTime as regtime, a.queueNo as queueno, a.paymentID as paymentid, a.staffID as staffid, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT a.tranCode as trancode, a.patientID as patientid, b.name as patientname, a.deptID as deptid, a.doctorID as doctorid, convert(char(23),a.regDate,121) as regdate, convert(char(23),a.regTime,121) as regtime, a.queueNo as queueno, a.paymentID as paymentid, a.staffID as staffid, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, a.patientID as patientid, b.name as patientname, a.deptID as deptid, a.doctorID as doctorid, a.regDate as regdate, a.regTime as regtime, a.queueNo as queueno, a.paymentID as paymentid, a.staffID as staffid, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, a.patientID as patientid, b.name as patientname, a.deptID as deptid, a.doctorID as doctorid, EXTEND(a.regDate, YEAR TO DAY) as regdate, a.regTime as regtime, a.queueNo as queueno, a.paymentID as paymentid, a.staffID as staffid, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT a.tranCode as trancode, a.patientID as patientid, b.name as patientname, a.deptID as deptid, a.doctorID as doctorid, a.regDate as regdate, a.regTime as regtime, a.queueNo as queueno, a.paymentID as paymentid, a.staffID as staffid, a.statusID as statusid, a.ID as id from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['order_grid'];
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
         $this->patientid = $rs->fields[1] ;  
         $this->patientname = $rs->fields[2] ;  
         $this->deptid = $rs->fields[3] ;  
         $this->deptid = (string)$this->deptid;
         $this->doctorid = $rs->fields[4] ;  
         $this->doctorid = (string)$this->doctorid;
         $this->regdate = $rs->fields[5] ;  
         $this->regtime = $rs->fields[6] ;  
         $this->queueno = $rs->fields[7] ;  
         $this->paymentid = $rs->fields[8] ;  
         $this->paymentid = (string)$this->paymentid;
         $this->staffid = $rs->fields[9] ;  
         $this->staffid = (string)$this->staffid;
         $this->statusid = $rs->fields[10] ;  
         $this->statusid = (string)$this->statusid;
         $this->id = $rs->fields[11] ;  
         $this->id = (string)$this->id;
         //----- lookup - deptid
         $this->look_deptid = $this->deptid; 
         $this->Lookup->lookup_deptid($this->look_deptid); 
         $this->look_deptid = ($this->look_deptid == "&nbsp;") ? "" : $this->look_deptid; 
         //----- lookup - doctorid
         $this->look_doctorid = $this->doctorid; 
         $this->Lookup->lookup_doctorid($this->look_doctorid, $this->doctorid) ; 
         $this->look_doctorid = ($this->look_doctorid == "&nbsp;") ? "" : $this->look_doctorid; 
         //----- lookup - paymentid
         $this->look_paymentid = $this->paymentid; 
         $this->Lookup->lookup_paymentid($this->look_paymentid, $this->paymentid) ; 
         $this->look_paymentid = ($this->look_paymentid == "&nbsp;") ? "" : $this->look_paymentid; 
         //----- lookup - staffid
         $this->look_staffid = $this->staffid; 
         $this->Lookup->lookup_staffid($this->look_staffid, $this->staffid) ; 
         $this->look_staffid = ($this->look_staffid == "&nbsp;") ? "" : $this->look_staffid; 
         //----- lookup - statusid
         $this->look_statusid = $this->statusid; 
         $this->Lookup->lookup_statusid($this->look_statusid); 
         $this->look_statusid = ($this->look_statusid == "&nbsp;") ? "" : $this->look_statusid; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['export_sel_columns']['usr_cmp_sel']);
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
   //----- deptid
   function NM_export_deptid()
   {
         $this->look_deptid = NM_charset_to_utf8($this->look_deptid);
         $this->look_deptid = str_replace('<', '&lt;', $this->look_deptid);
         $this->look_deptid = str_replace('>', '&gt;', $this->look_deptid);
         $this->Texto_tag .= "<td>" . $this->look_deptid . "</td>\r\n";
   }
   //----- doctorid
   function NM_export_doctorid()
   {
         nmgp_Form_Num_Val($this->look_doctorid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_doctorid = NM_charset_to_utf8($this->look_doctorid);
         $this->look_doctorid = str_replace('<', '&lt;', $this->look_doctorid);
         $this->look_doctorid = str_replace('>', '&gt;', $this->look_doctorid);
         $this->Texto_tag .= "<td>" . $this->look_doctorid . "</td>\r\n";
   }
   //----- regdate
   function NM_export_regdate()
   {
             $conteudo_x =  $this->regdate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->regdate, "YYYY-MM-DD  ");
                 $this->regdate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->regdate = NM_charset_to_utf8($this->regdate);
         $this->regdate = str_replace('<', '&lt;', $this->regdate);
         $this->regdate = str_replace('>', '&gt;', $this->regdate);
         $this->Texto_tag .= "<td>" . $this->regdate . "</td>\r\n";
   }
   //----- regtime
   function NM_export_regtime()
   {
             $conteudo_x =  $this->regtime;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->regtime, "HH:II:SS  ");
                 $this->regtime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->regtime = NM_charset_to_utf8($this->regtime);
         $this->regtime = str_replace('<', '&lt;', $this->regtime);
         $this->regtime = str_replace('>', '&gt;', $this->regtime);
         $this->Texto_tag .= "<td>" . $this->regtime . "</td>\r\n";
   }
   //----- queueno
   function NM_export_queueno()
   {
         $this->queueno = html_entity_decode($this->queueno, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->queueno = strip_tags($this->queueno);
         $this->queueno = NM_charset_to_utf8($this->queueno);
         $this->queueno = str_replace('<', '&lt;', $this->queueno);
         $this->queueno = str_replace('>', '&gt;', $this->queueno);
         $this->Texto_tag .= "<td>" . $this->queueno . "</td>\r\n";
   }
   //----- paymentid
   function NM_export_paymentid()
   {
         nmgp_Form_Num_Val($this->look_paymentid, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->look_paymentid = NM_charset_to_utf8($this->look_paymentid);
         $this->look_paymentid = str_replace('<', '&lt;', $this->look_paymentid);
         $this->look_paymentid = str_replace('>', '&gt;', $this->look_paymentid);
         $this->Texto_tag .= "<td>" . $this->look_paymentid . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> outpatient register :: RTF</TITLE>
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
<form name="Fdown" method="get" action="grid_his_outpatient_reg_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_his_outpatient_reg"> 
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
