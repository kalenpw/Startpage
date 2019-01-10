<?php

include './Parsedown.php';

class NoteUtil
{
    private static function getHtmlPath():string
    {
//        return $_SERVER["DOCUMENT_ROOT"] . "/Notes/Html/";
        return getcwd() . "/Html/";
    }
    private static function getTxtPath():string
    {
//        return $_SERVER["DOCUMENT_ROOT"] . "/Notes/Text/";
        return getcwd() . "/Text/";
    }

    public static function stripExtension(string $filename):string
    {
        $filename = pathinfo($filename, PATHINFO_FILENAME);
        return $filename;
    }

    public static function convertToHtml()
    {
        $htmlDir = self::getHtmlPath();
        $txtDir = self::getTxtPath();
        $txtFiles = scandir($txtDir);
        foreach($txtFiles as $txtFile)
        {
            $file = $txtDir . "/$txtFile";
            if(is_file($file))
            {
                $htmlFile = self::stripExtension($file) . ".html";
                $htmlFile = $htmlDir . $htmlFile;
                $f = fopen($htmlFile, "w");
                $html = file_get_contents($file);
                $parsedown = New Parsedown();
                $html = $parsedown->parse($html);
                fwrite($f, $html);
                fclose($f);
            }
        }
    }

    public static function generateLinks()
    {
        $html = "";
        $notesDir = self::getTxtPath();
        $files = scandir($notesDir);
        foreach($files as $file)
        {
            $fullFile = $notesDir . "/$file";
            if(is_file($fullFile))
            {
                $htmlPath = '/Notes/Html/' . self::stripExtension($file) . ".html";
                $html .= "<a class='note-link' href='$htmlPath'>";
                $html .= "<div class='note-wrapper'>";
                $html .= "<h2>Headign</h2>";
                $html .= self::stripExtension($file);
                $html .= "</div>";
                $html .= "</a>";

            }
        }
        echo $html;
    }
}

