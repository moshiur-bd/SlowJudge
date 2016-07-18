<head>
  <link href="syntax/styles/shCore.css" rel="stylesheet" type="text/css" />
  <link href="syntax/styles/main.css" rel="stylesheet" type="text/css" />
  <link href="syntax/styles/shThemeDefault.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id='code'>
  <pre class="brush: cpp">
	<?php
		$s="\n";
		$head="Don't Copy  ";
		$head='';
		$fp=fopen('src.txt','r');
		$line;
		while($line=fgets($fp)){
			$s=$s.$head.$line;
		}
		
		//$s=ltrim($s);
		echo htmlentities($s); 
	?>
	</pre>

  </div>

  <script src="syntax/scripts/shCore.js"></script>
  <script src="syntax/scripts/shAutoloader.js"></script>
  <script src="syntax/scripts/shBrushXml.js"></script>
  <script src="syntax/scripts/shBrushCpp.js"></script>
  <script src="syntax/scripts/shBrushCss.js"></script>
  <script src="syntax/scripts/shBrushJava.js"></script>
  <script src="syntax/scripts/main.js"></script>
  <script>
    SyntaxHighlighter.all();
  </script>
  
  
</body>