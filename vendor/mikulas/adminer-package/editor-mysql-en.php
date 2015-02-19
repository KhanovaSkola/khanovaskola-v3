<?php
/** Adminer Editor - Compact database editor
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.2.0
*/error_reporting(6135);$Hb=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Hb||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$W){$ze=filter_input_array(constant("INPUT$W"),FILTER_UNSAFE_RAW);if($ze)$$W=$ze;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0Ñ\0\n @\0¥CÑË\"\0`E„Q∏‡ˇá?¿tvM'îJd¡d\\åb0\0ƒ\"ô¿f”à§Ós5õœÁ—AùXPaJì0Ñ•ë8Ñ#RäT©ëz`à#.©«cÌX√˛»Ä?¿-\0°Im?†.´M∂Ä\0»Ø(Ãâ˝¿/(%å\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1ÃáìŸåﬁl7úáB1Ñ4vb0òÕfsëºÍn2BÃ—±Ÿòﬁn:á#(ºb.\rDc)»»a7EÑë§¬l¶√±îËi1Ãésò¥Á-4ôáf”	»Œi7Ü≥ÈÜÑéåF√©îvt2ûÇ”!ñr0œ„„£t~ΩUç'3MÄ…WÑB¶'cÕP¬:6T\rc£Aæzr_ÓWK∂\r-ºVNFS%~√c≤ŸÌ&õ\\^ r¿õ≠ÊuÇ≈é√ûÙŸã4'7k∂ËØ¬„Q‘Êhö'g\rFB\ryT7SS•P–1=«§cIË :çdî∫m>£S8LÜJÅút.M¢èä	œã`'C°º€–889§» éQÿ˝åÓ2ç#8–ê≠£íò6m˙≤Üjà¢h´<Öå∞´å9/ÎòÁ:êJÍ) Ç§\0d>!\0ZáàvÏªnÎæºo(⁄Û•…k‘7Ωès‡˘>åÓÜ!–R\"*nS˝\0@P\"¡Ëí(ã#[∂•£@gπo¸≠ízn˛9k§8Ünöô™1¥I*àÙ=Õn≤§™è∏Ë0´c(ˆ;æ√†–Ë!∞¸Î*cÏ˜>Œé¨E7DÒLJ©†1 J=”⁄ﬁ1LÇ˚?–s=#` 3\$4ÏÄ˙»u»±ÃŒzG—C YAt´?;◊Q“k&«ÔùYPøuËÂ«Ø}UaHV%G;Ésºî<A\0\\º‘P—\\¬ú&¬™ÛV¶\n£SU√tÌ≈«råÍà∆2§	l^ÌZ6òejÖ¡≠≥A∑dÛ[›s’∂àJPî™ Ûà“ùåä8Ë=ªÉò‡6#ÀÇ74*Ûü®#e»¿ﬁ!’7{∆6ìø<oÕC™9v[ñMÙ≈-`”ıkˆ>élŸ⁄¥ãÂI™ÉH⁄3èx˙Äõ‰w0t6æ√%MR%≥Ωjh⁄Bò<¥\0…AQ<P<:ö„u/§;\\>†À-πÑ àÕ¡QH\nv°L+v÷√¶Ï<Ô\rËÂv‡ˆÓπ\\*†‡…Á”¥›¢gåùnÀ©∏πT–©2Pï\r®¯ﬂã\"+z†8£†∂:#Ä Ë√Œ2ã∫J[êióÇ£®;zò˚—Ù°r 3#®Ÿâ†:„nÌ\r„ΩÉeŸpd›ç› Ë2càÍ4≤køä£\rGïÊE6_≤™ ÿﬁâbãû/å´HB%Ú0Î¢>»»hoW√nxl÷ç†ÊµÉCQ^Ä∞–‘ˇﬂÒ\rÑäæ∂4lK{˛Z∆¸:Ü–‹√Éü.¶p®ßƒÇÈJÛB-≈+Bî¥ë(ÎTÚü%ÆµJõ0™lÿT∂`+…-¡æ@B⁄·€ÑV·íƒ\0¬œCº,ÏØ0t‚‡åFáâÂ?ƒ†À\na@…å>Ç‚ZECìÙOé-Êõ§^QÄ&ﬂ÷˘)I)Æ§ƒ¿ÅRÑ]\r°î9î7_à¢\r…F80µOb˘	ÄëÓ>∫‰˝\nR˝_à—8ÊÇÿŸ´‰ov0§bCA∏F!—tóñƒÉ%0î/ëzAYO(4´ã°à®“	'ü] IÈÌ8hH¬05ò3Ú@x&nàí|T”≥≥)`ê.ìs6eYòD¶z∏åÆ•ÉJ—ìÙû.ÑÒ{GEbÅπ”ã°òãÜ2’◊{\$**˝æ@›Cêû-:zYHZIÙ‡5F]¶≤Y˙˘C™OÍAù¬⁄Û`x'¥.*9t'{ˇ(ÍöwP∂æ†—=¢*âÜ˙*¸xwrÂ‘*cÇûÃc|ÑDüì⁄Vóñ\rÜV.á0‚∆ôV§dà?“Ä¸Í,EÕù`T¶…6€à-ì≈Ïæ≈⁄éT[—ê™z©Ç.Ar±£ÕÄP¯∫nÉc=a‘9FÚnﬂ!Ÿu·ŒA©ﬁÉ0iPÛ¨îÓ∫J6e‰T]Vÿ[\rXÃ·aüñvçkı\n+Eàù·‹ï*\0∂~∂∆˘@g\"ÃNCI\$ç‡…åÉÄÍx@W√yº*vuDŸ\0ﬁvúÎåÜV\0ËV`GÁΩuµEÆ÷ï¬¡fìlòhí@Ô)0@öTï∞7ãÌ€¬ßRA Ÿ∑Ú¥3€ò–´/Q«]™,s÷{VRû±°éˆF´°èAòÑ<®v◊•Ó¥%@9Ç¿F¢’5tâ%÷+∫/¢8;æW—‰⁄«JÔ–o:÷Nˇ`¯	ïˇö¥hÏ¡{‹£ïÓ À‘ê8‘Eu™&∞W|…ÜÑâÆU˙&\r\"‘¡ªâ|-u«ÜÖNÎ∂:nc≤©fV≠ã¬ç√Ë#U20Â>\"Æ≤«>Ã`úk]Ó-Ø«x˘SÿÕá–¢©âÇÍc‚°ÛBíó}ÿ&`àÓr+E≠ì\$úyN˝å±b,Ü¥¥Wx ˛ù-9Â’r”,í¸`Â+úÔÌÀä˘íCú”)òò7€x\r¨˛WµfMåSRº\\Ëz¶ŸQ≤ÃìçîuA¨∫Í2é±ı4ÓL&ÀHi ¬µ∞≤πS\$)e≥ìÊg r»å©É\$]ZÎiYs§ı◊kWñn>µ7E1k8–d√rÛÆök¡˝¢ÎEﬁŸ€w¬wcméTyÅπïÎøaõ\$tx\rB¥˜=Åäˆ¢*î<»É†l°fÙKúëN/∂ºÅ	√l’·¸kHìı8†.ëë˘?f˜õ⁄ˇ„6Ü—áº{gi/\"‡@èñKõÒ@2„Áa|#,Z§±á	≥Òwàd¨ôì≤ÖºÂ6wô^&¡ÍtôÁúP±Ö•ƒ˘]¿ºõ.‡„⁄Ì°TÏÓkro¿âÅ˜\ro=ó%Ê◊h`:\0·±Çêˆ´î|Íä£´aì‘Æ6*:Õ”*á rO-^ñíÒÈn´ÕÛßM∆}Êª˜∆Ayaù±›\nÉu^Ïñ¿rnO\r±ª°`˛T~</∂wƒy˛}Ê:õ|£œ–˚÷Ã°6ª§◊¯ÆüvÓ\rc<∑b#˚‡ÙßÜÓñ\$˘sµÍ|ÁááV)´hãTC˘Ò(ƒΩÒ£»}");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:õågCIº‹\n0õÜSëÿa9ú≈S`∞«àìå&”(∞ n0òçÜQIÏ“fâõ\$±At^ sçG≤…tf6eåßyå ()L‰S¡¿P'èÖ¬·ÃR'Õfq]\"òs>	)‚ë`úH2äEq9à ?à*)âît'∞éœßÿ\n	\rÊs<åPi2IN∆ê*(=2ÃgX·∏Ë.3ôNÑY4ËB<íLó¸Ói©Ã•2›¥z=ö0H¯û–'∑Íåö√u∆tt:úç¬°»Íeπ]`pX9åﬁo5ögÚÛIú‹,2O4„ﬁ—ÖèM∆S∏(àaÖä#æƒ‡ÁíÔ¯|πGÇbËÙ¸xú^Z[«‰ôGºŒuTv™(“ùm@VÚ∏(Üº»bN<ä»`Ê‚X‰ù1…+å‰9J8¬2\r£K∂9hÂ	†¡Ë`ÖÅã∆ÎI8‰õ±Sè±„t˜2É+,£∆I∫„ £ÅpÊ9aËÿ≈< \\8CzÙ„\rä®^éÚ»]ƒ1\\7éC8_Ep^¬–¿ÈM1¿w\"'4féSX9ES|‰õÖ√k3ƒB@ ÊçXa=No4t7çÉdD3µpﬁ—‡Ê:)\\;∞†–‘\r)8H‘≈44Pc=\n‘!pd«’QN\rÃHÔ'çÙ∏ö2¢#\"’•m-∂b,«	ÉM.è°â-IK”)¿…e'éï\"É¥§>2X—≈ìeƒj:9^≤1cÑªç»ùé:Y…@ÀuÀ„ìõ4ÚX«&†“|£)—í¥±-KëxåÎ™¬SË1”Û\$‚°@\\Ö!x]\0å£’Œ¿¬Ò§·FÜCOƒ:‡1Ká≈*ÜF4aàªºkò˙»Kœöæëªˆ2l¨pÃ3J<»‚,2ÿ‡8#„ Ü’\rå‹·ö‹Ó Û§h¨Ñ∑·F±å›â2PÎËåäl(»\$÷∞\nJ€∑-ﬁ «∞cc~πFû‘Ór¯·tbﬁ˚Ωm{h.á{Étk€BµKc£z4åC™9Ö€´~>Éÿ˙»⁄`∆ìπC ¬s:‚›‘!c≈ŸÆ⁄µî*W…HX:WÃù;N‡†®j*é/(·_p3™°HI„Kl…n!tr„£G„≠∫§tCÉ	vÉ?m„§£æ†ü¢ñ\0CŸˆ®ßo‹•cbf6I˛˚'\rÌbÂ≈7hß`Ç»9ΩiÏd5íótaMË={…©ª`NoKâ	!d4–ÉzWXdmH∞ö*Ä∆€S ]œ–3&\0⁄∞	d%A¥-≤Ö	¬Ï(ÑêöêêŸ˘Q–}¯ÇËU!t7∞‰ãÜò>xãët{mYπÑ0ﬁ@^±Ä\"—=á≥Œ@t\r°∞Œƒ+Yß.º∑ºXø\n´I'KTüÄ^(ÏD.@ˆ‹¯++@º3ï“‘Xã	aEÏ!,ÅYÈˆ2-432‘åıMO‡÷I\$q%	ƒãG¶X9ôá¬[R\0nê¡–∏¬†PåJy\r ÚB»p\\H√pgS…º±Faejkó.4∏ÜC.^†yiëà9áPƒàe\"ŒîNYé¨¢BH√#8—B1\"∂j\\⁄©xá#æ‚@G 9Ü2®¬f.–åpsröTJ†x⁄kòñ»4KIl»f˘8z§•K»á>AKÒü°n^íÿ=&åÉAê¿*?'ç≥^%;Ó4‹Ä≥Üå9ç§Qíìh‚Náô>M =['évHI›JßëûìŸv∆‚íR tÉÛ<üî“≤≈^¢ºz‘¬âB^ˆh‚'µÇ…©–)-'#î§9JT¡)ÿ@jO!®⁄c,eòjñ§ñá@H,â¬ÿjàaô©vûZå>≠°“∑µ)E`\0\ná·TÅPÛ8L<âcï:FòÊâ\$\nÉÌÌúÜ√œCHm\"èjãy∑A€S∂†‹S™ûQÑúêŒŒ{T']Wù™U⁄)_L•òi¨màOöÇ•ËÑ˛‘P:g°{∏íZƒó¯.ˇ{î®áDh\nª—¡áa≠\r]9•t‹‡!XAΩ[»∞¶„óCúª◊Å\n:ïîhaúŒ⁄Â\"›¢a2LmÉ∑Õ\\	˚Îp5˜@˙´@m£Ï|Wˆï¿¬%»|uÆ·»+hK√L&¢œ ﬁ3¸.XW‹Ÿ∫∫»Ò*qÉ€c√Èá%ê.KøìÄ»A\rìxhπ‚®I\\Î®dÆHû∫5\n»q%‘v*œ„ÈrIa»0 \"]8êk,›ƒAıå{BÁ\\K/p<aÎüà1ñ0%ño2†œ√ô™¡–%ÜPÚ∞@! ‘iµ9ÃÁf1‘˘4˘åõ‡apÿéw°`ˇAXºup¡—Ω7Ú\\L∫°ü∞tøÑV”∆ìa\$‰ûW“ÅÊË‚„üË:èπ»àe}\rjCïXó∫]⁄˙¡=mî∂ï8À∫\$ûã˛é∑h”=øK7ê5±ôRéÉP∞{rråó,÷_ÎMzÁ%…ßIZó:igîy%HÏ5·ΩÇ§4Q¿fÿ¶«P˜°l˚˛õhÉ≈x≥‚ÍÖãv˘X&¶\$sEØ˙„0íç‰¸ÅÈ5ï∞ÌÌlW§d¿.DHå\$@ö\r@&\r¡à9á\0v•7!Á»o”ÖêŒ√¡Óˇâ5·Ó)#X»i]Œrûoπ~∆ÀÈwêPÍ¬õîQ€=Ú‡ÁqCÌ«Á◊)´=„#óÅ@h'Aòtb;ô€0YDh'éú\nVW}(2Ü`Vƒzv%†t‰\r’ïe®∏∑óÏæp.ÎÅõêÙ∏ì6H9ç°=;n°8C=æ	˛˘˜˝qÄÅ@a+∏äÜk÷0aK·ò3Epô◊C†+ÚAø EpÆßC@>ÚX±˚‚Ô'ÂLóüä{µÉXz¥–oD¡ô%ásPñW:[=ﬂv0í?ﬁ‹∑,%û¿ú{\"Ì.·®.YIÙB‹¬	≥\nWpV¬)µæµq…A£«MªVºÂ5ü˜IˇŸ«P˝öŒøÀéæﬂËâ¡(˚b.∂\$«’˝Ú[“öÕjÎ¿@ØÍh\nFù-4Ì8nj¨’+VM‡xnjæ¶mb\$∞ ®¨ı™\n∂»÷'¢~‡∂ Z@∫Ä∂é†V‚∫ÄL\"„ÜpÜÿ5ÄO,®êç\0Kπ\0äû™-6•\r:îp’Db’ên’–\$∂mm\$i	)˛Oê6(€–API–P+–VHpn®ß4?B‡M∂∑„JFêæ.èˆÙÄË·0–·+‘iÖj« P˛´(Ø&Êª„aå⁄%l]'‹ÔÏ^@(ú5ÉN fsé†—cÙ†bz √œÂ>Ô¬Øx≤∞\0k Èƒê\r<aéXÃGÈ®{\roL≠åx«&œÜ’\$éHjƒ®1Ä‹	®û<Ál-å˙≥è\rÀGKOê—0ïq+c	PÒj\r§Ã∂Á≠jãâ¡áΩØbdÒ¢6¢«\0 sÇ‡¢éÒf¡ –∂±zΩƒj>´§Jû∞‚é˝HÆ±'‚‚3ÍèÖ(F¶—Çﬂ§–z™`O qê•ÀXíç`∂r\r Ï1,üœøgk lv≠Ã|+∞ÚÊkfÏ'Ú=R@Æ4Î6€` -∫.i~4Ú#≈<\$≤R«|u2N;Bn<í-#Ï{%àà˚âb=‚Â#ÃÔ(»J1b%g∏º„zãê¸ãËG2´1^8wÚÚb^%/ú ÔæG≠*Á†7D\0^ër∫cÑép\níŒL,ÄÛ0˜+ Xrß\$  8Ñ◊-)+(DÇ”¿‘Ê‡–\nÑ¡íb¨ì©s1Ï”2G\\{‡¬.I~`á*≥Œl]±ìNÕ—± X.#%\$K¿¡S'3Ã”Ã6É\$CrâC0BÙ\r”--H|Üìà »Ü»,û\"é57”í¥©äòÓT…Û•)ÓnâéƒÌƒ∏Ì√/2˜Lùƒa7œ2K„1/d\"ˇ4SHÔÚÊÕ‘Õå‹Ú§¬1Û™ô\0O6R8|S|+©r¡”≤ú”–‡æ\$O\re(ä‡®\r\"8âÁ≠”éës¶\rß©2 ë!*ÚmNTQÚ¸ªê¯]jk+15”R†hÊ1ÛQÄz`pÚ®R≠E-S““S\r1@vo.t‘TUFqE‚–;g\\Á\"DQ„`‰†Ê±sIŒv`Ø˛0Û•	+KÄ pTäñ)|Ñl‡ÒøÁ8%'ÁLüLJ@\r&+® Ú‘É≤Xì‰¿ Â&Ât∂·\\*'4«ÂN∆£O\0∑OT˘Db\r1í’PL\0ú≤†…Û∫gMƒÃ≈‡Õ\"O>Ãﬁ¿C<tJÙN∫-:<‡‰ô\"V]`¶/Bå’*‹ß˜-£w<1fõMÿ¸Úíq±8ú-¢o®~pK¿◊dã	¢ŒÒ\nÒ,4«WF¡\$∆∫nl\0Ÿ≠àLö\nâÖÆmÆ∏)ÅZÄœZ…Üòı¶^@Œ	†¬.’Ìj◊D˝]K`û†˙òt\rØå'\$^S'‡O]ÈÊS–¥ÿìÙ5„†§b%ª\\’¿\$ÇL◊Vau´ZÔ◊UΩ]‡’‡|EMÜôïﬂ]iÈ]µ 9∂1d	f.eP\rÄ‡!≈s)Uj Ò∂W)\"¸&BS≈ï'√~¬vps	_'_fåuT5G0˛5r<vzl‡ÈhÙr’˘§YiqMD∏˝UqfØ‘ú/Íÿ‰ñ;oÛ\r˝T‰øÔ˛ó`{\0r™”î\n•ãU!–’µˇ\"iÔ(á£P„ƒv∂»“¢Ãi0⁄i∞·O‹˙Úé˝æ≤±// ¬\rU“r\"•ÓQ†≈\n\0÷:¿ÒE∆n”kÄ #~RÊ\"ªenã ËÉtJÑ„∂;∑P	óUuóCtg¨ tL¿Ç8d\0û@‘l`w◊~ óÉxwä bé	®åJ ÊÛÉvn\nÄ†, u; ◊uu≈. V<o&|1ˆ◊∆Q|e/|¿ÊHbQs∑>w]7 70„†‰„Ó Ú!\"Àê4\0zWË2 D∆\\Wó<2\"™Ä_ xwÔ|áqJå&¬eÇ∑ÚÊ¯24\"qXê:d6à¯+¢‚„-ÕÉò/É—»Î‚”Ñ£[V7¿1‡ﬂ\r«c¬–\n\0û\n`©J é∏~+ó'1f<m˜n®Vôu∑pPD>!Çéâ√G\0[aßô\r®vÓ\0^\0ZK Ó®~∑&#„å5Ä…Ö7øwóâ%/âƒÓ(‡∞∏ò®F‘Ø?`ªz«%vÿjy¯já\$w/óﬁ!fqT,∂ò”âY7ÛI*j‡ºF,üyRÂK~r†ŸrËèíß_ÖWÌ|x;`‹·é‚„çÉênn˘<'%xÂ—Ä≥8ÇﬂÄ ÌÄb_Ä¢J ÂÅ\"†Ûèh`Ev\\ÄÀÅ¯#\"ÿ<xY~>4ŸõÉ…ñŸÑxdL»˚ÓFq9TlÂjèV#q-Ÿ=qŸD2Mﬁãòä∆ud+rTtg¡ì…¬c¬fn¢éxπ^@ôd<˘jy20±F\"àÔƒã¥ãësGpq¢hì*F≠Ç†åÑœ™Ñ¿YÄ‚;9så≥ôÏgΩƒ\náÎLìçQIS!Û°'ÏﬁáÁ#LÃ◊¬n}BXZw<,Õ¨d9 ≠ÇFÄ^\r1®zıÆÚYŸŸúcw;”@ly B™¬¿ÑfZ`ﬁì˙Â@˘ßÇIß⁄Äül!®q»ÏÒ¨#O£íusdü2…å† \n†§	(ú\rπdGF†™@ÿ»≈⁄›Æ\0ﬂÆE∞1”ﬂN3¯º¬tÎ¡Y«–%@u®ßU{¶mû∆=1¿ﬁDBéÕ>a&ƒ…Õ\n–◊\0BÓ|ö®:I+‡–,≥7'öê8ç¿∏‡\\PÆ,\"™-sc…sv˜úG£ù˜'ûWûöù\$=}ÿ[~ YüycYi2sw≥4\rK∫.‰PÖU@ËÁèú\nAi2◊ŸÇπY~'Amqà”öÿ,4<ö˙sòsÚÚâ¨úÄ»#Ã@¡`X„\rÕ≤≥ì—1E=G4vG\0R⁄Çœ◊'íY@ç7:¡º¡@fP¡Ã V{˜ø´é!\"z€Ù7M≤o[ƒD!*ñ«W˘ 2jó2g8çÒ¶ü|L\$D÷iG}ÏGRb!rÓÇ”&-3‘£mı»ôÇ\r0˜qh1Ki,|»e÷∑zÍóHÙYFÄd˙iS3Î<∫cí Õ«’¿ìc£.n¿‰iBx-rîvï≈YJ„ŸNºj!(ìHfÁŸÓcÑg) ûÛ£%œCo[È(ëXÇG9–ÏäB1›ŒDGñºèïeL'8ıe?]<O∑#–ËäGTıÄbÄXQ *†‡√\rp¡v∏ªÑ\n<ı\$˚Y\n:ô±∏öm˝`Ë@◊OÎ\0ÓùUÊ%Ù5\0∏†`\0ÇE}#M3!ã!GútÍwR¶BﬁŸVºì≥ú˛˚›π¶¿I‹x=¿§˛C«‹\"q^ƒ\nÄﬁÂE-e·‘#ÏcùÏÄ≤ˇ˝ÿV“˝;fX≤<=÷˝\0dOØçﬁÔñº‡Úì·(Æ•kﬁ[\0˛(ûV§Y›É«œù˛®']•ÇÂ–¸WŒ∞ø–˜\rÏ}ÕÁ,<hØf@¶ò…ê	¨PäÜ3©Å;R£’º\\†eâëù◊∆ﬁ]‰Èb´≤¿WØ#YØz„Æ{‰√ÆÂÕûyT¶ªî‚ªôñº—gCıÎy˚πß]“µÑ?^©¢3@◊VıæÃœ^“òÊ8óÀTËW>ÕÓb\r„>Óù]∑ª¨—€⁄:˛ó‹~ÙÓ=Œ!}”i'‡]‹æ2(˘\nFg™†X©Å∫Xn}‚#‹óúöÒ“n`ò\r‰?tÒ XQ…ëıLZny<ÓT\$cˆ·\\ÁπO–ÄÓjÓx)ˆŸL‰ñCÂ◊Ê\$Ø%^µÔ_')jéÓgüËyﬁÓ}tÂ{Ö<Û««]ÙG||©ÍS<b‚ì«¯Ë‰≈Î≥&<ü}QË¥˜ÿ•Wiw	Âøƒ Û1Î/ä\r%Ñ1•Äx˙√ï? ˇài=3ÚÑáèÖ…`ÎˆzI◊NÍu◊Z°EÕ>~®Ö¥?«Œ§n≤˚ÔﬁNr\0Ç–\$oj7Z&é†™∂π9S	tU`¢tc∏*¶å7Ås\r≈|wÁõï N˙<pOÄÿ\"cò©aæ7À–\0Ä8<Õ:ƒXyªv–&†íîµ†Fnh\"√…F†Ä∞npX∫nDwÅœñqmhvÅI⁄RÑ@≠¡ãr%Z›‚SFÉº…Êá*y∞™õÆ(Q∂çÂ≈P(ê\nFl˙1ËA&pLÉ≥Œ Ú|eπ<ÌW°Ç¸¨ó·íeBÉŸ0Fò`mãu∞π\nÎœXKñä•AôÇ≈\\¬∫úÀ‰Nj}Ôa@#d®¢˙f&\0àu”ÂÑ*	D» ≤—ì«‰(!Å	x◊°”Å¬‰îÉ∑Ç\$+Q5\nß5Ño0≥8\$-°pX]B¢ Ö¸ ·ÇA8bF–KÜD5¬¬ò#CV„9Ü¬'a¥o–—∑Eñ©ûà¸”ôyàÌƒÜç%0ZHﬁh3ªQ7ç'FI+ä∑X88‡rÀ\"\$9≠’§L≈ÅÜ¢âˇTÛ‹ù.‡=\"¿Bâ.NFéòL¬î}Õú ê@ëÅ»¶°,â∑ÖîËÒfúlXÇ‹X∑‚`jòí\$«éâ@Cp©aö¿.%ÉíBÄ!4=`Ñ*9|I‚S‚ººÂäPêT(}Sˆ*C5oZ^OÓ∂∞Ωœ\0˘˛\"¬nòBptÇh°BRÙn=\"Ä2oâ¯œﬁµê˜éxF)Ä–‹eîMEÒ7ä±ﬂBKh¡\"Ê*«¡å::KÓqXaßîƒ[,‡a‹\0ÔG\$m∞@a˙îT—≈âÀÊnçò¿Ú‡Ñ—®ÈÃQ?⁄ﬁàR‡¬∏åypÂqRôÓ™¶3ΩÄ1k”[ﬁ¢◊Ùµè–Óp@Îl@z€5Óü®∑iìR∞£≈J-fúT!‡y∏v≈(™ÛA1„L5Ko„(2Â+x¬q j4xUÕEƒ=∫9Qµ9±Œ#q®Ú™.-Ωz*‰ﬁö(ﬁµÒØ¡€l|RNƒK‡ãbÖ]YMd…¡íÎ˙yÉöxˇ,q Rb'cﬂÛàHA,∞z„,›)!HÊGº¯ë—¨uæ#¿»ÅI±ÔIRQF¢kÄ0ã\0ÚR-Ec=£–WÚ°ú'Q∂9ºsIc†÷5±Í\r}zêıè%6∫8—»fc3–…Aú`.d◊");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0!Ñè©ÀÌMÒÃ*)æo˙Ø) qï°eàµÓ#ƒÚLÀ\0;";break;case"cross.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0#Ñè©ÀÌ#\na÷Fo~y√.Å_waî·1Á±JÓG¬L◊6]\0\0;";break;case"up.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0 Ñè©ÀÌMQN\nÔ}Ùûa8äyöa≈∂Æ\0«Ú\0;";break;case"down.gif":echo"GIF89a\0\0Å\0001ÓÓÓ\0\0Äôôô\0\0\0!˘\0\0\0,\0\0\0\0\0\0 Ñè©ÀÌMÒÃ*)æ[W˛\\¢«L&Ÿú∆∂ï\0«Ú\0;";break;case"arrow.gif":echo"GIF89a\0\n\0Ä\0\0ÄÄÄˇˇˇ!˘\0\0\0,\0\0\0\0\0\n\0\0Çiñ±ãûî™”≤ﬁª\0\0;";break;}}exit;}function
connection(){global$f;return$f;}function
adminer(){global$b;return$b;}function
idf_unescape($gc){$uc=substr($gc,-1);return
str_replace($uc.$uc,$uc,substr($gc,1,-1));}function
escape_string($W){return
substr(q($W),1,-1);}function
number($W){return
preg_replace('~[^0-9]+~','',$W);}function
remove_slashes($od,$Hb=false){if(get_magic_quotes_gpc()){while(list($x,$W)=each($od)){foreach($W
as$w=>$V){unset($od[$x][$w]);if(is_array($V)){$od[$x][stripslashes($w)]=$V;$od[]=&$od[$x][stripslashes($w)];}else$od[$x][stripslashes($w)]=($Hb?$V:stripslashes($V));}}}}function
bracket_escape($gc,$ua=false){static$pe=array(':'=>':1',']'=>':2','['=>':3');return
strtr($gc,($ua?array_flip($pe):$pe));}function
charset($f){return(version_compare($f->server_info,"5.5.3")>=0?"utf8mb4":"utf8");}function
h($R){return
str_replace("\0","&#0;",htmlspecialchars($R,ENT_QUOTES,'utf-8'));}function
nbsp($R){return(trim($R)!=""?h($R):"&nbsp;");}function
nl_br($R){return
str_replace("\n","<br>",$R);}function
checkbox($D,$X,$Fa,$sc="",$Tc="",$Ia=""){$L="<input type='checkbox' name='$D' value='".h($X)."'".($Fa?" checked":"").($Tc?' onclick="'.h($Tc).'"':'').">";return($sc!=""||$Ia?"<label".($Ia?" class='$Ia'":"").">$L".h($sc)."</label>":$L);}function
optionlist($Xc,$Hd=null,$De=false){$L="";foreach($Xc
as$w=>$V){$Yc=array($w=>$V);if(is_array($V)){$L.='<optgroup label="'.h($w).'">';$Yc=$V;}foreach($Yc
as$x=>$W)$L.='<option'.($De||is_string($x)?' value="'.h($x).'"':'').(($De||is_string($x)?(string)$x:$W)===$Hd?' selected':'').'>'.h($W);if(is_array($V))$L.='</optgroup>';}return$L;}function
html_select($D,$Xc,$X="",$Sc=true){if($Sc)return"<select name='".h($D)."'".(is_string($Sc)?' onchange="'.h($Sc).'"':"").">".optionlist($Xc,$X)."</select>";$L="";foreach($Xc
as$x=>$W)$L.="<label><input type='radio' name='".h($D)."' value='".h($x)."'".($x==$X?" checked":"").">".h($W)."</label>";return$L;}function
select_input($c,$Xc,$X="",$gd=""){return($Xc?"<select$c><option value=''>$gd".optionlist($Xc,$X,true)."</select>":"<input$c size='10' value='".h($X)."' placeholder='$gd'>");}function
confirm(){return" onclick=\"return confirm('".'Are you sure?'."');\"";}function
print_fieldset($r,$wc,$He=false,$Tc=""){echo"<fieldset><legend><a href='#fieldset-$r' onclick=\"".h($Tc)."return !toggle('fieldset-$r');\">$wc</a></legend><div id='fieldset-$r'".($He?"":" class='hidden'").">\n";}function
bold($Aa,$Ia=""){return($Aa?" class='active $Ia'":($Ia?" class='$Ia'":""));}function
odd($L=' class="odd"'){static$q=0;if(!$L)$q=-1;return($q++%2?$L:'');}function
js_escape($R){return
addcslashes($R,"\r\n'\\/");}function
json_row($x,$W=null){static$Ib=true;if($Ib)echo"{";if($x!=""){echo($Ib?"":",")."\n\t\"".addcslashes($x,"\r\n\"\\/").'": '.($W!==null?'"'.addcslashes($W,"\r\n\"\\/").'"':'undefined');$Ib=false;}else{echo"\n}\n";$Ib=true;}}function
ini_bool($kc){$W=ini_get($kc);return(preg_match('~^(on|true|yes)$~i',$W)||(int)$W);}function
sid(){static$L;if($L===null)$L=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$L;}function
set_password($Y,$P,$U,$H){$_SESSION["pwds"][$Y][$P][$U]=($_COOKIE["adminer_key"]&&is_string($H)?array(encrypt_string($H,$_COOKIE["adminer_key"])):$H);}function
get_password(){$L=get_session("pwds");if(is_array($L))$L=($_COOKIE["adminer_key"]?decrypt_string($L[0],$_COOKIE["adminer_key"]):false);return$L;}function
q($R){global$f;return$f->quote($R);}function
get_vals($J,$d=0){global$f;$L=array();$K=$f->query($J);if(is_object($K)){while($M=$K->fetch_row())$L[]=$M[$d];}return$L;}function
get_key_vals($J,$g=null,$ie=0){global$f;if(!is_object($g))$g=$f;$L=array();$g->timeout=$ie;$K=$g->query($J);$g->timeout=0;if(is_object($K)){while($M=$K->fetch_row())$L[$M[0]]=$M[1];}return$L;}function
get_rows($J,$g=null,$k="<p class='error'>"){global$f;$Sa=(is_object($g)?$g:$f);$L=array();$K=$Sa->query($J);if(is_object($K)){while($M=$K->fetch_assoc())$L[]=$M;}elseif(!$K&&!is_object($g)&&$k&&defined("PAGE_HEADER"))echo$k.error()."\n";return$L;}function
unique_array($M,$t){foreach($t
as$s){if(preg_match("~PRIMARY|UNIQUE~",$s["type"])){$L=array();foreach($s["columns"]as$x){if(!isset($M[$x]))continue
2;$L[$x]=$M[$x];}return$L;}}}function
escape_key($x){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$x,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($x);}function
where($Z,$m=array()){global$f,$v;$L=array();foreach((array)$Z["where"]as$x=>$W){$x=bracket_escape($x,1);$d=escape_key($x);$L[]=$d.(($v=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$W))||$v=="mssql"?" LIKE ".q(addcslashes($W,"%_\\")):" = ".unconvert_field($m[$x],q($W)));if($v=="sql"&&preg_match('~char|text~',$m[$x]["type"])&&preg_match("~[^ -@]~",$W))$L[]="$d = ".q($W)." COLLATE ".charset($f)."_bin";}foreach((array)$Z["null"]as$x)$L[]=escape_key($x)." IS NULL";return
implode(" AND ",$L);}function
where_check($W,$m=array()){parse_str($W,$Ea);remove_slashes(array(&$Ea));return
where($Ea,$m);}function
where_link($q,$d,$X,$Vc="="){return"&where%5B$q%5D%5Bcol%5D=".urlencode($d)."&where%5B$q%5D%5Bop%5D=".urlencode(($X!==null?$Vc:"IS NULL"))."&where%5B$q%5D%5Bval%5D=".urlencode($X);}function
convert_fields($e,$m,$O=array()){$L="";foreach($e
as$x=>$W){if($O&&!in_array(idf_escape($x),$O))continue;$oa=convert_field($m[$x]);if($oa)$L.=", $oa AS ".idf_escape($x);}return$L;}function
cookie($D,$X,$zc=2592000){global$aa;$dd=array($D,(preg_match("~\n~",$X)?"":$X),($zc?time()+$zc:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$dd[]=true;return
call_user_func_array('setcookie',$dd);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($x){return$_SESSION[$x][DRIVER][SERVER][$_GET["username"]];}function
set_session($x,$W){$_SESSION[$x][DRIVER][SERVER][$_GET["username"]]=$W;}function
auth_url($Y,$P,$U,$h=null){global$jb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($jb))."|username|".($h!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Y!="server"||$P!=""?urlencode($Y)."=".urlencode($P)."&":"")."username=".urlencode($U).($h!=""?"&db=".urlencode($h):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($_,$B=null){if($B!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($_!==null?$_:$_SERVER["REQUEST_URI"]))][]=$B;}if($_!==null){if($_=="")$_=".";header("Location: $_");exit;}}function
query_redirect($J,$_,$B,$wd=true,$zb=true,$Bb=false,$he=""){global$f,$k,$b;if($zb){$Rd=microtime(true);$Bb=!$f->query($J);$he=format_time($Rd);}$Qd="";if($J)$Qd=$b->messageQuery($J,$he);if($Bb){$k=error().$Qd;return
false;}if($wd)redirect($_,$B.$Qd);return
true;}function
queries($J){global$f;static$rd=array();static$Rd;if(!$Rd)$Rd=microtime(true);if($J===null)return
array(implode("\n",$rd),format_time($Rd));$rd[]=(preg_match('~;$~',$J)?"DELIMITER ;;\n$J;\nDELIMITER ":$J).";";return$f->query($J);}function
apply_queries($J,$ce,$wb='table'){foreach($ce
as$S){if(!queries("$J ".$wb($S)))return
false;}return
true;}function
queries_redirect($_,$B,$wd){list($rd,$he)=queries(null);return
query_redirect($rd,$_,$B,$wd,false,!$wd,$he);}function
format_time($Rd){return
sprintf('%.3f s',max(0,microtime(true)-$Rd));}function
remove_from_uri($cd=""){return
substr(preg_replace("~(?<=[?&])($cd".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($G,$Ya){return" ".($G==$Ya?$G+1:'<a href="'.h(remove_from_uri("page").($G?"&page=$G".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($G+1)."</a>");}function
get_file($x,$bb=false){$Eb=$_FILES[$x];if(!$Eb)return
null;foreach($Eb
as$x=>$W)$Eb[$x]=(array)$W;$L='';foreach($Eb["error"]as$x=>$k){if($k)return$k;$D=$Eb["name"][$x];$ne=$Eb["tmp_name"][$x];$Ta=file_get_contents($bb&&preg_match('~\\.gz$~',$D)?"compress.zlib://$ne":$ne);if($bb){$Rd=substr($Ta,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Rd,$xd))$Ta=iconv("utf-16","utf-8",$Ta);elseif($Rd=="\xEF\xBB\xBF")$Ta=substr($Ta,3);$L.=$Ta."\n\n";}else$L.=$Ta;}return$L;}function
upload_error($k){$Ec=($k==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($k?'Unable to upload a file.'.($Ec?" ".sprintf('Maximum allowed file size is %sB.',$Ec):""):'File does not exist.');}function
repeat_pattern($I,$xc){return
str_repeat("$I{0,65535}",$xc/65535)."$I{0,".($xc%65535)."}";}function
is_utf8($W){return(preg_match('~~u',$W)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$W));}function
shorten_utf8($R,$xc=80,$Xd=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$xc).")($)?)u",$R,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$xc).")($)?)",$R,$A);return
h($A[1]).$Xd.(isset($A[2])?"":"<i>...</i>");}function
format_number($W){return
strtr(number_format($W,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($W){return
preg_replace('~[^a-z0-9_]~i','-',$W);}function
hidden_fields($od,$ic=array()){while(list($x,$W)=each($od)){if(!in_array($x,$ic)){if(is_array($W)){foreach($W
as$w=>$V)$od[$x."[$w]"]=$V;}else
echo'<input type="hidden" name="'.h($x).'" value="'.h($W).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($S,$Cb=false){$L=table_status($S,$Cb);return($L?$L:array("Name"=>$S));}function
column_foreign_keys($S){global$b;$L=array();foreach($b->foreignKeys($S)as$Nb){foreach($Nb["source"]as$W)$L[$W][]=$Nb;}return$L;}function
enum_input($se,$c,$l,$X,$sb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Bc);$L=($sb!==null?"<label><input type='$se'$c value='$sb'".((is_array($X)?in_array($sb,$X):$X===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($Bc[1]as$q=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?$X==$q+1:(is_array($X)?in_array($q+1,$X):$X===$W));$L.=" <label><input type='$se'$c value='".($q+1)."'".($Fa?' checked':'').'>'.h($b->editVal($W,$l)).'</label>';}return$L;}function
input($l,$X,$o){global$f,$ue,$b,$v;$D=h(bracket_escape($l["field"]));echo"<td class='function'>";if(is_array($X)&&!$o){$na=array($X);if(version_compare(PHP_VERSION,5.4)>=0)$na[]=JSON_PRETTY_PRINT;$X=call_user_func_array('json_encode',$na);$o="json";}$_d=($v=="mssql"&&$l["auto_increment"]);if($_d&&!$_POST["save"])$o=null;$Tb=(isset($_GET["select"])||$_d?array("orig"=>'original'):array())+$b->editFunctions($l);$c=" name='fields[$D]'";if($l["type"]=="enum")echo
nbsp($Tb[""])."<td>".$b->editInput($_GET["edit"],$l,$c,$X);else{$Ib=0;foreach($Tb
as$x=>$W){if($x===""||!$W)break;$Ib++;}$Sc=($Ib?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($l["field"])))."]']; if ($Ib > f.selectedIndex) f.selectedIndex = $Ib;\" onkeyup='keyupChange.call(this);'":"");$c.=$Sc;$Yb=(in_array($o,$Tb)||isset($Tb[$o]));echo(count($Tb)>1?"<select name='function[$D]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($Tb,$o===null||$Yb?$o:"")."</select>":nbsp(reset($Tb))).'<td>';$mc=$b->editInput($_GET["edit"],$l,$c,$X);if($mc!="")echo$mc;elseif($l["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$l["length"],$Bc);foreach($Bc[1]as$q=>$W){$W=stripcslashes(str_replace("''","'",$W));$Fa=(is_int($X)?($X>>$q)&1:in_array($W,explode(",",$X),true));echo" <label><input type='checkbox' name='fields[$D][$q]' value='".(1<<$q)."'".($Fa?' checked':'')."$Sc>".h($b->editVal($W,$l)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'$Sc>";elseif(($ee=preg_match('~text|lob~',$l["type"]))||preg_match("~\n~",$X)){if($ee&&$v!="sqlite")$c.=" cols='50' rows='12'";else{$N=min(12,substr_count($X,"\n")+1);$c.=" cols='30' rows='$N'".($N==1?" style='height: 1.2em;'":"");}echo"<textarea$c>".h($X).'</textarea>';}elseif($o=="json")echo"<textarea$c cols='50' rows='12' class='jush-js'>".h($X).'</textarea>';else{$Gc=(!preg_match('~int~',$l["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$l["length"],$A)?((preg_match("~binary~",$l["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$l["unsigned"]?1:0)):($ue[$l["type"]]?$ue[$l["type"]]+($l["unsigned"]?0:1):0));if($v=='sql'&&$f->server_info>=5.6&&preg_match('~time~',$l["type"]))$Gc+=7;echo"<input".((!$Yb||$o==="")&&preg_match('~(?<!o)int~',$l["type"])?" type='number'":"")." value='".h($X)."'".($Gc?" maxlength='$Gc'":"").(preg_match('~char|binary~',$l["type"])&&$Gc>20?" size='40'":"")."$c>";}}}function
process_input($l){global$b;$gc=bracket_escape($l["field"]);$o=$_POST["function"][$gc];$X=$_POST["fields"][$gc];if($l["type"]=="enum"){if($X==-1)return
false;if($X=="")return"NULL";return+$X;}if($l["auto_increment"]&&$X=="")return
null;if($o=="orig")return($l["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($l["field"]):false);if($o=="NULL")return"NULL";if($l["type"]=="set")return
array_sum((array)$X);if($o=="json"){$o="";$X=json_decode($X,true);if(!is_array($X))return
false;return$X;}if(preg_match('~blob|bytea|raw|file~',$l["type"])&&ini_bool("file_uploads")){$Eb=get_file("fields-$gc");if(!is_string($Eb))return
false;return
q($Eb);}return$b->processInput($l,$X,$o);}function
fields_from_edit(){global$i;$L=array();foreach((array)$_POST["field_keys"]as$x=>$W){if($W!=""){$W=bracket_escape($W);$_POST["function"][$W]=$_POST["field_funs"][$x];$_POST["fields"][$W]=$_POST["field_vals"][$x];}}foreach((array)$_POST["fields"]as$x=>$W){$D=bracket_escape($x,1);$L[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($x==$i->primary),);}return$L;}function
search_tables(){global$b,$f;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$Qb=false;foreach(table_status('',true)as$S=>$T){$D=$b->tableName($T);if(isset($T["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($S,$_POST["tables"]))){$K=$f->query("SELECT".limit("1 FROM ".table($S)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($S),array())),1));if(!$K||$K->fetch_row()){if(!$Qb){echo"<ul>\n";$Qb=true;}echo"<li>".($K?"<a href='".h(ME."select=".urlencode($S)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>\n":"$D: <span class='error'>".error()."</span>\n");}}}echo($Qb?"</ul>":"<p class='message'>".'No tables.')."\n";}function
dump_headers($fc,$Jc=false){global$b;$L=$b->dumpHeaders($fc,$Jc);$bd=$_POST["output"];if($bd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($fc).".$L".($bd!="file"&&!preg_match('~[^0-9a-z]~',$bd)?".$bd":""));session_write_close();ob_flush();flush();return$L;}function
dump_csv($M){foreach($M
as$x=>$W){if(preg_match("~[\"\n,;\t]~",$W)||$W==="")$M[$x]='"'.str_replace('"','""',$W).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$M)."\r\n";}function
apply_sql_function($o,$d){return($o?($o=="unixepoch"?"DATETIME($d, '$o')":($o=="count distinct"?"COUNT(DISTINCT ":strtoupper("$o("))."$d)"):$d);}function
get_temp_dir(){$L=ini_get("upload_tmp_dir");if(!$L){if(function_exists('sys_get_temp_dir'))$L=sys_get_temp_dir();else{$Fb=@tempnam("","");if(!$Fb)return
false;$L=dirname($Fb);unlink($Fb);}}return$L;}function
password_file($Va){$Fb=get_temp_dir()."/adminer.key";$L=@file_get_contents($Fb);if($L||!$Va)return$L;$Rb=@fopen($Fb,"w");if($Rb){chmod($Fb,0660);$L=rand_string();fwrite($Rb,$L);fclose($Rb);}return$L;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($W,$z,$l,$fe){global$b,$aa;if(is_array($W)){$L="";foreach($W
as$w=>$V)$L.="<tr>".($W!=array_values($W)?"<th>".h($w):"")."<td>".select_value($V,$z,$l,$fe);return"<table cellspacing='0'>$L</table>";}if(!$z)$z=$b->selectLink($W,$l);if($z===null){if(is_mail($W))$z="mailto:$W";if($pd=is_url($W))$z=(($pd=="http"&&$aa)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$W:"$pd://www.adminer.org/redirect/?url=".urlencode($W));}$L=$b->editVal($W,$l);if($L!==null){if($L==="")$L="&nbsp;";elseif(!is_utf8($L))$L="\0";elseif($fe!=""&&is_shortable($l))$L=shorten_utf8($L,max(0,+$fe));else$L=h($L);}return$b->selectVal($L,$z,$l,$W);}function
is_mail($pb){$pa='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$ib='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$I="$pa+(\\.$pa+)*@($ib?\\.)+$ib";return
is_string($pb)&&preg_match("(^$I(,\\s*$I)*\$)i",$pb);}function
is_url($R){$ib='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($ib?\\.)+$ib(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$R,$A)?strtolower($A[1]):"");}function
is_shortable($l){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$l["type"]);}function
count_rows($S,$Z,$u,$p){global$v;$J=" FROM ".table($S).($Z?" WHERE ".implode(" AND ",$Z):"");return($u&&($v=="sql"||count($p)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$p).")$J":"SELECT COUNT(*)".($u?" FROM (SELECT 1$J$Ub) x":$J));}function
slow_query($J){global$b,$oe;$h=$b->database();$ie=$b->queryTimeout();if(support("kill")&&is_object($g=connect())&&($h==""||$g->select_db($h))){$rc=$g->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$oe,'&kill=',$rc,'\');
}, ',1000*$ie,');
</script>
';}else$g=null;ob_flush();flush();$L=@get_key_vals($J,$g,$ie);if($g){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($L);}function
get_token(){$ud=rand(1,1e6);return($ud^$_SESSION["token"]).":$ud";}function
verify_token(){list($oe,$ud)=explode(":",$_POST["token"]);return($ud^$_SESSION["token"])==$oe;}function
lzw_decompress($za){$gb=256;$_a=8;$Ka=array();$Ad=0;$Bd=0;for($q=0;$q<strlen($za);$q++){$Ad=($Ad<<8)+ord($za[$q]);$Bd+=8;if($Bd>=$_a){$Bd-=$_a;$Ka[]=$Ad>>$Bd;$Ad&=(1<<$Bd)-1;$gb++;if($gb>>$_a)$_a++;}}$fb=range("\0","\xFF");$L="";foreach($Ka
as$q=>$Ja){$ob=$fb[$Ja];if(!isset($ob))$ob=$Le.$Le[0];$L.=$ob;if($q)$fb[]=$Le.$ob[0];$Le=$ob;}return$L;}function
on_help($Pa,$Od=0){return" onmouseover='helpMouseover(this, event, ".h($Pa).", $Od);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$m,$M,$Be){global$b,$v,$oe,$k;$be=$b->tableName(table_status1($a,true));page_header(($Be?'Edit':'Insert'),$k,array("select"=>array($a,$be)),$be);if($M===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$m)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($m
as$D=>$l){echo"<tr><th>".$b->fieldName($l);$cb=$_GET["set"][bracket_escape($D)];if($cb===null){$cb=$l["default"];if($l["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$cb,$xd))$cb=$xd[1];}$X=($M!==null?($M[$D]!=""&&$v=="sql"&&preg_match("~enum|set~",$l["type"])?(is_array($M[$D])?array_sum($M[$D]):+$M[$D]):$M[$D]):(!$Be&&$l["auto_increment"]?"":(isset($_GET["select"])?false:$cb)));if(!$_POST["save"]&&is_string($X))$X=$b->editVal($X,$l);$o=($_POST["save"]?(string)$_POST["function"][$D]:($Be&&$l["on_update"]=="CURRENT_TIMESTAMP"?"now":($X===false?null:($X!==null?'':'NULL'))));if(preg_match("~time~",$l["type"])&&$X=="CURRENT_TIMESTAMP"){$X="";$o="now";}input($l,$X,$o);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($m){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Be?'Save and continue edit'."' onclick='return !ajaxForm(this.form, \"".'Saving'.'...", this)':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n";}echo($Be?"<input type='submit' name='delete' value='".'Delete'."'".confirm().">\n":($_POST||!$m?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$oe,'">
</form>
';}global$b,$f,$jb,$mb,$ub,$k,$Tb,$Vb,$aa,$lc,$v,$ba,$tc,$Rc,$fd,$Ud,$Zb,$oe,$re,$ue,$Ae,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$dd=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$dd[]=true;call_user_func_array('session_set_cookie_params',$dd);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Hb);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);function
get_lang(){return'en';}function
lang($qe,$Oc=null){if(is_array($qe)){$id=($Oc==1?0:1);$qe=$qe[$id];}$qe=str_replace("%d","%s",$qe);$Oc=format_number($Oc);return
sprintf($qe,$Oc);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$id=array_search("SQL",$b->operators);if($id!==false)unset($b->operators[$id]);}function
dsn($kb,$U,$H){try{parent::__construct($kb,$U,$H);}catch(Exception$xb){auth_error($xb->getMessage());}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($J,$ve=false){$K=parent::query($J);$this->error="";if(!$K){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($K);return$K;}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result($K=null){if(!$K){$K=$this->_result;if(!$K)return
false;}if($K->columnCount()){$K->num_rows=$K->rowCount();return$K;}$this->affected_rows=$K->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch();return$M[$l];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$M=(object)$this->getColumnMeta($this->_offset++);$M->orgtable=$M->table;$M->orgname=$M->name;$M->charsetnr=(in_array("blob",(array)$M->flags)?63:0);return$M;}}}$jb=array();class
Min_SQL{var$_conn;function
Min_SQL($f){$this->_conn=$f;}function
select($S,$O,$Z,$p,$E=array(),$y=1,$G=0,$md=false){global$b,$v;$u=(count($p)<count($O));$J=$b->selectQueryBuild($O,$Z,$p,$E,$y,$G);if(!$J)$J="SELECT".limit(($_GET["page"]!="last"&&+$y&&$p&&$u&&$v=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$O)."\nFROM ".table($S),($Z?"\nWHERE ".implode(" AND ",$Z):"").($p&&$u?"\nGROUP BY ".implode(", ",$p):"").($E?"\nORDER BY ".implode(", ",$E):""),($y!=""?+$y:null),($G?$y*$G:0),"\n");$Rd=microtime(true);$L=$this->_conn->query($J);if($md)echo$b->selectQuery($J,format_time($Rd));return$L;}function
delete($S,$sd,$y=0){$J="FROM ".table($S);return
queries("DELETE".($y?limit1($J,$sd):" $J$sd"));}function
update($S,$Q,$sd,$y=0,$Jd="\n"){$Ee=array();foreach($Q
as$x=>$W)$Ee[]="$x = $W";$J=table($S)." SET$Jd".implode(",$Jd",$Ee);return
queries("UPDATE".($y?limit1($J,$sd):" $J$sd"));}function
insert($S,$Q){return
queries("INSERT INTO ".table($S).($Q?" (".implode(", ",array_keys($Q)).")\nVALUES (".implode(", ",$Q).")":" DEFAULT VALUES"));}function
insertUpdate($S,$N,$ld){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$jb=array("server"=>"MySQL")+$jb;if(!defined("DRIVER")){$jd=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($P,$U,$H){mysqli_report(MYSQLI_REPORT_OFF);list($dc,$hd)=explode(":",$P,2);$L=@$this->real_connect(($P!=""?$dc:ini_get("mysqli.default_host")),($P.$U!=""?$U:ini_get("mysqli.default_user")),($P.$U.$H!=""?$H:ini_get("mysqli.default_pw")),null,(is_numeric($hd)?$hd:ini_get("mysqli.default_port")),(!is_numeric($hd)?$hd:null));return$L;}function
result($J,$l=0){$K=$this->query($J);if(!$K)return
false;$M=$K->fetch_array();return$M[$l];}function
quote($R){return"'".$this->escape_string($R)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($P,$U,$H){$this->_link=@mysql_connect(($P!=""?$P:ini_get("mysql.default_host")),("$P$U"!=""?$U:ini_get("mysql.default_user")),("$P$U$H"!=""?$H:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Da){if(function_exists('mysql_set_charset'))return
mysql_set_charset($Da,$this->_link);return$this->query("SET NAMES $Da");}function
quote($R){return"'".mysql_real_escape_string($R,$this->_link)."'";}function
select_db($Za){return
mysql_select_db($Za,$this->_link);}function
query($J,$ve=false){$K=@($ve?mysql_unbuffered_query($J,$this->_link):mysql_query($J,$this->_link));$this->error="";if(!$K){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($K===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($K);}function
multi_query($J){return$this->_result=$this->query($J);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($J,$l=0){$K=$this->query($J);if(!$K||!$K->num_rows)return
false;return
mysql_result($K->_result,0,$l);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($K){$this->_result=$K;$this->num_rows=mysql_num_rows($K);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$L=mysql_fetch_field($this->_result,$this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=($L->blob?63:0);return$L;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($P,$U,$H){$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$P)),$U,$H);return
true;}function
set_charset($Da){$this->query("SET NAMES $Da");}function
select_db($Za){return$this->query("USE ".idf_escape($Za));}function
query($J,$ve=false){$this->setAttribute(1000,!$ve);return
parent::query($J,$ve);}}}class
Min_Driver
extends
Min_SQL{function
insert($S,$Q){return($Q?parent::insert($S,$Q):queries("INSERT INTO ".table($S)." ()\nVALUES ()"));}function
insertUpdate($S,$N,$ld){$e=array_keys(reset($N));$kd="INSERT INTO ".table($S)." (".implode(", ",$e).") VALUES\n";$Ee=array();foreach($e
as$x)$Ee[$x]="$x = VALUES($x)";$Xd="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ee);$Ee=array();$xc=0;foreach($N
as$Q){$X="(".implode(", ",$Q).")";if($Ee&&(strlen($kd)+$xc+strlen($X)+strlen($Xd)>1e6)){if(!queries($kd.implode(",\n",$Ee).$Xd))return
false;$Ee=array();$xc=0;}$Ee[]=$X;$xc+=strlen($X)+2;}return
queries($kd.implode(",\n",$Ee).$Xd);}}function
idf_escape($gc){return"`".str_replace("`","``",$gc)."`";}function
table($gc){return
idf_escape($gc);}function
connect(){global$b;$f=new
Min_DB;$Xa=$b->credentials();if($f->connect($Xa[0],$Xa[1],$Xa[2])){$f->set_charset(charset($f));$f->query("SET sql_quote_show_create = 1, autocommit = 1");return$f;}$L=$f->error;if(function_exists('iconv')&&!is_utf8($L)&&strlen($Dd=iconv("windows-1250","utf-8",$L))>strlen($L))$L=$Dd;return$L;}function
get_databases($Jb){global$f;$L=get_session("dbs");if($L===null){$J=($f->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$L=($Jb?slow_query($J):get_vals($J));restart_session();set_session("dbs",$L);stop_session();}return$L;}function
limit($J,$Z,$y,$Pc=0,$Jd=" "){return" $J$Z".($y!==null?$Jd."LIMIT $y".($Pc?" OFFSET $Pc":""):"");}function
limit1($J,$Z){return
limit($J,$Z,1);}function
db_collation($h,$Na){global$f;$L=null;$Va=$f->result("SHOW CREATE DATABASE ".idf_escape($h),1);if(preg_match('~ COLLATE ([^ ]+)~',$Va,$A))$L=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$Va,$A))$L=$Na[$A[1]][-1];return$L;}function
engines(){$L=array();foreach(get_rows("SHOW ENGINES")as$M){if(preg_match("~YES|DEFAULT~",$M["Support"]))$L[]=$M["Engine"];}return$L;}function
logged_user(){global$f;return$f->result("SELECT USER()");}function
tables_list(){global$f;return
get_key_vals($f->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($ab){$L=array();foreach($ab
as$h)$L[$h]=count(get_vals("SHOW TABLES IN ".idf_escape($h)));return$L;}function
table_status($D="",$Cb=false){global$f;$L=array();foreach(get_rows($Cb&&$f->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$M){if($M["Engine"]=="InnoDB")$M["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$M["Comment"]);if(!isset($M["Engine"]))$M["Comment"]="";if($D!="")return$M;$L[$M["Name"]]=$M;}return$L;}function
is_view($T){return$T["Engine"]===null;}function
fk_support($T){global$f;return
preg_match('~InnoDB|IBMDB2I~i',$T["Engine"])||(preg_match('~NDB~i',$T["Engine"])&&version_compare($f->server_info,'5.6')>=0);}function
fields($S){$L=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($S))as$M){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$M["Type"],$A);$L[$M["Field"]]=array("field"=>$M["Field"],"full_type"=>$M["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($M["Default"]!=""||preg_match("~char|set~",$A[1])?$M["Default"]:null),"null"=>($M["Null"]=="YES"),"auto_increment"=>($M["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$M["Extra"],$A)?$A[1]:""),"collation"=>$M["Collation"],"privileges"=>array_flip(preg_split('~, *~',$M["Privileges"])),"comment"=>$M["Comment"],"primary"=>($M["Key"]=="PRI"),);}return$L;}function
indexes($S,$g=null){$L=array();foreach(get_rows("SHOW INDEX FROM ".table($S),$g)as$M){$L[$M["Key_name"]]["type"]=($M["Key_name"]=="PRIMARY"?"PRIMARY":($M["Index_type"]=="FULLTEXT"?"FULLTEXT":($M["Non_unique"]?"INDEX":"UNIQUE")));$L[$M["Key_name"]]["columns"][]=$M["Column_name"];$L[$M["Key_name"]]["lengths"][]=$M["Sub_part"];$L[$M["Key_name"]]["descs"][]=null;}return$L;}function
foreign_keys($S){global$f,$Rc;static$I='`(?:[^`]|``)+`';$L=array();$Wa=$f->result("SHOW CREATE TABLE ".table($S),1);if($Wa){preg_match_all("~CONSTRAINT ($I) FOREIGN KEY ?\\(((?:$I,? ?)+)\\) REFERENCES ($I)(?:\\.($I))? \\(((?:$I,? ?)+)\\)(?: ON DELETE ($Rc))?(?: ON UPDATE ($Rc))?~",$Wa,$Bc,PREG_SET_ORDER);foreach($Bc
as$A){preg_match_all("~$I~",$A[2],$Pd);preg_match_all("~$I~",$A[5],$de);$L[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Pd[0]),"target"=>array_map('idf_unescape',$de[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$L;}function
view($D){global$f;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$f->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$L=array();foreach(get_rows("SHOW COLLATION")as$M){if($M["Default"])$L[$M["Charset"]][-1]=$M["Collation"];else$L[$M["Charset"]][]=$M["Collation"];}ksort($L);foreach($L
as$x=>$W)asort($L[$x]);return$L;}function
information_schema($h){global$f;return($f->server_info>=5&&$h=="information_schema")||($f->server_info>=5.5&&$h=="performance_schema");}function
error(){global$f;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$f->error));}function
error_line(){global$f;if(preg_match('~ at line ([0-9]+)$~',$f->error,$xd))return$xd[1]-1;}function
create_database($h,$Ma){return
queries("CREATE DATABASE ".idf_escape($h).($Ma?" COLLATE ".q($Ma):""));}function
drop_databases($ab){$L=apply_queries("DROP DATABASE",$ab,'idf_escape');restart_session();set_session("dbs",null);return$L;}function
rename_database($D,$Ma){$L=false;if(create_database($D,$Ma)){$yd=array();foreach(tables_list()as$S=>$se)$yd[]=table($S)." TO ".idf_escape($D).".".table($S);$L=(!$yd||queries("RENAME TABLE ".implode(", ",$yd)));if($L)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$L;}function
auto_increment(){$ta=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$s){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$s["columns"],true)){$ta="";break;}if($s["type"]=="PRIMARY")$ta=" UNIQUE";}}return" AUTO_INCREMENT$ta";}function
alter_table($S,$D,$m,$Kb,$Qa,$tb,$Ma,$sa,$ed){$ma=array();foreach($m
as$l)$ma[]=($l[1]?($S!=""?($l[0]!=""?"CHANGE ".idf_escape($l[0]):"ADD"):" ")." ".implode($l[1]).($S!=""?$l[2]:""):"DROP ".idf_escape($l[0]));$ma=array_merge($ma,$Kb);$Sd=($Qa!==null?" COMMENT=".q($Qa):"").($tb?" ENGINE=".q($tb):"").($Ma?" COLLATE ".q($Ma):"").($sa!=""?" AUTO_INCREMENT=$sa":"");if($S=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$ma)."\n)$Sd$ed");if($S!=$D)$ma[]="RENAME TO ".table($D);if($Sd)$ma[]=ltrim($Sd);return($ma||$ed?queries("ALTER TABLE ".table($S)."\n".implode(",\n",$ma).$ed):true);}function
alter_indexes($S,$ma){foreach($ma
as$x=>$W)$ma[$x]=($W[2]=="DROP"?"\nDROP INDEX ".idf_escape($W[1]):"\nADD $W[0] ".($W[0]=="PRIMARY"?"KEY ":"").($W[1]!=""?idf_escape($W[1])." ":"")."(".implode(", ",$W[2]).")");return
queries("ALTER TABLE ".table($S).implode(",",$ma));}function
truncate_tables($ce){return
apply_queries("TRUNCATE TABLE",$ce);}function
drop_views($Ge){return
queries("DROP VIEW ".implode(", ",array_map('table',$Ge)));}function
drop_tables($ce){return
queries("DROP TABLE ".implode(", ",array_map('table',$ce)));}function
move_tables($ce,$Ge,$de){$yd=array();foreach(array_merge($ce,$Ge)as$S)$yd[]=table($S)." TO ".idf_escape($de).".".table($S);return
queries("RENAME TABLE ".implode(", ",$yd));}function
copy_tables($ce,$Ge,$de){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($ce
as$S){$D=($de==DB?table("copy_$S"):idf_escape($de).".".table($S));if(!queries("\nDROP TABLE IF EXISTS $D")||!queries("CREATE TABLE $D LIKE ".table($S))||!queries("INSERT INTO $D SELECT * FROM ".table($S)))return
false;}foreach($Ge
as$S){$D=($de==DB?table("copy_$S"):idf_escape($de).".".table($S));$Fe=view($S);if(!queries("DROP VIEW IF EXISTS $D")||!queries("CREATE VIEW $D AS $Fe[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$N=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($N);}function
triggers($S){$L=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")))as$M)$L[$M["Trigger"]]=array($M["Timing"],$M["Event"]);return$L;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$se){global$f,$ub,$lc,$ue;$la=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$te="((".implode("|",array_merge(array_keys($ue),$la)).")\\b(?:\\s*\\(((?:[^'\")]|$ub)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$I="\\s*(".($se=="FUNCTION"?"":$lc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$te";$Va=$f->result("SHOW CREATE $se ".idf_escape($D),2);preg_match("~\\(((?:$I\\s*,?)*)\\)\\s*".($se=="FUNCTION"?"RETURNS\\s+$te\\s+":"")."(.*)~is",$Va,$A);$m=array();preg_match_all("~$I\\s*,?~is",$A[1],$Bc,PREG_SET_ORDER);foreach($Bc
as$cd){$D=str_replace("``","`",$cd[2]).$cd[3];$m[]=array("field"=>$D,"type"=>strtolower($cd[5]),"length"=>preg_replace_callback("~$ub~s",'normalize_enum',$cd[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$cd[8] $cd[7]"))),"null"=>1,"full_type"=>$cd[4],"inout"=>strtoupper($cd[1]),"collation"=>strtolower($cd[9]),);}if($se!="FUNCTION")return
array("fields"=>$m,"definition"=>$A[11]);return
array("fields"=>$m,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ID()");}function
explain($f,$J){return$f->query("EXPLAIN ".($f->server_info>=5.1?"PARTITIONS ":"").$J);}function
found_rows($T,$Z){return($Z||$T["Engine"]!="InnoDB"?null:$T["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ed){return
true;}function
create_sql($S,$sa){global$f;$L=$f->result("SHOW CREATE TABLE ".table($S),1);if(!$sa)$L=preg_replace('~ AUTO_INCREMENT=\\d+~','',$L);return$L;}function
truncate_sql($S){return"TRUNCATE ".table($S);}function
use_sql($Za){return"USE ".idf_escape($Za);}function
trigger_sql($S,$Vd){$L="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($S,"%_\\")),null,"-- ")as$M)$L.="\n".($Vd=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($M["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($M["Trigger"])." $M[Timing] $M[Event] ON ".table($M["Table"])." FOR EACH ROW\n$M[Statement];;\n";return$L;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($l){if(preg_match("~binary~",$l["type"]))return"HEX(".idf_escape($l["field"]).")";if($l["type"]=="bit")return"BIN(".idf_escape($l["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))return"AsWKT(".idf_escape($l["field"]).")";}function
unconvert_field($l,$L){if(preg_match("~binary~",$l["type"]))$L="UNHEX($L)";if($l["type"]=="bit")$L="CONV($L, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$l["type"]))$L="GeomFromText($L)";return$L;}function
support($Db){global$f;return!preg_match("~scheme|sequence|type|view_trigger".($f->server_info<5.1?"|event|partitioning".($f->server_info<5?"|routine|trigger|view":""):"")."~",$Db);}$v="sql";$ue=array();$Ud=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$x=>$W){$ue+=$W;$Ud[$x]=array_keys($W);}$Ae=array("unsigned","zerofill","unsigned zerofill");$Wc=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Tb=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$Vb=array("avg","count","count distinct","group_concat","max","min","sum");$mb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.2.0";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='http://www.adminer.org/editor/' target='_blank' id='h1'>".'Editor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($Va=false){return
password_file($Va);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){global$f;if($f){$ab=$this->databases(false);return(!$ab?$f->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$ab[(information_schema($ab[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($Jb=true){return
get_databases($Jb);}function
queryTimeout(){return
5;}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){echo'<table cellspacing="0">
<tr><th>Username<td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>Password<td><input type="password" name="auth[password]">
</table>
<script type="text/javascript">
focus(document.getElementById(\'username\'));
</script>
',"<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
login($_c,$H){global$f;$f->query("SET time_zone = ".q(substr_replace(@date("O"),":",-2,0)));return
true;}function
tableName($ae){return
h($ae["Comment"]!=""?$ae["Comment"]:$ae["Name"]);}function
fieldName($l,$E=0){return
h($l["comment"]!=""?$l["comment"]:$l["field"]);}function
selectLinks($ae,$Q=""){$a=$ae["Name"];if($Q!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$Q).'">'.'New item'."</a>\n";}function
foreignKeys($S){return
foreign_keys($S);}function
backwardKeys($S,$Zd){$L=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($S)."
ORDER BY ORDINAL_POSITION",null,"")as$M)$L[$M["TABLE_NAME"]]["keys"][$M["CONSTRAINT_NAME"]][$M["COLUMN_NAME"]]=$M["REFERENCED_COLUMN_NAME"];foreach($L
as$x=>$W){$D=$this->tableName(table_status($x,true));if($D!=""){$Fd=preg_quote($Zd);$Jd="(:|\\s*-)?\\s+";$L[$x]["name"]=(preg_match("(^$Fd$Jd(.+)|^(.+?)$Jd$Fd\$)iu",$D,$A)?$A[2].$A[3]:$D);}else
unset($L[$x]);}return$L;}function
backwardKeysPrint($wa,$M){foreach($wa
as$S=>$va){foreach($va["keys"]as$Oa){$z=ME.'select='.urlencode($S);$q=0;foreach($Oa
as$d=>$W)$z.=where_link($q++,$d,$M[$W]);echo"<a href='".h($z)."'>".h($va["name"])."</a>";$z=ME.'edit='.urlencode($S);foreach($Oa
as$d=>$W)$z.="&set".urlencode("[".bracket_escape($d)."]")."=".urlencode($M[$W]);echo"<a href='".h($z)."' title='".'New item'."'>+</a> ";}}}function
selectQuery($J,$he){return"<!--\n".str_replace("--","--><!-- ",$J)."\n($he)\n-->\n";}function
rowDescription($S){foreach(fields($S)as$l){if(preg_match("~varchar|character varying~",$l["type"]))return
idf_escape($l["field"]);}return"";}function
rowDescriptions($N,$Mb){$L=$N;foreach($N[0]as$x=>$W){if(list($S,$r,$D)=$this->_foreignColumn($Mb,$x)){$hc=array();foreach($N
as$M)$hc[$M[$x]]=q($M[$x]);$eb=$this->_values[$S];if(!$eb)$eb=get_key_vals("SELECT $r, $D FROM ".table($S)." WHERE $r IN (".implode(", ",$hc).")");foreach($N
as$C=>$M){if(isset($M[$x]))$L[$C][$x]=(string)$eb[$M[$x]];}}}return$L;}function
selectLink($W,$l){}function
selectVal($W,$z,$l,$ad){$L=($W===null?"&nbsp;":$W);$z=h($z);if(preg_match('~blob|bytea~',$l["type"])&&!is_utf8($W)){$L=lang(array('%d byte','%d bytes'),strlen($ad));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$ad))$L="<img src='$z' alt='$L'>";}if(like_bool($l)&&$L!="&nbsp;")$L=($W?'yes':'no');if($z)$L="<a href='$z'".(is_url($z)?" rel='noreferrer'":"").">$L</a>";if(!$z&&!like_bool($l)&&preg_match('~int|float|double|decimal~',$l["type"]))$L="<div class='number'>$L</div>";elseif(preg_match('~date~',$l["type"]))$L="<div class='datetime'>$L</div>";return$L;}function
editVal($W,$l){if(preg_match('~date|timestamp~',$l["type"])&&$W!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~','$1-$3-$5',$W);return$W;}function
selectColumnsPrint($O,$e){}function
selectSearchPrint($Z,$e,$t){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Search'."</legend><div>\n";$qc=array();foreach($Z
as$x=>$W)$qc[$W["col"]]=$x;$q=0;$m=fields($_GET["select"]);foreach($e
as$D=>$db){$l=$m[$D];if(preg_match("~enum~",$l["type"])||like_bool($l)){$x=$qc[$D];$q--;echo"<div>".h($db)."<input type='hidden' name='where[$q][col]' value='".h($D)."'>:",(like_bool($l)?" <select name='where[$q][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$x]["val"],true)."</select>":enum_input("checkbox"," name='where[$q][val][]'",$l,(array)$Z[$x]["val"],($l["null"]?0:null))),"</div>\n";unset($e[$D]);}elseif(is_array($Xc=$this->_foreignKeyOptions($_GET["select"],$D))){if($m[$D]["null"])$Xc[0]='('.'empty'.')';$x=$qc[$D];$q--;echo"<div>".h($db)."<input type='hidden' name='where[$q][col]' value='".h($D)."'><input type='hidden' name='where[$q][op]' value='='>: <select name='where[$q][val]'>".optionlist($Xc,$Z[$x]["val"],true)."</select></div>\n";unset($e[$D]);}}$q=0;foreach($Z
as$W){if(($W["col"]==""||$e[$W["col"]])&&"$W[col]$W[val]"!=""){echo"<div><select name='where[$q][col]'><option value=''>(".'anywhere'.")".optionlist($e,$W["col"],true)."</select>",html_select("where[$q][op]",array(-1=>"")+$this->operators,$W["op"]),"<input type='search' name='where[$q][val]' value='".h($W["val"])."' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";$q++;}}echo"<div><select name='where[$q][col]' onchange='this.nextSibling.nextSibling.onchange();'><option value=''>(".'anywhere'.")".optionlist($e,null,true)."</select>",html_select("where[$q][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$q][val]' onchange='selectAddRow(this);' onsearch='selectSearch(this);'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($E,$e,$t){$Zc=array();foreach($t
as$x=>$s){$E=array();foreach($s["columns"]as$W)$E[]=$e[$W];if(count(array_filter($E,'strlen'))>1&&$x!="PRIMARY")$Zc[$x]=implode(", ",$E);}if($Zc){echo'<fieldset><legend>'.'Sort'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Zc,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($y){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$y),"</div></fieldset>\n";}function
selectLengthPrint($fe){}function
selectActionPrint($t){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($qb,$e){if($qb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div onkeydown=\"eventStop(event); return bodyKeydown(event, 'email');\">\n","<p>".'From'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Subject'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p onkeydown=\"eventStop(event); return bodyKeydown(event, 'email_append');\">".html_select("email_addition",$e,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Insert'."'>\n";echo"<p>".'Attachments'.": <input type='file' name='email_files[]' onchange=\"this.onchange = function () { }; var el = this.cloneNode(true); el.value = ''; this.parentNode.appendChild(el);\">","<p>".(count($qb)==1?'<input type="hidden" name="email_field" value="'.h(key($qb)).'">':html_select("email_field",$qb)),"<input type='submit' name='email' value='".'Send'."' onclick=\"return this.form['delete'].onclick();\">\n","</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($e,$t){return
array(array(),array());}function
selectSearchProcess($m,$t){$L=array();foreach((array)$_GET["where"]as$x=>$Z){$La=$Z["col"];$Uc=$Z["op"];$W=$Z["val"];if(($x<0?"":$La).$W!=""){$Ra=array();foreach(($La!=""?array($La=>$m[$La]):$m)as$D=>$l){if($La!=""||is_numeric($W)||!preg_match('~int|float|double|decimal~',$l["type"])){$D=idf_escape($D);if($La!=""&&$l["type"]=="enum")$Ra[]=(in_array(0,$W)?"$D IS NULL OR ":"")."$D IN (".implode(", ",array_map('intval',$W)).")";else{$ge=preg_match('~char|text|enum|set~',$l["type"]);$X=$this->processInput($l,(!$Uc&&$ge&&preg_match('~^[^%]+$~',$W)?"%$W%":$W));$Ra[]=$D.($X=="NULL"?" IS".($Uc==">="?" NOT":"")." $X":(in_array($Uc,$this->operators)||$Uc=="="?" $Uc $X":($ge?" LIKE $X":" IN (".str_replace(",","', '",$X).")")));if($x<0&&$W=="0")$Ra[]="$D IS NULL";}}}$L[]=($Ra?"(".implode(" OR ",$Ra).")":"0");}}return$L;}function
selectOrderProcess($m,$t){$jc=$_GET["index_order"];if($jc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($jc!=""?array($t[$jc]):$t)as$s){if($jc!=""||$s["type"]=="INDEX"){$Xb=array_filter($s["descs"]);$db=false;foreach($s["columns"]as$W){if(preg_match('~date|timestamp~',$m[$W]["type"])){$db=true;break;}}$L=array();foreach($s["columns"]as$x=>$W)$L[]=idf_escape($W).(($Xb?$s["descs"][$x]:$db)?" DESC":"");return$L;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$Mb){if($_POST["email_append"])return
true;if($_POST["email"]){$Id=0;if($_POST["all"]||$_POST["check"]){$l=idf_escape($_POST["email_field"]);$Wd=$_POST["email_subject"];$B=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$Wd.$B",$Bc);$N=get_rows("SELECT DISTINCT $l".($Bc[1]?", ".implode(", ",array_map('idf_escape',array_unique($Bc[1]))):"")." FROM ".table($_GET["select"])." WHERE $l IS NOT NULL AND $l != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$m=fields($_GET["select"]);foreach($this->rowDescriptions($N,$Mb)as$M){$zd=array('{\\'=>'{');foreach($Bc[1]as$W)$zd['{$'."$W}"]=$this->editVal($M[$W],$m[$W]);$pb=$M[$_POST["email_field"]];if(is_mail($pb)&&send_mail($pb,strtr($Wd,$zd),strtr($B,$zd),$_POST["email_from"],$_FILES["email_files"]))$Id++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail has been sent.','%d e-mails have been sent.'),$Id));}return
false;}function
selectQueryBuild($O,$Z,$p,$E,$y,$G){return"";}function
messageQuery($J,$he){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$J)."\n".($he?"($he)\n":"")."-->";}function
editFunctions($l){$L=array();if($l["null"]&&preg_match('~blob~',$l["type"]))$L["NULL"]='empty';$L[""]=($l["null"]||$l["auto_increment"]||like_bool($l)?"":"*");if(preg_match('~date|time~',$l["type"]))$L["now"]='now';if(preg_match('~_(md5|sha1)$~i',$l["field"],$A))$L[]=strtolower($A[1]);return$L;}function
editInput($S,$l,$c,$X){if($l["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$c value='-1' checked><i>".'original'."</i></label> ":"").enum_input("radio",$c,$l,($X||isset($_GET["select"])?$X:0),($l["null"]?"":null));$Xc=$this->_foreignKeyOptions($S,$l["field"],$X);if($Xc!==null)return(is_array($Xc)?"<select$c>".optionlist($Xc,$X,true)."</select>":"<input value='".h($X)."'$c class='hidden'><input value='".h($Xc)."' class='jsonly' onkeyup=\"whisper('".h(ME."script=complete&source=".urlencode($S)."&field=".urlencode($l["field"]))."&value=', this);\"><div onclick='return whisperClick(event, this.previousSibling);'></div>");if(like_bool($l))return'<input type="checkbox" value="'.h($X?$X:1).'"'.($X?' checked':'')."$c>";$cc="";if(preg_match('~time~',$l["type"]))$cc='HH:MM:SS';if(preg_match('~date|timestamp~',$l["type"]))$cc='[yyyy]-mm-dd'.($cc?" [$cc]":"");if($cc)return"<input value='".h($X)."'$c> ($cc)";if(preg_match('~_(md5|sha1)$~i',$l["field"]))return"<input type='password' value='".h($X)."'$c>";return'';}function
processInput($l,$X,$o=""){if($o=="now")return"$o()";$L=$X;if(preg_match('~date|timestamp~',$l["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote('$1-$3-$5'))).'(.*))',$X,$A))$L=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$L=($l["type"]=="bit"&&preg_match('~^[0-9]+$~',$X)?$L:q($L));if($X==""&&like_bool($l))$L="0";elseif($X==""&&($l["null"]||!preg_match('~char|text~',$l["type"])))$L="NULL";elseif(preg_match('~^(md5|sha1)$~',$o))$L="$o($L)";return
unconvert_field($l,$L);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($h){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($S,$Vd,$J){global$f;$K=$f->query($J,1);if($K){while($M=$K->fetch_assoc()){if($Vd=="table"){dump_csv(array_keys($M));$Vd="INSERT";}dump_csv($M);}}}function
dumpFilename($fc){return
friendly_url($fc);}function
dumpHeaders($fc,$Jc=false){$_b="csv";header("Content-Type: text/csv; charset=utf-8");return$_b;}function
homepage(){return
true;}function
navigation($Ic){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="http://www.adminer.org/editor/#download" target="_blank" id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Ic=="auth"){$Ib=true;foreach((array)$_SESSION["pwds"]as$Y=>$Md){foreach($Md[""]as$U=>$H){if($H!==null){if($Ib){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$Ib=false;}echo"<a href='".h(auth_url($Y,"",$U))."'>".($U!=""?h($U):"<i>".'empty'."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($Ic);if($Ic!="db"&&$Ic!="ns"){$T=table_status('',true);if(!$T)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($T);}}}function
databasesPrint($Ic){}function
tablesPrint($ce){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($ce
as$M){$D=$this->tableName($M);if(isset($M["Engine"])&&$D!="")echo"<a href='".h(ME).'select='.urlencode($M["Name"])."'".bold($_GET["select"]==$M["Name"]||$_GET["edit"]==$M["Name"],"select")." title='".'Select data'."'>$D</a><br>\n";}}function
_foreignColumn($Mb,$d){foreach((array)$Mb[$d]as$Lb){if(count($Lb["source"])==1){$D=$this->rowDescription($Lb["table"]);if($D!=""){$r=idf_escape($Lb["target"][0]);return
array($Lb["table"],$r,$D);}}}}function
_foreignKeyOptions($S,$d,$X=null){global$f;if(list($de,$r,$D)=$this->_foreignColumn(column_foreign_keys($S),$d)){$L=&$this->_values[$de];if($L===null){$T=table_status($de);$L=($T["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $r, $D FROM ".table($de)." ORDER BY 2"));}if(!$L&&$X!==null)return$f->result("SELECT $D FROM ".table($de)." WHERE $r = ".q($X));return$L;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($je,$k="",$Ca=array(),$ke=""){global$ba,$ca,$b,$jb,$v;page_headers();if(is_ajax()&&$k){page_messages($k);exit;}$le=$je.($ke!=""?": $ke":"");$me=strip_tags($le.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="never">
<title>',$me,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.2.0&amp;driver=mysql",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.2.0&amp;driver=mysql",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.0&amp;driver=mysql",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.0&amp;driver=mysql",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);"',(isset($_COOKIE["adminer_version"])?"":" onload=\"verifyVersion('$ca');\"");?>>
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
</script>

<div id="help" class="jush-',$v,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Ca!==null){$z=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($z?$z:".").'">'.$jb[DRIVER].'</a> &raquo; ';$z=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$P=(SERVER!=""?h(SERVER):'Server');if($Ca===false)echo"$P\n";else{echo"<a href='".($z?h($z):".")."' accesskey='1' title='Alt+Shift+1'>$P</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Ca)))echo'<a href="'.h($z."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Ca)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Ca
as$x=>$W){$db=(is_array($W)?$W[1]:h($W));if($db!="")echo"<a href='".h(ME."$x=").urlencode(is_array($W)?$W[0]:$W)."'>$db</a> &raquo; ";}}echo"$je\n";}}echo"<h2>$le</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($k);$ab=&get_session("dbs");if(DB!=""&&$ab&&!in_array(DB,$ab,true))$ab=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($k){$Ce=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Hc=$_SESSION["messages"][$Ce];if($Hc){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Hc)."</div>\n";unset($_SESSION["messages"][$Ce]);}if($k)echo"<div class='error'>$k</div>\n";}function
page_footer($Ic=""){global$b,$oe;echo'</div>

';if($Ic!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$oe,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Ic);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($C){while($C>=2147483648)$C-=4294967296;while($C<=-2147483649)$C+=4294967296;return(int)$C;}function
long2str($V,$Ie){$Dd='';foreach($V
as$W)$Dd.=pack('V',$W);if($Ie)return
substr($Dd,0,end($V));return$Dd;}function
str2long($Dd,$Ie){$V=array_values(unpack('V*',str_pad($Dd,4*ceil(strlen($Dd)/4),"\0")));if($Ie)$V[]=strlen($Dd);return$V;}function
xxtea_mx($Ne,$Me,$Yd,$w){return
int32((($Ne>>5&0x7FFFFFF)^$Me<<2)+(($Me>>3&0x1FFFFFFF)^$Ne<<4))^int32(($Yd^$Me)+($w^$Ne));}function
encrypt_string($Td,$x){if($Td=="")return"";$x=array_values(unpack("V*",pack("H*",md5($x))));$V=str2long($Td,true);$C=count($V)-1;$Ne=$V[$C];$Me=$V[0];$qd=floor(6+52/($C+1));$Yd=0;while($qd-->0){$Yd=int32($Yd+0x9E3779B9);$lb=$Yd>>2&3;for($F=0;$F<$C;$F++){$Me=$V[$F+1];$Kc=xxtea_mx($Ne,$Me,$Yd,$x[$F&3^$lb]);$Ne=int32($V[$F]+$Kc);$V[$F]=$Ne;}$Me=$V[0];$Kc=xxtea_mx($Ne,$Me,$Yd,$x[$F&3^$lb]);$Ne=int32($V[$C]+$Kc);$V[$C]=$Ne;}return
long2str($V,false);}function
decrypt_string($Td,$x){if($Td=="")return"";if(!$x)return
false;$x=array_values(unpack("V*",pack("H*",md5($x))));$V=str2long($Td,false);$C=count($V)-1;$Ne=$V[$C];$Me=$V[0];$qd=floor(6+52/($C+1));$Yd=int32($qd*0x9E3779B9);while($Yd){$lb=$Yd>>2&3;for($F=$C;$F>0;$F--){$Ne=$V[$F-1];$Kc=xxtea_mx($Ne,$Me,$Yd,$x[$F&3^$lb]);$Me=int32($V[$F]-$Kc);$V[$F]=$Me;}$Ne=$V[$C];$Kc=xxtea_mx($Ne,$Me,$Yd,$x[$F&3^$lb]);$Me=int32($V[0]-$Kc);$V[0]=$Me;$Yd=int32($Yd-0x9E3779B9);}return
long2str($V,true);}$f='';$Zb=$_SESSION["token"];if(!$Zb)$_SESSION["token"]=rand(1,1e6);$oe=get_token();$fd=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$W){list($x)=explode(":",$W);$fd[$x]=$W;}}function
add_invalid_login(){global$b;$Fb=get_temp_dir()."/adminer.invalid";$Rb=@fopen($Fb,"r+");if(!$Rb){$Rb=@fopen($Fb,"w");if(!$Rb)return;}flock($Rb,LOCK_EX);$oc=unserialize(stream_get_contents($Rb));$he=time();if($oc){foreach($oc
as$pc=>$W){if($W[0]<$he)unset($oc[$pc]);}}$nc=&$oc[$b->bruteForceKey()];if(!$nc)$nc=array($he+30*60,0);$nc[1]++;$Kd=serialize($oc);rewind($Rb);fwrite($Rb,$Kd);ftruncate($Rb,strlen($Kd));flock($Rb,LOCK_UN);fclose($Rb);}$ra=$_POST["auth"];if($ra){$oc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$nc=$oc[$b->bruteForceKey()];$Mc=($nc[1]>30?$nc[0]-time():0);if($Mc>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($Mc/60)));session_regenerate_id();$Y=$ra["driver"];$P=$ra["server"];$U=$ra["username"];$H=(string)$ra["password"];$h=$ra["db"];set_password($Y,$P,$U,$H);$_SESSION["db"][$Y][$P][$U][$h]=true;if($ra["permanent"]){$x=base64_encode($Y)."-".base64_encode($P)."-".base64_encode($U)."-".base64_encode($h);$nd=$b->permanentLogin(true);$fd[$x]="$x:".base64_encode($nd?encrypt_string($H,$nd):"");cookie("adminer_permanent",implode(" ",$fd));}if(count($_POST)==1||DRIVER!=$Y||SERVER!=$P||$_GET["username"]!==$U||DB!=$h)redirect(auth_url($Y,$P,$U,$h));}elseif($_POST["logout"]){if($Zb&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$x)set_session($x,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.');}}elseif($fd&&!$_SESSION["pwds"]){session_regenerate_id();$nd=$b->permanentLogin();foreach($fd
as$x=>$W){list(,$Ha)=explode(":",$W);list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$x));set_password($Y,$P,$U,decrypt_string(base64_decode($Ha),$nd));$_SESSION["db"][$Y][$P][$U][$h]=true;}}function
unset_permanent(){global$fd;foreach($fd
as$x=>$W){list($Y,$P,$U,$h)=array_map('base64_decode',explode("-",$x));if($Y==DRIVER&&$P==SERVER&&$U==$_GET["username"]&&$h==DB)unset($fd[$x]);}cookie("adminer_permanent",implode(" ",$fd));}function
auth_error($k){global$b,$Zb;$k=h($k);$Nd=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Nd]||$_GET[$Nd])&&!$Zb)$k='Session expired, please login again.';else{add_invalid_login();$H=get_password();if($H!==null){if($H===false)$k.='<br>'.sprintf('Master password expired. <a href="http://www.adminer.org/en/extension/" target="_blank">Implement</a> %s method to make it permanent.','<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Nd]&&$_GET[$Nd]&&ini_bool("session.use_only_cookies"))$k='Session support must be enabled.';$dd=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$dd["lifetime"]);page_header('Login',$k,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$jd)),false);page_footer("auth");exit;}$f=connect();}$i=new
Min_Driver($f);if(!is_object($f)||!$b->login($_GET["username"],get_password()))auth_error((is_string($f)?$f:'Invalid credentials.'));if($ra&&$_POST["token"])$_POST["token"]=$oe;$k='';if($_POST){if(!verify_token()){$kc="max_input_vars";$Fc=ini_get($kc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$x){$W=ini_get($x);if($W&&(!$Fc||$W<$Fc)){$kc=$x;$Fc=$W;}}}$k=(!$_POST["token"]&&$Fc?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$kc'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$k=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$k.=' '.'You can upload a big SQL file via FTP and import it from server.';}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($ac){return"=?UTF-8?B?".base64_encode($ac)."?=";}function
send_mail($pb,$Wd,$B,$Sb="",$Gb=array()){$j=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$B=str_replace("\n",$j,wordwrap(str_replace("\r","","$B\n")));$Ba=uniqid("boundary");$qa="";foreach((array)$Gb["error"]as$x=>$W){if(!$W)$qa.="--$Ba$j"."Content-Type: ".str_replace("\n","",$Gb["type"][$x]).$j."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$Gb["name"][$x])."\"$j"."Content-Transfer-Encoding: base64$j$j".chunk_split(base64_encode(file_get_contents($Gb["tmp_name"][$x])),76,$j).$j;}$ya="";$bc="Content-Type: text/plain; charset=utf-8$j"."Content-Transfer-Encoding: 8bit";if($qa){$qa.="--$Ba--$j";$ya="--$Ba$j$bc$j$j";$bc="Content-Type: multipart/mixed; boundary=\"$Ba\"";}$bc.=$j."MIME-Version: 1.0$j"."X-Mailer: Adminer Editor".($Sb?$j."From: ".str_replace("\n","",$Sb):"");return
mail($pb,email_header($Wd),$ya.$B.$qa,$bc);}function
like_bool($l){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$l["full_type"]);}$f->select_db($b->database());$Rc="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$jb[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$m=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$O=array(idf_escape($_GET["field"]));$K=$i->select($a,$O,array(where($_GET,$m)),$O);$M=($K?$K->fetch_row():array());echo$M[0];exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$m=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$m):""):where($_GET,$m));$Be=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($m
as$D=>$l){if(!isset($l["privileges"][$Be?"update":"insert"])||$b->fieldName($l)=="")unset($m[$D]);}if($_POST&&!$k&&!isset($_GET["select"])){$_=$_POST["referer"];if($_POST["insert"])$_=($Be?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$_))$_=ME."select=".urlencode($a);$t=indexes($a);$xe=unique_array($_GET["where"],$t);$td="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($_,'Item has been deleted.',$i->delete($a,$td,!$xe));else{$Q=array();foreach($m
as$D=>$l){$W=process_input($l);if($W!==false&&$W!==null)$Q[idf_escape($D)]=$W;}if($Be){if(!$Q)redirect($_);queries_redirect($_,'Item has been updated.',$i->update($a,$Q,$td,!$xe));if(is_ajax()){page_headers();page_messages($k);exit;}}else{$K=$i->insert($a,$Q);$vc=($K?last_id():0);queries_redirect($_,sprintf('Item%s has been inserted.',($vc?" $vc":"")),$K);}}}$M=null;if($_POST["save"])$M=(array)$_POST["fields"];elseif($Z){$O=array();foreach($m
as$D=>$l){if(isset($l["privileges"]["select"])){$oa=convert_field($l);if($_POST["clone"]&&$l["auto_increment"])$oa="''";if($v=="sql"&&preg_match("~enum|set~",$l["type"]))$oa="1*".idf_escape($D);$O[]=($oa?"$oa AS ":"").idf_escape($D);}}$M=array();if(!support("table"))$O=array("*");if($O){$K=$i->select($a,$O,array($Z),$O,array(),(isset($_GET["select"])?2:1));$M=$K->fetch_assoc();if(!$M)$M=false;if(isset($_GET["select"])&&(!$M||$K->fetch_assoc()))$M=null;}}if(!support("table")&&!$m){if(!$Z){$K=$i->select($a,array("*"),$Z,array("*"));$M=($K?$K->fetch_assoc():false);if(!$M)$M=array($i->primary=>"");}if($M){foreach($M
as$x=>$W){if(!$Z)$M[$x]=null;$m[$x]=array("field"=>$x,"null"=>($x!=$i->primary),"auto_increment"=>($x==$i->primary));}}}edit_form($a,$m,$M,$Be);}elseif(isset($_GET["select"])){$a=$_GET["select"];$T=table_status1($a);$t=indexes($a);$m=fields($a);$Ob=column_foreign_keys($a);$Qc="";if($T["Oid"]){$Qc=($v=="sqlite"?"rowid":"oid");$t[]=array("type"=>"PRIMARY","columns"=>array($Qc));}parse_str($_COOKIE["adminer_import"],$ia);$Cd=array();$e=array();$fe=null;foreach($m
as$x=>$l){$D=$b->fieldName($l);if(isset($l["privileges"]["select"])&&$D!=""){$e[$x]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($l))$fe=$b->selectLengthProcess();}$Cd+=$l["privileges"];}list($O,$p)=$b->selectColumnsProcess($e,$t);$u=count($p)<count($O);$Z=$b->selectSearchProcess($m,$t);$E=$b->selectOrderProcess($m,$t);$y=$b->selectLimitProcess();$Sb=($O?implode(", ",$O):"*".($Qc?", $Qc":"")).convert_fields($e,$m,$O)."\nFROM ".table($a);$Ub=($p&&$u?"\nGROUP BY ".implode(", ",$p):"").($E?"\nORDER BY ".implode(", ",$E):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$ye=>$M){$oa=convert_field($m[key($M)]);$O=array($oa?$oa:idf_escape(key($M)));$Z[]=where_check($ye,$m);$L=$i->select($a,$O,$Z,$O);if($L)echo
reset($L->fetch_row());}exit;}if($_POST&&!$k){$Ke=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ga=array();foreach($_POST["check"]as$Ea)$Ga[]=where_check($Ea,$m);$Ke[]="((".implode(") OR (",$Ga)."))";}$Ke=($Ke?"\nWHERE ".implode(" AND ",$Ke):"");$ld=$_e=null;foreach($t
as$s){if($s["type"]=="PRIMARY"){$ld=array_flip($s["columns"]);$_e=($O?$ld:array());break;}}foreach((array)$_e
as$x=>$W){if(in_array(idf_escape($x),$O))unset($_e[$x]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$_e===array())$J="SELECT $Sb$Ke$Ub";else{$we=array();foreach($_POST["check"]as$W)$we[]="(SELECT".limit($Sb,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m).$Ub,1).")";$J=implode(" UNION ALL ",$we);}$b->dumpData($a,"table",$J);exit;}if(!$b->selectEmailProcess($Z,$Ob)){if($_POST["save"]||$_POST["delete"]){$K=true;$ja=0;$Q=array();if(!$_POST["delete"]){foreach($e
as$D=>$W){$W=process_input($m[$D]);if($W!==null&&($_POST["clone"]||$W!==false))$Q[idf_escape($D)]=($W!==false?$W:idf_escape($D));}}if($_POST["delete"]||$Q){if($_POST["clone"])$J="INTO ".table($a)." (".implode(", ",array_keys($Q)).")\nSELECT ".implode(", ",$Q)."\nFROM ".table($a);if($_POST["all"]||($_e===array()&&is_array($_POST["check"]))||$u){$K=($_POST["delete"]?$i->delete($a,$Ke):($_POST["clone"]?queries("INSERT $J$Ke"):$i->update($a,$Q,$Ke)));$ja=$f->affected_rows;}else{foreach((array)$_POST["check"]as$W){$Je="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($W,$m);$K=($_POST["delete"]?$i->delete($a,$Je,1):($_POST["clone"]?queries("INSERT".limit1($J,$Je)):$i->update($a,$Q,$Je)));if(!$K)break;$ja+=$f->affected_rows;}}}$B=lang(array('%d item has been affected.','%d items have been affected.'),$ja);if($_POST["clone"]&&$K&&$ja==1){$vc=last_id();if($vc)$B=sprintf('Item%s has been inserted.'," $vc");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$B,$K);if(!$_POST["delete"]){edit_form($a,$m,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$k='Ctrl+click on a value to modify it.';else{$K=true;$ja=0;foreach($_POST["val"]as$ye=>$M){$Q=array();foreach($M
as$x=>$W){$x=bracket_escape($x,1);$Q[idf_escape($x)]=(preg_match('~char|text~',$m[$x]["type"])||$W!=""?$b->processInput($m[$x],$W):"NULL");}$K=$i->update($a,$Q," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($ye,$m),!($u||$_e===array())," ");if(!$K)break;$ja+=$f->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$ja),$K);}}elseif(!is_string($Eb=get_file("csv_file",true)))$k=upload_error($Eb);elseif(!preg_match('~~u',$Eb))$k='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ia["output"])."&format=".urlencode($_POST["separator"]));$K=true;$Oa=array_keys($m);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Eb,$Bc);$ja=count($Bc[0]);$i->begin();$Jd=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$N=array();foreach($Bc[0]as$x=>$W){preg_match_all("~((?>\"[^\"]*\")+|[^$Jd]*)$Jd~",$W.$Jd,$Cc);if(!$x&&!array_diff($Cc[1],$Oa)){$Oa=$Cc[1];$ja--;}else{$Q=array();foreach($Cc[1]as$q=>$La)$Q[idf_escape($Oa[$q])]=($La==""&&$m[$Oa[$q]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$La))));$N[]=$Q;}}$K=(!$N||$i->insertUpdate($a,$N,$ld));if($K)$i->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$ja),$K);$i->rollback();}}}$be=$b->tableName($T);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $be",$k);$Q=null;if(isset($Cd["insert"])||!support("table")){$Q="";foreach((array)$_GET["where"]as$W){if(count($Ob[$W["col"]])==1&&($W["op"]=="="||(!$W["op"]&&!preg_match('~[_%]~',$W["val"]))))$Q.="&set".urlencode("[".bracket_escape($W["col"])."]")."=".urlencode($W["val"]);}}$b->selectLinks($T,$Q);if(!$e&&support("table"))echo"<p class='error'>".'Unable to select the table'.($m?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($O,$e);$b->selectSearchPrint($Z,$e,$t);$b->selectOrderPrint($E,$e,$t);$b->selectLimitPrint($y);$b->selectLengthPrint($fe);$b->selectActionPrint($t);echo"</form>\n";$G=$_GET["page"];if($G=="last"){$n=$f->result(count_rows($a,$Z,$u,$p));$G=floor(max(0,$n-1)/$y);}$Gd=$O;if(!$Gd){$Gd[]="*";if($Qc)$Gd[]=$Qc;}$Ua=convert_fields($e,$m,$O);if($Ua)$Gd[]=substr($Ua,2);$K=$i->select($a,$Gd,$Z,$p,$E,$y,$G,true);if(!$K)echo"<p class='error'>".error()."\n";else{if($v=="mssql"&&$G)$K->seek($y*$G);$rb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$N=array();while($M=$K->fetch_assoc()){if($G&&$v=="oracle")unset($M["RNUM"]);$N[]=$M;}if($_GET["page"]!="last"&&+$y&&$p&&$u&&$v=="sql")$n=$f->result(" SELECT FOUND_ROWS()");if(!$N)echo"<p class='message'>".'No rows.'."\n";else{$xa=$b->backwardKeys($a,$be);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$p&&$O?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Lc=array();$Tb=array();reset($O);$vd=1;foreach($N[0]as$x=>$W){if($x!=$Qc){$W=$_GET["columns"][key($O)];$l=$m[$O?($W?$W["col"]:current($O)):$x];$D=($l?$b->fieldName($l,$vd):($W["fun"]?"*":$x));if($D!=""){$vd++;$Lc[$x]=$D;$d=idf_escape($x);$ec=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($x);$db="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($ec.($E[0]==$d||$E[0]==$x||(!$E&&$u&&$p[0]==$d)?$db:'')).'">';echo
apply_sql_function($W["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($ec.$db)."' title='".'descending'."' class='text'> ‚Üì</a>";if(!$W["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($x)).'\'); return false;" title="'.'Search'.'" class="text jsonly"> =</a>';echo"</span>";}$Tb[$x]=$W["fun"];next($O);}}$yc=array();if($_GET["modify"]){foreach($N
as$M){foreach($M
as$x=>$W)$yc[$x]=max($yc[$x],min(40,strlen(utf8_decode($W))));}}echo($xa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($y%2==1&&$G%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($N,$Ob)as$C=>$M){$xe=unique_array($N[$C],$t);if(!$xe){$xe=array();foreach($N[$C]as$x=>$W){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$x))$xe[$x]=$W;}}$ye="";foreach($xe
as$x=>$W){if(($v=="sql"||$v=="pgsql")&&strlen($W)>64){$x=(strpos($x,'(')?$x:idf_escape($x));$x="MD5(".($v=='sql'&&preg_match("~^utf8_~",$m[$x]["collation"])?$x:"CONVERT($x USING ".charset($f).")").")";$W=md5($W);}$ye.="&".($W!==null?urlencode("where[".bracket_escape($x)."]")."=".urlencode($W):"null%5B%5D=".urlencode($x));}echo"<tr".odd().">".(!$p&&$O?"":"<td>".checkbox("check[]",substr($ye,1),in_array(substr($ye,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($u||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$ye)."'>".'edit'."</a>"));foreach($M
as$x=>$W){if(isset($Lc[$x])){$l=$m[$x];if($W!=""&&(!isset($rb[$x])||$rb[$x]!=""))$rb[$x]=(is_mail($W)?$Lc[$x]:"");$z="";if(preg_match('~blob|bytea|raw|file~',$l["type"])&&$W!="")$z=ME.'download='.urlencode($a).'&field='.urlencode($x).$ye;if(!$z&&$W!==null){foreach((array)$Ob[$x]as$Nb){if(count($Ob[$x])==1||end($Nb["source"])==$x){$z="";foreach($Nb["source"]as$q=>$Pd)$z.=where_link($q,$Nb["target"][$q],$N[$C][$Pd]);$z=($Nb["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($Nb["db"]),ME):ME).'select='.urlencode($Nb["table"]).$z;if(count($Nb["source"])==1)break;}}}if($x=="COUNT(*)"){$z=ME."select=".urlencode($a);$q=0;foreach((array)$_GET["where"]as$V){if(!array_key_exists($V["col"],$xe))$z.=where_link($q++,$V["col"],$V["val"],$V["op"]);}foreach($xe
as$w=>$V)$z.=where_link($q++,$w,$V);}$W=select_value($W,$z,$l,$fe);$r=h("val[$ye][".bracket_escape($x)."]");$X=$_POST["val"][$ye][bracket_escape($x)];$nb=!is_array($M[$x])&&is_utf8($W)&&$N[$C][$x]==$M[$x]&&!$Tb[$x];$ee=preg_match('~text|lob~',$l["type"]);if(($_GET["modify"]&&$nb)||$X!==null){$Wb=h($X!==null?$X:$M[$x]);echo"<td>".($ee?"<textarea name='$r' cols='30' rows='".(substr_count($M[$x],"\n")+1)."'>$Wb</textarea>":"<input name='$r' value='$Wb' size='$yc[$x]'>");}else{$Ac=strpos($W,"<i>...</i>");echo"<td id='$r' onclick=\"selectClick(this, event, ".($Ac?2:($ee?1:0)).($nb?"":", '".h('Use edit link to modify this value.')."'").");\">$W";}}}if($xa)echo"<td>";$b->backwardKeysPrint($xa,$N[$C]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($N||$G)&&!is_ajax()){$yb=true;if($_GET["page"]!="last"){if(!+$y)$n=count($N);elseif($v!="sql"||!$u){$n=($u?false:found_rows($T,$Z));if($n<max(1e4,2*($G+1)*$y))$n=reset(slow_query(count_rows($a,$Z,$u,$p)));else$yb=false;}}if(+$y&&($n===false||$n>$y||$G)){echo"<p class='pages'>";$Dc=($n===false?$G+(count($N)>=$y?2:1):floor(($n-1)/$y));if($v!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".'Page'."', '".($G+1)."'), event); return false;\">".'Page'."</a>:",pagination(0,$G).($G>5?" ...":"");for($q=max(1,$G-4);$q<min($Dc,$G+5);$q++)echo
pagination($q,$G);if($Dc>0){echo($G+5<$Dc?" ...":""),($yb&&$n!==false?pagination($Dc,$G):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Dc'>".'last'."</a>");}echo(($n===false?count($N)+1:$n-$G*$y)>$y?' <a href="'.h(remove_from_uri("page")."&page=".($G+1)).'" onclick="return !selectLoadMore(this, '.(+$y).', \''.'Loading'.'...\');" class="loadmore">'.'Load more data'.'</a>':'');}else{echo'Page'.":",pagination(0,$G).($G>1?" ...":""),($G?pagination($G,$G):""),($Dc>$G?pagination($G+1,$G).($Dc>$G+1?" ...":""):"");}}echo"<p class='count'>\n",($n!==false?"(".($yb?"":"~ ").lang(array('%d row','%d rows'),$n).") ":"");$hb=($yb?"":"~ ").$n;echo
checkbox("all",1,0,'whole result',"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$hb' : checked); selectCount('selected2', this.checked || !checked ? '$hb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete"',confirm(),'>
</div></fieldset>
';}$Pb=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($Pb['sql']);break;}}if($Pb){print_fieldset("export",'Export'." <span id='selected2'></span>");$bd=$b->dumpOutput();echo($bd?html_select("output",$bd,$ia["output"])." ":""),html_select("format",$Pb,$ia["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}echo(!$p&&$O?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",'Import',!$N);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ia["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($rb,'strlen'),$e);echo"<p><input type='hidden' name='token' value='$oe'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$f->query("KILL ".number($_POST["kill"]));elseif(list($S,$r,$D)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$y=11;$K=$f->query("SELECT $r, $D FROM ".table($S)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$r = $_GET[value] OR ":"")."$D LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $y");for($q=1;($M=$K->fetch_row())&&$q<$y;$q++)echo"<a href='".h(ME."edit=".urlencode($S)."&where".urlencode("[".bracket_escape(idf_unescape($r))."]")."=".urlencode($M[0]))."'>".h($M[1])."</a><br>\n";if($M)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Search data in tables'.": <input name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Search'."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^tables\[/);"><th>'.'Table'.'<td>'.'Rows'."</thead>\n";foreach(table_status()as$S=>$M){$D=$b->tableName($M);if(isset($M["Engine"])&&$D!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$S,in_array($S,(array)$_POST["tables"],true),"","formUncheck('check-all');"),"<th><a href='".h(ME).'select='.urlencode($S)."'>$D</a>";$W=format_number($M["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($S)."'>".($M["Engine"]=="InnoDB"&&$W?"~ $W":$W)."</a>";}}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","</form>\n";}}page_footer();