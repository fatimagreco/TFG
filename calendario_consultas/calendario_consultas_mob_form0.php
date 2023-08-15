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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " " . $this->Ini->Nm_lang['lang_tbl_Consultas'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " " . $this->Ini->Nm_lang['lang_tbl_Consultas'] . ""); } ?></TITLE>
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
                       'navigationBarButtons' => unserialize('a:0:{}'),
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
.css_read_off_consul_date button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>calendario_consultas/calendario_consultas_mob_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = true;
var scFocusFirstErrorName  = "<?php if (isset($this->scFormFocusErrorName)) {echo $this->scFormFocusErrorName;} ?>";
</script>

<?php
include_once("calendario_consultas_mob_sajax_js.php");
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
var Nav_binicio_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['first']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['first'] : 'off'); ?>";
var Nav_bavanca_macro_disabled  = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['forward']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['forward'] : 'off'); ?>";
var Nav_bretorna_macro_disabled = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['back']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['back'] : 'off'); ?>";
var Nav_bfinal_macro_disabled   = "<?php echo (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['last']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['last'] : 'off'); ?>";
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

 function sc_calendar_all_day_click() {
  
 } // sc_calendar_all_day_click

 function sc_calendar_recurrence_change() {
  
 } // sc_calendar_recurrence_change
<?php

include_once('calendario_consultas_mob_jquery.php');

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

  sc_calendar_all_day_click();
  sc_calendar_recurrence_change();

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
   });
 if($(".sc-ui-block-control").length) {
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['link_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['link_info']['remove_margin']) {
        $remove_margin = 'margin: 0; ';
    }
    if ('' != $remove_margin && isset($str_iframe_body) && '' != $str_iframe_body) {
        $str_iframe_body = '';
    }
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['link_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['link_info']['remove_border']) {
        $remove_border = 'border-width: 0; ';
    }
    $vertical_center = 'display: flex; flex-direction: column; justify-content: flex-start; margin: 0px; min-height: 100vh;';
?>
<body class="scFormPage sc-app-calendar" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (isset($_SESSION['scriptcase']['calendario_consultas']['error_buffer']) && '' != $_SESSION['scriptcase']['calendario_consultas']['error_buffer'])
{
    echo $_SESSION['scriptcase']['calendario_consultas']['error_buffer'];
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
 include_once("calendario_consultas_mob_js0.php");
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
               action="calendario_consultas_mob.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['insert_validation']; ?>">
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
<input type="hidden" name="consul_id" value="<?php  echo $this->form_encode_input($this->consul_id) ?>">
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['calendario_consultas_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['calendario_consultas_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar sc-toolbar-top" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
    $NM_btn = false;
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "R")
{
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-14';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['new']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['new']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['new']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['new']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['new'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-15';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['insert']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['insert']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['insert']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['insert']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['insert'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Enter)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-16';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['update']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['update']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['update']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['update']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['update'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + S)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['delete'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-17';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['delete']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['delete']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['delete']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['delete']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['delete'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bexcluir", "scBtnFn_sys_format_exc()", "scBtnFn_sys_format_exc()", "sc_b_del_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Ctrl + Delete)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-18';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label'][''];
        }
?>
<?php
if (is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Img_sep_form))
{
    if (isset($NM_btn) && $NM_btn)
    {
        $NM_btn = false;
        $NM_ult_sep = "NM_sep_2";
        echo "<img id=\"NM_sep_2\" class=\"NM_toolbar_sep\" style=\"vertical-align: middle\" src=\"" . $this->Ini->path_botoes . $this->Ini->Img_sep_form . "\" />";
    }
}
?>
 
<?php
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
<?php
        $buttonMacroDisabled = '';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['help']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['help']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['help']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['help']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['help'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (F1)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call || $this->form_3versions_single) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-19';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-20';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
