
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

  scJQCheckboxControl_general('')
  $('.sc-ui-checkbox-all-all').click(function() { scJQCheckboxControl('__ALL__', '__ALL__', this); });
  $('.sc-ui-checkbox-record-all').click(function() { scJQCheckboxControl('__ALL__', '__REC__', this); });

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
  scEventControl_data["app_name_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_access_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_insert_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_delete_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_update_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_export_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["priv_print_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["app_name_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["app_name_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_access_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_access_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_insert_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_insert_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_delete_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_delete_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_update_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_update_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_export_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_export_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["priv_print_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["priv_print_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_group_id_' + iSeqRow).bind('change', function() { sc_lmms_form_sec_groups_apps_group_id__onchange(this, iSeqRow) });
  $('#id_sc_field_app_name_' + iSeqRow).bind('blur', function() { sc_lmms_form_sec_groups_apps_app_name__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_lmms_form_sec_groups_apps_app_name__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_lmms_form_sec_groups_apps_app_name__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_access_' + iSeqRow).bind('blur', function() { sc_lmms_form_sec_groups_apps_priv_access__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_lmms_form_sec_groups_apps_priv_access__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_lmms_form_sec_groups_apps_priv_access__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_insert_' + iSeqRow).bind('blur', function() { sc_lmms_form_sec_groups_apps_priv_insert__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_lmms_form_sec_groups_apps_priv_insert__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_lmms_form_sec_groups_apps_priv_insert__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_delete_' + iSeqRow).bind('blur', function() { sc_lmms_form_sec_groups_apps_priv_delete__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_lmms_form_sec_groups_apps_priv_delete__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_lmms_form_sec_groups_apps_priv_delete__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_update_' + iSeqRow).bind('blur', function() { sc_lmms_form_sec_groups_apps_priv_update__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_lmms_form_sec_groups_apps_priv_update__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_lmms_form_sec_groups_apps_priv_update__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_export_' + iSeqRow).bind('blur', function() { sc_lmms_form_sec_groups_apps_priv_export__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_lmms_form_sec_groups_apps_priv_export__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_lmms_form_sec_groups_apps_priv_export__onfocus(this, iSeqRow) });
  $('#id_sc_field_priv_print_' + iSeqRow).bind('blur', function() { sc_lmms_form_sec_groups_apps_priv_print__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_lmms_form_sec_groups_apps_priv_print__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_lmms_form_sec_groups_apps_priv_print__onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-priv_access_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-priv_insert_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-priv_delete_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-priv_update_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-priv_export_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-priv_print_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_lmms_form_sec_groups_apps_group_id__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_sec_groups_apps_app_name__onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_sec_groups_apps_validate_app_name_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_app_name__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_lmms_form_sec_groups_apps_app_name__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_access__onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_sec_groups_apps_validate_priv_access_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_access__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_access__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_insert__onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_sec_groups_apps_validate_priv_insert_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_insert__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_insert__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_delete__onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_sec_groups_apps_validate_priv_delete_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_delete__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_delete__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_update__onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_sec_groups_apps_validate_priv_update_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_update__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_update__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_export__onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_sec_groups_apps_validate_priv_export_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_export__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_export__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_print__onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_sec_groups_apps_validate_priv_print_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_print__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_lmms_form_sec_groups_apps_priv_print__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("app_name_", "", status);
	displayChange_field("priv_access_", "", status);
	displayChange_field("priv_insert_", "", status);
	displayChange_field("priv_delete_", "", status);
	displayChange_field("priv_update_", "", status);
	displayChange_field("priv_export_", "", status);
	displayChange_field("priv_print_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_app_name_(row, status);
	displayChange_field_priv_access_(row, status);
	displayChange_field_priv_insert_(row, status);
	displayChange_field_priv_delete_(row, status);
	displayChange_field_priv_update_(row, status);
	displayChange_field_priv_export_(row, status);
	displayChange_field_priv_print_(row, status);
}

function displayChange_field(field, row, status) {
	if ("app_name_" == field) {
		displayChange_field_app_name_(row, status);
	}
	if ("priv_access_" == field) {
		displayChange_field_priv_access_(row, status);
	}
	if ("priv_insert_" == field) {
		displayChange_field_priv_insert_(row, status);
	}
	if ("priv_delete_" == field) {
		displayChange_field_priv_delete_(row, status);
	}
	if ("priv_update_" == field) {
		displayChange_field_priv_update_(row, status);
	}
	if ("priv_export_" == field) {
		displayChange_field_priv_export_(row, status);
	}
	if ("priv_print_" == field) {
		displayChange_field_priv_print_(row, status);
	}
}

function displayChange_field_app_name_(row, status) {
}

function displayChange_field_priv_access_(row, status) {
}

function displayChange_field_priv_insert_(row, status) {
}

function displayChange_field_priv_delete_(row, status) {
}

function displayChange_field_priv_update_(row, status) {
}

function displayChange_field_priv_export_(row, status) {
}

function displayChange_field_priv_print_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_lmms_form_sec_groups_apps_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(33);
		}
	}
}
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'lmms_form_sec_groups_apps')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scJQCheckboxControl_general(mainContainer) {
    $(mainContainer + '.sc-ui-checkbox-priv_access_-control').click(function() { scJQCheckboxControl('priv_access_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_insert_-control').click(function() { scJQCheckboxControl('priv_insert_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_delete_-control').click(function() { scJQCheckboxControl('priv_delete_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_update_-control').click(function() { scJQCheckboxControl('priv_update_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_export_-control').click(function() { scJQCheckboxControl('priv_export_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-priv_print_-control').click(function() { scJQCheckboxControl('priv_print_', '__ALL__', this); });
    $('.sc-ui-checkbox-all-all').click(function() { scJQCheckboxControl('__ALL__', '__ALL__', this); });
    $('.sc-ui-checkbox-record-all').click(function() { scJQCheckboxControl('__ALL__', '__REC__', this); });
}

function scJQCheckboxControl_updateShow() {
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_access_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_access_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_insert_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_insert_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_delete_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_delete_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_update_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_update_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_export_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_export_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_print_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_print_-control').prop("checked"));
}

function scJQCheckboxControl_updateHide() {
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_access_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_access_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_insert_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_insert_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_delete_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_delete_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_update_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_update_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_export_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_export_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-priv_print_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-priv_print_-control').prop("checked"));
}

function scJQCheckboxControl(sColumn, sSeqRow, oCheckbox) {
  var iSeqRow = '';

  if ('__ALL__' == sColumn || 'priv_access_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_access_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_access_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_insert_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_insert_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_insert_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_delete_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_delete_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_delete_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_update_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_update_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_update_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_export_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_export_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_export_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'priv_print_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_priv_print_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'priv_print_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

} // scJQCheckboxControl

function scJQCheckboxControl_priv_access_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_access_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_access_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_access_

function scJQCheckboxControl_priv_insert_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_insert_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_insert_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_insert_

function scJQCheckboxControl_priv_delete_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_delete_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_delete_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_delete_

function scJQCheckboxControl_priv_update_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_update_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_update_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_update_

function scJQCheckboxControl_priv_export_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_export_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_export_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_export_

function scJQCheckboxControl_priv_print_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-priv_print_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-priv_print_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_priv_print_

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

