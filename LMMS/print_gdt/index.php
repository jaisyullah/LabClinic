<?php
   include_once('print_gdt_session.php');
   @ini_set('session.cookie_httponly', 1);
   @ini_set('session.use_only_cookies', 1);
   @ini_set('session.cookie_secure', 0);
   @session_start() ;
   $_SESSION['scriptcase']['print_gdt']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['scriptcase']['print_gdt']['glo_nm_path_prod']       = "";
   $_SESSION['scriptcase']['print_gdt']['glo_nm_path_conf']       = "";
   $_SESSION['scriptcase']['print_gdt']['glo_nm_path_imagens']    = "";
   $_SESSION['scriptcase']['print_gdt']['glo_nm_path_imag_temp']  = "";
   $_SESSION['scriptcase']['print_gdt']['glo_nm_path_cache']      = "";
   $_SESSION['scriptcase']['print_gdt']['glo_nm_path_doc']        = "";
    //check publication with the prod
    $NM_dir_atual = getcwd();
    if (empty($NM_dir_atual))
    {
        $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
        $str_path_sys          = str_replace("\\", '/', $str_path_sys);
    }
    else
    {
        $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
        $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
    }
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
    $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['print_gdt']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['print_gdt']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check img
    if(empty($_SESSION['scriptcase']['print_gdt']['glo_nm_path_imagens']))
    {
            /*check img*/$_SESSION['scriptcase']['print_gdt']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['print_gdt']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['print_gdt']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //check cache
    if(empty($_SESSION['scriptcase']['print_gdt']['glo_nm_path_cache']))
    {
            /*check tmp*/$_SESSION['scriptcase']['print_gdt']['glo_nm_path_cache'] = $str_path_apl_dir . "_lib/file/cache";
    }
    //check doc
    if(empty($_SESSION['scriptcase']['print_gdt']['glo_nm_path_doc']))
    {
            /*check doc*/$_SESSION['scriptcase']['print_gdt']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
    }
    //end check publication with the prod
//
class print_gdt_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $str_google_fonts;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $nm_bases_progress;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
   var $force_db_utf8 = false;
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $script_case_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
          include_once("../_lib/lib/php/fix.php");
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $script_case_init;
      $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
      $_SESSION['scriptcase']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['TIS-620'] = 'tis-620';
      $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
      $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
      $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
      $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
      $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['GB18030'] = 'GB18030';
      $this->sc_charset['GB2312'] = 'gb2312';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
      $_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
      $_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
      $_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
      $_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
      $_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
      $_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
      $_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
      $_SESSION['scriptcase']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['print_gdt']['decimal_db'] = "."; 
      $this->nm_cod_apl      = "print_gdt"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "LMMS"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "ep_bronze"; 
      $this->nm_dt_criacao   = "20180906"; 
      $this->nm_hr_criacao   = "113141"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20211013"; 
      $this->nm_hr_ult_alt   = "165125"; 
      $this->Apl_paginacao   = "PARCIAL"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['scriptcase']['print_gdt']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['scriptcase']['print_gdt']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['scriptcase']['print_gdt']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['scriptcase']['print_gdt']['glo_nm_path_imag_temp'];
      $this->path_cache  = $_SESSION['scriptcase']['print_gdt']['glo_nm_path_cache'];
      $this->path_doc        = $_SESSION['scriptcase']['print_gdt']['glo_nm_path_doc'];
      if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
      {
          $_SESSION['scriptcase']['str_lang'] = "en_us";
      }
      if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
      {
          $_SESSION['scriptcase']['str_conf_reg'] = "en_us";
      }
      $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
      $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
      if (!isset($_SESSION['scriptcase']['print_gdt']['save_session']['save_grid_state_session']))
      { 
          $_SESSION['scriptcase']['print_gdt']['save_session']['save_grid_state_session'] = false;
          $_SESSION['scriptcase']['print_gdt']['save_session']['data'] = '';
      } 
      $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "sc_arafiq/sc_arafiq";
      $_SESSION['scriptcase']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['scriptcase']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/print_gdt';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $pos_path = strrpos($this->path_prod, "/");
      $_SESSION['sc_session'][$this->sc_page]['print_gdt']['path_grid_sv'] = $this->root . substr($this->path_prod, 0, $pos_path) . "/conf/grid_sv/";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['scriptcase']['dir_temp'] = $this->root . $this->path_imag_temp;
      $this->Cmp_Sql_Time     = array();
      if (isset($_SESSION['scriptcase']['print_gdt']['session_timeout']['lang'])) {
          $this->str_lang = $_SESSION['scriptcase']['print_gdt']['session_timeout']['lang'];
      }
      elseif (!isset($_SESSION['scriptcase']['print_gdt']['actual_lang']) || $_SESSION['scriptcase']['print_gdt']['actual_lang'] != $this->str_lang) {
          $_SESSION['scriptcase']['print_gdt']['actual_lang'] = $this->str_lang;
          setcookie('sc_actual_lang_LMMS',$this->str_lang,'0','/');
      }
      if (!isset($_SESSION['scriptcase']['fusioncharts_new']))
      {
          $_SESSION['scriptcase']['fusioncharts_new'] = @is_dir($this->path_third . '/oem_fs');
      }
      if (!isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['scriptcase']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['scriptcase']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("print_gdt_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['print_gdt']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          if ($_SESSION['scriptcase']['sem_session']) {
              unset($_SESSION['sc_session']);
          }
          exit;
      }
      if (isset($_SESSION['scriptcase']['user_logout']))
      {
          foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  unset($_SESSION['scriptcase']['user_logout'][$ind]);
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['script_case_init']    = $this->sc_page;
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode, $remove_margin, $remove_border;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['compact_mode']    = false;
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['remove_margin']   = false;
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['remove_border']   = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
              if (isset($_GET['remove_margin'])) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['remove_margin'] = 1 == $_GET['remove_margin'];
              }
              if (isset($_GET['remove_border'])) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['remove_border'] = 1 == $_GET['remove_border'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
              if (isset($remove_margin)) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['remove_margin'] = 1 == $remove_margin;
              }
              if (isset($remove_border)) {
                  $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['remove_border'] = 1 == $remove_border;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['print_gdt']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["print_gdt"]))
          {
              foreach ($_SESSION['scriptcase']['dashboard_targets'][$sTmpDashboardApp]["print_gdt"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['scriptcase']['nm_sc_retorno']);
          unset($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['scriptcase']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "ISO-8859-1";
      ini_set('default_charset', $_SESSION['scriptcase']['charset']);
      $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
         {
             $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
             $this->Nm_lang[$ind] = $dados;
         }
         if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
         }
      }
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['print_gdt']['session_timeout']['redir']))
      {
          unset($_SESSION['sc_session']['SC_parm_violation']);
          echo "<html>";
          echo "<body>";
          echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
          echo "<tr>";
          echo "   <td align=\"center\">";
          echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          echo "</body>";
          echo "</html>";
          exit;
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['scriptcase']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['print_gdt']['path_doc'] = $this->path_doc; 
      $_SESSION['scriptcase']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=44); opacity:0.44; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=42); opacity:0.42; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:4px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:4px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:4px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:4px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:4px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:4px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:4px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:4px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:4px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:4px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['print_gdt']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['print_gdt']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

