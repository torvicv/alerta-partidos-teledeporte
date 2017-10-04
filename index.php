<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Partidos en teledeporte.</title>
    </head>
    <body>
    <?php 
   $contador;
   $dayOfWeek = date("l");
        if($dayOfWeek == "Tuesday"){
            $dia = "miercoles";
        }elseif ($dayOfWeek == "Wednesday") {
            $dia = "jueves";
        }elseif ($dayOfWeek == "Thursday") {
            $dia = "viernes";
        }elseif ($dayOfWeek == "Friday") {
            $dia = "sabado";
        }elseif ($dayOfWeek == "Saturday") {
            $dia = "domingo";
        }elseif ($dayOfWeek == "Sunday") {
            $dia = "lunes";
        }else{
            $dia = "martes";
        }
        header('Content-Type: text/html; charset=UTF-8');        
        ini_set("default_socket_timeout","05");
        set_time_limit(5);
        $f=fopen("http://www.rtve.es/tve/b/teledeporte/modulos/tdp_table_parrilla.php?dia=$dia","r") or die(""
               . "este archivo no se puede abrir");
        
        while(!feof($f)) {
            // guarda en la variable cada linea hasta un salto de linea
            $dondeBuscar = stream_get_line($f,10000,"<br>");
            $deportes = array("volei", "voley");
            $dom = new DOMDocument();

            $dom->loadHtml($dondeBuscar);
            // consigue cada elemento con etiqueta p
            $h3s = $dom->getElementsByTagName('p');
            
                foreach($h3s as $h3) {
                    if(!empty($h3)){
                        foreach ($deportes as $value) {
                            //encuentra cada vez que en una linea encuentra uno de los deportes del array
                            $encontrar = stripos($h3->nodeValue, $value); 
                            if($encontrar != FALSE ){
                                //cuenta el número de veces que ha encontrado un partido en teledeporte
                                $contador += count($encontrar);
                                $texto .= $h3->nodeValue."\n";                              
                            }
                        }
                    }  
                }
                //convierte los caracteres especiales a ISO-8859-1, en gmail se ve bien sin convertir, pero 
                // en hotmail no convierte los caracteres especiales
                $texto_filtrado = utf8_decode($texto);
        }

        if($contador > 0){
            $to = "torvicv@gmail.com";
            $mySubject = "$contador partidos en teledeporte.";
            $txt = "$texto_filtrado";
            
            if(mail($to, $mySubject, $txt) === TRUE){
                echo 'Email enviado.';
                echo $contador;
            }else{
                echo 'Email no enviado.';
            }
        }
        
        fclose($f);
    ?>
    </body>
</html>
