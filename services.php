<?php
if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");
//$this->isWithInTime($start, $end, $time);

//print "Connie";
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$numroom = $_POST['numroom'];
$petsize = $_POST['petsize'];
$p_type = $_POST['p_type'];
$checkin_g = $_POST['checkin_g'];
$checkin_tg = $_POST['checkin_tg'];
/*$username = $_SESSION['username'];*/

$db = new SQLite3('park_city.db');

$stmt = $db->prepare("SELECT count(*) from rooms where room_sz='small' and status='VAC'");
//$stmt->bindValue(':petsize',$petsize);
$result = $stmt->execute();
$rm_avail_s = $result->fetchArray();
$stmt = $db->prepare("SELECT count(*) from rooms where room_sz='medium' and status='VAC'");
//$stmt->bindValue(':petsize',$petsize);
$result = $stmt->execute();
$rm_avail_m = $result->fetchArray();
$stmt = $db->prepare("SELECT count(*) from rooms where room_sz='large' and status='VAC'");
//$stmt->bindValue(':petsize',$petsize);
$result = $stmt->execute();
$rm_avail_l = $result->fetchArray();
$stmt = $db->prepare("SELECT count(*) from transactions where service='GRM' and trans_stat='CONF' and date_in=:checkin_g and time_in=:checkin_tg");
$stmt->bindValue(':checkin_g',$checkin_g);
$stmt->bindValue(':checkin_tg',$checkin_tg);
//$stmt->bindValue(':petsize',$petsize);
$result = $stmt->execute();
$groom_sched_avail = $result->fetchArray();
$stmt->close();
$db->close();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Services</title>
  <meta name="referrer" content="same-origin">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <style>
    html,
    body {
      -webkit-text-zoom: reset !important;
      -ms-text-size-adjust: 100% !important;
      -moz-text-size-adjust: 100% !important;
      -webkit-text-size-adjust: 100% !important
    }

    @font-face {
      font-display: block;
      font-family: "Bruno Ace";
      src: url('css/BrunoAce-Regular.woff2') format('woff2'), url('css/BrunoAce-Regular.woff') format('woff');
      font-weight: 400
    }

    body>div {
      font-size: 0
    }

    p,
    span,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      margin: 0;
      word-spacing: normal;
      word-wrap: break-word;
      -ms-word-wrap: break-word;
      pointer-events: auto;
      max-height: 1000000000px
    }

    sup {
      font-size: inherit;
      vertical-align: baseline;
      position: relative;
      top: -0.4em
    }

    sub {
      font-size: inherit;
      vertical-align: baseline;
      position: relative;
      top: 0.4em
    }

    ul {
      display: block;
      word-spacing: normal;
      word-wrap: break-word;
      list-style-type: none;
      padding: 0;
      margin: 0;
      -moz-padding-start: 0;
      -khtml-padding-start: 0;
      -webkit-padding-start: 0;
      -o-padding-start: 0;
      -padding-start: 0;
      -webkit-margin-before: 0;
      -webkit-margin-after: 0
    }

    li {
      display: block;
      white-space: normal
    }

    li p {
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      -o-user-select: none;
      user-select: none
    }

    form {
      display: inline-block
    }

    a {
      text-decoration: inherit;
      color: inherit;
      -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
    }

    textarea {
      resize: none
    }

    .shm-l {
      float: left;
      clear: left
    }

    .shm-r {
      float: right;
      clear: right
    }

    .whitespacefix {
      word-spacing: -1px
    }

    html {
      font-family: sans-serif
    }

    body {
      font-size: 0;
      margin: 0
    }

    audio,
    video {
      display: inline-block;
      vertical-align: baseline
    }

    audio:not([controls]) {
      display: none;
      height: 0
    }

    [hidden],
    template {
      display: none
    }

    a {
      background: 0 0;
      outline: 0
    }

    b,
    strong {
      font-weight: 700
    }

    dfn {
      font-style: italic
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-size: 1em;
      line-height: 1;
      margin: 0
    }

    img {
      border: 0
    }

    svg:not(:root) {
      overflow: hidden
    }

    button,
    input,
    optgroup,
    select,
    textarea {
      color: inherit;
      font: inherit;
      margin: 0
    }

    button {
      overflow: visible
    }

    button,
    select {
      text-transform: none
    }

    button,
    html input[type=button],
    input[type=submit] {
      -webkit-appearance: button;
      cursor: pointer;
      box-sizing: border-box;
      white-space: normal
    }

    input[type=text],
    input[type=password],
    textarea {
      -webkit-appearance: none;
      appearance: none;
      box-sizing: border-box
    }

    button[disabled],
    html input[disabled] {
      cursor: default
    }

    button::-moz-focus-inner,
    input::-moz-focus-inner {
      border: 0;
      padding: 0
    }

    input {
      line-height: normal
    }

    input[type=checkbox],
    input[type=radio] {
      box-sizing: border-box;
      padding: 0
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      height: auto
    }

    input[type=search] {
      -webkit-appearance: textfield;
      -moz-box-sizing: content-box;
      -webkit-box-sizing: content-box;
      box-sizing: content-box
    }

    input[type=search]::-webkit-search-cancel-button,
    input[type=search]::-webkit-search-decoration {
      -webkit-appearance: none
    }

    textarea {
      overflow: auto;
      box-sizing: border-box;
      border-color: #ddd
    }

    optgroup {
      font-weight: 700
    }

    table {
      border-collapse: collapse;
      border-spacing: 0
    }

    td,
    th {
      padding: 0
    }

    blockquote {
      margin-block-start: 0;
      margin-block-end: 0;
      margin-inline-start: 0;
      margin-inline-end: 0
    }

    :-webkit-full-screen-ancestor:not(iframe) {
      -webkit-clip-path: initial !important
    }

    html {
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale
    }

    #b {
      background: #020202 url(images/dark_mosaic.png) repeat center top
    }

    .v11 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps117 {
      position: relative;
      margin-top: 0
    }

    .s125 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c109 {
      z-index: 1;
      pointer-events: none;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-image: url(images/parkcityhome-320.jpeg);
      background-color: #020202;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: contain;
      background-clip: padding-box
    }

    .webp .c109 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps118 {
      position: relative;
      margin-top: -472px
    }

    .s126 {
      width: 100%;
      min-width: 960px;
      min-height: 472px;
      behavior: url(js/PIE.htc);
      -pie-background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
      height: 472px;
      behavior: url(js/PIE.htc);
      -pie-background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
      height: 472px
    }

    .c110 {
      z-index: 2;
      pointer-events: none;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-image: -webkit-gradient(linear, 180deg, color-stop(0, rgba(0, 0, 0, 0)), color-stop(1, rgba(0, 0, 0, 0.5)));
      background-image: -o-linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
      background-image: -webkit-linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
      background-image: -ms-linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
      background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
      background-clip: padding-box
    }

    .s127 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c111 {
      z-index: 3;
      pointer-events: none;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: rgba(144, 108, 196, .55);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(144, 108, 196, .55);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(144, 108, 196, .55);
      background-clip: padding-box
    }

    .v12 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s128 {
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s129 {
      width: 753px;
      margin-left: 100px
    }

    .ps119 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s130 {
      min-width: 753px;
      width: 753px;
      min-height: 27px
    }

    .v13 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top;
      //overflow: hidden;
      //outline: 0
    }

    .s131 {
      width: 120px;
      padding-right: 0;
      height: 27px
    }

    .f28 {
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      background-color: initial;
      line-height: 19px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: center;
      padding-top: 4px;
      padding-bottom: 4px;
      margin-top: 0;
      margin-bottom: 0
    }

    .c113 {
      z-index: 4;
      pointer-events: auto;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .c113:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .c113:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps120 {
      position: relative;
      margin-left: 41px;
      margin-top: 0
    }

    .s132 {
      min-width: 120px;
      width: 120px;
      min-height: 27px
    }

    .c114 {
      z-index: 5;
      pointer-events: auto
    }

    .btn11 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn11:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn11:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn12 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn12:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn12:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .v14 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s133 {
      width: 120px;
      padding-right: 0;
      height: 19px
    }

    .ps121 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .s134 {
      min-width: 132px;
      width: 132px;
      min-height: 27px
    }

    .c115 {
      z-index: 6;
      pointer-events: auto
    }

    .btn13 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn13:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn13:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .s135 {
      width: 132px;
      padding-right: 0;
      height: 19px
    }

    .ps122 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .c116 {
      z-index: 7;
      pointer-events: auto
    }

    .btn14 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn14:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn14:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps123 {
      position: relative;
      margin-left: 34px;
      margin-top: 0
    }

    .c117 {
      z-index: 8;
      pointer-events: auto
    }

    .btn15 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn15:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn15:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps124 {
      position: relative;
      margin-top: 93px
    }

    .s136 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s137 {
      width: 951px;
      margin-left: 0
    }

    .s138 {
      min-width: 941px;
      width: 941px;
      min-height: 58px
    }

    .c118 {
      z-index: 10;
      pointer-events: auto;
      overflow: hidden;
      height: 58px
    }

    .p7 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: center
    }

    .f29 {
      font-family: "Bruno Ace";
      font-size: 45px;
      font-weight: 400;
      font-style: normal;
      text-decoration: underline;
      text-transform: none;
      color: rgba(255, 255, 255, .71);
      background-color: initial;
      line-height: 54px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps125 {
      position: relative;
      margin-left: 10px;
      margin-top: 36px
    }

    .s139 {
      min-width: 941px;
      width: 941px;
      min-height: 122px
    }

    .w3 {
      line-height: 0
    }

    .ps126 {
      position: relative;
      margin-left: 337px;
      margin-top: 0
    }

    .s140 {
      min-width: 252px;
      width: 252px;
      min-height: 118px;
      height: 118px
    }

    .c119 {
      z-index: 9;
      border: 2px solid #fff;
      -webkit-border-radius: 61px;
      -moz-border-radius: 61px;
      border-radius: 61px;
      background-image: url(images/pic-02-252.jpg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .c119 {
      background-image: url(images/pic-02-252.webp)
    }

    .ps127 {
      position: relative;
      margin-left: -1px;
      margin-top: -2px
    }

    .s141 {
      min-width: 254px;
      width: 254px;
      min-height: 121px
    }

    .c120 {
      z-index: 11;
      pointer-events: auto
    }

    .f30 {
      padding-top: 59px;
      padding-bottom: 58px;
      margin-top: 0;
      margin-bottom: 0;
      line-height: 0
    }

    .btn16 {
      border: 2px solid rgba(35, 138, 210, .45);
      -webkit-border-radius: 61px;
      -moz-border-radius: 61px;
      border-radius: 61px;
      background-color: transparent;
      background-clip: padding-box
    }

    .btn16:hover {
      background-color: transparent;
      border-color: rgba(92, 174, 232, .78);
      color: transparent
    }

    .btn16:active {
      background-color: rgba(35, 138, 210, .45);
      border-color: rgba(255, 255, 255, .71);
      color: #fff
    }

    .s142 {
      width: 250px;
      padding-right: 0;
      height: 0
    }

    .ps128 {
      position: relative;
      margin-left: 0;
      margin-top: -73px
    }

    .s143 {
      min-width: 941px;
      width: 941px;
      min-height: 25px
    }

    .c121 {
      z-index: 12;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .f31 {
      font-family: "Bruno Ace";
      font-size: 18px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: rgba(255, 255, 255, .71);
      background-color: initial;
      line-height: 22px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps129 {
      position: relative;
      margin-left: 0;
      margin-top: -27px
    }

    .s144 {
      min-width: 960px;
      width: 960px;
      min-height: 1px
    }

    .ps130 {
      position: relative;
      margin-top: 76px
    }

    .s145 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c122 {
      z-index: 14;
      pointer-events: none;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: rgba(211, 51, 130, .45);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(211, 51, 130, .45);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(211, 51, 130, .45);
      background-clip: padding-box
    }

    .ps131 {
      position: relative;
      margin-left: 0;
      margin-top: -27px
    }

    .ps132 {
      position: relative;
      margin-top: -25px
    }

    .s146 {
      width: 941px;
      margin-left: 10px
    }

    .ps133 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .c123 {
      z-index: 16;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .ps134 {
      position: relative;
      margin-left: 127px;
      margin-top: 36px
    }

    .s147 {
      min-width: 782px;
      width: 782px;
      min-height: 183px
    }

    .ps135 {
      position: relative;
      margin-left: 0;
      margin-top: 26px
    }

    .s148 {
      min-width: 250px;
      width: 250px;
      min-height: 157px
    }

    .ps136 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s149 {
      min-width: 250px;
      width: 250px;
      min-height: 157px;
      behavior: url(js/PIE.htc);
      -pie-background: linear-gradient(180deg, rgba(211, 51, 130, 0.450371) 0%, rgba(255, 255, 255, 0.152441) 100%);
      height: 157px;
      behavior: url(js/PIE.htc);
      -pie-background: linear-gradient(180deg, rgba(211, 51, 130, 0.450371) 0%, rgba(255, 255, 255, 0.152441) 100%);
      height: 157px
    }

    .c124 {
      z-index: 32;
      border: 0;
      -webkit-border-radius: 35px;
      -moz-border-radius: 35px;
      border-radius: 35px;
      background-image: -webkit-gradient(linear, 180deg, color-stop(0, rgba(211, 51, 130, 0.450371)), color-stop(1, rgba(255, 255, 255, 0.152441)));
      background-image: -o-linear-gradient(180deg, rgba(211, 51, 130, 0.450371) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-image: -webkit-linear-gradient(180deg, rgba(211, 51, 130, 0.450371) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-image: -ms-linear-gradient(180deg, rgba(211, 51, 130, 0.450371) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-image: linear-gradient(180deg, rgba(211, 51, 130, 0.450371) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-clip: padding-box
    }

    .ps137 {
      position: relative;
      margin-left: 3px;
      margin-top: 0
    }

    .s150 {
      min-width: 192px;
      width: 192px;
      min-height: 179px
    }

    .s151 {
      min-width: 192px;
      width: 192px;
      min-height: 27px;
      height: 27px
    }

    .c125 {
      z-index: 49;
      pointer-events: auto
    }

    .input7 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 192px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input7::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps138 {
      position: relative;
      margin-left: 0;
      margin-top: 15px
    }

    .s152 {
      min-width: 192px;
      width: 192px;
      min-height: 27px;
      height: 27px
    }

    .c126 {
      z-index: 51;
      pointer-events: auto
    }

    .input8 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 192px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input8::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps139 {
      position: relative;
      margin-left: 0;
      margin-top: 14px
    }

    .c127 {
      z-index: 52;
      pointer-events: auto
    }

    .input9 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 192px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input9::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps140 {
      position: relative;
      margin-left: 1px;
      margin-top: 12px
    }

    .s153 {
      min-width: 146px;
      width: 146px;
      min-height: 25px
    }

    .s154 {
      min-width: 63px;
      width: 63px;
      min-height: 25px
    }

    .c128 {
      z-index: 53;
      pointer-events: auto
    }

    .input10 {
      width: 13px;
      height: 13px;
      margin-top: 0;
      vertical-align: top
    }

    .f32 {
      margin-left: 3px;
      max-width: 47px;
      font-family: "Bruno Ace";
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #fff;
      background-color: initial;
      line-height: normal;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: left;
      display: inline-block;
      overflow: hidden;
      vertical-align: middle;
      white-space: nowrap
    }

    .ps141 {
      position: relative;
      margin-left: 6px;
      margin-top: 0
    }

    .s155 {
      min-width: 77px;
      width: 77px;
      min-height: 25px
    }

    .c129 {
      pointer-events: auto
    }

    .f33 {
      margin-left: 3px;
      max-width: 61px;
      font-family: "Bruno Ace";
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #fff;
      background-color: initial;
      line-height: normal;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: left;
      display: inline-block;
      overflow: hidden;
      vertical-align: middle;
      white-space: nowrap
    }

    .ps142 {
      position: relative;
      margin-left: 0;
      margin-top: 5px
    }

    .c130 {
      z-index: 59;
      pointer-events: auto
    }

    .input11 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 192px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input11::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps143 {
      position: relative;
      margin-left: 705px;
      margin-top: -61px
    }

    .c131 {
      z-index: 55;
      pointer-events: auto
    }

    .ps144 {
      position: relative;
      margin-left: 559px;
      margin-top: 20px
    }

    .s156 {
      width: 240px;
      padding-right: 0;
      height: 21px
    }

    .f34 {
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 700;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      background-color: initial;
      line-height: 15px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: center;
      padding-top: 3px;
      padding-bottom: 3px;
      margin-top: 0;
      margin-bottom: 0;
      width: 240px;
    }

    .c132 {
      z-index: 56;
      pointer-events: auto;
      border: 0;
      -webkit-border-radius: 8px;
      -moz-border-radius: 8px;
      border-radius: 8px;
      background-color: rgba(211, 51, 130, .45);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(211, 51, 130, .45);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(211, 51, 130, .45);
      background-clip: padding-box;
      color: #fff
    }

    .c132:hover {
      background-color: #82939e;
      border-color: #020202;
      color: #020202
    }

    .c132:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .ps145 {
      position: relative;
      margin-left: 0;
      margin-top: -27px
    }

    .ps146 {
      position: relative;
      margin-top: 50px
    }

    .s157 {
      width: 779px;
      margin-left: 136px
    }

    .s158 {
      min-width: 779px;
      width: 779px;
      min-height: 154px
    }

    .s159 {
      min-width: 250px;
      width: 250px;
      min-height: 154px
    }

    .ps147 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s160 {
      min-width: 250px;
      width: 250px;
      min-height: 154px;
      behavior: url(js/PIE.htc);
      -pie-background: linear-gradient(180deg, rgba(144, 108, 196, 0.550215) 0%, rgba(255, 255, 255, 0.152441) 100%);
      height: 154px;
      behavior: url(js/PIE.htc);
      -pie-background: linear-gradient(180deg, rgba(144, 108, 196, 0.550215) 0%, rgba(255, 255, 255, 0.152441) 100%);
      height: 154px
    }

    .c133 {
      z-index: 33;
      border: 0;
      -webkit-border-radius: 35px;
      -moz-border-radius: 35px;
      border-radius: 35px;
      background-image: -webkit-gradient(linear, 180deg, color-stop(0, rgba(144, 108, 196, 0.550215)), color-stop(1, rgba(255, 255, 255, 0.152441)));
      background-image: -o-linear-gradient(180deg, rgba(144, 108, 196, 0.550215) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-image: -webkit-linear-gradient(180deg, rgba(144, 108, 196, 0.550215) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-image: -ms-linear-gradient(180deg, rgba(144, 108, 196, 0.550215) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-image: linear-gradient(180deg, rgba(144, 108, 196, 0.550215) 0%, rgba(255, 255, 255, 0.152441) 100%);
      background-clip: padding-box
    }

    .ps148 {
      position: relative;
      margin-left: 2px;
      margin-top: 88px
    }

    .s161 {
      min-width: 63px;
      width: 63px;
      min-height: 25px
    }

    .c134 {
      z-index: 62;
      pointer-events: auto
    }

    .f35 {
      margin-left: 3px;
      max-width: 47px;
      font-family: "Bruno Ace";
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #fff;
      background-color: initial;
      line-height: normal;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: left;
      display: inline-block;
      overflow: hidden;
      vertical-align: middle;
      white-space: nowrap
    }

    .ps149 {
      position: relative;
      margin-left: 553px;
      margin-top: -152px
    }

    .s162 {
      min-width: 192px;
      width: 192px;
      min-height: 148px
    }

    .c135 {
      z-index: 60;
      pointer-events: auto
    }

    .input12 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 192px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input12::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps150 {
      position: relative;
      margin-left: 0;
      margin-top: 16px
    }

    .s163 {
      min-width: 192px;
      width: 192px;
      min-height: 27px;
      height: 27px
    }

    .c136 {
      z-index: 57;
      pointer-events: auto
    }

    .input13 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 192px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input13::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps151 {
      position: relative;
      margin-left: 68px;
      margin-top: 16px
    }

    .c137 {
      z-index: 61;
      pointer-events: auto
    }

    .ps152 {
      position: relative;
      margin-left: 0;
      margin-top: 10px
    }

    .c138 {
      z-index: 63;
      pointer-events: auto
    }

    .input14 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 192px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input14::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps153 {
      position: relative;
      margin-left: 702px;
      margin-top: -66px
    }

    .s164 {
      min-width: 77px;
      width: 77px;
      min-height: 25px
    }

    .f36 {
      margin-left: 3px;
      max-width: 61px;
      font-family: "Bruno Ace";
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #fff;
      background-color: initial;
      line-height: normal;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: left;
      display: inline-block;
      overflow: hidden;
      vertical-align: middle;
      white-space: nowrap
    }

    .ps154 {
      position: relative;
      margin-left: 434px;
      margin-top: 19px
    }

    .s165 {
      width: 240px;
      padding-right: 0;
      height: 21px
    }

    .f37 {
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      background-color: initial;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: center;
      padding-top: 4px;
      padding-bottom: 3px;
      margin-top: 0;
      margin-bottom: 0;
      width: 240px;
    }

    .c139 {
      z-index: 64;
      pointer-events: auto;
      border: 0;
      -webkit-border-radius: 8px;
      -moz-border-radius: 8px;
      border-radius: 8px;
      background-color: rgba(144, 108, 196, .55);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(144, 108, 196, .55);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(144, 108, 196, .55);
      background-clip: padding-box;
      color: #fff
    }

    .c139:hover {
      background-color: #82939e;
      border-color: #020202;
      color: #020202
    }

    .c139:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    @media (min-width:768px) and (max-width:959px) {
      .s125 {
        min-width: 768px;
        min-height: 378px
      }

      .ps118 {
        margin-top: -378px
      }

      .s126 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .s127 {
        min-width: 768px;
        min-height: 21px
      }

      .s128 {
        min-width: 768px;
        width: 768px
      }

      .s129 {
        width: 602px;
        margin-left: 80px
      }

      .s130 {
        min-width: 602px;
        width: 602px;
        min-height: 21px
      }

      .s131 {
        width: 96px;
        height: 21px
      }

      .f28 {
        font-size: 12px;
        line-height: 14px;
        padding-bottom: 3px
      }

      .ps120 {
        margin-left: 33px
      }

      .s132 {
        min-width: 96px;
        width: 96px;
        min-height: 21px
      }

      .s133 {
        width: 96px;
        height: 14px
      }

      .ps121 {
        margin-left: 26px
      }

      .s134 {
        min-width: 106px;
        width: 106px;
        min-height: 21px
      }

      .s135 {
        width: 106px;
        height: 14px
      }

      .ps122 {
        margin-left: 26px
      }

      .ps123 {
        margin-left: 27px
      }

      .ps124 {
        margin-top: 680px
      }

      .s136 {
        min-width: 768px;
        width: 768px
      }

      .s137 {
        width: 753px
      }

      .s138 {
        min-width: 753px;
        width: 753px;
        min-height: 20px
      }

      .c118 {
        height: 20px
      }

      .f29 {
        font-size: 14px;
        line-height: 17px
      }

      .ps125 {
        margin-left: -753px;
        margin-top: 0
      }

      .s139 {
        min-width: 753px;
        width: 753px;
        min-height: 553px
      }

      .ps126 {
        margin-left: 66px;
        margin-top: 429px
      }

      .s140 {
        min-width: 120px;
        width: 120px;
        min-height: 120px;
        height: 120px
      }

      .c119 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px;
        background-image: url(images/pic-02-120.jpg)
      }

      .webp .c119 {
        background-image: url(images/pic-02-120.webp)
      }

      .ps127 {
        margin-left: 2px;
        margin-top: 2px
      }

      .s141 {
        min-width: 116px;
        width: 116px;
        min-height: 116px
      }

      .f30 {
        padding-top: 56px;
        padding-bottom: 56px
      }

      .btn16 {
        -webkit-border-radius: 58px;
        -moz-border-radius: 58px;
        border-radius: 58px
      }

      .s142 {
        width: 112px
      }

      .ps128 {
        margin-left: -190px;
        margin-top: 0
      }

      .s143 {
        min-width: 753px;
        width: 753px;
        min-height: 20px
      }

      .c121 {
        height: 20px
      }

      .f31 {
        font-size: 14px;
        line-height: 17px
      }

      .ps129 {
        margin-top: -901px
      }

      .s144 {
        min-width: 768px;
        width: 768px
      }

      .ps130 {
        margin-top: -620px
      }

      .s145 {
        min-width: 768px;
        min-height: 22px
      }

      .ps131 {
        margin-top: -286px
      }

      .ps132 {
        margin-top: -269px
      }

      .s146 {
        width: 753px;
        margin-left: 0
      }

      .c123 {
        height: 20px
      }

      .ps134 {
        margin-left: -753px;
        margin-top: 0
      }

      .s147 {
        min-width: 753px;
        width: 753px;
        min-height: 180px
      }

      .ps135 {
        margin-top: 0
      }

      .s148 {
        min-width: 753px;
        width: 753px;
        min-height: 180px
      }

      .ps136 {
        margin-left: 110px;
        margin-top: 55px
      }

      .s149 {
        min-width: 200px;
        width: 200px;
        min-height: 125px;
        height: 125px;
        height: 125px
      }

      .ps137 {
        margin-left: 553px;
        margin-top: -146px
      }

      .s150 {
        min-width: 154px;
        width: 154px;
        min-height: 143px
      }

      .s151 {
        min-width: 154px;
        width: 154px;
        min-height: 22px;
        height: 22px
      }

      .input7 {
        width: 154px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps138 {
        margin-top: 11px
      }

      .s152 {
        min-width: 154px;
        width: 154px;
        min-height: 22px;
        height: 22px
      }

      .input8 {
        width: 154px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps139 {
        margin-top: 11px
      }

      .input9 {
        width: 154px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps140 {
        margin-top: 9px
      }

      .s153 {
        min-width: 116px;
        width: 116px;
        min-height: 20px
      }

      .s154 {
        min-width: 50px;
        width: 50px;
        min-height: 20px
      }

      .input10 {
        margin-top: -1px
      }

      .f32 {
        max-width: 34px;
        font-size: 9px
      }

      .ps141 {
        margin-left: 5px
      }

      .s155 {
        min-width: 61px;
        width: 61px;
        min-height: 20px
      }

      .f33 {
        max-width: 45px;
        font-size: 9px
      }

      .ps142 {
        margin-top: 4px
      }

      .input11 {
        width: 154px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps143 {
        margin-left: 674px;
        margin-top: -49px
      }

      .ps144 {
        margin-left: 455px;
        margin-top: 16px
      }

      .s156 {
        width: 192px;
        height: 17px
      }

      .f34 {
        font-size: 9px;
        line-height: 11px
      }

      .ps145 {
        margin-top: -572px
      }

      .ps146 {
        margin-top: -803px
      }

      .s157 {
        width: 753px;
        margin-left: 0
      }

      .s158 {
        min-width: 753px;
        width: 753px;
        min-height: 415px
      }

      .s159 {
        min-width: 753px;
        width: 753px;
        min-height: 415px
      }

      .ps147 {
        margin-left: 109px;
        margin-top: 292px
      }

      .s160 {
        min-width: 200px;
        width: 200px;
        min-height: 123px;
        height: 123px;
        height: 123px
      }

      .ps148 {
        margin-left: 550px;
        margin-top: -52px
      }

      .s161 {
        min-width: 51px;
        width: 51px;
        min-height: 20px
      }

      .f35 {
        max-width: 35px;
        font-size: 9px
      }

      .ps149 {
        margin-left: 551px;
        margin-top: -121px
      }

      .s162 {
        min-width: 154px;
        width: 154px;
        min-height: 118px
      }

      .input12 {
        width: 154px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps150 {
        margin-top: 12px
      }

      .s163 {
        min-width: 154px;
        width: 154px;
        min-height: 22px;
        height: 22px
      }

      .input13 {
        width: 154px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps151 {
        margin-left: 55px;
        margin-top: 13px
      }

      .ps152 {
        margin-top: 7px
      }

      .input14 {
        width: 154px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps153 {
        margin-left: 670px;
        margin-top: -52px
      }

      .s164 {
        min-width: 62px;
        width: 62px;
        min-height: 20px
      }

      .f36 {
        max-width: 46px;
        font-size: 9px
      }

      .ps154 {
        margin-left: 456px;
        margin-top: 16px
      }

      .s165 {
        width: 192px;
        height: 16px
      }

      .f37 {
        font-size: 9px;
        line-height: 11px;
        padding-top: 3px;
        padding-bottom: 2px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s125 {
        min-width: 480px;
        min-height: 236px
      }

      .ps118 {
        margin-top: -236px
      }

      .s126 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .s127 {
        min-width: 480px;
        min-height: 13px
      }

      .s128 {
        min-width: 480px;
        width: 480px
      }

      .s129 {
        width: 376px;
        margin-left: 50px
      }

      .s130 {
        min-width: 376px;
        width: 376px;
        min-height: 13px
      }

      .s131 {
        width: 60px;
        height: 13px
      }

      .f28 {
        font-size: 7px;
        line-height: 9px;
        padding-top: 2px;
        padding-bottom: 2px
      }

      .ps120 {
        margin-left: 21px
      }

      .s132 {
        min-width: 60px;
        width: 60px;
        min-height: 13px
      }

      .s133 {
        width: 60px;
        height: 9px
      }

      .ps121 {
        margin-left: 16px
      }

      .s134 {
        min-width: 66px;
        width: 66px;
        min-height: 13px
      }

      .s135 {
        width: 66px;
        height: 9px
      }

      .ps122 {
        margin-left: 17px
      }

      .ps123 {
        margin-left: 16px
      }

      .ps124 {
        margin-top: 1692px
      }

      .s136 {
        min-width: 480px;
        width: 480px
      }

      .s137 {
        width: 471px
      }

      .s138 {
        min-width: 471px;
        width: 471px;
        min-height: 12px
      }

      .c118 {
        height: 12px
      }

      .f29 {
        font-size: 9px;
        line-height: 11px
      }

      .ps125 {
        margin-left: -471px;
        margin-top: 0
      }

      .s139 {
        min-width: 471px;
        width: 471px;
        min-height: 346px
      }

      .ps126 {
        margin-left: 40px;
        margin-top: 267px
      }

      .s140 {
        min-width: 75px;
        width: 75px;
        min-height: 75px;
        height: 75px
      }

      .c119 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px;
        background-image: url(images/pic-02-75.jpg)
      }

      .webp .c119 {
        background-image: url(images/pic-02-75.webp)
      }

      .ps127 {
        margin-left: 1px;
        margin-top: 1px
      }

      .s141 {
        min-width: 75px;
        width: 75px;
        min-height: 74px
      }

      .f30 {
        padding-top: 35px;
        padding-bottom: 35px
      }

      .btn16 {
        -webkit-border-radius: 37px;
        -moz-border-radius: 37px;
        border-radius: 37px
      }

      .s142 {
        width: 71px
      }

      .ps128 {
        margin-left: -119px;
        margin-top: 0
      }

      .s143 {
        min-width: 471px;
        width: 471px;
        min-height: 12px
      }

      .c121 {
        height: 12px
      }

      .f31 {
        font-size: 9px;
        line-height: 11px
      }

      .ps129 {
        margin-top: -1830px
      }

      .s144 {
        min-width: 480px;
        width: 480px
      }

      .ps130 {
        margin-top: -1323px
      }

      .s145 {
        min-width: 480px;
        min-height: 14px
      }

      .ps131 {
        margin-top: -1445px
      }

      .ps132 {
        margin-top: -1414px
      }

      .s146 {
        width: 471px;
        margin-left: 0
      }

      .ps133 {
        margin-top: 1246px
      }

      .c123 {
        height: 12px
      }

      .ps134 {
        margin-left: -471px;
        margin-top: 0
      }

      .s147 {
        min-width: 471px;
        width: 471px;
        min-height: 1258px
      }

      .ps135 {
        margin-top: 14px
      }

      .s148 {
        min-width: 471px;
        width: 471px;
        min-height: 1244px
      }

      .ps136 {
        margin-left: 69px
      }

      .s149 {
        min-width: 125px;
        width: 125px;
        min-height: 78px;
        height: 78px;
        height: 78px
      }

      .ps137 {
        margin-left: 345px;
        margin-top: -1258px
      }

      .s150 {
        min-width: 97px;
        width: 97px;
        min-height: 90px
      }

      .s151 {
        min-width: 97px;
        width: 97px;
        min-height: 15px;
        height: 15px
      }

      .input7 {
        width: 97px;
        height: 15px;
        font-size: 5px;
        line-height: 6px
      }

      .ps138 {
        margin-top: 6px
      }

      .s152 {
        min-width: 97px;
        width: 97px;
        min-height: 14px;
        height: 14px
      }

      .input8 {
        width: 97px;
        height: 14px;
        font-size: 5px;
        line-height: 6px
      }

      .ps139 {
        margin-top: 7px
      }

      .input9 {
        width: 97px;
        height: 14px;
        font-size: 5px;
        line-height: 6px
      }

      .ps140 {
        margin-top: 5px
      }

      .s153 {
        min-width: 73px;
        width: 73px;
        min-height: 13px
      }

      .s154 {
        min-width: 32px;
        width: 32px;
        min-height: 13px
      }

      .input10 {
        margin-top: -3px
      }

      .f32 {
        max-width: 16px;
        font-size: 5px
      }

      .ps141 {
        margin-left: 3px
      }

      .s155 {
        min-width: 38px;
        width: 38px;
        min-height: 13px
      }

      .f33 {
        max-width: 22px;
        font-size: 5px
      }

      .ps142 {
        margin-top: 2px
      }

      .input11 {
        width: 97px;
        height: 14px;
        font-size: 5px;
        line-height: 6px
      }

      .ps143 {
        margin-left: 421px;
        margin-top: -1197px
      }

      .ps144 {
        margin-left: 284px;
        margin-top: -1156px
      }

      .s156 {
        width: 120px;
        height: 11px
      }

      .f34 {
        font-size: 5px;
        line-height: 6px;
        padding-bottom: 2px
      }

      .c132 {
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px
      }

      .ps145 {
        margin-top: -2526px
      }

      .ps146 {
        margin-top: -2488px
      }

      .s157 {
        width: 471px;
        margin-left: 0
      }

      .s158 {
        min-width: 471px;
        width: 471px;
        min-height: 1096px
      }

      .s159 {
        min-width: 471px;
        width: 471px;
        min-height: 1096px
      }

      .ps147 {
        margin-left: 68px
      }

      .s160 {
        min-width: 125px;
        width: 125px;
        min-height: 77px;
        height: 77px;
        height: 77px
      }

      .ps148 {
        margin-left: 344px;
        margin-top: -1052px
      }

      .s161 {
        min-width: 32px;
        width: 32px;
        min-height: 13px
      }

      .f35 {
        max-width: 16px;
        font-size: 5px
      }

      .ps149 {
        margin-left: 344px;
        margin-top: -1095px
      }

      .s162 {
        min-width: 97px;
        width: 97px;
        min-height: 74px
      }

      .input12 {
        width: 97px;
        height: 14px;
        font-size: 5px;
        line-height: 6px
      }

      .ps150 {
        margin-top: 7px
      }

      .s163 {
        min-width: 97px;
        width: 97px;
        min-height: 15px;
        height: 15px
      }

      .input13 {
        width: 97px;
        height: 15px;
        font-size: 5px;
        line-height: 6px
      }

      .ps151 {
        margin-left: 35px;
        margin-top: 7px
      }

      .ps152 {
        margin-top: 4px
      }

      .input14 {
        width: 97px;
        height: 14px;
        font-size: 5px;
        line-height: 6px
      }

      .ps153 {
        margin-left: 419px;
        margin-top: -1052px
      }

      .s164 {
        min-width: 39px;
        width: 39px;
        min-height: 13px
      }

      .f36 {
        max-width: 23px;
        font-size: 5px
      }

      .ps154 {
        margin-left: 285px;
        margin-top: -1009px
      }

      .s165 {
        width: 120px;
        height: 10px
      }

      .f37 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 2px;
        padding-bottom: 2px
      }

      .c139 {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px
      }
    }

    @media (max-width:479px) {
      .s125 {
        min-width: 320px;
        min-height: 157px
      }

      .ps118 {
        margin-top: -157px
      }

      .s126 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .s127 {
        min-width: 320px;
        min-height: 9px
      }

      .s128 {
        min-width: 320px;
        width: 320px
      }

      .s129 {
        width: 251px;
        margin-left: 33px
      }

      .s130 {
        min-width: 251px;
        width: 251px;
        min-height: 9px
      }

      .s131 {
        width: 40px;
        height: 9px
      }

      .f28 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 2px;
        padding-bottom: 1px
      }

      .ps120 {
        margin-left: 14px
      }

      .s132 {
        min-width: 40px;
        width: 40px;
        min-height: 9px
      }

      .s133 {
        width: 40px;
        height: 6px
      }

      .ps121 {
        margin-left: 11px
      }

      .s134 {
        min-width: 44px;
        width: 44px;
        min-height: 9px
      }

      .s135 {
        width: 44px;
        height: 6px
      }

      .ps122 {
        margin-left: 11px
      }

      .ps123 {
        margin-left: 11px
      }

      .ps124 {
        margin-top: 1128px
      }

      .s136 {
        min-width: 320px;
        width: 320px
      }

      .s137 {
        width: 314px
      }

      .s138 {
        min-width: 314px;
        width: 314px;
        min-height: 8px
      }

      .c118 {
        height: 8px
      }

      .f29 {
        font-size: 6px;
        line-height: 8px
      }

      .ps125 {
        margin-left: -314px;
        margin-top: 0
      }

      .s139 {
        min-width: 314px;
        width: 314px;
        min-height: 231px
      }

      .ps126 {
        margin-left: 26px;
        margin-top: 177px
      }

      .s140 {
        min-width: 50px;
        width: 50px;
        min-height: 50px;
        height: 50px
      }

      .c119 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px;
        background-image: url(images/pic-02-50.jpg)
      }

      .webp .c119 {
        background-image: url(images/pic-02-50.webp)
      }

      .ps127 {
        margin-left: 0;
        margin-top: 0
      }

      .s141 {
        min-width: 51px;
        width: 51px;
        min-height: 51px
      }

      .f30 {
        padding-top: 24px;
        padding-bottom: 23px
      }

      .btn16 {
        -webkit-border-radius: 26px;
        -moz-border-radius: 26px;
        border-radius: 26px
      }

      .s142 {
        width: 47px
      }

      .ps128 {
        margin-left: -80px;
        margin-top: 0
      }

      .s143 {
        min-width: 314px;
        width: 314px;
        min-height: 8px
      }

      .c121 {
        height: 8px
      }

      .f31 {
        font-size: 6px;
        line-height: 8px
      }

      .ps129 {
        margin-top: -1220px
      }

      .s144 {
        min-width: 320px;
        width: 320px
      }

      .ps130 {
        margin-top: -882px
      }

      .s145 {
        min-width: 320px;
        min-height: 9px
      }

      .ps131 {
        margin-top: -963px
      }

      .ps132 {
        margin-top: -943px
      }

      .s146 {
        width: 314px;
        margin-left: 0
      }

      .ps133 {
        margin-top: 831px
      }

      .c123 {
        height: 8px
      }

      .ps134 {
        margin-left: -314px;
        margin-top: 0
      }

      .s147 {
        min-width: 314px;
        width: 314px;
        min-height: 839px
      }

      .ps135 {
        margin-top: 10px
      }

      .s148 {
        min-width: 314px;
        width: 314px;
        min-height: 829px
      }

      .ps136 {
        margin-left: 46px
      }

      .s149 {
        min-width: 83px;
        width: 83px;
        min-height: 52px;
        height: 52px;
        height: 52px
      }

      .c124 {
        -webkit-border-radius: 26px;
        -moz-border-radius: 26px;
        border-radius: 26px
      }

      .ps137 {
        margin-left: 230px;
        margin-top: -839px
      }

      .s150 {
        min-width: 65px;
        width: 65px;
        min-height: 61px
      }

      .s151 {
        min-width: 65px;
        width: 65px;
        min-height: 11px;
        height: 11px
      }

      .input7 {
        width: 65px;
        height: 11px;
        font-size: 3px;
        line-height: 4px
      }

      .ps138 {
        margin-top: 3px
      }

      .s152 {
        min-width: 65px;
        width: 65px;
        min-height: 10px;
        height: 10px
      }

      .input8 {
        width: 65px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps139 {
        margin-top: 4px
      }

      .input9 {
        width: 65px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps140 {
        margin-top: 3px
      }

      .s153 {
        min-width: 48px;
        width: 48px;
        min-height: 9px
      }

      .s154 {
        min-width: 21px;
        width: 21px;
        min-height: 13px
      }

      .input10 {
        margin-top: -4px
      }

      .f32 {
        max-width: 5px;
        font-size: 3px
      }

      .ps141 {
        margin-left: 2px
      }

      .s155 {
        min-width: 25px;
        width: 25px;
        min-height: 13px
      }

      .f33 {
        max-width: 9px;
        font-size: 3px
      }

      .ps142 {
        margin-top: 1px
      }

      .input11 {
        width: 65px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps143 {
        margin-left: 281px;
        margin-top: -798px
      }

      .ps144 {
        margin-left: 189px;
        margin-top: -771px
      }

      .s156 {
        width: 80px;
        height: 8px
      }

      .f34 {
        font-size: 3px;
        line-height: 4px;
        padding-top: 2px;
        padding-bottom: 2px
      }

      .c132 {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px
      }

      .ps145 {
        margin-top: -1684px
      }

      .ps146 {
        margin-top: -1659px
      }

      .s157 {
        width: 314px;
        margin-left: 0
      }

      .s158 {
        min-width: 314px;
        width: 314px;
        min-height: 731px
      }

      .s159 {
        min-width: 314px;
        width: 314px;
        min-height: 731px
      }

      .ps147 {
        margin-left: 45px
      }

      .s160 {
        min-width: 84px;
        width: 84px;
        min-height: 52px;
        height: 52px;
        height: 52px
      }

      .c133 {
        -webkit-border-radius: 26px;
        -moz-border-radius: 26px;
        border-radius: 26px
      }

      .ps148 {
        margin-left: 229px;
        margin-top: -701px
      }

      .s161 {
        min-width: 22px;
        width: 22px;
        min-height: 13px
      }

      .f35 {
        max-width: 6px;
        font-size: 3px
      }

      .ps149 {
        margin-left: 229px;
        margin-top: -730px
      }

      .s162 {
        min-width: 65px;
        width: 65px;
        min-height: 50px
      }

      .input12 {
        width: 65px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps150 {
        margin-top: 4px
      }

      .s163 {
        min-width: 65px;
        width: 65px;
        min-height: 10px;
        height: 10px
      }

      .input13 {
        width: 65px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps151 {
        margin-left: 24px;
        margin-top: 5px
      }

      .ps152 {
        margin-top: -2px
      }

      .input14 {
        width: 65px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps153 {
        margin-left: 279px;
        margin-top: -701px
      }

      .s164 {
        min-width: 26px;
        width: 26px;
        min-height: 13px
      }

      .f36 {
        max-width: 10px;
        font-size: 3px
      }

      .ps154 {
        margin-left: 190px;
        margin-top: -673px
      }

      .s165 {
        width: 80px;
        height: 7px
      }

      .f37 {
        font-size: 3px;
        line-height: 4px;
        padding-top: 2px;
        padding-bottom: 1px
      }

      .c139 {
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c109 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .c119 {
        background-image: url(images/pic-02-504.jpg);
        background-size: cover
      }

      .webp .c119 {
        background-image: url(images/pic-02-504.webp)
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c109 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .c119 {
        background-image: url(images/pic-02-240.jpg);
        background-size: cover
      }

      .webp .c119 {
        background-image: url(images/pic-02-240.webp)
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c109 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .c119 {
        background-image: url(images/pic-02-150.jpg);
        background-size: cover
      }

      .webp .c119 {
        background-image: url(images/pic-02-150.webp)
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c109 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .c119 {
        background-image: url(images/pic-02-100.jpg);
        background-size: cover
      }

      .webp .c119 {
        background-image: url(images/pic-02-100.webp)
      }
    }

    @media (min-width:320px) {
      .c109 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-480.webp)
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c109 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960.webp)
      }
    }

    @media (min-width:480px) {
      .c109 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-768.webp)
      }
    }

    @media (min-width:768px) {
      .c109 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-960-1.webp)
      }
    }

    @media (min-width:960px) {
      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1200px) {
      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1600px) {
      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c109 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c109 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  color: black;
  background-color: #CCCCFF;
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,255,0.3);
  z-index: 9999;
}

.dropdown-content a {
  //float: none;
  //padding: 12px 16px;
  //text-decoration: none;
  //display: block;
  //text-align: left;
  //float: left;
  font-size: 16px;
  color: black;
  text-align: center;
  padding:12px 16px;
  text-decoration: none;
  float: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #9966FF;
}

.dropdown:hover .dropdown-content {
  display: block;
}

  </style>
  <script>
    ! function() {
      var A = new Image;
      A.onload = A.onerror = function() {
        1 == A.height && (document.documentElement.className += " webp")
      }, A.src = "data:image/webp;base64,UklGRiQAAABXRUJQVlA4IBgAAAAwAQCdASoBAAEAD8D+JaQAA3AA/ua1AAA"
    }();
  </script>
  <link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.790d10.css" media="print">
  <!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.790d10-lteIE7.css" type="text/css">
<![endif]-->
  <!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.790d10-lteIE8.css" type="text/css">
<![endif]-->
  <!--[if gte IE 9]>
<link rel="stylesheet" href="css/site.790d10-gteIE9.css" type="text/css">
<![endif]-->
</head>

<body id="b">
  <div class="v11 ps117 s125 c109"></div>
  <div class="v11 ps118 s126 c110"></div>
  <div class="v11 ps117 s127 c111">
    <div class="ps117 v12 s128">
      <div class="s129">
        <div class="v11 ps119 s130 c112">
          <div class="v13 ps119 s131 c113">
            <!--p class="f28">Login</p-->
<?php if(isset($_SESSION['username']) && ($_SESSION['username']=='admin')):?>
<div class="dropdown">
  <button class="f28 btn11 v14 s133"><?php echo $_SESSION['username'];?></button>
  <div class="dropdown-content">
    <a href="updatebooking.php">Update Booking</a>
    <a href="updateroom.php">Update Room Status</a>
    <a href="logout.php">Log out</a>
  </div>
</div>
<?php elseif(isset($_SESSION['username'])):?>
<div class="dropdown">
  <button class="f28 btn11 v14 s133"><?php echo $_SESSION['username'];?></button>
  <div class="dropdown-content">
    <a href="#">Pet Profile</a>
    <a href="#">History</a>
    <a href="logout.php">Log out</a>
  </div>
</div>
<?php else:?>
<a href="http://ec2-52-74-104-157.ap-southeast-1.compute.amazonaws.com/signin.html" class="f28 btn11 v14 s133">Login</a>
<?php endif;?>
          </div>
          <div class="v11 ps120 s132 c114">
            <a href="index.php" class="f28 btn12 v14 s133">Home</a>
          </div>
          <div class="v11 ps121 s134 c115">
            <a href="./#gallery" class="f28 btn13 v14 s135">Gallery</a>
          </div>
          <div class="v11 ps122 s132 c116">
            <a href="./#about-us" class="f28 btn14 v14 s133">About Us</a>
          </div>
          <div class="v11 ps123 s132 c117">
            <!--a href="./#contact-us" class="f28 btn15 v14 s133">Contact Us</a-->
<?php if(isset($_SESSION['username']) && ($_SESSION['username']=='admin')):?>
<!--a href="#" class="f28 btn15 v14 s133">Reports</a-->
<div class="dropdown">
<!--a href="#" class="f11 btn7 v8 s46">Reports</a-->
 <button class="f28 btn15 v14 s133">Reports</button>
 <div class="dropdown-content">
   <a href=transact_report.php>Transactions</a>
   <a href=active_users.php>Active Users</a>
   <a href=room_report.php>Rooms</a>
 </div>
</div>
<?php else:?>
<a href="#contact-us" class="f28 btn15 v14 s133">Contact Us</a>
<?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ps124 v12 s136">
    <div class="s137">
      <div class="v11 ps119 s138 c118">
        <p class="p7"><span class="f29">PARK CITY SERVICES</span></p>
      </div>
      <div class="v11 ps125 s139 c112">
        <div class="v11 ps119 s139 w3">
          <div class="v11 ps126 s140 c119">
            <div class="v11 ps127 s141 c120">
              <a href="#pg_serve" class="f30 btn16 v14 s142"> </a>
            </div>
          </div>
          <div class="v11 ps128 s143 c121">
            <p class="p7 f31">BOOK NOW</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="v1 ps92 s16 c74">
    <div class="ps13 v3 s17">
      <div class="s101">
        <div class="v1 ps4 s19 c75">
          <p class="p2 f4">Services</p>
        </div>
      </div>
    </div>
  </div>
  <a name="pg_serve" class="v11 ps129 s144"></a>
  <div class="ps93 v3 s20">
    <div class="s102">
      <div class="v1 ps4 s103 c76">
        <div class="v1 ps4 s103 c3">
          <div class="v1 ps4 s104 w1">
            <div class="v1 ps4 s105 c3">
              <div class="v1 ps4 s105 w1">
                <div class="v1 ps4 s106 c77"></div>
                <div class="v1 ps94 s107 c78"></div>
              </div>
            </div>
            <div class="v1 ps95 s104 c79">
              <a href="#pg_boarding" class="f23 btn10 v2 s108">Boarding</a>
            </div>
          </div>
          <div class="v1 ps96 s109 w1">
            <div class="v1 ps4 s109 c3">
              <div class="v1 ps4 s109 w1">
                <div class="v1 ps4 s109 c80">
                  <a href="#pg_grooming" class="f23 btn11 v2 s110">Grooming</a>
                </div>
                <div class="v1 ps97 s106 c81"></div>
              </div>
            </div>
            <div class="v1 ps98 s111 c82"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="v11 ps130 s145 c122"></div>
  <a name="pg_boarding" class="v11 ps131 s144"></a>
  <div class="ps132 v12 s136">
    <div class="s146">
      <form name="myForm" method="POST" action="confirmboard_page.php" onsubmit="return checkRoom()" class="v18 ps175 s213">
      <div class="v11 ps133 s143 c123">
        <p class="p7 f31">Boarding</p>
      </div>
      <div class="v11 ps134 s147 c112">
        <div class="v11 ps135 s148 w3">
          <div class="v11 ps136 s149 c124"></div>
          <div class="v1 ps99 s112 c83">
            <p class="p6 f24">Boarding Rates</p>
          </div>
          <div class="v1 ps100 s113 c3">
            <div class="v1 ps4 s114 w1">
              <div class="v1 ps4 s115 c84">
                <p class="p6 f4">Small</p>
              </div>
              <div class="v1 ps101 s115 c85">
                <p class="p6 f4">Medium</p>
              </div>
              <div class="v1 ps101 s116 c86">
                <p class="p6 f4">Large</p>
              </div>
            </div>
            <div class="v1 ps102 s117 w1">
              <div class="v1 ps4 s118 c87">
                <p class="p6 f25">&#xe3f;<span class="f26"> 65</span></p>
              </div>
              <div class="v1 ps103 s119 c3">
                <div class="v1 ps4 s119 w1">
                  <div class="v1 ps4 s118 c88">
                    <p class="p6 f25">&#xe3f;<span class="f26"> 75</span></p>
                  </div>
                  <div class="v1 ps103 s118 c89">
                    <p class="p6 f25">&#xe3f;<span class="f26"> 85</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="v1 ps104 s120 c90">
          <!--p class="p1 f27">Check In Date &amp; Time:</p-->
          <p class="p1 f27">Check In Date:</p>
        </div>
        <div class="v1 ps105 s121 w1">
          <div class="v1 ps4 s120 c91">
            <!--p class="p1 f27">Check Out Date &amp; Time:</pi-->
            <p class="p1 f27">Check Out Date:</p>
          </div>
          <div class="v1 ps106 s120 c92">
            <p class="p1 f27">Number of Rooms:</p>
          </div>
        </div>
        <div class="v1 ps107 s122 w1">
          <div class="v1 ps4 s120 c93">
            <p class="p1 f27">Pet Size:</p>
          </div>
          <div class="v1 ps108 s120 c94">
            <p class="p1 f27">Pet Type:</p>
          </div>
        </div>
        <div class="v11 ps137 s150 w3">
          <div class="v11 ps119 s151 c125">
            <input id="datefield" type="date" name="checkin" class="input7" min='2013-01-01' max='2030-12-31' required pattern="\d{1,2}/\d{1,2}/\d{4}"></input>
<?php $_SESSION["checkin"] = $checkin;?>
          </div>
          <div class="v11 ps138 s152 c126">
            <input id="datefield1" type="date" name="checkout" class="input8" min='2013-01-01' max='2030-12-31' required pattern="\d{1,2}/\d{1,2}/\d{4}"></input>
<?php $_SESSION["checkout"] = $checkout;?>
          </div>
          <div class="v11 ps139 s152 c127">
            <input type="text" id="numroom" name="numroom" class="input9" value="1">
<?php $_SESSION["numroom"] = $numroom;?>
	    <!--select name="numrooms" id="numrooms" class="input9">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option-->
          </div>
          <div class="v11 ps140 s153 c112">
            <div class="v11 ps119 s154 c128">
              <input name="petsize" type="radio" id="radio1" value="small" checked class="input10">
              <label for="radio1" class="f32">small</label>
            </div>
            <div class="v11 ps141 s155 c129">
              <input name="petsize" type="radio" id="radio2" value="medium" class="input10">
              <label for="radio2" class="f33">medium</label>
            </div>
          </div>
          <div class="v11 ps142 s152 c130">
            <input type="text" name="p_type" class="input11" value="dog">
<?php $_SESSION["p_type"] = $p_type;?>
          </div>
        </div>
        <div class="v11 ps143 s155 c131">
          <input name="petsize" type="radio" id="radio3" value="large" class="input10">
          <label for="radio3" class="f33">large</label>
        </div>
<?php $_SESSION["petsize"] = $petsize;?>
      </div>
      <div class="v13 ps144 s156 c132">
        <!--p class="f34">Book Now</p-->
<?php $_SESSION["service"] = 1;?>
	<button class="f34">Book Now</button>
      </div>
    </form>
    </div>
  </div>
  <div class="v1 ps109 s34 c95">
    <div class="ps13 v3 s17">
      <div class="s18">
        <div class="v1 ps4 s19 c96">
          <p class="p2 f4">Grooming</p>
        </div>
      </div>
    </div>
  </div>
  <a name="pg_grooming" class="v11 ps145 s144"></a>
  <div class="ps146 v12 s136">
    <div class="s157">
      <form method="POST" action="confirmgroom_page.php" class="v18 ps175 s213" onsubmit="return checkGroomingSched()">
      <div class="v11 ps119 s158 c112">
        <div class="v11 ps119 s159 w3">
          <div class="v11 ps147 s160 c133"></div>
          <div class="v1 ps110 s112 c97">
            <p class="p6 f24">Grooming Rates</p>
          </div>
          <div class="v1 ps111 s113 c3">
            <div class="v1 ps4 s114 w1">
              <div class="v1 ps4 s115 c98">
                <p class="p6 f4">Small</p>
              </div>
              <div class="v1 ps101 s115 c99">
                <p class="p6 f4">Medium</p>
              </div>
              <div class="v1 ps101 s116 c100">
                <p class="p6 f4">Large</p>
              </div>
            </div>
            <div class="v1 ps102 s117 w1">
              <div class="v1 ps4 s118 c101">
                <p class="p6 f25">&#xe3f;<span class="f26"> 50</span></p>
              </div>
              <div class="v1 ps103 s118 c102">
                <p class="p6 f25">&#xe3f;<span class="f26"> 60</span></p>
              </div>
              <div class="v1 ps103 s118 c103">
                <p class="p6 f25">&#xe3f;<span class="f26"> 65</span></p>
              </div>
            </div>
          </div>
        </div>
        <div class="v1 ps112 s123 w1">
          <div class="v1 ps4 s120 c104">
            <p class="p1 f27">Preferred Date:</p>
          </div>
          <div class="v1 ps113 s120 c105">
            <p class="p1 f27">Preferred Time:</p>
          </div>
          <div class="v1 ps114 s120 c106">
            <p class="p1 f27">Pet Size:</p>
          </div>
        </div>
        <div class="v1 ps115 s120 c107">
          <p class="p1 f27">Pet Type:</p>
        </div>
        <div class="v11 ps148 s161 c134">
          <input name="petsize" type="radio" id="radio4" value="small" checked class="input10">
          <label for="radio4" class="f35">small</label>
        </div>
        <div class="v11 ps149 s162 w3">
          <div class="v11 ps119 s152 c135">
            <!--input type="date" name="checkin_g" class="input12"-->
            <input id="datefield2" type="date" name="checkin_g" class="input12" min='2013-01-01' max='2030-12-31' required pattern="\d{1,2}/\d{1,2}/\d{4}"></input>
<?php $_SESSION["checkin_g"] = $checkin_g;?>
          </div>
          <div class="v11 ps150 s163 c136">
            <input type="time" name="checkin_tg" class="input13" required pattern="/^(\d{1,2}):(\d{2})(:00)?([ap]m)?$/"></input>
<?php $_SESSION["checkin_tg"] = $checkin_tg;?>
          </div>
          <div class="v11 ps151 s155 c137">
            <input name="petsize" type="radio" id="radio5" value="medium" class="input10">
            <label for="radio5" class="f33">medium</label>
          </div>
          <div class="v11 ps152 s152 c138">
            <input type="text" name="p_type" class="input14" value="cat">
<?php $_SESSION["p_type"] = $p_type;?>
          </div>
        </div>
        <div class="v11 ps153 s164 c138">
          <input name="petsize" type="radio" id="radio6" value="large" class="input10">
          <label for="radio6" class="f36">large</label>
        </div>
      </div>
      <div class="v13 ps154 s165 c139">
<?php $_SESSION["service"] = 2;?>
        <!--p class="f37">Book Now</p-->
<button class="f37">Book Now</button>
      </div>
    </div>
  </form>
  </div>
  <div class="v1 ps116 s124 c108"></div>
  <script>
    dpth = "/";
    ! function() {
      var s = ["js/jquery.c71cd4.js", "js/services.790d10.js"],
        n = {},
        j = 0,
        e = function(e) {
          var o = new XMLHttpRequest;
          o.open("GET", s[e], !0), o.onload = function() {
            if (n[e] = o.responseText, 2 == ++j)
              for (var t in s) {
                var i = document.createElement("script");
                i.textContent = n[t], document.body.appendChild(i)
              }
          }, o.send()
        };
      for (var o in s) e(o)
    }();
  </script>
  <script type="text/javascript">
    var ver = RegExp(/Mozilla\/5\.0 \(Linux; .; Android ([\d.]+)/).exec(navigator.userAgent);
    if (ver && parseFloat(ver[1]) < 5) {
      document.getElementsByTagName('body')[0].className += ' whitespacefix';
    }
  </script>
<script>
var today = new Date();
var dd = today.getDate() + 2;
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
  dd = '0' + dd
}
if (mm < 10) {
  mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield").setAttribute("min", today);
</script>
<script>
var today = new Date();
var dd = today.getDate() + 3;
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
  dd = '0' + dd
}
if (mm < 10) {
  mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield1").setAttribute("min", today);
</script>
<script>
var today = new Date();
var dd = today.getDate() + 1;
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
  dd = '0' + dd
}
if (mm < 10) {
  mm = '0' + mm
}

today = yyyy + '-' + mm + '-' + dd;
document.getElementById("datefield2").setAttribute("min", today);
</script>
<script>
//var psize = document.getElementById("petsize");
function checkRoom(){
//var psize = document.getElementById("radio4").value;
var psize = $("input[type='radio'].input10:checked").val();
//var psize1 = document.getElementById("radio5").value;
//var psize2 = document.getElementById("radio6").value;

var available_rm_s = "<?php echo $rm_avail_s[0]; ?>";
var available_rm_m = "<?php echo $rm_avail_m[0]; ?>";
var available_rm_l = "<?php echo $rm_avail_l[0]; ?>";

var num_of_room = document.getElementById("numroom").value;

//btn.onclick = function(){   
/* if(available_rm == 0){
  alert("No available room!");
  return false;
 }*/
switch(psize){
 case "small":
  if(num_of_room>available_rm_s){
    alert("No Avaiable Rooms!");
    //document.getElementById("myForm").reset();
    return false;
  }
 break;
 case "medium":
  if(num_of_room>available_rm_m){
    alert("No Avaiable Rooms!");
    //document.getElementById("myForm").reset();
    return false;
  } 
break;
 case "large":
  if(num_of_room>available_rm_l){
    alert("No Avaiable Rooms!");
    //document.getElementById("myForm").reset();
    return false;
  }
 break;
}
    //document.getElementById("myForm").reset();
}
</script>
<script>
function checkGroomingSched(){

var gr_sched = "<?php echo $groom_sched_avail[0]; ?>";

if(gr_sched!=0){
  alert("Selected date and time is not available. Please try a differnt date or time. Thank you!");
  return false;
}
}
</script>
</body>
</html>
