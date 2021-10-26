
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
      case 'name':
      case 'headline':
      case 'currency':
      case 'footer':
      case 'country':
      case 'officer':
      case 'id':
      case 'logo':
        sc_exib_ocult_pag('form_profile_mob_form0');
        break;
      case 'facebook':
      case 'instagram':
      case 'twitter':
      case 'youtube':
        sc_exib_ocult_pag('form_profile_mob_form1');
        break;
      case 'address':
      case 'phone':
      case 'mail':
      case 'long':
      case 'lat':
        sc_exib_ocult_pag('form_profile_mob_form2');
        break;
      case 'aboutus':
      case 'privacypolicy':
      case 'terms':
      case 'healthguide':
        sc_exib_ocult_pag('form_profile_mob_form3');
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
  scEventControl_data["name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["headline" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["currency" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["footer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["country" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["officer" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["logo" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["facebook" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["instagram" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["twitter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["youtube" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["address" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["mail" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["long" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["lat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["aboutus" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["privacypolicy" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["terms" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["healthguide" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["headline" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["headline" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["currency" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["currency" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["footer" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["footer" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["country" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["facebook" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["facebook" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["instagram" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["instagram" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["twitter" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["twitter" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["youtube" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["youtube" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["address" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["mail" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["mail" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["long" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["long" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["lat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["lat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["aboutus" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aboutus" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["privacypolicy" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["privacypolicy" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["terms" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["terms" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["healthguide" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["healthguide" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("currency" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("country" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("deliverytype" + iSeq == fieldName) {
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
  $('#id_sc_field_name' + iSeqRow).bind('blur', function() { sc_form_profile_name_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_profile_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_headline' + iSeqRow).bind('blur', function() { sc_form_profile_headline_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_profile_headline_onfocus(this, iSeqRow) });
  $('#id_sc_field_address' + iSeqRow).bind('blur', function() { sc_form_profile_address_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_profile_address_onfocus(this, iSeqRow) });
  $('#id_sc_field_long' + iSeqRow).bind('blur', function() { sc_form_profile_long_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_profile_long_onfocus(this, iSeqRow) });
  $('#id_sc_field_lat' + iSeqRow).bind('blur', function() { sc_form_profile_lat_onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_profile_lat_onfocus(this, iSeqRow) });
  $('#id_sc_field_logo' + iSeqRow).bind('blur', function() { sc_form_profile_logo_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_profile_logo_onfocus(this, iSeqRow) });
  $('#id_sc_field_aboutus' + iSeqRow).bind('blur', function() { sc_form_profile_aboutus_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_profile_aboutus_onfocus(this, iSeqRow) });
  $('#id_sc_field_privacypolicy' + iSeqRow).bind('blur', function() { sc_form_profile_privacypolicy_onblur(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_profile_privacypolicy_onfocus(this, iSeqRow) });
  $('#id_sc_field_healthguide' + iSeqRow).bind('blur', function() { sc_form_profile_healthguide_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_profile_healthguide_onfocus(this, iSeqRow) });
  $('#id_sc_field_terms' + iSeqRow).bind('blur', function() { sc_form_profile_terms_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_profile_terms_onfocus(this, iSeqRow) });
  $('#id_sc_field_footer' + iSeqRow).bind('blur', function() { sc_form_profile_footer_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_profile_footer_onfocus(this, iSeqRow) });
  $('#id_sc_field_phone' + iSeqRow).bind('blur', function() { sc_form_profile_phone_onblur(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_profile_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_mail' + iSeqRow).bind('blur', function() { sc_form_profile_mail_onblur(this, iSeqRow) })
                                  .bind('focus', function() { sc_form_profile_mail_onfocus(this, iSeqRow) });
  $('#id_sc_field_facebook' + iSeqRow).bind('blur', function() { sc_form_profile_facebook_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_profile_facebook_onfocus(this, iSeqRow) });
  $('#id_sc_field_instagram' + iSeqRow).bind('blur', function() { sc_form_profile_instagram_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_profile_instagram_onfocus(this, iSeqRow) });
  $('#id_sc_field_twitter' + iSeqRow).bind('blur', function() { sc_form_profile_twitter_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_profile_twitter_onfocus(this, iSeqRow) });
  $('#id_sc_field_youtube' + iSeqRow).bind('blur', function() { sc_form_profile_youtube_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_profile_youtube_onfocus(this, iSeqRow) });
  $('#id_sc_field_id' + iSeqRow).bind('blur', function() { sc_form_profile_id_onblur(this, iSeqRow) })
                                .bind('focus', function() { sc_form_profile_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_currency' + iSeqRow).bind('blur', function() { sc_form_profile_currency_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_profile_currency_onfocus(this, iSeqRow) });
  $('#id_sc_field_country' + iSeqRow).bind('blur', function() { sc_form_profile_country_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_profile_country_onfocus(this, iSeqRow) });
  $('#id_sc_field_officer' + iSeqRow).bind('blur', function() { sc_form_profile_officer_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_profile_officer_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-slidertype' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_profile_name_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_name();
  scCssBlur(oThis);
}

function sc_form_profile_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_headline_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_headline();
  scCssBlur(oThis);
}

function sc_form_profile_headline_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_address_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_address();
  scCssBlur(oThis);
}

function sc_form_profile_address_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_long_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_long();
  scCssBlur(oThis);
}

function sc_form_profile_long_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_lat_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_lat();
  scCssBlur(oThis);
}

function sc_form_profile_lat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_logo_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_profile_logo_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function sc_form_profile_aboutus_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_aboutus();
  scCssBlur(oThis);
}

function sc_form_profile_aboutus_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_privacypolicy_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_privacypolicy();
  scCssBlur(oThis);
}

function sc_form_profile_privacypolicy_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_healthguide_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_healthguide();
  scCssBlur(oThis);
}

function sc_form_profile_healthguide_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_terms_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_terms();
  scCssBlur(oThis);
}

function sc_form_profile_terms_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_footer_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_footer();
  scCssBlur(oThis);
}

function sc_form_profile_footer_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_phone();
  scCssBlur(oThis);
}

function sc_form_profile_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_mail_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_mail();
  scCssBlur(oThis);
}

function sc_form_profile_mail_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_facebook_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_facebook();
  scCssBlur(oThis);
}

function sc_form_profile_facebook_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_instagram_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_instagram();
  scCssBlur(oThis);
}

function sc_form_profile_instagram_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_twitter_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_twitter();
  scCssBlur(oThis);
}

function sc_form_profile_twitter_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_youtube_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_youtube();
  scCssBlur(oThis);
}

function sc_form_profile_youtube_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_id_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_id();
  scCssBlur(oThis);
}

function sc_form_profile_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_currency_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_currency();
  scCssBlur(oThis);
}

function sc_form_profile_currency_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_country_onblur(oThis, iSeqRow) {
  do_ajax_form_profile_mob_validate_country();
  scCssBlur(oThis);
}

function sc_form_profile_country_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_profile_officer_onblur(oThis, iSeqRow) {
  scCssBlur(oThis);
}

function sc_form_profile_officer_onfocus(oThis, iSeqRow) {
  scCssFocus(oThis);
}

function displayChange_page(page, status) {
	if ("0" == page) {
		displayChange_page_0(status);
	}
	if ("1" == page) {
		displayChange_page_1(status);
	}
	if ("2" == page) {
		displayChange_page_2(status);
	}
	if ("3" == page) {
		displayChange_page_3(status);
	}
}

function displayChange_page_0(status) {
	displayChange_block("0", status);
	displayChange_block("1", status);
}

function displayChange_page_1(status) {
	displayChange_block("2", status);
}

function displayChange_page_2(status) {
	displayChange_block("3", status);
}

function displayChange_page_3(status) {
	displayChange_block("4", status);
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
	if ("4" == block) {
		displayChange_block_4(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("name", "", status);
	displayChange_field("headline", "", status);
	displayChange_field("currency", "", status);
	displayChange_field("footer", "", status);
	displayChange_field("country", "", status);
	displayChange_field("officer", "", status);
	displayChange_field("id", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("logo", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("facebook", "", status);
	displayChange_field("instagram", "", status);
	displayChange_field("twitter", "", status);
	displayChange_field("youtube", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("address", "", status);
	displayChange_field("phone", "", status);
	displayChange_field("mail", "", status);
	displayChange_field("long", "", status);
	displayChange_field("lat", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("aboutus", "", status);
	displayChange_field("privacypolicy", "", status);
	displayChange_field("terms", "", status);
	displayChange_field("healthguide", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_name(row, status);
	displayChange_field_headline(row, status);
	displayChange_field_currency(row, status);
	displayChange_field_footer(row, status);
	displayChange_field_country(row, status);
	displayChange_field_officer(row, status);
	displayChange_field_id(row, status);
	displayChange_field_logo(row, status);
	displayChange_field_facebook(row, status);
	displayChange_field_instagram(row, status);
	displayChange_field_twitter(row, status);
	displayChange_field_youtube(row, status);
	displayChange_field_address(row, status);
	displayChange_field_phone(row, status);
	displayChange_field_mail(row, status);
	displayChange_field_long(row, status);
	displayChange_field_lat(row, status);
	displayChange_field_aboutus(row, status);
	displayChange_field_privacypolicy(row, status);
	displayChange_field_terms(row, status);
	displayChange_field_healthguide(row, status);
}

function displayChange_field(field, row, status) {
	if ("name" == field) {
		displayChange_field_name(row, status);
	}
	if ("headline" == field) {
		displayChange_field_headline(row, status);
	}
	if ("currency" == field) {
		displayChange_field_currency(row, status);
	}
	if ("footer" == field) {
		displayChange_field_footer(row, status);
	}
	if ("country" == field) {
		displayChange_field_country(row, status);
	}
	if ("officer" == field) {
		displayChange_field_officer(row, status);
	}
	if ("id" == field) {
		displayChange_field_id(row, status);
	}
	if ("logo" == field) {
		displayChange_field_logo(row, status);
	}
	if ("facebook" == field) {
		displayChange_field_facebook(row, status);
	}
	if ("instagram" == field) {
		displayChange_field_instagram(row, status);
	}
	if ("twitter" == field) {
		displayChange_field_twitter(row, status);
	}
	if ("youtube" == field) {
		displayChange_field_youtube(row, status);
	}
	if ("address" == field) {
		displayChange_field_address(row, status);
	}
	if ("phone" == field) {
		displayChange_field_phone(row, status);
	}
	if ("mail" == field) {
		displayChange_field_mail(row, status);
	}
	if ("long" == field) {
		displayChange_field_long(row, status);
	}
	if ("lat" == field) {
		displayChange_field_lat(row, status);
	}
	if ("aboutus" == field) {
		displayChange_field_aboutus(row, status);
	}
	if ("privacypolicy" == field) {
		displayChange_field_privacypolicy(row, status);
	}
	if ("terms" == field) {
		displayChange_field_terms(row, status);
	}
	if ("healthguide" == field) {
		displayChange_field_healthguide(row, status);
	}
}

function displayChange_field_name(row, status) {
}

function displayChange_field_headline(row, status) {
}

function displayChange_field_currency(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_currency__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_currency" + row).select2("destroy");
		}
		scJQSelect2Add(row, "currency");
	}
}

function displayChange_field_footer(row, status) {
}

function displayChange_field_country(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_country__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_country" + row).select2("destroy");
		}
		scJQSelect2Add(row, "country");
	}
}

function displayChange_field_officer(row, status) {
}

function displayChange_field_id(row, status) {
}

function displayChange_field_logo(row, status) {
}

function displayChange_field_facebook(row, status) {
}

function displayChange_field_instagram(row, status) {
}

function displayChange_field_twitter(row, status) {
}

function displayChange_field_youtube(row, status) {
}

function displayChange_field_address(row, status) {
}

function displayChange_field_phone(row, status) {
}

function displayChange_field_mail(row, status) {
}

function displayChange_field_long(row, status) {
}

function displayChange_field_lat(row, status) {
}

function displayChange_field_aboutus(row, status) {
}

function displayChange_field_privacypolicy(row, status) {
}

function displayChange_field_terms(row, status) {
}

function displayChange_field_healthguide(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_currency("all", "on");
	displayChange_field_country("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_profile_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(24);
		}
	}
}
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
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['aboutus']) && $this->nmgp_cmp_readonly['aboutus'] == 'on')
{
    unset($this->nmgp_cmp_readonly['aboutus']);
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
  editor_selector: "mceEditor_aboutus" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="aboutus' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['privacypolicy']) && $this->nmgp_cmp_readonly['privacypolicy'] == 'on')
{
    unset($this->nmgp_cmp_readonly['privacypolicy']);
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
  editor_selector: "mceEditor_privacypolicy" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="privacypolicy' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['terms']) && $this->nmgp_cmp_readonly['terms'] == 'on')
{
    unset($this->nmgp_cmp_readonly['terms']);
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
  editor_selector: "mceEditor_terms" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="terms' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
 var baseData = {
  mode: "textareas",
  theme: "modern",
  browser_spellcheck : true,
  paste_data_images : true,
<?php
if ('novo' != $this->nmgp_opcao && isset($this->nmgp_cmp_readonly['healthguide']) && $this->nmgp_cmp_readonly['healthguide'] == 'on')
{
    unset($this->nmgp_cmp_readonly['healthguide']);
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
  editor_selector: "mceEditor_healthguide" + iSeqRow,
  setup: function(ed) {
    ed.on("init", function (e) {
      if ($('textarea[name="healthguide' + iSeqRow + '"]').prop('disabled') == true) {
        ed.setMode("readonly");
      }
    });
  }
 };
 var data = 'function' === typeof Object.assign ? Object.assign({}, scJQHtmlEditorData(baseData)) : baseData;
 tinyMCE.init(data);
} // scJQHtmlEditorAdd

function scJQUploadAdd(iSeqRow) {
  $("#id_sc_field_officer" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_profile_mob_ul_save.php",
    dropZone: "",
    formData: function() {
      return [
        {name: 'param_field', value: 'officer'},
        {name: 'param_seq', value: '<?php echo $this->Ini->sc_page; ?>'},
        {name: 'upload_file_row', value: iSeqRow}
      ];
    },
    progress: function(e, data) {
      var loader, progress;
      if (data.lengthComputable && window.FormData !== undefined) {
        loader = $("#id_img_loader_officer" + iSeqRow);
        loaderContent = $("#id_img_loader_officer" + iSeqRow + " .scProgressBarLoading");
        loaderContent.html("&nbsp;");
        progress = parseInt(data.loaded / data.total * 100, 10);
        loader.show().find("div").css("width", progress + "%");
      }
      else {
        loader = $("#id_ajax_loader_officer" + iSeqRow);
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
        $("#id_img_loader_officer" + iSeqRow).hide();
      }
      else
      {
        $("#id_ajax_loader_officer" + iSeqRow).hide();
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
      $("#id_sc_field_officer" + iSeqRow).val("");
      $("#id_sc_field_officer_ul_name" + iSeqRow).val(fileData[0].sc_ul_name);
      $("#id_sc_field_officer_ul_type" + iSeqRow).val(fileData[0].type);
      var_ajax_img_officer = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_image_source;
      var_ajax_img_thumb = '<?php echo $this->Ini->path_imag_temp; ?>/' + fileData[0].sc_thumb_prot;
      thumbDisplay = ("" == var_ajax_img_officer) ? "none" : "";
      $("#id_ajax_img_officer" + iSeqRow).attr("src", var_ajax_img_thumb);
      $("#id_ajax_img_officer" + iSeqRow).css("display", thumbDisplay);
      if (document.F1.temp_out1_officer) {
        document.F1.temp_out_officer.value = var_ajax_img_thumb;
        document.F1.temp_out1_officer.value = var_ajax_img_officer;
      }
      else if (document.F1.temp_out_officer) {
        document.F1.temp_out_officer.value = var_ajax_img_officer;
      }
      checkDisplay = ("" == fileData[0].sc_random_prot.substr(12)) ? "none" : "";
      $("#chk_ajax_img_officer" + iSeqRow).css("display", checkDisplay);
      $("#txt_ajax_img_officer" + iSeqRow).html(fileData[0].name);
      $("#txt_ajax_img_officer" + iSeqRow).css("display", checkDisplay);
      $("#id_ajax_link_officer" + iSeqRow).html(fileData[0].sc_random_prot.substr(12));
    }
  });

  $("#id_sc_field_logo" + iSeqRow).fileupload({
    datatype: "json",
    url: "form_profile_mob_ul_save.php",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_profile_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
  if (null == specificField || "currency" == specificField) {
    scJQSelect2Add_currency(seqRow);
  }
  if (null == specificField || "country" == specificField) {
    scJQSelect2Add_country(seqRow);
  }
  if (null == specificField || "deliverytype" == specificField) {
    scJQSelect2Add_deliverytype(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_currency(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_currency_obj" : "#id_sc_field_currency" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_currency_obj',
      dropdownCssClass: 'css_currency_obj',
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

function scJQSelect2Add_country(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_country_obj" : "#id_sc_field_country" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_country_obj',
      dropdownCssClass: 'css_country_obj',
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

function scJQSelect2Add_deliverytype(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_deliverytype_obj" : "#id_sc_field_deliverytype" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_deliverytype_obj',
      dropdownCssClass: 'css_deliverytype_obj',
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
  scJQHtmlEditorAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_currency) { displayChange_field_currency(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_country) { displayChange_field_country(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_deliverytype) { displayChange_field_deliverytype(iLine, "on"); } }, 150);
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
