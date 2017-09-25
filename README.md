<h1>Correo partidos teledeporte y eurosport</h1>
<h2>Teledeporte</h2>
<h3>Descripción:</h3>
<p>Simple archivo .php que al ejecutarlo te avisa mediante email si al dia siguiente ponen  
partidos de tenis o golf, o cualquier deporte que retransmitan.</p>
<h3>Instrucciones</h3>
<p>Los deportes pueden cambiarse mediante código, en la 
linea 35, por ejemplo: a) si queremos cambiar golf por baloncesto pondriamos:
</p>
<code>
    $deportes = array("tenis", "baloncesto");
</code>
<p>Si queremos añadir baloncesto a los que ya están:</p>
<code>
    $deportes = array("tenis", "golf","baloncesto");
</code>
<p>Si queremos solo dejar un deporte, ejemplo baloncesto:</p>
<code>
    $deportes = array("baloncesto");
</code>
<p>Tambien tendremos que introducir mediante código nuestro email, en la linea 61:</p>
<code>
    $to = "******@gmail.com";
</code>
<h2>Eurosport</h2>
<h3>Descripción</h3>
<p>Simple archivo .php que al ejecutarlo te avisa mediante email si al dia siguiente ponen  
partidos de tenis o golf, o cualquier deporte que retransmitan.</p>
<h3>Instrucciones</h3>
<p>Para ejecutar este archivo hace falta el <b>test_eurosport.php</b> y el <b>simple_html_dom.php</b>
. El <b>simple_html_dom.php</b> tambien lo puedes descargar desde sourceforge en 
<a href="https://sourceforge.net/projects/simplehtmldom/files/"><strong>simple_html_dom</strong>, 
para mayor confianza.</p>
<p>Al igual que en las instrucciones para teledeporte, donde se pueden cambiar los 
parámetros son:</p>
<p>Linea 8 para añadir o cambiar deportes:</p>
<code>
    $deportes_eurosport = array("tenis");
</code>
<p>Y linea 31, para poner tu cuenta de email:</p>
<code>
    $to = "******@gmail.com";
</code>
<h4>Consejo</h4>
<p>Una manera de conseguir que el archivo se ejecute automáticamente, y que este 
continuamente funcionando, es por ejemplo subirlo a un VPS, que suelen ser de pago, 
aunque los hay baratos y programar una tarea donde se ejecute el archivo cada 
cierto tiempo, o en windows existe la aplicación tareas programadas donde, por 
ejemplo podemos pedir que nos ejecute el archivo cada vez que encendamos el ordenador.
 Esta, y otras funciones están operativas en windows, esto es por poner un ejemplo.</p>
<h3>Importante:</h3>
<p>Para ejecutarlos hace falta un IDE o un editor y un servidor web de plataforma
como por ejemplo <a href="https://www.apachefriends.org/es/index.html">XAMPP</a>
 con esto tenemos los medios para correr el archivo, esto para los que no saben 
absolutamente nada de programación.</p>

