<?php



	error_reporting(E_ERROR | E_PARSE);
	echo "<?php\n" ;
	echo "\n" ;
	echo "// This is a SPIP module file  --  Ceci est un fichier module de SPIP\n" ;
	echo "\n" ;
	echo '$GLOBALS[$GLOBALS[\'idx_lang\']] = array('."\n" ;
	$fc = '...' ;
	global $toolbars ;
	include('inc/toolbars.php') ;
	foreach($toolbars as $toolbar) { $langstrs = array_merge($langstrs, array_map(function($s){ return "tool_$s" ; },array_keys($toolbar))) ; }
	$langstrs = array_unique($langstrs) ;
	natcasesort($langstrs) ;
	$spiplang = array_change_key_case($spiplang) ;
	is_array($langmsgs) && ($langmsgs = array_change_key_case($langmsgs)) ;

	$numentities = array(
'À'=>'&#192;',
'Á'=>'&#193;',
'Â'=>'&#194;',
'Ã'=>'&#195;',
'Ä'=>'&#196;',
'Å'=>'&#197;',
'Æ'=>'&#198;',
'Ç'=>'&#199;',
'È'=>'&#200;',
'É'=>'&#201;',
'Ê'=>'&#202;',
'Ë'=>'&#203;',
'Ì'=>'&#204;',
'Í'=>'&#205;',
'Î'=>'&#206;',
'Ï'=>'&#207;',
'Ð'=>'&#208;',
'Ñ'=>'&#209;',
'Ò'=>'&#210;',
'Ó'=>'&#211;',
'Ô'=>'&#212;',
'Õ'=>'&#213;',
'Ö'=>'&#214;',
'×'=>'&#215;',
'Ø'=>'&#216;',
'Ù'=>'&#217;',
'Ú'=>'&#218;',
'Û'=>'&#219;',
'Ü'=>'&#220;',
'Ý'=>'&#221;',
'Þ'=>'&#222;',
'ß'=>'&#223;',
'à'=>'&#224;',
'á'=>'&#225;',
'â'=>'&#226;',
'ã'=>'&#227;',
'ä'=>'&#228;',
'å'=>'&#229;',
'æ'=>'&#230;',
'ç'=>'&#231;',
'è'=>'&#232;',
'é'=>'&#233;',
'ê'=>'&#234;',
'ë'=>'&#235;',
'ì'=>'&#236;',
'í'=>'&#237;',
'î'=>'&#238;',
'ï'=>'&#239;',
'ð'=>'&#240;',
'ñ'=>'&#241;',
'ò'=>'&#242;',
'ó'=>'&#243;',
'ô'=>'&#244;',
'õ'=>'&#245;',
'ö'=>'&#246;',
'÷'=>'&#247;',
'ø'=>'&#248;',
'ù'=>'&#249;',
'ú'=>'&#250;',
'û'=>'&#251;',
'ü'=>'&#252;',
'ý'=>'&#253;',
'þ'=>'&#254;',
'ÿ'=>'&#255;',
'Ā'=>'&#256;',
'ā'=>'&#257;',
'Ă'=>'&#258;',
'ă'=>'&#259;',
'Ą'=>'&#260;',
'ą'=>'&#261;',
'Ć'=>'&#262;',
'ć'=>'&#263;',
'Ĉ'=>'&#264;',
'ĉ'=>'&#265;',
'Ċ'=>'&#266;',
'ċ'=>'&#267;',
'Č'=>'&#268;',
'č'=>'&#269;',
'Ď'=>'&#270;',
'ď'=>'&#271;',
'Đ'=>'&#272;',
'đ'=>'&#273;',
'Ē'=>'&#274;',
'ē'=>'&#275;',
'Ĕ'=>'&#276;',
'ĕ'=>'&#277;',
'Ė'=>'&#278;',
'ė'=>'&#279;',
'Ę'=>'&#280;',
'ę'=>'&#281;',
'Ě'=>'&#282;',
'ě'=>'&#283;',
'Ĝ'=>'&#284;',
'ĝ'=>'&#285;',
'Ğ'=>'&#286;',
'ğ'=>'&#287;',
'Ġ'=>'&#288;',
'ġ'=>'&#289;',
'Ģ'=>'&#290;',
'ģ'=>'&#291;',
'Ĥ'=>'&#292;',
'ĥ'=>'&#293;',
'Ħ'=>'&#294;',
'ħ'=>'&#295;',
'Ĩ'=>'&#296;',
'ĩ'=>'&#297;',
'Ī'=>'&#298;',
'ī'=>'&#299;',
'Ĭ'=>'&#300;',
'ĭ'=>'&#301;',
'Į'=>'&#302;',
'į'=>'&#303;',
'İ'=>'&#304;',
'ı'=>'&#305;',
'Ĳ'=>'&#306;',
'ĳ'=>'&#307;',
'Ĵ'=>'&#308;',
'ĵ'=>'&#309;',
'Ķ'=>'&#310;',
'ķ'=>'&#311;',
'ĸ'=>'&#312;',
'Ĺ'=>'&#313;',
'ĺ'=>'&#314;',
'Ļ'=>'&#315;',
'ļ'=>'&#316;',
'Ľ'=>'&#317;',
'ľ'=>'&#318;',
'Ŀ'=>'&#319;',
'ŀ'=>'&#320;',
'Ł'=>'&#321;',
'ł'=>'&#322;',
'Ń'=>'&#323;',
'ń'=>'&#324;',
'Ņ'=>'&#325;',
'ņ'=>'&#326;',
'Ň'=>'&#327;',
'ň'=>'&#328;',
'ŉ'=>'&#329;',
'Ŋ'=>'&#330;',
'ŋ'=>'&#331;',
'Ō'=>'&#332;',
'ō'=>'&#333;',
'Ŏ'=>'&#334;',
'ŏ'=>'&#335;',
'Ő'=>'&#336;',
'ő'=>'&#337;',
'Œ'=>'&#338;',
'œ'=>'&#339;',
'Ŕ'=>'&#340;',
'ŕ'=>'&#341;',
'Ŗ'=>'&#342;',
'ŗ'=>'&#343;',
'Ř'=>'&#344;',
'ř'=>'&#345;',
'Ś'=>'&#346;',
'ś'=>'&#347;',
'Ŝ'=>'&#348;',
'ŝ'=>'&#349;',
'Ş'=>'&#350;',
'ş'=>'&#351;',
'Š'=>'&#352;',
'š'=>'&#353;',
'Ţ'=>'&#354;',
'ţ'=>'&#355;',
'Ť'=>'&#356;',
'ť'=>'&#357;',
'Ŧ'=>'&#358;',
'ŧ'=>'&#359;',
'Ũ'=>'&#360;',
'ũ'=>'&#361;',
'Ū'=>'&#362;',
'ū'=>'&#363;',
'Ŭ'=>'&#364;',
'ŭ'=>'&#365;',
'Ů'=>'&#366;',
'ů'=>'&#367;',
'Ű'=>'&#368;',
'ű'=>'&#369;',
'Ų'=>'&#370;',
'ų'=>'&#371;',
'Ŵ'=>'&#372;',
'ŵ'=>'&#373;',
'Ŷ'=>'&#374;',
'ŷ'=>'&#375;',
'Ÿ'=>'&#376;',
'Ź'=>'&#377;',
'ź'=>'&#378;',
'Ż'=>'&#379;',
'ż'=>'&#380;',
'Ž'=>'&#381;'
) ;

	$search = array_keys($numentities) ;
	$search = array_map(function($key){return '~'.$key.'~';}, $search) ;
	$replace= array_values($numentities) ;
	$search[] = "~\r~" ;
	$replace[]= '' ;

	foreach($langstrs as $str) {
		$fstr = strtolower($str) ;
		if (ucfirst($str[0]) !== $fc) {
			$fc = ucfirst($str[0]) ;
			echo "\n// $fc\n" ;
  		}
		if (! $msg = $spiplang[$fstr]) {
			echo "\t'$str' => '', /* missing ".($langmsgs[$fstr]?"(".$langmsgs[$fstr].") ":"")."*/\n" ;
		} else {
			
			echo "\t'$str' => '".preg_replace($search,$replace,$msg)."',\n" ;
		}
	}
	$unusedkeys = array_udiff(array_keys($spiplang), $langstrs, "strcasecmp") ;
	echo "\n// Chaines probablement pas utilisée :\n/* On les garde au cas où ...\n" ;
	foreach($unusedkeys as $str) {
                  echo "\t'$str' => '".preg_replace(array("~'~","~\r~"),array('&#39;',''),$spiplang[$str])."',\n" ;
	}
	echo "*/\n);\n" ;
	echo "?>\n" ;
?>