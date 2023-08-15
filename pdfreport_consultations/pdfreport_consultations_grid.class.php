<?php
class pdfreport_consultations_grid
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
   var $pati_edad = array();
   var $pati_nombre = array();
   var $con_consul_id = array();
   var $con_pati_id = array();
   var $con_user_id = array();
   var $con_consul_date = array();
   var $con_consul_strtime = array();
   var $con_consul_endtime = array();
   var $con_consil_sesnum = array();
   var $con_consul_reason = array();
   var $con_consul_anot = array();
   var $con_consul_state = array();
   var $pa_pati_docnum = array();
   var $pa_pati_name = array();
   var $pa_pati_lname = array();
   var $pa_pati_phone = array();
   var $pa_pati_career = array();
   var $pa_pati_carsem = array();
   var $pa_pati_bod = array();
   var $pa_pati_famname = array();
   var $pa_pati_famphone = array();
   var $us_user_docnum = array();
   var $us_user_name = array();
   var $us_user_lname = array();
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
   $_SESSION['scriptcase']['pdfreport_consultations']['default_font'] = $this->default_font;
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
           if (in_array("pdfreport_consultations", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "on";
   $this->sc_proc_grid = false; 
   $this->NM_raiz_img = $this->Ini->root;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $this->nm_grid_colunas = 0;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['campos_busca'];
       if ($_SESSION['scriptcase']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
       }
       $this->con_consul_id[0] = (isset($Busca_temp['con_consul_id'])) ? $Busca_temp['con_consul_id'] : ""; 
       $tmp_pos = (is_string($this->con_consul_id[0])) ? strpos($this->con_consul_id[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->con_consul_id[0]))
       {
           $this->con_consul_id[0] = substr($this->con_consul_id[0], 0, $tmp_pos);
       }
       $this->con_pati_id[0] = (isset($Busca_temp['con_pati_id'])) ? $Busca_temp['con_pati_id'] : ""; 
       $tmp_pos = (is_string($this->con_pati_id[0])) ? strpos($this->con_pati_id[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->con_pati_id[0]))
       {
           $this->con_pati_id[0] = substr($this->con_pati_id[0], 0, $tmp_pos);
       }
       $this->con_user_id[0] = (isset($Busca_temp['con_user_id'])) ? $Busca_temp['con_user_id'] : ""; 
       $tmp_pos = (is_string($this->con_user_id[0])) ? strpos($this->con_user_id[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->con_user_id[0]))
       {
           $this->con_user_id[0] = substr($this->con_user_id[0], 0, $tmp_pos);
       }
       $this->con_consul_date[0] = (isset($Busca_temp['con_consul_date'])) ? $Busca_temp['con_consul_date'] : ""; 
       $tmp_pos = (is_string($this->con_consul_date[0])) ? strpos($this->con_consul_date[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->con_consul_date[0]))
       {
           $this->con_consul_date[0] = substr($this->con_consul_date[0], 0, $tmp_pos);
       }
       $con_consul_date_2 = (isset($Busca_temp['con_consul_date_input_2'])) ? $Busca_temp['con_consul_date_input_2'] : ""; 
       $this->con_consul_date_2 = $con_consul_date_2; 
       $this->con_consul_state[0] = (isset($Busca_temp['con_consul_state'])) ? $Busca_temp['con_consul_state'] : ""; 
       $tmp_pos = (is_string($this->con_consul_state[0])) ? strpos($this->con_consul_state[0], "##@@") : false;
       if ($tmp_pos !== false && !is_array($this->con_consul_state[0]))
       {
           $this->con_consul_state[0] = substr($this->con_consul_state[0], 0, $tmp_pos);
       }
   } 
   else 
   { 
       $this->con_consul_date_2 = ""; 
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq_filtro'];
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   $_SESSION['scriptcase']['contr_link_emb'] = $this->nm_location;
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['qt_col_grid'] = 1 ;  
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_consultations']['cols']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_consultations']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['qt_col_grid'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_consultations']['cols'];  
       unset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_consultations']['cols']);
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_select']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_select'] = array(); 
   } 
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_quebra']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_desc'] = "" ; 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_orig'] = " where (con.consul_id=" . $_SESSION['consul'] . ")";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq_filtro'];
//
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['tot_geral'][1])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['tot_geral'][1] ;  
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq'];  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT con.consul_id as con_consul_id, con.pati_id as con_pati_id, con.user_id as con_user_id, str_replace (convert(char(10),con.consul_Date,102), '.', '-') + ' ' + convert(char(8),con.consul_Date,20) as con_consul_date, str_replace (convert(char(10),con.consul_strtime,102), '.', '-') + ' ' + convert(char(8),con.consul_strtime,20) as con_consul_strtime, str_replace (convert(char(10),con.consul_endtime,102), '.', '-') + ' ' + convert(char(8),con.consul_endtime,20) as con_consul_endtime, con.consil_sesnum as con_consil_sesnum, con.consul_reason as con_consul_reason, con.consul_anot as con_consul_anot, con.consul_state as con_consul_state, pa.pati_docnum as pa_pati_docnum, pa.pati_name as pa_pati_name, pa.pati_lname as pa_pati_lname, pa.pati_phone as pa_pati_phone, pa.pati_career as pa_pati_career, pa.pati_carsem as pa_pati_carsem, str_replace (convert(char(10),pa.pati_bod,102), '.', '-') + ' ' + convert(char(8),pa.pati_bod,20) as pa_pati_bod, pa.pati_famname as pa_pati_famname, pa.pati_famphone as pa_pati_famphone, us.user_docnum as us_user_docnum, us.user_name as us_user_name, us.user_lname as us_user_lname from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT con.consul_id as con_consul_id, con.pati_id as con_pati_id, con.user_id as con_user_id, con.consul_Date as con_consul_date, con.consul_strtime as con_consul_strtime, con.consul_endtime as con_consul_endtime, con.consil_sesnum as con_consil_sesnum, con.consul_reason as con_consul_reason, con.consul_anot as con_consul_anot, con.consul_state as con_consul_state, pa.pati_docnum as pa_pati_docnum, pa.pati_name as pa_pati_name, pa.pati_lname as pa_pati_lname, pa.pati_phone as pa_pati_phone, pa.pati_career as pa_pati_career, pa.pati_carsem as pa_pati_carsem, pa.pati_bod as pa_pati_bod, pa.pati_famname as pa_pati_famname, pa.pati_famphone as pa_pati_famphone, us.user_docnum as us_user_docnum, us.user_name as us_user_name, us.user_lname as us_user_lname from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT con.consul_id as con_consul_id, con.pati_id as con_pati_id, con.user_id as con_user_id, con.consul_Date as con_consul_date, con.consul_strtime as con_consul_strtime, con.consul_endtime as con_consul_endtime, con.consil_sesnum as con_consil_sesnum, con.consul_reason as con_consul_reason, con.consul_anot as con_consul_anot, con.consul_state as con_consul_state, pa.pati_docnum as pa_pati_docnum, pa.pati_name as pa_pati_name, pa.pati_lname as pa_pati_lname, pa.pati_phone as pa_pati_phone, pa.pati_career as pa_pati_career, pa.pati_carsem as pa_pati_carsem, pa.pati_bod as pa_pati_bod, pa.pati_famname as pa_pati_famname, pa.pati_famphone as pa_pati_famphone, us.user_docnum as us_user_docnum, us.user_name as us_user_name, us.user_lname as us_user_lname from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_grid'])) 
   { 
       $nmgp_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['ordem_desc']; 
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['order_grid'] = $nmgp_order_by;
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
   $this->Pdf->Image($this->NM_raiz_img . $this->Ini->path_img_global . "/grp__NM__bg__NM__form_atencionPSICO2.jpg", "0.000000", "0.000000", "211.667", "292.629", '', '', '', false, 300, '', false, false, 0);
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
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consul_id'] = "Consul Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_pati_id'] = "Pati Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_user_id'] = "User Id";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consul_date'] = "Consul Date";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consul_strtime'] = "Consul Strtime";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consul_endtime'] = "Consul Endtime";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consil_sesnum'] = "Consil Sesnum";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consul_reason'] = "Consul Reason";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consul_anot'] = "Consul Anot";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['con_consul_state'] = "Consul State";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_docnum'] = "Pati Docnum";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_name'] = "Pati Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_lname'] = "Pati Lname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_phone'] = "Pati Phone";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_career'] = "Pati Career";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_carsem'] = "Pati Carsem";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_bod'] = "Pati Bod";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_famname'] = "Pati Famname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pa_pati_famphone'] = "Pati Famphone";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['us_user_docnum'] = "User Docnum";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['us_user_name'] = "User Name";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['us_user_lname'] = "User Lname";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pati_edad'] = "pati_edad";
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['labels']['pati_nombre'] = "pati_nombre";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['seq_dir'] = 0; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['sub_dir'] = array(); 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['where_pesq_filtro'];
   if (isset($_SESSION['scriptcase']['sc_apl_conf']['pdfreport_consultations']['lig_edit']) && $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_consultations']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['mostra_edit'] = $_SESSION['scriptcase']['sc_apl_conf']['pdfreport_consultations']['lig_edit'];
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
      while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['qt_col_grid']) 
      {  
          $this->sc_proc_grid = true;
          $this->SC_seq_register++; 
          $this->con_consul_id[$this->nm_grid_colunas] = $this->rs_grid->fields[0] ;  
          $this->con_consul_id[$this->nm_grid_colunas] = (string)$this->con_consul_id[$this->nm_grid_colunas];
          $this->con_pati_id[$this->nm_grid_colunas] = $this->rs_grid->fields[1] ;  
          $this->con_pati_id[$this->nm_grid_colunas] = (string)$this->con_pati_id[$this->nm_grid_colunas];
          $this->con_user_id[$this->nm_grid_colunas] = $this->rs_grid->fields[2] ;  
          $this->con_user_id[$this->nm_grid_colunas] = (string)$this->con_user_id[$this->nm_grid_colunas];
          $this->con_consul_date[$this->nm_grid_colunas] = $this->rs_grid->fields[3] ;  
          $this->con_consul_strtime[$this->nm_grid_colunas] = $this->rs_grid->fields[4] ;  
          $this->con_consul_endtime[$this->nm_grid_colunas] = $this->rs_grid->fields[5] ;  
          $this->con_consil_sesnum[$this->nm_grid_colunas] = $this->rs_grid->fields[6] ;  
          $this->con_consil_sesnum[$this->nm_grid_colunas] = (string)$this->con_consil_sesnum[$this->nm_grid_colunas];
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
       { 
           $this->con_consul_reason[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->rs_grid->fields[7]) ;  
       } 
       else
       { 
           $this->con_consul_reason[$this->nm_grid_colunas] = $this->rs_grid->fields[7] ;  
       } 
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
       { 
           $this->con_consul_anot[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->rs_grid->fields[8]) ;  
       } 
       else
       { 
           $this->con_consul_anot[$this->nm_grid_colunas] = $this->rs_grid->fields[8] ;  
       } 
          $this->con_consul_state[$this->nm_grid_colunas] = $this->rs_grid->fields[9] ;  
          $this->con_consul_state[$this->nm_grid_colunas] = (string)$this->con_consul_state[$this->nm_grid_colunas];
          $this->pa_pati_docnum[$this->nm_grid_colunas] = $this->rs_grid->fields[10] ;  
          $this->pa_pati_docnum[$this->nm_grid_colunas] = (string)$this->pa_pati_docnum[$this->nm_grid_colunas];
          $this->pa_pati_name[$this->nm_grid_colunas] = $this->rs_grid->fields[11] ;  
          $this->pa_pati_lname[$this->nm_grid_colunas] = $this->rs_grid->fields[12] ;  
          $this->pa_pati_phone[$this->nm_grid_colunas] = $this->rs_grid->fields[13] ;  
          $this->pa_pati_phone[$this->nm_grid_colunas] = (string)$this->pa_pati_phone[$this->nm_grid_colunas];
          $this->pa_pati_career[$this->nm_grid_colunas] = $this->rs_grid->fields[14] ;  
          $this->pa_pati_carsem[$this->nm_grid_colunas] = $this->rs_grid->fields[15] ;  
          $this->pa_pati_carsem[$this->nm_grid_colunas] = (string)$this->pa_pati_carsem[$this->nm_grid_colunas];
          $this->pa_pati_bod[$this->nm_grid_colunas] = $this->rs_grid->fields[16] ;  
          $this->pa_pati_famname[$this->nm_grid_colunas] = $this->rs_grid->fields[17] ;  
          $this->pa_pati_famphone[$this->nm_grid_colunas] = $this->rs_grid->fields[18] ;  
          $this->us_user_docnum[$this->nm_grid_colunas] = $this->rs_grid->fields[19] ;  
          $this->us_user_name[$this->nm_grid_colunas] = $this->rs_grid->fields[20] ;  
          $this->us_user_lname[$this->nm_grid_colunas] = $this->rs_grid->fields[21] ;  
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              if (!empty($this->con_consul_reason[$this->nm_grid_colunas]))
              { 
                  $this->con_consul_reason[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->con_consul_reason[$this->nm_grid_colunas], false, true, "BLOB");
              }
              if (!empty($this->con_consul_anot[$this->nm_grid_colunas]))
              { 
                  $this->con_consul_anot[$this->nm_grid_colunas] = $this->Db->BlobDecode($this->con_consul_anot[$this->nm_grid_colunas], false, true, "BLOB");
              }
          }
          $this->pati_edad[$this->nm_grid_colunas] = "";
          $this->pati_nombre[$this->nm_grid_colunas] = "";
          $_SESSION['scriptcase']['pdfreport_consultations']['contr_erro'] = 'on';
 $this->pati_nombre[$this->nm_grid_colunas]  = $this->pa_pati_lname[$this->nm_grid_colunas] . ", ". $this->pa_pati_name[$this->nm_grid_colunas] ;



