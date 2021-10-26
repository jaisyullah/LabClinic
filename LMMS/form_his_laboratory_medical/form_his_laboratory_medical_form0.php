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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " laboratory_medical"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " laboratory_medical"); } ?></TITLE>
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
.css_read_off_trandate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_birthdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_confirmdate button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_finishdate button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_his_laboratory_medical/form_his_laboratory_medical_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_his_laboratory_medical_sajax_js.php");
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
     if (F_name == "trandate")
     {
        $('input[name="trandate"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="trandate"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="trandate"]').removeClass("scFormInputDisabled");
        }
        $('input[id="calendar_trandate"]').prop("disabled", F_opc);
        if (F_opc) {
            $("#id_sc_field_trandate").datepicker("destroy");
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
     if (F_name == "patientid")
     {
        $('select[name="patientid"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('select[name="patientid"]').addClass("scFormInputDisabled");
        }
        else {
            $('select[name="patientid"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_his_laboratory_medical_jquery.php');

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

  addAutocomplete(this);

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
    if ("hidden_bloco_3" == block_id) {
      scAjaxDetailHeight("form_bill_laboratory_medical", "1000");
    }
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_bill_misc_laboratory_medical", "1000");
    }
    if ("hidden_bloco_5" == block_id) {
      scAjaxDetailHeight("grid_result_laboratory_medical", "800");
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-icdid", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "icdid" != sId ? sId.substr(5) : "";
   if ("" == $(this).val()) {
    $("#id_sc_field_" + sId).val("");
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).select2({
   minimumInputLength: 1,
   language: {
    inputTooShort: function() {
     return "<?php echo sprintf($this->Ini->Nm_lang['lang_autocomp_tooshort'], 1) ?>";
    },
    noResults: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
    },
    searching: function() {
     return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
    }
   },
   width: "300px",
   ajax: {
    url: "form_his_laboratory_medical.php",
    dataType: "json",
    processResults: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      return data;
    },
    data: function (params) {
     var query = {
      term: params.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_icdid",
      script_case_init: document.F2.script_case_init.value
     }
     return query;
    }
   }
  }).on("change", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("change");
  }).on("select2:open", function(e) {
   var sId = $(this).attr("id").substr(6), sRow = "icdid" != sId ? sId.substr(5) : "";
   sc_form_his_laboratory_medical_icdid_onfocus("id_sc_field_" + sId, sRow);
  }).on("select2:close", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).trigger("blur");
  }).on("select2:select", function(e) {
   var sId = $(this).attr("id").substr(6);
   $("#id_sc_field_" + sId).val(e.params.data.id);
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_his_laboratory_medical_js0.php");
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
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['insert_validation']; ?>">
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
$_SESSION['scriptcase']['error_span_title']['form_his_laboratory_medical'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_his_laboratory_medical'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['maximized']))
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['fast_search'][2] : "";
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
        $sCondStyle = ($this->nmgp_botoes['sc_btn_0'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "sc_btn_0", "scBtnFn_sc_btn_0()", "scBtnFn_sc_btn_0()", "sc_sc_btn_0_top", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="25%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><script type="text/javascript">
function sc_change_tabs(bTabDisp, sTabId, sTabParts)
{
  if (document.getElementById(sTabId)) {
    if (bTabDisp) {
      document.getElementById("div_" + sTabId).style.width = "";
      document.getElementById("div_" + sTabId).style.height = "";
      document.getElementById("div_" + sTabId).style.display = "";
      document.getElementById("div_" + sTabId).style.overflow = "visible";
      document.getElementById(sTabParts).className = "scTabActive";
      if ("hidden_bloco_3" == sTabId) {
        scAjaxDetailHeight("form_bill_laboratory_medical", "1000");
      }
      if ("hidden_bloco_4" == sTabId) {
        scAjaxDetailHeight("form_bill_misc_laboratory_medical", "1000");
      }
      if ("hidden_bloco_5" == sTabId) {
        scAjaxDetailHeight("grid_result_laboratory_medical", "800");
      }
    }
    else {
      document.getElementById("div_" + sTabId).style.width = "1px";
      document.getElementById("div_" + sTabId).style.height = "0px";
      document.getElementById("div_" + sTabId).style.display = "none";
      document.getElementById("div_" + sTabId).style.overflow = "scroll";
      document.getElementById(sTabParts).className = "scTabInactive";
    }
  }
}
</script>
   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf0\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Basic Info<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['regcode']))
    {
        $this->nm_new_label['regcode'] = "Reg Code";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $regcode = $this->regcode;
   $sStyleHidden_regcode = '';
   if (isset($this->nmgp_cmp_hidden['regcode']) && $this->nmgp_cmp_hidden['regcode'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['regcode']);
       $sStyleHidden_regcode = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_regcode = 'display: none;';
   $sStyleReadInp_regcode = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['regcode']) && $this->nmgp_cmp_readonly['regcode'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['regcode']);
       $sStyleReadLab_regcode = '';
       $sStyleReadInp_regcode = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['regcode']) && $this->nmgp_cmp_hidden['regcode'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="regcode" value="<?php echo $this->form_encode_input($regcode) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_regcode_label" id="hidden_field_label_regcode" style="<?php echo $sStyleHidden_regcode; ?>"><span id="id_label_regcode"><?php echo $this->nm_new_label['regcode']; ?></span></TD>
    <TD class="scFormDataOdd css_regcode_line" id="hidden_field_data_regcode" style="<?php echo $sStyleHidden_regcode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_regcode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["regcode"]) &&  $this->nmgp_cmp_readonly["regcode"] == "on") { 

 ?>
<input type="hidden" name="regcode" value="<?php echo $this->form_encode_input($regcode) . "\">" . $regcode . ""; ?>
<?php } else { ?>
<span id="id_read_on_regcode" class="sc-ui-readonly-regcode css_regcode_line" style="<?php echo $sStyleReadLab_regcode; ?>"><?php echo $this->form_format_readonly("regcode", $this->form_encode_input($this->regcode)); ?></span><span id="id_read_off_regcode" class="css_read_off_regcode" style="white-space: nowrap;<?php echo $sStyleReadInp_regcode; ?>">
 <input class="sc-js-input scFormObjectOdd css_regcode_obj" style="" id="id_sc_field_regcode" type=text name="regcode" value="<?php echo $this->form_encode_input($regcode) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php
   $Sc_iframe_master = ($this->Embutida_call) ? 'nmgp_iframe_ret*scinnmsc_iframe_liga_form_his_laboratory_medical*scout' : '';
   if (isset($this->Ini->sc_lig_md5["select_outpatient_reg"]) && $this->Ini->sc_lig_md5["select_outpatient_reg"] == "S") {
       $Parms_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,regcode,trancode*scoutnm_evt_ret_busca*scinsc_form_his_laboratory_medical_regcode_onchange(this)*scout" . $Sc_iframe_master;
       $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_his_laboratory_medical@SC_par@" . md5($Parms_Lig);
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
   } else {
       $Md5_Lig  = "nmgp_url_saida*scin*scoutnmgp_parms_ret*scinF1,regcode,trancode*scoutnm_evt_ret_busca*scinsc_form_his_laboratory_medical_regcode_onchange(this)*scout" . $Sc_iframe_master;
   }
?>

<?php if (!$this->Ini->Export_img_zip) { ?><?php echo nmButtonOutput($this->arr_buttons, "bform_captura", "nm_submit_cap('" . $this->Ini->link_select_outpatient_reg_cons_psq. "', '" . $Md5_Lig . "')", "nm_submit_cap('" . $this->Ini->link_select_outpatient_reg_cons_psq. "', '" . $Md5_Lig . "')", "cap_regcode", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
<?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_regcode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_regcode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_trancode_label" id="hidden_field_label_trancode" style="<?php echo $sStyleHidden_trancode; ?>"><span id="id_label_trancode"><?php echo $this->nm_new_label['trancode']; ?></span></TD>
    <TD class="scFormDataOdd css_trancode_line" id="hidden_field_data_trancode" style="<?php echo $sStyleHidden_trancode; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trancode_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trancode"]) &&  $this->nmgp_cmp_readonly["trancode"] == "on") { 

 ?>
<input type="hidden" name="trancode" value="<?php echo $this->form_encode_input($trancode) . "\">" . $trancode . ""; ?>
<?php } else { ?>
<span id="id_read_on_trancode" class="sc-ui-readonly-trancode css_trancode_line" style="<?php echo $sStyleReadLab_trancode; ?>"><?php echo $this->form_format_readonly("trancode", $this->form_encode_input($this->trancode)); ?></span><span id="id_read_off_trancode" class="css_read_off_trancode" style="white-space: nowrap;<?php echo $sStyleReadInp_trancode; ?>">
 <input class="sc-js-input scFormObjectOdd css_trancode_obj" style="" id="id_sc_field_trancode" type=text name="trancode" value="<?php echo $this->form_encode_input($trancode) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(BY SYSTEM)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['trandate']))
    {
        $this->nm_new_label['trandate'] = "Transaction Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_trandate = $this->trandate;
   if (strlen($this->trandate_hora) > 8 ) {$this->trandate_hora = substr($this->trandate_hora, 0, 8);}
   $this->trandate .= ' ' . $this->trandate_hora;
   $this->trandate  = trim($this->trandate);
   $trandate = $this->trandate;
   $sStyleHidden_trandate = '';
   if (isset($this->nmgp_cmp_hidden['trandate']) && $this->nmgp_cmp_hidden['trandate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['trandate']);
       $sStyleHidden_trandate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_trandate = 'display: none;';
   $sStyleReadInp_trandate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['trandate']) && $this->nmgp_cmp_readonly['trandate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['trandate']);
       $sStyleReadLab_trandate = '';
       $sStyleReadInp_trandate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['trandate']) && $this->nmgp_cmp_hidden['trandate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trandate" value="<?php echo $this->form_encode_input($trandate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_trandate_label" id="hidden_field_label_trandate" style="<?php echo $sStyleHidden_trandate; ?>"><span id="id_label_trandate"><?php echo $this->nm_new_label['trandate']; ?></span></TD>
    <TD class="scFormDataOdd css_trandate_line" id="hidden_field_data_trandate" style="<?php echo $sStyleHidden_trandate; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_trandate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trandate"]) &&  $this->nmgp_cmp_readonly["trandate"] == "on") { 

 ?>
<input type="hidden" name="trandate" value="<?php echo $this->form_encode_input($trandate) . "\">" . $trandate . ""; ?>
<?php } else { ?>
<span id="id_read_on_trandate" class="sc-ui-readonly-trandate css_trandate_line" style="<?php echo $sStyleReadLab_trandate; ?>"><?php echo $this->form_format_readonly("trandate", $this->form_encode_input($trandate)); ?></span><span id="id_read_off_trandate" class="css_read_off_trandate" style="white-space: nowrap;<?php echo $sStyleReadInp_trandate; ?>"><?php
$tmp_form_data = $this->field_config['trandate']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_trandate_obj" style="" id="id_sc_field_trandate" type=text name="trandate" value="<?php echo $this->form_encode_input($trandate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['trandate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['trandate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['trandate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '(BY SYSTEM)', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trandate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trandate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->trandate = $old_dt_trandate;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_staffid_label" id="hidden_field_label_staffid" style="<?php echo $sStyleHidden_staffid; ?>"><span id="id_label_staffid"><?php echo $this->nm_new_label['staffid']; ?></span></TD>
    <TD class="scFormDataOdd css_staffid_line" id="hidden_field_data_staffid" style="<?php echo $sStyleHidden_staffid; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_staffid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["staffid"]) &&  $this->nmgp_cmp_readonly["staffid"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid'] = array(); 
    }

   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_birthdate = $this->birthdate;
   $old_value_confirmdate = $this->confirmdate;
   $old_value_confirmdate_hora = $this->confirmdate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_confirmdate = $this->confirmdate;
   $unformatted_value_confirmdate_hora = $this->confirmdate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT ID, name  FROM staff_settings  ORDER BY name";

   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->birthdate = $old_value_birthdate;
   $this->confirmdate = $old_value_confirmdate;
   $this->confirmdate_hora = $old_value_confirmdate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid'][] = $rs->fields[0];
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_staffid'][] = ''; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_staffid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_staffid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="35%" height="">
   <a name="bloco_1"></a>
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf1\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Patient Info<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['patientid']))
   {
       $this->nm_new_label['patientid'] = "Patient";
   }
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
<?php if (isset($this->nmgp_cmp_hidden['patientid']) && $this->nmgp_cmp_hidden['patientid'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="patientid" value="<?php echo $this->form_encode_input($this->patientid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_patientid_label" id="hidden_field_label_patientid" style="<?php echo $sStyleHidden_patientid; ?>"><span id="id_label_patientid"><?php echo $this->nm_new_label['patientid']; ?></span></TD>
    <TD class="scFormDataOdd css_patientid_line" id="hidden_field_data_patientid" style="<?php echo $sStyleHidden_patientid; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_patientid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["patientid"]) &&  $this->nmgp_cmp_readonly["patientid"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid'] = array(); 
    }

   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_birthdate = $this->birthdate;
   $old_value_confirmdate = $this->confirmdate;
   $old_value_confirmdate_hora = $this->confirmdate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_confirmdate = $this->confirmdate;
   $unformatted_value_confirmdate_hora = $this->confirmdate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   $nm_comando = "SELECT patientCode, name  FROM patient_settings  ORDER BY name";

   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->birthdate = $old_value_birthdate;
   $this->confirmdate = $old_value_confirmdate;
   $this->confirmdate_hora = $old_value_confirmdate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid'][] = $rs->fields[0];
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
   $patientid_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->patientid_1))
          {
              foreach ($this->patientid_1 as $tmp_patientid)
              {
                  if (trim($tmp_patientid) === trim($cadaselect[1])) { $patientid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->patientid) === trim($cadaselect[1])) { $patientid_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="patientid" value="<?php echo $this->form_encode_input($patientid) . "\">" . $patientid_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_patientid();
   $x = 0 ; 
   $patientid_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->patientid_1))
          {
              foreach ($this->patientid_1 as $tmp_patientid)
              {
                  if (trim($tmp_patientid) === trim($cadaselect[1])) { $patientid_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->patientid) === trim($cadaselect[1])) { $patientid_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($patientid_look))
          {
              $patientid_look = $this->patientid;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_patientid\" class=\"css_patientid_line\" style=\"" .  $sStyleReadLab_patientid . "\">" . $this->form_format_readonly("patientid", $this->form_encode_input($patientid_look)) . "</span><span id=\"id_read_off_patientid\" class=\"css_read_off_patientid\" style=\"white-space: nowrap; " . $sStyleReadInp_patientid . "\">";
   echo " <span id=\"idAjaxSelect_patientid\"><select class=\"sc-js-input scFormObjectOdd css_patientid_obj\" style=\"\" id=\"id_sc_field_patientid\" name=\"patientid\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_patientid'][] = ''; 
   echo "  <option value=\"\">" . str_replace("<", "&lt;"," ") . "</option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->patientid) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->patientid)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_patientid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_patientid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['birthdate']))
    {
        $this->nm_new_label['birthdate'] = "Birth Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $birthdate = $this->birthdate;
   $sStyleHidden_birthdate = '';
   if (isset($this->nmgp_cmp_hidden['birthdate']) && $this->nmgp_cmp_hidden['birthdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['birthdate']);
       $sStyleHidden_birthdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_birthdate = 'display: none;';
   $sStyleReadInp_birthdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['birthdate']) && $this->nmgp_cmp_readonly['birthdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['birthdate']);
       $sStyleReadLab_birthdate = '';
       $sStyleReadInp_birthdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['birthdate']) && $this->nmgp_cmp_hidden['birthdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="birthdate" value="<?php echo $this->form_encode_input($birthdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_birthdate_label" id="hidden_field_label_birthdate" style="<?php echo $sStyleHidden_birthdate; ?>"><span id="id_label_birthdate"><?php echo $this->nm_new_label['birthdate']; ?></span></TD>
    <TD class="scFormDataOdd css_birthdate_line" id="hidden_field_data_birthdate" style="<?php echo $sStyleHidden_birthdate; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_birthdate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["birthdate"]) &&  $this->nmgp_cmp_readonly["birthdate"] == "on") { 

 ?>
<input type="hidden" name="birthdate" value="<?php echo $this->form_encode_input($birthdate) . "\">" . $birthdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_birthdate" class="sc-ui-readonly-birthdate css_birthdate_line" style="<?php echo $sStyleReadLab_birthdate; ?>"><?php echo $this->form_format_readonly("birthdate", $this->form_encode_input($birthdate)); ?></span><span id="id_read_off_birthdate" class="css_read_off_birthdate" style="white-space: nowrap;<?php echo $sStyleReadInp_birthdate; ?>"><?php
$tmp_form_data = $this->field_config['birthdate']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_birthdate_obj" style="" id="id_sc_field_birthdate" type=text name="birthdate" value="<?php echo $this->form_encode_input($birthdate) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['birthdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['birthdate']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_birthdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_birthdate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   <td width="40%" height="">
   <a name="bloco_2"></a>
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;">   <tr>


    <TD colspan="2" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont"><?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "<table style=\"border-collapse: collapse; height: 100%; width: 100%\"><tr><td style=\"vertical-align: middle; border-width: 0px; padding: 0px 2px 0px 0px\"><img id=\"SC_blk_pdf2\" src=\"" . $this->Ini->path_icones . "/" . $this->Ini->Block_img_col . "\" style=\"border: 0px; float: left\" class=\"sc-ui-block-control\"></td><td style=\"border-width: 0px; padding: 0px; width: 100%;\" class=\"scFormBlockAlign\">"; } ?>Medical Info<?php if ('' != $this->Ini->Block_img_exp && '' != $this->Ini->Block_img_col && !$this->Ini->Export_img_zip) { echo "</td></tr></table>"; } ?></TD>
       
      </TR>
     </TABLE>
    </TD>
   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['icdid']))
    {
        $this->nm_new_label['icdid'] = "ICD-10";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $icdid = $this->icdid;
   $sStyleHidden_icdid = '';
   if (isset($this->nmgp_cmp_hidden['icdid']) && $this->nmgp_cmp_hidden['icdid'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['icdid']);
       $sStyleHidden_icdid = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_icdid = 'display: none;';
   $sStyleReadInp_icdid = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['icdid']) && $this->nmgp_cmp_readonly['icdid'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['icdid']);
       $sStyleReadLab_icdid = '';
       $sStyleReadInp_icdid = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['icdid']) && $this->nmgp_cmp_hidden['icdid'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="icdid" value="<?php echo $this->form_encode_input($icdid) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_icdid_label" id="hidden_field_label_icdid" style="<?php echo $sStyleHidden_icdid; ?>"><span id="id_label_icdid"><?php echo $this->nm_new_label['icdid']; ?></span></TD>
    <TD class="scFormDataOdd css_icdid_line" id="hidden_field_data_icdid" style="<?php echo $sStyleHidden_icdid; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_icdid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["icdid"]) &&  $this->nmgp_cmp_readonly["icdid"] == "on") { 

 ?>
<input type="hidden" name="icdid" value="<?php echo $this->form_encode_input($icdid) . "\">" . $icdid . ""; ?>
<?php } else { ?>

<?php
$aRecData['icdid'] = $this->icdid;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid'] = array(); 
    }

   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_birthdate = $this->birthdate;
   $old_value_confirmdate = $this->confirmdate;
   $old_value_confirmdate_hora = $this->confirmdate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_confirmdate = $this->confirmdate;
   $unformatted_value_confirmdate_hora = $this->confirmdate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT icd, icd + ' - ' + descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT icd, concat(icd,' - ',descEng) FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT icd, icd&' - '&descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT icd, icd||' - '||descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT icd, icd + ' - ' + descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT icd, icd||' - '||descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   else
   {
       $nm_comando = "SELECT icd, icd||' - '||descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }

   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->birthdate = $old_value_birthdate;
   $this->confirmdate = $old_value_confirmdate;
   $this->confirmdate_hora = $old_value_confirmdate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->icdid])) ? $aLookup[0][$this->icdid] : $this->icdid;
$icdid_look = (isset($aLookup[0][$this->icdid])) ? $aLookup[0][$this->icdid] : $this->icdid;
?>
<span id="id_read_on_icdid" class="sc-ui-readonly-icdid css_icdid_line" style="<?php echo $sStyleReadLab_icdid; ?>"><?php echo $this->form_format_readonly("icdid", str_replace("<", "&lt;", $icdid_look)); ?></span><span id="id_read_off_icdid" class="css_read_off_icdid" style="white-space: nowrap;<?php echo $sStyleReadInp_icdid; ?>">
 <input class="sc-js-input scFormObjectOdd css_icdid_obj" style="display: none;" id="id_sc_field_icdid" type=text name="icdid" value="<?php echo $this->form_encode_input($icdid) ?>"
 size=15 maxlength=15 style="display: none" alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: 'upper', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['icdid'] = $this->icdid;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid'] = array(); 
    }

   $old_value_trandate = $this->trandate;
   $old_value_trandate_hora = $this->trandate_hora;
   $old_value_birthdate = $this->birthdate;
   $old_value_confirmdate = $this->confirmdate;
   $old_value_confirmdate_hora = $this->confirmdate_hora;
   $old_value_finishdate = $this->finishdate;
   $old_value_finishdate_hora = $this->finishdate_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_trandate = $this->trandate;
   $unformatted_value_trandate_hora = $this->trandate_hora;
   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_confirmdate = $this->confirmdate;
   $unformatted_value_confirmdate_hora = $this->confirmdate_hora;
   $unformatted_value_finishdate = $this->finishdate;
   $unformatted_value_finishdate_hora = $this->finishdate_hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT icd, icd + ' - ' + descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT icd, concat(icd,' - ',descEng) FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT icd, icd&' - '&descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT icd, icd||' - '||descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT icd, icd + ' - ' + descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT icd, icd||' - '||descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }
   else
   {
       $nm_comando = "SELECT icd, icd||' - '||descEng FROM icd10_settings WHERE icd = '" . substr($this->Db->qstr($this->icdid), 1, -1) . "' ORDER BY descEng";
   }

   $this->trandate = $old_value_trandate;
   $this->trandate_hora = $old_value_trandate_hora;
   $this->birthdate = $old_value_birthdate;
   $this->confirmdate = $old_value_confirmdate;
   $this->confirmdate_hora = $old_value_confirmdate_hora;
   $this->finishdate = $old_value_finishdate;
   $this->finishdate_hora = $old_value_finishdate_hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_icdid'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->icdid])) ? $aLookup[0][$this->icdid] : '';
$icdid_look = (isset($aLookup[0][$this->icdid])) ? $aLookup[0][$this->icdid] : '';
?>
<select id="id_ac_icdid" class="scFormObjectOdd sc-ui-autocomp-icdid css_icdid_obj"><?php if ('' != $this->icdid) { ?><option value="<?php echo $this->icdid ?>" selected><?php echo $sAutocompValue ?></option><?php } ?></select></span><?php } ?>
<span class="scFormPopupBubble" style="display: inline-block"><span class="scFormPopupTrigger"><?php echo nmButtonOutput($this->arr_buttons, "bfieldhelp", "return false;", "return false;", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</span><table class="scFormPopup"><tbody><?php
if (isset($_SESSION['scriptcase']['reg_conf']['html_dir']) && $_SESSION['scriptcase']['reg_conf']['html_dir'] == " DIR='RTL'") {
?>
<tr><td class="scFormPopupTopRight scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopLeft scFormPopupCorner"></td></tr><tr><td class="scFormPopupRight"></td><td class="scFormPopupContent">Use UPPERCASE</td><td class="scFormPopupLeft"></td></tr><tr><td class="scFormPopupBottomRight scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomLeft scFormPopupCorner"></td></tr><?php
} else {
?>
<tr><td class="scFormPopupTopLeft scFormPopupCorner"></td><td class="scFormPopupTop"></td><td class="scFormPopupTopRight scFormPopupCorner"></td></tr><tr><td class="scFormPopupLeft"></td><td class="scFormPopupContent">Use UPPERCASE</td><td class="scFormPopupRight"></td></tr><tr><td class="scFormPopupBottomLeft scFormPopupCorner"></td><td class="scFormPopupBottom"><img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Bubble_tail; ?>" /></td><td class="scFormPopupBottomRight scFormPopupCorner"></td></tr><?php
}
?>
</tbody></table></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_icdid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_icdid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['notes']))
    {
        $this->nm_new_label['notes'] = "Notes";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $notes = $this->notes;
   $sStyleHidden_notes = '';
   if (isset($this->nmgp_cmp_hidden['notes']) && $this->nmgp_cmp_hidden['notes'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['notes']);
       $sStyleHidden_notes = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_notes = 'display: none;';
   $sStyleReadInp_notes = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['notes']) && $this->nmgp_cmp_readonly['notes'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['notes']);
       $sStyleReadLab_notes = '';
       $sStyleReadInp_notes = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['notes']) && $this->nmgp_cmp_hidden['notes'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="notes" value="<?php echo $this->form_encode_input($notes) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_notes_label" id="hidden_field_label_notes" style="<?php echo $sStyleHidden_notes; ?>"><span id="id_label_notes"><?php echo $this->nm_new_label['notes']; ?></span></TD>
    <TD class="scFormDataOdd css_notes_line" id="hidden_field_data_notes" style="<?php echo $sStyleHidden_notes; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_notes_line" style="vertical-align: top;padding: 0px">
<?php
$notes_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($notes));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["notes"]) &&  $this->nmgp_cmp_readonly["notes"] == "on") { 

 ?>
<input type="hidden" name="notes" value="<?php echo $this->form_encode_input($notes) . "\">" . $notes_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_notes" class="sc-ui-readonly-notes css_notes_line" style="<?php echo $sStyleReadLab_notes; ?>"><?php echo $this->form_format_readonly("notes", $this->form_encode_input($notes_val)); ?></span><span id="id_read_off_notes" class="css_read_off_notes" style="white-space: nowrap;<?php echo $sStyleReadInp_notes; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_notes_obj" style="white-space: pre-wrap;" name="notes" id="id_sc_field_notes" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $notes; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_notes_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_notes_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_statusid_label" id="hidden_field_label_statusid" style="<?php echo $sStyleHidden_statusid; ?>"><span id="id_label_statusid"><?php echo $this->nm_new_label['statusid']; ?></span></TD>
    <TD class="scFormDataOdd css_statusid_line" id="hidden_field_data_statusid" style="<?php echo $sStyleHidden_statusid; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_statusid_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["statusid"]) &&  $this->nmgp_cmp_readonly["statusid"] == "on") { 

$statusid_look = "";
 if ($this->statusid == "1") { $statusid_look .= "Process" ;} 
 if ($this->statusid == "3") { $statusid_look .= "Confirmed" ;} 
 if ($this->statusid == "2") { $statusid_look .= "Finished" ;} 
 if ($this->statusid == "0") { $statusid_look .= "Cancel" ;} 
 if (empty($statusid_look)) { $statusid_look = $this->statusid; }
?>
<input type="hidden" name="statusid" value="<?php echo $this->form_encode_input($statusid) . "\">" . $statusid_look . ""; ?>
<?php } else { ?>
<?php

$statusid_look = "";
 if ($this->statusid == "1") { $statusid_look .= "Process" ;} 
 if ($this->statusid == "3") { $statusid_look .= "Confirmed" ;} 
 if ($this->statusid == "2") { $statusid_look .= "Finished" ;} 
 if ($this->statusid == "0") { $statusid_look .= "Cancel" ;} 
 if (empty($statusid_look)) { $statusid_look = $this->statusid; }
?>
<span id="id_read_on_statusid" class="css_statusid_line"  style="<?php echo $sStyleReadLab_statusid; ?>"><?php echo $this->form_format_readonly("statusid", $this->form_encode_input($statusid_look)); ?></span><span id="id_read_off_statusid" class="css_read_off_statusid" style="white-space: nowrap; <?php echo $sStyleReadInp_statusid; ?>">
 <span id="idAjaxSelect_statusid"><select class="sc-js-input scFormObjectOdd css_statusid_obj" style="" id="id_sc_field_statusid" name="statusid" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->statusid == "1") { echo " selected" ;} ?><?php  if (empty($this->statusid)) { echo " selected" ;} ?>>Process</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_statusid'][] = '1'; ?>
 <option  value="3" <?php  if ($this->statusid == "3") { echo " selected" ;} ?>>Confirmed</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_statusid'][] = '3'; ?>
 <option  value="2" <?php  if ($this->statusid == "2") { echo " selected" ;} ?>>Finished</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_statusid'][] = '2'; ?>
 <option  value="0" <?php  if ($this->statusid == "0") { echo " selected" ;} ?>>Cancel</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lookup_statusid'][] = '0'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_statusid_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_statusid_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['confirmdate']))
    {
        $this->nm_new_label['confirmdate'] = "Confirm Date";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_confirmdate = $this->confirmdate;
   if (strlen($this->confirmdate_hora) > 8 ) {$this->confirmdate_hora = substr($this->confirmdate_hora, 0, 8);}
   $this->confirmdate .= ' ' . $this->confirmdate_hora;
   $this->confirmdate  = trim($this->confirmdate);
   $confirmdate = $this->confirmdate;
   $sStyleHidden_confirmdate = '';
   if (isset($this->nmgp_cmp_hidden['confirmdate']) && $this->nmgp_cmp_hidden['confirmdate'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['confirmdate']);
       $sStyleHidden_confirmdate = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_confirmdate = 'display: none;';
   $sStyleReadInp_confirmdate = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['confirmdate']) && $this->nmgp_cmp_readonly['confirmdate'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['confirmdate']);
       $sStyleReadLab_confirmdate = '';
       $sStyleReadInp_confirmdate = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['confirmdate']) && $this->nmgp_cmp_hidden['confirmdate'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="confirmdate" value="<?php echo $this->form_encode_input($confirmdate) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_confirmdate_label" id="hidden_field_label_confirmdate" style="<?php echo $sStyleHidden_confirmdate; ?>"><span id="id_label_confirmdate"><?php echo $this->nm_new_label['confirmdate']; ?></span></TD>
    <TD class="scFormDataOdd css_confirmdate_line" id="hidden_field_data_confirmdate" style="<?php echo $sStyleHidden_confirmdate; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_confirmdate_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["confirmdate"]) &&  $this->nmgp_cmp_readonly["confirmdate"] == "on") { 

 ?>
<input type="hidden" name="confirmdate" value="<?php echo $this->form_encode_input($confirmdate) . "\">" . $confirmdate . ""; ?>
<?php } else { ?>
<span id="id_read_on_confirmdate" class="sc-ui-readonly-confirmdate css_confirmdate_line" style="<?php echo $sStyleReadLab_confirmdate; ?>"><?php echo $this->form_format_readonly("confirmdate", $this->form_encode_input($confirmdate)); ?></span><span id="id_read_off_confirmdate" class="css_read_off_confirmdate" style="white-space: nowrap;<?php echo $sStyleReadInp_confirmdate; ?>"><?php
$tmp_form_data = $this->field_config['confirmdate']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_confirmdate_obj" style="" id="id_sc_field_confirmdate" type=text name="confirmdate" value="<?php echo $this->form_encode_input($confirmdate) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['confirmdate']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['confirmdate']['date_format']; ?>', timeSep: '<?php echo $this->field_config['confirmdate']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_confirmdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_confirmdate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->confirmdate = $old_dt_confirmdate;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
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

    <TD class="scFormLabelOdd scUiLabelWidthFix css_finishdate_label" id="hidden_field_label_finishdate" style="<?php echo $sStyleHidden_finishdate; ?>"><span id="id_label_finishdate"><?php echo $this->nm_new_label['finishdate']; ?></span></TD>
    <TD class="scFormDataOdd css_finishdate_line" id="hidden_field_data_finishdate" style="<?php echo $sStyleHidden_finishdate; ?>vertical-align: top;"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_finishdate_line" style="vertical-align: top;padding: 0px">
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_finishdate_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_finishdate_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->finishdate = $old_dt_finishdate;
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
   <a name="bloco_3"></a>
<script type="text/javascript">
function sc_control_tabs_3(iTabIndex)
{
  sc_change_tabs(iTabIndex == 3, 'hidden_bloco_3', 'id_tabs_3_3');
  if (iTabIndex == 3) {
    displayChange_block("3", "on");
  }
  sc_change_tabs(iTabIndex == 4, 'hidden_bloco_4', 'id_tabs_3_4');
  if (iTabIndex == 4) {
    displayChange_block("4", "on");
  }
  sc_change_tabs(iTabIndex == 5, 'hidden_bloco_5', 'id_tabs_3_5');
  if (iTabIndex == 5) {
    displayChange_block("5", "on");
  }
}
</script>
<ul class="scTabLine">
<li id="id_tabs_3_3" class="scTabActive"><a href="javascript: sc_control_tabs_3(3)">Detail</a></li>
<li id="id_tabs_3_4" class="scTabInactive"><a href="javascript: sc_control_tabs_3(4)">Additional</a></li>
<li id="id_tabs_3_5" class="scTabInactive"><a href="javascript: sc_control_tabs_3(5)">Result</a></li>
</ul>
<div style='clear:both'></div>
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['detail']))
    {
        $this->nm_new_label['detail'] = "Detail";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $detail = $this->detail;
   $sStyleHidden_detail = '';
   if (isset($this->nmgp_cmp_hidden['detail']) && $this->nmgp_cmp_hidden['detail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['detail']);
       $sStyleHidden_detail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_detail = 'display: none;';
   $sStyleReadInp_detail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['detail']) && $this->nmgp_cmp_readonly['detail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['detail']);
       $sStyleReadLab_detail = '';
       $sStyleReadInp_detail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['detail']) && $this->nmgp_cmp_hidden['detail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="detail" value="<?php echo $this->form_encode_input($detail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_detail_line" id="hidden_field_data_detail" style="<?php echo $sStyleHidden_detail; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_detail_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Detail'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Detail'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Detail'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['embutida_parms'] = "tranc*scin" . $this->nmgp_dados_form['trancode'] . "*scoutregc*scin" . $this->nmgp_dados_form['regcode'] . "*scoutNM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_his_laboratory_medical']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init'] ]['form_bill_laboratory_medical']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_his_laboratory_medical_empty.htm' : $this->Ini->link_form_bill_laboratory_medical_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=1000';
if (isset($this->Ini->sc_lig_target['C_@scinf_Detail']) && 'nmsc_iframe_liga_form_bill_laboratory_medical' != $this->Ini->sc_lig_target['C_@scinf_Detail'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Detail'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_laboratory_medical_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Detail'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_bill_laboratory_medical"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="1000" width="100%" name="nmsc_iframe_liga_form_bill_laboratory_medical"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_detail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_detail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_4"></a>
<div id="div_hidden_bloco_4" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['sc_field_0']))
    {
        $this->nm_new_label['sc_field_0'] = "Additional Service";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $sc_field_0 = $this->sc_field_0;
   $sStyleHidden_sc_field_0 = '';
   if (isset($this->nmgp_cmp_hidden['sc_field_0']) && $this->nmgp_cmp_hidden['sc_field_0'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['sc_field_0']);
       $sStyleHidden_sc_field_0 = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_sc_field_0 = 'display: none;';
   $sStyleReadInp_sc_field_0 = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['sc_field_0']) && $this->nmgp_cmp_readonly['sc_field_0'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['sc_field_0']);
       $sStyleReadLab_sc_field_0 = '';
       $sStyleReadInp_sc_field_0 = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['sc_field_0']) && $this->nmgp_cmp_hidden['sc_field_0'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_0" value="<?php echo $this->form_encode_input($sc_field_0) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_sc_field_0_line" id="hidden_field_data_sc_field_0" style="<?php echo $sStyleHidden_sc_field_0; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_sc_field_0_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_proc']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_form']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_call']  = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_multi'] = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_form_insert'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_form_update'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_form_delete'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_form_btn_nav'] = 'off';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_grid_edit'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_grid_edit_link'] = 'on';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_qtd_reg'] = '10';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_liga_tp_pag'] = 'parcial';
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['embutida_parms'] = "tranc*scin" . $this->nmgp_dados_form['trancode'] . "*scoutregc*scin" . $this->nmgp_dados_form['regcode'] . "*scoutNM_btn_insert*scinN*scoutNM_btn_update*scinN*scoutNM_btn_delete*scinN*scoutNM_btn_navega*scinN*scout";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['foreign_key']['trancode'] = $this->nmgp_dados_form['trancode'];
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['where_filter'] = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['where_detal']  = "tranCode = '" . $this->nmgp_dados_form['trancode'] . "'";
 if ($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_his_laboratory_medical']['total'] < 0)
 {
     $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init'] ]['form_bill_misc_laboratory_medical']['where_filter'] = "1 <> 1";
 }
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_his_laboratory_medical_empty.htm' : $this->Ini->link_form_bill_misc_laboratory_medical_edit . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=1000';
if (isset($this->Ini->sc_lig_target['C_@scinf_sc_field_0']) && 'nmsc_iframe_liga_form_bill_misc_laboratory_medical' != $this->Ini->sc_lig_target['C_@scinf_sc_field_0'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['form_bill_misc_laboratory_medical_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_sc_field_0'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_form_bill_misc_laboratory_medical"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="1000" width="100%" name="nmsc_iframe_liga_form_bill_misc_laboratory_medical"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   <a name="bloco_5"></a>
<div id="div_hidden_bloco_5" style="display: none; width: 1px; height: 0px; overflow: scroll"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_5" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['result']))
    {
        $this->nm_new_label['result'] = "Result";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $result = $this->result;
   $sStyleHidden_result = '';
   if (isset($this->nmgp_cmp_hidden['result']) && $this->nmgp_cmp_hidden['result'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['result']);
       $sStyleHidden_result = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_result = 'display: none;';
   $sStyleReadInp_result = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['result']) && $this->nmgp_cmp_readonly['result'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['result']);
       $sStyleReadLab_result = '';
       $sStyleReadInp_result = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['result']) && $this->nmgp_cmp_hidden['result'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="result" value="<?php echo $this->form_encode_input($result) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_result_line" id="hidden_field_data_result" style="<?php echo $sStyleHidden_result; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td width="100%" class="scFormDataFontOdd css_result_line" style="vertical-align: top;padding: 0px">
<?php
 if (isset($_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Result'] ]) && '' != $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Result'] ]) {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['grid_result_laboratory_medical_script_case_init'] = $_SESSION['scriptcase']['dashboard_scinit'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] ][ $this->Ini->sc_lig_target['C_@scinf_Result'] ];
 }
 else {
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['grid_result_laboratory_medical_script_case_init'] = $this->Ini->sc_page;
 }
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['grid_result_laboratory_medical_script_case_init'] ]['grid_result_laboratory_medical']['embutida_form_full']  = false;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['grid_result_laboratory_medical_script_case_init'] ]['grid_result_laboratory_medical']['embutida_form']       = true;
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['grid_result_laboratory_medical_script_case_init'] ]['grid_result_laboratory_medical']['embutida_pai']        = "form_his_laboratory_medical";
 $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['grid_result_laboratory_medical_script_case_init'] ]['grid_result_laboratory_medical']['embutida_form_parms'] = "resulttran*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scoutNMSC_cab*scinN*scout";
 if (isset($this->Ini->sc_lig_md5["grid_result_laboratory_medical"]) && $this->Ini->sc_lig_md5["grid_result_laboratory_medical"] == "S") {
     $Parms_Lig  = "resulttran*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scoutNMSC_cab*scinN*scout";
     $Md5_Lig    = "@SC_par@" . $this->form_encode_input($this->Ini->sc_page) . "@SC_par@form_his_laboratory_medical@SC_par@" . md5($Parms_Lig);
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['Lig_Md5'][md5($Parms_Lig)] = $Parms_Lig;
 } else {
     $Md5_Lig  = "resulttran*scin" . $this->nmgp_dados_form['trancode'] . "*scoutNMSC_inicial*scininicio*scoutNMSC_paginacao*scinFULL*scoutNMSC_cab*scinN*scout";
 }
 $parms_lig_cons = "&nmgp_parms=" . $Md5_Lig;
 $sDetailSrc = ('novo' == $this->nmgp_opcao) ? 'form_his_laboratory_medical_empty.htm' : $this->Ini->link_grid_result_laboratory_medical_cons . '?script_case_init=' . $this->form_encode_input($this->Ini->sc_page) . '&script_case_detail=Y&sc_ifr_height=800' . $parms_lig_cons;
