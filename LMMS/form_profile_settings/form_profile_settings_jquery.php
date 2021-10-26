
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["companyname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["companyaddress" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["companyphone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["companyfax" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["companymail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["companyweb" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["companyperson" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["countrysetting" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["companyname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["companyname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["companyaddress" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["companyaddress" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["companyphone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["companyphone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["companyfax" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["companyfax" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["companymail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["companymail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["companyweb" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["companyweb" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["companyperson" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["companyperson" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["countrysetting" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["countrysetting" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("countrysetting" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_profile_settings_id_onblur(this, iSeqRow) })
                                .bind('change', function() { sc_form_profile_settings_id_onchange(this, iSeqRow) })
                                .bind('focus', function() { sc_form_profile_settings_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_companyname' + iSeqRow).bind('blur', function() { sc_form_profile_settings_companyname_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_profile_settings_companyname_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_profile_settings_companyname_onfocus(this, iSeqRow) });
  $('#id_sc_field_companyaddress' + iSeqRow).bind('blur', function() { sc_form_profile_settings_companyaddress_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_profile_settings_companyaddress_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_profile_settings_companyaddress_onfocus(this, iSeqRow) });
  $('#id_sc_field_logo' + iSeqRow).bind('blur', function() { sc_form_profile_settings_logo_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_profile_settings_logo_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_profile_settings_logo_onfocus(this, iSeqRow) });
  $('#id_sc_field_companyphone' + iSeqRow).bind('blur', function() { sc_form_profile_settings_companyphone_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_profile_settings_companyphone_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_profile_settings_companyphone_onfocus(this, iSeqRow) });
  $('#id_sc_field_companyfax' + iSeqRow).bind('blur', function() { sc_form_profile_settings_companyfax_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_profile_settings_companyfax_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_profile_settings_companyfax_onfocus(this, iSeqRow) });
  $('#id_sc_field_companymail' + iSeqRow).bind('blur', function() { sc_form_profile_settings_companymail_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_profile_settings_companymail_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_profile_settings_companymail_onfocus(this, iSeqRow) });
  $('#id_sc_field_companyweb' + iSeqRow).bind('blur', function() { sc_form_profile_settings_companyweb_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_profile_settings_companyweb_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_profile_settings_companyweb_onfocus(this, iSeqRow) });
  $('#id_sc_field_companyperson' + iSeqRow).bind('blur', function() { sc_form_profile_settings_companyperson_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_profile_settings_companyperson_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_profile_settings_companyperson_onfocus(this, iSeqRow) });
  $('#id_sc_field_currency' + iSeqRow).bind('change', function() { sc_form_profile_settings_currency_onchange(this, iSeqRow) });
  $('#id_sc_field_registrationfee' + iSeqRow).bind('change', function() { sc_form_profile_settings_registrationfee_onchange(this, iSeqRow) });
  $('#id_sc_field_countrysetting' + iSeqRow).bind('blur', function() { sc_form_profile_settings_countrysetting_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_form_profile_settings_countrysetting_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_form_profile_settings_countrysetting_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_profile_settings_id_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_id();
  scCssBlur(oThis);
}

function sc_form_profile_settings_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_companyname_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_companyname();
  scCssBlur(oThis);
}

function sc_form_profile_settings_companyname_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_companyname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_companyaddress_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_companyaddress();
  scCssBlur(oThis);
}

function sc_form_profile_settings_companyaddress_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_companyaddress_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_logo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_profile_settings_logo_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_logo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_profile_settings_companyphone_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_companyphone();
  scCssBlur(oThis);
}

function sc_form_profile_settings_companyphone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_companyphone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_companyfax_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_companyfax();
  scCssBlur(oThis);
}

function sc_form_profile_settings_companyfax_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_companyfax_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_companymail_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_companymail();
  scCssBlur(oThis);
}

function sc_form_profile_settings_companymail_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_companymail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_companyweb_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_companyweb();
  scCssBlur(oThis);
}

function sc_form_profile_settings_companyweb_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_companyweb_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_companyperson_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_companyperson();
  scCssBlur(oThis);
}

function sc_form_profile_settings_companyperson_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_companyperson_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_settings_currency_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_registrationfee_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_countrysetting_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_settings_validate_countrysetting();
  scCssBlur(oThis);
}

function sc_form_profile_settings_countrysetting_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_profile_settings_countrysetting_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id", "", status);
	displayChange_field("companyname", "", status);
	displayChange_field("companyaddress", "", status);
	displayChange_field("logo", "", status);
	displayChange_field("companyphone", "", status);
	displayChange_field("companyfax", "", status);
	displayChange_field("companymail", "", status);
	displayChange_field("companyweb", "", status);
	displayChange_field("companyperson", "", status);
	displayChange_field("countrysetting", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id(row, status);
	displayChange_field_companyname(row, status);
	displayChange_field_companyaddress(row, status);
	displayChange_field_logo(row, status);
	displayChange_field_companyphone(row, status);
	displayChange_field_companyfax(row, status);
	displayChange_field_companymail(row, status);
	displayChange_field_companyweb(row, status);
	displayChange_field_companyperson(row, status);
	displayChange_field_countrysetting(row, status);
}

function displayChange_field(field, row, status) {
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("companyname" == field) {
		displayChange_field_companyname(row, status);
	}
	if ("companyaddress" == field) {
		displayChange_field_companyaddress(row, status);
	}
	if ("logo" == field) {
		displayChange_field_logo(row, status);
	}
	if ("companyphone" == field) {
		displayChange_field_companyphone(row, status);
	}
	if ("companyfax" == field) {
		displayChange_field_companyfax(row, status);
	}
	if ("companymail" == field) {
		displayChange_field_companymail(row, status);
	}
	if ("companyweb" == field) {
		displayChange_field_companyweb(row, status);
	}
	if ("companyperson" == field) {
		displayChange_field_companyperson(row, status);
	}
	if ("countrysetting" == field) {
		displayChange_field_countrysetting(row, status);
	}
}

function displayChange_field_id(row, status) {
}

function displayChange_field_companyname(row, status) {
}

function displayChange_field_companyaddress(row, status) {
}

function displayChange_field_logo(row, status) {
}

function displayChange_field_companyphone(row, status) {
}

function displayChange_field_companyfax(row, status) {
}

function displayChange_field_companymail(row, status) {
}

function displayChange_field_companyweb(row, status) {
}

function displayChange_field_companyperson(row, status) {
}

function displayChange_field_countrysetting(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_countrysetting__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_countrysetting" + row).select2("destroy");
		}
		scJQSelect2Add(row, "countrysetting");
	}
}

