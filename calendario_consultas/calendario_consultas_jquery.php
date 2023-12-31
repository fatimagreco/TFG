
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
  scEventControl_data["pati_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_lname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_bod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pat_gerens" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_career" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["anam_carsem" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["btyp_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pati_famphone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pati_famname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consul_date" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consul_strtime" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consul_endtime" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consul_reason" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["consul_anot" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["pati_id" + iSeqRow] && scEventControl_data["pati_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pati_id" + iSeqRow] && scEventControl_data["pati_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_phone" + iSeqRow] && scEventControl_data["pat_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_phone" + iSeqRow] && scEventControl_data["pat_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_lname" + iSeqRow] && scEventControl_data["pat_lname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_lname" + iSeqRow] && scEventControl_data["pat_lname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_name" + iSeqRow] && scEventControl_data["pat_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_name" + iSeqRow] && scEventControl_data["pat_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_bod" + iSeqRow] && scEventControl_data["pat_bod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_bod" + iSeqRow] && scEventControl_data["pat_bod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pat_gerens" + iSeqRow] && scEventControl_data["pat_gerens" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pat_gerens" + iSeqRow] && scEventControl_data["pat_gerens" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_career" + iSeqRow] && scEventControl_data["anam_career" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_career" + iSeqRow] && scEventControl_data["anam_career" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["anam_carsem" + iSeqRow] && scEventControl_data["anam_carsem" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["anam_carsem" + iSeqRow] && scEventControl_data["anam_carsem" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["btyp_id" + iSeqRow] && scEventControl_data["btyp_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["btyp_id" + iSeqRow] && scEventControl_data["btyp_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pati_famphone" + iSeqRow] && scEventControl_data["pati_famphone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pati_famphone" + iSeqRow] && scEventControl_data["pati_famphone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pati_famname" + iSeqRow] && scEventControl_data["pati_famname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pati_famname" + iSeqRow] && scEventControl_data["pati_famname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consul_date" + iSeqRow] && scEventControl_data["consul_date" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consul_date" + iSeqRow] && scEventControl_data["consul_date" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consul_strtime" + iSeqRow] && scEventControl_data["consul_strtime" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consul_strtime" + iSeqRow] && scEventControl_data["consul_strtime" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consul_endtime" + iSeqRow] && scEventControl_data["consul_endtime" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consul_endtime" + iSeqRow] && scEventControl_data["consul_endtime" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user_id" + iSeqRow] && scEventControl_data["user_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_id" + iSeqRow] && scEventControl_data["user_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consul_reason" + iSeqRow] && scEventControl_data["consul_reason" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consul_reason" + iSeqRow] && scEventControl_data["consul_reason" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["consul_anot" + iSeqRow] && scEventControl_data["consul_anot" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["consul_anot" + iSeqRow] && scEventControl_data["consul_anot" + iSeqRow]["change"]) {
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
  if ("btyp_id" + iSeq == fieldName) {
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
  $('#id_sc_field_consul_id' + iSeqRow).bind('change', function() { sc_calendario_consultas_consul_id_onchange(this, iSeqRow) });
  $('#id_sc_field_pati_id' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pati_id_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_calendario_consultas_pati_id_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_calendario_consultas_pati_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_id' + iSeqRow).bind('blur', function() { sc_calendario_consultas_user_id_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_calendario_consultas_user_id_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_calendario_consultas_user_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_consul_date' + iSeqRow).bind('blur', function() { sc_calendario_consultas_consul_date_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_calendario_consultas_consul_date_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_calendario_consultas_consul_date_onfocus(this, iSeqRow) });
  $('#id_sc_field_consul_strtime' + iSeqRow).bind('blur', function() { sc_calendario_consultas_consul_strtime_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_calendario_consultas_consul_strtime_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_calendario_consultas_consul_strtime_onfocus(this, iSeqRow) });
  $('#id_sc_field_consul_endtime' + iSeqRow).bind('blur', function() { sc_calendario_consultas_consul_endtime_onblur(this, iSeqRow) })
                                            .bind('change', function() { sc_calendario_consultas_consul_endtime_onchange(this, iSeqRow) })
                                            .bind('focus', function() { sc_calendario_consultas_consul_endtime_onfocus(this, iSeqRow) });
  $('#id_sc_field_consil_sesnum' + iSeqRow).bind('change', function() { sc_calendario_consultas_consil_sesnum_onchange(this, iSeqRow) });
  $('#id_sc_field_consul_reason' + iSeqRow).bind('blur', function() { sc_calendario_consultas_consul_reason_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_calendario_consultas_consul_reason_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_calendario_consultas_consul_reason_onfocus(this, iSeqRow) });
  $('#id_sc_field_consul_anot' + iSeqRow).bind('blur', function() { sc_calendario_consultas_consul_anot_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_calendario_consultas_consul_anot_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_calendario_consultas_consul_anot_onfocus(this, iSeqRow) });
  $('#id_sc_field_consul_state' + iSeqRow).bind('change', function() { sc_calendario_consultas_consul_state_onchange(this, iSeqRow) });
  $('#id_sc_field___calend_all_day__' + iSeqRow).bind('change', function() { sc_calendario_consultas___calend_all_day___onchange(this, iSeqRow) });
  $('#id_sc_field_anam_career' + iSeqRow).bind('blur', function() { sc_calendario_consultas_anam_career_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_calendario_consultas_anam_career_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_calendario_consultas_anam_career_onfocus(this, iSeqRow) });
  $('#id_sc_field_anam_carsem' + iSeqRow).bind('blur', function() { sc_calendario_consultas_anam_carsem_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_calendario_consultas_anam_carsem_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_calendario_consultas_anam_carsem_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_bod' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pat_bod_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_calendario_consultas_pat_bod_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_calendario_consultas_pat_bod_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_name' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pat_name_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_calendario_consultas_pat_name_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_calendario_consultas_pat_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_lname' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pat_lname_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendario_consultas_pat_lname_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendario_consultas_pat_lname_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_gerens' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pat_gerens_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_calendario_consultas_pat_gerens_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_calendario_consultas_pat_gerens_onfocus(this, iSeqRow) });
  $('#id_sc_field_pat_phone' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pat_phone_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_calendario_consultas_pat_phone_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_calendario_consultas_pat_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_btyp_id' + iSeqRow).bind('blur', function() { sc_calendario_consultas_btyp_id_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_calendario_consultas_btyp_id_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_calendario_consultas_btyp_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_pati_famphone' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pati_famphone_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_calendario_consultas_pati_famphone_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_calendario_consultas_pati_famphone_onfocus(this, iSeqRow) });
  $('#id_sc_field_pati_famname' + iSeqRow).bind('blur', function() { sc_calendario_consultas_pati_famname_onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_calendario_consultas_pati_famname_onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_calendario_consultas_pati_famname_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-pat_gerens' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-__calend_all_day__' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_calendario_consultas_consul_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pati_id_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pati_id();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pati_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  do_ajax_calendario_consultas_event_pati_id_onchange();
}

function sc_calendario_consultas_pati_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_user_id_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_user_id();
  scCssBlur(oThis);
}

function sc_calendario_consultas_user_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_user_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_consul_date_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_consul_date();
  scCssBlur(oThis);
}

function sc_calendario_consultas_consul_date_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_consul_date_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_consul_strtime_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_consul_strtime();
  scCssBlur(oThis);
}

function sc_calendario_consultas_consul_strtime_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_consul_strtime_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_consul_endtime_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_consul_endtime();
  scCssBlur(oThis);
}

function sc_calendario_consultas_consul_endtime_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_consul_endtime_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_consil_sesnum_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_consul_reason_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_consul_reason();
  scCssBlur(oThis);
}

