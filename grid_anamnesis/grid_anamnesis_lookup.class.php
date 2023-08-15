<?php
class grid_anamnesis_lookup
{
//  
   function lookup_num_doc(&$conteudo , $pati_id, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      if (trim($pati_id) === "")
      { 
          $conteudo = "&nbsp;";
          return ; 
      } 
      $conteudo = "";
      $nm_comando = "SELECT pati_docnum 
FROM patients 
WHERE pati_id = '$pati_id' 
ORDER BY pati_docnum" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          while (!$rx->EOF) 
          { 
                 if (isset($rx->fields[0]))
                 { 
                     $rx->fields[0] = str_replace(',', '.', $rx->fields[0]); 
                     $nm_array_retorno_lookup[$a][0] = trim($rx->fields[0]);
                     $a++; 
                     if ($y == 1)
                     { 
                          $conteudo .= "<br>";
                          $y = 0; 
                     } 
                     if ($y != 0)
                     { 
                          $conteudo .= "";
                     } 
                     $y++; 
                     $nm_tmp_form = trim($rx->fields[0]); 
                     $conteudo .= $nm_tmp_form;
                 } 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
   } 
//  
   function lookup_pati_id(&$conteudo , $pati_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $pati_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;" || trim($pati_id) === "" || trim($pati_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT pati_name + \"  \" + pati_lname  FROM patients where pati_id = $pati_id order by pati_name, pati_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(pati_name, \"  \",  pati_lname)  FROM patients where pati_id = $pati_id order by pati_name, pati_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT pati_name&\"  \"&pati_lname  FROM patients where pati_id = $pati_id order by pati_name, pati_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT pati_name||\"  \"||pati_lname  FROM patients where pati_id = $pati_id order by pati_name, pati_lname" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT pati_name||\"  \"||pati_lname  FROM patients where pati_id = $pati_id order by pati_name, pati_lname" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_user_id(&$conteudo , $user_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $user_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;" || trim($user_id) === "" || trim($user_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT user_name + \" \" + user_lname  FROM Users where user_id = $user_id order by user_name, user_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(user_name, \" \" ,user_lname)  FROM Users where user_id = $user_id order by user_name, user_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT user_name&\" \"&user_lname  FROM Users where user_id = $user_id order by user_name, user_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT user_name||\" \"||user_lname  FROM Users where user_id = $user_id order by user_name, user_lname" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT user_name||\" \"||user_lname  FROM Users where user_id = $user_id order by user_name, user_lname" ; 
      } 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
}
?>
