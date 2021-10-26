<div id="form_profile_mob_form2" style='<?php echo ($this->tabCssClass["form_profile_mob_form2"]['class'] == 'scTabInactive' ? 'display: none; width: 1px; height: 0px; overflow: scroll' : ''); ?>'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id']))
   {
       $this->nmgp_cmp_hidden['id'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_3" class="scFormTable" width="100%" style="height: 100%;"><?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id']))
           {
               $this->nmgp_cmp_readonly['id'] = 'on';
           }
?>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['address']))
    {
        $this->nm_new_label['address'] = "Address";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $address = $this->address;
   $sStyleHidden_address = '';
   if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['address']);
       $sStyleHidden_address = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_address = 'display: none;';
   $sStyleReadInp_address = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['address']) && $this->nmgp_cmp_readonly['address'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['address']);
       $sStyleReadLab_address = '';
       $sStyleReadInp_address = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['address']) && $this->nmgp_cmp_hidden['address'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_address_line" id="hidden_field_data_address" style="<?php echo $sStyleHidden_address; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_address_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_address_label" style=""><span id="id_label_address"><?php echo $this->nm_new_label['address']; ?></span></span><br>
<?php
$address_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($address));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["address"]) &&  $this->nmgp_cmp_readonly["address"] == "on") { 

 ?>
<input type="hidden" name="address" value="<?php echo $this->form_encode_input($address) . "\">" . $address_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_address" class="sc-ui-readonly-address css_address_line" style="<?php echo $sStyleReadLab_address; ?>"><?php echo $this->form_format_readonly("address", $this->form_encode_input($address_val)); ?></span><span id="id_read_off_address" class="css_read_off_address" style="white-space: nowrap;<?php echo $sStyleReadInp_address; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_address_obj" style="white-space: pre-wrap;" name="address" id="id_sc_field_address" rows="5" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $address; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_address_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_address_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['phone']))
    {
        $this->nm_new_label['phone'] = "Phone";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $phone = $this->phone;
   $sStyleHidden_phone = '';
   if (isset($this->nmgp_cmp_hidden['phone']) && $this->nmgp_cmp_hidden['phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['phone']);
       $sStyleHidden_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_phone = 'display: none;';
   $sStyleReadInp_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['phone']) && $this->nmgp_cmp_readonly['phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['phone']);
       $sStyleReadLab_phone = '';
       $sStyleReadInp_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['phone']) && $this->nmgp_cmp_hidden['phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="phone" value="<?php echo $this->form_encode_input($phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_phone_line" id="hidden_field_data_phone" style="<?php echo $sStyleHidden_phone; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_phone_label" style=""><span id="id_label_phone"><?php echo $this->nm_new_label['phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["phone"]) &&  $this->nmgp_cmp_readonly["phone"] == "on") { 

 ?>
<input type="hidden" name="phone" value="<?php echo $this->form_encode_input($phone) . "\">" . $phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_phone" class="sc-ui-readonly-phone css_phone_line" style="<?php echo $sStyleReadLab_phone; ?>"><?php echo $this->form_format_readonly("phone", $this->form_encode_input($this->phone)); ?></span><span id="id_read_off_phone" class="css_read_off_phone" style="white-space: nowrap;<?php echo $sStyleReadInp_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_phone_obj" style="" id="id_sc_field_phone" type=text name="phone" value="<?php echo $this->form_encode_input($phone) ?>"
 size=30 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['mail']))
    {
        $this->nm_new_label['mail'] = "Mail";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $mail = $this->mail;
   $sStyleHidden_mail = '';
   if (isset($this->nmgp_cmp_hidden['mail']) && $this->nmgp_cmp_hidden['mail'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['mail']);
       $sStyleHidden_mail = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_mail = 'display: none;';
   $sStyleReadInp_mail = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['mail']) && $this->nmgp_cmp_readonly['mail'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['mail']);
       $sStyleReadLab_mail = '';
       $sStyleReadInp_mail = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['mail']) && $this->nmgp_cmp_hidden['mail'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="mail" value="<?php echo $this->form_encode_input($mail) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_mail_line" id="hidden_field_data_mail" style="<?php echo $sStyleHidden_mail; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_mail_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_mail_label" style=""><span id="id_label_mail"><?php echo $this->nm_new_label['mail']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["mail"]) &&  $this->nmgp_cmp_readonly["mail"] == "on") { 

 ?>
<input type="hidden" name="mail" value="<?php echo $this->form_encode_input($mail) . "\">" . $mail . ""; ?>
<?php } else { ?>
<span id="id_read_on_mail" class="sc-ui-readonly-mail css_mail_line" style="<?php echo $sStyleReadLab_mail; ?>"><?php echo $this->form_format_readonly("mail", $this->form_encode_input($this->mail)); ?></span><span id="id_read_off_mail" class="css_read_off_mail" style="white-space: nowrap;<?php echo $sStyleReadInp_mail; ?>">
 <input class="sc-js-input scFormObjectOdd css_mail_obj" style="" id="id_sc_field_mail" type=text name="mail" value="<?php echo $this->form_encode_input($mail) ?>"
 size=50 maxlength=50 alt="{enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<?php if ($this->nmgp_opcao != "novo"){ ?><?php echo nmButtonOutput($this->arr_buttons, "bemail", "if (document.F1.mail.value != '') {window.open('mailto:' + document.F1.mail.value); }", "if (document.F1.mail.value != '') {window.open('mailto:' + document.F1.mail.value); }", "mail_mail", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php } ?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_mail_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_mail_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['long']))
    {
        $this->nm_new_label['long'] = "Longitude";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $long = $this->long;
   $sStyleHidden_long = '';
   if (isset($this->nmgp_cmp_hidden['long']) && $this->nmgp_cmp_hidden['long'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['long']);
       $sStyleHidden_long = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_long = 'display: none;';
   $sStyleReadInp_long = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['long']) && $this->nmgp_cmp_readonly['long'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['long']);
       $sStyleReadLab_long = '';
       $sStyleReadInp_long = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['long']) && $this->nmgp_cmp_hidden['long'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="long" value="<?php echo $this->form_encode_input($long) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_long_line" id="hidden_field_data_long" style="<?php echo $sStyleHidden_long; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_long_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_long_label" style=""><span id="id_label_long"><?php echo $this->nm_new_label['long']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["long"]) &&  $this->nmgp_cmp_readonly["long"] == "on") { 

 ?>
<input type="hidden" name="long" value="<?php echo $this->form_encode_input($long) . "\">" . $long . ""; ?>
<?php } else { ?>
<span id="id_read_on_long" class="sc-ui-readonly-long css_long_line" style="<?php echo $sStyleReadLab_long; ?>"><?php echo $this->form_format_readonly("long", $this->form_encode_input($this->long)); ?></span><span id="id_read_off_long" class="css_read_off_long" style="white-space: nowrap;<?php echo $sStyleReadInp_long; ?>">
 <input class="sc-js-input scFormObjectOdd css_long_obj" style="" id="id_sc_field_long" type=text name="long" value="<?php echo $this->form_encode_input($long) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_long_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_long_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['lat']))
    {
        $this->nm_new_label['lat'] = "Latitude";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $lat = $this->lat;
   $sStyleHidden_lat = '';
   if (isset($this->nmgp_cmp_hidden['lat']) && $this->nmgp_cmp_hidden['lat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['lat']);
       $sStyleHidden_lat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_lat = 'display: none;';
   $sStyleReadInp_lat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['lat']) && $this->nmgp_cmp_readonly['lat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['lat']);
       $sStyleReadLab_lat = '';
       $sStyleReadInp_lat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['lat']) && $this->nmgp_cmp_hidden['lat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lat" value="<?php echo $this->form_encode_input($lat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_lat_line" id="hidden_field_data_lat" style="<?php echo $sStyleHidden_lat; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_lat_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_lat_label" style=""><span id="id_label_lat"><?php echo $this->nm_new_label['lat']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lat"]) &&  $this->nmgp_cmp_readonly["lat"] == "on") { 

 ?>
<input type="hidden" name="lat" value="<?php echo $this->form_encode_input($lat) . "\">" . $lat . ""; ?>
<?php } else { ?>
<span id="id_read_on_lat" class="sc-ui-readonly-lat css_lat_line" style="<?php echo $sStyleReadLab_lat; ?>"><?php echo $this->form_format_readonly("lat", $this->form_encode_input($this->lat)); ?></span><span id="id_read_off_lat" class="css_read_off_lat" style="white-space: nowrap;<?php echo $sStyleReadInp_lat; ?>">
 <input class="sc-js-input scFormObjectOdd css_lat_obj" style="" id="id_sc_field_lat" type=text name="lat" value="<?php echo $this->form_encode_input($lat) ?>"
 size=50 maxlength=255 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lat_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
