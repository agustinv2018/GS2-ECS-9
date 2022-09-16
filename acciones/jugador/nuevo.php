<?php

header('Content-Type: application/json');

require_once 'responses/nuevoResponse.php';
require_once 'request/nuevoRequest.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$m = 'El jugador debe ser mayor de edad';
$m1 = 'El puesto Delantero no existe.';


$resp = new NuevoResponse();
$resp->IsOk = true;

if ($req->Edad < 18) {
    $resp->IsOk = false;
    $resp->Mensaje[] = $m;
}
if ($req->Puesto != 'Delantero' && $req->Puesto != 'Defensor' && $req->Puesto != 'Arquero' && $req->Puesto != 'Mediocampista') {
    $resp->IsOk = false;
    $resp->Mensaje[] = 'Delantero';
}

echo json_encode($resp);
