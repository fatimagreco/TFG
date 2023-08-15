
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
      case 'anam_date':
      case 'anam_strtime':
      case 'anam_reason':
      case 'anam_diag':
      case 'pati_id':
      case 'pat_bod':
      case 'pat_name':
      case 'pat_lname':
      case 'pat_blood':
      case 'anam_career':
      case 'pat_gerens':
      case 'pat_phone':
      case 'anam_carsem':
      case 'anam_bpsys':
      case 'anam_temp':
      case 'anam_bpdia':
      case 'anam_oxy':
      case 'anam_hbeat':
      case 'anam_gluco':
      case 'anam_aller':
        sc_exib_ocult_pag('form_anamnesis_mob_form0');
        break;
      case 'tratamiento':
        sc_exib_ocult_pag('form_anamnesis_mob_form1');
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
  scEventControl_data["anam_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_strtime" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_reason" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_diag" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pati_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_bod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_lname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_blood" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_career" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_gerens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_carsem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_bpsys" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_bpdia" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_hbeat" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_temp" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_oxy" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_gluco" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_aller" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tratamiento" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["anam_date" + iSeqRow] && scEventControl_data["anam_date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_date" + iSeqRow] && scEventControl_data["anam_date" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_strtime" + iSeqRow] && scEventControl_data["anam_strtime" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_strtime" + iSeqRow] && scEventControl_data["anam_strtime" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_reason" + iSeqRow] && scEventControl_data["anam_reason" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_reason" + iSeqRow] && scEventControl_data["anam_reason" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_diag" + iSeqRow] && scEventControl_data["anam_diag" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_diag" + iSeqRow] && scEventControl_data["anam_diag" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pati_id" + iSeqRow] && scEventControl_data["pati_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pati_id" + iSeqRow] && scEventControl_data["pati_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_bod" + iSeqRow] && scEventControl_data["pat_bod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_bod" + iSeqRow] && scEventControl_data["pat_bod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_name" + iSeqRow] && scEventControl_data["pat_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_name" + iSeqRow] && scEventControl_data["pat_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_lname" + iSeqRow] && scEventControl_data["pat_lname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_lname" + iSeqRow] && scEventControl_data["pat_lname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_blood" + iSeqRow] && scEventControl_data["pat_blood" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_blood" + iSeqRow] && scEventControl_data["pat_blood" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_career" + iSeqRow] && scEventControl_data["anam_career" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_career" + iSeqRow] && scEventControl_data["anam_career" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_gerens" + iSeqRow] && scEventControl_data["pat_gerens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_gerens" + iSeqRow] && scEventControl_data["pat_gerens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_phone" + iSeqRow] && scEventControl_data["pat_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_phone" + iSeqRow] && scEventControl_data["pat_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_carsem" + iSeqRow] && scEventControl_data["anam_carsem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_carsem" + iSeqRow] && scEventControl_data["anam_carsem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_bpsys" + iSeqRow] && scEventControl_data["anam_bpsys" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_bpsys" + iSeqRow] && scEventControl_data["anam_bpsys" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_bpdia" + iSeqRow] && scEventControl_data["anam_bpdia" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_bpdia" + iSeqRow] && scEventControl_data["anam_bpdia" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_hbeat" + iSeqRow] && scEventControl_data["anam_hbeat" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_hbeat" + iSeqRow] && scEventControl_data["anam_hbeat" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_temp" + iSeqRow] && scEventControl_data["anam_temp" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_temp" + iSeqRow] && scEventControl_data["anam_temp" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_oxy" + iSeqRow] && scEventControl_data["anam_oxy" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_oxy" + iSeqRow] && scEventControl_data["anam_oxy" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_gluco" + iSeqRow] && scEventControl_data["anam_gluco" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_gluco" + iSeqRow] && scEventControl_data["anam_gluco" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_aller" + iSeqRow] && scEventControl_data["anam_aller" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_aller" + iSeqRow] && scEventControl_data["anam_aller" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tratamiento" + iSeqRow] && scEventControl_data["tratamiento" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tratamiento" + iSeqRow] && scEventControl_data["tratamiento" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("pati_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pat_blood" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("user_id" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pati_id" + iSeq == fieldName) {
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
  $('#id_sc_field_pati_id' + iSeqRow).bind('blur', function() { sc_form_anamnesis_pati_id_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_anamnesis_pati_id_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_anamnesis_pati_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_date' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_date_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_anamnesis_anam_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_strtime' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_strtime_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_anamnesis_anam_strtime_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_career' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_career_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_anamnesis_anam_career_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_carsem' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_carsem_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_anamnesis_anam_carsem_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_reason' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_reason_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_anamnesis_anam_reason_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_aller' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_aller_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_anamnesis_anam_aller_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_temp' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_temp_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_anamnesis_anam_temp_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_hbeat' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_hbeat_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_anamnesis_anam_hbeat_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_bpsys' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_bpsys_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_anamnesis_anam_bpsys_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_bpdia' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_bpdia_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_anamnesis_anam_bpdia_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_oxy' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_oxy_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_anamnesis_anam_oxy_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_gluco' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_gluco_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_anamnesis_anam_gluco_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_diag' + iSeqRow).bind('blur', function() { sc_form_anamnesis_anam_diag_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_anamnesis_anam_diag_onfocus(this, iSeqRow) });
  $('#id_sc_field_tratamiento' + iSeqRow).bind('blur', function() { sc_form_anamnesis_tratamiento_onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_anamnesis_tratamiento_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_blood' + iSeqRow).bind('blur', function() { sc_form_anamnesis_pat_blood_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_anamnesis_pat_blood_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_bod' + iSeqRow).bind('blur', function() { sc_form_anamnesis_pat_bod_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_anamnesis_pat_bod_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_gerens' + iSeqRow).bind('blur', function() { sc_form_anamnesis_pat_gerens_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_anamnesis_pat_gerens_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_lname' + iSeqRow).bind('blur', function() { sc_form_anamnesis_pat_lname_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_anamnesis_pat_lname_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_name' + iSeqRow).bind('blur', function() { sc_form_anamnesis_pat_name_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_anamnesis_pat_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_phone' + iSeqRow).bind('blur', function() { sc_form_anamnesis_pat_phone_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_anamnesis_pat_phone_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-pat_gerens' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_anamnesis_pati_id_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_pati_id();
  scCssBlur(oThis);
}

function sc_form_anamnesis_pati_id_onchange(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_event_pati_id_onchange();
}

function sc_form_anamnesis_pati_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_date_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_date();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_strtime_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_strtime();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_strtime_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_career_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_career();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_career_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_carsem_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_carsem();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_carsem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_reason_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_reason();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_reason_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_aller_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_aller();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_aller_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_temp_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_temp();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_temp_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_hbeat_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_hbeat();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_hbeat_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_bpsys_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_bpsys();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_bpsys_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_bpdia_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_bpdia();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_bpdia_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_oxy_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_oxy();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_oxy_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_gluco_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_gluco();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_gluco_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_anam_diag_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_anam_diag();
  scCssBlur(oThis);
}

function sc_form_anamnesis_anam_diag_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_tratamiento_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_tratamiento();
  scCssBlur(oThis);
}

function sc_form_anamnesis_tratamiento_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_pat_blood_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_pat_blood();
  scCssBlur(oThis);
}

function sc_form_anamnesis_pat_blood_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_pat_bod_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_pat_bod();
  scCssBlur(oThis);
}

function sc_form_anamnesis_pat_bod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_pat_gerens_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_pat_gerens();
  scCssBlur(oThis);
}

function sc_form_anamnesis_pat_gerens_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_pat_lname_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_pat_lname();
  scCssBlur(oThis);
}

function sc_form_anamnesis_pat_lname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_pat_name_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_pat_name();
  scCssBlur(oThis);
}

function sc_form_anamnesis_pat_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_anamnesis_pat_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_anamnesis_mob_validate_pat_phone();
  scCssBlur(oThis);
}

function sc_form_anamnesis_pat_phone_onfocus(oThis, iSeqRow) {
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
	displayChange_block("2", status);
	displayChange_block("3", status);
}

function displayChange_page_1(status) {
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
	displayChange_field("anam_date", "", status);
	displayChange_field("anam_strtime", "", status);
	displayChange_field("anam_reason", "", status);
	displayChange_field("anam_diag", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("pati_id", "", status);
	displayChange_field("pat_bod", "", status);
	displayChange_field("pat_name", "", status);
	displayChange_field("pat_lname", "", status);
	displayChange_field("pat_blood", "", status);
	displayChange_field("anam_career", "", status);
	displayChange_field("pat_gerens", "", status);
	displayChange_field("pat_phone", "", status);
	displayChange_field("anam_carsem", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("anam_bpsys", "", status);
	displayChange_field("anam_temp", "", status);
	displayChange_field("anam_bpdia", "", status);
	displayChange_field("anam_oxy", "", status);
	displayChange_field("anam_hbeat", "", status);
	displayChange_field("anam_gluco", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("anam_aller", "", status);
}

function displayChange_block_4(status) {
	displayChange_field("tratamiento", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_anam_date(row, status);
	displayChange_field_anam_strtime(row, status);
	displayChange_field_anam_reason(row, status);
	displayChange_field_anam_diag(row, status);
	displayChange_field_pati_id(row, status);
	displayChange_field_pat_bod(row, status);
	displayChange_field_pat_name(row, status);
	displayChange_field_pat_lname(row, status);
	displayChange_field_pat_blood(row, status);
	displayChange_field_anam_career(row, status);
	displayChange_field_pat_gerens(row, status);
	displayChange_field_pat_phone(row, status);
	displayChange_field_anam_carsem(row, status);
	displayChange_field_anam_bpsys(row, status);
	displayChange_field_anam_bpdia(row, status);
	displayChange_field_anam_hbeat(row, status);
	displayChange_field_anam_temp(row, status);
	displayChange_field_anam_oxy(row, status);
	displayChange_field_anam_gluco(row, status);
	displayChange_field_anam_aller(row, status);
	displayChange_field_tratamiento(row, status);
}

function displayChange_field(field, row, status) {
	if ("anam_date" == field) {
		displayChange_field_anam_date(row, status);
	}
	if ("anam_strtime" == field) {
		displayChange_field_anam_strtime(row, status);
	}
	if ("anam_reason" == field) {
		displayChange_field_anam_reason(row, status);
	}
	if ("anam_diag" == field) {
		displayChange_field_anam_diag(row, status);
	}
	if ("pati_id" == field) {
		displayChange_field_pati_id(row, status);
	}
	if ("pat_bod" == field) {
		displayChange_field_pat_bod(row, status);
	}
	if ("pat_name" == field) {
		displayChange_field_pat_name(row, status);
	}
	if ("pat_lname" == field) {
		displayChange_field_pat_lname(row, status);
	}
	if ("pat_blood" == field) {
		displayChange_field_pat_blood(row, status);
	}
	if ("anam_career" == field) {
		displayChange_field_anam_career(row, status);
	}
	if ("pat_gerens" == field) {
		displayChange_field_pat_gerens(row, status);
	}
	if ("pat_phone" == field) {
		displayChange_field_pat_phone(row, status);
	}
	if ("anam_carsem" == field) {
		displayChange_field_anam_carsem(row, status);
	}
	if ("anam_bpsys" == field) {
		displayChange_field_anam_bpsys(row, status);
	}
	if ("anam_bpdia" == field) {
		displayChange_field_anam_bpdia(row, status);
	}
	if ("anam_hbeat" == field) {
		displayChange_field_anam_hbeat(row, status);
	}
	if ("anam_temp" == field) {
		displayChange_field_anam_temp(row, status);
	}
	if ("anam_oxy" == field) {
		displayChange_field_anam_oxy(row, status);
	}
	if ("anam_gluco" == field) {
		displayChange_field_anam_gluco(row, status);
	}
	if ("anam_aller" == field) {
		displayChange_field_anam_aller(row, status);
	}
	if ("tratamiento" == field) {
		displayChange_field_tratamiento(row, status);
	}
}

function displayChange_field_anam_date(row, status) {
    var fieldId;
}

function displayChange_field_anam_strtime(row, status) {
    var fieldId;
}

function displayChange_field_anam_reason(row, status) {
    var fieldId;
}

function displayChange_field_anam_diag(row, status) {
    var fieldId;
}

function displayChange_field_pati_id(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_pati_id__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_pati_id" + row).select2("destroy");
		}
		scJQSelect2Add(row, "pati_id");
	}
}

function displayChange_field_pat_bod(row, status) {
    var fieldId;
}

function displayChange_field_pat_name(row, status) {
    var fieldId;
}

function displayChange_field_pat_lname(row, status) {
    var fieldId;
}

function displayChange_field_pat_blood(row, status) {
    var fieldId;
}

function displayChange_field_anam_career(row, status) {
    var fieldId;
}

function displayChange_field_pat_gerens(row, status) {
    var fieldId;
}

function displayChange_field_pat_phone(row, status) {
    var fieldId;
}

function displayChange_field_anam_carsem(row, status) {
    var fieldId;
}

function displayChange_field_anam_bpsys(row, status) {
    var fieldId;
}

function displayChange_field_anam_bpdia(row, status) {
    var fieldId;
}

function displayChange_field_anam_hbeat(row, status) {
    var fieldId;
}

function displayChange_field_anam_temp(row, status) {
    var fieldId;
}

function displayChange_field_anam_oxy(row, status) {
    var fieldId;
}

function displayChange_field_anam_gluco(row, status) {
    var fieldId;
}

function displayChange_field_anam_aller(row, status) {
    var fieldId;
}

function displayChange_field_tratamiento(row, status) {
    var fieldId;
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_treatment_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_treatment_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
	displayChange_field_pati_id("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_anamnesis_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(26);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_anam_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_anam_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_anamnesis_mob_validate_anam_date(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['anam_date']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
    buttonText: "",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  })
<?php
if ('' != $miniCalendarFA) {
?>
    .next('button').append("<?php echo $miniCalendarFA; ?>")
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    .next('button').append("<?php echo $miniCalendarButton[0]; ?>")
<?php
}
?>
} // scJQCalendarAdd

function scJQSpinAdd(iSeqRow) {
  $("#id_sc_field_anam_bpsys" + iSeqRow).spinner({
    max: 999999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_anam_bpdia" + iSeqRow).spinner({
    max: 999999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_anam_hbeat" + iSeqRow).spinner({
    max: 999999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_anam_oxy" + iSeqRow).spinner({
    max: 999999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
  $("#id_sc_field_anam_gluco" + iSeqRow).spinner({
    max: 999999999999,
    min: 0,
    step: 1,
    page: 5,
    change: function(event, ui) {
      $(this).trigger("change");
    },
    stop: function(event, ui) {
      $(this).trigger("change");
    }
  });
} // scJQSpinAdd

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
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_anamnesis_mob')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

function scJQPasswordToggleAdd(seqRow) {
  $(".sc-ui-pwd-toggle-icon" + seqRow).on("click", function() {
    var fieldName = $(this).attr("id").substr(17), fieldObj = $("#id_sc_field_" + fieldName), fieldFA = $("#id_pwd_fa_" + fieldName);
    if ("text" == fieldObj.attr("type")) {
      fieldObj.attr("type", "password");
      fieldFA.attr("class", "fa fa-eye sc-ui-pwd-eye");
    } else {
      fieldObj.attr("type", "text");
      fieldFA.attr("class", "fa fa-eye-slash sc-ui-pwd-eye");
    }
  });
} // scJQPasswordToggleAdd

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "pati_id" == specificField) {
    scJQSelect2Add_pati_id(seqRow);
  }
  if (null == specificField || "user_id" == specificField) {
    scJQSelect2Add_user_id(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_pati_id(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_pati_id_obj" : "#id_sc_field_pati_id" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_pati_id_obj',
      dropdownCssClass: 'css_pati_id_obj',
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

function scJQSelect2Add_user_id(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_user_id_obj" : "#id_sc_field_user_id" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_user_id_obj',
      dropdownCssClass: 'css_user_id_obj',
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
  scJQSpinAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_pati_id) { displayChange_field_pati_id(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_user_id) { displayChange_field_user_id(iLine, "on"); } }, 150);
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

