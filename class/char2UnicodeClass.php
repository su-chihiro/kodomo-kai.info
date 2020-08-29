<?php
class CharChicanClass {
	public function char_replacement($str) {
		$str = mb_convert_encoding($str, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
		$str = str_replace(";", "&#x003B;", $str);
		$str = str_replace("<", "&#x003C;", $str);
		$str = str_replace(">", "&#x003E;", $str);
		$str = str_replace("\"", "&#x201C;",$str);
		$str = str_replace("/", "&#x002F;", $str);
		$str = str_replace("\\", "&#x005C;",$str);
		$str = nl2br($str, false);
		$str = str_replace(".", "&#x002E;", $str);
		$str = str_replace("$", "&#x0024;", $str);
		$str = str_replace("=", "&#x003D;", $str);
		$str = str_replace("(", "&#x0028;", $str);
		$str = str_replace(")", "&#x0029;", $str);
		$str = str_replace("{", "&#x007B;", $str);
		$str = str_replace("}", "&#x007D;", $str);
		$str = str_replace("[", "&#x005B;", $str);
		$str = str_replace("]", "&#x005D;", $str);
		$str = str_replace(" ", "&#xA0;",   $str);
		$str = str_replace(PHP_EOL, '', $str);
		return $str;
  }
	public function tag_replacement($str) {
		$str = str_replace("<", "&#x003C;", $str);
		$str = str_replace(">", "&#x003E;", $str);
		$str = str_replace("/", "&#x002F;", $str);
		$str = nl2br($str, false);
		$str = str_replace(PHP_EOL, '', $str);
		return $str;
	}
	public function blog_body_replacement($str) {
		$str = str_replace("\"", "\\\"",$str);
		$str = nl2br($str, false);
		$str = str_replace(PHP_EOL, '', $str);
		return $str;
	}
}
?>
