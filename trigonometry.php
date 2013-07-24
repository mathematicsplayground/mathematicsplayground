<!DOCTYPE html>
<html>
	<head>
		<title>Trigonometry - Mathematics Playground</title>
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
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jsxgraphcore.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<?php require_once('menu.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Trigonometry</h1>
				</div>

				<div>
					<h2>Equation of a circle</h2>

					<br />

					$(X - a)^2 + (Y - b)^2 = r^2$

					<br /><br />

					The graph below displays a circle which can have its radius modified via the slider at the top, and its position changed by dragging the central point. The equation for this specific circle is displayed underneath the graph.</p>

					<br />

					<center><div id='eqcirc' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="jsx.zoom100(); jsx.moveOrigin(225, 225); ">Reset position</button> <span class='mousepos' id='mousepos'></span></div>

					<br />					

					<center>$(X - $<span id='a'>a</span>$)^2 + (Y - $<span id='b'>b</span>$)^2 = $<span id='r'>r</span>$^2$</centeR>

					<script type='text/javascript'>
						var jsx = JXG.JSXGraph.initBoard('eqcirc', {boundingbox: [-6, 6, 6, -6], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						jsx.attr.pan.needShift = true;
						var r = jsx.createElement('slider', [[-5,5], [4.5,5], [0,1,5]], {name:'r', snapWidth:0.1});
						var centre = jsx.create('point', [0,0], {strokeColor: 'black', fillColor: 'white', name:''});
						var circ = jsx.create('circle', [centre, 1], {fillColor: '#ccf', highlightFillColor: '#ccf', fillOpacity: 0.5, highlightFillOpacity: 0.5, strokeColor: 'black', highlightStrokeColor: 'black'});

						jsx.on('update', function() {
							circ.setRadius(r.Value());
							$('#a').text(' ' + circ.center.X().toFixed(2));
							$('#b').text(' ' + circ.center.Y().toFixed(2));
							$('#r').text(' ' + circ.getRadius().toFixed(2));
						});
						jsx.on('mousemove', function(e) {
							var mPos = jsx.getUsrCoordsOfMouse(e);
							$('#mousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
						});
						jsx.update();
					</script>

					<br /><br />
				</div>
			</div>
		</div>
	</body>
</html>
