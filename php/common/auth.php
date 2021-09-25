<?php

  if(!isset($_SESSION)) {
    session_start();
  }

  /**
   * @ログインチェック
   * @return bool
   */
  function isLogin() {
    if(isset($_SESSION['user'])) {
      return true;
    }
    return false;
  }


  /**
   * @ログインしているユーザーの氏名を取得
   * @return string
   */
  function getUserName() {
    if(isset($_SESSION['user'])) {
      $name = $_SESSION['user']['name_sei'];
      return $name;
    }
    return "";
  }


  /**
   * @ログインしているユーザーのIDを取得
   * @return string | null
   */
  function getUserId() {
    if(isset($_SESSION['user'])) {
      $id = $_SESSION['user']['id'];
      return $id;
    }
    return null;
  }
?>