<?php
/** Adminer Editor - Compact database editor
* @link http://www.adminer.org/
* @author Jakub Vrana, http://www.vrana.cz/
* @copyright 2009 Jakub Vrana
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.1.0
*/error_reporting(6135);$bc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($bc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Hf=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Hf)$$X=$Hf;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1̇�ٌ�l7��B1�4vb0��fs���n2B�ѱ٘�n:�#(�b.\rDc)��a7E����l�ñ��i1̎s���-4��f�	��i7������Fé�vt2���!�r0���t~�U�'3M��W�B�'c�P�:6T\rc�A�zr_�WK�\r-�VNFS%~�c���&�\\^�r����u�ŎÞ�ً4'7k����Q��h�'g\rFB\ryT7SS�P�1=ǤcI��:�d��m>�S8L�J��t.M���	ϋ`'C����889�� �Q����2�#8А����6m����j��h�<�����9/��:�J�)ʂ�\0d>!\0Z��v�n��o(���k�7��s��>��!�R\"*nS�\0@P\"��(�#[���@g�o���zn�9k�8�n���1�I*��=�n������0�c(�;�à��!���*c��>Ύ�E7D�LJ��1�J=���1L��?�s=#`�3\$4���uȱ��zG�C YAt�?;�Q�k&��YP�u��ǯ}UaHV%G;�s��<A\0\\��P�\\��&ª�V��\n�SU�t���r���2�	l^�Z6�ej����A�d�[�sն�JP����ҝ��8�=����6#˂74*���#e���!�7{�6��<o�C�9v[�M��-`��k�>�l�ڴ��I��H�3�x����w0t6��%MR%��jh�B�<�\0�AQ<P<:��u/�;\\>��-��ʈ��QH\nv�L+v�æ�<�\r��v����\\*����Ӵݢg��n˩��TЩ2P�\r��ߋ\"+z�8���:#�����2��J[�i����;z�����r�3#�ى�:�n�\r㽃e�pdݍ� �2c��4�k���\rG��E6_����މb��/��HB%�0�>���hoW�nxl֍�浃CQ^�������\r����4lK{�Z��:���Ã�.�p��Ă�J�B-�+B���(�T�%��J�0�l�T�`+�-��@B��ۄV��\0��C�,�0t���F���?Ġ�\na@Ɍ>��ZEC��O�-���^Q�&���)I)�����R�]\r��9�7_��\r�F80�Ob�	���>���\nR�_��8��٫�ov0�bCA�F!�t��ă%0�/�zAYO(4������	'�] I��8hH�05�3�@x&n��|T���)`�.�s6eY�D�z�����Jѓ��.��{GEb��Ӌ����2��{\$**��@�C��-:zYHZI��5F]��Y��C�O�A����`x'�.*9t'{�(�wP����=�*���*�xwr��*c���c|�D���V��\r�V.�0���V�d�?Ҁ��,E͝`T��6ۈ-����ڎT[ѐ�z��.Ar��̀P��n�c=a�9F�n�!�u��A���0iP��J6e�T]V�[\rX��a��v�k�\n+E���ܕ*\0�~���@g\"�NCI\$��Ɍ���x@W�y�*vuD�\0�v�댆V\0�V`G�u�E�֕��f�l�h�@�)0@�T��7���§RA�ٷ�3ۘ��/Q�]�,s�{VR�����F���A��<�vץ�%@9��F��5t�%�+�/�8;�W����J��o:�N�`�	����h��{ܣ�� �Ԑ8�Eu�&�W|Ɇ���U�&\r\"����|-uǆ�N��:nc��fV����#U20�>\"���>�`�k]�-��x�S�͇Т����c��B��}�&`��r+E��\$�yN���b,���Wx ��-9��r�,��`�+���ˊ��C��)��7�x\r��W�fM�SR�\\�z��Q�̓��uA���2���4�L&�Hi µ���S\$)e���g rȌ��\$]Z�iYs���kW�n>�7E1k8�d�r�k����E���w�wcm�Ty����a�\$tx\rB��=����*�<���l�f�K��N/���	�l���kH��8�.���?f�����6�ч�{gi/\"�@��K��@2��a|#,Z���	��w�d�������6w�^&��t��P�����]���.����T��kro����\ro=�%��h`:\0᱂����|ꊣ�a�Ԯ6*:��*��rO-^����n���M�}���Aya���\n�u^��rnO\r���`�T~</�w�y�}�:�|�����̡6������v�\rc<�b#������\$�s��|燇V)�h�TC��(Ľ���}");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:��gCI��\n0��S��a9��S`�����&�(��n0���QI��f��\$�At^ s�G��tf6e��y��()L�S��P'�����R'�fq]\"�s>	)�`�H2�Eq9��?�*)��t'��ϧ�\n	\r�s<�Pi2IN��*(=2�gX��.3�N�Y4�B<�L���i�̥2��z=�0H���'�ꌚ�u�tt:������e�]`pX9��o5�g��I��,2O4��х�M�S�(�a��#������|�G�b���x�^Z[��G��uTv�(ҝm@V�(���bN<��`��X�1�+��9J8�2\r�K�9�h�	���`�����I8䛱S���t�2�+,��I�� ��p�9a���< \\8Cz��\r��^���]�1\\7�C8_Ep^����M1�w\"'4f�SX9ES|䛅�k3�B@��Xa=No4t7��dD3�p����:)\\;�����\r)8H��44Pc=\n�!pd��QN\r�H�'����2�#\"եm-�b,�	�M.���-IK�)��e'��\"���>2X�œe�j:9^�1c���ȝ�:Y�@�u�㓛4�X�&��|�)ђ��-K�x����S��1��\$��@\\�!x]\0��������F�CO�:�1K��*�F4a���k���KϚ����2l�p�3J<��,2��8#� ��\r����� �h����F��݉2P����l(�\$ְ\nJ۷-��ǰcc~�F���r��tb���m{h�.�{�tk�B�Kc�z4�C�9�۫~>�����`Ɠ�C �s:���!c���ڵ�*W�HX:W��;N���j*�/(�_p3��HI�Kl�n!tr�G㭺�tC�	v�?m㤣�����\0C����oܥcbf6I��'\r�b��7h�`��9�i�d5��taM�={ɩ�`NoK�	!d4��zWXdmH��*���S ]��3&\0ڰ	d%A�-��	��(�������Q�}���U!t7�䋆�>x��t{mY��0�@^��\"�=���@t\r����+Y�.���X�\n�I'KT��^(�D.@���++@�3���X�	aE�!,�Y��2-432Ԍ�MO��I\$q%	ċG�X9���[R\0n��и P�Jy\r �B�p\\H�pgSɼ�Faejk�.4��C.^�yi��9�PĈe\"ΔNY���BH�#8�B1\"�j\\کx��#��@G 9�2��f.Ќpsr�TJ�x�k���4KIl�f�8z��Kȇ>AK�n^��=&��A��*?'��^%;��4܀���9��Q��h�N��>M�=['�vHI�J�����v��R�t��<��Ҳ�^��z�B^�h�'��ɩ�)-'#��9JT�)�@jO!��c,e�j����@H,���j�a��v�Z�>��ҷ�)E`\0\n��T�P�8L<�c�:F��\$\n��휆��CHm\"�j�y�A�S���S��Q����{T']W��U�)_L��i�m�O������P:g�{��Zė�.�{���Dh\n����a�\r]9�t��!XA�[Ȱ��C��ׁ\n:��ha����\"ݢa2Lm���\\	��p5�@��@m��|W����%�|u���+hK�L&�� �3�.XW�ٺ���*q��c��%�.K����_�)�u�2W\$O]�d8���g�?mFy�ly�%Ӊ����DQ��.uĲ�������L��,����3��j�0t	a�<�\0Pr�mNs8ٌk>M9,����B���x�უzo���uB?`����&�I�<����e�Y�s��zԇ*�.'t����z�)m*4X=�tI=�nѦy�ޚ��c2��`����.Y���:��K�N��r06�_rJ��k�tO�|^͈��z\nϿ鱕�<W�1n.�X�`��g�VG4Z��r�!����Y[���z:L�D��@T	�0�`���pjSn\"Y��g	�`�}Ě����\n\n�4��\rg��O7ܿb��y��)�E���)w>�~ur���29h�t�gB#�����F�p(�@�`u0�у(flG�a0bZ7J@�I_PZ��yq^��7���G�3d�����3�铄0�����{ָ����a6�P��4W	�d:���W\n�t4���.��D�y�ȧ�85��AM�L�Xw5�ese���C	#���rrY�	Ǯ!�����唟@/\r� �0�wEl\"�O�W�<Q��۠�Ek��SQi�d��\\k٬��8���H����\"�bL}�%�	��-^� _�h\nF�-.�2nj���VM�xnj��m\\\$����*\n���'�~� Z@�����V��L\"���p��5��O,����˹\0\n��-0�\r4�p��b�0f�p�mg�i��O�.(�P9�APH+�NHpf��4?B�M��JF��.���\0�����i�jƀP�+(�&��a��%l]'��l^@(�5�N fs�������bz ��e>�p���k �D�\r4a�N��Y({�D��nƆ���>jĨ1��	��<�l-�x��\r�G�O	Qw��qw�c�P�b\r�̶��	�����d�6����s�ࢎ����ж�r��j>��J����Ȯ�b�3�(F��zސ��r�`O��X��\rZ�q�\r �1\$���gk�l��r+���kf�'�5�8�4�6�\0�-�.i~4�E<\$�J�lru2F;Bn<�%#lq%��	b=��#L�(HJ1b%\r縼�z�����G2��^8w��^%�� ���G�*g�7D\0^�r�c��p��L,����*�Xr�\$ �8��,�*�D�����`�\n���Z���s1l�1�\\{��.I~`�*3���]1�F͑1X	-�%#���S3L�l6\$Cr�C/��\r�%,�|��� Ȇǌ�� �su8�J���䬗9��h���N�����.���P�Ft��\$�3\n�FB/�=4�-����͏9�# O:I��]#�7B��,:��<�N�D�@�R��\n��#��z�%8i:\0�z�' Y�*�&��/K�֦���U4�z�a>4�\0�f*\0�*TK02�<�0Sf���?D�a4X-�u�j\$E6\0N�i����\n�c9�H����HIb��F�����s�R~t�I���3����L�;%	0p.B�FBnMK��R�sD�'�a��������D\r1�O�\0����s�gL^̅���O>l��C<D�H�-4<��\"V]`�/B��U&�ӹ-#w;�^�M��r�q�0�-�o�~pK���	p���\nq�,4�W�\$F�nl\0�M�L�\n��-�m�\0�)�Z@�Z������^@�	��&Սd���]`�����t\r��'\$^R�'�O]��SЬ�3�5ⓘF\"Q[u�[�H\$�o`6Zu��mo[��]�X�T�	�]�Ҟ��\\c�b�:�b�U\0�W2�Vb��e�2/�d%<YRt7�'f�0�u�ru�h�U@cTs�V��gF��{_-_P�E��T:{��V�d����-�Ic���ȁ��M���iv�� J�\0m3@JX�RMU_���p�5)k�kl-\$,Ɠ\r&�\r���O�(o��k+r� �\\�P7\"*^�P�\rc�<>��t#~R�\"�en� ��s���;�D	�It��up t@��8d\0�@�lTw�r �ww�~ b�	��J ��u�\n��, u;jַ7s��{*�o�>q�<-\0�	�\n����|¹rc��v7�i7O{EC�(�1�p�y�҇n������Z��[r>8�X����{��~j�~��(��(Y`��7_»z%vd�'�%.�\$w/.=�p�&����8V5R=�N�4��(��fu���Jl�j�u`zXQ.�X!������k�q�rp��~��~T���i�c�fn��x��@�S��3*�6��b ���ؤݐ�r�pp��n=)ƭ�\0��L�(L��n�/�-88�s\0zg��\n��L��K�S!m�&����\"���b8}BXZy,ͦd _X���^\r1�z���BuW�7�;s8ly^B�����fZ`�������FyYg��!��	Pl횣O8�f<I�,���\n@���ۍdp4j\0*�\r�l]�y�\r��[=��?+�,'N��}TYs\$w�f�ɛ��\r�D(�M#\$�h�_ey���+�\"K�4\0zY�D�]�.�*�x�����rL�И]\rj ^�@�)���\r��Qrr'p0����\\P�,\"�-sɒPÊ��q�o�w����Ť'�%y�cύ�v�,\rK���P�U@�珈�A�2��ȥq|��	2\r�\"�Ci���?.���@��<���0��Q�t�ty=D�[F�pG\0Rٳ����'Q@-6�2��*�/@P���d;7[�ؒ!\"z�S�-~o[�D!*�Ʈ0N4	�1�1�8��{l\$D�	G�|G\$v!r��-3T�m�ę�\r��q0̽N��n�H�SF d�QR����c��͇ղS\rcC.n��iBx-l�v��@��ᛎ!(�H�X�c�g(���#%�Cn�(P�G9��\"1�7�DG�۲1�So8��S��q�.��p��P h�e��0֬k+�@�c�RG�h� �L���/��`V.FA^\\l����5\0��`\0�E|C�jImPty�AnGu'p�d-����05p��&�I�u%�\nO�<|2\$��@�\r�FDR�^`1���f9�`�/�� �V���;e�\0<<���e�dϲ��1Ҳ����k����D�4V�Yу���������w���kp��;�r�Ɗ�^\ni��\0����c:��)�y�\0zYvz9�]��⫡`W��Y�͝�փ��͋���ؗ�pe��#��1��f���ڵ�']ĵ�?]ĉ-����=�����8�oT�W=���\r���\\ѭl��y���������֌q=!^��⏅�fq��Z���\0V�]=�F��x�n`�\r�?�t�XQɑ��tZnq<�J\$c����<�����v��k����e֮�\$�^u�^�)i���矗�w�nߪ��S�<�>��G���3�. �<���7���Ĝ�mޥV�iwמ� �0�/\n\r%1�\0y�K���E��\r��Ⳛ�ޠ�����޸�e�NL����:C�'?�~��6 ��\$}�jf��R\r�WD��.T\n��N�T�}�_��E|퓗U�}�O'��I�,ʖ7Ϳ���:h������\$�Z0��DV�`t Xn�v�jG�s�9l�����B�㓐��rSF<;�g%v(���(Q��ץP(�\nFl���?j\0o݀3��{�dx�����f��b��W-޸,Qu�,+��a.Y���l[��%�WSx�\\�	�D�G,�l��]@L��\" �|p�?l�Za�8���0!�/�ºo�\$�v�ց��`rߣ��G\0�,���	�0YPN��'0��U��W�0B���2Ag0gD�M�B4�&1�ɚ����w�������!�0��`-�7�F)+��(\0007(r�\$9��Lŀ����T���L�=\"��KQ.N<�X@�}�+ �@��Ȧ�,�������f��~��D/ŘjhZǊ��Cp�A��2C��� f=`�*�|-�s�K;,��\rPxT\"}��C5k�]O����Ύ��!�m�_�F	P~�BR���@\0l�_��~�����%bi}�#\$��k�:a�D���!aR�ٴ��#7�͑ o�[,�����G�[���N���.�*P9���wz c,�g#���q�>�XHjZ��s��1�Sx�E�Lӈ�<\"�إZb���i��b�D�C�nN)(��X�5¼\n)14R�M�s1�D�MM\\����x��;l���@�L!@<lP��)�`@�08;��b��0sCO�DE���ID�[��q��F!�n�cc�\"�H��)eP�b����3�K�rI��5Z��X��r*���Œ-a:R���C�����.�g����㣾�	�DTQ��H'�#��˺=�͉�");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress(compile_file('','minify_js'));}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0!�����M��*)�o��) q��e���#��L�\0;";break;case"cross.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0#�����#\na�Fo~y�.�_wa��1�J�G�L�6]\0\0;";break;case"up.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����MQN\n�}��a8�y�aŶ�\0��\0;";break;case"down.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����M��*)�[W�\\��L&ٜƶ�\0��\0;";break;case"arrow.gif":echo"GIF89a\0\n\0�\0\0������!�\0\0\0,\0\0\0\0\0\n\0\0�i������Ӳ޻\0\0;";break;}}exit;}function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
idf_unescape($v){$bd=substr($v,-1);return
str_replace($bd.$bd,$bd,substr($v,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
remove_slashes($je,$bc=false){if(get_magic_quotes_gpc()){while(list($z,$X)=each($je)){foreach($X
as$Sc=>$W){unset($je[$z][$Sc]);if(is_array($W)){$je[$z][stripslashes($Sc)]=$W;$je[]=&$je[$z][stripslashes($Sc)];}else$je[$z][stripslashes($Sc)]=($bc?$W:stripslashes($W));}}}}function
bracket_escape($v,$Fa=false){static$vf=array(':'=>':1',']'=>':2','['=>':3');return
strtr($v,($Fa?array_flip($vf):$vf));}function
h($Q){return
htmlspecialchars(str_replace("\0","",$Q),ENT_QUOTES);}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($D,$Y,$Ra,$Yc="",$Id="",$Va=""){$K="<input type='checkbox' name='$D' value='".h($Y)."'".($Ra?" checked":"").($Id?' onclick="'.h($Id).'"':'').">";return($Yc!=""||$Va?"<label".($Va?" class='$Va'":"").">$K".h($Yc)."</label>":$K);}function
optionlist($Nd,$Ie=null,$Nf=false){$K="";foreach($Nd
as$Sc=>$W){$Od=array($Sc=>$W);if(is_array($W)){$K.='<optgroup label="'.h($Sc).'">';$Od=$W;}foreach($Od
as$z=>$X)$K.='<option'.($Nf||is_string($z)?' value="'.h($z).'"':'').(($Nf||is_string($z)?(string)$z:$X)===$Ie?' selected':'').'>'.h($X);if(is_array($W))$K.='</optgroup>';}return$K;}function
html_select($D,$Nd,$Y="",$Hd=true){if($Hd)return"<select name='".h($D)."'".(is_string($Hd)?' onchange="'.h($Hd).'"':"").">".optionlist($Nd,$Y)."</select>";$K="";foreach($Nd
as$z=>$X)$K.="<label><input type='radio' name='".h($D)."' value='".h($z)."'".($z==$Y?" checked":"").">".h($X)."</label>";return$K;}function
select_input($Ba,$Nd,$Y="",$ae=""){return($Nd?"<select$Ba><option value=''>$ae".optionlist($Nd,$Y,true)."</select>":"<input$Ba size='10' value='".h($Y)."' placeholder='$ae'>");}function
confirm(){return" onclick=\"return confirm('".lang(0)."');\"";}function
print_fieldset($u,$dd,$Uf=false,$Id=""){echo"<fieldset><legend><a href='#fieldset-$u' onclick=\"".h($Id)."return !toggle('fieldset-$u');\">$dd</a></legend><div id='fieldset-$u'".($Uf?"":" class='hidden'").">\n";}function
bold($Na,$Va=""){return($Na?" class='active $Va'":($Va?" class='$Va'":""));}function
odd($K=' class="odd"'){static$t=0;if(!$K)$t=-1;return($t++%2?$K:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($z,$X=null){static$cc=true;if($cc)echo"{";if($z!=""){echo($cc?"":",")."\n\t\"".addcslashes($z,"\r\n\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'undefined');$cc=false;}else{echo"\n}\n";$cc=true;}}function
ini_bool($Jc){$X=ini_get($Jc);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$K;if($K===null)$K=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$K;}function
set_password($Qf,$O,$V,$H){$_SESSION["pwds"][$Qf][$O][$V]=($_COOKIE["adminer_key"]&&is_string($H)?array(encrypt_string($H,$_COOKIE["adminer_key"])):$H);}function
get_password(){$K=get_session("pwds");if(is_array($K))$K=($_COOKIE["adminer_key"]?decrypt_string($K[0],$_COOKIE["adminer_key"]):false);return$K;}function
q($Q){global$n;return$n->quote($Q);}function
get_vals($I,$e=0){global$h;$K=array();$J=$h->query($I);if(is_object($J)){while($L=$J->fetch_row())$K[]=$L[$e];}return$K;}function
get_key_vals($I,$i=null,$nf=0){global$h;if(!is_object($i))$i=$h;$K=array();$i->timeout=$nf;$J=$i->query($I);$i->timeout=0;if(is_object($J)){while($L=$J->fetch_row())$K[$L[0]]=$L[1];}return$K;}function
get_rows($I,$i=null,$o="<p class='error'>"){global$h;$eb=(is_object($i)?$i:$h);$K=array();$J=$eb->query($I);if(is_object($J)){while($L=$J->fetch_assoc())$K[]=$L;}elseif(!$J&&!is_object($i)&&$o&&defined("PAGE_HEADER"))echo$o.error()."\n";return$K;}function
unique_array($L,$x){foreach($x
as$w){if(preg_match("~PRIMARY|UNIQUE~",$w["type"])){$K=array();foreach($w["columns"]as$z){if(!isset($L[$z]))continue
2;$K[$z]=$L[$z];}return$K;}}}function
where($Z,$q=array()){global$y;$K=array();$oc='(^[\w\(]+('.str_replace("_",".*",preg_quote(idf_escape("_"))).')?\)+$)';foreach((array)$Z["where"]as$z=>$X){$z=bracket_escape($z,1);$e=(preg_match($oc,$z)?$z:idf_escape($z));$K[]=$e.(($y=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X))||$y=="mssql"?" LIKE ".q(addcslashes($X,"%_\\")):" = ".unconvert_field($q[$z],q($X)));if($y=="sql"&&preg_match('~char|text~',$q[$z]["type"])&&preg_match("~[^ -@]~",$X))$K[]="$e = ".q($X)." COLLATE utf8_bin";}foreach((array)$Z["null"]as$z)$K[]=(preg_match($oc,$z)?$z:idf_escape($z))." IS NULL";return
implode(" AND ",$K);}function
where_check($X,$q=array()){parse_str($X,$Qa);remove_slashes(array(&$Qa));return
where($Qa,$q);}function
where_link($t,$e,$Y,$Kd="="){return"&where%5B$t%5D%5Bcol%5D=".urlencode($e)."&where%5B$t%5D%5Bop%5D=".urlencode(($Y!==null?$Kd:"IS NULL"))."&where%5B$t%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$q,$N=array()){$K="";foreach($f
as$z=>$X){if($N&&!in_array(idf_escape($z),$N))continue;$ya=convert_field($q[$z]);if($ya)$K.=", $ya AS ".idf_escape($z);}return$K;}function
cookie($D,$Y,$gd=2592000){global$aa;$G=array($D,(preg_match("~\n~",$Y)?"":$Y),($gd?time()+$gd:0),preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;return
call_user_func_array('setcookie',$G);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($z){return$_SESSION[$z][DRIVER][SERVER][$_GET["username"]];}function
set_session($z,$X){$_SESSION[$z][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Qf,$O,$V,$m=null){global$yb;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($yb))."|username|".($m!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Qf!="server"||$O!=""?urlencode($Qf)."=".urlencode($O)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($hd,$rd=null){if($rd!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($hd!==null?$hd:$_SERVER["REQUEST_URI"]))][]=$rd;}if($hd!==null){if($hd=="")$hd=".";header("Location: $hd");exit;}}function
query_redirect($I,$hd,$rd,$se=true,$Qb=true,$Vb=false,$mf=""){global$h,$o,$b;if($Qb){$Ue=microtime(true);$Vb=!$h->query($I);$mf=format_time($Ue);}$Se="";if($I)$Se=$b->messageQuery($I,$mf);if($Vb){$o=error().$Se;return
false;}if($se)redirect($hd,$rd.$Se);return
true;}function
queries($I){global$h;static$me=array();static$Ue;if(!$Ue)$Ue=microtime(true);if($I===null)return
array(implode("\n",$me),format_time($Ue));$me[]=(preg_match('~;$~',$I)?"DELIMITER ;;\n$I;\nDELIMITER ":$I).";";return$h->query($I);}function
apply_queries($I,$T,$Nb='table'){foreach($T
as$R){if(!queries("$I ".$Nb($R)))return
false;}return
true;}function
queries_redirect($hd,$rd,$se){list($me,$mf)=queries(null);return
query_redirect($me,$hd,$rd,$se,false,!$se,$mf);}function
format_time($Ue){return
lang(1,max(0,microtime(true)-$Ue));}function
remove_from_uri($Ud=""){return
substr(preg_replace("~(?<=[?&])($Ud".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($F,$lb){return" ".($F==$lb?$F+1:'<a href="'.h(remove_from_uri("page").($F?"&page=$F".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($F+1)."</a>");}function
get_file($z,$ob=false){$Yb=$_FILES[$z];if(!$Yb)return
null;foreach($Yb
as$z=>$X)$Yb[$z]=(array)$X;$K='';foreach($Yb["error"]as$z=>$o){if($o)return$o;$D=$Yb["name"][$z];$tf=$Yb["tmp_name"][$z];$gb=file_get_contents($ob&&preg_match('~\\.gz$~',$D)?"compress.zlib://$tf":$tf);if($ob){$Ue=substr($gb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Ue,$te))$gb=iconv("utf-16","utf-8",$gb);elseif($Ue=="\xEF\xBB\xBF")$gb=substr($gb,3);$K.=$gb."\n\n";}else$K.=$gb;}return$K;}function
upload_error($o){$od=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($o?lang(2).($od?" ".lang(3,$od):""):lang(4));}function
repeat_pattern($Yd,$ed){return
str_repeat("$Yd{0,65535}",$ed/65535)."$Yd{0,".($ed%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$ed=80,$af=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{FFFF}]",$ed).")($)?)u",$Q,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ed).")($)?)",$Q,$B);return
h($B[1]).$af.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",lang(5)),preg_split('~~u',lang(6),-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($je,$Dc=array()){while(list($z,$X)=each($je)){if(!in_array($z,$Dc)){if(is_array($X)){foreach($X
as$Sc=>$W)$je[$z."[$Sc]"]=$W;}else
echo'<input type="hidden" name="'.h($z).'" value="'.h($X).'">';}}}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$Wb=false){$K=table_status($R,$Wb);return($K?$K:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$K=array();foreach($b->foreignKeys($R)as$hc){foreach($hc["source"]as$X)$K[$X][]=$hc;}return$K;}function
enum_input($U,$Ba,$p,$Y,$Ib=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$C);$K=($Ib!==null?"<label><input type='$U'$Ba value='$Ib'".((is_array($Y)?in_array($Ib,$Y):$Y===0)?" checked":"")."><i>".lang(7)."</i></label>":"");foreach($C[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ra=(is_int($Y)?$Y==$t+1:(is_array($Y)?in_array($t+1,$Y):$Y===$X));$K.=" <label><input type='$U'$Ba value='".($t+1)."'".($Ra?' checked':'').'>'.h($b->editVal($X,$p)).'</label>';}return$K;}function
input($p,$Y,$r){global$h,$Cf,$b,$y;$D=h(bracket_escape($p["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$wa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$wa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$wa);$r="json";}$xe=($y=="mssql"&&$p["auto_increment"]);if($xe&&!$_POST["save"])$r=null;$pc=(isset($_GET["select"])||$xe?array("orig"=>lang(8)):array())+$b->editFunctions($p);$Ba=" name='fields[$D]'";if($p["type"]=="enum")echo
nbsp($pc[""])."<td>".$b->editInput($_GET["edit"],$p,$Ba,$Y);else{$cc=0;foreach($pc
as$z=>$X){if($z===""||!$X)break;$cc++;}$Hd=($cc?" onchange=\"var f = this.form['function[".h(js_escape(bracket_escape($p["field"])))."]']; if ($cc > f.selectedIndex) f.selectedIndex = $cc;\" onkeyup='keyupChange.call(this);'":"");$Ba.=$Hd;$uc=(in_array($r,$pc)||isset($pc[$r]));echo(count($pc)>1?"<select name='function[$D]' onchange='functionChange(this);'".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).">".optionlist($pc,$r===null||$uc?$r:"")."</select>":nbsp(reset($pc))).'<td>';$Lc=$b->editInput($_GET["edit"],$p,$Ba,$Y);if($Lc!="")echo$Lc;elseif($p["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$C);foreach($C[1]as$t=>$X){$X=stripcslashes(str_replace("''","'",$X));$Ra=(is_int($Y)?($Y>>$t)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$D][$t]' value='".(1<<$t)."'".($Ra?' checked':'')."$Hd>".h($b->editVal($X,$p)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$D'$Hd>";elseif(($jf=preg_match('~text|lob~',$p["type"]))||preg_match("~\n~",$Y)){if($jf&&$y!="sqlite")$Ba.=" cols='50' rows='12'";else{$M=min(12,substr_count($Y,"\n")+1);$Ba.=" cols='30' rows='$M'".($M==1?" style='height: 1.2em;'":"");}echo"<textarea$Ba>".h($Y).'</textarea>';}elseif($r=="json")echo"<textarea$Ba cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$qd=(!preg_match('~int~',$p["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$p["length"],$B)?((preg_match("~binary~",$p["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$p["unsigned"]?1:0)):($Cf[$p["type"]]?$Cf[$p["type"]]+($p["unsigned"]?0:1):0));if($y=='sql'&&$h->server_info>=5.6&&preg_match('~time~',$p["type"]))$qd+=7;echo"<input".((!$uc||$r==="")&&preg_match('~(?<!o)int~',$p["type"])?" type='number'":"")." value='".h($Y)."'".($qd?" maxlength='$qd'":"").(preg_match('~char|binary~',$p["type"])&&$qd>20?" size='40'":"")."$Ba>";}}}function
process_input($p){global$b;$v=bracket_escape($p["field"]);$r=$_POST["function"][$v];$Y=$_POST["fields"][$v];if($p["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($p["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($p["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($p["field"]):false);if($r=="NULL")$Y=null;if($p["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads")){$Yb=get_file("fields-$v");if(!is_string($Yb))return
false;return
q($Yb);}return$b->processInput($p,$Y,$r);}function
fields_from_edit(){global$n;$K=array();foreach((array)$_POST["field_keys"]as$z=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$z];$_POST["fields"][$X]=$_POST["field_vals"][$z];}}foreach((array)$_POST["fields"]as$z=>$X){$D=bracket_escape($z,1);$K[$D]=array("field"=>$D,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($z==$n->primary),);}return$K;}function
search_tables(){global$b,$h;$_GET["where"][0]["op"]="LIKE %%";$_GET["where"][0]["val"]=$_POST["query"];$kc=false;foreach(table_status('',true)as$R=>$S){$D=$b->tableName($S);if(isset($S["Engine"])&&$D!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$J=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$J||$J->fetch_row()){if(!$kc){echo"<ul>\n";$kc=true;}echo"<li>".($J?"<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$D</a>\n":"$D: <span class='error'>".error()."</span>\n");}}}echo($kc?"</ul>":"<p class='message'>".lang(9))."\n";}function
dump_headers($Bc,$wd=false){global$b;$K=$b->dumpHeaders($Bc,$wd);$Sd=$_POST["output"];if($Sd!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Bc).".$K".($Sd!="file"&&!preg_match('~[^0-9a-z]~',$Sd)?".$Sd":""));session_write_close();ob_flush();flush();return$K;}function
dump_csv($L){foreach($L
as$z=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$L[$z]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$L)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$K=ini_get("upload_tmp_dir");if(!$K){if(function_exists('sys_get_temp_dir'))$K=sys_get_temp_dir();else{$Zb=@tempnam("","");if(!$Zb)return
false;$K=dirname($Zb);unlink($Zb);}}return$K;}function
password_file($jb){$Zb=get_temp_dir()."/adminer.key";$K=@file_get_contents($Zb);if($K||!$jb)return$K;$mc=@fopen($Zb,"w");if($mc){$K=rand_string();fwrite($mc,$K);fclose($mc);}return$K;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$A,$p,$kf){global$b,$aa;if(is_array($X)){$K="";foreach($X
as$Sc=>$W)$K.="<tr>".($X!=array_values($X)?"<th>".h($Sc):"")."<td>".select_value($W,$A,$p,$kf);return"<table cellspacing='0'>$K</table>";}if(!$A)$A=$b->selectLink($X,$p);if($A===null){if(is_mail($X))$A="mailto:$X";if($ke=is_url($X))$A=(($ke=="http"&&$aa)||preg_match('~WebKit~i',$_SERVER["HTTP_USER_AGENT"])?$X:"$ke://www.adminer.org/redirect/?url=".urlencode($X));}$K=$b->editVal($X,$p);if($K!==null){if($K==="")$K="&nbsp;";elseif($kf!=""&&is_shortable($p)&&is_utf8($K))$K=shorten_utf8($K,max(0,+$kf));else$K=h($K);}return$b->selectVal($K,$A,$p,$X);}function
is_mail($Fb){$za='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$xb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Yd="$za+(\\.$za+)*@($xb?\\.)+$xb";return
is_string($Fb)&&preg_match("(^$Yd(,\\s*$Yd)*\$)i",$Fb);}function
is_url($Q){$xb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return(preg_match("~^(https?)://($xb?\\.)+$xb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q,$B)?strtolower($B[1]):"");}function
is_shortable($p){return
preg_match('~char|text|lob|geometry|point|linestring|polygon|string~',$p["type"]);}function
count_rows($R,$Z,$Qc,$s){global$y;$I=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Qc&&($y=="sql"||count($s)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$s).")$I":"SELECT COUNT(*)".($Qc?" FROM (SELECT 1$I$qc) x":$I));}function
slow_query($I){global$b,$uf;$m=$b->database();$nf=$b->queryTimeout();if(support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$Xc=$i->result("SELECT CONNECTION_ID()");echo'<script type="text/javascript">
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'token=',$uf,'&kill=',$Xc,'\');
}, ',1000*$nf,');
</script>
';}else$i=null;ob_flush();flush();$K=@get_key_vals($I,$i,$nf);if($i){echo"<script type='text/javascript'>clearTimeout(timeout);</script>\n";ob_flush();flush();}return
array_keys($K);}function
get_token(){$pe=rand(1,1e6);return($pe^$_SESSION["token"]).":$pe";}function
verify_token(){list($uf,$pe)=explode(":",$_POST["token"]);return($pe^$_SESSION["token"])==$uf;}function
lzw_decompress($Ka){$vb=256;$La=8;$Xa=array();$ze=0;$_e=0;for($t=0;$t<strlen($Ka);$t++){$ze=($ze<<8)+ord($Ka[$t]);$_e+=8;if($_e>=$La){$_e-=$La;$Xa[]=$ze>>$_e;$ze&=(1<<$_e)-1;$vb++;if($vb>>$La)$La++;}}$ub=range("\0","\xFF");$K="";foreach($Xa
as$t=>$Wa){$Eb=$ub[$Wa];if(!isset($Eb))$Eb=$Yf.$Yf[0];$K.=$Eb;if($t)$ub[]=$Yf.$Eb[0];$Yf=$Eb;}return$K;}function
on_help($bb,$Pe=0){return" onmouseover='helpMouseover(this, event, ".h($bb).", $Pe);' onmouseout='helpMouseout(this, event);'";}function
edit_form($a,$q,$L,$Kf){global$b,$y,$uf,$o;$ef=$b->tableName(table_status1($a,true));page_header(($Kf?lang(10):lang(11)),$o,array("select"=>array($a,$ef)),$ef);if($L===false)echo"<p class='error'>".lang(12)."\n";echo'<div id="message"></div>
<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$q)echo"<p class='error'>".lang(13)."\n";else{echo"<table cellspacing='0' onkeydown='return editingKeydown(event);'>\n";foreach($q
as$D=>$p){echo"<tr><th>".$b->fieldName($p);$pb=$_GET["set"][bracket_escape($D)];if($pb===null){$pb=$p["default"];if($p["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$pb,$te))$pb=$te[1];}$Y=($L!==null?($L[$D]!=""&&$y=="sql"&&preg_match("~enum|set~",$p["type"])?(is_array($L[$D])?array_sum($L[$D]):+$L[$D]):$L[$D]):(!$Kf&&$p["auto_increment"]?"":(isset($_GET["select"])?false:$pb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$p);$r=($_POST["save"]?(string)$_POST["function"][$D]:($Kf&&$p["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$p["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($p,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]' onkeyup='keyupChange.call(this);' onchange='fieldChange(this);' value=''>"."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($q){echo"<input type='submit' value='".lang(14)."'>\n";if(!isset($_GET["select"]))echo"<input type='submit' name='insert' value='".($Kf?lang(15)."' onclick='return !ajaxForm(this.form, \"".lang(16).'...", this)':lang(17))."' title='Ctrl+Shift+Enter'>\n";}echo($Kf?"<input type='submit' name='delete' value='".lang(18)."'".confirm().">\n":($_POST||!$q?"":"<script type='text/javascript'>focus(document.getElementById('form').getElementsByTagName('td')[1].firstChild);</script>\n"));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$uf,'">
</form>
';}global$b,$h,$yb,$Cb,$Kb,$o,$pc,$rc,$aa,$Kc,$y,$ba,$ad,$Gd,$Zd,$Xe,$vc,$uf,$xf,$Cf,$Jf,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";$aa=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);session_cache_limiter("");if(!defined("SID")){session_name("adminer_sid");$G=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$G[]=true;call_user_func_array('session_set_cookie_params',$G);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$bc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",20);$ad=array('en'=>'English','ar'=>'العربية','bn'=>'বাংলা','ca'=>'Català','cs'=>'Čeština','de'=>'Deutsch','es'=>'Español','et'=>'Eesti','fa'=>'فارسی','fr'=>'Français','hu'=>'Magyar','id'=>'Bahasa Indonesia','it'=>'Italiano','ja'=>'日本語','ko'=>'한국어','lt'=>'Lietuvių','nl'=>'Nederlands','no'=>'Norsk','pl'=>'Polski','pt'=>'Português','pt-br'=>'Português (Brazil)','ro'=>'Limba Română','ru'=>'Русский язык','sk'=>'Slovenčina','sl'=>'Slovenski','sr'=>'Српски','ta'=>'த‌மிழ்','th'=>'ภาษาไทย','tr'=>'Türkçe','uk'=>'Українська','vi'=>'Tiếng Việt','zh'=>'简体中文','zh-tw'=>'繁體中文',);function
get_lang(){global$ba;return$ba;}function
lang($v,$Cd=null){if(is_string($v)){$ce=array_search($v,get_translations("en"));if($ce!==false)$v=$ce;}global$ba,$xf;$wf=($xf[$v]?$xf[$v]:$v);if(is_array($wf)){$ce=($Cd==1?0:($ba=='cs'||$ba=='sk'?($Cd&&$Cd<5?1:2):($ba=='fr'?(!$Cd?0:1):($ba=='pl'?($Cd%10>1&&$Cd%10<5&&$Cd/10%10!=1?1:2):($ba=='sl'?($Cd%100==1?0:($Cd%100==2?1:($Cd%100==3||$Cd%100==4?2:3))):($ba=='lt'?($Cd%10==1&&$Cd%100!=11?0:($Cd%10>1&&$Cd/10%10!=1?1:2)):($ba=='ru'||$ba=='sr'||$ba=='uk'?($Cd%10==1&&$Cd%100!=11?0:($Cd%10>1&&$Cd%10<5&&$Cd/10%10!=1?1:2)):1)))))));$wf=$wf[$ce];}$wa=func_get_args();array_shift($wa);$jc=str_replace("%d","%s",$wf);if($jc!=$wf)$wa[0]=format_number($Cd);return
vsprintf($jc,$wa);}function
switch_lang(){global$ba,$ad;echo"<form action='' method='post'>\n<div id='lang'>",lang(19).": ".html_select("lang",$ad,$ba,"this.form.submit();")," <input type='submit' value='".lang(20)."' class='hidden'>\n","<input type='hidden' name='token' value='".get_token()."'>\n";echo"</div>\n</form>\n";}if(isset($_POST["lang"])&&verify_token()){cookie("adminer_lang",$_POST["lang"]);$_SESSION["lang"]=$_POST["lang"];$_SESSION["translations"]=array();redirect(remove_from_uri());}$ba="en";if(isset($ad[$_COOKIE["adminer_lang"]])){cookie("adminer_lang",$_COOKIE["adminer_lang"]);$ba=$_COOKIE["adminer_lang"];}elseif(isset($ad[$_SESSION["lang"]]))$ba=$_SESSION["lang"];else{$pa=array();preg_match_all('~([-a-z]+)(;q=([0-9.]+))?~',str_replace("_","-",strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"])),$C,PREG_SET_ORDER);foreach($C
as$B)$pa[$B[1]]=(isset($B[3])?$B[3]:1);arsort($pa);foreach($pa
as$z=>$le){if(isset($ad[$z])){$ba=$z;break;}$z=preg_replace('~-.*~','',$z);if(!isset($pa[$z])&&isset($ad[$z])){$ba=$z;break;}}}$xf=&$_SESSION["translations"];if($_SESSION["translations_version"]!=2282657289){$xf=array();$_SESSION["translations_version"]=2282657289;}function
get_translations($Zc){switch($Zc){case"en":$g="A9D�y�@s:�G�(�ff�����	��:�S���a2\"1�..L'�I��m�#�s,�K��OP#I�@%9��i4�o2ύ���,9�%�P�b2��a��r\n2�NC�(�r4��1C`(�:Eb�9A�i:�&㙔�y��F��Y��\r�\n� 8Z�S=\$A����`�=�܌���0�\n��dF�	��n:Zΰ)��Q�������Ak����}�e��AD���a�į���\\�}��5�#|@�h�3��N�}@��i����˞N�t��~9�����B؍�8�:-p���KX�9,�p�:�8��(�\0��(����R�,���@.��9�#����P��/�kz2�=-�(�߳�j��C�:����/����Zrxj��X�4M��;�P��0���#b�ʈ����L�|)���2�b���`��q�W\"��h1N�@�ƈ<h�H��C\$���Q�u�%\nX�	@t&��Ц)�B��U�\"��6��\$W@�Jk6��Cd	*Lh��*�*\r��d7(��:�c�9�è�E�\0X����C�KZ~��cp�΅�M�cKVRf������Œ�[��5B\\7��/c��6\r)�)�B3.7�q�\\P-��:az-i@��H=�gv���Y�-4���%ʍ�\"��k�c��8\r(�k����xSX�ܔ%J���D�M\$<f��\$cB3��=��^���\\�\\+�\\���|i�<Q���B92���/�����Jċ�àx�!�~�C@���Lx�F1�8�#N.͑q� @��5��	�@(	�����0@(JD��W�L�_�u��5��4��2T�%Ʌ�6��&�_�4��\"|��ɮ_ͺ���1�.��W=��bx�*�Å�I���(��F��ކu�o�\\7\$�p��fK�3\r,jP� �zfH� \$O\\3���	!�2d�#G<��bd���'%�Z�zG�\$�)��r{/�E�2�G�\"	(��BX<p���B�Hb��eQ��3d��,5G�X�Bf{a�\"h6���krl�:�f��C�\r!�d���NIM>��P��h8)���t\r\r		�Gp�#AL_�z�0F\")�t�`�x�dI���0_U��#��Ũ��!IYư܀����,ܼ��i'�k�F`6��w�V4h��ɂ��	�b�\nR������w�Q�����N	WI�\$���G�\"i	��H�R�h{��2\\~B��\nQ�\\f�Jzx_D�'���Hf�~\r&Zp�9�'(.";break;case"ar":$g="�C�P���l*�\r�,&\n�A���(J.��0T2]6QM��O�!b�#e�\\ɥ�\$�\\\nl+[\n�d�k4�O��&�ղ���Q)̅7lI���E\$�ʑ��m_7GT\r�eDك)*Vʙ�'T6U1�z�H�]N*PZ,�BT`����%VD�5�AU0�H�S�d!iQl(p(N���1�e4�nY7�D�	�� 7����i6L�S���:�����h4�N�栭�6I�Eq��n�h/�\\�QY2���n3�'���v	�le�������7�Ftl.n�l?O<B?��[%�!���Ez��-�k����)����@�\n<����n�������s\"B�!���*�\\�'�b�U'��H�A�U���ܑ�,�∮h���R��ti�+�c@p*a��g\0H(lz��hs��<n�����d���l��<OH\$=/'�Z�4,��!(ȂZG\"-�؁A j���8��tU��dE+(�C'ybΤeBq\n�il��FL\"F�N+�#ѐ��M�b��U�{+e����J���&ʈT�*��*Ujzl[U}��)�}��@��Ղ@�	�ht)�`P�5�h��c\r�0��*�[(K�w&�� �:\r�ѱC�e[N�%�M��*\r��0���@:�Ø�1�m��3�`@6\r�;�9����#8���\r�8���R��b��#��2��& l��]T��Z_&�r��ΩC��חK�(RK��*��0n�%:�.�ޡ'�\r���2kC�WF�&��kFƹ�k�<�oE\0D1�P�0�n(����7�Tx�<H�2���x0�}X��C@�:�^���\\0���2�AwH3����<8�(�7��xD�#�v:v����\ra|\$���r6��x�!�C��8�G��\0ç磣g�c��:p0��J�#\$����(��٘C�(8���LRs\r�\0���LSq:\"�r�L�تvH�]̒���Ly�\$�lY8R���{ ����uRۘ�\\���xRB=%��d\"VCP�5�f`�\0�¡\",������[�@Υ�jHũ'D�-��cC� �f-E�dU��lZ�J\nֵ�ʻ.�\$�\0���5 �1�F��{��1���Q	��3�^m݀F\n�BE��_�~���`��ix�����N��A]\n��C���bн&��c-�*�\"j��\n-%�P�\r�^���Q\$H2&+%b���@tA��0�CkBE�\0�C`u8�y����ȥ!7�Y�W:�g�T*`ZPs��L�3:6?MT��\naUy��)r�rXH`m#ɩ��%s&�G3���N�޷�p؍�}�NQKl	��&d\$M\n�\nD[�\0D�eЄzi\\��:�%��H)l��Q�y:@0ɇ��\0�d����ՙ]!�8g,�.j�	!4E\\��R\"IɥW\na�܆3�+R�MD(��ب|�J�0���3���*��J_�*~H)�B\0";break;case"bn":$g="�S)\nt]\0_� 	XD)L��@�4l5���BQp�� 9��\n��\0��,��h�SE�0�b�a%�. �H�\0��.b��2n��D�e*�D��M���,OJÐ��v����х\$:IK��g5U4�L�	Nd!u>�&������a\\�@'Jx��S���4�P�D�����z�.S��E<�OS���kb�O�af�hb�\0�B���r��)����Q��W��E�{K��PP~�9\\��l*�_W	��7��ɼ� 4N�Q�� 8�'cI��g2��O9��d0�<�CA��:#ܺ�%3��5�!n�nJ�mk����,q���@ᭋ�(n+L�9�x���k�I�B��4��< �� ��5m�n�6\0���j��9�z�� �,X���2����,(_)��7*��n�\r�%3l��M��� \r���m��K�Kp�LK���C	��S.�IL�G3�W9�S��2b�!���|���;I7����#��=���M�T�R�/�\rҞ���Y'ERj!*����؃�5eO�;w4�ӁM��\n���AFO���W5b�[��\\��*|NK��EP���#!��YȪ�iX0]�R0l*�#c\$�W��HK^����9r/��A l��(�m��N)�R�7:k\\�t���n�I�ºE�v�M�]�Ey�ac�l+r�\"�q�@y��C���ܷJ}�F5�=]z�d�3�P�>_�.)@�F�4:� %�c1�٭䩂�\\Q�5R`X\"�e��@A��4��mZ�ٕ��6h��Nڟ44�p�\$Bh�\nb�:�h\\-�\\��.��M���M���,�4�y`�:Y=7�3�Ų�	aMH�@P�7��h�7!\0�7c��1�#��:��\0�7���>c��0��h{�����P9�0!L��e9��)Դ�ш���vl)\\J�I6p%��n��p�wN�O�d�q\n�ue	u���nN����P����j�!c�D.j��\0T�M_ �0mӫ*6�U����)�t,-��¸x,^�ù�+V��VMRQE8&��~�����;��促(x�9P��\0<'�.�`z�@t���^�.!�����tV�2�����\r!�?#�C����/�'��>	!�8��C�<��%��o_��< �yHt=��G`��#�ui������t�jX����C��*9j��̹6���6���ڊ\$p˪��lE1�o�\r�ż�I��Po���@XQ�,�Q`�c\nL�:9:�}��b���K�I�:%��[�P\nP�6b��g�}f�y6fd���*d.O/�\\@��*���8�BX��(�P��@xS\n�:��Y���\r.�G)��(��I���d�>�H�誀)E�c�E��	Jg���,k�2o�ga�\0wN�cxoJ���#b\r!�0�\0f=���F0�&�_��JEiU*kHr\rᴐGs�z�^ɬܯ�� HrP %�(�O\nS�ч�)zX)��\n\"��SJJ�&�UM�F\n�x/6\r͖^����@�T��o�&�uh�4��.ӯ�-G,�6���7٦ԛ�[��\$��[x^�PCv��0�Ck�\0�C`u?oQ���eIuծR�X��\r��*�@�A� ����R�ט=�YK~�7�;l��n�\0�?hbDҷN\"ӷ[U\n�!8����k���v�a;'H&An�&��H�!0�����&A�PM���X�%��x�fY�\\��|Y�YŒ{.�y�^�}�+I䴠�́Ȃ���Fʺ���R'ܯURZ�3A{X\n�礹Q��ʼ�6��|6�c�~�@�kh;o�0�|ȅ���-;,~�F!��3�1�z:y7 \\���������v�:Vc�M�7N�f)�m'CBDnMTB�ȧ�\"\"�d3@�";break;case"ca":$g="E9�j���e3�NC�P�\\33A�D�i��s9�LF�(��d5M�C	�@e6Ɠ���r����d�`g�I�hp��L�9��Q*�K��5L� ��S,�W-��\r��<�e4�&\"�P�b2��a��r\n1e��y��g4��&�Q:�h4�\rC�� �M���Xa����+�����\\>R��LK&��v������3��é�pt��0Y\$l�1\"P� ���d��\$�S��L�\$�y�������)�n�+Oo���M|���)�N�S�,�,}��t�D����\n2�\r�\$4�쒠9������I�4��\nb*\r#��)�`N���(�ˍ�(9��\nH�0K� !����K�D	(���+�2��� &?��P\"���IC�B�B �(8�<�H�4�cJhŠ�2a�n|�4̍Z�0����˴�@ʡ9�(�C�p�����1����^t8c(��(�1؃��zR6\r�x�	㒌�&FZ�M��.̓29S��92��W �e��M� P����q]\$	���s\\��ӿc����1���OY�U�n\"��6\$�4�f϶�`2�s��ZV��G�L��\$Bh�\nb�2�x�6�����\"�T2ՐJ��d�3Mp�%8���6�쀨7������C�O1�PAL��� �(��0�.0�g&���2��S��[�b��#eò��pA��K�=n��2�3.�k8\n%6��M��b��`��(��!,\n�9'EBCjz�U�Zg0�M�<M�:d뮔�V���͸�	��p���;���	���(@&�C(3��:��t��L#�ژ.�8^���+���!xD�\$���΋���5�A�(��spx�!���@�;���Ý8�nύM�����ʿ0L�	�í�	��!\0�\$\n0ދox@@*!L9\n\"��}�r���^�)yhB��.��f�r�%�L��LGIР'���\nEP` KA��'DVTI�L6D�P�T ɑ���0M:�2M)P�NRC�Ȯ�8�I_(�����	%d%v��f���3kpک�>��wL(�G�*>�؝���Y�,3#ИXi/&0�\$�X�'NPz9��<�ԑ�Y�z=�����/\$�=�=\$9�\r�<4��\n���{+em��)%�S0���u�cdH��A\r��1�����DGS.0��3(�&!���Ce�T*`Z��1��3��5K��fy\n\$'/��i'٨h\n1xd\\���ª�z\$ɀĘ�'���j�}O��jb�J(��<���N��#S����Q&��U.R<�Ha/eԘ��	��]��7��G\"��2����7�|��\"j�p�C�R`������7�(��@[��K\$V�(��aa�%[���N�fSR�\0��c�k�6a�";break;case"cs":$g="O8�'c!�~\n��fa�N2�\r�C2i6�Q��h90�'Hi��b7����i��i6ȍ���A;͆Y��@v2�\r&�y�Hs�JGQ�8%9��e:L�:e2���Zt�@\nFC1��l7AP��4T�ت�;j\nb�dWeH��a1M��̬���N���e���^/J��-{�J�p�lP���D��le2b��c��u:F���\r��bʻ�P��77��LDn�[?j1F�U5�/r(�?y\$ߝ��������ͦִJ�Mx�Ɋ�(��So\0�4����u��=\n �1�c(�*\n��99*�^����X�����a����8 Q�F&���0�B#Z:����0��)02�� �1��P�4���L\ni��R�B8�7����4Ƣ��=#�l:\"�-�����	,D7�B�,4��B9���j*Mc����;���'5n�\$�\rq J2��3��?�T�??K�0�������\\��b�L-C�5��2t4���ʋ2�&&��5Ə`�9��(Z�\0P�N�i�G\nK��P6���.V�#D;[�U�l<��'d�Ct>���H�f6uq1\r��jփcmY�՟Z(��k#�V���|�\$Bh�\nb�2�h\\-�X(�.�ՂH�/�P�:JrT�2�u��1�2�3]\r.�@6ѣB4�\rc���ɼ�1N-0XY*��69�;?��6�\r�l�X�=�\r���eW83�[��93��#RcW��x�{\r[:\r����&��d�NT���jk�fZ�k�g�u>g�s`�\"5�h^�Zxb��#���z�̔���L�ںW�e�kL��CI0�C��˲�*�-L�}��ȍ ܸc�2k>�e�H�'S�Sю}-�;Cc����n������>ek�6������\n�h�E��������@2���D4����x����.��H��c�^��cwt�K���:0|A|1\"0��>	!�8���y���0��>��L*��-�kH�(��2���^�a�G}	��C�q�z�8:�\n�08��#X��h@\$\0A\n�`�W�\\\0R� �tu�	0<ABq��b�!��^>G��2^g	��v������5p�i�<R8���A̕��Ǌ�:�@'�0�w\rk�j���\r��%�:��@ȋxo5��`�é��\\ԇ\$⏆0��v�L\$�����cс#Ā�G\0���6�R#�aM���T�&f&R��:\r�=<�՘oÙ�KE�٥5\r�b���5���P��u\$zh���T&�#'���Mؾ��Ҡ4f��ͱB�]�|#D�|��'-�����4���Ԛ��PCb���>ڙ8HV�B���+�150��\r)�AR�8�����B��2N�.B�F����y�JfJџ�Z���*8r�3���\n�Ch�5MFԹ�E�|P\"dT���6O��\n�ђ��ꌊf+p����_�0\n��;�G){�4��3Y0�P��?��D�+ى�M�-�Z�);.´���BhN�f���ȃ�x	��!	��)�֡��t!��Z�֢���o��آ#P���\0����2�Ոx�\0*ܰ�T����3��AAP�]tH��\n���\\��";break;case"de":$g="S4����@s4��S��~\n��fh8(�o�&C)�@v7ǈ���� 3M�9��0�M��Q4�x4�L&�24u1ID9)��ra��g81��t	Nd)�M=�S�0ʁ�h:M\0���d3\rF�q��l2�D�;���1P�b2�.0S\r	�������^L�7�5[Y7�D�	�n7�S���-9�����\$�\r�U��4)�\$ЬH+s�����X��&��p�\0�%��>�u_Ĉ8�3s\rI\n��sx�vC\$E7%<(�X�a��Qө�nꐹ�,�z8���x��#ʐ@�\rϨ􎪭�N2�#��9*	xА����!�j83 0��*@oh�0�oj�:��\0���ӐFN��5����� .��	����CX#��x���(&)�؊29�|\rAK��0�c��:I�x΀�Rܻ/��x�H(�(m��9��� ��C�J�����C�\0�A l���ëx�0b�1(˘�2/�S棣��� �p�B2��<I\"���L\n��:C(�3B�4;�Ĝ �P�1S�{V�-0@��U��ψ�d4�M��Y�B�\rR�\$	К&�B��,#h\\-�Wh�.ԓ��:�c���Ceh�!��`Icb8�\n�{B�\r�˵9��\\9�êx6LH�5C���(���cj���@����)�bac;!}(�p@�GH4��Ұۉ9�{������`�6\"i�0##�3�0ޖV��p�����)o�P�-*���z��m|ކ���R7c�s�/�0�7`8h�<(h�.^���<Mj2f����֣0z,���x�˅��D�At�3���B<:BB�M�䖎�x�1#Q�D	#h�IoHx�!���m�^�`����7C���,�����硚{ŋ��\$�y��A8�J��>��\$\no��>�<*AHA(��8�0����Ih@����	!��<�HI\nT�l�pN��>%\0�+��	�0�58?C `�.�䙳s�A�1W�؅�@�T{�Ř�@Q�yKf�H2����{�0#���Sr0_���ӄA c]��f>�Y!D�:��De�� m��;p�F�Z(�(��Pi�1�qa*�qI�pM<�\$����A��:�sHS�2���Hez�Rr���0�cIi�2/5c(Q�<0\n�7�xՠla�I-�L��e9�9���S�.&�8@��T�#�T*`Z	�nh��E�\"�,yK�-��N�8�v)M)>WZ��a���K�(%D�l�b{Bl����ª\n��j/��oR�#�\n)%o+�l=9�\0���-��_�P���#:T?	�4ԬΡ�w��vI�i6PZG%��6��Z��s_��1�P�^X��A�M2{]�z�����0�q0&Nz���8�C���i�p�";break;case"es":$g="E9�j��g:����P�\\33AAD�x��s\r�3I��eM�����rI�f�I��.&�\rc6��(��A*�K�с)̅0 ��rة�*e��L�\0(`1ƃQ��p9�&�;\ruN�F�=��l���'C)�A&�Nsi��i3LrpQ�r��\"�k��A���aW�Qd�u'i:3k;c�x��*u87K��1x���Y>��\n��d�Ȁ�o7,{IA��&7\r࢞n�g�q6�i	�\r%ݛΐ�Q�\"�m�7�|�U9�\n��7�:��Sq�A>/X˧X��4�*��((���*J��\n�J4�'�\n��#/`�6>c����k0�2�`P�2�o�z4-C!�)��O8)8����نV�Bd�n뎵<��On����z7��s��%\r��9I�r&:��hȻnXJ2�3�3��P�6� j�����n�1�&g)9NJ@�EBx�0���4��(�>OҒ��0�*h�B ���N� ��S�:#n��а�P�K��P��L�U�-1W\r1j6�1D�	@t&��Ц)�C ���h^-�6��.�B��;��w+?�K�\r�ۙ4.Sn&J�*\r���77��5G���:�d���ab�97��Z��A5Qcp��S\r�[!�b�����X��6ϴS�)E�5h����P�|H�{����BwR=)�411ȺL�3CEFE��� ��\0�\nh��?����,5W�H���C��>P�|�3�XA�K����.�@�c��Y��2�\0x�\r@��C@�:�^��(]�1\0\\��z���7����/�#p��JF���x�!��C�Q2T�i�\$#�3&�r�:&[4ު��)	�{��?;���m(�\$\n(ޒ\$�R0(�J�� ���,H�<}�\0�3がcY�a89�d�\$^B@��yP��Q��TT����P{�q(!�Қ���O\naP����M�w��� uF�!�LM	�\"�.��}ښ\$8L��%cBj<��]�B�E��2��@L=���*�@��у����Wj{HPm ���\0����T%<�XE�	�~|�2��\$�)�:�U�&�v]\"�a��]+ԣY��Q��@�v�`+g|1� �b!( d+�tq�:�&&;#����T*`Z�n7����d#DTz��Y����\"�rޔ�0����d}G�3w͂*/��3��E�	�\r.�M�C����A\r����3nN�\$���r@~&��}U,Kfh��3*\r	]��QQf\\\$�.�Zs��o�snH�LCS\$���օ&���t7ǔ8�H��!t��}Sn[�jg�*�0�|f�g�˗��L��fL�\"ɂP�\$(";break;case"et":$g="K0���a�� 5�M�C)�~\n��fa�F0�M��\ry9�&!��\n2�IIن��cf�p(�a5��3#t����ΧS��%9�����p���N�S\$�X\nFC1��l7AGH��\n7��&xT��\n*LP�|� ���j��\n)�NfS����9��f\\U}:���Rɼ� 4Nғq�Uj;F��| ��:�/�II�����R��7���a�ýa�����t��p�Q��l��7׌���9���Q.�S�wL�����(L���G�ye:^#&X_v �R�ө�~2�,X2�Cj�(L3|����4��P�:��Ԡ���88#(�޷�Z�-�\0000��!-��\n�x�5�Bz:�H��B8�7���/�d\nH2p���C�0��rL��#�ނB`޶\"�	Nx��\n�K.�4�CPʈ �����2:,��3�PH� i@� P�:'@S\$4��V��L�B��6/�G(��\$�jV�	q:R�*d�҉�ܣC-�Hܤ�j�5ͣ�t�/cr<�B\"@�	�ht)�`R�6����g�\"�`���`� �Cd��@��_-K�qH67˄�ⱃ�@��C��c0�6/�9��0�u#:2�!U㊅<�(P9�-����\n�b��#_#���Ts����6�c�v4�����\r������rz¨ͥ�4��8UL��a����*���\r�f�D�;֪b���c�G.�#*j���\"T��q���؃�\0xߍ��3��:��t���\$�X�-#8^�o��X7'Z(^4�sH:m��d�\ra|\$��� �àx�!���H-pރ��DD*IT	����j\"�\nz��\r/���ۃ���%Ib:^m�8�Ѻ(	�i�>�,j�a5�5�;P�D1ִ�����%�\r�Z��~������Z*��H]���4��)��o�F�8n�@�a\r\$���\"���r�Q�Ɏ?� �Iy��Ŀ1J�@p�\rZ�C(e�\0c1����H���)��1�c�`�򖳨r�I�̕��wH������e�혀��ȟ�He����4�th�:���u��j�5\$�f�rWiՒ��_��9(��\$0�\n�Y3�J�6�dq�qsu�*�@�A� >��ќ�j�	[_*Dq:��_��q.dm��\$�OdQ��q0����\n1fd��%��y�B'��MՁŎF\n:�o��0Dl7�j*�\rdx6�BLN�Z\$�5,�d�ZII�/�VK����I��*n]X!�]�B!-��U@Nd�%R@��%N�B[2���\\��\nH@:��jB �	";break;case"fa":$g="�B����6P텛aT�F6��(J.��0Se�SěaQ\n��\$6�Ma+X�QP��d�BBP�(d:x��2�[\"S�Pm�\\�KICR)CfkIEN#�y�岈l++�)�Ic���k�Ŷ�m��kF�ն�m��k����WM����k8�XbU�B2`�X�X���@��\$r�����/�ռ�!����p{5��o:�\r��@n7�#I��l2�̧1�ru8'M���i�&.\0��/Wf�(~��UDS�k9����q��و���]�R�\\ı4u�Z�Y\$ɱ§�R����R:B P9N\"�Rӥe�_!�b��e<(�>)*��Hs\0��	�����&��\n�Μ!\$*�Ȭ�ZU0�:Ɛ�!\$�@%����DL�3Es��h:������ì�T̑�L�TBPR�\"e����1��#�C�=	jF��*I\n��l���#�p�J��L���#T/�5N�Q_\"�#�8!�HKI@4�x<�`Sp��Zuj���+RD#�Yc!�%::���RM!,���<�Qk�r�M	\\y��\nBT#��v��l��<\"T�K<�\r�Q��[,k�_\"�5�R\"�����r��*su0I,�W�����^O�z��0�v�\$	К&�B��c�\$<��h�6�� ��6LP�AP�:\r�GB/�\r���B��܍��<���9����c0�6`�3���X�Y��3�/`A�R�\0���`P9�.�Y;PU�T�GHp\\�,iS,�'��O�E�\\5��p@!�b����ѫ@���T��L�Y{1dR�q�)�\r�Gɜ*�ʶ}2�MI��ݒꉳ\n�\"�B��!=!lrq��\"��d�]^�g�	���M�t9��x�I���4�C(ɱ��e���D4����x���ɩ��(�xC8_���Ù��#x��N(�98C��/�����H�\0mn!����ĀG87�#�ԃpi���>&b�CptkK9\rF�A�^Nn�30h<�q D!q�C@�ٛd��,�PP�I%V�!\$tL�f*%��'XAӘ�WЩ\\��HA�S&��š�Oy+K� ��^��Yu��͠�RHX�l�HD�R�RJ_��v#�Yő-<H�����O)�5ER~|��<�}\$�HȈ�O�ܥ�rN�qI&�\0�0�Oα�6!��3X\0�� y��4�p@L�ߛc|�0T\n�7) ���\r0P3 �H��6��D��\0Q���.�\r�DTdw,hZ \$(��\$�'�\0��E�5�rw �ؐ�騾I,�3�����tA��0�Ck�U\0�C`u9������&��թWv�i�T*`Zqt4��f�OM,O,	�����J\ns�2� ����	PD���W�45!�@&�����M	M �d�R�e3����zo3���Փ�y��3���F�O��UWX��SMEj\n�Ȝ��%@d=���J������:S��:_aT(�P�v�D�)�g1���*���,���*dY�JF*�] d�%U*��S�ɩJ�M�h�\"��.@";break;case"fr":$g="�E�1i��u9�fS���i7�(�ff�D�i��s9�LF�(��'4�M��`�H 3Lf�L0\\\n&D�I�^m0�%&y�0�M!���M%��Srd�c3����@�r���23,�X\nFC1��l7AGcM+4��@Q�c:����\$ܚo2f0�ٸ��T����D�9�M��ܭ������� 8a2HI��i:Bc�ZѴ�t��Xj�Z��0v9\$܊n�^�{��+�rV��3y��:�r��W��2�;n��Ү�*���3����c1�͜����QW�6\r#�+��z�4��\0��`N���2�< Lp��*���)*ʶ�9k(*#��'�6�P�7��\$��ZJۄD\n�B�0�es�K���B�02�#�#�� �����#F�Go�9��k�(�CU/�Tt�1I�W�K��5����b��:�,\\���`@�\r���:\"� @7�h���UG#H8�\r��H�� gN�2Hʙ��#��%(�YE�e�F9+2���O�\r8B�Q�XP P�?\nc��ہB��a�Z�+���,e\"6�\0�3��Ԧ�+cu��ԅl�����Sp�eH曨��0��@�	�ht)�`P�5�h��c0������8��̅�͹����Ţ# �\r���\n�\0ৡX�ˑ��H�9/㣲� ab�mZ�<�L��,��_��� W.J7��.A�NJ!��9�9������|:�m�Y��R���x�2�\"�)�J�\0(Ό	'�0@˕;E���	X��!�n�n�*\r#������봪�X���jo]\$�>8H��m�q�:�l�N��vkR`�\r�|Ȓ�)���K�'CC\$3����^��H\\0��l���~��B�BB��v0�V������5�A�۷7\r�̐x�!�P6'Cl�41\n�0�(���(n5��=/�P��+�B��zq�B=	�W��B�H\nd:�T�	D��NWHs#���T���bv;�E����ŝ��F&IlRCk(>t��Ld��w@��7SN�C:�%�ia1HB�O\naP��`@Ò�BGE%\n�ȁ�����BM���k�B)F�t���(*-tՓ�@LO�a�l��<h\rB�A!�6��KS,`#� ��@LL�h#H6�� D���XV�0p����&6�ʠ'P��:U*a�30yX?gtN%��P��C�e��LI1\\�Y�GQ���\\B%7�n��lŚ2�d&�ȹ���P��Ky�LD�^D�!���\n�\0'dә������3�\0N��VP�	*�(9��M,�b�����\"�hT*`Z&��@��Li���I+�%�pQ����U+����26J��de(�+vT�ф\$�(���Ɲϕ!�׭���\r@#S�6����cL�%�Ԉ�*�bÓ�6f�tՂ�	,�:%m���b�G���-��Q��%�1�&V&�a\n��tp2�R��Sx3&m��c��W�����P�J=�����>c�9�!S*h�+M:ZAR%j�F�D0�";break;case"hu":$g="B4�����e7���P�\\33\r�5	��d8NF0Q8�m�C|��e6kiL � 0��CT�\\\n Č'�LMBl4�fj�MRr2�X)\no9��D����:OF�\\�@\nFC1��l7AL5� �\n�L��Lt�n1�eJ��7)��F�)�\n!aOL5���x��L�sT��V�\r�*DAq2Q�Ǚ�d�u'c-L� 8�'cI�'���Χ!��!4Pd&�nM�J�6�A����p�<W>do6N����\n)���pW7��c\r[�6+�*J�Un\\t�(;�1�(6?O���'�Z`AJ���cJ�92�3�:)�h6�����P��5O��a�izTV������h\"\"�@�\r##:�1e�X� #d��f=7�P�2��Kd�:��o��!BRP�D�BP���\"���=A\0��d�Ԑ���\0��2h:3��O��;�O��7\r�PH� iD� P���s�P�CC��\r�Ę�r�ž�]2�#��b�-cmS	m��/kx���k%�.�4��<�B�����GG-�ev��C-i[C	@�d��`]<ζujڳ�e�^YV������jZ�PڂT�\$H�t6����{�\"�\\6�� *#��6\$�RR�0(�X�U������{_Z�a\0�7c��1����:� λ�abB9)��[\r��Σj�:�!@���9ʻG9!\0�)�B2`=\r�%\"�āp@%ړ��9&#�T>c�7�Hn�£n.5�,���hP�f��Ӥ�H@ι*�ʴ�l)FB�\r�K����J��#(Ԋ`Y3*�9�<҃�%�ժ8���?���L�#��4�&�&#B�3��:��^���]]fHP�S#8^�w�³�ncp^8c��:u���0��XD	#h��mC�x�!��)4�ꁧL&\\�##�(��r��0r5�S��3����Ҭ�<^�[+ n�\0��~�X���9gl�T��,�UѾ\r�t��RxO��+Fu.\n�R��G+.��V����3��@t�ɹ�H`�6�bxS\n��އ@BД��\rf�4�բ!�(� �FL��?��D��A��Vi�U��cPރz�]C8 \naD&#jkM�1�R=�OZ�|��9PA�B�T�'l��b�'21d~�â�)���H��lX&��J��]�˰Z�8���*\nJ\\r�W��bM�t>`�1�\0���Ln��:��Ⱥ� i̥p�Ȓ*)NQ��P��h83����9F�H�re�YL���(��rsN��:��?򈎑�BH�2\rg��X=^LK�}F'�n̰^I\\K!�)%�B�J]:a��!\$���^�tU���Rl��1q���r�yd�L�(���7;�\0003C��E�\n	��d���N�j�)\0�\"��ަgMH��8��3�AM�;SD��̰c�j8�5����)���FETr�=\0�P!B��n_���\0��a� p-bZ�#�`���:!�";break;case"id":$g="A7\"Ʉ�i7��ᙘ@s\r0#X�p0��)��u��&���r5�Nb�Q�s0���yI�a�E�&��\"Rn`F��K61N�d�Q*\"pi���m:�����d3\rF�q��k7����Q��i9�&ȉ���ɍ��)��\n)�\r'	���%��%��y�@h0���q�@p���&�)�_Q�N*�D�p��LY�f���i�FNu�G#�[������~�@��p�X,�'\rĶG*0���4�1�#���\"�E�1�SYάn�ѥr٥@�u�I.��TwP8#�;��:R����(��0�޶HBN	LJ<��(ގBCH\"#2�9KꔷB���D&�J�>�\09\r��;��9�PȒ�N��L�!hH�A�!� R�������\"����\"�� /,Z͍#C\0:�C*�-�x�5=�P�0��H��	s�#!�䙎L��6'H:�6��HK#���Q)S7F�Cl�7�	�ht)�`P�<ՃȺ��hZ2�X�6��X6BLN�E\\�:�(���G�p�\$��1���:у`�3��X��VX!�I�h@��R�\n�x֎��)��;.h�\\P4}��'#2ܬV㒚��T��6X�4F��	���,zb�(#Z�35��,��H{6�ˑ�@�[	dp�&H��9��t�2����_a�4N#0z\r��8Ax^;�r�6��2�3���<=���MH�����էXD	-{8���^0�ϒ62��@�#��BɩL�Od�����긪��6Ð��.�O\0��\"��(&���2b	�P��*����:��B�ϡ�n2?��ڢ\$�\"���'UȌ��x�8���*Wۥ?���4�i��D�X@(	☩¨�bf�`����\"��,tv�z��7?��@�3\r(�����[m�Ek(J�ڊb��}�@f�F\n�@�\$s�qo!�9!���9|H%�D0�_���>a	�U1���b�	\"�T�0G(�(F�b\0|a�4����`+j�1�R���0u2mԍ�0��YJ%���pF�2�T*`Zq����IHa����K:�Adq�+rH^S�7�� ��H\0PRNJh8�|v�#�)k���嘐J�o#��0@��ة��|�,��1�E07�#����G\r��ɽ�	y\nk\r\"H,���c*��4��\nOlE\r�]%s�HCO��� ���\n\n�4'��";break;case"it":$g="S4�Χ#x�%���(�a9@L&�)��o����l2�\r��p�\"u9��1qp(�a��b�㙦I!6�NsY�f7��Xj�\0��B��c���H 2�NgC,�Z0��cA��n8���S|\\o���&��N�&(܂ZM7�\r1��I�b2�M��s:�\$Ɠ9�ZY7�D�	�C#\"'j	�� ���!���4Nz��S����fʠ 1�����+k3��3	\r���J�R[i�\n\"�&V��3��Nw���0�)���ln4�Nt�]�R�ژj	iP�p�ƣލ�f�6�ʪ-�(��B#L�Cf�8@�N�)� �2�� �P ��\"㓳�b�t9��@�0*ݯ���	��zԒ�r7Fp�����62�k0J2�2\\�'� P�*�`PH�� g.�(s����8����9/Kb\\���l���<�7�jr��+�3�â� �C+ݯ�s8�JC,�0���E�At�&Q��9I�-2�(�v7�B@�	�ht)�`P�2�h��c�l<��P��7���=<\r3\n69Ө��D�+\n�z1�.[1�l8�:��dt��\0�h�,j�I\$����*�@���x֊��)�rJ�:C ��8�\r��\"1�/#찋��3�����M�KiڵZ&\$.:v�#,��0�B���]<��l<n�/�\$0ۣd�\"C�j��R%�	�Ҩ931\\[6*��9�%�&F�3��A�^���]P��\0�-8^��c�ʚ��xD�T�/�X�5�A�6�	��|��м�x�w�C�32,��[>9{3:C��0�۾�P�\$�=\"��(!��.M8P�)��ӽ���zB47F�kґ���4������\"o��(0H�*�dp4f�\$*7�7�Ö́Qa\0�'�b��)\r9p�RO���fRO�`)��A\r-���\$��΁�3����L�\$_I)�[J�d�\0S\n!0�ײ���q�0�:p��Y ���%���3H�I��fvtRD\"��\0�\"�K�!\"���.C�Da�J1f!bBg�y���\\�b���u\$a��Qb\$)f��#)�s�`+gH1��Jr��my�-���^٪ڊ��6��]  \n�P#�pTq�M����\"�L ��AjZ?�\$��Ă*��;2���K�t<D���PJ��<��<��E]�C;�X�^���;jIl���)�A}��M�RB�!_0���v_�Q2:��P�]1df|��L�S��XgB@(���1a�fe\$�1�D^��xu��Ș._�c��Ԑ�س�u/ςi!2�*��@D\\";break;case"ja":$g="�W'�\nc���/�ɘ2-޼O���ᙘ@�S��N4UƂP�ԑ�\\}%QGq�B\r[^G0e<	�&��0S�8�r�&����#A�PKY}t ��Q�\$��I�+ܪ�Õ8��B0��<���h5\r��S�R�9P�:�aKI �T\n\n>��Ygn4\n�T:Shi�1zR��xL&���g`�ɼ� 4N�Q�� 8�'cI��g2��My��d0�5�CA�tt0����S�~���9�����s��=��(��4���>�r�t/׮TR��E:S*Lҡ\0�U'�����(T#d	�H�E��q�E�')xZ��JA��1�� ����1@�#��9��򬣰D	s�IU�*����\$ʨS/�l� ��_')<E���`����.R���s�<�r�J8H*�AU*����dB8W�*Ԇ��E�>U#�R�8#��8DMC���_���lr�j�Hγ�A�*�^A\n�f��øs�P^�Q�PA�gI@B���]����D��J��<� S\\��\\u�j�����ZNiv]��!4B�c0�\$Ama���J� Q�@�1�M�YV���q�C�G!t�(%	CŹvrd�9(�E�t��P�Ձ7Y�Q%~_��C48b\"s���eŒd����ԨCH�4-�9�.��h��\"�>Y��\0006��Цe�[N#��RAG��7��h�7!\0�7c��1�#��:��\0�7���7c��0���k�-^6�#��aK�ri�V�D	T!�b��;̨�f�G)F���@�:@��Cj��P���>]�H�n�({�I'�K�;Sxg��<\\��K��1�b��>���A �oO)�R��GD5�&�#��96(�;��^2���9� \\�Q���D4����x���ɲ\r�(�y�8^2�ߘ��iH���M����t{�|�40���I\r������/ ��qz�7�X0��XC��}�	����sZ\rA�E	�TTA��,���\0��A�A	�(C�AQ!���'P��%.�A�\$La*��f��6��A�a.g*H���|�(���\n�|P\n�O���d�I�@�4	���!>�\n��sc�Q����q7�xS\n�q��`�	5\$�@��#��|���_���\$ÔX8tB��`�AE�Q�*j=�q�I��}-��xF��\0���4\r�=��C8 \naD&\0�mMa�{A*	��xi�o6�	��xm���޶��T���\"F�\$v�\n�Sa�&ŢPR3��������s�X�89�A����}Pi��1\r��1����X s`���h0d4�f�`F�X:�`@��nT*`Z�t�����&RDpN���X�8�\"\$p�3SV��[�|�c\r\0PM���m	�\0(�����d��N����G7Ỷ�!d}9�4\n�SI='�Z���0�!�<u�bךk�`&l��QQ_���p�Sl�*��ᚩ2>XnN���W\$��ݤ�̮NOe���t���5g���f�p�@2Y���d�";break;case"ko":$g="�E��dH�ڕL@����؊Z��h�R�?	E�30�شD���c�:��!#�t+�B�u�Ӑd��<�LJ����N\$�H��iBvr�Z��2X�\\,S�\n�%�ɖ��\n�؞VA�*zc�*��D���0��cA��n8ȡ�R`�M�i��XZ:�	J���>��]��ñN������,�	�v%�qU�Y7�D�	�� 7����i6L�S���:�����h4�N���P +�[�G�bu,�ݔ#�����q���O){��M%K�#�d��`�̫z	��[*K��XvEJ�Ld� ��*�\n�`��J<A@p*Ā?DY8v\"�9��#@N�%yp��C��0T���i0J��AW����BGYXʓăC\0�L��u��ʓdaڧ ��	,R�xu�EJ\\N���J�iXFP,j�e4�\\��[�u�DDt\\H�y�[����'Qk�	�N�rgGO�����R���bbRBH����dPv�`P��M�!hH����Y:D\"�EBbP:���P��>J��\n�/�!@v�s!�T�E�Y�\$VvCaR��e]�bF�ZG]����KO���-s1\$\\�2\nDL;�=!\"e�#��<�Ⱥ��hZ2�)X+ST�6����R|�@,��6A�B���\r��<���9����c0�6`�3���X�Y`�3�/ A�]a\0���(P9�.{	0gY ��b��# �5�@�sڀ�Om�A+�PEð�B��+�d�aʐ�ZUlC%L7�!Q�o	��L�e�=��ۏ�[���(\"h�9���gˎc��9S�(�8\r#��2lA�����0z\r��8Ax^;�p�2icp�9�����w�<8�x�7��|0�M��׋�nT5�A�6�\r��⎁�^0���2��}>��C�׍#�g��=��:2Pt!	B�D��0P	A���AT'ز��.P@�!(\"��G�<\0F%}\n����yd\n	^�bs�&e �.&�LaY8b�^�@vE�^d�G�|A��<�\0PP	�L*�&�S\\=���¶���219�*4�SJyQ�xR�P:��AO��\nDn���q��M��sR*e�t7��@��i��)��1�5��Մ`�R�\r/qϿ'�\"�o\r��9��\\�ҕL(Yl�@'!�^�QK!c�,H���-/b�M%4����R�!�A]q�W�\r0Cc!��0�Ck2?�\0�C`u8̡�����A�)�W0�\r��*�@�A� x��n�Y��������-q2c&�0� �*&���`� ��v�@Q�M��}2��P�p�C,f8�JⰃQ�/GPY^,�S�a\0�ոL����je�k�5�����glYpxC)�g��aj~�+h^�N���G�\n�q>/\"�U�N,�+z���)�2�";break;case"lt":$g="T4��FH�%���(�e8NǓY�@�W�̦á�@f�\r��Q4�k9�M�a���Ō��!�^-	Nd)!Ba����S9�lt:��F �0��cA��n8��Ui0���#I��n�P!�D�@l2����Kg\$)L�=&:\nb+�u����l�F0j���o:�\r#(��8Yƛ���/:E����@t4M���HI��'S9���P춛h��b&Nq���|�J��PQO�n3����}W���Y���,�#H(�,1XI�3&��7�tٻ�,AuP��dtܺ�i�枧�z��8jJ��\n��д#R�Ӎ(��)�h\"��<� �:/�~6 ��*�D@�����5�Λ<+8�!�8�7���ȥ��[�K��5�+\"\\A�{l�-B�H8D)|7��h��%#P��/₀Ў�s�.\r2�-OXꥥ�P®-A(�=.����3����<���<��S.��Ztxj���*��c��9H�ҿ<�bU=!��ʀ�iZ ����`\\�NeV�) P��1n�.KcK����رZs;ď�L6B�cYkz	K ���Y�q�f��h��4��\$Bh�\nb�-�7��.��h���%uV�� Ȥǯ��S���9E���.��:�*\r�V7!�Mc>9�èط��0�9��8効;�7Z�j�:�a@���z�,�^!�b��Ӿ+��Y�Cܙ�L�Si��2�6��}�.-R���0{��	F)V���c����r��(�.�����	�6h�<�M=6�Z�MXv��˺�A@\r�J�6%��ζ%5���i/���6cRF��x=h9�c��;�����/U�y�0��C@�:�^���\\0��r�9���>\0��|0��MX���`����XD	#k��.#�x�!�G�D��|	;*�?X>'��DB���O���\n��>��\$��1,x�H\n��	s��\0('LЇ#NJSZgg\r��&\0\\C�l\n���,�VJa-%��4�D�XjA!�8D&wQI6q���c�eI�\$\nh��@@xS\n�����u%p�79�\\az�\rd` �ҭ	�5���P��+^ a�4�&̷C�t>���\"�3?a��ET�Yb@Q	�|�S6�B0T�m;���Xá��!�9#���I\$0)����\\���V�Z��&L�d�P֦�\\:|�|����	LRyjJ�&�JЖp=eKc���\r��1�P��\0oe��;��eM�K�31S�Oc��%�\$1>vXB�F���4΁\$�҈��8S�Hdx�N�:�'Y\\Bsԍ�jH�G����\\�q��i�P��l\rPT����R(y+�pb�_OpN,e����q��8��ӂ���r4x���e�L��m`䦍�s��������F��@�DD>XgȡOuE@��d��Ly+v\\s_A,�6c�ID�A��֥nT��R�z'��'B�a�ǳB���N��%��<GC��";break;case"nl":$g="W2�N�������)�~\n��fa�O7M�s)��j5�FS���n2�X!��o0���p(�a<M�Sl��e�2�t�I&���#y��+Nb)̅5!Q��q�;�9��`1ƃQ��p9 &pQ��i3�M�`(��ɤf˔�Y;�M`����@�߰���\n,�ঃ	�Xn7�s�����4'S���,:*R�	��5'�t)<_u�������FĜ���QO;z�nwf8�A�0�������x�\"T�_o�#��Ӌ��}��O�7�<!��j��*����%\n2J� c�2@̓��!���2�C2�4�eZ�����2I3Ȉ�x��/+���:�0�0p@�,	�,' NK�2��j���P������2\r-P�	>P���#h+�#�:�k�	#r^3�:<5\"��܎HC`�	���;�)\\��#�3�E=ă�H�A j����B�~宮 ¾�k�W9��F�B�:@@P�P��h�/��z�8�H�\rJ��HR��O�-MT8hh��&I����U;L����n��è\$	К&�B���%L6����o�B�%�ʘ掌��ȍ���)�� *ɳ�ƴ58�<��(�1�i �3�`A1�C��w_��(�Ҩ����ꕅ�R�Mh�3��)���J:��:��˲v�!�\0�8+�,�ރ���5\r��2&���\0��4�h,�P3����¬�s���d!�|F��h�f���:bJ�~�&�K�8:<�⿣���@x�\rp��R��8Ax^;�rc��c�\\��zg�?��ұ�h9#��\0/��8��Hڗ��:�x�@�R4\r�KU�(d��!��f:&����@\n�%����X(	����)�-=���\n�6��J9��n� �\\��n��i��W�s���������7����)��k\\I��*%�,��5h˓?����IK�;���G���U��!���J^&�d��3�k	y1p1�@Lh�0�w0Ty�l��u,��1L'��9BjS��G�5f��\"Jj#����t��S�'�����aY'�m��,4��J�R�Q�\0����`+�͛�ӄ޹�H'\\2��rQ�Ƙ��JQ��E\n�P#�p� �LMqt��P@rIIb�\"V��tf2����7'd��c�h���B`��\\��u)�l�CHf*t35�f��(���䠅#�/D�LS��2����Y��0�A�#2�JF&H���ҋ�,�DBJ��DG̉aD�|�F\nI��]�7�HPX	\rA�)e�s0p���G����n)�0���(����L�";break;case"no":$g="E9�Q��k5�NC�P�\\33AAD����eA�\"a��t����l��\\�u6��x��A%���k����l9�!B)̅)#I̦��Zi�¨q�,�@\nFC1��l7AGCy�o9L�q��\n\$�������?6B�%#)��\n̳h�Z�r��&K�(�6�nW��mj4`�q���e>�䶁\rKM7'�*\\^�w6^MҒa��>mv�>��t��4�	����O�[���߽��0�ȽGy�`N-1�B9{�mi���&�@��v�l����H�S\$�c/߾��C��80r`6� ²zd4����8���a����������*���-ʠ�9k㌅-�;��!Kh�7B�<ΎP��緫dh(!L�.7:Cc��Bp��1hh��)\0�����CP�\"�H�xH b��n��;-��̨��E��\r�H\$2C#̹O ��h�7��P��B�қ'�\n����s���m�(-H�Jrx�M�*�2S��M=�К&�B���zb-���J����Ar�<7#��Z���hН�-�9C�\\wJ���*\r�xA!Ih��:�c�9�è؎H� X��m�¶0�\$�6����aJR*���ؿ.A\0�)�B5�7�*`ZR�||��cP�Ȱh�ω6`P�:HԬZC͈�0iI�L\rc�Z������V9���'�\r6M�:V�؝��a��0��c��,g-8�(�)Z�9PѺ�Q 9��O���\r	���CBl8Ax^;�sz\"�\\��z��	�4��p^.���:l��Ď�!|\$����H�Px�!��,�c|�sn.��lc�R�T�+��kЂ~���S��sYe!�\n@���s��\n(R��6F.��z2��_��?i1j7�C\"9�[�R���zb��u�3'�d�\r��h����=K�4��H2X<���\r8�\$��*�������`n]eࡿ&XO]yti�����I�8u1Oa��2�O�HiCʤǂ\0�d��&䈒G�@B�Q	���.wZ��0T\n5���T�a�1J�h&2�Yt(a��S K�A�� �b�,Rh,�#�R�c84δ9�>�c	Ci��3����`+\rg��4Æ]�~s��S��~\r�/4�����B�F2�t��\0g��<�5�3��V�T��90�HK�Q���k�b4���7c\0Q|#�q����_�Y�<G�ˀZl��z�;��1O�G!�?�\\�1�6�L��V\n���n\$���F	��\r��'(�ӐKHҨ��s~\\\$��\no�5���M��Q�ؼK��Y�#	\0";break;case"pl":$g="C=D�)��eb��)��e7�BQp�� 9���s�����\r&����yb������ob�\$Gs(�M0��g�i��n0�!�Sa�`�b!�29)�V%9���	�Y 4���I��0��cA��n8��X1�b2���i�<\n!Gj�C\r��6\"�'C��D7�8k��@r2юFF��6�Վ���Z�B��.�j4� �U��i�'\n���v7v;=��SF7&�A�<�؉���vw�C���N���A�g\r�(�s:�D�\\�<���#�(�r7��\\��xy�����)�V�>��2��A\n����o�|�!��*#��0j3<�� P�:��#�=?�8¾7�\0�=(ȨȠ�zh�\r*\0��hz��(�����	�˄0,�9;Ɍ3#�8��#{v6\r�;�9�.[�0��Z��h(�/	ђ�2C\"&2\$�X�����93��92���<�h�pHP��)�C��ŁC8�=!�0ء�✖�0�*�:H�7(���7�錐��H�,P�1ñz{P6II�B�r�`+��D�X�R�)��V5p\\ض=I�Ve\\��͌AY��k\$I����@�	�ht)�`P�\r�p�9^����U\nb�#�p� �p\"i&XĴ�6M앥��܌cB92�A�FN��#�*�T�\$62�j�.� ����HɅ��.�98�<Y��à��x�)�d~D���R:�Yj���8b�����8�y�y�Š�iY�F�Bl'!�����)�Z b��#�\0��8�]�0�#4�6��`��!z����.���u8�`��CО��� �\0�1[c�*�L�H�\n@��\ns2����9`�ܺL��j�_E�H��#D�n:S>���<��>�(#C 3��:��t�㿴V9LIc8^8\r�x�< �t���Z9�(���7\ra|�\r#o�K�����0�ℱØnWl����T�}B���ҔA	aA���ۙ��z@���\0��.Չ�.p~�4�1�%�ę�dί��WJ��}�w>b~5@\n\n�)f'�̚3�&N�l���6���{\$gLh��P�|[�e䝓��+G�8R��9d� �܁[��D�:0��Y�uA���'4�8�)��0�r�Q�L�B�]H�\n��\0003��GCy\rRi�7��\$|��ԅ0�A0��r8�\nQ@tɁ�S9��F\n�A��\$���E9�������Is���R}OLA�M�\\��L�5�B|C�V��Bi2�8 ��:�ЛH2G�'M�M�ɉ����0S�{���'ٓO��!��\n�YU#��L�J!��' p,�L�pM�Y�jĂU�FP[\rI'?%����%�U\n���m@f��,�d��Գ��� T�k*��_�>gkb�У-<*)��*�5�H�U#�\":~ds�e�	쁀Tf��1�i���9n��&�sXH��%9���)/AO�+v�VE���BC��:�4��y���+��P��c�r���@�՟M�榙C,�Y�e�-��Α�D��0�P�fʭt��\0��RfY�>J8Ŕ&H�i���Kh��pI4Ƣ�Bm2~���!P";break;case"pt":$g="T2�D��r:OF�(J.��0Q9��7�j���s9�էc)�@e7�&��2f4��SI��.&�	��6��'�I�2d��fsX�l@%9��jT�l 7E�&Z!�8���h5\r��Q��z4��F��i7M�ZԞ�	�&))��8&�̆���X\n\$��py��1~4נ\"���^��&��a�V#'��ٞ2��H���d0�vf�����β�����K\$�Sy��x��`�\\[\rOZ��?����2wYn��6M�[�<��7�ES�<�t���L@:��p�+�K\$a����ÁJ�d�##R��3I��4�͐�2�pҤ6C�Jڹ�Z�8ȱt6���\"7.�L� P�0�iX!/\n�\nN��㌯����Bc2�\"�+�E242��(����Pӽ.p�ǉ�\n�+�H#&�F�p�;#2>�!� @1(H�S��-�7.A j����B�l1����8�ce ��`��/bx�\r�.4�6�(H ��������N�!jx4�b\$� ����#r��JV�O	=^�%	Tp���0�%}c���B@�	�ht)�`P�2�h��c\r�0���_U9�SqCc�-ITP���:��)\n0���z<���1��\0�:�Բ�����ZV`�/\n|�}�HP9�0��5�\0�)�B60��OZ���+�ۆ%��T�E�pʜT����W�p�o�'�ߩ�F�2z\r�\"ذN���A�\r����k��(�Z�M�jP�ʐ�w�	�6���Ø�Y[\nj�f�43�0z\r��8Ax^;�tq} �r�3��G*<@ÝV�M��3���1\r����H�85����}�`��M�j0����)�֜\"̸�	��F���p	���\n@�����*JN�BlX�C� ؜=�[��5+.��l>0����~{r����|�c�Yx\rP��W1�D���s�t�kJ�@�\0�¢F)L�9��:_\r�m�\$�HY.7���H@��> h	����sq0�5��s/\0Q�4�9��e,�!�b.��)��~U�TX��#G�OS�E{.���bx� r'	�%���љx\n���ژ��c�Lk6�A��8N\n�3a�3\$u��K�yD>��B��8la���0@I�\na�1�T[��-����T�S�.������\0U\n���N�I�\r��<'#:���Z.�@,oM��!A�Ҝ�\\��_��U�P@N�#�F\$ņ`�I�d�F�\n�Z�\n(�U�`����*=a�5���c�Ԝ kȃ��*P�z5b�yR�z8;�*�D��%���N&p�FY/��L2C�Vkӂ�]d\$2#e,�+a�g�\0�3�\r��3+�h�\r3��\"�@���p�C��@/��2�";break;case"pt-br":$g="V7��j���m̧(1��?	E�30��\n'0�f�\rR 8�g6��e6�㱤�rG%����o��i��h�Xj���2L�SI�p�6�N��Lv>%9��\$\\�n 7F��Z)�\r9���h5\r��Q��z4��F��i7M�����&)A��9\"�*R�Q\$�s��NXH��f��F[���\"��M�Q��'�S���f��s���!�\r4g฽�䧂�f���L�o7T��Y|�%�7RA\\yi����uL�b�0՝4�\$�ˊ͒rF��(�s�/�6��:�\0Ꞅ\r�p� ̹�Z������h@5(l�@���JB��(��*�@�7C�ꡯ��2]\r�ZD�7���C!�0�LP��B���B8��=��l&3�R.ȪK��G�Ц���P��Ƭؘ7��tF9'�rV�#z�!4�R���\0�<��L�9N��<�Cr��xH�A�(4��.�I��!a\0؀�@P�9GL����	�S�N��1�,6\"�������P������ ���_-���5[�7�)RX�)!t�8ו[p3/��\\�,x0��h\$	К&�B��� ^6��x�0��Q6�#�귶�6=U䖩.Uz͊�z��0.:�hRF3�M'0�ab\n9`6�{10t⨺h0P9�0��5�a\0�)�B3Ȗ(cdB�\\�W�&��-���#+�0�������S\$޸�����L�G���`۾\rkU�v-E��� ��G#���n�ac���3�o3�@P�� ɀ��c��d�F2e��d44c0z\r��8Ax^;�ts�!ar�3��_*<A#�J�N�3���1\r����H�86����}7h�N#���<���2���2΍���N�1,@q��s:cp(	�-�!��p+JT�B��損ɲP��S8��y�@ΰ�R�)Ȣ�:?�:(J\"���uh���B��P8xhP!�����a@m����T@����4�H�gF�e���&'\r2�bk ��<o8��m\0xnC�E��\n��Q�5��1�&�A2E�0��<j�`����q(́�#�i�A�\$�Ȝ��Lii�W��Sգ2l�\$qf,|uQ��6�r��9�edF-�\0C1�;�'��Vt��KD��3�XceJ@���h�YvRmȗ�\$�d�j�'!)?�\0�c'T*`Zc\r�H���h��tX������h4ȉf#R�< ZO��@H��'%&av�S���ٌt��]���(c4a̅3��cT��R��b�OeA�5�c')������\0A(��(i�1t�\n1zK����&����7�*BL��2&s\"���9.�\\nJʌ�Dn��2Zo3D��Y���&�q8Li��9L��Ԃ~/�b�";break;case"ro":$g="Ed&N����e1�Nc�P�\\33`�q�@a6�N�H؁��7؈3��� 3`&�)��l��bRӴ�\\\n#J�2�t��a<c&!� ��2|܃��er��,e��Β9��0��cA��n8����`(�r4��&�\r���7FԜ�22N�*�H�n:���e��L���F\n\$��r�.Y�����h�p��f�|X�a��M�[��ӏ3�Nx������|Y�7)�f��W\$��=H���߈��zF\\�.a��.f?;�A��b	����L���(W�Qp2�`�9�D�ï˘@:�CjF:\r�\nǄ\n��\r(\"���*�z/�RN�!J����H� �����J�.\r�B#�������҃�	�L9#�\0E#����@P�2��:�(�6���P�İ\$�-�\0�#m�d�L��\$�<̼ˉ�x�	&C�Z���+ˮ�3Q\"\r�k.��\0�%K�MEQ���-�B�A j��8�BF��r�ï�j��@Ҍ:?�\$����2���7�,\\*��C��4�L���\r�\0�?Kêp�'��v�0`P��U�\0��@lL��!N�9��T\"���H����l!I��r�k{TI#��	@t&��Ц)�C �\r�h\\-�8h�.����\r��\"9&���'h=�7�s���C��1�C�̗�d����~F0��TG�ʳaJn!�b���\rs�@��16�pA)��͹�*u%\n�lH����@��7CKۦR��1�b\$�%3��72����e��	����8Hlca�[����8�2�QlB����0�J���c��D�����N4 �0z\r��8Ax^;��r����x��ݠ����^1P�r:tb��0��XD	1�.1�^0��Sw.�@�D�`â��L��O�Bn�¼�+���\$�7N��6����_?q�4ZH����\0PR��fB��4�f[Ȑa\"�Ma,��pC9k%q4>O�	Eƕr(7�Kpi�P���{�s�\rE�0�t6�i�!��\0�¤O'}�.�@���j納)\$��2p(�Ad\nA aK�|��R�d-@���t�I�k�(�bL^M�.(�]'��Ba(l���p��\r�%�*��J>d��\\��HH����*�����D%��l�4��I\"�!�,�3�.L.��KL[rdĆ׮II&�>.S8�WZܑ�����R�L����/�Vшc\rd���b����%ѱ���|�#�m�4ƴr�B�F��\n�^�97Q�����~���s�4y���K�\"�`��f��8S&�y`������R��RJL�EJ�|�i2���ɬ�%I�kd^#FX��V\r��!W/%��\$c]�t�\\��\n%���'R�x��Q2�\"�-	Z*:`ԙl�P�� �Ꝙ\"^�h	�T,�>�����Y���P���i]�1�X�PuR�K;���U";break;case"ru":$g="�I4Qb�\r��h-Z(KA{���ᙘ@s4��\$h�X4m�E�FyAg�����\nQBKW2)R�A@�apz\0]NKWRi�Ay-]�!�&��	���p�D6}E�j��e>��N�S�h�Js!Q�\n*T�]\$��gr5��9&��Q4):\n1� ��\0P�b2��a��s_�p�H��N��G�X�JT��G�\r~�B߱0L4�Q#�!�Jn��K�M!��\"�k(��6�I�����R�Θ����&��a;D�x��r4��&�)��s<�S���t�\r����1=��B�6\nZ�9�����2&�T̸mZ쑖ЂR�����B�D\\! P��\r#p�@�j����p�NRZ�F)J����Rj��PI�W�j�t�%���0�:�\"�FH�1s��S��/\nin���h��i:��+�j���E\"�]���3,��G�ĮK�H̠f���*Ic�K[�\\�%;���e�2J\$��	0�c�^\$||�B��gI��\"hC�k\n�1PQc���,�:�SƄ���Fh7��}��2L)��'Ы��;\n�rOҰ��Үһ���ѲCg�(}�:u+q�t�焣#N�&�M�y�T��y\rE��P�P���O �pH�A�3jT�d���J�~���UZ�q�u�CҲ6���mIE���J�*�R�&#%m��˴�h������\$�2���H��WrF�5�蜯T!����KX*�#-G�o�����~W�����phk+�0����/���*Jya�m�Ժ��0r����4ڎ몹�*@Ѧ�N\nI9�@e\n2���r�����Y�b�~�pH�:Ur��,�=�Q��{�6�#p��p�:�c�9�è�\r�x��ac�9wc�0�!�{��H���R�:0�X��L�T�B�)͢�Qi�rUn�1�h-6-�A�HQ4D�c+%Ȁ�34���YgQ\"BA���oA��\$�PQ\"3B�I9*�Nk�r4W�Y�4����%D}񧓬�ι���	��t�C-�r���#��B�	#e6AJ8M!��#�Øw\r��yP�Hr�����w��f��4@��/��6���n��E0��(n���;����\">!�9����\0w!���C��\r��:�^A�n>L���|��\rg�4�C���r\r���\$`:'ȑF�TG�)�&'V#����lI�h��,�R^�hZ42�\rS�,�\0P[���;\r��(D���(�*\r�c���J\$�+��-bP\\���U��������LD��o8STK	��U\r0��E:x0Ȋ�S�A��6+�(��4DZ'Y��ı&������Z/4��J�A��(EM @xS\n�����l(��t��9�MG�9b.Բ�SV�5Jl&.���u�ON��%��P�T��\$%�ٙ�b�q\n�١���!��@�\0\n;gt1��y\$C|o|1���Q	��3��z��F\n�B����d�S�Җ� �H�s<1Ќ�rZ�	�17���+,u}+��\r4��+e�yo���s6��� .M���tHYSM/�ؖZ�#崝vޟ �L@��W�����q5ƁW&�8�rQ��\r����E,�Y*�\nV���#�s<�Ρ@���\r	�љ8��j�(C�L�R�@B�F��G��'�Hg.K ���BpaLѠ-��3�l�^���\"[�ʅ05�a�Ȱ�p��*Z��P���rP�hj4s�۾�mSF�� @(&���L�x&)(��#�#���P�? ��p������\$%�n(&8)��^\$@�J\$�-���M2�A�\\\";\n�{YA\0�iz��2P0��(T|�U�a�e�74JuN���\\C&	��BP�3�}��Œ�P���t��2�1c;jT�J��)�g�24�X\\f�A������s��1�.�\"�c�C2]1��\$\n�zR��\$˨E�q\"";break;case"sk":$g="N0��FP�%���(��]��(a�@n2�\r�C	��l7��&�����������P�\r�h���l2������5��rxdB\$r:�\rFQ\0��B���18���-9���H�0��cA��n8��)���D�&sL�b\nb�M&}0�a1g�̤�k0��2pQZ@�_bԷ���0 �_0��ɾ�h��\r�Y�83�Nb���p�/ƃN��b�a��aWw�M\r�+o;I���Cv���M��\n����Db#�&�*�����0��<���P9P������96JPʷ�#�@����4��Z�9�*2����Ҹ�2;��'��a�-`�8 Q�F<��0�B\"`�?���0���ʓ���K�`9.���(�6���2��I���� �֎@P��C%l6��P��\$�<4\r����q`�993,B�̓2sBs���M��� @1 ��>���A��\0�֎�P��M�pHR���4'��\rc\$7����-\r�T)1�b])�B�1�o����(Z���P�2(PdWK��\$�ΐ\r-~�El`���ݠ0�E�?����M�6\r6��[�[�����I�Ck]˥uݶ�@;%-�J=K�@t&��Ц)�C \\6���凎B�m\\(�\$_\r�R����8�3;*\r��7!\0�7c��c��:��@�e�cX9e#�o���u������R���͇l��rb��#���ܐ̉���~M����.C9��X�1�\"B;�22\rc���L�~��Iru�3:,1*\"j��1���;�����ÝNR��M;��9�{&�0�)_6���;�v��8\r#�����H2���D4����x���抌Ar&3��Ϛ<6Yg\"7�X��#�t/����H�8'��}�@Ѝ�?h�5��������蔯+��f�<��7'@�� \\�h880@v̱L@�h27c��E��?!�\n�y�\0()�-:��� s�F�]Z� G��s�4��g��Y-%�Ŕ7UH#RL>&��{�|�EkYG@^�TZ�Э?�8����b�	<K�}�\0�¤\nb�)��T�S��/��&�\"qL}�T����u8�\0005@�b�C�e1PҒ��*|����\\�\0S\n!0G�pO� �P(ܟ�sv�\nQ�c��?�Uy��ɹ�'���iX��<�8!��0����JҴ��,Y<7n4P���NёA�!y�g�C����!���\n�Z�\rp\0�8�y�1AgR�������zp&H��b>S,�n\r	��P��h8]�\$��bS�	Q�au��ړ�\n�\\�%\0Lԡ(p�l��'��П\n��f#Q�GA)\n�\0���H�#�}��6(d�mȖ`�^\\�����Jb���l���%Hc�����S��H�{@��r����nOe�h 5��d�JA��֙H�h���?7s����0�Ổ��*ډ���66N��(%�Fc+��@)�J%6�H�b�0���>(N�\n�f����^�)���\0;T�P@";break;case"sl":$g="S:D��ib#L&�H�%���(�6�����l7�WƓ��@d0�\r�Y�]0���XI�� ��\r&�y��'��̲��%9���J�nn��S鉆^ #!��j6� �!��n7��F�9�<l�I����/*�L��QZ�v���c���c��M�Q��3���g#N\0�e3�Nb	P��p�@s��Nn�b���f��.������Pl5MB�z67Q����>�g�k5�3t��r�ρD�ы(�P�	FS��U8F���zi6�3�i�I2��sy�O����\nE.������/b�;Z�4��P ,��)���6�H�N�!-��Bj\n�D�8�7��(�9!1 ��#�j����0쏡�[�PAB�6qhi\0�)�\0��P�֍H�'&��7�h �2E���I����\$�0�PԒ͡�7ˀP��K@�pHO����!+�֣I�t�#I,�	�BI	����:n���B(Z6�#J�'��P���ܖ�<#r[%�%p�'�b����O�+�(V�Zn�?��yQ*����l��WuD4��T��\rŋhX�\0엏I@�	@t&��Ц)�C \\6����y�B�2����:U�d^�E�,P�T�rL9�\"���Tp��\rØ�1�l��3�`@�-�������6�|l7�P9�)z.��ϋ87��h�)�B0\\X�f���ی�A��U�h�ɒrn:�c�P��c�7�r�<S�H�E�x�7�/���R��V����/U[.-��� )x�\r�#�\r�c�5]j�����X2���D4����x�˅ͶOM�����=\0���#H�7�93#�/�X��H�82�h�:�x�?���4>��AP(�\"Mᯎ�����}�H���x�Ȃ\$�ϦпZ�x\$\n\0P�(�M+�{p7��J�'*����Ɋf��N�\"����}������x`#j � ���0s=��%�hB�yGm0���vd���K��(��Za���&g�(_� _O���Lx_�4Dx��@Q�1��[��@m�7=��0�\0fTD�p�)>Ǡ����1aș�(8��\n�\r'T�2�.mD���(��a)h;��j��(�4�-��ZX	\nr��5�\\�1zL+&E��H��>�0�I#[2g��\\�	xCE���tͩ8/E��> �oԹ.A)�v�O˩�T*`Z�ng�㗇�R��>��DE�fx��g�BJ���\$3i��շ7�9.3�h@e�7L,�~/�T1	Ir.��(�٘��d6�ŲԢ��a��9��-��7H��)iB���z1�\n�I[��4F/�BJj�yT���0�ͱ�R���\nP�c�SU6O	�S��b�x�p�XѭLd��\$fe�T�,��uj�Hx\$�J\r��<.���`Д�ڶ/�1�I@�À";break;case"sr":$g="�J4��4P-Ak	@��6�\r��h/`��P�\\33`���h���E����C��\\f�LJⰦ��e_���D�eh��RƂ���hQ�	��jQ����*�1a1�CV�9��%9��P	u6cc�U�P��/�A�B�P�b2��a��s\$_��T���I0�.\"u�Z�H��-�0ՃAcYXZ�5�V\$Q�4�Y�iq���c9m:��M�Q��v2�\r����i;M�S9�� :q�!���:\r<��˵ɫ�x�b���x�>D�q�M��|];ٴRT�R�)��H�3�)C�����mj�\$��?ƃF�1E��D4�8���t�%L�n�5�8���x�&�45-�J�h%��z�)Ţ�!I�:۬�е�*��H�\"��h\"|�>��r\\-q,2�5�Z�������E\$�+\$�J���z��,mZHQ&EԂA6���#LtU8��i���R�rX\$�Tf����6�\\H�22ⴲσT�Q�dB�.)!?E>��Q1O;�)UT�6�\\�Tԡ(Ȃ3�:�U�!X�=a��2I����pH�A��S�4J0ΖuS>�(%��¤�0�?o=	V���\rU	��w�TZI���XȤ��\nJKq!\$��p��������N�D56�*�}���*�,e��Cq��Ji�\r% Au���/jh�c��K��H�+�d�ik�b�)�)i�e�dK6q�-��3��\$	К&�B��� \\6��p�<�Ⱥ�1�ʐ���ۗ�C`�9@�ڱ}���YQ����\r��<���9����c0�6`�3�C�X�\\\0�3�0A�X#l:��@��j\"�\"PR�!�b��E��?l.Ў�\rf���S��	s����Q���Y+����-q\\M�.�<X�\"�rb��e�/\r�D� i�X�ިr�t��\n#��\\l���bi��i�c2d_^�>���C��G\00�Ò���8��Z� ������Ah��8�^ü!��29��C�.���P�C��pa�7��Dtr9���߃X\"�\$6��apt��0��@ZH;!�]��CY�\r!���	�pt-fa�z[L��\$t��i{DaA#�n!A\0P	B36�QZ\n]hͩ*&��O�ӥ&N�	�Sjc\n�Z�\0ҕ�>F_yt����)�:A�r�L�BI�U]����i�Am̤��V��i�nrĚ��T�Q������Q�~BT��wr�f �S��\"ğ-U�J\0�����\np�w�I�L���LCR�;&�ÙB7F�1���|\$P1���Q	��3��r`�F\n��+��`D\\�t9��H�A��'�!�6���P)l��cpIh�G���C�i�8��)(R	J�RBX*�YR�j���0?r����yG��{�꠩:���1���>�T�P�iBm�6��5	�?h3n]M��C�A��~T� �4Q�(��\0U\n���A�T@A��+��&e�OP%U�Xjʭ�U�&N��X�dL�y����YD�\"���f�(�>�ܓ��1k肑Plf&<��Ն�U\0�`ՙ*!��j�j�FJ��ءoh�!��fѫR�Y,�����5���b�6�5F\r�V�©3��H�\ngx�y0?�R;c��F����]j�����򋴄C�e9a��D�yI�ԙ�Jf j�O�%!m�5c;(e�.�6f:b�s�f��\n첮�ܪ��_�";break;case"ta":$g="�W* �i��F�\\Hd_�����+�BQp�� 9���t\\U�����@�W��(<�\\��@1	|�@(:�\r��	�S.WA��ht�]�R&����\\�����I`�D�J�\$��:��TϠX��`�*���rj1k�,�Յz@%9���5|�Ud�ߠj䦸��C��f4����~�L��g�����p:E5�e&���@.�����qu����W[��\"�+@�m��\0��,-��һ[�׋&��a;D�x��r4��&�)��s<�!���:\r?����8\nRl�������[zR.�<���\n��8N\"��0���AN�*�Åq`��	�\no\0�7�2k,�SD)Y�,�:҄)\rkf�.b��:�C� �lJ�����Nr\$��Ţ��)2��0�\n��q\$&�����*A\$�:S���Pz��ik\0ҏ��9�#xܣ��U-�P�	J�8�\r,suY���B��\"�\"+I\\��Բ#6��|\"ܢʵ(�+�r\0�7��CU��Rl�,�A\\�'\r�{E�H_*�4�ة�P)��DX��\$B\0T�2�&4\r�R�B�\$��.k{��k=8�F�@�2��h�f�N=�ޮ�}��%\n�?���R���E|�Q\r�O`6�x\n���9Z�BO�S#z�Bͅ�J�d�8*�dgdD0%AY�D� c�����ue# W4AM�!A�r�J2GA]m9���6JtT�w����O �xH����a��j\0L��\r>�Α.�䈌M���pD1J�/�r��5�;��[�|ܥL�<	)֤BO.��dW5��u�H�H�ʓd1Z+�a�gr6\$����s�V�Z|*��b�UK�u7�3�7�S�R�H]��GF��ȏX����t�,����ފ���&�+��c���\$	К&�B��� ^6��x�<��Ȼ}B-�����1JLʦՃe����*́X�2~�y�by��ޗ	��AP7�P�Cpy�=�P��xs��6��Xs��9A���\n+ɣ�VO�(`��0��1H6fD<�b���+M�\$\\�\nrHg1�4�+���l���8���H��4b4��tS�m(!P&r��r�Xq�sF�Y��)W��w��M4Tj(�7�C\\�_g�E�2�����IvJ1���QۯlJ��D��DY�dd�G����%�WD+���{+{\r	{�&c\0PM!���#�.Øw\r�ɠP�Hr��'���w�Pf��4@��/��n�\r�s�3����2y���?�D|Cr=��i���X\"�\$Ӟ����<��໏�oh�Ap�x�Ht<�>�S��M �c'��n�rkw�5@h��\r \n\n (����\\�Y9!�P^VQ���\\ޛ���`|v-6�ȴ�\0�\n�X4���b��\\SP�%��Ґi��2&�J�ZTL\"�r8�H�+�tX)���SI���CN�T ���\n�M,Y���&��z����uj�o������\$�A�po!�����c�@'�0�^\$;�\"&6'�B�Q�J1��/�l#�x��)��ਖ਼�Rnv���P��f\r!�:�#�Cp �\$2�0�zC-%dֲ=3	(v��c�l�F�3��L(��Ap�` =S<#J[\0i4��Q��i �3�,9gd�ez�ci5'�G;]���������p{X9\rX��Dp;�v�(�3��\\�ȿ'�\$���J��jP��)MI,6�K�^t�aGi�e\\L�5Œ�6\\Ȭ��w�#��AU�ɬ�LЫ勏�#�B���\n�l\r!�5��&xv!�:��-B�Hf�TD�c�x�hu���1Q�B�F��N{�r�f2w�]j��!P��l(��b Q?����53�l1���/�8�!ۅFt��V� ���T]ʹ���9M&��yN^�f��E��*|��6�������N\"\$�z�%[�^�ڽ �fc��h�Ng	�����y1���Kl6�JaaH2�ˎ���[z��)l��+Ѹ���\\r�1މ��!kV�ٞ���Vc���nƈ�YX�k\"��5��e~ś6\\A�(L�ȭ�Cf�>���9?M9�Ӻ�hmC���1e�m�K2�I�@�r=����s�ZK~/�U2�8X�����TJ��I��ݖT��!�����6�������ŜƿRc\$��>�󰛘��.�M����d�_�����(�";break;case"th":$g="�\\! �M��@�0tD\0�� \nX:&\0��*�\n8�\0�	E�30�/\0ZB�(^\0�A�K�2\0���&��b�8�KG�n����	I�?J\\�)��b�.��)�\\�S��\"��s\0C�WJ��_6\\+eV�6r�Jé5k���]�8��@%9��9��4��fv2� #!��j6�5��:�i\\�(�zʳy�W e�j�\0MLrS��{q\0�ק�|\\Iq	�n�[�R�|��馛��7;Z��4	=j����.����Y7�D�	�� 7����i6L�S�������0��x�4\r/��0�O�ڶ�p��\0@�-�p�BP�,�JQpXD1���jCb�2�α;�󤅗\$3��\$��4��<3���/�m�J������'�6��Dڲ�6��@��)[t�����+.�~� ��s0/�p�#\r�R�'�L[IΓʕEhD)1q7��h���\rl�\n(��E��9�����*P��>�t\\�8�*/��TI9��&��35�kh��_���H\"U�����F�q8Ő�.��e|����&�l UP�I����sL�J�/\$�'���X�nK��\"�UZ���aY93d�\\!Wj�eQ5�����lT�'�J��'�\$!,�\n��w��Va�\$�b��.��b�����{Q;w��J:�ȓ9P�\\��C��> PH�� g��*�ث���W��3��:V�n;5��e78λ'Ä���lub�;+��7mK,Y;�������Ǻ�98�+���S�*���k����>o���k+AJQ{�Bkqf�a6%<�Ŋ�O� P�\$Bh�\nb��eH,��;F���V\\���~�2'qyJ\r���mjYfc�b��I�ݹ�CMȨ7�Ch�7!\0�7c��1����:��\0�7����?×�0��xa.nQ�u@��9���sI�?[�}I��^S\nA�R��Ry�6�aA9��w��*	��/�x��I�RH=�\"6p�2�d��V�����T	��e����U��;V�� \no�4���V\"Xsq47((J��c/ nq#((b�SI,d	����X�4����\"Ʋv�JS�`(&��C����;�����(x�9P��\0<'�B�`z�@t���^��.!�\0���t~�2��H+䊀�����t��}�����I\r�����J�/ �K�	|��{7?�0���C���zO��q`��9�j(g\"�S�:pf@�)���[�؝��8@P\0������Q\$���#��H8HЙ�R�V^�x�2�(]�b1�x�������-��w5���US��-���p��k9'4�ȼ�A9U�\$��܅Ժ�(���	�YZ��p3��\$Ob3.ƙVR����1��(,�A(���Q��R\n�-М�LR\0L��R&<��pT�����Ys��|R�7ɰA\"�i�((��@���>�,#I��ٸi�q�h��xm�O��@��0<uZ�C�~�S�+*����5k))�]�j3+P�T�/1\n\n��\$��-+����.*r�vu�I�yEA�\\��j�HJ�C�Mn)K�(6��Hc\ru`���N2�*em��Ұ�L���)�B�T��	J�J<�a�3������;ev���qa��:Ū�O₫��;g'��A�����s���O�(��E׎z+�`��\$Kz��__��,'c���fHh�p�C��ck����檔�O����� �(��W�t^����_C&�قcG�ހ�[6�Gqe��Nףǉg�1�P�VP�^y��Y��<xak|��\n2bƘ��`+�q��wUNV8� �/uf�+qkq\\J\0";break;case"tr":$g="E6�M�	�i=�BQp�� 9������ 3����!��i6`'�y�\\\nb,P!�= 2�̑H���o<�N�X�bn���)̅'��b��)��:GX���@\nFC1��l7ASv*|%4��F`(�a1\r�	!���^�2Q�|%�O3���vM��A�\\ 7\\����e9��3���a:sF�Nd�p���'������tFK���!�vt�	�@e���#>��ǜ��㑄���̠���%�%�M��	��:���I�r�?���F���� 5���	�\"i�h`t�t�T�;��ơ���䐣��#���#Cd<Ck��L�PX9�`�*�#��z�:A\"cJ���j�����1��˷\0�0b\nh��Do`Ҳ�Bb���!c�,L��Ae�\\���:2��<��k�1����\\�8c9�\0�a��X�#�먠��h�>�p�<���8/�h��4�4�#ɋ^厫��Z;KC-\rD\"��7K� �K2����T8�ӣ�^6TI:�4���)�B �h��<�Ⱥ�#Z3���^�Pe86E��7�xa���֟H��޹��p�Zc��1�����΁ac49\\c�0��d��ڍP9�)<I8#�0��)�H@58�\\�(ڞ4#[�9���N!+,�P��m[���0�(ȟ\$�zv9��;U�����9�\r��_%�9�j�@��ޙ���6/�̘�C.5�˕寨&�9��8l#��ʣ(�8=�(ɉ����9�0z\r��8Ax^;�uO~#�rJ3��<?H3��L�ˎ������XD	#h��&#�x�!����@�*�h#��\r,(��\\=\nN*�Ct��\rh�1��#v�(	������ڎ�aB��4������{\n�*�ff�C�ZC�BR��ir?���0�N�A<�c��=�?z˗f\0���h�TYȟ#� � Ԕy�q'[���^X \n<)�CdG�2�|��>�Ĵ�+*\$]��&���2��.@�֘ G�4�5�G\n\n|\$�(�3���oT；���Q	��3ZH�F\n��Uh�Ñ�v109\"e��1�J&�!�8��2b0�d^��vɊ��&��g���k�f�:!���+�61�5G�����Me���'�Hr)�E7�rX��i�h�6��_Ҍ	A'1uVM��\n�P#�p�C�8��<ǹ*��q�<���HNp����}���t��'-�Ĺ�5�L\nb�	��3���CŖ? �h^Q����GY#\$��%�|�:�TϚJ~��� �(�y}`(��\$�H0�ؘ�t.�\0��X�/�cH^��T S��1�ȣÁH��7�f2\rClbR�t��a�3�\\��J`\\��R<Ź�U'1�";break;case"uk":$g="�I4�ɠ�h-`��&�K�BQp�� 9��	�r�h-��-}[��Z����H`R������db��rb�h�d��Z��G��H�����\r�Ms6@Se+ȃE6�J�Td�Jsh\$g�\$�G��f�j>���C��f4����j��SdR�B�\rh��SE�6\rV�G!TI��V�����{Z�L����ʔi%Q�B���vUXh���Z<,�΢A��e�����v4��s)�@t�NC	Ӑt4z�C	��kK�4\\L+U0\\F�>�kC�5�A��2@�\$M��4�TA��J\\G�B��4��;��!/�(+`���P���{\\��\r�'��T��SX6��VZ(�\"I(L�` ���ʱ\n�f@��\\�����.)D����(S�kZڱ-�ꄗ.�YD��~�HM�V�F: ��E:f�F��(ɳ˚l�G�L���A�;�Szu CD�R�J��`�hr@�=������B��s;�h4�TJ�&\n4MM�_5�d:4O�j�@���GD�C�W�%�Nܦ�����\"�G31R��s*����#@�%�HKh�=k[�sU�Ő`���]E��\\wXc^1CV]#E�f�����Sr\rWM��Z�R�����\$�1�w��aE(Z6�.�]7���R�����zPr\\�OY4����ec��c.��b������c\nj<�`�X\\�-^Z��َQ,��\\?ʣC��9���)Z#w���FmND-�����b֔�y�[��&.۶Se\n4��v�^��.@ob�a�����\0P�:W�*���f�]E����p��p�:�c�9�è�\r�x�q�ˌ#>*7��\r�����R��Z�}\$K�*�!�b�����\\�#�,������U*��h�(L���Z3 �.�I�I3鲅!�:qp��v*�K��������i�J��	~Uc����y.2EM��rF�M�Tt�Z�wʮ\n'Ԫ���)�}�!�Ohagx9�TøoKD2���C�e�,�C0=A�:@��x/�,��Cpe@�p^CtWy���A�!��H��0a\r����C��\r�`:�^A�Xv�����v�a\rg 4�C���tw��X\$���͚�1�h�Ғ��HP	@����z`����0�I9Nkʭ!G�#��Q�A&����!�E���ّ�!�X��42�D*K)�;�sr}��� �>��QJ;D ����z����MR褛1\n�^��ymM��H�IT%+��+D��Q�g=͗�TzC�:�W\$�~��� \n<)�E�Hl�g�����]�=T�C>�g�o��^3vʯP��+��P��HIL�zL䀗����x�4e�K��js�7��A�i��)��1�9B`�*8nZ!�8C)\r!j�r\rᴌE#��ҜHo�J�|��	�k59��C*J�	�\"��֢�Y��Cd��3�@Z�]wC�p���%~-JĴ:�ck۳l��g>�(Щ����8��P\nn 6��Q��\\��mY��k��{4Xغ��1:\$ι\0��T��u�`�1HG`B�F��E����g'��K���.�	JM�xéuJ�Y�?����)��I�\\�Ȩ��%�n/l܃�F�_��/:l��\$͘�LI��\r�+ؚ�N���	�`3�|\nP�,��zE��7D�ʟ�P9�Wd\0���0	�r	*��f�� 5�����\\l!�նU�娯Ċ���:#S8��*(d� +(T`��A�<�B�Kd}���Ĺ��f\$޸�[�zg�(��Iz\r�H1��ȩ�v�JJ�[��@����>*�#L�Bc��?���\"�&=h��~���3�;9P�R �";break;case"vi":$g="Bp��&������ *�(J.��0Q,��Z���)v��@Tf�\n�pj�p�*�V���C`�]��rY<�#\$b\$L2��@%9���I�����Γ���4˅����d3\rF�q��t9N1�Q�E3ڡ�h�j[�J;���o��\n�(�Ub��da���I¾Ri��D�\0\0�A)�X�8@q:�g!�C�_#y�̸�6:����ڋ�.���K;�.������i�n���������E�{\rB\n'��_���2�ka��!W�&Asv6�'H���ƻ�������vO�IvL�Ø�:�J8楩�B�a�k�j�*�#�ӊX�\n\npE�ɚ44�K\n�d����@3��!��pK� P�k�<�H\n3��|��/�\"1J'\0��ҕ��	Z80��ț'��a��`�/?�zT�&! bk��/�B<@�(3��/%3��L�\$q*��C����:�@��LpѪ PH�� gN��	X�n	~�/E+�1�L�a�M�]�@����pM���	\n,�Ak`�2�S�N��I�Y�6Fs!w3F��'<�ՁS�a+\rfP���F���_��l<4D<��X@t&��Ц)�B��\"�Z6��h�2;vC�ʲ��6-��۴K�P�����e�'i#�*H�����;���ճCd�G#�Nd�dl�>Ft�\r̨Hp�J�n�С�b��#dcNi�F�M\0��I �l��]c�]qC(�6��Η=���>i�6\"c(�9�/�\\(^�TP:�z������_���1O��g;��CMe�[6�s�ߚ�/�|���4C(��C@�:�^���\\0��k�2�Ap�9�x�7xC� 7o��^#��2��`�1\r����;҃)����x�[��o=��W�\r	r��[�	\"�DI����\n�.���\n (ELf��?��� ބ�[&���R����gi}	>��U��RQ@�����g�+�z��QhZ�t�R~�`h��T�C�~��k�1��\nIpDb�z�\"DI	Q,�@'�0�ië-fD��,n���&yv�rrN�)=�D[ƈC�,b�+�^I���BQ!���_1Wnѥʦ#�]�0T����5�4J\$dcP�7���3\$͙p���N�g��5���7(�!�1% �3���.A(��*��q��!���\n\r��p����Љ�) 9&\nbQ+۲FqLm���bcQ�o �T*`Z%B�Ġ��\"d�\\M}�24�@q�2�1�#�K��2�|�]&S,D�_Z���\$�K7�-�,����E���mK8rJ�01��b�S�3i)0,v�����89�c\$���� �&�b�\"GdxF��d���m�Tx�s��*G5H����3'��w�5M�}�(�H���=�KD4�Mp�";break;case"zh":$g="�^��s�\\�r����|%��:�\$\nr.���2�r/d�Ȼ[8� S�8�r�!T�\\�s���I4�b�r��ЀJs!Kd�u�e�V���D�X,#!��j6� �:�t\nr���U:.Z�Pˑ.�\rVWd^%�䌵�r�T�Լ�*�s#U�`Qd�u'c(��oF����e3�Nb�`�p2N�S��ӣ:LY�ta~��&6ۊ��r�s���k��{���f�q�w��-���\n�2���#*�B!@�L�N�z�Ш@F��:QQ�W���s�~�r.�ndJ��X��ˊ�;.�M(�bx���d�*�c�T�Ans�%��O-�3��!J��1.[\$�h����V��d�Dc�M��Al����N-9@��)6_��D����/K��L��t*[�\$j�W��9@@���4^����F'<�\$̩!`r�e�<�1Hx�DA�-ˁA b�����8s��ZN]��\"�^��9zW%�s\0]�A��Y�E�t�I�E�+!(Z���A�bZN��A�#%��Q7O	[�y#TL,5�j�A�-�@0�7��P�\$Bh�\nb�-�7(�.��h�� TUUd���`�9%��E2��seA�J=\"���\r��<���9����c0�6`�3���X�X`�3�.`A�YA\0���XP9�-�L�\0�)�B0@���9F*�IF�֕�'�i+`8\n�>�\nx��7���~B�%	vtEZW�z���Os�CĈdl��Z!,XMS�����ՎL��9��x�;����4�C(�����#0z\r��8Ax^;�p�2ecp�9����wP<5x~��M �94#�&/�xP��H�83�oR:�x�(��֍�K�#[*4���G��Cp�.���@z�NUD�_3�)�@(	�A��)�=�a���L���A�!�j�1��[V�K��20\$ԛ���0��͡�y��ʌP<�LEQ?�Ϭ'�0���<%o�G�\"��R/B\0B�X5H \"J�q�\$H��0�\0�k�\r�|8��C8 \naD&\0�g���q�*>���K�pOU�E`��h n��:BдN���t\\�q6b˺\rC�M�D�#�x%��� #�	.��Ȃ\n#ĺ9M��X�Q&#L`C^��0�Ck\r�Ǉ`���a44�f�\r�F��:��@��Y\n�P#�pHc��4ڲ��##�����G��Ub��+���l��˼L��8Z(�JA~\\D�/	D��4&�@�b�s�F�'0��P\\�Q� �k��t�ԗH�A2%�C�s�dL\r�ʚ�b���%�%��C�\$�0�H\rTφ3V���OGInfr�2�a�-Q' !̢�`��\na'1B#��9�1P";break;case"zh-tw":$g="�^��%ӕ\\�r�����|%��u:H�B(\\�4��p�r��neRQ̡D8� S�\n�t*.t�I&�G�N��AʤS�V�:	t%9��Sy:\"<�r�ST�,#!��j6�1uL\0�����U:.��I9���B��K&]\nD�X�[��}-,�r����������&��a;D�x��r4��&�)��s3�S���t�\r�A��b���E�E1��ԣ�g:�x�]#0, (��4���\r���G�q��Z���S� )ЪOLP\0��Δ�:}����r���yZ��se�\\B��ABs�� @�2*bPr��\n���/k��)�P��)<�ĩp���Y.R�D��L�GI,I��i.�Oc�t��\0F��dt�)�\\��*��ڬ�ey�L��)pY��r��2���v��Y`\\��0�d,��\$��PMd�\\���\0�<�@��C�N3�PH�� gD��Y N(Kq�]�g1G��9{;��q\$r�Dx�'�:ZE���9Q�%�C�d��V�IZ�e��_�AU=��*K���	\\��yr���[\n˖]��*[W�lȜ�y|�*�@�	�ht)�`P�<݃Ⱥ\r�h\\2�e\\I��C`�9=��t�*�/1Y�p�7��h�7!\0�7c��1���:��\0�7���5#�\"0���ea,�6�#��?�H�4J�	�!�b��ԍ�X�7/ϑt��k�0���`���]�	�O͘K\")�#H�7)A�Qg)+�>޻��0��@��jFh�F���3s\"&�#�`93��;���2���9� \\�-���D4����x�х�ɘ\r�(�q#8_����a�k�p^5#���о�a�XD	#h��\r���}�Kd7�-PA�hY`��uXwR7��3@�,A�#�4�w%ġ^s�t(	���0\\CAH!�%n>6p·0�#�V�BVy��n���&t�0���\\4��MK��'���S�G(�B�\0�  _E�L��U���l�@��\r0�áT�:&\"���K̙�l=�<p���A�3�\0�B` ƌ�',��P�!�<����^�i{a�9����3.��\n�d�Ө�B�\r���&O,��lZy\09ӱ��F8���	c.@-:I	#�؈1�X��>/̈C_��0�Ck\r��`���a�P4�f#��F��\\:�\$�f�XU\n���@���:F�A�Q��s.1������~�e�'\0��/%�%@C\n�P���:j\0t�q8:	�J5\r	�+��A�@r+��/�s�&E9��'!��r�����!�:t^,�f�q�O<���\0�(�ʭ�@�l����Q��[5�M7�	�pN8j.�X�Q�D�C��_0��p���K�B�\0";break;}$xf=array();foreach(explode("\n",lzw_decompress($g))as$X)$xf[]=(strpos($X,"\t")?explode("\t",$X):$X);return$xf;}if(!$xf)$xf=get_translations($ba);if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$ce=array_search("SQL",$b->operators);if($ce!==false)unset($b->operators[$ce]);}function
dsn($Ab,$V,$H){try{parent::__construct($Ab,$V,$H);}catch(Exception$Ob){auth_error($Ob->getMessage());}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=$this->getAttribute(4);}function
query($I,$Df=false){$J=parent::query($I);$this->error="";if(!$J){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($J);return$J;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result($J=null){if(!$J){$J=$this->_result;if(!$J)return
false;}if($J->columnCount()){$J->num_rows=$J->rowCount();return$J;}$this->affected_rows=$J->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($I,$p=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch();return$L[$p];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$L=(object)$this->getColumnMeta($this->_offset++);$L->orgtable=$L->table;$L->orgname=$L->name;$L->charsetnr=(in_array("blob",(array)$L->flags)?63:0);return$L;}}}$yb=array();class
Min_SQL{var$_conn;function
Min_SQL($h){$this->_conn=$h;}function
quote($Y){return($Y===null?"NULL":$this->_conn->quote($Y));}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){global$b,$y;$Qc=(count($s)<count($N));$I=$b->selectQueryBuild($N,$Z,$s,$E,$_,$F);if(!$I)$I="SELECT".limit(($_GET["page"]!="last"&&+$_&&$s&&$Qc&&$y=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$N)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($s&&$Qc?"\nGROUP BY ".implode(", ",$s):"").($E?"\nORDER BY ".implode(", ",$E):""),($_!=""?+$_:null),($F?$_*$F:0),"\n");$Ue=microtime(true);$K=$this->_conn->query($I);if($he)echo$b->selectQuery($I,format_time($Ue));return$K;}function
delete($R,$ne,$_=0){$I="FROM ".table($R);return
queries("DELETE".($_?limit1($I,$ne):" $I$ne"));}function
update($R,$P,$ne,$_=0,$Ke="\n"){$Pf=array();foreach($P
as$z=>$X)$Pf[]="$z = $X";$I=table($R)." SET$Ke".implode(",$Ke",$Pf);return
queries("UPDATE".($_?limit1($I,$ne):" $I$ne"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$M,$fe){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}}$yb["sqlite"]="SQLite 3";$yb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$de=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
Min_SQLite($Zb){$this->_link=new
SQLite3($Zb);$Rf=$this->_link->version();$this->server_info=$Rf["versionString"];}function
query($I){$J=@$this->_link->query($I);$this->error="";if(!$J){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($J->numColumns())return
new
Min_Result($J);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetchArray();return$L[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
Min_SQLite($Zb){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Zb);}function
query($I,$Df=false){$ud=($Df?"unbufferedQuery":"query");$J=@$this->_link->$ud($I,SQLITE_BOTH,$o);$this->error="";if(!$J){$this->error=$o;return
false;}elseif($J===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($J);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->_result->fetch();return$L[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
Min_Result($J){$this->_result=$J;if(method_exists($J,'numRows'))$this->num_rows=$J->numRows();}function
fetch_assoc(){$L=$this->_result->fetch(SQLITE_ASSOC);if(!$L)return
false;$K=array();foreach($L
as$z=>$X)$K[($z[0]=='"'?idf_unescape($z):$z)]=$X;return$K;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$D=$this->_result->fieldName($this->_offset++);$Yd='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Yd\\.)?$Yd\$~",$D,$B)){$R=($B[3]!=""?$B[3]:idf_unescape($B[2]));$D=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$D,"orgname"=>$D,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
Min_SQLite($Zb){$this->dsn(DRIVER.":$Zb","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
Min_DB(){$this->Min_SQLite(":memory:");}function
select_db($Zb){if(is_readable($Zb)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Zb)?$Zb:dirname($_SERVER["SCRIPT_FILENAME"])."/$Zb")." AS a")){$this->Min_SQLite($Zb);return
true;}return
false;}function
multi_query($I){return$this->_result=$this->query($I);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$fe){$Pf=array();foreach($M
as$P)$Pf[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($M))).") VALUES\n".implode(",\n",$Pf));}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_".($Ed?" OFFSET $Ed":""):"");}function
limit1($I,$Z){global$h;return($h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($I,$Z,1):" $I$Z");}function
db_collation($m,$Za){global$h;return$h->result("PRAGMA encoding");}function
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
fields($R){global$h;$K=array();$fe="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$L){$D=$L["name"];$U=strtolower($L["type"]);$pb=$L["dflt_value"];$K[$D]=array("field"=>$D,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$pb,$B)?str_replace("''","'",$B[1]):($pb=="NULL"?null:$pb)),"null"=>!$L["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$L["pk"],);if($L["pk"]){if($fe!="")$K[$fe]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$K[$D]["auto_increment"]=true;$fe=$D;}}$Se=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Se,$C,PREG_SET_ORDER);foreach($C
as$B){$D=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($K[$D])$K[$D]["collation"]=trim($B[3],"'");}return$K;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$K=array();$Se=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*")++)~i',$Se,$B)){$K[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$C,PREG_SET_ORDER);foreach($C
as$B){$K[""]["columns"][]=idf_unescape($B[2]).$B[4];$K[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$K){foreach(fields($R)as$D=>$p){if($p["primary"])$K[""]=array("type"=>"PRIMARY","columns"=>array($D),"lengths"=>array(),"descs"=>array(null));}}$Te=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$L){$D=$L["name"];$w=array("type"=>($L["unique"]?"UNIQUE":"INDEX"));$w["lengths"]=array();$w["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($D).")",$i)as$Be){$w["columns"][]=$Be["name"];$w["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($D).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$Te[$D],$te)){preg_match_all('/("[^"]*+")+( DESC)?/',$te[2],$C);foreach($C[2]as$z=>$X){if($X)$w["descs"][$z]='1';}}if(!$K[""]||$w["type"]!="UNIQUE"||$w["columns"]!=$K[""]["columns"]||$w["descs"]!=$K[""]["descs"]||!preg_match("~^sqlite_~",$D))$K[$D]=$w;}return$K;}function
foreign_keys($R){$K=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$L){$hc=&$K[$L["id"]];if(!$hc)$hc=$L;$hc["source"][]=$L["from"];$hc["target"][]=$L["to"];}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($D))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($D){global$h;$Ub="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Ub)\$~",$D)){$h->error=lang(21,str_replace("|",", ",$Ub));return
false;}return
true;}function
create_database($m,$d){global$h;if(file_exists($m)){$h->error=lang(22);return
false;}if(!check_sqlite_name($m))return
false;try{$A=new
Min_SQLite($m);}catch(Exception$Ob){$h->error=$Ob->getMessage();return
false;}$A->query('PRAGMA encoding = "UTF-8"');$A->query('CREATE TABLE adminer (i)');$A->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->Min_SQLite(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error=lang(22);return
false;}}return
true;}function
rename_database($D,$d){global$h;if(!check_sqlite_name($D))return
false;$h->Min_SQLite(":memory:");$h->error=lang(22);return@rename(DB,$D);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$Mf=($R==""||$ec);foreach($q
as$p){if($p[0]!=""||!$p[1]||$p[2]){$Mf=true;break;}}$c=array();$Rd=array();foreach($q
as$p){if($p[1]){$c[]=($Mf?$p[1]:"ADD ".implode($p[1]));if($p[0]!="")$Rd[$p[0]]=$p[1][0];}}if(!$Mf){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$D&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)))return
false;}elseif(!recreate_table($R,$D,$c,$Rd,$ec))return
false;if($Da)queries("UPDATE sqlite_sequence SET seq = $Da WHERE name = ".q($D));return
true;}function
recreate_table($R,$D,$q,$Rd,$ec,$x=array()){if($R!=""){if(!$q){foreach(fields($R)as$z=>$p){$q[]=process_field($p,$p);$Rd[$z]=idf_escape($z);}}$ge=false;foreach($q
as$p){if($p[6])$ge=true;}$_b=array();foreach($x
as$z=>$X){if($X[2]=="DROP"){$_b[$X[1]]=true;unset($x[$z]);}}foreach(indexes($R)as$Vc=>$w){$f=array();foreach($w["columns"]as$z=>$e){if(!$Rd[$e])continue
2;$f[]=$Rd[$e].($w["descs"][$z]?" DESC":"");}if(!$_b[$Vc]){if($w["type"]!="PRIMARY"||!$ge)$x[]=array($w["type"],$Vc,$f);}}foreach($x
as$z=>$X){if($X[0]=="PRIMARY"){unset($x[$z]);$ec[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$Vc=>$hc){foreach($hc["source"]as$z=>$e){if(!$Rd[$e])continue
2;$hc["source"][$z]=idf_unescape($Rd[$e]);}if(!isset($ec[" $Vc"]))$ec[]=" ".format_foreign_key($hc);}queries("BEGIN");}foreach($q
as$z=>$p)$q[$z]="  ".implode($p);$q=array_merge($q,array_filter($ec));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$D":$D)." (\n".implode(",\n",$q)."\n)"))return
false;if($R!=""){if($Rd&&!queries("INSERT INTO ".table("adminer_$D")." (".implode(", ",$Rd).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Rd)))." FROM ".table($R)))return
false;$Af=array();foreach(triggers($R)as$zf=>$of){$yf=trigger($zf);$Af[]="CREATE TRIGGER ".idf_escape($zf)." ".implode(" ",$of)." ON ".table($D)."\n$yf[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$D")." RENAME TO ".table($D));if(!alter_indexes($D,$x))return
false;foreach($Af
as$yf){if(!queries($yf))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$D,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($D!=""?$D:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$fe){if($fe[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Tf){return
apply_queries("DROP VIEW",$Tf);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Tf,$hf){return
false;}function
trigger($D){global$h;if($D=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$v='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$_f=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$v\\s*(".implode("|",$_f["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($v))?\\s+ON\\s*$v\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($D)),$B);$Dd=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($Dd?" OF":""),"Of"=>($Dd[0]=='`'||$Dd[0]=='"'?idf_unescape($Dd):$Dd),"Trigger"=>$D,"Statement"=>$B[4],);}function
triggers($R){$K=array();$_f=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$L){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$_f["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$L["sql"],$B);$K[$L["name"]]=array($B[1],$B[2]);}return$K;}function
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
set_schema($Ee){return
true;}function
create_sql($R,$Da){global$h;$K=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$D=>$w){if($D=='')continue;$K.=";\n\n".index_sql($R,$w['type'],$D,"(".implode(", ",array_map('idf_escape',$w['columns'])).")");}return$K;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R,$Ye){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$K=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$z)$K[$z]=$h->result("PRAGMA $z");return$K;}function
show_status(){$K=array();foreach(get_vals("PRAGMA compile_options")as$Md){list($z,$X)=explode("=",$Md,2);$K[$z]=$X;}return$K;}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Xb);}$y="sqlite";$Cf=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Xe=array_keys($Cf);$Jf=array();$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$pc=array("hex","length","lower","round","unixepoch","upper");$rc=array("avg","count","count distinct","group_concat","max","min","sum");$Cb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$yb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$de=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($Mb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$H){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($H,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Rf=pg_version($this->_link);$this->server_info=$Rf["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$K=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($K)$this->_link=$K;return$K;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($I,$Df=false){$J=@pg_query($this->_link,$I);$this->error="";if(!$J){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($J)){$this->affected_rows=pg_affected_rows($J);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$p=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
pg_fetch_result($J->_result,0,$p);}}class
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
insertUpdate($R,$M,$fe){global$h;foreach($M
as$P){$Kf=array();$Z=array();foreach($P
as$z=>$X){$Kf[]="$z = $X";if(isset($fe[idf_unescape($z)]))$Z[]="$z = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Kf)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if($h->server_info>=9)$h->query("SET application_name = 'Adminer'");return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database ORDER BY datname");}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_".($Ed?" OFFSET $Ed":""):"");}function
limit1($I,$Z){return" $I$Z";}function
db_collation($m,$Za){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){return
get_key_vals("SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema() ORDER BY table_name");}function
count_tables($l){return
array();}function
table_status($D=""){$K=array();foreach(get_rows("SELECT relname AS \"Name\", CASE relkind WHEN 'r' THEN 'table' ELSE 'view' END AS \"Engine\", pg_relation_size(oid) AS \"Data_length\", pg_total_relation_size(oid) - pg_relation_size(oid) AS \"Index_length\", obj_description(oid, 'pg_class') AS \"Comment\", relhasoids::int AS \"Oid\", reltuples as \"Rows\"
FROM pg_class
WHERE relkind IN ('r','v')
AND relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
".($D!=""?"AND relname = ".q($D):"ORDER BY relname"))as$L)$K[$L["Name"]]=$L;return($D!=""?$K[$D]:$K);}function
is_view($S){return$S["Engine"]=="view";}function
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
ORDER BY a.attnum")as$L){preg_match('~([^([]+)(\((.*)\))?((\[[0-9]*])*)$~',$L["full_type"],$B);list(,$U,$ed,$L["length"],$xa)=$B;$L["length"].=$xa;$L["type"]=($va[$U]?$va[$U]:$U);$L["full_type"]=$L["type"].$ed.$xa;$L["null"]=!$L["attnotnull"];$L["auto_increment"]=preg_match('~^nextval\\(~i',$L["default"]);$L["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$L["default"],$B))$L["default"]=($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2];$K[$L["field"]]=$L;}return$K;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$K=array();$ff=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $ff AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption FROM pg_index i, pg_class ci WHERE i.indrelid = $ff AND ci.oid = i.indexrelid",$i)as$L){$ue=$L["relname"];$K[$ue]["type"]=($L["indisprimary"]?"PRIMARY":($L["indisunique"]?"UNIQUE":"INDEX"));$K[$ue]["columns"]=array();foreach(explode(" ",$L["indkey"])as$Gc)$K[$ue]["columns"][]=$f[$Gc];$K[$ue]["descs"]=array();foreach(explode(" ",$L["indoption"])as$Hc)$K[$ue]["descs"][]=($Hc&1?'1':null);$K[$ue]["lengths"]=array();}return$K;}function
foreign_keys($R){global$Gd;$K=array();foreach(get_rows("SELECT conname, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$L){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$L['definition'],$B)){$L['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$ld)){$L['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ld[2]));$L['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ld[4]));}$L['target']=array_map('trim',explode(',',$B[3]));$L['on_delete']=(preg_match("~ON DELETE ($Gd)~",$B[4],$ld)?$ld[1]:'NO ACTION');$L['on_update']=(preg_match("~ON UPDATE ($Gd)~",$B[4],$ld)?$ld[1]:'NO ACTION');$K[$L['conname']]=$L;}}return$K;}function
view($D){global$h;return
array("select"=>$h->result("SELECT pg_get_viewdef(".q($D).")"));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$K=h($h->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$K,$B))$K=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($K);}function
create_database($m,$d){return
queries("CREATE DATABASE ".idf_escape($m).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($D,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($D));}function
auto_increment(){return"";}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=array();$me=array();foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c[]="DROP $e";else{$Of=$X[5];unset($X[5]);if(isset($X[6])&&$p[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($p[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$me[]="ALTER TABLE ".table($R)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($p[0]!=""||$Of!="")$me[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Of!=""?substr($Of,9):"''");}}$c=array_merge($c,$ec);if($R=="")array_unshift($me,"CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($me,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$D)$me[]="ALTER TABLE ".table($R)." RENAME TO ".table($D);if($R!=""||$cb!="")$me[]="COMMENT ON TABLE ".table($D)." IS ".q($cb);if($Da!=""){}foreach($me
as$I){if(!queries($I))return
false;}return
true;}function
alter_indexes($R,$c){$jb=array();$zb=array();$me=array();foreach($c
as$X){if($X[0]!="INDEX")$jb[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$zb[]=idf_escape($X[1]);else$me[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($jb)array_unshift($me,"ALTER TABLE ".table($R).implode(",",$jb));if($zb)array_unshift($me,"DROP INDEX ".implode(", ",$zb));foreach($me
as$I){if(!queries($I))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$hf){foreach($T
as$R){if(!queries("ALTER TABLE ".table($R)." SET SCHEMA ".idf_escape($hf)))return
false;}foreach($Tf
as$R){if(!queries("ALTER VIEW ".table($R)." SET SCHEMA ".idf_escape($hf)))return
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
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$te))return$te[1];return
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
set_schema($De){global$h,$Cf,$Xe;$K=$h->query("SET search_path TO ".idf_escape($De));foreach(types()as$U){if(!isset($Cf[$U])){$Cf[$U]=0;$Xe[lang(23)][]=$U;}}return$K;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){global$h;return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".($h->server_info<9.2?"procpid":"pid"));}function
show_status(){}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|scheme|processlist|sequence|trigger|type|variables|drop_col)$~',$Xb);}$y="pgsql";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),lang(25)=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),lang(26)=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),lang(27)=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),lang(28)=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),lang(29)=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array();$Ld=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$pc=array("char_length","lower","round","to_hex","to_timestamp","upper");$rc=array("avg","count","count distinct","max","min","sum");$Cb=array(array("char"=>"md5","date|time"=>"now",),array("int|numeric|real|money"=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$yb["oracle"]="Oracle";if(isset($_GET["oracle"])){$de=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Mb,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$H){$this->_link=@oci_new_connect($V,$H,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$o=oci_error();$this->error=$o["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($I,$Df=false){$J=oci_parse($this->_link,$I);$this->error="";if(!$J){$o=oci_error($this->_link);$this->errno=$o["code"];$this->error=$o["message"];return
false;}set_error_handler(array($this,'_error'));$K=@oci_execute($J);restore_error_handler();if($K){if(oci_num_fields($J))return
new
Min_Result($J);$this->affected_rows=oci_num_rows($J);}return$K;}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$p=1){$J=$this->query($I);if(!is_object($J)||!oci_fetch($J->_result))return
false;return
oci_result($J->_result,$p);}}class
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
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($v){return'"'.str_replace('"','""',$v).'"';}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return($Ed?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $I$Z) t WHERE rownum <= ".($_+$Ed).") WHERE rnum > $Ed":($_!==null?" * FROM (SELECT $I$Z) WHERE rownum <= ".($_+$Ed):" $I$Z"));}function
limit1($I,$Z){return" $I$Z";}function
db_collation($m,$Za){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($D=""){$K=array();$Fe=q($D);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($D!=""?" AND table_name = $Fe":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($D!=""?" WHERE view_name = $Fe":"")."
ORDER BY 1")as$L){if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$K=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$L){$U=$L["DATA_TYPE"];$ed="$L[DATA_PRECISION],$L[DATA_SCALE]";if($ed==",")$ed=$L["DATA_LENGTH"];$K[$L["COLUMN_NAME"]]=array("field"=>$L["COLUMN_NAME"],"full_type"=>$U.($ed?"($ed)":""),"type"=>strtolower($U),"length"=>$ed,"default"=>$L["DATA_DEFAULT"],"null"=>($L["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$L){$Ec=$L["INDEX_NAME"];$K[$Ec]["type"]=($L["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($L["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$K[$Ec]["columns"][]=$L["COLUMN_NAME"];$K[$Ec]["lengths"][]=($L["CHAR_LENGTH"]&&$L["CHAR_LENGTH"]!=$L["COLUMN_LENGTH"]?$L["CHAR_LENGTH"]:null);$K[$Ec]["descs"][]=($L["DESCEND"]?'1':null);}return$K;}function
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
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=$zb=array();foreach($q
as$p){$X=$p[1];if($X&&$p[0]!=""&&idf_escape($p[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($p[0])." TO $X[0]");if($X)$c[]=($R!=""?($p[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$zb[]=idf_escape($p[0]);}if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$zb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$zb).")"))&&($R==$D||queries("ALTER TABLE ".table($R)." RENAME TO ".table($D)));}function
foreign_keys($R){return
array();}function
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
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Ee){global$h;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Ee));}function
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
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Xb);}$y="oracle";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),lang(25)=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),lang(26)=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),lang(27)=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array();$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$pc=array("length","lower","round","upper");$rc=array("avg","count","count distinct","max","min","sum");$Cb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$yb["mssql"]="MS SQL";if(isset($_GET["mssql"])){$de=array("SQLSRV","MSSQL");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$o){$this->errno=$o["code"];$this->error.="$o[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$H){$this->_link=@sqlsrv_connect($O,array("UID"=>$V,"PWD"=>$H,"CharacterSet"=>"UTF-8"));if($this->_link){$Ic=sqlsrv_server_info($this->_link);$this->server_info=$Ic['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($I,$Df=false){$J=sqlsrv_query($this->_link,$I);$this->error="";if(!$J){$this->_get_error();return
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
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;$L=$J->fetch_row();return$L[$p];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;}function
_convert($L){foreach((array)$L
as$z=>$X){if(is_a($X,'DateTime'))$L[$z]=$X->format("Y-m-d H:i:s");}return$L;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC,SQLSRV_SCROLL_NEXT));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC,SQLSRV_SCROLL_NEXT));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$p=$this->_fields[$this->_offset++];$K=new
stdClass;$K->name=$p["Name"];$K->orgname=$p["Name"];$K->type=($p["Type"]==1?254:0);return$K;}function
seek($Ed){for($t=0;$t<$Ed;$t++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$H){$this->_link=@mssql_connect($O,$V,$H);if($this->_link){$J=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$L=$J->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$L[0]] $L[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($I,$Df=false){$J=mssql_query($I,$this->_link);$this->error="";if(!$J){$this->error=mssql_get_last_message();return
false;}if($J===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result);}function
result($I,$p=0){$J=$this->query($I);if(!is_object($J))return
false;return
mssql_result($J->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
Min_Result($J){$this->_result=$J;$this->num_rows=mssql_num_rows($J);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$K=mssql_fetch_field($this->_result);$K->orgtable=$K->table;$K->orgname=$K->name;return$K;}function
seek($Ed){mssql_data_seek($this->_result,$Ed);}function
__destruct(){mssql_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$M,$fe){foreach($M
as$P){$Kf=array();$Z=array();foreach($P
as$z=>$X){$Kf[]="$z = $X";if(isset($fe[idf_unescape($z)]))$Z[]="$z = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Kf)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($v){return"[".str_replace("]","]]",$v)."]";}function
table($v){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("EXEC sp_databases");}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return($_!==null?" TOP (".($_+$Ed).")":"")." $I$Z";}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($m,$Za){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name =  ".q($m));}function
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
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$L){$U=$L["type"];$ed=(preg_match("~char|binary~",$U)?$L["max_length"]:($U=="decimal"?"$L[precision],$L[scale]":""));$K[$L["name"]]=array("field"=>$L["name"],"full_type"=>$U.($ed?"($ed)":""),"type"=>$U,"length"=>$ed,"default"=>$L["default"],"null"=>$L["is_nullable"],"auto_increment"=>$L["is_identity"],"collation"=>$L["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$L["is_identity"],);}return$K;}function
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
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".(+$_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=array();foreach($q
as$p){$e=idf_escape($p[0]);$X=$p[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($p[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($ec[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($D)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$D)queries("EXEC sp_rename ".q(table($R)).", ".q($D));if($ec)$c[""]=$ec;foreach($c
as$z=>$X){if(!queries("ALTER TABLE ".idf_escape($D)." $z".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$w=array();$zb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$zb[]=idf_escape($X[1]);else$w[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$w||queries("DROP INDEX ".implode(", ",$w)))&&(!$zb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$zb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$I){$h->query("SET SHOWPLAN_ALL ON");$K=$h->query($I);$h->query("SET SHOWPLAN_ALL OFF");return$K;}function
found_rows($S,$Z){}function
foreign_keys($R){$K=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$L){$hc=&$K[$L["FK_NAME"]];$hc["table"]=$L["PKTABLE_NAME"];$hc["source"][]=$L["FKCOLUMN_NAME"];$hc["target"][]=$L["PKCOLUMN_NAME"];}return$K;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$hf){return
apply_queries("ALTER SCHEMA ".idf_escape($hf)." TRANSFER",array_merge($T,$Tf));}function
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
set_schema($De){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
support($Xb){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Xb);}$y="mssql";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),lang(25)=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),lang(26)=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),lang(27)=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array();$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$pc=array("len","lower","round","upper");$rc=array("avg","count","count distinct","max","min","sum");$Cb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$yb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$de=array("SimpleXML");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($I,$Df=false){$G=array('SelectExpression'=>$I,'ConsistentRead'=>'true');if($this->next)$G['NextToken']=$this->next;$J=sdb_request_all('Select','Item',$G,$this->timeout);if($J===false)return$J;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$I)){$bf=0;foreach($J
as$Rc)$bf+=$Rc->Attribute->Value;$J=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$bf,))));}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
Min_Result($J){foreach($J
as$Rc){$L=array();if($Rc->Name!='')$L['itemName()']=(string)$Rc->Name;foreach($Rc->Attribute
as$Aa){$D=$this->_processValue($Aa->Name);$Y=$this->_processValue($Aa->Value);if(isset($L[$D])){$L[$D]=(array)$L[$D];$L[$D][]=$Y;}else$L[$D]=$Y;}$this->_rows[]=$L;foreach($L
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Eb){return(is_object($Eb)&&$Eb['encoding']=='base64'?base64_decode($Eb):(string)$Eb);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$z=>$X)$K[$z]=$L[$z];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Wc=array_keys($this->_rows[0]);return(object)array('name'=>$Wc[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$fe="itemName()";function
_chunkRequest($Cc,$qa,$G,$Rb=array()){global$h;foreach(array_chunk($Cc,25)as$Ta){$Vd=$G;foreach($Ta
as$t=>$u){$Vd["Item.$t.ItemName"]=$u;foreach($Rb
as$z=>$X)$Vd["Item.$t.$z"]=$X;}if(!sdb_request($qa,$Vd))return
false;}$h->affected_rows=count($Cc);return
true;}function
_extractIds($R,$ne,$_){$K=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$ne,$C))$K=array_map('idf_unescape',$C[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$ne.($_?" LIMIT 1":"")))as$Rc)$K[]=$Rc->Name;}return$K;}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){global$h;$h->next=$_GET["next"];$K=parent::select($R,$N,$Z,$s,$E,$_,$F,$he);$h->next=0;return$K;}function
delete($R,$ne,$_=0){return$this->_chunkRequest($this->_extractIds($R,$ne,$_),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$ne,$_=0,$Ke="\n"){$qb=array();$Mc=array();$t=0;$Cc=$this->_extractIds($R,$ne,$_);$u=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$z=>$X){$z=idf_unescape($z);if($X=="NULL"||($u!=""&&array($u)!=$Cc))$qb["Attribute.".count($qb).".Name"]=$z;if($X!="NULL"){foreach((array)$X
as$Sc=>$W){$Mc["Attribute.$t.Name"]=$z;$Mc["Attribute.$t.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Sc)$Mc["Attribute.$t.Replace"]="true";$t++;}}}$G=array('DomainName'=>$R);return(!$Mc||$this->_chunkRequest(($u!=""?array($u):$Cc),'BatchPutAttributes',$G,$Mc))&&(!$qb||$this->_chunkRequest($Cc,'BatchDeleteAttributes',$G,$qb));}function
insert($R,$P){$G=array("DomainName"=>$R);$t=0;foreach($P
as$D=>$Y){if($Y!="NULL"){$D=idf_unescape($D);if($D=="itemName()")$G["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$G["Attribute.$t.Name"]=$D;$G["Attribute.$t.Value"]=(is_array($Y)?$X:idf_unescape($Y));$t++;}}}}return
sdb_request('PutAttributes',$G);}function
insertUpdate($R,$M,$fe){foreach($M
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
support($Xb){return
preg_match('~sql~',$Xb);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$Za){}function
tables_list(){global$h;$K=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$K[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$K;}function
table_status($D="",$Wb=false){$K=array();foreach(($D!=""?array($D=>true):tables_list())as$R=>$U){$L=array("Name"=>$R,"Auto_increment"=>"");if(!$Wb){$td=sdb_request('DomainMetadata',array('DomainName'=>$R));if($td){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$z=>$X)$L[$z]=(string)$td->$X;}}if($D!="")return$L;$K[$R]=$L;}return$K;}function
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
table($v){return
idf_escape($v);}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_":"");}function
unconvert_field($p,$K){return$K;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$D)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($ua,$mb,$z,$re=false){$Ma=64;if(strlen($z)>$Ma)$z=pack("H*",$ua($z));$z=str_pad($z,$Ma,"\0");$Tc=$z^str_repeat("\x36",$Ma);$Uc=$z^str_repeat("\x5C",$Ma);$K=$ua($Uc.pack("H*",$ua($Tc.$mb)));if($re)$K=pack("H*",$K);return$K;}function
sdb_request($qa,$G=array()){global$b,$h;list($_c,$G['AWSAccessKeyId'],$Ge)=$b->credentials();$G['Action']=$qa;$G['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$G['Version']='2009-04-15';$G['SignatureVersion']=2;$G['SignatureMethod']='HmacSHA1';ksort($G);$I='';foreach($G
as$z=>$X)$I.='&'.rawurlencode($z).'='.rawurlencode($X);$I=str_replace('%7E','~',substr($I,1));$I.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$_c)."\n/\n$I",$Ge,true)));@ini_set('track_errors',1);$Yb=@file_get_contents((preg_match('~^https?://~',$_c)?$_c:"http://$_c"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$I,'ignore_errors'=>1,))));if(!$Yb){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$Zf=simplexml_load_string($Yb);if(!$Zf){$o=libxml_get_last_error();$h->error=$o->message;return
false;}if($Zf->Errors){$o=$Zf->Errors->Error;$h->error="$o->Message ($o->Code)";return
false;}$h->error='';$gf=$qa."Result";return($Zf->$gf?$Zf->$gf:true);}function
sdb_request_all($qa,$gf,$G=array(),$nf=0){$K=array();$Ue=($nf?microtime(true):0);$_=(preg_match('~LIMIT\s+(\d+)\s*$~i',$G['SelectExpression'],$B)?$B[1]:0);do{$Zf=sdb_request($qa,$G);if(!$Zf)break;foreach($Zf->$gf
as$Eb)$K[]=$Eb;if($_&&count($K)>=$_){$_GET["next"]=$Zf->NextToken;break;}if($nf&&microtime(true)-$Ue>$nf)return
false;$G['NextToken']=$Zf->NextToken;if($_)$G['SelectExpression']=preg_replace('~\d+\s*$~',$_-count($K),$G['SelectExpression']);}while($Zf->NextToken);return$K;}$y="simpledb";$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$pc=array();$rc=array("count");$Cb=array(array("json"));}$yb["mongo"]="MongoDB (beta)";if(isset($_GET["mongo"])){$de=array("mongo");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($O,$V,$H){global$b;$m=$b->database();$Nd=array();if($V!=""){$Nd["username"]=$V;$Nd["password"]=$H;}if($m!="")$Nd["db"]=$m;try{$this->_link=@new
MongoClient("mongodb://$O",$Nd);return
true;}catch(Exception$Ob){$this->error=$Ob->getMessage();return
false;}}function
query($I){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$Ob){$this->error=$Ob->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
Min_Result($J){foreach($J
as$Rc){$L=array();foreach($Rc
as$z=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$z]=63;$L[$z]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$L;foreach($L
as$z=>$X){if(!isset($this->_rows[0][$z]))$this->_rows[0][$z]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$L=current($this->_rows);if(!$L)return$L;$K=array();foreach($this->_rows[0]as$z=>$X)$K[$z]=$L[$z];next($this->_rows);return$K;}function
fetch_row(){$K=$this->fetch_assoc();if(!$K)return$K;return
array_values($K);}function
fetch_field(){$Wc=array_keys($this->_rows[0]);$D=$Wc[$this->_offset++];return(object)array('name'=>$D,'charsetnr'=>$this->_charset[$D],);}}}class
Min_Driver
extends
Min_SQL{public$fe="_id";function
quote($Y){return($Y===null?$Y:parent::quote($Y));}function
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){$N=($N==array("*")?array():array_fill_keys($N,true));$Qe=array();foreach($E
as$X){$X=preg_replace('~ DESC$~','',$X,1,$ib);$Qe[$X]=($ib?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$N)->sort($Qe)->limit(+$_)->skip($F*$_));}function
insert($R,$P){try{$K=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$K['code'];$this->_conn->error=$K['err'];$this->_conn->last_id=$P['_id'];return!$K['err'];}catch(Exception$Ob){$this->_conn->error=$Ob->getMessage();return
false;}}}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
error(){global$h;return
h($h->error);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases($dc){global$h;$K=array();$nb=$h->_link->listDBs();foreach($nb['databases']as$m)$K[]=$m['name'];return$K;}function
collations(){return
array();}function
db_collation($m,$Za){}function
count_tables($l){global$h;$K=array();foreach($l
as$m)$K[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$K;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
table_status($D="",$Wb=false){$K=array();foreach(tables_list()as$R=>$U){$K[$R]=array("Name"=>$R);if($D==$R)return$K[$R];}return$K;}function
information_schema(){}function
is_view($S){}function
drop_databases($l){global$h;foreach($l
as$m){$ye=$h->_link->selectDB($m)->drop();if(!$ye['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$K=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$w){$tb=array();foreach($w["key"]as$e=>$U)$tb[]=($U==-1?'1':null);$K[$w["name"]]=array("type"=>($w["name"]=="_id_"?"PRIMARY":($w["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($w["key"]),"lengths"=>array(),"descs"=>$tb,);}return$K;}function
fields($R){return
fields_from_edit();}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){global$h;if($R==""){$h->_db->createCollection($D);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$ye=$h->_db->selectCollection($R)->drop();if(!$ye['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$ye=$h->_db->selectCollection($R)->remove();if(!$ye['ok'])return
false;}return
true;}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$D,$P)=$X;if($P=="DROP")$K=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$D));else{$f=array();foreach($P
as$e){$e=preg_replace('~ DESC$~','',$e,1,$ib);$f[$e]=($ib?-1:1);}$K=$h->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$D,));}if($K['errmsg']){$h->error=$K['errmsg'];return
false;}}return
true;}function
last_id(){global$h;return$h->last_id;}function
table($v){return$v;}function
idf_escape($v){return$v;}function
support($Xb){return
preg_match("~database|indexes~",$Xb);}$y="mongo";$Ld=array("=");$pc=array();$rc=array();$Cb=array(array("json"));}$yb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$de=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Xd,$gb=array(),$ud='GET'){@ini_set('track_errors',1);$Yb=@file_get_contents($this->_url.'/'.ltrim($Xd,'/'),false,stream_context_create(array('http'=>array('method'=>$ud,'content'=>json_encode($gb),'ignore_errors'=>1,))));if(!$Yb){$this->error=$php_errormsg;return$Yb;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Yb;return
false;}$K=json_decode($Yb,true);if(!$K){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$fb=get_defined_constants(true);foreach($fb['json']as$D=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$D)){$this->error=$D;break;}}}}return$K;}function
query($Xd,$gb=array(),$ud='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Xd,'/'),$gb,$ud);}function
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
select($R,$N,$Z,$s,$E=array(),$_=1,$F=0,$he=false){global$b;$mb=array();$I="$R/_search";if($N!=array("*"))$mb["fields"]=$N;if($E){$Qe=array();foreach($E
as$Ya){$Ya=preg_replace('~ DESC$~','',$Ya,1,$ib);$Qe[]=($ib?array($Ya=>"desc"):$Ya);}$mb["sort"]=$Qe;}if($_){$mb["size"]=+$_;if($F)$mb["from"]=($F*$_);}foreach((array)$_GET["where"]as$X){if("$X[col]$X[val]"!=""){$if=array("match"=>array(($X["col"]!=""?$X["col"]:"_all")=>$X["val"]));if($X["op"]=="=")$mb["query"]["filtered"]["filter"]["and"][]=$if;else$mb["query"]["filtered"]["query"]["bool"]["must"][]=$if;}}if($mb["query"]&&!$mb["query"]["filtered"]["query"])$mb["query"]["filtered"]["query"]=array("match_all"=>array());$Ue=microtime(true);$Fe=$this->_conn->query($I,$mb);if($he)echo$b->selectQuery("$I: ".print_r($mb,true),format_time($Ue));if(!$Fe)return
false;$K=array();foreach($Fe['hits']['hits']as$zc){$L=array();$q=$zc['_source'];if($N!=array("*")){$q=array();foreach($N
as$z)$q[$z]=$zc['fields'][$z];}foreach($q
as$z=>$X)$L[$z]=(is_array($X)?json_encode($X):$X);$K[]=$L;}return
new
Min_Result($K);}}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
support($Xb){return
preg_match("~database|table|columns~",$Xb);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$K=$h->rootQuery('_aliases');if($K)$K=array_keys($K);return$K;}function
collations(){return
array();}function
db_collation($m,$Za){}function
count_tables($l){global$h;$K=$h->query('_mapping');if($K)$K=array_map('count',$K);return$K;}function
tables_list(){global$h;$K=$h->query('_mapping');if($K)$K=array_fill_keys(array_keys(reset($K)),'table');return$K;}function
table_status($D="",$Wb=false){global$h;$Fe=$h->query("_search?search_type=count",array("facets"=>array("count_by_type"=>array("terms"=>array("field"=>"_type",)))),"POST");$K=array();if($Fe){foreach($Fe["facets"]["count_by_type"]["terms"]as$R)$K[$R["term"]]=array("Name"=>$R["term"],"Engine"=>"table","Rows"=>$R["count"],);if($D!=""&&$D==$R["term"])return$K[$D];}return$K;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$kd=$h->query("$R/_mapping");$K=array();if($kd){foreach($kd[$R]['properties']as$D=>$p)$K[$D]=array("field"=>$D,"full_type"=>$p["type"],"type"=>$p["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$K;}function
foreign_keys($R){return
array();}function
table($v){return$v;}function
idf_escape($v){return$v;}function
convert_field($p){}function
unconvert_field($p,$K){return$K;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),array(),'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
drop_tables($T){global$h;$K=true;foreach($T
as$R)$K=$K&&$h->query(urlencode($R),array(),'DELETE');return$K;}$y="elastic";$Ld=array("=","query");$pc=array();$rc=array();$Cb=array(array("json"));}$yb=array("server"=>"MySQL")+$yb;if(!defined("DRIVER")){$de=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
Min_DB(){parent::init();}function
connect($O,$V,$H){mysqli_report(MYSQLI_REPORT_OFF);list($_c,$be)=explode(":",$O,2);$K=@$this->real_connect(($O!=""?$_c:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$H!=""?$H:ini_get("mysqli.default_pw")),null,(is_numeric($be)?$be:ini_get("mysqli.default_port")),(!is_numeric($be)?$be:null));if($K){if(method_exists($this,'set_charset'))$this->set_charset("utf8");else$this->query("SET NAMES utf8");}return$K;}function
result($I,$p=0){$J=$this->query($I);if(!$J)return
false;$L=$J->fetch_array();return$L[$p];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$H){$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$H"!=""?$H:ini_get("mysql.default_password")),true,131072);if($this->_link){$this->server_info=mysql_get_server_info($this->_link);if(function_exists('mysql_set_charset'))mysql_set_charset("utf8",$this->_link);else$this->query("SET NAMES utf8");}else$this->error=mysql_error();return(bool)$this->_link;}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($I,$Df=false){$J=@($Df?mysql_unbuffered_query($I,$this->_link):mysql_query($I,$this->_link));$this->error="";if(!$J){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($J===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($J);}function
multi_query($I){return$this->_result=$this->query($I);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($I,$p=0){$J=$this->query($I);if(!$J||!$J->num_rows)return
false;return
mysql_result($J->_result,0,$p);}}class
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
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($I,$Df=false){$this->setAttribute(1000,!$Df);return
parent::query($I,$Df);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$M,$fe){$f=array_keys(reset($M));$ee="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Pf=array();foreach($f
as$z)$Pf[$z]="$z = VALUES($z)";$af="\nON DUPLICATE KEY UPDATE ".implode(", ",$Pf);$Pf=array();$ed=0;foreach($M
as$P){$Y="(".implode(", ",$P).")";if($Pf&&(strlen($ee)+$ed+strlen($Y)+strlen($af)>1e6)){if(!queries($ee.implode(",\n",$Pf).$af))return
false;$Pf=array();$ed=0;}$Pf[]=$Y;$ed+=strlen($Y)+2;}return
queries($ee.implode(",\n",$Pf).$af);}}function
idf_escape($v){return"`".str_replace("`","``",$v)."`";}function
table($v){return
idf_escape($v);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->query("SET sql_quote_show_create = 1, autocommit = 1");return$h;}$K=$h->error;if(function_exists('iconv')&&!is_utf8($K)&&strlen($Ce=iconv("windows-1250","utf-8",$K))>strlen($K))$K=$Ce;return$K;}function
get_databases($dc){global$h;$K=get_session("dbs");if($K===null){$I=($h->server_info>=5?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$K=($dc?slow_query($I):get_vals($I));restart_session();set_session("dbs",$K);stop_session();}return$K;}function
limit($I,$Z,$_,$Ed=0,$Ke=" "){return" $I$Z".($_!==null?$Ke."LIMIT $_".($Ed?" OFFSET $Ed":""):"");}function
limit1($I,$Z){return
limit($I,$Z,1);}function
db_collation($m,$Za){global$h;$K=null;$jb=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$jb,$B))$K=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$jb,$B))$K=$Za[$B[1]][-1];return$K;}function
engines(){$K=array();foreach(get_rows("SHOW ENGINES")as$L){if(preg_match("~YES|DEFAULT~",$L["Support"]))$K[]=$L["Engine"];}return$K;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){global$h;return
get_key_vals($h->server_info>=5?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$K=array();foreach($l
as$m)$K[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$K;}function
table_status($D="",$Wb=false){global$h;$K=array();foreach(get_rows($Wb&&$h->server_info>=5?"SELECT TABLE_NAME AS Name, Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($D!=""?"AND TABLE_NAME = ".q($D):"ORDER BY Name"):"SHOW TABLE STATUS".($D!=""?" LIKE ".q(addcslashes($D,"%_\\")):""))as$L){if($L["Engine"]=="InnoDB")$L["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$L["Comment"]);if(!isset($L["Engine"]))$L["Comment"]="";if($D!="")return$L;$K[$L["Name"]]=$L;}return$K;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){$K=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$L){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$L["Type"],$B);$K[$L["Field"]]=array("field"=>$L["Field"],"full_type"=>$L["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($L["Default"]!=""||preg_match("~char|set~",$B[1])?$L["Default"]:null),"null"=>($L["Null"]=="YES"),"auto_increment"=>($L["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$L["Extra"],$B)?$B[1]:""),"collation"=>$L["Collation"],"privileges"=>array_flip(preg_split('~, *~',$L["Privileges"])),"comment"=>$L["Comment"],"primary"=>($L["Key"]=="PRI"),);}return$K;}function
indexes($R,$i=null){$K=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$L){$K[$L["Key_name"]]["type"]=($L["Key_name"]=="PRIMARY"?"PRIMARY":($L["Index_type"]=="FULLTEXT"?"FULLTEXT":($L["Non_unique"]?"INDEX":"UNIQUE")));$K[$L["Key_name"]]["columns"][]=$L["Column_name"];$K[$L["Key_name"]]["lengths"][]=$L["Sub_part"];$K[$L["Key_name"]]["descs"][]=null;}return$K;}function
foreign_keys($R){global$h,$Gd;static$Yd='`(?:[^`]|``)+`';$K=array();$kb=$h->result("SHOW CREATE TABLE ".table($R),1);if($kb){preg_match_all("~CONSTRAINT ($Yd) FOREIGN KEY \\(((?:$Yd,? ?)+)\\) REFERENCES ($Yd)(?:\\.($Yd))? \\(((?:$Yd,? ?)+)\\)(?: ON DELETE ($Gd))?(?: ON UPDATE ($Gd))?~",$kb,$C,PREG_SET_ORDER);foreach($C
as$B){preg_match_all("~$Yd~",$B[2],$Re);preg_match_all("~$Yd~",$B[5],$hf);$K[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$Re[0]),"target"=>array_map('idf_unescape',$hf[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$K;}function
view($D){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$h->result("SHOW CREATE VIEW ".table($D),1)));}function
collations(){$K=array();foreach(get_rows("SHOW COLLATION")as$L){if($L["Default"])$K[$L["Charset"]][-1]=$L["Collation"];else$K[$L["Charset"]][]=$L["Collation"];}ksort($K);foreach($K
as$z=>$X)asort($K[$z]);return$K;}function
information_schema($m){global$h;return($h->server_info>=5&&$m=="information_schema")||($h->server_info>=5.5&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
error_line(){global$h;if(preg_match('~ at line ([0-9]+)$~',$h->error,$te))return$te[1]-1;}function
create_database($m,$d){set_session("dbs",null);return
queries("CREATE DATABASE ".idf_escape($m).($d?" COLLATE ".q($d):""));}function
drop_databases($l){restart_session();set_session("dbs",null);return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($D,$d){if(create_database($D,$d)){$ve=array();foreach(tables_list()as$R=>$U)$ve[]=table($R)." TO ".idf_escape($D).".".table($R);if(!$ve||queries("RENAME TABLE ".implode(", ",$ve))){queries("DROP DATABASE ".idf_escape(DB));return
true;}}return
false;}function
auto_increment(){$Ea=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$w){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$w["columns"],true)){$Ea="";break;}if($w["type"]=="PRIMARY")$Ea=" UNIQUE";}}return" AUTO_INCREMENT$Ea";}function
alter_table($R,$D,$q,$ec,$cb,$Jb,$d,$Da,$Wd){$c=array();foreach($q
as$p)$c[]=($p[1]?($R!=""?($p[0]!=""?"CHANGE ".idf_escape($p[0]):"ADD"):" ")." ".implode($p[1]).($R!=""?$p[2]:""):"DROP ".idf_escape($p[0]));$c=array_merge($c,$ec);$Ve="COMMENT=".q($cb).($Jb?" ENGINE=".q($Jb):"").($d?" COLLATE ".q($d):"").($Da!=""?" AUTO_INCREMENT=$Da":"").$Wd;if($R=="")return
queries("CREATE TABLE ".table($D)." (\n".implode(",\n",$c)."\n) $Ve");if($R!=$D)$c[]="RENAME TO ".table($D);$c[]=$Ve;return
queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c));}function
alter_indexes($R,$c){foreach($c
as$z=>$X)$c[$z]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Tf){return
queries("DROP VIEW ".implode(", ",array_map('table',$Tf)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Tf,$hf){$ve=array();foreach(array_merge($T,$Tf)as$R)$ve[]=table($R)." TO ".idf_escape($hf).".".table($R);return
queries("RENAME TABLE ".implode(", ",$ve));}function
copy_tables($T,$Tf,$hf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$D=($hf==DB?table("copy_$R"):idf_escape($hf).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $D")||!queries("CREATE TABLE $D LIKE ".table($R))||!queries("INSERT INTO $D SELECT * FROM ".table($R)))return
false;}foreach($Tf
as$R){$D=($hf==DB?table("copy_$R"):idf_escape($hf).".".table($R));$Sf=view($R);if(!queries("DROP VIEW IF EXISTS $D")||!queries("CREATE VIEW $D AS $Sf[select]"))return
false;}return
true;}function
trigger($D){if($D=="")return
array();$M=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($D));return
reset($M);}function
triggers($R){$K=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$L)$K[$L["Trigger"]]=array($L["Timing"],$L["Event"]);return$K;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($D,$U){global$h,$Kb,$Kc,$Cf;$va=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Bf="((".implode("|",array_merge(array_keys($Cf),$va)).")\\b(?:\\s*\\(((?:[^'\")]|$Kb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s]+)['\"]?)?";$Yd="\\s*(".($U=="FUNCTION"?"":$Kc).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$Bf";$jb=$h->result("SHOW CREATE $U ".idf_escape($D),2);preg_match("~\\(((?:$Yd\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$Bf\\s+":"")."(.*)~is",$jb,$B);$q=array();preg_match_all("~$Yd\\s*,?~is",$B[1],$C,PREG_SET_ORDER);foreach($C
as$Ud){$D=str_replace("``","`",$Ud[2]).$Ud[3];$q[]=array("field"=>$D,"type"=>strtolower($Ud[5]),"length"=>preg_replace_callback("~$Kb~s",'normalize_enum',$Ud[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Ud[8] $Ud[7]"))),"null"=>1,"full_type"=>$Ud[4],"inout"=>strtoupper($Ud[1]),"collation"=>strtolower($Ud[9]),);}if($U!="FUNCTION")return
array("fields"=>$q,"definition"=>$B[11]);return
array("fields"=>$q,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
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
set_schema($De){return
true;}function
create_sql($R,$Da){global$h;$K=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Da)$K=preg_replace('~ AUTO_INCREMENT=\\d+~','',$K);return$K;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R,$Ye){$K="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$L)$K.="\n".($Ye=='CREATE+ALTER'?"DROP TRIGGER IF EXISTS ".idf_escape($L["Trigger"]).";;\n":"")."CREATE TRIGGER ".idf_escape($L["Trigger"])." $L[Timing] $L[Event] ON ".table($L["Table"])." FOR EACH ROW\n$L[Statement];;\n";return$K;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($p){if(preg_match("~binary~",$p["type"]))return"HEX(".idf_escape($p["field"]).")";if($p["type"]=="bit")return"BIN(".idf_escape($p["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))return"AsWKT(".idf_escape($p["field"]).")";}function
unconvert_field($p,$K){if(preg_match("~binary~",$p["type"]))$K="UNHEX($K)";if($p["type"]=="bit")$K="CONV($K, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))$K="GeomFromText($K)";return$K;}function
support($Xb){global$h;return!preg_match("~scheme|sequence|type|view_trigger".($h->server_info<5.1?"|event|partitioning".($h->server_info<5?"|routine|trigger|view":""):"")."~",$Xb);}$y="sql";$Cf=array();$Xe=array();foreach(array(lang(24)=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),lang(25)=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),lang(26)=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),lang(30)=>array("enum"=>65535,"set"=>64),lang(27)=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),lang(29)=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$z=>$X){$Cf+=$X;$Xe[$z]=array_keys($X);}$Jf=array("unsigned","zerofill","unsigned zerofill");$Ld=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$pc=array("char_length","date","from_unixtime","lower","round","sec_to_time","time_to_sec","upper");$rc=array("avg","count","count distinct","group_concat","max","min","sum");$Cb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array("(^|[^o])int|float|double|decimal"=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="4.1.0";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='http://www.adminer.org/editor/' target='_blank' id='h1'>".lang(31)."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
permanentLogin($jb=false){return
password_file($jb);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($dc=true){return
get_databases($dc);}function
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
login($id,$H){global$h;$h->query("SET time_zone = ".q(substr_replace(@date("O"),":",-2,0)));return
true;}function
tableName($df){return
h($df["Comment"]!=""?$df["Comment"]:$df["Name"]);}function
fieldName($p,$E=0){return
h($p["comment"]!=""?$p["comment"]:$p["field"]);}function
selectLinks($df,$P=""){$a=$df["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.lang(36)."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$cf){$K=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$L)$K[$L["TABLE_NAME"]]["keys"][$L["CONSTRAINT_NAME"]][$L["COLUMN_NAME"]]=$L["REFERENCED_COLUMN_NAME"];foreach($K
as$z=>$X){$D=$this->tableName(table_status($z,true));if($D!=""){$Fe=preg_quote($cf);$Ke="(:|\\s*-)?\\s+";$K[$z]["name"]=(preg_match("(^$Fe$Ke(.+)|^(.+?)$Ke$Fe\$)iu",$D,$B)?$B[2].$B[3]:$D);}else
unset($K[$z]);}return$K;}function
backwardKeysPrint($Ha,$L){foreach($Ha
as$R=>$Ga){foreach($Ga["keys"]as$ab){$A=ME.'select='.urlencode($R);$t=0;foreach($ab
as$e=>$X)$A.=where_link($t++,$e,$L[$X]);echo"<a href='".h($A)."'>".h($Ga["name"])."</a>";$A=ME.'edit='.urlencode($R);foreach($ab
as$e=>$X)$A.="&set".urlencode("[".bracket_escape($e)."]")."=".urlencode($L[$X]);echo"<a href='".h($A)."' title='".lang(36)."'>+</a> ";}}}function
selectQuery($I,$mf){return"<!--\n".str_replace("--","--><!-- ",$I)."\n($mf)\n-->\n";}function
rowDescription($R){foreach(fields($R)as$p){if(preg_match("~varchar|character varying~",$p["type"]))return
idf_escape($p["field"]);}return"";}function
rowDescriptions($M,$gc){$K=$M;foreach($M[0]as$z=>$X){if(list($R,$u,$D)=$this->_foreignColumn($gc,$z)){$Cc=array();foreach($M
as$L)$Cc[$L[$z]]=q($L[$z]);$sb=$this->_values[$R];if(!$sb)$sb=get_key_vals("SELECT $u, $D FROM ".table($R)." WHERE $u IN (".implode(", ",$Cc).")");foreach($M
as$yd=>$L){if(isset($L[$z]))$K[$yd][$z]=(string)$sb[$L[$z]];}}}return$K;}function
selectLink($X,$p){}function
selectVal($X,$A,$p,$Qd){$K=($X===null?"&nbsp;":$X);$A=h($A);if(preg_match('~blob|bytea~',$p["type"])&&!is_utf8($X)){$K=lang(37,strlen($Qd));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$Qd))$K="<img src='$A' alt='$K'>";}if(like_bool($p)&&$K!="&nbsp;")$K=($X?lang(38):lang(39));if($A)$K="<a href='$A'".(is_url($A)?" rel='noreferrer'":"").">$K</a>";if(!$A&&!like_bool($p)&&preg_match('~int|float|double|decimal~',$p["type"]))$K="<div class='number'>$K</div>";elseif(preg_match('~date~',$p["type"]))$K="<div class='datetime'>$K</div>";return$K;}function
editVal($X,$p){if(preg_match('~date|timestamp~',$p["type"])&&$X!==null)return
preg_replace('~^(\\d{2}(\\d+))-(0?(\\d+))-(0?(\\d+))~',lang(40),$X);return$X;}function
selectColumnsPrint($N,$f){}function
selectSearchPrint($Z,$f,$x){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.lang(41)."</legend><div>\n";$Wc=array();foreach($Z
as$z=>$X)$Wc[$X["col"]]=$z;$t=0;$q=fields($_GET["select"]);foreach($f
as$D=>$rb){$p=$q[$D];if(preg_match("~enum~",$p["type"])||like_bool($p)){$z=$Wc[$D];$t--;echo"<div>".h($rb)."<input type='hidden' name='where[$t][col]' value='".h($D)."'>:",(like_bool($p)?" <select name='where[$t][val]'>".optionlist(array(""=>"",lang(39),lang(38)),$Z[$z]["val"],true)."</select>":enum_input("checkbox"," name='where[$t][val][]'",$p,(array)$Z[$z]["val"],($p["null"]?0:null))),"</div>\n";unset($f[$D]);}elseif(is_array($Nd=$this->_foreignKeyOptions($_GET["select"],$D))){if($q[$D]["null"])$Nd[0]='('.lang(7).')';$z=$Wc[$D];$t--;echo"<div>".h($rb)."<input type='hidden' name='where[$t][col]' value='".h($D)."'><input type='hidden' name='where[$t][op]' value='='>: <select name='where[$t][val]'>".optionlist($Nd,$Z[$z]["val"],true)."</select></div>\n";unset($f[$D]);}}$t=0;foreach($Z
as$X){if(($X["col"]==""||$f[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$t][col]'><option value=''>(".lang(42).")".optionlist($f,$X["col"],true)."</select>",html_select("where[$t][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$t][val]' value='".h($X["val"])."' onkeydown='selectSearchKeydown(this, event);' onsearch='selectSearchSearch(this);'></div>\n";$t++;}}echo"<div><select name='where[$t][col]' onchange='this.nextSibling.nextSibling.onchange();'><option value=''>(".lang(42).")".optionlist($f,null,true)."</select>",html_select("where[$t][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$t][val]' onchange='selectAddRow(this);' onsearch='selectSearch(this);'></div>\n","</div></fieldset>\n";}function
selectOrderPrint($E,$f,$x){$Pd=array();foreach($x
as$z=>$w){$E=array();foreach($w["columns"]as$X)$E[]=$f[$X];if(count(array_filter($E,'strlen'))>1&&$z!="PRIMARY")$Pd[$z]=implode(", ",$E);}if($Pd){echo'<fieldset><legend>'.lang(43)."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$Pd,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($_){echo"<fieldset><legend>".lang(44)."</legend><div>";echo
html_select("limit",array("","50","100"),$_),"</div></fieldset>\n";}function
selectLengthPrint($kf){}function
selectActionPrint($x){echo"<fieldset><legend>".lang(45)."</legend><div>","<input type='submit' value='".lang(46)."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Gb,$f){if($Gb){print_fieldset("email",lang(47),$_POST["email_append"]);echo"<div onkeydown=\"eventStop(event); return bodyKeydown(event, 'email');\">\n","<p>".lang(48).": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",lang(49).": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p onkeydown=\"eventStop(event); return bodyKeydown(event, 'email_append');\">".html_select("email_addition",$f,$_POST["email_addition"])."<input type='submit' name='email_append' value='".lang(11)."'>\n";echo"<p>".lang(50).": <input type='file' name='email_files[]' onchange=\"this.onchange = function () { }; var el = this.cloneNode(true); el.value = ''; this.parentNode.appendChild(el);\">","<p>".(count($Gb)==1?'<input type="hidden" name="email_field" value="'.h(key($Gb)).'">':html_select("email_field",$Gb)),"<input type='submit' name='email' value='".lang(51)."' onclick=\"return this.form['delete'].onclick();\">\n","</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($f,$x){return
array(array(),array());}function
selectSearchProcess($q,$x){$K=array();foreach((array)$_GET["where"]as$z=>$Z){$Ya=$Z["col"];$Jd=$Z["op"];$X=$Z["val"];if(($z<0?"":$Ya).$X!=""){$db=array();foreach(($Ya!=""?array($Ya=>$q[$Ya]):$q)as$D=>$p){if($Ya!=""||is_numeric($X)||!preg_match('~int|float|double|decimal~',$p["type"])){$D=idf_escape($D);if($Ya!=""&&$p["type"]=="enum")$db[]=(in_array(0,$X)?"$D IS NULL OR ":"")."$D IN (".implode(", ",array_map('intval',$X)).")";else{$lf=preg_match('~char|text|enum|set~',$p["type"]);$Y=$this->processInput($p,(!$Jd&&$lf&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$db[]=$D.($Y=="NULL"?" IS".($Jd==">="?" NOT":"")." $Y":(in_array($Jd,$this->operators)||$Jd=="="?" $Jd $Y":($lf?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($z<0&&$X=="0")$db[]="$D IS NULL";}}}$K[]=($db?"(".implode(" OR ",$db).")":"0");}}return$K;}function
selectOrderProcess($q,$x){$Fc=$_GET["index_order"];if($Fc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($Fc!=""?array($x[$Fc]):$x)as$w){if($Fc!=""||$w["type"]=="INDEX"){$tc=array_filter($w["descs"]);$rb=false;foreach($w["columns"]as$X){if(preg_match('~date|timestamp~',$q[$X]["type"])){$rb=true;break;}}$K=array();foreach($w["columns"]as$z=>$X)$K[]=idf_escape($X).(($tc?$w["descs"][$z]:$rb)?" DESC":"");return$K;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$gc){if($_POST["email_append"])return
true;if($_POST["email"]){$Je=0;if($_POST["all"]||$_POST["check"]){$p=idf_escape($_POST["email_field"]);$Ze=$_POST["email_subject"];$rd=$_POST["email_message"];preg_match_all('~\\{\\$([a-z0-9_]+)\\}~i',"$Ze.$rd",$C);$M=get_rows("SELECT DISTINCT $p".($C[1]?", ".implode(", ",array_map('idf_escape',array_unique($C[1]))):"")." FROM ".table($_GET["select"])." WHERE $p IS NOT NULL AND $p != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$q=fields($_GET["select"]);foreach($this->rowDescriptions($M,$gc)as$L){$we=array('{\\'=>'{');foreach($C[1]as$X)$we['{$'."$X}"]=$this->editVal($L[$X],$q[$X]);$Fb=$L[$_POST["email_field"]];if(is_mail($Fb)&&send_mail($Fb,strtr($Ze,$we),strtr($rd,$we),$_POST["email_from"],$_FILES["email_files"]))$Je++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(52,$Je));}return
false;}function
selectQueryBuild($N,$Z,$s,$E,$_,$F){return"";}function
messageQuery($I,$mf){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$I)."\n".($mf?"($mf)\n":"")."-->";}function
editFunctions($p){$K=array();if($p["null"]&&preg_match('~blob~',$p["type"]))$K["NULL"]=lang(7);$K[""]=($p["null"]||$p["auto_increment"]||like_bool($p)?"":"*");if(preg_match('~date|time~',$p["type"]))$K["now"]=lang(53);if(preg_match('~_(md5|sha1)$~i',$p["field"],$B))$K[]=strtolower($B[1]);return$K;}function
editInput($R,$p,$Ba,$Y){if($p["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ba value='-1' checked><i>".lang(8)."</i></label> ":"").enum_input("radio",$Ba,$p,($Y||isset($_GET["select"])?$Y:0),($p["null"]?"":null));$Nd=$this->_foreignKeyOptions($R,$p["field"],$Y);if($Nd!==null)return(is_array($Nd)?"<select$Ba>".optionlist($Nd,$Y,true)."</select>":"<input value='".h($Y)."'$Ba class='hidden'><input value='".h($Nd)."' class='jsonly' onkeyup=\"whisper('".h(ME."script=complete&source=".urlencode($R)."&field=".urlencode($p["field"]))."&value=', this);\"><div onclick='return whisperClick(event, this.previousSibling);'></div>");if(like_bool($p))return'<input type="checkbox" value="'.h($Y?$Y:1).'"'.($Y?' checked':'')."$Ba>";$yc="";if(preg_match('~time~',$p["type"]))$yc=lang(54);if(preg_match('~date|timestamp~',$p["type"]))$yc=lang(55).($yc?" [$yc]":"");if($yc)return"<input value='".h($Y)."'$Ba> ($yc)";if(preg_match('~_(md5|sha1)$~i',$p["field"]))return"<input type='password' value='".h($Y)."'$Ba>";return'';}function
processInput($p,$Y,$r=""){if($r=="now")return"$r()";$K=$Y;if(preg_match('~date|timestamp~',$p["type"])&&preg_match('(^'.str_replace('\\$1','(?P<p1>\\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\\2>\\d{1,2})',preg_quote(lang(40)))).'(.*))',$Y,$B))$K=($B["p1"]!=""?$B["p1"]:($B["p2"]!=""?($B["p2"]<70?20:19).$B["p2"]:gmdate("Y")))."-$B[p3]$B[p4]-$B[p5]$B[p6]".end($B);$K=($p["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$K:q($K));if($Y==""&&like_bool($p))$K="0";elseif($Y==""&&($p["null"]||!preg_match('~char|text~',$p["type"])))$K="NULL";elseif(preg_match('~^(md5|sha1)$~',$r))$K="$r($K)";return
unconvert_field($p,$K);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($R,$Ye,$I){global$h;$J=$h->query($I,1);if($J){while($L=$J->fetch_assoc()){if($Ye=="table"){dump_csv(array_keys($L));$Ye="INSERT";}dump_csv($L);}}}function
dumpFilename($Bc){return
friendly_url($Bc);}function
dumpHeaders($Bc,$wd=false){$Sb="csv";header("Content-Type: text/csv; charset=utf-8");return$Sb;}function
homepage(){return
true;}function
navigation($vd){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>
<a href="http://www.adminer.org/editor/#download" target="_blank" id="version">',(version_compare($ca,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($vd=="auth"){$cc=true;foreach((array)$_SESSION["pwds"]as$Qf=>$Ne){foreach($Ne[""]as$V=>$H){if($H!==null){if($cc){echo"<p id='logins' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";$cc=false;}echo"<a href='".h(auth_url($Qf,"",$V))."'>".($V!=""?h($V):"<i>".lang(7)."</i>")."</a><br>\n";}}}}else{$this->databasesPrint($vd);if($vd!="db"&&$vd!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".lang(9)."\n";else$this->tablesPrint($S);}}}function
databasesPrint($vd){}function
tablesPrint($T){echo"<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>\n";foreach($T
as$L){$D=$this->tableName($L);if(isset($L["Engine"])&&$D!="")echo"<a href='".h(ME).'select='.urlencode($L["Name"])."'".bold($_GET["select"]==$L["Name"]||$_GET["edit"]==$L["Name"])." title='".lang(56)."'>$D</a><br>\n";}}function
_foreignColumn($gc,$e){foreach((array)$gc[$e]as$fc){if(count($fc["source"])==1){$D=$this->rowDescription($fc["table"]);if($D!=""){$u=idf_escape($fc["target"][0]);return
array($fc["table"],$u,$D);}}}}function
_foreignKeyOptions($R,$e,$Y=null){global$h;if(list($hf,$u,$D)=$this->_foreignColumn(column_foreign_keys($R),$e)){$K=&$this->_values[$hf];if($K===null){$S=table_status($hf);$K=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $u, $D FROM ".table($hf)." ORDER BY 2"));}if(!$K&&$Y!==null)return$h->result("SELECT $D FROM ".table($hf)." WHERE $u = ".q($Y));return$K;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($pf,$o="",$Pa=array(),$qf=""){global$ba,$ca,$b,$yb,$y;page_headers();$rf=$pf.($qf!=""?": $qf":"");$sf=strip_tags($rf.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="',$ba,'" dir="',lang(57),'">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>',$sf,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME))."?file=default.css&amp;version=4.1.0",'">
<script type="text/javascript" src="',h(preg_replace("~\\?.*~","",ME))."?file=functions.js&amp;version=4.1.0",'"></script>
';if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.1.0",'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME))."?file=favicon.ico&amp;version=4.1.0",'">
';if(file_exists("adminer.css")){echo'<link rel="stylesheet" type="text/css" href="adminer.css">
';}}echo'
<body class="',lang(57),' nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);"',(isset($_COOKIE["adminer_version"])?"":" onload=\"verifyVersion('$ca');\""),'>
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, \' js\');
</script>

<div id="help" class="jush-',$y,' jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
';if($Pa!==null){$A=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($A?$A:".").'">'.$yb[DRIVER].'</a> &raquo; ';$A=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=(SERVER!=""?h(SERVER):lang(58));if($Pa===false)echo"$O\n";else{echo"<a href='".($A?h($A):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Pa)))echo'<a href="'.h($A."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Pa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Pa
as$z=>$X){$rb=(is_array($X)?$X[1]:h($X));if($rb!="")echo"<a href='".h(ME."$z=").urlencode(is_array($X)?$X[0]:$X)."'>$rb</a> &raquo; ";}}echo"$pf\n";}}echo"<h2>$rf</h2>\n";restart_session();page_messages($o);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");if($b->headers()){header("X-Frame-Options: deny");header("X-XSS-Protection: 0");}}function
page_messages($o){$Lf=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$sd=$_SESSION["messages"][$Lf];if($sd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$sd)."</div>\n";unset($_SESSION["messages"][$Lf]);}if($o)echo"<div class='error'>$o</div>\n";}function
page_footer($vd=""){global$b,$uf;echo'</div>

';switch_lang();if($vd!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="',lang(59),'" id="logout">
<input type="hidden" name="token" value="',$uf,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($vd);echo'</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
';}function
int32($yd){while($yd>=2147483648)$yd-=4294967296;while($yd<=-2147483649)$yd+=4294967296;return(int)$yd;}function
long2str($W,$Vf){$Ce='';foreach($W
as$X)$Ce.=pack('V',$X);if($Vf)return
substr($Ce,0,end($W));return$Ce;}function
str2long($Ce,$Vf){$W=array_values(unpack('V*',str_pad($Ce,4*ceil(strlen($Ce)/4),"\0")));if($Vf)$W[]=strlen($Ce);return$W;}function
xxtea_mx($bg,$ag,$bf,$Sc){return
int32((($bg>>5&0x7FFFFFF)^$ag<<2)+(($ag>>3&0x1FFFFFFF)^$bg<<4))^int32(($bf^$ag)+($Sc^$bg));}function
encrypt_string($We,$z){if($We=="")return"";$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($We,true);$yd=count($W)-1;$bg=$W[$yd];$ag=$W[0];$le=floor(6+52/($yd+1));$bf=0;while($le-->0){$bf=int32($bf+0x9E3779B9);$Bb=$bf>>2&3;for($Td=0;$Td<$yd;$Td++){$ag=$W[$Td+1];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$bg=int32($W[$Td]+$xd);$W[$Td]=$bg;}$ag=$W[0];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$bg=int32($W[$yd]+$xd);$W[$yd]=$bg;}return
long2str($W,false);}function
decrypt_string($We,$z){if($We=="")return"";if(!$z)return
false;$z=array_values(unpack("V*",pack("H*",md5($z))));$W=str2long($We,false);$yd=count($W)-1;$bg=$W[$yd];$ag=$W[0];$le=floor(6+52/($yd+1));$bf=int32($le*0x9E3779B9);while($bf){$Bb=$bf>>2&3;for($Td=$yd;$Td>0;$Td--){$bg=$W[$Td-1];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$ag=int32($W[$Td]-$xd);$W[$Td]=$ag;}$bg=$W[$yd];$xd=xxtea_mx($bg,$ag,$bf,$z[$Td&3^$Bb]);$ag=int32($W[0]-$xd);$W[0]=$ag;$bf=int32($bf-0x9E3779B9);}return
long2str($W,true);}$h='';$vc=$_SESSION["token"];if(!$vc)$_SESSION["token"]=rand(1,1e6);$uf=get_token();$Zd=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($z)=explode(":",$X);$Zd[$z]=$X;}}function
add_invalid_login(){global$b;$Zb=get_temp_dir()."/adminer.invalid";$mc=@fopen($Zb,"r+");if(!$mc){$mc=@fopen($Zb,"w");if(!$mc)return;}flock($mc,LOCK_EX);$Oc=unserialize(stream_get_contents($mc));$mf=time();if($Oc){foreach($Oc
as$Pc=>$X){if($X[0]<$mf)unset($Oc[$Pc]);}}$Nc=&$Oc[$b->bruteForceKey()];if(!$Nc)$Nc=array($mf+30*60,0);$Nc[1]++;$Le=serialize($Oc);rewind($mc);fwrite($mc,$Le);ftruncate($mc,strlen($Le));flock($mc,LOCK_UN);fclose($mc);}$Ca=$_POST["auth"];if($Ca){$Oc=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Nc=$Oc[$b->bruteForceKey()];$Ad=($Nc[1]>30?$Nc[0]-time():0);if($Ad>0)auth_error(lang(60,ceil($Ad/60)));session_regenerate_id();$n=$Ca["driver"];$O=$Ca["server"];$V=$Ca["username"];$H=(string)$Ca["password"];$m=$Ca["db"];set_password($n,$O,$V,$H);$_SESSION["db"][$n][$O][$V][$m]=true;if($Ca["permanent"]){$z=base64_encode($n)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($m);$ie=$b->permanentLogin(true);$Zd[$z]="$z:".base64_encode($ie?encrypt_string($H,$ie):"");cookie("adminer_permanent",implode(" ",$Zd));}if(count($_POST)==1||DRIVER!=$n||SERVER!=$O||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($n,$O,$V,$m));}elseif($_POST["logout"]){if($vc&&!verify_token()){page_header(lang(59),lang(61));page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$z)set_session($z,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),lang(62));}}elseif($Zd&&!$_SESSION["pwds"]){session_regenerate_id();$ie=$b->permanentLogin();foreach($Zd
as$z=>$X){list(,$Ua)=explode(":",$X);list($Qf,$O,$V,$m)=array_map('base64_decode',explode("-",$z));set_password($Qf,$O,$V,decrypt_string(base64_decode($Ua),$ie));$_SESSION["db"][$Qf][$O][$V][$m]=true;}}function
unset_permanent(){global$Zd;foreach($Zd
as$z=>$X){list($Qf,$O,$V,$m)=array_map('base64_decode',explode("-",$z));if($Qf==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$m==DB)unset($Zd[$z]);}cookie("adminer_permanent",implode(" ",$Zd));}function
auth_error($o){global$b,$vc;$Oe=session_name();if(!$_COOKIE[$Oe]&&$_GET[$Oe]&&ini_bool("session.use_only_cookies"))$o=lang(63);elseif(isset($_GET["username"])){if(($_COOKIE[$Oe]||$_GET[$Oe])&&!$vc)$o=lang(64);else{add_invalid_login();$H=get_password();if($H!==null){if($H===false)$o.='<br>'.lang(65,'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}$G=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$G["lifetime"]);page_header(lang(34),$o,null);echo"<form action='' method='post'>\n";$b->loginForm();echo"<div>";hidden_fields($_POST,array("auth"));echo"</div>\n","</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header(lang(66),lang(67,implode(", ",$de)),false);page_footer("auth");exit;}$h=connect();}$n=new
Min_Driver($h);if(!is_object($h)||!$b->login($_GET["username"],get_password()))auth_error((is_string($h)?$h:lang(68)));if($Ca&&$_POST["token"])$_POST["token"]=$uf;$o='';if($_POST){if(!verify_token()){$Jc="max_input_vars";$pd=ini_get($Jc);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$z){$X=ini_get($z);if($X&&(!$pd||$X<$pd)){$Jc=$z;$pd=$X;}}}$o=(!$_POST["token"]&&$pd?lang(69,"'$Jc'"):lang(61));}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$o=lang(70,"'post_max_size'");if(isset($_GET["sql"]))$o.=' '.lang(71);}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
email_header($wc){return"=?UTF-8?B?".base64_encode($wc)."?=";}function
send_mail($Fb,$Ze,$rd,$nc="",$ac=array()){$Lb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$rd=str_replace("\n",$Lb,wordwrap(str_replace("\r","","$rd\n")));$Oa=uniqid("boundary");$_a="";foreach((array)$ac["error"]as$z=>$X){if(!$X)$_a.="--$Oa$Lb"."Content-Type: ".str_replace("\n","",$ac["type"][$z]).$Lb."Content-Disposition: attachment; filename=\"".preg_replace('~["\\n]~','',$ac["name"][$z])."\"$Lb"."Content-Transfer-Encoding: base64$Lb$Lb".chunk_split(base64_encode(file_get_contents($ac["tmp_name"][$z])),76,$Lb).$Lb;}$Ja="";$xc="Content-Type: text/plain; charset=utf-8$Lb"."Content-Transfer-Encoding: 8bit";if($_a){$_a.="--$Oa--$Lb";$Ja="--$Oa$Lb$xc$Lb$Lb";$xc="Content-Type: multipart/mixed; boundary=\"$Oa\"";}$xc.=$Lb."MIME-Version: 1.0$Lb"."X-Mailer: Adminer Editor".($nc?$Lb."From: ".str_replace("\n","",$nc):"");return
mail($Fb,email_header($Ze),$Ja.$rd.$_a,$xc);}function
like_bool($p){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$p["full_type"]);}$h->select_db($b->database());$Gd="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$yb[DRIVER]=lang(34);if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$q=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$N=array(idf_escape($_GET["field"]));$J=$n->select($a,$N,array(where($_GET,$q)),$N);$L=($J?$J->fetch_row():array());echo$L[0];exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$q=fields($a);$Z=(isset($_GET["select"])?(count($_POST["check"])==1?where_check($_POST["check"][0],$q):""):where($_GET,$q));$Kf=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($q
as$D=>$p){if(!isset($p["privileges"][$Kf?"update":"insert"])||$b->fieldName($p)=="")unset($q[$D]);}if($_POST&&!$o&&!isset($_GET["select"])){$hd=$_POST["referer"];if($_POST["insert"])$hd=($Kf?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$hd))$hd=ME."select=".urlencode($a);$x=indexes($a);$Ff=unique_array($_GET["where"],$x);$oe="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($hd,lang(72),$n->delete($a,$oe,!$Ff));else{$P=array();foreach($q
as$D=>$p){$X=process_input($p);if($X!==false&&$X!==null)$P[idf_escape($D)]=$X;}if($Kf){if(!$P)redirect($hd);queries_redirect($hd,lang(73),$n->update($a,$P,$oe,!$Ff));if(is_ajax()){page_headers();page_messages($o);exit;}}else{$J=$n->insert($a,$P);$cd=($J?last_id():0);queries_redirect($hd,lang(74,($cd?" $cd":"")),$J);}}}$L=null;if($_POST["save"])$L=(array)$_POST["fields"];elseif($Z){$N=array();foreach($q
as$D=>$p){if(isset($p["privileges"]["select"])){$ya=convert_field($p);if($_POST["clone"]&&$p["auto_increment"])$ya="''";if($y=="sql"&&preg_match("~enum|set~",$p["type"]))$ya="1*".idf_escape($D);$N[]=($ya?"$ya AS ":"").idf_escape($D);}}$L=array();if(!support("table"))$N=array("*");if($N){$J=$n->select($a,$N,array($Z),$N,array(),(isset($_GET["select"])?2:1));$L=$J->fetch_assoc();if(!$L)$L=false;if(isset($_GET["select"])&&(!$L||$J->fetch_assoc()))$L=null;}}if(!support("table")&&!$q){if(!$Z){$J=$n->select($a,array("*"),$Z,array("*"));$L=($J?$J->fetch_assoc():false);if(!$L)$L=array($n->primary=>"");}if($L){foreach($L
as$z=>$X){if(!$Z)$L[$z]=null;$q[$z]=array("field"=>$z,"null"=>($z!=$n->primary),"auto_increment"=>($z==$n->primary));}}}edit_form($a,$q,$L,$Kf);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$x=indexes($a);$q=fields($a);$ic=column_foreign_keys($a);$Fd="";if($S["Oid"]){$Fd=($y=="sqlite"?"rowid":"oid");$x[]=array("type"=>"PRIMARY","columns"=>array($Fd));}parse_str($_COOKIE["adminer_import"],$ra);$Ae=array();$f=array();$kf=null;foreach($q
as$z=>$p){$D=$b->fieldName($p);if(isset($p["privileges"]["select"])&&$D!=""){$f[$z]=html_entity_decode(strip_tags($D),ENT_QUOTES);if(is_shortable($p))$kf=$b->selectLengthProcess();}$Ae+=$p["privileges"];}list($N,$s)=$b->selectColumnsProcess($f,$x);$Qc=count($s)<count($N);$Z=$b->selectSearchProcess($q,$x);$E=$b->selectOrderProcess($q,$x);$_=$b->selectLimitProcess();$nc=($N?implode(", ",$N):"*".($Fd?", $Fd":"")).convert_fields($f,$q,$N)."\nFROM ".table($a);$qc=($s&&$Qc?"\nGROUP BY ".implode(", ",$s):"").($E?"\nORDER BY ".implode(", ",$E):"");if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Gf=>$L){$ya=convert_field($q[key($L)]);$N=array($ya?$ya:idf_escape(key($L)));$Z[]=where_check($Gf,$q);$K=$n->select($a,$N,$Z,$N);if($K)echo
reset($K->fetch_row());}exit;}if($_POST&&!$o){$Xf=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Sa=array();foreach($_POST["check"]as$Qa)$Sa[]=where_check($Qa,$q);$Xf[]="((".implode(") OR (",$Sa)."))";}$Xf=($Xf?"\nWHERE ".implode(" AND ",$Xf):"");$fe=$If=null;foreach($x
as$w){if($w["type"]=="PRIMARY"){$fe=array_flip($w["columns"]);$If=($N?$fe:array());break;}}foreach((array)$If
as$z=>$X){if(in_array(idf_escape($z),$N))unset($If[$z]);}if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");if(!is_array($_POST["check"])||$If===array())$I="SELECT $nc$Xf$qc";else{$Ef=array();foreach($_POST["check"]as$X)$Ef[]="(SELECT".limit($nc,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q).$qc,1).")";$I=implode(" UNION ALL ",$Ef);}$b->dumpData($a,"table",$I);exit;}if(!$b->selectEmailProcess($Z,$ic)){if($_POST["save"]||$_POST["delete"]){$J=true;$sa=0;$P=array();if(!$_POST["delete"]){foreach($f
as$D=>$X){$X=process_input($q[$D]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($D)]=($X!==false?$X:idf_escape($D));}}if($_POST["delete"]||$P){if($_POST["clone"])$I="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($If===array()&&is_array($_POST["check"]))||$Qc){$J=($_POST["delete"]?$n->delete($a,$Xf):($_POST["clone"]?queries("INSERT $I$Xf"):$n->update($a,$P,$Xf)));$sa=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Wf="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q);$J=($_POST["delete"]?$n->delete($a,$Wf,1):($_POST["clone"]?queries("INSERT".limit1($I,$Wf)):$n->update($a,$P,$Wf)));if(!$J)break;$sa+=$h->affected_rows;}}}$rd=lang(75,$sa);if($_POST["clone"]&&$J&&$sa==1){$cd=last_id();if($cd)$rd=lang(74," $cd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$rd,$J);if(!$_POST["delete"]){edit_form($a,$q,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$o=lang(76);else{$J=true;$sa=0;foreach($_POST["val"]as$Gf=>$L){$P=array();foreach($L
as$z=>$X){$z=bracket_escape($z,1);$P[idf_escape($z)]=(preg_match('~char|text~',$q[$z]["type"])||$X!=""?$b->processInput($q[$z],$X):"NULL");}$J=$n->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Gf,$q),!($Qc||$If===array())," ");if(!$J)break;$sa+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(75,$sa),$J);}}elseif(!is_string($Yb=get_file("csv_file",true)))$o=upload_error($Yb);elseif(!preg_match('~~u',$Yb))$o=lang(77);else{cookie("adminer_import","output=".urlencode($ra["output"])."&format=".urlencode($_POST["separator"]));$J=true;$ab=array_keys($q);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Yb,$C);$sa=count($C[0]);$n->begin();$Ke=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$M=array();foreach($C[0]as$z=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$Ke]*)$Ke~",$X.$Ke,$md);if(!$z&&!array_diff($md[1],$ab)){$ab=$md[1];$sa--;}else{$P=array();foreach($md[1]as$t=>$Ya)$P[idf_escape($ab[$t])]=($Ya==""&&$q[$ab[$t]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$Ya))));$M[]=$P;}}$J=(!$M||$n->insertUpdate($a,$M,$fe));if($J)$n->commit();queries_redirect(remove_from_uri("page"),lang(78,$sa),$J);$n->rollback();}}}$ef=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header(lang(46).": $ef",$o);$P=null;if(isset($Ae["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if(count($ic[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$f&&support("table"))echo"<p class='error'>".lang(79).($q?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($N,$f);$b->selectSearchPrint($Z,$f,$x);$b->selectOrderPrint($E,$f,$x);$b->selectLimitPrint($_);$b->selectLengthPrint($kf);$b->selectActionPrint($x);echo"</form>\n";$F=$_GET["page"];if($F=="last"){$lc=$h->result(count_rows($a,$Z,$Qc,$s));$F=floor(max(0,$lc-1)/$_);}$He=$N;if(!$He){$He[]="*";if($Fd)$He[]=$Fd;}$hb=convert_fields($f,$q,$N);if($hb)$He[]=substr($hb,2);$J=$n->select($a,$He,$Z,$s,$E,$_,$F,true);if(!$J)echo"<p class='error'>".error()."\n";else{if($y=="mssql"&&$F)$J->seek($_*$F);$Hb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$M=array();while($L=$J->fetch_assoc()){if($F&&$y=="oracle")unset($L["RNUM"]);$M[]=$L;}if($_GET["page"]!="last"&&+$_&&$s&&$Qc&&$y=="sql")$lc=$h->result(" SELECT FOUND_ROWS()");if(!$M)echo"<p class='message'>".lang(12)."\n";else{$Ia=$b->backwardKeys($a,$ef);echo"<table id='table' cellspacing='0' class='nowrap checkable' onclick='tableClick(event);' ondblclick='tableClick(event, true);' onkeydown='return editingKeydown(event);'>\n","<thead><tr>".(!$s&&$N?"":"<td><input type='checkbox' id='all-page' onclick='formCheck(this, /check/);'> <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".lang(80)."</a>");$zd=array();$pc=array();reset($N);$qe=1;foreach($M[0]as$z=>$X){if($z!=$Fd){$X=$_GET["columns"][key($N)];$p=$q[$N?($X?$X["col"]:current($N)):$z];$D=($p?$b->fieldName($p,$qe):($X["fun"]?"*":$z));if($D!=""){$qe++;$zd[$z]=$D;$e=idf_escape($z);$Ac=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($z);$rb="&desc%5B0%5D=1";echo'<th onmouseover="columnMouse(this);" onmouseout="columnMouse(this, \' hidden\');">','<a href="'.h($Ac.($E[0]==$e||$E[0]==$z||(!$E&&$Qc&&$s[0]==$e)?$rb:'')).'">';echo
apply_sql_function($X["fun"],$D)."</a>";echo"<span class='column hidden'>","<a href='".h($Ac.$rb)."' title='".lang(81)."' class='text'> ↓</a>";if(!$X["fun"])echo'<a href="#fieldset-search" onclick="selectSearch(\''.h(js_escape($z)).'\'); return false;" title="'.lang(41).'" class="text jsonly"> =</a>';echo"</span>";}$pc[$z]=$X["fun"];next($N);}}$fd=array();if($_GET["modify"]){foreach($M
as$L){foreach($L
as$z=>$X)$fd[$z]=max($fd[$z],min(40,strlen(utf8_decode($X))));}}echo($Ia?"<th>".lang(82):"")."</thead>\n";if(is_ajax()){if($_%2==1&&$F%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($M,$ic)as$yd=>$L){$Ff=unique_array($M[$yd],$x);if(!$Ff){$Ff=array();foreach($M[$yd]as$z=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$z))$Ff[$z]=$X;}}$Gf="";foreach($Ff
as$z=>$X){if(($y=="sql"||$y=="pgsql")&&strlen($X)>64){$z="MD5(".(strpos($z,'(')?$z:idf_escape($z)).")";$X=md5($X);}$Gf.="&".($X!==null?urlencode("where[".bracket_escape($z)."]")."=".urlencode($X):"null%5B%5D=".urlencode($z));}echo"<tr".odd().">".(!$s&&$N?"":"<td>".checkbox("check[]",substr($Gf,1),in_array(substr($Gf,1),(array)$_POST["check"]),"","this.form['all'].checked = false; formUncheck('all-page');").($Qc||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Gf)."'>".lang(83)."</a>"));foreach($L
as$z=>$X){if(isset($zd[$z])){$p=$q[$z];if($X!=""&&(!isset($Hb[$z])||$Hb[$z]!=""))$Hb[$z]=(is_mail($X)?$zd[$z]:"");$A="";if(preg_match('~blob|bytea|raw|file~',$p["type"])&&$X!="")$A=ME.'download='.urlencode($a).'&field='.urlencode($z).$Gf;if(!$A&&$X!==null){foreach((array)$ic[$z]as$hc){if(count($ic[$z])==1||end($hc["source"])==$z){$A="";foreach($hc["source"]as$t=>$Re)$A.=where_link($t,$hc["target"][$t],$M[$yd][$Re]);$A=($hc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($hc["db"]),ME):ME).'select='.urlencode($hc["table"]).$A;if(count($hc["source"])==1)break;}}}if($z=="COUNT(*)"){$A=ME."select=".urlencode($a);$t=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Ff))$A.=where_link($t++,$W["col"],$W["val"],$W["op"]);}foreach($Ff
as$Sc=>$W)$A.=where_link($t++,$Sc,$W);}$X=select_value($X,$A,$p,$kf);$u=h("val[$Gf][".bracket_escape($z)."]");$Y=$_POST["val"][$Gf][bracket_escape($z)];$Db=!is_array($L[$z])&&is_utf8($X)&&$M[$yd][$z]==$L[$z]&&!$pc[$z];$jf=preg_match('~text|lob~',$p["type"]);if(($_GET["modify"]&&$Db)||$Y!==null){$sc=h($Y!==null?$Y:$L[$z]);echo"<td>".($jf?"<textarea name='$u' cols='30' rows='".(substr_count($L[$z],"\n")+1)."'>$sc</textarea>":"<input name='$u' value='$sc' size='$fd[$z]'>");}else{$jd=strpos($X,"<i>...</i>");echo"<td id='$u' onclick=\"selectClick(this, event, ".($jd?2:($jf?1:0)).($Db?"":", '".h(lang(84))."'").");\">$X";}}}if($Ia)echo"<td>";$b->backwardKeysPrint($Ia,$M[$yd]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(($M||$F)&&!is_ajax()){$Pb=true;if($_GET["page"]!="last"){if(!+$_)$lc=count($M);elseif($y!="sql"||!$Qc){$lc=($Qc?false:found_rows($S,$Z));if($lc<max(1e4,2*($F+1)*$_))$lc=reset(slow_query(count_rows($a,$Z,$Qc,$s)));else$Pb=false;}}if(+$_&&($lc===false||$lc>$_||$F)){echo"<p class='pages'>";$nd=($lc===false?$F+(count($M)>=$_?2:1):floor(($lc-1)/$_));if($y!="simpledb"){echo'<a href="'.h(remove_from_uri("page"))."\" onclick=\"pageClick(this.href, +prompt('".lang(85)."', '".($F+1)."'), event); return false;\">".lang(85)."</a>:",pagination(0,$F).($F>5?" ...":"");for($t=max(1,$F-4);$t<min($nd,$F+5);$t++)echo
pagination($t,$F);if($nd>0){echo($F+5<$nd?" ...":""),($Pb&&$lc!==false?pagination($nd,$F):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$nd'>".lang(86)."</a>");}echo(($lc===false?count($M)+1:$lc-$F*$_)>$_?' <a href="'.h(remove_from_uri("page")."&page=".($F+1)).'" onclick="return !selectLoadMore(this, '.(+$_).', \''.lang(87).'...\');" class="loadmore">'.lang(88).'</a>':'');}else{echo
lang(85).":",pagination(0,$F).($F>1?" ...":""),($F?pagination($F,$F):""),($nd>$F?pagination($F+1,$F).($nd>$F+1?" ...":""):"");}}echo"<p class='count'>\n",($lc!==false?"(".($Pb?"":"~ ").lang(89,$lc).") ":"");$wb=($Pb?"":"~ ").$lc;echo
checkbox("all",1,0,lang(90),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$wb' : checked); selectCount('selected2', this.checked || !checked ? '$wb' : checked);")."\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>',lang(80),'</legend><div>
<input type="submit" value="',lang(14),'"',($_GET["modify"]?'':' title="'.lang(76).'"'),'>
</div></fieldset>
<fieldset><legend>',lang(91),' <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="',lang(10),'">
<input type="submit" name="clone" value="',lang(92),'">
<input type="submit" name="delete" value="',lang(18),'"',confirm(),'>
</div></fieldset>
';}$jc=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($jc['sql']);break;}}if($jc){print_fieldset("export",lang(93)." <span id='selected2'></span>");$Sd=$b->dumpOutput();echo($Sd?html_select("output",$Sd,$ra["output"])." ":""),html_select("format",$jc,$ra["format"])," <input type='submit' name='export' value='".lang(93)."'>\n","</div></fieldset>\n";}echo(!$s&&$N?"":"<script type='text/javascript'>tableCheck();</script>\n");}if($b->selectImportPrint()){print_fieldset("import",lang(94),!$M);echo"<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ra["format"],1);echo" <input type='submit' name='import' value='".lang(94)."'>","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Hb,'strlen'),$f);echo"<p><input type='hidden' name='token' value='$uf'></p>\n","</form>\n";}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".(+$_POST["kill"]));elseif(list($R,$u,$D)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$_=11;$J=$h->query("SELECT $u, $D FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$u = $_GET[value] OR ":"")."$D LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $_");for($t=1;($L=$J->fetch_row())&&$t<$_;$t++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($u))."]")."=".urlencode($L[0]))."'>".h($L[1])."</a><br>\n";if($L)echo"...\n";}exit;}else{page_header(lang(58),"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".lang(95).": <input name='query' value='".h($_POST["query"])."'> <input type='submit' value='".lang(41)."'>\n";if($_POST["query"]!="")search_tables();echo"<table cellspacing='0' class='nowrap checkable' onclick='tableClick(event);'>\n",'<thead><tr class="wrap"><td><input id="check-all" type="checkbox" onclick="formCheck(this, /^tables\[/);"><th>'.lang(96).'<td>'.lang(97)."</thead>\n";foreach(table_status()as$R=>$L){$D=$b->tableName($L);if(isset($L["Engine"])&&$D!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true),"","formUncheck('check-all');"),"<th><a href='".h(ME).'select='.urlencode($R)."'>$D</a>";$X=format_number($L["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($L["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","<script type='text/javascript'>tableCheck();</script>\n","</form>\n";}}page_footer();