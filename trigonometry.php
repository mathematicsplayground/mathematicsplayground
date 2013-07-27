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
		<div class="dropdown clearfix" style='float: right;'>
			<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
			
			<li><a href="#radians">Radians</a></li>
			<li><a href="#pythagoras">Pythagoras</a></li>
			<li><a href="#unitcircle">Unit Circle &mdash; Sine, Cosine and Tangent</a></li>
			<li><a href="#equationcircle">Equation of a Circle</a></li>
              </ul>
            </div>

				<div>

					<h2 id='radians'>Radians</h2>

					<br /><br />

					<h2 id='pythagoras'>Pythagoras</h2>

					<br />

					$a^2 + b^2 = c^2$

					<br /><br />

					<p>Move the sliders on the following graph to change the length of the sides in a right angled triangle. Click the <em>"Show squares"</em> option to display squares attached to each side of the triangle. The value of the hypotenuse is calculated based on Pythagoras' theorem and displayed below the graph.</p>

					<br /><br />

					<center><div id='eqpyth' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="pythjsx.zoom100(); pythjsx.moveOrigin(225, 225); ">Reset position</button> <span class='mousepos' id='pythmousepos'></span><br /><br /><input type='checkbox' id='showsquares' onclick='showSquares();' /><label for='showsquares'>Show squares</label></div>

					<center>
					<span id='pya'>a</span>$^2 + $<span id='pyb'>b</span>$^2 = $<span id='pyc'> c</span>$^2$<br />
					<small><span id='pyasq'>a</span>$ + $<span id='pybsq'>b</span>$ = $<span id='pycsq'> c</span></small>
					</center>

					<script type='text/javascript'>
						var pythjsx = JXG.JSXGraph.initBoard('eqpyth', {boundingbox: [-18, 32, 32, -18], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var pa = pythjsx.createElement('slider', [[1,1], [1,15], [0,8,14]], {name:'a', snapWidth:0.1});
						var pb = pythjsx.createElement('slider', [[1,1], [15,1], [0,8,14]], {name:'b', snapWidth:0.1});
						var corner = pythjsx.create('point', [1,1], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: true, borderColor: 'black'});
						var poly = pythjsx.create('polygon', [pa, pb, corner]);
						var sqa = pythjsx.create('regularpolygon', [corner, pa, 4], {fillColor: '#88f', highlight: false, withLabel: true, visible: false, label: {offset: [-15, 10]}});
						sqa.vertices[2].hideElement();
						sqa.vertices[3].hideElement();
						var sqb = pythjsx.create('regularpolygon', [pb, corner, 4], {fillColor: '#f88', highlight: false, withLabel: true, visible: false, label: {offset: [-15, 10]}});
						sqb.vertices[2].hideElement();
						sqb.vertices[3].hideElement();
						var sqc = pythjsx.create('regularpolygon', [pa, pb, 4], {fillColor: '#f18', highlight: false, withLabel: true, visible: false, label: {offset: [-15, 10]}});
						sqc.vertices[2].hideElement();
						sqc.vertices[3].hideElement();
						pythjsx.attr.pan.needShift = true;
						pythjsx.on('update', function() {
							sqa.setLabelText(sqa.Area().toFixed(2));
							sqb.setLabelText(sqb.Area().toFixed(2));
							sqc.setLabelText(sqc.Area().toFixed(2));
							$('#pyasq').text(' ' + sqa.Area().toFixed(2));
							$('#pybsq').text(' ' + sqb.Area().toFixed(2));
							$('#pycsq').text(' ' + sqc.Area().toFixed(2));
							$('#pya').text(' ' + Math.sqrt(sqa.Area()).toFixed(2));
							$('#pyb').text(' ' + Math.sqrt(sqb.Area()).toFixed(2));
							$('#pyc').text(' ' + Math.sqrt(sqc.Area()).toFixed(2));
						});
						pythjsx.on('mousemove', function(e) {
							var mPos = pythjsx.getUsrCoordsOfMouse(e);
							$('#pythmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
						});
						pythjsx.update();

						function showSquares() {
							if($("#showsquares").is(':checked')) {
								sqa.showElement();
								sqb.showElement();
								sqc.showElement();
								sqa.label.content.showElement();
								sqb.label.content.showElement();
								sqc.label.content.showElement();
								pythjsx.update();
							} else {
								sqa.hideElement();
								sqb.hideElement();
								sqc.hideElement();
							}
						}
					</script>

					<br /><br />

					<h2 id='unitcircle'>Unit Circle &mdash; Sine, Cosine and Tangent</h2>

					<br /><br />

					<h2 id='equationcircle'>Equation of a Circle</h2>

					<br />

					$(X - a)^2 + (Y - b)^2 = r^2$

					<br /><br />

					<p>The graph below displays a circle which can have its radius modified via the slider at the top, and its position changed by dragging the central point. The equation for this specific circle is displayed underneath the graph.</p>

					<br />

					<center><div id='eqcirc' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="jsx.zoom100(); jsx.moveOrigin(225, 225); ">Reset position</button> <span class='mousepos' id='mousepos'></span></div>

					<br />					

					<center>$(X - $<span id='a'>a</span>$)^2 + (Y - $<span id='b'>b</span>$)^2 = $<span id='r'>r</span>$^2$</center>

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
