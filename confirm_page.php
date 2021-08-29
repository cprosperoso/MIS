<?php
if (!session_id()) session_start();

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
$est_amount = ($numroom*60 * $numOfDays);
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p"; 
break;
case "medium": 
$est_amount = ($numroom*75 * $numOfDays);
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>"; 
break;
default: 
$est_amount = ($numroom*88 * $numOfDays);
//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>";
}

$db = new SQLite3('park_city.db');

$stmt = $db->prepare("SELECT email from users where username=:username");
$stmt->bindValue(':username',$username);
$result = $stmt->execute();
//$stmt->bind_result($email);
$row = $result->fetchArray();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>confirm_page</title>
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

    .v18 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps154 {
      position: relative;
      margin-top: 0
    }

    .s184 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c146 {
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

    .webp .c146 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps155 {
      position: relative;
      margin-top: -472px
    }

    .s185 {
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

    .c147 {
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

    .s186 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c148 {
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

    .ps156 {
      position: relative;
      margin-top: 26px
    }

    .v19 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s187 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto;
      height: 519px
    }

    .s188 {
      width: 770px;
      height: 519px;
      margin-left: 102px
    }

    .ps157 {
      position: relative;
      margin-left: 9px;
      margin-top: 9px
    }

    .s189 {
      min-width: 736px;
      width: 736px;
      min-height: 485px;
      height: 485px
    }

    .c149 {
      z-index: 4;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0
    }

    .c150 {
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

    .s190 {
      width: 100%;
      height: 100%;
      box-sizing: border-box
    }

    .ps158 {
      position: relative;
      margin-left: 0;
      margin-top: 27px
    }

    .s191 {
      min-width: 736px;
      width: 736px;
      min-height: 47px
    }

    .c151 {
      z-index: 5;
      pointer-events: auto;
      overflow: hidden;
      height: 47px
    }

    .p8 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: center
    }

    .f36 {
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

    .ps159 {
      position: relative;
      margin-left: 135px;
      margin-top: 20px
    }

    .s192 {
      min-width: 523px;
      width: 523px;
      min-height: 35px
    }

    .ps160 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s193 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c153 {
      z-index: 6;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .p9 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: left
    }

    .f37 {
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

    .ps161 {
      position: relative;
      margin-left: 15px;
      margin-top: 0
    }

    .s194 {
      min-width: 335px;
      width: 335px;
      min-height: 35px
    }

    .c154 {
      z-index: 7;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps162 {
      position: relative;
      margin-left: 135px;
      margin-top: 1px
    }

    .c155 {
      z-index: 12;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c156 {
      z-index: 16;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s195 {
      min-width: 523px;
      width: 523px;
      min-height: 35px
    }

    .s196 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c157 {
      z-index: 8;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s197 {
      min-width: 335px;
      width: 335px;
      min-height: 35px
    }

    .c158 {
      z-index: 19;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps163 {
      position: relative;
      margin-left: 135px;
      margin-top: 0
    }

    .c159 {
      z-index: 17;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c160 {
      z-index: 18;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c161 {
      z-index: 10;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c162 {
      z-index: 11;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s198 {
      min-width: 523px;
      width: 523px;
      min-height: 35px
    }

    .s199 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c163 {
      z-index: 20;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s200 {
      min-width: 335px;
      width: 335px;
      min-height: 35px
    }

    .c164 {
      z-index: 21;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c165 {
      z-index: 14;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c166 {
      z-index: 15;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps164 {
      position: relative;
      margin-left: 136px;
      margin-top: 18px
    }

    .s201 {
      min-width: 522px;
      width: 522px;
      min-height: 35px
    }

    .c167 {
      z-index: 22;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f38 {
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

    .ps165 {
      position: relative;
      margin-left: 14px;
      margin-top: 0
    }

    .c168 {
      z-index: 23;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f39 {
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

    .ps166 {
      position: relative;
      margin-left: 153px;
      margin-top: 28px
    }

    .s202 {
      min-width: 447px;
      width: 447px;
      min-height: 40px
    }

    .s203 {
      min-width: 207px;
      width: 207px;
      min-height: 40px
    }

    .c169 {
      z-index: 9;
      pointer-events: auto
    }

    .f40 {
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

    .btn20 {
      border: 1px solid #677a85;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #52646f;
      background-clip: padding-box;
      color: #fff
    }

    .btn20:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .btn20:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .v20 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s204 {
      width: 205px;
      padding-right: 0;
      height: 22px
    }

    .ps167 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .c170 {
      z-index: 24;
      pointer-events: auto
    }

    .btn21 {
      border: 1px dotted #020202;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #52646f;
      background-clip: padding-box;
      color: #fff
    }

    .btn21:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .btn21:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    @media (min-width:768px) and (max-width:959px) {
      .s184 {
        min-width: 768px;
        min-height: 378px
      }

      .ps155 {
        margin-top: -378px
      }

      .s185 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .s186 {
        min-width: 768px;
        min-height: 21px
      }

      .ps156 {
        margin-top: 19px
      }

      .s187 {
        min-width: 768px;
        width: 768px;
        height: 422px
      }

      .s188 {
        width: 623px;
        height: 422px;
        margin-left: 80px
      }

      .s189 {
        min-width: 589px;
        width: 589px;
        min-height: 388px;
        height: 388px
      }

      .ps158 {
        margin-top: 22px
      }

      .s191 {
        min-width: 589px;
        width: 589px;
        min-height: 37px
      }

      .c151 {
        height: 37px
      }

      .f36 {
        font-size: 20px;
        line-height: 37px
      }

      .ps159 {
        margin-left: 108px;
        margin-top: 16px
      }

      .s192 {
        min-width: 418px;
        width: 418px;
        min-height: 28px
      }

      .s193 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c153 {
        height: 28px
      }

      .f37 {
        font-size: 12px;
        line-height: 20px
      }

      .ps161 {
        margin-left: 12px
      }

      .s194 {
        min-width: 268px;
        width: 268px;
        min-height: 28px
      }

      .c154 {
        height: 28px
      }

      .ps162 {
        margin-left: 108px
      }

      .c155 {
        height: 28px
      }

      .c156 {
        height: 28px
      }

      .s195 {
        min-width: 418px;
        width: 418px;
        min-height: 28px
      }

      .s196 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c157 {
        height: 28px
      }

      .s197 {
        min-width: 268px;
        width: 268px;
        min-height: 28px
      }

      .c158 {
        height: 28px
      }

      .ps163 {
        margin-left: 108px
      }

      .c159 {
        height: 28px
      }

      .c160 {
        height: 28px
      }

      .c161 {
        height: 28px
      }

      .c162 {
        height: 28px
      }

      .s198 {
        min-width: 418px;
        width: 418px;
        min-height: 28px
      }

      .s199 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c163 {
        height: 28px
      }

      .s200 {
        min-width: 268px;
        width: 268px;
        min-height: 28px
      }

      .c164 {
        height: 28px
      }

      .c165 {
        height: 28px
      }

      .c166 {
        height: 28px
      }

      .ps164 {
        margin-left: 109px;
        margin-top: 14px
      }

      .s201 {
        min-width: 417px;
        width: 417px;
        min-height: 28px
      }

      .c167 {
        height: 28px
      }

      .f38 {
        font-size: 12px;
        line-height: 20px
      }

      .ps165 {
        margin-left: 11px
      }

      .c168 {
        height: 28px
      }

      .f39 {
        font-size: 14px;
        line-height: 23px
      }

      .ps166 {
        margin-left: 122px;
        margin-top: 23px
      }

      .s202 {
        min-width: 358px;
        width: 358px;
        min-height: 32px
      }

      .s203 {
        min-width: 166px;
        width: 166px;
        min-height: 32px
      }

      .f40 {
        font-size: 14px;
        line-height: 16px;
        padding-top: 7px;
        padding-bottom: 7px
      }

      .s204 {
        width: 164px;
        height: 16px
      }

      .ps167 {
        margin-left: 26px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s184 {
        min-width: 480px;
        min-height: 236px
      }

      .ps155 {
        margin-top: -236px
      }

      .s185 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .s186 {
        min-width: 480px;
        min-height: 13px
      }

      .ps156 {
        margin-top: 9px
      }

      .s187 {
        min-width: 480px;
        width: 480px;
        height: 276px
      }

      .s188 {
        width: 402px;
        height: 276px;
        margin-left: 47px
      }

      .s189 {
        min-width: 368px;
        width: 368px;
        min-height: 242px;
        height: 242px
      }

      .ps158 {
        margin-top: 14px
      }

      .s191 {
        min-width: 368px;
        width: 368px;
        min-height: 23px
      }

      .c151 {
        height: 23px
      }

      .f36 {
        font-size: 12px;
        line-height: 22px
      }

      .ps159 {
        margin-left: 67px;
        margin-top: 10px
      }

      .s192 {
        min-width: 261px;
        width: 261px;
        min-height: 17px
      }

      .s193 {
        min-width: 86px;
        width: 86px;
        min-height: 17px
      }

      .c153 {
        height: 17px
      }

      .f37 {
        font-size: 7px;
        line-height: 11px
      }

      .ps161 {
        margin-left: 8px
      }

      .s194 {
        min-width: 167px;
        width: 167px;
        min-height: 17px
      }

      .c154 {
        height: 17px
      }

      .ps162 {
        margin-left: 67px
      }

      .c155 {
        height: 17px
      }

      .c156 {
        height: 17px
      }

      .s195 {
        min-width: 261px;
        width: 261px;
        min-height: 18px
      }

      .s196 {
        min-width: 86px;
        width: 86px;
        min-height: 18px
      }

      .c157 {
        height: 18px
      }

      .s197 {
        min-width: 167px;
        width: 167px;
        min-height: 18px
      }

      .c158 {
        height: 18px
      }

      .ps163 {
        margin-left: 67px
      }

      .c159 {
        height: 17px
      }

      .c160 {
        height: 17px
      }

      .c161 {
        height: 18px
      }

      .c162 {
        height: 18px
      }

      .s198 {
        min-width: 261px;
        width: 261px;
        min-height: 17px
      }

      .s199 {
        min-width: 86px;
        width: 86px;
        min-height: 17px
      }

      .c163 {
        height: 17px
      }

      .s200 {
        min-width: 167px;
        width: 167px;
        min-height: 17px
      }

      .c164 {
        height: 17px
      }

      .c165 {
        height: 18px
      }

      .c166 {
        height: 18px
      }

      .ps164 {
        margin-left: 68px;
        margin-top: 8px
      }

      .s201 {
        min-width: 260px;
        width: 260px;
        min-height: 18px
      }

      .c167 {
        height: 18px
      }

      .f38 {
        font-size: 7px;
        line-height: 11px
      }

      .ps165 {
        margin-left: 7px
      }

      .c168 {
        height: 18px
      }

      .f39 {
        font-size: 8px;
        line-height: 12px
      }

      .ps166 {
        margin-left: 76px;
        margin-top: 14px
      }

      .s202 {
        min-width: 224px;
        width: 224px;
        min-height: 21px
      }

      .s203 {
        min-width: 104px;
        width: 104px;
        min-height: 21px
      }

      .f40 {
        font-size: 8px;
        line-height: 10px;
        padding-top: 5px;
        padding-bottom: 4px
      }

      .s204 {
        width: 102px;
        height: 10px
      }

      .ps167 {
        margin-left: 16px
      }
    }

    @media (max-width:479px) {
      .s184 {
        min-width: 320px;
        min-height: 157px
      }

      .ps155 {
        margin-top: -157px
      }

      .s185 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .s186 {
        min-width: 320px;
        min-height: 9px
      }

      .ps156 {
        margin-top: 3px
      }

      .s187 {
        min-width: 320px;
        width: 320px;
        height: 195px
      }

      .s188 {
        width: 280px;
        height: 195px;
        margin-left: 28px
      }

      .s189 {
        min-width: 246px;
        width: 246px;
        min-height: 161px;
        height: 161px
      }

      .ps158 {
        margin-top: 9px
      }

      .s191 {
        min-width: 246px;
        width: 246px;
        min-height: 16px
      }

      .c151 {
        height: 16px
      }

      .f36 {
        font-size: 8px;
        line-height: 15px
      }

      .ps159 {
        margin-left: 45px;
        margin-top: 6px
      }

      .s192 {
        min-width: 174px;
        width: 174px;
        min-height: 12px
      }

      .s193 {
        min-width: 57px;
        width: 57px;
        min-height: 12px
      }

      .c153 {
        height: 12px
      }

      .f37 {
        font-size: 4px;
        line-height: 6px
      }

      .ps161 {
        margin-left: 6px
      }

      .s194 {
        min-width: 111px;
        width: 111px;
        min-height: 12px
      }

      .c154 {
        height: 12px
      }

      .ps162 {
        margin-left: 45px;
        margin-top: 0
      }

      .c155 {
        height: 12px
      }

      .c156 {
        height: 12px
      }

      .s195 {
        min-width: 174px;
        width: 174px;
        min-height: 12px
      }

      .s196 {
        min-width: 57px;
        width: 57px;
        min-height: 12px
      }

      .c157 {
        height: 12px
      }

      .s197 {
        min-width: 111px;
        width: 111px;
        min-height: 12px
      }

      .c158 {
        height: 12px
      }

      .ps163 {
        margin-left: 45px
      }

      .c159 {
        height: 12px
      }

      .c160 {
        height: 12px
      }

      .c161 {
        height: 12px
      }

      .c162 {
        height: 12px
      }

      .s198 {
        min-width: 174px;
        width: 174px;
        min-height: 11px
      }

      .s199 {
        min-width: 57px;
        width: 57px;
        min-height: 11px
      }

      .c163 {
        height: 11px
      }

      .s200 {
        min-width: 111px;
        width: 111px;
        min-height: 11px
      }

      .c164 {
        height: 11px
      }

      .c165 {
        height: 12px
      }

      .c166 {
        height: 12px
      }

      .ps164 {
        margin-left: 46px;
        margin-top: 5px
      }

      .s201 {
        min-width: 173px;
        width: 173px;
        min-height: 12px
      }

      .c167 {
        height: 12px
      }

      .f38 {
        font-size: 4px;
        line-height: 6px
      }

      .ps165 {
        margin-left: 5px
      }

      .c168 {
        height: 12px
      }

      .f39 {
        font-size: 5px;
        line-height: 7px
      }

      .ps166 {
        margin-left: 51px;
        margin-top: 9px
      }

      .s202 {
        min-width: 150px;
        width: 150px;
        min-height: 15px
      }

      .s203 {
        min-width: 70px;
        width: 70px;
        min-height: 15px
      }

      .f40 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 4px;
        padding-bottom: 3px
      }

      .s204 {
        width: 68px;
        height: 6px
      }

      .ps167 {
        margin-left: 10px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c146 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c146 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c146 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c146 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:320px) {
      .c146 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-480.webp)
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c146 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960.webp)
      }
    }

    @media (min-width:480px) {
      .c146 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-768.webp)
      }
    }

    @media (min-width:768px) {
      .c146 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-960-1.webp)
      }
    }

    @media (min-width:960px) {
      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1200px) {
      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1600px) {
      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c146 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c146 {
        background-image: url(images/parkcityhome-981.webp)
      }
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
  <link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.41ad0b.css" media="print">
  <!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.41ad0b-lteIE7.css" type="text/css">
<![endif]-->
  <!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.41ad0b-lteIE8.css" type="text/css">
<![endif]-->
  <!--[if gte IE 9]>
<link rel="stylesheet" href="css/site.41ad0b-gteIE9.css" type="text/css">
<![endif]-->
</head>

<body id="b">
  <div class="v18 ps154 s184 c146"></div>
  <div class="v18 ps155 s185 c147"></div>
  <div class="v18 ps154 s186 c148"></div>
  <div class="ps156 v19 s187">
    <div class="s188">
      <div class="v18 ps157 s189 c149">
        <div class="c150 s190">
        </div>
        <div class="v18 ps158 s191 c151">
          <p class="p8 f36">Please confirm details</p>
        </div>
        <div class="v18 ps159 s192 c152">
          <div class="v18 ps160 s193 c153">
            <p class="p9 f37">Owner&rsquo;s Name:</p>
          </div>
          <div class="v18 ps161 s194 c154">
            <!--p class="p9 f37">owner name</p-->
<?php if(isset($_SESSION['username'])):?>
<p class="p9 f37"><?php echo $_SESSION['username'];?></p>
<?php else:?>
<p class="p9 f37">guest</p>
<?php endif;?>
          </div>
        </div>
        <div class="v18 ps162 s192 c152">
          <div class="v18 ps160 s193 c155">
            <p class="p9 f37">Email Address:</p>
          </div>
          <div class="v18 ps161 s194 c156">
            <!--p class="p9 f37">email address</p-->
<?php if(isset($_SESSION['username'])):?>
<p class="p9 f37"><?php echo $row[email];?></p>
<?php else:?>
<p class="p9 f37"></p>
<?php endif;?>
          </div>
        </div>
        <div class="v18 ps162 s195 c152">
          <div class="v18 ps160 s196 c157">
            <p class="p9 f37">Check In Date &amp; Time:</p>
          </div>
          <div class="v18 ps161 s197 c158">
<p class="p9 f37"><?php echo $checkin;?></p>
          </div>
        </div>
        <div class="v18 ps163 s192 c152">
          <div class="v18 ps160 s193 c159">
            <p class="p9 f37">Check Out Date &amp; Time:</p>
          </div>
          <div class="v18 ps161 s194 c160">
            <!--p class="p9 f37">check out date and time</p-->
<p class="p9 f37"><?php echo $checkout;?></p>
          </div>
        </div>
        <div class="v18 ps163 s195 c152">
          <div class="v18 ps160 s196 c161">
            <p class="p9 f37">Number of Rooms:</p>
          </div>
          <div class="v18 ps161 s197 c162">
            <!--p class="p9 f37">1</p-->
<p class="p9 f37"><?php echo $numroom;?></p>
          </div>
        </div>
        <div class="v18 ps163 s198 c152">
          <div class="v18 ps160 s199 c163">
            <p class="p9 f37">Pet Size:</p>
          </div>
          <div class="v18 ps161 s200 c164">
            <!--p class="p9 f37">medium</p-->
<p class="p9 f37"><?php echo $petsize;?></p>
          </div>
        </div>
        <div class="v18 ps163 s195 c152">
          <div class="v18 ps160 s196 c165">
            <p class="p9 f37">Pet Type:</p>
          </div>
          <div class="v18 ps161 s197 c166">
            <!--p class="p9 f37">dog</p-->
<p class="p9 f37"><?php echo $p_type;?></p>
          </div>
        </div>
        <div class="v18 ps164 s201 c152">
          <div class="v18 ps160 s196 c167">
            <p class="p9 f38">Amount:</p>
          </div>
          <div class="v18 ps165 s197 c168">
            <!--p class="p8 f39">$est_amount</p-->
<p class="p9 f37" align="left"><b><?php echo $est_amount;?> Baht</b></p>
          </div>
        </div>
        <div class="v18 ps166 s202 c152">
          <div class="v18 ps160 s203 c169">
            <a href="services.php" class="f40 btn20 v20 s204">&lt;&lt; Back</a>
          </div>
          <div class="v18 ps167 s203 c170">
            <a href="./" class="f40 btn21 v20 s204">Confirm Booking &gt;&gt;</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="v1 ps153 s149 c145"></div>
  <script>
    dpth = "/";
    ! function() {
      var s = ["js/jquery.c71cd4.js", "js/confirm_page.41ad0b.js"],
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
</body>

</html>
