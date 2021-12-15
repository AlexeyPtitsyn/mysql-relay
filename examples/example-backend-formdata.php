<?php
/**
 * @file Backend example with use of FormData.
 *
 * @author Alexey Ptitsyn <numidium.ru@gmail.com>
 * @copyright Alexey Ptitsyn <numidium.ru@gmail.com>, 2021
 */

$_action = null;
if(isset($_POST['action'])) $_action = $_POST['action'];

$_login = null;
if(isset($_POST['login'])) $_login = $_POST['login'];

$_password = null;
if(isset($_POST['password'])) $_password = $_POST['password'];

$_req = null;
if(isset($_POST['req'])) $_req = $_POST['req'];

$_values = null;
if(isset($_POST['values'])) $_values = $_POST['values'];

require_once "example-backend-common.php";