<?php
        $buttonMacroDisabled = 'sc-unique-btn-21';
        $buttonMacroLabel = "";

        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['exit']) && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_disabled']['exit']) {
            $buttonMacroDisabled .= ' disabled';
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit']) {
            $buttonMacroLabel = $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['btn_label']['exit'];
        }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "" . $buttonMacroLabel . "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "__NM_HINT__ (Alt + Q)", "" . $buttonMacroDisabled . "", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
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

    <TD class="scFormDataOdd css_pati_id_line" id="hidden_field_data_pati_id" style="<?php echo $sStyleHidden_pati_id; ?>"> <span class="scFormLabelOddFormat css_pati_id_label" style=""><span id="id_label_pati_id"><?php echo $this->nm_new_label['pati_id']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pati_id"]) &&  $this->nmgp_cmp_readonly["pati_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id'] = array(); 
    }

   $old_value_pat_bod = $this->pat_bod;
   $old_value_pati_famname = $this->pati_famname;
   $old_value_consul_date = $this->consul_date;
   $old_value_consul_strtime = $this->consul_strtime;
   $old_value_consul_endtime = $this->consul_endtime;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_pat_bod = $this->pat_bod;
   $unformatted_value_pati_famname = $this->pati_famname;
   $unformatted_value_consul_date = $this->consul_date;
   $unformatted_value_consul_strtime = $this->consul_strtime;
   $unformatted_value_consul_endtime = $this->consul_endtime;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT pati_id, pati_docnum + \"-\" + pati_name + \"-\" + pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT pati_id, concat(pati_docnum, \"-\" , pati_name, \"-\" ,  pati_lname)  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT pati_id, pati_docnum&\"-\"&pati_name&\"-\"&pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT pati_id, pati_docnum||\"-\"||pati_name||\"-\"||pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }
   else
   {
       $nm_comando = "SELECT pati_id, pati_docnum||\"-\"||pati_name||\"-\"||pati_lname  FROM patients  ORDER BY pati_docnum, pati_name, pati_lname";
   }

   $this->pat_bod = $old_value_pat_bod;
   $this->pati_famname = $old_value_pati_famname;
   $this->consul_date = $old_value_consul_date;
   $this->consul_strtime = $old_value_consul_strtime;
   $this->consul_endtime = $old_value_consul_endtime;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pati_id'][] = $rs->fields[0];
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
 </TD>
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

    <TD class="scFormDataOdd css_pat_phone_line" id="hidden_field_data_pat_phone" style="<?php echo $sStyleHidden_pat_phone; ?>"> <span class="scFormLabelOddFormat css_pat_phone_label" style=""><span id="id_label_pat_phone"><?php echo $this->nm_new_label['pat_phone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_phone"]) &&  $this->nmgp_cmp_readonly["pat_phone"] == "on") { 

 ?>
<input type="hidden" name="pat_phone" value="<?php echo $this->form_encode_input($pat_phone) . "\">" . $pat_phone . ""; ?>
<?php } else { ?>
<span id="id_read_on_pat_phone" class="sc-ui-readonly-pat_phone css_pat_phone_line" style="<?php echo $sStyleReadLab_pat_phone; ?>"><?php echo $this->form_format_readonly("pat_phone", $this->form_encode_input($this->pat_phone)); ?></span><span id="id_read_off_pat_phone" class="css_read_off_pat_phone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pat_phone; ?>">
 <input class="sc-js-input scFormObjectOdd css_pat_phone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pat_phone" type=text name="pat_phone" value="<?php echo $this->form_encode_input($pat_phone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
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

    <TD class="scFormDataOdd css_pat_lname_line" id="hidden_field_data_pat_lname" style="<?php echo $sStyleHidden_pat_lname; ?>"> <span class="scFormLabelOddFormat css_pat_lname_label" style=""><span id="id_label_pat_lname"><?php echo $this->nm_new_label['pat_lname']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_lname"]) &&  $this->nmgp_cmp_readonly["pat_lname"] == "on") { 

 ?>
<input type="hidden" name="pat_lname" value="<?php echo $this->form_encode_input($pat_lname) . "\">" . $pat_lname . ""; ?>
<?php } else { ?>
<span id="id_read_on_pat_lname" class="sc-ui-readonly-pat_lname css_pat_lname_line" style="<?php echo $sStyleReadLab_pat_lname; ?>"><?php echo $this->form_format_readonly("pat_lname", $this->form_encode_input($this->pat_lname)); ?></span><span id="id_read_off_pat_lname" class="css_read_off_pat_lname<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pat_lname; ?>">
 <input class="sc-js-input scFormObjectOdd css_pat_lname_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pat_lname" type=text name="pat_lname" value="<?php echo $this->form_encode_input($pat_lname) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
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

    <TD class="scFormDataOdd css_pat_name_line" id="hidden_field_data_pat_name" style="<?php echo $sStyleHidden_pat_name; ?>"> <span class="scFormLabelOddFormat css_pat_name_label" style=""><span id="id_label_pat_name"><?php echo $this->nm_new_label['pat_name']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_name"]) &&  $this->nmgp_cmp_readonly["pat_name"] == "on") { 

 ?>
<input type="hidden" name="pat_name" value="<?php echo $this->form_encode_input($pat_name) . "\">" . $pat_name . ""; ?>
<?php } else { ?>
<span id="id_read_on_pat_name" class="sc-ui-readonly-pat_name css_pat_name_line" style="<?php echo $sStyleReadLab_pat_name; ?>"><?php echo $this->form_format_readonly("pat_name", $this->form_encode_input($this->pat_name)); ?></span><span id="id_read_off_pat_name" class="css_read_off_pat_name<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pat_name; ?>">
 <input class="sc-js-input scFormObjectOdd css_pat_name_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pat_name" type=text name="pat_name" value="<?php echo $this->form_encode_input($pat_name) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
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

    <TD class="scFormDataOdd css_pat_bod_line" id="hidden_field_data_pat_bod" style="<?php echo $sStyleHidden_pat_bod; ?>"> <span class="scFormLabelOddFormat css_pat_bod_label" style=""><span id="id_label_pat_bod"><?php echo $this->nm_new_label['pat_bod']; ?></span></span><br>
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
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['pat_bod']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['pat_bod']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
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

    <TD class="scFormDataOdd css_pat_gerens_line" id="hidden_field_data_pat_gerens" style="<?php echo $sStyleHidden_pat_gerens; ?>"> <span class="scFormLabelOddFormat css_pat_gerens_label" style=""><span id="id_label_pat_gerens"><?php echo $this->nm_new_label['pat_gerens']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pat_gerens"]) &&  $this->nmgp_cmp_readonly["pat_gerens"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens'] = array(); 
    }

   $old_value_pat_bod = $this->pat_bod;
   $old_value_pati_famname = $this->pati_famname;
   $old_value_consul_date = $this->consul_date;
   $old_value_consul_strtime = $this->consul_strtime;
   $old_value_consul_endtime = $this->consul_endtime;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_pat_bod = $this->pat_bod;
   $unformatted_value_pati_famname = $this->pati_famname;
   $unformatted_value_consul_date = $this->consul_date;
   $unformatted_value_consul_strtime = $this->consul_strtime;
   $unformatted_value_consul_endtime = $this->consul_endtime;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT gerens_id, gerens_name  FROM gerens  ORDER BY gerens_name";

   $this->pat_bod = $old_value_pat_bod;
   $this->pati_famname = $old_value_pati_famname;
   $this->consul_date = $old_value_consul_date;
   $this->consul_strtime = $old_value_consul_strtime;
   $this->consul_endtime = $old_value_consul_endtime;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_pat_gerens'][] = $rs->fields[0];
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
 </TD>
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

    <TD class="scFormDataOdd css_anam_career_line" id="hidden_field_data_anam_career" style="<?php echo $sStyleHidden_anam_career; ?>"> <span class="scFormLabelOddFormat css_anam_career_label" style=""><span id="id_label_anam_career"><?php echo $this->nm_new_label['anam_career']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_career"]) &&  $this->nmgp_cmp_readonly["anam_career"] == "on") { 

 ?>
