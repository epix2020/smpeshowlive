<!doctype html>
<html>
<head>

<html>

<head>

	<!-- Created by Kåre Byberg © 21.01.2005. Please acknowledge if used on other domains than http://www.timpelen.com -->

	<!-- Version 1.1 - 22.04.2006 -->

	<!-- Version 1.2 - 12.04.2011 -->

	<title>Javascript Stopwatch</title>

	<script type="text/javascript">

	var flagclock = 0;

	var flagstop = 0;

	var stoptime = 0;

	var splitcounter = 0;

	var currenttime;

	var splitdate = '';

	var output;

	var clock;



	function startstop()

		{

		var startstop = document.getElementById('startstopbutton');

		var startdate = new Date();

		var starttime = startdate.getTime();

		if(flagclock==0)

			{

			startstop.value = 'Stop';

			flagclock = 1;

			counter(starttime);

			}

		else

			{

			startstop.value = 'Start';

			flagclock = 0;

			flagstop = 1;

			splitdate = '';

			}

		}



	function counter(starttime)

		{

		output = document.getElementById('output');

		clock = document.getElementById('clock');

		currenttime = new Date();

		var timediff = currenttime.getTime() - starttime;

		if(flagstop == 1)

			{

			timediff = timediff + stoptime

			}

		if(flagclock == 1)

			{

			clock.value = formattime(timediff,'');

			refresh = setTimeout('counter(' + starttime + ');',10);

			}

		else

			{

			window.clearTimeout(refresh);

			stoptime = timediff;

			}

		}



	function formattime(rawtime,roundtype)

		{

		if(roundtype == 'round')

			{

			var ds = Math.round(rawtime/100) + '';

			}

		else

			{

			var ds = Math.floor(rawtime/100) + '';

			}

		var sec = Math.floor(rawtime/1000);

		var min = Math.floor(rawtime/60000);

		ds = ds.charAt(ds.length - 1);

		if(min >= 60)

			{

			startstop();

			}

		sec = sec - 60 * min + '';

		if(sec.charAt(sec.length - 2) != '')

			{

			sec = sec.charAt(sec.length - 2) + sec.charAt(sec.length - 1);

			}

		else

			{

			sec = 0 + sec.charAt(sec.length - 1);

			}

		min = min + '';

		if(min.charAt(min.length - 2) != '')

			{

			min = min.charAt(min.length - 2)+min.charAt(min.length - 1);

			}

		else

			{

			min = 0 + min.charAt(min.length - 1);

			}

		return min + ':' + sec + ':' + ds;

		}



	function resetclock()

		{

		flagstop = 0;

		stoptime = 0;

		splitdate = '';

		window.clearTimeout(refresh);

		output.value = '';

		splitcounter = 0;

		if(flagclock == 1)

			{

			var resetdate = new Date();

			var resettime = resetdate.getTime();

			counter(resettime);

			}

		else

			{

			clock.value = "00:00:0";

			}

		}



	function splittime()

		{

		if(flagclock == 1)

			{

			if(splitdate != '')

				{

				var splitold = splitdate.split(':');

				var splitnow = clock.value.split(':');

				var numbers = new Array();

				var i = 0

				for(i;i<splitold.length;i++)

					{

					numbers[i] = new Array();

					numbers[i][0] = splitold[i]*1;

					numbers[i][1] = splitnow[i]*1;

					}

				if(numbers[1][1] < numbers[1][0])

					{

					numbers[1][1] += 60;

					numbers[0][1] -= 1;

					}

				if(numbers[2][1] < numbers[2][0])

					{

					numbers[2][1] += 10;

					numbers[1][1] -= 1;

					}

				var mzeros = (numbers[0][1] - numbers[0][0]) < 10?'0':'';

				var szeros = (numbers[1][1] - numbers[1][0]) < 10?'0':'';

				output.value += '\t+' + mzeros + (numbers[0][1] - numbers[0][0]) + ':' + szeros + (numbers[1][1] - numbers[1][0]) + ':' + (numbers[2][1] - numbers[2][0]) + '\n';

				}

			splitdate = clock.value;

			output.value += (++splitcounter) + '. ' + clock.value + '\n';

			}

		}

	</script>

	<style type="text/css">

	*

		{

		margin: 0;

		padding: 0;

		}



	input, textarea

		{

		width: 100%;

		font: normal 10px verdana;

		height: 15px;

		}

	</style>

</head>

<body>

	<input id="clock" type="text" value="00:00:0" style="text-align: center;" readonly><br>

	<input id="startstopbutton" type="button" value="Start" onClick="startstop();"><br>

	<input id="splitbutton" type="button" value="Split time" onClick="splittime();"><br>

	<input id="resetbutton" type="button" value="Reset" onClick="resetclock();"><br>

	<textarea id="output" style="height: 90%;"></textarea>


</body>


</html>