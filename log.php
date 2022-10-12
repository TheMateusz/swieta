<?php

class Log{

    private $path = 'logs/';

    public function __construct() {
        global $root;
        date_default_timezone_set('Europe/Amsterdam');
        $this->path  = $root.$this->path;
    }

    public function write($message) {
        $date = new DateTime();
        $log = $_SERVER['DOCUMENT_ROOT'] .'/swieta/'. $this->path . $date->format('Y-m-d').".txt";
        echo $log;
        if(is_dir($this->path)) {
            if(!file_exists($log)) {
                $fh = fopen($log, 'a+') or die("Fatal Error !");
                $content = "Time : " . $date->format('H:i:s')."\r\n" . $message ."\r\n";
                fwrite($fh, $content);
                fclose($fh);
            }
            else {
                $this->edit($log,$date, $message);
            }
        }
        else {
            if(mkdir($this->path,0777) === true)
            {
                $this->write($message);
            }
        }
    }

    private function edit($log,$date,$message) {
        $content = "Time : " . $date->format('H:i:s')."\r\n" . $message ."\r\n\r\n";
        $content = $content . file_get_contents($log);
        file_put_contents($log, $content);
    }
}
?>