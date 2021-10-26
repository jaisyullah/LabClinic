
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
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["patientid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regdate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["regtime" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["queueno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["deptid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["doctorid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["finishdate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["servicedate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["paymentid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institutionid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["institutionno" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["statusid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["staffid" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["patientid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["patientid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regdate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regdate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["regtime" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["regtime" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["queueno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["queueno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["deptid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["deptid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["doctorid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["doctorid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["finishdate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["finishdate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["servicedate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["servicedate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["paymentid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["paymentid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institutionid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institutionid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["institutionno" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["institutionno" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["statusid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["statusid" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["staffid" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["staffid" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("deptid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("doctorid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("paymentid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("institutionid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("statusid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("staffid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("doctorid" + iSeq == fieldName) {
    scEventControl_data[fieldName]["change"]   = true;
    scEventControl_data[fieldName]["original"] = $(oField).val();
    scEventControl_data[fieldName]["calculated"] = $(oField).val();
    return;
  }
  if ("regdate" + iSeq == fieldName) {
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
  $('#id_sc_field_patientid' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_patientid_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_outpatient_reg_patientid_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_outpatient_reg_patientid_onfocus(this, iSeqRow) });
  $('#id_sc_field_deptid' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_deptid_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_outpatient_reg_deptid_onfocus(this, iSeqRow) });
  $('#id_sc_field_doctorid' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_doctorid_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_outpatient_reg_doctorid_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_outpatient_reg_doctorid_onfocus(this, iSeqRow) });
  $('#id_sc_field_queueno' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_queueno_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_outpatient_reg_queueno_onfocus(this, iSeqRow) });
  $('#id_sc_field_regdate' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_regdate_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_outpatient_reg_regdate_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_outpatient_reg_regdate_onfocus(this, iSeqRow) });
  $('#id_sc_field_regtime' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_regtime_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_outpatient_reg_regtime_onfocus(this, iSeqRow) });
  $('#id_sc_field_finishdate' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_finishdate_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_outpatient_reg_finishdate_onfocus(this, iSeqRow) });
  $('#id_sc_field_finishdate_hora' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_finishdate_onblur(this, iSeqRow) })
                                             .bind('focus', function() { sc_form_outpatient_reg_finishdate_onfocus(this, iSeqRow) });
  $('#id_sc_field_servicedate' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_servicedate_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_outpatient_reg_servicedate_onfocus(this, iSeqRow) });
  $('#id_sc_field_servicedate_hora' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_servicedate_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_outpatient_reg_servicedate_onfocus(this, iSeqRow) });
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_trancode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_outpatient_reg_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_statusid' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_statusid_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_outpatient_reg_statusid_onfocus(this, iSeqRow) });
  $('#id_sc_field_paymentid' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_paymentid_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_outpatient_reg_paymentid_onfocus(this, iSeqRow) });
  $('#id_sc_field_institutionid' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_institutionid_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_outpatient_reg_institutionid_onfocus(this, iSeqRow) });
  $('#id_sc_field_institutionno' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_institutionno_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_outpatient_reg_institutionno_onfocus(this, iSeqRow) });
  $('#id_sc_field_staffid' + iSeqRow).bind('blur', function() { sc_form_outpatient_reg_staffid_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_outpatient_reg_staffid_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_outpatient_reg_patientid_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_patientid();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_patientid_onchange(oThis, iSeqRow) {
  lookup_patientid();
}

function sc_form_outpatient_reg_patientid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_deptid_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_deptid();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_deptid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_doctorid_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_doctorid();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_doctorid_onchange(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_event_doctorid_onchange();
}

function sc_form_outpatient_reg_doctorid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_queueno_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_queueno();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_queueno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_regdate_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_regdate();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_regdate_onchange(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_event_regdate_onchange();
}

function sc_form_outpatient_reg_regdate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_regtime_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_regtime();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_regtime_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_finishdate_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_finishdate();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_finishdate_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_finishdate();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_finishdate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_finishdate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_servicedate_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_servicedate();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_servicedate_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_servicedate();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_servicedate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_servicedate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_statusid_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_statusid();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_statusid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_paymentid_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_paymentid();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_paymentid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_institutionid_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_institutionid();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_institutionid_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_institutionno_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_institutionno();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_institutionno_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_outpatient_reg_staffid_onblur(oThis, iSeqRow) {
  do_ajax_form_outpatient_reg_mob_validate_staffid();
  scCssBlur(oThis);
}

function sc_form_outpatient_reg_staffid_onfocus(oThis, iSeqRow) {
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
}

function displayChange_block_0(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("patientid", "", status);
	displayChange_field("regdate", "", status);
	displayChange_field("regtime", "", status);
	displayChange_field("queueno", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("deptid", "", status);
	displayChange_field("doctorid", "", status);
	displayChange_field("finishdate", "", status);
	displayChange_field("servicedate", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("paymentid", "", status);
	displayChange_field("institutionid", "", status);
	displayChange_field("institutionno", "", status);
	displayChange_field("statusid", "", status);
	displayChange_field("staffid", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode(row, status);
	displayChange_field_patientid(row, status);
	displayChange_field_regdate(row, status);
	displayChange_field_regtime(row, status);
	displayChange_field_queueno(row, status);
	displayChange_field_deptid(row, status);
	displayChange_field_doctorid(row, status);
	displayChange_field_finishdate(row, status);
	displayChange_field_servicedate(row, status);
	displayChange_field_paymentid(row, status);
	displayChange_field_institutionid(row, status);
	displayChange_field_institutionno(row, status);
	displayChange_field_statusid(row, status);
	displayChange_field_staffid(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("patientid" == field) {
		displayChange_field_patientid(row, status);
	}
	if ("regdate" == field) {
		displayChange_field_regdate(row, status);
	}
	if ("regtime" == field) {
		displayChange_field_regtime(row, status);
	}
	if ("queueno" == field) {
		displayChange_field_queueno(row, status);
	}
	if ("deptid" == field) {
		displayChange_field_deptid(row, status);
	}
	if ("doctorid" == field) {
		displayChange_field_doctorid(row, status);
	}
	if ("finishdate" == field) {
		displayChange_field_finishdate(row, status);
	}
	if ("servicedate" == field) {
		displayChange_field_servicedate(row, status);
	}
	if ("paymentid" == field) {
		displayChange_field_paymentid(row, status);
	}
	if ("institutionid" == field) {
		displayChange_field_institutionid(row, status);
	}
	if ("institutionno" == field) {
		displayChange_field_institutionno(row, status);
	}
	if ("statusid" == field) {
		displayChange_field_statusid(row, status);
	}
	if ("staffid" == field) {
		displayChange_field_staffid(row, status);
	}
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_patientid(row, status) {
}

function displayChange_field_regdate(row, status) {
}

function displayChange_field_regtime(row, status) {
}

function displayChange_field_queueno(row, status) {
}

function displayChange_field_deptid(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_deptid__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_deptid" + row).select2("destroy");
		}
		scJQSelect2Add(row, "deptid");
	}
}

function displayChange_field_doctorid(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_doctorid__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_doctorid" + row).select2("destroy");
		}
		scJQSelect2Add(row, "doctorid");
	}
}

function displayChange_field_finishdate(row, status) {
}

function displayChange_field_servicedate(row, status) {
}

function displayChange_field_paymentid(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_paymentid__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_paymentid" + row).select2("destroy");
		}
		scJQSelect2Add(row, "paymentid");
	}
}

function displayChange_field_institutionid(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_institutionid__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_institutionid" + row).select2("destroy");
		}
		scJQSelect2Add(row, "institutionid");
	}
}

function displayChange_field_institutionno(row, status) {
}

function displayChange_field_statusid(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_statusid__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_statusid" + row).select2("destroy");
		}
		scJQSelect2Add(row, "statusid");
	}
}

function displayChange_field_staffid(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_staffid__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_staffid" + row).select2("destroy");
		}
		scJQSelect2Add(row, "staffid");
	}
}

function scRecreateSelect2() {
	displayChange_field_deptid("all", "on");
	displayChange_field_doctorid("all", "on");
	displayChange_field_paymentid("all", "on");
	displayChange_field_institutionid("all", "on");
	displayChange_field_statusid("all", "on");
	displayChange_field_staffid("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_outpatient_reg_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(31);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_regdate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_regdate" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_outpatient_reg_mob_validate_regdate(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("SU"); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("yyyymmdd", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_finishdate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_finishdate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['finishdate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['finishdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_outpatient_reg_mob_validate_finishdate(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['finishdate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
  $("#id_sc_field_servicedate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_servicedate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['servicedate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['servicedate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_outpatient_reg_mob_validate_servicedate(iSeqRow);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['servicedate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_outpatient_reg_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "deptid" == specificField) {
    scJQSelect2Add_deptid(seqRow);
  }
  if (null == specificField || "doctorid" == specificField) {
    scJQSelect2Add_doctorid(seqRow);
  }
  if (null == specificField || "paymentid" == specificField) {
    scJQSelect2Add_paymentid(seqRow);
  }
  if (null == specificField || "institutionid" == specificField) {
    scJQSelect2Add_institutionid(seqRow);
  }
  if (null == specificField || "statusid" == specificField) {
    scJQSelect2Add_statusid(seqRow);
  }
  if (null == specificField || "staffid" == specificField) {
    scJQSelect2Add_staffid(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_deptid(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_deptid_obj" : "#id_sc_field_deptid" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_deptid_obj',
      dropdownCssClass: 'css_deptid_obj',
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

function scJQSelect2Add_doctorid(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_doctorid_obj" : "#id_sc_field_doctorid" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_doctorid_obj',
      dropdownCssClass: 'css_doctorid_obj',
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

function scJQSelect2Add_paymentid(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_paymentid_obj" : "#id_sc_field_paymentid" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_paymentid_obj',
      dropdownCssClass: 'css_paymentid_obj',
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

function scJQSelect2Add_institutionid(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_institutionid_obj" : "#id_sc_field_institutionid" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_institutionid_obj',
      dropdownCssClass: 'css_institutionid_obj',
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

function scJQSelect2Add_statusid(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_statusid_obj" : "#id_sc_field_statusid" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_statusid_obj',
      dropdownCssClass: 'css_statusid_obj',
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

function scJQSelect2Add_staffid(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_staffid_obj" : "#id_sc_field_staffid" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_staffid_obj',
      dropdownCssClass: 'css_staffid_obj',
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
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_deptid) { displayChange_field_deptid(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_doctorid) { displayChange_field_doctorid(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_paymentid) { displayChange_field_paymentid(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_institutionid) { displayChange_field_institutionid(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_statusid) { displayChange_field_statusid(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_staffid) { displayChange_field_staffid(iLine, "on"); } }, 150);
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
