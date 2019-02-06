<?php
try {
  $tok='<TOKEN UTILIZZO>';
  $client = new SoapClient('https://demo.visitamiapp.com/app_api_web/genApi.asmx?wsdl');
  //$client = new SoapClient('https://www.visitamiapp.com/app_api_web/genApi.asmx?wsdl');
  
  $apiauth =array('Token'=>$tok);
  $header = new SoapHeader('http://visitamiapp.com/','FFHeaderApiGen',$apiauth,true);
  $client->__setSoapHeaders($header);

  $citRes=$client->APIGEN_GetCitta();
  $objRes=(json_decode($citRes->APIGEN_GetCittaResult));

  print_r($objRes);
  echo "<br>";


  $citRes=$client->APIGEN_GetCategorie();
  $objRes=(json_decode($citRes->APIGEN_GetCategorieResult));

  print_r($objRes);
  echo "<br>";


  $params->idcate=1; //id categoria Mappata da Tag
  $params->codCitta='MI-1';


  $objectresult=$client->APIGEN_DoSearchSimple($params);

  $objRes=(json_decode($objectresult->APIGEN_DoSearchSimpleResult));

  $cnt= count($objRes);
  if ($cnt==0 && $objectresult->lErr!='')
     echo "ERROR: ".$objectresult->lErr; 

  foreach ($objRes as $prof)
  {
      echo $prof->Nome."<br><img src='".$prof->UrlImmagine."' style='width:80px;height:80px'><br>";
      echo $prof->PrimaDisponibilita->Data." ".$prof->PrimaDisponibilita->Ora."<br><br>";
      $tar=$prof->PrimaDisponibilita->Tariffa;
      if ($prof->PrimaDisponibilita->ScontoD>0)
        $tar="<span style='text-decoration:line-through'>".$prof->PrimaDisponibilita->Tariffa."</span> ".$prof->PrimaDisponibilita->TariffaScontata;
      echo $tar." ".$prof->PrimaDisponibilita->Sconto."<br><br>";
  }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
 
?>
