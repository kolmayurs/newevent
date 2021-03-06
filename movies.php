<!DOCTYPE html>
<html lang="en-US">
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
		<script src="http://mayurkoli.com/bootstrap/jquery.min.js"></script>

		<style type="text/css">
			body {
  font-family: sans-serif;
  font-size: 1em;
  color: #333;
  background-color: #ddd;
}

label {
  clear: both;
  display: block;
  font-size: 0.85em;
  font-weight: bold;
  padding: 0.8em 0 0.2em 0;
  user-select: none;
}



::-moz-focus-inner { 
  padding: 0;
  border: 0;
}



.copied::after {
  position: absolute;
  top: 12%;
  right: 110%;
  display: block;
  content: "copied";
  font-size: 0.75em;
  padding: 2px 3px;
  color: #fff;
  background-color: #22a;
  border-radius: 3px;
  opacity: 0;
  will-change: opacity, transform;
  animation: showcopied 1.5s ease;
}

@keyframes showcopied {
  0% {
    opacity: 0;
    transform: translateX(100%);
  }
  70% {
    opacity: 1;
    transform: translateX(0);
  }
  100% {
    opacity: 0;
  }
}
			
			

			.code-cointainer{
				padding: 1em;
			}
			textarea{
			margin: 1em 0;
			min-width: 95%;
			min-height: 600px;
			display:block;
			background-color:#fce1ce;
			border-left: 5px solid #f69855;
			padding:20px;
			line-height:24px;
			word-break: break-all;
			white-space: -moz-pre-wrap; /* Mozilla */
			white-space: -o-pre-wrap; /* Opera 7 */
			white-space: pre-wrap;  /* CSS 2.1 */
			/*white-space: pre-line;  CSS 3 */
			word-wrap: break-word; /* IE */
			}
			.container{
			width:100%;
			}
		</style>
		<script type="text/javascript">
			function fintETcode(x){
				var n = x.indexOf("ET");
				return x.substring(n, n+10);
			}

		</script>
	</head>
	<body>
		<!--<?php
			/*	$link = "https://in.bookmyshow.com/movies/banjo/ET00041067";
				$find   = 'ET';
				$pos = strpos($link, $find);
				echo substr($link,$pos); */
			?> -->
		<div class="container" ng-app="myApp">
		<fieldset  ng-controller="myCtrl">
			<legend>Movie</legend>
			<p>Movie Name : <input type="text" ng-model="name"></p>
			<p>Movie Link : <input id="link" ng-change="myFunc()" type="text" ng-model="link"></p>
			<p>ET Code : <input type="text" ng-model="etcode"></p>
			<p>{{count}}</p>
			<script>
			  angular.module('myApp', [])
			    .controller('myCtrl', ['$scope', function($scope) {
			      $scope.myFunc = function() {
			      	var n = $scope.link.indexOf("ET");
				    $scope.etcode1 = $scope.link.substring(n, n+10);

			      };
			    }]);
			</script>
						<?php
				$link = "{{link}}";
				$find   = 'ET';
				$pos = strpos($link, $find);
				echo substr($link,$pos);
			?>
		</fieldset>
		<div class="code-cointainer">
		<textarea id="holdtext"><table cellspacing="0" cellpadding="0" align="left" style="width:180px; margin:0px 5px; background-color:#f6f6f6; vertical-align:top;display:inline-block;float:none;">
	<tr>
		<td class="body_copy" style="width:180px;"><a href="http://in.bookmyshow.com/email_tracker.bms?eId=<%user.email%>&amp;mId=<%message.pk%>&amp;url={{link}}?%26utm_source%3DCRMSelfiRaja14July2016%26utm_medium%3Demail%26utm_campaign%3D{{name}}" target="_blank" style="text-decoration:none; color:#ffffff;"><img src="http://in.bmscdn.com/Events/moviecard/{{etcode1}}.jpg" width="180" height="230" alt="{{name}}" title="{{name}}" style="display:block; border:0;"/></a></td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<table border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td style="width:150px; padding:10px 5px 5px 5px; text-align:left; line-height:18px; color:#333333; font-size:13px; font-weight:bold;"><a href="http://in.bookmyshow.com/email_tracker.bms?eId=<%user.email%>&amp;mId=<%message.pk%>&amp;url=https://in.bookmyshow.com/movies/nayaki/ET00041103?%26utm_source%3DCRMSelfiRaja14July2016%26utm_medium%3Demail%26utm_campaign%3D{{name}}" target="_blank" style="text-decoration:none; color:#333333;">{{name}}</a></td>
					<td valign="top" style="width:15px; padding :10px 5px 2px 0px;"><a href="http://in.bookmyshow.com/email_tracker.bms?eId=<%user.email%>&amp;mId=<%message.pk%>&amp;url=http://www.facebook.com/share.php?u=https://in.bookmyshow.com/movies/nayaki/ET00041103?%26utm_source%3DCRMSelfiRaja14July2016%26utm_medium%3Demail%26utm_campaign%3D{{name}}" target="_blank" style="text-decoration:none;"><img src="http://cnt.in.bookmyshow.com/mailers/images/151118nonmovie/fshare.jpg" alt="Facebook Share" width="15" height="15"  border="0" style="background color:#f6f6f6;"/></a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="width:162px; padding:2px 8px 2px 8px; text-align:left; word-spacing:10px; line-height:24px;"> <span style="padding:3px 7px; background-color:#dcdcdc; color:#333333; font-size:10px; border-radius:5px;">TELUGU</span></td>
	</tr>
	<!-- <tr>
			<td style="width:162px; padding:2px 8px 2px 8px; text-align:left;"><img border="0" height="16" src="http://in.bmscdn.com/mailers/images/bms210214/yellow.png" width="16" style="float:left;"/><img border="0" height="16" src="http://in.bmscdn.com/mailers/images/bms210214/yellow.png" width="16" style="float:left;"/><img border="0" height="16" src="http://in.bmscdn.com/mailers/images/bms210214/yellow.png" width="16" style="float:left;"/> <img border="0" height="16" src="http://in.bmscdn.com/mailers/images/bms210214/yellow1.png" width="16" style="float:left;"/><img border="0" height="16" src="http://in.bmscdn.com/mailers/images/bms210214/blank.png" width="16" style="float:left;"/></td>
			</tr> -->
   <tr>
	 <td style="width:162px; padding:2px 8px 2px 8px; text-align:left;"><span style="font-size:14px; line-height:16px; color:#89B540; float:left; font-weight:bold;">91%</span><span style="font-size:13px; float:left;">&nbsp;want to see</span></td>
  </tr>  
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<a href="http://in.bookmyshow.com/email_tracker.bms?eId=<%user.email%>&amp;mId=<%message.pk%>&amp;url=https://in.bookmyshow.com/movies/nayaki/ET00041103?%26utm_source%3DCRMSelfiRaja14July2016%26utm_medium%3Demail%26utm_campaign%3D{{name}}" target="_blank" style="text-decoration:none; color:#ffffff;">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td  width="160" height="30" align="center" valign="middle" style="font-size:12px; font-family: Montserrat, Arial, sans-serif; color:#ffffff; background-color:#C02C3A; text-align:center;">BOOK&nbsp;NOW</td>
					</tr>
				</table>
			</a>
		</td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td height="20" style="background-color:#ffffff;"></td>
	</tr>
</table></textarea></div>
</div>
<BUTTON data-copytarget="#holdtext">Copy to Clipboard</BUTTON>
<script>
			/*
    Copy text from any appropriate field to the clipboard
  By Craig Buckler, @craigbuckler
  use it, abuse it, do whatever you like with it!
*/
(function() {

    'use strict';
  
  // click events
  document.body.addEventListener('click', copy, true);

    // event handler
    function copy(e) {

    // find target element
    var 
      t = e.target,
      c = t.dataset.copytarget,
      inp = (c ? document.querySelector(c) : null);
      
    // is element selectable?
    if (inp && inp.select) {
      
      // select text
      inp.select();

      try {
        // copy text
        document.execCommand('copy');
        inp.blur();
        
        // copied animation
        t.classList.add('copied');
        setTimeout(function() { t.classList.remove('copied'); }, 1500);
      }
      catch (err) {
        alert('please press Ctrl/Cmd+C to copy');
      }
      
    }
    
    }

})();

		</script>
	</body>
</html>