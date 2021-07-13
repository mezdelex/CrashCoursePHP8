<?php
// PHP 8 Crash Course https://www.youtube.com/playlist?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-

declare(strict_types=1); /* No permite mutar los tipos. Tipado estricto. Si definimos una función en este documento '.php' pero la llamamos desde otro documento añadiendo este con la directiva require (error si no está) o include (warning si no está), si no declaramos también los tipos estrictos en ese documento, podremos llamar a la función con tipos mutados y PHP hará la conversión como si fuera no estricto. Hay que incluir el declare en todos los documentos que queramos que sean estrictos. */

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
    echo $key . ": " . json_encode($value) . "<br />"; // Con 'json_encode()' podemos pintar un array en formato JSON, similar a usar toString() en Java para cuando itere sobre "apellidos".
}
// Match (Sólo en PHP8), similar al Switch case con lambdas de Java 11+, aquí me salta el warning porque uso PHP7.2
// $miValor = 3;
// match ($miValor) {
//     1 => echo "Vale 1",
//     2 => echo "Vale 2",
//     3 => echo "Vale 3"
//     default => "Valor no encontrado" // SIEMPRE ha de haber un default, al ser una expresión actúa como un operador ternario y siempre ha de devolver algo
// };
// También se podría asignar directamente a una variable al ser expresiones.
// $retorno = match ($miValor) {
//     1 => "Vale 1",
//     2 => "Vale 2",
//     3, 4 => "Vale 3 o 4" // Se puede asignar el retorno a varios casos simultáneamente.
//     default => "Valor no encontrado"
// };
// echo $retorno;

require "curso.php"; // Sólo se importa este. Importado obligatorio (error).
require_once "curso.php"; // Si usamos el sufijo "_once", si ya ha sido requerido o incluído antes, no lo vuelve a importar.
include "curso.php"; // Sólo se importa este. Importado opcional (warning).
include_once "curso.php"; // Si usamos el sufijo "_once", si ya ha sido requerido o incluído antes, no lo vuelve a importar.

function devolver_cadena(): string { // Con la notación ": <tipo>" seguido de la función, especificamos el tipo estricto que va a devolver dicha función combinado con la directiva "declare(strict_types=1)".
    return "Esta función va a devolver una cadena.";
}
echo devolver_cadena() . "<br />";

// Nullable
function devolver_entero(): ?int { // Cuando trabajamos con tipos estrictos pero queremos contemplar la opción de que una función pueda devolver null, existe el modificador "?" para hacer nullable dicho retorno y evitar que nos de error. 
    return null;
}

/*
function devolverCualquierTipo(): mixed { // con mixed, le estamos diciendo que la función puede devolver varios tipos de valor; sería una forma de hacer una función no estricta dentro de un documento estricto. SÓLO FUNCIONA CON PHP8+
    return "Aquí iría cualquier tipo de dato.";
}
echo devolverCualquierTipo() . "<br />";
*/

/*
function sum(int $x, int|float $y): int|float { // En PHP8+ se pueden especificar varios tipos posibles de datos que se le puedan pasar como argumento a una función. Esta nueva funcionalidad recibe el nombre de "Union Types".
    return $x + $y;
}
*/

// En Java los argumentos siempre se pasan por valor, pero en PHP se pueden pasar por referencia también con el modificador "&" delante.
$a = 3;
$b = 5;

function sum_by_value(int $x, int $y): int {
    return --$x + $y; // Restamos una unidad a "x" antes de sumar los valores y devolver el resultado.
}
echo sum_by_value($a, $b) . "<br />"; // Esto devuelve 2 + 5 = 7.
var_dump($a, $b); // Y el var_dump nos devuelve 3 y 5 que son los valores originales de los argumentos.

function sum_by_reference(int &$x, int $y): int { // Paso por referencia de x
    return --$x + $y;
}
echo sum_by_reference($a, $b) . "<br />"; // Esto devuelve 2 + 5 = 7.
var_dump($a, $b); // Pero el var_dump nos devuelve 2 y 5 esta vez ya que la variable "x" al haber sido pasada por referencia, ha sido mutada en la función.

// Para pasar varios argumentos a una función, similar al varargs de Java, tenemos el "splat/spread/unpack operator" que son los "..."
function variadic_function(int ...$values): int {
    $sum = 0;
    foreach ($values as $value) {
        $sum += $value;
    }
    return $sum;
}
echo variadic_function(4, 5, 6, 12, 41) . "<br />";

// También podemos usar la función predeterminada "array_sum()" para sumar los elementos de un array.
function another_variadic_function(int ...$values): int {
    return array_sum($values);
}
echo another_variadic_function(4, 5, 1, 2, 3, 54, 12) . "<br />";

// En PHP para usar las variables globales dentro de la función hay que especificarlo dentro de la misma, no están accesibles por defecto.
$variable_global = 4;

function usando_variable_global(): int {
    global $variable_global; // Hay que especificar con "global" que estamos haciendo referencia a la variable global.
    return $variable_global;
}
function otra_forma(): int {
    return $GLOBALS["variable_global"]; // Array de PHP que contiene las variables globales
}
echo usando_variable_global() . " y " .  otra_forma() . "<br />";

// A pesar de que en Java esto es algo accesible por defecto, en PHP está considerado mala práctica, y es preferible no usar referencias a variables globales dentro de funciones. En vez de ello, es preferible pasarlas como argumento cuando queramos utilizarlas dentro de una función.
function forma_recomendable(int $variable): int {
    return $variable;
}
echo forma_recomendable($variable_global) . "<br />";

// Callable, funciones anónimas o Closures y Callbacks
$array = [1, 2, 3, 4];

function doblar(int $number): int {
    return $number * 2;
}

if (is_callable('doblar')) // PHP busca la función por nombre y si la encuentra la define como callable. Podemos hacer referencia a la función por nombre.
    $array_de_dobles = array_map('doblar', $array); // La función predeterminada "array_map()" devuelve otro array después de haberle aplicado el Callback que hayamos definido como primer argumento y el propio array como segundo argumento. En PHP las funciones "Callback" son similares a las interfaces funcionales en Java en las que definimos un comportamiento.

$otro_array_de_dobles = array_map(function (int $number): int { // Podemos hacer lo mismo pero usando una función anónima o Closure del tirón como Callback.
    return $number * 2;
}, $array);

echo json_encode($array_de_dobles) . "<br />";
echo json_encode($otro_array_de_dobles) . "<br />";

/* 
Lambda expression PHP8+
$array_de_dobles = array_map(fn($number) => $number * 2, $array); // Esto sería con PHP8, pero en PHP7.2 no hay Lambdas... SADGE
*/
