<?php

class report_atenciones_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("es");
      $this->Texto_tag = "";
   }


function actionBar_isValidState($buttonName, $buttonState)
{
    switch ($buttonName) {
    }

    return false;
}


function actionBar_displayState($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateHint($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateConfirm($buttonName)
{
    switch ($buttonName) {
    }
}

function actionBar_getStateDisable($buttonName)
{
    if (isset($this->sc_actionbar_disabled[$buttonName]) && $this->sc_actionbar_disabled[$buttonName]) {
        return ' disabled';
    }

    return '';
}

function actionBar_getStateHide($buttonName)
{
    if (isset($this->sc_actionbar_hidden[$buttonName]) && $this->sc_actionbar_hidden[$buttonName]) {
        return ' sc-actionbar-button-hidden';
    }

    return '';
}

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      if (isset($GLOBALS['nmgp_parms']) && !empty($GLOBALS['nmgp_parms'])) 
      { 
          $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
          $todo  = explode("?@?", $todox);
          foreach ($todo as $param)
          {
               $cadapar = explode("?#?", $param);
               if (1 < sizeof($cadapar))
               {
                   if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                   {
                       $cadapar[0] = substr($cadapar[0], 11);
                       $cadapar[1] = $_SESSION[$cadapar[1]];
                   }
                   if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                   }
                   elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                   {
                       $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                   }
                   nm_limpa_str_report_atenciones($cadapar[1]);
                   nm_protect_num_report_atenciones($cadapar[0], $cadapar[1]);
                   if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                   $Tmp_par   = $cadapar[0];
                   $$Tmp_par = $cadapar[1];
                   if ($Tmp_par == "nmgp_opcao")
                   {
                       $_SESSION['sc_session'][$script_case_init]['report_atenciones']['opcao'] = $cadapar[1];
                   }
               }
          }
      }
      if (isset($anam)) 
      {
          $_SESSION['anam'] = $anam;
          nm_limpa_str_report_atenciones($_SESSION["anam"]);
      }
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "report_atenciones_total.class.php"); 
      $this->Tot      = new report_atenciones_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['report_atenciones']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_report_atenciones";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "report_atenciones.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->treat_rest = (isset($Busca_temp['treat_rest'])) ? $Busca_temp['treat_rest'] : ""; 
          $tmp_pos = (is_string($this->treat_rest)) ? strpos($this->treat_rest, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->treat_rest))
          {
              $this->treat_rest = substr($this->treat_rest, 0, $tmp_pos);
          }
          $this->anam_id = (isset($Busca_temp['anam_id'])) ? $Busca_temp['anam_id'] : ""; 
          $tmp_pos = (is_string($this->anam_id)) ? strpos($this->anam_id, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->anam_id))
          {
              $this->anam_id = substr($this->anam_id, 0, $tmp_pos);
          }
          $this->pati_id = (isset($Busca_temp['pati_id'])) ? $Busca_temp['pati_id'] : ""; 
          $tmp_pos = (is_string($this->pati_id)) ? strpos($this->pati_id, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->pati_id))
          {
              $this->pati_id = substr($this->pati_id, 0, $tmp_pos);
          }
          $this->user_id = (isset($Busca_temp['user_id'])) ? $Busca_temp['user_id'] : ""; 
          $tmp_pos = (is_string($this->user_id)) ? strpos($this->user_id, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->user_id))
          {
              $this->user_id = substr($this->user_id, 0, $tmp_pos);
          }
          $this->anam_date = (isset($Busca_temp['anam_date'])) ? $Busca_temp['anam_date'] : ""; 
          $tmp_pos = (is_string($this->anam_date)) ? strpos($this->anam_date, "##@@") : false;
          if ($tmp_pos !== false && !is_array($this->anam_date))
          {
              $this->anam_date = substr($this->anam_date, 0, $tmp_pos);
          }
          $this->anam_date_2 = (isset($Busca_temp['anam_date_input_2'])) ? $Busca_temp['anam_date_input_2'] : ""; 
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_name'] .= ".rtf";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['anam_id'])) ? $this->New_label['anam_id'] : "Anam Id"; 
          if ($Cada_col == "anam_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_id'])) ? $this->New_label['pati_id'] : "Pati Id"; 
          if ($Cada_col == "pati_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['user_id'])) ? $this->New_label['user_id'] : "User Id"; 
          if ($Cada_col == "user_id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_date'])) ? $this->New_label['anam_date'] : "Anam Date"; 
          if ($Cada_col == "anam_date" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_strtime'])) ? $this->New_label['anam_strtime'] : "Anam Strtime"; 
          if ($Cada_col == "anam_strtime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_endtime'])) ? $this->New_label['anam_endtime'] : "Anam Endtime"; 
          if ($Cada_col == "anam_endtime" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_career'])) ? $this->New_label['anam_career'] : "Anam Career"; 
          if ($Cada_col == "anam_career" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_caryear'])) ? $this->New_label['anam_caryear'] : "Anam Caryear"; 
          if ($Cada_col == "anam_caryear" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_carsem'])) ? $this->New_label['anam_carsem'] : "Anam Carsem"; 
          if ($Cada_col == "anam_carsem" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_reason'])) ? $this->New_label['anam_reason'] : "Anam Reason"; 
          if ($Cada_col == "anam_reason" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_aller'])) ? $this->New_label['anam_aller'] : "Anam Aller"; 
          if ($Cada_col == "anam_aller" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_temp'])) ? $this->New_label['anam_temp'] : "Anam Temp"; 
          if ($Cada_col == "anam_temp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_hbeat'])) ? $this->New_label['anam_hbeat'] : "Anam Hbeat"; 
          if ($Cada_col == "anam_hbeat" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_bpsys'])) ? $this->New_label['anam_bpsys'] : "Anam Bpsys"; 
          if ($Cada_col == "anam_bpsys" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_bpdia'])) ? $this->New_label['anam_bpdia'] : "Anam Bpdia"; 
          if ($Cada_col == "anam_bpdia" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_oxy'])) ? $this->New_label['anam_oxy'] : "Anam Oxy"; 
          if ($Cada_col == "anam_oxy" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_gluco'])) ? $this->New_label['anam_gluco'] : "Anam Gluco"; 
          if ($Cada_col == "anam_gluco" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['anam_diag'])) ? $this->New_label['anam_diag'] : "Anam Diag"; 
          if ($Cada_col == "anam_diag" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_name'])) ? $this->New_label['pati_name'] : "Pati Name"; 
          if ($Cada_col == "pati_name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_lname'])) ? $this->New_label['pati_lname'] : "Pati Lname"; 
          if ($Cada_col == "pati_lname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_docnum'])) ? $this->New_label['pati_docnum'] : "Pati Docnum"; 
          if ($Cada_col == "pati_docnum" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_bod'])) ? $this->New_label['pati_bod'] : "Pati Bod"; 
          if ($Cada_col == "pati_bod" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_phone'])) ? $this->New_label['pati_phone'] : "Pati Phone"; 
          if ($Cada_col == "pati_phone" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_career'])) ? $this->New_label['pati_career'] : "Pati Career"; 
          if ($Cada_col == "pati_career" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_caryerar'])) ? $this->New_label['pati_caryerar'] : "Pati Caryerar"; 
          if ($Cada_col == "pati_caryerar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_carsem'])) ? $this->New_label['pati_carsem'] : "Pati Carsem"; 
          if ($Cada_col == "pati_carsem" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_famphone'])) ? $this->New_label['pati_famphone'] : "Pati Famphone"; 
          if ($Cada_col == "pati_famphone" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_famname'])) ? $this->New_label['pati_famname'] : "Pati Famname"; 
          if ($Cada_col == "pati_famname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['user_name'])) ? $this->New_label['user_name'] : "User Name"; 
          if ($Cada_col == "user_name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['user_lname'])) ? $this->New_label['user_lname'] : "User Lname"; 
          if ($Cada_col == "user_lname" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['user_docnum'])) ? $this->New_label['user_docnum'] : "User Docnum"; 
          if ($Cada_col == "user_docnum" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['btyp_name'])) ? $this->New_label['btyp_name'] : "Btyp Name"; 
          if ($Cada_col == "btyp_name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gerens_name'])) ? $this->New_label['gerens_name'] : "Gerens Name"; 
          if ($Cada_col == "gerens_name" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['treat_instruc'])) ? $this->New_label['treat_instruc'] : "Treat Instruc"; 
          if ($Cada_col == "treat_instruc" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['treat_restdays'])) ? $this->New_label['treat_restdays'] : "Treat Restdays"; 
          if ($Cada_col == "treat_restdays" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['treat_rest'])) ? $this->New_label['treat_rest'] : "Treat Rest"; 
          if ($Cada_col == "treat_rest" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pat_nombre'])) ? $this->New_label['pat_nombre'] : "pat_nombre"; 
          if ($Cada_col == "pat_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pat_nombrefirma'])) ? $this->New_label['pat_nombrefirma'] : "pat_nombrefirma"; 
          if ($Cada_col == "pat_nombrefirma" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_edad'])) ? $this->New_label['pati_edad'] : "pati_edad"; 
          if ($Cada_col == "pati_edad" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['treat_record'])) ? $this->New_label['treat_record'] : "treat_record"; 
          if ($Cada_col == "treat_record" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['user_nombre'])) ? $this->New_label['user_nombre'] : "user_nombre"; 
          if ($Cada_col == "user_nombre" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pati_docunum'])) ? $this->New_label['pati_docunum'] : "pati_docunum"; 
          if ($Cada_col == "pati_docunum" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pat_gerens'])) ? $this->New_label['pat_gerens'] : "pat_gerens"; 
          if ($Cada_col == "pat_gerens" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['pat_btyp'])) ? $this->New_label['pat_btyp'] : "pat_btyp"; 
          if ($Cada_col == "pat_btyp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $SC_Label = NM_charset_to_utf8($SC_Label);
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT anam_id, pati_id, user_id, str_replace (convert(char(10),anam_date,102), '.', '-') + ' ' + convert(char(8),anam_date,20), str_replace (convert(char(10),anam_strtime,102), '.', '-') + ' ' + convert(char(8),anam_strtime,20), str_replace (convert(char(10),anam_endtime,102), '.', '-') + ' ' + convert(char(8),anam_endtime,20), anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag, pati_name, pati_lname, pati_docnum, str_replace (convert(char(10),pati_bod,102), '.', '-') + ' ' + convert(char(8),pati_bod,20), pati_phone, pati_career, pati_caryerar, pati_carsem, pati_famphone, pati_famname, user_name, user_lname, user_docnum, btyp_name, gerens_name, treat_instruc, treat_restdays, treat_rest from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT anam_id, pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag, pati_name, pati_lname, pati_docnum, pati_bod, pati_phone, pati_career, pati_caryerar, pati_carsem, pati_famphone, pati_famname, user_name, user_lname, user_docnum, btyp_name, gerens_name, treat_instruc, treat_restdays, treat_rest from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT anam_id, pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag, pati_name, pati_lname, pati_docnum, pati_bod, pati_phone, pati_career, pati_caryerar, pati_carsem, pati_famphone, pati_famname, user_name, user_lname, user_docnum, btyp_name, gerens_name, treat_instruc, treat_restdays, treat_rest from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->anam_id = $rs->fields[0] ;  
         $this->anam_id = (string)$this->anam_id;
         $this->pati_id = $rs->fields[1] ;  
         $this->pati_id = (string)$this->pati_id;
         $this->user_id = $rs->fields[2] ;  
         $this->user_id = (string)$this->user_id;
         $this->anam_date = $rs->fields[3] ;  
         $this->anam_strtime = $rs->fields[4] ;  
         $this->anam_endtime = $rs->fields[5] ;  
         $this->anam_career = $rs->fields[6] ;  
         $this->anam_caryear = $rs->fields[7] ;  
         $this->anam_caryear = (string)$this->anam_caryear;
         $this->anam_carsem = $rs->fields[8] ;  
         $this->anam_carsem = (string)$this->anam_carsem;
         $this->anam_reason = $rs->fields[9] ;  
         $this->anam_aller = $rs->fields[10] ;  
         $this->anam_temp = $rs->fields[11] ;  
         $this->anam_temp = (strpos(strtolower($this->anam_temp), "e")) ? (float)$this->anam_temp : $this->anam_temp; 
         $this->anam_temp = (string)$this->anam_temp;
         $this->anam_hbeat = $rs->fields[12] ;  
         $this->anam_hbeat = (strpos(strtolower($this->anam_hbeat), "e")) ? (float)$this->anam_hbeat : $this->anam_hbeat; 
         $this->anam_hbeat = (string)$this->anam_hbeat;
         $this->anam_bpsys = $rs->fields[13] ;  
         $this->anam_bpsys = (strpos(strtolower($this->anam_bpsys), "e")) ? (float)$this->anam_bpsys : $this->anam_bpsys; 
         $this->anam_bpsys = (string)$this->anam_bpsys;
         $this->anam_bpdia = $rs->fields[14] ;  
         $this->anam_bpdia = (strpos(strtolower($this->anam_bpdia), "e")) ? (float)$this->anam_bpdia : $this->anam_bpdia; 
         $this->anam_bpdia = (string)$this->anam_bpdia;
         $this->anam_oxy = $rs->fields[15] ;  
         $this->anam_oxy = (strpos(strtolower($this->anam_oxy), "e")) ? (float)$this->anam_oxy : $this->anam_oxy; 
         $this->anam_oxy = (string)$this->anam_oxy;
         $this->anam_gluco = $rs->fields[16] ;  
         $this->anam_gluco = (strpos(strtolower($this->anam_gluco), "e")) ? (float)$this->anam_gluco : $this->anam_gluco; 
         $this->anam_gluco = (string)$this->anam_gluco;
         $this->anam_diag = $rs->fields[17] ;  
         $this->pati_name = $rs->fields[18] ;  
         $this->pati_lname = $rs->fields[19] ;  
         $this->pati_docnum = $rs->fields[20] ;  
         $this->pati_docnum = (string)$this->pati_docnum;
         $this->pati_bod = $rs->fields[21] ;  
         $this->pati_phone = $rs->fields[22] ;  
         $this->pati_phone = (string)$this->pati_phone;
         $this->pati_career = $rs->fields[23] ;  
         $this->pati_caryerar = $rs->fields[24] ;  
         $this->pati_caryerar = (string)$this->pati_caryerar;
         $this->pati_carsem = $rs->fields[25] ;  
         $this->pati_carsem = (string)$this->pati_carsem;
         $this->pati_famphone = $rs->fields[26] ;  
         $this->pati_famname = $rs->fields[27] ;  
         $this->user_name = $rs->fields[28] ;  
         $this->user_lname = $rs->fields[29] ;  
         $this->user_docnum = $rs->fields[30] ;  
         $this->btyp_name = $rs->fields[31] ;  
         $this->gerens_name = $rs->fields[32] ;  
         $this->treat_instruc = $rs->fields[33] ;  
         $this->treat_restdays = $rs->fields[34] ;  
         $this->treat_restdays = (string)$this->treat_restdays;
         $this->treat_rest = $rs->fields[35] ;  
         $this->treat_rest = (string)$this->treat_rest;
         $this->sc_proc_grid = true; 
         //----- lookup - pati_docunum
         $this->Lookup->lookup_pati_docunum($this->pati_docunum, $this->pati_docunum, $this->array_pati_docunum); 
         $this->pati_docunum = str_replace("<br>", " ", $this->pati_docunum); 
         $this->pati_docunum = ($this->pati_docunum == "&nbsp;") ? "" : $this->pati_docunum; 
         //----- lookup - pat_gerens
         $this->Lookup->lookup_pat_gerens($this->pat_gerens, $this->pat_gerens, $this->array_pat_gerens); 
         $this->pat_gerens = str_replace("<br>", " ", $this->pat_gerens); 
         $this->pat_gerens = ($this->pat_gerens == "&nbsp;") ? "" : $this->pat_gerens; 
         //----- lookup - pat_btyp
         $this->Lookup->lookup_pat_btyp($this->pat_btyp, $this->pat_btyp, $this->array_pat_btyp); 
         $this->pat_btyp = str_replace("<br>", " ", $this->pat_btyp); 
         $this->pat_btyp = ($this->pat_btyp == "&nbsp;") ? "" : $this->pat_btyp; 
         $_SESSION['scriptcase']['report_atenciones']['contr_erro'] = 'on';
 $this->pat_nombre  = $this->pati_lname . ", ". $this->pati_name ;
$this->pat_nombrefirma  = $this->pati_lname . ", ". $this->pati_name ;
$this->user_nombre  = $this->user_lname . ", ". $this->user_name ;

if ($this->treat_restdays  > 0  ) 
	{ 
	$this->treat_record  = "Se recomiendan ". $this->treat_restdays ." días de reposo";
	 } else {
		
		$this->treat_record  ="No hay recomendaciones";
	}


$edad = [];
$edad = $this->nm_data->Dif_Datas_2($this->anam_date , "yyyy-mm-dd", $this->pati_bod , "yyyy-mm-dd", 2);
$this->pati_edad  = $edad[2];

$_SESSION['scriptcase']['report_atenciones']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- anam_id
   function NM_export_anam_id()
   {
             nmgp_Form_Num_Val($this->anam_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_id = NM_charset_to_utf8($this->anam_id);
         $this->anam_id = str_replace('<', '&lt;', $this->anam_id);
         $this->anam_id = str_replace('>', '&gt;', $this->anam_id);
         $this->Texto_tag .= "<td>" . $this->anam_id . "</td>\r\n";
   }
   //----- pati_id
   function NM_export_pati_id()
   {
             nmgp_Form_Num_Val($this->pati_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pati_id = NM_charset_to_utf8($this->pati_id);
         $this->pati_id = str_replace('<', '&lt;', $this->pati_id);
         $this->pati_id = str_replace('>', '&gt;', $this->pati_id);
         $this->Texto_tag .= "<td>" . $this->pati_id . "</td>\r\n";
   }
   //----- user_id
   function NM_export_user_id()
   {
             nmgp_Form_Num_Val($this->user_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->user_id = NM_charset_to_utf8($this->user_id);
         $this->user_id = str_replace('<', '&lt;', $this->user_id);
         $this->user_id = str_replace('>', '&gt;', $this->user_id);
         $this->Texto_tag .= "<td>" . $this->user_id . "</td>\r\n";
   }
   //----- anam_date
   function NM_export_anam_date()
   {
             $conteudo_x =  $this->anam_date;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->anam_date, "YYYY-MM-DD  ");
                 $this->anam_date = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->anam_date = NM_charset_to_utf8($this->anam_date);
         $this->anam_date = str_replace('<', '&lt;', $this->anam_date);
         $this->anam_date = str_replace('>', '&gt;', $this->anam_date);
         $this->Texto_tag .= "<td>" . $this->anam_date . "</td>\r\n";
   }
   //----- anam_strtime
   function NM_export_anam_strtime()
   {
             $conteudo_x =  $this->anam_strtime;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->anam_strtime, "HH:II:SS  ");
                 $this->anam_strtime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhii"));
             } 
         $this->anam_strtime = NM_charset_to_utf8($this->anam_strtime);
         $this->anam_strtime = str_replace('<', '&lt;', $this->anam_strtime);
         $this->anam_strtime = str_replace('>', '&gt;', $this->anam_strtime);
         $this->Texto_tag .= "<td>" . $this->anam_strtime . "</td>\r\n";
   }
   //----- anam_endtime
   function NM_export_anam_endtime()
   {
             $conteudo_x =  $this->anam_endtime;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->anam_endtime, "HH:II:SS  ");
                 $this->anam_endtime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         $this->anam_endtime = NM_charset_to_utf8($this->anam_endtime);
         $this->anam_endtime = str_replace('<', '&lt;', $this->anam_endtime);
         $this->anam_endtime = str_replace('>', '&gt;', $this->anam_endtime);
         $this->Texto_tag .= "<td>" . $this->anam_endtime . "</td>\r\n";
   }
   //----- anam_career
   function NM_export_anam_career()
   {
         $this->anam_career = html_entity_decode($this->anam_career, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->anam_career = strip_tags($this->anam_career);
         $this->anam_career = NM_charset_to_utf8($this->anam_career);
         $this->anam_career = str_replace('<', '&lt;', $this->anam_career);
         $this->anam_career = str_replace('>', '&gt;', $this->anam_career);
         $this->Texto_tag .= "<td>" . $this->anam_career . "</td>\r\n";
   }
   //----- anam_caryear
   function NM_export_anam_caryear()
   {
             nmgp_Form_Num_Val($this->anam_caryear, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_caryear = NM_charset_to_utf8($this->anam_caryear);
         $this->anam_caryear = str_replace('<', '&lt;', $this->anam_caryear);
         $this->anam_caryear = str_replace('>', '&gt;', $this->anam_caryear);
         $this->Texto_tag .= "<td>" . $this->anam_caryear . "</td>\r\n";
   }
   //----- anam_carsem
   function NM_export_anam_carsem()
   {
             nmgp_Form_Num_Val($this->anam_carsem, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_carsem = NM_charset_to_utf8($this->anam_carsem);
         $this->anam_carsem = str_replace('<', '&lt;', $this->anam_carsem);
         $this->anam_carsem = str_replace('>', '&gt;', $this->anam_carsem);
         $this->Texto_tag .= "<td>" . $this->anam_carsem . "</td>\r\n";
   }
   //----- anam_reason
   function NM_export_anam_reason()
   {
         $this->anam_reason = html_entity_decode($this->anam_reason, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->anam_reason = NM_charset_to_utf8($this->anam_reason);
         $this->anam_reason = str_replace('<', '&lt;', $this->anam_reason);
         $this->anam_reason = str_replace('>', '&gt;', $this->anam_reason);
         $this->Texto_tag .= "<td>" . $this->anam_reason . "</td>\r\n";
   }
   //----- anam_aller
   function NM_export_anam_aller()
   {
         $this->anam_aller = html_entity_decode($this->anam_aller, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->anam_aller = strip_tags($this->anam_aller);
         $this->anam_aller = NM_charset_to_utf8($this->anam_aller);
         $this->anam_aller = str_replace('<', '&lt;', $this->anam_aller);
         $this->anam_aller = str_replace('>', '&gt;', $this->anam_aller);
         $this->Texto_tag .= "<td>" . $this->anam_aller . "</td>\r\n";
   }
   //----- anam_temp
   function NM_export_anam_temp()
   {
             nmgp_Form_Num_Val($this->anam_temp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_temp = NM_charset_to_utf8($this->anam_temp);
         $this->anam_temp = str_replace('<', '&lt;', $this->anam_temp);
         $this->anam_temp = str_replace('>', '&gt;', $this->anam_temp);
         $this->Texto_tag .= "<td>" . $this->anam_temp . "</td>\r\n";
   }
   //----- anam_hbeat
   function NM_export_anam_hbeat()
   {
             nmgp_Form_Num_Val($this->anam_hbeat, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_hbeat = NM_charset_to_utf8($this->anam_hbeat);
         $this->anam_hbeat = str_replace('<', '&lt;', $this->anam_hbeat);
         $this->anam_hbeat = str_replace('>', '&gt;', $this->anam_hbeat);
         $this->Texto_tag .= "<td>" . $this->anam_hbeat . "</td>\r\n";
   }
   //----- anam_bpsys
   function NM_export_anam_bpsys()
   {
             nmgp_Form_Num_Val($this->anam_bpsys, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_bpsys = NM_charset_to_utf8($this->anam_bpsys);
         $this->anam_bpsys = str_replace('<', '&lt;', $this->anam_bpsys);
         $this->anam_bpsys = str_replace('>', '&gt;', $this->anam_bpsys);
         $this->Texto_tag .= "<td>" . $this->anam_bpsys . "</td>\r\n";
   }
   //----- anam_bpdia
   function NM_export_anam_bpdia()
   {
             nmgp_Form_Num_Val($this->anam_bpdia, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_bpdia = NM_charset_to_utf8($this->anam_bpdia);
         $this->anam_bpdia = str_replace('<', '&lt;', $this->anam_bpdia);
         $this->anam_bpdia = str_replace('>', '&gt;', $this->anam_bpdia);
         $this->Texto_tag .= "<td>" . $this->anam_bpdia . "</td>\r\n";
   }
   //----- anam_oxy
   function NM_export_anam_oxy()
   {
             nmgp_Form_Num_Val($this->anam_oxy, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_oxy = NM_charset_to_utf8($this->anam_oxy);
         $this->anam_oxy = str_replace('<', '&lt;', $this->anam_oxy);
         $this->anam_oxy = str_replace('>', '&gt;', $this->anam_oxy);
         $this->Texto_tag .= "<td>" . $this->anam_oxy . "</td>\r\n";
   }
   //----- anam_gluco
   function NM_export_anam_gluco()
   {
             nmgp_Form_Num_Val($this->anam_gluco, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->anam_gluco = NM_charset_to_utf8($this->anam_gluco);
         $this->anam_gluco = str_replace('<', '&lt;', $this->anam_gluco);
         $this->anam_gluco = str_replace('>', '&gt;', $this->anam_gluco);
         $this->Texto_tag .= "<td>" . $this->anam_gluco . "</td>\r\n";
   }
   //----- anam_diag
   function NM_export_anam_diag()
   {
         $this->anam_diag = html_entity_decode($this->anam_diag, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->anam_diag = strip_tags($this->anam_diag);
         $this->anam_diag = NM_charset_to_utf8($this->anam_diag);
         $this->anam_diag = str_replace('<', '&lt;', $this->anam_diag);
         $this->anam_diag = str_replace('>', '&gt;', $this->anam_diag);
         $this->Texto_tag .= "<td>" . $this->anam_diag . "</td>\r\n";
   }
   //----- pati_name
   function NM_export_pati_name()
   {
         $this->pati_name = html_entity_decode($this->pati_name, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pati_name = strip_tags($this->pati_name);
         $this->pati_name = NM_charset_to_utf8($this->pati_name);
         $this->pati_name = str_replace('<', '&lt;', $this->pati_name);
         $this->pati_name = str_replace('>', '&gt;', $this->pati_name);
         $this->Texto_tag .= "<td>" . $this->pati_name . "</td>\r\n";
   }
   //----- pati_lname
   function NM_export_pati_lname()
   {
         $this->pati_lname = html_entity_decode($this->pati_lname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pati_lname = strip_tags($this->pati_lname);
         $this->pati_lname = NM_charset_to_utf8($this->pati_lname);
         $this->pati_lname = str_replace('<', '&lt;', $this->pati_lname);
         $this->pati_lname = str_replace('>', '&gt;', $this->pati_lname);
         $this->Texto_tag .= "<td>" . $this->pati_lname . "</td>\r\n";
   }
   //----- pati_docnum
   function NM_export_pati_docnum()
   {
             nmgp_Form_Num_Val($this->pati_docnum, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pati_docnum = NM_charset_to_utf8($this->pati_docnum);
         $this->pati_docnum = str_replace('<', '&lt;', $this->pati_docnum);
         $this->pati_docnum = str_replace('>', '&gt;', $this->pati_docnum);
         $this->Texto_tag .= "<td>" . $this->pati_docnum . "</td>\r\n";
   }
   //----- pati_bod
   function NM_export_pati_bod()
   {
             $conteudo_x =  $this->pati_bod;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->pati_bod, "YYYY-MM-DD  ");
                 $this->pati_bod = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         $this->pati_bod = NM_charset_to_utf8($this->pati_bod);
         $this->pati_bod = str_replace('<', '&lt;', $this->pati_bod);
         $this->pati_bod = str_replace('>', '&gt;', $this->pati_bod);
         $this->Texto_tag .= "<td>" . $this->pati_bod . "</td>\r\n";
   }
   //----- pati_phone
   function NM_export_pati_phone()
   {
             nmgp_Form_Num_Val($this->pati_phone, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pati_phone = NM_charset_to_utf8($this->pati_phone);
         $this->pati_phone = str_replace('<', '&lt;', $this->pati_phone);
         $this->pati_phone = str_replace('>', '&gt;', $this->pati_phone);
         $this->Texto_tag .= "<td>" . $this->pati_phone . "</td>\r\n";
   }
   //----- pati_career
   function NM_export_pati_career()
   {
         $this->pati_career = html_entity_decode($this->pati_career, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pati_career = strip_tags($this->pati_career);
         $this->pati_career = NM_charset_to_utf8($this->pati_career);
         $this->pati_career = str_replace('<', '&lt;', $this->pati_career);
         $this->pati_career = str_replace('>', '&gt;', $this->pati_career);
         $this->Texto_tag .= "<td>" . $this->pati_career . "</td>\r\n";
   }
   //----- pati_caryerar
   function NM_export_pati_caryerar()
   {
             nmgp_Form_Num_Val($this->pati_caryerar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pati_caryerar = NM_charset_to_utf8($this->pati_caryerar);
         $this->pati_caryerar = str_replace('<', '&lt;', $this->pati_caryerar);
         $this->pati_caryerar = str_replace('>', '&gt;', $this->pati_caryerar);
         $this->Texto_tag .= "<td>" . $this->pati_caryerar . "</td>\r\n";
   }
   //----- pati_carsem
   function NM_export_pati_carsem()
   {
             nmgp_Form_Num_Val($this->pati_carsem, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->pati_carsem = NM_charset_to_utf8($this->pati_carsem);
         $this->pati_carsem = str_replace('<', '&lt;', $this->pati_carsem);
         $this->pati_carsem = str_replace('>', '&gt;', $this->pati_carsem);
         $this->Texto_tag .= "<td>" . $this->pati_carsem . "</td>\r\n";
   }
   //----- pati_famphone
   function NM_export_pati_famphone()
   {
         $this->pati_famphone = html_entity_decode($this->pati_famphone, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pati_famphone = strip_tags($this->pati_famphone);
         $this->pati_famphone = NM_charset_to_utf8($this->pati_famphone);
         $this->pati_famphone = str_replace('<', '&lt;', $this->pati_famphone);
         $this->pati_famphone = str_replace('>', '&gt;', $this->pati_famphone);
         $this->Texto_tag .= "<td>" . $this->pati_famphone . "</td>\r\n";
   }
   //----- pati_famname
   function NM_export_pati_famname()
   {
         $this->pati_famname = html_entity_decode($this->pati_famname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pati_famname = strip_tags($this->pati_famname);
         $this->pati_famname = NM_charset_to_utf8($this->pati_famname);
         $this->pati_famname = str_replace('<', '&lt;', $this->pati_famname);
         $this->pati_famname = str_replace('>', '&gt;', $this->pati_famname);
         $this->Texto_tag .= "<td>" . $this->pati_famname . "</td>\r\n";
   }
   //----- user_name
   function NM_export_user_name()
   {
         $this->user_name = html_entity_decode($this->user_name, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->user_name = strip_tags($this->user_name);
         $this->user_name = NM_charset_to_utf8($this->user_name);
         $this->user_name = str_replace('<', '&lt;', $this->user_name);
         $this->user_name = str_replace('>', '&gt;', $this->user_name);
         $this->Texto_tag .= "<td>" . $this->user_name . "</td>\r\n";
   }
   //----- user_lname
   function NM_export_user_lname()
   {
         $this->user_lname = html_entity_decode($this->user_lname, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->user_lname = strip_tags($this->user_lname);
         $this->user_lname = NM_charset_to_utf8($this->user_lname);
         $this->user_lname = str_replace('<', '&lt;', $this->user_lname);
         $this->user_lname = str_replace('>', '&gt;', $this->user_lname);
         $this->Texto_tag .= "<td>" . $this->user_lname . "</td>\r\n";
   }
   //----- user_docnum
   function NM_export_user_docnum()
   {
         $this->user_docnum = html_entity_decode($this->user_docnum, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->user_docnum = strip_tags($this->user_docnum);
         $this->user_docnum = NM_charset_to_utf8($this->user_docnum);
         $this->user_docnum = str_replace('<', '&lt;', $this->user_docnum);
         $this->user_docnum = str_replace('>', '&gt;', $this->user_docnum);
         $this->Texto_tag .= "<td>" . $this->user_docnum . "</td>\r\n";
   }
   //----- btyp_name
   function NM_export_btyp_name()
   {
         $this->btyp_name = html_entity_decode($this->btyp_name, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->btyp_name = strip_tags($this->btyp_name);
         $this->btyp_name = NM_charset_to_utf8($this->btyp_name);
         $this->btyp_name = str_replace('<', '&lt;', $this->btyp_name);
         $this->btyp_name = str_replace('>', '&gt;', $this->btyp_name);
         $this->Texto_tag .= "<td>" . $this->btyp_name . "</td>\r\n";
   }
   //----- gerens_name
   function NM_export_gerens_name()
   {
         $this->gerens_name = html_entity_decode($this->gerens_name, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gerens_name = strip_tags($this->gerens_name);
         $this->gerens_name = NM_charset_to_utf8($this->gerens_name);
         $this->gerens_name = str_replace('<', '&lt;', $this->gerens_name);
         $this->gerens_name = str_replace('>', '&gt;', $this->gerens_name);
         $this->Texto_tag .= "<td>" . $this->gerens_name . "</td>\r\n";
   }
   //----- treat_instruc
   function NM_export_treat_instruc()
   {
         $this->treat_instruc = html_entity_decode($this->treat_instruc, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->treat_instruc = strip_tags($this->treat_instruc);
         $this->treat_instruc = NM_charset_to_utf8($this->treat_instruc);
         $this->treat_instruc = str_replace('<', '&lt;', $this->treat_instruc);
         $this->treat_instruc = str_replace('>', '&gt;', $this->treat_instruc);
         $this->Texto_tag .= "<td>" . $this->treat_instruc . "</td>\r\n";
   }
   //----- treat_restdays
   function NM_export_treat_restdays()
   {
             nmgp_Form_Num_Val($this->treat_restdays, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->treat_restdays = NM_charset_to_utf8($this->treat_restdays);
         $this->treat_restdays = str_replace('<', '&lt;', $this->treat_restdays);
         $this->treat_restdays = str_replace('>', '&gt;', $this->treat_restdays);
         $this->Texto_tag .= "<td>" . $this->treat_restdays . "</td>\r\n";
   }
   //----- treat_rest
   function NM_export_treat_rest()
   {
             nmgp_Form_Num_Val($this->treat_rest, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         $this->treat_rest = NM_charset_to_utf8($this->treat_rest);
         $this->treat_rest = str_replace('<', '&lt;', $this->treat_rest);
         $this->treat_rest = str_replace('>', '&gt;', $this->treat_rest);
         $this->Texto_tag .= "<td>" . $this->treat_rest . "</td>\r\n";
   }
   //----- pat_nombre
   function NM_export_pat_nombre()
   {
         $this->pat_nombre = html_entity_decode($this->pat_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pat_nombre = strip_tags($this->pat_nombre);
         $this->pat_nombre = NM_charset_to_utf8($this->pat_nombre);
         $this->pat_nombre = str_replace('<', '&lt;', $this->pat_nombre);
         $this->pat_nombre = str_replace('>', '&gt;', $this->pat_nombre);
         $this->Texto_tag .= "<td>" . $this->pat_nombre . "</td>\r\n";
   }
   //----- pat_nombrefirma
   function NM_export_pat_nombrefirma()
   {
         $this->pat_nombrefirma = html_entity_decode($this->pat_nombrefirma, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pat_nombrefirma = strip_tags($this->pat_nombrefirma);
         $this->pat_nombrefirma = NM_charset_to_utf8($this->pat_nombrefirma);
         $this->pat_nombrefirma = str_replace('<', '&lt;', $this->pat_nombrefirma);
         $this->pat_nombrefirma = str_replace('>', '&gt;', $this->pat_nombrefirma);
         $this->Texto_tag .= "<td>" . $this->pat_nombrefirma . "</td>\r\n";
   }
   //----- pati_edad
   function NM_export_pati_edad()
   {
         $this->pati_edad = html_entity_decode($this->pati_edad, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->pati_edad = strip_tags($this->pati_edad);
         $this->pati_edad = NM_charset_to_utf8($this->pati_edad);
         $this->pati_edad = str_replace('<', '&lt;', $this->pati_edad);
         $this->pati_edad = str_replace('>', '&gt;', $this->pati_edad);
         $this->Texto_tag .= "<td>" . $this->pati_edad . "</td>\r\n";
   }
   //----- treat_record
   function NM_export_treat_record()
   {
         $this->treat_record = html_entity_decode($this->treat_record, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->treat_record = strip_tags($this->treat_record);
         $this->treat_record = NM_charset_to_utf8($this->treat_record);
         $this->treat_record = str_replace('<', '&lt;', $this->treat_record);
         $this->treat_record = str_replace('>', '&gt;', $this->treat_record);
         $this->Texto_tag .= "<td>" . $this->treat_record . "</td>\r\n";
   }
   //----- user_nombre
   function NM_export_user_nombre()
   {
         $this->user_nombre = html_entity_decode($this->user_nombre, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->user_nombre = strip_tags($this->user_nombre);
         $this->user_nombre = NM_charset_to_utf8($this->user_nombre);
         $this->user_nombre = str_replace('<', '&lt;', $this->user_nombre);
         $this->user_nombre = str_replace('>', '&gt;', $this->user_nombre);
         $this->Texto_tag .= "<td>" . $this->user_nombre . "</td>\r\n";
   }
   //----- pati_docunum
   function NM_export_pati_docunum()
   {
         $this->pati_docunum = NM_charset_to_utf8($this->pati_docunum);
         $this->pati_docunum = str_replace('<', '&lt;', $this->pati_docunum);
         $this->pati_docunum = str_replace('>', '&gt;', $this->pati_docunum);
         $this->Texto_tag .= "<td>" . $this->pati_docunum . "</td>\r\n";
   }
   //----- pat_gerens
   function NM_export_pat_gerens()
   {
         $this->pat_gerens = NM_charset_to_utf8($this->pat_gerens);
         $this->pat_gerens = str_replace('<', '&lt;', $this->pat_gerens);
         $this->pat_gerens = str_replace('>', '&gt;', $this->pat_gerens);
         $this->Texto_tag .= "<td>" . $this->pat_gerens . "</td>\r\n";
   }
   //----- pat_btyp
   function NM_export_pat_btyp()
   {
         $this->pat_btyp = NM_charset_to_utf8($this->pat_btyp);
         $this->pat_btyp = str_replace('<', '&lt;', $this->pat_btyp);
         $this->pat_btyp = str_replace('>', '&gt;', $this->pat_btyp);
         $this->Texto_tag .= "<td>" . $this->pat_btyp . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
   }

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT") {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT") {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "SC_FORMAT_REGION") {
           $this->nm_data->SetaData($dt_in, strtoupper($form_in));
           $prep_out  = (strpos(strtolower($form_in), "dd") !== false) ? "dd" : "";
           $prep_out .= (strpos(strtolower($form_in), "mm") !== false) ? "mm" : "";
           $prep_out .= (strpos(strtolower($form_in), "aa") !== false) ? "aaaa" : "";
           $prep_out .= (strpos(strtolower($form_in), "yy") !== false) ? "aaaa" : "";
           return $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", $prep_out));
       }
       else {
           nm_conv_form_data($dt_out, $form_in, $form_out);
           return $dt_out;
       }
   }
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_title'] ?> vw_anamnesis :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__enfermeria_unae2.png">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="report_atenciones_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="report_atenciones"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $str_highlight_ini = "";
      $str_highlight_fim = "";
      if(substr($nm_campo, 0, 23) == '<div class="highlight">' && substr($nm_campo, -6) == '</div>')
      {
           $str_highlight_ini = substr($nm_campo, 0, 23);
           $str_highlight_fim = substr($nm_campo, -6);

           $trab_campo = substr($nm_campo, 23, -6);
           $tam_campo  = strlen($trab_campo);
      }      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($tam_campo >= $cont2)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $str_highlight_ini . $trab_saida . $str_highlight_ini;
   } 
}

?>
