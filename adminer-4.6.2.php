<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.6.2
*/error_reporting(6135);$Wc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Wc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$_i=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($_i)$$X=$_i;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$f;return$f;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($u){$ke=substr($u,-1);return
str_replace($ke.$ke,$ke,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($kg,$Wc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($kg)){foreach($X
as$Zd=>$W){unset($kg[$y][$Zd]);if(is_array($W)){$kg[$y][stripslashes($Zd)]=$W;$kg[]=&$kg[$y][stripslashes($Zd)];}else$kg[$y][stripslashes($Zd)]=($Wc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Oa=false){static$ki=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Oa?array_flip($ki):$ki));}function
min_version($Qi,$ye="",$g=null){global$f;if(!$g)$g=$f;$fh=$g->server_info;if($ye&&preg_match('~([\d.]+)-MariaDB~',$fh,$B)){$fh=$B[1];$Qi=$ye;}return(version_compare($fh,$Qi)>=0);}function
charset($f){return(min_version("5.5.3",0,$f)?"utf8mb4":"utf8");}function
script($oh,$ji="\n"){return"<script".nonce().">$oh</script>$ji";}function
script_src($Ei){return"<script src='".h($Ei)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($C,$Y,$fb,$ge="",$mf="",$kb="",$he=""){$I="<input type='checkbox' name='$C' value='".h($Y)."'".($fb?" checked":"").($he?" aria-labelledby='$he'":"").">".($mf?script("qsl('input').onclick = function () { $mf };",""):"");return($ge!=""||$kb?"<label".($kb?" class='$kb'":"").">$I".h($ge)."</label>":$I);}function
optionlist($sf,$Zg=null,$Ii=false){$I="";foreach($sf
as$Zd=>$W){$tf=array($Zd=>$W);if(is_array($W)){$I.='<optgroup label="'.h($Zd).'">';$tf=$W;}foreach($tf
as$y=>$X)$I.='<option'.($Ii||is_string($y)?' value="'.h($y).'"':'').(($Ii||is_string($y)?(string)$y:$X)===$Zg?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($C,$sf,$Y="",$lf=true,$he=""){if($lf)return"<select name='".h($C)."'".($he?" aria-labelledby='$he'":"").">".optionlist($sf,$Y)."</select>".(is_string($lf)?script("qsl('select').onchange = function () { $lf };",""):"");$I="";foreach($sf
as$y=>$X)$I.="<label><input type='radio' name='".h($C)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ka,$sf,$Y="",$lf="",$Wf=""){$Oh=($sf?"select":"input");return"<$Oh$Ka".($sf?"><option value=''>$Wf".optionlist($sf,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Wf'>").($lf?script("qsl('$Oh').onchange = $lf;",""):"");}function
confirm($He="",$ah="qsl('input')"){return
script("$ah.onclick = function () { return confirm('".($He?js_escape($He):lang(0))."'); };","");}function
print_fieldset($t,$pe,$Ti=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$pe</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Ti?"":" class='hidden'").">\n";}function
bold($Wa,$kb=""){return($Wa?" class='active $kb'":($kb?" class='$kb'":""));}function
odd($I=' class="odd"'){static$s=0;if(!$I)$s=-1;return($s++%2?$I:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($y,$X=null){static$Xc=true;if($Xc)echo"{";if($y!=""){echo($Xc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$Xc=false;}else{echo"\n}\n";$Xc=true;}}function
ini_bool($Md){$X=ini_get($Md);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Pi,$N,$V,$F){$_SESSION["pwds"][$Pi][$N][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($Q){global$f;return$f->quote($Q);}function
get_vals($G,$d=0){global$f;$I=array();$H=$f->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$d];}return$I;}function
get_key_vals($G,$g=null,$Xh=0,$ih=true){global$f;if(!is_object($g))$g=$f;$I=array();$g->timeout=$Xh;$H=$g->query($G);$g->timeout=0;if(is_object($H)){while($J=$H->fetch_row()){if($ih)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$g=null,$n="<p class='error'>"){global$f;$zb=(is_object($g)?$g:$f);$I=array();$H=$zb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($g)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$I;}function
unique_array($J,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$I=array();foreach($v["columns"]as$y){if(!isset($J[$y]))continue
2;$I[$y]=$J[$y];}return$I;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($y);}function
where($Z,$p=array()){global$f,$x;$I=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$d=escape_key($y);$I[]=$d.($x=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$d = ".q($X)." COLLATE ".charset($f)."_bin";}foreach((array)$Z["null"]as$y)$I[]=escape_key($y)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$p=array()){parse_str($X,$db);remove_slashes(array(&$db));return
where($db,$p);}function
where_link($s,$d,$Y,$of="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($d)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$of:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($e,$p,$L=array()){$I="";foreach($e
as$y=>$X){if($L&&!in_array(idf_escape($y),$L))continue;$Ha=convert_field($p[$y]);if($Ha)$I.=", $Ha AS ".idf_escape($y);}return$I;}function
cookie($C,$Y,$se=2592000){global$ba;return
header("Set-Cookie: $C=".urlencode($Y).($se?"; expires=".gmdate("D, d M Y H:i:s",time()+$se)." GMT":"")."; path=".preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Pi,$N,$V,$l=null){global$fc;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($fc))."|username|".($l!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Pi!="server"||$N!=""?urlencode($Pi)."=".urlencode($N)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$He=null){if($He!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$He;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($G,$A,$He,$wg=true,$Dc=true,$Oc=false,$Wh=""){global$f,$n,$b;if($Dc){$wh=microtime(true);$Oc=!$f->query($G);$Wh=format_time($wh);}$rh="";if($G)$rh=$b->messageQuery($G,$Wh,$Oc);if($Oc){$n=error().$rh.script("messagesPrint();");return
false;}if($wg)redirect($A,$He.$rh);return
true;}function
queries($G){global$f;static$pg=array();static$wh;if(!$wh)$wh=microtime(true);if($G===null)return
array(implode("\n",$pg),format_time($wh));$pg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$f->query($G);}function
apply_queries($G,$T,$_c='table'){foreach($T
as$R){if(!queries("$G ".$_c($R)))return
false;}return
true;}function
queries_redirect($A,$He,$wg){list($pg,$Wh)=queries(null);return
query_redirect($pg,$A,$He,$wg,false,!$wg,$Wh);}function
format_time($wh){return
lang(1,max(0,microtime(true)-$wh));}function
remove_from_uri($Hf=""){return
substr(preg_replace("~(?<=[?&])($Hf".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$Kb){return" ".($E==$Kb?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($y,$Sb=false){$Uc=$_FILES[$y];if(!$Uc)return
null;foreach($Uc
as$y=>$X)$Uc[$y]=(array)$X;$I='';foreach($Uc["error"]as$y=>$n){if($n)return$n;$C=$Uc["name"][$y];$ei=$Uc["tmp_name"][$y];$Ab=file_get_contents($Sb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$ei":$ei);if($Sb){$wh=substr($Ab,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$wh,$Bg))$Ab=iconv("utf-16","utf-8",$Ab);elseif($wh=="\xEF\xBB\xBF")$Ab=substr($Ab,3);$I.=$Ab."\n\n";}else$I.=$Ab;}return$I;}function
upload_error($n){$Ee=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($Ee?" ".lang(3,$Ee):""):lang(4));}function
repeat_pattern($Uf,$qe){return
str_repeat("$Uf{0,65535}",$qe/65535)."$Uf{0,".($qe%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$qe=80,$Ch=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$qe).")($)?)u",$Q,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$qe).")($)?)",$Q,$B);return
h($B[1]).$Ch.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($kg,$Cd=array()){$I=false;while(list($y,$X)=each($kg)){if(!in_array($y,$Cd)){if(is_array($X)){foreach($X
as$Zd=>$W)$kg[$y."[$Zd]"]=$W;}else{$I=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$Pc=false){$I=table_status($R,$Pc);return($I?$I:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$I=array();foreach($b->foreignKeys($R)as$q){foreach($q["source"]as$X)$I[$X][]=$q;}return$I;}function
enum_input($U,$Ka,$o,$Y,$uc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$_e);$I=($uc!==null?"<label><input type='$U'$Ka value='$uc'".((is_array($Y)?in_array($uc,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($_e[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$fb=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$I.=" <label><input type='$U'$Ka value='".($s+1)."'".($fb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$I;}function
input($o,$Y,$r){global$vi,$b,$x;$C=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Fa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Fa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Fa);$r="json";}$Fg=($x=="mssql"&&$o["auto_increment"]);if($Fg&&!$_POST["save"])$r=null;$kd=(isset($_GET["select"])||$Fg?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ka=" name='fields[$C]'";if($o["type"]=="enum")echo
nbsp($kd[""])."<td>".$b->editInput($_GET["edit"],$o,$Ka,$Y);else{$td=(in_array($r,$kd)||isset($kd[$r]));echo(count($kd)>1?"<select name='function[$C]'>".optionlist($kd,$r===null||$td?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):nbsp(reset($kd))).'<td>';$Od=$b->editInput($_GET["edit"],$o,$Ka,$Y);if($Od!="")echo$Od;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ka value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ka value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$_e);foreach($_e[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$fb=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$s]' value='".(1<<$s)."'".($fb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'>";elseif(($Uh=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($Uh&&$x!="sqlite")$Ka.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ka.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ka>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ka cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Ge=(!preg_match('~int~',$o["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($vi[$o["type"]]?$vi[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Ge+=7;echo"<input".((!$td||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Ge?" data-maxlength='$Ge'":"").(preg_match('~char|binary~',$o["type"])&&$Ge>20?" size='40'":"")."$Ka>";}echo$b->editHint($_GET["edit"],$o,$Y);$Xc=0;foreach($kd
as$y=>$X){if($y===""||!$X)break;$Xc++;}if($Xc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Xc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Uc=get_file("fields-$u");if(!is_string($Uc))return
false;return$m->quoteBinary($Uc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$I=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$C=bracket_escape($y,1);$I[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$I;}function
search_tables(){global$b,$f;$_GET["where"][0]["val"]=$_POST["query"];$ch="<ul>\n";foreach(table_status('',true)as$R=>$S){$C=$b->tableName($S);if(isset($S["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$H=$f->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$H||$H->fetch_row()){$gg="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>";echo"$ch<li>".($H?$gg:"<p class='error'>$gg: ".error())."\n";$ch="";}}}echo($ch?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($Ad,$Qe=false){global$b;$I=$b->dumpHeaders($Ad,$Qe);$Ef=$_POST["output"];if($Ef!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Ad).".$I".($Ef!="file"&&!preg_match('~[^0-9a-z]~',$Ef)?".$Ef":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$J[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($r,$d){return($r?($r=="unixepoch"?"DATETIME($d, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$d)"):$d);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$Vc=@tempnam("","");if(!$Vc)return
false;$I=dirname($Vc);unlink($Vc);}}return$I;}function
file_open_lock($Vc){$id=@fopen($Vc,"r+");if(!$id){$id=@fopen($Vc,"w");if(!$id)return;chmod($Vc,0660);}flock($id,LOCK_EX);return$id;}function
file_write_unlock($id,$Mb){rewind($id);fwrite($id,$Mb);ftruncate($id,strlen($Mb));flock($id,LOCK_UN);fclose($id);}function
password_file($h){$Vc=get_temp_dir()."/adminer.key";$I=@file_get_contents($Vc);if($I||!$h)return$I;$id=@fopen($Vc,"w");if($id){chmod($Vc,0660);$I=rand_string();fwrite($id,$I);fclose($id);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$Vh){global$b;if(is_array($X)){$I="";foreach($X
as$Zd=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($Zd):"")."<td>".select_value($W,$_,$o,$Vh);return"<table cellspacing='0'>$I</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$I=$b->editVal($X,$o);if($I!==null){if($I==="")$I="&nbsp;";elseif(!is_utf8($I))$I="\0";elseif($Vh!=""&&is_shortable($o))$I=shorten_utf8($I,max(0,+$Vh));else$I=h($I);}return$b->selectVal($I,$_,$o,$X);}function
is_mail($rc){$Ia='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$ec='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Uf="$Ia+(\\.$Ia+)*@($ec?\\.)+$ec";return
is_string($rc)&&preg_match("(^$Uf(,\\s*$Uf)*\$)i",$rc);}function
is_url($Q){$ec='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($ec?\\.)+$ec(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($R,$Z,$Ud,$nd){global$x;$G=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Ud&&($x=="sql"||count($nd)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$nd).")$G":"SELECT COUNT(*)".($Ud?" FROM (SELECT 1$G GROUP BY ".implode(", ",$nd).") x":$G));}function
slow_query($G){global$b,$gi;$l=$b->database();$Xh=$b->queryTimeout();if(support("kill")&&is_object($g=connect())&&($l==""||$g->select_db($l))){$ee=$g->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$ee,'&token=',$gi,'\');
}, ',1000*$Xh,');
</script>
';}else$g=null;ob_flush();flush();$I=@get_key_vals($G,$g,$Xh,false);if($g){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$sg=rand(1,1e6);return($sg^$_SESSION["token"]).":$sg";}function
verify_token(){list($gi,$sg)=explode(":",$_POST["token"]);return($sg^$_SESSION["token"])==$gi;}function
lzw_decompress($Sa){$ac=256;$Ta=8;$mb=array();$Hg=0;$Ig=0;for($s=0;$s<strlen($Sa);$s++){$Hg=($Hg<<8)+ord($Sa[$s]);$Ig+=8;if($Ig>=$Ta){$Ig-=$Ta;$mb[]=$Hg>>$Ig;$Hg&=(1<<$Ig)-1;$ac++;if($ac>>$Ta)$Ta++;}}$Zb=range("\0","\xFF");$I="";foreach($mb
as$s=>$lb){$qc=$Zb[$lb];if(!isset($qc))$qc=$ej.$ej[0];$I.=$qc;if($s)$Zb[]=$ej.$qc[0];$ej=$qc;}return$I;}function
on_help($tb,$jh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $tb, $jh) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$J,$Ci){global$b,$x,$gi,$n;$Hh=$b->tableName(table_status1($a,true));page_header(($Ci?lang(10):lang(11)),$n,array("select"=>array($a,$Hh)),$Hh);if($J===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$C=>$o){echo"<tr><th>".$b->fieldName($o);$Tb=$_GET["set"][bracket_escape($C)];if($Tb===null){$Tb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Tb,$Bg))$Tb=$Bg[1];}$Y=($J!==null?($J[$C]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($J[$C])?array_sum($J[$C]):+$J[$C]):$J[$C]):(!$Ci&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Tb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$C]:($Ci&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Ci?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Ci?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."...', this); };"):"");}}echo($Ci?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$gi,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("@4›Nó‘Ğ@u9qx¼Ìo7bã9¼Şg6L'LLÆo6‹Ìg3˜üÌa6šM‡‘éHŞb7\rã¡ À`,Í…ƒ9°œR;˜'¸ù²:Í†	ŒÖg9Î¦ã% ÍWÃâ#¡ÈÀJ/‹†CQXÊr2MÆaäi0›„ƒ)°ìe:LvÃ¨æ-9ÙÍ&aÙ´Âr3šMÃªYôÃD7ÑC£°êe§ƒ ´ÈeœŒ7˜€èİÌc‡Ghé§4dÈd´Æ±äwª6bc£A¾îruzİ~ó}gØÑÎFS&g7Ïètf-O?	ÅjL\"ìÖs¿=÷z'OK§7v…Æ£©ÌĞ-4]NşEŠøÛÎ›s@Äö­3£˜Ò=¡Ğb«Ì+Ä±jXà0Œƒ#3‡App2¡\0c(#®¦¢d6ÀÃ€ğlˆÒ2s«(ƒ:;Œ£HÎ42Ã\rÛìÉ„a¼„¦)Ê‚¤ª),”şOüdÀ@p,°ÌCÆ€@0@†!ÄLÁğŒ'\nÂğÌ66Ã«BÏ&1KÅ-ÌX¤¦Ñó\"£Ï\n\\\0Æ‘´qQäˆ§ª.²‘°ƒèĞÉÈÆñËOB®1%@2xÁR³5Ë2Ën‡Ğ£Ü«1¸éƒ*2c¼V:\r2mPUr»XÖuT+Ô’ä½-)i„Ü9ª(Ø°!Õh3ı9«µ\0ûW…•À÷e:óœQNñxs2Bİ\n,PÀ@på¶4[êm#ª¡”Ì<Ajã1hÈÌıŞhÕaz_·øÎÅŒc*\"³İ5×\n†Wp\\ŞUÆ[˜Ô!^ƒí#QAS+¨ÈÀƒÜ\$9xò1MËÒ·ëÊö6_ÍÎ&C†#u]˜Ä3C•ë¤hú5KdÃË=Å:ÅqmÌÛE4]Ö4Od6èÎ=ç+ÒãàÒS£3mÃ_Å›„<P½s.K£Äº>4s¼Lcê>ÏŞ²-\$_R]¶ 8ã&Ş·øàÉnñœsè9d-ï’ßzÃ—­U•&À>]ºç°èÕ#†5ÚÀ±,ƒj 7æ\nkRÅ®[²ç{FµŒ›hûÜwAs>“£fZ˜nt 7÷c/zq<ƒ!øcwr:ÎXâ:.[aæ0GŸèú°×©/|[µâ°ÃÂ3uÛß'œ2z—×ı¾Ï¶ƒ¸a!¼«‡¶SJLd\rC¬“«º5 ¸Ê†òœËˆë1€FP£ãnú\"% \$ n¦\nQ@Ø­£Ö×xhEf|7À\\iÃT0…ä@•Á†`Ì‘Ó7°½w”PêCp{†¸ê@ğÅLÒ‡d!“¦VˆÅºîChx.â–ÒkA@´±E”ÙÍ8w4AÁÉChÓÙİİèF°X#¤j#jÖ£\0ƒØh:t°N=FÅ_\rpeîÙB(h†YÊˆr„€éö²'¾\n³ŠÒ@‚\0Äæ¢šù*æ?¨+#TÌC\r¡”’Î­ø:*	(7E'¾C(f‚r®VÊö8¬ˆÌ“O²ÚL9GäáÀÒğ¾Êø”ºS;bÉ¥PººŞZ|ošIKğ\rÂ2yˆe¤ÍL)ÀM§È\rÑaN€:bb1F¡ËúƒzrR‚[”€Œ\rgüÿƒğæ\"Ÿ0-4¬æFØˆ¦İ¡(§P×êÈçë&Š4î`Ìš.ÌAkB¢sƒ1Sp8ğœ÷|bËz•ƒó¬6†#ÂYõ0oĞ~rŠ=KLå/’”î!‡@ò¢¶Šá1†õRª`awA¼..x†Ã„†ŒÒµjİÒ\\3`î¨+š¤Lª¬5”;º³QˆË4V&ä1Áòš^K½n”Ê˜Ã›Ã˜qYç,ÇÖR¸!qz„v0¦6û)ìkz’Îlª,Ú@lÍ¬±F-È‹'(l±²ë^¯Ôµr\r«C>!±¬†2Š\\yòƒä<˜œˆ—ĞsgA¬Û\"åÖn´ÅA‚Ö¼Û“|bkË;ÈAc ²é]@ktÁp7'ë7\\Y±Y…A2’\"\n.xaº7^ë];ªXH,˜Å\\¡¥v©¢´3AÈ! í?&,ÇŠÉd.ölÈµû™”×æXèTa«\n¶!³`×,,}‘NÖ@Æò75pÄoíæ”b*î°…ÂŒSI6[xš ‘‚Fg	”¼E…qFBÉÏÆ­H#•s®%;H˜iq‰–Š-)],uM€Ø'‹6*›1ùK±€åyd&A\0p¾K\0Œ‡9Ä—biCM&àªÛ¸³-ñ jk‘†<ìmÁd•€€ÜÀb:€k‚=¥“DğöqÃf(ÏF!11Šy„f`ï†¤^¸Dh§óYÃ~\"úHÌó¥u.”VumÄ›?Ff8}d}‡‘SXbò¥I­¡¦wZ—®]Ë1 g®¼‹q~IÆqˆ¥åwxO‚”Pe†jeØ¼SV]V20åäş—‘:gAi¶…‹²DOÆQGflùrßõæ¯˜®vÇ¨<¯³ÎÎÑoÈ¦kÜ£šÓfLÀ©i0&&õ¬ìæHkôè[q áEo5Ä×/úë¬¡M­Ë^ÂÔõhfxtDÃb[Á¶\$İÀº2îÁk²@´ö¦ú¸h±¨æĞ1³]Í\nÌæô® èNF|L2ïÏK}¨™7ÒÕe\"7ûù\n% d˜ípr¶\r¨ã¦Ln6TQÖ]ŞråÑË\rÌ73r¼aº²V„µmg·v1›óÍEÈÃy9Ä—µĞ5Liü“’’W×\r>3ÌÅğğ ù\r€€4\$Ş—ìŠ[›5î‡O'˜¼ï“ÏPÛÉ.ù“é<òï™—[º-u‰\"¥Ç\$\\©2İõ‘õ:Í0æ[“2º[õÈ:h1=~×üÖÀö…í¶\r··İøÂ©ƒ¼o®óc[àeÑüÀ\\ƒå~fÇşçëëÏcê^#Ü€0ş?«àI6p?3b Ïê<^ÈŸ¸™}mö1 €•d\$ìÂâòbÔE€P~#<£Xa¦ê´Àt\0po Ro¾»ïÄúorÖL†­Èã·C¦®«\roxÖ¯~¸.NúoÒíëqFt¹˜ŒNÎöªÀFùÄ ú\njúFúúüï'ïÂopú°ˆÎ¯zÖÈÀÆğ[	pvÛ|“ğ“`û\0#˜.Â-ílş¥Ö¾P:‡È4fn ÖMh3PL~üĞ¦ùí¿ğÚ^Hò¹¢6%_²ÜHüñIPG ú§udÄLuâÆ\0N%ÄB\ràN‚Ì-Ô-‚Ü.ä.ŠFgBø/Ã\0000CàN>O‚”˜†JÖ#áƒÈ4NçI¼@hÀÈ@f6ã„5ˆ9‰„K¤\0iÀtÂÇ.8#‡\"ª³©%C¤·¬,ëÃd€Àiã;ƒrê€<q–ÅğÎ;cØ=Í¢µ‘°–#ğ0Fı ¶¨Ê D`êBR€D®˜Ynòj­fÎï\0g¨öeğÊè®\"ã„¦T	JÚNrS{O\0i…ŞŒÑ *Ñ§„àDLäKN jÎø£	0ƒD\rÇjíFò®6…@d/IêöG\"x¸´õä¼à¨ø®ª]ëPM‰½¬ß\"«~¹‘ñ'R8QR</Ä\$CøR\nJS bSî#%qÄF×#U\0ÚÖæà—å‚±…w*(ér’[¨Í¥ŠóeLï Yl\$>pnï@ÈRÛ-²(Ë2|Nòß-ÀdUÃa!¯‚‹¤Ù,Ò(Æò1ë.vÎ\$I-qñ0rî^lÎŠåÚhí±ŒÜé«†ßs.’í0“)0Ñï3êUÆ¥Æ`-ßÇ#SP3@ci/F,Àêpm&aàå/ó,KÒ2dÓ3.òw\r³q0Sw5f>c£ã8fC(3N3ReTÁò\0ˆj;2¹!ÌX›2iÍúw†Ï4f€«%2ò4ªÆ²É’ØKğnS´g“¸xÛ/Å¶n Úlp°Ç\0oPŞ¬FöV’¾©²fÍç4Épq@èr²<rèÛ@©òq´2ï³NqIõ²¤sÀÊtã8u\"Øı XèfZ@‘,1¢^&1!BÎ-\"Ö-¢Ş.\"æ.¢ï”;Î‚0gÜ{qÒ¨àÊ«¼•ñé=*…=‡n}ç¸xê¤yN˜y§ÌĞgÔzÈMG'Š{ÇÀ|T–|§ÎDN})î‚¨/9è7L\0Ö­BÎ„H“?¨XT\0KQøoI½Jh† €\\Ñ¨hÀßNˆr‡‚‡LPÌçTæ‡HŒ‰`Ù.àÆhÀŒHÈR!/HÌÍh¸ÛË9òQ€j+ĞÜÊÃÉ\rå‰é\0@©ƒé\nŸpüÃuG)éI\"’i+R‰2‚i’“Êõ!ŸB	ES	–•‰š£ãd–mWD’—I‘UÂ†ÏV™Ì™,lœø”:­úˆi¶0éÚ\0nÉÄxÃGXù[)Ğ£Œ¿*²s[\0Í[(>BÖIê²éîŸ%`|ue(rA(¯| u ÀÖ¢j!_J,rj¢*Vj(¡†ÀJdêŠ§óú¤ò\"êF ¿*T¥“bgìD¦mÀ¦óD§*†¦IÇ[¢ò•q²¨V.¨´x´ª˜@êÇª¦­*®«(š«bêçPnàaejÀÔ\\„R­¥¬Ğ*äâÊì¥`Ò¯2ßjú¯à\\°+uK+³Mif¤àÀw?ªLut´\"-k2ˆk7¶ÎB°£j‹Pàôê>Bˆµâîh>ü	YP£JÁ€ğä38Ù¯¦û[&kN›3³Ã@B¬ ÍpÀbÄ£tÃLúìIU-ÈGI\nÄ¯hÅëPíØÆ¯ü”ò\\A’ÒB¬Â ŞÇbVŒ}Œƒw.ŠøÂ`c%ôÙÌ¶û'C,• Šì¤ólñ¬Â¾M#\$\rTÌ²¬ê†¸Û2û3dâÎSÀÖ`nwš„íelÌÓ­7ˆfÑíewí&ÔíVĞã~ÓÇ¢÷7!8ÔDÃ‚ÏmLÏMX-VIé\$5ï\r›&¶ø,o—ˆøï’Dí…ÍŒÚ°Ú„9um×u£çoPƒvé£RPİ»)?? cDWbß8ß¸î,«\$ÆÇàe26°Şï.àwˆKMy|uW|µ‰~5ì\",ğá6~âmË!Cœ¨.‘¹Ë.˜Ò&ãÎãTÔãÖÈ¯àFìJíÃ–Yêğ3O.RLe&ç®~æ®…fnˆâb\rîgŠÑ>«®rˆXäÌ;Šnˆu˜NKn±mÃ&vN^ïÁbjìxÈìér,æí˜ĞíøÔáØğ‚P%FfvOTn¼Ù\rÓO*ƒ6ò\0ğK%p7–jõˆq(&ô²Hòòe×u	o@ô¯FûÏNûÕ—tÒÅ*Wú÷PŠÄÏk	\rö÷-\nPÒ÷Ínø6ù:Öı¬›\nX!\n¹`”÷ôÿC“¸¿èØ¯îşÇ0\rİ07PÔ Ù\0Â¨&è3ğ‘K\rP)Öå9¥	OõÎİBô¬–sk\reEpƒ\n0ÀlyÖV0g'pm7îôjíe˜8%soé7ísĞ ùoK\rğ{ p®Ô1š¸t£e¹ïL¿ˆğO\rZÂ0æŒú‚/£¤jgSPïSôu9T5T‘….‘Ôæ=¥è–#*^Ê¦Ãà€Úâ>\r¨mãß¨:‡§šƒ¨	óBã×§ƒQ¨ñÀ\0Ğ\0¾\0ÇªßªZ©¨Ú›ª:¦úŸ«£Ş‡:À=:°ºÉªÉ&¼ƒm¦º¼ôˆº´ãÒúÏ®jR‰5Ë¶Ç‡©Fµ§zŞç¾\rúÏ°» ß¬º™®:æ¢c¬â7°ÚÄ0û'¬ö˜‘;0 {5²û²¶˜û e©cXIk­Ú³«û'Zàs[O9±Ú¿° ¾Ã®ú¿¶É•®;G·N7h*®›µz©²eß¶Z©¶›u·Š {§šç·Øf®:f•;+®gÌyD›§ƒÚú6US¸hÂ•Ú€\$›\$D[Ê‡Zâ4`é°›¼ûÚ\${Õ§›Ù³»)½{Ñ¾[Ÿë¶ÀØ’zs»Õ)k‘¢”`Ë¶:xV Îès¾¾{ù½C¿ÛO[é½3²»ëÂÜ#½»ı¬ûåÁü»´Ë»äù[\\P£šãÁZÎ\0Ú\r€¿ÁI'kÚÛÃDEÅ¼_³oÆÜ*Ò|y½<G\0èµ«.3[­Â›İ¾ü/½¼3Éü’grFb‚zã–ÉcÊ<§¼ZÈ¡€ó¬ü¶§²¼'§œ¿Ì;Ö | !³µZĞ`¾9fÆ–<i¼Zçi›÷¸œ“¹€¿ÎÛ¯µ›=Ïº©³c5Îúå¶{ßĞö°IĞšçÉ»¡«ààüù¹óÑ#Ò}¹¼•°`Ú\$‹Ñ\rÓ|ñÓ½1°}°cÊb3Ô“Ğı)Õ=WÑ[ÄÜ\n]mÁÀ’Üõ×[*ÛbÙ²½I²ı}³ãr3\\“VË²ªiÄ\0Ø›¸{\\5ÑµMKÆciÆºˆÔ»*îvÚëVŞ¶\\ÙÎİ·›/?mS´]Ğ}Ãº%ÓıÓƒ\0ÚÏÖ\nİ£Ş@B#1gÚv”ö“Îš¿Ô¼ñ°½ËÒĞ½5ßRUW«[+Á^É~¿›Ş€[à^)Ñ¾'Ï^-Ï[J]§€Ü?#]\"#6bH‰ Q…àè	Ú–¢\$@¦Ğ* ¤ºâµËtÎL,8;+çå	6öP~\"1Ê?^HMMRu\"#åƒ?åÕ\\÷Şc†f2^k¬LÃx`ú");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("\rÅB¡Êt'#œ Êl2›L¦èAˆò 9ÃÌ¦3¡¼å\0‚‘„Û:&ã<€A\"’I„²APšL\"Ä\"QBè€Èe3N¦Ã¡ÌAŸÌgYÙÒ\\@9AÎ§#p‚k7œÄbtàP¨_\0003MÑÃI¾ªq9Š#1äxX 1Ù†SÁĞR =À5¥Nª(¸Å.ƒáò“K¦ŠEÇ©”äy)Æ­§+VJ:ràØƒB\r†h‚5ME£hõ>G%“ÃeRÍtÆO4›N'U¹ìşƒC¢ÑÍøzenŸ|¿U·5šl‚¾\n°ØÎ–[9ÌÙ•¶eíøÖïyNÒM1²Œ=Z=ˆßjárÁˆ0¼LNkÃÈªyNe¸yÌ\\ˆ%ƒ Ğ¡\0b.¾ÌàÏ h*#`Øò«H¢ŒÕ-okZ®¥ízdÙ%il8˜6R°İ¢:¤ü‰Ãz~&\r(kœ°,K\"Ìôo\\2É»oƒ¼¼/OÂªî0l[Ç².Ê< ÂOc&Ì³lêŠQZª0¡1«§ŒpˆÙ¡*¨î4ÀJ8Ğ2„sâ’î,,ÚÄ®Œl7N	];ÅKëó9KsÉ\nŠ29Ã(É3F1›¡-:^éÂ!@Ì7;ëÓÆ9BÎó„ä’!pÂ8`ò\rÊØ·Í“rŠÅ:ÃHÆ2…Œ ûÊÒË¥F…«Â½×4ERTÁDÕ”Ğç[#ì)3á«=JõÔæ¸KÓ&Ls,4!Hb\"K00Ô=¾ªÛóL×MUÃœê“Ï¥æNátòäŞ±½»@PLuu\rJºçßª­4Â4ğÏIR’ÃKÓ4Ø@ôSÕ‡RÔõL%dÍªm–ûX¥­>„DÙ_ LØı†	ëÑ6d™-ø7cv-9äõgJ0\\¦‚#˜æ4Œê«Æ61ª0Ì9\ríˆŞ©Ön6 ÷¸1\rOnµ®kØ<i]ÆãhÒ<%v6°:-ã¦9Vy`Ìe8 Ö2¢éZ1·î8–Z:mbŞî<æ[Ş¨2ğ[ÄŸè0fˆ2Pû¢¢6ô(@!ŠbšàÑè×º®İBªâCr%\rœEÑ¶É˜Ä7ã`»Ea0‚ˆÇ|âÒ‡»}°œ“«z&0ŒH†X4ŒÙJ–(x\\1÷]æ.òù~j\$*5(ÃY…¨Î\"€P…ğø.–XN|ÛH9÷h—Ğ| æ>HN­á8H~ÿxPïŞ\nhïÂ>—˜úßjhOÁû²D‚œp \n¼3†r ²1\r!ˆ4¥ğèWº 6ˆ!—XDA	B\$eØ(ÄnG`©¤22Æ(CŞyh{àó¾˜h³ThĞ%ç¿ğØô`CÎ§ °W Dß<ïÄØhOÃt\rH+†UĞ–‰‘\\f86®‚¶{Ãxk\r!–’”B½ÕHmF:6º`@Ã‚}B0µ²\$7Y•£ëi¸·†@ÂV[~b’¹¼ôÔÁ\0D%Í^²IAq’JJIp\\È<œV…İôÈi³!JUÏ.?Æ·Ÿ šKïàìÓ=ÒC˜=‡¤úIÅçĞÁ\0V1Ï‹”µ?ÂdlÉ©L(R½‘¤„Nº™§Ã¹U\n¡H&“I&ŒÖĞŒ¯65¯3¦\$Â™å˜À2¢EySUg	»±ÀKŒio|0Ì¢Vc‚üÎhå˜ƒ\0N[Õ³\$bØ&ƒÑ*LA[yeF^œÂ¶÷èc¼‹G†Œ½0æÜ|MĞ80tÁxw¥JŠLÀ\\Gƒ8/ GPƒù;Ã¤º}ôÜ­²J;&{¼DxŸ©ƒĞ)õAzq•M°Z@h!¤ĞÙ2Ú‚L07ùf^©ü™ƒä@&0È™b`7.•~T©0CCÍdLõF©¿\0b5\"5°¼FR˜×Hoà¸8òeÂ9”\0€e¸JåMƒŸ¡\"¨R(Œi1Ï\"°×\nÈ‹Ö\"õp³ZøËœ…•+v`¹ÌÇ¾Dš0a”“«ÀËe‹³~eµùÿÛŠ^Jƒ;z‰oÂ©RJMJ)U’¥¦:ß†wû=Ùiâ<‘”:4z)‘ a¸‚€\\\nÁH/ÅĞÛÚ%#\nÌº6òê]g‘tgÌ€Ÿ—,9P´u)Óé½¡ - zz®ˆa\rA„<‰å,ƒX\r1äÓ2ÍmŠ½·WD>»ë}z%&#³ÖüÏB'€ize¨+–ò‚yƒ*ÌÄè‚<LR£L26\n\$3­ÊŞLC‰ïº)ª‰\\ı\"€€dP}ÔÀ<%aÀ:‡@|¾ÏÌÓ‹_\"…l‚­2+Ãx  äY2e”0I]%ÑäB\\ÌÒÌlRÇ“\"¨gŸ™£Â}?y›:†LÔOÃÃ‹W˜\$âæ#%A‹*Ë€]œAóaõXc0Æñ#Z‡€y÷GåğAôáİ.Ñ~Î©ˆ+ñ§Œá Ò!1¥´Ævp4»Ç<rÑFFDˆ~qëB¢›M˜.ŠÄÍC	][­Ël¡…Ke‹~³†Ç¨ÈàË\$ÓÜ{Àœ/=÷ß¬å)–Ğ†š6ÍÉQÅÌ†Äm×l N<Z7šøÏWIıL¡ÏX­elµ©ÖèĞÇTÁ¯ÊäØj\níå‚«’uÎËQ»ØŠlæî¸geß¦ˆc,p!Ù»?Œm'‘CÊâÑ“üå ÎIÔ“1ÎÛº‡ˆKÊpäƒsš² tÉN‰„BåØ±±\rqi©‚Róù_ÚÀ”ît\"¹«ëXÁÉüİn”¡­¤Aæüåf[Ç”ÜÃ‘'±¯C´Ğ¶	Òğ''½¯³‘îİÜ—r¥å/óƒ¾)@ 	øÌ’”z(p{j¢BH@£Q	V—±uí=¿¸…Şöó—KÅRıh„h:„ãŒsS¿\"f…™<u—-sİxéŠxu#%54rºC™‘CÆ_‰#|ŠÚ™†a‘–+s=äĞH´ëÃBŞ`>\rS¸qLE(¨ü6óéúY?w¨^³Øáp!€wBàd`ÏJ·êÃ>Ñ\rÙtOsø	‰—”Áû•˜†ä&=X‡‡Ş‡ê’xÀØy\n\rÎ‚SƒÔ£Ê®ÂˆîVå©1¤\\Å&jíê<€ÒyêÕ˜Õ\"(£ş\"`Î@Ih\r V¼'n‚yì¦Ê£ö\r-½lÇ`èİ`òÆf.‰€æ ÄlÀè¹ìD·pJË@G(PãĞûl–újÀHÄ#Âíæ ’çdBmTBÀ@¿dÀ¸+,à)ÀõbdÛ'º)ævDÀ˜èªèoz*®Ûn–\rÇxé¤(\r¥8g`\\ñ0¾(¦I€P¡jpF4ãü@R\rW«8ÌpğzmØˆŒõ ·À]lR½ñ/,ëÎpÎÃÑÑDç&j\"SÑ/‘@½LIÀA°í @j\0î(Æô‡\0€'ÔhÀzQNx L®lE¦®€1YQz\"G'¿ëL©T>¢õ‘\r0>‘—N@1Õ ·KxçÂ|e—hÊ~‹ÂİiqÑ©±BzQ;ãÈ%1¢=`Nê­£‰qñSCÈ\rQ\0Õqù1–€Õ« oîìn¶?`ÔòÅÂ!¬lƒ­#`é#¬q\nŒE/8A ª,nÆ#B‚ñàÉÈè±”í²Sï‡NPGv—p/NÄëğœ…LPd‘W\"Çæe¢ÇïB1Ì†æÒb¶(ĞÄ%€A‚'Î\rğKO\\\$ğÔM\"˜ôPæ!.íÅêq9QO€@©æØBtS\$\r«Æ× çfé°=!1»qU\\ºy‘äİ±?RÖä–ìe½òÚZf²Læó2²A¤’=§6ó,íî	¯l«TE2ºuHN¥Ğ'®Ğj¯0çË‡jó+ÌBïÉr‚ê-”\0èÙÅ4 ór.Çò€ÈÜæ(ÔPXÅíeŒ>1JÑ„-ƒm{ëĞ­D~ïıÌÆ÷îú\rg–KÓ ÂÂ¶-àVÔM£:Â;ÜÑ‰(óºâH\rÄC<ŞHS0qƒÃ6`Öˆ´>C+\0²)> ó>Zãç8TO¥zÄbø\$Tb2†ªáP*¢8“…8å˜ãˆ:ãÎDn¤ãşSÁ<FRän.qÿ @ø ù@øÔBI5Ô[\"nÌˆè?ÀB‰‘Nu`ñÅ~e³ığªŸÇHÓnçÎI®0¶â¶À\n=N#3şWòråTv\",f«x'/\0ç.% Øt\n…ãâßÌp(Èœ—ÌM_I4–Wó2y4:ìâ#Œo#õ\$59ôäè2§ŸLÕ2@Èf§”,Ô\nîˆR“Ê’´\0¯¬ÆyQ9çáà¶´e²êòó5 yô¶—Å&’TéIøB@Z\$kfójÚe ^Û±êˆ2Úå–€¶€º‹Å­İ-g‘VlñN®ãWU\"µe(é~b‡9PÒ€>È\"\nf\nÀè´ŞHt\ràñ,Å0\r£€Áh.È£¨_SW4Ïe5q\r†\n(Ç?„â1v4‹\\Ô¢ét¬\"ŒÄe CÓº÷\nÕ8xË|u¾€–oÌ•³->v/R6‰QK^ö:\"SÂº)QŸcr€vQmQˆ%#½PaˆsMË«i8gs“ SÀf¶Jìj¶\0CeqPÄRS\0Ó/ĞGSQ0°fjëiÑA+yVB¡Ë‡aòÂv0„%‹ß	ƒ22=9ò)tÄ›l0uö>F4\rb‰cÑhÓ'lÃäCl¦ZJ(\rqRÄvÙIÎ•hvaUË£a—O†~?DĞºù(&våìzŒ\$sãŞß/HB«O0Ğ6-{&\rh,C|ŸåÔ8i4QÔÂå2jÀL\rÀÄßƒìœ±’Ë‚ùO˜øbŞªO™';\0ryCJÁS°EÀQxP==yr'L\nqÔ(\rÉ™sÈ™v·n\0v´àûrŒ&yBW{#ry÷K°­sdóÅÒM7f°¦O¥ïÒÃ)b?_®~~\nLƒ¨é“zSåIDˆ.ãîS‚¢ƒ/l\nh6KöÈ·Wå2õ6„·å3£@8b]­ø#mbPõmìõèß5o[wGc„vy¢¢Âß„v\nÌ„bw`œe1ØsrÂ”’uŞ\r_}‚ûXGhƒĞ/ª~\0M„l;‡dM\nVÍ>•pÇ°²’+B4fò.pùÂ\"`ë4³O5-u\r® à·õBv ™ÔE€m\\=…D`mGy4_E\r'óFÍø]úí`Â¥àÌÉ4	‚€!ÓoIÂ\nèhL¬Ÿp0'ù	‘Àé’\nÎ@x¢®şğ b¤<¤¾¤¦oö@³É0r£ÀØ°JBƒ&€*ùH\"	hMQ‹¦õuínØÎ9¸ÒZøÖ	ìªÂIïÙT¥é•Ù`‰‚„#ªÙŠÑfqå¼È¢tæk\$GŒÃsB2¹…WöÈ©’€¤°Y‘.9¶!÷1^ô6S±mY^MP,RY¸Ñ+Q³Ÿ/.Õ‚X¡ÃV;/=Ìl]	AyıRš\0”4blè2Ñú{ìŠ¶‘pY–’Õ™Ì‹iò0‡‘£³!SãÑ¤Sw¾ü%hà¶ Z@»XOÒ`^ HÀbÜà¤Ï,Ï¬ş.˜\rSv©¢vnè:,°Z1/q·½iÒ0pYjEjÚN}ÃÑª-1ª4oÅ¥º_¦5‡2Új~o§+Õ«ˆh””É0KĞyÏ§_ô½úÑdÒ…K’K|T}­ó Ò\nC|7NYõv7­Ÿf6Æ’DÇ:/ƒ@@\nŒâÌ#\"HºÀA \0È\"F* Š0Wót Ab`òubH²•ë›õï\rÕõœrewƒ²2;*\rD² İéîìË|po€ß+† gnøìÛuv{z‘Û'5ÆàºëjFù×O—5Šçk¹CŞi€Ú*µ>5Á)†¤dÁ²›——õğçò·_™ÉL‹¶—½K­¹öÃ`ö@Òd\$Ìã²Í,×\\ê©@¨‚(&†4ì.;¬Ã.¸¾U%îi¦'£ğ®w+Q˜\rqÎZü)€İ^B20ñXş\rÚ‰Ä+hgz’SùiZ6ÕåÑ£Ú¡\"LEü3ºõbÔ\$|E2vŞ+ßÄ:áÇz×YÇ[ÃIwÃÈ’}ÃæŠqa¿Ä¥Šï<ñ|f*¦õ¼-°—Q,-’…è‹²Ë½;•½¶’s\0{“@[Ê€ĞÜèƒ\"|\r í¨‹@Ğ'Äğ;ÅQ¹|çÅÑÇª0<œæyü÷jüc8ôaüçõ±gó¢¢îílºËàQÑ;íPbî¸|ÃI7	5×\r\$µ7k5AÏz\r‘ÒPm:iš†kÔÅÅ¾ú¡	FåàÅ€·€I ¶i`ºUH¼à1Fæ)bÒYˆKU®f‚1j¯À‡M€@pfRø\0ÚŒ·ßÚn	§®.óğ(ÍˆhÅ^ûE´€å´Â¶œ9^ƒŒ„…sË3\\N™†Ù€çÙ ä:øìeˆK8ç—M›E¸|\\ Ã´]ä;‚êûD–b‰bV(KËÛà}‚Znb·¯8­tt˜É,9ƒİ<.eæm{l‹fM¸'âİø¢J>n‡Ù9ª#}îÚ5\"/ŞTÛ³¥ÌâªÉ£-’wßƒG`ÃûAÜ ß´¾35|×§_İFMİ…Ñ,§V€ó¶k¶¸ì-óè#©í'Ëp\nb:{İëÍŞK8GŸãş-DSŸìbÀÔö@Ğ\n~¢›mgŸíPwí¶!îëèik=ãM˜ß:[ƒ¸{yˆû~>owk„\r¸ÓFÕâİ2Ôsî3]FöqdtÒ@Àf€bGæÈèWşìÇ‚*z·lÇë\"Ì½ÿJí ·õ€İóqùÿ^îÉ3P‰õ7!÷=‰÷İ‹½h„·±Ï*şb)°‘ë°) FşiMÓÊÊ]b?¨ó8Å^~ã¥ê ó…½ëíì´?äÃ\rB¿üaö#àô´ƒñ€O0†L‡Îí!îÇòƒ¥˜‰÷'i7{Éˆ˜ñà‹ \re§\$Ğ\0Ò!©¢XÂ%ï<ßh¢#¿»öD•øIRK‚,„ á[îÖ‡÷İ?”‰‹à{q›¢4&é44\\ª»ÌÔØ°*ÁúÏÓ#Õ]À7‡q;‘5FÇwZk^îñFŠ€,z¡6^B«“B¾%ü-Ä@\r@şò‰>ñ€3ÃÀMP÷÷yÀaM‚³(àzM·Áq”p91s^èÇ'ó½ı\"¿£,Ø\$kD'ÁIñj ƒ)„ÔV?lS9±{(@Áİ§H\0{¬	ÛÏ·0DD(7[	¤ùT.áó`Pya# –u</üt9ÔÔVÈÇBtìI@°~ÍğUÿ/Í€/¥gØ\naD±U/ª>ˆ…rabÀv=ÚË#B9İ_‚ä±_¿\r(nŸTëüï³µ€…üMz±nşâ Ç!É\"ä2Ğ®ò ä¿\$á ŒR†\"0L¨Iê‚^Î\0›³‰¼Í­@ÂZĞ÷-Qî« }‚×‡¦Õ±ë´¬Ã	k	ÜÊ?t–ñÒ.ª2½á¶ú¥¡\$#ÃH¢V¸…Õuvˆ‘p\"*×%¼U®+[4H¢&wlá‘âA’S®”ú\nÑ>Ä“iq@ñ§4Ã\"\$¨;›+äh´íÄÌp\0-‰´Ntµ§ú”…;ä_Öb;H‹q	1Ij¼SÀÏø’E9lñ'‰LJÑ\0#‹g\$ÔOÓ´ŸTîÅ0NizÖ¢¸`H¯\n'F\$2€P·»-F” ™ÀØÚ–Öpãyq tx“„¬B#ç8âUÔ‚ÂvĞ/á¼Hn6r3ÆÖ˜e\0sŒ0Ë ë¤B“PŒ>ÄbXF…–’	c¢^¨wõF2Íøk~\0‚8Ñê6AÙ G#lÔ-*äg8»‰ ØFlxŒ -F€Q ”ÆVÔ«å¼®‡ £[	v‡!éc›-+=ÖuÑdQE‡şsrÓ–jè\0½±¨ÙjR˜‚&¦µ½ÔkQŠ’ZşièºĞğ#w?TÅçdÉâ’:0\nBõõQgÆ1#b•ˆõ‡…¹	úA*«öÌˆ¼±ÙG‡@@”,\"Ü¡ŒG›•ÓVa,ÜùE\$¬‰ g¤85Ár2z`rdRÉÂE£M@İZÅá.„e)¤)pÔ>õy…‘¬)bbJ²˜À†w˜vÄ¼!ë¬±4ylb–8FEÅuB‚KéÈæGhóbKó¤ÒR9HG† \\™K!&p …P XØ×B9&ÓkŠvO@e“àØ8=ğ&ŠÈjnWš\$T@*@¤UlyÕ&)9ü\\æÃ×‰&{%šîJ@xl§Àçs1Éy‰åï•§‚úåò†9{Cğã NvŒUÄ»•ÈšÒp\0½Î`>-8Ë¥9*ãÙ5¤}k•hà%_,¢´¥«+l¹Â&ü´é|!ı\\ªå›*ih8dL–©È²¾¡`IŒ¥æ3m«¤âhÄ@	àS¡õÀNp\"ËÔ\0 '“YÌÆ^„şÉÉfg¤šÂTò~†8{çÀE\0[ƒrÈï¬>0ÀğÒä€´í -'DÂâôåÄê]2<˜\$Á€é0‚¢|\0-™0¡€ZÉ’Mò,˜CZu)‰…˜¢R•(\\Ë¬ë)#)½Ñ„Íbxšç©J¹ñ€4[*9À¼'›¶g\r+©¢¸ñ.ˆJK8š,˜Öàûu\$Œ¶[òÏ•ˆ¥g5Ù’LöTšœÑÍøÜ—½ Š²µs‚/Ér)\"„zWcï’Y?ä%òYKXm:0±å,— 5XB†—âI1ñK”‹Øb¢áÔš…Q Cr]AL»‡\0­\"Íµ±ÀU’òO–qÁ…½¾Jè\0€¦ğ'HŠmğØ‘4›g-˜¢uˆA¬Ç;Êµw³§’¢ô¡ÀÊx¦&¼Ûe4KÁÀ>LÅƒtì“=P'\$›i÷çf™¸…Üe·ˆø	w=ÑAq7Nš2í½L\0Âs¦]üêg Ä.fòyhÀÂ9g˜‰€@Î 9H+ F;³8ØJºcØ=\":GA:Òçl—§;¹ûÓÁ”åÒ)#»It±,OzÁ•^´‡£¡Tnnê«tˆ¼Ç±Åz_Ãû6êŒG³[Pµ´Ç*9	PæBk]ŒÆ«°…AXÀiLJ%‡”ÿX/*ui7DîZô¤•&©•Wkb:R‘€øRĞ¼øB (’bš%Ñ4İÔPn£Òø…ç†¦„Ï­[zöáÿ…\$ÛK´§ÔQuO-~Wæ˜õÀ¥GÑ¨ÑüøP˜Q“£˜“°Æ°\n|dGo’I%\rğğĞ¦~ïlxÚ@Ncs³°ÀêZ}ĞõÄúœğ€½~@t}x‘rŸÌ†£È¥¿ç-(€€ ü`?pW¥²°€ü—eèul»ãòÁq\\Ï(SÌšó‹u?@ëÂS“j•<z¦=éõO€0rş+üË÷‡RNœ\0.-Ä¿@p:|Ö`(@{‚~[DÊš‰àl\\ä¶8\nI=ŸrkËaÊoÆ-˜´r²¼XÆÚxÈ¥)ˆK-Qß,%€•–dŸ©MAĞ[ÀdÊ6WÔM¦´5ŒŞ”-Äü‰€)bÓ–'q7Á:§¾³ø¡­Pàº…½?T\\ùŞ#±A½CÉÃAnÊf5À]ıÁ†ê¡#^‘èkò¯{( ÿCæÿÑµ±ö\0000Ü£ßLÇS9\nh·B†Ì™jB¶Aš¿Fqjy#‡…§)zëæ	ºQ©S\0Âü`nšŠ%ªÎ!ÿ zB¥F¹DŠ°šà¹\r:n\"’ª›H\0–\"@nm&‚-x'ÍLÕ>_ÅÑ=2ñ–â]\r¸‚Ëâ ¨\0\0Şˆ-ÁxB¸! ğ\"ß<bÑd]êÉõ5V…ô&	B:€„4À9äTëoEMZ¦Ë+:»±}S™.“<öà„•  Od)&œÜØêÆ¹PI<U\\BhƒQL0µµÖ­òö7Ÿ!%™ef+@°  DÙ:Ñ#XE4&V(€Ò¢Ï•øğe5\0ÄƒÏ¨¸A+Ö:·q¥0}5j	äÀCä\$Ø\0¨²0[	¨§‹N\0Åh_¥Áø€¹WCø·4/éı,Ø,§Æ³¡&ÂÏ°…U;óép 0€J·zv›™=áŠ‰Ål»eÜ?Yâp@˜È6Çá­ÌIã‚›Ñ>Ø>h|(ˆE,®ú¿’ô\nN²~¬«ÒÊÂ	¯ø%tN-ñæ¶„õY:ËÁÊÌ¨ë*‹‡¢¹D BPEJ+\"^ÙU  2²¸¡H&t9¸§@½Vk-	4ÙĞ2Yhø@'´ÅÒÑgY©€¶j³B<‚ë5M×v­„İ¦<„c)\$x†h%a&¬Ü7Ş	‘—æ+¥«Â¶x\r;í)Ô@¬mQº¸ˆ„³Êex—DûNF!±(—t…	ı(üZSáVø†¤²%Õ3+!Lå}¸¦ÈgÂ¶­WBDRêŸLÜ¸u­4’ºêTŠ“J­+hÙÒ§‰¶­…nD«¸,Ò‘]X2V\nñX:–€:a“Ÿdg”[Ê‹\$³;@]WÛ'[¨gQ”áñg»+PP¶€üÏÂKå¼¶áuS¨ÇŞ¿+„4É©1%XªÉOÈ<´	E9ı\\ßPC‹¹ÁEr˜eˆáP©#šî‚	y²'p×˜Šbw“¾‡p!ácğ•®3+»ŒØe®FOÔÓD_B [ê2Z	“Üb‚X[­Z tá2\\fuk•n\\ÜÄ\0 ¾×@# ë~¾u½ÜD)Ï»\0‡È8Š,Ñ1ıÛfn+™äÊq…Á@¶0Ê&Ğ2÷§5üÿ²jîšƒ\\£Mü„£ø.¹6k´[Nd–ÕŸ]µĞ€4jzÓélX±ŸÀ`Ş^4EÂ¡.²G‰ßqdo]0L‹ed£a2}û…–ó¥éEL¶çuEFAİµˆA@°«JÚf¬k¾Šñ‡k‰!(\nØŠ>›	-²/‹l»5w¯ wºİf\$‹¾]&şsG¯†™â‚#Ál¦)Aª€ûµ+]×^¿YÎ\\ëí¾èï¾ru‡ß¬j\n¶¾ıÇ&Àªk.‹ V`l‘|ŠZ±®9–×!\\à_`uNP4SœªB`]o‚„@ŒZ„\"´s\n¨Şc‹T¥fèc±´ğ-@ÿ™“•GH–9XÜ£Ú)‰øTq!¡Àb6ĞË`¸Ú5ÁtgŸd#J~Ø%@Ş	ĞDUHø`±Ï‘ôŸ˜T°=+Qà\$®Šú´Ü}m`Å†`\0¶nÀ%«jJthnƒG	bK›Í~”3BÀîĞ‰„œá1mã~¢ÕÈ£r2’‚ŒÊ%«®bEE·–¤·v`ü-R[DP1Ø…ê,›0ø?—ÓÜG•·\n›X¯†‚ºø(F°&R0³T¡¼”‡ÄoˆCäÎ˜Uad\0‰‰0àa˜L‘àô1-vñÙ vÁjÀşpàÏ-IN0G‰ ßàCÔrÄÅø.}M¡Ç·Dmm«qŠ+b’8\"éÅ>0@éŠ¤zD99ø¯ªŞ,N²4lZ`ƒØ¨\n!¹ğ¤¾ÒÈaU˜ÄzÔ¿2ó+ñ6{X_\n€®h'Œ¨êby˜¦Ç&5ğ\$À&Û¯)ín›‹Ğ\\‚#Óƒ ¥±1™êfÑ\\¯EÖC:Œ;â#µÎÎ)Áú[Ú™„*9ú‡Uz[ÎÕ6·-*ˆ@À“şÎBµ¦eé§àx˜Éu\\2_±^8¬v\0—Ë2LÌy¸Zü\$×üGà`ñ{Œ&J8z¤<éLEàŸÕ³L3V!KpZÂÍ`·YUÊaeÄbZÙ…e<,ÙQKfŒLEÓ_İOÆ‰u±\r‚,¿,D„l¾T‹72`cU)–©é0ÀáVaPm˜¡S9ò?\0ğ2ÀF@“B±²MX{@á‘ÍtK¢0G)*Ø‘ÌKªóç˜^®eØ;x(Ãnp«FD5hæ#(ÓYdÖàJ¥ìŒâ„ÅTõlt`DÔ¿Á4\\›¸ê&ğ•…’reüà™¹®=³\0ñËòGqÈÈ˜€Ùf‘è2;¹Ì\\m^ntÂ£Â¢­i_)pœ´LÈ¡n.u³•xŒñgc#®KÕÒúç”og€<Ù!q„*Ì\\\0œ?>T=ZF°Re¤æˆÊºôÅhÔ88/gÊ0·¢¦t„ÕPh/?Yøf‚ïjéêL4ïØØÄ…:Éã®9ç3‹­^ì4°å+¿’§O\$[›¢mæ>–%éóŠZaÓ³«c{oş„Z‘ÄâX¶\0íz/‹[’Äx³µ¾”Ò2~‘Ä—Íé:+áq\n¡ó\$\0Í‡Øğ\$É&ZS>ip…ÃG< ÑÅ0<„PÀ™¾ÁÍ.d:Qm*LÁQEÃ©L]¤¦—¢K¥\$C0_|L½\"ƒ4ÎKø4Ìˆ]@eĞ©ƒaf)À<ŠqŞìX§Î÷d`À 4uŒˆ€ØŒ®°¾H©L*é2²\"Ó–ğÅåïŸzÅõN2y&Š™ßàóõ`ï;«.>ô1]Æ¹¡%!Àšj¥\\~¯’chYq.ĞoìØVÃ¨²ô­ø-@ûò?¬lú5IqåÑÖJ\r³õ«ôMNB÷Ôä<A@_8C\n.%n+qÖHàÇ®ÑÅ.&÷´º	ø€¹^’DÄ\rš÷ˆ@¹, ¥kü\rºù×ØÂ'¯ö±€£ZğÖ€\0ÄJÀ6€¼\r`bØ5]¾¸@’ç\\ğ„iº‹Oí€•„€B×–¸©u¯òˆl`šæ(€Ø^íM§Uo›hd\0£d\rgkÌü{\0õşSÀŠl°)@sÙŸÉÖ1ÀÂÄ€g\nˆön¶ÍÒ^hš{pŒ+«\$#êDöAn¤î‚)Êpm[R²è§/ŠéN£gÓ¹©o³1Ó‹dÔJÃ(ñ×…/Vµ(jÍ·ëg@tºGHù@SN\0áÔÖn?púÙF(lM[=ºÑÏ%MpÚ…6E¶ğØ‹‚Ã.0E„´°à*+p¶öÔ±Î¶ºi	5œ\$LY\nìù ]qèM%ÓÈÔ?8aK)ÛZ\ncŠ¤-î™\0Iàe0KsÓ…T	 EAMBô¼:Üw½|ş-ÈPÉÎíÏ‚ºíŒ\"&Ìo°j«ã7x¤¡`Û\$ë‘_[À¨ñ«LşßËsŠHRF4h»úÌV[WºñÔĞe6±€ú÷âc“Œ!- C,	HEË¡Dø‹€H¾¬(`åí¾ğ9ïÿÂØ.¨€Çş2ÍÏ€€ÍR¥<Y,&†Ì6i,²½›d,·\0ıdTæë §Ëio…‚g·zzÕÈöho½Šğ<ÉTÁæN AH_ƒÁÈÃ\\4gúİØVB\r­e-}j~„\0‘`by }¸¦ÙÛÆ¨S†“Vá0–<]=|#óÒ¨jDÑªa5.´ÕÏÎ›öÂ2ıØwã\"!–ÀÚşöîx3ÃWE\$÷ØsÍezTúŞàbâÄ!Ã÷à2ŒÊ#kW]KÈHÔØ|ˆ*­ÆäË‘\\’~ú{ÍËvó®‘0	“\\sÏQ•ÇØ7¸·œ}Sc|ãNx˜ÃSP\ne¨^üxœK>§–ğ)©ÑùÇãµì;¼ZäšÈ8İ`Äg‘«}.‡%¬…Ì.HË˜±§æ;«y!ÅIrPyüÊ]f^ bt¡n	œ[çN8zDq1/2Eä\nY¡Íô 2ÈÓ”c ÌrL‹»sò¦4gv0Úæâ4‘y#ZS[øUëm×ËKŞ«S¸q’+dÄG	Ç–Òc¨*£QaÕ­\nÊ[Ç¯§9‹ @t¤€%êwÉ|ûr|=®#±„í¶ÔªĞJZ~'H[ªá®-×Z}q[Gvô®•Iı¤­ßËVJ:Ó;†XËÑ3\n*F(_±çÑn1¦ê/ˆ^.vkw •I\$ËÜ¶ïôÏ;ê]\$_`_²ş„öWäxU\$(—1A¥Ğ¸ò}h9,xw®”jèÌnb÷<@ğ¡nœ,V•(oX@ø \"Ëà\0PÃ©!6`áT\0'ì r]äÈ„‘;\0(|v°@NTş-û£Ó–Šo^ú1¥® =4†òãç/[S1ì+«ÍÌ¢Û”Cü^\0èõ\\¼`x/)™••4Ú#›vàgæ•)ÜSèÜœ:aÒæÓ¦\0/†ÖÀ|‰·uWF0¦‹®š¹t{…L\0\\µËlë€„z’²ŠÓ¬ı³ëI,œ	ÖÓjª¯~í°úøv¾¾v{¸ÈE—õİx<ûäÍ‡µêI-ç}ú- [\0Ë½¾CÏp}	ë¯İ€n¸²ûUÒ;œNYm›§h±¡‰¢w|¬Á÷_õÛo“Â}oß…EİÑ–ö¯Ã7ÊÜîù(ªG4/©¦€÷Ê»×âÚvE@gÖ„ V“‘¡]L‰éAá[QÀî|ãqtZ<_ôÃLÎó?0¡?é0c€Z.p†8M\\€yê”`|Üƒç¡\rh‘¾´)Êì|ççlâÎÜu®íK/™ˆà\"ù`:ãKcÖì+”¾QÄK¿óPûüÁÚóÑa©[¿\\}%èîÌË³mÆádO2o˜H};ÇEm?ÂÁ\"£A5Â‘™ÃV²ä\"†±¹ì(#As,ùÛ9\$47ª„ºc0µzdÁşÙ0ÀÁP0€£w×ˆ2ì›½J¼áªs¨É©¦÷sñÃ¾zrÕÎ7Ó¢eÍ,±Ï\rK¸÷œçóTò\\‚R‰ÔR£*Ää=ªˆüFG064ê)1gB­¡•Ï>ÛT•©tâÉ«½^@ÄBÎvt–5‡S(K^å¸jàÙ»áTjød1~ÄÓ\nâ*Sw¡<ş*§ÎÒè¶ŸVGÇT“îO2³ä÷ùˆşSğp2_Ïº#­ùc¾\\]˜œJ·±ùšzTæP.\0 [l\"©mñ~ˆŠ¡cÃğfˆÀ¾º¿…7ç~ùÜ0y#À¸N Ìùİ®é(ié_wéŒùëm¶*€ØGT¬Åoßp¶‘¹S–¸}i´.B‡A}÷—!EYtC*Šûåyo³²ÊË©\nà[ìÕî_µÇHÚº„g'è8LÔ”9î–:YqJéÏ?ñnEb+_GÉt¡n-B\$D+hYcİp—hâgÕñT	b8>yïß8Ì¿ĞH‚Q±ÂÜÜÆiG©BSÙÃùsQ¥8e\róÍMësãŸanîåÄ?IÄ[éİ\0#Êb-.³=9¸K¢é!¡/kğ˜õŒ!èÈ±Ò¨/ñÈi\0u=´:8*2‘/ß¦í×\0hÁòªÒoˆËî28á Ï,!Ph¢Z'ê€»ïÀDxº³\0J>çU)¸3 ¿k5ú ]ˆ‹;`KübĞ	.|yT®,*¢ãµ½,ÖCû®ûêÿ(.nŠ,(ö(»ïc©~Lq¤‚&ÊëH¹çÍ°¸àùâ§²¨ºrè-ôœ†n¸ÄÍ9#*û‰,‚»ÿÀ2\0À[aao¿<8ñÉr7/şÿ°ºÎ´¬&ÁÊ!çºĞ’/ xdo‡{sg@9¯€b¡ \"\0¶t%Äg%\0@„¡£\$„BHYÄz¨pH‹[A¿¡ÎE) DŒ!([ïı‚ªô‚\$jîóóÌÏ@€ê‹Ğ7zp+±ìI<º”ĞL#ÙÃP:‡„ñL°\$À¢£ğ&ÃLæ«—Ûj-òHğ,bK›şù§Æı‡ŸƒüÈ?¾uŠàïØ,Fl8ƒú ÖVßÓv@ª¨2¹Ã÷(é¹êÇÓñ‡‡ øŠ„A˜á\0€ğw,ñÛ^æ™€Rû«Ş\0Æş™-g7ù\0¿˜‡ı8'¢‹&1÷eÛ¿¡Ôiñ òZ˜œœÜÚA{“’ bÁ3 Ğp¦{¤\"®(ã.–²òsùí·³ §i¢¨õBÈÙ©l ·éû™°‹Fk[pp‘¡ş?Zj]\0¶€ €\\é¦€·²h«p`!ê6ğD7DÔ'\0ºhÜ åœB4¸YšÂ‚È¹ğ£ÊÑ4&°•„|Ûxl‡X’(Æín¨Š !€ı¨W­é@q\\#î‡³êš\$\$­î»&ú«êà±‡&\nÛëmbU	Ki\0ğ­ì.UÒñ›jP·…7	´,ĞàjÔ%\n\\‘Ñ	\\%°—‹Àk&gB•tV²\"à0ægs¹iÊüø.ÍÁ6ß	3ô¨B÷\0ÈÈKJ¼lG<1ŒÇ€¿¡%dBÊjËÁ£	ÂšDÑ¯d<@1\$\$¡˜ö[˜å/€ÎıúA’pÑz«×Â°·l+C´hEÀP¡‘6õJ°#b¢>¨“>ö2ª¹ÛCpu‘L„\$­R¸à/P{…—~ƒCt,Ê\0Š,>ñ¼5Ë\"ú•7B’:GĞg<î#°á`‰jvè»iTÎ#Ûj.nUl¬N?v‹è0ô>DgSwŠ>¾ş‰Ÿ/éÚşH?ĞÀU	PÅaBa\0©¬eegt7€­—¬»ŠöI›d ¨ğ¡N€¬bL*H¹H´5\nøüUÇˆ+ÍL&X!Ùrü'Ø§p ³Ï0ı<ö!JGä.v,L?¬|A®ıátpÛ>B,‹7\0Rü±Fg—`)ÀêIÄF¥CÇÀÁ‡H¹Æ/.È€dÈq43\rÙ±ß€é+„\\	âK\0Wé¶\$Îı@öÑ+£Xe¢ÃwdMÈP\riP°q:\rsÄ8àºÄêƒ¹Šq0/\\d±Ò¤Œ†êŠã•°\r!8n­*vP…L?˜¹1N¦êƒF@n€±IáÀ®~‡”?åı¾‚ŠÃø? \\É‹s?¾LCøÀÊ\0`6ŒUoå´Š(ÏçªŞ¤€VŠ(@\ré/çú¿¨K¸t0: é±'1_\0ŞIÏƒ?HUSé_€¶‰ÃéÃ	”ÊAm¾.àƒ„<îÒEl¢°‚ñkÅ²ØÌ[Ó)¶Â€e¨NĞc\0\rª1‚)ÆÑo\"¢Lt]b8ÅÜ³ôQs½CÆ\n),„åóÆ¥S/yi‰Nù©rŞEäk‰€é‹`\0\r 8;/YÓë€NÜ4PÊI¤aÄy‚L‚•ª57mLXÊÌ%“óÌ~¾œûŒ3/—¨ÜıkµÁÆÈ±“Åœp\$RàêE¢H˜êáÚ1fQP‰Â,h¥Il@’*– ‘vEï€İ«&DQúˆŠ‡İtSBA…\rÚ[ÍµZÂ,‚ß |@-´\n…„à”ÌÀ‚8‰†‹ä×\0Ø£2£1¤	RB\"\0>~4¸Œ±·À@ÃpQs«7£êqf¿°0ë7	/ÁI1±eÙFQ ˆ¡øñ¥KŒnÂ^Æ;ì_oó¶jÚp›¤ …Hğ8\"KÆ:I`,a4\0jpÀ\0jñ¢#ÆkbñÂ<¸;‘0·GÆøvñÆÆ»ØÑÌì‹˜/H¿#\0eyÃ¯T	€Ù@qI‚Œİø* 2D‚WÜT\$e>‚Ñ„T¡–GnÑÜ ÁøG˜;kîg.*ş`íb™I(Ql#Ü_'EpşšîhszºECEâ|EÀ\"ª\r0'ë	5{”ÁkÇ¦‹[H\r‘œ©¸?Æ}¿8£È)‘¥ÇÒ7l}kGİäP¤‘¦®!¼~ìˆw`¨ç¡#ÒÁDüëÈy*ÆX\")Wn€VÓ®Ô˜’\\/S'TŒjĞö( à§(ÂàHgüB)Èn<‡F)»R¯À ¤·œC„!4à\"˜‚)€Ä8.\"c‚82\0KK¤¼âAèç‹ÔfTDª!®P-~®ÄTT”„FeÄO#fé&NzcÁŒ!}Á„ú	)±vGôfôSÎ9\0˜›ˆSÄ×GúDäq1¢4f|¹ûÉLK×È\"¶êêï*®«dBãHFB|„±±,/	„…\n5HT ®\"ºâ;[U\rN¶e!ƒØ«Üˆ(ûÒH\"‡qªç!ü‰² ‡Ó%	£HÌbÌEí\0İ#Q(†TÈ»#8¤21Llq[ÆXé¨Ï°õ¢¼\n„ˆäó“9'(ÉŠº‹…–AHn¹À†8TH'C£˜Óì#ƒÂÖ¤,\0†B@1zã­)ÚNS\${\0Rï´	gÙ‡ótkÅ¢*ÅÙ–æ\\Áç{J#üi‹Ñm°ãjx\"½¬eÀ'ìj±(v+\r†·	˜¯x@do8`AÜ¢c¡Š®*È\r’ˆs îÁûß¢Tğ»FaÃğ‚©ş¨haqLò¢ç±O¸èÆY…n !€pGğ¹ôc„¥ ê#*ºĞğ\0)\0‚r_\0>Ş—£Án¥\$q0Y’t±ÀåÛìRœ›&;”qİ˜c)O²\"P9™CÓ2g*LkLp*p\rÄï\$*Š\\Ñ¡ÊÁ*°Y‘á#)±ÈâÁ™x:a”Hp™¼`›¿u¦+vÊgšàé0Äb;ÅØÄ£ÌDgc\$Ï\$\\~&û¾ê+äD!\$e¢A‰v9ò´Ô!é	ÃhÑ9™	ÌÄ]&™úÑJÀ>#9Ì§µóœa«-R¸j Ô\nüL¬’˜EE\r±ÚA‘ZµI-’ÔˆÏ\$yö\0Ëb\nØîA’I¤?œš„S |V«²ÊºL³äİ­+,{¥IîN|´í\$ËœT€yäw¼ŸPU‰ƒ¼=òJpç#8ÜwBn8œ(	¼ªÒ?… )‘á“pü«İyËN\n%êËŞà‡Îø+eâ‚Òj)LŒ:aï€Ri‘X°t‹Êı\$pŒ&k¡`/’¦ƒ˜º%f,Vpì`¥xï`@ñàCÍ.ÑšĞõ§Ygg†ğçœT¼÷1 i/ˆÔà!dbRÒBã¿«ˆ¢;rÀ3™,l òqB hë…PŒÃ×ã=ìº}¦F¢ÿT/æ”IJê  ¶:/TÉPÁŞKƒC3K‚óR+Ë&İÂB/fA„ÄD:ü%ÄÅ—Ç¢¼Ìà9Ì]&¤ÆÓÌdh lÌn6¤¯æzÂ1Ü¾eË„Ó<Ó 0rGôÈP‡ÉÈŞ¬Èèµ·²1ÉKmM2t‡†•ÌÚi‘¬F›piÔÊ²­A|ÖiaŒŠMÈ´À3!Åw2+.‡MáÉÆ&¿BúÉ3{­M&k&&²M.±¢rI¬‡2ÌÏ¬V{,±2,K(jC6¨Iöğ‘¿eÔFN6 !@<LÒå,µÄeLÚşÅÍÍ\"4É£øAŞ8¡\\+È7\rhÓgûºZÁ”—F£0j4£ G&5œªq(\rŸ”'†[4;#îÛIÎğ\"ˆåa;líÑYú·ºñ„\0PÎ¿ÔïKÂœ7 ›¾P\rüDä€ª<äğÓÃíÏ9l‡ã|ND6tV\"—¨‚¾Ôæ:![M8}ó„)8¤óÍQã¢,³3MŠa@×³c˜^<Ù`öËÔÄù¿b\\Ï6ŒãsjD˜öœ€‡7´CØ>át%#ñ,¥ğ~µêúr!* ù4ĞĞä8ô}c0´Œ	 '\0ˆ(\rN œÊÄŒñ)Y²p~°ŠäÊĞñ— 3Á%K*¤ê9À°_Ìôg»îZÎth”È.–É®¤Ôe¥6îhá¢Sy†[9ÜÉ¢¼œTğiÇÍ\"Ù9¬™¢\nk,Ó®N˜#ÆÁ¾ôßTÆr¸>læ'x dñq†3•Ã\$k#Ñ\nÓ\"NôÂ/óS¡5C¥,\"Zèœ:¥³­´¶ÌÒW‰4¤Ö!ıMfø2)»ôW)®±i“,['\0ğ£¾l!9)Í{2øÇ'(ÉkÄÎf‡ÌÄ#ğÆÌ´êhj¤Bà	@ºÀ}Áºì¹+éÚ³„bƒÀ6Î^:8iíÅJF J°S@ŞÈÑ¶˜Èï8=³€Krc îJŸ†S?`“\nW·Ä;|óôƒëÀËé«Ës@‚´Àl±D=OF‹]\0ï2‚Y?ËÓ/M÷?’Ë£V=4D±¸ÀÅ:¹áÚ=BV”©@´Ër®dªâJ¤Ş´şnÏ\0ª€€ €¨Ş 	à#=–âˆDæXÃè\0·€òÿ8\"%ÑÔH,`XHLâ2—®°€4DĞ ˆÇìË¤„_”¦rñ½´¹üüàŒ#”	ÜæÚ/Ğí‰¸%, !‚›,Ÿ·ÇÙ.b9¾bI¹ú¬æà¬Æ¢D!›®h æDÀ¬Œ9¾\nØ&QĞîdÀ‚eï90 ŒHâ;¥x¸u/l¿#ÀÁ4\$Ğ¸M:ö4/Ï÷AÙˆÎE—VätÜ ˆÀ\"-ÊöĞèeÚ…5#8N±ñC!€ò½À6ÑPsÛ…G9œKAÛ¦	&jDÎÌ³ÜsÃ#çQLÛÙĞpÖØ>›TBw§}t\"9Â//ù 2‚r)Wf¶ˆ£U£Ë~—…äå¡	F°¢Rœàk€†’¿š`–G_5Ñ1Âì\$'‘¨…‹óÔq“!+ˆ\"zÀİG…#u¯¤	èp6Ñ\$AvFK€k²TX [ØÄlb@=\0¼\\x¡d ÑóG+Ø /^t ‹¿<Y¬Ï·,‹G‘F}´Gú¥¿Q<¥!Šó	&B½!´Å^‘Îö„I8.æ(¾ñGÉ™t“‡ŸI9‰	_Š÷I½\$Ë\$HC;îà>ò¼fH›˜e!bYR~\\M!Ep3 ¯=%‚e¿Éé‘&Q˜^ëM&¡R€²ÏÒ.Òt[Ù‘*‹Ò|jX¡–ÑÿJ2¢“íJ<D‚¸‰0¯%)t“ÒÌ…)ï7\"ª@ƒÑ¢Ğe*\0ò\$˜•bâQ¦}\"cDR*Í#R5%8&€ØúU!øQÔ1\"¯ÒR¾ÍG8¸yCÁ8t‚ƒME•0#§ğÎ…3‡7ÒÀd½ ˆQbûÃ•t Ò\0@µ\$g8,éI,„USNBÍ@ BD¼\0’`HÀÇRÚP2”·œéKˆ®OÛ\n¤}*Qn0\$PíM:˜¼µ¶[8bŠÅK‘ôO–OJÈ}4S³KCïâ–¾È=èÒ­LĞÚ4ìROAq4¾€éKûõÎñ5Ó8kÆÁ	'Nø¬”±Ò±Dı,âÓÓü·L‹´öQSO›–³:	\\D0™YB²¡:½nçµgs¬ÜN8 1gP=)~9ˆØ·Tw‹æ-?òÄTTu:º‚ômt?¬ÈeãÀSF>}+/ÑIE…4p=ÂiDÅH8ÓECRÂÓµZÈ]”\"qí7Y	vv‚Wà	wNŠ€©ÎÔLÛ]Ôß‚|úÅ‡Ç+óRéô	_”}JƒàŒsR»AnöÔ·SG•.,X—A.Š=-z¤:×á5„ôU®'QsL‚ÃÑ\"‰¥ÍJtÔ¢ìaâ–öº\rP­FÄì&<Ó*ÕÈŸV¢d'ëK¢úÔşZ˜o0)%Ü±À \\SLˆ­/Ï.9²{f/6D:ä!ŠG„~K.‘á\0’Kö¯ó£\n­\nN3–hàÏ êXÕ\0„Uj#¸ B<Jj@ öŒ(oÚÕzb¼¤ê€Ç…P¡ã•4Ü!Ë+“ª½'A£òì‹œa1¤„!{±ÎyĞ³ÜæV(zº®¶™rFr§G³Kì÷b\nƒ©¶-Ô­Qâ#B»æíª ìUÕX\rª™\r­`¡„EUiv<EDxTÂ\0G§Qá/•™9Ã6ÊÜº\r´ma.·IÑ.9y ‡€á+\$hN˜¢ê§µ“„*uOrÔd˜(=§ß(¼É‚UÊ*5Èfµ‡SÖì‘	ëÇ(Å¡÷ÖFAÚû!‚Õ'Ğ€u¢ÿMaw´çC²ôÖ’+¥GŠ‹ˆXuiÉ“Ö”O\n¾ªûŒEYµ,T¬Ör½¢áÖ€ÙCÑ‘I9O\ria”Õ´ ²õVdÍ)F)ÖŒ…mòˆQZm4Tlµr˜\nûTt­nV<ƒ“À£³T2­Zò±/;ŒäA±W!4ìÅKà\r`¤«Í9WëT&1XÒ5]Æ:ª|´ë0è3¬1C2W*zÙI5z£}ñ*ù \\Œ%p5¶¢şK-uQâ†ıA*’ÿÖXğ~õG<1f\"/€");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}if($_GET["script"]=="version"){$id=file_open_lock(get_temp_dir()."/adminer.version");if($id)file_write_unlock($id,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$f,$fc,$nc,$xc,$n,$kd,$qd,$ba,$Nd,$x,$ca,$je,$kf,$Vf,$_h,$ud,$gi,$mi,$vi,$Bi,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$If=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$If[]=true;call_user_func_array('session_set_cookie_params',$If);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Wc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$je=array('en'=>'English','ru'=>'Ğ ÑƒÑÑĞºĞ¸Ğ¹',);function
get_lang(){global$ca;return$ca;}function
lang($u,$bf=null){if(is_string($u)){$Yf=array_search($u,get_translations("en"));if($Yf!==false)$u=$Yf;}global$ca,$mi;$li=($mi[$u]?$mi[$u]:$u);if(is_array($li)){$Yf=($bf==1?0:($ca=='cs'||$ca=='sk'?($bf&&$bf<5?1:2):($ca=='fr'?(!$bf?0:1):($ca=='pl'?($bf%10>1&&$bf%10<5&&$bf/10%10!=1?1:2):($ca=='sl'?($bf%100==1?0:($bf%100==2?1:($bf%100==3||$bf%100==4?2:3))):($ca=='lt'?($bf%10==1&&$bf%100!=11?0:($bf%10>1&&$bf/10%10!=1?1:2)):($ca=='bs'||$ca=='ru'||$ca=='sr'||$ca=='uk'?($bf%10==1&&$bf%100!=11?0:($bf%10>1&&$bf%10<5&&$bf/10%10!=1?1:2)):1)))))));$li=$li[$Yf];}$Fa=func_get_args();array_shift($Fa);$fd=str_replace("%d","%s",$li);if($fd!=$li)$Fa[0]=format_number($bf);return
vsprintf($fd,$Fa);}function
switch_lang(){global$ca,$je;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$je,$ca,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ca="en";if(isset($je[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ca=$_COOKIE["adminer_lang"];}elseif(isset($je[$_SESSION["lang"]]))$ca=$_SESSION["lang"];else{$va=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$_e,PREG_SET_ORDER);foreach($_e
as$B)$va[$B[1]]=(isset($B[3])?$B[3]:1);arsort($va);foreach($va
as$y=>$og){if(isset($je[$y])){$ca=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($va[$y])&&isset($je[$y])){$ca=$y;break;}}}$mi=$_SESSION["translations"];if($_SESSION["translations_version"]!=-1835777754){$mi=array();$_SESSION["translations_version"]=-1835777754;}function
get_translations($ie){switch($ie){case"en":$xb="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Şa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Şr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ĞY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚0Ê\nÒãdFé	ŒŞn:ZÎ°)­ãQ¦ÕÈmwÛø€İO¼êmfpQËÎ‚‰†qœêaÊÄ¯ ¢„\\Ã}ö5ğ#|@èhÚ3·ÃN¾}@¡ÑiÕ¦¦t´sN}+ö\\òp¤Û¥æ+÷ÌˆÎ NbBØ­8„µŒ#’Ê'£ î³`P2ğ+à²‰‰ëÚÔ*ŠÂÔ/ÌhäúH¤\nê:ãœ9+8Šºí8˜7­Cs¨¿\r®`ÊØôj‰Ğ€ŒÁèD4ƒ à9‡Ax^;Êr@6­kğ\\³Œá|w-<QØæòÁxD ÂJÄ‹À­€xŒ!ò~ŸBÃ@ß£C«°)Š0Ë:Ò8ã(Æ¦³k‹Q9è;à:ÏèKN Œèä2c(îQ”sB‹4ğe\n¼Câ¼78o˜JŒCË:ÔaJÎ¾bŞ6%ñ°¨û´õpÛ4¯\"êÌ/c\\8£(Ì0´m 0Ö\r8§>ÏàPŒ:ÓüÀùˆ#8Î€ŒìäÁA#Ğ9ƒÈîğ -BÎ¼ŒŠHÇ®îk”–¶Â£Çc;¿JZM}b”ºp9ŒncQ<„\ruo,ÏÄl9´Ô¥úĞ1ƒ§J¾¸ÁB\0 öòÂ0ÅËˆÅã¸¾@(2L£ó38\"jÿŒãlíüÓâ9¦\"MF=Œ/¨½›FÄlB\r»ƒ0Ì6J©Df3 «È¨7£QÈÜ<£kåuc˜ÍbÇ±£v2ğREl­aÓTÊƒuvÑ:«pë(@Ç®kÛ}±ìºÃ 0í;ZC¶íì2ö;YJB!ŠbŒËã\\v[XË¼	\"Î˜oë^j(>¶¤ï#bP*1cpÖŸË;²á„É¶¯Û#\\ò]4|‚ÅH’2€Ê:(Ø¹³\\Û>k³Ö8\r(É²#£.I½Û?\0007%	T=GLV©şgÊwr…#IT™'J¼¥ÙÊ£”®9K2Û/LÉ–MØèñ“q@	Å9¹\\“j)§à95güòù¯tAÁ™Ò\\TUQ´\"Š`2:w2WËÕä™~ŸÃ _l\r&¤ˆ3)fìŞúız€‚÷0@˜b`¯9ÿ•aŒ÷<‹è·›ğ@wa¼‚°¬(€ zÏ/€€\0RHˆ	\"q˜Ñ…\\úÒ9°È†“&EÌ©!‚¤øĞ²š²	™5%ÄšØxl!ğl0Ä¨–â`ÛƒiüQñ\"8HVIN8d'Å=u“Xä«Ò;­_I\"zÑ „»’ÜA×c˜48›80Œ0vNÑGôvÁHñØ;æî™WNÕQi’<)…@@Ä\\ R&ª Ïd_Ô|”crÉÌÀ'nINpr[PH»¤cICF`§0Ì‘â@H¥Ègr¬›#&HÂ0T‰è	µ%Ï‰\$©”É2ÎKKÕrHtâe4Ñ°O	À€*…\0ˆB ET@Š-	c*½X›àÂ‰Â‚	¢è4ú¢dd½W¸O,kMJI<p	Ho5Dr”š¢Ñ´Â\r´¨ÓÇF˜HYÊ1%ı‘#|bÍQü•áÁÁHäˆ€EìéZ³YON›(\ríá¡ L>SÌ÷™ÄìC	ò\"Š@é7¹ƒC8h’:(?ˆ\$PR4\$‰&&ğ0¥AI[êº›ô\r\\'JÕ\n‡ßRñE¡¢— Üâ)»%cïe\0‡NÉ\n‘RaX4© `Å]!àü±I’k\nyù\nd9.»>‚Lª¹aèÙiï>Aû³å¡kÚJ€íá•DaA#¤xÓUWv¼„g6g+»QJ§Ì\"˜Ó`‘{4zLÙ;å( Aa JRıgIóH7Å2%.zC‘ƒ´÷”Ù ¢HAx ¾æÂ*‚B`Ì(\n\n7Õ¬ZÆÛÉO	m‘TàX¬Lr8¿`[IìP ÁX2ÿ˜KÒÒ°Œ-Äiƒ5i°3o%\n¦ó6lS†pP.¿×Òó™l_\nñ‹/Âö¥B›€™D'ro\"Ü„@²!Ä÷¨»°È8Pç‘¼D@(+†PÅ”¬å®ÁIhBŠjÈpˆïT¿_%a3lÀ·Ä³Ÿ0†‹9egY—bğLKhI3¤ÀÅ“ê„õWIÈ¨ùè°˜£¯eyP:=À,û¢©»/Ö)Óš-\rŸƒ-C¨§ãZq£óù1QÕO-A¦^¬•@wKQâÀsRªÁXk¦Ù	Lqj*o!td¿—‡”©QF½¯Åó`›‡E‘=XY'Ì½Ú3-P¡YlÒ™ø¢jÀ6½PPEÎiß%º²%©´>¡¨¾£b*y¹ô¾0Hîîê–É5<¯ÕZSsTÍã´­G\nlı!nQ/ôßà›ÿƒï¾É¸d¯Úeú£„8átUÚUâ:¦8\\9(aÄ	ÿ	+¥·Ï&\\xŸáÓƒñö 6â}ñ¾»4ç2Ÿ}V±ÊuÄW;™óËsÏ¹·ÄV¬„®³rh_¢\r`´Sn§ìSv„I‡5<‘–CğÙ%tY‚å6MÂ×hóI.=D¦Ïåcz\\ºDâ‹F±ÕÏZç\\ÓŸZşØÍØË©:6×©íÄmg—6âo«ÙÕĞ7^í%#ÇğmõS±»s›Ç2û­Ö<¶€á8Šê¿ïÀ}'Ÿé>`”ZbçîÓ¾Â®³0Šk<ö¡z¦Âœ‡”dJJ!4ü›ŒòCÍü—x›£Lq/PJ>'Ëõ~ozæ¾´vRÆF©Ì5Ëæ˜ç×„>Å›}ÅÖUwA¤%êõå”o7tæŞGœ¢ãÓºJOŸßæo/¨ï\\/¯øüˆpşfî‹>VæôgOOòõ´>¯İ\0ƒìÛ@¨¸#êò·bÒ¸ONÚ‡Oï¨õ«fl°:»ÏÀfÃá\$F\n‚Z4ïJ6Inp¨àª7>èBQ02øïô@:ãÀE¯¢Ö šPh˜@ìr#NU/Ìtl\rhHÂP 0fğÙãpÔ0¨åo2#Ã~¿fÒ#\"â- –„ÄÏoäm(Æe8\rªnäL ä2>\0Ø`Æi€Æ\rnÒ\$ml#ªN`ÒÆ°/Ò'Æƒ&Ôz ª\n€Œ p)Å£ƒšÅn\\æÂZ‰h:Æl€ĞÊ‚àñ6½ÌD\"m,3‚±.Ô4JR.ñı@Ø æ6¢óÂœ.âš¹ü3\ngÆ°–jÂYfsé¾¦h²b*â\$†E£\"¢Ê„ä'!µê·\r¢àåZ-VÒ±®ë-B¦cÕ‘¿Môİ‹;‚ç\räşH°1ØÔ-Ø@‹C,‹4«‡¤µªÔîĞÆ°&^ÖÂİà@	Š@[í¬ íÌ\0Œ /†ÃÊ®„\0ê%ê¤d¨'e(-€ó#@†<úıGºy«vZ9 š¦ˆ)…È—íî:rR1ª&ÊYoø«†<ı.R‚š-K¬2ğb¿`Ê¤r\$Îl/£`ÆES(rŠQâàò*@";break;case"ru":$xb="ĞI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hĞX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ğ&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)û‰\0”	Nd*;AEJ’K¤–©îF°Ç\$ĞVŠ&…'AAæ0¤@\nFC1 Ôl7c+ü&\"IšIĞ·˜ü>Ä¹Œ¤¥K,q¡Ï´Í.ÄÈu’9¢ê †ì¼LÒ¾¢,&²NsDšM‘‘˜ŞŞe!_Ìé‹Z­ÕG*„r;i¬«9Xƒàpdû‘‘÷'ËŒ6ky«}÷VÍì\nêP¤¢†Ø»N’3\0\$¤,°:)ºfó(nB>ä\$e´\n›«mz”û¸ËËÃ!0<=›–”ÁìS<¡lP…*ôEÁióä¦–°;î´(P1 W¥j¡tæ¬EŒ£\$Â˜ìÂŠ’´ƒ1ÚU	,òTúè#ìâ¶‹#Äh‘Ò¾Š²äº”‹Yvš±j 0Œ2ÏLZjÿ¹n;†™£+»èÎ f„˜‘IĞòA­ãPhîÒ‚¿£\$¥ÜÊï2^\$}\"¢9	¡°¬på1a I¡®BÏ<»TÑ¡\0;-ö\\SqlÚ¼ÈuzŠ¢-JL¼ËÊ¢F&O}&†ª5q?CÏV2¯«)ü56d+RüCˆÉ<ç%¯NÁ‘ïGQ8!\0Ğ9£0z\r è8aĞ^÷È\\0ŒƒhÒ7£\\7C8^2Ø8ğ:a˜Ò7á!ä¸·’¡‡xÂ%U[	.#˜X‚ï»‘#P5•aØ®LN\nbˆ˜4á‹ª\"Èñõ–äMk”éN	±\0˜¸Œ&A×Ë2h”2Z[‘eG&0™,ğffı\rÛ´C ®¥å\\.½r:b¸Â9\r×øÎŒ£#V& Në»¯¯Öõ»l;ÆFƒ³vB»)¥ú2M/*~º‡·*ÊŒ’W§ènÕ?9ÏnDß©!ë•9kÉ.°9\\Ş±`ÊÉŠŸ&Óğ\"hGH›{S‰Š|¥Êmhhr©|Æ½9]êie/5•rY%J‰ÀÕYÆi„¹=[Ñô™6eN½ÚÚš§º4Ş2Ÿ0B—ÓtU¹[k<¯Ğş%}bØ÷T.~Äş‘`Vjkj<è@‘’JbJ[Gi ¦#DJ…Î›Zk>7Æ4J² FÑ¦”è(‹“£;Ša¦¦Î°\"ƒÂÁB§1ŠÒƒ%†\r~ıÜjSï_ô˜õˆÈ­8i-\0´qŒÉ‘°kïèş\rÉ	MbÑ=pÍj€ ˆ¡i\rse:³Â°’`tIÛ)bÄËÑ¼RÆ	3¢¨”N*\"7‰Î”ç¤ş™{,((u>µ_²€eG5šB@‰T7€l¬˜ÇP_Ááe\nìî%–÷¡g,A‚à®£šah/FGˆô‰ŒJğlÚ¶³‘ œº©PXHˆl^d[¶cf%7”É\"OÆ‹›C2YÀ>B§&É°‹“Ò€íJ'ËÌyJÑîTÇèi+T°WÍiËi„eÑUJRù³É4y%KŒÅ)²i;¶c¸Gßrt@« ©bÆÂ˜RÀ¶A´å-–Ù‰€mXè˜\"rIHd\$%HÀ¯%âWˆmeq*¿fƒ&IŒj)†…rR@a\rÁ¬9‚\0ÌÁ\0uaÁ¸3‚\0‚¿Wûdáˆ0àÈÀAè]K±w1 æğdb„:7&:ÇÓÂz–HjxŸt[\n\n\ns£h¦b¾.™<ÇVç¹qËóÖBDŠ­ÈGGŠB‡3Å¢\0“”³PuU+ÇDS¥Ö»Wzñ^kÕ{¯î¾éƒ\0`Lƒ0†Ãsb\0¾Ÿ1F,T\njOœRò£²<c\r#%dóA²ÅÇ<cCAÇri:Å¸IDy`Âğÿ½2‚}+B•l¸6ÔHCAyÓ§ŸàH( !¢±\0@ÃHl\r€€1\\àÀi8r\r¡•»ÌÃ‘¡Œ1†PæÃ0u¹a°7†uÿqÙÀhĞ4\\æn˜ k²›†êŠC`s.§Tò¤rN˜Pêd*³ºÙâbvjâJhjS:Ø¿ÓXEûùàPĞ±ôCõ›PP\\IGlA€\\FåzÃx È4‡k’C=ÔÅL:RPÓICpo—\nåğïu/Ù\r gAB,GğçÏ¢˜m,½B¬g2wJW?‹·¬\"P]T‘%3ÇÒ<ÎÆFô‰ë|eBz——>KE¼ÀN~QÄÙ…<¢œ“®@Jæ®.e°£W™¸”%\$ÎFD©LF)@£kLIËÊcE- J‰aØB\$›)%š^¿¬YÒ1\r=Héz–È+EF­´LÂi3¥!¬I¢2:V‘„TZ@'…0©\0b¤¬›È0Ç9xô–}ÀŒö\r\\Åä%°kå*4AˆFPsY÷_¶¼ªHY%Y´‡“œ¸Ò”;Æ/&Èül¬Î.„d´Aé„Ü”›SAu*Mj¬‹«KÿŸ„ä¾“É\\0T\n\nTë®\\¥¢*œfÑ—§ZxÎÙCÚ(\rMDÂ|Íuº\":Ş+D3†c´\r•ÍT¢¼²œ–¯J¼–§ÈmÊVã¢Dü­?ÆşLUÜÔ™stq•^Ù+šu’Û8§‘ôk9eÀĞFfP‘ˆ‘#+.sÙ~cÓÈGhëZ[õUW–úÂ äg=-|©ª¼(y¥´Å¯²–¦ºYå–Ú­;U+gf·³)Ú¤h¾Ô{rOîßÄ‚Y¼t~fCU`£¦Û @.ö©ßÔä¥—ğZu2éHE¬«„¹¦JP5˜H\nóÇMÏÎ#±rŒŠr:h=äpı7²yÀËô\\Fl Ù<Š¢¾X™Ê}%¯î'/€kUX€HœwAAû¨ç³Yì¶CßÂc¹Õ³0í†-HzÓ“Ü—Üf<û#¡†Õ>1ğå­dOµ>Iü³_Ê?qÍŞÂÈ\$'Ë@}oœ‚Fœù¢“*˜ˆmI/<âšW!Lˆ\"kp\nkÄ|éÜ©ëpâÄ@*Äö·aO¯Ò(ò-º‚¥XË‚ôW©nËFTóíÈmàÑØŞO¦Œ*‡>×\"Äk\$Ò¡V&¢2­FÉ0xıÏ&8&”îªÆ!wH†ÜG~Ald¸UÅ\$î0~ğÅ¦éì˜X‚XÉÅY  ¨\n€‚`€-6‘cĞ£\\Pl,Wn@[Î8&ÂNâê[m†5ä\\HÒa¢\$nÀ^1æöÀÊ”\$şÔQ…ptÂ[ÆmN´L\næª²K4FÇP-!æØ™gNÒCÒ‘4ôBº+ñ<Ò±BïqH€O Qñ	¦­Ñ^!Ñ>‚dnFä¬’ğŞòÈ#¬Í§0,hÙL¢ĞŒì\$qDDĞùñxòL´ŒÑ¦b#¨ˆ¢ƒÜ“ÑQV(*¾*ˆÑ¢ö¢C³BI‡\rñCÑ¹h(u©6(1Ş‘Æv±ğû§ÄÉ\$*R%Â` ÂX„ MCÔ\\dxëQ,\$'„&\"Y2ß¢F=ò\"â\"ëQ²€d`‚‰j@ò\$âEvÿÄÓ#OlöHÊ£%IÏ\"¦¥nh’6*¢D[NH÷ĞÀå-x)±\0pâîÕg:Jo\\p*/ƒ=Hx÷o¨ì|±ã„8Œ#‹p0n¥!L£‚Rš¦1\$Âë!%b0dPenVÿQ,²¿-ä¶ÍZDêş&®}ê.ïöle¤{¢şï+ FòNqö7²ú*’ş²1g0Ròùhšÿ²ä´%Æ9ÙoÌ„Îm2Î”7ÿOÅ3“\nù§û+ÌÒuQ¬u„Øuåv'¾ŠÀä\rààd¢\"b£Z´ÎE˜ùå£7ç‚XçÓ6As*ÚOüYm®êÆ\0f·\0\0F[Q¼4ÓOì¥9Ã¸ÌSpÄŞ4|â@&Í3'dpå íîìñ©[/É€²Ç1æŠOšó#11úxr	‡½/ã=|K°¯2NE2¤	0sÎÒ3æÎ³Ø=q@qòÈ‹(G=®ìäÓøWS)=%¤«Ê 6Ë0aCC”#A“¥“gnzŞˆ\"3.‚©83,=pàòƒ^Ü`dñÊ;Ù>¥¥A¨)1‰?ERç\"ÅEÔ	BKFF¨“b±FÑç-ë_GI§G‘†J©—H%T‰&c	””\$™\$qØ“ÙJ4G.*•.)°<ãN8óë01´Î(TÒL­¶P”ÛMóqôäZôÑ´ïß@sÒ.¨o\$&-„,4ÎG¤JÌ\$=	%DP•Š²y‰†£-¨LCã‡HÙ1»§MÑ¿\nîŸ\$Ê³Ã\\#ñ£ ˆ~ˆÅ¥Q\$*,\$à“dä}èN:Tçíî6˜/’µ8Õ‡¯Sã\nPåÂl˜ÿ¨;AÏ»œj(Ğşí.Ô(çô#±eAÑ‰PÕ²lØç¡Nï.§\\cŸ\\µ¹Ls&‰3,Ë[BïAÒIFu´şhe…Dsõá,UÓ^•ú¶õßEtÉ±Ù`”-U\rÓ`^4	J•¢ÂRtòÖG½^òÃcıaóÆ·’ÆÇÜb„ÖJ\$\$,j»ïªÌğSÌ%Y¯,@Hû¯ët‘F”t}3İ]3g0–öy[´wL³àåöuK„g¶%C‘g!Ğ¢ Çv‰Ã´|¥ZRƒiv‰IFËa´köª,yk67Ek¿!e¯Bäê‹ã\$,8'A„v\\QãƒW°\$J¬„Mv[t</6&}…Ão.Go‰ßoÌ Ì°`:W(÷gö^¶Fd—Œ‹p%[ô{-¶+\0ÂoqÏŠjõ{6ş=×pvÒ´BSuH	u—%s÷at7o•:×\niõë^Ccqq¤?-Òâëkv,C“vh—nâípZÛU»]£ózKzÒıtƒ{PDt\"õ{¢Ózõƒ7—L²hÂ›‚‹zu}ĞY|Ãšxl•`°±cP_sğÇs°%Pv{\"PÌ­WrXtõJB§|Wúfÿu×&E¿}-–.¡KN’³?c?iV‡Ft»;vàpÏ»,Â·'%MJÄ×±}±kKo+J¶#…‚`L1‰…í&òƒe.i¦Óq7†Ê*’øa‡d<.§#¦¼{P9ª¢áÉÓ&Ø‚úÁ¡…VaRM±,zÊt÷tµFæÖVQqGøg–‹Tœ!¬ñ j8hÄ\r€VR…>hBƒbºÕ5Be4ì\$Ë6e'³Â´¸¿uM!s•n>RäëïROdŞ\n ¨Ÿ`q}n¡‰”‹wC©j“æ·“ç­ƒn}¦í†€&i—•.GV„:ÉØ‡•ùJW•{å7L¬“hvéõ\\ÉëYÓ9—ØI¤17aˆQ¬F¦Cg¯W¥My™KFU¹ÍmÚ«qÛ%uã\nÏ¸ÿ‡tV¢àAqØĞ‚/&Ò/!ˆ*ê\nC³&PpUåXvV°ÿ×VäÃJS/’ô*¥,'†²E†?P‰0‡3Å=‹b\$¹†t“¨ÿZÔš#Ekc>ïË\$­‚ïšYëj)ŒÛ,ùD,34fÉ£rç	øïzW£'øÁc8İ)!¹.6+}¤y’e°•h•öùSºL¬ˆ˜ÿ…ë“@óE¦ˆœ[GlØâ¿TSşëxÖ\r‘:ğÌO.WJÀzÌÍ€´äu}Æ€ZìÂ0‚š¥¦ìÇos¥L~OÕ§YE™–„XÄxû¤•„EL[y‡*…Lê….zd¸·1Ÿ\"^“xşé¨/ÉXó½±X¨q‰_•˜›s7o XrcvSl<XÆ)“Êk#UÚÈ1Wñ «ø@";break;}$mi=array();foreach(explode("\n",lzw_decompress($xb))as$X)$mi[]=(strpos($X,"\t")?explode("\t",$X):$X);return$mi;}if(!$mi){$mi=get_translations($ca);$_SESSION["translations"]=$mi;}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Yf=array_search("SQL",$b->operators);if($Yf!==false)unset($b->operators[$Yf]);}function
dsn($kc,$V,$F,$sf=array()){try{parent::__construct($kc,$V,$F,$sf);}catch(Exception$Bc){auth_error(h($Bc->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$wi=false){$H=parent::query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$fc=array();class
Min_SQL{var$_conn;function
__construct($f){$this->_conn=$f;}function
select($R,$L,$Z,$nd,$uf=array(),$z=1,$E=0,$gg=false){global$b,$x;$Ud=(count($nd)<count($L));$G=$b->selectQueryBuild($L,$Z,$nd,$uf,$z,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$nd&&$Ud&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($nd&&$Ud?"\nGROUP BY ".implode(", ",$nd):"").($uf?"\nORDER BY ".implode(", ",$uf):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");$wh=microtime(true);$I=$this->_conn->query($G);if($gg)echo$b->selectQuery($G,$wh,!$I);return$I;}function
delete($R,$qg,$z=0){$G="FROM ".table($R);return
queries("DELETE".($z?limit1($R,$G,$qg):" $G$qg"));}function
update($R,$O,$qg,$z=0,$M="\n"){$Ni=array();foreach($O
as$y=>$X)$Ni[]="$y = $X";$G=table($R)." SET$M".implode(",$M",$Ni);return
queries("UPDATE".($z?limit1($R,$G,$qg,$M):" $G$qg"));}function
insert($R,$O){return
queries("INSERT INTO ".table($R).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($R,$K,$eg){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return$X;}function
quoteBinary($Sg){return
q($Sg);}function
warnings(){return'';}function
tableHelp($C){}}$fc["sqlite"]="SQLite 3";$fc["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$bg=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($Vc){$this->_link=new
SQLite3($Vc);$Qi=$this->_link->version();$this->server_info=$Qi["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$d=$this->_offset++;$U=$this->_result->columnType($d);return(object)array("name"=>$this->_result->columnName($d),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($Vc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Vc);}function
query($G,$wi=false){$Ne=($wi?"unbufferedQuery":"query");$H=@$this->_link->$Ne($G,SQLITE_BOTH,$n);$this->error="";if(!$H){$this->error=$n;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$y=>$X)$I[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$Uf='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Uf\\.)?$Uf\$~",$C,$B)){$R=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($Vc){$this->dsn(DRIVER.":$Vc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($Vc){if(is_readable($Vc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Vc)?$Vc:dirname($_SERVER["SCRIPT_FILENAME"])."/$Vc")." AS a")){parent::__construct($Vc);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$eg){$Ni=array();foreach($K
as$O)$Ni[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Ni));}function
tableHelp($C){if($C=="sqlite_sequence")return"fileformat2.html#seqtab";if($C=="sqlite_master")return"fileformat2.html#$C";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){global$f;return(preg_match('~^INTO~',$G)||$f->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$M):" $G WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$M."LIMIT 1)");}function
db_collation($l,$qb){global$f;return$f->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($k){return
array();}function
table_status($C=""){global$f;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){$J["Rows"]=$f->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($C!=""?$I[$C]:$I);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$f;return!$f->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$f;$I=array();$eg="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$J){$C=$J["name"];$U=strtolower($J["type"]);$Tb=$J["dflt_value"];$I[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Tb,$B)?str_replace("''","'",$B[1]):($Tb=="NULL"?null:$Tb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($eg!="")$I[$eg]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$I[$C]["auto_increment"]=true;$eg=$C;}}$rh=$f->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$rh,$_e,PREG_SET_ORDER);foreach($_e
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($I[$C])$I[$C]["collation"]=trim($B[3],"'");}return$I;}function
indexes($R,$g=null){global$f;if(!is_object($g))$g=$f;$I=array();$rh=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$rh,$B)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$_e,PREG_SET_ORDER);foreach($_e
as$B){$I[""]["columns"][]=idf_unescape($B[2]).$B[4];$I[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$I){foreach(fields($R)as$C=>$o){if($o["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$uh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$g);foreach(get_rows("PRAGMA index_list(".table($R).")",$g)as$J){$C=$J["name"];$v=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$g)as$Rg){$v["columns"][]=$Rg["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$uh[$C],$Bg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Bg[2],$_e);foreach($_e[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$I[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$I[""]["columns"]||$v["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$C))$I[$C]=$v;}return$I;}function
foreign_keys($R){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$J){$q=&$I[$J["id"]];if(!$q)$q=$J;$q["source"][]=$J["from"];$q["target"][]=$J["to"];}return$I;}function
view($C){global$f;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$f->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$f;return
h($f->error);}function
check_sqlite_name($C){global$f;$Lc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Lc)\$~",$C)){$f->error=lang(21,str_replace("|",", ",$Lc));return
false;}return
true;}function
create_database($l,$pb){global$f;if(file_exists($l)){$f->error=lang(22);return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$Bc){$f->error=$Bc->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$f;$f->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$f->error=lang(22);return
false;}}return
true;}function
rename_database($C,$pb){global$f;if(!check_sqlite_name($C))return
false;$f->__construct(":memory:");$f->error=lang(22);return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){$Hi=($R==""||$cd);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Hi=true;break;}}$c=array();$Cf=array();foreach($p
as$o){if($o[1]){$c[]=($Hi?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Cf[$o[0]]=$o[1][0];}}if(!$Hi){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$C&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($R,$C,$c,$Cf,$cd))return
false;if($Ma)queries("UPDATE sqlite_sequence SET seq = $Ma WHERE name = ".q($C));return
true;}function
recreate_table($R,$C,$p,$Cf,$cd,$w=array()){if($R!=""){if(!$p){foreach(fields($R)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$Cf[$y]=idf_escape($y);}}$fg=false;foreach($p
as$o){if($o[6])$fg=true;}$ic=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$ic[$X[1]]=true;unset($w[$y]);}}foreach(indexes($R)as$ce=>$v){$e=array();foreach($v["columns"]as$y=>$d){if(!$Cf[$d])continue
2;$e[]=$Cf[$d].($v["descs"][$y]?" DESC":"");}if(!$ic[$ce]){if($v["type"]!="PRIMARY"||!$fg)$w[]=array($v["type"],$ce,$e);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$cd[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$ce=>$q){foreach($q["source"]as$y=>$d){if(!$Cf[$d])continue
2;$q["source"][$y]=idf_unescape($Cf[$d]);}if(!isset($cd[" $ce"]))$cd[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($cd));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$C":$C)." (\n".implode(",\n",$p)."\n)"))return
false;if($R!=""){if($Cf&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$Cf).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Cf)))." FROM ".table($R)))return
false;$si=array();foreach(triggers($R)as$qi=>$Yh){$pi=trigger($qi);$si[]="CREATE TRIGGER ".idf_escape($qi)." ".implode(" ",$Yh)." ON ".table($C)."\n$pi[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$w))return
false;foreach($si
as$pi){if(!queries($pi))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$C,$e){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($R."_"))." ON ".table($R)." $e";}function
alter_indexes($R,$c){foreach($c
as$eg){if($eg[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Si){return
apply_queries("DROP VIEW",$Si);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Si,$Ph){return
false;}function
trigger($C){global$f;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$ri=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$ri["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$f->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$df=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($df?" OF":""),"Of"=>($df[0]=='`'||$df[0]=='"'?idf_unescape($df):$df),"Trigger"=>$C,"Statement"=>$B[4],);}function
triggers($R){$I=array();$ri=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$J){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$ri["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$J["sql"],$B);$I[$J["name"]]=array($B[1],$B[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ROWID()");}function
explain($f,$G){return$f->query("EXPLAIN QUERY PLAN $G");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Vg){return
true;}function
create_sql($R,$Ma,$Ah){global$f;$I=$f->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$C=>$v){if($C=='')continue;$I.=";\n\n".index_sql($R,$v['type'],$C,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$I;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($j){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$f;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$I[$y]=$f->result("PRAGMA $y");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$rf){list($y,$X)=explode("=",$rf,2);$I[$y]=$X;}return$I;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Qc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Qc);}$x="sqlite";$vi=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$_h=array_keys($vi);$Bi=array();$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$kd=array("hex","length","lower","round","unixepoch","upper");$qd=array("avg","count","count distinct","group_concat","max","min","sum");$nc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$fc["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$bg=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($yc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Qi=pg_version($this->_link);$this->server_info=$Qi["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$wi=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$d);$I->name=pg_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$d);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($N,$V,$F){global$b;$l=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
value($X,$o){return$X;}function
quoteBinary($Sg){return
q($Sg);}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$eg){global$f;foreach($K
as$O){$Ci=array();$Z=array();foreach($O
as$y=>$X){$Ci[]="$y = $X";if(isset($eg[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Ci)." WHERE ".implode(" AND ",$Z))&&$f->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(is_numeric($X["val"])&&!preg_match('~LIKE~',$X["op"])?'|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
value($X,$o){return$this->_conn->value($X,$o);}function
quoteBinary($Sg){return$this->_conn->quoteBinary($Sg);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($C){$te=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$te[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$C).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$vi,$_h;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2])){if(min_version(9,0,$f)){$f->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$f)){$_h[lang(23)][]="json";$vi["json"]=4294967295;if(min_version(9.4,0,$f)){$_h[lang(23)][]="jsonb";$vi["jsonb"]=4294967295;}}}return$f;}return$f->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$M):" $G WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$M."LIMIT 1)");}function
db_collation($l,$qb){global$f;return$f->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", CASE WHEN c.relhasoids THEN 'oid' ELSE '' END AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($C!=""?$I[$C]:$I);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$I=array();$Da=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$B);list(,$U,$qe,$J["length"],$xa,$Ga)=$B;$J["length"].=$Ga;$eb=$U.$xa;if(isset($Da[$eb])){$J["type"]=$Da[$eb];$J["full_type"]=$J["type"].$qe.$Ga;}else{$J["type"]=$U;$J["full_type"]=$J["type"].$qe.$xa.$Ga;}$J["null"]=!$J["attnotnull"];$J["auto_increment"]=preg_match('~^nextval\\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$J["default"],$B))$J["default"]=($B[1]=="NULL"?null:(($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2]));$I[$J["field"]]=$J;}return$I;}function
indexes($R,$g=null){global$f;if(!is_object($g))$g=$f;$I=array();$Ih=$g->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$e=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Ih AND attnum > 0",$g);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Ih AND ci.oid = i.indexrelid",$g)as$J){$Cg=$J["relname"];$I[$Cg]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$Cg]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Jd)$I[$Cg]["columns"][]=$e[$Jd];$I[$Cg]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Kd)$I[$Cg]["descs"][]=($Kd&1?'1':null);$I[$Cg]["lengths"]=array();}return$I;}function
foreign_keys($R){global$kf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$B)){$J['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$ze)){$J['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ze[2]));$J['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ze[4]));}$J['target']=array_map('trim',explode(',',$B[3]));$J['on_delete']=(preg_match("~ON DELETE ($kf)~",$B[4],$ze)?$ze[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($kf)~",$B[4],$ze)?$ze[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
view($C){global$f;return
array("select"=>trim($f->result("SELECT view_definition
FROM information_schema.views
WHERE table_schema = current_schema() AND table_name = ".q($C))));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$f;$I=h($f->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$I,$B))$I=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($I);}function
create_database($l,$pb){return
queries("CREATE DATABASE ".idf_escape($l).($pb?" ENCODING ".idf_escape($pb):""));}function
drop_databases($k){global$f;$f->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($C,$pb){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){$c=array();$pg=array();foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $d";else{$Mi=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($d!=$X[0])$pg[]="ALTER TABLE ".table($R)." RENAME $d TO $X[0]";$c[]="ALTER $d TYPE$X[1]";if(!$X[6]){$c[]="ALTER $d ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $d ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Mi!="")$pg[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Mi!=""?substr($Mi,9):"''");}}$c=array_merge($c,$cd);if($R=="")array_unshift($pg,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($pg,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$C)$pg[]="ALTER TABLE ".table($R)." RENAME TO ".table($C);if($R!=""||$vb!="")$pg[]="COMMENT ON TABLE ".table($C)." IS ".q($vb);if($Ma!=""){}foreach($pg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($R,$c){$h=array();$gc=array();$pg=array();foreach($c
as$X){if($X[0]!="INDEX")$h[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$gc[]=idf_escape($X[1]);else$pg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($h)array_unshift($pg,"ALTER TABLE ".table($R).implode(",",$h));if($gc)array_unshift($pg,"DROP INDEX ".implode(", ",$gc));foreach($pg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Si){return
drop_tables($Si);}function
drop_tables($T){foreach($T
as$R){$P=table_status($R);if(!queries("DROP ".strtoupper($P["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Si,$Ph){foreach(array_merge($T,$Si)as$R){$P=table_status($R);if(!queries("ALTER ".strtoupper($P["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($Ph)))return
false;}return
true;}function
trigger($C,$R=null){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$K=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($C));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$J)$I[$J["trigger_name"]]=array($J["action_timing"],$J["event_manipulation"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($C,$U){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($C));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($C).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($C,$J){$I=array();foreach($J["fields"]as$o)$I[]=$o["type"];return
idf_escape($C)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($f,$G){return$f->query("EXPLAIN $G");}function
found_rows($S,$Z){global$f;if(preg_match("~ rows=([0-9]+)~",$f->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Bg))return$Bg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$f;return$f->result("SELECT current_schema()");}function
set_schema($Ug){global$f,$vi,$_h;$I=$f->query("SET search_path TO ".idf_escape($Ug));foreach(types()as$U){if(!isset($vi[$U])){$vi[$U]=0;$_h[lang(24)][]=$U;}}return$I;}function
create_sql($R,$Ma,$Ah){global$f;$I='';$Kg=array();$eh=array();$P=table_status($R);$p=fields($R);$w=indexes($R);ksort($w);$ad=foreign_keys($R);ksort($ad);if(!$P||empty($p))return
false;$I="CREATE TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." (\n    ";foreach($p
as$Sc=>$o){$Lf=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Kg[]=$Lf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$_e)){$dh=$_e[1];$qh=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($dh):"SELECT * FROM $dh"));$eh[]=($Ah=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $dh;\n":"")."CREATE SEQUENCE $dh INCREMENT $qh[increment_by] MINVALUE $qh[min_value] MAXVALUE $qh[max_value] START ".($Ma?$qh['last_value']:1)." CACHE $qh[cache_value];";}}if(!empty($eh))$I=implode("\n\n",$eh)."\n\n$I";foreach($w
as$Ed=>$v){switch($v['type']){case'UNIQUE':$Kg[]="CONSTRAINT ".idf_escape($Ed)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$Kg[]="CONSTRAINT ".idf_escape($Ed)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($ad
as$Zc=>$Yc)$Kg[]="CONSTRAINT ".idf_escape($Zc)." $Yc[definition] ".($Yc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$I.=implode(",\n    ",$Kg)."\n) WITH (oids = ".($P['Oid']?'true':'false').");";foreach($w
as$Ed=>$v){if($v['type']=='INDEX')$I.="\n\nCREATE INDEX ".idf_escape($Ed)." ON ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." USING btree (".implode(', ',array_map('idf_escape',$v['columns'])).");";}if($P['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." IS ".q($P['Comment']).";";foreach($p
as$Sc=>$o){if($o['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($P['nspname']).".".idf_escape($P['Name']).".".idf_escape($Sc)." IS ".q($o['comment']).";";}return
rtrim($I,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$P=table_status($R);$I="";foreach(triggers($R)as$oi=>$ni){$pi=trigger($oi,$P['Name']);$I.="\nCREATE TRIGGER ".idf_escape($pi['Trigger'])." $pi[Timing] $pi[Events] ON ".idf_escape($P["nspname"]).".".idf_escape($P['Name'])." $pi[Type] $pi[Statement];;\n";}return$I;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Qc){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Qc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$f;return$f->result("SHOW max_connections");}$x="pgsql";$vi=array();$_h=array();foreach(array(lang(25)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(26)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(23)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(27)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(28)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(29)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$vi+=$X;$_h[$y]=array_keys($X);}$Bi=array();$pf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$kd=array("char_length","lower","round","to_hex","to_timestamp","upper");$qd=array("avg","count","count distinct","max","min","sum");$nc=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$fc["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$bg=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($yc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){$this->_link=@oci_new_connect($V,$F,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
true;}function
query($G,$wi=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'OCI-Lob'))$J[$y]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$d);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$F){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$z,$D=0,$M=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($z+$D):" $G$Z"));}function
limit1($R,$G,$Z,$M="\n"){return" $G$Z";}function
db_collation($l,$qb){global$f;return$f->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();$Wg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $Wg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $Wg":"")."
ORDER BY 1")as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$J){$U=$J["DATA_TYPE"];$qe="$J[DATA_PRECISION],$J[DATA_SCALE]";if($qe==",")$qe=$J["DATA_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$U.($qe?"($qe)":""),"type"=>strtolower($U),"length"=>$qe,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($R,$g=null){$I=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$g)as$J){$Ed=$J["INDEX_NAME"];$I[$Ed]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Ed]["columns"][]=$J["COLUMN_NAME"];$I[$Ed]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Ed]["descs"][]=($J["DESCEND"]?'1':null);}return$I;}function
view($C){$K=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($K);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$f;return
h($f->error);}function
explain($f,$G){$f->query("EXPLAIN PLAN FOR $G");return$f->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){$c=$gc=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($R!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$gc[]=idf_escape($o[0]);}if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$gc||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$gc).")"))&&($R==$C||queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)));}function
foreign_keys($R){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Si){return
apply_queries("DROP VIEW",$Si);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$f;return$f->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Vg){global$f;return$f->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Vg));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Qc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Qc);}$x="oracle";$vi=array();$_h=array();foreach(array(lang(25)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(26)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(23)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(27)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$vi+=$X;$_h[$y]=array_keys($X);}$Bi=array();$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$kd=array("length","lower","round","upper");$qd=array("avg","count","count distinct","max","min","sum");$nc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$fc["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$bg=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$F){$this->_link=@sqlsrv_connect($N,array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8"));if($this->_link){$Ld=sqlsrv_server_info($this->_link);$this->server_info=$Ld['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$wi=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'DateTime'))$J[$y]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$o["Name"];$I->orgname=$o["Name"];$I->type=($o["Type"]==1?254:0);return$I;}function
seek($D){for($s=0;$s<$D;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$F){$this->_link=@mssql_connect($N,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$wi=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($N,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$N)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$eg){foreach($K
as$O){$Ci=array();$Z=array();foreach($O
as$y=>$X){$Ci[]="$y = $X";if(isset($eg[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Ci)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$z,$D=0,$M=" "){return($z!==null?" TOP (".($z+$D).")":"")." $G$Z";}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$qb){global$f;return$f->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$f;$I=array();foreach($k
as$l){$f->select_db($l);$I[$l]=$f->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($C=""){$I=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$J){$U=$J["type"];$qe=(preg_match("~char|binary~",$U)?$J["max_length"]:($U=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$U.($qe?"($qe)":""),"type"=>$U,"length"=>$qe,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],);}return$I;}function
indexes($R,$g=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$g)as$J){$C=$J["name"];$I[$C]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$C]["lengths"]=array();$I[$C]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$C]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($C){global$f;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$f->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$pb)$I[preg_replace('~_.*~','',$pb)][]=$pb;return$I;}function
information_schema($l){return
false;}function
error(){global$f;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$f->error)));}function
create_database($l,$pb){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$pb)?" COLLATE $pb":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($C,$pb){if(preg_match('~^[a-z0-9_]+$~i',$pb))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $pb");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){$c=array();foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $d";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($cd[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($d!=$X[0])queries("EXEC sp_rename ".q(table($R).".$d").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$C)queries("EXEC sp_rename ".q(table($R)).", ".q($C));if($cd)$c[""]=$cd;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $y".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$v=array();$gc=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$gc[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$gc||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$gc)));}function
last_id(){global$f;return$f->result("SELECT SCOPE_IDENTITY()");}function
explain($f,$G){$f->query("SET SHOWPLAN_ALL ON");$I=$f->query($G);$f->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($S,$Z){}function
foreign_keys($R){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$J){$q=&$I[$J["FK_NAME"]];$q["table"]=$J["PKTABLE_NAME"];$q["source"][]=$J["FKCOLUMN_NAME"];$q["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Si){return
queries("DROP VIEW ".implode(", ",array_map('table',$Si)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Si,$Ph){return
apply_queries("ALTER SCHEMA ".idf_escape($Ph)." TRANSFER",array_merge($T,$Si));}function
trigger($C){if($C=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$I["text"]);return$I;}function
triggers($R){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$f;if($_GET["ns"]!="")return$_GET["ns"];return$f->result("SELECT SCHEMA_NAME()");}function
set_schema($Ug){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Qc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Qc);}$x="mssql";$vi=array();$_h=array();foreach(array(lang(25)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(26)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(23)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(27)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$vi+=$X;$_h[$y]=array_keys($X);}$Bi=array();$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$kd=array("len","lower","round","upper");$qd=array("avg","count","count distinct","max","min","sum");$nc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$fc['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$bg=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){$this->_link=ibase_connect($N,$V,$F);if($this->_link){$Fi=explode(':',$N);$this->service_link=ibase_service_attach($Fi[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return($j=="domain");}function
query($G,$wi=false){$H=ibase_query($G,$this->_link);if(!$H){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($H===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
get_databases($bd){return
array("domain");}function
limit($G,$Z,$z,$D=0,$M=" "){$I='';$I.=($z!==null?$M."FIRST $z".($D?" SKIP $D":""):"");$I.=" $G$Z";return$I;}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$qb){}function
engines(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
tables_list(){global$f;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$H=ibase_query($f->_link,$G);$I=array();while($J=ibase_fetch_assoc($H))$I[$J['RDB$RELATION_NAME']]='table';ksort($I);return$I;}function
count_tables($k){return
array();}function
table_status($C="",$Pc=false){global$f;$I=array();$Mb=tables_list();foreach($Mb
as$v=>$X){$v=trim($v);$I[$v]=array('Name'=>$v,'Engine'=>'standard',);if($C==$v)return$I[$v];}return$I;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$f;$I=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$H=ibase_query($f->_link,$G);while($J=ibase_fetch_assoc($H))$I[trim($J['FIELD_NAME'])]=array("field"=>trim($J["FIELD_NAME"]),"full_type"=>trim($J["FIELD_TYPE"]),"type"=>trim($J["FIELD_SUB_TYPE"]),"default"=>trim($J['FIELD_DEFAULT_VALUE']),"null"=>(trim($J["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($J["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($J["FIELD_DESCRIPTION"]),);return$I;}function
indexes($R,$g=null){$I=array();return$I;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$f;return
h($f->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ug){return
true;}function
support($Qc){return
preg_match("~^(columns|sql|status|table)$~",$Qc);}$x="firebird";$pf=array("=");$kd=array();$qd=array();$nc=array();}$fc["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$bg=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($G,$wi=false){$If=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$If['NextToken']=$this->next;$H=sdb_request_all('Select','Item',$If,$this->timeout);if($H===false)return$H;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Dh=0;foreach($H
as$Xd)$Dh+=$Xd->Attribute->Value;$H=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Dh,))));}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($H){foreach($H
as$Xd){$J=array();if($Xd->Name!='')$J['itemName()']=(string)$Xd->Name;foreach($Xd->Attribute
as$Ja){$C=$this->_processValue($Ja->Name);$Y=$this->_processValue($Ja->Value);if(isset($J[$C])){$J[$C]=(array)$J[$C];$J[$C][]=$Y;}else$J[$C]=$Y;}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($qc){return(is_object($qc)&&$qc['encoding']=='base64'?base64_decode($qc):(string)$qc);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$de=array_keys($this->_rows[0]);return(object)array('name'=>$de[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$eg="itemName()";function
_chunkRequest($Bd,$wa,$If,$Fc=array()){global$f;foreach(array_chunk($Bd,25)as$ib){$Jf=$If;foreach($ib
as$s=>$t){$Jf["Item.$s.ItemName"]=$t;foreach($Fc
as$y=>$X)$Jf["Item.$s.$y"]=$X;}if(!sdb_request($wa,$Jf))return
false;}$f->affected_rows=count($Bd);return
true;}function
_extractIds($R,$qg,$z){$I=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$qg,$_e))$I=array_map('idf_unescape',$_e[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$qg.($z?" LIMIT 1":"")))as$Xd)$I[]=$Xd->Name;}return$I;}function
select($R,$L,$Z,$nd,$uf=array(),$z=1,$E=0,$gg=false){global$f;$f->next=$_GET["next"];$I=parent::select($R,$L,$Z,$nd,$uf,$z,$E,$gg);$f->next=0;return$I;}function
delete($R,$qg,$z=0){return$this->_chunkRequest($this->_extractIds($R,$qg,$z),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$O,$qg,$z=0,$M="\n"){$Vb=array();$Pd=array();$s=0;$Bd=$this->_extractIds($R,$qg,$z);$t=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Bd))$Vb["Attribute.".count($Vb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$Zd=>$W){$Pd["Attribute.$s.Name"]=$y;$Pd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Zd)$Pd["Attribute.$s.Replace"]="true";$s++;}}}$If=array('DomainName'=>$R);return(!$Pd||$this->_chunkRequest(($t!=""?array($t):$Bd),'BatchPutAttributes',$If,$Pd))&&(!$Vb||$this->_chunkRequest($Bd,'BatchDeleteAttributes',$If,$Vb));}function
insert($R,$O){$If=array("DomainName"=>$R);$s=0;foreach($O
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$If["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$If["Attribute.$s.Name"]=$C;$If["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$If);}function
insertUpdate($R,$K,$eg){foreach($K
as$O){if(!$this->update($R,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}}function
connect(){return
new
Min_DB;}function
support($Qc){return
preg_match('~sql~',$Qc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$qb){}function
tables_list(){global$f;$I=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$I[(string)$R]='table';if($f->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$I;}function
table_status($C="",$Pc=false){$I=array();foreach(($C!=""?array($C=>true):tables_list())as$R=>$U){$J=array("Name"=>$R,"Auto_increment"=>"");if(!$Pc){$Me=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Me){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$J[$y]=(string)$Me->$X;}}if($C!="")return$J;$I[$R]=$J;}return$I;}function
explain($f,$G){}function
error(){global$f;return
h($f->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$g=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z":"");}function
unconvert_field($o,$I){return$I;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($Ca,$Mb,$y,$ug=false){$Va=64;if(strlen($y)>$Va)$y=pack("H*",$Ca($y));$y=str_pad($y,$Va,"\0");$ae=$y^str_repeat("\x36",$Va);$be=$y^str_repeat("\x5C",$Va);$I=$Ca($be.pack("H*",$Ca($ae.$Mb)));if($ug)$I=pack("H*",$I);return$I;}function
sdb_request($wa,$If=array()){global$b,$f;list($zd,$If['AWSAccessKeyId'],$Xg)=$b->credentials();$If['Action']=$wa;$If['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$If['Version']='2009-04-15';$If['SignatureVersion']=2;$If['SignatureMethod']='HmacSHA1';ksort($If);$G='';foreach($If
as$y=>$X)$G.='&'.rawurlencode($y).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$zd)."\n/\n$G",$Xg,true)));@ini_set('track_errors',1);$Uc=@file_get_contents((preg_match('~^https?://~',$zd)?$zd:"http://$zd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$Uc){$f->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$fj=simplexml_load_string($Uc);if(!$fj){$n=libxml_get_last_error();$f->error=$n->message;return
false;}if($fj->Errors){$n=$fj->Errors->Error;$f->error="$n->Message ($n->Code)";return
false;}$f->error='';$Oh=$wa."Result";return($fj->$Oh?$fj->$Oh:true);}function
sdb_request_all($wa,$Oh,$If=array(),$Xh=0){$I=array();$wh=($Xh?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$If['SelectExpression'],$B)?$B[1]:0);do{$fj=sdb_request($wa,$If);if(!$fj)break;foreach($fj->$Oh
as$qc)$I[]=$qc;if($z&&count($I)>=$z){$_GET["next"]=$fj->NextToken;break;}if($Xh&&microtime(true)-$wh>$Xh)return
false;$If['NextToken']=$fj->NextToken;if($z)$If['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($I),$If['SelectExpression']);}while($fj->NextToken);return$I;}$x="simpledb";$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$kd=array();$qd=array("count");$nc=array(array("json"));}$fc["mongo"]="MongoDB";if(isset($_GET["mongo"])){$bg=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($N,$V,$F){global$b;$l=$b->database();$sf=array();if($V!=""){$sf["username"]=$V;$sf["password"]=$F;}if($l!="")$sf["db"]=$l;try{$this->_link=@new
MongoClient("mongodb://$N",$sf);return
true;}catch(Exception$Bc){$this->error=$Bc->getMessage();return
false;}}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Bc){$this->error=$Bc->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Xd){$J=array();foreach($Xd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$de=array_keys($this->_rows[0]);$C=$de[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$eg="_id";function
select($R,$L,$Z,$nd,$uf=array(),$z=1,$E=0,$gg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$nh=array();foreach($uf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Fb);$nh[$X]=($Fb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$L)->sort($nh)->limit($z!=""?+$z:0)->skip($E*$z));}function
insert($R,$O){try{$I=$this->_conn->_db->selectCollection($R)->insert($O);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$O['_id'];return!$I['err'];}catch(Exception$Bc){$this->_conn->error=$Bc->getMessage();return
false;}}}function
get_databases($bd){global$f;$I=array();$Rb=$f->_link->listDBs();foreach($Rb['databases']as$l)$I[]=$l['name'];return$I;}function
count_tables($k){global$f;$I=array();foreach($k
as$l)$I[$l]=count($f->_link->selectDB($l)->getCollectionNames(true));return$I;}function
tables_list(){global$f;return
array_fill_keys($f->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$f;foreach($k
as$l){$Gg=$f->_link->selectDB($l)->drop();if(!$Gg['ok'])return
false;}return
true;}function
indexes($R,$g=null){global$f;$I=array();foreach($f->_db->selectCollection($R)->getIndexInfo()as$v){$Yb=array();foreach($v["key"]as$d=>$U)$Yb[]=($U==-1?'1':null);$I[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Yb,);}return$I;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$f;return$f->_db->selectCollection($_GET["select"])->count($Z);}$pf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$error,$last_id;var$_link;var$_db,$_db_name;function
connect($N,$V,$F){global$b;$l=$b->database();$sf=array();if($V!=""){$sf["username"]=$V;$sf["password"]=$F;}if($l!="")$sf["db"]=$l;try{$kb='MongoDB\Driver\Manager';$this->_link=new$kb("mongodb://$N",$sf);return
true;}catch(Exception$Bc){$this->error=$Bc->getMessage();return
false;}}function
query($G){return
false;}function
select_db($j){try{$this->_db_name=$j;return
true;}catch(Exception$Bc){$this->error=$Bc->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Xd){$J=array();foreach($Xd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$H->count;}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$de=array_keys($this->_rows[0]);$C=$de[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$eg="_id";function
select($R,$L,$Z,$nd,$uf=array(),$z=1,$E=0,$gg=false){global$f;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$nh=array();foreach($uf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Fb);$nh[$X]=($Fb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$lh=$E*$z;$kb='MongoDB\Driver\Query';$G=new$kb($Z,array('projection'=>$L,'limit'=>$z,'skip'=>$lh,'sort'=>$nh));$Jg=$f->_link->executeQuery("$f->_db_name.$R",$G);return
new
Min_Result($Jg);}function
update($R,$O,$qg,$z=0,$M="\n"){global$f;$l=$f->_db_name;$Z=sql_query_where_parser($qg);$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());if(isset($O['_id']))unset($O['_id']);$Dg=array();foreach($O
as$y=>$Y){if($Y=='NULL'){$Dg[$y]=1;unset($O[$y]);}}$Ci=array('$set'=>$O);if(count($Dg))$Ci['$unset']=$Dg;$Za->update($Z,$Ci,array('upsert'=>false));$Jg=$f->_link->executeBulkWrite("$l.$R",$Za);$f->affected_rows=$Jg->getModifiedCount();return
true;}function
delete($R,$qg,$z=0){global$f;$l=$f->_db_name;$Z=sql_query_where_parser($qg);$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());$Za->delete($Z,array('limit'=>$z));$Jg=$f->_link->executeBulkWrite("$l.$R",$Za);$f->affected_rows=$Jg->getDeletedCount();return
true;}function
insert($R,$O){global$f;$l=$f->_db_name;$kb='MongoDB\Driver\BulkWrite';$Za=new$kb(array());if(isset($O['_id'])&&empty($O['_id']))unset($O['_id']);$Za->insert($O);$Jg=$f->_link->executeBulkWrite("$l.$R",$Za);$f->affected_rows=$Jg->getInsertedCount();return
true;}}function
get_databases($bd){global$f;$I=array();$kb='MongoDB\Driver\Command';$tb=new$kb(array('listDatabases'=>1));$Jg=$f->_link->executeCommand('admin',$tb);foreach($Jg
as$Rb){foreach($Rb->databases
as$l)$I[]=$l->name;}return$I;}function
count_tables($k){$I=array();return$I;}function
tables_list(){global$f;$kb='MongoDB\Driver\Command';$tb=new$kb(array('listCollections'=>1));$Jg=$f->_link->executeCommand($f->_db_name,$tb);$rb=array();foreach($Jg
as$H)$rb[$H->name]='table';return$rb;}function
drop_databases($k){return
false;}function
indexes($R,$g=null){global$f;$I=array();$kb='MongoDB\Driver\Command';$tb=new$kb(array('listIndexes'=>$R));$Jg=$f->_link->executeCommand($f->_db_name,$tb);foreach($Jg
as$v){$Yb=array();$e=array();foreach(get_object_vars($v->key)as$d=>$U){$Yb[]=($U==-1?'1':null);$e[]=$d;}$I[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$e,"lengths"=>array(),"descs"=>$Yb,);}return$I;}function
fields($R){$p=fields_from_edit();if(!count($p)){global$m;$H=$m->select($R,array("*"),null,null,array(),10);while($J=$H->fetch_assoc()){foreach($J
as$y=>$X){$J[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($S,$Z){global$f;$Z=where_to_query($Z);$kb='MongoDB\Driver\Command';$tb=new$kb(array('count'=>$S['Name'],'query'=>$Z));$Jg=$f->_link->executeCommand($f->_db_name,$tb);$fi=$Jg->toArray();return$fi[0]->n;}function
sql_query_where_parser($qg){$qg=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$qg));$qg=preg_replace('/\)\)\)$/',')',$qg);$cj=explode(' AND ',$qg);$dj=explode(') OR (',$qg);$Z=array();foreach($cj
as$aj)$Z[]=trim($aj);if(count($dj)==1)$dj=array();elseif(count($dj)>1)$Z=array();return
where_to_query($Z,$dj);}function
where_to_query($Yi=array(),$Zi=array()){global$pf;$Mb=array();foreach(array('and'=>$Yi,'or'=>$Zi)as$U=>$Z){if(is_array($Z)){foreach($Z
as$Ic){list($nb,$nf,$X)=explode(" ",$Ic,3);if($nb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$kb='MongoDB\BSON\ObjectID';$X=new$kb($X);}if(!in_array($nf,$pf))continue;if(preg_match('~^\(f\)(.+)~',$nf,$B)){$X=(float)$X;$nf=$B[1];}elseif(preg_match('~^\(date\)(.+)~',$nf,$B)){$Ob=new
DateTime($X);$kb='MongoDB\BSON\UTCDatetime';$X=new$kb($Ob->getTimestamp()*1000);$nf=$B[1];}switch($nf){case'=':$nf='$eq';break;case'!=':$nf='$ne';break;case'>':$nf='$gt';break;case'<':$nf='$lt';break;case'>=':$nf='$gte';break;case'<=':$nf='$lte';break;case'regex':$nf='$regex';break;default:continue;}if($U=='and')$Mb['$and'][]=array($nb=>array($nf=>$X));elseif($U=='or')$Mb['$or'][]=array($nb=>array($nf=>$X));}}}return$Mb;}$pf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($C="",$Pc=false){$I=array();foreach(tables_list()as$R=>$U){$I[$R]=array("Name"=>$R);if($C==$R)return$I[$R];}return$I;}function
last_id(){global$f;return$f->last_id;}function
error(){global$f;return
h($f->error);}function
collations(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
alter_indexes($R,$c){global$f;foreach($c
as$X){list($U,$C,$O)=$X;if($O=="DROP")$I=$f->_db->command(array("deleteIndexes"=>$R,"index"=>$C));else{$e=array();foreach($O
as$d){$d=preg_replace('~ DESC$~','',$d,1,$Fb);$e[$d]=($Fb?-1:1);}$I=$f->_db->selectCollection($R)->ensureIndex($e,array("unique"=>($U=="UNIQUE"),"name"=>$C,));}if($I['errmsg']){$f->error=$I['errmsg'];return
false;}}return
true;}function
support($Qc){return
preg_match("~database|indexes~",$Qc);}function
db_collation($l,$qb){}function
information_schema(){}function
is_view($S){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){global$f;if($R==""){$f->_db->createCollection($C);return
true;}}function
drop_tables($T){global$f;foreach($T
as$R){$Gg=$f->_db->selectCollection($R)->drop();if(!$Gg['ok'])return
false;}return
true;}function
truncate_tables($T){global$f;foreach($T
as$R){$Gg=$f->_db->selectCollection($R)->remove();if(!$Gg['ok'])return
false;}return
true;}$x="mongo";$kd=array();$qd=array();$nc=array(array("json"));}$fc["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$bg=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Sf,$Ab=array(),$Ne='GET'){@ini_set('track_errors',1);$Uc=@file_get_contents("$this->_url/".ltrim($Sf,'/'),false,stream_context_create(array('http'=>array('method'=>$Ne,'content'=>$Ab===null?$Ab:json_encode($Ab),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Uc){$this->error=$php_errormsg;return$Uc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Uc;return
false;}$I=json_decode($Uc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$_b=get_defined_constants(true);foreach($_b['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$I;}function
query($Sf,$Ab=array(),$Ne='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Sf,'/'),$Ab,$Ne);}function
connect($N,$V,$F){preg_match('~^(https?://)?(.*)~',$N,$B);$this->_url=($B[1]?$B[1]:"http://")."$V:$F@$B[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($this->_rows);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$L,$Z,$nd,$uf=array(),$z=1,$E=0,$gg=false){global$b;$Mb=array();$G="$R/_search";if($L!=array("*"))$Mb["fields"]=$L;if($uf){$nh=array();foreach($uf
as$nb){$nb=preg_replace('~ DESC$~','',$nb,1,$Fb);$nh[]=($Fb?array($nb=>"desc"):$nb);}$Mb["sort"]=$nh;}if($z){$Mb["size"]=+$z;if($E)$Mb["from"]=($E*$z);}foreach($Z
as$X){list($nb,$nf,$X)=explode(" ",$X,3);if($nb=="_id")$Mb["query"]["ids"]["values"][]=$X;elseif($nb.$X!=""){$Sh=array("term"=>array(($nb!=""?$nb:"_all")=>$X));if($nf=="=")$Mb["query"]["filtered"]["filter"]["and"][]=$Sh;else$Mb["query"]["filtered"]["query"]["bool"]["must"][]=$Sh;}}if($Mb["query"]&&!$Mb["query"]["filtered"]["query"]&&!$Mb["query"]["ids"])$Mb["query"]["filtered"]["query"]=array("match_all"=>array());$wh=microtime(true);$Wg=$this->_conn->query($G,$Mb);if($gg)echo$b->selectQuery("$G: ".print_r($Mb,true),$wh,!$Wg);if(!$Wg)return
false;$I=array();foreach($Wg['hits']['hits']as$yd){$J=array();if($L==array("*"))$J["_id"]=$yd["_id"];$p=$yd['_source'];if($L!=array("*")){$p=array();foreach($L
as$y)$p[$y]=$yd['fields'][$y];}foreach($p
as$y=>$X){if($Mb["fields"])$X=$X[0];$J[$y]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($U,$vg,$qg){$Qf=preg_split('~ *= *~',$qg);if(count($Qf)==2){$t=trim($Qf[1]);$G="$U/$t";return$this->_conn->query($G,$vg,'POST');}return
false;}function
insert($U,$vg){$t="";$G="$U/$t";$Gg=$this->_conn->query($G,$vg,'POST');$this->_conn->last_id=$Gg['_id'];return$Gg['created'];}function
delete($U,$qg){$Bd=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Bd[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$db){$Qf=preg_split('~ *= *~',$db);if(count($Qf)==2)$Bd[]=trim($Qf[1]);}}$this->_conn->affected_rows=0;foreach($Bd
as$t){$G="{$U}/{$t}";$Gg=$this->_conn->query($G,'{}','DELETE');if(is_array($Gg)&&$Gg['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
support($Qc){return
preg_match("~database|table|columns~",$Qc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){global$f;$I=$f->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($l,$qb){}function
engines(){return
array();}function
count_tables($k){global$f;$I=array();$H=$f->query('_stats');if($H&&$H['indices']){$Id=$H['indices'];foreach($Id
as$Hd=>$xh){$Gd=$xh['total']['indexing'];$I[$Hd]=$Gd['index_total'];}}return$I;}function
tables_list(){global$f;$I=$f->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$f->_db]["mappings"]),'table');return$I;}function
table_status($C="",$Pc=false){global$f;$Wg=$f->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($Wg){$T=$Wg["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$I[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($C!=""&&$C==$R["key"])return$I[$C];}}return$I;}function
error(){global$f;return
h($f->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$g=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$f;$H=$f->query("$R/_mapping");$I=array();if($H){$we=$H[$R]['properties'];if(!$we)$we=$H[$f->_db]['mappings'][$R]['properties'];if($we){foreach($we
as$C=>$o){$I[$C]=array("field"=>$C,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($I[$C]["privileges"]["insert"]);unset($I[$C]["privileges"]["update"]);}}}}return$I;}function
foreign_keys($R){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($l){global$f;return$f->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$f;return$f->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){global$f;$mg=array();foreach($p
as$Nc){$Sc=trim($Nc[1][0]);$Tc=trim($Nc[1][1]?$Nc[1][1]:"text");$mg[$Sc]=array('type'=>$Tc);}if(!empty($mg))$mg=array('properties'=>$mg);return$f->query("_mapping/{$C}",$mg,'PUT');}function
drop_tables($T){global$f;$I=true;foreach($T
as$R)$I=$I&&$f->query(urlencode($R),array(),'DELETE');return$I;}function
last_id(){global$f;return$f->last_id;}$x="elastic";$pf=array("=","query");$kd=array();$qd=array();$nc=array(array("json"));$vi=array();$_h=array();foreach(array(lang(25)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(26)=>array("date"=>10),lang(23)=>array("string"=>65535,"text"=>65535),lang(27)=>array("binary"=>255),)as$y=>$X){$vi+=$X;$_h[$y]=array_keys($X);}}$fc=array("server"=>"MySQL")+$fc;if(!defined("DRIVER")){$bg=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N="",$V="",$F="",$j=null,$Xf=null,$mh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($zd,$Xf)=explode(":",$N,2);$vh=$b->connectSsl();if($vh)$this->ssl_set($vh['key'],$vh['cert'],$vh['ca'],'','');$I=@$this->real_connect(($N!=""?$zd:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($Xf)?$Xf:ini_get("mysqli.default_port")),(!is_numeric($Xf)?$Xf:$mh),($vh?64:0));return$I;}function
set_charset($cb){if(parent::set_charset($cb))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $cb");}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$o];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($cb){if(function_exists('mysql_set_charset')){if(mysql_set_charset($cb,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $cb");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$wi=false){$H=@($wi?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$F){global$b;$sf=array();$vh=$b->connectSsl();if($vh)$sf=array(PDO::MYSQL_ATTR_SSL_KEY=>$vh['key'],PDO::MYSQL_ATTR_SSL_CERT=>$vh['cert'],PDO::MYSQL_ATTR_SSL_CA=>$vh['ca'],);$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$N)),$V,$F,$sf);return
true;}function
set_charset($cb){$this->query("SET NAMES $cb");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$wi=false){$this->setAttribute(1000,!$wi);return
parent::query($G,$wi);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$O){return($O?parent::insert($R,$O):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$K,$eg){$e=array_keys(reset($K));$cg="INSERT INTO ".table($R)." (".implode(", ",$e).") VALUES\n";$Ni=array();foreach($e
as$y)$Ni[$y]="$y = VALUES($y)";$Ch="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ni);$Ni=array();$qe=0;foreach($K
as$O){$Y="(".implode(", ",$O).")";if($Ni&&(strlen($cg)+$qe+strlen($Y)+strlen($Ch)>1e6)){if(!queries($cg.implode(",\n",$Ni).$Ch))return
false;$Ni=array();$qe=0;}$Ni[]=$Y;$qe+=strlen($Y)+2;}return
queries($cg.implode(",\n",$Ni).$Ch);}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($C){$xe=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($xe?"information-schema-$C-table/":str_replace("_","-",$C)."-table.html"));if(DB=="mysql")return($xe?"mysql$C-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$vi,$_h;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2])){$f->set_charset(charset($f));$f->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$f)){$_h[lang(23)][]="json";$vi["json"]=4294967295;}return$f;}$I=$f->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($Sg=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$Sg;return$I;}function
get_databases($bd){$I=get_session("dbs");if($I===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$I=($bd?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$qb){global$f;$I=null;$h=$f->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$h,$B))$I=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$h,$B))$I=$qb[$B[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$f;return$f->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$I=array();foreach($k
as$l)$I[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$I;}function
table_status($C="",$Pc=false){$I=array();foreach(get_rows($Pc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$J){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$J["Type"],$B);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$B[1])?$J["Default"]:null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$B)?$B[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),);}return$I;}function
indexes($R,$g=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$g)as$J){$C=$J["Key_name"];$I[$C]["type"]=($C=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$C]["columns"][]=$J["Column_name"];$I[$C]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$C]["descs"][]=null;}return$I;}function
foreign_keys($R){global$f,$kf;static$Uf='`(?:[^`]|``)+`';$I=array();$Gb=$f->result("SHOW CREATE TABLE ".table($R),1);if($Gb){preg_match_all("~CONSTRAINT ($Uf) FOREIGN KEY ?\\(((?:$Uf,? ?)+)\\) REFERENCES ($Uf)(?:\\.($Uf))? \\(((?:$Uf,? ?)+)\\)(?: ON DELETE ($kf))?(?: ON UPDATE ($kf))?~",$Gb,$_e,PREG_SET_ORDER);foreach($_e
as$B){preg_match_all("~$Uf~",$B[2],$oh);preg_match_all("~$Uf~",$B[5],$Ph);$I[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$oh[0]),"target"=>array_map('idf_unescape',$Ph[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$I;}function
view($C){global$f;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$f->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$y=>$X)asort($I[$y]);return$I;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$f;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$f->error));}function
create_database($l,$pb){return
queries("CREATE DATABASE ".idf_escape($l).($pb?" COLLATE ".q($pb):""));}function
drop_databases($k){$I=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($C,$pb){$I=false;if(create_database($C,$pb)){$Eg=array();foreach(tables_list()as$R=>$U)$Eg[]=table($R)." TO ".idf_escape($C).".".table($R);$I=(!$Eg||queries("RENAME TABLE ".implode(", ",$Eg)));if($I)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$I;}function
auto_increment(){$Na=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Na="";break;}if($v["type"]=="PRIMARY")$Na=" UNIQUE";}}return" AUTO_INCREMENT$Na";}function
alter_table($R,$C,$p,$cd,$vb,$vc,$pb,$Ma,$Of){$c=array();foreach($p
as$o)$c[]=($o[1]?($R!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($R!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$cd);$P=($vb!==null?" COMMENT=".q($vb):"").($vc?" ENGINE=".q($vc):"").($pb?" COLLATE ".q($pb):"").($Ma!=""?" AUTO_INCREMENT=$Ma":"");if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$P$Of");if($R!=$C)$c[]="RENAME TO ".table($C);if($P)$c[]=ltrim($P);return($c||$Of?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Of):true);}function
alter_indexes($R,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Si){return
queries("DROP VIEW ".implode(", ",array_map('table',$Si)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Si,$Ph){$Eg=array();foreach(array_merge($T,$Si)as$R)$Eg[]=table($R)." TO ".idf_escape($Ph).".".table($R);return
queries("RENAME TABLE ".implode(", ",$Eg));}function
copy_tables($T,$Si,$Ph){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$C=($Ph==DB?table("copy_$R"):idf_escape($Ph).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($R))||!queries("INSERT INTO $C SELECT * FROM ".table($R)))return
false;}foreach($Si
as$R){$C=($Ph==DB?table("copy_$R"):idf_escape($Ph).".".table($R));$Ri=view($R);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Ri[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$f,$xc,$Nd,$vi;$Da=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$ph="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$ui="((".implode("|",array_merge(array_keys($vi),$Da)).")\\b(?:\\s*\\(((?:[^'\")]|$xc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Uf="$ph*(".($U=="FUNCTION"?"":$Nd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$ui";$h=$f->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$Uf\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$ui\\s+":"")."(.*)~is",$h,$B);$p=array();preg_match_all("~$Uf\\s*,?~is",$B[1],$_e,PREG_SET_ORDER);foreach($_e
as$Hf){$C=str_replace("``","`",$Hf[2]).$Hf[3];$p[]=array("field"=>$C,"type"=>strtolower($Hf[5]),"length"=>preg_replace_callback("~$xc~s",'normalize_enum',$Hf[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Hf[8] $Hf[7]"))),"null"=>1,"full_type"=>$Hf[4],"inout"=>strtoupper($Hf[1]),"collation"=>strtolower($Hf[9]),);}if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$B[11]);return
array("fields"=>$p,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($C,$J){return
idf_escape($C);}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ID()");}function
explain($f,$G){return$f->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ug){return
true;}function
create_sql($R,$Ma,$Ah){global$f;$I=$f->result("SHOW CREATE TABLE ".table($R),1);if(!$Ma)$I=preg_replace('~ AUTO_INCREMENT=\\d+~','',$I);return$I;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($R){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$I){if(preg_match("~binary~",$o["type"]))$I="UNHEX($I)";if($o["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I)";return$I;}function
support($Qc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view"))."~",$Qc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$f;return$f->result("SELECT @@max_connections");}$x="sql";$vi=array();$_h=array();foreach(array(lang(25)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(26)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(23)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(30)=>array("enum"=>65535,"set"=>64),lang(27)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(29)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$vi+=$X;$_h[$y]=array_keys($X);}$Bi=array("unsigned","zerofill","unsigned zerofill");$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$kd=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$qd=array("avg","count","count distinct","group_concat","max","min","sum");$nc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.6.2";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($h=false){return
password_file($h);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($N){return
h($N);}function
database(){return
DB;}function
databases($bd=true){return
get_databases($bd);}function
schemas(){return
schemas();}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$Vc="adminer.css";if(file_exists($Vc))$I[]=$Vc;return$I;}function
loginForm(){global$fc;echo'<table cellspacing="0">
<tr><th>',lang(31),'<td>',html_select("auth[driver]",$fc,DRIVER)."\n",'<tr><th>',lang(32),'<td><input name="auth[server]" value="',h(SERVER),'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>',lang(33),'<td><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>',lang(34),'<td><input type="password" name="auth[password]">
<tr><th>',lang(35),'<td><input name="auth[db]" value="',h($_GET["db"]),'" autocapitalize="off">
</table>
',script("focus(qs('#username'));"),"<p><input type='submit' value='".lang(36)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(37))."\n";}function
login($ue,$F){global$x;if($x=="sqlite")return
lang(38,target_blank(),'<code>login()</code>');return
true;}function
tableName($Gh){return
h($Gh["Name"]);}function
fieldName($o,$uf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Gh,$O=""){global$x,$m;echo'<p class="links">';$te=array("select"=>lang(39));if(support("table")||support("indexes"))$te["table"]=lang(40);if(support("table")){if(is_view($Gh))$te["view"]=lang(41);else$te["create"]=lang(42);}if($O!==null)$te["edit"]=lang(43);$C=$Gh["Name"];foreach($te
as$y=>$X)echo" <a href='".h(ME)."$y=".urlencode($C).($y=="edit"?$O:"")."'".bold(isset($_GET[$y])).">$X</a>";echo
doc_link(array($x=>$m->tableHelp($C)),"?"),"\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Fh){return
array();}function
backwardKeysPrint($Pa,$J){}function
selectQuery($G,$wh,$Oc=false){global$x,$m;$I="</p>\n";if(!$Oc&&($Vi=$m->warnings())){$t="warnings";$I=", <a href='#$t'>".lang(44)."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."$I<div id='$t' class='hidden'>\n$Vi</div>\n";}return"<p><code class='jush-$x'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>(".format_time($wh).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($G)."'>".lang(10)."</a>":"").$I;}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($R){return"";}function
rowDescriptions($K,$dd){return$K;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$Bf){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$I="<i>".lang(45,strlen($Bf))."</i>";if(preg_match('~json~',$o["type"]))$I="<code class='jush-js'>$I</code>";return($_?"<a href='".h($_)."'".(is_url($_)?target_blank():"").">$I</a>":$I);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".lang(46)."<td>".lang(47).(support("comment")?"<td>".lang(48):"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".lang(49)."</i>":""),(isset($o["default"])?" <span title='".lang(50)."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".nbsp($o["comment"]):""),"\n";}echo"</table>\n";}function
tableIndexesPrint($w){echo"<table cellspacing='0'>\n";foreach($w
as$C=>$v){ksort($v["columns"]);$gg=array();foreach($v["columns"]as$y=>$X)$gg[]="<i>".h($X)."</i>".($v["lengths"][$y]?"(".$v["lengths"][$y].")":"").($v["descs"][$y]?" DESC":"");echo"<tr title='".h($C)."'><th>$v[type]<td>".implode(", ",$gg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$e){global$kd,$qd;print_fieldset("select",lang(51),$L);$s=0;$L[""]=array();foreach($L
as$y=>$X){$X=$_GET["columns"][$y];$d=select_input(" name='columns[$s][col]'",$e,$X["col"],($y!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($kd||$qd?"<select name='columns[$s][fun]'>".optionlist(array(-1=>"")+array_filter(array(lang(52)=>$kd,lang(53)=>$qd)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($y!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($d)":$d)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$e,$w){print_fieldset("search",lang(54),$Z);foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"</div>\n";}}$bb="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$s=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]'",$e,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".lang(55).")"),html_select("where[$s][op]",$this->operators,$X["op"],$bb),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $bb }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($uf,$e,$w){print_fieldset("sort",lang(56),$uf);$s=0;foreach((array)$_GET["order"]as$y=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]'",$e,$X,"selectFieldChange"),checkbox("desc[$s]",1,isset($_GET["desc"][$y]),lang(57))."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]'",$e,"","selectAddRow"),checkbox("desc[$s]",1,false,lang(57))."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(58)."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($Vh){if($Vh!==null){echo"<fieldset><legend>".lang(59)."</legend><div>","<input type='number' name='text_length' class='size' value='".h($Vh)."'>","</div></fieldset>\n";}}function
selectActionPrint($w){echo"<fieldset><legend>".lang(60)."</legend><div>","<input type='submit' value='".lang(51)."'>"," <span id='noindex' title='".lang(61)."'></span>","<script".nonce().">\n","var indexColumns = ";$e=array();foreach($w
as$v){$Lb=reset($v["columns"]);if($v["type"]!="FULLTEXT"&&$Lb)$e[$Lb]=1;}$e[""]=1;foreach($e
as$y=>$X)json_row($y);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($sc,$e){}function
selectColumnsProcess($e,$w){global$kd,$qd;$L=array();$nd=array();foreach((array)$_GET["columns"]as$y=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$kd)||in_array($X["fun"],$qd)))){$L[$y]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$qd))$nd[]=$L[$y];}}return
array($L,$nd);}function
selectSearchProcess($p,$w){global$f,$m;$I=array();foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$y=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$cg="";$yb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Dd=process_length($X["val"]);$yb.=" ".($Dd!=""?$Dd:"(NULL)");}elseif($X["op"]=="SQL")$yb=" $X[val]";elseif($X["op"]=="LIKE %%")$yb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$yb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$cg="$X[op](".q($X["val"]).", ";$yb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$yb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=$cg.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$yb;else{$sb=array();foreach($p
as$C=>$o){if((is_numeric($X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"])))$sb[]=$cg.$m->convertSearch(idf_escape($C),$X,$o).$yb;}$I[]=($sb?"(".implode(" OR ",$sb).")":"1 = 0");}}}return$I;}function
selectOrderProcess($p,$w){$I=array();foreach((array)$_GET["order"]as$y=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$y])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$dd){return
false;}function
selectQueryBuild($L,$Z,$nd,$uf,$z,$E){return"";}function
messageQuery($G,$Wh,$Oc=false){global$x,$m;restart_session();$wd=&get_session("queries");if(!$wd[$_GET["db"]])$wd[$_GET["db"]]=array();if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\n...";$wd[$_GET["db"]][]=array($G,time(),$Wh);$th="sql-".count($wd[$_GET["db"]]);$I="<a href='#$th' class='toggle'>".lang(62)."</a>\n";if(!$Oc&&($Vi=$m->warnings())){$t="warnings-".count($wd[$_GET["db"]]);$I="<a href='#$t' class='toggle'>".lang(44)."</a>, $I<div id='$t' class='hidden'>\n$Vi</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $I<div id='$th' class='hidden'><pre><code class='jush-$x'>".shorten_utf8($G,1000)."</code></pre>".($Wh?" <span class='time'>($Wh)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($wd[$_GET["db"]])-1)).'">'.lang(10).'</a>':'').'</div>';}function
editFunctions($o){global$nc;$I=($o["null"]?"NULL/":"");foreach($nc
as$y=>$kd){if(!$y||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($kd
as$Uf=>$X){if(!$Uf||preg_match("~$Uf~",$o["type"]))$I.="/$X";}if($y&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$I.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$I=lang(49);return
explode("/",$I);}function
editInput($R,$o,$Ka,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ka value='-1' checked><i>".lang(8)."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ka value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ka,$o,$Y,0);return"";}function
editHint($R,$o,$Y){return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$C=$o["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$I="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$I=$r;elseif(preg_match('~^([+-]|\\|\\|)$~',$r))$I=idf_escape($C)." $r $I";elseif(preg_match('~^[+-] interval$~',$r))$I=idf_escape($C)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$I="$r(".idf_escape($C).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$I="$r($I)";return
unconvert_field($o,$I);}function
dumpOutput(){$I=array('text'=>lang(63),'file'=>lang(64));if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($R,$Ah,$Wd=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Ah)dump_csv(array_keys(fields($R)));}else{if($Wd==2){$p=array();foreach(fields($R)as$C=>$o)$p[]=idf_escape($C)." $o[full_type]";$h="CREATE TABLE ".table($R)." (".implode(", ",$p).")";}else$h=create_sql($R,$_POST["auto_increment"],$Ah);set_utf8mb4($h);if($Ah&&$h){if($Ah=="DROP+CREATE"||$Wd==1)echo"DROP ".($Wd==2?"VIEW":"TABLE")." IF EXISTS ".table($R).";\n";if($Wd==1)$h=remove_definer($h);echo"$h;\n\n";}}}function
dumpData($R,$Ah,$G){global$f,$x;$Be=($x=="sqlite"?0:1048576);if($Ah){if($_POST["format"]=="sql"){if($Ah=="TRUNCATE+INSERT")echo
truncate_sql($R).";\n";$p=fields($R);}$H=$f->query($G,1);if($H){$Pd="";$Ya="";$de=array();$Ch="";$Rc=($R!=''?'fetch_assoc':'fetch_row');while($J=$H->$Rc()){if(!$de){$Ni=array();foreach($J
as$X){$o=$H->fetch_field();$de[]=$o->name;$y=idf_escape($o->name);$Ni[]="$y = VALUES($y)";}$Ch=($Ah=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Ni):"").";\n";}if($_POST["format"]!="sql"){if($Ah=="table"){dump_csv($de);$Ah="INSERT";}dump_csv($J);}else{if(!$Pd)$Pd="INSERT INTO ".table($R)." (".implode(", ",array_map('idf_escape',$de)).") VALUES";foreach($J
as$y=>$X){$o=$p[$y];$J[$y]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&$X!=''?$X:q($X)):"NULL");}$Sg=($Be?"\n":" ")."(".implode(",\t",$J).")";if(!$Ya)$Ya=$Pd.$Sg;elseif(strlen($Ya)+4+strlen($Sg)+strlen($Ch)<$Be)$Ya.=",$Sg";else{echo$Ya.$Ch;$Ya=$Pd.$Sg;}}}if($Ya)echo$Ya.$Ch;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$f->error)."\n";}}function
dumpFilename($Ad){return
friendly_url($Ad!=""?$Ad:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Ad,$Qe=false){$Ef=$_POST["output"];$Jc=(preg_match('~sql~',$_POST["format"])?"sql":($Qe?"tar":"csv"));header("Content-Type: ".($Ef=="gz"?"application/x-gzip":($Jc=="tar"?"application/x-tar":($Jc=="sql"||$Ef!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Ef=="gz")ob_start('ob_gzencode',1e6);return$Jc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.lang(65)."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?lang(66):lang(67))."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.lang(68)."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".lang(69)."</a>\n":"");return
true;}function
navigation($Pe){global$ia,$x,$fc,$f;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Pe=="auth"){$Xc=true;foreach((array)$_SESSION["pwds"]as$Pi=>$gh){foreach($gh
as$N=>$Ki){foreach($Ki
as$V=>$F){if($F!==null){if($Xc){echo"<p id='logins'>".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Xc=false;}$Rb=$_SESSION["db"][$Pi][$N][$V];foreach(($Rb?array_keys($Rb):array(""))as$l)echo"<a href='".h(auth_url($Pi,$N,$V,$l))."'>($fc[$Pi]) ".h($V.($N!=""?"@".$this->serverName($N):"").($l!=""?" - $l":""))."</a><br>\n";}}}}}else{if($_GET["ns"]!==""&&!$Pe&&DB!=""){$f->select_db(DB);$T=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.6.2");if(support("sql")){echo'<script',nonce(),'>
';if($T){$te=array();foreach($T
as$R=>$U)$te[]=preg_quote($R,'/');echo"var jushLinks = { $x: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$te).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$x;\n";}$fh=$f->server_info;echo'bodyLoad(\'',(is_object($f)?preg_replace('~^(\\d\\.?\\d).*~s','\\1',$fh):""),'\'',(preg_match('~MariaDB~',$fh)?", true":""),');
</script>
';}$this->databasesPrint($Pe);if(DB==""||!$Pe){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".lang(62)."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".lang(70)."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".lang(71)."</a>\n";}if($_GET["ns"]!==""&&!$Pe&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".lang(72)."</a>\n";if(!$T)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($T);}}}function
databasesPrint($Pe){global$b,$f;$k=$this->databases();echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Pb=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".lang(73)."'>".lang(74)."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Pb":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".lang(20)."'".($k?" class='hidden'":"").">\n";if($Pe!="db"&&DB!=""&&$f->select_db(DB)){if(support("scheme")){echo"<br>".lang(75).": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Pb";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':(isset($_GET["privileges"])?'<input type="hidden" name="privileges" value="">':"")))),"</p></form>\n";}function
tablesPrint($T){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$R=>$P){$C=$this->tableName($P);if($C!=""){echo'<li><a href="'.h(ME).'select='.urlencode($R).'"'.bold($_GET["select"]==$R||$_GET["edit"]==$R,"select").">".lang(76)."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($R).'"'.bold(in_array($R,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($P)?"view":"structure"))." title='".lang(40)."'>$C</a>":"<span>$C</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$pf;function
page_header($Zh,$n="",$Xa=array(),$ai=""){global$ca,$ia,$b,$fc,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$bi=$Zh.($ai!=""?": $ai":"");$ci=strip_tags($bi.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ca,'" dir="',lang(77),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$ci,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.6.2"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.6.2");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2"),'">
';foreach($b->css()as$Jb){echo'<link rel="stylesheet" type="text/css" href="',h($Jb),'">
';}}echo'
<body class="',lang(77),' nojs">
';$Vc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($Vc)&&filemtime($Vc)+86400>time()){$Qi=unserialize(file_get_contents($Vc));$ng="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Qi["version"],base64_decode($Qi["signature"]),$ng)==1)$_COOKIE["adminer_version"]=$Qi["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(78)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Xa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$fc[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=$b->serverName(SERVER);$N=($N!=""?$N:lang(32));if($Xa===false)echo"$N\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Xa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Xa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Xa
as$y=>$X){$Xb=(is_array($X)?$X[1]:h($X));if($Xb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Xb</a> &raquo; ";}}echo"$Zh\n";}}echo"<h2>$bi</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Ib){$vd=array();foreach($Ib
as$y=>$X)$vd[]="$y $X";header("Content-Security-Policy: ".implode("; ",$vd));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$Ze;if(!$Ze)$Ze=base64_encode(rand_string());return$Ze;}function
page_messages($n){$Di=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Le=$_SESSION["messages"][$Di];if($Le){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Le)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Di]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Pe=""){global$b,$gi;echo'</div>

';switch_lang();if($Pe!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(79),'" id="logout">
<input type="hidden" name="token" value="',$gi,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Pe);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Se){while($Se>=2147483648)$Se-=4294967296;while($Se<=-2147483649)$Se+=4294967296;return(int)$Se;}function
long2str($W,$Ui){$Sg='';foreach($W
as$X)$Sg.=pack('V',$X);if($Ui)return
substr($Sg,0,end($W));return$Sg;}function
str2long($Sg,$Ui){$W=array_values(unpack('V*',str_pad($Sg,4*ceil(strlen($Sg)/4),"\0")));if($Ui)$W[]=strlen($Sg);return$W;}function
xxtea_mx($hj,$gj,$Dh,$Zd){return
int32((($hj>>5&0x7FFFFFF)^$gj<<2)+(($gj>>3&0x1FFFFFFF)^$hj<<4))^int32(($Dh^$gj)+($Zd^$hj));}function
encrypt_string($zh,$y){if($zh=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($zh,true);$Se=count($W)-1;$hj=$W[$Se];$gj=$W[0];$og=floor(6+52/($Se+1));$Dh=0;while($og-->0){$Dh=int32($Dh+0x9E3779B9);$mc=$Dh>>2&3;for($Ff=0;$Ff<$Se;$Ff++){$gj=$W[$Ff+1];$Re=xxtea_mx($hj,$gj,$Dh,$y[$Ff&3^$mc]);$hj=int32($W[$Ff]+$Re);$W[$Ff]=$hj;}$gj=$W[0];$Re=xxtea_mx($hj,$gj,$Dh,$y[$Ff&3^$mc]);$hj=int32($W[$Se]+$Re);$W[$Se]=$hj;}return
long2str($W,false);}function
decrypt_string($zh,$y){if($zh=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($zh,false);$Se=count($W)-1;$hj=$W[$Se];$gj=$W[0];$og=floor(6+52/($Se+1));$Dh=int32($og*0x9E3779B9);while($Dh){$mc=$Dh>>2&3;for($Ff=$Se;$Ff>0;$Ff--){$hj=$W[$Ff-1];$Re=xxtea_mx($hj,$gj,$Dh,$y[$Ff&3^$mc]);$gj=int32($W[$Ff]-$Re);$W[$Ff]=$gj;}$hj=$W[$Se];$Re=xxtea_mx($hj,$gj,$Dh,$y[$Ff&3^$mc]);$gj=int32($W[0]-$Re);$W[0]=$gj;$Dh=int32($Dh-0x9E3779B9);}return
long2str($W,true);}$f='';$ud=$_SESSION["token"];if(!$ud)$_SESSION["token"]=rand(1,1e6);$gi=get_token();$Vf=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Vf[$y]=$X;}}function
add_invalid_login(){global$b;$id=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$id)return;$Sd=unserialize(stream_get_contents($id));$Wh=time();if($Sd){foreach($Sd
as$Td=>$X){if($X[0]<$Wh)unset($Sd[$Td]);}}$Rd=&$Sd[$b->bruteForceKey()];if(!$Rd)$Rd=array($Wh+30*60,0);$Rd[1]++;file_write_unlock($id,serialize($Sd));}function
check_invalid_login(){global$b;$Sd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Rd=$Sd[$b->bruteForceKey()];$Ye=($Rd[1]>29?$Rd[0]-time():0);if($Ye>0)auth_error(lang(80,ceil($Ye/60)));}$La=$_POST["auth"];if($La){session_regenerate_id();$Pi=$La["driver"];$N=$La["server"];$V=$La["username"];$F=(string)$La["password"];$l=$La["db"];set_password($Pi,$N,$V,$F);$_SESSION["db"][$Pi][$N][$V][$l]=true;if($La["permanent"]){$y=base64_encode($Pi)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($l);$hg=$b->permanentLogin(true);$Vf[$y]="$y:".base64_encode($hg?encrypt_string($F,$hg):"");cookie("adminer_permanent",implode(" ",$Vf));}if(count($_POST)==1||DRIVER!=$Pi||SERVER!=$N||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Pi,$N,$V,$l));}elseif($_POST["logout"]){if($ud&&!verify_token()){page_header(lang(79),lang(81));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(82).' '.lang(83,'https://sourceforge.net/donate/index.php?group_id=264133'));}}elseif($Vf&&!$_SESSION["pwds"]){session_regenerate_id();$hg=$b->permanentLogin();foreach($Vf
as$y=>$X){list(,$jb)=explode(":",$X);list($Pi,$N,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Pi,$N,$V,decrypt_string(base64_decode($jb),$hg));$_SESSION["db"][$Pi][$N][$V][$l]=true;}}function
unset_permanent(){global$Vf;foreach($Vf
as$y=>$X){list($Pi,$N,$V,$l)=array_map('base64_decode',explode("-",$y));if($Pi==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Vf[$y]);}cookie("adminer_permanent",implode(" ",$Vf));}function
auth_error($n){global$b,$ud;$hh=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$hh]||$_GET[$hh])&&!$ud)$n=lang(84);else{add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.='<br>'.lang(85,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$hh]&&$_GET[$hh]&&ini_bool("session.use_only_cookies"))$n=lang(86);$If=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$If["lifetime"]);page_header(lang(36),$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(87)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(88),lang(89,implode(", ",$bg)),false);page_footer("auth");exit;}list($zd,$Xf)=explode(":",SERVER,2);if(is_numeric($Xf)&&$Xf<1024)auth_error(lang(90));check_invalid_login();$f=connect();$m=new
Min_Driver($f);}$ue=null;if(!is_object($f)||($ue=$b->login($_GET["username"],get_password()))!==true)auth_error((is_string($f)?h($f):(is_string($ue)?$ue:lang(91))));if($La&&$_POST["token"])$_POST["token"]=$gi;$n='';if($_POST){if(!verify_token()){$Md="max_input_vars";$Fe=ini_get($Md);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Fe||$X<$Fe)){$Md=$y;$Fe=$X;}}}$n=(!$_POST["token"]&&$Fe?lang(92,"'$Md'"):lang(81).' '.lang(93));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(94,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(95);}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
select($H,$g=null,$xf=array(),$z=0){global$x;$te=array();$w=array();$e=array();$Ua=array();$vi=array();$I=array();odd('');for($s=0;(!$z||$s<$z)&&($J=$H->fetch_row());$s++){if(!$s){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Yd=0;$Yd<count($J);$Yd++){$o=$H->fetch_field();$C=$o->name;$wf=$o->orgtable;$vf=$o->orgname;$I[$o->table]=$wf;if($xf&&$x=="sql")$te[$Yd]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($wf!=""){if(!isset($w[$wf])){$w[$wf]=array();foreach(indexes($wf,$g)as$v){if($v["type"]=="PRIMARY"){$w[$wf]=array_flip($v["columns"]);break;}}$e[$wf]=$w[$wf];}if(isset($e[$wf][$vf])){unset($e[$wf][$vf]);$w[$wf][$vf]=$Yd;$te[$Yd]=$wf;}}if($o->charsetnr==63)$Ua[$Yd]=true;$vi[$Yd]=$o->type;echo"<th".($wf!=""||$o->name!=$vf?" title='".h(($wf!=""?"$wf.":"").$vf)."'":"").">".h($C).($xf?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$y=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ua[$y]&&!is_utf8($X))$X="<i>".lang(45,strlen($X))."</i>";elseif(!strlen($X))$X="&nbsp;";else{$X=h($X);if($vi[$y]==254)$X="<code>$X</code>";}if(isset($te[$y])&&!$e[$te[$y]]){if($xf&&$x=="sql"){$R=$J[array_search("table=",$te)];$_=$te[$y].urlencode($xf[$R]!=""?$xf[$R]:$R);}else{$_="edit=".urlencode($te[$y]);foreach($w[$te[$y]]as$nb=>$Yd)$_.="&where".urlencode("[".bracket_escape($nb)."]")."=".urlencode($J[$Yd]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>":"<p class='message'>".lang(12))."\n";return$I;}function
referencable_primary($bh){$I=array();foreach(table_status('',true)as$Hh=>$R){if($Hh!=$bh&&fk_support($R)){foreach(fields($Hh)as$o){if($o["primary"]){if($I[$Hh]){unset($I[$Hh]);break;}$I[$Hh]=$o;}}}}return$I;}function
textarea($C,$Y,$K=10,$sb=80){global$x;echo"<textarea name='$C' rows='$K' cols='$sb' class='sqlarea jush-$x' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($y,$o,$qb,$ed=array(),$Mc=array()){global$_h,$vi,$Bi,$kf;$U=$o["type"];echo'<td><select name="',h($y),'[type]" class="type" aria-labelledby="label-type">';if($U&&!isset($vi[$U])&&!isset($ed[$U])&&!in_array($U,$Mc))$Mc[]=$U;if($ed)$_h[lang(96)]=$ed;echo
optionlist(array_merge($Mc,$_h),$U),'</select>
',on_help("getTarget(event).value",1),script("mixin(qsl('select'), {onfocus: function () { lastType = selectValue(this); }, onchange: editingTypeChange});",""),'<td><input name="',h($y),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$U)?" class='required'":""),' aria-labelledby="label-length">',script("mixin(qsl('input'), {onfocus: editingLengthFocus, oninput: editingLengthChange});",""),'<td class="options">';echo"<select name='".h($y)."[collation]'".(preg_match('~(char|text|enum|set)$~',$U)?"":" class='hidden'").'><option value="">('.lang(97).')'.optionlist($qb,$o["collation"]).'</select>',($Bi?"<select name='".h($y)."[unsigned]'".(!$U||preg_match(number_type(),$U)?"":" class='hidden'").'><option>'.optionlist($Bi,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($y)."[on_update]'".(preg_match('~timestamp|datetime~',$U)?"":" class='hidden'").'>'.optionlist(array(""=>"(".lang(98).")","CURRENT_TIMESTAMP"),$o["on_update"]).'</select>':''),($ed?"<select name='".h($y)."[on_delete]'".(preg_match("~`~",$U)?"":" class='hidden'")."><option value=''>(".lang(99).")".optionlist(explode("|",$kf),$o["on_delete"])."</select> ":" ");}function
process_length($qe){global$xc;return(preg_match("~^\\s*\\(?\\s*$xc(?:\\s*,\\s*$xc)*+\\s*\\)?\\s*\$~",$qe)&&preg_match_all("~$xc~",$qe,$_e)?"(".implode(",",$_e[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$qe)));}function
process_type($o,$ob="COLLATE"){global$Bi;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$Bi)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $ob ".q($o["collation"]):"");}function
process_field($o,$ti){return
array(idf_escape(trim($o["field"])),process_type($ti),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Tb=$o["default"];return($Tb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Tb)?q($Tb):$Tb));}function
type_class($U){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$y=>$X){if(preg_match("~$y|$X~",$U))return" class='$y'";}}function
edit_fields($p,$qb,$U="TABLE",$ed=array(),$wb=false){global$Nd;$p=array_values($p);echo'<thead><tr>
';if($U=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th id="label-name">',($U=="TABLE"?lang(100):lang(101)),'<td id="label-type">',lang(47),'<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">',lang(102),'<td>',lang(103);if($U=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="',lang(49),'">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default">',lang(50),(support("comment")?"<td id='label-comment'".($wb?"":" class='hidden'").">".lang(48):"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.2")."' alt='+' title='".lang(104)."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$s=>$o){$s++;$yf=$o[($_POST?"orig":"field")];$bc=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$yf=="");echo'<tr',($bc?"":" style='display: none;'"),'>
',($U=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$Nd),$o["inout"]):""),'<th>';if($bc){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" maxlength="64" autocapitalize="off" aria-labelledby="label-name">',script("qsl('input').oninput = function () { editingNameChange.call(this);".($o["field"]!=""||count($p)>1?"":" editingAddRow.call(this);")." };","");}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($yf),'">
';edit_type("fields[$s]",$o,$qb,$ed);if($U=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td>',checkbox("fields[$s][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td".($wb?"":" class='hidden'")."><input name='fields[$s][comment]' value='".h($o["comment"])."' maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.2")."' alt='+' title='".lang(104)."'>&nbsp;"."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.6.2")."' alt='â†‘' title='".lang(105)."'>&nbsp;"."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.6.2")."' alt='â†“' title='".lang(106)."'>&nbsp;":""),($yf==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.6.2")."' alt='x' title='".lang(107)."'>":"");}}function
process_fields(&$p){$D=0;if($_POST["up"]){$ke=0;foreach($p
as$y=>$o){if(key($_POST["up"])==$y){unset($p[$y]);array_splice($p,$ke,0,array($o));break;}if(isset($o["field"]))$ke=$D;$D++;}}elseif($_POST["down"]){$gd=false;foreach($p
as$y=>$o){if(isset($o["field"])&&$gd){unset($p[key($_POST["down"])]);array_splice($p,$D,0,array($gd));break;}if(key($_POST["down"])==$y)$gd=$o;$D++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($ld,$jg,$e,$jf){if(!$jg)return
true;if($jg==array("ALL PRIVILEGES","GRANT OPTION"))return($ld=="GRANT"?queries("$ld ALL PRIVILEGES$jf WITH GRANT OPTION"):queries("$ld ALL PRIVILEGES$jf")&&queries("$ld GRANT OPTION$jf"));return
queries("$ld ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$e, ",$jg).$e).$jf);}function
drop_create($gc,$h,$hc,$Th,$jc,$A,$Ke,$Ie,$Je,$gf,$Ve){if($_POST["drop"])query_redirect($gc,$A,$Ke);elseif($gf=="")query_redirect($h,$A,$Je);elseif($gf!=$Ve){$Hb=queries($h);queries_redirect($A,$Ie,$Hb&&queries($gc));if($Hb)queries($hc);}else
queries_redirect($A,$Ie,queries($Th)&&queries($jc)&&queries($gc)&&queries($h));}function
create_trigger($jf,$J){global$x;$Yh=" $J[Timing] $J[Event]".($J["Event"]=="UPDATE OF"?" ".idf_escape($J["Of"]):"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($x=="mssql"?$jf.$Yh:$Yh.$jf).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Og,$J){global$Nd,$x;$O=array();$p=(array)$J["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$O[]=(preg_match("~^($Nd)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$Ub=rtrim("\n$J[definition]",";");return"CREATE $Og ".idf_escape(trim($J["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").($x=="pgsql"?" AS ".q($Ub):"$Ub;");}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$G);}function
format_foreign_key($q){global$kf;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($kf)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($kf)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Vc,$di){$I=pack("a100a8a8a8a12a12",$Vc,644,0,0,decoct($di->size),decoct(time()));$hb=8*32;for($s=0;$s<strlen($I);$s++)$hb+=ord($I[$s]);$I.=sprintf("%06o",$hb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$di->send();echo
str_repeat("\0",511-($di->size+511)%512);}function
ini_bytes($Md){$X=ini_get($Md);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($Tf,$Uh="<sup>?</sup>"){global$x,$f;$fh=$f->server_info;$Qi=preg_replace('~^(\\d\\.?\\d).*~s','\\1',$fh);$Gi=array('sql'=>"https://dev.mysql.com/doc/refman/$Qi/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$Qi/static/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);if(preg_match('~MariaDB~',$fh)){$Gi['sql']="https://mariadb.com/kb/en/library/";$Tf['sql']=(isset($Tf['mariadb'])?$Tf['mariadb']:str_replace(".html","/",$Tf['sql']));}return($Tf[$x]?"<a href='$Gi[$x]$Tf[$x]'".target_blank().">$Uh</a>":"");}function
ob_gzencode($Q){return
gzencode($Q);}function
db_size($l){global$f;if(!$f->select_db($l))return"?";$I=0;foreach(table_status()as$S)$I+=$S["Data_length"]+$S["Index_length"];return
format_number($I);}function
set_utf8mb4($h){global$f;static$O=false;if(!$O&&preg_match('~\butf8mb4~i',$h)){$O=true;echo"SET NAMES ".charset($f).";\n\n";}}function
connect_error(){global$b,$f,$gi,$n,$fc;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header(lang(35).": ".h(DB),lang(108),true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),lang(109),drop_databases($_POST["db"]));page_header(lang(110),$n,false);echo"<p class='links'>\n";foreach(array('database'=>lang(111),'privileges'=>lang(69),'processlist'=>lang(112),'variables'=>lang(113),'status'=>lang(114),)as$y=>$X){if(support($y))echo"<a href='".h(ME)."$y='>$X</a>\n";}echo"<p>".lang(115,$fc[DRIVER],"<b>".h($f->server_info)."</b>","<b>$f->extension</b>")."\n","<p>".lang(116,"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$Vg=support("scheme");$qb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>&nbsp;":"")."<th>".lang(35)." - <a href='".h(ME)."refresh=1'>".lang(117)."</a>"."<td>".lang(118)."<td>".lang(119)."<td>".lang(120)." - <a href='".h(ME)."dbsize=1'>".lang(121)."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$T){$Ng=h(ME)."db=".urlencode($l);$t=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$t):""),"<th><a href='$Ng' id='$t'>".h($l)."</a>";$pb=nbsp(db_collation($l,$qb));echo"<td>".(support("database")?"<a href='$Ng".($Vg?"&amp;ns=":"")."&amp;database=' title='".lang(65)."'>$pb</a>":$pb),"<td align='right'><a href='$Ng&amp;schema=' id='tables-".h($l)."' title='".lang(68)."'>".($_GET["dbsize"]?$T:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".lang(122)." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".lang(123)."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$gi'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$f->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header(lang(75).": ".h($_GET["ns"]),lang(124),true);page_footer("ns");exit;}}$kf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($Bb){$this->size+=strlen($Bb);fwrite($this->handler,$Bb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$xc="'(?:''|[^'\\\\]|\\\\.)*'";$Nd="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$m->select($a,$L,array(where($_GET,$p)),$L);$J=($H?$H->fetch_row():array());echo$m->value($J[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$S=table_status1($a,true);$C=$b->tableName($S);page_header(($p&&is_view($S)?$S['Engine']=='materialized view'?lang(125):lang(126):lang(127)).": ".($C!=""?$C:h($a)),$n);$b->selectLinks($S);$vb=$S["Comment"];if($vb!="")echo"<p class='nowrap'>".lang(48).": ".h($vb)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($S)){if(support("indexes")){echo"<h3 id='indexes'>".lang(128)."</h3>\n";$w=indexes($a);if($w)$b->tableIndexesPrint($w);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.lang(129)."</a>\n";}if(fk_support($S)){echo"<h3 id='foreign-keys'>".lang(96)."</h3>\n";$ed=foreign_keys($a);if($ed){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(130)."<td>".lang(131)."<td>".lang(99)."<td>".lang(98)."<td>&nbsp;</thead>\n";foreach($ed
as$C=>$q){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".nbsp($q["on_delete"])."\n","<td>".nbsp($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.lang(132).'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.lang(133)."</a>\n";}}if(support(is_view($S)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".lang(134)."</h3>\n";$si=triggers($a);if($si){echo"<table cellspacing='0'>\n";foreach($si
as$y=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($y)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($y))."'>".lang(132)."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.lang(135)."</a>\n";}}elseif(isset($_GET["schema"])){page_header(lang(68),"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Jh=array();$Kh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$_e,PREG_SET_ORDER);foreach($_e
as$s=>$B){$Jh[$B[1]]=array($B[2],$B[3]);$Kh[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$hi=0;$Ra=-1;$Ug=array();$_g=array();$oe=array();foreach(table_status('',true)as$R=>$S){if(is_view($S))continue;$Yf=0;$Ug[$R]["fields"]=array();foreach(fields($R)as$C=>$o){$Yf+=1.25;$o["pos"]=$Yf;$Ug[$R]["fields"][$C]=$o;}$Ug[$R]["pos"]=($Jh[$R]?$Jh[$R]:array($hi,0));foreach($b->foreignKeys($R)as$X){if(!$X["db"]){$me=$Ra;if($Jh[$R][1]||$Jh[$X["table"]][1])$me=min(floatval($Jh[$R][1]),floatval($Jh[$X["table"]][1]))-1;else$Ra-=.1;while($oe[(string)$me])$me-=.0001;$Ug[$R]["references"][$X["table"]][(string)$me]=array($X["source"],$X["target"]);$_g[$X["table"]][$R][(string)$me]=$X["target"];$oe[(string)$me]=true;}}$hi=max($hi,$Ug[$R]["pos"][0]+2.5+$Yf);}echo'<div id="schema" style="height: ',$hi,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Kh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$hi,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($Ug
as$C=>$R){echo"<div class='table' style='top: ".$R["pos"][0]."em; left: ".$R["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($R["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$R["references"]as$Qh=>$Ag){foreach($Ag
as$me=>$xg){$ne=$me-$Jh[$C][1];$s=0;foreach($xg[0]as$oh)echo"\n<div class='references' title='".h($Qh)."' id='refs$me-".($s++)."' style='left: $ne"."em; top: ".$R["fields"][$oh]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$ne)."em;'></div></div>";}}foreach((array)$_g[$C]as$Qh=>$Ag){foreach($Ag
as$me=>$e){$ne=$me-$Jh[$C][1];$s=0;foreach($e
as$Ph)echo"\n<div class='references' title='".h($Qh)."' id='refd$me-".($s++)."' style='left: $ne"."em; top: ".$R["fields"][$Ph]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.6.2")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$ne)."em;'></div></div>";}}echo"\n</div>\n";}foreach($Ug
as$C=>$R){foreach((array)$R["references"]as$Qh=>$Ag){foreach($Ag
as$me=>$xg){$Oe=$hi;$De=-10;foreach($xg[0]as$y=>$oh){$Zf=$R["pos"][0]+$R["fields"][$oh]["pos"];$ag=$Ug[$Qh]["pos"][0]+$Ug[$Qh]["fields"][$xg[1][$y]]["pos"];$Oe=min($Oe,$Zf,$ag);$De=max($De,$Zf,$ag);}echo"<div class='references' id='refl$me' style='left: $me"."em; top: $Oe"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($De-$Oe)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">',lang(136),'</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Eb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$y)$Eb.="&$y=".urlencode($_POST[$y]);cookie("adminer_export",substr($Eb,1));$T=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Jc=dump_headers((count($T)==1?key($T):DB),(DB==""||count($T)>1));$Vd=preg_match('~sql~',$_POST["format"]);if($Vd){echo"-- Adminer $ia ".$fc[DRIVER]." dump\n\n";if($x=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$f->query("SET time_zone = '+00:00';");}}$Ah=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($f->select_db($l)){if($Vd&&preg_match('~CREATE~',$Ah)&&($h=$f->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($h);if($Ah=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$h;\n";}if($Vd){if($Ah)echo
use_sql($l).";\n\n";$Df="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Og){foreach(get_rows("SHOW $Og STATUS WHERE Db = ".q($l),null,"-- ")as$J){$h=remove_definer($f->result("SHOW CREATE $Og ".idf_escape($J["Name"]),2));set_utf8mb4($h);$Df.=($Ah!='DROP+CREATE'?"DROP $Og IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$h;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$h=remove_definer($f->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($h);$Df.=($Ah!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$h;;\n\n";}}if($Df)echo"DELIMITER ;;\n\n$Df"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Si=array();foreach(table_status('',true)as$C=>$S){$R=(DB==""||in_array($C,(array)$_POST["tables"]));$Mb=(DB==""||in_array($C,(array)$_POST["data"]));if($R||$Mb){if($Jc=="tar"){$di=new
TmpFile;ob_start(array($di,'write'),1e5);}$b->dumpTable($C,($R?$_POST["table_style"]:""),(is_view($S)?2:0));if(is_view($S))$Si[]=$C;elseif($Mb){$p=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($C));}if($Vd&&$_POST["triggers"]&&$R&&($si=trigger_sql($C)))echo"\nDELIMITER ;;\n$si\nDELIMITER ;\n";if($Jc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$C.csv",$di);}elseif($Vd)echo"\n";}}foreach($Si
as$Ri)$b->dumpTable($Ri,$_POST["table_style"],1);if($Jc=="tar")echo
pack("x512");}}}if($Vd)echo"-- ".$f->result("SELECT NOW()")."\n";exit;}page_header(lang(71),$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0">
';$Qb=array('','USE','DROP+CREATE','CREATE');$Lh=array('','DROP+CREATE','CREATE');$Nb=array('','TRUNCATE+INSERT','INSERT');if($x=="sql")$Nb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".lang(137)."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".lang(138)."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($x=="sqlite"?"":"<tr><th>".lang(35)."<td>".html_select('db_style',$Qb,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],lang(139)):"").(support("event")?checkbox("events",1,$J["events"],lang(140)):"")),"<tr><th>".lang(119)."<td>".html_select('table_style',$Lh,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],lang(49)).(support("trigger")?checkbox("triggers",1,$J["triggers"],lang(134)):""),"<tr><th>".lang(141)."<td>".html_select('data_style',$Nb,$J["data_style"]),'</table>
<p><input type="submit" value="',lang(71),'">
<input type="hidden" name="token" value="',$gi,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$dg=array();if(DB!=""){$fb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$fb>".lang(119)."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".lang(141)."<input type='checkbox' id='check-data'$fb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$Si="";$Mh=tables_list();foreach($Mh
as$C=>$U){$cg=preg_replace('~_.*~','',$C);$fb=($a==""||$a==(substr($a,-1)=="%"?"$cg%":$C));$gg="<tr><td>".checkbox("tables[]",$C,$fb,$C,"","block");if($U!==null&&!preg_match('~table~i',$U))$Si.="$gg\n";else
echo"$gg<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$fb)."</label>\n";$dg[$cg]++;}echo$Si;if($Mh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".lang(35)."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$cg=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$cg%",$l,"","block")."\n";$dg[$cg]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Xc=true;foreach($dg
as$y=>$X){if($y!=""&&$X>1){echo($Xc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$y%")."'>".h($y)."</a>";$Xc=false;}}}elseif(isset($_GET["privileges"])){page_header(lang(69));echo'<p class="links"><a href="'.h(ME).'user=">'.lang(142)."</a>";$H=$f->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$ld=$H;if(!$H)$H=$f->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($ld?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".lang(33)."<th>".lang(32)."<th>&nbsp;</thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.lang(10)."</a>\n";if(!$ld||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".lang(10)."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$xd=&get_session("queries");$wd=&$xd[DB];if(!$n&&$_POST["clear"]){$wd=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?lang(70):lang(62)),$n);if(!$n&&$_POST){$id=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$sh=$b->importServerPath();$id=@fopen((file_exists($sh)?$sh:"compress.zlib://$sh.gz"),"rb");$G=($id?fread($id,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$og=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$wd||reset(end($wd))!=$og){restart_session();$wd[]=array($og,time());set_session("queries",$xd);stop_session();}}$ph="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Wb=";";$D=0;$uc=true;$g=connect();if(is_object($g)&&DB!="")$g->select_db(DB);$ub=0;$zc=array();$Kf='[\'"'.($x=="sql"?'`#':($x=="sqlite"?'`[':($x=="mssql"?'[':''))).']|/\\*|-- |$'.($x=="pgsql"?'|\\$[^$]*\\$':'');$ii=microtime(true);parse_str($_COOKIE["adminer_export"],$ya);$lc=$b->dumpFormat();unset($lc["sql"]);while($G!=""){if(!$D&&preg_match("~^$ph*+DELIMITER\\s+(\\S+)~i",$G,$B)){$Wb=$B[1];$G=substr($G,strlen($B[0]));}else{preg_match('('.preg_quote($Wb)."\\s*|$Kf)",$G,$B,PREG_OFFSET_CAPTURE,$D);list($gd,$Yf)=$B[0];if(!$gd&&$id&&!feof($id))$G.=fread($id,1e5);else{if(!$gd&&rtrim($G)=="")break;$D=$Yf+strlen($gd);if($gd&&rtrim($gd)!=$Wb){while(preg_match('('.($gd=='/*'?'\\*/':($gd=='['?']':(preg_match('~^-- |^#~',$gd)?"\n":preg_quote($gd)."|\\\\."))).'|$)s',$G,$B,PREG_OFFSET_CAPTURE,$D)){$Sg=$B[0][0];if(!$Sg&&$id&&!feof($id))$G.=fread($id,1e5);else{$D=$B[0][1]+strlen($Sg);if($Sg[0]!="\\")break;}}}else{$uc=false;$og=substr($G,0,$Yf);$ub++;$gg="<pre id='sql-$ub'><code class='jush-$x'>".$b->sqlCommandQuery($og)."</code></pre>\n";if($x=="sqlite"&&preg_match("~^$ph*+ATTACH\\b~i",$og,$B)){echo$gg,"<p class='error'>".lang(143)."\n";$zc[]=" <a href='#sql-$ub'>$ub</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$gg;ob_flush();flush();}$wh=microtime(true);if($f->multi_query($og)&&is_object($g)&&preg_match("~^$ph*+USE\\b~i",$og))$g->query($og);do{$H=$f->store_result();if($f->error){echo($_POST["only_errors"]?$gg:""),"<p class='error'>".lang(144).($f->errno?" ($f->errno)":"").": ".error()."\n";$zc[]=" <a href='#sql-$ub'>$ub</a>";if($_POST["error_stops"])break
2;}else{$Wh=" <span class='time'>(".format_time($wh).")</span>".(strlen($og)<1000?" <a href='".h(ME)."sql=".urlencode(trim($og))."'>".lang(10)."</a>":"");$_a=$f->affected_rows;$Vi=($_POST["only_errors"]?"":$m->warnings());$Wi="warnings-$ub";if($Vi)$Wh.=", <a href='#$Wi'>".lang(44)."</a>".script("qsl('a').onclick = partial(toggle, '$Wi');","");$Gc=null;$Hc="explain-$ub";if(is_object($H)){$z=$_POST["limit"];$xf=select($H,$g,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$af=$H->num_rows;echo"<p>".($af?($z&&$af>$z?lang(145,$z):"").lang(146,$af):""),$Wh;if($g&&preg_match("~^($ph|\\()*+SELECT\\b~i",$og)&&($Gc=explain($g,$og)))echo", <a href='#$Hc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Hc');","");$t="export-$ub";echo", <a href='#$t'>".lang(71)."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<span id='$t' class='hidden'>: ".html_select("output",$b->dumpOutput(),$ya["output"])." ".html_select("format",$lc,$ya["format"])."<input type='hidden' name='query' value='".h($og)."'>"." <input type='submit' name='export' value='".lang(71)."'><input type='hidden' name='token' value='$gi'></span>\n"."</form>\n";}}else{if(preg_match("~^$ph*+(CREATE|DROP|ALTER)$ph++(DATABASE|SCHEMA)\\b~i",$og)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($f->info)."'>".lang(147,$_a)."$Wh\n";}echo($Vi?"<div id='$Wi' class='hidden'>\n$Vi</div>\n":"");if($Gc){echo"<div id='$Hc' class='hidden'>\n";select($Gc,$g,$xf);echo"</div>\n";}}$wh=microtime(true);}while($f->next_result());}$G=substr($G,$D);$D=0;}}}}if($uc)echo"<p class='message'>".lang(148)."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(149,$ub-count($zc))," <span class='time'>(".format_time($ii).")</span>\n";}elseif($zc&&$ub>1)echo"<p class='error'>".lang(144).": ".implode("",$zc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Dc="<input type='submit' value='".lang(150)."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$og=$_GET["sql"];if($_POST)$og=$_POST["query"];elseif($_GET["history"]=="all")$og=$wd;elseif($_GET["history"]!="")$og=$wd[$_GET["history"]][0];echo"<p>";textarea("query",$og,20);echo($_POST?"":script("qs('textarea').focus();")),"<p>$Dc\n",lang(151).": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".lang(152)."</legend><div>",(ini_bool("file_uploads")?"SQL (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Dc":lang(153)),"</div></fieldset>\n","<fieldset><legend>".lang(154)."</legend><div>",lang(155,"<code>".h($b->importServerPath()).(extension_loaded("zlib")?"[.gz]":"")."</code>"),' <input type="submit" name="webfile" value="'.lang(156).'">',"</div></fieldset>\n","<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),lang(157))."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),lang(158))."\n","<input type='hidden' name='token' value='$gi'>\n";if(!isset($_GET["import"])&&$wd){print_fieldset("history",lang(159),$_GET["history"]!="");for($X=end($wd);$X;$X=prev($wd)){$y=key($wd);list($og,$Wh,$pc)=$X;echo'<a href="'.h(ME."sql=&history=$y").'">'.lang(10)."</a>"." <span class='time' title='".@date('Y-m-d',$Wh)."'>".@date("H:i:s",$Wh)."</span>"." <code class='jush-$x'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$og)))),80,"</code>").($pc?" <span class='time'>($pc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".lang(160)."'>\n","<a href='".h(ME."sql=&history=all")."'>".lang(161)."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Ci=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$C=>$o){if(!isset($o["privileges"][$Ci?"update":"insert"])||$b->fieldName($o)=="")unset($p[$C]);}if($_POST&&!$n&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($Ci?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$w=indexes($a);$yi=unique_array($_GET["where"],$w);$rg="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,lang(162),$m->delete($a,$rg,!$yi));else{$O=array();foreach($p
as$C=>$o){$X=process_input($o);if($X!==false&&$X!==null)$O[idf_escape($C)]=$X;}if($Ci){if(!$O)redirect($A);queries_redirect($A,lang(163),$m->update($a,$O,$rg,!$yi));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$H=$m->insert($a,$O);$le=($H?last_id():0);queries_redirect($A,lang(164,($le?" $le":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($p
as$C=>$o){if(isset($o["privileges"]["select"])){$Ha=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ha="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$Ha="1*".idf_escape($C);$L[]=($Ha?"$Ha AS ":"").idf_escape($C);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$m->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$n=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$p){if(!$Z){$H=$m->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($m->primary=>"");}if($J){foreach($J
as$y=>$X){if(!$Z)$J[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$J,$Ci);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Mf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$y)$Mf[$y]=$y;$zg=referencable_primary($a);$ed=array();foreach($zg
as$Hh=>$o)$ed[str_replace("`","``",$Hh)."`".str_replace("`","``",$o["field"])]=$Hh;$_f=array();$S=array();if($a!=""){$_f=fields($a);$S=table_status($a);if(!$S)$n=lang(9);}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST&&!process_fields($J["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),lang(165),drop_tables(array($a)));else{$p=array();$Ea=array();$Hi=false;$cd=array();$zf=reset($_f);$Ba=" FIRST";foreach($J["fields"]as$y=>$o){$q=$ed[$o["type"]];$ti=($q!==null?$zg[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($y==$J["auto_increment_col"])$o["auto_increment"]=true;$lg=process_field($o,$ti);$Ea[]=array($o["orig"],$lg,$Ba);if($lg!=process_field($zf,$zf)){$p[]=array($o["orig"],$lg,$Ba);if($o["orig"]!=""||$Ba)$Hi=true;}if($q!==null)$cd[idf_escape($o["field"])]=($a!=""&&$x!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$ed[$o["type"]],'source'=>array($o["field"]),'target'=>array($ti["field"]),'on_delete'=>$o["on_delete"],));$Ba=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Hi=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$zf=next($_f);if(!$zf)$Ba="";}}$Of="";if($Mf[$J["partition_by"]]){$Pf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$y=>$X){$Y=$J["partition_values"][$y];$Pf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Of.="\nPARTITION BY $J[partition_by]($J[partition])".($Pf?" (".implode(",",$Pf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$S["Create_options"]))$Of.="\nREMOVE PARTITIONING";$He=lang(166);if($a==""){cookie("adminer_engine",$J["Engine"]);$He=lang(167);}$C=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$He,alter_table($a,$C,($x=="sqlite"&&($Hi||$cd)?$Ea:$p),$cd,($J["Comment"]!=$S["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$S["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$S["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Of));}}page_header(($a!=""?lang(42):lang(72)),$n,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($vi["int"])?"int":(isset($vi["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$J=$S;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($_f
as$o){$o["has_default"]=isset($o["default"]);$J["fields"][]=$o;}if(support("partitioning")){$jd="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$f->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $jd ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Pf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $jd AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Pf[""]="";$J["partition_names"]=array_keys($Pf);$J["partition_values"]=array_values($Pf);}}}$qb=collations();$wc=engines();foreach($wc
as$vc){if(!strcasecmp($vc,$J["Engine"])){$J["Engine"]=$vc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo
lang(168),': <input name="name" maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($wc?"<select name='Engine'>".optionlist(array(""=>"(".lang(169).")")+$wc,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($qb&&!preg_match("~sqlite|mssql~",$x)?html_select("Collation",array(""=>"(".lang(97).")")+$qb,$J["Collation"]):""),' <input type="submit" value="',lang(14),'">
';}echo'
';if(support("columns")){echo'<table cellspacing="0" id="edit-fields" class="nowrap">
';$wb=($_POST?$_POST["comments"]:$J["Comment"]!="");if(!$_POST&&!$wb){foreach($J["fields"]as$o){if($o["comment"]!=""){$wb=true;break;}}}edit_fields($J["fields"],$qb,"TABLE",$ed,$wb);echo'</table>
<p>
',lang(49),': <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,!$_POST||$_POST["defaults"],lang(170),"columnShow(this.checked, 5)","jsonly"),($_POST?"":script("editingHideDefaults();")),(support("comment")?"<label><input type='checkbox' name='comments' value='1' class='jsonly'".($wb?" checked":"").">".lang(48)."</label>".script("qsl('input').onclick = partial(editingCommentsClick, true);").' <input name="Comment" value="'.h($J["Comment"]).'" maxlength="'.(min_version(5.5)?2048:60).'"'.($wb?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="',lang(14),'">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(123),'">',confirm(lang(171,$a));}if(support("partitioning")){$Nf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",lang(172),$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Mf,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
',lang(173),': <input type="number" name="partitions" class="size',($Nf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Nf?"":" class='hidden'"),'>
<thead><tr><th>',lang(174),'<th>',lang(175),'</thead>
';foreach($J["partition_names"]as$y=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($y==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$y]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
',script("qs('#form')['defaults'].onclick();".(support("comment")?" editingCommentsClick.call(qs('#form')['comments']);":""));}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Fd=array("PRIMARY","UNIQUE","INDEX");$S=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$S["Engine"]))$Fd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$S["Engine"]))$Fd[]="SPATIAL";$w=indexes($a);$eg=array();if($x=="mongo"){$eg=$w["_id_"];unset($Fd[0]);unset($w["_id_"]);}$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$v){$C=$v["name"];if(in_array($v["type"],$Fd)){$e=array();$re=array();$Yb=array();$O=array();ksort($v["columns"]);foreach($v["columns"]as$y=>$d){if($d!=""){$qe=$v["lengths"][$y];$Xb=$v["descs"][$y];$O[]=idf_escape($d).($qe?"(".(+$qe).")":"").($Xb?" DESC":"");$e[]=$d;$re[]=($qe?$qe:null);$Yb[]=$Xb;}}if($e){$Ec=$w[$C];if($Ec){ksort($Ec["columns"]);ksort($Ec["lengths"]);ksort($Ec["descs"]);if($v["type"]==$Ec["type"]&&array_values($Ec["columns"])===$e&&(!$Ec["lengths"]||array_values($Ec["lengths"])===$re)&&array_values($Ec["descs"])===$Yb){unset($w[$C]);continue;}}$c[]=array($v["type"],$C,$O);}}}foreach($w
as$C=>$Ec)$c[]=array($Ec["type"],$C,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),lang(176),alter_indexes($a,$c));}page_header(lang(128),$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$y=>$v){if($v["columns"][count($v["columns"])]!="")$J["indexes"][$y]["columns"][]="";}$v=end($J["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($w
as$y=>$v){$w[$y]["name"]=$y;$w[$y]["columns"][]="";}$w[]=array("columns"=>array(1=>""));$J["indexes"]=$w;}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">',lang(177),'<th><input type="submit" class="wayoff">',lang(178),'<th id="label-name">',lang(179);?>
<th><noscript><input type='image' class='icon' name='add[0]' src='" . h(preg_replace("~\\?.*~", "", ME) . "?file=plus.gif&version=4.6.2") . "' alt='+' title='<?php echo
lang(104),'\'></noscript>&nbsp;
</thead>
';if($eg){echo"<tr><td>PRIMARY<td>";foreach($eg["columns"]as$y=>$d){echo
select_input(" disabled",$p,$d),"<label><input disabled type='checkbox'>".lang(57)."</label> ";}echo"<td><td>\n";}$Yd=1;foreach($J["indexes"]as$v){if(!$_POST["drop_col"]||$Yd!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$Yd][type]",array(-1=>"")+$Fd,$v["type"],($Yd==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($v["columns"]);$s=1;foreach($v["columns"]as$y=>$d){echo"<span>".select_input(" name='indexes[$Yd][columns][$s]' title='".lang(46)."'",($p?array_combine($p,$p):$p),$d,"partial(".($s==count($v["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($x=="sql"?"":$_GET["indexes"]."_")."')"),($x=="sql"||$x=="mssql"?"<input type='number' name='indexes[$Yd][lengths][$s]' class='size' value='".h($v["lengths"][$y])."' title='".lang(102)."'>":""),($x!="sql"?checkbox("indexes[$Yd][descs][$s]",1,$v["descs"][$y],lang(57)):"")," </span>";$s++;}echo"<td><input name='indexes[$Yd][name]' value='".h($v["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$Yd]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.6.2")."' alt='x' title='".lang(107)."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$Yd++;}echo'</table>
<p>
<input type="submit" value="',lang(14),'">
<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$C=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),lang(180),drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),lang(181),rename_database($C,$J["collation"]));}else{$k=explode("\n",str_replace("\r","",$C));$Bh=true;$ke="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$J["collation"]))$Bh=false;$ke=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($ke),lang(182),$Bh);}}else{if(!$J["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),lang(183));}}page_header(DB!=""?lang(65):lang(111),$n,array(),h(DB));$qb=collations();$C=DB;if($_POST)$C=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$qb);elseif($x=="sql"){foreach(get_vals("SHOW GRANTS")as$ld){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$ld,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" maxlength="64" autocapitalize="off">')."\n".($qb?html_select("collation",array(""=>"(".lang(97).")")+$qb,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if(DB!="")echo"<input type='submit' name='drop' value='".lang(123)."'>".confirm(lang(171,DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.2")."' alt='+' title='".lang(104)."'>\n";echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,lang(184));else{$C=trim($J["name"]);$_.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$_,lang(185));elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$_,lang(186));else
redirect($_);}}page_header($_GET["ns"]!=""?lang(66):lang(67),$n);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="',lang(14),'">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".lang(123)."'>".confirm(lang(171,$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header(lang(187).": ".h($da),$n);$Og=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Dd=array();$Df=array();foreach($Og["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$Df[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Dd[]=$s;}if(!$n&&$_POST){$ab=array();foreach($Og["fields"]as$y=>$o){if(in_array($y,$Dd)){$X=process_input($o);if($X===false)$X="''";if(isset($Df[$y]))$f->query("SET @".idf_escape($o["field"])." = $X");}$ab[]=(isset($Df[$y])?"@".idf_escape($o["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$ab).")";$wh=microtime(true);$H=$f->multi_query($G);$_a=$f->affected_rows;echo$b->selectQuery($G,$wh,!$H);if(!$H)echo"<p class='error'>".error()."\n";else{$g=connect();if(is_object($g))$g->select_db(DB);do{$H=$f->store_result();if(is_object($H))select($H,$g);else
echo"<p class='message'>".lang(188,$_a)."\n";}while($f->next_result());if($Df)select($f->query("SELECT ".implode(", ",$Df)));}}echo'
<form action="" method="post">
';if($Dd){echo"<table cellspacing='0'>\n";foreach($Dd
as$y){$o=$Og["fields"][$y];$C=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$C];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="',lang(187),'">
<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$He=($_POST["drop"]?lang(189):($C!=""?lang(190):lang(191)));$A=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Ph=array();foreach($J["source"]as$y=>$X)$Ph[$y]=$J["target"][$y];$J["target"]=$Ph;}if($x=="sqlite")queries_redirect($A,$He,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$gc="\nDROP ".($x=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$gc,$A,$He);else{query_redirect($c.($C!=""?"$gc,":"")."\nADD".format_foreign_key($J),$A,$He);$n=lang(192)."<br>$n";}}}page_header(lang(193),$n,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($C!=""){$ed=foreign_keys($a);$J=$ed[$C];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}$oh=array_keys(fields($a));$Ph=($a===$J["table"]?$oh:array_keys(fields($J["table"])));$yg=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($J["db"]==""&&$J["ns"]==""){echo
lang(194),':
',html_select("table",$yg,$J["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="',lang(195),'"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">',lang(130),'<th id="label-target">',lang(131),'</thead>
';$Yd=0;foreach($J["source"]as$y=>$X){echo"<tr>","<td>".html_select("source[".(+$y)."]",array(-1=>"")+$oh,$X,($Yd==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$y)."]",$Ph,$J["target"][$y],1,"label-target");$Yd++;}echo'</table>
<p>
',lang(99),': ',html_select("on_delete",array(-1=>"")+explode("|",$kf),$J["on_delete"]),' ',lang(98),': ',html_select("on_update",array(-1=>"")+explode("|",$kf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="',lang(14),'">
<noscript><p><input type="submit" name="add" value="',lang(196),'"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="',lang(123),'">',confirm(lang(171,$C));}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$Af="VIEW";if($x=="pgsql"&&$a!=""){$P=table_status($a);$Af=strtoupper($P["Engine"]);}if($_POST&&!$n){$C=trim($J["name"]);$Ha=" AS\n$J[select]";$A=ME."table=".urlencode($C);$He=lang(197);$U=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$C&&$x!="sqlite"&&$U=="VIEW"&&$Af=="VIEW")query_redirect(($x=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ha,$A,$He);else{$Rh=$C."_adminer_".uniqid();drop_create("DROP $Af ".table($a),"CREATE $U ".table($C).$Ha,"DROP $U ".table($C),"CREATE $U ".table($Rh).$Ha,"DROP $U ".table($Rh),($_POST["drop"]?substr(ME,0,-1):$A),lang(198),$He,lang(199),$a,$C);}}if(!$_POST&&$a!=""){$J=view($a);$J["name"]=$a;$J["materialized"]=($Af!="VIEW");if(!$n)$n=error();}page_header(($a!=""?lang(41):lang(200)),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>',lang(179),': <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],lang(125)):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($a!=""){echo'<input type="submit" name="drop" value="',lang(123),'">',confirm(lang(171,$a));}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Qd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$yh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),lang(201));elseif(in_array($J["INTERVAL_FIELD"],$Qd)&&isset($yh[$J["STATUS"]])){$Tg="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?lang(202):lang(203)),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Tg.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$Tg)."\n".$yh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?lang(204).": ".h($aa):lang(205)),$n);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(179),'<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" maxlength="64" autocapitalize="off">
<tr><th title="datetime">',lang(206),'<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">',lang(207),'<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>',lang(208),'<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Qd,$J["INTERVAL_FIELD"]),'<tr><th>',lang(114),'<td>',html_select("STATUS",$yh,$J["STATUS"]),'<tr><th>',lang(48),'<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",lang(209)),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($aa!=""){echo'<input type="submit" name="drop" value="',lang(123),'">',confirm(lang(171,$aa));}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Og=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$n){$yf=routine($_GET["procedure"],$Og);$Rh="$J[name]_adminer_".uniqid();drop_create("DROP $Og ".routine_id($da,$yf),create_routine($Og,$J),"DROP $Og ".routine_id($J["name"],$J),create_routine($Og,array("name"=>$Rh)+$J),"DROP $Og ".routine_id($Rh,$J),substr(ME,0,-1),lang(210),lang(211),lang(212),$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?lang(213):lang(214)).": ".h($da):(isset($_GET["function"])?lang(215):lang(216))),$n);if(!$_POST&&$da!=""){$J=routine($_GET["procedure"],$Og);$J["name"]=$da;}$qb=get_vals("SHOW CHARACTER SET");sort($qb);$Pg=routine_languages();echo'
<form action="" method="post" id="form">
<p>',lang(179),': <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',($Pg?lang(19).": ".html_select("language",$Pg,$J["language"])."\n":""),'<input type="submit" value="',lang(14),'">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$qb,$Og);if(isset($_GET["function"])){echo"<tr><td>".lang(217);edit_type("returns",$J["returns"],$qb,array(),($x=="pgsql"?array("void","trigger"):array()));}echo'</table>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($da!=""){echo'<input type="submit" name="drop" value="',lang(123),'">',confirm(lang(171,$da));}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$C=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,lang(218));elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$_,lang(219));elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$_,lang(220));else
redirect($_);}page_header($fa!=""?lang(221).": ".h($fa):lang(222),$n);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="',lang(14),'">
';if($fa!="")echo"<input type='submit' name='drop' value='".lang(123)."'>".confirm(lang(171,$fa))."\n";echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,lang(223));else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$_,lang(224));}page_header($ga!=""?lang(225).": ".h($ga):lang(226),$n);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".lang(123)."'>".confirm(lang(171,$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".lang(14)."'>\n";}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$ri=trigger_options();$J=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$ri["Timing"])&&in_array($_POST["Event"],$ri["Event"])&&in_array($_POST["Type"],$ri["Type"])){$jf=" ON ".table($a);$gc="DROP TRIGGER ".idf_escape($C).($x=="pgsql"?$jf:"");$A=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($gc,$A,lang(227));else{if($C!="")queries($gc);queries_redirect($A,($C!=""?lang(228):lang(229)),queries(create_trigger($jf,$_POST)));if($C!="")queries(create_trigger($jf,$J+array("Type"=>reset($ri["Type"]))));}}$J=$_POST;}page_header(($C!=""?lang(230).": ".h($C):lang(231)),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>',lang(232),'<td>',html_select("Timing",$ri["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>',lang(233),'<td>',html_select("Event",$ri["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$ri["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>',lang(47),'<td>',html_select("Type",$ri["Type"],$J["Type"]),'</table>
<p>',lang(179),': <input name="Trigger" value="',h($J["Trigger"]),'" maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="',lang(14),'">
';if($C!=""){echo'<input type="submit" name="drop" value="',lang(123),'">',confirm(lang(171,$C));}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$jg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Cb)$jg[$Cb][$J["Privilege"]]=$J["Comment"];}$jg["Server Admin"]+=$jg["File access on server"];$jg["Databases"]["Create routine"]=$jg["Procedures"]["Create routine"];unset($jg["Procedures"]["Create routine"]);$jg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$jg["Columns"][$X]=$jg["Tables"][$X];unset($jg["Server Admin"]["Usage"]);foreach($jg["Tables"]as$y=>$X)unset($jg["Databases"][$y]);$Ue=array();if($_POST){foreach($_POST["objects"]as$y=>$X)$Ue[$X]=(array)$Ue[$X]+(array)$_POST["grants"][$y];}$md=array();$hf="";if(isset($_GET["host"])&&($H=$f->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$B[1],$_e,PREG_SET_ORDER)){foreach($_e
as$X){if($X[1]!="USAGE")$md["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$md["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$B))$hf=$B[1];}}if($_POST&&!$n){$if=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $if",ME."privileges=",lang(234));else{$We=q($_POST["user"])."@".q($_POST["host"]);$Rf=$_POST["pass"];if($Rf!=''&&!$_POST["hashed"]){$Rf=$f->result("SELECT PASSWORD(".q($Rf).")");$n=!$Rf;}$Hb=false;if(!$n){if($if!=$We){$Hb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $We IDENTIFIED BY PASSWORD ".q($Rf));$n=!$Hb;}elseif($Rf!=$hf)queries("SET PASSWORD FOR $We = ".q($Rf));}if(!$n){$Lg=array();foreach($Ue
as$cf=>$ld){if(isset($_GET["grant"]))$ld=array_filter($ld);$ld=array_keys($ld);if(isset($_GET["grant"]))$Lg=array_diff(array_keys(array_filter($Ue[$cf],'strlen')),$ld);elseif($if==$We){$ff=array_keys((array)$md[$cf]);$Lg=array_diff($ff,$ld);$ld=array_diff($ld,$ff);unset($md[$cf]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$cf,$B)&&(!grant("REVOKE",$Lg,$B[2]," ON $B[1] FROM $We")||!grant("GRANT",$ld,$B[2]," ON $B[1] TO $We"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($if!=$We)queries("DROP USER $if");elseif(!isset($_GET["grant"])){foreach($md
as$cf=>$Lg){if(preg_match('~^(.+)(\\(.*\\))?$~U',$cf,$B))grant("REVOKE",array_keys($Lg),$B[2]," ON $B[1] FROM $We");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?lang(235):lang(236)),!$n);if($Hb)$f->query("DROP USER $We");}}page_header((isset($_GET["host"])?lang(33).": ".h("$ha@$_GET[host]"):lang(142)),$n,array("privileges"=>array('',lang(69))));if($_POST){$J=$_POST;$md=$Ue;}else{$J=$_GET+array("host"=>$f->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$hf;if($hf!="")$J["hashed"]=true;$md[(DB==""||$md?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>',lang(32),'<td><input name="host" maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>',lang(33),'<td><input name="user" maxlength="16" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>',lang(34),'<td><input name="pass" id="pass" value="',h($J["pass"]),'" autocomplete="new-password">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo
checkbox("hashed",1,$J["hashed"],lang(237),"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".lang(69).doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($md
as$cf=>$ld){echo'<th>'.($cf!="*.*"?"<input name='objects[$s]' value='".h($cf)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>lang(32),"Databases"=>lang(35),"Tables"=>lang(127),"Columns"=>lang(46),"Procedures"=>lang(238),)as$Cb=>$Xb){foreach((array)$jg[$Cb]as$ig=>$vb){echo"<tr".odd()."><td".($Xb?">$Xb<td":" colspan='2'").' lang="en" title="'.h($vb).'">'.h($ig);$s=0;foreach($md
as$cf=>$ld){$C="'grants[$s][".h(strtoupper($ig))."]'";$Y=$ld[strtoupper($ig)];if($Cb=="Server Admin"&&$cf!=(isset($md["*.*"])?"*.*":".*"))echo"<td>&nbsp;";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".lang(239)."<option value='0'".($Y=="0"?" selected":"").">".lang(240)."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$C value='1'".($Y?" checked":"").($ig=="All privileges"?" id='grants-$s-all'>":">".($ig=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$s-all'); };"))),"</label>";}$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="',lang(14),'">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="',lang(123),'">',confirm(lang(171,"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$fe=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$fe++;}queries_redirect(ME."processlist=",lang(241,$fe),$fe||!$_POST["kill"]);}page_header(lang(112),$n);echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$s=-1;foreach(process_list()as$s=>$J){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"");foreach($J
as$y=>$X)echo"<th>$y".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($y),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$x=="sql"?"Id":"pid"],0):"");foreach($J
as$y=>$X)echo"<td>".(($x=="sql"&&$y=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($x=="pgsql"&&$y=="current_query"&&$X!="<IDLE>")||($x=="oracle"&&$y=="sql_text"&&$X!="")?"<code class='jush-$x'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.lang(242).'</a>':nbsp($X));echo"\n";}echo'</table>
<p>
';if(support("kill")){echo($s+1)."/".lang(243,max_connections()),"<p><input type='submit' value='".lang(244)."'>\n";}echo'<input type="hidden" name="token" value="',$gi,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$w=indexes($a);$p=fields($a);$ed=column_foreign_keys($a);$ef=$S["Oid"];parse_str($_COOKIE["adminer_import"],$za);$Mg=array();$e=array();$Vh=null;foreach($p
as$y=>$o){$C=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$C!=""){$e[$y]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($o))$Vh=$b->selectLengthProcess();}$Mg+=$o["privileges"];}list($L,$nd)=$b->selectColumnsProcess($e,$w);$Ud=count($nd)<count($L);$Z=$b->selectSearchProcess($p,$w);$uf=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$zi=>$J){$Ha=convert_field($p[key($J)]);$L=array($Ha?$Ha:idf_escape(key($J)));$Z[]=where_check($zi,$p);$I=$m->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$eg=$Ai=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$eg=array_flip($v["columns"]);$Ai=($L?$eg:array());foreach($Ai
as$y=>$X){if(in_array(idf_escape($y),$L))unset($Ai[$y]);}break;}}if($ef&&!$eg){$eg=$Ai=array($ef=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($ef));}if($_POST&&!$n){$bj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$gb=array();foreach($_POST["check"]as$db)$gb[]=where_check($db,$p);$bj[]="((".implode(") OR (",$gb)."))";}$bj=($bj?"\nWHERE ".implode(" AND ",$bj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$jd=($L?implode(", ",$L):"*").convert_fields($e,$p,$L)."\nFROM ".table($a);$pd=($nd&&$Ud?"\nGROUP BY ".implode(", ",$nd):"").($uf?"\nORDER BY ".implode(", ",$uf):"");if(!is_array($_POST["check"])||$eg)$G="SELECT $jd$bj$pd";else{$xi=array();foreach($_POST["check"]as$X)$xi[]="(SELECT".limit($jd,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$pd,1).")";$G=implode(" UNION ALL ",$xi);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$ed)){if($_POST["save"]||$_POST["delete"]){$H=true;$_a=0;$O=array();if(!$_POST["delete"]){foreach($e
as$C=>$X){$X=process_input($p[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$O){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($eg&&is_array($_POST["check"]))||$Ud){$H=($_POST["delete"]?$m->delete($a,$bj):($_POST["clone"]?queries("INSERT $G$bj"):$m->update($a,$O,$bj)));$_a=$f->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Xi="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$H=($_POST["delete"]?$m->delete($a,$Xi,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$Xi)):$m->update($a,$O,$Xi,1)));if(!$H)break;$_a+=$f->affected_rows;}}}$He=lang(245,$_a);if($_POST["clone"]&&$H&&$_a==1){$le=last_id();if($le)$He=lang(164," $le");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$He,$H);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(246);else{$H=true;$_a=0;foreach($_POST["val"]as$zi=>$J){$O=array();foreach($J
as$y=>$X){$y=bracket_escape($y,1);$O[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$H=$m->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($zi,$p),!$Ud&&!$eg," ");if(!$H)break;$_a+=$f->affected_rows;}queries_redirect(remove_from_uri(),lang(245,$_a),$H);}}elseif(!is_string($Uc=get_file("csv_file",true)))$n=upload_error($Uc);elseif(!preg_match('~~u',$Uc))$n=lang(247);else{cookie("adminer_import","output=".urlencode($za["output"])."&format=".urlencode($_POST["separator"]));$H=true;$sb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Uc,$_e);$_a=count($_e[0]);$m->begin();$M=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($_e[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$M]*)$M~",$X.$M,$Ae);if(!$y&&!array_diff($Ae[1],$sb)){$sb=$Ae[1];$_a--;}else{$O=array();foreach($Ae[1]as$s=>$nb)$O[idf_escape($sb[$s])]=($nb==""&&$p[$sb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$nb))));$K[]=$O;}}$H=(!$K||$m->insertUpdate($a,$K,$eg));if($H)$H=$m->commit();queries_redirect(remove_from_uri("page"),lang(248,$_a),$H);$m->rollback();}}}$Hh=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(51).": $Hh",$n);$O=null;if(isset($Mg["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if($ed[$X["col"]]&&count($ed[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$O);if(!$e&&support("table"))echo"<p class='error'>".lang(249).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$e);$b->selectSearchPrint($Z,$e,$w);$b->selectOrderPrint($uf,$e,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($Vh);$b->selectActionPrint($w);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$hd=$f->result(count_rows($a,$Z,$Ud,$nd));$E=floor(max(0,$hd-1)/$z);}$Yg=$L;$od=$nd;if(!$Yg){$Yg[]="*";$Db=convert_fields($e,$p,$L);if($Db)$Yg[]=substr($Db,2);}foreach($L
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($Ha=convert_field($o)))$Yg[$y]="$Ha AS $X";}if(!$Ud&&$Ai){foreach($Ai
as$y=>$X){$Yg[]=idf_escape($y);if($od)$od[]=idf_escape($y);}}$H=$m->select($a,$Yg,$Z,$od,$uf,$z,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$E)$H->seek($z*$E);$tc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$x=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$z!=""&&$nd&&$Ud&&$x=="sql")$hd=$f->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".lang(12)."\n";else{$Qa=$b->backwardKeys($a,$Hh);echo"<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$nd&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(250)."</a>");$Te=array();$kd=array();reset($L);$tg=1;foreach($K[0]as$y=>$X){if(!isset($Ai[$y])){$X=$_GET["columns"][key($L)];$o=$p[$L?($X?$X["col"]:current($L)):$y];$C=($o?$b->fieldName($o,$tg):($X["fun"]?"*":$y));if($C!=""){$tg++;$Te[$y]=$C;$d=idf_escape($y);$_d=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Xb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($_d.($uf[0]==$d||$uf[0]==$y||(!$uf&&$Ud&&$nd[0]==$d)?$Xb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($_d.$Xb)."' title='".lang(57)."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(54).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$kd[$y]=$X["fun"];next($L);}}$re=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$y=>$X)$re[$y]=max($re[$y],min(40,strlen(utf8_decode($X))));}}echo($Qa?"<th>".lang(251):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$ed)as$Se=>$J){$yi=unique_array($K[$Se],$w);if(!$yi){$yi=array();foreach($K[$Se]as$y=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$y))$yi[$y]=$X;}}$zi="";foreach($yi
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($f).")").")";$X=md5($X);}$zi.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$nd&&$L?"":"<td>".checkbox("check[]",substr($zi,1),in_array(substr($zi,1),(array)$_POST["check"])).($Ud||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$zi)."' class='edit'>".lang(252)."</a>"));foreach($J
as$y=>$X){if(isset($Te[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($tc[$y])||$tc[$y]!=""))$tc[$y]=(is_mail($X)?$Te[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$zi;if(!$_&&$X!==null){foreach((array)$ed[$y]as$q){if(count($ed[$y])==1||end($q["source"])==$y){$_="";foreach($q["source"]as$s=>$oh)$_.=where_link($s,$q["target"][$s],$K[$Se][$oh]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if($q["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\\1'.urlencode($q["ns"]),$_);if(count($q["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$yi))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($yi
as$Zd=>$W)$_.=where_link($s++,$Zd,$W);}$X=select_value($X,$_,$o,$Vh);$t=h("val[$zi][".bracket_escape($y)."]");$Y=$_POST["val"][$zi][bracket_escape($y)];$oc=!is_array($J[$y])&&is_utf8($X)&&$K[$Se][$y]==$J[$y]&&!$kd[$y];$Uh=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$oc)||$Y!==null){$rd=h($Y!==null?$Y:$J[$y]);echo"<td>".($Uh?"<textarea name='$t' cols='30' rows='".(substr_count($J[$y],"\n")+1)."'>$rd</textarea>":"<input name='$t' value='$rd' size='$re[$y]'>");}else{$ve=strpos($X,"<i>...</i>");echo"<td id='$t' data-text='".($ve?2:($Uh?1:0))."'".($oc?"":" data-warning='".h(lang(253))."'").">$X</td>";}}}if($Qa)echo"<td>";$b->backwardKeysPrint($Qa,$K[$Se]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(!is_ajax()){if($K||$E){$Cc=true;if($_GET["page"]!="last"){if($z==""||(count($K)<$z&&($K||!$E)))$hd=($E?$E*$z:0)+count($K);elseif($x!="sql"||!$Ud){$hd=($Ud?false:found_rows($S,$Z));if($hd<max(1e4,2*($E+1)*$z))$hd=reset(slow_query(count_rows($a,$Z,$Ud,$nd)));else$Cc=false;}}$Gf=($z!=""&&($hd===false||$hd>$z||$E));if($Gf){echo(($hd===false?count($K)+1:$hd-$E*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.lang(254).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(255)."...');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$E){if($Gf){$Ce=($hd===false?$E+(count($K)>=$z?2:1):floor(($hd-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(256)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(256)."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" ...":"");for($s=max(1,$E-4);$s<min($Ce,$E+5);$s++)echo
pagination($s,$E);if($Ce>0){echo($E+5<$Ce?" ...":""),($Cc&&$hd!==false?pagination($Ce,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Ce'>".lang(257)."</a>");}}else{echo"<legend>".lang(256)."</legend>",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($Ce>$E?pagination($E+1,$E).($Ce>$E+1?" ...":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(258)."</legend>";$cc=($Cc?"":"~ ").$hd;echo
checkbox("all",1,0,($hd!==false?($Cc?"":"~ ").lang(146,$hd):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$cc' : checked); selectCount('selected2', this.checked || !checked ? '$cc' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(250),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(246).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(122),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(242),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$fd=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($fd['sql']);break;}}if($fd){print_fieldset("export",lang(71)." <span id='selected2'></span>");$Ef=$b->dumpOutput();echo($Ef?html_select("output",$Ef,$za["output"])." ":""),html_select("format",$fd,$za["format"])," <input type='submit' name='export' value='".lang(71)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($tc,'strlen'),$e);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(70)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$za["format"],1);echo" <input type='submit' name='import' value='".lang(70)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$gi'>\n","</form>\n",(!$nd&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$P=isset($_GET["status"]);page_header($P?lang(114):lang(113));$Oi=($P?show_status():show_variables());if(!$Oi)echo"<p class='message'>".lang(12)."\n";else{echo"<table cellspacing='0'>\n";foreach($Oi
as$y=>$X){echo"<tr>","<th><code class='jush-".$x.($P?"status":"set")."'>".h($y)."</code>","<td>".nbsp($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Eh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$S){json_row("Comment-$C",nbsp($S["Comment"]));if(!is_view($S)){foreach(array("Engine","Collation")as$y)json_row("$y-$C",nbsp($S[$y]));foreach($Eh+array("Auto_increment"=>0,"Rows"=>0)as$y=>$X){if($S[$y]!=""){$X=format_number($S[$y]);json_row("$y-$C",($y=="Rows"&&$X&&$S["Engine"]==($rh=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Eh[$y]))$Eh[$y]+=($S["Engine"]!="InnoDB"||$y!="Data_free"?$S[$y]:0);}elseif(array_key_exists($y,$S))json_row("$y-$C");}}}foreach($Eh
as$y=>$X)json_row("sum-$y",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$f->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$Nh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Nh&&!$n&&!$_POST["search"]){$H=true;$He="";if($x=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$He=lang(259);}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$He=lang(260);}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$He=lang(261);}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$He=lang(262);}elseif($x!="sql"){$H=($x=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$He=lang(263);}elseif(!$_POST["tables"])$He=lang(9);elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$He.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$He,$H);}page_header(($_GET["ns"]==""?lang(35).": ".h(DB):lang(75).": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".lang(264)."</h3>\n";$Mh=tables_list();if(!$Mh)echo"<p class='message'>".lang(9)."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".lang(265)." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".lang(54)."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}$dc=doc_link(array('sql'=>'show-table-status.html'));echo"<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.lang(127),'<td>'.lang(266).doc_link(array('sql'=>'storage-engines.html')),'<td>'.lang(118).doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.lang(267).$dc,'<td>'.lang(268).$dc,'<td>'.lang(269).$dc,'<td>'.lang(49).doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.lang(270).$dc,(support("comment")?'<td>'.lang(48).$dc:''),"</thead>\n";$T=0;foreach($Mh
as$C=>$U){$Ri=($U!==null&&!preg_match('~table~i',$U));$t=h("Table-".$C);echo'<tr'.odd().'><td>'.checkbox(($Ri?"views[]":"tables[]"),$C,in_array($C,$Nh,true),"","","",$t),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($C)."' title='".lang(40)."' id='$t'>".h($C).'</a>':h($C));if($Ri){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.lang(41).'">'.(preg_match('~materialized~i',$U)?lang(125):lang(126)).'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.lang(39).'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",lang(42)),"Index_length"=>array("indexes",lang(129)),"Data_free"=>array("edit",lang(43)),"Auto_increment"=>array("auto_increment=1&create",lang(42)),"Rows"=>array("select",lang(39)),)as$y=>$_){$t=" id='$y-".h($C)."'";echo($_?"<td align='right'>".(support("table")||$y=="Rows"||(support("indexes")&&$y!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($C)."'$t title='$_[1]'>?</a>":"<span$t>?</span>"):"<td id='$y-".h($C)."'>&nbsp;");}$T++;}echo(support("comment")?"<td id='Comment-".h($C)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".lang(243,count($Mh)),"<td>".nbsp($x=="sql"?$f->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$y)echo"<td align='right' id='sum-$y'>&nbsp;";echo"</table>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Li="<input type='submit' value='".lang(271)."'> ".on_help("'VACUUM'");$qf="<input type='submit' name='optimize' value='".lang(272)."'> ".on_help($x=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".lang(122)." <span id='selected'></span></legend><div>".($x=="sqlite"?$Li:($x=="pgsql"?$Li.$qf:($x=="sql"?"<input type='submit' value='".lang(273)."'> ".on_help("'ANALYZE TABLE'").$qf."<input type='submit' name='check' value='".lang(274)."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".lang(275)."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".lang(276)."'> ".on_help($x=="sqlite"?"'DELETE'":"'TRUNCATE".($x=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".lang(123)."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$x!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".lang(277).": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".lang(278)."'>",(support("copy")?" <input type='submit' name='copy' value='".lang(279)."'>":""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $T);":"")." }"),"<input type='hidden' name='token' value='$gi'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.lang(72)."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.lang(200)."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".lang(139)."</h3>\n";$Qg=routines();if($Qg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.lang(179).'<td>'.lang(47).'<td>'.lang(217)."<td>&nbsp;</thead>\n";odd('');foreach($Qg
as$J){$C=($J["SPECIFIC_NAME"]==$J["ROUTINE_NAME"]?"":"&name=".urlencode($J["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.lang(132)."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.lang(216).'</a>':'').'<a href="'.h(ME).'function=">'.lang(215)."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".lang(280)."</h3>\n";$eh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($eh){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(179)."</thead>\n";odd('');foreach($eh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".lang(222)."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".lang(24)."</h3>\n";$Ji=types();if($Ji){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(179)."</thead>\n";odd('');foreach($Ji
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".lang(226)."</a>\n";}if(support("event")){echo"<h3 id='events'>".lang(140)."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".lang(179)."<td>".lang(281)."<td>".lang(206)."<td>".lang(207)."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?lang(282)."<td>".$J["Execute at"]:lang(208)." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.lang(132).'</a>';}echo"</table>\n";$Ac=$f->result("SELECT @@event_scheduler");if($Ac&&$Ac!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($Ac)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.lang(205)."</a>\n";}if($Mh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();