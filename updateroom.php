<?php
if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");

$booking_ref=$_POST['booking_ref'];

$db = new SQLite3('park_city.db');

//$stmt=$db->prepare("select tr.booking_ref, tr.email, ps.service, tr.date_in, tr.date_out, tr.time_in, tr.amount, ts.transstat from transactions tr, pet_services ps, trans_status ts where tr.booking_ref=:booking_num and tr.service=ps.srv_code and tr.trans_stat=ts.transstat_code");
$stmt=$db->prepare("select service from transactions where booking_ref=:booking_ref");
$stmt->bindValue(':booking_num', $booking_num);
$result = $stmt->execute();
$row = $result->fetchArray();

$stmt->close();
$db->close();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>UpdateBooking</title>
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
      background: #000 url(images/dark_mosaic.png) repeat center top
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
      background-color: #000;
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
      min-height: 350px;
      height: 380px
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
      opacity: 1.00;
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
      margin-top: 19px
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
      color: #000;
      background-color: initial;
      line-height: 47px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps208 {
      position: relative;
      margin-left: 186px;
      margin-top: 24px
    }

    .s253 {
      min-width: 493px;
      width: 493px;
      min-height: 47px
    }

    .ps209 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s254 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c214 {
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
      color: #000;
      background-color: initial;
      line-height: 26px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps210 {
      position: relative;
      margin-left: 35px;
      margin-top: 0
    }

    .s255 {
      min-width: 285px;
      width: 285px;
      min-height: 47px
    }

    .w5 {
      line-height: 0
    }

    .s256 {
      min-width: 205px;
      //width: 205px;
      min-height: 35px
    }

    .c215 {
      z-index: 12;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f55 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 20px;
      font-weight: 700;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #155982;
      background-color: initial;
      line-height: 30px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps211 {
      position: relative;
      margin-left: 0;
      margin-top: -10px
    }

    .s257 {
      min-width: 285px;
      width: 285px;
      min-height: 22px
    }

    .c216 {
      z-index: 16;
      pointer-events: auto;
      overflow: hidden;
      height: 22px
    }

    .f56 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
      font-weight: 400;
      font-style: italic;
      text-decoration: none;
      text-transform: none;
      color: #000;
      background-color: initial;
      line-height: 32px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps212 {
      position: relative;
      margin-left: 74px;
      margin-top: 0
    }

    .s258 {
      min-width: 605px;
      width: 605px;
      min-height: 35px
    }

    .s259 {
      min-width: 118px;
      width: 118px;
      min-height: 35px
    }

    .c217 {
      z-index: 7;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s260 {
      min-width: 176px;
      width: 176px;
      min-height: 35px
    }

    .c218 {
      z-index: 8;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f57 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #155982;
      background-color: initial;
      line-height: 29px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps213 {
      position: relative;
      margin-left: 2px;
      margin-top: 0
    }

    .s261 {
      min-width: 113px;
      width: 113px;
      min-height: 35px
    }

    .c219 {
      z-index: 14;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s262 {
      min-width: 196px;
      width: 196px;
      min-height: 35px
    }

    .c220 {
      z-index: 17;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps214 {
      position: relative;
      margin-left: 186px;
      margin-top: 8px
    }

    .s263 {
      min-width: 388px;
      width: 388px;
      min-height: 35px
    }

    .c221 {
      z-index: 15;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps215 {
      position: relative;
      margin-left: 38px;
      margin-top: 0
    }

    .s264 {
      min-width: 177px;
      width: 177px;
      min-height: 35px
    }

    .c222 {
      z-index: 18;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f58 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #155982;
      background-color: initial;
      line-height: 26px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps216 {
      position: relative;
      margin-left: 186px;
      margin-top: 0
    }

    .s265 {
      min-width: 388px;
      width: 388px;
      min-height: 35px
    }

    .s266 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c223 {
      z-index: 10;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s267 {
      min-width: 177px;
      width: 177px;
      min-height: 35px
    }

    .c224 {
      z-index: 11;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s268 {
      min-width: 493px;
      width: 493px;
      min-height: 35px
    }

    .s269 {
      min-width: 173px;
      width: 173px;
      min-height: 35px
    }

    .c225 {
      z-index: 19;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s270 {
      min-width: 282px;
      width: 282px;
      min-height: 35px
    }

    .c226 {
      z-index: 20;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s271 {
      min-width: 493px;
      width: 493px;
      min-height: 35px
    }

    .c227 {
      z-index: 21;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .s272 {
      min-width: 282px;
      width: 282px;
      min-height: 35px
    }

    .c228 {
      z-index: 22;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .ps217 {
      position: relative;
      margin-left: 186px;
      margin-top: 14px
    }

    .c229 {
      z-index: 23;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .c230 {
      z-index: 24;
      pointer-events: auto;
      overflow: hidden;
      height: 35px
    }

    .f59 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 16px;
      font-weight: 700;
      font-style: normal;
      text-decoration: none;
      text-transform: none;
      color: #155982;
      background-color: initial;
      line-height: 26px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps218 {
      position: relative;
      margin-left: 153px;
      margin-top: 19px
    }

    .s273 {
      min-width: 447px;
      width: 447px;
      min-height: 40px
    }

    .s274 {
      min-width: 207px;
      width: 207px;
      min-height: 40px
    }

    .c231 {
      z-index: 9;
      pointer-events: auto
    }

    .f60 {
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
      background-color: #155982;
      background-clip: padding-box;
      color: #fff
    }

    .btn25:hover {
      background-color: transparent;
      border-color: #000;
      color: #000
    }

    .btn25:active {
      background-color: #155982;
      border-color: #000;
      color: #fff
    }

    .v27 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s275 {
      width: 205px;
      padding-right: 0;
      height: 22px
    }

    .ps219 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .c232 {
      z-index: 25;
      pointer-events: auto
    }

    .btn26 {
      border: 1px dotted #000;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #155982;
      background-clip: padding-box;
      color: #fff;
      height: 41px
    }

    .btn26:hover {
      background-color: transparent;
      border-color: #000;
      color: #000
    }

    .btn26:active {
      background-color: #155982;
      border-color: #000;
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
        margin-top: 15px
      }

      .s252 {
        min-width: 589px;
        width: 589px;
        min-height: 38px
      }

      .c212 {
        height: 38px
      }

      .f53 {
        font-size: 20px;
        line-height: 37px
      }

      .ps208 {
        margin-left: 149px;
        margin-top: 19px
      }

      .s253 {
        min-width: 394px;
        width: 394px;
        min-height: 38px
      }

      .s254 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c214 {
        height: 28px
      }

      .f54 {
        font-size: 12px;
        line-height: 20px
      }

      .ps210 {
        margin-left: 28px
      }

      .s255 {
        min-width: 228px;
        width: 228px;
        min-height: 38px
      }

      .s256 {
        min-width: 164px;
        width: 164px;
        min-height: 28px
      }

      .c215 {
        height: 28px
      }

      .f55 {
        font-size: 16px;
        line-height: 26px
      }

      .ps211 {
        margin-top: -8px
      }

      .s257 {
        min-width: 228px;
        width: 228px;
        min-height: 18px
      }

      .c216 {
        height: 18px
      }

      .f56 {
        font-size: 9px;
        line-height: 14px
      }

      .ps212 {
        margin-left: 59px
      }

      .s258 {
        min-width: 484px;
        width: 484px;
        min-height: 28px
      }

      .s259 {
        min-width: 94px;
        width: 94px;
        min-height: 28px
      }

      .c217 {
        height: 28px
      }

      .s260 {
        min-width: 141px;
        width: 141px;
        min-height: 28px
      }

      .c218 {
        height: 28px
      }

      .f57 {
        font-size: 14px;
        line-height: 23px
      }

      .s261 {
        min-width: 90px;
        width: 90px;
        min-height: 28px
      }

      .c219 {
        height: 28px
      }

      .s262 {
        min-width: 157px;
        width: 157px;
        min-height: 28px
      }

      .c220 {
        height: 28px
      }

      .ps214 {
        margin-left: 149px;
        margin-top: 6px
      }

      .s263 {
        min-width: 310px;
        width: 310px;
        min-height: 28px
      }

      .c221 {
        height: 28px
      }

      .ps215 {
        margin-left: 30px
      }

      .s264 {
        min-width: 142px;
        width: 142px;
        min-height: 28px
      }

      .c222 {
        height: 28px
      }

      .f58 {
        font-size: 12px;
        line-height: 20px
      }

      .ps216 {
        margin-left: 149px
      }

      .s265 {
        min-width: 310px;
        width: 310px;
        min-height: 28px
      }

      .s266 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c223 {
        height: 28px
      }

      .s267 {
        min-width: 142px;
        width: 142px;
        min-height: 28px
      }

      .c224 {
        height: 28px
      }

      .s268 {
        min-width: 394px;
        width: 394px;
        min-height: 28px
      }

      .s269 {
        min-width: 138px;
        width: 138px;
        min-height: 28px
      }

      .c225 {
        height: 28px
      }

      .s270 {
        min-width: 226px;
        width: 226px;
        min-height: 28px
      }

      .c226 {
        height: 28px
      }

      .s271 {
        min-width: 394px;
        width: 394px;
        min-height: 28px
      }

      .c227 {
        height: 28px
      }

      .s272 {
        min-width: 226px;
        width: 226px;
        min-height: 28px
      }

      .c228 {
        height: 28px
      }

      .ps217 {
        margin-left: 149px;
        margin-top: 11px
      }

      .c229 {
        height: 28px
      }

      .c230 {
        height: 28px
      }

      .f59 {
        font-size: 12px;
        line-height: 20px
      }

      .ps218 {
        margin-left: 122px;
        margin-top: 15px
      }

      .s273 {
        min-width: 358px;
        width: 358px;
        min-height: 33px
      }

      .s274 {
        min-width: 166px;
        width: 166px;
        min-height: 33px
      }

      .f60 {
        font-size: 14px;
        line-height: 16px;
        padding-bottom: 7px
      }

      .s275 {
        width: 164px;
        height: 16px
      }

      .ps219 {
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
        margin-top: 9px
      }

      .s252 {
        min-width: 368px;
        width: 368px;
        min-height: 24px
      }

      .c212 {
        height: 24px
      }

      .f53 {
        font-size: 12px;
        line-height: 22px
      }

      .ps208 {
        margin-left: 93px;
        margin-top: 12px
      }

      .s253 {
        min-width: 246px;
        width: 246px;
        min-height: 24px
      }

      .s254 {
        min-width: 86px;
        width: 86px;
        min-height: 17px
      }

      .c214 {
        height: 17px
      }

      .f54 {
        font-size: 7px;
        line-height: 11px
      }

      .ps210 {
        margin-left: 18px
      }

      .s255 {
        min-width: 142px;
        width: 142px;
        min-height: 24px
      }

      .s256 {
        min-width: 102px;
        width: 102px;
        min-height: 17px
      }

      .c215 {
        height: 17px
      }

      .f55 {
        font-size: 10px;
        line-height: 16px
      }

      .ps211 {
        margin-top: -5px
      }

      .s257 {
        min-width: 142px;
        width: 142px;
        min-height: 12px
      }

      .c216 {
        height: 12px
      }

      .f56 {
        font-size: 5px;
        line-height: 7px
      }

      .ps212 {
        margin-left: 37px
      }

      .s258 {
        min-width: 302px;
        width: 302px;
        min-height: 17px
      }

      .s259 {
        min-width: 58px;
        width: 58px;
        min-height: 17px
      }

      .c217 {
        height: 17px
      }

      .s260 {
        min-width: 88px;
        width: 88px;
        min-height: 17px
      }

      .c218 {
        height: 17px
      }

      .f57 {
        font-size: 8px;
        line-height: 12px
      }

      .s261 {
        min-width: 56px;
        width: 56px;
        min-height: 17px
      }

      .c219 {
        height: 17px
      }

      .s262 {
        min-width: 98px;
        width: 98px;
        min-height: 17px
      }

      .c220 {
        height: 17px
      }

      .ps214 {
        margin-left: 93px;
        margin-top: 4px
      }

      .s263 {
        min-width: 194px;
        width: 194px;
        min-height: 17px
      }

      .c221 {
        height: 17px
      }

      .ps215 {
        margin-left: 19px
      }

      .s264 {
        min-width: 89px;
        width: 89px;
        min-height: 17px
      }

      .c222 {
        height: 17px
      }

      .f58 {
        font-size: 7px;
        line-height: 11px
      }

      .ps216 {
        margin-left: 93px
      }

      .s265 {
        min-width: 194px;
        width: 194px;
        min-height: 18px
      }

      .s266 {
        min-width: 86px;
        width: 86px;
        min-height: 18px
      }

      .c223 {
        height: 18px
      }

      .s267 {
        min-width: 89px;
        width: 89px;
        min-height: 18px
      }

      .c224 {
        height: 18px
      }

      .s268 {
        min-width: 246px;
        width: 246px;
        min-height: 17px
      }

      .s269 {
        min-width: 86px;
        width: 86px;
        min-height: 17px
      }

      .c225 {
        height: 17px
      }

      .s270 {
        min-width: 141px;
        width: 141px;
        min-height: 17px
      }

      .c226 {
        height: 17px
      }

      .s271 {
        min-width: 246px;
        width: 246px;
        min-height: 18px
      }

      .c227 {
        height: 18px
      }

      .s272 {
        min-width: 141px;
        width: 141px;
        min-height: 18px
      }

      .c228 {
        height: 18px
      }

      .ps217 {
        margin-left: 93px;
        margin-top: 7px
      }

      .c229 {
        height: 17px
      }

      .c230 {
        height: 17px
      }

      .f59 {
        font-size: 7px;
        line-height: 11px
      }

      .ps218 {
        margin-left: 76px;
        margin-top: 9px
      }

      .s273 {
        min-width: 224px;
        width: 224px;
        min-height: 22px
      }

      .s274 {
        min-width: 104px;
        width: 104px;
        min-height: 22px
      }

      .f60 {
        font-size: 8px;
        line-height: 10px;
        padding-top: 5px;
        padding-bottom: 5px
      }

      .s275 {
        width: 102px;
        height: 10px
      }

      .ps219 {
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
        margin-top: 6px
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
        margin-left: 62px;
        margin-top: 8px
      }

      .s253 {
        min-width: 164px;
        width: 164px;
        min-height: 16px
      }

      .s254 {
        min-width: 58px;
        width: 58px;
        min-height: 11px
      }

      .c214 {
        height: 11px
      }

      .f54 {
        font-size: 4px;
        line-height: 6px
      }

      .ps210 {
        margin-left: 12px
      }

      .s255 {
        min-width: 94px;
        width: 94px;
        min-height: 16px
      }

      .s256 {
        min-width: 68px;
        width: 68px;
        min-height: 11px
      }

      .c215 {
        height: 11px
      }

      .f55 {
        font-size: 6px;
        line-height: 10px
      }

      .ps211 {
        margin-top: -3px
      }

      .s257 {
        min-width: 94px;
        width: 94px;
        min-height: 8px
      }

      .c216 {
        height: 8px
      }

      .f56 {
        font-size: 3px;
        line-height: 5px
      }

      .ps212 {
        margin-left: 25px
      }

      .s258 {
        min-width: 201px;
        width: 201px;
        min-height: 11px
      }

      .s259 {
        min-width: 39px;
        width: 39px;
        min-height: 11px
      }

      .c217 {
        height: 11px
      }

      .s260 {
        min-width: 58px;
        width: 58px;
        min-height: 11px
      }

      .c218 {
        height: 11px
      }

      .f57 {
        font-size: 5px;
        line-height: 7px
      }

      .s261 {
        min-width: 37px;
        width: 37px;
        min-height: 11px
      }

      .c219 {
        height: 11px
      }

      .s262 {
        min-width: 65px;
        width: 65px;
        min-height: 11px
      }

      .c220 {
        height: 11px
      }

      .ps214 {
        margin-left: 62px;
        margin-top: 3px
      }

      .s263 {
        min-width: 130px;
        width: 130px;
        min-height: 11px
      }

      .c221 {
        height: 11px
      }

      .ps215 {
        margin-left: 12px
      }

      .s264 {
        min-width: 60px;
        width: 60px;
        min-height: 11px
      }

      .c222 {
        height: 11px
      }

      .f58 {
        font-size: 4px;
        line-height: 6px
      }

      .ps216 {
        margin-left: 62px
      }

      .s265 {
        min-width: 130px;
        width: 130px;
        min-height: 12px
      }

      .s266 {
        min-width: 58px;
        width: 58px;
        min-height: 12px
      }

      .c223 {
        height: 12px
      }

      .s267 {
        min-width: 60px;
        width: 60px;
        min-height: 12px
      }

      .c224 {
        height: 12px
      }

      .s268 {
        min-width: 164px;
        width: 164px;
        min-height: 12px
      }

      .s269 {
        min-width: 58px;
        width: 58px;
        min-height: 12px
      }

      .c225 {
        height: 12px
      }

      .s270 {
        min-width: 94px;
        width: 94px;
        min-height: 12px
      }

      .c226 {
        height: 12px
      }

      .s271 {
        min-width: 164px;
        width: 164px;
        min-height: 12px
      }

      .c227 {
        height: 12px
      }

      .s272 {
        min-width: 94px;
        width: 94px;
        min-height: 12px
      }

      .c228 {
        height: 12px
      }

      .ps217 {
        margin-left: 62px;
        margin-top: 4px
      }

      .c229 {
        height: 12px
      }

      .c230 {
        height: 12px
      }

      .f59 {
        font-size: 4px;
        line-height: 6px
      }

      .ps218 {
        margin-left: 51px;
        margin-top: 5px
      }

      .s273 {
        min-width: 150px;
        width: 150px;
        min-height: 16px
      }

      .s274 {
        min-width: 70px;
        width: 70px;
        min-height: 16px
      }

      .f60 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 4px;
        padding-bottom: 4px
      }

      .s275 {
        width: 68px;
        height: 6px
      }

      .ps219 {
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
  <link onload="this.media='all';this.onload=null;" rel="stylesheet" href="css/site.2264d3.css" media="print">
  <!--[if lte IE 7]>
<link rel="stylesheet" href="css/site.2264d3-lteIE7.css" type="text/css">
<![endif]-->
  <!--[if lte IE 8]>
<link rel="stylesheet" href="css/site.2264d3-lteIE8.css" type="text/css">
<![endif]-->
  <!--[if gte IE 9]>
<link rel="stylesheet" href="css/site.2264d3-gteIE9.css" type="text/css">
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
          <p class="p14 f53">Room to Update</p>
        </div>
        <div class="v25 ps208 s253 c213">
          <div class="v25 ps209 s254 c214">
            <p class="p15 f54">Room Number :</p>
          </div>
          <div class="v25 ps210 s255 w5">
            <div class="v25 ps209 s256 c215">
              <!--p class="p15 f55">booking reference</p-->
              <input id="room_name" name="room_name" type="text" class="p15 f55"></input>
            </div>
            <div class="v25 ps211 s257 c216">
              <p class="p15 f56">&lt;Select from A1-A6, B1-B4, C1-C2 then press Enter&gt;</p>
            </div>
          </div>
        </div>
        <div class="v25 ps214 s263 c213">
          <div class="v25 ps209 s254 c221">
            <p class="p15 f54">Room Size :</p>
          </div>
          <div class="v25 ps215 s264 c222">
            <!--p class="p15 f58">check in date and time</p-->
            <div id="room_sz" class="p15 f58">room size</div>
          </div>
        </div>
        <div class="v25 ps216 s268 c213">
          <div class="v25 ps209 s269 c225">
            <p class="p15 f54">Reserved to :</p>
          </div>
          <div class="v25 ps215 s270 c226">
            <!--p class="p15 f58">check out date and time</p-->
            <div id="res_booking" class="p15 f58">N/A</div>
          </div>
        </div>
        <div class="v25 ps217 s268 c213">
          <div class="v25 ps209 s269 c229">
            <p class="p15 f54">Status</p>
          </div>
          <div class="v25 ps215 s270 c230">
            <div id="status1">
            <select class="p15 f54" name="status" id="status">
               <option class="p15 f54" value="VAC">Vacant</option>
               <option class="p15 f54" value="RES">Reserved</option>
               <option class="p15 f54" value="OCC">Occupied</option>
               <option class="p15 f54" value="CO">Check Out</option>
               <option class="p15 f54" value="HLD">Hold</option>
            </select>
            </div>
          </div>
        </div>
        <div class="v25 ps218 s273 c213">
          <div class="v25 ps209 s274 c231">
            <a href="./" class="f60 btn25 v27 s275">&lt;&lt; Cancel</a>
          </div>
          <div class="v25 ps219 s274 c232">
            <!--a href="./" class="f60 btn26 v27 s275">Continue &gt;&gt;</a-->
            <button onclick="myFunction()" id="myBtn" class="f60 btn26 v27 s275">Update &gt;&gt;</button>
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
          <p>Room status was successfully updated!</p>
          <p>&nbsp;</p>
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
      var s = ["js/jquery.c71cd4.js", "js/updatebooking.2264d3.js"],
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
      updateRoomStat();
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
      $(document).on("keypress", "input", function(e){
          if(e.which == 13){
              var inputVal = $(this).val();
              //alert("You've entered: " + inputVal);
              retrieveRoom();
          }
      });
  </script>
  <script>
  function retrieveRoom(){

          var room_name = document.getElementById("room_name").value;
          $.ajax({
                  url: 'room_retrieve.php',
                  type: 'POST',
                  dataType: 'json',
                  data:{
                    room_name: room_name
                  },
                  success: function(data)
                  {
                    var room_name = data[0];
                    var room_sz = data[1];
                    //var res_booking = res_booking[2];
                    var room_status = data[2];
                    var res_booking = data[3];
                    //var booking_ref = data[3];
                    $('#room_name').html("<p><b>Room Name: "+room_name+"<b><p>");
                    $('#room_sz').html("<p>"+room_sz+"</p>");
                    $('#res_booking').html("<p>"+res_booking+"</p>");
                    $('#status').val(room_status);
                    $('#status').select2().trigger('change');
                  }
          });
  }

  </script>
  <script>
function updateRoomStat(){

	var jsvar = document.getElementById("room_name").value; 
	var jsvar1 = document.getElementById("status").value; 
        var request = $.ajax({
   		url: 'admin_rmupdate.php',
   		type: 'POST',
   		dataType: 'html',
                data:{
                     room_name: jsvar,
                     tr_status: jsvar1
                }
 	});

	request.done( function ( data ) {
 		$('#myBtn').html( data );
 	});

	request.fail( function ( jqXHR, textStatus) {
 		console.log( 'Sorry: ' + textStatus );
 	});

}

</script>
</body>

</html>
