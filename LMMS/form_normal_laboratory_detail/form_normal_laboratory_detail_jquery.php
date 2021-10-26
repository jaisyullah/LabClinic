
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
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailname_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["oper_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["m1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["m2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["f1_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["f2_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["unit_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lastupdated_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailname_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailname_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["oper_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["oper_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["m1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["m1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["m2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["m2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["f1_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["f1_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["f2_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["f2_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["unit_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["unit_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lastupdated_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lastupdated_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("oper_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("unit_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_normal_laboratory_detail_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_normal_laboratory_detail_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_labcode_' + iSeqRow).bind('change', function() { sc_form_normal_laboratory_detail_labcode__onchange(this, iSeqRow) });
  $('#id_sc_field_detailname_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_detailname__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_normal_laboratory_detail_detailname__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_normal_laboratory_detail_detailname__onfocus(this, iSeqRow) });
  $('#id_sc_field_oper_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_oper__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_normal_laboratory_detail_oper__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_normal_laboratory_detail_oper__onfocus(this, iSeqRow) });
  $('#id_sc_field_m1_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_m1__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_normal_laboratory_detail_m1__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_normal_laboratory_detail_m1__onfocus(this, iSeqRow) });
  $('#id_sc_field_m2_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_m2__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_normal_laboratory_detail_m2__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_normal_laboratory_detail_m2__onfocus(this, iSeqRow) });
  $('#id_sc_field_f1_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_f1__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_normal_laboratory_detail_f1__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_normal_laboratory_detail_f1__onfocus(this, iSeqRow) });
  $('#id_sc_field_f2_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_f2__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_normal_laboratory_detail_f2__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_normal_laboratory_detail_f2__onfocus(this, iSeqRow) });
  $('#id_sc_field_unit_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_unit__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_normal_laboratory_detail_unit__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_normal_laboratory_detail_unit__onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated_' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_lastupdated__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_form_normal_laboratory_detail_lastupdated__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_normal_laboratory_detail_lastupdated__onfocus(this, iSeqRow) });
  $('#id_sc_field_lastupdated__hora' + iSeqRow).bind('blur', function() { sc_form_normal_laboratory_detail_lastupdated__hora_onblur(this, iSeqRow) })
                                               .bind('change', function() { sc_form_normal_laboratory_detail_lastupdated__hora_onchange(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_normal_laboratory_detail_lastupdated__hora_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_normal_laboratory_detail_id__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_id__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_labcode__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_normal_laboratory_detail_detailname__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_detailname_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_detailname__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_detailname__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_oper__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_oper_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_oper__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_oper__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_m1__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_m1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_m1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_m1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_m2__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_m2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_m2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_m2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_f1__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_f1_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_f1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_f1__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_f2__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_f2_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_f2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_f2__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_unit__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_unit_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_unit__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_unit__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_lastupdated__onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_lastupdated_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_lastupdated__hora_onblur(oThis, iSeqRow) {
  do_ajax_form_normal_laboratory_detail_validate_lastupdated_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_lastupdated__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_lastupdated__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_normal_laboratory_detail_lastupdated__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_normal_laboratory_detail_lastupdated__hora_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_", "", status);
	displayChange_field("detailname_", "", status);
	displayChange_field("oper_", "", status);
	displayChange_field("m1_", "", status);
	displayChange_field("m2_", "", status);
	displayChange_field("f1_", "", status);
	displayChange_field("f2_", "", status);
	displayChange_field("unit_", "", status);
	displayChange_field("lastupdated_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_(row, status);
	displayChange_field_detailname_(row, status);
	displayChange_field_oper_(row, status);
	displayChange_field_m1_(row, status);
	displayChange_field_m2_(row, status);
	displayChange_field_f1_(row, status);
	displayChange_field_f2_(row, status);
	displayChange_field_unit_(row, status);
	displayChange_field_lastupdated_(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
	if ("detailname_" == field) {
		displayChange_field_detailname_(row, status);
	}
	if ("oper_" == field) {
		displayChange_field_oper_(row, status);
	}
	if ("m1_" == field) {
		displayChange_field_m1_(row, status);
	}
	if ("m2_" == field) {
		displayChange_field_m2_(row, status);
	}
	if ("f1_" == field) {
		displayChange_field_f1_(row, status);
	}
	if ("f2_" == field) {
		displayChange_field_f2_(row, status);
	}
	if ("unit_" == field) {
		displayChange_field_unit_(row, status);
	}
	if ("lastupdated_" == field) {
		displayChange_field_lastupdated_(row, status);
	}
}

function displayChange_field_id_(row, status) {
}

function displayChange_field_detailname_(row, status) {
}

function displayChange_field_oper_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_oper___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_oper_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "oper_");
	}
}

function displayChange_field_m1_(row, status) {
}

function displayChange_field_m2_(row, status) {
}

function displayChange_field_f1_(row, status) {
}

function displayChange_field_f2_(row, status) {
}

function displayChange_field_unit_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_unit___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_unit_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "unit_");
	}
}

function displayChange_field_lastupdated_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_oper_("all", "on");
	displayChange_field_unit_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_normal_laboratory_detail_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(37);
		}
	}
}
<?php

$formWidthCorrection = '';
if (false !== strpos($this->Ini->form_table_width, 'calc')) {
	$formWidthCalc = substr($this->Ini->form_table_width, strpos($this->Ini->form_table_width, '(') + 1);
	$formWidthCalc = substr($formWidthCalc, 0, strpos($formWidthCalc, ')'));
	$formWidthParts = explode(' ', $formWidthCalc);
	if (3 == count($formWidthParts) && 'px' == substr($formWidthParts[2], -2)) {
		$formWidthParts[2] = substr($formWidthParts[2], 0, -2) / 2;
		$formWidthCorrection = $formWidthParts[1] . ' ' . $formWidthParts[2];
	}
}

?>

$(window).scroll(function() {
	scSetFixedHeaders();
});

var rerunHeaderDisplay = 1;

function scSetFixedHeaders(forceDisplay) {
	if (null == forceDisplay) {
		forceDisplay = false;
	}
	var divScroll, formHeaders, headerPlaceholder;
	formHeaders = scGetHeaderRow();
	headerPlaceholder = $("#sc-id-fixedheaders-placeholder");
	if (!formHeaders) {
		headerPlaceholder.hide();
	}
	else {
		if (scIsHeaderVisible(formHeaders)) {
			headerPlaceholder.hide();
		}
		else {
			if (!headerPlaceholder.filter(":visible").length || forceDisplay) {
				scSetFixedHeadersContents(formHeaders, headerPlaceholder);
				scSetFixedHeadersSize(formHeaders);
				headerPlaceholder.show();
			}
			scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
			if (0 < rerunHeaderDisplay) {
				rerunHeaderDisplay--;
				setTimeout(function() {
					scSetFixedHeadersContents(formHeaders, headerPlaceholder);
					scSetFixedHeadersSize(formHeaders);
					headerPlaceholder.show();
					scSetFixedHeadersPosition(formHeaders, headerPlaceholder);
				}, 5);
			}
		}
	}
}

function scSetFixedHeadersPosition(formHeaders, headerPlaceholder) {
	if (formHeaders) {
		headerPlaceholder.css({"top": 0<?php echo $formWidthCorrection ?>, "left": (Math.floor(formHeaders.position().left) - $(document).scrollLeft()<?php echo $formWidthCorrection ?>) + "px"});
	}
}

function scIsHeaderVisible(formHeaders) {
	if (typeof(scIsHeaderVisibleMobile) === typeof(function(){})) { return scIsHeaderVisibleMobile(formHeaders); }
	return formHeaders.offset().top > $(document).scrollTop();
}

function scGetHeaderRow() {
	var formHeaders = $(".sc-ui-header-row").filter(":visible");
	if (!formHeaders.length) {
		formHeaders = false;
	}
	return formHeaders;
}

function scSetFixedHeadersContents(formHeaders, headerPlaceholder) {
	var i, htmlContent;
	htmlContent = "<table id=\"sc-id-fixed-headers\" class=\"scFormTable\">";
	for (i = 0; i < formHeaders.length; i++) {
		htmlContent += "<tr class=\"scFormLabelOddMult\" id=\"sc-id-headers-row-" + i + "\">" + $(formHeaders[i]).html() + "</tr>";
	}
	htmlContent += "</table>";
	headerPlaceholder.html(htmlContent);
}

function scSetFixedHeadersSize(formHeaders) {
	var i, j, headerColumns, formColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;
	tableOriginal = $("#hidden_bloco_0");
	tableHeaders = document.getElementById("sc-id-fixed-headers");
	$(tableHeaders).css("width", $(tableOriginal).outerWidth());
	for (i = 0; i < formHeaders.length; i++) {
		headerColumns = $("#sc-id-fixed-headers-row-" + i).find("td");
		formColumns = $(formHeaders[i]).find("td");
		for (j = 0; j < formColumns.length; j++) {
			if (window.getComputedStyle(formColumns[j])) {
				cellWidth = window.getComputedStyle(formColumns[j]).width;
				cellHeight = window.getComputedStyle(formColumns[j]).height;
			}
			else {
				cellWidth = $(formColumns[j]).width() + "px";
				cellHeight = $(formColumns[j]).height() + "px";
			}
			$(headerColumns[j]).css({
				"width": cellWidth,
				"height": cellHeight
			});
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_lastupdated_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_lastupdated_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['lastupdated_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdated_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_normal_laboratory_detail_validate_lastupdated_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['lastupdated_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_normal_laboratory_detail')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
});

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "oper_" == specificField) {
    scJQSelect2Add_oper_(seqRow);
  }
  if (null == specificField || "unit_" == specificField) {
    scJQSelect2Add_unit_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_oper_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_oper__obj" : "#id_sc_field_oper_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_oper__obj',
      dropdownCssClass: 'css_oper__obj',
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

function scJQSelect2Add_unit_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_unit__obj" : "#id_sc_field_unit_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_unit__obj',
      dropdownCssClass: 'css_unit__obj',
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
  setTimeout(function () { if ('function' == typeof displayChange_field_oper_) { displayChange_field_oper_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_unit_) { displayChange_field_unit_(iLine, "on"); } }, 150);
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