// 
      include_once($this->path_aplicacao . "print_gdt_erro.class.php"); 
      $this->Erro = new print_gdt_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('print_gdt'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_api.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_fix.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("en_us");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      $_SESSION['scriptcase']['nmamd'] = array();
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['scriptcase']['sc_num_img']))
      { 
          $_SESSION['scriptcase']['sc_num_img'] = 1;
      } 
      $this->str_google_fonts= isset($str_google_fonts)?$str_google_fonts:'';
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['scriptcase']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      if (isset($_SESSION['scriptcase']['print_gdt']['session_timeout']['redir'])) {
          $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
          $SS_cod_html .= "<HTML>\r\n";
          $SS_cod_html .= " <HEAD>\r\n";
          $SS_cod_html .= "  <TITLE></TITLE>\r\n";
          $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
          if ($_SESSION['scriptcase']['proc_mobile']) {
              $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
          }
          $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
          $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
          if ($_SESSION['scriptcase']['print_gdt']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body>\r\n";
          }
          else {
              $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid.css\"/>\r\n";
              $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_grid" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
              $SS_cod_html .= "  </HEAD>\r\n";
              $SS_cod_html .= "   <body class=\"scGridPage\">\r\n";
              $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div class=\"scGridBorder\">\r\n";
              $SS_cod_html .= "    <table class=\"scGridTabela\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scGridFieldOdd\"><td class=\"scGridFieldOddFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
              $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
              $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
              $SS_cod_html .= "           target=\"_self\">\r\n";
              $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['print_gdt']['session_timeout']['redir'] . "');\">\r\n";
              $SS_cod_html .= "     </form>\r\n";
              $SS_cod_html .= "    </td></tr></table>\r\n";
              $SS_cod_html .= "    </div></td></tr></table>\r\n";
          }
          $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
          if ($_SESSION['scriptcase']['print_gdt']['session_timeout']['redir_tp'] == "R") {
              $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['print_gdt']['session_timeout']['redir'] . "');\r\n";
          }
          $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
          $SS_cod_html .= "      {\r\n";
          $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "         else\r\n";
          $SS_cod_html .= "         {\r\n";
          $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.close();\r\n";
          $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "             else\r\n";
          $SS_cod_html .= "             {\r\n";
          $SS_cod_html .= "                 window.location = url_redir;\r\n";
          $SS_cod_html .= "             }\r\n";
          $SS_cod_html .= "         }\r\n";
          $SS_cod_html .= "      }\r\n";
          $SS_cod_html .= "    </script>\r\n";
          $SS_cod_html .= " </body>\r\n";
          $SS_cod_html .= "</HTML>\r\n";
          unset($_SESSION['scriptcase']['print_gdt']['session_timeout']);
          unset($_SESSION['sc_session']);
      }
      if (isset($SS_cod_html) && isset($_GET['nmgp_opcao']) && (substr($_GET['nmgp_opcao'], 0, 14) == "ajax_aut_comp_" || substr($_GET['nmgp_opcao'], 0, 13) == "ajax_autocomp"))
      {
          unset($_SESSION['sc_session']);
          $oJson = new Services_JSON();
          echo $oJson->encode("ss_time_out");
          exit;
      }
      elseif (isset($SS_cod_html) && ((isset($_POST['nmgp_opcao']) && substr($_POST['nmgp_opcao'], 0, 5) == "ajax_") || (isset($_GET['nmgp_opcao']) && substr($_GET['nmgp_opcao'], 0, 5) == "ajax_")))
      {
          unset($_SESSION['sc_session']);
          $this->Arr_result = array();
          $this->Arr_result['ss_time_out'] = true;
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      elseif (isset($SS_cod_html))
      {
          echo $SS_cod_html;
          exit;
      }
      $this->nm_bases_access     = array("access", "ado_access", "ace_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6", "pdo_db2_odbc", "pdo_ibm");
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "adooledb_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib", "azure_mssql", "azure_ado_mssql", "azure_adooledb_mssql", "azure_odbc_mssql", "azure_mssqlnative", "azure_pdo_sqlsrv", "azure_pdo_dblib", "googlecloud_mssql", "googlecloud_ado_mssql", "googlecloud_adooledb_mssql", "googlecloud_odbc_mssql", "googlecloud_mssqlnative", "googlecloud_pdo_sqlsrv", "googlecloud_pdo_dblib", "amazonrds_mssql", "amazonrds_ado_mssql", "amazonrds_adooledb_mssql", "amazonrds_odbc_mssql", "amazonrds_mssqlnative", "amazonrds_pdo_sqlsrv", "amazonrds_pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql", "azure_mysql", "azure_mysqlt", "azure_mysqli", "azure_maxsql", "azure_pdo_mysql", "googlecloud_mysql", "googlecloud_mysqlt", "googlecloud_mysqli", "googlecloud_maxsql", "googlecloud_pdo_mysql", "amazonrds_mysql", "amazonrds_mysqlt", "amazonrds_mysqli", "amazonrds_maxsql", "amazonrds_pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql", "azure_postgres", "azure_postgres64", "azure_postgres7", "azure_pdo_pgsql", "googlecloud_postgres", "googlecloud_postgres64", "googlecloud_postgres7", "googlecloud_pdo_pgsql", "amazonrds_postgres", "amazonrds_postgres64", "amazonrds_postgres7", "amazonrds_pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle", "oraclecloud_oci8", "oraclecloud_oci805", "oraclecloud_oci8po", "oraclecloud_odbc_oracle", "oraclecloud_oracle", "oraclecloud_pdo_oracle", "amazonrds_oci8", "amazonrds_oci805", "amazonrds_oci8po", "amazonrds_odbc_oracle", "amazonrds_oracle", "amazonrds_pdo_oracle");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("pdo_progress_odbc", "progress");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['print_gdt']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['print_gdt']['sub_dir'] = array(); 
      $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1HQNwDQB/HIrwHuBqDMvOVIB/H5XKVEX7D9BsH9B/HIveD5F7HgveZSJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMvOV9FeV5X/VEBiHQXOH9BqD1rKHuBOHgvsVkJqDWrGVoFGHQJKDuFaHIrwHuX7DMNOV9FeDurGDoXGHQBsH9BqZ1NOHQJsDMveHArsDurmVoFGHQNwDQB/HIrwHurqDMvsVcB/DWrmVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3V5B7ZuJsHQXsH9BiZ1BYHuJwDMvmZSNiHEX/DoXGHQNwZ1BiD1rwHQJeHgBeZSJqDurmVoFGDcXGDuFaHAN7HuraHgrwV9FeH5B3DoXGHQBsZ1FGHIveHuFaDMvCDkXKDWB3DoF7D9XsDQJsDSBYV5FGHgNKDkBsV5X/VEBiHQBsZ1FGHIBeHQBqHgNKHEJqDWrGVoFGHQFYZSBiHIvsVWJsDMNOVcFeV5BmDoXGHQJmZkFGDSBeHuJsHgveDkXKDuXKVoFGHQBiH9FUDSN7HQFaHgrwVcXKH5B3VoBqD9BsZ1F7DSrYD5rqDMrYZSJ3DurmZuJsHQJeDQB/D1veHQF7HgvOVcB/DWB3DoXGHQJmZkFGDSNOHuFaHgvsVkJ3HEXKVoFGDcBiDQFaDSvCVWJsDMBOVcXKDWXKDoXGDcNmZ1BiDSvOZMJeDMveHErCH5FGDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQXOZ1FGHIBeHQBOHgNKHEJqDWrGVoFGHQBiH9FUHANOHuraDMNOVIB/HEBmDoXGDcFYH9BOD1rKHQBqHgveZSJqDWFGVoFGHQFYZSBiD1BOVWBODMzGVIBsDWBmVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQNwH9FUHIvsV5BODMzGDkB/DWB3DoXGHQNmZSBqHABYHQX7HgBeDkXKH5BmVoFGHQJeDQB/DSBYHuraDMBOVIBsH5B7DoXGHQXOVIJsD1zGZMB/DMveHArsHEB7DoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQNmZSBOHAzGZMBqHgveVkJqDWB3VoFGHQXsDQBqHAN7HuJeDMBOV9FeH5B3DoXGHQXOH9BOHAvCZMFaHgBeHArsDWB3VoFGHQNmDQB/HArYHQJwHgvOV9BUH5B3VoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQJmVIJsDSvmD5FaHgNOHEBUDWr/DoB/DcBwZSFGHANOV5FUHuNOV9FiDWXCHMFaD9JmZ1B/HIrwV5FaDErKDkBsV5FaHMJeDcBwDQFGD1veHQXGHgvsVcBOHEX7DoraHQFYH9FaHAvmZMJeHgvCHEJGDWF/VoJeD9NwDQBqHINaV5BqDMrwDkFCDuX7VEF7D9BiH9FaHAN7D5FaDEBOZSJGH5BmDoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUHQNmH9BiHIrwHuF7DMrwVcB/DWJeHMFUHQBsZSBqDSrYHQJwDEBODkFeH5FYVoFGHQJKDQJsDSN7VWBqHuBYVcFCDur/HIF7HQNmZSFaHIveV5BODEBeHArsDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcFiV5X7VorqD9XOZSB/DSrYV5FUDEvsHENiV5FaVoBqDcBwDQJwD1NKD5NUHuzGVcFKDur/VorqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcXKHEF/HMBqHQNwZkBiD1rwHQX7HgveHEXeDuFaDoF7HQXOH9X7DSBYHQF7HuvmVcFKDuB7VorqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/VoB/D9NwDQB/Z1rwV5X7HuzGVIBOV5X7DoJsD9XGZSB/HArYHQJwDEBODkFeH5FYVoFGHQJKDQBqHAvmV5JeDMvOZSNiDWXKVoF7HQNmZ1BiHAzGD5JeHgBeHEFiV5B3DoF7D9XsDuFaHAveHuNUDMrYVcFeDWFYHIFGD9JmVIJsHIveZMBqDEBOHArCDuJeDoJeDcBwDQJsHIrKHuFaHuNOZSrCH5FqDoXGHQJmZ1FGDSNOD5NUDEBeHEJGH5FYZuXGD9NmDQX7HIBeD5rqHgvsVcBODurGVoFaHQXGZSB/HABYV5BqDEBeHEJGDWFqVoX7DcJUDQFaDSBYV5BqHuNOVcFKDWFaDoXGHQJmZ1F7Z1vmD5rqDEBOHArCDWBmZuXGHQXGZ9XGHANKVWFU";
      $this->prep_conect();
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['print_gdt']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['print_gdt']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['scriptcase']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_SweetBlue_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_scriptcase9_SweetBlue_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = ""; 
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['scriptcase']['sc_connection']) && !empty($_SESSION['scriptcase']['sc_connection']))
      {
          foreach ($_SESSION['scriptcase']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao']) && $_SESSION['scriptcase']['print_gdt']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['print_gdt']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['print_gdt']['glo_nm_perfil']) && $_SESSION['scriptcase']['print_gdt']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['scriptcase']['print_gdt']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['scriptcase']['print_gdt']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['scriptcase']['print_gdt']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao'])) ? $_SESSION['scriptcase']['print_gdt']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao']))
      {
          if (!isset($_GET['nmgp_opcao']) || ('pdf' != $_GET['nmgp_opcao'] && 'pdf_res' != $_GET['nmgp_opcao'])) {
              ob_start();
          } else {
              @ini_set('zlib.output_compression',0);
              $bufferSize = @ini_get('output_buffering');
              if ('' != $bufferSize) {
                  $bufferSize = min($bufferSize * 10, 65536);
                  echo str_repeat('&nbsp;', $bufferSize);
              }
              
          }
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'LMMS', 2, $this->force_db_utf8); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['scriptcase']['glo_tpbanco']) && empty($_SESSION['scriptcase']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['scriptcase']['print_gdt']['glo_nm_perfil']) && !empty($_SESSION['scriptcase']['print_gdt']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['print_gdt']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['scriptcase']['glo_perfil']) && !empty($_SESSION['scriptcase']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['scriptcase']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['scriptcase']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['print_gdt']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['print_gdt']['embutida_init']) 
      {
          if (!isset($_SESSION['trangdt'])) 
          {
              $this->nm_falta_var .= "trangdt; ";
          }
          if (!isset($_SESSION['usr_login'])) 
          {
              $this->nm_falta_var .= "usr_login; ";
          }
      }
