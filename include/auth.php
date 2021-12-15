<?php
/**
 * @file Authentication class.
 *
 * @author Alexey Ptitsyn <numidium.ru@gmail.com>
 * @copyright Alexey Ptitsyn <numidium.ru@gmail.com>, 2021
 */

 class Auth {
  /**
   * Turn on session if it is needed.
   */
  public static function useSession() {
    if(session_status() != PHP_SESSION_ACTIVE) {
      session_start([
        'cookie_lifetime' => COOKIE_LIFETIME
      ]);
    }
  }

  /**
   * Check if user is logged in.
   * 
   * @return {boolean}
   */
  public static function isLoggedIn() {
    self::useSession();
    return isset($_SESSION[SESSION_NAME]);
  }

  /**
   * Log in procedure.
   * 
   * @throws Exception If login information is incorrect.
   */
  public static function login($login, $password) {
    self::useSession();
    if(USER_LOGIN == $login && USER_PASSWORD == md5($password)) {
      $_SESSION[SESSION_NAME] = [
        'isLoggedIn' => true
      ];

      return;
    }

    throw new Exception("Incorrect username or password.");
  }

  /**
   * Log out.
   */
  public static function logout() {
    self::useSession();
    unset($_SESSION[SESSION_NAME]);
  }
}
