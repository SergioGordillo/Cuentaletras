<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cuentaletras</title>
    <!-- Deberá crear una página .php llamada LetrasTexto.php, esta tendrá un formulario con un campo de tipo TextArea, llamado 'Texto' en el que se pueda introducir un texto de hasta 10 lineas máximo. Debajo del textarea habrá un botón de envío(Submit) y otro para limpiar el contenido del campo(Reset). -->
<!-- Al pulsar el botón de Submit los datos del textarea se autoenvíaran a la página la cual, mediante el código Php,
     deberá procesarlo para mostrar por pantalla una tabla que contendrá en la primera columna cada una de las letras que aparezcan en el texto y en la segunda el número de veces que esa letra se encuentra en el texto introducido. -->

</head>
<body>

<?php 

if(isset($_POST["enviar"])){
    
    $texto=$_POST['texto']; //Cojo el texto

    $letras=array(); //Creo el array que almacena las letras del texto
    

    $array=str_split($texto); //Separo el texto por letras y lo meto en una variable que es un array porque split siempre devuelve 
    //un array

    foreach($array as $letra){
        if(ctype_alnum($letra)){ //Esto es para controlar los carácteres extraños y espacios
            if(isset($letras[strtoupper($letra)]) || isset($letras[strtolower($letra)])){ //Comprueba si $Letra existe o no
               
               if(isset($letras[strtoupper($letra)])){
                   $letras[strtoupper($letra)]++; //Incremento en $letras la cantidad en 1
               }
               if(isset($letras[strtolower($letra)])){
                $letras[strtolower($letra)]++; //Incremento en $letras la cantidad en 1
               }
                
            }else {
                $letras[$letra]=1; //Si no existe, me crea la propiedad
            }
        } 


    }


    ?>

    <table>
    <tr> 
    <th>Letras</th>
    <th>Repeticiones</th>
    </tr>
  
    
<?php

foreach ($letras as $letra => $coincidencia) {
    echo "<tr>";
    echo "<td>".$letra."</td>";
    echo "<td>".$coincidencia."</td>";
    echo "</tr>";
}


   echo "</table>"; 



}

?> 

    <form action="LetrasTexto.php" method="POST">

            <label for="texto">Introduzca un texto</label>
            <!-- Con rows limito a 10 el número de líneas -->
            <textarea rows="10" name="texto" id="texto"></textarea> 
        
            <button type="submit" name="enviar"> Enviar texto </button> 
            <input type="reset">

        
            </form>

    </form>
    
</body>
</html>