// 
      if (!isset($_SESSION['scriptcase']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['scriptcase']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['scriptcase']['glo_servidor']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['scriptcase']['glo_banco']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_usuario']; 
      }
      if (!isset($_SESSION['scriptcase']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_senha']; 
      }
      if (isset($_SESSION['scriptcase']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['scriptcase']['glo_database_encoding']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['scriptcase']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['scriptcase']['glo_use_ssl']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['scriptcase']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['scriptcase']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['scriptcase']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['scriptcase']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['scriptcase']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['scriptcase']['glo_mysql_ssl_cipher']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['scriptcase']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['scriptcase']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['scriptcase']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['scriptcase']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['scriptcase']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['scriptcase']['oracle_type']))
      {
          $this->nm_arr_db_extra_args['oracle_type'] = $_SESSION['scriptcase']['oracle_type']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['scriptcase']['glo_use_persistent']; 
      }
      if (isset($_SESSION['scriptcase']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['scriptcase']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->date_delim  = "";
          $this->date_delim1 = "";
      }
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['scriptcase']['glo_decimal_db']) && !empty($_SESSION['scriptcase']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['decimal_db'] = $_SESSION['scriptcase']['glo_decimal_db']; 
      }
      if (isset($_SESSION['scriptcase']['glo_date_separator']) && !empty($_SESSION['scriptcase']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['scriptcase']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_cancel { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=44); opacity:0.44; padding:3px 13px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_cancel_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_cancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_cancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_check_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_check_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_check_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f84d70; border-style:solid; border-radius:4px; background-color:#f84d70; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#f23e63; border-style:solid; border-radius:4px; background-color:#f23e63; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=42); opacity:0.42; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_danger_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#fa5c7c; border-style:solid; border-radius:4px; background-color:#fa5c7c; box-shadow:0 2px 6px 0 rgba(250,92,124,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_danger_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_danger_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_default_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_default_list { background-color:#ffffff; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list:hover { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_default_list_disabled { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; filter: alpha(opacity=45); opacity:0.45; cursor:default;  }";
          echo ".scButton_default_list_selected { background-color:#ffffff; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858; padding:6px 52px 6px 15px; cursor:pointer; filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_default_list:active { background-color:#EFF2F7; filter: alpha(opacity=100); opacity:1; padding:6px 52px 6px 15px; cursor:pointer; font-family:Arial, sans-serif; font-size:13px; text-decoration:none; color:#3C4858;  }";
          echo ".scButton_facebook { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#304d8a; border-style:solid; border-radius:4px; background-color:#304d8a; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2d4373; border-style:solid; border-radius:4px; background-color:#2d4373; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_facebook_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:#3b5998; border-color:#3b5998; border-style:solid; border-radius:4px; background-color:#3b5998; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_facebook_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_facebook_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:hover { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome:active { color:#8592a6; font-size:15px; text-decoration:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_disabled { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=44); opacity:0.44; padding:5px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_selected { color:#8592a6; font-size:15px; text-decoration:none; border-style:none; filter: alpha(opacity=100); opacity:1; padding:5px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_fontawesome_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_fontawesome_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e0321c; border-style:solid; border-radius:4px; background-color:#e0321c; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c23321; border-style:solid; border-radius:4px; background-color:#c23321; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_google_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#dd4b39; border-style:solid; border-radius:4px; background-color:#dd4b39; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_google_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_google_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:hover { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons:active { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_disabled { color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_icons_selected { color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_icons_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_icons_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1abf90; border-style:solid; border-radius:4px; background-color:#1abf90; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#0acf97; border-style:solid; border-radius:4px; background-color:#0acf97; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_ok_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#00ab7a; border-style:solid; border-radius:4px; background-color:#00ab7a; box-shadow:0 2px 6px 0 rgba(10,207,151,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_ok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_ok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1678c2; border-style:solid; border-radius:4px; background-color:#1678c2; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#1a69a4; border-style:solid; border-radius:4px; background-color:#1a69a4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_paypal_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2185d0; border-style:solid; border-radius:4px; background-color:#2185d0; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_paypal_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_paypal_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#727cf4; border-style:solid; border-radius:4px; background-color:#727cf4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#313a46; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e3eaef; border-style:solid; border-radius:4px; background-color:#e3eaef; filter: alpha(opacity=50); opacity:0.5; padding:3px 13px; cursor:default;  }";
          echo ".scButton_small_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#5966eb; border-style:solid; border-radius:4px; background-color:#5966eb; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:3px 13px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_small_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_small_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#35a2f4; border-style:solid; border-radius:4px; background-color:#35a2f4; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#2795e9; border-style:solid; border-radius:4px; background-color:#2795e9; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_twitter_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#55acee; border-style:solid; border-radius:4px; background-color:#55acee; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_twitter_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_twitter_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:hover { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#e60000; border-style:solid; border-radius:4px; background-color:#e60000; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube:active { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:#c00; border-style:solid; border-radius:4px; background-color:#c00; box-shadow:inset 0 -1px 0 rgba(31, 45, 61, 0.15); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_disabled { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:default; transition:all 0.2s;  }";
          echo ".scButton_youtube_selected { font-family:Leelawadee, Ebrima, 'Bahnschrift Light', Gadugi, 'Nirmala UI', 'Segoe UI', Verdana; color:#fff; font-size:13px; font-weight:normal; text-decoration:none; border-width:1px; border-color:red; border-style:solid; border-radius:4px; background-color:red; box-shadow:0 2px 6px 0 rgba(227,234,239,.5); filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_youtube_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_youtube_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#2b77c0; border-style:solid; border-radius:4.25px; background-color:#2b77c0; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#266aab; border-style:solid; border-radius:4.25px; background-color:#266aab; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertok_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertok_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:hover { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#999; border-style:solid; border-radius:4.25px; background-color:#999; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel:active { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#3085d6; border-style:solid; border-radius:4.25px; background-color:#3085d6; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_disabled { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#aaa; border-style:solid; border-radius:4.25px; background-color:#aaa; box-shadow:none; filter: alpha(opacity=44); opacity:0.44; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_selected { font-family:Arial, sans-serif; color:#fff; font-size:17px; font-weight:normal; text-decoration:none; border-width:0px; border-color:#7a7a7a; border-style:solid; border-radius:4.25px; background-color:#7a7a7a; box-shadow:none; filter: alpha(opacity=100); opacity:1; padding:9px 12px; cursor:pointer; transition:all 0.2s;  }";
          echo ".scButton_sweetalertcancel_list { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sweetalertcancel_list:hover { filter: alpha(opacity=100); opacity:1;  }";
          echo ".scButton_sc_image {  }";
          echo ".scButton_sc_image:hover {  }";
          echo ".scButton_sc_image:active {  }";
          echo ".scButton_sc_image_disabled {  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu'] && (!isset($_SESSION['sc_session'][$script_case_init]['print_gdt']['sc_outra_jan']) || !$_SESSION['sc_session'][$script_case_init]['print_gdt']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['scriptcase']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['scriptcase']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_danger" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_usr']) && !empty($_SESSION['scriptcase']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['scriptcase']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_pass']) && !empty($_SESSION['scriptcase']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['scriptcase']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['scriptcase']['glo_db_master_cript']) && !empty($_SESSION['scriptcase']['glo_db_master_cript']))
      {
          $_SESSION['scriptcase']['glo_senha_protect'] = $_SESSION['scriptcase']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && isset($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao']) && !empty($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['scriptcase']['print_gdt']['glo_nm_conexao'], $this->root . $this->path_prod, 'LMMS', 1, $this->force_db_utf8); 
      } 
      else 
      { 
          ob_start();
          $databaseEncoding = $this->force_db_utf8 ? 'utf8' : $this->nm_database_encoding;
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $databaseEncoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['print_gdt']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
          $this->Ibase_version = "old";
          if ($ibase_version = $this->Db->Execute("SELECT RDB\$GET_CONTEXT('SYSTEM','ENGINE_VERSION') AS \"Version\" FROM RDB\$DATABASE"))
          {
              if (isset($ibase_version->fields[0]) && substr($ibase_version->fields[0], 0, 1) > 2) {$this->Ibase_version = "new";}
          }
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
      {
          $this->Db->fetchMode = ADODB_FETCH_NUM;
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['print_gdt']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['print_gdt']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_end_clean();
          } 
      } 
   }
   function regionalDefault()
   {
       $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "mmddyyyy";
       $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ",";
       $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ".";
       $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
       $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ",";
       $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ".";
       $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['scriptcase']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function sc_Date_Protect($val_dt)
   {
       $dd = substr($val_dt, 8, 2);
       $mm = substr($val_dt, 5, 2);
       $yy = substr($val_dt, 0, 4);
       $hh = (strlen($val_dt) > 10) ? substr($val_dt, 10) : "";
       if ($mm > 12) {
           $mm = 12;
       }
       $dd_max = 31;
       if ($mm == '04' || $mm == '06' || $mm == '09' || $mm == 11) {
           $dd_max = 30;
       }
       if ($mm == '02') {
           $dd_max = ($yy % 4 == 0) ? 29 : 28;
       }
       if ($dd > $dd_max) {
           $dd = $dd_max;
       }
       return $yy . "-" . $mm . "-" . $dd . $hh;
   }
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['print_gdt']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['scriptcase']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class print_gdt_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $script_case_init, $glo_senha_protect;

      $this->Ini = new print_gdt_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['print_gdt']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['print_gdt']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['print_gdt']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['print_gdt'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['print_gdt']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['print_gdt']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('print_gdt') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['print_gdt']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "print_gdt")
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
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['print_gdt']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['print_gdt']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['print_gdt']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("en_us");
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
      $this->Db = $this->Ini->Db; 
      include_once($this->Ini->path_aplicacao . "print_gdt_erro.class.php"); 
      $this->Erro      = new print_gdt_erro();
      $this->Erro->Ini = $this->Ini;
//
      header("X-XSS-Protection: 1; mode=block");
      header("X-Frame-Options: SAMEORIGIN");
      $_SESSION['scriptcase']['print_gdt']['contr_erro'] = 'on';
if (!isset($_SESSION['usr_login'])) {$_SESSION['usr_login'] = "";}
if (!isset($this->sc_temp_usr_login)) {$this->sc_temp_usr_login = (isset($_SESSION['usr_login'])) ? $_SESSION['usr_login'] : "";}
if (!isset($_SESSION['trangdt'])) {$_SESSION['trangdt'] = "";}
if (!isset($this->sc_temp_trangdt)) {$this->sc_temp_trangdt = (isset($_SESSION['trangdt'])) ? $_SESSION['trangdt'] : "";}
 $trangdt = $this->sc_temp_trangdt;
$login = $this->sc_temp_usr_login;

$check_sql = "SELECT c.name"
   . " FROM outpatient_reg a left join laboratory_medical b on b.regCode = a.tranCode left join doctor_settings c on c.ID = a.doctorID"
   . " WHERE b.tranCode = '" . $trangdt . "'";
 
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
    $dpjp = $this->rs[0][0];
}
		else     
{
	$dpjp = '';
}

$check_sql = "SELECT `name`"
   . " FROM staff_settings"
   . " WHERE usr_login = '" . $login . "'";
 
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
    $petugas = $this->rs[0][0];
}
		else     
{
	$petugas = 'Lab Officer';
}

