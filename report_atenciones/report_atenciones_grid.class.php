<?php
class report_atenciones_grid
{
   var $Ini;
   var $Erro;
   var $Pdf;
   var $Db;
   var $rs_grid;
   var $nm_grid_sem_reg;
   var $SC_seq_register;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $nmgp_botoes = array();
   var $Campos_Mens_erro;
   var $NM_raiz_img; 
   var $Font_ttf; 
   var $array_pati_docunum = array();
   var $array_pat_gerens = array();
   var $array_pat_btyp = array();
   var $pat_nombre = array();
   var $pat_nombrefirma = array();
   var $pati_edad = array();
   var $treat_record = array();
   var $user_nombre = array();
   var $pati_docunum = array();
   var $pat_gerens = array();
   var $pat_btyp = array();
   var $anam_id = array();
   var $pati_id = array();
   var $user_id = array();
   var $anam_date = array();
   var $anam_strtime = array();
   var $anam_endtime = array();
   var $anam_career = array();
   var $anam_caryear = array();
   var $anam_carsem = array();
   var $anam_reason = array();
   var $anam_aller = array();
   var $anam_temp = array();
   var $anam_hbeat = array();
   var $anam_bpsys = array();
   var $anam_bpdia = array();
   var $anam_oxy = array();
   var $anam_gluco = array();
   var $anam_diag = array();
   var $pati_name = array();
   var $pati_lname = array();
   var $pati_docnum = array();
   var $pati_bod = array();
   var $pati_phone = array();
   var $pati_career = array();
   var $pati_caryerar = array();
   var $pati_carsem = array();
   var $pati_famphone = array();
   var $pati_famname = array();
   var $user_name = array();
   var $user_lname = array();
   var $user_docnum = array();
   var $btyp_name = array();
   var $gerens_name = array();
   var $treat_instruc = array();
   var $treat_restdays = array();
   var $treat_rest = array();
//--- 
 function monta_grid($linhas = 0)
 {

   clearstatcache();
   $this->inicializa();
   $this->grid();
 }
//--- 
 function inicializa()
 {
   global $nm_saida, 
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det, 
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->nm_data = new nm_data("es");
   include_once("../_lib/lib/php/nm_font_tcpdf.php");
   $this->default_font = '';
   $this->default_font_sr  = '';
   $this->default_style    = '';
   $this->default_style_sr = 'B';
   $Tp_papel = "A4";
   $old_dir = getcwd();
   $File_font_ttf     = "";
   $temp_font_ttf     = "";
   $this->Font_ttf    = false;
   $this->Font_ttf_sr = false;
   if (empty($this->default_font) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font))
   {
       $this->default_font = "Times";
   }
   if (empty($this->default_font_sr) && isset($arr_font_tcpdf[$this->Ini->str_lang]))
   {
       $this->default_font_sr = $arr_font_tcpdf[$this->Ini->str_lang];
   }
   elseif (empty($this->default_font_sr))
   {
       $this->default_font_sr = "Times";
   }
   $_SESSION['scriptcase']['report_atenciones']['default_font'] = $this->default_font;
   chdir($this->Ini->path_third . "/tcpdf/");
   include_once("tcpdf.php");
   chdir($old_dir);
   $this->Pdf = new TCPDF('P', 'mm', $Tp_papel, true, 'UTF-8', false);
   $this->Pdf->setPrintHeader(false);
   $this->Pdf->setPrintFooter(false);
   if (!empty($File_font_ttf))
   {
       $this->Pdf->addTTFfont($File_font_ttf, "", "", 32, $_SESSION['scriptcase']['dir_temp'] . "/");
   }
   $this->Pdf->SetDisplayMode('real');
   $this->aba_iframe = false;
   if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
   {
       foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("report_atenciones", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->anam_id[0] = (isset($Busca_temp['anam_id'])) ? $Busca_temp['anam_id'] : ""; 
       $tmp_pos = (is_string($this->anam_id[0])) ? strpos($this->anam_id[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->anam_id[0]))
       {
           $this->anam_id[0] = substr($this->anam_id[0], 0, $tmp_pos);
       }
       $this->pati_id[0] = (isset($Busca_temp['pati_id'])) ? $Busca_temp['pati_id'] : ""; 
       $tmp_pos = (is_string($this->pati_id[0])) ? strpos($this->pati_id[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->pati_id[0]))
       {
           $this->pati_id[0] = substr($this->pati_id[0], 0, $tmp_pos);
       }
       $this->user_id[0] = (isset($Busca_temp['user_id'])) ? $Busca_temp['user_id'] : ""; 
       $tmp_pos = (is_string($this->user_id[0])) ? strpos($this->user_id[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->user_id[0]))
       {
           $this->user_id[0] = substr($this->user_id[0], 0, $tmp_pos);
       }
       $this->anam_date[0] = (isset($Busca_temp['anam_date'])) ? $Busca_temp['anam_date'] : ""; 
       $tmp_pos = (is_string($this->anam_date[0])) ? strpos($this->anam_date[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->anam_date[0]))
       {
           $this->anam_date[0] = substr($this->anam_date[0], 0, $tmp_pos);
       }
       $anam_date_2 = (isset($Busca_temp['anam_date_input_2'])) ? $Busca_temp['anam_date_input_2'] : ""; 
       $this->anam_date_2 = $anam_date_2; 
       $this->treat_rest[0] = (isset($Busca_temp['treat_rest'])) ? $Busca_temp['treat_rest'] : ""; 
       $tmp_pos = (is_string($this->treat_rest[0])) ? strpos($this->treat_rest[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->treat_rest[0]))
       {
           $this->treat_rest[0] = substr($this->treat_rest[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->anam_date_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['report_atenciones']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['report_atenciones']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['report_atenciones']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['report_atenciones']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig'] = " where (anam_id = " . $_SESSION['anam'] . ")";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'];  
//----- 
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
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['ordem_desc']; 
   } 
   if (!empty($campos_order_select)) 
   { 
       if (!empty($nmgp_order_by)) 
       { 
          $nmgp_order_by .= ", " . $campos_order_select; 
       } 
       else 
       { 
          $nmgp_order_by = " order by $campos_order_select"; 
       } 
   } 
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['order_grid'] = $nmgp_order_by;
   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
   $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->nm_grid_sem_reg = $this->SC_conv_utf8($this->Ini->Nm_lang['lang_errm_empt']); 
   }  
// 
 }  
// 
 function Pdf_init()
 {
     if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
     {
         $this->Pdf->setRTL(true);
     }
     $this->Pdf->setHeaderMargin(0);
     $this->Pdf->setFooterMargin(0);
     if ($this->Font_ttf)
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12, $this->def_TTF);
     }
     else
     {
         $this->Pdf->SetFont($this->default_font, $this->default_style, 12);
     }
     $this->Pdf->SetTextColor(0, 0, 0);
 }
