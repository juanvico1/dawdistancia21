<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Ejercicio DAW05: rellena una tabla y marca una</title>
        <meta charset="UTF-8">
        <meta name="author" content="DAW2021 Juan Francisco Vico Martinez">
        
    </head>
    <body>
        <?php
			/**
			*  
			*  Dibuja un tablero de color verde n x m lados y marca uno de 				*  color azul
			*  Script que proporcionando 3 valores como parámetros
			*  de entrada via GET, dibuja un tablero de color verde
			*  un cuadrado de color azul.
			*  @internal este script ha sido desarrollado como ejercicio para el módulo DWES del IES Aguadulce cursi 2020/2021
			*  @version 1.0 26/05/2021
			*  @author Juan Francisco Vico Martinez
			*/
			
            //Definición de constantes
			// MAX_LADO->tamaño máximo que puede tener el tablero
			// MIN_LADO->tamaño mínimmo que puede tener el tablero
            define("MAX_LADO", 8);
            define("MIN_LADO", 3);
            define("DEFAULT_LADO", 5);
            
            //definicion de variables lado y posición del cuadro azul
            // $x posición en la columna
            // $y posición en la fila filas
            // $lado número de cuadros 
            $y=0;
            $x=0;
            $lado=0;
            echo 'Ejemplo de uso: http://localhost/DAW05/jufravima.php?x=1&y=1&l=8<br>';
            //variable boolena para el control de flujo
            $esValido=false;
            //tamaño de la tabla si no se define l se asigna DEFAULT_LADO
            if(isset($_GET['l']) or (!empty($_GET['l']))){
                $lado=$_GET['l'];
                if(($lado<3) or ($lado>8)){
                    error("l");
                    exit("Prueba otra vez..<br>Por ejemplo..<br>http://localhost/DWES01/ejercicio2.php?x=1&y=1&l=8");
                }
            }else{
                $lado=DEFAULT_LADO;
            }
            
            //imprimimos la url del documento actual
             echo "<h1>".$_SERVER['PHP_SELF']."</h1>";
            
            //variables para el cuadrado azul
            // x son las columnas
            // y son las filas
            //se verifica que x contenga valor o no esté vacio en 
			//ese supuesto se genera error
            if(isset($_GET["x"]) or (!empty($_GET["x"]))){
                $x=$_GET["x"];
                $esValido= validaNumero($x);
                if(!$esValido) error("x");
            }else{
                echo ("La variable \$x no tiene un valor<br>");
            }
            
            //se verifica que y contenga valor o no esté vacio en ese supuesto 
            //se gener el error
            if(isset($_GET["y"]) or (!empty($_GET["y"]))){
                $y=$_GET["y"];
                $esValido= validaNumero($y);
                if (!$esValido) error("y");
            }else{
                echo ("La variable \$y no tiene un valor<br>");
            }
            //si las variable x e y son validas pintamos la tabla
            if ($esValido){
                pintarTabla($x,$y);
            }
            
            /*
             * muestra el error producido
             * @param $letra string para la variable que produce el error
             */
            function error($letra){
                echo ("La variable \$${letra} está fuera del rango >=3 y <=8<br>");
            }
            
            /**
			* funcion que valida si las coordenadas estan dentro del rango de  
            * MIN_LADO>=3 y MAX_LADO<=8
			*
			* @param $numero int valor que tendrá de lado el tablero 
			* @return boolean si el rango de los número esta dentro de los 
			* límites se devuelve true en caso contrario se devuelve false
			*/
            function validaNumero($numero){
                //la varieble $lado está definda fuera de la función, mediante global
                // la hacemos visible dentro de la función
                global $lado;
                
                if($numero >=0 and $numero <=$lado){
                    return true;
                }else{
                    return false;
                }
            }
            
            /**
			* Se dibuja la tabla con los valores x e y si estén en el rango, el lado 
            * si no se ha proporcionado se establece por defecto a 5
			* @param $x int valor para la posición x donde ponemos en cuadrado azul
			* @param $y int valor para la posición y donde ponemos el cuadrado azul
			*/
            function pintarTabla($x,$y){
                global $lado;
               //Se abre la tabla con estilos
                echo '<table border=0 cellspacing=2>';
                //bucle para la fila
                for($i=0;$i<$lado;$i++){
                    echo '<tr>';
                    //bucle para cada celda
                    for($j=0;$j<$lado;$j++){
                     /*   echo 'valor de x: '.$x;
                        echo 'valor de y  '.$y;  */
                        if(($j==$y) and ($i==$x)){
                            echo '<td style="background-color:blue; width: 80px; height: 80px; text-align: center;">';
                              echo $j.'x'.$i;
                            echo '</td>';
                        }else{
                            echo '<td style="background-color:green; width: 80px; height: 80px; text-align: center;">';
                              echo $j.'x'.$i;
                            echo '</td>';

                        }
                    }
                    echo '</tr>';
                }
                echo '</table>';

            }//fin funcion pintarTabla
         ?>
    </body>
   
</html>


