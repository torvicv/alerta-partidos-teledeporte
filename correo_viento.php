<?php
include 'simple_html_dom.php';

$html = new simple_html_dom();
$html->load_file("http://tiempo.es/sevilla-sevilla-es0se0093.html");
$viento = $html->find('#mainPrediction .info .item',2)->find('.txt');
$advices = $html->find('#mainPrediction .body .advicesCont .advices p');
$texto_viento;
$aviso_viento;

//var_dump($ret->nodes[0]);
foreach ($viento as $v){
    preg_match('/[0-9][0-9]/', $v, $coincidencia);
    foreach ($coincidencia as $c){
        if($c > 10){
            $texto_viento = $c;
        }
    }
}

//var_dump($advices);
foreach ($advices as $a){
    $encontrado_viento = stripos($a, "viento");
    if($encontrado_viento !== FALSE){
        $aviso_viento = $a;
        $aviso_viento = strip_tags($aviso_viento);
    }    
}

if(!empty($texto_viento) || !empty($aviso_viento)){
    $to = "torvicv@gmail.com";
    $mySubject = "Avisos por vientos.";
    if(!empty($texto_viento)){
        $txt = "Esperados vientos de $texto_viento km/h \n";
    }
    if(!empty($aviso_viento)){
        $txt .= $aviso_viento;
    }
    if(mail($to, $mySubject, $txt) === TRUE){
        echo 'Email enviado.';
    }else{
        echo 'Email no enviado.';
    }
}