// 
 function Pdf_image()
 {
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(false);
   }
   $SV_margin = $this->Pdf->getBreakMargin();
   $SV_auto_page_break = $this->Pdf->getAutoPageBreak();
   $this->Pdf->SetAutoPageBreak(false, 0);
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__form_atencion2.jpg", "0.000000", "0.000000", "211.667 ", "292.629", '', '', '', false, 300, '', false, false, 0);
   $this->Pdf->SetAutoPageBreak($SV_auto_page_break, $SV_margin);
   $this->Pdf->setPageMark();
   if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
   {
       $this->Pdf->setRTL(true);
   }
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida, $nm_url_saida;
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_id'] = "Anam Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_id'] = "Pati Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['user_id'] = "User Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_date'] = "Anam Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_strtime'] = "Anam Strtime";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_endtime'] = "Anam Endtime";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_career'] = "Anam Career";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_caryear'] = "Anam Caryear";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_carsem'] = "Anam Carsem";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_reason'] = "Anam Reason";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_aller'] = "Anam Aller";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_temp'] = "Anam Temp";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_hbeat'] = "Anam Hbeat";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_bpsys'] = "Anam Bpsys";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_bpdia'] = "Anam Bpdia";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_oxy'] = "Anam Oxy";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_gluco'] = "Anam Gluco";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['anam_diag'] = "Anam Diag";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_name'] = "Pati Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_lname'] = "Pati Lname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_docnum'] = "Pati Docnum";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_bod'] = "Pati Bod";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_phone'] = "Pati Phone";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_career'] = "Pati Career";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_caryerar'] = "Pati Caryerar";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_carsem'] = "Pati Carsem";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_famphone'] = "Pati Famphone";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_famname'] = "Pati Famname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['user_name'] = "User Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['user_lname'] = "User Lname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['user_docnum'] = "User Docnum";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['btyp_name'] = "Btyp Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['gerens_name'] = "Gerens Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['treat_instruc'] = "Treat Instruc";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['treat_restdays'] = "Treat Restdays";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['treat_rest'] = "Treat Rest";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pat_nombre'] = "pat_nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pat_nombrefirma'] = "pat_nombrefirma";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_edad'] = "pati_edad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['treat_record'] = "treat_record";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['user_nombre'] = "user_nombre";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pati_docunum'] = "pati_docunum";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pat_gerens'] = "pat_gerens";
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['labels']['pat_btyp'] = "pat_btyp";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['report_atenciones']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['report_atenciones']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['report_atenciones']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       $this->Pdf_init();
       $this->Pdf->AddPage();
       if ($this->Font_ttf_sr)
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12, $this->def_TTF);
       }
       else
       {
           $this->Pdf->SetFont($this->default_font_sr, 'B', 12);
       }
       $this->Pdf->Text(0.000000, 0.000000, html_entity_decode($this->nm_grid_sem_reg, ENT_COMPAT, $_SESSION['scriptcase']['charset']));
       $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
       return;
   }
