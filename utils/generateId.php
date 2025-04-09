<?php IDEA:

class GenerateId{
    public static function generate(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $char = '0123456789abcdefghijklmnopqrstuvwxyz';
        $cutstring = str_shuffle($char);
        $string = substr($cutstring, 0, 10);
        $chars = str_split($string);
        $formattedString = "";
        foreach ($chars as $i => $char) {
          if ($i > 0 && $i % 5 == 0) {
            $formattedString .= "-";
          }
          $formattedString .= $char;
        }
        $time = date("Ymd-His");
        $microtime = microtime();
        $random = $time.'-'.$formattedString;
        return $random;
    }

}