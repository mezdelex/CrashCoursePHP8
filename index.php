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
// Operadores
$x = 5;
$y = 10;
echo $x ** $y . "<br />"; // '**' es para potencias: 5 elevado a la 10.
$y = 0;
// var_dump(fdiv($x / $y)); // Sólo en PHP8.0, en Laragon usamos PHP7.2+. Permite hacer divisiones entre 0 sin devolver error.
// var_dump(fmod(10.5 / 2.9)); // El módulo por defecto castea el resultado a int. Si queremos mantener los float, se puede usar fmod() en PHP8.0.
// Operadores aritméticos combinados: +=, -=, *=, /=, %=, **= 
// Operadores para cadenas:
echo "Esto es una" . " unión de cadenas." . "<br />";
$x = "Hello ";
echo $x .= "World." . "<br />"; // Con el operador '.=' (Punto igual) añadimos cadenas a la variable.
// Operadores comparativos: ==, ===, [!=, <>], !==, <, >, <=, >=, <=>, [??, ?:])
$x = 10;
$y = 5;
var_dump($x <=> $y) . "<br />"; // Devuelve 1 si $x > $y, 0 si son iguales y -1 si $x < $y.
$x = null;
var_dump($x ?? "x es nulo.") . "<br />"; // Devuelve lo que hayamos asignado como valor por defecto si la variable comparada es 'null'.
var_dump($y ?? "y es nulo.") . "<br />"; // Devuelve 5.
/* Operadores bit a bit
& -> Compara los valores binarios de 2 números y devuelve 1 en las posiciones en las que ambos estén a true o 1.
| -> Compara los valores binarios de 2 números y devuelve 1 en las posiciones en las que cualquiera de los valores o ambos valores estén a true o 1.
^ -> Compara los valores binarios de 2 números y devuelve 1 en las posiciones en las que sólo 1 de los dos valores esté a true o 1.
~ -> Asigna el valor opuesto al actual en cada posición binaria del número al que precede.
<< -> "Shift left" o mover un bit hacia la izquierda. Aumentan las posiciones de bit.
6 << 1 -> 110 << 1 -> 1100 (Valor binario) -> 10 (Valor decimal)
>> -> "Shift right" o mover un bit hacia la derecha. Disminuyen las posiciones de bit.
6 >> 1 -> 110 >> 1 -> 11 (Valor binario) -> 3 (Valor decimal)
*/
// Operaciones con arrays
$x = ['Alex', 'Paco', 'Roberto'];
$y = ['Miguel', 'Anselmo', 'Eustaquio'];
$z = $x + $y; // Con el operador 'suma' se añaden al primer array sólo los valores del segundo array cuyos índices no estén presentes en el primero.
// Como los índices son los por defecto (0, 1, 2), en este caso no se añaden porque son los mismos en ambos arrays.
var_dump($z) . "<br />";
$x = ['primero' => "Alex", "segundo" => "Paco", "tercero" => "Roberto"];
$y = ["cuarto" => "Miguel", "quinto" => "Anselmo", "sexto" => "Eustaquio"];
$z = $x + $y; // En este caso como todos los índices son únicos, se añaden todos valores del segundo array al primer array.
var_dump($z) . "<br />";
// Cuando los índices son los mismos, sean por defecto o definidos por nosotros, prevalece el primer valor; no se machaca.
/* Precedencia de operadores
https://www.php.net/manual/es/language.operators.precedence.php
Para ir a lo seguro y dotar de mayor legibilidad a nuestro código, usar paréntesis en las operaciones que queramos realizar antes.
*/
?>
<?php
/* PHP y HTML
Una forma recomendable de hacer legibles las estructuras condicionales, bucles, etc. junto con los tags HTML sería utilizar el operador ':' tras la instrucción php y antes del cierre.
*/
if (5 > 4) : ?>
    <strong style="color: blue;">Cinco es mayor que cuatro.</strong>
<?php elseif (5 < 4) : ?>
    <strong>Esto nunca se va a pintar.</strong>
<?php else : ?>
    <strong>La condición por defecto tampoco se va a pintar.</strong>
<?php endif ?>
<!-- Debemos cerrar el bloque if si usamos la notación de ':' igual que con endwhile, endfor... -->
<?php
echo "<br />";
$array = [
    "nombre" => "Alex",
    "apellidos" => [
        "Conde", "Gomez"
    ]
];
foreach ($array as $key => $value) { // Referencias reservadas al índice y el valor respectivamente.
    echo $key . ": " . json_encode($value) . "<br />"; // Con 'json_encode()' podemos pintar un array en formato JSON, similar a usar toString() en Java.
}
