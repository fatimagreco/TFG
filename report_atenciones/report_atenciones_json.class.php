<?php

class report_atenciones_json
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   function __construct()
   {
      $this->nm_data = new nm_data("es");
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

   function monta_json()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Json_f);
              $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
              $Temp = ob_get_clean();
              if ($Temp !== false && trim($Temp) != "")
              {
                  $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
              }
              $result_json = json_encode($this->Arr_result, JSON_UNESCAPED_UNICODE);
              if ($result_json == false)
              {
                  $oJson = new Services_JSON();
                  $result_json = $oJson->encode($this->Arr_result);
              }
              echo $result_json;
              exit;
          }
          else
          {
              $this->progress_bar_end();
          }
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] = "";
      }
   }

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
      $this->Json_use_label = true;
      $this->Json_format = false;
      $this->Tem_json_res = false;
      $this->Json_password = "";
      if (isset($_REQUEST['nm_json_label']) && !empty($_REQUEST['nm_json_label']))
      {
          $this->Json_use_label = ($_REQUEST['nm_json_label'] == "S") ? true : false;
      }
      if (isset($_REQUEST['nm_json_format']) && !empty($_REQUEST['nm_json_format']))
      {
          $this->Json_format = ($_REQUEST['nm_json_format'] == "S") ? true : false;
      }
      $this->Tem_json_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_json_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['SC_Gb_Free_cmp']))
      {
          $this->Tem_json_res  = false;
      }
      if (!is_file($this->Ini->root . $this->Ini->path_link . "report_atenciones/report_atenciones_res_json.class.php"))
      {
          $this->Tem_json_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_label']))
      {
          $this->Json_use_label = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_label'];
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_format']))
      {
          $this->Json_format = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_format'];
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['report_atenciones']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_return']);
          if ($this->Tem_json_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data = new nm_data("es");
      $this->Arquivo      = "sc_json";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_report_atenciones.zip";
      $this->Arquivo     .= "_report_atenciones";
      $this->Arquivo     .= ".json";
      $this->Tit_doc      = "report_atenciones.json";
      $this->Tit_zip      = "report_atenciones.zip";
   }

   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }

   function grava_arquivo()
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name']))
      {
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name'], ".");
          if ($Pos === false) {
              $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name'] .= ".json";
          }
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_name']);
      }
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['embutida'])
      { 
          $this->Json_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $json_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      }
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
      $this->json_registro = array();
      $this->SC_seq_json   = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
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
         $this->SC_seq_json++;
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['embutida'])
      { 
          $_SESSION['scriptcase']['export_return'] = $this->json_registro;
      }
      else
      { 
          $result_json = json_encode($this->json_registro, JSON_UNESCAPED_UNICODE);
          if ($result_json == false)
          {
              $oJson = new Services_JSON();
              $result_json = $oJson->encode($this->json_registro);
          }
          fwrite($json_f, $result_json);
          fclose($json_f);
          if ($this->Tem_json_res)
          { 
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_prcs']);
                  $Mens_smry = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_smry_titl']);
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              require_once($this->Ini->path_aplicacao . "report_atenciones_res_json.class.php");
              $this->Res = new report_atenciones_res_json();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_res_grid'] = true;
              $this->Res->monta_json();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = NM_charset_to_utf8($this->Ini->Nm_lang['lang_btns_export_finished']);
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Json_password != "" || $this->Tem_json_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Json_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Json_f, ' ')) ? " \"" . $this->Json_f . "\"" :  $this->Json_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                      chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Json_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_json_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_res_file']['json'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Json_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Json_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  if (!empty($str_zip)) {
                      exec($str_zip);
                  }
                  // ----- ZIP log
                  $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
                  if ($fp)
                  {
                      @fwrite($fp, $str_zip . "\r\n\r\n");
                      @fclose($fp);
                  }
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_res_file']['json']);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_res_grid']);
          } 
      }
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
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_id'])) ? $this->New_label['anam_id'] : "Anam Id"; 
         }
         else
         {
             $SC_Label = "anam_id"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_id;
   }
   //----- pati_id
   function NM_export_pati_id()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->pati_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_id'])) ? $this->New_label['pati_id'] : "Pati Id"; 
         }
         else
         {
             $SC_Label = "pati_id"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_id;
   }
   //----- user_id
   function NM_export_user_id()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->user_id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['user_id'])) ? $this->New_label['user_id'] : "User Id"; 
         }
         else
         {
             $SC_Label = "user_id"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->user_id;
   }
   //----- anam_date
   function NM_export_anam_date()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->anam_date;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->anam_date, "YYYY-MM-DD  ");
                 $this->anam_date = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_date'])) ? $this->New_label['anam_date'] : "Anam Date"; 
         }
         else
         {
             $SC_Label = "anam_date"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_date;
   }
   //----- anam_strtime
   function NM_export_anam_strtime()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->anam_strtime;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->anam_strtime, "HH:II:SS  ");
                 $this->anam_strtime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhii"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_strtime'])) ? $this->New_label['anam_strtime'] : "Anam Strtime"; 
         }
         else
         {
             $SC_Label = "anam_strtime"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_strtime;
   }
   //----- anam_endtime
   function NM_export_anam_endtime()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->anam_endtime;
             nm_conv_limpa_dado($conteudo_x, "HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->anam_endtime, "HH:II:SS  ");
                 $this->anam_endtime = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_endtime'])) ? $this->New_label['anam_endtime'] : "Anam Endtime"; 
         }
         else
         {
             $SC_Label = "anam_endtime"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_endtime;
   }
   //----- anam_career
   function NM_export_anam_career()
   {
         $this->anam_career = NM_charset_to_utf8($this->anam_career);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_career'])) ? $this->New_label['anam_career'] : "Anam Career"; 
         }
         else
         {
             $SC_Label = "anam_career"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_career;
   }
   //----- anam_caryear
   function NM_export_anam_caryear()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_caryear, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_caryear'])) ? $this->New_label['anam_caryear'] : "Anam Caryear"; 
         }
         else
         {
             $SC_Label = "anam_caryear"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_caryear;
   }
   //----- anam_carsem
   function NM_export_anam_carsem()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_carsem, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_carsem'])) ? $this->New_label['anam_carsem'] : "Anam Carsem"; 
         }
         else
         {
             $SC_Label = "anam_carsem"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_carsem;
   }
   //----- anam_reason
   function NM_export_anam_reason()
   {
         $this->anam_reason = NM_charset_to_utf8($this->anam_reason);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_reason'])) ? $this->New_label['anam_reason'] : "Anam Reason"; 
         }
         else
         {
             $SC_Label = "anam_reason"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_reason;
   }
   //----- anam_aller
   function NM_export_anam_aller()
   {
         $this->anam_aller = NM_charset_to_utf8($this->anam_aller);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_aller'])) ? $this->New_label['anam_aller'] : "Anam Aller"; 
         }
         else
         {
             $SC_Label = "anam_aller"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_aller;
   }
   //----- anam_temp
   function NM_export_anam_temp()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_temp, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_temp'])) ? $this->New_label['anam_temp'] : "Anam Temp"; 
         }
         else
         {
             $SC_Label = "anam_temp"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_temp;
   }
   //----- anam_hbeat
   function NM_export_anam_hbeat()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_hbeat, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_hbeat'])) ? $this->New_label['anam_hbeat'] : "Anam Hbeat"; 
         }
         else
         {
             $SC_Label = "anam_hbeat"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_hbeat;
   }
   //----- anam_bpsys
   function NM_export_anam_bpsys()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_bpsys, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_bpsys'])) ? $this->New_label['anam_bpsys'] : "Anam Bpsys"; 
         }
         else
         {
             $SC_Label = "anam_bpsys"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_bpsys;
   }
   //----- anam_bpdia
   function NM_export_anam_bpdia()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_bpdia, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_bpdia'])) ? $this->New_label['anam_bpdia'] : "Anam Bpdia"; 
         }
         else
         {
             $SC_Label = "anam_bpdia"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_bpdia;
   }
   //----- anam_oxy
   function NM_export_anam_oxy()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_oxy, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_oxy'])) ? $this->New_label['anam_oxy'] : "Anam Oxy"; 
         }
         else
         {
             $SC_Label = "anam_oxy"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_oxy;
   }
   //----- anam_gluco
   function NM_export_anam_gluco()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->anam_gluco, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_gluco'])) ? $this->New_label['anam_gluco'] : "Anam Gluco"; 
         }
         else
         {
             $SC_Label = "anam_gluco"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_gluco;
   }
   //----- anam_diag
   function NM_export_anam_diag()
   {
         $this->anam_diag = NM_charset_to_utf8($this->anam_diag);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['anam_diag'])) ? $this->New_label['anam_diag'] : "Anam Diag"; 
         }
         else
         {
             $SC_Label = "anam_diag"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->anam_diag;
   }
   //----- pati_name
   function NM_export_pati_name()
   {
         $this->pati_name = NM_charset_to_utf8($this->pati_name);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_name'])) ? $this->New_label['pati_name'] : "Pati Name"; 
         }
         else
         {
             $SC_Label = "pati_name"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_name;
   }
   //----- pati_lname
   function NM_export_pati_lname()
   {
         $this->pati_lname = NM_charset_to_utf8($this->pati_lname);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_lname'])) ? $this->New_label['pati_lname'] : "Pati Lname"; 
         }
         else
         {
             $SC_Label = "pati_lname"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_lname;
   }
   //----- pati_docnum
   function NM_export_pati_docnum()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->pati_docnum, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_docnum'])) ? $this->New_label['pati_docnum'] : "Pati Docnum"; 
         }
         else
         {
             $SC_Label = "pati_docnum"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_docnum;
   }
   //----- pati_bod
   function NM_export_pati_bod()
   {
         if ($this->Json_format)
         {
             $conteudo_x =  $this->pati_bod;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->pati_bod, "YYYY-MM-DD  ");
                 $this->pati_bod = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_bod'])) ? $this->New_label['pati_bod'] : "Pati Bod"; 
         }
         else
         {
             $SC_Label = "pati_bod"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_bod;
   }
   //----- pati_phone
   function NM_export_pati_phone()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->pati_phone, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_phone'])) ? $this->New_label['pati_phone'] : "Pati Phone"; 
         }
         else
         {
             $SC_Label = "pati_phone"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_phone;
   }
   //----- pati_career
   function NM_export_pati_career()
   {
         $this->pati_career = NM_charset_to_utf8($this->pati_career);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_career'])) ? $this->New_label['pati_career'] : "Pati Career"; 
         }
         else
         {
             $SC_Label = "pati_career"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_career;
   }
   //----- pati_caryerar
   function NM_export_pati_caryerar()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->pati_caryerar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_caryerar'])) ? $this->New_label['pati_caryerar'] : "Pati Caryerar"; 
         }
         else
         {
             $SC_Label = "pati_caryerar"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_caryerar;
   }
   //----- pati_carsem
   function NM_export_pati_carsem()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->pati_carsem, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_carsem'])) ? $this->New_label['pati_carsem'] : "Pati Carsem"; 
         }
         else
         {
             $SC_Label = "pati_carsem"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_carsem;
   }
   //----- pati_famphone
   function NM_export_pati_famphone()
   {
         $this->pati_famphone = NM_charset_to_utf8($this->pati_famphone);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_famphone'])) ? $this->New_label['pati_famphone'] : "Pati Famphone"; 
         }
         else
         {
             $SC_Label = "pati_famphone"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_famphone;
   }
   //----- pati_famname
   function NM_export_pati_famname()
   {
         $this->pati_famname = NM_charset_to_utf8($this->pati_famname);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_famname'])) ? $this->New_label['pati_famname'] : "Pati Famname"; 
         }
         else
         {
             $SC_Label = "pati_famname"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_famname;
   }
   //----- user_name
   function NM_export_user_name()
   {
         $this->user_name = NM_charset_to_utf8($this->user_name);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['user_name'])) ? $this->New_label['user_name'] : "User Name"; 
         }
         else
         {
             $SC_Label = "user_name"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->user_name;
   }
   //----- user_lname
   function NM_export_user_lname()
   {
         $this->user_lname = NM_charset_to_utf8($this->user_lname);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['user_lname'])) ? $this->New_label['user_lname'] : "User Lname"; 
         }
         else
         {
             $SC_Label = "user_lname"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->user_lname;
   }
   //----- user_docnum
   function NM_export_user_docnum()
   {
         $this->user_docnum = NM_charset_to_utf8($this->user_docnum);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['user_docnum'])) ? $this->New_label['user_docnum'] : "User Docnum"; 
         }
         else
         {
             $SC_Label = "user_docnum"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->user_docnum;
   }
   //----- btyp_name
   function NM_export_btyp_name()
   {
         $this->btyp_name = NM_charset_to_utf8($this->btyp_name);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['btyp_name'])) ? $this->New_label['btyp_name'] : "Btyp Name"; 
         }
         else
         {
             $SC_Label = "btyp_name"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->btyp_name;
   }
   //----- gerens_name
   function NM_export_gerens_name()
   {
         $this->gerens_name = NM_charset_to_utf8($this->gerens_name);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['gerens_name'])) ? $this->New_label['gerens_name'] : "Gerens Name"; 
         }
         else
         {
             $SC_Label = "gerens_name"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->gerens_name;
   }
   //----- treat_instruc
   function NM_export_treat_instruc()
   {
         $this->treat_instruc = NM_charset_to_utf8($this->treat_instruc);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['treat_instruc'])) ? $this->New_label['treat_instruc'] : "Treat Instruc"; 
         }
         else
         {
             $SC_Label = "treat_instruc"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->treat_instruc;
   }
   //----- treat_restdays
   function NM_export_treat_restdays()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->treat_restdays, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['treat_restdays'])) ? $this->New_label['treat_restdays'] : "Treat Restdays"; 
         }
         else
         {
             $SC_Label = "treat_restdays"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->treat_restdays;
   }
   //----- treat_rest
   function NM_export_treat_rest()
   {
         if ($this->Json_format)
         {
             nmgp_Form_Num_Val($this->treat_rest, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
         }
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['treat_rest'])) ? $this->New_label['treat_rest'] : "Treat Rest"; 
         }
         else
         {
             $SC_Label = "treat_rest"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->treat_rest;
   }
   //----- pat_nombre
   function NM_export_pat_nombre()
   {
         $this->pat_nombre = NM_charset_to_utf8($this->pat_nombre);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pat_nombre'])) ? $this->New_label['pat_nombre'] : "pat_nombre"; 
         }
         else
         {
             $SC_Label = "pat_nombre"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pat_nombre;
   }
   //----- pat_nombrefirma
   function NM_export_pat_nombrefirma()
   {
         $this->pat_nombrefirma = NM_charset_to_utf8($this->pat_nombrefirma);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pat_nombrefirma'])) ? $this->New_label['pat_nombrefirma'] : "pat_nombrefirma"; 
         }
         else
         {
             $SC_Label = "pat_nombrefirma"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pat_nombrefirma;
   }
   //----- pati_edad
   function NM_export_pati_edad()
   {
         $this->pati_edad = NM_charset_to_utf8($this->pati_edad);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_edad'])) ? $this->New_label['pati_edad'] : "pati_edad"; 
         }
         else
         {
             $SC_Label = "pati_edad"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_edad;
   }
   //----- treat_record
   function NM_export_treat_record()
   {
         $this->treat_record = NM_charset_to_utf8($this->treat_record);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['treat_record'])) ? $this->New_label['treat_record'] : "treat_record"; 
         }
         else
         {
             $SC_Label = "treat_record"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->treat_record;
   }
   //----- user_nombre
   function NM_export_user_nombre()
   {
         $this->user_nombre = NM_charset_to_utf8($this->user_nombre);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['user_nombre'])) ? $this->New_label['user_nombre'] : "user_nombre"; 
         }
         else
         {
             $SC_Label = "user_nombre"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->user_nombre;
   }
   //----- pati_docunum
   function NM_export_pati_docunum()
   {
         $this->pati_docunum = NM_charset_to_utf8($this->pati_docunum);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pati_docunum'])) ? $this->New_label['pati_docunum'] : "pati_docunum"; 
         }
         else
         {
             $SC_Label = "pati_docunum"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pati_docunum;
   }
   //----- pat_gerens
   function NM_export_pat_gerens()
   {
         $this->pat_gerens = NM_charset_to_utf8($this->pat_gerens);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pat_gerens'])) ? $this->New_label['pat_gerens'] : "pat_gerens"; 
         }
         else
         {
             $SC_Label = "pat_gerens"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pat_gerens;
   }
   //----- pat_btyp
   function NM_export_pat_btyp()
   {
         $this->pat_btyp = NM_charset_to_utf8($this->pat_btyp);
         if ($this->Json_use_label)
         {
             $SC_Label = (isset($this->New_label['pat_btyp'])) ? $this->New_label['pat_btyp'] : "pat_btyp"; 
         }
         else
         {
             $SC_Label = "pat_btyp"; 
         }
         $SC_Label = NM_charset_to_utf8($SC_Label); 
         $this->json_registro[$this->SC_seq_json][$SC_Label] = $this->pat_btyp;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
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
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_title'] ?> vw_anamnesis :: JSON</TITLE>
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
   <td class="scExportTitle" style="height: 25px">JSON</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="report_atenciones_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="report_atenciones"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['json_return']); ?>"> 
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
