<?php
if (!session_id()) session_start();

//$booking_num=rand_code(7);

$checkin_g = $_POST['checkin_g'];
$checkin_tg = $_POST['checkin_tg'];
$petsize = $_POST['petsize'];
$p_type = $_POST['p_type'];
//$est_amount = $_POST['est_amount'];

$username = $_SESSION['username'];
$_SESSION["checkin_g"] = $checkin_g;
$_SESSION["checkin_tg"] = $checkin_tg;
$_SESSION["petsize"] = $petsize;
$_SESSION["p_type"] = $p_type;
$_SESSION["srv_code"] = "GRM";
//$_SESSION["est_amount"] = $est_amount;


//computation
$numOfDays = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);
switch (strtolower($petsize)){
case "small":
$est_amount = "45 Baht";
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p";
break;
case "medium":
$est_amount = "55 Baht";
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>";
break;
default:
$est_amount = "65 Baht";
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>";
}

$_SESSION["est_amount"] = $est_amount;
//$est_amount = $_POST['est_amount'];

$db = new SQLite3('park_city.db');

$stmt = $db->prepare("SELECT email from users where username=:username");
$stmt->bindValue(':username',$username);
$result = $stmt->execute();
//$stmt->bind_result($email);
$row = $result->fetchArray();

/*function rand_code($len)
{
   $min_lenght= 0;
   $max_lenght = 100;
   $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $smallL = "abcdefghijklmnopqrstuvwxyz";
   $number = "0123456789";
   $bigB = str_shuffle($bigL);
   $smallS = str_shuffle($smallL);
   $numberS = str_shuffle($number);
   $subA = substr($bigB,0,5);
   $subB = substr($bigB,6,5);
   $subC = substr($bigB,10,5);
   $subD = substr($smallS,0,5);
   $subE = substr($smallS,6,5);
   $subF = substr($smallS,10,5);
   $subG = substr($numberS,0,5);
   $subH = substr($numberS,6,5);
   $subI = substr($numberS,10,5);
   $RandCode1 = str_shuffle($subA.$subD.$subB.$subF.$subC.$subE);
   $RandCode2 = str_shuffle($RandCode1);
   $RandCode = $RandCode1.$RandCode2;
 if ($len>$min_lenght && $len<$max_lenght)
 {
   $CodeEX = substr($RandCode,0,$len);
 }
 else
 {
   $CodeEX = $RandCode;
 }
 return $CodeEX;
}*/
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>confirmgroom_page</title>
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
      font-family: "Cinzel";
      src: url('css/Cinzel-Bold.woff2') format('woff2'), url('css/Cinzel-Bold.woff') format('woff');
      font-weight: 700
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

    .v21 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps168 {
      position: relative;
      margin-top: 0
    }

    .s206 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c172 {
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

    .webp .c172 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps169 {
      position: relative;
      margin-top: -472px
    }

    .s207 {
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

    .c173 {
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

    .s208 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c174 {
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

    .ps170 {
      position: relative;
      margin-top: 26px
    }

    .v22 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s209 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto;
      height: 519px
    }

    .s210 {
      width: 770px;
      height: 519px;
      margin-left: 102px
    }

    .ps171 {
      position: relative;
      margin-left: 9px;
      margin-top: 9px
    }

    .s211 {
      min-width: 736px;
      width: 736px;
      min-height: 485px;
      height: 485px
    }

    .c175 {
      z-index: 4;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0
    }

    .c176 {
      position: absolute;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      opacity: 0.90;
      background-clip: padding-box;
      box-shadow: 8px 8px 18px -1px rgba(255, 255, 255, .71)
    }

    .s212 {
      width: 100%;
      height: 100%;
      box-sizing: border-box
    }

    .ps172 {
      position: relative;
      margin-left: 0;
      margin-top: 27px
    }

    .s213 {
      min-width: 736px;
      width: 736px;
      min-height: 47px
    }

    .c177 {
      z-index: 5;
      pointer-events: auto;
      overflow: hidden;
      height: 47px
    }

    .p10 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: center
    }

    .f41 {
      font-family: Cinzel;
      font-size: 25px;
      font-weight: 700;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      background-color: initial;
      line-height: 47px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps173 {
      position: relative;
      margin-left: 156px;
      margin-top: 27px
    }

    .s214 {
      min-width: 523px;
      width: 523px;
      min-height: 35px
    }

    .ps174 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s215 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c179 {
      z-index: 6;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .p11 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: left
    }

    .f42 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      background-color: initial;
      line-height: 26px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps175 {
      position: relative;
      margin-left: 15px;
      margin-top: 0
    }

    .s216 {
      min-width: 335px;
      width: 335px;
      min-height: 35px
    }

    .c180 {
      z-index: 7;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps176 {
      position: relative;
      margin-left: 156px;
      margin-top: 1px
    }

    .c181 {
      z-index: 11;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c182 {
      z-index: 14;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c183 {
      z-index: 9;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c184 {
      z-index: 17;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps177 {
      position: relative;
      margin-left: 156px;
      margin-top: 0
    }

    .s217 {
      min-width: 523px;
      width: 523px;
      min-height: 35px
    }

    .s218 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c185 {
      z-index: 15;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s219 {
      min-width: 335px;
      width: 335px;
      min-height: 35px
    }

    .c186 {
      z-index: 18;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps178 {
      position: relative;
      margin-left: 156px;
      margin-top: 1px
    }

    .s220 {
      min-width: 523px;
      width: 523px;
      min-height: 35px
    }

    .s221 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c187 {
      z-index: 10;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s222 {
      min-width: 335px;
      width: 335px;
      min-height: 35px
    }

    .c188 {
      z-index: 19;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c189 {
      z-index: 13;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c190 {
      z-index: 16;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps179 {
      position: relative;
      margin-left: 157px;
      margin-top: 18px
    }

    .s223 {
      min-width: 522px;
      width: 522px;
      min-height: 35px
    }

    .s224 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c191 {
      z-index: 20;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f43 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      font-weight: 700;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      background-color: initial;
      line-height: 26px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps180 {
      position: relative;
      margin-left: 14px;
      margin-top: 0
    }

    .c192 {
      z-index: 21;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f44 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 18px;
      font-weight: 700;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      background-color: initial;
      line-height: 29px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps181 {
      position: relative;
      margin-left: 153px;
      margin-top: 21px
    }

    .s225 {
      min-width: 447px;
      width: 447px;
      min-height: 40px
    }

    .s226 {
      min-width: 207px;
      width: 207px;
      min-height: 40px
    }

    .c193 {
      z-index: 8;
      pointer-events: auto
    }

    .f45 {
      font-family: "Helvetica Neue", sans-serif;
      font-size: 18px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      background-color: initial;
      line-height: 22px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: center;
      padding-top: 8px;
      padding-bottom: 8px;
      margin-top: 0;
      margin-bottom: 0
    }

    .btn22 {
      border: 1px solid #677a85;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #52646f;
      background-clip: padding-box;
      color: #fff
    }

    .btn22:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .btn22:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .v23 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s227 {
      width: 205px;
      padding-right: 0;
      height: auto;
    }

    .ps182 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .c194 {
      z-index: 22;
      pointer-events: auto
    }

    .btn23 {
      border: 1px dotted #020202;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #52646f;
      background-clip: padding-box;
      color: #fff
    }

    .btn23:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .btn23:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    @media (min-width:768px) and (max-width:959px) {
      .s206 {
        min-width: 768px;
        min-height: 378px
      }

      .ps169 {
        margin-top: -378px
      }

      .s207 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .s208 {
        min-width: 768px;
        min-height: 21px
      }

      .ps170 {
        margin-top: 19px
      }

      .s209 {
        min-width: 768px;
        width: 768px;
        height: 422px
      }

      .s210 {
        width: 623px;
        height: 422px;
        margin-left: 80px
      }

      .s211 {
        min-width: 589px;
        width: 589px;
        min-height: 388px;
        height: 388px
      }

      .ps172 {
        margin-top: 22px
      }

      .s213 {
        min-width: 589px;
        width: 589px;
        min-height: 37px
      }

      .c177 {
        height: 37px
      }

      .f41 {
        font-size: 20px;
        line-height: 37px
      }

      .ps173 {
        margin-left: 125px;
        margin-top: 22px
      }

      .s214 {
        min-width: 418px;
        width: 418px;
        min-height: 28px
      }

      .s215 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c179 {
        height: 28px
      }

      .f42 {
        font-size: 12px;
        line-height: 20px
      }

      .ps175 {
        margin-left: 12px
      }

      .s216 {
        min-width: 268px;
        width: 268px;
        min-height: 28px
      }

      .c180 {
        height: 28px
      }

      .ps176 {
        margin-left: 125px
      }

      .c181 {
        height: 28px
      }

      .c182 {
        height: 28px
      }

      .c183 {
        height: 28px
      }

      .c184 {
        height: 28px
      }

      .ps177 {
        margin-left: 125px
      }

      .s217 {
        min-width: 418px;
        width: 418px;
        min-height: 28px
      }

      .s218 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c185 {
        height: 28px
      }

      .s219 {
        min-width: 268px;
        width: 268px;
        min-height: 28px
      }

      .c186 {
        height: 28px
      }

      .ps178 {
        margin-left: 125px;
        margin-top: 0
      }

      .s220 {
        min-width: 418px;
        width: 418px;
        min-height: 28px
      }

      .s221 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c187 {
        height: 28px
      }

      .s222 {
        min-width: 268px;
        width: 268px;
        min-height: 28px
      }

      .c188 {
        height: 28px
      }

      .c189 {
        height: 28px
      }

      .c190 {
        height: 28px
      }

      .ps179 {
        margin-left: 125px;
        margin-top: 15px
      }

      .s223 {
        min-width: 418px;
        width: 418px;
        min-height: 28px
      }

      .s224 {
        min-width: 139px;
        width: 139px;
        min-height: 28px
      }

      .c191 {
        height: 28px
      }

      .f43 {
        font-size: 12px;
        line-height: 20px
      }

      .ps180 {
        margin-left: 11px
      }

      .c192 {
        height: 28px
      }

      .f44 {
        font-size: 14px;
        line-height: 23px
      }

      .ps181 {
        margin-left: 122px;
        margin-top: 16px
      }

      .s225 {
        min-width: 358px;
        width: 358px;
        min-height: 33px
      }

      .s226 {
        min-width: 166px;
        width: 166px;
        min-height: 33px
      }

      .f45 {
        font-size: 14px;
        line-height: 16px;
        padding-bottom: 7px
      }

      .s227 {
        width: 164px;
        height: 16px
      }

      .ps182 {
        margin-left: 26px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s206 {
        min-width: 480px;
        min-height: 236px
      }

      .ps169 {
        margin-top: -236px
      }

      .s207 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .s208 {
        min-width: 480px;
        min-height: 13px
      }

      .ps170 {
        margin-top: 9px
      }

      .s209 {
        min-width: 480px;
        width: 480px;
        height: 276px
      }

      .s210 {
        width: 402px;
        height: 276px;
        margin-left: 47px
      }

      .s211 {
        min-width: 368px;
        width: 368px;
        min-height: 242px;
        height: 242px
      }

      .ps172 {
        margin-top: 14px
      }

      .s213 {
        min-width: 368px;
        width: 368px;
        min-height: 23px
      }

      .c177 {
        height: 23px
      }

      .f41 {
        font-size: 12px;
        line-height: 22px
      }

      .ps173 {
        margin-left: 78px;
        margin-top: 14px
      }

      .s214 {
        min-width: 261px;
        width: 261px;
        min-height: 17px
      }

      .s215 {
        min-width: 86px;
        width: 86px;
        min-height: 17px
      }

      .c179 {
        height: 17px
      }

      .f42 {
        font-size: 7px;
        line-height: 11px
      }

      .ps175 {
        margin-left: 8px
      }

      .s216 {
        min-width: 167px;
        width: 167px;
        min-height: 17px
      }

      .c180 {
        height: 17px
      }

      .ps176 {
        margin-left: 78px
      }

      .c181 {
        height: 17px
      }

      .c182 {
        height: 17px
      }

      .c183 {
        height: 17px
      }

      .c184 {
        height: 17px
      }

      .ps177 {
        margin-left: 78px
      }

      .s217 {
        min-width: 261px;
        width: 261px;
        min-height: 18px
      }

      .s218 {
        min-width: 86px;
        width: 86px;
        min-height: 18px
      }

      .c185 {
        height: 18px
      }

      .s219 {
        min-width: 167px;
        width: 167px;
        min-height: 18px
      }

      .c186 {
        height: 18px
      }

      .ps178 {
        margin-left: 78px;
        margin-top: 0
      }

      .s220 {
        min-width: 261px;
        width: 261px;
        min-height: 17px
      }

      .s221 {
        min-width: 86px;
        width: 86px;
        min-height: 17px
      }

      .c187 {
        height: 17px
      }

      .s222 {
        min-width: 167px;
        width: 167px;
        min-height: 17px
      }

      .c188 {
        height: 17px
      }

      .c189 {
        height: 18px
      }

      .c190 {
        height: 18px
      }

      .ps179 {
        margin-left: 78px;
        margin-top: 9px
      }

      .s223 {
        min-width: 261px;
        width: 261px;
        min-height: 18px
      }

      .s224 {
        min-width: 87px;
        width: 87px;
        min-height: 18px
      }

      .c191 {
        height: 18px
      }

      .f43 {
        font-size: 7px;
        line-height: 11px
      }

      .ps180 {
        margin-left: 7px
      }

      .c192 {
        height: 18px
      }

      .f44 {
        font-size: 8px;
        line-height: 12px
      }

      .ps181 {
        margin-left: 76px;
        margin-top: 9px
      }

      .s225 {
        min-width: 224px;
        width: 224px;
        min-height: 22px
      }

      .s226 {
        min-width: 104px;
        width: 104px;
        min-height: 22px
      }

      .f45 {
        font-size: 8px;
        line-height: 10px;
        padding-top: 5px;
        padding-bottom: 5px
      }

      .s227 {
        width: 102px;
        height: 10px
      }

      .ps182 {
        margin-left: 16px
      }
    }

    @media (max-width:479px) {
      .s206 {
        min-width: 320px;
        min-height: 157px
      }

      .ps169 {
        margin-top: -157px
      }

      .s207 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .s208 {
        min-width: 320px;
        min-height: 9px
      }

      .ps170 {
        margin-top: 3px
      }

      .s209 {
        min-width: 320px;
        width: 320px;
        height: 195px
      }

      .s210 {
        width: 280px;
        height: 195px;
        margin-left: 28px
      }

      .s211 {
        min-width: 246px;
        width: 246px;
        min-height: 161px;
        height: 161px
      }

      .ps172 {
        margin-top: 9px
      }

      .s213 {
        min-width: 246px;
        width: 246px;
        min-height: 16px
      }

      .c177 {
        height: 16px
      }

      .f41 {
        font-size: 8px;
        line-height: 15px
      }

      .ps173 {
        margin-left: 52px;
        margin-top: 9px
      }

      .s214 {
        min-width: 174px;
        width: 174px;
        min-height: 11px
      }

      .s215 {
        min-width: 58px;
        width: 58px;
        min-height: 11px
      }

      .c179 {
        height: 11px
      }

      .f42 {
        font-size: 4px;
        line-height: 6px
      }

      .ps175 {
        margin-left: 5px
      }

      .s216 {
        min-width: 111px;
        width: 111px;
        min-height: 11px
      }

      .c180 {
        height: 11px
      }

      .ps176 {
        margin-left: 52px
      }

      .c181 {
        height: 11px
      }

      .c182 {
        height: 11px
      }

      .c183 {
        height: 11px
      }

      .c184 {
        height: 11px
      }

      .ps177 {
        margin-left: 52px
      }

      .s217 {
        min-width: 174px;
        width: 174px;
        min-height: 12px
      }

      .s218 {
        min-width: 58px;
        width: 58px;
        min-height: 12px
      }

      .c185 {
        height: 12px
      }

      .s219 {
        min-width: 111px;
        width: 111px;
        min-height: 12px
      }

      .c186 {
        height: 12px
      }

      .ps178 {
        margin-left: 52px;
        margin-top: 0
      }

      .s220 {
        min-width: 174px;
        width: 174px;
        min-height: 12px
      }

      .s221 {
        min-width: 58px;
        width: 58px;
        min-height: 12px
      }

      .c187 {
        height: 12px
      }

      .s222 {
        min-width: 111px;
        width: 111px;
        min-height: 12px
      }

      .c188 {
        height: 12px
      }

      .c189 {
        height: 12px
      }

      .c190 {
        height: 12px
      }

      .ps179 {
        margin-left: 52px;
        margin-top: 6px
      }

      .s223 {
        min-width: 174px;
        width: 174px;
        min-height: 12px
      }

      .s224 {
        min-width: 58px;
        width: 58px;
        min-height: 12px
      }

      .c191 {
        height: 12px
      }

      .f43 {
        font-size: 4px;
        line-height: 6px
      }

      .ps180 {
        margin-left: 5px
      }

      .c192 {
        height: 12px
      }

      .f44 {
        font-size: 5px;
        line-height: 7px
      }

      .ps181 {
        margin-left: 51px;
        margin-top: 5px
      }

      .s225 {
        min-width: 150px;
        width: 150px;
        min-height: 16px
      }

      .s226 {
        min-width: 70px;
        width: 70px;
        min-height: 16px
      }

      .f45 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 4px;
        padding-bottom: 4px
      }

      .s227 {
        width: 68px;
        height: 6px
      }

      .ps182 {
        margin-left: 10px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c172 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c172 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c172 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c172 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:320px) {
      .c172 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-480.webp)
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c172 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960.webp)
      }
    }

    @media (min-width:480px) {
      .c172 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-768.webp)
      }
    }

    @media (min-width:768px) {
      .c172 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-960-1.webp)
      }
    }

    @media (min-width:960px) {
      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1200px) {
      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1600px) {
      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c172 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c172 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 50; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 50%;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {top:-300px; opacity:0}
      to {top:0; opacity:1}
    }

    @keyframes animatetop {
      from {top:-300px; opacity:0}
      to {top:0; opacity:1}
    }

    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-header {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
      font-size: 34px;
    }

    .modal-body {
      padding: 2px 16px;
      font-size: 18px;
    }

    .modal-footer {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
      font-size: 24px;
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
  <link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.6c8feb.css" media="print">
  <!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.6c8feb-lteIE7.css" type="text/css">
<![endif]-->
  <!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.6c8feb-lteIE8.css" type="text/css">
<![endif]-->
  <!--[if gte IE 9]>
<link rel="stylesheet" href="css/site.6c8feb-gteIE9.css" type="text/css">
<![endif]-->
</head>

<body id="b">
  <div class="v21 ps168 s206 c172"></div>
  <div class="v21 ps169 s207 c173"></div>
  <div class="v21 ps168 s208 c174"></div>
  <div class="ps170 v22 s209">
    <div class="s210">
      <div class="v21 ps171 s211 c175">
        <div class="c176 s212">
        </div>
        <div class="v21 ps172 s213 c177">
          <p class="p10 f41">Please confirm details</p>
        </div>
        <div class="v21 ps173 s214 c178">
          <div class="v21 ps174 s215 c179">
            <p class="p11 f42">Owner&rsquo;s Name:</p>
          </div>
          <div class="v21 ps175 s216 c180">
            <!--p class="p11 f42">owner name</pi-->
<?php if(isset($_SESSION['username'])):?>
<p class="p11 f42"><?php echo $_SESSION['username'];?></p>
<?php else:?>
<p class="p11 f42">guest</p>
<?php endif;?>
          </div>
        </div>
        <div class="v21 ps176 s214 c178">
          <div class="v21 ps174 s215 c181">
            <p class="p11 f42">Email Address:</p>
          </div>
          <div class="v21 ps175 s216 c182">
            <!--p class="p11 f42">email address</p-->
<?php if(isset($_SESSION['username'])):?>
<p class="p11 f42"><?php echo $row[email];?></p>
<?php else:?>
<p class="p11 f42"></p>
<?php endif;?>
          </div>
        </div>
        <div class="v21 ps176 s214 c178">
          <div class="v21 ps174 s215 c183">
            <p class="p11 f42">Preferred Date</p>
          </div>
          <div class="v21 ps175 s216 c184">
            <!--p class="p11 f42">check in date and time</p-->
<p class="p11 f42"><?php echo $checkin_g;?></p>
          </div>
        </div>
        <div class="v21 ps177 s217 c178">
          <div class="v21 ps174 s218 c185">
            <p class="p11 f42">Preferred Time</p>
          </div>
          <div class="v21 ps175 s219 c186">
            <!--p class="p11 f42">check out date and time</p-->
<p class="p11 f42"><?php echo $checkin_tg;?></p>
          </div>
        </div>
        <div class="v21 ps178 s220 c178">
          <div class="v21 ps174 s221 c187">
            <p class="p11 f42">Pet Size:</p>
          </div>
          <div class="v21 ps175 s222 c188">
            <!--p class="p11 f42">medium</p-->
<p class="p11 f42"><?php echo $petsize;?></p>
          </div>
        </div>
        <div class="v21 ps177 s217 c178">
          <div class="v21 ps174 s218 c189">
            <p class="p11 f42">Pet Type:</p>
          </div>
          <div class="v21 ps175 s219 c190">
            <!--p class="p11 f42">dog</pi-->
<p class="p11 f42"><?php echo $p_type;?></p>
          </div>
        </div>
        <div class="v21 ps179 s223 c178">
          <div class="v21 ps174 s224 c191">
            <p class="p11 f43">Amount:</p>
          </div>
          <div class="v21 ps180 s219 c192">
            <!--p class="p11 f44">amount</p-->
<p class="p11 f44" align="left"><b><?php echo $est_amount;?></b></p>
          </div>
        </div>
        <div class="v21 ps181 s225 c178">
          <div class="v21 ps174 s226 c193">
            <a href="services.php" class="f45 btn22 v23 s227">&lt;&lt; Back</a>
          </div>
          <div class="v21 ps182 s226 c194">
            <a href="creditcard.php" class="f45 btn23 v23 s227">Checkout &gt;&gt;</a>
            <!--button onclick="myFunction()" id="myBtn" class="f45 btn23 v23 s227">Confirm Booking &gt;&gt;</button-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="v1 ps153 s149 c171"></div>

  <!-- The Modal -->
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Park City Pet Boarding</h2>
      </div>
      <div class="modal-body">
        <p>&nbsp;</p>
        <p>Your reservation is confirmed!!!</p>
        <p>&nbsp;</p>
        <p>Booking Reference: <?php echo $booking_num?></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>Please check your email for full details.</p>
        <p>&nbsp;</p>
      </div>
      <div class="modal-footer">
        <h3>Thank you!</h3>
      </div>
    </div>

  </div>
  <script>
    dpth = "/";
    ! function() {
      var s = ["js/jquery.c71cd4.js", "js/confirmgroom_page.6c8feb.js"],
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
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  //btn.onclick = function() {
  //  modal.style.display = "block";
  //}

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  document.location.href="/";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  </script>
</body>

</html>