$libHomeDir = $_SERVER["DOCUMENT_ROOT"] . '/xlibs';
$reportHomeDir = $_SERVER["DOCUMENT_ROOT"] . '/reports';

$sSQL = "SELECT name, value FROM app_setting WHERE name IN ('nama_institusi2', 'alamat_institusi')";
 
      $nm_select = $sSQL; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dsett = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                        $this->dsett[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dsett = false;
          $this->dsett_erro = $this->Db->ErrorMsg();
      } 
;
$conf = array();
if(!empty($this->dsett )){
	foreach($this->dsett  as $set){
		$conf[$set[0]] = $set[1];
	}
}

$check_sql = "SELECT trancode,
    struk,
    custcode,
    doccode,
    trandate,
    finishdate,
    inapcode,
	note,
	diag
FROM
    tbtranlab
where trancode = '" . $trangdt . "'";
 
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
    $tran = $this->rs[0][0];
    $struk = $this->rs[0][1];
	$norm = $this->rs[0][2];
	$kodedokter = $this->rs[0][3];
    $tgl_tran = $this->rs[0][4];
	$tgl_selesai = $this->rs[0][5];
	$kodeinap = $this->rs[0][6];
	$keterangan = $this->rs[0][7];
	$diag = $this->rs[0][8];
}
		else     
{
	$tran = '';
    $struk = '';
	$norm = '';
	$kodedokter = '';
    $tgl_tran = date("Y-m-d H:i:s");
	$tgl_selesai = date("Y-m-d H:i:s");
	$kodeinap = '';
	$keterangan = '';
	$diag = '';
}

