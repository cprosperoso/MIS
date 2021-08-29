<?php
if (!session_id()) session_start();
unset($_SESSION['error']);

$username = $_SESSION['username'];
//$email = $_POST['email'];

$db = new SQLite3('park_city.db');

$stmt = $db->prepare("SELECT email from users where username=:username");
$stmt->bindValue(':username',$username);
$result = $stmt->execute();
$row = $result->fetchArray();
$stmt->close();
$db->close();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>HOME</title>
  <meta name="referrer" content="same-origin">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <style>
    .anim {
      visibility: hidden
    }
  </style>
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

    @font-face {
      font-display: block;
      font-family: "EB Garamond";
      src: url('css/EBGaramond-Regular.woff2') format('woff2'), url('css/EBGaramond-Regular.woff') format('woff');
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

    @-webkit-keyframes fadeInRight {
      from {
        opacity: 0;
        -webkit-transform: translate3d(100%, 0, 0)
      }

      to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0)
      }
    }

    @keyframes fadeInRight {
      from {
        opacity: 0;
        transform: translate3d(100%, 0, 0)
      }

      to {
        opacity: 1;
        transform: translate3d(0, 0, 0)
      }
    }

    .fadeInRight {
      -webkit-animation-name: fadeInRight;
      animation-name: fadeInRight
    }

    .animated {
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both
    }

    .animated.infinite {
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite
    }

    #b {
      background: #020202 url(images/dark_mosaic.png) repeat center top
    }

    .v5 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps28 {
      position: relative;
      margin-top: 0
    }

    .s36 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c21 {
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

    .webp .c21 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps29 {
      position: relative;
      margin-top: -472px
    }

    .s37 {
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

    .c22 {
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

    .ps30 {
      position: relative;
      margin-top: -328px
    }

    .v6 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s38 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s39 {
      width: 489px;
      margin-left: 246px
    }

    .v7 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top;
      visibility: hidden;
      pointer-events: auto
    }

    .ps31 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s40 {
      min-width: 489px;
      width: 489px;
      min-height: 363px
    }

    .c23 {
      z-index: 2147483646;
      pointer-events: auto;
      border: 0;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      background: #fff url(images/pic-07-785.jpg) repeat center top;
      background-clip: padding-box
    }

    .ps32 {
      position: relative;
      margin-top: -35px
    }

    .s41 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c24 {
      z-index: 9999;
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

    .s42 {
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s43 {
      width: 753px;
      margin-left: 100px
    }

    .s44 {
      min-width: 753px;
      width: 753px;
      min-height: 27px
    }

    .s45 {
      min-width: 120px;
      width: 120px;
      min-height: 27px
    }

    .c26 {
      z-index: 7;
      pointer-events: auto
    }

    .f11 {
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

    .btn3 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn3:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn3:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .v8 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s46 {
      width: 120px;
      padding-right: 0;
      height: 19px
    }

    .ps33 {
      position: relative;
      margin-left: 41px;
      margin-top: 0
    }

    .c27 {
      z-index: 18;
      pointer-events: auto
    }

    .btn4 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn4:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn4:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps34 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .s47 {
      min-width: 132px;
      width: 132px;
      min-height: 27px
    }

    .c28 {
      z-index: 19;
      pointer-events: auto
    }

    .btn5 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn5:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn5:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .s48 {
      width: 132px;
      padding-right: 0;
      height: 19px
    }

    .ps35 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .c29 {
      z-index: 20;
      pointer-events: auto
    }

    .btn6 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn6:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn6:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps36 {
      position: relative;
      margin-left: 34px;
      margin-top: 0
    }

    .c30 {
      z-index: 21;
      pointer-events: auto
    }

    .btn7 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn7:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn7:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps37 {
      position: relative;
      margin-top: 12px
    }

    .s49 {
      width: 919px;
      margin-left: 20px
    }

    .ps38 {
      position: relative;
      margin-left: 101px;
      margin-top: 0
    }

    .s50 {
      min-width: 732px;
      width: 732px;
      min-height: 43px
    }

    .c31 {
      z-index: 1;
      border: 0;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      background-color: #ddedf7;
      background-clip: padding-box
    }

    .ps39 {
      position: relative;
      margin-left: 96px;
      margin-top: 8px
    }

    .s51 {
      min-width: 530px;
      width: 530px;
      min-height: 33px
    }

    .ps40 {
      position: relative;
      margin-left: 0;
      margin-top: 1px
    }

    .s52 {
      min-width: 113px;
      width: 113px;
      min-height: 32px
    }

    .c32 {
      z-index: 59;
      pointer-events: auto;
      overflow: hidden;
      height: 32px
    }

    .p4 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: left
    }

    .f12 {
      font-family: "Bruno Ace";
      font-size: 15px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      background-color: initial;
      line-height: 25px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps41 {
      position: relative;
      margin-left: 9px;
      margin-top: 0
    }

    .s53 {
      min-width: 285px;
      width: 285px;
      min-height: 27px;
      height: 27px
    }

    .c33 {
      z-index: 70;
      pointer-events: auto
    }

    .input3 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 285px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #000000;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input3::placeholder {
      color: rgb(169, 169, 169)
    }

    .v9 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top;
      overflow: hidden;
      outline: 0
    }

    .ps42 {
      position: relative;
      margin-left: 11px;
      margin-top: 1px
    }

    .s54 {
      //width: 112px;
      padding-right: 0;
      height: 25px
    }

    .f13 {
      font-family: "Bruno Ace";
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
      padding-top: 6px;
      padding-bottom: 5px;
      margin-top: 0;
      margin-bottom: 0
    }

    .c34 {
      z-index: 71;
      pointer-events: auto;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #b8c8d2;
      background-clip: padding-box;
      color: #020202
    }

    .c34:hover {
      background-color: #82939e;
      border-color: #020202;
      color: #020202
    }

    .c34:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .ps43 {
      position: relative;
      margin-left: 0;
      margin-top: 17px
    }

    .s55 {
      min-width: 919px;
      width: 919px;
      min-height: 42px
    }

    .ps44 {
      position: relative;
      margin-left: 0;
      margin-top: 2px
    }

    .s56 {
      min-width: 326px;
      width: 326px;
      min-height: 32px;
      height: 32px
    }

    .c35 {
      z-index: 46;
      border: 2px solid #fff;
      -webkit-border-radius: 18px;
      -moz-border-radius: 18px;
      border-radius: 18px
    }

    .fx1 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx1 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps45 {
      position: relative;
      margin-left: 151px;
      margin-top: -38px
    }

    .s57 {
      min-width: 615px;
      width: 615px;
      min-height: 42px
    }

    .w2 {
      line-height: 0
    }

    .ps46 {
      position: relative;
      margin-left: 191px;
      margin-top: 0
    }

    .s58 {
      min-width: 234px;
      width: 234px;
      min-height: 42px
    }

    .ps47 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s59 {
      min-width: 50px;
      width: 50px;
      min-height: 41px;
      height: 41px
    }

    .c36 {
      z-index: 45;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px
    }

    .fx2 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx2 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps48 {
      position: relative;
      margin-left: 11px;
      margin-top: 3px
    }

    .s60 {
      min-width: 111px;
      width: 111px;
      min-height: 32px;
      height: 32px
    }

    .c37 {
      z-index: 47;
      border: 2px solid #fff;
      -webkit-border-radius: 18px;
      -moz-border-radius: 18px;
      border-radius: 18px
    }

    .fx3 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx3 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps49 {
      position: relative;
      margin-left: 11px;
      margin-top: 1px
    }

    .s61 {
      min-width: 47px;
      width: 47px;
      min-height: 41px;
      height: 41px
    }

    .c38 {
      z-index: 43;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px
    }

    .fx4 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx4 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps50 {
      position: relative;
      margin-left: 0;
      margin-top: -31px
    }

    .s62 {
      min-width: 615px;
      width: 615px;
      min-height: 25px
    }

    .c39 {
      z-index: 60;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .p5 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: center
    }

    .f14 {
      font-family: "Bruno Ace";
      font-size: 18px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      background-color: initial;
      line-height: 22px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps51 {
      position: relative;
      margin-left: 589px;
      margin-top: -39px
    }

    .c40 {
      z-index: 48;
      border: 2px solid #fff;
      -webkit-border-radius: 18px;
      -moz-border-radius: 18px;
      border-radius: 18px
    }

    .fx5 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx5 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps52 {
      position: relative;
      margin-left: 3px;
      margin-top: 9px
    }

    .s63 {
      min-width: 914px;
      width: 914px;
      min-height: 42px
    }

    .ps53 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .c41 {
      z-index: 72;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px
    }

    .fx6 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx6 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps54 {
      position: relative;
      margin-left: 11px;
      margin-top: 3px
    }

    .c42 {
      z-index: 51;
      border: 2px solid #fff;
      -webkit-border-radius: 18px;
      -moz-border-radius: 18px;
      border-radius: 18px
    }

    .fx7 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx7 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps55 {
      position: relative;
      margin-left: 8px;
      margin-top: 0
    }

    .c43 {
      z-index: 44;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px
    }

    .fx8 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx8 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps56 {
      position: relative;
      margin-left: 9px;
      margin-top: 1px
    }

    .c44 {
      z-index: 57;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px
    }

    .fx9 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx9 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps57 {
      position: relative;
      margin-left: 9px;
      margin-top: 3px
    }

    .s64 {
      min-width: 386px;
      width: 386px;
      min-height: 36px
    }

    .ps58 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s65 {
      min-width: 382px;
      width: 382px;
      min-height: 32px;
      height: 32px
    }

    .c45 {
      z-index: 50;
      border: 2px solid #fff;
      -webkit-border-radius: 18px;
      -moz-border-radius: 18px;
      border-radius: 18px
    }

    .fx10 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx10 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps59 {
      position: relative;
      margin-left: 29px;
      margin-top: -30px
    }

    .s66 {
      min-width: 330px;
      width: 330px;
      min-height: 25px
    }

    .c46 {
      z-index: 58;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .ps60 {
      position: relative;
      margin-left: 5px;
      margin-top: 0
    }

    .c47 {
      z-index: 73;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px
    }

    .fx11 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx11 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps61 {
      position: relative;
      margin-left: 7px;
      margin-top: 3px
    }

    .c48 {
      z-index: 54;
      border: 2px solid #fff;
      -webkit-border-radius: 18px;
      -moz-border-radius: 18px;
      border-radius: 18px
    }

    .fx12 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx12 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps62 {
      position: relative;
      margin-left: 8px;
      margin-top: 1px
    }

    .c49 {
      z-index: 58;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px
    }

    .fx13 {
      background-attachment: fixed;
      background-image: url(images/background-320.jpeg);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx13 {
      background-image: url(images/background-320.webp);
      background-attachment: fixed
    }

    .ps63 {
      position: relative;
      margin-top: 27px
    }

    .s67 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c50 {
      z-index: 5;
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

    .ps64 {
      position: relative;
      margin-left: 0;
      margin-top: -27px
    }

    .s68 {
      min-width: 960px;
      width: 960px;
      min-height: 1px
    }

    .ps65 {
      position: relative;
      margin-top: -25px
    }

    .s69 {
      width: 941px;
      margin-left: 0
    }

    .ps66 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s70 {
      min-width: 941px;
      width: 941px;
      min-height: 25px
    }

    .c51 {
      z-index: 40;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .f15 {
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

    .ps67 {
      position: relative;
      margin-left: 201px;
      margin-top: 36px
    }

    .s71 {
      min-width: 677px;
      width: 677px;
      min-height: 154px
    }

    .s72 {
      min-width: 204px;
      width: 204px;
      min-height: 154px
    }

    .ps68 {
      position: relative;
      margin-left: 23px;
      margin-top: 0
    }

    .s73 {
      min-width: 150px;
      width: 150px;
      min-height: 150px;
      height: 150px
    }

    .c52 {
      z-index: 22;
      border: 2px solid #fff;
      -webkit-border-radius: 77px;
      -moz-border-radius: 77px;
      border-radius: 77px
    }

    .fx14 {
      background-attachment: fixed;
      background-image: url(images/pic-13-320.png);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx14 {
      background-image: url(images/pic-13-320.webp);
      background-attachment: fixed
    }

    .ps69 {
      position: relative;
      margin-left: 0;
      margin-top: -128px
    }

    .s74 {
      min-width: 204px;
      width: 204px;
      min-height: 102px
    }

    .c53 {
      z-index: 23;
      pointer-events: auto;
      overflow: hidden;
      height: 102px
    }

    .f16 {
      font-family: "Bruno Ace";
      font-size: 20px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: rgba(255, 255, 255, .71);
      background-color: initial;
      line-height: 29px;
      letter-spacing: normal;
      text-shadow: none
    }

    .f17 {
      font-family: "Bruno Ace";
      font-size: 30px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: rgba(255, 255, 255, .71);
      background-color: initial;
      line-height: 43px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps70 {
      position: relative;
      margin-left: -23px;
      margin-top: 0
    }

    .s75 {
      min-width: 492px;
      width: 492px;
      min-height: 150px;
      height: 150px
    }

    .c54 {
      z-index: 4;
      border: 2px solid #fff;
      -webkit-border-radius: 77px;
      -moz-border-radius: 77px;
      border-radius: 77px
    }

    .fx15 {
      background-attachment: fixed;
      background-image: url(images/pic-13-320.png);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx15 {
      background-image: url(images/pic-13-320.webp);
      background-attachment: fixed
    }

    .ps71 {
      position: relative;
      margin-left: 4px;
      margin-top: 3px
    }

    .s76 {
      min-width: 454px;
      width: 454px;
      min-height: 144px
    }

    .s77 {
      min-width: 144px;
      width: 144px;
      min-height: 144px
    }

    .c55 {
      z-index: 13;
      pointer-events: auto
    }

    .f18 {
      font-family: "Bruno Ace";
      font-size: 30px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      background-color: initial;
      line-height: 37px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: center;
      padding-top: 52px;
      padding-bottom: 51px;
      margin-top: 0;
      margin-bottom: 0
    }

    .btn8 {
      border: 2px solid rgba(255, 255, 255, .71);
      -webkit-border-radius: 72px;
      -moz-border-radius: 72px;
      border-radius: 72px;
      background-color: transparent;
      background-clip: padding-box;
      color: transparent
    }

    .btn8:hover {
      background-color: transparent;
      border-color: rgba(240, 130, 184, .78);
      color: rgba(255, 255, 255, .71)
    }

    .btn8:active {
      background-color: rgba(211, 51, 130, .45);
      border-color: rgba(255, 255, 255, .71);
      color: #fff
    }

    .s78 {
      width: 140px;
      padding-right: 0;
      height: 37px
    }

    .ps72 {
      position: relative;
      margin-left: 47px;
      margin-top: -97px
    }

    .s79 {
      min-width: 50px;
      width: 50px;
      min-height: 50px
    }

    .c56 {
      z-index: 10;
      pointer-events: auto
    }

    .s80 {
      width: 50px;
      padding-right: 0;
      height: 50px
    }

    .f19 {
      font-family: "Bruno Ace";
      font-size: 30px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      background-color: initial;
      line-height: 37px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      text-align: center;
      padding-top: 0;
      padding-bottom: 0;
      margin-top: 0;
      margin-bottom: 0
    }

    .c57 {
      border: 0;
      -webkit-border-radius: 25px;
      -moz-border-radius: 25px;
      border-radius: 25px;
      background-color: rgba(255, 255, 255, .15);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(255, 255, 255, .15);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(255, 255, 255, .15);
      background-clip: padding-box;
      color: transparent
    }

    .c57:hover {
      background-color: transparent;
      border-color: rgba(240, 130, 184, .78);
      color: rgba(255, 255, 255, .71)
    }

    .c57:active {
      background-color: rgba(211, 51, 130, .45);
      border-color: rgba(255, 255, 255, .71);
      color: #fff
    }

    .ps74 {
      position: relative;
      margin-left: 18px;
      margin-top: 38px
    }

    .s81 {
      min-width: 292px;
      width: 292px;
      min-height: 68px
    }

    .c58 {
      z-index: 13;
      pointer-events: auto;
      overflow: hidden;
      height: 68px
    }

    .f20 {
      font-family: "Bruno Ace";
      font-size: 30px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: rgba(255, 255, 255, .71);
      background-color: initial;
      line-height: 51px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps75 {
      position: relative;
      margin-left: 151px;
      margin-top: 9px
    }

    .s82 {
      min-width: 648px;
      width: 648px;
      min-height: 154px
    }

    .ps76 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s83 {
      min-width: 154px;
      width: 154px;
      min-height: 154px
    }

    .c59 {
      z-index: 14;
      border: 0;
      -webkit-border-radius: 77px;
      -moz-border-radius: 77px;
      border-radius: 77px;
      background-color: #228ad2;
      background-clip: padding-box
    }

    .ps77 {
      position: relative;
      margin-left: 2px;
      margin-top: 2px
    }

    .c60 {
      z-index: 15;
      border: 0;
      -webkit-border-radius: 75px;
      -moz-border-radius: 75px;
      border-radius: 75px
    }

    .fx16 {
      background-attachment: fixed;
      background-image: url(images/pic-13-320.png);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx16 {
      background-image: url(images/pic-13-320.webp);
      background-attachment: fixed
    }

    .ps78 {
      position: relative;
      margin-left: 2px;
      margin-top: 0
    }

    .s84 {
      min-width: 332px;
      width: 332px;
      min-height: 150px;
      height: 150px
    }

    .c61 {
      z-index: 6;
      border: 2px solid #fff;
      -webkit-border-radius: 77px;
      -moz-border-radius: 77px;
      border-radius: 77px
    }

    .fx17 {
      background-attachment: fixed;
      background-image: url(images/pic-13-320.png);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx17 {
      background-image: url(images/pic-13-320.webp);
      background-attachment: fixed
    }

    .ps79 {
      position: relative;
      margin-left: 2px;
      margin-top: 0
    }

    .s85 {
      min-width: 154px;
      width: 154px;
      min-height: 154px
    }

    .c62 {
      z-index: 11;
      border: 0;
      -webkit-border-radius: 77px;
      -moz-border-radius: 77px;
      border-radius: 77px;
      background-color: #c56695;
      background-clip: padding-box
    }

    .ps80 {
      position: relative;
      margin-left: 2px;
      margin-top: 2px
    }

    .c63 {
      z-index: 12;
      border: 0;
      -webkit-border-radius: 75px;
      -moz-border-radius: 75px;
      border-radius: 75px
    }

    .fx18 {
      background-attachment: fixed;
      background-image: url(images/pic-13-320.png);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx18 {
      background-image: url(images/pic-13-320.webp);
      background-attachment: fixed
    }

    .ps81 {
      position: relative;
      margin-left: 91px;
      margin-top: 10px
    }

    .s86 {
      min-width: 624px;
      width: 624px;
      min-height: 150px;
      height: 150px
    }

    .c64 {
      z-index: 8;
      border: 2px solid #fff;
      -webkit-border-radius: 77px;
      -moz-border-radius: 77px;
      border-radius: 77px
    }

    .fx19 {
      background-attachment: fixed;
      background-image: url(images/pic-13-320.png);
      background-color: #b8c8d2;
      background-repeat: no-repeat;
      background-position: 50% 50%;
      background-size: cover;
      background-clip: padding-box
    }

    .webp .fx19 {
      background-image: url(images/pic-13-320.webp);
      background-attachment: fixed
    }

    .ps82 {
      position: relative;
      margin-left: 0;
      margin-top: -27px
    }

    .ps83 {
      position: relative;
      margin-left: 0;
      margin-top: -27px
    }

    .ps84 {
      position: relative;
      margin-left: 0;
      margin-top: -27px
    }

    .ps85 {
      position: relative;
      margin-top: 46px
    }

    .s87 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto;
      height: 251px
    }

    .s88 {
      width: 722px;
      height: 251px;
      margin-left: 156px
    }

    .s89 {
      min-width: 722px;
      width: 722px;
      min-height: 251px
    }

    .s90 {
      min-width: 295px;
      width: 295px;
      min-height: 251px
    }

    .c65 {
      z-index: 29;
      pointer-events: auto
    }

    .map1 {
      width: 295px;
      height: 251px
    }

    .ps86 {
      position: relative;
      margin-left: 18px;
      margin-top: 0
    }

    .s91 {
      min-width: 409px;
      width: 409px;
      min-height: 251px;
      height: 251px
    }

    .c66 {
      z-index: 31;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #b8c8d2;
      background-clip: padding-box
    }

    .ps87 {
      position: relative;
      margin-left: 21px;
      margin-top: 20px
    }

    .s92 {
      min-width: 372px;
      width: 372px;
      min-height: 27px
    }

    .s93 {
      min-width: 89px;
      width: 89px;
      min-height: 25px
    }

    .c67 {
      z-index: 33;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .f21 {
      font-family: "Bruno Ace";
      font-size: 10px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      background-color: initial;
      line-height: 17px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps88 {
      position: relative;
      margin-left: 14px;
      margin-top: 0
    }

    .s94 {
      min-width: 269px;
      width: 269px;
      min-height: 27px;
      height: 27px
    }

    .c68 {
      z-index: 34;
      pointer-events: auto
    }

    .input4 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 269px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #000000;;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input4::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps89 {
      position: relative;
      margin-left: 21px;
      margin-top: 6px
    }

    .s95 {
      min-width: 372px;
      width: 372px;
      min-height: 27px
    }

    .s96 {
      min-width: 89px;
      width: 89px;
      min-height: 25px
    }

    .c69 {
      z-index: 35;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .s97 {
      min-width: 269px;
      width: 269px;
      min-height: 27px;
      height: 27px
    }

    .c70 {
      z-index: 36;
      pointer-events: auto
    }

    .input5 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 269px;
      height: 27px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #000000;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input5::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps90 {
      position: relative;
      margin-left: 21px;
      margin-top: 7px
    }

    .s98 {
      min-width: 372px;
      width: 372px;
      min-height: 113px
    }

    .c71 {
      z-index: 37;
      pointer-events: auto;
      overflow: hidden;
      height: 25px
    }

    .s99 {
      min-width: 269px;
      width: 269px;
      min-height: 113px;
      height: 113px
    }

    .c72 {
      z-index: 38;
      pointer-events: auto
    }

    .input6 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 269px;
      height: 113px;
      font-family: "Helvetica Neue", sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #000000;
      line-height: 14px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input6::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps91 {
      position: relative;
      margin-left: 124px;
      margin-top: 11px
    }

    .s100 {
      width: 267px;
      padding-right: 0;
      height: 21px
    }

    .f22 {
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
      width: 267px;
    }

    .c73 {
      z-index: 39;
      pointer-events: auto;
      border-top: 1px solid #677a85;
      border-right: 1px solid #677a85;
      border-bottom: 1px solid #677a85;
      border-left: 1px solid #677a85;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
      background-color: #b8c8d2;
      background-clip: padding-box;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .40);
      color: #020202
    }

    .c73:hover {
      background-color: #82939e;
      border-color: #f30707;
      color: #f30707
    }

    .c73:active {
      background-color: #52646f;
      border-color: #f30707;
      color: #fff
    }

    @media (min-width:768px) and (max-width:959px) {
      .s36 {
        min-width: 768px;
        min-height: 378px
      }

      .ps29 {
        margin-top: -378px
      }

      .s37 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .ps30 {
        margin-top: -263px
      }

      .s38 {
        min-width: 768px;
        width: 768px
      }

      .s39 {
        width: 391px;
        margin-left: 197px
      }

      .s40 {
        min-width: 391px;
        width: 391px;
        min-height: 291px
      }

      .ps32 {
        margin-top: -28px
      }

      .s41 {
        min-width: 768px;
        min-height: 21px
      }

      .s42 {
        min-width: 768px;
        width: 768px
      }

      .s43 {
        width: 602px;
        margin-left: 80px
      }

      .s44 {
        min-width: 602px;
        width: 602px;
        min-height: 21px
      }

      .s45 {
        min-width: 96px;
        width: 96px;
        min-height: 21px
      }

      .f11 {
        font-size: 12px;
        line-height: 14px;
        padding-bottom: 3px
      }

      .s46 {
        width: 96px;
        height: 14px
      }

      .ps33 {
        margin-left: 33px
      }

      .ps34 {
        margin-left: 26px
      }

      .s47 {
        min-width: 106px;
        width: 106px;
        min-height: 21px
      }

      .s48 {
        width: 106px;
        height: 14px
      }

      .ps35 {
        margin-left: 26px
      }

      .ps36 {
        margin-left: 27px
      }

      .ps37 {
        margin-top: 9px
      }

      .s49 {
        width: 753px;
        margin-left: 0
      }

      .ps38 {
        margin-left: 97px
      }

      .s50 {
        min-width: 585px;
        width: 585px;
        min-height: 35px
      }

      .ps39 {
        margin-left: 77px;
        margin-top: 6px
      }

      .s51 {
        min-width: 424px;
        width: 424px;
        min-height: 27px
      }

      .s52 {
        min-width: 90px;
        width: 90px;
        min-height: 26px
      }

      .c32 {
        height: 26px
      }

      .f12 {
        font-size: 12px;
        line-height: 20px
      }

      .ps41 {
        margin-left: 7px
      }

      .s53 {
        min-width: 228px;
        width: 228px;
        min-height: 22px;
        height: 22px
      }

      .input3 {
        width: 228px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps42 {
        margin-left: 9px
      }

      .s54 {
        width: 90px;
        height: 20px
      }

      .f13 {
        font-size: 9px;
        line-height: 11px;
        padding-top: 5px;
        padding-bottom: 4px
      }

      .ps43 {
        margin-top: 228px
      }

      .s55 {
        min-width: 753px;
        width: 753px;
        min-height: 421px
      }

      .ps44 {
        margin-left: 69px;
        margin-top: 130px
      }

      .s56 {
        min-width: 499px;
        width: 499px;
        min-height: 120px;
        height: 120px
      }

      .c35 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps45 {
        margin-left: -572px;
        margin-top: 0
      }

      .s57 {
        min-width: 753px;
        width: 753px;
        min-height: 421px
      }

      .ps46 {
        margin-left: 69px
      }

      .s58 {
        min-width: 565px;
        width: 565px;
        min-height: 254px
      }

      .ps47 {
        margin-left: 445px
      }

      .s59 {
        min-width: 120px;
        width: 120px;
        min-height: 120px;
        height: 120px
      }

      .c36 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps48 {
        margin-left: 0;
        margin-top: 10px
      }

      .s60 {
        min-width: 499px;
        width: 499px;
        min-height: 120px;
        height: 120px
      }

      .c37 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps49 {
        margin-left: 50px;
        margin-top: -254px
      }

      .s61 {
        min-width: 120px;
        width: 120px;
        min-height: 120px;
        height: 120px
      }

      .c38 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps50 {
        margin-top: 147px
      }

      .s62 {
        min-width: 753px;
        width: 753px;
        min-height: 20px
      }

      .c39 {
        height: 20px
      }

      .f14 {
        font-size: 14px;
        line-height: 17px
      }

      .ps51 {
        margin-left: 69px;
        margin-top: -291px
      }

      .c40 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps52 {
        margin-left: 0;
        margin-top: -421px
      }

      .s63 {
        min-width: 753px;
        width: 753px;
        min-height: 421px
      }

      .ps53 {
        margin-left: 514px
      }

      .c41 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps54 {
        margin-left: 69px;
        margin-top: 10px
      }

      .c42 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps55 {
        margin-left: -453px;
        margin-top: -120px
      }

      .c43 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps56 {
        margin-left: -120px;
        margin-top: -120px
      }

      .c44 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps57 {
        margin-left: 0;
        margin-top: -124px
      }

      .s64 {
        min-width: 753px;
        width: 753px;
        min-height: 291px
      }

      .ps58 {
        margin-left: 69px
      }

      .s65 {
        min-width: 499px;
        width: 499px;
        min-height: 120px;
        height: 120px
      }

      .c45 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps59 {
        margin-left: 0;
        margin-top: 147px
      }

      .s66 {
        min-width: 753px;
        width: 753px;
        min-height: 20px
      }

      .c46 {
        height: 20px
      }

      .ps60 {
        margin-left: 514px;
        margin-top: -421px
      }

      .c47 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps61 {
        margin-left: 69px;
        margin-top: -291px
      }

      .c48 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps62 {
        margin-left: -453px;
        margin-top: -421px
      }

      .c49 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps63 {
        margin-top: -371px
      }

      .s67 {
        min-width: 768px;
        min-height: 22px
      }

      .ps64 {
        margin-top: -578px
      }

      .s68 {
        min-width: 768px;
        width: 768px
      }

      .ps65 {
        margin-top: -553px
      }

      .s69 {
        width: 753px
      }

      .ps66 {
        margin-top: 533px
      }

      .s70 {
        min-width: 753px;
        width: 753px;
        min-height: 20px
      }

      .c51 {
        height: 20px
      }

      .f15 {
        font-size: 14px;
        line-height: 17px
      }

      .ps67 {
        margin-left: 158px;
        margin-top: -553px
      }

      .s71 {
        min-width: 542px;
        width: 542px;
        min-height: 124px
      }

      .s72 {
        min-width: 163px;
        width: 163px;
        min-height: 124px
      }

      .ps68 {
        margin-left: 18px
      }

      .s73 {
        min-width: 120px;
        width: 120px;
        min-height: 120px;
        height: 120px
      }

      .c52 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps69 {
        margin-top: -103px
      }

      .s74 {
        min-width: 163px;
        width: 163px;
        min-height: 82px
      }

      .c53 {
        height: 82px
      }

      .f16 {
        font-size: 16px;
        line-height: 23px
      }

      .f17 {
        font-size: 24px;
        line-height: 34px
      }

      .ps70 {
        margin-left: -19px
      }

      .s75 {
        min-width: 394px;
        width: 394px;
        min-height: 120px;
        height: 120px
      }

      .c54 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps71 {
        margin-left: 3px;
        margin-top: 2px
      }

      .s76 {
        min-width: 363px;
        width: 363px;
        min-height: 116px
      }

      .s77 {
        min-width: 116px;
        width: 116px;
        min-height: 116px
      }

      .f18 {
        font-size: 24px;
        line-height: 29px;
        padding-top: 42px;
        padding-bottom: 41px
      }

      .btn8 {
        -webkit-border-radius: 58px;
        -moz-border-radius: 58px;
        border-radius: 58px
      }

      .s78 {
        width: 112px;
        height: 29px
      }

      .ps72 {
        margin-left: 38px;
        margin-top: -78px
      }

      .s79 {
        min-width: 40px;
        width: 40px;
        min-height: 40px
      }

      .s80 {
        width: 40px;
        height: 40px
      }

      .f19 {
        font-size: 24px;
        line-height: 29px
      }

      .c57 {
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px
      }

      .ps74 {
        margin-left: 14px;
        margin-top: 31px
      }

      .s81 {
        min-width: 233px;
        width: 233px;
        min-height: 54px
      }

      .c58 {
        height: 54px
      }

      .f20 {
        font-size: 24px;
        line-height: 40px
      }

      .ps75 {
        margin-left: 118px;
        margin-top: -423px
      }

      .s82 {
        min-width: 518px;
        width: 518px;
        min-height: 124px
      }

      .ps76 {
        margin-top: 1px
      }

      .s83 {
        min-width: 123px;
        width: 123px;
        min-height: 123px
      }

      .c59 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps77 {
        margin-left: 1px;
        margin-top: 1px
      }

      .c60 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps78 {
        margin-left: 1px
      }

      .s84 {
        min-width: 266px;
        width: 266px;
        min-height: 120px;
        height: 120px
      }

      .c61 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps79 {
        margin-left: 1px;
        margin-top: 1px
      }

      .s85 {
        min-width: 123px;
        width: 123px;
        min-height: 123px
      }

      .c62 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps80 {
        margin-left: 1px;
        margin-top: 1px
      }

      .c63 {
        -webkit-border-radius: 60px;
        -moz-border-radius: 60px;
        border-radius: 60px
      }

      .ps81 {
        margin-left: 69px;
        margin-top: -291px
      }

      .s86 {
        min-width: 499px;
        width: 499px;
        min-height: 120px;
        height: 120px
      }

      .c64 {
        -webkit-border-radius: 62px;
        -moz-border-radius: 62px;
        border-radius: 62px
      }

      .ps82 {
        margin-top: -78px
      }

      .ps83 {
        margin-top: -424px
      }

      .ps84 {
        margin-top: -48px
      }

      .ps85 {
        margin-top: -189px
      }

      .s87 {
        min-width: 768px;
        width: 768px;
        height: 201px
      }

      .s88 {
        width: 577px;
        height: 201px;
        margin-left: 125px
      }

      .s89 {
        min-width: 577px;
        width: 577px;
        min-height: 201px
      }

      .s90 {
        min-width: 236px;
        width: 236px;
        min-height: 201px
      }

      .map1 {
        width: 236px;
        height: 201px
      }

      .ps86 {
        margin-left: 14px
      }

      .s91 {
        min-width: 327px;
        width: 327px;
        min-height: 201px;
        height: 201px
      }

      .ps87 {
        margin-left: 17px;
        margin-top: 16px
      }

      .s92 {
        min-width: 298px;
        width: 298px;
        min-height: 22px
      }

      .s93 {
        min-width: 71px;
        width: 71px;
        min-height: 20px
      }

      .c67 {
        height: 20px
      }

      .f21 {
        font-size: 8px;
        line-height: 14px
      }

      .ps88 {
        margin-left: 11px
      }

      .s94 {
        min-width: 216px;
        width: 216px;
        min-height: 22px;
        height: 22px
      }

      .input4 {
        width: 216px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps89 {
        margin-left: 17px;
        margin-top: 4px
      }

      .s95 {
        min-width: 298px;
        width: 298px;
        min-height: 22px
      }

      .s96 {
        min-width: 71px;
        width: 71px;
        min-height: 20px
      }

      .c69 {
        height: 20px
      }

      .s97 {
        min-width: 216px;
        width: 216px;
        min-height: 22px;
        height: 22px
      }

      .input5 {
        width: 216px;
        height: 22px;
        font-size: 9px;
        line-height: 11px
      }

      .ps90 {
        margin-left: 17px;
        margin-top: 5px
      }

      .s98 {
        min-width: 298px;
        width: 298px;
        min-height: 91px
      }

      .c71 {
        height: 20px
      }

      .s99 {
        min-width: 216px;
        width: 216px;
        min-height: 91px;
        height: 91px
      }

      .input6 {
        width: 216px;
        height: 91px;
        font-size: 9px;
        line-height: 11px
      }

      .ps91 {
        margin-left: 99px;
        margin-top: 8px
      }

      .s100 {
        width: 214px;
        height: 17px
      }

      .f22 {
        font-size: 9px;
        line-height: 11px;
        padding-top: 3px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s36 {
        min-width: 480px;
        min-height: 236px
      }

      .ps29 {
        margin-top: -236px
      }

      .s37 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .ps30 {
        margin-top: -164px
      }

      .s38 {
        min-width: 480px;
        width: 480px
      }

      .s39 {
        width: 245px;
        margin-left: 123px
      }

      .s40 {
        min-width: 245px;
        width: 245px;
        min-height: 182px
      }

      .ps32 {
        margin-top: -18px
      }

      .s41 {
        min-width: 480px;
        min-height: 13px
      }

      .s42 {
        min-width: 480px;
        width: 480px
      }

      .s43 {
        width: 376px;
        margin-left: 50px
      }

      .s44 {
        min-width: 376px;
        width: 376px;
        min-height: 13px
      }

      .s45 {
        min-width: 60px;
        width: 60px;
        min-height: 13px
      }

      .f11 {
        font-size: 7px;
        line-height: 9px;
        padding-top: 2px;
        padding-bottom: 2px
      }

      .s46 {
        width: 60px;
        height: 9px
      }

      .ps33 {
        margin-left: 21px
      }

      .ps34 {
        margin-left: 16px
      }

      .s47 {
        min-width: 66px;
        width: 66px;
        min-height: 13px
      }

      .s48 {
        width: 66px;
        height: 9px
      }

      .ps35 {
        margin-left: 17px
      }

      .ps36 {
        margin-left: 16px
      }

      .ps37 {
        margin-top: 5px
      }

      .s49 {
        width: 471px;
        margin-left: 0
      }

      .ps38 {
        margin-left: 61px
      }

      .s50 {
        min-width: 365px;
        width: 365px;
        min-height: 22px
      }

      .ps39 {
        margin-left: 48px;
        margin-top: 4px
      }

      .s51 {
        min-width: 265px;
        width: 265px;
        min-height: 17px
      }

      .s52 {
        min-width: 56px;
        width: 56px;
        min-height: 16px
      }

      .c32 {
        height: 16px
      }

      .f12 {
        font-size: 7px;
        line-height: 11px
      }

      .ps41 {
        margin-left: 4px
      }

      .s53 {
        min-width: 143px;
        width: 143px;
        min-height: 14px;
        height: 14px
      }

      .input3 {
        width: 143px;
        height: 14px;
        font-size: 5px;
        line-height: 6px
      }

      .ps42 {
        margin-left: 6px
      }

      .s54 {
        width: 56px;
        height: 12px
      }

      .f13 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 3px;
        padding-bottom: 3px
      }

      .ps43 {
        margin-top: 475px
      }

      .s55 {
        min-width: 471px;
        width: 471px;
        min-height: 1197px
      }

      .ps44 {
        margin-left: 43px;
        margin-top: 79px
      }

      .s56 {
        min-width: 312px;
        width: 312px;
        min-height: 75px;
        height: 75px
      }

      .c35 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps45 {
        margin-left: -359px;
        margin-top: 0
      }

      .s57 {
        min-width: 471px;
        width: 471px;
        min-height: 1197px
      }

      .ps46 {
        margin-left: 43px
      }

      .s58 {
        min-width: 353px;
        width: 353px;
        min-height: 158px
      }

      .ps47 {
        margin-left: 278px
      }

      .s59 {
        min-width: 75px;
        width: 75px;
        min-height: 75px;
        height: 75px
      }

      .c36 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps48 {
        margin-left: 0;
        margin-top: 4px
      }

      .s60 {
        min-width: 312px;
        width: 312px;
        min-height: 75px;
        height: 75px
      }

      .c37 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps49 {
        margin-left: 32px;
        margin-top: -158px
      }

      .s61 {
        min-width: 75px;
        width: 75px;
        min-height: 75px;
        height: 75px
      }

      .c38 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps50 {
        margin-top: 1027px
      }

      .s62 {
        min-width: 471px;
        width: 471px;
        min-height: 12px
      }

      .c39 {
        height: 12px
      }

      .f14 {
        font-size: 9px;
        line-height: 11px
      }

      .ps51 {
        margin-left: 43px;
        margin-top: -1118px
      }

      .c40 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps52 {
        margin-left: 0;
        margin-top: -1197px
      }

      .s63 {
        min-width: 471px;
        width: 471px;
        min-height: 1197px
      }

      .ps53 {
        margin-left: 321px
      }

      .c41 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps54 {
        margin-left: 43px;
        margin-top: 4px
      }

      .c42 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps55 {
        margin-left: -284px;
        margin-top: -75px
      }

      .c43 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps56 {
        margin-left: -75px;
        margin-top: -75px
      }

      .c44 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps57 {
        margin-left: 0;
        margin-top: -79px
      }

      .s64 {
        min-width: 471px;
        width: 471px;
        min-height: 1118px
      }

      .ps58 {
        margin-left: 43px
      }

      .s65 {
        min-width: 312px;
        width: 312px;
        min-height: 75px;
        height: 75px
      }

      .c45 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps59 {
        margin-left: 0;
        margin-top: 1027px
      }

      .s66 {
        min-width: 471px;
        width: 471px;
        min-height: 12px
      }

      .c46 {
        height: 12px
      }

      .ps60 {
        margin-left: 321px;
        margin-top: -1197px
      }

      .c47 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps61 {
        margin-left: 43px;
        margin-top: -1118px
      }

      .c48 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps62 {
        margin-left: -284px;
        margin-top: -1197px
      }

      .c49 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps63 {
        margin-top: -1167px
      }

      .s67 {
        min-width: 480px;
        min-height: 14px
      }

      .ps64 {
        margin-top: -1627px
      }

      .s68 {
        min-width: 480px;
        width: 480px
      }

      .ps65 {
        margin-top: -1281px
      }

      .s69 {
        width: 471px
      }

      .ps66 {
        margin-top: 1269px
      }

      .s70 {
        min-width: 471px;
        width: 471px;
        min-height: 12px
      }

      .c51 {
        height: 12px
      }

      .f15 {
        font-size: 9px;
        line-height: 11px
      }

      .ps67 {
        margin-left: 99px;
        margin-top: -1281px
      }

      .s71 {
        min-width: 340px;
        width: 340px;
        min-height: 79px
      }

      .s72 {
        min-width: 102px;
        width: 102px;
        min-height: 79px
      }

      .ps68 {
        margin-left: 10px
      }

      .s73 {
        min-width: 75px;
        width: 75px;
        min-height: 75px;
        height: 75px
      }

      .c52 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps69 {
        margin-top: -65px
      }

      .s74 {
        min-width: 102px;
        width: 102px;
        min-height: 51px
      }

      .c53 {
        height: 51px
      }

      .f16 {
        font-size: 9px;
        line-height: 13px
      }

      .f17 {
        font-size: 15px;
        line-height: 22px
      }

      .ps70 {
        margin-left: -12px
      }

      .s75 {
        min-width: 246px;
        width: 246px;
        min-height: 75px;
        height: 75px
      }

      .c54 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps71 {
        margin-left: 1px;
        margin-top: 1px
      }

      .s76 {
        min-width: 227px;
        width: 227px;
        min-height: 74px
      }

      .s77 {
        min-width: 73px;
        width: 73px;
        min-height: 74px
      }

      .f18 {
        font-size: 15px;
        line-height: 18px;
        padding-top: 26px;
        padding-bottom: 26px
      }

      .btn8 {
        -webkit-border-radius: 37px;
        -moz-border-radius: 37px;
        border-radius: 37px
      }

      .s78 {
        width: 69px;
        height: 18px
      }

      .ps72 {
        margin-left: 24px;
        margin-top: -50px
      }

      .s79 {
        min-width: 24px;
        width: 24px;
        min-height: 26px
      }

      .s80 {
        width: 24px;
        height: 26px
      }

      .f19 {
        font-size: 15px;
        line-height: 18px
      }

      .c57 {
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border-radius: 12px
      }

      .ps74 {
        margin-left: 8px;
        margin-top: 20px
      }

      .s81 {
        min-width: 146px;
        width: 146px;
        min-height: 34px
      }

      .c58 {
        height: 34px
      }

      .f20 {
        font-size: 15px;
        line-height: 25px
      }

      .ps75 {
        margin-left: 74px;
        margin-top: -1199px
      }

      .s82 {
        min-width: 324px;
        width: 324px;
        min-height: 79px
      }

      .ps76 {
        margin-top: 1px
      }

      .s83 {
        min-width: 76px;
        width: 76px;
        min-height: 76px
      }

      .c59 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps77 {
        margin-left: 1px;
        margin-top: 1px
      }

      .c60 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps78 {
        margin-left: 1px
      }

      .s84 {
        min-width: 165px;
        width: 165px;
        min-height: 75px;
        height: 75px
      }

      .c61 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps79 {
        margin-left: 1px;
        margin-top: 1px
      }

      .s85 {
        min-width: 77px;
        width: 77px;
        min-height: 76px
      }

      .c62 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps80 {
        margin-left: 0;
        margin-top: 1px
      }

      .c63 {
        -webkit-border-radius: 38px;
        -moz-border-radius: 38px;
        border-radius: 38px
      }

      .ps81 {
        margin-left: 43px;
        margin-top: -1118px
      }

      .s86 {
        min-width: 312px;
        width: 312px;
        min-height: 75px;
        height: 75px
      }

      .c64 {
        -webkit-border-radius: 40px;
        -moz-border-radius: 40px;
        border-radius: 40px
      }

      .ps82 {
        margin-top: -1315px
      }

      .ps83 {
        margin-top: -1532px
      }

      .ps84 {
        margin-top: -2199px
      }

      .ps85 {
        margin-top: -2287px
      }

      .s87 {
        min-width: 480px;
        width: 480px;
        height: 126px
      }

      .s88 {
        width: 361px;
        height: 126px;
        margin-left: 78px
      }

      .s89 {
        min-width: 361px;
        width: 361px;
        min-height: 126px
      }

      .s90 {
        min-width: 148px;
        width: 148px;
        min-height: 126px
      }

      .map1 {
        width: 148px;
        height: 126px
      }

      .ps86 {
        margin-left: 8px
      }

      .s91 {
        min-width: 205px;
        width: 205px;
        min-height: 126px;
        height: 126px
      }

      .ps87 {
        margin-left: 11px;
        margin-top: 10px
      }

      .s92 {
        min-width: 187px;
        width: 187px;
        min-height: 14px
      }

      .s93 {
        min-width: 44px;
        width: 44px;
        min-height: 12px
      }

      .c67 {
        height: 12px
      }

      .f21 {
        font-size: 5px;
        line-height: 9px
      }

      .ps88 {
        margin-left: 7px
      }

      .s94 {
        min-width: 136px;
        width: 136px;
        min-height: 14px;
        height: 14px
      }

      .input4 {
        width: 136px;
        height: 14px;
        font-size: 5px;
        line-height: 6px
      }

      .ps89 {
        margin-left: 11px;
        margin-top: 2px
      }

      .s95 {
        min-width: 187px;
        width: 187px;
        min-height: 15px
      }

      .s96 {
        min-width: 44px;
        width: 44px;
        min-height: 13px
      }

      .c69 {
        height: 13px
      }

      .s97 {
        min-width: 136px;
        width: 136px;
        min-height: 15px;
        height: 15px
      }

      .input5 {
        width: 136px;
        height: 15px;
        font-size: 5px;
        line-height: 6px
      }

      .ps90 {
        margin-left: 11px;
        margin-top: 2px
      }

      .s98 {
        min-width: 187px;
        width: 187px;
        min-height: 58px
      }

      .c71 {
        height: 12px
      }

      .s99 {
        min-width: 136px;
        width: 136px;
        min-height: 58px;
        height: 58px
      }

      .input6 {
        width: 136px;
        height: 58px;
        font-size: 5px;
        line-height: 6px
      }

      .ps91 {
        margin-left: 62px;
        margin-top: 4px
      }

      .s100 {
        width: 134px;
        height: 10px
      }

      .f22 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 2px;
        padding-bottom: 2px
      }
    }

    @media (max-width:479px) {
      .s36 {
        min-width: 320px;
        min-height: 157px
      }

      .ps29 {
        margin-top: -157px
      }

      .s37 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .ps30 {
        margin-top: -109px
      }

      .s38 {
        min-width: 320px;
        width: 320px
      }

      .s39 {
        width: 163px;
        margin-left: 82px
      }

      .s40 {
        min-width: 163px;
        width: 163px;
        min-height: 121px
      }

      .ps32 {
        margin-top: -12px
      }

      .s41 {
        min-width: 320px;
        min-height: 9px
      }

      .s42 {
        min-width: 320px;
        width: 320px
      }

      .s43 {
        width: 251px;
        margin-left: 33px
      }

      .s44 {
        min-width: 251px;
        width: 251px;
        min-height: 9px
      }

      .s45 {
        min-width: 40px;
        width: 40px;
        min-height: 9px
      }

      .f11 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 2px;
        padding-bottom: 1px
      }

      .s46 {
        width: 42px;
        height: 6px
      }

      .ps33 {
        margin-left: 14px
      }

      .ps34 {
        margin-left: 11px
      }

      .s47 {
        min-width: 44px;
        width: 44px;
        min-height: 9px
      }

      .s48 {
        width: 44px;
        height: 6px
      }

      .ps35 {
        margin-left: 11px
      }

      .ps36 {
        margin-left: 11px
      }

      .ps37 {
        margin-top: 4px
      }

      .s49 {
        width: 314px;
        margin-left: 0
      }

      .ps38 {
        margin-left: 41px
      }

      .s50 {
        min-width: 243px;
        width: 243px;
        min-height: 14px
      }

      .c31 {
        -webkit-border-radius: 7px;
        -moz-border-radius: 7px;
        border-radius: 7px
      }

      .ps39 {
        margin-left: 32px;
        margin-top: 2px
      }

      .s51 {
        min-width: 176px;
        width: 176px;
        min-height: 12px
      }

      .s52 {
        min-width: 37px;
        width: 37px;
        min-height: 11px
      }

      .c32 {
        height: 11px
      }

      .f12 {
        font-size: 4px;
        line-height: 6px
      }

      .ps41 {
        margin-left: 2px
      }

      .s53 {
        min-width: 96px;
        width: 96px;
        min-height: 10px;
        height: 10px
      }

      .input3 {
        width: 96px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps42 {
        margin-left: 4px
      }

      .s54 {
        width: 37px;
        height: 8px
      }

      .f13 {
        font-size: 3px;
        line-height: 4px;
        padding-top: 2px;
        padding-bottom: 2px
      }

      .ps43 {
        margin-top: 317px
      }

      .s55 {
        min-width: 314px;
        width: 314px;
        min-height: 798px
      }

      .ps44 {
        margin-left: 28px;
        margin-top: 52px
      }

      .s56 {
        min-width: 208px;
        width: 208px;
        min-height: 50px;
        height: 50px
      }

      .c35 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps45 {
        margin-left: -240px;
        margin-top: 0
      }

      .s57 {
        min-width: 314px;
        width: 314px;
        min-height: 798px
      }

      .ps46 {
        margin-left: 28px
      }

      .s58 {
        min-width: 236px;
        width: 236px;
        min-height: 106px
      }

      .ps47 {
        margin-left: 186px
      }

      .s59 {
        min-height: 50px;
        height: 50px
      }

      .c36 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps48 {
        margin-left: 0;
        margin-top: 2px
      }

      .s60 {
        min-width: 208px;
        width: 208px;
        min-height: 50px;
        height: 50px
      }

      .c37 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps49 {
        margin-left: 22px;
        margin-top: -106px
      }

      .s61 {
        min-width: 50px;
        width: 50px;
        min-height: 50px;
        height: 50px
      }

      .c38 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps50 {
        margin-top: 684px
      }

      .s62 {
        min-width: 314px;
        width: 314px;
        min-height: 8px
      }

      .c39 {
        height: 8px
      }

      .f14 {
        font-size: 6px;
        line-height: 8px
      }

      .ps51 {
        margin-left: 28px;
        margin-top: -746px
      }

      .c40 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps52 {
        margin-left: 0;
        margin-top: -798px
      }

      .s63 {
        min-width: 314px;
        width: 314px;
        min-height: 798px
      }

      .ps53 {
        margin-left: 214px
      }

      .c41 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps54 {
        margin-left: 28px;
        margin-top: 2px
      }

      .c42 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps55 {
        margin-left: -190px;
        margin-top: -50px
      }

      .c43 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps56 {
        margin-left: -50px;
        margin-top: -50px
      }

      .c44 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps57 {
        margin-left: 0;
        margin-top: -54px
      }

      .s64 {
        min-width: 314px;
        width: 314px;
        min-height: 746px
      }

      .ps58 {
        margin-left: 28px
      }

      .s65 {
        min-width: 208px;
        width: 208px;
        min-height: 50px;
        height: 50px
      }

      .c45 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps59 {
        margin-left: 0;
        margin-top: 684px
      }

      .s66 {
        min-width: 314px;
        width: 314px;
        min-height: 8px
      }

      .c46 {
        height: 8px
      }

      .ps60 {
        margin-left: 214px;
        margin-top: -798px
      }

      .c47 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps61 {
        margin-left: 28px;
        margin-top: -746px
      }

      .c48 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps62 {
        margin-left: -190px;
        margin-top: -798px
      }

      .c49 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps63 {
        margin-top: -778px
      }

      .s67 {
        min-width: 320px;
        min-height: 9px
      }

      .ps64 {
        margin-top: -1085px
      }

      .s68 {
        min-width: 320px;
        width: 320px
      }

      .ps65 {
        margin-top: -855px
      }

      .s69 {
        width: 314px
      }

      .ps66 {
        margin-top: 847px
      }

      .s70 {
        min-width: 314px;
        width: 314px;
        min-height: 8px
      }

      .c51 {
        height: 8px
      }

      .f15 {
        font-size: 6px;
        line-height: 8px
      }

      .ps67 {
        margin-left: 66px;
        margin-top: -855px
      }

      .s71 {
        min-width: 227px;
        width: 227px;
        min-height: 54px
      }

      .s72 {
        min-width: 68px;
        width: 68px;
        min-height: 54px
      }

      .ps68 {
        margin-left: 6px
      }

      .s73 {
        min-width: 50px;
        width: 50px;
        min-height: 50px;
        height: 50px
      }

      .c52 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps69 {
        margin-top: -44px
      }

      .s74 {
        min-width: 68px;
        width: 68px;
        min-height: 34px
      }

      .c53 {
        height: 34px
      }

      .f16 {
        font-size: 6px;
        line-height: 9px
      }

      .f17 {
        font-size: 10px;
        line-height: 14px
      }

      .ps70 {
        margin-left: -9px
      }

      .s75 {
        min-width: 164px;
        width: 164px;
        min-height: 50px;
        height: 50px
      }

      .c54 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps71 {
        margin-left: 0;
        margin-top: 0
      }

      .s76 {
        min-width: 152px;
        width: 152px;
        min-height: 51px
      }

      .s77 {
        min-width: 50px;
        width: 50px;
        min-height: 51px
      }

      .f18 {
        font-size: 10px;
        line-height: 13px;
        padding-top: 17px;
        padding-bottom: 17px
      }

      .btn8 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .s78 {
        width: 46px;
        height: 13px
      }

      .ps72 {
        margin-left: 17px;
        margin-top: -34px
      }

      .s79 {
        min-width: 16px;
        width: 16px;
        min-height: 17px
      }

      .s80 {
        width: 16px;
        height: 17px
      }

      .f19 {
        font-size: 10px;
        line-height: 13px
      }

      .c57 {
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px
      }

      .ps74 {
        margin-left: 5px;
        margin-top: 14px
      }

      .s81 {
        min-width: 97px;
        width: 97px;
        min-height: 23px
      }

      .c58 {
        height: 23px
      }

      .f20 {
        font-size: 10px;
        line-height: 17px
      }

      .ps75 {
        margin-left: 49px;
        margin-top: -800px
      }

      .s82 {
        min-width: 216px;
        width: 216px;
        min-height: 54px
      }

      .ps76 {
        margin-top: 1px
      }

      .s83 {
        min-width: 51px;
        width: 51px;
        min-height: 51px
      }

      .c59 {
        -webkit-border-radius: 26px;
        -moz-border-radius: 26px;
        border-radius: 26px
      }

      .ps77 {
        margin-left: 1px;
        margin-top: 1px
      }

      .c60 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps78 {
        margin-left: 0
      }

      .s84 {
        min-width: 110px;
        width: 110px;
        min-height: 50px;
        height: 50px
      }

      .c61 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps79 {
        margin-left: 0;
        margin-top: 1px
      }

      .s85 {
        min-width: 51px;
        width: 51px;
        min-height: 51px
      }

      .c62 {
        -webkit-border-radius: 26px;
        -moz-border-radius: 26px;
        border-radius: 26px
      }

      .ps80 {
        margin-left: 0;
        margin-top: 1px
      }

      .c63 {
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 25px
      }

      .ps81 {
        margin-left: 28px;
        margin-top: -746px
      }

      .s86 {
        min-width: 208px;
        width: 208px;
        min-height: 50px;
        height: 50px
      }

      .c64 {
        -webkit-border-radius: 27px;
        -moz-border-radius: 27px;
        border-radius: 27px
      }

      .ps82 {
        margin-top: -877px
      }

      .ps83 {
        margin-top: -1021px
      }

      .ps84 {
        margin-top: -1466px
      }

      .ps85 {
        margin-top: -1525px
      }

      .s87 {
        min-width: 320px;
        width: 320px;
        height: 85px
      }

      .s88 {
        width: 241px;
        height: 85px;
        margin-left: 52px
      }

      .s89 {
        min-width: 241px;
        width: 241px;
        min-height: 84px
      }

      .s90 {
        min-width: 99px;
        width: 99px;
        min-height: 84px
      }

      .map1 {
        width: 99px;
        height: 84px
      }

      .ps86 {
        margin-left: 5px
      }

      .s91 {
        min-width: 137px;
        width: 137px;
        min-height: 84px;
        height: 84px
      }

      .ps87 {
        margin-left: 7px;
        margin-top: 7px
      }

      .s92 {
        min-width: 125px;
        width: 125px;
        min-height: 10px
      }

      .s93 {
        min-width: 30px;
        width: 30px;
        min-height: 8px
      }

      .c67 {
        height: 8px
      }

      .f21 {
        font-size: 3px;
        line-height: 5px
      }

      .ps88 {
        margin-left: 4px
      }

      .s94 {
        min-width: 91px;
        width: 91px;
        min-height: 10px;
        height: 10px
      }

      .input4 {
        width: 91px;
        height: 10px;
        font-size: 3px;
        line-height: 4px
      }

      .ps89 {
        margin-left: 7px;
        margin-top: 0
      }

      .s95 {
        min-width: 125px;
        width: 125px;
        min-height: 11px
      }

      .s96 {
        min-width: 30px;
        width: 30px;
        min-height: 9px
      }

      .c69 {
        height: 9px
      }

      .s97 {
        min-width: 91px;
        width: 91px;
        min-height: 11px;
        height: 11px
      }

      .input5 {
        width: 91px;
        height: 11px;
        font-size: 3px;
        line-height: 4px
      }

      .ps90 {
        margin-left: 7px;
        margin-top: 1px
      }

      .s98 {
        min-width: 125px;
        width: 125px;
        min-height: 39px
      }

      .c71 {
        height: 8px
      }

      .s99 {
        min-width: 91px;
        width: 91px;
        min-height: 39px;
        height: 39px
      }

      .input6 {
        width: 91px;
        height: 39px;
        font-size: 3px;
        line-height: 4px
      }

      .ps91 {
        margin-left: 41px;
        margin-top: 2px
      }

      .s100 {
        width: 89px;
        height: 7px
      }

      .f22 {
        font-size: 3px;
        line-height: 4px;
        padding-top: 2px;
        padding-bottom: 1px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c21 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .fx1 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c21 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .fx1 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c21 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .fx1 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c21 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-640.webp)
      }

      .fx1 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-640.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-640.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:320px) {
      .c21 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .fx1 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .fx1 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .fx1 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .fx1 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-480.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-480.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-480.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-480.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c21 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .fx1 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .fx1 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .fx1 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .fx1 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:480px) {
      .c21 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .fx1 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .fx1 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .fx1 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .fx1 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-768.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-768.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-768.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-768.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:768px) {
      .c21 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .fx1 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .fx1 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .fx1 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .fx1 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-960-1.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-960-1.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-960.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-960.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:960px) {
      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1200.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1200.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1200.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1200.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:1200px) {
      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-1600.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-1600.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-1600.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-1600.webp);
        background-attachment: fixed
      }
    }

    @media (min-width:1600px) {
      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .c21 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c21 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .fx1 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx1 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx2 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx2 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx3 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx3 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx4 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx4 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx5 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx5 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx6 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx6 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx7 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx7 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx8 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx8 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx9 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx9 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx10 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx10 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx11 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx11 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx12 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx12 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx13 {
        background-image: url(images/background-2000.jpeg);
        background-attachment: fixed
      }

      .webp .fx13 {
        background-image: url(images/background-2000.webp);
        background-attachment: fixed
      }

      .fx14 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx14 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx15 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx15 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx16 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx16 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx17 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx17 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx18 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx18 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }

      .fx19 {
        background-image: url(images/pic-13-2000.png);
        background-attachment: fixed
      }

      .webp .fx19 {
        background-image: url(images/pic-13-2000.webp);
        background-attachment: fixed
      }
    }

.dropdown {
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

//.navbar a:hover, .dropdown:hover .dropbtn {
//  background-color: red;
//}

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

    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 9999; /* Sit on top */
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
  <link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.f02883.css" media="print">
  <!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.f02883-lteIE7.css" type="text/css">
<![endif]-->
  <!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.f02883-lteIE8.css" type="text/css">
<![endif]-->
  <!--[if gte IE 9]>
<link rel="stylesheet" href="css/site.f02883-gteIE9.css" type="text/css">
<![endif]-->
</head>

<body id="b">
  <div class="v5 ps28 s36 c21"></div>
  <div class="v5 ps29 s37 c22"></div>
  <div class="ps30 v6 s38">
    <div class="s39">
      <div id="popup1" style="transform:translate3d(-999999px,0,0)" class="popup v7 ps31 s40 c23" data-popup-group="0" data-popup-type="0">
          <div class="v1 ps10 s13 c6">
            <p class="p2 f3">&nbsp;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;OR &mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;</p>
          </div>
        </div>
      </div>
    </div>
  <div class="v5 ps32 s41 c24">
    <div class="ps28 v6 s42">
      <div class="s43">
        <div class="v5 ps31 s44 c25">
          <div class="v5 ps31 s45 c26">
            <!--a href="http://ec2-52-74-104-157.ap-southeast-1.compute.amazonaws.com/signin.html" class="f11 btn3 v8 s46">Login</a-->
<!--?php if(isset($_SESSION['username'])):?-->
<?php if(isset($_SESSION['username']) && ($_SESSION['username']=='admin')):?>
<div class="dropdown">
  <button class="f11 btn3 v8 s46"><?php echo $_SESSION['username'];?></button>
  <div class="dropdown-content">
    <a href="updatebooking.php">Update Booking</a>
    <a href="updateroom.php">Update Room Status</a>
    <a href="logout.php">Log out</a>
  </div>
</div>
<?php elseif(isset($_SESSION['username'])):?>
<div class="dropdown">
  <button class="f11 btn3 v8 s46"><?php echo $_SESSION['username'];?></button>
  <div class="dropdown-content">
    <!--a href="#">Pet Profile</a-->
    <a href="user_history.php">History</a>
    <a href="logout.php">Log out</a>
  </div>
</div>
<?php else:?>
<a href="signin.php" class="f11 btn3 v8 s46">Login</a>
<?php endif;?>
          </div>
          <div class="v5 ps33 s45 c27">
            <a href="#gallery" class="f11 btn4 v8 s46">Gallery</a>
          </div>
          <div class="v5 ps34 s47 c28">
            <a href="#services" class="f11 btn5 v8 s48">Services</a>
          </div>
          <div class="v5 ps35 s45 c29">
            <a href="#about-us" class="f11 btn6 v8 s46">About Us</a>
          </div>
          <div class="v5 ps36 s45 c30">
            <!--a href="#contact-us" class="f11 btn7 v8 s46">Contact Us</a-->
<?php if(isset($_SESSION['username']) && ($_SESSION['username']=='admin')):?>
<div class="dropdown">
<!--a href="#" class="f11 btn7 v8 s46">Reports</a-->
 <button class="f11 btn7 v8 s46">Reports</button>
 <div class="dropdown-content">
   <a href=transact_report.php>Transactions</a>
   <a href=active_users.php>Active Users</a>
   <a href=room_report.php>Rooms</a>
 </div>
</div>
<?php else:?>
<a href="#contact-us" class="f11 btn7 v8 s46">Contact Us</a>
<?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ps37 v6 s38">
    <div class="s49">
      <!--form method="POST" action="retrieve.php" class="v5 ps38 s50 c31"-->
      <!--div class="v5 ps38 s50 c31"-->
        <div class="v5 ps39 s51 c25">
gin
          <div class="v5 ps40 s52 c32">
            <p class="p4 f12">Booking #:</p>
          </div>
          <div class="v5 ps41 s53 c33">
            <input id="bookingNum" type="text" value="enter booking number" name="booking_num" class="input3">
          </div>
          <div class="v9 ps42 s54 c34">
            <!--p class="f13">Retrieve</p-->
 	    <button onclick="myFunction()" id="myBtn" class="f13">Retrieve</button>
          </div>
        </div>
      <!--/div-->
      <!--/form-->
      <div class="v5 ps43 s55 c25">
        <div class="fbk v5 ps44 s56 c35 fx1" data-fbk="fx1"></div>
        <div class="v5 ps45 s57 w2">
          <div class="v5 ps46 s58 c25">
            <div class="fbk v5 ps47 s59 c36 fx2" data-fbk="fx2"></div>
            <div class="fbk v5 ps48 s60 c37 fx3" data-fbk="fx3"></div>
            <div class="fbk v5 ps49 s61 c38 fx4" data-fbk="fx4"></div>
          </div>
          <div class="v5 ps50 s62 c39">
            <p class="p5 f14">Schedule</p>
          </div>
        </div>
        <div class="fbk v5 ps51 s56 c40 fx5" data-fbk="fx5"></div>
      </div>
      <div class="v5 ps52 s63 c25">
        <div class="fbk v5 ps53 s59 c41 fx6" data-fbk="fx6"></div>
        <div class="fbk v5 ps54 s60 c42 fx7" data-fbk="fx7"></div>
        <div class="fbk v5 ps55 s61 c43 fx8" data-fbk="fx8"></div>
        <div class="fbk v5 ps56 s61 c44 fx9" data-fbk="fx9"></div>
        <div class="v5 ps57 s64 w2">
          <div class="fbk v5 ps58 s65 c45 fx10" data-fbk="fx10"></div>
          <div class="v5 ps59 s66 c46">
            <p class="p5 f14">9:00 AM - 5:00 PM</p>
          </div>
        </div>
        <div class="fbk v5 ps60 s59 c47 fx11" data-fbk="fx11"></div>
        <div class="fbk v5 ps61 s60 c48 fx12" data-fbk="fx12"></div>
        <div class="fbk v5 ps62 s61 c49 fx13" data-fbk="fx13"></div>
      </div>
    </div>
  </div>
  <div class="v5 ps63 s67 c50"></div>
  <a name="gallery" class="v5 ps64 s68"></a>
  <div class="ps65 v6 s38">
    <div class="s69">
      <div class="v5 ps66 s70 c51">
        <p class="p5 f15">Gallery</p>
      </div>
      <div class="v5 ps67 s71 c25">
        <div class="v5 ps31 s72 w2">
          <div class="fbk v5 ps68 s73 c52 fx14" data-fbk="fx14"></div>
          <div class="v5 ps69 s74 c53">
            <p class="p5 f16">Park&nbsp;&nbsp;</p>
            <p class="p5 f17">CITY</p>
          </div>
        </div>
        <div class="fbk v5 ps70 s75 c54 fx15" data-fbk="fx15">
          <div class="v5 ps71 s76 c25">
            <div class="v5 ps31 s77 w2">
              <div class="v5 ps31 s77 c55">
                <a href="gallery.php" class="f18 btn8 v8 s78">Gallery</a>
              </div>
              <div class="anim fadeInRight js3 v5 ps72 s79 c56">
                <div class="v8 ps73 s80 c57">
                  <p class="f19">Tracks</p>
                </div>
              </div>
            </div>
            <div class="v5 ps74 s81 c58">
              <p class="p5 f20">Pet Boarding</p>
            </div>
          </div>
        </div>
      </div>
      <div class="v5 ps75 s82 c25">
        <div class="v5 ps76 s83 c59">
          <div class="fbk v5 ps77 s73 c60 fx16" data-fbk="fx16"></div>
        </div>
        <div class="fbk v5 ps78 s84 c61 fx17" data-fbk="fx17"></div>
        <div class="v5 ps79 s85 c62">
          <div class="fbk v5 ps80 s73 c63 fx18" data-fbk="fx18"></div>
        </div>
      </div>
      <div class="fbk v5 ps81 s86 c64 fx19" data-fbk="fx19"></div>
    </div>
  </div>
  <div class="v1 ps12 s16 c7">
    <div class="ps13 v3 s17">
      <div class="s18">
        <div class="v1 ps4 s19 c8">
          <p class="p2 f4">Services</p>
        </div>
      </div>
    </div>
  </div>
  <a name="services" class="v5 ps82 s68"></a>
  <div class="ps14 v3 s20">
    <div class="s21">
      <div class="v1 ps15 s22 c3">
        <div class="v1 ps4 s22 w1">
          <div class="v1 ps16 s23 c9">
            <div class="v1 ps17 s24 c10">
              <a href="services.php" class="f5 btn2 v2 s25"> </a>
            </div>
          </div>
          <div class="v1 ps18 s26 c11">
            <p class="p2"><span class="f6"><a href="services.php">BOOK NOW</a></span></p>
<!--?php if(isset($_SESSION['username']))$_SESSION["username"] = $username;?-->
          </div>
        </div>
      </div>
      <div class="v1 ps19 s27 c12">
        <p class="p3"><span class="f7">Requirements</span></p>
        <p class="p3 f8">&nbsp;</p>
        <p class="p3 f9">We require an up-to-date vaccination of your furbabies and your 2 valid IDs.</p>
      </div>
    </div>
  </div>
  <div class="v1 ps20 s28 c13">
    <div class="ps21 v3 s17">
      <div class="s18">
        <div class="v1 ps4 s19 c14">
          <p class="p2 f4">About Us</p>
        </div>
      </div>
    </div>
  </div>
  <a name="about-us" class="v5 ps83 s68"></a>
  <div class="ps22 v3 s20">
    <div class="s29">
      <div class="v1 ps4 s30 c3">
        <div class="v1 ps23 s31 c15">
          <div class="v4 ps24 s32 c16">
            <p class="f10"> </p>
          </div>
        </div>
        <div class="v1 ps25 s33 c17">
          <p class="p3 f8">Opened in November 2016, Park City Pet Boarding is a dedicated pet boarding, grooming and daycare, for dogs and cats, with maximized free roaming. At lot 11-2, on Jalan Radin Bagus 5, in Sri Petaling.</p>
          <p class="p3 f8"><br></p>
          <p class="p3 f8">Founded by dog owners, for dog owners. We love them as much as you do!</p>
          <p class="p3 f8"><br></p>
          <p class="p3 f8">At Park City Pet Boarding we strive to provide you the best services in town.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="v1 ps26 s34 c18">
    <div class="ps13 v3 s17">
      <div class="s18">
        <div class="v1 ps4 s19 c19">
          <p class="p2 f4">Contact Us</p>
        </div>
      </div>
    </div>
  </div>
  <a name="contact-us" class="v5 ps84 s68"></a>
  <div class="ps85 v6 s87">
    <div class="s88">
      <div class="v5 ps31 s89 c25">
        <div class="v5 ps31 s90 c65">
          <iframe src="https://maps.google.com/maps?q=11,%20Jalan%20Radin%20Bagus&amp;t=&amp;z=11&amp;ie=UTF8&amp;iwloc=&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" class="map1">
          </iframe>
        </div>
        <!--div class="v5 ps86 s91 c66"-->
        <form class="v5 ps86 s91 c66" action="inquiry.php" method="POST">
          <div class="v5 ps87 s92 c25">
            <div class="v5 ps40 s93 c67">
              <p class="p4 f21">Email Address</p>
            </div>
            <div class="v5 ps88 s94 c68">
              <input type="text" name="emailadd" class="input4" value="<?php echo $row['email']?>">
            </div>
          </div>
          <div class="v5 ps89 s95 c25">
            <div class="v5 ps40 s96 c69">
              <p class="p4 f21">Contact #</p>
            </div>
            <div class="v5 ps88 s97 c70">
              <input type="text" name="telnum" class="input5">
            </div>
          </div>
          <div class="v5 ps90 s98 c25">
            <div class="v5 ps40 s93 c71">
              <p class="p4 f21">Inquiry</p>
            </div>
            <div class="v5 ps88 s99 c72">
              <textarea name="inq_message" class="input6"></textarea>
            </div>
          </div>
          <div class="v9 ps91 s100 c73">
            <button class="f22">Send Email</p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="v1 ps27 s35 c20"></div>
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
        <h2>Park City Pet Boarding</h2>
      </div>
      <div class="modal-body">
        <!--p>&nbsp;</p>
        <p>Your reservation is confirmed!!!</p>
        <p>&nbsp;</p>
        <p>Booking Reference: </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>Please check your email for full details.</p>
        <p>&nbsp;</p-->
  <div id="output">this element will be accessed by jquery and this text replaced</div>
  <!--script id="source" language="javascript" type="text/javascript"-->
      </div>
      <div class="modal-footer">
        <h3>Thank you!</h3>
      </div>
    </div>
  </div>
  <script>
    dpth = "/";
    ! function() {
      var s = ["js/popup.0d3f62.js", "js/jquery.0d3f62.js", "js/fixed.0d3f62.js", "js/woolite.0d3f62.js", "js/index.f02883.js"],
        n = {},
        j = 0,
        e = function(e) {
          var o = new XMLHttpRequest;
          o.open("GET", s[e], !0), o.onload = function() {
            if (n[e] = o.responseText, 5 == ++j)
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
    retrieveBooking();
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
<script>

function retrieveBooking(){

	var bookingNum = document.getElementById("bookingNum").value;
        $.ajax({
   		url: 'retrieve.php',
   		type: 'POST',
   		dataType: 'json',
                data:{
                  booking_num: bookingNum
                },
		success: function(data)
		{
                  var booking_ref = data[0];
                  var email = data[1];
                  var service = data[2];
                  var date_in = data[3];
                  var date_out = data[4];
                  var time_in = data[5];
                  var amount = data[6];
                  var stat = data[7];
                  $('#output').html("<p><b>Booking Ref: "+booking_ref+"<b><p>");
                  $('#output').append("<p>Email: "+email+"</p>");
                  $('#output').append("<p>Service: "+service+"</p>");
                  $('#output').append("<p>Date In: "+date_in+"</p>");
                  $('#output').append("<p>Date Out: "+date_out+"</p>");
                  $('#output').append("<p>Time In: "+time_in+"</p>");
                  $('#output').append("<p>Amount: "+amount+"</p>");
                  $('#output').append("<p>Status: "+stat+"</p>");
		}
 	});
}

</script>
</body>

</html>
