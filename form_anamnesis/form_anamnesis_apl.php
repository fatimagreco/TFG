<?php
//
class form_anamnesis_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $use_100perc_fields = true;
   var $classes_100perc_fields = array();
   var $close_modal_after_insert = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'navPage'           => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $anam_id;
   var $pati_id;
   var $pati_id_1;
   var $user_id;
   var $user_id_1;
   var $anam_date;
   var $anam_strtime;
   var $anam_endtime;
   var $anam_career;
   var $anam_caryear;
   var $anam_carsem;
   var $anam_reason;
   var $anam_aller;
   var $anam_temp;
   var $anam_hbeat;
   var $anam_bpsys;
   var $anam_bpdia;
   var $anam_oxy;
   var $anam_gluco;
   var $anam_diag;
   var $tratamiento;
   var $pat_blood;
   var $pat_blood_1;
   var $pat_bod;
   var $pat_gerens;
   var $pat_lname;
   var $pat_name;
   var $pat_phone;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $sc_insert_on;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['anam_aller']))
          {
              $this->anam_aller = $this->NM_ajax_info['param']['anam_aller'];
          }
          if (isset($this->NM_ajax_info['param']['anam_bpdia']))
          {
              $this->anam_bpdia = $this->NM_ajax_info['param']['anam_bpdia'];
          }
          if (isset($this->NM_ajax_info['param']['anam_bpsys']))
          {
              $this->anam_bpsys = $this->NM_ajax_info['param']['anam_bpsys'];
          }
          if (isset($this->NM_ajax_info['param']['anam_career']))
          {
              $this->anam_career = $this->NM_ajax_info['param']['anam_career'];
          }
          if (isset($this->NM_ajax_info['param']['anam_carsem']))
          {
              $this->anam_carsem = $this->NM_ajax_info['param']['anam_carsem'];
          }
          if (isset($this->NM_ajax_info['param']['anam_date']))
          {
              $this->anam_date = $this->NM_ajax_info['param']['anam_date'];
          }
          if (isset($this->NM_ajax_info['param']['anam_diag']))
          {
              $this->anam_diag = $this->NM_ajax_info['param']['anam_diag'];
          }
          if (isset($this->NM_ajax_info['param']['anam_gluco']))
          {
              $this->anam_gluco = $this->NM_ajax_info['param']['anam_gluco'];
          }
          if (isset($this->NM_ajax_info['param']['anam_hbeat']))
          {
              $this->anam_hbeat = $this->NM_ajax_info['param']['anam_hbeat'];
          }
          if (isset($this->NM_ajax_info['param']['anam_id']))
          {
              $this->anam_id = $this->NM_ajax_info['param']['anam_id'];
          }
          if (isset($this->NM_ajax_info['param']['anam_oxy']))
          {
              $this->anam_oxy = $this->NM_ajax_info['param']['anam_oxy'];
          }
          if (isset($this->NM_ajax_info['param']['anam_reason']))
          {
              $this->anam_reason = $this->NM_ajax_info['param']['anam_reason'];
          }
          if (isset($this->NM_ajax_info['param']['anam_strtime']))
          {
              $this->anam_strtime = $this->NM_ajax_info['param']['anam_strtime'];
          }
          if (isset($this->NM_ajax_info['param']['anam_temp']))
          {
              $this->anam_temp = $this->NM_ajax_info['param']['anam_temp'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['pat_blood']))
          {
              $this->pat_blood = $this->NM_ajax_info['param']['pat_blood'];
          }
          if (isset($this->NM_ajax_info['param']['pat_bod']))
          {
              $this->pat_bod = $this->NM_ajax_info['param']['pat_bod'];
          }
          if (isset($this->NM_ajax_info['param']['pat_gerens']))
          {
              $this->pat_gerens = $this->NM_ajax_info['param']['pat_gerens'];
          }
          if (isset($this->NM_ajax_info['param']['pat_lname']))
          {
              $this->pat_lname = $this->NM_ajax_info['param']['pat_lname'];
          }
          if (isset($this->NM_ajax_info['param']['pat_name']))
          {
              $this->pat_name = $this->NM_ajax_info['param']['pat_name'];
          }
          if (isset($this->NM_ajax_info['param']['pat_phone']))
          {
              $this->pat_phone = $this->NM_ajax_info['param']['pat_phone'];
          }
          if (isset($this->NM_ajax_info['param']['pati_id']))
          {
              $this->pati_id = $this->NM_ajax_info['param']['pati_id'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['tratamiento']))
          {
              $this->tratamiento = $this->NM_ajax_info['param']['tratamiento'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->scSajaxReservedWords = array('rs', 'rst', 'rsrnd', 'rsargs');
      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (!in_array(strtolower($nmgp_campo), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_campo]))
                   {
                       $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
                   {
                       $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
                   }
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (!in_array(strtolower($nmgp_var), $this->scSajaxReservedWords)) {
                   if (isset($this->sc_conv_var[$nmgp_var]))
                   {
                       $nmgp_var = $this->sc_conv_var[$nmgp_var];
                   }
                   elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
                   {
                       $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
                   }
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->nmgp_opcao) && $this->nmgp_opcao == "reload_novo") {
          $_POST['nmgp_opcao'] = "novo";
          $this->nmgp_opcao    = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['opcao']   = "novo";
          $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['opc_ant'] = "inicio";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_anamnesis']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_anamnesis']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_anamnesis($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_anamnesis']['total']);
          }
          if (!isset($_SESSION['sc_session'][$script_case_init]['form_anamnesis']['total']))
          {
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_anamnesis']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['nm_run_menu'] = 1;
      } 
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_anamnesis']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_anamnesis_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("es");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("es");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_anamnesis']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_anamnesis']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_anamnesis'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_anamnesis']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_anamnesis']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_anamnesis') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_anamnesis']['label'] = "Atenciones Enfermería";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_anamnesis")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form = (isset($_SESSION['scriptcase']['str_button_all'])) ? $_SESSION['scriptcase']['str_button_all'] : "scriptcase9_SweetAmour";
      $_SESSION['scriptcase']['str_button_all'] = $this->Ini->Str_btn_form;
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $_SESSION['scriptcase']['css_form_help'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form.css";
      $_SESSION['scriptcase']['css_form_help_dir'] = '../_lib/css/' . $this->Ini->str_schema_all . "_form" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css";
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = !isset($str_ajax_bg)         || "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = !isset($str_ajax_border_c)   || "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = !isset($str_ajax_border_s)   || "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = !isset($str_ajax_border_w)   || "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = !isset($str_block_exp)       || "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = !isset($str_block_col)       || "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = !isset($str_msg_ico_title)   || "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = !isset($str_msg_ico_body)    || "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = !isset($str_err_ico_title)   || "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = !isset($str_err_ico_body)    || "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = !isset($str_cal_ico_back)    || "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = !isset($str_cal_ico_for)     || "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = !isset($str_cal_ico_close)   || "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = !isset($str_tab_space)       || "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = !isset($str_bubble_tail)     || "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = !isset($str_label_sort_pos)  || "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = !isset($str_label_sort)      || "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = !isset($str_label_sort_asc)  || "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = !isset($str_label_sort_desc) || "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok       = !isset($str_img_status_ok)  || "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err      = !isset($str_img_status_err) || "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status          = "scFormInputError";
      $this->Ini->Css_status_pwd_box  = "scFormInputErrorPwdBox";
      $this->Ini->Css_status_pwd_text = "scFormInputErrorPwdText";
      $this->Ini->Error_icon_span      = !isset($str_error_icon_span)  || "" == trim($str_error_icon_span)  ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = !isset($img_qs_search)        || "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = !isset($img_qs_clean)         || "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = !isset($str_qs_image_padding) || "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';

        $this->classes_100perc_fields['table'] = '';
        $this->classes_100perc_fields['input'] = '';
        $this->classes_100perc_fields['span_input'] = '';
        $this->classes_100perc_fields['span_select'] = '';
        $this->classes_100perc_fields['style_category'] = '';
        $this->classes_100perc_fields['keep_field_size'] = true;
        if ($this->use_100perc_fields) {
            $this->classes_100perc_fields['table'] = ' sc-ui-100perc-table';
            $this->classes_100perc_fields['input'] = ' sc-ui-100perc-input';
            $this->classes_100perc_fields['span_input'] = ' sc-ui-100perc-span-input';
            $this->classes_100perc_fields['span_select'] = ' sc-ui-100perc-span-select';
            $this->classes_100perc_fields['style_category'] = ' style="width: 100%"';
            $this->classes_100perc_fields['keep_field_size'] = false;
        }



      $_SESSION['scriptcase']['error_icon']['form_anamnesis']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_anamnesis'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_call'] : $this->Embutida_call;

      $this->form_3versions_single = false;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "on";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "on";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['reload'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_anamnesis']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_anamnesis'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_anamnesis'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
              $this->nmgp_botoes['reload']     = $tmpDashboardButtons['form_reload']    ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_form'];
          if (!isset($this->anam_id)){$this->anam_id = $this->nmgp_dados_form['anam_id'];} 
          if (!isset($this->user_id)){$this->user_id = $this->nmgp_dados_form['user_id'];} 
          if (!isset($this->anam_endtime)){$this->anam_endtime = $this->nmgp_dados_form['anam_endtime'];} 
          if (!isset($this->anam_caryear)){$this->anam_caryear = $this->nmgp_dados_form['anam_caryear'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['pat_gerens'] != "null"){$this->pat_gerens = $this->nmgp_dados_form['pat_gerens'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_anamnesis", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_anamnesis/form_anamnesis_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_anamnesis_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_anamnesis_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_anamnesis_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_anamnesis/form_anamnesis_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_anamnesis_erro.class.php"); 
      }
      $this->Erro      = new form_anamnesis_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ((!isset($nm_opc_lookup) || $nm_opc_lookup != "lookup") && (!isset($nm_opc_php) || $nm_opc_php != "formphp"))
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao']))
         { 
             if ($this->anam_id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_anamnesis']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opc_ant'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opc_ant'] : "";
      } 
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      if ($this->nmgp_opcao == "excluir")
      {
          $GLOBALS['script_case_init'] = $this->Ini->sc_page;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['embutida_form'] = false;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['embutida_proc'] = true;
          $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['reg_start'] = "";
          unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['total']);
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_treatment') . "/index.php");
          require_once($this->Ini->root . $this->Ini->path_link  . SC_dir_app_name('form_treatment') . "/form_treatment_apl.php");
          $this->form_treatment = new form_treatment_apl;
      }
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      $this->sc_insert_on = false;
            if ('ajax_check_file' == $this->nmgp_opcao ){
                 ob_start(); 
                 include_once("../_lib/lib/php/nm_api.php"); 
            switch( $_POST['rsargs'] ){
               default:
                   echo 0;exit;
               break;
               }

            $out1_img_cache = $_SESSION['scriptcase']['form_anamnesis']['glo_nm_path_imag_temp'] . $file_name;
            $orig_img = $_SESSION['scriptcase']['form_anamnesis']['glo_nm_path_imag_temp']. '/sc_'.md5(date('YmdHis').basename($_POST['AjaxCheckImg'])).'.gif';
            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$orig_img);
            echo $orig_img . '_@@NM@@_';            copy($__file_download, $_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            $sc_obj_img = new nm_trata_img($_SERVER['DOCUMENT_ROOT'].$out1_img_cache, true);

            if(!empty($img_width) && !empty($img_height)){
                $sc_obj_img->setWidth($img_width);
                $sc_obj_img->setHeight($img_height);
            }
                $sc_obj_img->setManterAspecto(true);
            $sc_obj_img->createImg($_SERVER['DOCUMENT_ROOT'].$out1_img_cache);
            echo $out1_img_cache;
               exit;
            }
      if (isset($this->pati_id)) { $this->nm_limpa_alfa($this->pati_id); }
      if (isset($this->anam_career)) { $this->nm_limpa_alfa($this->anam_career); }
      if (isset($this->anam_carsem)) { $this->nm_limpa_alfa($this->anam_carsem); }
      if (isset($this->anam_reason)) { $this->nm_limpa_alfa($this->anam_reason); }
      if (isset($this->anam_aller)) { $this->nm_limpa_alfa($this->anam_aller); }
      if (isset($this->anam_temp)) { $this->nm_limpa_alfa($this->anam_temp); }
      if (isset($this->anam_hbeat)) { $this->nm_limpa_alfa($this->anam_hbeat); }
      if (isset($this->anam_bpsys)) { $this->nm_limpa_alfa($this->anam_bpsys); }
      if (isset($this->anam_bpdia)) { $this->nm_limpa_alfa($this->anam_bpdia); }
      if (isset($this->anam_oxy)) { $this->nm_limpa_alfa($this->anam_oxy); }
      if (isset($this->anam_gluco)) { $this->nm_limpa_alfa($this->anam_gluco); }
      if (isset($this->anam_diag)) { $this->nm_limpa_alfa($this->anam_diag); }
      if (isset($this->tratamiento)) { $this->nm_limpa_alfa($this->tratamiento); }
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- anam_date
      $this->field_config['anam_date']                 = array();
      $this->field_config['anam_date']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['anam_date']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['anam_date']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'anam_date');
      //-- anam_strtime
      $this->field_config['anam_strtime']                 = array();
      $this->field_config['anam_strtime']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['anam_strtime']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['anam_strtime']['date_display'] = "hhii";
      $this->new_date_format('HH', 'anam_strtime');
      //-- pat_bod
      $this->field_config['pat_bod']                 = array();
      $this->field_config['pat_bod']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['pat_bod']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['pat_bod']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'pat_bod');
      //-- anam_carsem
      $this->field_config['anam_carsem']               = array();
      $this->field_config['anam_carsem']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_carsem']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_carsem']['symbol_dec'] = '';
      $this->field_config['anam_carsem']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_carsem']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_bpsys
      $this->field_config['anam_bpsys']               = array();
      $this->field_config['anam_bpsys']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_bpsys']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_bpsys']['symbol_dec'] = '';
      $this->field_config['anam_bpsys']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_bpsys']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_bpdia
      $this->field_config['anam_bpdia']               = array();
      $this->field_config['anam_bpdia']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_bpdia']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_bpdia']['symbol_dec'] = '';
      $this->field_config['anam_bpdia']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_bpdia']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_hbeat
      $this->field_config['anam_hbeat']               = array();
      $this->field_config['anam_hbeat']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_hbeat']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_hbeat']['symbol_dec'] = '';
      $this->field_config['anam_hbeat']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_hbeat']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_temp
      $this->field_config['anam_temp']               = array();
      $this->field_config['anam_temp']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_temp']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_temp']['symbol_dec'] = $_SESSION['scriptcase']['reg_conf']['dec_num'];
      $this->field_config['anam_temp']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_temp']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_oxy
      $this->field_config['anam_oxy']               = array();
      $this->field_config['anam_oxy']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_oxy']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_oxy']['symbol_dec'] = '';
      $this->field_config['anam_oxy']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_oxy']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_gluco
      $this->field_config['anam_gluco']               = array();
      $this->field_config['anam_gluco']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_gluco']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_gluco']['symbol_dec'] = '';
      $this->field_config['anam_gluco']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_gluco']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_id
      $this->field_config['anam_id']               = array();
      $this->field_config['anam_id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_id']['symbol_dec'] = '';
      $this->field_config['anam_id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- anam_endtime
      $this->field_config['anam_endtime']                 = array();
      $this->field_config['anam_endtime']['date_format']  = $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['anam_endtime']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['anam_endtime']['date_display'] = "hhiiss";
      $this->new_date_format('HH', 'anam_endtime');
      //-- anam_caryear
      $this->field_config['anam_caryear']               = array();
      $this->field_config['anam_caryear']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['anam_caryear']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['anam_caryear']['symbol_dec'] = '';
      $this->field_config['anam_caryear']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['anam_caryear']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Gera_log_access'])
      {
          $this->NM_gera_log_insert("Scriptcase", "access");
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Gera_log_access'] = false;
      }

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_anam_date' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_date');
          }
          if ('validate_anam_strtime' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_strtime');
          }
          if ('validate_anam_reason' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_reason');
          }
          if ('validate_anam_diag' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_diag');
          }
          if ('validate_pati_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pati_id');
          }
          if ('validate_pat_bod' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pat_bod');
          }
          if ('validate_pat_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pat_name');
          }
          if ('validate_pat_lname' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pat_lname');
          }
          if ('validate_pat_blood' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pat_blood');
          }
          if ('validate_anam_career' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_career');
          }
          if ('validate_pat_gerens' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pat_gerens');
          }
          if ('validate_pat_phone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pat_phone');
          }
          if ('validate_anam_carsem' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_carsem');
          }
          if ('validate_anam_bpsys' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_bpsys');
          }
          if ('validate_anam_bpdia' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_bpdia');
          }
          if ('validate_anam_hbeat' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_hbeat');
          }
          if ('validate_anam_temp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_temp');
          }
          if ('validate_anam_oxy' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_oxy');
          }
          if ('validate_anam_gluco' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_gluco');
          }
          if ('validate_anam_aller' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anam_aller');
          }
          if ('validate_tratamiento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tratamiento');
          }
          form_anamnesis_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_pati_id_onchange' == $this->NM_ajax_opcao)
          {
              $this->pati_id_onChange();
          }
          form_anamnesis_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_select']['pat_gerens']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->pat_gerens = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_select']['pat_gerens'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_anamnesis_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_anamnesis_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro, '', true, true); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_anamnesis_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_anamnesis_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_anamnesis.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("Atenciones Enfermería") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/grp__NM__bg__NM__enfermeria_unae2.png">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_anamnesis_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_anamnesis"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
       if ($this->SC_log_atv)
       {
           $this->NM_gera_log_output();
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_gera_log_insert($orig="Scriptcase", $evento="", $texto="")
   {
       $delim  = "'";
       $delim1 = "'";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $delim  = "#";
           $delim1 = "#";
       } 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date']))
       {
           $delim  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date'];
           $delim1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date1'];
       }
       $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       $usr = isset($_SESSION['usr_login']) ? $_SESSION['usr_login'] : "";
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $dt  = $delim . date('Y-m-d H:i:s') . $delim1;
       } 
       if (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_access))
       { 
           $comando = "INSERT INTO audit (inserted_date, username, application, creator, ip_user, `action`, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_anamnesis', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       elseif (in_array(strtolower($_SESSION['scriptcase']['glo_tpbanco']), $this->Ini->nm_bases_sqlite))
       { 
           $comando = "INSERT INTO audit (id, inserted_date, username, application, creator, ip_user, action, description) VALUES (NULL, $dt, " . $this->Db->qstr($usr) . ", 'form_anamnesis', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       else
       { 
           $comando = "INSERT INTO audit (inserted_date, username, application, creator, ip_user, action, description) VALUES ($dt, " . $this->Db->qstr($usr) . ", 'form_anamnesis', '$orig', '" . $_SERVER['REMOTE_ADDR'] . "', '$evento', " . $this->Db->qstr($texto) . ")"; 
       } 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
       $rlog = $this->Db->Execute($comando); 
       if ($rlog === false)  
       { 
           $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
           if ($this->NM_ajax_flag)
           {
               form_anamnesis_pack_ajax_response();
               exit; 
           }
       }
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'anam_date':
               return "Fecha";
               break;
           case 'anam_strtime':
               return "Hora Inicio";
               break;
           case 'anam_reason':
               return "Motivo de Conslta";
               break;
           case 'anam_diag':
               return "Diagnóstico";
               break;
           case 'pati_id':
               return "Paciente";
               break;
           case 'pat_bod':
               return "Fecha de Nacimiento";
               break;
           case 'pat_name':
               return "Nombre";
               break;
           case 'pat_lname':
               return "Apellido";
               break;
           case 'pat_blood':
               return "Tipo Sanguíneo";
               break;
           case 'anam_career':
               return "Carrera";
               break;
           case 'pat_gerens':
               return "Genero";
               break;
           case 'pat_phone':
               return "Celular";
               break;
           case 'anam_carsem':
               return "Semestre";
               break;
           case 'anam_bpsys':
               return "Presión sistólica";
               break;
           case 'anam_bpdia':
               return "Presión diastólica";
               break;
           case 'anam_hbeat':
               return "Ritmo Cardiaco";
               break;
           case 'anam_temp':
               return "Temperatura";
               break;
           case 'anam_oxy':
               return "Oxigenación";
               break;
           case 'anam_gluco':
               return "Glucosa";
               break;
           case 'anam_aller':
               return "Alergias";
               break;
           case 'tratamiento':
               return "Tratamiento";
               break;
           case 'anam_id':
               return "atencion";
               break;
           case 'user_id':
               return "Tratante";
               break;
           case 'anam_endtime':
               return "Hora Final";
               break;
           case 'anam_caryear':
               return "Curso";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
     if (is_array($filtro) && empty($filtro)) {
         $filtro = '';
     }
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if (!is_array($filtro) && '' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_anamnesis']) || !is_array($this->NM_ajax_info['errList']['geral_form_anamnesis']))
              {
                  $this->NM_ajax_info['errList']['geral_form_anamnesis'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_anamnesis'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ((!is_array($filtro) && ('' == $filtro || 'anam_date' == $filtro)) || (is_array($filtro) && in_array('anam_date', $filtro)))
        $this->ValidateField_anam_date($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_strtime' == $filtro)) || (is_array($filtro) && in_array('anam_strtime', $filtro)))
        $this->ValidateField_anam_strtime($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_reason' == $filtro)) || (is_array($filtro) && in_array('anam_reason', $filtro)))
        $this->ValidateField_anam_reason($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_diag' == $filtro)) || (is_array($filtro) && in_array('anam_diag', $filtro)))
        $this->ValidateField_anam_diag($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pati_id' == $filtro)) || (is_array($filtro) && in_array('pati_id', $filtro)))
        $this->ValidateField_pati_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pat_bod' == $filtro)) || (is_array($filtro) && in_array('pat_bod', $filtro)))
        $this->ValidateField_pat_bod($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pat_name' == $filtro)) || (is_array($filtro) && in_array('pat_name', $filtro)))
        $this->ValidateField_pat_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pat_lname' == $filtro)) || (is_array($filtro) && in_array('pat_lname', $filtro)))
        $this->ValidateField_pat_lname($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pat_blood' == $filtro)) || (is_array($filtro) && in_array('pat_blood', $filtro)))
        $this->ValidateField_pat_blood($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_career' == $filtro)) || (is_array($filtro) && in_array('anam_career', $filtro)))
        $this->ValidateField_anam_career($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pat_gerens' == $filtro)) || (is_array($filtro) && in_array('pat_gerens', $filtro)))
        $this->ValidateField_pat_gerens($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'pat_phone' == $filtro)) || (is_array($filtro) && in_array('pat_phone', $filtro)))
        $this->ValidateField_pat_phone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_carsem' == $filtro)) || (is_array($filtro) && in_array('anam_carsem', $filtro)))
        $this->ValidateField_anam_carsem($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_bpsys' == $filtro)) || (is_array($filtro) && in_array('anam_bpsys', $filtro)))
        $this->ValidateField_anam_bpsys($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_bpdia' == $filtro)) || (is_array($filtro) && in_array('anam_bpdia', $filtro)))
        $this->ValidateField_anam_bpdia($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_hbeat' == $filtro)) || (is_array($filtro) && in_array('anam_hbeat', $filtro)))
        $this->ValidateField_anam_hbeat($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_temp' == $filtro)) || (is_array($filtro) && in_array('anam_temp', $filtro)))
        $this->ValidateField_anam_temp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_oxy' == $filtro)) || (is_array($filtro) && in_array('anam_oxy', $filtro)))
        $this->ValidateField_anam_oxy($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_gluco' == $filtro)) || (is_array($filtro) && in_array('anam_gluco', $filtro)))
        $this->ValidateField_anam_gluco($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'anam_aller' == $filtro)) || (is_array($filtro) && in_array('anam_aller', $filtro)))
        $this->ValidateField_anam_aller($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ((!is_array($filtro) && ('' == $filtro || 'tratamiento' == $filtro)) || (is_array($filtro) && in_array('tratamiento', $filtro)))
        $this->ValidateField_tratamiento($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_anam_date(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->anam_date, $this->field_config['anam_date']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['anam_date']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['anam_date']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['anam_date']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['anam_date']['date_sep']) ; 
          if (trim($this->anam_date) != "")  
          { 
              if ($teste_validade->Data($this->anam_date, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha; " ; 
                  if (!isset($Campos_Erros['anam_date']))
                  {
                      $Campos_Erros['anam_date'] = array();
                  }
                  $Campos_Erros['anam_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_date']) || !is_array($this->NM_ajax_info['errList']['anam_date']))
                  {
                      $this->NM_ajax_info['errList']['anam_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_date'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_date']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_date'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Fecha" ; 
              if (!isset($Campos_Erros['anam_date']))
              {
                  $Campos_Erros['anam_date'] = array();
              }
              $Campos_Erros['anam_date'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_date']) || !is_array($this->NM_ajax_info['errList']['anam_date']))
                  {
                      $this->NM_ajax_info['errList']['anam_date'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_date'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
          $this->field_config['anam_date']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_date';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_date

    function ValidateField_anam_strtime(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_hora($this->anam_strtime, $this->field_config['anam_strtime']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['anam_strtime']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['anam_strtime']['time_sep']) ; 
          if (trim($this->anam_strtime) != "")  
          { 
              if ($teste_validade->Hora($this->anam_strtime, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Hora Inicio; " ; 
                  if (!isset($Campos_Erros['anam_strtime']))
                  {
                      $Campos_Erros['anam_strtime'] = array();
                  }
                  $Campos_Erros['anam_strtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_strtime']) || !is_array($this->NM_ajax_info['errList']['anam_strtime']))
                  {
                      $this->NM_ajax_info['errList']['anam_strtime'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_strtime'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_strtime']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_strtime'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Hora Inicio" ; 
              if (!isset($Campos_Erros['anam_strtime']))
              {
                  $Campos_Erros['anam_strtime'] = array();
              }
              $Campos_Erros['anam_strtime'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_strtime']) || !is_array($this->NM_ajax_info['errList']['anam_strtime']))
                  {
                      $this->NM_ajax_info['errList']['anam_strtime'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_strtime'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_strtime';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_strtime

    function ValidateField_anam_reason(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_reason']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_reason'] == "on")) 
      { 
          if ($this->anam_reason == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Motivo de Conslta" ; 
              if (!isset($Campos_Erros['anam_reason']))
              {
                  $Campos_Erros['anam_reason'] = array();
              }
              $Campos_Erros['anam_reason'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_reason']) || !is_array($this->NM_ajax_info['errList']['anam_reason']))
                  {
                      $this->NM_ajax_info['errList']['anam_reason'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_reason'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->anam_reason) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Motivo de Conslta " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['anam_reason']))
              {
                  $Campos_Erros['anam_reason'] = array();
              }
              $Campos_Erros['anam_reason'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['anam_reason']) || !is_array($this->NM_ajax_info['errList']['anam_reason']))
              {
                  $this->NM_ajax_info['errList']['anam_reason'] = array();
              }
              $this->NM_ajax_info['errList']['anam_reason'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_reason';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_reason

    function ValidateField_anam_diag(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_diag']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_diag'] == "on")) 
      { 
          if ($this->anam_diag == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Diagnóstico" ; 
              if (!isset($Campos_Erros['anam_diag']))
              {
                  $Campos_Erros['anam_diag'] = array();
              }
              $Campos_Erros['anam_diag'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_diag']) || !is_array($this->NM_ajax_info['errList']['anam_diag']))
                  {
                      $this->NM_ajax_info['errList']['anam_diag'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_diag'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->anam_diag) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Diagnóstico " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['anam_diag']))
              {
                  $Campos_Erros['anam_diag'] = array();
              }
              $Campos_Erros['anam_diag'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['anam_diag']) || !is_array($this->NM_ajax_info['errList']['anam_diag']))
              {
                  $this->NM_ajax_info['errList']['anam_diag'] = array();
              }
              $this->NM_ajax_info['errList']['anam_diag'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_diag';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_diag

    function ValidateField_pati_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->pati_id == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['pati_id']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['pati_id'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Paciente" ; 
          if (!isset($Campos_Erros['pati_id']))
          {
              $Campos_Erros['pati_id'] = array();
          }
          $Campos_Erros['pati_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['pati_id']) || !is_array($this->NM_ajax_info['errList']['pati_id']))
          {
              $this->NM_ajax_info['errList']['pati_id'] = array();
          }
          $this->NM_ajax_info['errList']['pati_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->pati_id) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']) && !in_array($this->pati_id, $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['pati_id']))
              {
                  $Campos_Erros['pati_id'] = array();
              }
              $Campos_Erros['pati_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['pati_id']) || !is_array($this->NM_ajax_info['errList']['pati_id']))
              {
                  $this->NM_ajax_info['errList']['pati_id'] = array();
              }
              $this->NM_ajax_info['errList']['pati_id'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pati_id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pati_id

    function ValidateField_pat_bod(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->pat_bod, $this->field_config['pat_bod']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['pat_bod']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['pat_bod']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['pat_bod']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['pat_bod']['date_sep']) ; 
          if (trim($this->pat_bod) != "")  
          { 
              if ($teste_validade->Data($this->pat_bod, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Fecha de Nacimiento; " ; 
                  if (!isset($Campos_Erros['pat_bod']))
                  {
                      $Campos_Erros['pat_bod'] = array();
                  }
                  $Campos_Erros['pat_bod'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['pat_bod']) || !is_array($this->NM_ajax_info['errList']['pat_bod']))
                  {
                      $this->NM_ajax_info['errList']['pat_bod'] = array();
                  }
                  $this->NM_ajax_info['errList']['pat_bod'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['pat_bod']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pat_bod';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pat_bod

    function ValidateField_pat_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pat_name) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nombre " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pat_name']))
              {
                  $Campos_Erros['pat_name'] = array();
              }
              $Campos_Erros['pat_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pat_name']) || !is_array($this->NM_ajax_info['errList']['pat_name']))
              {
                  $this->NM_ajax_info['errList']['pat_name'] = array();
              }
              $this->NM_ajax_info['errList']['pat_name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pat_name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pat_name

    function ValidateField_pat_lname(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pat_lname) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Apellido " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pat_lname']))
              {
                  $Campos_Erros['pat_lname'] = array();
              }
              $Campos_Erros['pat_lname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pat_lname']) || !is_array($this->NM_ajax_info['errList']['pat_lname']))
              {
                  $this->NM_ajax_info['errList']['pat_lname'] = array();
              }
              $this->NM_ajax_info['errList']['pat_lname'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pat_lname';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pat_lname

    function ValidateField_pat_blood(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
               if (!empty($this->pat_blood) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']) && !in_array($this->pat_blood, $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']))
               {
                   $hasError = true;
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['pat_blood']))
                   {
                       $Campos_Erros['pat_blood'] = array();
                   }
                   $Campos_Erros['pat_blood'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['pat_blood']) || !is_array($this->NM_ajax_info['errList']['pat_blood']))
                   {
                       $this->NM_ajax_info['errList']['pat_blood'] = array();
                   }
                   $this->NM_ajax_info['errList']['pat_blood'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pat_blood';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pat_blood

    function ValidateField_anam_career(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->anam_career) > 45) 
          { 
              $hasError = true;
              $Campos_Crit .= "Carrera " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['anam_career']))
              {
                  $Campos_Erros['anam_career'] = array();
              }
              $Campos_Erros['anam_career'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['anam_career']) || !is_array($this->NM_ajax_info['errList']['anam_career']))
              {
                  $this->NM_ajax_info['errList']['anam_career'] = array();
              }
              $this->NM_ajax_info['errList']['anam_career'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_career';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_career

    function ValidateField_pat_gerens(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->pat_gerens == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->pat_gerens != "" && !in_array("pat_gerens", $this->sc_force_zero))
      { 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']) && !in_array($this->pat_gerens, $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['pat_gerens']))
              {
                  $Campos_Erros['pat_gerens'] = array();
              }
              $Campos_Erros['pat_gerens'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['pat_gerens']) || !is_array($this->NM_ajax_info['errList']['pat_gerens']))
              {
                  $this->NM_ajax_info['errList']['pat_gerens'] = array();
              }
              $this->NM_ajax_info['errList']['pat_gerens'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pat_gerens';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pat_gerens

    function ValidateField_pat_phone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pat_phone) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Celular " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pat_phone']))
              {
                  $Campos_Erros['pat_phone'] = array();
              }
              $Campos_Erros['pat_phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pat_phone']) || !is_array($this->NM_ajax_info['errList']['pat_phone']))
              {
                  $this->NM_ajax_info['errList']['pat_phone'] = array();
              }
              $this->NM_ajax_info['errList']['pat_phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'pat_phone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_pat_phone

    function ValidateField_anam_carsem(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->anam_carsem, $this->field_config['anam_carsem']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anam_carsem != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->anam_carsem) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Semestre: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anam_carsem']))
                  {
                      $Campos_Erros['anam_carsem'] = array();
                  }
                  $Campos_Erros['anam_carsem'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anam_carsem']) || !is_array($this->NM_ajax_info['errList']['anam_carsem']))
                  {
                      $this->NM_ajax_info['errList']['anam_carsem'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_carsem'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anam_carsem, 11, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Semestre; " ; 
                  if (!isset($Campos_Erros['anam_carsem']))
                  {
                      $Campos_Erros['anam_carsem'] = array();
                  }
                  $Campos_Erros['anam_carsem'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_carsem']) || !is_array($this->NM_ajax_info['errList']['anam_carsem']))
                  {
                      $this->NM_ajax_info['errList']['anam_carsem'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_carsem'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_carsem']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_carsem'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Semestre" ; 
              if (!isset($Campos_Erros['anam_carsem']))
              {
                  $Campos_Erros['anam_carsem'] = array();
              }
              $Campos_Erros['anam_carsem'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_carsem']) || !is_array($this->NM_ajax_info['errList']['anam_carsem']))
                  {
                      $this->NM_ajax_info['errList']['anam_carsem'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_carsem'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_carsem';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_carsem

    function ValidateField_anam_bpsys(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->anam_bpsys, $this->field_config['anam_bpsys']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anam_bpsys != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->anam_bpsys) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Presión sistólica: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anam_bpsys']))
                  {
                      $Campos_Erros['anam_bpsys'] = array();
                  }
                  $Campos_Erros['anam_bpsys'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anam_bpsys']) || !is_array($this->NM_ajax_info['errList']['anam_bpsys']))
                  {
                      $this->NM_ajax_info['errList']['anam_bpsys'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_bpsys'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anam_bpsys, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Presión sistólica; " ; 
                  if (!isset($Campos_Erros['anam_bpsys']))
                  {
                      $Campos_Erros['anam_bpsys'] = array();
                  }
                  $Campos_Erros['anam_bpsys'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_bpsys']) || !is_array($this->NM_ajax_info['errList']['anam_bpsys']))
                  {
                      $this->NM_ajax_info['errList']['anam_bpsys'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_bpsys'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_bpsys']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_bpsys'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Presión sistólica" ; 
              if (!isset($Campos_Erros['anam_bpsys']))
              {
                  $Campos_Erros['anam_bpsys'] = array();
              }
              $Campos_Erros['anam_bpsys'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_bpsys']) || !is_array($this->NM_ajax_info['errList']['anam_bpsys']))
                  {
                      $this->NM_ajax_info['errList']['anam_bpsys'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_bpsys'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_bpsys';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_bpsys

    function ValidateField_anam_bpdia(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->anam_bpdia, $this->field_config['anam_bpdia']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anam_bpdia != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->anam_bpdia) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Presión diastólica: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anam_bpdia']))
                  {
                      $Campos_Erros['anam_bpdia'] = array();
                  }
                  $Campos_Erros['anam_bpdia'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anam_bpdia']) || !is_array($this->NM_ajax_info['errList']['anam_bpdia']))
                  {
                      $this->NM_ajax_info['errList']['anam_bpdia'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_bpdia'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anam_bpdia, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Presión diastólica; " ; 
                  if (!isset($Campos_Erros['anam_bpdia']))
                  {
                      $Campos_Erros['anam_bpdia'] = array();
                  }
                  $Campos_Erros['anam_bpdia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_bpdia']) || !is_array($this->NM_ajax_info['errList']['anam_bpdia']))
                  {
                      $this->NM_ajax_info['errList']['anam_bpdia'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_bpdia'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_bpdia']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_bpdia'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Presión diastólica" ; 
              if (!isset($Campos_Erros['anam_bpdia']))
              {
                  $Campos_Erros['anam_bpdia'] = array();
              }
              $Campos_Erros['anam_bpdia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_bpdia']) || !is_array($this->NM_ajax_info['errList']['anam_bpdia']))
                  {
                      $this->NM_ajax_info['errList']['anam_bpdia'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_bpdia'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_bpdia';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_bpdia

    function ValidateField_anam_hbeat(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->anam_hbeat, $this->field_config['anam_hbeat']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anam_hbeat != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->anam_hbeat) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ritmo Cardiaco: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anam_hbeat']))
                  {
                      $Campos_Erros['anam_hbeat'] = array();
                  }
                  $Campos_Erros['anam_hbeat'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anam_hbeat']) || !is_array($this->NM_ajax_info['errList']['anam_hbeat']))
                  {
                      $this->NM_ajax_info['errList']['anam_hbeat'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_hbeat'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anam_hbeat, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Ritmo Cardiaco; " ; 
                  if (!isset($Campos_Erros['anam_hbeat']))
                  {
                      $Campos_Erros['anam_hbeat'] = array();
                  }
                  $Campos_Erros['anam_hbeat'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_hbeat']) || !is_array($this->NM_ajax_info['errList']['anam_hbeat']))
                  {
                      $this->NM_ajax_info['errList']['anam_hbeat'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_hbeat'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_hbeat']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_hbeat'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Ritmo Cardiaco" ; 
              if (!isset($Campos_Erros['anam_hbeat']))
              {
                  $Campos_Erros['anam_hbeat'] = array();
              }
              $Campos_Erros['anam_hbeat'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_hbeat']) || !is_array($this->NM_ajax_info['errList']['anam_hbeat']))
                  {
                      $this->NM_ajax_info['errList']['anam_hbeat'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_hbeat'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_hbeat';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_hbeat

    function ValidateField_anam_temp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (!empty($this->field_config['anam_temp']['symbol_dec']))
      {
          nm_limpa_valor($this->anam_temp, $this->field_config['anam_temp']['symbol_dec'], $this->field_config['anam_temp']['symbol_grp']) ; 
          if ('.' == substr($this->anam_temp, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->anam_temp, 1)))
              {
                  $this->anam_temp = '';
              }
              else
              {
                  $this->anam_temp = '0' . $this->anam_temp;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anam_temp != '')  
          { 
              $iTestSize = 46;
              if (strlen($this->anam_temp) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Temperatura: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anam_temp']))
                  {
                      $Campos_Erros['anam_temp'] = array();
                  }
                  $Campos_Erros['anam_temp'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anam_temp']) || !is_array($this->NM_ajax_info['errList']['anam_temp']))
                  {
                      $this->NM_ajax_info['errList']['anam_temp'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_temp'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anam_temp, 45, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Temperatura; " ; 
                  if (!isset($Campos_Erros['anam_temp']))
                  {
                      $Campos_Erros['anam_temp'] = array();
                  }
                  $Campos_Erros['anam_temp'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_temp']) || !is_array($this->NM_ajax_info['errList']['anam_temp']))
                  {
                      $this->NM_ajax_info['errList']['anam_temp'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_temp'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_temp']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_temp'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Temperatura" ; 
              if (!isset($Campos_Erros['anam_temp']))
              {
                  $Campos_Erros['anam_temp'] = array();
              }
              $Campos_Erros['anam_temp'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_temp']) || !is_array($this->NM_ajax_info['errList']['anam_temp']))
                  {
                      $this->NM_ajax_info['errList']['anam_temp'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_temp'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_temp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_temp

    function ValidateField_anam_oxy(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_numero($this->anam_oxy, $this->field_config['anam_oxy']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anam_oxy != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->anam_oxy) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Oxigenación: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anam_oxy']))
                  {
                      $Campos_Erros['anam_oxy'] = array();
                  }
                  $Campos_Erros['anam_oxy'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anam_oxy']) || !is_array($this->NM_ajax_info['errList']['anam_oxy']))
                  {
                      $this->NM_ajax_info['errList']['anam_oxy'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_oxy'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anam_oxy, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Oxigenación; " ; 
                  if (!isset($Campos_Erros['anam_oxy']))
                  {
                      $Campos_Erros['anam_oxy'] = array();
                  }
                  $Campos_Erros['anam_oxy'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_oxy']) || !is_array($this->NM_ajax_info['errList']['anam_oxy']))
                  {
                      $this->NM_ajax_info['errList']['anam_oxy'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_oxy'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
           elseif (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_oxy']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['php_cmp_required']['anam_oxy'] == "on") 
           { 
              $hasError = true;
              $Campos_Falta[] = "Oxigenación" ; 
              if (!isset($Campos_Erros['anam_oxy']))
              {
                  $Campos_Erros['anam_oxy'] = array();
              }
              $Campos_Erros['anam_oxy'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['anam_oxy']) || !is_array($this->NM_ajax_info['errList']['anam_oxy']))
                  {
                      $this->NM_ajax_info['errList']['anam_oxy'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_oxy'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
           } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_oxy';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_oxy

    function ValidateField_anam_gluco(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->anam_gluco === "" || is_null($this->anam_gluco))  
      { 
          $this->anam_gluco = 0;
          $this->sc_force_zero[] = 'anam_gluco';
      } 
      nm_limpa_numero($this->anam_gluco, $this->field_config['anam_gluco']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->anam_gluco != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->anam_gluco) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Glucosa: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['anam_gluco']))
                  {
                      $Campos_Erros['anam_gluco'] = array();
                  }
                  $Campos_Erros['anam_gluco'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['anam_gluco']) || !is_array($this->NM_ajax_info['errList']['anam_gluco']))
                  {
                      $this->NM_ajax_info['errList']['anam_gluco'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_gluco'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->anam_gluco, 12, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Glucosa; " ; 
                  if (!isset($Campos_Erros['anam_gluco']))
                  {
                      $Campos_Erros['anam_gluco'] = array();
                  }
                  $Campos_Erros['anam_gluco'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['anam_gluco']) || !is_array($this->NM_ajax_info['errList']['anam_gluco']))
                  {
                      $this->NM_ajax_info['errList']['anam_gluco'] = array();
                  }
                  $this->NM_ajax_info['errList']['anam_gluco'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_gluco';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_gluco

    function ValidateField_anam_aller(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->anam_aller) > 32767) 
          { 
              $hasError = true;
              $Campos_Crit .= "Alergias " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['anam_aller']))
              {
                  $Campos_Erros['anam_aller'] = array();
              }
              $Campos_Erros['anam_aller'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['anam_aller']) || !is_array($this->NM_ajax_info['errList']['anam_aller']))
              {
                  $this->NM_ajax_info['errList']['anam_aller'] = array();
              }
              $this->NM_ajax_info['errList']['anam_aller'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'anam_aller';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_anam_aller

    function ValidateField_tratamiento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->tratamiento) != "")  
          { 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'tratamiento';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_tratamiento

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['anam_date'] = (strlen(trim($this->anam_date)) > 19) ? str_replace(".", ":", $this->anam_date) : trim($this->anam_date);
    $this->nmgp_dados_form['anam_strtime'] = (strlen(trim($this->anam_strtime)) > 19) ? str_replace(".", ":", $this->anam_strtime) : trim($this->anam_strtime);
    $this->nmgp_dados_form['anam_reason'] = $this->anam_reason;
    $this->nmgp_dados_form['anam_diag'] = $this->anam_diag;
    $this->nmgp_dados_form['pati_id'] = $this->pati_id;
    $this->nmgp_dados_form['pat_bod'] = (strlen(trim($this->pat_bod)) > 19) ? str_replace(".", ":", $this->pat_bod) : trim($this->pat_bod);
    $this->nmgp_dados_form['pat_name'] = $this->pat_name;
    $this->nmgp_dados_form['pat_lname'] = $this->pat_lname;
    $this->nmgp_dados_form['pat_blood'] = $this->pat_blood;
    $this->nmgp_dados_form['anam_career'] = $this->anam_career;
    $this->nmgp_dados_form['pat_gerens'] = $this->pat_gerens;
    $this->nmgp_dados_form['pat_phone'] = $this->pat_phone;
    $this->nmgp_dados_form['anam_carsem'] = $this->anam_carsem;
    $this->nmgp_dados_form['anam_bpsys'] = $this->anam_bpsys;
    $this->nmgp_dados_form['anam_bpdia'] = $this->anam_bpdia;
    $this->nmgp_dados_form['anam_hbeat'] = $this->anam_hbeat;
    $this->nmgp_dados_form['anam_temp'] = $this->anam_temp;
    $this->nmgp_dados_form['anam_oxy'] = $this->anam_oxy;
    $this->nmgp_dados_form['anam_gluco'] = $this->anam_gluco;
    $this->nmgp_dados_form['anam_aller'] = $this->anam_aller;
    $this->nmgp_dados_form['tratamiento'] = $this->tratamiento;
    $this->nmgp_dados_form['anam_id'] = $this->anam_id;
    $this->nmgp_dados_form['user_id'] = $this->user_id;
    $this->nmgp_dados_form['anam_endtime'] = $this->anam_endtime;
    $this->nmgp_dados_form['anam_caryear'] = $this->anam_caryear;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['anam_date'] = $this->anam_date;
      nm_limpa_data($this->anam_date, $this->field_config['anam_date']['date_sep']) ; 
      $this->Before_unformat['anam_strtime'] = $this->anam_strtime;
      nm_limpa_hora($this->anam_strtime, $this->field_config['anam_strtime']['time_sep']) ; 
      $this->Before_unformat['pat_bod'] = $this->pat_bod;
      nm_limpa_data($this->pat_bod, $this->field_config['pat_bod']['date_sep']) ; 
      $this->Before_unformat['anam_carsem'] = $this->anam_carsem;
      nm_limpa_numero($this->anam_carsem, $this->field_config['anam_carsem']['symbol_grp']) ; 
      $this->Before_unformat['anam_bpsys'] = $this->anam_bpsys;
      nm_limpa_numero($this->anam_bpsys, $this->field_config['anam_bpsys']['symbol_grp']) ; 
      $this->Before_unformat['anam_bpdia'] = $this->anam_bpdia;
      nm_limpa_numero($this->anam_bpdia, $this->field_config['anam_bpdia']['symbol_grp']) ; 
      $this->Before_unformat['anam_hbeat'] = $this->anam_hbeat;
      nm_limpa_numero($this->anam_hbeat, $this->field_config['anam_hbeat']['symbol_grp']) ; 
      $this->Before_unformat['anam_temp'] = $this->anam_temp;
      if (!empty($this->field_config['anam_temp']['symbol_dec']))
      {
         nm_limpa_valor($this->anam_temp, $this->field_config['anam_temp']['symbol_dec'], $this->field_config['anam_temp']['symbol_grp']);
      }
      $this->Before_unformat['anam_oxy'] = $this->anam_oxy;
      nm_limpa_numero($this->anam_oxy, $this->field_config['anam_oxy']['symbol_grp']) ; 
      $this->Before_unformat['anam_gluco'] = $this->anam_gluco;
      nm_limpa_numero($this->anam_gluco, $this->field_config['anam_gluco']['symbol_grp']) ; 
      $this->Before_unformat['anam_id'] = $this->anam_id;
      nm_limpa_numero($this->anam_id, $this->field_config['anam_id']['symbol_grp']) ; 
      $this->Before_unformat['anam_endtime'] = $this->anam_endtime;
      nm_limpa_hora($this->anam_endtime, $this->field_config['anam_endtime']['time_sep']) ; 
      $this->Before_unformat['anam_caryear'] = $this->anam_caryear;
      nm_limpa_numero($this->anam_caryear, $this->field_config['anam_caryear']['symbol_grp']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "anam_carsem")
      {
          nm_limpa_numero($this->anam_carsem, $this->field_config['anam_carsem']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anam_bpsys")
      {
          nm_limpa_numero($this->anam_bpsys, $this->field_config['anam_bpsys']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anam_bpdia")
      {
          nm_limpa_numero($this->anam_bpdia, $this->field_config['anam_bpdia']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anam_hbeat")
      {
          nm_limpa_numero($this->anam_hbeat, $this->field_config['anam_hbeat']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anam_temp")
      {
          if (!empty($this->field_config['anam_temp']['symbol_dec']))
          {
             nm_limpa_valor($this->anam_temp, $this->field_config['anam_temp']['symbol_dec'], $this->field_config['anam_temp']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "anam_oxy")
      {
          nm_limpa_numero($this->anam_oxy, $this->field_config['anam_oxy']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anam_gluco")
      {
          nm_limpa_numero($this->anam_gluco, $this->field_config['anam_gluco']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anam_id")
      {
          nm_limpa_numero($this->anam_id, $this->field_config['anam_id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "anam_caryear")
      {
          nm_limpa_numero($this->anam_caryear, $this->field_config['anam_caryear']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ((!empty($this->anam_date) && 'null' != $this->anam_date) || (!empty($format_fields) && isset($format_fields['anam_date'])))
      {
          nm_volta_data($this->anam_date, $this->field_config['anam_date']['date_format']) ; 
          nmgp_Form_Datas($this->anam_date, $this->field_config['anam_date']['date_format'], $this->field_config['anam_date']['date_sep']) ;  
      }
      elseif ('null' == $this->anam_date || '' == $this->anam_date)
      {
          $this->anam_date = '';
      }
      if ((!empty($this->anam_strtime) && 'null' != $this->anam_strtime) || (!empty($format_fields) && isset($format_fields['anam_strtime'])))
      {
          nm_volta_hora($this->anam_strtime, $this->field_config['anam_strtime']['date_format']) ; 
          nmgp_Form_Hora($this->anam_strtime, $this->field_config['anam_strtime']['date_format'], $this->field_config['anam_strtime']['time_sep']) ;  
      }
      elseif ('null' == $this->anam_strtime || '' == $this->anam_strtime)
      {
          $this->anam_strtime = '';
      }
      if ((!empty($this->pat_bod) && 'null' != $this->pat_bod) || (!empty($format_fields) && isset($format_fields['pat_bod'])))
      {
          nm_volta_data($this->pat_bod, $this->field_config['pat_bod']['date_format']) ; 
          nmgp_Form_Datas($this->pat_bod, $this->field_config['pat_bod']['date_format'], $this->field_config['pat_bod']['date_sep']) ;  
      }
      elseif ('null' == $this->pat_bod || '' == $this->pat_bod)
      {
          $this->pat_bod = '';
      }
      if ('' !== $this->anam_carsem || (!empty($format_fields) && isset($format_fields['anam_carsem'])))
      {
          nmgp_Form_Num_Val($this->anam_carsem, $this->field_config['anam_carsem']['symbol_grp'], $this->field_config['anam_carsem']['symbol_dec'], "0", "S", $this->field_config['anam_carsem']['format_neg'], "", "", "-", $this->field_config['anam_carsem']['symbol_fmt']) ; 
      }
      if ('' !== $this->anam_bpsys || (!empty($format_fields) && isset($format_fields['anam_bpsys'])))
      {
          nmgp_Form_Num_Val($this->anam_bpsys, $this->field_config['anam_bpsys']['symbol_grp'], $this->field_config['anam_bpsys']['symbol_dec'], "0", "S", $this->field_config['anam_bpsys']['format_neg'], "", "", "-", $this->field_config['anam_bpsys']['symbol_fmt']) ; 
      }
      if ('' !== $this->anam_bpdia || (!empty($format_fields) && isset($format_fields['anam_bpdia'])))
      {
          nmgp_Form_Num_Val($this->anam_bpdia, $this->field_config['anam_bpdia']['symbol_grp'], $this->field_config['anam_bpdia']['symbol_dec'], "0", "S", $this->field_config['anam_bpdia']['format_neg'], "", "", "-", $this->field_config['anam_bpdia']['symbol_fmt']) ; 
      }
      if ('' !== $this->anam_hbeat || (!empty($format_fields) && isset($format_fields['anam_hbeat'])))
      {
          nmgp_Form_Num_Val($this->anam_hbeat, $this->field_config['anam_hbeat']['symbol_grp'], $this->field_config['anam_hbeat']['symbol_dec'], "0", "S", $this->field_config['anam_hbeat']['format_neg'], "", "", "-", $this->field_config['anam_hbeat']['symbol_fmt']) ; 
      }
      if ('' !== $this->anam_temp || (!empty($format_fields) && isset($format_fields['anam_temp'])))
      {
          nmgp_Form_Num_Val($this->anam_temp, $this->field_config['anam_temp']['symbol_grp'], $this->field_config['anam_temp']['symbol_dec'], "0", "S", $this->field_config['anam_temp']['format_neg'], "", "", "-", $this->field_config['anam_temp']['symbol_fmt']) ; 
      }
      if ('' !== $this->anam_oxy || (!empty($format_fields) && isset($format_fields['anam_oxy'])))
      {
          nmgp_Form_Num_Val($this->anam_oxy, $this->field_config['anam_oxy']['symbol_grp'], $this->field_config['anam_oxy']['symbol_dec'], "0", "S", $this->field_config['anam_oxy']['format_neg'], "", "", "-", $this->field_config['anam_oxy']['symbol_fmt']) ; 
      }
      if ('' !== $this->anam_gluco || (!empty($format_fields) && isset($format_fields['anam_gluco'])))
      {
          nmgp_Form_Num_Val($this->anam_gluco, $this->field_config['anam_gluco']['symbol_grp'], $this->field_config['anam_gluco']['symbol_dec'], "0", "S", $this->field_config['anam_gluco']['format_neg'], "", "", "-", $this->field_config['anam_gluco']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
          $nm_campo = $trab_saida;
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
      $nm_campo = $trab_saida;
   } 
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

      $mask_num = false;
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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['anam_date']['date_format'];
      if ($this->anam_date != "")  
      { 
          nm_conv_data($this->anam_date, $this->field_config['anam_date']['date_format']) ; 
          $this->anam_date_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->anam_date_hora = substr($this->anam_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->anam_date_hora = substr($this->anam_date_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->anam_date_hora = substr($this->anam_date_hora, 0, -4);
          }
      } 
      if ($this->anam_date == "" && $use_null)  
      { 
          $this->anam_date = "null" ; 
      } 
      $this->field_config['anam_date']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['anam_strtime']['date_format'];
      if ($this->anam_strtime != "")  
      { 
          $this->anam_strtime_hora = $this->anam_strtime;
          $this->anam_strtime = "1900-01-01";
          nm_conv_hora($this->anam_strtime_hora, $this->field_config['anam_strtime']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->anam_strtime_hora = substr($this->anam_strtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->anam_strtime_hora = substr($this->anam_strtime_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->anam_strtime_hora = substr($this->anam_strtime_hora, 0, -4);
          }
          $this->anam_strtime = $this->anam_strtime_hora;
      } 
      if ($this->anam_strtime == "" && $use_null)  
      { 
          $this->anam_strtime = "null" ; 
      } 
      $this->field_config['anam_strtime']['date_format'] = $guarda_format_hora;
   }
//
   function nm_prep_date_change($cmp_date, $format_dt)
   {
       $vl_return  = "";
       if ($cmp_date != 'null') {
           $vl_return .= (strpos($format_dt, "yy") !== false) ? substr($cmp_date,  0, 4) : "";
           $vl_return .= (strpos($format_dt, "mm") !== false) ? substr($cmp_date,  5, 2) : "";
           $vl_return .= (strpos($format_dt, "dd") !== false) ? substr($cmp_date,  8, 2) : "";
           $vl_return .= (strpos($format_dt, "hh") !== false) ? substr($cmp_date, 11, 2) : "";
           $vl_return .= (strpos($format_dt, "ii") !== false) ? substr($cmp_date, 14, 2) : "";
           $vl_return .= (strpos($format_dt, "ss") !== false) ? substr($cmp_date, 17, 2) : "";
       }
       return $vl_return;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
           nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
           return $dt_out;
       }
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_anam_date();
          $this->ajax_return_values_anam_strtime();
          $this->ajax_return_values_anam_reason();
          $this->ajax_return_values_anam_diag();
          $this->ajax_return_values_pati_id();
          $this->ajax_return_values_pat_bod();
          $this->ajax_return_values_pat_name();
          $this->ajax_return_values_pat_lname();
          $this->ajax_return_values_pat_blood();
          $this->ajax_return_values_anam_career();
          $this->ajax_return_values_pat_gerens();
          $this->ajax_return_values_pat_phone();
          $this->ajax_return_values_anam_carsem();
          $this->ajax_return_values_anam_bpsys();
          $this->ajax_return_values_anam_bpdia();
          $this->ajax_return_values_anam_hbeat();
          $this->ajax_return_values_anam_temp();
          $this->ajax_return_values_anam_oxy();
          $this->ajax_return_values_anam_gluco();
          $this->ajax_return_values_anam_aller();
          $this->ajax_return_values_tratamiento();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['anam_id']['keyVal'] = form_anamnesis_pack_protect_string($this->nmgp_dados_form['anam_id']);
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['foreign_key']['anam_id'] = $this->nmgp_dados_form['anam_id'];
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['where_filter'] = "anam_id = " . $this->nmgp_dados_form['anam_id'] . "";
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['where_detal']  = "anam_id = " . $this->nmgp_dados_form['anam_id'] . "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total'] < 0)
              {
                  $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['where_filter'] = "1 <> 1";
              }
              $_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['reg_start'] = "";
              unset($_SESSION['sc_session'][ $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['form_treatment_script_case_init'] ]['form_treatment']['total']);
          }
   } // ajax_return_values

          //----- anam_date
   function ajax_return_values_anam_date($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_date", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_date);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_date'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_strtime
   function ajax_return_values_anam_strtime($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_strtime", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_strtime);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_strtime'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_reason
   function ajax_return_values_anam_reason($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_reason", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_reason);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_reason'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- anam_diag
   function ajax_return_values_anam_diag($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_diag", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_diag);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_diag'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pati_id
   function ajax_return_values_pati_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pati_id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pati_id);
              $aLookup = array();
              $this->_tmp_lookup_pati_id = $this->pati_id;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(form_anamnesis_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_anamnesis_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"pati_id\"";
          if (isset($this->NM_ajax_info['select_html']['pati_id']) && !empty($this->NM_ajax_info['select_html']['pati_id']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['pati_id']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->pati_id == $sValue)
                  {
                      $this->_tmp_lookup_pati_id = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['pati_id'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pati_id']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pati_id']['valList'][$i] = form_anamnesis_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pati_id']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pati_id']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pati_id']['labList'] = $aLabel;
          }
   }

          //----- pat_bod
   function ajax_return_values_pat_bod($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pat_bod", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pat_bod);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pat_bod'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pat_name
   function ajax_return_values_pat_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pat_name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pat_name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pat_name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pat_lname
   function ajax_return_values_pat_lname($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pat_lname", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pat_lname);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pat_lname'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pat_blood
   function ajax_return_values_pat_blood($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pat_blood", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pat_blood);
              $aLookup = array();
              $this->_tmp_lookup_pat_blood = $this->pat_blood;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(form_anamnesis_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_anamnesis_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"pat_blood\"";
          if (isset($this->NM_ajax_info['select_html']['pat_blood']) && !empty($this->NM_ajax_info['select_html']['pat_blood']))
          {
              $sSelComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['pat_blood']);
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->pat_blood == $sValue)
                  {
                      $this->_tmp_lookup_pat_blood = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['pat_blood'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pat_blood']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pat_blood']['valList'][$i] = form_anamnesis_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pat_blood']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pat_blood']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pat_blood']['labList'] = $aLabel;
          }
   }

          //----- anam_career
   function ajax_return_values_anam_career($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_career", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_career);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_career'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pat_gerens
   function ajax_return_values_pat_gerens($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pat_gerens", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pat_gerens);
              $aLookup = array();
              $this->_tmp_lookup_pat_gerens = $this->pat_gerens;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

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
              $aLookup[] = array(form_anamnesis_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_anamnesis_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'][] = $rs->fields[0];
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
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['pat_gerens']) && !empty($this->NM_ajax_info['select_html']['pat_gerens']))
          {
              $sOptComp = str_replace('{SC_100PERC_CLASS_INPUT}', $this->classes_100perc_fields['input'], $this->NM_ajax_info['select_html']['pat_gerens']);
          }
          $this->NM_ajax_info['fldList']['pat_gerens'] = array(
                       'row'    => '',
               'type'    => 'radio',
               'switch'  => false,
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 1,
               'optComp'  => $sOptComp,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['pat_gerens']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['pat_gerens']['valList'][$i] = form_anamnesis_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['pat_gerens']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['pat_gerens']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['pat_gerens']['labList'] = $aLabel;
          }
   }

          //----- pat_phone
   function ajax_return_values_pat_phone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pat_phone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pat_phone);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pat_phone'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- anam_carsem
   function ajax_return_values_anam_carsem($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_carsem", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_carsem);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_carsem'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_bpsys
   function ajax_return_values_anam_bpsys($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_bpsys", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_bpsys);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_bpsys'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_bpdia
   function ajax_return_values_anam_bpdia($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_bpdia", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_bpdia);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_bpdia'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_hbeat
   function ajax_return_values_anam_hbeat($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_hbeat", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_hbeat);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_hbeat'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_temp
   function ajax_return_values_anam_temp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_temp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_temp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_temp'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_oxy
   function ajax_return_values_anam_oxy($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_oxy", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_oxy);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_oxy'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_gluco
   function ajax_return_values_anam_gluco($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_gluco", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_gluco);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_gluco'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- anam_aller
   function ajax_return_values_anam_aller($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anam_aller", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anam_aller);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anam_aller'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tratamiento
   function ajax_return_values_tratamiento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tratamiento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tratamiento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tratamiento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_anam_career = $this->anam_career;
    $original_anam_carsem = $this->anam_carsem;
    $original_pat_bod = $this->pat_bod;
    $original_pat_gerens = $this->pat_gerens;
    $original_pat_lname = $this->pat_lname;
    $original_pat_name = $this->pat_name;
    $original_pat_phone = $this->pat_phone;
    $original_pati_id = $this->pati_id;
}
  

$check_sql = "SELECT pati_name, pati_lname, pati_docnum, pati_bod, pati_phone, pati_career, pati_caryerar, pati_carsem, gerens_id, btyp_id"
   . " FROM patients"
   . " WHERE pati_id = '" . $this->pati_id  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


if (isset($this->rs[0][0]))     
{
    $this->anam_career  = $this->rs[0][5];
    $this->anam_carsem  = $this->rs[0][7];
	$this->pat_bod  = $this->rs[0][3];
	$this->pat_name  = $this->rs[0][0];
	$this->pat_lname  = $this->rs[0][1];
	$this->pat_gerens  = $this->rs[0][8];
	$this->pat_phone  = $this->rs[0][4];
	$btyp_id  = $this->rs[0][9];
}
		else     
{
		    $other_field  = '';
    $other_region  = '';
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_anam_career != $this->anam_career || (isset($bFlagRead_anam_career) && $bFlagRead_anam_career)))
    {
        $this->ajax_return_values_anam_career(true);
    }
    if (($original_anam_carsem != $this->anam_carsem || (isset($bFlagRead_anam_carsem) && $bFlagRead_anam_carsem)))
    {
        $this->ajax_return_values_anam_carsem(true);
    }
    if (($original_pat_bod != $this->pat_bod || (isset($bFlagRead_pat_bod) && $bFlagRead_pat_bod)))
    {
        $this->ajax_return_values_pat_bod(true);
    }
    if (($original_pat_gerens != $this->pat_gerens || (isset($bFlagRead_pat_gerens) && $bFlagRead_pat_gerens)))
    {
        $this->ajax_return_values_pat_gerens(true);
    }
    if (($original_pat_lname != $this->pat_lname || (isset($bFlagRead_pat_lname) && $bFlagRead_pat_lname)))
    {
        $this->ajax_return_values_pat_lname(true);
    }
    if (($original_pat_name != $this->pat_name || (isset($bFlagRead_pat_name) && $bFlagRead_pat_name)))
    {
        $this->ajax_return_values_pat_name(true);
    }
    if (($original_pat_phone != $this->pat_phone || (isset($bFlagRead_pat_phone) && $bFlagRead_pat_phone)))
    {
        $this->ajax_return_values_pat_phone(true);
    }
    if (($original_pati_id != $this->pati_id || (isset($bFlagRead_pati_id) && $bFlagRead_pati_id)))
    {
        $this->ajax_return_values_pati_id(true);
    }
}
$_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->anam_temp = str_replace($sc_parm1, $sc_parm2, $this->anam_temp); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->anam_temp = "'" . $this->anam_temp . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->anam_temp = str_replace("'", "", $this->anam_temp); 
   } 
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      $this->SC_log_atv = false;
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_key($this->nmgp_opcao);
      }
      if ("alterar" == $this->nmgp_opcao || "excluir" == $this->nmgp_opcao)
      {
          $this->NM_gera_log_old();
      }
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'on';
              /* treatment */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM treatment WHERE anam_id = " . $this->anam_id ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) AS countTest FROM treatment WHERE anam_id = " . $this->anam_id ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_treatment = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->dataset_treatment[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_treatment = false;
          $this->dataset_treatment_erro = $this->Db->ErrorMsg();
      } 


      if($this->dataset_treatment[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6) || (isset($this->wizard_action) && 'change_step' == $this->wizard_action))
 {
  if (isset($this->wizard_action) && 'change_step' == $this->wizard_action) {
   $sErrorIndex = 'geral_form_anamnesis';
  } elseif ('submit_form' == $this->NM_ajax_opcao) {
   $sErrorIndex = 'geral_form_anamnesis';
  } else {
   $sErrorIndex = substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  }
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if ((!isset($this->Ini->nm_bases_access) || !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      if ('incluir' == $this->nmgp_opcao && empty($this->user_id)) {$this->user_id = "1"; $NM_val_null[] = "user_id";}  
      $NM_val_form['anam_date'] = $this->anam_date;
      $NM_val_form['anam_strtime'] = $this->anam_strtime;
      $NM_val_form['anam_reason'] = $this->anam_reason;
      $NM_val_form['anam_diag'] = $this->anam_diag;
      $NM_val_form['pati_id'] = $this->pati_id;
      $NM_val_form['pat_bod'] = $this->pat_bod;
      $NM_val_form['pat_name'] = $this->pat_name;
      $NM_val_form['pat_lname'] = $this->pat_lname;
      $NM_val_form['pat_blood'] = $this->pat_blood;
      $NM_val_form['anam_career'] = $this->anam_career;
      $NM_val_form['pat_gerens'] = $this->pat_gerens;
      $NM_val_form['pat_phone'] = $this->pat_phone;
      $NM_val_form['anam_carsem'] = $this->anam_carsem;
      $NM_val_form['anam_bpsys'] = $this->anam_bpsys;
      $NM_val_form['anam_bpdia'] = $this->anam_bpdia;
      $NM_val_form['anam_hbeat'] = $this->anam_hbeat;
      $NM_val_form['anam_temp'] = $this->anam_temp;
      $NM_val_form['anam_oxy'] = $this->anam_oxy;
      $NM_val_form['anam_gluco'] = $this->anam_gluco;
      $NM_val_form['anam_aller'] = $this->anam_aller;
      $NM_val_form['tratamiento'] = $this->tratamiento;
      $NM_val_form['anam_id'] = $this->anam_id;
      $NM_val_form['user_id'] = $this->user_id;
      $NM_val_form['anam_endtime'] = $this->anam_endtime;
      $NM_val_form['anam_caryear'] = $this->anam_caryear;
      if ($this->anam_id === "" || is_null($this->anam_id))  
      { 
          $this->anam_id = 0;
      } 
      if ($this->pati_id === "" || is_null($this->pati_id))  
      { 
          $this->pati_id = 0;
          $this->sc_force_zero[] = 'pati_id';
      } 
      if ($this->user_id === "" || is_null($this->user_id))  
      { 
          $this->user_id = 0;
          $this->sc_force_zero[] = 'user_id';
      } 
      if ($this->anam_caryear === "" || is_null($this->anam_caryear))  
      { 
          $this->anam_caryear = 0;
          $this->sc_force_zero[] = 'anam_caryear';
      } 
      if ($this->anam_carsem === "" || is_null($this->anam_carsem))  
      { 
          $this->anam_carsem = 0;
          $this->sc_force_zero[] = 'anam_carsem';
      } 
      if ($this->anam_temp === "" || is_null($this->anam_temp))  
      { 
          $this->anam_temp = 0;
          $this->sc_force_zero[] = 'anam_temp';
      } 
      if ($this->anam_hbeat === "" || is_null($this->anam_hbeat))  
      { 
          $this->anam_hbeat = 0;
          $this->sc_force_zero[] = 'anam_hbeat';
      } 
      if ($this->anam_bpsys === "" || is_null($this->anam_bpsys))  
      { 
          $this->anam_bpsys = 0;
          $this->sc_force_zero[] = 'anam_bpsys';
      } 
      if ($this->anam_bpdia === "" || is_null($this->anam_bpdia))  
      { 
          $this->anam_bpdia = 0;
          $this->sc_force_zero[] = 'anam_bpdia';
      } 
      if ($this->anam_oxy === "" || is_null($this->anam_oxy))  
      { 
          $this->anam_oxy = 0;
          $this->sc_force_zero[] = 'anam_oxy';
      } 
      if ($this->anam_gluco === "" || is_null($this->anam_gluco))  
      { 
          $this->anam_gluco = 0;
          $this->sc_force_zero[] = 'anam_gluco';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_ibase, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->anam_date == "")  
          { 
              $this->anam_date = "null"; 
              $NM_val_null[] = "anam_date";
          } 
          if ($this->anam_strtime == "")  
          { 
              $this->anam_strtime = "null"; 
              $NM_val_null[] = "anam_strtime";
          } 
          if ($this->anam_endtime == "")  
          { 
              $this->anam_endtime = "null"; 
              $NM_val_null[] = "anam_endtime";
          } 
          $this->anam_career_before_qstr = $this->anam_career;
          $this->anam_career = substr($this->Db->qstr($this->anam_career), 1, -1); 
          if ($this->anam_career == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->anam_career = "null"; 
              $NM_val_null[] = "anam_career";
          } 
          $this->anam_reason_before_qstr = $this->anam_reason;
          $this->anam_reason = substr($this->Db->qstr($this->anam_reason), 1, -1); 
          if ($this->anam_reason == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->anam_reason = "null"; 
              $NM_val_null[] = "anam_reason";
          } 
          $this->anam_aller_before_qstr = $this->anam_aller;
          $this->anam_aller = substr($this->Db->qstr($this->anam_aller), 1, -1); 
          if ($this->anam_aller == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->anam_aller = "null"; 
              $NM_val_null[] = "anam_aller";
          } 
          $this->anam_diag_before_qstr = $this->anam_diag;
          $this->anam_diag = substr($this->Db->qstr($this->anam_diag), 1, -1); 
          if ($this->anam_diag == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->anam_diag = "null"; 
              $NM_val_null[] = "anam_diag";
          } 
          $this->tratamiento_before_qstr = $this->tratamiento;
          $this->tratamiento = substr($this->Db->qstr($this->tratamiento), 1, -1); 
          if ($this->tratamiento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tratamiento = "null"; 
              $NM_val_null[] = "tratamiento";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_anamnesis_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "pati_id = $this->pati_id, anam_date = #$this->anam_date#, anam_strtime = #$this->anam_strtime#, anam_career = '$this->anam_career', anam_carsem = $this->anam_carsem, anam_reason = '$this->anam_reason', anam_aller = '$this->anam_aller', anam_temp = $this->anam_temp, anam_hbeat = $this->anam_hbeat, anam_bpsys = $this->anam_bpsys, anam_bpdia = $this->anam_bpdia, anam_oxy = $this->anam_oxy, anam_gluco = $this->anam_gluco, anam_diag = '$this->anam_diag'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "pati_id = $this->pati_id, anam_date = " . $this->Ini->date_delim . $this->anam_date . $this->Ini->date_delim1 . ", anam_strtime = " . $this->Ini->date_delim . $this->anam_strtime . $this->Ini->date_delim1 . ", anam_career = '$this->anam_career', anam_carsem = $this->anam_carsem, anam_reason = '$this->anam_reason', anam_aller = '$this->anam_aller', anam_temp = $this->anam_temp, anam_hbeat = $this->anam_hbeat, anam_bpsys = $this->anam_bpsys, anam_bpdia = $this->anam_bpdia, anam_oxy = $this->anam_oxy, anam_gluco = $this->anam_gluco, anam_diag = '$this->anam_diag'"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "pati_id = $this->pati_id, anam_date = " . $this->Ini->date_delim . $this->anam_date . $this->Ini->date_delim1 . ", anam_strtime = " . $this->Ini->date_delim . $this->anam_strtime . $this->Ini->date_delim1 . ", anam_career = '$this->anam_career', anam_carsem = $this->anam_carsem, anam_reason = '$this->anam_reason', anam_aller = '$this->anam_aller', anam_temp = $this->anam_temp, anam_hbeat = $this->anam_hbeat, anam_bpsys = $this->anam_bpsys, anam_bpdia = $this->anam_bpdia, anam_oxy = $this->anam_oxy, anam_gluco = $this->anam_gluco, anam_diag = '$this->anam_diag'"; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "pati_id = $this->pati_id, anam_date = " . $this->Ini->date_delim . $this->anam_date . $this->Ini->date_delim1 . ", anam_strtime = " . $this->Ini->date_delim . $this->anam_strtime . $this->Ini->date_delim1 . ", anam_career = '$this->anam_career', anam_carsem = $this->anam_carsem, anam_reason = '$this->anam_reason', anam_aller = '$this->anam_aller', anam_temp = $this->anam_temp, anam_hbeat = $this->anam_hbeat, anam_bpsys = $this->anam_bpsys, anam_bpdia = $this->anam_bpdia, anam_oxy = $this->anam_oxy, anam_gluco = $this->anam_gluco, anam_diag = '$this->anam_diag'"; 
              } 
              if (isset($NM_val_form['user_id']) && $NM_val_form['user_id'] != $this->nmgp_dados_select['user_id']) 
              { 
                  $SC_fields_update[] = "user_id = $this->user_id"; 
              } 
              if (isset($NM_val_form['anam_endtime']) && $NM_val_form['anam_endtime'] != $this->nmgp_dados_select['anam_endtime']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "anam_endtime = #$this->anam_endtime#"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "anam_endtime = " . $this->Ini->date_delim . $this->anam_endtime . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['anam_caryear']) && $NM_val_form['anam_caryear'] != $this->nmgp_dados_select['anam_caryear']) 
              { 
                  $SC_fields_update[] = "anam_caryear = $this->anam_caryear"; 
              } 
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE anam_id = $this->anam_id ";  
              }  
              else  
              {
                  $comando .= " WHERE anam_id = $this->anam_id ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_anamnesis_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              $this->anam_career = $this->anam_career_before_qstr;
              $this->anam_reason = $this->anam_reason_before_qstr;
              $this->anam_aller = $this->anam_aller_before_qstr;
              $this->anam_diag = $this->anam_diag_before_qstr;
              $this->tratamiento = $this->tratamiento_before_qstr;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_log_new();
              $this->NM_gera_log_compress();

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['db_changed'] = true;
              if ($this->NM_ajax_flag) {
                  $this->NM_ajax_info['clearUpload'] = 'S';
              }


              if     (isset($NM_val_form) && isset($NM_val_form['pati_id'])) { $this->pati_id = $NM_val_form['pati_id']; }
              elseif (isset($this->pati_id)) { $this->nm_limpa_alfa($this->pati_id); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_career'])) { $this->anam_career = $NM_val_form['anam_career']; }
              elseif (isset($this->anam_career)) { $this->nm_limpa_alfa($this->anam_career); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_carsem'])) { $this->anam_carsem = $NM_val_form['anam_carsem']; }
              elseif (isset($this->anam_carsem)) { $this->nm_limpa_alfa($this->anam_carsem); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_reason'])) { $this->anam_reason = $NM_val_form['anam_reason']; }
              elseif (isset($this->anam_reason)) { $this->nm_limpa_alfa($this->anam_reason); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_aller'])) { $this->anam_aller = $NM_val_form['anam_aller']; }
              elseif (isset($this->anam_aller)) { $this->nm_limpa_alfa($this->anam_aller); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_temp'])) { $this->anam_temp = $NM_val_form['anam_temp']; }
              elseif (isset($this->anam_temp)) { $this->nm_limpa_alfa($this->anam_temp); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_hbeat'])) { $this->anam_hbeat = $NM_val_form['anam_hbeat']; }
              elseif (isset($this->anam_hbeat)) { $this->nm_limpa_alfa($this->anam_hbeat); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_bpsys'])) { $this->anam_bpsys = $NM_val_form['anam_bpsys']; }
              elseif (isset($this->anam_bpsys)) { $this->nm_limpa_alfa($this->anam_bpsys); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_bpdia'])) { $this->anam_bpdia = $NM_val_form['anam_bpdia']; }
              elseif (isset($this->anam_bpdia)) { $this->nm_limpa_alfa($this->anam_bpdia); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_oxy'])) { $this->anam_oxy = $NM_val_form['anam_oxy']; }
              elseif (isset($this->anam_oxy)) { $this->nm_limpa_alfa($this->anam_oxy); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_gluco'])) { $this->anam_gluco = $NM_val_form['anam_gluco']; }
              elseif (isset($this->anam_gluco)) { $this->nm_limpa_alfa($this->anam_gluco); }
              if     (isset($NM_val_form) && isset($NM_val_form['anam_diag'])) { $this->anam_diag = $NM_val_form['anam_diag']; }
              elseif (isset($this->anam_diag)) { $this->nm_limpa_alfa($this->anam_diag); }
              if     (isset($NM_val_form) && isset($NM_val_form['tratamiento'])) { $this->tratamiento = $NM_val_form['tratamiento']; }
              elseif (isset($this->tratamiento)) { $this->nm_limpa_alfa($this->tratamiento); }

              $this->nm_formatar_campos();

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('anam_date', 'anam_strtime', 'anam_reason', 'anam_diag', 'pati_id', 'pat_bod', 'pat_name', 'pat_lname', 'pat_blood', 'anam_career', 'pat_gerens', 'pat_phone', 'anam_carsem', 'anam_bpsys', 'anam_bpdia', 'anam_hbeat', 'anam_temp', 'anam_oxy', 'anam_gluco', 'anam_aller', 'tratamiento'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "anam_id, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_anamnesis_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag) VALUES ($this->pati_id, $this->user_id, #$this->anam_date#, #$this->anam_strtime#, #$this->anam_endtime#, '$this->anam_career', $this->anam_caryear, $this->anam_carsem, '$this->anam_reason', '$this->anam_aller', $this->anam_temp, $this->anam_hbeat, $this->anam_bpsys, $this->anam_bpdia, $this->anam_oxy, $this->anam_gluco, '$this->anam_diag')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag) VALUES (" . $NM_seq_auto . "$this->pati_id, $this->user_id, " . $this->Ini->date_delim . $this->anam_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_strtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_endtime . $this->Ini->date_delim1 . ", '$this->anam_career', $this->anam_caryear, $this->anam_carsem, '$this->anam_reason', '$this->anam_aller', $this->anam_temp, $this->anam_hbeat, $this->anam_bpsys, $this->anam_bpdia, $this->anam_oxy, $this->anam_gluco, '$this->anam_diag')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag) VALUES (" . $NM_seq_auto . "$this->pati_id, $this->user_id, " . $this->Ini->date_delim . $this->anam_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_strtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_endtime . $this->Ini->date_delim1 . ", '$this->anam_career', $this->anam_caryear, $this->anam_carsem, '$this->anam_reason', '$this->anam_aller', $this->anam_temp, $this->anam_hbeat, $this->anam_bpsys, $this->anam_bpdia, $this->anam_oxy, $this->anam_gluco, '$this->anam_diag')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag) VALUES (" . $NM_seq_auto . "$this->pati_id, $this->user_id, " . $this->Ini->date_delim . $this->anam_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_strtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_endtime . $this->Ini->date_delim1 . ", '$this->anam_career', $this->anam_caryear, $this->anam_carsem, '$this->anam_reason', '$this->anam_aller', $this->anam_temp, $this->anam_hbeat, $this->anam_bpsys, $this->anam_bpdia, $this->anam_oxy, $this->anam_gluco, '$this->anam_diag')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag) VALUES (" . $NM_seq_auto . "$this->pati_id, $this->user_id, " . $this->Ini->date_delim . $this->anam_date . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_strtime . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->anam_endtime . $this->Ini->date_delim1 . ", '$this->anam_career', $this->anam_caryear, $this->anam_carsem, '$this->anam_reason', '$this->anam_aller', $this->anam_temp, $this->anam_hbeat, $this->anam_bpsys, $this->anam_bpdia, $this->anam_oxy, $this->anam_gluco, '$this->anam_diag')"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_anamnesis_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_anamnesis_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->anam_id =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->anam_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->anam_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->anam_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->anam_id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $this->anam_career = $this->anam_career_before_qstr;
              $this->anam_reason = $this->anam_reason_before_qstr;
              $this->anam_aller = $this->anam_aller_before_qstr;
              $this->anam_diag = $this->anam_diag_before_qstr;
              $this->tratamiento = $this->tratamiento_before_qstr;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->anam_career = $this->anam_career_before_qstr;
              $this->anam_reason = $this->anam_reason_before_qstr;
              $this->anam_aller = $this->anam_aller_before_qstr;
              $this->anam_diag = $this->anam_diag_before_qstr;
              $this->tratamiento = $this->tratamiento_before_qstr;
              $this->sc_insert_on = true; 
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              $this->NM_gera_log_key("incluir");
              $this->NM_gera_log_new();
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->anam_id = substr($this->Db->qstr($this->anam_id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';
          if ($bDelecaoOk)
          {
              $sDetailWhere = "anam_id = " . $this->anam_id . "";
              $this->form_treatment->ini_controle();
              if ($this->form_treatment->temRegistros($sDetailWhere))
              {
                  $bDelecaoOk = false;
                  $sMsgErro   = $this->Ini->Nm_lang['lang_errm_fkvi'];
              }
          }

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where anam_id = $this->anam_id "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_anamnesis_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'on';
  

$insert_table  = 'treatment';      
$insert_fields = array(   
     'anam_id' => $this->anam_id ,
     'treat_instruc' => "'-'",
	 'treat_restdays' => 0,
	'treat_rest' => 0
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_anamnesis_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      
$_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['parms'] = "anam_id?#?$this->anam_id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->anam_id = null === $this->anam_id ? null : substr($this->Db->qstr($this->anam_id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter'] . ")";
          }
      }
//------------ 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "R")
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['iframe_evento']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['iframe_evento'] == "insert") 
          { 
               $this->nmgp_opcao = "novo"; 
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['select'] = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['iframe_evento'] = $this->sc_evento; 
      } 
      if (!isset($this->nmgp_opcao) || empty($this->nmgp_opcao)) 
      { 
          if (empty($this->anam_id)) 
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
          else 
          { 
              $this->nmgp_opcao = "igual"; 
          } 
      } 
      if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->nmgp_opcao != "nada" && (trim($this->anam_id) == "")) 
      { 
          if ($this->nmgp_opcao == "avanca")  
          { 
              $this->nmgp_opcao = "final"; 
          } 
          elseif ($this->nmgp_opcao != "novo")
          { 
              $this->nmgp_opcao = "inicio"; 
          } 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F" && $this->sc_evento == "insert")
      {
          $this->nmgp_opcao = "final";
      }
      $sc_where = trim("");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = ('' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']))
      { 
          $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rt = $this->Db->Execute($nmgp_select) ; 
          if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          $qt_geral_reg_form_anamnesis = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total'] = $qt_geral_reg_form_anamnesis;
          $rt->Close(); 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->anam_id))
          {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $Key_Where = "anam_id < $this->anam_id "; 
              }  
              else  
              {
                  $Key_Where = "anam_id < $this->anam_id "; 
              }
              $Where_Start = (empty($sc_where)) ? " where " . $Key_Where :  $sc_where . " and (" . $Key_Where . ")";
              $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $Where_Start; 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = $rt->fields[0];
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_anamnesis = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total'];
      } 
      if ($this->nmgp_opcao == "inicio") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start']++; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] > $qt_geral_reg_form_anamnesis)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = $qt_geral_reg_form_anamnesis; 
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start']--; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = $qt_geral_reg_form_anamnesis; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_anamnesis) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] = 0;
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] + 1;
      $this->NM_ajax_info['navSummary']['reg_ini'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] + 1; 
      $this->NM_ajax_info['navSummary']['reg_qtd'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_qtd']; 
      $this->NM_ajax_info['navSummary']['reg_tot'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total'] + 1; 
      $this->NM_gera_nav_page(); 
      $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT anam_id, pati_id, user_id, str_replace (convert(char(10),anam_date,102), '.', '-') + ' ' + convert(char(8),anam_date,20), str_replace (convert(char(10),anam_strtime,102), '.', '-') + ' ' + convert(char(8),anam_strtime,20), str_replace (convert(char(10),anam_endtime,102), '.', '-') + ' ' + convert(char(8),anam_endtime,20), anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT anam_id, pati_id, user_id, anam_date, anam_strtime, anam_endtime, anam_career, anam_caryear, anam_carsem, anam_reason, anam_aller, anam_temp, anam_hbeat, anam_bpsys, anam_bpdia, anam_oxy, anam_gluco, anam_diag from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "anam_id = $this->anam_id"; 
              }  
              else  
              {
                  $aWhere[] = "anam_id = $this->anam_id"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "anam_id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->anam_id = $rs->fields[0] ; 
              $this->nmgp_dados_select['anam_id'] = $this->anam_id;
              $this->pati_id = $rs->fields[1] ; 
              $this->nmgp_dados_select['pati_id'] = $this->pati_id;
              $this->user_id = $rs->fields[2] ; 
              $this->nmgp_dados_select['user_id'] = $this->user_id;
              $this->anam_date = $rs->fields[3] ; 
              $this->nmgp_dados_select['anam_date'] = $this->anam_date;
              $this->anam_strtime = $rs->fields[4] ; 
              $this->nmgp_dados_select['anam_strtime'] = $this->anam_strtime;
              $this->anam_endtime = $rs->fields[5] ; 
              $this->nmgp_dados_select['anam_endtime'] = $this->anam_endtime;
              $this->anam_career = $rs->fields[6] ; 
              $this->nmgp_dados_select['anam_career'] = $this->anam_career;
              $this->anam_caryear = $rs->fields[7] ; 
              $this->nmgp_dados_select['anam_caryear'] = $this->anam_caryear;
              $this->anam_carsem = $rs->fields[8] ; 
              $this->nmgp_dados_select['anam_carsem'] = $this->anam_carsem;
              $this->anam_reason = $rs->fields[9] ; 
              $this->nmgp_dados_select['anam_reason'] = $this->anam_reason;
              $this->anam_aller = $rs->fields[10] ; 
              $this->nmgp_dados_select['anam_aller'] = $this->anam_aller;
              $this->anam_temp = trim($rs->fields[11]) ; 
              $this->nmgp_dados_select['anam_temp'] = $this->anam_temp;
              $this->anam_hbeat = trim($rs->fields[12]) ; 
              $this->nmgp_dados_select['anam_hbeat'] = $this->anam_hbeat;
              $this->anam_bpsys = trim($rs->fields[13]) ; 
              $this->nmgp_dados_select['anam_bpsys'] = $this->anam_bpsys;
              $this->anam_bpdia = trim($rs->fields[14]) ; 
              $this->nmgp_dados_select['anam_bpdia'] = $this->anam_bpdia;
              $this->anam_oxy = trim($rs->fields[15]) ; 
              $this->nmgp_dados_select['anam_oxy'] = $this->anam_oxy;
              $this->anam_gluco = trim($rs->fields[16]) ; 
              $this->nmgp_dados_select['anam_gluco'] = $this->anam_gluco;
              $this->anam_diag = $rs->fields[17] ; 
              $this->nmgp_dados_select['anam_diag'] = $this->anam_diag;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->anam_id = (string)$this->anam_id; 
              $this->pati_id = (string)$this->pati_id; 
              $this->user_id = (string)$this->user_id; 
              $this->anam_caryear = (string)$this->anam_caryear; 
              $this->anam_carsem = (string)$this->anam_carsem; 
              $this->anam_temp = (strpos(strtolower($this->anam_temp), "e")) ? (float)$this->anam_temp : $this->anam_temp; 
              $this->anam_temp = (string)$this->anam_temp; 
              $this->anam_hbeat = (strpos(strtolower($this->anam_hbeat), "e")) ? (float)$this->anam_hbeat : $this->anam_hbeat; 
              $this->anam_hbeat = (string)$this->anam_hbeat; 
              $this->anam_bpsys = (strpos(strtolower($this->anam_bpsys), "e")) ? (float)$this->anam_bpsys : $this->anam_bpsys; 
              $this->anam_bpsys = (string)$this->anam_bpsys; 
              $this->anam_bpdia = (strpos(strtolower($this->anam_bpdia), "e")) ? (float)$this->anam_bpdia : $this->anam_bpdia; 
              $this->anam_bpdia = (string)$this->anam_bpdia; 
              $this->anam_oxy = (strpos(strtolower($this->anam_oxy), "e")) ? (float)$this->anam_oxy : $this->anam_oxy; 
              $this->anam_oxy = (string)$this->anam_oxy; 
              $this->anam_gluco = (strpos(strtolower($this->anam_gluco), "e")) ? (float)$this->anam_gluco : $this->anam_gluco; 
              $this->anam_gluco = (string)$this->anam_gluco; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['parms'] = "anam_id?#?$this->anam_id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] < $qt_geral_reg_form_anamnesis;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->anam_id = "";  
              $this->nmgp_dados_form["anam_id"] = $this->anam_id;
              $this->pati_id = "";  
              $this->nmgp_dados_form["pati_id"] = $this->pati_id;
              $this->user_id = "";  
              $this->nmgp_dados_form["user_id"] = $this->user_id;
              $this->anam_date =  date('Y') . "-" . date('m')  . "-" . date('d');
              $this->nmgp_dados_form["anam_date"] = $this->anam_date;
              $this->anam_strtime =  date('H') . ":" . date('i')  . ":" . date('s');
              $this->nmgp_dados_form["anam_strtime"] = $this->anam_strtime;
              $this->anam_endtime = "";  
              $this->anam_endtime_hora = "" ;  
              $this->nmgp_dados_form["anam_endtime"] = $this->anam_endtime;
              $this->anam_career = "";  
              $this->nmgp_dados_form["anam_career"] = $this->anam_career;
              $this->anam_caryear = "";  
              $this->nmgp_dados_form["anam_caryear"] = $this->anam_caryear;
              $this->anam_carsem = "";  
              $this->nmgp_dados_form["anam_carsem"] = $this->anam_carsem;
              $this->anam_reason = "";  
              $this->nmgp_dados_form["anam_reason"] = $this->anam_reason;
              $this->anam_aller = "";  
              $this->nmgp_dados_form["anam_aller"] = $this->anam_aller;
              $this->anam_temp = "";  
              $this->nmgp_dados_form["anam_temp"] = $this->anam_temp;
              $this->anam_hbeat = "";  
              $this->nmgp_dados_form["anam_hbeat"] = $this->anam_hbeat;
              $this->anam_bpsys = "";  
              $this->nmgp_dados_form["anam_bpsys"] = $this->anam_bpsys;
              $this->anam_bpdia = "";  
              $this->nmgp_dados_form["anam_bpdia"] = $this->anam_bpdia;
              $this->anam_oxy = "";  
              $this->nmgp_dados_form["anam_oxy"] = $this->anam_oxy;
              $this->anam_gluco = "";  
              $this->nmgp_dados_form["anam_gluco"] = $this->anam_gluco;
              $this->anam_diag = "";  
              $this->nmgp_dados_form["anam_diag"] = $this->anam_diag;
              $this->tratamiento = "";  
              $this->nmgp_dados_form["tratamiento"] = $this->tratamiento;
              $this->pat_blood = "";  
              $this->nmgp_dados_form["pat_blood"] = $this->pat_blood;
              $this->pat_bod = "";  
              $this->pat_bod_hora = "" ;  
              $this->nmgp_dados_form["pat_bod"] = $this->pat_bod;
              $this->pat_gerens = "";  
              $this->nmgp_dados_form["pat_gerens"] = $this->pat_gerens;
              $this->pat_lname = "";  
              $this->nmgp_dados_form["pat_lname"] = $this->pat_lname;
              $this->pat_name = "";  
              $this->nmgp_dados_form["pat_name"] = $this->pat_name;
              $this->pat_phone = "";  
              $this->nmgp_dados_form["pat_phone"] = $this->pat_phone;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_treatment']['embutida_parms'] = "NM_btn_insert*scinS*scoutNM_btn_update*scinS*scoutNM_btn_delete*scinS*scoutNM_btn_navega*scinN*scout";
  }
// 
//-- 
   function nm_db_retorna($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(anam_id) from " . $this->Ini->nm_tabela . " where anam_id < $this->anam_id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(anam_id) from " . $this->Ini->nm_tabela . " where anam_id < $this->anam_id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(anam_id) from " . $this->Ini->nm_tabela . " where anam_id < $this->anam_id" . $str_where_filter; 
         $rs = $this->Db->Execute("select max(anam_id) from " . $this->Ini->nm_tabela . " where anam_id < $this->anam_id" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->anam_id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "inicio";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_avanca($str_where_param = '') 
   {  
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' and ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(anam_id) from " . $this->Ini->nm_tabela . " where anam_id > $this->anam_id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(anam_id) from " . $this->Ini->nm_tabela . " where anam_id > $this->anam_id" . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(anam_id) from " . $this->Ini->nm_tabela . " where anam_id > $this->anam_id" . $str_where_filter; 
         $rs = $this->Db->Execute("select min(anam_id) from " . $this->Ini->nm_tabela . " where anam_id > $this->anam_id" . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (isset($rs->fields[0]) && $rs->fields[0] != "") 
     { 
         $this->anam_id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
         $rs->Close();  
         $this->nmgp_opcao = "igual";  
         return ;  
     } 
     else 
     { 
        $this->nmgp_opcao = "final";  
        $rs->Close();  
        return ; 
     } 
   } 
// 
//-- 
   function nm_db_inicio($str_where_param = '') 
   {   
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela; 
     $rs = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela);
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if ($rs->fields[0] == 0) 
     { 
         $this->nmgp_opcao = "novo"; 
         $this->nm_flag_saida_novo = "S"; 
         $rs->Close(); 
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return;
     }
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select min(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select min(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter']))
         { 
             $rs->Close();  
             return ; 
         } 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->anam_id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
//-- 
   function nm_db_final($str_where_param = '') 
   { 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $str_where_filter = ('' != $str_where_param) ? ' where ' . $str_where_param : '';
     if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     else  
     {
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select max(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter; 
         $rs = $this->Db->Execute("select max(anam_id) from " . $this->Ini->nm_tabela . " " . $str_where_filter); 
     }  
     if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
     { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
     }  
     if (!isset($rs->fields[0]) || $rs->EOF) 
     { 
         $this->nm_flag_saida_novo = "S"; 
         $this->nmgp_opcao = "novo";  
         $rs->Close();  
         if ($this->aba_iframe)
         {
             $this->nmgp_botoes['exit'] = 'off';
         }
         return ; 
     } 
     $this->anam_id = substr($this->Db->qstr($rs->fields[0]), 1, -1); 
     $rs->Close();  
     $this->nmgp_opcao = "igual";  
     return ;  
   } 
// 
   function NM_gera_log_key($evt) 
   {
       $this->SC_log_arr = array();
       $this->SC_log_atv = true;
       if ($evt == "incluir")
       {
           $this->SC_log_evt = "insert";
       }
       if ($evt == "alterar")
       {
           $this->SC_log_evt = "update";
       }
       if ($evt == "excluir")
       {
           $this->SC_log_evt = "delete";
       }
       $this->SC_log_arr['keys']['anam_id'] =  $this->anam_id;
   }
// 
   function NM_gera_log_old() 
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_select']))
       {
           $nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dados_select'];
           $this->SC_log_arr['fields']['pati_id']['0'] =  $nmgp_dados_select['pati_id'];
           $this->SC_log_arr['fields']['user_id']['0'] =  $nmgp_dados_select['user_id'];
           $this->SC_log_arr['fields']['anam_date']['0'] =  $nmgp_dados_select['anam_date'];
           $this->SC_log_arr['fields']['anam_strtime']['0'] =  $nmgp_dados_select['anam_strtime'];
           $this->SC_log_arr['fields']['anam_endtime']['0'] =  $nmgp_dados_select['anam_endtime'];
           $this->SC_log_arr['fields']['anam_career']['0'] =  $nmgp_dados_select['anam_career'];
           $this->SC_log_arr['fields']['anam_caryear']['0'] =  $nmgp_dados_select['anam_caryear'];
           $this->SC_log_arr['fields']['anam_carsem']['0'] =  $nmgp_dados_select['anam_carsem'];
           $this->SC_log_arr['fields']['anam_reason']['0'] =  $nmgp_dados_select['anam_reason'];
           $this->SC_log_arr['fields']['anam_aller']['0'] =  $nmgp_dados_select['anam_aller'];
           $this->SC_log_arr['fields']['anam_temp']['0'] =  $nmgp_dados_select['anam_temp'];
           $this->SC_log_arr['fields']['anam_hbeat']['0'] =  $nmgp_dados_select['anam_hbeat'];
           $this->SC_log_arr['fields']['anam_bpsys']['0'] =  $nmgp_dados_select['anam_bpsys'];
           $this->SC_log_arr['fields']['anam_bpdia']['0'] =  $nmgp_dados_select['anam_bpdia'];
           $this->SC_log_arr['fields']['anam_oxy']['0'] =  $nmgp_dados_select['anam_oxy'];
           $this->SC_log_arr['fields']['anam_gluco']['0'] =  $nmgp_dados_select['anam_gluco'];
           $this->SC_log_arr['fields']['anam_diag']['0'] =  $nmgp_dados_select['anam_diag'];
           $this->SC_log_arr['fields']['tratamiento']['0'] =  $nmgp_dados_select['tratamiento'];
       }
   }
// 
   function NM_gera_log_new() 
   {
       $this->SC_log_arr['fields']['pati_id']['1'] =  $this->pati_id;
       $this->SC_log_arr['fields']['user_id']['1'] =  $this->user_id;
       $this->SC_log_arr['fields']['anam_date']['1'] =  $this->anam_date;
       $this->SC_log_arr['fields']['anam_strtime']['1'] =  $this->anam_strtime;
       $this->SC_log_arr['fields']['anam_endtime']['1'] =  $this->anam_endtime;
       $this->SC_log_arr['fields']['anam_career']['1'] =  $this->anam_career;
       $this->SC_log_arr['fields']['anam_caryear']['1'] =  $this->anam_caryear;
       $this->SC_log_arr['fields']['anam_carsem']['1'] =  $this->anam_carsem;
       $this->SC_log_arr['fields']['anam_reason']['1'] =  $this->anam_reason;
       $this->SC_log_arr['fields']['anam_aller']['1'] =  $this->anam_aller;
       $this->SC_log_arr['fields']['anam_temp']['1'] =  $this->anam_temp;
       $this->SC_log_arr['fields']['anam_hbeat']['1'] =  $this->anam_hbeat;
       $this->SC_log_arr['fields']['anam_bpsys']['1'] =  $this->anam_bpsys;
       $this->SC_log_arr['fields']['anam_bpdia']['1'] =  $this->anam_bpdia;
       $this->SC_log_arr['fields']['anam_oxy']['1'] =  $this->anam_oxy;
       $this->SC_log_arr['fields']['anam_gluco']['1'] =  $this->anam_gluco;
       $this->SC_log_arr['fields']['anam_diag']['1'] =  $this->anam_diag;
       $this->SC_log_arr['fields']['tratamiento']['1'] =  $this->tratamiento;
   }
// 
   function NM_gera_log_compress() 
   {
       foreach ($this->SC_log_arr['fields'] as $fild => $data_f)
       {
           if ($data_f[0] == $data_f[1] || ($data_f[0] == "" && $data_f[1] == "null"))
           {
               unset($this->SC_log_arr['fields'][$fild]);
           }
       }
   }
// 
   function NM_gera_log_output() 
   {
       $Log_output = "";
       $prim_delim = "";
       $Log_labels = array();
       $Log_labels['pati_id'] =  "Paciente";
       $Log_labels['user_id'] =  "Tratante";
       $Log_labels['anam_date'] =  "Fecha";
       $Log_labels['anam_strtime'] =  "Hora Inicio";
       $Log_labels['anam_endtime'] =  "Hora Final";
       $Log_labels['anam_career'] =  "Carrera";
       $Log_labels['anam_caryear'] =  "Curso";
       $Log_labels['anam_carsem'] =  "Semestre";
       $Log_labels['anam_reason'] =  "Motivo de Conslta";
       $Log_labels['anam_aller'] =  "Alergias";
       $Log_labels['anam_temp'] =  "Temperatura";
       $Log_labels['anam_hbeat'] =  "Ritmo Cardiaco";
       $Log_labels['anam_bpsys'] =  "Presión sistólica";
       $Log_labels['anam_bpdia'] =  "Presión diastólica";
       $Log_labels['anam_oxy'] =  "Oxigenación";
       $Log_labels['anam_gluco'] =  "Glucosa";
       $Log_labels['anam_diag'] =  "Diagnóstico";
       $Log_labels['tratamiento'] =  "Tratamiento";
       foreach ($this->SC_log_arr as $type => $dats)
       {
           if ($type == "keys")
           {
               $Log_output .= "--> keys <-- ";
               foreach ($dats as $key => $data)
               {
                   $Log_output .=  $prim_delim . $key . " : " . $data;
                   $prim_delim  = "||";
               }
           }
           if ($type == "fields")
           {
               $Log_output .= $prim_delim . "--> fields <-- ";
               $prim_delim = "";
               if (empty($dats) && $this->SC_log_evt == "update")
               {
                   return;
               }
               foreach ($dats as $key => $data)
               {
                   foreach ($data as $tp => $val)
                   {
                      $tpok = ($tp == 0) ? " (old) " : " (new) ";
                      $Log_output .= $prim_delim . $key . $tpok . " : " . $val;
                      $prim_delim  = "||";
                   }
                   $Log_output .= $prim_delim . $key . " (label) " . " : " . $Log_labels[$key];
               }
           }
       }
       $this->NM_gera_log_insert("Scriptcase", $this->SC_log_evt, $Log_output);
   }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = 1;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['reg_start'] + 1;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (!isset($this->Ini->Str_toolbarnav_separator))
           {
               $this->Ini->Str_toolbarnav_separator = "";
           }
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function pati_id_onChange()
{
$_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'on';
  
$original_pati_id = $this->pati_id;
$original_anam_career = $this->anam_career;
$original_anam_carsem = $this->anam_carsem;
$original_pat_bod = $this->pat_bod;
$original_pat_name = $this->pat_name;
$original_pat_lname = $this->pat_lname;
$original_pat_gerens = $this->pat_gerens;
$original_pat_phone = $this->pat_phone;
$original_pat_blood = $this->pat_blood;



$check_sql = "SELECT pati_name, pati_lname, pati_docnum, pati_bod, pati_phone, pati_career, pati_caryerar, pati_carsem, gerens_id, btyp_id"
   . " FROM patients"
   . " WHERE pati_id = '" . $this->pati_id  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($SCrx = $this->Db->Execute($nm_select)) 
      { 
          $SCy = 0; 
          $nm_count = $SCrx->FieldCount();
          while (!$SCrx->EOF)
          { 
                 for ($SCx = 0; $SCx < $nm_count; $SCx++)
                 { 
                      $this->rs[$SCy] [$SCx] = $SCrx->fields[$SCx];
                 }
                 $SCy++; 
                 $SCrx->MoveNext();
          } 
          $SCrx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 


if (isset($this->rs[0][0]))     
{
    $this->anam_career  = $this->rs[0][5];
    $this->anam_carsem  = $this->rs[0][7];
	$this->pat_bod  = $this->rs[0][3];
	$this->pat_name  = $this->rs[0][0];
	$this->pat_lname  = $this->rs[0][1];
	$this->pat_gerens  = $this->rs[0][8];
	$this->pat_phone  = $this->rs[0][4];
	$btyp_id  = $this->rs[0][9];
	$this->pat_blood  = $this->rs[0][9];

}
		else     
{
		    $other_field  = '';
    $other_region  = '';
}


$modificado_pati_id = $this->pati_id;
$modificado_anam_career = $this->anam_career;
$modificado_anam_carsem = $this->anam_carsem;
$modificado_pat_bod = $this->pat_bod;
$modificado_pat_name = $this->pat_name;
$modificado_pat_lname = $this->pat_lname;
$modificado_pat_gerens = $this->pat_gerens;
$modificado_pat_phone = $this->pat_phone;
$modificado_pat_blood = $this->pat_blood;
$this->nm_formatar_campos('pati_id', 'anam_career', 'anam_carsem', 'pat_bod', 'pat_name', 'pat_lname', 'pat_gerens', 'pat_phone', 'pat_blood');
if ($original_pati_id !== $modificado_pati_id || isset($this->nmgp_cmp_readonly['pati_id']) || (isset($bFlagRead_pati_id) && $bFlagRead_pati_id))
{
    $this->ajax_return_values_pati_id(true);
}
if ($original_anam_career !== $modificado_anam_career || isset($this->nmgp_cmp_readonly['anam_career']) || (isset($bFlagRead_anam_career) && $bFlagRead_anam_career))
{
    $this->ajax_return_values_anam_career(true);
}
if ($original_anam_carsem !== $modificado_anam_carsem || isset($this->nmgp_cmp_readonly['anam_carsem']) || (isset($bFlagRead_anam_carsem) && $bFlagRead_anam_carsem))
{
    $this->ajax_return_values_anam_carsem(true);
}
if ($original_pat_bod !== $modificado_pat_bod || isset($this->nmgp_cmp_readonly['pat_bod']) || (isset($bFlagRead_pat_bod) && $bFlagRead_pat_bod))
{
    $this->ajax_return_values_pat_bod(true);
}
if ($original_pat_name !== $modificado_pat_name || isset($this->nmgp_cmp_readonly['pat_name']) || (isset($bFlagRead_pat_name) && $bFlagRead_pat_name))
{
    $this->ajax_return_values_pat_name(true);
}
if ($original_pat_lname !== $modificado_pat_lname || isset($this->nmgp_cmp_readonly['pat_lname']) || (isset($bFlagRead_pat_lname) && $bFlagRead_pat_lname))
{
    $this->ajax_return_values_pat_lname(true);
}
if ($original_pat_gerens !== $modificado_pat_gerens || isset($this->nmgp_cmp_readonly['pat_gerens']) || (isset($bFlagRead_pat_gerens) && $bFlagRead_pat_gerens))
{
    $this->ajax_return_values_pat_gerens(true);
}
if ($original_pat_phone !== $modificado_pat_phone || isset($this->nmgp_cmp_readonly['pat_phone']) || (isset($bFlagRead_pat_phone) && $bFlagRead_pat_phone))
{
    $this->ajax_return_values_pat_phone(true);
}
if ($original_pat_blood !== $modificado_pat_blood || isset($this->nmgp_cmp_readonly['pat_blood']) || (isset($bFlagRead_pat_blood) && $bFlagRead_pat_blood))
{
    $this->ajax_return_values_pat_blood(true);
}
$this->NM_ajax_info['event_field'] = 'pati';
form_anamnesis_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_anamnesis']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_anamnesis_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
        include_once("form_anamnesis_form0.php");
        include_once("form_anamnesis_form1.php");
        $this->hideFormPages();
 }

        function initFormPages() {
                $this->Ini->nm_page_names = array(
                        'Atención' => '0',
                        'Tratamiento' => '1',
                );

                $this->Ini->nm_page_blocks = array(
                        'Atención' => array(
                                0 => 'on',
                                1 => 'on',
                                2 => 'on',
                                3 => 'on',
                        ),
                        'Tratamiento' => array(
                                4 => 'on',
                        ),
                );

                $this->Ini->nm_block_page = array(
                        0 => 'Atención',
                        1 => 'Atención',
                        2 => 'Atención',
                        3 => 'Atención',
                        4 => 'Tratamiento',
                );

                if (!empty($this->Ini->nm_hidden_blocos)) {
                        foreach ($this->Ini->nm_hidden_blocos as $blockNo => $blockStatus) {
                                if ('off' == $blockStatus) {
                                        $this->Ini->nm_page_blocks[ $this->Ini->nm_block_page[$blockNo] ][$blockNo] = 'off';
                                }
                        }
                }

                foreach ($this->Ini->nm_page_blocks as $pageName => $pageBlocks) {
                        $hasDisplayedBlock = false;

                        foreach ($pageBlocks as $blockNo => $blockStatus) {
                                if ('on' == $blockStatus) {
                                        $hasDisplayedBlock = true;
                                }
                        }

                        if (!$hasDisplayedBlock) {
                                $this->Ini->nm_hidden_pages[$pageName] = 'off';
                        }
                }
        } // initFormPages

        function hideFormPages() {
                if (!empty($this->Ini->nm_hidden_pages)) {
?>
<script type="text/javascript">
$(function() {
        scResetPagesDisplay();
<?php
                        foreach ($this->Ini->nm_hidden_pages as $pageName => $pageStatus) {
                                if ('off' == $pageStatus) {
?>
        scHidePage("<?php echo $this->Ini->nm_page_names[$pageName]; ?>");
<?php
                                }
                        }
?>
        scCheckNoPageSelected();
});
</script>
<?php
                }
        } // hideFormPages

    function form_format_readonly($field, $value)
    {
        $result = $value;

        $this->form_highlight_search($result, $field, $value);

        return $result;
    }

    function form_highlight_search(&$result, $field, $value)
    {
        if ($this->proc_fast_search) {
            $this->form_highlight_search_quicksearch($result, $field, $value);
        }
    }

    function form_highlight_search_quicksearch(&$result, $field, $value)
    {
        $searchOk = false;
        if ('SC_all_Cmp' == $this->nmgp_fast_search && in_array($field, array("anam_date", "anam_strtime", "anam_reason", "anam_diag", "pati_id", "anam_career", "anam_carsem", "anam_bpsys", "anam_bpdia", "anam_hbeat", "anam_temp", "anam_oxy", "anam_gluco", "anam_aller", "tratamiento"))) {
            $searchOk = true;
        }
        elseif ($field == $this->nmgp_fast_search && in_array($field, array("anam_date", "anam_strtime", "anam_reason", "anam_diag", "pati_id", "anam_career", "anam_carsem", "anam_bpsys", "anam_bpdia", "anam_hbeat", "anam_temp", "anam_oxy", "anam_gluco", "anam_aller", "tratamiento"))) {
            $searchOk = true;
        }

        if (!$searchOk || '' == $this->nmgp_arg_fast_search) {
            return;
        }

        $htmlIni = '<div class="highlight" style="background-color: #fafaca; display: inline-block">';
        $htmlFim = '</div>';

        if ('qp' == $this->nmgp_cond_fast_search) {
            $keywords = preg_quote($this->nmgp_arg_fast_search, '/');
            $result = preg_replace('/'. $keywords .'/i', $htmlIni . '$0' . $htmlFim, $result);
        } elseif ('eq' == $this->nmgp_cond_fast_search) {
            if (strcasecmp($this->nmgp_arg_fast_search, $value) == 0) {
                $result = $htmlIni. $result .$htmlFim;
            }
        }
    }


    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

function sc_file_size($file, $format = false)
{
    if ('' == $file) {
        return '';
    }
    if (!@is_file($file)) {
        return '';
    }
    $fileSize = @filesize($file);
    if ($format) {
        $suffix = '';
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' KB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' MB';
        }
        if (1024 >= $fileSize) {
            $fileSize /= 1024;
            $suffix    = ' GB';
        }
        $fileSize = $fileSize . $suffix;
    }
    return $fileSize;
}


 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_pati_id()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pati_id'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_pat_blood()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_blood'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_pat_gerens()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'] = array(); 
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['Lookup_pat_gerens'][] = $rs->fields[0];
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
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($in_fields, $arg_search, $data_search)
   {
      $fields = (strpos($in_fields, "SC_all_Cmp") !== false) ? array("SC_all_Cmp") : explode(";", $in_fields);
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_anamnesis_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      foreach ($fields as $field) {
          if ($field == "SC_all_Cmp" || $field == "anam_date") 
          {
              $this->SC_monta_condicao($comando, "anam_date", $arg_search, $data_search, "DATE", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_strtime") 
          {
              $this->SC_monta_condicao($comando, "anam_strtime", $arg_search, $data_search, "TIME", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_reason") 
          {
              $this->SC_monta_condicao($comando, "anam_reason", $arg_search, $data_search, "TEXT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_diag") 
          {
              $this->SC_monta_condicao($comando, "anam_diag", $arg_search, $data_search, "TEXT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "pati_id") 
          {
              $data_lookup = $this->SC_lookup_pati_id($arg_search, $data_search);
              if (is_array($data_lookup) && !empty($data_lookup)) 
              {
                  $this->SC_monta_condicao($comando, "pati_id", $arg_search, $data_lookup, "INT", false);
              }
          }
          if ($field == "SC_all_Cmp" || $field == "anam_career") 
          {
              $this->SC_monta_condicao($comando, "anam_career", $arg_search, $data_search, "VARCHAR", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_carsem") 
          {
              $this->SC_monta_condicao($comando, "anam_carsem", $arg_search, str_replace(",", ".", $data_search), "INT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_bpsys") 
          {
              $this->SC_monta_condicao($comando, "anam_bpsys", $arg_search, str_replace(",", ".", $data_search), "FLOAT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_bpdia") 
          {
              $this->SC_monta_condicao($comando, "anam_bpdia", $arg_search, str_replace(",", ".", $data_search), "FLOAT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_hbeat") 
          {
              $this->SC_monta_condicao($comando, "anam_hbeat", $arg_search, str_replace(",", ".", $data_search), "FLOAT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_temp") 
          {
              $this->SC_monta_condicao($comando, "anam_temp", $arg_search, str_replace(",", ".", $data_search), "FLOAT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_oxy") 
          {
              $this->SC_monta_condicao($comando, "anam_oxy", $arg_search, str_replace(",", ".", $data_search), "FLOAT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_gluco") 
          {
              $this->SC_monta_condicao($comando, "anam_gluco", $arg_search, str_replace(",", ".", $data_search), "FLOAT", false);
          }
          if ($field == "SC_all_Cmp" || $field == "anam_aller") 
          {
              $this->SC_monta_condicao($comando, "anam_aller", $arg_search, $data_search, "TEXT", false);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_anamnesis = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['total'] = $qt_geral_reg_form_anamnesis;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_anamnesis_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_anamnesis_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="", $tp_unaccent=false)
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_accent = $this->Ini->Nm_accent_no;
      if ($tp_unaccent) {
          $Nm_accent = $this->Ini->Nm_accent_yes;
      }
      $nm_numeric[] = "anam_id";$nm_numeric[] = "pati_id";$nm_numeric[] = "user_id";$nm_numeric[] = "anam_caryear";$nm_numeric[] = "anam_carsem";$nm_numeric[] = "anam_temp";$nm_numeric[] = "anam_hbeat";$nm_numeric[] = "anam_bpsys";$nm_numeric[] = "anam_bpdia";$nm_numeric[] = "anam_oxy";$nm_numeric[] = "anam_gluco";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR(255))";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas["anam_date"] = "date";$Nm_datas["anam_strtime"] = "time";$Nm_datas["anam_endtime"] = "time";$Nm_datas[""] = "date";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_progress))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $Nm_accent['cmp_i'] . $nome . $Nm_accent['cmp_f'] . $nm_fim_lower . $Nm_accent['cmp_apos'] . " not" . $op_like . $nm_ini_lower . "'%" . $Nm_accent['arg_i'] . $campo . $Nm_accent['arg_f'] . "%'" . $nm_fim_lower . $Nm_accent['arg_apos'];
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_pati_id($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT pati_docnum + \" - \" + pati_name + \" - \" + pati_lname, pati_id FROM patients WHERE (#cmp_ipati_docnum + \" - \" + pati_name + \" - \" + pati_lname#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(pati_docnum,\" - \",pati_name,\" - \",pati_lname), pati_id FROM patients WHERE (#cmp_iconcat(pati_docnum,\" - \",pati_name,\" - \",pati_lname)#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT pati_docnum&\" - \"&pati_name&\" - \"&pati_lname, pati_id FROM patients WHERE (#cmp_ipati_docnum&\" - \"&pati_name&\" - \"&pati_lname#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT pati_docnum||\" - \"||pati_name||\" - \"||pati_lname, pati_id FROM patients WHERE (#cmp_ipati_docnum||\" - \"||pati_name||\" - \"||pati_lname#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT pati_docnum||\" - \"||pati_name||\" - \"||pati_lname, pati_id FROM patients WHERE (#cmp_ipati_docnum||\" - \"||pati_name||\" - \"||pati_lname#cmp_f#cmp_apos LIKE '%#arg_i" . $campo . "#arg_f%'#arg_apos)" ; 
      } 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "LIKE '#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "NOT LIKE '%#arg_i" . $campo . "#arg_f%'", $nm_comando);
       }
       if ($condicao == "df")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "> '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", ">= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "< '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%#arg_i" . $campo . "#arg_f%'", "<= '#arg_i" . $campo . "#arg_f'", $nm_comando);
       }
       $nm_comando = str_replace(array('#cmp_i','#cmp_f','#cmp_apos','#arg_i','#arg_f','#arg_apos'), array('','','','','',''), $nm_comando); 
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_anamnesis_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_anamnesis_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_anamnesis_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
    function getButtonIds($buttonName) {
        switch ($buttonName) {
            case "new":
                return array("sc_b_new_t.sc-unique-btn-1");
                break;
            case "insert":
                return array("sc_b_ins_t.sc-unique-btn-2");
                break;
            case "bcancelar":
                return array("sc_b_sai_t.sc-unique-btn-3");
                break;
            case "update":
                return array("sc_b_upd_t.sc-unique-btn-4");
                break;
            case "delete":
                return array("sc_b_del_t.sc-unique-btn-5");
                break;
            case "breload":
                return array("sc_b_reload_t.sc-unique-btn-6");
                break;
            case "help":
                return array("sc_b_hlp_t");
                break;
            case "exit":
                return array("sc_b_sai_t.sc-unique-btn-7", "sc_b_sai_t.sc-unique-btn-8", "sc_b_sai_t.sc-unique-btn-10", "sc_b_sai_t.sc-unique-btn-9", "sc_b_sai_t.sc-unique-btn-11");
                break;
            case "birpara":
                return array("brec_b");
                break;
            case "first":
                return array("sc_b_ini_b.sc-unique-btn-12");
                break;
            case "back":
                return array("sc_b_ret_b.sc-unique-btn-13");
                break;
            case "forward":
                return array("sc_b_avc_b.sc-unique-btn-14");
                break;
            case "last":
                return array("sc_b_fim_b.sc-unique-btn-15");
                break;
        }

        return array($buttonName);
    } // getButtonIds

    function displayAppHeader()
    {
        if ($this->Embutida_call) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['mostra_cab']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['mostra_cab'] == "N") {
            return;
        }
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['dashboard_info']['maximized']) {
            return;
        }
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['link_info']['compact_mode']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['link_info']['compact_mode']) {
            return;
        }
?>
    <tr><td class="sc-app-header">
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "Atenciones Enfermería"; } else { echo "Atenciones Enfermería"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div>
    </td></tr>
<?php
    }

    function displayAppFooter()
    {
    }

    function displayAppToolbars()
    {
        if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['run_iframe'] != "R") {
        } else {
            return false;
        }
        return true;
    } // displayAppToolbars

    function displayTopToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayTopToolbar

    function displayBottomToolbar()
    {
        if (!$this->displayAppToolbars()) {
            return;
        }
    } // displayBottomToolbar

    function scGetColumnOrderRule($fieldName, &$orderColName, &$orderColOrient, &$orderColRule)
    {
        $sortRule = 'nosort';
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['ordem_cmp'] == $fieldName) {
            $orderColName = $fieldName;
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_anamnesis']['ordem_ord'] == " desc") {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
                $orderColRule = $sortRule = 'desc';
            } else {
                $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
                $orderColRule = $sortRule = 'asc';
            }
        }
        return $sortRule;
    }

    function scGetColumnOrderIcon($fieldName, $sortRule)
    {        if ('desc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('asc' == $sortRule) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } elseif ('' != $this->Ini->Label_sort) {
            return "<img src=\"" . $this->Ini->path_img_global . "/" . $this->Ini->Label_sort . "\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-" . $fieldName . "\" />";
        } else {
            return '';
        }
    }

    function scIsFieldNumeric($fieldName)
    {
        switch ($fieldName) {
            case "anam_carsem":
                return true;
            case "anam_bpsys":
                return true;
            case "anam_bpdia":
                return true;
            case "anam_hbeat":
                return true;
            case "anam_temp":
                return true;
            case "anam_oxy":
                return true;
            case "anam_gluco":
                return true;
            case "anam_id":
                return true;
            case "anam_caryear":
                return true;
            default:
                return false;
        }
        return false;
    }

    function scGetDefaultFieldOrder($fieldName)
    {
        switch ($fieldName) {
            case "anam_date":
                return 'desc';
            case "anam_strtime":
                return 'desc';
            case "pati_id":
                return 'desc';
            case "anam_carsem":
                return 'desc';
            case "anam_bpsys":
                return 'desc';
            case "anam_bpdia":
                return 'desc';
            case "anam_hbeat":
                return 'desc';
            case "anam_oxy":
                return 'desc';
            case "anam_gluco":
                return 'desc';
            case "anam_id":
                return 'desc';
            case "user_id":
                return 'desc';
            case "anam_endtime":
                return 'desc';
            case "anam_caryear":
                return 'desc';
            default:
                return 'asc';
        }
        return 'asc';
    }
}
?>
