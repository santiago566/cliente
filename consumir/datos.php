<?php
// Comprobar si la solicitud al script es de tipo GET
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Datos a enviar al servicio
    $params = array(
        'p' => $_GET['p'],     // Parámetro 'p' obtenido de la URL
        'nPar' => $_GET['nPar'],   // Parámetro 'nPar' obtenido de la URL
        'nCri' => $_GET['nCri'],   // Parámetro 'nCri' obtenido de la URL
        'tMor' => $_GET['tMor']    // Parámetro 'tMor' obtenido de la URL
    );

    // Construir la URL del servicio con los parámetros
    $url = 'http://localhost:3000/conejos?' . http_build_query($params);
	
	//Si queremos construir una cadena de consulta para estos datos, podemos usar http_build_query() de la siguiente manera Esto generará una cadena de consulta como esta:

    // Realizar la solicitud GET
    $response = file_get_contents($url);

    // Decodificar la respuesta JSON
    $data = json_decode($response, true);

    // Mostrar los resultados
    foreach ($data as $resultados) {
        foreach ($resultados as $resultado) {
            echo $resultado['nombre'] . ': ' . $resultado['valor'] . '<br>'; // Mostrar nombre y valor de cada resultado
        }
        echo '<br>'; 
    }
}
?>
