<div id="form_profile_mob_form3" style='<?php echo ($this->tabCssClass["form_profile_mob_form3"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_4"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_4" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['aboutus']))
    {
        $this->nm_new_label['aboutus'] = "About Us";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $aboutus = $this->aboutus;
   $sStyleHidden_aboutus = '';
   if (isset($this->nmgp_cmp_hidden['aboutus']) && $this->nmgp_cmp_hidden['aboutus'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['aboutus']);
       $sStyleHidden_aboutus = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_aboutus = 'display: none;';
   $sStyleReadInp_aboutus = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['aboutus']) && $this->nmgp_cmp_readonly['aboutus'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['aboutus']);
       $sStyleReadLab_aboutus = '';
       $sStyleReadInp_aboutus = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['aboutus']) && $this->nmgp_cmp_hidden['aboutus'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aboutus" value="<?php echo $this->form_encode_input($aboutus) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_aboutus_line" id="hidden_field_data_aboutus" style="<?php echo $sStyleHidden_aboutus; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_aboutus_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_aboutus_label" style=""><span id="id_label_aboutus"><?php echo $this->nm_new_label['aboutus']; ?></span></span><br><span id="id_read_on_aboutus" style="<?php echo $sStyleReadLab_aboutus; ?>"><?php echo $this->form_format_readonly("aboutus", sc_strip_script($this->aboutus)); ?></span><span id="id_read_off_aboutus" class="css_read_off_aboutus" style="<?php echo $sStyleReadInp_aboutus; ?>"><textarea id="aboutus" name="aboutus" cols="50" rows="10" class="mceEditor_aboutus" style="width: 100%; height:350px;"><?php echo $this->form_encode_input($this->aboutus); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aboutus_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aboutus_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['privacypolicy']))
    {
        $this->nm_new_label['privacypolicy'] = "Privacy Policy";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $privacypolicy = $this->privacypolicy;
   $sStyleHidden_privacypolicy = '';
   if (isset($this->nmgp_cmp_hidden['privacypolicy']) && $this->nmgp_cmp_hidden['privacypolicy'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['privacypolicy']);
       $sStyleHidden_privacypolicy = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_privacypolicy = 'display: none;';
   $sStyleReadInp_privacypolicy = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['privacypolicy']) && $this->nmgp_cmp_readonly['privacypolicy'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['privacypolicy']);
       $sStyleReadLab_privacypolicy = '';
       $sStyleReadInp_privacypolicy = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['privacypolicy']) && $this->nmgp_cmp_hidden['privacypolicy'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="privacypolicy" value="<?php echo $this->form_encode_input($privacypolicy) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_privacypolicy_line" id="hidden_field_data_privacypolicy" style="<?php echo $sStyleHidden_privacypolicy; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_privacypolicy_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_privacypolicy_label" style=""><span id="id_label_privacypolicy"><?php echo $this->nm_new_label['privacypolicy']; ?></span></span><br><span id="id_read_on_privacypolicy" style="<?php echo $sStyleReadLab_privacypolicy; ?>"><?php echo $this->form_format_readonly("privacypolicy", sc_strip_script($this->privacypolicy)); ?></span><span id="id_read_off_privacypolicy" class="css_read_off_privacypolicy" style="<?php echo $sStyleReadInp_privacypolicy; ?>"><textarea id="privacypolicy" name="privacypolicy" cols="50" rows="10" class="mceEditor_privacypolicy" style="width: 100%; height:350px;"><?php echo $this->form_encode_input($this->privacypolicy); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_privacypolicy_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_privacypolicy_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['terms']))
    {
        $this->nm_new_label['terms'] = "Terms & Condition";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $terms = $this->terms;
   $sStyleHidden_terms = '';
   if (isset($this->nmgp_cmp_hidden['terms']) && $this->nmgp_cmp_hidden['terms'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['terms']);
       $sStyleHidden_terms = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_terms = 'display: none;';
   $sStyleReadInp_terms = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['terms']) && $this->nmgp_cmp_readonly['terms'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['terms']);
       $sStyleReadLab_terms = '';
       $sStyleReadInp_terms = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['terms']) && $this->nmgp_cmp_hidden['terms'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="terms" value="<?php echo $this->form_encode_input($terms) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_terms_line" id="hidden_field_data_terms" style="<?php echo $sStyleHidden_terms; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_terms_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_terms_label" style=""><span id="id_label_terms"><?php echo $this->nm_new_label['terms']; ?></span></span><br><span id="id_read_on_terms" style="<?php echo $sStyleReadLab_terms; ?>"><?php echo $this->form_format_readonly("terms", sc_strip_script($this->terms)); ?></span><span id="id_read_off_terms" class="css_read_off_terms" style="<?php echo $sStyleReadInp_terms; ?>"><textarea id="terms" name="terms" cols="50" rows="10" class="mceEditor_terms" style="width: 100%; height:350px;"><?php echo $this->form_encode_input($this->terms); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_terms_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_terms_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['healthguide']))
    {
        $this->nm_new_label['healthguide'] = "Health Guideline";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $healthguide = $this->healthguide;
   $sStyleHidden_healthguide = '';
   if (isset($this->nmgp_cmp_hidden['healthguide']) && $this->nmgp_cmp_hidden['healthguide'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['healthguide']);
       $sStyleHidden_healthguide = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_healthguide = 'display: none;';
   $sStyleReadInp_healthguide = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['healthguide']) && $this->nmgp_cmp_readonly['healthguide'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['healthguide']);
       $sStyleReadLab_healthguide = '';
       $sStyleReadInp_healthguide = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['healthguide']) && $this->nmgp_cmp_hidden['healthguide'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="healthguide" value="<?php echo $this->form_encode_input($healthguide) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_healthguide_line" id="hidden_field_data_healthguide" style="<?php echo $sStyleHidden_healthguide; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_healthguide_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_healthguide_label" style=""><span id="id_label_healthguide"><?php echo $this->nm_new_label['healthguide']; ?></span></span><br><span id="id_read_on_healthguide" style="<?php echo $sStyleReadLab_healthguide; ?>"><?php echo $this->form_format_readonly("healthguide", sc_strip_script($this->healthguide)); ?></span><span id="id_read_off_healthguide" class="css_read_off_healthguide" style="<?php echo $sStyleReadInp_healthguide; ?>"><textarea id="healthguide" name="healthguide" cols="50" rows="10" class="mceEditor_healthguide" style="width: 100%; height:350px;"><?php echo $this->form_encode_input($this->healthguide); ?></textarea>
</span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_healthguide_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_healthguide_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
</td></tr>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColor">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "R")
{
    $NM_btn = false;
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8592;)", "sc-unique-btn-21", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8592;)", "sc-unique-btn-22", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + &#8594;)", "sc-unique-btn-23", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Shift + &#8594;)", "sc-unique-btn-24", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
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
 $NM_pag_atual = "form_profile_mob_form0";
 if (isset($this->nmgp_ancora) && $this->nmgp_ancora != "")
 {
     $NM_pag_atual = "form_profile_mob_form" . $this->nmgp_ancora;
 }
?>
<?php
if (!$this->nmgp_form_empty) {
?>
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.width='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.height='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.display='';
  document.getElementById('<?php echo $NM_pag_atual; ?>').style.overflow='visible';
<?php
}
else {
?>
  $(".sc-ui-page-tab-line").hide();
  $("#sc-id-required-row").hide();
<?php
}
?>
</script> 
<?php
      $Tzone = ini_get('date.timezone');
      if (empty($Tzone))
      {
?>
<script> 
  _scAjaxShowMessage({title: '', message: "<?php echo $this->Ini->Nm_lang['lang_errm_tz']; ?>", isModal: false, timeout: 0, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: true, showBodyIcon: false, isToast: false, toastPos: ""});
</script> 
<?php
      }
?>
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2,3,4);

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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['masterValue']))
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_profile_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_profile_mob");
 parent.scAjaxDetailHeight("form_profile_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_profile_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_profile_mob", <?php echo $sTamanhoIframe; ?>);
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
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-12").length && $("#sc_b_upd_t.sc-unique-btn-12").is(":visible")) {
			nm_atualiza ('alterar');
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
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-16").length && $("#sc_b_sai_t.sc-unique-btn-16").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-17").length && $("#sc_b_sai_t.sc-unique-btn-17").is(":visible")) {
			scFormClose_F5('<?php echo $nm_url_saida; ?>');
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
		if ($("#sc_b_sai_t.sc-unique-btn-20").length && $("#sc_b_sai_t.sc-unique-btn-20").is(":visible")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-5").length && $("#sc_b_ini_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
		if ($("#sc_b_ini_b.sc-unique-btn-21").length && $("#sc_b_ini_b.sc-unique-btn-21").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-6").length && $("#sc_b_ret_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
		if ($("#sc_b_ret_b.sc-unique-btn-22").length && $("#sc_b_ret_b.sc-unique-btn-22").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-7").length && $("#sc_b_avc_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
		if ($("#sc_b_avc_b.sc-unique-btn-23").length && $("#sc_b_avc_b.sc-unique-btn-23").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-8").length && $("#sc_b_fim_b.sc-unique-btn-8").is(":visible")) {
			nm_move ('final');
			 return;
		}
		if ($("#sc_b_fim_b.sc-unique-btn-24").length && $("#sc_b_fim_b.sc-unique-btn-24").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-9").length && $("#sc_b_new_t.sc-unique-btn-9").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-10").length && $("#sc_b_ins_t.sc-unique-btn-10").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-11").length && $("#sc_b_sai_t.sc-unique-btn-11").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_t.sc-unique-btn-13").length && $("#sc_b_del_t.sc-unique-btn-13").is(":visible")) {
			nm_atualiza ('excluir');
			 return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-14").length && $("#sys_separator.sc-unique-btn-14").is(":visible")) {
			return false;
			 return;
		}
	}
	function scBtnFn_sys_format_copy() {
		if ($("#sc_b_clone_t.sc-unique-btn-15").length && $("#sc_b_clone_t.sc-unique-btn-15").is(":visible")) {
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_profile_mob']['buttonStatus'] = $this->nmgp_botoes;
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
