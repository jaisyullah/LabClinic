
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
  scEventControl_data["login" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pswd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["confirm_pswd" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["active" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["groups" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["login" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["login" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pswd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pswd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["confirm_pswd" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["confirm_pswd" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["active" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["active" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["groups" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["groups" + iSeqRow]["change"]) {
    return true;
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
  $('#id_sc_field_login' + iSeqRow).bind('blur', function() { sc_lmms_form_edit_users_login_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_lmms_form_edit_users_login_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_lmms_form_edit_users_login_onfocus(this, iSeqRow) });
  $('#id_sc_field_pswd' + iSeqRow).bind('blur', function() { sc_lmms_form_edit_users_pswd_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_lmms_form_edit_users_pswd_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_lmms_form_edit_users_pswd_onfocus(this, iSeqRow) });
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_lmms_form_edit_users_name_onblur(this, iSeqRow) })
                                  .bind('change', function() { sc_lmms_form_edit_users_name_onchange(this, iSeqRow) })
                                  .bind('focus', function() { sc_lmms_form_edit_users_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_email' + iSeqRow).bind('blur', function() { sc_lmms_form_edit_users_email_onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_lmms_form_edit_users_email_onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_lmms_form_edit_users_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_active' + iSeqRow).bind('blur', function() { sc_lmms_form_edit_users_active_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_lmms_form_edit_users_active_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_lmms_form_edit_users_active_onfocus(this, iSeqRow) });
  $('#id_sc_field_activation_code' + iSeqRow).bind('change', function() { sc_lmms_form_edit_users_activation_code_onchange(this, iSeqRow) });
  $('#id_sc_field_priv_admin' + iSeqRow).bind('change', function() { sc_lmms_form_edit_users_priv_admin_onchange(this, iSeqRow) });
  $('#id_sc_field_groups' + iSeqRow).bind('blur', function() { sc_lmms_form_edit_users_groups_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_lmms_form_edit_users_groups_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_lmms_form_edit_users_groups_onfocus(this, iSeqRow) });
  $('#id_sc_field_confirm_pswd' + iSeqRow).bind('blur', function() { sc_lmms_form_edit_users_confirm_pswd_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_lmms_form_edit_users_confirm_pswd_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_lmms_form_edit_users_confirm_pswd_onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-active' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_lmms_form_edit_users_login_onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_edit_users_validate_login();
  scCssBlur(oThis);
}

function sc_lmms_form_edit_users_login_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_login_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_lmms_form_edit_users_pswd_onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_edit_users_validate_pswd();
  scCssBlur(oThis);
}

function sc_lmms_form_edit_users_pswd_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_pswd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_lmms_form_edit_users_name_onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_edit_users_validate_name();
  scCssBlur(oThis);
}

function sc_lmms_form_edit_users_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_lmms_form_edit_users_email_onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_edit_users_validate_email();
  scCssBlur(oThis);
}

function sc_lmms_form_edit_users_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_lmms_form_edit_users_active_onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_edit_users_validate_active();
  scCssBlur(oThis);
}

function sc_lmms_form_edit_users_active_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_active_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_lmms_form_edit_users_activation_code_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_priv_admin_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_groups_onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_edit_users_validate_groups();
  scCssBlur(oThis);
}

function sc_lmms_form_edit_users_groups_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_groups_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_lmms_form_edit_users_confirm_pswd_onblur(oThis, iSeqRow) {
  do_ajax_lmms_form_edit_users_validate_confirm_pswd();
  scCssBlur(oThis);
}

function sc_lmms_form_edit_users_confirm_pswd_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_lmms_form_edit_users_confirm_pswd_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("login", "", status);
	displayChange_field("pswd", "", status);
	displayChange_field("confirm_pswd", "", status);
	displayChange_field("name", "", status);
	displayChange_field("email", "", status);
	displayChange_field("active", "", status);
	displayChange_field("groups", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_login(row, status);
	displayChange_field_pswd(row, status);
	displayChange_field_confirm_pswd(row, status);
	displayChange_field_name(row, status);
	displayChange_field_email(row, status);
	displayChange_field_active(row, status);
	displayChange_field_groups(row, status);
}

function displayChange_field(field, row, status) {
	if ("login" == field) {
		displayChange_field_login(row, status);
	}
	if ("pswd" == field) {
		displayChange_field_pswd(row, status);
	}
	if ("confirm_pswd" == field) {
		displayChange_field_confirm_pswd(row, status);
	}
	if ("name" == field) {
		displayChange_field_name(row, status);
	}
	if ("email" == field) {
		displayChange_field_email(row, status);
	}
	if ("active" == field) {
		displayChange_field_active(row, status);
	}
	if ("groups" == field) {
		displayChange_field_groups(row, status);
	}
}

function displayChange_field_login(row, status) {
}

function displayChange_field_pswd(row, status) {
}

function displayChange_field_confirm_pswd(row, status) {
}

function displayChange_field_name(row, status) {
}

function displayChange_field_email(row, status) {
}

function displayChange_field_active(row, status) {
}

function displayChange_field_groups(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_lmms_form_edit_users_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'lmms_form_edit_users')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

