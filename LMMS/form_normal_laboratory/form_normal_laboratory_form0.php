<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " normal_laboratory"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " normal_laboratory"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_lastupdated button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_normal_laboratory/form_normal_laboratory_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_normal_laboratory_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     if (F_name == "labcode")
     {
        $('input[name="labcode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="labcode"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="labcode"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_normal_laboratory_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  sc_form_onload();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
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

  if (show_block[block_id]) {
    if ("hidden_bloco_2" == block_id) {
      scAjaxDetailHeight("form_normal_laboratory_detail", $($("#nmsc_iframe_liga_form_normal_laboratory_detail")[0].contentWindow.document).innerHeight());
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_normal_laboratory_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_normal_laboratory'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_normal_laboratory'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
#lin1_col1 { padding-left:9px; padding-top:7px;  height:27px; overflow:hidden; text-align:left;}			 
#lin1_col2 { padding-right:9px; padding-top:7px; height:27px; text-align:right; overflow:hidden;   font-size:12px; font-weight:normal;}
</style>

<div style="width: 100%">
 <div class="scFormHeader" style="height:11px; display: block; border-width:0px; "></div>
 <div style="height:37px; border-width:0px 0px 1px 0px;  border-style: dashed; border-color:#ddd; display: block">
 	<table style="width:100%; border-collapse:collapse; padding:0;">
    	<tr>
        	<td id="lin1_col1" class="scFormHeaderFont"><span></span></td>
            <td id="lin1_col2" class="scFormHeaderFont"><span></span></td>
        </tr>
    </table>		 
 </div>
</div>
</td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input id='fast_search_f0_t' type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:none;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
?> 
          </select>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['empty_filter'] = true;
       }
  }
?>
<script type="text/javascript">
var pag_ativa = "form_normal_laboratory_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_normal_laboratory_form0' => array(
            'title' => "Main",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "form_normal_laboratory_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_normal_laboratory_form1' => array(
            'title' => "Detail",
            'class' => $nmgp_num_form == "form_normal_laboratory_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
        if (!empty($this->Ini->nm_hidden_pages)) {
                foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                        if ('Main' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_normal_laboratory_form0']['class'] = 'scTabInactive';
                        }
                        if ('Detail' == $pageName && 'off' == $pageStatus) {
                                $this->tabCssClass['form_normal_laboratory_form1']['class'] = 'scTabInactive';
                        }
                }
                $displayingPage = false;
                foreach ($this->tabCssClass as $pageInfo) {
                        if ('scTabActive' == $pageInfo['class']) {
                                $displayingPage = true;
                                break;
                        }
                }
                if (!$displayingPage) {
                        foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                                        $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                                        break;
                                }
                        }
                }
        }
?>
<?php
    $css_celula = $this->tabCssClass["form_normal_laboratory_form0"]['class'];
?>
   <li id="id_form_normal_laboratory_form0" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_normal_laboratory_form0')">
     Main
    </a>
   </li>
<?php
    $css_celula = $this->tabCssClass["form_normal_laboratory_form1"]['class'];
