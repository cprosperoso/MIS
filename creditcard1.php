<?php
if (!session_id()) session_start();

$booking_num=rand_code(7);

$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$numroom = $_POST['numroom'];
$petsize = $_POST['petsize'];
$p_type = $_POST['p_type'];

$username = $_SESSION['username'];

//computation
$numOfDays = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);
switch (strtolower($petsize)){
case "small":
$est_amount = ($numroom*65 * $numOfDays);
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p";
break;
case "medium":
$est_amount = ($numroom*75 * $numOfDays);
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>";
break;
default:
$est_amount = ($numroom*85 * $numOfDays);
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>";
}

$db = new SQLite3('park_city.db');

$stmt = $db->prepare("SELECT email from users where username=:username");
$stmt->bindValue(':username',$username);
$result = $stmt->execute();
//$stmt->bind_result($email);
$row = $result->fetchArray();

function rand_code($len)
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
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>creditcard</title>
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

    .v25 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps203 {
      position: relative;
      margin-top: 0
    }

    .s245 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c207 {
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

    .webp .c207 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps204 {
      position: relative;
      margin-top: -472px
    }

    .s246 {
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

    .c208 {
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

    .s247 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c209 {
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

    .ps205 {
      position: relative;
      margin-top: 26px
    }

    .v26 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s248 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto;
      height: 519px
    }

    .s249 {
      width: 770px;
      height: 519px;
      margin-left: 102px
    }

    .ps206 {
      position: relative;
      margin-left: 9px;
      margin-top: 9px
    }

    .s250 {
      min-width: 736px;
      width: 736px;
      min-height: 485px;
      height: 485px
    }

    .c210 {
      z-index: 4;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0
    }

    .c211 {
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

    .s251 {
      width: 100%;
      height: 100%;
      box-sizing: border-box
    }

    .ps207 {
      position: relative;
      margin-left: 0;
      margin-top: 27px
    }

    .s252 {
      min-width: 736px;
      width: 736px;
      min-height: 47px
    }

    .c212 {
      z-index: 5;
      pointer-events: auto;
      overflow: hidden;
      height: 47px
    }

    .p14 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: center
    }

    .f53 {
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

    .ps208 {
      position: relative;
      margin-left: 155px;
      margin-top: 29px
    }

    .s253 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c213 {
      z-index: 6;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .p15 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: left
    }

    .f54 {
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

    .ps209 {
      position: relative;
      margin-left: 153px;
      margin-top: -1px
    }

    .s254 {
      min-width: 447px;
      width: 447px;
      min-height: 27px;
      height: 27px
    }

    .c214 {
      z-index: 7;
      pointer-events: auto
    }

    .input15 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 447px;
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

    .input15::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps210 {
      position: relative;
      margin-left: 155px;
      margin-top: 15px
    }

    .s255 {
      min-width: 460px;
      width: 460px;
      min-height: 35px
    }

    .ps211 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s256 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c216 {
      z-index: 9;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps212 {
      position: relative;
      margin-left: 2px;
      margin-top: 0
    }

    .s257 {
      min-width: 167px;
      width: 167px;
      min-height: 35px
    }

    .c217 {
      z-index: 11;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps213 {
      position: relative;
      margin-left: 5px;
      margin-top: 0
    }

    .s258 {
      min-width: 113px;
      width: 113px;
      min-height: 35px
    }

    .c218 {
      z-index: 12;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps214 {
      position: relative;
      margin-left: 158px;
      margin-top: 3px
    }

    .s259 {
      min-width: 442px;
      width: 442px;
      min-height: 53px
    }

    .s260 {
      min-width: 171px;
      width: 171px;
      min-height: 27px;
      height: 27px
    }

    .c219 {
      z-index: 13;
      pointer-events: auto
    }

    .input16 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 171px;
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

    .input16::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps215 {
      position: relative;
      margin-left: 2px;
      margin-top: 0
    }

    .s261 {
      min-width: 171px;
      width: 171px;
      min-height: 27px;
      height: 27px
    }

    .c220 {
      z-index: 14;
      pointer-events: auto
    }

    .input17 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 171px;
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

    .input17::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps216 {
      position: relative;
      margin-left: 1px;
      margin-top: 0
    }

    .s262 {
      min-width: 97px;
      width: 97px;
      min-height: 53px;
      height: 53px
    }

    .c221 {
      z-index: 15;
      pointer-events: auto
    }

    .input18 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 97px;
      height: 53px;
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

    .input18::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps217 {
      position: relative;
      margin-left: 155px;
      margin-top: 7px
    }

    .c222 {
      z-index: 16;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps218 {
      position: relative;
      margin-left: 153px;
      margin-top: 6px
    }

    .c223 {
      z-index: 17;
      pointer-events: auto
    }

    .input19 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 447px;
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

    .input19::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps219 {
      position: relative;
      margin-left: 153px;
      margin-top: 43px
    }

    .s263 {
      min-width: 447px;
      width: 447px;
      min-height: 40px
    }

    .s264 {
      min-width: 207px;
      width: 207px;
      min-height: 40px
    }

    .c224 {
      z-index: 8;
      pointer-events: auto
    }

    .f55 {
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

    .btn25 {
      border: 1px solid #677a85;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #52646f;
      background-clip: padding-box;
      color: #fff
    }

    .btn25:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .btn25:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .v27 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s265 {
      width: 205px;
      padding-right: 0;
      height: auto 
    }

    .ps220 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .c225 {
      z-index: 18;
      pointer-events: auto
    }

    .btn26 {
      border: 1px dotted #020202;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #52646f;
      background-clip: padding-box;
      color: #fff
    }

    .btn26:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .btn26:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    @media (min-width:768px) and (max-width:959px) {
      .s245 {
        min-width: 768px;
        min-height: 378px
      }

      .ps204 {
        margin-top: -378px
      }

      .s246 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .s247 {
        min-width: 768px;
        min-height: 21px
      }

      .ps205 {
        margin-top: 19px
      }

      .s248 {
        min-width: 768px;
        width: 768px;
        height: 422px
      }

      .s249 {
        width: 623px;
        height: 422px;
        margin-left: 80px
      }

      .s250 {
        min-width: 589px;
        width: 589px;
        min-height: 388px;
        height: 388px
      }

      .ps207 {
        margin-top: 22px
      }

      .s252 {
        min-width: 589px;
        width: 589px;
        min-height: 37px
      }

      .c212 {
        height: 37px
      }

      .f53 {
        font-size: 20px;
        line-height: 37px
      }

      .ps208 {
        margin-left: 124px;
        margin-top: 24px
      }

      .s253 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c213 {
        height: 28px
      }

      .f54 {
        font-size: 12px;
        line-height: 20px
      }

      .ps209 {
        margin-left: 122px
      }

      .s254 {
        min-width: 358px;
        width: 358px;
        min-height: 22px;
        height: 22px
      }

      .input15 {
        width: 358px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps210 {
        margin-left: 124px;
        margin-top: 11px
      }

      .s255 {
        min-width: 368px;
        width: 368px;
        min-height: 28px
      }

      .s256 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c216 {
        height: 28px
      }

      .s257 {
        min-width: 133px;
        width: 133px;
        min-height: 28px
      }

      .c217 {
        height: 28px
      }

      .ps213 {
        margin-left: 4px
      }

      .s258 {
        min-width: 91px;
        width: 91px;
        min-height: 28px
      }

      .c218 {
        height: 28px
      }

      .ps214 {
        margin-left: 126px
      }

      .s259 {
        min-width: 354px;
        width: 354px;
        min-height: 42px
      }

      .s260 {
        min-width: 137px;
        width: 137px;
        min-height: 22px;
        height: 22px
      }

      .input16 {
        width: 137px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps215 {
        margin-left: 1px
      }

      .s261 {
        min-width: 138px;
        width: 138px;
        min-height: 22px;
        height: 22px
      }

      .input17 {
        width: 138px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps216 {
        margin-left: 0
      }

      .s262 {
        min-width: 78px;
        width: 78px;
        min-height: 42px;
        height: 42px
      }

      .input18 {
        width: 78px;
        height: 42px;
        font-size: 9px;
        line-height: 11px
      }

      .ps217 {
        margin-left: 124px;
        margin-top: 6px
      }

      .c222 {
        height: 28px
      }

      .ps218 {
        margin-left: 122px;
        margin-top: 4px
      }

      .input19 {
        width: 358px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps219 {
        margin-left: 122px;
        margin-top: 34px
      }

      .s263 {
        min-width: 358px;
        width: 358px;
        min-height: 33px
      }

      .s264 {
        min-width: 166px;
        width: 166px;
        min-height: 33px
      }

      .f55 {
        font-size: 14px;
        line-height: 16px;
        padding-bottom: 7px
      }

      .s265 {
        width: 164px;
        height: 16px
      }

      .ps220 {
        margin-left: 26px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s245 {
        min-width: 480px;
        min-height: 236px
      }

      .ps204 {
        margin-top: -236px
      }

      .s246 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .s247 {
        min-width: 480px;
        min-height: 13px
      }

      .ps205 {
        margin-top: 9px
      }

      .s248 {
        min-width: 480px;
        width: 480px;
        height: 276px
      }

      .s249 {
        width: 402px;
        height: 276px;
        margin-left: 47px
      }

      .s250 {
        min-width: 368px;
        width: 368px;
        min-height: 242px;
        height: 242px
      }

      .ps207 {
        margin-top: 14px
      }

      .s252 {
        min-width: 368px;
        width: 368px;
        min-height: 23px
      }

      .c212 {
        height: 23px
      }

      .f53 {
        font-size: 12px;
        line-height: 22px
      }

      .ps208 {
        margin-left: 77px;
        margin-top: 15px
      }

      .s253 {
        min-width: 86px;
        width: 86px;
        min-height: 17px
      }

      .c213 {
        height: 17px
      }

      .f54 {
        font-size: 7px;
        line-height: 11px
      }

      .ps209 {
        margin-left: 76px
      }

      .s254 {
        min-width: 224px;
        width: 224px;
        min-height: 15px;
        height: 15px
      }

      .input15 {
        width: 224px;
        height: 15px;
        font-size: 5px;
        line-height: 6px
      }

      .ps210 {
        margin-left: 77px;
        margin-top: 6px
      }

      .s255 {
        min-width: 230px;
        width: 230px;
        min-height: 18px
      }

      .s256 {
        min-width: 86px;
        width: 86px;
        min-height: 18px
      }

      .c216 {
        height: 18px
      }

      .s257 {
        min-width: 83px;
        width: 83px;
        min-height: 18px
      }

      .c217 {
        height: 18px
      }

      .ps213 {
        margin-left: 2px
      }

      .s258 {
        min-width: 57px;
        width: 57px;
        min-height: 18px
      }

      .c218 {
        height: 18px
      }

      .ps214 {
        margin-left: 78px;
        margin-top: 1px
      }

      .s259 {
        min-width: 222px;
        width: 222px;
        min-height: 27px
      }

      .s260 {
        min-width: 86px;
        width: 86px;
        min-height: 15px;
        height: 15px
      }

      .input16 {
        width: 86px;
        height: 15px;
        font-size: 5px;
        line-height: 6px
      }

      .ps215 {
        margin-left: 0
      }

      .s261 {
        min-width: 87px;
        width: 87px;
        min-height: 15px;
        height: 15px
      }

      .input17 {
        width: 87px;
        height: 15px;
        font-size: 5px;
        line-height: 6px
      }

      .ps216 {
        margin-left: 0
      }

      .s262 {
        min-width: 49px;
        width: 49px;
        min-height: 27px;
        height: 27px
      }

      .input18 {
        width: 49px;
        height: 27px;
        font-size: 5px;
        line-height: 6px
      }

      .ps217 {
        margin-left: 77px;
        margin-top: 4px
      }

      .c222 {
        height: 17px
      }

      .ps218 {
        margin-left: 76px;
        margin-top: 2px
      }

      .input19 {
        width: 224px;
        height: 15px;
        font-size: 5px;
        line-height: 6px
      }

      .ps219 {
        margin-left: 76px;
        margin-top: 20px
      }

      .s263 {
        min-width: 224px;
        width: 224px;
        min-height: 22px
      }

      .s264 {
        min-width: 104px;
        width: 104px;
        min-height: 22px
      }

      .f55 {
        font-size: 8px;
        line-height: 10px;
        padding-top: 5px;
        padding-bottom: 5px
      }

      .s265 {
        width: 102px;
        height: 10px
      }

      .ps220 {
        margin-left: 16px
      }
    }

    @media (max-width:479px) {
      .s245 {
        min-width: 320px;
        min-height: 157px
      }

      .ps204 {
        margin-top: -157px
      }

      .s246 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .s247 {
        min-width: 320px;
        min-height: 9px
      }

      .ps205 {
        margin-top: 3px
      }

      .s248 {
        min-width: 320px;
        width: 320px;
        height: 195px
      }

      .s249 {
        width: 280px;
        height: 195px;
        margin-left: 28px
      }

      .s250 {
        min-width: 246px;
        width: 246px;
        min-height: 161px;
        height: 161px
      }

      .ps207 {
        margin-top: 9px
      }

      .s252 {
        min-width: 246px;
        width: 246px;
        min-height: 16px
      }

      .c212 {
        height: 16px
      }

      .f53 {
        font-size: 8px;
        line-height: 15px
      }

      .ps208 {
        margin-left: 52px;
        margin-top: 10px
      }

      .s253 {
        min-width: 57px;
        width: 57px;
        min-height: 11px
      }

      .c213 {
        height: 11px
      }

      .f54 {
        font-size: 4px;
        line-height: 6px
      }

      .ps209 {
        margin-left: 51px
      }

      .s254 {
        min-width: 150px;
        width: 150px;
        min-height: 11px;
        height: 11px
      }

      .input15 {
        width: 150px;
        height: 11px;
        font-size: 3px;
        line-height: 4px
      }

      .ps210 {
        margin-left: 52px;
        margin-top: 3px
      }

      .s255 {
        min-width: 153px;
        width: 153px;
        min-height: 12px
      }

      .s256 {
        min-width: 57px;
        width: 57px;
        min-height: 12px
      }

      .c216 {
        height: 12px
      }

      .ps212 {
        margin-left: 1px
      }

      .s257 {
        min-width: 56px;
        width: 56px;
        min-height: 12px
      }

      .c217 {
        height: 12px
      }

      .ps213 {
        margin-left: 1px
      }

      .s258 {
        min-width: 38px;
        width: 38px;
        min-height: 12px
      }

      .c218 {
        height: 12px
      }

      .ps214 {
        margin-left: 52px;
        margin-top: 1px
      }

      .s259 {
        min-width: 149px;
        width: 149px;
        min-height: 18px
      }

      .s260 {
        min-width: 58px;
        width: 58px;
        min-height: 10px;
        height: 10px
      }

      .input16 {
        width: 58px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps215 {
        margin-left: -1px
      }

      .s261 {
        min-width: 59px;
        width: 59px;
        min-height: 10px;
        height: 10px
      }

      .input17 {
        width: 59px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps216 {
        margin-left: -1px
      }

      .s262 {
        min-width: 34px;
        width: 34px;
        min-height: 18px;
        height: 18px
      }

      .input18 {
        width: 34px;
        height: 18px;
        font-size: 3px;
        line-height: 4px
      }

      .ps217 {
        margin-left: 52px;
        margin-top: 3px
      }

      .c222 {
        height: 11px
      }

      .ps218 {
        margin-left: 51px;
        margin-top: 1px
      }

      .input19 {
        width: 150px;
        height: 11px;
        font-size: 3px;
        line-height: 4px
      }

      .ps219 {
        margin-left: 51px;
        margin-top: 12px
      }

      .s263 {
        min-width: 150px;
        width: 150px;
        min-height: 16px
      }

      .s264 {
        min-width: 70px;
        width: 70px;
        min-height: 16px
      }

      .f55 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 4px;
        padding-bottom: 4px
      }

      .s265 {
        width: 68px;
        height: 6px
      }

      .ps220 {
        margin-left: 10px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c207 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c207 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c207 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c207 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:320px) {
      .c207 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-480.webp)
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c207 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960.webp)
      }
    }

    @media (min-width:480px) {
      .c207 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-768.webp)
      }
    }

    @media (min-width:768px) {
      .c207 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-960-1.webp)
      }
    }

    @media (min-width:960px) {
      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1200px) {
      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1600px) {
      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c207 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c207 {
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
  <link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.eb1fc6.css" media="print">
  <!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.eb1fc6-lteIE7.css" type="text/css">
<![endif]-->
  <!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.eb1fc6-lteIE8.css" type="text/css">
<![endif]-->
  <!--[if gte IE 9]>
<link rel="stylesheet" href="css/site.eb1fc6-gteIE9.css" type="text/css">
<![endif]-->
</head>

<body id="b">
  <div class="v25 ps203 s245 c207"></div>
  <div class="v25 ps204 s246 c208"></div>
  <div class="v25 ps203 s247 c209"></div>
  <div class="ps205 v26 s248">
    <div class="s249">
      <div class="v25 ps206 s250 c210">
        <div class="c211 s251">
        </div>
        <div class="v25 ps207 s252 c212">
          <p class="p14 f53">confirm booking</p>
        </div>
        <div class="v25 ps208 s253 c213">
          <p class="p15 f54">Card number*</p>
        </div>
        <div class="v25 ps209 s254 c214">
          <input type="text" name="text" class="input15">
        </div>
        <div class="v25 ps210 s255 c215">
          <div class="v25 ps211 s256 c216">
            <p class="p15 f54">Expiration Month*</p>
          </div>
          <div class="v25 ps212 s257 c217">
            <p class="p15 f54">Expiration Year*</p>
          </div>
          <div class="v25 ps213 s258 c218">
            <p class="p15 f54">Security Code*</p>
          </div>
        </div>
        <div class="v25 ps214 s259 c215">
          <div class="v25 ps211 s260 c219">
            <input type="text" name="text" class="input16">
          </div>
          <div class="v25 ps215 s261 c220">
            <input type="text" name="text" class="input17">
          </div>
          <div class="v25 ps216 s262 c221">
            <input type="text" name="text" class="input18">
          </div>
        </div>
        <div class="v25 ps217 s253 c222">
          <p class="p15 f54">Name on card*</p>
        </div>
        <div class="v25 ps218 s254 c223">
          <input type="text" name="text" class="input19">
        </div>
        <div class="v25 ps219 s263 c215">
          <div class="v25 ps211 s264 c224">
            <a href="services.php" class="f55 btn25 v27 s265">&lt;&lt; Back</a>
          </div>
          <div class="v25 ps220 s264 c225">
            <!--a href="./" id="myBtn" class="fA55 btn26 v27 s265">Confirm Booking &gt;&gt;</a-->
            <button onclick="myFunction()" id="myBtn" class="f55 btn26 v27 s265">Confirm Booking &lt;&lt;</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="v1 ps172 s158 c206"></div>
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
      var s = ["js/jquery.c71cd4.js", "js/creditcard.eb1fc6.js"],
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
  btn.onclick = function() {
    modal.style.display = "block";
  }

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
