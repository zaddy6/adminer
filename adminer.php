<?php
/** Adminer Editor - Compact database editor
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.7.5
*/error_reporting(6135);$qc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($qc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Jg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Jg)$$X=$Jg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($u){$Bd=substr($u,-1);return
str_replace($Bd.$Bd,$Bd,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Se,$qc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($Se)){foreach($X
as$sd=>$W){unset($Se[$y][$sd]);if(is_array($W)){$Se[$y][stripslashes($sd)]=$W;$Se[]=&$Se[$y][stripslashes($sd)];}else$Se[$y][stripslashes($sd)]=($qc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Ia=false){static$vg=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Ia?array_flip($vg):$vg));}function
min_version($Wg,$Nd="",$i=null){global$h;if(!$i)$i=$h;$Bf=$i->server_info;if($Nd&&preg_match('~([\d.]+)-MariaDB~',$Bf,$A)){$Bf=$A[1];$Wg=$Nd;}return(version_compare($Bf,$Wg)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Kf,$ug="\n"){return"<script".nonce().">$Kf</script>$ug";}function
script_src($Og){return"<script src='".h($Og)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($B,$Y,$Xa,$yd="",$pe="",$bb="",$zd=""){$J="<input type='checkbox' name='$B' value='".h($Y)."'".($Xa?" checked":"").($zd?" aria-labelledby='$zd'":"").">".($pe?script("qsl('input').onclick = function () { $pe };",""):"");return($yd!=""||$bb?"<label".($bb?" class='$bb'":"").">$J".h($yd)."</label>":$J);}function
optionlist($C,$wf=null,$Sg=false){$J="";foreach($C
as$sd=>$W){$ue=array($sd=>$W);if(is_array($W)){$J.='<optgroup label="'.h($sd).'">';$ue=$W;}foreach($ue
as$y=>$X)$J.='<option'.($Sg||is_string($y)?' value="'.h($y).'"':'').(($Sg||is_string($y)?(string)$y:$X)===$wf?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($B,$C,$Y="",$oe=true,$zd=""){if($oe)return"<select name='".h($B)."'".($zd?" aria-labelledby='$zd'":"").">".optionlist($C,$Y)."</select>".(is_string($oe)?script("qsl('select').onchange = function () { $oe };",""):"");$J="";foreach($C
as$y=>$X)$J.="<label><input type='radio' name='".h($B)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Da,$C,$Y="",$oe="",$Je=""){$dg=($C?"select":"input");return"<$dg$Da".($C?"><option value=''>$Je".optionlist($C,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Je'>").($oe?script("qsl('$dg').onchange = $oe;",""):"");}function
confirm($Vd="",$xf="qsl('input')"){return
script("$xf.onclick = function () { return confirm('".($Vd?js_escape($Vd):lang(0))."'); };","");}function
print_fieldset($t,$Dd,$Zg=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$Dd</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Zg?"":" class='hidden'").">\n";}function
bold($Qa,$bb=""){return($Qa?" class='active $bb'":($bb?" class='$bb'":""));}function
odd($J=' class="odd"'){static$s=0;if(!$J)$s=-1;return($s++%2?$J:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($y,$X=null){static$rc=true;if($rc)echo"{";if($y!=""){echo($rc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$rc=false;}else{echo"\n}\n";$rc=true;}}function
ini_bool($id){$X=ini_get($id);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$J;if($J===null)$J=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$J;}function
set_password($Vg,$O,$V,$F){$_SESSION["pwds"][$Vg][$O][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$J=get_session("pwds");if(is_array($J))$J=($_COOKIE["adminer_key"]?decrypt_string($J[0],$_COOKIE["adminer_key"]):false);return$J;}function
q($Q){global$h;return$h->quote($Q);}function
get_vals($G,$e=0){global$h;$J=array();$I=$h->query($G);if(is_object($I)){while($K=$I->fetch_row())$J[]=$K[$e];}return$J;}function
get_key_vals($G,$i=null,$Ef=true){global$h;if(!is_object($i))$i=$h;$J=array();$I=$i->query($G);if(is_object($I)){while($K=$I->fetch_row()){if($Ef)$J[$K[0]]=$K[1];else$J[]=$K[0];}}return$J;}function
get_rows($G,$i=null,$o="<p class='error'>"){global$h;$mb=(is_object($i)?$i:$h);$J=array();$I=$mb->query($G);if(is_object($I)){while($K=$I->fetch_assoc())$J[]=$K;}elseif(!$I&&!is_object($i)&&$o&&defined("PAGE_HEADER"))echo$o.error()."\n";return$J;}function
unique_array($K,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$J=array();foreach($v["columns"]as$y){if(!isset($K[$y]))continue
2;$J[$y]=$K[$y];}return$J;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$q=array()){global$h,$x;$J=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$J[]=$e.($x=="sql"&&is_numeric($X)&&preg_match('~\.~',$X)?" LIKE ".q($X):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($q[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$q[$y]["type"])&&preg_match("~[^ -@]~",$X))$J[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$y)$J[]=escape_key($y)." IS NULL";return
implode(" AND ",$J);}function
where_check($X,$q=array()){parse_str($X,$Va);remove_slashes(array(&$Va));return
where($Va,$q);}function
where_link($s,$e,$Y,$re="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$re:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$q,$M=array()){$J="";foreach($f
as$y=>$X){if($M&&!in_array(idf_escape($y),$M))continue;$_a=convert_field($q[$y]);if($_a)$J.=", $_a AS ".idf_escape($y);}return$J;}function
cookie($B,$Y,$Gd=2592000){global$aa;return
header("Set-Cookie: $B=".urlencode($Y).($Gd?"; expires=".gmdate("D, d M Y H:i:s",time()+$Gd)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($wc=false){$Rg=ini_bool("session.use_cookies");if(!$Rg||$wc){session_write_close();if($Rg&&@ini_set("session.use_cookies",false)===false)session_start();}}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Vg,$O,$V,$m=null){global$Jb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Jb))."|username|".($m!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Vg!="server"||$O!=""?urlencode($Vg)."=".urlencode($O)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Id,$Vd=null){if($Vd!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Id!==null?$Id:$_SERVER["REQUEST_URI"]))][]=$Vd;}if($Id!==null){if($Id=="")$Id=".";header("Location: $Id");exit;}}function
query_redirect($G,$Id,$Vd,$cf=true,$cc=true,$jc=false,$kg=""){global$h,$o,$b;if($cc){$Qf=microtime(true);$jc=!$h->query($G);$kg=format_time($Qf);}$Nf="";if($G)$Nf=$b->messageQuery($G,$kg,$jc);if($jc){$o=error().$Nf.script("messagesPrint();");return
false;}if($cf)redirect($Id,$Vd.$Nf);return
true;}function
queries($G){global$h;static$We=array();static$Qf;if(!$Qf)$Qf=microtime(true);if($G===null)return
array(implode("\n",$We),format_time($Qf));$We[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$h->query($G);}function
apply_queries($G,$T,$Zb='table'){foreach($T
as$R){if(!queries("$G ".$Zb($R)))return
false;}return
true;}function
queries_redirect($Id,$Vd,$cf){list($We,$kg)=queries(null);return
query_redirect($We,$Id,$Vd,$cf,false,!$cf,$kg);}function
format_time($Qf){return
lang(1,max(0,microtime(true)-$Qf));}function
remove_from_uri($Be=""){return
substr(preg_replace("~(?<=[?&])($Be".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($D,$wb){return" ".($D==$wb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($y,$_b=false){$oc=$_FILES[$y];if(!$oc)return
null;foreach($oc
as$y=>$X)$oc[$y]=(array)$X;$J='';foreach($oc["error"]as$y=>$o){if($o)return$o;$B=$oc["name"][$y];$rg=$oc["tmp_name"][$y];$pb=file_get_contents($_b&&preg_match('~\.gz$~',$B)?"compress.zlib://$rg":$rg);if($_b){$Qf=substr($pb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Qf,$df))$pb=iconv("utf-16","utf-8",$pb);elseif($Qf=="\xEF\xBB\xBF")$pb=substr($pb,3);$J.=$pb."\n\n";}else$J.=$pb;}return$J;}function
upload_error($o){$Sd=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($o?lang(2).($Sd?" ".lang(3,$Sd):""):lang(4));}function
repeat_pattern($He,$Ed){return
str_repeat("$He{0,65535}",$Ed/65535)."$He{0,".($Ed%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($Q,$Ed=80,$Xf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$Ed).")($)?)u",$Q,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$Ed).")($)?)",$Q,$A);return
h($A[1]).$Xf.(isset($A[2])?"":"<i>‚Ä¶</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Se,$Zc=array()){$J=false;while(list($y,$X)=each($Se)){if(!in_array($y,$Zc)){if(is_array($X)){foreach($X
as$sd=>$W)$Se[$y."[$sd]"]=$W;}else{$J=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}return$J;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$kc=false){$J=table_status($R,$kc);return($J?$J:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$J=array();foreach($b->foreignKeys($R)as$_c){foreach($_c["source"]as$X)$J[$X][]=$_c;}return$J;}function
enum_input($U,$Da,$p,$Y,$Ub=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Pd);$J=($Ub!==null?"<label><input type='$U'$Da value='$Ub'".((is_array($Y)?in_array($Ub,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($Pd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Xa=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Da value='".($s+1)."'".($Xa?' checked':'').'>'.h($b->editVal($X,$p)).'</label>';}return$J;}function
input($p,$Y,$Fc){global$Eg,$b,$x;$B=h(bracket_escape($p["field"]));echo"<td class='function'>";if(is_array($Y)&&!$Fc){$ya=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$ya[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$ya);$Fc="json";}$if=($x=="mssql"&&$p["auto_increment"]);if($if&&!$_POST["save"])$Fc=null;$Gc=(isset($_GET["select"])||$if?array("orig"=>lang(8)):array())+$b->editFunctions($p);$Da=" name='fields[$B]'";if($p["type"]=="enum")echo
h($Gc[""])."<td>".$b->editInput($_GET["edit"],$p,$Da,$Y);else{$Nc=(in_array($Fc,$Gc)||isset($Gc[$Fc]));echo(count($Gc)>1?"<select name='function[$B]'>".optionlist($Gc,$Fc===null||$Nc?$Fc:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Gc))).'<td>';$kd=$b->editInput($_GET["edit"],$p,$Da,$Y);if($kd!="")echo$kd;elseif(preg_match('~bool~',$p["type"]))echo"<input type='hidden'$Da value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Da value='1'>";elseif($p["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Pd);foreach($Pd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Xa=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$B][$s]' value='".(1<<$s)."'".($Xa?' checked':'').">".h($b->editVal($X,$p)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$B'>";elseif(($hg=preg_match('~text|lob|memo~i',$p["type"]))||preg_match("~\n~",$Y)){if($hg&&$x!="sqlite")$Da.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Da.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Da>".h($Y).'</textarea>';}elseif($Fc=="json"||preg_match('~^jsonb?$~',$p["type"]))echo"<textarea$Da cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Ud=(!preg_match('~int~',$p["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$p["length"],$A)?((preg_match("~binary~",$p["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$p["unsigned"]?1:0)):($Eg[$p["type"]]?$Eg[$p["type"]]+($p["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$p["type"]))$Ud+=7;echo"<input".((!$Nc||$Fc==="")&&preg_match('~(?<!o)int(?!er)~',$p["type"])&&!preg_match('~\[\]~',$p["full_type"])?" type='number'":"")." value='".h($Y)."'".($Ud?" data-maxlength='$Ud'":"").(preg_match('~char|binary~',$p["type"])&&$Ud>20?" size='40'":"")."$Da>";}echo$b->editHint($_GET["edit"],$p,$Y);$rc=0;foreach($Gc
as$y=>$X){if($y===""||!$X)break;$rc++;}if($rc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $rc), oninput: function () { this.onchange(); }});");}}function
process_input($p){global$b,$n;$u=bracket_escape($p["field"]);$Fc=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($p["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($p["auto_increment"]&&$Y=="")return
null;if($Fc=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?idf_escape($p["field"]):false);if($Fc=="NULL")return"NULL";if($p["type"]=="set")return
array_sum((array)$Y);if($Fc=="json"){$Fc="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads")){$oc=get_file("fields-$u");if(!is_string($oc))return
false;return$n->quoteBinary($oc);}return$b->processInput($p,$Y,$Fc);}function
fields_from_edit(){global$n;$J=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$B=bracket_escape($y,1);$J[$B]=array("field"=>$B,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$n->primary),);}return$J;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$zf="<ul>\n";foreach(table_status('',true)as$R=>$S){$B=$b->tableName($S);if(isset($S["Engine"])&&$B!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$I=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$I||$I->fetch_row()){$Qe="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$B</a>";echo"$zf<li>".($I?$Qe:"<p class='error'>$Qe: ".error())."\n";$zf="";}}}echo($zf?"<p class='message'>".lang(9):"</ul>")."\n";}function
dump_headers($Wc,$ae=false){global$b;$J=$b->dumpHeaders($Wc,$ae);$ze=$_POST["output"];if($ze!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Wc).".$J".($ze!="file"&&!preg_match('~[^0-9a-z]~',$ze)?".$ze":""));session_write_close();ob_flush();flush();return$J;}function
dump_csv($K){foreach($K
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$K[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$K)."\r\n";}function
apply_sql_function($Fc,$e){return($Fc?($Fc=="unixepoch"?"DATETIME($e, '$Fc')":($Fc=="count distinct"?"COUNT(DISTINCT ":strtoupper("$Fc("))."$e)"):$e);}function
get_temp_dir(){$J=ini_get("upload_tmp_dir");if(!$J){if(function_exists('sys_get_temp_dir'))$J=sys_get_temp_dir();else{$r=@tempnam("","");if(!$r)return
false;$J=dirname($r);unlink($r);}}return$J;}function
file_open_lock($r){$Dc=@fopen($r,"r+");if(!$Dc){$Dc=@fopen($r,"w");if(!$Dc)return;chmod($r,0660);}flock($Dc,LOCK_EX);return$Dc;}function
file_write_unlock($Dc,$xb){rewind($Dc);fwrite($Dc,$xb);ftruncate($Dc,strlen($xb));flock($Dc,LOCK_UN);fclose($Dc);}function
password_file($sb){$r=get_temp_dir()."/adminer.key";$J=@file_get_contents($r);if($J||!$sb)return$J;$Dc=@fopen($r,"w");if($Dc){chmod($r,0660);$J=rand_string();fwrite($Dc,$J);fclose($Dc);}return$J;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$p,$ig){global$b;if(is_array($X)){$J="";foreach($X
as$sd=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($sd):"")."<td>".select_value($W,$_,$p,$ig);return"<table cellspacing='0'>$J</table>";}if(!$_)$_=$b->selectLink($X,$p);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$J=$b->editVal($X,$p);if($J!==null){if(!is_utf8($J))$J="\0";elseif($ig!=""&&is_shortable($p))$J=shorten_utf8($J,max(0,+$ig));else$J=h($J);}return$b->selectVal($J,$_,$p,$X);}function
is_mail($Rb){$Aa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Ib='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$He="$Aa+(\\.$Aa+)*@($Ib?\\.)+$Ib";return
is_string($Rb)&&preg_match("(^$He(,\\s*$He)*\$)i",$Rb);}function
is_url($Q){$Ib='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Ib?\\.)+$Ib(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($p){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$p["type"]);}function
count_rows($R,$Z,$pd,$Hc){global$x;$G=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($pd&&($x=="sql"||count($Hc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Hc).")$G":"SELECT COUNT(*)".($pd?" FROM (SELECT 1$G GROUP BY ".implode(", ",$Hc).") x":$G));}function
slow_query($G){global$b,$tg,$n;$m=$b->database();$lg=$b->queryTimeout();$Hf=$n->slowQuery($G,$lg);if(!$Hf&&support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$xd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$xd,'&token=',$tg,'\');
}, ',1000*$lg,');
</script>
';}else$i=null;ob_flush();flush();$J=@get_key_vals(($Hf?$Hf:$G),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$J;}function
get_token(){$Ye=rand(1,1e6);return($Ye^$_SESSION["token"]).":$Ye";}function
verify_token(){list($tg,$Ye)=explode(":",$_POST["token"]);return($Ye^$_SESSION["token"])==$tg;}function
lzw_decompress($Na){$Gb=256;$Oa=8;$db=array();$kf=0;$lf=0;for($s=0;$s<strlen($Na);$s++){$kf=($kf<<8)+ord($Na[$s]);$lf+=8;if($lf>=$Oa){$lf-=$Oa;$db[]=$kf>>$lf;$kf&=(1<<$lf)-1;$Gb++;if($Gb>>$Oa)$Oa++;}}$Fb=range("\0","\xFF");$J="";foreach($db
as$s=>$cb){$Qb=$Fb[$cb];if(!isset($Qb))$Qb=$ih.$ih[0];$J.=$Qb;if($s)$Fb[]=$ih.$Qb[0];$ih=$Qb;}return$J;}function
on_help($ib,$Ff=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $ib, $Ff) }, onmouseout: helpMouseout});","");}function
edit_form($a,$q,$K,$Mg){global$b,$x,$tg,$o;$bg=$b->tableName(table_status1($a,true));page_header(($Mg?lang(10):lang(11)),$o,array("select"=>array($a,$bg)),$bg);if($K===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$q)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($q
as$B=>$p){echo"<tr><th>".$b->fieldName($p);$Ab=$_GET["set"][bracket_escape($B)];if($Ab===null){$Ab=$p["default"];if($p["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Ab,$df))$Ab=$df[1];}$Y=($K!==null?($K[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$p["type"])?(is_array($K[$B])?array_sum($K[$B]):+$K[$B]):$K[$B]):(!$Mg&&$p["auto_increment"]?"":(isset($_GET["select"])?false:$Ab)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$p);$Fc=($_POST["save"]?(string)$_POST["function"][$B]:($Mg&&preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$p["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$Fc="now";}input($p,$Y,$Fc);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($q){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Mg?lang(15):lang(16))."' title='Ctrl+Shift+Enter'>\n",($Mg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".lang(17)."‚Ä¶', this); };"):"");}}echo($Mg?"<input type='submit' name='delete' value='".lang(18)."'>".confirm()."\n":($_POST||!$q?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$tg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0Ñ\0\n @\0¥CÑË\"\0`E„Q∏‡ˇá?¿tvM'îJd¡d\\åb0\0ƒ\"ô¿f”à§Ós5õœÁ—AùXPaJì0Ñ•ë8Ñ#RäT©ëz`à#.©«cÌX√˛»Ä?¿-\0°Im?†.´M∂Ä\0»Ø(Ãâ˝¿/(%å\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1ÃáìŸåﬁl7úáB1Ñ4vb0òÕfsëºÍn2BÃ—±Ÿòﬁn:á#(ºb.\rDc)»»a7EÑë§¬l¶√±îËi1Ãésò¥Á-4ôáf”	»Œi7Ü≥π§»t4Ö¶”yËZf4ù∞iñAT´VVêÈf:œ¶,:1¶Q›ºÒb2`«#˛>:7GÔó1—ÿ“s∞ôLóXD*bv<‹å#£e@÷:4Áß!foê∑∆t:<•‹Âíæôo‚‹\ni√≈',Èªa_§:πiÔÖ¥¡Bv¯|N˚4.5NfÅi¢vp–h∏∞l®Í°÷ö‹O¶ÅâÓ= £OFQ–ƒk\$•”iıô¿¬d2T„°p‡ 6Ñã˛á°-ÿZÄéÉ†ﬁ6Ω£Äh:¨aÃ,é£ÎÓ2ç#8–ê±#íò6n‚ÓÜÒJà¢h´tÖå±ä‰4O42ÙΩokﬁæ*r†©Ä@p@Ü!ƒæœ√Ù˛?–6¿âr[çL¡ã:2Bàjß!HbÛ√P‰=!1Vâ\"à≤0Öø\nS∆∆œD7√ÏD⁄õ√C!Ü!õ‡¶G åß »+í=tCÊ©.C§¿:+» =™™∫≤°±Â%™cÌ1MR/îE»í4Ñ©†2∞‰±†„`¬8(·”π[W‰—=âySÅb∞=÷-‹πBS+…Ø»‹˝•¯@pL4Yd„Ñqä¯„¶Í¢6£3ƒ¨Ø∏Ac‹åËŒ®åkÇ[&>ˆï®Z¡pkm]óu-c:ÿ∏àNtÊŒ¥p“ùåä8Ë=ø#ò·[.‹ﬁØç~†çÅmÀyáPP·|I÷õ˘¿ÏQ™9v[ñQïÑ\nñŸrÙ'gá+ê·T—2Ö≠V¡ız‰4ç£8˜è(	æEy*#j¨2]≠ïR“¡ë•)É¿[N≠R\$ä<>:Û≠>\$;ñ>†Ã\rªÑŒHÕ√T»\nw°N Âwÿ£¶Ï<ÔÀGw‡ˆˆπ\\YÛ_†Rt^å>é\r}åŸS\rzÈ4=µ\nLî%J„ã\",Z†8∏ûôêi˜0u©?®˚—Ù°s3#®Ÿâ†:Û¶˚ç„Ωñ»ﬁE]x›“Ås^8é£K^…˜*0—ﬁwﬁ‡»ﬁ~è„ˆ:Ì—iÿ˛èv2wΩˇ±˚^7ê„Ú7£c›—u+U%é{P‹*4ÃºÈLX./!ºâ1C≈ﬂqx!Hπ„Fd˘≠L®§®ƒ†œ`6ÎË5ÆôfÄ∏ƒÜ®=H¯l åV1ìõ\0a2◊;Å‘6Ü‡ˆ˛_Ÿáƒ\0&ÙZ‹S†d)KE'íÄnµê[X©≥\0Z…ä‘F[Pëﬁò@‡ﬂ!âÒY¬,`…\"⁄∑Å¬0Ee9yF>À‘9b∫ñåÊF5:¸àî\0}ƒ¥äá(\$û”áÎÄ37Hˆ£Ë MæA∞≤6Rï˙{Mq›7G†⁄CôCÍm2¢(åCt>[Ï-t¿/&Cõ]ÍetGÙÃ¨4@r>«¬Â<öSqï/Â˙îQÎçhmçö¿–∆Ù„ÙùL¿‹#ËÙKÀ|ÆôÑ6fKP›\r%t‘”V=\"†SH\$ù} ∏Å)w°,W\0F≥™u@ÿb¶9Ç\rr∞2√#¨DåîXÉ≥⁄yOI˘>ªÖnÅÜ«¢%„˘ê'ã›_¡Ät\rœÑzƒ\\1òhlº]Q5Mp6kÜ–ƒqh√\$£H~Õ|“›!*4åÒÚ€`SÎ˝≤S tÌPP\\g±Ë7á\n-ä:Ë¢™p¥ïîàlãBû¶Óî7”®cÉ(wO0\\:ï–wî¡ùp4àìÚ{T⁄˙jO§6H√ä∂r’•êq\n¶…%%∂y']\$ÇîaëZ”.fc’q*-ÍFW∫˙kçÑzÉ∞µjëé∞lg·å:á\$\"ﬁNº\r#…d‚√Ç¬ˇ–sc·¨Ã†ÑÉ\"j™\r¿∂ñ¶à’íºPhã1/ÇúDA)†≤›[¿kn¡p76¡Y¥âR{·M§P˚∞Ú@\n-∏a∑6˛ﬂ[ªzJH,ñdl†B£hêo≥çÏÚ¨+á#Dr^µ^µŸeöºEΩΩñ ƒúaPâÙıJG£z‡ÒtÒ†2«XŸ¢¥¡øV∂◊ﬂ‡ﬁ»≥â—B_%K=E©∏bÂºæﬂ¬ßkU(.!‹Æ8∏ú¸…I.@éKÕxn˛¨¸:√PÛ32´îmÌH		C*Ï:v‚T≈\nRπÉïµã0u¬ÌÉÊÓ“ß]ŒØòäîP/µJQd•{Lñﬁ≥:Y¡è2bºúT Òù 3”4Üó‰cÍ•V=êøÜL4Œ–rƒ!ﬂBY≥6Õ≠MeLä™‹Áúˆ˘i¿o–9< Gî§∆ï–ôMhm^ØU€N¿å∑ÚTr5HiMî/¨nÉÌù≥T†ç[-<__Ó3/Xr(<áØäÜÆ…ÙìÃu“ñGNX20Â\r\$^áç:'9Ë∂OÖÌ;◊kèºÜµf†ñN'a∂î«≠b≈,ÀV§ÙÖ´1µÔHI!%6@˙œ\$“EG⁄ú¨1ù(mU™ÂÖr’ΩÔﬂÂ`°–iN+√úÒ)öú‰0lÿ“f0√Ω[U‚¯V Ë-:I^†ò\$ÿs´b\reáëug…h™~9€ﬂàùbòµÙ¬»f‰+0¨‘ hXr›¨©!\$óe,±w+Ñ˜åÎå3ÜÃ_‚AÖkö˘\nk√rı õcuWdYˇ\\◊={.Ûƒçòê¢gªâp8út\rRZøvçJ:≤>˛£Y|+≈@¿áÉ€Cêt\rÄÅjtÅΩ6≤%¬?‡Ù«éÒí>˘/•Õ«Œ9F`◊ï‰Úv~K§ê·ˆ—R–WãzëÍlm™wL«9Yï*q¨xƒzÒËSeÆ›õ≥Ë˜£~öD‡Õ·ñ˜ùxòæÎ…üi7ï2ƒ¯—O›ªí˚_{Ò˙53‚˙têòõ_üız‘3˘d)ãCØ¬\$?K”™PÅ%œœT&˛ò&\0P◊NAé^≠~¢É†p∆ ˆœúì‘ı\r\$ﬁÔ–÷Ïb*+D6Í∂¶œàﬁÌJ\$(»olﬁÕh&îÏKBS>∏ãˆ;z∂¶x≈oz>Ìú⁄oƒZ\n ã[œvıÇÀ»úµ∞2ıOxŸêV¯0f˚Ä˙Øﬁ2Bl…bk–6ZkµhXcdÍ0*¬KT‚ØH=≠ïœÄëp0älVÈıË‚\rºå•ném¶Ô)(è ˙");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:õågCIº‹\n8ú≈3)∞À7úÖÜ81– x:\nOg#)–Ír7\n\"ÜË¥`¯|2ÃgSiñH)N¶Së‰ß\ráù\"0πƒ@‰)ü`(\$s6O!”ËúV/=ùå' T4Ê=ÑòiSòç6IO†G#“X∑VCç∆s°†Z1.–hp8,≥[¶H‰µ~Czß…Â2πlæc3öÕÈs£ëŸIÜb‚4\nÈF8T‡ÜIò›©U*fzπ‰r0ûE∆Å¿ÿyé∏ÒféY.:ÊÉIå (ÿc∑·Œã!ç_lôÌ^∑^(∂öN{Sñì)rÀq¡YìñlŸ¶3ä3⁄\nò+G•”Íy∫ÌÜÀi∂¬ÓxV3w≥uh„^rÿ¿∫¥a€î˙πçcÿË\rì®Î(.¬à∫ÅCh“<\r)Ë—£°`Ê7£ÌÚ43'm5å£»\nÅP‹:2£Pª™éãq Úˇ≈Cì}ƒ´à˙ ¡Í38ãBÿ0éhRâ»r(ú0•°b\\0åHr44å¡Bç!°p«\$érZZÀ2‹â.…É(\\é5√|\nC(Œ\"èÄPÖ¯.ç–NÃRT Œì¿Ê>ÅHNÖÅ8HP·\\¨7Jp~Ñ‹˚2%°–OC®1„.ÉßC8ŒáH»Ú*àj∞Ö·˜S(π/°Ï¨6KUú á°<2âpOIÑÙ’`ç‘‰‚≥àdOÅH†ﬁ5ç-¸∆4å„pX25-“¢Ú€à∞z7£∏\"(∞P†\\32:]U⁄ËÌ‚ﬂÖ!]∏<∑A€€§í–ﬂi⁄∞ãl\r‘\0v≤Œ#J8´œwmûÌ…§®<ä…†Ê¸%m;p#„`XùDå¯˜iZç¯N0åêï»9¯®Âç†¡Ë`ÖéwJçDøæ2“9tå¢*¯ŒyÏÀNiIh\\9∆’Ë–:ÉÄÊ·xÔ≠µyl*ö»àŒÊY†‹á¯Í8íW≥‚?µéÅﬁõ3Ÿ !\"6Âõn[¨ \r≠*\$∂∆ßænzx∆9\rÏ|*3◊£pﬁÔª∂û:(p\\;‘Àmz¢¸ß9Û–—¬å¸8NÖ¡êj2çΩ´Œ\r…HÓH&å≤(√zÑ¡7i€k£ ãä§Çc§ãeÚû˝ßtúÃÃ2:SHÛ»†√/)ñxﬁ@ÈÂtâri9•ΩıÎú8œ¿ÀÔy“∑Ω∞éVƒ+^W⁄¶≠¨kZÊYól∑ £ÅÅå4÷»∆ã™∂¿¨Ç\\E»{Ó7\0πpÜÄïDÄÑiî-TÊ˛⁄˚0l∞%=¡†–ÀÉ9(Ñ5\n\nÄn,4á\0Ëa}‹É.∞ˆRsÔÇ™\02B\\€b1üS±\0003,‘XPHJspÂdìKÉ CA!∞2*Wü‘Ò⁄2\$‰+¬f^\nÑ1åÅ¥ÚzEÉ Iv§\\‰ú2…†.*A∞ôîE(d±·∞√bÍ¬‹Ñê∆9áÇ‚Ä¡Dhê&≠™?ƒH∞sèQò2íx~n√ÅJãT2˘&„‡eRúΩôG“QéêTwÍ›ëªıPà‚„\\†)6¶Ù‚ú¬Úsh\\3®\0R	¿'\r+*;RH‡.ì!—[Õ'~≠%t< Áp‹K#¬ëÊ!ÒlﬂÃLeå≥úŸ,ƒ¿Æ&·\$	¡Ω`îñCXöâ”Ü0÷≠Âº˚≥ƒ:MÈh	Á⁄úG‰—!&3†DÅ<!Ëê23Ñ√?h§J©e ⁄h·\r°mïòNi∏£¥éíÜ NÿHl7°ÆvÇÍWIÂ.¥¡-”5÷ßeyè\rEJ\ni*º\$@⁄RU0,\$UøEÜ¶‘‘¬™u)@(tŒSJk·p!Ä~≠Ç‡d`Ã>Øï\n√;#\rp9Üj…π‹]&Nc(rÄàïTQU™ΩS∑⁄\08n`´óyïb§≈ûL‹O5ÇÓ,§Úûë>éÇÜx‚‚±f‰¥í‚ÿê+Åñ\"—IÄ{kM»[\r%∆[	§eÙa‘1! ËˇÌ≥‘Æ©F@´b)Rü£72àÓ0°\nW®ô±L≤‹ú“Ætd’+ÅÌ‹0wgl¯0n@ÚÍ…¢’iÌM´É\nAßM5nÏ\$E≥◊±N€·l©›ü◊Ï%™1 A‹˚∫˙˜›kÒrÓiFB˜œ˘ol,muNx-Õ_†÷§C( ÅêfÈl\r1p[9x(i¥B“ñ≤€zQl¸∫8C‘	¥©XU Tb£›I›`ïp+V\0Óã—;ãCbŒ¿XÒ+œíçsÔ¸]H˜“[·kãx¨G*ÙÜè]∑awn˙!≈6ÇÚ‚€–mSÌæìIﬁÕKÀ~/ù”•7ﬁ˘eeN…Úç™S´/;dÂAÜ>}l~ûœÍ ®%^¥fÁÿ¢p⁄úDEÓ√a∑Çt\nx=√k–éÑ*d∫ÍTó∫¸˚j2ü…júù\në†… ,òe=ëÜM84Ù˚‘aïj@ÓT√sè‘‰nf©›\nÓ6™\rdúº0ﬁÌÙYä'%‘ìÌﬁ~	Å“®Ü<÷ÀñAÓãñHøGÇÅ8ÒøùŒÉ\$z´{∂ª≤u2*Ü‡añ¿>ª(wåK.bPÇ{ÖÉo˝î¬¥´zµ#Î2ˆ8=…8>™§≥A,∞e∞¿Ö+ÏCËßxı*√·“-b=máôü,ãaí√lzkùÅÔ\$Wı,êmèJiÊ ß·˜Å+ãË˝0∞[Øˇ.R sK˘«‰XÁ›ZLÀÁ2ê`Ã(ÔC‡vZ°‹›¿∂Ë\$Å◊π,ÂD?H±÷NxXÙÛ)íÓéM®â\$Û,çÕ*\n—£\$<qˇ≈üh!øπSì‚É¿üxsA!ò:¥K•¡}¡≤ì˘¨£úR˛öA2k∑Xép\n<˜˛¶˝ÎlÏßŸ3Ø¯¶»ïVV¨}£g&Y›ç!Ü+Û;<∏Y«ÛüYE3r≥ŸéÒõCÌo5¶≈˘¢’≥œkk˛Ö¯∞÷€£´œt˜íU¯Ö≠)˚[˝ﬂ¡Ó}Ôÿu¥´lÁ¢:Dü¯+œè _o„‰h140÷· 0¯Øb‰Kò„¨í†ˆ˛ÈªlG™Ñ#™ö©ÍéÜ¶©Ï|UdÊ∂IK´Í¬7‡^Ï‡∏@∫ÆO\0H≈Hiä6\rá€©‹\\cg\0ˆ„Î2éBƒ*e‡ê\nÄö	Özrê!ênWz&ê {Hñ'\$X †w@“8ÎDGr*Îƒ›HÂ'p#éƒÆÄ¶‘\nd¸Ä˜,Ù•ó,¸;g~Ø\0–#ÄÃé≤Eè¬\r÷I`úÓ'É%E“.†]` –õÖÓ%&–Óm∞˝\r‚ﬁ%4SÑv#\n†ûfH\$%Î-¬#≠∆—qB‚ÌÊ†¿¬Q-Ùc2äßÇ&¬¿Ã]‡ô Ëqh\rÒl]‡Æs†–—h‰7±n#±ÇÇ⁄-‡jEØFrÁ§l&d¿ÿŸÂzÏF6∏êà¡\"†ûì|øß¢s@ﬂ±ÆÂz)0rp⁄è\0ÇX\0§ŸË|DL<!∞ÙoÑ*áD∂{.B<E™ãã0nB(Ô é|\r\nÏ^©ç‡ç h≥!Ç÷Ír\$ßí(^™~èËﬁ¬/pèq≤ÃB®≈Oöà˙,\\µ®#RRŒè%Î‰Õd–Hjƒ`¬†ÙÆÃ≠ VÂ bSídßiéEÇ¯Ôoh¥r<i/k\$-ü\$oîº+∆≈ãŒ˙l“ﬁO≥&ev∆íºi“jMPA'u'éŒí( M(h/+´ÚWDæSo∑.n∑.n∏ÏÍ(ú(\"≠¿ßhˆ&pÜ®/À/1DÃäÁjÂ®∏EËﬁ&‚¶Äè,'l\$/.,ƒd®ÖÇWÄbbO3ÛB≥sH†:J`!ì.Ä™Çá¿˚•†è,F¿—7(á»‘ø≥˚1älÂs ÷“éë≤ó≈¢q¢X\r¿öÆÉ~RÈ∞±`Æ“ûÛÆY*‰:R®˘rJ¥∑%Lœ+n∏\"à¯\r¶ŒÕáH!qbæ2‚Li±%”ﬁŒ®Wj#9”‘ObE.I:Ö6¡7\0À6+§%∞.»Öﬁ≥a7E8VSÂ?(DG®”≥BÎ%;Ú¨˘‘/<í¥˙•¿\r Ï¥>˚QVñt/8Æc8Â\$\0»å©RVÊI8‡RWèˇ¥\nˇ‰v∂•yCÏÃ-¢5FÛåÊiQ0ÀË_‘IEîsIR!•äXkËÄz@∂è`ª•∑DÇ`DV!CÊ8é•\r≠¥übì3©!3‚@Ÿ33N}‚ZBÛ3F.H}‰30⁄‹M(Í>Ç }‰\\—tÍÇf†fåÀ‚I\rÆÄÛ337 X‘\"tdŒ,\nbtNO`P‚;≠‹ï“≠¿‘Ø\$\nÇûﬂ‰Z—≠5U5WUµ^ho˝‡ÊtŸPM/5K4Ej≥KQ&53GXìXx)“<5Dî^çÌ˚VÙ\nﬂr¢5b‹Ä\\J\">ßË1S\r[-¶ Du¿\r“‚ß√)00ÛYı»À¢∑k{\nµƒ#µﬁ\r≥^∑ã|Ëu‹ªUÂ_nÔU4…Uä~Yt”\rIö√@‰è≥ôR Û3:“uePMSË0TµwWØX»ÚÚD®Ú§KF5‹‡ïá;Uı\n†OYçÈYÕQ,M[\0˜_™DöÕ»W†æJ*Ï\rg(]‡®\r\"ZCâ©6uÍè+µYÛàY6√¥ê0™qı(ŸÛ8}êÛ3AX3T†h9j∂j‡fcMtÂPJbqMP5>è»¯∂©Yák%&\\Ç1d¢ÿE4¿ µYnê Ì\$<•U]”â1âmb÷∂ê^“ıö†Í\"NVÈﬂp∂Îpı±eM⁄ﬁ◊WÈ‹¢Ó\\‰)\n À\nf7\n◊2¥cr8ãó=K7tVöáµû7P¶∂L…Ìa6ÚÚv@'Ç6i‡Ôj&>±‚;≠„`“ˇa	\0p⁄®(µJëÎ)´\\ø™n˚Úƒ¨m\0º®2ÄÙeqJˆ≠PçÙhåÎ±fj¸¬\"[\0®∑Ü¢X,<\\åÓ∂◊‚˜Ê∑+mdÜÂ~‚‡öÖ—s%o∞¥mn◊),◊ÑÊ‘á≤\r4∂¬8\r±Œ∏◊mEÇH]Ç¶ò¸÷HW≠M0DÔﬂÄóÂ~èÀÅòKòÓE}¯∏¥‡|fÿ^ì‹◊\r>‘-z]2sÇxDòd[sátåS¢∂\0Qf-K`≠¢Çt‡ÿÑwT´9ÄÊZÄ‡	¯\nB£9 Nbñ„<⁄B˛I5o◊oJÒp¿œJdÂÀ\rçhﬁç√ê2ê\"‡yG°èCèÇsè”ïêVîπ“%zr+z±˘˛\\í˜ïúÙm ﬁ±T ˆÚ†˜@Y2lQ<2O+•%ìÕ.”Éh˘,AﬁÒ∏ä√Zãè2R¶¿1£ä/ØhH\r®XÖ»aNB&ß ƒM@÷[xåá Æ•Íñ‚8&L⁄VÕúv‡±*öj§€öHÂ»\\Ÿ™	ôÆ≤&s€\0Qö`\\\"Ëb†∞	‡ƒ\rBsõâwùB	ùô›ûN`ö7ßCo(Ÿø‡®\n√®ùìh1ô˘»*Eó‡ÒSÖ”Uê0U∫tö#|ä4É'{ôêÒ°⁄ #…5	 Â	pÑ‡yB‡@RÙ∑ôpﬁ@|Ñ∫7\rÂ\0Ä_B˙^z<B˙@W4&K˙s¢˙xO◊∑‡P‡@X‚]‘Öçß˙w>‚Ze{®ÂLYâ°L⁄ê¢\\í(*R`†	‡¶\nÖä‡é∫ƒQC£(*éπµc¢;úl⁄pÜX|`N®Çæ\$Ä[Üâí@ÕU¢‡¶∂‡Z•`Zd\"\\\"ÖÇ¢£)´Ià:‡tö‰oDÊ\0[≤(‡±Ç-©ì†'Ì≥	ô≠™`hu%¢¬,Äî®„Iµ7ƒ´±»Û¥ÇmßVﬁ}Æ∫N÷Õ≥\$ªE¥’Yf&1˘ä¿õ]]pzùUêx\r–}Ö∑;wßUX˚\\´Òa^ ÀU¬0SZODöRKî∂&áZ\\Oq}∆æwáÃ∫g¶¥I•ËVÖ∫∫	5™k∏˚Á?–={∫ã™ÖÅ©*„©kò@[u°h‹v¥mà€a;]ó€‡&‡È\"ì≠/\$\0C°ŸÇdSg∏kÇ†{ù\0î\n`û	¿√¸C ¢π‹aÁr\r¬ª2G◊å‰ËO{ß≈[≠≈ ˚CÉ FKZ÷jò©¬íFYêB‰pFkñõ0<€‡ D<JEôZb^µ.ì2ñ¸8ÈU@*Œ5fk™ÃFDÏ»…4ãïDU76…4QÔ@∑ÇK+Ñ√ˆJÆ∫√¬Ì@”=å‹WIF\$≥85MöçN∫\$RÙ\0¯5®\r‡˘_™úÏEúÒœI´œ≥NÁl£“Ây\\Ùèà«qUÄ–Q˚†™\n@í®Ä€≈cpö¨®P€±+7‘ΩN\r˝R{*çqm›F	M}I8†`W\0¡8ÇµT\r‰*NpTˆb®d<∫À§‘8ÓF≤Ä_œ+‹ªTÓÆeN#]òd;Û,öäÄ~¿U|0VReıà≈˝à÷éY|,d Y√<Õ≤]ÑÉ˚·∑ó…î=Á±¸m≈õÆ,\rùj\r5‡±p du ËÈà‘fp»+æJ¸ñí∫X^†Ê\n‚®ﬁ)ﬂ>-ìhÄÇº•Ω<ï6Ëﬂbºdmh◊‚@qÌç’Ah÷),J≠◊Wñ«cm˜em]é‘\\˜)1Zb0ﬂÂ˛ûÅYÒ]ymäËáfÿe∏¬;πœÍO…¿WüapDW˚å…‹”zE§å”\"ˆ\$Í«=k›ÎÂ!8˙ÊÄÇg@¢-Q¶ê/e&ﬂ∆á¨v_Äxn\rƒe3{U’4ˆ‹–n{‹:Bßà‚’sm∂≠Y d¸ﬁÚ7}3?*Çt˙ÚÈœlT⁄}ò~ÄÑèÄ‰=cû˝¨÷ﬁ«πÄ{ÌÉ8SµA\$¿}„Q\"†ü‚;TWË98ÁÇ”{IDqÕ˙÷¬˜Æ«òÇOÏ[î&ú]ÔÿÅ§ÃsëòÄ∏-ßò\r6ß£qqö hÄe5Ö\0“¢¿±˙*‡b¯IS€ÍƒÜŒÆ9y˝p”-¯˝`{˝±…ñkPò0T<Ñ©Z9‚0<’ôÕ©Ä;[Éàgπç\nK‘\nï\0¡∞*Ω\nb7(¿_∏@,ÓE2\r¿]îKÖ*\0…ˇp C\\—¢,0¨^ÏM–ßö∫©ì@ä;X\rï?\$\rájí*ˆOµ¨BˆÊP†ø1πhLK°¶”ë3ó/ú¥a@|Ä¶≤wº(pƒ‘0€˛Äªuo	T/bºì†B»·dkúL8ËáDb DˆÎ`∫…’™*3ÿÖNÍ‚æ√M	wÎk«z‚∑ø§∂Ã´q¨!‹n˜Ë‰Ë~È÷œÃ ¥‡¬EÕ¶ö}QÕm\0êÉ4@;•‘&°@Ë\"Bêª–	P¿ m5pø™ê≠)∆Ñ˜@2¿Më;¨\rä‡bà§05	†Œ\0[≤N9îhYÖ‡ªàﬁt1eØAåo`∆Xùé°g»Ub5∆Xı6Üº–“hUpÄì0&*ÅäE§:⁄qt%>≤√‘Ya°÷≤Ø∞hb¨b ú·÷L¿˙8UærC£º[V·£I¨9D–¥{ê–ﬁÍ]»!—a¬úàë=T˙¥&B5∫Ø\0~yêæUË+≤÷\"™íhÃH√Tb\".\r≠Ã†<)ëo°úF∞mñ§jb!⁄áDE¢%˛ IÒ⁄¢¯DAm2kiÑ!ÅÑ´\"¬å©µNæwêTÎ«Äﬁuñø*hÚ1UdV¨‹D#)¿Æ¡æ`ãx\\CM=r)» æØ80é•·cSD®‹ﬁïWàî±)\\-Äb!¢7≈˘ÂœG_ä⁄Z√Ë2y»Öq”)Æ}(\$µ»√ãt\0ë'Ü»¥pZ,aÅÀò†8 Eº∑—óãî„4é#ˆæÓé~RœêﬁÈt∂›=¨ap~≈Ä<wUñ¿Q+∑¡lú¶R∆‹{—úVÄ	’∏o%’Ùa.Y‡c}\n’3'Z|`é¿6“4HUepøH1¿˝«d°Ç\\\\øàÏ¸do\\éiçÀa≥Âﬁ5ë‘¨uàö8ÌAÇ;≠è’ÄP—\"«ñ.Áéº~4ú≈¸Åí>—Èé€û«⁄%óÇ∏πVG'z™ùA!%\\=AGMÉp}C‹¬?/Xˆœ˛JàìäTR(∆πâî±ê`©å#Z6∆t∂iuaÇ˝uîæt¸œ“pò˛âòîˆ®O1∏˜#pTa#ª<.®+∞´ Ò\\I{√‡`M\nk% ‹IP|G íPA§ò;W™ª≈†Ò5B9%.@I#ìP‰:E‡ß‰ø\$È+E¨«–,:œ|U†âµk∂ì†e0ÚêÌ2L©9)ñ`T+\$Äl°Á≤U\"+ÿ›\0Å\$\n†_Ë—íü(‡â4DRÇî≥'•1\"h6ü%<*/•\\…\"ÿ…=yÄ£F}l™‹’#70∏E¶m†ö˛ÈA(∆TŒG]@…—Æ.IK‚Wí≠¿—•xD∏.∆V.§D\\‹˜*{Å∞AAe‘åf±Ú≠3ÍœUÿú@Uw.å5ÄZƒÜSî*<BAè#”\0O.Ñïå·]…¡∑ôNpiæ˝U)¡s(•Ïí∞Î¢q cΩxÙi\0≈§EéH–FíòF-1åî n.˘çÊ\"ùVI·<≈”•'ôé‹›∞ÑëÏë'ö(,~ÿé¢>ñëió1¡+{c§ÀÊZêHLª∫ d1É√©M∑[-\"ÓÄâ¯ß¿PÇßçLj£Ìö@&îÀ¥\\x3*_ËØ&TË\0=Ã©nQ⁄ô¨R\0{4Ÿß∑R¡w“/5µæ=Cö.ıì≠>m!kzÃÀYÕ‘ÂƒwdÕÕm5âïL…éSsc´*≈ÇÍ8=:“Ñ‘âºNí∆V'rQ'¡E£}÷Œ±Ì.Pô(eÿh%©LùnB˚Pƒ«G-ìπÊ·U:äIæocÄ)ÈjäÁZ⁄«è(ß@>&}Û`yzSœ>neòM\\ìí~ﬁ»+6iò≠ÊtÎìú,ÁÎüŒ*h\$’á\\N⁄ã9s2nn+sô¨è&⁄\$1ÎÄúrB‰¢Û'!ÿÑƒit√XÖ¿£FPI@P˙•4äæh”2#∞'áThß\$'3(\0P@");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$Dc=file_open_lock(get_temp_dir()."/adminer.version");if($Dc)file_write_unlock($Dc,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$n,$Jb,$Ob,$Wb,$o,$Gc,$Kc,$aa,$jd,$x,$ba,$Ad,$ne,$Ie,$Uf,$Oc,$tg,$xg,$Eg,$Lg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$E=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$E[]=true;call_user_func_array('session_set_cookie_params',$E);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$qc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);$Ad=array('en'=>'English','ar'=>'ÿßŸÑÿπÿ±ÿ®Ÿäÿ©','bg'=>'–ë—ä–ª–≥–∞—Ä—Å–∫–∏','bn'=>'‡¶¨‡¶æ‡¶Ç‡¶≤‡¶æ','bs'=>'Bosanski','ca'=>'Catal√†','cs'=>'ƒåe≈°tina','da'=>'Dansk','de'=>'Deutsch','el'=>'ŒïŒªŒªŒ∑ŒΩŒπŒ∫Œ¨','es'=>'Espa√±ol','et'=>'Eesti','fa'=>'ŸÅÿßÿ±ÿ≥€å','fi'=>'Suomi','fr'=>'Fran√ßais','gl'=>'Galego','he'=>'◊¢◊ë◊®◊ô◊™','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'Êó•Êú¨Ë™û','ka'=>'·É•·Éê·É†·Éó·É£·Éö·Éò','ko'=>'ÌïúÍµ≠Ïñ¥','lt'=>'Lietuvi≈≥','ms'=>'Bahasa Melayu','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'Portugu√™s','pt-br'=>'Portugu√™s (Brazil)','ro'=>'Limba Rom√¢nƒÉ','ru'=>'–†—É—Å—Å–∫–∏–π','sk'=>'Slovenƒçina','sl'=>'Slovenski','sr'=>'–°—Ä–ø—Å–∫–∏','sv'=>'Svenska','ta'=>'‡Æ§‚Äå‡ÆÆ‡Æø‡Æ¥‡Øç','th'=>'‡∏†‡∏≤‡∏©‡∏≤‡πÑ‡∏ó‡∏¢','tr'=>'T√ºrk√ße','uk'=>'–£–∫—Ä–∞—ó–Ω—Å—å–∫–∞','vi'=>'Ti·∫øng Vi·ªát','zh'=>'ÁÆÄ‰Ωì‰∏≠Êñá','zh-tw'=>'ÁπÅÈ´î‰∏≠Êñá',);function
get_lang(){global$ba;return$ba;}function
lang($u,$je=null){if(is_string($u)){$Le=array_search($u,get_translations("en"));if($Le!==false)$u=$Le;}global$ba,$xg;$wg=($xg[$u]?$xg[$u]:$u);if(is_array($wg)){$Le=($je==1?0:($ba=='cs'||$ba=='sk'?($je&&$je<5?1:2):($ba=='fr'?(!$je?0:1):($ba=='pl'?($je%10>1&&$je%10<5&&$je/10%10!=1?1:2):($ba=='sl'?($je%100==1?0:($je%100==2?1:($je%100==3||$je%100==4?2:3))):($ba=='lt'?($je%10==1&&$je%100!=11?0:($je%10>1&&$je/10%10!=1?1:2)):($ba=='bs'||$ba=='ru'||$ba=='sr'||$ba=='uk'?($je%10==1&&$je%100!=11?0:($je%10>1&&$je%10<5&&$je/10%10!=1?1:2)):1)))))));$wg=$wg[$Le];}$ya=func_get_args();array_shift($ya);$Bc=str_replace("%d","%s",$wg);if($Bc!=$wg)$ya[0]=format_number($je);return
vsprintf($Bc,$ya);}function
switch_lang(){global$ba,$Ad;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$Ad,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($Ad[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($Ad[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$qa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$Pd,PREG_SET_ORDER);foreach($Pd
as$A)$qa[$A[1]]=(isset($A[3])?$A[3]:1);arsort($qa);foreach($qa
as$y=>$Ve){if(isset($Ad[$y])){$ba=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($qa[$y])&&isset($Ad[$y])){$ba=$y;break;}}}$xg=$_SESSION["translations"];if($_SESSION["translations_version"]!=626971152){$xg=array();$_SESSION["translations_version"]=626971152;}function
get_translations($_d){switch($_d){case"en":$g="A9Dìy‘@s:¿G‡°(∏ffÉÇä¶„	àŸ:ƒSÅ∞ﬁa2\"1¶..L'ÉI¥Ímë#«s,ÜKÉöOP#IÃ@%9ê•i4»o2œç∆Û†ÄÀ,9ù%¿P¿b2ç£a∏‡r\n2õNC»(ﬁr4ôÕ1C`(ù:EbÁ9A»i:â&„ôîÂy∑àFÛΩ–YÇà\r¥\nñ 8Z‘S=\$AçúÜ§`—=À‹å≤Çû0 \n“„dFÈ	åﬁn:ZŒ∞)≠„Q¶’»mw€¯Ä›OºÍmfpQÀŒÇâÜqúÍa ƒØ±#qÆñw7SéX3î†âúäòo¢\n>ZóMÑzi√ƒs;ŸÃíÇÑ_≈:¯ı#|@Ë46É√:æ\r-z|†(j*ú®å0¶:-hÊÈ/Ã∏Ú8)+r^1/–õæŒ∑,∫Z”àKX¬9,¢p :>#ê÷„(ﬁ6≈qCäû¥I˙|≥©»¢,Å(y ∏,	%b{ÅK≤≥¬Éí)BÉﬂåéPﬁµ\r“™¸6πí2öèKãp ;Ñ¬¬Ü\$#ÚŒÅ!,€7√#Ã2•ÅA bÑÅú¯µ,N1ç\0Sò<é‘=éRZ€#b◊–(Ω%&Ö≥LÃ⁄‘£‘2“‚Ë∏–ë£a	är4≥9)‘»¬ì1OAH»<ƒN)ÀY\$…Û’W ˙ÿ%∏\$	–ö&áBò¶cÕ¨<ã¥»⁄åíÕ[K)¨⁄‚\rêÉƒƒÔ‡Ã3\rã[G@éLhÂ-Ë*Ú*\rË‘¿7(⁄¯:åcí9å√®ÿLçÿXÀ≈	œYª+Z~êç≠ì;^_’!Ç‡¯J˘Ö¬Î°àM.Õaäç√´:√/c∞√v§\"¶)Ã∏ﬁ5»¡pAVµåº\0í,ÈÜNµ…2›ÏÉ‡ÁÇ`…@®≈∫©Õ?.@ åôb˝Öµ– …\náâ–Äå¡ËD4T„ÄÊ·xÔπÖ…ºÓ¨„8_#Í:)Iç¡xDoÃ„Ü„|“`p+≤ßéJ2ahÌÒ‰Xv î%Jå*˜iÚƒ»Úyˆ ≈mVÿ:m€ÜÂ∫n◊v9o[‰ã#!Ä	+/UúG£˛7§,ƒ¡ûM/lø0Ÿü«ièSŸ‚ø*l9¥Oò©†C\r%ÍÈ6Ì√ñÆ9Fâ¬33£ñôèi˘-‚_+ˇ° Cò¬ç\0crià4≥3`]∏sq≈∏˝§#¸–œIÎ/‰‘\0êZÅHÇÄ\nI\$L»ì\"PÕyø|g5ù\$e §A©§•¬bL…©(f,Ã4öÿl (l0œÇFœse/Òîá\\dπÚ\n\$4®GäZ[b∑3ƒ1ÜÚª…Q,%ƒ¡ñÜ‘8¸èÏ70êPíúp»Oä{&∞Ê\nüc∆Z‡óH¿àB]…	ÁWMˇöMôQ\$äy≠µ◊dˇ»c#«éBì„‹eZí˘VÂ¶\nÑ¶!‡g¡Hö∞∑(KäB~Q‡Äüxòê[	%9¡…√Û»‰ï!±1§†ƒh∫vH·\$äMÜv~Ba\$AFLëÑ`©a∫,O\\ºH¥fÆóâ~áFtò≤|±O!«Ep‰ΩM≈k7√*π#ãärô∏êfÙZW&Ïø◊º¨T›V”Å˜ÜisUÎÕ,+‹O≈◊?ﬁCB∞…(™“Ÿ\$l»68Z^@iÀÙº ípK§S€bAT*`ZÈÆ.Á4î+ö'å‡%∞ ÄR„	A\$Èb3N	Ω‚&éL¡}\\0∏£ÚSFhÿ\nlaÕÅ√Ü• lñ•∞rÚOµLeÆà<™êød® ¢ÜÕ§Ã:1óaKDÇß•c£Täà\n\n·†7ìÇB*l0FÄ“ıY8îë5AèÙö!ëzßáA(≠Zb]E.o|—U\no^§A~_•=R2Ë(¬ZºVd¥k8ÏÒ!¥\0∏";break;case"ar":$g="ŸC∂PÇ¬ç≤Ül*Ñ\rî,&\nŸA∂ÌÑ¯(J.ôÑ0Se\\∂\rÖåbŸ@∂0¥,\nQ,l)≈¿¶¬µ∞¨ÜAÚÈj_1ÅC–MÖ´eÄ¢Sô\ng@üOgÎ®ÙíXŸDMÎ)ò∞0åÜcA®ÿn8«e*y#au4ù° ¥Ir*;rS¡UµdJ	}âŒ—*z™Uè@¶äX;ai1l(nÛ’Ú˝ç√[”yôdﬁu'c(Ä‹oFì±§ÿe3ôNb¶†Íp2NöS°†”≥:LZ˙z∂Pÿ\\bÊºuƒ.ï[∂Q`u	!ä≠Jyµà&2è∂(gTÕ‘S—öM∆xÏ5g5∏KÆK¶¬¶‡ÿ˜·ó0 Ä(™7\rm8Ó7(‰9\r„íf\"7N¬9¥£ ﬁŸ4√xËç∂„ÑéxÊ;¡#\"û∏øÖä¥•2…∞W\"J\nÓ¶¨BéÍ'hk¿≈´b¶Di‚\\@™Í p¨ïÍyf†≠í9éê ⁄V®?ëTXW°â°F√«{‚π3)\"™W9œ|¡®eRhU±¨“™˚1∆¡Pà>®ÍÑ\"o{Ï\"7Ó^•∂pL\n7OM*òO‘ <7cpÊ4çÙRflêNÅ∞SJ≤ÇõD≈ãÔ#≈Ù≥áJr™ û>≥J≠”Hsﬁú:Óö„ï √∞√UlK¶â÷,n»RÑ*h˝°™¨õ∫»í,2 ÖBÄèÃ√Àd4‡PHÖ· gjÜ)•îõkR<ÒëJ∫\"ùê…£\r/h˘Pö&“”®Rÿë3¬˚≈óK!T’ˆRNèïÛ∞∆'»çœYI´≤ÉÀx:≤[Iœl~»!U9H>™}·=ÎçÃúﬂÎn2Å)vF<Í1Í‰Qa@ê	¢ht)ä`P‘5„h⁄ãct0ãµ˙⁄[_”z?rb\0P‰:\rÄS<–#ìJ7å√0ÿıπ4V»JïıT≠U∑ÙXì»@P®7µh¬7!\0ÎE£∆Ÿc0Í6`ﬁ3ΩCòX⁄[H¬3å/PA¡∂@⁄ı≠ÿP9Ö*zNÜñA\0Ü)äB2™#È*àÍ°uLÜƒ“aå*ÙíÑøãdLT¶Z	+ÎÍ3éVöÊ@Ív2í∆Ø´g;±4Pf3O√≠ıÑ…√ç–6ˆ1—¥X…‡¬–È√0z\r†Ë8a–^éˇ(\\0˘z§å·x 7ï\0:QüÄD~M”‘3áÅx¬ò±ò %Ç‰ùÜ¿å*‚Öíñ¿]zX/J}V;u^ÆêÑ&a5õ∞‰jPÚ K!Cá\0“”ë’z·°ÏΩ∑∫˜ﬂ„|°›Ûæóö˙√ìÌ}ÔπD>ı£Ax\")Ä¯\$Ü–‡k√kÔèıˇß¿AMËoY÷'Ü÷iCJ@ÕôÊÜ‡ËSœŸ>:‚ íìˆ◊Lh∏E–†±íL¬†h4°Ñ1øEπÆnÅà“áÒîIYÑ3A‰0€õÉrnçŸº HÚoM§r#aÜ\$Ç\0«\n\"Pi!∞9£‘léKÒn*§ïÖ\"uåøœ‚7k@‘ÜÄ‡Á—i˚0d5÷J'2êe1d†(!®◊õ_Ÿ¥5®÷„`VBhÊÃﬂ°T/&€∞wô=°éóÙWN^QêEÑ´…¥ªé(,7Æ–Îophﬁ≈Ä‹L h}«É|√DO\r!ùÓÇ˘\$M(c/™óv(øHsΩ+b BBDËBØ ≈¢îs‰r‘ä∫s“å≠#5^I„4OÑÃ\$ë†Úg¡\0d\r+ ”°t ¢ôæ6m88áSdÖ√2\rØ&=I⁄ÅvBFf°”b£»laVD6l\0û¬°\"3U◊,CF‘äùYEÌH∆\"àA	±8S®í§íÈg+yœ´+\$l\"™[%—R'^ZD‚P∑—]o-≥a“Ö\0êÌ(†H€∑g–∏bü`Ä)Öò4∆µÎÑ`®,E0pq\r∏:qNà⁄4à)ç©“l,	˙ØXlXª5:~é¥(6≠aZ€JåöÚ&Î˙⁄H¿ãhç≥M6≤XPÚÇÎ‹p§Ã!á@‰]A\r!å5®Dı√¥õ¶”\n'≈ “õLY&a…◊åÖÁ˚Ç\n°P#–püﬁÖ*=v∏ù)ıÌnóÎÖ áº[◊≤:≥9#sE±z◊¨PLA6Ô^75ÎiÊ%I!ä#•Ãñ≤õ\$Wt≤Ö∏ GU**–DB“ÊçëM\\œ‰ª	Åæ√Ü‘ÑPh\n∆o°˝ìBäJg\n[.j≈ÃßGÀÌ»\\xq8ﬂ¢Á	!Á¶æ:ÃÑòß≈vXXó(¢óQëkÇ⁄F\"Æ◊Ö^`\n∫&ò'5DØîM∞ƒ∂…Äê ";break;case"bg":$g="–P¥\rõE—@4∞!Awh†Z(&Ç‘~\nãÜfaÃ–N≈`—Ç˛DàÖ4–’¸\"–]4\r;Ae2î≠a∞µÄÅ¢Ñú.a¬Ë˙rp∫í@◊ìà|.W.X4ÚÂ´FPµîÃ‚ìÿ\$™hR‡s…‹ }@®–ópŸ–îÊB¢4îsE≤Œ¢7fä&Eä,†”iïX\nFC1†‘l7cÚÿMEo)_G◊“ËŒ_<áG”≠}ÜÕú,kÎÜäqPXî}F≥+9è§¨7iÜ£ZË¥öiÌQ°≥_a∑ñóZäÀ*®n^π…’S¶‹9æˇ£YüV⁄®~≥]–X\\RÛâ6±ı‘}±j‚}	¨lÍ4çv±¯=àËÜ3	¥\0˘@D|‹¬§â≥ê[Äèí™í^]#s.’3d\0*ç√X‹7é„p@2éCêﬁ9(Ç ¬:#¬9å°\0»7å£òAéàËÍ8\\z8FcòÔåãäå‰óm X˙¬…4ô;¶År‘'HSÜòπ2À6A>È¬¶î6Àˇ5	Í‹∏ÆkJæÆ&Í™jΩ\"K∫¸™∞Ÿﬂ9â{.‰Œ- ^‰:â*U?ä+*>S¡3z>J&SKÍü&©õﬁhRâªí÷&≥:ä„…í>I¨Jñ™êL„HÉHÁçë™‹Eq8›ZV—’s[å£¿Ë2ç√ò“7ÿ´ä˘Œ≠jè∂/ÀhäC®˘?C’¥KT÷Qç	°k¶hL¶X7&â\nØê=®’pÉK*¬iºY-ä˙±UÀD02!≠R“âÅ!-˘E_Í⁄>˝#òHÖ° gÜÜ®˘Dæ	\"±x¥\$“©Séä£Ë:⁄∫wç£è–8∞JÛ nÅ∏6˙ºò≤–ñ@\"Ö£h¬4çà˘<â‚KükB9¢i3Yl¢®/©ƒ'Å%îäñï—J™Ø(2Ï•+n©¡vÅŸé%˙“\\À4¸íÈö„^b Ì»hR8th(ƒÊÊÄî P∂Æ≥€Ë∫¥≈Á\0Ÿ›9ììöJösæ≤cÓıD6Éïò'”ÃºüÕÚ≤ebé⁄ÔiJùŒ‰§˚çƒ!¯∫TÜ©n”=™8	ìj…KÏØ>hßnÎ!¨F„…˝≈†Àã˜ ﬁŒ8A®4ÀF≠Î÷ˇN¶ißZØuÎœeCv≥:‰˜0'xÌ˜ÂßÉxx+æìxÈ'SÂyã¥É˜SÍ±*º∏˛.üLâ˙\\ Iòâ!§≈&à‚hàj◊|¶í%•€;Z:\n∞ËπÑ:n”⁄MÂAÔöÉ¥ßãä5hXÔAF®^à;≥\$Ê`¢@–Q\n: ‰:¨`‹¡\0AÅ¥4Ü‰Pì√»X¡ë\0xA\0hAî3–D†tÃ^‚¿.0Ó¢Ä\\ä√8/XÄΩ´∞Ë±√p/@˙2¢¯z¡‡/ ˘eÙ Ÿlk	`ﬁêÒ`›a^ÉOõæÚß÷¬Ñ\nùÃìrx•ó[ˇMÓÙë'8ÙNP[˘6dÚDxì‚lOä1N*≈x≥·‰>EëÇ1FïÇ∞÷,hçE∏:™Uƒqéo-hL´f?D¯GñS‰tŸ{≈P∆m<ô≥JB‰‚÷]Ñ≈J—£…‡b≈\$à-ìÜjéÈ\ròpT€ï3UöAÈPπÜ«÷@ Ï6\0ƒçCÇ(Üa»6ÜU¯C2√H¯1Ü4r√0uû°∞7Üx{<ÉHt\r\0Çâ#Ug?A\0câq7Fp¬ôÃ8g=0ôi–ô]S04H\\Ø9t¡2ÿ¯¥s™îÔ-√¢@P§®=˛®îŒi\0(-¿§º…s@yZ;]A\rdCÈﬂË†o¿9êÏœ(gü’M!#•dé√z=£Ù0;œÁÌ&T∂j)|„-∏¯ìPQ1vÁËî¶xZB5´Ò 9§J(}∞∏8TÜëR8r_Å‹4ê«D·‡gäŸÿ ∆a®eIF—ß©OÊ)„íBÊµØi ñZ”˜@E]Õê‘ñ]DzO0iƒ’¥x([i	ıÿAW,÷Aï6¶¨¶'ƒ•WyΩ+ñ§©Còπ*û	÷5\nz\\@Ù“Öè±{[.(ÛT2“Ójª(*ÂΩ2¢˚ tÅuŒ≠∆◊S^CI\nÏzñ›ÔµVƒx/l–xidÅûR|ûÌ•HNo[ò8\$a —æiß¢q %R“|(•yRﬂGtàIhƒ÷õ%ó_l \naD&rËZ…°∆‡Ä#JtÅ'Ÿ%Â-)MWt⁄N˙_rÆt¡9˚º4´Ô_ˆHßk}€[Ö« ¥\$ÕëaZ^QP}3d«ìêÕ™∑¥Pmsßv«âåè~´Ìz‰,üKÚ4ËK7IÉ=òöÛÃQπ9ã‰V…óf\nö,Ω≠∂∞Ü‰C`+/ßLòØæΩ.—^(E:Ì&õ£0ç=°kJ©§a‘ŸâÕ<ﬁ4≥ÉHƒË®T¿¥@9¶ôYK4(ç@„E˚îRÜ4PÏWõq{úWÊ≠l¬«;∂k=çu¶ªèŸÌªI—ziÉà2˙,ñKÆyÁM-qπû©ù≤|≠êøë†|L!Ó∆j<ãÜÿ¢k°¸é˜}¨»'˙â–\"◊GÌg‡Eûp¡^á\r∆8 È~¥≤TóÂ≈∂d§r≠∂\rqÕ\$¯=˛ Ö\nàªã9∑„T˚ÕõhåzÙ&∞T‡ ih≥t5˛<„we¢÷ƒ|MÛìOı≥*B•\"25Ù“µó6bLQ∂ú	ç¬Øs∑—ãh]‹:–JèE‚ã@Ÿ/6TÈ∂Æ˚⁄Âq∆2Ûé";break;case"bn":$g="‡S)\nt]\0_à 	XD)L®Ñ@–4l5Äè¡BQpÃÃ 9Ç†\n∏˙\0áÄ,°»h™SE¿0Ëbôa%á. —H∂\0¨á.b”≈2nááD“e*íD¶ùM®ä…,OJ√ê∞Ñvßò©î—Ö\$:IKì g5U4°Lú	Nd!u>œ&∂À‘ˆÂÑ“a\\≠@'Jx¨…S§—Ì4–P≤Dß±©ÍÍzÍ¶.S…ıE<˘OS´ÈÈkb OÃafÍhbù\0ßBÔ¯r¶™)óˆ™Â≤Qå¡W≤ÎEã{Kß‘PP~Õ9\\ßÎl*ã_W	„ﬁ7Ù‚…ºÍ 4N∆Q∏ﬁ 8ç'cI∞ g2úƒO9‘‡d0ù<áCAß‰:#‹∫∏%3ñ©5ä!nÄnJµmkî≈¸©,qü¡Ó´@·≠ãú(n+L›9àx£°ŒkäI¡–2¡L\0I°Œ#V‹¶Ï#`Åê¨Ê¨ûáÅBõƒ4ç√:û– ™,Xë∂Ì2¿ßßŒ,(_)Ï„7*¨\n£p÷Û„p@2éCêﬁ9.¢#Û\0å#õ»2\rÔã 7éâÏ8MÛË·:écºﬁ2@êLä⁄ ‹S6 \\4ŸG Ç\0€/n:&⁄.HtΩ∑ƒº/≠î0ò∏2Ó¥î…TgPEtÃ•L’,L5H¡ß≠ƒLå∂G´„jﬂ%±å“R±tπ∫»¡-I‘04=XK∂\$Gf∑Jz∫∑R\$ùa`(Ñ™ûÁŸ+b0÷»àˇ@/r‚˘MÛX›vºîÌ„Nå£√Ù7cHﬂ~Q(L¨\$±å>ñƒ(]xÄWÀ}¡YT∂∫W5b£oÙçH¢*|NK’ÖDJî™Æ3 !ÿ˛CmGÍıh∑e4ì⁄5∂Z@£c%=k‡HKùCé-π¥9r/àÛA lÅ¶†¥mú¢N)Ú\"ëJ:k^H∂[qäÒ#Ø\nÈëê	€ëJW7D]Ìvæc∞≠ ã…\0EÔK	´Îr‹Y)˘-d÷êˆ≠—ôìˆ4SóBVaä∏•ŸgËr‹–pKPPÄdtN_Ö1 ŸÀ8ª2Éo÷J5hRg⁄ÚSsïbUœî›£—Ù∏G+∞&YM∑∂˝s∂ß—Õ\$ê\$	–ö&áBò¶Åp⁄cW¥5™~√KÏM—∫h;ºmG«ª8ÿ:@S∫Ôå#ì»7å√0Ÿ&¥J£ç“≤ÕH«ù\0%ÇôÜ∏–®œ8m!∏<Ç\0Íø®cgƒ9Ü`Í\0l\r·ù&0X|√î\r!ú0§¿A	ú»mIÅ‘˝ÄÊ\nTI[T\"úD`@¬òRÀ\rE∏ÉzSK2ØR¢∏ïæTfÈù˙/\n•ï\nhVöï8Öt¬ùED@‘¡nx—,ßC¬ôèêf^!’~§–@C\$*\r…≤Ü5˛øC\"l\00û‰ÅË\"\r–:\0ÊÅx/Ú“˛Ço‡º2Ü‡^ûòt_“8È ~R`gÄº0ÉÁÙm‘€e6ÏE⁄º4TàHqVB›·<GZQ‡¸àƒŸî¿güAJ\$@∆‘Í~ÉëËPä93•ÚKÚQŒ:ÜàÔc‹}èÚAáy!„\\âR.F»≈ı#WÍˇ‡àπ‡íCÅÓ\r≤4:Iπ:ª¡Î?ÅΩùI‚CY‰\r*	6@®÷û´#- n\\Œ˘3%eÂE»†Üb€–π´—h §ælåd^<ÅÑ1…%˛πÌÉàÚŸÉîÎgAÑ3L˝†§Éj&™Bòh<ÅÃ0Œ∞@ÊTÏ\r!Ñ65tü:é°•F,©¶¿¯é——6gP(Ä†¥–¡Ö°Lƒ≤®÷ÿÅjj◊†ÄÄ'z)é!xci≤a?TYNk˛5—Ÿ2|œ9È=g¥˜ÜVt†êt>G˘=ß⁄âÉΩ~Q&y›ƒÇ≈‚√0¢Ü.\0™4¸°9Úé°ÕA¡8Nöè‰˙\r¡¬L Ê°T= ?°å4O“„ÿ §î‰Ú0√…OÜEu(ö¬à™‰A]	Z…≠\"ThCv*≈a!ëE‘ë\0ÜL	ò–”W2¡!ŒÜ-®ÅtçÎ.t-µ1Ñ T»\\CÜ∏Ä\nUÕ’óP¸ßí>N Å•ùd˙ùÉtı?ß…˘Í|SËfM¡∂3ÕàÂhSPcÉI⁄úÿE|J»J%†ŸAL/\0P	·L*Ï<^‘\\ƒ≈≤∂ TCP£15&¬˘!õ¡B_-ÍQÂ(≥≥@≥Uïc8ÌÃ¢ŒÔa∆R∑¿ÏKîÆ˚È¸Å”§7»`ACØL(Ñ¿@´‡ =ë‘#JØŸ–iù\n‡úHa„N)ò∏∆ÇÕå1!…@Ä<hÇ¨ë=äÏûW∫¸Ë@3≥5(Ñ=K*–LçΩoª(êS-	wt3AŒ∂GE)]îh1h◊6S(¥è.	≠uz_>›‚úÊTπ\r”Z#NúÒß›2ï5o˚YêWX^0\no∞6º\$Ck~:ájâÅÎƒÒûÅ§3@Ÿˆ]B6a\r±ë>€8LB†F†·yFÎˆìKÆ∞R…K-ÇÓ5ßh’ùÕ∞ÖB4îπ∫:V»ËS∂ÏVÒ@¨n¯Ôøº‹”j3á|_-˜•∂Æ)ıÑ‹≥\\‹¢u-ç„T*¸Ú÷≈42∆›ßµjñ∫mZY∂ÿˆQ“·ÂÒIÑ±'êIÛ›Ow«]†–Ü∂‚:øDk&(¢äàäVÇU§`LÆët\n¿∆™†ßÃ™ŒÉjoNÈÃui\r&XÆIff‘,Ω€rHë∑¸Õo.2É.ÅJäµúù^/¯„Ÿ7x¥díOuØ‹§¬•cßÕ‘QÖ*</∑©Ì7∑(é7X´.*^π»,-_©Ò3oÂ˚ßz°»ƒöÒ}„—ã«H“ö§ò\0";break;case"bs":$g="D0à\rÜëÃËeÇöLÁSë∏“?	E√34S6M∆®Aê¬t7¡Õpàtp@u9ú¶√x∏N0öé∆V\"d7ûé∆Ûdp›ô¿ÿà”L¸AêH°a)ÃÖ.ÄRL¶∏	∫p7¡çÊ£L∏X\nFC1†‘l7AGëÑÙn7ÇçÁ(U¬låß°–¬bïòeƒì—¥”>4Çä¶”)“yΩàFY¡€\n,õŒ¢AÜf ∏-Üì±§ÿe3ôNw”|ú·HÑ\rù]¯≈ßóÃ43ÆX’›£w≥œA!ìDâñ6e‡o7‹Y>9éÇ‡q√\$—–›iM∆pV≈tb®q\$´Ÿ§÷\n%‹ˆáLIT‹k∏Õ¬)»‰π™˙˛0éhËﬁ’4	\n\n:é\n¿‰:4P Ê;Æc\"\\&ßÉH⁄\roí4†·∏çx»–@ãÛ,™\nl©Eâöj—+)∏ó\näö¯C»rÜ5†è¢∞“Ø/˚~®é∞⁄;.à„ºÆ»j‚&≤f)|0ÅB8 7±É§õ,ç¢˛”≈≠ZÊ˛'Ì∫¶ƒ£î ˛8‹9ç#|Êó	èõ†*≤f!\"“81‚Ë9«ƒl:‚…‚br¢™ÄP°/≤¿P®∂çJ3F53“¿ú7≤»,UFÑ±8ƒòéÄMBTcR˝STU%9,#¿R¨Å®\\u∏bóQÏj⁄3ÀL÷å„\"9G.nbc,≠®p«,#X∆√À\"˛˛±\"(ÿFèJ¸	„\"_%Éµ∫%É”(\rÔJÓÆ\"1<:≈â]∏¨[ ZÆ¨£+]VFÉïËÑ^÷ÈCél⁄∞Ì#„-ˇSﬁw≠∑ÉD)6~•†PÊ0‹B@ê	¢ht)ä`P…\r£h\\-è9hÚ.∞c’Æ∫FäBF\ríÛ0Õ'å√2´7/Íf9\\53I\rÌh⁄ç)<Ê:åcT9å√®ÿÅ\r„:ä9ÖãËÂ®å6ä‚øu;7®8P9Ö)pú2≤“≥ºÇbò§#Cë5πGﬂå;)_kÇvÀò⁄:•¬™R2Ω*4ML2—√:˚µ|L‹î(£8@ åõ[˚∞ås¥ËÓÕ¡‚42c0z\r†Ë8a–^é˝»]étCê\\πå·{úß	˚È;·}‚£¸Ëxå!Ú\\+7r\n’Zë=\rhŒ√Kπ8GNc\"lR˛¬#ú'\nŒÄ“…¬¡TŒuΩcŸˆΩør;˜}\nä]¯rx/2ßúù@\")†¯\$Ü–‡iÃ`nè=Ë¶Ù∫1¨\r<ëúT JÉìO*–Ió6âCk]§’B∞ëÈ\rfmô=tËG±!ç„ü∞ÓiöŸÄ4GıÕƒNC1MÃ%™µv≤÷…c^á»Ä4––BŸåç¯„Ë]√ô./EúÄ¬£BsÇ#«Ó¬¯bï»tU\n (tLÄëa%@ƒ¢\\”±Váév\r3JiÕJÚ.a–’õDÑπ,ÊQπ7G™/éÚ'DÒá)(Æœ‰q%0ÌÌü≥e)CÉm}/¨9\"pÓl√U0¡ùÿ™Éc‚ÿa%u^¥Û“sû‘åÈ—ßÜ¬™4vìdÙÁò™V	ÈÇ`Å°≥zwï\"kå'îäáñxJ'.AÜ‰Nl§qì!‘’!\0Ã–€†w±Z`2XÅb¥é\rñ^2Ç{à P	·L*3X∑¡mD\$xÇ¬\"∏àa|x8§\r#\"l™àBLçE¿É7–‹àQái‘´wﬁTœ°üEÃÏÕ¨ÛˆÉ	cg™†Ö\0¶Bcà4‘d4êå#©DËi!@‚'É◊M‹©ÚIÉHz<Èàü‘”<ã*ÅÖpG>™ëzúõ…4£óıuSúÄÌV!“V!èºç&Y†Î	gµ®∫,÷[‘˘\$“^µ¨÷2“lot˜\"ÄAFéÂB÷®ùcú„\0PFßplî!ÑŸ¬®T¿¥&áK8.TÔ¬`ÕvÏòz'~àÕ⁄i1UXUˆîô⁄v2‹‡‹*(‰®≥0 ÜÕ±+ßî¬ì„†ÁŸ\rP¨Ô¥ö8blm[1'≈AüK^·•º´D¯Õ© 2ìL•ä+¶(°¢2Ü√RÌ4ø(–´yQPa\rµyf•Ü/F‘¿\nil…]ÜrG◊ç˝ñƒ eV´2<‰h∏ÑJa[\r˘Ñ'aË≈a5ŒØ§º.é·“ôªÇFZzíZ‰d#(´¿PAÆò@æÜê‡";break;case"ca":$g="E9ùjòÄÊe3ùNCPî\\33AÅDìi¿ﬁs9öLF√(Ä¬d5M«C	»@e6∆ì°‡ râÜ¥“dö`gÉI∂hpóõLß9°íQ*ñK§Ã5Lå ú»S,¶W-óà\r∆˘<Úe4û&\"¿P¿b2ç£a∏‡r\n1eÄ£y»“g4õå&¿Q:∏h4à\rCÑ‡ íMÜ°íXaâõ†Á+‚˚¿‡ƒ\\>RÒ LK&ÛÆ¬vé÷ƒ±ÿ”3–Ò√©¬ptéù0Y\$lÀ1\"PÚ ÉÑÂd¯È\$åƒö`o9>Uê√^y≈==‰Œ\n)Ìn‘+OoüäßM|∞ıê*õçu≥π∫Nr9]xÈÜÉ{d≠éà3jãP(‡ˇc∫Í2&\"õ:†£É:ÖÅ\0Íˆ\rèrhë(®Í8Çå£√p…\r#{\$®j¢¨§´#Riç*˙¬òàh˚¥°ÅB†“8BêD¬É™J4≤„hƒ n{¯Ë∞K´ !/28,\$£√ #åØ@ :.Œj0∑—`@∫§Î‘ ®ÃÈ4ŸƒËÃU¶PÍø&àÆbÎ\$¿ Á#.¿PáLÛ¥<≤H‹4åcJh≈† 2año\$4“çZÇ0çŒ–ËÀ¥©@ °9¡(»CÀp‘’EU1‚∂Å®^u∏cA%Ï(ö20ÿÉé√zR6\rÉx∆	„íåΩ&FZõS‚«F“î≤9k≈6Ö¸µ\r∑0eïe∏ PÇå®´qu\$	9ÅB(‹◊2òNÕ;WƒVåk´)q£…sQÅp}0oµ˚G_ı>pH59\\∑<Ëí≤@ê	¢ht)ä`P»2„h⁄ãc\\0ã∂÷yØPu&çì\0—¥©*:7å√4;N¬){]\0éNzáÄç‘Ó»\nÉz∏ü\r√Ã4…∂Ω\$31Aíº2PÃ¡´#8¬º∏œµZõ\r–ÿ aJc®çn–@!äbêç¥é»;àÂö∆wΩì(„2Í6±R;Å•≈TÍyL‚l¶üπ·£Z≈\$–£º#&ÿó√:b2£\$¡‚h42É0z\r†Ë8a–^é˝»\\èÙiÇÍ3ÖÓ–_\0ØOdTÑA˜à˛;¡‡^0á…ägH£¡f”+£Ä“9?õÎ¬m4g”∫ª	ØÛpìAhƒg{>ÿÀ¿uL[◊ˆ=ük€˜#øvËã…/Œ˝‡ÜÁÇâé“rÄ¿à®É‚(ÖïûyœA3#t’8tjaÖ∫úd¶‘È#GÏ,:Pœa	0%\09°PACb~HOR'@®Ëa`Àts^JCÖép°*p¬üZkDaÆ,pﬁÿ!È,\r\"`¬PåŸîYÁ∞ΩßDra”Ñ	z∆\\¡ìa°ö#+©≈nêP†Å\rË!'îb\n\n\nà)@‘ã(≥|éã=Å∏3õ3VkMy~f¨∫áB\nçJ–o@•ÌdáwÊé\"—⁄Q±uæ7‚o\r°¡î8ƒö4»Îh7R§7\$ÉzßÊ\0001≈2l›ä®71T¬°C~xŸ4AãñrRV“T¢'BÄûÿfaH™-\n(1ôEHIa1	\$D<öHˆ©–\"ë\r–d›Ç)	à	*?39–ªÿ®›É…?ÊÍH ≥bÙçë8é¿Ä(¶2î>ƒ¯å@Œ˜ê.I˘áSïß—≤+ÖÊj¡F£ +ÚáaŸô¥TJ»K‹[\\®ö)ºaO±µY\$|è*ÇÓòQ	Ö é0Té*qSì‘Åf(fùjD9Ça0“5ãQØuE5–å¡#Ãa!‰jzû™&hÈíÚIUÍqöÙñ§ò0IYÖb3ãF√·5¨ı§˛OVIt∆»ë7t¿\\ÒQî∂æ—≈í˚\n»mÆj0íÇ’íLB4â&®Qƒ“®T¿¥&ñc§%[:\$VF◊UZgë™`7Ï.`üj}ik]®4mZG™ôH:€fÑïØCbﬂEs,ô•ù®∂®aãfâ5˘òÛ‘áıM;K 0å1Nünm#SDö≈ÍËIÉË@∂˝ ﬂK,T¢6Ê@&^{@w¬ÅãZ·p=ƒ{\$ë\"√ú≈≈UÙõi»E©2ä±S€+TìBõ7ëA,ï†C≈?Q6ëô\0ÜØJ+7M-xŸ[ÙxçVEØSòAhh+êh:\0";break;case"cs":$g="O8å'c!‘~\nãÜfaÃN2ú\rÊC2i6·¶Q∏¬h90‘'HiºÍb7úÖ¿¢iÑi6»çÜÊ¥A;ÕÜY¢Ñ@v2õ\r&≥yŒHsìJGQ™8%9ê•e:L¶:e2ÀË«Zt¨@\nFC1†‘l7APË…4T⁄ÿ™˘Õæj\nbØdWeHÄËa1MÜ≥Ã¨´ÅöNÄ¢¥eäæ≈^/J‡Ç-{¬J‚pﬂlPùçÃD‹“le2bçÁcêËu:FØ¯◊\ré»b ªåPÄ√77ö‡LDnØ[?j1F§ª7„˜ªÛ∂ÚI61T7r©¨Ÿ{ëF¡E3iÑı≠º«ì^0ÚbÅb‚©Óp@c4{Ã2≤&∑\0∂£Ér\"â¢JZú\r(Êå•bÄ‰¢¶£kÄ:∫CPËé)Àzò=\n ‹1µc(÷*\nö™99*”^ÆØ¿ :4É–∆2πÓìYçÉò÷aØ£†Ú8 QàF&∞X¬?≠|\$ﬂ∏É\n!\r)Ë‰”<i©äRÅB8 7ç±x‰4∆Ç–¬5¢•Ù/j∫P‡'#dŒ¨¬„pÙßÕ0◊ºc+Ë0ç≤ä‘∂#îj»FÍ\$AH»(\"√H–Ôî#õz9∆Ç†‰÷;ÎË·F—È¥û.‚sV¢Mƒ»ÑÅ\0ƒ0¬¿HKT’p∞ÛWV`ËπÅC‹7ÅP¡pHXAã›Gµ@÷2DI–“;O(∞√@Bb`»à#\\f˜õ–\"ÖØ*0	ˆ`Êöççm\rF-@⁄“1we–7ø7%Õt±bÚ6ùë\r—%R2‹#\n07–ÿ<ﬂ∑æÜUÓN\nå0∏Mˆç_–^\0çb8%ƒÏïÈ\\.bÙ8ê	¢ht)ä`P»\r°p∂9fÉêªn[Œª¸M‘î£3√0Ã°@JòÀKË˜µ;H≤7ëZ°;A\0€]ç“\$5é£öÁ~¶ÙÂ!O¥¡`@=k¸ç>ç\\6ﬂ‚#l¢ÿ6¿Nù®'⁄ùÈ´8:Œ∑´k‘ÒCPª…¨ÃÌé«]é€^©mÒˆπç:éÌ™∏.˜Æ¢˙^¿ö[/¥qV€∆≥Hçöª8÷û¶)¡pAråÆ“w3å…H⁄¡Sƒœµ%w/5ø¥…º14îz4;8ª)¨?â´	±∑Ëî(‹¶°\0Ç2m–ó±ç˙@2å¡ËD4É•∫·xÔ˜Ö÷üª£Ö…HŒåcò^2\rËË_Ë/@˘MëpÊ\r\"†Ü|GN†√§‰54`Ê§üÈ?G·…OÆñ≈TrÈ;IùJ<d +Pìiq(5”îRH£»¶rà%#A¢Oÿ |( 9>GÃ˙Ps}èπ¯?\$¢˝≥¯I¿ûAÄ›\0äÄ>	!¥8¥∫ëZÅê9©\"Ú&S\nÉb02*ö“0Fä12∞Z'BeﬁiKÉRk/d1A\"HN	“†\$≠l£5TVd&(0è\0@0≈‘4áh∏!(@‹!®\\5:Ü‹Ê!	'1°”!≈—\rA§ïóí˜Pxz;IYv•B Ò_·[ƒ« txÿŒ\0d@ß‘Ä@@P¶Uä“-\$AAP(5Fë ‘®≈≈DdgëÄ Â‰ëƒ•[äÙ\$Äû,x'jÌ“∆PÈd|\"ìf≤Nìi(£ZãxÍe	“Êc»‰u°—±OÇöGaÁ\"í5(í8óSô%l)Ã\"\$qaÂ%ÊpôΩôƒ®I¢‹ùWdÉ∞yÑdpÄ¬t\$ûÉyU!©≥'Dåz” hà´ë\$åP•√€~d	±ÙFk‹1F\$3E¨=@Ì1–ºÃ+°»ì‚Ä`œP	·L*(_Ë¸WSÈû´õÙÏ⁄)\r#AM]öÙ:ˇC0i·‘·àŸ`aËkÙÖ4∞¨PQ€©\naD&RNUß∞Øü	úèEGhoù†Ä#IÑo…Ç6(ﬁ±∂28•AKA§ËËã‰»™óŸøgî=0ˆ¢Ï·è≥·ä–õÍ‰C	BS@èYµLJÖ†]\$¸‹ÀOC\rYB4FëÄ±J(S€1bÃ-~ùUûhÕ+U7‰±V∆.u√4¨rÈñ“=`IXCÅ»6≥ºPÓÖÑz¥tVúBàÿ´ìGñÁ·¶pı√qäD’˝;µŒMß—\$yàÏYø¿Ï¿»U\nÅÉäæ¡ëõñ—≈›Kæ¬S¬A …∞¸+wìÂ÷b¯F*a<4n„cƒÄá†2(£HÃí§+t„õ3÷\0PZøEJK+†c—^°‘ƒc\"»Â˜∏Üêø#«’KxoG»M\n¶r&ôÊD Y:¢?PŸ—Ÿ;d⁄Æê¸æH±9‚\nwçÄ*zlNÀ∞≠A†¡\"êY®DJ†ÀT≥(àï¶}3\nÕàº‡»’¿OOt@∏\0†ñF\\BﬂHE=(É »™ıXˇåmT	¯AP¿cté1D¡òWß%SzèÉÄ";break;case"da":$g="E9áQÃ“k5ôNCPî\\33AAD≥©∏‹eA·\"©¿ÿo0ô#cI∞\\\n&òMpci‘⁄ :IMí§éJs:0◊#ëîÿsåBÑSô\nNFíôM¬,¨”8ÖP£FY8Ä0åÜcA®ÿn8ÇéÜÛh(ﬁr4ôÕ&„	∞I7ÈS	ä|lÖI FS%¶o7l51”r•ú∞êã»(â6òn7àÙÈ13ö/î)â∞@a:0òÏ\nï∫]çóÉtúée≤ÎÂÊÛ8ÄÕg:`¢	ÌˆÂh∏Ç∂B\r§g∫–õ∞ï¿€)ﬁ0≈3ÅÀh\n!é¶pQT‹k7ŒÙ∏WXÂ'\"h.¶ﬁe9à<:út·∏=á3Ωú»ìª.ÿ@;)Cb“ú)äX¬à§çbDü°MBà£©*ZH¿æ	8¶:'´à Ï;M¯Ë<é¯úó9„ì–\rÓ#jòåé¬÷¬EBp :—†÷Ê¨ë∫–«)Î™°æ+<!#\n#àÄ…C(öç»0ﬂ(§‚bûö≈K€|Ö-n‰ﬂ≠É∞‹âçÈ¸	é*◊äS\"ãçÕ\n>µLbpÚ–∂∫2Ó2Å!,˘?&£ò5 R.5A lÑÅ†@ P¶ù;É@Ï≥ék#4ü∫m¬ˇ+\r£K\$2C\$‡äÃ ÿÓ°k\"íÅB0ÂDäï2|\nÀ‡–¬Œöï–Jefœ(ËP3„`0¶Ë-áe—C®\$	–ö&áBò¶Åz^-òe-Àsî¢ÌyW6£#‘\rê‡,çË ¬“ç„0ÕU™î≤ESKj:∆\"†ﬂÕ„ 9(é£∆¯c0ÍœNkXÊ&ñ0åˆÇñµ®sÂJ7©®P9Ö)8™3è#c|–àbò§#´•Ö°^7MvL¯€éN{[48∞\\ªè,e®*\ríV€H√™∏Ñ…ë°X¿«)†…!\0–ûå¡ËD42„ÄÊ·xÔ∑Ö…∞Û¨„8^•„\$¶–\r2ò^€“ÿòÆ!‡^0á–÷!æŒ\nbÇ\râ“Ï–Á8é7@√<5£,BNî™êZ5Ã£+˝Ò»ÂU…F·pA∞l[&Õ¥õVŸ∑ní÷ºÓª∏›ª…ÍT•ﬂÑJ |\$ç®Û`•K7Ñz∆ëjc„†3ÌŒù4©CË,óô≈~\n˚?ò÷∂¿q¢09Ú%/PŒ§˙b00åiå¶Èî˙F@9ÈÒ•áŒ√òÉbÜ—ê?–Ë	Åö °ÑÁÇ\0∆o^`i-°ÃìóÍÉ∞iAÂ\0√ó6åı´^'ËÀô∞@@P¨¬2Ñ\n\n )u&uÌäd<ÊWËCJd]¸•“`ãN®iÑ%‡π'√Óç…>'Ãœö≥ƒ_S,e≈¯'3åüy!Õû!„Œü±•)Ê|Çü¶q†â-a¡íüìˆCí|·†4Ü8 ©L…°.—∆§øIIN%§º…GÿâtL&†7∞’°¢’9ÑhPôo\"!Âzê(D|ÉyÙXpF5ì–‚OÅ°«XóµfÁJXc#Á∂∆≥Ù\\ú˘*>!@'Ö0®@èS©í§*Kôµñ”\r(A¥—ÜrDÇàäÓë≈0’î%0AI…;'®Aè§GFî… g™›˝'–AYK#§|êîñN0S\n!0†‘Å\0F\nÅAóí®ûÈsñmÑ†&\0Râ8E\r§]<‡ç…™‘¢TRe	¥Th’©6ãæI÷*yÄñá\"≤÷j∆\"‰8R¿”Kùh\nhp6∞÷ÅÉY˘\\ØAähÚ^´Ÿ4P¯2PñÜR\ra}fz¢∆†@B†F‘2ÜsæôRÌ(OÜ(S«Rh<P§1b÷C@JïiK‰%ô\"3Y™*Ø#8’¿0ƒ1§C·ò∂ÕrDãŸ3ù•¸ﬁó‰TóÕ·|±¿µU‘±IçM#\\ãä™_`ÈÅr\"ò¯¢õ6ªÀÉ´¥áB!ˆ∫sA>#Ù˙Ø@ç”Ÿº1d&ò÷‚äÇ±mÊ%ëÙ∆I\\O0œ\"Â	ø6õ\rHØÖ‹øÖBÍÆ¬îıEV¡H@";break;case"de":$g="S4õåÇî@s4òÕSê¸%Ã–pQ ﬂ\n6LÜSpÄÏoéë'C)§@f2ö\rÜs)Œ0añÖ¿¢iÑi6òMÇddÍbí\$RCIú‰√[0”cIÃË ú»S:ñy7ßaîÛt\$–tôàCà»f4çÜ„Å»(ÿeÜâÁ*,t\n%…M–b°Ñƒe6[Ê@¢î¬røödÜ‡QfaØ&7ã‘™n9∞‘áC—ñg/—¡Ø* )aRA`ÄÍm+G;Êè=DY–Î:¶÷éQÃ˘¬K\nÜc\n|j˜']‰≤CêÇˇáƒ‚¡\\æ<,Â:Ù\rŸ®U;Iz»d£ùæg#áç7%ˇ_,‰a‰a#á\\ÁÑŒ\n£p÷7\r„∫:ÜCx‰™\$k¬⁄6#zZ@äxÊ:éÑßéxÊ;¡C\"f!1J*é£n™™≈.2:®∫œ€8‚QZÆ¶éé,Ö\$	ò¥Ó£ç0ËÌ0£s¯ŒéHÿÃÄ«K‰ZıãC\nTı®m{ûÅ«ÏSÄ≥Cê'¨„§9\r`Pé2ç„l¬∫±™öø-ÍÄÊAI‡›8 —ÑÎ£√Ñ\$öf&GXäŸêSı#Fr°DêË	ÉxŒÄÅTxÁ√h;⁄Ô1ì\0ÍÜ(I89§c“ÅàC HÑµe\\ñÅCP¬/t¿H¡ i^Ü.ÿÍ‰1ã¯ÿ≠J*Â\$Ølc\n£#ç»‹ˇà-Ë“êFµ2:Œ®≠\">∆°jj4çÄP≠l0££Ü3¿PÇ7\r’ß6à#\\4!-3XÑ\r∆ùØ…eÔ|¨Ç7\$ÁÄ•®VôçSıIâ@t&â°–¶)ÅK\0⁄cVD5∂À›é∞˚5)±Ée‘Ì´H:Åç˜eéΩ≥Ë`Ï∏ﬁ≥Pÿç±Ç”t;+Sä3\rÈXÿ7¬≠.7¢≤πpAHh0·Ÿ(cH–Bh\n†Åâ®¯É@àRxÄß#`\\ËHˆäÉh˙Hœ•È¥≤®Ív´k\n∂7ÎÆ;∞N{˘≤—ç&“4mcv⁄ôàbò§#†ﬂ}9„;#ó(ºJÉ6H0ç\r£™3\$€I„Ë˛7w∂1ﬂIûz¿è˜]§%nΩ@C+Z2C»&b åÉjR&2:û—/Èê@-\r÷ÑJ¯Ë8a–^éˇ\\çyK‹·z7ı\$	Æ7·|Ó M Ôr\rÉ\\”5\r¡x√>fıiá7à®Œ´'ƒ†7’í÷]q{vÖ…;ÑhHìô5<¡»©•8§Å8v\$≤úG¶ıCC◊{)\rÓ=Á¿¯ü#À|·…Ùæ¥˙üﬂ{Ò* ¯\$Ü–‡[ﬂ‚9k¡πˇ¿åÈä0	©Ñ4Ú6kR≤8¡»ú¨“ûnA9XÑÕ\0ùBúdVêg\$ÊDÍÖ\0êhS%™\0ÃEñR¬÷≥D+dΩ0®BÕÿcG\$ÄËøÑb\"õHäÅîÅÜÃu:√q¨3:†@“⁄|}éBIêePöÅ\0c8mì•eZ˝GH≈√¸i	N'K≠ ˆlU!·ã¡–»ô∆O£@EîgNS/2:\n\nà)Ñ%8è £D˝LC\$Ó=ƒ¢dthÖºñ44§úJsB¶Ï¿†Y	õüG\$∞.ˆ|F¡hI\r“ú«µõéÒLajx¸¬;%an¡©µ\"@√∫¯mO(3ï¯ˇ>ae&y7brM€kÆ'≈\0É.Ùîâ⁄)XDdK¯r^Â—¨Ω'ûSô^\"ÿÖò0ÆG;1t®AwÜcÔ9\nÈ´ò§u‰>WòKH·yÊéêr0VäS_¶FÃÉF©JL¬ÄO\naPôvdt\"¡F\rÂ)´óréJâ#îríR”•gp“≥TìøÂÅ•Å6*4…K·‘˚Œ„>ÃCYH\rÀ5»êjµRH Q	ïUShßF¬†P4\$\\ï£HxHƒ∞sÿF†ÂZ·>CuÑ¡ôuPgç|#`ÇÖÓX2ßU6•\$ÿ` ºëM∞¥ •{T›&pe=!ûÿ/¿Ç§ÉI¶'e˝u3XÂPla-cª@@nMÅÖ;Ò!:ÊI\$¯Df(Ÿ‘©∞@B†F†‡“ƒ‰u	3_ñÓ‘[ÎkhfºBRMæ˘≠£2fÃÌ¥h‚—ï∑l CΩñTæ¨d‚J	S%ÊLaàGÍw¿Q~<ÀtÅ\0£RFgqÎ:Ê\"Ó(¥èX´à Pà\nÎ•kµâ%*(©âŒÔí“g·J•d‰e†)K,vÂ·nbDë3–¬N°,Et9™ºulå„…Ê`Õ#5‹ I`welπ6›B@°É≈˘¥Ä*Ê(Ü∞éD˘s&ÿ¡\0¨`}± ò6Ø¿^\0";break;case"el":$g="ŒJ≥ïÏÙ=ŒZà ê&rÕúøg°YË{=;	E√30ÄÊ\ng%!ÂËÇFØí3ñ,ÂÃôiî¨`ÃÙdíLΩïI•sÖ´9e'ÖA◊Û®õ='áã§\nH|ôxŒV√eêH56œ@T–ë:∫hŒßœg;B•=\\EPTD\rëdá.g2©MF2AŸV2iÏ¢q+ñâNd*S:ôdô[h˜⁄≤“G%à÷  ..YJ•#!ò–j6é2÷>h\n¨QQ34dŒ%Y_»Ï˝\\Rk…_ÆöU¨[\nï…OW’x§:ÒX» +ò\\≠g¥©+∂[JÊﬁyûÛ\"ä›ÙÇEbìw1uXK;r“ ‡hõ‘ﬁs3äD6%¸±úÆÖÔ`˛YîJ∂F((zl‹¶&s“¬í/°ú¥ï–2Æâ/%∫A∂[Ô7∞Åú[§œJXÎ¶	√ƒëÆK⁄∫ë∏mÎäï!iBdABpT20å:∫%±#öÜ∫q\\æ5)™¬î¢*@I°â‚™¿\$–§∑ë¨6Ô>Œr∏ôœºégfy™/.JåÆ?à*ç√X‹7é„p@2éCêﬁ9)B ¬:#¬9å°\0»7å£òA5éàÍ8ù\n8OcòÔ9åå)A\"â\\=.ë»QÆËZ‰ßæP‰æ™è⁄ù*®äÙ\0™πã\\NûóJ´(Ï*k[¬∞Îb‹∆(lä≤ 1Q#\nM)∆•ô‰lñÃh§ ™¬Ftä.KM@Å\$∫À@Jynî≈—ºô/JÓÚ`ïº3Nê°ïä∂B°Ú€zˆ,/ÉêÉHÁ<çìÎNsx›~_‘å£¿Ë2ç√ò“7·¨)6ÅT™º`Ä8&tRÆ8ÿ´Òã¶´⁄g6vv+hìNÖ”Xµ∏πGd•,s{3ƒ‚æúS⁄MóëπäØö´4Lû°Œ}*gÀ.êJ2ÛÖÅ:^õß–)˛ñ5\rjé\\ÅA jÑÅû¿¬p)l˚⁄\\\$…'j™ F©k£Üπ™˝Ωµ\$\rm©x†Æ9%NS\$πp|°h⁄0ç#dcU\$¬Ãßπ&v_x'˙ûß™+ˇä†™π-jC/∆\rïNYt|+≤j:gM≈ÒΩVg÷pº-;0§äRg/“©Rg!—ùâì~2DJ\$˘n¨•‡^-§iÔ¨.Jœ≥œ\"\\ë±œØ8òÅC`Ë9\$ì™Ö =\næ]O˙-g©∆eµ;∑dK|Jü‹«‹˘ Ø‘Û3Ù¶∆\n…;CnçÕW:≈â—)7Øh◊+∂(n\nÒÒ*ä˝ò U #˜B\$X=ÛÍiY ≥{Ãh∫ÅXuﬂzˇtpL÷;`[∫z%ô%*Ë —ë2«X‘¡¢L7¶‚≥ÊfÜ·\$&A–•äûSá°y˘…◊í+*YV\$H¯£täêII-aL)`\\Œœ!K™ôh°M\n„î\$—\\î∆Uƒ-\\Ù¬≤¬ê ¢Ô-»∏•@–SJÇÃ:∞‡‹¡\0AÅ¥4Ü‰·	Ca¡ë8\0xA\0hAî3–D†tÃ^Â¿.2nNß\0\\ú√8/aÄΩ?∞0Ë√√p/@˙bßy:¡‡/ ¯¬âtA IÈ/6≈Ã®√§S	[bWAƒ≠LMxùX¢¶Öë`¬ààf}ëI&,å•e7≤ ´ôIÏeq‡AF˘O*e\\≠ïÚ∆YÀYo.e‹úì…“`L)í¬X[\rô(¡Ê˙íëZ°>•…güπ£4–\nÅ»X˙æ∂†äí%=≈Ì∑d+ îÜfÁŸP)\"∏w\n…Ÿ•o¿›\$√q\nï>–6“\$8ØùU?\rÏ·‘r61\\9Ç9ﬁÄ©üCcòÏ@wÍC}	¬Iá ⁄Z`aÃ,9(`∆‘s¡’‘Ü¿ﬁ‰Ì]\r!–4\n¯üW›géU @›1√lfŸõX.Ié9~&L¸´R@±	YO\\(±U ZBç}I ÍuΩãfÌO‚\\à\$k∫ +K>@P\0†¡óæx\nCWG+§ïñì∏^Y»∑)A\ràIÍµ3Îo¿9êÏ„C(g≠-E(%Ù†√zÖ±5ÿ;÷É~UÃ‰§e¸ì\$J‡‚©ë ı-*»––úÌ◊ïÕFW\0A^k˝˜\r¡¿:®µ£√ìL·†4Ü:˚'<∞i©ˆ¸Ü0√%C)Ö¶HÓBÓ⁄ï9Q.,U\"⁄£òV»§4HTˇ©CÏµà®ç!VH«∑zIîôâ7e“r¢≈‡pËÏ1±mîí»\$@~„í,ùGÙ÷ :`\\z≥Ñ”#IôyBÁÚùFï◊1G‹/Q˜§0¿û∏RPcÖäí@N‰…€x\nˇ`y{\n<)ÖHﬁÕI9‘ ËñSö§U‘ﬁ#,EÕ„hYéHJ–@dÒês—ñä+=≈1+r@Õèû!…ñÚCÇzO’ôWùY•S¥C&ËÃAï-‡Ä)ÖôÜJ†â*[)∆á…éMGEÊò„Ù˚ÚZ´(O}˝öW˚£*T’~\r+¥åµ_€F≤âeoõÕÑHˆ#Gi/¡Ã≠≤ãUNÕ!?Ol§∞}·ëŸ!g‡£ÌõøníÖVçE∂ô¥Ê“>⁄»ï=“H˜\\Cƒï©o\rΩ±é‰˝\$\nLπ[˜ºﬂ8laå6`P◊ó=*UÖó>óÁy4êƒT˘°Z8~O\"∏*∆&Ö{JÉG:U”•’>è∂æAD°›≥†™0-(4À*v≥.≥mï\rª•œÈªÛË[ësRvaN˝.1ñËó\"Ö±È@{g’b¥ìå‹®§+îkô≈h)ê±∫åÈÑê9r©°[EÆ\"ƒÇ *Ä«K .:dSö≥öÖ«Ûõn~ë8Ö™U›ñÁx9õã\"n1∆˚'Ó:i˜Òõ=≈(¶è¥≠ö¥m…50w'C≥,œx˝! ÌCŒ%Ë\$÷±#À–1d∫ãßzƒ’¬´›wg©õ∞ û}‹à†¨v9s{rñ/Ω^ﬁû|nxg,Ozë;/5Z\$>Ûÿ·€Óå.üxË„¬ËŸœ≈£√”˝?Iè»©É}K1n˝'sˆ;àÌˇÆƒÉN:@Nh√fYCÊ†";break;case"es":$g="¬_ëNgFÑ@s2ôŒß#x¸%Ã–pQ8ﬁ 2úƒyÃ“b6Dìlp‰t0ú£¡§∆h4ùç‚‡QY(6òXkπ∂\nxíEÃí)t¬eç	Nd)§\nàróÃbÊËπñÅ2Õ\0°Äƒd3\rF√q¿‰n4õ°U@Qº‰i3⁄L&»≠VÆt2õÑâÑÁ4&õÃÜì1§«)LÁ(N\"-ªﬁDÀåMÁQ†¬vëU#vÛ±¶Bgåﬁ‚ÁSÅê√xΩÃ#W…–éuîÎé@≠æÊR <àfÛq“”∏ïprÉqêﬂº‰n£3t\"OøèBç7õ¿(ßü¥ôÊ¶…%ÀvI¡õÁ ¢©œU7Íá{—îÂ9MöÛ	ä¸ë9ÕJ®: ÌbMÊ;≠√\"h(-¡\0Ãœ≠¡`@:°∏‹0Ñ\n@6/ÃÇÍç.#R•)∞ ä©8‚¨4´	†Ü0®pÿ*\r(‚4°∞´Cúç\$…\\.9π**aóCkÏéÅB0 ó√é–∑ PÑÛH¬ìîﬁØP :F[*àëÉ˙êÑ\nPAØ3:E5B3R≠£Œ#0&F	@ÊöπksŸ\"%20Ü‚L˙w*âÉz‚7:\rÚT·∏£ïX ¢pÍ2®Ú”+09·(»C ”’DåÅCÕP∂Å®^uxbPnk4òeùÁ9©*â„îjƒOh“Óà#«\\W@SÀ1*r”B  ƒ»é+û åÉPÎmOb(‹“±(Ài•ãÕ»Á’%?så-25u\r1¢:ö2ù\$	@t&â°–¶)ÅC »ç£h^-å8h¬.ÅB¥`‹<É”HDcKú\rì2Õ•¨d÷3œ ‹¨ªœ≥JÁ7bÌI%HB=\\—Ç†ﬁûå#sÉo»ñR29å√™X6QKHÁL¬3ﬁ+“”4”ˆ0‹:Ø@Ê¶ô∞÷…bò§#:É≤\nÚ]Å\0≠KçÉ¥9\\w™U¢Gmz;å©`Ã∑\r∫ôÂ9ùu	.X¨iRÜT®¶¯*3œä5ª•P√¬[öìÌRÚÜïê‡–∆¡ËD4É†‡9áAx^;ıÅtiÀ?+pŒØ!}x◊ƒ£p^›ªåµÅx¬&Çö3f/L8»:˘C- ¬iìí9åk{˝∏QA∫ù1æ	´ÚïA#ú≤Ä“∆A¡:ŒÙI”uWX;ı√'`v]ßtúÀ uw@à•‡íII\nJ8Ø·¶í4íÉ¢SSÓ(ñ∂H–Aˆ',ú‚ü† åë%®œ#L±‹Diô;í2÷CADg‚\0Óiâd #gŸ»\$•>C3„@¨˘Û4Ü—K‘7Ç&≈_îpüa‹^°∞ÃÛ<p`\$fÑT≠Ù8á°Z\"Ä0∏ç\0ê8o@§Çî\nJA ∆9ë¬–HBµdÕ…¡@‡i\r1	9Dl∑B4åËo@ÖÕ¢sîMjE\"·‰ëp∆ˆê2ddãñìÜ}“y(ÜÿëHÑ9Cõ:ë0Í®F–RXPÿò¯*\\\"†\$PDët0 (xìf◊!˜ŒN1Æj\$¸íE˘{ë‘;KdØp@Ñ	S—B!Ñ:¿£`ä\0PI\"aÂêLIÅAÕ62 ∆.@–ë\rÆQ˝ìÌKpóf XÑ¬òTCßÒ∫í<ΩÅãg%¥Ú√—áHD‡ùƒ÷KfÈ‹\$HÅæπBLfq¬8ÜÖ)%ñÕ q43Fp√ó£X—°-T¿0¢h\\ÄÄ#H—B…%ê∞bxû¢ è±4SI‰Ü≥ Ü◊`\n©fXûò#aóµJ!507¶¶å}âEQ\\–\$ÓxÅ(j Ó%kû≤ë™œ◊±òiÄ6π.a£HbdM‘6¶à˘	J.9d•¢@ç `™@êÈßÖP®Åh8#∏·ò2‘M)î´ï5Æ ’f™§á®G]ìCjQ—M ê¨ßroË·¥J¶¡Ü`Ú¡HÃõV‘j©7YS\0Pm™∆√õ∞™qè\$™ØÖÂJ§<rïΩ(A*H…ÜRÊX≤èâ–ô{Ä•Ln\"5ƒ¢ÔÙhx@PP ™-*§Ü:PmÍDc¥ ·¿ÑæßT˝†Sñ~≠⁄SkK¿dVç\rõπÉœ=£ÑiY\\Z‚óôz∂IÏ*&t´T‘‚·∞d©≈#";break;case"et":$g="K0úƒÛaî» 5öM∆C)∞~\nãÜfaÃF0öMÜë\ry9õ&!§€\n2àIIŸÜµìcf±p(öa5úÊ3#t§ÕçúŒßSë÷%9ê¶±à‘pÀÇöNáS\$‘X\nFC1†‘l7AGHÒ†“\n7úç&xTåÿ\n*LP⁄|û ®‘Í≥jê¬\n)öNfSô“ˇÅ9‡Õf\\U}:ù§ìR…ºÍ 4N“ìqæUj;Få¶| ÄÈû:ú/«II“Õ√†≥RúÀ7Ö√Ì∞òa®√Ωa©ò±∂Ütì·p≠∆˜Aﬂö∏'#<û{À–õå‡¢]ßÜÓaΩ»	◊¿U7ÛßspÄ r9Zf§C∆)2Ùπ”§WRïéOË‡Äéc∫“Ωä	êÍˆ±jx≤ø©“2°nÛv)\nZÄﬁé£~2ß,X˜ç#j*D(“2<êp¬ﬂ,Ö‚<1E`Pú:ç£‘††Œ‚Ü88#(ÏÁ!jD0¥`PÑ∂å#ê+%„ê÷	ËÈJAH#å£x⁄ÒãR˛\"0Kí KK‹7L…JêÅéSC‹<5Ért7Œ…®ôF¢íú4Úr7√rL≥¡/ä	Ézÿä∞L%8-„¨ÉÀËjFL®@“9\rC* É√ ê‘à»Ë≥è, ŒÅA lÅ•hÅBxËùLê–2¿Ic\0¥ƒkP(\r4˙ˇ4É≤ç2@Pä•nPó#!£•é2¶HMåõç 4z⁄§ç I`*îı@:áP¬ˆ7#»ÙX\$	–ö&áBò¶*£h\\-è8Ú.…Èx∆í¸j6L S*À…©Hﬁ3»⁄z⁄=Ï‹ùF—ÈqH67ÀÄﬁœ\r¨`ÚAj∆1∞ÉòÃ:çã≈ÖacL9d„ŒåΩ®U‹‚°O0 aKh7∆ô*¶bò§#f–Ÿ•C|T√4Å\0Ï¥çπ@Í›ç)¨°è∑√ffÎ%)x‹û∞™4NÃΩ(Õ5(»PŒ8JP9f√ù!ìàxﬂçê 3°–:ÉÄÊ·xÔ…Ö…&–9ÀHŒ¬Å{Û6Us¿^‹˚ÎªÅx¬cH”ëΩ≥¿A\$Z©®¡OnÃ∂k*¡H1#*jõ∞ØzUK∞8SË0\\pl«\rƒq\\g»r\\ß-ΩÛ.ß87sì§);¸ê	#h‡ÇÀ„pÈ‘ısîæ◊\rË;N‚ß	J§ï=˘*z˚ùjwO≠˛¢H@ﬂaœCß‘™6ÚRC°=°‹ç3ÊˇìsI|ÉÜÃkã*eÜ%ó≥vœ†°Æ4 ¸äÜæÜ!è∏4ì ÊMB)P)ÂËºî(ÒÄc(êÅ¥ŒÑ\r4Îp†Ñ=BhU‚òT®R0\ni‡û¡Ïiåp4à“t\0Æ¡ÇÒŸÜ∆Ãﬁr“C¡¨¥∏`÷ÆÃsÉê9√Fío√öeë§ˆöÁÙÉÅÊxÊ%‰Ç\0ÓYÉhhù≈Ç/!°Äa\\Oú¶JO	i¡dùŸá\$ÜGà)Ü/O=µ3⁄Pä\$?gI∫Ä†íE…ñîÉ∆√B·\\jp¡≈Ø≈`Ã|ZÎyr≠\nCÃ`ÊEñd‘(¶lzX•í…WdF·´?≈V;ñ¥pU˘ñnÃÖ∞¢KâÑ„p”©¨¶‡Ä-0kú:ItÃc(}aæõÙh›¬òQ	ÄÄ3&µ\rA\0F\nëEÑFó‘±#I˝òÈxäƒ70èõiÜmtZ∂≥v€ÄPUkÛ™ë∂¶ÿTÂ®KSÍÖ7ª\"L\\‚:¨õ‘y¢jÍT(≠v™ÜƒpNù0õá‰¢ñòòC`+\rdÃé8‹CJ]8—Z≥‡™0-	≠øS¥M_J\0\$™≠üñ¢¸âÀë\r#ÜHç“0 á©u'\"¡5˙ÜêÃ@Qãn	ô-†¶óL,8≈Pø∂:í∏é-L0U9‘\"yéK!)ÍÇ)Ç“~©Q§ëª(¿ Ø√\\®;fÑòùp®pPô3]%Mˆ.\$X™n0Â“£–ñŸì¬“'5®≥÷îY’—:!\n9àN⁄ÓH…— .%Ã∑Ö\$VKÂå!º4êê";break;case"fa":$g="ŸB∂¬ô≤Ü6PÌÖõaT€F6ÌÑ¯(J.ôÑ0SeÿSƒõaQ\ní™\$6‘Ma+Xƒ!(A≤ÑÑ°¢»tÌ^.ß2ï[\"S∂ï-Ö\\éJßÉ“)Cfhßõ!(i™2o	D6çõ\næsRXƒ®\0Sm`€ò¨õk6⁄—∂µm≠õkv⁄·∂π6“	ºC!Z·QòdJ…ä∞X¨ë+<NCiW«QªMb\"¥¿ƒÌ*Ã5o#ôdÏv\\¨¬%ÅZAÙ¸ˆ#ó∞g+≠Ö•>m±cë˘É[óüPıvrÅÊsêˆ\r¶ZUÕƒs≥Ω/“ÍH¥rñ¬Ê%Ü)òN∆ìqüGXU∞+)6\ráû*´í<™7\rcpﬁ;ç¡\0 9Cx‰†ÉË0åCÊ2Ñ ﬁ2éa:#c®‡8AP‡·	cº2+d\"˝ÑÇîô%eí_!åy«!mõã*πT⁄§%BrŸ ©ÚÑ9´j∫≤Ñê≠S&≥%hiTÂ-%¢™«,:…§%»@•5…Qb¸<Ã≥^á&	Ÿ\\™àz–…Î\" √7â2îÁ°Jä&Yπ‚ “9¬d(°ÑT7P43CPÉ(:£pÊ4çÙîRù HR@Õ7LÛxñ§hÏn®≤˙ñÀæ©ã;êéª¶Ú§Ãú«YIÏ“G'§≥2B∞%v˝TÆ	^ü\"√#…O@HKc>∂Cì’§;Êª@PHÖ° glÜ¨cÚ…ÍXÃiNé†+L!L¬t\n;˙≤◊Ï	rÎêâ⁄BUKQÙÄì#±§§ß¶Û~X∆—qRé¶ãM3ø∂ìÆ∞ñÃõ\0ló…≤√Å”W;\\Ü™%äﬂ+ƒ,óè∞âƒÍüŸVc<ÄdıF@‚J…˚;ê—∞\$	–ö&áBò¶cŒå<ã°h⁄6Ö£ …~ÕÉ\\•xà9Éc`Ÿ\$•¨õ´®<ô%I\nÏàÊ…Ê∞ÃmÆ÷±V€~\"Æ¨ı#@£…K∏⁄FWäDF(Vc˙A&ƒPÛëïI+≈[4á7N{@\\÷ã.:‘‘xûæAoL˛¯£o¸\rrèpº=áƒ¥I+ı∆∑úz∫‰ÅB¶)¡\0Ë7çtéÍÇ<◊Zù(°¡wF∞ÏµΩ^Üó)ñqÿY≤fÔ“\"%RK©8•bKöˆ†–0¿»ÕC¥õ⁄# ⁄ˆ@·`@1“¥ò…Ñ‡¬\rê 3°–:ÉÄÊÅx/Ã˙Z\n‡ΩHÇÙ,¢¢î\r¿ºËÉè`gÄº0É‚∂ç“≥Fäy¢”nW—p\rÄÅïwÜ≥^1ëU	@ÿùí‘`XAo¶ »C ô´á\$)I·+r¬oT\";~/Õ˙øwÚ˛ﬂÎˇÄ0;¿Xê8.ÅP2	®Â §†î(`˘å/§pIYS\"n™cäƒ]Q∆\rx‡÷®HU⁄0ç%……0ÍC»ãe Ë¿ê£\"£Hr«Sÿô´BóÕ\"fœi\n«T® ·§6¿@ê†p@Ô|9– ±ÉfR…Ü0∆Üòf≤x6Œ{\$–iÅ°€Ñ(†%3Î~œº7A¬D~Oá\rà;≤ÔUJ‚Eƒ!0eÉ!X!4*ì1,7@†Ç3è‰ÓAß\0 …@((`•ÁVe€&úÔÿ±Ä‘¨Xíe€@êi=j3 y˛àP CAΩLyjÂ9 K©°‚∏¥¯ç≈cò0ì>ä2Å%∞ °OÃ9¢9_Hê,ªBá∞8TDâ0rX¡‹4ê«/8gr}\nRß÷_e9K»ê&ö‚—˙ej§Ã¨£ÜËA1S6âY‚•ÊV°b,â1ÿ¬M£voQ√∞	\$h<ÜÍÖCJ∆CdmH¨iwBü∞q®ad_\$W~©Ü9jÑÂÌ\nDt°ô%Çô£É(d-ê‚ã\"Zm\"#†,v™íÑ¿T]`b)≤Bcåu»˙f\$ïn9:ò ‚JYi\$ÏBB√Ëß¨—\nyÜ≈769Œ~ã\n=≥â(ØÄ¶Beí&ÀÆMÇj\nÛú¡Rp√»DÌ}»<7µ«®åSí‰ou∆yÊ+Á¢@Ò/^«5xIìo¨8˚#jP\"MﬁJˆPÒ’vGyÆ˙• à¸ê‘{»À[]º˜ËÄﬂ¬òÔÔzœGf¶∑<™I-’Öi6–ì÷êlu˙õµM „È\\á2\$˝≤v ëÇ®T¿¥,sxÏ0	<4‰íÏôã˛‰Òâ¶ªÊÌ_b<’]˘'UËı®í¥Ñ∞åy8ƒÂb'#µW’S…)–ŒüRtÿÍú…ˆ¿¸HeÚWÑ1J79mΩ™öüÉj˚\$lVÄ¥YÆU„;Àè∑9P]Tm!˘+<ÀÌŒ«ıBxùèŒóA4ò±∞bI†≠9ÒÕ∑dÚìr¬˛S∆ì‹qbÀcFñj˝ÍdxÇ¥àuF3á·)6‚Vi1©î]¶8˚úJj—ÖàtŒ¸∆Ø2n∑µ≥\"∆OM‰ÏÁíŸa ";break;case"fi":$g="O6NÜ≥xÄÏa9L#Pî\\33`¢°§ d7úŒÜÛÄ iÉÕ&HÈ∞√\$:GNaÿ l4õep(¶u:úç&Ëî≤`t:DH¥b4oÇA˘‡îÊBö≈bÒò‹v?KöÖÄ°Äƒd3\rF√q¿‰t<ö\rL5 *Xk:úß+dÏ ndì©∞Íj0ÕIßZA¨¬a\r';e≤Û ùK≠jI©Nw}ìG§¯\r,“k2ùh´©ÿ”@∆©(v√•≤Üaæùp1Iı‹›à*mM€qzaÅ«M∏C^¬m≈ vÜ»Ó;æòcö„ûÑÂáÉÚ˘¶ËPëF±∏¥¿K∂u∂“©∏÷n7ùÁó3ëºÂ5\"p&#T@å£ò@¯àí‚8>–*V9écªÏ2&ØAHı5√Pﬁîßaú§√‘€£XÊ‰∂jíåç©i„82°Pcf&Æn(”@è;“‘åöx¥#ÉN	√™d˙éÄP†“Ω0|0≥Ï@Ñùµ)”∏º\n—ä„(ﬁôâ”\"1o€:ß)cí<€åS˚CP <ãºF¶i®ò:†SàŸØ##N˚\r1¥'GIç)•èË¬€º„H‰¿£ Í		cdû»Ê<µ√]H(.‚Óƒ\n£¨F°¢  ÜåçxÏ:Å!-Zî’Ï@÷<πår>Å®\\u¯cJ5[œ”…cî&CÕ<ıUäPÛpë&Ct|2Ub≤X”∫©∞[#Tò∂\r ÿ…ÅB”r±#Mú2†LM»Å1¡*%r\rfmp(ç4¢5√eÁ8®»]XﬁÂ —|ﬂj†”\\8<‡¿P‹ıRÇ@t&â°–¶)ÅCÄ‡8°p∂;e∞∫[I˚¸î1d∫ ñ3…É∏®â4\\öä	b]ùQ¥{aIÍ3vç4X@6©âJ<8-ä`‹‰é£sE©Dníÿ˜SÌÇÇ‰Si“–ç-Å`@§£ÏÍql<Zueß≤Ì2∏/ eÉ±Zjy®\r⁄êÀ™ö∂±≠4hì‘Ï3E!1cŒÕM={Vÿ4Ì‘ç˛ÔCUkë≠n…ÊÒ≠Ôyer¶k≤x!äbêå†Ôá¡«Ö^çTˆÖ4O4Ê^rj*œcù=«l}TS´£C®“®ç\\D”eLùå·\0Ç2sÎû‘1ŒâÊàË–9£0z\r\n\0‡9áAx^;˛ÅrOÓæÔ∞ŒÆ·z0m !L‡à?ÛÄˆ‡/ ¯öÑóö‡H)\rÀï¿µìDÂõ\në(MºôºSàr°ÕD¬CxU—Zg5\$ÑòüÿHÌ_( |Ô•ıæ–Ë˚ﬂãÛ~Ø‹ª?ê‰˛ﬂÍoN!π9ÜËSÅTBÊÑî¿òõAj\\\rÈ¯ârÜMdã\nùL©∞Ï[œP9Pë≤ÇßëIXVÜêÈäEre¢ÂÑ1¿x‹¿là2Ç‰û©	\"ÒÃ3B√aòæÇˆ–ÃxÅ†°«(HLÅ\0c}a¿¥–ÿùL|é0Ë|›™cîM;å(i‡†¢@@@PCíçFƒAN&h¨G’Ú†◊0§4»0∂PÜ’É,u{Çá\"Ê(gêh 9Db–ég0¯ërjù:9Ü-õ<u@‰	Sè@π«Ÿ∞GCô+ë Å…9‹µç~Ö»89*–ÓHcíá 3æÿ˜g¥ô6UórÄEâ‰\$úmÈ3ì⁄]Cùç•–’+ÉN≈®K?§©ÄÏGi5	FpÄ†VÓ√@ßÆçG‡Ú\\\n˙{Or¢F‘ÀÍ5bíö¢5^ùósN®‰ê\0û¬†-fh∂Q«j(Å∂5Ã¿é°Ü◊Hœ‘sTúé¶BÉ0i‰‰ëI“àT ;?eÑäóz√RﬂA<\naD&3¬äU\n` ¡P(ßDÿöëæ(1NxEdFP\"±+%§ºòíÚRTUJxè«ÖÇBwföpå>è–˚>E,»eLáD÷YÁÑy√xhOœ4ê7:ﬁ™ê!.ÿ€9ZÁUE°^TªÃd∫Y∑}Ìàé“jPp⁄ŸáDH1\"k\0é—Ω7+d*ÖG^\"âÑ(–ΩV	ü*–∫ÓxJ≈VÃÛ]bÌqQ6¯´\nNi 'Ê ¡ö#K∏ev%õW⁄º)√0¶A!CUÇé)áCÑÌÎ†h√\r”TÁ¨ı÷*»ùè—%qq¥ˇ‚]âJã&Ã=Iök*Í≠ÅJ(/ÚÃ˚Ÿy≠!ée∑·\"Ñ¥ˆS0d‡° *I:±#Ì\\5Ê≈CbÇñ9-∑ı©#∆DK`";break;case"fr":$g="√Eß1iÿﬁu9àfSë–¬i7\n¢ë\0¸%Ã¬ò(ím8Œg3IàÿeÊôæIƒcIå–iÜÅD√Çi6Lç¶ƒ∞√22@ÊsYº2:JeSô\ntLîM&”ÉêÇ† àPs±ÜLeùCà»f4çÜ„Å»(Ïi§Ç•∆ì<Bé\n ùLgSt¢gùMÊCL“7ÿjìñ?É7Y3ô‘Ÿ:Nä–xI∏Na;OBÅÜ'Ñô,fì§&BuÆõLßK°Ü††ıÿ^Û\rfìŒà¶Ï≠ÙÁΩ9πg!uz¢c7õéë¨√'åÌˆz\\ŒÆÓ¡ë…Âkß⁄nÒÛM<¸ÆÎµ“3å0æå‹3ª†P™Ìçèõ*ç√X‹7éÏ ±∫ÄPà0∞ÌrP2\rÍT®≥£ÇBÜµçpÊ;•√#D2é™N’é∞\$ÆçÅ;	©C(Å2#K≤Ñ™ä∫≤¶+äÚäÁ≠\0PÜ4&\\¬£¢†Ú8)QjÄ˘¬ëC¢'\r„hƒ £∞öÎD¨2ÅB¸4ÀÄP§Œ£ÍÏú≤…¨Iƒ%*,·®% ‹‰*hL˚=∆—¬I™ÔöéòdK¡+@QpÁ*∑\0S®©1\nG20#§ƒÌ1©¨)>Ì>Ì´U≤÷!ä\nÌLí¿Í‘çÅ&62o∞Ëãåì‡∆ÅÄHK^çı˚vé†„Hæ jÑÅù†ÕC*lÜZÓãLñCÚ¯ﬁaó P®9+â⁄X⁄Sï˝H\nuΩ¨çÃ+¢!∏w  6BS ¶:çMÿ(\r&PÖ°.¬Åºh0Ú«ÿatëå#:PûŒåú˝Ö2auÖ^·Ùû%A;U±R:b√(›å#öt°‡Û˚Ó\$	–ö&áBò¶\rCP^6ç°x∂0Ë∫¿?*b`ÿ%.»‹…·˚¢—°±UEÃ)s^æ0©–¶Ü54®à…ªåmu‹cx‡©!ZV«‰I≤¶abΩàam[~Auú⁄:•##=cé‚çlª=3∞∞™.Ÿ∞\ryRÅÓH'∫÷ŒÚ‘Õ€ÓˇÜçºù\nÉx◊ì¶)œ:À©.®≠EMS5ìaZ:≤ó\r¨Ú ßLfÉM\0CqIJ3O®B 3Ñ…Œﬁ[ñ¬í)*Ëxûç®ÃÑCCx8a–^éˇ(\\0˘ËÇró·~L√˝‡ÑA˜„Qø·‡^0á⁄◊\$©pM\r1π5◊bj»3QM yì*ÑÇ›‹ª{GÃ87©ÇPkTÿ '®⁄±Ru^∫a{OqÔG¿¯ü#Ê}Aıá'⁄˚‘+&P·π˙@|G√Ç∏*Ë’?ß¯LIËmNé5Lß∞¬M ô&FT7(.´[Ù\rDË§†ª#ˆvÕJ0)AÕˇ®áàƒ◊R´Ë®(ûû@r7Jˆ#ê\"∫gCaòœﬁ_LÃcSƒ˘1¿¬nàQï)*Ä£≤£§ç·î\0,%çY®\0`ëôR)Ú!∂¿†Å®xó2GBAAT\"ÜòØò¿ÊHCq%9)µ.£˛OÉy¨\\Ö‹ì±%z∑HIÛoV\rQ4èÅäÅTØ⁄„C´Lt	à ñOe9˚%B>M0‹jöDhîrnMòq|{—î√G–∆õ¢‰Aijfî2äÓCkh=ƒÄßúÚRd‡¡íÉ‡Å◊≈DWÉ®gáÖuÆ¿“ I•4Ê§’¡Ü.√À8©| áí‘—§ÿóO:&‰Q⁄±3UÆ â¡v\"ëB#Jn\0Ä(¶	Òcl·ú97‚í Åk!ë≈√V	È?ä≤I§ØVAËÅÆ †PÇéïõB{ç¯◊ì÷¬M5ò fKÖDi\radvRl6˜–L  ¶Ñà•ï≤`¬àLD%t#I2y°í)KË≈nI“`Rh—Ø%p95‘\":∑W06\r2)=&êÚ‰àP|ùÿëSï’çb¢¶\n¬h∆l≠äáp6#XÊ,D'‘'L6—Yñ(»ÿ∞m1jÖå±∂Ef k *6nŒ€FRNÇb\rÄ¨1†Z,ÏåÈ]í.Æ®tamôé∞Â(≠–‰lCxi5,Ñaµ9ö…é¿d3â¯P®Åh8µjıÜsf≠ÖúØ§6e[k⁄ìÂ‹æ%ÄñﬂI>N°¡\"\$âÂLœ¢O[œ'“8≈YÂDº\0U‚!åŸ±Óó∫™2 *Ÿ`‰§™a(@Æêa’BCa7ˆÈ£vóÓa∏∏	\"r‘TÀÒir}#cF\$Æó˝'¬\$2T∞#*öå·û4	¯Ì∞Àÿ÷-ˆ uvŸuﬁ©1ÿeÃ§j º§:›1¯óù0∂VÀö∞D\$√õ≈#ÇfSAZß‚≥ZWpë˙E†";break;case"gl":$g="E9ùjÃ g:úç„Pî\\33AAD„y∏@√TàÛô§ƒl2à\r&ÿŸ»Ëa9\r‚1§∆h2öaB‡Q<A'6òXkY∂xë Ãílæc\nçNF”I–“dï∆1\0îÊBöM®≥	î¨›h,–@\nFC1†‘l7AF#Ç∫\n7úç4u÷&e7B\r∆Éﬁb7òfÑS%6P\n\$õ†◊£ïˇ√]EéFSô‘Ÿ'®M\"ëc¶r5z;d‰jQÖ0òŒá[©§ı(∞¿p∞% ¬\n# ò˛	Àá)ÉA`ÁYïá'7T8N6‚Bi…Rπ∞hGcK¿·z&Q\nÚr«ì;ç˘TÁè*õçuÛºZï\n9MÜ=”í®4 ¯ËÇé£ÇKéÊ9éÎ»»ö\n X0é–êÍ‰é¨\n·ék“≤CIÜY≤J®Ê¨•âr∏§*ƒ4¨â†Ü0®m¯®4£pÍÜñç {Zççâ\\.Í\r/ úÃ\r™R8?i:¬\rÀ~!;	Dä\nC*Ü(ﬂ\$éÉëÜV∑‚\$`0£È\n¨ï%,–êD”d‚±DÍ+ÅOSt9ÅLböºÅOtàÚh¨√J£`Bç√+d«ä\nRsFåjP@1¢¥sA#\r™¬êI#pËÚ£ @1-(R‘ıK8#†Ræ7A jÑÅùpº∞∏∆«¢™¢\r¶Æ4‹ âìòÔà#«DÄP¶2§täæ≤¢*r’IÉ( ≥µ» åÉƒ3QœÇ(‹‘±ı`Àmçã\r÷4∆Éx]U‘◊x¬’C¨ÿ®Oœ)B@ê	¢ht)ä`P»2„h⁄ãc,0ã∂ï©GYË´p·›\0S> ¥iªMLQ™GZZcìR®2¥ä^‹ »ÓWnß(ÌÎªÃ–©§9D_ïÖâEü*BØ”Ã´S)ÉpÎQÅ\"%ıù`4Aü™öUhπÌE§ËòïÈ’f£©…b†ﬁ5È¬¶)⁄0ÏÅçë\\][πZê™õ:U?çj†ñ/#k=+^¿Ve(¬Èö⁄∂Pãï*Fö\nå#Âå–≤:¿Ñ&¢•hπB:°•!„\n43c0z\r†Ë8a–^é˝Ë]tÔ Ú3ÖÏ\0^®/™r*ÑA˜ê˛=a‡^0á—îh:”®A…≥úÆäí¬p™Rÿ“ÆÀ≥≈E—Æ≠;±g¡7ç~2{xÎΩı“ácŸˆΩørÓ›Ëww·ë‡ÇÁÜÒCs≈CÊ;@êDUÅI\$äÅ§='®JÅ>*ç√¶¥zöïH%\$•û&|YV˙rå≠Pƒ”å·'%&1£á·0{f…kÇ\0Ójóå/ÑéÑ••ß∂ç)»{\nUÜc<g;¯¶ÜÇoèzIRÊl°™%Ë√%Dy:πR&z–…Ñ*h*2@«*áBÄH\n7†tiAV&‰ﬁ4`F…Ÿ\$»ä©BúÈÓ5\$Ä3ƒdœÍ{a± át¥å¢·ÄYÎÌÇÑÜ„/~ ]Cáÿ#Ÿÿn‚Öº∞rRé∫rh%J¥hÆu√ppjfπ†”çÉB*É!§3ªUNHC§:WÓD≈áá SÃ)^I	*ìÚÇŸU˘\$GÍH¶£‰Nâ)»Q	Í®M*&&ãM≥¸Ω\n2˝7E\$ß,ˆV–â!%nòÏ)f}=√ÇéçPƒ¬á	¨_RcÖé<)ÖFÄŒW£áÁ¢|ÕÙ≤˝\rªÉçl˛QŒi–‰£ÒõáÅŸ\r¥*KHAËû»íu8‡ﬁP·PuÜ§•¢íåWA\0S\n!1≤—3ƒM√	9'd≠øPå#ô◊õDò∫¥©Ûõ/PºµÏr[D\\D–&““Qjº˙SÎΩü8”\"d”ëÉntÚ¨MuZë!Ñ3)•ÍΩÎçd\\R ∫®˘\\¢”laçºÜ8Ëå‹§âî¡Ù\\sÍj(+eï∆0‚I\r%*`∆îUÎ)∞U\nÅÉÇ©âhl0§é;:Òj\rTlµÖ‰– £DTH 9êDÑÉ-V:∂ŸÜ7¶\$U€:Kå}0R≥Â£•Ö®lN¬|KF8 ûÍ@ﬁC8aS‹™]:VE¨t´÷y6ñ@AbÀÀ÷Wdîì·Bå(⁄KFw¨Ò °AÕ˘ò3ÂÁ”?g‘ƒ™é”¢õTæ02\ncV˙34Ç∂Ëxé∆V	a5z’˘)dµß√|ü°á∏Åÿßƒfã@";break;case"he":$g="◊J5“\rtËÇ◊U@ …∫aÆïk•«‡°(∏ff¡P∫âÆúÉ™†–<=ØR¡î\rt€]SÄF“Rdú~ûk…T-tÀ^q Å¶`“zÅ\0ß2nI&îA®-yZV\r%ûœS†°`(`1∆ÉQ∞‹p9ç™'ìò‹‚Kµ&cu4¸£ƒQ∏ı™ ößK*çu\rŒ◊uóIØ–å4˜ MH„ñ©|ıíúBjsåº¬=5ñ‚.Û§-çÀÛçuF¶}äÉD 3â~G=¨ì`1:µF∆9¥kÌ®ò)\\˜âàN5∫ÙΩ≥§ò«%ù†(™n5õçÁspÄ r9ŒB‡Q¬t0òå'3(Ä»o2úƒ£§dÍp8xæßYÃÓÒè\"O§©{JÈ!\ryRÖ†Ói&õ£àJ ù∫\n“îç'*ÅÆî√* ∂¢-¬ ”ØH⁄và&j∏\n‘A\n7tÅÆ.|ó£ƒ¢6Ü'©\\hû-,Jˆk≈(;íÜ∆)àà4éoHÿˆ©aƒÔ\r“t†˘Jrà <É(‹9ç#|ø2ã[W!£ÀÉÇ◊ ±[®óDÀZvúGPåBÜ1rÑπ≥¬ÜkîÕz{	1Üª°ì48£\$Ñ∆M\n6†A bÑÅù0£nk†T«l9-˝√∞)öç∫Ja¿nkñö¢ÄDè≠°“6™±\$Ç6í°î,◊–3T+S%È.äQ»‚ ö’…ØZ UΩF¡Ÿ1	*ç•®Úˆ\$	–ö&áBò¶cÕ‘<ã°h⁄6Ö£ …P÷ITà8∞¯‰:\rå{&ÖHì\"˚\\µOPJVÑîË⁄zΩ5êÇzö≈IZwá∞lÍ[|ßp:Vñ€\$®X©0xé†’tF†…≠K!‰	¥Å°àsõiai5ÚN‰lMîª\$ŒÅBÉ%ËÅ\"¿œsºDÑ2T\n@ûπ≥≠ö¿4Ö!ah¬2\r£H‹Ô‰ëˆâ¢x0Ñ@‰2å¡ËD4É†‡9áAx^;Ôv∑ÆÎÔƒ3ÖÚ^˜ £§¬7·|ò!,Y:„}!3kNú1\nV¥ôÍ±N”Ó\"‰\$Ûãå◊⁄Möù°ÕÌ\r\"![>”µÌª~„πÓªæÛΩÎŒ¯]ø<D∑.À¸?•ÒzJJƒPâŸG»rYNdúasˇ6‹‰ñìO§~' [P∏ésâÌØÔ0P:ù•¯0®4=£«√LA\0Ó4çÉ`@1=£Éæèm™80Üd∫è∞cgƒ9Ü`Í˛É`oÌy˚êË=©6\0∆⁄√\"^p¡Ñ64]3Õ‚å◊€\nÖ \n (\0PR¡I¶TÏ!¶&æ¸⁄gÉ!º\0‰C≥¯°ûƒSÙ|íaÛ\rÁ÷AÔ\0–áI©§∫\$Úÿ…ôC≈m˜ùÛ€[@s?ê,AH5CppßÏ˛ü‰£É∏h\r!é5–Œ‹ŸÌç·å0áSÿÄà	3[…¸ú#\\@Iz‘u&ºµ#¿\\Éb!DpôìUÆ@…K0…¥†=ô6∂Y∫ìOpÑ∏Ô`A_Êÿûí÷ ü…‹atg4ê0XtùI√ﬂDNíeØ0Vô<^“°¨Ö\0û¬§ó#Ñîáâ@ˆL¡kZIZô)ä˜fƒúô1|ÄŸD`‘◊1‰uW¥ƒ2∞KZm ¥#HjIàñëéê€dõS°âa-’`…¡ÕaØë\$–vT`ò5Q^n\rsNbai»Ö2«^¢'ç%ÓqmìöJ_òr@≠?ú“z†Vë%©¯€ò≥l_X€/å»ß¥d6ıãYùì3höÊÅh8Yçç5÷0C≤Ù-l …2àΩôâDßtŸ8ìYÎÀ˘ÅìH‘≠Œ ∏Çz@Ö≠¢∫2äíIkÍ1(Òô^Øî◊#î‡›‚<b ¯§,d¬:ÙdCàÖßf¨IòedI®â-ZÌ\$à(¸^ËımO*ÌX§ö K…i–å9@+ITÎØ≠S\"m†:¨ëî-ØN∂hì\$:\\Èà";break;case"hu":$g="B4ûéÜÛòÄƒe7å£Pî\\33\r¨5	Ãﬁd8NF0Q8 m¶C|ÄÃe6kiL “ 0à—CT§\\\n ƒå'ÉLMBl4¡fj¨MRr2ùX)\no9°ÕD©±Ü©:OFì\\‹@\nFC1†‘l7AL5Â Ê\nçLîìLt“n1¡eJ∞√7)û£F≥)Œ\n!aOL5— ÌxÇõL¶sT¢√Vù\rñ*DAq2Qç«ôπdﬁu'c-Lﬁ 8ç'cI≥'ÖêÎŒß!Ü≥!4Pd&ÈñnMÑJï6˛Aªï´¡pÿ<W>do6NõË°Ã¬\nÊı∫\"a´}≈c1≈=]‹Œ\n*JŒUn\\tÛ(;â1∫(6B®‹5ç√xÓ73„ê‰7éI∏àﬂ8è„Zí7*î9∑cÑ•‡Ê;¡É\"n˝øØ˚Ãò–R•†£X“¨éL´Áéäzdö\rÅË¨´jË¿•mcﬁ#%\rTJüòeö^ï£ÄÍ∑»⁄à¢Dê<cH»Œ±∫(Ÿ-‚Cˇ\$èM#å©*íŸ;‚\"Ç‚6—`A3„t‡÷©ìòÂ9£¬≤7cHﬂ@&‚bÇÌ«Ï‰¬Fr‰à6H√”˝\$`Pîî0“Kî*„É¢£kË¬C–@9\"íôÜM\rI\nÆ¨¿(»É&É†YVä%m\\U®˚≠(¡pHX¡à%Æ#ù?^î#ê–ÏG`ƒò©rÊ≈æ£\\´#£¿bñ-cmq	mõ˛˛ NÌ@ç£jQ„…M>6àŒ<ÅBºÅçâÛGe≠ÉeÓ˙◊-·yG)@◊Çåç`][÷xU‚⁄≥„f^`ÿñ(œ·x∆àb@P⁄Ç\\RLíÄt6 bÿÛôè\"Ë\\6Ö√#‡0éNÿÿíÅIK”5„Z7å√2ÄÖ0SX«]/•<˙äÉ{_x¥a\0Î@£∆¬éc0ÎÁ„:Ó9Öâ‰<¶=Â.Í]f6Æ„™≤aJnaë#êÏ´¥uÇbò§#&’Ç3	Qf^!Yº£íb0‘◊#Ê0√Q¨~ÆY°]©:)∏®’@jÈ'Ω¡\0Ç–ÆË÷“1–t\nÁ=áâà–§¡ËD4É†‡9áAx^;˘uÌ∫!Pl3ÖË@^íN√•7·}Í7œpxå!Ûè≠çc\$Ö)M∞’/éõK*€9’%LÉºÖ–’À8Ô‰`ÿC—\0‰≈C¿p\r%!rj]„æx	‚<gêﬁS∞y†πÁΩ∞üS˙ÅPod¶‡íCÅ∂|·—Ôæ‰då—7\$Ë¬^l”X9(ÿ6æGÃB\nHe@êË7Ü¿ı—YÂ»´ùí¥k(lÑ 7ìå|Ÿ0oYAÇ\0ÓmQÀÙ#!»3 √\$¨√fhaØ6ƒŸ{fA\\ÕZwåê p‰Üê¬ô7	≈‹º∫\$^FëíÌ>±Ï»ıˆ∆J∫“3ÜxΩ≤v‹@ﬁ \n (G‰a N∞()à¨9ëÚn‘\nän¥Åõdm\r¥CVhiûêSÑÖâÄlg·‹π7∂˙ﬂ≈KÅ2»!{‡ﬁèù9qÖƒòá4:◊·r3F¥ª§‰8ˇQV8!å4 “ﬁËç—»0§¯ûNWâ<'≈\0»ï£:¶Rêo)Jp£ïò\ní	(nfLœò#“,&·\$àáìN\"Z5»\\Ñ+34pä@q¶•dH{Ã#Qπ6'N¬C±\r”ƒrEÉY0íA<)ÖB`oC†!pã8[≥sÉú`T“Ù•bêrüh ¡ÜCü·lπ£r Á¸´ì∫Áö\$‹AÌüØjD¶∏ \naD&#jkM°1¡RJÜµ°Ö‘6áÇ	:ﬂà“6ß°WePK)9≠hÊáúfY*yÆg°Lò⁄vM’≈{ë%‹¨º'`U}l∞g8§£V?`ä=Ñ±≤|:0WEÉHc§1Tò”∞ŸB·['†!ô∂\"Ún™πIÂ)˙7™0-	’⁄P‹Ï≥\"…Ïû ¬ˆ+˚∑uÇﬂ˚ÇÆ.ΩCwøë“>HI%èÕ¸üÆ√∑i{/©Xp”i\0Qy%t∏Ñ%¿§ßc\r*hÈ®≥™~óbì`‘äˆ®…AN\r;ãx≈ëY÷`êDâ9TÑâã2I]À⁄Œ+L=(PﬂSô9H†@Ãmèyÿ7®ªÖú•FñgLÇöDv≠Q€¡'~‰ ÀÖã±iÎ2—Lπ,≤¨,–(zT\rÄ®?qRAYk4Òì¥∏Z◊\r«¿ä”æÃ3?ØbJÃ¢Ø±œ†";break;case"id":$g="A7\"…Ñ÷i7¡BQpÃÃ 9ÇäÜò¨A8NÇiî‹g:«ÃÊ@Äƒe9Ã'1p(Ñe9òNRiD®Á0«‚ÊìIÍ*70#dê@%9ê•≤˘L¨@täA®P)l¥`1∆ÉQ∞‹p9ÕÁ3||+6bUµt0…Õí“úÜ°f)öNfìÖ◊©¿ÃS+‘¥≤o:à\r±î@n7à#Iÿ“l2ôÊ¸â‘·:céÜã’>„ò∫M±ìp*Û´ú≈ˆ4Sq®Îéõè7hAü]™÷l®7ª›˜c' ˆ˚£ªΩ'¨DÖ\$ïÛHÚ4‰U7Úz†‰o9KHë´åØd7ÊÚ≥ûx·Ëç∆Ng3ø†»ñ∫Cì¶\$s∫·å**JòéåH 5ém‹Ω®Èb\\ö©œ™í≠À†Ë ,¬R<“éœπ®\0Œï\"IÃO∏A\0ÓÉA©r¬BSèª¬8 7£∞˙‘\"/M;§@@èH–¨íô…(Ò	/k,,ıåÀÄ‰£ “:=\0P°Erµ	©XÍ5ÅSKÍãD£ê⁄ú£“‡›!\$…êÍÖåâ4æÊè)Ä»A bÑÅùÅBq/#â Í5¢®‰€ØŒ∫‡à¢h12„H–◊£ê 6O[)é£ ÎT	ÉV4¿MhóZ5S‚!R‘È†‰≈ØcbvÉ≤ÉjZÒ∫\"@t&â°–¶)ÅBÿÛiè\"ËZ6ç°h»2TJJ–9£d>0ÏJd«\r„0Ã¥ç√*Ëî1≤ÿóSé©í\$7≤3õt\$/®∆1¶òÕWÑ`ﬁ3°òXßéC Ñë°\"œ£j€å°@Ê•¢†ﬁ5£¡\0Ü)äB2û∂\"	 \\Vˆ-¯⁄·\0ÃÙ\rµ}h••.deÍÙ¢L[¬õÊiõ™ﬁÑ…ã]£ñ1 »¢Pà—S¡ËD4É†‡9áAx^;ÏÅrá¶%s–3ÖË^¯@ Ç ÑAˆ‡ç7°‡^0á◊|(≈åK÷`¿ÙåﬂÇå8B[74)õÙ˛?“X8VÉ+ˇ™j⁄∆µÆk€≈≤˚6ñÑm;^⁄7m≤ö=*ıê	-[0‹éõ÷˘'H#@ﬂ>ÃéAâ?)EÙèèT÷ê§n`4±S“o\r#6:41√«π(#ª/a\$ÏíQ¢£≥Ë√,Íwˆ\0˝‡v\rÑ{2˙J—±…ä:u0…‚\r0L,\"¬ßòTnKèı’º¿†Å8'IyW¢t\n\n@)d™(“ ª^ªHw¶L ôs2Âåë¯&Êî˘î ÿ¡Éªñ%°∏\0Tâàhzd†«R»À\0bE¯C≥®~I[êIÙ;ö@∆IX∞gkÑ–ßΩGËN™ÓTàmÇÜW∑√®mA@ÅKî‰ÊÑ\rTYÅL≈/“~NYZ@h4Ü≤ÄÖIhI!·‰ƒ¥˚	CôwÜêõ™`‚IÅ«ú6¥óF”bk!l<ƒ‘H‚bëÎ.\0Ä(¶\ny((¨¯ö“À*.yãÄ°úI<û'jò5ïXÉpf\r\$Å!Bêa£®c6&yÉ2ÑüôàS\n!1ôA‡@eàF\nê\$úß”Ä~2êÑAx6îÏûC:XIx≈ùGˆùÃ¢æõDÓT'†“KB,‡\r)\"lí∂vóé!|(µä\$π’&Cí%Gä^(‘>\\ã\r!åãY~êLÄ3Ñq›Ωó…hFòÃ’ƒ∆\"B†F†‚{5ºGÁ¢}0fPõŒ’ÇNÊ{@Ó%÷,∑ç1rM¥43ênU)!AISŒ‡}Sπ–;h7ô5\$QU›AGÖª&≤8âÉ©É\$°∏ÀÜòB'8\n	Åæ_”–{œeZ´î|ﬂ\"äæÄSç ∆ë-Ö5È?j¡WTåΩÂN^ªñT≠OÁ˘±>ÈmGNHQï1TË∂ôzHwÍê \rHå9Ä";break;case"it":$g="S4òŒß#x¸%Ã¬ò(Üa9@L&”)∏Ëo¶¡ò“l2à\r∆ÛpÇ\"u9òÕ1qp(òaåöbÜ„ô¶I!6òNsYÃf7è»XjÅ\0îÊBñícëÈäH 2ÕNgC,∂Z0åÜcA®ÿn8Çé«S|\\oàôÕ&„ÄNå&(‹ÇZM7ô\r1„ÑIöb2ìMæ¢s:€\$∆ì9ÜZY7ùDÉ	⁄C#\"'j	û¢ ãàß!Ü©†4NzùÿS∂ùØ€f † 1…ñ≥Æœc0ê⁄Œx-T´E%∂ù ö¸≠¨Œ\n\"õ&VªÒ3ùΩNw‚©∏◊#;…pPCî¥â¶πŒ§&C~~FtÜhŒèÅ¬ts;⁄íﬁ‘√ò#Cbö®™â¢l7\r*(Ê§©j\n†©4ÎQÜP%¢õîÁ\r(*\r#Ñç#–Cvå≠£`N:¿™¢ﬁ:¢ààÛÆM∫–øN§\\)±Pé2çË§.øçSZê®¡–®-Éõ\"»Ú( <@©™I•ÕTT\"ØH∏‰Ï≈0–†˚ø#ê»1B*›Ø£‘\r	Éz‘íér7L–ú≤»¬62¶k0J2Ú™3˝A™ PÛD§`PHÖ· gHÜ(sæ¨Î‹8é∞–ü1:í®⁄ï√B‘õµÛ›N∂:jrè≈Îû3≥√¢Ã ¿C+›Ø„s8øP√-\\0£·◊_ÆAu@XUz9cç-2™(“v7ÅB@ê	¢ht)ä`P»2„h⁄ãcÕ‘<ã†P¨’7ÆêÙ=@\r3\n69@S …\"	ﬁ3ŒîÈ\n∞L¥∂\"∞êÿﬁåNcÀéƒc3®‡Ÿ78Ac@9a√µÿ…-\rQç”0P9Ö)h®7çh®@!äbêåß\$≠ì§ˆ¡qh&b`àåmL«;,\$b2‡»Ëﬁ∆- KàbVæT ;ÕXÕ#•p@ åô#çi…™49‚`4Z@z\r∞‡9áAx^;ÓÅu´Ø<´@Œ¢°{ÿ∂7i ^€˝Ï7·‡^0áÿ\"w5°ãË…8–√3\"»ê‰ö¶)7ÆÈ“©≤>…‹√fˆ“˝Ïª>“3m{hÈ∑Ó;ûÎª≠l]ΩoÉv˘(\"≤ó|(¡í6é	˚≈qêPA\rÀAÜ9må˙ŒCËã%¢bB·ÒÈ\$>2œ,√¡\$+ö>ï⁄Zü“1)(Óè£ã£2¡j„í)@#7F|Xãb†Åã¶@¸√†h5|âí∆Í”:—\râQÑ%ÇIpm'\rÃòbv…ÚπAYÒ\0†ÅÒÃ9#N\n\n0)&!Ã˘†ÄƒPIhC\$â—¯5£BfÉIú\$y@B¿ËjÕQN>î7áp ~»t\r…®∂¡ÇûÕÉI}Õ•c≤a\rd0-êáPfS˙ÄÊ•†ºÛ€T	!Å09Àú6TA!Z	/Ø 4≥ê†`àÈï-•&u˙ÇäI&Dò®ﬁC™ÄÅ1%¥©ƒGH mkmu‹∂HÊIC8f¢\$üc=√|yDàç_¬`û¬£9\nQdÅ≈ƒ>Ωí0 rÈˆC≥‚b⁄U¥A@Ëí‡Œ@√\n´HâQ}õá¥hûHoZ≤È@ò¿@¬àL(6VÑ`©\n^“Ä&QÎ…Ñ{\$ì%ßE>&tÙtô!¶tAÂNÈt≠	∞rpŒv'–ﬁëNƒ%Ö¸é6+à√aJ«ë,…ÍEù\0	)F,ƒ/â‰nùåkáõ≤Zñ#/9A∞ œâ«⁄Aøv»K…{sL^è†‡⁄JÉˆdT*`ZAπ/N ñ®b“L'Ù=*£FÛÇÚ*QT`ÑÇeB|\\ã¢&d≈íÇT\\ÄQx/Aò<Æ#ã\$S®\nG˘UòZaX»ìE©Xµ“äﬂLãÌ.yÙƒæHy,T»≈,m/vi(\na\r-`M´TÁ\0§æõÀı&E¯¿:21A®≤~Peò∞ŒÜUI ~<á1uX¬\"5î™¥ø5/VÀ¨r.v≈\r€:µZ™uaØÑH–\"Ç.";break;case"ja":$g="ÂW'›\ncçóÉ/†…ò2-ﬁºOÇÑ¢·ôò@ÁS§ÅN4U∆ÇP«‘ë≈\\}%QGq»B\r[^G0e<	É&„È0Sô8Är©&±ÿ¸Ö#A…PKY}t ú»Q∫\$ÇõIÉ+‹™‘√ï8®ÉB0§È<ÜêÃh5\r«êSùR∫9P®:¢aKI –T\n\n>äúYgn4\nÍ∑T:ShiÍ1zRÇ†xL&à±Œg`¢…ºÍ 4N∆Q∏ﬁ 8ç'cI∞ g2úƒMy‘‡d0ù5áCAßtt0ò∂¬‡Së~ù≠¶9º˛çÜ¶s≠ì=î◊O°\\á£›ıÎï†Ôt\\ãÖmÂät¶Tô•B–™OsW´˜:QP\n£p÷◊„p@2éCêﬁ99Ç#Ç‰å#õX2\rÌÀZ7éÅ\0Êﬂ\\28B#òÔåébB ƒ“>¬h1\\se	 ^ß1RÅeÍLr?h1FÎ†ƒzP »ÒB*ö®è* ;@ëá1.îê%[¢Ø,;Lß§±≠íÁ)K™Ö2˛A…Ç\0MÂÒRrìƒZzJñzKîß12«#ÑÇÆƒeR®õêiYD#Ö|Œ≠N(Ÿ\\#ÂR8ê–Ë·U8NB#å‰∂“HA¿„u8÷*4¯ÂO£√Ñ7cHﬂVD‘\n>\\£ÑE∞d:?êE¸À3ñ«) F™ÑçgDØ‰™%‰`´ñiÈ`\\;á95J®Âõg…ƒ¢tî)ŒMï—txNƒA âÅ˙´÷ ÃNç»Ò:\r[Åà\\wÿjûîÑ·ŒZNiv]úƒ!GGDcCØ\$AmÅêã…J‹‡Q“@ó1¸“vIVºñÂq CóG!tº(%Öb≈πvrd¬9&( FFtêúP›óqJaÍQ%ûg≈˙C-4:b\"sëÂÙ±JSÃˆûœa‘ƒCH¬4-è;Ú.Ö√h⁄É\"©]a»˝|6ÉìH”‰÷\r„0Ã6\r#pÀ)vM◊m#ˆ‚RALÿÄ®7µ„h¬7!\0ÎV£∆‹éc0Í6`ﬁ3Ô£òX›é\\à¬3å;ËA’∑h€æéÆP9Ö.c÷Fú≈l~@ïB¶)’≠élarêƒnëü∫ƒÃ@»Dà@»ÿØ	g%ˇ[\nçL›’\0ÎVç√8@ åù~¸9tc_Våê@@-FÓ3°–:ÉÄÊÅx/“ﬂP@.AaúÜP‹–¢¢ä∫Ç }N}‡Ü|‡Ÿ*#‚‹é7ä QxúÁƒH&%t à)çzÎp§Bq.∏≈£ÕyÔEÈΩPPâ¬TËÄ9¢\$HÅ√¿p\r-›ø7Íª˘oıˇ¿‡,}p(9@»UTU™ºÇ\"¢ÇHmÿ6¿‡È Úûçß7Æ”xpk5Å•†áﬂÉptÑàABA	â1>'ôZ-ñô“E^ot÷«’x Ê’Œ#XC·QµvÜÕê”ïrÒÕ9«<Ë4õ8ÜÏ4¿Êch q27ê¬ôÃF…#dpéíÅ3∆Ä≤bx@Pjà≈£Tn:…Dáì9í °\nÖxBîŒ!XíaÑyÎbfö0Ü´€ÙóÉFÏ◊õfmM∏e]®t9Ctqê∫óÓx;œßl.√∫  Hó8U†§£wufÈ˙á4@Â›Z8ëÏ7bl\n#K¥;úP∆#¿iÔÏIÈhka|m¸ºä‰ÿõá(èÛbd\n¢|P\n7WlàôdËIá@∂4\n!¶ñ!>Òï)&¢àÑ%∞X§É“íK‘∆Ä†íEÉÀtÅ•vö‰2ÑÉtv8¶ÈªáÍnP»fAAµÛ≈ßÂF–0cs»JZP@n`P	·L*∆ÿLUÈÉ(\$‘@ìqCéKo√&q~G bNBÍ©¢ëûâH¥@àµ<:@≠MuJ†ÿ‘É≠}ZzãÃ“özbÅçÛûÄÕ÷ñ“†@¬àLö|h˝B0T\n\r÷¥∫∏‘áù]qÆhi¥∆ó\n„\\¢ISﬁ|IL,ï:Ï.%…\"Dÿ¥¬Ygﬁ'öDJä‡º◊lIc,fm„ ◊¡vﬁã’{/ÕÔA\r∏Ü¿W^ÉHc\rj}?PÌ/Î|Ùè‘4Üg#`F∏°µÒ°ö\\ÍÇ®T¿¥*›Xﬂ)Ãu†ÄÕíe†GÍ…©Öä˝\"GÛmf¨]∆6«X˘4&∆&g4^Óò–ôyBÄ ë,(éqéÊ@…E,Ò˙äªôL»ô2G”ë‹»wp˚íÒ/«@æ&9úÕ\n¨Õö3QÁ¨ˆëƒT€Ty='„úZò‚Ù*3‡ê¬xN46∆ò„√ò\\/¢®n:Z\$|∞hıé Òé:—–◊c&◊e§K`iR—',p≤q„#3uX'qDö«(ÄÄ";break;case"ka":$g="·Aß 	n\0ìÄ%`	àjÇÑ¢·ôò@s@êÙ1éà#ä		Ä(°0∏Ç\0óÅ…T0§∂VÉö†Â»4¥–]A∆‰“»˝C%ÉP–jXŒPÉ§…‰\n9¥Ü=Aß`≥hÄJs!O„îÈÃ¬≠AéG§	â,ûI#¶Õ 	itA®g‚\0P¿b2ç£a∏‡s@U\\)Ûõ]ù'V@Ùh]Ò'¨I’π.%Æ™⁄≥ò©:BƒÉÕŒ ËUM@TÿÎz¯∆ï•duS≠*w•”…”yÿÉyOµ”d©(Ê‚O∆êNoÍ<©h◊t¶2>\\ròÉ÷•Ù˙ôœ;ã7HP<ê6—%ÑI∏ûm£s£wi\\Œ:Æ‰Ïø\r£PˇΩÆ3ZH>⁄ÚÛæä{™A∂…:ú®ΩP\"9 jtÕ>∞À±M≤s®ª<‹.ŒöJıêlÛ‚ª*-;.´£çJÿ“AJKå∑ Ë·ZˇßmŒO1K≤÷”øéÍ¢2m€p≤§© vKÖ≤^ﬁ…(”≥.Œ”‰Ø¥ÍO!F‰ÆL¶‰¢⁄™¨êR¶¥Ìkˇ∫jìAää´/9+ eøÛ|œ# w/\n‚ùì∞KÂ+∑ !L …n=è,‘J\0ÔÕ≠u4AøâÃ›•N:<Ù†…L†a.ØsZí¬*™Õ(+ıë9X?I<≈[R≤ÛL«(ïCéúæ);øRÆ“ÌJ«Múx›Øö:†Hîä≥”Òbú÷§2úÍ%/¸ı¨ˆJ´=ëï€ï£öé7Rì*åâ,fß‘¥¸—k¥ÄPHÖ¡ gÇÜ*˝j]∞ü\0‹äÇâ)VOã˘!BTR9p’3•‹¨RpmßOŒÙ€gdc–ßvdJ\$™ÏßT∂2N÷Ÿçt†Vˆïûß‹ÔÂ\0∫Î^b¥√¥BÅU?å nÁizEA)MkúØ_(Í–€épÿïXu≠%˚›x—IÖ‘Éƒ-Ïõ>‚V™VˇƒÉ`Ë9n…m{é©˜äó÷Y≈+ Íâ=Å¥ÙÍw94:äïo√∂6©puú™•|Åøı\r[ç£ï{gQ∏◊>Üªø˙4{GêvÕß#!yÇ„£èçq¨ÓS5!4ÓæJ•‰˝}!äbêç*êy…√ËÔlÏY≠õ®íﬂË˜tÑ 6‹›ì[˛¶û#ö∑…IVﬂø»mj'M¡◊+v§˚NkOsæ)	?HÛå|T¿ !ê6Üê‹CìÃÄ.›i∫'Xkîª∑,∆¥Í«ƒ∫û˚(7oººñärÅ‡a†9PÃAhÅ–80t¡xwÜ@∏0¿H\rpoAúÜP‹√ o\r¡Ñ:òÑ¡>toÕJõ¢<N‡˚Í2‡Ü|„O˙„?.ùì1#vˆ‡{◊uÍ1Y<2<néπøÇŒ1ò§†É±œtÖùõø'™S⁄s∏)ÎÄ0∏û˚ù…%vEU⁄'„–Î–Dl:ƒ›˙ífaa%Ñ¶¬ÿ_aú5Ä∞9Còwa¯e“8ç¡_âOçÙób<ì^âeäëX§Ù∏ÎÀa_çgìñiÉ•´æ}±xèAGƒº&v<F¡-»µ<INπ∏Y\$ñW©Tßb‘égÂÿÔîò4∞ùª)—A∆/5≈&ì‘-\$ˆÄSÎÔCeUs™TΩS,uyÆ¢Gó0\"Y9)1ÄI\$Ç8ØŒ<∑aé¡iöV˙q≈S›°&ıh≠®0èÕ€àôÚ(Ï-:8‰\\)Ï-/5pPW¡Iß[4j\n4ô”;‡{EêSÚ}™≥öIM—≠EÎIGsÆj_b’[èù?u”+√¢Æ©î≠iÚ{)ö⁄ê¢bï\$T:çïïAÍ©·ºÍÇ@Â⁄,#Ã,˚¿˘~NP|›a±âÿ»I‡πã˜RMƒúœÑ*)üïˆVS¶rßsƒ~ysï3BIM˙ïå°\0â	v™£…;å\nΩ02Î¶R.œôÿcæ˚⁄êueÒ1wl‰mUp\nI»\"dªÉ4Àj\$ÉËA∏sÀh”†¬òTù->¢vπÁ¸ørı€®È©ﬁö,}3˝’æÚ∞®Â˘'¥2±ƒïX¿QÌ˝¡∏f·ôOB9?Îe◊ßÑAÀ«ãM]]òwiXx.9JLìAÜÕ28©ii«y º#@†ÛÕ=ú4	◊ìë\$¯ì<∂RØæ¬^ høS˝M-r˘û√N≠n!πJ≈ûyîÛRÊ&—µ^xã\ruTÅg-DB¨»b10ÆqQJ∑k\$ÒüÚ<k#ö_»€ØLmègÁ&ıïé6∑≈åíÉ`Ä!∑∞ÿ\n‘Å'?ò≤0@ ajN∫aM\$5_R_Â⁄˚¨{À`U\nè,_f§RVÃwT≥O!·∆.iÃÒ∆£Iˆ]≤=y)•»XµÒœ“,ûSJ7y\0◊,eˇ_ù ïæB]Ω‚<Ω©¥R]ŒÆ,≤â|Wq¬ò&‡èWúBµ†åÜ]£% ‹ô hÊPr¡Ü∆¯óà¬ah≥J.Ñ.Îí§7∫‚«}SÎf ¿ùH\"LrIˆôOJg°…>À\$• |Ö≠ÜrQΩgÉgIwîiã–ÚvÀ'¡@“ÍWVS/e¨N“paZ€qüíü–8sL.ÑÀIP5h3AÓ\rŸ∏Ÿô";break;case"ko":$g="ÏE©©dHÅ⁄ïL@é•íÅÿäZ∫—háRÂ?	E√30Åÿ¥Dù®ƒc±:ºì!#…t+≠Búu§”êd™Ç<àLJ––¯åN\$§H§íiBvrÏZÃà2XÍ\\,Sô\nÖ%ì…ñëÂ\n—ÿûVA·*zc±*äûDë˙∞0åÜcA®ÿn8»°¥R`ÏM§iÎÛµXZ:◊	J‘Í”>Ä–]®Â√±Nëø†óµÙ,ä	çv%ÁqU∞Y7ùDÉ	ÿ  7ƒë§Ïi6LÊSòÄÈ≤:úÜ¶ºËh4ÔNÜÊÇÏP +Í[ˇGßbu,Ê›î#±çÍÙì ^«hA?ìIRÈÚŸ(ÍX E=i§‹gÃ´z	À˙[*Kå…XvEH*ç√[b;ç¡\0 9Cx‰†àé#ò0émx»7∑çÄﬁ:õÇ8BQ\0·cº\$22KŸÑ®»12J∫a†X/Ö*RèP\n± —NÑ¡H©éj∫à–¨I^\\#ƒÒ«≠làuïå©<H40	Ÿ¿ÖJæˆ:§bvì™˛Dsˇ!æ\"ˇ&≤”ë÷B DS*MëájúÉM Tn±PPà‰πçÃêBPp›DµÍ•9Qc(‚ç√ò“7”*	÷U)q:øΩgY(J§!aL3¥uî”±rBoâ÷YAq+•ÁQn ìµ‹ä@ùE¨P'a8^%…ùõ_X⁄V”ÂKŒSëââI£##ŒX1íi€=CÀx6 PHÖ° gvÜ¥dÈdLÆU	â@ÍíßY@V:≤!*^ÕËøêÖ⁄A‘gYSpóíπfƒêRÑæV0dfjØÂïÚ[)â±àùxô÷Añ‡KoaÿÑwí±\$¶“2\nDL;´=8íe±#È∂<È»∫ç£hZ2íπX+UMV6ÉìN‘Ñ‰◊ç„0Ã6>√+ûB&îÌ^◊Î3∫Mê`P®7∂Ch¬7!\0ÎLé£∆ﬁc0Í6`ﬁ3æ√òXﬂ[»¬3å/∞A…ea\0⁄˚Æ(P9Ö.{	OógY ôàbò§# ƒ6@ñsŒÄ°O>MîÖPE»R\$çOmå©+∑Ó\"£Y∑£5:”O∏@ åú∏›Òc9Mêx@-^æ3°–:ÉÄÊ·xÔÛÖ√õ≤¬pêŒå£p_\r—„•7˘A˜Ë‚>√8x√>lÊTBìë÷∂X£é∏Ù\$3ŒÔI0∏H‡Ö\$VlP¡≈Ràú9¢îVÉÉ¿p\r-}=w≤€›{ÔÖÒæWŒﬂKÎyÔ¥9>˜‚¸ªÒSJpÇ\"®ÇHm‰6øËˇ‡\nãàß7≠„~ÂÉk5·• ˆÏÛ√ptÄc≤£∂.ò`õπÇ≈·¬ﬂ≤ú‹‹8@ƒk√Çx¡ \"≠‡¬†“!o≠˛∏'·úB\rçáﬂÉ^√EéD`“C`s2HÕ£trh\rT4¡@\$dç Pü û`πàÑ†¢îÀ!,Úi+58Û„C˝7∆»⁄cpnÉ*ﬁDÅ»:”íáëêp¡ﬁ`πÈV*ù£Å‰-∂¨Â!ö˚ì7Ød9¢v˛‰–i«äa∏89ìfäPr[¡‹‰0–ÂÉHg{‡Ç7»S^√»lÀìôLéH93))êªÚc@â¿Î¢è≤/3'©T†\$äC‰´»\n\$8∆ÇI-p2ïºlQ\r—8‰÷æC©ºDôÜ◊óû¥‚A°ç√!ô1—9ª(!@'Ö0®y⁄õUURòÛàB÷+\n⁄~¶î»‘Ü®∏ïQM)ÂFãë·HwRhÍ(·®±Ÿ*f%TeXQ»ƒÓ⁄Ÿ™ü4‡∏g‘◊g§ÒL(Ñ¿@•¯ 6Ôd#I<›÷iàHï…”:jàPyÆBeÈj*º è–†îFZ3e¶µQŸ\$Ö	j%U≤í≥ˆXNí§æfƒÖ≥å“äWWm§∂tL”6≤]<\r!å5®ƒˆC¥ê¶2ÌÀD–“õÃT(!¿Ü◊êà'´í\n°P#–p£ûï%>ˆŸo1hOâ–b¬d∆[CLaåAä\\6πÑ∞±:A…∞Ï':˜%`õsÆÇ§?B ˛°h ·\"2ÜXÃ@qüÖa¡f\\¿ﬂ]√jCH[\n·{ƒ~ö0+≈ë+äy`  :ˆSÎ‰Iù±d,(z› Ã)ÜSs&ßÌ+≤Ü`…ŸIQPW§P1då∑]I´HÜ/EÌ|yã3ÿ©|/¨\$eL∏";break;case"lt":$g="T4öŒFH¸%Ã¬ò(úe8N«ìYº@ƒWöÃ¶√°§@fÇ\r‚‡Q4¬k9öM¶a‘Áê≈åáì!¶^-	Nd)!Baóõå¶S9Ílt:õÕF Ä0åÜcA®ÿn8Ç©Ui0ÇçÁ#Iú“nñP!ÃDº@l2õéë≥Kg\$)LÜ=&:\nb+†u√Õ¸ùl∑F0j¥ê≤o:à\r#(Ä›8Y∆õÅúÀ/:Eéß›Ã@t4M¥Ê¬HIÆÃ'S9æˇ∞PÏ∂õhÒ§Âßb&Nq— ı|âJòàPV„uµ‚o¢Í¸^<k4ù9`¢ü\$‹g,ó#H(ó,1XI€3&U7ÚÁspÄ r9X‰ÑC	”X†2Øk>À6»cF8,c†@àécòÓ±åâ#÷:ΩÆ√LÕÆ.X@∫î0Xÿ∂#£rÍYß#özü•Í\"å·©*ZH*©C¸Üä√‰–¥#RÏ”ç(ã )çh\"º∞<Ø„˝\r∑„b	 °¢ Ï2çC+¸≥¶œ\nŒ5…Hhé2ç„l§≤)`Pàõ5ãÑJ,o≤–÷≤©‘–ﬂÕ√(πç…Hﬂ:§Çõñ≈†ÄRÚΩçm\n»óQ¨n€)KPß%Òä_\rÈ™(,âH‘:ªÎ¯††4#≤]“£M.Ô•KT&••ÏP¬Æ-A(»=. Ä’’Ç3†ï•_Xéã∞<≥‡S.ÅàZv8jÊå™‚*ø≥còÍ9O»“ø<¢bUYFÉ*9•hhÇ:<t \"çÅtUî1ö§ÅB\n‰≈ªD∏J\r.<∏o+ù~FiÕ_%Cí`\\ﬂÎµ˚Å-Ë%úÇ`¯If·å8f	g1†RˆÙ⁄Ç@ê	¢ht)ä`P∂<Â»∫ç£hZ2óç…+∏É\"ì/DHj9j1Ïål ç„0Ã6,„,Ú˚…ÙÆeKS:˛*\rË≤V7!1ic>9å√®ÿ∑çÎ4Í4„ñ™‰,€ÎZç´8ÍπÖòS	JVÚRÔ®\0Ü)äB3N7£KDLC‹ô¬Ã™SÖ8É2∆6çÈ~m.Æ-Rˆﬂ»1ªñí	F)Vóø∫cø2£ríÜ(„/!<,õ‚óÒÕ˙\\≥å·\0Ç2m™Â≤s∫R2>·\0yäç0ÃÑC@Ë:òtÖ„ø§=∆ä9ÀŒÆ!{⁄¥#≥∏^ﬁ˚˚⁄Åx¬hÙ∑\"W\"ïR•ıàŒ∂%7UÒ—q0⁄∏eçòj\$dïN<ÉêÅˆ¿ﬂ•‘Ãì∆y)Ê<Á†ÙÉª‘zŒÈÏá'∂˜SítN¡πÒì†|Chp.‡:>ó÷ô“Ò®R-¸≤4Ü–Pp>ÌL∏áG⁄®ëŸ`Å¨<ÆN¥»bs«å*6úPxh2°Ñ1æÍÃ„_FV'bóïxa≈ÃﬂµÜ¥ÉZÎ_\$MàEÉPi‚ë)x3å!,uÜ∂±XTàHi\rÂÆ>ôeº¡ó»v!\$¥∫é¬ÄH\nz@\"\$v\n	”sA\r;î(™Ì!°ô\r&lŒó§ÇIy™2Ë(ñ Ôàsu&Œ–èJ'DYúÄ rl‡<∫¿©é2t0àµ¶’©g\rΩu†‘ïxw5!å4CR ÚïÅï5T1õ0Ê—î)æ0åíVKIyp\r!ëGñ\0⁄é—`láMùÑbMü”’ùi\\Ï¶◊XHXy2Íu†D7‹<p5G8áS>ÇÉ1˘\rÆ⁄\rº∂}C\"õÙ(óë<IÉ¡/f–\0û¬§∫fÂƒ∆Ç\0¶I\\Ì>3ˆï9@›=W»k#\0Åï÷MI≠34ƒT7b ÁàcTOΩ”1@ÈP—:1‘nüSFHû≠<VñóòGÃ·ï3lT#I&·ïy*Aﬁ˙\$CA˜\$Ü>Jí∏ÃÀîP0	v7í\"Fä=zÆïÙ9¶Â§÷ö3§ùª0j™ïb&*n¿0ªu+Ëi`ˆR∆∑õ.bÿ»C\\Å∞—ê“√Zh>¨T; \rÅ5ÕTÏì⁄√\rIr\nãs*Ö@åA¬jwµ3íK?aô#Ö1]4¯Gà≈ #¨„ïƒwtHŸ˛nÑa©•÷*W)ƒ.»çøÇJ§CM≥Tƒ_¿‘Jà∞tµ°… ß‡ÚW \néÂÒl‚∆[€m8ßæõÃ@J‡m80\n8\ni~’¡õó.ò±©6Ç`o´.B`öR√Üg—ﬂ^‰πF%Tb\nU\n…êóú`Ù◊èÚÓ∫¢ÖY„5så’S#añ*ó£ÃH∞°§¢µÆËQëKPIY¢ÖgëÈwK%„.h|KÕ¸1o*ˆ∞j∞ÚÑªGàËp9`";break;case"ms":$g="A7\"ÅÑÊt4è¡BQpÃÃ 9ÇâßS	–@n0öMb4dÿ 3òd&¡p(ß=G#¬iÑ÷s4õN¶—‰¬n3àÜìñ0r5Õƒ∞¬h	Nd))WÅFŒÁSQ‘…%ÜêÃh5\r«êQ¨ﬁs7ŒPca§T4— f™\$RH\n*ò®Ò(1‘◊A7[Ó0!Ë‰i9…`JÑ∫Xe6ú¶È±§@k2‚!”)‹√B…ù/ÿ˘∆Bk4õ≤◊C%ÿA©4…Js.gë°@ç—	¥≈ìúùoFâ6”sBñúÔÿÅîËe9NyCJ|y„`J#h(ÖGÉuH˘>©T‹k7Œ˚æÅ»ﬁríë\"¶—ÃÀ:7ôNqs|[î8z,ÇécòÓ˜™Ó*åê<ç‚å§h®Íﬁ7ŒÑ•)©Z¶™¡\"òË√≠BR|ƒ âŒ3ºÄPú7∑œzﬁ0∞„Zê›%èº‘∆p§õåÍ\n‚¿à„,XÁ0‡Pàƒ>ÉcÓ•x@üI2[˜'IÉ(Áç…Ç“ƒ§“Ä‰åÅB*v:E¬szÅé4PåB[Ê(√b(¿âÉzr‰Ø¿TÎ;Ø®€0†çÄPíÁ¶å0ÍÖåå(ÚÁÅ!-1Qo–õLh÷ÅàZtÿjq»ù∆®¿ZñÕÇõ§…ÅBBà)z‹(\r+kà\"≥îÂ\"’C‘2“‚cz8\r2˚W\r√§aDIı»@Á¡È–“4&ˆS‡> \rå3’¢@t&â°–¶)ÅBÿÛsè\"ÌN6Ö£ »Vï≤t˘ÅCd?X (Ï›'#xÃ3-£p íä*åõNì≥/É\"ÉíﬁËN0öÙÍ#sH‰1∏L˚v6aS¬7Ñ')\nF\"™å/SÇDÀ(≠Ïk©4H⁄ÿâ(®7≥\rÿÜ)äB5û4™-‡–\rújY1É\n˜«ém\0À(√;c=aLƒÂ•'£íËõfŒÇbÅ®)ÇêÃX»8úMirÑ åôû9dò≥7â«≠í—áà–9£0z\r†Ë8a–^é¸H\\¢mŒÄ\\˜å·z|åãJ*4≠!xDl„#†ñáÅx¬6O”-h(ÛÄÍ…ô\"a„ì„ï?2“⁄íÕ÷VU´∑c≠îñŸ¯7S9uö&Úo{Óˇ¿|/ƒé¸^⁄‘Ò‹á\$7rR∫}-{î<h√–Ùa\0« rcB—Ï„=Ä0çå®ŸgJB›æ…ÑJ9NVí\\B1Äf¡†˚Ü∆BH Í‘èì◊ˆèyúQ!Ñ3‰D®cgË9Ü`ÍG›â©ÅA§:àJ}–âú|ÕÒœ,í‚·p.HPﬂìÇnIçÏ5~‡Ä(Ä†MZh()@•iÇÃN˚ACeYÇxrÖçŸò à\n DÉ4LLÈRÀHûì¯¨	y˙â&9¥2ﬂ·Ø?kËÇ¡≥^n·<ouÑÉ dÉ@ie!ôÜwaOºq|ÁIÅ£rç\rç‹(N¢>0` ñôñZä%êEƒΩ\0ö+&g‰‡†áCòÜ\0PJ#Dõò∆ÄcükHZœÌ∑,¢Ñlôá\r±∆¡w_ùÛ´y¡3õ≥`|SxP	·L*<¯¸ë˙F\r%ÜP∆≠NawGÕ	êâ8ENaœYF‘§•√@√oIQäb0FâRµh°D&ERrOPåW3 À`©—°¥äìÕ9d“¡…π%PfA‡≠vAHmãÙöH≈§fI®5T	B\$ NÿÙ_Q∆ΩBPWSï˘tKÅ\rÜ¿VÀhcb∞Ã’c,˙»Ÿúmƒ	Œ£8AŸdº&â§“ñdhB†F†‡í—≥â(∏iüA…öØ ≠VôB5Ü∫-µñ∂uU¢˘Mú:ùép¢Ä\nc'¶Ä¬Ôç√¿«”2KHÃoji‘¢'	¥◊ö jÖ‘≠≈\\QïAkFK6ÜWXtäò>…»Ë¥ÖôQ»àT:[&÷8`B)/@51A®Õy l¥öU7·(K≠ß;ÊàóóRØÕPs";break;case"nl":$g="W2ôNÇ®Ä—å¶≥)»~\nãÜfaÃO7MÊs)∞“j5àFSô–¬n2ÜX!¿ÿo0ô¶·p(öa<MßSl®ﬁeé2≥täI&îÃÁ#yºÈ+Nb)ÃÖ5!Q‰Úìq¶;Â9¨‘`1∆ÉQ∞‹p9 &pQº‰i3öM–`(è¢…§fÀî–Y;√M`¢§˛√@ôﬂ∞π™»\n,õ‡¶É	⁄Xn7às±¶Â©ù4'SÅíá,:*R£	äÂ5'út)<_uº¢Ãƒ„î»ÂFƒú°ÜÌˆÏ√'5∆ë∏√>2„„ú¬ûvıt+CNÒ˛6D©œæﬂÃG#©ßU7Ù~	 òröë({S	ŒX2'Íõ@Åém`‡ª cÉ˙9éÎ∞»öΩOc‹.N·ç„c∂ô(¢jÊ*Éö∞≠%\n2JÁ†cí2DÃbí≤O[⁄ÜJP ôÀ–“aïhl8:#ÇH…\$Ã#\"˝â‰:¿ºå:Ù0ç1p@é,	ö,' NKøç„jªå†Pà©6´îJ.“|“ñ*≥cè8√—\0“±F\"b>í≤\"(»4µCîk	Gõ¨0ç†PÆ0åc@È¡¿Pí7%„;∂√£√R(Áç»‰ƒ6ÄPúØ£∫¢ï—!*R1)XU\$Ulé<»Ì\0°hH◊Aà-'ÓZÍ‚+Ëß!¨ä≥#9@PÇ1éë%⁄B(Z6 ãË¨ﬁ£3í8JCRÖKº#í±πïÄÀk€.=,IíiW•7]∞”*n%·t&£pÍ	@t&â°–¶)ÅC …kç°h∂5bP∫…K#r¶ˇ.VÖíÊ\rÉ•Ã†Æ¢X7å√2<Ω¶¢ö‚B≠J“ÏkCl\r√ 	ã£∆íc0Í6™Ù9∫8ˆl0åÚ¢äΩ*âH⁄Ω©XP9Ö-≈:éœ„8@!äbêåü9apAr§£®Í„†ËÃª'hÚ6\nËÀR¶πpÈò8MCx3¡Ïc8¯™{[é:ƒ4Ë@ åözˆ9:#4∏¡\0xÎçpÃÑTpË›Ax^;Ùrc≈!°rÏ3ÖÈò_\0:÷äƒÑA˜X°ª·‡^0á€≠Lˇq\nXŸ∏â|åö˛‹œnïJ®∞)f√&Û„èw∞kãèÑ´Ï\\ö\rÀs◊9œtøEƒØ]/O‘ç›L?-NˇhD™á¬H⁄ó≥‹:v›ƒ÷òçào%&®-Ç©Õ\rfÑÃ:2ñxà†)?(â\\2®≈¢gí	#Ê*pAüà <f£@ê‰‡ì)!òïút\nŒô„>h\r¢û3bJ†sQ∞1¢Â‰¥V*1/Á	:øÀ )Ak\$∞(Ä†ˆ±\$EJ4˜#ûq¡AUj†(!ñ\"ˆ¥˘>4Fê”RÅ√êt*fÕ¡ÛÃK}#(º<‚6wÃÅûbƒ÷¨í¢TŒ∏sALÌÊCá~ÉÉQ4H-ÎêÓlîl/\n:õx\\ e&§‹úì≤zßJÓTë¢„›[\r\r5≠RjH†y3GI»⁄ëI±6h∏8áRé1L'Æ!“y,QC/?–‡Ÿ†¢8MBÄO\naPö‚M…Q,)e6T.P÷\\öbïgdæyk5éª\$]¡ Uë≥§ú\nõé\r»Ù3∂wi&åƒ≥h\\÷Úc…xL(Ñ…ÅNi:·*DÚ∂T_∫Å0ëVVÈTí®ùgå5f˙h“ú#èR—óÚúMTy'Ìö´\0˛`˘'§gˆØEN˛d2¥êöÑ6<\\ﬂBaº8!”Ñ‚∫¢§»ÖMìêbå∏F°Ïí¬VòB†F†·'∏‰˛ßii)2∞äë¡Ü+Ëåi 'Sc+Q“yµû¥í¥Ñ’à—A#‰Ñ¡⁄ú∆+E«0&¿ “É Œd’ô™§Ggπ\$iyA£yﬁ–K—!VL≈\$ÿOja,©Q!⁄\">£©Ü	Ñ¡ßc˛~¿U´&'|êîÀä,OÄ(+!í‰÷L°\$g‰ò°ë\nƒGÎq2,©åíµB'Ëigd4W≤≤,íÆ¨m_¨Ö8O‹V?∆0⁄ë–ÆQÃ)(©Ÿ√îL¿";break;case"no":$g="E9áQÃ“k5ôNCPî\\33AAD≥©∏‹eA·\"aÑÊtåŒò“lâ¶\\⁄u6àíxÈ“A%ì«ÿkÉë» l9∆!B)ÃÖ)#IÃ¶·ñZiè¬®q£,§@\nFC1†‘l7AGCy¥o9LÊìqÑÿ\n\$õåÙπëÑ≈?6B•%#)í’\nÃ≥hÃZ·r∫å&K–(â6ònWò˙mj4`ÈqÉùñe>π‰∂Å\rKM7'–*\\^Îw6^M“íaÑœ>mvÚ>å‰t†·4¬	ı˙Á∏›jÕ˚ﬁ	”Lã‘w;iÒÀyõ`N-1¨B9{≈Sq¨‹o;”!G+D§àa:]£—É!ºÀ¢ÛÛégY£ú8#√òÓ¥âH¨÷çãR>O÷‘Ïú6LbÄÕ®Éöê•)â2,˚•\"òË–8Ó¸ÖÉ»‡¿	…Ä⁄¿=Î @Â¶CH»Ô≠ÜL‹	ÃË;!Né2¨¨“«*≤Û∆h\nó%#\n,õ&£¬@7 √|∞⁄*	¨æ8»Rÿ3ƒœ∂é√p(@0#rÂ∑´d‘(!Lä.79√cñ∂BpÚ‚1hh…)\0–c\n˚ÅCP¬\"„H¡xH b¿ßn–;-Ë⁄Ã®£ˇ0ò÷≈<£(\$2C\$πP8Ÿ2°h‡7£‡På≈B†“õ'ı™˙ºåÛ#‘–Jmw®-HËPÙÀgÀ»*ñ2ZtÉMWâ–ö&áBò¶Åzb-¥◊iJ”∂5nÅ>|Å,Dc(ZôçÅh–ùè-¿≤7†Éî3’ö™¿°R¨&N\0ÎS\nÉxﬁN”˙*˝åcÓ9å√®ÿéOr¿XœœÌ∞¬∂0™%6≠òò aJR*å„»ÿø.A\0Ü)äB5ˆ7°*`ZYt‰ÇçcP »∞h»œß6`P™:OVL∆H\ràÚÑ0iH®42Ik}â ŸËÇ2f∏Âìår“∆ !‡¬\r	ÃÑCBl8a–^é¸(\\≈Ì´“–3ÖÍX^˙≠©ú¥ÑA˜ ¯La‡^0á…IÜL\rnv&6'cÉù£ﬁ„t3¡zÃ‚ãÉÜ7P∂ÍV®éU‘⁄9Z»G“⁄aÌºo[Ê¸:p	√qg9qút´+À#w(¢á¬H⁄8/1|Ös\\‰!¨åfœ)Õ#á©ßm[ˇŒ¨íónÛ˝Zù&0·é—”V’Xuä\rŸ\nVƒfPàcrE0;ìDFXr}!…®0¬ñÀc¡Õê2&HZ‡b√\r 0¬ã¡\0c8ØÃ4ñ‰4aÀôLbaŸÚÉ¢5Ñ:µà˘ÇÄH\n\0∂√T.kÅAE%4ÄØ∆¶RÀõ´aa\r-x÷—ë€\r0—d◊bçPÂõ–_Yª9gmm9:‰∆⁄`ôëa©-@r§FMwhè2–È`pbn≈\0†7x∏h\r!é≥\0Œﬂ†|\$#å0áRÇJIYO%‰ƒ…bII¯tM07∞Ë\n›;\\)n≠©‘2JBI,Å#h∆œ“€ÑëàüÍ}Œpf=Ñ≈µ∏òöfJ`cOE]ö\$\0\\ A§#Êê2/Wºﬂ0iiç9®<¡%ä’>3\\∆ÊN^\nÆˆH\nÜAhkKDò3áS€ë~'ŒÜ-∂AYí#Ñxõí\"H]&ô\naD&“L»·£w¡P(#4‚ˆ’CÓ.ì\n=0“§’Bëã.Ö9ùÇ@∑iÂâàÃëŒ\$P^ÃZR§á¿Á'\"R¢4––9ï¶µi…CÄ¥ÚüêÜà√`+\rh\$Ñ;Ü]q~lı<‘—¶™RMì˚4Ôıëâ¥B†FÏ2Üs Ÿ‡g¶Í≈;“3F\r˝/®¥°ï:‡óñËK†ERU+r0|MÅ≤A™™Ê⁄—L`\n/Ñv|6‡qK˘÷<à‚€\"Mîÿ#L“öu∑Uê¸™wÅ§•õJ∆'\nı:n‡¿√PAéêH'‰`ü∞ÿ|i:Õ≠µŒë`¨[É:¶	iÈ5RZÆÕ˘pÆÍ¶WN&Ô6¨Ë:¡PªãolÖ&H®2Ä";break;case"pl":$g="C=D£)ÃËeb¶ƒ)‹“e7¡BQpÃÃ 9ÇäÊsëÑ›Öõ\r&≥®Äƒyb†ç‚˘î⁄obØ\$Gs(∏M0öŒgìiÑÿn0à!∆SaÆ`õb!‰29)“V%9ê¶≈	ÆY 4¡•∞I∞Ä0åÜcA®ÿn8ÇéX1îb2ûÑ£i¶<\n!Gj«C\r¿Ÿ6\"ô'C©®D7ô8kÃ‰@r2—éFFÃÔ6∆’éßÈﬁZ≈Bí≥.∆j4à Ê≠Uˆàiå'\nÕ Èv7v;=®ÉSF7&„ÆA•<Èÿâùﬁ–Ár‘ËÒZ ñp‹Ûk'ìºz\n*úŒ∫\0Q+ó5∆è&(y»ı‡7Õ∆¸˜‰r7ú¶ƒC\rƒ0éc+D7†©`ﬁ:#ÿ‡¸¡Ñ\09éÔ»»©ø{ñ<e‡Ú§†m(‹2åÈZ‰¸Nx ˜! t*\nö™Å√-Ú¥á´ÄP®»†œ¢‹*#Ç∞j3<ëå Pú:ç±;í=CÏ;˙†µ#ı\0/JÄ9I¢ö§ÅB8 7…#†‰ª0Í ˙6@JÄ@¸∏Í\0≈4EÉú÷9N.8Éç√ò“7œ)∞ò¨∏@S¡ø/c æà˚“\$@	Hﬁ›çÉxŒ„ON[ö0ÆÆZ¯÷@#ò’K	œ¢»2C\"&2\$ÃXËÑµC˛58Ue]U2£∏æ=)h¡pHW¡à)èC®÷≈ÅC8»=!Í0ÿ°Ω\"ú¬ÅS˙Í:HÜ˘°2‰c¶4Zûç#då0±C∏«\"∆ÈÌ∞Ÿ%&!)QMÄÆîi\r{éiJ<ß’-∆0‹°p~_œúYÄ‡w*kÉè7È·n>ë&»::˜â@t&â°–¶)ÅPò⁄oªÓ.ÅBÄﬂpç<∑\rì Ç†ËL÷3…>õ\nq:h9=Tç&√6M2ï•£´‹åcB92£A£>é¬#Ê™„AoúáJx™Í‚é^\r§åöZÆ2È»Ûì©k≈û≠¨;®˛∑ÆÍõ∂¡>Q)ÀVÑ8Í·mj⁄òÈà~„®nõÓÔIk;÷∏9Ó£ˇ±%´öÉ¬p√¢l'!Ï‡¬áîpÓÅ)√Z bò§#¡\0ßÃ∏›^\$0√É3Ú6é£`¬˜!|∆õ^˚∆)ç∑¬~áøvcñí ûo=P˚ @ åõ<OΩƒéÍc©ç±2ä–»¡ËD4É†‡9áAx^;ˇu—Ô?O»Œ√ÄlÊå†DˆÅx\"∆åæ°2xaÕ\0ÇÜ¢ÇÍ√:çbmq)¥e(Pªap\$‘çb∑\nAJ\rh†ÜrR≠P˙!(AÊª∑j˙AÎØµ˜øÊ˝_ª˘iYÇÁ˝\0 eN‰A='»TÒ≤\r!∂\0í‚ aTÇE	0‹ºú(e)¡ëï∏_Q˘tÄ•BXPcQ)Ñã‹û¡íÄáH2kLH:¡í1MHw@\$lB!é'¬ÑπCa&@D09;‡‰íU@aÃiÜ0∆ACòfx-]I%iî®@AÕL  ∆d\$W.¡∞9ôÇÙc√z%Hû]∑†1E⁄ËCÂŒ\\K©xädÖCºòì2Ïß◊õsx´≈yÀ“@•_9r?·Í04˘§\n\nÄ)mÒ·3¨&Nƒ\$¢y%\" H\r≈A—Z°É8@Hrh\rNViHÚKMzB*Eü§gJgCK©%D—ôL7îﬁ§<â2»G'Õn5R&åñ¥É–âì(A†4µ\nC;íTnWŸ	Ç(\rg·)8\nNIŸ='ÒÄë% ≈L©há=3ûúI∞J!◊Œ7VÑWÙrgF¨å&\$¯@ãì‹çÌ)Ü”‰MaNMg»7°IvÓÿPz\$Ûï∑MÊ¢ÌB–m+u7Ü%>&Jr›)Uπ©¿Í’® \$Ë€R!ƒ( 8öîR:√»j± çX+	\$ ©©\naD&8RaS*8w#é•Gtö≈ûÂƒ`®úªU	N)†πÊÂH{'AH»°\"Ê˘K·)Càè©†ÚM≠‚•∑ÒƒA9‡÷a	iSÚ‰[”&öÆùÃ@sxõWGÈ≥ÑTàIµÿk¿¬Ø÷0WñÔ¿v\0cÔRµ&¡\r1¿V ©5áv€◊®ŒI»`98ÓîílÃM∏≥1¬ñ√RI–·l/Ñ9> (ÓB†F†‡õ^õïvn\rÕ∂ëQ]Ee|-X∏òAUÜ	â-ªya¯y	O\\Aã/∂ÿπV˙Äõäé#	‚Ü\":á+‰ƒ?∆ºÿÿc…NÉ,–j>ﬁ<#N[∞‘\n™÷3‚HqÕ1®¢∏\0€ŒÙ8⁄_=¸Ø0•‰%#b‰yÀìÊ≤æ¨‹pû—n\nuX†\0¨V˘Í=í°ˆ\"Yﬂ∆ÜOﬁ3&tmÒ2∆Ì&Hª¶ìB!õ*´P\"ì¨vÇN0[Òb¨{ˆÄÉæÜ ⁄&ìdº¨±ÆxKVí÷¢É£å¶ìª” ·\0";break;case"pt":$g="T2õDå r:OF¯(J.ôÑ0Q9Ü£7àjë¿ﬁs9∞’ßc)∞@e7ç&êÇ2f4òÕSI»ﬁ.&”	∏—6∞‘'ÉI∂2dóÃfsXÃl@%9êßjT“l 7E„&Z!Œ8ÜêÃh5\r«êQÿ¬z4õ¡FÛë§Œi7MëZ‘ûª	Å&))ÑÁ8&õÃÜôÅéX\n\$õépy≠Ú1~4◊†\"ëñÔ^èŒ&Û®Ä–aíV#'¨®Ÿû2úƒH…‘‡d0¬vfåŒœØúŒ≤Õ¡»¬‚K\$Sy∏Èx·À`Ü\\[\rOZ„Ùxºª∆NÎ-“&¿¢û¢gMî[∆<ìã7œESû<™n5õçÁstú‰õI¿à‹∞l0 )\rãT:\"m≤<Ñ#¨0Ê;ÆÉ\"p(.Å\0Ã‘C#´&©‰√/»K\$añ∞R†©™™`@5(L√4úc»ö)»“è6Q∫`7\r*Cd8\$≠´ûı°jCåãCjèÅPÂß„îr!/\nÍπ\nN† „åØà Ò%rã2ﬂ¿ÍÇ\\ñ•BûŸC3Rπkã\$ú	åÀä¨[i%ÃPD:»„Lí∫<âCNÙπ“≥å&†+•Â åö}â√xÏåÀ¨˚háÅ\0ƒ<° HKP‘hJ(<∂ SÙÅ®^uòb\n	∞∆:—¿P‚·çï˙\rÉ{Ωâ„înº∏”»⁄4° PÇÎ;öJ2ås≥\"Ö©‡“Ωàí¯ÇêÆr‰ ç ‰†\"•)[çS§ˆÚLî%Q≤oST(√o∂W¢W!'Œ∫G\"@ê	¢ht)ä`P»2„h⁄ãc,0ã¥K_lπÆSq!Ccƒ4m*Yç„0Ãı›)≈¨9%RRrÉŸˆb&ÿ§(¬r7®	ËÛ2C®∆É\$0ÍìX´ª\$6cñÅ_oÍß‘9≠2ÖòRú\nÉx÷î¶)¡;(OZêeÍCK†€£•ããT∑IŒpÀógÍ9f±≤1æ0nà9¶ÈÀN¸6C4;:ç√8@ åô™¶påîÉaáà –Œå¡ËD4É†‡9áAx^;ıÅtmÀ@+†Œ•zêºπÓh^›ªrÛáÅx¬oâ˙Æ	Ø¶A‘96Q∞<oªÒ\"k\rø¬))e/ﬁK;ÎM–t]'M‘u]`Ô◊r´¬v]†›⁄§Ì›™í6é\r~Ú√M‡Å'B~®M§-}≥ ƒà‡	È(Ñ·q≥wåäQËe\$Ñÿò#§sÀqáqH0Ü7rC∫ﬂ\$∆éêw‡°œ`9¥'—ö@oi@Ç¿cvÅœ™N Ø~	∞Ÿà±ó\r≈9íÜr\\ÇräD\$‹/◊ÎëB\n\n ( ‘`¢® @írºåLXs#…\0íƒhsWL&<ÊÃ’ö’æl_6FÙ˝ ¬Ù±Cπ‘'æ\"ò–¬µªgm)0µ¬fg[1≤R°¬†vß§∞n\nÏ°4+\r·2ÄÖŸ“*\$&(aCÕÏÜs§c”(%¢≈Dcü·ÖÆh\$tW1ã`\0Å‘6¶Œí!ÇI¶í\$M\"H(-õÜËo\rëùXEy\rbÂÑ??°çb°¯od†gïÅ@'Ö0®à“ö7'â’{\0Œï¶≥{	t2RKçÒ<'ƒfh ßˇ	&ëùÑÿÊ‚`’‰á:Ê]≤I¢cèÈ∂X®ÿÅ™\"ÏòQ	àj;ÇÍ0Tã§ıPîXøfÎÖ;ƒë\0Ä•:ûäŸÎp-ÆõÍqQå&+ÿúSs@öéÈîßã¡h∞¬ìD_6'C*¢¿\0PC<A∞Œ@“∞©1\nAN 1I2[ñ)-íâXìß‡¬V*,5 »X‘¬®T¿¥p‹·[ë'¿Œ©‚3Kã§`^ˆü˜.HBˆâÙß#ƒÎYª[GH£…â1aò<∞Â∞gCôoTˆ–-H0ä5£®g*®PÙ !x\ruŸÍ‘K!zo‰±<˙8Q§Å∏0@(&\\kzÅBiH‰aã¶DQR·±hˆ(Ê?√^ßÏeÜ™vúE¨∆»Hd´+fêÒœuêÉ ‡ÿ´ÙŒKX¸∫/& œR)m=∞…9¨\$E\"Öj&‡";break;case"pt-br":$g="V7òÿj°– mÃß(1Ë¬?	E√30ÄÊ\n'0‘fÒ\rR 8Œg6¥Ïe6¶„±§¬rG%Á©§ÏoäÜiÑ‹héXj¡§€2LéSI¥p·6öNÜöLv>%9êß\$\\÷n 7F£ÜZ)Œ\r9ÜêÃh5\r«êQÿ¬z4õ¡FÛë§Œi7Mëã™ÀÑ&)AÑÁ9\"ô*RQ\$‹sÖöNXHﬁ”fÉàF[˝òÂ\"úñMÁQ†√'∞SØ≤”fê sÇ«ß!Ü\r4g‡∏Ω¨‰ßÇªf¯ÊŒL™o7TÕ«Y|´%ä7RA\\æiîAÄÃ_f≥¶ü∑Ø¿¡DIAóõ\$‰çÛ–QTÁî*õçf„y‹‹ïM8‰úàçÛ«; Knÿéà≥vê°â9éÎ‡»úä‡@35–ÍÃ™z7≠¬»É2Êk´\n⁄∫¶ÑRÜœ43 Ù¢‚†“ê∑  30\n¢Dê%\r–Ê:®kÍÙåóCjë=p3ú†C!0JÚ\nC,|„+Ê˜/≤∞àœ∏éÚ∞ò¶	\\“Mp‘◊•cöÚÀß\"c>≈\"Ïä§æ>≤<¥Ω\ni[\\Æå™ÕâÉz˛ˇ©„íz7%h207´ÚÎJÚØA(»C ”’D€ÅCÕP˛A jÑÅù`ÅBÉN1é¥Xö0I¢\rà	„î|¿—ä2§2ÅB	ÜS¨N€⁄1ŒÏ†äß£KˆY©ÍËØB\r(<JJZ T®8√mCcx“ï%âríTî˝’m72¯û^:í«ÅCœ}ÅB@ê	¢ht)ä`P»2„h⁄ãc,0ã∂ìkj:´{ÅCc 5Mb^Ô\r„0Ã60+åÖ•™Kïu≥b†ﬁ†ß√ÃBÀé£ëå√™S`—„òXÇéY÷uøÏ·O™.öaJsõ\riX@!äbêåÔ•äYyÑ2\\Ò›¥ñÖA∂+¥úËÂœ:Jﬁ‘\réÖ2MÓÆ◊?WÃ=;\r√8@ åöä£ånÑÌ&‡¬÷¥c0z\r†Ë8a–^é¸Ë\\0πlæ·zV©,\n¶Ë·}‘∑œHxå!ˆ^ë∞´ ‡ÕtèCpÍa¢£([?õu+∏â¨ròú+c0›€GÑw!Ú|Ø/ÃÛ|ËÔœÙ4ßF9tΩ<ËÀŒ˝j∞	#h‡⁄Ì„ßg⁄Œ\rƒú:(¯ËŒ…ﬂA™EI©SånÀ·øqÊa‹\"¥zMÅ∑=Ê¥≈≠£&º…–h;¡Ñ1∫≥˛÷—)1â9/•\$óÅ\0aœ=3„n⁄CQÕ:?√Äwè∫N!/]Jí‡ÿ¿…ù\rÕıßc†F2\"qËî√\"ÇIÅ\0P	A!AX\$®≥#3\$…	a\$ƒ†úÑ3†• ÈÈ7\$ÄŸ≠£lß‚±∏8GÒò%Ç“Ò9>0ı 0¬≥Ã)ÄÕà™ˆBŒÒ¬ÅoDÖ6nÿÄuÄoI\0ÓpChD3πVÎ#„Ún!DÍ\nè§ŸC(®éTGÁ‰ê‡!RHHò<7âf¢äCÑ‹òDÚﬂÃz\"°‰’¢B®É±+«‹5|YêŸß!√¯÷É¡D·=Œ‹BÄO\naQ%\$|OS≥†#Åù*ùñ\\Ëd§8òú5&P	ã&óÌ¬ÃcFTÀ≤\$;Œ\$7\$\0ŒÆc˙–3®µíLX¸Õ⁄¡tÙ1‡@¬àLCq∏.p@Ç§T' |£Eh4Oú…Dù¨I‡iŸß]´ΩXÆN)rö¶\$q}.Û|uaÉ>ó©≥NöÈÎ`<)ú™UñB*L*=”©zTËú⁄WÂR¶Ï\0!ûPÿ\nÊ»iWƒX7Ü#G=K≤¡zΩ«•„&V	9‘p6°Ù⁄pU\nÅÉÖ‡‚LìÅ©™|—‘jxªé¸Ø!ïQzö*`ií&_îñŒ®ÄaHÒ \$Dí1íì0∆÷¨ΩÏ∆ƒ¨Cyí¡ÂáP∆h√ô\nn	p∆»´qÔ>•N†≤ÖÄ`Y÷2u≠*…ªRcÈ’ÇGz¥óƒÚËôG¨ÊÙ≈\0•ËJµ(j=+1t»ä1zK©ëN£û¸©≤ù∞ñ=NX€N»∫Öcd2\0†Ü∞VBàX ?¯f¬èƒ¡è§3n-!çG&,∆€KüCöæDr\nB/0";break;case"ro":$g="S:õéÜVBl“ 9öLÁSê°àÉè¡BQpÃÕé¢	¥@p:ù\$\"∏‹cáúåfò“»LöLß#©≤>eÑLŒ”1p(ç/òÃÊ¢iÑièLÜ”IÃ@-	Nd˘È∆e9ù%¥	ë»@nçôhıò|ÙX\nFC1†‘l7AFsy∞o9Bç&„\rŸÜé7F‘∞…82`u¯ŸŒZ:LFSañzE2`xHx(ín9ÃÃπƒgèíIéf;ÃÃ”=,õ„fÉÓæoèﬁN∆ú©û∞ :nßN,Ëh¶2YYÈN˚;“π∆ŒÅÍ òAÃf¯ÏÎ◊2Êr'-Kü£Î ˚!Ü{–˘:<ÌŸ∏Œ\nd& g-(ò§0`PÇﬁå†P™7\rcpﬁ;∞)ò‰º'¢#…-@2\rÌ¸≠1√Ä‡º+CÑ*9éÎ¿»ûàÀ®ﬁÑ†®:√/a6°Ó¬Ú2°ƒÅ¥J©E\n‚Ñõ,JhËÎ∞„P¬ûø#Jhº¬È¬V9#˜äÉJA(0ÒêËﬁ\r,+Çº¥—°9Pì\"ı†Ú¯⁄ê.“»‡¡/q∏) Ñ€ #å£x⁄2éçl“¶πi¬§/“¯1G4=C«c,zÓiÎ˛¨¿¨√4ºL¨BpêÃ8(FÎ®¬œ Cì:&\r„<nú	öä7RR;Jø¥\rb∫úAN˚JåîD≠@6ÑÅ≈†PÚ¨PP°pH⁄Aà!°È\r^ªØ(ÈD€˛¶ê«†0(¶ ∂¢(\rÈÑ◊vJ–x‹4•\r(àú\rï8°Z¶âÙÑÚ#åä`≈KÕ…à)lV»aNMå¢∑Åp £c6‡b0∂&˜\rÅj◊ÅR®Í6ÅB@ê	¢ht)ä`P…ç£h\\-è9»Ú.∫W£6ÙÅCe6(›_D√0ÿΩ≤ŸË‰ùÕJòºÄP®7∑òÛ4®∆´écòÃ°çïk‡cöÿ√WF1é&Ô a@Êß¢¶)Œ\0ﬁ5“Aë°#*O\nêÕ'–‰¢™±n˝©≥A\0∆”ÎÍ¬z*6êBù≈FHKÏ*^ò9m‹z√´¡‚X4<É0z\r†Ë8a–^é˝»\\•)ï†‰/8_I¬˘/ªÅxDxÃRˆ3áÅx¬r˚˙Ü–°(|éGC¿·'1[D3°∏ÏÎÙ◊nÉBÒçzûâ∞´ˆèƒq(Â`¨^˚…ÑP@Î+Æv…⁄;gpÓù„£xÒ·ÜÁÜ·	y à©‡íõÃ™ OEÈïúüŒ8oX'ˆ∑∆¸àUêaVÑÊïÄ“ˆë Å°à:ì' zâr∞/‹Åπp–N´»0!‹ﬁc&M√ìäOÎ0ÜgÊcú´aldŸ≤Ütc9¿á‰ é•'ˆ≠CI}R¶ô)áªIîd+,⁄∆∫˜d‹)zNÍ·V¿Ä&ËµŒ‚¥Jœ=Ωê“n–\"¡C·»:„íÜ»‡ll°‹ì“4ü— ]T\r-Q‡ÊH⁄\"AÎˆ2ò∞Œy ∂á∆âø‚X—Wo∆„ìÇˆHıD¿Ä;úÄ∆\n!\nv&úKW%(\rñd‰§°îRéGíÈ%W&µ.‘>Ω„|@a≈eÇü\0\\àj/Ö«\$<E√…≤}´H›ŒAN<Åƒ:∆≤ZÉ»Û°w§Œ-7–∆ŸP±«9(àﬂ?∞CQC\n<)ÖIJ¨ëÌ<ì|*1ê˚°®µZ!v⁄f/.:QE’P›1.!iQÜRfO\$É'h˛1¥Yé`Ne)Oq¡>@¶Ba[G&Ïñ`®‰Ôo…ΩByÓüâÀO'Ä)\\H¨VR£%åjn/#FÉôe™Ü´\$j≥6™·ZöH(ÕV*™j∫ÅU·ÖC’∂6|	ôä¨L6¥îHDIq+èkiπ®eòªca∂øÿ?a\rR∫5Õ’@Ü¿W?◊¿k&Í b˙⁄:±U-ŒX√3cí\n9\r°÷nDtbB†F†·E≥2}âÍ∆SI`∑¯Ù≈≠’ºdu.Eô{Ì\$Hqüj?mŒQì.¡6∆áñdV\reÿF™q</‘Z@Q·3Kl+Y˚ChY.Ø÷ù|W£‘‰»Â	Le¿!® BÆ”XC∆ªR÷Å`ÿ∆qU:¨)O<*H¨_\0Q5M ù´ï£»∞ëä&§M`ÿ[\$y.≤3R.≥*∞√\"◊l™–ËÑWºàıLëÜt! ˜4ÆäÏj∆H V9¶WoögÁ\\‡á@";break;case"ru":$g="–I4Qbä\r†≤h-Z(KA{ÇÑ¢·ôò@s4∞ò\$h–X4mÛE—FyAgÇ ⁄Üä\nQBKW2)RˆA@¬apz\0]NKWRiõAy-] !–&ÇÊ	ê≠Ëp§CE#©¢Íµyl≤ü\n@N'R)˚â\0î	Nd*;AEJíK§ñ©ÓF∞û«\$–Vä&Ö'AAÊ0§@\nFC1†‘l7c+¸&\"IöI–∑ò¸>ƒπå§•K,q°êœ¥Õ.ƒ»uí9¢Í†ÜÏºL“æ¢,&≤çNsDöMëëòﬁﬁe!_ÃÈãZ≠’G*Ñrê;i¨´9XÉ‡pùd˚ëë˜'Àå6ky´}˜VÕÏ\nÍP§ç¢ÜÿªNí3\0\$§,∞:)∫fÛ(nB>‰\$e¥\nõ´mzî˚∏ÀÀ√!0<=õñî¡ÏS<ê°lPÖ*ÙE¡iÛ‰¶ñ∞;Ó¥(P1†W•j°tÊ¨EåÅB®‹5ç√xÓ7(‰9\r„íé\"#†¬1#ò Éx 9ÑhËãé£Ä·*Ã„Ñ∫9éÚ®»∫ì\nc≥\n*J“\\«iT\$∞…SË[†è≥ä⁄,è¢D;Hdn˙*ÀíÍR-e⁄:hB≈™Ä¬0»S<Y1i´˛Â∏ÓfåÆÔ£8Åö∫E<√…v∂;çA†SªJ\n˛åíïìsA<…xhëı‚à‰&Ñ:¬±√ïlD∆9ÜÅ&Üπ=HÌX¢ “9Àcdæπ¨¢7[∂¸…q\\(:£pÊ4ç˜sˇV◊51på∏„Ñ‚@\$2L)÷#Ãº™\$bd˜◊»j£bö˝eR‡≠KÒ#\$Ûúñº1;Gº\nsY¨Ó•bÂcéΩË–πÅ(»’ßI®ïeãÎıóÂfÉYô1/}åXdL`°pHËAä3áY\ndÜÙ’‰vlºóâU¨œG&ÑòPı.3jjûËÿ’Æ/ƒ(©#+A†V§AvíêÔ÷*ö’jüûa™Ë•—◊¢¢Ø∂J•4hß+Ì^EË\ru_Z\$ä®ë–0Û„•\0∏ÊÆŒQÉ)Â\\ör≈»Oœø)rœw1ÅÛjrAœÙ<z˜…U∞[‡ÜıYÜNÌ© ?y>YO3\\·—†§ìû4\0P£(˘hu≈‡\\-ØEü™.»ô¥è\rÉ†Â\"6÷\n≈W\$oõ˘`¥pïÁ!G≥>8±yE‘÷Æ•@/\\ålò∂çîlÕ™Ù9\n¨˚úÅt˙\r#Ø%M!⁄™Tåû”ÈL=«\$Ç,§xw#∫kÂLAú±ÏÛQÇÈ®?x&ıü—B# …ˇê%\0ù®ãÄß'Ò`€òiyrá\"ïX\"P`ô·Ç•Ü¡ñk»|&¬.«È	≥ÆÑÓÕ˝¬≥ïaîU–ú√C˙P‘7ÅpÈΩ® b\\@dqí∑VÎè§ITLı\r6%>ÅXQR4≈å!Ö0§Ål3Ñá 1g&Ì£√É'\$îÜ,1JëÅ^Q\$¨∫êgW°\\r¬GboÛ(çÄ†®\nKLÅôqUﬁÉ8 !ê6Üê‹îÅ` k≈wÜD§‡a†9PÃAhÅ–80t¡xwö@∏0ÀIlîÅrU‡ΩvÇÙ¬π¢\r¿ºÈæñe∞gÄº0ÉÂF©`<uá—‹ö1√∂` 	Ù\nÁ„á.`‚òrJ5¨x|qXÈLîMÿÇóRí¢£A´–Â1(ß∫m”aÃYè2f\\ÕôÛFiÕYk-“¥⁄õìçu.≈›8ß!r√A|ïöû®9	ùsµ˚ò√H\\Cúπ–Õ#IrÇGŒ·DÚA¸∂ˆ.IDy`èoIgœÇõ>–“†Fò’¬„§x1Qœ˘‹ÈL¯asÖxÇ\0ÓC`lâ/á•+êm¨¨0Üeÿì@ciå9Ü`Î\\É`oÚ⁄∑êËèKÎrΩK©ã/Ét·!∞9óS™yR9'QàuGïXËÑÁÈ;.©'‰5‘\r°~ñë0*n€–’H(hX˙!Û∏∞‚» »îpÜºeΩkù6D7Ç\0‡ÉHvÆî3◊ªúõ\"€L°Ω3ŸªÎ›û!ÆúË*ˆ\r‘”^∂œëX0Éï(ÿZÇ|ÙR2∞Rè)“í_ªS9¶Î,eí¿∏8T⁄õ”àrea‹4ê«d%®gôUÕ/‡ ∆epe.™Ùíô„Ëı£ì9~‰Ñ•œó\\HX+¯Ω\$∞üEwpé	TPâ–Y±ì˙≥jW§\0∑ƒÓí°FQ*I⁄n\"1>©\"2%Jd†1J±T‚NËÈ¥˚*…¢Xvâ&æJY“yqïê⁄•~÷)≤lâN–Ü°Ø»ÌB8J””∆DQá ´¡¢\"õ∞ \n<)ÖJ&púYá\r!˙?8—OJûr)π÷gy¸‘c\rRÖ–˙Jb˚qô(O∑–Ù-lœåK…'8|¬6ëSNA≤?®è€E˘oH@í∫≈◊Ö3¶Ú∫¶≈◊ΩÃ‚˝3† \naD&H\nUI‰*ÄuŸÚ)È›¨(÷GR»l((yˆDHnFDπ-sFîø lçˆ¯–‹'aè¢àx˛æË.ª≠›íq∏÷P=jÅîLyãK´¢-á≠A∫‰o∫#~π‹{Ÿÿp,ï¡K9`>Z≈›p•Í.8k≤r<C£u≈wıV∫ÕÒ∞Kk°¬ﬁ\rÄ¨h\nòÚ≤†3RÖ≈w\"Êﬂò1mdQ„DGT&„j-L€TﬂÉrrP§‘Æ¨‰ dáUÿeW⁄f2’±îÑH0@B§Ä	—◊mA\0á:°-≈ÆÆ~œ^Ë”_ΩÅ≠v\"ˆÃ;)yìÆ√¥¿-™áosóÓ\"2—¶z•Œê‹òÏ¬,§]“ê\${Ω*‹”wöHˇ&\\E#‰Ó•Í)…∂¢9πòì‹˝9⁄≈C+Ô∂mt|¿6/˘NÛàYÍçsù´eÔ-C:at◊6ü NÇÑ*˙'îB‚0aΩÊKI_ ƒ≥√î\$b\$|Fí,MWz|íbK!#x+]“@f‹Sñ4´b1%<ÜÌ8`ßÈ∫wµØâ4Ã›Ùôˇ.„ûÀhÌﬁ(åâ¢ÿ’-¨Ω∆‘måJÓŒæO\$ÌInàri\"Çû!dÒ£ˆ~mN9A\nn∞&Õ/æjœﬁ8dà¨ÉBâ√§";break;case"sk":$g="N0õœFP¸%Ã¬ò(¶√]çÁ(aÑ@n2ú\rÊC	»“l7≈Ã&ÉëÖä•â¶¡§⁄√Põ\r—h—ÿﬁl2õ¶±ïàæ5õŒrxdB\$r:à\rFQ\0îÊBî√‚18πîÀ-9ù¥πHÄ0åÜcA®ÿn8Çé)ÅË…DÕ&sLÍb\nbØM&}0Ëa1gÊ≥Ã§´k0ùç2pQZ@≈_b‘∑ã’Ú0 è_0íí…æíhƒ”\r“Yß83ôNb§ÑÍpé/∆ÉNÆ˛búa±˘aWwíM\rÊπ+o;Iî≥¡CvòÕ\0≠Òø!¿ã∑ÙF\"<¬lb®Xjÿv&Ígç¶0ïÏ<öÒßìózn5ËŒÊ·î‰9\"iHà0∂„Ê¶É{Tãç„¢◊£Cî8@√òÓâåâH°\0o⁄û>èÛd•´zí=\n‹1πH 5©£ö¢£*äªj≠+ÄP§2§Ô`∆2∫åÉ∆‰∂I¯Ê5òeKX<é»bèÊ6 Pàò+P˙,„@¿PÑ∫¶í‡)≈Ã`é2ç„h :32≥j¿'àA¶m¬òßNh§´∂CpÊ4çÛÚR- Iò€'£ “÷é@P†œHElàü¿Pê’\$r<4\râÑ˛¢r®®994Ïî“”îÚsBsêù£Mÿ◊*Ñ£ @1 É†Z÷ı»Û]÷’¿‘÷é¿PÚ’M¡pHY¡ãÊ4'Î„î\rc\$^7ßÈÎÂBMëu∆	âu#X∆ΩæcÑ•kà°k÷èÅB|?å≤§ãJ√q,‘:SO@4I◊≤Ö*1Ço9ﬁÚ¢t^©µ∞Ày(¯\\·C`”Ü`„\nu%WòùÊ60∏¬nê£xÓÈb/Ó(èπ	KdíèT∞ê	¢ht)ä`T26Ö¬€˛ˇã∑mﬁ¢íƒ™6MÄS:§£™`ﬁ3ÿ“0®ø…Ì{U%\r>…äÉzBıç√»@:œ√®«écòÃ:çÅ@∫O¡cX9l√œäøãÆZ6Æ£´daJR'#7÷÷8i»@!äbêå3√çDc2&6Ó@=4nJSÆS∫ıV¶-c(ƒ2”âÏB+ÿ»5é©H®–?\r_4ä≥¯‹3Ñ…¿#ñÌO√M¥äà≤H2å¡ËD4É†‡9áAx^;˚År˘‚?¡r&3ÖÈ»_¶c•\0007·}Ù@è8xå!ˆ±∂˝q÷ª„Ï™)Y)äÖÿ!ƒ<Á›a%\$ÆD(€P∏rbA‡8ê‰â\\£Õ=ËΩ7™ıﬁÀ€{Ø|∫æ∆˘_b|')˝@æ“úÇHm·5‡Ë¸ﬂ™r_·†ç∏¿@z√YLQn¿ˇ6Brº,?é¶±¯~ÔK⁄∑%öìrrí]∞h)ÅÑ1æ•πn.Æ\"'vöï∞aÃÕ∂≥T€õÉr\rÌ“0(∞–k\"—M@Ä1¡uµ\rãÿlFFQŸt\0è	„Ç·πV‰\\â˜+A¬'s,SAàD‰1·Ü/Ydáë\"∂Eû0@\n\nsÜA\r@ëà∫y·Ò•4·î‘´d\"\rYµAà8Ôí\0Ôkâ@ë:\0 i:∫ a#àÂ€üËÑj»∞sBà¸7‡ÈK®ppN¡\n¡lÕ£,pùÍ+sfSaw°îî±ò\nã–∆äÏ@ıí“^L[+∞[Ç55œ¢lN\\wV'ç £†/O\n#-e\nî‚RHXy3“EÂK≤NU¥◊óP\\8áSTÉÉ2\0CÔ	IÆ„É @Ò‚]!CRÜã`≠cGÑû)DêíÇÄO\naRH¥™\rO\nãA\r(‡ìÇ\$ÁË=	)ê∑†“íäÉ1sß~™)√XtHmöá4Í':O·Ø\$‡´rÊòQ	ÄÇ®ßEÇ0T\n7+b]-Ê≠ §T]R>…ÃÇ≥V‰‹Ïáì÷@À≤∞\0ã\$®pj»u;·§=I€_’êaO8Ïõ∏Æ(IJºV'X»¢˚HòvÜa‰;äJBl\rÄ¨5±£ÛPâ˙S¢¥„ÌVHöIèÅ°¢0ı\rLë)ƒ|¶9¬≥9¶©¸\n°P#–pQY<ÛµÖ◊r&±\$ÛWÅË∂®f.∆X›ﬁBVZ·^; T=ÁdÛV]˚Ÿ(#ΩÓ.Ç¯3Ç(&â4GYÉ˙hÊL&›†Ãì¨©Y5Â¿+HÅJH“qØ\$¶(∆/◊?\rJI≤XdÜ¶0ËŸà–u:Ëåç´4QÜè1'%!07÷@⁄D–BJ∏–ærõ	Å¯J§i)¢V*◊Ãü'í\"†ì‰ØŒNXaŸLßîJ\n≈\nk‰2≈‘JÇY Å&0\"¡Kæ°å∑ZkTé4äàÎÕæIÑÈ_¸`“®R ©8√·≥Äè\nk( ";break;case"sl":$g="S:Dëñib#L&„H¸%Ã¬ò(ù6õ‡¶—∏¬l7±W∆ì°§@d0ù\rYî]0öé∆XI®¬ ôõ\r&≥yÃÈ'î Ã≤—™%9ê•‰J≤nnÅÃSÈâÜ^ #!ò–j6é ®!ÑÙn7Ç£Fì9¶<lãIéÜîŸ/*¡LÜêQZ®væ§«cî¯“cóñMÁQ†√3éõ‡g#N\0ÿe3ôNb	PÄÍpî@sÜÉNnÊbÀÀ fÉî.˘´÷√ËÈÜPl5MB÷z67Qç†≠Üªfnú_ÓT9˜n3Çâ'£Qä°æåß©ÿ(™pç]/ÖSqÆ–w‰NG(’.St0ú‡FC~k#?9Á¸)˘√‚9éË–»óä`Ê4ç°c<˝ºM ®È∏ﬁ2\$öRû¡ê˜%Jp@©*â≤^¡;éÙ1!é∏÷π\r#Ç¯bî,0ÅJ`Ë:£ç¢¯ÅB‹0éH`&†©Ñ#å£x⁄2éÉí!ç*ËÀ√L⁄4AÚöè+R¨∞< #t7ÃMS∂è\rØ~2é»˙5ƒœP4≈Lî2ÅR@ÊêP(“õ0§*5£R<…œÏ|h'\r 2åíXËá¬Éb:!-+Kå4Õ65\$¥AKTh<≥@R–Å∞\\ïxbÈ:ËJ¯5®√íxù8à“KBÅBdíFÇ  ‡(Œì®ı/Ç(Z6å#J‡'åÄP¥€Më§¸<≥¿†êî-¬˘oœhZä£¬É-ühÆ‡M»6!i∫©\r]7]§´]…Ì‡Ÿlï5,^…–]|‹®`—sﬁò°iQ©xÙî\r@Pê\$Bhö\nbòç°p∂ıΩbÌî∫≤à,:%†PŸ&ÅLS *#0Ãù*\rTö2»ŒÌ©@\$œê*\rÏï†7,Ùƒ:åc49å√®ÿ\$l≈I∫(√∂ç•ˇ4ç√™aLG6.‘Œ\rÈkê!äbêå˚Øq4C246È“\0@Î†Px÷÷éê#)@&„®Ê8g\n<óäås ÕÓ“ÔË\r\"∑=PP«2@„#‘âªX2å¡ËD4É†‡9áAx^;ˆsmÆ=Ar43Öx^˙#…,»ÑA˜xî∫‡^0á”2mÑ<	e·∏@©Ï7¡VÂ¥PTFxÄ•‚k‚ÄÀØÁ\0@R¸\\ΩnÇÙΩ?S’ıΩcŸÛól9w–À0AÛ‹\n@>	!¥8tñÉ£∆y	yIÑ&⁄–(ÑêÅû¶ÜÉ‹\n}Bh0ﬁ/%éF\n£\$Ñô%Œ»JYqÅ†Å∆Ôé@wZM<∫¡P‰‰RZ!ôFê“üMiÌD⁄C Ë¡‚9aÖ%Ç\0∆^†¿i#·ÃóÑ\"\noO°°CX©6xx!\$¨,°u[àH\n\0ÄÄRGI2á¡º‹Ú^”!PÖÓPŒês,fÉ&?Ül“üp@G…\0wR\råú®†dŒ{JÖg®ÅHU‰öQ«4rT7º@œ˙HP;ö@∆¡”Hgu\nåÅDòú\\1.&»ö“åﬁ≈\n2aàV9õÑX9‡óœ0Çü\"DÉ„≥q@œMÍ®Ÿj•“Ÿ/	\$L<ò≤NP°h?=\nDy\nACàu3D¸3¬8Âù¢]â' 1í‰h‰)˛3.	≤¢x…¢‘gD‹(¶ÄZha®ÎÕ	q.â¯å»dèíc¿L—⁄† DxÂ#(–ÜŸl÷kòœím!·gL(Ñ¿@ñë0‹#H÷B–¢?d˛\nNTî†Éë3~…ÙΩ)&N°îâa∫z)òÛ	Í*R˙¢S≈ §äC≈˛¶• 1»ñÎ˝G‘gBùWAıey6WTí¯¨\$n±ÀÚ(øê•hIÅ•Å÷∞ÀV%˚´u∆û§∆ÇM\rÄ¨5œcjN—h'—†:õÚQâxF•0E√¯jm®T¿¥%Ä‹ÊÀÿnÂ‚9Ãu^ÏAÜ£l*⁄Q}[óöˇ0ñ™∫\0õZHm|è_¨&ŸíY%m≠uya»¬€Ê«H’w6u‚¬Ë]ì¿MBa§3í»mâå(©‡)h\\ü√ö+V5H4NI‰Y\náù≥@ßŸ™Â∫ıô UbIÈ%%·07—Ú2AJsX7ˆ–ù\0lV±∂8(–!ó`@kC”N.jN‚Z•;ÖmiTVÙ√Ü\\7qL9ƒ∫ΩH\0†ñHb¿:qÕ€tJU≠€°L¢ˆ#OwÉC?πÎ¿æ‚\0∆q+≤\$°¿";break;case"sr":$g="–J4ÇÌ†∏4P-Ak	@¡⁄6ä\r¢Äh/`„Pî\\33`¶ÇÜh¶°–E§¢æÜCö©\\f—LJ‚∞¶Ç˛e_§âŸDÂeh¶‡R∆Ç˘†∑hQÊ	ôîjQüÕ–Ò*µ1a1òCV≥9‘Ê%9ê®P	u6ccöU„P˘Ì∫/úAËB¿P¿b2ç£a∏‡s\$_≈‡T˘≤˙I0å.\"uÃZÓHëô-·0’ÉAcYXZÁ5ÂV\$Q¥4´YåiqóÃ¬c9m:è°MÁQ†¬v2à\r∆Ò¿‰i;MÜS9îÊ :qß!ÑÈ¡:\r<Û°Ñ≈Àµ…´Ëx≠bæòíxö>DöqÑM´˜|];Ÿ¥RTâR◊“î=èq0¯!/kV÷†ËÇN⁄)\nS¸)∑„H‹3§ç<≈â”ö⁄∆®2E“Hï2	ªË◊ä£p÷·é„p@2éCêﬁ9(B#¨Ô#õÇ2\rÓsÑ7éâ¶8Fr·écºf2-d‚öì≤E‚öD∞ÃN∑°+1†ñ≥•Íßà\"¨Ö&,În≤ kB÷Ä´Î¬≈4 ä;XM†âÚ`˙&	…pµîIëu2Q‹»ßçs÷≤>Ëk%;+\ry†H±S I6!è,•™,R∆’∂î∆å#Lq†NSFÅlÅ\$Ñödß@‰0ºñ\0PàÌªŒX@¥ú^7VÆ\rq]W(Îç√ò“7ÿ´Zï+-ÌE4˝\"Mª◊AJ¥*¥≤œÉTá\$äRù&ÀäHO’ÈÃÕTÛæS≠ ˙›\n#l•–Öƒåà#>Û°ÄMÒ}(≥-˝|≥ÿ\n^Û\$í‚HπÅA jÅû ≠w#ÛW#Ègt3ÏíÄÇcik¸hÙê˝ºıM÷õC\$5–H&fé]‹–´Œ≥Ìc\"í®(]:≠ƒD í“⁄Üî\"*£q√	=ød©Ñ6Ø™ç}˛∫≤*‚Ç,eﬁ¨CR¬Ú∫N…‚\r6†Av†k/jh∫k∫˛À°,HÇ+∂lÀikµj˚)≠)i˛Â†ÏK6Ò§≠™û3•†\$	–ö&áBò¶í`⁄6Ö¬ÿÛœè\"ÎEõ‡π’1FKâéﬁ\rÉ†‰‹∑a\0¬98#xÃ3\rêê ©ƒ‰ãËí›aÑ\nÉ{à6å#pÚ∂(Í1ånpÊ3£`@6\r„<\$9ÖéÄÂÂå#8√	%˛6¬C´ÆaJ÷¢,s=O9¡\"¶)“úûZk¯≤ÏÇ“Ÿ7n≠`∆ïÖ≤4D#&ÑTµä2xOçb+ØÌ·õrÑ\rÚ*9·ô]UåÑ¡\0Aè†7#∫÷B∆à¿¿¬o]†f†à4@Ëò:‡º;√–\\a∫FàÃ3Ç Åz<WÅ—cƒÄD¢Q÷BAú¬ã[(CK–àö¬\"Õ£ÜD≈º≤6w∫OWzÁC-‘û6Dû®`1B	®‰Îá#äíPr_+8óhì!l/\r∆√Xoa‹=˛ ¬XÜ¢,GàÀ#¨eê¡h¡\$6áñb8tä±][ú˘@vCz˘: Å‰≥ÇR20yî7Dö…õAtUâ<äeñLOã®\"Òm?à2Tm'ëÅΩÄ®0pCcâã sîıÉ¡¬)@æCfé©	Ë='®ıû√⁄E”XÏù\0–pCòaî\0Ä1«˘BCle¨Ã!Úòòiù\\C@¢L»óR˙[mèå*t∫Mƒ( \n (O˙ôSÉ,ls˝@R|óJCYñiE3†q1»9G02ØîàÉ°œ;h˝ œó∞ÈkÔ&O…ìSjc\níÇÛΩ⁄>Sü√öGz/ïô^ÉÉÍé·Õ\$§π™vÉhïÅ§3√PA6gq¡aÜ;∂òl÷Ÿ_Cƒe,ìSK@¶]i\$Êπ})ﬂ\0ZyR%P±®j\"ÿ\n°° â8ßd¢ÅJ√Ù_ç’5\0†íHCÀ±Å•|ú4ÇéÉt™;G=⁄ÍsífFA∂»ÿYSëpc{ÍwS4ésX™•NIADQ û¬•u&pôµ˚∫“≈AUºî¿\"jÍ(	3[VÖªÚïb…®≤T§µP®ÙSÖÏ\"Rˆ‡38ﬂOâΩhOÍ*ƒ RÑnçÂcE«MÏDeWÍ‡ \naD&\0ÕJ¡…Ö·*QWíæCLùHØñ–⁄2Då4=4`£µ∫6DäÄ±U‰FáõÇKÉÜ2Fê˛l,(p¡qW>ü€∂“GW ı\\¯:1(∆6L›}m-ØÜﬁ›¶4≈ÎC7ºh}1Z	¡¯∏∑cH]plqîâ§ƒ‡nïh∫ÖÿÜLwÜ÷›}ÅÄ(#_Ä€í\r`|ÅT*`Z‹(≤hL°/˚ß[HyÂ∂oÃå∑ÃSî¢„wŒDÀ:lÏlâï?6˘¬ƒg3L‚®%nóçﬁ·aŒU*R£‰ÇëPeHi¡‰«óW¿eÚ‹\r)ßt9ñ\r[,ZòN`'3£&B⁄√ôkØ2Èît	ç^©Ìg∏÷ºÓí'-J›\\öµˆÿ8-å≤¨b˘6óXçL™Ù<¢Ì2êÃQ∂Rﬁ4œ√qkïÊ¨Bòe9sJñ©:<î.ËZ†ãsQä}g)4Œ™yÇ˛Àn7œVÛJ6z“IÎ84êPnf4 vxQ\$H_Ä";break;case"sv":$g="√BÑC®ÄÊ√RÃß!¯(J.ô†¿¢!îË 3∞‘∞#I∏ËeLÜA≤Dd0àßÄÄÃi6M¬‡Q!Ü∂3úŒíì§¿Ÿ:•3£y bkB BSô\nhFòL•—”qÃAèÕÄ°Äƒd3\rF√q¿‰t7õATSIû:a6â&„<¬b2õ&')°H d∂¬Ã7#qòﬂu¬]D).hDÇö1À§§‡r4ù™6Ë\\∫o0ù\"Ú≥Ñ¢?åÅ‘ç°ÓÒzôM\ngûgµÃfâuÈRh§<#ïˇåmı≠‰w\rä7B'[m¶0‰\n*JL[ÓN^4kM«hA∏»\n'ö¸±s5Á°ªòNu)‘‹…ù¨H'Îoô∫ä2&Ç≥ 60#rBÒº©\"§0é ö~R<ÀÀÊ9(Aòß™02^7*¨Z˛0¶nHË9<´´ÆÒ<êÇP9É»‡ÖÅBpÍ6ç±Äà–∆mÀv÷ç/8Ñé©C§bÑÉ≤„*“ã3Jê¡™`@ºØh4àãé‘,´JåÏ§ûØH@Œ3∂ Pò4®é∫¸¿Lé∞ ¡S&°\r£tÃõøØ¸Ã√±HË(!cl@ô\"ËËŸ>\r»Ëœè(0¬© ƒ<£‡M\"Rh¯Ê\rL‹2ç@PHÖ° gRÜÆJn&Ú3ΩHBõ|¡B 3ƒêÄÁDÆÄQÜBéà…H9<H6T\"-òB4HRŒ»Î7«È0Œ¢π#X“1çl.2Ÿc`@… CÕ\"„ùµn4!u-\\7'L\\„M”u€Ø∫h7©®ê	¢ht)ä`PÛÉè!lh§`Uçd oÄ6Dh¢\n÷\r„0ÕSÌíWOsR:»B3>\r®”+îMòÿ<›è∫Æ7PÛyåÒl9 Â≤ë∑#l,í\r®ÓIwdŸﬁQï1Z(Áóf ACQS'úåÃ˛{üÃê2”°Âó„Nö	Îv(∂Ñ¶)¡j–Ö&a\0ß|%,0‰6é∞{ãBÎ¨~/aÑ‚T:f´¨\0Ï6Êt–8H\$¬(Ç2h¥¯ÂúÚ&∫óºäSV≥≠\n.%#Cä3°–—òtÖ„ød\$\\´¢å·zdåÉzÑû˜¡xDwº∞¬„}èi„O}y Oÿ‡—Ú·3†p©J:´Ô©®Í;£#˜<ÿà∑†í¶˛ü%«”ı=XÈ÷ı˝èg⁄£Ω∏Â‹˜c(G ´Œ\rœ¶‡íCÅ1F§x¡<áîñ“öF•†í5ñîËà¡ü%'›,(Gçë§7Œ,ÉWöÔåÎ)§ËêcpñE)4WÎ•tÀJ5qÜå:Acó1ßÇ\$ï®í&f·Yª(/Í9=¶h’K†s4Ö∫ ò„˘ìLf\$î†√RÄH\n\r∏ü&'6⁄˘ı¡ê´Çò\nJKÄã+∫9†¬M.dë&,Ç.fLÿi0L»8ÂÊk <L\"îèáF»ŸâÍ}âÏŸEE\"Y|»mëb.çK“ e¡Ñ3ïw–	ëˇ\"Œ`ò¢.∑P4.5ÄòÜFnôI±8:n√©O‰bk+ãö«@œYòÉè±c3FÄj≈∞jKmë°8È∫ñ€Ràp¯3,ÚÍÜñzrnÿÅqJ%Å ß’®l∏Õ`sG®Äö\0û¬£>÷C‚Z‡ 	§uuA∑ÃóH–öE1Üìä…ÍFëÃZt\"JIŸ,ài•πòIz‚3D§#@†éélVf¢È√	CíÆD!5˘…Ÿn7Í`ﬂJh£äB‰é'ò∆Ûd£“ïB†¶“£‚IM™\nÛ\\“\0ˆÙcÔ®v°U5–‚Íπç&Å\rÜ¿V–\"Ïè…jO=hjH'Ù¨&¶âï´\n°c÷7§P®€A≈ (™\nâ©z∞˘√M*EÜ\n£U™±Wùâê∂.¢á2h‹Î2ë(•dc^LVàÑ®Ü#LÑ@Q~\$œÀ\0£äõ¢(A(zÿà¢É√spÑï…ÑR˘hòL£(Åcpâì93ÃO\"tMK…)8±Iä-SåY\"±∆4ÎÖb‡y¬Zá(@(\"áã&iÃºÍ–)™∂\"NÂ1Æ°\"œ⁄õ∏Ø≠d5¥8\0";break;case"ta":$g="‡W* ¯i¿ØF¡\\Hd_Ü´ï–Ù+¡BQpÃÃ 9Ç¢–t\\UÑ´§ÍÙ@ÇW°‡(<…\\±î@1	|†@(:ú\rÜÛ	êS.WAïËhtÂ]ÜR& ˘úÒ\\µÅÃÈ”I`∫DÆJ…\$‘È:∫ÆTœ†Xí≥`´*™…˙rj1kÄ,Í’Öz@%9ê´“5|ñUdÉﬂ†j‰¶∏àØCà»f4çÜ„ÅÕ~˘Lõ‚g≤…˘î⁄p:E5˚e&≠ç÷@.êçïÓ¨£ÉÀqu≠¢ªÉW[ïË¨\"ø+@Òm¥Ó\0µ´,-Ù≠“ª[‹◊ã&Û®Ä–a;D„xÄ‡r4ùç&√)ú s<¥!ÑÈ‚:\r?°Ñƒˆ8\nRlâ¨ ¸û¨Œ[zR.Ï<õ™À\n˙§8N\"¿—0ÌÍ‰ÜAN¨*⁄√Öq`Ω√	Å&∞BŒ·%0dBïë™B ≥≠(Bê÷∂nKÇÊ*Œ™‰9Q‹ƒÅBõ¿4ç√:æÅ‰î¬Nr\$É¬≈¢Øë)2¨™0©\n*ç√[»;ç¡\0 9Cx‰Øè≥¸0éo»7ΩÔﬁ:\$\n·5OÑ‡9éÛP»‡E»ä†àØåRíÉ¥‰Zƒ©í\0ÈBnzﬁÈAÍƒ•¨J<>„pÊ4ç„réÄK)T∂±B|%(DãÎFF∏ì\r,t©]Tñjrıπ∞¢´D…¯¶:=KW-D4:\0¥ï»©]_¢4§bÁ¬- ,´W®BæG \r√zãƒ6ÏO&ÀrÃ§ ≤pﬁ›Ò’äÄIâ¥GƒŒ=¥¥:2ΩÈF6Jr˘Z“{<π≠ÓÑCM,ˆs|ü8 7ç£-ê’B#ˆˇ=ã˚·5L√v8ÒSŸ<2‘-ERTN6à∂iJÈ·ÕÑJ5 R≤⁄UÏDî8Ú⁄≠hg∑Ïl\n≥àÂeÆ	?X«JRR•BŸ≤J…dóK™“d[aﬂ•∂®ﬂıë]¨ëv°Yﬂ[5’Ü¡µM)WVù+Ñ£\$e}Ê NÛΩ•ò{ÏhçÃ/xÚA jÑÅü ´Óm€Ë2ß,6äõMƒ∫€∞\"7ú≥”˛ﬁ˝+æ≈\n^’Í‹µ'ÅR.\0ßÙRü@ﬁï*±<∫µ˝Î[Óù|uhZ€n	pÌŸ]qm0Œw\\ú7çg√´êçÔQWπ‡x^'hµﬁ?∫≤.8G±!v˝˜—¢ù‡ƒ>zª|˜∏˙Sf{≈≈ˆ7wﬁà_¿å8ŸÔ%B\0÷Q—ÕA \$†öA–S\n`(2@^Ch/aÊê∫ÂPâ∂®y≥Ûz¢JAJQ≠\0006,ÄvŒËaGà7Ü`Ã@e8(àãB¨Ê◊X…ú¥≥<ÓŸÛ\rÖ´ƒ@ﬁyCha\r¡‰UDCc=·Ã3Pÿ\ngIÃÂg) GF˛R@u>‡†9Çíº¬òR≈ Ÿòe^·_◊Qn…áõ“hÁíÅ»…Ñ)ó‡êÕ!£IœLß8D¶çã¡h}hiµ…ıi‰bÔ%\$·W:D¥îqH3Â‰∑•¬m+\"îê*à>Uß„N˙a>ôêUFíA\0Aë‡7&x⁄’*£âú¿¬w°ÿf†à4@Ëò:‡º;ŒP\\Qfbg…®3ÇˆT”õ\"å∞Ç }<O≤H‡Ü|Ä]ÿ∑ho°Œ≠)¥¢!ÀfçâVã˘d[Ÿä \"+vy6∏ôì°î\r]≥6áf¢(‘ß	©¿˚á#Ãü‘roL†8òv†Ê¨◊\rfmÕŸø8gÂÛûeƒ◊;'pnùÃ•ï™YÍ`I4Á±äÜ‡È?'ÛT¸ÜˆÙ|™òa\rgà4ß‘œfmN†2Å@á–h*ìjJè§˘ıñc0A•õQáºâA^\nÅ†Ò«<’( ÁÆ3Ü#ƒ<ƒLUΩÕISÃaåqñ3∆òÈ`œ…ÒØÑÄ0±P@È{*ûaÑ68Ü•ÿJê°Pá7§§•TÁXﬁ„r\0PP	@§Vâ\\U›Õ¿AÓ•K6g≥-9Ä∂g^Gê’,ÕØÛË¯ûSŒzOYÌ≠È=á Ë|⁄vOê°á{∂∞ùdµ°ê&á†ˆ_ZëHVïÙ\\ÀlWfg´á¬ká4˝£™e?5p7ıI√öÄPV˝0—T√Hgõ†Ç√Y£ƒ√∆àF∆ÿØ'‡´ú‰îêô ”Z€Î}Ô‘D◊6D.ókÇGWiñÙk\"óú7¶„Dô3'‰Ÿ;EòIŸ/\$ê£BawŸ0_îÒ/]≈9x´:•ìéÆ'-¯“‚b˚ÁH2&+¡\$èáì∏ ioGë<'›Uœ—áaƒ:ûÙìHmô4ˆf“lôCCN6jß„‹p!g{(ﬁÖh•âz»¿P	·L*dîCç(LçVöXàÈáãèŸ…°p9z∑®ú≠(LiUX\nC(ïy*YÙ…0z∞4“â†É6° |ÿ”Óô·∂hiK‘!íÛ\ryÜ˘ü&RÇP ( ö·ãÇ\0¶B` ◊,tıMpå-‰ZoA§”ß»ÎùÛ… âì©,;xb1\\Jl≤nC¥“#\0Ò%ARKv¬ÁìàÚ*ÎW0FQΩ|{óŸ’qpXóUó”Ä‹∏/\nﬁ+¨ìÓmöÖ…C‰>¬˜‘ë+Õ˝TnÌ˛Œı}í!:W‹ıZı\nX/Ã§q\rﬂ«¯ûéæîobKÂ‡±9{ek àGıê^Å\r!å5Ç5√µ§Œ∑V©’`“¢Â]+¡Ï’9åû0¨t\n°P#–p»fÜiI<ç˙iú∫u+f«”Æq·˙≈w-ﬁ„.ÌGV‹cä±cO·≤Kö-ã“ÉŒ•o\\›«ñ÷Ï_áµ_©Wt:wπﬂJ~\"ÂÁâ¿ìÄé236ÎÌ.B¬cªâL0w^\\ß(z*Ÿôõp…h?T»—ÇoVÎ~[ƒ~È≤n6èí'~¯€Åy⁄1H2ÜÕz®öbÒ˛Û°:<\\ª|âgÅÆ¸ÍÛ›E*»ÑmfÈZ(™Íæ˛€ˆ«Íß%…\rñ¯Ó`Ø Ø¬àﬁÉjjNI∏bäüFÇ“Ô‚mäﬁ6g™ ƒ\n4dtÇFz©vZKŸFS\$à‰ç\\‚Œ:èÂ™:eˆ∆á\noö™˛ªdñÖ'Œ‚ÄÜ(iöiÅÁ…VÓØ≤˙é‰ÒÕB˚\n&âNÚè£”Ï≤‰VÖB\"zá>,„BàZs	B0à\\#rup:Ò>Âºî%8AE‘d∏˛i˙D¢";break;case"th":$g="‡\\! àM¿π@¿0tD\0Ü¬ \nX:&\0ßÄ*‡\n8ﬁ\0≠	E√30Ç/\0ZB†(^\0µA‡KÖ2\0™ï¿&´âb‚8∏KG‡nÇåƒ‡	Iî?J\\£)´äbÂ.òÆ)à\\ÚóSßÆ\"ïºs\0CŸWJ§∂_6\\+eV∏6r∏J√©5k“·¥]Î≥8ıƒ@%9ê´9™Ê4∑Æfv2∞ #!ò–j6é5ò∆:Ôi\\†(µz ≥yæW e¬já\0MLrS´Ç{q\0º◊ß⁄|\\Iq	ænÎ[≠R„|∏îÈ¶õ©û7;Z¡·4	=jÑ∏¥ﬁ.Û˘Í∞Y7ùDÉ	ÿ  7ƒë§Ïi6LÊSòÄË˘£Ä»0éèxË4\r/ËË0åOÀ⁄∂Ìëpó≤\0@´-±p¢BP§,„ªJQpXD1íô´jCbπ2¬Œ±;ËÛ§Öó\$3Ä∏\$\r¸6π√–ºJ±∂ç+öÁ∫.∫6ªîQÛÑü®1⁄⁄Â`P¶ˆç#pŒ¨¢ç™≤P.ÂJV›!ÎÛ\00@P™7\roàÓ7(‰9\r„í∞\"@ê`¬9Ω„ ﬁ˛>xËp·8œ„ÑÓ9éÛà…ªi˙ÿÉ+≈Ã¬ø∂)√§å6MJ‘ü•1lY\$∫O*U†@§≈≈,«”£öú8nÉx\\5≤T(¢6/\n5íå8Áª†©BNÕH\\I1rl„Hº‡√îƒY;rÚ|¨®’åIM‰&Äã3I £hß§À_»Q“B1£∑,€nm1,µ»;õ,´dÉµEÑ;òÄ&i¸d«‡(UZŸb≠ß©ù!Ní†Pâ¡èÕ|N3h›åΩÏF89cc(Òç√ò“7Â0{…R…IÈF¨‹6SíÌπ≥ïw‹®Ïqp\\NM'1›R≤ü◊pÂap‘:5ıÖLiÌ`≥∫I¸IKHÇøZ ûc#€ëSi©h,~≠CN≥*©ú£#∏VK∑ô/µ€¨êåâ3ï\r% à<øÄS‚Å®^|8b¨†Mäª]ﬂ6˙È;h”•Åiıã≥d01ÅqØ-≤ss≠sÚT8J+*gKn+¥Íªπ£xt≤¬≈ê√øc9©€*¨·ù±q§ªª>Í)÷JÆÙuR·ÃE•´ºˆ¸œtÉëïLõªu_;v±¸∆SŸÓ˙∫ÆÿƒH\$	–ö&áBòßxI Ï)c3’vàP^-µe¡j]ì>.))·@4Zã≈(\n\rÅ–9\0£–zÉr=·º3`ÿïC)≈9¢,°-≈§ÿaY{â)ﬁ∑ÆÜç»T\rÁ»6Ü‹A\0ue!‘1Ü3¯√0u\rÄÄ6ŒïCò,?¡ ŒR® â ïºÜ‘™P((`¶\r0F‡¡Œ˙∫VdıS0¶Ç3z:•¡Î§£`m\n©{IêÔ,rw©º:H±Õù∂\nm’ ÑhÅÆ%@!9ø[Ñ˝Õ¨î4G:†^o|¨CÿöËfc°’ï%`@C\$N\r…∫!6X É\"n\00û∏\$ÅË\"\r–:\0ÊÅx/ÚÃ3íq‡º2Ü‡^ûò¯ter¯ÈÄÅ®gÄº0É‚∞·º√U-Ÿ≠¢»∏@ﬁÒ±Í¶?π5 KQ-MQ≥H—LÑs-ÒÚ;£∏ÚÇjw@¨ëC5¢ìhx¶	(πG)CDßï2ÆV ˘c,√ºµñÚn\\á)w/e„'ó¨©ñDbI\r°¿¸ÜŸz&\\ÕctyÜˆÚ¡-\rgº4®T›dÿnèÖcöÉö∂TÈUhj‰¡	°=¶ç\rº0Ü9ÑÀ\0w?Ï1‡õ§êr£Õ‰0ÜiÊ†!§6û–Ê√ÿ~õ*R?’\r@<˝£·§0Ü≈~Ò'Iè9Ëj5™◊2¨·:ÆYYπ∫Í®’{pS§Ï≠∆ê†Ä  ™óÊ\\Å='m–Ó.D≈O4&eT´Ä†ÜÀ\$›Fô'¯˘CÏ~–eo*9C˙ÇSÍ≠∞Ù;⁄§Qdo*åÈFX˘‚ÕBM‘∞˛ PÊ°°¥JMàñ‡·öáQ!…ºát√E)\r!ûUÇ\nõXœxc2Rª∆∫\\Î≥ YQ±X«Ua\\ÈaS©d™¨DXWKav8F¡0πftsN€Æõç¡Gìï∏ëÅ;éà]_ÄíIC…Èê4∑ì‚ü”¿n§Ë ˛¡ ‚O‚…¿6…z(Æblpı<V;`°è›∑LvÂq9Ît£]6j∆…N≤∂WIÌ:)\"‡ªeπÄHR©&xıc‘ñ@≥zHd£Ç‘E{ÀûA*vp∑?‚∆‚≥•ΩJ‡«û`¨VÉDä ÑÛ·+ƒõ=ñ¿ÇRÜ+∑OÇàLö‘Ô)B0T±0πºÜö6°\"V\"ƒä7‰‰—“C_V6˙E°ô#√pCàil®Á:À‹‰|nö^m,^»õÑ◊‘DmÎcSëî’ë“1≤/Rïì∞Û’N†nGè(jÊ∂◊ùfTBYûDkDÇ£\nX p06ºVCk D\0Á≈àqô…S+n4÷ïÄçüClîO˜~\$ÖP®Åh8c“{\n%b±—€I™cJ=Äs`,‡ÿÀ:ΩŸÔd€ÅA[éÃÔù≥Ée ≥ì¬ìêÃu±w9\rπQ∆ÖJ„ÓNVÄÁ°¬∫&°∫gç&zlR ù<.5Í¢]≤ŒˆôŒg”®\\i‘\"mñ‚ŸK/—ò!-∏øÚÒV+07Á0⁄úS u][Lí≤Æ—£cK¡≤97P‹¡;f∞'x\"]ÊîÉ)˘®÷®¨°GA\rà≥+8‰ÔªR≤Wwæ;ÍY¨⁄8¸òJÔ’%°u‰ÛÑÊ7_Â‹ë®9%pπÚ;Ä";break;case"tr":$g="E6öM¬	Œi=¡BQpÃÃ 9ÇàÜÛô‰¬ 3∞÷∆„!î‰i6`'ìy»\\\nb,P!⁄= 2¿ÃëH∞Äƒo<ùNáXÉbnüß¬)ÃÖ'â≈bÊ”)ÿ«:GXâ˘ú@\nFC1†‘l7ASv*|%4ö†F`(®a1\r‚	!Æê√^¶2Q◊|%òO3„•–ﬂvßáKÖ sºåfSdÜòkXjya‰ t5¡œXlFÛ:¥⁄âiñ£xΩ≤∆\\ıFöa6à3˙¨≤]7õéF	∏”∫øôAE=Èî… 4…\\πK™K:ÂL&‡QT‹k7Œ8Ò KH0„Fû∫fe9à<8Sô‘‡pí·N√ôﬁJ2\$Í(@:èNÿËü\rÉ\nÑüåé⁄l4£Ó0@5ª0JÄü©	¢/éâä¶©„¢êÑÓS∞ÌB„Ü:/íBèπl-–P“45°\n6ªiA`–çÉH ™`Pé2çÍ`ÈÉHÊ∆µ–J›\r“Çà¯ p <C£r‡éi8ô'C±z\$ÿ/m†“1»Q<,üEEà(AC|#BJ ƒ¶.8–Ù®3∏≥>¬qëb‘Ñ£\"l¡ÄMEè-Jö›œÏbÈÑÅ∞\\îÿc!∏`P–Õ„ ∫#»Îñ†≠É1†-JR≤≤ŒX ÕØ°k9±í24é#…ãT‡é´ÎíÈàı˙:È—„-tä1åÇ7e§x]GQCYgWvä3i•„e¨,£H⁄Áπbòt\"Å–ÊàãcÕ‰<ã°h¬0Ö£8Œ\n…z![î‡PŸ%ÅF¶£˜:|≤ß√ö}èI8¶:ç√™üÇêÈ◊Ö¨ÿ3√ıÑzv9≠»¬Õ«ç∞‹ë>:,8A\"}k—‚#à4çh∏Ê‡∏a:5∏cñ]58ÿåçÄ#»3Fbò§#!\0‘œÿÅp@#\$£k2ËêSÌ\$‚~Oî—k,ü9&~Ÿ;y±bìà#\"óË–§Qπ*xz|—‘âd:≤Ï\\Z›Zçxãçê 3°–:ÉÄÊ·xÔÕÖ÷÷Óè…(Œ¶!zg*éÉKÇÑAÛ◊æñ+*Ë0éÂ,◊óã+\"»áÅx¬lª;r9≈πä£;É®X\rã¿Ë3C⁄äåO=ñgáÓí®Arå‹såÅ¯ÖÁÉx˜Î≠0#d‡°Œ—ÊX≥,⁄Y≈Ño»Ú|Ø/ÃÛcø:›à†tNê7:D∏LR¸E \"òLﬁKwÆ˝	°S∂ˆ\0Sf¨†‹ë’xJô«3ÁíÜƒx˙Öãr\$»˘Z'ñ`ê∫\\…Ã*`ÿ…Åm¶∏ı∂§€Hª&Ém°ïävj∆åc‡h]á#6ÿ		eu\$|êô0◊…8U@°πøÍDèÉC\$,ºÅÖ\0êDcu(ºÅ“\n\n+UTfmSÙ>SäÅR*Å±∫îÀcÖ\n,©°h∫|å9åA(-Ì:Ò>Öù±!∞óEBFy⁄\\OM:ÿhÉ·º9\r\$ú*ÖÇfOã>?fLÃê0È)•hp*Ìwü‡‰¢É∫£h‡ÄÜw&MçtØ5“\0:û“NJIYí§¿Ú6B»»∫≠|\n˜Ç\0¬√ä‚f‡Ä&<Á†@–z#—±	 ®ª#	9äïvÇÍÁ√ê'çÀI`(tOkI&ƒÒ'áñBÌŸÈ˚ã°∏ì±Ëj^…x3@'Ö0®kH˘ys,<úvD[(≥*\$]&≈BHŸD§	PÚÿ§%AGŸ≥I≤‹J¡R4@ŸIô b°)¥`¶Bc«)SVÑã√íg°≤ß7Á’äîÙ@’!Æ8Ü0·‘ô6hâ9¶0Ñ@Ë…Fo±Ö#\"…H∆∏Í“áKG&Ø œk	∫41k-â¨k+Ö[Ñu“ØÑ%O8£¥zOB~)ôw‚ghB&∏!§∞ÿ\n‚ÈP‘â!†@B†F†·	Ü»Ç_sA∞ñìËU[î-q™1⁄©∂π≤‹ô¬ŸØ\n¬⁄∫-Ìt⁄nh‘∏ó3⁄¸çöËâ†Ÿ†ÇÅP≤>H%ï ‡.!|êÄOØÎêÖÜp\$ Ë≥		#–3\roœ¡Ω&Ù0DÉ\ndâíL≤ÈBã‡Yæ	ÙÈ#¸´õyn/\rb+Ö^T=v[F~‘òEmp@K\r·¿ã'pà«-tÓ∑Lî…£épùº.R.—ﬁÍWÜÉ}`0í.˝>\"m°\rÿ@";break;case"uk":$g="–I4Ç…†øh-`≠Ï&—K¡BQpÃÃ 9Çö	ÿrÒ†æh-ö∏-}[¥πZı¢ÇïH`R¯Å¢ÑòÆdbË“rb∫h†d±ÈZÌ¢åÜG‡ãH¸¢É†Õ\rıMs6@Se+»ÉE6úJÁTdÄJsh\$gç\$ÊGÜ≠f…j>†îûCà»f4çÜ„ÅÃjæØSdRÍB˚\rh°ÂSE’6\rVçG!TI¥¬V±ëÃ–‘{ZÇLï¨ÈÚ îi%QœB◊ÿ‹vUXh£⁄ Z<,õŒ¢AÑÏeç‚Å»“v4õ¶s)Ã@tÂùNC	”êt4z«C	ã•kK¥4\\L+U0\\FΩ>økCﬂ5àA¯ô2@É\$Mõ‡¨4ÈãTA•äJ\\GæOR˙æËÚÇ∂	ã.©%\nK˛ßÅBõå4ç√;\\íµ\rÅ'¨≤TçœSX5¢®‹5πC∏‹£ê‰7éI‡àÓº£Ê‰É{™‰ç„¢0Ì‰î8HCòÔãY\"’ñä:íF\n*Xà#.h2¨B≤Ÿê)§7)¢‰¶©ãäQ\$π¢D&j ∆,√ö÷∂¨Kz∫°%ÀªJ‹∑s\$PhI*Å—S2g4êMZ\rËÇ\nçÙõBX#D£&œ.i≥%.‘0£|ùLµTRˆOIï@hhr@è=î©\0Æ¡Ç#ƒÚ∫SËAGuÄ‰,ˆÂa£√º7cHﬂh-e\nO2Øâ†”!Q*ÄòL»—4»LÌÖ,…êË—>…´)åF#EThMØÖ‘òóÅ;röFÍˆM+°Ã≈J¥2ï—Í\n&2 çƒóÅ!.aÏˆ#â·◊¢_M@U˘2#Iq,Å®\\y8c{±CV]#Eå∞£Ö¥IjçZ”67RÌ§Z–W	îˆá¡ÜÅ)^Djûd¨ﬂ±@äç£¢◊SE§‘©©#˛¶Ê4·Q—V“8ïÀ+¢Ö.6íº≠.	é ∫Àê“Õâ∞˜õ¸™4:+KW∂);%OÓXìÙÀj™j<íoMŒ˘ømjW›{äì÷º6ﬂn¸Z∆-iLa¶∫5Zía—†Rı}U¨P£Jaho‡\\-´›Õv@∫L]¶CJZàC`Ë9NÜ0éN@ﬁ3√d@2⁄∞z≤ÉVıÎ\nÉ{ó®ç√»@:⁄®∆1∫£òÃ:çÅ\0ÿ7åÒ\0Á0¯ˇ¬3ÍQºAπÑl@N(`§µôß(™À©\r`¡)Ö ågZ„üƒ±¿tÓH ÍïÖÅrBûMÑI	@Ñ¨[ñ≤§2%p	ç6ßÇH§π6(I°77ÅpO°≈FgX3,@Í¥Q !ëˇ‰ròC”Z!ëÇ\0xN#Õ¿ÙÄËÄs@ºáxºÉDzhıp^Cp/H´:-(“ÅÙk;®Ä3É¿^AÛ’`\nÒÉ¶E4KåëSm	§F&\\ÇÃSÂ’/¶,¶â”oÉIä)8jW+•CHPAì¿öêéÚÀJÕ)%DpÄiy©V'E\0—¢§Vãj.E‡Ô#FåÅ 3FàŒ≥£B—Z`ºp|Chp:A∂4HÌÃ<ΩÜá˙CY»\r)=æ	õäâtÓ≠ï2»òiOx-‹îêe‹Á»Ñ8\r 0Ü8⁄¥¡\0w:/¥1Ä‡éaËrôå00ÜiBíﬂ;È}oµ˜øo>è◊ûd`0Ã¿@Â\\Õ\r!Ñ6'ÊfÕπ¸t∞\\Ÿ´FçÒ˝))æÖ\0êm\"N…‚íœ6\n8)ë–ÑìîÁ8∆”<*9çà¬¢#‰2rQ&!J≤\\I‡CZq{GCÆrŒiœ:'L2∞ƒöÉ°÷<I!%Q«ﬁÍÏ!«Ì“&5ﬁCƒ±K&3°\nT‡SÁí9õGZ(4†˙˚<h7\0säSL0;û∆ËiÒXO⁄\$raáÔQT‘≈,À≤¸ Ö?C6QJ;Å ÜˆÉzπ§Q˛\\»\"ßì19 ¡æPM»9I ‘R`C,»ﬂ.ÙÔR—g'Å\$ãáìÑ iaá)%\$0›5O	÷y°ƒ:ùTîëÿmàRÊ&ÿ4nﬂzC¢Uç(C—\\€rjLD:∂ËA	\0±_Jà^\0†¬òTf®ñ\roKA%Ã∏∫I2õ~Üç¸ Ü}…õâkn>\rKK]—ØÑÆ´ï5!K|íôuÑ§Hy8*hçG8éœ≥(‹Ì>¯¬\"Äb≤@Ä)Öò5[B(`®1≈◊∞3%'XøxH¬98Ëı´≠t—:\\ç=Lp©œë˚ﬁ¬ûX44Ù≠«¸∫/≤˛V(+&CÊ4ƒÖIYqài+7¸+çÒqp¨M—f°„€VnìEs<Êw˘&≥h Z;fLÒJÛ‹}a,ﬂÄ†ÜÒ√`+QEﬂVEQ[h∞C\$5LeŸ–4i·ÍC:§¢u Nâ†Õ\0(#d €“UñaT*`Z,I∫(Ñû8grnõ∏∫ÃM±M„ÓW	rÌÛc+ΩêÿvYJŸÆkh\"¢[óòπ∏⁄ˆ∞YmíO∂ˆzª⁄*_:QˆH	ıù◊Õ•b’¸lM/≈√EÅÑŸ®C0y1˚ú°Ü…|	s§Y/£tJVÀV(ïö≈Ï@	*e10”uö∑∂õˆ}¶rÕ`˝Wôµq6–äMjC#©úp\n	ÅøÜ‘xë2Êõ\r\rBöùŒÖK‰jœŒnQ{Ég’;6≤éø	{‹U-2né¢VœV⁄›aé!– tßµ]\\Yåªqe%m.‹›DkïÏÂ»Œ˚2⁄Ω∞)Ñ˜+ﬂ&â}àR4£p¶˙4mP(Éy◊x^è¿ª›G\0";break;case"vi":$g="BpÆî&·çÜ≥Çö *Û(J.ôÑ0Q,–√Zå‚§)vÉé@Tfô\nÌpj£p∫*√VòÕ√C`·]¶ÃrY<ï#\$b\$L2ñÄ@%9ê•≈IƒÙ◊å∆ŒìÑúß4ÀÖÄ°Äƒd3\rF√q¿‰t9N1†QäE3⁄°±hƒj[óJ;±∫äoóÁ\n”(©Ubµ¥da¨Æ∆I¬æRi¶ùDÂ\0\0ÅA)˜Xﬁ8@q:ûg!œCΩ_#y√Ã∏ô6:Ç∂Î—⁄ãÃ.óÚäöÌK;◊.õ≠¿É}Fé ÕºS0ùç6¬¡ΩÜ°å˜\\›≈vØÎ‡ƒN5∞™n5õçÁx!î‰r7ú•ƒC	–¬1#ò ıç„(ÊÕç„¢&:éÉÛÊ;ø#\"\\!†%:8!K⁄H»+∞⁄ú0R–7±Æ˙wC(\$F]ì·“]ì+∞Ê0é°“é9©jjP†òeÓÑFdö≤c@Íú„J*Ã#Ï”äXÑ\n\npEç…ö44ÖK\n¡dã¬Òî»@3 Ë&»!\0⁄Ôè3ZÅåÏ0ﬂ9 §åHÉLn1\rêê?!\0 7?ÙwBTX <î8Ê4≈‰¯0À(úT43„JV´ %h‡√SÔ*lú∞˘áŒ¢mC)Ë	R‹òÑÅàAØ∞ÌDÚÉ,†÷ıÕBîEÒ*iT\$ìE0√1PJ2/#Õ\"aH«M¢ÅàZv¯kRéò÷‡óÏRÙR¡CpTœ&D‹∞E—^î≠G^ß⁄I†`Pê¢”2¥hÓ¨Uk+®iípD–√h¬4çìN]’3;'I)¡O<µ`UjòS#YÜT1B>6áZÍmx»O1[#çÅP+ê	¢ht)ä`P∂<ËÉ»∫ç£hZ2ÄP±ÑΩl´.ÃÅCb–#{40éPﬁ3√c∂2•”aC3a≈ŸOf;≈ËœŒkÅÜZ¢xö8¢§ä|ÓΩ†çCæÕÊ≠[46E°`@ãîs2:ıpä∆ÍÕY·8aóPP‹ å;,€sß¶¥(b¶)€®”√q4≥a•3öH1J5óEXÍódr;∂¡CƒP3©cE05¿„5\n:“k∞Ç2\rªÂ√t®“2>¡\0x°çËÃÑC@Ë:òtÖ„øÃ>gú?#8_CÖ„\$P˛“Ép^ﬂï:;c8x√>%¡Aö™RT(ô⁄)§Ì \$\$:/√£®H)ô`+ÉfÆâCç)W°Z¨Í≥fÍ†¶\0K^≥ÿ{OqÔ>ƒ˘0w}®7gÿüsQÍD7)4P˝ @>0Á®É\ndQ CˇÄ,Äè¶u|AKTLK°¢◊\$áIyU‰MC‚Z≥aoÒ\0Ó≈ay@a¿˚<`‰C*–!ôH®–ÊCcã°ò:∆êÿ”Aå‰tö 4o+]zÅπ˛ÿ•ã°QHq^+\"Ùbå—™u4ªäÄûÖ–∑AA@\$h∫—‰q§\"d—⁄E÷1ø“9,Är\r'i@Üx‚‰êzO»!HË˛„âKo\0ÅΩ˜LO≤òe9°Ù‹Öõ∏8T Ñê†rZ›öƒwöﬁÙjõAç 'Ç∫SçTJ-w§4G	RY†∏ársò∏£AI°~Øˆ„KC•ÿ‚ìÙÚ√CD∏\"‚§‚ÑDâS∞sÆÃÄª`RKÇI-hıΩ9âs-f®ÆöÑÇÉ1¯:o-Ê√UGT9èË\nS†t#/è€RlFdê°‚àKxP	·L*pÍﬂ‹!9Ö\rƒƒ‚DπâÑGeƒ‹úì≥äOhâız|≈t)eH√äd8LŒ ⁄;£Ì¿–…7JºY´eR¢ÏÇ§¶9Ó÷˘`∆0°\"d·û√-P…3∑dBA6ª„æÓ,§ÆuéÆK0õNââ)π»¢…ÏA i40Q=±*ë¬r§!ñà”`◊\\	/Ò9øñÑØ	…0àÙìãMS|m±h]íïë\n°P#–qg“úû`îıô'Pôµíí40è\0‘,sS≤'§ÂZ^Œôî¥‡((áU1		0\n∏F\"*≤˙ÂU˚∏™÷ã_o,Uæb,ÕîSj”öÖ°æ7Å™+U0l”ö£t∞1§¥¬ìÇ°ﬁ∑#Iô	jq\"!»»\$Í«Eÿç\r«\\0ÿz&®¬¬K¨Ìæÿ∫≈b.ïö‰\\À£	û{‘!“ï4®™Ê*Èìì\0ëª∏∫ˆIòÏL’È≤ ";break;case"zh":$g="ÊA*Ísï\\ör§Óı‚|%Ã¬:ù\$\nr.ÆÑˆ2är/d≤»ª[8– Sô8Är©!T°\\∏s¶êíI4¢bßr¨Òï–ÄJs!J•ì…:⁄2çr´ST‚¢î\nÜêÃh5\r«êSùR∫9Q…˜*ù-Y(e»óBÜ≠+≤ØŒÖÚFZèI9P™Yj^FïX9ë™ÍºPÊ∏‹‹…‘•2ês&÷íEÉ°~ôå™Æ∑ycë~ù®¶#}Kïr∂sÆ‘˚kûı|øiµ-rŸÕÄ¡)c(∏ C´›¶#*€J!AñRù\nık°PÄå/WÓt¢¢ZúU9”ÍWJQ3”W„q®*È'Os%Ódb ØC9‘øMnr;N·P¡)≈¡Z‚¥'1Tú•â*ÜJ;í©ß)nY5™™Æ®íÁ9XS#%í ÓúƒAnsñ%Ÿ O-Á30•*\\OúƒπltíÂ¢0]åÒ6rë≤ ^í-â8¥êÂ\0Jú§Ÿ|ró• S0å9Ñ),ÑïÚ≤è,ë¥Ø,¡pi+\rëªFºØkÈ Lª–J[°\$j“¸?D\n L≈EÈ*‰>í¨˘(OÏ· ]óQs≈°„ ARñLÎI SA bÅù8•§Å8sñííN]úƒ\"Ü^ëß9zW%§s]ÓëA…±— EétêIÃEï1j®íIW)©i:Rù9TåŸ“Q5L±	fú§y#`OA-†ê6UòüBˆÌæ@?ã¡ŒG\n£º\$	–ö&áBò¶cÕ¸<ã°p⁄6Ö√ »XâE=ÄPÿ:Ijsî≈ŸŒ]Á!tC1§‚†E3|„AêÎAœAœ…âbtëëXπ1ÒòìHdzWñÍ5∆D«I\$∂q“C£e|ŒºF¨9bò§#	9Hsë\$bîˇhdm\ro\\\r FËÍYHWd˛Od¨iOùÅE\0;nËÇ2\r£H‹2éY≥¸t–Lí*\$K¿óe`x0Ñ@‰2å¡ËD4É†‡9áAx^;Ûp√∫n€¿\\7éC8^2ç¡x»7ç√Ë4ıxD1L¡X_!ÑA–Eñ)·“PñßI:Q!ÑHxå!\\åÑ”¶‘B˘îgΩgÀ9≥–ä∫3O‹,Yyƒ·>•p¸O∆Ò¸è' Ú¸œ7∫Ó„ó?–Ù}( <ù Á÷t°é?–TÉû≈Ldê\\éaf%I≤¬sp9»Ö¢0K!±~!]⁄*	tÓíî+ƒÈÒ>g‘∆ä—H9ÑòçW≈C/\$JŸPünsâ±pBDa9ÉîCä”ÿıKAABú∫µfêdD‚¬L®8∏(ìî:@\$»ˇ“`èÉÇ°⁄îwÇıà—Ç&§‹œ	·Ã#Ö*@\rRôAŒ*≈z›f4√\"·!Òã1§æ	3Éèπ˘?g,π†ÅpxK8ÊÒΩı∫+»‡Ω P˚ã≈¢-¿ÆZ‚b@¥ö(Ë∂Øtò(ƒMâ¡:CÉòWU–ƒ{WgîQ	Âv(∫¬s	·8cçÈêâ¬\$ìàÊÊ˚¬Ík¨‡sÙ†Öh‚BgvÔ]˘W\n<)ÖD≤zÃY1D˛Y'A# ëaÜ--7»%-e∫c\"V™Ò \$HªëÌ≈¢Ny ‚#@†G…†'Ë¨EÖ0¢\na>5Ûó1ˆBú\$©¡Ck§Áv.a©å/lÃô±,,(˝!£b»ﬂòJDÿÆBE·q5L(èÒ©(À\nLhåòÇÙGÑ6 \rÎ_IÇT	Ò hG(Äí¬¸MƒSL+èàπBdÙ[X/aô›\n°P#–pmÑ≤y*Ù÷\"Ω∫2`„#¨%aäì¶¥±´´P\\∞Å2T°iöC†@âCL\\Ñ\nï≠‡Ï∑mÀËÈb˙3ú!^≈Õw™\"Ò\rà°@:Ïí3L“u´	ohÚaÒﬂ%\"\\L	-\"\0πõ'/R=l\"0¥°vrÀH§*	;ã»xZ+yÑ^FéB*%H(≠)“Ø1EW™≤äR,";break;case"zh-tw":$g="‰^®Í%”ï\\ör•—Œı‚|%Ã¬:ù\$\ns°.eöU»∏E9PK72©(ÊP¢h) Ö@∫:i	%ì cËßJe ÂR)‹´{ù∫	Nd T‚Pàè£\\™‘√ï8®Cà»f4çÜ„ÅÃaS@/%»‰˚ïNã¶¨íNd‚%–≥Cπí…óBÖQ+ñπ÷ÍáBÒ_MK,™\$ı∆Áuªﬁow‘föÇT9ÆWK¥Õ èWπïàß2mizX:P	ó*ëΩ_/Ÿg*eSLK∂€à˙ôŒπ^9◊HÃ\r∫€’7∫åZz>ãè†Í‘0)»øNÔ\nŸr!U=Rù\n§Ù…÷^Ø‹ÈJ≈—TÁO©](≈çIñÿ^‹´•]EÃJ4\$yhrï‰2^?[†ÙΩeCûrë∫^[#Âk¢÷ëg1'ê§)ÃT'9jB)#õ,ß%')n‰™™ªhVíË˘dÙ=Oa–@ßIBO§Ú‡s•¬¶K©§πJ∫Á12A\$±&Î8mQdÄ®¡lYªró%Ú\0J£1ƒ°ÃD«)*OÃäTÕ4L∞‘9D⁄B+Í∞‚∞•y L´)pYù @≈‘sì%⁄^R©•Åpr\$-G¥Éò∆%,Mï»x»C»Ë2ÖòR¶ìŸ SA bÅùh©§Å8°Æ!v]úƒ!*ÂÌBsƒìˆGÅIÍ~É•ƒZ<^ìñi\\CD=öM—≈i têe≠|[:≈ÒtÂS¨\\X∫∞ûêó\\Wêá)]%—\\	zﬁÍMF°ê7ƒ]ñÃ±ŒGó ≤∞\$	–ö&áBò¶cŒ,<ã°p⁄6Ö√ …k[ô¸ì Pÿ:LπPtìeMÖ—ÀÖ·t∫*T1Fﬁ◊≈.˘ﬁ•!c Ì7 ù\$	†HatAWA«I ™óƒa“CëßARS`»‘ÄD&± Ü)äB0@:\r„X 70Å≠ë≠E^5Iä¸rí≈tND'‰TŸû^Ò9Oùa:ÄF•@Ç2\r£H‹2éZvÂêg1\nW(ŸπHµ§àx0Ñ@‰2å¡ËD4É†‡9áAx^;ˆÅp√»r\\†\\7éC8_∑Ö„ ﬁ7#†”·Ö·|s§ÉD_!ÑA–EËd±s ÙÈÜ!‡^0á¡p)å£òÁ„ç⁄úW§ë“G-nõ∂yLÊóe≈EóŸ\$0JÈ›K´uÆΩÿª7jÌ‹ãìNÌﬁª‹Ô√¬ß\rœù‰\"îõír¢ƒJΩÁ¿úD∞π#ÇTt\n·&Aú íRÇrà¡,eü#Ê}\rL_£ë@ÙÖ´MI∞ˆ\"qZ)–ç \nÏXvô‹üqà4sâ¥Ñ\$!6¬H°°4œƒbık#îOãs(ÿH⁄%È—¢3gªKÁ˝\0ãF ÄH\n	ö1!‘?D#—)Oq˙ï\"`LÖâ™k R°`9ƒL\"4qpPF∆Ÿbòë¥D¢s0aRôlØ›E!X–.Âús\nx”çQ¨4†Aã—Ã´Jé]JàÙuW©l¢nFí√ƒ-ëÀJ%‰ƒô…¥`9ÖpµH·≠îX§'%	A5® ñ7#ö9DP†D¶–S!Ã'Ñ‡Ê3,ÕóQ /ÑÛèÅ.Qª∑ò2,DÔnb\\N\$—9°˚⁄\"tQ`†¬òTê†\n¢Ä)Ã\0Êl°…\"lS8ñF∞∆Mâ¥õõ)2§Ñô,*¯ØW«»@	ßÿÇ†P'dàY–tz\"¬òQ	Ñ‡ﬁŒsúÕô¬§¡•øI|◊ü“ûâ¢π¸éàrÑ¯ô</‰“ösßT˚~ó’0ƒú⁄°PÊ‹æ´¸◊Uu@g–êà1Bˆ@âÒ~âƒ`â <!≤ÄÿrÎI—9„òOìÛ]4“ëî:‚∏ˇãîNIá,5S•A¿™0-õEÙ}{RãÚ¯åë≤:“Y#)báô2¸uÖ˝|ÇÂfâí§!ÖP \r\$OP°6™«LÙ√ß√èœe∂Ú		»π´›}?D®˙ö”!‚∏ä=\n¨—@ Jl–ú‚0ËΩ¢ö\"Dú∑≥}j’∫(Db˘K^ÊéÅH»≈Ω%÷A{ﬁ¥¸¶IqW†ás+•xx¨È≤+Re⁄D.Q“<G¿";break;}$xg=array();foreach(explode("\n",lzw_decompress($g))as$X)$xg[]=(strpos($X,"\t")?explode("\t",$X):$X);return$xg;}if(!$xg){$xg=get_translations($ba);$_SESSION["translations"]=$xg;}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Le=array_search("SQL",$b->operators);if($Le!==false)unset($b->operators[$Le]);}function
dsn($Mb,$V,$F,$C=array()){try{parent::__construct($Mb,$V,$F,$C);}catch(Exception$ac){auth_error(h($ac->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$Fg=false){$I=parent::query($G);$this->error="";if(!$I){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error=lang(21);return
false;}$this->store_result($I);return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($I=null){if(!$I){$I=$this->_result;if(!$I)return
false;}if($I->columnCount()){$I->num_rows=$I->rowCount();return$I;}$this->affected_rows=$I->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$p=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch();return$K[$p];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$K=(object)$this->getColumnMeta($this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=(in_array("blob",(array)$K->flags)?63:0);return$K;}}}$Jb=array();class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($R,$M,$Z,$Hc,$ve=array(),$z=1,$D=0,$Qe=false){global$b,$x;$pd=(count($Hc)<count($M));$G=$b->selectQueryBuild($M,$Z,$Hc,$ve,$z,$D);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$Hc&&$pd&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Hc&&$pd?"\nGROUP BY ".implode(", ",$Hc):"").($ve?"\nORDER BY ".implode(", ",$ve):""),($z!=""?+$z:null),($D?$z*$D:0),"\n");$Qf=microtime(true);$J=$this->_conn->query($G);if($Qe)echo$b->selectQuery($G,$Qf,!$J);return$J;}function
delete($R,$H,$z=0){$G="FROM ".table($R);return
queries("DELETE".($z?limit1($R,$G,$H):" $G$H"));}function
update($R,$P,$H,$z=0,$N="\n"){$Ug=array();foreach($P
as$y=>$X)$Ug[]="$y = $X";$G=table($R)." SET$N".implode(",$N",$Ug);return
queries("UPDATE".($z?limit1($R,$G,$H,$N):" $G$H"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$L,$Oe){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$lg){}function
convertSearch($u,$X,$p){return$u;}function
value($X,$p){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$p):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($qf){return
q($qf);}function
warnings(){return'';}function
tableHelp($B){}}$Jb["sqlite"]="SQLite 3";$Jb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Me=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($r){$this->_link=new
SQLite3($r);$Wg=$this->_link->version();$this->server_info=$Wg["versionString"];}function
query($G){$I=@$this->_link->query($G);$this->error="";if(!$I){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($I->numColumns())return
new
Min_Result($I);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetchArray();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($r){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($r);}function
query($G,$Fg=false){$Yd=($Fg?"unbufferedQuery":"query");$I=@$this->_link->$Yd($G,SQLITE_BOTH,$o);$this->error="";if(!$I){$this->error=$o;return
false;}elseif($I===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($I);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetch();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;if(method_exists($I,'numRows'))$this->num_rows=$I->numRows();}function
fetch_assoc(){$K=$this->_result->fetch(SQLITE_ASSOC);if(!$K)return
false;$J=array();foreach($K
as$y=>$X)$J[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$J;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$B=$this->_result->fieldName($this->_offset++);$He='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($He\\.)?$He\$~",$B,$A)){$R=($A[3]!=""?$A[3]:idf_unescape($A[2]));$B=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$B,"orgname"=>$B,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($r){$this->dsn(DRIVER.":$r","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($r){if(is_readable($r)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$r)?$r:dirname($_SERVER["SCRIPT_FILENAME"])."/$r")." AS a")){parent::__construct($r);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Oe){$Ug=array();foreach($L
as$P)$Ug[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($L))).") VALUES\n".implode(",\n",$Ug));}function
tableHelp($B){if($B=="sqlite_sequence")return"fileformat2.html#seqtab";if($B=="sqlite_master")return"fileformat2.html#$B";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return
lang(22);return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$z,$le=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($le?" OFFSET $le":""):"");}function
limit1($R,$G,$Z,$N="\n"){global$h;return(preg_match('~^INTO~',$G)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$N):" $G WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$N."LIMIT 1)");}function
db_collation($m,$fb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($l){return
array();}function
table_status($B=""){global$h;$J=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$K){$K["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($K["Name"]));$J[$K["Name"]]=$K;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$K)$J[$K["name"]]["Auto_increment"]=$K["seq"];return($B!=""?$J[$B]:$J);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$h;$J=array();$Oe="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$K){$B=$K["name"];$U=strtolower($K["type"]);$Ab=$K["dflt_value"];$J[$B]=array("field"=>$B,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Ab,$A)?str_replace("''","'",$A[1]):($Ab=="NULL"?null:$Ab)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($Oe!="")$J[$Oe]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$B]["auto_increment"]=true;$Oe=$B;}}$Nf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Nf,$Pd,PREG_SET_ORDER);foreach($Pd
as$A){$B=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($J[$B])$J[$B]["collation"]=trim($A[3],"'");}return$J;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Nf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Nf,$A)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$Pd,PREG_SET_ORDER);foreach($Pd
as$A){$J[""]["columns"][]=idf_unescape($A[2]).$A[4];$J[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$J){foreach(fields($R)as$B=>$p){if($p["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($B),"lengths"=>array(),"descs"=>array(null));}}$Of=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$K){$B=$K["name"];$v=array("type"=>($K["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($B).")",$i)as$pf){$v["columns"][]=$pf["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($B).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Of[$B],$df)){preg_match_all('/("[^"]*+")+( DESC)?/',$df[2],$Pd);foreach($Pd[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$J[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$J[""]["columns"]||$v["descs"]!=$J[""]["descs"]||!preg_match("~^sqlite_~",$B))$J[$B]=$v;}return$J;}function
foreign_keys($R){$J=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$K){$_c=&$J[$K["id"]];if(!$_c)$_c=$K;$_c["source"][]=$K["from"];$_c["target"][]=$K["to"];}return$J;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($B))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($B){global$h;$hc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($hc)\$~",$B)){$h->error=lang(23,str_replace("|",", ",$hc));return
false;}return
true;}function
create_database($m,$d){global$h;if(file_exists($m)){$h->error=lang(24);return
false;}if(!check_sqlite_name($m))return
false;try{$_=new
Min_SQLite($m);}catch(Exception$ac){$h->error=$ac->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->__construct(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error=lang(24);return
false;}}return
true;}function
rename_database($B,$d){global$h;if(!check_sqlite_name($B))return
false;$h->__construct(":memory:");$h->error=lang(24);return@rename(DB,$B);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){global$h;$Qg=($R==""||$xc);foreach($q
as$p){if($p[0]!=""||!$p[1]||$p[2]){$Qg=true;break;}}$c=array();$ye=array();foreach($q
as$p){if($p[1]){$c[]=($Qg?$p[1]:"ADD ".implode($p[1]));if($p[0]!="")$ye[$p[0]]=$p[1][0];}}if(!$Qg){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$B&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($B)))return
false;}elseif(!recreate_table($R,$B,$c,$ye,$xc,$Ga))return
false;if($Ga){queries("BEGIN");queries("UPDATE sqlite_sequence SET seq = $Ga WHERE name = ".q($B));if(!$h->affected_rows)queries("INSERT INTO sqlite_sequence (name, seq) VALUES (".q($B).", $Ga)");queries("COMMIT");}return
true;}function
recreate_table($R,$B,$q,$ye,$xc,$Ga,$w=array()){global$h;if($R!=""){if(!$q){foreach(fields($R)as$y=>$p){if($w)$p["auto_increment"]=0;$q[]=process_field($p,$p);$ye[$y]=idf_escape($y);}}$Pe=false;foreach($q
as$p){if($p[6])$Pe=true;}$Lb=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$Lb[$X[1]]=true;unset($w[$y]);}}foreach(indexes($R)as$vd=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$ye[$e])continue
2;$f[]=$ye[$e].($v["descs"][$y]?" DESC":"");}if(!$Lb[$vd]){if($v["type"]!="PRIMARY"||!$Pe)$w[]=array($v["type"],$vd,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$xc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$vd=>$_c){foreach($_c["source"]as$y=>$e){if(!$ye[$e])continue
2;$_c["source"][$y]=idf_unescape($ye[$e]);}if(!isset($xc[" $vd"]))$xc[]=" ".format_foreign_key($_c);}queries("BEGIN");}foreach($q
as$y=>$p)$q[$y]="  ".implode($p);$q=array_merge($q,array_filter($xc));$fg=($R==$B?"adminer_$B":$B);if(!queries("CREATE TABLE ".table($fg)." (\n".implode(",\n",$q)."\n)"))return
false;if($R!=""){if($ye&&!queries("INSERT INTO ".table($fg)." (".implode(", ",$ye).") SELECT ".implode(", ",array_map('idf_escape',array_keys($ye)))." FROM ".table($R)))return
false;$Cg=array();foreach(triggers($R)as$Ag=>$mg){$_g=trigger($Ag);$Cg[]="CREATE TRIGGER ".idf_escape($Ag)." ".implode(" ",$mg)." ON ".table($B)."\n$_g[Statement]";}$Ga=$Ga?0:$h->result("SELECT seq FROM sqlite_sequence WHERE name = ".q($R));if(!queries("DROP TABLE ".table($R))||($R==$B&&!queries("ALTER TABLE ".table($fg)." RENAME TO ".table($B)))||!alter_indexes($B,$w))return
false;if($Ga)queries("UPDATE sqlite_sequence SET seq = $Ga WHERE name = ".q($B));foreach($Cg
as$_g){if(!queries($_g))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$B,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($B!=""?$B:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$Oe){if($Oe[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),0,$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Yg){return
apply_queries("DROP VIEW",$Yg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Yg,$eg){return
false;}function
trigger($B){global$h;if($B=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$Bg=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Bg["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($B)),$A);$ke=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($ke?" OF":""),"Of"=>($ke[0]=='`'||$ke[0]=='"'?idf_unescape($ke):$ke),"Trigger"=>$B,"Statement"=>$A[4],);}function
triggers($R){$J=array();$Bg=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$K){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$Bg["Timing"]).')\s*(.*?)\s+ON\b~i',$K["sql"],$A);$J[$K["name"]]=array($A[1],$A[2]);}return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$G){return$h->query("EXPLAIN QUERY PLAN $G");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($sf){return
true;}function
create_sql($R,$Ga,$Vf){global$h;$J=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$B=>$v){if($B=='')continue;$J.=";\n\n".index_sql($R,$v['type'],$B,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$J;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$J[$y]=$h->result("PRAGMA $y");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$te){list($y,$X)=explode("=",$te,2);$J[$y]=$X;}return$J;}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($lc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$lc);}$x="sqlite";$Eg=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Uf=array_keys($Eg);$Lg=array();$se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Gc=array("hex","length","lower","round","unixepoch","upper");$Kc=array("avg","count","count distinct","group_concat","max","min","sum");$Ob=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Jb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Me=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Yb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$F){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Wg=pg_version($this->_link);$this->server_info=$Wg["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$p){return($p["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$J=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($J)$this->_link=$J;return$J;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$Fg=false){$I=@pg_query($this->_link,$G);$this->error="";if(!$I){$this->error=pg_last_error($this->_link);$J=false;}elseif(!pg_num_fields($I)){$this->affected_rows=pg_affected_rows($I);$J=true;}else$J=new
Min_Result($I);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
pg_fetch_result($I->_result,0,$p);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=pg_num_rows($I);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if(function_exists('pg_field_table'))$J->orgtable=pg_field_table($this->_result,$e);$J->name=pg_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=pg_field_type($this->_result,$e);$J->charsetnr=($J->type=="bytea"?63:0);return$J;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($O,$V,$F){global$b;$m=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
quoteBinary($qf){return
q($qf);}function
query($G,$Fg=false){$J=parent::query($G,$Fg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$J;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Oe){global$h;foreach($L
as$P){$Mg=array();$Z=array();foreach($P
as$y=>$X){$Mg[]="$y = $X";if(isset($Oe[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Mg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}function
slowQuery($G,$lg){$this->_conn->query("SET statement_timeout = ".(1000*$lg));$this->_conn->timeout=1000*$lg;return$G;}function
convertSearch($u,$X,$p){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$p["type"])?$u:"CAST($u AS text)");}function
quoteBinary($qf){return$this->_conn->quoteBinary($qf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($B){$Hd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$Hd[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$B).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$Eg,$Uf;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Uf[lang(25)][]="json";$Eg["json"]=4294967295;if(min_version(9.4,0,$h)){$Uf[lang(25)][]="jsonb";$Eg["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$z,$le=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($le?" OFFSET $le":""):"");}function
limit1($R,$G,$Z,$N="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$N):" $G".(is_view(table_status1($R))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$N."LIMIT 1)"));}function
db_collation($m,$fb){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($l){return
array();}function
table_status($B=""){$J=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", ".(min_version(12)?"''":"CASE WHEN c.relhasoids THEN 'oid' ELSE '' END")." AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($B!=""?"AND relname = ".q($B):"ORDER BY relname"))as$K)$J[$K["Name"]]=$K;return($B!=""?$J[$B]:$J);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$J=array();$xa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$Xc=min_version(10)?"(a.attidentity = 'd')::int":'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, pg_get_expr(d.adbin, d.adrelid) AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $Xc AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$K){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$K["full_type"],$A);list(,$U,$Ed,$K["length"],$sa,$za)=$A;$K["length"].=$za;$Wa=$U.$sa;if(isset($xa[$Wa])){$K["type"]=$xa[$Wa];$K["full_type"]=$K["type"].$Ed.$za;}else{$K["type"]=$U;$K["full_type"]=$K["type"].$Ed.$sa.$za;}if($K['identity'])$K['default']='GENERATED BY DEFAULT AS IDENTITY';$K["null"]=!$K["attnotnull"];$K["auto_increment"]=$K['identity']||preg_match('~^nextval\(~i',$K["default"]);$K["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$K["default"],$A))$K["default"]=($A[1]=="NULL"?null:(($A[1][0]=="'"?idf_unescape($A[1]):$A[1]).$A[2]));$J[$K["field"]]=$K;}return$J;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$cg=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $cg AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $cg AND ci.oid = i.indexrelid",$i)as$K){$ef=$K["relname"];$J[$ef]["type"]=($K["indispartial"]?"INDEX":($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX")));$J[$ef]["columns"]=array();foreach(explode(" ",$K["indkey"])as$fd)$J[$ef]["columns"][]=$f[$fd];$J[$ef]["descs"]=array();foreach(explode(" ",$K["indoption"])as$gd)$J[$ef]["descs"][]=($gd&1?'1':null);$J[$ef]["lengths"]=array();}return$J;}function
foreign_keys($R){global$ne;$J=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$A)){$K['source']=array_map('trim',explode(',',$A[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$Od)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Od[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Od[4]));}$K['target']=array_map('trim',explode(',',$A[3]));$K['on_delete']=(preg_match("~ON DELETE ($ne)~",$A[4],$Od)?$Od[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($ne)~",$A[4],$Od)?$Od[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
view($B){global$h;return
array("select"=>trim($h->result("SELECT pg_get_viewdef(".$h->result("SELECT oid FROM pg_class WHERE relname = ".q($B)).")")));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$J=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$J,$A))$J=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\1<b>\2</b>',$A[2]).$A[4];return
nl_br($J);}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($B,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($B));}function
auto_increment(){return"";}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){$c=array();$We=array();if($R!=""&&$R!=$B)$We[]="ALTER TABLE ".table($R)." RENAME TO ".table($B);foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c[]="DROP $e";else{$Tg=$X[5];unset($X[5]);if(isset($X[6])&&$p[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($p[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$We[]="ALTER TABLE ".table($B)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($p[0]!=""||$Tg!="")$We[]="COMMENT ON COLUMN ".table($B).".$X[0] IS ".($Tg!=""?substr($Tg,9):"''");}}$c=array_merge($c,$xc);if($R=="")array_unshift($We,"CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($We,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""||$jb!="")$We[]="COMMENT ON TABLE ".table($B)." IS ".q($jb);if($Ga!=""){}foreach($We
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($R,$c){$sb=array();$Kb=array();$We=array();foreach($c
as$X){if($X[0]!="INDEX")$sb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Kb[]=idf_escape($X[1]);else$We[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($sb)array_unshift($We,"ALTER TABLE ".table($R).implode(",",$sb));if($Kb)array_unshift($We,"DROP INDEX ".implode(", ",$Kb));foreach($We
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Yg){return
drop_tables($Yg);}function
drop_tables($T){foreach($T
as$R){$Sf=table_status($R);if(!queries("DROP ".strtoupper($Sf["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Yg,$eg){foreach(array_merge($T,$Yg)as$R){$Sf=table_status($R);if(!queries("ALTER ".strtoupper($Sf["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($eg)))return
false;}return
true;}function
trigger($B,$R=null){if($B=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$L=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($B));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$K)$J[$K["trigger_name"]]=array($K["action_timing"],$K["event_manipulation"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($B,$U){$L=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($B));$J=$L[0];$J["returns"]=array("type"=>$J["type_udt_name"]);$J["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($B).'
ORDER BY ordinal_position');return$J;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($B,$K){$J=array();foreach($K["fields"]as$p)$J[]=$p["type"];return
idf_escape($B)."(".implode(", ",$J).")";}function
last_id(){return
0;}function
explain($h,$G){return$h->query("EXPLAIN $G");}function
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$df))return$df[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($rf,$i=null){global$h,$Eg,$Uf;if(!$i)$i=$h;$J=$i->query("SET search_path TO ".idf_escape($rf));foreach(types()as$U){if(!isset($Eg[$U])){$Eg[$U]=0;$Uf[lang(26)][]=$U;}}return$J;}function
create_sql($R,$Ga,$Vf){global$h;$J='';$nf=array();$Af=array();$Sf=table_status($R);$q=fields($R);$w=indexes($R);ksort($w);$uc=foreign_keys($R);ksort($uc);if(!$Sf||empty($q))return
false;$J="CREATE TABLE ".idf_escape($Sf['nspname']).".".idf_escape($Sf['Name'])." (\n    ";foreach($q
as$mc=>$p){$De=idf_escape($p['field']).' '.$p['full_type'].default_value($p).($p['attnotnull']?" NOT NULL":"");$nf[]=$De;if(preg_match('~nextval\(\'([^\']+)\'\)~',$p['default'],$Pd)){$_f=$Pd[1];$Mf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($_f):"SELECT * FROM $_f"));$Af[]=($Vf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $_f;\n":"")."CREATE SEQUENCE $_f INCREMENT $Mf[increment_by] MINVALUE $Mf[min_value] MAXVALUE $Mf[max_value] START ".($Ga?$Mf['last_value']:1)." CACHE $Mf[cache_value];";}}if(!empty($Af))$J=implode("\n\n",$Af)."\n\n$J";foreach($w
as$ad=>$v){switch($v['type']){case'UNIQUE':$nf[]="CONSTRAINT ".idf_escape($ad)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$nf[]="CONSTRAINT ".idf_escape($ad)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($uc
as$tc=>$sc)$nf[]="CONSTRAINT ".idf_escape($tc)." $sc[definition] ".($sc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$J.=implode(",\n    ",$nf)."\n) WITH (oids = ".($Sf['Oid']?'true':'false').");";foreach($w
as$ad=>$v){if($v['type']=='INDEX'){$f=array();foreach($v['columns']as$y=>$X)$f[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$J.="\n\nCREATE INDEX ".idf_escape($ad)." ON ".idf_escape($Sf['nspname']).".".idf_escape($Sf['Name'])." USING btree (".implode(', ',$f).");";}}if($Sf['Comment'])$J.="\n\nCOMMENT ON TABLE ".idf_escape($Sf['nspname']).".".idf_escape($Sf['Name'])." IS ".q($Sf['Comment']).";";foreach($q
as$mc=>$p){if($p['comment'])$J.="\n\nCOMMENT ON COLUMN ".idf_escape($Sf['nspname']).".".idf_escape($Sf['Name']).".".idf_escape($mc)." IS ".q($p['comment']).";";}return
rtrim($J,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$Sf=table_status($R);$J="";foreach(triggers($R)as$zg=>$yg){$_g=trigger($zg,$Sf['Name']);$J.="\nCREATE TRIGGER ".idf_escape($_g['Trigger'])." $_g[Timing] $_g[Events] ON ".idf_escape($Sf["nspname"]).".".idf_escape($Sf['Name'])." $_g[Type] $_g[Statement];;\n";}return$J;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($lc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$lc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}$x="pgsql";$Eg=array();$Uf=array();foreach(array(lang(27)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(28)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(25)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(29)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(30)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(31)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$Eg+=$X;$Uf[$y]=array_keys($X);}$Lg=array();$se=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Gc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Kc=array("avg","count","count distinct","max","min","sum");$Ob=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Jb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Me=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Yb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$F){$this->_link=@oci_new_connect($V,$F,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$o=oci_error();$this->error=$o["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($G,$Fg=false){$I=oci_parse($this->_link,$G);$this->error="";if(!$I){$o=oci_error($this->_link);$this->errno=$o["code"];$this->error=$o["message"];return
false;}set_error_handler(array($this,'_error'));$J=@oci_execute($I);restore_error_handler();if($J){if(oci_num_fields($I))return
new
Min_Result($I);$this->affected_rows=oci_num_rows($I);}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=1){$I=$this->query($G);if(!is_object($I)||!oci_fetch($I->_result))return
false;return
oci_result($I->_result,$p);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$y=>$X){if(is_a($X,'OCI-Lob'))$K[$y]=$X->load();}return$K;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;$J->name=oci_field_name($this->_result,$e);$J->orgname=$J->name;$J->type=oci_field_type($this->_result,$e);$J->charsetnr=(preg_match("~raw|blob|bfile~",$J->type)?63:0);return$J;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($O,$V,$F){$this->dsn("oci:dbname=//$O;charset=AL32UTF8",$V,$F);return
true;}function
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$z,$le=0,$N=" "){return($le?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($z+$le).") WHERE rnum > $le":($z!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($z+$le):" $G$Z"));}function
limit1($R,$G,$Z,$N="\n"){return" $G$Z";}function
db_collation($m,$fb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($B=""){$J=array();$tf=q($B);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($B!=""?" AND table_name = $tf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($B!=""?" WHERE view_name = $tf":"")."
ORDER BY 1")as$K){if($B!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$J=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$K){$U=$K["DATA_TYPE"];$Ed="$K[DATA_PRECISION],$K[DATA_SCALE]";if($Ed==",")$Ed=$K["DATA_LENGTH"];$J[$K["COLUMN_NAME"]]=array("field"=>$K["COLUMN_NAME"],"full_type"=>$U.($Ed?"($Ed)":""),"type"=>strtolower($U),"length"=>$Ed,"default"=>$K["DATA_DEFAULT"],"null"=>($K["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$K){$ad=$K["INDEX_NAME"];$J[$ad]["type"]=($K["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($K["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$J[$ad]["columns"][]=$K["COLUMN_NAME"];$J[$ad]["lengths"][]=($K["CHAR_LENGTH"]&&$K["CHAR_LENGTH"]!=$K["COLUMN_LENGTH"]?$K["CHAR_LENGTH"]:null);$J[$ad]["descs"][]=($K["DESCEND"]?'1':null);}return$J;}function
view($B){$L=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($B));return
reset($L);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$G){$h->query("EXPLAIN PLAN FOR $G");return$h->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){$c=$Kb=array();foreach($q
as$p){$X=$p[1];if($X&&$p[0]!=""&&idf_escape($p[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($p[0])." TO $X[0]");if($X)$c[]=($R!=""?($p[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Kb[]=idf_escape($p[0]);}if($R=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Kb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Kb).")"))&&($R==$B||queries("ALTER TABLE ".table($R)." RENAME TO ".table($B)));}function
foreign_keys($R){$J=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($G)as$K)$J[$K['NAME']]=array("db"=>$K['DEST_DB'],"table"=>$K['DEST_TABLE'],"source"=>array($K['SRC_COLUMN']),"target"=>array($K['DEST_COLUMN']),"on_delete"=>$K['ON_DELETE'],"on_update"=>null,);return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Yg){return
apply_queries("DROP VIEW",$Yg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($sf,$i=null){global$h;if(!$i)$i=$h;return$i->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($sf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$L=get_rows('SELECT * FROM v$instance');return
reset($L);}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($lc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$lc);}$x="oracle";$Eg=array();$Uf=array();foreach(array(lang(27)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(28)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(25)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(29)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$Eg+=$X;$Uf[$y]=array_keys($X);}$Lg=array();$se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Gc=array("length","lower","round","upper");$Kc=array("avg","count","count distinct","max","min","sum");$Ob=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Jb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Me=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$o){$this->errno=$o["code"];$this->error.="$o[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$F){global$b;$m=$b->database();$nb=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($m!="")$nb["Database"]=$m;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$O),$nb);if($this->_link){$hd=sqlsrv_server_info($this->_link);$this->server_info=$hd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($G,$Fg=false){$I=sqlsrv_query($this->_link,$G);$this->error="";if(!$I){$this->_get_error();return
false;}return$this->store_result($I);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($I=null){if(!$I)$I=$this->_result;if(!$I)return
false;if(sqlsrv_field_metadata($I))return
new
Min_Result($I);$this->affected_rows=sqlsrv_rows_affected($I);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->fetch_row();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$y=>$X){if(is_a($X,'DateTime'))$K[$y]=$X->format("Y-m-d H:i:s");}return$K;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$p=$this->_fields[$this->_offset++];$J=new
stdClass;$J->name=$p["Name"];$J->orgname=$p["Name"];$J->type=($p["Type"]==1?254:0);return$J;}function
seek($le){for($s=0;$s<$le;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$F){$this->_link=@mssql_connect($O,$V,$F);if($this->_link){$I=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($I){$K=$I->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$K[0]] $K[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($G,$Fg=false){$I=@mssql_query($G,$this->_link);$this->error="";if(!$I){$this->error=mssql_get_last_message();return
false;}if($I===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;return
mssql_result($I->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=mssql_num_rows($I);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$J=mssql_fetch_field($this->_result);$J->orgtable=$J->table;$J->orgname=$J->name;return$J;}function
seek($le){mssql_data_seek($this->_result,$le);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($O,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F);return
true;}function
select_db($k){return$this->query("USE ".idf_escape($k));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Oe){foreach($L
as$P){$Mg=array();$Z=array();foreach($P
as$y=>$X){$Mg[]="$y = $X";if(isset($Oe[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Mg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$z,$le=0,$N=" "){return($z!==null?" TOP (".($z+$le).")":"")." $G$Z";}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$fb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$J=array();foreach($l
as$m){$h->select_db($m);$J[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$J;}function
table_status($B=""){$J=array();foreach(get_rows("SELECT ao.name AS Name, ao.type_desc AS Engine, (SELECT value FROM fn_listextendedproperty(default, 'SCHEMA', schema_name(schema_id), 'TABLE', ao.name, null, null)) AS Comment FROM sys.all_objects AS ao WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$K){if($B!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$kb=get_key_vals("SELECT objname, cast(value as varchar) FROM fn_listextendedproperty('MS_DESCRIPTION', 'schema', ".q(get_schema()).", 'table', ".q($R).", 'column', NULL)");$J=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$K){$U=$K["type"];$Ed=(preg_match("~char|binary~",$U)?$K["max_length"]:($U=="decimal"?"$K[precision],$K[scale]":""));$J[$K["name"]]=array("field"=>$K["name"],"full_type"=>$U.($Ed?"($Ed)":""),"type"=>$U,"length"=>$Ed,"default"=>$K["default"],"null"=>$K["is_nullable"],"auto_increment"=>$K["is_identity"],"collation"=>$K["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$K["is_identity"],"comment"=>$kb[$K["name"]],);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$i)as$K){$B=$K["name"];$J[$B]["type"]=($K["is_primary_key"]?"PRIMARY":($K["is_unique"]?"UNIQUE":"INDEX"));$J[$B]["lengths"]=array();$J[$B]["columns"][$K["key_ordinal"]]=$K["column_name"];$J[$B]["descs"][$K["key_ordinal"]]=($K["is_descending_key"]?'1':null);}return$J;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($B))));}function
collations(){$J=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$J[preg_replace('~_.*~','',$d)][]=$d;return$J;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($B,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($B));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){$c=array();$kb=array();foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);$kb[$p[0]]=$X[5];unset($X[5]);if($p[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($xc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($B)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$B)queries("EXEC sp_rename ".q(table($R)).", ".q($B));if($xc)$c[""]=$xc;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($B)." $y".implode(",",$X)))return
false;}foreach($kb
as$y=>$X){$jb=substr($X,9);queries("EXEC sp_dropextendedproperty @name = N'MS_Description', @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));queries("EXEC sp_addextendedproperty @name = N'MS_Description', @value = ".$jb.", @level0type = N'Schema', @level0name = ".q(get_schema()).", @level1type = N'Table',  @level1name = ".q($B).", @level2type = N'Column', @level2name = ".q($y));}return
true;}function
alter_indexes($R,$c){$v=array();$Kb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Kb[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Kb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Kb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$G){$h->query("SET SHOWPLAN_ALL ON");$J=$h->query($G);$h->query("SET SHOWPLAN_ALL OFF");return$J;}function
found_rows($S,$Z){}function
foreign_keys($R){$J=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$K){$_c=&$J[$K["FK_NAME"]];$_c["db"]=$K["PKTABLE_QUALIFIER"];$_c["table"]=$K["PKTABLE_NAME"];$_c["source"][]=$K["FKCOLUMN_NAME"];$_c["target"][]=$K["PKCOLUMN_NAME"];}return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Yg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Yg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Yg,$eg){return
apply_queries("ALTER SCHEMA ".idf_escape($eg)." TRANSFER",array_merge($T,$Yg));}function
trigger($B){if($B=="")return
array();$L=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($B));$J=reset($L);if($J)$J["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$J["text"]);return$J;}function
triggers($R){$J=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$K)$J[$K["name"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($rf){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($lc){return
preg_match('~^(comment|columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$lc);}$x="mssql";$Eg=array();$Uf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(28)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(25)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(29)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$Eg+=$X;$Uf[$y]=array_keys($X);}$Lg=array();$se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Gc=array("len","lower","round","upper");$Kc=array("avg","count","count distinct","max","min","sum");$Ob=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Jb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Me=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){$this->_link=ibase_connect($O,$V,$F);if($this->_link){$Pg=explode(':',$O);$this->service_link=ibase_service_attach($Pg[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return($k=="domain");}function
query($G,$Fg=false){$I=ibase_query($G,$this->_link);if(!$I){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($I===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;$K=$I->fetch_row();return$K[$p];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$p=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$p['name'],'orgname'=>$p['name'],'type'=>$p['type'],'charsetnr'=>$p['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($vc){return
array("domain");}function
limit($G,$Z,$z,$le=0,$N=" "){$J='';$J.=($z!==null?$N."FIRST $z".($le?" SKIP $le":""):"");$J.=" $G$Z";return$J;}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$fb){}function
engines(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){global$h;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$I=ibase_query($h->_link,$G);$J=array();while($K=ibase_fetch_assoc($I))$J[$K['RDB$RELATION_NAME']]='table';ksort($J);return$J;}function
count_tables($l){return
array();}function
table_status($B="",$kc=false){global$h;$J=array();$xb=tables_list();foreach($xb
as$v=>$X){$v=trim($v);$J[$v]=array('Name'=>$v,'Engine'=>'standard',);if($B==$v)return$J[$v];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$h;$J=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
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
ORDER BY r.RDB$FIELD_POSITION';$I=ibase_query($h->_link,$G);while($K=ibase_fetch_assoc($I))$J[trim($K['FIELD_NAME'])]=array("field"=>trim($K["FIELD_NAME"]),"full_type"=>trim($K["FIELD_TYPE"]),"type"=>trim($K["FIELD_SUB_TYPE"]),"default"=>trim($K['FIELD_DEFAULT_VALUE']),"null"=>(trim($K["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($K["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($K["FIELD_DESCRIPTION"]),);return$J;}function
indexes($R,$i=null){$J=array();return$J;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($rf){return
true;}function
support($lc){return
preg_match("~^(columns|sql|status|table)$~",$lc);}$x="firebird";$se=array("=");$Gc=array();$Kc=array();$Ob=array();}$Jb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Me=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($G,$Fg=false){$E=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$E['NextToken']=$this->next;$I=sdb_request_all('Select','Item',$E,$this->timeout);$this->timeout=0;if($I===false)return$I;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Yf=0;foreach($I
as$rd)$Yf+=$rd->Attribute->Value;$I=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Yf,))));}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($I){foreach($I
as$rd){$K=array();if($rd->Name!='')$K['itemName()']=(string)$rd->Name;foreach($rd->Attribute
as$Ca){$B=$this->_processValue($Ca->Name);$Y=$this->_processValue($Ca->Value);if(isset($K[$B])){$K[$B]=(array)$K[$B];$K[$B][]=$Y;}else$K[$B]=$Y;}$this->_rows[]=$K;foreach($K
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Qb){return(is_object($Qb)&&$Qb['encoding']=='base64'?base64_decode($Qb):(string)$Qb);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$y=>$X)$J[$y]=$K[$y];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$wd=array_keys($this->_rows[0]);return(object)array('name'=>$wd[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Oe="itemName()";function
_chunkRequest($Yc,$ra,$E,$dc=array()){global$h;foreach(array_chunk($Yc,25)as$Za){$Ce=$E;foreach($Za
as$s=>$t){$Ce["Item.$s.ItemName"]=$t;foreach($dc
as$y=>$X)$Ce["Item.$s.$y"]=$X;}if(!sdb_request($ra,$Ce))return
false;}$h->affected_rows=count($Yc);return
true;}function
_extractIds($R,$H,$z){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$H,$Pd))$J=array_map('idf_unescape',$Pd[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$H.($z?" LIMIT 1":"")))as$rd)$J[]=$rd->Name;}return$J;}function
select($R,$M,$Z,$Hc,$ve=array(),$z=1,$D=0,$Qe=false){global$h;$h->next=$_GET["next"];$J=parent::select($R,$M,$Z,$Hc,$ve,$z,$D,$Qe);$h->next=0;return$J;}function
delete($R,$H,$z=0){return$this->_chunkRequest($this->_extractIds($R,$H,$z),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$H,$z=0,$N="\n"){$Bb=array();$ld=array();$s=0;$Yc=$this->_extractIds($R,$H,$z);$t=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Yc))$Bb["Attribute.".count($Bb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$sd=>$W){$ld["Attribute.$s.Name"]=$y;$ld["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$sd)$ld["Attribute.$s.Replace"]="true";$s++;}}}$E=array('DomainName'=>$R);return(!$ld||$this->_chunkRequest(($t!=""?array($t):$Yc),'BatchPutAttributes',$E,$ld))&&(!$Bb||$this->_chunkRequest($Yc,'BatchDeleteAttributes',$E,$Bb));}function
insert($R,$P){$E=array("DomainName"=>$R);$s=0;foreach($P
as$B=>$Y){if($Y!="NULL"){$B=idf_unescape($B);if($B=="itemName()")$E["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$E["Attribute.$s.Name"]=$B;$E["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$E);}function
insertUpdate($R,$L,$Oe){foreach($L
as$P){if(!$this->update($R,$P,"WHERE `itemName()` = ".q($P["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($G,$lg){$this->_conn->timeout=$lg;return$G;}}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return
lang(22);return
new
Min_DB;}function
support($lc){return
preg_match('~sql~',$lc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$fb){}function
tables_list(){global$h;$J=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$J[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$J;}function
table_status($B="",$kc=false){$J=array();foreach(($B!=""?array($B=>true):tables_list())as$R=>$U){$K=array("Name"=>$R,"Auto_increment"=>"");if(!$kc){$Xd=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Xd){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$K[$y]=(string)$Xd->$X;}}if($B!="")return$K;$J[$R]=$K;}return$J;}function
explain($h,$G){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($G,$Z,$z,$le=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z":"");}function
unconvert_field($p,$J){return$J;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$B)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($wa,$xb,$y,$af=false){$Pa=64;if(strlen($y)>$Pa)$y=pack("H*",$wa($y));$y=str_pad($y,$Pa,"\0");$td=$y^str_repeat("\x36",$Pa);$ud=$y^str_repeat("\x5C",$Pa);$J=$wa($ud.pack("H*",$wa($td.$xb)));if($af)$J=pack("H*",$J);return$J;}function
sdb_request($ra,$E=array()){global$b,$h;list($Uc,$E['AWSAccessKeyId'],$uf)=$b->credentials();$E['Action']=$ra;$E['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$E['Version']='2009-04-15';$E['SignatureVersion']=2;$E['SignatureMethod']='HmacSHA1';ksort($E);$G='';foreach($E
as$y=>$X)$G.='&'.rawurlencode($y).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Uc)."\n/\n$G",$uf,true)));@ini_set('track_errors',1);$oc=@file_get_contents((preg_match('~^https?://~',$Uc)?$Uc:"http://$Uc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$oc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$jh=simplexml_load_string($oc);if(!$jh){$o=libxml_get_last_error();$h->error=$o->message;return
false;}if($jh->Errors){$o=$jh->Errors->Error;$h->error="$o->Message ($o->Code)";return
false;}$h->error='';$dg=$ra."Result";return($jh->$dg?$jh->$dg:true);}function
sdb_request_all($ra,$dg,$E=array(),$lg=0){$J=array();$Qf=($lg?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$E['SelectExpression'],$A)?$A[1]:0);do{$jh=sdb_request($ra,$E);if(!$jh)break;foreach($jh->$dg
as$Qb)$J[]=$Qb;if($z&&count($J)>=$z){$_GET["next"]=$jh->NextToken;break;}if($lg&&microtime(true)-$Qf>$lg)return
false;$E['NextToken']=$jh->NextToken;if($z)$E['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($J),$E['SelectExpression']);}while($jh->NextToken);return$J;}$x="simpledb";$se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Gc=array();$Kc=array("count");$Ob=array(array("json"));}$Jb["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Me=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Ng,$C){return@new
MongoClient($Ng,$C);}function
query($G){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$ac){$this->error=$ac->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$rd){$K=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$K[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$K;foreach($K
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$y=>$X)$J[$y]=$K[$y];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$wd=array_keys($this->_rows[0]);$B=$wd[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Oe="_id";function
select($R,$M,$Z,$Hc,$ve=array(),$z=1,$D=0,$Qe=false){$M=($M==array("*")?array():array_fill_keys($M,true));$Jf=array();foreach($ve
as$X){$X=preg_replace('~ DESC$~','',$X,1,$rb);$Jf[$X]=($rb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$M)->sort($Jf)->limit($z!=""?+$z:0)->skip($D*$z));}function
insert($R,$P){try{$J=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$J['code'];$this->_conn->error=$J['err'];$this->_conn->last_id=$P['_id'];return!$J['err'];}catch(Exception$ac){$this->_conn->error=$ac->getMessage();return
false;}}}function
get_databases($vc){global$h;$J=array();$zb=$h->_link->listDBs();foreach($zb['databases']as$m)$J[]=$m['name'];return$J;}function
count_tables($l){global$h;$J=array();foreach($l
as$m)$J[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$J;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($l){global$h;foreach($l
as$m){$jf=$h->_link->selectDB($m)->drop();if(!$jf['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$J=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$v){$Eb=array();foreach($v["key"]as$e=>$U)$Eb[]=($U==-1?'1':null);$J[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Eb,);}return$J;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$se=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Ng,$C){$bb='MongoDB\Driver\Manager';return
new$bb($Ng,$C);}function
query($G){return
false;}function
select_db($k){$this->_db_name=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$rd){$K=array();foreach($rd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$K[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$K;foreach($K
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$I->count;}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$y=>$X)$J[$y]=$K[$y];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$wd=array_keys($this->_rows[0]);$B=$wd[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Oe="_id";function
select($R,$M,$Z,$Hc,$ve=array(),$z=1,$D=0,$Qe=false){global$h;$M=($M==array("*")?array():array_fill_keys($M,1));if(count($M)&&!isset($M['_id']))$M['_id']=0;$Z=where_to_query($Z);$Jf=array();foreach($ve
as$X){$X=preg_replace('~ DESC$~','',$X,1,$rb);$Jf[$X]=($rb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$Gf=$D*$z;$bb='MongoDB\Driver\Query';$G=new$bb($Z,array('projection'=>$M,'limit'=>$z,'skip'=>$Gf,'sort'=>$Jf));$mf=$h->_link->executeQuery("$h->_db_name.$R",$G);return
new
Min_Result($mf);}function
update($R,$P,$H,$z=0,$N="\n"){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($H);$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());if(isset($P['_id']))unset($P['_id']);$ff=array();foreach($P
as$y=>$Y){if($Y=='NULL'){$ff[$y]=1;unset($P[$y]);}}$Mg=array('$set'=>$P);if(count($ff))$Mg['$unset']=$ff;$Ta->update($Z,$Mg,array('upsert'=>false));$mf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$mf->getModifiedCount();return
true;}function
delete($R,$H,$z=0){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($H);$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());$Ta->delete($Z,array('limit'=>$z));$mf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$mf->getDeletedCount();return
true;}function
insert($R,$P){global$h;$m=$h->_db_name;$bb='MongoDB\Driver\BulkWrite';$Ta=new$bb(array());if(isset($P['_id'])&&empty($P['_id']))unset($P['_id']);$Ta->insert($P);$mf=$h->_link->executeBulkWrite("$m.$R",$Ta);$h->affected_rows=$mf->getInsertedCount();return
true;}}function
get_databases($vc){global$h;$J=array();$bb='MongoDB\Driver\Command';$ib=new$bb(array('listDatabases'=>1));$mf=$h->_link->executeCommand('admin',$ib);foreach($mf
as$zb){foreach($zb->databases
as$m)$J[]=$m->name;}return$J;}function
count_tables($l){$J=array();return$J;}function
tables_list(){global$h;$bb='MongoDB\Driver\Command';$ib=new$bb(array('listCollections'=>1));$mf=$h->_link->executeCommand($h->_db_name,$ib);$gb=array();foreach($mf
as$I)$gb[$I->name]='table';return$gb;}function
drop_databases($l){return
false;}function
indexes($R,$i=null){global$h;$J=array();$bb='MongoDB\Driver\Command';$ib=new$bb(array('listIndexes'=>$R));$mf=$h->_link->executeCommand($h->_db_name,$ib);foreach($mf
as$v){$Eb=array();$f=array();foreach(get_object_vars($v->key)as$e=>$U){$Eb[]=($U==-1?'1':null);$f[]=$e;}$J[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Eb,);}return$J;}function
fields($R){$q=fields_from_edit();if(!count($q)){global$n;$I=$n->select($R,array("*"),null,null,array(),10);while($K=$I->fetch_assoc()){foreach($K
as$y=>$X){$K[$y]=null;$q[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$n->primary),"auto_increment"=>($y==$n->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$q;}function
found_rows($S,$Z){global$h;$Z=where_to_query($Z);$bb='MongoDB\Driver\Command';$ib=new$bb(array('count'=>$S['Name'],'query'=>$Z));$mf=$h->_link->executeCommand($h->_db_name,$ib);$sg=$mf->toArray();return$sg[0]->n;}function
sql_query_where_parser($H){$H=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$H));$H=preg_replace('/\)\)\)$/',')',$H);$gh=explode(' AND ',$H);$hh=explode(') OR (',$H);$Z=array();foreach($gh
as$eh)$Z[]=trim($eh);if(count($hh)==1)$hh=array();elseif(count($hh)>1)$Z=array();return
where_to_query($Z,$hh);}function
where_to_query($ch=array(),$dh=array()){global$b;$xb=array();foreach(array('and'=>$ch,'or'=>$dh)as$U=>$Z){if(is_array($Z)){foreach($Z
as$ec){list($eb,$qe,$X)=explode(" ",$ec,3);if($eb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$bb='MongoDB\BSON\ObjectID';$X=new$bb($X);}if(!in_array($qe,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$qe,$A)){$X=(float)$X;$qe=$A[1];}elseif(preg_match('~^\(date\)(.+)~',$qe,$A)){$yb=new
DateTime($X);$bb='MongoDB\BSON\UTCDatetime';$X=new$bb($yb->getTimestamp()*1000);$qe=$A[1];}switch($qe){case'=':$qe='$eq';break;case'!=':$qe='$ne';break;case'>':$qe='$gt';break;case'<':$qe='$lt';break;case'>=':$qe='$gte';break;case'<=':$qe='$lte';break;case'regex':$qe='$regex';break;default:continue
2;}if($U=='and')$xb['$and'][]=array($eb=>array($qe=>$X));elseif($U=='or')$xb['$or'][]=array($eb=>array($qe=>$X));}}}return$xb;}$se=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($B="",$kc=false){$J=array();foreach(tables_list()as$R=>$U){$J[$R]=array("Name"=>$R);if($B==$R)return$J[$R];}return$J;}function
create_database($m,$d){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
connect(){global$b;$h=new
Min_DB;list($O,$V,$F)=$b->credentials();$C=array();if($V.$F!=""){$C["username"]=$V;$C["password"]=$F;}$m=$b->database();if($m!="")$C["db"]=$m;if(($Fa=getenv("MONGO_AUTH_SOURCE")))$C["authSource"]=$Fa;try{$h->_link=$h->connect("mongodb://$O",$C);if($F!=""){$C["password"]="";try{$h->connect("mongodb://$O",$C);return
lang(22);}catch(Exception$ac){}}return$h;}catch(Exception$ac){return$ac->getMessage();}}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$B,$P)=$X;if($P=="DROP")$J=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$B));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$rb);$f[$e]=($rb?-1:1);}$J=$h->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$B,));}if($J['errmsg']){$h->error=$J['errmsg'];return
false;}}return
true;}function
support($lc){return
preg_match("~database|indexes|descidx~",$lc);}function
db_collation($m,$fb){}function
information_schema(){}function
is_view($S){}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){global$h;if($R==""){$h->_db->createCollection($B);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$jf=$h->_db->selectCollection($R)->drop();if(!$jf['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$jf=$h->_db->selectCollection($R)->remove();if(!$jf['ok'])return
false;}return
true;}$x="mongo";$Gc=array();$Kc=array();$Ob=array(array("json"));}$Jb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Me=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Ge,$pb=array(),$Yd='GET'){@ini_set('track_errors',1);$oc=@file_get_contents("$this->_url/".ltrim($Ge,'/'),false,stream_context_create(array('http'=>array('method'=>$Yd,'content'=>$pb===null?$pb:json_encode($pb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$oc){$this->error=$php_errormsg;return$oc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$oc;return
false;}$J=json_decode($oc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$ob=get_defined_constants(true);foreach($ob['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return$J;}function
query($Ge,$pb=array(),$Yd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Ge,'/'),$pb,$Yd);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$F@$A[2]";$J=$this->query('');if($J)$this->server_info=$J['version']['number'];return(bool)$J;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($L){$this->num_rows=count($L);$this->_rows=$L;reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$M,$Z,$Hc,$ve=array(),$z=1,$D=0,$Qe=false){global$b;$xb=array();$G="$R/_search";if($M!=array("*"))$xb["fields"]=$M;if($ve){$Jf=array();foreach($ve
as$eb){$eb=preg_replace('~ DESC$~','',$eb,1,$rb);$Jf[]=($rb?array($eb=>"desc"):$eb);}$xb["sort"]=$Jf;}if($z){$xb["size"]=+$z;if($D)$xb["from"]=($D*$z);}foreach($Z
as$X){list($eb,$qe,$X)=explode(" ",$X,3);if($eb=="_id")$xb["query"]["ids"]["values"][]=$X;elseif($eb.$X!=""){$gg=array("term"=>array(($eb!=""?$eb:"_all")=>$X));if($qe=="=")$xb["query"]["filtered"]["filter"]["and"][]=$gg;else$xb["query"]["filtered"]["query"]["bool"]["must"][]=$gg;}}if($xb["query"]&&!$xb["query"]["filtered"]["query"]&&!$xb["query"]["ids"])$xb["query"]["filtered"]["query"]=array("match_all"=>array());$Qf=microtime(true);$tf=$this->_conn->query($G,$xb);if($Qe)echo$b->selectQuery("$G: ".json_encode($xb),$Qf,!$tf);if(!$tf)return
false;$J=array();foreach($tf['hits']['hits']as$Tc){$K=array();if($M==array("*"))$K["_id"]=$Tc["_id"];$q=$Tc['_source'];if($M!=array("*")){$q=array();foreach($M
as$y)$q[$y]=$Tc['fields'][$y];}foreach($q
as$y=>$X){if($xb["fields"])$X=$X[0];$K[$y]=(is_array($X)?json_encode($X):$X);}$J[]=$K;}return
new
Min_Result($J);}function
update($U,$bf,$H,$z=0,$N="\n"){$Fe=preg_split('~ *= *~',$H);if(count($Fe)==2){$t=trim($Fe[1]);$G="$U/$t";return$this->_conn->query($G,$bf,'POST');}return
false;}function
insert($U,$bf){$t="";$G="$U/$t";$jf=$this->_conn->query($G,$bf,'POST');$this->_conn->last_id=$jf['_id'];return$jf['created'];}function
delete($U,$H,$z=0){$Yc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Yc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Va){$Fe=preg_split('~ *= *~',$Va);if(count($Fe)==2)$Yc[]=trim($Fe[1]);}}$this->_conn->affected_rows=0;foreach($Yc
as$t){$G="{$U}/{$t}";$jf=$this->_conn->query($G,'{}','DELETE');if(is_array($jf)&&$jf['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($O,$V,$F)=$b->credentials();if($F!=""&&$h->connect($O,$V,""))return
lang(22);if($h->connect($O,$V,$F))return$h;return$h->error;}function
support($lc){return
preg_match("~database|table|columns~",$lc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$J=$h->rootQuery('_aliases');if($J){$J=array_keys($J);sort($J,SORT_STRING);}return$J;}function
collations(){return
array();}function
db_collation($m,$fb){}function
engines(){return
array();}function
count_tables($l){global$h;$J=array();$I=$h->query('_stats');if($I&&$I['indices']){$ed=$I['indices'];foreach($ed
as$dd=>$Rf){$cd=$Rf['total']['indexing'];$J[$dd]=$cd['index_total'];}}return$J;}function
tables_list(){global$h;$J=$h->query('_mapping');if($J)$J=array_fill_keys(array_keys($J[$h->_db]["mappings"]),'table');return$J;}function
table_status($B="",$kc=false){global$h;$tf=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$J=array();if($tf){$T=$tf["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$J[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($B!=""&&$B==$R["key"])return$J[$B];}}return$J;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$I=$h->query("$R/_mapping");$J=array();if($I){$Ld=$I[$R]['properties'];if(!$Ld)$Ld=$I[$h->_db]['mappings'][$R]['properties'];if($Ld){foreach($Ld
as$B=>$p){$J[$B]=array("field"=>$B,"full_type"=>$p["type"],"type"=>$p["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($p["properties"]){unset($J[$B]["privileges"]["insert"]);unset($J[$B]["privileges"]["update"]);}}}}return$J;}function
foreign_keys($R){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),null,'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){global$h;$Te=array();foreach($q
as$ic){$mc=trim($ic[1][0]);$nc=trim($ic[1][1]?$ic[1][1]:"text");$Te[$mc]=array('type'=>$nc);}if(!empty($Te))$Te=array('properties'=>$Te);return$h->query("_mapping/{$B}",$Te,'PUT');}function
drop_tables($T){global$h;$J=true;foreach($T
as$R)$J=$J&&$h->query(urlencode($R),array(),'DELETE');return$J;}function
last_id(){global$h;return$h->last_id;}$x="elastic";$se=array("=","query");$Gc=array();$Kc=array();$Ob=array(array("json"));$Eg=array();$Uf=array();foreach(array(lang(27)=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),lang(28)=>array("date"=>10),lang(25)=>array("string"=>65535,"text"=>65535),lang(29)=>array("binary"=>255),)as$y=>$X){$Eg+=$X;$Uf[$y]=array_keys($X);}}$Jb["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($m,$G){@ini_set('track_errors',1);$oc=@file_get_contents("$this->_url/?database=$m",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($G)?"$G FORMAT JSONCompact":$G,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($oc===false){$this->error=$php_errormsg;return$oc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$oc;return
false;}$J=json_decode($oc,true);if($J===null){if(!$this->isQuerySelectLike($G)&&$oc==='')return
true;$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$ob=get_defined_constants(true);foreach($ob['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return
new
Min_Result($J);}function
isQuerySelectLike($G){return(bool)preg_match('~^(select|show)~i',$G);}function
query($G){return$this->rootQuery($this->_db,$G);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$F@$A[2]";$J=$this->query('SELECT 1');return(bool)$J;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return"'".addcslashes($Q,"\\'")."'";}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);return$I['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($I){$this->num_rows=$I['rows'];$this->_rows=$I['data'];$this->meta=$I['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);next($this->_rows);return$K===false?false:array_combine($this->columns,$K);}function
fetch_row(){$K=current($this->_rows);next($this->_rows);return$K;}function
fetch_field(){$e=$this->_offset++;$J=new
stdClass;if($e<count($this->columns)){$J->name=$this->meta[$e]['name'];$J->orgname=$J->name;$J->type=$this->meta[$e]['type'];}return$J;}}class
Min_Driver
extends
Min_SQL{function
delete($R,$H,$z=0){if($H==='')$H='WHERE 1=1';return
queries("ALTER TABLE ".table($R)." DELETE $H");}function
update($R,$P,$H,$z=0,$N="\n"){$Ug=array();foreach($P
as$y=>$X)$Ug[]="$y = $X";$G=$N.implode(",$N",$Ug);return
queries("ALTER TABLE ".table($R)." UPDATE $G$H");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
explain($h,$G){return'';}function
found_rows($S,$Z){$L=get_vals("SELECT COUNT(*) FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($L)?false:$L[0];}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){$c=$ve=array();foreach($q
as$p){if($p[1][2]===" NULL")$p[1][1]=" Nullable({$p[1][1]})";elseif($p[1][2]===' NOT NULL')$p[1][2]='';if($p[1][3])$p[1][3]='';$c[]=($p[1]?($R!=""?($p[0]!=""?"MODIFY COLUMN ":"ADD COLUMN "):" ").implode($p[1]):"DROP COLUMN ".idf_escape($p[0]));$ve[]=$p[1][0];}$c=array_merge($c,$xc);$Sf=($Vb?" ENGINE ".$Vb:"");if($R=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$Sf$Ee".' ORDER BY ('.implode(',',$ve).')');if($R!=$B){$I=queries("RENAME TABLE ".table($R)." TO ".table($B));if($c)$R=$B;else
return$I;}if($Sf)$c[]=ltrim($Sf);return($c||$Ee?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Ee):true);}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Yg){return
drop_tables($Yg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($vc){global$h;$I=get_rows('SHOW DATABASES');$J=array();foreach($I
as$K)$J[]=$K['name'];sort($J);return$J;}function
limit($G,$Z,$z,$le=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($le?", $le":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$fb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){$I=get_rows('SHOW TABLES');$J=array();foreach($I
as$K)$J[$K['name']]='table';ksort($J);return$J;}function
count_tables($l){return
array();}function
table_status($B="",$kc=false){global$h;$J=array();$T=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($h->_db));foreach($T
as$R){$J[$R['name']]=array('Name'=>$R['name'],'Engine'=>$R['engine'],);if($B===$R['name'])return$J[$R['name']];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
false;}function
convert_field($p){}function
unconvert_field($p,$J){if(in_array($p['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$p[type]($J)";return$J;}function
fields($R){$J=array();$I=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($R));foreach($I
as$K){$U=trim($K['type']);$he=strpos($U,'Nullable(')===0;$J[trim($K['name'])]=array("field"=>trim($K['name']),"full_type"=>$U,"type"=>$U,"default"=>trim($K['default_expression']),"null"=>$he,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$J;}function
indexes($R,$i=null){return
array();}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($rf){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($lc){return
preg_match("~^(columns|sql|status|table|drop_col)$~",$lc);}$x="clickhouse";$Eg=array();$Uf=array();foreach(array(lang(27)=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),lang(28)=>array("Date"=>13,"DateTime"=>20),lang(25)=>array("String"=>0),lang(29)=>array("FixedString"=>0),)as$y=>$X){$Eg+=$X;$Uf[$y]=array_keys($X);}$Lg=array();$se=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Gc=array();$Kc=array("avg","count","count distinct","max","min","sum");$Ob=array();}$Jb=array("server"=>"MySQL")+$Jb;if(!defined("DRIVER")){$Me=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($O="",$V="",$F="",$k=null,$Ke=null,$If=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Uc,$Ke)=explode(":",$O,2);$Pf=$b->connectSsl();if($Pf)$this->ssl_set($Pf['key'],$Pf['cert'],$Pf['ca'],'','');$J=@$this->real_connect(($O!=""?$Uc:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$k,(is_numeric($Ke)?$Ke:ini_get("mysqli.default_port")),(!is_numeric($Ke)?$Ke:$If),($Pf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$J;}function
set_charset($Ua){if(parent::set_charset($Ua))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Ua");}function
result($G,$p=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch_array();return$K[$p];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=lang(32,"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ua){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Ua,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Ua");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($G,$Fg=false){$I=@($Fg?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$I){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($I===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
mysql_result($I->_result,0,$p);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;$this->num_rows=mysql_num_rows($I);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$J=mysql_fetch_field($this->_result,$this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=($J->blob?63:0);return$J;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($O,$V,$F){global$b;$C=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Pf=$b->connectSsl();if($Pf){if(!empty($Pf['key']))$C[PDO::MYSQL_ATTR_SSL_KEY]=$Pf['key'];if(!empty($Pf['cert']))$C[PDO::MYSQL_ATTR_SSL_CERT]=$Pf['cert'];if(!empty($Pf['ca']))$C[PDO::MYSQL_ATTR_SSL_CA]=$Pf['ca'];}$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F,$C);return
true;}function
set_charset($Ua){$this->query("SET NAMES $Ua");}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($G,$Fg=false){$this->setAttribute(1000,!$Fg);return
parent::query($G,$Fg);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$L,$Oe){$f=array_keys(reset($L));$Ne="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Ug=array();foreach($f
as$y)$Ug[$y]="$y = VALUES($y)";$Xf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ug);$Ug=array();$Ed=0;foreach($L
as$P){$Y="(".implode(", ",$P).")";if($Ug&&(strlen($Ne)+$Ed+strlen($Y)+strlen($Xf)>1e6)){if(!queries($Ne.implode(",\n",$Ug).$Xf))return
false;$Ug=array();$Ed=0;}$Ug[]=$Y;$Ed+=strlen($Y)+2;}return
queries($Ne.implode(",\n",$Ug).$Xf);}function
slowQuery($G,$lg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$lg FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($lg*1000).") */ $A[2]";}}function
convertSearch($u,$X,$p){return(preg_match('~char|text|enum|set~',$p["type"])&&!preg_match("~^utf8~",$p["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$I=$this->_conn->query("SHOW WARNINGS");if($I&&$I->num_rows){ob_start();select($I);return
ob_get_clean();}}function
tableHelp($B){$Md=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Md?"information-schema-$B-table/":str_replace("_","-",$B)."-table.html"));if(DB=="mysql")return($Md?"mysql$B-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$Eg,$Uf;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Uf[lang(25)][]="json";$Eg["json"]=4294967295;}return$h;}$J=$h->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($qf=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$qf;return$J;}function
get_databases($vc){$J=get_session("dbs");if($J===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$J=($vc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($G,$Z,$z,$le=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($le?" OFFSET $le":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$fb){global$h;$J=null;$sb=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$sb,$A))$J=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$sb,$A))$J=$fb[$A[1]][-1];return$J;}function
engines(){$J=array();foreach(get_rows("SHOW ENGINES")as$K){if(preg_match("~YES|DEFAULT~",$K["Support"]))$J[]=$K["Engine"];}return$J;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$J=array();foreach($l
as$m)$J[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$J;}function
table_status($B="",$kc=false){$J=array();foreach(get_rows($kc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($B!=""?"AND TABLE_NAME = ".q($B):"ORDER BY Name"):"SHOW TABLE STATUS".($B!=""?" LIKE ".q(addcslashes($B,"%_\\")):""))as$K){if($K["Engine"]=="InnoDB")$K["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$K["Comment"]);if(!isset($K["Engine"]))$K["Comment"]="";if($B!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$J=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$K){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$K["Type"],$A);$J[$K["Field"]]=array("field"=>$K["Field"],"full_type"=>$K["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($K["Default"]!=""||preg_match("~char|set~",$A[1])?$K["Default"]:null),"null"=>($K["Null"]=="YES"),"auto_increment"=>($K["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$K["Extra"],$A)?$A[1]:""),"collation"=>$K["Collation"],"privileges"=>array_flip(preg_split('~, *~',$K["Privileges"])),"comment"=>$K["Comment"],"primary"=>($K["Key"]=="PRI"),"generated"=>preg_match('~^(VIRTUAL|PERSISTENT|STORED)~',$K["Extra"]),);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$K){$B=$K["Key_name"];$J[$B]["type"]=($B=="PRIMARY"?"PRIMARY":($K["Index_type"]=="FULLTEXT"?"FULLTEXT":($K["Non_unique"]?($K["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$J[$B]["columns"][]=$K["Column_name"];$J[$B]["lengths"][]=($K["Index_type"]=="SPATIAL"?null:$K["Sub_part"]);$J[$B]["descs"][]=null;}return$J;}function
foreign_keys($R){global$h,$ne;static$He='(?:`(?:[^`]|``)+`|"(?:[^"]|"")+")';$J=array();$tb=$h->result("SHOW CREATE TABLE ".table($R),1);if($tb){preg_match_all("~CONSTRAINT ($He) FOREIGN KEY ?\\(((?:$He,? ?)+)\\) REFERENCES ($He)(?:\\.($He))? \\(((?:$He,? ?)+)\\)(?: ON DELETE ($ne))?(?: ON UPDATE ($ne))?~",$tb,$Pd,PREG_SET_ORDER);foreach($Pd
as$A){preg_match_all("~$He~",$A[2],$Kf);preg_match_all("~$He~",$A[5],$eg);$J[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Kf[0]),"target"=>array_map('idf_unescape',$eg[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$J;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($B),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$y=>$X)asort($J[$y]);return$J;}function
information_schema($m){return(min_version(5)&&$m=="information_schema")||(min_version(5.5)&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){$J=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$J;}function
rename_database($B,$d){$J=false;if(create_database($B,$d)){$gf=array();foreach(tables_list()as$R=>$U)$gf[]=table($R)." TO ".idf_escape($B).".".table($R);$J=(!$gf||queries("RENAME TABLE ".implode(", ",$gf)));if($J)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$J;}function
auto_increment(){$Ha=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Ha="";break;}if($v["type"]=="PRIMARY")$Ha=" UNIQUE";}}return" AUTO_INCREMENT$Ha";}function
alter_table($R,$B,$q,$xc,$jb,$Vb,$d,$Ga,$Ee){$c=array();foreach($q
as$p)$c[]=($p[1]?($R!=""?($p[0]!=""?"CHANGE ".idf_escape($p[0]):"ADD"):" ")." ".implode($p[1]).($R!=""?$p[2]:""):"DROP ".idf_escape($p[0]));$c=array_merge($c,$xc);$Sf=($jb!==null?" COMMENT=".q($jb):"").($Vb?" ENGINE=".q($Vb):"").($d?" COLLATE ".q($d):"").($Ga!=""?" AUTO_INCREMENT=$Ga":"");if($R=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$Sf$Ee");if($R!=$B)$c[]="RENAME TO ".table($B);if($Sf)$c[]=ltrim($Sf);return($c||$Ee?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Ee):true);}function
alter_indexes($R,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Yg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Yg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Yg,$eg){$gf=array();foreach(array_merge($T,$Yg)as$R)$gf[]=table($R)." TO ".idf_escape($eg).".".table($R);return
queries("RENAME TABLE ".implode(", ",$gf));}function
copy_tables($T,$Yg,$eg){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$B=($eg==DB?table("copy_$R"):idf_escape($eg).".".table($R));if(($_POST["overwrite"]&&!queries("\nDROP TABLE IF EXISTS $B"))||!queries("CREATE TABLE $B LIKE ".table($R))||!queries("INSERT INTO $B SELECT * FROM ".table($R)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K){$_g=$K["Trigger"];if(!queries("CREATE TRIGGER ".($eg==DB?idf_escape("copy_$_g"):idf_escape($eg).".".idf_escape($_g))." $K[Timing] $K[Event] ON $B FOR EACH ROW\n$K[Statement];"))return
false;}}foreach($Yg
as$R){$B=($eg==DB?table("copy_$R"):idf_escape($eg).".".table($R));$Xg=view($R);if(($_POST["overwrite"]&&!queries("DROP VIEW IF EXISTS $B"))||!queries("CREATE VIEW $B AS $Xg[select]"))return
false;}return
true;}function
trigger($B){if($B=="")return
array();$L=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($B));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K)$J[$K["Trigger"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($B,$U){global$h,$Wb,$jd,$Eg;$xa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Lf="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Dg="((".implode("|",array_merge(array_keys($Eg),$xa)).")\\b(?:\\s*\\(((?:[^'\")]|$Wb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$He="$Lf*(".($U=="FUNCTION"?"":$jd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Dg";$sb=$h->result("SHOW CREATE $U ".idf_escape($B),2);preg_match("~\\(((?:$He\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Dg\\s+":"")."(.*)~is",$sb,$A);$q=array();preg_match_all("~$He\\s*,?~is",$A[1],$Pd,PREG_SET_ORDER);foreach($Pd
as$Be)$q[]=array("field"=>str_replace("``","`",$Be[2]).$Be[3],"type"=>strtolower($Be[5]),"length"=>preg_replace_callback("~$Wb~s",'normalize_enum',$Be[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Be[8] $Be[7]"))),"null"=>1,"full_type"=>$Be[4],"inout"=>strtoupper($Be[1]),"collation"=>strtolower($Be[9]),);if($U!="FUNCTION")return
array("fields"=>$q,"definition"=>$A[11]);return
array("fields"=>$q,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($B,$K){return
idf_escape($B);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$G){return$h->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($rf,$i=null){return
true;}function
create_sql($R,$Ga,$Vf){global$h;$J=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Ga)$J=preg_replace('~ AUTO_INCREMENT=\d+~','',$J);return$J;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R){$J="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$K)$J.="\nCREATE TRIGGER ".idf_escape($K["Trigger"])." $K[Timing] $K[Event] ON ".table($K["Table"])." FOR EACH ROW\n$K[Statement];;\n";return$J;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($p){if(preg_match("~binary~",$p["type"]))return"HEX(".idf_escape($p["field"]).")";if($p["type"]=="bit")return"BIN(".idf_escape($p["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($p["field"]).")";}function
unconvert_field($p,$J){if(preg_match("~binary~",$p["type"]))$J="UNHEX($J)";if($p["type"]=="bit")$J="CONV($J, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))$J=(min_version(8)?"ST_":"")."GeomFromText($J, SRID($p[field]))";return$J;}function
support($lc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$lc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}$x="sql";$Eg=array();$Uf=array();foreach(array(lang(27)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(28)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(25)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(33)=>array("enum"=>65535,"set"=>64),lang(29)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(31)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$Eg+=$X;$Uf[$y]=array_keys($X);}$Lg=array("unsigned","zerofill","unsigned zerofill");$se=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Gc=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Kc=array("avg","count","count distinct","group_concat","max","min","sum");$Ob=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",str_replace(":","%3a",preg_replace('~^[^?]*/([^?]*).*~','\1',$_SERVER["REQUEST_URI"])).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.7.5";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='https://www.adminer.org/editor/'".target_blank()." id='h1'>".lang(34)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($sb=false){return
password_file($sb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($O){}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($vc=true){return
get_databases($vc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$J=array();$r="adminer.css";if(file_exists($r))$J[]=$r;return$J;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.lang(35).'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.lang(36).'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".lang(37)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(38))."\n";}function
loginFormField($B,$Rc,$Y){return$Rc.$Y;}function
login($Jd,$F){return
true;}function
tableName($ag){return
h($ag["Comment"]!=""?$ag["Comment"]:$ag["Name"]);}function
fieldName($p,$ve=0){return
h(preg_replace('~\s+\[.*\]$~','',($p["comment"]!=""?$p["comment"]:$p["field"])));}function
selectLinks($ag,$P=""){$a=$ag["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.lang(39)."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Zf){$J=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$K)$J[$K["TABLE_NAME"]]["keys"][$K["CONSTRAINT_NAME"]][$K["COLUMN_NAME"]]=$K["REFERENCED_COLUMN_NAME"];foreach($J
as$y=>$X){$B=$this->tableName(table_status($y,true));if($B!=""){$tf=preg_quote($Zf);$N="(:|\\s*-)?\\s+";$J[$y]["name"]=(preg_match("(^$tf$N(.+)|^(.+?)$N$tf\$)iu",$B,$A)?$A[2].$A[3]:$B);}else
unset($J[$y]);}return$J;}function
backwardKeysPrint($Ka,$K){foreach($Ka
as$R=>$Ja){foreach($Ja["keys"]as$hb){$_=ME.'select='.urlencode($R);$s=0;foreach($hb
as$e=>$X)$_.=where_link($s++,$e,$K[$X]);echo"<a href='".h($_)."'>".h($Ja["name"])."</a>";$_=ME.'edit='.urlencode($R);foreach($hb
as$e=>$X)$_.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($K[$X]);echo"<a href='".h($_)."' title='".lang(39)."'>+</a> ";}}}function
selectQuery($G,$Qf,$jc=false){return"<!--\n".str_replace("--","--><!-- ",$G)."\n(".format_time($Qf).")\n-->\n";}function
rowDescription($R){foreach(fields($R)as$p){if(preg_match("~varchar|character varying~",$p["type"]))return
idf_escape($p["field"]);}return"";}function
rowDescriptions($L,$zc){$J=$L;foreach($L[0]as$y=>$X){if(list($R,$t,$B)=$this->_foreignColumn($zc,$y)){$Yc=array();foreach($L
as$K)$Yc[$K[$y]]=q($K[$y]);$Db=$this->_values[$R];if(!$Db)$Db=get_key_vals("SELECT $t, $B FROM ".table($R)." WHERE $t IN (".implode(", ",$Yc).")");foreach($L
as$ce=>$K){if(isset($K[$y]))$J[$ce][$y]=(string)$Db[$K[$y]];}}}return$J;}function
selectLink($X,$p){}function
selectVal($X,$_,$p,$xe){$J=$X;$_=h($_);if(preg_match('~blob|bytea~',$p["type"])&&!is_utf8($X)){$J=lang(40,strlen($xe));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$xe))$J="<img src='$_' alt='$J'>";}if(like_bool($p)&&$J!="")$J=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?lang(41):lang(42));if($_)$J="<a href='$_'".(is_url($_)?target_blank():"").">$J</a>";if(!$_&&!like_bool($p)&&preg_match(number_type(),$p["type"]))$J="<div class='number'>$J</div>";elseif(preg_match('~date~',$p["type"]))$J="<div class='datetime'>$J</div>";return$J;}function
editVal($X,$p){if(preg_match('~date|timestamp~',$p["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~',lang(43),$X);return$X;}function
selectColumnsPrint($M,$f){}function
selectSearchPrint($Z,$f,$w){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(44)."</legend><div>\n";$wd=array();foreach($Z
as$y=>$X)$wd[$X["col"]]=$y;$s=0;$q=fields($_GET["select"]);foreach($f
as$B=>$Cb){$p=$q[$B];if(preg_match("~enum~",$p["type"])||like_bool($p)){$y=$wd[$B];$s--;echo"<div>".h($Cb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'>:",(like_bool($p)?" <select name='where[$s][val]'>".optionlist(array(""=>"",lang(42),lang(41)),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$p,(array)$Z[$y]["val"],($p["null"]?0:null))),"</div>\n";unset($f[$B]);}elseif(is_array($C=$this->_foreignKeyOptions($_GET["select"],$B))){if($q[$B]["null"])$C[0]='('.lang(7).')';$y=$wd[$B];$s--;echo"<div>".h($Cb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($C,$Z[$y]["val"],true)."</select></div>\n";unset($f[$B]);}}$s=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".lang(45).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$s++;}}echo"<div><select name='where[$s][col]'><option value=''>(".lang(45).")".optionlist($f,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($ve,$f,$w){$we=array();foreach($w
as$y=>$v){$ve=array();foreach($v["columns"]as$X)$ve[]=$f[$X];if(count(array_filter($ve,'strlen'))>1&&$y!="PRIMARY")$we[$y]=implode(", ",$ve);}if($we){echo'<fieldset><legend>'.lang(46)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$we,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(47)."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($ig){}function
selectActionPrint($w){echo"<fieldset><legend>".lang(48)."</legend><div>","<input type='submit' value='".lang(49)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Sb,$f){if($Sb){print_fieldset("email",lang(50),$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".lang(51).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(52).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(53).": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Sb)==1?'<input type="hidden" name="email_field" value="'.h(key($Sb)).'">':html_select("email_field",$Sb)),"<input type='submit' name='email' value='".lang(54)."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$w){return
array(array(),array());}function
selectSearchProcess($q,$w){$J=array();foreach((array)$_GET["where"]as$y=>$Z){$eb=$Z["col"];$qe=$Z["op"];$X=$Z["val"];if(($y<0?"":$eb).$X!=""){$lb=array();foreach(($eb!=""?array($eb=>$q[$eb]):$q)as$B=>$p){if($eb!=""||is_numeric($X)||!preg_match(number_type(),$p["type"])){$B=idf_escape($B);if($eb!=""&&$p["type"]=="enum")$lb[]=(in_array(0,$X)?"$B IS NULL OR ":"")."$B IN (".implode(", ",array_map('intval',$X)).")";else{$jg=preg_match('~char|text|enum|set~',$p["type"]);$Y=$this->processInput($p,(!$qe&&$jg&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$lb[]=$B.($Y=="NULL"?" IS".($qe==">="?" NOT":"")." $Y":(in_array($qe,$this->operators)||$qe=="="?" $qe $Y":($jg?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($y<0&&$X=="0")$lb[]="$B IS NULL";}}}$J[]=($lb?"(".implode(" OR ",$lb).")":"1 = 0");}}return$J;}function
selectOrderProcess($q,$w){$bd=$_GET["index_order"];if($bd!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($bd!=""?array($w[$bd]):$w)as$v){if($bd!=""||$v["type"]=="INDEX"){$Mc=array_filter($v["descs"]);$Cb=false;foreach($v["columns"]as$X){if(preg_match('~date|timestamp~',$q[$X]["type"])){$Cb=true;break;}}$J=array();foreach($v["columns"]as$y=>$X)$J[]=idf_escape($X).(($Mc?$v["descs"][$y]:$Cb)?" DESC":"");return$J;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$zc){if($_POST["email_append"])return
true;if($_POST["email"]){$yf=0;if($_POST["all"]||$_POST["check"]){$p=idf_escape($_POST["email_field"]);$Wf=$_POST["email_subject"];$Vd=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$Wf.$Vd",$Pd);$L=get_rows("SELECT DISTINCT $p".($Pd[1]?", ".implode(", ",array_map('idf_escape',array_unique($Pd[1]))):"")." FROM ".table($_GET["select"])." WHERE $p IS NOT NULL AND $p != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$q=fields($_GET["select"]);foreach($this->rowDescriptions($L,$zc)as$K){$hf=array('{\\'=>'{');foreach($Pd[1]as$X)$hf['{$'."$X}"]=$this->editVal($K[$X],$q[$X]);$Rb=$K[$_POST["email_field"]];if(is_mail($Rb)&&send_mail($Rb,strtr($Wf,$hf),strtr($Vd,$hf),$_POST["email_from"],$_FILES["email_files"]))$yf++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(55,$yf));}return
false;}function
selectQueryBuild($M,$Z,$Hc,$ve,$z,$D){return"";}function
messageQuery($G,$kg,$jc=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$G)."\n".($kg?"($kg)\n":"")."-->";}function
editFunctions($p){$J=array();if($p["null"]&&preg_match('~blob~',$p["type"]))$J["NULL"]=lang(7);$J[""]=($p["null"]||$p["auto_increment"]||like_bool($p)?"":"*");if(preg_match('~date|time~',$p["type"]))$J["now"]=lang(56);if(preg_match('~_(md5|sha1)$~i',$p["field"],$A))$J[]=strtolower($A[1]);return$J;}function
editInput($R,$p,$Da,$Y){if($p["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Da value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Da,$p,($Y||isset($_GET["select"])?$Y:0),($p["null"]?"":null));$C=$this->_foreignKeyOptions($R,$p["field"],$Y);if($C!==null)return(is_array($C)?"<select$Da>".optionlist($C,$Y,true)."</select>":"<input value='".h($Y)."'$Da class='hidden'>"."<input value='".h($C)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($R)."&field=".urlencode($p["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($p))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Da>";$Sc="";if(preg_match('~time~',$p["type"]))$Sc=lang(57);if(preg_match('~date|timestamp~',$p["type"]))$Sc=lang(58).($Sc?" [$Sc]":"");if($Sc)return"<input value='".h($Y)."'$Da> ($Sc)";if(preg_match('~_(md5|sha1)$~i',$p["field"]))return"<input type='password' value='".h($Y)."'$Da>";return'';}function
editHint($R,$p,$Y){return(preg_match('~\s+(\[.*\])$~',($p["comment"]!=""?$p["comment"]:$p["field"]),$A)?h(" $A[1]"):'');}function
processInput($p,$Y,$Fc=""){if($Fc=="now")return"$Fc()";$J=$Y;if(preg_match('~date|timestamp~',$p["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote(lang(43)))).'(.*))',$Y,$A))$J=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$J=($p["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$J:q($J));if($Y==""&&like_bool($p))$J="'0'";elseif($Y==""&&($p["null"]||!preg_match('~char|text~',$p["type"])))$J="NULL";elseif(preg_match('~^(md5|sha1)$~',$Fc))$J="$Fc($J)";return
unconvert_field($p,$J);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable($R,$Vf,$qd=0){echo"\xef\xbb\xbf";}function
dumpData($R,$Vf,$G){global$h;$I=$h->query($G,1);if($I){while($K=$I->fetch_assoc()){if($Vf=="table"){dump_csv(array_keys($K));$Vf="INSERT";}dump_csv($K);}}}function
dumpFilename($Wc){return
friendly_url($Wc);}function
dumpHeaders($Wc,$ae=false){$fc="csv";header("Content-Type: text/csv; charset=utf-8");return$fc;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Zd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="https://www.adminer.org/editor/#download"',target_blank(),' id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Zd=="auth"){$rc=true;foreach((array)$_SESSION["pwds"]as$Vg=>$Cf){foreach($Cf[""]as$V=>$F){if($F!==null){if($rc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$rc=false;}echo"<li><a href='".h(auth_url($Vg,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a>\n";}}}}else{$this->databasesPrint($Zd);if($Zd!="db"&&$Zd!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Zd){}function
tablesPrint($T){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$K){echo'<li>';$B=$this->tableName($K);if(isset($K["Engine"])&&$B!="")echo"<a href='".h(ME).'select='.urlencode($K["Name"])."'".bold($_GET["select"]==$K["Name"]||$_GET["edit"]==$K["Name"],"select")." title='".lang(59)."'>$B</a>\n";}echo"</ul>\n";}function
_foreignColumn($zc,$e){foreach((array)$zc[$e]as$yc){if(count($yc["source"])==1){$B=$this->rowDescription($yc["table"]);if($B!=""){$t=idf_escape($yc["target"][0]);return
array($yc["table"],$t,$B);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$h;if(list($eg,$t,$B)=$this->_foreignColumn(column_foreign_keys($R),$e)){$J=&$this->_values[$eg];if($J===null){$S=table_status($eg);$J=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $B FROM ".table($eg)." ORDER BY 2"));}if(!$J&&$Y!==null)return$h->result("SELECT $B FROM ".table($eg)." WHERE $t = ".q($Y));return$J;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($ng,$o="",$Sa=array(),$og=""){global$ba,$ca,$b,$Jb,$x;page_headers();if(is_ajax()&&$o){page_messages($o);exit;}$pg=$ng.($og!=""?": $og":"");$qg=strip_tags($pg.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(60),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$qg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.7.5"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.7.5");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.5"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.7.5"),'">
';foreach($b->css()as$vb){echo'<link rel="stylesheet" type="text/css" href="',h($vb),'">
';}}echo'
<body class="',lang(60),' nojs">
';$r=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($r)&&filemtime($r)+86400>time()){$Wg=unserialize(file_get_contents($r));$Ue="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Wg["version"],base64_decode($Wg["signature"]),$Ue)==1)$_COOKIE["adminer_version"]=$Wg["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(61)),'\';
var thousandsSeparator = \'',js_escape(lang(5)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Sa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Jb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=$b->serverName(SERVER);$O=($O!=""?$O:lang(62));if($Sa===false)echo"$O\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Sa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Sa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Sa
as$y=>$X){$Cb=(is_array($X)?$X[1]:h($X));if($Cb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Cb</a> &raquo; ";}}echo"$ng\n";}}echo"<h2>$pg</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($o);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$ub){$Pc=array();foreach($ub
as$y=>$X)$Pc[]="$y $X";header("Content-Security-Policy: ".implode("; ",$Pc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$ge;if(!$ge)$ge=base64_encode(rand_string());return$ge;}function
page_messages($o){$Ng=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Wd=$_SESSION["messages"][$Ng];if($Wd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Wd)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ng]);}if($o)echo"<div class='error'>$o</div>\n";}function
page_footer($Zd=""){global$b,$tg;echo'</div>

';switch_lang();if($Zd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(63),'" id="logout">
<input type="hidden" name="token" value="',$tg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Zd);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($ce){while($ce>=2147483648)$ce-=4294967296;while($ce<=-2147483649)$ce+=4294967296;return(int)$ce;}function
long2str($W,$ah){$qf='';foreach($W
as$X)$qf.=pack('V',$X);if($ah)return
substr($qf,0,end($W));return$qf;}function
str2long($qf,$ah){$W=array_values(unpack('V*',str_pad($qf,4*ceil(strlen($qf)/4),"\0")));if($ah)$W[]=strlen($qf);return$W;}function
xxtea_mx($lh,$kh,$Yf,$sd){return
int32((($lh>>5&0x7FFFFFF)^$kh<<2)+(($kh>>3&0x1FFFFFFF)^$lh<<4))^int32(($Yf^$kh)+($sd^$lh));}function
encrypt_string($Tf,$y){if($Tf=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Tf,true);$ce=count($W)-1;$lh=$W[$ce];$kh=$W[0];$Ve=floor(6+52/($ce+1));$Yf=0;while($Ve-->0){$Yf=int32($Yf+0x9E3779B9);$Nb=$Yf>>2&3;for($_e=0;$_e<$ce;$_e++){$kh=$W[$_e+1];$be=xxtea_mx($lh,$kh,$Yf,$y[$_e&3^$Nb]);$lh=int32($W[$_e]+$be);$W[$_e]=$lh;}$kh=$W[0];$be=xxtea_mx($lh,$kh,$Yf,$y[$_e&3^$Nb]);$lh=int32($W[$ce]+$be);$W[$ce]=$lh;}return
long2str($W,false);}function
decrypt_string($Tf,$y){if($Tf=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Tf,false);$ce=count($W)-1;$lh=$W[$ce];$kh=$W[0];$Ve=floor(6+52/($ce+1));$Yf=int32($Ve*0x9E3779B9);while($Yf){$Nb=$Yf>>2&3;for($_e=$ce;$_e>0;$_e--){$lh=$W[$_e-1];$be=xxtea_mx($lh,$kh,$Yf,$y[$_e&3^$Nb]);$kh=int32($W[$_e]-$be);$W[$_e]=$kh;}$lh=$W[$ce];$be=xxtea_mx($lh,$kh,$Yf,$y[$_e&3^$Nb]);$kh=int32($W[0]-$be);$W[0]=$kh;$Yf=int32($Yf-0x9E3779B9);}return
long2str($W,true);}$h='';$Oc=$_SESSION["token"];if(!$Oc)$_SESSION["token"]=rand(1,1e6);$tg=get_token();$Ie=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Ie[$y]=$X;}}function
add_invalid_login(){global$b;$Dc=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$Dc)return;$nd=unserialize(stream_get_contents($Dc));$kg=time();if($nd){foreach($nd
as$od=>$X){if($X[0]<$kg)unset($nd[$od]);}}$md=&$nd[$b->bruteForceKey()];if(!$md)$md=array($kg+30*60,0);$md[1]++;file_write_unlock($Dc,serialize($nd));}function
check_invalid_login(){global$b;$nd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$md=$nd[$b->bruteForceKey()];$fe=($md[1]>29?$md[0]-time():0);if($fe>0)auth_error(lang(64,ceil($fe/60)));}$Ea=$_POST["auth"];if($Ea){session_regenerate_id();$Vg=$Ea["driver"];$O=$Ea["server"];$V=$Ea["username"];$F=(string)$Ea["password"];$m=$Ea["db"];set_password($Vg,$O,$V,$F);$_SESSION["db"][$Vg][$O][$V][$m]=true;if($Ea["permanent"]){$y=base64_encode($Vg)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($m);$Re=$b->permanentLogin(true);$Ie[$y]="$y:".base64_encode($Re?encrypt_string($F,$Re):"");cookie("adminer_permanent",implode(" ",$Ie));}if(count($_POST)==1||DRIVER!=$Vg||SERVER!=$O||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($Vg,$O,$V,$m));}elseif($_POST["logout"]){if($Oc&&!verify_token()){page_header(lang(63),lang(65));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(66).' '.lang(67));}}elseif($Ie&&!$_SESSION["pwds"]){session_regenerate_id();$Re=$b->permanentLogin();foreach($Ie
as$y=>$X){list(,$ab)=explode(":",$X);list($Vg,$O,$V,$m)=array_map('base64_decode',explode("-",$y));set_password($Vg,$O,$V,decrypt_string(base64_decode($ab),$Re));$_SESSION["db"][$Vg][$O][$V][$m]=true;}}function
unset_permanent(){global$Ie;foreach($Ie
as$y=>$X){list($Vg,$O,$V,$m)=array_map('base64_decode',explode("-",$y));if($Vg==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$m==DB)unset($Ie[$y]);}cookie("adminer_permanent",implode(" ",$Ie));}function
auth_error($o){global$b,$Oc;$Df=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Df]||$_GET[$Df])&&!$Oc)$o=lang(68);else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$o.='<br>'.lang(69,target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Df]&&$_GET[$Df]&&ini_bool("session.use_only_cookies"))$o=lang(70);$E=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$E["lifetime"]);page_header(lang(37),$o,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".lang(71)."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(72),lang(73,implode(", ",$Me)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])&&is_string(get_password())){list($Uc,$Ke)=explode(":",SERVER,2);if(is_numeric($Ke)&&$Ke<1024)auth_error(lang(74));check_invalid_login();$h=connect();$n=new
Min_Driver($h);}$Jd=null;if(!is_object($h)||($Jd=$b->login($_GET["username"],get_password()))!==true){$o=(is_string($h)?h($h):(is_string($Jd)?$Jd:lang(75)));auth_error($o.(preg_match('~^ | $~',get_password())?'<br>'.lang(76):''));}if($Ea&&$_POST["token"])$_POST["token"]=$tg;$o='';if($_POST){if(!verify_token()){$id="max_input_vars";$Td=ini_get($id);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Td||$X<$Td)){$id=$y;$Td=$X;}}}$o=(!$_POST["token"]&&$Td?lang(77,"'$id'"):lang(65).' '.lang(78));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$o=lang(79,"'post_max_size'");if(isset($_GET["sql"]))$o.=' '.lang(80);}function
email_header($Pc){return"=?UTF-8?B?".base64_encode($Pc)."?=";}function
send_mail($Rb,$Wf,$Vd,$Ec="",$pc=array()){$Xb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Vd=str_replace("\n",$Xb,wordwrap(str_replace("\r","","$Vd\n")));$Ra=uniqid("boundary");$Ba="";foreach((array)$pc["error"]as$y=>$X){if(!$X)$Ba.="--$Ra$Xb"."Content-Type: ".str_replace("\n","",$pc["type"][$y]).$Xb."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$pc["name"][$y])."\"$Xb"."Content-Transfer-Encoding: base64$Xb$Xb".chunk_split(base64_encode(file_get_contents($pc["tmp_name"][$y])),76,$Xb).$Xb;}$Ma="";$Qc="Content-Type: text/plain; charset=utf-8$Xb"."Content-Transfer-Encoding: 8bit";if($Ba){$Ba.="--$Ra--$Xb";$Ma="--$Ra$Xb$Qc$Xb$Xb";$Qc="Content-Type: multipart/mixed; boundary=\"$Ra\"";}$Qc.=$Xb."MIME-Version: 1.0$Xb"."X-Mailer: Adminer Editor".($Ec?$Xb."From: ".str_replace("\n","",$Ec):"");return
mail($Rb,email_header($Wf),$Ma.$Vd.$Ba,$Qc);}function
like_bool($p){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$p["full_type"]);}$h->select_db($b->database());$ne="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Jb[DRIVER]=lang(37);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$q=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$M=array(idf_escape($_GET["field"]));$I=$n->select($a,$M,array(where($_GET,$q)),$M);$K=($I?$I->fetch_row():array());echo$n->value($K[0],$q[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$q=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$q):""):where($_GET,$q));$Mg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($q
as$B=>$p){if(!isset($p["privileges"][$Mg?"update":"insert"])||$b->fieldName($p)==""||$p["generated"])unset($q[$B]);}if($_POST&&!$o&&!isset($_GET["select"])){$Id=$_POST["referer"];if($_POST["insert"])$Id=($Mg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Id))$Id=ME."select=".urlencode($a);$w=indexes($a);$Hg=unique_array($_GET["where"],$w);$Xe="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Id,lang(81),$n->delete($a,$Xe,!$Hg));else{$P=array();foreach($q
as$B=>$p){$X=process_input($p);if($X!==false&&$X!==null)$P[idf_escape($B)]=$X;}if($Mg){if(!$P)redirect($Id);queries_redirect($Id,lang(82),$n->update($a,$P,$Xe,!$Hg));if(is_ajax()){page_headers();page_messages($o);exit;}}else{$I=$n->insert($a,$P);$Cd=($I?last_id():0);queries_redirect($Id,lang(83,($Cd?" $Cd":"")),$I);}}}$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($q
as$B=>$p){if(isset($p["privileges"]["select"])){$_a=convert_field($p);if($_POST["clone"]&&$p["auto_increment"])$_a="''";if($x=="sql"&&preg_match("~enum|set~",$p["type"]))$_a="1*".idf_escape($B);$M[]=($_a?"$_a AS ":"").idf_escape($B);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$n->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1));if(!$I)$o=error();else{$K=$I->fetch_assoc();if(!$K)$K=false;}if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$q){if(!$Z){$I=$n->select($a,array("*"),$Z,array("*"));$K=($I?$I->fetch_assoc():false);if(!$K)$K=array($n->primary=>"");}if($K){foreach($K
as$y=>$X){if(!$Z)$K[$y]=null;$q[$y]=array("field"=>$y,"null"=>($y!=$n->primary),"auto_increment"=>($y==$n->primary));}}}edit_form($a,$q,$K,$Mg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$w=indexes($a);$q=fields($a);$Ac=column_foreign_keys($a);$me=$S["Oid"];parse_str($_COOKIE["adminer_import"],$ta);$of=array();$f=array();$ig=null;foreach($q
as$y=>$p){$B=$b->fieldName($p);if(isset($p["privileges"]["select"])&&$B!=""){$f[$y]=html_entity_decode(strip_tags($B),ENT_QUOTES);if(is_shortable($p))$ig=$b->selectLengthProcess();}$of+=$p["privileges"];}list($M,$Hc)=$b->selectColumnsProcess($f,$w);$pd=count($Hc)<count($M);$Z=$b->selectSearchProcess($q,$w);$ve=$b->selectOrderProcess($q,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ig=>$K){$_a=convert_field($q[key($K)]);$M=array($_a?$_a:idf_escape(key($K)));$Z[]=where_check($Ig,$q);$J=$n->select($a,$M,$Z,$M);if($J)echo
reset($J->fetch_row());}exit;}$Oe=$Kg=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$Oe=array_flip($v["columns"]);$Kg=($M?$Oe:array());foreach($Kg
as$y=>$X){if(in_array(idf_escape($y),$M))unset($Kg[$y]);}break;}}if($me&&!$Oe){$Oe=$Kg=array($me=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($me));}if($_POST&&!$o){$fh=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ya=array();foreach($_POST["check"]as$Va)$Ya[]=where_check($Va,$q);$fh[]="((".implode(") OR (",$Ya)."))";}$fh=($fh?"\nWHERE ".implode(" AND ",$fh):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Ec=($M?implode(", ",$M):"*").convert_fields($f,$q,$M)."\nFROM ".table($a);$Jc=($Hc&&$pd?"\nGROUP BY ".implode(", ",$Hc):"").($ve?"\nORDER BY ".implode(", ",$ve):"");if(!is_array($_POST["check"])||$Oe)$G="SELECT $Ec$fh$Jc";else{$Gg=array();foreach($_POST["check"]as$X)$Gg[]="(SELECT".limit($Ec,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q).$Jc,1).")";$G=implode(" UNION ALL ",$Gg);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$Ac)){if($_POST["save"]||$_POST["delete"]){$I=true;$ua=0;$P=array();if(!$_POST["delete"]){foreach($f
as$B=>$X){$X=process_input($q[$B]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($B)]=($X!==false?$X:idf_escape($B));}}if($_POST["delete"]||$P){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Oe&&is_array($_POST["check"]))||$pd){$I=($_POST["delete"]?$n->delete($a,$fh):($_POST["clone"]?queries("INSERT $G$fh"):$n->update($a,$P,$fh)));$ua=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$bh="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q);$I=($_POST["delete"]?$n->delete($a,$bh,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$bh)):$n->update($a,$P,$bh,1)));if(!$I)break;$ua+=$h->affected_rows;}}}$Vd=lang(84,$ua);if($_POST["clone"]&&$I&&$ua==1){$Cd=last_id();if($Cd)$Vd=lang(83," $Cd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Vd,$I);if(!$_POST["delete"]){edit_form($a,$q,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$o=lang(85);else{$I=true;$ua=0;foreach($_POST["val"]as$Ig=>$K){$P=array();foreach($K
as$y=>$X){$y=bracket_escape($y,1);$P[idf_escape($y)]=(preg_match('~char|text~',$q[$y]["type"])||$X!=""?$b->processInput($q[$y],$X):"NULL");}$I=$n->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ig,$q),!$pd&&!$Oe," ");if(!$I)break;$ua+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(84,$ua),$I);}}elseif(!is_string($oc=get_file("csv_file",true)))$o=upload_error($oc);elseif(!preg_match('~~u',$oc))$o=lang(86);else{cookie("adminer_import","output=".urlencode($ta["output"])."&format=".urlencode($_POST["separator"]));$I=true;$hb=array_keys($q);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$oc,$Pd);$ua=count($Pd[0]);$n->begin();$N=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($Pd[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$N]*)$N~",$X.$N,$Qd);if(!$y&&!array_diff($Qd[1],$hb)){$hb=$Qd[1];$ua--;}else{$P=array();foreach($Qd[1]as$s=>$eb)$P[idf_escape($hb[$s])]=($eb==""&&$q[$hb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$eb))));$L[]=$P;}}$I=(!$L||$n->insertUpdate($a,$L,$Oe));if($I)$I=$n->commit();queries_redirect(remove_from_uri("page"),lang(87,$ua),$I);$n->rollback();}}}$bg=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(49).": $bg",$o);$P=null;if(isset($of["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if($Ac[$X["col"]]&&count($Ac[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".lang(88).($q?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($ve,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($ig);$b->selectActionPrint($w);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$Cc=$h->result(count_rows($a,$Z,$pd,$Hc));$D=floor(max(0,$Cc-1)/$z);}$vf=$M;$Ic=$Hc;if(!$vf){$vf[]="*";$qb=convert_fields($f,$q,$M);if($qb)$vf[]=substr($qb,2);}foreach($M
as$y=>$X){$p=$q[idf_unescape($X)];if($p&&($_a=convert_field($p)))$vf[$y]="$_a AS $X";}if(!$pd&&$Kg){foreach($Kg
as$y=>$X){$vf[]=idf_escape($y);if($Ic)$Ic[]=idf_escape($y);}}$I=$n->select($a,$vf,$Z,$Ic,$ve,$z,$D,true);if(!$I)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$D)$I->seek($z*$D);$Tb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($D&&$x=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&$z!=""&&$Hc&&$pd&&$x=="sql")$Cc=$h->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".lang(12)."\n";else{$La=$b->backwardKeys($a,$bg);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Hc&&$M?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(89)."</a>");$de=array();$Gc=array();reset($M);$Ze=1;foreach($L[0]as$y=>$X){if(!isset($Kg[$y])){$X=$_GET["columns"][key($M)];$p=$q[$M?($X?$X["col"]:current($M)):$y];$B=($p?$b->fieldName($p,$Ze):($X["fun"]?"*":$y));if($B!=""){$Ze++;$de[$y]=$B;$e=idf_escape($y);$Vc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Cb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Vc.($ve[0]==$e||$ve[0]==$y||(!$ve&&$pd&&$Hc[0]==$e)?$Cb:'')).'">';echo
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Vc.$Cb)."' title='".lang(90)."' class='text'> ‚Üì</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.lang(44).'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Gc[$y]=$X["fun"];next($M);}}$Fd=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$y=>$X)$Fd[$y]=max($Fd[$y],min(40,strlen(utf8_decode($X))));}}echo($La?"<th>".lang(91):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$Ac)as$ce=>$K){$Hg=unique_array($L[$ce],$w);if(!$Hg){$Hg=array();foreach($L[$ce]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Hg[$y]=$X;}}$Ig="";foreach($Hg
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$q[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$q[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$Ig.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$Hc&&$M?"":"<td>".checkbox("check[]",substr($Ig,1),in_array(substr($Ig,1),(array)$_POST["check"])).($pd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ig)."' class='edit'>".lang(92)."</a>"));foreach($K
as$y=>$X){if(isset($de[$y])){$p=$q[$y];$X=$n->value($X,$p);if($X!=""&&(!isset($Tb[$y])||$Tb[$y]!=""))$Tb[$y]=(is_mail($X)?$de[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$p["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Ig;if(!$_&&$X!==null){foreach((array)$Ac[$y]as$_c){if(count($Ac[$y])==1||end($_c["source"])==$y){$_="";foreach($_c["source"]as$s=>$Kf)$_.=where_link($s,$_c["target"][$s],$L[$ce][$Kf]);$_=($_c["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($_c["db"]),ME):ME).'select='.urlencode($_c["table"]).$_;if($_c["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($_c["ns"]),$_);if(count($_c["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Hg))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Hg
as$sd=>$W)$_.=where_link($s++,$sd,$W);}$X=select_value($X,$_,$p,$ig);$t=h("val[$Ig][".bracket_escape($y)."]");$Y=$_POST["val"][$Ig][bracket_escape($y)];$Pb=!is_array($K[$y])&&is_utf8($X)&&$L[$ce][$y]==$K[$y]&&!$Gc[$y];$hg=preg_match('~text|lob~',$p["type"]);echo"<td id='$t'";if(($_GET["modify"]&&$Pb)||$Y!==null){$Lc=h($Y!==null?$Y:$K[$y]);echo">".($hg?"<textarea name='$t' cols='30' rows='".(substr_count($K[$y],"\n")+1)."'>$Lc</textarea>":"<input name='$t' value='$Lc' size='$Fd[$y]'>");}else{$Kd=strpos($X,"<i>‚Ä¶</i>");echo" data-text='".($Kd?2:($hg?1:0))."'".($Pb?"":" data-warning='".h(lang(93))."'").">$X</td>";}}}if($La)echo"<td>";$b->backwardKeysPrint($La,$L[$ce]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($L||$D){$bc=true;if($_GET["page"]!="last"){if($z==""||(count($L)<$z&&($L||!$D)))$Cc=($D?$D*$z:0)+count($L);elseif($x!="sql"||!$pd){$Cc=($pd?false:found_rows($S,$Z));if($Cc<max(1e4,2*($D+1)*$z))$Cc=reset(slow_query(count_rows($a,$Z,$pd,$Hc)));else$bc=false;}}$Ae=($z!=""&&($Cc===false||$Cc>$z||$D));if($Ae){echo(($Cc===false?count($L)+1:$Cc-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.lang(94).'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".lang(95)."‚Ä¶');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($L||$D){if($Ae){$Rd=($Cc===false?$D+(count($L)>=$z?2:1):floor(($Cc-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".lang(96)."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".lang(96)."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" ‚Ä¶":"");for($s=max(1,$D-4);$s<min($Rd,$D+5);$s++)echo
pagination($s,$D);if($Rd>0){echo($D+5<$Rd?" ‚Ä¶":""),($bc&&$Cc!==false?pagination($Rd,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Rd'>".lang(97)."</a>");}}else{echo"<legend>".lang(96)."</legend>",pagination(0,$D).($D>1?" ‚Ä¶":""),($D?pagination($D,$D):""),($Rd>$D?pagination($D+1,$D).($Rd>$D+1?" ‚Ä¶":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".lang(98)."</legend>";$Hb=($bc?"":"~ ").$Cc;echo
checkbox("all",1,0,($Cc!==false?($bc?"":"~ ").lang(99,$Cc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Hb' : checked); selectCount('selected2', this.checked || !checked ? '$Hb' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(89),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(85).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(100),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(101),'">
<input type="submit" name="delete" value="',lang(18),'">',confirm(),'</div></fieldset>
';}$Bc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($Bc['sql']);break;}}if($Bc){print_fieldset("export",lang(102)." <span id='selected2'></span>");$ze=$b->dumpOutput();echo($ze?html_select("output",$ze,$ta["output"])." ":""),html_select("format",$Bc,$ta["format"])," <input type='submit' name='export' value='".lang(102)."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Tb,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".lang(103)."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ta["format"],1);echo" <input type='submit' name='import' value='".lang(103)."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$tg'>\n","</form>\n",(!$Hc&&$M?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($R,$t,$B)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$I=$h->query("SELECT $t, $B FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$B LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($K=$I->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($K[0]))."'>".h($K[1])."</a><br>\n";if($K)echo"...\n";}exit;}else{page_header(lang(62),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(104).": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(44)."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.lang(105),'<td>'.lang(106),"</thead>\n";foreach(table_status()as$R=>$K){$B=$b->tableName($K);if(isset($K["Engine"])&&$B!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($R)."'>$B</a>";$X=format_number($K["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($K["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();
