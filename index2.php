<?php
$url="http://dolar.wilkinsonpc.com.co/indicadores-economicos-dolar.html"; // url de la pagina que queremos obtener  
$c = curl_init($url);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_HTTPHEADER, array(
"Accept: */*",
"Accept-Language: *",
"Host: dolar.wilkinsonpc.com.co",
"Referer: http://dolar.wilkinsonpc.com.co",
"User-Agent: Mozilla/5.0 (Windows NT 5.1; rv:20.0) Gecko/20100101 Firefox/20.0",
"X-Fsign: SW9D1eZo",
"X-GeoIP: 1",
"X-Requested-With: XMLHttpRequest",
"X-utime: 1"
));
$content = curl_exec($c);
curl_close($c);
$lineas = explode("\n",$content);
$buscado ="http://dolar.wilkinsonpc.com.co/divisas/dolar-compra.html"; 
$renglon = 0;
$indicadores = array();
foreach ($lineas as $indice){
   // echo $renglon." --- ".$indice."<br>";
    if($renglon === 658){
     $indicadores['dolar'] = extractFromTag($indice);
       // echo "indice -> ".$indice;
    }
    if($renglon === 667){
     $indicadores['euro'] = extractFromTag($indice);
      //  echo $renglon." indice -> ".$indice;
    } 
    if($renglon === 712){
     $indicadores['petroleo'] = extractFromTag($indice);    
    } 
    if($renglon === 798){
     $indicadores['uvr'] = extractFromTag($indice); 
    }
    if($renglon === 780){
     $indicadores['dtf'] = extractFromTag($indice); 
    }
    if($renglon === 720){
     $indicadores['cafe'] = extractFromTag($indice); 
    }
    $renglon++;
}

function extractFromTag($content){
     $aux = explode(">",$content);
     $aux2 = explode("<",$aux[1]);
     $contentExtracted = $aux2[0];
     return $contentExtracted;
}

echo json_encode($indicadores);


?>