function scRecreateSelect2() {
	displayChange_field_countrysetting("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_profile_settings_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(29);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_logo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_profile_settings_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'logo'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_logo" + iSeqRow);
        loaderContent = $("#id_img_loader_logo" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_logo" + iSeqRow);
        loader.show();
      }
    },
    done: function(e, data) {
      var fileData, respData, respPos, respMsg, thumbDisplay, checkDisplay, var_ajax_img_thumb, oTemp;
      fileData = null;
      respMsg = "";
      if (data && data.result && data.result[0] && data.result[0].body) {
        respData = data.result[0].body.innerText;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = $.parseJSON(respData);
        }
        else {
          respMsg = respData;
        }
      }
      else {
        respData = data.result;
        respPos = respData.indexOf("[{");
        if (-1 !== respPos) {
          respMsg = respData.substr(0, respPos);
          respData = respData.substr(respPos);
          fileData = eval(respData);
        }
        else {
          respMsg = respData;
        }
      }
      if (window.FormData !== undefined)
      {
        $("#id_img_loader_logo" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_logo" + iSeqRow).hide();
      }
      if (null == fileData) {
        if ("" != respMsg) {
          oTemp = {"htmOutput" : "<?php echo $this->Ini->Nm_lang['lang_errm_upld_admn']; ?>"};
          scAjaxShowDebug(oTemp);
        }
        return;
      }
      if (fileData[0].error && "" != fileData[0].error) {
        var uploadErrorMessage = "";
        oResp = {};
        if ("acceptFileTypes" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_invl']) ?>";
        }
        else if ("maxFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("minFileSize" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_size']) ?>";
        }
        else if ("emptyFile" == fileData[0].error) {
          uploadErrorMessage = "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_errm_file_empty']) ?>";
        }
        scAjaxShowErrorDisplay("table", uploadErrorMessage);
        return;
      }
      $("#id_sc_field_logo" + iSeqRow).val("");
      $("#id_sc_field_logo_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_logo_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_logo = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_logo) ? "none" : "";
      $("#id_ajax_img_logo" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_logo" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_thumb;
        document.F1.temp_out1_logo.value = var_ajax_img_logo;
      }
      else if (document.F1.temp_out_logo) {
        document.F1.temp_out_logo.value = var_ajax_img_logo;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_logo" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_logo" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_logo" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + img_name +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_profile_settings')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "countrysetting" == specificField) {
    scJQSelect2Add_countrysetting(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_countrysetting(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_countrysetting_obj" : "#id_sc_field_countrysetting" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_countrysetting_obj',
      dropdownCssClass: 'css_countrysetting_obj',
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_countrysetting) { displayChange_field_countrysetting(iLine, "on"); } }, 150);
} // scJQElementsAdd

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

