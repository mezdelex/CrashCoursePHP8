<?php
// PHP 8 Crash Course https://www.youtube.com/playlist?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-
declare(strict_types=1); // No permite mutar los tipos. Tipado estricto.
// Las sentencias se separan con ";" como en Java
// URL para este documento PHP: http://localhost/CursoPHP/index.php
echo "Esto es una cadena";
echo "<br />";
echo "Esto es" . " una unión de cadenas con el operador '.'";
echo "<br />";
echo "PHP es interpretado, por lo que hace falta un servidor web como por ejemplo APACHE para ser interpretado en el navegador.";
echo "<br />";
$variable = "Esto es una variable.";
echo "${variable}";
echo "<br />";
echo "{$variable}";
echo "<br />";
echo $variable;
echo "<br />";
const CONSTANTE = "esto es una constante.";
define("CONSTANTE_MEDIANTE_DEFINE", "esto es otra forma de definir una constante.");
echo "Esto es" . " una concatenación" . " de cadenas. Y " . CONSTANTE;
echo "<br />";
echo "Esto es" . " otra concatenación" . " de cadenas. Y " . CONSTANTE_MEDIANTE_DEFINE;
echo "<br />";
$variable_booleana = true;
echo $variable_booleana . " - Una variable booleana devuelve un 1 en caso de ser 'true'." . "<br />";
/* Se puede definir la base del tipo númerico con un prefijo al asignar el valor:
Base 10: normal - $variable_integer = 2;
Base 16: 0x - $variable_integer = 0x4A;
Base 8: 0 - $variable_integer = 0123;
Base 2: 0b - $variable_integer = 0b11001;
*/
$variable_integer = 5;
echo $variable_integer . "<br />";
$variable_float = 0.5;
echo $variable_float . "<br />";
$variable_string = "La que ya hemos usado arriba.";
echo $variable_string . "<br />";
// Para acceder a una letra en concreto, al ser realmente un array de chars, podemos usar la misma expresión que con los arrays.
echo $variable_string[1] . "<br />"; // Esto nos devolvería la letra "a" de la cadena. 
echo $variable_string[-2] . "<br />"; //Si ponemos '-1' nos devuelve el índice empezando por el final de la cadena PERO SÓLO VALE CON STRINGS NO CON ARRAYS.
// Heredoc
$campo_de_texto = <<<TEXT
Esto es
un campo
de texto
TEXT;
echo nl2br($campo_de_texto); // Se utiliza 'nl2br()' 'new line to br' para representar los saltos de línea en el 'Heredoc'.
echo "<br />";
echo gettype($variable_booleana) . "<br />"; // 'gettype()' Devuelve el tipo de dato.
echo var_dump($variable_booleana) . "<br />"; // 'var_dump()' Devuelve toda la información de la variable.
echo gettype($variable_integer) . "<br />";
echo var_dump($variable_integer) . "<br />";
echo gettype($variable_float) . "<br />"; // 'gettype' la reconoce como 'double'.
echo var_dump($variable_float) . "<br />"; // 'var_dump' la reconoce como 'float'.
echo gettype($variable_string) . "<br />";
echo var_dump($variable_string) . "<br />";
$variable_array = ["Esto es un array", "de cadenas."];
echo $variable_array[0] . " " .  $variable_array[1] .  "<br />"; // Para pintar un array hay que llamar al contenido de cada índice.
print_r($variable_array); // O usar 'print_r' aunque es poco legible.
echo "<br />";
echo "<pre>"; // Con la etiqueta HTML '<pre>' el contenido de 'print_r' es mucho más legible.
echo print_r($variable_array);
echo "</pre>";
foreach ($variable_array as $posicion) { // O hacer un bucle que itere sobre dicho array.
    echo $posicion . " ";
}
echo "<br />";
echo isset($variable_array[2]); // Podemos comprobar si existe dicho índice con 'isset()'. Nos devuelve cadena vacía en el 'echo' porque es 'false', no hay nada en el índice 2.
echo "<br />";
echo isset($variable_array[1]);
echo "<br />";
array_push($variable_array, "Cadena añadida con push.");
echo "<pre>";
print_r($variable_array);
echo "</pre>";
$variable_array[] = "Cadena añádida con asignación sin índice que equivale a push.";
echo "<pre>";
print_r($variable_array);
echo "</pre>";
// También se pueden asignar directamente los índices con sus respectivos valores en un array simulando un diccionario o HashMap.
$variable_array_multi = [
    "nombre" => "Alex",
    "primer apellido" => "Conde",
    "segundo apellido" => "Gómez"
];
$variable_array_multi["edad"] = 35; // Igualmente se pueden 'pushear' valores especificando el índice.
$variable_array_multi["aficiones"] = [ // Y también anidar arrays obteniendo un array multidimensional.
    "indoor" => ["Fútbol", "Ping-Pong"],
    "outdoor" => ["Voleibol", "Snorkel"]
];
echo "<pre>";
print_r($variable_array_multi);
echo "</pre>";
echo $variable_array_multi["aficiones"]["indoor"][0] . "<br />"; // Accedemos a los valores utilizando los índices custom y los predefinidos.
function sum(int $a, int $b) { // Podemos definir de forma estricta los valores que han de ser pasados a la función.
    return $a + $b;
}
echo sum(2, 4) . "<br />";
$variable_casteada = (int) "5";
echo $variable_casteada . "<br />";
echo var_dump($variable_casteada);
echo "<br />";
// Para limpiar una variable o eliminar su valor haciéndola 'null' podemos usar 'unset()'
unset($variable_casteada);
var_dump($variable_casteada); // Nos devuelve un warning al no haber sido definida dicha variable pero se contempla como 'null' igualmente.
echo is_null($variable_casteada); // Esto nos devuelve 1
// También se puede hacer 'unset' a los índices de los arrays.
unset($variable_array_multi["edad"]); // Elimina el índice 'edad' del array.
echo "<pre>";
print_r($variable_array_multi);
echo "</pre>";
// Cuando hacemos 'unset()' del array completo, se elimina tanto el contenido como sus índices, pero si eliminamos cada índice por separado, se conservava en el array
// el último índice utilizado, por lo que si tras limpiar un array así, hacemos push, el índice al que se asignará dicho valor será el siguiente al último utilizado
// a pesar de haber eliminado los valores anteriores.
$array_unset = [3, 4, 5];
unset($array_unset[0], $array_unset[1], $array_unset[2]); // Se borran los valores pero se conservan las posiciones.
var_dump(array_key_exists(0, $array_unset)); // No existe el índice
var_dump(isset($array_unset[0])); // Ni está asignado ningún valor
$array_unset[] = 2; // Pero se conservan las posiciones y se asigna al índice 3 el push.
echo "<pre>";
print_r($array_unset);
echo "</pre>";
unset($array_unset); // Se resetea todo.
$array_unset[] = 2; // Y se asigna al índice 0 el push.
echo "<pre>";
print_r($array_unset);
echo "</pre>";
