<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-SHOW SMP Events - copyright (c) 2015</title>
<style type="text/css">

body{
margin:0;
padding:0;
line-height: 1.5em;
}

b{font-size: 110%;}
em{color: red;}

#maincontainer{
width: 1024px; /*Width of main container*/
margin: 0 auto; /*Center container on page*/
}

#topsection{
background: #EAEAEA;
height: 50px; /*Height of top section*/
}

#topsection h1{
margin: 0;
padding-top: 15px;
}

#contentwrapper{
float: left;
width: 800px;
}

#contentcolumn{
margin-left: 100	px;
height: 800px;
 /*Set left margin to LeftColumnWidth*/
}

#leftcolumn{
float: left;
width: 200px; /*Width of left column*/
height: 810px;
margin-left: -1024px; /*Set left margin to -(MainContainerWidth)*/
background: #0000aa;
}

#footer{
clear: left;
width: 100%;
background: black;
color: #FFF;
text-align: center;
padding: 4px 0;
}

#footer a{
color: #FFFF80;
}

.innertube{
margin: 10px; /*Margins for inner DIV inside each column (to provide padding)*/
margin-top: 0;
}

/* ####### responsive layout CSS ####### */

@media (max-width: 840px){ /* responsive layout break point */
	#maincontainer{
	width: 100%;
	}
	
	#contentwrapper{
	float: none;
	}
	
	#leftcolumn{
	float: none;
	width: 100%;
	margin-left: 0;
	}
	
	#contentcolumn{
	margin-left: 0;
	}
}

</style>
<link href="css/my_styles.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
/*** Temporary text filler function. Remove when deploying template. ***/
var gibberish=["This is just some filler text", "Welcome to Dynamic Drive CSS Library", "Demo content nothing to read here"]
function filltext(words){
for (var i=0; i<words; i++)
document.write(gibberish[Math.floor(Math.random()*3)]+" ")
}

</script>

</head>
<body>
<div id="maincontainer">

<div id="topsection"><div class="innertube"><span class="default-page-header">E-SHOW SMP Events Show Managment System</span></div></div>

<div id="contentwrapper">
<div id="contentcolumn"> <iframe name="content" width="1024px" height="800"></iframe>
<div class="innertube"></div>
</div>
</div>

<div id="leftcolumn">
<div class="innertube"><table width="200" border="0">
  <tbody>
    <tr>
      <td> Add - Select Show</td>
    </tr>
    <tr>
      <td><a  href="Add_rider.php" target="content" > Add - Edit Riders </a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>
</div>

<div id="footer"></div>

</div>

</body>
</html>