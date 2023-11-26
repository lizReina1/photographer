<?php
// Recibir los datos del cuerpo de la petición POST
$data = json_decode(file_get_contents('php://input'), true);

// Decodificar la cadena base64 y guardar la imagen en el directorio
$imagenBase64 = $data['dataURL'];
$imagenBinaria = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagenBase64));
$fileName = 'public/images/' . $data['fileName'];

file_put_contents($fileName, $imagenBinaria);

// Enviar una respuesta al cliente
echo json_encode(['success' => true]);
?>
