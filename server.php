<?php

//require_once "nusoap/lib/nusoap.php";
require_once "nusoap-php7/src/nusoap.php";

class elbise{
    public function getElbise($type){
        switch($type){
            case "gunluk":
                return "Kot Gömlek..";
                break;
            case "yilbasi":
                return "Kırmızı Konsepti";
                break;
            case "ozelgece":
                return "Abiye";
                break;
            default:
                break;
        }
    }
}

$server = new soap_server();
$server->configureWSDL("elbiseservise","http://localhost/php-soap/elbiseservise");
$server->register("elbise.getElbise",
    array("type" => "xsd:string"),
    array("return" => "xsd:string"),
    "http://localhost/php-soap/elbiseservice",
    "http://localhost/php-soap/elbiseservice#getElbise",
    "rpc",
    "encoded",
    "Get elbise by type");
  
@$server->service($HTTP_RAW_POST_DATA);