<input type="hidden" name="anam_career" value="<?php echo $this->form_encode_input($anam_career) . "\">" . $anam_career . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_career" class="sc-ui-readonly-anam_career css_anam_career_line" style="<?php echo $sStyleReadLab_anam_career; ?>"><?php echo $this->form_format_readonly("anam_career", $this->form_encode_input($this->anam_career)); ?></span><span id="id_read_off_anam_career" class="css_read_off_anam_career<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_career; ?>">
 <input class="sc-js-input scFormObjectOdd css_anam_career_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_career" type=text name="anam_career" value="<?php echo $this->form_encode_input($anam_career) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
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

    <TD class="scFormDataOdd css_anam_carsem_line" id="hidden_field_data_anam_carsem" style="<?php echo $sStyleHidden_anam_carsem; ?>"> <span class="scFormLabelOddFormat css_anam_carsem_label" style=""><span id="id_label_anam_carsem"><?php echo $this->nm_new_label['anam_carsem']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["anam_carsem"]) &&  $this->nmgp_cmp_readonly["anam_carsem"] == "on") { 

 ?>
<input type="hidden" name="anam_carsem" value="<?php echo $this->form_encode_input($anam_carsem) . "\">" . $anam_carsem . ""; ?>
<?php } else { ?>
<span id="id_read_on_anam_carsem" class="sc-ui-readonly-anam_carsem css_anam_carsem_line" style="<?php echo $sStyleReadLab_anam_carsem; ?>"><?php echo $this->form_format_readonly("anam_carsem", $this->form_encode_input($this->anam_carsem)); ?></span><span id="id_read_off_anam_carsem" class="css_read_off_anam_carsem<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_anam_carsem; ?>">
 <input class="sc-js-input scFormObjectOdd css_anam_carsem_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_anam_carsem" type=text name="anam_carsem" value="<?php echo $this->form_encode_input($anam_carsem) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['btyp_id']))
   {
       $this->nm_new_label['btyp_id'] = "Grupo Sanguíneo";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $btyp_id = $this->btyp_id;
   $sStyleHidden_btyp_id = '';
   if (isset($this->nmgp_cmp_hidden['btyp_id']) && $this->nmgp_cmp_hidden['btyp_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['btyp_id']);
       $sStyleHidden_btyp_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_btyp_id = 'display: none;';
   $sStyleReadInp_btyp_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['btyp_id']) && $this->nmgp_cmp_readonly['btyp_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['btyp_id']);
       $sStyleReadLab_btyp_id = '';
       $sStyleReadInp_btyp_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['btyp_id']) && $this->nmgp_cmp_hidden['btyp_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="btyp_id" value="<?php echo $this->form_encode_input($this->btyp_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_btyp_id_line" id="hidden_field_data_btyp_id" style="<?php echo $sStyleHidden_btyp_id; ?>"> <span class="scFormLabelOddFormat css_btyp_id_label" style=""><span id="id_label_btyp_id"><?php echo $this->nm_new_label['btyp_id']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["btyp_id"]) &&  $this->nmgp_cmp_readonly["btyp_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id'] = array(); 
    }

   $old_value_pat_bod = $this->pat_bod;
   $old_value_pati_famname = $this->pati_famname;
   $old_value_consul_date = $this->consul_date;
   $old_value_consul_strtime = $this->consul_strtime;
   $old_value_consul_endtime = $this->consul_endtime;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_pat_bod = $this->pat_bod;
   $unformatted_value_pati_famname = $this->pati_famname;
   $unformatted_value_consul_date = $this->consul_date;
   $unformatted_value_consul_strtime = $this->consul_strtime;
   $unformatted_value_consul_endtime = $this->consul_endtime;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT btyp_id, btyp_name  FROM bloodtypes  ORDER BY btyp_name";

   $this->pat_bod = $old_value_pat_bod;
   $this->pati_famname = $old_value_pati_famname;
   $this->consul_date = $old_value_consul_date;
   $this->consul_strtime = $old_value_consul_strtime;
   $this->consul_endtime = $old_value_consul_endtime;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_btyp_id'][] = $rs->fields[0];
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
   $btyp_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->btyp_id_1))
          {
              foreach ($this->btyp_id_1 as $tmp_btyp_id)
              {
                  if (trim($tmp_btyp_id) === trim($cadaselect[1])) { $btyp_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->btyp_id) === trim($cadaselect[1])) { $btyp_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="btyp_id" value="<?php echo $this->form_encode_input($btyp_id) . "\">" . $btyp_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_btyp_id();
   $x = 0 ; 
   $btyp_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->btyp_id_1))
          {
              foreach ($this->btyp_id_1 as $tmp_btyp_id)
              {
                  if (trim($tmp_btyp_id) === trim($cadaselect[1])) { $btyp_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->btyp_id) === trim($cadaselect[1])) { $btyp_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($btyp_id_look))
          {
              $btyp_id_look = $this->btyp_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_btyp_id\" class=\"css_btyp_id_line\" style=\"" .  $sStyleReadLab_btyp_id . "\">" . $this->form_format_readonly("btyp_id", $this->form_encode_input($btyp_id_look)) . "</span><span id=\"id_read_off_btyp_id\" class=\"css_read_off_btyp_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_btyp_id . "\">";
   echo " <span id=\"idAjaxSelect_btyp_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_btyp_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_btyp_id\" name=\"btyp_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->btyp_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->btyp_id)) 
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
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pati_famphone']))
    {
        $this->nm_new_label['pati_famphone'] = "Nombre Familiar";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pati_famphone = $this->pati_famphone;
   $sStyleHidden_pati_famphone = '';
   if (isset($this->nmgp_cmp_hidden['pati_famphone']) && $this->nmgp_cmp_hidden['pati_famphone'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pati_famphone']);
       $sStyleHidden_pati_famphone = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pati_famphone = 'display: none;';
   $sStyleReadInp_pati_famphone = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pati_famphone']) && $this->nmgp_cmp_readonly['pati_famphone'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pati_famphone']);
       $sStyleReadLab_pati_famphone = '';
       $sStyleReadInp_pati_famphone = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pati_famphone']) && $this->nmgp_cmp_hidden['pati_famphone'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pati_famphone" value="<?php echo $this->form_encode_input($pati_famphone) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pati_famphone_line" id="hidden_field_data_pati_famphone" style="<?php echo $sStyleHidden_pati_famphone; ?>"> <span class="scFormLabelOddFormat css_pati_famphone_label" style=""><span id="id_label_pati_famphone"><?php echo $this->nm_new_label['pati_famphone']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pati_famphone"]) &&  $this->nmgp_cmp_readonly["pati_famphone"] == "on") { 

 ?>
<input type="hidden" name="pati_famphone" value="<?php echo $this->form_encode_input($pati_famphone) . "\">" . $pati_famphone . ""; ?>
<?php } else { ?>
<span id="id_read_on_pati_famphone" class="sc-ui-readonly-pati_famphone css_pati_famphone_line" style="<?php echo $sStyleReadLab_pati_famphone; ?>"><?php echo $this->form_format_readonly("pati_famphone", $this->form_encode_input($this->pati_famphone)); ?></span><span id="id_read_off_pati_famphone" class="css_read_off_pati_famphone<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pati_famphone; ?>">
 <input class="sc-js-input scFormObjectOdd css_pati_famphone_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pati_famphone" type=text name="pati_famphone" value="<?php echo $this->form_encode_input($pati_famphone) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['pati_famname']))
    {
        $this->nm_new_label['pati_famname'] = "Numero  Familiar";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pati_famname = $this->pati_famname;
   $sStyleHidden_pati_famname = '';
   if (isset($this->nmgp_cmp_hidden['pati_famname']) && $this->nmgp_cmp_hidden['pati_famname'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pati_famname']);
       $sStyleHidden_pati_famname = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pati_famname = 'display: none;';
   $sStyleReadInp_pati_famname = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pati_famname']) && $this->nmgp_cmp_readonly['pati_famname'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pati_famname']);
       $sStyleReadLab_pati_famname = '';
       $sStyleReadInp_pati_famname = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pati_famname']) && $this->nmgp_cmp_hidden['pati_famname'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="pati_famname" value="<?php echo $this->form_encode_input($pati_famname) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_pati_famname_line" id="hidden_field_data_pati_famname" style="<?php echo $sStyleHidden_pati_famname; ?>"> <span class="scFormLabelOddFormat css_pati_famname_label" style=""><span id="id_label_pati_famname"><?php echo $this->nm_new_label['pati_famname']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pati_famname"]) &&  $this->nmgp_cmp_readonly["pati_famname"] == "on") { 

 ?>
<input type="hidden" name="pati_famname" value="<?php echo $this->form_encode_input($pati_famname) . "\">" . $pati_famname . ""; ?>
<?php } else { ?>
<span id="id_read_on_pati_famname" class="sc-ui-readonly-pati_famname css_pati_famname_line" style="<?php echo $sStyleReadLab_pati_famname; ?>"><?php echo $this->form_format_readonly("pati_famname", $this->form_encode_input($this->pati_famname)); ?></span><span id="id_read_off_pati_famname" class="css_read_off_pati_famname<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_pati_famname; ?>">
 <input class="sc-js-input scFormObjectOdd css_pati_famname_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_pati_famname" type=text name="pati_famname" value="<?php echo $this->form_encode_input($pati_famname) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'integer', maxLength: 20, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['pati_famname']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['pati_famname']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['pati_famname']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_pati_famname_dumb = ('' == $sStyleHidden_pati_famname) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_pati_famname_dumb" style="<?php echo $sStyleHidden_pati_famname_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_1"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_1"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_1" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consul_date']))
    {
        $this->nm_new_label['consul_date'] = "Fecha";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consul_date = $this->consul_date;
   $sStyleHidden_consul_date = '';
   if (isset($this->nmgp_cmp_hidden['consul_date']) && $this->nmgp_cmp_hidden['consul_date'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consul_date']);
       $sStyleHidden_consul_date = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consul_date = 'display: none;';
   $sStyleReadInp_consul_date = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consul_date']) && $this->nmgp_cmp_readonly['consul_date'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consul_date']);
       $sStyleReadLab_consul_date = '';
       $sStyleReadInp_consul_date = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consul_date']) && $this->nmgp_cmp_hidden['consul_date'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consul_date" value="<?php echo $this->form_encode_input($consul_date) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_consul_date_line" id="hidden_field_data_consul_date" style="<?php echo $sStyleHidden_consul_date; ?>"> <span class="scFormLabelOddFormat css_consul_date_label" style=""><span id="id_label_consul_date"><?php echo $this->nm_new_label['consul_date']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['php_cmp_required']['consul_date']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['php_cmp_required']['consul_date'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consul_date"]) &&  $this->nmgp_cmp_readonly["consul_date"] == "on") { 

 ?>
<input type="hidden" name="consul_date" value="<?php echo $this->form_encode_input($consul_date) . "\">" . $consul_date . ""; ?>
<?php } else { ?>
<span id="id_read_on_consul_date" class="sc-ui-readonly-consul_date css_consul_date_line" style="<?php echo $sStyleReadLab_consul_date; ?>"><?php echo $this->form_format_readonly("consul_date", $this->form_encode_input($consul_date)); ?></span><span id="id_read_off_consul_date" class="css_read_off_consul_date<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consul_date; ?>"><?php
$tmp_form_data = $this->field_config['consul_date']['date_format'];
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

 <input class="sc-js-input scFormObjectOdd css_consul_date_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_consul_date" type=text name="consul_date" value="<?php echo $this->form_encode_input($consul_date) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=10"; } ?> alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['consul_date']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['consul_date']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
</span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consul_strtime']))
    {
        $this->nm_new_label['consul_strtime'] = "Hora Inicio";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consul_strtime = $this->consul_strtime;
   $sStyleHidden_consul_strtime = '';
   if (isset($this->nmgp_cmp_hidden['consul_strtime']) && $this->nmgp_cmp_hidden['consul_strtime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consul_strtime']);
       $sStyleHidden_consul_strtime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consul_strtime = 'display: none;';
   $sStyleReadInp_consul_strtime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consul_strtime']) && $this->nmgp_cmp_readonly['consul_strtime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consul_strtime']);
       $sStyleReadLab_consul_strtime = '';
       $sStyleReadInp_consul_strtime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consul_strtime']) && $this->nmgp_cmp_hidden['consul_strtime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consul_strtime" value="<?php echo $this->form_encode_input($consul_strtime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_consul_strtime_line" id="hidden_field_data_consul_strtime" style="<?php echo $sStyleHidden_consul_strtime; ?>"> <span class="scFormLabelOddFormat css_consul_strtime_label" style=""><span id="id_label_consul_strtime"><?php echo $this->nm_new_label['consul_strtime']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consul_strtime"]) &&  $this->nmgp_cmp_readonly["consul_strtime"] == "on") { 

 ?>
<input type="hidden" name="consul_strtime" value="<?php echo $this->form_encode_input($consul_strtime) . "\">" . $consul_strtime . ""; ?>
<?php } else { ?>
<span id="id_read_on_consul_strtime" class="sc-ui-readonly-consul_strtime css_consul_strtime_line" style="<?php echo $sStyleReadLab_consul_strtime; ?>"><?php echo $this->form_format_readonly("consul_strtime", $this->form_encode_input($consul_strtime)); ?></span><span id="id_read_off_consul_strtime" class="css_read_off_consul_strtime<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consul_strtime; ?>"><?php
$tmp_form_data = $this->field_config['consul_strtime']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_consul_strtime_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_consul_strtime" type=text name="consul_strtime" value="<?php echo $this->form_encode_input($consul_strtime) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['consul_strtime']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['consul_strtime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consul_endtime']))
    {
        $this->nm_new_label['consul_endtime'] = "Hora Final";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consul_endtime = $this->consul_endtime;
   $sStyleHidden_consul_endtime = '';
   if (isset($this->nmgp_cmp_hidden['consul_endtime']) && $this->nmgp_cmp_hidden['consul_endtime'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consul_endtime']);
       $sStyleHidden_consul_endtime = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consul_endtime = 'display: none;';
   $sStyleReadInp_consul_endtime = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consul_endtime']) && $this->nmgp_cmp_readonly['consul_endtime'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consul_endtime']);
       $sStyleReadLab_consul_endtime = '';
       $sStyleReadInp_consul_endtime = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consul_endtime']) && $this->nmgp_cmp_hidden['consul_endtime'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consul_endtime" value="<?php echo $this->form_encode_input($consul_endtime) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_consul_endtime_line" id="hidden_field_data_consul_endtime" style="<?php echo $sStyleHidden_consul_endtime; ?>"> <span class="scFormLabelOddFormat css_consul_endtime_label" style=""><span id="id_label_consul_endtime"><?php echo $this->nm_new_label['consul_endtime']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consul_endtime"]) &&  $this->nmgp_cmp_readonly["consul_endtime"] == "on") { 

 ?>
<input type="hidden" name="consul_endtime" value="<?php echo $this->form_encode_input($consul_endtime) . "\">" . $consul_endtime . ""; ?>
<?php } else { ?>
<span id="id_read_on_consul_endtime" class="sc-ui-readonly-consul_endtime css_consul_endtime_line" style="<?php echo $sStyleReadLab_consul_endtime; ?>"><?php echo $this->form_format_readonly("consul_endtime", $this->form_encode_input($consul_endtime)); ?></span><span id="id_read_off_consul_endtime" class="css_read_off_consul_endtime<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consul_endtime; ?>"><?php
$tmp_form_data = $this->field_config['consul_endtime']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>

 <input class="sc-js-input scFormObjectOdd css_consul_endtime_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="" id="id_sc_field_consul_endtime" type=text name="consul_endtime" value="<?php echo $this->form_encode_input($consul_endtime) ?>"
 <?php if ($this->classes_100perc_fields['keep_field_size']) { echo "size=8"; } ?> alt="{datatype: 'time', timeSep: '<?php echo $this->field_config['consul_endtime']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['consul_endtime']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '<?php echo $tmp_form_data; ?>', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['user_id']))
   {
       $this->nm_new_label['user_id'] = "Tratante";
   }
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $user_id = $this->user_id;
   $sStyleHidden_user_id = '';
   if (isset($this->nmgp_cmp_hidden['user_id']) && $this->nmgp_cmp_hidden['user_id'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['user_id']);
       $sStyleHidden_user_id = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_user_id = 'display: none;';
   $sStyleReadInp_user_id = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['user_id']) && $this->nmgp_cmp_readonly['user_id'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['user_id']);
       $sStyleReadLab_user_id = '';
       $sStyleReadInp_user_id = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['user_id']) && $this->nmgp_cmp_hidden['user_id'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="user_id" value="<?php echo $this->form_encode_input($this->user_id) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_user_id_line" id="hidden_field_data_user_id" style="<?php echo $sStyleHidden_user_id; ?>"> <span class="scFormLabelOddFormat css_user_id_label" style=""><span id="id_label_user_id"><?php echo $this->nm_new_label['user_id']; ?></span><?php if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['php_cmp_required']['user_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['php_cmp_required']['user_id'] == "on") { ?> <span class="scFormRequiredOdd">*</span> <?php }?></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["user_id"]) &&  $this->nmgp_cmp_readonly["user_id"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id'] = array(); 
    }

   $old_value_pat_bod = $this->pat_bod;
   $old_value_pati_famname = $this->pati_famname;
   $old_value_consul_date = $this->consul_date;
   $old_value_consul_strtime = $this->consul_strtime;
   $old_value_consul_endtime = $this->consul_endtime;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_pat_bod = $this->pat_bod;
   $unformatted_value_pati_famname = $this->pati_famname;
   $unformatted_value_consul_date = $this->consul_date;
   $unformatted_value_consul_strtime = $this->consul_strtime;
   $unformatted_value_consul_endtime = $this->consul_endtime;

   $__calend_all_day___val_str = "''";
   if (!empty($this->__calend_all_day__))
   {
       if (is_array($this->__calend_all_day__))
       {
           $Tmp_array = $this->__calend_all_day__;
       }
       else
       {
           $Tmp_array = explode(";", $this->__calend_all_day__);
       }
       $__calend_all_day___val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $__calend_all_day___val_str)
          {
             $__calend_all_day___val_str .= ", ";
          }
          $__calend_all_day___val_str .= "'$Tmp_val_cmp'";
       }
   }
   $nm_comando = "SELECT user_id, user_name  FROM Users  ORDER BY user_name";

   $this->pat_bod = $old_value_pat_bod;
   $this->pati_famname = $old_value_pati_famname;
   $this->consul_date = $old_value_consul_date;
   $this->consul_strtime = $old_value_consul_strtime;
   $this->consul_endtime = $old_value_consul_endtime;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['Lookup_user_id'][] = $rs->fields[0];
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
   $user_id_look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->user_id_1))
          {
              foreach ($this->user_id_1 as $tmp_user_id)
              {
                  if (trim($tmp_user_id) === trim($cadaselect[1])) { $user_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->user_id) === trim($cadaselect[1])) { $user_id_look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="user_id" value="<?php echo $this->form_encode_input($user_id) . "\">" . $user_id_look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_user_id();
   $x = 0 ; 
   $user_id_look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->user_id_1))
          {
              foreach ($this->user_id_1 as $tmp_user_id)
              {
                  if (trim($tmp_user_id) === trim($cadaselect[1])) { $user_id_look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->user_id) === trim($cadaselect[1])) { $user_id_look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($user_id_look))
          {
              $user_id_look = $this->user_id;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_user_id\" class=\"css_user_id_line\" style=\"" .  $sStyleReadLab_user_id . "\">" . $this->form_format_readonly("user_id", $this->form_encode_input($user_id_look)) . "</span><span id=\"id_read_off_user_id\" class=\"css_read_off_user_id" . $this->classes_100perc_fields['span_input'] . "\" style=\"white-space: nowrap; " . $sStyleReadInp_user_id . "\">";
   echo " <span id=\"idAjaxSelect_user_id\" class=\"" . $this->classes_100perc_fields['span_select'] . "\"><select class=\"sc-js-input scFormObjectOdd css_user_id_obj" . $this->classes_100perc_fields['input'] . "\" style=\"\" id=\"id_sc_field_user_id\" name=\"user_id\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->user_id) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->user_id)) 
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
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consul_reason']))
    {
        $this->nm_new_label['consul_reason'] = "Motivo";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consul_reason = $this->consul_reason;
   $sStyleHidden_consul_reason = '';
   if (isset($this->nmgp_cmp_hidden['consul_reason']) && $this->nmgp_cmp_hidden['consul_reason'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consul_reason']);
       $sStyleHidden_consul_reason = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consul_reason = 'display: none;';
   $sStyleReadInp_consul_reason = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consul_reason']) && $this->nmgp_cmp_readonly['consul_reason'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consul_reason']);
       $sStyleReadLab_consul_reason = '';
       $sStyleReadInp_consul_reason = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consul_reason']) && $this->nmgp_cmp_hidden['consul_reason'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consul_reason" value="<?php echo $this->form_encode_input($consul_reason) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_consul_reason_line" id="hidden_field_data_consul_reason" style="<?php echo $sStyleHidden_consul_reason; ?>"> <span class="scFormLabelOddFormat css_consul_reason_label" style=""><span id="id_label_consul_reason"><?php echo $this->nm_new_label['consul_reason']; ?></span></span><br>
<?php
$consul_reason_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($consul_reason));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consul_reason"]) &&  $this->nmgp_cmp_readonly["consul_reason"] == "on") { 

 ?>
<input type="hidden" name="consul_reason" value="<?php echo $this->form_encode_input($consul_reason) . "\">" . $consul_reason_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_consul_reason" class="sc-ui-readonly-consul_reason css_consul_reason_line" style="<?php echo $sStyleReadLab_consul_reason; ?>"><?php echo $this->form_format_readonly("consul_reason", $this->form_encode_input($consul_reason_val)); ?></span><span id="id_read_off_consul_reason" class="css_read_off_consul_reason<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consul_reason; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_consul_reason_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;resize: vertical;" name="consul_reason" id="id_sc_field_consul_reason" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $consul_reason; ?>
</textarea>
</span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






<?php $sStyleHidden_consul_reason_dumb = ('' == $sStyleHidden_consul_reason) ? 'display: none' : ''; ?>
    <TD class="scFormDataOdd" id="hidden_field_data_consul_reason_dumb" style="<?php echo $sStyleHidden_consul_reason_dumb; ?>"></TD>
   </tr>
<?php $sc_hidden_no = 1; ?>
</TABLE></div><!-- bloco_f -->
   </td>
   </tr></table>
   <a name="bloco_2"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_2"><!-- bloco_c -->
<TABLE align="center" id="hidden_bloco_2" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['consul_anot']))
    {
        $this->nm_new_label['consul_anot'] = "Anotaciones";
    }
