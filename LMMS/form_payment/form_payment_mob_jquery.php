
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
  scEventControl_data["date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["saleid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["paycode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["patient" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bill" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["amount" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["discount" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["change" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["type" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institution" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["cardno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["picture" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["date" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["saleid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["saleid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["paycode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["paycode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["patient" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["patient" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bill" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bill" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["amount" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["amount" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["discount" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["discount" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["change" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["change" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["type" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["type" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institution" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institution" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["cardno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["cardno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("type" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("institution" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("amount" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("discount" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("saleid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
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
  $('#id_sc_field_saleid' + iSeqRow).bind('blur', function() { sc_form_payment_saleid_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_payment_saleid_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_payment_saleid_onfocus(this, iSeqRow) });
  $('#id_sc_field_paycode' + iSeqRow).bind('blur', function() { sc_form_payment_paycode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_payment_paycode_onfocus(this, iSeqRow) });
  $('#id_sc_field_amount' + iSeqRow).bind('blur', function() { sc_form_payment_amount_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_payment_amount_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_payment_amount_onfocus(this, iSeqRow) });
  $('#id_sc_field_discount' + iSeqRow).bind('blur', function() { sc_form_payment_discount_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_payment_discount_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_payment_discount_onfocus(this, iSeqRow) });
  $('#id_sc_field_type' + iSeqRow).bind('blur', function() { sc_form_payment_type_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_payment_type_onfocus(this, iSeqRow) });
  $('#id_sc_field_picture' + iSeqRow).bind('blur', function() { sc_form_payment_picture_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_payment_picture_onfocus(this, iSeqRow) });
  $('#id_sc_field_cardno' + iSeqRow).bind('blur', function() { sc_form_payment_cardno_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_payment_cardno_onfocus(this, iSeqRow) });
  $('#id_sc_field_date' + iSeqRow).bind('blur', function() { sc_form_payment_date_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_payment_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_date_hora' + iSeqRow).bind('blur', function() { sc_form_payment_date_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_payment_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_institution' + iSeqRow).bind('blur', function() { sc_form_payment_institution_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_payment_institution_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_payment_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_payment_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_patient' + iSeqRow).bind('blur', function() { sc_form_payment_patient_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_payment_patient_onfocus(this, iSeqRow) });
  $('#id_sc_field_bill' + iSeqRow).bind('blur', function() { sc_form_payment_bill_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_payment_bill_onfocus(this, iSeqRow) });
  $('#id_sc_field_change' + iSeqRow).bind('blur', function() { sc_form_payment_change_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_payment_change_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_payment_saleid_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_saleid();
  scCssBlur(oThis);
}

function sc_form_payment_saleid_onchange(oThis, iSeqRow) {
  do_ajax_form_payment_mob_event_saleid_onchange();
}

function sc_form_payment_saleid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_paycode_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_paycode();
  scCssBlur(oThis);
}

function sc_form_payment_paycode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_amount_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_amount();
  scCssBlur(oThis);
}

function sc_form_payment_amount_onchange(oThis, iSeqRow) {
  do_ajax_form_payment_mob_event_amount_onchange();
}

function sc_form_payment_amount_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_discount_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_discount();
  scCssBlur(oThis);
}

function sc_form_payment_discount_onchange(oThis, iSeqRow) {
  do_ajax_form_payment_mob_event_discount_onchange();
}

function sc_form_payment_discount_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_type_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_type();
  scCssBlur(oThis);
}

function sc_form_payment_type_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_picture_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_payment_picture_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_payment_cardno_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_cardno();
  scCssBlur(oThis);
}

function sc_form_payment_cardno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_date_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_date();
  scCssBlur(oThis);
}

function sc_form_payment_date_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_date();
  scCssBlur(oThis);
}

function sc_form_payment_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_institution_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_institution();
  scCssBlur(oThis);
}

function sc_form_payment_institution_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_payment_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_patient_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_patient();
  scCssBlur(oThis);
}

function sc_form_payment_patient_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_bill_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_bill();
  scCssBlur(oThis);
}

function sc_form_payment_bill_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_change_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_mob_validate_change();
  scCssBlur(oThis);
}

function sc_form_payment_change_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("date", "", status);
	displayChange_field("saleid", "", status);
	displayChange_field("paycode", "", status);
	displayChange_field("patient", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("bill", "", status);
	displayChange_field("amount", "", status);
	displayChange_field("discount", "", status);
	displayChange_field("change", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("type", "", status);
	displayChange_field("institution", "", status);
	displayChange_field("cardno", "", status);
	displayChange_field("picture", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("sc_field_0", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_date(row, status);
	displayChange_field_saleid(row, status);
	displayChange_field_paycode(row, status);
	displayChange_field_patient(row, status);
	displayChange_field_bill(row, status);
	displayChange_field_amount(row, status);
	displayChange_field_discount(row, status);
	displayChange_field_change(row, status);
	displayChange_field_type(row, status);
	displayChange_field_institution(row, status);
	displayChange_field_cardno(row, status);
	displayChange_field_picture(row, status);
	displayChange_field_sc_field_0(row, status);
}

function displayChange_field(field, row, status) {
	if ("date" == field) {
		displayChange_field_date(row, status);
	}
	if ("saleid" == field) {
		displayChange_field_saleid(row, status);
	}
	if ("paycode" == field) {
		displayChange_field_paycode(row, status);
	}
	if ("patient" == field) {
		displayChange_field_patient(row, status);
	}
	if ("bill" == field) {
		displayChange_field_bill(row, status);
	}
	if ("amount" == field) {
		displayChange_field_amount(row, status);
	}
	if ("discount" == field) {
		displayChange_field_discount(row, status);
	}
	if ("change" == field) {
		displayChange_field_change(row, status);
	}
	if ("type" == field) {
		displayChange_field_type(row, status);
	}
	if ("institution" == field) {
		displayChange_field_institution(row, status);
	}
	if ("cardno" == field) {
		displayChange_field_cardno(row, status);
	}
	if ("picture" == field) {
		displayChange_field_picture(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
}

function displayChange_field_date(row, status) {
}

function displayChange_field_saleid(row, status) {
}

function displayChange_field_paycode(row, status) {
}

function displayChange_field_patient(row, status) {
}

function displayChange_field_bill(row, status) {
}

function displayChange_field_amount(row, status) {
}

function displayChange_field_discount(row, status) {
}

function displayChange_field_change(row, status) {
}

function displayChange_field_type(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_type__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_type" + row).select2("destroy");
		}
		scJQSelect2Add(row, "type");
	}
}

function displayChange_field_institution(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_institution__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_institution" + row).select2("destroy");
		}
		scJQSelect2Add(row, "institution");
	}
}

function displayChange_field_cardno(row, status) {
}

function displayChange_field_picture(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_grid_bill_details")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_grid_bill_details")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_type("all", "on");
	displayChange_field_institution("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_payment_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_picture" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_payment_mob_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'picture'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_picture" + iSeqRow);
        loaderContent = $("#id_img_loader_picture" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_picture" + iSeqRow);
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
        $("#id_img_loader_picture" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_picture" + iSeqRow).hide();
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
      $("#id_sc_field_picture" + iSeqRow).val("");
      $("#id_sc_field_picture_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_picture_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_picture = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_picture) ? "none" : "";
      $("#id_ajax_img_picture" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_picture" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_picture) {
        document.F1.temp_out_picture.value = var_ajax_img_thumb;
        document.F1.temp_out1_picture.value = var_ajax_img_picture;
      }
      else if (document.F1.temp_out_picture) {
        document.F1.temp_out_picture.value = var_ajax_img_picture;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_picture" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_picture" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_picture" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_picture" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_payment_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "type" == specificField) {
    scJQSelect2Add_type(seqRow);
  }
  if (null == specificField || "institution" == specificField) {
    scJQSelect2Add_institution(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_type(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_type_obj" : "#id_sc_field_type" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_type_obj',
      dropdownCssClass: 'css_type_obj',
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

function scJQSelect2Add_institution(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_institution_obj" : "#id_sc_field_institution" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_institution_obj',
      dropdownCssClass: 'css_institution_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_type) { displayChange_field_type(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_institution) { displayChange_field_institution(iLine, "on"); } }, 150);
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
