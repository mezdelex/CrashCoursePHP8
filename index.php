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

// Fecha y Hora
date_default_timezone_set("Europe/Madrid") . "<br />"; // Fijamos la zona horaria a GMT+1 (Madrid).
echo date_default_timezone_get() . "<br />"; // Nos devuelve la zona horaria que acabamos de modificar; por defecto es UTC en nuestro php.ini (También se puede cambiar ahí).

echo time() . "<br />"; // Devuelve la fecha actual en segundos desde el 1 de enero de 1970 GMT+0 (Unix Epoch).
echo time() + 5 * 24 * 60 * 60 . "<br />"; // Devuelve en segundos 5 días después de la fecha actual.
echo date("d/m/Y g:i a") . "<br />"; // Esto nos devuelve la fecha formateada a 14/07/2021 9:20 am.
echo date("d/m/Y g:i a", strtotime("second wednesday of July 2021")) . "<br />"; // con strtotime() podemos indicar el día mediante un formato definido de cadena. Esta por ejemplo nos devolvería el 14/07/2021 a las 12:00 am.

// Funciones con arrays
$array_nombres = ["Alex", "Paco", "Julio", "Alberto"];
echo json_encode(array_chunk($array_nombres, 2)) . "<br />"; // 'array_chunk()' agrupa el array que le pasemos como primer argumento en grupos de lo que le pasemos como segundo argumento. Hay un tercer argumento opcional que es el preserve_keys para que al agrupar, en caso de que nuestro array original tuviera índices propios, los mantuviese o no.
$array_edades = [35, 20, 18, 45];
echo json_encode(array_combine($array_nombres, $array_edades)) . "<br />"; // array_combine() usa el primer array como keys y el segundo como values. Si no coincide la longitud de ambos, salta un error.
$array_numeros = [1, 2, 3, 4, 5, 6];
// La función array_filter() filtra el array que le pasemos como primer argumento con el Callback que le pasemos como segundo argumento. Si no le pasamos Callback, nos va a filtrar los valores "falsy" por defecto también. 
$array_filtrado = array_filter($array_numeros, function (int $number): bool {
    return $number % 2 === 0;
});
echo "<pre>";
print_r($array_filtrado); // El filtrado también se carga los índices asociados a los valores filtrados.
print_r(array_values($array_filtrado)); // Si queremos reasignar los índices, podemos usar array_values() con ese array filtrado.
print_r(array_keys($array_filtrado)); // array_keys() nos devuelve los índices de los valores del array que le pasemos como valor.
print_r(array_keys($array_filtrado, 4)); // O podemos también especificar los índices asociados a qué valor queremos que nos devuelva.
$array1 = [1, "cadena" => 2, 3];
$array2 = [4, 5, 6];
$array3 = [7, "cadena" => 8, 9];
print_r(array_merge($array1, $array2, $array3)); // array_merge() combina los valores de los arrays pasados como argumento. Si el índice de alguno de esos valores fuera una CADENA, machacaría con el último valor dicho índice en lugar de reasignarlo. 
echo "</pre>";
$optional_initial_value = 10;
// array_reduce() permite operar de forma iterativa con los valores del propio array que le pasamos, usando el retorno de la anterior operación como argumento para la siguiente. El primer argumento del Callback, que sería el segundo argumento de array_reduce() en sí, es el acumulador, es decir, el valor del retorno de la propia función de Callback que hayamos definido. Y el segundo argumento del Callback es el índice sobre el que iteramos. También podemos especificar opcionalmente el valor inicial como tercer argumento del array_reduce().
echo array_reduce($array2, function (int $accumulator, int $number): int {
    return $accumulator + $number;
}, $optional_initial_value) . "<br />"; // En este caso nos va a devolver la suma de todos los valores del array2 + 10 que es el valor inicial.
echo array_search(2, $array1) . "<br />"; // Busca el valor especificado en el primer argumento en el array especificado como segundo argumento y devuelve el índice si lo encuentra o null si no lo encuentra. Puede devolver 0 si el índice de ese valor es 0, así que cuidado con la "loose comparisons" '==' y los falsey.
echo "<pre>";
print_r(array_diff($array1, $array2, $array3)); // Compara los valores del primer array con los demás y devuelve los que son diferentes.
print_r(array_diff_assoc($array1, $array2, $array3)); // Lo mismo que el anterior pero teniendo en cuenta además la relación 'índice => valor'.
print_r(array_diff_key($array1, $array2, $array3)); // Compara las keys en vez de los valores. Como todos los índices están repetidos al ser por defecto y "cadena" también está repetido, devuelve un array vacío.
echo "</pre>";

