<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Atenciones Enfermería"); } else { echo strip_tags("Atenciones Enfermería"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__enfermeria_unae2.png">
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

?>
            <meta name="viewport" content="minimal-ui, width=300, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
            <meta name="mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="apple-touch-icon"   sizes="57x57" href="">
            <link rel="apple-touch-icon"   sizes="60x60" href="">
            <link rel="apple-touch-icon"   sizes="72x72" href="">
            <link rel="apple-touch-icon"   sizes="76x76" href="">
            <link rel="apple-touch-icon" sizes="114x114" href="">
            <link rel="apple-touch-icon" sizes="120x120" href="">
            <link rel="apple-touch-icon" sizes="144x144" href="">
            <link rel="apple-touch-icon" sizes="152x152" href="">
            <link rel="apple-touch-icon" sizes="180x180" href="">
            <link rel="icon" type="image/png" sizes="192x192" href="">
            <link rel="icon" type="image/png"   sizes="32x32" href="">
            <link rel="icon" type="image/png"   sizes="96x96" href="">
            <link rel="icon" type="image/png"   sizes="16x16" href="">
            <meta name="msapplication-TileColor" content="___">
            <meta name="msapplication-TileImage" content="">
            <meta name="theme-color" content="___">
            <meta name="apple-mobile-web-app-status-bar-style" content="___">
            <link rel="shortcut icon" href=""> <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
            <?php
               if ($_SESSION['scriptcase']['display_mobile'] && $_SESSION['scriptcase']['device_mobile']) {
                   $forced_mobile = (isset($_SESSION['scriptcase']['force_mobile']) && $_SESSION['scriptcase']['force_mobile']) ? 'true' : 'false';
                   $sc_app_data   = json_encode([
                       'forceMobile' => $forced_mobile,
                       'appType' => 'form',
                       'improvements' => true,
                       'displayOptionsButton' => false,
                       'displayScrollUp' => true,
                       'scrollUpPosition' => 'A',
                       'toolbarOrientation' => 'H',
                       'mobilePanes' => 'true',
                       'navigationBarButtons' => unserialize('a:3:{i:0;s:2:"NP";i:1;s:2:"FL";i:2;s:2:"RC";}'),
                       'mobileSimpleToolbar' => true,
                       'bottomToolbarFixed' => true
                   ]); ?>
            <input type="hidden" id="sc-mobile-app-data" value='<?php echo $sc_app_data; ?>' />
            <script type="text/javascript" src="../_lib/lib/js/nm_modal_panes.jquery.js"></script>
            <script type="text/javascript" src="../_lib/lib/js/nm_form_mobile.js"></script>
            <link rel='stylesheet' href='../_lib/lib/css/nm_form_mobile.css' type='text/css'/>
            <script>
                $(document).ready(function(){

                    bootstrapMobile();

                });
            </script>
            <?php } ?> <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
<style type="text/css">
.ui-datepicker { z-index: 6 !important }
</style>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/viewerjs/viewer.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/viewerjs/viewer.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_anam_date button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <style type="text/css">
  .scSpin_anam_bpsys_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_anam_bpsys .ui-spinner {
   display: flex;
   width: 100%;
  }
  .scSpin_anam_bpdia_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_anam_bpdia .ui-spinner {
   display: flex;
   width: 100%;
  }
  .scSpin_anam_hbeat_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_anam_hbeat .ui-spinner {
   display: flex;
   width: 100%;
  }
  .scSpin_anam_oxy_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_anam_oxy .ui-spinner {
   display: flex;
   width: 100%;
  }
  .scSpin_anam_gluco_obj {
   border: 0 !important;
   margin: 0 20px 0 0 !important;
  }
  #id_read_off_anam_gluco .ui-spinner {
   display: flex;
   width: 100%;
  }
 </style>
 <style type="text/css">
   .select2-container {
     width: auto !important;
     flex-grow: 1;
   }
   .select2-selection {
     width: 100% !important;
   }
 </style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2-4.0.6/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2-4.0.6/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_anamnesis/form_anamnesis_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("form_anamnesis_mob_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['last'] : 'off'); ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       if ("off" == Nav_binicio_macro_disabled) { $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       if ("off" == Nav_bretorna_macro_disabled) { $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['first']) && $this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['back']) && $this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       if ("off" == Nav_bfinal_macro_disabled) { $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       if ("off" == Nav_bavanca_macro_disabled) { $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled"); }
<?php
    }
