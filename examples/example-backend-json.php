<?php
/**
 * @file Backend example with use of JSON.
 *
 * @author Alexey Ptitsyn <numidium.ru@gmail.com>
 * @copyright Alexey Ptitsyn <numidium.ru@gmail.com>, 2021
 */

$data = file_get_contents('php://input');

if(strlen($data) == 0) {
  header('Content-type: application/json');
  echo json_encode([
    'error' => 'Zero-length input.'
  ]);
  exit();
}

$req = json_decode($data, true);
if(json_last_error() !== JSON_ERROR_NONE) {
  header('Content-type: application/json');
  echo json_encode([
    'error' => 'Incorrect JSON.'
  ]);
  exit();
}

$_action = null;
if(isset($req['action'])) $_action = $req['action'];

$_login = null;
if(isset($req['login'])) $_login = $req['login'];

$_password = null;
if(isset($req['password'])) $_password = $req['password'];

$_req = null;
if(isset($req['req'])) $_req = $req['req'];

$_values = null;
if(isset($req['values'])) $_values = $req['values'];


require_once "example-backend-common.php";
