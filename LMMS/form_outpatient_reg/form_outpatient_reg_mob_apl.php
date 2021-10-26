<?php
//
class form_outpatient_reg_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id;
   var $patientid;
   var $deptid;
   var $deptid_1;
   var $doctorid;
   var $doctorid_1;
   var $queueno;
   var $regdate;
   var $regtime;
   var $finishdate;
   var $finishdate_hora;
   var $servicedate;
   var $servicedate_hora;
   var $trancode;
   var $statusid;
   var $statusid_1;
   var $paymentid;
   var $paymentid_1;
   var $institutionid;
   var $institutionid_1;
   var $institutionno;
   var $staffid;
   var $staffid_1;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['deptid']))
          {
              $this->deptid = $this->NM_ajax_info['param']['deptid'];
          }
          if (isset($this->NM_ajax_info['param']['doctorid']))
          {
              $this->doctorid = $this->NM_ajax_info['param']['doctorid'];
          }
          if (isset($this->NM_ajax_info['param']['finishdate']))
          {
              $this->finishdate = $this->NM_ajax_info['param']['finishdate'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['institutionid']))
          {
              $this->institutionid = $this->NM_ajax_info['param']['institutionid'];
          }
          if (isset($this->NM_ajax_info['param']['institutionno']))
          {
              $this->institutionno = $this->NM_ajax_info['param']['institutionno'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['patientid']))
          {
              $this->patientid = $this->NM_ajax_info['param']['patientid'];
          }
          if (isset($this->NM_ajax_info['param']['paymentid']))
          {
              $this->paymentid = $this->NM_ajax_info['param']['paymentid'];
          }
          if (isset($this->NM_ajax_info['param']['queueno']))
          {
              $this->queueno = $this->NM_ajax_info['param']['queueno'];
          }
          if (isset($this->NM_ajax_info['param']['regdate']))
          {
              $this->regdate = $this->NM_ajax_info['param']['regdate'];
          }
          if (isset($this->NM_ajax_info['param']['regtime']))
          {
              $this->regtime = $this->NM_ajax_info['param']['regtime'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['servicedate']))
          {
              $this->servicedate = $this->NM_ajax_info['param']['servicedate'];
          }
          if (isset($this->NM_ajax_info['param']['staffid']))
          {
              $this->staffid = $this->NM_ajax_info['param']['staffid'];
          }
          if (isset($this->NM_ajax_info['param']['statusid']))
          {
              $this->statusid = $this->NM_ajax_info['param']['statusid'];
          }
          if (isset($this->NM_ajax_info['param']['trancode']))
          {
              $this->trancode = $this->NM_ajax_info['param']['trancode'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->usr_login) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_POST["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_GET["usr_login"]) && isset($this->usr_login)) 
      {
          $_SESSION['usr_login'] = $this->usr_login;
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_outpatient_reg_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (isset($this->usr_login)) 
          {
              $_SESSION['usr_login'] = $this->usr_login;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->finishdate);
          $this->finishdate      = $aDtParts[0];
          $this->finishdate_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->servicedate);
          $this->servicedate      = $aDtParts[0];
          $this->servicedate_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_outpatient_reg_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_outpatient_reg_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_outpatient_reg_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_outpatient_reg_mob'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_outpatient_reg_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_outpatient_reg_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_outpatient_reg_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_outpatient_reg_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " outpatient register";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_outpatient_reg_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';


      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Cancel Register";
      $this->arr_buttons['sc_btn_0']['display']          = "text_fontawesomeicon";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "google";
      $this->arr_buttons['sc_btn_0']['image']            = "";
      $this->arr_buttons['sc_btn_0']['has_fa']            = "true";
      $this->arr_buttons['sc_btn_0']['fontawesomeicon']            = "fas fa-ban";

      $this->arr_buttons['group_group_2']= array(
          'value'            => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'hint'             => "" . $this->Ini->Nm_lang['lang_btns_options'] . "",
          'type'             => "button",
          'display'          => "text_fontawesomeicon",
          'display_position' => "text_right",
          'image'            => "scriptcase__NM__gear.png",
          'fontawesomeicon'  => "fas fa-cog",
          'has_fa'           => true,
          'content_icons'    => false,
          'style'            => "default",
      );


      $_SESSION['scriptcase']['error_icon']['form_outpatient_reg_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_outpatient_reg_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "on";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_outpatient_reg_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_outpatient_reg_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_outpatient_reg_mob'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form'];
          if (!isset($this->id)){$this->id = $this->nmgp_dados_form['id'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['finishdate'] != "null"){
              $aDtParts = explode(' ', $this->nmgp_dados_form['finishdate']);
              $this->finishdate = $this->nm_conv_data_db($aDtParts[0], 'yyyy-mm-dd', $this->field_config['finishdate']['date_format']);
              $this->finishdate_hora = $aDtParts[1];
              $aDtParts = explode(';', $this->finishdate);
              $this->finishdate = $aDtParts[0];
          }
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['servicedate'] != "null"){
              $aDtParts = explode(' ', $this->nmgp_dados_form['servicedate']);
              $this->servicedate = $this->nm_conv_data_db($aDtParts[0], 'yyyy-mm-dd', $this->field_config['servicedate']['date_format']);
              $this->servicedate_hora = $aDtParts[1];
              $aDtParts = explode(';', $this->servicedate);
              $this->servicedate = $aDtParts[0];
          }
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['trancode'] != "null"){$this->trancode = $this->nmgp_dados_form['trancode'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_outpatient_reg_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
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
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_outpatient_reg/form_outpatient_reg_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_outpatient_reg_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_outpatient_reg_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_outpatient_reg_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_outpatient_reg/form_outpatient_reg_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_outpatient_reg_mob_erro.class.php"); 
      }
      $this->Erro      = new form_outpatient_reg_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_outpatient_reg_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['botoes']['sc_btn_0'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
      if (isset($this->patientid)) { $this->nm_limpa_alfa($this->patientid); }
      if (isset($this->deptid)) { $this->nm_limpa_alfa($this->deptid); }
      if (isset($this->doctorid)) { $this->nm_limpa_alfa($this->doctorid); }
      if (isset($this->queueno)) { $this->nm_limpa_alfa($this->queueno); }
      if (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
      if (isset($this->statusid)) { $this->nm_limpa_alfa($this->statusid); }
      if (isset($this->paymentid)) { $this->nm_limpa_alfa($this->paymentid); }
      if (isset($this->institutionid)) { $this->nm_limpa_alfa($this->institutionid); }
      if (isset($this->institutionno)) { $this->nm_limpa_alfa($this->institutionno); }
      if (isset($this->staffid)) { $this->nm_limpa_alfa($this->staffid); }
      if ($nm_opc_lookup == "lookup")
      { 
          if ($GLOBALS['F'] == "patientid")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $this->patientid = $array_vars[0];
              $patientid       = $this->patientid;
              $this->patientid       = $patientid;
              $this->lookup_patientid($conteudo);
              $conteudo = str_replace("&", "&amp;", $conteudo); 
              $conteudo = str_replace("\/" , "\/", $conteudo); 
              echo "<html><head></head>";
              echo " <body onload=\"p=document.layers?parentLayer:window.parent;p.jsrsLoaded('" . $GLOBALS['C'] . "');\">";
              echo "  jsrsPayload:";
              echo "  <br>";
              echo "  <form name=\"jsrs_Form\"><textarea name=\"jsrs_Payload\">";
              echo "$conteudo";
              echo " </textarea></form></body></html>";
          } 
          $this->NM_close_db(); 
          exit;
      } 
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "sc_btn_0")
          { 
              $this->sc_btn_sc_btn_0();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- trancode
      $this->field_config['trancode']               = array();
      $this->field_config['trancode']['symbol_grp'] = '';
      $this->field_config['trancode']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['trancode']['symbol_dec'] = '';
      $this->field_config['trancode']['symbol_neg'] = '-';
      $this->field_config['trancode']['format_neg'] = '2';
      //-- regdate
      $this->field_config['regdate']                 = array();
      $this->field_config['regdate']['date_format']  = "aaaa/mm/dd";
      $this->field_config['regdate']['date_sep']     = "/";
      $this->field_config['regdate']['date_display'] = "aaaa/mm/dd";
      $this->new_date_format('DT', 'regdate');
      //-- regtime
      $this->field_config['regtime']                 = array();
      $this->field_config['regtime']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['regtime']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['regtime']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'regtime');
      //-- finishdate
      $this->field_config['finishdate']                 = array();
      $this->field_config['finishdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['finishdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['finishdate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['finishdate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'finishdate');
      //-- servicedate
      $this->field_config['servicedate']                 = array();
      $this->field_config['servicedate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['servicedate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['servicedate']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['servicedate']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'servicedate');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_trancode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'trancode');
          }
          if ('validate_patientid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'patientid');
          }
          if ('validate_regdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regdate');
          }
          if ('validate_regtime' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'regtime');
          }
          if ('validate_queueno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'queueno');
          }
          if ('validate_deptid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'deptid');
          }
          if ('validate_doctorid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'doctorid');
          }
          if ('validate_finishdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'finishdate');
          }
          if ('validate_servicedate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'servicedate');
          }
          if ('validate_paymentid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'paymentid');
          }
          if ('validate_institutionid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'institutionid');
          }
          if ('validate_institutionno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'institutionno');
          }
          if ('validate_statusid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'statusid');
          }
          if ('validate_staffid' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'staffid');
          }
          form_outpatient_reg_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_doctorid_onchange' == $this->NM_ajax_opcao)
          {
              $this->doctorID_onChange();
          }
          if ('event_regdate_onchange' == $this->NM_ajax_opcao)
          {
              $this->regDate_onChange();
          }
          form_outpatient_reg_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['trancode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->trancode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['trancode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['regdate']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->regdate = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['regdate'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['regtime']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->regtime = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['regtime'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['queueno']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->queueno = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['queueno'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['finishdate']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->finishdate = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['finishdate'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['servicedate']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->servicedate = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['servicedate'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['staffid']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->staffid = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']['staffid'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_outpatient_reg_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_outpatient_reg_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_outpatient_reg_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_outpatient_reg_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_outpatient_reg_mob.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
           {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                }
                else
                {
                    chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                }
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           if (!empty($str_zip)) {
               exec($str_zip);
           }
           // ----- ZIP log
           $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
           if ($fp)
           {
               @fwrite($fp, $str_zip . "\r\n\r\n");
               @fclose($fp);
           }
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               if (!empty($str_zip)) {
                   exec($str_zip);
               }
               // ----- ZIP log
               $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
               if ($fp)
               {
                   @fwrite($fp, $str_zip . "\r\n\r\n");
                   @fclose($fp);
               }
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " outpatient register") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_outpatient_reg_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_outpatient_reg_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_outpatient_reg_mob.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function lookup_patientid(&$conteudo)
   {
      global  $patientid;
      $guarda_formatado = $this->formatado;
      $this->nm_tira_formatacao();
      $Salva_opc = $this->nmgp_opcao;
      $this->nmgp_opcao = "lookup_rpc";
      $this->nm_converte_datas();
      $this->nmgp_opcao = $Salva_opc;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      $nm_comando = "SELECT name 
FROM patient_settings 
WHERE patientCode = '$this->patientid' 
ORDER BY name"; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      {
          $conteudo = (isset($rs->fields[0])) ? $rs->fields[0] : ""; 
          $rs->Close() ; 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      {  
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0; 
      foreach ($this->Before_unformat as $Cmp => $Val)
      {
          $this->$Cmp = $Val;
          $this->formatado = $guarda_formatado;
      }
   }
   function sc_btn_sc_btn_0() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("form_outpatient_reg_mob_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->trancode) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form']['trancode']))
          {
              $varloc_btn_php['trancode'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form']['trancode'];
          }
      }
      $nm_f_saida = "form_outpatient_reg_mob.php";
      nm_limpa_numero($this->trancode, $this->field_config['trancode']['symbol_grp']) ; 
      nm_limpa_data($this->regdate, $this->field_config['regdate']['date_sep']) ; 
      nm_limpa_hora($this->regtime, $this->field_config['regtime']['time_sep']) ; 
      nm_limpa_data($this->finishdate, $this->field_config['finishdate']['date_sep']) ; 
      nm_limpa_hora($this->finishdate_hora, $this->field_config['finishdate']['time_sep']) ; 
      nm_limpa_data($this->servicedate, $this->field_config['servicedate']['date_sep']) ; 
      nm_limpa_hora($this->servicedate_hora, $this->field_config['servicedate']['time_sep']) ; 
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'on';
  $update_table  = 'outpatient_reg';      
$update_where  = "tranCode = '$this->trancode'"; 
$update_fields = array(   
	 "`status` = '0'",
 );

$update_sql = 'UPDATE ' . $update_table
    . ' SET '   . implode(', ', $update_fields)
    . ' WHERE ' . $update_where;

     $nm_select = $update_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_outpatient_reg_mob_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="id" value="<?php echo $this->form_encode_input($this->id) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'trancode':
               return "Transaction Code";
               break;
           case 'patientid':
               return "Patient";
               break;
           case 'regdate':
               return "Reg Date";
               break;
           case 'regtime':
               return "Reg Time";
               break;
           case 'queueno':
               return "Queue Num";
               break;
           case 'deptid':
               return "Clinic";
               break;
           case 'doctorid':
               return "Doctor";
               break;
           case 'finishdate':
               return "Finish Date";
               break;
           case 'servicedate':
               return "Service Date";
               break;
           case 'paymentid':
               return "Payment";
               break;
           case 'institutionid':
               return "Institution";
               break;
           case 'institutionno':
               return "Institution Num";
               break;
           case 'statusid':
               return "Status";
               break;
           case 'staffid':
               return "Staff";
               break;
           case 'id':
               return "ID";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_outpatient_reg_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_outpatient_reg_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_outpatient_reg_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_outpatient_reg_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'trancode' == $filtro)
        $this->ValidateField_trancode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'patientid' == $filtro)
        $this->ValidateField_patientid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'regdate' == $filtro)
        $this->ValidateField_regdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'regtime' == $filtro)
        $this->ValidateField_regtime($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'queueno' == $filtro)
        $this->ValidateField_queueno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'deptid' == $filtro)
        $this->ValidateField_deptid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'doctorid' == $filtro)
        $this->ValidateField_doctorid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'finishdate' == $filtro)
        $this->ValidateField_finishdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'servicedate' == $filtro)
        $this->ValidateField_servicedate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'paymentid' == $filtro)
        $this->ValidateField_paymentid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'institutionid' == $filtro)
        $this->ValidateField_institutionid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'institutionno' == $filtro)
        $this->ValidateField_institutionno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'statusid' == $filtro)
        $this->ValidateField_statusid($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'staffid' == $filtro)
        $this->ValidateField_staffid($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_trancode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->trancode, $this->field_config['trancode']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->trancode != '')  
          { 
              $iTestSize = 15;
              if (strlen($this->trancode) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Transaction Code: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['trancode']))
                  {
                      $Campos_Erros['trancode'] = array();
                  }
                  $Campos_Erros['trancode'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['trancode']) || !is_array($this->NM_ajax_info['errList']['trancode']))
                  {
                      $this->NM_ajax_info['errList']['trancode'] = array();
                  }
                  $this->NM_ajax_info['errList']['trancode'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->trancode, 15, 0, -0, 1.0E+15, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Transaction Code; " ; 
                  if (!isset($Campos_Erros['trancode']))
                  {
                      $Campos_Erros['trancode'] = array();
                  }
                  $Campos_Erros['trancode'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['trancode']) || !is_array($this->NM_ajax_info['errList']['trancode']))
                  {
                      $this->NM_ajax_info['errList']['trancode'] = array();
                  }
                  $this->NM_ajax_info['errList']['trancode'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'trancode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_trancode

    function ValidateField_patientid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->patientid) > 15) 
          { 
              $hasError = true;
              $Campos_Crit .= "Patient " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['patientid']))
              {
                  $Campos_Erros['patientid'] = array();
              }
              $Campos_Erros['patientid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['patientid']) || !is_array($this->NM_ajax_info['errList']['patientid']))
              {
                  $this->NM_ajax_info['errList']['patientid'] = array();
              }
              $this->NM_ajax_info['errList']['patientid'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 15 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'patientid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_patientid

    function ValidateField_regdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->regdate, $this->field_config['regdate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['regdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['regdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['regdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['regdate']['date_sep']) ; 
          if (trim($this->regdate) != "")  
          { 
              if ($teste_validade->Data($this->regdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Reg Date; " ; 
                  if (!isset($Campos_Erros['regdate']))
                  {
                      $Campos_Erros['regdate'] = array();
                  }
                  $Campos_Erros['regdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['regdate']) || !is_array($this->NM_ajax_info['errList']['regdate']))
                  {
                      $this->NM_ajax_info['errList']['regdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['regdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['regdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'regdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_regdate

    function ValidateField_regtime(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->regtime, $this->field_config['regtime']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['regtime']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['regtime']['time_sep']) ; 
          if (trim($this->regtime) != "")  
          { 
              if ($teste_validade->Hora($this->regtime, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Reg Time; " ; 
                  if (!isset($Campos_Erros['regtime']))
                  {
                      $Campos_Erros['regtime'] = array();
                  }
                  $Campos_Erros['regtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['regtime']) || !is_array($this->NM_ajax_info['errList']['regtime']))
                  {
                      $this->NM_ajax_info['errList']['regtime'] = array();
                  }
                  $this->NM_ajax_info['errList']['regtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'regtime';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_regtime

    function ValidateField_queueno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->queueno) > 5) 
          { 
              $hasError = true;
              $Campos_Crit .= "Queue Num " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['queueno']))
              {
                  $Campos_Erros['queueno'] = array();
              }
              $Campos_Erros['queueno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['queueno']) || !is_array($this->NM_ajax_info['errList']['queueno']))
              {
                  $this->NM_ajax_info['errList']['queueno'] = array();
              }
              $this->NM_ajax_info['errList']['queueno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 5 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'queueno';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_queueno

    function ValidateField_deptid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->deptid == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'deptid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_deptid

    function ValidateField_doctorid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->doctorid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']) && !in_array($this->doctorid, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['doctorid']))
                   {
                       $Campos_Erros['doctorid'] = array();
                   }
                   $Campos_Erros['doctorid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['doctorid']) || !is_array($this->NM_ajax_info['errList']['doctorid']))
                   {
                       $this->NM_ajax_info['errList']['doctorid'] = array();
                   }
                   $this->NM_ajax_info['errList']['doctorid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'doctorid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_doctorid

    function ValidateField_finishdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->finishdate, $this->field_config['finishdate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['finishdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['finishdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['finishdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['finishdate']['date_sep']) ; 
          if (trim($this->finishdate) != "")  
          { 
              if ($teste_validade->Data($this->finishdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Finish Date; " ; 
                  if (!isset($Campos_Erros['finishdate']))
                  {
                      $Campos_Erros['finishdate'] = array();
                  }
                  $Campos_Erros['finishdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['finishdate']) || !is_array($this->NM_ajax_info['errList']['finishdate']))
                  {
                      $this->NM_ajax_info['errList']['finishdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['finishdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['finishdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'finishdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->finishdate_hora, $this->field_config['finishdate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['finishdate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['finishdate_hora']['time_sep']) ; 
          if (trim($this->finishdate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->finishdate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Finish Date; " ; 
                  if (!isset($Campos_Erros['finishdate_hora']))
                  {
                      $Campos_Erros['finishdate_hora'] = array();
                  }
                  $Campos_Erros['finishdate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['finishdate']) || !is_array($this->NM_ajax_info['errList']['finishdate']))
                  {
                      $this->NM_ajax_info['errList']['finishdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['finishdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['finishdate']) && isset($Campos_Erros['finishdate_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['finishdate'], $Campos_Erros['finishdate_hora']);
          if (empty($Campos_Erros['finishdate_hora']))
          {
              unset($Campos_Erros['finishdate_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['finishdate']))
          {
              $this->NM_ajax_info['errList']['finishdate'] = array_unique($this->NM_ajax_info['errList']['finishdate']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'finishdate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_finishdate_hora

    function ValidateField_servicedate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->servicedate, $this->field_config['servicedate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['servicedate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['servicedate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['servicedate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['servicedate']['date_sep']) ; 
          if (trim($this->servicedate) != "")  
          { 
              if ($teste_validade->Data($this->servicedate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Service Date; " ; 
                  if (!isset($Campos_Erros['servicedate']))
                  {
                      $Campos_Erros['servicedate'] = array();
                  }
                  $Campos_Erros['servicedate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['servicedate']) || !is_array($this->NM_ajax_info['errList']['servicedate']))
                  {
                      $this->NM_ajax_info['errList']['servicedate'] = array();
                  }
                  $this->NM_ajax_info['errList']['servicedate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['servicedate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servicedate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->servicedate_hora, $this->field_config['servicedate_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['servicedate_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['servicedate_hora']['time_sep']) ; 
          if (trim($this->servicedate_hora) != "")  
          { 
              if ($teste_validade->Hora($this->servicedate_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Service Date; " ; 
                  if (!isset($Campos_Erros['servicedate_hora']))
                  {
                      $Campos_Erros['servicedate_hora'] = array();
                  }
                  $Campos_Erros['servicedate_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['servicedate']) || !is_array($this->NM_ajax_info['errList']['servicedate']))
                  {
                      $this->NM_ajax_info['errList']['servicedate'] = array();
                  }
                  $this->NM_ajax_info['errList']['servicedate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['servicedate']) && isset($Campos_Erros['servicedate_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['servicedate'], $Campos_Erros['servicedate_hora']);
          if (empty($Campos_Erros['servicedate_hora']))
          {
              unset($Campos_Erros['servicedate_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['servicedate']))
          {
              $this->NM_ajax_info['errList']['servicedate'] = array_unique($this->NM_ajax_info['errList']['servicedate']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'servicedate_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_servicedate_hora

    function ValidateField_paymentid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->paymentid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']) && !in_array($this->paymentid, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['paymentid']))
                   {
                       $Campos_Erros['paymentid'] = array();
                   }
                   $Campos_Erros['paymentid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['paymentid']) || !is_array($this->NM_ajax_info['errList']['paymentid']))
                   {
                       $this->NM_ajax_info['errList']['paymentid'] = array();
                   }
                   $this->NM_ajax_info['errList']['paymentid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'paymentid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_paymentid

    function ValidateField_institutionid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->institutionid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']) && !in_array($this->institutionid, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['institutionid']))
                   {
                       $Campos_Erros['institutionid'] = array();
                   }
                   $Campos_Erros['institutionid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['institutionid']) || !is_array($this->NM_ajax_info['errList']['institutionid']))
                   {
                       $this->NM_ajax_info['errList']['institutionid'] = array();
                   }
                   $this->NM_ajax_info['errList']['institutionid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'institutionid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_institutionid

    function ValidateField_institutionno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->institutionno) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Institution Num " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['institutionno']))
              {
                  $Campos_Erros['institutionno'] = array();
              }
              $Campos_Erros['institutionno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['institutionno']) || !is_array($this->NM_ajax_info['errList']['institutionno']))
              {
                  $this->NM_ajax_info['errList']['institutionno'] = array();
              }
              $this->NM_ajax_info['errList']['institutionno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'institutionno';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_institutionno

    function ValidateField_statusid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->statusid == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->statusid === "" || is_null($this->statusid))  
      { 
          $this->statusid = 0;
          $this->sc_force_zero[] = 'statusid';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'statusid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_statusid

    function ValidateField_staffid(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->staffid) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']) && !in_array($this->staffid, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['staffid']))
                   {
                       $Campos_Erros['staffid'] = array();
                   }
                   $Campos_Erros['staffid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['staffid']) || !is_array($this->NM_ajax_info['errList']['staffid']))
                   {
                       $this->NM_ajax_info['errList']['staffid'] = array();
                   }
                   $this->NM_ajax_info['errList']['staffid'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'staffid';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_staffid

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['trancode'] = $this->trancode;
    $this->nmgp_dados_form['patientid'] = $this->patientid;
    $this->nmgp_dados_form['regdate'] = (strlen(trim($this->regdate)) > 19) ? str_replace(".", ":", $this->regdate) : trim($this->regdate);
    $this->nmgp_dados_form['regtime'] = (strlen(trim($this->regtime)) > 19) ? str_replace(".", ":", $this->regtime) : trim($this->regtime);
    $this->nmgp_dados_form['queueno'] = $this->queueno;
    $this->nmgp_dados_form['deptid'] = $this->deptid;
    $this->nmgp_dados_form['doctorid'] = $this->doctorid;
    $this->nmgp_dados_form['finishdate'] = (strlen(trim($this->finishdate)) > 19) ? str_replace(".", ":", $this->finishdate) : trim($this->finishdate);
    $this->nmgp_dados_form['servicedate'] = (strlen(trim($this->servicedate)) > 19) ? str_replace(".", ":", $this->servicedate) : trim($this->servicedate);
    $this->nmgp_dados_form['paymentid'] = $this->paymentid;
    $this->nmgp_dados_form['institutionid'] = $this->institutionid;
    $this->nmgp_dados_form['institutionno'] = $this->institutionno;
    $this->nmgp_dados_form['statusid'] = $this->statusid;
    $this->nmgp_dados_form['staffid'] = $this->staffid;
    $this->nmgp_dados_form['id'] = $this->id;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['trancode'] = $this->trancode;
      nm_limpa_numero($this->trancode, $this->field_config['trancode']['symbol_grp']) ; 
      $this->Before_unformat['regdate'] = $this->regdate;
      nm_limpa_data($this->regdate, $this->field_config['regdate']['date_sep']) ; 
      $this->Before_unformat['regtime'] = $this->regtime;
      nm_limpa_hora($this->regtime, $this->field_config['regtime']['time_sep']) ; 
      $this->Before_unformat['finishdate'] = $this->finishdate;
      nm_limpa_data($this->finishdate, $this->field_config['finishdate']['date_sep']) ; 
      nm_limpa_hora($this->finishdate_hora, $this->field_config['finishdate']['time_sep']) ; 
      $this->Before_unformat['servicedate'] = $this->servicedate;
      nm_limpa_data($this->servicedate, $this->field_config['servicedate']['date_sep']) ; 
      nm_limpa_hora($this->servicedate_hora, $this->field_config['servicedate']['time_sep']) ; 
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "trancode")
      {
          nm_limpa_numero($this->trancode, $this->field_config['trancode']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ('' !== $this->trancode || (!empty($format_fields) && isset($format_fields['trancode'])))
      {
          nmgp_Form_Num_Val($this->trancode, $this->field_config['trancode']['symbol_grp'], $this->field_config['trancode']['symbol_dec'], "0", "S", $this->field_config['trancode']['format_neg'], "", "", "-", $this->field_config['trancode']['symbol_fmt']) ; 
      }
      if ((!empty($this->regdate) && 'null' != $this->regdate) || (!empty($format_fields) && isset($format_fields['regdate'])))
      {
          nm_volta_data($this->regdate, $this->field_config['regdate']['date_format']) ; 
          nmgp_Form_Datas($this->regdate, $this->field_config['regdate']['date_format'], $this->field_config['regdate']['date_sep']) ;  
      }
      elseif ('null' == $this->regdate || '' == $this->regdate)
      {
          $this->regdate = '';
      }
      if ((!empty($this->regtime) && 'null' != $this->regtime) || (!empty($format_fields) && isset($format_fields['regtime'])))
      {
          nm_volta_hora($this->regtime, $this->field_config['regtime']['date_format']) ; 
          nmgp_Form_Hora($this->regtime, $this->field_config['regtime']['date_format'], $this->field_config['regtime']['time_sep']) ;  
      }
      elseif ('null' == $this->regtime || '' == $this->regtime)
      {
          $this->regtime = '';
      }
      if ((!empty($this->finishdate) && 'null' != $this->finishdate) || (!empty($format_fields) && isset($format_fields['finishdate'])))
      {
          $nm_separa_data = strpos($this->field_config['finishdate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['finishdate']['date_format'];
          $this->field_config['finishdate']['date_format'] = substr($this->field_config['finishdate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->finishdate, " ") ; 
          $this->finishdate_hora = substr($this->finishdate, $separador + 1) ; 
          $this->finishdate = substr($this->finishdate, 0, $separador) ; 
          nm_volta_data($this->finishdate, $this->field_config['finishdate']['date_format']) ; 
          nmgp_Form_Datas($this->finishdate, $this->field_config['finishdate']['date_format'], $this->field_config['finishdate']['date_sep']) ;  
          $this->field_config['finishdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->finishdate_hora, $this->field_config['finishdate']['date_format']) ; 
          nmgp_Form_Hora($this->finishdate_hora, $this->field_config['finishdate']['date_format'], $this->field_config['finishdate']['time_sep']) ;  
          $this->field_config['finishdate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->finishdate || '' == $this->finishdate)
      {
          $this->finishdate_hora = '';
          $this->finishdate = '';
      }
      if ((!empty($this->servicedate) && 'null' != $this->servicedate) || (!empty($format_fields) && isset($format_fields['servicedate'])))
      {
          $nm_separa_data = strpos($this->field_config['servicedate']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['servicedate']['date_format'];
          $this->field_config['servicedate']['date_format'] = substr($this->field_config['servicedate']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->servicedate, " ") ; 
          $this->servicedate_hora = substr($this->servicedate, $separador + 1) ; 
          $this->servicedate = substr($this->servicedate, 0, $separador) ; 
          nm_volta_data($this->servicedate, $this->field_config['servicedate']['date_format']) ; 
          nmgp_Form_Datas($this->servicedate, $this->field_config['servicedate']['date_format'], $this->field_config['servicedate']['date_sep']) ;  
          $this->field_config['servicedate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->servicedate_hora, $this->field_config['servicedate']['date_format']) ; 
          nmgp_Form_Hora($this->servicedate_hora, $this->field_config['servicedate']['date_format'], $this->field_config['servicedate']['time_sep']) ;  
          $this->field_config['servicedate']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->servicedate || '' == $this->servicedate)
      {
          $this->servicedate_hora = '';
          $this->servicedate = '';
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['regdate']['date_format'];
      if ($this->regdate != "")  
      { 
          nm_conv_data($this->regdate, $this->field_config['regdate']['date_format']) ; 
          $this->regdate_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->regdate_hora = substr($this->regdate_hora, 0, -4);
          }
      } 
      if ($this->regdate == "" && $use_null)  
      { 
          $this->regdate = "null" ; 
      } 
      $this->field_config['regdate']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['regtime']['date_format'];
      if ($this->regtime != "")  
      { 
          $this->regtime_hora = $this->regtime;
          $this->regtime = "1900-01-01";
          nm_conv_hora($this->regtime_hora, $this->field_config['regtime']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->regtime_hora = substr($this->regtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->regtime_hora = substr($this->regtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->regtime_hora = substr($this->regtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->regtime_hora = substr($this->regtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->regtime_hora = substr($this->regtime_hora, 0, -4);
          }
          $this->regtime = $this->regtime_hora;
      } 
      if ($this->regtime == "" && $use_null)  
      { 
          $this->regtime = "null" ; 
      } 
      $this->field_config['regtime']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['finishdate']['date_format'];
      if ($this->finishdate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['finishdate']['date_format'], ";") ;
          $this->field_config['finishdate']['date_format'] = substr($this->field_config['finishdate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->finishdate, $this->field_config['finishdate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->finishdate = str_replace('-', '', $this->finishdate);
          }
          $this->field_config['finishdate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->finishdate_hora, $this->field_config['finishdate']['date_format']) ; 
          if ($this->finishdate_hora == "" )  
          { 
              $this->finishdate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4) . "." . substr($this->finishdate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->finishdate_hora = substr($this->finishdate_hora, 0, -4);
          }
          if ($this->finishdate != "")  
          { 
              $this->finishdate .= " " . $this->finishdate_hora ; 
          }
      } 
      if ($this->finishdate == "" && $use_null)  
      { 
          $this->finishdate = "null" ; 
      } 
      $this->field_config['finishdate']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['servicedate']['date_format'];
      if ($this->servicedate != "")  
      { 
          $nm_separa_data = strpos($this->field_config['servicedate']['date_format'], ";") ;
          $this->field_config['servicedate']['date_format'] = substr($this->field_config['servicedate']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->servicedate, $this->field_config['servicedate']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->servicedate = str_replace('-', '', $this->servicedate);
          }
          $this->field_config['servicedate']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->servicedate_hora, $this->field_config['servicedate']['date_format']) ; 
          if ($this->servicedate_hora == "" )  
          { 
              $this->servicedate_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->servicedate_hora = substr($this->servicedate_hora, 0, -4) . "." . substr($this->servicedate_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->servicedate_hora = substr($this->servicedate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->servicedate_hora = substr($this->servicedate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->servicedate_hora = substr($this->servicedate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->servicedate_hora = substr($this->servicedate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->servicedate_hora = substr($this->servicedate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->servicedate_hora = substr($this->servicedate_hora, 0, -4);
          }
          if ($this->servicedate != "")  
          { 
              $this->servicedate .= " " . $this->servicedate_hora ; 
          }
      } 
      if ($this->servicedate == "" && $use_null)  
      { 
          $this->servicedate = "null" ; 
      } 
      $this->field_config['servicedate']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_trancode();
          $this->ajax_return_values_patientid();
          $this->ajax_return_values_regdate();
          $this->ajax_return_values_regtime();
          $this->ajax_return_values_queueno();
          $this->ajax_return_values_deptid();
          $this->ajax_return_values_doctorid();
          $this->ajax_return_values_finishdate();
          $this->ajax_return_values_servicedate();
          $this->ajax_return_values_paymentid();
          $this->ajax_return_values_institutionid();
          $this->ajax_return_values_institutionno();
          $this->ajax_return_values_statusid();
          $this->ajax_return_values_staffid();
          $this->ajax_return_values_id();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_outpatient_reg_mob_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- trancode
   function ajax_return_values_trancode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("trancode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->trancode);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['trancode'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- patientid
   function ajax_return_values_patientid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("patientid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->patientid);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['patientid'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
              $orig_patientid = $this->patientid;
              $patientid      = $this->patientid;
              $this->patientid = $patientid;
              $this->lookup_patientid($conteudo);
              $this->patientid = $orig_patientid;
              $this->NM_ajax_info['fldList']['patientid']['lookupCons'] = form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($conteudo));
          }
   }

          //----- regdate
   function ajax_return_values_regdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("regdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->regdate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['regdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- regtime
   function ajax_return_values_regtime($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("regtime", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->regtime);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['regtime'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- queueno
   function ajax_return_values_queueno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("queueno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->queueno);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['queueno'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- deptid
   function ajax_return_values_deptid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("deptid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->deptid);
              $aLookup = array();
              $this->_tmp_lookup_deptid = $this->deptid;

$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string("Laboratory")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_deptid'][] = '1';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"deptid\"";
          if (isset($this->NM_ajax_info['select_html']['deptid']) && !empty($this->NM_ajax_info['select_html']['deptid']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['deptid'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->deptid == $sValue)
                  {
                      $this->_tmp_lookup_deptid = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['deptid'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['deptid']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['deptid']['valList'][$i] = form_outpatient_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['deptid']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['deptid']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['deptid']['labList'] = $aLabel;
          }
   }

          //----- doctorid
   function ajax_return_values_doctorid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("doctorid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->doctorid);
              $aLookup = array();
              $this->_tmp_lookup_doctorid = $this->doctorid;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'] = array(); 
}
$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('-') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string('-')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'][] = '-';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "SELECT ID, name from doctor_settings ORDER BY ID";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"doctorid\"";
          if (isset($this->NM_ajax_info['select_html']['doctorid']) && !empty($this->NM_ajax_info['select_html']['doctorid']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['doctorid'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->doctorid == $sValue)
                  {
                      $this->_tmp_lookup_doctorid = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['doctorid'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['doctorid']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['doctorid']['valList'][$i] = form_outpatient_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['doctorid']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['doctorid']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['doctorid']['labList'] = $aLabel;
          }
   }

          //----- finishdate
   function ajax_return_values_finishdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("finishdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->finishdate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['finishdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->finishdate . ' ' . $this->finishdate_hora),
              );
          }
   }

          //----- servicedate
   function ajax_return_values_servicedate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("servicedate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->servicedate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['servicedate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->servicedate . ' ' . $this->servicedate_hora),
              );
          }
   }

          //----- paymentid
   function ajax_return_values_paymentid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("paymentid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->paymentid);
              $aLookup = array();
              $this->_tmp_lookup_paymentid = $this->paymentid;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "select ID, name from payment_settings order by ID";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"paymentid\"";
          if (isset($this->NM_ajax_info['select_html']['paymentid']) && !empty($this->NM_ajax_info['select_html']['paymentid']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['paymentid'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->paymentid == $sValue)
                  {
                      $this->_tmp_lookup_paymentid = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['paymentid'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['paymentid']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['paymentid']['valList'][$i] = form_outpatient_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['paymentid']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['paymentid']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['paymentid']['labList'] = $aLabel;
          }
   }

          //----- institutionid
   function ajax_return_values_institutionid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("institutionid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->institutionid);
              $aLookup = array();
              $this->_tmp_lookup_institutionid = $this->institutionid;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'] = array(); 
}
$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "SELECT ID, name  FROM institution_settings where active = '1' and function = '1' ORDER BY ID";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"institutionid\"";
          if (isset($this->NM_ajax_info['select_html']['institutionid']) && !empty($this->NM_ajax_info['select_html']['institutionid']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['institutionid'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->institutionid == $sValue)
                  {
                      $this->_tmp_lookup_institutionid = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['institutionid'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['institutionid']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['institutionid']['valList'][$i] = form_outpatient_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['institutionid']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['institutionid']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['institutionid']['labList'] = $aLabel;
          }
   }

          //----- institutionno
   function ajax_return_values_institutionno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("institutionno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->institutionno);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['institutionno'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- statusid
   function ajax_return_values_statusid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("statusid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->statusid);
              $aLookup = array();
              $this->_tmp_lookup_statusid = $this->statusid;

$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('1') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string("Register")));
$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('2') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string("Handled")));
$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('3') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string("Done")));
$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('4') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string("Completed")));
$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('0') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string("Cancel")));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_statusid'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_statusid'][] = '2';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_statusid'][] = '3';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_statusid'][] = '4';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_statusid'][] = '0';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"statusid\"";
          if (isset($this->NM_ajax_info['select_html']['statusid']) && !empty($this->NM_ajax_info['select_html']['statusid']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['statusid'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->statusid == $sValue)
                  {
                      $this->_tmp_lookup_statusid = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['statusid'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['statusid']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['statusid']['valList'][$i] = form_outpatient_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['statusid']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['statusid']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['statusid']['labList'] = $aLabel;
          }
   }

          //----- staffid
   function ajax_return_values_staffid($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("staffid", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->staffid);
              $aLookup = array();
              $this->_tmp_lookup_staffid = $this->staffid;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'] = array(); 
}
$aLookup[] = array(form_outpatient_reg_mob_pack_protect_string('') => str_replace('<', '&lt;',form_outpatient_reg_mob_pack_protect_string('(AUTO)')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "SELECT ID, name  FROM staff_settings  ORDER BY name";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_outpatient_reg_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"staffid\"";
          if (isset($this->NM_ajax_info['select_html']['staffid']) && !empty($this->NM_ajax_info['select_html']['staffid']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['staffid'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->staffid == $sValue)
                  {
                      $this->_tmp_lookup_staffid = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['staffid'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['staffid']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['staffid']['valList'][$i] = form_outpatient_reg_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['staffid']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['staffid']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['staffid']['labList'] = $aLabel;
          }
   }

          //----- id
   function ajax_return_values_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
               'labList' => array($this->form_format_readonly("id", $this->form_encode_input($sTmpValue))),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((ID < $this->id))";
      if ('' != $sc_where)
      {
          if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
          {
              $sc_where = substr(trim($sc_where), 6);
          }
          if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
          {
              $sc_where = substr(trim($sc_where), 4);
          }
          $sc_where_pos .= ' AND (' . $sc_where . ')';
          $sc_where = ' WHERE ' . $sc_where;
      }
      if ('' != $this->id)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = $rsc->fields[0];
          $rsc->Close();
      }
   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
  $today = date("ym");
$check_sql = "select max(tranCode) from outpatient_reg where tranCode like '$today%'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $lastNoTransaksi = $this->rs[0][0];
	$lastNoUrut = substr($lastNoTransaksi, 4, 5); 
	$nextNoUrut = $lastNoUrut + 1;
	$this->trancode  = $today.sprintf('%05s', $nextNoUrut);
}
		else     
{
	$this->trancode  = $today.sprintf('%05s', '1');
}

$check_sql = "SELECT ID"
   . " FROM staff_settings"
   . " WHERE usr_login = '" . $this->sc_temp_usr_login . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->staffid  = $this->rs[0][0];
}
		else     
{
    $this->staffid  = '1';
}

$check_sql = "SELECT max(queueNo)"
   . " FROM outpatient_reg"
   . " WHERE date_format(regDate,'%Y-%m-%d') = '" . $this->regdate  . "' and doctorID = '" . $this->doctorid  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->queueno  = $this->rs[0][0]+1;
}
		else     
{
	$this->queueno  = 1;
}
if (isset($this->sc_temp_usr_login)) { $_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['trancode'] = $this->trancode;
      $NM_val_form['patientid'] = $this->patientid;
      $NM_val_form['regdate'] = $this->regdate;
      $NM_val_form['regtime'] = $this->regtime;
      $NM_val_form['queueno'] = $this->queueno;
      $NM_val_form['deptid'] = $this->deptid;
      $NM_val_form['doctorid'] = $this->doctorid;
      $NM_val_form['finishdate'] = $this->finishdate;
      $NM_val_form['servicedate'] = $this->servicedate;
      $NM_val_form['paymentid'] = $this->paymentid;
      $NM_val_form['institutionid'] = $this->institutionid;
      $NM_val_form['institutionno'] = $this->institutionno;
      $NM_val_form['statusid'] = $this->statusid;
      $NM_val_form['staffid'] = $this->staffid;
      $NM_val_form['id'] = $this->id;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->deptid === "" || is_null($this->deptid))  
      { 
          $this->deptid = 0;
          $this->sc_force_zero[] = 'deptid';
      } 
      if ($this->doctorid === "" || is_null($this->doctorid))  
      { 
          $this->doctorid = 0;
          $this->sc_force_zero[] = 'doctorid';
      } 
      if ($this->statusid === "" || is_null($this->statusid))  
      { 
          $this->statusid = 0;
          $this->sc_force_zero[] = 'statusid';
      } 
      if ($this->paymentid === "" || is_null($this->paymentid))  
      { 
          $this->paymentid = 0;
          $this->sc_force_zero[] = 'paymentid';
      } 
      if ($this->institutionid === "" || is_null($this->institutionid))  
      { 
          $this->institutionid = 0;
          $this->sc_force_zero[] = 'institutionid';
      } 
      if ($this->staffid === "" || is_null($this->staffid))  
      { 
          $this->staffid = 0;
          $this->sc_force_zero[] = 'staffid';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->patientid_before_qstr = $this->patientid;
          $this->patientid = substr($this->Db->qstr($this->patientid), 1, -1); 
          if ($this->patientid == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->patientid = "null"; 
              $NM_val_null[] = "patientid";
          } 
          $this->queueno_before_qstr = $this->queueno;
          $this->queueno = substr($this->Db->qstr($this->queueno), 1, -1); 
          if ($this->queueno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->queueno = "null"; 
              $NM_val_null[] = "queueno";
          } 
          if ($this->regdate == "")  
          { 
              $this->regdate = "null"; 
              $NM_val_null[] = "regdate";
          } 
          if ($this->regtime == "")  
          { 
              $this->regtime = "null"; 
              $NM_val_null[] = "regtime";
          } 
          if ($this->finishdate == "")  
          { 
              $this->finishdate = "null"; 
              $NM_val_null[] = "finishdate";
          } 
          if ($this->servicedate == "")  
          { 
              $this->servicedate = "null"; 
              $NM_val_null[] = "servicedate";
          } 
          $this->trancode_before_qstr = $this->trancode;
          $this->trancode = substr($this->Db->qstr($this->trancode), 1, -1); 
          if ($this->trancode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->trancode = "null"; 
              $NM_val_null[] = "trancode";
          } 
          $this->institutionno_before_qstr = $this->institutionno;
          $this->institutionno = substr($this->Db->qstr($this->institutionno), 1, -1); 
          if ($this->institutionno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->institutionno = "null"; 
              $NM_val_null[] = "institutionno";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_outpatient_reg_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "patientID = '$this->patientid', deptID = $this->deptid, doctorID = $this->doctorid, queueNo = '$this->queueno', regDate = #$this->regdate#, regTime = #$this->regtime#, finishDate = #$this->finishdate#, serviceDate = #$this->servicedate#, tranCode = '$this->trancode', statusID = $this->statusid, paymentID = $this->paymentid, institutionID = $this->institutionid, institutionNo = '$this->institutionno', staffID = $this->staffid"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "patientID = '$this->patientid', deptID = $this->deptid, doctorID = $this->doctorid, queueNo = '$this->queueno', regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", finishDate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", serviceDate = " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", tranCode = '$this->trancode', statusID = $this->statusid, paymentID = $this->paymentid, institutionID = $this->institutionid, institutionNo = '$this->institutionno', staffID = $this->staffid"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "patientID = '$this->patientid', deptID = $this->deptid, doctorID = $this->doctorid, queueNo = '$this->queueno', regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", finishDate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", serviceDate = " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", tranCode = '$this->trancode', statusID = $this->statusid, paymentID = $this->paymentid, institutionID = $this->institutionid, institutionNo = '$this->institutionno', staffID = $this->staffid"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "patientID = '$this->patientid', deptID = $this->deptid, doctorID = $this->doctorid, queueNo = '$this->queueno', regDate = EXTEND('$this->regdate', YEAR TO DAY), regTime = " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", finishDate = EXTEND('$this->finishdate', YEAR TO FRACTION), serviceDate = EXTEND('$this->servicedate', YEAR TO FRACTION), tranCode = '$this->trancode', statusID = $this->statusid, paymentID = $this->paymentid, institutionID = $this->institutionid, institutionNo = '$this->institutionno', staffID = $this->staffid"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "patientID = '$this->patientid', deptID = $this->deptid, doctorID = $this->doctorid, queueNo = '$this->queueno', regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", finishDate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", serviceDate = " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", tranCode = '$this->trancode', statusID = $this->statusid, paymentID = $this->paymentid, institutionID = $this->institutionid, institutionNo = '$this->institutionno', staffID = $this->staffid"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "patientID = '$this->patientid', deptID = $this->deptid, doctorID = $this->doctorid, queueNo = '$this->queueno', regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", finishDate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", serviceDate = " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", tranCode = '$this->trancode', statusID = $this->statusid, paymentID = $this->paymentid, institutionID = $this->institutionid, institutionNo = '$this->institutionno', staffID = $this->staffid"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "patientID = '$this->patientid', deptID = $this->deptid, doctorID = $this->doctorid, queueNo = '$this->queueno', regDate = " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", regTime = " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", finishDate = " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", serviceDate = " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", tranCode = '$this->trancode', statusID = $this->statusid, paymentID = $this->paymentid, institutionID = $this->institutionid, institutionNo = '$this->institutionno', staffID = $this->staffid"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              else  
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_outpatient_reg_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->patientid = $this->patientid_before_qstr;
              $this->queueno = $this->queueno_before_qstr;
              $this->trancode = $this->trancode_before_qstr;
              $this->institutionno = $this->institutionno_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['patientid'])) { $this->patientid = $NM_val_form['patientid']; }
              elseif (isset($this->patientid)) { $this->nm_limpa_alfa($this->patientid); }
              if     (isset($NM_val_form) && isset($NM_val_form['deptid'])) { $this->deptid = $NM_val_form['deptid']; }
              elseif (isset($this->deptid)) { $this->nm_limpa_alfa($this->deptid); }
              if     (isset($NM_val_form) && isset($NM_val_form['doctorid'])) { $this->doctorid = $NM_val_form['doctorid']; }
              elseif (isset($this->doctorid)) { $this->nm_limpa_alfa($this->doctorid); }
              if     (isset($NM_val_form) && isset($NM_val_form['queueno'])) { $this->queueno = $NM_val_form['queueno']; }
              elseif (isset($this->queueno)) { $this->nm_limpa_alfa($this->queueno); }
              if     (isset($NM_val_form) && isset($NM_val_form['trancode'])) { $this->trancode = $NM_val_form['trancode']; }
              elseif (isset($this->trancode)) { $this->nm_limpa_alfa($this->trancode); }
              if     (isset($NM_val_form) && isset($NM_val_form['statusid'])) { $this->statusid = $NM_val_form['statusid']; }
              elseif (isset($this->statusid)) { $this->nm_limpa_alfa($this->statusid); }
              if     (isset($NM_val_form) && isset($NM_val_form['paymentid'])) { $this->paymentid = $NM_val_form['paymentid']; }
              elseif (isset($this->paymentid)) { $this->nm_limpa_alfa($this->paymentid); }
              if     (isset($NM_val_form) && isset($NM_val_form['institutionid'])) { $this->institutionid = $NM_val_form['institutionid']; }
              elseif (isset($this->institutionid)) { $this->nm_limpa_alfa($this->institutionid); }
              if     (isset($NM_val_form) && isset($NM_val_form['institutionno'])) { $this->institutionno = $NM_val_form['institutionno']; }
              elseif (isset($this->institutionno)) { $this->nm_limpa_alfa($this->institutionno); }
              if     (isset($NM_val_form) && isset($NM_val_form['staffid'])) { $this->staffid = $NM_val_form['staffid']; }
              elseif (isset($this->staffid)) { $this->nm_limpa_alfa($this->staffid); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('trancode', 'patientid', 'regdate', 'regtime', 'queueno', 'deptid', 'doctorid', 'finishdate', 'servicedate', 'paymentid', 'institutionid', 'institutionno', 'statusid', 'staffid'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "ID, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_outpatient_reg_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES ('$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', #$this->regdate#, #$this->regtime#, #$this->finishdate#, #$this->servicedate#, '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', EXTEND('$this->regdate', YEAR TO DAY), " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", EXTEND('$this->finishdate', YEAR TO FRACTION), EXTEND('$this->servicedate', YEAR TO FRACTION), '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID) VALUES (" . $NM_seq_auto . "'$this->patientid', $this->deptid, $this->doctorid, '$this->queueno', " . $this->Ini->date_delim . $this->regdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->regtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->finishdate . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->servicedate . $this->Ini->date_delim1 . ", '$this->trancode', $this->statusid, $this->paymentid, $this->institutionid, '$this->institutionno', $this->staffid)"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_outpatient_reg_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_outpatient_reg_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->patientid = $this->patientid_before_qstr;
              $this->queueno = $this->queueno_before_qstr;
              $this->trancode = $this->trancode_before_qstr;
              $this->institutionno = $this->institutionno_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->patientid = $this->patientid_before_qstr;
              $this->queueno = $this->queueno_before_qstr;
              $this->trancode = $this->trancode_before_qstr;
              $this->institutionno = $this->institutionno_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['sc_btn_0'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_outpatient_reg_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "R")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->id)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->id) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_outpatient_reg_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total'] = $qt_geral_reg_form_outpatient_reg_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "ID < $this->id "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "ID < $this->id "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "ID < $this->id "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "ID < $this->id "; 
              }
              else  
              {
                  $Key_Where = "ID < $this->id "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_outpatient_reg_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] > $qt_geral_reg_form_outpatient_reg_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = $qt_geral_reg_form_outpatient_reg_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = $qt_geral_reg_form_outpatient_reg_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID, patientID, deptID, doctorID, queueNo, str_replace (convert(char(10),regDate,102), '.', '-') + ' ' + convert(char(8),regDate,20), str_replace (convert(char(10),regTime,102), '.', '-') + ' ' + convert(char(8),regTime,20), str_replace (convert(char(10),finishDate,102), '.', '-') + ' ' + convert(char(8),finishDate,20), str_replace (convert(char(10),serviceDate,102), '.', '-') + ' ' + convert(char(8),serviceDate,20), tranCode, statusID, paymentID, institutionID, institutionNo, staffID from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID, patientID, deptID, doctorID, queueNo, convert(char(23),regDate,121), convert(char(23),regTime,121), convert(char(23),finishDate,121), convert(char(23),serviceDate,121), tranCode, statusID, paymentID, institutionID, institutionNo, staffID from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID, patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID, patientID, deptID, doctorID, queueNo, EXTEND(regDate, YEAR TO DAY), regTime, EXTEND(finishDate, YEAR TO FRACTION), EXTEND(serviceDate, YEAR TO FRACTION), tranCode, statusID, paymentID, institutionID, institutionNo, staffID from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID, patientID, deptID, doctorID, queueNo, regDate, regTime, finishDate, serviceDate, tranCode, statusID, paymentID, institutionID, institutionNo, staffID from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "ID = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "ID = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "ID = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "ID = $this->id"; 
              }  
              else  
              {
                  $aWhere[] = "ID = $this->id"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "ID";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->patientid = $rs->fields[1] ; 
              $this->nmgp_dados_select['patientid'] = $this->patientid;
              $this->deptid = $rs->fields[2] ; 
              $this->nmgp_dados_select['deptid'] = $this->deptid;
              $this->doctorid = $rs->fields[3] ; 
              $this->nmgp_dados_select['doctorid'] = $this->doctorid;
              $this->queueno = $rs->fields[4] ; 
              $this->nmgp_dados_select['queueno'] = $this->queueno;
              $this->regdate = $rs->fields[5] ; 
              $this->nmgp_dados_select['regdate'] = $this->regdate;
              $this->regtime = $rs->fields[6] ; 
              $this->nmgp_dados_select['regtime'] = $this->regtime;
              $this->finishdate = $rs->fields[7] ; 
              if (substr($this->finishdate, 10, 1) == "-") 
              { 
                 $this->finishdate = substr($this->finishdate, 0, 10) . " " . substr($this->finishdate, 11);
              } 
              if (substr($this->finishdate, 13, 1) == ".") 
              { 
                 $this->finishdate = substr($this->finishdate, 0, 13) . ":" . substr($this->finishdate, 14, 2) . ":" . substr($this->finishdate, 17);
              } 
              $this->nmgp_dados_select['finishdate'] = $this->finishdate;
              $this->servicedate = $rs->fields[8] ; 
              if (substr($this->servicedate, 10, 1) == "-") 
              { 
                 $this->servicedate = substr($this->servicedate, 0, 10) . " " . substr($this->servicedate, 11);
              } 
              if (substr($this->servicedate, 13, 1) == ".") 
              { 
                 $this->servicedate = substr($this->servicedate, 0, 13) . ":" . substr($this->servicedate, 14, 2) . ":" . substr($this->servicedate, 17);
              } 
              $this->nmgp_dados_select['servicedate'] = $this->servicedate;
              $this->trancode = $rs->fields[9] ; 
              $this->nmgp_dados_select['trancode'] = $this->trancode;
              $this->statusid = $rs->fields[10] ; 
              $this->nmgp_dados_select['statusid'] = $this->statusid;
              $this->paymentid = $rs->fields[11] ; 
              $this->nmgp_dados_select['paymentid'] = $this->paymentid;
              $this->institutionid = $rs->fields[12] ; 
              $this->nmgp_dados_select['institutionid'] = $this->institutionid;
              $this->institutionno = $rs->fields[13] ; 
              $this->nmgp_dados_select['institutionno'] = $this->institutionno;
              $this->staffid = $rs->fields[14] ; 
              $this->nmgp_dados_select['staffid'] = $this->staffid;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->deptid = (string)$this->deptid; 
              $this->doctorid = (string)$this->doctorid; 
              $this->statusid = (string)$this->statusid; 
              $this->paymentid = (string)$this->paymentid; 
              $this->institutionid = (string)$this->institutionid; 
              $this->staffid = (string)$this->staffid; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['reg_start'] < $qt_geral_reg_form_outpatient_reg_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id = "";  
              $this->nmgp_dados_form["id"] = $this->id;
              $this->patientid = "";  
              $this->nmgp_dados_form["patientid"] = $this->patientid;
              $this->deptid = "";  
              $this->nmgp_dados_form["deptid"] = $this->deptid;
              $this->doctorid = "";  
              $this->nmgp_dados_form["doctorid"] = $this->doctorid;
              $this->queueno = "";  
              $this->nmgp_dados_form["queueno"] = $this->queueno;
              $this->regdate =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["regdate"] = $this->regdate;
              $this->regtime =  date('H') . ":" . date('i')  . ":" . date('s');
              $this->nmgp_dados_form["regtime"] = $this->regtime;
              $this->finishdate = "";  
              $this->finishdate_hora = "" ;  
              $this->nmgp_dados_form["finishdate"] = $this->finishdate;
              $this->servicedate = "";  
              $this->servicedate_hora = "" ;  
              $this->nmgp_dados_form["servicedate"] = $this->servicedate;
              $this->trancode = "";  
              $this->nmgp_dados_form["trancode"] = $this->trancode;
              $this->statusid = "";  
              $this->nmgp_dados_form["statusid"] = $this->statusid;
              $this->paymentid = "";  
              $this->nmgp_dados_form["paymentid"] = $this->paymentid;
              $this->institutionid = "";  
              $this->nmgp_dados_form["institutionid"] = $this->institutionid;
              $this->institutionno = "";  
              $this->nmgp_dados_form["institutionno"] = $this->institutionno;
              $this->staffid = "";  
              $this->nmgp_dados_form["staffid"] = $this->staffid;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dados_select'];
                  $this->patientid = $this->nmgp_dados_select['patientid'];  
                  $this->deptid = $this->nmgp_dados_select['deptid'];  
                  $this->doctorid = $this->nmgp_dados_select['doctorid'];  
                  $this->queueno = $this->nmgp_dados_select['queueno'];  
                  $this->regdate = $this->nmgp_dados_select['regdate'];  
                  $this->regtime = $this->nmgp_dados_select['regtime'];  
                  $this->finishdate = $this->nmgp_dados_select['finishdate'];  
                  $this->servicedate = $this->nmgp_dados_select['servicedate'];  
                  $this->trancode = $this->nmgp_dados_select['trancode'];  
                  $this->statusid = $this->nmgp_dados_select['statusid'];  
                  $this->paymentid = $this->nmgp_dados_select['paymentid'];  
                  $this->institutionid = $this->nmgp_dados_select['institutionid'];  
                  $this->institutionno = $this->nmgp_dados_select['institutionno'];  
                  $this->staffid = $this->nmgp_dados_select['staffid'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " where ID < $this->id" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " where ID > $this->id" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(ID) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function doctorID_onChange()
{
$_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'on';
  
$original_regdate = $this->regdate;
$original_doctorid = $this->doctorid;
$original_queueno = $this->queueno;
$original_queueno = $this->queueno;

$check_sql = "SELECT max(queueNo)"
   . " FROM outpatient_reg"
   . " WHERE date_format(regDate,'%Y-%m-%d') = '" . $this->regdate  . "' and doctorID = '" . $this->doctorid  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->queueno  = $this->rs[0][0]+1;
}
		else     
{
	$this->queueno  = 1;
}


$modificado_regdate = $this->regdate;
$modificado_doctorid = $this->doctorid;
$modificado_queueno = $this->queueno;
$modificado_queueno = $this->queueno;
$this->nm_formatar_campos('regdate', 'doctorid', 'queueno');
if ($original_regdate !== $modificado_regdate || isset($this->nmgp_cmp_readonly['regdate']) || (isset($bFlagRead_regdate) && $bFlagRead_regdate))
{
    $this->ajax_return_values_regdate(true);
}
if ($original_doctorid !== $modificado_doctorid || isset($this->nmgp_cmp_readonly['doctorid']) || (isset($bFlagRead_doctorid) && $bFlagRead_doctorid))
{
    $this->ajax_return_values_doctorid(true);
}
if ($original_queueno !== $modificado_queueno || isset($this->nmgp_cmp_readonly['queueno']) || (isset($bFlagRead_queueno) && $bFlagRead_queueno))
{
    $this->ajax_return_values_queueno(true);
}
if ($original_queueno !== $modificado_queueno || isset($this->nmgp_cmp_readonly['queueno']) || (isset($bFlagRead_queueno) && $bFlagRead_queueno))
{
    $this->ajax_return_values_queueno(true);
}
$this->NM_ajax_info['event_field'] = 'doctorID';
form_outpatient_reg_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'off';
}
function regDate_onChange()
{
$_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'on';
  
$original_regdate = $this->regdate;
$original_doctorid = $this->doctorid;
$original_queueno = $this->queueno;
$original_queueno = $this->queueno;

$check_sql = "SELECT max(queueNo)"
   . " FROM outpatient_reg"
   . " WHERE date_format(regDate,'%Y-%m-%d') = '" . $this->regdate  . "' and doctorID = '" . $this->doctorid  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $this->queueno  = $this->rs[0][0]+1;
}
		else     
{
	$this->queueno  = 1;
}


$modificado_regdate = $this->regdate;
$modificado_doctorid = $this->doctorid;
$modificado_queueno = $this->queueno;
$modificado_queueno = $this->queueno;
$this->nm_formatar_campos('regdate', 'doctorid', 'queueno');
if ($original_regdate !== $modificado_regdate || isset($this->nmgp_cmp_readonly['regdate']) || (isset($bFlagRead_regdate) && $bFlagRead_regdate))
{
    $this->ajax_return_values_regdate(true);
}
if ($original_doctorid !== $modificado_doctorid || isset($this->nmgp_cmp_readonly['doctorid']) || (isset($bFlagRead_doctorid) && $bFlagRead_doctorid))
{
    $this->ajax_return_values_doctorid(true);
}
if ($original_queueno !== $modificado_queueno || isset($this->nmgp_cmp_readonly['queueno']) || (isset($bFlagRead_queueno) && $bFlagRead_queueno))
{
    $this->ajax_return_values_queueno(true);
}
if ($original_queueno !== $modificado_queueno || isset($this->nmgp_cmp_readonly['queueno']) || (isset($bFlagRead_queueno) && $bFlagRead_queueno))
{
    $this->ajax_return_values_queueno(true);
}
$this->NM_ajax_info['event_field'] = 'regDate';
form_outpatient_reg_mob_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_outpatient_reg_mob']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_outpatient_reg_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_outpatient_reg_mob_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("id", "patientid", "deptid", "doctorid", "queueno", "regdate", "regtime", "finishdate", "servicedate", "trancode", "statusid", "paymentid", "instanceid", "instanceno", "staffid"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array(""))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $result = preg_replace('/'. $this->nmgp_arg_fast_search .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

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

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_deptid()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Laboratory?#?1?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_doctorid()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'] = array(); 
    }

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "SELECT ID, name from doctor_settings ORDER BY ID";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_doctorid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_paymentid()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'] = array(); 
    }

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "select ID, name from payment_settings order by ID";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_paymentid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_institutionid()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'] = array(); 
    }

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "SELECT ID, name  FROM institution_settings where active = '1' and function = '1' ORDER BY ID";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_institutionid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_statusid()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Register?#?1?#?S?@?";
       $nmgp_def_dados .= "Handled?#?2?#?N?@?";
       $nmgp_def_dados .= "Done?#?3?#?N?@?";
       $nmgp_def_dados .= "Completed?#?4?#?N?@?";
       $nmgp_def_dados .= "Cancel?#?0?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_staffid()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'] = array(); 
    }

   $old_value_trancode = $this->trancode;
   $old_value_regdate = $this->regdate;
   $old_value_regtime = $this->regtime;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $old_value_servicedate = $this->servicedate;
   $old_value_servicedate_hora = $this->servicedate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trancode = $this->trancode;
   $unformatted_value_regdate = $this->regdate;
   $unformatted_value_regtime = $this->regtime;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;
   $unformatted_value_servicedate = $this->servicedate;
   $unformatted_value_servicedate_hora = $this->servicedate_hora;

   $nm_comando = "SELECT ID, name  FROM staff_settings  ORDER BY name";

   $this->trancode = $old_value_trancode;
   $this->regdate = $old_value_regdate;
   $this->regtime = $old_value_regtime;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;
   $this->servicedate = $old_value_servicedate;
   $this->servicedate_hora = $old_value_servicedate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['Lookup_staffid'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_outpatient_reg_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "ID", $arg_search, str_replace(",", ".", $data_search));
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "patientID", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_deptid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "deptID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_doctorid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "doctorID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "queueNo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "regDate", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "regTime", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "finishDate", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "serviceDate", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "tranCode", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_statusid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "statusID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_paymentid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "paymentID", $arg_search, $data_lookup);
              }
          }
          if ($field == "SC_all_Cmp") 
          {
              $data_lookup = $this->SC_lookup_staffid($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "staffID", $arg_search, $data_lookup);
              }
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_outpatient_reg_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['total'] = $qt_geral_reg_form_outpatient_reg_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_outpatient_reg_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_outpatient_reg_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id";$nm_numeric[] = "deptid";$nm_numeric[] = "doctorid";$nm_numeric[] = "statusid";$nm_numeric[] = "paymentid";$nm_numeric[] = "institutionid";$nm_numeric[] = "staffid";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['regdate'] = "date";$Nm_datas['regtime'] = "time";$Nm_datas['finishdate'] = "datetime";$Nm_datas['servicedate'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_deptid($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Laboratory";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_doctorid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, ID FROM doctor_settings WHERE (name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_statusid($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Register";
       $data_look['2'] = "Handled";
       $data_look['3'] = "Done";
       $data_look['4'] = "Completed";
       $data_look['0'] = "Cancel";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_paymentid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, ID FROM payment_settings WHERE (name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_staffid($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, ID FROM staff_settings WHERE (name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_outpatient_reg_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_outpatient_reg_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_outpatient_reg_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_outpatient_reg_mob']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
}
?>
