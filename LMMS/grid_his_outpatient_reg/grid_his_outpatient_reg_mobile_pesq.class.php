<?php

class grid_his_outpatient_reg_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $NM_ajax_opcao;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();

   /**
    * @access  public
    */
   function __construct()
   {
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      $this->Ini->str_google_fonts = (isset($str_google_fonts) && !empty($str_google_fonts))?$str_google_fonts:'';
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      $this->NM_case_insensitive = false;
      $this->init();
      if ($this->NM_ajax_flag)
      {
          ob_start();
          $this->Arr_result = array();
          $this->processa_ajax();
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          if ($this->Db)
          {
              $this->Db->Close(); 
          }
          exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
      global $bprocessa;
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_api.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("en_us");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['opcao'] = "igual";
    if (!$this->NM_ajax_flag && (!isset($bprocessa) || $bprocessa != "pesq"))
    {
      $_SESSION['scriptcase']['grid_his_outpatient_reg']['contr_erro'] = 'on';
 $this->nmgp_botoes["exit"] = "off";;
$_SESSION['scriptcase']['grid_his_outpatient_reg']['contr_erro'] = 'off'; 
      if (isset($regdate_day))
      {
          $regdate_dia = $regdate_day; 
      }
      if (isset($regdate_month))
      {
          $regdate_mes = $regdate_month; 
      }
      if (isset($regdate_year))
      {
          $regdate_ano = $regdate_year; 
      }
      if (isset($regdate))
      {
          $regdate = str_replace("0000", "", $regdate);
          $regdate = str_replace("-00", "-", $regdate);
          $regdateXX = explode("-", $regdate);
          if (isset($regdateXX[2]))
          {
              $regdate_dia = $regdateXX[2]; 
          }
          if (isset($regdateXX[1]))
          {
              $regdate_mes = $regdateXX[1]; 
          }
          if (isset($regdateXX[0]))
          {
              $regdate_ano = $regdateXX[0]; 
          }
      }
      if (isset($regdate_input_2_day))
      {
          $regdate_input_2_dia = $regdate_input_2_day; 
      }
      if (isset($regdate_input_2_month))
      {
          $regdate_input_2_mes = $regdate_input_2_month; 
      }
      if (isset($regdate_input_2_year))
      {
          $regdate_input_2_ano = $regdate_input_2_year; 
      }
      if (isset($regdate_2))
      {
          $regdate_2 = str_replace("0000", "", $regdate_2);
          $regdate_2 = str_replace("-00", "-", $regdate_2);
          $regdateXX = explode("-", $regdate_2);
          if (isset($regdateXX[2]))
          {
              $regdate_input_2_dia = $regdateXX[2]; 
          }
          if (isset($regdateXX[1]))
          {
              $regdate_input_2_mes = $regdateXX[1]; 
          }
          if (isset($regdateXX[0]))
          {
              $regdate_input_2_ano = $regdateXX[0]; 
          }
      }
      if (isset($servicedate_day))
      {
          $servicedate_dia = $servicedate_day; 
      }
      if (isset($servicedate_month))
      {
          $servicedate_mes = $servicedate_month; 
      }
      if (isset($servicedate_year))
      {
          $servicedate_ano = $servicedate_year; 
      }
      if (isset($servicedate))
      {
          $servicedate = str_replace("0000", "", $servicedate);
          $servicedate = str_replace("-00", "-", $servicedate);
          $servicedateXX = explode("-", $servicedate);
          if (isset($servicedateXX[2]))
          {
              $servicedate_dia = $servicedateXX[2]; 
          }
          if (isset($servicedateXX[1]))
          {
              $servicedate_mes = $servicedateXX[1]; 
          }
          if (isset($servicedateXX[0]))
          {
              $servicedate_ano = $servicedateXX[0]; 
          }
      }
      if (isset($servicedate_input_2_day))
      {
          $servicedate_input_2_dia = $servicedate_input_2_day; 
      }
      if (isset($servicedate_input_2_month))
      {
          $servicedate_input_2_mes = $servicedate_input_2_month; 
      }
      if (isset($servicedate_input_2_year))
      {
          $servicedate_input_2_ano = $servicedate_input_2_year; 
      }
      if (isset($servicedate_2))
      {
          $servicedate_2 = str_replace("0000", "", $servicedate_2);
          $servicedate_2 = str_replace("-00", "-", $servicedate_2);
          $servicedateXX = explode("-", $servicedate_2);
          if (isset($servicedateXX[2]))
          {
              $servicedate_input_2_dia = $servicedateXX[2]; 
          }
          if (isset($servicedateXX[1]))
          {
              $servicedate_input_2_mes = $servicedateXX[1]; 
          }
          if (isset($servicedateXX[0]))
          {
              $servicedate_input_2_ano = $servicedateXX[0]; 
          }
      }
      if (isset($finishdate_day))
      {
          $finishdate_dia = $finishdate_day; 
      }
      if (isset($finishdate_month))
      {
          $finishdate_mes = $finishdate_month; 
      }
      if (isset($finishdate_year))
      {
          $finishdate_ano = $finishdate_year; 
      }
      if (isset($finishdate))
      {
          $finishdate = str_replace("0000", "", $finishdate);
          $finishdate = str_replace("-00", "-", $finishdate);
          $finishdateXX = explode("-", $finishdate);
          if (isset($finishdateXX[2]))
          {
              $finishdate_dia = $finishdateXX[2]; 
          }
          if (isset($finishdateXX[1]))
          {
              $finishdate_mes = $finishdateXX[1]; 
          }
          if (isset($finishdateXX[0]))
          {
              $finishdate_ano = $finishdateXX[0]; 
          }
      }
      if (isset($finishdate_input_2_day))
      {
          $finishdate_input_2_dia = $finishdate_input_2_day; 
      }
      if (isset($finishdate_input_2_month))
      {
          $finishdate_input_2_mes = $finishdate_input_2_month; 
      }
      if (isset($finishdate_input_2_year))
      {
          $finishdate_input_2_ano = $finishdate_input_2_year; 
      }
      if (isset($finishdate_2))
      {
          $finishdate_2 = str_replace("0000", "", $finishdate_2);
          $finishdate_2 = str_replace("-00", "-", $finishdate_2);
          $finishdateXX = explode("-", $finishdate_2);
          if (isset($finishdateXX[2]))
          {
              $finishdate_input_2_dia = $finishdateXX[2]; 
          }
          if (isset($finishdateXX[1]))
          {
              $finishdate_input_2_mes = $finishdateXX[1]; 
          }
          if (isset($finishdateXX[0]))
          {
              $finishdate_input_2_ano = $finishdateXX[0]; 
          }
      }
    }
   }

   function processa_ajax()
   {
      global $NM_filters, $NM_filters_del, $nmgp_save_name, $nmgp_save_option, $NM_fields_refresh, $NM_parms_refresh, $Campo_bi, $Opc_bi, $NM_operador, $nmgp_save_origem;
//-- ajax metodos ---
      if ($this->NM_ajax_opcao == "ajax_filter_save")
      {
          ob_end_clean();
          ob_end_clean();
          $this->salva_filtro($nmgp_save_origem);
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" . grid_his_outpatient_reg_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_his_outpatient_reg_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_his_outpatient_reg_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot');\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }

      if ($this->NM_ajax_opcao == "ajax_filter_delete")
      {
          ob_end_clean();
          ob_end_clean();
          $this->apaga_filtro();
          $this->NM_fil_ant = $this->gera_array_filtros();
          $Nome_filter = "";
          $Opt_filter  = "<option value=\"\"></option>\r\n";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              if ($_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Tipo_filter[1] = sc_convert_encoding($Tipo_filter[1], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter  = $Tipo_filter[1];
                  $Opt_filter .= "<option value=\"\">" .  grid_his_outpatient_reg_pack_protect_string($Nome_filter) . "</option>\r\n";
              }
              $Opt_filter .= "<option value=\"" . grid_his_outpatient_reg_pack_protect_string($Tipo_filter[0]) . "\">.." . grid_his_outpatient_reg_pack_protect_string($Cada_filter) .  "</option>\r\n";
          }
          $Ajax_select  = "<SELECT id=\"sel_recup_filters_bot\" class=\"scFilterToolbar_obj\" style=\"display:". (count($this->NM_fil_ant)>0?'':'none') .";\" name=\"NM_filters_bot\" onChange=\"nm_submit_filter(this, 'bot');\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_bot", 'value' => $Ajax_select);
          $Ajax_select = "<SELECT id=\"sel_filters_del_bot\" class=\"scFilterToolbar_obj\" name=\"NM_filters_del_bot\" size=\"1\">\r\n";
          $Ajax_select .= $Opt_filter;
          $Ajax_select .= "</SELECT>\r\n";
          $this->Arr_result['setValue'][] = array('field' => "idAjaxSelect_NM_filters_del_bot", 'value' => $Ajax_select);
      }
      if ($this->NM_ajax_opcao == "ajax_filter_select")
      {
          ob_end_clean();
          ob_end_clean();
          $this->Arr_result = $this->recupera_filtro($NM_filters);
      }

   }

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where (";
         $this->comando_sum .= " and (";
         $this->comando_fim  = " ) ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $condicao   = strtoupper($condicao);
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $Nm_numeric = array();
      $nm_esp_postgres = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_datas[] = "a.regTime";$Nm_datas[] = "a_regTime";$Nm_datas[] = "a.finishDate";$Nm_datas[] = "a_finishDate";$Nm_datas[] = "a.serviceDate";$Nm_datas[] = "a_serviceDate";$Nm_datas[] = "a.regDate";$Nm_datas[] = "a_regDate";$Nm_numeric[] = "a_deptid";$Nm_numeric[] = "a_doctorid";$Nm_numeric[] = "a_statusid";$Nm_numeric[] = "a_paymentid";$Nm_numeric[] = "a_staffid";$Nm_numeric[] = "a_institutionid";$Nm_numeric[] = "a_id";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
            if ($campo == "")
            {
               $campo = 0;
            }
            if ($campo2 == "")
            {
               $campo2 = 0;
            }
         }
      }
      $Nm_datas[] = "a.regTime";$Nm_datas[] = "a_regTime";$Nm_datas[] = "a.finishDate";$Nm_datas[] = "a_finishDate";$Nm_datas[] = "a.serviceDate";$Nm_datas[] = "a_serviceDate";$Nm_datas[] = "a.regDate";$Nm_datas[] = "a_regDate";
      if (in_array($campo_join, $Nm_datas))
      {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['SC_sep_date']))
          {
              $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['SC_sep_date'];
              $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['SC_sep_date1'];
          }
      }
      if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
      {
         return;
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
             {
                 return;
             }
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "outpatient_reg.$nome";
         if ($tp_campo == "TIMESTAMP")
         {
             $tp_campo = "DATETIME";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "TIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'hh24:mi:ss')";
             }
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS VARCHAR)";
             $nome_sum = "CAST ($nome_sum AS VARCHAR)";
         }
         if ($tp_campo == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(10),$nome,121)";
                 $nome_sum = "convert(char(10),$nome_sum,121)";
             }
         }
         if ($tp_campo == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "convert(char(19),$nome,121)";
                 $nome_sum = "convert(char(19),$nome_sum,121)";
             }
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !$this->Date_part)
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $nome_sum = "TO_DATE(TO_CHAR($nome_sum, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATETIME";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO FRACTION)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO FRACTION)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO DAY)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO DAY)";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS VARCHAR(255))";
             $nome_sum = "CAST ($nome_sum AS VARCHAR(255))";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
             }
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         switch ($condicao)
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
               {
                   $op_all       = " ilike ";
                   $nm_ini_lower = "";
                   $nm_fim_lower = "";
               }
               else
               {
                   $op_all = " like ";
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
             case "QP";     // 
             case "NP";     // 
                $concat = " " . $this->NM_operador . " ";
                if ($condicao == "QP")
                {
                    $op_all    = " #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                }
                else
                {
                    $op_all    = " not #sc_like_# ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                }
               $NM_cond    = "";
               $NM_cmd     = "";
               $NM_cmd_sum = "";
               if (substr($tp_campo, 0, 4) == "DATE" && $this->Date_part)
               {
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%Y', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('year' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('year' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(year, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(year, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "year (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "year (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "year(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "year(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%m', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('month' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('month' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(month, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(month, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "month (" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "month (" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "month(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "month(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%d', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('day' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('day' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(day, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(day, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "DAYOFMONTH(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "DAYOFMONTH(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "day(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "day(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                   }
               }
               if (strpos($tp_campo, "TIME") !== false && $this->Date_part)
               {
                   if ($this->NM_data_qp['hor'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%H', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%H', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('hour' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('hour' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(hour, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(hour, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['min'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%M', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%M', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('minute' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('minute' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(minute, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(minute, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['seg'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%S', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%S', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('second' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('second' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(second, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(second, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
                       {
                           if (trim($this->Operador_date_part) == "like" || trim($this->Operador_date_part) == "not like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       else
                       {
                           $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                   }
               }
               if ($this->Date_part)
               {
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
                   {
                       $op_all       = str_replace("#sc_like_#", "ilike", $op_all);
                       $nm_ini_lower = "";
                       $nm_fim_lower = "";
                   }
                   else
                   {
                       $op_all = str_replace("#sc_like_#", "like", $op_all);
                   }
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str  = "";
               $nm_cond   = "";
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                      }
                      $cond_str .= $nm_ini_lower . $nm_aspas . $nm_sc_valor . $nm_aspas1 . $nm_fim_lower;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
            break;
         }
      }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd, $tp_nd)
   {
       $fill_dt = false;
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && $tp != "ND")
       {
           if ($cond == "EP")
           {
               $cond = "NU";
           }
           if ($cond == "NE")
           {
               $cond = "NN";
           }
       }
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond != "II" && $cond != "QP" && $cond != "NP")
       {
           $fill_dt = true;
       }
       if ($fill_dt)
       {
           $val[0]['dia'] = (!empty($val[0]['dia']) && strlen($val[0]['dia']) == 1) ? "0" . $val[0]['dia'] : $val[0]['dia'];
           $val[0]['mes'] = (!empty($val[0]['mes']) && strlen($val[0]['mes']) == 1) ? "0" . $val[0]['mes'] : $val[0]['mes'];
           if ($tp == "DH")
           {
               $val[0]['hor'] = (!empty($val[0]['hor']) && strlen($val[0]['hor']) == 1) ? "0" . $val[0]['hor'] : $val[0]['hor'];
               $val[0]['min'] = (!empty($val[0]['min']) && strlen($val[0]['min']) == 1) ? "0" . $val[0]['min'] : $val[0]['min'];
               $val[0]['seg'] = (!empty($val[0]['seg']) && strlen($val[0]['seg']) == 1) ? "0" . $val[0]['seg'] : $val[0]['seg'];
           }
           if ($cond == "BW")
           {
               $val[1]['dia'] = (!empty($val[1]['dia']) && strlen($val[1]['dia']) == 1) ? "0" . $val[1]['dia'] : $val[1]['dia'];
               $val[1]['mes'] = (!empty($val[1]['mes']) && strlen($val[1]['mes']) == 1) ? "0" . $val[1]['mes'] : $val[1]['mes'];
               if ($tp == "DH")
               {
                   $val[1]['hor'] = (!empty($val[1]['hor']) && strlen($val[1]['hor']) == 1) ? "0" . $val[1]['hor'] : $val[1]['hor'];
                   $val[1]['min'] = (!empty($val[1]['min']) && strlen($val[1]['min']) == 1) ? "0" . $val[1]['min'] : $val[1]['min'];
                   $val[1]['seg'] = (!empty($val[1]['seg']) && strlen($val[1]['seg']) == 1) ? "0" . $val[1]['seg'] : $val[1]['seg'];
               }
           }
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", $this->NM_data_1['ano'], $out_dt1);
               $out_dt1 = str_replace("mm",   $this->NM_data_1['mes'], $out_dt1);
               $out_dt1 = str_replace("dd",   $this->NM_data_1['dia'], $out_dt1);
               $out_dt1 = str_replace("hh",   "", $out_dt1);
               $out_dt1 = str_replace("ii",   "", $out_dt1);
               $out_dt1 = str_replace("ss",   "", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", $this->NM_data_2['ano'], $out_dt2);
               $out_dt2 = str_replace("mm",   $this->NM_data_2['mes'], $out_dt2);
               $out_dt2 = str_replace("dd",   $this->NM_data_2['dia'], $out_dt2);
               $out_dt2 = str_replace("hh",   "", $out_dt2);
               $out_dt2 = str_replace("ii",   "", $out_dt2);
               $out_dt2 = str_replace("ss",   "", $out_dt2);
               $val[0] = $out_dt1;
               $val[1] = $out_dt2;
               return;
           }
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && $val[0]['ano'] != "") ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && $val[0]['mes'] != "") ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && $val[0]['dia'] != "") ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && $val[0]['hor'] != "") ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && $val[0]['min'] != "") ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && $val[0]['seg'] != "") ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (substr($tx, 0, 2) == "__" && ($x == "hor" || $x == "min" || $x == "seg"))
           {
               if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
           {
               $this->Ini_date_part = "'";
               $this->End_date_part = "'";
           }
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "./";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> outpatient register</TITLE>
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
</HEAD>
<BODY class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 document.form_ok.submit();
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
       header("X-XSS-Protection: 1; mode=block");
       header("X-Frame-Options: SAMEORIGIN");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> outpatient register</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput2.js"></script>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/select2/js/select2.full.min.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_his_outpatient_reg/grid_his_outpatient_reg_fil_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />
</HEAD>
<?php
$vertical_center = '';
?>
<BODY class="scFilterPage" style="<?php echo $vertical_center ?>">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
   <script type="text/javascript">
     var applicationKeys = '';
     applicationKeys += 'ctrl+k';
     applicationKeys += ',';
     applicationKeys += 'ctrl+enter';
     applicationKeys += ',';
     applicationKeys += 'ctrl+e';
     applicationKeys += ',';
     applicationKeys += 'f1';
     applicationKeys += ',';
     applicationKeys += 'alt+q';
     var hotkeyList = '';
     function execHotKey(e, h) {
         var hotkey_fired = false
         switch (true) {
             case (['ctrl+k'].indexOf(h.key) > -1):
                 hotkey_fired = process_hotkeys('sys_format_lim');
                 break;
             case (['ctrl+enter'].indexOf(h.key) > -1):
                 hotkey_fired = process_hotkeys('sys_format_fi2');
                 break;
             case (['ctrl+e'].indexOf(h.key) > -1):
                 hotkey_fired = process_hotkeys('sys_format_edi');
                 break;
             case (['f1'].indexOf(h.key) > -1):
                 hotkey_fired = process_hotkeys('sys_format_webh');
                 break;
             case (['alt+q'].indexOf(h.key) > -1):
                 hotkey_fired = process_hotkeys('sys_format_sai');
                 break;
         }
         if (hotkey_fired) {
             e.preventDefault();
             return false;
         } else {
             return true;
         }
     }
   </script>
   <script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
   <script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_close'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_tb_esc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']) ?>";
        </script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript" src="grid_his_outpatient_reg_ajax_search.js"></script>
 <script type="text/javascript" src="grid_his_outpatient_reg_ajax.js"></script>
 <script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
$Cod_Btn = nmButtonOutput($this->arr_buttons, "berrm_clse", "nmAjaxHideDebug()", "nmAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo $Cod_Btn ?>&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script type="text/javascript" src="grid_his_outpatient_reg_message.js"></script>
<link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_sweetalert.css" />
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_his_outpatient_reg']['glo_nm_path_prod']; ?>/third/sweetalert/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['scriptcase']['grid_his_outpatient_reg']['glo_nm_path_prod']; ?>/third/sweetalert/polyfill.min.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<?php
$confirmButtonClass = '';
$cancelButtonClass  = '';
$confirmButtonText  = $this->Ini->Nm_lang['lang_btns_cfrm'];
$cancelButtonText   = $this->Ini->Nm_lang['lang_btns_cncl'];
$confirmButtonFA    = '';
$cancelButtonFA     = '';
$confirmButtonFAPos = '';
$cancelButtonFAPos  = '';
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['style']) && '' != $this->arr_buttons['bsweetalert_ok']['style']) {
    $confirmButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_ok']['style'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['style']) && '' != $this->arr_buttons['bsweetalert_cancel']['style']) {
    $cancelButtonClass = 'scButton_' . $this->arr_buttons['bsweetalert_cancel']['style'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['value']) && '' != $this->arr_buttons['bsweetalert_ok']['value']) {
    $confirmButtonText = $this->arr_buttons['bsweetalert_ok']['value'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['value']) && '' != $this->arr_buttons['bsweetalert_cancel']['value']) {
    $cancelButtonText = $this->arr_buttons['bsweetalert_cancel']['value'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_ok']['fontawesomeicon']) {
    $confirmButtonFA = $this->arr_buttons['bsweetalert_ok']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) && '' != $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon']) {
    $cancelButtonFA = $this->arr_buttons['bsweetalert_cancel']['fontawesomeicon'];
}
if (isset($this->arr_buttons['bsweetalert_ok']) && isset($this->arr_buttons['bsweetalert_ok']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_ok']['display_position']) {
    $confirmButtonFAPos = 'text_right';
}
if (isset($this->arr_buttons['bsweetalert_cancel']) && isset($this->arr_buttons['bsweetalert_cancel']['display_position']) && 'img_right' != $this->arr_buttons['bsweetalert_cancel']['display_position']) {
    $cancelButtonFAPos = 'text_right';
}
?>
<script type="text/javascript">
  var scSweetAlertConfirmButton = "<?php echo $confirmButtonClass ?>";
  var scSweetAlertCancelButton = "<?php echo $cancelButtonClass ?>";
  var scSweetAlertConfirmButtonText = "<?php echo $confirmButtonText ?>";
  var scSweetAlertCancelButtonText = "<?php echo $cancelButtonText ?>";
  var scSweetAlertConfirmButtonFA = "<?php echo $confirmButtonFA ?>";
  var scSweetAlertCancelButtonFA = "<?php echo $cancelButtonFA ?>";
  var scSweetAlertConfirmButtonFAPos = "<?php echo $confirmButtonFAPos ?>";
  var scSweetAlertCancelButtonFAPos = "<?php echo $cancelButtonFAPos ?>";
</script>
<script type="text/javascript">
$(function() {
<?php
if (count($this->nm_mens_alert) || count($this->Ini->nm_mens_alert)) {
   if (isset($this->Ini->nm_mens_alert) && !empty($this->Ini->nm_mens_alert))
   {
       if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
       {
           $this->nm_mens_alert   = array_merge($this->Ini->nm_mens_alert, $this->nm_mens_alert);
           $this->nm_params_alert = array_merge($this->Ini->nm_params_alert, $this->nm_params_alert);
       }
       else
       {
           $this->nm_mens_alert   = $this->Ini->nm_mens_alert;
           $this->nm_params_alert = $this->Ini->nm_params_alert;
       }
   }
   if (isset($this->nm_mens_alert) && !empty($this->nm_mens_alert))
   {
       foreach ($this->nm_mens_alert as $i_alert => $mensagem)
       {
           $alertParams = array();
           if (isset($this->nm_params_alert[$i_alert]))
           {
               foreach ($this->nm_params_alert[$i_alert] as $paramName => $paramValue)
               {
                   if (in_array($paramName, array('title', 'timer', 'confirmButtonText', 'confirmButtonFA', 'confirmButtonFAPos', 'cancelButtonText', 'cancelButtonFA', 'cancelButtonFAPos', 'footer', 'width', 'padding')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif (in_array($paramName, array('showConfirmButton', 'showCancelButton', 'toast')) && in_array($paramValue, array(true, false)))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('position' == $paramName && in_array($paramValue, array('top', 'top-start', 'top-end', 'center', 'center-start', 'center-end', 'bottom', 'bottom-start', 'bottom-end')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('type' == $paramName && in_array($paramValue, array('warning', 'error', 'success', 'info', 'question')))
                   {
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
                   elseif ('background' == $paramName)
                   {
                       $image_param = $paramValue;
                       preg_match_all('/url\(([\s])?(["|\'])?(.*?)(["|\'])?([\s])?\)/i', $paramValue, $matches, PREG_PATTERN_ORDER);
                       if (isset($matches[3])) {
                           foreach ($matches[3] as $match) {
                               if ('http:' != substr($match, 0, 5) && 'https:' != substr($match, 0, 6) && '/' != substr($match, 0, 1)) {
                                   $image_param = str_replace($match, "{$this->Ini->path_img_global}/{$match}", $image_param);
                               }
                           }
                       }
                       $paramValue = $image_param;
                       $alertParams[$paramName] = NM_charset_to_utf8($paramValue);
                   }
               }
           }
           $jsonParams = json_encode($alertParams);
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['ajax_nav'])
           { 
               $this->Ini->Arr_result['AlertJS'][] = NM_charset_to_utf8($mensagem);
               $this->Ini->Arr_result['AlertJSParam'][] = $alertParams;
           } 
           else 
           { 
?>
       scJs_alert('<?php echo $mensagem ?>', <?php echo $jsonParams ?>);
<?php
           } 
       }
   }
}
?>
});
</script>
<?php
if ('' != $this->Campos_Mens_erro) {
?>
<script type="text/javascript">
$(function() {
	_nmAjaxShowMessage({title: "<?php echo $this->Ini->Nm_lang['lang_errm_errt']; ?>", message: "<?php echo $this->Campos_Mens_erro ?>", isModal: false, timeout: "", showButton: true, buttonLabel: "", topPos: "", leftPos: "", width: "", height: "", redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: false, isToast: false, toastPos: "", type: "error"});
});
</script>
<?php
}
?>
<script type="text/javascript" src="grid_his_outpatient_reg_message.js"></script>
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
        {
            $Lines = sc_convert_encoding($Lines, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
 if (NM_is_utf8($Lines) && $_SESSION['scriptcase']['charset'] != "UTF-8")
 {
    $Msg_Inval = sc_convert_encoding("Inv�lido", $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

function scJQCalendarAdd() {
  $("#sc_regdate_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_regdate_dia').value + '/';
          var_dt_ini += document.getElementById('SC_regdate_mes').value + '/';
          var_dt_ini += document.getElementById('SC_regdate_ano').value;
          document.getElementById('sc_regdate_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_regdate_dia').value = aParts[0];
          document.getElementById('SC_regdate_mes').value = aParts[1];
          document.getElementById('SC_regdate_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_regdate_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_regdate_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_regdate_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_regdate_input_2_ano').value;
          document.getElementById('sc_regdate_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_regdate_input_2_dia').value = aParts[0];
          document.getElementById('SC_regdate_input_2_mes').value = aParts[1];
          document.getElementById('SC_regdate_input_2_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_finishdate_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_finishdate_dia').value + '/';
          var_dt_ini += document.getElementById('SC_finishdate_mes').value + '/';
          var_dt_ini += document.getElementById('SC_finishdate_ano').value;
          document.getElementById('sc_finishdate_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_finishdate_dia').value = aParts[0];
          document.getElementById('SC_finishdate_mes').value = aParts[1];
          document.getElementById('SC_finishdate_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_finishdate_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_finishdate_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_finishdate_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_finishdate_input_2_ano').value;
          document.getElementById('sc_finishdate_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_finishdate_input_2_dia').value = aParts[0];
          document.getElementById('SC_finishdate_input_2_mes').value = aParts[1];
          document.getElementById('SC_finishdate_input_2_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_servicedate_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_servicedate_dia').value + '/';
          var_dt_ini += document.getElementById('SC_servicedate_mes').value + '/';
          var_dt_ini += document.getElementById('SC_servicedate_ano').value;
          document.getElementById('sc_servicedate_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_servicedate_dia').value = aParts[0];
          document.getElementById('SC_servicedate_mes').value = aParts[1];
          document.getElementById('SC_servicedate_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

  $("#sc_servicedate_jq2").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_servicedate_input_2_dia').value + '/';
          var_dt_ini += document.getElementById('SC_servicedate_input_2_mes').value + '/';
          var_dt_ini += document.getElementById('SC_servicedate_input_2_ano').value;
          document.getElementById('sc_servicedate_jq2').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_servicedate_input_2_dia').value = aParts[0];
          document.getElementById('SC_servicedate_input_2_mes').value = aParts[1];
          document.getElementById('SC_servicedate_input_2_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd

<?php
    $nm_all_bloks = array();
    $aBlocosVarJquery = array();
    $aBlocosVarJs = array();
    $nm_all_bloks[0] = "true";
    $nm_all_bloks[1] = "false";
    foreach ($nm_all_bloks as $cada_blk => $cada_tipo)
    {
       $aBlocosVarJquery[] = '#hidden_bloco_' . $cada_blk;
       $aBlocosVarJs[]     = '  "hidden_bloco_' . $cada_blk . '": ' . $cada_tipo;
    }
?>
   var sc_blockCol = '<?php echo $this->Block_img_col ?>';
   var sc_blockExp = '<?php echo $this->Block_img_exp ?>';

 $(function() {

   SC_carga_evt_jquery();
   scLoadScInput('input:text.sc-js-input');
   scJQCalendarAdd('');
   Sc_carga_select2('all');
  $("<?php echo implode(',', $aBlocosVarJquery) ?>").each(function () {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
  });

 });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones ?>/" + sc_blockExp;
 }

 var show_block = {
  <?php echo implode(', ', $aBlocosVarJs) ?>
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

 function nm_campos_between(nm_campo, nm_cond, nm_nome_obj)
 {
  if (nm_cond.value == "bw")
  {
   nm_campo.style.display = "";
  }
  else
  {
    if (nm_campo)
    {
      nm_campo.style.display = "none";
    }
  }
  if (document.getElementById('id_hide_' + nm_nome_obj))
  {
      if (nm_cond.value == "nu" || nm_cond.value == "nn" || nm_cond.value == "ep" || nm_cond.value == "ne")
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = 'none';
      }
      else
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = '';
      }
  }
 }
 function nm_save_form(pos)
 {
  if (pos == 'top' && document.F1.nmgp_save_name_top.value == '')
  {
      return;
  }
  if (pos == 'bot' && document.F1.nmgp_save_name_bot.value == '')
  {
      return;
  }
  if (pos == 'fields' && document.F1.nmgp_save_name_fields.value == '')
  {
      return;
  }
  var str_out = "";
  str_out += 'SC_regdate_cond#NMF#' + search_get_sel_txt('SC_regdate_cond') + '@NMF@';
  str_out += 'SC_regdate_dia#NMF#' + search_get_sel_txt('SC_regdate_dia') + '@NMF@';
  str_out += 'SC_regdate_mes#NMF#' + search_get_sel_txt('SC_regdate_mes') + '@NMF@';
  str_out += 'SC_regdate_ano#NMF#' + search_get_sel_txt('SC_regdate_ano') + '@NMF@';
  str_out += 'SC_regdate_input_2_dia#NMF#' + search_get_sel_txt('SC_regdate_input_2_dia') + '@NMF@';
  str_out += 'SC_regdate_input_2_mes#NMF#' + search_get_sel_txt('SC_regdate_input_2_mes') + '@NMF@';
  str_out += 'SC_regdate_input_2_ano#NMF#' + search_get_sel_txt('SC_regdate_input_2_ano') + '@NMF@';
  str_out += 'SC_servicedate_cond#NMF#' + search_get_sel_txt('SC_servicedate_cond') + '@NMF@';
  str_out += 'SC_servicedate_dia#NMF#' + search_get_sel_txt('SC_servicedate_dia') + '@NMF@';
  str_out += 'SC_servicedate_mes#NMF#' + search_get_sel_txt('SC_servicedate_mes') + '@NMF@';
  str_out += 'SC_servicedate_ano#NMF#' + search_get_sel_txt('SC_servicedate_ano') + '@NMF@';
  str_out += 'SC_servicedate_input_2_dia#NMF#' + search_get_sel_txt('SC_servicedate_input_2_dia') + '@NMF@';
  str_out += 'SC_servicedate_input_2_mes#NMF#' + search_get_sel_txt('SC_servicedate_input_2_mes') + '@NMF@';
  str_out += 'SC_servicedate_input_2_ano#NMF#' + search_get_sel_txt('SC_servicedate_input_2_ano') + '@NMF@';
  str_out += 'SC_finishdate_cond#NMF#' + search_get_sel_txt('SC_finishdate_cond') + '@NMF@';
  str_out += 'SC_finishdate_dia#NMF#' + search_get_sel_txt('SC_finishdate_dia') + '@NMF@';
  str_out += 'SC_finishdate_mes#NMF#' + search_get_sel_txt('SC_finishdate_mes') + '@NMF@';
  str_out += 'SC_finishdate_ano#NMF#' + search_get_sel_txt('SC_finishdate_ano') + '@NMF@';
  str_out += 'SC_finishdate_input_2_dia#NMF#' + search_get_sel_txt('SC_finishdate_input_2_dia') + '@NMF@';
  str_out += 'SC_finishdate_input_2_mes#NMF#' + search_get_sel_txt('SC_finishdate_input_2_mes') + '@NMF@';
  str_out += 'SC_finishdate_input_2_ano#NMF#' + search_get_sel_txt('SC_finishdate_input_2_ano') + '@NMF@';
  str_out += 'SC_doctorid_cond#NMF#' + search_get_sel_txt('SC_doctorid_cond') + '@NMF@';
  str_out += 'SC_doctorid#NMF#' + search_get_select('SC_doctorid') + '@NMF@';
  str_out += 'SC_paymentid_cond#NMF#' + search_get_sel_txt('SC_paymentid_cond') + '@NMF@';
  str_out += 'SC_paymentid#NMF#' + search_get_select('SC_paymentid') + '@NMF@';
  str_out += 'SC_statusid_cond#NMF#' + search_get_sel_txt('SC_statusid_cond') + '@NMF@';
  str_out += 'SC_statusid#NMF#' + search_get_checkbox('SC_statusid') + '@NMF@';
  str_out += 'SC_institutionid_cond#NMF#' + search_get_sel_txt('SC_institutionid_cond') + '@NMF@';
  str_out += 'SC_institutionid#NMF#' + search_get_select('SC_institutionid') + '@NMF@';
  str_out += 'SC_staffid_cond#NMF#' + search_get_sel_txt('SC_staffid_cond') + '@NMF@';
  str_out += 'SC_staffid#NMF#' + search_get_select('SC_staffid') + '@NMF@';
  str_out += 'SC_NM_operador#NMF#' + search_get_text('SC_NM_operador');
  str_out  = str_out.replace(/[+]/g, "__NM_PLUS__");
  str_out  = str_out.replace(/[&]/g, "__NM_AMP__");
  str_out  = str_out.replace(/[%]/g, "__NM_PRC__");
  var save_name = search_get_text('SC_nmgp_save_name_' + pos);
  var save_opt  = search_get_sel_txt('SC_nmgp_save_option_' + pos);
  ajax_save_filter(save_name, save_opt, str_out, pos);
 }
 function nm_submit_filter(obj_sel, pos)
 {
  index = obj_sel.selectedIndex;
  if (index == -1 || obj_sel.options[index].value == "") 
  {
      return false;
  }
  ajax_select_filter(obj_sel.options[index].value);
 }
 function nm_submit_filter_del(pos)
 {
  obj_sel = document.F1.elements['NM_filters_del_' + pos];
  index   = obj_sel.selectedIndex;
  if (index == -1 || obj_sel.options[index].value == "") 
  {
      return false;
  }
  parm = obj_sel.options[index].value;
  ajax_delete_filter(parm);
 }
 function nm_marca_check(check_obj, tem_seq)
 {
    seq = 0;
    len_check = document.F1.elements.length;
    for (i = 0; i < len_check; i++)
    {
        tst_obj = check_obj + "[]";
        if (tem_seq == "S")
        {
            tst_obj = check_obj + "[" + seq + "]";
        }
        if (document.F1.elements[i].name == tst_obj)
        {
            document.F1.elements[i].checked = true;
            seq++;
        }
    }
 }
 function nm_limpa_check(check_obj, tem_seq)
 {
    seq = 0;
    len_check = document.F1.elements.length;
    for (i = 0; i < len_check; i++)
    {
        tst_obj = check_obj + "[]";
        if (tem_seq == "S")
        {
            tst_obj = check_obj + "[" + seq + "]";
        }
        if (document.F1.elements[i].name == tst_obj)
        {
            document.F1.elements[i].checked = false;
            seq++;
        }
    }
 }
 function search_get_select(obj_id)
 {
    var index = document.getElementById(obj_id).selectedIndex;
    if (index != -1) {
        return document.getElementById(obj_id).options[index].value;
    }
    else {
        return '';
    }
 }
 function search_get_selmult(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
        if (obj[iSelect].selected)
        {
            val += "#NMARR#" + obj[iSelect].value;
        }
    }
    return val;
 }
 function search_get_Dselelect(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
         val += "#NMARR#" + obj[iSelect].value;
    }
    return val;
 }
 function search_get_radio(obj_id)
 {
    var val  = "";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       for (iRadio = 0; iRadio < obj.length; iRadio++) {
           if (obj[iRadio].checked) {
               val = obj[iRadio].value;
           }
       }
    }
    return val;
 }
 function search_get_checkbox(obj_id)
 {
    var val  = "_NM_array_";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       if (!obj.length) {
           if (obj.checked) {
               val += "#NMARR#" + obj.value;
           }
       }
       else {
           for (iCheck = 0; iCheck < obj.length; iCheck++) {
               if (obj[iCheck].checked) {
                   val += "#NMARR#" + obj[iCheck].value;
               }
           }
       }
    }
    return val;
 }
 function search_get_text(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.value : '';
 }
 function search_get_title(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.title : '';
 }
 function search_get_sel_txt(obj_id)
 {
    var val = "";
    obj_part  = document.getElementById(obj_id);
    if (obj_part && obj_part.type.substr(0, 6) == 'select')
    {
        val = search_get_select(obj_id);
    }
    else
    {
        val = (obj_part) ? obj_part.value : '';
    }
    return val;
 }
 function search_get_html(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return obj.innerHTML;
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<script type="text/javascript">
 $(function() {
 });
</script>
 <FORM name="F1" action="./" method="post" target="_self"> 
 <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" align="center" valign="top" width="90%">
<tr>
<td>
<div class="scFilterBorder">
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
<table cellspacing=0 cellpadding=0 width='100%'>
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['dashboard_info']['compact_mode'])
      {
          return;
      }
      $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
      $Lim   = strlen($Str_date);
      $Ult   = "";
      $Arr_D = array();
      for ($I = 0; $I < $Lim; $I++)
      {
          $Char = substr($Str_date, $I, 1);
          if ($Char != $Ult)
          {
              $Arr_D[] = $Char;
          }
          $Ult = $Char;
      }
      $Prim = true;
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd">
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFilterHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFilterHeaderFont"><span></span></td>
            <td id="lin1_col2" class="scFilterHeaderFont"><span></span></td>
        </tr>
    </table>		 
 </div>
</div>
  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $regdate_cond, $regdate, $regdate_dia, $regdate_mes, $regdate_ano, $regdate_input_2_dia, $regdate_input_2_mes, $regdate_input_2_ano,
             $servicedate_cond, $servicedate, $servicedate_dia, $servicedate_mes, $servicedate_ano, $servicedate_input_2_dia, $servicedate_input_2_mes, $servicedate_input_2_ano,
             $finishdate_cond, $finishdate, $finishdate_dia, $finishdate_mes, $finishdate_ano, $finishdate_input_2_dia, $finishdate_input_2_mes, $finishdate_input_2_ano,
             $doctorid_cond, $doctorid,
             $paymentid_cond, $paymentid,
             $statusid_cond, $statusid,
             $institutionid_cond, $institutionid,
             $staffid_cond, $staffid,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_his_outpatient_reg']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_his_outpatient_reg']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_his_outpatient_reg']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_his_outpatient_reg", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      {
      }
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca'], $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $regdate_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_dia']; 
          $regdate_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_mes']; 
          $regdate_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_ano']; 
          $regdate_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_input_2_dia']; 
          $regdate_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_input_2_mes']; 
          $regdate_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_input_2_ano']; 
          $regdate_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_cond']; 
          $servicedate_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_dia']; 
          $servicedate_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_mes']; 
          $servicedate_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_ano']; 
          $servicedate_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_input_2_dia']; 
          $servicedate_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_input_2_mes']; 
          $servicedate_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_input_2_ano']; 
          $servicedate_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_cond']; 
          $finishdate_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_dia']; 
          $finishdate_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_mes']; 
          $finishdate_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_ano']; 
          $finishdate_input_2_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_input_2_dia']; 
          $finishdate_input_2_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_input_2_mes']; 
          $finishdate_input_2_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_input_2_ano']; 
          $finishdate_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_cond']; 
          $doctorid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['doctorid']; 
          $doctorid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['doctorid_cond']; 
          $paymentid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['paymentid']; 
          $paymentid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['paymentid_cond']; 
          $statusid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['statusid']; 
          $statusid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['statusid_cond']; 
          $institutionid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['institutionid']; 
          $institutionid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['institutionid_cond']; 
          $staffid = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['staffid']; 
          $staffid_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['staffid_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['NM_operador']; 
      } 
      if (!isset($regdate_cond) || empty($regdate_cond))
      {
         $regdate_cond = "bw";
      }
      if (!isset($servicedate_cond) || empty($servicedate_cond))
      {
         $servicedate_cond = "bw";
      }
      if (!isset($finishdate_cond) || empty($finishdate_cond))
      {
         $finishdate_cond = "bw";
      }
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_regdate = (in_array($regdate_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_servicedate = (in_array($servicedate_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_finishdate = (in_array($finishdate_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_doctorid = (in_array($doctorid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_paymentid = (in_array($paymentid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_statusid = (in_array($statusid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_institutionid = (in_array($institutionid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_staffid = (in_array($staffid_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      $str_display_regdate = ('bw' == $regdate_cond) ? $display_aberto : $display_fechado;
      $str_display_servicedate = ('bw' == $servicedate_cond) ? $display_aberto : $display_fechado;
      $str_display_finishdate = ('bw' == $finishdate_cond) ? $display_aberto : $display_fechado;
      $str_display_doctorid = ('bw' == $doctorid_cond) ? $display_aberto : $display_fechado;
      $str_display_paymentid = ('bw' == $paymentid_cond) ? $display_aberto : $display_fechado;
      $str_display_statusid = ('bw' == $statusid_cond) ? $display_aberto : $display_fechado;
      $str_display_institutionid = ('bw' == $institutionid_cond) ? $display_aberto : $display_fechado;
      $str_display_staffid = ('bw' == $staffid_cond) ? $display_aberto : $display_fechado;

      // statusid
      if (is_array($statusid) && !empty($statusid))
      {
         $tmp_array = array();
         $statusid_val_str = "";
         foreach ($statusid as $tmp_val_cmp)
         {
            if ("" != $statusid_val_str)
            {
               $statusid_val_str .= ",";
            }
            $tmp_pos = strpos($tmp_val_cmp, "##@@");
            if ($tmp_pos === false)
            {
                $tmp_array[] = $tmp_val_cmp;
            }
            else
            {
                $tmp_val_cmp = substr($tmp_val_cmp, 0, $tmp_pos);
                $tmp_array[] = $tmp_val_cmp;
            }
            $statusid_val_str .= "'$tmp_val_cmp'";
         }
         $statusid = $tmp_array;
      }
      else
      {
         $statusid_val_str = "";
      }
      if (!isset($regdate) || $regdate == "")
      {
          $regdate = "";
      }
      if (isset($regdate) && !empty($regdate))
      {
         $tmp_pos = strpos($regdate, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $regdate = substr($regdate, 0, $tmp_pos);
         }
      }
      if (!isset($servicedate) || $servicedate == "")
      {
          $servicedate = "";
      }
      if (isset($servicedate) && !empty($servicedate))
      {
         $tmp_pos = strpos($servicedate, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $servicedate = substr($servicedate, 0, $tmp_pos);
         }
      }
      if (!isset($finishdate) || $finishdate == "")
      {
          $finishdate = "";
      }
      if (isset($finishdate) && !empty($finishdate))
      {
         $tmp_pos = strpos($finishdate, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $finishdate = substr($finishdate, 0, $tmp_pos);
         }
      }
      if (!isset($doctorid) || $doctorid == "")
      {
          $doctorid = "";
      }
      if (isset($doctorid) && !empty($doctorid))
      {
         $tmp_pos = strpos($doctorid, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $doctorid = substr($doctorid, 0, $tmp_pos);
         }
      }
      if (!isset($paymentid) || $paymentid == "")
      {
          $paymentid = "";
      }
      if (isset($paymentid) && !empty($paymentid))
      {
         $tmp_pos = strpos($paymentid, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $paymentid = substr($paymentid, 0, $tmp_pos);
         }
      }
      if (!isset($statusid) || $statusid == "")
      {
          $statusid = array();
      }
      if (!isset($institutionid) || $institutionid == "")
      {
          $institutionid = "";
      }
      if (isset($institutionid) && !empty($institutionid))
      {
         $tmp_pos = strpos($institutionid, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $institutionid = substr($institutionid, 0, $tmp_pos);
         }
      }
      if (!isset($staffid) || $staffid == "")
      {
          $staffid = "";
      }
      if (isset($staffid) && !empty($staffid))
      {
         $tmp_pos = strpos($staffid, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $staffid = substr($staffid, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
<?php
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     if ('' != $this->Block_img_exp && '' != $this->Block_img_col)
     {
         $Img_tit_blk_i = "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img src=\"" . $this->Ini->path_icones . "/" . $this->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%\" class=\"scFilterBlockAlign css_blk_0\">";
         $Img_tit_blk_f = "</td></tr></table>";
     }
?>

    <TR>
     <TD colspan="1" height="20" class="scFilterBlockBack">
      <TABLE border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
       <TR>
        <TD class="scFilterBlockFont css_blk_0"><?php echo $Img_tit_blk_i ?>grid_outpatient_reg<?php echo $Img_tit_blk_f ?></TD>
         
       </TR>
      </TABLE>
     </TD>
    </TR>   <tr>



   
      <INPUT type="hidden" id="SC_regdate_cond" name="regdate_cond" value="bw">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['regdate'])) ? $this->New_label['regdate'] : "Register Date";
 $nmgp_tab_label .= "regdate?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_regdate"  <?php echo $str_hide_regdate?>>
<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>
<?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_regdate_DD' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_regdate_dia" name="regdate_dia">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $regdate_dia) { echo "selected"; } ?>>01</OPTION>
          <OPTION value="02" <?php if ("02" == $regdate_dia) { echo "selected"; } ?>>02</OPTION>
          <OPTION value="03" <?php if ("03" == $regdate_dia) { echo "selected"; } ?>>03</OPTION>
          <OPTION value="04" <?php if ("04" == $regdate_dia) { echo "selected"; } ?>>04</OPTION>
          <OPTION value="05" <?php if ("05" == $regdate_dia) { echo "selected"; } ?>>05</OPTION>
          <OPTION value="06" <?php if ("06" == $regdate_dia) { echo "selected"; } ?>>06</OPTION>
          <OPTION value="07" <?php if ("07" == $regdate_dia) { echo "selected"; } ?>>07</OPTION>
          <OPTION value="08" <?php if ("08" == $regdate_dia) { echo "selected"; } ?>>08</OPTION>
          <OPTION value="09" <?php if ("09" == $regdate_dia) { echo "selected"; } ?>>09</OPTION>
          <OPTION value="10" <?php if ("10" == $regdate_dia) { echo "selected"; } ?>>10</OPTION>
          <OPTION value="11" <?php if ("11" == $regdate_dia) { echo "selected"; } ?>>11</OPTION>
          <OPTION value="12" <?php if ("12" == $regdate_dia) { echo "selected"; } ?>>12</OPTION>
          <OPTION value="13" <?php if ("13" == $regdate_dia) { echo "selected"; } ?>>13</OPTION>
          <OPTION value="14" <?php if ("14" == $regdate_dia) { echo "selected"; } ?>>14</OPTION>
          <OPTION value="15" <?php if ("15" == $regdate_dia) { echo "selected"; } ?>>15</OPTION>
          <OPTION value="16" <?php if ("16" == $regdate_dia) { echo "selected"; } ?>>16</OPTION>
          <OPTION value="17" <?php if ("17" == $regdate_dia) { echo "selected"; } ?>>17</OPTION>
          <OPTION value="18" <?php if ("18" == $regdate_dia) { echo "selected"; } ?>>18</OPTION>
          <OPTION value="19" <?php if ("19" == $regdate_dia) { echo "selected"; } ?>>19</OPTION>
          <OPTION value="20" <?php if ("20" == $regdate_dia) { echo "selected"; } ?>>20</OPTION>
          <OPTION value="21" <?php if ("21" == $regdate_dia) { echo "selected"; } ?>>21</OPTION>
          <OPTION value="22" <?php if ("22" == $regdate_dia) { echo "selected"; } ?>>22</OPTION>
          <OPTION value="23" <?php if ("23" == $regdate_dia) { echo "selected"; } ?>>23</OPTION>
          <OPTION value="24" <?php if ("24" == $regdate_dia) { echo "selected"; } ?>>24</OPTION>
          <OPTION value="25" <?php if ("25" == $regdate_dia) { echo "selected"; } ?>>25</OPTION>
          <OPTION value="26" <?php if ("26" == $regdate_dia) { echo "selected"; } ?>>26</OPTION>
          <OPTION value="27" <?php if ("27" == $regdate_dia) { echo "selected"; } ?>>27</OPTION>
          <OPTION value="28" <?php if ("28" == $regdate_dia) { echo "selected"; } ?>>28</OPTION>
          <OPTION value="29" <?php if ("29" == $regdate_dia) { echo "selected"; } ?>>29</OPTION>
          <OPTION value="30" <?php if ("30" == $regdate_dia) { echo "selected"; } ?>>30</OPTION>
          <OPTION value="31" <?php if ("31" == $regdate_dia) { echo "selected"; } ?>>31</OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_regdate_MM' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_regdate_mes" name="regdate_mes">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][0] ?></OPTION>
          <OPTION value="02" <?php if ("02" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][1] ?></OPTION>
          <OPTION value="03" <?php if ("03" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][2] ?></OPTION>
          <OPTION value="04" <?php if ("04" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][3] ?></OPTION>
          <OPTION value="05" <?php if ("05" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][4] ?></OPTION>
          <OPTION value="06" <?php if ("06" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][5] ?></OPTION>
          <OPTION value="07" <?php if ("07" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][6] ?></OPTION>
          <OPTION value="08" <?php if ("08" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][7] ?></OPTION>
          <OPTION value="09" <?php if ("09" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][8] ?></OPTION>
          <OPTION value="10" <?php if ("10" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][9] ?></OPTION>
          <OPTION value="11" <?php if ("11" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][10] ?></OPTION>
          <OPTION value="12" <?php if ("12" == $regdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][11] ?></OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_regdate_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_regdate_ano" name="regdate_ano" value="<?php echo NM_encode_input($regdate_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_regdate_jq">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_regdate" class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
                  </span>
          <BR>
        <SPAN id="id_vis_regdate"  <?php echo $str_display_regdate; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>&nbsp;
         <BR>
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_regdate_input_2_DD' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_regdate_input_2_dia" name="regdate_input_2_dia">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $regdate_input_2_dia) { echo "selected"; } ?>>01</OPTION>
          <OPTION value="02" <?php if ("02" == $regdate_input_2_dia) { echo "selected"; } ?>>02</OPTION>
          <OPTION value="03" <?php if ("03" == $regdate_input_2_dia) { echo "selected"; } ?>>03</OPTION>
          <OPTION value="04" <?php if ("04" == $regdate_input_2_dia) { echo "selected"; } ?>>04</OPTION>
          <OPTION value="05" <?php if ("05" == $regdate_input_2_dia) { echo "selected"; } ?>>05</OPTION>
          <OPTION value="06" <?php if ("06" == $regdate_input_2_dia) { echo "selected"; } ?>>06</OPTION>
          <OPTION value="07" <?php if ("07" == $regdate_input_2_dia) { echo "selected"; } ?>>07</OPTION>
          <OPTION value="08" <?php if ("08" == $regdate_input_2_dia) { echo "selected"; } ?>>08</OPTION>
          <OPTION value="09" <?php if ("09" == $regdate_input_2_dia) { echo "selected"; } ?>>09</OPTION>
          <OPTION value="10" <?php if ("10" == $regdate_input_2_dia) { echo "selected"; } ?>>10</OPTION>
          <OPTION value="11" <?php if ("11" == $regdate_input_2_dia) { echo "selected"; } ?>>11</OPTION>
          <OPTION value="12" <?php if ("12" == $regdate_input_2_dia) { echo "selected"; } ?>>12</OPTION>
          <OPTION value="13" <?php if ("13" == $regdate_input_2_dia) { echo "selected"; } ?>>13</OPTION>
          <OPTION value="14" <?php if ("14" == $regdate_input_2_dia) { echo "selected"; } ?>>14</OPTION>
          <OPTION value="15" <?php if ("15" == $regdate_input_2_dia) { echo "selected"; } ?>>15</OPTION>
          <OPTION value="16" <?php if ("16" == $regdate_input_2_dia) { echo "selected"; } ?>>16</OPTION>
          <OPTION value="17" <?php if ("17" == $regdate_input_2_dia) { echo "selected"; } ?>>17</OPTION>
          <OPTION value="18" <?php if ("18" == $regdate_input_2_dia) { echo "selected"; } ?>>18</OPTION>
          <OPTION value="19" <?php if ("19" == $regdate_input_2_dia) { echo "selected"; } ?>>19</OPTION>
          <OPTION value="20" <?php if ("20" == $regdate_input_2_dia) { echo "selected"; } ?>>20</OPTION>
          <OPTION value="21" <?php if ("21" == $regdate_input_2_dia) { echo "selected"; } ?>>21</OPTION>
          <OPTION value="22" <?php if ("22" == $regdate_input_2_dia) { echo "selected"; } ?>>22</OPTION>
          <OPTION value="23" <?php if ("23" == $regdate_input_2_dia) { echo "selected"; } ?>>23</OPTION>
          <OPTION value="24" <?php if ("24" == $regdate_input_2_dia) { echo "selected"; } ?>>24</OPTION>
          <OPTION value="25" <?php if ("25" == $regdate_input_2_dia) { echo "selected"; } ?>>25</OPTION>
          <OPTION value="26" <?php if ("26" == $regdate_input_2_dia) { echo "selected"; } ?>>26</OPTION>
          <OPTION value="27" <?php if ("27" == $regdate_input_2_dia) { echo "selected"; } ?>>27</OPTION>
          <OPTION value="28" <?php if ("28" == $regdate_input_2_dia) { echo "selected"; } ?>>28</OPTION>
          <OPTION value="29" <?php if ("29" == $regdate_input_2_dia) { echo "selected"; } ?>>29</OPTION>
          <OPTION value="30" <?php if ("30" == $regdate_input_2_dia) { echo "selected"; } ?>>30</OPTION>
          <OPTION value="31" <?php if ("31" == $regdate_input_2_dia) { echo "selected"; } ?>>31</OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_regdate_input_2_MM' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_regdate_input_2_mes" name="regdate_input_2_mes">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][0] ?></OPTION>
          <OPTION value="02" <?php if ("02" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][1] ?></OPTION>
          <OPTION value="03" <?php if ("03" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][2] ?></OPTION>
          <OPTION value="04" <?php if ("04" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][3] ?></OPTION>
          <OPTION value="05" <?php if ("05" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][4] ?></OPTION>
          <OPTION value="06" <?php if ("06" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][5] ?></OPTION>
          <OPTION value="07" <?php if ("07" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][6] ?></OPTION>
          <OPTION value="08" <?php if ("08" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][7] ?></OPTION>
          <OPTION value="09" <?php if ("09" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][8] ?></OPTION>
          <OPTION value="10" <?php if ("10" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][9] ?></OPTION>
          <OPTION value="11" <?php if ("11" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][10] ?></OPTION>
          <OPTION value="12" <?php if ("12" == $regdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][11] ?></OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_regdate_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_regdate_input_2_ano" name="regdate_input_2_ano" value="<?php echo NM_encode_input($regdate_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_regdate_jq2">
</span>

<?php
  }
?>

<?php

}

?>
         </SPAN>
 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_servicedate_cond" name="servicedate_cond" value="bw">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['servicedate'])) ? $this->New_label['servicedate'] : "Service Date";
 $nmgp_tab_label .= "servicedate?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_servicedate"  <?php echo $str_hide_servicedate?>>
<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>
<?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_servicedate_DD' style='display: inline-block'>

         <SELECT class="scFilterObjectEven" id="SC_servicedate_dia" name="servicedate_dia">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $servicedate_dia) { echo "selected"; } ?>>01</OPTION>
          <OPTION value="02" <?php if ("02" == $servicedate_dia) { echo "selected"; } ?>>02</OPTION>
          <OPTION value="03" <?php if ("03" == $servicedate_dia) { echo "selected"; } ?>>03</OPTION>
          <OPTION value="04" <?php if ("04" == $servicedate_dia) { echo "selected"; } ?>>04</OPTION>
          <OPTION value="05" <?php if ("05" == $servicedate_dia) { echo "selected"; } ?>>05</OPTION>
          <OPTION value="06" <?php if ("06" == $servicedate_dia) { echo "selected"; } ?>>06</OPTION>
          <OPTION value="07" <?php if ("07" == $servicedate_dia) { echo "selected"; } ?>>07</OPTION>
          <OPTION value="08" <?php if ("08" == $servicedate_dia) { echo "selected"; } ?>>08</OPTION>
          <OPTION value="09" <?php if ("09" == $servicedate_dia) { echo "selected"; } ?>>09</OPTION>
          <OPTION value="10" <?php if ("10" == $servicedate_dia) { echo "selected"; } ?>>10</OPTION>
          <OPTION value="11" <?php if ("11" == $servicedate_dia) { echo "selected"; } ?>>11</OPTION>
          <OPTION value="12" <?php if ("12" == $servicedate_dia) { echo "selected"; } ?>>12</OPTION>
          <OPTION value="13" <?php if ("13" == $servicedate_dia) { echo "selected"; } ?>>13</OPTION>
          <OPTION value="14" <?php if ("14" == $servicedate_dia) { echo "selected"; } ?>>14</OPTION>
          <OPTION value="15" <?php if ("15" == $servicedate_dia) { echo "selected"; } ?>>15</OPTION>
          <OPTION value="16" <?php if ("16" == $servicedate_dia) { echo "selected"; } ?>>16</OPTION>
          <OPTION value="17" <?php if ("17" == $servicedate_dia) { echo "selected"; } ?>>17</OPTION>
          <OPTION value="18" <?php if ("18" == $servicedate_dia) { echo "selected"; } ?>>18</OPTION>
          <OPTION value="19" <?php if ("19" == $servicedate_dia) { echo "selected"; } ?>>19</OPTION>
          <OPTION value="20" <?php if ("20" == $servicedate_dia) { echo "selected"; } ?>>20</OPTION>
          <OPTION value="21" <?php if ("21" == $servicedate_dia) { echo "selected"; } ?>>21</OPTION>
          <OPTION value="22" <?php if ("22" == $servicedate_dia) { echo "selected"; } ?>>22</OPTION>
          <OPTION value="23" <?php if ("23" == $servicedate_dia) { echo "selected"; } ?>>23</OPTION>
          <OPTION value="24" <?php if ("24" == $servicedate_dia) { echo "selected"; } ?>>24</OPTION>
          <OPTION value="25" <?php if ("25" == $servicedate_dia) { echo "selected"; } ?>>25</OPTION>
          <OPTION value="26" <?php if ("26" == $servicedate_dia) { echo "selected"; } ?>>26</OPTION>
          <OPTION value="27" <?php if ("27" == $servicedate_dia) { echo "selected"; } ?>>27</OPTION>
          <OPTION value="28" <?php if ("28" == $servicedate_dia) { echo "selected"; } ?>>28</OPTION>
          <OPTION value="29" <?php if ("29" == $servicedate_dia) { echo "selected"; } ?>>29</OPTION>
          <OPTION value="30" <?php if ("30" == $servicedate_dia) { echo "selected"; } ?>>30</OPTION>
          <OPTION value="31" <?php if ("31" == $servicedate_dia) { echo "selected"; } ?>>31</OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_servicedate_MM' style='display: inline-block'>

         <SELECT class="scFilterObjectEven" id="SC_servicedate_mes" name="servicedate_mes">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][0] ?></OPTION>
          <OPTION value="02" <?php if ("02" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][1] ?></OPTION>
          <OPTION value="03" <?php if ("03" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][2] ?></OPTION>
          <OPTION value="04" <?php if ("04" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][3] ?></OPTION>
          <OPTION value="05" <?php if ("05" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][4] ?></OPTION>
          <OPTION value="06" <?php if ("06" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][5] ?></OPTION>
          <OPTION value="07" <?php if ("07" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][6] ?></OPTION>
          <OPTION value="08" <?php if ("08" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][7] ?></OPTION>
          <OPTION value="09" <?php if ("09" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][8] ?></OPTION>
          <OPTION value="10" <?php if ("10" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][9] ?></OPTION>
          <OPTION value="11" <?php if ("11" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][10] ?></OPTION>
          <OPTION value="12" <?php if ("12" == $servicedate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][11] ?></OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_servicedate_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_servicedate_ano" name="servicedate_ano" value="<?php echo NM_encode_input($servicedate_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_servicedate_jq">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_servicedate" class="scFilterFieldFontEven">
 <?php echo $date_format_show ?>         </SPAN>
                  </span>
          <BR>
        <SPAN id="id_vis_servicedate"  <?php echo $str_display_servicedate; ?> class="scFilterFieldFontEven">
         <?php echo $date_sep_bw ?>&nbsp;
         <BR>
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_servicedate_input_2_DD' style='display: inline-block'>

         <SELECT class="scFilterObjectEven" id="SC_servicedate_input_2_dia" name="servicedate_input_2_dia">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $servicedate_input_2_dia) { echo "selected"; } ?>>01</OPTION>
          <OPTION value="02" <?php if ("02" == $servicedate_input_2_dia) { echo "selected"; } ?>>02</OPTION>
          <OPTION value="03" <?php if ("03" == $servicedate_input_2_dia) { echo "selected"; } ?>>03</OPTION>
          <OPTION value="04" <?php if ("04" == $servicedate_input_2_dia) { echo "selected"; } ?>>04</OPTION>
          <OPTION value="05" <?php if ("05" == $servicedate_input_2_dia) { echo "selected"; } ?>>05</OPTION>
          <OPTION value="06" <?php if ("06" == $servicedate_input_2_dia) { echo "selected"; } ?>>06</OPTION>
          <OPTION value="07" <?php if ("07" == $servicedate_input_2_dia) { echo "selected"; } ?>>07</OPTION>
          <OPTION value="08" <?php if ("08" == $servicedate_input_2_dia) { echo "selected"; } ?>>08</OPTION>
          <OPTION value="09" <?php if ("09" == $servicedate_input_2_dia) { echo "selected"; } ?>>09</OPTION>
          <OPTION value="10" <?php if ("10" == $servicedate_input_2_dia) { echo "selected"; } ?>>10</OPTION>
          <OPTION value="11" <?php if ("11" == $servicedate_input_2_dia) { echo "selected"; } ?>>11</OPTION>
          <OPTION value="12" <?php if ("12" == $servicedate_input_2_dia) { echo "selected"; } ?>>12</OPTION>
          <OPTION value="13" <?php if ("13" == $servicedate_input_2_dia) { echo "selected"; } ?>>13</OPTION>
          <OPTION value="14" <?php if ("14" == $servicedate_input_2_dia) { echo "selected"; } ?>>14</OPTION>
          <OPTION value="15" <?php if ("15" == $servicedate_input_2_dia) { echo "selected"; } ?>>15</OPTION>
          <OPTION value="16" <?php if ("16" == $servicedate_input_2_dia) { echo "selected"; } ?>>16</OPTION>
          <OPTION value="17" <?php if ("17" == $servicedate_input_2_dia) { echo "selected"; } ?>>17</OPTION>
          <OPTION value="18" <?php if ("18" == $servicedate_input_2_dia) { echo "selected"; } ?>>18</OPTION>
          <OPTION value="19" <?php if ("19" == $servicedate_input_2_dia) { echo "selected"; } ?>>19</OPTION>
          <OPTION value="20" <?php if ("20" == $servicedate_input_2_dia) { echo "selected"; } ?>>20</OPTION>
          <OPTION value="21" <?php if ("21" == $servicedate_input_2_dia) { echo "selected"; } ?>>21</OPTION>
          <OPTION value="22" <?php if ("22" == $servicedate_input_2_dia) { echo "selected"; } ?>>22</OPTION>
          <OPTION value="23" <?php if ("23" == $servicedate_input_2_dia) { echo "selected"; } ?>>23</OPTION>
          <OPTION value="24" <?php if ("24" == $servicedate_input_2_dia) { echo "selected"; } ?>>24</OPTION>
          <OPTION value="25" <?php if ("25" == $servicedate_input_2_dia) { echo "selected"; } ?>>25</OPTION>
          <OPTION value="26" <?php if ("26" == $servicedate_input_2_dia) { echo "selected"; } ?>>26</OPTION>
          <OPTION value="27" <?php if ("27" == $servicedate_input_2_dia) { echo "selected"; } ?>>27</OPTION>
          <OPTION value="28" <?php if ("28" == $servicedate_input_2_dia) { echo "selected"; } ?>>28</OPTION>
          <OPTION value="29" <?php if ("29" == $servicedate_input_2_dia) { echo "selected"; } ?>>29</OPTION>
          <OPTION value="30" <?php if ("30" == $servicedate_input_2_dia) { echo "selected"; } ?>>30</OPTION>
          <OPTION value="31" <?php if ("31" == $servicedate_input_2_dia) { echo "selected"; } ?>>31</OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_servicedate_input_2_MM' style='display: inline-block'>

         <SELECT class="scFilterObjectEven" id="SC_servicedate_input_2_mes" name="servicedate_input_2_mes">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][0] ?></OPTION>
          <OPTION value="02" <?php if ("02" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][1] ?></OPTION>
          <OPTION value="03" <?php if ("03" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][2] ?></OPTION>
          <OPTION value="04" <?php if ("04" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][3] ?></OPTION>
          <OPTION value="05" <?php if ("05" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][4] ?></OPTION>
          <OPTION value="06" <?php if ("06" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][5] ?></OPTION>
          <OPTION value="07" <?php if ("07" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][6] ?></OPTION>
          <OPTION value="08" <?php if ("08" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][7] ?></OPTION>
          <OPTION value="09" <?php if ("09" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][8] ?></OPTION>
          <OPTION value="10" <?php if ("10" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][9] ?></OPTION>
          <OPTION value="11" <?php if ("11" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][10] ?></OPTION>
          <OPTION value="12" <?php if ("12" == $servicedate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][11] ?></OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_servicedate_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectEven" type="text" id="SC_servicedate_input_2_ano" name="servicedate_input_2_ano" value="<?php echo NM_encode_input($servicedate_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_servicedate_jq2">
</span>

<?php
  }
?>

<?php

}

?>
         </SPAN>
 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_finishdate_cond" name="finishdate_cond" value="bw">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['finishdate'])) ? $this->New_label['finishdate'] : "Finish Date";
 $nmgp_tab_label .= "finishdate?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_finishdate"  <?php echo $str_hide_finishdate?>>
<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['scriptcase']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $Arr_format = $Arr_D;
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "" . $date_format_show .  "";

?>
<?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_finishdate_DD' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_finishdate_dia" name="finishdate_dia">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $finishdate_dia) { echo "selected"; } ?>>01</OPTION>
          <OPTION value="02" <?php if ("02" == $finishdate_dia) { echo "selected"; } ?>>02</OPTION>
          <OPTION value="03" <?php if ("03" == $finishdate_dia) { echo "selected"; } ?>>03</OPTION>
          <OPTION value="04" <?php if ("04" == $finishdate_dia) { echo "selected"; } ?>>04</OPTION>
          <OPTION value="05" <?php if ("05" == $finishdate_dia) { echo "selected"; } ?>>05</OPTION>
          <OPTION value="06" <?php if ("06" == $finishdate_dia) { echo "selected"; } ?>>06</OPTION>
          <OPTION value="07" <?php if ("07" == $finishdate_dia) { echo "selected"; } ?>>07</OPTION>
          <OPTION value="08" <?php if ("08" == $finishdate_dia) { echo "selected"; } ?>>08</OPTION>
          <OPTION value="09" <?php if ("09" == $finishdate_dia) { echo "selected"; } ?>>09</OPTION>
          <OPTION value="10" <?php if ("10" == $finishdate_dia) { echo "selected"; } ?>>10</OPTION>
          <OPTION value="11" <?php if ("11" == $finishdate_dia) { echo "selected"; } ?>>11</OPTION>
          <OPTION value="12" <?php if ("12" == $finishdate_dia) { echo "selected"; } ?>>12</OPTION>
          <OPTION value="13" <?php if ("13" == $finishdate_dia) { echo "selected"; } ?>>13</OPTION>
          <OPTION value="14" <?php if ("14" == $finishdate_dia) { echo "selected"; } ?>>14</OPTION>
          <OPTION value="15" <?php if ("15" == $finishdate_dia) { echo "selected"; } ?>>15</OPTION>
          <OPTION value="16" <?php if ("16" == $finishdate_dia) { echo "selected"; } ?>>16</OPTION>
          <OPTION value="17" <?php if ("17" == $finishdate_dia) { echo "selected"; } ?>>17</OPTION>
          <OPTION value="18" <?php if ("18" == $finishdate_dia) { echo "selected"; } ?>>18</OPTION>
          <OPTION value="19" <?php if ("19" == $finishdate_dia) { echo "selected"; } ?>>19</OPTION>
          <OPTION value="20" <?php if ("20" == $finishdate_dia) { echo "selected"; } ?>>20</OPTION>
          <OPTION value="21" <?php if ("21" == $finishdate_dia) { echo "selected"; } ?>>21</OPTION>
          <OPTION value="22" <?php if ("22" == $finishdate_dia) { echo "selected"; } ?>>22</OPTION>
          <OPTION value="23" <?php if ("23" == $finishdate_dia) { echo "selected"; } ?>>23</OPTION>
          <OPTION value="24" <?php if ("24" == $finishdate_dia) { echo "selected"; } ?>>24</OPTION>
          <OPTION value="25" <?php if ("25" == $finishdate_dia) { echo "selected"; } ?>>25</OPTION>
          <OPTION value="26" <?php if ("26" == $finishdate_dia) { echo "selected"; } ?>>26</OPTION>
          <OPTION value="27" <?php if ("27" == $finishdate_dia) { echo "selected"; } ?>>27</OPTION>
          <OPTION value="28" <?php if ("28" == $finishdate_dia) { echo "selected"; } ?>>28</OPTION>
          <OPTION value="29" <?php if ("29" == $finishdate_dia) { echo "selected"; } ?>>29</OPTION>
          <OPTION value="30" <?php if ("30" == $finishdate_dia) { echo "selected"; } ?>>30</OPTION>
          <OPTION value="31" <?php if ("31" == $finishdate_dia) { echo "selected"; } ?>>31</OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_finishdate_MM' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_finishdate_mes" name="finishdate_mes">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][0] ?></OPTION>
          <OPTION value="02" <?php if ("02" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][1] ?></OPTION>
          <OPTION value="03" <?php if ("03" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][2] ?></OPTION>
          <OPTION value="04" <?php if ("04" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][3] ?></OPTION>
          <OPTION value="05" <?php if ("05" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][4] ?></OPTION>
          <OPTION value="06" <?php if ("06" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][5] ?></OPTION>
          <OPTION value="07" <?php if ("07" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][6] ?></OPTION>
          <OPTION value="08" <?php if ("08" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][7] ?></OPTION>
          <OPTION value="09" <?php if ("09" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][8] ?></OPTION>
          <OPTION value="10" <?php if ("10" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][9] ?></OPTION>
          <OPTION value="11" <?php if ("11" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][10] ?></OPTION>
          <OPTION value="12" <?php if ("12" == $finishdate_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][11] ?></OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_finishdate_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_finishdate_ano" name="finishdate_ano" value="<?php echo NM_encode_input($finishdate_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_finishdate_jq">
</span>

<?php
  }
?>

<?php

}

?>
        <SPAN id="id_css_finishdate" class="scFilterFieldFontOdd">
 <?php echo $date_format_show ?>         </SPAN>
                  </span>
          <BR>
        <SPAN id="id_vis_finishdate"  <?php echo $str_display_finishdate; ?> class="scFilterFieldFontOdd">
         <?php echo $date_sep_bw ?>&nbsp;
         <BR>
         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<span id='id_date_part_finishdate_input_2_DD' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_finishdate_input_2_dia" name="finishdate_input_2_dia">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $finishdate_input_2_dia) { echo "selected"; } ?>>01</OPTION>
          <OPTION value="02" <?php if ("02" == $finishdate_input_2_dia) { echo "selected"; } ?>>02</OPTION>
          <OPTION value="03" <?php if ("03" == $finishdate_input_2_dia) { echo "selected"; } ?>>03</OPTION>
          <OPTION value="04" <?php if ("04" == $finishdate_input_2_dia) { echo "selected"; } ?>>04</OPTION>
          <OPTION value="05" <?php if ("05" == $finishdate_input_2_dia) { echo "selected"; } ?>>05</OPTION>
          <OPTION value="06" <?php if ("06" == $finishdate_input_2_dia) { echo "selected"; } ?>>06</OPTION>
          <OPTION value="07" <?php if ("07" == $finishdate_input_2_dia) { echo "selected"; } ?>>07</OPTION>
          <OPTION value="08" <?php if ("08" == $finishdate_input_2_dia) { echo "selected"; } ?>>08</OPTION>
          <OPTION value="09" <?php if ("09" == $finishdate_input_2_dia) { echo "selected"; } ?>>09</OPTION>
          <OPTION value="10" <?php if ("10" == $finishdate_input_2_dia) { echo "selected"; } ?>>10</OPTION>
          <OPTION value="11" <?php if ("11" == $finishdate_input_2_dia) { echo "selected"; } ?>>11</OPTION>
          <OPTION value="12" <?php if ("12" == $finishdate_input_2_dia) { echo "selected"; } ?>>12</OPTION>
          <OPTION value="13" <?php if ("13" == $finishdate_input_2_dia) { echo "selected"; } ?>>13</OPTION>
          <OPTION value="14" <?php if ("14" == $finishdate_input_2_dia) { echo "selected"; } ?>>14</OPTION>
          <OPTION value="15" <?php if ("15" == $finishdate_input_2_dia) { echo "selected"; } ?>>15</OPTION>
          <OPTION value="16" <?php if ("16" == $finishdate_input_2_dia) { echo "selected"; } ?>>16</OPTION>
          <OPTION value="17" <?php if ("17" == $finishdate_input_2_dia) { echo "selected"; } ?>>17</OPTION>
          <OPTION value="18" <?php if ("18" == $finishdate_input_2_dia) { echo "selected"; } ?>>18</OPTION>
          <OPTION value="19" <?php if ("19" == $finishdate_input_2_dia) { echo "selected"; } ?>>19</OPTION>
          <OPTION value="20" <?php if ("20" == $finishdate_input_2_dia) { echo "selected"; } ?>>20</OPTION>
          <OPTION value="21" <?php if ("21" == $finishdate_input_2_dia) { echo "selected"; } ?>>21</OPTION>
          <OPTION value="22" <?php if ("22" == $finishdate_input_2_dia) { echo "selected"; } ?>>22</OPTION>
          <OPTION value="23" <?php if ("23" == $finishdate_input_2_dia) { echo "selected"; } ?>>23</OPTION>
          <OPTION value="24" <?php if ("24" == $finishdate_input_2_dia) { echo "selected"; } ?>>24</OPTION>
          <OPTION value="25" <?php if ("25" == $finishdate_input_2_dia) { echo "selected"; } ?>>25</OPTION>
          <OPTION value="26" <?php if ("26" == $finishdate_input_2_dia) { echo "selected"; } ?>>26</OPTION>
          <OPTION value="27" <?php if ("27" == $finishdate_input_2_dia) { echo "selected"; } ?>>27</OPTION>
          <OPTION value="28" <?php if ("28" == $finishdate_input_2_dia) { echo "selected"; } ?>>28</OPTION>
          <OPTION value="29" <?php if ("29" == $finishdate_input_2_dia) { echo "selected"; } ?>>29</OPTION>
          <OPTION value="30" <?php if ("30" == $finishdate_input_2_dia) { echo "selected"; } ?>>30</OPTION>
          <OPTION value="31" <?php if ("31" == $finishdate_input_2_dia) { echo "selected"; } ?>>31</OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<span id='id_date_part_finishdate_input_2_MM' style='display: inline-block'>

         <SELECT class="scFilterObjectOdd" id="SC_finishdate_input_2_mes" name="finishdate_input_2_mes">
          <OPTION value=""></OPTION>
          <OPTION value="01" <?php if ("01" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][0] ?></OPTION>
          <OPTION value="02" <?php if ("02" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][1] ?></OPTION>
          <OPTION value="03" <?php if ("03" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][2] ?></OPTION>
          <OPTION value="04" <?php if ("04" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][3] ?></OPTION>
          <OPTION value="05" <?php if ("05" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][4] ?></OPTION>
          <OPTION value="06" <?php if ("06" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][5] ?></OPTION>
          <OPTION value="07" <?php if ("07" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][6] ?></OPTION>
          <OPTION value="08" <?php if ("08" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][7] ?></OPTION>
          <OPTION value="09" <?php if ("09" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][8] ?></OPTION>
          <OPTION value="10" <?php if ("10" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][9] ?></OPTION>
          <OPTION value="11" <?php if ("11" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][10] ?></OPTION>
          <OPTION value="12" <?php if ("12" == $finishdate_input_2_mes) { echo "selected"; } ?>><?php echo $_SESSION['scriptcase']['sc_tab_meses']['int'][11] ?></OPTION>
         </SELECT>
         </span>

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<span id='id_date_part_finishdate_input_2_AAAA' style='display: inline-block'>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_finishdate_input_2_ano" name="finishdate_input_2_ano" value="<?php echo NM_encode_input($finishdate_input_2_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 <INPUT type="hidden" id="sc_finishdate_jq2">
</span>

<?php
  }
?>

<?php

}

?>
         </SPAN>
 </TD>
   



   </tr>
   </TABLE>
  </TD>
   </TR>
   </TABLE>
   </TD></TR><TR><TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_1" valign="top" width="100%" style="height: 100%;">
<?php
     $Img_tit_blk_i = "";
     $Img_tit_blk_f = "";
     if ('' != $this->Block_img_exp && '' != $this->Block_img_col)
     {
         $Img_tit_blk_i = "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img src=\"" . $this->Ini->path_icones . "/" . $this->Block_img_exp . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%\" class=\"scFilterBlockAlign css_blk_1\">";
         $Img_tit_blk_f = "</td></tr></table>";
     }
?>

    <TR>
     <TD colspan="1" height="20" class="scFilterBlockBack">
      <TABLE border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
       <TR>
        <TD class="scFilterBlockFont css_blk_1"><?php echo $Img_tit_blk_i ?>Filter<?php echo $Img_tit_blk_f ?></TD>
         
       </TR>
      </TABLE>
     </TD>
    </TR>   <tr style="display:none;">



   
      <INPUT type="hidden" id="SC_doctorid_cond" name="doctorid_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['doctorid'])) ? $this->New_label['doctorid'] : "Doctor";
 $nmgp_tab_label .= "doctorid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_doctorid"  <?php echo $str_hide_doctorid?>>
<?php
      $doctorid_look = substr($this->Db->qstr($doctorid), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT ID, name  FROM doctor_settings  ORDER BY name"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['doctorid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['doctorid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_doctorid">
      <SELECT class="scFilterObjectOdd" id="SC_doctorid" name="doctorid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $doctorid)
            {
                    $doctorid_sel = ($nm_opc_cod === $doctorid) ? "selected" : "";
            }
            else
            {
               $doctorid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $doctorid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr style="display:none;">



   
      <INPUT type="hidden" id="SC_paymentid_cond" name="paymentid_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['paymentid'])) ? $this->New_label['paymentid'] : "Payment";
 $nmgp_tab_label .= "paymentid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_paymentid"  <?php echo $str_hide_paymentid?>>
<?php
      $paymentid_look = substr($this->Db->qstr($paymentid), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT ID, name  FROM payment_settings  ORDER BY name"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['paymentid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['paymentid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_paymentid">
      <SELECT class="scFilterObjectEven" id="SC_paymentid" name="paymentid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $paymentid)
            {
                    $paymentid_sel = ($nm_opc_cod === $paymentid) ? "selected" : "";
            }
            else
            {
               $paymentid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $paymentid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr style="display:none;">



   
      <INPUT type="hidden" id="SC_statusid_cond" name="statusid_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['statusid'])) ? $this->New_label['statusid'] : "Status";
 $nmgp_tab_label .= "statusid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_statusid"  <?php echo $str_hide_statusid?>> 
<?php
  if (!isset($statusid)) {$statusid = explode(";", $statusid);}
 ?>
 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['statusid'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['statusid'][] = "1";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['statusid'][] = "2";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['statusid'][] = "3";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['statusid'][] = "4";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['statusid'][] = "0";
 ?>

<TABLE style="padding: 0px; spacing: 0px; border-width: 0px;"><TR>
  <TD class="scFilterFieldFontOdd"><INPUT class="scFilterObjectOdd" type="checkbox" id="SC_statusid" name="statusid[]" value="1##@@Register"  <?php if (in_array("1", $statusid))  { echo " checked" ;} ?>>Register</TD>
  <TD class="scFilterFieldFontOdd"><INPUT class="scFilterObjectOdd" type="checkbox" id="SC_statusid" name="statusid[]" value="2##@@Handled"  <?php if (in_array("2", $statusid))  { echo " checked" ;} ?>>Handled</TD>
</TR>
<TR>
  <TD class="scFilterFieldFontOdd"><INPUT class="scFilterObjectOdd" type="checkbox" id="SC_statusid" name="statusid[]" value="3##@@Done"  <?php if (in_array("3", $statusid))  { echo " checked" ;} ?>>Done</TD>
  <TD class="scFilterFieldFontOdd"><INPUT class="scFilterObjectOdd" type="checkbox" id="SC_statusid" name="statusid[]" value="4##@@Completed"  <?php if (in_array("4", $statusid))  { echo " checked" ;} ?>>Completed</TD>
</TR>
<TR>
  <TD class="scFilterFieldFontOdd"><INPUT class="scFilterObjectOdd" type="checkbox" id="SC_statusid" name="statusid[]" value="0##@@Cancel"  <?php if (in_array("0", $statusid))  { echo " checked" ;} ?>>Cancel</TD>
</TR><TR>
 <TD colspan=2>
  <IMG SRC="<?php echo $this->Ini->path_img_global;?>/img_select_all.gif" ALIGN="absmiddle" onClick="nm_marca_check('statusid', 'N'); return false;" style="cursor: pointer">&nbsp;
  <IMG SRC="<?php echo $this->Ini->path_img_global;?>/img_select_none.gif" ALIGN="absmiddle" onClick="nm_limpa_check('statusid', 'N'); return false;" style="cursor: pointer">
 </TD>
</TR></TABLE>
 </TD>
   



   </tr><tr style="display:none;">



   
      <INPUT type="hidden" id="SC_institutionid_cond" name="institutionid_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['institutionid'])) ? $this->New_label['institutionid'] : "Institution ID";
 $nmgp_tab_label .= "institutionid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_institutionid"  <?php echo $str_hide_institutionid?>>
<?php
      $institutionid_look = substr($this->Db->qstr($institutionid), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT ID, name  FROM institution_settings  ORDER BY name"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['institutionid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['institutionid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_institutionid">
      <SELECT class="scFilterObjectEven" id="SC_institutionid" name="institutionid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $institutionid)
            {
                    $institutionid_sel = ($nm_opc_cod === $institutionid) ? "selected" : "";
            }
            else
            {
               $institutionid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $institutionid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr><tr style="display:none;">



   
      <INPUT type="hidden" id="SC_staffid_cond" name="staffid_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" style="vertical-align: top" > <?php
 $SC_Label = (isset($this->New_label['staffid'])) ? $this->New_label['staffid'] : "Staff";
 $nmgp_tab_label .= "staffid?#?" . $SC_Label . "?@?";
 $date_sep_bw = " " . $this->Ini->Nm_lang['lang_srch_between_values'] . " ";
 if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($date_sep_bw))
 {
     $date_sep_bw = sc_convert_encoding($date_sep_bw, $_SESSION['scriptcase']['charset'], "UTF-8");
 }
?>
<span class="SC_Field_label_Mob"><?php echo $SC_Label ?></span><br><span id="id_hide_staffid"  <?php echo $str_hide_staffid?>>
<?php
      $staffid_look = substr($this->Db->qstr($staffid), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT ID, name  FROM staff_settings  ORDER BY name"; 
      unset($cmp1,$cmp2);
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['staffid'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['staffid'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_staffid">
      <SELECT class="scFilterObjectOdd" id="SC_staffid" name="staffid"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $staffid)
            {
                    $staffid_sel = ($nm_opc_cod === $staffid) ? "selected" : "";
            }
            else
            {
               $staffid_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $staffid_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   



   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR>
  <TD class="scFilterTableTd" align="center">
<INPUT type="hidden" id="SC_NM_operador" name="NM_operador" value="and">  </TD>
 </TR>
   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
 <?php
     if ($_SESSION['scriptcase']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form();", "limpa_form();", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot');" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("grid_his_outpatient_reg_help.txt"))
   {
      $Arq_WebHelp = file("grid_his_outpatient_reg_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if ($nm_apl_dependente == 1 || (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['opc_psq'] && !$this->aba_iframe))
   {
       if ($nm_apl_dependente == 1) 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['dashboard_info']['under_dashboard'])
       { }
       else 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['opc_psq'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['sc_modal'])
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove();", "self.parent.tb_remove();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
       else
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none;z-index:9999;">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_form('bot');", "nm_save_form('bot');", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir_appdiv", "nm_submit_filter_del('bot');", "nm_submit_filter_del('bot');", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
     else
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200);", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form();", "limpa_form();", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (!isset($this->nmgp_botoes['save']) || $this->nmgp_botoes['save'] == "on")
   {
       $this->NM_fil_ant = $this->gera_array_filtros();
?>
     <span id="idAjaxSelect_NM_filters_bot">
       <SELECT class="scFilterToolbar_obj" id="sel_recup_filters_bot" name="NM_filters_bot" onChange="nm_submit_filter(this, 'bot');" size="1">
           <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "           <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
           <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
       </SELECT>
     </span>
<?php
   }
?>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bedit_filter", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "document.getElementById('Salvar_filters_bot').style.display = ''; document.F1.nmgp_save_name_bot.focus();", "Ativa_save_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
   }
?>
<?php
   if (is_file("grid_his_outpatient_reg_help.txt"))
   {
      $Arq_WebHelp = file("grid_his_outpatient_reg_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "');", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
<?php
   if ($nm_apl_dependente == 1 || (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['opc_psq'] && !$this->aba_iframe))
   {
       if ($nm_apl_dependente == 1) 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
       elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['dashboard_info']['under_dashboard'])
       { }
       else 
       { 
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "document.form_cancel.submit();", "document.form_cancel.submit();", "sc_b_cancel_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       } 
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['opc_psq'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['sc_modal'])
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "self.parent.tb_remove();", "self.parent.tb_remove();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
       else
       {
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "window.close();", "window.close();", "sai_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
<?php
       }
   }
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
<?php
   if ($this->nmgp_botoes['save'] == "on")
   {
?>
    </TD></TR><TR><TD>
    <DIV id="Salvar_filters_bot" style="display:none;z-index:9999;">
     <TABLE align="center" class="scFilterTable">
      <TR>
       <TD class="scFilterBlock">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top" class="scFilterBlockFont"><?php echo $this->Ini->Nm_lang['lang_othr_srch_head'] ?></td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bcancelar_appdiv", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "document.getElementById('Salvar_filters_bot').style.display = 'none';", "Cancel_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldOdd">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
           <input class="scFilterObjectOdd" type="text" id="SC_nmgp_save_name_bot" name="nmgp_save_name_bot" value="">
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bsalvar_appdiv", "nm_save_form('bot');", "nm_save_form('bot');", "Save_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </TD>
      </TR>
      <TR>
       <TD class="scFilterFieldEven">
       <DIV id="Apaga_filters_bot" style="display:''">
        <table style="border-width: 0px; border-collapse: collapse" width="100%">
         <tr>
          <td style="padding: 0px" valign="top">
          <div id="idAjaxSelect_NM_filters_del_bot">
           <SELECT class="scFilterObjectOdd" id="sel_filters_del_bot" name="NM_filters_del_bot" size="1">
            <option value=""></option>
<?php
          $Nome_filter = "";
          foreach ($this->NM_fil_ant as $Cada_filter => $Tipo_filter)
          {
              $Select = "";
              if ($Cada_filter == $this->NM_curr_fil)
              {
                  $Select = "selected";
              }
              if (NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] != "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, $_SESSION['scriptcase']['charset'], "UTF-8");
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], $_SESSION['scriptcase']['charset'], "UTF-8");
              }
              elseif (!NM_is_utf8($Cada_filter) && $_SESSION['scriptcase']['charset'] == "UTF-8")
              {
                  $Cada_filter    = sc_convert_encoding($Cada_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
                  $Tipo_filter[0] = sc_convert_encoding($Tipo_filter[0], "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($Tipo_filter[1] != $Nome_filter)
              {
                  $Nome_filter = $Tipo_filter[1];
                  echo "            <option value=\"\">" . NM_encode_input($Nome_filter) . "</option>\r\n";
              }
?>
            <option value="<?php echo NM_encode_input($Tipo_filter[0]) . "\" " . $Select . ">.." . $Cada_filter ?></option>
<?php
          }
?>
           </SELECT>
          </div>
          </td>
          <td style="padding: 0px" align="right" valign="top">
           <?php echo nmButtonOutput($this->arr_buttons, "bexcluir_appdiv", "nm_submit_filter_del('bot');", "nm_submit_filter_del('bot');", "Exc_filtro_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
?>
          </td>
         </tr>
        </table>
       </DIV>
       </TD>
      </TR>
     </TABLE>
    </DIV> 
<?php
   }
?>
  </TD>
 </TR>
     <?php
     }
 ?>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
   <INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
<SCRIPT type="text/javascript">
<?php
   if (empty($this->NM_fil_ant))
   {
       if ($_SESSION['scriptcase']['proc_mobile'])
       {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
       }
       else
       {
?>
      document.getElementById('Apaga_filters_bot').style.display = 'none';
      document.getElementById('sel_recup_filters_bot').style.display = 'none';
<?php
       }
   }
?>
 function nm_move()
 {
     document.form_cancel.target = "_self"; 
     document.form_cancel.action = "./"; 
     document.form_cancel.submit(); 
 }
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   if (document.F1.NM_filters)
   {
       document.F1.NM_filters.selectedIndex = -1;
   }
   document.getElementById('Salvar_filters_bot').style.display = 'none';
   document.F1.regdate_cond.value = 'bw';
   nm_campos_between(document.getElementById('id_vis_regdate'), document.F1.regdate_cond, 'regdate');
   document.F1.regdate_dia.value = "";
   document.F1.regdate_mes.value = "";
   document.F1.regdate_ano.value = "";
   document.F1.regdate_input_2_dia.value = "";
   document.F1.regdate_input_2_mes.value = "";
   document.F1.regdate_input_2_ano.value = "";
   document.F1.servicedate_cond.value = 'bw';
   nm_campos_between(document.getElementById('id_vis_servicedate'), document.F1.servicedate_cond, 'servicedate');
   document.F1.servicedate_dia.value = "";
   document.F1.servicedate_mes.value = "";
   document.F1.servicedate_ano.value = "";
   document.F1.servicedate_input_2_dia.value = "";
   document.F1.servicedate_input_2_mes.value = "";
   document.F1.servicedate_input_2_ano.value = "";
   document.F1.finishdate_cond.value = 'bw';
   nm_campos_between(document.getElementById('id_vis_finishdate'), document.F1.finishdate_cond, 'finishdate');
   document.F1.finishdate_dia.value = "";
   document.F1.finishdate_mes.value = "";
   document.F1.finishdate_ano.value = "";
   document.F1.finishdate_input_2_dia.value = "";
   document.F1.finishdate_input_2_mes.value = "";
   document.F1.finishdate_input_2_ano.value = "";
   nm_campos_between(document.getElementById('id_vis_doctorid'), document.F1.doctorid_cond, 'doctorid');
   document.F1.doctorid.value = "";
   nm_campos_between(document.getElementById('id_vis_paymentid'), document.F1.paymentid_cond, 'paymentid');
   document.F1.paymentid.value = "";
   nm_campos_between(document.getElementById('id_vis_statusid'), document.F1.statusid_cond, 'statusid');
   for (i = 0; i < document.F1.elements.length; i++)
   {
      if (document.F1.elements[i].name == 'statusid[]' && document.F1.elements[i].checked)
      {
          document.F1.elements[i].checked = false;
      }
   }
   nm_campos_between(document.getElementById('id_vis_institutionid'), document.F1.institutionid_cond, 'institutionid');
   document.F1.institutionid.value = "";
   nm_campos_between(document.getElementById('id_vis_staffid'), document.F1.staffid_cond, 'staffid');
   document.F1.staffid.value = "";
   Sc_carga_select2('all');
 }
 function Sc_carga_select2(Field)
 {
    if (Field == 'all' || Field == 'doctorid') {
       Sc_carga_select2_doctorid();
    }
    if (Field == 'all' || Field == 'paymentid') {
       Sc_carga_select2_paymentid();
    }
    if (Field == 'all' || Field == 'staffid') {
       Sc_carga_select2_staffid();
    }
    if (Field == 'all' || Field == 'institutionid') {
       Sc_carga_select2_institutionid();
    }
 }
 function Sc_carga_select2_doctorid()
 {
  $("#SC_doctorid").select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
 }
 function Sc_carga_select2_paymentid()
 {
  $("#SC_paymentid").select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
 }
 function Sc_carga_select2_staffid()
 {
  $("#SC_staffid").select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
 }
 function Sc_carga_select2_institutionid()
 {
  $("#SC_institutionid").select2(
    {
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
 }
 function SC_carga_evt_jquery()
 {
 }
   function process_hotkeys(hotkey)
   {
      if (hotkey == 'sys_format_fi2') { 
         var output =  $('#sc_b_pesq_bot').click();
         return (0 < output.length);
      }
      if (hotkey == 'sys_format_lim') { 
         var output =  $('#limpa_frm_bot').click();
         return (0 < output.length);
      }
      if (hotkey == 'sys_format_edi') { 
         var output =  $('#Ativa_save_bot').click();
         return (0 < output.length);
      }
      if (hotkey == 'sys_format_webh') { 
         var output =  $('#sc_b_help_bot').click();
         return (0 < output.length);
      }
      if (hotkey == 'sys_format_sai') { 
         var output =  $('#sai_bot').click();
         return (0 < output.length);
      }
   return false;
   }
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   function gera_array_filtros()
   {
       $this->NM_fil_ant = array();
       $NM_patch   = "LMMS/grid_his_outpatient_reg";
       if (is_dir($this->NM_path_filter . $NM_patch))
       {
           $NM_dir = @opendir($this->NM_path_filter . $NM_patch);
           while (FALSE !== ($NM_arq = @readdir($NM_dir)))
           {
             if (@is_file($this->NM_path_filter . $NM_patch . "/" . $NM_arq))
             {
                 $Sc_v6 = false;
                 $NMcmp_filter = file($this->NM_path_filter . $NM_patch . "/" . $NM_arq);
                 $NMcmp_filter = explode("@NMF@", $NMcmp_filter[0]);
                 if (substr($NMcmp_filter[0], 0, 6) == "SC_V6_" || substr($NMcmp_filter[0], 0, 6) == "SC_V8_")
                 {
                     $Name_filter = substr($NMcmp_filter[0], 6);
                     if (!empty($Name_filter))
                     {
                         $nmgp_save_name = str_replace('/', ' ', $Name_filter);
                         $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
                         $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
                         $this->NM_fil_ant[$Name_filter][0] = $NM_patch . "/" . $nmgp_save_name;
                         $this->NM_fil_ant[$Name_filter][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                         $Sc_v6 = true;
                     }
                 }
                 if (!$Sc_v6)
                 {
                     $this->NM_fil_ant[$NM_arq][0] = $NM_patch . "/" . $NM_arq;
                     $this->NM_fil_ant[$NM_arq][1] = "" . $this->Ini->Nm_lang['lang_srch_public'] . "";
                 }
             }
           }
       }
       return $this->NM_fil_ant;
   }
   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz;
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("en_us");
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] = "";
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_orig'] = "";
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   function salva_filtro($nmgp_save_origem)
   {
      global $NM_filters_save, $nmgp_save_name, $nmgp_save_option, $script_case_init;
          $NM_filters_save = str_replace("__NM_PLUS__", "+", $NM_filters_save);
          $NM_str_filter  = "SC_V8_" . $nmgp_save_name . "@NMF@";
          $nmgp_save_name = str_replace('/', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('\\', ' ', $nmgp_save_name);
          $nmgp_save_name = str_replace('.', ' ', $nmgp_save_name);
          if (!NM_is_utf8($nmgp_save_name))
          {
              $nmgp_save_name = sc_convert_encoding($nmgp_save_name, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $NM_str_filter  .= $NM_filters_save;
          $NM_patch = $this->NM_path_filter;
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "LMMS/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $NM_patch .= "grid_his_outpatient_reg/";
          if (!is_dir($NM_patch))
          {
              $NMdir = mkdir($NM_patch, 0755);
          }
          $Parms_usr  = "";
          $NM_filter = fopen ($NM_patch . $nmgp_save_name, 'w');
          if (!NM_is_utf8($NM_str_filter))
          {
              $NM_str_filter = sc_convert_encoding($NM_str_filter, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          fwrite($NM_filter, $NM_str_filter);
          fclose($NM_filter);
   }
   function recupera_filtro($NM_filters)
   {
      global $NM_operador, $script_case_init;
      $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      if (!is_file($NM_patch))
      {
          $NM_filters = sc_convert_encoding($NM_filters, "UTF-8", $_SESSION['scriptcase']['charset']);
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters;
      }
      $return_fields = array();
      $tp_fields     = array();
      $tb_fields_esp = array();
      $old_bi_opcs   = array("TP","HJ","OT","U7","SP","US","MM","UM","AM","PS","SS","P3","PM","P7","CY","LY","YY","M6","M3","M18","M24");
      $tp_fields['SC_regdate_cond'] = 'cond';
      $tp_fields['SC_regdate_dia'] = 'text';
      $tp_fields['SC_regdate_mes'] = 'text';
      $tp_fields['SC_regdate_ano'] = 'text';
      $tp_fields['SC_regdate_input_2_dia'] = 'text';
      $tp_fields['SC_regdate_input_2_mes'] = 'text';
      $tp_fields['SC_regdate_input_2_ano'] = 'text';
      $tp_fields['SC_servicedate_cond'] = 'cond';
      $tp_fields['SC_servicedate_dia'] = 'text';
      $tp_fields['SC_servicedate_mes'] = 'text';
      $tp_fields['SC_servicedate_ano'] = 'text';
      $tp_fields['SC_servicedate_input_2_dia'] = 'text';
      $tp_fields['SC_servicedate_input_2_mes'] = 'text';
      $tp_fields['SC_servicedate_input_2_ano'] = 'text';
      $tp_fields['SC_finishdate_cond'] = 'cond';
      $tp_fields['SC_finishdate_dia'] = 'text';
      $tp_fields['SC_finishdate_mes'] = 'text';
      $tp_fields['SC_finishdate_ano'] = 'text';
      $tp_fields['SC_finishdate_input_2_dia'] = 'text';
      $tp_fields['SC_finishdate_input_2_mes'] = 'text';
      $tp_fields['SC_finishdate_input_2_ano'] = 'text';
      $tp_fields['SC_doctorid_cond'] = 'cond';
      $tp_fields['SC_doctorid'] = 'select';
      $tp_fields['SC_paymentid_cond'] = 'cond';
      $tp_fields['SC_paymentid'] = 'select';
      $tp_fields['SC_statusid_cond'] = 'cond';
      $tp_fields['SC_statusid'] = 'checkbox';
      $tp_fields['SC_institutionid_cond'] = 'cond';
      $tp_fields['SC_institutionid'] = 'select';
      $tp_fields['SC_staffid_cond'] = 'cond';
      $tp_fields['SC_staffid'] = 'select';
      $tp_fields['SC_NM_operador'] = 'text';
      if (is_file($NM_patch))
      {
          $SC_V8    = false;
          $NMfilter = file($NM_patch);
          $NMcmp_filter = explode("@NMF@", $NMfilter[0]);
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              $SC_V8 = true;
          }
          if (substr($NMcmp_filter[0], 0, 5) == "SC_V6" || substr($NMcmp_filter[0], 0, 5) == "SC_V8")
          {
              unset($NMcmp_filter[0]);
          }
          foreach ($NMcmp_filter as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              if (isset($tb_fields_esp[$Cada_cmp[0]]))
              {
                  $Cada_cmp[0] = $tb_fields_esp[$Cada_cmp[0]];
              }
              if (!$SC_V8 && substr($Cada_cmp[0], 0, 11) != "div_ac_lab_" && substr($Cada_cmp[0], 0, 6) != "id_ac_")
              {
                  $Cada_cmp[0] = "SC_" . $Cada_cmp[0];
              }
              if (!isset($tp_fields[$Cada_cmp[0]]))
              {
                  continue;
              }
              $list   = array();
              $list_a = array();
              if (substr($Cada_cmp[1], 0, 10) == "_NM_array_")
              {
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                          $list[]   = $Cada_val;
                          $tmp_pos  = strpos($Cada_val, "##@@");
                          $val_a    = ($tmp_pos !== false) ?  substr($Cada_val, $tmp_pos + 4) : $Cada_val;
                          $list_a[] = array('opt' => $Cada_val, 'value' => $val_a);
                      }
                  }
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'dselect')
              {
                  $list[]   = $Cada_cmp[1];
                  $tmp_pos  = strpos($Cada_cmp[1], "##@@");
                  $val_a    = ($tmp_pos !== false) ?  substr($Cada_cmp[1], $tmp_pos + 4) : $Cada_cmp[1];
                  $list_a[] = array('opt' => $Cada_cmp[1], 'value' => $val_a);
              }
              else
              {
                  $list[0] = $Cada_cmp[1];
              }
              if ($tp_fields[$Cada_cmp[0]] == 'select2_aut')
              {
                  if (!isset($list[0]))
                  {
                      $list[0] = "";
                  }
                  $return_fields['set_select2_aut'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'dselect')
              {
                  $return_fields['set_dselect'][] = array('field' => $Cada_cmp[0], 'value' => $list_a);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'fil_order')
              {
                  $return_fields['set_fil_order'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'selmult')
              {
                  if (count($list) == 1 && $list[0] == "")
                  {
                      continue;
                  }
                  $return_fields['set_selmult'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'ddcheckbox')
              {
                  $return_fields['set_ddcheckbox'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              elseif ($tp_fields[$Cada_cmp[0]] == 'checkbox')
              {
                  $return_fields['set_checkbox'][] = array('field' => $Cada_cmp[0], 'value' => $list);
              }
              else
              {
                  if (!isset($list[0]))
                  {
                      $list[0] = "";
                  }
                  if ($tp_fields[$Cada_cmp[0]] == 'html')
                  {
                      $return_fields['set_html'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif ($tp_fields[$Cada_cmp[0]] == 'radio')
                  {
                      $return_fields['set_radio'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
                  elseif ($tp_fields[$Cada_cmp[0]] == 'cond' && in_array($list[0], $old_bi_opcs))
                  {
                      $Cada_cmp[1] = "bi_" . $list[0];
                      $return_fields['set_val'][] = array('field' => $Cada_cmp[0], 'value' => $Cada_cmp[1]);
                  }
                  else
                  {
                      $return_fields['set_val'][] = array('field' => $Cada_cmp[0], 'value' => $list[0]);
                  }
              }
          }
          $this->NM_curr_fil = $NM_filters;
      }
      return $return_fields;
   }
   function apaga_filtro()
   {
      global $NM_filters_del;
      if (isset($NM_filters_del) && !empty($NM_filters_del))
      { 
          $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          if (!is_file($NM_patch))
          {
              $NM_filters_del = sc_convert_encoding($NM_filters_del, "UTF-8", $_SESSION['scriptcase']['charset']);
              $NM_patch = $this->NM_path_filter . "/" . $NM_filters_del;
          }
          if (is_file($NM_patch))
          {
              @unlink($NM_patch);
          }
          if ($NM_filters_del == $this->NM_curr_fil)
          {
              $this->NM_curr_fil = "";
          }
      }
   }
   /**
    * @access  public
    */
   function trata_campos()
   {
      global $regdate_cond, $regdate, $regdate_dia, $regdate_mes, $regdate_ano, $regdate_input_2_dia, $regdate_input_2_mes, $regdate_input_2_ano,
             $servicedate_cond, $servicedate, $servicedate_dia, $servicedate_mes, $servicedate_ano, $servicedate_input_2_dia, $servicedate_input_2_mes, $servicedate_input_2_ano,
             $finishdate_cond, $finishdate, $finishdate_dia, $finishdate_mes, $finishdate_ano, $finishdate_input_2_dia, $finishdate_input_2_mes, $finishdate_input_2_ano,
             $doctorid_cond, $doctorid,
             $paymentid_cond, $paymentid,
             $statusid_cond, $statusid,
             $institutionid_cond, $institutionid,
             $staffid_cond, $staffid, $nmgp_tab_label;

      $C_formatado = true;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $regdate_cond_salva = $regdate_cond; 
      if (!isset($regdate_input_2_dia) || $regdate_input_2_dia == "")
      {
          $regdate_input_2_dia = $regdate_dia;
      }
      if (!isset($regdate_input_2_mes) || $regdate_input_2_mes == "")
      {
          $regdate_input_2_mes = $regdate_mes;
      }
      if (!isset($regdate_input_2_ano) || $regdate_input_2_ano == "")
      {
          $regdate_input_2_ano = $regdate_ano;
      }
      $servicedate_cond_salva = $servicedate_cond; 
      if (!isset($servicedate_input_2_dia) || $servicedate_input_2_dia == "")
      {
          $servicedate_input_2_dia = $servicedate_dia;
      }
      if (!isset($servicedate_input_2_mes) || $servicedate_input_2_mes == "")
      {
          $servicedate_input_2_mes = $servicedate_mes;
      }
      if (!isset($servicedate_input_2_ano) || $servicedate_input_2_ano == "")
      {
          $servicedate_input_2_ano = $servicedate_ano;
      }
      $finishdate_cond_salva = $finishdate_cond; 
      if (!isset($finishdate_input_2_dia) || $finishdate_input_2_dia == "")
      {
          $finishdate_input_2_dia = $finishdate_dia;
      }
      if (!isset($finishdate_input_2_mes) || $finishdate_input_2_mes == "")
      {
          $finishdate_input_2_mes = $finishdate_mes;
      }
      if (!isset($finishdate_input_2_ano) || $finishdate_input_2_ano == "")
      {
          $finishdate_input_2_ano = $finishdate_ano;
      }
      $doctorid_cond_salva = $doctorid_cond; 
      if (!isset($doctorid_input_2) || $doctorid_input_2 == "")
      {
          $doctorid_input_2 = $doctorid;
      }
      $paymentid_cond_salva = $paymentid_cond; 
      if (!isset($paymentid_input_2) || $paymentid_input_2 == "")
      {
          $paymentid_input_2 = $paymentid;
      }
      $statusid_cond_salva = $statusid_cond; 
      if (!isset($statusid_input_2) || $statusid_input_2 == "")
      {
          $statusid_input_2 = $statusid;
      }
      $institutionid_cond_salva = $institutionid_cond; 
      if (!isset($institutionid_input_2) || $institutionid_input_2 == "")
      {
          $institutionid_input_2 = $institutionid;
      }
      $staffid_cond_salva = $staffid_cond; 
      if (!isset($staffid_input_2) || $staffid_input_2 == "")
      {
          $staffid_input_2 = $staffid;
      }
      $tmp_pos = strpos($doctorid, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $doctorid;
      }
      else {
          $L_lookup = substr($doctorid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['doctorid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Doctor : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($paymentid, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $paymentid;
      }
      else {
          $L_lookup = substr($paymentid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['paymentid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Payment : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      if (is_array($statusid)) {
          foreach ($statusid as $I => $Val) {
              $tmp_pos = strpos($Val, "##@@");
              if ($tmp_pos === false) {
                  $L_lookup = $Val;
              }
              else {
                  $L_lookup = substr($Val, 0, $tmp_pos);
              }
              if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && trim($L_lookup) != '' && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['statusid'])) {
                  if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Status : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  break;
              }
          }
      }
      $tmp_pos = strpos($institutionid, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $institutionid;
      }
      else {
          $L_lookup = substr($institutionid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['institutionid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Institution ID : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($staffid, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $staffid;
      }
      else {
          $L_lookup = substr($staffid, 0, $tmp_pos);
      }
      if ($this->NM_ajax_opcao != "ajax_grid_search_change_fil" && !empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['psq_check_ret']['staffid'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Staff : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_dia'] = $regdate_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_mes'] = $regdate_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_ano'] = $regdate_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_input_2_dia'] = $regdate_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_input_2_mes'] = $regdate_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_input_2_ano'] = $regdate_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_cond'] = $regdate_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_dia'] = $servicedate_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_mes'] = $servicedate_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_ano'] = $servicedate_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_input_2_dia'] = $servicedate_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_input_2_mes'] = $servicedate_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_input_2_ano'] = $servicedate_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_cond'] = $servicedate_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_dia'] = $finishdate_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_mes'] = $finishdate_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_ano'] = $finishdate_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_input_2_dia'] = $finishdate_input_2_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_input_2_mes'] = $finishdate_input_2_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_input_2_ano'] = $finishdate_input_2_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_cond'] = $finishdate_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['doctorid'] = $doctorid; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['doctorid_cond'] = $doctorid_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['paymentid'] = $paymentid; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['paymentid_cond'] = $paymentid_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['statusid'] = $statusid; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['statusid_cond'] = $statusid_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['institutionid'] = $institutionid; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['institutionid_cond'] = $institutionid_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['staffid'] = $staffid; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['staffid_cond'] = $staffid_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($this->NM_ajax_flag && $this->NM_ajax_opcao == "ajax_grid_search")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca'] = $Temp_Busca;
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $Conteudo = $doctorid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['doctorid'] = $Conteudo;
      $Conteudo = $paymentid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['paymentid'] = $Conteudo;
      $this->cmp_formatado['statusid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['statusid'];
      $this->cmp_formatado['statusid_input_2'] = $statusid_input_2;
      $Conteudo = $institutionid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['institutionid'] = $Conteudo;
      $Conteudo = $staffid;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['staffid'] = $Conteudo;

      //----- $regdate
      $this->Date_part = false;
      if ($regdate_cond != "bi_TP")
      {
          $regdate_cond = strtoupper($regdate_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $regdate_ano;
          $Dtxt .= $regdate_mes;
          $Dtxt .= $regdate_dia;
          $val[0]['ano'] = $regdate_ano;
          $val[0]['mes'] = $regdate_mes;
          $val[0]['dia'] = $regdate_dia;
          if ($regdate_cond == "BW")
          {
              $val[1]['ano'] = $regdate_input_2_ano;
              $val[1]['mes'] = $regdate_input_2_mes;
              $val[1]['dia'] = $regdate_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->nm_prep_date($val, "DT", "DATETIME", $regdate_cond, "", "data");
          }
          else
          {
              $this->nm_prep_date($val, "DT", "DATE", $regdate_cond, "", "data");
          }
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $regdate = $val[0];
          $this->cmp_formatado['regdate'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['regdate'], "YYYY-MM-DD");
          $this->cmp_formatado['regdate'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          if ($regdate_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $regdate_input_2     = $val[1];
              $this->cmp_formatado['regdate_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['regdate_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['regdate_input_2'], "YYYY-MM-DD");
              $this->cmp_formatado['regdate_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "dmY"));
          }
          if (!empty($Dtxt) || $regdate_cond == "NU" || $regdate_cond == "NN"|| $regdate_cond == "EP"|| $regdate_cond == "NE")
          {
              $this->monta_condicao("a.regDate", $regdate_cond, $regdate, $regdate_input_2, 'regdate', 'DATE');
          }
      }

      //----- $servicedate
      $this->Date_part = false;
      if ($servicedate_cond != "bi_TP")
      {
          $servicedate_cond = strtoupper($servicedate_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $servicedate_ano;
          $Dtxt .= $servicedate_mes;
          $Dtxt .= $servicedate_dia;
          $val[0]['ano'] = $servicedate_ano;
          $val[0]['mes'] = $servicedate_mes;
          $val[0]['dia'] = $servicedate_dia;
          if ($servicedate_cond == "BW")
          {
              $val[1]['ano'] = $servicedate_input_2_ano;
              $val[1]['mes'] = $servicedate_input_2_mes;
              $val[1]['dia'] = $servicedate_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DT", "DATETIME", $servicedate_cond, "", "data");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $servicedate = $val[0];
          $this->cmp_formatado['servicedate'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['servicedate'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['servicedate'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          if ($servicedate_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $servicedate_input_2     = $val[1];
              $this->cmp_formatado['servicedate_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['servicedate_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['servicedate_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['servicedate_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          }
          if (!empty($Dtxt) || $servicedate_cond == "NU" || $servicedate_cond == "NN"|| $servicedate_cond == "EP"|| $servicedate_cond == "NE")
          {
              $this->monta_condicao("a.serviceDate", $servicedate_cond, $servicedate, $servicedate_input_2, 'servicedate', 'DATETIME');
          }
      }

      //----- $finishdate
      $this->Date_part = false;
      if ($finishdate_cond != "bi_TP")
      {
          $finishdate_cond = strtoupper($finishdate_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $finishdate_ano;
          $Dtxt .= $finishdate_mes;
          $Dtxt .= $finishdate_dia;
          $val[0]['ano'] = $finishdate_ano;
          $val[0]['mes'] = $finishdate_mes;
          $val[0]['dia'] = $finishdate_dia;
          if ($finishdate_cond == "BW")
          {
              $val[1]['ano'] = $finishdate_input_2_ano;
              $val[1]['mes'] = $finishdate_input_2_mes;
              $val[1]['dia'] = $finishdate_input_2_dia;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DT", "DATETIME", $finishdate_cond, "", "data");
          if (!$this->Date_part) {
              $val[0] = $this->Ini->sc_Date_Protect($val[0]);
          }
          $finishdate = $val[0];
          $this->cmp_formatado['finishdate'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['finishdate'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['finishdate'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          if ($finishdate_cond == "BW")
          {
              if (!$this->Date_part) {
                  $val[1] = $this->Ini->sc_Date_Protect($val[1]);
              }
              $finishdate_input_2     = $val[1];
              $this->cmp_formatado['finishdate_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']['finishdate_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['finishdate_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['finishdate_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          }
          if (!empty($Dtxt) || $finishdate_cond == "NU" || $finishdate_cond == "NN"|| $finishdate_cond == "EP"|| $finishdate_cond == "NE")
          {
              $this->monta_condicao("a.finishDate", $finishdate_cond, $finishdate, $finishdate_input_2, 'finishdate', 'DATETIME');
          }
      }

      //----- $doctorid
      $this->Date_part = false;
      if (isset($doctorid))
      {
         $this->monta_condicao("a.doctorID", $doctorid_cond, $doctorid, "", "doctorid");
      }

      //----- $paymentid
      $this->Date_part = false;
      if (isset($paymentid))
      {
         $this->monta_condicao("a.paymentID", $paymentid_cond, $paymentid, "", "paymentid");
      }

      //----- $statusid
      $this->Date_part = false;
      $statusid = $statusid; 
      $nm_aspas = "";
      if ($statusid_cond == "nu" || $statusid_cond == "nn" || $statusid_cond == "ep" || $statusid_cond == "ne")
      {
          $statusid = array();
      }
      if (is_array($statusid) && count($statusid) != 0)
      {
         foreach ($statusid as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if (($tmp_pos === false && $dados == "") || $tmp_pos == 0)
            {
                unset($statusid[$i]);
            }
         }
      }
      if (is_array($statusid) && count($statusid) != 0)
      {
         $this->and_or();
         if ($statusid_cond == "df" || $statusid_cond == "np")
         {
             $this->comando        .= " a.statusID not in (";
             $this->comando_sum    .= " outpatient_reg.a.statusID not in (";
             $this->comando_filtro .= " a.statusID not in (";
         }
         else
         {
             $this->comando        .= " a.statusID in (";
             $this->comando_sum    .= " outpatient_reg.a.statusID in (";
             $this->comando_filtro .= " a.statusID in (";
         }
         $x                     = count($statusid);
         $xx                    = 0;
         $nm_cond               = "";
         foreach ($statusid as $i => $dados)
         {
            $tmp_pos = strpos($dados, "##@@");
            if ($tmp_pos === false)
            {
               $res_lookup = $dados;
            }
            else
            {
                $res_lookup = substr($dados, $tmp_pos + 4);
                $dados = substr($dados, 0, $tmp_pos);
            }
            $dados  = substr($this->Db->qstr($dados), 1, -1);
            $this->comando        .= "" . $nm_aspas . $dados . $nm_aspas . "";
            $this->comando_sum    .= "" . $nm_aspas . $dados . $nm_aspas . "";
            $this->comando_filtro .= "" . $nm_aspas . $dados . $nm_aspas . "";
            $nm_cond              .= $res_lookup;
            if ($xx != ($x - 1))
            {
               $this->comando        .= ",";
               $this->comando_sum    .= ",";
               $this->comando_filtro .= ",";
               $nm_cond              .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
            }
            $xx++;
         }
         $this->comando        .= ")";
         $this->comando_sum    .= ")";
         $this->comando_filtro .= ")";
         $Lang_descr = array();
         $Lang_descr['eq'] = $this->Ini->Nm_lang['lang_srch_equl'];
         $Lang_descr['df'] = $this->Ini->Nm_lang['lang_srch_diff'];
         $Lang_descr['np'] = $this->Ini->Nm_lang['lang_srch_not_like'];
         $Lang_descr_final = isset($Lang_descr[$statusid_cond]) ? $Lang_descr[$statusid_cond] : $this->Ini->Nm_lang['lang_srch_like'];
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $nmgp_tab_label['statusid'] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
      }
      elseif (isset($statusid) || $statusid_cond == "nu" || $statusid_cond == "nn" || $statusid_cond == "ep" || $statusid_cond == "ne")
      {
         $this->monta_condicao("a.statusID", $statusid_cond, $statusid, "", "statusid");
      }

      //----- $institutionid
      $this->Date_part = false;
      if (isset($institutionid))
      {
         $this->monta_condicao("a.institutionID", $institutionid_cond, $institutionid, "", "institutionid");
      }

      //----- $staffid
      $this->Date_part = false;
      if (isset($staffid))
      {
         $this->monta_condicao("a.staffID", $staffid_cond, $staffid, "", "staffid");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['dyn_search']      = array();
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_dyn_search'] = "";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq_fast'] = "";
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['fast_search']);
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca']) && $_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['campos_busca'], "UTF-8", $_SESSION['scriptcase']['charset']);
      }

      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq_ant'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_his_outpatient_reg']['where_pesq'];

      $this->retorna_pesq();
   }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   
   function css_obj_select_ajax($Obj)
   {
      switch ($Obj)
      {
         case "doctorid" : return ('class="scFilterObjectOdd"'); break;
         case "paymentid" : return ('class="scFilterObjectEven"'); break;
         case "institutionid" : return ('class="scFilterObjectEven"'); break;
         case "staffid" : return ('class="scFilterObjectOdd"'); break;
         default       : return ("");
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
}

?>
