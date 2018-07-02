<!DOCTYPE html>
<html lang="en-US">
	<head>
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
			#btn{
			background-color:#d6181f; /* when in focus */
			width:20%;
			color:#ffffff;
			font-size:15px; /* This probably makes it "fat" as you want */
			border-radius: 10px;
			margin:20px 10px auto;
			outline:0 none;
			padding:5px;
			}
		</style>
	</head>
	<body>
		<div class="container" >
			<fieldset>
				<legend>Event</legend>
				<?php
					$find   = 'ET';
					$link = $_POST["link"];
					$pos = strpos($link, $find);
					if ($pos !== FALSE)
						{
							$etcode = substr($link,$pos);
						    echo '<h1>ET Code: ' . $etcode . '</h1><br />'; 
							$output = file_get_contents($link);
							function get_string_between($string, $start, $end){
						    $string = ' ' . $string;
						    $ini = strpos($string, $start);
						    if ($ini == 0) return '';
						    $ini += strlen($start);
						    $len = strpos($string, $end, $ini) -$ini;
							    return substr($string, $ini, $len);
							}
							$eventName = get_string_between($output, "'event_name': '", " ',");
							$eventNameCalenderArray = array(' ',"'", '"',',');
							$eventNameCalender = str_replace($eventNameCalenderArray, '+', $eventName);
							$eventDate = get_string_between($output, "'event_date': '", "',");
							$eventVenue1 = get_string_between($output, "'venue_location': '", "});");
							$eventVenuesubstring = ',';

							$pos = strpos($eventVenue1,$eventVenuesubstring);

							if($pos === false) {
							$eventVenue = get_string_between($output, "'venue_location': '", "'");
							}
							else {
							 $eventVenue = get_string_between($output, "'venue_location': '", ",");
							}
							$eventVenueCalenderArray = array(' ',"'", '"',',');
							$eventVenueCalender = str_replace($eventVenueCalenderArray, '+', $eventVenue);
							$eventGenre1 = get_string_between($output, '<div class="tags">', '</span>');
							$eventGenre1 = str_replace(" ","",$eventGenre1);
							$eventGenre1 = str_replace("<span>","",$eventGenre1);
							$eventGenre = ucfirst(preg_replace('/\s+/', '', $eventGenre1));
							$time = strtotime($eventDate);
							$eventymd = date('Ymd',$time);
							$eventl = substr(date('l',$time),0,3);
							$eventF = substr(date('M',$time),0,3);
							$eventd = date('d',$time);
							$campaignSourceArray = array(' ','+','_','-',':','|',"'", '"',',','(',')');
							$campaignSource = str_replace($campaignSourceArray, '', $eventName);
							echo $eventName. "<br /><br />"; 
							echo $eventDate. "<br /><br />"; 
							echo $eventVenue. "<br /><br />"; 
							echo $eventGenre. "<br /><br />"; 
							echo $eventymd. "<br /><br />";
							echo $eventl. "<br /><br />";
							echo $eventF. "<br /><br />";
							echo $eventd . "<br /><br />";
							echo $eventNameCalender. "<br /><br />";
							echo $eventVenueCalender. "<br /><br />";
							echo $campaignSource. "<br /><br />"; 
					   						}
						else{
							echo "<h1>invalid Movie Link</h1>" ;
							echo '<h1>'. $_POST["link"] . " doesn't contain any etcode </h1>";
						}
					
					                ?>               
			</fieldset>
			<input type="checkbox" id="main_banner" name="main_banner" onclick="main()"/>
			<BUTTON id="btn" data-copytarget="#holdtext">Copy to Clipboard</BUTTON> 
			<div class="code-cointainer">
				<textarea id="holdtext"><table class="deviceWidth" cellspacing="0" cellpadding="0" align="left" style="width:40%; min-width:250px; max-width:292px; margin:10px 25px; background-color:#ffffff; vertical-align:top;display:inline-block;float:none;">
																		<tr>
																			<td style="width:100%;">
																				<table cellpadding="0" cellspacing="0" border="0" align="center" style="background-color:#ffffff; margin:0 auto;">
																					<tr>
																						<td valign="top" style="width:100%; background-color:#ffffff;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#fff;"><img src="https://in.bmscdn.com/events/eventlisting/<?php echo $etcode; ?>.jpg" alt="<?php echo $eventName; ?>ng" title="<?php echo $eventName; ?>ng" border="0" style="width:100%; display:block; background-color:#ffffff; color:#010101; overflow:hidden; border-radius:10px;"/></a></td>
																					</tr>
																					<tr>
																						<td style="width:100%;padding:10px 5px 0px 5px; font-size:16px; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; color:#333333; line-height:22px;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#333333; font-family:Verdana, Arial,sans-serif;"><?php echo $eventName; ?></a></td>
																					</tr>
																					<tr>
																						<td style="width:100%;padding:5px 5px; font-size:12px; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; color:#666666; line-height:18px;"><?php echo $eventVenue; ?></td>
																					</tr>
																					<tr>
																						<td style="width:100%;padding:5px 5px 5px 5px; font-size:12px; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; line-height:19px; font-weight:normal; color:#a3a3a3;"><?php echo $eventGenre; ?></td>
																					</tr>
																					<tr>
																						<td align="center" style="width:100%; padding:5px 0px 0px 0px; background-color:#ffffff;">
																							<table cellspacing="0" cellpadding="0" align="left" style="float:left;">
																								<tr>
																									<td style="padding:15px 5px 0px 5px; font-size:13px; font-weight:bold; font-family:Verdana, Arial,sans-serif; text-align:left; color:#666666; text-transform:capitalize; line-height:16px;"><?php echo $eventF; ?> <?php echo $eventd; ?>, <?php echo $eventl; ?></td>
																								</tr>
																							</table>
																							<table cellspacing="0" cellpadding="0" align="right" style="float:right;">
																								<tr>
																									<td style="padding:5px; text-align:right;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#ffffff;"><span style="padding:10px 25px 9px 25px; line-height:40px; font-family:Verdana, Arial,sans-serif; font-size:12px; white-space:nowrap; color:#ffffff; background-color:#0072ff; font-weight:bold; border-radius:5px;">BOOK</span></a></td>
																								</tr>
																							</table>
																						</td>
																					</tr>
																				</table>
																			</td>
																		</tr>
																	</table></textarea>
			</div>
		</div>
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
		<script type="text/javascript">