$check_sql = "SELECT birthDate"
   . " FROM tbcustomer"
   . " WHERE custCode = '" . $norm . "'";
 
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
    $tl = $this->rs[0][0];
}
		else     
{
	$tl = date("Y-m-d");
}

$lahir = new DateTime($tl);
$today = new DateTime();
$umur = $today->diff($lahir);
$usia = $umur->y . " TH " . $umur->m . " BLN " . $umur->d . " HR";

$check_sql = "SELECT concat(name,', ',salut), sex, date(birthDate)"
   . " FROM tbcustomer"
   . " WHERE custCode = '" . $norm . "'";
 
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
    $nama = $this->rs[0][0];
    $sex = $this->rs[0][1];
    $tgl_lahir = $this->rs[0][2];
}
		else     
{
	$nama = '';
    $sex = '';
	$tgl_lahir = '';
}

if($sex == 'L'){
	$gender = 'LAKI-LAKI';
}else{
	$gender = 'PEREMPUAN';
}

if($kodeinap == '--' || $kodeinap = ''){
	$asal = 'POLIKLINIK/IGD';
}else{
	$asal = 'RAWAT INAP';
}	

$check_sql = "SELECT concat(gelar,', ',name,', ',spec)"
   . " FROM tbdoctor"
   . " WHERE docCode = '" . $kodedokter . "'";
 
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
    $dokter = $this->rs[0][0];
}
		else     
{
	$dokter = '';
}

