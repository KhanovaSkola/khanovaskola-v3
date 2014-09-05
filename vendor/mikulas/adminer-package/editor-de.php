<?php
/** Adminer Editor - Compact database editor
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.1.0
*/error_reporting(6135);$ac=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($ac||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Ef=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Ef)$$X=$Ef;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŒFÃ©”vt2‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅÃôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PĞ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛĞ889¤È QØıŒî2#8Ğ­£’˜6mú²†ğjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ğ¼o(Úó¥ÉkÔ7½sàù>Œî†!ĞR\"*nSı\0@P\"Áè’(‹#[¶¥£@g¹oü­’znş9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ğè!°üë*cì÷>Î¬E7DñLJ© 1ÊJ=ÓÚŞ1L‚û?Ğs=#`Ê3\$4ì€úÈuÈ±ÌÎzGÑC YAt«?;×QÒk&ÇïYP¿uèåÇ¯}UaHV%G;ƒs¼”<A\0\\¼ÔPÑ\\Âœ&ÂªóV¦ğ\n£SUÃtíÅÇrŒêˆÆ2¤	l^íZ6˜ej…Á­³A·dó[İsÕ¶ˆJP”ªÊóˆÒŒŠ8è=»ƒ˜à6#Ë‚74*óŸ¨#eÈÀŞ!Õ7{Æ6“¿<oÍCª9v[–MôÅ-`Óõkö>lÙÚ´‹åIªƒHÚ3xú€›äw0t6¾Ã%MR%³½jhÚB˜<´\0ÉAQ<P<:šãu/¤;\\> Ë-¹„ÊˆÍÁQH\nv¡L+vÖÃ¦ì<ï\rèåvàöî¹\\* àÉçÓ´İ¢gŒnË©¸¹TĞ©2P•\r¨øß‹\"+z 8£ ¶:#€ÊèÃÎ2‹ºJ[i—‚£¨;z˜ûÑô¡rÊ3#¨Ù‰ :ãní\rã½ƒeÙpdİİ è2cˆê4²k¿Š£\rG•æE6_²ªÊØŞ‰b‹/Œ«HB%ò0ë¢>ÈÈğhoWÃnxlÖ æµƒCQ^€°ĞÔÿßñ\r„Š¾¶4lK{şZÆü:†ĞÜÃƒŸ.¦p¨§Ä‚éJóB-Å+B”´‘(ëTòŸ%®µJ›0ªlØT¶`+É-Á¾@BÚáÛ„Vá’Ä\0ÂÏC¼,ì¯0tâàŒF‡‰å?Ä Ë\na@ÉŒ>‚âZEC“ôO-æ›¤^Q€&ßÖù)I)®¤ÄÀR„]\r¡”9”7_ˆ¢\rÉF80µObù	€‘î>ºäı\nRı_ˆÑ8æ‚ØÙ«äov0¤bCA¸F!Ñt—–Äƒ%0”/‘zAYO(4«‹¡ˆ¨Ò	'Ÿ] Iéí8hHÂ05˜3ò@x&nˆ’|TÓ³³)`.“s6eY˜D¦z¸Œ®¥ƒJÑ“ô.„ñ{GEb¹Ó‹¡˜‹†2Õ×{\$**ı¾@İC-:zYHZIôà5F]¦²YúùCªOêAÂÚó`x'´.*9t'{ÿ(êšwP¶¾ Ñ=¢*‰†ú*üxwråÔ*c‚Ìc|„DŸ“ÚV—–\r†V.‡0âÆ™V¤dˆ?Ò€üê,EÍ`T¦É6Ûˆ-“Åì¾ÅÚT[Ñªz©‚.Ar±£Í€Pøºnƒc=aÔ9Fònß!ÙuáÎA©Şƒ0iPó¬”îºJ6eäT]VØ[\rXÌáaŸ–vkõ\n+EˆáÜ•*\0¶~¶Æù@g\"ÌNCI\$àÉŒƒ€êx@WÃy¼*vuDÙ\0ŞvœëŒ†V\0èV`Gç½uµE®Ö•ÂÁf“l˜h’@ï)0@šT•°7‹íÛÂ§RAÊÙ·ò´3Û˜Ğ«/QÇ]ª,sÖ{VR±¡öF«¡A˜„<¨v×¥î´%@9‚ÀF¢Õ5t‰%Ö+º/¢8;¾WÑäÚÇJïĞo:ÖNÿ`ø	•ÿš´hìÁ{Ü£•î ËÔ8ÔEuª&°W|É†„‰®Uú&\r\"ÔÁ»‰|-uÇ†…Në¶:nc²©fV­‹ÂÃè#U20å>\"®²Ç>Ì`œk]î-¯ÇxùSØÍ‡Ğ¢©‰‚êcâ¡óB’—}Ø&`ˆîr+E­“\$œyNıŒ±b,†´´Wx ş-9åÕrÓ,’ü`å+œïíËŠù’CœÓ)˜˜7Ûx\r¬şWµfMŒSR¼\\èz¦ÙQ²Ì“”uA¬ºê2±õ4îL&ËHi Âµ°²¹S\$)e³“æg rÈŒ©ƒ\$]ZëiYs¤õ×kW–n>µ7E1k8ĞdÃró®škÁı¢ëEŞÙÛwÂwcmTy¹•ë¿a›\$tx\rB´÷=Šö¢*”<Èƒ l¡fôKœ‘N/¶¼	ÃlÕáükH“õ8 .‘‘ù?f÷›Úÿã6†Ñ‡¼{gi/\"à@–K›ñ@2ãça|#,Z¤±‡	³ñwˆd¬™“²…¼å6w™^&Áêt™çœP±…¥Äù]À¼›.àãÚí¡TìîkroÀ‰÷\ro=—%æ×h`:\0á±‚ö«”|êŠ£«a“Ô®6*:ÍÓ*‡ÊrO-^–’ñén«Íó§MÆ}æ»÷ÆAya±İ\nƒu^ì–ÀrnO\r±»¡`şT~</ğ¶wÄyş}æ:›|£ÏĞûÖÌ¡6»¤×ø®Ÿvî\rc<·b#ûàô§†î–\$ùsµê|ç‡‡V)«h‹TCùñ(Ä½ñ£È}");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n0›†S‘Øa9œÅS`°Çˆ“Œ&Ó(°Ên0˜†QIìÒf‰›\$±At^ sG²Étf6eŒ§yŒÊ()LäSÁÀP'…ÂáÌR'Ífq]\"˜s>	)â‘`œH2ŠEq9ˆÊ?ˆ*)‰”t'°Ï§Ø\n	\ræs<ŒPi2INÆ*(=2ÌgXá¸è.3™N„Y4èB<’L—üîi©Ì¥2İ´z=š0HøĞ'·êŒšÃuÆtt:œÂ¡Èêe¹]`pX9ŒŞo5šgòóIœÜ,2O4ãŞÑ…MÆS¸(ˆa…Š#¾Äàç’ïø|¹G‚bèôüxœ^Z[Çä™G¼ÎuTvª(Òm@Vò¸(†¼ÈbN<ŠÈ`æâXä1É+Œä9J8Â2\r£K¶9ğhå	 Áè`…‹ÆëI8ä›±S±ãt÷2ƒ+,£ÆIºã £pæ9aèØÅ< \\8Czôã\rŠ¨^òÈ]Ä1\\7C8_Ep^ÂĞÀéM1Àw\"'4fSX9ES|ä›…Ãk3ÄB@ÊæXa=No4t7ƒdD3µpŞÑàæ:)\\;° ĞÔğ\r)8HÔÅ44Pc=\nÔ!pdÇÕQN\rÌHï'ô¸š2¢#\"Õ¥m-¶b,Ç	ƒM.¡‰-IKÓ)ÀÉe'•\"ƒ´¤>2XÑÅ“eÄj:9^²1c„»È:YÉ@ËuËã“›4òXÇ& Ò|£)Ñ’´±-K‘xŒëªÂSğè1Óó\$â¡@\\…!x]\0Œ£ÕÎÀÂñ¤áF†COÄ:à1K‡Å*†F4aˆ»¼k˜úÈKÏš¾‘»ö2l¬pÌ3J<Èâ,2Øà8#ã †Õ\rŒÜášÜî ó¤h¬„·áF±Œİ‰2PëèŒŠl(È\$Ö°\nJÛ·-ŞÊÇ°cc~¹FÔîrøátbŞû½m{hğ.‡{ƒtkÛBµKc£z4ŒCª9…Û«~>ƒØúÈÚ`Æ“¹C Âs:âİÔ!cÅÙ®Úµ”*WÉHX:WÌ;Nà ¨j*/(á_p3ª¡HIãKlÉn!trã£Gã­º¤tCƒ	vƒ?mã¤£¾ Ÿ¢–\0CÙö¨§oÜ¥cbf6Işû'\ríbåÅ7h§`‚È9½iìd5’—taMè={É©ğ»`NoK‰	!d4ĞƒzWXdmH°š*€ÆÛS ]ÏĞ3&\0Ú°	d%A´-²…	Âì(„šÙùQĞ}ø‚èU!t7°ä‹†˜>x‹‘t{mY¹„0Ş@^±€\"Ñ=‡³Î@t\r¡°ÎÄ+Y§.¼·¼X¿\n«I'KTŸ€^(ìD.@öÜø++@¼3•ÒÔX‹	aEì!,Yéö2-432ÔŒõMOàÖI\$q%	Ä‹G¦X9™‡Â[R\0nÁĞ¸Â PŒJy\r òBÈp\\HÃpgSÉ¼±Faejk—.4¸†C.^ yi‘ˆ9‡PÄˆe\"Î”NY¬¢BHÃ#8ÑB1\"¶j\\Ú©x‡ğ#¾â@G 9†2¨Âf.ĞŒpsršTJ xÚk˜–È4KIlÈfù8z¤¥KÈ‡>AKñŸ¡n^’Ø=&ŒƒAÀ*?'³^%;ğî4Ü€³†Œ9¤Q’“hâN‡™>MÊ=['vHIİJ§‘“ÙvÆâ’RÊtƒó<Ÿ”Ò²Å^¢¼zÔÂ‰B^öhâ'µ‚É©Ğ)-'#”¤9JTÁ)Ø@jO!¨Úc,e˜j–¤–‡@H,‰ÂØjˆa™©vZŒ>­¡Ò·µ)E`\0\n‡áTPó8L<‰c•:F˜æ‰\$\nƒííœ†ÃÏCHm\"j‹y·AÛS¶ ÜSªQ„ğœÎÎ{T']WªUÚ)_L¥˜i¬mˆOš‚¥è„şÔP:g¡{¸’ZÄ—ø.ÿ{”¨‡Dh\n»ÑÁ‡a­\r]9¥tÜà!XA½[È°¦ã—Cœ»×\n:•”haœÎÚå\"İ¢a2Lmƒ·Í\\	ûëp5÷@ú«@m£ì|Wö•ÀÂ%È|u®áÈ+hKÃL&¢Ï Ş3ü.XWÜÙººÈñ*qƒÛcÃé‡%.K¿“Š_”)®uÔ2W\$O]…d8’ê»gÁ?mFyúly¢%Ó‰ö²ÍÜDQÇ.uÄ²ñ‡Æ¹ø‚ÉÛL‚ı,Ş¬†è3ğæjƒ0t	a”<¬\0Pr•mNs8ÙŒk>M9, †á±ëBÁş±xÖáƒ£zoä¸™uB?`é¬§&ÂIÉ<¯¥ÍÑeÅYåsÊzÔ‡*±.'t»µõ‚zÛ)m*4X=—tI=ınÑ¦yÌŞšééc2¥¡`öääØ.Y¬¿Ö:éÎK“N’µr06Ó_rJ‘ØkÃtOè|^Íˆ¡çz\nÏ¿é±•ˆ<W‹1n.¨X·`•‚gúVG4Zÿ­rë!İÏÈY[ŞÓÅz:LäDˆÂ@T	¡0Ô`Üƒ˜pjSn\"YÁÈg	á`÷}Äšğ÷‘¬\n\nä4®ˆ\rg‚¹O7Ü¿b§è”y¡Ì)¹E¯Ãß)w>Ü~urš³Ş29h‚tgB#¹•°²ôF‚p(é@¥`u0÷Ñƒ(flG¥a0bZ7J@İI_PZ‹‹yq^Ëà7î°¸çG‰3dƒ˜ĞêÑ3¶é“„0ƒÛàŸïŸ{Ö¸»øˆa6½P¾ƒ4W	d:¿ü„W\nêt4ï‹¾.ñşDÉy°È§»85‡«AMôL’Xw5Ùese³Ü÷C	#ıİËrrYë	Ç®!Âî€Âå”Ÿ@/\rÌ ›0¥wEl\"›OéWŒ<Q‘ÄÛ ñEkÀSQiÿdŸı\\kÙ¬ëü8×ëşHŒ²\"ëbL}×%½	¬Ñ-^ğ _âh\nF-.í2nj¬ÔËVMàxnj¾¦m\\\$°¨¬ñ*\n¶ÈÖ'¢~à¶ Z@º€¶ Vâº€L\"ãˆ†p†Ø5€ğO, ÿË¹\0\nª-0¥\r4”pÔäbÕ0fÕp¶mg¤i©şO.(ÛP9ĞAPH+ĞNHpf¨§4?BàMğ®·ãJF¶.îô\0èà°Èà«Ôi…jÆ€Pş+(¯&æ»ãaŒÖ%l]'Üïl^@(œ5ƒN fs˜Ğûãô bz ÃÏe>îº¯p²¯øk éD\r4aNéÂY({ïD­ŒnÆ†ÏÕ¤>jÄ¨1€Ü	¨<çl-x³\rËGËO	Qw°•qw«c‚Pñb\r¤Ì¶ç­ê‹	Á½‘§âdñš6¢Ç€Ês‚à¢éæÁ Ğ¶±r½Äj>«¤J°âüÈ®±bâ3ê(F¦ÑzŞ¤Ğrª`Oñˆ¥ËX‘ÿ\rZ¶qü\r ì1\$ŸÏ¿gkìl­Ìr+°ñ†ækfì'ò5Ò8®4ë6Û\0Ê-´.i~4òE<\$²JÆlru2F;Bn<’%#lq%ˆû	b=âå#Lë(HJ1b%\rç¸¼ãz‹ô‹èG2£±^8wêñŒ‚^%¯” îş¾G­*g 7D\0^‘r²c„p’ÆL,€ó°ï* Xr§\$ Ê8ğ×,©*¨D‚ÓÀÔæ`Ğ\n„Á’Z¬“©s1lÏ1Ç\\{àÂ.I~`‡*3ÍÑì]1“FÍ‘1X	-£%#ËÀÁS3LÓl6\$Cr‰C/Âô\rÓ%,È|†“€ È†ÇŒ–Ü Êsu8«J˜©ä¬—9ò–æh¸ìNÅëÛÒë.ğüÉPôFtïÃ\$¾3\nğFB/ó=4÷-ìÌÍÔÍ9ì# O:Ió]#Å7Bº—,:ÉÍ< NâDñ@ÖRˆ®\n€Ò#ˆzÑ%8i:\0Úz“' Y‘*¯&Ôä¥/K¹Ö¦²«ÓU4 z€a>4‘\0 f*\0å*TK02Í<Í0SfòæÍ?Dôa4X-¶uÎj\$E6\0Næi´–ææ\nÿc9ñH’´²§HIb—ÈFÍÏÀ‹şs‚R~t»I”¾ 3úÒº‚Lè;%	0p.B®FBnMKÅÀR¢sDÆ'èa”èÅÔìÅÔóD\r1ÍOì\0œ²˜És´gL^Ì…àÌâO>lÚÀC<DôHº-4<àä™\"V]`¦/BŒğU&±Ó¹-#w;Ñ^›MĞürŠq±0œ-œo¨~pKÀ×‹	pšÎé\nqè,4ÁWÁ\$Fºnl\0ÙM‚Lš\n‰…-úm®\0¸)Z@ÏZ‰†˜ï•¢^@Î	 Â&ÕdÖäı]`¬ÆÖât\r¯„'\$^Rü'àO]©æSĞ¬Ø3î5â“˜F\"Q[uÉ[ÂH\$Ío`6Zuªğmo[•Í]ÍXÄTØ	™]µÒ•×\\c›b¶:–bæU\0ØW2Vb ëeˆ2/ºd%<YRt7ì'f§0‘uìruòhÇU@cTsÛVãÇgFÎ–{_-_P²E–‘T:{ÍVÖdüÉÂş-ˆIc¶ş°È¯ÍMëşÿiv¯ÿ J¡\0m3@JXµRMU_²ğºˆp²5)kçkl-\$,Æ“\r&›\rÜıO§(oÈûk+rê Õ\\àP7\"*^åP˜\rc <>³‚t#~Ræ\"»en‹ èƒsŠ„ã¶;·D	—ItÀËup t@À‚8d\0@ÔlTw×r —ww·~ b	¨ŒJ æóu®\n€ , u;jÖ·7s¦Ã{*„oÂ>q†<-\0 	à¦\n”œà‹|Â¹rcÆßv7µi7O{ECâ(èœ1Äp¶yÒ‡nØàğ¤²àZ‡à[r>8ÃX‚âç·á{¨¯~j…~¤î(à°¸(Y`È¯7_Â»z%vd™'‚%.‡\$w/.=Æpô&¶—¹…8V5R=ÃN„4†×(ˆøfuâç„øJlåjÜu`zXQ.–X!¾‹´‹—Økq—rpû˜~¦¸~T£ÀæiÂcÂfn¢x¸¾@S€Ë3*6Û¤b ÷ÜûØ¤İûrçppú¢n=)Æ­‹\0ğÈLú(L…ÆnË/§-88Çs\0zg½Ä\n‡ëL“KÉS!mÃ&–æŞç\"ÌÈ×b8}BXZy,Í¦d _X‹ğ€^\r1 zõªñ‘BuWŞ7Õ;s8ly^BªÂÀğ„fZ`Ş“ôä ø­‚FyYg–¬!–ñ	Plíš£O8ó„f<Ió,˜ ª\n@’‰ÀÛdp4j\0*¤\rl]œyÊ\rùÎ[=”İ?+À,'N¼˜}TYs\$w®fØÉ› Ô\räD(àM#\$İh¹_ey‘…Ê+²\"K4\0zYì DÆ]¢.Ê* xñÿ£Ï÷rLœĞ˜]\rj ^ç@éš)÷“¶\ròÀQrr'p0À¸à\\P¦,\"ª-sÉ’PÃŠøŸqôo‹w‹¸ñ¡ÅÅ¤'%ycÏÓvó,\rK«îÜP…U@èçˆÊAé2Ñå¢È¥q|ÒÒ	2\rœ\"ÃCi¯†?.¨šÉ@è‚<Ä€î0€ÜQôt‘ty=Dº[FÔpG\0RÙ³ü‚ÏÏ'Q@-6“2Á»*Á/@PÁÌÄd;7[ŠØ’!\"zÛS±-~o[„D!*–Æ®0N4	Š1ê—1ç8ñŸ{l\$DÖ	G¦|G\$v!ræ‚Ó-3Tm•Ä™‚\r°ïq0Ì½N˜·né™H”SF dùQRóå»Úc’ÂÍ‡Õ²S\rcC.nÀäiBx-l”v·@Üáá›!(“HçXÊc„g( ó#%ÁCnû(P‚G9Âì\"1Ü7ÀDGÛ²1ï€So8µÌSÄûqÜ.ˆ¤pôÏP h€e‚ª0Ö¬k+¸@ cÁRG§hÙ ¸LÈû†/âç`V.FA^\\lÜ¼öî5\0¸ `\0‚E|C®jImPtyÇAnGu'pÂd-åÄËÉ05püÓ&ÀIÄu%¢\nOÜ<|2\$úø@¨\rîFDRÎ^`1À±°f9Ğ`è/÷Ï ÊVÌü†;eø\0<<ğü€eÏdÏ²çÛ1Ò²‹Òè®¥kÏùêıD4V¤YÑƒÇÁÒì”åÂûw·¶ğ¡¬kpÖÇ;şrÃÆŠö^\niŒ™\0‘¬…¨c:˜¯)¼y¸\0zYvz9Ö]Üèâ«¡`WÃYÍëÖƒ…Í‹˜—‹Ø—Œpe«#ØÛ1ûñfãõİÚµŞ']Äµ€?]Ä‰-’Ööï=ôÏú˜æ8˜oT¨W=õàâ\rÔş\\Ñ­lÍÍy¶şİâœÕå¹àËÎÖŒq=!^„Ôâ…äfqêª€Z˜³”\0Vç]=ÏFæÉxšn`˜\rä?‚tğ XQÉ‘çştZnq<J\$cöàÜã<Â€íş’íàvñİkÀ¤•èeÖ®Ş\$¯^uë^ç)i¢íçŸ—ƒwÚnßª¿ªSÉ<˜>ÜæGŠ¥3À. é<•À7ŞİáÄœßmŞ¥Vşiw×î ó0ÿ/\n\r%1”\0yèKëñ¯EëÄ\ršúâ³šñŞ íü‰§¨Ş¸™eíNLêÇùæ:CÈ'?ê~óé6 €è\$}ıjf¬é•R\rõWD°÷.T\n¢èNÙTÿ}÷_÷E|í“—UÌ}ĞO'ÀØIŒ,Ê–7Í¿½€…:h±ØÚÌì„Ô\$ªZ0¸èDV”`t XnÒvójGÒsë9l°ÉËÒªB¸ã“€”rSF<;Øg%v(ªšÊ(Q¶×¥P(\nFlıè?j\0oİ€3±à{ÓdxìË¡‚üf—àbÄûW-Ş¸,QuÀ,+®Ëa.Y”Àñ‹l[¬õ%ÈWSxò²\\	¿D×G,„l”Ô]@LÄÂ\" ²|p…?l™Zaà8õÀ…0!Á/ôÂºoø\$vïÖáî`rß£îæG\0‚,Àë˜	Á0YPN€œ'0ˆÁUûWƒ0B˜ÄØ2Ag0gDÌMòB4Å&1Éšˆüá™w÷¤µ¶†Šô!™0¶„`-­7›F)+‚·(\0007(rË\$9­ LÅ€†¢‰üTãÁ…L€=\"°ÑKQ.N<X@¤}Í+ ˆ@‘È¦¡,…ˆ·…”áñf˜ø~½D/Å˜jhZÇŠ…ÀCp©Aš§2C‘ÀÃ f=`„*É|-ásÔK;,äê\rPxT\"}îöC5kÒ]OæµÓœ½Îùı!âmç_ÀF	P~ğ¡BRí½˜@\0l“_¾~µ«”„Á%bi}Î#\$ñkœ:aÙD‹³Ü!aR‰Ù´¢á#7¼Í‘ o˜[,™õ·İüG÷[¹Œ‘N“‘.®*P9‘Í¼wz c,ïg#·Ùè–qú>XHjZ†½sóí1êSx©E¢LÓˆ„<\"×Ø¥Zbˆ†­i†¦bÔDÆC•nN)(¢ÜXÉ5Â¼\n)14R”Mâs1ÕDÚMM\\ƒ¶ÂÆx³Ì;lõ‹ƒ@ŸL!@<lP«¥)¬`@Ù08;¨æbÀ‹0sCOÓDE”şêIDÌ[ªq¸ÃF!§nïcc‰\"“H¦Æ)ÂšePµb¦…±ö3ñK‹rI’‚5Z„Xr*É‚¸Å’-a:R‰ÌãC…»†±œ.Şg“¸¬ùã£¾…	‘DTQ‚ºH'×#€øËº=¸Í‰®");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôa8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wş\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹”ªÓ²Ş»\0\0;";break;}}exit;}function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
idf_unescape($v){$Yc=substr($v,-1);return
str_replace($Yc.$Yc,$Yc,substr($v,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
remove_slashes($ge,$ac=false){if(get_magic_quotes_gpc()){while(list($z,$X)=each($ge)){foreach($X
as$Qc=>$W){unset($ge[$z][$Qc]);if(is_array($W)){$ge[$z][stripslashes($Qc)]=$W;$ge[]=&$ge[$z][stripslashes($Qc)];}else$ge[$z][stripslashes($Qc)]=($ac?$W:stripslashes($W));}}}}function
bracket_escape($v,$Ea=false){static$sf=array(':'=>':1',']'=>':2','['=>':3');return
strtr($v,($Ea?array_flip($sf):$sf));}function
h($Q){return
htmlspecialchars(str_replace("\0","",$Q),ENT_QUOTES);}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($D,$Y,$Qa,$Wc="",$Fd="",$Ua=""){$K="<input type='checkbox' name='$D' value='".h($Y)."'".($Qa?" checked":"").($Fd?' onclick="'.h($Fd).'"':'').">";return($Wc!=""||$Ua?"<label".($Ua?" class='$Ua'":"").">$K".h($Wc)."</label>":$K);}function
optionlist($Kd,$Fe=null,$Kf=false){$K="";foreach($Kd
as$Qc=>$W){$Ld=array($Qc=>$W);if(is_array($W)){$K.='<optgroup label="'.h($Qc).'">';$Ld=$W;}foreach($Ld
as$z=>$X)$K.='<option'.($Kf||is_string($z)?' value="'.h($z).'"':'').(($Kf||is_string($z)?(string)$z:$X)===$Fe?' selected':'').'>'.h($X);if(is_array($W))$K.='</optgroup>';}return$K;}function
html_select($D,$Kd,$Y="",$Ed=true){if($Ed)return"<select name='".h($D)."'".(is_string($Ed)?' onchange="'.h($Ed).'"':"").">".optionlist($Kd,$Y)."</select>";$K="";foreach($Kd
as$z=>$X)$K.="<label><input type='radio' name='".h($D)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$K;}function
select_input($Aa,$Kd,$Y="",$Xd=""){return($Kd?"<select$Aa><option value=''>$Xd".optionlist($Kd,$Y,true)."</select>":"<input$Aa size='10' value='".h($Y)."' placeholder='$Xd'>");}function
confirm(){return" onclick=\"return confirm('".'Sind Sie sicher ?'."');\"";}function
print_fieldset($u,$ad,$Rf=false,$Fd=""){echo"<fieldset><legend><a href='#fieldset-$u' onclick=\"".h($Fd)."return !toggle('fieldset-$u');\">$ad</a></legend><div id='fieldset-$u'".($Rf?"":" class='hidden'").">\n";}function
bold($Ma,$Ua=""){return($Ma?" class='active $Ua'":($Ua?" class='$Ua'":""));}function
odd($K=' class="odd"'){static$t=0;if(!$K)$t=-1;return($t++%2?$K:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($z,$X=null){static$bc=true;if($bc)echo"{";if($z!=""){echo($bc?"":",")."\n\t\"".addcslashes($z,"\r\n\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'undefined');$bc=false;}else{echo"\n}\n";$bc=true;}}function
ini_bool($Hc){$X=ini_get($Hc);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$K;if($K===null)$K=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$K;}function
set_password($Nf,$O,$V,$H){$_SESSION["pwds"][$Nf][$O][$V]=($_COOKIE["adminer_key"]&&is_string($H)?array(encrypt_string($H,$_COOKIE["adminer_key"])):$H);}function
get_password(){$K=get_session("pwds");if(is_array($K))$K=($_COOKIE["adminer_key"]?decrypt_string($K[0],$_COOKIE["adminer_key"]):false);return$K;}function
q($Q){global$m;return$m->quote($Q);}function
get_vals($I,$e=0){global$g;$K=array();$J=$g->query($I);if(is_object($J)){while($L=$J->fetch_row())$K[]=$L[$e];}return$K;}function
get_key_vals($I,$h=null,$kf=0){global$g;if(!is_object($h))$h=$g;$K=array();$h->timeout=$kf;$J=$h->query($I);$h->timeout=0;if(is_object($J)){while($L=$J->fetch_row())$K[$L[0]]=$L[1];}return$K;}function
get_rows($I,$h=null,$n="<p class='error'>"){global$g;$db=(is_object($h)?$h:$g);$K=array();$J=$db->query($I);if(is_object($J)){while($L=$J->fetch_assoc())$K[]=$L;}elseif(!$J&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$K;}function
unique_array($L,$x){foreach($x
as$w){if(preg_match("~PRIMARY|UNIQUE~",$w["type"])){$K=array();foreach($w["columns"]as$z){if(!isset($L[$z]))continue
2;$K[$z]=$L[$z];}return$K;}}}function
where($Z,$p=array()){global$y;$K=array();$mc='(^[\w\(]+('.str_replace("_",".*",preg_quote(idf_escape("_"))).')?\)+$)';foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$e=(preg_match($mc,$z)?$z:idf_escape($z));$K[]=$e.(($y=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X))||$y=="mssql"?" LIKE ".q(addcslashes($X,"%_\\")):" = ".unconvert_field($p[$z],q($X)));if($y=="sql"&&preg_match('~char|text~',$p[$z]["type"])&&preg_match("~[^ -@]~",$X))$K[]="$e = ".q($X)." COLLATE utf8_bin";}foreach((array)$Z["null"]as$z)$K[]=(preg_match($mc,$z)?$z:idf_escape($z))." IS NULL";return
implode(" AND ",$K);}function
where_check($X,$p=array()){parse_str($X,$Pa);remove_slashes(array(&$Pa));return
where($Pa,$p);}function
where_link($t,$e,$Y,$Hd="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($e)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$Hd:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$N=array()){$K="";foreach($f
as$z=>$X){if($N&&!in_array(idf_escape($z),$N))continue;$xa=convert_field($p[$z]);if($xa)$K.=", $xa AS ".idf_escape($z);}return$K;}function
cookie($D,$Y,$dd=2592000){global$aa;$G=array($D,(preg_match("~\n~",$Y)?"":$Y),($dd?time()+$dd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;return
call_user_func_array('setcookie',$G);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Nf,$O,$V,$l=null){global$xb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($xb))."|username|".($l!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Nf!="server"||$O!=""?urlencode($Nf)."=".urlencode($O)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($ed,$pd=null){if($pd!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($ed!==null?$ed:$_SERVER["REQUEST_URI"]))][]=$pd;}if($ed!==null){if($ed=="")$ed=".";header("Location: $ed");exit;}}function
query_redirect($I,$ed,$pd,$pe=true,$Pb=true,$Ub=false,$jf=""){global$g,$n,$b;if($Pb){$Re=microtime(true);$Ub=!$g->query($I);$jf=format_time($Re);}$Pe="";if($I)$Pe=$b->messageQuery($I,$jf);if($Ub){$n=error().$Pe;return
false;}if($pe)redirect($ed,$pd.$Pe);return
true;}function
queries($I){global$g;static$je=array();static$Re;if(!$Re)$Re=microtime(true);if($I===null)return
array(implode("\n",$je),format_time($Re));$je[]=(preg_match('~;$~',$I)?"DELIMITER ;;\n$I;\nDELIMITER ":$I).";";return$g->query($I);}function
apply_queries($I,$T,$Mb='table'){foreach($T
as$R){if(!queries("$I ".$Mb($R)))return
false;}return
true;}function
queries_redirect($ed,$pd,$pe){list($je,$jf)=queries(null);return
query_redirect($je,$ed,$pd,$pe,false,!$pe,$jf);}function
format_time($Re){return
sprintf('%.3f s',max(0,microtime(true)-$Re));}function
remove_from_uri($Rd=""){return
substr(preg_replace("~(?<=[?&])($Rd".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($F,$kb){return" ".($F==$kb?$F+1:'<a href="'.h(remove_from_uri("page").($F?"&page=$F".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($F+1)."</a>");}function
get_file($z,$nb=false){$Xb=$_FILES[$z];if(!$Xb)return
null;foreach($Xb
as$z=>$X)$Xb[$z]=(array)$X;$K='';foreach($Xb["error"]as$z=>$n){if($n)return$n;$D=$Xb["name"][$z];$qf=$Xb["tmp_name"][$z];$fb=file_get_contents($nb&&preg_match('~\\.gz$~',$D)?"compress.zlib://$qf":$qf);if($nb){$Re=substr($fb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Re,$qe))$fb=iconv("utf-16","utf-8",$fb);elseif($Re=="\xEF\xBB\xBF")$fb=substr($fb,3);$K.=$fb."\n\n";}else$K.=$fb;}return$K;}function
upload_error($n){$md=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'Hochladen von Datei fehlgeschlagen.'.($md?" ".sprintf('Maximal erlaubte DateigrÃ¶sse ist %sB.',$md):""):'Datei existiert nicht.');}function
repeat_pattern($Vd,$bd){return
str_repeat("$Vd{0,65535}",$bd/65535)."$Vd{0,".($bd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$bd=80,$Xe=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$bd).")($)?)u",$Q,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$bd).")($)?)",$Q,$B);return
h($B[1]).$Xe.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",' '),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($ge,$Bc=array()){while(list($z,$X)=each($ge)){if(!in_array($z,$Bc)){if(is_array($X)){foreach($X
as$Qc=>$W)$ge[$z."[$Qc]"]=$W;}else
echo'<input type="hidden" name="'.h($z).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$Vb=false){$K=table_status($R,$Vb);return($K?$K:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$K=array();foreach($b->foreignKeys($R)as$q){foreach($q["source"]as$X)$K[$X][]=$q;}return$K;}function
enum_input($U,$Aa,$o,$Y,$Hb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$jd);$K=($Hb!==null?"<label><input type='$U'$Aa value='$Hb'".((is_array($Y)?in_array($Hb,$Y):$Y===0)?" checked":"")."><i>".'leer'."</i></label>":"");foreach($jd[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Qa=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$K.=" <label><input type='$U'$Aa value='".($t+1)."'".($Qa?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$K;}function
input($o,$Y,$r){global$g,$_f,$b,$y;$D=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$va=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$va[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$va);$r="json";}$ue=($y=="mssql"&&$o["auto_increment"]);if($ue&&!$_POST["save"])$r=null;$nc=(isset($_GET["select"])||$ue?array("orig"=>'Original'):array())+$b->editFunctions($o);$Aa=" name='fields[$D]'";if($o["type"]=="enum")echo
nbsp($nc[""])."<td>".$b->editInput($_GET["edit"],$o,$Aa,$Y);else{$bc=0;foreach($nc
as$z=>$X){if($z===""||!$X)break;$bc++;}$Ed=($bc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($o["field"])))."]']; if ($bc > f.selectedIndex) f.selectedIndex = $bc;\" onkeyup='keyupChange.call(this);'":"");$Aa.=$Ed;$sc=(in_array($r,$nc)||isset($nc[$r]));echo(count($nc)>1?"<select name='function[$D]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($nc,$r===null||$sc?$r:"")."</select>":nbsp(reset($nc))).'<td>';$Jc=$b->editInput($_GET["edit"],$o,$Aa,$Y);if($Jc!="")echo$Jc;elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$jd);foreach($jd[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Qa=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$D][$t]' value='".(1<<$t)."'".($Qa?' checked':'')."$Ed>".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'$Ed>";elseif(($gf=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($gf&&$y!="sqlite")$Aa.=" cols='50' rows='12'";else{$M=min(12,substr_count($Y,"\n")+1);$Aa.=" cols='30' rows='$M'".($M==1?" style='height: 1.2em;'":"");}echo"<textarea$Aa>".h($Y).'</textarea>';}elseif($r=="json")echo"<textarea$Aa cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$od=(!preg_match('~int~',$o["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($_f[$o["type"]]?$_f[$o["type"]]+($o["unsigned"]?0:1):0));if($y=='sql'&&$g->server_info>=5.6&&preg_match('~time~',$o["type"]))$od+=7;echo"<input".((!$sc||$r==="")&&preg_match('~(?<!o)int~',$o["type"])?" type='number'":"")." value='".h($Y)."'".($od?" maxlength='$od'":"").(preg_match('~char|binary~',$o["type"])&&$od>20?" size='40'":"")."$Aa>";}}}function
process_input($o){global$b;$v=bracket_escape($o["field"]);$r=$_POST["function"][$v];$Y=$_POST["fields"][$v];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($r=="NULL")$Y=null;if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Xb=get_file("fields-$v");if(!is_string($Xb))return
false;return
q($Xb);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$K=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$D=bracket_escape($z,1);$K[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$m->primary),);}return$K;}function
search_tables(){global$b,$g;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$ic=false;foreach(table_status('',true)as$R=>$S){$D=$b->tableName($S);if(isset($S["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$J=$g->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$J||$J->fetch_row()){if(!$ic){echo"<ul>\n";$ic=true;}echo"<li>".($J?"<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>\n":"$D: <span class='error'>".error()."</span>\n");}}}echo($ic?"</ul>":"<p class='message'>".'Keine Tabellen.')."\n";}function
dump_headers($_c,$ud=false){global$b;$K=$b->dumpHeaders($_c,$ud);$Pd=$_POST["output"];if($Pd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($_c).".$K".($Pd!="file"&&!preg_match('~[^0-9a-z]~',$Pd)?".$Pd":""));session_write_close();ob_flush();flush();return$K;}function
dump_csv($L){foreach($L
as$z=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$L[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$L)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$K=ini_get("upload_tmp_dir");if(!$K){if(function_exists('sys_get_temp_dir'))$K=sys_get_temp_dir();else{$Yb=@tempnam("","");if(!$Yb)return
false;$K=dirname($Yb);unlink($Yb);}}return$K;}function
password_file($ib){$Yb=get_temp_dir()."/adminer.key";$K=@file_get_contents($Yb);if($K||!$ib)return$K;$kc=@fopen($Yb,"w");if($kc){$K=rand_string();fwrite($kc,$K);fclose($kc);}return$K;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$o,$hf){global$b,$aa;if(is_array($X)){$K="";foreach($X
as$Qc=>$W)$K.="<tr>".($X!=array_values($X)?"<th>".h($Qc):"")."<td>".select_value($W,$A,$o,$hf);return"<table cellspacing='0'>$K</table>";}if(!$A)$A=$b->selectLink($X,$o);if($A===null){if(is_mail($X))$A="mailto:$X";if($he=is_url($X))$A=(($he=="http"&&$aa)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$X:"$he://www.adminer.org/redirect/?url=".urlencode($X));}$K=$b->editVal($X,$o);if($K!==null){if($K==="")$K="&nbsp;";elseif($hf!=""&&is_shortable($o)&&is_utf8($K))$K=shorten_utf8($K,max(0,+$hf));else$K=h($K);}return$b->selectVal($K,$A,$o,$X);}function
is_mail($Eb){$ya='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$wb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Vd="$ya+(\\.$ya+)*@($wb?\\.)+$wb";return
is_string($Eb)&&preg_match("(^$Vd(,\\s*$Vd)*\$)i",$Eb);}function
is_url($Q){$wb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($wb?\\.)+$wb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q,$B)?strtolower($B[1]):"");}function
is_shortable($o){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$o["type"]);}function
count_rows($R,$Z,$Oc,$s){global$y;$I=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Oc&&($y=="sql"||count($s)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$s).")$I":"SELECT COUNT(*)".($Oc?" FROM (SELECT 1$I$oc) x":$I));}function
slow_query($I){global$b,$rf;$l=$b->database();$kf=$b->queryTimeout();if(support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$Vc=$h->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$rf,'&kill=',$Vc,'\');
}, ',1000*$kf,');
</script>
';}else$h=null;ob_flush();flush();$K=@get_key_vals($I,$h,$kf);if($h){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($K);}function
get_token(){$me=rand(1,1e6);return($me^$_SESSION["token"]).":$me";}function
verify_token(){list($rf,$me)=explode(":",$_POST["token"]);return($me^$_SESSION["token"])==$rf;}function
lzw_decompress($Ja){$ub=256;$Ka=8;$Wa=array();$we=0;$xe=0;for($t=0;$t<strlen($Ja);$t++){$we=($we<<8)+ord($Ja[$t]);$xe+=8;if($xe>=$Ka){$xe-=$Ka;$Wa[]=$we>>$xe;$we&=(1<<$xe)-1;$ub++;if($ub>>$Ka)$Ka++;}}$tb=range("\0","\xFF");$K="";foreach($Wa
as$t=>$Va){$Db=$tb[$Va];if(!isset($Db))$Db=$Vf.$Vf[0];$K.=$Db;if($t)$tb[]=$Vf.$Db[0];$Vf=$Db;}return$K;}function
on_help($ab,$Me=0){return" onmouseover='helpMouseover(this, event, ".h($ab).", $Me);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$p,$L,$Hf){global$b,$y,$rf,$n;$bf=$b->tableName(table_status1($a,true));page_header(($Hf?'Ã„ndern':'HinzufÃ¼gen'),$n,array("select"=>array($a,$bf)),$bf);if($L===false)echo"<p class='error'>".'Keine Daten.'."\n";echo'<div id="message"></div>
<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($p
as$D=>$o){echo"<tr><th>".$b->fieldName($o);$ob=$_GET["set"][bracket_escape($D)];if($ob===null){$ob=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$ob,$qe))$ob=$qe[1];}$Y=($L!==null?($L[$D]!=""&&$y=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($L[$D])?array_sum($L[$D]):+$L[$D]):$L[$D]):(!$Hf&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$ob)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$D]:($Hf&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'Speichern'."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Hf?'Speichern und weiter bearbeiten'."' onclick='return !ajaxForm(this.form, \"".'Saving'.'...", this)':'Speichern und nÃ¤chsten hinzufÃ¼gen')."' title='Ctrl+Shift+Enter'>\n";}echo($Hf?"<input type='submit' name='delete' value='".'Entfernen'."'".confirm().">\n":($_POST||!$p?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$rf,'">
</form>
';}global$b,$g,$xb,$Bb,$Jb,$n,$nc,$pc,$aa,$Ic,$y,$ba,$Xc,$Dd,$Wd,$Ue,$tc,$rf,$uf,$_f,$Gf,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$G=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;call_user_func_array('session_set_cookie_params',$G);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$ac);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);function
get_lang(){return'de';}function
lang($tf,$_d=null){if(is_array($tf)){$Zd=($_d==1?0:1);$tf=$tf[$Zd];}$tf=str_replace("%d","%s",$tf);$_d=format_number($_d);return
sprintf($tf,$_d);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Zd=array_search("SQL",$b->operators);if($Zd!==false)unset($b->operators[$Zd]);}function
dsn($_b,$V,$H){try{parent::__construct($_b,$V,$H);}catch(Exception$Nb){auth_error($Nb->getMessage());}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($I,$Af=false){$J=parent::query($I);$this->error="";if(!$J){list(,$this->errno,$this->error)=$this->errorInfo();return
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
fetch_field(){$L=(object)$this->getColumnMeta($this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=(in_array("blob",(array)$L->flags)?63:0);return$L;}}}$xb=array();class
Min_SQL{var$_conn;function
Min_SQL($g){$this->_conn=$g;}function
quote($Y){return($Y===null?"NULL":$this->_conn->quote($Y));}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$ee=false){global$b,$y;$Oc=(count($s)<count($N));$I=$b->selectQueryBuild($N,$Z,$s,$E,$_,$F);if(!$I)$I="SELECT".limit(($_GET["page"]!="last"&&+$_&&$s&&$Oc&&$y=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$N)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($s&&$Oc?"\nGROUP BY ".implode(", ",$s):"").($E?"\nORDER BY ".implode(", ",$E):""),($_!=""?+$_:null),($F?$_*$F:0),"\n");$Re=microtime(true);$K=$this->_conn->query($I);if($ee)echo$b->selectQuery($I,format_time($Re));return$K;}function
delete($R,$ke,$_=0){$I="FROM ".table($R);return
queries("DELETE".($_?limit1($I,$ke):" $I$ke"));}function
update($R,$P,$ke,$_=0,$He="\n"){$Mf=array();foreach($P
as$z=>$X)$Mf[]="$z = $X";$I=table($R)." SET$He".implode(",$He",$Mf);return
queries("UPDATE".($_?limit1($I,$ke):" $I$ke"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$M,$ce){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$xb["sqlite"]="SQLite 3";$xb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$ae=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
Min_SQLite($Yb){$this->_link=new
SQLite3($Yb);$Of=$this->_link->version();$this->server_info=$Of["versionString"];}function
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
Min_SQLite($Yb){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Yb);}function
query($I,$Af=false){$sd=($Af?"unbufferedQuery":"query");$J=@$this->_link->$sd($I,SQLITE_BOTH,$n);$this->error="";if(!$J){$this->error=$n;return
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
as$z=>$X)$K[($z[0]=='"'?idf_unescape($z):$z)]=$X;return$K;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$D=$this->_result->fieldName($this->_offset++);$Vd='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Vd\\.)?$Vd\$~",$D,$B)){$R=($B[3]!=""?$B[3]:idf_unescape($B[2]));$D=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$D,"orgname"=>$D,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($Yb){$this->dsn(DRIVER.":$Yb","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($Yb){if(is_readable($Yb)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Yb)?$Yb:dirname($_SERVER["SCRIPT_FILENAME"])."/$Yb")." AS a")){$this->Min_SQLite($Yb);return
true;}return
false;}function
multi_query($I){return$this->_result=$this->query($I);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$ce){$Mf=array();foreach($M
as$P)$Mf[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($M))).") VALUES\n".implode(",\n",$Mf));}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($I,$Z,$_,$Bd=0,$He=" "){return" $I$Z".($_!==null?$He."LIMIT $_".($Bd?" OFFSET $Bd":""):"");}function
limit1($I,$Z){global$g;return($g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($I,$Z,1):" $I$Z");}function
db_collation($l,$Ya){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($k){return
array();}function
table_status($D=""){global$g;$K=array();foreach(get_rows("SELECT name AS Name, type AS Engine FROM sqlite_master WHERE type IN ('table', 'view') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$L){$L["Oid"]=1;$L["Auto_increment"]="";$L["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($L["Name"]));$K[$L["Name"]]=$L;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$L)$K[$L["name"]]["Auto_increment"]=$L["seq"];return($D!=""?$K[$D]:$K);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$g;$K=array();$ce="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$L){$D=$L["name"];$U=strtolower($L["type"]);$ob=$L["dflt_value"];$K[$D]=array("field"=>$D,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$ob,$B)?str_replace("''","'",$B[1]):($ob=="NULL"?null:$ob)),"null"=>!$L["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$L["pk"],);if($L["pk"]){if($ce!="")$K[$ce]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$K[$D]["auto_increment"]=true;$ce=$D;}}$Pe=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Pe,$jd,PREG_SET_ORDER);foreach($jd
as$B){$D=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($K[$D])$K[$D]["collation"]=trim($B[3],"'");}return$K;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$K=array();$Pe=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$Pe,$B)){$K[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$jd,PREG_SET_ORDER);foreach($jd
as$B){$K[""]["columns"][]=idf_unescape($B[2]).$B[4];$K[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$K){foreach(fields($R)as$D=>$o){if($o["primary"])$K[""]=array("type"=>"PRIMARY","columns"=>array($D),"lengths"=>array(),"descs"=>array(null));}}$Qe=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$h);foreach(get_rows("PRAGMA index_list(".table($R).")",$h)as$L){$D=$L["name"];$w=array("type"=>($L["unique"]?"UNIQUE":"INDEX"));$w["lengths"]=array();$w["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($D).")",$h)as$ze){$w["columns"][]=$ze["name"];$w["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($D).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Qe[$D],$qe)){preg_match_all('/("[^"]*+")+( DESC)?/',$qe[2],$jd);foreach($jd[2]as$z=>$X){if($X)$w["descs"][$z]='1';}}if(!$K[""]||$w["type"]!="UNIQUE"||$w["columns"]!=$K[""]["columns"]||$w["descs"]!=$K[""]["descs"]||!preg_match("~^sqlite_~",$D))$K[$D]=$w;}return$K;}function
foreign_keys($R){$K=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$L){$q=&$K[$L["id"]];if(!$q)$q=$L;$q["source"][]=$L["from"];$q["target"][]=$L["to"];}return$K;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($D))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($D){global$g;$Tb="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Tb)\$~",$D)){$g->error=sprintf('Bitte einen der Dateitypen %s benutzen.',str_replace("|",", ",$Tb));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='Datei existiert schon.';return
false;}if(!check_sqlite_name($l))return
false;try{$A=new
Min_SQLite($l);}catch(Exception$Nb){$g->error=$Nb->getMessage();return
false;}$A->query('PRAGMA encoding = "UTF-8"');$A->query('CREATE TABLE adminer (i)');$A->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->Min_SQLite(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='Datei existiert schon.';return
false;}}return
true;}function
rename_database($D,$d){global$g;if(!check_sqlite_name($D))return
false;$g->Min_SQLite(":memory:");$g->error='Datei existiert schon.';return@rename(DB,$D);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$D,$p,$dc,$bb,$Ib,$d,$Ca,$Td){$Jf=($R==""||$dc);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Jf=true;break;}}$c=array();$Od=array();foreach($p
as$o){if($o[1]){$c[]=($Jf?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Od[$o[0]]=$o[1][0];}}if(!$Jf){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$D&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)))return
false;}elseif(!recreate_table($R,$D,$c,$Od,$dc))return
false;if($Ca)queries("UPDATE sqlite_sequence SET seq = $Ca WHERE name = ".q($D));return
true;}function
recreate_table($R,$D,$p,$Od,$dc,$x=array()){if($R!=""){if(!$p){foreach(fields($R)as$z=>$o){$p[]=process_field($o,$o);$Od[$z]=idf_escape($z);}}$de=false;foreach($p
as$o){if($o[6])$de=true;}$zb=array();foreach($x
as$z=>$X){if($X[2]=="DROP"){$zb[$X[1]]=true;unset($x[$z]);}}foreach(indexes($R)as$Tc=>$w){$f=array();foreach($w["columns"]as$z=>$e){if(!$Od[$e])continue
2;$f[]=$Od[$e].($w["descs"][$z]?" DESC":"");}if(!$zb[$Tc]){if($w["type"]!="PRIMARY"||!$de)$x[]=array($w["type"],$Tc,$f);}}foreach($x
as$z=>$X){if($X[0]=="PRIMARY"){unset($x[$z]);$dc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$Tc=>$q){foreach($q["source"]as$z=>$e){if(!$Od[$e])continue
2;$q["source"][$z]=idf_unescape($Od[$e]);}if(!isset($dc[" $Tc"]))$dc[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$z=>$o)$p[$z]="  ".implode($o);$p=array_merge($p,array_filter($dc));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$D":$D)." (\n".implode(",\n",$p)."\n)"))return
false;if($R!=""){if($Od&&!queries("INSERT INTO ".table("adminer_$D")." (".implode(", ",$Od).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Od)))." FROM ".table($R)))return
false;$yf=array();foreach(triggers($R)as$wf=>$lf){$vf=trigger($wf);$yf[]="CREATE TRIGGER ".idf_escape($wf)." ".implode(" ",$lf)." ON ".table($D)."\n$vf[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$D")." RENAME TO ".table($D));if(!alter_indexes($D,$x))return
false;foreach($yf
as$vf){if(!queries($vf))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$D,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($D!=""?$D:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$ce){if($ce[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Qf){return
apply_queries("DROP VIEW",$Qf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Qf,$ef){return
false;}function
trigger($D){global$g;if($D=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$v='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$xf=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$v\\s*(".implode("|",$xf["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($v))?\\s+ON\\s*$v\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($D)),$B);$Ad=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($Ad?" OF":""),"Of"=>($Ad[0]=='`'||$Ad[0]=='"'?idf_unescape($Ad):$Ad),"Trigger"=>$D,"Statement"=>$B[4],);}function
triggers($R){$K=array();$xf=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$L){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$xf["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$L["sql"],$B);$K[$L["name"]]=array($B[1],$B[2]);}return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$U){}function
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
set_schema($Be){return
true;}function
create_sql($R,$Ca){global$g;$K=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$D=>$w){if($D=='')continue;$K.=";\n\n".index_sql($R,$w['type'],$D,"(".implode(", ",array_map('idf_escape',$w['columns'])).")");}return$K;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($j){}function
trigger_sql($R,$Ve){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$g;$K=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$z)$K[$z]=$g->result("PRAGMA $z");return$K;}function
show_status(){$K=array();foreach(get_vals("PRAGMA compile_options")as$Jd){list($z,$X)=explode("=",$Jd,2);$K[$z]=$X;}return$K;}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
support($Wb){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Wb);}$y="sqlite";$_f=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Ue=array_keys($_f);$Gf=array();$Id=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$nc=array("hex","length","lower","round","unixepoch","upper");$pc=array("avg","count","count distinct","group_concat","max","min","sum");$Bb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$xb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$ae=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($Lb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$H){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($H,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Of=pg_version($this->_link);$this->server_info=$Of["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$K=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($K)$this->_link=$K;return$K;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($I,$Af=false){$J=@pg_query($this->_link,$I);$this->error="";if(!$J){$this->error=pg_last_error($this->_link);return
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
connect($O,$V,$H){global$b;$l=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$H);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$ce){global$g;foreach($M
as$P){$Hf=array();$Z=array();foreach($P
as$z=>$X){$Hf[]="$z = $X";if(isset($ce[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Hf)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){if($g->server_info>=9)$g->query("SET application_name = 'Adminer'");return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($I,$Z,$_,$Bd=0,$He=" "){return" $I$Z".($_!==null?$He."LIMIT $_".($Bd?" OFFSET $Bd":""):"");}function
limit1($I,$Z){return" $I$Z";}function
db_collation($l,$Ya){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){return
get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");}function
count_tables($k){return
array();}function
table_status($D=""){$K=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
".($D!=""?"AND relname = ".q($D):"ORDER BY relname"))as$L)$K[$L["Name"]]=$L;return($D!=""?$K[$D]:$K);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$K=array();$ua=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$L){preg_match('~([^([]+)(\((.*)\))?((\[[0-9]*])*)$~',$L["full_type"],$B);list(,$U,$bd,$L["length"],$wa)=$B;$L["length"].=$wa;$L["type"]=($ua[$U]?$ua[$U]:$U);$L["full_type"]=$L["type"].$bd.$wa;$L["null"]=!$L["attnotnull"];$L["auto_increment"]=preg_match('~^nextval\\(~i',$L["default"]);$L["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$L["default"],$B))$L["default"]=($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2];$K[$L["field"]]=$L;}return$K;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$K=array();$cf=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $cf AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $cf AND ci.oid = i.indexrelid",$h)as$L){$re=$L["relname"];$K[$re]["type"]=($L["indisprimary"]?"PRIMARY":($L["indisunique"]?"UNIQUE":"INDEX"));$K[$re]["columns"]=array();foreach(explode(" ",$L["indkey"])as$Ec)$K[$re]["columns"][]=$f[$Ec];$K[$re]["descs"]=array();foreach(explode(" ",$L["indoption"])as$Fc)$K[$re]["descs"][]=($Fc&1?'1':null);$K[$re]["lengths"]=array();}return$K;}function
foreign_keys($R){global$Dd;$K=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$L){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$L['definition'],$B)){$L['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$id)){$L['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$id[2]));$L['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$id[4]));}$L['target']=array_map('trim',explode(',',$B[3]));$L['on_delete']=(preg_match("~ON DELETE ($Dd)~",$B[4],$id)?$id[1]:'NO ACTION');$L['on_update']=(preg_match("~ON UPDATE ($Dd)~",$B[4],$id)?$id[1]:'NO ACTION');$K[$L['conname']]=$L;}}return$K;}function
view($D){global$g;return
array("select"=>$g->result("SELECT pg_get_viewdef(".q($D).")"));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$K=h($g->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$K,$B))$K=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($K);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($D,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($D));}function
auto_increment(){return"";}function
alter_table($R,$D,$p,$dc,$bb,$Ib,$d,$Ca,$Td){$c=array();$je=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Lf=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$je[]="ALTER TABLE ".table($R)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Lf!="")$je[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Lf!=""?substr($Lf,9):"''");}}$c=array_merge($c,$dc);if($R=="")array_unshift($je,"CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($je,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$D)$je[]="ALTER TABLE ".table($R)." RENAME TO ".table($D);if($R!=""||$bb!="")$je[]="COMMENT ON TABLE ".table($D)." IS ".q($bb);if($Ca!=""){}foreach($je
as$I){if(!queries($I))return
false;}return
true;}function
alter_indexes($R,$c){$ib=array();$yb=array();$je=array();foreach($c
as$X){if($X[0]!="INDEX")$ib[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$yb[]=idf_escape($X[1]);else$je[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($ib)array_unshift($je,"ALTER TABLE ".table($R).implode(",",$ib));if($yb)array_unshift($je,"DROP INDEX ".implode(", ",$yb));foreach($je
as$I){if(!queries($I))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Qf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Qf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Qf,$ef){foreach($T
as$R){if(!queries("ALTER TABLE ".table($R)." SET SCHEMA ".idf_escape($ef)))return
false;}foreach($Qf
as$R){if(!queries("ALTER VIEW ".table($R)." SET SCHEMA ".idf_escape($ef)))return
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
explain($g,$I){return$g->query("EXPLAIN $I");}function
found_rows($S,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$qe))return$qe[1];return
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
set_schema($Ae){global$g,$_f,$Ue;$K=$g->query("SET search_path TO ".idf_escape($Ae));foreach(types()as$U){if(!isset($_f[$U])){$_f[$U]=0;$Ue['Benutzer-definierte Typen'][]=$U;}}return$K;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$g;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($g->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
support($Wb){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$Wb);}$y="pgsql";$_f=array();$Ue=array();foreach(array('Zahlen'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Datum oder Zeit'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Zeichenketten'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'BinÃ¤r'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Netzwerk'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometrie'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$z=>$X){$_f+=$X;$Ue[$z]=array_keys($X);}$Gf=array();$Id=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$nc=array("char_length","lower","round","to_hex","to_timestamp","upper");$pc=array("avg","count","count distinct","max","min","sum");$Bb=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$xb["oracle"]="Oracle";if(isset($_GET["oracle"])){$ae=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Lb,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($O,$V,$H){$this->_link=@oci_new_connect($V,$H,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
true;}function
query($I,$Af=false){$J=oci_parse($this->_link,$I);$this->error="";if(!$J){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
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
as$z=>$X){if(is_a($X,'OCI-Lob'))$L[$z]=$X->load();}return$L;}function
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
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($I,$Z,$_,$Bd=0,$He=" "){return($Bd?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $I$Z) t WHERE rownum <= ".($_+$Bd).") WHERE rnum > $Bd":($_!==null?" * FROM (SELECT $I$Z) WHERE rownum <= ".($_+$Bd):" $I$Z"));}function
limit1($I,$Z){return" $I$Z";}function
db_collation($l,$Ya){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($D=""){$K=array();$Ce=q($D);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($D!=""?" AND table_name = $Ce":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($D!=""?" WHERE view_name = $Ce":"")."
ORDER BY 1")as$L){if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$L){$U=$L["DATA_TYPE"];$bd="$L[DATA_PRECISION],$L[DATA_SCALE]";if($bd==",")$bd=$L["DATA_LENGTH"];$K[$L["COLUMN_NAME"]]=array("field"=>$L["COLUMN_NAME"],"full_type"=>$U.($bd?"($bd)":""),"type"=>strtolower($U),"length"=>$bd,"default"=>$L["DATA_DEFAULT"],"null"=>($L["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
indexes($R,$h=null){$K=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$L){$Cc=$L["INDEX_NAME"];$K[$Cc]["type"]=($L["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($L["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$K[$Cc]["columns"][]=$L["COLUMN_NAME"];$K[$Cc]["lengths"][]=($L["CHAR_LENGTH"]&&$L["CHAR_LENGTH"]!=$L["COLUMN_LENGTH"]?$L["CHAR_LENGTH"]:null);$K[$Cc]["descs"][]=($L["DESCEND"]?'1':null);}return$K;}function
view($D){$M=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($D));return
reset($M);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$I){$g->query("EXPLAIN PLAN FOR $I");return$g->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$D,$p,$dc,$bb,$Ib,$d,$Ca,$Td){$c=$yb=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($R!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$yb[]=idf_escape($o[0]);}if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$yb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$yb).")"))&&($R==$D||queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)));}function
foreign_keys($R){return
array();}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Qf){return
apply_queries("DROP VIEW",$Qf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Be){global$g;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Be));}function
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
support($Wb){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Wb);}$y="oracle";$_f=array();$Ue=array();foreach(array('Zahlen'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Datum oder Zeit'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Zeichenketten'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'BinÃ¤r'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$z=>$X){$_f+=$X;$Ue[$z]=array_keys($X);}$Gf=array();$Id=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$nc=array("length","lower","round","upper");$pc=array("avg","count","count distinct","max","min","sum");$Bb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$xb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$ae=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$H){$this->_link=@sqlsrv_connect($O,array("UID"=>$V,"PWD"=>$H,"CharacterSet"=>"UTF-8"));if($this->_link){$Gc=sqlsrv_server_info($this->_link);$this->server_info=$Gc['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($I,$Af=false){$J=sqlsrv_query($this->_link,$I);$this->error="";if(!$J){$this->_get_error();return
false;}return$this->store_result($J);}function
multi_query($I){$this->_result=sqlsrv_query($this->_link,$I);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($J=null){if(!$J)$J=$this->_result;if(sqlsrv_field_metadata($J))return
new
Min_Result($J);$this->affected_rows=sqlsrv_rows_affected($J);return
true;}function
next_result(){return
sqlsrv_next_result($this->_result);}function
result($I,$o=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->fetch_row();return$L[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;}function
_convert($L){foreach((array)$L
as$z=>$X){if(is_a($X,'DateTime'))$L[$z]=$X->format("Y-m-d H:i:s");}return$L;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$K=new
stdClass;$K->name=$o["Name"];$K->orgname=$o["Name"];$K->type=($o["Type"]==1?254:0);return$K;}function
seek($Bd){for($t=0;$t<$Bd;$t++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$H){$this->_link=@mssql_connect($O,$V,$H);if($this->_link){$J=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$L=$J->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$L[0]] $L[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($I,$Af=false){$J=mssql_query($I,$this->_link);$this->error="";if(!$J){$this->error=mssql_get_last_message();return
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
seek($Bd){mssql_data_seek($this->_result,$Bd);}function
__destruct(){mssql_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$ce){foreach($M
as$P){$Hf=array();$Z=array();foreach($P
as$z=>$X){$Hf[]="$z = $X";if(isset($ce[idf_unescape($z)]))$Z[]="$z = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Hf)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($v){return"[".str_replace("]","]]",$v)."]";}function
table($v){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($I,$Z,$_,$Bd=0,$He=" "){return($_!==null?" TOP (".($_+$Bd).")":"")." $I$Z";}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($l,$Ya){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$K=array();foreach($k
as$l){$g->select_db($l);$K[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$K;}function
table_status($D=""){$K=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($D!=""?"AND name = ".q($D):"ORDER BY name"))as$L){if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT c.*, t.name type, d.definition [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$L){$U=$L["type"];$bd=(preg_match("~char|binary~",$U)?$L["max_length"]:($U=="decimal"?"$L[precision],$L[scale]":""));$K[$L["name"]]=array("field"=>$L["name"],"full_type"=>$U.($bd?"($bd)":""),"type"=>$U,"length"=>$bd,"default"=>$L["default"],"null"=>$L["is_nullable"],"auto_increment"=>$L["is_identity"],"collation"=>$L["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$L["is_identity"],);}return$K;}function
indexes($R,$h=null){$K=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$h)as$L){$D=$L["name"];$K[$D]["type"]=($L["is_primary_key"]?"PRIMARY":($L["is_unique"]?"UNIQUE":"INDEX"));$K[$D]["lengths"]=array();$K[$D]["columns"][$L["key_ordinal"]]=$L["column_name"];$K[$D]["descs"][$L["key_ordinal"]]=($L["is_descending_key"]?'1':null);}return$K;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($D))));}function
collations(){$K=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$K[preg_replace('~_.*~','',$d)][]=$d;return$K;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($D,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($D));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".(+$_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$D,$p,$dc,$bb,$Ib,$d,$Ca,$Td){$c=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($dc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($D)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$D)queries("EXEC sp_rename ".q(table($R)).", ".q($D));if($dc)$c[""]=$dc;foreach($c
as$z=>$X){if(!queries("ALTER TABLE ".idf_escape($D)." $z".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$w=array();$yb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$yb[]=idf_escape($X[1]);else$w[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$w||queries("DROP INDEX ".implode(", ",$w)))&&(!$yb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$yb)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$I){$g->query("SET SHOWPLAN_ALL ON");$K=$g->query($I);$g->query("SET SHOWPLAN_ALL OFF");return$K;}function
found_rows($S,$Z){}function
foreign_keys($R){$K=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$L){$q=&$K[$L["FK_NAME"]];$q["table"]=$L["PKTABLE_NAME"];$q["source"][]=$L["FKCOLUMN_NAME"];$q["target"][]=$L["PKCOLUMN_NAME"];}return$K;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Qf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Qf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Qf,$ef){return
apply_queries("ALTER SCHEMA ".idf_escape($ef)." TRANSFER",array_merge($T,$Qf));}function
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
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Ae){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
support($Wb){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Wb);}$y="mssql";$_f=array();$Ue=array();foreach(array('Zahlen'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Datum oder Zeit'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Zeichenketten'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'BinÃ¤r'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$z=>$X){$_f+=$X;$Ue[$z]=array_keys($X);}$Gf=array();$Id=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$nc=array("len","lower","round","upper");$pc=array("avg","count","count distinct","max","min","sum");$Bb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$xb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$ae=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($I,$Af=false){$G=array('SelectExpression'=>$I,'ConsistentRead'=>'true');if($this->next)$G['NextToken']=$this->next;$J=sdb_request_all('Select','Item',$G,$this->timeout);if($J===false)return$J;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$I)){$Ye=0;foreach($J
as$Pc)$Ye+=$Pc->Attribute->Value;$J=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Ye,))));}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
Min_Result($J){foreach($J
as$Pc){$L=array();if($Pc->Name!='')$L['itemName()']=(string)$Pc->Name;foreach($Pc->Attribute
as$_a){$D=$this->_processValue($_a->Name);$Y=$this->_processValue($_a->Value);if(isset($L[$D])){$L[$D]=(array)$L[$D];$L[$D][]=$Y;}else$L[$D]=$Y;}$this->_rows[]=$L;foreach($L
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Db){return(is_object($Db)&&$Db['encoding']=='base64'?base64_decode($Db):(string)$Db);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$z=>$X)$K[$z]=$L[$z];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Uc=array_keys($this->_rows[0]);return(object)array('name'=>$Uc[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$ce="itemName()";function
_chunkRequest($Ac,$pa,$G,$Qb=array()){global$g;foreach(array_chunk($Ac,25)as$Sa){$Sd=$G;foreach($Sa
as$t=>$u){$Sd["Item.$t.ItemName"]=$u;foreach($Qb
as$z=>$X)$Sd["Item.$t.$z"]=$X;}if(!sdb_request($pa,$Sd))return
false;}$g->affected_rows=count($Ac);return
true;}function
_extractIds($R,$ke,$_){$K=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$ke,$jd))$K=array_map('idf_unescape',$jd[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$ke.($_?" LIMIT 1":"")))as$Pc)$K[]=$Pc->Name;}return$K;}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$ee=false){global$g;$g->next=$_GET["next"];$K=parent::select($R,$N,$Z,$s,$E,$_,$F,$ee);$g->next=0;return$K;}function
delete($R,$ke,$_=0){return$this->_chunkRequest($this->_extractIds($R,$ke,$_),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$ke,$_=0,$He="\n"){$pb=array();$Kc=array();$t=0;$Ac=$this->_extractIds($R,$ke,$_);$u=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$z=>$X){$z=idf_unescape($z);if($X=="NULL"||($u!=""&&array($u)!=$Ac))$pb["Attribute.".count($pb).".Name"]=$z;if($X!="NULL"){foreach((array)$X
as$Qc=>$W){$Kc["Attribute.$t.Name"]=$z;$Kc["Attribute.$t.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Qc)$Kc["Attribute.$t.Replace"]="true";$t++;}}}$G=array('DomainName'=>$R);return(!$Kc||$this->_chunkRequest(($u!=""?array($u):$Ac),'BatchPutAttributes',$G,$Kc))&&(!$pb||$this->_chunkRequest($Ac,'BatchDeleteAttributes',$G,$pb));}function
insert($R,$P){$G=array("DomainName"=>$R);$t=0;foreach($P
as$D=>$Y){if($Y!="NULL"){$D=idf_unescape($D);if($D=="itemName()")$G["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$G["Attribute.$t.Name"]=$D;$G["Attribute.$t.Value"]=(is_array($Y)?$X:idf_unescape($Y));$t++;}}}}return
sdb_request('PutAttributes',$G);}function
insertUpdate($R,$M,$ce){foreach($M
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
support($Wb){return
preg_match('~sql~',$Wb);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$Ya){}function
tables_list(){global$g;$K=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$K[(string)$R]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$K;}function
table_status($D="",$Vb=false){$K=array();foreach(($D!=""?array($D=>true):tables_list())as$R=>$U){$L=array("Name"=>$R,"Auto_increment"=>"");if(!$Vb){$rd=sdb_request('DomainMetadata',array('DomainName'=>$R));if($rd){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$z=>$X)$L[$z]=(string)$rd->$X;}}if($D!="")return$L;$K[$R]=$L;}return$K;}function
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
table($v){return
idf_escape($v);}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
limit($I,$Z,$_,$Bd=0,$He=" "){return" $I$Z".($_!==null?$He."LIMIT $_":"");}function
unconvert_field($o,$K){return$K;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$D,$p,$dc,$bb,$Ib,$d,$Ca,$Td){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$D)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($ta,$lb,$z,$oe=false){$La=64;if(strlen($z)>$La)$z=pack("H*",$ta($z));$z=str_pad($z,$La,"\0");$Rc=$z^str_repeat("\x36",$La);$Sc=$z^str_repeat("\x5C",$La);$K=$ta($Sc.pack("H*",$ta($Rc.$lb)));if($oe)$K=pack("H*",$K);return$K;}function
sdb_request($pa,$G=array()){global$b,$g;list($yc,$G['AWSAccessKeyId'],$De)=$b->credentials();$G['Action']=$pa;$G['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$G['Version']='2009-04-15';$G['SignatureVersion']=2;$G['SignatureMethod']='HmacSHA1';ksort($G);$I='';foreach($G
as$z=>$X)$I.='&'.rawurlencode($z).'='.rawurlencode($X);$I=str_replace('%7E','~',substr($I,1));$I.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$yc)."\n/\n$I",$De,true)));@ini_set('track_errors',1);$Xb=@file_get_contents((preg_match('~^https?://~',$yc)?$yc:"http://$yc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$I,'ignore_errors'=>1,))));if(!$Xb){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$Wf=simplexml_load_string($Xb);if(!$Wf){$n=libxml_get_last_error();$g->error=$n->message;return
false;}if($Wf->Errors){$n=$Wf->Errors->Error;$g->error="$n->Message ($n->Code)";return
false;}$g->error='';$df=$pa."Result";return($Wf->$df?$Wf->$df:true);}function
sdb_request_all($pa,$df,$G=array(),$kf=0){$K=array();$Re=($kf?microtime(true):0);$_=(preg_match('~LIMIT\s+(\d+)\s*$~i',$G['SelectExpression'],$B)?$B[1]:0);do{$Wf=sdb_request($pa,$G);if(!$Wf)break;foreach($Wf->$df
as$Db)$K[]=$Db;if($_&&count($K)>=$_){$_GET["next"]=$Wf->NextToken;break;}if($kf&&microtime(true)-$Re>$kf)return
false;$G['NextToken']=$Wf->NextToken;if($_)$G['SelectExpression']=preg_replace('~\d+\s*$~',$_-count($K),$G['SelectExpression']);}while($Wf->NextToken);return$K;}$y="simpledb";$Id=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$nc=array();$pc=array("count");$Bb=array(array("json"));}$xb["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$ae=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($O,$V,$H){global$b;$l=$b->database();$Kd=array();if($V!=""){$Kd["username"]=$V;$Kd["password"]=$H;}if($l!="")$Kd["db"]=$l;try{$this->_link=@new
MongoClient("mongodb://$O",$Kd);return
true;}catch(Exception$Nb){$this->error=$Nb->getMessage();return
false;}}function
query($I){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$Nb){$this->error=$Nb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
Min_Result($J){foreach($J
as$Pc){$L=array();foreach($Pc
as$z=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$z]=63;$L[$z]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$L;foreach($L
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$z=>$X)$K[$z]=$L[$z];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Uc=array_keys($this->_rows[0]);$D=$Uc[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}}class
Min_Driver
extends
Min_SQL{public$ce="_id";function
quote($Y){return($Y===null?$Y:parent::quote($Y));}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$ee=false){$N=($N==array("*")?array():array_fill_keys($N,true));$Ne=array();foreach($E
as$X){$X=preg_replace('~ DESC$~','',$X,1,$hb);$Ne[$X]=($hb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$N)->sort($Ne)->limit(+$_)->skip($F*$_));}function
insert($R,$P){try{$K=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$K['code'];$this->_conn->error=$K['err'];$this->_conn->last_id=$P['_id'];return!$K['err'];}catch(Exception$Nb){$this->_conn->error=$Nb->getMessage();return
false;}}}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
error(){global$g;return
h($g->error);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases($cc){global$g;$K=array();$mb=$g->_link->listDBs();foreach($mb['databases']as$l)$K[]=$l['name'];return$K;}function
collations(){return
array();}function
db_collation($l,$Ya){}function
count_tables($k){global$g;$K=array();foreach($k
as$l)$K[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$K;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
table_status($D="",$Vb=false){$K=array();foreach(tables_list()as$R=>$U){$K[$R]=array("Name"=>$R);if($D==$R)return$K[$R];}return$K;}function
information_schema(){}function
is_view($S){}function
drop_databases($k){global$g;foreach($k
as$l){$ve=$g->_link->selectDB($l)->drop();if(!$ve['ok'])return
false;}return
true;}function
indexes($R,$h=null){global$g;$K=array();foreach($g->_db->selectCollection($R)->getIndexInfo()as$w){$sb=array();foreach($w["key"]as$e=>$U)$sb[]=($U==-1?'1':null);$K[$w["name"]]=array("type"=>($w["name"]=="_id_"?"PRIMARY":($w["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($w["key"]),"lengths"=>array(),"descs"=>$sb,);}return$K;}function
fields($R){return
fields_from_edit();}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
found_rows($S,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}function
alter_table($R,$D,$p,$dc,$bb,$Ib,$d,$Ca,$Td){global$g;if($R==""){$g->_db->createCollection($D);return
true;}}function
drop_tables($T){global$g;foreach($T
as$R){$ve=$g->_db->selectCollection($R)->drop();if(!$ve['ok'])return
false;}return
true;}function
truncate_tables($T){global$g;foreach($T
as$R){$ve=$g->_db->selectCollection($R)->remove();if(!$ve['ok'])return
false;}return
true;}function
alter_indexes($R,$c){global$g;foreach($c
as$X){list($U,$D,$P)=$X;if($P=="DROP")$K=$g->_db->command(array("deleteIndexes"=>$R,"index"=>$D));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$hb);$f[$e]=($hb?-1:1);}$K=$g->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$D,));}if($K['errmsg']){$g->error=$K['errmsg'];return
false;}}return
true;}function
last_id(){global$g;return$g->last_id;}function
table($v){return$v;}function
idf_escape($v){return$v;}function
support($Wb){return
preg_match("~database|indexes~",$Wb);}$y="mongo";$Id=array("=");$nc=array();$pc=array();$Bb=array(array("json"));}$xb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$ae=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Ud,$fb=array(),$sd='GET'){@ini_set('track_errors',1);$Xb=@file_get_contents($this->_url.'/'.ltrim($Ud,'/'),false,stream_context_create(array('http'=>array('method'=>$sd,'content'=>json_encode($fb),'ignore_errors'=>1,))));if(!$Xb){$this->error=$php_errormsg;return$Xb;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Xb;return
false;}$K=json_decode($Xb,true);if(!$K){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$eb=get_defined_constants(true);foreach($eb['json']as$D=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$D)){$this->error=$D;break;}}}}return$K;}function
query($Ud,$fb=array(),$sd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Ud,'/'),$fb,$sd);}function
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
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$ee=false){global$b;$lb=array();$I="$R/_search";if($N!=array("*"))$lb["fields"]=$N;if($E){$Ne=array();foreach($E
as$Xa){$Xa=preg_replace('~ DESC$~','',$Xa,1,$hb);$Ne[]=($hb?array($Xa=>"desc"):$Xa);}$lb["sort"]=$Ne;}if($_){$lb["size"]=+$_;if($F)$lb["from"]=($F*$_);}foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""){$ff=array("match"=>array(($X["col"]!=""?$X["col"]:"_all")=>$X["val"]));if($X["op"]=="=")$lb["query"]["filtered"]["filter"]["and"][]=$ff;else$lb["query"]["filtered"]["query"]["bool"]["must"][]=$ff;}}if($lb["query"]&&!$lb["query"]["filtered"]["query"])$lb["query"]["filtered"]["query"]=array("match_all"=>array());$Re=microtime(true);$Ce=$this->_conn->query($I,$lb);if($ee)echo$b->selectQuery("$I: ".print_r($lb,true),format_time($Re));if(!$Ce)return
false;$K=array();foreach($Ce['hits']['hits']as$xc){$L=array();$p=$xc['_source'];if($N!=array("*")){$p=array();foreach($N
as$z)$p[$z]=$xc['fields'][$z];}foreach($p
as$z=>$X)$L[$z]=(is_array($X)?json_encode($X):$X);$K[]=$L;}return
new
Min_Result($K);}}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2]))return$g;return$g->error;}function
support($Wb){return
preg_match("~database|table|columns~",$Wb);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){global$g;$K=$g->rootQuery('_aliases');if($K)$K=array_keys($K);return$K;}function
collations(){return
array();}function
db_collation($l,$Ya){}function
count_tables($k){global$g;$K=$g->query('_mapping');if($K)$K=array_map('count',$K);return$K;}function
tables_list(){global$g;$K=$g->query('_mapping');if($K)$K=array_fill_keys(array_keys(reset($K)),'table');return$K;}function
table_status($D="",$Vb=false){global$g;$Ce=$g->query("_search?search_type=count",array("facets"=>array("count_by_type"=>array("terms"=>array("field"=>"_type",)))),"POST");$K=array();if($Ce){foreach($Ce["facets"]["count_by_type"]["terms"]as$R)$K[$R["term"]]=array("Name"=>$R["term"],"Engine"=>"table","Rows"=>$R["count"],);if($D!=""&&$D==$R["term"])return$K[$D];}return$K;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$g;$hd=$g->query("$R/_mapping");$K=array();if($hd){foreach($hd[$R]['properties']as$D=>$o)$K[$D]=array("field"=>$D,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
foreign_keys($R){return
array();}function
table($v){return$v;}function
idf_escape($v){return$v;}function
convert_field($o){}function
unconvert_field($o,$K){return$K;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),array(),'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
drop_tables($T){global$g;$K=true;foreach($T
as$R)$K=$K&&$g->query(urlencode($R),array(),'DELETE');return$K;}$y="elastic";$Id=array("=","query");$nc=array();$pc=array();$Bb=array(array("json"));}$xb=array("server"=>"MySQL")+$xb;if(!defined("DRIVER")){$ae=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($O,$V,$H){mysqli_report(MYSQLI_REPORT_OFF);list($yc,$Yd)=explode(":",$O,2);$K=@$this->real_connect(($O!=""?$yc:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$H!=""?$H:ini_get("mysqli.default_pw")),null,(is_numeric($Yd)?$Yd:ini_get("mysqli.default_port")),(!is_numeric($Yd)?$Yd:null));if($K){if(method_exists($this,'set_charset'))$this->set_charset("utf8");else$this->query("SET NAMES utf8");}return$K;}function
result($I,$o=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch_array();return$L[$o];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$H){$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$H"!=""?$H:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset'))mysql_set_charset("utf8",$this->_link);else$this->query("SET NAMES utf8");}else$this->error=mysql_error();return(bool)$this->_link;}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($I,$Af=false){$J=@($Af?mysql_unbuffered_query($I,$this->_link):mysql_query($I,$this->_link));$this->error="";if(!$J){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
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
connect($O,$V,$H){$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$O)),$V,$H);$this->query("SET NAMES utf8");return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($I,$Af=false){$this->setAttribute(1000,!$Af);return
parent::query($I,$Af);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$M,$ce){$f=array_keys(reset($M));$be="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Mf=array();foreach($f
as$z)$Mf[$z]="$z = VALUES($z)";$Xe="\nON DUPLICATE KEY UPDATE ".implode(", ",$Mf);$Mf=array();$bd=0;foreach($M
as$P){$Y="(".implode(", ",$P).")";if($Mf&&(strlen($be)+$bd+strlen($Y)+strlen($Xe)>1e6)){if(!queries($be.implode(",\n",$Mf).$Xe))return
false;$Mf=array();$bd=0;}$Mf[]=$Y;$bd+=strlen($Y)+2;}return
queries($be.implode(",\n",$Mf).$Xe);}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
connect(){global$b;$g=new
Min_DB;$i=$b->credentials();if($g->connect($i[0],$i[1],$i[2])){$g->query("SET sql_quote_show_create = 1, autocommit = 1");return$g;}$K=$g->error;if(function_exists('iconv')&&!is_utf8($K)&&strlen($_e=iconv("windows-1250","utf-8",$K))>strlen($K))$K=$_e;return$K;}function
get_databases($cc){global$g;$K=get_session("dbs");if($K===null){$I=($g->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$K=($cc?slow_query($I):get_vals($I));restart_session();set_session("dbs",$K);stop_session();}return$K;}function
limit($I,$Z,$_,$Bd=0,$He=" "){return" $I$Z".($_!==null?$He."LIMIT $_".($Bd?" OFFSET $Bd":""):"");}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($l,$Ya){global$g;$K=null;$ib=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$ib,$B))$K=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$ib,$B))$K=$Ya[$B[1]][-1];return$K;}function
engines(){$K=array();foreach(get_rows("SHOW ENGINES")as$L){if(preg_match("~YES|DEFAULT~",$L["Support"]))$K[]=$L["Engine"];}return$K;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){global$g;return
get_key_vals($g->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$K=array();foreach($k
as$l)$K[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$K;}function
table_status($D="",$Vb=false){global$g;$K=array();foreach(get_rows($Vb&&$g->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$L){if($L["Engine"]=="InnoDB")$L["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$L["Comment"]);if(!isset($L["Engine"]))$L["Comment"]="";if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){$K=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$L){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$L["Type"],$B);$K[$L["Field"]]=array("field"=>$L["Field"],"full_type"=>$L["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($L["Default"]!=""||preg_match("~char|set~",$B[1])?$L["Default"]:null),"null"=>($L["Null"]=="YES"),"auto_increment"=>($L["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$L["Extra"],$B)?$B[1]:""),"collation"=>$L["Collation"],"privileges"=>array_flip(preg_split('~, *~',$L["Privileges"])),"comment"=>$L["Comment"],"primary"=>($L["Key"]=="PRI"),);}return$K;}function
indexes($R,$h=null){$K=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$h)as$L){$K[$L["Key_name"]]["type"]=($L["Key_name"]=="PRIMARY"?"PRIMARY":($L["Index_type"]=="FULLTEXT"?"FULLTEXT":($L["Non_unique"]?"INDEX":"UNIQUE")));$K[$L["Key_name"]]["columns"][]=$L["Column_name"];$K[$L["Key_name"]]["lengths"][]=$L["Sub_part"];$K[$L["Key_name"]]["descs"][]=null;}return$K;}function
foreign_keys($R){global$g,$Dd;static$Vd='`(?:[^`]|``)+`';$K=array();$jb=$g->result("SHOW CREATE TABLE ".table($R),1);if($jb){preg_match_all("~CONSTRAINT ($Vd) FOREIGN KEY \\(((?:$Vd,? ?)+)\\) REFERENCES ($Vd)(?:\\.($Vd))? \\(((?:$Vd,? ?)+)\\)(?: ON DELETE ($Dd))?(?: ON UPDATE ($Dd))?~",$jb,$jd,PREG_SET_ORDER);foreach($jd
as$B){preg_match_all("~$Vd~",$B[2],$Oe);preg_match_all("~$Vd~",$B[5],$ef);$K[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$Oe[0]),"target"=>array_map('idf_unescape',$ef[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$K;}function
view($D){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$g->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$K=array();foreach(get_rows("SHOW COLLATION")as$L){if($L["Default"])$K[$L["Charset"]][-1]=$L["Collation"];else$K[$L["Charset"]][]=$L["Collation"];}ksort($K);foreach($K
as$z=>$X)asort($K[$z]);return$K;}function
information_schema($l){global$g;return($g->server_info>=5&&$l=="information_schema")||($g->server_info>=5.5&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
error_line(){global$g;if(preg_match('~ at line ([0-9]+)$~',$g->error,$qe))return$qe[1]-1;}function
create_database($l,$d){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){restart_session();set_session("dbs",null);return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($D,$d){if(create_database($D,$d)){$se=array();foreach(tables_list()as$R=>$U)$se[]=table($R)." TO ".idf_escape($D).".".table($R);if(!$se||queries("RENAME TABLE ".implode(", ",$se))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$Da=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$w){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$w["columns"],true)){$Da="";break;}if($w["type"]=="PRIMARY")$Da=" UNIQUE";}}return" AUTO_INCREMENT$Da";}function
alter_table($R,$D,$p,$dc,$bb,$Ib,$d,$Ca,$Td){$c=array();foreach($p
as$o)$c[]=($o[1]?($R!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($R!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$dc);$Se="COMMENT=".q($bb).($Ib?" ENGINE=".q($Ib):"").($d?" COLLATE ".q($d):"").($Ca!=""?" AUTO_INCREMENT=$Ca":"").$Td;if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n) $Se");if($R!=$D)$c[]="RENAME TO ".table($D);$c[]=$Se;return
queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c));}function
alter_indexes($R,$c){foreach($c
as$z=>$X)$c[$z]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Qf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Qf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Qf,$ef){$se=array();foreach(array_merge($T,$Qf)as$R)$se[]=table($R)." TO ".idf_escape($ef).".".table($R);return
queries("RENAME TABLE ".implode(", ",$se));}function
copy_tables($T,$Qf,$ef){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$D=($ef==DB?table("copy_$R"):idf_escape($ef).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $D")||!queries("CREATE TABLE $D LIKE ".table($R))||!queries("INSERT INTO $D SELECT * FROM ".table($R)))return
false;}foreach($Qf
as$R){$D=($ef==DB?table("copy_$R"):idf_escape($ef).".".table($R));$Pf=view($R);if(!queries("DROP VIEW IF EXISTS $D")||!queries("CREATE VIEW $D AS $Pf[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$M=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($M);}function
triggers($R){$K=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$L)$K[$L["Trigger"]]=array($L["Timing"],$L["Event"]);return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$U){global$g,$Jb,$Ic,$_f;$ua=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$zf="((".implode("|",array_merge(array_keys($_f),$ua)).")\\b(?:\\s*\\(((?:[^'\")]|$Jb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$Vd="\\s*(".($U=="FUNCTION"?"":$Ic).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$zf";$ib=$g->result("SHOW CREATE $U ".idf_escape($D),2);preg_match("~\\(((?:$Vd\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$zf\\s+":"")."(.*)~is",$ib,$B);$p=array();preg_match_all("~$Vd\\s*,?~is",$B[1],$jd,PREG_SET_ORDER);foreach($jd
as$Rd){$D=str_replace("``","`",$Rd[2]).$Rd[3];$p[]=array("field"=>$D,"type"=>strtolower($Rd[5]),"length"=>preg_replace_callback("~$Jb~s",'normalize_enum',$Rd[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Rd[8] $Rd[7]"))),"null"=>1,"full_type"=>$Rd[4],"inout"=>strtoupper($Rd[1]),"collation"=>strtolower($Rd[9]),);}if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$B[11]);return
array("fields"=>$p,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
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
set_schema($Ae){return
true;}function
create_sql($R,$Ca){global$g;$K=$g->result("SHOW CREATE TABLE ".table($R),1);if(!$Ca)$K=preg_replace('~ AUTO_INCREMENT=\\d+~','',$K);return$K;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($R,$Ve){$K="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$L)$K.="\n".($Ve=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($L["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($L["Trigger"])." $L[Timing] $L[Event] ON ".table($L["Table"])." FOR EACH ROW\n$L[Statement];;\n";return$K;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return"AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$K){if(preg_match("~binary~",$o["type"]))$K="UNHEX($K)";if($o["type"]=="bit")$K="CONV($K, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$K="GeomFromText($K)";return$K;}function
support($Wb){global$g;return!preg_match("~scheme|sequence|type|view_trigger".($g->server_info<5.1?"|event|partitioning".($g->server_info<5?"|routine|trigger|view":""):"")."~",$Wb);}$y="sql";$_f=array();$Ue=array();foreach(array('Zahlen'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Datum oder Zeit'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Zeichenketten'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Listen'=>array("enum"=>65535,"set"=>64),'BinÃ¤r'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometrie'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$z=>$X){$_f+=$X;$Ue[$z]=array_keys($X);}$Gf=array("unsigned","zerofill","unsigned zerofill");$Id=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$nc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$pc=array("avg","count","count distinct","group_concat","max","min","sum");$Bb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.1.0";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='http://www.adminer.org/editor/' target='_blank' id='h1'>".'Editor'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($ib=false){return
password_file($ib);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){global$g;if($g){$k=$this->databases(false);return(!$k?$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$k[(information_schema($k[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($cc=true){return
get_databases($cc);}function
queryTimeout(){return
5;}function
headers(){return
true;}function
head(){return
true;}function
loginForm(){echo'<table cellspacing="0">
<tr><th>Benutzer<td><input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>Passwort<td><input type="password" name="auth[password]">
</table>
<script type="text/javascript">
focus(document.getElementById(\'username\'));
</script>
',"<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Passwort speichern')."\n";}function
login($fd,$H){global$g;$g->query("SET time_zone = ".q(substr_replace(@date("O"),":",-2,0)));return
true;}function
tableName($af){return
h($af["Comment"]!=""?$af["Comment"]:$af["Name"]);}function
fieldName($o,$E=0){return
h($o["comment"]!=""?$o["comment"]:$o["field"]);}function
selectLinks($af,$P=""){$a=$af["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.'Neuer Datensatz'."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Ze){$K=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$L)$K[$L["TABLE_NAME"]]["keys"][$L["CONSTRAINT_NAME"]][$L["COLUMN_NAME"]]=$L["REFERENCED_COLUMN_NAME"];foreach($K
as$z=>$X){$D=$this->tableName(table_status($z,true));if($D!=""){$Ce=preg_quote($Ze);$He="(:|\\s*-)?\\s+";$K[$z]["name"]=(preg_match("(^$Ce$He(.+)|^(.+?)$He$Ce\$)iu",$D,$B)?$B[2].$B[3]:$D);}else
unset($K[$z]);}return$K;}function
backwardKeysPrint($Ga,$L){foreach($Ga
as$R=>$Fa){foreach($Fa["keys"]as$Za){$A=ME.'select='.urlencode($R);$t=0;foreach($Za
as$e=>$X)$A.=where_link($t++,$e,$L[$X]);echo"<a href='".h($A)."'>".h($Fa["name"])."</a>";$A=ME.'edit='.urlencode($R);foreach($Za
as$e=>$X)$A.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($L[$X]);echo"<a href='".h($A)."' title='".'Neuer Datensatz'."'>+</a> ";}}}function
selectQuery($I,$jf){return"<!--\n".str_replace("--","--><!-- ",$I)."\n($jf)\n-->\n";}function
rowDescription($R){foreach(fields($R)as$o){if(preg_match("~varchar|character varying~",$o["type"]))return
idf_escape($o["field"]);}return"";}function
rowDescriptions($M,$fc){$K=$M;foreach($M[0]as$z=>$X){if(list($R,$u,$D)=$this->_foreignColumn($fc,$z)){$Ac=array();foreach($M
as$L)$Ac[$L[$z]]=q($L[$z]);$rb=$this->_values[$R];if(!$rb)$rb=get_key_vals("SELECT $u, $D FROM ".table($R)." WHERE $u IN (".implode(", ",$Ac).")");foreach($M
as$C=>$L){if(isset($L[$z]))$K[$C][$z]=(string)$rb[$L[$z]];}}}return$K;}function
selectLink($X,$o){}function
selectVal($X,$A,$o,$Nd){$K=($X===null?"&nbsp;":$X);$A=h($A);if(preg_match('~blob|bytea~',$o["type"])&&!is_utf8($X)){$K=lang(array('%d Byte','%d Bytes'),strlen($Nd));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$Nd))$K="<img src='$A' alt='$K'>";}if(like_bool($o)&&$K!="&nbsp;")$K=($X?'yes':'no');if($A)$K="<a href='$A'".(is_url($A)?" rel='noreferrer'":"").">$K</a>";if(!$A&&!like_bool($o)&&preg_match('~int|float|double|decimal~',$o["type"]))$K="<div class='number'>$K</div>";elseif(preg_match('~date~',$o["type"]))$K="<div class='datetime'>$K</div>";return$K;}function
editVal($X,$o){if(preg_match('~date|timestamp~',$o["type"])&&$X!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~','$6.$4.$1',$X);return$X;}function
selectColumnsPrint($N,$f){}function
selectSearchPrint($Z,$f,$x){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Suchen'."</legend><div>\n";$Uc=array();foreach($Z
as$z=>$X)$Uc[$X["col"]]=$z;$t=0;$p=fields($_GET["select"]);foreach($f
as$D=>$qb){$o=$p[$D];if(preg_match("~enum~",$o["type"])||like_bool($o)){$z=$Uc[$D];$t--;echo"<div>".h($qb)."<input type='hidden' name='where[$t][col]' value='".h($D)."'>:",(like_bool($o)?" <select name='where[$t][val]'>".optionlist(array(""=>"",'no','yes'),$Z[$z]["val"],true)."</select>":enum_input("checkbox"," name='where[$t][val][]'",$o,(array)$Z[$z]["val"],($o["null"]?0:null))),"</div>\n";unset($f[$D]);}elseif(is_array($Kd=$this->_foreignKeyOptions($_GET["select"],$D))){if($p[$D]["null"])$Kd[0]='('.'leer'.')';$z=$Uc[$D];$t--;echo"<div>".h($qb)."<input type='hidden' name='where[$t][col]' value='".h($D)."'><input type='hidden' name='where[$t][op]' value='='>: <select name='where[$t][val]'>".optionlist($Kd,$Z[$z]["val"],true)."</select></div>\n";unset($f[$D]);}}$t=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$t][col]'><option value=''>(".'beliebig'.")".optionlist($f,$X["col"],true)."</select>",html_select("where[$t][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$t][val]' value='".h($X["val"])."' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";$t++;}}echo"<div><select name='where[$t][col]' onchange='this.nextSibling.nextSibling.onchange();'><option value=''>(".'beliebig'.")".optionlist($f,null,true)."</select>",html_select("where[$t][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$t][val]' onchange='selectAddRow(this);' onsearch='selectSearch(this);'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($E,$f,$x){$Md=array();foreach($x
as$z=>$w){$E=array();foreach($w["columns"]as$X)$E[]=$f[$X];if(count(array_filter($E,'strlen'))>1&&$z!="PRIMARY")$Md[$z]=implode(", ",$E);}if($Md){echo'<fieldset><legend>'.'Ordnen'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Md,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($_){echo"<fieldset><legend>".'Begrenzung'."</legend><div>";echo
html_select("limit",array("","50","100"),$_),"</div></fieldset>\n";}function
selectLengthPrint($hf){}function
selectActionPrint($x){echo"<fieldset><legend>".'Aktion'."</legend><div>","<input type='submit' value='".'Daten zeigen von'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Fb,$f){if($Fb){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div onkeydown=\"eventStop(event); return bodyKeydown(event, 'email');\">\n","<p>".'Von'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Betreff'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p onkeydown=\"eventStop(event); return bodyKeydown(event, 'email_append');\">".html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'HinzufÃ¼gen'."'>\n";echo"<p>".'AnhÃ¤nge'.": <input type='file' name='email_files[]' onchange=\"this.onchange = function () { }; var el = this.cloneNode(true); el.value = ''; this.parentNode.appendChild(el);\">","<p>".(count($Fb)==1?'<input type="hidden" name="email_field" value="'.h(key($Fb)).'">':html_select("email_field",$Fb)),"<input type='submit' name='email' value='".'Abschicken'."' onclick=\"return this.form['delete'].onclick();\">\n","</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$x){return
array(array(),array());}function
selectSearchProcess($p,$x){$K=array();foreach((array)$_GET["where"]as$z=>$Z){$Xa=$Z["col"];$Gd=$Z["op"];$X=$Z["val"];if(($z<0?"":$Xa).$X!=""){$cb=array();foreach(($Xa!=""?array($Xa=>$p[$Xa]):$p)as$D=>$o){if($Xa!=""||is_numeric($X)||!preg_match('~int|float|double|decimal~',$o["type"])){$D=idf_escape($D);if($Xa!=""&&$o["type"]=="enum")$cb[]=(in_array(0,$X)?"$D IS NULL OR ":"")."$D IN (".implode(", ",array_map('intval',$X)).")";else{$if=preg_match('~char|text|enum|set~',$o["type"]);$Y=$this->processInput($o,(!$Gd&&$if&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$cb[]=$D.($Y=="NULL"?" IS".($Gd==">="?" NOT":"")." $Y":(in_array($Gd,$this->operators)||$Gd=="="?" $Gd $Y":($if?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($z<0&&$X=="0")$cb[]="$D IS NULL";}}}$K[]=($cb?"(".implode(" OR ",$cb).")":"0");}}return$K;}function
selectOrderProcess($p,$x){$Dc=$_GET["index_order"];if($Dc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($Dc!=""?array($x[$Dc]):$x)as$w){if($Dc!=""||$w["type"]=="INDEX"){$rc=array_filter($w["descs"]);$qb=false;foreach($w["columns"]as$X){if(preg_match('~date|timestamp~',$p[$X]["type"])){$qb=true;break;}}$K=array();foreach($w["columns"]as$z=>$X)$K[]=idf_escape($X).(($rc?$w["descs"][$z]:$qb)?" DESC":"");return$K;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$fc){if($_POST["email_append"])return
true;if($_POST["email"]){$Ge=0;if($_POST["all"]||$_POST["check"]){$o=idf_escape($_POST["email_field"]);$We=$_POST["email_subject"];$pd=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$We.$pd",$jd);$M=get_rows("SELECT DISTINCT $o".($jd[1]?", ".implode(", ",array_map('idf_escape',array_unique($jd[1]))):"")." FROM ".table($_GET["select"])." WHERE $o IS NOT NULL AND $o != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$p=fields($_GET["select"]);foreach($this->rowDescriptions($M,$fc)as$L){$te=array('{\\'=>'{');foreach($jd[1]as$X)$te['{$'."$X}"]=$this->editVal($L[$X],$p[$X]);$Eb=$L[$_POST["email_field"]];if(is_mail($Eb)&&send_mail($Eb,strtr($We,$te),strtr($pd,$te),$_POST["email_from"],$_FILES["email_files"]))$Ge++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('%d e-mail abgeschickt.','%d e-mails abgeschickt.'),$Ge));}return
false;}function
selectQueryBuild($N,$Z,$s,$E,$_,$F){return"";}function
messageQuery($I,$jf){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$I)."\n".($jf?"($jf)\n":"")."-->";}function
editFunctions($o){$K=array();if($o["null"]&&preg_match('~blob~',$o["type"]))$K["NULL"]='leer';$K[""]=($o["null"]||$o["auto_increment"]||like_bool($o)?"":"*");if(preg_match('~date|time~',$o["type"]))$K["now"]='jetzt';if(preg_match('~_(md5|sha1)$~i',$o["field"],$B))$K[]=strtolower($B[1]);return$K;}function
editInput($R,$o,$Aa,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Aa value='-1' checked><i>".'Original'."</i></label> ":"").enum_input("radio",$Aa,$o,($Y||isset($_GET["select"])?$Y:0),($o["null"]?"":null));$Kd=$this->_foreignKeyOptions($R,$o["field"],$Y);if($Kd!==null)return(is_array($Kd)?"<select$Aa>".optionlist($Kd,$Y,true)."</select>":"<input value='".h($Y)."'$Aa class='hidden'><input value='".h($Kd)."' class='jsonly' onkeyup=\"whisper('".h(ME."script=complete&source=".urlencode($R)."&field=".urlencode($o["field"]))."&value=', this);\"><div onclick='return whisperClick(event, this.previousSibling);'></div>");if(like_bool($o))return'<input type="checkbox" value="'.h($Y?$Y:1).'"'.($Y?' checked':'')."$Aa>";$wc="";if(preg_match('~time~',$o["type"]))$wc='HH:MM:SS';if(preg_match('~date|timestamp~',$o["type"]))$wc='t.m.[jjjj]'.($wc?" [$wc]":"");if($wc)return"<input value='".h($Y)."'$Aa> ($wc)";if(preg_match('~_(md5|sha1)$~i',$o["field"]))return"<input type='password' value='".h($Y)."'$Aa>";return'';}function
processInput($o,$Y,$r=""){if($r=="now")return"$r()";$K=$Y;if(preg_match('~date|timestamp~',$o["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote('$6.$4.$1'))).'(.*))',$Y,$B))$K=($B["p1"]!=""?$B["p1"]:($B["p2"]!=""?($B["p2"]<70?20:19).$B["p2"]:gmdate("Y")))."-$B[p3]$B[p4]-$B[p5]$B[p6]".end($B);$K=($o["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$K:q($K));if($Y==""&&like_bool($o))$K="0";elseif($Y==""&&($o["null"]||!preg_match('~char|text~',$o["type"])))$K="NULL";elseif(preg_match('~^(md5|sha1)$~',$r))$K="$r($K)";return
unconvert_field($o,$K);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($R,$Ve,$I){global$g;$J=$g->query($I,1);if($J){while($L=$J->fetch_assoc()){if($Ve=="table"){dump_csv(array_keys($L));$Ve="INSERT";}dump_csv($L);}}}function
dumpFilename($_c){return
friendly_url($_c);}function
dumpHeaders($_c,$ud=false){$Rb="csv";header("Content-Type: text/csv; charset=utf-8");return$Rb;}function
homepage(){return
true;}function
navigation($td){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="http://www.adminer.org/editor/#download" target="_blank" id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($td=="auth"){$bc=true;foreach((array)$_SESSION["pwds"]as$Nf=>$Ke){foreach($Ke[""]as$V=>$H){if($H!==null){if($bc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$bc=false;}echo"<a href='".h(auth_url($Nf,"",$V))."'>".($V!=""?h($V):"<i>".'leer'."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($td);if($td!="db"&&$td!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".'Keine Tabellen.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($td){}function
tablesPrint($T){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($T
as$L){$D=$this->tableName($L);if(isset($L["Engine"])&&$D!="")echo"<a href='".h(ME).'select='.urlencode($L["Name"])."'".bold($_GET["select"]==$L["Name"]||$_GET["edit"]==$L["Name"])." title='".'Daten auswÃ¤hlen'."'>$D</a><br>\n";}}function
_foreignColumn($fc,$e){foreach((array)$fc[$e]as$ec){if(count($ec["source"])==1){$D=$this->rowDescription($ec["table"]);if($D!=""){$u=idf_escape($ec["target"][0]);return
array($ec["table"],$u,$D);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$g;if(list($ef,$u,$D)=$this->_foreignColumn(column_foreign_keys($R),$e)){$K=&$this->_values[$ef];if($K===null){$S=table_status($ef);$K=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $u, $D FROM ".table($ef)." ORDER BY 2"));}if(!$K&&$Y!==null)return$g->result("SELECT $D FROM ".table($ef)." WHERE $u = ".q($Y));return$K;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($mf,$n="",$Oa=array(),$nf=""){global$ba,$ca,$b,$xb,$y;page_headers();$of=$mf.($nf!=""?": $nf":"");$pf=strip_tags($of.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="de" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$pf,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.1.0",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.1.0",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.1.0",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.1.0",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);"',(isset($_COOKIE["adminer_version"])?"":" onload=\"verifyVersion('$ca');\""),'>
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="help" class="jush-',$y,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Oa!==null){$A=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($A?$A:".").'">'.$xb[DRIVER].'</a> &raquo; ';$A=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=(SERVER!=""?h(SERVER):'Server');if($Oa===false)echo"$O\n";else{echo"<a href='".($A?h($A):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Oa)))echo'<a href="'.h($A."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Oa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Oa
as$z=>$X){$qb=(is_array($X)?$X[1]:h($X));if($qb!="")echo"<a href='".h(ME."$z=").urlencode(is_array($X)?$X[0]:$X)."'>$qb</a> &raquo; ";}}echo"$mf\n";}}echo"<h2>$of</h2>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($n){$If=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$qd=$_SESSION["messages"][$If];if($qd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$qd)."</div>\n";unset($_SESSION["messages"][$If]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($td=""){global$b,$rf;echo'</div>

';if($td!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Abmelden" id="logout">
<input type="hidden" name="token" value="',$rf,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($td);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($C){while($C>=2147483648)$C-=4294967296;while($C<=-2147483649)$C+=4294967296;return(int)$C;}function
long2str($W,$Sf){$_e='';foreach($W
as$X)$_e.=pack('V',$X);if($Sf)return
substr($_e,0,end($W));return$_e;}function
str2long($_e,$Sf){$W=array_values(unpack('V*',str_pad($_e,4*ceil(strlen($_e)/4),"\0")));if($Sf)$W[]=strlen($_e);return$W;}function
xxtea_mx($Yf,$Xf,$Ye,$Qc){return
int32((($Yf>>5&0x7FFFFFF)^$Xf<<2)+(($Xf>>3&0x1FFFFFFF)^$Yf<<4))^int32(($Ye^$Xf)+($Qc^$Yf));}function
encrypt_string($Te,$z){if($Te=="")return"";$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Te,true);$C=count($W)-1;$Yf=$W[$C];$Xf=$W[0];$ie=floor(6+52/($C+1));$Ye=0;while($ie-->0){$Ye=int32($Ye+0x9E3779B9);$Ab=$Ye>>2&3;for($Qd=0;$Qd<$C;$Qd++){$Xf=$W[$Qd+1];$vd=xxtea_mx($Yf,$Xf,$Ye,$z[$Qd&3^$Ab]);$Yf=int32($W[$Qd]+$vd);$W[$Qd]=$Yf;}$Xf=$W[0];$vd=xxtea_mx($Yf,$Xf,$Ye,$z[$Qd&3^$Ab]);$Yf=int32($W[$C]+$vd);$W[$C]=$Yf;}return
long2str($W,false);}function
decrypt_string($Te,$z){if($Te=="")return"";if(!$z)return
false;$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($Te,false);$C=count($W)-1;$Yf=$W[$C];$Xf=$W[0];$ie=floor(6+52/($C+1));$Ye=int32($ie*0x9E3779B9);while($Ye){$Ab=$Ye>>2&3;for($Qd=$C;$Qd>0;$Qd--){$Yf=$W[$Qd-1];$vd=xxtea_mx($Yf,$Xf,$Ye,$z[$Qd&3^$Ab]);$Xf=int32($W[$Qd]-$vd);$W[$Qd]=$Xf;}$Yf=$W[$C];$vd=xxtea_mx($Yf,$Xf,$Ye,$z[$Qd&3^$Ab]);$Xf=int32($W[0]-$vd);$W[0]=$Xf;$Ye=int32($Ye-0x9E3779B9);}return
long2str($W,true);}$g='';$tc=$_SESSION["token"];if(!$tc)$_SESSION["token"]=rand(1,1e6);$rf=get_token();$Wd=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($z)=explode(":",$X);$Wd[$z]=$X;}}function
add_invalid_login(){global$b;$Yb=get_temp_dir()."/adminer.invalid";$kc=@fopen($Yb,"r+");if(!$kc){$kc=@fopen($Yb,"w");if(!$kc)return;}flock($kc,LOCK_EX);$Mc=unserialize(stream_get_contents($kc));$jf=time();if($Mc){foreach($Mc
as$Nc=>$X){if($X[0]<$jf)unset($Mc[$Nc]);}}$Lc=&$Mc[$b->bruteForceKey()];if(!$Lc)$Lc=array($jf+30*60,0);$Lc[1]++;$Ie=serialize($Mc);rewind($kc);fwrite($kc,$Ie);ftruncate($kc,strlen($Ie));flock($kc,LOCK_UN);fclose($kc);}$Ba=$_POST["auth"];if($Ba){$Mc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Lc=$Mc[$b->bruteForceKey()];$yd=($Lc[1]>30?$Lc[0]-time():0);if($yd>0)auth_error(sprintf('Too many unsuccessful logins, try again in %d minute(s).',ceil($yd/60)));session_regenerate_id();$m=$Ba["driver"];$O=$Ba["server"];$V=$Ba["username"];$H=(string)$Ba["password"];$l=$Ba["db"];set_password($m,$O,$V,$H);$_SESSION["db"][$m][$O][$V][$l]=true;if($Ba["permanent"]){$z=base64_encode($m)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($l);$fe=$b->permanentLogin(true);$Wd[$z]="$z:".base64_encode($fe?encrypt_string($H,$fe):"");cookie("adminer_permanent",implode(" ",$Wd));}if(count($_POST)==1||DRIVER!=$m||SERVER!=$O||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($m,$O,$V,$l));}elseif($_POST["logout"]){if($tc&&!verify_token()){page_header('Abmelden','CSRF Token ungÃ¼ltig. Bitte die Formulardaten erneut abschicken.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$z)set_session($z,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Abmeldung erfolgreich.');}}elseif($Wd&&!$_SESSION["pwds"]){session_regenerate_id();$fe=$b->permanentLogin();foreach($Wd
as$z=>$X){list(,$Ta)=explode(":",$X);list($Nf,$O,$V,$l)=array_map('base64_decode',explode("-",$z));set_password($Nf,$O,$V,decrypt_string(base64_decode($Ta),$fe));$_SESSION["db"][$Nf][$O][$V][$l]=true;}}function
unset_permanent(){global$Wd;foreach($Wd
as$z=>$X){list($Nf,$O,$V,$l)=array_map('base64_decode',explode("-",$z));if($Nf==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Wd[$z]);}cookie("adminer_permanent",implode(" ",$Wd));}function
auth_error($n){global$b,$tc;$Le=session_name();if(!$_COOKIE[$Le]&&$_GET[$Le]&&ini_bool("session.use_only_cookies"))$n='Sitzungen mÃ¼ssen aktiviert sein.';elseif(isset($_GET["username"])){if(($_COOKIE[$Le]||$_GET[$Le])&&!$tc)$n='Sitzungsdauer abgelaufen, bitte erneut anmelden.';else{add_invalid_login();$H=get_password();if($H!==null){if($H===false)$n.='<br>'.sprintf('Master password expired. <a href="http://www.adminer.org/en/extension/" target="_blank">Implement</a> %s method to make it permanent.','<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}$G=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$G["lifetime"]);page_header('Login',$n,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('Keine Erweiterungen installiert',sprintf('Keine der unterstÃ¼tzten PHP-Erweiterungen (%s) ist vorhanden.',implode(", ",$ae)),false);page_footer("auth");exit;}$g=connect();}$m=new
Min_Driver($g);if(!is_object($g)||!$b->login($_GET["username"],get_password()))auth_error((is_string($g)?$g:'UngÃ¼ltige Anmelde-Informationen.'));if($Ba&&$_POST["token"])$_POST["token"]=$rf;$n='';if($_POST){if(!verify_token()){$Hc="max_input_vars";$nd=ini_get($Hc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$z){$X=ini_get($z);if($X&&(!$nd||$X<$nd)){$Hc=$z;$nd=$X;}}}$n=(!$_POST["token"]&&$nd?sprintf('Die maximal erlaubte Anzahl der Felder ist Ã¼berschritten. Bitte %s erhÃ¶hen.',"'$Hc'"):'CSRF Token ungÃ¼ltig. Bitte die Formulardaten erneut abschicken.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('POST data zu gross. Reduzieren Sie die GrÃ¶sse oder vergrÃ¶ssern Sie den Wert %s in der Konfiguration.',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($uc){return"=?UTF-8?B?".base64_encode($uc)."?=";}function
send_mail($Eb,$We,$pd,$lc="",$Zb=array()){$Kb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$pd=str_replace("\n",$Kb,wordwrap(str_replace("\r","","$pd\n")));$Na=uniqid("boundary");$za="";foreach((array)$Zb["error"]as$z=>$X){if(!$X)$za.="--$Na$Kb"."Content-Type: ".str_replace("\n","",$Zb["type"][$z]).$Kb."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$Zb["name"][$z])."\"$Kb"."Content-Transfer-Encoding: base64$Kb$Kb".chunk_split(base64_encode(file_get_contents($Zb["tmp_name"][$z])),76,$Kb).$Kb;}$Ia="";$vc="Content-Type: text/plain; charset=utf-8$Kb"."Content-Transfer-Encoding: 8bit";if($za){$za.="--$Na--$Kb";$Ia="--$Na$Kb$vc$Kb$Kb";$vc="Content-Type: multipart/mixed; boundary=\"$Na\"";}$vc.=$Kb."MIME-Version: 1.0$Kb"."X-Mailer: Adminer Editor".($lc?$Kb."From: ".str_replace("\n","",$lc):"");return
mail($Eb,email_header($We),$Ia.$pd.$za,$vc);}function
like_bool($o){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$o["full_type"]);}$g->select_db($b->database());$Dd="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$xb[DRIVER]='Login';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$N=array(idf_escape($_GET["field"]));$J=$m->select($a,$N,array(where($_GET,$p)),$N);$L=($J?$J->fetch_row():array());echo$L[0];exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Hf=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$D=>$o){if(!isset($o["privileges"][$Hf?"update":"insert"])||$b->fieldName($o)=="")unset($p[$D]);}if($_POST&&!$n&&!isset($_GET["select"])){$ed=$_POST["referer"];if($_POST["insert"])$ed=($Hf?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$ed))$ed=ME."select=".urlencode($a);$x=indexes($a);$Cf=unique_array($_GET["where"],$x);$le="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($ed,'Datensatz gelÃ¶scht.',$m->delete($a,$le,!$Cf));else{$P=array();foreach($p
as$D=>$o){$X=process_input($o);if($X!==false&&$X!==null)$P[idf_escape($D)]=$X;}if($Hf){if(!$P)redirect($ed);queries_redirect($ed,'Datensatz geÃ¤ndert.',$m->update($a,$P,$le,!$Cf));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$J=$m->insert($a,$P);$Zc=($J?last_id():0);queries_redirect($ed,sprintf('Datensatz%s hinzugefÃ¼gt.',($Zc?" $Zc":"")),$J);}}}$L=null;if($_POST["save"])$L=(array)$_POST["fields"];elseif($Z){$N=array();foreach($p
as$D=>$o){if(isset($o["privileges"]["select"])){$xa=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$xa="''";if($y=="sql"&&preg_match("~enum|set~",$o["type"]))$xa="1*".idf_escape($D);$N[]=($xa?"$xa AS ":"").idf_escape($D);}}$L=array();if(!support("table"))$N=array("*");if($N){$J=$m->select($a,$N,array($Z),$N,array(),(isset($_GET["select"])?2:1));$L=$J->fetch_assoc();if(!$L)$L=false;if(isset($_GET["select"])&&(!$L||$J->fetch_assoc()))$L=null;}}if(!support("table")&&!$p){if(!$Z){$J=$m->select($a,array("*"),$Z,array("*"));$L=($J?$J->fetch_assoc():false);if(!$L)$L=array($m->primary=>"");}if($L){foreach($L
as$z=>$X){if(!$Z)$L[$z]=null;$p[$z]=array("field"=>$z,"null"=>($z!=$m->primary),"auto_increment"=>($z==$m->primary));}}}edit_form($a,$p,$L,$Hf);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$x=indexes($a);$p=fields($a);$gc=column_foreign_keys($a);$Cd="";if($S["Oid"]){$Cd=($y=="sqlite"?"rowid":"oid");$x[]=array("type"=>"PRIMARY","columns"=>array($Cd));}parse_str($_COOKIE["adminer_import"],$qa);$ye=array();$f=array();$hf=null;foreach($p
as$z=>$o){$D=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$D!=""){$f[$z]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($o))$hf=$b->selectLengthProcess();}$ye+=$o["privileges"];}list($N,$s)=$b->selectColumnsProcess($f,$x);$Oc=count($s)<count($N);$Z=$b->selectSearchProcess($p,$x);$E=$b->selectOrderProcess($p,$x);$_=$b->selectLimitProcess();$lc=($N?implode(", ",$N):"*".($Cd?", $Cd":"")).convert_fields($f,$p,$N)."\nFROM ".table($a);$oc=($s&&$Oc?"\nGROUP BY ".implode(", ",$s):"").($E?"\nORDER BY ".implode(", ",$E):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Df=>$L){$xa=convert_field($p[key($L)]);$N=array($xa?$xa:idf_escape(key($L)));$Z[]=where_check($Df,$p);$K=$m->select($a,$N,$Z,$N);if($K)echo
reset($K->fetch_row());}exit;}if($_POST&&!$n){$Uf=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Ra=array();foreach($_POST["check"]as$Pa)$Ra[]=where_check($Pa,$p);$Uf[]="((".implode(") OR (",$Ra)."))";}$Uf=($Uf?"\nWHERE ".implode(" AND ",$Uf):"");$ce=$Ff=null;foreach($x
as$w){if($w["type"]=="PRIMARY"){$ce=array_flip($w["columns"]);$Ff=($N?$ce:array());break;}}foreach((array)$Ff
as$z=>$X){if(in_array(idf_escape($z),$N))unset($Ff[$z]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$Ff===array())$I="SELECT $lc$Uf$oc";else{$Bf=array();foreach($_POST["check"]as$X)$Bf[]="(SELECT".limit($lc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$oc,1).")";$I=implode(" UNION ALL ",$Bf);}$b->dumpData($a,"table",$I);exit;}if(!$b->selectEmailProcess($Z,$gc)){if($_POST["save"]||$_POST["delete"]){$J=true;$ra=0;$P=array();if(!$_POST["delete"]){foreach($f
as$D=>$X){$X=process_input($p[$D]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($D)]=($X!==false?$X:idf_escape($D));}}if($_POST["delete"]||$P){if($_POST["clone"])$I="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Ff===array()&&is_array($_POST["check"]))||$Oc){$J=($_POST["delete"]?$m->delete($a,$Uf):($_POST["clone"]?queries("INSERT $I$Uf"):$m->update($a,$P,$Uf)));$ra=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Tf="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$J=($_POST["delete"]?$m->delete($a,$Tf,1):($_POST["clone"]?queries("INSERT".limit1($I,$Tf)):$m->update($a,$P,$Tf)));if(!$J)break;$ra+=$g->affected_rows;}}}$pd=sprintf('%d Artikel betroffen.',$ra);if($_POST["clone"]&&$J&&$ra==1){$Zc=last_id();if($Zc)$pd=sprintf('Datensatz%s hinzugefÃ¼gt.'," $Zc");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$pd,$J);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+klick zum Bearbeiten des Wertes.';else{$J=true;$ra=0;foreach($_POST["val"]as$Df=>$L){$P=array();foreach($L
as$z=>$X){$z=bracket_escape($z,1);$P[idf_escape($z)]=(preg_match('~char|text~',$p[$z]["type"])||$X!=""?$b->processInput($p[$z],$X):"NULL");}$J=$m->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Df,$p),!($Oc||$Ff===array())," ");if(!$J)break;$ra+=$g->affected_rows;}queries_redirect(remove_from_uri(),sprintf('%d Artikel betroffen.',$ra),$J);}}elseif(!is_string($Xb=get_file("csv_file",true)))$n=upload_error($Xb);elseif(!preg_match('~~u',$Xb))$n='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($qa["output"])."&format=".urlencode($_POST["separator"]));$J=true;$Za=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Xb,$jd);$ra=count($jd[0]);$m->begin();$He=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$M=array();foreach($jd[0]as$z=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$He]*)$He~",$X.$He,$kd);if(!$z&&!array_diff($kd[1],$Za)){$Za=$kd[1];$ra--;}else{$P=array();foreach($kd[1]as$t=>$Xa)$P[idf_escape($Za[$t])]=($Xa==""&&$p[$Za[$t]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$Xa))));$M[]=$P;}}$J=(!$M||$m->insertUpdate($a,$M,$ce));if($J)$m->commit();queries_redirect(remove_from_uri("page"),lang(array('%d Datensatz importiert.','%d DatensÃ¤tze wurden importiert.'),$ra),$J);$m->rollback();}}}$bf=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('Daten zeigen von'.": $bf",$n);$P=null;if(isset($ye["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if(count($gc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".'Auswahl der Tabelle fehlgeschlagen'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($N,$f);$b->selectSearchPrint($Z,$f,$x);$b->selectOrderPrint($E,$f,$x);$b->selectLimitPrint($_);$b->selectLengthPrint($hf);$b->selectActionPrint($x);echo"</form>\n";$F=$_GET["page"];if($F=="last"){$jc=$g->result(count_rows($a,$Z,$Oc,$s));$F=floor(max(0,$jc-1)/$_);}$Ee=$N;if(!$Ee){$Ee[]="*";if($Cd)$Ee[]=$Cd;}$gb=convert_fields($f,$p,$N);if($gb)$Ee[]=substr($gb,2);$J=$m->select($a,$Ee,$Z,$s,$E,$_,$F,true);if(!$J)echo"<p class='error'>".error()."\n";else{if($y=="mssql"&&$F)$J->seek($_*$F);$Gb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$M=array();while($L=$J->fetch_assoc()){if($F&&$y=="oracle")unset($L["RNUM"]);$M[]=$L;}if($_GET["page"]!="last"&&+$_&&$s&&$Oc&&$y=="sql")$jc=$g->result(" SELECT FOUND_ROWS()");if(!$M)echo"<p class='message'>".'Keine Daten.'."\n";else{$Ha=$b->backwardKeys($a,$bf);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$s&&$N?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$wd=array();$nc=array();reset($N);$ne=1;foreach($M[0]as$z=>$X){if($z!=$Cd){$X=$_GET["columns"][key($N)];$o=$p[$N?($X?$X["col"]:current($N)):$z];$D=($o?$b->fieldName($o,$ne):($X["fun"]?"*":$z));if($D!=""){$ne++;$wd[$z]=$D;$e=idf_escape($z);$zc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($z);$qb="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($zc.($E[0]==$e||$E[0]==$z||(!$E&&$Oc&&$s[0]==$e)?$qb:'')).'">';echo
apply_sql_function($X["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($zc.$qb)."' title='".'absteigend'."' class='text'> â†“</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($z)).'\'); return false;" title="'.'Suchen'.'" class="text jsonly"> =</a>';echo"</span>";}$nc[$z]=$X["fun"];next($N);}}$cd=array();if($_GET["modify"]){foreach($M
as$L){foreach($L
as$z=>$X)$cd[$z]=max($cd[$z],min(40,strlen(utf8_decode($X))));}}echo($Ha?"<th>".'Relationen':"")."</thead>\n";if(is_ajax()){if($_%2==1&&$F%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($M,$gc)as$C=>$L){$Cf=unique_array($M[$C],$x);if(!$Cf){$Cf=array();foreach($M[$C]as$z=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$z))$Cf[$z]=$X;}}$Df="";foreach($Cf
as$z=>$X){if(($y=="sql"||$y=="pgsql")&&strlen($X)>64){$z="MD5(".(strpos($z,'(')?$z:idf_escape($z)).")";$X=md5($X);}$Df.="&".($X!==null?urlencode("where[".bracket_escape($z)."]")."=".urlencode($X):"null%5B%5D=".urlencode($z));}echo"<tr".odd().">".(!$s&&$N?"":"<td>".checkbox("check[]",substr($Df,1),in_array(substr($Df,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Oc||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Df)."'>".'Ã¤ndern'."</a>"));foreach($L
as$z=>$X){if(isset($wd[$z])){$o=$p[$z];if($X!=""&&(!isset($Gb[$z])||$Gb[$z]!=""))$Gb[$z]=(is_mail($X)?$wd[$z]:"");$A="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$A=ME.'download='.urlencode($a).'&field='.urlencode($z).$Df;if(!$A&&$X!==null){foreach((array)$gc[$z]as$q){if(count($gc[$z])==1||end($q["source"])==$z){$A="";foreach($q["source"]as$t=>$Oe)$A.=where_link($t,$q["target"][$t],$M[$C][$Oe]);$A=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$A;if(count($q["source"])==1)break;}}}if($z=="COUNT(*)"){$A=ME."select=".urlencode($a);$t=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Cf))$A.=where_link($t++,$W["col"],$W["val"],$W["op"]);}foreach($Cf
as$Qc=>$W)$A.=where_link($t++,$Qc,$W);}$X=select_value($X,$A,$o,$hf);$u=h("val[$Df][".bracket_escape($z)."]");$Y=$_POST["val"][$Df][bracket_escape($z)];$Cb=!is_array($L[$z])&&is_utf8($X)&&$M[$C][$z]==$L[$z]&&!$nc[$z];$gf=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$Cb)||$Y!==null){$qc=h($Y!==null?$Y:$L[$z]);echo"<td>".($gf?"<textarea name='$u' cols='30' rows='".(substr_count($L[$z],"\n")+1)."'>$qc</textarea>":"<input name='$u' value='$qc' size='$cd[$z]'>");}else{$gd=strpos($X,"<i>...</i>");echo"<td id='$u' onclick=\"selectClick(this, event, ".($gd?2:($gf?1:0)).($Cb?"":", '".h('Benutzen Sie den Link zum editieren dieses Wertes.')."'").");\">$X";}}}if($Ha)echo"<td>";$b->backwardKeysPrint($Ha,$M[$C]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($M||$F)&&!is_ajax()){$Ob=true;if($_GET["page"]!="last"){if(!+$_)$jc=count($M);elseif($y!="sql"||!$Oc){$jc=($Oc?false:found_rows($S,$Z));if($jc<max(1e4,2*($F+1)*$_))$jc=reset(slow_query(count_rows($a,$Z,$Oc,$s)));else$Ob=false;}}if(+$_&&($jc===false||$jc>$_||$F)){echo"<p class='pages'>";$ld=($jc===false?$F+(count($M)>=$_?2:1):floor(($jc-1)/$_));if($y!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".'Seite'."', '".($F+1)."'), event); return false;\">".'Seite'."</a>:",pagination(0,$F).($F>5?" ...":"");for($t=max(1,$F-4);$t<min($ld,$F+5);$t++)echo
pagination($t,$F);if($ld>0){echo($F+5<$ld?" ...":""),($Ob&&$jc!==false?pagination($ld,$F):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$ld'>".'letzte'."</a>");}echo(($jc===false?count($M)+1:$jc-$F*$_)>$_?' <a href="'.h(remove_from_uri("page")."&page=".($F+1)).'" onclick="return !selectLoadMore(this, '.(+$_).', \''.'Loading'.'...\');" class="loadmore">'.'Load more data'.'</a>':'');}else{echo'Seite'.":",pagination(0,$F).($F>1?" ...":""),($F?pagination($F,$F):""),($ld>$F?pagination($F+1,$F).($ld>$F+1?" ...":""):"");}}echo"<p class='count'>\n",($jc!==false?"(".($Ob?"":"~ ").lang(array('%d Datensatz','%d DatensÃ¤tze'),$jc).") ":"");$vb=($Ob?"":"~ ").$jc;echo
checkbox("all",1,0,'Gesamtergebnis',"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$vb' : checked); selectCount('selected2', this.checked || !checked ? '$vb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Speichern"',($_GET["modify"]?'':' title="'.'Ctrl+klick zum Bearbeiten des Wertes.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Ã„ndern">
<input type="submit" name="clone" value="Klonen">
<input type="submit" name="delete" value="Entfernen"',confirm(),'>
</div></fieldset>
';}$hc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($hc['sql']);break;}}if($hc){print_fieldset("export",'Exportieren'." <span id='selected2'></span>");$Pd=$b->dumpOutput();echo($Pd?html_select("output",$Pd,$qa["output"])." ":""),html_select("format",$hc,$qa["format"])," <input type='submit' name='export' value='".'Exportieren'."'>\n","</div></fieldset>\n";}echo(!$s&&$N?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",'Importieren',!$M);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$qa["format"],1);echo" <input type='submit' name='import' value='".'Importieren'."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Gb,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$rf'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$g->query("KILL ".(+$_POST["kill"]));elseif(list($R,$u,$D)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$_=11;$J=$g->query("SELECT $u, $D FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$u = $_GET[value] OR ":"")."$D LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $_");for($t=1;($L=$J->fetch_row())&&$t<$_;$t++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($u))."]")."=".urlencode($L[0]))."'>".h($L[1])."</a><br>\n";if($L)echo"...\n";}exit;}else{page_header('Server',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Suche in Tabellen'.": <input name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Suchen'."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^tables\[/);"><th>'.'Tabelle'.'<td>'.'DatensÃ¤tze'."</thead>\n";foreach(table_status()as$R=>$L){$D=$b->tableName($L);if(isset($L["Engine"])&&$D!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true),"","formUncheck('check-all');"),"<th><a href='".h(ME).'select='.urlencode($R)."'>$D</a>";$X=format_number($L["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($L["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","</form>\n";}}page_footer();