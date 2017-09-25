<?php

include 'simple_html_dom.php';
 
$html = new simple_html_dom();
$html->load_file("http://www.eurosport.es/tvschedule.shtml");
$ret = $html->find('.tv-program__title');
$deportes_eurosport = array("tenis");

foreach ($ret as $r=>$r1){
    foreach ($deportes_eurosport as $value_eurosport){
        $encontrado = stripos($ret[$r]->parent()->parent()->prev_sibling()->last_child()->plaintext, $value_eurosport);
        $contador_eurosport;
        if($encontrado !== FALSE){
            if($ret[$r]->parent()->parent()->parent()->attr['data-ch-id'] == 0){
                $texto_eurosport .= $ret[$r]->nodes[0]." - ".$ret[$r]->parent()->parent()->next_sibling()->first_child()->plaintext." - "
                    .$ret[$r]->parent()->parent()->parent()->parent()->attr['data-date']
                    ." - Eurosport 1."."\n";
                $contador_eurosport += count($encontrado);
            }elseif ($ret[$r]->parent()->parent()->parent()->attr['data-ch-id'] == 200){
                $texto_eurosport .= $ret[$r]->nodes[0]." - ".$ret[$r]->parent()->parent()->next_sibling()->first_child()->plaintext." - "
                    .$ret[$r]->parent()->parent()->parent()->parent()->attr['data-date']
                    ." - Eurosport 2."."\n";
                $contador_eurosport += count($encontrado);
            } 
        }
    }
}

if($contador_eurosport > 0){
    $to = "******@gmail.com";
    $mySubject = "$contador_eurosport partidos en eurosport.";
    $txt = "$texto_eurosport";
            
    if(mail($to, $mySubject, $txt) === TRUE){
        echo 'Email enviado.';
        echo $contador;
    }else{
        echo 'Email no enviado.';
    }
}

?>