$edad = [];
$edad = $this->nm_data->Dif_Datas_2($this->con_consul_date[$this->nm_grid_colunas] , "yyyy-mm-dd", $this->pa_pati_bod[$this->nm_grid_colunas] , "yyyy-mm-dd", 2);
$this->pati_edad[$this->nm_grid_colunas]  = $edad[2];

$_SESSION['scriptcase']['pdfreport_consultations']['contr_erro'] = 'off';
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consul_id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consul_id[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consul_id[$this->nm_grid_colunas] = sc_strip_script($this->con_consul_id[$this->nm_grid_colunas]);
          }
          if ($this->con_consul_id[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consul_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->con_consul_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->con_consul_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consul_id[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_pati_id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_pati_id[$this->nm_grid_colunas]));
          }
          else {
              $this->con_pati_id[$this->nm_grid_colunas] = sc_strip_script($this->con_pati_id[$this->nm_grid_colunas]);
          }
          if ($this->con_pati_id[$this->nm_grid_colunas] === "") 
          { 
              $this->con_pati_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->con_pati_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->con_pati_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_pati_id[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_user_id[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_user_id[$this->nm_grid_colunas]));
          }
          else {
              $this->con_user_id[$this->nm_grid_colunas] = sc_strip_script($this->con_user_id[$this->nm_grid_colunas]);
          }
          if ($this->con_user_id[$this->nm_grid_colunas] === "") 
          { 
              $this->con_user_id[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->con_user_id[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->con_user_id[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_user_id[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consul_date[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consul_date[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consul_date[$this->nm_grid_colunas] = sc_strip_script($this->con_consul_date[$this->nm_grid_colunas]);
          }
          if ($this->con_consul_date[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consul_date[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $con_consul_date_x =  $this->con_consul_date[$this->nm_grid_colunas];
               nm_conv_limpa_dado($con_consul_date_x, "YYYY-MM-DD");
               if (is_numeric($con_consul_date_x) && strlen($con_consul_date_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->con_consul_date[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->con_consul_date[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->con_consul_date[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consul_date[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consul_strtime[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consul_strtime[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consul_strtime[$this->nm_grid_colunas] = sc_strip_script($this->con_consul_strtime[$this->nm_grid_colunas]);
          }
          if ($this->con_consul_strtime[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consul_strtime[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $con_consul_strtime_x =  $this->con_consul_strtime[$this->nm_grid_colunas];
               nm_conv_limpa_dado($con_consul_strtime_x, "HH:II:SS");
               if (is_numeric($con_consul_strtime_x) && strlen($con_consul_strtime_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->con_consul_strtime[$this->nm_grid_colunas], "HH:II:SS");
                   $this->con_consul_strtime[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhii")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->con_consul_strtime[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consul_strtime[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consul_endtime[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consul_endtime[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consul_endtime[$this->nm_grid_colunas] = sc_strip_script($this->con_consul_endtime[$this->nm_grid_colunas]);
          }
          if ($this->con_consul_endtime[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consul_endtime[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $con_consul_endtime_x =  $this->con_consul_endtime[$this->nm_grid_colunas];
               nm_conv_limpa_dado($con_consul_endtime_x, "HH:II:SS");
               if (is_numeric($con_consul_endtime_x) && strlen($con_consul_endtime_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->con_consul_endtime[$this->nm_grid_colunas], "HH:II:SS");
                   $this->con_consul_endtime[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("HH", "hhiiss")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->con_consul_endtime[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consul_endtime[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consil_sesnum[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consil_sesnum[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consil_sesnum[$this->nm_grid_colunas] = sc_strip_script($this->con_consil_sesnum[$this->nm_grid_colunas]);
          }
          if ($this->con_consil_sesnum[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consil_sesnum[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->con_consil_sesnum[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->con_consil_sesnum[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consil_sesnum[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consul_reason[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consul_reason[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consul_reason[$this->nm_grid_colunas] = sc_strip_script($this->con_consul_reason[$this->nm_grid_colunas]);
          }
          if ($this->con_consul_reason[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consul_reason[$this->nm_grid_colunas] = "" ;  
          } 
          $this->con_consul_reason[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consul_reason[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consul_anot[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consul_anot[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consul_anot[$this->nm_grid_colunas] = sc_strip_script($this->con_consul_anot[$this->nm_grid_colunas]);
          }
          if ($this->con_consul_anot[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consul_anot[$this->nm_grid_colunas] = "" ;  
          } 
          $this->con_consul_anot[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consul_anot[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->con_consul_state[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->con_consul_state[$this->nm_grid_colunas]));
          }
          else {
              $this->con_consul_state[$this->nm_grid_colunas] = sc_strip_script($this->con_consul_state[$this->nm_grid_colunas]);
          }
          if ($this->con_consul_state[$this->nm_grid_colunas] === "") 
          { 
              $this->con_consul_state[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->con_consul_state[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->con_consul_state[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->con_consul_state[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_docnum[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_docnum[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_docnum[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_docnum[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_docnum[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_docnum[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pa_pati_docnum[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pa_pati_docnum[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_docnum[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_name[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_name[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_name[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_name[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_name[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_name[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pa_pati_name[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_name[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_lname[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_lname[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_lname[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_lname[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_lname[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_lname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pa_pati_lname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_lname[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_phone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_phone[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_phone[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_phone[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_phone[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_phone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pa_pati_phone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_phone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_career[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_career[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_career[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_career[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_career[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_career[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pa_pati_career[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_career[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_carsem[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_carsem[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_carsem[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_carsem[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_carsem[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_carsem[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pa_pati_carsem[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pa_pati_carsem[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_carsem[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_bod[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_bod[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_bod[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_bod[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_bod[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_bod[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
               $pa_pati_bod_x =  $this->pa_pati_bod[$this->nm_grid_colunas];
               nm_conv_limpa_dado($pa_pati_bod_x, "YYYY-MM-DD");
               if (is_numeric($pa_pati_bod_x) && strlen($pa_pati_bod_x) > 0) 
               { 
                   $this->nm_data->SetaData($this->pa_pati_bod[$this->nm_grid_colunas], "YYYY-MM-DD");
                   $this->pa_pati_bod[$this->nm_grid_colunas] = html_entity_decode($this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa")), ENT_COMPAT, $_SESSION['scriptcase']['charset']);
               } 
          } 
          $this->pa_pati_bod[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_bod[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_famname[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_famname[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_famname[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_famname[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_famname[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_famname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pa_pati_famname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_famname[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->pa_pati_famphone[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->pa_pati_famphone[$this->nm_grid_colunas]));
          }
          else {
              $this->pa_pati_famphone[$this->nm_grid_colunas] = sc_strip_script($this->pa_pati_famphone[$this->nm_grid_colunas]);
          }
          if ($this->pa_pati_famphone[$this->nm_grid_colunas] === "") 
          { 
              $this->pa_pati_famphone[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pa_pati_famphone[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pa_pati_famphone[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->us_user_docnum[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->us_user_docnum[$this->nm_grid_colunas]));
          }
          else {
              $this->us_user_docnum[$this->nm_grid_colunas] = sc_strip_script($this->us_user_docnum[$this->nm_grid_colunas]);
          }
          if ($this->us_user_docnum[$this->nm_grid_colunas] === "") 
          { 
              $this->us_user_docnum[$this->nm_grid_colunas] = "" ;  
          } 
          $this->us_user_docnum[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->us_user_docnum[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->us_user_name[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->us_user_name[$this->nm_grid_colunas]));
          }
          else {
              $this->us_user_name[$this->nm_grid_colunas] = sc_strip_script($this->us_user_name[$this->nm_grid_colunas]);
          }
          if ($this->us_user_name[$this->nm_grid_colunas] === "") 
          { 
              $this->us_user_name[$this->nm_grid_colunas] = "" ;  
          } 
          $this->us_user_name[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->us_user_name[$this->nm_grid_colunas]);
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_consultations']['opcao'] == "pdf" && isset($_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content']) && $_SESSION['nm_session']['sys_wkhtmltopdf_show_html_content'] == 'Y') {
              $this->us_user_lname[$this->nm_grid_colunas] = NM_encode_input(sc_strip_script($this->us_user_lname[$this->nm_grid_colunas]));
          }
          else {
              $this->us_user_lname[$this->nm_grid_colunas] = sc_strip_script($this->us_user_lname[$this->nm_grid_colunas]);
          }
          if ($this->us_user_lname[$this->nm_grid_colunas] === "") 
          { 
              $this->us_user_lname[$this->nm_grid_colunas] = "" ;  
          } 
          $this->us_user_lname[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->us_user_lname[$this->nm_grid_colunas]);
          if ($this->pati_edad[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_edad[$this->nm_grid_colunas] = "" ;  
          } 
          else    
          { 
              nmgp_Form_Num_Val($this->pati_edad[$this->nm_grid_colunas], $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "", "1", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          } 
          $this->pati_edad[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_edad[$this->nm_grid_colunas]);
          if ($this->pati_nombre[$this->nm_grid_colunas] === "") 
          { 
              $this->pati_nombre[$this->nm_grid_colunas] = "" ;  
          } 
          $this->pati_nombre[$this->nm_grid_colunas] = $this->SC_conv_utf8($this->pati_nombre[$this->nm_grid_colunas]);
            $cell_date = array('posx' => '29.368749999996297', 'posy' => '65.08749999999179', 'data' => $this->con_consul_date[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cel_celular = array('posx' => '81.75624999998969', 'posy' => '65.08749999999179', 'data' => $this->pa_pati_phone[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cel_hora = array('posx' => '170.65624999997848', 'posy' => '65.08749999999179', 'data' => $this->con_consul_strtime[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cel_paciente = array('posx' => '65.61666666665839', 'posy' => '74.61249999999059', 'data' => $this->pati_nombre[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_edad = array('posx' => '182.56249999997698', 'posy' => '74.8770833333239', 'data' => $this->pati_edad[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cel_carrera = array('posx' => '37.8354166666619', 'posy' => '83.60833333332279', 'data' => $this->pa_pati_career[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_semestre = array('posx' => '174.36041666664468', 'posy' => '83.3437499999895', 'data' => $this->pa_pati_carsem[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_motivo = array('posx' => '38.3645833333285', 'posy' => '91.5458333333218', 'data' => $this->con_consul_reason[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cel_sess = array('posx' => '177.27083333331097', 'posy' => '95.5145833333213', 'data' => $this->con_consil_sesnum[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_familiar = array('posx' => '41.2749999999948', 'posy' => '109.27291666665289', 'data' => $this->pa_pati_famname[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_contactofam = array('posx' => '166.42291666664568', 'posy' => '109.00833333331958', 'data' => $this->pa_pati_famphone[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);
            $cell_anotaciones = array('posx' => '12.9645833333317', 'posy' => '126.47083333331739', 'data' => $this->con_consul_anot[$this->nm_grid_colunas], 'width'      => '0', 'align'      => 'L', 'font_type'  => $this->default_font, 'font_size'  => '12', 'color_r'    => '0', 'color_g'    => '0', 'color_b'    => '0', 'font_style' => $this->default_style);


            $this->Pdf->SetFont($cell_date['font_type'], $cell_date['font_style'], $cell_date['font_size']);
            $this->pdf_text_color($cell_date['data'], $cell_date['color_r'], $cell_date['color_g'], $cell_date['color_b']);
            if (!empty($cell_date['posx']) && !empty($cell_date['posy']))
            {
                $this->Pdf->SetXY($cell_date['posx'], $cell_date['posy']);
            }
            elseif (!empty($cell_date['posx']))
            {
                $this->Pdf->SetX($cell_date['posx']);
            }
            elseif (!empty($cell_date['posy']))
            {
                $this->Pdf->SetY($cell_date['posy']);
            }
            $this->Pdf->Cell($cell_date['width'], 0, $cell_date['data'], 0, 0, $cell_date['align']);

            $this->Pdf->SetFont($cel_celular['font_type'], $cel_celular['font_style'], $cel_celular['font_size']);
            $this->pdf_text_color($cel_celular['data'], $cel_celular['color_r'], $cel_celular['color_g'], $cel_celular['color_b']);
            if (!empty($cel_celular['posx']) && !empty($cel_celular['posy']))
            {
                $this->Pdf->SetXY($cel_celular['posx'], $cel_celular['posy']);
            }
            elseif (!empty($cel_celular['posx']))
            {
                $this->Pdf->SetX($cel_celular['posx']);
            }
            elseif (!empty($cel_celular['posy']))
            {
                $this->Pdf->SetY($cel_celular['posy']);
            }
            $this->Pdf->Cell($cel_celular['width'], 0, $cel_celular['data'], 0, 0, $cel_celular['align']);

            $this->Pdf->SetFont($cel_hora['font_type'], $cel_hora['font_style'], $cel_hora['font_size']);
            $this->pdf_text_color($cel_hora['data'], $cel_hora['color_r'], $cel_hora['color_g'], $cel_hora['color_b']);
            if (!empty($cel_hora['posx']) && !empty($cel_hora['posy']))
            {
                $this->Pdf->SetXY($cel_hora['posx'], $cel_hora['posy']);
            }
            elseif (!empty($cel_hora['posx']))
            {
                $this->Pdf->SetX($cel_hora['posx']);
            }
            elseif (!empty($cel_hora['posy']))
            {
                $this->Pdf->SetY($cel_hora['posy']);
            }
            $this->Pdf->Cell($cel_hora['width'], 0, $cel_hora['data'], 0, 0, $cel_hora['align']);

            $this->Pdf->SetFont($cel_paciente['font_type'], $cel_paciente['font_style'], $cel_paciente['font_size']);
            $this->pdf_text_color($cel_paciente['data'], $cel_paciente['color_r'], $cel_paciente['color_g'], $cel_paciente['color_b']);
            if (!empty($cel_paciente['posx']) && !empty($cel_paciente['posy']))
            {
                $this->Pdf->SetXY($cel_paciente['posx'], $cel_paciente['posy']);
            }
            elseif (!empty($cel_paciente['posx']))
            {
                $this->Pdf->SetX($cel_paciente['posx']);
            }
            elseif (!empty($cel_paciente['posy']))
            {
                $this->Pdf->SetY($cel_paciente['posy']);
            }
            $this->Pdf->Cell($cel_paciente['width'], 0, $cel_paciente['data'], 0, 0, $cel_paciente['align']);

            $this->Pdf->SetFont($cell_edad['font_type'], $cell_edad['font_style'], $cell_edad['font_size']);
            $this->pdf_text_color($cell_edad['data'], $cell_edad['color_r'], $cell_edad['color_g'], $cell_edad['color_b']);
            if (!empty($cell_edad['posx']) && !empty($cell_edad['posy']))
            {
                $this->Pdf->SetXY($cell_edad['posx'], $cell_edad['posy']);
            }
            elseif (!empty($cell_edad['posx']))
            {
                $this->Pdf->SetX($cell_edad['posx']);
            }
            elseif (!empty($cell_edad['posy']))
            {
                $this->Pdf->SetY($cell_edad['posy']);
            }
            $this->Pdf->Cell($cell_edad['width'], 0, $cell_edad['data'], 0, 0, $cell_edad['align']);

            $this->Pdf->SetFont($cel_carrera['font_type'], $cel_carrera['font_style'], $cel_carrera['font_size']);
            $this->pdf_text_color($cel_carrera['data'], $cel_carrera['color_r'], $cel_carrera['color_g'], $cel_carrera['color_b']);
            if (!empty($cel_carrera['posx']) && !empty($cel_carrera['posy']))
            {
                $this->Pdf->SetXY($cel_carrera['posx'], $cel_carrera['posy']);
            }
            elseif (!empty($cel_carrera['posx']))
            {
                $this->Pdf->SetX($cel_carrera['posx']);
            }
            elseif (!empty($cel_carrera['posy']))
            {
                $this->Pdf->SetY($cel_carrera['posy']);
            }
            $this->Pdf->Cell($cel_carrera['width'], 0, $cel_carrera['data'], 0, 0, $cel_carrera['align']);

            $this->Pdf->SetFont($cell_semestre['font_type'], $cell_semestre['font_style'], $cell_semestre['font_size']);
            $this->pdf_text_color($cell_semestre['data'], $cell_semestre['color_r'], $cell_semestre['color_g'], $cell_semestre['color_b']);
            if (!empty($cell_semestre['posx']) && !empty($cell_semestre['posy']))
            {
                $this->Pdf->SetXY($cell_semestre['posx'], $cell_semestre['posy']);
            }
            elseif (!empty($cell_semestre['posx']))
            {
                $this->Pdf->SetX($cell_semestre['posx']);
            }
            elseif (!empty($cell_semestre['posy']))
            {
                $this->Pdf->SetY($cell_semestre['posy']);
            }
            $this->Pdf->Cell($cell_semestre['width'], 0, $cell_semestre['data'], 0, 0, $cell_semestre['align']);

            $this->Pdf->SetFont($cell_motivo['font_type'], $cell_motivo['font_style'], $cell_motivo['font_size']);
            $this->Pdf->SetTextColor($cell_motivo['color_r'], $cell_motivo['color_g'], $cell_motivo['color_b']);
            if (!empty($cell_motivo['posx']) && !empty($cell_motivo['posy']))
            {
                $this->Pdf->SetXY($cell_motivo['posx'], $cell_motivo['posy']);
            }
            elseif (!empty($cell_motivo['posx']))
            {
                $this->Pdf->SetX($cell_motivo['posx']);
            }
            elseif (!empty($cell_motivo['posy']))
            {
                $this->Pdf->SetY($cell_motivo['posy']);
            }
            $NM_partes_val = explode("<br>", $cell_motivo['data']);
            $PosX = $this->Pdf->GetX();
            $Incre = false;
            foreach ($NM_partes_val as $Lines)
            {
                if ($Incre)
                {
                    $this->Pdf->Ln(4.2333333333333);
                }
                $this->Pdf->SetX($PosX);
                $this->Pdf->Cell($cell_motivo['width'], 0, trim($Lines), 0, 0, $cell_motivo['align']);
                $Incre = true;
            }

            $this->Pdf->SetFont($cel_sess['font_type'], $cel_sess['font_style'], $cel_sess['font_size']);
            $this->pdf_text_color($cel_sess['data'], $cel_sess['color_r'], $cel_sess['color_g'], $cel_sess['color_b']);
            if (!empty($cel_sess['posx']) && !empty($cel_sess['posy']))
            {
                $this->Pdf->SetXY($cel_sess['posx'], $cel_sess['posy']);
            }
            elseif (!empty($cel_sess['posx']))
            {
                $this->Pdf->SetX($cel_sess['posx']);
            }
            elseif (!empty($cel_sess['posy']))
            {
                $this->Pdf->SetY($cel_sess['posy']);
            }
            $this->Pdf->Cell($cel_sess['width'], 0, $cel_sess['data'], 0, 0, $cel_sess['align']);

            $this->Pdf->SetFont($cell_familiar['font_type'], $cell_familiar['font_style'], $cell_familiar['font_size']);
            $this->pdf_text_color($cell_familiar['data'], $cell_familiar['color_r'], $cell_familiar['color_g'], $cell_familiar['color_b']);
            if (!empty($cell_familiar['posx']) && !empty($cell_familiar['posy']))
            {
                $this->Pdf->SetXY($cell_familiar['posx'], $cell_familiar['posy']);
            }
            elseif (!empty($cell_familiar['posx']))
            {
                $this->Pdf->SetX($cell_familiar['posx']);
            }
            elseif (!empty($cell_familiar['posy']))
            {
                $this->Pdf->SetY($cell_familiar['posy']);
            }
            $this->Pdf->Cell($cell_familiar['width'], 0, $cell_familiar['data'], 0, 0, $cell_familiar['align']);

            $this->Pdf->SetFont($cell_contactofam['font_type'], $cell_contactofam['font_style'], $cell_contactofam['font_size']);
            $this->pdf_text_color($cell_contactofam['data'], $cell_contactofam['color_r'], $cell_contactofam['color_g'], $cell_contactofam['color_b']);
            if (!empty($cell_contactofam['posx']) && !empty($cell_contactofam['posy']))
            {
                $this->Pdf->SetXY($cell_contactofam['posx'], $cell_contactofam['posy']);
            }
            elseif (!empty($cell_contactofam['posx']))
            {
                $this->Pdf->SetX($cell_contactofam['posx']);
            }
            elseif (!empty($cell_contactofam['posy']))
            {
                $this->Pdf->SetY($cell_contactofam['posy']);
            }
            $this->Pdf->Cell($cell_contactofam['width'], 0, $cell_contactofam['data'], 0, 0, $cell_contactofam['align']);


            $this->Pdf->SetFont($cell_anotaciones['font_type'], $cell_anotaciones['font_style'], $cell_anotaciones['font_size']);
            $this->Pdf->SetTextColor($cell_anotaciones['color_r'], $cell_anotaciones['color_g'], $cell_anotaciones['color_b']);
            if (!empty($cell_anotaciones['posx']) && !empty($cell_anotaciones['posy']))
            {
                $this->Pdf->SetXY($cell_anotaciones['posx'], $cell_anotaciones['posy']);
            }
            elseif (!empty($cell_anotaciones['posx']))
            {
                $this->Pdf->SetX($cell_anotaciones['posx']);
            }
            elseif (!empty($cell_anotaciones['posy']))
            {
                $this->Pdf->SetY($cell_anotaciones['posy']);
            }
            if ($this->Font_ttf)
            {
                $this->Pdf->Cell($cell_anotaciones['width'], 0, $cell_anotaciones['data'], 0, 0, $cell_anotaciones['align']);
            }
            else
            {
                $atu_X = $this->Pdf->GetX();
                $atu_Y = $this->Pdf->GetY();
                $this->Pdf->writeHTMLCell($cell_anotaciones['width'], 0, $atu_X, $atu_Y, $cell_anotaciones['data'], 0, 0, false, true, $cell_anotaciones['align']);
            }
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
