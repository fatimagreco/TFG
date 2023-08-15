<?php
class grid_vw_anamnesis_lookup
{
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
          $nm_comando = "SELECT concat(user_name,\" \", user_lname)  FROM Users where user_id = $user_id order by user_name, user_lname" ; 
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
//  
   function lookup_user_id_user_id(&$conteudo , $user_id) 
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
          $nm_comando = "SELECT concat(user_name,\" \", user_lname)  FROM Users where user_id = $user_id order by user_name, user_lname" ; 
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
