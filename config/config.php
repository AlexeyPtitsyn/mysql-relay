<?php
/**
 * @file Configuration example.
 *
 * @author Alexey Ptitsyn <numidium.ru@gmail.com>
 * @copyright Alexey Ptitsyn <numidium.ru@gmail.com>, 2021
 */

define('DB_NAME', 'test');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'test-user');
define('DB_PASSWORD', 'test-password');

define('SESSION_NAME', 'PHP-RELAY');
define('COOKIE_LIFETIME', 60*60*24); // One day cookie life.

define('USER_LOGIN', 'user');
define('USER_PASSWORD', '5f4dcc3b5aa765d61d8327deb882cf99'); // "password" in md5
