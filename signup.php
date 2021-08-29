<?php
if (!session_id()) session_start();
//print_r($_SESSION);

$email = $_POST['reg_email'];
$username = $_POST['reg_username'];
$name = $_POST['reg_name'];
$password = $_POST['reg_password'];
$cpassword = $_POST['reg_cpassword'];

$_SESSION["reg_email"] = $email;
$_SESSION["reg_username"] = $username;
$_SESSION["reg_name"] = $name;
$_SESSION["reg_password"] = $password;
$_SESSION["reg_cpassword"] = $cpassword;

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>SignUp</title>
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

    .v23 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps185 {
      position: relative;
      margin-top: 0
    }

    .s223 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c170 {
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

    .webp .c170 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps186 {
      position: relative;
      margin-top: -472px
    }

    .s224 {
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

    .c171 {
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

    .s225 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c172 {
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

    .ps187 {
      position: relative;
      margin-top: 58px
    }

    .v24 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s226 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s227 {
      width: 593px;
      margin-left: 194px
    }

    .ps188 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s228 {
      min-width: 593px;
      width: 593px;
      min-height: 609px
    }

    .c173 {
      z-index: 4;
      border: 0;
      -webkit-border-radius: 21px;
      -moz-border-radius: 21px;
      border-radius: 21px;
      background-color: rgba(255, 255, 255, .15);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(255, 255, 255, .15);
      behavior: url(js/PIE.htc);
      -pie-background: rgba(255, 255, 255, .15);
      background-clip: padding-box
    }

    .ps189 {
      position: relative;
      margin-left: 6px;
      margin-top: 27px
    }

    .s229 {
      min-width: 587px;
      width: 587px;
      min-height: 39px
    }

    .w5 {
      line-height: 0
    }

    .ps190 {
      position: relative;
      margin-left: 170px;
      margin-top: 0
    }

    .s230 {
      min-width: 40px;
      width: 40px;
      min-height: 38px;
      height: 38px
    }

    .c175 {
      z-index: 7;
      pointer-events: auto
    }

    .i4 {
      position: absolute;
      left: 2px;
      width: 36px;
      height: 38px;
      top: 0;
      border: 0
    }

    .i5 {
      width: 100%;
      height: 100%;
      display: inline-block;
      -webkit-transform: translate3d(0, 0, 0)
    }

    .ps191 {
      position: relative;
      margin-left: 0;
      margin-top: -37px
    }

    .s231 {
      min-width: 587px;
      width: 587px;
      min-height: 37px
    }

    .c176 {
      z-index: 5;
      pointer-events: auto;
      overflow: hidden;
      height: 37px
    }

    .p10 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: center
    }

    .f44 {
      font-family: "Bruno Ace";
      font-size: 20px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #fff;
      background-color: initial;
      line-height: 34px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps192 {
      position: relative;
      margin-left: 377px;
      margin-top: -37px
    }

    .s232 {
      min-width: 40px;
      width: 40px;
      min-height: 38px;
      height: 38px
    }

    .c177 {
      z-index: 11;
      pointer-events: auto
    }

    .i6 {
      position: absolute;
      left: 2px;
      width: 36px;
      height: 38px;
      top: 0;
      border: 0
    }

    .ps193 {
      position: relative;
      margin-left: 63px;
      margin-top: 7px
    }

    .s233 {
      min-width: 463px;
      width: 463px;
      min-height: 30px
    }

    .c178 {
      z-index: 6;
      pointer-events: auto;
      overflow: hidden;
      height: 30px
    }

    .p11 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: left
    }

    .f45 {
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #fff;
      background-color: initial;
      line-height: 27px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps194 {
      position: relative;
      margin-left: 62px;
      margin-top: -1px
    }

    .s234 {
      min-width: 465px;
      width: 465px;
      min-height: 27px;
      height: 27px
    }

    .c179 {
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
      width: 465px;
      height: 27px;
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 19px;
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

    .ps195 {
      position: relative;
      margin-left: 63px;
      margin-top: 12px
    }

    .c180 {
      z-index: 8;
      pointer-events: auto;
      overflow: hidden;
      height: 30px
    }

    .s235 {
      min-width: 465px;
      width: 465px;
      min-height: 27px;
      height: 27px
    }

    .c181 {
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
      width: 465px;
      height: 27px;
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 19px;
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

    .ps196 {
      position: relative;
      margin-left: 62px;
      margin-top: 12px
    }

    .s236 {
      min-width: 466px;
      width: 466px;
      min-height: 58px
    }

    .ps197 {
      position: relative;
      margin-left: 2px;
      margin-top: 0
    }

    .s237 {
      min-width: 126px;
      width: 126px;
      min-height: 33px
    }

    .c182 {
      z-index: 17;
      pointer-events: auto;
      overflow: hidden;
      height: 33px
    }

    .ps198 {
      position: relative;
      margin-left: 0;
      margin-top: -2px
    }

    .s238 {
      min-width: 466px;
      width: 466px;
      min-height: 27px;
      height: 27px
    }

    .c183 {
      z-index: 20;
      pointer-events: auto
    }

    .input19 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 466px;
      height: 27px;
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 19px;
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

    .ps199 {
      position: relative;
      margin-left: 64px;
      margin-top: 18px
    }

    .s239 {
      min-width: 126px;
      width: 126px;
      min-height: 28px
    }

    .c184 {
      z-index: 16;
      pointer-events: auto;
      overflow: hidden;
      height: 28px
    }

    .ps200 {
      position: relative;
      margin-left: 63px;
      margin-top: 1px
    }

    .s240 {
      min-width: 465px;
      width: 465px;
      min-height: 27px;
      height: 27px
    }

    .c185 {
      z-index: 9;
      pointer-events: auto
    }

    .input20 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 400px;
      height: 27px;
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 19px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input20::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps201 {
      position: relative;
      margin-left: 62px;
      margin-top: 11px
    }

    .s241 {
      min-width: 466px;
      width: 466px;
      min-height: 56px
    }

    .ps202 {
      position: relative;
      margin-left: 1px;
      margin-top: 0
    }

    .s242 {
      min-width: 199px;
      width: 199px;
      min-height: 33px
    }

    .c186 {
      z-index: 18;
      pointer-events: auto;
      overflow: hidden;
      height: 33px
    }

    .ps203 {
      position: relative;
      margin-left: 0;
      margin-top: -4px
    }

    .s243 {
      min-width: 466px;
      width: 466px;
      min-height: 27px;
      height: 27px
    }

    .c187 {
      z-index: 19;
      pointer-events: auto
    }

    .input21 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 400px;
      height: 27px;
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #020202;
      line-height: 19px;
      letter-spacing: normal;
      text-shadow: none;
      text-indent: 0;
      padding-bottom: 0;
      text-align: left;
      padding: 4px
    }

    .input21::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps204 {
      position: relative;
      margin-left: 140px;
      margin-top: 41px
    }

    .s244 {
      min-width: 320px;
      width: 320px;
      min-height: 30px
    }

    .c188 {
      z-index: 10;
      pointer-events: auto
    }

    .f46 {
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
      padding-top: 6px;
      padding-bottom: 5px;
      margin-top: 0;
      margin-bottom: 0
    }

    .btn22 {
      border: 0;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      background-color: #b8c8d2;
      background-clip: padding-box;
      color: #020202
    }

    .btn22:hover {
      background-color: #82939e;
      border-color: #020202;
      color: #020202
    }

    .btn22:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .v25 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s245 {
      width: 320px;
      padding-right: 0;
      height: auto;
    }

    .ps205 {
      position: relative;
      margin-left: 50px;
      margin-top: 23px
    }

    .s246 {
      min-width: 480px;
      width: 480px;
      min-height: 54px
    }

    .s247 {
      min-width: 292px;
      width: 292px;
      min-height: 54px
    }

    .c189 {
      z-index: 13;
      pointer-events: auto;
      overflow: hidden;
      height: 54px
    }

    .ps206 {
      position: relative;
      margin-left: 18px;
      margin-top: 0
    }

    .s248 {
      min-width: 170px;
      width: 170px;
      min-height: 30px
    }

    .c190 {
      z-index: 21;
      pointer-events: auto
    }

    .btn23 {
      border: 0;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      background-color: #b8c8d2;
      background-clip: padding-box;
      color: #020202
    }

    .btn23:hover {
      background-color: #82939e;
      border-color: #020202;
      color: #020202
    }

    .btn23:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .s249 {
      width: 170px;
      padding-right: 0;
      height: 19px
    }

    .v26 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top;
      overflow: hidden;
      outline: 0
    }

    .ps207 {
      position: relative;
      margin-left: 257px;
      margin-top: 15px
    }

    .s250 {
      width: 80px;
      padding-right: 0;
      height: 21px
    }

    .f47 {
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
      margin-bottom: 0
    }

    .c191 {
      z-index: 12;
      pointer-events: auto;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: #fff
    }

    .c191:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .c191:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    @media (min-width:768px) and (max-width:959px) {
      .s223 {
        min-width: 768px;
        min-height: 378px
      }

      .ps186 {
        margin-top: -378px
      }

      .s224 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .s225 {
        min-width: 768px;
        min-height: 21px
      }

      .ps187 {
        margin-top: 47px
      }

      .s226 {
        min-width: 768px;
        width: 768px
      }

      .s227 {
        width: 475px;
        margin-left: 155px
      }

      .s228 {
        min-width: 475px;
        width: 475px;
        min-height: 487px
      }

      .ps189 {
        margin-left: 5px;
        margin-top: 21px
      }

      .s229 {
        min-width: 470px;
        width: 470px;
        min-height: 31px
      }

      .ps190 {
        margin-left: 136px
      }

      .s230 {
        min-width: 32px;
        width: 32px;
        min-height: 31px;
        height: 31px
      }

      .i4 {
        left: 1px;
        width: 29px;
        height: 31px
      }

      .ps191 {
        margin-top: -30px
      }

      .s231 {
        min-width: 470px;
        width: 470px;
        min-height: 30px
      }

      .c176 {
        height: 30px
      }

      .f44 {
        font-size: 16px;
        line-height: 27px
      }

      .ps192 {
        margin-left: 302px;
        margin-top: -30px
      }

      .s232 {
        min-width: 32px;
        width: 32px;
        min-height: 30px;
        height: 30px
      }

      .i6 {
        width: 29px;
        height: 30px
      }

      .ps193 {
        margin-left: 51px;
        margin-top: 6px
      }

      .s233 {
        min-width: 370px;
        width: 370px;
        min-height: 24px
      }

      .c178 {
        height: 24px
      }

      .f45 {
        font-size: 12px;
        line-height: 20px
      }

      .ps194 {
        margin-left: 50px
      }

      .s234 {
        min-width: 372px;
        width: 372px;
        min-height: 22px;
        height: 22px
      }

      .input17 {
        width: 372px;
        height: 22px;
        font-size: 12px;
        line-height: 14px
      }

      .ps195 {
        margin-left: 51px;
        margin-top: 9px
      }

      .c180 {
        height: 24px
      }

      .s235 {
        min-width: 372px;
        width: 372px;
        min-height: 22px;
        height: 22px
      }

      .input18 {
        width: 372px;
        height: 22px;
        font-size: 12px;
        line-height: 14px
      }

      .ps196 {
        margin-left: 50px;
        margin-top: 10px
      }

      .s236 {
        min-width: 373px;
        width: 373px;
        min-height: 46px
      }

      .ps197 {
        margin-left: 1px
      }

      .s237 {
        min-width: 101px;
        width: 101px;
        min-height: 26px
      }

      .c182 {
        height: 26px
      }

      .s238 {
        min-width: 373px;
        width: 373px;
        min-height: 22px;
        height: 22px
      }

      .input19 {
        width: 373px;
        height: 22px;
        font-size: 12px;
        line-height: 14px
      }

      .ps199 {
        margin-left: 51px;
        margin-top: 15px
      }

      .s239 {
        min-width: 101px;
        width: 101px;
        min-height: 22px
      }

      .c184 {
        height: 22px
      }

      .ps200 {
        margin-left: 50px
      }

      .s240 {
        min-width: 373px;
        width: 373px;
        min-height: 22px;
        height: 22px
      }

      .input20 {
        width: 373px;
        height: 22px;
        font-size: 12px;
        line-height: 14px
      }

      .ps201 {
        margin-left: 50px;
        margin-top: 8px
      }

      .s241 {
        min-width: 373px;
        width: 373px;
        min-height: 45px
      }

      .s242 {
        min-width: 159px;
        width: 159px;
        min-height: 27px
      }

      .c186 {
        height: 27px
      }

      .s243 {
        min-width: 373px;
        width: 373px;
        min-height: 22px;
        height: 22px
      }

      .input21 {
        width: 373px;
        height: 22px;
        font-size: 12px;
        line-height: 14px
      }

      .ps204 {
        margin-left: 112px;
        margin-top: 33px
      }

      .s244 {
        min-width: 256px;
        width: 256px;
        min-height: 24px
      }

      .f46 {
        font-size: 12px;
        line-height: 14px;
        padding-top: 5px
      }

      .s245 {
        width: 256px;
        height: 14px
      }

      .ps205 {
        margin-left: 40px;
        margin-top: 18px
      }

      .s246 {
        min-width: 384px;
        width: 384px;
        min-height: 43px
      }

      .s247 {
        min-width: 234px;
        width: 234px;
        min-height: 43px
      }

      .c189 {
        height: 43px
      }

      .ps206 {
        margin-left: 14px
      }

      .s248 {
        min-width: 136px;
        width: 136px;
        min-height: 24px
      }

      .s249 {
        width: 136px;
        height: 14px
      }

      .ps207 {
        margin-left: 206px;
        margin-top: 12px
      }

      .s250 {
        width: 64px;
        height: 17px
      }

      .f47 {
        font-size: 9px;
        line-height: 11px;
        padding-top: 3px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s223 {
        min-width: 480px;
        min-height: 236px
      }

      .ps186 {
        margin-top: -236px
      }

      .s224 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .s225 {
        min-width: 480px;
        min-height: 13px
      }

      .ps187 {
        margin-top: 30px
      }

      .s226 {
        min-width: 480px;
        width: 480px
      }

      .s227 {
        width: 297px;
        margin-left: 97px
      }

      .s228 {
        min-width: 297px;
        width: 297px;
        min-height: 304px
      }

      .ps189 {
        margin-left: 3px;
        margin-top: 13px
      }

      .s229 {
        min-width: 294px;
        width: 294px;
        min-height: 19px
      }

      .ps190 {
        margin-left: 85px
      }

      .s230 {
        min-width: 20px;
        width: 20px;
        min-height: 19px;
        height: 19px
      }

      .i4 {
        left: 1px;
        width: 18px;
        height: 19px
      }

      .ps191 {
        margin-top: -18px
      }

      .s231 {
        min-width: 294px;
        width: 294px;
        min-height: 18px
      }

      .c176 {
        height: 18px
      }

      .f44 {
        font-size: 10px;
        line-height: 17px
      }

      .ps192 {
        margin-left: 189px;
        margin-top: -18px
      }

      .s232 {
        min-width: 20px;
        width: 20px;
        min-height: 18px;
        height: 18px
      }

      .i6 {
        left: 1px;
        width: 17px;
        height: 18px
      }

      .ps193 {
        margin-left: 32px;
        margin-top: 4px
      }

      .s233 {
        min-width: 231px;
        width: 231px;
        min-height: 15px
      }

      .c178 {
        height: 15px
      }

      .f45 {
        font-size: 7px;
        line-height: 11px
      }

      .ps194 {
        margin-left: 31px
      }

      .s234 {
        min-width: 233px;
        width: 233px;
        min-height: 15px;
        height: 15px
      }

      .input17 {
        width: 233px;
        height: 15px;
        font-size: 7px;
        line-height: 9px
      }

      .ps195 {
        margin-left: 32px;
        margin-top: 5px
      }

      .c180 {
        height: 15px
      }

      .s235 {
        min-width: 233px;
        width: 233px;
        min-height: 14px;
        height: 14px
      }

      .input18 {
        width: 233px;
        height: 14px;
        font-size: 7px;
        line-height: 9px
      }

      .ps196 {
        margin-left: 31px;
        margin-top: 6px
      }

      .s236 {
        min-width: 234px;
        width: 234px;
        min-height: 29px
      }

      .ps197 {
        margin-left: 1px
      }

      .s237 {
        min-width: 63px;
        width: 63px;
        min-height: 16px
      }

      .c182 {
        height: 16px
      }

      .ps198 {
        margin-top: -1px
      }

      .s238 {
        min-width: 234px;
        width: 234px;
        min-height: 14px;
        height: 14px
      }

      .input19 {
        width: 234px;
        height: 14px;
        font-size: 7px;
        line-height: 9px
      }

      .ps199 {
        margin-left: 32px;
        margin-top: 9px
      }

      .s239 {
        min-width: 63px;
        width: 63px;
        min-height: 14px
      }

      .c184 {
        height: 14px
      }

      .ps200 {
        margin-left: 31px;
        margin-top: 0
      }

      .s240 {
        min-width: 234px;
        width: 234px;
        min-height: 15px;
        height: 15px
      }

      .input20 {
        width: 234px;
        height: 15px;
        font-size: 7px;
        line-height: 9px
      }

      .ps201 {
        margin-left: 31px;
        margin-top: 4px
      }

      .s241 {
        min-width: 234px;
        width: 234px;
        min-height: 29px
      }

      .s242 {
        min-width: 99px;
        width: 99px;
        min-height: 17px
      }

      .c186 {
        height: 17px
      }

      .ps203 {
        margin-top: -3px
      }

      .s243 {
        min-width: 234px;
        width: 234px;
        min-height: 15px;
        height: 15px
      }

      .input21 {
        width: 234px;
        height: 15px;
        font-size: 7px;
        line-height: 9px
      }

      .ps204 {
        margin-left: 70px;
        margin-top: 20px
      }

      .s244 {
        min-width: 160px;
        width: 160px;
        min-height: 15px
      }

      .f46 {
        font-size: 7px;
        line-height: 9px;
        padding-top: 3px;
        padding-bottom: 3px
      }

      .btn22 {
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px
      }

      .s245 {
        width: 160px;
        height: 9px
      }

      .ps205 {
        margin-left: 25px;
        margin-top: 11px
      }

      .s246 {
        min-width: 240px;
        width: 240px;
        min-height: 27px
      }

      .s247 {
        min-width: 146px;
        width: 146px;
        min-height: 27px
      }

      .c189 {
        height: 27px
      }

      .ps206 {
        margin-left: 9px
      }

      .s248 {
        min-width: 85px;
        width: 85px;
        min-height: 15px
      }

      .btn23 {
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px
      }

      .s249 {
        width: 85px;
        height: 9px
      }

      .ps207 {
        margin-left: 129px;
        margin-top: 8px
      }

      .s250 {
        width: 40px;
        height: 10px
      }

      .f47 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 2px;
        padding-bottom: 2px
      }
    }

    @media (max-width:479px) {
      .s223 {
        min-width: 320px;
        min-height: 157px
      }

      .ps186 {
        margin-top: -157px
      }

      .s224 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .s225 {
        min-width: 320px;
        min-height: 9px
      }

      .ps187 {
        margin-top: 20px
      }

      .s226 {
        min-width: 320px;
        width: 320px
      }

      .s227 {
        width: 198px;
        margin-left: 65px
      }

      .s228 {
        min-width: 198px;
        width: 198px;
        min-height: 203px
      }

      .ps189 {
        margin-left: 2px;
        margin-top: 9px
      }

      .s229 {
        min-width: 196px;
        width: 196px;
        min-height: 12px
      }

      .ps190 {
        margin-left: 56px
      }

      .s230 {
        min-width: 14px;
        width: 14px;
        min-height: 12px;
        height: 12px
      }

      .i4 {
        left: 1px;
        width: 11px;
        height: 12px
      }

      .ps191 {
        margin-left: -70px;
        margin-top: 0
      }

      .s231 {
        min-width: 196px;
        width: 196px;
        min-height: 12px
      }

      .c176 {
        height: 12px
      }

      .f44 {
        font-size: 6px;
        line-height: 10px
      }

      .ps192 {
        margin-left: 126px;
        margin-top: -12px
      }

      .s232 {
        min-width: 13px;
        width: 13px;
        min-height: 12px;
        height: 12px
      }

      .i6 {
        left: 1px;
        width: 11px;
        height: 12px
      }

      .ps193 {
        margin-left: 21px;
        margin-top: 3px
      }

      .s233 {
        min-width: 154px;
        width: 154px;
        min-height: 10px
      }

      .c178 {
        height: 10px
      }

      .f45 {
        font-size: 4px;
        line-height: 6px
      }

      .ps194 {
        margin-left: 20px
      }

      .s234 {
        min-width: 156px;
        width: 156px;
        min-height: 11px;
        height: 11px
      }

      .input17 {
        width: 156px;
        height: 11px;
        font-size: 4px;
        line-height: 5px
      }

      .ps195 {
        margin-left: 21px;
        margin-top: 3px
      }

      .c180 {
        height: 10px
      }

      .s235 {
        min-width: 156px;
        width: 156px;
        min-height: 10px;
        height: 10px
      }

      .input18 {
        width: 156px;
        height: 10px;
        font-size: 4px;
        line-height: 5px
      }

      .ps196 {
        margin-left: 20px;
        margin-top: 3px
      }

      .s236 {
        min-width: 157px;
        width: 157px;
        min-height: 20px
      }

      .ps197 {
        margin-left: 1px
      }

      .s237 {
        min-width: 42px;
        width: 42px;
        min-height: 11px
      }

      .c182 {
        height: 11px
      }

      .ps198 {
        margin-top: -1px
      }

      .s238 {
        min-width: 157px;
        width: 157px;
        min-height: 10px;
        height: 10px
      }

      .input19 {
        width: 157px;
        height: 10px;
        font-size: 4px;
        line-height: 5px
      }

      .ps199 {
        margin-left: 21px;
        margin-top: 6px
      }

      .s239 {
        min-width: 42px;
        width: 42px;
        min-height: 9px
      }

      .c184 {
        height: 9px
      }

      .ps200 {
        margin-left: 20px;
        margin-top: 0
      }

      .s240 {
        min-width: 157px;
        width: 157px;
        min-height: 10px;
        height: 10px
      }

      .input20 {
        width: 157px;
        height: 10px;
        font-size: 4px;
        line-height: 5px
      }

      .ps201 {
        margin-left: 20px;
        margin-top: 3px
      }

      .s241 {
        min-width: 157px;
        width: 157px;
        min-height: 19px
      }

      .s242 {
        min-width: 66px;
        width: 66px;
        min-height: 11px
      }

      .c186 {
        height: 11px
      }

      .ps203 {
        margin-top: -2px
      }

      .s243 {
        min-width: 157px;
        width: 157px;
        min-height: 10px;
        height: 10px
      }

      .input21 {
        width: 157px;
        height: 10px;
        font-size: 4px;
        line-height: 5px
      }

      .ps204 {
        margin-left: 46px;
        margin-top: 13px
      }

      .s244 {
        min-width: 107px;
        width: 107px;
        min-height: 10px
      }

      .f46 {
        font-size: 4px;
        line-height: 5px;
        padding-top: 3px;
        padding-bottom: 2px
      }

      .btn22 {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px
      }

      .s245 {
        width: 107px;
        height: 5px
      }

      .ps205 {
        margin-left: 16px;
        margin-top: 8px
      }

      .s246 {
        min-width: 160px;
        width: 160px;
        min-height: 18px
      }

      .s247 {
        min-width: 98px;
        width: 98px;
        min-height: 18px
      }

      .c189 {
        height: 18px
      }

      .ps206 {
        margin-left: 6px
      }

      .s248 {
        min-width: 56px;
        width: 56px;
        min-height: 10px
      }

      .btn23 {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px
      }

      .s249 {
        width: 56px;
        height: 5px
      }

      .ps207 {
        margin-left: 86px;
        margin-top: 5px
      }

      .s250 {
        width: 26px;
        height: 7px
      }

      .f47 {
        font-size: 3px;
        line-height: 4px;
        padding-top: 2px;
        padding-bottom: 1px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c170 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c170 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c170 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c170 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:320px) {
      .c170 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-480.webp)
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c170 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960.webp)
      }
    }

    @media (min-width:480px) {
      .c170 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-768.webp)
      }
    }

    @media (min-width:768px) {
      .c170 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-960-1.webp)
      }
    }

    @media (min-width:960px) {
      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1200px) {
      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1600px) {
      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c170 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c170 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

      .err{
        min-width: 593px;
        width: 593px;
        min-height: 30px;
      }

      .box{
        z-index: 4;
        border: 0;
      }

.f1 {
    font-family: "Arial";
    font-size: 20px;
    font-weight: 400;
    font-style: normal;
    text-decoration: none;
    text-transform: none;
    color: #f30707;
    background-color: initial;
    line-height: 36px;
    letter-spacing: normal;
    text-shadow: none;
}

.p1001 {
    padding-top: 0;
    text-indent: 0;
    padding-bottom: 0;
    padding-right: 0;
    text-align: center;
}

.pwdshow{
    margin-left: 8px;
    max-width: 45px;
    font-family: "Helvetica Neue", sans-serif;
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
    text-align: center;
    display: inline-block;
    overflow: hidden;
    vertical-align: middle;
    white-space: nowrap;
}

.pwd1{
    margin-left: 10px;
    width: 13px;
    height: 13px;
    margin-top: 12px;
    vertical-align: top;
}

.pwd2{
    margin-left: 10px;
    width: 6px;
    height: 7px;
    margin-top: 12px;
    vertical-align: top;
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
  <div class="v23 ps185 s223 c170"></div>
  <div class="v23 ps186 s224 c171"></div>
  <div class="v23 ps185 s225 c172"></div>
  <div class="ps187 v24 s226">
    <div class="s227">
      <div class="v23 ps188 err box">
<?php
if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
$error = $_SESSION['error'];
}
?>
<p class="f1 p1001"><?php echo $error;?></p>;
}
      </div>
      <div class="v23 ps188 s228 c173">
	<form action="register.php" method="post">
        <div class="v23 ps189 s229 c174">
          <div class="v23 ps188 s229 w5">
            <div class="v23 ps190 s230 c175">
              <picture class="i5">
                <source srcset="images/paws-11.webp 1x, images/paws-22.webp 2x" type="image/webp" media="(max-width:479px)">
                <source srcset="images/paws-11.jpg 1x, images/paws-22.jpg 2x" media="(max-width:479px)">
                <source srcset="images/paws-18.webp 1x, images/paws-36.webp 2x" type="image/webp" media="(max-width:767px)">
                <source srcset="images/paws-18.jpg 1x, images/paws-36.jpg 2x" media="(max-width:767px)">
                <source srcset="images/paws-29.webp 1x, images/paws-58.webp 2x" type="image/webp" media="(max-width:959px)">
                <source srcset="images/paws-29.jpg 1x, images/paws-58.jpg 2x" media="(max-width:959px)">
                <source srcset="images/paws-36-1.webp 1x, images/paws-72.webp 2x" type="image/webp" media="(min-width:960px)">
                <source srcset="images/paws-36-1.jpg 1x, images/paws-72.jpg 2x" media="(min-width:960px)">
                <img src="images/paws-11.jpg" class="js29 i4">
              </picture>
            </div>
            <div class="v23 ps191 s231 c176">
              <p class="p10 f44">Welcome</p>
            </div>
            <div class="v23 ps192 s232 c177">
              <picture class="i5">
                <source srcset="images/paws-11-1.webp 1x, images/paws-22-1.webp 2x" type="image/webp" media="(max-width:479px)">
                <source srcset="images/paws-11-1.jpg 1x, images/paws-22-1.jpg 2x" media="(max-width:479px)">
                <source srcset="images/paws-17.webp 1x, images/paws-34.webp 2x" type="image/webp" media="(max-width:767px)">
                <source srcset="images/paws-17.jpg 1x, images/paws-34.jpg 2x" media="(max-width:767px)">
                <source srcset="images/paws-29-1.webp 1x, images/paws-58-1.webp 2x" type="image/webp" media="(max-width:959px)">
                <source srcset="images/paws-29-1.jpg 1x, images/paws-58-1.jpg 2x" media="(max-width:959px)">
                <source srcset="images/paws-36-1.webp 1x, images/paws-72.webp 2x" type="image/webp" media="(min-width:960px)">
                <source srcset="images/paws-36-1.jpg 1x, images/paws-72.jpg 2x" media="(min-width:960px)">
                <img src="images/paws-11-1.jpg" class="js30 i6">
              </picture>
            </div>
          </div>
        </div>
        <div class="v23 ps193 s233 c178">
          <p class="p11 f45">Email</p>
        </div>
        <div class="v23 ps194 s234 c179">
          <input type="text" name="reg_email" class="input17" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"></input>
        </div>
        <div class="v23 ps195 s233 c180">
          <p class="p11 f45">Username</p>
        </div>
        <div class="v23 ps194 s235 c181">
          <input type="text" name="reg_username" class="input18" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"></input>
        </div>
        <div class="v23 ps196 s236 c174">
          <div class="v23 ps188 s236 w5">
            <div class="v23 ps197 s237 c182">
              <p class="p11 f45">Name</p>
            </div>
            <div class="v23 ps198 s238 c183">
              <input type="text" name="reg_name" class="input19" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>"></input>
            </div>
          </div>
        </div>
        <div class="v23 ps199 s239 c184">
          <p class="p11 f45">Password</p>
        </div>
        <div class="v23 ps200 s240 c185">
          <input type="password" name="reg_password" class="input20">
          <input name="checkbox" type="checkbox" id="checkbox1" class="pwd1" onclick="showpwd1()">
          <label class="pwdshow">Show</label>
        </div>
        <div class="v23 ps201 s241 c174">
          <div class="v23 ps188 s241 w5">
            <div class="v23 ps202 s242 c186">
              <p class="p11 f45">Confirm Password</p>
            </div>
            <div class="v23 ps203 s243 c187">
              <input type="password" name="reg_cpassword" class="input21">
              <input name="checkboxc" type="checkbox" id="checkbox1c" class="pwd1" onclick="showpwd2()">
              <label class="pwdshow">Show</label>

            </div>
          </div>
        </div>
        <div class="v23 ps204 s244 c188">
          <!--a href="signin.html" class="f46 btn22 v25 s245">Sign Up</a-->
	  <input type="Submit" class="f46 btn22 v25 s245"/>
        </div>
        <div class="v23 ps205 s246 c174">
          <div class="v23 ps188 s247 c189">
            <p class="p10 f45">Already have an account?</p>
          </div>
          <div class="v23 ps206 s248 c190">
            <a href="signin.html" class="f46 btn23 v25 s249">Sign In</a>
          </div>
        </div>
        <div class="v26 ps207 s250 c191">
          <p class="f47"><a href="index.php">&lt;&lt; HOME &gt;&gt;</a></p>
        </div>
	</form>
      </div>
    </div>
  </div>
  <div class="v1 ps184 s166 c169"></div>
  <script>
    dpth = "/";
    ! function() {
      var s = ["js/jquery.c71cd4.js", "js/signup.790d10.js"],
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
  function showpwd1(){
    var checkBox = document.getElementById("checkbox1");

    if(checkBox.checked == true){
      $('.input20').attr('type', 'text');
    }
    else{
      $('.input20').attr('type', 'password');
    }
  }

  function showpwd2(){
    var checkBox = document.getElementById("checkbox1c");

    if(checkBox.checked == true){
      $('.input21').attr('type', 'text');
    }
    else{
      $('.input21').attr('type', 'password');
    }
  }
 
  </script>
</body>

</html>
