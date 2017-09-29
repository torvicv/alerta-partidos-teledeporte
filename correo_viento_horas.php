<?php
include 'simple_html_dom.php';

$html = new simple_html_dom();
$html->load_file("http://tiempo.es/el-tiempo/por-horas/sevilla-sevilla-es0se0093.html");
$viento = $html->find('#detailsDay .item');//->find('.param', 1)->find('.body');
$texto_viento;
//echo $viento;
//var_dump($ret->nodes[0]);
//var_dump($viento);
foreach ($viento as $items){
    $velocidad = $items->find('.param', 1)->find('.body');
    //var_dump($velocidad);
    $horas_viento = $items->find('.hour');
    
    foreach ($velocidad as $v){
        $encontrado_viento_hora = preg_match('/[0-9]\./', $v, $coincidencia);
        
        if($encontrado_viento_hora !== FALSE){
            foreach ($coincidencia as $c){
                if($c >= 4){
                    $texto_viento = trim($c, ".");
                    $texto_viento2 .= $texto_viento." km/h - a las ";
                    $texto_viento2 .= $v->parent()->parent()->parent()->first_child()->first_child()->plaintext."\n";
                    $contador_vientos += count($encontrado_viento_hora);
                }
            }
        }
    }
    
}

if($contador_vientos > 0){
            $to = "torvicv@gmail.com";
            $mySubject = "Hay $contador_vientos alertas por viento!!!.";
            $txt = "$texto_viento2";
            
            if(mail($to, $mySubject, $txt) === TRUE){
                echo 'Email enviado.';
                echo $contador;
            }else{
                echo 'Email no enviado.';
            }
        }