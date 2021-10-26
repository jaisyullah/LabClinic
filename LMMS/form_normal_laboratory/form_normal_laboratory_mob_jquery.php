
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

  if ($oField.length > 0) {
    switch ($oField[0].name) {
      case 'labcode':
      case 'category':
      case 'name':
      case 'subname':
      case 'rate':
      case 'order':
      case 'lastupdated':
      case 'resulttype':
      case 'oper':
      case 'm1':
      case 'm2':
      case 'f1':
      case 'f2':
      case 'unit':
        sc_exib_ocult_pag('form_normal_laboratory_mob_form0');
        break;
      case 'sc_field_0':
        sc_exib_ocult_pag('form_normal_laboratory_mob_form1');
        break;
    }
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
  scEventControl_data["labcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["category" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["subname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["rate" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["order" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastupdated" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["resulttype" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["oper" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["m1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["m2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["f1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["f2" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["labcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["labcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["category" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["category" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["subname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["subname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["rate" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["rate" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["order" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["order" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastupdated" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastupdated" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["resulttype" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["resulttype" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["oper" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["oper" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["m1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["m1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["m2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["m2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["f1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["f1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["f2" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["f2" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unit" + iSeqRow]["change"]) {
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
  if ("category" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("resulttype" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("oper" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("unit" + iSeq == fieldName) {
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
  $('#id_sc_field_labcode' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_labcode_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_normal_laboratory_labcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_category' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_category_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_normal_laboratory_category_onfocus(this, iSeqRow) });
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_name_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_normal_laboratory_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_subname' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_subname_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_normal_laboratory_subname_onfocus(this, iSeqRow) });
  $('#id_sc_field_oper' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_oper_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_normal_laboratory_oper_onfocus(this, iSeqRow) });
  $('#id_sc_field_m1' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_m1_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_normal_laboratory_m1_onfocus(this, iSeqRow) });
  $('#id_sc_field_m2' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_m2_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_normal_laboratory_m2_onfocus(this, iSeqRow) });
  $('#id_sc_field_f1' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_f1_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_normal_laboratory_f1_onfocus(this, iSeqRow) });
  $('#id_sc_field_f2' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_f2_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_normal_laboratory_f2_onfocus(this, iSeqRow) });
  $('#id_sc_field_unit' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_unit_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_normal_laboratory_unit_onfocus(this, iSeqRow) });
  $('#id_sc_field_rate' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_rate_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_normal_laboratory_rate_onfocus(this, iSeqRow) });
  $('#id_sc_field_resulttype' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_resulttype_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_normal_laboratory_resulttype_onfocus(this, iSeqRow) });
  $('#id_sc_field_order' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_order_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_normal_laboratory_order_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_lastupdated_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_normal_laboratory_lastupdated_onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated_hora' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_lastupdated_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_normal_laboratory_lastupdated_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_normal_laboratory_sc_field_0_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_normal_laboratory_labcode_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_labcode();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_labcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_category_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_category();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_category_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_name_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_name();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_subname_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_subname();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_subname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_oper_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_oper();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_oper_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_m1_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_m1();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_m1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_m2_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_m2();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_m2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_f1_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_f1();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_f1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_f2_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_f2();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_f2_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_unit_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_unit();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_unit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_rate_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_rate();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_rate_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_resulttype_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_resulttype();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_resulttype_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_order_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_order();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_order_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_lastupdated_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_lastupdated();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_lastupdated_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_lastupdated();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_lastupdated_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_lastupdated_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_normal_laboratory_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_normal_laboratory_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
}

function displayChange_page_1(status) {
	displayChange_block("2", status);
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
	displayChange_field("labcode", "", status);
	displayChange_field("category", "", status);
	displayChange_field("name", "", status);
	displayChange_field("subname", "", status);
	displayChange_field("rate", "", status);
	displayChange_field("order", "", status);
	displayChange_field("lastupdated", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("resulttype", "", status);
	displayChange_field("oper", "", status);
	displayChange_field("m1", "", status);
	displayChange_field("m2", "", status);
	displayChange_field("f1", "", status);
	displayChange_field("f2", "", status);
	displayChange_field("unit", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("sc_field_0", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_labcode(row, status);
	displayChange_field_category(row, status);
	displayChange_field_name(row, status);
	displayChange_field_subname(row, status);
	displayChange_field_rate(row, status);
	displayChange_field_order(row, status);
	displayChange_field_lastupdated(row, status);
	displayChange_field_resulttype(row, status);
	displayChange_field_oper(row, status);
	displayChange_field_m1(row, status);
	displayChange_field_m2(row, status);
	displayChange_field_f1(row, status);
	displayChange_field_f2(row, status);
	displayChange_field_unit(row, status);
	displayChange_field_sc_field_0(row, status);
}

function displayChange_field(field, row, status) {
	if ("labcode" == field) {
		displayChange_field_labcode(row, status);
	}
	if ("category" == field) {
		displayChange_field_category(row, status);
	}
	if ("name" == field) {
		displayChange_field_name(row, status);
	}
	if ("subname" == field) {
		displayChange_field_subname(row, status);
	}
	if ("rate" == field) {
		displayChange_field_rate(row, status);
	}
	if ("order" == field) {
		displayChange_field_order(row, status);
	}
	if ("lastupdated" == field) {
		displayChange_field_lastupdated(row, status);
	}
	if ("resulttype" == field) {
		displayChange_field_resulttype(row, status);
	}
	if ("oper" == field) {
		displayChange_field_oper(row, status);
	}
	if ("m1" == field) {
		displayChange_field_m1(row, status);
	}
	if ("m2" == field) {
		displayChange_field_m2(row, status);
	}
	if ("f1" == field) {
		displayChange_field_f1(row, status);
	}
	if ("f2" == field) {
		displayChange_field_f2(row, status);
	}
	if ("unit" == field) {
		displayChange_field_unit(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
}

function displayChange_field_labcode(row, status) {
}

function displayChange_field_category(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_category__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_category" + row).select2("destroy");
		}
		scJQSelect2Add(row, "category");
	}
}

function displayChange_field_name(row, status) {
}

function displayChange_field_subname(row, status) {
}

function displayChange_field_rate(row, status) {
}

function displayChange_field_order(row, status) {
}

function displayChange_field_lastupdated(row, status) {
}

function displayChange_field_resulttype(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_resulttype__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_resulttype" + row).select2("destroy");
		}
		scJQSelect2Add(row, "resulttype");
	}
}

function displayChange_field_oper(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_oper__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_oper" + row).select2("destroy");
		}
		scJQSelect2Add(row, "oper");
	}
}

function displayChange_field_m1(row, status) {
}

function displayChange_field_m2(row, status) {
}

function displayChange_field_f1(row, status) {
}

function displayChange_field_f2(row, status) {
}

function displayChange_field_unit(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_unit__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_unit" + row).select2("destroy");
		}
		scJQSelect2Add(row, "unit");
	}
}

function displayChange_field_sc_field_0(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_normal_laboratory_detail_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_normal_laboratory_detail_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_category("all", "on");
	displayChange_field_resulttype("all", "on");
	displayChange_field_oper("all", "on");
	displayChange_field_unit("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_normal_laboratory_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_lastupdated" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_lastupdated" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['lastupdated']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdated']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_normal_laboratory_mob_validate_lastupdated(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdated']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_normal_laboratory_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "category" == specificField) {
    scJQSelect2Add_category(seqRow);
  }
  if (null == specificField || "resulttype" == specificField) {
    scJQSelect2Add_resulttype(seqRow);
  }
  if (null == specificField || "oper" == specificField) {
    scJQSelect2Add_oper(seqRow);
  }
  if (null == specificField || "unit" == specificField) {
    scJQSelect2Add_unit(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_category(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_category_obj" : "#id_sc_field_category" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_category_obj',
      dropdownCssClass: 'css_category_obj',
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

function scJQSelect2Add_resulttype(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_resulttype_obj" : "#id_sc_field_resulttype" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_resulttype_obj',
      dropdownCssClass: 'css_resulttype_obj',
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

function scJQSelect2Add_oper(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_oper_obj" : "#id_sc_field_oper" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_oper_obj',
      dropdownCssClass: 'css_oper_obj',
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

function scJQSelect2Add_unit(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_unit_obj" : "#id_sc_field_unit" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_unit_obj',
      dropdownCssClass: 'css_unit_obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_category) { displayChange_field_category(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_resulttype) { displayChange_field_resulttype(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_oper) { displayChange_field_oper(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_unit) { displayChange_field_unit(iLine, "on"); } }, 150);
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
