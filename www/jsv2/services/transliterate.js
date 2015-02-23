define(function() {
	const delimiter = ' ';
	const mapIn = [
		'İ', '©', 'ß', 'À', 'à', 'Á', 'á', 'Â', 'â', 'Ã', 'ã', 'Ä', 'ä', 'Å', 'å', 'Æ', 'æ', 'Ç', 'ç', 'È', 'è', 'É', 'é', 'Ê', 'ê', 'Ë', 'ë', 'Ì', 'ì', 'Í', 'í', 'Î', 'î', 'Ï', 'ï', 'Ð', 'ð', 'Ñ', 'ñ', 'Ò', 'ò', 'Ó', 'ó', 'Ó', 'Ô', 'ô', 'Õ', 'õ', 'Ö', 'ö', 'Ø', 'ø', 'Ù', 'ù', 'Ú', 'ú', 'Û', 'û', 'Ü', 'ü', 'Ý', 'ý', 'Þ', 'þ', 'ÿ', 'Ā', 'ā', 'Ą', 'ą', 'Ć', 'ć', 'Č', 'č', 'Ď', 'ď', 'Ē', 'ē', 'Ę', 'ę', 'Ě', 'ě', 'Ğ', 'ğ', 'Ģ', 'ģ', 'Ī', 'ī', 'ı', 'Ķ', 'ķ', 'Ļ', 'ļ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'Ő', 'ő', 'Ř', 'ř', 'Ś', 'ś', 'Ş', 'ş', 'Š', 'š', 'Ť', 'ť', 'Ū', 'ū', 'Ů', 'ů', 'Ű', 'ű', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ΐ', 'Ά', 'ά', 'Έ', 'έ', 'Ή', 'ή', 'Ί', 'ί', 'ΰ', 'Α', 'α', 'Β', 'β', 'Γ', 'γ', 'Δ', 'δ', 'Ε', 'ε', 'Ζ', 'ζ', 'Η', 'η', 'Θ', 'θ', 'Ι', 'ι', 'Κ', 'κ', 'Λ', 'λ', 'Μ', 'μ', 'Ν', 'ν', 'Ξ', 'ξ', 'Ο', 'ο', 'Π', 'π', 'Ρ', 'ρ', 'ς', 'Σ', 'σ', 'Τ', 'τ', 'Υ', 'υ', 'Φ', 'φ', 'Χ', 'χ', 'Ψ', 'ψ', 'Ω', 'ω', 'Ϊ', 'ϊ', 'Ϋ', 'ϋ', 'Ό', 'ό', 'Ύ', 'ύ', 'Ώ', 'ώ', 'А', 'а', 'Б', 'б', 'В', 'в', 'Г', 'г', 'Д', 'д', 'Е', 'е', 'Ж', 'ж', 'З', 'з', 'И', 'и', 'Й', 'й', 'К', 'к', 'Л', 'л', 'М', 'м', 'Н', 'н', 'О', 'о', 'П', 'п', 'Р', 'р', 'С', 'с', 'Т', 'т', 'У', 'у', 'Ф', 'ф', 'Х', 'х', 'Ц', 'ц', 'Ч', 'ч', 'Ш', 'ш', 'Щ', 'щ', 'Ъ', 'ъ', 'Ы', 'ы', 'Ь', 'ь', 'Э', 'э', 'Ю', 'ю', 'Я', 'я', 'Ё', 'ё', 'Є', 'є', 'І', 'і', 'Ї', 'ї', 'Ґ', 'ґ'
	];
	const mapOut = [
		'I', '(c)', 'ss', 'A', 'a', 'A', 'a', 'A', 'a', 'A', 'a', 'A', 'a', 'A', 'a', 'AE', 'ae', 'C', 'c', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'D', 'd', 'N', 'n', 'O', 'o', 'O', 'o', 'o', 'O', 'o', 'O', 'o', 'O', 'o', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'Y', 'y', 'TH', 'th', 'y', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'D', 'd', 'E', 'e', 'e', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'i', 'i', 'i', 'k', 'k', 'L', 'l', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'O', 'o', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'u', 'u', 'U', 'u', 'U', 'u', 'Z', 'z', 'Z', 'z', 'Z', 'z', 'i', 'A', 'a', 'E', 'e', 'H', 'h', 'I', 'i', 'y', 'A', 'a', 'B', 'b', 'G', 'g', 'D', 'd', 'E', 'e', 'Z', 'z', 'H', 'h', '8', '8', 'I', 'i', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', '3', '3', 'O', 'o', 'P', 'p', 'R', 'r', 's', 'S', 's', 'T', 't', 'Y', 'y', 'F', 'f', 'X', 'x', 'PS', 'ps', 'W', 'w', 'I', 'i', 'Y', 'y', 'O', 'o', 'Y', 'y', 'W', 'w', 'A', 'a', 'B', 'b', 'V', 'v', 'G', 'g', 'D', 'd', 'E', 'e', 'Zh', 'zh', 'Z', 'z', 'I', 'i', 'J', 'j', 'K', 'k', 'L', 'l', 'M', 'm', 'N', 'n', 'O', 'o', 'P', 'p', 'R', 'r', 'S', 's', 'T', 't', 'U', 'u', 'F', 'f', 'H', 'h', 'C', 'c', 'Ch', 'ch', 'Sh', 'sh', 'Sh', 'sh', '', '', 'Y', 'y', '', '', 'E', 'e', 'Yu', 'yu', 'Ya', 'ya', 'Yo', 'yo', 'Ye', 'ye', 'I', 'i', 'Yi', 'yi', 'G', 'g'
	];

	/**
	 * Based on
	 * @author Sean Murphy <sean@iamseanmurphy.com>
	 * @copyright Copyright 2012 Sean Murphy. All rights reserved.
	 * @license http://creativecommons.org/publicdomain/zero/1.0/
	 */
	function transliterate(s) {
		s = String(s);

		// Transliterate characters to ASCII
		for (let i in mapIn) {
			s = s.replace(RegExp(mapIn[i], 'g'), mapOut[i]);
		}

		// Replace non-alphanumeric characters with our delimiter
		var regexAlphanum = (typeof(XRegExp) === 'undefined') ? RegExp('[^a-z0-9]+', 'ig') : XRegExp('[^\\p{L}\\p{N}]+', 'ig');
		s = s.replace(regexAlphanum, delimiter);

		// Remove duplicate delimiters
		s = s.replace(RegExp('[' + delimiter + ']{2,}', 'g'), delimiter);

		// Remove delimiter from ends
		s = s.replace(RegExp('(^' + delimiter + '|' + delimiter + '$)', 'g'), '');

		return s;
	}

	return {
		delimiter: delimiter,
		transliterate: transliterate
	};
});