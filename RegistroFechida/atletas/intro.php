<?php  /* error_reporting(E_ALL);
ini_set('display_errors', '1');*/
$notRedirect = 1;   //  require_once 'descargar_licencia.php';

include('lib/class/phpqrcode/qrlib.php');

require 'vendor/autoload.php';
 require_once 'lib/autoloader.class.php';
	  require_once 'lib/init.class.php';
          $_page = 'intro';

	  require_once 'lib/auth.php';
     // require_once 'vistas/up_photo.php';
$url_qr = 'uploads/prueba.png';
$foto = 'uploads/perfil__64dd617b89474.jpg';
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
		
						<img src=\"https://dev.fechida.org/master/img/carnet.png?v=1\" style=\"position:absolute;width:430px; margin-bottom:5px;\" border=\"0\" ><br>
		
						<table border=\"0\" cellpadding=\"2\" cellspacing=\"['acred_id']0\" width=\"320\" align=\"left\" style=\"position:absolute;top:160px\">
							<tr>		
							<td width=\"250\" align=\"center\"><span style=\"font-family:'Gotham-Bold;font-size:25px;color:#040e98;\"><img src=\"".$foto."?v=1\" style=\"width:150px; margin-bottom:5px;\" border=\"0\" ><br>" . $authj->rowff['nombre'] . " " . $authj->rowff['apellido'] . " " . $authj->rowff['apellido2'] . "</span>
											       
											</td>
		
							</tr>
		
                            </table>
                            
                            <table border=\"0\" cellpadding=\"2\" cellspacing=\"['acred_id']0\" width=\"320\" align=\"left\" style=\"position:absolute;top:385px\">
		
							<tr>
		
						
		
							<td width=\"250\" align=\"center\"><span style=\"font-family:'Conv_GothamRnd-Book;font-size:13px;\">Rut: " . $authj->rowff['rut']  . "<br>Fecha de nacimiento: 15/03/1999<br>Código Licencia: ebjf8767887kjbn7<br></span>
											       
											</td>
		
							</tr>
		
							</table>
		
							<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" width=\"150\" align=\"center\" style=\"position:absolute;top:450px\">
		
							<tr>
		
						
		
							<td width=\"650\" align=\"left\"><span style=\"font-family:'Conv_GothamRnd-Book;font-size:11px;color:#333333;padding-left:150px\"></span></td>
		
                            </tr>
                            <tr>
		
						
		
							<td width=\"650\" align=\"left\" style=\"padding-top:18px;padding-left:50px\"><img src=\"".$url_qr."\"><br> <span style=\"font-family:'Conv_GothamRnd-Book;font-size:10px;\">VÁLIDO HASTA 31/12/2023</span></td>
		
                            </tr>
                           
		
							</table></div>";
        $html .= "</div></td></tr></table></div>";
        $html .= "</body></html>";
        $html .= '</div>';
        $html .= '</body></html>';


?>
<style>
  body{
/* font-family: 'Poppins', sans-serif; */
text-align: center;
}
.container{

  height:700px;
  display:flex;
  align-items: center;
  justify-content: center;
  margin:50px;
  flex-direction: column;
}
.card{
  background-color: white;
  margin: 15px;
  height: 600px;
  width: 400px;
  border-radius:25px;
  position: relative;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.img{
 /*  background-color: black; */
  border-radius:25px 25px 0 0;
  height: 180px;
  background-image: linear-gradient(to right top, #051b3c, #002d64, #00408f, #0053bc, #1267eb);
/*   background-image: url(img/222.jpg);
  background-size: cover;
  background-position: center; */
}
.profilePic{
/*   background-color: black; */
  padding:5px;
  height:125px;
  width: 125px;
  border-radius: 75px;
  z-index: 5;
  position:absolute;
  right:35%;
  top:77px;
  background-image:url(uploads/perfil__64dd617b89474.jpg);
  background-size: cover;
  background-position: center;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
h2{
  margin-top: 65px;
  color: #495057;
  font-size: 20px;
  font-family: 'Noto Sans', sans-serif;
}
.title{
  font-size: 12px;
  font-family: 'Dosis', sans-serif;
  color: #808080;
  font-style:bold;
  margin-top: -15px;
  margin-bottom: 5px;
}


.img svg{
  margin-top: 120px;
}
</style>

<div class = "container">

  <div class="card">
    <div class="img">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,64L48,53.3C96,43,192,21,288,58.7C384,96,480,192,576,218.7C672,245,768,203,864,154.7C960,107,1056,53,1152,32C1248,11,1344,21,1392,26.7L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
    </div>
    
    <div class="profilePic"></div>
    <h2>Morgen Sweeney</h2>
    <p class="title">
      Ant Collector
    <br>
    Rut: 2432142354
    <br>
    Fecha de nacimiento: 15/03/1999
    <br>
    Código de licencia: 1823761847jbkbj
    </p>
    <div><img src="uploads/prueba.png" alt="" width="150">
  <br>
  <span class="title">VÁLIDO HASTA 31/12/2023</span><br><br></div>

  <img src="img/logo_fechida.jpg" alt="" width="150" style="position:absolute;bottom: 15px;right: 15px;">
  </div>
</div>