?>
<?php
   $nm_cor_fun_cel  = (isset($nm_cor_fun_cel) && $nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = (isset($nm_img_fun_cel) && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $consul_anot = $this->consul_anot;
   $sStyleHidden_consul_anot = '';
   if (isset($this->nmgp_cmp_hidden['consul_anot']) && $this->nmgp_cmp_hidden['consul_anot'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['consul_anot']);
       $sStyleHidden_consul_anot = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_consul_anot = 'display: none;';
   $sStyleReadInp_consul_anot = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['consul_anot']) && $this->nmgp_cmp_readonly['consul_anot'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['consul_anot']);
       $sStyleReadLab_consul_anot = '';
       $sStyleReadInp_consul_anot = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['consul_anot']) && $this->nmgp_cmp_hidden['consul_anot'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="consul_anot" value="<?php echo $this->form_encode_input($consul_anot) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_consul_anot_line" id="hidden_field_data_consul_anot" style="<?php echo $sStyleHidden_consul_anot; ?>"> <span class="scFormLabelOddFormat css_consul_anot_label" style=""><span id="id_label_consul_anot"><?php echo $this->nm_new_label['consul_anot']; ?></span></span><br>
<?php
$consul_anot_val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($consul_anot));

?>

<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["consul_anot"]) &&  $this->nmgp_cmp_readonly["consul_anot"] == "on") { 

 ?>
<input type="hidden" name="consul_anot" value="<?php echo $this->form_encode_input($consul_anot) . "\">" . $consul_anot_val . ""; ?>
<?php } else { ?>
<span id="id_read_on_consul_anot" class="sc-ui-readonly-consul_anot css_consul_anot_line" style="<?php echo $sStyleReadLab_consul_anot; ?>"><?php echo $this->form_format_readonly("consul_anot", $this->form_encode_input($consul_anot_val)); ?></span><span id="id_read_off_consul_anot" class="css_read_off_consul_anot<?php echo $this->classes_100perc_fields['span_input'] ?>" style="white-space: nowrap;<?php echo $sStyleReadInp_consul_anot; ?>">
 <textarea class="sc-js-input scFormObjectOdd css_consul_anot_obj<?php echo $this->classes_100perc_fields['input'] ?>" style="white-space: pre-wrap;resize: vertical;" name="consul_anot" id="id_sc_field_consul_anot" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 32767, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $consul_anot; ?>
</textarea>
</span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 






   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none;" class='scDebugWindow'><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0,1,2);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("calendario_consultas_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("calendario_consultas_mob");
 parent.scAjaxDetailHeight("calendario_consultas_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("calendario_consultas_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("calendario_consultas_mob", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if (isset($this->scFormFocusErrorName) && '' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-1").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-2").length && $("#sc_b_ins_t.sc-unique-btn-2").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-2").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_new_b.sc-unique-btn-6").length && $("#sc_b_new_b.sc-unique-btn-6").is(":visible")) {
		    if ($("#sc_b_new_b.sc-unique-btn-6").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_ins_b.sc-unique-btn-7").length && $("#sc_b_ins_b.sc-unique-btn-7").is(":visible")) {
		    if ($("#sc_b_ins_b.sc-unique-btn-7").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-14").length && $("#sc_b_new_t.sc-unique-btn-14").is(":visible")) {
		    if ($("#sc_b_new_t.sc-unique-btn-14").hasClass("disabled")) {
		        return;
		    }
			nm_move ('novo');
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-15").length && $("#sc_b_ins_t.sc-unique-btn-15").is(":visible")) {
		    if ($("#sc_b_ins_t.sc-unique-btn-15").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('incluir');
			toggleToolbar(event, true); return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
		    if ($("#sc_b_hlp_t").hasClass("disabled")) {
		        return;
		    }
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			toggleToolbar(event, true); return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-3").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-4").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-5").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-11").length && $("#sc_b_sai_b.sc-unique-btn-11").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-11").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-12").length && $("#sc_b_sai_b.sc-unique-btn-12").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-12").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-13").length && $("#sc_b_sai_b.sc-unique-btn-13").is(":visible")) {
		    if ($("#sc_b_sai_b.sc-unique-btn-13").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-19").length && $("#sc_b_sai_t.sc-unique-btn-19").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-19").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-20").length && $("#sc_b_sai_t.sc-unique-btn-20").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-20").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-21").length && $("#sc_b_sai_t.sc-unique-btn-21").is(":visible")) {
		    if ($("#sc_b_sai_t.sc-unique-btn-21").hasClass("disabled")) {
		        return;
		    }
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			toggleToolbar(event, true); return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-8").length && $("#sc_b_upd_b.sc-unique-btn-8").is(":visible")) {
		    if ($("#sc_b_upd_b.sc-unique-btn-8").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-16").length && $("#sc_b_upd_t.sc-unique-btn-16").is(":visible")) {
		    if ($("#sc_b_upd_t.sc-unique-btn-16").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('alterar');
			toggleToolbar(event, true); return;
		}
	}
	function scBtnFn_sys_format_exc() {
		if ($("#sc_b_del_b.sc-unique-btn-9").length && $("#sc_b_del_b.sc-unique-btn-9").is(":visible")) {
		    if ($("#sc_b_del_b.sc-unique-btn-9").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			toggleToolbar(event, true); return;
		}
		if ($("#sc_b_del_t.sc-unique-btn-17").length && $("#sc_b_del_t.sc-unique-btn-17").is(":visible")) {
		    if ($("#sc_b_del_t.sc-unique-btn-17").hasClass("disabled")) {
		        return;
		    }
			nm_atualiza ('excluir');
			toggleToolbar(event, true); return;
		}
	}
	function scBtnFn_sys_separator() {
		if ($("#sys_separator.sc-unique-btn-10").length && $("#sys_separator.sc-unique-btn-10").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-10").hasClass("disabled")) {
		        return;
		    }
			return false;
			toggleToolbar(event, true); return;
		}
		if ($("#sys_separator.sc-unique-btn-18").length && $("#sys_separator.sc-unique-btn-18").is(":visible")) {
		    if ($("#sys_separator.sc-unique-btn-18").hasClass("disabled")) {
		        return;
		    }
			return false;
			toggleToolbar(event, true); return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['calendario_consultas_mob']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
