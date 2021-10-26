
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
  scEventControl_data["pbm_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["pbm_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pbm_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_result_laboratory_pbm_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_result_laboratory_pbm_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_result_laboratory_pbm_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_trancode_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_trancode__onchange(this, iSeqRow) });
  $('#id_sc_field_serviceid_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_serviceid__onchange(this, iSeqRow) });
  $('#id_sc_field_parameter_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_parameter__onchange(this, iSeqRow) });
  $('#id_sc_field_subparameter_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_subparameter__onchange(this, iSeqRow) });
  $('#id_sc_field_standardvalue1_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_standardvalue1__onchange(this, iSeqRow) });
  $('#id_sc_field_standardvalue2_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_standardvalue2__onchange(this, iSeqRow) });
  $('#id_sc_field_standardseparator_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_standardseparator__onchange(this, iSeqRow) });
  $('#id_sc_field_staffid_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_staffid__onchange(this, iSeqRow) });
  $('#id_sc_field_trandate_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_trandate__onchange(this, iSeqRow) });
  $('#id_sc_field_trandate__hora' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_trandate__hora_onchange(this, iSeqRow) });
  $('#id_sc_field_result_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_result__onchange(this, iSeqRow) });
  $('#id_sc_field_marked_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_marked__onchange(this, iSeqRow) });
  $('#id_sc_field_unit_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_unit__onchange(this, iSeqRow) });
  $('#id_sc_field_standardvalue_' + iSeqRow).bind('change', function() { sc_form_result_laboratory_pbm_standardvalue__onchange(this, iSeqRow) });
  $('#id_sc_field_pbm_' + iSeqRow).bind('blur', function() { sc_form_result_laboratory_pbm_pbm__onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_form_result_laboratory_pbm_pbm__onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_result_laboratory_pbm_pbm__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_result_laboratory_pbm_id__onblur(oThis, iSeqRow) {
  do_ajax_form_result_laboratory_pbm_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_result_laboratory_pbm_id__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_result_laboratory_pbm_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_result_laboratory_pbm_trancode__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_serviceid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_parameter__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_subparameter__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_standardvalue1__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_standardvalue2__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_standardseparator__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_staffid__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_trandate__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_trandate__hora_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_result__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_marked__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_unit__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_standardvalue__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_result_laboratory_pbm_pbm__onblur(oThis, iSeqRow) {
  do_ajax_form_result_laboratory_pbm_validate_pbm_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_result_laboratory_pbm_pbm__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_form_result_laboratory_pbm_pbm__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("pbm_", "", status);
	displayChange_field("id_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_pbm_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("pbm_" == field) {
		displayChange_field_pbm_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_pbm_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_result_laboratory_pbm_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(34);
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
  $("#id_sc_field_trandate_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_trandate_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['trandate_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_result_laboratory_pbm_validate_trandate_(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

                var scJQHtmlEditorData = (function() {
                    var data = {};
                    function scJQHtmlEditorData(a, b) {
                        if (a) {
                            if (typeof(a) === typeof({})) {
                                for (var d in a) {
                                    if (a.hasOwnProperty(d)) {
                                        data[d] = a[d];
                                    }
                                }
                            } else if ((typeof(a) === typeof('')) || (typeof(a) === typeof(1))) {
                                if (b) {
                                    data[a] = b;
                                } else {
                                    if (typeof(a) === typeof('')) {
                                        var v = data;
                                        a = a.split('.');
                                        a.forEach(function (r) {
                                            v = v[r];
                                        });
                                        return v;
                                    }
                                    return data[a];
                                }
                            }
                        }
                        return data;
                    }
                    return scJQHtmlEditorData;
                }());
 function scJQHtmlEditorAdd(iSeqRow) {
<?php
$sLangTest = '';
if(is_file('../_lib/lang/arr_langs_tinymce.php'))
{
    include('../_lib/lang/arr_langs_tinymce.php');
    if(isset($Nm_arr_lang_tinymce[ $this->Ini->str_lang ]))
    {
        $sLangTest = $Nm_arr_lang_tinymce[ $this->Ini->str_lang ];
    }
}
if(empty($sLangTest))
{
    $sLangTest = 'en_GB';
}
?>
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['pbm_']) && $this->nmgp_cmp_readonly['pbm_'] == 'on')
{
    unset($this->nmgp_cmp_readonly['pbm_']);
?>
   readonly: "true",
<?php
}
else 
{
?>
   readonly: "",
<?php
}
?>
<?php
if ('yyyymmdd' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%Y{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d";
}
elseif ('mmddyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
elseif ('ddmmyyyy' == $_SESSION['scriptcase']['reg_conf']['date_format']) {
    $tinymceDateFormat = "%d{$_SESSION['scriptcase']['reg_conf']['date_sep']}%m{$_SESSION['scriptcase']['reg_conf']['date_sep']}%Y";
}
else {
    $tinymceDateFormat = "%D";
}
?>
  insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "<?php echo $tinymceDateFormat ?>"],
  relative_urls : false,
  remove_script_host : false,
  convert_urls  : true,
  language : '<?php echo $sLangTest; ?>',
  plugins : 'advlist,autolink,link,image,lists,charmap,print,preview,hr,anchor,pagebreak,searchreplace,wordcount,visualblocks,visualchars,code,fullscreen,insertdatetime,media,nonbreaking,table,directionality,emoticons,template,textcolor,paste,textcolor,colorpicker,textpattern,contextmenu',
  toolbar1: "undo,redo,separator,formatselect,separator,bold,italic,separator,alignleft,aligncenter,alignright,alignjustify,separator,bullist,numlist,outdent,indent,separator,link,image",
  statusbar : false,
  menubar : 'file edit insert view format table tools',
  toolbar_items_size: 'small',
  content_style: ".mce-container-body {text-align: center !important}",
  editor_selector: "mceEditor_pbm_" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="pbm_' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_result_laboratory_pbm')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
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

