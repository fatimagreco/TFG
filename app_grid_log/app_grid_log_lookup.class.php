<?php
class app_grid_log_lookup
{
//  
   function lookup_usr_name(&$conteudo , $username, &$nm_array_retorno_lookup) 
   {
      $nm_array_retorno_lookup = array();
      $conteudo = "";
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_comando = "SELECT user_name + \" \" + user_lname  FROM Users  WHERE user_docnum = '" . substr($this->Db->qstr($username), 1 , -1) . "'  ORDER BY user_name, user_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nm_comando = "SELECT concat(user_name,\" \" , user_lname)  FROM Users  WHERE user_docnum = '" . substr($this->Db->qstr($username), 1 , -1) . "'  ORDER BY user_name, user_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "SELECT user_name&\" \"&user_lname  FROM Users  WHERE user_docnum = '" . substr($this->Db->qstr($username), 1 , -1) . "'  ORDER BY user_name, user_lname" ; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      { 
          $nm_comando = "SELECT user_name||\" \"||user_lname  FROM Users  WHERE user_docnum = '" . substr($this->Db->qstr($username), 1 , -1) . "'  ORDER BY user_name, user_lname" ; 
      } 
      else 
      { 
          $nm_comando = "SELECT user_name||\" \"||user_lname  FROM Users  WHERE user_docnum = '" . substr($this->Db->qstr($username), 1 , -1) . "'  ORDER BY user_name, user_lname" ; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          $y = 0; 
          $a = 0; 
          $x = 0; 
          $nm_tmp_campos_select = explode(",", "user_name,\" \" , user_lname"); 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 if ($y == 1)
                 { 
                     $conteudo .= "<br>";
                     $y = 0; 
                     $x = 0; 
                 } 
                 $y++; 
                 if ($x != 0)
                 { 
                     $conteudo .= "";
                 } 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $nm_array_retorno_lookup[$a] [trim($nm_tmp_campos_select[$x])] = trim($rx->fields[$x]);
                        $nm_array_retorno_lookup[$a] [$x]= trim($rx->fields[$x]);
                        if ($x != 0)
                        { 
                            $conteudo .= "&nbsp;";
                        } 
                        $conteudo .= trim($rx->fields[$x]);
                 }
                 $a++; 
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
}
?>
