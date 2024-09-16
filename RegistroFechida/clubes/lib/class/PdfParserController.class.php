<?php

function autoloadPdfParser($class){
    if (strpos($class, 'PdfParser\\') === 0) {
        $file = __DIR__  ."/" .str_replace('\\', '/', $class) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register('autoloadPdfParser', true, true);

use PdfParser\Parser;

class PdfParserController{

    public $text;

    function __construct($file){
        $file = $file;
        try{
            $parser = new Parser();
            $pdf = $parser->parseFile($file);
            $this->text = $pdf->getText();
        }catch(Exception $e){

        }
    }

    function extractText($between,$removeSpaces=false) {
        return Funciones::extractText($this->text,$between,$removeSpaces);
    }
    
}