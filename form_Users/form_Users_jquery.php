
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
      case 'user_name':
      case 'user_lname':
      case 'user_docnum':
      case 'user_bod':
      case 'user_phone':
      case 'user_addreess':
      case 'user_email':
      case 'btyp_id':
      case 'pos_id':
      case 'gerens_id':
        sc_exib_ocult_pag('form_Users_form0');
        break;
      case 'f_useres':
        sc_exib_ocult_pag('form_Users_form1');
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
  scEventControl_data["user_name" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user_lname" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user_docnum" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user_bod" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user_phone" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user_addreess" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["user_email" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["btyp_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pos_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["gerens_id" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["f_useres" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["user_name" + iSeqRow] && scEventControl_data["user_name" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_name" + iSeqRow] && scEventControl_data["user_name" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user_lname" + iSeqRow] && scEventControl_data["user_lname" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_lname" + iSeqRow] && scEventControl_data["user_lname" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user_docnum" + iSeqRow] && scEventControl_data["user_docnum" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_docnum" + iSeqRow] && scEventControl_data["user_docnum" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user_bod" + iSeqRow] && scEventControl_data["user_bod" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_bod" + iSeqRow] && scEventControl_data["user_bod" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user_phone" + iSeqRow] && scEventControl_data["user_phone" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_phone" + iSeqRow] && scEventControl_data["user_phone" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user_addreess" + iSeqRow] && scEventControl_data["user_addreess" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_addreess" + iSeqRow] && scEventControl_data["user_addreess" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["user_email" + iSeqRow] && scEventControl_data["user_email" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["user_email" + iSeqRow] && scEventControl_data["user_email" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["btyp_id" + iSeqRow] && scEventControl_data["btyp_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["btyp_id" + iSeqRow] && scEventControl_data["btyp_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pos_id" + iSeqRow] && scEventControl_data["pos_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pos_id" + iSeqRow] && scEventControl_data["pos_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["gerens_id" + iSeqRow] && scEventControl_data["gerens_id" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["gerens_id" + iSeqRow] && scEventControl_data["gerens_id" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["f_useres" + iSeqRow] && scEventControl_data["f_useres" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["f_useres" + iSeqRow] && scEventControl_data["f_useres" + iSeqRow]["change"]) {
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
  $('#id_sc_field_user_id' + iSeqRow).bind('change', function() { sc_form_Users_user_id_onchange(this, iSeqRow) });
  $('#id_sc_field_user_name' + iSeqRow).bind('blur', function() { sc_form_Users_user_name_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_Users_user_name_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_Users_user_name_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_docnum' + iSeqRow).bind('blur', function() { sc_form_Users_user_docnum_onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_Users_user_docnum_onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_Users_user_docnum_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_bod' + iSeqRow).bind('blur', function() { sc_form_Users_user_bod_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_Users_user_bod_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_Users_user_bod_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_phone' + iSeqRow).bind('blur', function() { sc_form_Users_user_phone_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_Users_user_phone_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_Users_user_phone_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_addreess' + iSeqRow).bind('blur', function() { sc_form_Users_user_addreess_onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_Users_user_addreess_onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_Users_user_addreess_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_ocup' + iSeqRow).bind('change', function() { sc_form_Users_user_ocup_onchange(this, iSeqRow) });
  $('#id_sc_field_user_geren' + iSeqRow).bind('change', function() { sc_form_Users_user_geren_onchange(this, iSeqRow) });
  $('#id_sc_field_user_email' + iSeqRow).bind('blur', function() { sc_form_Users_user_email_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_Users_user_email_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_Users_user_email_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_pword' + iSeqRow).bind('change', function() { sc_form_Users_user_pword_onchange(this, iSeqRow) });
  $('#id_sc_field_btyp_id' + iSeqRow).bind('blur', function() { sc_form_Users_btyp_id_onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_Users_btyp_id_onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_Users_btyp_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_pos_id' + iSeqRow).bind('blur', function() { sc_form_Users_pos_id_onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_Users_pos_id_onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_Users_pos_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_gerens_id' + iSeqRow).bind('blur', function() { sc_form_Users_gerens_id_onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_Users_gerens_id_onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_Users_gerens_id_onfocus(this, iSeqRow) });
  $('#id_sc_field_user_lname' + iSeqRow).bind('blur', function() { sc_form_Users_user_lname_onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_Users_user_lname_onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_Users_user_lname_onfocus(this, iSeqRow) });
  $('#id_sc_field_f_useres' + iSeqRow).bind('blur', function() { sc_form_Users_f_useres_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_Users_f_useres_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_Users_f_useres_onfocus(this, iSeqRow) });
  $('.sc-ui-radio-btyp_id' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-pos_id' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-gerens_id' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-radio-user_geren' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_form_Users_user_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_name_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_user_name();
  scCssBlur(oThis);
}

function sc_form_Users_user_name_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_name_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_user_docnum_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_user_docnum();
  scCssBlur(oThis);
}

function sc_form_Users_user_docnum_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_docnum_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_user_bod_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_user_bod();
  scCssBlur(oThis);
}

function sc_form_Users_user_bod_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_bod_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_user_phone_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_user_phone();
  scCssBlur(oThis);
}

function sc_form_Users_user_phone_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_phone_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_user_addreess_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_user_addreess();
  scCssBlur(oThis);
}

function sc_form_Users_user_addreess_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_addreess_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_user_ocup_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_geren_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_email_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_user_email();
  scCssBlur(oThis);
}

function sc_form_Users_user_email_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_email_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_user_pword_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_btyp_id_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_btyp_id();
  scCssBlur(oThis);
}

function sc_form_Users_btyp_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_btyp_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_pos_id_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_pos_id();
  scCssBlur(oThis);
}

function sc_form_Users_pos_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_pos_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_gerens_id_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_gerens_id();
  scCssBlur(oThis);
}

function sc_form_Users_gerens_id_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_gerens_id_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_user_lname_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_user_lname();
  scCssBlur(oThis);
}

function sc_form_Users_user_lname_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_user_lname_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_Users_f_useres_onblur(oThis, iSeqRow) {
  do_ajax_form_Users_validate_f_useres();
  scCssBlur(oThis);
}

function sc_form_Users_f_useres_onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_form_Users_f_useres_onfocus(oThis, iSeqRow) {
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
}

function displayChange_page_1(status) {
	displayChange_block("1", status);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("user_name", "", status);
	displayChange_field("user_lname", "", status);
	displayChange_field("user_docnum", "", status);
	displayChange_field("user_bod", "", status);
	displayChange_field("user_phone", "", status);
	displayChange_field("user_addreess", "", status);
	displayChange_field("user_email", "", status);
	displayChange_field("btyp_id", "", status);
	displayChange_field("pos_id", "", status);
	displayChange_field("gerens_id", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("f_useres", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_user_name(row, status);
	displayChange_field_user_lname(row, status);
	displayChange_field_user_docnum(row, status);
	displayChange_field_user_bod(row, status);
	displayChange_field_user_phone(row, status);
	displayChange_field_user_addreess(row, status);
	displayChange_field_user_email(row, status);
	displayChange_field_btyp_id(row, status);
	displayChange_field_pos_id(row, status);
	displayChange_field_gerens_id(row, status);
	displayChange_field_f_useres(row, status);
}

function displayChange_field(field, row, status) {
	if ("user_name" == field) {
		displayChange_field_user_name(row, status);
	}
	if ("user_lname" == field) {
		displayChange_field_user_lname(row, status);
	}
	if ("user_docnum" == field) {
		displayChange_field_user_docnum(row, status);
	}
	if ("user_bod" == field) {
		displayChange_field_user_bod(row, status);
	}
	if ("user_phone" == field) {
		displayChange_field_user_phone(row, status);
	}
	if ("user_addreess" == field) {
		displayChange_field_user_addreess(row, status);
	}
	if ("user_email" == field) {
		displayChange_field_user_email(row, status);
	}
	if ("btyp_id" == field) {
		displayChange_field_btyp_id(row, status);
	}
	if ("pos_id" == field) {
		displayChange_field_pos_id(row, status);
	}
	if ("gerens_id" == field) {
		displayChange_field_gerens_id(row, status);
	}
	if ("f_useres" == field) {
		displayChange_field_f_useres(row, status);
	}
}

function displayChange_field_user_name(row, status) {
    var fieldId;
}

function displayChange_field_user_lname(row, status) {
    var fieldId;
}

function displayChange_field_user_docnum(row, status) {
    var fieldId;
}

function displayChange_field_user_bod(row, status) {
    var fieldId;
}

function displayChange_field_user_phone(row, status) {
    var fieldId;
}

function displayChange_field_user_addreess(row, status) {
    var fieldId;
}

function displayChange_field_user_email(row, status) {
    var fieldId;
}

function displayChange_field_btyp_id(row, status) {
    var fieldId;
}

function displayChange_field_pos_id(row, status) {
    var fieldId;
}

function displayChange_field_gerens_id(row, status) {
    var fieldId;
}

function displayChange_field_f_useres(row, status) {
    var fieldId;
	if ("on" == status && typeof $("#nmsc_iframe_liga_sec_form_edit_users")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_sec_form_edit_users")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_Users_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(18);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_user_bod" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_user_bod" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      do_ajax_form_Users_validate_user_bod(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['user_bod']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'form_Users')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
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
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQPasswordToggleAdd(iLine);
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

