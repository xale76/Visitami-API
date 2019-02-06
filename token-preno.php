<?php
try {
  $tok='<TOKEN UTILIZZO>';
  $client = new SoapClient('https://demo.visitamiapp.com/app_api_web/genApi.asmx?wsdl');
  //$client = new SoapClient('https://www.visitamiapp.com/app_api_web/genApi.asmx?wsdl');
  
  $apiauth =array('Token'=>$tok);
  $header = new SoapHeader('http://visitamiapp.com/','FFHeaderApiGen',$apiauth,true);
  $client->__setSoapHeaders($header);



  $params->usertoken='<USER TOKEN>';
  $params->idprest=184; //id categoria Mappata da Tag
  $params->codCitta='MI-1';


  $objectresult=$client->APIGEN_CreaTokenPrenoSimple($params);

  $objRes=$objectresult->APIGEN_CreaTokenPrenoSimpleResult;
  print_r ($objRes);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
 
?>