$array_desordenado = ["a" => 4, "b" => 1, "z" => 3, "y" => 8, "h" => 5];
echo "<pre>";
print_r($array_desordenado);
asort($array_desordenado); // Orden ascendente por valor.
print_r($array_desordenado);
ksort($array_desordenado); // Orden ascendente por índice.
print_r($array_desordenado);
usort($array_desordenado, function (int $a, int $b): int { // Orden especificado en el Callback como segundo argumento. En este caso utilizando el operador <=>.
    return $a <=> $b;
});
print_r($array_desordenado); // IMPORTANTE: Al usar usort() se machacan los índices.
echo "</pre>";
list($a, $b, $c, $d, $e) = $array_desordenado; // Podemos también asignar los valores de un array directamente a variables con list().
[$a, $b, $c, $d, $e] = $array_desordenado; // Esto sería lo mismo pero con la forma simplificada.
echo $a . " " .  $b . " " . $c . " " . $d . " " . $e . "<br />";

/*
INSTALADA LA VERSIÓN PHP 8 A PARTIR DE AQUÍ
1. Descomprimir el .zip en "C:\laragon\bin\php\"
2. Elegir en el menú del tray icon de Laragon la versión PHP 8.0.8
3. Editar en "C:\laragon\etc\apache2\mod_php.conf" la línea "(...) php8_module (...)" por "(...) php_module (...)" quitando el 8
4. Cerrar y volver a iniciar Laragon, no vale con refrescar el servicio de Apache
5. Ctrl+Esc -> entorno -> Editar las variables del entorno del sistema -> Variables de entorno
    Y en las "Variables de usuario", modificar la entrada del Path que sea "C:\laragon\bin\php\<version_antigua>"
    por "C:\laragon\bin\php\php-8.0.8-Win32-vs16-x64" para que Windows la reconozca de forma global. El terminal integrado de Laragon la usa
    correctamente sin modificar esta variable de entorno una vez seleccionada desde el tray, pero si queremos trabajar con VS Code, intelephense
    o Powershell de manera global, tenemos que modificar la versión asociada.
*/

$array_de_prueba = [1, 2, 3, 4, 5];
echo "<pre>";
print_r(array_map(fn (int $number): int => ++$number, $array_de_prueba)); // Ahora las Lambda las reconoce :3
echo "</pre>";

/*
***********
*** OOP ***
***********
*/

/*
AUTOLOADER carga automáticamente los documentos cuando usemos sus namespaces/variables/constantes/métodos. Por ahora no quiero usarlo, VÍDEO 39.
*/
require_once "./clases/Prueba.php"; // Para usar el documento lo tenemos que añadir con require o include.
require_once "./clases/Prueba2.php";

use clases\Prueba; /* Además, si hemos definido un 'namespace' en el documento en cuestión, debemos importar dicho 'namespace' con 'use' o con la ruta completa en la
instanciación, si no nos dirá que esa clase no está definida. Por convención el 'namespace' debe coincidir con el nombre de la ruta.
*/

use clases\Prueba as MiClase; // Con los alias, podemos también darle un nombre personalizado a nuestra importación y usarla con ese alias.

use clases\{Prueba as PruebaRepetida, Prueba2}; // También podemos importar varios elementos simultáneamente si pertenecen al mismo namespace con los '{ }'.