?>
   <li id="id_form_normal_laboratory_form1" class="<?php echo $css_celula; ?> sc-form-page">
    <a href="javascript: sc_exib_ocult_pag ('form_normal_laboratory_form1')">
     Detail
    </a>
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_normal_laboratory_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['labcode']))
    {
        $this->nm_new_label['labcode'] = "Lab Code";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $labcode = $this->labcode;
   $sStyleHidden_labcode = '';
   if (isset($this->nmgp_cmp_hidden['labcode']) && $this->nmgp_cmp_hidden['labcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['labcode']);
       $sStyleHidden_labcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_labcode = 'display: none;';
   $sStyleReadInp_labcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['labcode']) && $this->nmgp_cmp_readonly['labcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['labcode']);
       $sStyleReadLab_labcode = '';
       $sStyleReadInp_labcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['labcode']) && $this->nmgp_cmp_hidden['labcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="labcode" value="<?php echo $this->form_encode_input($labcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_labcode_label" id="hidden_field_label_labcode" style="<?php echo $sStyleHidden_labcode; ?>"><span id="id_label_labcode"><?php echo $this->nm_new_label['labcode']; ?></span></TD>
    <TD class="scFormDataOdd css_labcode_line" id="hidden_field_data_labcode" style="<?php echo $sStyleHidden_labcode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_labcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["labcode"]) &&  $this->nmgp_cmp_readonly["labcode"] == "on") { 

 ?>
<input type="hidden" name="labcode" value="<?php echo $this->form_encode_input($labcode) . "\">" . $labcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_labcode" class="sc-ui-readonly-labcode css_labcode_line" style="<?php echo $sStyleReadLab_labcode; ?>"><?php echo $this->form_format_readonly("labcode", $this->form_encode_input($this->labcode)); ?></span><span id="id_read_off_labcode" class="css_read_off_labcode" style="white-space: nowrap;<?php echo $sStyleReadInp_labcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_labcode_obj" style="" id="id_sc_field_labcode" type=text name="labcode" value="<?php echo $this->form_encode_input($labcode) ?>"
 size=7 maxlength=7 alt="{datatype: 'text', maxLength: 7, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(BY SYSTEM)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_labcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_labcode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['category']))
   {
       $this->nm_new_label['category'] = "Category";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $category = $this->category;
   $sStyleHidden_category = '';
   if (isset($this->nmgp_cmp_hidden['category']) && $this->nmgp_cmp_hidden['category'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['category']);
       $sStyleHidden_category = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_category = 'display: none;';
   $sStyleReadInp_category = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['category']) && $this->nmgp_cmp_readonly['category'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['category']);
       $sStyleReadLab_category = '';
       $sStyleReadInp_category = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['category']) && $this->nmgp_cmp_hidden['category'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="category" value="<?php echo $this->form_encode_input($this->category) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_category_label" id="hidden_field_label_category" style="<?php echo $sStyleHidden_category; ?>"><span id="id_label_category"><?php echo $this->nm_new_label['category']; ?></span></TD>
    <TD class="scFormDataOdd css_category_line" id="hidden_field_data_category" style="<?php echo $sStyleHidden_category; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_category_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["category"]) &&  $this->nmgp_cmp_readonly["category"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category'] = array(); 
    }

   $old_value_rate = $this->rate;
   $old_value_order = $this->order;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_lastupdated_hora = $this->lastupdated_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_rate = $this->rate;
   $unformatted_value_order = $this->order;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_lastupdated_hora = $this->lastupdated_hora;

   $nm_comando = "SELECT group_name, group_name  FROM laboratory_group ORDER BY group_name";

   $this->rate = $old_value_rate;
   $this->order = $old_value_order;
   $this->lastupdated = $old_value_lastupdated;
   $this->lastupdated_hora = $old_value_lastupdated_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_category'][] = $rs->fields[0];
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
   $x = 0; 
   $category_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->category_1))
          {
              foreach ($this->category_1 as $tmp_category)
              {
                  if (trim($tmp_category) === trim($cadaselect[1])) { $category_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->category) === trim($cadaselect[1])) { $category_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="category" value="<?php echo $this->form_encode_input($category) . "\">" . $category_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_category();
   $x = 0 ; 
   $category_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->category_1))
          {
              foreach ($this->category_1 as $tmp_category)
              {
                  if (trim($tmp_category) === trim($cadaselect[1])) { $category_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->category) === trim($cadaselect[1])) { $category_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($category_look))
          {
              $category_look = $this->category;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_category\" class=\"css_category_line\" style=\"" .  $sStyleReadLab_category . "\">" . $this->form_format_readonly("category", $this->form_encode_input($category_look)) . "</span><span id=\"id_read_off_category\" class=\"css_read_off_category\" style=\"white-space: nowrap; " . $sStyleReadInp_category . "\">";
   echo " <span id=\"idAjaxSelect_category\"><select class=\"sc-js-input scFormObjectOdd css_category_obj\" style=\"\" id=\"id_sc_field_category\" name=\"category\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->category) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->category)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_category_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_category_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['name']))
    {
        $this->nm_new_label['name'] = "Name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $name = $this->name;
   $sStyleHidden_name = '';
   if (isset($this->nmgp_cmp_hidden['name']) && $this->nmgp_cmp_hidden['name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['name']);
       $sStyleHidden_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_name = 'display: none;';
   $sStyleReadInp_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['name']) && $this->nmgp_cmp_readonly['name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['name']);
       $sStyleReadLab_name = '';
       $sStyleReadInp_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['name']) && $this->nmgp_cmp_hidden['name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="name" value="<?php echo $this->form_encode_input($name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_name_label" id="hidden_field_label_name" style="<?php echo $sStyleHidden_name; ?>"><span id="id_label_name"><?php echo $this->nm_new_label['name']; ?></span></TD>
    <TD class="scFormDataOdd css_name_line" id="hidden_field_data_name" style="<?php echo $sStyleHidden_name; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_name_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["name"]) &&  $this->nmgp_cmp_readonly["name"] == "on") { 

 ?>
<input type="hidden" name="name" value="<?php echo $this->form_encode_input($name) . "\">" . $name . ""; ?>
<?php } else { ?>
<span id="id_read_on_name" class="sc-ui-readonly-name css_name_line" style="<?php echo $sStyleReadLab_name; ?>"><?php echo $this->form_format_readonly("name", $this->form_encode_input($this->name)); ?></span><span id="id_read_off_name" class="css_read_off_name" style="white-space: nowrap;<?php echo $sStyleReadInp_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_name_obj" style="" id="id_sc_field_name" type=text name="name" value="<?php echo $this->form_encode_input($name) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_name_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['subname']))
    {
        $this->nm_new_label['subname'] = "Sub Name";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $subname = $this->subname;
   $sStyleHidden_subname = '';
   if (isset($this->nmgp_cmp_hidden['subname']) && $this->nmgp_cmp_hidden['subname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['subname']);
       $sStyleHidden_subname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_subname = 'display: none;';
   $sStyleReadInp_subname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['subname']) && $this->nmgp_cmp_readonly['subname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['subname']);
       $sStyleReadLab_subname = '';
       $sStyleReadInp_subname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['subname']) && $this->nmgp_cmp_hidden['subname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="subname" value="<?php echo $this->form_encode_input($subname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_subname_label" id="hidden_field_label_subname" style="<?php echo $sStyleHidden_subname; ?>"><span id="id_label_subname"><?php echo $this->nm_new_label['subname']; ?></span></TD>
    <TD class="scFormDataOdd css_subname_line" id="hidden_field_data_subname" style="<?php echo $sStyleHidden_subname; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_subname_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["subname"]) &&  $this->nmgp_cmp_readonly["subname"] == "on") { 

 ?>
<input type="hidden" name="subname" value="<?php echo $this->form_encode_input($subname) . "\">" . $subname . ""; ?>
<?php } else { ?>
<span id="id_read_on_subname" class="sc-ui-readonly-subname css_subname_line" style="<?php echo $sStyleReadLab_subname; ?>"><?php echo $this->form_format_readonly("subname", $this->form_encode_input($this->subname)); ?></span><span id="id_read_off_subname" class="css_read_off_subname" style="white-space: nowrap;<?php echo $sStyleReadInp_subname; ?>">
 <input class="sc-js-input scFormObjectOdd css_subname_obj" style="" id="id_sc_field_subname" type=text name="subname" value="<?php echo $this->form_encode_input($subname) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_subname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_subname_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['rate']))
    {
        $this->nm_new_label['rate'] = "Rate / Price";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $rate = $this->rate;
   $sStyleHidden_rate = '';
   if (isset($this->nmgp_cmp_hidden['rate']) && $this->nmgp_cmp_hidden['rate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['rate']);
       $sStyleHidden_rate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_rate = 'display: none;';
   $sStyleReadInp_rate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['rate']) && $this->nmgp_cmp_readonly['rate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['rate']);
       $sStyleReadLab_rate = '';
       $sStyleReadInp_rate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['rate']) && $this->nmgp_cmp_hidden['rate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rate" value="<?php echo $this->form_encode_input($rate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_rate_label" id="hidden_field_label_rate" style="<?php echo $sStyleHidden_rate; ?>"><span id="id_label_rate"><?php echo $this->nm_new_label['rate']; ?></span></TD>
    <TD class="scFormDataOdd css_rate_line" id="hidden_field_data_rate" style="<?php echo $sStyleHidden_rate; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_rate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rate"]) &&  $this->nmgp_cmp_readonly["rate"] == "on") { 

 ?>
<input type="hidden" name="rate" value="<?php echo $this->form_encode_input($rate) . "\">" . $rate . ""; ?>
<?php } else { ?>
<span id="id_read_on_rate" class="sc-ui-readonly-rate css_rate_line" style="<?php echo $sStyleReadLab_rate; ?>"><?php echo $this->form_format_readonly("rate", $this->form_encode_input($this->rate)); ?></span><span id="id_read_off_rate" class="css_read_off_rate" style="white-space: nowrap;<?php echo $sStyleReadInp_rate; ?>">
 <input class="sc-js-input scFormObjectOdd css_rate_obj" style="" id="id_sc_field_rate" type=text name="rate" value="<?php echo $this->form_encode_input($rate) ?>"
 size=19 alt="{datatype: 'decimal', maxLength: 19, precision: 4, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rate']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rate']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rate']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rate']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['order']))
    {
        $this->nm_new_label['order'] = "Order";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $order = $this->order;
   $sStyleHidden_order = '';
   if (isset($this->nmgp_cmp_hidden['order']) && $this->nmgp_cmp_hidden['order'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['order']);
       $sStyleHidden_order = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_order = 'display: none;';
   $sStyleReadInp_order = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['order']) && $this->nmgp_cmp_readonly['order'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['order']);
       $sStyleReadLab_order = '';
       $sStyleReadInp_order = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['order']) && $this->nmgp_cmp_hidden['order'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="order" value="<?php echo $this->form_encode_input($order) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_order_label" id="hidden_field_label_order" style="<?php echo $sStyleHidden_order; ?>"><span id="id_label_order"><?php echo $this->nm_new_label['order']; ?></span></TD>
    <TD class="scFormDataOdd css_order_line" id="hidden_field_data_order" style="<?php echo $sStyleHidden_order; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_order_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["order"]) &&  $this->nmgp_cmp_readonly["order"] == "on") { 

 ?>
<input type="hidden" name="order" value="<?php echo $this->form_encode_input($order) . "\">" . $order . ""; ?>
<?php } else { ?>
<span id="id_read_on_order" class="sc-ui-readonly-order css_order_line" style="<?php echo $sStyleReadLab_order; ?>"><?php echo $this->form_format_readonly("order", $this->form_encode_input($this->order)); ?></span><span id="id_read_off_order" class="css_read_off_order" style="white-space: nowrap;<?php echo $sStyleReadInp_order; ?>">
 <input class="sc-js-input scFormObjectOdd css_order_obj" style="" id="id_sc_field_order" type=text name="order" value="<?php echo $this->form_encode_input($order) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['order']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['order']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['order']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_order_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_order_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lastupdated']))
    {
        $this->nm_new_label['lastupdated'] = "Last Updated";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_lastupdated = $this->lastupdated;
   if (strlen($this->lastupdated_hora) > 8 ) {$this->lastupdated_hora = substr($this->lastupdated_hora, 0, 8);}
   $this->lastupdated .= ' ' . $this->lastupdated_hora;
   $this->lastupdated  = trim($this->lastupdated);
   $lastupdated = $this->lastupdated;
   $sStyleHidden_lastupdated = '';
   if (isset($this->nmgp_cmp_hidden['lastupdated']) && $this->nmgp_cmp_hidden['lastupdated'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lastupdated']);
       $sStyleHidden_lastupdated = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lastupdated = 'display: none;';
   $sStyleReadInp_lastupdated = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lastupdated']) && $this->nmgp_cmp_readonly['lastupdated'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lastupdated']);
       $sStyleReadLab_lastupdated = '';
       $sStyleReadInp_lastupdated = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lastupdated']) && $this->nmgp_cmp_hidden['lastupdated'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_lastupdated_label" id="hidden_field_label_lastupdated" style="<?php echo $sStyleHidden_lastupdated; ?>"><span id="id_label_lastupdated"><?php echo $this->nm_new_label['lastupdated']; ?></span></TD>
    <TD class="scFormDataOdd css_lastupdated_line" id="hidden_field_data_lastupdated" style="<?php echo $sStyleHidden_lastupdated; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lastupdated_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lastupdated"]) &&  $this->nmgp_cmp_readonly["lastupdated"] == "on") { 

 ?>
<input type="hidden" name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) . "\">" . $lastupdated . ""; ?>
<?php } else { ?>
<span id="id_read_on_lastupdated" class="sc-ui-readonly-lastupdated css_lastupdated_line" style="<?php echo $sStyleReadLab_lastupdated; ?>"><?php echo $this->form_format_readonly("lastupdated", $this->form_encode_input($lastupdated)); ?></span><span id="id_read_off_lastupdated" class="css_read_off_lastupdated" style="white-space: nowrap;<?php echo $sStyleReadInp_lastupdated; ?>"><?php
$tmp_form_data = $this->field_config['lastupdated']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_lastupdated_obj" style="" id="id_sc_field_lastupdated" type=text name="lastupdated" value="<?php echo $this->form_encode_input($lastupdated) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['lastupdated']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['lastupdated']['date_format']; ?>', timeSep: '<?php echo $this->field_config['lastupdated']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lastupdated_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lastupdated_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->lastupdated = $old_dt_lastupdated;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['resulttype']))
   {
       $this->nm_new_label['resulttype'] = "Result Type";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $resulttype = $this->resulttype;
   $sStyleHidden_resulttype = '';
   if (isset($this->nmgp_cmp_hidden['resulttype']) && $this->nmgp_cmp_hidden['resulttype'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['resulttype']);
       $sStyleHidden_resulttype = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_resulttype = 'display: none;';
   $sStyleReadInp_resulttype = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['resulttype']) && $this->nmgp_cmp_readonly['resulttype'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['resulttype']);
       $sStyleReadLab_resulttype = '';
       $sStyleReadInp_resulttype = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['resulttype']) && $this->nmgp_cmp_hidden['resulttype'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="resulttype" value="<?php echo $this->form_encode_input($this->resulttype) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_resulttype_label" id="hidden_field_label_resulttype" style="<?php echo $sStyleHidden_resulttype; ?>"><span id="id_label_resulttype"><?php echo $this->nm_new_label['resulttype']; ?></span></TD>
    <TD class="scFormDataOdd css_resulttype_line" id="hidden_field_data_resulttype" style="<?php echo $sStyleHidden_resulttype; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_resulttype_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["resulttype"]) &&  $this->nmgp_cmp_readonly["resulttype"] == "on") { 

$resulttype_look = "";
 if ($this->resulttype == "0") { $resulttype_look .= "Range" ;} 
 if ($this->resulttype == "1") { $resulttype_look .= "Selection" ;} 
 if ($this->resulttype == "2") { $resulttype_look .= "Description" ;} 
 if ($this->resulttype == "3") { $resulttype_look .= "Sub Value" ;} 
 if (empty($resulttype_look)) { $resulttype_look = $this->resulttype; }
?>
<input type="hidden" name="resulttype" value="<?php echo $this->form_encode_input($resulttype) . "\">" . $resulttype_look . ""; ?>
<?php } else { ?>
<?php

$resulttype_look = "";
 if ($this->resulttype == "0") { $resulttype_look .= "Range" ;} 
 if ($this->resulttype == "1") { $resulttype_look .= "Selection" ;} 
 if ($this->resulttype == "2") { $resulttype_look .= "Description" ;} 
 if ($this->resulttype == "3") { $resulttype_look .= "Sub Value" ;} 
 if (empty($resulttype_look)) { $resulttype_look = $this->resulttype; }
?>
<span id="id_read_on_resulttype" class="css_resulttype_line"  style="<?php echo $sStyleReadLab_resulttype; ?>"><?php echo $this->form_format_readonly("resulttype", $this->form_encode_input($resulttype_look)); ?></span><span id="id_read_off_resulttype" class="css_read_off_resulttype" style="white-space: nowrap; <?php echo $sStyleReadInp_resulttype; ?>">
 <span id="idAjaxSelect_resulttype"><select class="sc-js-input scFormObjectOdd css_resulttype_obj" style="" id="id_sc_field_resulttype" name="resulttype" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->resulttype == "0") { echo " selected" ;} ?>>Range</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_resulttype'][] = '0'; ?>
 <option  value="1" <?php  if ($this->resulttype == "1") { echo " selected" ;} ?>>Selection</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_resulttype'][] = '1'; ?>
 <option  value="2" <?php  if ($this->resulttype == "2") { echo " selected" ;} ?>>Description</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_resulttype'][] = '2'; ?>
 <option  value="3" <?php  if ($this->resulttype == "3") { echo " selected" ;} ?>>Sub Value</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_resulttype'][] = '3'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_resulttype_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_resulttype_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
   if (!isset($this->nm_new_label['oper']))
   {
       $this->nm_new_label['oper'] = "Range Operator";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $oper = $this->oper;
   $sStyleHidden_oper = '';
   if (isset($this->nmgp_cmp_hidden['oper']) && $this->nmgp_cmp_hidden['oper'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['oper']);
       $sStyleHidden_oper = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_oper = 'display: none;';
   $sStyleReadInp_oper = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['oper']) && $this->nmgp_cmp_readonly['oper'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['oper']);
       $sStyleReadLab_oper = '';
       $sStyleReadInp_oper = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['oper']) && $this->nmgp_cmp_hidden['oper'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="oper" value="<?php echo $this->form_encode_input($this->oper) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_oper_label" id="hidden_field_label_oper" style="<?php echo $sStyleHidden_oper; ?>"><span id="id_label_oper"><?php echo $this->nm_new_label['oper']; ?></span></TD>
    <TD class="scFormDataOdd css_oper_line" id="hidden_field_data_oper" style="<?php echo $sStyleHidden_oper; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_oper_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["oper"]) &&  $this->nmgp_cmp_readonly["oper"] == "on") { 

$oper_look = "";
 if ($this->oper == "-:-") { $oper_look .= "-" ;} 
 if ($this->oper == "<:<") { $oper_look .= "<" ;} 
 if ($this->oper == ">:>") { $oper_look .= ">" ;} 
 if ($this->oper == "?:?") { $oper_look .= "?" ;} 
 if (empty($oper_look)) { $oper_look = $this->oper; }
?>
<input type="hidden" name="oper" value="<?php echo $this->form_encode_input($oper) . "\">" . $oper_look . ""; ?>
<?php } else { ?>
<?php

$oper_look = "";
 if ($this->oper == "-:-") { $oper_look .= "-" ;} 
 if ($this->oper == "<:<") { $oper_look .= "<" ;} 
 if ($this->oper == ">:>") { $oper_look .= ">" ;} 
 if ($this->oper == "?:?") { $oper_look .= "?" ;} 
 if (empty($oper_look)) { $oper_look = $this->oper; }
?>
<span id="id_read_on_oper" class="css_oper_line"  style="<?php echo $sStyleReadLab_oper; ?>"><?php echo $this->form_format_readonly("oper", $this->form_encode_input($oper_look)); ?></span><span id="id_read_off_oper" class="css_read_off_oper" style="white-space: nowrap; <?php echo $sStyleReadInp_oper; ?>">
 <span id="idAjaxSelect_oper"><select class="sc-js-input scFormObjectOdd css_oper_obj" style="" id="id_sc_field_oper" name="oper" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_oper'][] = ''; ?>
 <option value=""></option>
 <option  value="-:-" <?php  if ($this->oper == "-:-") { echo " selected" ;} ?>>-</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_oper'][] = '-:-'; ?>
 <option  value="<:<" <?php  if ($this->oper == "<:<") { echo " selected" ;} ?>><</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_oper'][] = '<:<'; ?>
 <option  value=">:>" <?php  if ($this->oper == ">:>") { echo " selected" ;} ?>>></option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_oper'][] = '>:>'; ?>
 <option  value="?:?" <?php  if ($this->oper == "?:?") { echo " selected" ;} ?>>?</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_oper'][] = '?:?'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_oper_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_oper_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['m1']))
    {
        $this->nm_new_label['m1'] = "Value from (Male)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $m1 = $this->m1;
   $sStyleHidden_m1 = '';
   if (isset($this->nmgp_cmp_hidden['m1']) && $this->nmgp_cmp_hidden['m1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['m1']);
       $sStyleHidden_m1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_m1 = 'display: none;';
   $sStyleReadInp_m1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['m1']) && $this->nmgp_cmp_readonly['m1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['m1']);
       $sStyleReadLab_m1 = '';
       $sStyleReadInp_m1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['m1']) && $this->nmgp_cmp_hidden['m1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="m1" value="<?php echo $this->form_encode_input($m1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_m1_label" id="hidden_field_label_m1" style="<?php echo $sStyleHidden_m1; ?>"><span id="id_label_m1"><?php echo $this->nm_new_label['m1']; ?></span></TD>
    <TD class="scFormDataOdd css_m1_line" id="hidden_field_data_m1" style="<?php echo $sStyleHidden_m1; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_m1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["m1"]) &&  $this->nmgp_cmp_readonly["m1"] == "on") { 

 ?>
<input type="hidden" name="m1" value="<?php echo $this->form_encode_input($m1) . "\">" . $m1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_m1" class="sc-ui-readonly-m1 css_m1_line" style="<?php echo $sStyleReadLab_m1; ?>"><?php echo $this->form_format_readonly("m1", $this->form_encode_input($this->m1)); ?></span><span id="id_read_off_m1" class="css_read_off_m1" style="white-space: nowrap;<?php echo $sStyleReadInp_m1; ?>">
 <input class="sc-js-input scFormObjectOdd css_m1_obj" style="" id="id_sc_field_m1" type=text name="m1" value="<?php echo $this->form_encode_input($m1) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_m1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_m1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['m2']))
    {
        $this->nm_new_label['m2'] = "Value until (Male)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $m2 = $this->m2;
   $sStyleHidden_m2 = '';
   if (isset($this->nmgp_cmp_hidden['m2']) && $this->nmgp_cmp_hidden['m2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['m2']);
       $sStyleHidden_m2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_m2 = 'display: none;';
   $sStyleReadInp_m2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['m2']) && $this->nmgp_cmp_readonly['m2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['m2']);
       $sStyleReadLab_m2 = '';
       $sStyleReadInp_m2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['m2']) && $this->nmgp_cmp_hidden['m2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="m2" value="<?php echo $this->form_encode_input($m2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_m2_label" id="hidden_field_label_m2" style="<?php echo $sStyleHidden_m2; ?>"><span id="id_label_m2"><?php echo $this->nm_new_label['m2']; ?></span></TD>
    <TD class="scFormDataOdd css_m2_line" id="hidden_field_data_m2" style="<?php echo $sStyleHidden_m2; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_m2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["m2"]) &&  $this->nmgp_cmp_readonly["m2"] == "on") { 

 ?>
<input type="hidden" name="m2" value="<?php echo $this->form_encode_input($m2) . "\">" . $m2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_m2" class="sc-ui-readonly-m2 css_m2_line" style="<?php echo $sStyleReadLab_m2; ?>"><?php echo $this->form_format_readonly("m2", $this->form_encode_input($this->m2)); ?></span><span id="id_read_off_m2" class="css_read_off_m2" style="white-space: nowrap;<?php echo $sStyleReadInp_m2; ?>">
 <input class="sc-js-input scFormObjectOdd css_m2_obj" style="" id="id_sc_field_m2" type=text name="m2" value="<?php echo $this->form_encode_input($m2) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_m2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_m2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['f1']))
    {
        $this->nm_new_label['f1'] = "Value from (Female)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $f1 = $this->f1;
   $sStyleHidden_f1 = '';
   if (isset($this->nmgp_cmp_hidden['f1']) && $this->nmgp_cmp_hidden['f1'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['f1']);
       $sStyleHidden_f1 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_f1 = 'display: none;';
   $sStyleReadInp_f1 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['f1']) && $this->nmgp_cmp_readonly['f1'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['f1']);
       $sStyleReadLab_f1 = '';
       $sStyleReadInp_f1 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['f1']) && $this->nmgp_cmp_hidden['f1'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="f1" value="<?php echo $this->form_encode_input($f1) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_f1_label" id="hidden_field_label_f1" style="<?php echo $sStyleHidden_f1; ?>"><span id="id_label_f1"><?php echo $this->nm_new_label['f1']; ?></span></TD>
    <TD class="scFormDataOdd css_f1_line" id="hidden_field_data_f1" style="<?php echo $sStyleHidden_f1; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_f1_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["f1"]) &&  $this->nmgp_cmp_readonly["f1"] == "on") { 

 ?>
<input type="hidden" name="f1" value="<?php echo $this->form_encode_input($f1) . "\">" . $f1 . ""; ?>
<?php } else { ?>
<span id="id_read_on_f1" class="sc-ui-readonly-f1 css_f1_line" style="<?php echo $sStyleReadLab_f1; ?>"><?php echo $this->form_format_readonly("f1", $this->form_encode_input($this->f1)); ?></span><span id="id_read_off_f1" class="css_read_off_f1" style="white-space: nowrap;<?php echo $sStyleReadInp_f1; ?>">
 <input class="sc-js-input scFormObjectOdd css_f1_obj" style="" id="id_sc_field_f1" type=text name="f1" value="<?php echo $this->form_encode_input($f1) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_f1_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_f1_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

   <?php
    if (!isset($this->nm_new_label['f2']))
    {
        $this->nm_new_label['f2'] = "Value until (Female)";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $f2 = $this->f2;
   $sStyleHidden_f2 = '';
   if (isset($this->nmgp_cmp_hidden['f2']) && $this->nmgp_cmp_hidden['f2'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['f2']);
       $sStyleHidden_f2 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_f2 = 'display: none;';
   $sStyleReadInp_f2 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['f2']) && $this->nmgp_cmp_readonly['f2'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['f2']);
       $sStyleReadLab_f2 = '';
       $sStyleReadInp_f2 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['f2']) && $this->nmgp_cmp_hidden['f2'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="f2" value="<?php echo $this->form_encode_input($f2) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_f2_label" id="hidden_field_label_f2" style="<?php echo $sStyleHidden_f2; ?>"><span id="id_label_f2"><?php echo $this->nm_new_label['f2']; ?></span></TD>
    <TD class="scFormDataOdd css_f2_line" id="hidden_field_data_f2" style="<?php echo $sStyleHidden_f2; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_f2_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["f2"]) &&  $this->nmgp_cmp_readonly["f2"] == "on") { 

 ?>
<input type="hidden" name="f2" value="<?php echo $this->form_encode_input($f2) . "\">" . $f2 . ""; ?>
<?php } else { ?>
<span id="id_read_on_f2" class="sc-ui-readonly-f2 css_f2_line" style="<?php echo $sStyleReadLab_f2; ?>"><?php echo $this->form_format_readonly("f2", $this->form_encode_input($this->f2)); ?></span><span id="id_read_off_f2" class="css_read_off_f2" style="white-space: nowrap;<?php echo $sStyleReadInp_f2; ?>">
 <input class="sc-js-input scFormObjectOdd css_f2_obj" style="" id="id_sc_field_f2" type=text name="f2" value="<?php echo $this->form_encode_input($f2) ?>"
 size=50 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_f2_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_f2_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['unit']))
   {
       $this->nm_new_label['unit'] = "Units Scale";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $unit = $this->unit;
   $sStyleHidden_unit = '';
   if (isset($this->nmgp_cmp_hidden['unit']) && $this->nmgp_cmp_hidden['unit'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['unit']);
       $sStyleHidden_unit = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_unit = 'display: none;';
   $sStyleReadInp_unit = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['unit']) && $this->nmgp_cmp_readonly['unit'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['unit']);
       $sStyleReadLab_unit = '';
       $sStyleReadInp_unit = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['unit']) && $this->nmgp_cmp_hidden['unit'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="unit" value="<?php echo $this->form_encode_input($this->unit) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_unit_label" id="hidden_field_label_unit" style="<?php echo $sStyleHidden_unit; ?>"><span id="id_label_unit"><?php echo $this->nm_new_label['unit']; ?></span></TD>
    <TD class="scFormDataOdd css_unit_line" id="hidden_field_data_unit" style="<?php echo $sStyleHidden_unit; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_unit_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["unit"]) &&  $this->nmgp_cmp_readonly["unit"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit'] = array(); 
    }

   $old_value_rate = $this->rate;
   $old_value_order = $this->order;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_lastupdated_hora = $this->lastupdated_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_rate = $this->rate;
   $unformatted_value_order = $this->order;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_lastupdated_hora = $this->lastupdated_hora;

   $nm_comando = "select units from laboratory_units order by id";

   $this->rate = $old_value_rate;
   $this->order = $old_value_order;
   $this->lastupdated = $old_value_lastupdated;
   $this->lastupdated_hora = $old_value_lastupdated_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_normal_laboratory']['Lookup_unit'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
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
   $x = 0; 
   $unit_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->unit_1))
          {
              foreach ($this->unit_1 as $tmp_unit)
              {
                  if (trim($tmp_unit) === trim($cadaselect[1])) { $unit_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->unit) === trim($cadaselect[1])) { $unit_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="unit" value="<?php echo $this->form_encode_input($unit) . "\">" . $unit_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_unit();
   $x = 0 ; 
   $unit_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->unit_1))
          {
              foreach ($this->unit_1 as $tmp_unit)
              {
                  if (trim($tmp_unit) === trim($cadaselect[1])) { $unit_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->unit) === trim($cadaselect[1])) { $unit_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($unit_look))
          {
              $unit_look = $this->unit;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_unit\" class=\"css_unit_line\" style=\"" .  $sStyleReadLab_unit . "\">" . $this->form_format_readonly("unit", $this->form_encode_input($unit_look)) . "</span><span id=\"id_read_off_unit\" class=\"css_read_off_unit\" style=\"white-space: nowrap; " . $sStyleReadInp_unit . "\">";
   echo " <span id=\"idAjaxSelect_unit\"><select class=\"sc-js-input scFormObjectOdd css_unit_obj\" style=\"\" id=\"id_sc_field_unit\" name=\"unit\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->unit) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->unit)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_unit_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_unit_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

    <TD class="scFormDataOdd" colspan="2" >&nbsp;</TD>
<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } ?>
   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
