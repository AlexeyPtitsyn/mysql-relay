<?php
/**
 * @file Common part of the backend.
 *
 * @author Alexey Ptitsyn <numidium.ru@gmail.com>
 * @copyright Alexey Ptitsyn <numidium.ru@gmail.com>, 2021
 */

require_once "../config/config.php";
require_once "../include/auth.php";
Auth::useSession();

/**
 * Sample response.
 * 
 * @param Array $arr Array for output.
 */
function res($arr) {
  header('Content-type: application/json');
  echo json_encode($arr);
  exit();
}

/**
 * Sample error response.
 * 
 * @param string $msg Error message.
 */
function err($msg) {
  res([
    'error' => $msg
  ]);
}

/**
 * Choose by actions.
 */
switch($_action) {
  case 'isLoggedIn':
    res([
      'isLoggedIn' => Auth::isLoggedIn()
    ]);
    break;

  case 'login':
    try {
      Auth::login($_login, $_password);
    } catch(Exception $e) {
      err($e->getMessage());
    }

    res([
      'message' => 'Logged in.'
    ]);
    break;

  case 'logout':
    Auth::logout();
    res([
      'message' => 'Logged out.'
    ]);
    break;

  case 'request':
    if(!Auth::isLoggedIn()) err('Not logged in.');

    require_once "../include/db.php";

    try {
      res([
        'result' => DB::request($_req, $_values)
      ]);
    } catch(Exception $e) {
      err($e->getMessage());
    }

    break;

  default:
    err('No action or wrong action specified.');
    break;
}