$prueba = new Prueba();
$miClase = new MiClase();
$pruebaRepetida = new PruebaRepetida();
$prueba2 = new Prueba2();
var_dump($prueba->getNombre()); // Como en PHP usamos '.' para concatenar, para llamar a las propiedades y métodos de las clases usamos '->'
var_dump($miClase->getNombre());
var_dump($pruebaRepetida->getNombre());
var_dump($prueba2->getNombre());
/*
DETALLE IMPORTANTE EXTRAÍDO DEL TUTORIAL APLICABLE DE FORMA GENERAL
Si en los métodos que retornan void (setters habitualmente o cualquier otro método con el que operemos asignando), en vez de retornar void
retornásemos la propia instancia del objeto, esto nos permitiría encadenar operaciones en la asignación ya que estaríamos trabajando con la instanciación 
actualizada constantemente, permitiéndonos el uso de "one liners" para retornar datos habiendo operado con ellos previamente.
Por ejemplo, suponiendo que nuestro setter para el nombre de la clase Prueba fuera:
public function setNombre(string $nombre): self|Prueba { // self|Prueba son el mismo tipo de dato, ya que $this es una instancia de Prueba y self referencia a Prueba
    $this->nombre = $nombre;
    return $this;
}
podríamos hacer una cadena en la asignación de una variable tal que:
$nombre = (new Prueba())->setNombre("Julian")->getNombre();
De tal forma que la primera asignación instanciaría la clase Prueba con las propiedades del constructor vacío, a su vez asignaríamos "Julián" como nombre y retornaríamos
la propia instancia para después obtener sólo el nombre de esta y asignarlo así a la variable $nombre. Si retornásemos void en el setter no podríamos hacer esto.
*/

/*
COMPOSER 
Para usar Composer como gestor de dependencias, necesitamos habilitar la extensión OpenSSL en nuestro php.ini. El php.ini de la versión PHP 7.2+ de Laragon 
viene por defecto con esta extensión activada, pero al haber actualizado manualmente a PHP 8.0.8, tenemos que habilitar la extensión manualmente. Para ello:
1. Acceder a "C:\laragon\bin\php\php-8.0.8-Win32-vs16-x64"
2. Editar "php.ini"
3. Ctrl+F "openssl"
4. Descomentar "extension=openssl"
Una vez realiados estos pasos, escribimos en nuestro shell (habiendo añadido el directorio de Laragon a nuestro Path de variables de entorno de sistema):
> composer init
> composer self-update
> composer require <el_paquete_que_queramos>
con 'init' nos generará un archivo composer.json vacío en el root, con el self-update se actualiza a la última versión estable y con el require, instalamos el paquete 
y sus respectivas dependencias que se reflejarán en composer.json y composer.lock respectivamente.
*/

echo "<br/>";
// En PHP se usa el 'double colon' para acceder a los elementos 'static' de una clase.
echo Prueba2::APELLIDO . "<br/>"; // Una constante es 'static' por defecto, por eso podemos acceder.
echo Prueba2::$segundoApellido . "<br/>"; // Esta variable está definida con el modificador 'static', por eso podemos acceder también. 
echo $prueba2::APELLIDO . "<br/>"; // Si instanciamos una clase, también podemos usar el 'double colon'.

require_once "./clases/Prueba3.php";

use clases\Prueba3;

var_dump((new Prueba3)->getNombre()); // Prueba3 hereda de Prueba todos los elementos public y protected. Más info en Prueba2 y Prueba3 sobre OOP.

/*
Clases abstractas
No voy a hacer ejemplos para este apartado; igual que en Java. Para definir una clase o un método como abstracto, se usa como modificador 'abstract' al principio.
Todo elemento abstracto ha de ser implementado para ser usado en la instancia.
'x' extends 'y'
*/

/*
Interfaces
Una interface es una clase abstracta cuyos métodos son todos abstractos y las propiedades, en caso de haberlas, son todas constantes. Se usa el modificador 'interface'.
Una interface ha de ser implementada siempre para usarse y una clase puede implementar VARIAS interfaces.
Una interface puede EXTENDER ('extends') otras interfaces, ya que están al mismo nivel de abstracción, y así la clase sólo implementar una interface que ya contiene al resto.
'x' implements 'y'
*/

/* 
Polimorfismo
Lo de siempre, vídeo 45
*/

/*
Magic methods
https://www.php.net/manual/en/language.oop5.magic.php
Siempre empiezan por '__'
Por ejemplo, __construct() es un magic method.
*/

/*
Late Static Binding
class A { // Base Class
    protected static $name = 'ClassA';
    public static function getNameWithSelf() {
        return self::$name;
    }
    public static function getNameWithStatic() {
        return static::$name;
    }
}

class B extends A {
    protected static $name = 'ClassB';
}

echo B::getNameWithSelf(); // ClassA
echo B::getNameWithStatic(); // ClassB
*/

