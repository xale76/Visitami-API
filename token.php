<?php
try {
  $RefreshToken='<TOKEN APPLICAZIONE>';

  $client = new SoapClient('https://demo.visitamiapp.com/app_api_web/genApi.asmx?wsdl');
  //$client = new SoapClient('https://www.visitamiapp.com/app_api_web/genApi.asmx?wsdl');

  $apiauth =array('Token'=>$RefreshToken);
  $header = new SoapHeader('http://visitamiapp.com/','FFHeaderApiGen',$apiauth,true);
  $client->__setSoapHeaders($header);

  $objectresult=$client->APIGEN_TokenRenew();
  $strResult=$objectresult->APIGEN_TokenRenewResult;

  if ($strResult!='')
  {
    $objRes=(json_decode());
    print_r($objRes);
  }
  else
  {
    echo "ERROR: ".$objectresult->lErr; 
  }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
 
?>
