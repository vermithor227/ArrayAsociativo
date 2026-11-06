// Actividad 1: Inventario
<?php
$inventario = [
    "manzanas" => 50,
    "peras"    => 30,
    "naranjas" => 0,
    "uvas"     => 15,
];

echo "<h2>Actividad 1: Inventario</h2>";

foreach ($inventario as $producto => $cantidad) { // Recorremos con un foreach
    echo $producto.": ".$cantidad." unidades"."\n";
}
$inventario["mangos"] = 20; // Agregamos producto nuevo
$inventario["peras"] += 10; // Aumentara 10 unidades a las peras 
echo "<br><strong>Inventario actualizado:</strong></br>";

foreach ($inventario as $producto => $cantidad) {
    echo $producto. ": " .$cantidad. " unidades". "\n";
}

if (isset($inventario["kiwis"])) { //Verificamos con isset()
    echo "<br>Los kiwis Si existen en el inventario.</br>";
} else {
    echo "<br>Los kiwis No existen en el inventario.</br>";
}

$total = array_sum($inventario); // Total de unidades
echo "Total de unidades en el inventario: ". $total. "\n";

$totalCiclo = 0; // Esto ya es una alternativa con ciclo
foreach ($inventario as $cantidad) {
    $totalCiclo += $cantidad;
}
echo "Total calculado con ciclo: ". $totalCiclo. "\n";
?>


// Actividad 2: Estudiantes:
<?php 
$estudiantes = [
    "Ana"    => ["matematicas" => 4.5, "ciencias" => 3.8, "ingles" => 4.2],
    "Luis"   => ["matematicas" => 3.0, "ciencias" => 2.8, "ingles" => 3.5],
    "Marta"  => ["matematicas" => 5.0, "ciencias" => 4.7, "ingles" => 4.9],
    "Carlos" => ["matematicas" => 2.5, "ciencias" => 3.2, "ingles" => 2.9],
];
echo "<h2>Actividad 2: Estudiantes</h2>";

$promedios = []; // Promedio de cada estudiante 
foreach ($estudiantes as $nombre => $nota) { 
    $promedios[$nombre] = round(array_sum($nota) / count($nota), 2); // El round lo que hace es redondea un número con decimales
}

echo "<strong>Promedios:</strong>". "\n";
foreach ($promedios as $nombre => $prom) {
    echo $nombre. ": ". $prom. "\n";
}

// Mejor y peor promedio
$mejor = array_search(max($promedios), $promedios);
$peor = array_search(min($promedios), $promedios);
echo "Mejor promedio: ". $mejor ."(".$promedios[$mejor]. ")". "\n";
echo "Peor promedio: ". $peor ."(".$promedios[$peor]. ")". "\n";

//Clasificar entre los Aprobados y los Reprobados
$estado = [];
foreach ($promedios as $nombre => $prom) {
    $estado[$nombre] = ($prom >= 3.0) ? "Aprovado" : "Reprobado";
}
echo "<br><strong>Estado:</strong><br>";
foreach ($estado as $nombre => $resultado) {
    echo $nombre.": ".$resultado ."\n"; 
}

// Promedio de cada materia sobre todos los estudiantes
$sumaMaterias = [];
foreach ($estudiantes as $notas) {
    foreach ($notas as $materia => $nota) {
        if (!isset($sumaMaterias[$materia])) {
            $sumaMaterias[$materia] = 0;
        }
        $sumaMaterias[$materia] += $nota;
    }
}
echo "<br><strong>Promedio por materia:</strong><br>";
foreach ($sumaMaterias as $materia => $suma) {
    $promMateria = round($suma / count($estudiantes), 2);
    echo $materia. ": " .$promMateria ."\n";
}
?>


// Actividad 3: Empleados
<?php 
$empleados = [
    ["nombre" => "Sofía",  "depto" => "Ventas",   "salario" => 2500000],
    ["nombre" => "Pedro",  "depto" => "Sistemas", "salario" => 4000000],
    ["nombre" => "Laura",  "depto" => "Ventas",   "salario" => 2800000],
    ["nombre" => "Andrés", "depto" => "Sistemas", "salario" => 4500000],
    ["nombre" => "Julia",  "depto" => "Recursos", "salario" => 3000000],
];
echo "<h2>Actividad 3: Empleados</h2>";

// Agrupar nombres por departamento
$porDepto = [];
foreach ($empleados as $emp) {
    $porDepto[$emp["depto"]][] = $emp["nombre"];
}
echo "<strong>Empleados por departamento:</strong><br>";
foreach ($porDepto as $depto => $nombres) {
    echo "$depto: " . implode(", ", $nombres) . "<br>";
}

// Salario promedio por departamento (y de paso la nomina total)
$nomina = [];
$conteo = [];
foreach ($empleados as $emp) {
    $d = $emp["depto"];
    $nomina[$d] = ($nomina[$d] ?? 0) + $emp["salario"];
    $conteo[$d] = ($conteo[$d] ?? 0) + 1;
}
echo "<br><strong>Salario promedio por departamento:</strong><br>";
foreach ($nomina as $depto => $suma) {
    $prom = $suma / $conteo[$depto];
    echo "$depto: $" . number_format($prom, 0, ",", ".") . "<br>";
}

// Departamento con la nomina total mas alta 
$deptoMayor = array_search(max($nomina), $nomina);
echo "<br>Departamento con la nómina más alta: $deptoMayor ($"
    . number_format($nomina[$deptoMayor], 0, ",", ".") . ")<br>";
?>