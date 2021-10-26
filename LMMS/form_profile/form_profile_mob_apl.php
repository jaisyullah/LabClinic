<?php
//
class form_profile_mob_apl
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
   var $name;
   var $headline;
   var $address;
   var $long;
   var $lat;
   var $logo;
   var $logo_scfile_name;
   var $logo_ul_name;
   var $logo_scfile_type;
   var $logo_ul_type;
   var $logo_limpa;
   var $logo_salva;
   var $out_logo;
   var $aboutus;
   var $privacypolicy;
   var $healthguide;
   var $terms;
   var $footer;
   var $phone;
   var $mail;
   var $facebook;
   var $instagram;
   var $twitter;
   var $youtube;
   var $slidertype;
   var $id;
   var $whatsappurl;
   var $deliverytype;
   var $deliverytype_1;
   var $currency;
   var $currency_1;
   var $country;
   var $country_1;
   var $officer;
   var $officer_scfile_name;
   var $officer_ul_name;
   var $officer_scfile_type;
   var $officer_ul_type;
   var $officer_limpa;
   var $officer_salva;
   var $out_officer;
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
          if (isset($this->NM_ajax_info['param']['aboutus']))
          {
              $this->aboutus = $this->NM_ajax_info['param']['aboutus'];
          }
          if (isset($this->NM_ajax_info['param']['address']))
          {
              $this->address = $this->NM_ajax_info['param']['address'];
          }
          if (isset($this->NM_ajax_info['param']['country']))
          {
              $this->country = $this->NM_ajax_info['param']['country'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['currency']))
          {
              $this->currency = $this->NM_ajax_info['param']['currency'];
          }
          if (isset($this->NM_ajax_info['param']['facebook']))
          {
              $this->facebook = $this->NM_ajax_info['param']['facebook'];
          }
          if (isset($this->NM_ajax_info['param']['footer']))
          {
              $this->footer = $this->NM_ajax_info['param']['footer'];
          }
          if (isset($this->NM_ajax_info['param']['headline']))
          {
              $this->headline = $this->NM_ajax_info['param']['headline'];
          }
          if (isset($this->NM_ajax_info['param']['healthguide']))
          {
              $this->healthguide = $this->NM_ajax_info['param']['healthguide'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['instagram']))
          {
              $this->instagram = $this->NM_ajax_info['param']['instagram'];
          }
          if (isset($this->NM_ajax_info['param']['lat']))
          {
              $this->lat = $this->NM_ajax_info['param']['lat'];
          }
          if (isset($this->NM_ajax_info['param']['logo']))
          {
              $this->logo = $this->NM_ajax_info['param']['logo'];
          }
          if (isset($this->NM_ajax_info['param']['logo_limpa']))
          {
              $this->logo_limpa = $this->NM_ajax_info['param']['logo_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['logo_salva']))
          {
              $this->logo_salva = $this->NM_ajax_info['param']['logo_salva'];
          }
          if (isset($this->NM_ajax_info['param']['logo_ul_name']))
          {
              $this->logo_ul_name = $this->NM_ajax_info['param']['logo_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['logo_ul_type']))
          {
              $this->logo_ul_type = $this->NM_ajax_info['param']['logo_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['long']))
          {
              $this->long = $this->NM_ajax_info['param']['long'];
          }
          if (isset($this->NM_ajax_info['param']['mail']))
          {
              $this->mail = $this->NM_ajax_info['param']['mail'];
          }
          if (isset($this->NM_ajax_info['param']['name']))
          {
              $this->name = $this->NM_ajax_info['param']['name'];
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
          if (isset($this->NM_ajax_info['param']['officer']))
          {
              $this->officer = $this->NM_ajax_info['param']['officer'];
          }
          if (isset($this->NM_ajax_info['param']['officer_limpa']))
          {
              $this->officer_limpa = $this->NM_ajax_info['param']['officer_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['officer_salva']))
          {
              $this->officer_salva = $this->NM_ajax_info['param']['officer_salva'];
          }
          if (isset($this->NM_ajax_info['param']['officer_ul_name']))
          {
              $this->officer_ul_name = $this->NM_ajax_info['param']['officer_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['officer_ul_type']))
          {
              $this->officer_ul_type = $this->NM_ajax_info['param']['officer_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['phone']))
          {
              $this->phone = $this->NM_ajax_info['param']['phone'];
          }
          if (isset($this->NM_ajax_info['param']['privacypolicy']))
          {
              $this->privacypolicy = $this->NM_ajax_info['param']['privacypolicy'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['terms']))
          {
              $this->terms = $this->NM_ajax_info['param']['terms'];
          }
          if (isset($this->NM_ajax_info['param']['twitter']))
          {
              $this->twitter = $this->NM_ajax_info['param']['twitter'];
          }
          if (isset($this->NM_ajax_info['param']['youtube']))
          {
              $this->youtube = $this->NM_ajax_info['param']['youtube'];
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
      if (isset($_SESSION['sc_session'][$script_case_init]['form_profile_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_profile_mob']['embutida_parms']);
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
                 nm_limpa_str_form_profile_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_profile_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_profile_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['parms']);
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
          $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_profile_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_profile_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("en_us");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['initialize'];
          if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile']))
          {
              foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_profile'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("en_us");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['upload_field_info']['officer'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_profile_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$script_case_init]['form_profile_mob']['upload_field_info']['logo'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_profile_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_max_size'  => null,
          'upload_file_height' => '0',
          'upload_file_width'  => '0',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_profile_mob']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_profile_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_profile_mob']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_profile_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_profile_mob') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_profile_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " profile";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_profile_mob")
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


      $_SESSION['scriptcase']['error_icon']['form_profile_mob']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_profile_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['logo_ul_name']) && '' != $this->NM_ajax_info['param']['logo_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->logo_ul_name]))
          {
              $this->NM_ajax_info['param']['logo_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->logo_ul_name];
          }
          $this->logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['logo_ul_name'];
          $this->logo_scfile_name = substr($this->NM_ajax_info['param']['logo_ul_name'], 12);
          $this->logo_scfile_type = $this->NM_ajax_info['param']['logo_ul_type'];
          $this->logo_ul_name = $this->NM_ajax_info['param']['logo_ul_name'];
          $this->logo_ul_type = $this->NM_ajax_info['param']['logo_ul_type'];
      }
      elseif (isset($this->logo_ul_name) && '' != $this->logo_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->logo_ul_name]))
          {
              $this->logo_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->logo_ul_name];
          }
          $this->logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->logo_ul_name;
          $this->logo_scfile_name = substr($this->logo_ul_name, 12);
          $this->logo_scfile_type = $this->logo_ul_type;
      }
      if (isset($this->NM_ajax_info['param']['officer_ul_name']) && '' != $this->NM_ajax_info['param']['officer_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->officer_ul_name]))
          {
              $this->NM_ajax_info['param']['officer_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->officer_ul_name];
          }
          $this->officer = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['officer_ul_name'];
          $this->officer_scfile_name = substr($this->NM_ajax_info['param']['officer_ul_name'], 12);
          $this->officer_scfile_type = $this->NM_ajax_info['param']['officer_ul_type'];
          $this->officer_ul_name = $this->NM_ajax_info['param']['officer_ul_name'];
          $this->officer_ul_type = $this->NM_ajax_info['param']['officer_ul_type'];
      }
      elseif (isset($this->officer_ul_name) && '' != $this->officer_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->officer_ul_name]))
          {
              $this->officer_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_field_ul_name'][$this->officer_ul_name];
          }
          $this->officer = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->officer_ul_name;
          $this->officer_scfile_name = substr($this->officer_ul_name, 12);
          $this->officer_scfile_type = $this->officer_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['goto']      = 'on';
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
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_profile_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_profile_mob'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_profile_mob'];

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

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['insert'];
          $this->nmgp_botoes['copy']   = $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_form'];
          if (!isset($this->slidertype)){$this->slidertype = $this->nmgp_dados_form['slidertype'];} 
          if (!isset($this->whatsappurl)){$this->whatsappurl = $this->nmgp_dados_form['whatsappurl'];} 
          if (!isset($this->deliverytype)){$this->deliverytype = $this->nmgp_dados_form['deliverytype'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_profile_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_profile_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_profile_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_profile/form_profile_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_profile_mob_erro.class.php"); 
      }
      $this->Erro      = new form_profile_mob_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_profile_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_form'];
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
      if (!isset($this->NM_ajax_flag) || ('validate_' != substr($this->NM_ajax_opcao, 0, 9) && 'add_new_line' != $this->NM_ajax_opcao && 'autocomp_' != substr($this->NM_ajax_opcao, 0, 9)))
      {
      $_SESSION['scriptcase']['form_profile_mob']['contr_erro'] = 'on';
 $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes["exit"] = "off";;
$_SESSION['scriptcase']['form_profile_mob']['contr_erro'] = 'off'; 
      }
      if (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
      if (isset($this->headline)) { $this->nm_limpa_alfa($this->headline); }
      if (isset($this->long)) { $this->nm_limpa_alfa($this->long); }
      if (isset($this->lat)) { $this->nm_limpa_alfa($this->lat); }
      if (isset($this->footer)) { $this->nm_limpa_alfa($this->footer); }
      if (isset($this->phone)) { $this->nm_limpa_alfa($this->phone); }
      if (isset($this->mail)) { $this->nm_limpa_alfa($this->mail); }
      if (isset($this->facebook)) { $this->nm_limpa_alfa($this->facebook); }
      if (isset($this->instagram)) { $this->nm_limpa_alfa($this->instagram); }
      if (isset($this->twitter)) { $this->nm_limpa_alfa($this->twitter); }
      if (isset($this->youtube)) { $this->nm_limpa_alfa($this->youtube); }
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->currency)) { $this->nm_limpa_alfa($this->currency); }
      if (isset($this->country)) { $this->nm_limpa_alfa($this->country); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
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
          if ('validate_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'name');
          }
          if ('validate_headline' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'headline');
          }
          if ('validate_currency' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'currency');
          }
          if ('validate_footer' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'footer');
          }
          if ('validate_country' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'country');
          }
          if ('validate_officer' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'officer');
          }
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          if ('validate_logo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'logo');
          }
          if ('validate_facebook' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'facebook');
          }
          if ('validate_instagram' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instagram');
          }
          if ('validate_twitter' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'twitter');
          }
          if ('validate_youtube' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'youtube');
          }
          if ('validate_address' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'address');
          }
          if ('validate_phone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'phone');
          }
          if ('validate_mail' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mail');
          }
          if ('validate_long' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'long');
          }
          if ('validate_lat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lat');
          }
          if ('validate_aboutus' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'aboutus');
          }
          if ('validate_privacypolicy' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'privacypolicy');
          }
          if ('validate_terms' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'terms');
          }
          if ('validate_healthguide' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'healthguide');
          }
          form_profile_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_profile_mob_pack_ajax_response();
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
          $_SESSION['scriptcase']['form_profile_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_profile_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_profile_mob_pack_ajax_response();
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
          form_profile_mob_pack_ajax_response();
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
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_profile_mob.zip";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " profile") ?></TITLE>
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
<form name="Fdown" method="get" action="form_profile_mob_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_profile_mob"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="form_profile_mob.php" target="_self" style="display: none"> 
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
           case 'name':
               return "Name";
               break;
           case 'headline':
               return "Headline";
               break;
           case 'currency':
               return "Currency";
               break;
           case 'footer':
               return "Footer";
               break;
           case 'country':
               return "Country";
               break;
           case 'officer':
               return "Responsible (Signature and Stamp)";
               break;
           case 'id':
               return "ID";
               break;
           case 'logo':
               return "Logo";
               break;
           case 'facebook':
               return "Facebook";
               break;
           case 'instagram':
               return "Instagram";
               break;
           case 'twitter':
               return "Twitter";
               break;
           case 'youtube':
               return "Youtube";
               break;
           case 'address':
               return "Address";
               break;
           case 'phone':
               return "Phone";
               break;
           case 'mail':
               return "Mail";
               break;
           case 'long':
               return "Longitude";
               break;
           case 'lat':
               return "Latitude";
               break;
           case 'aboutus':
               return "About Us";
               break;
           case 'privacypolicy':
               return "Privacy Policy";
               break;
           case 'terms':
               return "Terms & Condition";
               break;
           case 'healthguide':
               return "Health Guideline";
               break;
           case 'slidertype':
               return "Slider Type";
               break;
           case 'whatsappurl':
               return "Whatsapp Endpoint URL";
               break;
           case 'deliverytype':
               return "Delivery Type";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_profile_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_profile_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_profile_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_profile_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'name' == $filtro)
        $this->ValidateField_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'headline' == $filtro)
        $this->ValidateField_headline($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'currency' == $filtro)
        $this->ValidateField_currency($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'footer' == $filtro)
        $this->ValidateField_footer($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'country' == $filtro)
        $this->ValidateField_country($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'officer' == $filtro)
        $this->ValidateField_officer($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'logo' == $filtro)
        $this->ValidateField_logo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'facebook' == $filtro)
        $this->ValidateField_facebook($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instagram' == $filtro)
        $this->ValidateField_instagram($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'twitter' == $filtro)
        $this->ValidateField_twitter($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'youtube' == $filtro)
        $this->ValidateField_youtube($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'address' == $filtro)
        $this->ValidateField_address($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'phone' == $filtro)
        $this->ValidateField_phone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'mail' == $filtro)
        $this->ValidateField_mail($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'long' == $filtro)
        $this->ValidateField_long($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lat' == $filtro)
        $this->ValidateField_lat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'aboutus' == $filtro)
        $this->ValidateField_aboutus($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'privacypolicy' == $filtro)
        $this->ValidateField_privacypolicy($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'terms' == $filtro)
        $this->ValidateField_terms($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'healthguide' == $filtro)
        $this->ValidateField_healthguide($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
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

    function ValidateField_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['php_cmp_required']['name']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['php_cmp_required']['name'] == "on")) 
      { 
          if ($this->name == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Name" ; 
              if (!isset($Campos_Erros['name']))
              {
                  $Campos_Erros['name'] = array();
              }
              $Campos_Erros['name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['name']) || !is_array($this->NM_ajax_info['errList']['name']))
                  {
                      $this->NM_ajax_info['errList']['name'] = array();
                  }
                  $this->NM_ajax_info['errList']['name'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->name) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Name " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['name']))
              {
                  $Campos_Erros['name'] = array();
              }
              $Campos_Erros['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['name']) || !is_array($this->NM_ajax_info['errList']['name']))
              {
                  $this->NM_ajax_info['errList']['name'] = array();
              }
              $this->NM_ajax_info['errList']['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_name

    function ValidateField_headline(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->headline) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Headline " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['headline']))
              {
                  $Campos_Erros['headline'] = array();
              }
              $Campos_Erros['headline'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['headline']) || !is_array($this->NM_ajax_info['errList']['headline']))
              {
                  $this->NM_ajax_info['errList']['headline'] = array();
              }
              $this->NM_ajax_info['errList']['headline'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'headline';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_headline

    function ValidateField_currency(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->currency) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']) && !in_array($this->currency, $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['currency']))
                   {
                       $Campos_Erros['currency'] = array();
                   }
                   $Campos_Erros['currency'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['currency']) || !is_array($this->NM_ajax_info['errList']['currency']))
                   {
                       $this->NM_ajax_info['errList']['currency'] = array();
                   }
                   $this->NM_ajax_info['errList']['currency'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'currency';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_currency

    function ValidateField_footer(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->footer) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Footer " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['footer']))
              {
                  $Campos_Erros['footer'] = array();
              }
              $Campos_Erros['footer'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['footer']) || !is_array($this->NM_ajax_info['errList']['footer']))
              {
                  $this->NM_ajax_info['errList']['footer'] = array();
              }
              $this->NM_ajax_info['errList']['footer'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'footer';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_footer

    function ValidateField_country(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->country) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']) && !in_array($this->country, $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['country']))
                   {
                       $Campos_Erros['country'] = array();
                   }
                   $Campos_Erros['country'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['country']) || !is_array($this->NM_ajax_info['errList']['country']))
                   {
                       $this->NM_ajax_info['errList']['country'] = array();
                   }
                   $this->NM_ajax_info['errList']['country'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'country';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_country

    function ValidateField_officer(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->officer;
            if ("" != $this->officer && "S" != $this->officer_limpa && !$teste_validade->ArqExtensao($this->officer, array()))
            {
                $hasError = true;
                $Campos_Crit .= "Responsible (Signature and Stamp): " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['officer']))
                {
                    $Campos_Erros['officer'] = array();
                }
                $Campos_Erros['officer'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['officer']) || !is_array($this->NM_ajax_info['errList']['officer']))
                {
                    $this->NM_ajax_info['errList']['officer'] = array();
                }
                $this->NM_ajax_info['errList']['officer'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'officer';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_officer

    function ValidateField_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID; " ; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['php_cmp_required']['id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['php_cmp_required']['id'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "ID" ; 
              if (!isset($Campos_Erros['id']))
              {
                  $Campos_Erros['id'] = array();
              }
              $Campos_Erros['id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id

    function ValidateField_logo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->logo;
            if ("" != $this->logo && "S" != $this->logo_limpa && !$teste_validade->ArqExtensao($this->logo, array()))
            {
                $hasError = true;
                $Campos_Crit .= "Logo: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['logo']))
                {
                    $Campos_Erros['logo'] = array();
                }
                $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                {
                    $this->NM_ajax_info['errList']['logo'] = array();
                }
                $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
        }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'logo';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_logo

    function ValidateField_facebook(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->facebook) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'facebook';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_facebook

    function ValidateField_instagram(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->instagram) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'instagram';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_instagram

    function ValidateField_twitter(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->twitter) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'twitter';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_twitter

    function ValidateField_youtube(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->youtube) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'youtube';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_youtube

    function ValidateField_address(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->address) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Address " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['address']))
              {
                  $Campos_Erros['address'] = array();
              }
              $Campos_Erros['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['address']) || !is_array($this->NM_ajax_info['errList']['address']))
              {
                  $this->NM_ajax_info['errList']['address'] = array();
              }
              $this->NM_ajax_info['errList']['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'address';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_address

    function ValidateField_phone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->phone) > 30) 
          { 
              $hasError = true;
              $Campos_Crit .= "Phone " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['phone']))
              {
                  $Campos_Erros['phone'] = array();
              }
              $Campos_Erros['phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['phone']) || !is_array($this->NM_ajax_info['errList']['phone']))
              {
                  $this->NM_ajax_info['errList']['phone'] = array();
              }
              $this->NM_ajax_info['errList']['phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 30 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'phone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_phone

    function ValidateField_mail(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->mail) != "")  
          { 
              if ($teste_validade->Email($this->mail) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Mail; " ; 
                  if (!isset($Campos_Erros['mail']))
                  {
                      $Campos_Erros['mail'] = array();
                  }
                  $Campos_Erros['mail'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['mail']) || !is_array($this->NM_ajax_info['errList']['mail']))
                      {
                          $this->NM_ajax_info['errList']['mail'] = array();
                      }
                      $this->NM_ajax_info['errList']['mail'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mail';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mail

    function ValidateField_long(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->long) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Longitude " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['long']))
              {
                  $Campos_Erros['long'] = array();
              }
              $Campos_Erros['long'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['long']) || !is_array($this->NM_ajax_info['errList']['long']))
              {
                  $this->NM_ajax_info['errList']['long'] = array();
              }
              $this->NM_ajax_info['errList']['long'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'long';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_long

    function ValidateField_lat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->lat) > 255) 
          { 
              $hasError = true;
              $Campos_Crit .= "Latitude " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['lat']))
              {
                  $Campos_Erros['lat'] = array();
              }
              $Campos_Erros['lat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['lat']) || !is_array($this->NM_ajax_info['errList']['lat']))
              {
                  $this->NM_ajax_info['errList']['lat'] = array();
              }
              $this->NM_ajax_info['errList']['lat'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lat

    function ValidateField_aboutus(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->aboutus))
      {
          $this->aboutus = NM_conv_charset($this->aboutus, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->aboutus = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->aboutus);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->aboutus) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'aboutus';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_aboutus

    function ValidateField_privacypolicy(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->privacypolicy))
      {
          $this->privacypolicy = NM_conv_charset($this->privacypolicy, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->privacypolicy = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->privacypolicy);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->privacypolicy) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'privacypolicy';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_privacypolicy

    function ValidateField_terms(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->terms))
      {
          $this->terms = NM_conv_charset($this->terms, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->terms = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->terms);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->terms) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'terms';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_terms

    function ValidateField_healthguide(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($this->healthguide))
      {
          $this->healthguide = NM_conv_charset($this->healthguide, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $this->healthguide = str_replace("<p>" . chr(160) . "</p>", "<p></p>", $this->healthguide);
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->healthguide) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'healthguide';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_healthguide
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->officer == "none") 
          { 
              $this->officer = ""; 
          } 
          if ($this->officer != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_profile_mob_doc_name.php';
              }
              $this->officer = sc_upload_unprotect_chars($this->officer);
              $this->officer_scfile_name = sc_upload_unprotect_chars($this->officer_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->officer_scfile_type = substr($this->officer_scfile_type, 0, strpos($this->officer_scfile_type, ";")) ; 
              } 
              if ($this->officer_scfile_type == "image/pjpeg" || $this->officer_scfile_type == "image/jpeg" || $this->officer_scfile_type == "image/gif" ||  
                  $this->officer_scfile_type == "image/png" || $this->officer_scfile_type == "image/x-png" || $this->officer_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->officer))  
                  { 
                      $this->NM_size_docs[$this->officer_scfile_name] = $this->sc_file_size($this->officer);
                      if ($this->nmgp_opcao == "incluir")
                      { 
                          $this->SC_IMG_officer = $this->officer;
                      } 
                      else 
                      { 
                          $arq_officer = fopen($this->officer, "r") ; 
                          $reg_officer = fread($arq_officer, filesize($this->officer)) ; 
                          fclose($arq_officer) ;  
                      } 
                      $this->officer =  trim($this->officer_scfile_name) ;  
                      $dir_img = $this->Ini->root . $this->Ini->path_imagens . "" . "/"; 
                     if ($this->nmgp_opcao != "incluir")
                     { 
                      if (is_dir($dir_img))  
                      { 
                          $_test_file = $this->fetchUniqueUploadName($this->officer_scfile_name, $dir_img, "officer");
                          if (trim($this->officer_scfile_name) != $_test_file)
                          {
                              $this->officer_scfile_name = $_test_file;
                              $this->officer = $_test_file;
                          }
                          $arq_officer = fopen($dir_img . trim($this->officer_scfile_name), "w") ; 
                          fwrite($arq_officer, $reg_officer) ;  
                          fclose($arq_officer) ;  
                      } 
                      else 
                      { 
                          $Campos_Crit .= "Responsible (Signature and Stamp): " . $this->Ini->Nm_lang['lang_errm_nfdr']; 
                          $this->officer = "";
                          if (!isset($Campos_Erros['officer']))
                          {
                              $Campos_Erros['officer'] = array();
                          }
                          $Campos_Erros['officer'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                          if (!isset($this->NM_ajax_info['errList']['officer']) || !is_array($this->NM_ajax_info['errList']['officer']))
                          {
                              $this->NM_ajax_info['errList']['officer'] = array();
                          }
                          $this->NM_ajax_info['errList']['officer'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                      } 
                     } 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Responsible (Signature and Stamp) " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->officer = "";
                      if (!isset($Campos_Erros['officer']))
                      {
                          $Campos_Erros['officer'] = array();
                      }
                      $Campos_Erros['officer'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['officer']) || !is_array($this->NM_ajax_info['errList']['officer']))
                      {
                          $this->NM_ajax_info['errList']['officer'] = array();
                      }
                      $this->NM_ajax_info['errList']['officer'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->officer = "" ; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Responsible (Signature and Stamp) " . $this->Ini->Nm_lang['lang_errm_ivtp']; 
                      if (!isset($Campos_Erros['officer']))
                      {
                          $Campos_Erros['officer'] = array();
                      }
                      $Campos_Erros['officer'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                      if (!isset($this->NM_ajax_info['errList']['officer']) || !is_array($this->NM_ajax_info['errList']['officer']))
                      {
                          $this->NM_ajax_info['errList']['officer'] = array();
                      }
                      $this->NM_ajax_info['errList']['officer'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                  } 
              } 
          } 
          elseif (!empty($this->officer_salva) && $this->officer_limpa != "S")
          {
              $this->officer = $this->officer_salva;
          }
      } 
      elseif (!empty($this->officer_salva) && $this->officer_limpa != "S")
      {
          $this->officer = $this->officer_salva;
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->logo == "none") 
          { 
              $this->logo = ""; 
          } 
          if ($this->logo != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_profile_mob_doc_name.php';
              }
              $this->logo = sc_upload_unprotect_chars($this->logo);
              $this->logo_scfile_name = sc_upload_unprotect_chars($this->logo_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->logo_scfile_type = substr($this->logo_scfile_type, 0, strpos($this->logo_scfile_type, ";")) ; 
              } 
              if ($this->logo_scfile_type == "image/pjpeg" || $this->logo_scfile_type == "image/jpeg" || $this->logo_scfile_type == "image/gif" ||  
                  $this->logo_scfile_type == "image/png" || $this->logo_scfile_type == "image/x-png" || $this->logo_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->logo))  
                  { 
                      $this->NM_size_docs[$this->logo_scfile_name] = $this->sc_file_size($this->logo);
                      if ($this->nmgp_opcao == "incluir")
                      { 
                          $this->SC_IMG_logo = $this->logo;
                      } 
                      else 
                      { 
                          $arq_logo = fopen($this->logo, "r") ; 
                          $reg_logo = fread($arq_logo, filesize($this->logo)) ; 
                          fclose($arq_logo) ;  
                      } 
                      $this->logo =  trim($this->logo_scfile_name) ;  
                      $dir_img = $this->Ini->root . $this->Ini->path_imagens . "" . "/"; 
                     if ($this->nmgp_opcao != "incluir")
                     { 
                      if (is_dir($dir_img))  
                      { 
                          $_test_file = $this->fetchUniqueUploadName($this->logo_scfile_name, $dir_img, "logo");
                          if (trim($this->logo_scfile_name) != $_test_file)
                          {
                              $this->logo_scfile_name = $_test_file;
                              $this->logo = $_test_file;
                          }
                          $arq_logo = fopen($dir_img . trim($this->logo_scfile_name), "w") ; 
                          fwrite($arq_logo, $reg_logo) ;  
                          fclose($arq_logo) ;  
                      } 
                      else 
                      { 
                          $Campos_Crit .= "Logo: " . $this->Ini->Nm_lang['lang_errm_nfdr']; 
                          $this->logo = "";
                          if (!isset($Campos_Erros['logo']))
                          {
                              $Campos_Erros['logo'] = array();
                          }
                          $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                          if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                          {
                              $this->NM_ajax_info['errList']['logo'] = array();
                          }
                          $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_nfdr'];
                      } 
                     } 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Logo " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->logo = "";
                      if (!isset($Campos_Erros['logo']))
                      {
                          $Campos_Erros['logo'] = array();
                      }
                      $Campos_Erros['logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                      {
                          $this->NM_ajax_info['errList']['logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->logo = "" ; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Logo " . $this->Ini->Nm_lang['lang_errm_ivtp']; 
                      if (!isset($Campos_Erros['logo']))
                      {
                          $Campos_Erros['logo'] = array();
                      }
                      $Campos_Erros['logo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                      if (!isset($this->NM_ajax_info['errList']['logo']) || !is_array($this->NM_ajax_info['errList']['logo']))
                      {
                          $this->NM_ajax_info['errList']['logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['logo'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                  } 
              } 
          } 
          elseif (!empty($this->logo_salva) && $this->logo_limpa != "S")
          {
              $this->logo = $this->logo_salva;
          }
      } 
      elseif (!empty($this->logo_salva) && $this->logo_limpa != "S")
      {
          $this->logo = $this->logo_salva;
      }
   }

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
    $this->nmgp_dados_form['name'] = $this->name;
    $this->nmgp_dados_form['headline'] = $this->headline;
    $this->nmgp_dados_form['currency'] = $this->currency;
    $this->nmgp_dados_form['footer'] = $this->footer;
    $this->nmgp_dados_form['country'] = $this->country;
    if (empty($this->officer))
    {
        $this->officer = $this->nmgp_dados_form['officer'];
    }
    $this->nmgp_dados_form['officer'] = $this->officer;
    $this->nmgp_dados_form['officer_limpa'] = $this->officer_limpa;
    $this->nmgp_dados_form['id'] = $this->id;
    if (empty($this->logo))
    {
        $this->logo = $this->nmgp_dados_form['logo'];
    }
    $this->nmgp_dados_form['logo'] = $this->logo;
    $this->nmgp_dados_form['logo_limpa'] = $this->logo_limpa;
    $this->nmgp_dados_form['facebook'] = $this->facebook;
    $this->nmgp_dados_form['instagram'] = $this->instagram;
    $this->nmgp_dados_form['twitter'] = $this->twitter;
    $this->nmgp_dados_form['youtube'] = $this->youtube;
    $this->nmgp_dados_form['address'] = $this->address;
    $this->nmgp_dados_form['phone'] = $this->phone;
    $this->nmgp_dados_form['mail'] = $this->mail;
    $this->nmgp_dados_form['long'] = $this->long;
    $this->nmgp_dados_form['lat'] = $this->lat;
    $this->nmgp_dados_form['aboutus'] = $this->aboutus;
    $this->nmgp_dados_form['privacypolicy'] = $this->privacypolicy;
    $this->nmgp_dados_form['terms'] = $this->terms;
    $this->nmgp_dados_form['healthguide'] = $this->healthguide;
    $this->nmgp_dados_form['slidertype'] = $this->slidertype;
    $this->nmgp_dados_form['whatsappurl'] = $this->whatsappurl;
    $this->nmgp_dados_form['deliverytype'] = $this->deliverytype;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
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
      if ('' !== $this->id || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", $this->field_config['id']['format_neg'], "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
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
          $this->ajax_return_values_name();
          $this->ajax_return_values_headline();
          $this->ajax_return_values_currency();
          $this->ajax_return_values_footer();
          $this->ajax_return_values_country();
          $this->ajax_return_values_officer();
          $this->ajax_return_values_id();
          $this->ajax_return_values_logo();
          $this->ajax_return_values_facebook();
          $this->ajax_return_values_instagram();
          $this->ajax_return_values_twitter();
          $this->ajax_return_values_youtube();
          $this->ajax_return_values_address();
          $this->ajax_return_values_phone();
          $this->ajax_return_values_mail();
          $this->ajax_return_values_long();
          $this->ajax_return_values_lat();
          $this->ajax_return_values_aboutus();
          $this->ajax_return_values_privacypolicy();
          $this->ajax_return_values_terms();
          $this->ajax_return_values_healthguide();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_profile_mob_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- name
   function ajax_return_values_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- headline
   function ajax_return_values_headline($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("headline", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->headline);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['headline'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- currency
   function ajax_return_values_currency($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("currency", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->currency);
              $aLookup = array();
              $this->_tmp_lookup_currency = $this->currency;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $this->nm_tira_formatacao();


   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "select code, name + ' (' + code + ')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "select code, concat(name, ' (',code,')') from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "select code, name&' ('&code&')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "select code, name||' ('||code||')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "select code, name + ' (' + code + ')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "select code, name||' ('||code||')' from currency order by name";
   }
   else
   {
       $nm_comando = "select code, name||' ('||code||')' from currency order by name";
   }

   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_profile_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_profile_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'][] = $rs->fields[0];
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
          $sSelComp = "name=\"currency\"";
          if (isset($this->NM_ajax_info['select_html']['currency']) && !empty($this->NM_ajax_info['select_html']['currency']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['currency'];
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

                  if ($this->currency == $sValue)
                  {
                      $this->_tmp_lookup_currency = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['currency'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['currency']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['currency']['valList'][$i] = form_profile_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['currency']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['currency']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['currency']['labList'] = $aLabel;
          }
   }

          //----- footer
   function ajax_return_values_footer($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("footer", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->footer);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['footer'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- country
   function ajax_return_values_country($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("country", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->country);
              $aLookup = array();
              $this->_tmp_lookup_country = $this->country;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'] = array(); 
}
$aLookup[] = array(form_profile_mob_pack_protect_string('') => str_replace('<', '&lt;',form_profile_mob_pack_protect_string(' ')));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $this->nm_tira_formatacao();


   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT country, country  FROM worldcities  GROUP BY country ORDER BY country";

   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_profile_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_profile_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'][] = $rs->fields[0];
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
          $sSelComp = "name=\"country\"";
          if (isset($this->NM_ajax_info['select_html']['country']) && !empty($this->NM_ajax_info['select_html']['country']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['country'];
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

                  if ($this->country == $sValue)
                  {
                      $this->_tmp_lookup_country = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['country'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['country']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['country']['valList'][$i] = form_profile_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['country']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['country']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['country']['labList'] = $aLabel;
          }
   }

          //----- officer
   function ajax_return_values_officer($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("officer", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->officer);
              $aLookup = array();
   $out_officer = '';
   $out1_officer = '';
   if ($this->officer != "" && $this->officer != "none")   
   { 
       $path_officer = $this->Ini->root . $this->Ini->path_imagens . "" . "/" . $this->officer;
       $md5_officer  = md5("" . $this->officer);
       nm_fix_SubDirUpload($this->officer,$this->Ini->root . $this->Ini->path_imagens,"");
        if (is_file($path_officer))  
       { 
           $NM_ler_img = true;
           $out_officer = $this->Ini->path_imag_temp . "/sc_officer_" . $md5_officer . ".gif" ;  
           $out1_officer = $out_officer; 
           if (is_file($this->Ini->root . $out_officer))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_officer) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_officer = fopen($path_officer, "r") ; 
               $reg_officer = fread($tmp_officer, filesize($path_officer)) ; 
               fclose($tmp_officer) ;  
               $arq_officer = fopen($this->Ini->root . $out_officer, "w") ;  
               fwrite($arq_officer, $reg_officer) ;  
               fclose($arq_officer) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_officer, true);
           $this->nmgp_return_img['officer'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['officer'][1] = $sc_obj_img->getWidth();
       } 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['officer'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($sTmpValue),
               'imgFile' => $out_officer,
               'imgOrig' => $out1_officer,
               'keepImg' => $sKeepImage,
              );
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

          //----- logo
   function ajax_return_values_logo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("logo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->logo);
              $aLookup = array();
   $out_logo = '';
   $out1_logo = '';
   if ($this->logo != "" && $this->logo != "none")   
   { 
       $path_logo = $this->Ini->root . $this->Ini->path_imagens . "" . "/" . $this->logo;
       $md5_logo  = md5("" . $this->logo);
       nm_fix_SubDirUpload($this->logo,$this->Ini->root . $this->Ini->path_imagens,"");
        if (is_file($path_logo))  
       { 
           $NM_ler_img = true;
           $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $md5_logo . ".gif" ;  
           $out1_logo = $out_logo; 
           if (is_file($this->Ini->root . $out_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_logo = fopen($path_logo, "r") ; 
               $reg_logo = fread($tmp_logo, filesize($path_logo)) ; 
               fclose($tmp_logo) ;  
               $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
               fwrite($arq_logo, $reg_logo) ;  
               fclose($arq_logo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_logo, true);
           $this->nmgp_return_img['logo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['logo'][1] = $sc_obj_img->getWidth();
       } 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['logo'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($sTmpValue),
               'imgFile' => $out_logo,
               'imgOrig' => $out1_logo,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- facebook
   function ajax_return_values_facebook($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("facebook", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->facebook);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['facebook'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- instagram
   function ajax_return_values_instagram($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instagram", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instagram);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['instagram'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- twitter
   function ajax_return_values_twitter($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("twitter", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->twitter);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['twitter'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- youtube
   function ajax_return_values_youtube($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("youtube", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->youtube);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['youtube'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- address
   function ajax_return_values_address($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("address", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->address);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['address'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- phone
   function ajax_return_values_phone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("phone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->phone);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['phone'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- mail
   function ajax_return_values_mail($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mail", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mail);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mail'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- long
   function ajax_return_values_long($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("long", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->long);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['long'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- lat
   function ajax_return_values_lat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- aboutus
   function ajax_return_values_aboutus($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("aboutus", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->aboutus);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['aboutus'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- privacypolicy
   function ajax_return_values_privacypolicy($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("privacypolicy", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->privacypolicy);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['privacypolicy'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- terms
   function ajax_return_values_terms($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("terms", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->terms);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['terms'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- healthguide
   function ajax_return_values_healthguide($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("healthguide", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->healthguide);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['healthguide'] = array(
                       'row'    => '',
               'type'    => 'editor_html',
               'valList' => array($sTmpValue),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['upload_dir'][$fieldName][] = $newName;
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
      $NM_val_form['name'] = $this->name;
      $NM_val_form['headline'] = $this->headline;
      $NM_val_form['currency'] = $this->currency;
      $NM_val_form['footer'] = $this->footer;
      $NM_val_form['country'] = $this->country;
      $NM_val_form['officer'] = $this->officer;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['logo'] = $this->logo;
      $NM_val_form['facebook'] = $this->facebook;
      $NM_val_form['instagram'] = $this->instagram;
      $NM_val_form['twitter'] = $this->twitter;
      $NM_val_form['youtube'] = $this->youtube;
      $NM_val_form['address'] = $this->address;
      $NM_val_form['phone'] = $this->phone;
      $NM_val_form['mail'] = $this->mail;
      $NM_val_form['long'] = $this->long;
      $NM_val_form['lat'] = $this->lat;
      $NM_val_form['aboutus'] = $this->aboutus;
      $NM_val_form['privacypolicy'] = $this->privacypolicy;
      $NM_val_form['terms'] = $this->terms;
      $NM_val_form['healthguide'] = $this->healthguide;
      $NM_val_form['slidertype'] = $this->slidertype;
      $NM_val_form['whatsappurl'] = $this->whatsappurl;
      $NM_val_form['deliverytype'] = $this->deliverytype;
      if ($this->slidertype === "" || is_null($this->slidertype))  
      { 
          $this->slidertype = 0;
          $this->sc_force_zero[] = 'slidertype';
      } 
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->deliverytype === "" || is_null($this->deliverytype))  
      { 
          $this->deliverytype = 0;
          $this->sc_force_zero[] = 'deliverytype';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'), array('pdo_sqlsrv'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->name_before_qstr = $this->name;
          $this->name = substr($this->Db->qstr($this->name), 1, -1); 
          if ($this->name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->name = "null"; 
              $NM_val_null[] = "name";
          } 
          $this->headline_before_qstr = $this->headline;
          $this->headline = substr($this->Db->qstr($this->headline), 1, -1); 
          if ($this->headline == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->headline = "null"; 
              $NM_val_null[] = "headline";
          } 
          $this->address_before_qstr = $this->address;
          $this->address = substr($this->Db->qstr($this->address), 1, -1); 
          if ($this->address == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->address = "null"; 
              $NM_val_null[] = "address";
          } 
          $this->long_before_qstr = $this->long;
          $this->long = substr($this->Db->qstr($this->long), 1, -1); 
          if ($this->long == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->long = "null"; 
              $NM_val_null[] = "long";
          } 
          $this->lat_before_qstr = $this->lat;
          $this->lat = substr($this->Db->qstr($this->lat), 1, -1); 
          if ($this->lat == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->lat = "null"; 
              $NM_val_null[] = "lat";
          } 
          $this->logo_before_qstr = $this->logo;
          $this->logo = substr($this->Db->qstr($this->logo), 1, -1); 
          if ($this->logo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->logo = "null"; 
              $NM_val_null[] = "logo";
          } 
          $this->aboutus_before_qstr = $this->aboutus;
          $this->aboutus = substr($this->Db->qstr($this->aboutus), 1, -1); 
          if ($this->aboutus == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->aboutus = "null"; 
              $NM_val_null[] = "aboutus";
          } 
          $this->privacypolicy_before_qstr = $this->privacypolicy;
          $this->privacypolicy = substr($this->Db->qstr($this->privacypolicy), 1, -1); 
          if ($this->privacypolicy == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->privacypolicy = "null"; 
              $NM_val_null[] = "privacypolicy";
          } 
          $this->healthguide_before_qstr = $this->healthguide;
          $this->healthguide = substr($this->Db->qstr($this->healthguide), 1, -1); 
          if ($this->healthguide == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->healthguide = "null"; 
              $NM_val_null[] = "healthguide";
          } 
          $this->terms_before_qstr = $this->terms;
          $this->terms = substr($this->Db->qstr($this->terms), 1, -1); 
          if ($this->terms == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->terms = "null"; 
              $NM_val_null[] = "terms";
          } 
          $this->footer_before_qstr = $this->footer;
          $this->footer = substr($this->Db->qstr($this->footer), 1, -1); 
          if ($this->footer == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->footer = "null"; 
              $NM_val_null[] = "footer";
          } 
          $this->phone_before_qstr = $this->phone;
          $this->phone = substr($this->Db->qstr($this->phone), 1, -1); 
          if ($this->phone == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->phone = "null"; 
              $NM_val_null[] = "phone";
          } 
          $this->mail_before_qstr = $this->mail;
          $this->mail = substr($this->Db->qstr($this->mail), 1, -1); 
          if ($this->mail == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mail = "null"; 
              $NM_val_null[] = "mail";
          } 
          $this->facebook_before_qstr = $this->facebook;
          $this->facebook = substr($this->Db->qstr($this->facebook), 1, -1); 
          if ($this->facebook == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->facebook = "null"; 
              $NM_val_null[] = "facebook";
          } 
          $this->instagram_before_qstr = $this->instagram;
          $this->instagram = substr($this->Db->qstr($this->instagram), 1, -1); 
          if ($this->instagram == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instagram = "null"; 
              $NM_val_null[] = "instagram";
          } 
          $this->twitter_before_qstr = $this->twitter;
          $this->twitter = substr($this->Db->qstr($this->twitter), 1, -1); 
          if ($this->twitter == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->twitter = "null"; 
              $NM_val_null[] = "twitter";
          } 
          $this->youtube_before_qstr = $this->youtube;
          $this->youtube = substr($this->Db->qstr($this->youtube), 1, -1); 
          if ($this->youtube == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->youtube = "null"; 
              $NM_val_null[] = "youtube";
          } 
          $this->whatsappurl_before_qstr = $this->whatsappurl;
          $this->whatsappurl = substr($this->Db->qstr($this->whatsappurl), 1, -1); 
          if ($this->whatsappurl == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->whatsappurl = "null"; 
              $NM_val_null[] = "whatsappurl";
          } 
          $this->currency_before_qstr = $this->currency;
          $this->currency = substr($this->Db->qstr($this->currency), 1, -1); 
          if ($this->currency == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->currency = "null"; 
              $NM_val_null[] = "currency";
          } 
          $this->country_before_qstr = $this->country;
          $this->country = substr($this->Db->qstr($this->country), 1, -1); 
          if ($this->country == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->country = "null"; 
              $NM_val_null[] = "country";
          } 
          $this->officer_before_qstr = $this->officer;
          $this->officer = substr($this->Db->qstr($this->officer), 1, -1); 
          if ($this->officer == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->officer = "null"; 
              $NM_val_null[] = "officer";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_profile_mob_pack_ajax_response();
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
                  $SC_fields_update[] = "name = '$this->name', headline = '$this->headline', address = '$this->address', `long` = '$this->long', lat = '$this->lat', aboutus = '$this->aboutus', privacypolicy = '$this->privacypolicy', healthguide = '$this->healthguide', terms = '$this->terms', footer = '$this->footer', phone = '$this->phone', mail = '$this->mail', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', youtube = '$this->youtube', currency = '$this->currency', country = '$this->country'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "name = '$this->name', headline = '$this->headline', address = '$this->address', `long` = '$this->long', lat = '$this->lat', aboutus = '$this->aboutus', privacypolicy = '$this->privacypolicy', healthguide = '$this->healthguide', terms = '$this->terms', footer = '$this->footer', phone = '$this->phone', mail = '$this->mail', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', youtube = '$this->youtube', currency = '$this->currency', country = '$this->country'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "name = '$this->name', headline = '$this->headline', address = '$this->address', `long` = '$this->long', lat = '$this->lat', aboutus = '$this->aboutus', privacypolicy = '$this->privacypolicy', healthguide = '$this->healthguide', terms = '$this->terms', footer = '$this->footer', phone = '$this->phone', mail = '$this->mail', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', youtube = '$this->youtube', currency = '$this->currency', country = '$this->country'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "name = '$this->name', headline = '$this->headline', address = '$this->address', `long` = '$this->long', lat = '$this->lat', aboutus = '$this->aboutus', privacypolicy = '$this->privacypolicy', healthguide = '$this->healthguide', terms = '$this->terms', footer = '$this->footer', phone = '$this->phone', mail = '$this->mail', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', youtube = '$this->youtube', currency = '$this->currency', country = '$this->country'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "name = '$this->name', headline = '$this->headline', address = '$this->address', `long` = '$this->long', lat = '$this->lat', aboutus = '$this->aboutus', privacypolicy = '$this->privacypolicy', healthguide = '$this->healthguide', terms = '$this->terms', footer = '$this->footer', phone = '$this->phone', mail = '$this->mail', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', youtube = '$this->youtube', currency = '$this->currency', country = '$this->country'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "name = '$this->name', headline = '$this->headline', address = '$this->address', `long` = '$this->long', lat = '$this->lat', aboutus = '$this->aboutus', privacypolicy = '$this->privacypolicy', healthguide = '$this->healthguide', terms = '$this->terms', footer = '$this->footer', phone = '$this->phone', mail = '$this->mail', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', youtube = '$this->youtube', currency = '$this->currency', country = '$this->country'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "name = '$this->name', headline = '$this->headline', address = '$this->address', `long` = '$this->long', lat = '$this->lat', aboutus = '$this->aboutus', privacypolicy = '$this->privacypolicy', healthguide = '$this->healthguide', terms = '$this->terms', footer = '$this->footer', phone = '$this->phone', mail = '$this->mail', facebook = '$this->facebook', instagram = '$this->instagram', twitter = '$this->twitter', youtube = '$this->youtube', currency = '$this->currency', country = '$this->country'"; 
              } 
              if (isset($NM_val_form['slidertype']) && $NM_val_form['slidertype'] != $this->nmgp_dados_select['slidertype']) 
              { 
                  $SC_fields_update[] = "slidertype = $this->slidertype"; 
              } 
              if (isset($NM_val_form['whatsappurl']) && $NM_val_form['whatsappurl'] != $this->nmgp_dados_select['whatsappurl']) 
              { 
                  $SC_fields_update[] = "whatsappurl = '$this->whatsappurl'"; 
              } 
              if (isset($NM_val_form['deliverytype']) && $NM_val_form['deliverytype'] != $this->nmgp_dados_select['deliverytype']) 
              { 
                  $SC_fields_update[] = "deliverytype = $this->deliverytype"; 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->logo_limpa == "S")
              {
                  if ($this->logo != "null")
                  {
                      $this->logo = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                      $temp_cmd_sql = "logo = '" . $this->logo . "'";
                  }
                  else
                  {
                      $temp_cmd_sql = "logo = '" . $this->logo . "'";
                  }
                  $this->logo = "";
              }
              else
              {
                  if ($this->logo != "none" && $this->logo != "")
                  {
                      $NM_conteudo =  $this->logo;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      $temp_cmd_sql .= " logo = '$NM_conteudo'";
                      }
                      else
                      {
                          $temp_cmd_sql .= " logo = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "logo";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              $temp_cmd_sql = "";
              if ($this->officer_limpa == "S")
              {
                  if ($this->officer != "null")
                  {
                      $this->officer = '';
                  }
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                  {
                      $temp_cmd_sql = "officer = '" . $this->officer . "'";
                  }
                  else
                  {
                      $temp_cmd_sql = "officer = '" . $this->officer . "'";
                  }
                  $this->officer = "";
              }
              else
              {
                  if ($this->officer != "none" && $this->officer != "")
                  {
                      $NM_conteudo =  $this->officer;
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
                      {
                      $temp_cmd_sql .= " officer = '$NM_conteudo'";
                      }
                      else
                      {
                          $temp_cmd_sql .= " officer = '$NM_conteudo'";
                      }
                  }
                  else
                  {
                      $aDoNotUpdate[] = "officer";
                  }
              }
              if (!empty($temp_cmd_sql))
              {
                  $SC_fields_update[] = $temp_cmd_sql;
              }
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              else  
              {
                  $comando .= " WHERE id = $this->id ";  
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
                                  form_profile_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              $this->name = $this->name_before_qstr;
              $this->headline = $this->headline_before_qstr;
              $this->address = $this->address_before_qstr;
              $this->long = $this->long_before_qstr;
              $this->lat = $this->lat_before_qstr;
              $this->logo = $this->logo_before_qstr;
              $this->aboutus = $this->aboutus_before_qstr;
              $this->privacypolicy = $this->privacypolicy_before_qstr;
              $this->healthguide = $this->healthguide_before_qstr;
              $this->terms = $this->terms_before_qstr;
              $this->footer = $this->footer_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->mail = $this->mail_before_qstr;
              $this->facebook = $this->facebook_before_qstr;
              $this->instagram = $this->instagram_before_qstr;
              $this->twitter = $this->twitter_before_qstr;
              $this->youtube = $this->youtube_before_qstr;
              $this->whatsappurl = $this->whatsappurl_before_qstr;
              $this->currency = $this->currency_before_qstr;
              $this->country = $this->country_before_qstr;
              $this->officer = $this->officer_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              if ($this->logo_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if ($this->officer_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['officer_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
                  $this->NM_ajax_info['fldList']['logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
                  $this->NM_ajax_info['fldList']['officer_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }


              if     (isset($NM_val_form) && isset($NM_val_form['name'])) { $this->name = $NM_val_form['name']; }
              elseif (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
              if     (isset($NM_val_form) && isset($NM_val_form['headline'])) { $this->headline = $NM_val_form['headline']; }
              elseif (isset($this->headline)) { $this->nm_limpa_alfa($this->headline); }
              if     (isset($NM_val_form) && isset($NM_val_form['long'])) { $this->long = $NM_val_form['long']; }
              elseif (isset($this->long)) { $this->nm_limpa_alfa($this->long); }
              if     (isset($NM_val_form) && isset($NM_val_form['lat'])) { $this->lat = $NM_val_form['lat']; }
              elseif (isset($this->lat)) { $this->nm_limpa_alfa($this->lat); }
              if     (isset($NM_val_form) && isset($NM_val_form['footer'])) { $this->footer = $NM_val_form['footer']; }
              elseif (isset($this->footer)) { $this->nm_limpa_alfa($this->footer); }
              if     (isset($NM_val_form) && isset($NM_val_form['phone'])) { $this->phone = $NM_val_form['phone']; }
              elseif (isset($this->phone)) { $this->nm_limpa_alfa($this->phone); }
              if     (isset($NM_val_form) && isset($NM_val_form['mail'])) { $this->mail = $NM_val_form['mail']; }
              elseif (isset($this->mail)) { $this->nm_limpa_alfa($this->mail); }
              if     (isset($NM_val_form) && isset($NM_val_form['facebook'])) { $this->facebook = $NM_val_form['facebook']; }
              elseif (isset($this->facebook)) { $this->nm_limpa_alfa($this->facebook); }
              if     (isset($NM_val_form) && isset($NM_val_form['instagram'])) { $this->instagram = $NM_val_form['instagram']; }
              elseif (isset($this->instagram)) { $this->nm_limpa_alfa($this->instagram); }
              if     (isset($NM_val_form) && isset($NM_val_form['twitter'])) { $this->twitter = $NM_val_form['twitter']; }
              elseif (isset($this->twitter)) { $this->nm_limpa_alfa($this->twitter); }
              if     (isset($NM_val_form) && isset($NM_val_form['youtube'])) { $this->youtube = $NM_val_form['youtube']; }
              elseif (isset($this->youtube)) { $this->nm_limpa_alfa($this->youtube); }
              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['currency'])) { $this->currency = $NM_val_form['currency']; }
              elseif (isset($this->currency)) { $this->nm_limpa_alfa($this->currency); }
              if     (isset($NM_val_form) && isset($NM_val_form['country'])) { $this->country = $NM_val_form['country']; }
              elseif (isset($this->country)) { $this->nm_limpa_alfa($this->country); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('name', 'headline', 'currency', 'footer', 'country', 'officer', 'id', 'logo', 'facebook', 'instagram', 'twitter', 'youtube', 'address', 'phone', 'mail', 'long', 'lat', 'aboutus', 'privacypolicy', 'terms', 'healthguide'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          $bInsertOk = true;
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_profile_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $dir_file = $this->Ini->root . $this->Ini->path_imagens . "" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->officer_scfile_name, $dir_file, "officer");
              if (trim($this->officer_scfile_name) != $_test_file)
              {
                  $this->officer_scfile_name = $_test_file;
                  $this->officer = $_test_file;
              }
              $dir_file = $this->Ini->root . $this->Ini->path_imagens . "" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->logo_scfile_name, $dir_file, "logo");
              if (trim($this->logo_scfile_name) != $_test_file)
              {
                  $this->logo_scfile_name = $_test_file;
                  $this->logo = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES ('$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer) VALUES (" . $NM_seq_auto . "'$this->name', '$this->headline', '$this->address', '$this->long', '$this->lat', '$this->logo', '$this->aboutus', '$this->privacypolicy', '$this->healthguide', '$this->terms', '$this->footer', '$this->phone', '$this->mail', '$this->facebook', '$this->instagram', '$this->twitter', '$this->youtube', $this->slidertype, $this->id, '$this->whatsappurl', $this->deliverytype, '$this->currency', '$this->country', '$this->officer')"; 
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
                              form_profile_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              $this->name = $this->name_before_qstr;
              $this->headline = $this->headline_before_qstr;
              $this->address = $this->address_before_qstr;
              $this->long = $this->long_before_qstr;
              $this->lat = $this->lat_before_qstr;
              $this->logo = $this->logo_before_qstr;
              $this->aboutus = $this->aboutus_before_qstr;
              $this->privacypolicy = $this->privacypolicy_before_qstr;
              $this->healthguide = $this->healthguide_before_qstr;
              $this->terms = $this->terms_before_qstr;
              $this->footer = $this->footer_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->mail = $this->mail_before_qstr;
              $this->facebook = $this->facebook_before_qstr;
              $this->instagram = $this->instagram_before_qstr;
              $this->twitter = $this->twitter_before_qstr;
              $this->youtube = $this->youtube_before_qstr;
              $this->whatsappurl = $this->whatsappurl_before_qstr;
              $this->currency = $this->currency_before_qstr;
              $this->country = $this->country_before_qstr;
              $this->officer = $this->officer_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']);
              }

              $dir_img = $this->Ini->root . $this->Ini->path_imagens . "" . "/"; 
              $arq_officer = fopen($this->SC_IMG_officer, "r") ; 
              $reg_officer = fread($arq_officer, filesize($this->SC_IMG_officer)) ; 
              fclose($arq_officer) ;  
              $arq_officer = fopen($dir_img . trim($this->officer_scfile_name), "w") ; 
              fwrite($arq_officer, $reg_officer) ;  
              fclose($arq_officer) ;  
              $dir_img = $this->Ini->root . $this->Ini->path_imagens . "" . "/"; 
              $arq_logo = fopen($this->SC_IMG_logo, "r") ; 
              $reg_logo = fread($arq_logo, filesize($this->SC_IMG_logo)) ; 
              fclose($arq_logo) ;  
              $arq_logo = fopen($dir_img . trim($this->logo_scfile_name), "w") ; 
              fwrite($arq_logo, $reg_logo) ;  
              fclose($arq_logo) ;  
              $this->sc_evento = "insert"; 
              $this->name = $this->name_before_qstr;
              $this->headline = $this->headline_before_qstr;
              $this->address = $this->address_before_qstr;
              $this->long = $this->long_before_qstr;
              $this->lat = $this->lat_before_qstr;
              $this->logo = $this->logo_before_qstr;
              $this->aboutus = $this->aboutus_before_qstr;
              $this->privacypolicy = $this->privacypolicy_before_qstr;
              $this->healthguide = $this->healthguide_before_qstr;
              $this->terms = $this->terms_before_qstr;
              $this->footer = $this->footer_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->mail = $this->mail_before_qstr;
              $this->facebook = $this->facebook_before_qstr;
              $this->instagram = $this->instagram_before_qstr;
              $this->twitter = $this->twitter_before_qstr;
              $this->youtube = $this->youtube_before_qstr;
              $this->whatsappurl = $this->whatsappurl_before_qstr;
              $this->currency = $this->currency_before_qstr;
              $this->country = $this->country_before_qstr;
              $this->officer = $this->officer_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['return_edit'] = "new";
              } 
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
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
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
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
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
                          form_profile_mob_pack_ajax_response();
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']);
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->nmgp_dados_form['logo'] = ""; 
      $this->logo_limpa = ""; 
      $this->logo_salva = ""; 
      $this->nmgp_dados_form['officer'] = ""; 
      $this->officer_limpa = ""; 
      $this->officer_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "R")
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['iframe_evento'] = $this->sc_evento; 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F" && $this->sc_evento == "insert")
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
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_profile_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total'] = $qt_geral_reg_form_profile_mob;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "id < $this->id "; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Key_Where = "id < $this->id "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Key_Where = "id < $this->id "; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Key_Where = "id < $this->id "; 
              }
              else  
              {
                  $Key_Where = "id < $this->id "; 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_profile_mob = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] > $qt_geral_reg_form_profile_mob)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] = $qt_geral_reg_form_profile_mob; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] = $qt_geral_reg_form_profile_mob; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total'] + 1; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT name, headline, address, `long`, lat, logo, aboutus, privacypolicy, healthguide, terms, footer, phone, mail, facebook, instagram, twitter, youtube, slidertype, id, whatsappurl, deliverytype, currency, country, officer from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              else  
              {
                  $aWhere[] = "id = $this->id"; 
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
          $sc_order_by = "id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter'] = true;
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
              $this->name = $rs->fields[0] ; 
              $this->nmgp_dados_select['name'] = $this->name;
              $this->headline = $rs->fields[1] ; 
              $this->nmgp_dados_select['headline'] = $this->headline;
              $this->address = $rs->fields[2] ; 
              $this->nmgp_dados_select['address'] = $this->address;
              $this->long = $rs->fields[3] ; 
              $this->nmgp_dados_select['long'] = $this->long;
              $this->lat = $rs->fields[4] ; 
              $this->nmgp_dados_select['lat'] = $this->lat;
              $this->logo = $rs->fields[5] ; 
              $this->nmgp_dados_select['logo'] = $this->logo;
              $this->aboutus = $rs->fields[6] ; 
              $this->nmgp_dados_select['aboutus'] = $this->aboutus;
              $this->privacypolicy = $rs->fields[7] ; 
              $this->nmgp_dados_select['privacypolicy'] = $this->privacypolicy;
              $this->healthguide = $rs->fields[8] ; 
              $this->nmgp_dados_select['healthguide'] = $this->healthguide;
              $this->terms = $rs->fields[9] ; 
              $this->nmgp_dados_select['terms'] = $this->terms;
              $this->footer = $rs->fields[10] ; 
              $this->nmgp_dados_select['footer'] = $this->footer;
              $this->phone = $rs->fields[11] ; 
              $this->nmgp_dados_select['phone'] = $this->phone;
              $this->mail = $rs->fields[12] ; 
              $this->nmgp_dados_select['mail'] = $this->mail;
              $this->facebook = $rs->fields[13] ; 
              $this->nmgp_dados_select['facebook'] = $this->facebook;
              $this->instagram = $rs->fields[14] ; 
              $this->nmgp_dados_select['instagram'] = $this->instagram;
              $this->twitter = $rs->fields[15] ; 
              $this->nmgp_dados_select['twitter'] = $this->twitter;
              $this->youtube = $rs->fields[16] ; 
              $this->nmgp_dados_select['youtube'] = $this->youtube;
              $this->slidertype = $rs->fields[17] ; 
              $this->nmgp_dados_select['slidertype'] = $this->slidertype;
              $this->id = $rs->fields[18] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->whatsappurl = $rs->fields[19] ; 
              $this->nmgp_dados_select['whatsappurl'] = $this->whatsappurl;
              $this->deliverytype = $rs->fields[20] ; 
              $this->nmgp_dados_select['deliverytype'] = $this->deliverytype;
              $this->currency = $rs->fields[21] ; 
              $this->nmgp_dados_select['currency'] = $this->currency;
              $this->country = $rs->fields[22] ; 
              $this->nmgp_dados_select['country'] = $this->country;
              $this->officer = $rs->fields[23] ; 
              $this->nmgp_dados_select['officer'] = $this->officer;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->slidertype = (string)$this->slidertype; 
              $this->id = (string)$this->id; 
              $this->deliverytype = (string)$this->deliverytype; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sub_dir'][0]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sub_dir'][1]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] < $qt_geral_reg_form_profile_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opcao']   = '';
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
              $this->name = "";  
              $this->nmgp_dados_form["name"] = $this->name;
              $this->headline = "";  
              $this->nmgp_dados_form["headline"] = $this->headline;
              $this->address = "";  
              $this->nmgp_dados_form["address"] = $this->address;
              $this->long = "";  
              $this->nmgp_dados_form["long"] = $this->long;
              $this->lat = "";  
              $this->nmgp_dados_form["lat"] = $this->lat;
              $this->logo = "";  
              $this->logo_ul_name = "" ;  
              $this->logo_ul_type = "" ;  
              $this->nmgp_dados_form["logo"] = $this->logo;
              $this->aboutus = "";  
              $this->nmgp_dados_form["aboutus"] = $this->aboutus;
              $this->privacypolicy = "";  
              $this->nmgp_dados_form["privacypolicy"] = $this->privacypolicy;
              $this->healthguide = "";  
              $this->nmgp_dados_form["healthguide"] = $this->healthguide;
              $this->terms = "";  
              $this->nmgp_dados_form["terms"] = $this->terms;
              $this->footer = "";  
              $this->nmgp_dados_form["footer"] = $this->footer;
              $this->phone = "";  
              $this->nmgp_dados_form["phone"] = $this->phone;
              $this->mail = "";  
              $this->nmgp_dados_form["mail"] = $this->mail;
              $this->facebook = "";  
              $this->nmgp_dados_form["facebook"] = $this->facebook;
              $this->instagram = "";  
              $this->nmgp_dados_form["instagram"] = $this->instagram;
              $this->twitter = "";  
              $this->nmgp_dados_form["twitter"] = $this->twitter;
              $this->youtube = "";  
              $this->nmgp_dados_form["youtube"] = $this->youtube;
              $this->slidertype = "";  
              $this->nmgp_dados_form["slidertype"] = $this->slidertype;
              $this->id = "";  
              $this->nmgp_dados_form["id"] = $this->id;
              $this->whatsappurl = "";  
              $this->nmgp_dados_form["whatsappurl"] = $this->whatsappurl;
              $this->deliverytype = "";  
              $this->nmgp_dados_form["deliverytype"] = $this->deliverytype;
              $this->currency = "";  
              $this->nmgp_dados_form["currency"] = $this->currency;
              $this->country = "";  
              $this->nmgp_dados_form["country"] = $this->country;
              $this->officer = "";  
              $this->officer_ul_name = "" ;  
              $this->officer_ul_type = "" ;  
              $this->nmgp_dados_form["officer"] = $this->officer;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
              if ($this->nmgp_clone != "S")
              {
              }
              if ($this->nmgp_clone == "S" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_select']))
              {
                  $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dados_select'];
                  $this->name = $this->nmgp_dados_select['name'];  
                  $this->headline = $this->nmgp_dados_select['headline'];  
                  $this->address = $this->nmgp_dados_select['address'];  
                  $this->long = $this->nmgp_dados_select['long'];  
                  $this->lat = $this->nmgp_dados_select['lat'];  
                  $this->logo = $this->nmgp_dados_select['logo'];  
                  $this->aboutus = $this->nmgp_dados_select['aboutus'];  
                  $this->privacypolicy = $this->nmgp_dados_select['privacypolicy'];  
                  $this->healthguide = $this->nmgp_dados_select['healthguide'];  
                  $this->terms = $this->nmgp_dados_select['terms'];  
                  $this->footer = $this->nmgp_dados_select['footer'];  
                  $this->phone = $this->nmgp_dados_select['phone'];  
                  $this->mail = $this->nmgp_dados_select['mail'];  
                  $this->facebook = $this->nmgp_dados_select['facebook'];  
                  $this->instagram = $this->nmgp_dados_select['instagram'];  
                  $this->twitter = $this->nmgp_dados_select['twitter'];  
                  $this->youtube = $this->nmgp_dados_select['youtube'];  
                  $this->slidertype = $this->nmgp_dados_select['slidertype'];  
                  $this->whatsappurl = $this->nmgp_dados_select['whatsappurl'];  
                  $this->deliverytype = $this->nmgp_dados_select['deliverytype'];  
                  $this->currency = $this->nmgp_dados_select['currency'];  
                  $this->country = $this->nmgp_dados_select['country'];  
                  $this->officer = $this->nmgp_dados_select['officer'];  
              }
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['foreign_key'] as $sFKName => $sFKValue)
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " where id < $this->id" . $str_where_filter); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " where id > $this->id" . $str_where_filter); 
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter']))
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
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
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
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_profile_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_officer = "";  
   } 
   else 
   { 
       $out_officer = $this->officer;  
   } 
   if ($this->officer != "" && $this->officer != "none")   
   { 
       $path_officer = $this->Ini->root . $this->Ini->path_imagens . "" . "/" . $this->officer;
       $md5_officer  = md5("" . $this->officer);
       nm_fix_SubDirUpload($this->officer,$this->Ini->root . $this->Ini->path_imagens,"");
        if (is_file($path_officer))  
       { 
           $NM_ler_img = true;
           $out_officer = $this->Ini->path_imag_temp . "/sc_officer_" . $md5_officer . ".gif" ;  
           if (is_file($this->Ini->root . $out_officer))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_officer) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_officer = fopen($path_officer, "r") ; 
               $reg_officer = fread($tmp_officer, filesize($path_officer)) ; 
               fclose($tmp_officer) ;  
               $arq_officer = fopen($this->Ini->root . $out_officer, "w") ;  
               fwrite($arq_officer, $reg_officer) ;  
               fclose($arq_officer) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_officer, true);
           $this->nmgp_return_img['officer'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['officer'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_officer;
           $out_officer = str_replace($this->Ini->path_imag_temp . "/", "", $out_officer);
       } 
       } 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_officer;
       if (isset($temp_out_officer))
       {
           $out_officer = $temp_out_officer;
       }
   }
   if ($this->nmgp_opcao == "novo")
   { 
       $out_logo = "";  
   } 
   else 
   { 
       $out_logo = $this->logo;  
   } 
   if ($this->logo != "" && $this->logo != "none")   
   { 
       $path_logo = $this->Ini->root . $this->Ini->path_imagens . "" . "/" . $this->logo;
       $md5_logo  = md5("" . $this->logo);
       nm_fix_SubDirUpload($this->logo,$this->Ini->root . $this->Ini->path_imagens,"");
        if (is_file($path_logo))  
       { 
           $NM_ler_img = true;
           $out_logo = $this->Ini->path_imag_temp . "/sc_logo_" . $md5_logo . ".gif" ;  
           if (is_file($this->Ini->root . $out_logo))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_logo) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_logo = fopen($path_logo, "r") ; 
               $reg_logo = fread($tmp_logo, filesize($path_logo)) ; 
               fclose($tmp_logo) ;  
               $arq_logo = fopen($this->Ini->root . $out_logo, "w") ;  
               fwrite($arq_logo, $reg_logo) ;  
               fclose($arq_logo) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_logo, true);
           $this->nmgp_return_img['logo'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['logo'][1] = $sc_obj_img->getWidth();
       if ($this->Ini->Export_img_zip) {
           $this->Ini->Img_export_zip[] = $this->Ini->root . $out_logo;
           $out_logo = str_replace($this->Ini->path_imag_temp . "/", "", $out_logo);
       } 
       } 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_logo;
       if (isset($temp_out_logo))
       {
           $out_logo = $temp_out_logo;
       }
   }
        $this->initFormPages();
        include_once("form_profile_mob_form0.php");
        include_once("form_profile_mob_form1.php");
        include_once("form_profile_mob_form2.php");
        include_once("form_profile_mob_form3.php");
        $this->hideFormPages();
 }

        function initFormPages() {
                $this->Ini->nm_page_names = array(
                        'Pag1' => '0',
                        'Pag2' => '1',
                        'Pag3' => '2',
                        'Pag4' => '3',
                );

                $this->Ini->nm_page_blocks = array(
                        'Pag1' => array(
                                0 => 'on',
                                1 => 'on',
                        ),
                        'Pag2' => array(
                                2 => 'on',
                        ),
                        'Pag3' => array(
                                3 => 'on',
                        ),
                        'Pag4' => array(
                                4 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'Pag1',
                        1 => 'Pag1',
                        2 => 'Pag2',
                        3 => 'Pag3',
                        4 => 'Pag4',
                );

                if (!empty($this->Ini->nm_hidden_blocos)) {
                        foreach ($this->Ini->nm_hidden_blocos as $blockNo => $blockStatus) {
                                if ('off' == $blockStatus) {
                                        $this->Ini->nm_page_blocks[ $this->Ini->nm_block_page[$blockNo] ][$blockNo] = 'off';
                                }
                        }
                }

                foreach ($this->Ini->nm_page_blocks as $pageName => $pageBlocks) {
                        $hasDisplayedBlock = false;

                        foreach ($pageBlocks as $blockNo => $blockStatus) {
                                if ('on' == $blockStatus) {
                                        $hasDisplayedBlock = true;
                                }
                        }

                        if (!$hasDisplayedBlock) {
                                $this->Ini->nm_hidden_pages[$pageName] = 'off';
                        }
                }
        } // initFormPages

        function hideFormPages() {
                if (!empty($this->Ini->nm_hidden_pages)) {
?>
<script type="text/javascript">
$(function() {
        scResetPagesDisplay();
<?php
                        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                                if ('off' == $pageStatus) {
?>
        scHidePage("<?php echo $this->Ini->nm_page_names[$pageName]; ?>");
<?php
                                }
                        }
?>
        scCheckNoPageSelected();
});
</script>
<?php
                }
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
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("name", "address", "long", "lat", "logo", "aboutus", "privacypolicy", "terms", "footer", "phone", "mail", "facebook", "instagram", "twitter", "youtube"))) {
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
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['csrf_token'];
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

   function Form_lookup_currency()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'] = array(); 
    }

   $old_value_id = $this->id;
   $this->nm_tira_formatacao();


   $unformatted_value_id = $this->id;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "select code, name + ' (' + code + ')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "select code, concat(name, ' (',code,')') from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "select code, name&' ('&code&')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "select code, name||' ('||code||')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "select code, name + ' (' + code + ')' from currency order by name";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "select code, name||' ('||code||')' from currency order by name";
   }
   else
   {
       $nm_comando = "select code, name||' ('||code||')' from currency order by name";
   }

   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_currency'][] = $rs->fields[0];
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
   function Form_lookup_country()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'] = array(); 
    }

   $old_value_id = $this->id;
   $this->nm_tira_formatacao();


   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT country, country  FROM worldcities  GROUP BY country ORDER BY country";

   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['Lookup_country'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_profile_mob_pack_ajax_response();
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
              $this->SC_monta_condicao($comando, "name", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "address", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "`long`", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "lat", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "logo", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "aboutus", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "privacypolicy", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "terms", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "footer", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "phone", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "mail", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "facebook", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "instagram", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "twitter", $arg_search, $data_search);
          }
          if ($field == "SC_all_Cmp") 
          {
              $this->SC_monta_condicao($comando, "youtube", $arg_search, $data_search);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter_form'] . " and (" . $comando . ")";
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
      $qt_geral_reg_form_profile_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total'] = $qt_geral_reg_form_profile_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_profile_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_profile_mob_pack_ajax_response();
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
      $nm_numeric[] = "slidertype";$nm_numeric[] = "id";$nm_numeric[] = "deliverytype";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['decimal_db'] == ".")
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
       $nmgp_saida_form = "form_profile_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_profile_mob_fim.php";
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
       form_profile_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['masterValue']);
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