$html = '<!DOCTYPE html>
<html>
	<head>
	<title>HASIL LABORATORIUM : '.$trangdt.'</title>
	<style>
		html {
                margin: 10px 20px;
            }
		
	 	body {
			width: 750px;
			border: #efefef;
			font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			font-size: 12px;
		}
		
		.title_faktur {
			text-align:center;
			font-weight:bold;
			background:#E0E0E0;
		}
		
		.table_faktur td{
			text-align:center;
			font-weight:bold;
		}
		
		
		.mt5 {
			margin-top:5px;
		}
		
		
		.pl3 {
			padding-left:3px;
		}
		
		.tbfooter {
			width:100%;
			margin-bottom:5px;
		}
		
		.cp{
			border-collapse: collapse;
			width: 100%;
		}
		
		.cp td, .cp th {
			padding: 15px;
			padding-top: 2px;
		  	padding-bottom: 2px;
		}
		
		.hdborder {
			border-top:1px solid #c0c0c0;
			border-bottom:1px solid #c0c0c0;
			padding-top:5px;
			padding-bottom:5px;
		}
		
		.topborder {			
			border-top:1px solid #c0c0c0;
		}
		
		.btborder {			
			border-bottom:1px solid #c0c0c0;
			text-align:center;
			font-style:italic;
		}
		
		.dblbtborder {			
			padding-bottom:2px;
			border-bottom:1px solid #c0c0c0;
		}
		
		.tagihan {
		  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		.tagihan td, .tagihan th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		.tagihan tr:nth-child(even){background-color: #f2f2f2;}

		.tagihan tr:hover {background-color: #ddd;}

		.tagihan th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #4CAF50;
		  color: white;
		}
		
	</style>
	</head>
	<body>
		<table class = "table_faktur">
		<tr>
			<td rowspan ="2">
		<img width ="150px" height ="80px" src="'.($libHomeDir  . '/logo.png').'"/>
			</td>
			<td width = "80%">
			<font color="green" size="19">'.$conf['nama_institusi2'].'</font>
			</td>
		</tr>
		<tr>
			<td>
			<font size="13">'.$conf['alamat_institusi'].'</font>
			</td>
		</tr>
		</table>
		<p class="title_faktur">
			<font size="15">RESULT FOR : Peripheral Blood Morphology</font>
		</p>';

$html .= '<table width ="100%">			
			<tr>
				<td><strong>STRUK NO</strong></td>
				<td>: </td><td>'.$struk.'</td>
				<td></td>
				<td><strong>NO TRANSAKSI</strong></td>
				<td>: </td><td>'.$trangdt.'</td>
			</tr>
			<tr>
				<td><strong>NO RM</strong></td>
				<td>: </td><td>'.$norm.'</td>
				<td></td>
				<td><strong>DOKTER</strong></td>
				<td>: </td><td>'.$dokter.'</td>
			</tr>
			<tr>
				<td><strong>NAMA PASIEN</strong></td>
				<td>: </td><td>'.$nama.'</td>
				<td></td>
				<td><strong>ASAL PASIEN</strong></td>
				<td>: </td><td>'.$asal.'</td>
			</tr>
			<tr>
				<td><strong>JENIS KELAMIN</strong></td>
				<td>: </td><td>'.$gender.'</td>		
				<td></td>
				<td><strong>TGL. TRANSAKSI</strong></td>
				<td>: </td><td>'.$tgl_tran.'</td>
			</tr>
			<tr>
				<td><strong>USIA</strong></td>
				<td>: </td><td>'.$usia.'</td>		
				<td></td>
				<td><strong>TGL. SELESAI</strong></td>
				<td>: </td><td>'.$tgl_selesai.'</td>
			</tr>
			<tr>
				<td><strong>TGL. LAHIR</strong></td>
				<td>: </td><td>'.$tgl_lahir.'</td>		
				<td></td>
				<td><strong>PETUGAS LAB</strong></td>
				<td>: </td><td>'.$petugas.'</td>
			</tr>
			<tr>
				<td><strong>DIAGNOSA</strong></td>
				<td>: </td><td>'.$diag.'</td>		
				<td></td>
				<td><strong>&nbsp;</strong></td>
				<td>&nbsp;</td><td>&nbsp;</td>
			</tr>
		</table>
		
		<br>
		<table class="tagihan">
		  <tr>
			<th align="center">HASIL PEMERIKSAAN</th>
		  </tr>
		 ';

$check_sql = "SELECT
    gdt
FROM 
    tbhasillab
where trancode = '".$trangdt."' and nama = 'GAMBARAN DARAH TEPI' and subname = 'GAMBARAN DARAH TEPI'";

 
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
    $hasil = $this->rs[0][0];
}
		else     
{
	$hasil = '';
}

$html .=' <tr>
			<td></td>
		  </tr>
		  <tr>
			<td>'.$hasil.'</td>
		  </tr>
		  <tr>
			<td></td>
		  </tr>';

$html .='</table><br>
<table style="font-size:70%" class = "cp">
			<tr>
				<td><b>KETERANGAN :</b></td>
				<td align = "right">Terima kasih atas kerjasamanya</td>
			</tr>
			<tr>
				<td>'.$keterangan.'</td>
				<td align = "right">&nbsp</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align = "right">&nbsp</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td align = "right"><u>'.$dpjp.'</u><br>SIP: 446.1/7159/SDK/X/2019</td>			
			</tr>
		</table></body>
</html>';

define('DOMPDF_ENABLE_AUTOLOAD', false);

require_once($libHomeDir  . '/dompdf/dompdf_config.inc.php');
require_once($libHomeDir  . '/dompdf/include/autoload.inc.php');

$dompdf = new DOMPDF();  
$dompdf->load_html($html);
$dompdf->set_paper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("$trangdt - $nama.pdf", array("Attachment"=>0));
if (isset($this->sc_temp_trangdt)) {$_SESSION['trangdt'] = $this->sc_temp_trangdt;}
if (isset($this->sc_temp_usr_login)) {$_SESSION['usr_login'] = $this->sc_temp_usr_login;}
$_SESSION['scriptcase']['print_gdt']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
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
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
        <script type="text/javascript">
          var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
          var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
          var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
        </script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
<?php
       } 
       exit;
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
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('LMMS');
   $_SESSION['scriptcase']['print_gdt']['contr_erro'] = 'off';
   $Sc_lig_md5 = false;
   $Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
   $_SESSION['scriptcase']['sem_session'] = false;
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
            nm_limpa_str_print_gdt($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
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
            nm_limpa_str_print_gdt($nmgp_val);
            $nmgp_val = NM_decode_input($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
   {
       $Sem_Session = false;
   }
   $NM_dir_atual = getcwd();
   if (empty($NM_dir_atual)) {
       $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
       $str_path_sys  = str_replace("\\", '/', $str_path_sys);
   }
   else {
       $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
       $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
   }
   $str_path_web    = $_SERVER['PHP_SELF'];
   $str_path_web    = str_replace("\\", '/', $str_path_web);
   $str_path_web    = str_replace('//', '/', $str_path_web);
   $path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
   $path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
   $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
   if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
       if (isset($_COOKIE['sc_apl_default_LMMS'])) {
           $apl_def = explode(",", $_COOKIE['sc_apl_default_LMMS']);
       }
       elseif (is_file($root . $_SESSION['scriptcase']['print_gdt']['glo_nm_path_imag_temp'] . "/sc_apl_default_LMMS.txt")) {
           $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['print_gdt']['glo_nm_path_imag_temp'] . "/sc_apl_default_LMMS.txt"));
       }
       if (isset($apl_def)) {
           if ($apl_def[0] != "print_gdt") {
               $_SESSION['scriptcase']['sem_session'] = true;
               if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                   $_SESSION['scriptcase']['print_gdt']['session_timeout']['redir'] = $apl_def[0];
               }
               else {
                   $_SESSION['scriptcase']['print_gdt']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
               }
               $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
               $_SESSION['scriptcase']['print_gdt']['session_timeout']['redir_tp'] = $Redir_tp;
           }
           if (isset($_COOKIE['sc_actual_lang_LMMS'])) {
               $_SESSION['scriptcase']['print_gdt']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_LMMS'];
           }
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["trangdt"])) 
   {
       $_SESSION["trangdt"] = $_POST["trangdt"];
       nm_limpa_str_print_gdt($_SESSION["trangdt"]);
   }
   if (isset($_GET["trangdt"])) 
   {
       $_SESSION["trangdt"] = $_GET["trangdt"];
       nm_limpa_str_print_gdt($_SESSION["trangdt"]);
   }
   if (!isset($_SESSION["trangdt"])) 
   {
       $_SESSION["trangdt"] = "";
   }
   if (isset($_POST["usr_login"])) 
   {
       $_SESSION["usr_login"] = $_POST["usr_login"];
       nm_limpa_str_print_gdt($_SESSION["usr_login"]);
   }
   if (isset($_GET["usr_login"])) 
   {
       $_SESSION["usr_login"] = $_GET["usr_login"];
       nm_limpa_str_print_gdt($_SESSION["usr_login"]);
   }
   if (!isset($_SESSION["usr_login"])) 
   {
       $_SESSION["usr_login"] = "";
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['scriptcase']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['scriptcase']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['scriptcase']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['scriptcase']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['scriptcase']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['scriptcase']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['scriptcase']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $script_case_init = "";
   }
   if (!isset($script_case_init) || empty($script_case_init))
   {
       $script_case_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu'];
       unset($_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
   {
        if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['scriptcase']['sc_apl_menu_atual'] = "print_gdt";
        $achou = false;
        if (isset($_SESSION['sc_session'][$script_case_init]))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'print_gdt' || $achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$script_case_init][$nome_apl]))
                    {
                        $achou = true;
                    }
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$script_case_init]['print_gdt']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$script_case_init]['print_gdt']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['print_gdt']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['print_gdt']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['print_gdt']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('print_gdt' == $sReferer || 'print_gdt_' == substr($sReferer, 0, 10))
       {
           $_SESSION['sc_session'][$script_case_init]['print_gdt']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['print_gdt']['initialize'] = true;
       }
   }

   $_POST['script_case_init'] = $script_case_init;
   if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'print_gdt')
   {
       $_SESSION['sc_session'][$script_case_init]['print_gdt']['sc_outra_jan'] = true;
        unset($_SESSION['scriptcase']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$script_case_init]['print_gdt']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/print_gdt_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
       $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
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
                nm_limpa_str_print_gdt($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (isset($trangdt)) 
       {
           $_SESSION['trangdt'] = $trangdt;
           nm_limpa_str_print_gdt($_SESSION["trangdt"]);
       }
       if (isset($usr_login)) 
       {
           $_SESSION['usr_login'] = $usr_login;
           nm_limpa_str_print_gdt($_SESSION["usr_login"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_print_gdt = new print_gdt_apl();
   $contr_print_gdt->controle();
//
   function nm_limpa_str_print_gdt(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
?>