/*
Traits (Se deben usar con la lógica de los mixins; para evitar duplicar código)
PHP no permite la herencia múltiple, pero existen formas de solventar esta carencia. Si la implementación de los distintos métodos de una clase padre a utilizar fuera distinta en cada hijo, podríamos usar interfaces ya que estas sí permiten múltiples implementaciones. Pero si lo que queremos es reutilizar métodos sin alterarlos, estaríamos repitiendo código. Para eso se pueden usar los 'Traits'. Los traits son un tipo de clase helper cuyos elementos podemos definir y reutilizar cuantas veces queramos en otras clases u otros traits. Para utilizarlos, además del require/include del documento y el use del namespace, tenemos que especificar el uso de dicho trait dentro de la clase o trait que lo contenga.
*/

require_once "./clases/PruebaTrait.php";

use clases\PruebaTrait;

echo "<br/>";
echo (new PruebaTrait())->mostrarNombre() . "<br/>"; // Llamamos al método mostrarNombre() del Trait2 usado en PruebaTrait.
echo (new PruebaTrait())->mostrarNombreTrait3() . "<br/>"; // Aquí llamamos al alias de mostrarNombre() definido en el use en PruebaTrait.

/*
IMPORTANTE: Si un trait tiene una propiedad 'static' y usamos ese trait en la clase A y asignamos un valor y luego usamos ese mismo trait en la clase B, el valor de la propiedad estática en B no séra el asignado en A como lo sería con una herencia normal con extends. 
Las propiedades STATIC de los traits NO se comparten entre las clases que las usan.
*/

/*
Clases anónimas
$obj = new class implements/extends ... {
    ... traits
    
    ... propiedades
    
    ... __construct(){}

    ... métodos

    ... etc
}
Se le da importancia a la instancia en lugar de a la clase. Al ser anónimas, su retorno o tipo de argumento en caso de requerirse en una función sería object o lo que implementen/hereden haciendo uso del polimorfismo ya que no tienen tipo propio.
NO ME GUSTAN.
*/

/**
 * Docblock (como Javadoc) https://docs.phpdoc.org/3.0/guide/guides/docblocks.html vídeo 51
 * En PHP 8 es redundante ya que escribiendo buen código y tipos estrictos es más que suficiente
 * 
 * @param
 * @return
 * 
 * @throws 
 * 
 * @var
 * 
 * @property
 * @method
 */

/*
 Clonar (shadow copy)
 Cuando queremos clonar un objeto o instancia pero no queremos que comparta referencia a posición de memoria con su clon, usamos 'clone'.
 $obj1 = clone $obj2;
 De tal forma que las propiedades de $obj1 no apuntan a las de $obj2.
 Al realizar un clone no se llama al método '__construct()' de la clase ya que no hemos creado una nueva instancia sino que se llama a '__clone()' de tal forma que podemos especificar la lógica que queremos que se aplique al clonar mediante este método.
 */

/* 
 Serializar (deep copy)
 Cuando queremos serializar un objeto para, por ejemplo, guardarlo en una base de datos, utilizamos el método serialize() y para lo opuesto unserialize().
 También es una forma de crear un deep copy de un objeto ya que el objeto resultante de desserializar el string del objeto que hayamos serializado previamente, no apunta a la misma posición de memoria.
 $str = serialize($obj1);
 $obj2 = unserialize($str);
 Igual que con clone, con (un)serialize existen los 'magic methods' a los que se llama cada vez que serializamos y desserializamos una instancia de una clase:
 '__serialize()' y '__unserialize($data)'
 En estos métodos podemos codificar, descodificar y/o aplicar la lógica que queramos.
 */

/*
 Excepciones
 En PHP hay dos ramas principales para las excepciones que implementan la interfaz Throwable: Error y Exception.
 Antes de PHP 7 no existía la interfaz Throwable y los errores de Error eran irrecuperables. Desde PHP 7, existe la posibilidad de capturar dichos errores gracias a la implementación de Throwable, de ahí la división a priori absurda. 
 NO podemos implementar la interfaz Throwable para nuestras excepciones personalizadas, con lo cual siempre tenemos que heredar de Exception que ya la implementa.
 Igualmente, si quisiéramos contemplar TODOS los errores en un catch, haciendo uso del polimorfismo definiríamos el tipo de la excepción como Throwable para asegurarnos.
 Para lanzar excepciones personalizadas:
 throw new <excepción>("Mensaje opcional");
 */
