<?php

/**
 * @author Vlad1251
 * @copyright 2017
 */

class FileClass
{

    private $url;
    private $descriptor;

    public function __construct($file)
    {
        $fp = fopen($file, "r"); // Открываем файл в режиме чтения
        $this->descriptor = $fp;
        $this->url = $file;
    }


    public function uploadFileToMass(){

        if ($this->descriptor)
        {
            $mytext = fgets($this->descriptor, 999);
            $dataLines = explode("%%%%%", $mytext);
            $configM = array();

            for ($i=0; $i<count($dataLines); $i++){

                $dataWords =  explode("-->>", $dataLines[$i]);
                $configM[$dataWords[0]] = $dataWords[1];
            }
            return $configM;

        }
        return "Помилка зчитування";
    }


    public function setConfig($mass){
        $line = '';

        foreach ($mass as $key => $val){
            $line .= $key."-->>".$val.'%%%%%';
        }
        $line =  substr($line, 0, -5);

        $this->rewriteFile($line);
    }

    private function rewriteFile($line){
        fclose($this->descriptor);

        $fp = fopen($this->url, "w+"); // Открываем файл в режиме записи, удаляем всё содержимое
        $this->descriptor = $fp;

        fwrite($this->descriptor, $line);

        fclose($this->descriptor);
        $fp = fopen($this->url, "r"); // Открываем файл в режиме чтения
        $this->descriptor = $fp;
    }

    public function __destruct(){
        fclose($this->descriptor);
    }
}

?>