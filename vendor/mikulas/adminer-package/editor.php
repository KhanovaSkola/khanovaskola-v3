<?php
/** Adminer Editor - Compact database editor
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.2.0
*/error_reporting(6135);$fc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($fc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Jf=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Jf)$$X=$Jf;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŒFÃ©”vt2‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅÃôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PĞ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛĞ889¤È QØıŒî2#8Ğ­£’˜6mú²†ğjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ğ¼o(Úó¥ÉkÔ7½sàù>Œî†!ĞR\"*nSı\0@P\"Áè’(‹#[¶¥£@g¹oü­’znş9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ğè!°üë*cì÷>Î¬E7DñLJ© 1ÊJ=ÓÚŞ1L‚û?Ğs=#`Ê3\$4ì€úÈuÈ±ÌÎzGÑC YAt«?;×QÒk&ÇïYP¿uèåÇ¯}UaHV%G;ƒs¼”<A\0\\¼ÔPÑ\\Âœ&ÂªóV¦ğ\n£SUÃtíÅÇrŒêˆÆ2¤	l^íZ6˜ej…Á­³A·dó[İsÕ¶ˆJP”ªÊóˆÒŒŠ8è=»ƒ˜à6#Ë‚74*óŸ¨#eÈÀŞ!Õ7{Æ6“¿<oÍCª9v[–MôÅ-`Óõkö>lÙÚ´‹åIªƒHÚ3xú€›äw0t6¾Ã%MR%³½jhÚB˜<´\0ÉAQ<P<:šãu/¤;\\> Ë-¹„ÊˆÍÁQH\nv¡L+vÖÃ¦ì<ï\rèåvàöî¹\\* àÉçÓ´İ¢gŒnË©¸¹TĞ©2P•\r¨øß‹\"+z 8£ ¶:#€ÊèÃÎ2‹ºJ[i—‚£¨;z˜ûÑô¡rÊ3#¨Ù‰ :ãní\rã½ƒeÙpdİİ è2cˆê4²k¿Š£\rG•æE6_²ªÊØŞ‰b‹/Œ«HB%ò0ë¢>ÈÈğhoWÃnxlÖ æµƒCQ^€°ĞÔÿßñ\r„Š¾¶4lK{şZÆü:†ĞÜÃƒŸ.¦p¨§Ä‚éJóB-Å+B”´‘(ëTòŸ%®µJ›0ªlØT¶`+É-Á¾@BÚáÛ„Vá’Ä\0ÂÏC¼,ì¯0tâàŒF‡‰å?Ä Ë\na@ÉŒ>‚âZEC“ôO-æ›¤^Q€&ßÖù)I)®¤ÄÀR„]\r¡”9”7_ˆ¢\rÉF80µObù	€‘î>ºäı\nRı_ˆÑ8æ‚ØÙ«äov0¤bCA¸F!Ñt—–Äƒ%0”/‘zAYO(4«‹¡ˆ¨Ò	'Ÿ] Iéí8hHÂ05˜3ò@x&nˆ’|TÓ³³)`.“s6eY˜D¦z¸Œ®¥ƒJÑ“ô.„ñ{GEb¹Ó‹¡˜‹†2Õ×{\$**ı¾@İC-:zYHZIôà5F]¦²YúùCªOêAÂÚó`x'´.*9t'{ÿ(êšwP¶¾ Ñ=¢*‰†ú*üxwråÔ*c‚Ìc|„DŸ“ÚV—–\r†V.‡0âÆ™V¤dˆ?Ò€üê,EÍ`T¦É6Ûˆ-“Åì¾ÅÚT[Ñªz©‚.Ar±£Í€Pøºnƒc=aÔ9Fònß!ÙuáÎA©Şƒ0iPó¬”îºJ6eäT]VØ[\rXÌáaŸ–vkõ\n+EˆáÜ•*\0¶~¶Æù@g\"ÌNCI\$àÉŒƒ€êx@WÃy¼*vuDÙ\0ŞvœëŒ†V\0èV`Gç½uµE®Ö•ÂÁf“l˜h’@ï)0@šT•°7‹íÛÂ§RAÊÙ·ò´3Û˜Ğ«/QÇ]ª,sÖ{VR±¡öF«¡A˜„<¨v×¥î´%@9‚ÀF¢Õ5t‰%Ö+º/¢8;¾WÑäÚÇJïĞo:ÖNÿ`ø	•ÿš´hìÁ{Ü£•î ËÔ8ÔEuª&°W|É†„‰®Uú&\r\"ÔÁ»‰|-uÇ†…Në¶:nc²©fV­‹ÂÃè#U20å>\"®²Ç>Ì`œk]î-¯ÇxùSØÍ‡Ğ¢©‰‚êcâ¡óB’—}Ø&`ˆîr+E­“\$œyNıŒ±b,†´´Wx ş-9åÕrÓ,’ü`å+œïíËŠù’CœÓ)˜˜7Ûx\r¬şWµfMŒSR¼\\èz¦ÙQ²Ì“”uA¬ºê2±õ4îL&ËHi Âµ°²¹S\$)e³“æg rÈŒ©ƒ\$]ZëiYs¤õ×kW–n>µ7E1k8ĞdÃró®škÁı¢ëEŞÙÛwÂwcmTy¹•ë¿a›\$tx\rB´÷=Šö¢*”<Èƒ l¡fôKœ‘N/¶¼	ÃlÕáükH“õ8 .‘‘ù?f÷›Úÿã6†Ñ‡¼{gi/\"à@–K›ñ@2ãça|#,Z¤±‡	³ñwˆd¬™“²…¼å6w™^&Áêt™çœP±…¥Äù]À¼›.àãÚí¡TìîkroÀ‰÷\ro=—%æ×h`:\0á±‚ö«”|êŠ£«a“Ô®6*:ÍÓ*‡ÊrO-^–’ñén«Íó§MÆ}æ»÷ÆAya±İ\nƒu^ì–ÀrnO\r±»¡`şT~</ğ¶wÄyş}æ:›|£ÏĞûÖÌ¡6»¤×ø®Ÿvî\rc<·b#ûàô§†î–\$ùsµê|ç‡‡V)«h‹TCùñ(Ä½ñ£È}");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n0›†S‘Øa9œÅS`°Çˆ“Œ&Ó(°Ên0˜†QIìÒf‰›\$±At^ sG²Étf6eŒ§yŒÊ()LäSÁÀP'…ÂáÌR'Ífq]\"˜s>	)â‘`œH2ŠEq9ˆÊ?ˆ*)‰”t'°Ï§Ø\n	\ræs<ŒPi2INÆ*(=2ÌgXá¸è.3™N„Y4èB<’L—üîi©Ì¥2İ´z=š0HøĞ'·êŒšÃuÆtt:œÂ¡Èêe¹]`pX9ŒŞo5šgòóIœÜ,2O4ãŞÑ…MÆS¸(ˆa…Š#¾Äàç’ïø|¹G‚bèôüxœ^Z[Çä™G¼ÎuTvª(Òm@Vò¸(†¼ÈbN<ŠÈ`æâXä1É+Œä9J8Â2\r£K¶9ğhå	 Áè`…‹ÆëI8ä›±S±ãt÷2ƒ+,£ÆIºã £pæ9aèØÅ< \\8Czôã\rŠ¨^òÈ]Ä1\\7C8_Ep^ÂĞÀéM1Àw\"'4fSX9ES|ä›…Ãk3ÄB@ÊæXa=No4t7ƒdD3µpŞÑàæ:)\\;° ĞÔğ\r)8HÔÅ44Pc=\nÔ!pdÇÕQN\rÌHï'ô¸š2¢#\"Õ¥m-¶b,Ç	ƒM.¡‰-IKÓ)ÀÉe'•\"ƒ´¤>2XÑÅ“eÄj:9^²1c„»È:YÉ@ËuËã“›4òXÇ& Ò|£)Ñ’´±-K‘xŒëªÂSğè1Óó\$â¡@\\…!x]\0Œ£ÕÎÀÂñ¤áF†COÄ:à1K‡Å*†F4aˆ»¼k˜úÈKÏš¾‘»ö2l¬pÌ3J<Èâ,2Øà8#ã †Õ\rŒÜášÜî ó¤h¬„·áF±Œİ‰2PëèŒŠl(È\$Ö°\nJÛ·-ŞÊÇ°cc~¹FÔîrøátbŞû½m{hğ.‡{ƒtkÛBµKc£z4ŒCª9…Û«~>ƒØúÈÚ`Æ“¹C Âs:âİÔ!cÅÙ®Úµ”*WÉHX:WÌ;Nà ¨j*/(á_p3ª¡HIãKlÉn!trã£Gã­º¤tCƒ	vƒ?mã¤£¾ Ÿ¢–\0CÙö¨§oÜ¥cbf6Işû'\ríbåÅ7h§`‚È9½iìd5’—taMè={É©ğ»`NoK‰	!d4ĞƒzWXdmH°š*€ÆÛS ]ÏĞ3&\0Ú°	d%A´-²…	Âì(„šÙùQĞ}ø‚èU!t7°ä‹†˜>x‹‘t{mY¹„0Ş@^±€\"Ñ=‡³Î@t\r¡°ÎÄ+Y§.¼·¼X¿\n«I'KTŸ€^(ìD.@öÜø++@¼3•ÒÔX‹	aEì!,Yéö2-432ÔŒõMOàÖI\$q%	Ä‹G¦X9™‡Â[R\0nÁĞ¸Â PŒJy\r òBÈp\\HÃpgSÉ¼±Faejk—.4¸†C.^ yi‘ˆ9‡PÄˆe\"Î”NY¬¢BHÃ#8ÑB1\"¶j\\Ú©x‡ğ#¾â@G 9†2¨Âf.ĞŒpsršTJ xÚk˜–È4KIlÈfù8z¤¥KÈ‡>AKñŸ¡n^’Ø=&ŒƒAÀ*?'³^%;ğî4Ü€³†Œ9¤Q’“hâN‡™>MÊ=['vHIİJ§‘“ÙvÆâ’RÊtƒó<Ÿ”Ò²Å^¢¼zÔÂ‰B^öhâ'µ‚É©Ğ)-'#”¤9JTÁ)Ø@jO!¨Úc,e˜j–¤–‡@H,‰ÂØjˆa™©vZŒ>­¡Ò·µ)E`\0\n‡áTPó8L<‰c•:F˜æ‰\$\nƒííœ†ÃÏCHm\"j‹y·AÛS¶ ÜSªQ„ğœÎÎ{T']WªUÚ)_L¥˜i¬mˆOš‚¥è„şÔP:g¡{¸’ZÄ—ø.ÿ{”¨‡Dh\n»ÑÁ‡a­\r]9¥tÜà!XA½[È°¦ã—Cœ»×\n:•”haœÎÚå\"İ¢a2Lmƒ·Í\\	ûëp5÷@ú«@m£ì|Wö•ÀÂ%È|u®áÈ+hKÃL&¢Ï Ş3ü.XWÜÙººÈñ*qƒÛcÃé‡%.K¿“€ÈA\r“xh¹â¨I\\ë¨d®Hº5\nÈq%Ôv*ÏãérIaÈ0Ê\"]8k,İÄAõŒ{Bç\\K/p<aëŸˆ1–0%–o2 ÏÃ™ªÁĞ%†Pò°@!ÊÔiµ9Ìçf1Ôù4ùŒ›àapØw¡`ÿAX¼upÁÑ½7ò\\Lº¡Ÿ°t¿„VÓÆ“a\$äWÒæèâãŸè:¹Èˆe}\rjC•X—º]ÚúÁ=m”¶•8Ëº\$‹ş·hÓ=¿K75±™RƒP°{rrŒ—,Ö_ëMzç%É§IZ—:ig”y%Hì5á½‚¤4QÀfØ¦ÇP÷¡lûş›hƒÅx³âê…‹vùX&¦\$sE¯úã0’äüé5•°íílW¤dÀ.DHŒ\$@š\r@&\rÁˆ9‡\0v¥7!çÈoÓ…ÎÃÁîÿ‰5áî)#XÈi]Îro¹~ÆËéwPêÂ›”QÛ=òàçqCíÇç×)«=ã#—@h'A˜tb;™Û0YDh'œ\nVW}(2†`VÄzv% tä\rÕ•ğe¨¸·—ì¾p.ë›ô¸“6H9¡=;n¡8C=¾	şù÷ıq€@a+¸Š†kÖ0aKá˜3Ep™×C +òA¿ÊEp®§C@>òX±ûâï'åL—ŸŠ{µƒXz´ĞoDÁ™%‡sP–W:[=ßv0’?ŞÜ·,%Àœ{\"í.á¨.YIôBğÜÂ	³\nWpVÂ)µ¾µqÉA£ÇM»V¼å5Ÿ÷IÿÙÇPıšÎ¿Ë¾ßè‰Á(ûb.¶\$ÇÕıò[ÒšÍjëÀ@¯êh\nF-4í8nj¬Õ+VMàxnj¾¦mb\$° ¨¬õª\n¶ÈÖ'¢~à¶ Z@º€¶ Vâº€L\"ã†p†Ø5€ğO,¨\0K¹\0Šª-6¥\r:”pÕDbÕnÕĞ\$¶mm\$i	)şO6(ÛĞAPIĞP+ĞVHpn¨§4?BàMğ¶·ãJF¾.öô€èá0Ğá+Ôi…jÇ Pş«(¯&æ»ãaŒÚ%l]'Üïì^@(œ5ƒN fs Ñcô bz ÃÏå>ïÂ¯x²°\0k éÄ\r<aXÌGé¨{\roL­ŒxÇ&Ï†Õ\$HjÄ¨1€Ü	¨<çl-Œú³\rËGKOÑ0•q+c	Pñj\r¤Ì¶ç­j‹‰Á‡½¯bdñ¢6¢Ç\0Ês‚à¢ñfÁ Ğ¶±z½Äj>«¤J°âıH®±'ââ3ê…(F¦Ñ‚ß¤Ğzª`O q¥ËX’`¶r\r ì1,ŸÏ¿gk lv­Ì|+°òækfì'ò=R@®4ë6Û`Ê-º.i~4ò#Å<\$²RÇ|u2N;Bn<’-#ì{%ˆˆû‰b=âå#Ìï(ÈJ1b%g¸¼ãz‹ü‹èG2«1^8wòòb^%/œ ï¾G­*ç 7D\0^‘rºc„p\n’ÎL,€ó0÷+ Xr§\$ Ê8ğ„×-)+(D‚ÓÀÔæàĞ\n„Á’b¬“©s1ìÓ2G\\{àÂ.I~`‡*³Îl]±“NÍÑ± X.#%\$KÀÁS'3ÌÓÌ6ƒ\$Cr‰C0Bô\rÓ--H|†“ˆ È†È,\"57Ó’´©Š˜îTÉó¥)în‰ÄíÄ¸íÃ/2÷LÄa7Ï2Kã1/d\"ÿ4SHïòæÍÔÍŒÜò¤Â1óª™\0O6R8|S|+©rÁÓ²œÓĞà¾\$O\re(Šà¨\r\"8‰ç­Ó‘s¦\r§©2ğÊ‘!*òmNTQòü»ø]jk+15ÓR hæ1óQ€z`pò¨R­E-SÒÒS\r1@vo.tÔTUFqEâĞ;g\\ç\"DQã`ä æ±sIÎv`¯ş0ó¥	+K€ÊpTŠ–)|„làñ¿ç8%'çLŸLJ@\r&+¨ òÔƒ²X“äÀÊå&åt¶á\\*'4ÇåNÆ£O\0·OTùDb\r1’ÕPL\0œ² ÉóºgMÄÌÅàÍ\"O>ÌŞÀC<tJôNº-:<àä™\"V]`¦/BŒğÕ*Ü§÷-£w<1f›MØüò’q±8œ-¢o¨~pKÀ×d‹	ğ¢Îñ\nñğ,4ÇWFÁ\$Æºnl\0Ù­ˆLš\n‰…®m®¸)Z€ÏZÉ†˜õ¦^@Î	 Â.Õíj×Dı]K` ú˜t\r¯Œ'\$^S'àO]éæSĞ´Ø“ô5ã ¤b%»\\ÕÀ\$‚L×Vau«Zï×U½]àÕà|EM†™•ß]ié]µÊ9¶1d	f.eP\r€à!Ås)Uj ñ¶W)\"ü&BSÅ•'Ã~Âvps	_'_fŒuT5G0ş5r<vzlàéhôrÕù¤YiqMD¸ıUqf¯Ôœ/êØä–;oó\rıTä¿ïş—`{\0rªÓ”\n¥‹U!ĞÕµÿ\"iï(‡£PãÄv¶ÈÒ¢Ìi0Úi°áOÜúòı¾²±// Â\rUÒr\"¥îQ Å\n\0Ö:ÀñEÆnÓk€Ê#~Ræ\"»en‹ èƒtJ„ã¶;·P	—Uu—Ctg¬ tLÀ‚8d\0@Ôl`w×~ —ƒxwŠ b	¨ŒJ æóƒvn\n€ , u;Ê×uuÅ.ğ V<o&|1ö×ÆQ|e/|ÀæHbQs·>w]7Ê70ã äãî ò!\"Ë4\0zWè2 DÆ\\W—<2\"ª€_ xwï|‡qJŒ&Âe‚·òæø24\"qX:d6ˆø+¢âã-Íƒ˜/ƒÑÈëâÓ„£[V7À1àß\rÇcÂĞ\n\0\n`©J ¸~+—'1f<m÷n¨V™u·pPD>!‚‰ÃG\0[a§™\r¨vî\0^\0ZK î¨~·&#ãŒ5€É…7¿w—‰%/‰Äî(à°¸˜¨FÔ¯?`»zÇ%vØjyøj‡\$w/—Ş!fqT,¶˜Ó‰Y7óI*jà¼F,ŸyRåK~r Ùrè’§_…Wí|x;`Üáâãƒnnù<'%xåÑ€³8‚ß€ í€b_€¢J å\" óh`Ev\\€Ëø#\"Ø<xY~>4Ù›ƒÉ–Ù„xdLÈûîFq9TlåjV#q-Ù=qÙD2MŞ‹˜ŠÆud+rTtgÁ“ÉÂcÂfn¢x¹^@™d<ùjy20±F\"ˆïÄ‹´‹‘sGpq¢h“*F­‚ Œ„Ïª„ÀY€â;9sŒ³™ìg½Ä\n‡ëL“QIS!ó¡'ìŞ‡ç#LÌ×Ân}BXZw<,Í¬d9 ­‚F€^\r1¨zõ®òYÙÙœcw;Ó@ly BªÂÀğ„fZ`Ş“úå@ù§‚I§Ú€Ÿl!¨qÈìñ¬#O£’usdŸ2ÉŒ Ê\n ¤	(œ\r¹dGF ª@ØÈÅÚİ®\0ß®E°1ÓßN3ø¼ÂtëÁYÇĞ%@u¨§U{¦mÆ=1ÀŞDBÍ>a&ÄÉÍ\nĞ×\0Bî|š¨:I+àĞ,³7'š8À¸à\\P®,\"ª-scÉsv÷œG£÷'Wš\$=}Ø[~ YŸycYi2sw³4\rKº.äP…U@èçœ\nAi2×Ù‚¹Y~'AmqˆÓšØ,4<šús˜sòò‰¬œ€È#Ì@Á`Xã\rÍ²³“Ñ1E=G4vG\0RÚ‚Ï×'’Y@7:Á¼Á@fPÁÌÊV{÷¿«!\"zÛô7M²o[ÄD!*–ÇWùÊ2j—2g8ñ¦Ÿ|L\$DÖiG}ìGRb!rî‚Ó&-3Ô£mõÈ™‚\r0÷qh1Ki,|ÈeÖ·zê—HôYF€dúiS3ë<ºc’ÊÍÇÕÀ“c£.nÀäiBx-r”v•ÅYJãÙN¼j!(“HfçÙîc„g) ó£%ÏCo[é(‘X‚G9ĞìŠB1İÎDG–¼•eL'8õe?]<O·#ĞèŠGTõ€b€XQ * àÃ\rpÁv¸»„\n<õ\$ûY\n:™±¸šmı`è@×Oë\0îUæ%ô5\0¸ `\0‚E}#M3!‹!GœtêwR¦BŞÙV¼“³œşûİ¹¦ÀIÜx=À¤şCÇÜ\"q^Ä\n€ŞåE-eáÔ#ìcì€²ÿıØVÒı;fX²<=Öı\0dO¯Şï–¼àò“á(®¥kŞ[\0ş(V¤YİƒÇÏş¨']¥‚åĞüWÎ°¿Ğ÷\rì}Íç,<h¯f@¦˜É	¬PŠ†3©;R£Õ¼\\ e‰‘×ÆŞ]äéb«²ÀW¯#Y¯zã®{äÃ®åÍyT¦»”â»™–¼ÑgCõëyû¹§]Òµ„?^©¢3@×Võ¾ÌÏ^Ò˜æ8—ËTèW>Íîb\rã>î]·»¬ÑÛÚ:ş—Ü~ôî=Î!}Ói'à]Ü¾2(ù\nFgª X©ºXn}â#Ü—œšñÒn`˜\rä?tñ XQÉ‘õLZny<îT\$cöá\\ç¹OĞ€îjîx)öÙLä–Cå×æ\$¯%^µï_')jîgŸèyŞî}tå{…<óÇÇ]ôG||©êS<bâ“ÇøèäÅë³&<Ÿ}Qè´÷Ø¥Wiw	å¿Ä ó1ë/Š\r%„1¥€xúÃ•? ÿˆi=3ò„‡…É`ëözI×Nêu×Z¡EÍ>~¨…´?ÇÎ¤n²ûïŞNr\0‚Ğ\$oj7Z& ª¶¹9S	tU`¢tc¸*¦Œ7s\rÅ|wç›•ÊNú<pO€Ø\"c˜©a¾7ËĞ\0€8<Í:ÄXy»vĞ& ’”µ Fnh\"ÃÉF €°npXºnDwÏ–qmhvIÚR„@­Á‹r%ZİâSFƒ¼Éæ‡*y°ª›®(Q¶åÅP(\nFlú1èA&pLƒ³Î ò|e¹<íW¡‚ü¬—á’eBƒÙ0F˜`m‹u°¹\nëÏXK–Š¥A™‚Å\\ÂºœËäNj}ïa@#d¨¢úf&\0ˆuÓå„*	DÈ ²Ñ“Çä(!	x×¡ÓÂä”ƒ·‚\$+Q5\n§5„o0³8\$-¡pX]B¢Ê…ü á‚A8bFĞK†D5ÂÂ˜#CVã9†Â'a´oĞÑ·E–©ˆüÓ™yˆíÄ†%0ZHŞh3»Q7'FI+Š·X88àrË\"\$9­Õ¤LÅ†¢‰ÿTóÜ.à=\"ÀB‰.NF˜LÂ”}Íœ @‘È¦¡,‰·…”èñfœlX‚ÜX·â`j˜’\$Ç‰@Cp©ašÀ.%ƒ’B€!4=`„*9|IâSâ¼¼ğåŠPT(}Sğö*C5oZ^Oî¶°½Ï\0ùş\"Ân˜Bpt‚h¡BRôn=\"€2o‰øÏŞµ÷xF)€ĞÜe”MEñ7Š±ßBKhÁ\"æ*ÇÁŒ::KîqXa§”Ä[,àaÜ\0ïG\$m°@aú”TÑÅ‰Ëæn˜Àòà„Ñ¨éÌğQ?ÚŞˆRàÂ¸ŒypåqR™îª¦3½€1kÓ[Ş¢×ôµĞîp@ël@zÛ5îŸ¨·i“R°£ÅJ-fœT!ày¸vÅ(ªóA1ãL5Koã(2å+xÂqÊj4xUÍEÄ=º9Qµ9±Î#q¨òª.-½z*äŞš(Şµñ¯ÁÛl|RNÄKà‹b…]YMdÉÁ’ëúyƒšxÿ,qÊRb'cßóˆHA,°zã,İ)!HæG¼ø‘Ñ¬u¾#ÀÈI±ïIRQF¢k€0‹\0òR-Ec=£ĞWò¡œ'Q¶9¼sIc Ö5±ê\r}zõ%6º8ÑÈfc3ĞÉAœ`.d×");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
idf_unescape($u){$ed=substr($u,-1);return
str_replace($ed.$ed,$ed,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
remove_slashes($le,$fc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($le)){foreach($X
as$Vc=>$W){unset($le[$y][$Vc]);if(is_array($W)){$le[$y][stripslashes($Vc)]=$W;$le[]=&$le[$y][stripslashes($Vc)];}else$le[$y][stripslashes($Vc)]=($fc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Ga=false){static$xf=array(':'=>':1',']'=>':2','['=>':3');return
strtr($u,($Ga?array_flip($xf):$xf));}function
charset($h){return(version_compare($h->server_info,"5.5.3")>=0?"utf8mb4":"utf8");}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($D,$Y,$Ua,$bd="",$Kd="",$Ya=""){$K="<input type='checkbox' name='$D' value='".h($Y)."'".($Ua?" checked":"").($Kd?' onclick="'.h($Kd).'"':'').">";return($bd!=""||$Ya?"<label".($Ya?" class='$Ya'":"").">$K".h($bd)."</label>":$K);}function
optionlist($Pd,$Ke=null,$Qf=false){$K="";foreach($Pd
as$Vc=>$W){$Qd=array($Vc=>$W);if(is_array($W)){$K.='<optgroup label="'.h($Vc).'">';$Qd=$W;}foreach($Qd
as$y=>$X)$K.='<option'.($Qf||is_string($y)?' value="'.h($y).'"':'').(($Qf||is_string($y)?(string)$y:$X)===$Ke?' selected':'').'>'.h($X);if(is_array($W))$K.='</optgroup>';}return$K;}function
html_select($D,$Pd,$Y="",$Jd=true){if($Jd)return"<select name='".h($D)."'".(is_string($Jd)?' onchange="'.h($Jd).'"':"").">".optionlist($Pd,$Y)."</select>";$K="";foreach($Pd
as$y=>$X)$K.="<label><input type='radio' name='".h($D)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$K;}function
select_input($Ca,$Pd,$Y="",$ce=""){return($Pd?"<select$Ca><option value=''>$ce".optionlist($Pd,$Y,true)."</select>":"<input$Ca size='10' value='".h($Y)."' placeholder='$ce'>");}function
confirm(){return" onclick=\"return confirm('".lang(0)."');\"";}function
print_fieldset($t,$gd,$Xf=false,$Kd=""){echo"<fieldset><legend><a href='#fieldset-$t' onclick=\"".h($Kd)."return !toggle('fieldset-$t');\">$gd</a></legend><div id='fieldset-$t'".($Xf?"":" class='hidden'").">\n";}function
bold($Oa,$Ya=""){return($Oa?" class='active $Ya'":($Ya?" class='$Ya'":""));}function
odd($K=' class="odd"'){static$s=0;if(!$K)$s=-1;return($s++%2?$K:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($y,$X=null){static$gc=true;if($gc)echo"{";if($y!=""){echo($gc?"":",")."\n\t\"".addcslashes($y,"\r\n\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'undefined');$gc=false;}else{echo"\n}\n";$gc=true;}}function
ini_bool($Mc){$X=ini_get($Mc);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$K;if($K===null)$K=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$K;}function
set_password($Tf,$O,$V,$H){$_SESSION["pwds"][$Tf][$O][$V]=($_COOKIE["adminer_key"]&&is_string($H)?array(encrypt_string($H,$_COOKIE["adminer_key"])):$H);}function
get_password(){$K=get_session("pwds");if(is_array($K))$K=($_COOKIE["adminer_key"]?decrypt_string($K[0],$_COOKIE["adminer_key"]):false);return$K;}function
q($Q){global$h;return$h->quote($Q);}function
get_vals($I,$e=0){global$h;$K=array();$J=$h->query($I);if(is_object($J)){while($L=$J->fetch_row())$K[]=$L[$e];}return$K;}function
get_key_vals($I,$i=null,$pf=0){global$h;if(!is_object($i))$i=$h;$K=array();$i->timeout=$pf;$J=$i->query($I);$i->timeout=0;if(is_object($J)){while($L=$J->fetch_row())$K[$L[0]]=$L[1];}return$K;}function
get_rows($I,$i=null,$n="<p class='error'>"){global$h;$hb=(is_object($i)?$i:$h);$K=array();$J=$hb->query($I);if(is_object($J)){while($L=$J->fetch_assoc())$K[]=$L;}elseif(!$J&&!is_object($i)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$K;}function
unique_array($L,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$K=array();foreach($v["columns"]as$y){if(!isset($L[$y]))continue
2;$K[$y]=$L[$y];}return$K;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$p=array()){global$h,$x;$K=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$K[]=$e.(($x=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X))||$x=="mssql"?" LIKE ".q(addcslashes($X,"%_\\")):" = ".unconvert_field($p[$y],q($X)));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$K[]="$e = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$y)$K[]=escape_key($y)." IS NULL";return
implode(" AND ",$K);}function
where_check($X,$p=array()){parse_str($X,$Sa);remove_slashes(array(&$Sa));return
where($Sa,$p);}function
where_link($s,$e,$Y,$Md="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$Md:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$N=array()){$K="";foreach($f
as$y=>$X){if($N&&!in_array(idf_escape($y),$N))continue;$za=convert_field($p[$y]);if($za)$K.=", $za AS ".idf_escape($y);}return$K;}function
cookie($D,$Y,$jd=2592000){global$aa;$G=array($D,(preg_match("~\n~",$Y)?"":$Y),($jd?time()+$jd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;return
call_user_func_array('setcookie',$G);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Tf,$O,$V,$m=null){global$Bb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($Bb))."|username|".($m!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Tf!="server"||$O!=""?urlencode($Tf)."=".urlencode($O)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($kd,$ud=null){if($ud!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($kd!==null?$kd:$_SERVER["REQUEST_URI"]))][]=$ud;}if($kd!==null){if($kd=="")$kd=".";header("Location: $kd");exit;}}function
query_redirect($I,$kd,$ud,$ue=true,$Ub=true,$Zb=false,$of=""){global$h,$n,$b;if($Ub){$We=microtime(true);$Zb=!$h->query($I);$of=format_time($We);}$Ue="";if($I)$Ue=$b->messageQuery($I,$of);if($Zb){$n=error().$Ue;return
false;}if($ue)redirect($kd,$ud.$Ue);return
true;}function
queries($I){global$h;static$oe=array();static$We;if(!$We)$We=microtime(true);if($I===null)return
array(implode("\n",$oe),format_time($We));$oe[]=(preg_match('~;$~',$I)?"DELIMITER ;;\n$I;\nDELIMITER ":$I).";";return$h->query($I);}function
apply_queries($I,$T,$Rb='table'){foreach($T
as$R){if(!queries("$I ".$Rb($R)))return
false;}return
true;}function
queries_redirect($kd,$ud,$ue){list($oe,$of)=queries(null);return
query_redirect($oe,$kd,$ud,$ue,false,!$ue,$of);}function
format_time($We){return
lang(1,max(0,microtime(true)-$We));}function
remove_from_uri($Wd=""){return
substr(preg_replace("~(?<=[?&])($Wd".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($F,$ob){return" ".($F==$ob?$F+1:'<a href="'.h(remove_from_uri("page").($F?"&page=$F".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($F+1)."</a>");}function
get_file($y,$rb=false){$cc=$_FILES[$y];if(!$cc)return
null;foreach($cc
as$y=>$X)$cc[$y]=(array)$X;$K='';foreach($cc["error"]as$y=>$n){if($n)return$n;$D=$cc["name"][$y];$vf=$cc["tmp_name"][$y];$jb=file_get_contents($rb&&preg_match('~\\.gz$~',$D)?"compress.zlib://$vf":$vf);if($rb){$We=substr($jb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$We,$ve))$jb=iconv("utf-16","utf-8",$jb);elseif($We=="\xEF\xBB\xBF")$jb=substr($jb,3);$K.=$jb."\n\n";}else$K.=$jb;}return$K;}function
upload_error($n){$rd=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?lang(2).($rd?" ".lang(3,$rd):""):lang(4));}function
repeat_pattern($ae,$hd){return
str_repeat("$ae{0,65535}",$hd/65535)."$ae{0,".($hd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$hd=80,$cf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$hd).")($)?)u",$Q,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$hd).")($)?)",$Q,$A);return
h($A[1]).$cf.(isset($A[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($le,$Gc=array()){while(list($y,$X)=each($le)){if(!in_array($y,$Gc)){if(is_array($X)){foreach($X
as$Vc=>$W)$le[$y."[$Vc]"]=$W;}else
echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$ac=false){$K=table_status($R,$ac);return($K?$K:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$K=array();foreach($b->foreignKeys($R)as$lc){foreach($lc["source"]as$X)$K[$X][]=$lc;}return$K;}function
enum_input($U,$Ca,$o,$Y,$Mb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$B);$K=($Mb!==null?"<label><input type='$U'$Ca value='$Mb'".((is_array($Y)?in_array($Mb,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($B[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$K.=" <label><input type='$U'$Ca value='".($s+1)."'".($Ua?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$K;}function
input($o,$Y,$q){global$h,$Ef,$b,$x;$D=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$q){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$q="json";}$ze=($x=="mssql"&&$o["auto_increment"]);if($ze&&!$_POST["save"])$q=null;$sc=(isset($_GET["select"])||$ze?array("orig"=>lang(8)):array())+$b->editFunctions($o);$Ca=" name='fields[$D]'";if($o["type"]=="enum")echo
nbsp($sc[""])."<td>".$b->editInput($_GET["edit"],$o,$Ca,$Y);else{$gc=0;foreach($sc
as$y=>$X){if($y===""||!$X)break;$gc++;}$Jd=($gc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($o["field"])))."]']; if ($gc > f.selectedIndex) f.selectedIndex = $gc;\" onkeyup='keyupChange.call(this);'":"");$Ca.=$Jd;$xc=(in_array($q,$sc)||isset($sc[$q]));echo(count($sc)>1?"<select name='function[$D]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($sc,$q===null||$xc?$q:"")."</select>":nbsp(reset($sc))).'<td>';$Oc=$b->editInput($_GET["edit"],$o,$Ca,$Y);if($Oc!="")echo$Oc;elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$B);foreach($B[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ua=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$D][$s]' value='".(1<<$s)."'".($Ua?' checked':'')."$Jd>".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'$Jd>";elseif(($lf=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($lf&&$x!="sqlite")$Ca.=" cols='50' rows='12'";else{$M=min(12,substr_count($Y,"\n")+1);$Ca.=" cols='30' rows='$M'".($M==1?" style='height: 1.2em;'":"");}echo"<textarea$Ca>".h($Y).'</textarea>';}elseif($q=="json")echo"<textarea$Ca cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$td=(!preg_match('~int~',$o["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$o["length"],$A)?((preg_match("~binary~",$o["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$o["unsigned"]?1:0)):($Ef[$o["type"]]?$Ef[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&$h->server_info>=5.6&&preg_match('~time~',$o["type"]))$td+=7;echo"<input".((!$xc||$q==="")&&preg_match('~(?<!o)int~',$o["type"])?" type='number'":"")." value='".h($Y)."'".($td?" maxlength='$td'":"").(preg_match('~char|binary~',$o["type"])&&$td>20?" size='40'":"")."$Ca>";}}}function
process_input($o){global$b;$u=bracket_escape($o["field"]);$q=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($q=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($q=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($q=="json"){$q="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$cc=get_file("fields-$u");if(!is_string($cc))return
false;return
q($cc);}return$b->processInput($o,$Y,$q);}function
fields_from_edit(){global$Ab;$K=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$D=bracket_escape($y,1);$K[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$Ab->primary),);}return$K;}function
search_tables(){global$b,$h;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$oc=false;foreach(table_status('',true)as$R=>$S){$D=$b->tableName($S);if(isset($S["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$J=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$J||$J->fetch_row()){if(!$oc){echo"<ul>\n";$oc=true;}echo"<li>".($J?"<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>\n":"$D: <span class='error'>".error()."</span>\n");}}}echo($oc?"</ul>":"<p class='message'>".lang(9))."\n";}function
dump_headers($Ec,$zd=false){global$b;$K=$b->dumpHeaders($Ec,$zd);$Ud=$_POST["output"];if($Ud!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Ec).".$K".($Ud!="file"&&!preg_match('~[^0-9a-z]~',$Ud)?".$Ud":""));session_write_close();ob_flush();flush();return$K;}function
dump_csv($L){foreach($L
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$L[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$L)."\r\n";}function
apply_sql_function($q,$e){return($q?($q=="unixepoch"?"DATETIME($e, '$q')":($q=="count distinct"?"COUNT(DISTINCT ":strtoupper("$q("))."$e)"):$e);}function
get_temp_dir(){$K=ini_get("upload_tmp_dir");if(!$K){if(function_exists('sys_get_temp_dir'))$K=sys_get_temp_dir();else{$dc=@tempnam("","");if(!$dc)return
false;$K=dirname($dc);unlink($dc);}}return$K;}function
password_file($mb){$dc=get_temp_dir()."/adminer.key";$K=@file_get_contents($dc);if($K||!$mb)return$K;$qc=@fopen($dc,"w");if($qc){chmod($dc,0660);$K=rand_string();fwrite($qc,$K);fclose($qc);}return$K;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$mf){global$b,$aa;if(is_array($X)){$K="";foreach($X
as$Vc=>$W)$K.="<tr>".($X!=array_values($X)?"<th>".h($Vc):"")."<td>".select_value($W,$_,$o,$mf);return"<table cellspacing='0'>$K</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if($me=is_url($X))$_=(($me=="http"&&$aa)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$X:"$me://www.adminer.org/redirect/?url=".urlencode($X));}$K=$b->editVal($X,$o);if($K!==null){if($K==="")$K="&nbsp;";elseif(!is_utf8($K))$K="\0";elseif($mf!=""&&is_shortable($o))$K=shorten_utf8($K,max(0,+$mf));else$K=h($K);}return$b->selectVal($K,$_,$o,$X);}function
is_mail($Jb){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$_b='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$ae="$_a+(\\.$_a+)*@($_b?\\.)+$_b";return
is_string($Jb)&&preg_match("(^$ae(,\\s*$ae)*\$)i",$Jb);}function
is_url($Q){$_b='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($_b?\\.)+$_b(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q,$A)?strtolower($A[1]):"");}function
is_shortable($o){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$o["type"]);}function
count_rows($R,$Z,$Tc,$r){global$x;$I=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Tc&&($x=="sql"||count($r)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$r).")$I":"SELECT COUNT(*)".($Tc?" FROM (SELECT 1$I$tc) x":$I));}function
slow_query($I){global$b,$wf;$m=$b->database();$pf=$b->queryTimeout();if(support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$ad=$i->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$wf,'&kill=',$ad,'\');
}, ',1000*$pf,');
</script>
';}else$i=null;ob_flush();flush();$K=@get_key_vals($I,$i,$pf);if($i){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($K);}function
get_token(){$re=rand(1,1e6);return($re^$_SESSION["token"]).":$re";}function
verify_token(){list($wf,$re)=explode(":",$_POST["token"]);return($re^$_SESSION["token"])==$wf;}function
lzw_decompress($La){$yb=256;$Ma=8;$ab=array();$Ae=0;$Be=0;for($s=0;$s<strlen($La);$s++){$Ae=($Ae<<8)+ord($La[$s]);$Be+=8;if($Be>=$Ma){$Be-=$Ma;$ab[]=$Ae>>$Be;$Ae&=(1<<$Be)-1;$yb++;if($yb>>$Ma)$Ma++;}}$xb=range("\0","\xFF");$K="";foreach($ab
as$s=>$Za){$Ib=$xb[$Za];if(!isset($Ib))$Ib=$bg.$bg[0];$K.=$Ib;if($s)$xb[]=$bg.$Ib[0];$bg=$Ib;}return$K;}function
on_help($eb,$Re=0){return" onmouseover='helpMouseover(this, event, ".h($eb).", $Re);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$p,$L,$Mf){global$b,$x,$wf,$n;$gf=$b->tableName(table_status1($a,true));page_header(($Mf?lang(10):lang(11)),$n,array("select"=>array($a,$gf)),$gf);if($L===false)echo"<p class='error'>".lang(12)."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($p
as$D=>$o){echo"<tr><th>".$b->fieldName($o);$sb=$_GET["set"][bracket_escape($D)];if($sb===null){$sb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$sb,$ve))$sb=$ve[1];}$Y=($L!==null?($L[$D]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($L[$D])?array_sum($L[$D]):+$L[$D]):$L[$D]):(!$Mf&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$sb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$q=($_POST["save"]?(string)$_POST["function"][$D]:($Mf&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$q="now";}input($o,$Y,$q);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Mf?lang(15)."' onclick='return !ajaxForm(this.form, \"".lang(16).'...", this)':lang(17))."' title='Ctrl+Shift+Enter'>\n";}echo($Mf?"<input type='submit' name='delete' value='".lang(18)."'".confirm().">\n":($_POST||!$p?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$wf,'">
</form>
';}global$b,$h,$Bb,$Gb,$Ob,$n,$sc,$uc,$aa,$Nc,$x,$ba,$dd,$Id,$be,$Ze,$yc,$wf,$zf,$Ef,$Lf,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$G=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;call_user_func_array('session_set_cookie_params',$G);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$fc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);$dd=array('en'=>'English','ar'=>'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©','bn'=>'à¦¬à¦¾à¦‚à¦²à¦¾','ca'=>'CatalÃ ','cs'=>'ÄŒeÅ¡tina','da'=>'Dansk','de'=>'Deutsch','es'=>'EspaÃ±ol','et'=>'Eesti','fa'=>'ÙØ§Ø±Ø³ÛŒ','fr'=>'FranÃ§ais','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'æ—¥æœ¬èª','ko'=>'í•œêµ­ì–´','lt'=>'LietuviÅ³','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'PortuguÃªs','pt-br'=>'PortuguÃªs (Brazil)','ro'=>'Limba RomÃ¢nÄƒ','ru'=>'Ğ ÑƒÑÑĞºĞ¸Ğ¹ ÑĞ·Ñ‹Ğº','sk'=>'SlovenÄina','sl'=>'Slovenski','sr'=>'Ğ¡Ñ€Ğ¿ÑĞºĞ¸','ta'=>'à®¤â€Œà®®à®¿à®´à¯','th'=>'à¸ à¸²à¸©à¸²à¹„à¸—à¸¢','tr'=>'TÃ¼rkÃ§e','uk'=>'Ğ£ĞºÑ€Ğ°Ñ—Ğ½ÑÑŒĞºĞ°','vi'=>'Tiáº¿ng Viá»‡t','zh'=>'ç®€ä½“ä¸­æ–‡','zh-tw'=>'ç¹é«”ä¸­æ–‡',);function
get_lang(){global$ba;return$ba;}function
lang($u,$Ed=null){if(is_string($u)){$ee=array_search($u,get_translations("en"));if($ee!==false)$u=$ee;}global$ba,$zf;$yf=($zf[$u]?$zf[$u]:$u);if(is_array($yf)){$ee=($Ed==1?0:($ba=='cs'||$ba=='sk'?($Ed&&$Ed<5?1:2):($ba=='fr'?(!$Ed?0:1):($ba=='pl'?($Ed%10>1&&$Ed%10<5&&$Ed/10%10!=1?1:2):($ba=='sl'?($Ed%100==1?0:($Ed%100==2?1:($Ed%100==3||$Ed%100==4?2:3))):($ba=='lt'?($Ed%10==1&&$Ed%100!=11?0:($Ed%10>1&&$Ed/10%10!=1?1:2)):($ba=='ru'||$ba=='sr'||$ba=='uk'?($Ed%10==1&&$Ed%100!=11?0:($Ed%10>1&&$Ed%10<5&&$Ed/10%10!=1?1:2)):1)))))));$yf=$yf[$ee];}$xa=func_get_args();array_shift($xa);$nc=str_replace("%d","%s",$yf);if($nc!=$yf)$xa[0]=format_number($Ed);return
vsprintf($nc,$xa);}function
switch_lang(){global$ba,$dd;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$dd,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($dd[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($dd[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$pa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$B,PREG_SET_ORDER);foreach($B
as$A)$pa[$A[1]]=(isset($A[3])?$A[3]:1);arsort($pa);foreach($pa
as$y=>$ne){if(isset($dd[$y])){$ba=$y;break;}$y=preg_replace('~-.*~','',$y);if(!isset($pa[$y])&&isset($dd[$y])){$ba=$y;break;}}}$zf=&$_SESSION["translations"];if($_SESSION["translations_version"]!=3030794588){$zf=array();$_SESSION["translations_version"]=3030794588;}function
get_translations($cd){switch($cd){case"en":$g="A9D“yÔ@s:ÀGà¡(¸ffƒ‚Š¦ã	ˆÙ:ÄS°Şa2\"1¦..L'ƒI´êm‘#Çs,†KƒšOP#IÌ@%9¥i4Èo2ÏÆó €Ë,9%ÀPÀb2£a¸àr\n2›NCÈ(Şr4™Í1C`(:Ebç9AÈi:‰&ã™”åy·ˆFó½ĞY‚ˆ\r´\n– 8ZÔS=\$Aœ†¤`Ñ=ËÜŒ²‚0Ê\nÒãdFé	ŒŞn:ZÎ°)­ãQŒµ™öú£°Ak¾ßÄê}äˆe‹çADÍéœêaÊÄ¯ ¢„\\Ã}ö5ğ#|@èhÚ3·ÃN¾}@¡ÑiÕ¦«ÁËN›t¼Å~9‚ˆ™ÈöBØ­8¦:-pÎüˆKXÂ9,¢pÊ:ë8Öã(ß\0À‹(˜½ Rì¼,î’üŠ@.£®9Â#ÈåëPÜê/Ãkz2¶=-Ã(îß³£jŒCË:„²„ú/¢–ˆZrxjÔ°XÆ4Mèò;¼P³¯0ØÚÛ#b×Êˆ¼Í±’LÌ|)£Ô2Íbè¸Êğ`üŠq¤W\"©ÓhÂ“1N¸@ûÆˆ<h©H‰ËC\$ÉóÕQƒuØ%\nXî	@t&‰¡Ğ¦)BØóU\"ìÚ6…£\$W@ÍJk6¸CdÃ±0[¸3ÃbÖÑÊƒ“9Eƒ:\n¼Šƒz5\rÃÊ6¾£Æ¤c0ê6FÑk€2ğbD3ĞôÒÖŸ¤3Ü:³¡pfÙòÕ¦„ZÖÅµnFöıÃi:+MP—UØ¤¥Øì0ØI†)ŠB3.7q \\P-ó¾Ë:a~­i@™Ùh=«kvÍ¶Ò[-4§J2\\ìªì_4Ö87%	R¢¿2<SIn_‰‡‰Ğ€ŒÁèD4Oc€t…ã¾¤\$Rü,ã8_koh9åAxDĞL¨é¥è³z5„Ağ’±\"óğèã|Ÿ§ĞÀĞ7¿÷#2ŒgNJ™.U‘„À%ÊÚ\"ˆ²j”0..¿•-ÎØ@î²ïÅ/é¨@(	ƒÖñì0@(JD€¤X:LÑ`£v„„_G8C•%‰rau¯¸åÍ¢BgÑ\$®@ÈŸ)öºkÉôn³°µ÷Yšô/H‚ƒ.é\n–¦¯¸³>Ÿ #‹gÇÓ@ Œš·‹ÓC<ì;í\0àèX—…Z]O\naP+pÂÄÂ‘5Z¦x£ÂFY×ûÙ:ğ1¼;“^INpr3»ÌLi(11›Ó2G‰\"áŠ˜IQ“\$a*:cüoË‹/‘÷ÁQê‰'Êfœ„äËÔA1q2¨Ò8­â@IG¥!8õpñ„¡B‚Ãb aX	â-.èºT±¦ŠÌÚ1¦hĞ loØ4†0ÖæÙ° væÍ‡¸ÆøC2Ò/¤œ8Òš}×ø \n¡P#ĞpSƒq®.è.â\\k‡‚2©a#J˜‰«šº¶Dœ‰83õZ¹Ò0h‰L (2•®k\rÈ\n!²\rbÀ]ËÉï6“¸îfl²ZOäŸGµˆâ¹:é„É3tÇáLÉvÉğï'¤¹ùK¼œ®“Ld& (!‘ãˆ‡š\n`/R”¼¨¬ ,‘%ÅÉ©,” ›¯¨¿-\"!	á.3Zµt\$P°\\";break;case"ar":$g="ÙC¶P‚Â²†l*„\r”,&\nÙA¶í„ø(J.™„0T2]6QM…ŒO!bù#eØ\\É¥¤\$¸\\\nl+[\nÈdÊk4—O¡è&ÂÕ²‰…ÀQ)Ì…7lIçò„‚E\$…Ê‘¶Ím_7GT\r•eDÙƒ)*VÊ™³'T6U1ÙzHØ]N*PZ,¡BT`Šªìî%VDª5ØAU0‰H S‹d!iQl(p(N¯…Â1÷e4înY7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€é²:œ†¦¼èh4ïN†æ ­—6IÏEq¥ánÔh/\\äQY2´Òn3Î'’ş½v	•leîÊı†¬ç7©Ftl.nòl?O<B?û¢[%ß!ÅÌ§Ez¡-ˆk‰®Ğâ)ƒš ©@ê\n<­§Šònƒ°©Œü¡Ås\"B§!ïã¾Ì*¹\\ì'ÌbˆU'šÌHĞA°U ìÂÜ‘À,ºâˆ®hš‰¿R©íti§+¹c@p*a£¤g\0H(lz­Ìhsô<nêö‰•Ìd”ÇÎl“»<OH\$=/'’Z«4,‘Ç!(È‚ZG\"-àØA j„8§ŠtU®‰dE+(ƒC'ybÎ¤eBq\nÖil¨êFL\"F»N+İ#ÑÄ‡MñbşU‘{+eÌš®¨J²–&ÊˆTª*îı*Ujzl[U}¸)”}¶ï@³Õ‚@	¢ht)Š`PÔ5ãhÚ‹c\rü0‹´*î[(Kw&®Ò ä:\r€SPÕ#“^7ŒÃ0ØóŒ·SC¨e[N—%ÑMéØ*\ríÚ0ÃÈ@:Ã˜ê1Œmàæ3£`@6\rã;Î9…ğå—#8Âó„E\r¯8êâ…˜R›ˆb˜¤#@Ö2È&8lòè]TÈZ_&°røğ´Î©Cƒ†×—Kğ˜(RK†Û¤šÂö•Ğ02É°Fl›1±´\"\$m¶0yü¡PC	£æâMŸ49ãxåGŒ£Àà4âC&Æ-^\$3¡Ğ:ƒ€t…ã¿t#&š7£]Ñá~¹ã.b4ãp^7Ø‹v:v\"û›–\ra|\$£ƒr6ëƒ xŒ!ôC¦®8ßG·ú`Ã­é#£gàå~\0Ü:*’jñíL\"^„“©¡:Mì¡8D ÂVÊCfa¶’FIQ9\\+Íù\r¤:fPp\rÁ6˜¤\$å›áVê¥R&ßNˆ´\\„¹S'\"¹\0WC•rä ¢6ÓbI9[N½¶Ãº1D(Å şT¶å„#c*ê¼…Ğ_û‰)¤Ü\$‘ òjA\0d\r*<Ø¿ æ×aÈ7¬H8‡Sxüƒ0r\rá´|ÆéÇk€€1³È¾o£7h¬†¿£İP	áL*²\"Á‹¸©1Z%%±\n¤ê[e‚¢y#Ó~„aÇå¬·Ôˆ²*ğ^EIóÇJkf…©å]—vO\0P	@ÓÅ€ÆË{Ş\rîô:ĞÄC8 \naD&\0Ìn\ry·u¡*	z”xi{®‰ù˜Ñ£d_F¹á-é0N…A]\n¢’C·ÏâdPõ&¨c9äÂÚ\"j¼»\nÂ…9'sù1M¶vƒ¶¢Q\$}2&R”¥ÊÕ r\r€®:†ÆÁÍ— €;Ùó*}a¤32é¬MÂ4ÈiÕÍ‚\0ÄkÚ@U\nƒ€@×=è‰ÏÄÓa\$©˜U_	ÊIîQÑğ–@ê\0LÈòjl­¹\\Ê:`Lúzsn­éü6%ûP©“”FÇÛb~:‰™	B…=Â‘à€!Ô!‚G*.¸Â!Ò\n[”íØ¾’òt€KÚ6•’\$ÉwE…°í1Ñó†rÈ²æ§\r€’ÓDUÌL¥\"\$œš \0Ã)¹g2Yd +˜úˆQvU·SØ\nar©T88-T”U¸°(BV\nŞSP„";break;case"bn":$g="àS)\nt]\0_ˆ 	XD)L¨„@Ğ4l5€ÁBQpÌÌ 9‚ \n¸ú\0‡€,¡ÈhªSEÀ0èb™a%‡. ÑH¶\0¬‡.bÓÅ2n‡‡DÒe*’D¦M¨ŠÉ,OJÃ°„v§˜©”Ñ…\$:IK“Êg5U4¡Lœ	Nd!u>Ï&¶ËÔöå„Òa\\­@'Jx¬ÉS¤Ñí4ĞP²D§±©êêzê¦.SÉõE<ùOS«éékbÊOÌafêhb\0§Bïğør¦ª)—öªå²QŒÁWğ²ëE‹{K§ÔPP~Í9\\§ël*‹_W	ãŞ7ôâÉ¼ê 4NÆQ¸Ş 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Üº¸%3–©5Š!n€nJµmk”Åü©,qŸÁî«@á­‹œ(n+Lİ9ˆx£¡ÎkŠIB›Ä4Ã< ŒÀ šâ5mÊnÂ6\0êÀîjÀ€9èzĞ ª,X‘¶í2À§§Î,(_)ìã7*¬è¶n¢\rÁ%3l¥ÃM”ˆ¨ \r²öã¢m¢ä‡KÑKp€LKÂúÙC	‹€S.ëIL•G3ÔW9ÊS·2bÙ!¯«|–Æğ;I7ÅÒäŠë#´Û=ÀĞõMó“TŒRí/Ô\rÒ®­ÓY'ERj!*§¹ôâØƒÅ5eO¯;w4ÓÓM¥±\n§Ò•AFOõ‚ğW5b£[”ó\\ü¢*|NKĞÅEPÂ”ª­»#!×ËYÈªóiX0]×R0l*‚#c\$ñW“àHK^Ôã´9r/ˆóA l¦(´mœ¢N)òR‘7:k\\ßt¸µ¤n¼I«ÂºEÕväMÕ]ƒEy…acÈl+r¼\"òqÄ@yúÂC…ªúÜ·J}ÓF5¤=]z dı3ŞP•>_Û.)@¶F·4:Ô %åc1úÙ­ä©‚ƒ\\QŠ5R`X\"óe¶ú@A²Û4£´mZÒÙ•íå6hÛîNÚŸ44’p\$Bhš\nb˜:Ãh\\-\\èÔ.©èM¥ËìMƒœà±,Í4Èy`Ø:@SºïŒ#“È7ŒÃ0Ù°%•oÍòÌıql¨XSR3P*\rï8Ú0ÃÈ@:Ã˜ê1Œoˆæ3£`@6\rã<h9…˜åé#8Ãf¼6Æƒ«ôaO|­Ïe9«¦‚2–Ih%FšY”JoÄ­Ô“g^axVê\rw\ngòDú¦Mç®˜WVP—[q1JÁ–äêÊºÕl*àâŠbDÔ`·p®·Êñ jÕ‚¥¹Õ“T†”`1N	¡„9Ÿ äz\" sá¼9/àÊ€ivÁ\0xO¶Àô€è€:à¼;ÆP\\C#ğ\rÁ”9è˜Áxe\rÑÄ<§ªC|sGÍÚŸ\0éúz¬à’Cî\r±È:À^Añq>R,şõü}Ï\rg4‡CÑ|k\rÎaTBdx²–¨trœ¨µd±Ù¢5bú*H`—Í’ƒ:R4Jâ¢œ¡ápn˜í&Hu€H\n\n™.‚È¨åó€³Ú‚äÚVj/j(‘Ã.¨2vLY±Æy¿Àô\n·ô	0¢„p(7ğWR‰ ,(‰c–T¨°R´ëTkT¨Ê¦vUŠÂH \nn\\&Â\0şÇ•Æ®¨(C›1nq3¶{\niŞ@Ò‹ffIˆÌ!¦Bä’ÿ5Ä\0È˜R®n¥•7¦0\$‘ğòw\0d\r+øóIàç¤¹ı>NØ8‡Sã'ƒ0r\rá´Òï\"9ü@€1¾\nn|éÔH>ùM¥€½'`¦€€(ğ¦uY/¦“\"Ø·¨Bd`Ô›\nR†h9\0dŒî¨”YÖ:äZr™y³yÕI\r¸¶¤F¼ã&úNva0vTÀ1½§\"C|h`1Î˜Q	€€3ÓÈ{\"ÀF\n“-è/àÓ\"\"d“¶r¡TJnmië{&³r¾Wˆ!É@€8˜£<´O“n¸¥ém&Úø(‹îİCLq'bŒ›ö&ƒ\nhA0-ì#œFæä/{oréT¨ l*´¤¢Â“aê‰º·]Ä]¥ú¥©EÇ Õz[ƒARo5o\nùßh‘GA\rØÀWSCHc\r`‚<Ù0@ƒl§ÇÍçI`Ò”.¡ÏIëA\0b“¸P¨h8È1ádj]Zó¾.şõ–øTXJ|›\rİ`‚Ã*®œ>›—²âÑFë|,AQ[ô£•öÛÍ€y”Ş»‰€[™O»\n‘c¨Šı3`k=½(!}±ú,Ìo™A7a‰ŒÌ– fEà\\#u™sëù¬ÎÅâ„DR–JhÌË•8®½%S¢Vˆä‡^‚ˆ+àÒ …§ev‘2®©L*N·¨)Äf,\"ö0°EÏé…@PL²4ÉêW&baä?÷ \\–/ò>¶Æ°i…g¸7xóÊ÷a£Ê{ƒú™¼½7šV>Ï-ICcÓg2Ñ·»…ë3)²ÂÆôîÙQ›mC²|jÉ®^Çñg-m:";break;case"ca":$g="E9j˜€æe3NCğP”\\33AD“iÀŞs9šLFÃ(€Âd5MÇC	È@e6Æ“¡àÊr‰†´Òdš`gƒI¶hp—›L§9¡’Q*–K¤Ì5LŒ œÈS,¦W-—ˆ\rÆù<òe4&\"ÀPÀb2£a¸àr\n1e€£yÈÒg4›Œ&ÀQ:¸h4ˆ\rC„à ’M†¡’Xa‰› ç+âûÀàÄ\\>RñÊLK&ó®ÂvÖÄ±ØÓ3ĞñÃ©Âpt0Y\$lË1\"Pò ƒ„ådøé\$ŒSÓŞLà®\$ÓyÉò¨ü†ğËÎ)ínÔ+OoŸŠ§M|°õ)àN°S†,ê,}†ÏtÒD¢£¨â\n2\rÃ\$4ì’ 9ªŠ²’¬I¤4«ë\nb*\r#ƒæ)ã`Nù©(ÒË£(9ºƒ\nHã0K« !£îú†KÌD	(ğÈã+Ğ2‹³ &?ŠüP\"¹‹¬ICãœB»B Œ(8Ü<²HÜ4ŒcJhÅ Ê2a–n|Ä4ÌZ‚0ÎøèË´©@Ê¡9Á(ÈCËpÎÓÄõ1š¶¨^t8c(¥ì(š1ØƒÃzR6\rƒxÆ	ã’Œ½&FZ›MâÇ.Ì“29SÁ¤92“W ˜e”·M¸ P‚Œ¨«q]\$	»Èãs\\øìÓ¿cŠ„î1®µŠOYU­n\"“6\$ö4½fÏ¶…`2ÃsÇZVÒäGL€\$Bhš\nb˜2xÚ6…âØÃŒ\"íT2ÕJ‹Åd‚4m*Jã0ÌşM©ˆ¦—µÃ\$”âZtÛs² Ş®'Ò»òÉµ<Ä31A2¼2OÄ‚<£Ã8Â¼¸Ãuœš¯/ĞÊaL.7nø@!ŠbœÈø2ÁD9/Hõ»c¤Ê8Ìº¬TDà(xìÚM7)&)œÂŒM›L®MÚ:fK®ªëVòğäÍ¹;	²«p“¨æ;®³¼	¸²š€@&ƒC(3¡Ğ:ƒ€t…ã¿<#é´Ú˜.£8^ïôğ+¾ŒÁ!xDÄ\$­ˆéÊ‹èÜØ5„Aò(úÎspxŒ!ôšÈ@ß;™ Ã¢¸Öj€9d³rc%4Š:¡½ˆKç§EBCjz¶X›®ÀÓÊ¿0LË	óÃ­”	ôÕ¨( \$\n0Ş‹nx@@\n\nˆ)CˆP‹%³|ôÜißK¥ì‚—–š(zë[FiÃ)bX´ÊÑèDÄt\nxPá0¤U´Ì¢tEeD˜„’\"M\$Nåmf¥gnÁ”zÄ•#ĞdtEdİ4`Æ¦H9ˆ‡Ø¶“dN\n3ö	áL*dÈÎ‰ñ&v™&¢ƒ(d§)!ÇüWÌ(w¤/”VäÁ`v@m’²»UCn…Œ2˜VtmTÉjÁˆ»‚\0¦BaH#€c‚\0ŒÊlNäõş,Ø.¡ô 2f ˜õ¶A¤eÀ9B¦-'Ã\nçRGõf¡éJô¤ñš;¼’JÙHG!T{‚dåã†’VaWŠ—Il­¸±/eú*gr¼‘®°Œl‰GH!°Ät¸Õ¦ŒrS.¬†Ù—	(-S\$Ä#ø8|Öhb#¬à*…@ŒAÂİZ87yO,ˆ©u–¬ìÏ!D‚oæ)ƒgRR}L¤û?MC…³å¶äÂªÖz\$É€Ä˜·2Ê÷l'}O¦øÀbèŠ(Œ&<õ³û(Îú˜#S¤ÊGSQ&›Æ:d’`ÃÖlÚ.¤Ä(µ@Ní&A¼*‡ ¦ñ”ŒÄ†§z?ÓåN!ù€§’“‡%ÅKTPÅÕœaJ*ePPñ%RÌùU0!¨ÖVë.6TU…@Â×€Tå@@)\$ğZñ˜t";break;case"cs":$g="O8Œ'c!Ô~\n‹†faÌN2œ\ræC2i6á¦Q¸Âh90Ô'Hi¼êb7œ…À¢i„ği6È†æ´A;Í†Y¢„@v2›\r&³yÎHs“JGQª8%9¥e:L¦:e2ËèÇZt¬@\nFC1 Ôl7APèÉ4TÚØªùÍ¾j\nb¯dWeH€èa1M†³Ì¬«šN€¢´eŠ¾Å^/Jà‚-{ÂJâpßlPÌDÜÒle2bçcèu:F¯ø×\rÈbÊ»ŒP€Ã77šàLDn¯[?j1F¤U5›/r(ß?y\$ßºâ¡±Š¡»”Í¦Ö´JòMxÃÉŠ‹(¨³So\0ë4š‘Êu¾˜=\n Ü1µc(Ö*\nšª99*Ó^®¹ïÃXıƒ˜Öa¯£ ò8 QˆF&£˜Ø0B#Z:¾­ûˆ0¡Æ)02 ô1Œ P„4§£“L\ni©ŠRB8Ê7±€ä4Æ¢˜Ê=#Ãl:\"µ-ˆå²š‚	,D7B‚,4‘B9·£œj*Mc¤¾üÂ‘;éâî'5n¢\$Ü\rq J2Âı3Üû?ÃTù??K˜0Òàİ„°\\”˜böL-CÌ5Œ2t4ÑàÊ‹2ˆ&&ˆ‚5Æ`à9¼Â(Zñ£\0PŸNi¬G\nK¨³P6´ƒ.V£#D;[ËUÜl<'d¤Ct>µ˜ÂŒÀH…f6uq1\rÖíjÖƒcmYˆÕŸZ(ÕÇk#šVı˜„|°\$Bhš\nb˜2Ãh\\-X(ä.ÕÕ‚HŠ/àPØ:JbRŒÏÃ2…Gªc,ÓVÃ\$ß1²2ñ3]\r.ø@6Ñ£B4‰\rc¨æ¹ÙÉ¼İ1N-0XYn&¿#RcVÿ·ôÛ6\r°‘d™6P7åNu˜eyœàPÎEnoœåÏŞyœQ£¶iäú\$5lé&JŸiznY—j’/æ©®¯kM¹Ÿçù¡Íƒ4ˆ×i¡{\rià@!ŠbŒC¾ëC2R6°S3»ëÉ]o¸j2nùM\$ÂÎ.Êe¸Èç2\röí\rSŒG›Í»|FïëS7>ù•¯®}ÌË¼\nŠ’L(M¦K³ØvC7é\0Ê3¡Ğ:ƒ€t…ã¿¼T»æ4%#8^1az²ıİ`Ü„KğÂ9ñ‡ª/ŒQÜ5„Ağ’C;H¡¹Ÿ°xÃ>dèÀ‰”Â ÍÌİ€&´Œ¢ŒLƒ+ª}Îí`RàÉÙq5O£^’BpN“©%eä½Áóäú>-T‡µS¸ğÃ¨pƒæ>¡†pp!>F±Á0Ğ€H\n\0‚ÃZ¯œğ(*\0¥¿Á0éİª`vâ„ã8D0ÅÑBmf»T|#†<d¼Î8E	ÉÛ‚8¦¢jãÓ¯wp€»Ãê‚RéÁ©ğ53·Øİˆ‘T¤\rr\$ˆƒ	B‡á2>\"ÍËú5íØ£BşÚ\0vWÇì•¶R„ÉŠƒ:@'…0¨w\rkÎj§´Ã\rú%â=Ğ@Ê‹xo5èÖ†`ÒÃ©Ã®xÔ‡\$âd¬+.àÂ˜Q	„”“•`Ú\\Ìz0#„x(êC|^&Á*D³~L\"±Brı‘ÄÌÆÊ\\¥'A¼Ç§”ú³\røs<aéh¼é\røb ø5šù\"CÒu“ô(O¹úJ„ÿDdüÜÊ\rqÚTŒÒ¶\n(R`a`K¡sR„h\"á¤Åµ&®xÈº©04«¹>RzS7Åy+l@6³¢Pé#Z#Ç\0é\nÓˆQ½\rcPú##F´ èn1H*n Ç(®I°b„„‘Ò¡qf(“\n¡P#ĞpJéğ%3ÉhÓ:P“VÌd[µÈ9WI>¸©í4¥TÙt‚\nù_”mv§ëÊ‘\"(—ÈÉ'èm…?#hË@T´¦&E3¸ti`z/ëC’ŒˆK#•b˜šBü†´ÀQ¨hûƒôgƒ\"y@˜Ä‡B¦ÄŠy-e—aZCÈüÇQ3\\‰ÊHåŞ<Ú\\„øéÔèkPÆY‘º€óvîÀkQHĞé8;–/Q¨@ÊÚ”Æ’à‚YkªÄ<Oÿï°V*e†Kşr\r™‚Bâ†#\0 ¨`0\$EÆaEQ[XiMê\0";break;case"da":$g="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"©ÀØo0™#cI°\\\n&˜MpciÔÚ :IM’¤Js:0×#‘”ØsŒB„S™\nNF’™MÂ,¬Ó8…P£FY8€0Œ†cA¨Øn8‚†óh(Şr4™Í&ã	°I7éS	Š|l…IÊFS%¦o7l51Ór¥œ°‹È(‰6˜n7ˆôé13š/”)‰°@a:0˜ì\n•º]—ƒtœe²ëåæó8€Íg:`ğ¢	íöåh¸‚¶FÛşÈA´ŒàwZv \n)Ş0Å3Ëh\n!¦~Çkjv¥-3Še,Ã’k\$SøV¢‰G¤Òä˜)ÎOÙíÂ‡“…üœ—8ƒ“Ğ\rî;j˜Œ€è®#+°µ°œ2ƒ´\"5¸C*É\n-\0P˜§¦°öß!K[¸ü7ë`ì7\"czD³Á\"cµÁ\"‚È¢ãsB­Q`œ<´-‚.†Œ\0Å  HK\"Èé¨æ\rC‹@PHá h‹ ;ƒ@ì³k#4ŸºmÂÿ£K\$2C#ÄàŠÌ Øî¡k\"’B0å)\n“r|\nËàĞÂÎš•ÉjdöÏ(èIR+`0¦è-IÊc¨\$	Ğš&‡B˜¦z^-˜e-[W”¢í	;6£#A)\rX,è ÂÒã0Í9ª‚ğ@Q“j:Á\" ßÇÊ87c¨Æ1¾£˜Ì:³ÑâÖ9…‰€åi#=0¥­j‹6ÃªjaJN*ŒãÈØß4\"¦)ÁjÆ„©ah@×Ñ¥#\"¶ã“ˆÖÃÎCÎ<\rXòÆS‚²4ñÊ˜€Ùƒbt»48•ˆ</C#,BN”ªZ5ÅĞĞä‘H8äåÂp@!\0ĞŒÁèD42ã€t…ã¾”\$7bò³Œáz•©	­©Œ\rÁxDºKé¡ãf7\ra|\$¨ó`¥D!à^0‡Ï(@â,il³¨cî€´\0Î4¹ @şáL–Ø“âÃš\rŒ ¨èàÜ £ZÛˆB(Àç°¢`’¤ëƒƒ°Òõ¨:ç‡îÈªD9'	Ó.Í„€(¶gEÒ(ABˆã|ÜîÑ®OåyŞ·ºüGLŠ7£ÃÈç‚Á£–V•%‰s?rc2|:EM@ßdc[{Í`SH7xO#Ş·¢#Ízta\0Ü7´8:`4)íàÊ8¯«B±/!‘§èfŠXc#åû¿à¹V))%nÄ'…0¨@•»½{ä)ğ¾5&Ö(Aµà#ÌDU°tg¥Ü¡>gZNÉéì]\rå—±’HÃª&,d¥s‘K#¤|”–NÀS\n!0– YèF\nA–Òšœ	s€ô %‘@PE\r¤]šS¤MTäbŒh8B’£ce(ô9·ÔhIÔjB#ÁVº äBTš•QÄ\\€ÇÁK¤'h,6°Öxƒ[ƒU­É\nff[ÙŸ4&Œ2E–R\rc‘rrTÒÉ€ª08_Á”3¶D\\‰£ÂE1B˜Æ;ĞÓÃ’!g2\nY˜ÂT¥ÄºS,É™k%S¹…F¨Ö\0¡†!\"Å¶ ^Éœ;€(Ş—äŠÒ\$eÉÎH°™4h…4Ñ4ÄXÔJBúâ Æš˜n)¢ìöcÓá¹•1\n’!¼1d&^P2ş™ÈÁ=ZªäĞ!E[C9†	d}RVãåÉo˜%ü)¾hRÏdÄË…ˆ*U¢*™ó¨ıŸĞ";break;case"de":$g="S4›Œ‚”@s4˜ÍS€~\n‹†fh8(o…&C)¸@v7Çˆ†¡”Ò 3MÃ9”ç0ËMÂàQ4Âx4›L&Á24u1ID9)¤Îra­g81¤æt	Nd)¥M=œSÍ0Êºh:M\0¡€Äd3\rFÃqÀäl2ÃDó•;äÆè1PÂb2›.0S\r	†¢ĞÑÔÌÃ^L¯7¸5[Y7Dƒ	Ún7ˆS±¦á-9ˆš©ÀÉ\$ƒ\ríUşá4)œ\$Ğ¬H+s»…œ£ÇX€ï&’Ãp–\0Ó%Åó°>ûu_Äˆ83s\rI\n§ÇsxÌvC\$E7%<(ïXäaŞˆQÓ©Ónê¹ô,¤z8†ªÎxòİ#Ê@À\rÏ¨ôª­‚N2«#¢¶9*	xĞ¦œû!j83 0š„*@oh´0¥ojˆ:¡\0Şÿ„ÓFNÀÜ5Œ££ ù .ğä	ÑÈôãCX#Œ£xÛ®£(&)ÑØŠ29ã|\rAK 0©c¼¬:IãxÎ€RÜ»/ î»xáH(ê†(m€Ü9¤ƒÒ ˆCÊJ„³Äô—CÍ\0ĞA l¥·Ã«xÅ0b¶1(Ë˜ä2/ŒSæ££¯»ª p’B2Á£<I\"…©ÓL\nÕæ:C(Ì3BÜ4;ÏÄœ ŒP²1Sê{VŒ-0@¿µU†°ÏˆËd4ÍM˜—YÃBš\rRÀ\$	Ğš&‡B˜¦,#h\\-WhÔ.Ô“•–:c»½±Ceh3Ó˜ƒ\rõ½\$¾7c=ØXØ1B ŞĞ§CpòíNtpÆ—c0ê\r“9…På‰¦6J<€ª(Ú€¾£(P9…) †)ŠB0A‡X˜ ÎÈ_J0\\?QÒ\r* Â4¬6ãnc^è'¯cëeØ6Íˆša,ÈâúhÌ7¥•ª¾Ü9ôğæ×Íèm®Ÿ¥#vCJhZjù§Œ#v†&‰³Â†åë+ZCÀà4Ö£&~,İj3¡À:Ğ^üˆ\\åkàäJÃ8^ócÃ „\$!xDÚIhéÄ‹ã5„Ağ’6„–ô‡xÂ*-L–ÙEíV 0ÇÑ!˜Š:°·Û°ñ\r¬‚–ñx“J® ëÚh½ (0Š98îzåäó˜èÒJã'ì„ƒˆä©ìƒí¦\n@ û~ë“ğB¤øJz>•Œáˆ0Tü3Ä\$KAºnkL\$†æ¶‰Ò¢S%T­‚tN	Ñ<'Á„ %t‘A<F«'¢€HXº´\"fĞÙ@Ä1^baI&eô†“¸Ğ© fÈÚ+Pâ›ßğfI*†G*œ\r‘âlt¦£fj[É-&@'…0¨úI#…1 €£†ò–ÏÂejáé	\"H0G)**¢ôàÁÊ9Iyç‚AV»Ô@Ì¡²Bˆ8u=ğHš/Ğ@Û‰Úv!¼¬´Qˆ Q	„ ÓcJáB0T\n,â“àšJ‰…090tçÓ¬d01è…<ƒ,´²W§ş[')p1³\rÆ4–˜ó\"ò0AB¥Ã\0­ifJĞ6°Ö¤–Ò¦E\0002œÃœÓá©(P—@'`²ô*áàª0-ô74^u	¢Æ–òÆS%ôD–ŠqsçyiçìË+QzxBúS~R%À”¢X¶	Y1=¡6{†`ò‹ùáUF’5l»7©aèßÒ‚7›H¶5øÚŠÙLœErr›ã“‹ƒïIÁ2J%Cğ˜d¨mJÍ0§zGeı–ô¤r\\CiÉ%¡ˆ¯:|\\%…å©[ôş!‡µ×Êz­NŠ!sµ›—ó`ÀU®é:©ŠD8®L¥G";break;case"es":$g="E9jÌÊg:œãğP”\\33AADãx€Ês\rç3IˆØeM±£‘ĞÂr‹s Òv7‹DYT˜Úaa¬b¦ØâE2H%’é„Z0%9¦P\nÊ[/Š›¢¦YôË2†Ìh5\rÇQ¸Òn3°×U Q¼äi3ÙÌ&ÈNªt2›„hñ„ç2&›Ì†“1¤Ç'Lç(>\")»ŞDËŒMçQ ÂvT£6ó±¦>g‹Şâ§SÃx½Ë£ÈüÈu“ë@­¾æN <ˆfóqÒÏ¸”prcqŞ\n)çìæ}ç#u› Ò]üri¼Ş&fÉËvIÁ›æà¢©ÏP·Ùÿ‰Ö :›Œ\"\n€Ø¿2Ã´4¸J¥¾ê à?j Ò«&B Ò#\n\n³9ÈÂH”¿›‘\"kPÚ2²àPŒ2¥¯Û‚4-Ã!Œ*ôO4@)9MàÊõ£ äa•±p™¤Ãšfå­Ïd<“Ä‰/Ã*s!\rëˆÜê·ÉC†âRŒ¦‰£*‹2±óŒ\0Ä<¯\0LÑ5Mˆ¸<ÎK`H…á g<†1{ˆÁŒcI†YÊîsš Ñp9FLD†6/‚1Ğ4®À²Ì@Š›´ÀPˆ2±0óŠçˆ# ÔüˆÚf74¬DŞ2Ó‰RóV¹Átİ4ÖLŒVcLb¦CY.B@	¢ht)Š`PÈ2ãhÚ‹c\r¬0‹ P­· ôßËpÒçCd|Ì³i[\rã0Ìò\rÊ»¡4®sv!Ä’êPƒ#”°*\réØÂ78/Ì=J\"ã˜Ì:¥Cdª³abö98#Ï]/K8A7Òpê¼˜Sã[\$!ŠbŒìÈÉZ„´Â6ÏÜVWÉF\nµèÛø2¥C2Ü6á’bcyß´#ä¹[Ñ‹÷-„RŸU)¦‹ĞZS2ºØÃ‰Coš`äcŞ1?pó„ÿ´øALZ8š¿/	@à¿cºİ\\€ÒÆp@?cC3¡Ğ:ƒ€t…ã¿\$F8ìH-Ã8^¼ócÄ8xD½¤í@éÄ‹ëèÜ5„Ağ’‘£ñŠã}£éM5H@›äÉèŒÄ‰½ââ¦TøÄÉ\"é2PÏM5#§#ú1~@—‹0Ç³Î\n©Ïû(›¦ü¿oï­\0¯=´\n@ ‚é\"L×#B¨ÈÁhÒÌG—‘íCäT<‚ò*Ûa ?¡…„2*YÎr1Œ“°ğÎRã?güá03Œk“I<\$ø›¶ãHÙğpxªEq¬Ø|[ñ!ÕÙ‚I+¤Á¦’¤ğÈ1Í6(<É†Pâ˜H	ò!A´*W,JÙ’l;¸ˆİÍA2\n<)…Cøkß*¹#Šü¶P\\8kèÃ¡ÂlN	Òì%pĞğ’8`à™Æf°˜âR—T«J†æhÎrôkr1%i¨¸\0¦BcK#àV‚\0Œ|g\$0 ’¼(”zˆ*ôrà)2\$BJO)úV²ƒÊbv`Œ!†WäÊR™`ŞRÉÛ~mW»ÂECfEí[KÕa/ÈÄÁ˜jüÌ4|\\0ÏÀ1.¶%™ñnét‹²NÃ‰F4Ä¢D—–vA\0U\nƒ‚,ƒ-É7™I]&ß”³Vñ2™yğ[¥ÛÛ*hh‘Ù&Aˆú”{&şD\\`Lf+8‹Áƒšx* Gı@ TŒe…0æì*œcÉáy£(A™^¦Ùû1…Ì4­ô´CkÑX\0((4¬‹‹Ræ'à(&ôbtê%F„%ºFšg´¶ŸuE3\$c‡—4d8nÁœö¯BKÀdEì8ı°Šßhˆuóäİ„#íHâú©W…ê‡\$`¨Kì¬Ÿª¨\"Íè `ˆØ";break;case"et":$g="K0œÄóa”È 5šMÆC)°~\n‹†faÌF0šM†‘\ry9›&!¤Û\n2ˆIIÙ†µ“cf±p(ša5œæ3#t¤ÍœÎ§S‘Ö%9¦±ˆÔpË‚šN‡S\$ÔX\nFC1 Ôl7AGHñ Ò\n7œ&xTŒØ\n*LPÚ| ¨Ôê³jÂ\n)šNfS™Òÿ9àÍf\\U}:¤“RÉ¼ê 4NÒ“q¾Uj;FŒ¦| €é:œ/ÇIIÒÍÃ ³RœË7…Ãí°˜a¨Ã½a©˜±¶†t“áp¨QŸ–lÛï7×ŒüÕÁ9äóĞQ.SÃwL°Şìëá(L¦èG›ye:^#&X_v ¤RèÓ©‹~2§,X2­Cj€(L3|²ˆğÄ4Œ€Pœ:£Ô  Îê†88#(ìŞ·ãZ‘-á\0000°€!-£ä\nÉxä5„Bz:ëHÖB8Ê7¯èµ/âd\nH2pÓÅğCÎ0·ÃrL³½#Ş‚B`Ş¶\"¬	Nxí ò\n†K.ª4CPÊˆ ïò¤„³Š2:,ãË3 PHÁ i@† P:'@S\$4¯ŠV‚°LµB€Ó6/â£G(ĞÓ\$¡jVå	q:R£*d„Ò‰¸Ü£C-ªHÜ¤”j©5Í£¨tü/cr<B\"@	¢ht)Š`Rª6…ÂØóg\"ì`‘·Œ`É ÅCd†2¬¼\\”ã0Ì§­¤ÍÅòÔ¸—ƒc|¸Jî+<„Z„1Œl æ3£bñ-¡C˜XÓW Â3£/b^8¨SÎ2…˜RÚ\rğxÚ0ªa\0†)ŠB68=OeG<0Í @;-#mê:·cJkİ­ğÙ€;iJ^7'¬*s1#L®ö\rïdJ3½j¦?ßëfL¡å²ë2¦©»%HçK°ğ8Mˆ0\\øĞ9£0z\r è8Ax^;îrIšArÒ3…ï¦ò<5ƒru …áM4ƒ¦Î/¶L`ÖÂHÚ8 ²Ü:xÂ?‚×\rè;OyDA¤•@˜º{Éç›şƒtŒÒHò-øØşã\n¢j\"ª\nzôù\r/ Èï°<Á%Ib:^m-8ÓÑ½ª(	‡yß>Ì,j¤buü5­; ×D1Ö´‚½¦ğ.%®\rİZ„t> ¬2õ¯½=›Ø¡(ö”¿ P’EÉ–”ƒ™Óâ`ÈY¦5à²Xõƒ2VeAk’€å  lÌÁÀ§ˆÈ\r!5\n<)…@Zø”i)bí¤Â6I”(mÔ?SÖÉÎ\nŒ!oíöµ°AÉq0\"°Íı2bJƒ@p¦\rZ‡C)\0ƒŒ^®@7ºó~ƒÃ8 \naD&\0Ìh™<0*=%¬èœz’tGÆ¤*ğ›ªgFš‘ÑjÎ\rÛ;AU–C¸êÍÙÉSh6&èĞA¦-m@æóš‰/\rI=İªÄÜ„ÚueçìH(TqÎJ(cI6°ÖLÈáƒ\r„6¸Àq±stG°*…@ŒAÄ‰\rÁÎœÒjã‰[Y*Dq:ÀÄ I©q.dm““\$¦OdIşä‹ÙzƒÈ\n1fd™%´ğCyƒB'ªöa'UÅ”\nQ´oç!È0K„“P˜T`k~8Ğ“¸–‰!ÍK1U2–’RjËüÅ-Eø¸zLÕ¹Sr*Á…2èÍb	lÍ ªs0I+ş3	C(‚8÷\$=Zá”ÿ\\‘ä\nH@:—ÉÊB	xi! ";break;case"fa":$g="ÙB¶ğÂ™²†6Pí…›aTÛF6í„ø(J.™„0SeØSÄ›aQ\n’ª\$6ÔMa+XÄ!(A²„„¡¢Ètí^.§2•[\"S¶•-…\\J§ƒÒ)Cfh§›!(iª2o	D6›\n¾sRXÄ¨\0Sm`Û˜¬›k6ÚÑ¶µm­›kvÚá¶¹6Ò	¼C!ZáQ˜dJÉŠ°X¬‘+<NCiWÇQ»Mb\"´ÀÄí*Ì5o#™dìv\\¬Â%ZAôüö#—°g+­…¥>m±c‘ùƒ[—ŸPõvræsö\r¦ZUÍÄs³½LÂv4›ŒıK©\"ÑÊ[˜–±GXU°+)6\r‡*«’>n?a ¥&IYd„—ÈcC1È[fâÁê„U6©	Pœ¶H*|¡jÚ®¬¡\$+TÉ¬ÉZU9P“&—!”×%E‹ğö2Íz˜'esÎª 0“´–ˆr«41\"Èˆ=Ò	P¥?Ä:¢‰–oñÄèR@Í7Lóx–¤hì¨±r–Ë¾©‹&»¦õ¤Ìœe7DŒÒG\$±ªB°%vıL.	^Ÿ\"Ã#Õ-@HKA>´#“Í\$;æ»@PH…¡ gJ†¬còÉêXÅìiN +L)ÅìÂR=îÚˆ•L	rëÊmºÃª0£#°LN§¦ñ|(XÁpR¦‹L«?´s®°–Ì›\0l—É²Ã_ÊÕ\\†ª%ß+Ä,Am°‰ÃxµPÔC<€\\s%¸âH)û&ĞX\$	Ğš&‡B˜¦cÎ<‹¡hÚ6…£ É\\BpªM:¥vh9ƒc`Ù\$¥¬ÿİhEØFPmã’ÒÎkdÚØ‹I8,¶ËS/ÙøÙ”»¤V¢y:£É±”UòâI!‰[zƒ¶RB\"Ÿ9d®¬ó@£Ù£?›(ÉuD?¤} Oäf„’¿Z*C£Ş±î”µB¦)Á\0è7c(İ¨ eN§DÈp],)S/ !¥ÊezdtLC©çµ‚K]¸¥bKxäjŒƒlA2Ô%6êãô…äú«ğLæéÅn,JØ»;dæ€æìC!Ó w5ã \$1>ÿ’·âJÎ„àÂ\rÊ3¡Ğ:ƒ€t…ã¿¤# ÚğŒ£\\7C8_»{ãÀé»cHŞ7áä0û£(éä‹ãØ0ÃXDZ‰ÛùÂ@È€xÃ>LN© !DÆÀ*Iİ­Â¦åPJA!äEÁt\nHP;–?*\r*bf›ê.4D‰y-DpÖcx -é2©äByÖO°a`B©\nP\n ( …ÏÔLdf‚\0PPÁK‹eIÑ¤.(†àâOE)±½›„ƒc/0­£”QÌ²/)­\r\n#F\"LÊËO3È„àÃFŒé‘lDoî‰\0”7~qŒ\$67fõ²0’FƒÈo €2•ƒxt#mÙA@ĞC˜ xÁÄ:†Pç\"ƒ0r\rá´¬ö“r\r\rØ0ØÃ˜e”R@\0ÂÃ,_2IõÄUÈ·P*1*d´Ú;¦²Xå£%¼¨¸ø³PÙds‡ë‘ôjI#²b‘ü¶\"–ZI:Ì‚åpú%©BœI±G¨…Ÿ¢Â„¦J+Äà)…™/É²}Q¸Ó¦fª‚¤=tÊ€‰ÍÓPèDCXd°5ŞMIÎêÃj%=+\0ÖOˆrnº†¤\$úŒL›7YGÙ¯4hª|šeŠ‰¯&v6)\r ¦7Ê<ºXÊ{¥D–F:Jr¥ÔkHçj=¦†ÊMJ\"™ÄÂR‡@ä\\¦\r!Œ5¦(„Û\nâÄ¦}u®g†Â¨TÀ´2ìÒèúˆ4Å9Ô™ŠoL	äõ2)‘ÕÕ>á'MhI¹.ŸŒy8©è@S´ wñS¯'¸ÎŸRê%~;f|üA•jAÊQ¹§“zŸ5OJéqu+;”„UĞmN'U€À˜’h+N}(e¸Ñ5˜C>ÒäşLÊ,˜[qÉµ%g°Š¦­Òí'¬bÆ´\\5<š‹<'fûWRW]İº!ÑˆÎ„NÊ	[+ õ™T˜ãîpn¹«@²Õ°7ÃNŞ¯¥’OU²–,›5i„\\€";break;case"fr":$g="ÃE§1iØŞu9ˆfS‘ĞÂi7\n¢‘\0ü%ÌÂ˜(’m8Îg3IˆØeæ™¾IÄcIŒĞi†DÃ‚i6L¦Ä°Ã22@æsY¼2:JeS™\ntL”M&Óƒ‚  ˆPs±†LeCˆÈf4†ãÈ(ìi¤‚¥Æ“<B\n LgSt¢gMæCLÒ7Øj“–?ƒ7Y3™ÔÙ:NŠĞxI¸Na;OB†'„™,f“¤&Bu®›L§K¡†  õØ^ó\rf“Îˆ¦ì­ôç½9¹g!uz¢c7›‘¬Ã'Œíöz\\Ã/;{ºíxúkG'•®œ,shy»¤f3a}á¸ÎîB«¶6\r#›+£ª€“µc¬¦`NÂ%\nJ< LˆÒì¡*¢®¬©Šâ¼¢¹ë@*#‚•((Â7\0Pœ7£*ˆ‘zPİ„DÊBĞ0˜es\nˆKğÓB“82Œ#¨#²q£&±'	Ü\n#¦ğGğ9ÇQ‹¨©-c]0t|í1©¬_\r¾Ìé7»jÔæìµˆb†Â»C,d²£`@ÉŒ›Ğ:\"ã @7Œhè„´u!I#¨8Ò\rÏH…á gP†2hÊ›!•C¢Ó%‰\n_G˜eÌN9+’ĞÚÚPB\r#:BS¼#s\nèˆniBB%)£Sv\nI†T!hK„° o<±ô¨@İ\$cÎ”'²»&¯\rÖÛ&R”uÁ2\\hK²¨ÜÅMÑu#št¡ÛpÂô‰@t&‰¡Ğ¦)CPÔ£h^-Œ8ˆÂ.°Â™©C#²72vË>è‹(8@0²´{ñ0©Ğ¦†51ˆˆÉ»Ê¢¼B¢Æ8*HV7™ÎˆJ 3Lèî¡X¯\\6ãW4Ó£«S(¥7ü;w;ˆÙ›\rùÄÓ˜°¹£\"öè‰z:2iYÎ›§º¿oVãt§B Ş5Œ¬È†)ŠB3Ú²ÀŠK«AJTÍo6Ş0™¥Ãk<‡²©ÓÄ ÒX@×»<é^;£å°_ƒ!İ¼Ï1~mr€ëÛã|Ğ”5©ÉÎsÅKª'£C*3¡ĞŞĞ^şH\\0Œ›Šr—á~óéCÊHì…á}’\\c§‚/¤×øÖÂkvŞİ|;2¡à^0‡ÙÈØ²¸ĞÅªhHÂš33Oæâq²v‰ùº„Lá«?GlÔ•Ó`GÒ9OU\r'ÂÂXÚqÈW&	\n\$.†^»_\n (Àêptc¤\$B(iŠùŒd„7S’›S»¨N!=™–`ıÃ«v\nu²R†Q\\pmg'ĞóJL›µ2Nè@‡\rƒ¨gQdÁâ6YŒQÊt¨ hO‰¹	2¡ÄîÄö€\0Ay¤@˜C“2Ãa\"0Ñ¥5.2tÜ+@'…0¨O™¸ áÉ¡cª“…HdAHÕ¿ò~á ñ)\"¤¥2\$£ 4•'®³’¨Ûy=f\$ĞÿÈÅ‚ÎaP4FÖ(D#ËÌ&	¦E’\"–VÊp \naD&&¢º‚¤%GY\"bJÉi/+¥\$8I2bJ0re§P‚u¢C#Pâ¦/c;\n£õwSvoŠ•8—«±1„ÑuÎÁR¢gs¨”ë–r.r!ÌÜë[Ó¶wÏÉË<“Šë]³|(µäv§\r¦.„¯’tËlqà4ÆÇgJì”†âZÒGÿDç™\\Cä\$­ĞälCxi54@aŠ§ĞŞNÀdMäP¨h8'Kys<'êöU¤ºr–ŠQR:¦•\$°Mš¾ˆñ-\$pÙ\nÍ…~®ÙÜ'¦“€£JaâÁTèT†3f¸OHRP°ôÒ„âcĞ-’“\\˜“ƒ2«±OhÛ›š)`ˆSç%nÄ ŠHr†«M \$'¸TZAHaÉqŸØéSKXP­F×ÚŒjy|Hà*€™Ó>‹×AÛ1êú{¬èÇ\$à(`¥ Ç•†tƒÄ)1ä~áäª•T¨šä&²-©’Õ§#¡£˜0Ø";break;case"hu":$g="B4†ó˜€Äe7Œ£ğP”\\33\r¬5	ÌŞd8NF0Q8Êm¦C|€Ìe6kiL Ò 0ˆÑCT¤\\\n ÄŒ'ƒLMBl4Áfj¬MRr2X)\no9¡ÍD©±†©:OF“\\Ü@\nFC1 Ôl7AL5å æ\nL”“LtÒn1ÁeJ°Ã7)£F³)Î\n!aOL5ÑÊíx‚›L¦sT¢ÃV\r–*DAq2QÇ™¹dŞu'c-LŞ 8'cI³'…ëÎ§!†³!4Pd&é–nM„J•6şA»•«ÁpØ<W>do6N›è¡ÌÂ\n)êîæpW7­Ñc\r[è6+*JÎUn\\tó(;‰1º(6?Oàôÿ'ïZ`AJ–‚cJ²92¬3:)é’h6¢²­« PŒ”5Oëşa–izTVªŞÀ¢ƒh\"\"‰@ô\r##:ğ1e³Xò #d·‰f=7ÀP2¤ªKdï‰Š·:”o‘!BRPÃDŒBP«ˆ\"¯£=A\0å­dĞÔªêÌ\0Œˆ2h:3¤ì¢OĞÅ;OºŞ7\ràPHÁ iD† P–¸sşPCC°ğ\rãÄ˜©ræÅ¾£]2«#£Êb–-cmS	m›ÿ/kxŠ£k%É.¾4 Î<B¼‰óGG-ƒevúÏC-i[C	@×dŒ`]<Î¶ujÚ³ãe¦^YVµ°ÏÙöå¥jZÀPÚ‚TÑ\$H€t6ÅÂØó{\"è\\6…Ã *#“¶6\$ RRÇ4ÍFÖã0Ì !L95ŒuZúL/¨¨7µõ«F£pæ:Œc\n9ŒÃ¬1‚ë¸æ\$#ò˜õ°Ü.ê\\ê6®ãª²aJna‘8¢®ÑÎH@@!ŠbŒ˜C}	H³1 \\	v¤êõIˆÃ4Õ˜Â8\rğ£À®RŒ:.>B5Œ,’¥6ÃR)f«lçLóJô—CVºã¿{`şc½3l€Ò¤š¸x˜\n@Ì„C@è:^Ax^;ôuu!C]LŒázÕ\nÎD4êAxDáC:“ÌëèÂ7\ra|\$£ƒm¹à^0‡ĞZ\$¤ÒÓª0™Â”ŒXó“\n»~â„)#(Ö…\ra“öt„vÖ[²­5›RQ•¡pÒã1ëÎÕ#PŠ1	Ë¿ìdÙš_(æl:Ôà(W[5 nl\0ºGXÄÈûCh¡Ù££,ÍÕÑ¾\rètœ«RxOŠ‘+Fu.@†Ê·J».M\\'µTÎÌ™Ÿ0F:¤MÂI&œDjkŠTSÇ\0á€âL)JÁÈ’‚\0‚hK¹8\r(1°H1(p.Ø›Ÿt†³á&!@'…0¨L\rèt--H‹`ÖapsN­~8ÂŒRPtfÚ1³3ü‰D{yDÿ•fªE[3	İ²„ÕÑ0 Á¤3‚\0¦Ba26¦´ÚŒ ƒ»N¤õ²0'¤L¢¡ ƒP!YJ€¶Md±t“™n†\"™AjÑt”ÄàV%ÁK†6Btõ/ÏIG.åeÍ­yœeÄ1še%\n.9¡6tÜ&á:0WCHc|-JMH@Ù\rÉ\"á¤334MÂ4£\"H¨¥7örB F àÏ—‰æƒ<ÎN¤X93‡‚¦KØl™«†Pé[Dhšz¢²²ˆùšGHù!\$qUÁÂ~¬Ù/&%ì¾£Ë<ç¨\n/\$®;„n’ø¡a¥.0äa’DDşESê€şÎY©6fùQ¹!šT19O„‰‹2I0ÎéRÁè›ƒz€ñØR\"ÌÉ1¨Ee¬óÈ¤DS|wèÒ™¢•Ê¸˜âVÎ™4ˆíO³¶¬NøS2ÁŒ¬¯à–U…š„IÆÑ\0ğ(º#\"ª9HŠVE)h¡\rjl7/û0_€PO0Ì8±-^Òbuç†P";break;case"id":$g="A7\"É„Öi7„¢á™˜@s\r0#X‚p0Ó)¸ÎuÌ&ˆÊr5˜NbàQÊs0œ¤²yIÎaE&“Ô\"Rn`FÉ€K61N†dºQ*\"piÑĞÊm:Ïå’Á€Äd3\rFÃqÀäk7œÍñàQ¼äi9Â&È‰¦…¥É’Â)’”\n)Ü\r'	ıÖï%˜Ü%…“yÔ@h0Œ¢q¼@p·&Ã)_QËN*µDÑp¨˜LYÉfÛ„ë¶iÅFNu›G#Æ[ñÓ‘„ğ~Ö@¸Üp›X,æ‰'\rÄ¶G*0‚ˆò4ã£1éˆ#æîï\"çE˜1ÆSYÎ¬n¸Ñ¥rÙ¥@æuI.òÂTwP8#£;Æì :Rˆ§æÚ(ºõ0¢Ş¶HBN	LJ<ïã(ŞBCH\"#2–9Kê”·B„·èD&¥JÈ>è¬\09\r©Â;Ñ9¨PÈ’©NÈò—L¨!hHÊA¨!± Rü§¨„Š²\"–„‰\"ş‰ /,ZÍ#C\0:C*é-óxÄ5=€P˜0µãHäï	só‰#!ó„ä™L‚â6'H:Ş6…ÀHK#¾ó“Q)S7FĞClš7îˆ	¢ht)Š`P¶<ÕƒÈº£hZ2“XÙ6¶ŠX6B@SÇ&,˜Ş3Õ¸Ü2µ©;%	sê˜¢#{-ÃÈ@>ãÆ—c0ëF\rƒxÎ„ab¢9ZÃ\nD„e&¡ª¬aJX*\rãZ:b˜¤#]£pì¹¢apA@ÑöºˆœŒËr±[JjOESwĞÙgâ,^4±íRásQo,¹„\n%Æ–G\n²dŒc˜î·Hã(ğ8OÍæ cDâ3¡Ğ:ƒ€t…ã¾Œ(Cl-ˆ­Ã8^éãÃŞ¸­axDÔLğé‹íZp5„Ağ’×³Ğèã|ù#c(è4\rò8éi Ìš”Ë¤ö¢::%‚\"²\$NF7È‰´4ŒËãÛ©ãŠ’(ÛC›x»E<Z:øŠ@ ›§+ğÉ¿§!Bª*š+•rKò˜/k>„`u¸Èş£jˆ’HŠ„zö¸¯83§Iâ|ã3c,©`Î”ş82ƒÒ5§ï’X\$¡ÃËHìª5É -3Q8#ª^Ã”>#&•c¦[}ö1Ü<—¼›#öúŒ b€)Šœ‚ˆÅÉ™0b,8 –8iø1Èì“@&ğ†Óù\$-¸3’>ŸÏ‰G1o\\1›SD¸JAI\0)…˜ ©œh„`¨æÉÂG8À·¦îù_;’K,¾\$Ş¢¢Œ/Æ@ê0‹˜â˜ˆ\$êêaê!(ñMD#rŠÒ„opı•  CA,hH6·àC-p‰Ø¾#@FÛ‹ˆZÅ(–gŠFÍÁ\$ÌP¨h8t1Ç<Kxb1%!‰ÅW‚kËq,ë©‘Æ”­É!yNHŞ8†`òÒp\$\0()'%4œ™¾;g‘è”µämeJ×H%e¶‘àë\"‰ n3o9€Å¾Q \neDÓ¢€˜ÊÁOS!#†ÒÜdàB„‘E¼ˆ5œ‘	\$AcFp1•ek\$ÓI…§¶\"†Ç9R¹‰W\$¡§ÃR^DğR,YpÄº`";break;case"it":$g="S4˜Î§#xü%ÌÂ˜(†a9@L&Ó)¸èo¦Á˜Òl2ˆ\rÆóp‚\"u9˜Í1qp(˜aŒšb†ã™¦I!6˜NsYÌf7ÈXj\0”æB–’c‘éŠH 2ÍNgC,¶Z0Œ†cA¨Øn8‚ÇS|\\oˆ™Í&ã€NŒ&(Ü‚ZM7™\r1ã„Išb2“M¾¢s:Û\$Æ“9†ZY7Dƒ	ÚC#\"'j	¢ ‹ˆ§!†© 4NzØS¶¯ÛfÊ  1É–³®Ï+k3ëö3	\r¬ç‚ÕJ´R[iÒ\n\"›&V»ñ3½NwîÔÃ0)µ¤Òln4ÑNtš]¡RÓÚ˜j	iPÒpôÆ£ŞÜfÚ6ã«Êª-ãª(ˆB#LâCfç8@ÊN¤)° 2è¤ êµP Š½\"ã“³Âb‚t9ë@È0*İ¯£ÓÏ	‰ƒzÔ’r7Fp˜œ²ÈÂ62¦k0J2òª2\\›'ª Pó*¤`PH…á g.†(s¾¬ëÜ8°˜9/Kb\\éÀ‚l›µò<ç7¡jrÁ+ğ3³Ã¢Ì ¼C+İ¯ãs8¿JC,ô0£á×E®At£&QÓÚ9I-2ª(Òv7B@	¢ht)Š`PÈ2ãhÚ‹cÍl<‹ P¬Õ7®ô=<\r3\n69ÀS É\"	Ş3Î”€–Šl-¬ *\rèÄ~<¹l@Æ1°ã0ê\r‘ÓŒ4•¸0±«]\$’ÊCkxª˜RúãZ*b˜¤#)É+déƒx\\Câ`6&ˆÆÔ¼Œs²Â.J…™î*Ü¤¶õÁQÚ<n†/£\$0İd‹\"C’j˜¤R&	©Ò¨931\\[6*Ãğ9£&&F€3¡ÑAĞ^úˆ]PŞR\0ä-8^ŠëcÃÊš¤xDÖT’/ŒX`Ü5„Ağ’6	’ã|õğĞ¼´ĞÃ}RC£32,–‰‰¼ïÈË\"³;®húWO%¶®¿Æà,Î€ãåŒ2vï§Ô+ßÍ¤H \$\ncF8-“N(ÁJb9ö@Ä ¥¢€\rÑ²Úô¤x†>¨ àü7›ñƒŠ:Ê­¤\rÙ/R’…,Šc&\$|A&KW M\":‚\r¡\0‚2j¾—Ë}Œw+Ô5YË=äş[ò°‹@'…0¨ÁÂidÁÉ )#üHÃ*I/e†€ ƒI¶/Fà’àÎ@Ã\nw\$%Ç½âúIMåT €˜;°Î˜Q	…\0¦À Œk…I„ÉØ'JßZ!‹HÁ9–äŒÒ1Òj¦™™‘!b€&ÁÈ¶Ã¡È°o(Ë¼ã‘¬RŒYˆX‘2b¦qW‚˜‹°Æ¸İ‘c‡Â4XÕÙa-ÊA~àØ\nß©\rn¸åÀÚõ\\8\r¥ä½²ÕËpm%º.ğ@B F à¨ãr›C9-JE¤˜CÇb‚Ô´£1ˆII7	NU	 „N–\n—\"èx‰ƒÅ1d •&i#0yUÇ\$Š¼†bw0²,½Ã¸vÔ’ä-rfHÒû\"[ÌÀe¤…ô•20ÀŞ©-EHì¿GduCz¡8ºt¤ÉM,¾•F5K˜°Î„€Qkfäb7Æ2Ì´I\0c*ˆ¼!®Tğî%9•Ğø¿4Ç.K©!–ÔEk—2ê_ L÷Beâf‘#@€ˆ¸";break;case"ja":$g="åW'İ\nc—ƒ/ É˜2-Ş¼O‚„¢á™˜@çS¤N4UÆ‚PÇÔ‘Å\\}%QGqÈB\r[^G0e<	ƒ&ãé0S™8€r©&±Øü…#AÉPKY}t œÈQº\$‚›Iƒ+ÜªÔÃ•8¨ƒB0¤é<†Ìh5\rÇSRº9P¨:¢aKI ĞT\n\n>ŠœYgn4\nê·T:Shiê1zR‚ xL&ˆ±Îg`¢É¼ê 4NÆQ¸Ş 8'cI°Êg2œÄMyÔàd05‡CA§tt0˜¶ÂàS‘~­¦9¼ş†¦s­“=”Ğ(§ª4›Œı>…rt/×®TR‚ò‰E:S*LÒ¡\0èU'¹«Õû(T#d	ƒHûE ÅqÌE”')xZœÅJA—©1Èş Å®ƒè1@ƒ#Ğ 9ªˆò¬£°D	séIUº*òÀƒ±\$Ê¨S/äl˜ ÑÎ_')<E§¤©`­’éé.RœÄËsÄ<r‘J8H*ìAU*‰¹•dB8WÇ*Ô†EÂ>U#‰ÂR‰8#åÊ8DMC£ğÑ_ÆñÉlr’j¨HÎ³şA‘*¢^A\n¹f–Ã¸s“P^QôŒPAÒgI@BœäÙ]ÂäáÌDÈJê¼ğ<· S\\ˆ\\uØj”„áÎZNiv]œÄ!4B¤c0¯\$Ama‹ÉJÕ QÒ@—1ıM´YV¼–åqÊC—G!t¼(%	CÅ¹vrdÂ9(ÊEÆtœPÕÕ7YêQ%~_ÅúC48b\"s‘åôeÅ’dœÉÁÔ¨CHÂ4-9ò.…ÃhÚƒ\"©>YÈı\0006ƒ“HÓäÖ\rã0Ì6<#+˜©™iVÓˆı<”QÅ *\ríxÚ0ÃÈ@:Ã˜ê1ŒmÈæ3£`@6\rã;Â9…Øå©#8Âğ„`KW¯êá˜Ræ…Ás°ÑUb˜¤#Nó*8Y±„ÊC¸Eşë1Á0ùÚº- ”#úTğ—iR>[£Š@ÁDá>ù¤øA ¬o5O)9/R–œ‡%ÊrÜÀ&Œ#›„96æ;ã•^2€Ó›Œp@-Fn3¡Ğ:ƒ€t…ã¿Ä#&â7£]äŒáxÊ7}ÃÃ…ª#à7y³p:{\"û”ÔX\"Á\$6‡l_xt€¼0ƒäF AÄ\rê¼ŞA\0ÂÍ`i†Áô´÷Ğƒ£?N…/º7JáÉ1>'±;)¶îĞò  ËU Ô„PšEDÏÈY‰àP	AŠ Ä„èB„<DLáÜ#tI¼A˜J Ë&0IMCóFŞ[Û} É°—4e\$^Er>H”GŠø•…Q>(	{§ÕÄL‡2F\$Ã [ÄÃKŸq%EX!\$9EJh±C+‰A\$‹–hJ¯5Ğl9¾ø(qMÓ7!ÔÜÁ°Ìƒxmó3×ˆqx m‚N›¹@ñMÁÌ\n<)…B8Ë	Š0ešˆn H`ÈÕÄËôr/ÚMBè“Q`å”!‚	Ç@¨¨öjÇIŒ‡Ôè‘î^³3NÚƒS€Á½ò³P@ƒHgL(„À@©¬6T#@ ÍCr¯\r0äÁ¸5?åDª“¡ÈÕ¾¥´¨Õ*§Ã”ø\"FÃ\$¢ê‘SB‘6-‚‘¤@ˆ•EI(Ğ’ÆXÌ9\nBA©j¯¤Ô KR¢ÅMÄ	lÄ6¹fCkÚ{`Â%!»iĞL4†f¥`F 0@:¼)ïCp \n¡P#Ğpxcª‡ˆæ6ğ@fÉ2’#‚uEÇúKê‹0%bC-µº·É¡611ßÕJ¬¶„ËPt‰aDsŒpç2HÊ'E@GÓ\$†²FDÉ²>œÄe©¤“ñÎ-LpL’`ñ\0«U=CkÉ5‡\0ä06^D(¨´â@s	á8wƒ)¶g	•Y†ŠĞ”™,\nÌ§a]ŸSî\"ç×VW3áJÁXhºmÚüĞ«Úã3qäX “NÅ“2`";break;case"ko":$g="ìE©©dHÚ•L@¥’ØŠZºÑh‡Rå?	EÃ30Ø´D¨Äc±:¼“!#Ét+­Bœu¤Ódª‚<ˆLJĞĞøŒN\$¤H¤’iBvrìZÌˆ2Xê\\,S™\n…%“É–‘å\nÑØVAá*zc±*ŠD‘ú°0Œ†cA¨Øn8È¡´R`ìM¤iëóµXZ:×	JÔêÓ>€Ğ]¨åÃ±N‘¿ —µô,Š	v%çqU°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€é²:œ†¦¼èh4ïN†æ‚ìP +ê[ÿG§bu,æİ”#±õ¦“qŸ«ÒO){¡şM%K¤#Ëd£©`€Ì«z	Ëú[*KŒÉXvEJôLd£ ÄÉ*é„\n`¾©J<A@p*Ä€?DY8v\"¦9ªê#@N±%ypÄCµ²0T«ï“¡Á‡i0J¯äAW¯ğóìBGYXÊ“ÄƒC\0«L´ˆuˆÊ“daÚ§ ÑØ	,RÌxu•EJ\\N¯ï‰ÖJ‡iXFP,j­e4\\‡[îu–DDt\\H©yÔ[²¤ìù'Qk”	ØN‰rgGOôøƒ•³Rö”äbbRBHÈÈö–dPvÊ`PòŞMˆ!hHÕÁ¬¶Y:D\"•EBbP:¤©ÖP¬>J—²\n‚/ä!@vs!ÖTÔEäŠY±\$VvCaRËùe]ÊbF¬ZG]©–”èKOÙöŒ-s1\$\\Ò2\nDL;«=!\"e±#é¶<áÈº£hZ2’)X+STØ6ƒ“NÔ„ä×ã0Ì6<ƒ+B&”Ÿ?P3ºM`P¨7¶ChÂ7!\0ê7c¨Æ1·ƒ˜Ì:\0Ø7Œï æ7Ã–r0ŒãÈjwX@6¼ƒ«ŠaKÂLÙÖH&b¦)È1\re%€\\ö (SÛsJñF”pì?¨4†ZJåù‰ØB2¤*ruÓ'YFFmït<öå””7¼¡Qì&Œ#›Š96|Èæ;ã•>2€ÓŒ›xx0µxøÌ„C@è:Ğ^ıÈ\\0ŒšÀÜ2AwB3…ã(İâ.x4ş8DßcÍØéØînn5„Ağ’6\rÈÛãà^0‡Ñ®2¸ã}>ßêãÖ×#£gàfİøÜ:dü,•[ÉRäÛÓ–2H9!\$(h\r/4Á@\$ƒÏH PŸbÊ”G`¹A@„ X‹‹!,ğ)•ô*›dr-–¨%zI‰ÌB„™”‚”¸œ1†¤àuŠQxG‰Ù„\ry“Ô`P=‡åñ\ndåôA\$‡–8JŸ6/È9¼gÖr\rë!ÔŞ? ÌƒxmŞ²W8qŞ0 m.›èÀçMÙA\n<)…CÚÄØªk‚Ç´B±XVÒ¸½4¦F?±EFšÊiO*1(\nCºŠP±Bh)ó81H×y}N1>\0·Æ6jƒ7gOt7»Æ:ià€)…˜1¸5æİÖ`©™ºŸ\r/qĞ¿'ã.#Dj‹¡È×<ô¥S\n[èP	È‰	²”RÈXû\0²Ä´E‘kØªI ëü3Frk¯HPW\\”›³~vÄcLØÈlqÌ4†0Öl¯Á„6FC|Í_PiÌåø”.š¸usRÁøà@B F à<`ÇBO,ğSäDÍÃît¸™1“¸Ócb•üYK0Nrl;	Á¥ˆÄ&Ğš™OĞˆ?ƒ¨Z¸HŒ¡–3 @¥qXAªI—©,¯DŠ)á\0€q\nÜ&JØ°y@U]•ÁµĞšó†rÔñY	]	3¶,…„B<!”Ü†3ŠÄW0µ?iº¯Ğ§`µ(#È…N¹#Ê‘VªŞ—'g•½lWu@Ê™p";break;case"lt":$g="T4šÎFHü%ÌÂ˜(œe8NÇ“Y¼@ÄWšÌ¦Ã¡¤@f‚\râàQ4Âk9šM¦aÔçÅŒ‡“!¦^-	Nd)!Ba—›Œ¦S9êlt:›ÍF €0Œ†cA¨Øn8‚©Ui0‚ç#IœÒn–P!ÌD¼@l2›‘³Kg\$)L†=&:\nb+ uÃÍül·F0j´²o:ˆ\r#(€İ8YÆ›œË/:E§İÌ@t4M´æÂHI®Ì'S9¾ÿ°Pì¶›hñ¤å§b&NqÑÊõ|‰J˜ˆPQO’n3‚·­¯}Wâğ±ãY¤éË,—#H(—,1XIÛ3&òì7÷tÙ»,AuPˆËdtÜº–iÈæ§ézˆ£8jJ–’\nÃäĞ´#RìÓ(‹Ê)h\"¼°<¢ Â:/»~6 Ê*©D@†ˆƒ°Ê5±Î›<+8×!¢8Ê7±ŠÈ¥¹®[‚KÊö5´+\"\\A°{l¥-BœH8D)|7¦¨h ²%#Pêè/â‚€ĞÉsõ.\r2ó •-OXê¥¥ìPÂ®-A(È=.ò€ÎÓÂ3 “äï<‹°<³àS.ˆZtxjéªâ*¿³c˜ê9H¨Ò¿<¢bU=!¢°Ê€iZ òˆ£`\\ıNeV‡) P‚¹1nù.KcKÀÊéØ±Zs;ÄÄL6BícYkz	K –…¤Y¸qûfÒÌh½½4à\$Bhš\nb˜-7ˆò.…£hÚŒƒ%uVÆÎ È¤Ç¯úSŒ{#2£xÌ3\r‹8Ê’\nc(åK—Ü»/Œëø¨7¢ÉXÜ<„ı41Œløæ3£bŞ7¬Ãpæ4ã–@ä,ï¸İj«8ê¹…˜R’!ëšl³Ğ	x†)ŠB3Nø®*f!#rfù2©M¦âËÚ7¥÷üx¸µKÛÁîZH%¥Z_âîƒúÊÊJ£ŒºÜæ³óN¸Pj•6%óÈÎ¶%5ƒ¶êº¸Ë6cRF’Ìx•h9cºÇ;Œ£Ààß/U˜y0Ì„C@è:Ğ^ıh\\0Œ™Ê„9ËÎ®=Àğ¹åÃHŞ7áV93Ã§H/µºˆÖÂHÚıî«ˆèã}ëQ,i~ÊNÊ»ÏÖ%zX†ó	@(š55SOM£ÃÒâ#V3§-klBı¿£O|şKqB#ÇĞË¸£òú‘*<Ba@\$ô¹ş@\0€¦~C‘Š§%)­3´7ìJ‰“\0.!å»…c|aQ+%	°–’òàC\"V,µ	 Ø¢;¨¤›8ga±Ş2¤è×°òd5Næ\\:ÂâÍAª8ÁÄ:™øšƒ’<Ø°ã~jˆ dˆ9™X¢KÈ‰\$AÉ³h€O\naR\$Â ÜcA\0S¤®ç×˜:XA¬ŒzU¤Jˆ&˜Š†àÌY[Imè ’ä@iöˆ€)ƒF&¢ÈOØov<XòBa3†TÍ¢Œ sQNä¨88šøbÄZŒ¬M‰CÉyø_…ÉüKõjP¡(óÁLpæNˆ`u\rjmÆ·¿2Éz}NIÑ€”Å2–¤Ú;34­	¿–Tâ1kˆ!ªĞØ\nãia¬;ùH‰dU{­lš†f@w‰ì«{2Y<>nB F àÆ–!\$S8ì¢8SØHdxŒQb:´(™\\Btt¢€HÃGˆ…ªãˆ\\‘p„–ˆOàñl\rP€ÓÏ€ä†R(y+ˆpbö_OpN,e°½³“ŠqêAÄ8Ä®Ó‚ã©íq5ä¶¶eŠLY™`ä¦ˆsšpH†„ÉDMN€\n­Ò­œh’‡Ë\r!)î½(ô¡”ÌÈ8Áé”Ét¢FÃ(c.kè%’&â{‚)(–¨<µ<ë&­ÂJ•*\\Hâ„és‚–¹=*d¯æ2t<¡.tâ:X";break;case"nl":$g="W2™N‚¨€ÑŒ¦³)È~\n‹†faÌO7Mæs)°Òj5ˆFS™ĞÂn2†X!ÀØo0™¦áp(ša<M§Sl¨Şe2³tŠI&”Ìç#y¼é+Nb)Ì…5!Qäò“q¦;å9¬Ô`1ÆƒQ°Üp9 &pQ¼äi3šMĞ`(¢É¤fË”ĞY;ÃM`¢¤şÃ@™ß°¹ªÈ\n,›à¦ƒ	ÚXn7ˆs±¦å©4'S’‡,:*R£	Šå5'œt)<_u¼¢ÌÄã”ÈåFÄœ¡†àQO;zºnwf8°A®0œÆñ—æ¡§xÿ\"Tê_oæ#‘ÔÓ‹õû}âOÃ7›<!”ğ¢jğæ*ƒš°­%\n2Jê c’2@Ì“Ø÷!ƒ’”2¦C2ô4˜eZşƒÈà’2I3ÈˆŠxş°/+…¤¬:ô00p@,	š,' NKà2ãj»Œ P˜¤¬ˆŠ2\r-På	>P¨æíŒ#h+Œ#Ğ:êkŠ	#r^3¼:<5\" ÜHC`È	Êğê;ª)\\¬¥#ò•3ÂE=ÄƒÌHĞA j„BÒ~å®® Â¾Šk²W9ŠÌFåBÆ:@@P—Pˆ¡hÛ/¢³zŒ8ÎHá\rJÊñHRÆæOÃ-MT8hhô±&I¤ú”×U;L©¸•ınšÃ¨\$	Ğš&‡B˜¦ƒ%L6…¢ØÕoBë%Ê˜æŒ´úÈƒ¤Ì ®ÊX7ŒÃ2<½¦¢šâB¬›1Ì¬kCSÃÊ	r£Æ’c0ê6ô9º×v0Œñ¢Š½*‰HÚ½©XP9…-ÄÖÉƒ8@!ŠbŒŸ9apAZ\$£¨êã èÌ»'hò\rã‚º2Îi­ü:`PŞã&:\\ãœ–6n\"_¦ÿŸ3Ú…9N˜â¡¤°É¼’ã¥.¸¯èğ8F°Æd;ƒD3¡¶:Ğ^ü\\˜ãëØä.Ã8^™ñoüt4¬AxDÚHàé¼‹í²N5„Ağ’6¥Ã,„7à^0‡Ğ(A!6#zRÕuc\n:´Hn™—Îuiú‰Œ²Í@ÏCèJ>Ã/îı\0+Ì–•”/	` \$\nw˜’ARÓŞ1:8Pªä¨¾O7z8Š6è2õÊš¦éÊvÍQ5{78I÷÷9š4)¹RªMBI&hë†’¸Sˆ©3uæÈ© àâJ8 Å0„ÈáYù±8AŒ—®rU\r¤Ô(ğ¦i®\$ÅDÔ’Â–S_Ê´\reÉÇøw‹á€Ç\\¡Åè¯C“ü#g\\–P@ËìÜ¡•âj¼\"9÷5„¼˜‚¸‹À \naD&A#LK\r)ÜÁQê•²¢è³´‚i‡#‰\0´@<¨ã4äÁSQm\$–8:(ŒjŸI?i¤Õ?\$×E‰<zmNåa§WDTãÈenä5Ü\\3>mşœ î÷Oäl&D(•ÂFŒ¸F‹î¬:’RŒTJ(U\nƒ„Ybk„¤Ê‚’JHàÃñ 9´>¤i•“È}çÌ)‰1+&#E’Ge,	.K©Lg\\C0yS«Ù À ˆìMD’œÅ%)‰z\$ Šv§'(ƒ,¤“çeÈæ‰†\na—’R10—%Ğ&P§z¡Pa\"ğÌ’>dK\n'e&P’0òLPÎjè]I¼\"E0ÒÂÈh\n­½K.³˜çÃ…-›ª8…œ(k^âç1†ÔÎz.s\n'*sÔå€";break;case"no":$g="E9‡QÌÒk5™NCğP”\\33AAD³©¸ÜeAá\"a„ætŒÎ˜Òl‰¦\\Úu6ˆ’xéÒA%“ÇØkƒ‘ÈÊl9Æ!B)Ì…)#IÌ¦á–ZiÂ¨q£,¤@\nFC1 Ôl7AGCy´o9Læ“q„Ø\n\$›Œô¹‘„Å?6B¥%#)’Õ\nÌ³hÌZárºŒ&KĞ(‰6˜nW˜úmj4`éqƒ–e>¹ä¶\rKM7'Ğ*\\^ëw6^MÒ’a„Ï>mvò>Œät á4Â	õúç¸İO[¶¬ß½à0´È½Gy›`N-1¬B9{Åmi²Õ¼&½@€Âvœl±”İçH¥S\$Ñc/ß¾õ¡C ò80r`6° Â²zd4ŒŒèĞ8îúØa”ÍÀœÁƒ²ïã*ÊÁ­-Ê 9kãŒ…-ƒ;şñ!Khì7B‚<ÎPˆ˜ç·«dh(!LŠ.7:Cc¶Bpòâ1hhÈô)\0Éã¢şCPÂ\"ãHÁxH bÀ§nğĞ;-èÚÌ¨£´EÖÅ\rÈH\$2C#Ì¹O Ù¡hà7£àPŒÅB Ò›'ô\nú¼ŒñsÔÉÊmô(-HèJrxËMÅ*–2SòãM=‰Ğš&‡B˜¦zb-´ÕÉJÓ´•ArÜ<7#éğZ™hĞ-À²7 ƒœ3ÓúªÀ¡Pó—Ò¡\0ë9\nƒxŞHRZ*9£Æşc0ê6#’=ˆ3ò[l0­Œ*‰'«e¾2…˜R”Š£8ò6/Ë@!ŠbcèJ˜„¼Ÿ £XÔ2²,23ãm˜*’5+„ób<¡Ra“[¥o‰Øàéb–ÜóïFM¢Á\0àáÒR•ª#•\r­šfÔø@!\0ĞŸÁèD4&Ã€t…ã¾Ä1wê.9Ë@Î©{`ğXƒHŞ7áê9.c¦´/ŒHìòÂHÚ8/0Dˆ…xÂ=°BÈÆ7Ï·\"áä	ÛVÆ:P å!)uNa™©ÑqH\\í5cœî:Œ’~†R¥+Šæ¦[ã´ Ÿ¨,?f÷>‡EHr€(½¯nú5ÁBŠ©¨\r‘)kykà¸> gqäZƒ\rÃ2ĞÈcVæ”¥jz^˜²C¢İxÉøé)ƒ}µÕ8¸ör¥çDÒûv(ˆò´¸7%:“Ã h*2‡êNfFx †FÌPàIti “(hƒ¶ZáÒóH†î@4±–6ÇZ’*¥€Â‡Õ\nŒ`n^…à¡¿·DO]ÁtuçØ†¶æIƒ8u1O…¹‡2üO™iCÊ¤Ç‚\0Ödˆá&äˆ’HL@B˜Q	€´“/lÕB0T\n5¸4èTaú1J˜9-¢–^ÌYt(aÌìR£ÉL(qr ğ\n+Í ¨,é#âR•c®4ÎØ9•>¨d‰CuòRK†„Ã`+\rg˜„4#†]Ñ~rfS¹xî¢Ë¥4î‘ˆZB F2†tòŞ¼Iæ)§˜Üoä4˜˜…©ÌtPªB\\X*Œ¤Ÿ—3_ E5&á³1#‹á‰œRşrÏâˆ­¥(VFñ”ólŒC“ù5Èi•áMÛ€¢u«I9‡¡CU‚¦f\$Ê'-8‚|ºcêÊ·täÒ4Ù%ªß—	œ`›û†ÍV¾£`eiv/‚…€©´jˆÂ@€";break;case"pl":$g="C=D£)Ìèeb¦Ä)ÜÒe7ÁBQpÌÌ 9‚Šæs‘„İ…›\r&³¨€Äyb âù”Úob¯\$Gs(¸M0šÎg“i„Øn0ˆ!ÆSa®`›b!ä29)ÒV%9¦Å	®Y 4Á¥°I°€0Œ†cA¨Øn8‚X1”b2„£i¦<\n!GjÇC\rÀÙ6\"™'C©¨D7™8kÌä@r2ÑFFÌï6ÆÕ§éŞZÅB’³.Æj4ˆ æ­UöˆiŒ'\nÍÊév7v;=¨ƒSF7&ã®A¥<éØ‰ŞÒvwCù»İN¬ A¹g\rÈ(ªs:èD®\\×<˜¡ç#Ğ( r7œÏ\\±…xy¤Àô¦ã)V¹>Óä2½ˆA\n‚¦ª o³|­!êà*#‚û0j3<‘Œ Pœ:°#’=?Œ8Â¾7Á\0Æ=(È¨È Ãzh¼\r*\0åŠhz’ã(ßƒ’ì	ŠË„0,Ş9;ÉŒ3#ï8‘¥#{v6\rã;Œ9.[š0®®ZøÖh(Õ/	Ñ’È2C\"&2\$ÌXè„³€Å93¤í92£¸¾<éhÁpHPÁˆ)C¨ÖÅC8È=!ê0Ø¡¼âœ–Â0Ò*ê:H†7(ñØà7ÑéŒ§£HÙ,Pî1Ã±z{P6IIˆBÅr‹`+¥ÚDÃXšR)ó€ËV5p\\Ø¶=IÙVe\\šÚÍŒAY£k\$I²½¢@	¢ht)Š`PÈ\r¡p¶9^ƒº÷U\nbÑ#ËpÙ ¼h*„„xÌ3\$Oâl)À‰¤™`KÓÙ4O²V–¬Sr1XäÊŒA#:#XŒ3™SÔØÊ¹¨3¨@º¸ƒ£—gâƒ&,«Œ¸Ê<äã¹Igän‚?“eş‡•ùj[˜[Ù êág\nt˜âè~}è:V‰,äš>N9èC™§\$f£êi°œ‡³ƒ\n2J£º§\rh€@!ŠbŒÊãnÖØÂüŒÒXÚ:ƒØ…é²‚›bŒ•Ôãm‚Ÿòt\\Ì îÃ<©ndñf#-Ë¤Ï!´&¨Õô^TˆKò4tjÎ”Ï¯ãü¡=\rÀŠĞÈÁèD4ƒ àáxïç…ÕiÒXÎ`^28İ.i¡xDÖC8Ê:xÂøÅÆÃXD6CHÛì¥È…8ã|¡Xã˜Ü®Ù›ç1'Ğ¨2rú…È3rK¥(‚ÂƒIK­XõÑôA˜(b[aÕÑ„ÌjC¸ \n (‚ôcÃzH´p1EÚ±?…ÎB¨X¡\$>¤¼˜“2ì™Õã@r\né^BÒ@—¡rNçÌB¯Æ¸AP,ò‡CD|Y°™;µ·†VâÜÛ«/cL½¢²R¦CYğEnE™“’vOIü\0\$H¬1@àeKø D8å“¢ä‚˜	15ñQ»r`· ‹5da ´Ò\\‚dzduÒ¦\0ÖGÍaN`²\\7ÆxVá–˜z\$ñY«‹ÂVÆš€A´­Ÿ(2™ÄÉNvE*T1ÆDYz‚f?2êDüM8˜4¥¢:ÃÈj˜(\$9¹GS™{Ù\$f¤)…˜ÌÉ€¼ ¥È;‘ÇR ²eL9ÈÈV\\‚0T\nz§Xü•8r)Í‡¯ŒŠKÑa}#êxúb\$Ú|&Òç?	K0\rfŸôØh÷Ÿ&L¨Px!?³?&Ò¬‡‘øØÌ“dúgş-:ADÌ#£¡¦§\nBdÓé6i6°ÖUdÁBqÒÈ¤xIÈ\09Îo“`–b[	 šD‘™–ÃRIÏÉl/„9¦²ø,B F à›Rz\rCè»0\nnˆ,ú½>¤}R=f¿:ÈÑ–Åg¦Z‹Ä«X«tò¢q·}]âCªTáˆŸ™jÇK‘|/ÆÂ `,@iZ|8ÓN[ª…I§ÜÖ0š˜r\r9©€òú•Ÿ˜³N«Ô³ar4 \0©øùEf<ÏBÜíšc(N¤1ÙœĞy¥	êá&Ôó\\Œ¡–MØõBÂ„|–Ğt\rgHÙ\"@ÃÑ(D3eVÍRu<U\0I¯*b¨Õk	¥Ï \$éËkQ.¸hBf¹Æ¤@Ó\n\r/¹)úÆšT…@";break;case"pt":$g="T2›DŒÊr:OFø(J.™„0Q9†£7ˆj‘ÀŞs9°Õ§c)°@e7&‚2f4˜ÍSIÈŞ.&Ó	¸Ñ6°Ô'ƒI¶2d—ÌfsXÌl@%9§jTÒl 7Eã&Z!Î8†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘ZÔ»	&))„ç8&›Ì†™X\n\$›py­ò1~4× \"‘–ï^Î&ó¨€Ğa’V#'¬¨Ù2œÄHÉÔàd0ÂvfŒÎÏ¯œÎ²ÍÁÈÂâK\$ğSy¸éxáË`†\\[\rOZõƒ?£ÅåŞ2wYné6M”[Æ<“‹7ÏES<¡tµƒ®L@:§pÙ+ˆK\$a–­ŠÃJ¢d«##R„Ì3IÀ¨4£ÍÈ2¦pÒ¤6C‚JÚ¹ïZ¤8È±t6 èø\"7.›Lº P†0ÃiX!/\nê¹\nN ÊãŒ¯ˆÊóÇBc2Á\"‚+ÚE242¿ñ(Ó®ÊPÓ½.päÇ‰¨\né+¹H#&ŸF¢pŞ;#2>Ú!Ã @1(HÎS¢Š-ˆ7.A j„B‚l1²ûŒ8¸ce ƒ„`ŞÇ/bxå\r¯.4”6(H ºÎÀ¦’Œ£ãN½!jx4¯b\$† ¤«œ¹#r¹©JVãO	=^“%	Tp›Îó’0Ö%}cÁƒÏB@	¢ht)Š`PÈ2ãhÚ‹c\rÌ0‹²Ó_U9®SqCcÎ4m*Y*\rã0Ìõ×IÅN9%QBrƒÔê&Ø¤(Âr7¨	èòÿ²C¨Æƒ\$0ê“RË»\$6c–iYƒp@¼)ó–\n:¡!@æÂÃxÖ”¦)ÙR¡=j@\\W¶3Êü®ƒn.–.-Rİ9Ã-ı„/¨Hå‚Ç Æø¢x–›ËIú®	®£#Ékõ6%©CÏ*Cz6°&°Úr:Ãcºéeë:2gaâ43£0z\r è8Ax^;ñtq‚ árè3…éG\"<@ÃV„Mğä3Èûø¾1\r‰èÖÂHÚ85ú@èã}„`èŸÎM§b0åùèà‰îÌœV˜>µÃC*H6,¤ç­Ğb,Ëœ\n”a+-À\$¿r°D(	†«°°^ØP¨):½	±cš=\$ƒbp÷ìÌbb0Ô¬ºğ;gøÂN‰Ã9Ïù´”†Q^ÒT1Îœ»Æ¨Pü\r+„Å¢v}Ûû:H³%B üÈy4ˆ	š§v™İ©¼6FuI•ãòMˆA0–»6`Ô±şvfô8-&”¢BxS\nˆ	¥2xå–8 é|7!¶vC u!d¸ßÂ|Faaƒ\$ÂC:ó IÌ\rÄÀ3¨×ğuÌ¼^ŒÇ2#l¥‘Ä]EØ0¢Ê°J‹`¨ø‰êr(¯‘İBö¨xÉ r'	¹%•³ÖÔĞ\n‘†Ø˜§ìc¤Œ“6…A›8\"N\n¡3a„3\$u–Kºz„R¾SB8lpà4©0@IÒ\na¼1Ø¨[”±-‡©|“¤ğÂT±SNÄş»³Í\0U\nƒ‚Nš™‹\rÁP'#:›ÈÌƒ.’ºT,¿#M”â!@œ<òšGË–~,uª´Ê	Ñ„t (Ä˜°ÌVò©3¡Ìƒ4™\$aU+ÄE?sŒR´¹Š‹ğ5ÉZc¦, …é§Âp\nF£]/\"Š\\‚`oGpR˜âQ¥ñ¸0IÄÎé*g9 \"”\r‹Êã˜éÍzpTë¬„†Dl¥•`En³Œ÷@ÉÖq‚±Rew-°a§Áƒ0¤R|˜Z8hsRhı¿Öt";break;case"pt-br":$g="V7˜Øj¡ĞÊmÌ§(1èÂ?	EÃ30€æ\n'0Ôfñ\rR 8Îg6´ìe6¦ã±¤ÂrG%ç©¤ìoŠ†i„ÜhXjÁ¤Û2LSI´pá6šN†šLv>%9§\$\\Ön 7F£†Z)Î\r9†Ìh5\rÇQØÂz4›ÁFó‘¤Îi7M‘‹ªË„&)A„ç9\"™*RğQ\$Üs…šNXHŞÓfƒˆF[ı˜å\"œ–MçQ Ã'°S¯²ÓfÊs‚Ç§!†\r4gà¸½¬ä§‚»føæÎLªo7TÍÇY|«%Š7RA\\yi¸ÏÛäuL¢bû0Õ4à¢\$ ËŠÍ’rFùè(ªsÊ/‚6¿ö:³\0ê„\rëp² Ì¹†Z¶á°­«ªh@5(ló@œŠƒJBÜƒ(ÌÀ*‰@”7C˜ê¡¯«Ò2]\r¨ZDö7Ãœ C!Œ0ëLP¼BËB8Êú=ëìl&3ìR.ÈªKãíGëĞ¦•µÀPŠèÆ¬Ø˜7¯ãtF9'£rVƒ#z¿!4¯RôŒ\0Ä< ÀLá9N¸<ÏCrô¡xHĞAˆ(4ãë.I£š!a\0Ø€°@P9GL¤˜¨Í	†S¬NÛÜ1¯,6\"…©èÒÁ½ P‚‘®Šô ÌÃÄ_-¥¬¤îƒŒ5[ø7)RX—)!tí8×•[p3/‰å…\\©,x0Œöh\$	Ğš&‡B˜¦ƒ ^6¡x¶0İ»Q6µ# ê·¶ˆ6=@STÖ%ïŞ3Ãc\0002¸ÈZZ¤¹Uë6*\rê\n|<ÀL¸ê1¡IÌ:¥4œÂ9…ˆ(å†Z•ìÄÀAÓŠ¢é Á@æÃxÖ•„¦)Ï\"X¡ßÖ(A\\%ÏE2b‰zòØ®Ñk£€<	+{9412É7¸\nFÂ¬ƒƒ5Œ8ÊB˜?©ºa‹£([\0ÏÚÏ¢	¬r˜pæ;¯–@ñ©4c \\‘ĞÑŒÁèD4ƒ àáxïÁ…ÑÎF……ËàÎ¥|`ñu(^8cÎ÷ïBøÄ6'ÃXD	#hàÚèC xŒ!ôÜE£¢8˜VVò“Ë3¸ÍÚøßÆLÆŸCƒ+`Û¾\rkU²v+8\r¬•ò.‚1,@q”Ãr\\(	‚-İ!š£p+JT³B¬æÉ²Pœ¾S8ÓŒc\r>Â°¶hª)È¢u‹üC €¡BŒõõtHˆ§¦B¤ˆP8xipA¹Ÿ¦°‰€a@mÕ¿*MZ*†ÅÚ™ƒ²p£R˜şrC#‡&¹–5&€]qÂm.\\œ…\0Â¢F(^9rG:5;,\0\$ ÈHq18i” ñÚ zÆh÷“hsÃrê-û*:ƒ×´!~©ˆİ©4s“‘~L(„ÃøªÏ¹*=â|œJ3Wv¥JŸB,ÀœB–‰¦‘&šu~°Péµ1O('È´Û#–bÁ7ÇQé)%¤ho+=™dBNS¹R42f-cßÖ4©ríg]\$ÍB7=A°Ã`Ò¤°oF)e&Ú	z2HfL©2r£Ä@ÔÆ3 @B F áa0Şdô¨N&K‘ÉY ]Ü°XæŠFdD³©…h“’2gHñ \$ND“’“0»U)ÕFDìÆ9Àfûó+€2†3FÈSCH&5û¼\02Ïö*ru})#\0Î±“™ÖP—èx\0 ˜Åò”4Â†º^…½%ôr`ı6dEğñ›ÓDgíMÓ®rJ/CØ¤¸9îŠI%eFAƒ\"7Rj™-6ùÒ|`[á3a	\0?R`¼Q7Æ‘zÉA“eFKAÍH GòşÖ(";break;case"ro":$g="S:›†VBlÒ 9šLçS¡ˆƒÁBQpÌÍ¢	´@p:\$\"¸Üc‡œŒf˜ÒÈLšL§#©²>e„LÎÓ1p(/˜Ìæ¢i„ğiL†ÓIÌ@-	NdùéÆe9%´	‘È@n™hõ˜|ôX\nFC1 Ôl7AFsy°o9B&ã\rÙ†7FÔ°É82`uøÙÎZ:LFSa–zE2`xHx(’n9ÌÌ¹Äg’If;ÌÌÓ=,›ãfƒî¾oŞNÆœ©° :n§N,èh¦ğ2YYéNû;Ò¹ÆÎê ˜AÌføìë×2ær'-Kk{3ùºš>²±1¢`÷½“¢ÈL@Î[àQ2ÁBz2§Ë¨Ş„ ¨:Ã/a6¡îÂò2¡Ä´J©'©û²¡&Ëš::ì8Ô0§¢ Ò/!àÒÂ¸+ËMc\"1Ic²à)	ìü\r)¤[¥cÂ1¿P\$T80KÜ&\nH!6òˆã(Ş6Œ££ZşÄp#0Í/»œ\$1”i2Ššê0³ÈäÎ‰ƒxÏ	§‚f¢Ã*Î¯íX®§sdÎ„£ @7É’èDÑtl*ÀCA j8BÏºò€°î’ğñÀò˜:@#€À‚›(2Ñ®ˆ 7¦Œ,ÊÉƒ“¸4¥\r(ˆœ\r“€¡?KÃª|®4Hã\"˜1RróWÀ‚\n[²»“H(­à\\ˆ(ØÍn8óB¨ÑWØ¡x%£h\$	Ğš&‡B˜¦ƒ \\6¡p¶<áÈºéVõËÚ\r’ğØ£sÅ3ÃböËaƒ’w	(\"bòB ŞÜOƒÌĞ£®9c2†6NÏ YtåCïÁ·¼…˜Rˆb˜¤#8x×?4ŒWA*ËÊC4œ\\ã’ŠªÁ:nDÍO—+L‚¡´(J\r#°ğ8H¬VoaèC®;:îÜû&:ë2ÀĞÃªz&Œ*Êfğ£˜î¼QKàò`A\0x–\r Ì„C@è:Ğ^ı\\¥)“èä/8_?ucÄ0„»xDå?rï0/ŒVHÜ5„Ağ’6¬¸xÂ**t¸ãôS‚øézjµ=kCú9ªÀÓµÂ²ğÊ1©–ì÷%ÓÊğ7jéê5pÛw^™4ßcó²Mã¯ôh;qÏÈJpcƒ‚«1G\\&†™ª/M,i5•àæHØpMË%ù€ÎyÊ\$o©z’’†QJ9Eä•AÔS`èj(T–.r²´ .5†úAI=	\$\\<›\$\\TR†+F„7<ãS q¥`­e„G‚	Kcexã´ÀÆÍYÇ90Hß82°CQC\n<)…H*nMñ<È*-â×W	¨%>¢åªB D%\$¾A\$”òÉ¡6oD¸…¤¤H9™<‰04“´6Í„>%fá³B”ÛZ‹u\naD&´*nÉ`F\n@DVšğ[Ò%±<œ±âx”	äè%FÛŠÒ½4aÈ9–Y``%”´bĞµtBEf¥ô±²Ì¬ËSFT¥ºè>„ÎÁ´¶áxmy¡¤—¸4»\rL%P‹rÍ‚µ6ŒÌİêB¸L¼‚^\r€®+¬@ÖMÔX Åô7±dôœ˜¬ùqb\"……Chu…æM¦˜ª0-X“Í°ÜÉêP‘E4àädC¢ã£TqxÊxGÖ¬#„x(†ÃUñÅ14È™2ìfØf,\0¬Êz„S*UY(\$4€£Âf•(VŸ“ú~˜²\\Q)Í›íˆFjPßÁ,±ğ‚„*èİ!ã]“ÔÛ,Ëà\n&¨Ä¢ŸÙúßÏJu’ój[Tá;\rRƒ4J=ENÚô	Z<êµ˜¢jÃŠ…š'Ó¢[z«3Ò¢™Ğ‡&ü\$9TÙ'#)/ç®IŒÍÖ’\0";break;case"ru":$g="ĞI4QbŠ\r ²h-Z(KA{‚„¢á™˜@s4°˜\$hĞX4móEÑFyAg‚ÊÚ†Š\nQBKW2)RöA@Âapz\0]NKWRi›Ay-]Ê!Ğ&‚æ	­èp¤CE#©¢êµyl²Ÿ\n@N'R)ø´@%9¨í*I.’Z¤3¹Â{“AZ(š˜ÂTq\0(`1ÆƒQ°Üp9Œ¯ğXi\$fi'Bİãğûæ2’•,l±Æ„~C>Ò4P·üT!ÕHæˆkš‚®hRğóHbúˆ°šÊ4ø½i6FFc{Y”…3¦-j´rÉ¼ê 4NÆQ¸Ş 8'cI°Êg2œÄO9Ôàd0<‡CA§ä:#Ü¹”)#d¡µîÃ ŒÀ©),zn™¥LÓŠÖ®ém&êÜ0¸NÄ.„A%Â\noÒ7ğd\r«‹’”ÂŒC8¡”h…*ôš¨ªhéZ¨]9kcFhÉ0¦:î2¢FHÈ1s ©SŒÑ¯*in‚²hÙÉ‰9!©ôL«.™Hµ—hé¡\rË,	Á°²dÄ¦«šë3H¡(¤J’XãD’ÂØí4ÆNì()|Œ’‰€¿F³Úí†‰¦Ğ¹t™ÒŠ#Œšë\nÇ1Pqsåšã,îJšSæ„\në³î\rHh7ÎÓ¤¤œ§SĞ¬3C.ôKí*5É?KBò›N»Êî2O9‰mœ”0\$zTY(…³ºVm-q:´Ìè„£#R& Mãy¯t½íy\rUòÃÑ\0PòøO0¡pHáAŠ3iÔêdƒ¥J‰~®åâUZ³…¬]bÌJKHdÚš§¹õ-nÇ1:\0ªIjÄšh´[ƒ[.ò‰¢CÒöÚjŒ“XÊ‡¨q2—MİÊŠ¾Ø*“ªr½Ğ¤^R9%`Hª””µ BÖölŸË}ù^02¢_ÀI¡¬,ZÔÃë±Æ¾¼Ş÷s>©)å†Óµë2êK¸BBFíl•^ÓŠ;²ªçt±ŒÑå8th)\$ç'”(Ê>ZÊrœkÁgÑ²Mû&Ac`è9Në¾0O Ş3ÃdV2À’\n´tÖÍH*\rï8Ú0ÃÈ@:Ã˜ê1Œoˆæ3£`@6\rã<V9…˜åã#8Ã„î6Åc«ôaJæéÃ[9ÑRT«b˜¤#6Ë½GÂÉU¸à‹ğYå©b¬J‘á^,…d¹f×q\\,\r…weF‰ˆy7K•»¬øÁ%D}÷'£°¸É((˜\\¨:WÙ*d\r¸R˜Ø:ã[	‰qÁÅº§)G	¡„9Ÿ äz\" sá¼9/ Ê€iv!‘şƒÀÂxˆf ˆ4@èĞ/áŞ2àÂ n¡ÈDÀÎÃ(nàı<Òã\">nÀøH¶ĞÄ\r`ˆÚpm!ĞğÂ‹yò‘Gğ7¯#èk<¤:ˆÖğãPnä…xVHúRNe„Ô\$g•q®>´…Ì\ng8‰¤¦¨×Ù*Na1:î¥¤1aL£F]!äÔ²RòÊKo´¡¡´L‰jfÈ‚àú—IÚn'9B¥Hp–Y<ĞPÉCœwã44]Ç!j’‚æ¥I)œDÎ¤(ŞY¼§ Ês’¢XOB©p…6t*9TªÉ‡Dª’\r0åq³‚¬Ø\\¿Ñ (Ê\"Ğ;ğF%‰\"QÂI'x@Ò¼4qÆKÓäìCˆu>2t3 ŞA\0AŞ#ŸÈâÔ¦gÎ›DƒàîMÔÌWÊÑy¥%À™Î1V.é,EM@xS\n€µ–b!hóªUF¹éiIeÑc«cF®©Ê(‚k<.-´˜»ºöÎ×m:óĞ–«UBJ¨qS'3ìÁ3!SN1°[R]¤C5È'u´°1¼G\"|g\\1Î˜Q	€€3ÓÈ{\"¸F\nBÑ†åäd<L“²rÖSêLÃ‘ã„dK’ÖÈIÉI18°7«‰q—|Æ5PáÁKËœ4.)Ö]åÂV¶Ò~”¹D¹” ¹¶ÂØ¦1f—”,¿7RYv›¸Œowšy^šÜX%¡½×A^‹‹æß`¥ö,÷â	¸eÛqÈmA\rÕ†ÀV¯Ò¾MSJƒ\\ÙfŒ„sÙ°Ó¨#µ2kÕê¡hè£„k]&¬EŠM†à@B F àGÇ%QXg.baÏ3¡\0ÈQ-¡`ª\"@ŞñáOÇÙu –Â½ò+ú&y# l~páØp¹@ÃBu-“©*UN³ªQÕw¬Í7¿“q_Ä1A7`òfKÉ1Ie‹-FV\n…ãFÇÂÀ‡–Ldg!!ãÌDŒ‚`ŸØV„atÔk<«†Âi9âJi((ïAp@0…Z^¾ó<è!wB;<Xg‰òÍSÀ(&Z\\‹5æ¾“0ò„\0D—–Q‚Ä}ê=c²ÅÆÍÙGŒ»¶ÊYÑZƒV’\"€Ê{ƒú\0¶YÑ¢Ù›5)e%ˆ%’²³?AHB&)xMÎ³RÂŒ—\\ßTu¢ ËÚ\0ß”­;´à ";break;case"sk":$g="N0›ÏFPü%ÌÂ˜(¦Ã]ç(a„@n2œ\ræC	ÈÒl7ÅÌ&ƒ‘…Š¥‰¦Á¤ÚÃP›\rÑhÑØŞl2›¦±•ˆ¾5›ÎrxdB\$r:ˆ\rFQ\0”æB”Ãâ18¹”Ë-9´¹H€0Œ†cA¨Øn8‚)èÉDÍ&sLêb\nb¯M&}0èa1gæ³Ì¤«k02pQZ@Å_bÔ·‹Õò0 _0’’É¾’hÄÓ\rÒY§83™Nb¤„êp/ÆƒN®şbœa±ùaWw’M\ræ¹+o;I”³ÁCv˜ÍìMÔÎ\nßò±ÛDb#Ì&Æ*…†­¦0•ì<šñ§“—P9P¼æÙçĞÊ96JPÊ·©#Ğ@ Ã4Œ£Zš9ª*2¨«¶ªÒ¸ì2;’Ù'ã˜Öa•-`ò8 QˆF<ã˜Ø0B\"`­?ˆ³Œ0¡¢Ê“½ƒÊKª`9.œÆã(Ş6Œ££2ô I˜Ûˆ£ ÒÖ@P ÏC%l6ŸÀPÕ\$²<4\r‰€æàq`¨993,BÒÌ“2sBs£MØ×£ @1 ƒ >ÏôóAÏÔ\0ÔÖÀPòÕMÁpHRÁ‹æ4'ëã”\rc\$7§éëä-\ròT)1‚b])BÖ1¯o˜áÓâ(Zõ£àP2(PdWK¯Ä\$“Î\r-~¡El`„›„İ 0§Eê›?µØÂ…ÀM¦6\r6­[¶[µàØÂÜIºCk]Ë¥uİ¶ú@;%-’J=KÂ@t&‰¡Ğ¦)C \\6…ÂØå‡Bím\\(ƒ\$_\r’PÎ©(ê˜7ŒÃ5ÈŒ*/ú{*×ó‰C3±‚ Ş½cpò£pæ:ŒqĞæ9ŒÃ¨Ø\$¦l5ƒ–f0ŒöøÜ.·XÚº­P9…)HœŒØvËXá§!\0†)ŠB0\\Yï-É\0ŒÈ˜ÛŸGá\0ôÑ¹)NS2åsš˜µŒ£Ë2\$#°@3# Ö:ä¹ØÒ7éc´F9<¯Ã¢N¢²¦M;ûò9¿{và0¥)_&Š æ;¢vàğ8\r#”±‡ˆ²H2ŒÁèD4ƒ àáxïİ…ËæŒAr&3…éÏŠ<6Y·7áXµ#§d/·ÀÖÂHÚ8'@Ü:xÂAá4#zßÌ0jd§¿¿ùŠr:p³?Ë¾òuís:,ƒÉD&¤Üœ¢R^KÙ}3òwT“ NAˆ.r´Ø ;fX¦ b4È]\"õ{ŸõEl<à€æªZÀaeÈ£HD­\na#ˆ]q¿ƒˆ©l[G¬–’òbÌ›ü@I1\$›…ì\"Je­Œ-zyP	k?B´şâRHXy3ĞT4§ãFa9OÁĞÚ·TC©ª˜üŸÀ‚ùÿ5¡®†2@Í™µoí 2’“ğ²ÌX¡'‰q¢ Â˜T‚¬^*=ãÊ”Êc%üà“‚\$Û¢´X) ·ª’’‚1s§ †¨ÈêƒXtCLÎ/1¸ÆÖÃ4{¼¾ş\\Á\0S\n!0J’pOØ ÁP(ÜŸ‰s€¾:\$xÒ›ü†^FA=§ònwCÉë eÚm'§ÿ7Î±§Œ4‡¨E9´Û(„§MäVO\rÜ\$¥B'“´dPlö^aÙîìF\"y)i(6°Ö¹\\@\$Î(sŒPZ\$±\"k¨é#¤ñ’%!”ÇûÓLiaT*`Zb	#gX”ÃÙ¢DÔd#]aè¶¤åÂ¸×-7@½u(Jx([xaIôıy4Ç·N*\$\$ŠÔ£JB¡€0E\0¤¹R1Èéo¨Š0›LÃ2%Åd×—\0­	Å)#D¦¼’˜£îê›sŞ)&ÉE’IÙ™§m\0‘´ö«¡Õ\$åE%\0ÜËRĞ@kdÉx”ƒq×²Òô6‘93“â~p'\rDˆa-+(*5&Uµ‘R8d82“€Ælƒ \n	dÍ˜ÀŠééÀ\n{SIM©Ò8ÅX¹Ì6õmŠ¤ªÉ0h°)ZtJaë©ÀÇ•\$”";break;case"sl":$g="S:D‘–ib#L&ãHü%ÌÂ˜(6›à¦Ñ¸Âl7±WÆ“¡¤@d0\rğY”]0šÆXI¨Â ™›\r&³yÌé'”ÊÌ²Ñª%9¥äJ²nnÌSé‰†^ #!˜Ğj6 ¨!„ôn7‚£F“9¦<l‹I†”Ù/*ÁL†QZ¨v¾¤Çc”øÒc—–MçQ Ã3›àg#N\0Øe3™Nb	P€êp”@s†ƒNnæbËËÊfƒ”.ù«ÖÃèé†Pl5MBÖz67Q ¢>Ügâk5Û3tâÿr¡ÏD“Ñ‹(ÅPß	FSÔìU8F®—ÂÊzi6‹3ŞiŠI2Ôósy’Oõ”ÏÂ\nE.š¡¾Ššæ›/bè†;Zä4áŠP ,°Â)ƒ ê6ˆHÂŠ°Nè!-Ãä†Bj\n‘D‚8Ê7£(è9!1 ¦î#Ãjø¼Œª0ì¡ƒ[¿PAB6qhi\0ò)³\0Š P¨ÖHó'&±ğ˜œ7¿h Ê2E£¢ûIˆè„³\$Ì0ÍPÔ’Í¡Ë7Ë€PòÍK@ÁpHOÁ‹¦ì!+àÖ£Iâtâ#I,¨	BI	ˆ‘Ê£:n¨ÊÊB(Z6Œ#Jà'Œ€P´Û±Ü–Ê<#r[%¤%pò'£b¢¨ï°ËOÔ+¸(V¨Znª?•ÕyQ*Õı‚Ùl”ÒWuD4…ÖT’×\rÅ‹hXé\0ì—I@Ô	@t&‰¡Ğ¦)C \\6…ÂØåyBí2º²ˆğ:Uãd^1LdD¨ŒÃ2t¨5QxË;Õ\$œ“rˆ¨7²U\0Ü<³Ãpæ:Œc49ŒÃ¨Ø\$n4õEøÀÂù¶¥Ÿ\rÃªaJ^‹§2sâÎ\rékš!ŠbŒ±Y´C246äQ@ì>sZ:%òdœ›£˜á…”(óUK[O\nY[h+ÎŒ½Ul¸´J¾€¥âl6€H69èÕt<A«Öˆ&í`Ê3¡Ğ:ƒ€t…ã¿6Ù…6#C8^øòãÂ\r#xÜ„LäDÌœ(¾Ô!cXD	#hàËÅ£pèã|ş3sĞúç@¢\$ˆ7‹>:¥`2@Íå‡£ä’\$Ñ`Ş3èKâ«Cè+z2_oÒ,©g}ãÃäI-³î4/×•¢‰€@)J:“JÃ°ŞÜ\rù½R»IÊƒ&q˜ó7&\$Ìš#°„U’{ØÜÒ¶O\rl\$ˆ’#âşZ)æg 7¶”¸MRo(áÌ—„’&LY'\r'Ø´ö\"°t4†l‚‡êf‰øf<Äp ¦Ü¦Í;dˆš3JİŒËU ¤ä™'Æ~Rãë\n<)…Fˆ˜°j;	š\nHÓéŠ\$|“	M9èEõŸÖ\nC·3ä€Ûn{ƒ8 \naD&\0Ì¨ˆ€&á*>â}Aì'ï\"Ä ‰˜r‰I}0­ ÒuL s!rM0\"æÂOO©R¡ºN&¶ƒ±”f©/;ŒsJ2ÛKÒuª\0§+OŒ¯XeÎY¤Â²e¹—08Š,ãí,Ó\nÔ–ÒààÀå³,V|ÈEÉp—„4^Xk'A¬Ú“‚ôZ	óë¦ıK’à¤¾k\$üºœÀ@B F áhàÆ}N9x~ĞY+Mìa4qZ¡V}‹éˆ±}\0\$¡ePBCAŸòÍ[t(Ã’àC§ä[T\$ÂĞ·ôïˆĞeC`”—\"è]’ˆMŸ˜<–ClL^¨J!H»ƒš\nS/£t€{Íò–™«è™‡£@ª1•¥¸àKDaüà\$¬\$ØªclpP˜L\ræØã©\n¶}ˆÉ(Í1Íê›(å\r)ÆŠ1êÙGL8\ncÌŒÖ‡¦D\\Ó32áŒ€ªP–Hb:ÙPä<T%2Œ'äD]U°hJT[ÚàÎ\$ÌAaÀ";break;case"sr":$g="ĞJ4‚í ¸4P-Ak	@ÁÚ6Š\r¢€h/`ãğP”\\33`¦‚†h¦¡ĞE¤¢¾†Cš©\\fÑLJâ°¦‚şe_¤‰ÙDåeh¦àRÆ‚ù ·hQæ	™”jQŸÍĞñ*µ1a1˜CV³9Ôæ%9¨P	u6ccšUãPùíº/œAèBÀPÀb2£a¸às\$_ÅàTù²úI0Œ.\"uÌZîH‘™-á0ÕƒAcYXZç5åV\$Q´4«YŒiq—ÌÂc9m:¡MçQ Âv2ˆ\rÆñÀäi;M†S9”æ :q§!„éÁ:\r<ó¡„ÅËµÉ«èx­b¾˜’xš>Dšq„M«÷|];Ù´RT‰RÔ)·ãHÜ3½)CØ÷‚öµmjˆ\$í¢¥?ÆƒFÏ1EÁ¢D4æ„8±ª‘t’%L‚nú5æ8¦¤ì‘x‚&‘45-èJÌh%¬éz‚)Å¢«!I‹:Û¬ˆĞµ *úğ±H¨\"Öh\"|˜>‰‚r\\-q,25ÏZÈû¡¬”¦¬E\$‹+\$’JòÅğz¢Å,mZHQ&EÔ‚A6”€Œ#LtU8²’i’RÚrX\$ŠTf·µƒô‰6ï\\H·22â´²ÏƒT‡Q±dB›.)!?E>´ Q1O;å)UT¢6Ê\\ïTÔ¡(È‚3ï:×Uâ‹!XÛ=a¥ï2I¤‹˜¡pHÚAŠ×S¿4J0Î–uS>É(%º–Â¤ı0¤?o=	V¦ĞÑ\rU	™£wÃTZI³¬ûXÈ¤„ª\nJKq!\$„ôp¡¥Š€¨ÔĞÊN§D56”*}‚º²*â‚,eŞŒCqªòºJiâ\r% Au‹€ã/jhºc¸şK¬H‚+–dËik•bù))işedK6q…-ª3¥ \$	Ğš&‡B˜¦ƒ \\6¡p¶<ìÈºÑ1—ÊÈå‘ÂÛ—C`è97-Ø@0NŞ3Ãd2¼;:±}à±ÂóYQ‚ Şâ\r£Ü<„¨Ü9£Æçc0ê6`Ş3ÀC˜Xè\\`Â3Œ0AÓX#l:ºá@æ­j\"Ç\"PR„!ŠbE…¦?l.ĞÕ\rf¸Ã¬S¦‰	s—ˆªÖQ§‰óY+½ïó-wL7[\"-b#zÖÚ4N·¬™?>Ö3&Eîí3ï¡	£æëN/ä9ãxå]Œ£Àà[«Z\0ğ0›Öêè\"\rĞ:\0tÁxw‚@¸0†GTƒ(rÏè3‚ğÊ ğx:î<4†ø@ƒt9¡Ò…ó¾âƒX\"Á\$6‡–`øt€¼0ƒà@Z8;!½]‚CYÁ\r!ĞâÁ—pt-h­2‚è¡Ña\"Ê8˜ŸÆ-»ÛNÂ‚Oñ7,Å¬Ì\"˜KiT£@¢>\$‘â8m1€Œ(\$tMÄ( \n (FöÔÊ#“AK¯ˆÚ§sÊO‘Ó±&NÑ	“Sjc\n’Zê\0Ò•ô>FQ±5“«Éï©ó:Ar¼Lç½µ14J¡cK²CBA\"¢-5H-¿”•JÒ8\n	\$„<· ÈUÙÃ‰ÎÄS´sÛ¨q§:&`äÃh 0Y½¿S³Á\0csS0èL÷ìsdÙ³oòèš€ Â˜TqÄ™±ø¨«Q¬‡Bt”“w‹ç ºSÄ/\"ÄŸ/•óÅJ\0–§Ôîï\np½yDJ-O…è‹™LCS©;&ÿÃ™B7Fğ1¸§\rƒ|n`€1Î˜Q	€€3£‚r`(F\n’Å+°Ó\r_ÔL‰tÒkÍ™˜=)¬1¶F§Š€±KdF?›‚KS\n=N|FHÒÃMU…\rXH±§ÊÙŠÁVêÊ­TÆ·Iû–L¥•ÖºšNˆ\\dxÕÁI×6w]O¥lAõ–·–êäcJCmá°¾R%@•zoT4»ÈÊĞjâŸ–O8jmC«ó¥‘(7\0ª0-\0‚†8ˆ€ƒ=iWt2PóÊ“Ô	Ug–ÎÉ½ÆomÉ“µ>VìÙ).mí¬¼·	>É\"èiJtZ+Õ@Å¯©8fî©?\" (&ÚğÌLyui«-ª Á¬¢TC¶dÕ®Õ.Œ•¹ñ·İ›¶[©{h•zV¥Ò…ÛÚŠ\nk[gÈÄ<m'êŒ@­¼ERgEâ‘Áµ‹J`\"'œˆH¤vŞ\\jëoE†¸ÔA¯5\rqQåi†ğÊrÃ×‰¦G¢Ùğz´˜TF¡äö¶Wb‚ ±Á”2ôv31ru9İœ•‚…#V¸)è[ÔÀD…ø";break;case"ta":$g="àW* øiÀ¯FÁ\\Hd_†«•Ğô+ÁBQpÌÌ 9‚¢Ğt\\U„«¤êô@‚W¡à(<É\\±”@1	| @(:œ\r†ó	S.WA•èhtå]†R&Êùœñ\\µÌéÓI`ºD®JÉ\$Ôé:º®TÏ X’³`«*ªÉúrj1k€,êÕ…z@%9«Ò5|–Udƒß jä¦¸ˆ¯CˆÈf4†ãÍ~ùL›âg²Éù”Úp:E5ûe&­Ö@.•î¬£ƒËqu­¢»ƒW[•è¬\"¿+@ñm´î\0µ«,-ô­Ò»[Ü×‹&ó¨€Ğa;Dãx€àr4&Ã)œÊs<´!„éâ:\r?¡„Äö8\nRl‰¬Êü¬Î[zR.ì<›ªË\nú¤8N\"ÀÑ0íêä†AN¬*ÚÃ…q`½Ã	\no\0Ò7ğ2k,îSD)Y¤,«:Ò„)\rkfä¸.b¬á:®C• ÁlJ¾ä”ÂNr\$ƒÂÅ¢¯‘)2¬ª0©\n¶Ëq\$&‚ í¹±*A\$€:S®·ºPz±Çik\0Ò¸Ü9#xÜ£ ÊU-¬P¼	J8“\r,suY©ËÔBæ¸Ú\"¨\"+I\\Š•Ô²#6Æî|\"Ü¢Êµ(„+är\0Ü7¨¼CUÄğRl·,ÊA\\«'\rí{E­H_*Ñ4èØ©ğP)DXÕÒ\$B\0Tº2º&4\ršR¾BÕ\$Ï.k{¡Îk=8ŞFá@2ãhËfµN=ÂŞ®}Îß%\nü?¯´ŠR²Ô¤E|ËQ\rïO`6¬x\n£˜Ê9Z„BOÑS#z¥BÍ…¯JÉd—8*ÒdgdD0%AYŠD™ c¶’ŸŠÊue# W4AM²!Aâr¸J2GA]m9ş‚–6JtTÖwÈò÷O ¡xHêÁõaÇõj\0L©Ë\r>¦Î‘.àäˆŒM Áó‰pD1JÄ/±r–‡5û;„›[Ó|Ü¥LÛ<	)Ö¤BO.»ÎdW5±ŞuºHõHãÊ“d1Z+éµa—gr6\$ˆóÂÑs²VZ|*­ÄbüUKÆu7ì3®7šSŠRìH]¢èGFŞğÈX”®Ñ¦tÒ,‹›ŞŠ·‚à&İ+†€c¹¤”\$	Ğš&‡B˜¦ƒ ^6¡x¶<ıƒÈ»}B-·ŒÜÂ–ú¾1JLÊ¦ÕƒešÙİ!ÈñğÌƒb+§q‘hU›± dü)°óÂÄóûT%½.e~‚ o<¡´0†àòª{¡Œ1ğæƒ¨l3¢°æˆr„á„3†V!ûF\r¨¬:ŸpPÁI^aL)blÌ2ˆyÅ×¸ĞV›H ¹.äÎcô4i8W+nÙ‘ã¢qËù‚‘ğhÄlƒJô”“…ÚPB Lå Ï—˜8°ã²æ\"³ÇBtî›± ïI`¶%@M\"Ì\r9kÚA¨azÚDEL+¢#3IvM­»&ZŞ\$h (&†æ}Ã‘æ•ÁÌ;†ğäĞ(x¦H¸	Ş€˜‚ Ğ p@¼‡yœŠ,C\rÌ<K`ÎÃ(n›	æl§ÄüÁñ€g¸:LP¾á(k@ø\$šsØ»ƒpt€¼0ƒâş|qù\rí\0ùHÏi‡™‡ÂI§<P‘h…ºó@Š*R ˆÅ'?áw¤ç¬9BĞåTrm«‰4‚‰rƒ™»É­ßˆÕ\0u¢ºø4€((€ R(|xoÏår¹dä†D~af—szoÖ;qñeàÉ„¦“dl*©`ÔcvM‹¿QqCÕ4jóèÓJA¦µšÅ:3(\"\rQÔaÏT6ÙcH®UÑ”§Š»\$c'O9\r;i6‚¢ÚL2¥¿Á¤Ï`'ººW…9_Çÿ­d-õ¹·\$úÍÙŒ«	\$|<À@K@<”\r‡éø~„!Ô÷Ğ0Ì—h !’i0óâ&È e\r‡[s÷,qÀpo!É2Ï[™2Ó#@'…0©`‘\rn’TÊ8İ\n*üˆ‰)	FC´…ø¢l\"À®&µã›èÀ„Óº¦g±}¹İç¬KA@cOÁ˜4†pê²}\rÖ~^PÆHe¥÷\$Ğ«æ`£ p–\"ˆĞ&b¾ €)…˜/¡ìª`„`©Má+@\r&[P:†-€m\$Zj%‡,ì- W2–2QjÜçkóC¼ño0<aXN3C/k¡«'Wˆ8zßœpó+íë’à \$ŸpÛKĞ>>J\"¶cš7`\nó§Ù?\"»L¥'¢Ì†B•y²æE\$ÔÃ¼)‘ÇåÃÚmqÀ™¨æÇ¡›’\")f†ÀWnÃHc\r`?	‚ƒlµ‡ÆÏ°Ò¡=+Áõ Úex Tı…P¨h8fùZY˜]éWZ¨<êQ<×E[\n%«™Nv‡K–,1N^ù*°½r_]ŞbºvUı]êÜ­5¶}×â­»•s•1 r›»”ı…_36ÅŒå£AÕ™5—!·hIq?bœş\nDVÛÆõNIçd½Y´©A÷”ÇÊÍ-¦Í{D0G-Ê:€²jaÇ»J»-²‚e\r—å?D†¶õ×âR&Ù½´_®ëaoN¹¡PgÂ!R»Í™ëg7ÈkÕPUCyÅ¬p9(S*Ÿœ^ÕkEéŞ È&`ôV‹z)EŸÒØñSúFõË:fç9^¥GÔöuTqdÁ–F†\\U8Of)|pÓOeÿ¡‘%¿çµÂCšlDGİØë®¶³o¥\\2ï¤uwŞIş½×ïÂèİƒydkEÖH‡—ííö°[Ü¢JHú±nŸn[‡WÖ‡¸·—w‘’—‰×¯´¢";break;case"th":$g="à\\! ˆMÀ¹@À0tD\0†Â \nX:&\0§€*à\n8Ş\0­	EÃ30‚/\0ZB (^\0µAàK…2\0ª•À&«‰bâ8¸KGàn‚ŒÄà	I”?J\\£)«Šbå.˜®)ˆ\\ò—S§®\"•¼s\0CÙWJ¤¶_6\\+eV¸6r¸JÃ©5kÒá´]ë³8õÄ@%9«9ªæ4·®fv2° #!˜Ğj65˜Æ:ïi\\ (µzÊ³y¾W eÂj‡\0MLrS«‚{q\0¼×§Ú|\\Iq	¾në[­Rã|¸”é¦›©7;ZÁá4	=j„¸´Ş.óùê°Y7Dƒ	ØÊ 7Ä‘¤ìi6LæS˜€èù£€È0xè4\r/èè0ŒOËÚ¶í‘p—²\0@«-±p¢BP¤,ã»JQpXD1’™«jCb¹2ÂÎ±;èó¤…—\$3€¸\$›Ú4Ã<3«°ô/¬m£Jæ¹î‹®®å†á'ê6¯¹DÚ²Š6ªÉ@»•)[t‡¯ÌÀÁ+.Ú~¶ Êñs0/íŠpé#\r“Rµ'éL[IÎ“Ê•EhD)1q7±óŒhæ§ Ş\rlŸ\n(‹ÂE¤£9ÁîÂÀ¨*P“³>—t\\›8Ò*/¨ÔTI9—Ü&€‹35 khğ§¤Ë_ÈñÒH\"U¹³Œ°×Fò™q8Åã·.§Îe|€Õö’&“l UPÛIú¶¦sLìJ«/\$ı'§¥³XÔnK¶ä\"ÎUZ£±ÅaY93dÅ\\!Wj“eQ5Œõ‚ îlTÚ'´JÎé'ñ\$!,¢\nı€w„™Vaë¾\$¸b­ş.àËbª™ÊÖâ{Q;wŠûJ:ÉÈ“9PÒ\\¨CËø> PH…á g¢†*ÊØ«´¥‘W®‘3¶:VÎn;5êÛe78Î»'Ã„¢²¦lub»;+¹Š7mK,Y;ôûš²ªÍÇº¤98ä+‹¨§S‘*»°Ğk†­–¬>oºêñk+AJQ{·Bkqfça6%<àÅŠê»O‘ P\$Bhš\nbeH,‰ò;Fä…âÛV\\¢îá~®2'qyJ\rƒ ä=PÂ9=ãxÌ3\r‘àÊâ¹¤Z…VY˜ù¬óR~÷nbĞÓr*\rïÚ0ÃÈ@:Ã˜ê1Œoàæ3£`@6\rã<xÁaşO¸0†pÂ¬Ü6£ÀêA@s/`€2~·ú“QŒ¼0¦‚38:¥ÁÊ¤ó`mÂ‚s	Œï*ŠT4_Îñ'Ácn¤{áDlá&e†É²¬'íeQ!¢8¨ÉÛTË,¬7ìCxnPPÉ¯¢Æ^@ÜâFPPù¨¦’XÈ`=’±xƒMáÒEdíÃd§\0PM!Í‡#çÃ˜w\ráÉ›†PğKĞ€¸ÀÂzŞ€f ˆ4@èĞ/áŞJàÂ hn¡ÈG°ÎÃ(n”á¿¡(şyçì:H°¾ƒ_`k@ø\$†Ğà~Cl¡€ğ†|¥Á¹@á½›Ÿù‚CYï\r!ĞùÉ·×&ƒptsé‰p*ÅRŠ«RFDàæå9Å„gHç¡¨V¡œŠ‰N¤éÁ™¤¦œJpOŠ!n'bvVáHP	@ƒ\nTSæ=D“ÒvÌâ´L3lá#BfUJ¹Yxj1ãÈH¬¡Ü'ƒ(<Çµâ»:J£…Š\$¶6‰ğÖË\nvKUNº°.±Â6 äœÓ¶Û\"ÚÜMåV\$’àNãZRå`\$’PòzA\0d\r,ÜøÌÀç(f*?¯@8‡Sù30r\rá´0õ£²” €1¿Êª”w?h>‰¢Ú*Ô(ej®EÀĞbŞw‘=›,»eYMÈR‚&tî×d @³8I¢Ÿ‚ÔEI‹z*t@·CC0 «-JDÇÜ¢\n‘Vöe=zßcï–á¾K‚	ƒHg›¡D&\0Ì~y÷á*OÇØÍÃL¶s2eÛjµW*xr=Òqƒ&`xìE‰FıR¦'<VUI?CˆjìÒóÂ»šÔ;fWUÎ©’^bà¹éAÊ]'#O§|YTådì8ëÒ“XòŠ„°í´1ÖÕc•Ÿˆ÷Nò¦R—^Plu”4†0×bˆÏƒã/‚¦VÚY­+ÜLë\0b™QH*…@ŒAÀ ”!b#ÀÎV [8;iI8ß³¶WoóŒ7Ê&NÓ¬Z¬5(*±¸ó¶phB{9TB8âĞÌo¡w9±>B„üÒí†Q-xç¡Âº&;ßD¸Y}%õølRÂv<-,Fc\$†‰×9Ëö5;»µuj©KÆğ˜2à®L`èÑˆ%|şZ©(\n	–²¥#İ£&{=è\r³lÜw]ÍN\$íz<xœ~C…e\n5ç´lE™Y…g†7Ìq]#XiŒ/¦»’qhWvá5c\rÒ÷Vh¢ÊÚ&· ";break;case"tr":$g="E6šMÂ	Îi=ÁBQpÌÌ 9‚ˆ†ó™äÂ 3°ÖÆã!”äi6`'“yÈ\\\nb,P!Ú= 2ÀÌ‘H°€Äo<N‡XƒbnŸ§Â)Ì…'‰ÅbæÓ)ØÇ:GX‰ùœ@\nFC1 Ôl7ASv*|%4š F`(¨a1\râ	!®Ã^¦2Q×|%˜O3ã¥ĞßvMóÃA†\\ 7\\Îó´ÀÎe9ˆ—3©ÀÈa:sFƒNdépÉğ'˜éĞ«ÖËtFKÅèİ!¦vtÓ	´@e×ñĞ#>¿±ÇœÍæã‘„×ßßÌ ¢œ‚%Ö%M†Ã	º™:»§I÷r…?ÏÀÌF˜ù¸Ò 5ö»”	ı\"iñh`tÊtëTù;©ğÆ¡‹Àä£î£òŒ#’İ#Cd<CkºëLºPX9ã`Ò*˜#Œ£z˜:A\"cJĞÁ“j½Œ£ÈÒ1ÃîË·\0–0b\nhŞîDo`Ò²Bb÷±¯!cŒ,LøAe‹\\Œ‰³:2¤¬<µÊk€1¬–°\\“8c9³\0Òa”ïXäº#Èë¨ ­’hæŸ>pŠ<· Ë8/¡hàŠ4ñ4#É‹^å«ë¥ôZ;KC-\rD\"èÊ7K¤ ÒK2¨ÂØÓT8æÓ£²^6TI:Ê4µ¨)‡B ˆhˆ¶<ØÈºŒ#Z3¸¢²^ˆPe86EKA­Ş3ĞğÜ2¤â˜ê7ªxaéğÖŸH‚ Ş¹ÂÃpò[ãÂ1³˜ÌíÎac49]ãÎ0¥‰d´€Ü\rP9…)<I8#È0ô¦)ÁH@58€\\É(Ú4#[›9¤‘ºN!+,ŸP¼ás]úè0(ÈŸ\$âzv9­ğç3zgX·ğØ¼ƒ2bÍ¹4ŒHK.oœ¾ Pš0Õhğ@8kƒ˜î’Ê£(ğ8=ƒ(É‡ˆ¸Ğ9£0z\r è8Ax^;ïuO„#ÁrJ3…é\n<?H3–„LÔË›˜¾¸»£XD	#hàÜ&# xŒ!òˆÌÄã@ß*³h#œÑ\r,(à]¼î{Ÿè*‹0Ğªo{€ç qü,6'ÙÜ–“Š¯İ%0ÃZ%Ûê)\r¶Š@ èùÃ¢`ö£¨P¢ãM\$á9=ïâÂªJ Ù‡Y¸ŠøVó”¥h\\ùÍú3#Ó¹j>h„¢ÅŠÔ,¬é\0˜Óq(®Ø©‘ätjJ<á¸“„’I	â¢J¦DÂ‡2bê\r!™nÄ:»p@ƒ’&28æCOeÊ3J×ØÜ\\bÃ“bğKÀk@'…0¨lˆù_ÏÌ4£%¨x–‚|fåD‹À³Ôâ#Æ\\ƒåàC:ßıœæ®ƒáAO„œÅÀÆwWƒ›\rêj`ÒÁ\0S\n!2“ZH¸F\nLî¥Uh¡Ã‘…u°´\"<üÍRQƒ¤€+Œ˜Œ)¹z¸>¨ä¹„o6O’t´ä‘¿ˆvRªU¨leD˜•R°J\0„{ `ŸYo•!‰÷¬ŠdBMâœ–\"óÚh‚(\r€­%ô£\0PFÌU“gX@Â¨TÀ´?`ÆéÎ\$¦J²ÄÂ	†²Îq§<êÁJåNp„²œä}j¹Õ‰'-åÄ¹ÁäàL\nb¶	³€3şSÉŞ%(x²ÊÄmÊ0yp6zKÂË/ææŸäÉ›rDhƒa*gÍ%@è|ôš<¿€rğYˆ/:&’R\$Ll'/î&Jftå<’ÒÂI\0¤\n/PL2’ÆhC\"Y FjËàAÈ5\r±	éV§RŸ‡˜ÏÄƒßkr”)Hóä^%Ì½—à";break;case"uk":$g="ĞI4‚É ¿h-`­ì&ÑKÁBQpÌÌ 9‚š	Ørñ ¾h-š¸-}[´¹Zõ¢‚•H`Rø¢„˜®dbèÒrbºh d±éZí¢Œ†Gà‹Hü¢ƒ Í\rõMs6@Se+ÈƒE6œJçTd€Jsh\$g\$æG†­fÉj> ”CˆÈf4†ãÌj¾¯SdRêBû\rh¡åSEÕ6\rVG!TI´ÂV±‘ÌĞÔ{Z‚L•¬éòÊ”i%QÏB×ØÜvUXh£ÚÊZ<,›Î¢A„ìeâÈÒv4›¦s)Ì@tåNC	Ót4zÇC	‹¥kK´4\\L+U0\\F½>¿kCß5ˆAø™2@ƒ\$M›à¬4é‹TA¥ŠJ\\GB›Œ4Ã;äõ!/«î¿(+`˜²ê’P¤¿ê{\\’µ\r'¬²TÏSX6„‹VZ(è\"I(L©` Œ¹ Ê±\nËf@¦‘\\¦‹’š¦.)Dæ‰™«(S³kZÚ±-êê„—.ëYD’¡~ÈHMƒVƒF: ‚£E:f¡FèÑ(É³ËšlÉGÓL•·‘A¡;–Szu CD´RöJ©‘`hr@=„¼®Á†BƒÎs;âh4ÈTJ &\n4MMš_5²d:4O²jÊ@£ˆÑGDšCáW¦%àNÜ¦‘„º½’\"èG31R­¥s*‚‰Œˆ#@±%àHKhÂ–£=k[sU·Å`ÇèÒ]E¨\\wXc^1CV]#EŒf£…­ÚSr\rWM¤ZĞR‰”¬‡Ó\$¥1ªw²³aE(Z6Œ.‹]7–›R¦¤ú›zPr\\ñOY4¼Ğâüec«‚c.“¢b†¤ö»ôËc\nj<’`ğX\\­-^Z¤äÙQ,ÖÃ\\?Ê£C·9şƒ–)Z#w“ÆúFmND-ö›¡ÌbÖ”Æy [Ò&.Û¶Se\n4¦vœ^Âİ.@obîağõô–¢\0PØ:@S‚áŒ#“7ŒÃ0Ù«]7F!tfÿ]E Şåâƒpò£pæ:Œcª9ŒÃ¨Ø\rƒxÏqçÑŒ#>*7†’\r°€êï˜Rµ³Z»}\$Ké*®!ŠbŒÎãû\\‚#š,¤‘«´±°U*âÊh‘(L•–ëZ3 Ñ.‡IšI3é²…!É:qqËB¶3r³úo%ÆH©£r¢#â.AÑï²‚ê‘âkPÏ)UÀÑdı•Q03e=³D4 ÉàM!Ìï#™Ã˜w\ráÉh†PğK\\ˆãƒ0=A :@àx/ñÈğCpe@º†p^CtOyÓßA×q§P:C ¾yƒn\r`ˆÚmŠĞğÂ’ÃÀ§€7­°ğk9¤:È”èc[üX¥tK³v<TÈjçZE=Á4ÒRA•›a\" ÛÙŞÙ³Q¦0ãúRRSõ\n (Óù&œš’O|pS_)')ÍyU¤\"©#t*\">¤Õôb\"–A ¸ÉB~Û2>V„<K¶f†T(…Ie<µ§y€nO±vX\$¢@îÓŠ)Gh„Ş½ÂoST\r?Éªa”“f!d3Ü\\/]©µx‘É*\$¥{åh”ê5,äğ\$‘pòp\0d\r+DåGĞç#±á:Î88‡S«C0r\rá´å!1àŠ\0€1»uè”':‡¡™²ôŠHsóSÊä‚b¯Ó¸¼@'…0¨¾Q)\róĞô°R\\¼‹£Ş¦§ªœBgÚ¬üMóş¤AVnÙUêRÅ}}J¢©	)—)œâpTĞ:/&Œº	sBat‘ 7Ä`A\rƒià€)…˜1Ñ9B`¨+¸nZ!¦3Â¸û,£”<9x–Æ”âC‘mRY#çÜØHı,Y©ÎÍšdVà ÖŠÌ”Ïi_z%d\"ÖÊí2+†ø¸µ¥°Ù-hjVá¡Ú‹yjûg&+9ûÜ6…Te½Ç`ìÖßÜµU<ÀPCq°¦rŒoŒªçªÓåÔÛh\$Sä)¢ÆİZ”N™‰Ñ v„kğ¬\$Š=»Àª0-\0‚(8ê„9<fÊ\\İ4Ñul\nRo#ÆKªTÍşo˜5OaO„šæED¶Ğ­Ãq‡',VçaFù…“e¶Y&lÅ\"bMLmjXfÄĞ?:Ö4V@MÀá˜<˜ü>PˆB€¥¤¹d\rÒ,•ùº%&TøŸTJÍb» • —ñŒ\r[œIXRoµ™ÿïU6½·÷“aù¯*­½\rE~\$U/qÑÑšæÇ3 À™]hRYş»ØVráäZ_£üMƒÖTÑøoH¦õÄæ`:!IE–u‚KĞhe:AŒïEOi‹¶YPBVob^F³~MÿU)ñP¼Ùf¨3AêU|hÄxÑ¤i1ëãDnSôØ7šY	Û¹Ü‡Š‘";break;case"vi":$g="Bp®”&á†³‚š *ó(J.™„0Q,ĞÃZŒâ¤)vƒ@Tf™\nípj£pº*ÃV˜ÍÃC`á]¦ÌrY<•#\$b\$L2–€@%9¥ÅIÄô×ŒÆÎ“„œ§4Ë…€¡€Äd3\rFÃqÀät9N1 QŠE3Ú¡±hÄj[—J;±ºŠo—ç\nÓ(©Ubµ´da¬®ÆIÂ¾Ri¦Då\0\0A)÷XŞ8@q:g!ÏC½_#yÃÌ¸™6:‚¶ëÑÚ‹Ì.—òŠšíK;×.ğ€¢™„ìi¶n÷»øì¬ÛÀ€ğÁEƒ{\rB\n'î¹»Ší_ÌÁˆ2œka§‚!W¹&Asv6Î'HáÈŞÆ»ÉÛä÷ ÉvO„IvL®Ã˜Â:‡J8æ¥©©B‚a”kºjÊ*Ì#ìÓŠX„\n\npEÉš44…K\nÁd‹ÀñÈ@3Äè!ªpK P›k¼<ÈH\n3°Ã|•’/Ğ\"1J'\0øÒ•ªÈ	Z80ÒãÈ›'ëêa¾ò`›/?ŠzT·&! bkëç/B<@Ë(3¤í/%3öšL©\$q*°ÌCŒ‹Èò:¡@æLpÑª PH…¡ gN†³	Xën	~Å/E+ø1§L a”MË]é@ğìÌÒpM¤š	\n,­Ak`°2±S”N¡¦IÁYÒ6Fs!w3Fìƒ'< ÕS’a+\rfPÅöÒF£©µ_¼¥l<4D<º¬X@t&‰¡Ğ¦)BØó\"èZ6¡hÈ2;vCÔÊ²ìÈ6-\0P²7³Cä2„xÌ3\r€Ê—Hemf—e=î”#£?%.j‰ÚHâŠ’)òrö‚5ó7z5lĞÙ.QÆÈëÓ¡«£5F‘†]?ƒs*0ä’%JœnºĞ¡ˆb˜¤#fƒN‹£ÆÑM\0”ÉI ÅlÓò]cª]qC(îXşøÎ—\n¤Ä•»¦§p¼2ù—ã¦ÏFÓìêÙÎéF˜PÃÓYtVÍ¯œáwèÎËù_%¡\0x¡ØÌ„C@è:Ğ^ı¨\\0ŒƒnD9Ãxä3…ã(İà€Ü9/ø^#˜ĞÎ2`¾1\r’¨ÖÌ;Òƒ)’‰Â‡xÂ[èüo= «WË\r	sÜ]>‹æ‘¯3b&2~Cş—.ŠŒ4ü\"E'! Ä˜háw(‹¡n€H\nÑS¢<%Ïé8C\$È7¡\"–ÍÁ9-í”¥´„b_BO¥ødüT”P.\0¡¼\0ìµ…üG\ní^³ÔZ°.ÇŸ¥˜ ëR'ÿƒô{\\nDº‚’\\Hyc¨4¨ĞÜÏàsxK±z4MCø?˜ÿp‚î]Ù4xD6øÅ#0p/<—F ÈLÉ!>…–ğ Â˜T4áÕŸ42réVH|ä‰R¼»I¹9'gÄ‚-äÜ/…‚–1X•C@\$ËİÌ!(¬ËÍÿiO˜«¿I8å“ö.Á*A3|Q›S›%ş†1Œ(Hœaç™ˆ’fì¸D‚Do§y»Í6Úæœš©ê˜’Kš‚…®€†\"”EØ•CÁ8ùŠRË@l†ÆıT¸bşùÙñhDï”“…	1(œOÑ#8¶XıEĞ±1¨õ7@ª0-mÍ’P	OQ‘2qızÌ÷ûÈñ 8õ™i3AÊ0°ì½s)@PQ©UĞ’`?Œ(DMõ©Æ_?	¤æ|³ª|L‰ô.ÄY›(¦Ô³‡\$ª“>F)9Tó6’“ÇkÊ*eÒj:C£12I0:Ñ@Ar„.ŠE’\$vG„hn9†b‘x–vÑğºUGÊÂ<nB¤¦TŠš—QÉZñw{´ ÙKŒ¬t¤ÂBàf©,ÍáÔ";break;case"zh":$g="ä^¨ês•\\šr¤îõâ|%ÌÂ:\$\nr.®„ö2Šr/d²È»[8Ğ S™8€r©!T¡\\¸s¦’I4¢b§r¬ñ•Ğ€Js!Kd²u´eåV¦©ÅDªX,#!˜Ğj6 §:¥t\nr£“îU:.Z²PË‘.…\rVWd^%äŒµ’r¡T²Ô¼*°s#UÕ`QdŞu'c(€ÜoF“±¤Øe3™Nb¦`êp2N™S¡ Ó£:LYñta~¨&6ÛŠ‹•r¶s®Ôükó{¾”òf“qŸw¹ß-œ×ü\n–2‹Œ #*«B!@éL©N…zµĞ¨@F«÷:QQãW­àÏs¡~™r.“ndJ¥ÊX’¨ËŠ;.ÚM(ìbx¦¥¹dè*ŒcÚTÄAns–%ÙÊO-Ç3¨ì!J—ç1.[\$¹h´¤¹ÎVÈÉdŒDcìMœ¤Al²¤‹‚N-9@€§)6_¥éDî’ë£Şã/KáÊLÉït*[¡\$jĞWÇ9@@¬„Ì4^’­ÙÌF'<Å\$Ì©!`r—eÔ<Ä1HxÈDA–-ËA b¥¤8s–’ZN]œÄ\"†^‘§9zW%¤s\0]ïAÈÑYÊE€tIÌE•+!(ZªÒAÊbZN”§Aî#%ÙÒQ7O	[¤y#TL,î 5jŸAÖ-@0‘7ª€P\$Bhš\nb˜-7(ò.…ÃhÚƒ TUUdæÄÓ`è91¬x@0L¨Ş3Ãc˜2¶©rE2›ŞseAÒJ=\" ŞÌ\r£Ü<„¨Ü9£ÆÑc0ê6`Ş3¹ƒ˜XÒXÀÂ3Œ.`A™YA\0Úæ­XP9…8+\0†)ŠB0@“”‡9F*ÇIFÍÖ•‘'¤i+a¸y\n’>Æ\ny\0Ò7ÓÄûñ\">:v KTÇ«®âhÂ9µc“3»c¸Ş9Nã(ğ8\r7èÈàÂÈß£0z\r è8Ax^;ópÂ2fãpÊ9ÛøÎŒ£wH<5xŞÇÓM%øĞœx¾ÙâÃXD	#hàÏ½(èã|£4}ëZ7Îí.l0l¨Ò:3<ş+Ï\rÃ£k°cŸW<ä)ÒP—gADU¡%|'.“øÿ@zâNUD¡_3Í)Ğ@(	€Aõ¿ò)ùq†”ÏÄ¨ˆ¢V¯C:°…m¸˜#MI¹9ˆ€s\nájœÚp*Ç‘,\n!<¨ÅÄ1\$‰‡•ôJw2ï@9ºW’kı!ÔÑ=\0ÌƒxmÎ06ôk]( lššHpŞÍ	µ&\"¨ŸÁ§îÂ˜Tf¸#Ê‘^f)\n—¡\0!G,&…‘\n¥T¸å\$x]ŠCcŒ€cbÌeİ†÷6¾Á\0b\r!œ0¢\0f3ÆTÎ¸°ŒÓNá¥İ7÷ óäL@ˆPÔ9G@Z‰Ş<‘ï‹‘Î&ÌYwA¢Ès	±h›¥,§•\$²U3\0`¥Œ¨A%İš¹rADx—G)¼^‹Ê\$ÄiŒkÜ6¸–Ck\r’@`Â!á¤b 4†f0óÍ¨F‘lØ:·‰ó›(U\nƒ€@éCÜ9¦Õš—A*Ç(¯‡TÆâ8/W‚«'‘\\—PfäŞ]âd§©ÂĞ!E˜è\"Pròâ EyxJ%ôù¡4 rH“Ã˜G\"5qEEpæ‚æ‚Q\0/cß£¤N¤¸(BDp\n	‘úÚuO³2¦¤Ø§`A=‰h‰koÀà‰1Ì'’a3áŒÕ®âbSÑÒ[Ÿb³Ï™ö`‹ATIÈs(¥(£˜IÇŒPˆÄçFAaÂT\0";break;case"zh-tw":$g="ä^¨ê%Ó•\\šr¥ÑÎõâ|%ÌÎu:HçB(\\Ë4«‘pŠr –neRQÌ¡D8Ğ S•\nt*.tÒI&”G‘N”ÊAÊ¤S¹V÷:	t%9Sy:\"<r«STâ ,#!˜Ğj61uL\0¼–£“îU:.–²I9“ˆ—BÍæK&]\nDªXç[ªÅ}-,°r¨“ÖûÎöŒ¿‹&ó¨€Ğa;Dãx€àr4&Ã)œÊs3§SÂtÍ\rAĞÂbÒ¥¨E•E1»ŞÔ£Êg:åxç]#0, (§˜4›Œü\r÷ñˆÅG‘qäZ†–¢SÅ )ĞªOLP\0¨ıÎ”«:}µï»áÚr¢òå´yZî¤se¢\\BœÅABs–¤ @¤2*bPr–î\n¦ª²/kŞÁ)ÒP“Ç)<·Ä©p¨’êY.R®DùÌLGI,I¥¥i.Oc’t’\0F¢å±dtì)Ê\\—È*ğ’ëÚ¬å°eyÊLªÇ)pYÊr•ä2´äÉv—ªY`\\…É0Ìd,Êë±\$ñÒPMdÙ\\‡Œ\0Ä<¶@æCËN3€PH…Á gD†ªY N(KqÈ]—g1GÇç9{;œÄq\$r—Dx'È:ZE£¥é9Q%ÄCÔdÜÆV’IZÒe³Ø_ÇAU=…Å*KªÉá	\\¥¥yråÒ[\nË–]›Ï*[WÙlÈœäy|ª*Â@	¢ht)Š`P¶<İƒÈº\r£h\\2•e\\Iëªî¼C`è92L @0LĞŞ3Ãc¢2·G!x].J„¨‹ÌVeœ*\rìèÚ0ÃÈ@:Ã˜ê1Œm8æ3£`@6\rã;¢9…Hå#8Âè„ÀK<®ˆë>ÏíÒ0¤Bib˜¤#5#xÖ2ËóäE\$9ëÌ%äx˜/‡),WB\$B|Eóf,ÈŠy0Ò7Á(Y\$	¡„f§ªêì>Í72\"hÂ9¶“=¿c¸Ş9O#(ğ8\r8(ÈàÂË`£0z\r è8Ax^;ôpÂ2g£pÊ9Ü8Îê`ğØd;XÜ„MNÓœ¸¾ÜcƒXD	#hàÒ\rº€èã}µ+d7Ï-PAéùÈèÏtøßL7ÖÒ9}–Ü_ÃÅtEYÊJì¯…¸ŒÀ1APaÆ.DM&]ÉG1(+Ç0(€ üP:	Ah4†‚CKïhša\$G@­‚\$¬ód<Ü‰q0&Ma\\-Q(¸j¥\n‰Á\0OÊ	gjGÍ8Q(„	!˜–Jy3\\9µ¢lÍC!ÔÓ½pÌƒxmÒ0·lš€ l²\"š˜àÍ1º\n<)…@@¾‹À™'âªáÌ.ÙBƒÚ4a%‡B†°İæLEi!Ê3*Øãxa½Ñ°4ôC8 \naD&\0ÌhÌÑ¢ra*“ÈixNë†˜\"”EFeÔaRÜ çNÍ½ô>£Äyx²ÂlZtæ[méÀÅKùd+¡É,ghªKf#ÏØˆ1ôX‘>/ÌˆC_á°Å°ÒÃX m’8;ÙkÓz¤31éLn‚4˜zaÕÀ'£4Î¨TÀ´ çYÒ7M¼rˆÄ¤›™Ù‚DlJ·î¾e|h/)8Ù×;U™*U†â'£x›P¤K‰ÁĞ L*P9¨høR¡^‘^A~+Ÿğ¹2)Ì@”¸\\9EğŒ;”ğÉ•E¨ó©‚‚\\m“Á)b\$@?šd9„ò«m&1›ê:\"ùbô–Ğf-Yh:e\\J5¡V9”z‘<ÑÒ‰—ÃÌ(Dd)\"æ(’áP­…@";break;}$zf=array();foreach(explode("\n",lzw_decompress($g))as$X)$zf[]=(strpos($X,"\t")?explode("\t",$X):$X);return$zf;}if(!$zf)$zf=get_translations($ba);if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$ee=array_search("SQL",$b->operators);if($ee!==false)unset($b->operators[$ee]);}function
dsn($Eb,$V,$H){try{parent::__construct($Eb,$V,$H);}catch(Exception$Sb){auth_error($Sb->getMessage());}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($I,$Ff=false){$J=parent::query($I);$this->error="";if(!$J){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($J);return$J;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result($J=null){if(!$J){$J=$this->_result;if(!$J)return
false;}if($J->columnCount()){$J->num_rows=$J->rowCount();return$J;}$this->affected_rows=$J->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($I,$o=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch();return$L[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$L=(object)$this->getColumnMeta($this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=(in_array("blob",(array)$L->flags)?63:0);return$L;}}}$Bb=array();class
Min_SQL{var$_conn;function
Min_SQL($h){$this->_conn=$h;}function
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$je=false){global$b,$x;$Tc=(count($r)<count($N));$I=$b->selectQueryBuild($N,$Z,$r,$E,$z,$F);if(!$I)$I="SELECT".limit(($_GET["page"]!="last"&&+$z&&$r&&$Tc&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$N)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($r&&$Tc?"\nGROUP BY ".implode(", ",$r):"").($E?"\nORDER BY ".implode(", ",$E):""),($z!=""?+$z:null),($F?$z*$F:0),"\n");$We=microtime(true);$K=$this->_conn->query($I);if($je)echo$b->selectQuery($I,format_time($We));return$K;}function
delete($R,$pe,$z=0){$I="FROM ".table($R);return
queries("DELETE".($z?limit1($I,$pe):" $I$pe"));}function
update($R,$P,$pe,$z=0,$Me="\n"){$Sf=array();foreach($P
as$y=>$X)$Sf[]="$y = $X";$I=table($R)." SET$Me".implode(",$Me",$Sf);return
queries("UPDATE".($z?limit1($I,$pe):" $I$pe"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$M,$he){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$Bb["sqlite"]="SQLite 3";$Bb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$fe=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
Min_SQLite($dc){$this->_link=new
SQLite3($dc);$Uf=$this->_link->version();$this->server_info=$Uf["versionString"];}function
query($I){$J=@$this->_link->query($I);$this->error="";if(!$J){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($J->numColumns())return
new
Min_Result($J);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($I,$o=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetchArray();return$L[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($dc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($dc);}function
query($I,$Ff=false){$xd=($Ff?"unbufferedQuery":"query");$J=@$this->_link->$xd($I,SQLITE_BOTH,$n);$this->error="";if(!$J){$this->error=$n;return
false;}elseif($J===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($J);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($I,$o=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetch();return$L[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;if(method_exists($J,'numRows'))$this->num_rows=$J->numRows();}function
fetch_assoc(){$L=$this->_result->fetch(SQLITE_ASSOC);if(!$L)return
false;$K=array();foreach($L
as$y=>$X)$K[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$K;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$D=$this->_result->fieldName($this->_offset++);$ae='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($ae\\.)?$ae\$~",$D,$A)){$R=($A[3]!=""?$A[3]:idf_unescape($A[2]));$D=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$D,"orgname"=>$D,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($dc){$this->dsn(DRIVER.":$dc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($dc){if(is_readable($dc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$dc)?$dc:dirname($_SERVER["SCRIPT_FILENAME"])."/$dc")." AS a")){$this->Min_SQLite($dc);return
true;}return
false;}function
multi_query($I){return$this->_result=$this->query($I);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$he){$Sf=array();foreach($M
as$P)$Sf[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($M))).") VALUES\n".implode(",\n",$Sf));}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($I,$Z,$z,$Gd=0,$Me=" "){return" $I$Z".($z!==null?$Me."LIMIT $z".($Gd?" OFFSET $Gd":""):"");}function
limit1($I,$Z){global$h;return($h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($I,$Z,1):" $I$Z");}function
db_collation($m,$cb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($l){return
array();}function
table_status($D=""){global$h;$K=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$L){$L["Oid"]=1;$L["Auto_increment"]="";$L["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($L["Name"]));$K[$L["Name"]]=$L;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$L)$K[$L["name"]]["Auto_increment"]=$L["seq"];return($D!=""?$K[$D]:$K);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$h;$K=array();$he="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$L){$D=$L["name"];$U=strtolower($L["type"]);$sb=$L["dflt_value"];$K[$D]=array("field"=>$D,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$sb,$A)?str_replace("''","'",$A[1]):($sb=="NULL"?null:$sb)),"null"=>!$L["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$L["pk"],);if($L["pk"]){if($he!="")$K[$he]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$K[$D]["auto_increment"]=true;$he=$D;}}$Ue=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Ue,$B,PREG_SET_ORDER);foreach($B
as$A){$D=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($K[$D])$K[$D]["collation"]=trim($A[3],"'");}return$K;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$K=array();$Ue=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$Ue,$A)){$K[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$B,PREG_SET_ORDER);foreach($B
as$A){$K[""]["columns"][]=idf_unescape($A[2]).$A[4];$K[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$K){foreach(fields($R)as$D=>$o){if($o["primary"])$K[""]=array("type"=>"PRIMARY","columns"=>array($D),"lengths"=>array(),"descs"=>array(null));}}$Ve=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$L){$D=$L["name"];$v=array("type"=>($L["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($D).")",$i)as$De){$v["columns"][]=$De["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($D).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Ve[$D],$ve)){preg_match_all('/("[^"]*+")+( DESC)?/',$ve[2],$B);foreach($B[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$K[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$K[""]["columns"]||$v["descs"]!=$K[""]["descs"]||!preg_match("~^sqlite_~",$D))$K[$D]=$v;}return$K;}function
foreign_keys($R){$K=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$L){$lc=&$K[$L["id"]];if(!$lc)$lc=$L;$lc["source"][]=$L["from"];$lc["target"][]=$L["to"];}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($D))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($D){global$h;$Yb="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Yb)\$~",$D)){$h->error=lang(21,str_replace("|",", ",$Yb));return
false;}return
true;}function
create_database($m,$d){global$h;if(file_exists($m)){$h->error=lang(22);return
false;}if(!check_sqlite_name($m))return
false;try{$_=new
Min_SQLite($m);}catch(Exception$Sb){$h->error=$Sb->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->Min_SQLite(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error=lang(22);return
false;}}return
true;}function
rename_database($D,$d){global$h;if(!check_sqlite_name($D))return
false;$h->Min_SQLite(":memory:");$h->error=lang(22);return@rename(DB,$D);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$D,$p,$ic,$fb,$Nb,$d,$Ea,$Yd){$Pf=($R==""||$ic);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Pf=true;break;}}$c=array();$Td=array();foreach($p
as$o){if($o[1]){$c[]=($Pf?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Td[$o[0]]=$o[1][0];}}if(!$Pf){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$D&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)))return
false;}elseif(!recreate_table($R,$D,$c,$Td,$ic))return
false;if($Ea)queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($D));return
true;}function
recreate_table($R,$D,$p,$Td,$ic,$w=array()){if($R!=""){if(!$p){foreach(fields($R)as$y=>$o){$p[]=process_field($o,$o);$Td[$y]=idf_escape($y);}}$ie=false;foreach($p
as$o){if($o[6])$ie=true;}$Db=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$Db[$X[1]]=true;unset($w[$y]);}}foreach(indexes($R)as$Yc=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$Td[$e])continue
2;$f[]=$Td[$e].($v["descs"][$y]?" DESC":"");}if(!$Db[$Yc]){if($v["type"]!="PRIMARY"||!$ie)$w[]=array($v["type"],$Yc,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$ic[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$Yc=>$lc){foreach($lc["source"]as$y=>$e){if(!$Td[$e])continue
2;$lc["source"][$y]=idf_unescape($Td[$e]);}if(!isset($ic[" $Yc"]))$ic[]=" ".format_foreign_key($lc);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($ic));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$D":$D)." (\n".implode(",\n",$p)."\n)"))return
false;if($R!=""){if($Td&&!queries("INSERT INTO ".table("adminer_$D")." (".implode(", ",$Td).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Td)))." FROM ".table($R)))return
false;$Cf=array();foreach(triggers($R)as$Af=>$qf){$_f=trigger($Af);$Cf[]="CREATE TRIGGER ".idf_escape($Af)." ".implode(" ",$qf)." ON ".table($D)."\n$_f[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$D")." RENAME TO ".table($D));if(!alter_indexes($D,$w))return
false;foreach($Cf
as$_f){if(!queries($_f))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$D,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($D!=""?$D:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$he){if($he[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Wf){return
apply_queries("DROP VIEW",$Wf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Wf,$jf){return
false;}function
trigger($D){global$h;if($D=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$Bf=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$Bf["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($D)),$A);$Fd=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($Fd?" OF":""),"Of"=>($Fd[0]=='`'||$Fd[0]=='"'?idf_unescape($Fd):$Fd),"Trigger"=>$D,"Statement"=>$A[4],);}function
triggers($R){$K=array();$Bf=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$L){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$Bf["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$L["sql"],$A);$K[$L["name"]]=array($A[1],$A[2]);}return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$U){}function
routines(){}function
routine_languages(){}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$I){return$h->query("EXPLAIN $I");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ge){return
true;}function
create_sql($R,$Ea){global$h;$K=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$D=>$v){if($D=='')continue;$K.=";\n\n".index_sql($R,$v['type'],$D,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$K;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R,$af){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$K=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$K[$y]=$h->result("PRAGMA $y");return$K;}function
show_status(){$K=array();foreach(get_vals("PRAGMA compile_options")as$Od){list($y,$X)=explode("=",$Od,2);$K[$y]=$X;}return$K;}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
support($bc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$bc);}$x="sqlite";$Ef=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Ze=array_keys($Ef);$Lf=array();$Nd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$sc=array("hex","length","lower","round","unixepoch","upper");$uc=array("avg","count","count distinct","group_concat","max","min","sum");$Gb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Bb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$fe=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($Qb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$H){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($H,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Uf=pg_version($this->_link);$this->server_info=$Uf["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$K=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($K)$this->_link=$K;return$K;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($I,$Ff=false){$J=@pg_query($this->_link,$I);$this->error="";if(!$J){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($J)){$this->affected_rows=pg_affected_rows($J);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$o=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
pg_fetch_result($J->_result,0,$o);}}class
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
connect($O,$V,$H){global$b;$m=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$H);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$he){global$h;foreach($M
as$P){$Mf=array();$Z=array();foreach($P
as$y=>$X){$Mf[]="$y = $X";if(isset($he[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Mf)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if($h->server_info>=9)$h->query("SET application_name = 'Adminer'");return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($I,$Z,$z,$Gd=0,$Me=" "){return" $I$Z".($z!==null?$Me."LIMIT $z".($Gd?" OFFSET $Gd":""):"");}function
limit1($I,$Z){return" $I$Z";}function
db_collation($m,$cb){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$I="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$I.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$I.="
ORDER BY 1";return
get_key_vals($I);}function
count_tables($l){return
array();}function
table_status($D=""){$K=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' WHEN 'mv' THEN 'materialized view' WHEN 'f' THEN 'foreign table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v','mv','f')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
".($D!=""?"AND relname = ".q($D):"ORDER BY relname"))as$L)$K[$L["Name"]]=$L;return($D!=""?$K[$D]:$K);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$K=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$L){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$L["full_type"],$A);list(,$U,$hd,$L["length"],$ra,$ya)=$A;$L["length"].=$ya;$Ta=$U.$ra;if(isset($wa[$Ta])){$L["type"]=$wa[$Ta];$L["full_type"]=$L["type"].$hd.$ya;}else{$L["type"]=$U;$L["full_type"]=$L["type"].$hd.$ra.$ya;}$L["null"]=!$L["attnotnull"];$L["auto_increment"]=preg_match('~^nextval\\(~i',$L["default"]);$L["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$L["default"],$A))$L["default"]=($A[1][0]=="'"?idf_unescape($A[1]):$A[1]).$A[2];$K[$L["field"]]=$L;}return$K;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$K=array();$hf=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $hf AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $hf AND ci.oid = i.indexrelid",$i)as$L){$we=$L["relname"];$K[$we]["type"]=($L["indisprimary"]?"PRIMARY":($L["indisunique"]?"UNIQUE":"INDEX"));$K[$we]["columns"]=array();foreach(explode(" ",$L["indkey"])as$Jc)$K[$we]["columns"][]=$f[$Jc];$K[$we]["descs"]=array();foreach(explode(" ",$L["indoption"])as$Kc)$K[$we]["descs"][]=($Kc&1?'1':null);$K[$we]["lengths"]=array();}return$K;}function
foreign_keys($R){global$Id;$K=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$L){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$L['definition'],$A)){$L['source']=array_map('trim',explode(',',$A[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$od)){$L['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$od[2]));$L['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$od[4]));}$L['target']=array_map('trim',explode(',',$A[3]));$L['on_delete']=(preg_match("~ON DELETE ($Id)~",$A[4],$od)?$od[1]:'NO ACTION');$L['on_update']=(preg_match("~ON UPDATE ($Id)~",$A[4],$od)?$od[1]:'NO ACTION');$K[$L['conname']]=$L;}}return$K;}function
view($D){global$h;return
array("select"=>$h->result("SELECT pg_get_viewdef(".q($D).")"));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$K=h($h->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$K,$A))$K=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\\1<b>\\2</b>',$A[2]).$A[4];return
nl_br($K);}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($D,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($D));}function
auto_increment(){return"";}function
alter_table($R,$D,$p,$ic,$fb,$Nb,$d,$Ea,$Yd){$c=array();$oe=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Rf=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$oe[]="ALTER TABLE ".table($R)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Rf!="")$oe[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Rf!=""?substr($Rf,9):"''");}}$c=array_merge($c,$ic);if($R=="")array_unshift($oe,"CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($oe,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$D)$oe[]="ALTER TABLE ".table($R)." RENAME TO ".table($D);if($R!=""||$fb!="")$oe[]="COMMENT ON TABLE ".table($D)." IS ".q($fb);if($Ea!=""){}foreach($oe
as$I){if(!queries($I))return
false;}return
true;}function
alter_indexes($R,$c){$mb=array();$Cb=array();$oe=array();foreach($c
as$X){if($X[0]!="INDEX")$mb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Cb[]=idf_escape($X[1]);else$oe[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($mb)array_unshift($oe,"ALTER TABLE ".table($R).implode(",",$mb));if($Cb)array_unshift($oe,"DROP INDEX ".implode(", ",$Cb));foreach($oe
as$I){if(!queries($I))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Wf){return
drop_tables($Wf);}function
drop_tables($T){foreach($T
as$R){$Xe=table_status($R);if(!queries("DROP ".strtoupper($Xe["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Wf,$jf){foreach(array_merge($T,$Wf)as$R){$Xe=table_status($R);if(!queries("ALTER ".strtoupper($Xe["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($jf)))return
false;}return
true;}function
trigger($D){if($D=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");$M=get_rows('SELECT trigger_name AS "Trigger", condition_timing AS "Timing", event_manipulation AS "Event", \'FOR EACH \' || action_orientation AS "Type", action_statement AS "Statement" FROM information_schema.triggers WHERE event_object_table = '.q($_GET["trigger"]).' AND trigger_name = '.q($D));return
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
explain($h,$I){return$h->query("EXPLAIN $I");}function
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$ve))return$ve[1];return
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
set_schema($Fe){global$h,$Ef,$Ze;$K=$h->query("SET search_path TO ".idf_escape($Fe));foreach(types()as$U){if(!isset($Ef[$U])){$Ef[$U]=0;$Ze[lang(23)][]=$U;}}return$K;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$h;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($h->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
support($bc){global$h;return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.($h->server_info>=9.3?'materializedview|':'').'scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$bc);}$x="pgsql";$Ef=array();$Ze=array();foreach(array(lang(24)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(25)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(26)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(27)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(28)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(29)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$Ef+=$X;$Ze[$y]=array_keys($X);}$Lf=array();$Nd=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$sc=array("char_length","lower","round","to_hex","to_timestamp","upper");$uc=array("avg","count","count distinct","max","min","sum");$Gb=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Bb["oracle"]="Oracle";if(isset($_GET["oracle"])){$fe=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Qb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$H){$this->_link=@oci_new_connect($V,$H,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($I,$Ff=false){$J=oci_parse($this->_link,$I);$this->error="";if(!$J){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$K=@oci_execute($J);restore_error_handler();if($K){if(oci_num_fields($J))return
new
Min_Result($J);$this->affected_rows=oci_num_rows($J);}return$K;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$o=1){$J=$this->query($I);if(!is_object($J)||!oci_fetch($J->_result))return
false;return
oci_result($J->_result,$o);}}class
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
limit($I,$Z,$z,$Gd=0,$Me=" "){return($Gd?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $I$Z) t WHERE rownum <= ".($z+$Gd).") WHERE rnum > $Gd":($z!==null?" * FROM (SELECT $I$Z) WHERE rownum <= ".($z+$Gd):" $I$Z"));}function
limit1($I,$Z){return" $I$Z";}function
db_collation($m,$cb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($D=""){$K=array();$He=q($D);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($D!=""?" AND table_name = $He":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($D!=""?" WHERE view_name = $He":"")."
ORDER BY 1")as$L){if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$L){$U=$L["DATA_TYPE"];$hd="$L[DATA_PRECISION],$L[DATA_SCALE]";if($hd==",")$hd=$L["DATA_LENGTH"];$K[$L["COLUMN_NAME"]]=array("field"=>$L["COLUMN_NAME"],"full_type"=>$U.($hd?"($hd)":""),"type"=>strtolower($U),"length"=>$hd,"default"=>$L["DATA_DEFAULT"],"null"=>($L["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$L){$Hc=$L["INDEX_NAME"];$K[$Hc]["type"]=($L["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($L["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$K[$Hc]["columns"][]=$L["COLUMN_NAME"];$K[$Hc]["lengths"][]=($L["CHAR_LENGTH"]&&$L["CHAR_LENGTH"]!=$L["COLUMN_LENGTH"]?$L["CHAR_LENGTH"]:null);$K[$Hc]["descs"][]=($L["DESCEND"]?'1':null);}return$K;}function
view($D){$M=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($D));return
reset($M);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$I){$h->query("EXPLAIN PLAN FOR $I");return$h->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$D,$p,$ic,$fb,$Nb,$d,$Ea,$Yd){$c=$Cb=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($R!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Cb[]=idf_escape($o[0]);}if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Cb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Cb).")"))&&($R==$D||queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)));}function
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
drop_views($Wf){return
apply_queries("DROP VIEW",$Wf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Ge){global$h;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Ge));}function
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
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
support($bc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$bc);}$x="oracle";$Ef=array();$Ze=array();foreach(array(lang(24)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(25)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(26)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(27)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$Ef+=$X;$Ze[$y]=array_keys($X);}$Lf=array();$Nd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$sc=array("length","lower","round","upper");$uc=array("avg","count","count distinct","max","min","sum");$Gb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Bb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$fe=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$H){$this->_link=@sqlsrv_connect($O,array("UID"=>$V,"PWD"=>$H,"CharacterSet"=>"UTF-8"));if($this->_link){$Lc=sqlsrv_server_info($this->_link);$this->server_info=$Lc['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($I,$Ff=false){$J=sqlsrv_query($this->_link,$I);$this->error="";if(!$J){$this->_get_error();return
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
result($I,$o=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->fetch_row();return$L[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;}function
_convert($L){foreach((array)$L
as$y=>$X){if(is_a($X,'DateTime'))$L[$y]=$X->format("Y-m-d H:i:s");}return$L;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$K=new
stdClass;$K->name=$o["Name"];$K->orgname=$o["Name"];$K->type=($o["Type"]==1?254:0);return$K;}function
seek($Gd){for($s=0;$s<$Gd;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$H){$this->_link=@mssql_connect($O,$V,$H);if($this->_link){$J=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$L=$J->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$L[0]] $L[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($I,$Ff=false){$J=mssql_query($I,$this->_link);$this->error="";if(!$J){$this->error=mssql_get_last_message();return
false;}if($J===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($I,$o=0){$J=$this->query($I);if(!is_object($J))return
false;return
mssql_result($J->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;$this->num_rows=mssql_num_rows($J);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$K=mssql_fetch_field($this->_result);$K->orgtable=$K->table;$K->orgname=$K->name;return$K;}function
seek($Gd){mssql_data_seek($this->_result,$Gd);}function
__destruct(){mssql_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$he){foreach($M
as$P){$Mf=array();$Z=array();foreach($P
as$y=>$X){$Mf[]="$y = $X";if(isset($he[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Mf)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($I,$Z,$z,$Gd=0,$Me=" "){return($z!==null?" TOP (".($z+$Gd).")":"")." $I$Z";}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($m,$cb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$K=array();foreach($l
as$m){$h->select_db($m);$K[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$K;}function
table_status($D=""){$K=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$L){if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$L){$U=$L["type"];$hd=(preg_match("~char|binary~",$U)?$L["max_length"]:($U=="decimal"?"$L[precision],$L[scale]":""));$K[$L["name"]]=array("field"=>$L["name"],"full_type"=>$U.($hd?"($hd)":""),"type"=>$U,"length"=>$hd,"default"=>$L["default"],"null"=>$L["is_nullable"],"auto_increment"=>$L["is_identity"],"collation"=>$L["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$L["is_identity"],);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$i)as$L){$D=$L["name"];$K[$D]["type"]=($L["is_primary_key"]?"PRIMARY":($L["is_unique"]?"UNIQUE":"INDEX"));$K[$D]["lengths"]=array();$K[$D]["columns"][$L["key_ordinal"]]=$L["column_name"];$K[$D]["descs"][$L["key_ordinal"]]=($L["is_descending_key"]?'1':null);}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($D))));}function
collations(){$K=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$K[preg_replace('~_.*~','',$d)][]=$d;return$K;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$h->error)));}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($D,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($D));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$D,$p,$ic,$fb,$Nb,$d,$Ea,$Yd){$c=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($ic[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($D)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$D)queries("EXEC sp_rename ".q(table($R)).", ".q($D));if($ic)$c[""]=$ic;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($D)." $y".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$v=array();$Cb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Cb[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Cb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Cb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$I){$h->query("SET SHOWPLAN_ALL ON");$K=$h->query($I);$h->query("SET SHOWPLAN_ALL OFF");return$K;}function
found_rows($S,$Z){}function
foreign_keys($R){$K=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$L){$lc=&$K[$L["FK_NAME"]];$lc["table"]=$L["PKTABLE_NAME"];$lc["source"][]=$L["FKCOLUMN_NAME"];$lc["target"][]=$L["PKCOLUMN_NAME"];}return$K;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Wf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Wf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Wf,$jf){return
apply_queries("ALTER SCHEMA ".idf_escape($jf)." TRANSFER",array_merge($T,$Wf));}function
trigger($D){if($D=="")return
array();$M=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($D));$K=reset($M);if($K)$K["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$K["text"]);return$K;}function
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
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($Fe){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
support($bc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$bc);}$x="mssql";$Ef=array();$Ze=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(25)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(26)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(27)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$Ef+=$X;$Ze[$y]=array_keys($X);}$Lf=array();$Nd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$sc=array("len","lower","round","upper");$uc=array("avg","count","count distinct","max","min","sum");$Gb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Bb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$fe=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$H){$this->_link=ibase_connect($O,$V,$H);if($this->_link){$Of=explode(':',$O);$this->service_link=ibase_service_attach($Of[0],$V,$H);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return($k=="domain");}function
query($I,$Ff=false){$J=ibase_query($I,$this->_link);if(!$J){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($J===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$o=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;$L=$J->fetch_row();return$L[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
Min_Result($J){$this->_result=$J;}function
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
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($hc){return
array("domain");}function
limit($I,$Z,$z,$Gd=0,$Me=" "){$K='';$K.=($z!==null?$Me."FIRST $z".($Gd?" SKIP $Gd":""):"");$K.=" $I$Z";return$K;}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($m,$cb){}function
engines(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){global$h;$I='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$J=ibase_query($h->_link,$I);$K=array();while($L=ibase_fetch_assoc($J))$K[$L['RDB$RELATION_NAME']]='table';ksort($K);return$K;}function
count_tables($l){return
array();}function
table_status($D="",$ac=false){global$h;$K=array();$pb=tables_list();foreach($pb
as$v=>$X){$v=trim($v);$K[$v]=array('Name'=>$v,'Engine'=>'standard',);if($D==$v)return$K[$v];}return$K;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$h;$K=array();$I='SELECT r.RDB$FIELD_NAME AS field_name,
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
ORDER BY r.RDB$FIELD_POSITION';$J=ibase_query($h->_link,$I);while($L=ibase_fetch_assoc($J))$K[trim($L['FIELD_NAME'])]=array("field"=>trim($L["FIELD_NAME"]),"full_type"=>trim($L["FIELD_TYPE"]),"type"=>trim($L["FIELD_SUB_TYPE"]),"default"=>trim($L['FIELD_DEFAULT_VALUE']),"null"=>(trim($L["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($L["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($L["FIELD_DESCRIPTION"]),);return$K;}function
indexes($R,$i=null){$K=array();return$K;}function
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
set_schema($Fe){return
true;}function
support($bc){return
preg_match("~^(columns|sql|status|table)$~",$bc);}$x="firebird";$Nd=array("=");$sc=array();$uc=array();$Gb=array();}$Bb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$fe=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($I,$Ff=false){$G=array('SelectExpression'=>$I,'ConsistentRead'=>'true');if($this->next)$G['NextToken']=$this->next;$J=sdb_request_all('Select','Item',$G,$this->timeout);if($J===false)return$J;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$I)){$df=0;foreach($J
as$Uc)$df+=$Uc->Attribute->Value;$J=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$df,))));}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
Min_Result($J){foreach($J
as$Uc){$L=array();if($Uc->Name!='')$L['itemName()']=(string)$Uc->Name;foreach($Uc->Attribute
as$Ba){$D=$this->_processValue($Ba->Name);$Y=$this->_processValue($Ba->Value);if(isset($L[$D])){$L[$D]=(array)$L[$D];$L[$D][]=$Y;}else$L[$D]=$Y;}$this->_rows[]=$L;foreach($L
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Ib){return(is_object($Ib)&&$Ib['encoding']=='base64'?base64_decode($Ib):(string)$Ib);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$y=>$X)$K[$y]=$L[$y];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Zc=array_keys($this->_rows[0]);return(object)array('name'=>$Zc[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$he="itemName()";function
_chunkRequest($Fc,$qa,$G,$Vb=array()){global$h;foreach(array_chunk($Fc,25)as$Wa){$Xd=$G;foreach($Wa
as$s=>$t){$Xd["Item.$s.ItemName"]=$t;foreach($Vb
as$y=>$X)$Xd["Item.$s.$y"]=$X;}if(!sdb_request($qa,$Xd))return
false;}$h->affected_rows=count($Fc);return
true;}function
_extractIds($R,$pe,$z){$K=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$pe,$B))$K=array_map('idf_unescape',$B[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$pe.($z?" LIMIT 1":"")))as$Uc)$K[]=$Uc->Name;}return$K;}function
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$je=false){global$h;$h->next=$_GET["next"];$K=parent::select($R,$N,$Z,$r,$E,$z,$F,$je);$h->next=0;return$K;}function
delete($R,$pe,$z=0){return$this->_chunkRequest($this->_extractIds($R,$pe,$z),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$pe,$z=0,$Me="\n"){$tb=array();$Pc=array();$s=0;$Fc=$this->_extractIds($R,$pe,$z);$t=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Fc))$tb["Attribute.".count($tb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$Vc=>$W){$Pc["Attribute.$s.Name"]=$y;$Pc["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Vc)$Pc["Attribute.$s.Replace"]="true";$s++;}}}$G=array('DomainName'=>$R);return(!$Pc||$this->_chunkRequest(($t!=""?array($t):$Fc),'BatchPutAttributes',$G,$Pc))&&(!$tb||$this->_chunkRequest($Fc,'BatchDeleteAttributes',$G,$tb));}function
insert($R,$P){$G=array("DomainName"=>$R);$s=0;foreach($P
as$D=>$Y){if($Y!="NULL"){$D=idf_unescape($D);if($D=="itemName()")$G["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$G["Attribute.$s.Name"]=$D;$G["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$G);}function
insertUpdate($R,$M,$he){foreach($M
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
support($bc){return
preg_match('~sql~',$bc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$cb){}function
tables_list(){global$h;$K=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$K[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$K;}function
table_status($D="",$ac=false){$K=array();foreach(($D!=""?array($D=>true):tables_list())as$R=>$U){$L=array("Name"=>$R,"Auto_increment"=>"");if(!$ac){$wd=sdb_request('DomainMetadata',array('DomainName'=>$R));if($wd){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$L[$y]=(string)$wd->$X;}}if($D!="")return$L;$K[$R]=$L;}return$K;}function
explain($h,$I){}function
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
limit($I,$Z,$z,$Gd=0,$Me=" "){return" $I$Z".($z!==null?$Me."LIMIT $z":"");}function
unconvert_field($o,$K){return$K;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$D,$p,$ic,$fb,$Nb,$d,$Ea,$Yd){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$D)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($va,$pb,$y,$te=false){$Na=64;if(strlen($y)>$Na)$y=pack("H*",$va($y));$y=str_pad($y,$Na,"\0");$Wc=$y^str_repeat("\x36",$Na);$Xc=$y^str_repeat("\x5C",$Na);$K=$va($Xc.pack("H*",$va($Wc.$pb)));if($te)$K=pack("H*",$K);return$K;}function
sdb_request($qa,$G=array()){global$b,$h;list($Cc,$G['AWSAccessKeyId'],$Ie)=$b->credentials();$G['Action']=$qa;$G['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$G['Version']='2009-04-15';$G['SignatureVersion']=2;$G['SignatureMethod']='HmacSHA1';ksort($G);$I='';foreach($G
as$y=>$X)$I.='&'.rawurlencode($y).'='.rawurlencode($X);$I=str_replace('%7E','~',substr($I,1));$I.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Cc)."\n/\n$I",$Ie,true)));@ini_set('track_errors',1);$cc=@file_get_contents((preg_match('~^https?://~',$Cc)?$Cc:"http://$Cc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$I,'ignore_errors'=>1,))));if(!$cc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$cg=simplexml_load_string($cc);if(!$cg){$n=libxml_get_last_error();$h->error=$n->message;return
false;}if($cg->Errors){$n=$cg->Errors->Error;$h->error="$n->Message ($n->Code)";return
false;}$h->error='';$if=$qa."Result";return($cg->$if?$cg->$if:true);}function
sdb_request_all($qa,$if,$G=array(),$pf=0){$K=array();$We=($pf?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$G['SelectExpression'],$A)?$A[1]:0);do{$cg=sdb_request($qa,$G);if(!$cg)break;foreach($cg->$if
as$Ib)$K[]=$Ib;if($z&&count($K)>=$z){$_GET["next"]=$cg->NextToken;break;}if($pf&&microtime(true)-$We>$pf)return
false;$G['NextToken']=$cg->NextToken;if($z)$G['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($K),$G['SelectExpression']);}while($cg->NextToken);return$K;}$x="simpledb";$Nd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$sc=array();$uc=array("count");$Gb=array(array("json"));}$Bb["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$fe=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($O,$V,$H){global$b;$m=$b->database();$Pd=array();if($V!=""){$Pd["username"]=$V;$Pd["password"]=$H;}if($m!="")$Pd["db"]=$m;try{$this->_link=@new
MongoClient("mongodb://$O",$Pd);return
true;}catch(Exception$Sb){$this->error=$Sb->getMessage();return
false;}}function
query($I){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$Sb){$this->error=$Sb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
Min_Result($J){foreach($J
as$Uc){$L=array();foreach($Uc
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$L[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$L;foreach($L
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$y=>$X)$K[$y]=$L[$y];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Zc=array_keys($this->_rows[0]);$D=$Zc[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}}class
Min_Driver
extends
Min_SQL{public$he="_id";function
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$je=false){$N=($N==array("*")?array():array_fill_keys($N,true));$Se=array();foreach($E
as$X){$X=preg_replace('~ DESC$~','',$X,1,$lb);$Se[$X]=($lb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$N)->sort($Se)->limit(+$z)->skip($F*$z));}function
insert($R,$P){try{$K=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$K['code'];$this->_conn->error=$K['err'];$this->_conn->last_id=$P['_id'];return!$K['err'];}catch(Exception$Sb){$this->_conn->error=$Sb->getMessage();return
false;}}}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
error(){global$h;return
h($h->error);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases($hc){global$h;$K=array();$qb=$h->_link->listDBs();foreach($qb['databases']as$m)$K[]=$m['name'];return$K;}function
collations(){return
array();}function
db_collation($m,$cb){}function
count_tables($l){global$h;$K=array();foreach($l
as$m)$K[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$K;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
table_status($D="",$ac=false){$K=array();foreach(tables_list()as$R=>$U){$K[$R]=array("Name"=>$R);if($D==$R)return$K[$R];}return$K;}function
information_schema(){}function
is_view($S){}function
drop_databases($l){global$h;foreach($l
as$m){$_e=$h->_link->selectDB($m)->drop();if(!$_e['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$K=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$v){$wb=array();foreach($v["key"]as$e=>$U)$wb[]=($U==-1?'1':null);$K[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$wb,);}return$K;}function
fields($R){return
fields_from_edit();}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}function
alter_table($R,$D,$p,$ic,$fb,$Nb,$d,$Ea,$Yd){global$h;if($R==""){$h->_db->createCollection($D);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$_e=$h->_db->selectCollection($R)->drop();if(!$_e['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$_e=$h->_db->selectCollection($R)->remove();if(!$_e['ok'])return
false;}return
true;}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$D,$P)=$X;if($P=="DROP")$K=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$D));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$lb);$f[$e]=($lb?-1:1);}$K=$h->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$D,));}if($K['errmsg']){$h->error=$K['errmsg'];return
false;}}return
true;}function
last_id(){global$h;return$h->last_id;}function
table($u){return$u;}function
idf_escape($u){return$u;}function
support($bc){return
preg_match("~database|indexes~",$bc);}$x="mongo";$Nd=array("=");$sc=array();$uc=array();$Gb=array(array("json"));}$Bb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$fe=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Zd,$jb=array(),$xd='GET'){@ini_set('track_errors',1);$cc=@file_get_contents($this->_url.'/'.ltrim($Zd,'/'),false,stream_context_create(array('http'=>array('method'=>$xd,'content'=>json_encode($jb),'ignore_errors'=>1,))));if(!$cc){$this->error=$php_errormsg;return$cc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$cc;return
false;}$K=json_decode($cc,true);if($K===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$ib=get_defined_constants(true);foreach($ib['json']as$D=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$D)){$this->error=$D;break;}}}}return$K;}function
query($Zd,$jb=array(),$xd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Zd,'/'),$jb,$xd);}function
connect($O,$V,$H){$this->_url="http://$V:$H@$O/";$K=$this->query('');if($K)$this->server_info=$K['version']['number'];return(bool)$K;}function
select_db($k){$this->_db=$k;return
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
select($R,$N,$Z,$r,$E=array(),$z=1,$F=0,$je=false){global$b;$pb=array();$I="$R/_search";if($N!=array("*"))$pb["fields"]=$N;if($E){$Se=array();foreach($E
as$bb){$bb=preg_replace('~ DESC$~','',$bb,1,$lb);$Se[]=($lb?array($bb=>"desc"):$bb);}$pb["sort"]=$Se;}if($z){$pb["size"]=+$z;if($F)$pb["from"]=($F*$z);}foreach($Z
as$X){list($bb,$Ld,$X)=explode(" ",$X,3);if($bb=="_id")$pb["query"]["ids"]["values"][]=$X;elseif($bb.$X!=""){$kf=array("term"=>array(($bb!=""?$bb:"_all")=>$X));if($Ld=="=")$pb["query"]["filtered"]["filter"]["and"][]=$kf;else$pb["query"]["filtered"]["query"]["bool"]["must"][]=$kf;}}if($pb["query"]&&!$pb["query"]["filtered"]["query"]&&!$pb["query"]["ids"])$pb["query"]["filtered"]["query"]=array("match_all"=>array());$We=microtime(true);$He=$this->_conn->query($I,$pb);if($je)echo$b->selectQuery("$I: ".print_r($pb,true),format_time($We));if(!$He)return
false;$K=array();foreach($He['hits']['hits']as$Bc){$L=array();if($N==array("*"))$L["_id"]=$Bc["_id"];$p=$Bc['_source'];if($N!=array("*")){$p=array();foreach($N
as$y)$p[$y]=$Bc['fields'][$y];}foreach($p
as$y=>$X){if($pb["fields"])$X=$X[0];$L[$y]=(is_array($X)?json_encode($X):$X);}$K[]=$L;}return
new
Min_Result($K);}}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
support($bc){return
preg_match("~database|table|columns~",$bc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$K=$h->rootQuery('_aliases');if($K){$K=array_keys($K);sort($K,SORT_STRING);}return$K;}function
collations(){return
array();}function
db_collation($m,$cb){}function
engines(){return
array();}function
count_tables($l){global$h;$K=$h->query('_mapping');if($K)$K=array_map('count',$K);return$K;}function
tables_list(){global$h;$K=$h->query('_mapping');if($K)$K=array_fill_keys(array_keys($K[$h->_db]["mappings"]),'table');return$K;}function
table_status($D="",$ac=false){global$h;$He=$h->query("_search?search_type=count",array("facets"=>array("count_by_type"=>array("terms"=>array("field"=>"_type",)))),"POST");$K=array();if($He){foreach($He["facets"]["count_by_type"]["terms"]as$R)$K[$R["term"]]=array("Name"=>$R["term"],"Engine"=>"table","Rows"=>$R["count"],);if($D!=""&&$D==$R["term"])return$K[$D];}return$K;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$J=$h->query("$R/_mapping");$K=array();if($J){$nd=$J[$R]['properties'];if(!$nd)$nd=$J[$h->_db]['mappings'][$R]['properties'];if($nd){foreach($nd
as$D=>$o){$K[$D]=array("field"=>$D,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($K[$D]["privileges"]["insert"]);unset($K[$D]["privileges"]["update"]);}}}}return$K;}function
foreign_keys($R){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),array(),'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
drop_tables($T){global$h;$K=true;foreach($T
as$R)$K=$K&&$h->query(urlencode($R),array(),'DELETE');return$K;}$x="elastic";$Nd=array("=","query");$sc=array();$uc=array();$Gb=array(array("json"));}$Bb=array("server"=>"MySQL")+$Bb;if(!defined("DRIVER")){$fe=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($O,$V,$H){mysqli_report(MYSQLI_REPORT_OFF);list($Cc,$de)=explode(":",$O,2);$K=@$this->real_connect(($O!=""?$Cc:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$H!=""?$H:ini_get("mysqli.default_pw")),null,(is_numeric($de)?$de:ini_get("mysqli.default_port")),(!is_numeric($de)?$de:null));return$K;}function
result($I,$o=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch_array();return$L[$o];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$H){$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$H"!=""?$H:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Ra){if(function_exists('mysql_set_charset'))return
mysql_set_charset($Ra,$this->_link);return$this->query("SET NAMES $Ra");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($I,$Ff=false){$J=@($Ff?mysql_unbuffered_query($I,$this->_link):mysql_query($I,$this->_link));$this->error="";if(!$J){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($J===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$o=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
mysql_result($J->_result,0,$o);}}class
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
set_charset($Ra){$this->query("SET NAMES $Ra");}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($I,$Ff=false){$this->setAttribute(1000,!$Ff);return
parent::query($I,$Ff);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$M,$he){$f=array_keys(reset($M));$ge="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Sf=array();foreach($f
as$y)$Sf[$y]="$y = VALUES($y)";$cf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Sf);$Sf=array();$hd=0;foreach($M
as$P){$Y="(".implode(", ",$P).")";if($Sf&&(strlen($ge)+$hd+strlen($Y)+strlen($cf)>1e6)){if(!queries($ge.implode(",\n",$Sf).$cf))return
false;$Sf=array();$hd=0;}$Sf[]=$Y;$hd+=strlen($Y)+2;}return
queries($ge.implode(",\n",$Sf).$cf);}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");return$h;}$K=$h->error;if(function_exists('iconv')&&!is_utf8($K)&&strlen($Ee=iconv("windows-1250","utf-8",$K))>strlen($K))$K=$Ee;return$K;}function
get_databases($hc){global$h;$K=get_session("dbs");if($K===null){$I=($h->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$K=($hc?slow_query($I):get_vals($I));restart_session();set_session("dbs",$K);stop_session();}return$K;}function
limit($I,$Z,$z,$Gd=0,$Me=" "){return" $I$Z".($z!==null?$Me."LIMIT $z".($Gd?" OFFSET $Gd":""):"");}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($m,$cb){global$h;$K=null;$mb=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$mb,$A))$K=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$mb,$A))$K=$cb[$A[1]][-1];return$K;}function
engines(){$K=array();foreach(get_rows("SHOW ENGINES")as$L){if(preg_match("~YES|DEFAULT~",$L["Support"]))$K[]=$L["Engine"];}return$K;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){global$h;return
get_key_vals($h->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$K=array();foreach($l
as$m)$K[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$K;}function
table_status($D="",$ac=false){global$h;$K=array();foreach(get_rows($ac&&$h->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$L){if($L["Engine"]=="InnoDB")$L["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$L["Comment"]);if(!isset($L["Engine"]))$L["Comment"]="";if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){global$h;return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&version_compare($h->server_info,'5.6')>=0);}function
fields($R){$K=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$L){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$L["Type"],$A);$K[$L["Field"]]=array("field"=>$L["Field"],"full_type"=>$L["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($L["Default"]!=""||preg_match("~char|set~",$A[1])?$L["Default"]:null),"null"=>($L["Null"]=="YES"),"auto_increment"=>($L["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$L["Extra"],$A)?$A[1]:""),"collation"=>$L["Collation"],"privileges"=>array_flip(preg_split('~, *~',$L["Privileges"])),"comment"=>$L["Comment"],"primary"=>($L["Key"]=="PRI"),);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$L){$K[$L["Key_name"]]["type"]=($L["Key_name"]=="PRIMARY"?"PRIMARY":($L["Index_type"]=="FULLTEXT"?"FULLTEXT":($L["Non_unique"]?"INDEX":"UNIQUE")));$K[$L["Key_name"]]["columns"][]=$L["Column_name"];$K[$L["Key_name"]]["lengths"][]=$L["Sub_part"];$K[$L["Key_name"]]["descs"][]=null;}return$K;}function
foreign_keys($R){global$h,$Id;static$ae='`(?:[^`]|``)+`';$K=array();$nb=$h->result("SHOW CREATE TABLE ".table($R),1);if($nb){preg_match_all("~CONSTRAINT ($ae) FOREIGN KEY ?\\(((?:$ae,? ?)+)\\) REFERENCES ($ae)(?:\\.($ae))? \\(((?:$ae,? ?)+)\\)(?: ON DELETE ($Id))?(?: ON UPDATE ($Id))?~",$nb,$B,PREG_SET_ORDER);foreach($B
as$A){preg_match_all("~$ae~",$A[2],$Te);preg_match_all("~$ae~",$A[5],$jf);$K[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Te[0]),"target"=>array_map('idf_unescape',$jf[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$h->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$K=array();foreach(get_rows("SHOW COLLATION")as$L){if($L["Default"])$K[$L["Charset"]][-1]=$L["Collation"];else$K[$L["Charset"]][]=$L["Collation"];}ksort($K);foreach($K
as$y=>$X)asort($K[$y]);return$K;}function
information_schema($m){global$h;return($h->server_info>=5&&$m=="information_schema")||($h->server_info>=5.5&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
error_line(){global$h;if(preg_match('~ at line ([0-9]+)$~',$h->error,$ve))return$ve[1]-1;}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){$K=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$K;}function
rename_database($D,$d){$K=false;if(create_database($D,$d)){$xe=array();foreach(tables_list()as$R=>$U)$xe[]=table($R)." TO ".idf_escape($D).".".table($R);$K=(!$xe||queries("RENAME TABLE ".implode(", ",$xe)));if($K)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$K;}function
auto_increment(){$Fa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Fa="";break;}if($v["type"]=="PRIMARY")$Fa=" UNIQUE";}}return" AUTO_INCREMENT$Fa";}function
alter_table($R,$D,$p,$ic,$fb,$Nb,$d,$Ea,$Yd){$c=array();foreach($p
as$o)$c[]=($o[1]?($R!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($R!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$ic);$Xe=($fb!==null?" COMMENT=".q($fb):"").($Nb?" ENGINE=".q($Nb):"").($d?" COLLATE ".q($d):"").($Ea!=""?" AUTO_INCREMENT=$Ea":"");if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)$Xe$Yd");if($R!=$D)$c[]="RENAME TO ".table($D);if($Xe)$c[]=ltrim($Xe);return($c||$Yd?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Yd):true);}function
alter_indexes($R,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Wf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Wf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Wf,$jf){$xe=array();foreach(array_merge($T,$Wf)as$R)$xe[]=table($R)." TO ".idf_escape($jf).".".table($R);return
queries("RENAME TABLE ".implode(", ",$xe));}function
copy_tables($T,$Wf,$jf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$D=($jf==DB?table("copy_$R"):idf_escape($jf).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $D")||!queries("CREATE TABLE $D LIKE ".table($R))||!queries("INSERT INTO $D SELECT * FROM ".table($R)))return
false;}foreach($Wf
as$R){$D=($jf==DB?table("copy_$R"):idf_escape($jf).".".table($R));$Vf=view($R);if(!queries("DROP VIEW IF EXISTS $D")||!queries("CREATE VIEW $D AS $Vf[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$M=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($M);}function
triggers($R){$K=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$L)$K[$L["Trigger"]]=array($L["Timing"],$L["Event"]);return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$U){global$h,$Ob,$Nc,$Ef;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Df="((".implode("|",array_merge(array_keys($Ef),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Ob)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$ae="\\s*(".($U=="FUNCTION"?"":$Nc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Df";$mb=$h->result("SHOW CREATE $U ".idf_escape($D),2);preg_match("~\\(((?:$ae\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Df\\s+":"")."(.*)~is",$mb,$A);$p=array();preg_match_all("~$ae\\s*,?~is",$A[1],$B,PREG_SET_ORDER);foreach($B
as$Wd){$D=str_replace("``","`",$Wd[2]).$Wd[3];$p[]=array("field"=>$D,"type"=>strtolower($Wd[5]),"length"=>preg_replace_callback("~$Ob~s",'normalize_enum',$Wd[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Wd[8] $Wd[7]"))),"null"=>1,"full_type"=>$Wd[4],"inout"=>strtoupper($Wd[1]),"collation"=>strtolower($Wd[9]),);}if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$A[11]);return
array("fields"=>$p,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$I){return$h->query("EXPLAIN ".($h->server_info>=5.1?"PARTITIONS ":"").$I);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Fe){return
true;}function
create_sql($R,$Ea){global$h;$K=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Ea)$K=preg_replace('~ AUTO_INCREMENT=\\d+~','',$K);return$K;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R,$af){$K="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$L)$K.="\n".($af=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($L["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($L["Trigger"])." $L[Timing] $L[Event] ON ".table($L["Table"])." FOR EACH ROW\n$L[Statement];;\n";return$K;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return"AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$K){if(preg_match("~binary~",$o["type"]))$K="UNHEX($K)";if($o["type"]=="bit")$K="CONV($K, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$K="GeomFromText($K)";return$K;}function
support($bc){global$h;return!preg_match("~scheme|sequence|type|view_trigger".($h->server_info<5.1?"|event|partitioning".($h->server_info<5?"|routine|trigger|view":""):"")."~",$bc);}$x="sql";$Ef=array();$Ze=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(25)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(26)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(30)=>array("enum"=>65535,"set"=>64),lang(27)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(29)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$Ef+=$X;$Ze[$y]=array_keys($X);}$Lf=array("unsigned","zerofill","unsigned zerofill");$Nd=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$sc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$uc=array("avg","count","count distinct","group_concat","max","min","sum");$Gb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.2.0";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='http://www.adminer.org/editor/' target='_blank' id='h1'>".lang(31)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($mb=false){return
password_file($mb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($hc=true){return
get_databases($hc);}function
queryTimeout(){return
5;}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){echo'<table cellspacing="0">
<tr><th>',lang(32),'<td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>',lang(33),'<td><input type="password" name="auth[password]">
</table>
<script type="text/javascript">
focus(document.getElementById(\'username\'));
</script>
',"<p><input type='submit' value='".lang(34)."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],lang(35))."\n";}function
login($ld,$H){global$h;$h->query("SET time_zone = ".q(substr_replace(@date("O"),":",-2,0)));return
true;}function
tableName($ff){return
h($ff["Comment"]!=""?$ff["Comment"]:$ff["Name"]);}function
fieldName($o,$E=0){return
h($o["comment"]!=""?$o["comment"]:$o["field"]);}function
selectLinks($ff,$P=""){$a=$ff["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.lang(36)."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$ef){$K=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$L)$K[$L["TABLE_NAME"]]["keys"][$L["CONSTRAINT_NAME"]][$L["COLUMN_NAME"]]=$L["REFERENCED_COLUMN_NAME"];foreach($K
as$y=>$X){$D=$this->tableName(table_status($y,true));if($D!=""){$He=preg_quote($ef);$Me="(:|\\s*-)?\\s+";$K[$y]["name"]=(preg_match("(^$He$Me(.+)|^(.+?)$Me$He\$)iu",$D,$A)?$A[2].$A[3]:$D);}else
unset($K[$y]);}return$K;}function
backwardKeysPrint($Ia,$L){foreach($Ia
as$R=>$Ha){foreach($Ha["keys"]as$db){$_=ME.'select='.urlencode($R);$s=0;foreach($db
as$e=>$X)$_.=where_link($s++,$e,$L[$X]);echo"<a href='".h($_)."'>".h($Ha["name"])."</a>";$_=ME.'edit='.urlencode($R);foreach($db
as$e=>$X)$_.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($L[$X]);echo"<a href='".h($_)."' title='".lang(36)."'>+</a> ";}}}function
selectQuery($I,$of){return"<!--\n".str_replace("--","--><!-- ",$I)."\n($of)\n-->\n";}function
rowDescription($R){foreach(fields($R)as$o){if(preg_match("~varchar|character varying~",$o["type"]))return
idf_escape($o["field"]);}return"";}function
rowDescriptions($M,$kc){$K=$M;foreach($M[0]as$y=>$X){if(list($R,$t,$D)=$this->_foreignColumn($kc,$y)){$Fc=array();foreach($M
as$L)$Fc[$L[$y]]=q($L[$y]);$vb=$this->_values[$R];if(!$vb)$vb=get_key_vals("SELECT $t, $D FROM ".table($R)." WHERE $t IN (".implode(", ",$Fc).")");foreach($M
as$C=>$L){if(isset($L[$y]))$K[$C][$y]=(string)$vb[$L[$y]];}}}return$K;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$Sd){$K=($X===null?"&nbsp;":$X);$_=h($_);if(preg_match('~blob|bytea~',$o["type"])&&!is_utf8($X)){$K=lang(37,strlen($Sd));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$Sd))$K="<img src='$_' alt='$K'>";}if(like_bool($o)&&$K!="&nbsp;")$K=($X?lang(38):lang(39));if($_)$K="<a href='$_'".(is_url($_)?" rel='noreferrer'":"").">$K</a>";if(!$_&&!like_bool($o)&&preg_match('~int|float|double|decimal~',$o["type"]))$K="<div class='number'>$K</div>";elseif(preg_match('~date~',$o["type"]))$K="<div class='datetime'>$K</div>";return$K;}function
editVal($X,$o){if(preg_match('~date|timestamp~',$o["type"])&&$X!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~',lang(40),$X);return$X;}function
selectColumnsPrint($N,$f){}function
selectSearchPrint($Z,$f,$w){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(41)."</legend><div>\n";$Zc=array();foreach($Z
as$y=>$X)$Zc[$X["col"]]=$y;$s=0;$p=fields($_GET["select"]);foreach($f
as$D=>$ub){$o=$p[$D];if(preg_match("~enum~",$o["type"])||like_bool($o)){$y=$Zc[$D];$s--;echo"<div>".h($ub)."<input type='hidden' name='where[$s][col]' value='".h($D)."'>:",(like_bool($o)?" <select name='where[$s][val]'>".optionlist(array(""=>"",lang(39),lang(38)),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$o,(array)$Z[$y]["val"],($o["null"]?0:null))),"</div>\n";unset($f[$D]);}elseif(is_array($Pd=$this->_foreignKeyOptions($_GET["select"],$D))){if($p[$D]["null"])$Pd[0]='('.lang(7).')';$y=$Zc[$D];$s--;echo"<div>".h($ub)."<input type='hidden' name='where[$s][col]' value='".h($D)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($Pd,$Z[$y]["val"],true)."</select></div>\n";unset($f[$D]);}}$s=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".lang(42).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$s][val]' value='".h($X["val"])."' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";$s++;}}echo"<div><select name='where[$s][col]' onchange='this.nextSibling.nextSibling.onchange();'><option value=''>(".lang(42).")".optionlist($f,null,true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]' onchange='selectAddRow(this);' onsearch='selectSearch(this);'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($E,$f,$w){$Rd=array();foreach($w
as$y=>$v){$E=array();foreach($v["columns"]as$X)$E[]=$f[$X];if(count(array_filter($E,'strlen'))>1&&$y!="PRIMARY")$Rd[$y]=implode(", ",$E);}if($Rd){echo'<fieldset><legend>'.lang(43)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Rd,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".lang(44)."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($mf){}function
selectActionPrint($w){echo"<fieldset><legend>".lang(45)."</legend><div>","<input type='submit' value='".lang(46)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Kb,$f){if($Kb){print_fieldset("email",lang(47),$_POST["email_append"]);echo"<div onkeydown=\"eventStop(event); return bodyKeydown(event, 'email');\">\n","<p>".lang(48).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(49).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p onkeydown=\"eventStop(event); return bodyKeydown(event, 'email_append');\">".html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(50).": <input type='file' name='email_files[]' onchange=\"this.onchange = function () { }; var el = this.cloneNode(true); el.value = ''; this.parentNode.appendChild(el);\">","<p>".(count($Kb)==1?'<input type="hidden" name="email_field" value="'.h(key($Kb)).'">':html_select("email_field",$Kb)),"<input type='submit' name='email' value='".lang(51)."' onclick=\"return this.form['delete'].onclick();\">\n","</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$w){return
array(array(),array());}function
selectSearchProcess($p,$w){$K=array();foreach((array)$_GET["where"]as$y=>$Z){$bb=$Z["col"];$Ld=$Z["op"];$X=$Z["val"];if(($y<0?"":$bb).$X!=""){$gb=array();foreach(($bb!=""?array($bb=>$p[$bb]):$p)as$D=>$o){if($bb!=""||is_numeric($X)||!preg_match('~int|float|double|decimal~',$o["type"])){$D=idf_escape($D);if($bb!=""&&$o["type"]=="enum")$gb[]=(in_array(0,$X)?"$D IS NULL OR ":"")."$D IN (".implode(", ",array_map('intval',$X)).")";else{$nf=preg_match('~char|text|enum|set~',$o["type"]);$Y=$this->processInput($o,(!$Ld&&$nf&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$gb[]=$D.($Y=="NULL"?" IS".($Ld==">="?" NOT":"")." $Y":(in_array($Ld,$this->operators)||$Ld=="="?" $Ld $Y":($nf?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($y<0&&$X=="0")$gb[]="$D IS NULL";}}}$K[]=($gb?"(".implode(" OR ",$gb).")":"0");}}return$K;}function
selectOrderProcess($p,$w){$Ic=$_GET["index_order"];if($Ic!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($Ic!=""?array($w[$Ic]):$w)as$v){if($Ic!=""||$v["type"]=="INDEX"){$wc=array_filter($v["descs"]);$ub=false;foreach($v["columns"]as$X){if(preg_match('~date|timestamp~',$p[$X]["type"])){$ub=true;break;}}$K=array();foreach($v["columns"]as$y=>$X)$K[]=idf_escape($X).(($wc?$v["descs"][$y]:$ub)?" DESC":"");return$K;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$kc){if($_POST["email_append"])return
true;if($_POST["email"]){$Le=0;if($_POST["all"]||$_POST["check"]){$o=idf_escape($_POST["email_field"]);$bf=$_POST["email_subject"];$ud=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$bf.$ud",$B);$M=get_rows("SELECT DISTINCT $o".($B[1]?", ".implode(", ",array_map('idf_escape',array_unique($B[1]))):"")." FROM ".table($_GET["select"])." WHERE $o IS NOT NULL AND $o != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$p=fields($_GET["select"]);foreach($this->rowDescriptions($M,$kc)as$L){$ye=array('{\\'=>'{');foreach($B[1]as$X)$ye['{$'."$X}"]=$this->editVal($L[$X],$p[$X]);$Jb=$L[$_POST["email_field"]];if(is_mail($Jb)&&send_mail($Jb,strtr($bf,$ye),strtr($ud,$ye),$_POST["email_from"],$_FILES["email_files"]))$Le++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(52,$Le));}return
false;}function
selectQueryBuild($N,$Z,$r,$E,$z,$F){return"";}function
messageQuery($I,$of){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$I)."\n".($of?"($of)\n":"")."-->";}function
editFunctions($o){$K=array();if($o["null"]&&preg_match('~blob~',$o["type"]))$K["NULL"]=lang(7);$K[""]=($o["null"]||$o["auto_increment"]||like_bool($o)?"":"*");if(preg_match('~date|time~',$o["type"]))$K["now"]=lang(53);if(preg_match('~_(md5|sha1)$~i',$o["field"],$A))$K[]=strtolower($A[1]);return$K;}function
editInput($R,$o,$Ca,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ca value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Ca,$o,($Y||isset($_GET["select"])?$Y:0),($o["null"]?"":null));$Pd=$this->_foreignKeyOptions($R,$o["field"],$Y);if($Pd!==null)return(is_array($Pd)?"<select$Ca>".optionlist($Pd,$Y,true)."</select>":"<input value='".h($Y)."'$Ca class='hidden'><input value='".h($Pd)."' class='jsonly' onkeyup=\"whisper('".h(ME."script=complete&source=".urlencode($R)."&field=".urlencode($o["field"]))."&value=', this);\"><div onclick='return whisperClick(event, this.previousSibling);'></div>");if(like_bool($o))return'<input type="checkbox" value="'.h($Y?$Y:1).'"'.($Y?' checked':'')."$Ca>";$Ac="";if(preg_match('~time~',$o["type"]))$Ac=lang(54);if(preg_match('~date|timestamp~',$o["type"]))$Ac=lang(55).($Ac?" [$Ac]":"");if($Ac)return"<input value='".h($Y)."'$Ca> ($Ac)";if(preg_match('~_(md5|sha1)$~i',$o["field"]))return"<input type='password' value='".h($Y)."'$Ca>";return'';}function
processInput($o,$Y,$q=""){if($q=="now")return"$q()";$K=$Y;if(preg_match('~date|timestamp~',$o["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote(lang(40)))).'(.*))',$Y,$A))$K=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$K=($o["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$K:q($K));if($Y==""&&like_bool($o))$K="0";elseif($Y==""&&($o["null"]||!preg_match('~char|text~',$o["type"])))$K="NULL";elseif(preg_match('~^(md5|sha1)$~',$q))$K="$q($K)";return
unconvert_field($o,$K);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($R,$af,$I){global$h;$J=$h->query($I,1);if($J){while($L=$J->fetch_assoc()){if($af=="table"){dump_csv(array_keys($L));$af="INSERT";}dump_csv($L);}}}function
dumpFilename($Ec){return
friendly_url($Ec);}function
dumpHeaders($Ec,$zd=false){$Wb="csv";header("Content-Type: text/csv; charset=utf-8");return$Wb;}function
homepage(){return
true;}function
navigation($yd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="http://www.adminer.org/editor/#download" target="_blank" id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($yd=="auth"){$gc=true;foreach((array)$_SESSION["pwds"]as$Tf=>$Pe){foreach($Pe[""]as$V=>$H){if($H!==null){if($gc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$gc=false;}echo"<a href='".h(auth_url($Tf,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($yd);if($yd!="db"&&$yd!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($yd){}function
tablesPrint($T){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($T
as$L){$D=$this->tableName($L);if(isset($L["Engine"])&&$D!="")echo"<a href='".h(ME).'select='.urlencode($L["Name"])."'".bold($_GET["select"]==$L["Name"]||$_GET["edit"]==$L["Name"],"select")." title='".lang(56)."'>$D</a><br>\n";}}function
_foreignColumn($kc,$e){foreach((array)$kc[$e]as$jc){if(count($jc["source"])==1){$D=$this->rowDescription($jc["table"]);if($D!=""){$t=idf_escape($jc["target"][0]);return
array($jc["table"],$t,$D);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$h;if(list($jf,$t,$D)=$this->_foreignColumn(column_foreign_keys($R),$e)){$K=&$this->_values[$jf];if($K===null){$S=table_status($jf);$K=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $D FROM ".table($jf)." ORDER BY 2"));}if(!$K&&$Y!==null)return$h->result("SELECT $D FROM ".table($jf)." WHERE $t = ".q($Y));return$K;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($rf,$n="",$Qa=array(),$sf=""){global$ba,$ca,$b,$Bb,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$tf=$rf.($sf!=""?": $sf":"");$uf=strip_tags($tf.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(57),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="never">
<title>',$uf,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.2.0",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.2.0",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.0",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.2.0",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="',lang(57),' nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);"',(isset($_COOKIE["adminer_version"])?"":" onload=\"verifyVersion('$ca');\"");?>>
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape(lang(58)),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Qa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Bb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=(SERVER!=""?h(SERVER):lang(59));if($Qa===false)echo"$O\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Qa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Qa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Qa
as$y=>$X){$ub=(is_array($X)?$X[1]:h($X));if($ub!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$ub</a> &raquo; ";}}echo"$rf\n";}}echo"<h2>$tf</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($n){$Nf=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$vd=$_SESSION["messages"][$Nf];if($vd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$vd)."</div>\n";unset($_SESSION["messages"][$Nf]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($yd=""){global$b,$wf;echo'</div>

';switch_lang();if($yd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(60),'" id="logout">
<input type="hidden" name="token" value="',$wf,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($yd);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($C){while($C>=2147483648)$C-=4294967296;while($C<=-2147483649)$C+=4294967296;return(int)$C;}function
long2str($W,$Yf){$Ee='';foreach($W
as$X)$Ee.=pack('V',$X);if($Yf)return
substr($Ee,0,end($W));return$Ee;}function
str2long($Ee,$Yf){$W=array_values(unpack('V*',str_pad($Ee,4*ceil(strlen($Ee)/4),"\0")));if($Yf)$W[]=strlen($Ee);return$W;}function
xxtea_mx($eg,$dg,$df,$Vc){return
int32((($eg>>5&0x7FFFFFF)^$dg<<2)+(($dg>>3&0x1FFFFFFF)^$eg<<4))^int32(($df^$dg)+($Vc^$eg));}function
encrypt_string($Ye,$y){if($Ye=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ye,true);$C=count($W)-1;$eg=$W[$C];$dg=$W[0];$ne=floor(6+52/($C+1));$df=0;while($ne-->0){$df=int32($df+0x9E3779B9);$Fb=$df>>2&3;for($Vd=0;$Vd<$C;$Vd++){$dg=$W[$Vd+1];$_d=xxtea_mx($eg,$dg,$df,$y[$Vd&3^$Fb]);$eg=int32($W[$Vd]+$_d);$W[$Vd]=$eg;}$dg=$W[0];$_d=xxtea_mx($eg,$dg,$df,$y[$Vd&3^$Fb]);$eg=int32($W[$C]+$_d);$W[$C]=$eg;}return
long2str($W,false);}function
decrypt_string($Ye,$y){if($Ye=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Ye,false);$C=count($W)-1;$eg=$W[$C];$dg=$W[0];$ne=floor(6+52/($C+1));$df=int32($ne*0x9E3779B9);while($df){$Fb=$df>>2&3;for($Vd=$C;$Vd>0;$Vd--){$eg=$W[$Vd-1];$_d=xxtea_mx($eg,$dg,$df,$y[$Vd&3^$Fb]);$dg=int32($W[$Vd]-$_d);$W[$Vd]=$dg;}$eg=$W[$C];$_d=xxtea_mx($eg,$dg,$df,$y[$Vd&3^$Fb]);$dg=int32($W[0]-$_d);$W[0]=$dg;$df=int32($df-0x9E3779B9);}return
long2str($W,true);}$h='';$yc=$_SESSION["token"];if(!$yc)$_SESSION["token"]=rand(1,1e6);$wf=get_token();$be=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$be[$y]=$X;}}function
add_invalid_login(){global$b;$dc=get_temp_dir()."/adminer.invalid";$qc=@fopen($dc,"r+");if(!$qc){$qc=@fopen($dc,"w");if(!$qc)return;}flock($qc,LOCK_EX);$Rc=unserialize(stream_get_contents($qc));$of=time();if($Rc){foreach($Rc
as$Sc=>$X){if($X[0]<$of)unset($Rc[$Sc]);}}$Qc=&$Rc[$b->bruteForceKey()];if(!$Qc)$Qc=array($of+30*60,0);$Qc[1]++;$Ne=serialize($Rc);rewind($qc);fwrite($qc,$Ne);ftruncate($qc,strlen($Ne));flock($qc,LOCK_UN);fclose($qc);}$Da=$_POST["auth"];if($Da){$Rc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Qc=$Rc[$b->bruteForceKey()];$Cd=($Qc[1]>30?$Qc[0]-time():0);if($Cd>0)auth_error(lang(61,ceil($Cd/60)));session_regenerate_id();$Tf=$Da["driver"];$O=$Da["server"];$V=$Da["username"];$H=(string)$Da["password"];$m=$Da["db"];set_password($Tf,$O,$V,$H);$_SESSION["db"][$Tf][$O][$V][$m]=true;if($Da["permanent"]){$y=base64_encode($Tf)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($m);$ke=$b->permanentLogin(true);$be[$y]="$y:".base64_encode($ke?encrypt_string($H,$ke):"");cookie("adminer_permanent",implode(" ",$be));}if(count($_POST)==1||DRIVER!=$Tf||SERVER!=$O||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($Tf,$O,$V,$m));}elseif($_POST["logout"]){if($yc&&!verify_token()){page_header(lang(60),lang(62));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(63));}}elseif($be&&!$_SESSION["pwds"]){session_regenerate_id();$ke=$b->permanentLogin();foreach($be
as$y=>$X){list(,$Xa)=explode(":",$X);list($Tf,$O,$V,$m)=array_map('base64_decode',explode("-",$y));set_password($Tf,$O,$V,decrypt_string(base64_decode($Xa),$ke));$_SESSION["db"][$Tf][$O][$V][$m]=true;}}function
unset_permanent(){global$be;foreach($be
as$y=>$X){list($Tf,$O,$V,$m)=array_map('base64_decode',explode("-",$y));if($Tf==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$m==DB)unset($be[$y]);}cookie("adminer_permanent",implode(" ",$be));}function
auth_error($n){global$b,$yc;$n=h($n);$Qe=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$Qe]||$_GET[$Qe])&&!$yc)$n=lang(64);else{add_invalid_login();$H=get_password();if($H!==null){if($H===false)$n.='<br>'.lang(65,'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$Qe]&&$_GET[$Qe]&&ini_bool("session.use_only_cookies"))$n=lang(66);$G=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$G["lifetime"]);page_header(lang(34),$n,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(67),lang(68,implode(", ",$fe)),false);page_footer("auth");exit;}$h=connect();}$Ab=new
Min_Driver($h);if(!is_object($h)||!$b->login($_GET["username"],get_password()))auth_error((is_string($h)?$h:lang(69)));if($Da&&$_POST["token"])$_POST["token"]=$wf;$n='';if($_POST){if(!verify_token()){$Mc="max_input_vars";$sd=ini_get($Mc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$sd||$X<$sd)){$Mc=$y;$sd=$X;}}}$n=(!$_POST["token"]&&$sd?lang(70,"'$Mc'"):lang(62).' '.lang(71));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=lang(72,"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.lang(73);}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($zc){return"=?UTF-8?B?".base64_encode($zc)."?=";}function
send_mail($Jb,$bf,$ud,$rc="",$ec=array()){$Pb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$ud=str_replace("\n",$Pb,wordwrap(str_replace("\r","","$ud\n")));$Pa=uniqid("boundary");$Aa="";foreach((array)$ec["error"]as$y=>$X){if(!$X)$Aa.="--$Pa$Pb"."Content-Type: ".str_replace("\n","",$ec["type"][$y]).$Pb."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$ec["name"][$y])."\"$Pb"."Content-Transfer-Encoding: base64$Pb$Pb".chunk_split(base64_encode(file_get_contents($ec["tmp_name"][$y])),76,$Pb).$Pb;}$Ka="";$_c="Content-Type: text/plain; charset=utf-8$Pb"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Pa--$Pb";$Ka="--$Pa$Pb$_c$Pb$Pb";$_c="Content-Type: multipart/mixed; boundary=\"$Pa\"";}$_c.=$Pb."MIME-Version: 1.0$Pb"."X-Mailer: Adminer Editor".($rc?$Pb."From: ".str_replace("\n","",$rc):"");return
mail($Jb,email_header($bf),$Ka.$ud.$Aa,$_c);}function
like_bool($o){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$o["full_type"]);}$h->select_db($b->database());$Id="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Bb[DRIVER]=lang(34);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$N=array(idf_escape($_GET["field"]));$J=$Ab->select($a,$N,array(where($_GET,$p)),$N);$L=($J?$J->fetch_row():array());echo$L[0];exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Mf=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$D=>$o){if(!isset($o["privileges"][$Mf?"update":"insert"])||$b->fieldName($o)=="")unset($p[$D]);}if($_POST&&!$n&&!isset($_GET["select"])){$kd=$_POST["referer"];if($_POST["insert"])$kd=($Mf?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$kd))$kd=ME."select=".urlencode($a);$w=indexes($a);$Hf=unique_array($_GET["where"],$w);$qe="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($kd,lang(74),$Ab->delete($a,$qe,!$Hf));else{$P=array();foreach($p
as$D=>$o){$X=process_input($o);if($X!==false&&$X!==null)$P[idf_escape($D)]=$X;}if($Mf){if(!$P)redirect($kd);queries_redirect($kd,lang(75),$Ab->update($a,$P,$qe,!$Hf));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$J=$Ab->insert($a,$P);$fd=($J?last_id():0);queries_redirect($kd,lang(76,($fd?" $fd":"")),$J);}}}$L=null;if($_POST["save"])$L=(array)$_POST["fields"];elseif($Z){$N=array();foreach($p
as$D=>$o){if(isset($o["privileges"]["select"])){$za=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$za="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$za="1*".idf_escape($D);$N[]=($za?"$za AS ":"").idf_escape($D);}}$L=array();if(!support("table"))$N=array("*");if($N){$J=$Ab->select($a,$N,array($Z),$N,array(),(isset($_GET["select"])?2:1));$L=$J->fetch_assoc();if(!$L)$L=false;if(isset($_GET["select"])&&(!$L||$J->fetch_assoc()))$L=null;}}if(!support("table")&&!$p){if(!$Z){$J=$Ab->select($a,array("*"),$Z,array("*"));$L=($J?$J->fetch_assoc():false);if(!$L)$L=array($Ab->primary=>"");}if($L){foreach($L
as$y=>$X){if(!$Z)$L[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$Ab->primary),"auto_increment"=>($y==$Ab->primary));}}}edit_form($a,$p,$L,$Mf);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$w=indexes($a);$p=fields($a);$mc=column_foreign_keys($a);$Hd="";if($S["Oid"]){$Hd=($x=="sqlite"?"rowid":"oid");$w[]=array("type"=>"PRIMARY","columns"=>array($Hd));}parse_str($_COOKIE["adminer_import"],$sa);$Ce=array();$f=array();$mf=null;foreach($p
as$y=>$o){$D=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$D!=""){$f[$y]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($o))$mf=$b->selectLengthProcess();}$Ce+=$o["privileges"];}list($N,$r)=$b->selectColumnsProcess($f,$w);$Tc=count($r)<count($N);$Z=$b->selectSearchProcess($p,$w);$E=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();$rc=($N?implode(", ",$N):"*".($Hd?", $Hd":"")).convert_fields($f,$p,$N)."\nFROM ".table($a);$tc=($r&&$Tc?"\nGROUP BY ".implode(", ",$r):"").($E?"\nORDER BY ".implode(", ",$E):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$If=>$L){$za=convert_field($p[key($L)]);$N=array($za?$za:idf_escape(key($L)));$Z[]=where_check($If,$p);$K=$Ab->select($a,$N,$Z,$N);if($K)echo
reset($K->fetch_row());}exit;}if($_POST&&!$n){$ag=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Va=array();foreach($_POST["check"]as$Sa)$Va[]=where_check($Sa,$p);$ag[]="((".implode(") OR (",$Va)."))";}$ag=($ag?"\nWHERE ".implode(" AND ",$ag):"");$he=$Kf=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$he=array_flip($v["columns"]);$Kf=($N?$he:array());break;}}foreach((array)$Kf
as$y=>$X){if(in_array(idf_escape($y),$N))unset($Kf[$y]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Kf===array())$I="SELECT $rc$ag$tc";else{$Gf=array();foreach($_POST["check"]as$X)$Gf[]="(SELECT".limit($rc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$tc,1).")";$I=implode(" UNION ALL ",$Gf);}$b->dumpData($a,"table",$I);exit;}if(!$b->selectEmailProcess($Z,$mc)){if($_POST["save"]||$_POST["delete"]){$J=true;$ta=0;$P=array();if(!$_POST["delete"]){foreach($f
as$D=>$X){$X=process_input($p[$D]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($D)]=($X!==false?$X:idf_escape($D));}}if($_POST["delete"]||$P){if($_POST["clone"])$I="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Kf===array()&&is_array($_POST["check"]))||$Tc){$J=($_POST["delete"]?$Ab->delete($a,$ag):($_POST["clone"]?queries("INSERT $I$ag"):$Ab->update($a,$P,$ag)));$ta=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Zf="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$J=($_POST["delete"]?$Ab->delete($a,$Zf,1):($_POST["clone"]?queries("INSERT".limit1($I,$Zf)):$Ab->update($a,$P,$Zf)));if(!$J)break;$ta+=$h->affected_rows;}}}$ud=lang(77,$ta);if($_POST["clone"]&&$J&&$ta==1){$fd=last_id();if($fd)$ud=lang(76," $fd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$ud,$J);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n=lang(78);else{$J=true;$ta=0;foreach($_POST["val"]as$If=>$L){$P=array();foreach($L
as$y=>$X){$y=bracket_escape($y,1);$P[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$J=$Ab->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($If,$p),!($Tc||$Kf===array())," ");if(!$J)break;$ta+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(77,$ta),$J);}}elseif(!is_string($cc=get_file("csv_file",true)))$n=upload_error($cc);elseif(!preg_match('~~u',$cc))$n=lang(79);else{cookie("adminer_import","output=".urlencode($sa["output"])."&format=".urlencode($_POST["separator"]));$J=true;$db=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$cc,$B);$ta=count($B[0]);$Ab->begin();$Me=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$M=array();foreach($B[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$Me]*)$Me~",$X.$Me,$pd);if(!$y&&!array_diff($pd[1],$db)){$db=$pd[1];$ta--;}else{$P=array();foreach($pd[1]as$s=>$bb)$P[idf_escape($db[$s])]=($bb==""&&$p[$db[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$bb))));$M[]=$P;}}$J=(!$M||$Ab->insertUpdate($a,$M,$he));if($J)$Ab->commit();queries_redirect(remove_from_uri("page"),lang(80,$ta),$J);$Ab->rollback();}}}$gf=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(46).": $gf",$n);$P=null;if(isset($Ce["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if(count($mc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".lang(81).($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($N,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($E,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($mf);$b->selectActionPrint($w);echo"</form>\n";$F=$_GET["page"];if($F=="last"){$pc=$h->result(count_rows($a,$Z,$Tc,$r));$F=floor(max(0,$pc-1)/$z);}$Je=$N;if(!$Je){$Je[]="*";if($Hd)$Je[]=$Hd;}$kb=convert_fields($f,$p,$N);if($kb)$Je[]=substr($kb,2);$J=$Ab->select($a,$Je,$Z,$r,$E,$z,$F,true);if(!$J)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$F)$J->seek($z*$F);$Lb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$M=array();while($L=$J->fetch_assoc()){if($F&&$x=="oracle")unset($L["RNUM"]);$M[]=$L;}if($_GET["page"]!="last"&&+$z&&$r&&$Tc&&$x=="sql")$pc=$h->result(" SELECT FOUND_ROWS()");if(!$M)echo"<p class='message'>".lang(12)."\n";else{$Ja=$b->backwardKeys($a,$gf);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$r&&$N?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(82)."</a>");$Ad=array();$sc=array();reset($N);$se=1;foreach($M[0]as$y=>$X){if($y!=$Hd){$X=$_GET["columns"][key($N)];$o=$p[$N?($X?$X["col"]:current($N)):$y];$D=($o?$b->fieldName($o,$se):($X["fun"]?"*":$y));if($D!=""){$se++;$Ad[$y]=$D;$e=idf_escape($y);$Dc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$ub="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($Dc.($E[0]==$e||$E[0]==$y||(!$E&&$Tc&&$r[0]==$e)?$ub:'')).'">';echo
apply_sql_function($X["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($Dc.$ub)."' title='".lang(83)."' class='text'> â†“</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($y)).'\'); return false;" title="'.lang(41).'" class="text jsonly"> =</a>';echo"</span>";}$sc[$y]=$X["fun"];next($N);}}$id=array();if($_GET["modify"]){foreach($M
as$L){foreach($L
as$y=>$X)$id[$y]=max($id[$y],min(40,strlen(utf8_decode($X))));}}echo($Ja?"<th>".lang(84):"")."</thead>\n";if(is_ajax()){if($z%2==1&&$F%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($M,$mc)as$C=>$L){$Hf=unique_array($M[$C],$w);if(!$Hf){$Hf=array();foreach($M[$C]as$y=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$y))$Hf[$y]=$X;}}$If="";foreach($Hf
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x=='sql'&&preg_match("~^utf8_~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$If.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$r&&$N?"":"<td>".checkbox("check[]",substr($If,1),in_array(substr($If,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Tc||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$If)."'>".lang(85)."</a>"));foreach($L
as$y=>$X){if(isset($Ad[$y])){$o=$p[$y];if($X!=""&&(!isset($Lb[$y])||$Lb[$y]!=""))$Lb[$y]=(is_mail($X)?$Ad[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$If;if(!$_&&$X!==null){foreach((array)$mc[$y]as$lc){if(count($mc[$y])==1||end($lc["source"])==$y){$_="";foreach($lc["source"]as$s=>$Te)$_.=where_link($s,$lc["target"][$s],$M[$C][$Te]);$_=($lc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($lc["db"]),ME):ME).'select='.urlencode($lc["table"]).$_;if(count($lc["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Hf))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Hf
as$Vc=>$W)$_.=where_link($s++,$Vc,$W);}$X=select_value($X,$_,$o,$mf);$t=h("val[$If][".bracket_escape($y)."]");$Y=$_POST["val"][$If][bracket_escape($y)];$Hb=!is_array($L[$y])&&is_utf8($X)&&$M[$C][$y]==$L[$y]&&!$sc[$y];$lf=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$Hb)||$Y!==null){$vc=h($Y!==null?$Y:$L[$y]);echo"<td>".($lf?"<textarea name='$t' cols='30' rows='".(substr_count($L[$y],"\n")+1)."'>$vc</textarea>":"<input name='$t' value='$vc' size='$id[$y]'>");}else{$md=strpos($X,"<i>...</i>");echo"<td id='$t' onclick=\"selectClick(this, event, ".($md?2:($lf?1:0)).($Hb?"":", '".h(lang(86))."'").");\">$X";}}}if($Ja)echo"<td>";$b->backwardKeysPrint($Ja,$M[$C]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($M||$F)&&!is_ajax()){$Tb=true;if($_GET["page"]!="last"){if(!+$z)$pc=count($M);elseif($x!="sql"||!$Tc){$pc=($Tc?false:found_rows($S,$Z));if($pc<max(1e4,2*($F+1)*$z))$pc=reset(slow_query(count_rows($a,$Z,$Tc,$r)));else$Tb=false;}}if(+$z&&($pc===false||$pc>$z||$F)){echo"<p class='pages'>";$qd=($pc===false?$F+(count($M)>=$z?2:1):floor(($pc-1)/$z));if($x!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".lang(87)."', '".($F+1)."'), event); return false;\">".lang(87)."</a>:",pagination(0,$F).($F>5?" ...":"");for($s=max(1,$F-4);$s<min($qd,$F+5);$s++)echo
pagination($s,$F);if($qd>0){echo($F+5<$qd?" ...":""),($Tb&&$pc!==false?pagination($qd,$F):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$qd'>".lang(88)."</a>");}echo(($pc===false?count($M)+1:$pc-$F*$z)>$z?' <a href="'.h(remove_from_uri("page")."&page=".($F+1)).'" onclick="return !selectLoadMore(this, '.(+$z).', \''.lang(89).'...\');" class="loadmore">'.lang(90).'</a>':'');}else{echo
lang(87).":",pagination(0,$F).($F>1?" ...":""),($F?pagination($F,$F):""),($qd>$F?pagination($F+1,$F).($qd>$F+1?" ...":""):"");}}echo"<p class='count'>\n",($pc!==false?"(".($Tb?"":"~ ").lang(91,$pc).") ":"");$zb=($Tb?"":"~ ").$pc;echo
checkbox("all",1,0,lang(92),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$zb' : checked); selectCount('selected2', this.checked || !checked ? '$zb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(82),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(78).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(93),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(94),'">
<input type="submit" name="delete" value="',lang(18),'"',confirm(),'>
</div></fieldset>
';}$nc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($nc['sql']);break;}}if($nc){print_fieldset("export",lang(95)." <span id='selected2'></span>");$Ud=$b->dumpOutput();echo($Ud?html_select("output",$Ud,$sa["output"])." ":""),html_select("format",$nc,$sa["format"])," <input type='submit' name='export' value='".lang(95)."'>\n","</div></fieldset>\n";}echo(!$r&&$N?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",lang(96),!$M);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$sa["format"],1);echo" <input type='submit' name='import' value='".lang(96)."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Lb,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$wf'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($R,$t,$D)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$J=$h->query("SELECT $t, $D FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$D LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($L=$J->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($L[0]))."'>".h($L[1])."</a><br>\n";if($L)echo"...\n";}exit;}else{page_header(lang(59),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(97).": <input name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(41)."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^tables\[/);"><th>'.lang(98).'<td>'.lang(99)."</thead>\n";foreach(table_status()as$R=>$L){$D=$b->tableName($L);if(isset($L["Engine"])&&$D!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true),"","formUncheck('check-all');"),"<th><a href='".h(ME).'select='.urlencode($R)."'>$D</a>";$X=format_number($L["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($L["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","</form>\n";}}page_footer();