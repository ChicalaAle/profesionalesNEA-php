<!DOCTYPE html>
<!--
Copyright 2011 Google Inc.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

Author: Eric Bidelman (ericbidelman@chromium.org)
-->
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<title>navigator.onLine test</title>
<style>
@-webkit-keyframes glowGreen {
  from {
    -webkit-box-shadow: rgba(0, 255, 0, 0) 0 0 0 0;
  }
  50% {
    -webkit-box-shadow: rgba(0, 255, 0, 1) 0 0 30px 5px;
  }
  to {
    -webkit-box-shadow: rgba(0, 255, 0, 0) 0 0 0 0;
  }
}
@-webkit-keyframes glowRed {
  from {
    -webkit-box-shadow: rgba(255, 0, 0, 0) 0 0 0;
  }
  50% {
    -webkit-box-shadow: rgba(255, 0, 0, 1) 0 0 30px 5px;
  }
  to {
    -webkit-box-shadow: rgba(255, 0, 0, 0) 0 0 0;
  }
}
@-moz-keyframes glowGreen {
  from {
    -moz-box-shadow: rgba(0, 255, 0, 0) 0 0 0;
  }
  50% {
    -moz-box-shadow: rgba(0, 255, 0, 1) 0 0 30px 5px;
  }
  to {
    -moz-box-shadow: rgba(0, 255, 0, 0) 0 0 0;
  }
}
@-moz-keyframes glowRed {
  from {
    -moz-box-shadow: rgba(255, 0, 0, 0) 0 0 0;
  }
  50% {
    -moz-box-shadow: rgba(255, 0, 0, 1) 0 0 30px 5px;
  }
  to {
    -moz-box-shadow: rgba(255, 0, 0, 0) 0 0 0;
  }
}
html, body {
  height: 100%;
  overflow: hidden;
}
body {
  font-family: "Myriad Pro", Arial, sans-serif;
  display: -webkit-box;
  -webkit-box-align: center;
  -webkit-box-pack: center;
  display: -moz-box;
  -moz-box-align: center;
  -moz-box-pack: center;
  -webkit-box-orient: vertical;
  -moz-box-orient: vertical;
}
#connection {
  font: 60px Arial, sans-serif;
  text-transform: uppercase;
  font-weight: bold;
  vertical-align: middle;
  -webkit-text-stroke: 0;
  -moz-text-stroke: 0;
  color: transparent;
  -webkit-background-clip: text;
  -moz-background-clip: text;
  background-color: rgba(55,96,117,1);
  text-shadow: rgba(255,255,255,0.5) 0 5px 6px, rgba(255,255,255,0.4) 1px 3px 3px;
  border: 2px solid black;
  border-radius: 25px;
  padding: 25px;
}
#connection div {
  display: inline-block;
  background-color: orange;
  width: 40px;
  height: 40px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  margin-left: 10px;
  -webkit-animation-duration: 2.5s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
  -moz-animation-duration: 2.5s;
  -moz-animation-iteration-count: infinite;
  -moz-animation-timing-function: linear;
  -o-animation-duration: 2.5s;
  -o-animation-iteration-count: infinite;
  -o-animation-timing-function: linear;
}
#connection.connected {
  background-color: rgba(0, 55, 0, 1);
  border-color: green;
  -webkit-box-shadow: 0 0 50px 0 #bbb;
  -moz-box-shadow: 0 0 50px 0 #bbb;
  -ms-box-shadow: 0 0 50px 0 #bbb;
  -o-box-shadow: 0 0 50px 0 #bbb;
  box-shadow: 0 0 50px 0 #bbb;
}
#connection.connected div {
  background-color: green;
  -webkit-box-shadow: rgba(0, 255, 0, 0.5) 0px 0px 5px;
  -moz-box-shadow: rgba(0, 255, 0, 0.5) 0px 0px 5px;
  -o-box-shadow: rgba(0, 255, 0, 0.5) 0px 0px 5px;
  -ms-box-shadow: rgba(0, 255, 0, 0.5) 0px 0px 5px;
  box-shadow: rgba(0, 255, 0, 0.5) 0px 0px 5px;
  -webkit-animation-name: glowGreen;
  -moz-animation-name: glowGreen;
  -ms-animation-name: glowGreen;
  -o-animation-name: glowGreen;
}
#connection.disconnected {
  background-color: rgba(55, 0, 0, 1);
  border-color: red;
  -webkit-box-shadow: 0 0 50px 0 #bbb;
  -moz-box-shadow: 0 0 50px 0 #bbb;
  -ms-box-shadow: 0 0 50px 0 #bbb;
  -o-box-shadow: 0 0 50px 0 #bbb;
  box-shadow: 0 0 50px 0 #bbb;
}
#connection.disconnected div {
  background-color: red;
  -webkit-box-shadow: rgba(255, 0, 0, 0.5) 0px 0px 5px;
  -moz-box-shadow: rgba(255, 0, 0, 0.5) 0px 0px 5px;
  -ms-box-shadow: rgba(255, 0, 0, 0.5) 0px 0px 5px;
  -o-box-shadow: rgba(255, 0, 0, 0.5) 0px 0px 5px;
  box-shadow: rgba(255, 0, 0, 0.5) 0px 0px 5px;
  -webkit-animation-name: glowRed;
  -moz-animation-name: glowRed;
}
p {
  margin-top: 2em;
}
</style>
</head>
<body>
<div id="connection">Connecting...<div></div></div>
<p>Toggle your wifi on/off while viewing this page.</p>
<pre id="log"></pre>
<script>
function Logger(id) {
  this.el = document.getElementById('log');
}
Logger.prototype.log = function(msg) {
  var fragment = document.createDocumentFragment();
  fragment.appendChild(document.createTextNode(msg));
  fragment.appendChild(document.createElement('br'));
  this.el.appendChild(fragment);
};

Logger.prototype.clear = function() {
  this.el.textContent = '';
};

var logger = new Logger('log');

function updateConnectionStatus(msg, connected) {
  var el = document.querySelector('#connection');
  if (connected) {
    if (el.classList) {
      el.classList.add('connected');
      el.classList.remove('disconnected');
    } else {
      el.addClass('connected');
      el.removeClass('disconnected');
    }
  } else {
    if (el.classList) {
      el.classList.remove('connected');
      el.classList.add('disconnected');
    } else {
      el.removeClass('connected');
      el.addClass('disconnected');
    }
  }
  el.innerHTML = msg + '<div></div>';
}

window.addEventListener('load', function(e) {
  if (navigator.onLine) {
    updateConnectionStatus('Online', true);
  } else {
    updateConnectionStatus('Offline', false);
  }
}, false);

window.addEventListener('online', function(e) {
  logger.log("And we're back :)");
  updateConnectionStatus('Online', true);
  // Get updates from server.
}, false);

window.addEventListener('offline', function(e) {
  logger.log("Connection is flaky.");
  updateConnectionStatus('Offline', false);
  // Use offine mode.
}, false);
</script>
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22014378-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</body>
</html>