function main(){
if (document.getElementById('main_banner').checked) 
{
document.getElementById('holdtext').innerHTML = '<table cellpadding="0" cellspacing="0" class="deviceWidth" border="0" align="center" style="width:570px; padding:10px 10px 10px 10px;background-color:#ffffff; margin:0 auto;"><tr><td valign="top" style="width:100%; background-color:#ffffff;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#fff;"><img src="https://in.bmscdn.com/events/mobile/<?php echo $etcode; ?>.jpg" alt="<?php echo $eventName; ?>" title="<?php echo $eventName; ?>" border="0" style="width:100%; display:block; background-color:#ffffff; color:#000000; overflow:hidden; border-radius:10px;"/><img src="https://in.bmscdn.com/mailers/images/180207nm/banner_shadow.jpg" alt="" title="" border="0" style="width:100%; display:block; background-color:#ffffff; color:#000000;"/></a></td></tr><tr><td class="deviceWidth" align="center" style=" background-color:#ffffff;"> <table class="deviceWidth" cellspacing="0" cellpadding="0" align="center" style="width:570px; margin:0px auto;border-spacing:0;"><tr><td colspan="2" style="padding:0px 0px 0px 0px; font-size:20px; font-weight:bold; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; color:#333333; line-height:26px;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#333333; font-family:Verdana, Arial,sans-serif;"><?php echo $eventName; ?></a><span style="display:block;line-height:18px; font-size:15px; padding:5px 0 5px 0;font-weight:normal; color:#666666;"><?php echo $eventVenue; ?></span><span style="display:block; padding:5px 0 0px 0; line-height:16px; font-size:12px;font-weight:normal; color:#a3a3a3;"><?php echo $eventGenre; ?></span></td></tr><tr><td valign="middle" style="width:100%; padding:10px 0px 0px 0px; font-size:20px; font-weight:bold; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; color:#333333; line-height:26px;"><span style="display:block; padding:5px 0px 15px 0px; font-size:15px; font-weight:bold; font-family:Verdana, Arial,sans-serif; text-align:left; color:#666666; line-height:16px;"><?php echo $eventF; ?> <?php echo $eventd; ?>, <?php echo $eventl; ?></span></td><td valign="top" style="min-width:108px;padding:0px 0px 10px 0px; text-align:left"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" style="text-decoration:none; color:#ffffff;"><span style="padding:12px 30px 12px 30px; line-height:40px; font-family:Verdana, Arial,sans-serif; font-size:15px; white-space:nowrap; color:#ffffff; background-color:#0072ff; font-weight:bold; border-radius:4px;">BOOK</span></a></td></tr></table></td></tr></table>';
} else {
document.getElementById('holdtext').innerHTML = '<table class="deviceWidth" cellspacing="0" cellpadding="0" align="left" style="width:40%; min-width:250px; max-width:292px; margin:10px 25px; background-color:#ffffff; vertical-align:top;display:inline-block;float:none;"><tr><td style="width:100%;"><table cellpadding="0" cellspacing="0" border="0" align="center" style="background-color:#ffffff; margin:0 auto;"><tr><td valign="top" style="width:100%; background-color:#ffffff;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#fff;"><img src="https://in.bmscdn.com/events/eventlisting/<?php echo $etcode; ?>.jpg" alt="<?php echo $eventName; ?>ng" title="<?php echo $eventName; ?>ng" border="0" style="width:100%; display:block; background-color:#ffffff; color:#010101; overflow:hidden; border-radius:10px;"/></a></td></tr><tr><td style="width:100%;padding:10px 5px 0px 5px; font-size:16px; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; color:#333333; line-height:22px;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#333333; font-family:Verdana, Arial,sans-serif;"><?php echo $eventName; ?></a></td></tr><tr><td style="width:100%;padding:5px 5px; font-size:12px; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; color:#666666; line-height:18px;"><?php echo $eventVenue; ?></td></tr><tr><td style="width:100%;padding:5px 5px 5px 5px; font-size:12px; vertical-align:top; font-family:Verdana, Arial,sans-serif; text-align:left; line-height:19px; font-weight:normal; color:#a3a3a3;"><?php echo $eventGenre; ?></td></tr><tr><td align="center" style="width:100%; padding:5px 0px 0px 0px; background-color:#ffffff;"><table cellspacing="0" cellpadding="0" align="left" style="float:left;"><tr><td style="padding:15px 5px 0px 5px; font-size:13px; font-weight:bold; font-family:Verdana, Arial,sans-serif; text-align:left; text-transform:capitalize; color:#666666; text-transform:capitalize; line-height:16px;"><?php echo $eventF; ?> <?php echo $eventd; ?>, <?php echo $eventl; ?></td></tr></table><table cellspacing="0" cellpadding="0" align="right" style="float:right;"><tr><td style="padding:5px; text-align:right;"><a href="<?php echo $link; ?>?&utm_source=NMMumbaiEvent23October2017&utm_medium=email&utm_campaign=<?php echo $campaignSource; ?>" target="_blank" style="text-decoration:none; color:#ffffff;"><span style="padding:10px 25px 9px 25px; line-height:40px; font-family:Verdana, Arial,sans-serif; font-size:12px; white-space:nowrap; color:#ffffff; background-color:#0072ff; font-weight:bold; border-radius:5px;">BOOK</span></a></td></tr></table></td></tr></table></td></tr></table>';
}
}
</script>
	</body>
</html>