require_once "./excepciones/PruebaExcepcion.php";

use excepciones\MiExcepcion;

function sumarPositivos(int $a, int $b): int {
    return ($a < 0 | $b < 0) ? throw new MiExcepcion() : $a + $b;
}

// Podríamos definir un 'catch' GLOBAL para capturar nuestra excepción y definir el comportamiento con un callback.
set_exception_handler(function (MiExcepcion|\Exception|\Throwable $e): void { // Ejemplo de polimorfismo de menos a más, con cualquiera de las tres valdría.
    echo $e->getMessage() . " " . $e->getFile() . " en línea: " . $e->getLine() . "<br/>";
});

// O hacerlo mediante el uso del bloque catch. Si no ponemos el bloque catch pero tenemos el set_exception_handler, la captura igual.
$resultado = 0;
try {
    $GLOBALS["resultado"] = sumarPositivos(-3, 2);
} catch (MiExcepcion | \Exception | \Throwable $e) {
    echo $e->getMessage() . " " . $e->getFile() . " en línea: " . $e->getLine() . "<br/>";
} finally { // El bloque finally se ejecuta siempre, haya excepción o no. Si esto estuviera dentro de una función y tanto el bloque try como el finally tuvieran un return, prevalece el return de finally ya que es el último que se ejecuta.
    echo $GLOBALS["resultado"] . "<br />";
}

/*
Trabajar con fechas en PHP (Vídeo 55)
Librería recomendada: Carbon (varios frameworks la usan por defecto).
*/

/*
Iterators
En PHP podemos iterar sobre las propiedades primitivas de una clase y también sobre las propiedades de un array de objetos definido a su vez como propiedad de otra.
Esta clase que contiene un array de objetos actúa como un wrapper, implementando los métodos de Iterator para definir cómo recorrer dicho array.
Para ello debemos implementar la interface Iterator y definir los métodos implementados.
Ejemplo con Moneda y MonedasCollection.
*/
require_once "./clases/MonedasCollection.php";
require_once "./clases/Moneda.php";

use clases\{MonedasCollection, Moneda};

$monedasCollection = new MonedasCollection([new Moneda("Euro", 1), new Moneda("Dolar", 1), new Moneda("Euro", 2)]);

foreach ($monedasCollection as $moneda) {
    echo "Tienes una moneda de " . $moneda->getValor() . " " . strtolower($moneda->getTipo()) . "/" . strtolower($moneda->getTipo()) . "(e)s.<br/>";
}
/* 
En este caso no tiene mucho sentido el ejemplo al haber usado una clase a modo de wrapper para recorrer el array de la misma forma que lo haríamos con un array primitivo, pero al tener que implementar los métodos de la interfaz Iterator con la lógica que queramos, podemos incluir nuestra lógica en los wrappers y no en la manipulación que hubiéramos hecho con el array en cuestión en la llamada. 
Si nos fijamos en el array del wrapper, realmente no va asociado a ningún tipo de dato, lo hemos "asociado" nosotros con la semántica del nombre, con lo cual podríamos definir varios wrappers distintos para recorrer cada array de una forma u otra respectivamente y no repetir la lógica.
*/
require_once "./clases/MonedasCollection2.php";

use clases\MonedasCollection2; // Con IteratorAggregate

$monedasCollection2 = new MonedasCollection2([new Moneda("Euro", 1), new Moneda("Dolar", 1), new Moneda("Euro", 2)]);

foreach ($monedasCollection as $moneda) {
    echo "Tienes una moneda de " . $moneda->getValor() . " " . strtolower($moneda->getTipo()) . "/" . strtolower($moneda->getTipo()) . "(e)s.<br/>";
}
/*
Igualmente, con la intefaz IteratorAggregate podemos implementar los métodos de Iterator de forma predefinida en función del tipo de iterator que utilicemos con getIterator(). Hay varios ya preconfigurados que podemos ver aquí: https://www.php.net/manual/en/spl.iterators.php

Para pasar como argumento a una función una colección que haya implementado cualquier Iterator, podemos usar el tipo "iterable" a partir de PHP 7+.

function <nombreFunción>(iterable $<miColección>) {
    ...
}
*/

/*
Superglobals
Las superglobals son variables reservadas de PHP accesibles desde cualquier scope.
https://www.php.net/manual/en/reserved.variables.php
*/
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
