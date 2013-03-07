<?php

class Format {

	public static function getTimestamp($timestamp) {
		if (is_numeric($timestamp)) return $timestamp; 
		else return strtotime($timestamp);
	}
	
	public static function date($timestamp) {
		$time = Format::getTimestamp($timestamp);
		return date('d M Y', $time);
	}

	public static function datetime($timestamp) {
		$time = Format::getTimestamp($timestamp);
		return date('d M Y - H:i', $time) . " WIB";
	}
    

	public static function slug($str, $replace = array(), $delimiter = '-') {
		if (!empty($replace)) {
			$str = str_replace((array) $replace, ' ', $str);
		}

		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

		return $clean;
	}

	public static function currentCurrency() {
		return "Rp";
	}
    
    public static function roundCurrency($amount) {
        return round($amount);
    }

	public static function currency($amount) {
		$formatter = new CNumberFormatter('id_id');
		$n = $formatter->format(' ###,###', $amount);
		return $n;
	}

    public static function kode($kode) {
        $kode = explode("-",$kode);
        return $kode[1];
    }
    
    public static function kode_uid($kode) {
        $kode = explode("-",$kode);
        return $kode[0];
    }
    
	public static function currencyStyled($amount) {
		$formatter = new CNumberFormatter('id_id');
		$n = $formatter->format(self::currentCurrency() . ' ###,###', $amount);

		$s = explode(".", $n);
		$p = "<sup>." . $s[count($s) - 1] . "</sup>";
		unset($s[count($s) - 1]);
		$s = implode(".", $s);
		$p = $s . $p;

		$p = explode(" ", $p);
		$p = "<span class='currency'>" . self::currentCurrency() . "</span> " . $p[1];

		return $p;
	}

	public static function censorEmail($sEmail, $sMask = "&times;") {
		$arrEmail = explode("@", $sEmail);
		$sMaskInc = "";
		$len = strlen($arrEmail[0]) - 2;
		for ($i = 1; $i <= $len; $i++) {
			$sMaskInc .= $sMask;
		}

		return $arrEmail[0]{0} . substr_replace($arrEmail[0], $sMaskInc, 0, strlen($arrEmail[0])) . $arrEmail[0]{strlen($arrEmail[0]) - 1} . "@" . $arrEmail[1];
	}

	public static function censorNumber($number) {
		$number .= "";
		$char = "&times;";
		$str = "";
		$len = strlen($number);
		for ($i = 0; $i < $len; $i++) {
			$str .= ($i >= $len - 3 ? $number[$i] : $char);
		}
		return $str;
	}

	public static function duration($time) {
		$time = explode(":", $time);
		return $time[0] . "jam " . $time[1] . "m";
	}

	public static function timeago($timestamp) {
		$etime = time() - Format::getTimestamp($timestamp);

		if ($etime < 1) {
			return 'just now';
		}

		$a = array(12 * 30 * 24 * 60 * 60 => 'year',
			30 * 24 * 60 * 60 => 'month',
			24 * 60 * 60 => 'day',
			60 * 60 => 'hour',
			60 => 'minute',
			1 => 'second'
		);

		foreach ($a as $secs => $str) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round($d);
				
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . " ago";
			}
		}
	}

}