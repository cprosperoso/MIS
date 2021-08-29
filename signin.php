<?php
if (!session_id()) session_start();
//print_r($_SESSION);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>SignIn</title>
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

    .v19 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps166 {
      position: relative;
      margin-top: 0
    }

    .s201 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c152 {
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

    .webp .c152 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps167 {
      position: relative;
      margin-top: -472px
    }

    .s202 {
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

    .c153 {
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

    .s203 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c154 {
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

    .ps168 {
      position: relative;
      margin-top: 58px
    }

    .v20 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s204 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s205 {
      width: 593px;
      margin-left: 194px
    }

    .ps169 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s206 {
      min-width: 593px;
      width: 593px;
      min-height: 450px
    }

    .c155 {
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

    .ps170 {
      position: relative;
      margin-left: 6px;
      margin-top: 27px
    }

    .s207 {
      min-width: 587px;
      width: 587px;
      min-height: 39px
    }

    .w4 {
      line-height: 0
    }

    .ps171 {
      position: relative;
      margin-left: 170px;
      margin-top: 0
    }

    .s208 {
      min-width: 40px;
      width: 40px;
      min-height: 38px;
      height: 38px
    }

    .c157 {
      z-index: 6;
      pointer-events: auto
    }

    .i1 {
      position: absolute;
      left: 2px;
      width: 36px;
      height: 38px;
      top: 0;
      border: 0
    }

    .i2 {
      width: 100%;
      height: 100%;
      display: inline-block;
      -webkit-transform: translate3d(0, 0, 0)
    }

    .ps172 {
      position: relative;
      margin-left: 0;
      margin-top: -37px
    }

    .s209 {
      min-width: 587px;
      width: 587px;
      min-height: 37px
    }

    .c158 {
      z-index: 5;
      pointer-events: auto;
      overflow: hidden;
      height: 37px
    }

    .p8 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: center
    }

    .f39 {
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

    .ps173 {
      position: relative;
      margin-left: 377px;
      margin-top: -37px
    }

    .s210 {
      min-width: 40px;
      width: 40px;
      min-height: 38px;
      height: 38px
    }

    .c159 {
      z-index: 8;
      pointer-events: auto
    }

    .i3 {
      position: absolute;
      left: 2px;
      width: 36px;
      height: 38px;
      top: 0;
      border: 0
    }

    .ps174 {
      position: relative;
      margin-left: 56px;
      margin-top: 45px
    }

    .s211 {
      min-width: 471px;
      width: 471px;
      min-height: 197px
    }

    .s212 {
      min-width: 126px;
      width: 126px;
      min-height: 60px
    }

    .c160 {
      z-index: 9;
      pointer-events: auto;
      overflow: hidden;
      height: 60px
    }

    .p9 {
      padding-top: 0;
      text-indent: 0;
      padding-bottom: 0;
      padding-right: 0;
      text-align: left
    }

    .f40 {
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

    .ps175 {
      position: relative;
      margin-left: 0;
      margin-top: -56px;
      z-index: 15;
      pointer-events: auto
    }

    .s213 {
      min-width: 471px;
      width: 471px;
      min-height: 193px
    }

    .ps176 {
      position: relative;
      margin-left: 149px;
      margin-top: 0
    }

    .s214 {
      min-width: 322px;
      width: 322px;
      min-height: 27px;
      height: 27px
    }

    .c161 {
      z-index: 9
    }

    .input15 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 322px;
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

    .input15::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps177 {
      position: relative;
      margin-left: 149px;
      margin-top: 28px
    }

    .s215 {
      min-width: 322px;
      width: 322px;
      min-height: 27px;
      height: 27px
    }

    .c162 {
      z-index: 10
    }

    .input16 {
      border: 1px solid #fff;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: #fff;
      background-clip: padding-box;
      width: 250px;
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

    .input16::placeholder {
      color: rgb(169, 169, 169)
    }

    .ps178 {
      position: relative;
      margin-left: 277px;
      margin-top: 19px
    }

    .s216 {
      min-width: 193px;
      width: 193px;
      min-height: 30px
    }

    .c163 {
      z-index: 11;
      overflow: hidden;
      height: 30px
    }

    .f41 {
      font-family: "Bruno Ace";
      font-size: 16px;
      font-weight: 400;
      font-style: normal;
      text-decoration: underline;
      text-transform: none;
      color: #fff;
      background-color: initial;
      line-height: 27px;
      letter-spacing: normal;
      text-shadow: none
    }

    .ps179 {
      position: relative;
      margin-left: 0;
      margin-top: 32px
    }

    .s217 {
      min-width: 470px;
      width: 470px;
      min-height: 30px
    }

    .c164 {
      z-index: 13
    }

    .s218 {
      width: 470px;
      height: 30px
    }

    .submit3 {
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
      text-align: center;
      border: 0;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      background-color: #b8c8d2;
      background-clip: padding-box;
      padding-top: 6px;
      padding-bottom: 5px;
      padding-left: 0;
      padding-right: 0
    }

    .submit3:hover {
      background-color: #82939e;
      border-color: #020202;
      color: #020202
    }

    .submit3:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .ps180 {
      position: relative;
      margin-left: 0;
      margin-top: -137px
    }

    .c165 {
      z-index: 7;
      pointer-events: auto;
      overflow: hidden;
      height: 60px
    }

    .ps181 {
      position: relative;
      margin-left: 56px;
      margin-top: 44px
    }

    .s219 {
      min-width: 257px;
      width: 257px;
      min-height: 30px
    }

    .c166 {
      z-index: 12;
      pointer-events: auto;
      overflow: hidden;
      height: 30px
    }

    .ps182 {
      position: relative;
      margin-left: -13px;
      margin-top: 0
    }

    .s220 {
      min-width: 226px;
      width: 226px;
      min-height: 30px
    }

    .c167 {
      z-index: 14;
      pointer-events: auto
    }

    .f42 {
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

    .btn21 {
      border: 0;
      -webkit-border-radius: 10px;
      -moz-border-radius: 10px;
      border-radius: 10px;
      background-color: #b8c8d2;
      background-clip: padding-box;
      color: #020202
    }

    .btn21:hover {
      background-color: #82939e;
      border-color: #020202;
      color: #020202
    }

    .btn21:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    .v21 {
      display: inline-block;
      overflow: hidden;
      outline: 0
    }

    .s221 {
      width: 226px;
      padding-right: 0;
      height: 19px
    }

    .v22 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top;
      overflow: hidden;
      outline: 0
    }

    .ps183 {
      position: relative;
      margin-left: 257px;
      margin-top: 32px
    }

    .s222 {
      width: 80px;
      padding-right: 0;
      height: 21px
    }

    .f43 {
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

    .c168 {
      z-index: 16;
      pointer-events: auto;
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: #fff
    }

    .c168:hover {
      background-color: transparent;
      border-color: #020202;
      color: #020202
    }

    .c168:active {
      background-color: #52646f;
      border-color: #020202;
      color: #fff
    }

    @media (min-width:768px) and (max-width:959px) {
      .s201 {
        min-width: 768px;
        min-height: 378px
      }

      .ps167 {
        margin-top: -378px
      }

      .s202 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .s203 {
        min-width: 768px;
        min-height: 21px
      }

      .ps168 {
        margin-top: 47px
      }

      .s204 {
        min-width: 768px;
        width: 768px
      }

      .s205 {
        width: 475px;
        margin-left: 155px
      }

      .s206 {
        min-width: 475px;
        width: 475px;
        min-height: 360px
      }

      .ps170 {
        margin-left: 5px;
        margin-top: 21px
      }

      .s207 {
        min-width: 470px;
        width: 470px;
        min-height: 31px
      }

      .ps171 {
        margin-left: 136px
      }

      .s208 {
        min-width: 32px;
        width: 32px;
        min-height: 31px;
        height: 31px
      }

      .i1 {
        left: 1px;
        width: 29px;
        height: 31px
      }

      .ps172 {
        margin-top: -30px
      }

      .s209 {
        min-width: 470px;
        width: 470px;
        min-height: 30px
      }

      .c158 {
        height: 30px
      }

      .f39 {
        font-size: 16px;
        line-height: 27px
      }

      .ps173 {
        margin-left: 302px;
        margin-top: -30px
      }

      .s210 {
        min-width: 32px;
        width: 32px;
        min-height: 30px;
        height: 30px
      }

      .i3 {
        width: 29px;
        height: 30px
      }

      .ps174 {
        margin-left: 45px;
        margin-top: 36px
      }

      .s211 {
        min-width: 377px;
        width: 377px;
        min-height: 158px
      }

      .s212 {
        min-width: 101px;
        width: 101px;
        min-height: 48px
      }

      .c160 {
        height: 48px
      }

      .f40 {
        font-size: 12px;
        line-height: 20px
      }

      .ps175 {
        margin-top: -45px
      }

      .s213 {
        min-width: 377px;
        width: 377px;
        min-height: 155px
      }

      .ps176 {
        margin-left: 119px
      }

      .s214 {
        min-width: 258px;
        width: 258px;
        min-height: 22px;
        height: 22px
      }

      .input15 {
        width: 258px;
        height: 22px;
        font-size: 12px;
        line-height: 14px
      }

      .ps177 {
        margin-left: 119px;
        margin-top: 22px
      }

      .s215 {
        min-width: 258px;
        width: 258px;
        min-height: 22px;
        height: 22px
      }

      .input16 {
        width: 258px;
        height: 22px;
        font-size: 12px;
        line-height: 14px
      }

      .ps178 {
        margin-left: 222px;
        margin-top: 15px
      }

      .s216 {
        min-width: 154px;
        width: 154px;
        min-height: 24px
      }

      .c163 {
        height: 24px
      }

      .f41 {
        font-size: 12px;
        line-height: 20px
      }

      .ps179 {
        margin-top: 26px
      }

      .s217 {
        min-width: 376px;
        width: 376px;
        min-height: 24px
      }

      .s218 {
        width: 376px;
        height: 24px
      }

      .submit3 {
        font-size: 12px;
        line-height: 14px;
        padding-top: 5px
      }

      .ps180 {
        margin-top: -110px
      }

      .c165 {
        height: 48px
      }

      .ps181 {
        margin-left: 45px;
        margin-top: 35px
      }

      .s219 {
        min-width: 206px;
        width: 206px;
        min-height: 24px
      }

      .c166 {
        height: 24px
      }

      .ps182 {
        margin-left: -11px
      }

      .s220 {
        min-width: 181px;
        width: 181px;
        min-height: 24px
      }

      .f42 {
        font-size: 12px;
        line-height: 14px;
        padding-top: 5px
      }

      .s221 {
        width: 181px;
        height: 14px
      }

      .ps183 {
        margin-left: 206px;
        margin-top: 26px
      }

      .s222 {
        width: 64px;
        height: 17px
      }

      .f43 {
        font-size: 9px;
        line-height: 11px;
        padding-top: 3px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s201 {
        min-width: 480px;
        min-height: 236px
      }

      .ps167 {
        margin-top: -236px
      }

      .s202 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .s203 {
        min-width: 480px;
        min-height: 13px
      }

      .ps168 {
        margin-top: 30px
      }

      .s204 {
        min-width: 480px;
        width: 480px
      }

      .s205 {
        width: 297px;
        margin-left: 97px
      }

      .s206 {
        min-width: 297px;
        width: 297px;
        min-height: 225px
      }

      .ps170 {
        margin-left: 3px;
        margin-top: 13px
      }

      .s207 {
        min-width: 294px;
        width: 294px;
        min-height: 19px
      }

      .ps171 {
        margin-left: 85px
      }

      .s208 {
        min-width: 20px;
        width: 20px;
        min-height: 19px;
        height: 19px
      }

      .i1 {
        left: 1px;
        width: 18px;
        height: 19px
      }

      .ps172 {
        margin-top: -18px
      }

      .s209 {
        min-width: 294px;
        width: 294px;
        min-height: 18px
      }

      .c158 {
        height: 18px
      }

      .f39 {
        font-size: 10px;
        line-height: 17px
      }

      .ps173 {
        margin-left: 189px;
        margin-top: -18px
      }

      .s210 {
        min-width: 20px;
        width: 20px;
        min-height: 18px;
        height: 18px
      }

      .i3 {
        left: 1px;
        width: 17px;
        height: 18px
      }

      .ps174 {
        margin-left: 28px;
        margin-top: 23px
      }

      .s211 {
        min-width: 236px;
        width: 236px;
        min-height: 99px
      }

      .s212 {
        min-width: 63px;
        width: 63px;
        min-height: 30px
      }

      .c160 {
        height: 30px
      }

      .f40 {
        font-size: 7px;
        line-height: 11px
      }

      .ps175 {
        margin-top: -29px
      }

      .s213 {
        min-width: 236px;
        width: 236px;
        min-height: 98px
      }

      .ps176 {
        margin-left: 74px
      }

      .s214 {
        min-width: 162px;
        width: 162px;
        min-height: 15px;
        height: 15px
      }

      .input15 {
        width: 162px;
        height: 15px;
        font-size: 7px;
        line-height: 9px
      }

      .ps177 {
        margin-left: 74px;
        margin-top: 13px
      }

      .s215 {
        min-width: 162px;
        width: 162px;
        min-height: 14px;
        height: 14px
      }

      .input16 {
        width: 162px;
        height: 14px;
        font-size: 7px;
        line-height: 9px
      }

      .ps178 {
        margin-left: 139px;
        margin-top: 9px
      }

      .s216 {
        min-width: 96px;
        width: 96px;
        min-height: 15px
      }

      .c163 {
        height: 15px
      }

      .f41 {
        font-size: 7px;
        line-height: 11px
      }

      .ps179 {
        margin-top: 17px
      }

      .s217 {
        min-width: 235px;
        width: 235px;
        min-height: 15px
      }

      .s218 {
        width: 235px;
        height: 15px
      }

      .submit3 {
        font-size: 7px;
        line-height: 9px;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        padding-top: 3px;
        padding-bottom: 3px
      }

      .ps180 {
        margin-top: -69px
      }

      .c165 {
        height: 30px
      }

      .ps181 {
        margin-left: 28px;
        margin-top: 21px
      }

      .s219 {
        min-width: 129px;
        width: 129px;
        min-height: 15px
      }

      .c166 {
        height: 15px
      }

      .ps182 {
        margin-left: -7px
      }

      .s220 {
        min-width: 113px;
        width: 113px;
        min-height: 15px
      }

      .f42 {
        font-size: 7px;
        line-height: 9px;
        padding-top: 3px;
        padding-bottom: 3px
      }

      .btn21 {
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px
      }

      .s221 {
        width: 113px;
        height: 9px
      }

      .ps183 {
        margin-left: 129px;
        margin-top: 17px
      }

      .s222 {
        width: 40px;
        height: 10px
      }

      .f43 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 2px;
        padding-bottom: 2px
      }
    }

    @media (max-width:479px) {
      .s201 {
        min-width: 320px;
        min-height: 157px
      }

      .ps167 {
        margin-top: -157px
      }

      .s202 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .s203 {
        min-width: 320px;
        min-height: 9px
      }

      .ps168 {
        margin-top: 20px
      }

      .s204 {
        min-width: 320px;
        width: 320px
      }

      .s205 {
        width: 198px;
        margin-left: 65px
      }

      .s206 {
        min-width: 198px;
        width: 198px;
        min-height: 150px
      }

      .ps170 {
        margin-left: 2px;
        margin-top: 9px
      }

      .s207 {
        min-width: 196px;
        width: 196px;
        min-height: 12px
      }

      .ps171 {
        margin-left: 56px
      }

      .s208 {
        min-width: 14px;
        width: 14px;
        min-height: 12px;
        height: 12px
      }

      .i1 {
        left: 1px;
        width: 11px;
        height: 12px
      }

      .ps172 {
        margin-left: -70px;
        margin-top: 0
      }

      .s209 {
        min-width: 196px;
        width: 196px;
        min-height: 12px
      }

      .c158 {
        height: 12px
      }

      .f39 {
        font-size: 6px;
        line-height: 10px
      }

      .ps173 {
        margin-left: 126px;
        margin-top: -12px
      }

      .s210 {
        min-width: 13px;
        width: 13px;
        min-height: 12px;
        height: 12px
      }

      .i3 {
        left: 1px;
        width: 11px;
        height: 12px
      }

      .ps174 {
        margin-left: 18px;
        margin-top: 16px
      }

      .s211 {
        min-width: 158px;
        width: 158px;
        min-height: 66px
      }

      .s212 {
        min-width: 42px;
        width: 42px;
        min-height: 20px
      }

      .c160 {
        height: 20px
      }

      .f40 {
        font-size: 4px;
        line-height: 6px
      }

      .ps175 {
        margin-left: -42px;
        margin-top: 0
      }

      .s213 {
        min-width: 158px;
        width: 158px;
        min-height: 66px
      }

      .ps176 {
        margin-left: 49px
      }

      .s214 {
        min-width: 109px;
        width: 109px;
        min-height: 11px;
        height: 11px
      }

      .input15 {
        width: 109px;
        height: 11px;
        font-size: 4px;
        line-height: 5px
      }

      .ps177 {
        margin-left: 49px;
        margin-top: 8px
      }

      .s215 {
        min-width: 109px;
        width: 109px;
        min-height: 10px;
        height: 10px
      }

      .input16 {
        width: 109px;
        height: 10px;
        font-size: 4px;
        line-height: 5px
      }

      .ps178 {
        margin-left: 93px;
        margin-top: 5px
      }

      .s216 {
        min-width: 64px;
        width: 64px;
        min-height: 10px
      }

      .c163 {
        height: 10px
      }

      .f41 {
        font-size: 4px;
        line-height: 6px
      }

      .ps179 {
        margin-top: 12px
      }

      .s217 {
        min-width: 157px;
        width: 157px;
        min-height: 10px
      }

      .s218 {
        width: 157px;
        height: 10px
      }

      .submit3 {
        font-size: 4px;
        line-height: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        padding-top: 3px;
        padding-bottom: 2px
      }

      .ps180 {
        margin-top: -46px
      }

      .c165 {
        height: 20px
      }

      .ps181 {
        margin-left: 18px;
        margin-top: 14px
      }

      .s219 {
        min-width: 86px;
        width: 86px;
        min-height: 10px
      }

      .c166 {
        height: 10px
      }

      .ps182 {
        margin-left: -4px
      }

      .s220 {
        min-width: 75px;
        width: 75px;
        min-height: 10px
      }

      .f42 {
        font-size: 4px;
        line-height: 5px;
        padding-top: 3px;
        padding-bottom: 2px
      }

      .btn21 {
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px
      }

      .s221 {
        width: 75px;
        height: 5px
      }

      .ps183 {
        margin-left: 86px;
        margin-top: 11px
      }

      .s222 {
        width: 26px;
        height: 7px
      }

      .f43 {
        font-size: 3px;
        line-height: 4px;
        padding-top: 2px;
        padding-bottom: 1px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c152 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c152 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c152 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c152 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:320px) {
      .c152 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-480.webp)
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c152 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960.webp)
      }
    }

    @media (min-width:480px) {
      .c152 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-768.webp)
      }
    }

    @media (min-width:768px) {
      .c152 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-960-1.webp)
      }
    }

    @media (min-width:960px) {
      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1200px) {
      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1600px) {
      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c152 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c152 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

f1 {
    font-family: "EB Garamond";
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

.p1 {
    padding-top: 0;
    text-indent: 0;
    padding-bottom: 0;
    padding-right: 0;
    text-align: center;
}

.err {
    min-width: 593px;
    width: 593px;
    min-height: 30px
}

.box {
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

.pwdshow {
    margin-left: 3px;
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
    text-align: left;
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
  <div class="v19 ps166 s201 c152"></div>
  <div class="v19 ps167 s202 c153"></div>
  <div class="v19 ps166 s203 c154"></div>
  <div class="ps168 v20 s204">
    <div class="s205">
      <div class="v19 ps169 err box">
<?php
if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
$error = $_SESSION['error'];
}
?>
<p class="f1 p1001"><?php echo $error;?></p>;
}
      </div>
      <div class="v19 ps169 s206 c155">
       <!--form method="POST" action="login.php" class="v19 ps175 s213"-->
        <div class="v19 ps170 s207 c156">
          <div class="v19 ps169 s207 w4">
            <div class="v19 ps171 s208 c157">
              <picture class="i2">
                <source srcset="images/paws-11.webp 1x, images/paws-22.webp 2x" type="image/webp" media="(max-width:479px)">
                <source srcset="images/paws-11.jpg 1x, images/paws-22.jpg 2x" media="(max-width:479px)">
                <source srcset="images/paws-18.webp 1x, images/paws-36.webp 2x" type="image/webp" media="(max-width:767px)">
                <source srcset="images/paws-18.jpg 1x, images/paws-36.jpg 2x" media="(max-width:767px)">
                <source srcset="images/paws-29.webp 1x, images/paws-58.webp 2x" type="image/webp" media="(max-width:959px)">
                <source srcset="images/paws-29.jpg 1x, images/paws-58.jpg 2x" media="(max-width:959px)">
                <source srcset="images/paws-36-1.webp 1x, images/paws-72.webp 2x" type="image/webp" media="(min-width:960px)">
                <source srcset="images/paws-36-1.jpg 1x, images/paws-72.jpg 2x" media="(min-width:960px)">
                <img src="images/paws-11.jpg" class="js17 i1">
              </picture>
            </div>
            <div class="v19 ps172 s209 c158">
              <p class="p8 f39">Sign In Here</p>
            </div>
            <div class="v19 ps173 s210 c159">
              <picture class="i2">
                <source srcset="images/paws-11-1.webp 1x, images/paws-22-1.webp 2x" type="image/webp" media="(max-width:479px)">
                <source srcset="images/paws-11-1.jpg 1x, images/paws-22-1.jpg 2x" media="(max-width:479px)">
                <source srcset="images/paws-17.webp 1x, images/paws-34.webp 2x" type="image/webp" media="(max-width:767px)">
                <source srcset="images/paws-17.jpg 1x, images/paws-34.jpg 2x" media="(max-width:767px)">
                <source srcset="images/paws-29-1.webp 1x, images/paws-58-1.webp 2x" type="image/webp" media="(max-width:959px)">
                <source srcset="images/paws-29-1.jpg 1x, images/paws-58-1.jpg 2x" media="(max-width:959px)">
                <source srcset="images/paws-36-1.webp 1x, images/paws-72.webp 2x" type="image/webp" media="(min-width:960px)">
                <source srcset="images/paws-36-1.jpg 1x, images/paws-72.jpg 2x" media="(min-width:960px)">
                <img src="images/paws-11-1.jpg" class="js18 i3">
              </picture>
            </div>
          </div>
        </div>
        <div class="v19 ps174 s211 c156">
          <div class="v19 ps169 s211 w4">
            <div class="v19 ps169 s212 c160">
              <p class="p9 f40">Username</p>
            </div>
            <form method="POST" action="login.php" class="v19 ps175 s213">
              <div class="v19 ps176 s214 c161">
                <input type="text" name="username" autocorrect="off" autocapitalize="off" autocomplete="off" class="input15">
              </div>
              <div class="v19 ps177 s215 c162">
                <input type="password" name="password" autocorrect="off" autocapitalize="off" autocomplete="off" class="input16">
                <input name="checkbox" type="checkbox" id="checkbox1" class="pwd1" onclick="showpwd1()">
                <label class="pwdshow">Show</label>
              </div>
              <div class="v19 ps178 s216 c163">
                <p class="p8"><span class="f41"><a href="changepwd.php">Forgot Password</a></span></p>
              </div>
              <div class="v19 ps179 s217 c164">
                <input type="submit" value="Sign In" name="_sign_in" class="js19 s218 submit3">
              </div>
            <div class="v19 ps180 s212 c165">
              <p class="p9 f40">Password</p>
            </div>
	   </form>
          </div>
        </div>
        <div class="v19 ps181 s217 c156">
          <div class="v19 ps169 s219 c166">
            <p class="p8 f40">No Account Yet?</p>
          </div>
          <div class="v19 ps182 s220 c167">
            <a href="signup.php" class="f42 btn21 v21 s221">Sign Up</a>
          </div>
        </div>
        <div class="v22 ps183 s222 c168">
          <p class="f43"><a href="index.php">&lt;&lt; HOME &gt;&gt;</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="v1 ps165 s166 c151"></div>
  <script>
    dpth = "/";
    ! function() {
      var s = ["js/jquery.c71cd4.js", "js/signin.790d10.js"],
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
      $('.input16').attr('type', 'text');
    }
    else{
      $('.input16').attr('type', 'password');
    }
  }
  </script>
</body>

</html>