function sc_calendario_consultas_consul_reason_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_consul_reason_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_consul_anot_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_consul_anot();
  scCssBlur(oThis);
}

function sc_calendario_consultas_consul_anot_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_consul_anot_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_consul_state_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas___calend_all_day___onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_anam_career_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_anam_career();
  scCssBlur(oThis);
}

function sc_calendario_consultas_anam_career_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_anam_career_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_anam_carsem_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_anam_carsem();
  scCssBlur(oThis);
}

function sc_calendario_consultas_anam_carsem_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_anam_carsem_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_pat_bod_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pat_bod();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pat_bod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pat_bod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_pat_name_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pat_name();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pat_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pat_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_pat_lname_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pat_lname();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pat_lname_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pat_lname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_pat_gerens_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pat_gerens();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pat_gerens_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pat_gerens_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_pat_phone_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pat_phone();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pat_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pat_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_btyp_id_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_btyp_id();
  scCssBlur(oThis);
}

function sc_calendario_consultas_btyp_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_btyp_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_pati_famphone_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pati_famphone();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pati_famphone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pati_famphone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_calendario_consultas_pati_famname_onblur(oThis, iSeqRow) {
  do_ajax_calendario_consultas_validate_pati_famname();
  scCssBlur(oThis);
}

function sc_calendario_consultas_pati_famname_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_calendario_consultas_pati_famname_onfocus(oThis, iSeqRow) {
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
	displayChange_field("pati_id", "", status);
	displayChange_field("pat_phone", "", status);
	displayChange_field("pat_lname", "", status);
	displayChange_field("pat_name", "", status);
	displayChange_field("pat_bod", "", status);
	displayChange_field("pat_gerens", "", status);
	displayChange_field("anam_career", "", status);
	displayChange_field("anam_carsem", "", status);
	displayChange_field("btyp_id", "", status);
	displayChange_field("pati_famphone", "", status);
	displayChange_field("pati_famname", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("consul_date", "", status);
	displayChange_field("consul_strtime", "", status);
	displayChange_field("consul_endtime", "", status);
	displayChange_field("user_id", "", status);
	displayChange_field("consul_reason", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("consul_anot", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_pati_id(row, status);
	displayChange_field_pat_phone(row, status);
	displayChange_field_pat_lname(row, status);
	displayChange_field_pat_name(row, status);
	displayChange_field_pat_bod(row, status);
	displayChange_field_pat_gerens(row, status);
	displayChange_field_anam_career(row, status);
	displayChange_field_anam_carsem(row, status);
	displayChange_field_btyp_id(row, status);
	displayChange_field_pati_famphone(row, status);
	displayChange_field_pati_famname(row, status);
	displayChange_field_consul_date(row, status);
	displayChange_field_consul_strtime(row, status);
	displayChange_field_consul_endtime(row, status);
	displayChange_field_user_id(row, status);
	displayChange_field_consul_reason(row, status);
	displayChange_field_consul_anot(row, status);
}

function displayChange_field(field, row, status) {
	if ("pati_id" == field) {
		displayChange_field_pati_id(row, status);
	}
	if ("pat_phone" == field) {
		displayChange_field_pat_phone(row, status);
	}
	if ("pat_lname" == field) {
		displayChange_field_pat_lname(row, status);
	}
	if ("pat_name" == field) {
		displayChange_field_pat_name(row, status);
	}
	if ("pat_bod" == field) {
		displayChange_field_pat_bod(row, status);
	}
	if ("pat_gerens" == field) {
		displayChange_field_pat_gerens(row, status);
	}
	if ("anam_career" == field) {
		displayChange_field_anam_career(row, status);
	}
	if ("anam_carsem" == field) {
		displayChange_field_anam_carsem(row, status);
	}
	if ("btyp_id" == field) {
		displayChange_field_btyp_id(row, status);
	}
	if ("pati_famphone" == field) {
		displayChange_field_pati_famphone(row, status);
	}
	if ("pati_famname" == field) {
		displayChange_field_pati_famname(row, status);
	}
	if ("consul_date" == field) {
		displayChange_field_consul_date(row, status);
	}
	if ("consul_strtime" == field) {
		displayChange_field_consul_strtime(row, status);
	}
	if ("consul_endtime" == field) {
		displayChange_field_consul_endtime(row, status);
	}
	if ("user_id" == field) {
		displayChange_field_user_id(row, status);
	}
	if ("consul_reason" == field) {
		displayChange_field_consul_reason(row, status);
	}
	if ("consul_anot" == field) {
		displayChange_field_consul_anot(row, status);
	}
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

function displayChange_field_pat_phone(row, status) {
    var fieldId;
}

function displayChange_field_pat_lname(row, status) {
    var fieldId;
}

function displayChange_field_pat_name(row, status) {
    var fieldId;
}

function displayChange_field_pat_bod(row, status) {
    var fieldId;
}

function displayChange_field_pat_gerens(row, status) {
    var fieldId;
}

function displayChange_field_anam_career(row, status) {
    var fieldId;
}

function displayChange_field_anam_carsem(row, status) {
    var fieldId;
}

function displayChange_field_btyp_id(row, status) {
    var fieldId;
}

function displayChange_field_pati_famphone(row, status) {
    var fieldId;
}

function displayChange_field_pati_famname(row, status) {
    var fieldId;
}

function displayChange_field_consul_date(row, status) {
    var fieldId;
}

function displayChange_field_consul_strtime(row, status) {
    var fieldId;
}

function displayChange_field_consul_endtime(row, status) {
    var fieldId;
}

function displayChange_field_user_id(row, status) {
    var fieldId;
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_user_id__obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_user_id" + row).select2("destroy");
		}
		scJQSelect2Add(row, "user_id");
	}
}

function displayChange_field_consul_reason(row, status) {
    var fieldId;
}

function displayChange_field_consul_anot(row, status) {
    var fieldId;
}

function scRecreateSelect2() {
	displayChange_field_pati_id("all", "on");
	displayChange_field_user_id("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_calendario_consultas_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_consul_date" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_consul_date" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      var elemName;
      if ("" != dateText) {
        elemName = $(this).attr("name");
        $("input[name=sc_clone_" + elemName + "]").hide();
        $("input[name=" + elemName + "]").show();
      }
      setTimeout(function() { do_ajax_calendario_consultas_validate_consul_date(iSeqRow); }, 200);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['consul_date']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'calendario_consultas')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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