if (isset($this->Ini->sc_lig_target['C_@scinf_Result']) && 'nmsc_iframe_liga_grid_result_laboratory_medical' != $this->Ini->sc_lig_target['C_@scinf_Result'])
{
    if ('novo' != $this->nmgp_opcao)
    {
        $sDetailSrc .= '&under_dashboard=1&dashboard_app=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['dashboard_app'] . '&own_widget=' . $this->Ini->sc_lig_target['C_@scinf_Result'] . '&parent_widget=' . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['own_widget'];
        $sDetailSrc  = $this->addUrlParam($sDetailSrc, 'script_case_init', $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['grid_result_laboratory_medical_script_case_init']);
    }
?>
<script type="text/javascript">
$(function() {
    scOpenMasterDetail("<?php echo $this->Ini->sc_lig_target['C_@scinf_Result'] ?>", "<?php echo $sDetailSrc; ?>");
});
</script>
<?php
}
else
{
?>
<iframe border="0" id="nmsc_iframe_liga_grid_result_laboratory_medical"  marginWidth="0" marginHeight="0" frameborder="0" valign="top" height="800" width="100%" name="nmsc_iframe_liga_grid_result_laboratory_medical"  scrolling="auto" src="<?php echo $sDetailSrc; ?>"></iframe>
<?php
}
?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_result_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_result_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);
  $nm_sc_blocos_aba    = array(3 => 3,4 => 3,5 => 3);
  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = 'hidden';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
$(window).bind("load", function() {
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4,5);
  $nm_sc_blocos_aba    = array(3 => 3,4 => 3,5 => 3);
  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.visibility = '';";
      }
  }
?>
});
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_his_laboratory_medical");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_his_laboratory_medical");
 parent.scAjaxDetailHeight("form_his_laboratory_medical", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_his_laboratory_medical", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_his_laboratory_medical", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['sc_modal'])
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
	function scBtnFn_sc_btn_0() {
		if ($("#sc_sc_btn_0_top").length && $("#sc_sc_btn_0_top").is(":visible")) {
			sc_btn_sc_btn_0()
			 return;
		}
	}
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
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-5").length && $("#sc_b_ret_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-6").length && $("#sc_b_avc_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-7").length && $("#sc_b_fim_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('final');
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
<span id="sc-id-mobile-in"><?php echo $this->Ini->Nm_lang['lang_version_mobile']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_his_laboratory_medical']['buttonStatus'] = $this->nmgp_botoes;
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