?>
 }
 else
 {
<?php
    if (isset($this->nmgp_botoes['last']) && $this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if (isset($this->nmgp_botoes['forward']) && $this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo substr($this->Ini->Nm_lang['lang_othr_smry_info'], strpos($this->Ini->Nm_lang['lang_othr_smry_info'], "?final?")) ?>]";
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     if (F_name == "pat_gerens")
     {
        $('input[name="pat_gerens"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="pat_gerens"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="pat_gerens"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_anamnesis_mob_jquery.php');

?>
var applicationKeys = "";
applicationKeys += "ctrl+shift+right";
applicationKeys += ",";
applicationKeys += "ctrl+shift+left";
applicationKeys += ",";
applicationKeys += "ctrl+right";
applicationKeys += ",";
applicationKeys += "ctrl+left";
applicationKeys += ",";
applicationKeys += "alt+q";
applicationKeys += ",";
applicationKeys += "escape";
applicationKeys += ",";
applicationKeys += "ctrl+enter";
applicationKeys += ",";
applicationKeys += "ctrl+s";
applicationKeys += ",";
applicationKeys += "ctrl+delete";
applicationKeys += ",";
applicationKeys += "f1";
applicationKeys += ",";
applicationKeys += "ctrl+shift+c";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    case (["ctrl+shift+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_fim");
      break;
    case (["ctrl+shift+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ini");
      break;
    case (["ctrl+right"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ava");
      break;
    case (["ctrl+left"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_ret");
      break;
    case (["alt+q"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_sai");
      break;
    case (["escape"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_cnl");
      break;
    case (["ctrl+enter"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_inc");
      break;
    case (["ctrl+s"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_alt");
      break;
    case (["ctrl+delete"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_exc");
      break;
    case (["f1"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_webh");
      break;
    case (["ctrl+shift+c"].indexOf(h.key) > -1):
      hotkey_fired = process_hotkeys("sys_format_copy");
      break;
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>

<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys.inc.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>hotkeys_setup.js"></script>
<script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
<script type="text/javascript">

function process_hotkeys(hotkey)
{
  if (hotkey == "sys_format_fim") {
    if (typeof scBtnFn_sys_format_fim !== "undefined" && typeof scBtnFn_sys_format_fim === "function") {
      scBtnFn_sys_format_fim();
        return true;
    }
  }
  if (hotkey == "sys_format_ini") {
    if (typeof scBtnFn_sys_format_ini !== "undefined" && typeof scBtnFn_sys_format_ini === "function") {
      scBtnFn_sys_format_ini();
        return true;
    }
  }
  if (hotkey == "sys_format_ava") {
    if (typeof scBtnFn_sys_format_ava !== "undefined" && typeof scBtnFn_sys_format_ava === "function") {
      scBtnFn_sys_format_ava();
        return true;
    }
  }
  if (hotkey == "sys_format_ret") {
    if (typeof scBtnFn_sys_format_ret !== "undefined" && typeof scBtnFn_sys_format_ret === "function") {
      scBtnFn_sys_format_ret();
        return true;
    }
  }
  if (hotkey == "sys_format_sai") {
    if (typeof scBtnFn_sys_format_sai !== "undefined" && typeof scBtnFn_sys_format_sai === "function") {
      scBtnFn_sys_format_sai();
        return true;
    }
  }
  if (hotkey == "sys_format_cnl") {
    if (typeof scBtnFn_sys_format_cnl !== "undefined" && typeof scBtnFn_sys_format_cnl === "function") {
      scBtnFn_sys_format_cnl();
        return true;
    }
  }
  if (hotkey == "sys_format_inc") {
    if (typeof scBtnFn_sys_format_inc !== "undefined" && typeof scBtnFn_sys_format_inc === "function") {
      scBtnFn_sys_format_inc();
        return true;
    }
  }
  if (hotkey == "sys_format_alt") {
    if (typeof scBtnFn_sys_format_alt !== "undefined" && typeof scBtnFn_sys_format_alt === "function") {
      scBtnFn_sys_format_alt();
        return true;
    }
  }
  if (hotkey == "sys_format_exc") {
    if (typeof scBtnFn_sys_format_exc !== "undefined" && typeof scBtnFn_sys_format_exc === "function") {
      scBtnFn_sys_format_exc();
        return true;
    }
  }
  if (hotkey == "sys_format_webh") {
    if (typeof scBtnFn_sys_format_webh !== "undefined" && typeof scBtnFn_sys_format_webh === "function") {
      scBtnFn_sys_format_webh();
        return true;
    }
  }
  if (hotkey == "sys_format_copy") {
    if (typeof scBtnFn_sys_format_copy !== "undefined" && typeof scBtnFn_sys_format_copy === "function") {
      scBtnFn_sys_format_copy();
        return true;
    }
  }
    return false;
}

 var Dyn_Ini  = true;
function setLabelCellMaxWidth()
{
    var $labelList = $(".scUiLabelWidthFix"), $spanList, i, testWidth, maxLabelWidth = 0;
    for (i = 0; i < $labelList.length; i++) {
        $spanList = $($labelList[i]).find("span");

        if ($spanList.length) {
            testWidth  = $($spanList[0]).width();

            maxLabelWidth = Math.max(maxLabelWidth, testWidth);
        }
    }

    if (0 < maxLabelWidth) {
        maxLabelWidth += 20;
        $labelList.css("width", maxLabelWidth + "px");
    }
}

 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  sc_form_onload();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

        setLabelCellMaxWidth();

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
     $("#fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        placeholder: '<?php echo $this->Ini->Nm_lang['lang_srch_all_fields'] ?>',
    });
     $("#cond_fast_search_f0_t").select2({
        containerCssClass: 'scGridQuickSearchDivResult',
        dropdownCssClass: 'scGridQuickSearchDivDropdown',
        minimumResultsForSearch: -1
    });
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if (typeof nm_gp_open_qsearch_div_mobile == 'function') {
            return nm_gp_open_qsearch_div_mobile(pos);
        }
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 2; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
    if ("hidden_bloco_4" == block_id) {
      scAjaxDetailHeight("form_treatment", $($("#nmsc_iframe_liga_form_treatment")[0].contentWindow.document).innerHeight());
    }
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = '';
?>
<body class="scFormPage sc-app-form" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_anamnesis']['error_buffer']) && '' != $_SESSION['scriptcase']['form_anamnesis']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_anamnesis']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_anamnesis_mob_js0.php");
?>
<script type="text/javascript"> 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="form_anamnesis_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['insert_validation']; ?>">
<?php
}
?>
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="anam_id" value="<?php  echo $this->form_encode_input($this->anam_id) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_anamnesis_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_anamnesis_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->sc_page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
$this->displayAppHeader();
?>
<tr><td>
<?php
$this->displayTopToolbar();
?>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['bcancelar']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['bcancelar']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['bcancelar']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['bcancelar']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['bcancelar'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = ($this->nmgp_botoes['reload'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['breload']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['breload']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['breload']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['breload']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['breload'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "breload", "scBtnFn_sys_format_reload()", "scBtnFn_sys_format_reload()", "sc_b_reload_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-22';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-23';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-24';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-25';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-26';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['empty_filter'] = true;
       }
  }
?>
<style>
.scTabInactive {
    cursor: pointer;
}
</style>
<script type="text/javascript">
var pag_ativa = "form_anamnesis_mob_form0";
</script>
<ul class="scTabLine sc-ui-page-tab-line">
<?php
    $this->tabCssClass = array(
        'form_anamnesis_mob_form0' => array(
            'title' => "Atención",
            'class' => empty($nmgp_num_form) || $nmgp_num_form == "form_anamnesis_mob_form0" ? "scTabActive" : "scTabInactive",
        ),
        'form_anamnesis_mob_form1' => array(
            'title' => "Tratamiento",
            'class' => $nmgp_num_form == "form_anamnesis_mob_form1" ? "scTabActive" : "scTabInactive",
        ),
    );
    if (!empty($this->Ini->nm_hidden_pages)) {
        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
            if ('Atención' == $pageName && 'off' == $pageStatus) {
                $this->tabCssClass['form_anamnesis_mob_form0']['class'] = 'scTabInactive';
            }
            if ('Tratamiento' == $pageName && 'off' == $pageStatus) {
                $this->tabCssClass['form_anamnesis_mob_form1']['class'] = 'scTabInactive';
            }
        }
        $displayingPage = false;
        foreach ($this->tabCssClass as $pageInfo) {
            if ('scTabActive' == $pageInfo['class']) {
                $displayingPage = true;
                break;
            }
        }
        if (!$displayingPage) {
            foreach ($this->tabCssClass as $pageForm => $pageInfo) {
                if (!isset($this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) || 'off' != $this->Ini->nm_hidden_pages[ $pageInfo['title'] ]) {
                    $this->tabCssClass[$pageForm]['class'] = 'scTabActive';
                    break;
                }
            }
        }
    }
?>
<?php
    $css_celula = $this->tabCssClass["form_anamnesis_mob_form0"]['class'];
?>
   <li id="id_form_anamnesis_mob_form0" class="<?php echo $css_celula; ?> sc-form-page sc-tab-click" data-tab-name="form_anamnesis_mob_form0">
     Atención
   </li>
<?php
    $css_celula = $this->tabCssClass["form_anamnesis_mob_form1"]['class'];
?>
   <li id="id_form_anamnesis_mob_form1" class="<?php echo $css_celula; ?> sc-form-page sc-tab-click" data-tab-name="form_anamnesis_mob_form1">
     Tratamiento
   </li>
</ul>
<div style='clear:both'></div>
</td></tr> 
<tr><td style="padding: 0px">
<div id="form_anamnesis_mob_form0" style='display: none; width: 1px; height: 0px; overflow: scroll'>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>
   <td style="border:0;padding:0;height:0" class="scUiLabelWidthFix"></td>
   </tr>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Consultas</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_date']))
    {
        $this->nm_new_label['anam_date'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_date = $this->anam_date;
   $sStyleHidden_anam_date = '';
   if (isset($this->nmgp_cmp_hidden['anam_date']) && $this->nmgp_cmp_hidden['anam_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_date']);
       $sStyleHidden_anam_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_date = 'display: none;';
   $sStyleReadInp_anam_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_date']) && $this->nmgp_cmp_readonly['anam_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_date']);
       $sStyleReadLab_anam_date = '';
       $sStyleReadInp_anam_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_date']) && $this->nmgp_cmp_hidden['anam_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_date" value="<?php echo $this->form_encode_input($anam_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_date_line" id="hidden_field_data_anam_date" style="<?php echo $sStyleHidden_anam_date; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_date_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_date_label" style=""><span id="id_label_anam_date"><?php echo $this->nm_new_label['anam_date']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_date']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_date'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_date"]) &&  $this->nmgp_cmp_readonly["anam_date"] == "on") { 

 ?>
<input type="hidden" name="anam_date" value="<?php echo $this->form_encode_input($anam_date) . "\">" . $anam_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_date" class="sc-ui-readonly-anam_date css_anam_date_line" style="<?php echo $sStyleReadLab_anam_date; ?>"><?php echo $this->form_format_readonly("anam_date", $this->form_encode_input($anam_date)); ?></span><span id="id_read_off_anam_date" class="css_read_off_anam_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_date; ?>"><?php
$tmp_form_data = $this->field_config['anam_date']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
<?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>' style='display: inherit; width: 100%'>

 <input class="sc-js-input scFormObjectOdd css_anam_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_date" type=text name="anam_date" value="<?php echo $this->form_encode_input($anam_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['anam_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['anam_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_date_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_date_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_strtime']))
    {
        $this->nm_new_label['anam_strtime'] = "Hora Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_strtime = $this->anam_strtime;
   $sStyleHidden_anam_strtime = '';
   if (isset($this->nmgp_cmp_hidden['anam_strtime']) && $this->nmgp_cmp_hidden['anam_strtime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_strtime']);
       $sStyleHidden_anam_strtime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_strtime = 'display: none;';
   $sStyleReadInp_anam_strtime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_strtime']) && $this->nmgp_cmp_readonly['anam_strtime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_strtime']);
       $sStyleReadLab_anam_strtime = '';
       $sStyleReadInp_anam_strtime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_strtime']) && $this->nmgp_cmp_hidden['anam_strtime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_strtime" value="<?php echo $this->form_encode_input($anam_strtime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_strtime_line" id="hidden_field_data_anam_strtime" style="<?php echo $sStyleHidden_anam_strtime; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_strtime_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_strtime_label" style=""><span id="id_label_anam_strtime"><?php echo $this->nm_new_label['anam_strtime']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_strtime']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_strtime'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_strtime"]) &&  $this->nmgp_cmp_readonly["anam_strtime"] == "on") { 

 ?>
<input type="hidden" name="anam_strtime" value="<?php echo $this->form_encode_input($anam_strtime) . "\">" . $anam_strtime . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_strtime" class="sc-ui-readonly-anam_strtime css_anam_strtime_line" style="<?php echo $sStyleReadLab_anam_strtime; ?>"><?php echo $this->form_format_readonly("anam_strtime", $this->form_encode_input($anam_strtime)); ?></span><span id="id_read_off_anam_strtime" class="css_read_off_anam_strtime<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_strtime; ?>"><?php
$tmp_form_data = $this->field_config['anam_strtime']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_anam_strtime_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_strtime" type=text name="anam_strtime" value="<?php echo $this->form_encode_input($anam_strtime) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['anam_strtime']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['anam_strtime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_strtime_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_strtime_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_reason']))
    {
        $this->nm_new_label['anam_reason'] = "Motivo de Conslta";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_reason = $this->anam_reason;
   $sStyleHidden_anam_reason = '';
   if (isset($this->nmgp_cmp_hidden['anam_reason']) && $this->nmgp_cmp_hidden['anam_reason'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_reason']);
       $sStyleHidden_anam_reason = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_reason = 'display: none;';
   $sStyleReadInp_anam_reason = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_reason']) && $this->nmgp_cmp_readonly['anam_reason'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_reason']);
       $sStyleReadLab_anam_reason = '';
       $sStyleReadInp_anam_reason = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_reason']) && $this->nmgp_cmp_hidden['anam_reason'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_reason" value="<?php echo $this->form_encode_input($anam_reason) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_reason_line" id="hidden_field_data_anam_reason" style="<?php echo $sStyleHidden_anam_reason; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_reason_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_reason_label" style=""><span id="id_label_anam_reason"><?php echo $this->nm_new_label['anam_reason']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_reason']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_reason'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$anam_reason_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($anam_reason));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_reason"]) &&  $this->nmgp_cmp_readonly["anam_reason"] == "on") { 

 ?>
<input type="hidden" name="anam_reason" value="<?php echo $this->form_encode_input($anam_reason) . "\">" . $anam_reason_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_reason" class="sc-ui-readonly-anam_reason css_anam_reason_line" style="<?php echo $sStyleReadLab_anam_reason; ?>"><?php echo $this->form_format_readonly("anam_reason", $this->form_encode_input($anam_reason_val)); ?></span><span id="id_read_off_anam_reason" class="css_read_off_anam_reason<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_reason; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_anam_reason_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;resize: vertical;" name="anam_reason" id="id_sc_field_anam_reason" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $anam_reason; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_reason_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_reason_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_diag']))
    {
        $this->nm_new_label['anam_diag'] = "Diagnóstico";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_diag = $this->anam_diag;
   $sStyleHidden_anam_diag = '';
   if (isset($this->nmgp_cmp_hidden['anam_diag']) && $this->nmgp_cmp_hidden['anam_diag'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_diag']);
       $sStyleHidden_anam_diag = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_diag = 'display: none;';
   $sStyleReadInp_anam_diag = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_diag']) && $this->nmgp_cmp_readonly['anam_diag'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_diag']);
       $sStyleReadLab_anam_diag = '';
       $sStyleReadInp_anam_diag = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_diag']) && $this->nmgp_cmp_hidden['anam_diag'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_diag" value="<?php echo $this->form_encode_input($anam_diag) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_diag_line" id="hidden_field_data_anam_diag" style="<?php echo $sStyleHidden_anam_diag; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_diag_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_diag_label" style=""><span id="id_label_anam_diag"><?php echo $this->nm_new_label['anam_diag']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_diag']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_diag'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php
$anam_diag_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($anam_diag));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_diag"]) &&  $this->nmgp_cmp_readonly["anam_diag"] == "on") { 

 ?>
<input type="hidden" name="anam_diag" value="<?php echo $this->form_encode_input($anam_diag) . "\">" . $anam_diag_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_diag" class="sc-ui-readonly-anam_diag css_anam_diag_line" style="<?php echo $sStyleReadLab_anam_diag; ?>"><?php echo $this->form_format_readonly("anam_diag", $this->form_encode_input($anam_diag_val)); ?></span><span id="id_read_off_anam_diag" class="css_read_off_anam_diag<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_diag; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_anam_diag_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;resize: vertical;" name="anam_diag" id="id_sc_field_anam_diag" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $anam_diag; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_diag_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_diag_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_anam_diag_dumb = ('' == $sStyleHidden_anam_diag) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_anam_diag_dumb" style="<?php echo $sStyleHidden_anam_diag_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>
   <td style="border:0;padding:0;height:0" class="scUiLabelWidthFix"></td>
   </tr>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Paciente</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pati_id']))
   {
       $this->nm_new_label['pati_id'] = "Paciente";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pati_id = $this->pati_id;
   $sStyleHidden_pati_id = '';
   if (isset($this->nmgp_cmp_hidden['pati_id']) && $this->nmgp_cmp_hidden['pati_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pati_id']);
       $sStyleHidden_pati_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pati_id = 'display: none;';
   $sStyleReadInp_pati_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pati_id']) && $this->nmgp_cmp_readonly['pati_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pati_id']);
       $sStyleReadLab_pati_id = '';
       $sStyleReadInp_pati_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pati_id']) && $this->nmgp_cmp_hidden['pati_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pati_id" value="<?php echo $this->form_encode_input($this->pati_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pati_id_line" id="hidden_field_data_pati_id" style="<?php echo $sStyleHidden_pati_id; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pati_id_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pati_id_label" style=""><span id="id_label_pati_id"><?php echo $this->nm_new_label['pati_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['pati_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['pati_id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pati_id"]) &&  $this->nmgp_cmp_readonly["pati_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id'] = array(); 
    }

   $old_value_anam_date = $this->anam_date;
   $old_value_anam_strtime = $this->anam_strtime;
   $old_value_pat_bod = $this->pat_bod;
   $old_value_anam_carsem = $this->anam_carsem;
   $old_value_anam_bpsys = $this->anam_bpsys;
   $old_value_anam_bpdia = $this->anam_bpdia;
   $old_value_anam_hbeat = $this->anam_hbeat;
   $old_value_anam_temp = $this->anam_temp;
   $old_value_anam_oxy = $this->anam_oxy;
   $old_value_anam_gluco = $this->anam_gluco;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_anam_date = $this->anam_date;
   $unformatted_value_anam_strtime = $this->anam_strtime;
   $unformatted_value_pat_bod = $this->pat_bod;
   $unformatted_value_anam_carsem = $this->anam_carsem;
   $unformatted_value_anam_bpsys = $this->anam_bpsys;
   $unformatted_value_anam_bpdia = $this->anam_bpdia;
   $unformatted_value_anam_hbeat = $this->anam_hbeat;
   $unformatted_value_anam_temp = $this->anam_temp;
   $unformatted_value_anam_oxy = $this->anam_oxy;
   $unformatted_value_anam_gluco = $this->anam_gluco;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT pati_id, pati_docnum + \" - \" + pati_name + \" - \" + pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT pati_id, concat(pati_docnum, \" - \",  pati_name, \" - \",pati_lname)  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT pati_id, pati_docnum&\" - \"&pati_name&\" - \"&pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT pati_id, pati_docnum||\" - \"||pati_name||\" - \"||pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   else
   {
       $nm_comando = "SELECT pati_id, pati_docnum||\" - \"||pati_name||\" - \"||pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }

   $this->anam_date = $old_value_anam_date;
   $this->anam_strtime = $old_value_anam_strtime;
   $this->pat_bod = $old_value_pat_bod;
   $this->anam_carsem = $old_value_anam_carsem;
   $this->anam_bpsys = $old_value_anam_bpsys;
   $this->anam_bpdia = $old_value_anam_bpdia;
   $this->anam_hbeat = $old_value_anam_hbeat;
   $this->anam_temp = $old_value_anam_temp;
   $this->anam_oxy = $old_value_anam_oxy;
   $this->anam_gluco = $old_value_anam_gluco;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pati_id'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $pati_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pati_id_1))
          {
              foreach ($this->pati_id_1 as $tmp_pati_id)
              {
                  if (trim($tmp_pati_id) === trim($cadaselect[1])) { $pati_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pati_id) === trim($cadaselect[1])) { $pati_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pati_id" value="<?php echo $this->form_encode_input($pati_id) . "\">" . $pati_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pati_id();
   $x = 0 ; 
   $pati_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pati_id_1))
          {
              foreach ($this->pati_id_1 as $tmp_pati_id)
              {
                  if (trim($tmp_pati_id) === trim($cadaselect[1])) { $pati_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pati_id) === trim($cadaselect[1])) { $pati_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($pati_id_look))
          {
              $pati_id_look = $this->pati_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pati_id\" class=\"css_pati_id_line\" style=\"" .  $sStyleReadLab_pati_id . "\">" . $this->form_format_readonly("pati_id", $this->form_encode_input($pati_id_look)) . "</span><span id=\"id_read_off_pati_id\" class=\"css_read_off_pati_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_pati_id . "\">";
   echo " <span id=\"idAjaxSelect_pati_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_pati_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_pati_id\" name=\"pati_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pati_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pati_id)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pati_id_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pati_id_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pat_bod']))
    {
        $this->nm_new_label['pat_bod'] = "Fecha de Nacimiento";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pat_bod = $this->pat_bod;
   $sStyleHidden_pat_bod = '';
   if (isset($this->nmgp_cmp_hidden['pat_bod']) && $this->nmgp_cmp_hidden['pat_bod'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pat_bod']);
       $sStyleHidden_pat_bod = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pat_bod = 'display: none;';
   $sStyleReadInp_pat_bod = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pat_bod']) && $this->nmgp_cmp_readonly['pat_bod'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pat_bod']);
       $sStyleReadLab_pat_bod = '';
       $sStyleReadInp_pat_bod = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pat_bod']) && $this->nmgp_cmp_hidden['pat_bod'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pat_bod" value="<?php echo $this->form_encode_input($pat_bod) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pat_bod_line" id="hidden_field_data_pat_bod" style="<?php echo $sStyleHidden_pat_bod; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pat_bod_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pat_bod_label" style=""><span id="id_label_pat_bod"><?php echo $this->nm_new_label['pat_bod']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_bod"]) &&  $this->nmgp_cmp_readonly["pat_bod"] == "on") { 

 ?>
<input type="hidden" name="pat_bod" value="<?php echo $this->form_encode_input($pat_bod) . "\">" . $pat_bod . ""; ?>
<?php } else { ?>
<span id="id_read_on_pat_bod" class="sc-ui-readonly-pat_bod css_pat_bod_line" style="<?php echo $sStyleReadLab_pat_bod; ?>"><?php echo $this->form_format_readonly("pat_bod", $this->form_encode_input($pat_bod)); ?></span><span id="id_read_off_pat_bod" class="css_read_off_pat_bod<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pat_bod; ?>"><?php
$tmp_form_data = $this->field_config['pat_bod']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_pat_bod_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pat_bod" type=text name="pat_bod" value="<?php echo $this->form_encode_input($pat_bod) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['pat_bod']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['pat_bod']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pat_bod_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pat_bod_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pat_name']))
    {
        $this->nm_new_label['pat_name'] = "Nombre";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pat_name = $this->pat_name;
   $sStyleHidden_pat_name = '';
   if (isset($this->nmgp_cmp_hidden['pat_name']) && $this->nmgp_cmp_hidden['pat_name'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pat_name']);
       $sStyleHidden_pat_name = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pat_name = 'display: none;';
   $sStyleReadInp_pat_name = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pat_name']) && $this->nmgp_cmp_readonly['pat_name'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pat_name']);
       $sStyleReadLab_pat_name = '';
       $sStyleReadInp_pat_name = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pat_name']) && $this->nmgp_cmp_hidden['pat_name'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pat_name" value="<?php echo $this->form_encode_input($pat_name) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pat_name_line" id="hidden_field_data_pat_name" style="<?php echo $sStyleHidden_pat_name; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pat_name_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pat_name_label" style=""><span id="id_label_pat_name"><?php echo $this->nm_new_label['pat_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_name"]) &&  $this->nmgp_cmp_readonly["pat_name"] == "on") { 

 ?>
<input type="hidden" name="pat_name" value="<?php echo $this->form_encode_input($pat_name) . "\">" . $pat_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_pat_name" class="sc-ui-readonly-pat_name css_pat_name_line" style="<?php echo $sStyleReadLab_pat_name; ?>"><?php echo $this->form_format_readonly("pat_name", $this->form_encode_input($this->pat_name)); ?></span><span id="id_read_off_pat_name" class="css_read_off_pat_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pat_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_pat_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pat_name" type=text name="pat_name" value="<?php echo $this->form_encode_input($pat_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pat_name_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pat_name_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pat_lname']))
    {
        $this->nm_new_label['pat_lname'] = "Apellido";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pat_lname = $this->pat_lname;
   $sStyleHidden_pat_lname = '';
   if (isset($this->nmgp_cmp_hidden['pat_lname']) && $this->nmgp_cmp_hidden['pat_lname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pat_lname']);
       $sStyleHidden_pat_lname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pat_lname = 'display: none;';
   $sStyleReadInp_pat_lname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pat_lname']) && $this->nmgp_cmp_readonly['pat_lname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pat_lname']);
       $sStyleReadLab_pat_lname = '';
       $sStyleReadInp_pat_lname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pat_lname']) && $this->nmgp_cmp_hidden['pat_lname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pat_lname" value="<?php echo $this->form_encode_input($pat_lname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pat_lname_line" id="hidden_field_data_pat_lname" style="<?php echo $sStyleHidden_pat_lname; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pat_lname_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pat_lname_label" style=""><span id="id_label_pat_lname"><?php echo $this->nm_new_label['pat_lname']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_lname"]) &&  $this->nmgp_cmp_readonly["pat_lname"] == "on") { 

 ?>
<input type="hidden" name="pat_lname" value="<?php echo $this->form_encode_input($pat_lname) . "\">" . $pat_lname . ""; ?>
<?php } else { ?>
<span id="id_read_on_pat_lname" class="sc-ui-readonly-pat_lname css_pat_lname_line" style="<?php echo $sStyleReadLab_pat_lname; ?>"><?php echo $this->form_format_readonly("pat_lname", $this->form_encode_input($this->pat_lname)); ?></span><span id="id_read_off_pat_lname" class="css_read_off_pat_lname<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pat_lname; ?>">
 <input class="sc-js-input scFormObjectOdd css_pat_lname_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pat_lname" type=text name="pat_lname" value="<?php echo $this->form_encode_input($pat_lname) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pat_lname_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pat_lname_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pat_blood']))
   {
       $this->nm_new_label['pat_blood'] = "Tipo Sanguíneo";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pat_blood = $this->pat_blood;
   $sStyleHidden_pat_blood = '';
   if (isset($this->nmgp_cmp_hidden['pat_blood']) && $this->nmgp_cmp_hidden['pat_blood'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pat_blood']);
       $sStyleHidden_pat_blood = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pat_blood = 'display: none;';
   $sStyleReadInp_pat_blood = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pat_blood']) && $this->nmgp_cmp_readonly['pat_blood'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pat_blood']);
       $sStyleReadLab_pat_blood = '';
       $sStyleReadInp_pat_blood = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pat_blood']) && $this->nmgp_cmp_hidden['pat_blood'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pat_blood" value="<?php echo $this->form_encode_input($this->pat_blood) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pat_blood_line" id="hidden_field_data_pat_blood" style="<?php echo $sStyleHidden_pat_blood; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pat_blood_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pat_blood_label" style=""><span id="id_label_pat_blood"><?php echo $this->nm_new_label['pat_blood']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_blood"]) &&  $this->nmgp_cmp_readonly["pat_blood"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood'] = array(); 
    }

   $old_value_anam_date = $this->anam_date;
   $old_value_anam_strtime = $this->anam_strtime;
   $old_value_pat_bod = $this->pat_bod;
   $old_value_anam_carsem = $this->anam_carsem;
   $old_value_anam_bpsys = $this->anam_bpsys;
   $old_value_anam_bpdia = $this->anam_bpdia;
   $old_value_anam_hbeat = $this->anam_hbeat;
   $old_value_anam_temp = $this->anam_temp;
   $old_value_anam_oxy = $this->anam_oxy;
   $old_value_anam_gluco = $this->anam_gluco;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_anam_date = $this->anam_date;
   $unformatted_value_anam_strtime = $this->anam_strtime;
   $unformatted_value_pat_bod = $this->pat_bod;
   $unformatted_value_anam_carsem = $this->anam_carsem;
   $unformatted_value_anam_bpsys = $this->anam_bpsys;
   $unformatted_value_anam_bpdia = $this->anam_bpdia;
   $unformatted_value_anam_hbeat = $this->anam_hbeat;
   $unformatted_value_anam_temp = $this->anam_temp;
   $unformatted_value_anam_oxy = $this->anam_oxy;
   $unformatted_value_anam_gluco = $this->anam_gluco;

   $nm_comando = "SELECT btyp_id, btyp_name  FROM bloodtypes  ORDER BY btyp_name";

   $this->anam_date = $old_value_anam_date;
   $this->anam_strtime = $old_value_anam_strtime;
   $this->pat_bod = $old_value_pat_bod;
   $this->anam_carsem = $old_value_anam_carsem;
   $this->anam_bpsys = $old_value_anam_bpsys;
   $this->anam_bpdia = $old_value_anam_bpdia;
   $this->anam_hbeat = $old_value_anam_hbeat;
   $this->anam_temp = $old_value_anam_temp;
   $this->anam_oxy = $old_value_anam_oxy;
   $this->anam_gluco = $old_value_anam_gluco;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_blood'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $pat_blood_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pat_blood_1))
          {
              foreach ($this->pat_blood_1 as $tmp_pat_blood)
              {
                  if (trim($tmp_pat_blood) === trim($cadaselect[1])) { $pat_blood_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pat_blood) === trim($cadaselect[1])) { $pat_blood_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pat_blood" value="<?php echo $this->form_encode_input($pat_blood) . "\">" . $pat_blood_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pat_blood();
   $x = 0 ; 
   $pat_blood_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pat_blood_1))
          {
              foreach ($this->pat_blood_1 as $tmp_pat_blood)
              {
                  if (trim($tmp_pat_blood) === trim($cadaselect[1])) { $pat_blood_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pat_blood) === trim($cadaselect[1])) { $pat_blood_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($pat_blood_look))
          {
              $pat_blood_look = $this->pat_blood;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pat_blood\" class=\"css_pat_blood_line\" style=\"" .  $sStyleReadLab_pat_blood . "\">" . $this->form_format_readonly("pat_blood", $this->form_encode_input($pat_blood_look)) . "</span><span id=\"id_read_off_pat_blood\" class=\"css_read_off_pat_blood" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_pat_blood . "\">";
   echo " <span id=\"idAjaxSelect_pat_blood\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_pat_blood_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_pat_blood\" name=\"pat_blood\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pat_blood) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pat_blood)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">" . str_replace('<', '&lt;',$cadaselect[0]) . "</option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pat_blood_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pat_blood_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_career']))
    {
        $this->nm_new_label['anam_career'] = "Carrera";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_career = $this->anam_career;
   $sStyleHidden_anam_career = '';
   if (isset($this->nmgp_cmp_hidden['anam_career']) && $this->nmgp_cmp_hidden['anam_career'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_career']);
       $sStyleHidden_anam_career = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_career = 'display: none;';
   $sStyleReadInp_anam_career = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_career']) && $this->nmgp_cmp_readonly['anam_career'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_career']);
       $sStyleReadLab_anam_career = '';
       $sStyleReadInp_anam_career = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_career']) && $this->nmgp_cmp_hidden['anam_career'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_career" value="<?php echo $this->form_encode_input($anam_career) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_career_line" id="hidden_field_data_anam_career" style="<?php echo $sStyleHidden_anam_career; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_career_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_career_label" style=""><span id="id_label_anam_career"><?php echo $this->nm_new_label['anam_career']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_career"]) &&  $this->nmgp_cmp_readonly["anam_career"] == "on") { 

 ?>
<input type="hidden" name="anam_career" value="<?php echo $this->form_encode_input($anam_career) . "\">" . $anam_career . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_career" class="sc-ui-readonly-anam_career css_anam_career_line" style="<?php echo $sStyleReadLab_anam_career; ?>"><?php echo $this->form_format_readonly("anam_career", $this->form_encode_input($this->anam_career)); ?></span><span id="id_read_off_anam_career" class="css_read_off_anam_career<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_career; ?>">
 <input class="sc-js-input scFormObjectOdd css_anam_career_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_career" type=text name="anam_career" value="<?php echo $this->form_encode_input($anam_career) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> maxlength=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_career_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_career_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pat_gerens']))
    {
        $this->nm_new_label['pat_gerens'] = "Genero";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pat_gerens = $this->pat_gerens;
   $sStyleHidden_pat_gerens = '';
   if (isset($this->nmgp_cmp_hidden['pat_gerens']) && $this->nmgp_cmp_hidden['pat_gerens'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pat_gerens']);
       $sStyleHidden_pat_gerens = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pat_gerens = 'display: none;';
   $sStyleReadInp_pat_gerens = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pat_gerens']) && $this->nmgp_cmp_readonly['pat_gerens'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pat_gerens']);
       $sStyleReadLab_pat_gerens = '';
       $sStyleReadInp_pat_gerens = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pat_gerens']) && $this->nmgp_cmp_hidden['pat_gerens'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pat_gerens" value="<?php echo $this->form_encode_input($pat_gerens) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pat_gerens_line" id="hidden_field_data_pat_gerens" style="<?php echo $sStyleHidden_pat_gerens; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pat_gerens_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pat_gerens_label" style=""><span id="id_label_pat_gerens"><?php echo $this->nm_new_label['pat_gerens']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_gerens"]) &&  $this->nmgp_cmp_readonly["pat_gerens"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens'] = array(); 
    }

   $old_value_anam_date = $this->anam_date;
   $old_value_anam_strtime = $this->anam_strtime;
   $old_value_pat_bod = $this->pat_bod;
   $old_value_anam_carsem = $this->anam_carsem;
   $old_value_anam_bpsys = $this->anam_bpsys;
   $old_value_anam_bpdia = $this->anam_bpdia;
   $old_value_anam_hbeat = $this->anam_hbeat;
   $old_value_anam_temp = $this->anam_temp;
   $old_value_anam_oxy = $this->anam_oxy;
   $old_value_anam_gluco = $this->anam_gluco;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_anam_date = $this->anam_date;
   $unformatted_value_anam_strtime = $this->anam_strtime;
   $unformatted_value_pat_bod = $this->pat_bod;
   $unformatted_value_anam_carsem = $this->anam_carsem;
   $unformatted_value_anam_bpsys = $this->anam_bpsys;
   $unformatted_value_anam_bpdia = $this->anam_bpdia;
   $unformatted_value_anam_hbeat = $this->anam_hbeat;
   $unformatted_value_anam_temp = $this->anam_temp;
   $unformatted_value_anam_oxy = $this->anam_oxy;
   $unformatted_value_anam_gluco = $this->anam_gluco;

   $nm_comando = "SELECT gerens_id, gerens_name  FROM gerens  ORDER BY gerens_name";

   $this->anam_date = $old_value_anam_date;
   $this->anam_strtime = $old_value_anam_strtime;
   $this->pat_bod = $old_value_pat_bod;
   $this->anam_carsem = $old_value_anam_carsem;
   $this->anam_bpsys = $old_value_anam_bpsys;
   $this->anam_bpdia = $old_value_anam_bpdia;
   $this->anam_hbeat = $old_value_anam_hbeat;
   $this->anam_temp = $old_value_anam_temp;
   $this->anam_oxy = $old_value_anam_oxy;
   $this->anam_gluco = $old_value_anam_gluco;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['Lookup_pat_gerens'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $x = 0; 
   $pat_gerens_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pat_gerens_1))
          {
              foreach ($this->pat_gerens_1 as $tmp_pat_gerens)
              {
                  if (trim($tmp_pat_gerens) === trim($cadaselect[1])) { $pat_gerens_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pat_gerens) === trim($cadaselect[1])) { $pat_gerens_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pat_gerens" value="<?php echo $this->form_encode_input($pat_gerens) . "\">" . $pat_gerens_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pat_gerens();
   $x = 0 ; 
   $pat_gerens_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pat_gerens_1))
          {
              foreach ($this->pat_gerens_1 as $tmp_pat_gerens)
              {
                  if (trim($tmp_pat_gerens) === trim($cadaselect[1])) { $pat_gerens_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pat_gerens) === trim($cadaselect[1])) { $pat_gerens_look .= $cadaselect[0]; } 
          $x++; 
   }
   $x = 0; 
   echo "<span id=\"id_read_on_pat_gerens\" class=\"css_pat_gerens_line\" style=\"" .  $sStyleReadLab_pat_gerens . "\">" . $this->form_format_readonly("pat_gerens", $this->form_encode_input($pat_gerens_look)) . "</span><span id=\"id_read_off_pat_gerens\" class=\"css_read_off_pat_gerens css_pat_gerens_line\" style=\"" . $sStyleReadInp_pat_gerens . "\">";
   echo "<div id=\"idAjaxRadio_pat_gerens\" class=\"css_pat_gerens_line\" style=\"display: inline-block\">\r\n";
   $y = 0 ; 
   echo "<table cellspacing=0 cellpadding=0 border=0>\r\n";
   echo " <tr>\r\n";
   while (!empty($todo[$x])) 
   {
          $cadaradio = explode("?#?", $todo[$x]) ; 
          if ($cadaradio[1] == "@ ") {$cadaradio[1]= trim($cadaradio[1]); } ; 
          if ($y == 1)
          {
              echo " </tr>\r\n";
              echo " <tr>\r\n";
              $y = 0;
          }
          echo "  <td class=\"scFormDataFontOdd css_pat_gerens_line\">\r\n";
          $tempOptionId = "id-opt-pat_gerens-" . $x;
          echo "    <input id=\"" . $tempOptionId . "\" type=radio name=\"pat_gerens\" value=\"$cadaradio[1]\" class=\"sc-ui-radio-pat_gerens sc-ui-radio-pat_gerens\"";
          if (trim($this->pat_gerens) === trim($cadaradio[1])) 
          { 
              echo " checked" ; 
          } 
          if (strtoupper($cadaradio[2]) == "S") 
          { 
              if (empty($this->pat_gerens)) 
              { 
                  echo " checked" ; 
              } 
          } 
          echo "  onClick=\"" . $sCheckInsert . "\" >" ; 
          echo "<label for=\"" . $tempOptionId . "\">" . $cadaradio[0] . "</label>";
          $x++ ; 
          $y++ ; 
          echo "  </font></td>\r\n";
   } 
   echo " </tr>\r\n";
   echo "</table>";
   echo "</div>\r\n";
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pat_gerens_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pat_gerens_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pat_phone']))
    {
        $this->nm_new_label['pat_phone'] = "Celular";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pat_phone = $this->pat_phone;
   $sStyleHidden_pat_phone = '';
   if (isset($this->nmgp_cmp_hidden['pat_phone']) && $this->nmgp_cmp_hidden['pat_phone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pat_phone']);
       $sStyleHidden_pat_phone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pat_phone = 'display: none;';
   $sStyleReadInp_pat_phone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pat_phone']) && $this->nmgp_cmp_readonly['pat_phone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pat_phone']);
       $sStyleReadLab_pat_phone = '';
       $sStyleReadInp_pat_phone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pat_phone']) && $this->nmgp_cmp_hidden['pat_phone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pat_phone" value="<?php echo $this->form_encode_input($pat_phone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pat_phone_line" id="hidden_field_data_pat_phone" style="<?php echo $sStyleHidden_pat_phone; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pat_phone_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_pat_phone_label" style=""><span id="id_label_pat_phone"><?php echo $this->nm_new_label['pat_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_phone"]) &&  $this->nmgp_cmp_readonly["pat_phone"] == "on") { 

 ?>
<input type="hidden" name="pat_phone" value="<?php echo $this->form_encode_input($pat_phone) . "\">" . $pat_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_pat_phone" class="sc-ui-readonly-pat_phone css_pat_phone_line" style="<?php echo $sStyleReadLab_pat_phone; ?>"><?php echo $this->form_format_readonly("pat_phone", $this->form_encode_input($this->pat_phone)); ?></span><span id="id_read_off_pat_phone" class="css_read_off_pat_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pat_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_pat_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pat_phone" type=text name="pat_phone" value="<?php echo $this->form_encode_input($pat_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pat_phone_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pat_phone_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_carsem']))
    {
        $this->nm_new_label['anam_carsem'] = "Semestre";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_carsem = $this->anam_carsem;
   $sStyleHidden_anam_carsem = '';
   if (isset($this->nmgp_cmp_hidden['anam_carsem']) && $this->nmgp_cmp_hidden['anam_carsem'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_carsem']);
       $sStyleHidden_anam_carsem = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_carsem = 'display: none;';
   $sStyleReadInp_anam_carsem = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_carsem']) && $this->nmgp_cmp_readonly['anam_carsem'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_carsem']);
       $sStyleReadLab_anam_carsem = '';
       $sStyleReadInp_anam_carsem = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_carsem']) && $this->nmgp_cmp_hidden['anam_carsem'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_carsem" value="<?php echo $this->form_encode_input($anam_carsem) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_carsem_line" id="hidden_field_data_anam_carsem" style="<?php echo $sStyleHidden_anam_carsem; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_carsem_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_carsem_label" style=""><span id="id_label_anam_carsem"><?php echo $this->nm_new_label['anam_carsem']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_carsem']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_carsem'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_carsem"]) &&  $this->nmgp_cmp_readonly["anam_carsem"] == "on") { 

 ?>
<input type="hidden" name="anam_carsem" value="<?php echo $this->form_encode_input($anam_carsem) . "\">" . $anam_carsem . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_carsem" class="sc-ui-readonly-anam_carsem css_anam_carsem_line" style="<?php echo $sStyleReadLab_anam_carsem; ?>"><?php echo $this->form_format_readonly("anam_carsem", $this->form_encode_input($this->anam_carsem)); ?></span><span id="id_read_off_anam_carsem" class="css_read_off_anam_carsem<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_carsem; ?>">
 <input class="sc-js-input scFormObjectOdd css_anam_carsem_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_carsem" type=text name="anam_carsem" value="<?php echo $this->form_encode_input($anam_carsem) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=11"; } ?> alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_carsem']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anam_carsem']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anam_carsem']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_carsem_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_carsem_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_anam_carsem_dumb = ('' == $sStyleHidden_anam_carsem) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_anam_carsem_dumb" style="<?php echo $sStyleHidden_anam_carsem_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>
   <td style="border:0;padding:0;height:0" class="scUiLabelWidthFix"></td>
   </tr>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Signos Vitales</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_bpsys']))
    {
        $this->nm_new_label['anam_bpsys'] = "Presión sistólica";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_bpsys = $this->anam_bpsys;
   $sStyleHidden_anam_bpsys = '';
   if (isset($this->nmgp_cmp_hidden['anam_bpsys']) && $this->nmgp_cmp_hidden['anam_bpsys'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_bpsys']);
       $sStyleHidden_anam_bpsys = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_bpsys = 'display: none;';
   $sStyleReadInp_anam_bpsys = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_bpsys']) && $this->nmgp_cmp_readonly['anam_bpsys'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_bpsys']);
       $sStyleReadLab_anam_bpsys = '';
       $sStyleReadInp_anam_bpsys = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_bpsys']) && $this->nmgp_cmp_hidden['anam_bpsys'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_bpsys" value="<?php echo $this->form_encode_input($anam_bpsys) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_bpsys_line" id="hidden_field_data_anam_bpsys" style="<?php echo $sStyleHidden_anam_bpsys; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_bpsys_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_bpsys_label" style=""><span id="id_label_anam_bpsys"><?php echo $this->nm_new_label['anam_bpsys']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_bpsys']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_bpsys'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_bpsys"]) &&  $this->nmgp_cmp_readonly["anam_bpsys"] == "on") { 

 ?>
<input type="hidden" name="anam_bpsys" value="<?php echo $this->form_encode_input($anam_bpsys) . "\">" . $anam_bpsys . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_bpsys" class="sc-ui-readonly-anam_bpsys css_anam_bpsys_line" style="<?php echo $sStyleReadLab_anam_bpsys; ?>"><?php echo $this->form_format_readonly("anam_bpsys", $this->form_encode_input($this->anam_bpsys)); ?></span><span id="id_read_off_anam_bpsys" class="css_read_off_anam_bpsys<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_bpsys; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_anam_bpsys_obj css_anam_bpsys_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_bpsys" type=text name="anam_bpsys" value="<?php echo $this->form_encode_input($anam_bpsys) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_bpsys']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anam_bpsys']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anam_bpsys']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_bpsys_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_bpsys_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_bpdia']))
    {
        $this->nm_new_label['anam_bpdia'] = "Presión diastólica";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_bpdia = $this->anam_bpdia;
   $sStyleHidden_anam_bpdia = '';
   if (isset($this->nmgp_cmp_hidden['anam_bpdia']) && $this->nmgp_cmp_hidden['anam_bpdia'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_bpdia']);
       $sStyleHidden_anam_bpdia = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_bpdia = 'display: none;';
   $sStyleReadInp_anam_bpdia = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_bpdia']) && $this->nmgp_cmp_readonly['anam_bpdia'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_bpdia']);
       $sStyleReadLab_anam_bpdia = '';
       $sStyleReadInp_anam_bpdia = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_bpdia']) && $this->nmgp_cmp_hidden['anam_bpdia'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_bpdia" value="<?php echo $this->form_encode_input($anam_bpdia) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_bpdia_line" id="hidden_field_data_anam_bpdia" style="<?php echo $sStyleHidden_anam_bpdia; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_bpdia_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_bpdia_label" style=""><span id="id_label_anam_bpdia"><?php echo $this->nm_new_label['anam_bpdia']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_bpdia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_bpdia'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_bpdia"]) &&  $this->nmgp_cmp_readonly["anam_bpdia"] == "on") { 

 ?>
<input type="hidden" name="anam_bpdia" value="<?php echo $this->form_encode_input($anam_bpdia) . "\">" . $anam_bpdia . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_bpdia" class="sc-ui-readonly-anam_bpdia css_anam_bpdia_line" style="<?php echo $sStyleReadLab_anam_bpdia; ?>"><?php echo $this->form_format_readonly("anam_bpdia", $this->form_encode_input($this->anam_bpdia)); ?></span><span id="id_read_off_anam_bpdia" class="css_read_off_anam_bpdia<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_bpdia; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_anam_bpdia_obj css_anam_bpdia_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_bpdia" type=text name="anam_bpdia" value="<?php echo $this->form_encode_input($anam_bpdia) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_bpdia']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anam_bpdia']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anam_bpdia']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_bpdia_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_bpdia_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_hbeat']))
    {
        $this->nm_new_label['anam_hbeat'] = "Ritmo Cardiaco";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_hbeat = $this->anam_hbeat;
   $sStyleHidden_anam_hbeat = '';
   if (isset($this->nmgp_cmp_hidden['anam_hbeat']) && $this->nmgp_cmp_hidden['anam_hbeat'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_hbeat']);
       $sStyleHidden_anam_hbeat = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_hbeat = 'display: none;';
   $sStyleReadInp_anam_hbeat = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_hbeat']) && $this->nmgp_cmp_readonly['anam_hbeat'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_hbeat']);
       $sStyleReadLab_anam_hbeat = '';
       $sStyleReadInp_anam_hbeat = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_hbeat']) && $this->nmgp_cmp_hidden['anam_hbeat'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_hbeat" value="<?php echo $this->form_encode_input($anam_hbeat) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_hbeat_line" id="hidden_field_data_anam_hbeat" style="<?php echo $sStyleHidden_anam_hbeat; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_hbeat_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_hbeat_label" style=""><span id="id_label_anam_hbeat"><?php echo $this->nm_new_label['anam_hbeat']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_hbeat']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_hbeat'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_hbeat"]) &&  $this->nmgp_cmp_readonly["anam_hbeat"] == "on") { 

 ?>
<input type="hidden" name="anam_hbeat" value="<?php echo $this->form_encode_input($anam_hbeat) . "\">" . $anam_hbeat . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_hbeat" class="sc-ui-readonly-anam_hbeat css_anam_hbeat_line" style="<?php echo $sStyleReadLab_anam_hbeat; ?>"><?php echo $this->form_format_readonly("anam_hbeat", $this->form_encode_input($this->anam_hbeat)); ?></span><span id="id_read_off_anam_hbeat" class="css_read_off_anam_hbeat<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_hbeat; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_anam_hbeat_obj css_anam_hbeat_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_hbeat" type=text name="anam_hbeat" value="<?php echo $this->form_encode_input($anam_hbeat) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_hbeat']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anam_hbeat']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anam_hbeat']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_hbeat_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_hbeat_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_temp']))
    {
        $this->nm_new_label['anam_temp'] = "Temperatura";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_temp = $this->anam_temp;
   $sStyleHidden_anam_temp = '';
   if (isset($this->nmgp_cmp_hidden['anam_temp']) && $this->nmgp_cmp_hidden['anam_temp'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_temp']);
       $sStyleHidden_anam_temp = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_temp = 'display: none;';
   $sStyleReadInp_anam_temp = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_temp']) && $this->nmgp_cmp_readonly['anam_temp'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_temp']);
       $sStyleReadLab_anam_temp = '';
       $sStyleReadInp_anam_temp = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_temp']) && $this->nmgp_cmp_hidden['anam_temp'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_temp" value="<?php echo $this->form_encode_input($anam_temp) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_temp_line" id="hidden_field_data_anam_temp" style="<?php echo $sStyleHidden_anam_temp; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_temp_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_temp_label" style=""><span id="id_label_anam_temp"><?php echo $this->nm_new_label['anam_temp']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_temp']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_temp'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_temp"]) &&  $this->nmgp_cmp_readonly["anam_temp"] == "on") { 

 ?>
<input type="hidden" name="anam_temp" value="<?php echo $this->form_encode_input($anam_temp) . "\">" . $anam_temp . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_temp" class="sc-ui-readonly-anam_temp css_anam_temp_line" style="<?php echo $sStyleReadLab_anam_temp; ?>"><?php echo $this->form_format_readonly("anam_temp", $this->form_encode_input($this->anam_temp)); ?></span><span id="id_read_off_anam_temp" class="css_read_off_anam_temp<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_temp; ?>">
 <input class="sc-js-input scFormObjectOdd css_anam_temp_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_temp" type=text name="anam_temp" value="<?php echo $this->form_encode_input($anam_temp) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=45"; } ?> alt="{datatype: 'decimal', maxLength: 45, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_temp']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_temp']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anam_temp']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anam_temp']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_temp_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_temp_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_oxy']))
    {
        $this->nm_new_label['anam_oxy'] = "Oxigenación";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_oxy = $this->anam_oxy;
   $sStyleHidden_anam_oxy = '';
   if (isset($this->nmgp_cmp_hidden['anam_oxy']) && $this->nmgp_cmp_hidden['anam_oxy'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_oxy']);
       $sStyleHidden_anam_oxy = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_oxy = 'display: none;';
   $sStyleReadInp_anam_oxy = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_oxy']) && $this->nmgp_cmp_readonly['anam_oxy'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_oxy']);
       $sStyleReadLab_anam_oxy = '';
       $sStyleReadInp_anam_oxy = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_oxy']) && $this->nmgp_cmp_hidden['anam_oxy'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_oxy" value="<?php echo $this->form_encode_input($anam_oxy) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_oxy_line" id="hidden_field_data_anam_oxy" style="<?php echo $sStyleHidden_anam_oxy; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_oxy_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_oxy_label" style=""><span id="id_label_anam_oxy"><?php echo $this->nm_new_label['anam_oxy']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_oxy']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis_mob']['php_cmp_required']['anam_oxy'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_oxy"]) &&  $this->nmgp_cmp_readonly["anam_oxy"] == "on") { 

 ?>
<input type="hidden" name="anam_oxy" value="<?php echo $this->form_encode_input($anam_oxy) . "\">" . $anam_oxy . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_oxy" class="sc-ui-readonly-anam_oxy css_anam_oxy_line" style="<?php echo $sStyleReadLab_anam_oxy; ?>"><?php echo $this->form_format_readonly("anam_oxy", $this->form_encode_input($this->anam_oxy)); ?></span><span id="id_read_off_anam_oxy" class="css_read_off_anam_oxy<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_oxy; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_anam_oxy_obj css_anam_oxy_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_oxy" type=text name="anam_oxy" value="<?php echo $this->form_encode_input($anam_oxy) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_oxy']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anam_oxy']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anam_oxy']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_oxy_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_oxy_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_gluco']))
    {
        $this->nm_new_label['anam_gluco'] = "Glucosa";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_gluco = $this->anam_gluco;
   $sStyleHidden_anam_gluco = '';
   if (isset($this->nmgp_cmp_hidden['anam_gluco']) && $this->nmgp_cmp_hidden['anam_gluco'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_gluco']);
       $sStyleHidden_anam_gluco = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_gluco = 'display: none;';
   $sStyleReadInp_anam_gluco = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_gluco']) && $this->nmgp_cmp_readonly['anam_gluco'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_gluco']);
       $sStyleReadLab_anam_gluco = '';
       $sStyleReadInp_anam_gluco = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_gluco']) && $this->nmgp_cmp_hidden['anam_gluco'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_gluco" value="<?php echo $this->form_encode_input($anam_gluco) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_gluco_line" id="hidden_field_data_anam_gluco" style="<?php echo $sStyleHidden_anam_gluco; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_gluco_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_gluco_label" style=""><span id="id_label_anam_gluco"><?php echo $this->nm_new_label['anam_gluco']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_gluco"]) &&  $this->nmgp_cmp_readonly["anam_gluco"] == "on") { 

 ?>
<input type="hidden" name="anam_gluco" value="<?php echo $this->form_encode_input($anam_gluco) . "\">" . $anam_gluco . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_gluco" class="sc-ui-readonly-anam_gluco css_anam_gluco_line" style="<?php echo $sStyleReadLab_anam_gluco; ?>"><?php echo $this->form_format_readonly("anam_gluco", $this->form_encode_input($this->anam_gluco)); ?></span><span id="id_read_off_anam_gluco" class="css_read_off_anam_gluco<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_gluco; ?>">
 <input class="sc-js-input scFormObjectOdd scFormObjectOddSpin scSpin_anam_gluco_obj css_anam_gluco_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_gluco" type=text name="anam_gluco" value="<?php echo $this->form_encode_input($anam_gluco) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=12"; } ?> alt="{datatype: 'integer', maxLength: 12, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['anam_gluco']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['anam_gluco']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['anam_gluco']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_gluco_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_gluco_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_anam_gluco_dumb = ('' == $sStyleHidden_anam_gluco) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_anam_gluco_dumb" style="<?php echo $sStyleHidden_anam_gluco_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_3"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_3"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_3" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;">   <tr>
   <td style="border:0;padding:0;height:0" class="scUiLabelWidthFix"></td>
   </tr>
   <tr>


    <TD colspan="1" height="20" class="scFormBlock">
     <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
      <TR>
       <TD align="" valign="" class="scFormBlockFont">Alergias</TD>
       
      </TR>
     </TABLE>
    </TD>




   </tr>
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['anam_aller']))
    {
        $this->nm_new_label['anam_aller'] = "Alergias";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $anam_aller = $this->anam_aller;
   $sStyleHidden_anam_aller = '';
   if (isset($this->nmgp_cmp_hidden['anam_aller']) && $this->nmgp_cmp_hidden['anam_aller'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['anam_aller']);
       $sStyleHidden_anam_aller = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_anam_aller = 'display: none;';
   $sStyleReadInp_anam_aller = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['anam_aller']) && $this->nmgp_cmp_readonly['anam_aller'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['anam_aller']);
       $sStyleReadLab_anam_aller = '';
       $sStyleReadInp_anam_aller = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['anam_aller']) && $this->nmgp_cmp_hidden['anam_aller'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="anam_aller" value="<?php echo $this->form_encode_input($anam_aller) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_anam_aller_line" id="hidden_field_data_anam_aller" style="<?php echo $sStyleHidden_anam_aller; ?>vertical-align: top;"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_anam_aller_line" style="vertical-align: top;padding: 0px"><span class="scFormLabelOddFormat css_anam_aller_label" style=""><span id="id_label_anam_aller"><?php echo $this->nm_new_label['anam_aller']; ?></span></span><br>
<?php
$anam_aller_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($anam_aller));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_aller"]) &&  $this->nmgp_cmp_readonly["anam_aller"] == "on") { 

 ?>
<input type="hidden" name="anam_aller" value="<?php echo $this->form_encode_input($anam_aller) . "\">" . $anam_aller_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_aller" class="sc-ui-readonly-anam_aller css_anam_aller_line" style="<?php echo $sStyleReadLab_anam_aller; ?>"><?php echo $this->form_format_readonly("anam_aller", $this->form_encode_input($anam_aller_val)); ?></span><span id="id_read_off_anam_aller" class="css_read_off_anam_aller<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_aller; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_anam_aller_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;resize: vertical;" name="anam_aller" id="id_sc_field_anam_aller" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $anam_aller; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_anam_aller_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_anam_aller_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </tr>
</TABLE></div><!-- bloco_f -->
   </td></tr></table>
   </div>
