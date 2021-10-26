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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " outpatient register"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " outpatient register"); } ?></TITLE>
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
.css_read_off_regdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_finishdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_servicedate button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_btngrp<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" media="screen" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_his_outpatient_reg/form_his_outpatient_reg_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_his_outpatient_reg_mob_sajax_js.php");
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
     if (F_name == "trancode")
     {
        $('input[name="trancode"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="trancode"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="trancode"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "regdate")
     {
        $('input[name="regdate"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="regdate"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="regdate"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_regdate"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_regdate").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "regtime")
     {
        $('input[name="regtime"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="regtime"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="regtime"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "queueno")
     {
        $('input[name="queueno"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="queueno"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="queueno"]').removeClass("scFormInputDisabled");
        }
     }
     if (F_name == "finishdate")
     {
        $('input[name="finishdate"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="finishdate"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="finishdate"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_finishdate"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_finishdate").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "servicedate")
     {
        $('input[name="servicedate"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="servicedate"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="servicedate"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_servicedate"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_servicedate").datepicker("destroy");
        }
        else {
            scJQCalendarAdd("");
        }
     }
     if (F_name == "staffid")
     {
        $('select[name="staffid"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="staffid"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="staffid"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_his_outpatient_reg_mob_jquery.php');

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

  $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
     $(".scBtnGrpClick").mouseup(function(){
          event.preventDefault();
          if(event.target !== event.currentTarget) return;
          if($(this).find("a").prop('href') != '')
          {
              $(this).find("a").click();
          }
          else
          {
              eval($(this).find("a").prop('onclick'));
          }
  });
  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $("#hidden_bloco_0,#hidden_bloco_1,#hidden_bloco_2").each(function() {
   $(this.rows[0]).bind("click", {block: this}, toggleBlock)
                  .mouseover(function() { $(this).css("cursor", "pointer"); })
                  .mouseout(function() { $(this).css("cursor", ""); });
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
   function SC_btn_grp_text() {
      $(".scBtnGrpText").mouseover(function() { $(this).addClass("scBtnGrpTextOver"); }).mouseout(function() { $(this).removeClass("scBtnGrpTextOver"); });
   };
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
    "hidden_bloco_0": true,
    "hidden_bloco_1": true,
    "hidden_bloco_2": true
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['recarga'];
}
if ('' != $this->patientid)
{
    $this->lookup_patientid($look_rpc_patientid);
    $look_rpc_patientid =  str_replace('<', '&lt;', $look_rpc_patientid);
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_his_outpatient_reg']['error_buffer']) && '' != $_SESSION['scriptcase']['form_his_outpatient_reg']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_his_outpatient_reg']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
 include_once("form_his_outpatient_reg_mob_js0.php");
?>
<script type="text/javascript" src="<?php  echo $this->Ini->path_js . "/nm_rpc.js" ?>"> 
</script> 
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
               action="form_his_outpatient_reg_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['insert_validation']; ?>">
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
<input type="hidden" name="id" value="<?php  echo $this->form_encode_input($this->id) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_his_outpatient_reg_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_his_outpatient_reg_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['maximized']))
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['new'] != 'off' || $this->nmgp_botoes['insert'] != 'off' || $this->nmgp_botoes['exit'] != 'off' || $this->nmgp_botoes['update'] != 'off' || $this->nmgp_botoes['delete'] != 'off' || $this->nmgp_botoes['copy'] != 'off') ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "group_group_2", "scBtnGrpShow('group_2_t')", "scBtnGrpShow('group_2_t')", "sc_btgp_btn_group_2_t", "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btns_options'] . "", "", "", "__sc_grp__");?>
 
<?php
        $NM_btn = true;
echo nmButtonGroupTableOutput($this->arr_buttons, "group_group_2", 'group_2', 't', '', 'ini');
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_new_t">
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-8", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_ins_t">
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "sc-unique-btn-9", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_sai_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Escape)", "sc-unique-btn-10", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_upd_t">
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "sc-unique-btn-11", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_del_t">
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "sc-unique-btn-12", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sys_separator">
 </td></tr><tr><td class="scBtnGrpBackground">
  </div>
 
<?php
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['copy'] == "on") ? '' : 'display: none;';
?>
         <div class="scBtnGrpText scBtnGrpClick"  style="<?php echo $sCondStyle; ?>" id="gbl_sc_b_clone_t">
<?php echo nmButtonOutput($this->arr_buttons, "bcopy", "scBtnFn_sys_format_copy()", "scBtnFn_sys_format_copy()", "sc_b_clone_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + C)", "sc-unique-btn-14", "", "group_2");?>
  </div>
 
<?php
        $NM_btn = true;
    }
echo nmButtonGroupTableOutput($this->arr_buttons, "", '', '', '', 'fim');
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-15", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-16", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-17", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-18", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-19", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Patient Details<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['trancode']))
    {
        $this->nm_new_label['trancode'] = "Transaction Code";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $trancode = $this->trancode;
   $sStyleHidden_trancode = '';
   if (isset($this->nmgp_cmp_hidden['trancode']) && $this->nmgp_cmp_hidden['trancode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['trancode']);
       $sStyleHidden_trancode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_trancode = 'display: none;';
   $sStyleReadInp_trancode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['trancode']) && $this->nmgp_cmp_readonly['trancode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['trancode']);
       $sStyleReadLab_trancode = '';
       $sStyleReadInp_trancode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['trancode']) && $this->nmgp_cmp_hidden['trancode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trancode" value="<?php echo $this->form_encode_input($trancode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_trancode_line" id="hidden_field_data_trancode" style="<?php echo $sStyleHidden_trancode; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trancode_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_trancode_label" style=""><span id="id_label_trancode"><?php echo $this->nm_new_label['trancode']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trancode"]) &&  $this->nmgp_cmp_readonly["trancode"] == "on") { 

 ?>
<input type="hidden" name="trancode" value="<?php echo $this->form_encode_input($trancode) . "\">" . $trancode . ""; ?>
<?php } else { ?>
<span id="id_read_on_trancode" class="sc-ui-readonly-trancode css_trancode_line" style="<?php echo $sStyleReadLab_trancode; ?>"><?php echo $this->form_format_readonly("trancode", $this->form_encode_input($this->trancode)); ?></span><span id="id_read_off_trancode" class="css_read_off_trancode" style="white-space: nowrap;<?php echo $sStyleReadInp_trancode; ?>">
 <input class="sc-js-input scFormObjectOdd css_trancode_obj" style="" id="id_sc_field_trancode" type=text name="trancode" value="<?php echo $this->form_encode_input($trancode) ?>"
 size=15 alt="{datatype: 'integer', maxLength: 15, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['trancode']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['trancode']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(BY SYSTEM)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['patientid']))
    {
        $this->nm_new_label['patientid'] = "Patient";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $patientid = $this->patientid;
   $sStyleHidden_patientid = '';
   if (isset($this->nmgp_cmp_hidden['patientid']) && $this->nmgp_cmp_hidden['patientid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['patientid']);
       $sStyleHidden_patientid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_patientid = 'display: none;';
   $sStyleReadInp_patientid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['patientid']) && $this->nmgp_cmp_readonly['patientid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['patientid']);
       $sStyleReadLab_patientid = '';
       $sStyleReadInp_patientid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['patientid']) && $this->nmgp_cmp_hidden['patientid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="patientid" value="<?php echo $this->form_encode_input($patientid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_patientid_line" id="hidden_field_data_patientid" style="<?php echo $sStyleHidden_patientid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_patientid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_patientid_label" style=""><span id="id_label_patientid"><?php echo $this->nm_new_label['patientid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["patientid"]) &&  $this->nmgp_cmp_readonly["patientid"] == "on") { 

 ?>
<input type="hidden" name="patientid" value="<?php echo $this->form_encode_input($patientid) . "\">" . $patientid . ""; ?>
<?php } else { ?>
<span id="id_read_on_patientid" class="sc-ui-readonly-patientid css_patientid_line" style="<?php echo $sStyleReadLab_patientid; ?>"><?php echo $this->form_format_readonly("patientid", $this->form_encode_input($this->patientid)); ?></span><span id="id_read_off_patientid" class="css_read_off_patientid" style="white-space: nowrap;<?php echo $sStyleReadInp_patientid; ?>">
 <input class="sc-js-input scFormObjectOdd css_patientid_obj" style="" id="id_sc_field_patientid" type=text name="patientid" value="<?php echo $this->form_encode_input($patientid) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_his_outpatient_reg_mob*scout' : '';
   if (isset($this->Ini->sc_lig_md5["grid_patient_settings"]) && $this->Ini->sc_lig_md5["grid_patient_settings"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,patientid,patientcode*scoutnm_evt_ret_busca*scinsc_form_his_outpatient_reg_patientid_onchange(this)*scoutjs_lookup*scinlookup_patientid*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_his_outpatient_reg_mob@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,patientid,patientcode*scoutnm_evt_ret_busca*scinsc_form_his_outpatient_reg_patientid_onchange(this)*scoutjs_lookup*scinlookup_patientid*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_grid_patient_settings_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_grid_patient_settings_cons_psq. "', '" . $Md5_Lig . "')", "cap_patientid", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
 <SPAN id="id_lookup_patientid"><?php echo $look_rpc_patientid; ?></SPAN></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_patientid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_patientid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['regdate']))
    {
        $this->nm_new_label['regdate'] = "Reg Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regdate = $this->regdate;
   $sStyleHidden_regdate = '';
   if (isset($this->nmgp_cmp_hidden['regdate']) && $this->nmgp_cmp_hidden['regdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regdate']);
       $sStyleHidden_regdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regdate = 'display: none;';
   $sStyleReadInp_regdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regdate']) && $this->nmgp_cmp_readonly['regdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regdate']);
       $sStyleReadLab_regdate = '';
       $sStyleReadInp_regdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regdate']) && $this->nmgp_cmp_hidden['regdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="regdate" value="<?php echo $this->form_encode_input($regdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_regdate_line" id="hidden_field_data_regdate" style="<?php echo $sStyleHidden_regdate; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regdate_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_regdate_label" style=""><span id="id_label_regdate"><?php echo $this->nm_new_label['regdate']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regdate"]) &&  $this->nmgp_cmp_readonly["regdate"] == "on") { 

 ?>
<input type="hidden" name="regdate" value="<?php echo $this->form_encode_input($regdate) . "\">" . $regdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_regdate" class="sc-ui-readonly-regdate css_regdate_line" style="<?php echo $sStyleReadLab_regdate; ?>"><?php echo $this->form_format_readonly("regdate", $this->form_encode_input($regdate)); ?></span><span id="id_read_off_regdate" class="css_read_off_regdate" style="white-space: nowrap;<?php echo $sStyleReadInp_regdate; ?>"><?php
$tmp_form_data = $this->field_config['regdate']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_regdate_obj" style="" id="id_sc_field_regdate" type=text name="regdate" value="<?php echo $this->form_encode_input($regdate) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['regdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['regdate']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regdate_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['regtime']))
    {
        $this->nm_new_label['regtime'] = "Reg Time";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regtime = $this->regtime;
   $sStyleHidden_regtime = '';
   if (isset($this->nmgp_cmp_hidden['regtime']) && $this->nmgp_cmp_hidden['regtime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regtime']);
       $sStyleHidden_regtime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regtime = 'display: none;';
   $sStyleReadInp_regtime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regtime']) && $this->nmgp_cmp_readonly['regtime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regtime']);
       $sStyleReadLab_regtime = '';
       $sStyleReadInp_regtime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regtime']) && $this->nmgp_cmp_hidden['regtime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="regtime" value="<?php echo $this->form_encode_input($regtime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_regtime_line" id="hidden_field_data_regtime" style="<?php echo $sStyleHidden_regtime; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regtime_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_regtime_label" style=""><span id="id_label_regtime"><?php echo $this->nm_new_label['regtime']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regtime"]) &&  $this->nmgp_cmp_readonly["regtime"] == "on") { 

 ?>
<input type="hidden" name="regtime" value="<?php echo $this->form_encode_input($regtime) . "\">" . $regtime . ""; ?>
<?php } else { ?>
<span id="id_read_on_regtime" class="sc-ui-readonly-regtime css_regtime_line" style="<?php echo $sStyleReadLab_regtime; ?>"><?php echo $this->form_format_readonly("regtime", $this->form_encode_input($regtime)); ?></span><span id="id_read_off_regtime" class="css_read_off_regtime" style="white-space: nowrap;<?php echo $sStyleReadInp_regtime; ?>"><?php
$tmp_form_data = $this->field_config['regtime']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_regtime_obj" style="" id="id_sc_field_regtime" type=text name="regtime" value="<?php echo $this->form_encode_input($regtime) ?>"
 size=8 alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['regtime']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['regtime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regtime_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regtime_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['queueno']))
    {
        $this->nm_new_label['queueno'] = "Queue Num";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $queueno = $this->queueno;
   $sStyleHidden_queueno = '';
   if (isset($this->nmgp_cmp_hidden['queueno']) && $this->nmgp_cmp_hidden['queueno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['queueno']);
       $sStyleHidden_queueno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_queueno = 'display: none;';
   $sStyleReadInp_queueno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['queueno']) && $this->nmgp_cmp_readonly['queueno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['queueno']);
       $sStyleReadLab_queueno = '';
       $sStyleReadInp_queueno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['queueno']) && $this->nmgp_cmp_hidden['queueno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="queueno" value="<?php echo $this->form_encode_input($queueno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_queueno_line" id="hidden_field_data_queueno" style="<?php echo $sStyleHidden_queueno; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_queueno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_queueno_label" style=""><span id="id_label_queueno"><?php echo $this->nm_new_label['queueno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["queueno"]) &&  $this->nmgp_cmp_readonly["queueno"] == "on") { 

 ?>
<input type="hidden" name="queueno" value="<?php echo $this->form_encode_input($queueno) . "\">" . $queueno . ""; ?>
<?php } else { ?>
<span id="id_read_on_queueno" class="sc-ui-readonly-queueno css_queueno_line" style="<?php echo $sStyleReadLab_queueno; ?>"><?php echo $this->form_format_readonly("queueno", $this->form_encode_input($this->queueno)); ?></span><span id="id_read_off_queueno" class="css_read_off_queueno" style="white-space: nowrap;<?php echo $sStyleReadInp_queueno; ?>">
 <input class="sc-js-input scFormObjectOdd css_queueno_obj" style="" id="id_sc_field_queueno" type=text name="queueno" value="<?php echo $this->form_encode_input($queueno) ?>"
 size=5 maxlength=5 alt="{datatype: 'text', maxLength: 5, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_queueno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_queueno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_queueno_dumb = ('' == $sStyleHidden_queueno) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_queueno_dumb" style="<?php echo $sStyleHidden_queueno_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Medical Info<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['deptid']))
   {
       $this->nm_new_label['deptid'] = "Clinic";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $deptid = $this->deptid;
   $sStyleHidden_deptid = '';
   if (isset($this->nmgp_cmp_hidden['deptid']) && $this->nmgp_cmp_hidden['deptid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['deptid']);
       $sStyleHidden_deptid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_deptid = 'display: none;';
   $sStyleReadInp_deptid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['deptid']) && $this->nmgp_cmp_readonly['deptid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['deptid']);
       $sStyleReadLab_deptid = '';
       $sStyleReadInp_deptid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['deptid']) && $this->nmgp_cmp_hidden['deptid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="deptid" value="<?php echo $this->form_encode_input($this->deptid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_deptid_line" id="hidden_field_data_deptid" style="<?php echo $sStyleHidden_deptid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_deptid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_deptid_label" style=""><span id="id_label_deptid"><?php echo $this->nm_new_label['deptid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["deptid"]) &&  $this->nmgp_cmp_readonly["deptid"] == "on") { 

$deptid_look = "";
 if ($this->deptid == "1") { $deptid_look .= "Laboratory" ;} 
 if (empty($deptid_look)) { $deptid_look = $this->deptid; }
?>
<input type="hidden" name="deptid" value="<?php echo $this->form_encode_input($deptid) . "\">" . $deptid_look . ""; ?>
<?php } else { ?>
<?php

$deptid_look = "";
 if ($this->deptid == "1") { $deptid_look .= "Laboratory" ;} 
 if (empty($deptid_look)) { $deptid_look = $this->deptid; }
?>
<span id="id_read_on_deptid" class="css_deptid_line"  style="<?php echo $sStyleReadLab_deptid; ?>"><?php echo $this->form_format_readonly("deptid", $this->form_encode_input($deptid_look)); ?></span><span id="id_read_off_deptid" class="css_read_off_deptid" style="white-space: nowrap; <?php echo $sStyleReadInp_deptid; ?>">
 <span id="idAjaxSelect_deptid"><select class="sc-js-input scFormObjectOdd css_deptid_obj" style="" id="id_sc_field_deptid" name="deptid" size="1" alt="{type: 'select', enterTab: false}">
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_deptid'][] = ''; ?>
 <option value=""></option>
 <option  value="1" <?php  if ($this->deptid == "1") { echo " selected" ;} ?><?php  if (empty($this->deptid)) { echo " selected" ;} ?>>Laboratory</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_deptid'][] = '1'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_deptid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_deptid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['doctorid']))
   {
       $this->nm_new_label['doctorid'] = "Doctor";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $doctorid = $this->doctorid;
   $sStyleHidden_doctorid = '';
   if (isset($this->nmgp_cmp_hidden['doctorid']) && $this->nmgp_cmp_hidden['doctorid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['doctorid']);
       $sStyleHidden_doctorid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_doctorid = 'display: none;';
   $sStyleReadInp_doctorid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['doctorid']) && $this->nmgp_cmp_readonly['doctorid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['doctorid']);
       $sStyleReadLab_doctorid = '';
       $sStyleReadInp_doctorid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['doctorid']) && $this->nmgp_cmp_hidden['doctorid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="doctorid" value="<?php echo $this->form_encode_input($this->doctorid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_doctorid_line" id="hidden_field_data_doctorid" style="<?php echo $sStyleHidden_doctorid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_doctorid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_doctorid_label" style=""><span id="id_label_doctorid"><?php echo $this->nm_new_label['doctorid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["doctorid"]) &&  $this->nmgp_cmp_readonly["doctorid"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid'][] = $rs->fields[0];
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
   $doctorid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->doctorid_1))
          {
              foreach ($this->doctorid_1 as $tmp_doctorid)
              {
                  if (trim($tmp_doctorid) === trim($cadaselect[1])) { $doctorid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->doctorid) === trim($cadaselect[1])) { $doctorid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="doctorid" value="<?php echo $this->form_encode_input($doctorid) . "\">" . $doctorid_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_doctorid();
   $x = 0 ; 
   $doctorid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->doctorid_1))
          {
              foreach ($this->doctorid_1 as $tmp_doctorid)
              {
                  if (trim($tmp_doctorid) === trim($cadaselect[1])) { $doctorid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->doctorid) === trim($cadaselect[1])) { $doctorid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($doctorid_look))
          {
              $doctorid_look = $this->doctorid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_doctorid\" class=\"css_doctorid_line\" style=\"" .  $sStyleReadLab_doctorid . "\">" . $this->form_format_readonly("doctorid", $this->form_encode_input($doctorid_look)) . "</span><span id=\"id_read_off_doctorid\" class=\"css_read_off_doctorid\" style=\"white-space: nowrap; " . $sStyleReadInp_doctorid . "\">";
   echo " <span id=\"idAjaxSelect_doctorid\"><select class=\"sc-js-input scFormObjectOdd css_doctorid_obj\" style=\"\" id=\"id_sc_field_doctorid\" name=\"doctorid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_doctorid'][] = '-'; 
   echo "  <option value=\"-\">" . str_replace("<", "&lt;","-") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->doctorid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->doctorid)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_doctorid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_doctorid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['finishdate']))
    {
        $this->nm_new_label['finishdate'] = "Finish Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_finishdate = $this->finishdate;
   if (strlen($this->finishdate_hora) > 8 ) {$this->finishdate_hora = substr($this->finishdate_hora, 0, 8);}
   $this->finishdate .= ' ' . $this->finishdate_hora;
   $this->finishdate  = trim($this->finishdate);
   $finishdate = $this->finishdate;
   $sStyleHidden_finishdate = '';
   if (isset($this->nmgp_cmp_hidden['finishdate']) && $this->nmgp_cmp_hidden['finishdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['finishdate']);
       $sStyleHidden_finishdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_finishdate = 'display: none;';
   $sStyleReadInp_finishdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['finishdate']) && $this->nmgp_cmp_readonly['finishdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['finishdate']);
       $sStyleReadLab_finishdate = '';
       $sStyleReadInp_finishdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['finishdate']) && $this->nmgp_cmp_hidden['finishdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="finishdate" value="<?php echo $this->form_encode_input($finishdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_finishdate_line" id="hidden_field_data_finishdate" style="<?php echo $sStyleHidden_finishdate; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_finishdate_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_finishdate_label" style=""><span id="id_label_finishdate"><?php echo $this->nm_new_label['finishdate']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["finishdate"]) &&  $this->nmgp_cmp_readonly["finishdate"] == "on") { 

 ?>
<input type="hidden" name="finishdate" value="<?php echo $this->form_encode_input($finishdate) . "\">" . $finishdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_finishdate" class="sc-ui-readonly-finishdate css_finishdate_line" style="<?php echo $sStyleReadLab_finishdate; ?>"><?php echo $this->form_format_readonly("finishdate", $this->form_encode_input($finishdate)); ?></span><span id="id_read_off_finishdate" class="css_read_off_finishdate" style="white-space: nowrap;<?php echo $sStyleReadInp_finishdate; ?>"><?php
$tmp_form_data = $this->field_config['finishdate']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_finishdate_obj" style="" id="id_sc_field_finishdate" type=text name="finishdate" value="<?php echo $this->form_encode_input($finishdate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['finishdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['finishdate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['finishdate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_finishdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_finishdate_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->finishdate = $old_dt_finishdate;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['servicedate']))
    {
        $this->nm_new_label['servicedate'] = "Service Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_servicedate = $this->servicedate;
   if (strlen($this->servicedate_hora) > 8 ) {$this->servicedate_hora = substr($this->servicedate_hora, 0, 8);}
   $this->servicedate .= ' ' . $this->servicedate_hora;
   $this->servicedate  = trim($this->servicedate);
   $servicedate = $this->servicedate;
   $sStyleHidden_servicedate = '';
   if (isset($this->nmgp_cmp_hidden['servicedate']) && $this->nmgp_cmp_hidden['servicedate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['servicedate']);
       $sStyleHidden_servicedate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_servicedate = 'display: none;';
   $sStyleReadInp_servicedate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['servicedate']) && $this->nmgp_cmp_readonly['servicedate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['servicedate']);
       $sStyleReadLab_servicedate = '';
       $sStyleReadInp_servicedate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['servicedate']) && $this->nmgp_cmp_hidden['servicedate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="servicedate" value="<?php echo $this->form_encode_input($servicedate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_servicedate_line" id="hidden_field_data_servicedate" style="<?php echo $sStyleHidden_servicedate; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_servicedate_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_servicedate_label" style=""><span id="id_label_servicedate"><?php echo $this->nm_new_label['servicedate']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["servicedate"]) &&  $this->nmgp_cmp_readonly["servicedate"] == "on") { 

 ?>
<input type="hidden" name="servicedate" value="<?php echo $this->form_encode_input($servicedate) . "\">" . $servicedate . ""; ?>
<?php } else { ?>
<span id="id_read_on_servicedate" class="sc-ui-readonly-servicedate css_servicedate_line" style="<?php echo $sStyleReadLab_servicedate; ?>"><?php echo $this->form_format_readonly("servicedate", $this->form_encode_input($servicedate)); ?></span><span id="id_read_off_servicedate" class="css_read_off_servicedate" style="white-space: nowrap;<?php echo $sStyleReadInp_servicedate; ?>"><?php
$tmp_form_data = $this->field_config['servicedate']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_servicedate_obj" style="" id="id_sc_field_servicedate" type=text name="servicedate" value="<?php echo $this->form_encode_input($servicedate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['servicedate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['servicedate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['servicedate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_servicedate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_servicedate_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->servicedate = $old_dt_servicedate;
?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_servicedate_dumb = ('' == $sStyleHidden_servicedate) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_servicedate_dumb" style="<?php echo $sStyleHidden_servicedate_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Payment Info<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['paymentid']))
   {
       $this->nm_new_label['paymentid'] = "Payment";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $paymentid = $this->paymentid;
   $sStyleHidden_paymentid = '';
   if (isset($this->nmgp_cmp_hidden['paymentid']) && $this->nmgp_cmp_hidden['paymentid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['paymentid']);
       $sStyleHidden_paymentid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_paymentid = 'display: none;';
   $sStyleReadInp_paymentid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['paymentid']) && $this->nmgp_cmp_readonly['paymentid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['paymentid']);
       $sStyleReadLab_paymentid = '';
       $sStyleReadInp_paymentid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['paymentid']) && $this->nmgp_cmp_hidden['paymentid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="paymentid" value="<?php echo $this->form_encode_input($this->paymentid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_paymentid_line" id="hidden_field_data_paymentid" style="<?php echo $sStyleHidden_paymentid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_paymentid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_paymentid_label" style=""><span id="id_label_paymentid"><?php echo $this->nm_new_label['paymentid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["paymentid"]) &&  $this->nmgp_cmp_readonly["paymentid"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_paymentid'][] = $rs->fields[0];
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
   $paymentid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->paymentid_1))
          {
              foreach ($this->paymentid_1 as $tmp_paymentid)
              {
                  if (trim($tmp_paymentid) === trim($cadaselect[1])) { $paymentid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->paymentid) === trim($cadaselect[1])) { $paymentid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="paymentid" value="<?php echo $this->form_encode_input($paymentid) . "\">" . $paymentid_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_paymentid();
   $x = 0 ; 
   $paymentid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->paymentid_1))
          {
              foreach ($this->paymentid_1 as $tmp_paymentid)
              {
                  if (trim($tmp_paymentid) === trim($cadaselect[1])) { $paymentid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->paymentid) === trim($cadaselect[1])) { $paymentid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($paymentid_look))
          {
              $paymentid_look = $this->paymentid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_paymentid\" class=\"css_paymentid_line\" style=\"" .  $sStyleReadLab_paymentid . "\">" . $this->form_format_readonly("paymentid", $this->form_encode_input($paymentid_look)) . "</span><span id=\"id_read_off_paymentid\" class=\"css_read_off_paymentid\" style=\"white-space: nowrap; " . $sStyleReadInp_paymentid . "\">";
   echo " <span id=\"idAjaxSelect_paymentid\"><select class=\"sc-js-input scFormObjectOdd css_paymentid_obj\" style=\"\" id=\"id_sc_field_paymentid\" name=\"paymentid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->paymentid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->paymentid)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_paymentid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_paymentid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['institutionid']))
   {
       $this->nm_new_label['institutionid'] = "Institution";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $institutionid = $this->institutionid;
   $sStyleHidden_institutionid = '';
   if (isset($this->nmgp_cmp_hidden['institutionid']) && $this->nmgp_cmp_hidden['institutionid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['institutionid']);
       $sStyleHidden_institutionid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_institutionid = 'display: none;';
   $sStyleReadInp_institutionid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['institutionid']) && $this->nmgp_cmp_readonly['institutionid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['institutionid']);
       $sStyleReadLab_institutionid = '';
       $sStyleReadInp_institutionid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['institutionid']) && $this->nmgp_cmp_hidden['institutionid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="institutionid" value="<?php echo $this->form_encode_input($this->institutionid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_institutionid_line" id="hidden_field_data_institutionid" style="<?php echo $sStyleHidden_institutionid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_institutionid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_institutionid_label" style=""><span id="id_label_institutionid"><?php echo $this->nm_new_label['institutionid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["institutionid"]) &&  $this->nmgp_cmp_readonly["institutionid"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid'] = array(); 
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

   $nm_comando = "SELECT ID, name  FROM institution_settings where active = '1' ORDER BY ID";

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid'][] = $rs->fields[0];
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
   $institutionid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->institutionid_1))
          {
              foreach ($this->institutionid_1 as $tmp_institutionid)
              {
                  if (trim($tmp_institutionid) === trim($cadaselect[1])) { $institutionid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->institutionid) === trim($cadaselect[1])) { $institutionid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="institutionid" value="<?php echo $this->form_encode_input($institutionid) . "\">" . $institutionid_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_institutionid();
   $x = 0 ; 
   $institutionid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->institutionid_1))
          {
              foreach ($this->institutionid_1 as $tmp_institutionid)
              {
                  if (trim($tmp_institutionid) === trim($cadaselect[1])) { $institutionid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->institutionid) === trim($cadaselect[1])) { $institutionid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($institutionid_look))
          {
              $institutionid_look = $this->institutionid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_institutionid\" class=\"css_institutionid_line\" style=\"" .  $sStyleReadLab_institutionid . "\">" . $this->form_format_readonly("institutionid", $this->form_encode_input($institutionid_look)) . "</span><span id=\"id_read_off_institutionid\" class=\"css_read_off_institutionid\" style=\"white-space: nowrap; " . $sStyleReadInp_institutionid . "\">";
   echo " <span id=\"idAjaxSelect_institutionid\"><select class=\"sc-js-input scFormObjectOdd css_institutionid_obj\" style=\"\" id=\"id_sc_field_institutionid\" name=\"institutionid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_institutionid'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->institutionid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->institutionid)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_institutionid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_institutionid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['institutionno']))
    {
        $this->nm_new_label['institutionno'] = "Institution Num";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $institutionno = $this->institutionno;
   $sStyleHidden_institutionno = '';
   if (isset($this->nmgp_cmp_hidden['institutionno']) && $this->nmgp_cmp_hidden['institutionno'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['institutionno']);
       $sStyleHidden_institutionno = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_institutionno = 'display: none;';
   $sStyleReadInp_institutionno = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['institutionno']) && $this->nmgp_cmp_readonly['institutionno'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['institutionno']);
       $sStyleReadLab_institutionno = '';
       $sStyleReadInp_institutionno = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['institutionno']) && $this->nmgp_cmp_hidden['institutionno'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="institutionno" value="<?php echo $this->form_encode_input($institutionno) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_institutionno_line" id="hidden_field_data_institutionno" style="<?php echo $sStyleHidden_institutionno; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_institutionno_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_institutionno_label" style=""><span id="id_label_institutionno"><?php echo $this->nm_new_label['institutionno']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["institutionno"]) &&  $this->nmgp_cmp_readonly["institutionno"] == "on") { 

 ?>
<input type="hidden" name="institutionno" value="<?php echo $this->form_encode_input($institutionno) . "\">" . $institutionno . ""; ?>
<?php } else { ?>
<span id="id_read_on_institutionno" class="sc-ui-readonly-institutionno css_institutionno_line" style="<?php echo $sStyleReadLab_institutionno; ?>"><?php echo $this->form_format_readonly("institutionno", $this->form_encode_input($this->institutionno)); ?></span><span id="id_read_off_institutionno" class="css_read_off_institutionno" style="white-space: nowrap;<?php echo $sStyleReadInp_institutionno; ?>">
 <input class="sc-js-input scFormObjectOdd css_institutionno_obj" style="" id="id_sc_field_institutionno" type=text name="institutionno" value="<?php echo $this->form_encode_input($institutionno) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_institutionno_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_institutionno_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['statusid']))
   {
       $this->nm_new_label['statusid'] = "Status";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $statusid = $this->statusid;
   $sStyleHidden_statusid = '';
   if (isset($this->nmgp_cmp_hidden['statusid']) && $this->nmgp_cmp_hidden['statusid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['statusid']);
       $sStyleHidden_statusid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_statusid = 'display: none;';
   $sStyleReadInp_statusid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['statusid']) && $this->nmgp_cmp_readonly['statusid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['statusid']);
       $sStyleReadLab_statusid = '';
       $sStyleReadInp_statusid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['statusid']) && $this->nmgp_cmp_hidden['statusid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="statusid" value="<?php echo $this->form_encode_input($this->statusid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_statusid_line" id="hidden_field_data_statusid" style="<?php echo $sStyleHidden_statusid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_statusid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_statusid_label" style=""><span id="id_label_statusid"><?php echo $this->nm_new_label['statusid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["statusid"]) &&  $this->nmgp_cmp_readonly["statusid"] == "on") { 

$statusid_look = "";
 if ($this->statusid == "1") { $statusid_look .= "Register" ;} 
 if ($this->statusid == "2") { $statusid_look .= "Handled" ;} 
 if ($this->statusid == "3") { $statusid_look .= "Done" ;} 
 if ($this->statusid == "4") { $statusid_look .= "Completed" ;} 
 if ($this->statusid == "5") { $statusid_look .= "Cancel" ;} 
 if (empty($statusid_look)) { $statusid_look = $this->statusid; }
?>
<input type="hidden" name="statusid" value="<?php echo $this->form_encode_input($statusid) . "\">" . $statusid_look . ""; ?>
<?php } else { ?>
<?php

$statusid_look = "";
 if ($this->statusid == "1") { $statusid_look .= "Register" ;} 
 if ($this->statusid == "2") { $statusid_look .= "Handled" ;} 
 if ($this->statusid == "3") { $statusid_look .= "Done" ;} 
 if ($this->statusid == "4") { $statusid_look .= "Completed" ;} 
 if ($this->statusid == "5") { $statusid_look .= "Cancel" ;} 
 if (empty($statusid_look)) { $statusid_look = $this->statusid; }
?>
<span id="id_read_on_statusid" class="css_statusid_line"  style="<?php echo $sStyleReadLab_statusid; ?>"><?php echo $this->form_format_readonly("statusid", $this->form_encode_input($statusid_look)); ?></span><span id="id_read_off_statusid" class="css_read_off_statusid" style="white-space: nowrap; <?php echo $sStyleReadInp_statusid; ?>">
 <span id="idAjaxSelect_statusid"><select class="sc-js-input scFormObjectOdd css_statusid_obj" style="" id="id_sc_field_statusid" name="statusid" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->statusid == "1") { echo " selected" ;} ?><?php  if (empty($this->statusid)) { echo " selected" ;} ?>>Register</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_statusid'][] = '1'; ?>
 <option  value="2" <?php  if ($this->statusid == "2") { echo " selected" ;} ?>>Handled</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_statusid'][] = '2'; ?>
 <option  value="3" <?php  if ($this->statusid == "3") { echo " selected" ;} ?>>Done</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_statusid'][] = '3'; ?>
 <option  value="4" <?php  if ($this->statusid == "4") { echo " selected" ;} ?>>Completed</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_statusid'][] = '4'; ?>
 <option  value="5" <?php  if ($this->statusid == "5") { echo " selected" ;} ?>>Cancel</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_statusid'][] = '5'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_statusid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_statusid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['staffid']))
   {
       $this->nm_new_label['staffid'] = "Staff";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $staffid = $this->staffid;
   $sStyleHidden_staffid = '';
   if (isset($this->nmgp_cmp_hidden['staffid']) && $this->nmgp_cmp_hidden['staffid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['staffid']);
       $sStyleHidden_staffid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_staffid = 'display: none;';
   $sStyleReadInp_staffid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['staffid']) && $this->nmgp_cmp_readonly['staffid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['staffid']);
       $sStyleReadLab_staffid = '';
       $sStyleReadInp_staffid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['staffid']) && $this->nmgp_cmp_hidden['staffid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="staffid" value="<?php echo $this->form_encode_input($this->staffid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_staffid_line" id="hidden_field_data_staffid" style="<?php echo $sStyleHidden_staffid; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_staffid_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_staffid_label" style=""><span id="id_label_staffid"><?php echo $this->nm_new_label['staffid']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["staffid"]) &&  $this->nmgp_cmp_readonly["staffid"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid'][] = $rs->fields[0];
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
   $staffid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->staffid_1))
          {
              foreach ($this->staffid_1 as $tmp_staffid)
              {
                  if (trim($tmp_staffid) === trim($cadaselect[1])) { $staffid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->staffid) === trim($cadaselect[1])) { $staffid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="staffid" value="<?php echo $this->form_encode_input($staffid) . "\">" . $staffid_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_staffid();
   $x = 0 ; 
   $staffid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->staffid_1))
          {
              foreach ($this->staffid_1 as $tmp_staffid)
              {
                  if (trim($tmp_staffid) === trim($cadaselect[1])) { $staffid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->staffid) === trim($cadaselect[1])) { $staffid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($staffid_look))
          {
              $staffid_look = $this->staffid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_staffid\" class=\"css_staffid_line\" style=\"" .  $sStyleReadLab_staffid . "\">" . $this->form_format_readonly("staffid", $this->form_encode_input($staffid_look)) . "</span><span id=\"id_read_off_staffid\" class=\"css_read_off_staffid\" style=\"white-space: nowrap; " . $sStyleReadInp_staffid . "\">";
   echo " <span id=\"idAjaxSelect_staffid\"><select class=\"sc-js-input scFormObjectOdd css_staffid_obj\" style=\"\" id=\"id_sc_field_staffid\" name=\"staffid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['Lookup_staffid'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;","(AUTO)") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->staffid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->staffid)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_staffid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_staffid_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-20", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-21", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-22", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R")
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
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_his_outpatient_reg_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_his_outpatient_reg_mob");
 parent.scAjaxDetailHeight("form_his_outpatient_reg_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_his_outpatient_reg_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_his_outpatient_reg_mob", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['sc_modal'])
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-1").length && $("#sc_b_sai_t.sc-unique-btn-1").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-15").length && $("#sc_b_sai_t.sc-unique-btn-15").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-16").length && $("#sc_b_sai_t.sc-unique-btn-16").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-17").length && $("#sc_b_sai_t.sc-unique-btn-17").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-18").length && $("#sc_b_sai_t.sc-unique-btn-18").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-19").length && $("#sc_b_sai_t.sc-unique-btn-19").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-4").length && $("#sc_b_ini_b.sc-unique-btn-4").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_b.sc-unique-btn-20").length && $("#sc_b_ini_b.sc-unique-btn-20").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-5").length && $("#sc_b_ret_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_b.sc-unique-btn-21").length && $("#sc_b_ret_b.sc-unique-btn-21").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-6").length && $("#sc_b_avc_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_b.sc-unique-btn-22").length && $("#sc_b_avc_b.sc-unique-btn-22").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-7").length && $("#sc_b_fim_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_b.sc-unique-btn-23").length && $("#sc_b_fim_b.sc-unique-btn-23").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-8").length && $("#sc_b_new_t.sc-unique-btn-8").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-9").length && $("#sc_b_ins_t.sc-unique-btn-9").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-11").length && $("#sc_b_upd_t.sc-unique-btn-11").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-12").length && $("#sc_b_del_t.sc-unique-btn-12").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-13").length && $("#sys_separator.sc-unique-btn-13").is(":visible")) {
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-14").length && $("#sc_b_clone_t.sc-unique-btn-14").is(":visible")) {
			nm_move ('clone');
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_outpatient_reg_mob']['buttonStatus'] = $this->nmgp_botoes;
?>
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
</script>
</body> 
</html> 
