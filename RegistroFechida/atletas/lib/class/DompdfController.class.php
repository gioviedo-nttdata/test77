<?php

use Dompdf\Dompdf;

use Dompdf\Options;


class DompdfController{

    static function getOutput($html = null){
        if(!$html){
            $html = "<html><head><title>CERTIFICACION FECHIDA 2020</title><style>@font-face {
                font-family: 'Gotham-Bold';
                src: url('fonts/GothamBold.eot');
                src: local('☺'), url('fonts/GothamBold.woff') format('woff'), url('fonts/GothamBold.ttf') format('truetype'), url('fonts/GothamBold.svg') format('svg');
                font-weight: normal;
                font-style: normal; }
            
            @font-face {
            
                font-family: 'Conv_GothamRnd-Book';
            
                src: url('http://test.diabeweb.com/fice/fonts/GothamRnd-Book.ttf') format('truetype');
            
                font-weight: normal;
            
                font-style: normal;
            
            }</style></head><body><div style=\"text-align:left\">
            Denise32364
                        </div>";
            $html .= "</div></td></tr></table></div>";
            $html .= "</body></html>";
            $html .= '</div>';
            $html .= '</body></html>';
        }

        $options = new Options();
		$options->set('defaultFont', 'Gotham-Bold');
        $dompdf = new Dompdf(array('enable_remote' => true));
		$dompdf->loadHtml($html);
        $dompdf->render();
		return $dompdf->output();
    }
    
}