<?php
/** Adminer Editor - Compact database editor
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.2.0
*/error_reporting(6135);$ec=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($ec||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Gf=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Gf)$$X=$Gf;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0Ñ\0\n @\0¥CÑË\"\0`E„Q∏‡ˇá?¿tvM'îJd¡d\\åb0\0ƒ\"ô¿f”à§Ós5õœÁ—AùXPaJì0Ñ•ë8Ñ#RäT©ëz`à#.©«cÌX√˛»Ä?¿-\0°Im?†.´M∂Ä\0»Ø(Ãâ˝¿/(%å\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1ÃáìŸåﬁl7úáB1Ñ4vb0òÕfsëºÍn2BÃ—±Ÿòﬁn:á#(ºb.\rDc)»»a7EÑë§¬l¶√±îËi1Ãésò¥Á-4ôáf”	»Œi7Ü≥ÈÜÑéåF√©îvt2ûÇ”!ñr0œ„„£t~ΩUç'3MÄ…WÑB¶'cÕP¬:6T\rc£Aæzr_ÓWK∂\r-ºVNFS%~√c≤ŸÌ&õ\\^ r¿õ≠ÊuÇ≈é√ûÙŸã4'7k∂ËØ¬„Q‘Êhö'g\rFB\ryT7SS•P–1=«§cIË :çdî∫m>£S8LÜJÅút.M¢èä	œã`'C°º€–889§» éQÿ˝åÓ2ç#8–ê≠£íò6m˙≤Üjà¢h´<Öå∞´å9/ÎòÁ:êJÍ) Ç§\0d>!\0ZáàvÏªnÎæºo(⁄Û•…k‘7Ωès‡˘>åÓÜ!–R\"*nS˝\0@P\"¡Ëí(ã#[∂•£@gπo¸≠ízn˛9k§8Ünöô™1¥I*àÙ=Õn≤§™è∏Ë0´c(ˆ;æ√†–Ë!∞¸Î*cÏ˜>Œé¨E7DÒLJ©†1 J=”⁄ﬁ1LÇ˚?–s=#` 3\$4ÏÄ˙»u»±ÃŒzG—C YAt´?;◊Q“k&«ÔùYPøuËÂ«Ø}UaHV%G;Ésºî<A\0\\º‘P—\\¬ú&¬™ÛV¶\n£SU√tÌ≈«råÍà∆2§	l^ÌZ6òejÖ¡≠≥A∑dÛ[›s’∂àJPî™ Ûà“ùåä8Ë=ªÉò‡6#ÀÇ74*Ûü®#e»¿ﬁ!’7{∆6ìø<oÕC™9v[ñMÙ≈-`”ıkˆ>élŸ⁄¥ãÂI™ÉH⁄3èx˙Äõ‰w0t6æ√%MR%≥Ωjh⁄Bò<¥\0…AQ<P<:ö„u/§;\\>†À-πÑ àÕ¡QH\nv°L+v÷√¶Ï<Ô\rËÂv‡ˆÓπ\\*†‡…Á”¥›¢gåùnÀ©∏πT–©2Pï\r®¯ﬂã\"+z†8£†∂:#Ä Ë√Œ2ã∫J[êióÇ£®;zò˚—Ù°r 3#®Ÿâ†:„nÌ\r„ΩÉeŸpd›ç› Ë2càÍ4≤køä£\rGïÊE6_≤™ ÿﬁâbãû/å´HB%Ú0Î¢>»»hoW√nxl÷ç†ÊµÉCQ^Ä∞–‘ˇﬂÒ\rÑäæ∂4lK{˛Z∆¸:Ü–‹√Éü.¶p®ßƒÇÈJÛB-≈+Bî¥ë(ÎTÚü%ÆµJõ0™lÿT∂`+…-¡æ@B⁄·€ÑV·íƒ\0¬œCº,ÏØ0t‚‡åFáâÂ?ƒ†À\na@…å>Ç‚ZECìÙOé-Êõ§^QÄ&ﬂ÷˘)I)Æ§ƒ¿ÅRÑ]\r°î9î7_à¢\r…F80µOb˘	ÄëÓ>∫‰˝\nR˝_à—8ÊÇÿŸ´‰ov0§bCA∏F!—tóñƒÉ%0î/ëzAYO(4´ã°à®“	'ü] IÈÌ8hH¬05ò3Ú@x&nàí|T”≥≥)`ê.ìs6eYòD¶z∏åÆ•ÉJ—ìÙû.ÑÒ{GEbÅπ”ã°òãÜ2’◊{\$**˝æ@›Cêû-:zYHZIÙ‡5F]¶≤Y˙˘C™OÍAù¬⁄Û`x'¥.*9t'{ˇ(ÍöwP∂æ†—=¢*âÜ˙*¸xwrÂ‘*cÇûÃc|ÑDüì⁄Vóñ\rÜV.á0‚∆ôV§dà?“Ä¸Í,EÕù`T¶…6€à-ì≈Ïæ≈⁄éT[—ê™z©Ç.Ar±£ÕÄP¯∫nÉc=a‘9FÚnﬂ!Ÿu·ŒA©ﬁÉ0iPÛ¨îÓ∫J6e‰T]Vÿ[\rXÃ·aüñvçkı\n+Eàù·‹ï*\0∂~∂∆˘@g\"ÃNCI\$ç‡…åÉÄÍx@W√yº*vuDŸ\0ﬁvúÎåÜV\0ËV`GÁΩuµEÆ÷ï¬¡fìlòhí@Ô)0@öTï∞7ãÌ€¬ßRA Ÿ∑Ú¥3€ò–´/Q«]™,s÷{VRû±°éˆF´°èAòÑ<®v◊•Ó¥%@9Ç¿F¢’5tâ%÷+∫/¢8;æW—‰⁄«JÔ–o:÷Nˇ`¯	ïˇö¥hÏ¡{‹£ïÓ À‘ê8‘Eu™&∞W|…ÜÑâÆU˙&\r\"‘¡ªâ|-u«ÜÖNÎ∂:nc≤©fV≠ã¬ç√Ë#U20Â>\"Æ≤«>Ã`úk]Ó-Ø«x˘SÿÕá–¢©âÇÍc‚°ÛBíó}ÿ&`àÓr+E≠ì\$úyN˝å±b,Ü¥¥Wx ˛ù-9Â’r”,í¸`Â+úÔÌÀä˘íCú”)òò7€x\r¨˛WµfMåSRº\\Ëz¶ŸQ≤ÃìçîuA¨∫Í2é±ı4ÓL&ÀHi ¬µ∞≤πS\$)e≥ìÊg r»å©É\$]ZÎiYs§ı◊kWñn>µ7E1k8–d√rÛÆök¡˝¢ÎEﬁŸ€w¬wcméTyÅπïÎøaõ\$tx\rB¥˜=Åäˆ¢*î<»É†l°fÙKúëN/∂ºÅ	√l’·¸kHìı8†.ëë˘?f˜õ⁄ˇ„6Ü—áº{gi/\"‡@èñKõÒ@2„Áa|#,Z§±á	≥Òwàd¨ôì≤ÖºÂ6wô^&¡ÍtôÁúP±Ö•ƒ˘]¿ºõ.‡„⁄Ì°TÏÓkro¿âÅ˜\ro=ó%Ê◊h`:\0·±Çêˆ´î|Íä£´aì‘Æ6*:Õ”*á rO-^ñíÒÈn´ÕÛßM∆}Êª˜∆Ayaù±›\nÉu^Ïñ¿rnO\r±ª°`˛T~</∂wƒy˛}Ê:õ|£œ–˚÷Ã°6ª§◊¯ÆüvÓ\rc<∑b#˚‡ÙßÜÓñ\$˘sµÍ|ÁááV)´hãTC˘Ò(ƒΩÒ£»}");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:õågCIº‹\n0õÜSëÿa9ú≈S`∞«àìå&”(∞ n0òçÜQIÏ“fâõ\$±At^ sçG≤…tf6eåßyå ()L‰S¡¿P'èÖ¬·ÃR'Õfq]\"òs>	)‚ë`úH2äEq9à ?à*)âît'∞éœßÿ\n	\rÊs<åPi2IN∆ê*(=2ÃgX·∏Ë.3ôNÑY4ËB<íLó¸Ói©Ã•2›¥z=ö0H¯û–'∑Íåö√u∆tt:úç¬°»Íeπ]`pX9åﬁo5ögÚÛIú‹,2O4„ﬁ—ÖèM∆S∏(àaÖä#æƒ‡ÁíÔ¯|πGÇbËÙ¸xú^Z[«‰ôGºŒuTv™(“ùm@VÚ∏(Üº»bN<ä»`Ê‚X‰ù1…+å‰9J8¬2\r£K∂9hÂ	†¡Ë`ÖÅã∆ÎI8‰õ±Sè±„t˜2É+,£∆I∫„ £ÅpÊ9aËÿ≈< \\8CzÙ„\rä®^éÚ»]ƒ1\\7éC8_Ep^¬–¿ÈM1¿w\"'4féSX9ES|‰õÖ√k3ƒB@ ÊçXa=No4t7çÉdD3µpﬁ—‡Ê:)\\;∞†–‘\r)8H‘≈44Pc=\n‘!pd«’QN\rÃHÔ'çÙ∏ö2¢#\"’•m-∂b,«	ÉM.è°â-IK”)¿…e'éï\"É¥§>2X—≈ìeƒj:9^≤1cÑªç»ùé:Y…@ÀuÀ„ìõ4ÚX«&†“|£)—í¥±-KëxåÎ™¬SË1”Û\$‚°@\\Ö!x]\0å£’Œ¿¬Ò§·FÜCOƒ:‡1Ká≈*ÜF4aàªºkò˙»Kœöæëªˆ2l¨pÃ3J<»‚,2ÿ‡8#„ Ü’\rå‹·ö‹Ó Û§h¨Ñ∑·F±å›â2PÎËåäl(»\$÷∞\nJ€∑-ﬁ «∞cc~πFû‘Ór¯·tbﬁ˚Ωm{h.á{Étk€BµKc£z4åC™9Ö€´~>Éÿ˙»⁄`∆ìπC ¬s:‚›‘!c≈ŸÆ⁄µî*W…HX:WÃù;N‡†®j*é/(·_p3™°HI„Kl…n!tr„£G„≠∫§tCÉ	vÉ?m„§£æ†ü¢ñ\0CŸˆ®ßo‹•cbf6I˛˚'\rÌbÂ≈7hß`Ç»9ΩiÏd5íótaMË={…©ª`NoKâ	!d4–ÉzWXdmH∞ö*Ä∆€S ]œ–3&\0⁄∞	d%A¥-≤Ö	¬Ï(ÑêöêêŸ˘Q–}¯ÇËU!t7∞‰ãÜò>xãët{mYπÑ0ﬁ@^±Ä\"—=á≥Œ@t\r°∞Œƒ+Yß.º∑ºXø\n´I'KTüÄ^(ÏD.@ˆ‹¯++@º3ï“‘Xã	aEÏ!,ÅYÈˆ2-432‘åıMO‡÷I\$q%	ƒãG¶X9ôá¬[R\0nê¡–∏¬†PåJy\r ÚB»p\\H√pgS…º±Faejkó.4∏ÜC.^†yiëà9áPƒàe\"ŒîNYé¨¢BH√#8—B1\"∂j\\⁄©xá#æ‚@G 9Ü2®¬f.–åpsröTJ†x⁄kòñ»4KIl»f˘8z§•K»á>AKÒü°n^íÿ=&åÉAê¿*?'ç≥^%;Ó4‹Ä≥Üå9ç§Qíìh‚Náô>M =['évHI›JßëûìŸv∆‚íR tÉÛ<üî“≤≈^¢ºz‘¬âB^ˆh‚'µÇ…©–)-'#î§9JT¡)ÿ@jO!®⁄c,eòjñ§ñá@H,â¬ÿjàaô©vûZå>≠°“∑µ)E`\0\ná·TÅPÛ8L<âcï:FòÊâ\$\nÉÌÌúÜ√œCHm\"èjãy∑A€S∂†‹S™ûQÑúêŒŒ{T']Wù™U⁄)_L•òi¨màOöÇ•ËÑ˛‘P:g°{∏íZƒó¯.ˇ{î®áDh\nª—¡áa≠\r]9•t‹‡!XAΩ[»∞¶„óCúª◊Å\n:ïîhaúŒ⁄Â\"›¢a2LmÉ∑Õ\\	˚Îp5˜@˙´@m£Ï|Wˆï¿¬%»|uÆ·»+hK√L&¢œ ﬁ3¸.XW‹Ÿ∫∫»Ò*qÉ€c√Èá%ê.KøìÄ»A\rìxhπ‚®I\\Î®dÆHû∫5\n»q%‘v*œ„ÈrIa»0 \"]8êk,›ƒAıå{BÁ\\K/p<aÎüà1ñ0%ño2†œ√ô™¡–%ÜPÚ∞@! ‘iµ9ÃÁf1‘˘4˘åõ‡apÿéw°`ˇAXºup¡—Ω7Ú\\L∫°ü∞tøÑV”∆ìa\$‰ûW“ÅÊË‚„üË:èπ»àe}\rjCïXó∫]⁄˙¡=mî∂ï8À∫\$ûã˛é∑h”=øK7ê5±ôRéÉP∞{rråó,÷_ÎMzÁ%…ßIZó:igîy%HÏ5·ΩÇ§4Q¿fÿ¶«P˜°l˚˛õhÉ≈x≥‚ÍÖãv˘X&¶\$sEØ˙„0íç‰¸ÅÈ5ï∞ÌÌlW§d¿.DHå\$@ö\r@&\r¡à9á\0v•7!Á»o”ÖêŒ√¡Óˇâ5·Ó)#X»i]Œrûoπ~∆ÀÈwêPÍ¬õîQ€=Ú‡ÁqCÌ«Á◊)´=„#óÅ@h'Aòtb;ô€0YDh'éú\nVW}(2Ü`Vƒzv%†t‰\r’ïe®∏∑óÏæp.ÎÅõêÙ∏ì6H9ç°=;n°8C=æ	˛˘˜˝qÄÅ@a+∏äÜk÷0aK·ò3Epô◊C†+ÚAø EpÆßC@>ÚX±˚‚Ô'ÂLóüä{µÉXz¥–oD¡ô%ásPñW:[=ﬂv0í?ﬁ‹∑,%û¿ú{\"Ì.·®.YIÙB‹¬	≥\nWpV¬)µæµq…A£«MªVºÂ5ü˜IˇŸ«P˝öŒøÀéæﬂËâ¡(˚b.∂\$«’˝Ú[“öÕjÎ¿@ØÍh\nFù-4Ì8nj¨’+VM‡xnjæ¶mb\$∞ ®¨ı™\n∂»÷'¢~‡∂ Z@∫Ä∂é†V‚∫ÄL\"„ÜpÜÿ5ÄO,®êç\0Kπ\0äû™-6•\r:îp’Db’ên’–\$∂mm\$i	)˛Oê6(€–API–P+–VHpn®ß4?B‡M∂∑„JFêæ.èˆÙÄË·0–·+‘iÖj« P˛´(Ø&Êª„aå⁄%l]'‹ÔÏ^@(ú5ÉN fsé†—cÙ†bz √œÂ>Ô¬Øx≤∞\0k Èƒê\r<aéXÃGÈ®{\roL≠åx«&œÜ’\$éHjƒ®1Ä‹	®û<Ál-å˙≥è\rÀGKOê—0ïq+c	PÒj\r§Ã∂Á≠jãâ¡áΩØbdÒ¢6¢«\0 sÇ‡¢éÒf¡ –∂±zΩƒj>´§Jû∞‚é˝HÆ±'‚‚3ÍèÖ(F¶—Çﬂ§–z™`O qê•ÀXíç`∂r\r Ï1,üœøgk lv≠Ã|+∞ÚÊkfÏ'Ú=R@Æ4Î6€` -∫.i~4Ú#≈<\$≤R«|u2N;Bn<í-#Ï{%àà˚âb=‚Â#ÃÔ(»J1b%g∏º„zãê¸ãËG2´1^8wÚÚb^%/ú ÔæG≠*Á†7D\0^ër∫cÑép\níŒL,ÄÛ0˜+ Xrß\$  8Ñ◊-)+(DÇ”¿‘Ê‡–\nÑ¡íb¨ì©s1Ï”2G\\{‡¬.I~`á*≥Œl]±ìNÕ—± X.#%\$K¿¡S'3Ã”Ã6É\$CrâC0BÙ\r”--H|Üìà »Ü»,û\"é57”í¥©äòÓT…Û•)ÓnâéƒÌƒ∏Ì√/2˜Lùƒa7œ2K„1/d\"ˇ4SHÔÚÊÕ‘Õå‹Ú§¬1Û™ô\0O6R8|S|+©r¡”≤ú”–‡æ\$O\re(ä‡®\r\"8âÁ≠”éës¶\rß©2 ë!*ÚmNTQÚ¸ªê¯]jk+15”R†hÊ1ÛQÄz`pÚ®R≠E-S““S\r1@vo.t‘TUFqE‚–;g\\Á\"DQ„`‰†Ê±sIŒv`Ø˛0Û•	+KÄ pTäñ)|Ñl‡ÒøÁ8%'ÁLüLJ@\r&+® Ú‘É≤Xì‰¿ Â&Ât∂·\\*'4«ÂN∆£O\0∑OT˘Db\r1í’PL\0ú≤†…Û∫gMƒÃ≈‡Õ\"O>Ãﬁ¿C<tJÙN∫-:<‡‰ô\"V]`¶/Bå’*‹ß˜-£w<1fõMÿ¸Úíq±8ú-¢o®~pK¿◊dã	¢ŒÒ\nÒ,4«WF¡\$∆∫nl\0Ÿ≠àLö\nâÖÆmÆ∏)ÅZÄœZ…Üòı¶^@Œ	†¬.’Ìj◊D˝]K`û†˙òt\rØå'\$^S'‡O]ÈÊS–¥ÿìÙ5„†§b%ª\\’¿\$ÇL◊Vau´ZÔ◊UΩ]‡’‡|EMÜôïﬂ]iÈ]µ 9∂1d	f.eP\rÄ‡!≈s)Uj Ò∂W)\"¸&BS≈ï'√~¬vps	_'_fåuT5G0˛5r<vzl‡ÈhÙr’˘§YiqMD∏˝UqfØ‘ú/Íÿ‰ñ;oÛ\r˝T‰øÔ˛ó`{\0r™”î\n•ãU!–’µˇ\"iÔ(á£P„ƒv∂»“¢Ãi0⁄i∞·O‹˙Úé˝æ≤±// ¬\rU“r\"•ÓQ†≈\n\0÷:¿ÒE∆n”kÄ #~RÊ\"ªenã ËÉtJÑ„∂;∑P	óUuóCtg¨ tL¿Ç8d\0û@‘l`w◊~ óÉxwä bé	®åJ ÊÛÉvn\nÄ†, u; ◊uu≈. V<o&|1ˆ◊∆Q|e/|¿ÊHbQs∑>w]7 70„†‰„Ó Ú!\"Àê4\0zWË2 D∆\\Wó<2\"™Ä_ xwÔ|áqJå&¬eÇ∑ÚÊ¯24\"qXê:d6à¯+¢‚„-ÕÉò/É—»Î‚”Ñ£[V7¿1‡ﬂ\r«c¬–\n\0û\n`©J é∏~+ó'1f<m˜n®Vôu∑pPD>!Çéâ√G\0[aßô\r®vÓ\0^\0ZK Ó®~∑&#„å5Ä…Ö7øwóâ%/âƒÓ(‡∞∏ò®F‘Ø?`ªz«%vÿjy¯já\$w/óﬁ!fqT,∂ò”âY7ÛI*j‡ºF,üyRÂK~r†ŸrËèíß_ÖWÌ|x;`‹·é‚„çÉênn˘<'%xÂ—Ä≥8ÇﬂÄ ÌÄb_Ä¢J ÂÅ\"†Ûèh`Ev\\ÄÀÅ¯#\"ÿ<xY~>4ŸõÉ…ñŸÑxdL»˚ÓFq9TlÂjèV#q-Ÿ=qŸD2Mﬁãòä∆ud+rTtg¡ì…¬c¬fn¢éxπ^@ôd<˘jy20±F\"àÔƒã¥ãësGpq¢hì*F≠Ç†åÑœ™Ñ¿YÄ‚;9så≥ôÏgΩƒ\náÎLìçQIS!Û°'ÏﬁáÁ#LÃ◊¬n}BXZw<,Õ¨d9 ≠ÇFÄ^\r1®zıÆÚYŸŸúcw;”@ly B™¬¿ÑfZ`ﬁì˙Â@˘ßÇIß⁄Äül!®q»ÏÒ¨#O£íusdü2…å† \n†§	(ú\rπdGF†™@ÿ»≈⁄›Æ\0ﬂÆE∞1”ﬂN3¯º¬tÎ¡Y«–%@u®ßU{¶mû∆=1¿ﬁDBéÕ>a&ƒ…Õ\n–◊\0BÓ|ö®:I+‡–,≥7'öê8ç¿∏‡\\PÆ,\"™-sc…sv˜úG£ù˜'ûWûöù\$=}ÿ[~ YüycYi2sw≥4\rK∫.‰PÖU@ËÁèú\nAi2◊ŸÇπY~'Amqà”öÿ,4<ö˙sòsÚÚâ¨úÄ»#Ã@¡`X„\rÕ≤≥ì—1E=G4vG\0R⁄Çœ◊'íY@ç7:¡º¡@fP¡Ã V{˜ø´é!\"z€Ù7M≤o[ƒD!*ñ«W˘ 2jó2g8çÒ¶ü|L\$D÷iG}ÏGRb!rÓÇ”&-3‘£mı»ôÇ\r0˜qh1Ki,|»e÷∑zÍóHÙYFÄd˙iS3Î<∫cí Õ«’¿ìc£.n¿‰iBx-rîvï≈YJ„ŸNºj!(ìHfÁŸÓcÑg) ûÛ£%œCo[È(ëXÇG9–ÏäB1›ŒDGñºèïeL'8ıe?]<O∑#–ËäGTıÄbÄXQ *†‡√\rp¡v∏ªÑ\n<ı\$˚Y\n:ô±∏öm˝`Ë@◊OÎ\0ÓùUÊ%Ù5\0∏†`\0ÇE}#M3!ã!GútÍwR¶BﬁŸVºì≥ú˛˚›π¶¿I‹x=¿§˛C«‹\"q^ƒ\nÄﬁÂE-e·‘#ÏcùÏÄ≤ˇ˝ÿV“˝;fX≤<=÷˝\0dOØçﬁÔñº‡Úì·(Æ•kﬁ[\0˛(ûV§Y›É«œù˛®']•ÇÂ–¸WŒ∞ø–˜\rÏ}ÕÁ,<hØf@¶ò…ê	¨PäÜ3©Å;R£’º\\†eâëù◊∆ﬁ]‰Èb´≤¿WØ#YØz„Æ{‰√ÆÂÕûyT¶ªî‚ªôñº—gCıÎy˚πß]“µÑ?^©¢3@◊VıæÃœ^“òÊ8óÀTËW>ÕÓb\r„>Óù]∑ª¨—€⁄:˛ó‹~ÙÓ=Œ!}”i'‡]‹æ2(˘\nFg™†X©Å∫Xn}‚#‹óúöÒ“n`ò\r‰?tÒ XQ…ëıLZny<ÓT\$cˆ·\\ÁπO–ÄÓjÓx)ˆŸL‰ñCÂ◊Ê\$Ø%^µÔ_')jéÓgüËyﬁÓ}tÂ{Ö<Û««]ÙG||©ÍS<b‚ì«¯Ë‰≈Î≥&<ü}QË¥˜ÿ•Wiw	Âøƒ Û1Î/ä\r%Ñ1•Äx˙√ï? ˇài=3ÚÑáèÖ…`ÎˆzI◊NÍu◊Z°EÕ>~®Ö¥?«Œ§n≤˚ÔﬁNr\0Ç–\$oj7Z&é†™∂π9S	tU`¢tc∏*¶å7Ås\r≈|wÁõï N˙<pOÄÿ\"cò©aæ7À–\0Ä8<Õ:ƒXyªv–&†íîµ†Fnh\"√…F†Ä∞npX∫nDwÅœñqmhvÅI⁄RÑ@≠¡ãr%Z›‚SFÉº…Êá*y∞™õÆ(Q∂çÂ≈P(ê\nFl˙1ËA&pLÉ≥Œ Ú|eπ<ÌW°Ç¸¨ó·íeBÉŸ0Fò`mãu∞π\nÎœXKñä•AôÇ≈\\¬∫úÀ‰Nj}Ôa@#d®¢˙f&\0àu”ÂÑ*	D» ≤—ì«‰(!Å	x◊°”Å¬‰îÉ∑Ç\$+Q5\nß5Ño0≥8\$-°pX]B¢ Ö¸ ·ÇA8bF–KÜD5¬¬ò#CV„9Ü¬'a¥o–—∑Eñ©ûà¸”ôyàÌƒÜç%0ZHﬁh3ªQ7ç'FI+ä∑X88‡rÀ\"\$9≠’§L≈ÅÜ¢âˇTÛ‹ù.‡=\"¿Bâ.NFéòL¬î}Õú ê@ëÅ»¶°,â∑ÖîËÒfúlXÇ‹X∑‚`jòí\$«éâ@Cp©aö¿.%ÉíBÄ!4=`Ñ*9|I‚S‚ººÂäPêT(}Sˆ*C5oZ^OÓ∂∞Ωœ\0˘˛\"¬nòBptÇh°BRÙn=\"Ä2oâ¯œﬁµê˜éxF)Ä–‹eîMEÒ7ä±ﬂBKh¡\"Ê*«¡å::KÓqXaßîƒ[,‡a‹\0ÔG\$m∞@a˙îT—≈âÀÊnçò¿Ú‡Ñ—®ÈÃQ?⁄ﬁàR‡¬∏åypÂqRôÓ™¶3ΩÄ1k”[ﬁ¢◊Ùµè–Óp@Îl@z€5Óü®∑iìR∞£≈J-fúT!‡y∏v≈(™ÛA1„L5Ko„(2Â+x¬q j4xUÕEƒ=∫9Qµ9±Œ#q®Ú™.-Ωz*‰ﬁö(ﬁµÒØ¡€l|RNƒK‡ãbÖ]YMd…¡íÎ˙yÉöxˇ,q Rb'cﬂÛàHA,∞z„,›)!HÊGº¯ë—¨uæ#¿»ÅI±ÔIRQF¢kÄ0ã\0ÚR-Ec=£–WÚ°ú'Q∂9ºsIc†÷5±Í\r}zêıè%6∫8—»fc3–…Aú`.d◊");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0!Ñè©ÀÌMÒÃ*)æo˙Ø) qï°eàµÓ#ƒÚLÀ\0;";break;case"cross.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0#Ñè©ÀÌ#\na÷Fo~y√.Å_waî·1Á±JÓG¬L◊6]\0\0;";break;case"up.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0 Ñè©ÀÌMQN\nÔ}Ùûa8äyöa≈∂Æ\0«Ú\0;";break;case"down.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0 Ñè©ÀÌMÒÃ*)æ[W˛\\¢«L&Ÿú∆∂ï\0«Ú\0;";break;case"arrow.gif":echo"GIF89a\0\n\0Ä\0\0ÄÄÄˇˇˇ!˘\0\0\0,\0\0\0\0\0\n\0\0Çiñ±ãûî™”≤ﬁª\0\0;";break;}}exit;}function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
idf_unescape($u){$bd=substr($u,-1);return
str_replace($bd.$bd,$bd,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
remove_slashes($ie,$ec=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($ie)){foreach($X
as$Tc=>$W){unset($ie[$y][$Tc]);if(is_array($W)){$ie[$y][stripslashes($Tc)]=$W;$ie[]=&$ie[$y][stripslashes($Tc)];}else$ie[$y][stripslashes($Tc)]=($ec?$W:stripslashes($W));}}}}function
bracket_escape($u,$Fa=false){static$uf=array(':'=>':1',']'=>':2','['=>':3');return
strtr($u,($Fa?array_flip($uf):$uf));}function
charset($g){return(version_compare($g->server_info,"5.5.3")>=0?"utf8mb4":"utf8");}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($C,$Y,$Ta,$Zc="",$Hd="",$Xa=""){$K="<input type='checkbox' name='$C' value='".h($Y)."'".($Ta?" checked":"").($Hd?' onclick="'.h($Hd).'"':'').">";return($Zc!=""||$Xa?"<label".($Xa?" class='$Xa'":"").">$K".h($Zc)."</label>":$K);}function
optionlist($Md,$He=null,$Nf=false){$K="";foreach($Md
as$Tc=>$W){$Nd=array($Tc=>$W);if(is_array($W)){$K.='<optgroup label="'.h($Tc).'">';$Nd=$W;}foreach($Nd
as$y=>$X)$K.='<option'.($Nf||is_string($y)?' value="'.h($y).'"':'').(($Nf||is_string($y)?(string)$y:$X)===$He?' selected':'').'>'.h($X);if(is_array($W))$K.='</optgroup>';}return$K;}function
html_select($C,$Md,$Y="",$Gd=true){if($Gd)return"<select name='".h($C)."'".(is_string($Gd)?' onchange="'.h($Gd).'"':"").">".optionlist($Md,$Y)."</select>";$K="";foreach($Md
as$y=>$X)$K.="<label><input type='radio' name='".h($C)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$K;}function
select_input($Ba,$Md,$Y="",$Zd=""){return($Md?"<select$Ba><option value=''>$Zd".optionlist($Md,$Y,true)."</select>":"<input$Ba size='10' value='".h($Y)."' placeholder='$Zd'>");}function
confirm(){return" onclick=\"return confirm('".'Czy jeste≈õ pewien?'."');\"";}function
print_fieldset($t,$dd,$Uf=false,$Hd=""){echo"<fieldset><legend><a href='#fieldset-$t' onclick=\"".h($Hd)."return !toggle('fieldset-$t');\">$dd</a></legend><div id='fieldset-$t'".($Uf?"":" class='hidden'").">\n";}function
bold($Na,$Xa=""){return($Na?" class='active $Xa'":($Xa?" class='$Xa'":""));}function
odd($K=' class="odd"'){static$s=0;if(!$K)$s=-1;return($s++%2?$K:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($y,$X=null){static$fc=true;if($fc)echo"{";if($y!=""){echo($fc?"":",")."\n\t\"".addcslashes($y,"\r\n\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'undefined');$fc=false;}else{echo"\n}\n";$fc=true;}}function
ini_bool($Kc){$X=ini_get($Kc);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$K;if($K===null)$K=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$K;}function
set_password($Qf,$O,$V,$H){$_SESSION["pwds"][$Qf][$O][$V]=($_COOKIE["adminer_key"]&&is_string($H)?array(encrypt_string($H,$_COOKIE["adminer_key"])):$H);}function
get_password(){$K=get_session("pwds");if(is_array($K))$K=($_COOKIE["adminer_key"]?decrypt_string($K[0],$_COOKIE["adminer_key"]):false);return$K;}function
q($Q){global$g;return$g->quote($Q);}function
get_vals($I,$e=0){global$g;$K=array();$J=$g->query($I);if(is_object($J)){while($L=$J->fetch_row())$K[]=$L[$e];}return$K;}function
get_key_vals($I,$h=null,$mf=0){global$g;if(!is_object($h))$h=$g;$K=array();$h->timeout=$mf;$J=$h->query($I);$h->timeout=0;if(is_object($J)){while($L=$J->fetch_row())$K[$L[0]]=$L[1];}return$K;}function
get_rows($I,$h=null,$m="<p class='error'>"){global$g;$gb=(is_object($h)?$h:$g);$K=array();$J=$gb->query($I);if(is_object($J)){while($L=$J->fetch_assoc())$K[]=$L;}elseif(!$J&&!is_object($h)&&$m&&defined("PAGE_HEADER"))echo$m.error()."\n";return$K;}function
unique_array($L,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$K=array();foreach($v["columns"]as$y){if(!isset($L[$y]))continue
2;$K[$y]=$L[$y];}return$K;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$o=array()){global$g,$x;$K=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$K[]=$e.(($x=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X))||$x=="mssql"?" LIKE ".q(addcslashes($X,"%_\\")):" = ".unconvert_field($o[$y],q($X)));if($x=="sql"&&preg_match('~char|text~',$o[$y]["type"])&&preg_match("~[^ -@]~",$X))$K[]="$e = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$y)$K[]=escape_key($y)." IS NULL";return
implode(" AND ",$K);}function
where_check($X,$o=array()){parse_str($X,$Ra);remove_slashes(array(&$Ra));return
where($Ra,$o);}function
where_link($s,$e,$Y,$Jd="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$Jd:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$o,$N=array()){$K="";foreach($f
as$y=>$X){if($N&&!in_array(idf_escape($y),$N))continue;$ya=convert_field($o[$y]);if($ya)$K.=", $ya AS ".idf_escape($y);}return$K;}function
cookie($C,$Y,$gd=2592000){global$aa;$G=array($C,(preg_match("~\n~",$Y)?"":$Y),($gd?time()+$gd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;return
call_user_func_array('setcookie',$G);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Qf,$O,$V,$l=null){global$Ab;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($Ab))."|username|".($l!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Qf!="server"||$O!=""?urlencode($Qf)."=".urlencode($O)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($hd,$sd=null){if($sd!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($hd!==null?$hd:$_SERVER["REQUEST_URI"]))][]=$sd;}if($hd!==null){if($hd=="")$hd=".";header("Location: $hd");exit;}}function
query_redirect($I,$hd,$sd,$re=true,$Tb=true,$Yb=false,$lf=""){global$g,$m,$b;if($Tb){$Te=microtime(true);$Yb=!$g->query($I);$lf=format_time($Te);}$Re="";if($I)$Re=$b->messageQuery($I,$lf);if($Yb){$m=error().$Re;return
false;}if($re)redirect($hd,$sd.$Re);return
true;}function
queries($I){global$g;static$le=array();static$Te;if(!$Te)$Te=microtime(true);if($I===null)return
array(implode("\n",$le),format_time($Te));$le[]=(preg_match('~;$~',$I)?"DELIMITER ;;\n$I;\nDELIMITER ":$I).";";return$g->query($I);}function
apply_queries($I,$T,$Qb='table'){foreach($T
as$R){if(!queries("$I ".$Qb($R)))return
false;}return
true;}function
queries_redirect($hd,$sd,$re){list($le,$lf)=queries(null);return
query_redirect($le,$hd,$sd,$re,false,!$re,$lf);}function
format_time($Te){return
sprintf('%.3f s',max(0,microtime(true)-$Te));}function
remove_from_uri($Td=""){return
substr(preg_replace("~(?<=[?&])($Td".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($F,$nb){return" ".($F==$nb?$F+1:'<a href="'.h(remove_from_uri("page").($F?"&page=$F".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($F+1)."</a>");}function
get_file($y,$qb=false){$bc=$_FILES[$y];if(!$bc)return
null;foreach($bc
as$y=>$X)$bc[$y]=(array)$X;$K='';foreach($bc["error"]as$y=>$m){if($m)return$m;$C=$bc["name"][$y];$sf=$bc["tmp_name"][$y];$ib=file_get_contents($qb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$sf":$sf);if($qb){$Te=substr($ib,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Te,$se))$ib=iconv("utf-16","utf-8",$ib);elseif($Te=="\xEF\xBB\xBF")$ib=substr($ib,3);$K.=$ib."\n\n";}else$K.=$ib;}return$K;}function
upload_error($m){$pd=($m==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($m?'Wgranie pliku by≈Ço niemo≈ºliwe.'.($pd?" ".sprintf('Maksymalna wielko≈õƒá pliku to %sB.',$pd):""):'Plik nie istnieje.');}function
repeat_pattern($Xd,$ed){return
str_repeat("$Xd{0,65535}",$ed/65535)."$Xd{0,".($ed%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$ed=80,$Ze=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$ed).")($)?)u",$Q,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ed).")($)?)",$Q,$A);return
h($A[1]).$Ze.(isset($A[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",' '),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($ie,$Ec=array()){while(list($y,$X)=each($ie)){if(!in_array($y,$Ec)){if(is_array($X)){foreach($X
as$Tc=>$W)$ie[$y."[$Tc]"]=$W;}else
echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$Zb=false){$K=table_status($R,$Zb);return($K?$K:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$K=array();foreach($b->foreignKeys($R)as$p){foreach($p["source"]as$X)$K[$X][]=$p;}return$K;}function
enum_input($U,$Ba,$n,$Y,$Lb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$n["length"],$md);$K=($Lb!==null?"<label><input type='$U'$Ba value='$Lb'".((is_array($Y)?in_array($Lb,$Y):$Y===0)?" checked":"")."><i>".'puste'."</i></label>":"");foreach($md[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ta=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$K.=" <label><input type='$U'$Ba value='".($s+1)."'".($Ta?' checked':'').'>'.h($b->editVal($X,$n)).'</label>';}return$K;}function
input($n,$Y,$q){global$g,$Bf,$b,$x;$C=h(bracket_escape($n["field"]));echo"<td class='function'>";if(is_array($Y)&&!$q){$wa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$wa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$wa);$q="json";}$we=($x=="mssql"&&$n["auto_increment"]);if($we&&!$_POST["save"])$q=null;$qc=(isset($_GET["select"])||$we?array("orig"=>'bez zmian'):array())+$b->editFunctions($n);$Ba=" name='fields[$C]'";if($n["type"]=="enum")echo
nbsp($qc[""])."<td>".$b->editInput($_GET["edit"],$n,$Ba,$Y);else{$fc=0;foreach($qc
as$y=>$X){if($y===""||!$X)break;$fc++;}$Gd=($fc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($n["field"])))."]']; if ($fc > f.selectedIndex) f.selectedIndex = $fc;\" onkeyup='keyupChange.call(this);'":"");$Ba.=$Gd;$vc=(in_array($q,$qc)||isset($qc[$q]));echo(count($qc)>1?"<select name='function[$C]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($qc,$q===null||$vc?$q:"")."</select>":nbsp(reset($qc))).'<td>';$Mc=$b->editInput($_GET["edit"],$n,$Ba,$Y);if($Mc!="")echo$Mc;elseif($n["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$n["length"],$md);foreach($md[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ta=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$s]' value='".(1<<$s)."'".($Ta?' checked':'')."$Gd>".h($b->editVal($X,$n)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$n["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'$Gd>";elseif(($if=preg_match('~text|lob~',$n["type"]))||preg_match("~\n~",$Y)){if($if&&$x!="sqlite")$Ba.=" cols='50' rows='12'";else{$M=min(12,substr_count($Y,"\n")+1);$Ba.=" cols='30' rows='$M'".($M==1?" style='height: 1.2em;'":"");}echo"<textarea$Ba>".h($Y).'</textarea>';}elseif($q=="json")echo"<textarea$Ba cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$rd=(!preg_match('~int~',$n["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$n["length"],$A)?((preg_match("~binary~",$n["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$n["unsigned"]?1:0)):($Bf[$n["type"]]?$Bf[$n["type"]]+($n["unsigned"]?0:1):0));if($x=='sql'&&$g->server_info>=5.6&&preg_match('~time~',$n["type"]))$rd+=7;echo"<input".((!$vc||$q==="")&&preg_match('~(?<!o)int~',$n["type"])?" type='number'":"")." value='".h($Y)."'".($rd?" maxlength='$rd'":"").(preg_match('~char|binary~',$n["type"])&&$rd>20?" size='40'":"")."$Ba>";}}}function
process_input($n){global$b;$u=bracket_escape($n["field"]);$q=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($n["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($n["auto_increment"]&&$Y=="")return
null;if($q=="orig")return($n["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($n["field"]):false);if($q=="NULL")return"NULL";if($n["type"]=="set")return
array_sum((array)$Y);if($q=="json"){$q="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$n["type"])&&ini_bool("file_uploads")){$bc=get_file("fields-$u");if(!is_string($bc))return
false;return
q($bc);}return$b->processInput($n,$Y,$q);}function
fields_from_edit(){global$_b;$K=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$C=bracket_escape($y,1);$K[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$_b->primary),);}return$K;}function
search_tables(){global$b,$g;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$mc=false;foreach(table_status('',true)as$R=>$S){$C=$b->tableName($S);if(isset($S["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$J=$g->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$J||$J->fetch_row()){if(!$mc){echo"<ul>\n";$mc=true;}echo"<li>".($J?"<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>\n":"$C: <span class='error'>".error()."</span>\n");}}}echo($mc?"</ul>":"<p class='message'>".'Brak tabel.')."\n";}function
dump_headers($Cc,$xd=false){global$b;$K=$b->dumpHeaders($Cc,$xd);$Rd=$_POST["output"];if($Rd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Cc).".$K".($Rd!="file"&&!preg_match('~[^0-9a-z]~',$Rd)?".$Rd":""));session_write_close();ob_flush();flush();return$K;}function
dump_csv($L){foreach($L
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$L[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$L)."\r\n";}function
apply_sql_function($q,$e){return($q?($q=="unixepoch"?"DATETIME($e, '$q')":($q=="count distinct"?"COUNT(DISTINCT ":strtoupper("$q("))."$e)"):$e);}function
get_temp_dir(){$K=ini_get("upload_tmp_dir");if(!$K){if(function_exists('sys_get_temp_dir'))$K=sys_get_temp_dir();else{$cc=@tempnam("","");if(!$cc)return
false;$K=dirname($cc);unlink($cc);}}return$K;}function
password_file($lb){$cc=get_temp_dir()."/adminer.key";$K=@file_get_contents($cc);if($K||!$lb)return$K;$oc=@fopen($cc,"w");if($oc){chmod($cc,0660);$K=rand_string();fwrite($oc,$K);fclose($oc);}return$K;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$n,$jf){global$b,$aa;if(is_array($X)){$K="";foreach($X
as$Tc=>$W)$K.="<tr>".($X!=array_values($X)?"<th>".h($Tc):"")."<td>".select_value($W,$_,$n,$jf);return"<table cellspacing='0'>$K</table>";}if(!$_)$_=$b->selectLink($X,$n);if($_===null){if(is_mail($X))$_="mailto:$X";if($je=is_url($X))$_=(($je=="http"&&$aa)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$X:"$je://www.adminer.org/redirect/?url=".urlencode($X));}$K=$b->editVal($X,$n);if($K!==null){if($K==="")$K="&nbsp;";elseif(!is_utf8($K))$K="\0";elseif($jf!=""&&is_shortable($n))$K=shorten_utf8($K,max(0,+$jf));else$K=h($K);}return$b->selectVal($K,$_,$n,$X);}function
is_mail($Ib){$za='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$zb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Xd="$za+(\\.$za+)*@($zb?\\.)+$zb";return
is_string($Ib)&&preg_match("(^$Xd(,\\s*$Xd)*\$)i",$Ib);}function
is_url($Q){$zb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($zb?\\.)+$zb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q,$A)?strtolower($A[1]):"");}function
is_shortable($n){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$n["type"]);}function
count_rows($R,$Z,$Rc,$r){global$x;$I=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Rc&&($x=="sql"||count($r)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$r).")$I":"SELECT COUNT(*)".($Rc?" FROM (SELECT 1$I$rc) x":$I));}function
slow_query($I){global$b,$tf;$l=$b->database();$mf=$b->queryTimeout();if(support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$Yc=$h->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$tf,'&kill=',$Yc,'\');
}, ',1000*$mf,');
</script>
';}else$h=null;ob_flush();flush();$K=@get_key_vals($I,$h,$mf);if($h){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($K);}function
get_token(){$oe=rand(1,1e6);return($oe^$_SESSION["token"]).":$oe";}function
verify_token(){list($tf,$oe)=explode(":",$_POST["token"]);return($oe^$_SESSION["token"])==$tf;}function
lzw_decompress($Ka){$xb=256;$La=8;$Za=array();$ye=0;$ze=0;for($s=0;$s<strlen($Ka);$s++){$ye=($ye<<8)+ord($Ka[$s]);$ze+=8;if($ze>=$La){$ze-=$La;$Za[]=$ye>>$ze;$ye&=(1<<$ze)-1;$xb++;if($xb>>$La)$La++;}}$wb=range("\0","\xFF");$K="";foreach($Za
as$s=>$Ya){$Hb=$wb[$Ya];if(!isset($Hb))$Hb=$Yf.$Yf[0];$K.=$Hb;if($s)$wb[]=$Yf.$Hb[0];$Yf=$Hb;}return$K;}function
on_help($db,$Oe=0){return" onmouseover='helpMouseover(this, event, ".h($db).", $Oe);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$o,$L,$Jf){global$b,$x,$tf,$m;$df=$b->tableName(table_status1($a,true));page_header(($Jf?'Edytuj':'Dodaj'),$m,array("select"=>array($a,$df)),$df);if($L===false)echo"<p class='error'>".'Brak rekord√≥w.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$o)echo"<p class='error'>".'Brak uprawnie≈Ñ do edycji tej tabeli'."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($o
as$C=>$n){echo"<tr><th>".$b->fieldName($n);$rb=$_GET["set"][bracket_escape($C)];if($rb===null){$rb=$n["default"];if($n["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$rb,$se))$rb=$se[1];}$Y=($L!==null?($L[$C]!=""&&$x=="sql"&&preg_match("~enum|set~",$n["type"])?(is_array($L[$C])?array_sum($L[$C]):+$L[$C]):$L[$C]):(!$Jf&&$n["auto_increment"]?"":(isset($_GET["select"])?false:$rb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$n);$q=($_POST["save"]?(string)$_POST["function"][$C]:($Jf&&$n["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$n["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$q="now";}input($n,$Y,$q);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($o){echo"<input type='submit' value='".'Zapisz zmiany'."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Jf?'Zapisz i kontynuuj edycjƒô'."' onclick='return !ajaxForm(this.form, \"".'Zapisywanie'.'...", this)':'Zapisz i dodaj nastƒôpny')."' title='Ctrl+Shift+Enter'>\n";}echo($Jf?"<input type='submit' name='delete' value='".'Usu≈Ñ'."'".confirm().">\n":($_POST||!$o?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$tf,'">
</form>
';}global$b,$g,$Ab,$Fb,$Nb,$m,$qc,$sc,$aa,$Lc,$x,$ba,$ad,$Fd,$Yd,$We,$wc,$tf,$wf,$Bf,$If,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$G=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;call_user_func_array('session_set_cookie_params',$G);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$ec);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);function
get_lang(){return'pl';}function
lang($vf,$Cd=null){if(is_array($vf)){$be=($Cd==1?0:($Cd%10>1&&$Cd%10<5&&$Cd/10%10!=1?1:2));$vf=$vf[$be];}$vf=str_replace("%d","%s",$vf);$Cd=format_number($Cd);return
sprintf($vf,$Cd);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$be=array_search("SQL",$b->operators);if($be!==false)unset($b->operators[$be]);}function
dsn($Db,$V,$H){try{parent::__construct($Db,$V,$H);}catch(Exception$Rb){auth_error($Rb->getMessage());}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($I,$Cf=false){$J=parent::query($I);$this->error="";if(!$J){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($J);return$J;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result($J=null){if(!$J){$J=$this->_result;if(!$J)return
false;}if($J->columnCount()){$J->num_rows=$J->rowCount();return$J;}$this->affected_rows=$J->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($I,$n=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch();return$L[$n];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$L=(object)$this->getColumnMeta($this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=(in_array("blob",(array)$L->flags)?63:0);return$L;}}}$Ab=array();class
Min_SQL{var$_conn;function
Min_SQL($g){$this->_conn=$g;}function
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$ge=false){global$b,$x;$Rc=(count($r)<count($N));$I=$b->selectQueryBuild($N,$Z,$r,$E,$z,$F);if(!$I)$I="SELECT".limit(($_GET["page"]!="last"&&+$z&&$r&&$Rc&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$N)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($r&&$Rc?"\nGROUP BY ".implode(", ",$r):"").($E?"\nORDER BY ".implode(", ",$E):""),($z!=""?+$z:null),($F?$z*$F:0),"\n");$Te=microtime(true);$K=$this->_conn->query($I);if($ge)echo$b->selectQuery($I,format_time($Te));return$K;}function
delete($R,$me,$z=0){$I="FROM ".table($R);return
queries("DELETE".($z?limit1($I,$me):" $I$me"));}function
update($R,$P,$me,$z=0,$Je="\n"){$Pf=array();foreach($P
as$y=>$X)$Pf[]="$y = $X";$I=table($R)." SET$Je".implode(",$Je",$Pf);return
queries("UPDATE".($z?limit1($I,$me):" $I$me"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$M,$ee){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$Ab["sqlite"]="SQLite 3";$Ab["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$ce=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
Min_SQLite($cc){$this->_link=new
SQLite3($cc);$Rf=$this->_link->version();$this->server_info=$Rf["versionString"];}function
query($I){$J=@$this->_link->query($I);$this->error="";if(!$J){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($J->numColumns())return
new
Min_Result($J);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($I,$n=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetchArray();return$L[$n];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($cc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($cc);}function
query($I,$Cf=false){$vd=($Cf?"unbufferedQuery":"query");$J=@$this->_link->$vd($I,SQLITE_BOTH,$m);$this->error="";if(!$J){$this->error=$m;return
false;}elseif($J===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($J);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($I,$n=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetch();return$L[$n];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;if(method_exists($J,'numRows'))$this->num_rows=$J->numRows();}function
fetch_assoc(){$L=$this->_result->fetch(SQLITE_ASSOC);if(!$L)return
false;$K=array();foreach($L
as$y=>$X)$K[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$K;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$Xd='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Xd\\.)?$Xd\$~",$C,$A)){$R=($A[3]!=""?$A[3]:idf_unescape($A[2]));$C=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($cc){$this->dsn(DRIVER.":$cc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($cc){if(is_readable($cc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$cc)?$cc:dirname($_SERVER["SCRIPT_FILENAME"])."/$cc")." AS a")){$this->Min_SQLite($cc);return
true;}return
false;}function
multi_query($I){return$this->_result=$this->query($I);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$ee){$Pf=array();foreach($M
as$P)$Pf[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($M))).") VALUES\n".implode(",\n",$Pf));}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($I,$Z,$z,$D=0,$Je=" "){return" $I$Z".($z!==null?$Je."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($I,$Z){global$g;return($g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($I,$Z,1):" $I$Z");}function
db_collation($l,$bb){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($k){return
array();}function
table_status($C=""){global$g;$K=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$L){$L["Oid"]=1;$L["Auto_increment"]="";$L["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($L["Name"]));$K[$L["Name"]]=$L;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$L)$K[$L["name"]]["Auto_increment"]=$L["seq"];return($C!=""?$K[$C]:$K);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$g;$K=array();$ee="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$L){$C=$L["name"];$U=strtolower($L["type"]);$rb=$L["dflt_value"];$K[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$rb,$A)?str_replace("''","'",$A[1]):($rb=="NULL"?null:$rb)),"null"=>!$L["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$L["pk"],);if($L["pk"]){if($ee!="")$K[$ee]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$K[$C]["auto_increment"]=true;$ee=$C;}}$Re=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Re,$md,PREG_SET_ORDER);foreach($md
as$A){$C=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($K[$C])$K[$C]["collation"]=trim($A[3],"'");}return$K;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$K=array();$Re=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$Re,$A)){$K[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$md,PREG_SET_ORDER);foreach($md
as$A){$K[""]["columns"][]=idf_unescape($A[2]).$A[4];$K[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$K){foreach(fields($R)as$C=>$n){if($n["primary"])$K[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$Se=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$h);foreach(get_rows("PRAGMA index_list(".table($R).")",$h)as$L){$C=$L["name"];$v=array("type"=>($L["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$h)as$Ae){$v["columns"][]=$Ae["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Se[$C],$se)){preg_match_all('/("[^"]*+")+( DESC)?/',$se[2],$md);foreach($md[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$K[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$K[""]["columns"]||$v["descs"]!=$K[""]["descs"]||!preg_match("~^sqlite_~",$C))$K[$C]=$v;}return$K;}function
foreign_keys($R){$K=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$L){$p=&$K[$L["id"]];if(!$p)$p=$L;$p["source"][]=$L["from"];$p["target"][]=$L["to"];}return$K;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($C){global$g;$Xb="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Xb)\$~",$C)){$g->error=sprintf('Proszƒô u≈ºyƒá jednego z rozszerze≈Ñ: %s.',str_replace("|",", ",$Xb));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='Plik ju≈º istnieje.';return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$Rb){$g->error=$Rb->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->Min_SQLite(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='Plik ju≈º istnieje.';return
false;}}return
true;}function
rename_database($C,$d){global$g;if(!check_sqlite_name($C))return
false;$g->Min_SQLite(":memory:");$g->error='Plik ju≈º istnieje.';return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$C,$o,$hc,$eb,$Mb,$d,$Da,$Vd){$Mf=($R==""||$hc);foreach($o
as$n){if($n[0]!=""||!$n[1]||$n[2]){$Mf=true;break;}}$c=array();$Qd=array();foreach($o
as$n){if($n[1]){$c[]=($Mf?$n[1]:"ADD ".implode($n[1]));if($n[0]!="")$Qd[$n[0]]=$n[1][0];}}if(!$Mf){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$C&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($R,$C,$c,$Qd,$hc))return
false;if($Da)queries("UPDATE sqlite_sequence SET seq = $Da WHERE name = ".q($C));return
true;}function
recreate_table($R,$C,$o,$Qd,$hc,$w=array()){if($R!=""){if(!$o){foreach(fields($R)as$y=>$n){$o[]=process_field($n,$n);$Qd[$y]=idf_escape($y);}}$fe=false;foreach($o
as$n){if($n[6])$fe=true;}$Cb=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$Cb[$X[1]]=true;unset($w[$y]);}}foreach(indexes($R)as$Wc=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$Qd[$e])continue
2;$f[]=$Qd[$e].($v["descs"][$y]?" DESC":"");}if(!$Cb[$Wc]){if($v["type"]!="PRIMARY"||!$fe)$w[]=array($v["type"],$Wc,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$hc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$Wc=>$p){foreach($p["source"]as$y=>$e){if(!$Qd[$e])continue
2;$p["source"][$y]=idf_unescape($Qd[$e]);}if(!isset($hc[" $Wc"]))$hc[]=" ".format_foreign_key($p);}queries("BEGIN");}foreach($o
as$y=>$n)$o[$y]="  ".implode($n);$o=array_merge($o,array_filter($hc));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$C":$C)." (\n".implode(",\n",$o)."\n)"))return
false;if($R!=""){if($Qd&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$Qd).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Qd)))." FROM ".table($R)))return
false;$_f=array();foreach(triggers($R)as$yf=>$nf){$xf=trigger($yf);$_f[]="CREATE TRIGGER ".idf_escape($yf)." ".implode(" ",$nf)." ON ".table($C)."\n$xf[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$w))return
false;foreach($_f
as$xf){if(!queries($xf))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$C,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$ee){if($ee[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Tf){return
apply_queries("DROP VIEW",$Tf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Tf,$gf){return
false;}function
trigger($C){global$g;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$zf=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$zf["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$A);$Dd=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($Dd?" OF":""),"Of"=>($Dd[0]=='`'||$Dd[0]=='"'?idf_unescape($Dd):$Dd),"Trigger"=>$C,"Statement"=>$A[4],);}function
triggers($R){$K=array();$zf=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$L){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$zf["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$L["sql"],$A);$K[$L["name"]]=array($A[1],$A[2]);}return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){}function
routines(){}function
routine_languages(){}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$I){return$g->query("EXPLAIN $I");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($De){return
true;}function
create_sql($R,$Da){global$g;$K=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$C=>$v){if($C=='')continue;$K.=";\n\n".index_sql($R,$v['type'],$C,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$K;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($j){}function
trigger_sql($R,$Xe){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$g;$K=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$K[$y]=$g->result("PRAGMA $y");return$K;}function
show_status(){$K=array();foreach(get_vals("PRAGMA compile_options")as$Ld){list($y,$X)=explode("=",$Ld,2);$K[$y]=$X;}return$K;}function
convert_field($n){}function
unconvert_field($n,$K){return$K;}function
support($ac){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$ac);}$x="sqlite";$Bf=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$We=array_keys($Bf);$If=array();$Kd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$qc=array("hex","length","lower","round","unixepoch","upper");$sc=array("avg","count","count distinct","group_concat","max","min","sum");$Fb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Ab["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$ce=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($Pb,$m){if(ini_bool("html_errors"))$m=html_entity_decode(strip_tags($m));$m=preg_replace('~^[^:]*: ~','',$m);$this->error=$m;}function
connect($O,$V,$H){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($H,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Rf=pg_version($this->_link);$this->server_info=$Rf["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$K=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($K)$this->_link=$K;return$K;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($I,$Cf=false){$J=@pg_query($this->_link,$I);$this->error="";if(!$J){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($J)){$this->affected_rows=pg_affected_rows($J);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$n=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
pg_fetch_result($J->_result,0,$n);}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;$this->num_rows=pg_num_rows($J);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$K=new
stdClass;if(function_exists('pg_field_table'))$K->orgtable=pg_field_table($this->_result,$e);$K->name=pg_field_name($this->_result,$e);$K->orgname=$K->name;$K->type=pg_field_type($this->_result,$e);$K->charsetnr=($K->type=="bytea"?63:0);return$K;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($O,$V,$H){global$b;$l=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$H);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$ee){global$g;foreach($M
as$P){$Jf=array();$Z=array();foreach($P
as$y=>$X){$Jf[]="$y = $X";if(isset($ee[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Jf)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){if($g->server_info>=9)$g->query("SET application_name = 'Adminer'");return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($I,$Z,$z,$D=0,$Je=" "){return" $I$Z".($z!==null?$Je."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($I,$Z){return" $I$Z";}function
db_collation($l,$bb){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$I="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$I.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$I.="
ORDER BY 1";return
get_key_vals($I);}function
count_tables($k){return
array();}function
table_status($C=""){$K=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' WHEN 'mv' THEN 'materialized view' WHEN 'f' THEN 'foreign table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v','mv','f')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$L)$K[$L["Name"]]=$L;return($C!=""?$K[$C]:$K);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$K=array();$va=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$L){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$L["full_type"],$A);list(,$U,$ed,$L["length"],$qa,$xa)=$A;$L["length"].=$xa;$Sa=$U.$qa;if(isset($va[$Sa])){$L["type"]=$va[$Sa];$L["full_type"]=$L["type"].$ed.$xa;}else{$L["type"]=$U;$L["full_type"]=$L["type"].$ed.$qa.$xa;}$L["null"]=!$L["attnotnull"];$L["auto_increment"]=preg_match('~^nextval\\(~i',$L["default"]);$L["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$L["default"],$A))$L["default"]=($A[1][0]=="'"?idf_unescape($A[1]):$A[1]).$A[2];$K[$L["field"]]=$L;}return$K;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$K=array();$ef=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $ef AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $ef AND ci.oid = i.indexrelid",$h)as$L){$te=$L["relname"];$K[$te]["type"]=($L["indisprimary"]?"PRIMARY":($L["indisunique"]?"UNIQUE":"INDEX"));$K[$te]["columns"]=array();foreach(explode(" ",$L["indkey"])as$Hc)$K[$te]["columns"][]=$f[$Hc];$K[$te]["descs"]=array();foreach(explode(" ",$L["indoption"])as$Ic)$K[$te]["descs"][]=($Ic&1?'1':null);$K[$te]["lengths"]=array();}return$K;}function
foreign_keys($R){global$Fd;$K=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$L){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$L['definition'],$A)){$L['source']=array_map('trim',explode(',',$A[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$ld)){$L['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ld[2]));$L['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ld[4]));}$L['target']=array_map('trim',explode(',',$A[3]));$L['on_delete']=(preg_match("~ON DELETE ($Fd)~",$A[4],$ld)?$ld[1]:'NO ACTION');$L['on_update']=(preg_match("~ON UPDATE ($Fd)~",$A[4],$ld)?$ld[1]:'NO ACTION');$K[$L['conname']]=$L;}}return$K;}function
view($C){global$g;return
array("select"=>$g->result("SELECT pg_get_viewdef(".q($C).")"));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$K=h($g->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$K,$A))$K=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\\1<b>\\2</b>',$A[2]).$A[4];return
nl_br($K);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($C,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($R,$C,$o,$hc,$eb,$Mb,$d,$Da,$Vd){$c=array();$le=array();foreach($o
as$n){$e=idf_escape($n[0]);$X=$n[1];if(!$X)$c[]="DROP $e";else{$Of=$X[5];unset($X[5]);if(isset($X[6])&&$n[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($n[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$le[]="ALTER TABLE ".table($R)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($n[0]!=""||$Of!="")$le[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Of!=""?substr($Of,9):"''");}}$c=array_merge($c,$hc);if($R=="")array_unshift($le,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($le,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$C)$le[]="ALTER TABLE ".table($R)." RENAME TO ".table($C);if($R!=""||$eb!="")$le[]="COMMENT ON TABLE ".table($C)." IS ".q($eb);if($Da!=""){}foreach($le
as$I){if(!queries($I))return
false;}return
true;}function
alter_indexes($R,$c){$lb=array();$Bb=array();$le=array();foreach($c
as$X){if($X[0]!="INDEX")$lb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Bb[]=idf_escape($X[1]);else$le[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($lb)array_unshift($le,"ALTER TABLE ".table($R).implode(",",$lb));if($Bb)array_unshift($le,"DROP INDEX ".implode(", ",$Bb));foreach($le
as$I){if(!queries($I))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Tf){return
drop_tables($Tf);}function
drop_tables($T){foreach($T
as$R){$Ue=table_status($R);if(!queries("DROP ".strtoupper($Ue["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Tf,$gf){foreach(array_merge($T,$Tf)as$R){$Ue=table_status($R);if(!queries("ALTER ".strtoupper($Ue["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($gf)))return
false;}return
true;}function
trigger($C){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$M=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($C));return
reset($M);}function
triggers($R){$K=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$L)$K[$L["trigger_name"]]=array($L["condition_timing"],$L["event_manipulation"]);return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routines(){return
get_rows('SELECT p.proname AS "ROUTINE_NAME", p.proargtypes AS "ROUTINE_TYPE", pg_catalog.format_type(p.prorettype, NULL) AS "DTD_IDENTIFIER"
FROM pg_catalog.pg_namespace n
JOIN pg_catalog.pg_proc p ON p.pronamespace = n.oid
WHERE n.nspname = current_schema()
ORDER BY p.proname');}function
routine_languages(){return
get_vals("SELECT langname FROM pg_catalog.pg_language");}function
last_id(){return
0;}function
explain($g,$I){return$g->query("EXPLAIN $I");}function
found_rows($S,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$se))return$se[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($Ce){global$g,$Bf,$We;$K=$g->query("SET search_path TO ".idf_escape($Ce));foreach(types()as$U){if(!isset($Bf[$U])){$Bf[$U]=0;$We['Typy u≈ºytkownika'][]=$U;}}return$K;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$g;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($g->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($n){}function
unconvert_field($n,$K){return$K;}function
support($ac){global$g;return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.($g->server_info>=9.3?'materializedview|':'').'scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$ac);}$x="pgsql";$Bf=array();$We=array();foreach(array('Numeryczne'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Data i czas'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Tekstowe'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binarne'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Sieƒá'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometria'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$Bf+=$X;$We[$y]=array_keys($X);}$If=array();$Kd=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$qc=array("char_length","lower","round","to_hex","to_timestamp","upper");$sc=array("avg","count","count distinct","max","min","sum");$Fb=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Ab["oracle"]="Oracle";if(isset($_GET["oracle"])){$ce=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Pb,$m){if(ini_bool("html_errors"))$m=html_entity_decode(strip_tags($m));$m=preg_replace('~^[^:]*: ~','',$m);$this->error=$m;}function
connect($O,$V,$H){$this->_link=@oci_new_connect($V,$H,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$m=oci_error();$this->error=$m["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
true;}function
query($I,$Cf=false){$J=oci_parse($this->_link,$I);$this->error="";if(!$J){$m=oci_error($this->_link);$this->errno=$m["code"];$this->error=$m["message"];return
false;}set_error_handler(array($this,'_error'));$K=@oci_execute($J);restore_error_handler();if($K){if(oci_num_fields($J))return
new
Min_Result($J);$this->affected_rows=oci_num_rows($J);}return$K;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$n=1){$J=$this->query($I);if(!is_object($J)||!oci_fetch($J->_result))return
false;return
oci_result($J->_result,$n);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
Min_Result($J){$this->_result=$J;}function
_convert($L){foreach((array)$L
as$y=>$X){if(is_a($X,'OCI-Lob'))$L[$y]=$X->load();}return$L;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$K=new
stdClass;$K->name=oci_field_name($this->_result,$e);$K->orgname=$K->name;$K->type=oci_field_type($this->_result,$e);$K->charsetnr=(preg_match("~raw|blob|bfile~",$K->type)?63:0);return$K;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($O,$V,$H){$this->dsn("oci:dbname=//$O;charset=AL32UTF8",$V,$H);return
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
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($I,$Z,$z,$D=0,$Je=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $I$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $I$Z) WHERE rownum <= ".($z+$D):" $I$Z"));}function
limit1($I,$Z){return" $I$Z";}function
db_collation($l,$bb){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($C=""){$K=array();$Ee=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $Ee":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $Ee":"")."
ORDER BY 1")as$L){if($C!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$L){$U=$L["DATA_TYPE"];$ed="$L[DATA_PRECISION],$L[DATA_SCALE]";if($ed==",")$ed=$L["DATA_LENGTH"];$K[$L["COLUMN_NAME"]]=array("field"=>$L["COLUMN_NAME"],"full_type"=>$U.($ed?"($ed)":""),"type"=>strtolower($U),"length"=>$ed,"default"=>$L["DATA_DEFAULT"],"null"=>($L["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
indexes($R,$h=null){$K=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$L){$Fc=$L["INDEX_NAME"];$K[$Fc]["type"]=($L["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($L["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$K[$Fc]["columns"][]=$L["COLUMN_NAME"];$K[$Fc]["lengths"][]=($L["CHAR_LENGTH"]&&$L["CHAR_LENGTH"]!=$L["COLUMN_LENGTH"]?$L["CHAR_LENGTH"]:null);$K[$Fc]["descs"][]=($L["DESCEND"]?'1':null);}return$K;}function
view($C){$M=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($M);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$I){$g->query("EXPLAIN PLAN FOR $I");return$g->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$C,$o,$hc,$eb,$Mb,$d,$Da,$Vd){$c=$Bb=array();foreach($o
as$n){$X=$n[1];if($X&&$n[0]!=""&&idf_escape($n[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($n[0])." TO $X[0]");if($X)$c[]=($R!=""?($n[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Bb[]=idf_escape($n[0]);}if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Bb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Bb).")"))&&($R==$C||queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)));}function
foreign_keys($R){$K=array();$I="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($I)as$L)$K[$L['NAME']]=array("db"=>$L['DEST_DB'],"table"=>$L['DEST_TABLE'],"source"=>array($L['SRC_COLUMN']),"target"=>array($L['DEST_COLUMN']),"on_delete"=>$L['ON_DELETE'],"on_update"=>null,);return$K;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
apply_queries("DROP VIEW",$Tf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($De){global$g;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($De));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$M=get_rows('SELECT * FROM v$instance');return
reset($M);}function
convert_field($n){}function
unconvert_field($n,$K){return$K;}function
support($ac){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$ac);}$x="oracle";$Bf=array();$We=array();foreach(array('Numeryczne'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Data i czas'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Tekstowe'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binarne'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$Bf+=$X;$We[$y]=array_keys($X);}$If=array();$Kd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$qc=array("length","lower","round","upper");$sc=array("avg","count","count distinct","max","min","sum");$Fb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Ab["mssql"]="MS SQL";if(isset($_GET["mssql"])){$ce=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$m){$this->errno=$m["code"];$this->error.="$m[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$H){$this->_link=@sqlsrv_connect($O,array("UID"=>$V,"PWD"=>$H,"CharacterSet"=>"UTF-8"));if($this->_link){$Jc=sqlsrv_server_info($this->_link);$this->server_info=$Jc['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($I,$Cf=false){$J=sqlsrv_query($this->_link,$I);$this->error="";if(!$J){$this->_get_error();return
false;}return$this->store_result($J);}function
multi_query($I){$this->_result=sqlsrv_query($this->_link,$I);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($J=null){if(!$J)$J=$this->_result;if(!$J)return
false;if(sqlsrv_field_metadata($J))return
new
Min_Result($J);$this->affected_rows=sqlsrv_rows_affected($J);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($I,$n=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->fetch_row();return$L[$n];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;}function
_convert($L){foreach((array)$L
as$y=>$X){if(is_a($X,'DateTime'))$L[$y]=$X->format("Y-m-d H:i:s");}return$L;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$n=$this->_fields[$this->_offset++];$K=new
stdClass;$K->name=$n["Name"];$K->orgname=$n["Name"];$K->type=($n["Type"]==1?254:0);return$K;}function
seek($D){for($s=0;$s<$D;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$H){$this->_link=@mssql_connect($O,$V,$H);if($this->_link){$J=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$L=$J->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$L[0]] $L[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($I,$Cf=false){$J=mssql_query($I,$this->_link);$this->error="";if(!$J){$this->error=mssql_get_last_message();return
false;}if($J===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($I,$n=0){$J=$this->query($I);if(!is_object($J))return
false;return
mssql_result($J->_result,0,$n);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;$this->num_rows=mssql_num_rows($J);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$K=mssql_fetch_field($this->_result);$K->orgtable=$K->table;$K->orgname=$K->name;return$K;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$ee){foreach($M
as$P){$Jf=array();$Z=array();foreach($P
as$y=>$X){$Jf[]="$y = $X";if(isset($ee[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Jf)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($I,$Z,$z,$D=0,$Je=" "){return($z!==null?" TOP (".($z+$D).")":"")." $I$Z";}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($l,$bb){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$K=array();foreach($k
as$l){$g->select_db($l);$K[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$K;}function
table_status($C=""){$K=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$L){if($C!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$L){$U=$L["type"];$ed=(preg_match("~char|binary~",$U)?$L["max_length"]:($U=="decimal"?"$L[precision],$L[scale]":""));$K[$L["name"]]=array("field"=>$L["name"],"full_type"=>$U.($ed?"($ed)":""),"type"=>$U,"length"=>$ed,"default"=>$L["default"],"null"=>$L["is_nullable"],"auto_increment"=>$L["is_identity"],"collation"=>$L["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$L["is_identity"],);}return$K;}function
indexes($R,$h=null){$K=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$h)as$L){$C=$L["name"];$K[$C]["type"]=($L["is_primary_key"]?"PRIMARY":($L["is_unique"]?"UNIQUE":"INDEX"));$K[$C]["lengths"]=array();$K[$C]["columns"][$L["key_ordinal"]]=$L["column_name"];$K[$C]["descs"][$L["key_ordinal"]]=($L["is_descending_key"]?'1':null);}return$K;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$K=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$K[preg_replace('~_.*~','',$d)][]=$d;return$K;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($C,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$C,$o,$hc,$eb,$Mb,$d,$Da,$Vd){$c=array();foreach($o
as$n){$e=idf_escape($n[0]);$X=$n[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($n[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($hc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$C)queries("EXEC sp_rename ".q(table($R)).", ".q($C));if($hc)$c[""]=$hc;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $y".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$v=array();$Bb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Bb[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Bb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Bb)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$I){$g->query("SET SHOWPLAN_ALL ON");$K=$g->query($I);$g->query("SET SHOWPLAN_ALL OFF");return$K;}function
found_rows($S,$Z){}function
foreign_keys($R){$K=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$L){$p=&$K[$L["FK_NAME"]];$p["table"]=$L["PKTABLE_NAME"];$p["source"][]=$L["FKCOLUMN_NAME"];$p["target"][]=$L["PKCOLUMN_NAME"];}return$K;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$gf){return
apply_queries("ALTER SCHEMA ".idf_escape($gf)." TRANSFER",array_merge($T,$Tf));}function
trigger($C){if($C=="")return
array();$M=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$K=reset($M);if($K)$K["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$K["text"]);return$K;}function
triggers($R){$K=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$L)$K[$L["name"]]=array($L["Timing"],$L["Event"]);return$K;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Ce){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($n){}function
unconvert_field($n,$K){return$K;}function
support($ac){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$ac);}$x="mssql";$Bf=array();$We=array();foreach(array('Numeryczne'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Data i czas'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Tekstowe'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binarne'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$Bf+=$X;$We[$y]=array_keys($X);}$If=array();$Kd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$qc=array("len","lower","round","upper");$sc=array("avg","count","count distinct","max","min","sum");$Fb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Ab['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$ce=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$H){$this->_link=ibase_connect($O,$V,$H);if($this->_link){$Lf=explode(':',$O);$this->service_link=ibase_service_attach($Lf[0],$V,$H);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return($j=="domain");}function
query($I,$Cf=false){$J=ibase_query($I,$this->_link);if(!$J){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($J===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$n=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;$L=$J->fetch_row();return$L[$n];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($J){$this->_result=$J;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$n=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$n['name'],'orgname'=>$n['name'],'type'=>$n['type'],'charsetnr'=>$n['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases($gc){return
array("domain");}function
limit($I,$Z,$z,$D=0,$Je=" "){$K='';$K.=($z!==null?$Je."FIRST $z".($D?" SKIP $D":""):"");$K.=" $I$Z";return$K;}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($l,$bb){}function
engines(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
tables_list(){global$g;$I='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$J=ibase_query($g->_link,$I);$K=array();while($L=ibase_fetch_assoc($J))$K[$L['RDB$RELATION_NAME']]='table';ksort($K);return$K;}function
count_tables($k){return
array();}function
table_status($C="",$Zb=false){global$g;$K=array();$ob=tables_list();foreach($ob
as$v=>$X){$v=trim($v);$K[$v]=array('Name'=>$v,'Engine'=>'standard',);if($C==$v)return$K[$v];}return$K;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$g;$K=array();$I='SELECT r.RDB$FIELD_NAME AS field_name,
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
ORDER BY r.RDB$FIELD_POSITION';$J=ibase_query($g->_link,$I);while($L=ibase_fetch_assoc($J))$K[trim($L['FIELD_NAME'])]=array("field"=>trim($L["FIELD_NAME"]),"full_type"=>trim($L["FIELD_TYPE"]),"type"=>trim($L["FIELD_SUB_TYPE"]),"default"=>trim($L['FIELD_DEFAULT_VALUE']),"null"=>(trim($L["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($L["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($L["FIELD_DESCRIPTION"]),);return$K;}function
indexes($R,$h=null){$K=array();return$K;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ce){return
true;}function
support($ac){return
preg_match("~^(columns|sql|status|table)$~",$ac);}$x="firebird";$Kd=array("=");$qc=array();$sc=array();$Fb=array();}$Ab["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$ce=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($I,$Cf=false){$G=array('SelectExpression'=>$I,'ConsistentRead'=>'true');if($this->next)$G['NextToken']=$this->next;$J=sdb_request_all('Select','Item',$G,$this->timeout);if($J===false)return$J;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$I)){$af=0;foreach($J
as$Sc)$af+=$Sc->Attribute->Value;$J=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$af,))));}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
Min_Result($J){foreach($J
as$Sc){$L=array();if($Sc->Name!='')$L['itemName()']=(string)$Sc->Name;foreach($Sc->Attribute
as$Aa){$C=$this->_processValue($Aa->Name);$Y=$this->_processValue($Aa->Value);if(isset($L[$C])){$L[$C]=(array)$L[$C];$L[$C][]=$Y;}else$L[$C]=$Y;}$this->_rows[]=$L;foreach($L
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Hb){return(is_object($Hb)&&$Hb['encoding']=='base64'?base64_decode($Hb):(string)$Hb);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$y=>$X)$K[$y]=$L[$y];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Xc=array_keys($this->_rows[0]);return(object)array('name'=>$Xc[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$ee="itemName()";function
_chunkRequest($Dc,$pa,$G,$Ub=array()){global$g;foreach(array_chunk($Dc,25)as$Va){$Ud=$G;foreach($Va
as$s=>$t){$Ud["Item.$s.ItemName"]=$t;foreach($Ub
as$y=>$X)$Ud["Item.$s.$y"]=$X;}if(!sdb_request($pa,$Ud))return
false;}$g->affected_rows=count($Dc);return
true;}function
_extractIds($R,$me,$z){$K=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$me,$md))$K=array_map('idf_unescape',$md[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$me.($z?" LIMIT 1":"")))as$Sc)$K[]=$Sc->Name;}return$K;}function
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$ge=false){global$g;$g->next=$_GET["next"];$K=parent::select($R,$N,$Z,$r,$E,$z,$F,$ge);$g->next=0;return$K;}function
delete($R,$me,$z=0){return$this->_chunkRequest($this->_extractIds($R,$me,$z),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$me,$z=0,$Je="\n"){$sb=array();$Nc=array();$s=0;$Dc=$this->_extractIds($R,$me,$z);$t=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Dc))$sb["Attribute.".count($sb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$Tc=>$W){$Nc["Attribute.$s.Name"]=$y;$Nc["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Tc)$Nc["Attribute.$s.Replace"]="true";$s++;}}}$G=array('DomainName'=>$R);return(!$Nc||$this->_chunkRequest(($t!=""?array($t):$Dc),'BatchPutAttributes',$G,$Nc))&&(!$sb||$this->_chunkRequest($Dc,'BatchDeleteAttributes',$G,$sb));}function
insert($R,$P){$G=array("DomainName"=>$R);$s=0;foreach($P
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$G["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$G["Attribute.$s.Name"]=$C;$G["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$G);}function
insertUpdate($R,$M,$ee){foreach($M
as$P){if(!$this->update($R,$P,"WHERE `itemName()` = ".q($P["`itemName()`"])))return
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
support($ac){return
preg_match('~sql~',$ac);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$bb){}function
tables_list(){global$g;$K=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$K[(string)$R]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$K;}function
table_status($C="",$Zb=false){$K=array();foreach(($C!=""?array($C=>true):tables_list())as$R=>$U){$L=array("Name"=>$R,"Auto_increment"=>"");if(!$Zb){$ud=sdb_request('DomainMetadata',array('DomainName'=>$R));if($ud){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$L[$y]=(string)$ud->$X;}}if($C!="")return$L;$K[$R]=$L;}return$K;}function
explain($g,$I){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($I,$Z,$z,$D=0,$Je=" "){return" $I$Z".($z!==null?$Je."LIMIT $z":"");}function
unconvert_field($n,$K){return$K;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$o,$hc,$eb,$Mb,$d,$Da,$Vd){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($ua,$ob,$y,$qe=false){$Ma=64;if(strlen($y)>$Ma)$y=pack("H*",$ua($y));$y=str_pad($y,$Ma,"\0");$Uc=$y^str_repeat("\x36",$Ma);$Vc=$y^str_repeat("\x5C",$Ma);$K=$ua($Vc.pack("H*",$ua($Uc.$ob)));if($qe)$K=pack("H*",$K);return$K;}function
sdb_request($pa,$G=array()){global$b,$g;list($Ac,$G['AWSAccessKeyId'],$Fe)=$b->credentials();$G['Action']=$pa;$G['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$G['Version']='2009-04-15';$G['SignatureVersion']=2;$G['SignatureMethod']='HmacSHA1';ksort($G);$I='';foreach($G
as$y=>$X)$I.='&'.rawurlencode($y).'='.rawurlencode($X);$I=str_replace('%7E','~',substr($I,1));$I.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Ac)."\n/\n$I",$Fe,true)));@ini_set('track_errors',1);$bc=@file_get_contents((preg_match('~^https?://~',$Ac)?$Ac:"http://$Ac"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$I,'ignore_errors'=>1,))));if(!$bc){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$Zf=simplexml_load_string($bc);if(!$Zf){$m=libxml_get_last_error();$g->error=$m->message;return
false;}if($Zf->Errors){$m=$Zf->Errors->Error;$g->error="$m->Message ($m->Code)";return
false;}$g->error='';$ff=$pa."Result";return($Zf->$ff?$Zf->$ff:true);}function
sdb_request_all($pa,$ff,$G=array(),$mf=0){$K=array();$Te=($mf?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$G['SelectExpression'],$A)?$A[1]:0);do{$Zf=sdb_request($pa,$G);if(!$Zf)break;foreach($Zf->$ff
as$Hb)$K[]=$Hb;if($z&&count($K)>=$z){$_GET["next"]=$Zf->NextToken;break;}if($mf&&microtime(true)-$Te>$mf)return
false;$G['NextToken']=$Zf->NextToken;if($z)$G['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($K),$G['SelectExpression']);}while($Zf->NextToken);return$K;}$x="simpledb";$Kd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$qc=array();$sc=array("count");$Fb=array(array("json"));}$Ab["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$ce=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($O,$V,$H){global$b;$l=$b->database();$Md=array();if($V!=""){$Md["username"]=$V;$Md["password"]=$H;}if($l!="")$Md["db"]=$l;try{$this->_link=@new
MongoClient("mongodb://$O",$Md);return
true;}catch(Exception$Rb){$this->error=$Rb->getMessage();return
false;}}function
query($I){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Rb){$this->error=$Rb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
Min_Result($J){foreach($J
as$Sc){$L=array();foreach($Sc
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$L[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$L;foreach($L
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$y=>$X)$K[$y]=$L[$y];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Xc=array_keys($this->_rows[0]);$C=$Xc[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}}class
Min_Driver
extends
Min_SQL{public$ee="_id";function
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$ge=false){$N=($N==array("*")?array():array_fill_keys($N,true));$Pe=array();foreach($E
as$X){$X=preg_replace('~ DESC$~','',$X,1,$kb);$Pe[$X]=($kb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$N)->sort($Pe)->limit(+$z)->skip($F*$z));}function
insert($R,$P){try{$K=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$K['code'];$this->_conn->error=$K['err'];$this->_conn->last_id=$P['_id'];return!$K['err'];}catch(Exception$Rb){$this->_conn->error=$Rb->getMessage();return
false;}}}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
error(){global$g;return
h($g->error);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases($gc){global$g;$K=array();$pb=$g->_link->listDBs();foreach($pb['databases']as$l)$K[]=$l['name'];return$K;}function
collations(){return
array();}function
db_collation($l,$bb){}function
count_tables($k){global$g;$K=array();foreach($k
as$l)$K[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$K;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
table_status($C="",$Zb=false){$K=array();foreach(tables_list()as$R=>$U){$K[$R]=array("Name"=>$R);if($C==$R)return$K[$R];}return$K;}function
information_schema(){}function
is_view($S){}function
drop_databases($k){global$g;foreach($k
as$l){$xe=$g->_link->selectDB($l)->drop();if(!$xe['ok'])return
false;}return
true;}function
indexes($R,$h=null){global$g;$K=array();foreach($g->_db->selectCollection($R)->getIndexInfo()as$v){$vb=array();foreach($v["key"]as$e=>$U)$vb[]=($U==-1?'1':null);$K[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$vb,);}return$K;}function
fields($R){return
fields_from_edit();}function
convert_field($n){}function
unconvert_field($n,$K){return$K;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
found_rows($S,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}function
alter_table($R,$C,$o,$hc,$eb,$Mb,$d,$Da,$Vd){global$g;if($R==""){$g->_db->createCollection($C);return
true;}}function
drop_tables($T){global$g;foreach($T
as$R){$xe=$g->_db->selectCollection($R)->drop();if(!$xe['ok'])return
false;}return
true;}function
truncate_tables($T){global$g;foreach($T
as$R){$xe=$g->_db->selectCollection($R)->remove();if(!$xe['ok'])return
false;}return
true;}function
alter_indexes($R,$c){global$g;foreach($c
as$X){list($U,$C,$P)=$X;if($P=="DROP")$K=$g->_db->command(array("deleteIndexes"=>$R,"index"=>$C));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$kb);$f[$e]=($kb?-1:1);}$K=$g->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$C,));}if($K['errmsg']){$g->error=$K['errmsg'];return
false;}}return
true;}function
last_id(){global$g;return$g->last_id;}function
table($u){return$u;}function
idf_escape($u){return$u;}function
support($ac){return
preg_match("~database|indexes~",$ac);}$x="mongo";$Kd=array("=");$qc=array();$sc=array();$Fb=array(array("json"));}$Ab["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$ce=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Wd,$ib=array(),$vd='GET'){@ini_set('track_errors',1);$bc=@file_get_contents($this->_url.'/'.ltrim($Wd,'/'),false,stream_context_create(array('http'=>array('method'=>$vd,'content'=>json_encode($ib),'ignore_errors'=>1,))));if(!$bc){$this->error=$php_errormsg;return$bc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$bc;return
false;}$K=json_decode($bc,true);if($K===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$hb=get_defined_constants(true);foreach($hb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$K;}function
query($Wd,$ib=array(),$vd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Wd,'/'),$ib,$vd);}function
connect($O,$V,$H){$this->_url="http://$V:$H@$O/";$K=$this->query('');if($K)$this->server_info=$K['version']['number'];return(bool)$K;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
Min_Result($M){$this->num_rows=count($this->_rows);$this->_rows=$M;reset($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);next($this->_rows);return$K;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$ge=false){global$b;$ob=array();$I="$R/_search";if($N!=array("*"))$ob["fields"]=$N;if($E){$Pe=array();foreach($E
as$ab){$ab=preg_replace('~ DESC$~','',$ab,1,$kb);$Pe[]=($kb?array($ab=>"desc"):$ab);}$ob["sort"]=$Pe;}if($z){$ob["size"]=+$z;if($F)$ob["from"]=($F*$z);}foreach($Z
as$X){list($ab,$Id,$X)=explode(" ",$X,3);if($ab=="_id")$ob["query"]["ids"]["values"][]=$X;elseif($ab.$X!=""){$hf=array("term"=>array(($ab!=""?$ab:"_all")=>$X));if($Id=="=")$ob["query"]["filtered"]["filter"]["and"][]=$hf;else$ob["query"]["filtered"]["query"]["bool"]["must"][]=$hf;}}if($ob["query"]&&!$ob["query"]["filtered"]["query"]&&!$ob["query"]["ids"])$ob["query"]["filtered"]["query"]=array("match_all"=>array());$Te=microtime(true);$Ee=$this->_conn->query($I,$ob);if($ge)echo$b->selectQuery("$I: ".print_r($ob,true),format_time($Te));if(!$Ee)return
false;$K=array();foreach($Ee['hits']['hits']as$_c){$L=array();if($N==array("*"))$L["_id"]=$_c["_id"];$o=$_c['_source'];if($N!=array("*")){$o=array();foreach($N
as$y)$o[$y]=$_c['fields'][$y];}foreach($o
as$y=>$X){if($ob["fields"])$X=$X[0];$L[$y]=(is_array($X)?json_encode($X):$X);}$K[]=$L;}return
new
Min_Result($K);}}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
support($ac){return
preg_match("~database|table|columns~",$ac);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){global$g;$K=$g->rootQuery('_aliases');if($K){$K=array_keys($K);sort($K,SORT_STRING);}return$K;}function
collations(){return
array();}function
db_collation($l,$bb){}function
engines(){return
array();}function
count_tables($k){global$g;$K=$g->query('_mapping');if($K)$K=array_map('count',$K);return$K;}function
tables_list(){global$g;$K=$g->query('_mapping');if($K)$K=array_fill_keys(array_keys($K[$g->_db]["mappings"]),'table');return$K;}function
table_status($C="",$Zb=false){global$g;$Ee=$g->query("_search?search_type=count",array("facets"=>array("count_by_type"=>array("terms"=>array("field"=>"_type",)))),"POST");$K=array();if($Ee){foreach($Ee["facets"]["count_by_type"]["terms"]as$R)$K[$R["term"]]=array("Name"=>$R["term"],"Engine"=>"table","Rows"=>$R["count"],);if($C!=""&&$C==$R["term"])return$K[$C];}return$K;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$g;$J=$g->query("$R/_mapping");$K=array();if($J){$kd=$J[$R]['properties'];if(!$kd)$kd=$J[$g->_db]['mappings'][$R]['properties'];if($kd){foreach($kd
as$C=>$n){$K[$C]=array("field"=>$C,"full_type"=>$n["type"],"type"=>$n["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($n["properties"]){unset($K[$C]["privileges"]["insert"]);unset($K[$C]["privileges"]["update"]);}}}}return$K;}function
foreign_keys($R){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($n){}function
unconvert_field($n,$K){return$K;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),array(),'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
drop_tables($T){global$g;$K=true;foreach($T
as$R)$K=$K&&$g->query(urlencode($R),array(),'DELETE');return$K;}$x="elastic";$Kd=array("=","query");$qc=array();$sc=array();$Fb=array(array("json"));}$Ab=array("server"=>"MySQL")+$Ab;if(!defined("DRIVER")){$ce=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($O,$V,$H){mysqli_report(MYSQLI_REPORT_OFF);list($Ac,$ae)=explode(":",$O,2);$K=@$this->real_connect(($O!=""?$Ac:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$H!=""?$H:ini_get("mysqli.default_pw")),null,(is_numeric($ae)?$ae:ini_get("mysqli.default_port")),(!is_numeric($ae)?$ae:null));return$K;}function
result($I,$n=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch_array();return$L[$n];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$H){$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$H"!=""?$H:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Qa){if(function_exists('mysql_set_charset'))return
mysql_set_charset($Qa,$this->_link);return$this->query("SET NAMES $Qa");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($I,$Cf=false){$J=@($Cf?mysql_unbuffered_query($I,$this->_link):mysql_query($I,$this->_link));$this->error="";if(!$J){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($J===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$n=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
mysql_result($J->_result,0,$n);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($J){$this->_result=$J;$this->num_rows=mysql_num_rows($J);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$K=mysql_fetch_field($this->_result,$this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=($K->blob?63:0);return$K;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($O,$V,$H){$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$O)),$V,$H);return
true;}function
set_charset($Qa){$this->query("SET NAMES $Qa");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($I,$Cf=false){$this->setAttribute(1000,!$Cf);return
parent::query($I,$Cf);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$M,$ee){$f=array_keys(reset($M));$de="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Pf=array();foreach($f
as$y)$Pf[$y]="$y = VALUES($y)";$Ze="\nON DUPLICATE KEY UPDATE ".implode(", ",$Pf);$Pf=array();$ed=0;foreach($M
as$P){$Y="(".implode(", ",$P).")";if($Pf&&(strlen($de)+$ed+strlen($Y)+strlen($Ze)>1e6)){if(!queries($de.implode(",\n",$Pf).$Ze))return
false;$Pf=array();$ed=0;}$Pf[]=$Y;$ed+=strlen($Y)+2;}return
queries($de.implode(",\n",$Pf).$Ze);}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");return$g;}$K=$g->error;if(function_exists('iconv')&&!is_utf8($K)&&strlen($Be=iconv("windows-1250","utf-8",$K))>strlen($K))$K=$Be;return$K;}function
get_databases($gc){global$g;$K=get_session("dbs");if($K===null){$I=($g->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$K=($gc?slow_query($I):get_vals($I));restart_session();set_session("dbs",$K);stop_session();}return$K;}function
limit($I,$Z,$z,$D=0,$Je=" "){return" $I$Z".($z!==null?$Je."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($l,$bb){global$g;$K=null;$lb=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$lb,$A))$K=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$lb,$A))$K=$bb[$A[1]][-1];return$K;}function
engines(){$K=array();foreach(get_rows("SHOW ENGINES")as$L){if(preg_match("~YES|DEFAULT~",$L["Support"]))$K[]=$L["Engine"];}return$K;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){global$g;return
get_key_vals($g->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$K=array();foreach($k
as$l)$K[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$K;}function
table_status($C="",$Zb=false){global$g;$K=array();foreach(get_rows($Zb&&$g->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$L){if($L["Engine"]=="InnoDB")$L["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$L["Comment"]);if(!isset($L["Engine"]))$L["Comment"]="";if($C!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){global$g;return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&version_compare($g->server_info,'5.6')>=0);}function
fields($R){$K=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$L){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$L["Type"],$A);$K[$L["Field"]]=array("field"=>$L["Field"],"full_type"=>$L["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($L["Default"]!=""||preg_match("~char|set~",$A[1])?$L["Default"]:null),"null"=>($L["Null"]=="YES"),"auto_increment"=>($L["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$L["Extra"],$A)?$A[1]:""),"collation"=>$L["Collation"],"privileges"=>array_flip(preg_split('~, *~',$L["Privileges"])),"comment"=>$L["Comment"],"primary"=>($L["Key"]=="PRI"),);}return$K;}function
indexes($R,$h=null){$K=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$h)as$L){$K[$L["Key_name"]]["type"]=($L["Key_name"]=="PRIMARY"?"PRIMARY":($L["Index_type"]=="FULLTEXT"?"FULLTEXT":($L["Non_unique"]?"INDEX":"UNIQUE")));$K[$L["Key_name"]]["columns"][]=$L["Column_name"];$K[$L["Key_name"]]["lengths"][]=$L["Sub_part"];$K[$L["Key_name"]]["descs"][]=null;}return$K;}function
foreign_keys($R){global$g,$Fd;static$Xd='`(?:[^`]|``)+`';$K=array();$mb=$g->result("SHOW CREATE TABLE ".table($R),1);if($mb){preg_match_all("~CONSTRAINT ($Xd) FOREIGN KEY ?\\(((?:$Xd,? ?)+)\\) REFERENCES ($Xd)(?:\\.($Xd))? \\(((?:$Xd,? ?)+)\\)(?: ON DELETE ($Fd))?(?: ON UPDATE ($Fd))?~",$mb,$md,PREG_SET_ORDER);foreach($md
as$A){preg_match_all("~$Xd~",$A[2],$Qe);preg_match_all("~$Xd~",$A[5],$gf);$K[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Qe[0]),"target"=>array_map('idf_unescape',$gf[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$K;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$K=array();foreach(get_rows("SHOW COLLATION")as$L){if($L["Default"])$K[$L["Charset"]][-1]=$L["Collation"];else$K[$L["Charset"]][]=$L["Collation"];}ksort($K);foreach($K
as$y=>$X)asort($K[$y]);return$K;}function
information_schema($l){global$g;return($g->server_info>=5&&$l=="information_schema")||($g->server_info>=5.5&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
error_line(){global$g;if(preg_match('~ at line ([0-9]+)$~',$g->error,$se))return$se[1]-1;}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$K=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$K;}function
rename_database($C,$d){$K=false;if(create_database($C,$d)){$ue=array();foreach(tables_list()as$R=>$U)$ue[]=table($R)." TO ".idf_escape($C).".".table($R);$K=(!$ue||queries("RENAME TABLE ".implode(", ",$ue)));if($K)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$K;}function
auto_increment(){$Ea=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Ea="";break;}if($v["type"]=="PRIMARY")$Ea=" UNIQUE";}}return" AUTO_INCREMENT$Ea";}function
alter_table($R,$C,$o,$hc,$eb,$Mb,$d,$Da,$Vd){$c=array();foreach($o
as$n)$c[]=($n[1]?($R!=""?($n[0]!=""?"CHANGE ".idf_escape($n[0]):"ADD"):" ")." ".implode($n[1]).($R!=""?$n[2]:""):"DROP ".idf_escape($n[0]));$c=array_merge($c,$hc);$Ue=($eb!==null?" COMMENT=".q($eb):"").($Mb?" ENGINE=".q($Mb):"").($d?" COLLATE ".q($d):"").($Da!=""?" AUTO_INCREMENT=$Da":"");if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$Ue$Vd");if($R!=$C)$c[]="RENAME TO ".table($C);if($Ue)$c[]=ltrim($Ue);return($c||$Vd?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Vd):true);}function
alter_indexes($R,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$gf){$ue=array();foreach(array_merge($T,$Tf)as$R)$ue[]=table($R)." TO ".idf_escape($gf).".".table($R);return
queries("RENAME TABLE ".implode(", ",$ue));}function
copy_tables($T,$Tf,$gf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$C=($gf==DB?table("copy_$R"):idf_escape($gf).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($R))||!queries("INSERT INTO $C SELECT * FROM ".table($R)))return
false;}foreach($Tf
as$R){$C=($gf==DB?table("copy_$R"):idf_escape($gf).".".table($R));$Sf=view($R);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Sf[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$M=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($M);}function
triggers($R){$K=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$L)$K[$L["Trigger"]]=array($L["Timing"],$L["Event"]);return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$g,$Nb,$Lc,$Bf;$va=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Af="((".implode("|",array_merge(array_keys($Bf),$va)).")\\b(?:\\s*\\(((?:[^'\")]|$Nb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Xd="\\s*(".($U=="FUNCTION"?"":$Lc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Af";$lb=$g->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$Xd\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Af\\s+":"")."(.*)~is",$lb,$A);$o=array();preg_match_all("~$Xd\\s*,?~is",$A[1],$md,PREG_SET_ORDER);foreach($md
as$Td){$C=str_replace("``","`",$Td[2]).$Td[3];$o[]=array("field"=>$C,"type"=>strtolower($Td[5]),"length"=>preg_replace_callback("~$Nb~s",'normalize_enum',$Td[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Td[8] $Td[7]"))),"null"=>1,"full_type"=>$Td[4],"inout"=>strtoupper($Td[1]),"collation"=>strtolower($Td[9]),);}if($U!="FUNCTION")return
array("fields"=>$o,"definition"=>$A[11]);return
array("fields"=>$o,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$I){return$g->query("EXPLAIN ".($g->server_info>=5.1?"PARTITIONS ":"").$I);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ce){return
true;}function
create_sql($R,$Da){global$g;$K=$g->result("SHOW CREATE TABLE ".table($R),1);if(!$Da)$K=preg_replace('~ AUTO_INCREMENT=\\d+~','',$K);return$K;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($R,$Xe){$K="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$L)$K.="\n".($Xe=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($L["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($L["Trigger"])." $L[Timing] $L[Event] ON ".table($L["Table"])." FOR EACH ROW\n$L[Statement];;\n";return$K;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($n){if(preg_match("~binary~",$n["type"]))return"HEX(".idf_escape($n["field"]).")";if($n["type"]=="bit")return"BIN(".idf_escape($n["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$n["type"]))return"AsWKT(".idf_escape($n["field"]).")";}function
unconvert_field($n,$K){if(preg_match("~binary~",$n["type"]))$K="UNHEX($K)";if($n["type"]=="bit")$K="CONV($K, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$n["type"]))$K="GeomFromText($K)";return$K;}function
support($ac){global$g;return!preg_match("~scheme|sequence|type|view_trigger".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|routine|trigger|view":""):"")."~",$ac);}$x="sql";$Bf=array();$We=array();foreach(array('Numeryczne'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Data i czas'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Tekstowe'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Listy'=>array("enum"=>65535,"set"=>64),'Binarne'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometria'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$Bf+=$X;$We[$y]=array_keys($X);}$If=array("unsigned","zerofill","unsigned zerofill");$Kd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$qc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$sc=array("avg","count","count distinct","group_concat","max","min","sum");$Fb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.2.0";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='http://www.adminer.org/editor/' target='_blank' id='h1'>".'Edytor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($lb=false){return
password_file($lb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){global$g;if($g){$k=$this->databases(false);return(!$k?$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$k[(information_schema($k[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($gc=true){return
get_databases($gc);}function
queryTimeout(){return
5;}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){echo'<table cellspacing="0">
<tr><th>U≈ºytkownik<td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>Has≈Ço<td><input type="password" name="auth[password]">
</table>
<script type="text/javascript">
focus(document.getElementById(\'username\'));
</script>
',"<p><input type='submit' value='".'Zaloguj siƒô'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Zapamiƒôtaj sesjƒô')."\n";}function
login($id,$H){global$g;$g->query("SET time_zone = ".q(substr_replace(@date("O"),":",-2,0)));return
true;}function
tableName($cf){return
h($cf["Comment"]!=""?$cf["Comment"]:$cf["Name"]);}function
fieldName($n,$E=0){return
h($n["comment"]!=""?$n["comment"]:$n["field"]);}function
selectLinks($cf,$P=""){$a=$cf["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.'Nowy rekord'."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$bf){$K=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$L)$K[$L["TABLE_NAME"]]["keys"][$L["CONSTRAINT_NAME"]][$L["COLUMN_NAME"]]=$L["REFERENCED_COLUMN_NAME"];foreach($K
as$y=>$X){$C=$this->tableName(table_status($y,true));if($C!=""){$Ee=preg_quote($bf);$Je="(:|\\s*-)?\\s+";$K[$y]["name"]=(preg_match("(^$Ee$Je(.+)|^(.+?)$Je$Ee\$)iu",$C,$A)?$A[2].$A[3]:$C);}else
unset($K[$y]);}return$K;}function
backwardKeysPrint($Ha,$L){foreach($Ha
as$R=>$Ga){foreach($Ga["keys"]as$cb){$_=ME.'select='.urlencode($R);$s=0;foreach($cb
as$e=>$X)$_.=where_link($s++,$e,$L[$X]);echo"<a href='".h($_)."'>".h($Ga["name"])."</a>";$_=ME.'edit='.urlencode($R);foreach($cb
as$e=>$X)$_.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($L[$X]);echo"<a href='".h($_)."' title='".'Nowy rekord'."'>+</a> ";}}}function
selectQuery($I,$lf){return"<!--\n".str_replace("--","--><!-- ",$I)."\n($lf)\n-->\n";}function
rowDescription($R){foreach(fields($R)as$n){if(preg_match("~varchar|character varying~",$n["type"]))return
idf_escape($n["field"]);}return"";}function
rowDescriptions($M,$jc){$K=$M;foreach($M[0]as$y=>$X){if(list($R,$t,$C)=$this->_foreignColumn($jc,$y)){$Dc=array();foreach($M
as$L)$Dc[$L[$y]]=q($L[$y]);$ub=$this->_values[$R];if(!$ub)$ub=get_key_vals("SELECT $t, $C FROM ".table($R)." WHERE $t IN (".implode(", ",$Dc).")");foreach($M
as$B=>$L){if(isset($L[$y]))$K[$B][$y]=(string)$ub[$L[$y]];}}}return$K;}function
selectLink($X,$n){}function
selectVal($X,$_,$n,$Pd){$K=($X===null?"&nbsp;":$X);$_=h($_);if(preg_match('~blob|bytea~',$n["type"])&&!is_utf8($X)){$K=lang(array('%d bajt','%d bajty','%d bajt√≥w'),strlen($Pd));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$Pd))$K="<img src='$_' alt='$K'>";}if(like_bool($n)&&$K!="&nbsp;")$K=($X?'tak':'nie');if($_)$K="<a href='$_'".(is_url($_)?" rel='noreferrer'":"").">$K</a>";if(!$_&&!like_bool($n)&&preg_match('~int|float|double|decimal~',$n["type"]))$K="<div class='number'>$K</div>";elseif(preg_match('~date~',$n["type"]))$K="<div class='datetime'>$K</div>";return$K;}function
editVal($X,$n){if(preg_match('~date|timestamp~',$n["type"])&&$X!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~','$6.$4.$1',$X);return$X;}function
selectColumnsPrint($N,$f){}function
selectSearchPrint($Z,$f,$w){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Szukaj'."</legend><div>\n";$Xc=array();foreach($Z
as$y=>$X)$Xc[$X["col"]]=$y;$s=0;$o=fields($_GET["select"]);foreach($f
as$C=>$tb){$n=$o[$C];if(preg_match("~enum~",$n["type"])||like_bool($n)){$y=$Xc[$C];$s--;echo"<div>".h($tb)."<input type='hidden' name='where[$s][col]' value='".h($C)."'>:",(like_bool($n)?" <select name='where[$s][val]'>".optionlist(array(""=>"",'nie','tak'),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$n,(array)$Z[$y]["val"],($n["null"]?0:null))),"</div>\n";unset($f[$C]);}elseif(is_array($Md=$this->_foreignKeyOptions($_GET["select"],$C))){if($o[$C]["null"])$Md[0]='('.'puste'.')';$y=$Xc[$C];$s--;echo"<div>".h($tb)."<input type='hidden' name='where[$s][col]' value='".h($C)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($Md,$Z[$y]["val"],true)."</select></div>\n";unset($f[$C]);}}$s=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".'gdziekolwiek'.")".optionlist($f,$X["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$s][val]' value='".h($X["val"])."' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";$s++;}}echo"<div><select name='where[$s][col]' onchange='this.nextSibling.nextSibling.onchange();'><option value=''>(".'gdziekolwiek'.")".optionlist($f,null,true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]' onchange='selectAddRow(this);' onsearch='selectSearch(this);'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($E,$f,$w){$Od=array();foreach($w
as$y=>$v){$E=array();foreach($v["columns"]as$X)$E[]=$f[$X];if(count(array_filter($E,'strlen'))>1&&$y!="PRIMARY")$Od[$y]=implode(", ",$E);}if($Od){echo'<fieldset><legend>'.'Sortuj'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Od,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($jf){}function
selectActionPrint($w){echo"<fieldset><legend>".'Czynno≈õƒá'."</legend><div>","<input type='submit' value='".'poka≈º'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Jb,$f){if($Jb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div onkeydown=\"eventStop(event); return bodyKeydown(event, 'email');\">\n","<p>".'Nadawca'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Temat'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p onkeydown=\"eventStop(event); return bodyKeydown(event, 'email_append');\">".html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Dodaj'."'>\n";echo"<p>".'Za≈ÇƒÖczniki'.": <input type='file' name='email_files[]' onchange=\"this.onchange = function () { }; var el = this.cloneNode(true); el.value = ''; this.parentNode.appendChild(el);\">","<p>".(count($Jb)==1?'<input type="hidden" name="email_field" value="'.h(key($Jb)).'">':html_select("email_field",$Jb)),"<input type='submit' name='email' value='".'Wy≈õlij'."' onclick=\"return this.form['delete'].onclick();\">\n","</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$w){return
array(array(),array());}function
selectSearchProcess($o,$w){$K=array();foreach((array)$_GET["where"]as$y=>$Z){$ab=$Z["col"];$Id=$Z["op"];$X=$Z["val"];if(($y<0?"":$ab).$X!=""){$fb=array();foreach(($ab!=""?array($ab=>$o[$ab]):$o)as$C=>$n){if($ab!=""||is_numeric($X)||!preg_match('~int|float|double|decimal~',$n["type"])){$C=idf_escape($C);if($ab!=""&&$n["type"]=="enum")$fb[]=(in_array(0,$X)?"$C IS NULL OR ":"")."$C IN (".implode(", ",array_map('intval',$X)).")";else{$kf=preg_match('~char|text|enum|set~',$n["type"]);$Y=$this->processInput($n,(!$Id&&$kf&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$fb[]=$C.($Y=="NULL"?" IS".($Id==">="?" NOT":"")." $Y":(in_array($Id,$this->operators)||$Id=="="?" $Id $Y":($kf?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($y<0&&$X=="0")$fb[]="$C IS NULL";}}}$K[]=($fb?"(".implode(" OR ",$fb).")":"0");}}return$K;}function
selectOrderProcess($o,$w){$Gc=$_GET["index_order"];if($Gc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($Gc!=""?array($w[$Gc]):$w)as$v){if($Gc!=""||$v["type"]=="INDEX"){$uc=array_filter($v["descs"]);$tb=false;foreach($v["columns"]as$X){if(preg_match('~date|timestamp~',$o[$X]["type"])){$tb=true;break;}}$K=array();foreach($v["columns"]as$y=>$X)$K[]=idf_escape($X).(($uc?$v["descs"][$y]:$tb)?" DESC":"");return$K;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$jc){if($_POST["email_append"])return
true;if($_POST["email"]){$Ie=0;if($_POST["all"]||$_POST["check"]){$n=idf_escape($_POST["email_field"]);$Ye=$_POST["email_subject"];$sd=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$Ye.$sd",$md);$M=get_rows("SELECT DISTINCT $n".($md[1]?", ".implode(", ",array_map('idf_escape',array_unique($md[1]))):"")." FROM ".table($_GET["select"])." WHERE $n IS NOT NULL AND $n != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$o=fields($_GET["select"]);foreach($this->rowDescriptions($M,$jc)as$L){$ve=array('{\\'=>'{');foreach($md[1]as$X)$ve['{$'."$X}"]=$this->editVal($L[$X],$o[$X]);$Ib=$L[$_POST["email_field"]];if(is_mail($Ib)&&send_mail($Ib,strtr($Ye,$ve),strtr($sd,$ve),$_POST["email_from"],$_FILES["email_files"]))$Ie++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('Wys≈Çano %d e-mail.','Wys≈Çano %d e-maile.','Wys≈Çano %d e-maili.'),$Ie));}return
false;}function
selectQueryBuild($N,$Z,$r,$E,$z,$F){return"";}function
messageQuery($I,$lf){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$I)."\n".($lf?"($lf)\n":"")."-->";}function
editFunctions($n){$K=array();if($n["null"]&&preg_match('~blob~',$n["type"]))$K["NULL"]='puste';$K[""]=($n["null"]||$n["auto_increment"]||like_bool($n)?"":"*");if(preg_match('~date|time~',$n["type"]))$K["now"]='teraz';if(preg_match('~_(md5|sha1)$~i',$n["field"],$A))$K[]=strtolower($A[1]);return$K;}function
editInput($R,$n,$Ba,$Y){if($n["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ba value='-1' checked><i>".'bez zmian'."</i></label> ":"").enum_input("radio",$Ba,$n,($Y||isset($_GET["select"])?$Y:0),($n["null"]?"":null));$Md=$this->_foreignKeyOptions($R,$n["field"],$Y);if($Md!==null)return(is_array($Md)?"<select$Ba>".optionlist($Md,$Y,true)."</select>":"<input value='".h($Y)."'$Ba class='hidden'><input value='".h($Md)."' class='jsonly' onkeyup=\"whisper('".h(ME."script=complete&source=".urlencode($R)."&field=".urlencode($n["field"]))."&value=', this);\"><div onclick='return whisperClick(event, this.previousSibling);'></div>");if(like_bool($n))return'<input type="checkbox" value="'.h($Y?$Y:1).'"'.($Y?' checked':'')."$Ba>";$zc="";if(preg_match('~time~',$n["type"]))$zc='HH:MM:SS';if(preg_match('~date|timestamp~',$n["type"]))$zc='d.m.[rrrr]'.($zc?" [$zc]":"");if($zc)return"<input value='".h($Y)."'$Ba> ($zc)";if(preg_match('~_(md5|sha1)$~i',$n["field"]))return"<input type='password' value='".h($Y)."'$Ba>";return'';}function
processInput($n,$Y,$q=""){if($q=="now")return"$q()";$K=$Y;if(preg_match('~date|timestamp~',$n["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote('$6.$4.$1'))).'(.*))',$Y,$A))$K=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$K=($n["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$K:q($K));if($Y==""&&like_bool($n))$K="0";elseif($Y==""&&($n["null"]||!preg_match('~char|text~',$n["type"])))$K="NULL";elseif(preg_match('~^(md5|sha1)$~',$q))$K="$q($K)";return
unconvert_field($n,$K);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($R,$Xe,$I){global$g;$J=$g->query($I,1);if($J){while($L=$J->fetch_assoc()){if($Xe=="table"){dump_csv(array_keys($L));$Xe="INSERT";}dump_csv($L);}}}function
dumpFilename($Cc){return
friendly_url($Cc);}function
dumpHeaders($Cc,$xd=false){$Vb="csv";header("Content-Type: text/csv; charset=utf-8");return$Vb;}function
homepage(){return
true;}function
navigation($wd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="http://www.adminer.org/editor/#download" target="_blank" id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($wd=="auth"){$fc=true;foreach((array)$_SESSION["pwds"]as$Qf=>$Me){foreach($Me[""]as$V=>$H){if($H!==null){if($fc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$fc=false;}echo"<a href='".h(auth_url($Qf,"",$V))."'>".($V!=""?h($V):"<i>".'puste'."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($wd);if($wd!="db"&&$wd!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".'Brak tabel.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($wd){}function
tablesPrint($T){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($T
as$L){$C=$this->tableName($L);if(isset($L["Engine"])&&$C!="")echo"<a href='".h(ME).'select='.urlencode($L["Name"])."'".bold($_GET["select"]==$L["Name"]||$_GET["edit"]==$L["Name"],"select")." title='".'Poka≈º dane'."'>$C</a><br>\n";}}function
_foreignColumn($jc,$e){foreach((array)$jc[$e]as$ic){if(count($ic["source"])==1){$C=$this->rowDescription($ic["table"]);if($C!=""){$t=idf_escape($ic["target"][0]);return
array($ic["table"],$t,$C);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$g;if(list($gf,$t,$C)=$this->_foreignColumn(column_foreign_keys($R),$e)){$K=&$this->_values[$gf];if($K===null){$S=table_status($gf);$K=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $C FROM ".table($gf)." ORDER BY 2"));}if(!$K&&$Y!==null)return$g->result("SELECT $C FROM ".table($gf)." WHERE $t = ".q($Y));return$K;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($of,$m="",$Pa=array(),$pf=""){global$ba,$ca,$b,$Ab,$x;page_headers();if(is_ajax()&&$m){page_messages($m);exit;}$qf=$of.($pf!=""?": $pf":"");$rf=strip_tags($qf.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="pl" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="never">
<title>',$rf,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.2.0",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.2.0",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.0",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.0",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);"',(isset($_COOKIE["adminer_version"])?"":" onload=\"verifyVersion('$ca');\"");?>>
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('Jeste≈õ offline.'),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Pa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Ab[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=(SERVER!=""?h(SERVER):'Serwer');if($Pa===false)echo"$O\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Pa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Pa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Pa
as$y=>$X){$tb=(is_array($X)?$X[1]:h($X));if($tb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$tb</a> &raquo; ";}}echo"$of\n";}}echo"<h2>$qf</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($m);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($m){$Kf=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$td=$_SESSION["messages"][$Kf];if($td){echo"<div class='message'>".implode("</div>\n<div class='message'>",$td)."</div>\n";unset($_SESSION["messages"][$Kf]);}if($m)echo"<div class='error'>$m</div>\n";}function
page_footer($wd=""){global$b,$tf;echo'</div>

';if($wd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Wyloguj" id="logout">
<input type="hidden" name="token" value="',$tf,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($wd);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($B){while($B>=2147483648)$B-=4294967296;while($B<=-2147483649)$B+=4294967296;return(int)$B;}function
long2str($W,$Vf){$Be='';foreach($W
as$X)$Be.=pack('V',$X);if($Vf)return
substr($Be,0,end($W));return$Be;}function
str2long($Be,$Vf){$W=array_values(unpack('V*',str_pad($Be,4*ceil(strlen($Be)/4),"\0")));if($Vf)$W[]=strlen($Be);return$W;}function
xxtea_mx($bg,$ag,$af,$Tc){return
int32((($bg>>5&0x7FFFFFF)^$ag<<2)+(($ag>>3&0x1FFFFFFF)^$bg<<4))^int32(($af^$ag)+($Tc^$bg));}function
encrypt_string($Ve,$y){if($Ve=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ve,true);$B=count($W)-1;$bg=$W[$B];$ag=$W[0];$ke=floor(6+52/($B+1));$af=0;while($ke-->0){$af=int32($af+0x9E3779B9);$Eb=$af>>2&3;for($Sd=0;$Sd<$B;$Sd++){$ag=$W[$Sd+1];$yd=xxtea_mx($bg,$ag,$af,$y[$Sd&3^$Eb]);$bg=int32($W[$Sd]+$yd);$W[$Sd]=$bg;}$ag=$W[0];$yd=xxtea_mx($bg,$ag,$af,$y[$Sd&3^$Eb]);$bg=int32($W[$B]+$yd);$W[$B]=$bg;}return
long2str($W,false);}function
decrypt_string($Ve,$y){if($Ve=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ve,false);$B=count($W)-1;$bg=$W[$B];$ag=$W[0];$ke=floor(6+52/($B+1));$af=int32($ke*0x9E3779B9);while($af){$Eb=$af>>2&3;for($Sd=$B;$Sd>0;$Sd--){$bg=$W[$Sd-1];$yd=xxtea_mx($bg,$ag,$af,$y[$Sd&3^$Eb]);$ag=int32($W[$Sd]-$yd);$W[$Sd]=$ag;}$bg=$W[$B];$yd=xxtea_mx($bg,$ag,$af,$y[$Sd&3^$Eb]);$ag=int32($W[0]-$yd);$W[0]=$ag;$af=int32($af-0x9E3779B9);}return
long2str($W,true);}$g='';$wc=$_SESSION["token"];if(!$wc)$_SESSION["token"]=rand(1,1e6);$tf=get_token();$Yd=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Yd[$y]=$X;}}function
add_invalid_login(){global$b;$cc=get_temp_dir()."/adminer.invalid";$oc=@fopen($cc,"r+");if(!$oc){$oc=@fopen($cc,"w");if(!$oc)return;}flock($oc,LOCK_EX);$Pc=unserialize(stream_get_contents($oc));$lf=time();if($Pc){foreach($Pc
as$Qc=>$X){if($X[0]<$lf)unset($Pc[$Qc]);}}$Oc=&$Pc[$b->bruteForceKey()];if(!$Oc)$Oc=array($lf+30*60,0);$Oc[1]++;$Ke=serialize($Pc);rewind($oc);fwrite($oc,$Ke);ftruncate($oc,strlen($Ke));flock($oc,LOCK_UN);fclose($oc);}$Ca=$_POST["auth"];if($Ca){$Pc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Oc=$Pc[$b->bruteForceKey()];$Ad=($Oc[1]>30?$Oc[0]-time():0);if($Ad>0)auth_error(lang(array('Za du≈ºo nieudanych pr√≥b logowania, spr√≥buj ponownie za %d minutƒô.','Za du≈ºo nieudanych pr√≥b logowania, spr√≥buj ponownie za %d minuty.','Za du≈ºo nieudanych pr√≥b logowania, spr√≥buj ponownie za %d minut.'),ceil($Ad/60)));session_regenerate_id();$Qf=$Ca["driver"];$O=$Ca["server"];$V=$Ca["username"];$H=(string)$Ca["password"];$l=$Ca["db"];set_password($Qf,$O,$V,$H);$_SESSION["db"][$Qf][$O][$V][$l]=true;if($Ca["permanent"]){$y=base64_encode($Qf)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($l);$he=$b->permanentLogin(true);$Yd[$y]="$y:".base64_encode($he?encrypt_string($H,$he):"");cookie("adminer_permanent",implode(" ",$Yd));}if(count($_POST)==1||DRIVER!=$Qf||SERVER!=$O||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Qf,$O,$V,$l));}elseif($_POST["logout"]){if($wc&&!verify_token()){page_header('Wyloguj','Nieprawid≈Çowy token CSRF. Spr√≥buj wys≈Çaƒá formularz ponownie.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Wylogowano pomy≈õlnie.');}}elseif($Yd&&!$_SESSION["pwds"]){session_regenerate_id();$he=$b->permanentLogin();foreach($Yd
as$y=>$X){list(,$Wa)=explode(":",$X);list($Qf,$O,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Qf,$O,$V,decrypt_string(base64_decode($Wa),$he));$_SESSION["db"][$Qf][$O][$V][$l]=true;}}function
unset_permanent(){global$Yd;foreach($Yd
as$y=>$X){list($Qf,$O,$V,$l)=array_map('base64_decode',explode("-",$y));if($Qf==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Yd[$y]);}cookie("adminer_permanent",implode(" ",$Yd));}function
auth_error($m){global$b,$wc;$m=h($m);$Ne=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Ne]||$_GET[$Ne])&&!$wc)$m='Sesja wygas≈Ça, zaloguj siƒô ponownie.';else{add_invalid_login();$H=get_password();if($H!==null){if($H===false)$m.='<br>'.sprintf('Wa≈ºno≈õƒá has≈Ça g≈Ç√≥wnego wygas≈Ça. <a href="http://www.adminer.org/pl/extension/" target="_blank">Zaimplementuj</a> w≈ÇasnƒÖ metodƒô %s, aby ustawiƒá je na sta≈Çe.','<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Ne]&&$_GET[$Ne]&&ini_bool("session.use_only_cookies"))$m='Wymagana jest obs≈Çuga sesji w PHP.';$G=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$G["lifetime"]);page_header('Zaloguj siƒô',$m,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('Brak rozszerzenia',sprintf('≈ªadne z rozszerze≈Ñ PHP umo≈ºliwiajƒÖcych po≈ÇƒÖczenie siƒô z bazƒÖ danych (%s) nie jest dostƒôpne.',implode(", ",$ce)),false);page_footer("auth");exit;}$g=connect();}$_b=new
Min_Driver($g);if(!is_object($g)||!$b->login($_GET["username"],get_password()))auth_error((is_string($g)?$g:'Nieprawid≈Çowe dane logowania.'));if($Ca&&$_POST["token"])$_POST["token"]=$tf;$m='';if($_POST){if(!verify_token()){$Kc="max_input_vars";$qd=ini_get($Kc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$qd||$X<$qd)){$Kc=$y;$qd=$X;}}}$m=(!$_POST["token"]&&$qd?sprintf('Przekroczono maksymalnƒÖ liczbƒô p√≥l. Zwiƒôksz %s.',"'$Kc'"):'Nieprawid≈Çowy token CSRF. Spr√≥buj wys≈Çaƒá formularz ponownie.'.' '.'Je≈ºeli nie wywo≈Ça≈Çe≈õ tej strony z Adminera, zamknij to okno.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$m=sprintf('Przes≈Çano zbyt du≈ºo danych. Zmniejsz objƒôto≈õƒá danych lub zwiƒôksz zmiennƒÖ konfiguracyjnƒÖ %s.',"'post_max_size'");if(isset($_GET["sql"]))$m.=' '.'Wiƒôksze pliki SQL mo≈ºesz wgraƒá na serwer poprzez FTP przed zaimportowaniem.';}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($xc){return"=?UTF-8?B?".base64_encode($xc)."?=";}function
send_mail($Ib,$Ye,$sd,$pc="",$dc=array()){$Ob=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$sd=str_replace("\n",$Ob,wordwrap(str_replace("\r","","$sd\n")));$Oa=uniqid("boundary");$_a="";foreach((array)$dc["error"]as$y=>$X){if(!$X)$_a.="--$Oa$Ob"."Content-Type: ".str_replace("\n","",$dc["type"][$y]).$Ob."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$dc["name"][$y])."\"$Ob"."Content-Transfer-Encoding: base64$Ob$Ob".chunk_split(base64_encode(file_get_contents($dc["tmp_name"][$y])),76,$Ob).$Ob;}$Ja="";$yc="Content-Type: text/plain; charset=utf-8$Ob"."Content-Transfer-Encoding: 8bit";if($_a){$_a.="--$Oa--$Ob";$Ja="--$Oa$Ob$yc$Ob$Ob";$yc="Content-Type: multipart/mixed; boundary=\"$Oa\"";}$yc.=$Ob."MIME-Version: 1.0$Ob"."X-Mailer: Adminer Editor".($pc?$Ob."From: ".str_replace("\n","",$pc):"");return
mail($Ib,email_header($Ye),$Ja.$sd.$_a,$yc);}function
like_bool($n){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$n["full_type"]);}$g->select_db($b->database());$Fd="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Ab[DRIVER]='Zaloguj siƒô';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$o=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$N=array(idf_escape($_GET["field"]));$J=$_b->select($a,$N,array(where($_GET,$o)),$N);$L=($J?$J->fetch_row():array());echo$L[0];exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$o=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$o):""):where($_GET,$o));$Jf=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($o
as$C=>$n){if(!isset($n["privileges"][$Jf?"update":"insert"])||$b->fieldName($n)=="")unset($o[$C]);}if($_POST&&!$m&&!isset($_GET["select"])){$hd=$_POST["referer"];if($_POST["insert"])$hd=($Jf?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$hd))$hd=ME."select=".urlencode($a);$w=indexes($a);$Ef=unique_array($_GET["where"],$w);$ne="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($hd,'Rekord zosta≈Ç usuniƒôty.',$_b->delete($a,$ne,!$Ef));else{$P=array();foreach($o
as$C=>$n){$X=process_input($n);if($X!==false&&$X!==null)$P[idf_escape($C)]=$X;}if($Jf){if(!$P)redirect($hd);queries_redirect($hd,'Rekord zosta≈Ç zaktualizowany.',$_b->update($a,$P,$ne,!$Ef));if(is_ajax()){page_headers();page_messages($m);exit;}}else{$J=$_b->insert($a,$P);$cd=($J?last_id():0);queries_redirect($hd,sprintf('Rekord%s zosta≈Ç dodany.',($cd?" $cd":"")),$J);}}}$L=null;if($_POST["save"])$L=(array)$_POST["fields"];elseif($Z){$N=array();foreach($o
as$C=>$n){if(isset($n["privileges"]["select"])){$ya=convert_field($n);if($_POST["clone"]&&$n["auto_increment"])$ya="''";if($x=="sql"&&preg_match("~enum|set~",$n["type"]))$ya="1*".idf_escape($C);$N[]=($ya?"$ya AS ":"").idf_escape($C);}}$L=array();if(!support("table"))$N=array("*");if($N){$J=$_b->select($a,$N,array($Z),$N,array(),(isset($_GET["select"])?2:1));$L=$J->fetch_assoc();if(!$L)$L=false;if(isset($_GET["select"])&&(!$L||$J->fetch_assoc()))$L=null;}}if(!support("table")&&!$o){if(!$Z){$J=$_b->select($a,array("*"),$Z,array("*"));$L=($J?$J->fetch_assoc():false);if(!$L)$L=array($_b->primary=>"");}if($L){foreach($L
as$y=>$X){if(!$Z)$L[$y]=null;$o[$y]=array("field"=>$y,"null"=>($y!=$_b->primary),"auto_increment"=>($y==$_b->primary));}}}edit_form($a,$o,$L,$Jf);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$w=indexes($a);$o=fields($a);$kc=column_foreign_keys($a);$Ed="";if($S["Oid"]){$Ed=($x=="sqlite"?"rowid":"oid");$w[]=array("type"=>"PRIMARY","columns"=>array($Ed));}parse_str($_COOKIE["adminer_import"],$ra);$_e=array();$f=array();$jf=null;foreach($o
as$y=>$n){$C=$b->fieldName($n);if(isset($n["privileges"]["select"])&&$C!=""){$f[$y]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($n))$jf=$b->selectLengthProcess();}$_e+=$n["privileges"];}list($N,$r)=$b->selectColumnsProcess($f,$w);$Rc=count($r)<count($N);$Z=$b->selectSearchProcess($o,$w);$E=$b->selectOrderProcess($o,$w);$z=$b->selectLimitProcess();$pc=($N?implode(", ",$N):"*".($Ed?", $Ed":"")).convert_fields($f,$o,$N)."\nFROM ".table($a);$rc=($r&&$Rc?"\nGROUP BY ".implode(", ",$r):"").($E?"\nORDER BY ".implode(", ",$E):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Ff=>$L){$ya=convert_field($o[key($L)]);$N=array($ya?$ya:idf_escape(key($L)));$Z[]=where_check($Ff,$o);$K=$_b->select($a,$N,$Z,$N);if($K)echo
reset($K->fetch_row());}exit;}if($_POST&&!$m){$Xf=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ua=array();foreach($_POST["check"]as$Ra)$Ua[]=where_check($Ra,$o);$Xf[]="((".implode(") OR (",$Ua)."))";}$Xf=($Xf?"\nWHERE ".implode(" AND ",$Xf):"");$ee=$Hf=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$ee=array_flip($v["columns"]);$Hf=($N?$ee:array());break;}}foreach((array)$Hf
as$y=>$X){if(in_array(idf_escape($y),$N))unset($Hf[$y]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Hf===array())$I="SELECT $pc$Xf$rc";else{$Df=array();foreach($_POST["check"]as$X)$Df[]="(SELECT".limit($pc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$o).$rc,1).")";$I=implode(" UNION ALL ",$Df);}$b->dumpData($a,"table",$I);exit;}if(!$b->selectEmailProcess($Z,$kc)){if($_POST["save"]||$_POST["delete"]){$J=true;$sa=0;$P=array();if(!$_POST["delete"]){foreach($f
as$C=>$X){$X=process_input($o[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$P){if($_POST["clone"])$I="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Hf===array()&&is_array($_POST["check"]))||$Rc){$J=($_POST["delete"]?$_b->delete($a,$Xf):($_POST["clone"]?queries("INSERT $I$Xf"):$_b->update($a,$P,$Xf)));$sa=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Wf="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$o);$J=($_POST["delete"]?$_b->delete($a,$Wf,1):($_POST["clone"]?queries("INSERT".limit1($I,$Wf)):$_b->update($a,$P,$Wf)));if(!$J)break;$sa+=$g->affected_rows;}}}$sd=lang(array('Zmieniono %d rekord.','Zmieniono %d rekordy.','Zmieniono %d rekord√≥w.'),$sa);if($_POST["clone"]&&$J&&$sa==1){$cd=last_id();if($cd)$sd=sprintf('Rekord%s zosta≈Ç dodany.'," $cd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$sd,$J);if(!$_POST["delete"]){edit_form($a,$o,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$m='Ctrl+kliknij warto≈õƒá, aby jƒÖ edytowaƒá.';else{$J=true;$sa=0;foreach($_POST["val"]as$Ff=>$L){$P=array();foreach($L
as$y=>$X){$y=bracket_escape($y,1);$P[idf_escape($y)]=(preg_match('~char|text~',$o[$y]["type"])||$X!=""?$b->processInput($o[$y],$X):"NULL");}$J=$_b->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Ff,$o),!($Rc||$Hf===array())," ");if(!$J)break;$sa+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('Zmieniono %d rekord.','Zmieniono %d rekordy.','Zmieniono %d rekord√≥w.'),$sa),$J);}}elseif(!is_string($bc=get_file("csv_file",true)))$m=upload_error($bc);elseif(!preg_match('~~u',$bc))$m='Kodowanie pliku musi byƒá ustawione na UTF-8.';else{cookie("adminer_import","output=".urlencode($ra["output"])."&format=".urlencode($_POST["separator"]));$J=true;$cb=array_keys($o);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$bc,$md);$sa=count($md[0]);$_b->begin();$Je=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$M=array();foreach($md[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$Je]*)$Je~",$X.$Je,$nd);if(!$y&&!array_diff($nd[1],$cb)){$cb=$nd[1];$sa--;}else{$P=array();foreach($nd[1]as$s=>$ab)$P[idf_escape($cb[$s])]=($ab==""&&$o[$cb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$ab))));$M[]=$P;}}$J=(!$M||$_b->insertUpdate($a,$M,$ee));if($J)$_b->commit();queries_redirect(remove_from_uri("page"),lang(array('%d rekord zosta≈Ç zaimportowany.','%d rekordy zosta≈Çy zaimportowane.','%d rekord√≥w zosta≈Ço zaimportowanych.'),$sa),$J);$_b->rollback();}}}$df=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('poka≈º'.": $df",$m);$P=null;if(isset($_e["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if(count($kc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".'Nie uda≈Ço siƒô pobraƒá danych z tabeli'.($o?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($N,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($E,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($jf);$b->selectActionPrint($w);echo"</form>\n";$F=$_GET["page"];if($F=="last"){$nc=$g->result(count_rows($a,$Z,$Rc,$r));$F=floor(max(0,$nc-1)/$z);}$Ge=$N;if(!$Ge){$Ge[]="*";if($Ed)$Ge[]=$Ed;}$jb=convert_fields($f,$o,$N);if($jb)$Ge[]=substr($jb,2);$J=$_b->select($a,$Ge,$Z,$r,$E,$z,$F,true);if(!$J)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$F)$J->seek($z*$F);$Kb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$M=array();while($L=$J->fetch_assoc()){if($F&&$x=="oracle")unset($L["RNUM"]);$M[]=$L;}if($_GET["page"]!="last"&&+$z&&$r&&$Rc&&$x=="sql")$nc=$g->result(" SELECT FOUND_ROWS()");if(!$M)echo"<p class='message'>".'Brak rekord√≥w.'."\n";else{$Ia=$b->backwardKeys($a,$df);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$r&&$N?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Zmie≈Ñ'."</a>");$zd=array();$qc=array();reset($N);$pe=1;foreach($M[0]as$y=>$X){if($y!=$Ed){$X=$_GET["columns"][key($N)];$n=$o[$N?($X?$X["col"]:current($N)):$y];$C=($n?$b->fieldName($n,$pe):($X["fun"]?"*":$y));if($C!=""){$pe++;$zd[$y]=$C;$e=idf_escape($y);$Bc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$tb="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($Bc.($E[0]==$e||$E[0]==$y||(!$E&&$Rc&&$r[0]==$e)?$tb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($Bc.$tb)."' title='".'malejƒÖco'."' class='text'> ‚Üì</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($y)).'\'); return false;" title="'.'Szukaj'.'" class="text jsonly"> =</a>';echo"</span>";}$qc[$y]=$X["fun"];next($N);}}$fd=array();if($_GET["modify"]){foreach($M
as$L){foreach($L
as$y=>$X)$fd[$y]=max($fd[$y],min(40,strlen(utf8_decode($X))));}}echo($Ia?"<th>".'Relacje':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$F%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($M,$kc)as$B=>$L){$Ef=unique_array($M[$B],$w);if(!$Ef){$Ef=array();foreach($M[$B]as$y=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$y))$Ef[$y]=$X;}}$Ff="";foreach($Ef
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x=='sql'&&preg_match("~^utf8_~",$o[$y]["collation"])?$y:"CONVERT($y USING ".charset($g).")").")";$X=md5($X);}$Ff.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$r&&$N?"":"<td>".checkbox("check[]",substr($Ff,1),in_array(substr($Ff,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Rc||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Ff)."'>".'edytuj'."</a>"));foreach($L
as$y=>$X){if(isset($zd[$y])){$n=$o[$y];if($X!=""&&(!isset($Kb[$y])||$Kb[$y]!=""))$Kb[$y]=(is_mail($X)?$zd[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$n["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Ff;if(!$_&&$X!==null){foreach((array)$kc[$y]as$p){if(count($kc[$y])==1||end($p["source"])==$y){$_="";foreach($p["source"]as$s=>$Qe)$_.=where_link($s,$p["target"][$s],$M[$B][$Qe]);$_=($p["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($p["db"]),ME):ME).'select='.urlencode($p["table"]).$_;if(count($p["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Ef))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Ef
as$Tc=>$W)$_.=where_link($s++,$Tc,$W);}$X=select_value($X,$_,$n,$jf);$t=h("val[$Ff][".bracket_escape($y)."]");$Y=$_POST["val"][$Ff][bracket_escape($y)];$Gb=!is_array($L[$y])&&is_utf8($X)&&$M[$B][$y]==$L[$y]&&!$qc[$y];$if=preg_match('~text|lob~',$n["type"]);if(($_GET["modify"]&&$Gb)||$Y!==null){$tc=h($Y!==null?$Y:$L[$y]);echo"<td>".($if?"<textarea name='$t' cols='30' rows='".(substr_count($L[$y],"\n")+1)."'>$tc</textarea>":"<input name='$t' value='$tc' size='$fd[$y]'>");}else{$jd=strpos($X,"<i>...</i>");echo"<td id='$t' onclick=\"selectClick(this, event, ".($jd?2:($if?1:0)).($Gb?"":", '".h('U≈ºyj linku edycji aby zmieniƒá tƒô warto≈õƒá.')."'").");\">$X";}}}if($Ia)echo"<td>";$b->backwardKeysPrint($Ia,$M[$B]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($M||$F)&&!is_ajax()){$Sb=true;if($_GET["page"]!="last"){if(!+$z)$nc=count($M);elseif($x!="sql"||!$Rc){$nc=($Rc?false:found_rows($S,$Z));if($nc<max(1e4,2*($F+1)*$z))$nc=reset(slow_query(count_rows($a,$Z,$Rc,$r)));else$Sb=false;}}if(+$z&&($nc===false||$nc>$z||$F)){echo"<p class='pages'>";$od=($nc===false?$F+(count($M)>=$z?2:1):floor(($nc-1)/$z));if($x!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".'Strona'."', '".($F+1)."'), event); return false;\">".'Strona'."</a>:",pagination(0,$F).($F>5?" ...":"");for($s=max(1,$F-4);$s<min($od,$F+5);$s++)echo
pagination($s,$F);if($od>0){echo($F+5<$od?" ...":""),($Sb&&$nc!==false?pagination($od,$F):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$od'>".'ostatni'."</a>");}echo(($nc===false?count($M)+1:$nc-$F*$z)>$z?' <a href="'.h(remove_from_uri("page")."&page=".($F+1)).'" onclick="return !selectLoadMore(this, '.(+$z).', \''.'Wczytywanie'.'...\');" class="loadmore">'.'Wczytaj wiƒôcej danych'.'</a>':'');}else{echo'Strona'.":",pagination(0,$F).($F>1?" ...":""),($F?pagination($F,$F):""),($od>$F?pagination($F+1,$F).($od>$F+1?" ...":""):"");}}echo"<p class='count'>\n",($nc!==false?"(".($Sb?"":"~ ").lang(array('%d rekord','%d rekordy','%d rekord√≥w'),$nc).") ":"");$yb=($Sb?"":"~ ").$nc;echo
checkbox("all",1,0,'wybierz wszystkie',"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$yb' : checked); selectCount('selected2', this.checked || !checked ? '$yb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Zmie≈Ñ</legend><div>
<input type="submit" value="Zapisz zmiany"',($_GET["modify"]?'':' title="'.'Ctrl+kliknij warto≈õƒá, aby jƒÖ edytowaƒá.'.'"'),'>
</div></fieldset>
<fieldset><legend>Zaznaczone <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edytuj">
<input type="submit" name="clone" value="Duplikuj">
<input type="submit" name="delete" value="Usu≈Ñ"',confirm(),'>
</div></fieldset>
';}$lc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($lc['sql']);break;}}if($lc){print_fieldset("export",'Eksport'." <span id='selected2'></span>");$Rd=$b->dumpOutput();echo($Rd?html_select("output",$Rd,$ra["output"])." ":""),html_select("format",$lc,$ra["format"])," <input type='submit' name='export' value='".'Eksport'."'>\n","</div></fieldset>\n";}echo(!$r&&$N?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",'Import',!$M);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ra["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Kb,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$tf'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));elseif(list($R,$t,$C)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$J=$g->query("SELECT $t, $C FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$C LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($L=$J->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($L[0]))."'>".h($L[1])."</a><br>\n";if($L)echo"...\n";}exit;}else{page_header('Serwer',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Wyszukaj we wszystkich tabelach'.": <input name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Szukaj'."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^tables\[/);"><th>'.'Tabela'.'<td>'.'Liczba rekord√≥w'."</thead>\n";foreach(table_status()as$R=>$L){$C=$b->tableName($L);if(isset($L["Engine"])&&$C!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true),"","formUncheck('check-all');"),"<th><a href='".h(ME).'select='.urlencode($R)."'>$C</a>";$X=format_number($L["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($L["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","</form>\n";}}page_footer();