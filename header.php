<!DOCTYPE html>
<html>
	<head>

		<!--
			Copyright (C) 2013 
			Michael Sheldon <mike@mikeasoft.com>
			Amanda Clare <afc@aber.ac.uk>
			Hannah Dee <hmd1@aber.ac.uk>

			Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

			The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

			THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
		-->

		<title><?php echo $title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/playground.css" rel="stylesheet" media="screen">
		<link href="css/jsxgraph.css" rel="stylesheet" media="screen">
		<script type="text/x-mathjax-config">
			MathJax.Hub.Config({
				tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}
			});
		</script>
		<script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/underscore.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jsxgraphcore.js"></script>
		<script type="text/javascript" src="js/jsxgraph.vector.js"></script>
		<script type="text/javascript" src="js/utils.js"></script>
		<script type="text/javascript" src="js/jquery.jqplot.min.js"></script>
		<script type="text/javascript" src="js/plugins/jqplot.barRenderer.min.js"></script>
		<script type="text/javascript" src="js/plugins/jqplot.highlighter.min.js"></script>
		<script type="text/javascript" src="js/plugins/jqplot.cursor.min.js"></script>
		<script type="text/javascript" src="js/plugins/jqplot.pointLabels.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery-ui/jquery-ui.min.css" />
		<?php
			if(is_file("analytics.php") && is_readable("analytics.php")) {
				include("analytics.php");
				echo "<script type='text/javascript'>
						var _gaq = _gaq || [];
						_gaq.push(['_setAccount', '$analyticsAccountId']);
						_gaq.push(['_trackPageview']);

						(function() {
							var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
							ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
							var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
						})();
					</script>";
			}
		?>

</head>