// 
   $Init_Pdf = true;
   $this->SC_seq_register = 0; 
   while (!$this->rs_grid->EOF) 
   {  
      $this->nm_grid_colunas = 0; 
      $nm_quant_linhas = 0;
      $this->Pdf->setImageScale(1.33);
      $this->Pdf->AddPage();
      $this->Pdf_init();
      $this->Pdf_image();
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->anam_id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->anam_id[$this->nm_grid_colunas] = (string)$this->anam_id[$this->nm_grid_colunas];
          $this->pati_id[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->pati_id[$this->nm_grid_colunas] = (string)$this->pati_id[$this->nm_grid_colunas];
          $this->user_id[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->user_id[$this->nm_grid_colunas] = (string)$this->user_id[$this->nm_grid_colunas];
          $this->anam_date[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->anam_strtime[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->anam_endtime[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->anam_career[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->anam_caryear[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
          $this->anam_caryear[$this->nm_grid_colunas] = (string)$this->anam_caryear[$this->nm_grid_colunas];
          $this->anam_carsem[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
          $this->anam_carsem[$this->nm_grid_colunas] = (string)$this->anam_carsem[$this->nm_grid_colunas];
          $this->anam_reason[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->anam_aller[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->anam_temp[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->anam_temp[$this->nm_grid_colunas] = (strpos(strtolower($this->anam_temp[$this->nm_grid_colunas]), "e")) ? (float)$this->anam_temp[$this->nm_grid_colunas] : $this->anam_temp[$this->nm_grid_colunas]; 
          $this->anam_temp[$this->nm_grid_colunas] = (string)$this->anam_temp[$this->nm_grid_colunas];
          $this->anam_hbeat[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->anam_hbeat[$this->nm_grid_colunas] = (strpos(strtolower($this->anam_hbeat[$this->nm_grid_colunas]), "e")) ? (float)$this->anam_hbeat[$this->nm_grid_colunas] : $this->anam_hbeat[$this->nm_grid_colunas]; 
          $this->anam_hbeat[$this->nm_grid_colunas] = (string)$this->anam_hbeat[$this->nm_grid_colunas];
          $this->anam_bpsys[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->anam_bpsys[$this->nm_grid_colunas] = (strpos(strtolower($this->anam_bpsys[$this->nm_grid_colunas]), "e")) ? (float)$this->anam_bpsys[$this->nm_grid_colunas] : $this->anam_bpsys[$this->nm_grid_colunas]; 
          $this->anam_bpsys[$this->nm_grid_colunas] = (string)$this->anam_bpsys[$this->nm_grid_colunas];
          $this->anam_bpdia[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->anam_bpdia[$this->nm_grid_colunas] = (strpos(strtolower($this->anam_bpdia[$this->nm_grid_colunas]), "e")) ? (float)$this->anam_bpdia[$this->nm_grid_colunas] : $this->anam_bpdia[$this->nm_grid_colunas]; 
          $this->anam_bpdia[$this->nm_grid_colunas] = (string)$this->anam_bpdia[$this->nm_grid_colunas];
          $this->anam_oxy[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->anam_oxy[$this->nm_grid_colunas] = (strpos(strtolower($this->anam_oxy[$this->nm_grid_colunas]), "e")) ? (float)$this->anam_oxy[$this->nm_grid_colunas] : $this->anam_oxy[$this->nm_grid_colunas]; 
          $this->anam_oxy[$this->nm_grid_colunas] = (string)$this->anam_oxy[$this->nm_grid_colunas];
          $this->anam_gluco[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->anam_gluco[$this->nm_grid_colunas] = (strpos(strtolower($this->anam_gluco[$this->nm_grid_colunas]), "e")) ? (float)$this->anam_gluco[$this->nm_grid_colunas] : $this->anam_gluco[$this->nm_grid_colunas]; 
          $this->anam_gluco[$this->nm_grid_colunas] = (string)$this->anam_gluco[$this->nm_grid_colunas];
          $this->anam_diag[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->pati_name[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->pati_lname[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->pati_docnum[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->pati_docnum[$this->nm_grid_colunas] = (string)$this->pati_docnum[$this->nm_grid_colunas];
          $this->pati_bod[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          $this->pati_phone[$this->nm_grid_colunas] = $this->rs_grid->fields[22] ;  
          $this->pati_phone[$this->nm_grid_colunas] = (string)$this->pati_phone[$this->nm_grid_colunas];
          $this->pati_career[$this->nm_grid_colunas] = $this->rs_grid->fields[23] ;  
          $this->pati_caryerar[$this->nm_grid_colunas] = $this->rs_grid->fields[24] ;  
          $this->pati_caryerar[$this->nm_grid_colunas] = (string)$this->pati_caryerar[$this->nm_grid_colunas];
          $this->pati_carsem[$this->nm_grid_colunas] = $this->rs_grid->fields[25] ;  
          $this->pati_carsem[$this->nm_grid_colunas] = (string)$this->pati_carsem[$this->nm_grid_colunas];
          $this->pati_famphone[$this->nm_grid_colunas] = $this->rs_grid->fields[26] ;  
          $this->pati_famname[$this->nm_grid_colunas] = $this->rs_grid->fields[27] ;  
          $this->user_name[$this->nm_grid_colunas] = $this->rs_grid->fields[28] ;  
          $this->user_lname[$this->nm_grid_colunas] = $this->rs_grid->fields[29] ;  
          $this->user_docnum[$this->nm_grid_colunas] = $this->rs_grid->fields[30] ;  
          $this->btyp_name[$this->nm_grid_colunas] = $this->rs_grid->fields[31] ;  
          $this->gerens_name[$this->nm_grid_colunas] = $this->rs_grid->fields[32] ;  
          $this->treat_instruc[$this->nm_grid_colunas] = $this->rs_grid->fields[33] ;  
          $this->treat_restdays[$this->nm_grid_colunas] = $this->rs_grid->fields[34] ;  
          $this->treat_restdays[$this->nm_grid_colunas] = (string)$this->treat_restdays[$this->nm_grid_colunas];
          $this->treat_rest[$this->nm_grid_colunas] = $this->rs_grid->fields[35] ;  
          $this->treat_rest[$this->nm_grid_colunas] = (string)$this->treat_rest[$this->nm_grid_colunas];
          $this->pat_nombre[$this->nm_grid_colunas] = "";
          $this->pat_nombrefirma[$this->nm_grid_colunas] = "";
          $this->pati_edad[$this->nm_grid_colunas] = "";
          $this->treat_record[$this->nm_grid_colunas] = "";
          $this->user_nombre[$this->nm_grid_colunas] = "";
          $this->pati_docunum[$this->nm_grid_colunas] = "";
          $this->pat_gerens[$this->nm_grid_colunas] = "";
          $this->pat_btyp[$this->nm_grid_colunas] = "";
          $this->Lookup->lookup_pati_docunum($this->pati_docunum[$this->nm_grid_colunas], $this->pati_docunum[$this->nm_grid_colunas], $this->array_pati_docunum); 
          $this->Lookup->lookup_pat_gerens($this->pat_gerens[$this->nm_grid_colunas], $this->pat_gerens[$this->nm_grid_colunas], $this->array_pat_gerens); 
          $this->Lookup->lookup_pat_btyp($this->pat_btyp[$this->nm_grid_colunas], $this->pat_btyp[$this->nm_grid_colunas], $this->array_pat_btyp); 
          $_SESSION['scriptcase']['report_atenciones']['contr_erro'] = 'on';
 $this->pat_nombre[$this->nm_grid_colunas]  = $this->pati_lname[$this->nm_grid_colunas] . ", ". $this->pati_name[$this->nm_grid_colunas] ;
$this->pat_nombrefirma[$this->nm_grid_colunas]  = $this->pati_lname[$this->nm_grid_colunas] . ", ". $this->pati_name[$this->nm_grid_colunas] ;
$this->user_nombre[$this->nm_grid_colunas]  = $this->user_lname[$this->nm_grid_colunas] . ", ". $this->user_name[$this->nm_grid_colunas] ;

if ($this->treat_restdays[$this->nm_grid_colunas]  > 0  ) 
	{ 
	$this->treat_record[$this->nm_grid_colunas]  = "Se recomiendan ". $this->treat_restdays[$this->nm_grid_colunas] ." días de reposo";
	 } else {
		
		$this->treat_record[$this->nm_grid_colunas]  ="No hay recomendaciones";
	}


$edad = [];
$edad = $this->nm_data->Dif_Datas_2($this->anam_date[$this->nm_grid_colunas] , "yyyy-mm-dd", $this->pati_bod[$this->nm_grid_colunas] , "yyyy-mm-dd", 2);
$this->pati_edad[$this->nm_grid_colunas]  = $edad[2];

$_SESSION['scriptcase']['report_atenciones']['contr_erro'] = 'off';
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_id[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_id[$this->nm_grid_colunas] = sc_strip_script($this->anam_id[$this->nm_grid_colunas]);
          }
          if ($this->anam_id[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_id[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_id[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_id[$this->nm_grid_colunas] = sc_strip_script($this->pati_id[$this->nm_grid_colunas]);
          }
          if ($this->pati_id[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pati_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pati_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_id[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->user_id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->user_id[$this->nm_grid_colunas]));
          }
          else {
              $this->user_id[$this->nm_grid_colunas] = sc_strip_script($this->user_id[$this->nm_grid_colunas]);
          }
          if ($this->user_id[$this->nm_grid_colunas] === "") 
          { 
              $this->user_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->user_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->user_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->user_id[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_date[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_date[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_date[$this->nm_grid_colunas] = sc_strip_script($this->anam_date[$this->nm_grid_colunas]);
          }
          if ($this->anam_date[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_date[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $anam_date_x =  $this->anam_date[$this->nm_grid_colunas];
               nm_conv_limpa_dado($anam_date_x, "YYYY-MM-DD");
               if (is_numeric($anam_date_x) && strlen($anam_date_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->anam_date[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->anam_date[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->anam_date[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_date[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_strtime[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_strtime[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_strtime[$this->nm_grid_colunas] = sc_strip_script($this->anam_strtime[$this->nm_grid_colunas]);
          }
          if ($this->anam_strtime[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_strtime[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $anam_strtime_x =  $this->anam_strtime[$this->nm_grid_colunas];
               nm_conv_limpa_dado($anam_strtime_x, "HH:II:SS");
               if (is_numeric($anam_strtime_x) && strlen($anam_strtime_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->anam_strtime[$this->nm_grid_colunas], "HH:II:SS");
                   $this->anam_strtime[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhii")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->anam_strtime[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_strtime[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_endtime[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_endtime[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_endtime[$this->nm_grid_colunas] = sc_strip_script($this->anam_endtime[$this->nm_grid_colunas]);
          }
          if ($this->anam_endtime[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_endtime[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $anam_endtime_x =  $this->anam_endtime[$this->nm_grid_colunas];
               nm_conv_limpa_dado($anam_endtime_x, "HH:II:SS");
               if (is_numeric($anam_endtime_x) && strlen($anam_endtime_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->anam_endtime[$this->nm_grid_colunas], "HH:II:SS");
                   $this->anam_endtime[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->anam_endtime[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_endtime[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_career[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_career[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_career[$this->nm_grid_colunas] = sc_strip_script($this->anam_career[$this->nm_grid_colunas]);
          }
          if ($this->anam_career[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_career[$this->nm_grid_colunas] = "" ;  
          } 
          $this->anam_career[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_career[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_caryear[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_caryear[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_caryear[$this->nm_grid_colunas] = sc_strip_script($this->anam_caryear[$this->nm_grid_colunas]);
          }
          if ($this->anam_caryear[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_caryear[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_caryear[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_caryear[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_caryear[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_carsem[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_carsem[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_carsem[$this->nm_grid_colunas] = sc_strip_script($this->anam_carsem[$this->nm_grid_colunas]);
          }
          if ($this->anam_carsem[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_carsem[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_carsem[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_carsem[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_carsem[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_reason[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_reason[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_reason[$this->nm_grid_colunas] = sc_strip_script($this->anam_reason[$this->nm_grid_colunas]);
          }
          if ($this->anam_reason[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_reason[$this->nm_grid_colunas] = "" ;  
          } 
          if ($this->anam_reason[$this->nm_grid_colunas] !== "")
          { 
              $this->anam_reason[$this->nm_grid_colunas] = nl2br($this->anam_reason[$this->nm_grid_colunas]) ; 
              $temp = explode("<br />", $this->anam_reason[$this->nm_grid_colunas]); 
              if (!isset($temp[1])) 
              { 
                  $temp = explode("<br>", $this->anam_reason[$this->nm_grid_colunas]); 
              } 
              $this->anam_reason[$this->nm_grid_colunas] = "" ; 
              $ind_x = 0 ; 
              while (isset($temp[$ind_x])) 
              { 
                 if (!empty($this->anam_reason[$this->nm_grid_colunas])) 
                 { 
                     $this->anam_reason[$this->nm_grid_colunas] .= "<br>"; 
                 } 
                 if (strlen($temp[$ind_x]) > 50) 
                 { 
                     $this->anam_reason[$this->nm_grid_colunas] .= wordwrap($temp[$ind_x], 50, "<br>", true); 
                 } 
                 else 
                 { 
                     $this->anam_reason[$this->nm_grid_colunas] .= $temp[$ind_x]; 
                 } 
                 $ind_x++; 
              }  
          }  
          $this->anam_reason[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_reason[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_aller[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_aller[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_aller[$this->nm_grid_colunas] = sc_strip_script($this->anam_aller[$this->nm_grid_colunas]);
          }
          if ($this->anam_aller[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_aller[$this->nm_grid_colunas] = "" ;  
          } 
          $this->anam_aller[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_aller[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_temp[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_temp[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_temp[$this->nm_grid_colunas] = sc_strip_script($this->anam_temp[$this->nm_grid_colunas]);
          }
          if ($this->anam_temp[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_temp[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_temp[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_temp[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_temp[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_hbeat[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_hbeat[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_hbeat[$this->nm_grid_colunas] = sc_strip_script($this->anam_hbeat[$this->nm_grid_colunas]);
          }
          if ($this->anam_hbeat[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_hbeat[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_hbeat[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_hbeat[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_hbeat[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_bpsys[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_bpsys[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_bpsys[$this->nm_grid_colunas] = sc_strip_script($this->anam_bpsys[$this->nm_grid_colunas]);
          }
          if ($this->anam_bpsys[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_bpsys[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_bpsys[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_bpsys[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_bpsys[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_bpdia[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_bpdia[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_bpdia[$this->nm_grid_colunas] = sc_strip_script($this->anam_bpdia[$this->nm_grid_colunas]);
          }
          if ($this->anam_bpdia[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_bpdia[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_bpdia[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_bpdia[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_bpdia[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_oxy[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_oxy[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_oxy[$this->nm_grid_colunas] = sc_strip_script($this->anam_oxy[$this->nm_grid_colunas]);
          }
          if ($this->anam_oxy[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_oxy[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_oxy[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_oxy[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_oxy[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_gluco[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_gluco[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_gluco[$this->nm_grid_colunas] = sc_strip_script($this->anam_gluco[$this->nm_grid_colunas]);
          }
          if ($this->anam_gluco[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_gluco[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->anam_gluco[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->anam_gluco[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_gluco[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->anam_diag[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->anam_diag[$this->nm_grid_colunas]));
          }
          else {
              $this->anam_diag[$this->nm_grid_colunas] = sc_strip_script($this->anam_diag[$this->nm_grid_colunas]);
          }
          if ($this->anam_diag[$this->nm_grid_colunas] === "") 
          { 
              $this->anam_diag[$this->nm_grid_colunas] = "" ;  
          } 
          $this->anam_diag[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->anam_diag[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_name[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_name[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_name[$this->nm_grid_colunas] = sc_strip_script($this->pati_name[$this->nm_grid_colunas]);
          }
          if ($this->pati_name[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_name[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_name[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_name[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_lname[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_lname[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_lname[$this->nm_grid_colunas] = sc_strip_script($this->pati_lname[$this->nm_grid_colunas]);
          }
          if ($this->pati_lname[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_lname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_lname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_lname[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_docnum[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_docnum[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_docnum[$this->nm_grid_colunas] = sc_strip_script($this->pati_docnum[$this->nm_grid_colunas]);
          }
          if ($this->pati_docnum[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_docnum[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pati_docnum[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pati_docnum[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_docnum[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_bod[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_bod[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_bod[$this->nm_grid_colunas] = sc_strip_script($this->pati_bod[$this->nm_grid_colunas]);
          }
          if ($this->pati_bod[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_bod[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $pati_bod_x =  $this->pati_bod[$this->nm_grid_colunas];
               nm_conv_limpa_dado($pati_bod_x, "YYYY-MM-DD");
               if (is_numeric($pati_bod_x) && strlen($pati_bod_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->pati_bod[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->pati_bod[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->pati_bod[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_bod[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_phone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_phone[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_phone[$this->nm_grid_colunas] = sc_strip_script($this->pati_phone[$this->nm_grid_colunas]);
          }
          if ($this->pati_phone[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_phone[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pati_phone[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pati_phone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_phone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_career[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_career[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_career[$this->nm_grid_colunas] = sc_strip_script($this->pati_career[$this->nm_grid_colunas]);
          }
          if ($this->pati_career[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_career[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_career[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_career[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_caryerar[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_caryerar[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_caryerar[$this->nm_grid_colunas] = sc_strip_script($this->pati_caryerar[$this->nm_grid_colunas]);
          }
          if ($this->pati_caryerar[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_caryerar[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pati_caryerar[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pati_caryerar[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_caryerar[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_carsem[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_carsem[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_carsem[$this->nm_grid_colunas] = sc_strip_script($this->pati_carsem[$this->nm_grid_colunas]);
          }
          if ($this->pati_carsem[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_carsem[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pati_carsem[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pati_carsem[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_carsem[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_famphone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_famphone[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_famphone[$this->nm_grid_colunas] = sc_strip_script($this->pati_famphone[$this->nm_grid_colunas]);
          }
          if ($this->pati_famphone[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_famphone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_famphone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_famphone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_famname[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pati_famname[$this->nm_grid_colunas]));
          }
          else {
              $this->pati_famname[$this->nm_grid_colunas] = sc_strip_script($this->pati_famname[$this->nm_grid_colunas]);
          }
          if ($this->pati_famname[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_famname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_famname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_famname[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->user_name[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->user_name[$this->nm_grid_colunas]));
          }
          else {
              $this->user_name[$this->nm_grid_colunas] = sc_strip_script($this->user_name[$this->nm_grid_colunas]);
          }
          if ($this->user_name[$this->nm_grid_colunas] === "") 
          { 
              $this->user_name[$this->nm_grid_colunas] = "" ;  
          } 
          $this->user_name[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->user_name[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->user_lname[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->user_lname[$this->nm_grid_colunas]));
          }
          else {
              $this->user_lname[$this->nm_grid_colunas] = sc_strip_script($this->user_lname[$this->nm_grid_colunas]);
          }
          if ($this->user_lname[$this->nm_grid_colunas] === "") 
          { 
              $this->user_lname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->user_lname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->user_lname[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->user_docnum[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->user_docnum[$this->nm_grid_colunas]));
          }
          else {
              $this->user_docnum[$this->nm_grid_colunas] = sc_strip_script($this->user_docnum[$this->nm_grid_colunas]);
          }
          if ($this->user_docnum[$this->nm_grid_colunas] === "") 
          { 
              $this->user_docnum[$this->nm_grid_colunas] = "" ;  
          } 
          $this->user_docnum[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->user_docnum[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->btyp_name[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->btyp_name[$this->nm_grid_colunas]));
          }
          else {
              $this->btyp_name[$this->nm_grid_colunas] = sc_strip_script($this->btyp_name[$this->nm_grid_colunas]);
          }
          if ($this->btyp_name[$this->nm_grid_colunas] === "") 
          { 
              $this->btyp_name[$this->nm_grid_colunas] = "" ;  
          } 
          $this->btyp_name[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->btyp_name[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->gerens_name[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->gerens_name[$this->nm_grid_colunas]));
          }
          else {
              $this->gerens_name[$this->nm_grid_colunas] = sc_strip_script($this->gerens_name[$this->nm_grid_colunas]);
          }
          if ($this->gerens_name[$this->nm_grid_colunas] === "") 
          { 
              $this->gerens_name[$this->nm_grid_colunas] = "" ;  
          } 
          $this->gerens_name[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->gerens_name[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->treat_instruc[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->treat_instruc[$this->nm_grid_colunas]));
          }
          else {
              $this->treat_instruc[$this->nm_grid_colunas] = sc_strip_script($this->treat_instruc[$this->nm_grid_colunas]);
          }
          if ($this->treat_instruc[$this->nm_grid_colunas] === "") 
          { 
              $this->treat_instruc[$this->nm_grid_colunas] = "" ;  
          } 
          $this->treat_instruc[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->treat_instruc[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->treat_restdays[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->treat_restdays[$this->nm_grid_colunas]));
          }
          else {
              $this->treat_restdays[$this->nm_grid_colunas] = sc_strip_script($this->treat_restdays[$this->nm_grid_colunas]);
          }
          if ($this->treat_restdays[$this->nm_grid_colunas] === "") 
          { 
              $this->treat_restdays[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->treat_restdays[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->treat_restdays[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->treat_restdays[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->treat_rest[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->treat_rest[$this->nm_grid_colunas]));
          }
          else {
              $this->treat_rest[$this->nm_grid_colunas] = sc_strip_script($this->treat_rest[$this->nm_grid_colunas]);
          }
          if ($this->treat_rest[$this->nm_grid_colunas] === "") 
          { 
              $this->treat_rest[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->treat_rest[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->treat_rest[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->treat_rest[$this->nm_grid_colunas]);
          if ($this->pat_nombre[$this->nm_grid_colunas] === "") 
          { 
              $this->pat_nombre[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pat_nombre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pat_nombre[$this->nm_grid_colunas]);
          if ($this->pat_nombrefirma[$this->nm_grid_colunas] === "") 
          { 
              $this->pat_nombrefirma[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pat_nombrefirma[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pat_nombrefirma[$this->nm_grid_colunas]);
          if ($this->pati_edad[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_edad[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_edad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_edad[$this->nm_grid_colunas]);
          if ($this->treat_record[$this->nm_grid_colunas] === "") 
          { 
              $this->treat_record[$this->nm_grid_colunas] = "" ;  
          } 
          $this->treat_record[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->treat_record[$this->nm_grid_colunas]);
          if ($this->user_nombre[$this->nm_grid_colunas] === "") 
          { 
              $this->user_nombre[$this->nm_grid_colunas] = "" ;  
          } 
          $this->user_nombre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->user_nombre[$this->nm_grid_colunas]);
          $this->Lookup->lookup_pati_docunum($this->pati_docunum[$this->nm_grid_colunas], $this->pati_docunum[$this->nm_grid_colunas], $this->array_pati_docunum); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pati_docunum[$this->nm_grid_colunas] = trim(NM_encode_input(sc_strip_script($this->pati_docunum[$this->nm_grid_colunas]))); 
          }
          else {
              $this->pati_docunum[$this->nm_grid_colunas] = trim(sc_strip_script($this->pati_docunum[$this->nm_grid_colunas])); 
          }
          if ($this->pati_docunum[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_docunum[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_docunum[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_docunum[$this->nm_grid_colunas]);
          $this->Lookup->lookup_pat_gerens($this->pat_gerens[$this->nm_grid_colunas], $this->pat_gerens[$this->nm_grid_colunas], $this->array_pat_gerens); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pat_gerens[$this->nm_grid_colunas] = trim(NM_encode_input(sc_strip_script($this->pat_gerens[$this->nm_grid_colunas]))); 
          }
          else {
              $this->pat_gerens[$this->nm_grid_colunas] = trim(sc_strip_script($this->pat_gerens[$this->nm_grid_colunas])); 
          }
          if ($this->pat_gerens[$this->nm_grid_colunas] === "") 
          { 
              $this->pat_gerens[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pat_gerens[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pat_gerens[$this->nm_grid_colunas]);
          $this->Lookup->lookup_pat_btyp($this->pat_btyp[$this->nm_grid_colunas], $this->pat_btyp[$this->nm_grid_colunas], $this->array_pat_btyp); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['report_atenciones']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pat_btyp[$this->nm_grid_colunas] = trim(NM_encode_input(sc_strip_script($this->pat_btyp[$this->nm_grid_colunas]))); 
          }
          else {
              $this->pat_btyp[$this->nm_grid_colunas] = trim(sc_strip_script($this->pat_btyp[$this->nm_grid_colunas])); 
          }
          if ($this->pat_btyp[$this->nm_grid_colunas] === "") 
          { 
              $this->pat_btyp[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pat_btyp[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pat_btyp[$this->nm_grid_colunas]);
            $cell_anam_date = array('posx' => '30.47497291666283', 'posy' => '74.90565833332388', 'data' => $this->anam_date[$this->nm_grid_colunas], 'width'      => '40', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_strtime = array('posx' => '177', 'posy' => '75.37767499999049', 'data' => $this->anam_strtime[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_career = array('posx' => '39.34936249999504', 'posy' => '100.413872916654', 'data' => $this->anam_career[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_carsem = array('posx' => '185', 'posy' => '101.86008541665383', 'data' => $this->anam_carsem[$this->nm_grid_colunas], 'width'      => '20', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_reason = array('posx' => '38.28467916666184', 'posy' => '110.03279999998612', 'data' => $this->anam_reason[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_aller = array('posx' => '157.6281666666468', 'posy' => '118.98338958331834', 'data' => $this->anam_aller[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_temp = array('posx' => '88.03375416665557', 'posy' => '138.77845624998253', 'data' => $this->anam_temp[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_hbeat = array('posx' => '66.063283333325', 'posy' => '138.1794395833159', 'data' => $this->anam_hbeat[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_bpsys = array('posx' => '16.867187499997872', 'posy' => '137.8717291666493', 'data' => $this->anam_bpsys[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_bpdia = array('posx' => '40.144964583328274', 'posy' => '138.33951249998253', 'data' => $this->anam_bpdia[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_oxy = array('posx' => '113.44089791665236', 'posy' => '138.55620624998252', 'data' => $this->anam_oxy[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_gluco = array('posx' => '135.66960208331625', 'posy' => '138.5067291666492', 'data' => $this->anam_gluco[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anam_diag = array('posx' => '12.098258124998475', 'posy' => '156.1758687499803', 'data' => $this->anam_diag[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pati_phone = array('posx' => '82.21001041665629', 'posy' => '75.20225624999051', 'data' => $this->pati_phone[$this->nm_grid_colunas], 'width'      => '40', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_treat_instruc = array('posx' => '13.957696874998241', 'posy' => '198.7047291666416', 'data' => $this->treat_instruc[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pat_nombre = array('posx' => '66.66203541665827', 'posy' => '83.86471458332275', 'data' => $this->pat_nombre[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pat_nombrefirma = array('posx' => '134.6554541666497', 'posy' => '252.1360104166349', 'data' => $this->pat_nombrefirma[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_user_nombre = array('posx' => '38.0769812499952', 'posy' => '252.1296604166349', 'data' => $this->user_nombre[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_treat_record = array('posx' => '98.14480624998762', 'posy' => '198.42374166664163', 'data' => $this->treat_record[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pati_edad = array('posx' => '185', 'posy' => '84.12374166665606', 'data' => $this->pati_edad[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pati_docunum = array('posx' => '37.83171249999523', 'posy' => '92.3387895833217', 'data' => $this->pati_docnum[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pat_gerens = array('posx' => '117.73587916665181', 'posy' => '92.3387895833217', 'data' => $this->gerens_name[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_pat_btyp = array('posx' => '185', 'posy' => '92.3387895833217', 'data' => $this->btyp_name[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_anam_date['font_type'], $cell_anam_date['font_style'], $cell_anam_date['font_size']);
            $this->pdf_text_color($cell_anam_date['data'], $cell_anam_date['color_r'], $cell_anam_date['color_g'], $cell_anam_date['color_b']);
            if (!empty($cell_anam_date['posx']) && !empty($cell_anam_date['posy']))
            {
                $this->Pdf->SetXY($cell_anam_date['posx'], $cell_anam_date['posy']);
            }
            elseif (!empty($cell_anam_date['posx']))
            {
                $this->Pdf->SetX($cell_anam_date['posx']);
            }
            elseif (!empty($cell_anam_date['posy']))
            {
                $this->Pdf->SetY($cell_anam_date['posy']);
            }
            $this->Pdf->Cell($cell_anam_date['width'], 0, $cell_anam_date['data'], 0, 0, $cell_anam_date['align']);

            $this->Pdf->SetFont($cell_anam_strtime['font_type'], $cell_anam_strtime['font_style'], $cell_anam_strtime['font_size']);
            $this->pdf_text_color($cell_anam_strtime['data'], $cell_anam_strtime['color_r'], $cell_anam_strtime['color_g'], $cell_anam_strtime['color_b']);
            if (!empty($cell_anam_strtime['posx']) && !empty($cell_anam_strtime['posy']))
            {
                $this->Pdf->SetXY($cell_anam_strtime['posx'], $cell_anam_strtime['posy']);
            }
            elseif (!empty($cell_anam_strtime['posx']))
            {
                $this->Pdf->SetX($cell_anam_strtime['posx']);
            }
            elseif (!empty($cell_anam_strtime['posy']))
            {
                $this->Pdf->SetY($cell_anam_strtime['posy']);
            }
            $this->Pdf->Cell($cell_anam_strtime['width'], 0, $cell_anam_strtime['data'], 0, 0, $cell_anam_strtime['align']);

            $this->Pdf->SetFont($cell_anam_career['font_type'], $cell_anam_career['font_style'], $cell_anam_career['font_size']);
            $this->pdf_text_color($cell_anam_career['data'], $cell_anam_career['color_r'], $cell_anam_career['color_g'], $cell_anam_career['color_b']);
            if (!empty($cell_anam_career['posx']) && !empty($cell_anam_career['posy']))
            {
                $this->Pdf->SetXY($cell_anam_career['posx'], $cell_anam_career['posy']);
            }
            elseif (!empty($cell_anam_career['posx']))
            {
                $this->Pdf->SetX($cell_anam_career['posx']);
            }
            elseif (!empty($cell_anam_career['posy']))
            {
                $this->Pdf->SetY($cell_anam_career['posy']);
            }
            $this->Pdf->Cell($cell_anam_career['width'], 0, $cell_anam_career['data'], 0, 0, $cell_anam_career['align']);

            $this->Pdf->SetFont($cell_anam_carsem['font_type'], $cell_anam_carsem['font_style'], $cell_anam_carsem['font_size']);
            $this->pdf_text_color($cell_anam_carsem['data'], $cell_anam_carsem['color_r'], $cell_anam_carsem['color_g'], $cell_anam_carsem['color_b']);
            if (!empty($cell_anam_carsem['posx']) && !empty($cell_anam_carsem['posy']))
            {
                $this->Pdf->SetXY($cell_anam_carsem['posx'], $cell_anam_carsem['posy']);
            }
            elseif (!empty($cell_anam_carsem['posx']))
            {
                $this->Pdf->SetX($cell_anam_carsem['posx']);
            }
            elseif (!empty($cell_anam_carsem['posy']))
            {
                $this->Pdf->SetY($cell_anam_carsem['posy']);
            }
            $this->Pdf->Cell($cell_anam_carsem['width'], 0, $cell_anam_carsem['data'], 0, 0, $cell_anam_carsem['align']);

            $this->Pdf->SetFont($cell_anam_reason['font_type'], $cell_anam_reason['font_style'], $cell_anam_reason['font_size']);
            $this->Pdf->SetTextColor($cell_anam_reason['color_r'], $cell_anam_reason['color_g'], $cell_anam_reason['color_b']);
            if (!empty($cell_anam_reason['posx']) && !empty($cell_anam_reason['posy']))
            {
                $this->Pdf->SetXY($cell_anam_reason['posx'], $cell_anam_reason['posy']);
            }
            elseif (!empty($cell_anam_reason['posx']))
            {
                $this->Pdf->SetX($cell_anam_reason['posx']);
            }
            elseif (!empty($cell_anam_reason['posy']))
            {
                $this->Pdf->SetY($cell_anam_reason['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_anam_reason['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_anam_reason['width'], 0, trim($Lines), 0, 0, $cell_anam_reason['align']);
                $Incre = true;
            }
            $this->Pdf->SetFont($cell_anam_aller['font_type'], $cell_anam_aller['font_style'], $cell_anam_aller['font_size']);
            $this->Pdf->SetTextColor($cell_anam_aller['color_r'], $cell_anam_aller['color_g'], $cell_anam_aller['color_b']);
            if (!empty($cell_anam_aller['posx']) && !empty($cell_anam_aller['posy']))
            {
                $this->Pdf->SetXY($cell_anam_aller['posx'], $cell_anam_aller['posy']);
            }
            elseif (!empty($cell_anam_aller['posx']))
            {
                $this->Pdf->SetX($cell_anam_aller['posx']);
            }
            elseif (!empty($cell_anam_aller['posy']))
            {
                $this->Pdf->SetY($cell_anam_aller['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_anam_aller['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_anam_aller['width'], 0, trim($Lines), 0, 0, $cell_anam_aller['align']);
                $Incre = true;
            }

            $this->Pdf->SetFont($cell_anam_temp['font_type'], $cell_anam_temp['font_style'], $cell_anam_temp['font_size']);
            $this->pdf_text_color($cell_anam_temp['data'], $cell_anam_temp['color_r'], $cell_anam_temp['color_g'], $cell_anam_temp['color_b']);
            if (!empty($cell_anam_temp['posx']) && !empty($cell_anam_temp['posy']))
            {
                $this->Pdf->SetXY($cell_anam_temp['posx'], $cell_anam_temp['posy']);
            }
            elseif (!empty($cell_anam_temp['posx']))
            {
                $this->Pdf->SetX($cell_anam_temp['posx']);
            }
            elseif (!empty($cell_anam_temp['posy']))
            {
                $this->Pdf->SetY($cell_anam_temp['posy']);
            }
            $this->Pdf->Cell($cell_anam_temp['width'], 0, $cell_anam_temp['data'], 0, 0, $cell_anam_temp['align']);

            $this->Pdf->SetFont($cell_anam_hbeat['font_type'], $cell_anam_hbeat['font_style'], $cell_anam_hbeat['font_size']);
            $this->pdf_text_color($cell_anam_hbeat['data'], $cell_anam_hbeat['color_r'], $cell_anam_hbeat['color_g'], $cell_anam_hbeat['color_b']);
            if (!empty($cell_anam_hbeat['posx']) && !empty($cell_anam_hbeat['posy']))
            {
                $this->Pdf->SetXY($cell_anam_hbeat['posx'], $cell_anam_hbeat['posy']);
            }
            elseif (!empty($cell_anam_hbeat['posx']))
            {
                $this->Pdf->SetX($cell_anam_hbeat['posx']);
            }
            elseif (!empty($cell_anam_hbeat['posy']))
            {
                $this->Pdf->SetY($cell_anam_hbeat['posy']);
            }
            $this->Pdf->Cell($cell_anam_hbeat['width'], 0, $cell_anam_hbeat['data'], 0, 0, $cell_anam_hbeat['align']);

            $this->Pdf->SetFont($cell_anam_bpsys['font_type'], $cell_anam_bpsys['font_style'], $cell_anam_bpsys['font_size']);
            $this->pdf_text_color($cell_anam_bpsys['data'], $cell_anam_bpsys['color_r'], $cell_anam_bpsys['color_g'], $cell_anam_bpsys['color_b']);
            if (!empty($cell_anam_bpsys['posx']) && !empty($cell_anam_bpsys['posy']))
            {
                $this->Pdf->SetXY($cell_anam_bpsys['posx'], $cell_anam_bpsys['posy']);
            }
            elseif (!empty($cell_anam_bpsys['posx']))
            {
                $this->Pdf->SetX($cell_anam_bpsys['posx']);
            }
            elseif (!empty($cell_anam_bpsys['posy']))
            {
                $this->Pdf->SetY($cell_anam_bpsys['posy']);
            }
            $this->Pdf->Cell($cell_anam_bpsys['width'], 0, $cell_anam_bpsys['data'], 0, 0, $cell_anam_bpsys['align']);

            $this->Pdf->SetFont($cell_anam_bpdia['font_type'], $cell_anam_bpdia['font_style'], $cell_anam_bpdia['font_size']);
            $this->pdf_text_color($cell_anam_bpdia['data'], $cell_anam_bpdia['color_r'], $cell_anam_bpdia['color_g'], $cell_anam_bpdia['color_b']);
            if (!empty($cell_anam_bpdia['posx']) && !empty($cell_anam_bpdia['posy']))
            {
                $this->Pdf->SetXY($cell_anam_bpdia['posx'], $cell_anam_bpdia['posy']);
            }
            elseif (!empty($cell_anam_bpdia['posx']))
            {
                $this->Pdf->SetX($cell_anam_bpdia['posx']);
            }
            elseif (!empty($cell_anam_bpdia['posy']))
            {
                $this->Pdf->SetY($cell_anam_bpdia['posy']);
            }
            $this->Pdf->Cell($cell_anam_bpdia['width'], 0, $cell_anam_bpdia['data'], 0, 0, $cell_anam_bpdia['align']);

            $this->Pdf->SetFont($cell_anam_oxy['font_type'], $cell_anam_oxy['font_style'], $cell_anam_oxy['font_size']);
            $this->pdf_text_color($cell_anam_oxy['data'], $cell_anam_oxy['color_r'], $cell_anam_oxy['color_g'], $cell_anam_oxy['color_b']);
            if (!empty($cell_anam_oxy['posx']) && !empty($cell_anam_oxy['posy']))
            {
                $this->Pdf->SetXY($cell_anam_oxy['posx'], $cell_anam_oxy['posy']);
            }
            elseif (!empty($cell_anam_oxy['posx']))
            {
                $this->Pdf->SetX($cell_anam_oxy['posx']);
            }
            elseif (!empty($cell_anam_oxy['posy']))
            {
                $this->Pdf->SetY($cell_anam_oxy['posy']);
            }
            $this->Pdf->Cell($cell_anam_oxy['width'], 0, $cell_anam_oxy['data'], 0, 0, $cell_anam_oxy['align']);

            $this->Pdf->SetFont($cell_anam_gluco['font_type'], $cell_anam_gluco['font_style'], $cell_anam_gluco['font_size']);
            $this->pdf_text_color($cell_anam_gluco['data'], $cell_anam_gluco['color_r'], $cell_anam_gluco['color_g'], $cell_anam_gluco['color_b']);
            if (!empty($cell_anam_gluco['posx']) && !empty($cell_anam_gluco['posy']))
            {
                $this->Pdf->SetXY($cell_anam_gluco['posx'], $cell_anam_gluco['posy']);
            }
            elseif (!empty($cell_anam_gluco['posx']))
            {
                $this->Pdf->SetX($cell_anam_gluco['posx']);
            }
            elseif (!empty($cell_anam_gluco['posy']))
            {
                $this->Pdf->SetY($cell_anam_gluco['posy']);
            }
            $this->Pdf->Cell($cell_anam_gluco['width'], 0, $cell_anam_gluco['data'], 0, 0, $cell_anam_gluco['align']);

            $this->Pdf->SetFont($cell_anam_diag['font_type'], $cell_anam_diag['font_style'], $cell_anam_diag['font_size']);
            $this->Pdf->SetTextColor($cell_anam_diag['color_r'], $cell_anam_diag['color_g'], $cell_anam_diag['color_b']);
            if (!empty($cell_anam_diag['posx']) && !empty($cell_anam_diag['posy']))
            {
                $this->Pdf->SetXY($cell_anam_diag['posx'], $cell_anam_diag['posy']);
            }
            elseif (!empty($cell_anam_diag['posx']))
            {
                $this->Pdf->SetX($cell_anam_diag['posx']);
            }
            elseif (!empty($cell_anam_diag['posy']))
            {
                $this->Pdf->SetY($cell_anam_diag['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_anam_diag['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_anam_diag['width'], 0, trim($Lines), 0, 0, $cell_anam_diag['align']);
                $Incre = true;
            }

            $this->Pdf->SetFont($cell_pati_phone['font_type'], $cell_pati_phone['font_style'], $cell_pati_phone['font_size']);
            $this->pdf_text_color($cell_pati_phone['data'], $cell_pati_phone['color_r'], $cell_pati_phone['color_g'], $cell_pati_phone['color_b']);
            if (!empty($cell_pati_phone['posx']) && !empty($cell_pati_phone['posy']))
            {
                $this->Pdf->SetXY($cell_pati_phone['posx'], $cell_pati_phone['posy']);
            }
            elseif (!empty($cell_pati_phone['posx']))
            {
                $this->Pdf->SetX($cell_pati_phone['posx']);
            }
            elseif (!empty($cell_pati_phone['posy']))
            {
                $this->Pdf->SetY($cell_pati_phone['posy']);
            }
            $this->Pdf->Cell($cell_pati_phone['width'], 0, $cell_pati_phone['data'], 0, 0, $cell_pati_phone['align']);

            $this->Pdf->SetFont($cell_treat_instruc['font_type'], $cell_treat_instruc['font_style'], $cell_treat_instruc['font_size']);
            $this->Pdf->SetTextColor($cell_treat_instruc['color_r'], $cell_treat_instruc['color_g'], $cell_treat_instruc['color_b']);
            if (!empty($cell_treat_instruc['posx']) && !empty($cell_treat_instruc['posy']))
            {
                $this->Pdf->SetXY($cell_treat_instruc['posx'], $cell_treat_instruc['posy']);
            }
            elseif (!empty($cell_treat_instruc['posx']))
            {
                $this->Pdf->SetX($cell_treat_instruc['posx']);
            }
            elseif (!empty($cell_treat_instruc['posy']))
            {
                $this->Pdf->SetY($cell_treat_instruc['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_treat_instruc['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_treat_instruc['width'], 0, trim($Lines), 0, 0, $cell_treat_instruc['align']);
                $Incre = true;
            }

            $this->Pdf->SetFont($cell_pat_nombre['font_type'], $cell_pat_nombre['font_style'], $cell_pat_nombre['font_size']);
            $this->pdf_text_color($cell_pat_nombre['data'], $cell_pat_nombre['color_r'], $cell_pat_nombre['color_g'], $cell_pat_nombre['color_b']);
            if (!empty($cell_pat_nombre['posx']) && !empty($cell_pat_nombre['posy']))
            {
                $this->Pdf->SetXY($cell_pat_nombre['posx'], $cell_pat_nombre['posy']);
            }
            elseif (!empty($cell_pat_nombre['posx']))
            {
                $this->Pdf->SetX($cell_pat_nombre['posx']);
            }
            elseif (!empty($cell_pat_nombre['posy']))
            {
                $this->Pdf->SetY($cell_pat_nombre['posy']);
            }
            $this->Pdf->Cell($cell_pat_nombre['width'], 0, $cell_pat_nombre['data'], 0, 0, $cell_pat_nombre['align']);

            $this->Pdf->SetFont($cell_pat_nombrefirma['font_type'], $cell_pat_nombrefirma['font_style'], $cell_pat_nombrefirma['font_size']);
            $this->pdf_text_color($cell_pat_nombrefirma['data'], $cell_pat_nombrefirma['color_r'], $cell_pat_nombrefirma['color_g'], $cell_pat_nombrefirma['color_b']);
            if (!empty($cell_pat_nombrefirma['posx']) && !empty($cell_pat_nombrefirma['posy']))
            {
                $this->Pdf->SetXY($cell_pat_nombrefirma['posx'], $cell_pat_nombrefirma['posy']);
            }
            elseif (!empty($cell_pat_nombrefirma['posx']))
            {
                $this->Pdf->SetX($cell_pat_nombrefirma['posx']);
            }
            elseif (!empty($cell_pat_nombrefirma['posy']))
            {
                $this->Pdf->SetY($cell_pat_nombrefirma['posy']);
            }
            $this->Pdf->Cell($cell_pat_nombrefirma['width'], 0, $cell_pat_nombrefirma['data'], 0, 0, $cell_pat_nombrefirma['align']);

            $this->Pdf->SetFont($cell_user_nombre['font_type'], $cell_user_nombre['font_style'], $cell_user_nombre['font_size']);
            $this->pdf_text_color($cell_user_nombre['data'], $cell_user_nombre['color_r'], $cell_user_nombre['color_g'], $cell_user_nombre['color_b']);
            if (!empty($cell_user_nombre['posx']) && !empty($cell_user_nombre['posy']))
            {
                $this->Pdf->SetXY($cell_user_nombre['posx'], $cell_user_nombre['posy']);
            }
            elseif (!empty($cell_user_nombre['posx']))
            {
                $this->Pdf->SetX($cell_user_nombre['posx']);
            }
            elseif (!empty($cell_user_nombre['posy']))
            {
                $this->Pdf->SetY($cell_user_nombre['posy']);
            }
            $this->Pdf->Cell($cell_user_nombre['width'], 0, $cell_user_nombre['data'], 0, 0, $cell_user_nombre['align']);

            $this->Pdf->SetFont($cell_treat_record['font_type'], $cell_treat_record['font_style'], $cell_treat_record['font_size']);
            $this->pdf_text_color($cell_treat_record['data'], $cell_treat_record['color_r'], $cell_treat_record['color_g'], $cell_treat_record['color_b']);
            if (!empty($cell_treat_record['posx']) && !empty($cell_treat_record['posy']))
            {
                $this->Pdf->SetXY($cell_treat_record['posx'], $cell_treat_record['posy']);
            }
            elseif (!empty($cell_treat_record['posx']))
            {
                $this->Pdf->SetX($cell_treat_record['posx']);
            }
            elseif (!empty($cell_treat_record['posy']))
            {
                $this->Pdf->SetY($cell_treat_record['posy']);
            }
            $this->Pdf->Cell($cell_treat_record['width'], 0, $cell_treat_record['data'], 0, 0, $cell_treat_record['align']);

            $this->Pdf->SetFont($cell_pati_edad['font_type'], $cell_pati_edad['font_style'], $cell_pati_edad['font_size']);
            $this->pdf_text_color($cell_pati_edad['data'], $cell_pati_edad['color_r'], $cell_pati_edad['color_g'], $cell_pati_edad['color_b']);
            if (!empty($cell_pati_edad['posx']) && !empty($cell_pati_edad['posy']))
            {
                $this->Pdf->SetXY($cell_pati_edad['posx'], $cell_pati_edad['posy']);
            }
            elseif (!empty($cell_pati_edad['posx']))
            {
                $this->Pdf->SetX($cell_pati_edad['posx']);
            }
            elseif (!empty($cell_pati_edad['posy']))
            {
                $this->Pdf->SetY($cell_pati_edad['posy']);
            }
            $this->Pdf->Cell($cell_pati_edad['width'], 0, $cell_pati_edad['data'], 0, 0, $cell_pati_edad['align']);

            $this->Pdf->SetFont($cell_pati_docunum['font_type'], $cell_pati_docunum['font_style'], $cell_pati_docunum['font_size']);
            $this->pdf_text_color($cell_pati_docunum['data'], $cell_pati_docunum['color_r'], $cell_pati_docunum['color_g'], $cell_pati_docunum['color_b']);
            if (!empty($cell_pati_docunum['posx']) && !empty($cell_pati_docunum['posy']))
            {
                $this->Pdf->SetXY($cell_pati_docunum['posx'], $cell_pati_docunum['posy']);
            }
            elseif (!empty($cell_pati_docunum['posx']))
            {
                $this->Pdf->SetX($cell_pati_docunum['posx']);
            }
            elseif (!empty($cell_pati_docunum['posy']))
            {
                $this->Pdf->SetY($cell_pati_docunum['posy']);
            }
            $this->Pdf->Cell($cell_pati_docunum['width'], 0, $cell_pati_docunum['data'], 0, 0, $cell_pati_docunum['align']);

            $this->Pdf->SetFont($cell_pat_gerens['font_type'], $cell_pat_gerens['font_style'], $cell_pat_gerens['font_size']);
            $this->pdf_text_color($cell_pat_gerens['data'], $cell_pat_gerens['color_r'], $cell_pat_gerens['color_g'], $cell_pat_gerens['color_b']);
            if (!empty($cell_pat_gerens['posx']) && !empty($cell_pat_gerens['posy']))
            {
                $this->Pdf->SetXY($cell_pat_gerens['posx'], $cell_pat_gerens['posy']);
            }
            elseif (!empty($cell_pat_gerens['posx']))
            {
                $this->Pdf->SetX($cell_pat_gerens['posx']);
            }
            elseif (!empty($cell_pat_gerens['posy']))
            {
                $this->Pdf->SetY($cell_pat_gerens['posy']);
            }
            $this->Pdf->Cell($cell_pat_gerens['width'], 0, $cell_pat_gerens['data'], 0, 0, $cell_pat_gerens['align']);

            $this->Pdf->SetFont($cell_pat_btyp['font_type'], $cell_pat_btyp['font_style'], $cell_pat_btyp['font_size']);
            $this->pdf_text_color($cell_pat_btyp['data'], $cell_pat_btyp['color_r'], $cell_pat_btyp['color_g'], $cell_pat_btyp['color_b']);
            if (!empty($cell_pat_btyp['posx']) && !empty($cell_pat_btyp['posy']))
            {
                $this->Pdf->SetXY($cell_pat_btyp['posx'], $cell_pat_btyp['posy']);
            }
            elseif (!empty($cell_pat_btyp['posx']))
            {
                $this->Pdf->SetX($cell_pat_btyp['posx']);
            }
            elseif (!empty($cell_pat_btyp['posy']))
            {
                $this->Pdf->SetY($cell_pat_btyp['posy']);
            }
            $this->Pdf->Cell($cell_pat_btyp['width'], 0, $cell_pat_btyp['data'], 0, 0, $cell_pat_btyp['align']);

          $max_Y = 0;
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
      }  
   }  
   $this->rs_grid->Close();
   $this->Pdf->Output($this->Ini->root . $this->Ini->nm_path_pdf, 'F');
 }
 function pdf_text_color(&$val, $r, $g, $b)
 {
     if (is_array($val)) {
         $val = "";
     }
     $pos = strpos($val, "@SCNEG#");
     if ($pos !== false)
     {
         $cor = trim(substr($val, $pos + 7));
         $val = substr($val, 0, $pos);
         $cor = (substr($cor, 0, 1) == "#") ? substr($cor, 1) : $cor;
         if (strlen($cor) == 6)
         {
             $r = hexdec(substr($cor, 0, 2));
             $g = hexdec(substr($cor, 2, 2));
             $b = hexdec(substr($cor, 4, 2));
         }
     }
     $this->Pdf->SetTextColor($r, $g, $b);
 }
 function SC_conv_utf8($input)
 {
     if ($_SESSION['scriptcase']['charset'] != "UTF-8" && !NM_is_utf8($input))
     {
         $input = sc_convert_encoding($input, "UTF-8", $_SESSION['scriptcase']['charset']);
     }
     return $input;
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
