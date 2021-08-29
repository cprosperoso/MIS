<?php
if (!session_id()) session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Gallery</title>
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

    .slick-slider {
      position: relative;
      display: block;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-touch-action: pan-y;
      touch-action: pan-y;
      -ms-touch-action: none;
      -webkit-tap-highlight-color: transparent;
    }

    .slick-list {
      position: relative;
      display: block;
      margin: 0;
      padding: 0;
    }

    .slick-list:focus {
      outline: none;
    }

    .slick-loading .slick-list {
      background: white url("css/ajax-loader.gif") center center no-repeat;
    }

    .slick-list.dragging {
      cursor: pointer;
    }

    .slick-slider .slick-list,
    .slick-track,
    .slick-slide {
      -webkit-transform: translate(0, 0);
      -moz-transform: translate(0, 0);
      -ms-transform: translate(0, 0);
      -o-transform: translate(0, 0);
      transform: translate(0, 0);
    }

    .slick-track {
      position: relative;
      left: 0;
      top: 0;
      display: block;
      zoom: 1;
    }

    .slick-track:before,
    .slick-track:after {
      content: "";
      display: table;
    }

    .slick-track:after {
      clear: both;
    }

    .slick-loading .slick-track {
      visibility: hidden;
    }

    .slick-slide {
      position: static;
      float: left;
      height: 100%;
      min-height: 1px;
      display: none;
    }

    .slick-slide img {
      display: block;
    }

    .slick-slide.slick-loading img {
      display: none;
    }

    .slick-slide.dragging img {
      pointer-events: none;
    }

    .slick-initialized .slick-slide {
      display: block;
      visibility: visible !important;
    }

    .slick-loading .slick-slide {
      visibility: hidden;
    }

    .slick-vertical .slick-slide {
      display: block;
      height: auto;
      border: 1px solid transparent;
    }

    @font-face {
      font-family: "slick";
      src: url("css/slick.eot");
      src: url("css/slick.eot?#iefix") format("embedded-opentype"), url("css/slick.woff") format("woff"), url("css/slick.ttf") format("truetype"), url("css/slick.svg#slick") format("svg");
      font-weight: normal;
      font-style: normal;
    }

    .slick-prev:before {
      content: "\2190";
    }

    .slick-next:before {
      content: "\2192";
    }

    .slick-prev,
    .slick-next {
      position: absolute;
      display: block;
      line-height: 0;
      font-size: 0;
      cursor: pointer;
      background: transparent;
      color: transparent;
      top: 50%;
      padding: 0;
      border: none;
      outline: none;
      visibility: visible !important;
    }

    .slick-prev:hover,
    .slick-prev:focus,
    .slick-next:hover,
    .slick-next:focus {
      outline: none;
      background: transparent;
      color: transparent;
    }

    .slick-prev:hover:before,
    .slick-prev:focus:before,
    .slick-next:hover:before,
    .slick-next:focus:before {
      opacity: 1;
    }

    .slick-prev.slick-disabled:before,
    .slick-next.slick-disabled:before {
      opacity: 0.25;
    }

    .slick-prev:before,
    .slick-next:before {
      font-family: "slick";
      line-height: 1;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .slick-dots {
      position: absolute;
      list-style: none;
      display: block;
      text-align: center;
      padding: 0;
      width: 100%;
      visibility: visible;
    }

    .slick-dots li {
      position: relative;
      display: inline-block;
      padding: 0;
      cursor: pointer;
    }

    .slick-dots li button:hover,
    .slick-dots li button:focus {
      outline: none;
    }

    .slick-dots li button:hover:before,
    .slick-dots li button:focus:before {
      opacity: 1;
    }

    .slick-dots li button {
      border: 0;
      background: transparent;
      display: block;
      outline: none;
      line-height: 0;
      font-size: 0;
      color: transparent;
      padding: 5px;
      cursor: pointer;
    }

    .slick-dots li button:before {
      position: absolute;
      top: 0;
      left: 0;
      content: "\2022";
      font-family: "slick";
      text-align: center;
      color: black;
      opacity: 0.25;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    [dir="rtl"] .slick-slide {
      float: right;
    }

    [dir="rtl"] .slick-next:before {
      content: "\2190";
    }

    [dir="rtl"] .slick-prev:before {
      content: "\2192";
    }

    .slidex {
      display: none
    }

    #b {
      background: #020202 url(images/dark_mosaic.png) repeat center top
    }

    .v14 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top
    }

    .ps156 {
      position: relative;
      margin-top: 0
    }

    .s167 {
      width: 100%;
      min-width: 960px;
      min-height: 472px
    }

    .c141 {
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

    .webp .c141 {
      background-image: url(images/parkcityhome-320.webp)
    }

    .ps157 {
      position: relative;
      margin-top: -472px
    }

    .s168 {
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

    .c142 {
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

    .s169 {
      width: 100%;
      min-width: 960px;
      min-height: 27px
    }

    .c143 {
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

    .v15 {
      display: block;
      *display: block;
      zoom: 1;
      vertical-align: top
    }

    .s170 {
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s171 {
      width: 753px;
      margin-left: 100px
    }

    .ps158 {
      position: relative;
      margin-left: 0;
      margin-top: 0
    }

    .s172 {
      min-width: 753px;
      width: 753px;
      min-height: 27px
    }

    .v16 {
      display: inline-block;
      *display: inline;
      zoom: 1;
      vertical-align: top;
      //overflow: hidden;
      //outline: 0
    }

    .s173 {
      width: 120px;
      padding-right: 0;
      height: 27px
    }

    .f38 {
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

    .c145 {
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

    .c145:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .c145:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps159 {
      position: relative;
      margin-left: 41px;
      margin-top: 0
    }

    .s174 {
      min-width: 120px;
      width: 120px;
      min-height: 27px
    }

    .c146 {
      z-index: 5;
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

    .btn16 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn16:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn16:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .v17 {
      display: inline-block;
      //overflow: hidden;
      outline: 0
    }

    .s175 {
      width: 120px;
      padding-right: 0;
      height: 19px
    }

    .ps160 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .s176 {
      min-width: 132px;
      width: 132px;
      min-height: 27px
    }

    .c147 {
      z-index: 6;
      pointer-events: auto
    }

    .btn17 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn17:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn17:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .s177 {
      width: 132px;
      padding-right: 0;
      height: 19px
    }

    .ps161 {
      position: relative;
      margin-left: 33px;
      margin-top: 0
    }

    .c148 {
      z-index: 7;
      pointer-events: auto
    }

    .btn18 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn18:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn18:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps162 {
      position: relative;
      margin-left: 34px;
      margin-top: 0
    }

    .c149 {
      z-index: 8;
      pointer-events: auto
    }

    .btn19 {
      border: 0;
      -webkit-border-radius: 0;
      -moz-border-radius: 0;
      border-radius: 0;
      background-color: transparent;
      background-clip: padding-box;
      color: rgba(255, 255, 255, .71)
    }

    .btn19:hover {
      background-color: rgba(211, 51, 130, .45);
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .btn19:active {
      background-color: transparent;
      border-color: #f30707;
      color: rgba(255, 255, 255, .71)
    }

    .ps163 {
      position: relative;
      margin-top: 62px
    }

    .s178 {
      pointer-events: none;
      min-width: 960px;
      width: 960px;
      margin-left: auto;
      margin-right: auto
    }

    .s179 {
      width: 912px;
      margin-left: 35px
    }

    .ps164 {
      position: relative;
      margin-left: 24px;
      margin-top: 0
    }

    .s180 {
      min-width: 863px;
      width: 863px;
      min-height: 642px
    }

    .c150 {
      z-index: 9;
      pointer-events: auto
    }

    .s181 {
      display: inline-block;
      height: 528px;
      width: 100%;
      overflow: hidden
    }

    .s182 {
      width: auto;
      height: 100%;
      padding: 0px 195px 0px 195px;
      background-color: transparent
    }

    .s183 {
      width: auto;
      height: 100%;
      padding: 0px 14px 0px 14px;
      background-color: transparent
    }

    .s184 {
      width: auto;
      height: 100%;
      padding: 0px 208px 0px 208px;
      background-color: transparent
    }

    .s185 {
      width: auto;
      height: 100%;
      padding: 0px 196px 0px 196px;
      background-color: transparent
    }

    .s186 {
      width: auto;
      height: 100%;
      padding: 0px 67px 0px 67px;
      background-color: transparent
    }

    .s187 {
      width: auto;
      height: 100%;
      padding: 0px 161px 0px 161px;
      background-color: transparent
    }

    .s188 {
      width: auto;
      height: 100%;
      padding: 0px 113px 0px 113px;
      background-color: transparent
    }

    .s189 {
      width: auto;
      height: 100%;
      padding: 0px 233px 0px 233px;
      background-color: transparent
    }

    .s190 {
      width: auto;
      height: 100%;
      padding: 0px 79px 0px 79px;
      background-color: transparent
    }

    .s191 {
      display: inline-block;
      width: 100%;
      overflow: hidden
    }

    .s192 {
      width: auto;
      height: 100%;
      padding: 0px 5px 0px 5px;
      background-color: transparent
    }

    .s193 {
      width: 100%;
      height: auto;
      padding: 18px 0px 18px 0px;
      background-color: transparent
    }

    .s194 {
      width: auto;
      height: 100%;
      padding: 0px 7px 0px 7px;
      background-color: transparent
    }

    .s195 {
      width: auto;
      height: 100%;
      padding: 0px 5px 0px 5px;
      background-color: transparent
    }

    .s196 {
      width: 100%;
      height: auto;
      padding: 13px 0px 13px 0px;
      background-color: transparent
    }

    .s197 {
      width: 100%;
      height: auto;
      padding: 1px 0px 1px 0px;
      background-color: transparent
    }

    .s198 {
      width: 100%;
      height: auto;
      padding: 8px 0px 8px 0px;
      background-color: transparent
    }

    .s199 {
      width: auto;
      height: 100%;
      padding: 0px 12px 0px 12px;
      background-color: transparent
    }

    .s200 {
      width: 100%;
      height: auto;
      padding: 12px 0px 12px 0px;
      background-color: transparent
    }

    .js13 .slider-for {
      height: 528px
    }

    .js13 .slider-nav {
      height: 109px
    }

    .js13 .slider-nav picture {
      width: 89px;
      height: 89px
    }

    .js13 .slick-prev,
    .js13 .slick-next {
      height: 20px;
      width: 20px;
      margin-top: -10px;
    }

    .js13 .slick-prev:before,
    .js13 .slick-next:before {
      font-size: 20px;
      color: #020202;
      opacity: 0.75;
    }

    .js13 .slick-prev {
      left: -25px;
    }

    .js13 .slick-next {
      right: -25px;
    }

    .js13 .slider-for {
      margin-bottom: 5px;
    }

    .js13 .slider-nav {
      margin-bottom: 0px;
      visibility: hidden;
    }

    .js13 .slider-nav picture {
      border: solid 10px transparent;
    }

    .js13 .slider-nav .slick-center picture {
      border-color: #9eafb9;
    }

    .js13 .slick-dots {
      bottom: 0px;
    }

    .js13 .slick-dots li {
      height: 20px;
      width: 20px;
      margin: 0 5px;
    }

    .js13 .slick-dots li button {
      height: 20px;
      width: 20px;
    }

    .js13 .slick-dots li button:before {
      width: 20px;
      height: 20px;
      font-size: 6px;
      line-height: 20px;
    }

    .js13 .slick-dots li.slick-active button:before {
      color: #020202;
      opacity: 0.75;
    }

    [dir="rtl"] .js13 .slick-next {
      right: auto;
      left: -25px;
    }

    [dir="rtl"] .js13 .slick-prev {
      right: -25px;
      left: auto;
    }

    @media (min-width:768px) and (max-width:959px) {
      .s167 {
        min-width: 768px;
        min-height: 378px
      }

      .ps157 {
        margin-top: -378px
      }

      .s168 {
        min-width: 768px;
        min-height: 378px;
        height: 378px;
        height: 378px
      }

      .s169 {
        min-width: 768px;
        min-height: 21px
      }

      .s170 {
        min-width: 768px;
        width: 768px
      }

      .s171 {
        width: 602px;
        margin-left: 80px
      }

      .s172 {
        min-width: 602px;
        width: 602px;
        min-height: 21px
      }

      .s173 {
        width: 96px;
        height: 21px
      }

      .f38 {
        font-size: 12px;
        line-height: 14px;
        padding-bottom: 3px
      }

      .ps159 {
        margin-left: 33px
      }

      .s174 {
        min-width: 96px;
        width: 96px;
        min-height: 21px
      }

      .s175 {
        width: 96px;
        height: 14px
      }

      .ps160 {
        margin-left: 26px
      }

      .s176 {
        min-width: 106px;
        width: 106px;
        min-height: 21px
      }

      .s177 {
        width: 106px;
        height: 14px
      }

      .ps161 {
        margin-left: 26px
      }

      .ps162 {
        margin-left: 27px
      }

      .ps163 {
        margin-top: 50px
      }

      .s178 {
        min-width: 768px;
        width: 768px
      }

      .s179 {
        width: 740px;
        margin-left: 23px
      }

      .s180 {
        min-width: 691px;
        width: 691px;
        min-height: 513px
      }

      .s181 {
        height: 424px
      }

      .s182 {
        padding: 0px 156px 0px 156px
      }

      .s183 {
        padding: 0px 10px 0px 10px
      }

      .s184 {
        padding: 0px 166px 0px 166px
      }

      .s185 {
        padding: 0px 156px 0px 156px
      }

      .s186 {
        padding: 0px 53px 0px 53px
      }

      .s187 {
        padding: 0px 128px 0px 128px
      }

      .s188 {
        padding: 0px 90px 0px 90px
      }

      .s189 {
        padding: 0px 186px 0px 186px
      }

      .s190 {
        padding: 0px 62px 0px 62px
      }

      .s192 {
        padding: 0px 3px 0px 3px
      }

      .s193 {
        padding: 13px 0px 13px 0px
      }

      .s194 {
        padding: 0px 5px 0px 5px
      }

      .s195 {
        padding: 0px 4px 0px 4px
      }

      .s196 {
        padding: 10px 0px 10px 0px
      }

      .s197 {
        padding: 0px 0px 0px 0px
      }

      .s198 {
        padding: 6px 0px 6px 0px
      }

      .s199 {
        padding: 0px 9px 0px 9px
      }

      .s200 {
        padding: 9px 0px 9px 0px
      }

      .js13 .slider-for {
        height: 424px
      }

      .js13 .slider-nav {
        height: 84px
      }

      .js13 .slider-nav picture {
        width: 64px;
        height: 64px
      }
    }

    @media (min-width:480px) and (max-width:767px) {
      .s167 {
        min-width: 480px;
        min-height: 236px
      }

      .ps157 {
        margin-top: -236px
      }

      .s168 {
        min-width: 480px;
        min-height: 236px;
        height: 236px;
        height: 236px
      }

      .s169 {
        min-width: 480px;
        min-height: 13px
      }

      .s170 {
        min-width: 480px;
        width: 480px
      }

      .s171 {
        width: 376px;
        margin-left: 50px
      }

      .s172 {
        min-width: 376px;
        width: 376px;
        min-height: 13px
      }

      .s173 {
        width: 60px;
        height: 13px
      }

      .f38 {
        font-size: 7px;
        line-height: 9px;
        padding-top: 2px;
        padding-bottom: 2px
      }

      .ps159 {
        margin-left: 21px
      }

      .s174 {
        min-width: 60px;
        width: 60px;
        min-height: 13px
      }

      .s175 {
        width: 60px;
        height: 9px
      }

      .ps160 {
        margin-left: 16px
      }

      .s176 {
        min-width: 66px;
        width: 66px;
        min-height: 13px
      }

      .s177 {
        width: 66px;
        height: 9px
      }

      .ps161 {
        margin-left: 17px
      }

      .ps162 {
        margin-left: 16px
      }

      .ps163 {
        margin-top: 32px
      }

      .s178 {
        min-width: 480px;
        width: 480px
      }

      .s179 {
        width: 480px;
        margin-left: 5px
      }

      .s180 {
        min-width: 432px;
        width: 432px;
        min-height: 320px
      }

      .s181 {
        height: 268px
      }

      .s182 {
        padding: 0px 96px 0px 96px
      }

      .s183 {
        padding: 0px 4px 0px 4px
      }

      .s184 {
        padding: 0px 102px 0px 102px
      }

      .s185 {
        padding: 0px 96px 0px 96px
      }

      .s186 {
        padding: 0px 31px 0px 31px
      }

      .s187 {
        padding: 0px 78px 0px 78px
      }

      .s188 {
        padding: 0px 54px 0px 54px
      }

      .s189 {
        padding: 0px 115px 0px 115px
      }

      .s190 {
        padding: 0px 37px 0px 37px
      }

      .s192 {
        padding: 0px 1px 0px 1px
      }

      .s193 {
        padding: 6px 0px 6px 0px
      }

      .s194 {
        padding: 0px 2px 0px 2px
      }

      .s195 {
        padding: 0px 2px 0px 2px
      }

      .s196 {
        padding: 5px 0px 5px 0px
      }

      .s197 {
        padding: 0px 0px 0px 0px
      }

      .s198 {
        padding: 3px 0px 3px 0px
      }

      .s199 {
        padding: 0px 4px 0px 4px
      }

      .s200 {
        padding: 4px 0px 4px 0px
      }

      .js13 .slider-for {
        height: 268px
      }

      .js13 .slider-nav {
        height: 47px
      }

      .js13 .slider-nav picture {
        width: 27px;
        height: 27px
      }
    }

    @media (max-width:479px) {
      .s167 {
        min-width: 320px;
        min-height: 157px
      }

      .ps157 {
        margin-top: -157px
      }

      .s168 {
        min-width: 320px;
        min-height: 157px;
        height: 157px;
        height: 157px
      }

      .s169 {
        min-width: 320px;
        min-height: 9px
      }

      .s170 {
        min-width: 320px;
        width: 320px
      }

      .s171 {
        width: 251px;
        margin-left: 33px
      }

      .s172 {
        min-width: 251px;
        width: 251px;
        min-height: 9px
      }

      .s173 {
        width: 40px;
        height: 9px
      }

      .f38 {
        font-size: 5px;
        line-height: 6px;
        padding-top: 2px;
        padding-bottom: 1px
      }

      .ps159 {
        margin-left: 14px
      }

      .s174 {
        min-width: 40px;
        width: 40px;
        min-height: 9px
      }

      .s175 {
        width: 40px;
        height: 6px
      }

      .ps160 {
        margin-left: 11px
      }

      .s176 {
        min-width: 44px;
        width: 44px;
        min-height: 9px
      }

      .s177 {
        width: 44px;
        height: 6px
      }

      .ps161 {
        margin-left: 11px
      }

      .ps162 {
        margin-left: 11px
      }

      .ps163 {
        margin-top: 21px
      }

      .s178 {
        min-width: 320px;
        width: 320px
      }

      .s179 {
        width: 325px;
        margin-left: -5px
      }

      .s180 {
        min-width: 288px;
        width: 288px;
        min-height: 214px
      }

      .s181 {
        height: 183px
      }

      .s182 {
        padding: 0px 62px 0px 62px
      }

      .s183 {
        width: 100%;
        height: auto;
        padding: 0px 0px 0px 0px
      }

      .s184 {
        padding: 0px 66px 0px 66px
      }

      .s185 {
        padding: 0px 62px 0px 62px
      }

      .s186 {
        padding: 0px 17px 0px 17px
      }

      .s187 {
        padding: 0px 50px 0px 50px
      }

      .s188 {
        padding: 0px 33px 0px 33px
      }

      .s189 {
        padding: 0px 75px 0px 75px
      }

      .s190 {
        padding: 0px 22px 0px 22px
      }

      .s192 {
        padding: 0px 0px 0px 0px
      }

      .s193 {
        padding: 2px 0px 2px 0px
      }

      .s194 {
        padding: 0px 1px 0px 1px
      }

      .s195 {
        padding: 0px 0px 0px 0px
      }

      .s196 {
        padding: 2px 0px 2px 0px
      }

      .s197 {
        padding: 0px 0px 0px 0px
      }

      .s198 {
        padding: 1px 0px 1px 0px
      }

      .s199 {
        padding: 0px 2px 0px 2px
      }

      .s200 {
        padding: 2px 0px 2px 0px
      }

      .js13 .slider-for {
        height: 183px
      }

      .js13 .slider-nav {
        height: 26px
      }

      .js13 .slider-nav picture {
        width: 6px;
        height: 6px
      }
    }

    @media (-webkit-min-device-pixel-ratio:2),
    (min-resolution:192dpi) {
      .c141 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:768px) and (max-width:959px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:768px) and (max-width:959px) and (min-resolution:192dpi) {
      .c141 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:480px) and (max-width:767px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:480px) and (max-width:767px) and (min-resolution:192dpi) {
      .c141 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (max-width:479px) and (-webkit-min-device-pixel-ratio:2),
    (max-width:479px) and (min-resolution:192dpi) {
      .c141 {
        background-image: url(images/parkcityhome-640.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-640.webp)
      }
    }

    @media (min-width:320px) {
      .c141 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-480.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-480.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-480.webp)
      }
    }

    @media (min-width:320px) and (-webkit-min-device-pixel-ratio:2),
    (min-width:320px) and (min-resolution:192dpi) {
      .c141 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-960.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960.webp)
      }
    }

    @media (min-width:480px) {
      .c141 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-768.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-768.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-768.webp)
      }
    }

    @media (min-width:768px) {
      .c141 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960-1.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-960-1.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-960-1.webp)
      }
    }

    @media (min-width:960px) {
      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1200px) {
      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }
    }

    @media (min-width:1600px) {
      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
      }

      .c141 {
        background-image: url(images/parkcityhome-981.jpeg)
      }

      .webp .c141 {
        background-image: url(images/parkcityhome-981.webp)
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
  <div class="v14 ps156 s167 c141"></div>
  <div class="v14 ps157 s168 c142"></div>
  <div class="v14 ps156 s169 c143">
    <div class="ps156 v15 s170">
      <div class="s171">
        <div class="v14 ps158 s172 c144">
          <div class="v16 ps158 s173 c145">
            <!--p class="f38">Login</p-->
<?php if(isset($_SESSION['username']) && ($_SESSION['username']=='admin')):?>
<div class="dropdown">
  <button class="f38 btn15 v17 s175"><?php echo $_SESSION['username'];?></button>
  <div class="dropdown-content">
    <a href="updatebooking.php">Update Booking</a>
    <a href="updateroom.php">Update Room Status</a>
    <a href="logout.php">Log out</a>
  </div>
</div>
<?php elseif(isset($_SESSION['username'])):?>
<div class="dropdown">
  <button class="f38 btn15 v17 s175"><?php echo $_SESSION['username'];?></button>
  <div class="dropdown-content">
    <a href="#">Pet Profile</a>
    <a href="#">History</a>
    <a href="logout.php">Log out</a>
  </div>
</div>
<?php else:?>
<a href="signin.php" class="f38 btn15 v17 s175">Login</a>
<?php endif;?>
          </div>
          <div class="v14 ps159 s174 c146">
            <a href="index.php" class="f38 btn16 v17 s175">Home</a>
          </div>
          <div class="v14 ps160 s176 c147">
            <a href="./#services" class="f38 btn17 v17 s177">Services</a>
          </div>
          <div class="v14 ps161 s174 c148">
            <a href="./#about-us" class="f38 btn18 v17 s175">About Us</a>
          </div>
          <div class="v14 ps162 s174 c149">
            <!--a href="./#services" class="f38 btn19 v17 s175">Contact Us</a-->
<?php if(isset($_SESSION['username']) && ($_SESSION['username']=='admin')):?>
<!--a href="#" class="f38 btn19 v17 s175">Reports</a-->
<div class="dropdown">
<!--a href="#" class="f11 btn7 v8 s46">Reports</a-->
 <button class="f38 btn19 v17 s175">Reports</button>
 <div class="dropdown-content">
   <a href=href=transact_report.php>Transactions</a>
   <a href=active_users.php>Active Users</a>
   <a href=room_report.php>Rooms</a>
 </div>
</div>
<?php else:?>
<a href="#contact-us" class="f38 btn19 v17 s175">Contact Us</a>
<?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ps163 v15 s178">
    <div class="s179">
      <div class="js13 v14 ps164 s180 c150 ga1">
        <div class="slider slider-for">
          <div>
            <picture class="s181">
              <source srcset="images/pic-01-163.webp 1x, images/pic-01-327.webp 2x" type="image/webp" media="(max-width:479px)">
              <source srcset="images/pic-01-163.png 1x, images/pic-01-327.png 2x" media="(max-width:479px)">
              <source srcset="images/pic-01-239.webp 1x, images/pic-01-478.webp 2x" type="image/webp" media="(max-width:767px)">
              <source srcset="images/pic-01-239.png 1x, images/pic-01-478.png 2x" media="(max-width:767px)">
              <source srcset="images/pic-01-378.webp 1x" type="image/webp" media="(max-width:959px)">
              <source srcset="images/pic-01-378.png 1x" media="(max-width:959px)">
              <source srcset="images/pic-01-471.webp 1x" type="image/webp" media="(min-width:960px)">
              <source srcset="images/pic-01-471.png 1x" media="(min-width:960px)"><img class="slide0 s182" src="images/pic-01-163.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-02-163.webp 1x, images/pic-02-327.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-02-163.png 1x, images/pic-02-327.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-02-239.webp 1x, images/pic-02-478.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-02-239.png 1x, images/pic-02-478.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-02-378.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-02-378.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-02-471.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-02-471.png 1x" media="(min-width:960px)"><img class="slide1 s182" data-src="images/pic-02-163.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-03-163.webp 1x, images/pic-03-327.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-03-163.png 1x, images/pic-03-327.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-03-239.webp 1x, images/pic-03-478.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-03-239.png 1x, images/pic-03-478.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-03-378.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-03-378.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-03-471.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-03-471.png 1x" media="(min-width:960px)"><img class="slide2 s182" data-src="images/pic-03-163.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-04-163.webp 1x, images/pic-04-327.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-04-163.png 1x, images/pic-04-327.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-04-239.webp 1x, images/pic-04-478.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-04-239.png 1x, images/pic-04-478.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-04-378.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-04-378.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-04-471.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-04-471.png 1x" media="(min-width:960px)"><img class="slide3 s182" data-src="images/pic-04-163.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-05-288.webp 1x, images/pic-05-576.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-05-288.png 1x, images/pic-05-576.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-05-424.webp 1x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-05-424.png 1x" media="(max-width:767px)">
              <source data-srcset="images/pic-05-670.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-05-670.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-05-835.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-05-835.png 1x" media="(min-width:960px)"><img class="slide4 s183" data-src="images/pic-05-288.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-08-155.webp 1x, images/pic-08-309.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-08-155.png 1x, images/pic-08-309.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-08-226.webp 1x, images/pic-08-453.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-08-226.png 1x, images/pic-08-453.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-08-358.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-08-358.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-08-446.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-08-446.png 1x" media="(min-width:960px)"><img class="slide5 s184" data-src="images/pic-08-155.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-06-163.webp 1x, images/pic-06-326.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-06-163.png 1x, images/pic-06-326.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-06-239.webp 1x, images/pic-06-477.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-06-239.png 1x, images/pic-06-477.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-06-377.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-06-377.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-06-470.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-06-470.png 1x" media="(min-width:960px)"><img class="slide6 s185" data-src="images/pic-06-163.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-07-252.webp 1x, images/pic-07-505.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-07-252.png 1x, images/pic-07-505.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-07-370.webp 1x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-07-370.png 1x" media="(max-width:767px)">
              <source data-srcset="images/pic-07-585.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-07-585.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-07-728.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-07-728.png 1x" media="(min-width:960px)"><img class="slide7 s186" data-src="images/pic-07-252.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-09-187.webp 1x, images/pic-09-374.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-09-187.png 1x, images/pic-09-374.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-09-274.webp 1x, images/pic-09-548.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-09-274.png 1x, images/pic-09-548.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-09-434.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-09-434.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-09-540.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-09-540.png 1x" media="(min-width:960px)"><img class="slide8 s187" data-src="images/pic-09-187.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-10-220.webp 1x, images/pic-10-441.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-10-220.png 1x, images/pic-10-441.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-10-323.webp 1x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-10-323.png 1x" media="(max-width:767px)">
              <source data-srcset="images/pic-10-511.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-10-511.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-10-636.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-10-636.png 1x" media="(min-width:960px)"><img class="slide9 s188" data-src="images/pic-10-220.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-12-137.webp 1x, images/pic-12-275.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-12-137.png 1x, images/pic-12-275.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-12-201.webp 1x, images/pic-12-402.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-12-201.png 1x, images/pic-12-402.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-12-318.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-12-318.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-12-396.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-12-396.png 1x" media="(min-width:960px)"><img class="slide10 s189" data-src="images/pic-12-137.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-13-244.webp 1x, images/pic-13-488.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-13-244.png 1x, images/pic-13-488.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-13-357.webp 1x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-13-357.png 1x" media="(max-width:767px)">
              <source data-srcset="images/pic-13-565.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-13-565.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-13-704.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-13-704.png 1x" media="(min-width:960px)"><img class="slide11 s190" data-src="images/pic-13-244.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-14-137.webp 1x, images/pic-14-275.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-14-137.png 1x, images/pic-14-275.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-14-201.webp 1x, images/pic-14-402.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-14-201.png 1x, images/pic-14-402.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-14-318.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-14-318.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-14-396.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-14-396.png 1x" media="(min-width:960px)"><img class="slide12 s189" data-src="images/pic-14-137.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-15-137.webp 1x, images/pic-15-275.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-15-137.png 1x, images/pic-15-275.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-15-201.webp 1x, images/pic-15-402.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-15-201.png 1x, images/pic-15-402.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-15-318.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-15-318.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-15-396.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-15-396.png 1x" media="(min-width:960px)"><img class="slide13 s189" data-src="images/pic-15-137.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-16-137.webp 1x, images/pic-16-275.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-16-137.png 1x, images/pic-16-275.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-16-201.webp 1x, images/pic-16-402.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-16-201.png 1x, images/pic-16-402.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-16-318.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-16-318.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-16-396.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-16-396.png 1x" media="(min-width:960px)"><img class="slide14 s189" data-src="images/pic-16-137.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-17-137.webp 1x, images/pic-17-275.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-17-137.png 1x, images/pic-17-275.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-17-201.webp 1x, images/pic-17-402.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-17-201.png 1x, images/pic-17-402.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-17-318.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-17-318.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-17-396.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-17-396.png 1x" media="(min-width:960px)"><img class="slide15 s189" data-src="images/pic-17-137.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s181">
              <source data-srcset="images/pic-18-137.webp 1x, images/pic-18-275.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/pic-18-137.png 1x, images/pic-18-275.png 2x" media="(max-width:479px)">
              <source data-srcset="images/pic-18-201.webp 1x, images/pic-18-402.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/pic-18-201.png 1x, images/pic-18-402.png 2x" media="(max-width:767px)">
              <source data-srcset="images/pic-18-318.webp 1x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/pic-18-318.png 1x" media="(max-width:959px)">
              <source data-srcset="images/pic-18-396.webp 1x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/pic-18-396.png 1x" media="(min-width:960px)"><img class="slide16 s189" data-src="images/pic-18-137.png">
            </picture>
          </div>
        </div>
        <div class="slider slider-nav" style="z-index:1">
          <div>
            <picture class="s191">
              <source srcset="images/thumb-pic-01-14.webp 1x, images/thumb-pic-01-29.webp 2x" type="image/webp" media="(max-width:479px)">
              <source srcset="images/thumb-pic-01-14.png 1x, images/thumb-pic-01-29.png 2x" media="(max-width:479px)">
              <source srcset="images/thumb-pic-01-33.webp 1x, images/thumb-pic-01-66.webp 2x" type="image/webp" media="(max-width:767px)">
              <source srcset="images/thumb-pic-01-33.png 1x, images/thumb-pic-01-66.png 2x" media="(max-width:767px)">
              <source srcset="images/thumb-pic-01-66-1.webp 1x, images/thumb-pic-01-132.webp 2x" type="image/webp" media="(max-width:959px)">
              <source srcset="images/thumb-pic-01-66-1.png 1x, images/thumb-pic-01-132.png 2x" media="(max-width:959px)">
              <source srcset="images/thumb-pic-01-88.webp 1x, images/thumb-pic-01-177.webp 2x" type="image/webp" media="(min-width:960px)">
              <source srcset="images/thumb-pic-01-88.png 1x, images/thumb-pic-01-177.png 2x" media="(min-width:960px)"><img class="slide0 s192" src="images/thumb-pic-01-14.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-02-14.webp 1x, images/thumb-pic-02-29.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-02-14.png 1x, images/thumb-pic-02-29.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-02-33.webp 1x, images/thumb-pic-02-66.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-02-33.png 1x, images/thumb-pic-02-66.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-02-66-1.webp 1x, images/thumb-pic-02-132.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-02-66-1.png 1x, images/thumb-pic-02-132.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-02-88.webp 1x, images/thumb-pic-02-177.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-02-88.png 1x, images/thumb-pic-02-177.png 2x" media="(min-width:960px)"><img class="slide1 s192" data-src="images/thumb-pic-02-14.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-03-14.webp 1x, images/thumb-pic-03-29.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-03-14.png 1x, images/thumb-pic-03-29.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-03-33.webp 1x, images/thumb-pic-03-66.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-03-33.png 1x, images/thumb-pic-03-66.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-03-66-1.webp 1x, images/thumb-pic-03-132.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-03-66-1.png 1x, images/thumb-pic-03-132.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-03-88.webp 1x, images/thumb-pic-03-177.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-03-88.png 1x, images/thumb-pic-03-177.png 2x" media="(min-width:960px)"><img class="slide2 s192" data-src="images/thumb-pic-03-14.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-04-14.webp 1x, images/thumb-pic-04-29.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-04-14.png 1x, images/thumb-pic-04-29.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-04-33.webp 1x, images/thumb-pic-04-66.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-04-33.png 1x, images/thumb-pic-04-66.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-04-66-1.webp 1x, images/thumb-pic-04-132.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-04-66-1.png 1x, images/thumb-pic-04-132.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-04-88.webp 1x, images/thumb-pic-04-177.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-04-88.png 1x, images/thumb-pic-04-177.png 2x" media="(min-width:960px)"><img class="slide3 s192" data-src="images/thumb-pic-04-14.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-05-16.webp 1x, images/thumb-pic-05-32.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-05-16.png 1x, images/thumb-pic-05-32.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-05-37.webp 1x, images/thumb-pic-05-74.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-05-37.png 1x, images/thumb-pic-05-74.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-05-74-1.webp 1x, images/thumb-pic-05-148.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-05-74-1.png 1x, images/thumb-pic-05-148.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-05-99.webp 1x, images/thumb-pic-05-198.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-05-99.png 1x, images/thumb-pic-05-198.png 2x" media="(min-width:960px)"><img class="slide4 s193" data-src="images/thumb-pic-05-16.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-08-14.webp 1x, images/thumb-pic-08-27.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-08-14.png 1x, images/thumb-pic-08-27.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-08-31.webp 1x, images/thumb-pic-08-63.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-08-31.png 1x, images/thumb-pic-08-63.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-08-63-1.webp 1x, images/thumb-pic-08-125.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-08-63-1.png 1x, images/thumb-pic-08-125.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-08-84.webp 1x, images/thumb-pic-08-167.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-08-84.png 1x, images/thumb-pic-08-167.png 2x" media="(min-width:960px)"><img class="slide5 s194" data-src="images/thumb-pic-08-14.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-06-14.webp 1x, images/thumb-pic-06-28.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-06-14.png 1x, images/thumb-pic-06-28.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-06-33.webp 1x, images/thumb-pic-06-66.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-06-33.png 1x, images/thumb-pic-06-66.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-06-66-1.webp 1x, images/thumb-pic-06-132.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-06-66-1.png 1x, images/thumb-pic-06-132.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-06-88.webp 1x, images/thumb-pic-06-176.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-06-88.png 1x, images/thumb-pic-06-176.png 2x" media="(min-width:960px)"><img class="slide6 s195" data-src="images/thumb-pic-06-14.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-07-16.webp 1x, images/thumb-pic-07-32.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-07-16.png 1x, images/thumb-pic-07-32.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-07-37.webp 1x, images/thumb-pic-07-74.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-07-37.png 1x, images/thumb-pic-07-74.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-07-74-1.webp 1x, images/thumb-pic-07-148.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-07-74-1.png 1x, images/thumb-pic-07-148.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-07-99.webp 1x, images/thumb-pic-07-198.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-07-99.png 1x, images/thumb-pic-07-198.png 2x" media="(min-width:960px)"><img class="slide7 s196" data-src="images/thumb-pic-07-16.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-09-16.webp 1x, images/thumb-pic-09-32.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-09-16.png 1x, images/thumb-pic-09-32.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-09-37.webp 1x, images/thumb-pic-09-74.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-09-37.png 1x, images/thumb-pic-09-74.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-09-74-1.webp 1x, images/thumb-pic-09-148.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-09-74-1.png 1x, images/thumb-pic-09-148.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-09-99.webp 1x, images/thumb-pic-09-198.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-09-99.png 1x, images/thumb-pic-09-198.png 2x" media="(min-width:960px)"><img class="slide8 s197" data-src="images/thumb-pic-09-16.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-10-16.webp 1x, images/thumb-pic-10-32.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-10-16.png 1x, images/thumb-pic-10-32.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-10-37.webp 1x, images/thumb-pic-10-74.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-10-37.png 1x, images/thumb-pic-10-74.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-10-74-1.webp 1x, images/thumb-pic-10-148.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-10-74-1.png 1x, images/thumb-pic-10-148.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-10-99.webp 1x, images/thumb-pic-10-198.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-10-99.png 1x, images/thumb-pic-10-198.png 2x" media="(min-width:960px)"><img class="slide9 s198" data-src="images/thumb-pic-10-16.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-12-12.webp 1x, images/thumb-pic-12-24.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-12-12.png 1x, images/thumb-pic-12-24.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-12-28.webp 1x, images/thumb-pic-12-56.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-12-28.png 1x, images/thumb-pic-12-56.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-12-56-1.webp 1x, images/thumb-pic-12-111.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-12-56-1.png 1x, images/thumb-pic-12-111.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-12-74.webp 1x, images/thumb-pic-12-149.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-12-74.png 1x, images/thumb-pic-12-149.png 2x" media="(min-width:960px)"><img class="slide10 s199" data-src="images/thumb-pic-12-12.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-13-16.webp 1x, images/thumb-pic-13-32.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-13-16.png 1x, images/thumb-pic-13-32.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-13-37.webp 1x, images/thumb-pic-13-74.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-13-37.png 1x, images/thumb-pic-13-74.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-13-74-1.webp 1x, images/thumb-pic-13-148.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-13-74-1.png 1x, images/thumb-pic-13-148.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-13-99.webp 1x, images/thumb-pic-13-198.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-13-99.png 1x, images/thumb-pic-13-198.png 2x" media="(min-width:960px)"><img class="slide11 s200" data-src="images/thumb-pic-13-16.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-14-12.webp 1x, images/thumb-pic-14-24.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-14-12.png 1x, images/thumb-pic-14-24.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-14-28.webp 1x, images/thumb-pic-14-56.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-14-28.png 1x, images/thumb-pic-14-56.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-14-56-1.webp 1x, images/thumb-pic-14-111.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-14-56-1.png 1x, images/thumb-pic-14-111.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-14-74.webp 1x, images/thumb-pic-14-149.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-14-74.png 1x, images/thumb-pic-14-149.png 2x" media="(min-width:960px)"><img class="slide12 s199" data-src="images/thumb-pic-14-12.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-15-12.webp 1x, images/thumb-pic-15-24.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-15-12.png 1x, images/thumb-pic-15-24.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-15-28.webp 1x, images/thumb-pic-15-56.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-15-28.png 1x, images/thumb-pic-15-56.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-15-56-1.webp 1x, images/thumb-pic-15-111.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-15-56-1.png 1x, images/thumb-pic-15-111.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-15-74.webp 1x, images/thumb-pic-15-149.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-15-74.png 1x, images/thumb-pic-15-149.png 2x" media="(min-width:960px)"><img class="slide13 s199" data-src="images/thumb-pic-15-12.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-16-12.webp 1x, images/thumb-pic-16-24.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-16-12.png 1x, images/thumb-pic-16-24.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-16-28.webp 1x, images/thumb-pic-16-56.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-16-28.png 1x, images/thumb-pic-16-56.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-16-56-1.webp 1x, images/thumb-pic-16-111.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-16-56-1.png 1x, images/thumb-pic-16-111.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-16-74.webp 1x, images/thumb-pic-16-149.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-16-74.png 1x, images/thumb-pic-16-149.png 2x" media="(min-width:960px)"><img class="slide14 s199" data-src="images/thumb-pic-16-12.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-17-12.webp 1x, images/thumb-pic-17-24.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-17-12.png 1x, images/thumb-pic-17-24.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-17-28.webp 1x, images/thumb-pic-17-56.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-17-28.png 1x, images/thumb-pic-17-56.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-17-56-1.webp 1x, images/thumb-pic-17-111.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-17-56-1.png 1x, images/thumb-pic-17-111.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-17-74.webp 1x, images/thumb-pic-17-149.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-17-74.png 1x, images/thumb-pic-17-149.png 2x" media="(min-width:960px)"><img class="slide15 s199" data-src="images/thumb-pic-17-12.png">
            </picture>
          </div>
          <div class="slidex">
            <picture class="s191">
              <source data-srcset="images/thumb-pic-18-12.webp 1x, images/thumb-pic-18-24.webp 2x" type="image/webp" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-18-12.png 1x, images/thumb-pic-18-24.png 2x" media="(max-width:479px)">
              <source data-srcset="images/thumb-pic-18-28.webp 1x, images/thumb-pic-18-56.webp 2x" type="image/webp" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-18-28.png 1x, images/thumb-pic-18-56.png 2x" media="(max-width:767px)">
              <source data-srcset="images/thumb-pic-18-56-1.webp 1x, images/thumb-pic-18-111.webp 2x" type="image/webp" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-18-56-1.png 1x, images/thumb-pic-18-111.png 2x" media="(max-width:959px)">
              <source data-srcset="images/thumb-pic-18-74.webp 1x, images/thumb-pic-18-149.webp 2x" type="image/webp" media="(min-width:960px)">
              <source data-srcset="images/thumb-pic-18-74.png 1x, images/thumb-pic-18-149.png 2x" media="(min-width:960px)"><img class="slide16 s199" data-src="images/thumb-pic-18-12.png">
            </picture>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="v1 ps155 s166 c140"></div>
  <script>
    dpth = "/";
    ! function() {
      var s = ["js/jquery.0d3f62.js", "js/slick.0d3f62.js", "js/gallery.f02883.js"],
        n = {},
        j = 0,
        e = function(e) {
          var o = new XMLHttpRequest;
          o.open("GET", s[e], !0), o.onload = function() {
            if (n[e] = o.responseText, 3 == ++j)
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
