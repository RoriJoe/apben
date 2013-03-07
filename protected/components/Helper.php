<?php

class Helper {
	public static function checkPost($array) {
		foreach ($array as $a) {
			if (!isset($_POST[$a])) return false;
		}
		return true;
	}
	
	public static function checkGet($array) {
		foreach ($array as $a) {
			if (!isset($_GET[$a])) return false;
		}
		return true;
	}
    
	private static $scopeStatus = true;
	public static function getDefaultScopeStatus() {
		return self::$scopeStatus;
	}
	public static function disableDefaultScope() {
		self::$scopeStatus = false;
	}
	public static function enableDefaultScope() {
		self::$scopeStatus = true;
	}
	
	
    public static function getDate($text) {
        if ($text == "0000-00-00") return "";
		$date = strtotime($text);
		return date("d M Y",$date);
    }
    
    public static function getJSDateFormat() {
        return "dd M yy";
    }
	
	public static function getSQLDate($text) {
        if ($text == "") return "";
		$time = strtotime($text);
		return date("Y-m-d",$time);
	}
	
	public static function generateGetParam($data) {
		$str = array();
		foreach ($data as $k=>$d) {
			$str[] = htmlentities($k) . "=" . htmlentities($d);
		}
		$data = str_replace(" ","%20",implode("&",$str));
		return $data;
	}
    
    public static function callAction($controller,$action,$parameter,$get = array()) {
        if (count($get) > 0) {
            foreach ($get as $k=>$v) {
                $_GET["$k"] = $v;
            }
        }
        
        $module = get_class(Yii::app()->controller->module);
        if (isset($module)) {
            $module = str_replace("Module","",$module) . '/';
        } 
        
        $c = Yii::app()->createController($module . $controller);
        ob_start();
        call_user_func(array($c[0],'action' . ucwords($action)),$parameter);
        return ob_get_clean() . $c[0]->flushScript();
    } 
    
    public static function rand() {
        return (time() + rand(1, 9999999));
    }
    
    public static function getBasePath() {
        $ds = DIRECTORY_SEPARATOR;
        $base = substr(Yii::app()->basePath,0,strrpos(Yii::app()->basePath,$ds));
        return $base;
    }
    
    public static function sendToTemp($file) {
        $ds = DIRECTORY_SEPARATOR;
        $base = self::getBasePath() ."/";
        $path = $base . "assets{$ds}uploaded{$ds}" . Yii::app()->session->sessionID . ".";
        if (!file_exists(dirname($path))) { mkdir(dirname($path)); }
        
        if (file_exists($path . basename($file))) unlink($path . basename($file));
        rename($base . $file,$path . basename($file));
    }
    
    public static function getExt($file) {
        return pathinfo($file, PATHINFO_EXTENSION);
    }
    
    public static function moveTempFile($file,$to, $newname = "") {
        $ds = DIRECTORY_SEPARATOR;
        $base = self::getBasePath() ."/";
        $path = $base . "assets{$ds}uploaded{$ds}" . Yii::app()->session->sessionID . "." . basename($file);
        $to = rtrim($to, $ds) . $ds;
        if (file_exists($path)) {
            if ($newname == "") {
                $dest = $base . $to . basename($file);
            } else {
                $ext = pathinfo($file, PATHINFO_EXTENSION);
                $newfile = str_replace("[ext]",$ext,basename($newname));
                $dest = $base . $to . $newfile;
            }
            
           rename($path, $dest);
        }
    }
    
    public static function sendMail($email, $subject, $message, $is_html = false) {
        $adminEmail = Yii::app()->params['adminEmail'];
        $adminEmailPassword = Yii::app()->params['adminEmailPassword'];
        
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = $adminEmail;
        $mail->Password = $adminEmailPassword;
        $mail->SetFrom($adminEmail, Yii::app()->name);
        $mail->Subject = $subject;

        if (!$is_html) {
            $mail->Body = $message;
        } else {
            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer.';
            $mail->MsgHTML($message);
        }

        $mail->WordWrap = 50;
        $mail->AddAddress($email);
		return $mail->Send();
    }
}