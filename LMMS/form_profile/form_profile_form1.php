<div id="form_profile_form1" style='<?php echo ($this->tabCssClass["form_profile_form1"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_2" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['facebook']))
    {
        $this->nm_new_label['facebook'] = "Facebook";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $facebook = $this->facebook;
   $sStyleHidden_facebook = '';
   if (isset($this->nmgp_cmp_hidden['facebook']) && $this->nmgp_cmp_hidden['facebook'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['facebook']);
       $sStyleHidden_facebook = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_facebook = 'display: none;';
   $sStyleReadInp_facebook = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['facebook']) && $this->nmgp_cmp_readonly['facebook'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['facebook']);
       $sStyleReadLab_facebook = '';
       $sStyleReadInp_facebook = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['facebook']) && $this->nmgp_cmp_hidden['facebook'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="facebook" value="<?php echo $this->form_encode_input($facebook) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_facebook_label" id="hidden_field_label_facebook" style="<?php echo $sStyleHidden_facebook; ?>"><span id="id_label_facebook"><?php echo $this->nm_new_label['facebook']; ?></span></TD>
    <TD class="scFormDataOdd css_facebook_line" id="hidden_field_data_facebook" style="<?php echo $sStyleHidden_facebook; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_facebook_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["facebook"]) &&  $this->nmgp_cmp_readonly["facebook"] == "on") { 

 ?>
<input type="hidden" name="facebook" value="<?php echo $this->form_encode_input($facebook) . "\">" . $facebook . ""; ?>
<?php } else { ?>
<span id="id_read_on_facebook" class="sc-ui-readonly-facebook css_facebook_line" style="<?php echo $sStyleReadLab_facebook; ?>"><?php echo $this->form_format_readonly("facebook", $this->form_encode_input($this->facebook)); ?></span><span id="id_read_off_facebook" class="css_read_off_facebook" style="white-space: nowrap;<?php echo $sStyleReadInp_facebook; ?>">
 <input class="sc-js-input scFormObjectOdd css_facebook_obj" style="" id="id_sc_field_facebook" type=text name="facebook" value="<?php echo $this->form_encode_input($facebook) ?>"
 size=50 maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.facebook.value), '_blank')", "window.open(nm_link_url(document.F1.facebook.value), '_blank')", "facebook_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_facebook_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_facebook_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['instagram']))
    {
        $this->nm_new_label['instagram'] = "Instagram";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $instagram = $this->instagram;
   $sStyleHidden_instagram = '';
   if (isset($this->nmgp_cmp_hidden['instagram']) && $this->nmgp_cmp_hidden['instagram'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['instagram']);
       $sStyleHidden_instagram = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_instagram = 'display: none;';
   $sStyleReadInp_instagram = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['instagram']) && $this->nmgp_cmp_readonly['instagram'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['instagram']);
       $sStyleReadLab_instagram = '';
       $sStyleReadInp_instagram = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['instagram']) && $this->nmgp_cmp_hidden['instagram'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="instagram" value="<?php echo $this->form_encode_input($instagram) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_instagram_label" id="hidden_field_label_instagram" style="<?php echo $sStyleHidden_instagram; ?>"><span id="id_label_instagram"><?php echo $this->nm_new_label['instagram']; ?></span></TD>
    <TD class="scFormDataOdd css_instagram_line" id="hidden_field_data_instagram" style="<?php echo $sStyleHidden_instagram; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_instagram_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["instagram"]) &&  $this->nmgp_cmp_readonly["instagram"] == "on") { 

 ?>
<input type="hidden" name="instagram" value="<?php echo $this->form_encode_input($instagram) . "\">" . $instagram . ""; ?>
<?php } else { ?>
<span id="id_read_on_instagram" class="sc-ui-readonly-instagram css_instagram_line" style="<?php echo $sStyleReadLab_instagram; ?>"><?php echo $this->form_format_readonly("instagram", $this->form_encode_input($this->instagram)); ?></span><span id="id_read_off_instagram" class="css_read_off_instagram" style="white-space: nowrap;<?php echo $sStyleReadInp_instagram; ?>">
 <input class="sc-js-input scFormObjectOdd css_instagram_obj" style="" id="id_sc_field_instagram" type=text name="instagram" value="<?php echo $this->form_encode_input($instagram) ?>"
 size=50 maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.instagram.value), '_blank')", "window.open(nm_link_url(document.F1.instagram.value), '_blank')", "instagram_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_instagram_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_instagram_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['twitter']))
    {
        $this->nm_new_label['twitter'] = "Twitter";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $twitter = $this->twitter;
   $sStyleHidden_twitter = '';
   if (isset($this->nmgp_cmp_hidden['twitter']) && $this->nmgp_cmp_hidden['twitter'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['twitter']);
       $sStyleHidden_twitter = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_twitter = 'display: none;';
   $sStyleReadInp_twitter = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['twitter']) && $this->nmgp_cmp_readonly['twitter'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['twitter']);
       $sStyleReadLab_twitter = '';
       $sStyleReadInp_twitter = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['twitter']) && $this->nmgp_cmp_hidden['twitter'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="twitter" value="<?php echo $this->form_encode_input($twitter) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_twitter_label" id="hidden_field_label_twitter" style="<?php echo $sStyleHidden_twitter; ?>"><span id="id_label_twitter"><?php echo $this->nm_new_label['twitter']; ?></span></TD>
    <TD class="scFormDataOdd css_twitter_line" id="hidden_field_data_twitter" style="<?php echo $sStyleHidden_twitter; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_twitter_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["twitter"]) &&  $this->nmgp_cmp_readonly["twitter"] == "on") { 

 ?>
<input type="hidden" name="twitter" value="<?php echo $this->form_encode_input($twitter) . "\">" . $twitter . ""; ?>
<?php } else { ?>
<span id="id_read_on_twitter" class="sc-ui-readonly-twitter css_twitter_line" style="<?php echo $sStyleReadLab_twitter; ?>"><?php echo $this->form_format_readonly("twitter", $this->form_encode_input($this->twitter)); ?></span><span id="id_read_off_twitter" class="css_read_off_twitter" style="white-space: nowrap;<?php echo $sStyleReadInp_twitter; ?>">
 <input class="sc-js-input scFormObjectOdd css_twitter_obj" style="" id="id_sc_field_twitter" type=text name="twitter" value="<?php echo $this->form_encode_input($twitter) ?>"
 size=50 maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.twitter.value), '_blank')", "window.open(nm_link_url(document.F1.twitter.value), '_blank')", "twitter_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_twitter_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_twitter_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['youtube']))
    {
        $this->nm_new_label['youtube'] = "Youtube";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $youtube = $this->youtube;
   $sStyleHidden_youtube = '';
   if (isset($this->nmgp_cmp_hidden['youtube']) && $this->nmgp_cmp_hidden['youtube'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['youtube']);
       $sStyleHidden_youtube = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_youtube = 'display: none;';
   $sStyleReadInp_youtube = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['youtube']) && $this->nmgp_cmp_readonly['youtube'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['youtube']);
       $sStyleReadLab_youtube = '';
       $sStyleReadInp_youtube = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['youtube']) && $this->nmgp_cmp_hidden['youtube'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="youtube" value="<?php echo $this->form_encode_input($youtube) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_youtube_label" id="hidden_field_label_youtube" style="<?php echo $sStyleHidden_youtube; ?>"><span id="id_label_youtube"><?php echo $this->nm_new_label['youtube']; ?></span></TD>
    <TD class="scFormDataOdd css_youtube_line" id="hidden_field_data_youtube" style="<?php echo $sStyleHidden_youtube; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_youtube_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["youtube"]) &&  $this->nmgp_cmp_readonly["youtube"] == "on") { 

 ?>
<input type="hidden" name="youtube" value="<?php echo $this->form_encode_input($youtube) . "\">" . $youtube . ""; ?>
<?php } else { ?>
<span id="id_read_on_youtube" class="sc-ui-readonly-youtube css_youtube_line" style="<?php echo $sStyleReadLab_youtube; ?>"><?php echo $this->form_format_readonly("youtube", $this->form_encode_input($this->youtube)); ?></span><span id="id_read_off_youtube" class="css_read_off_youtube" style="white-space: nowrap;<?php echo $sStyleReadInp_youtube; ?>">
 <input class="sc-js-input scFormObjectOdd css_youtube_obj" style="" id="id_sc_field_youtube" type=text name="youtube" value="<?php echo $this->form_encode_input($youtube) ?>"
 size=50 maxlength=255 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php echo nmButtonOutput($this->arr_buttons, "blink", "window.open(nm_link_url(document.F1.youtube.value), '_blank')", "window.open(nm_link_url(document.F1.youtube.value), '_blank')", "youtube_url", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>

</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_youtube_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_youtube_text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
