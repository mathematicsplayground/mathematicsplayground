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

<!--					<h2>Radians</h2>

					<p>Pellentesque neque elit, tincidunt in felis id, sagittis malesuada dolor. Sed congue, neque quis blandit auctor, turpis magna mattis nunc, varius euismod dui ligula et erat. Nullam rutrum dolor lorem, sit amet convallis neque consectetur ut. Aenean suscipit, tortor id sagittis consectetur, quam justo interdum elit, eget placerat quam magna et lectus. In id faucibus augue. Proin lacinia nisl lectus, vitae lobortis sapien hendrerit at. Cras lobortis quam quis leo egestas congue. Quisque a justo nisl. Cras a dictum metus, vel posuere urna. Fusce dictum id nulla consectetur dictum. Sed non leo at nibh dignissim dictum et at est. Quisque quis eleifend felis. Ut id bibendum elit. Sed ullamcorper erat tristique mauris rhoncus convallis. Morbi vestibulum nibh eu dolor tincidunt faucibus.</p>

					<h2>Pythagoras</h2>

					<p>Suspendisse imperdiet auctor arcu. In hac habitasse platea dictumst. Donec rhoncus, elit ac imperdiet tincidunt, libero quam tempor nisl, sed lacinia ligula velit et massa. Quisque accumsan, justo vitae dictum laoreet, justo dolor suscipit mi, vitae ornare quam quam vitae mauris. Mauris vestibulum eleifend dui, a pellentesque augue iaculis ac. Aliquam in quam id justo bibendum sollicitudin sed in tellus. Phasellus venenatis, magna at tempus accumsan, magna arcu convallis elit, ac imperdiet nunc metus et orci. Nam cursus pharetra elementum. Vestibulum lobortis nunc eu scelerisque lacinia.</p>

					<h2>Unit circle</h2>

					<p>Phasellus a arcu quis quam luctus hendrerit eu sed risus. Cras eu orci laoreet, laoreet purus quis, placerat neque. Sed urna nibh, tincidunt sit amet convallis ut, luctus pretium tortor. Quisque tincidunt posuere justo, et pulvinar massa adipiscing at. Vestibulum luctus cursus mauris nec dignissim. Integer pretium orci id lectus malesuada ornare. Praesent dictum, eros sit amet varius fermentum, purus magna posuere tortor, convallis egestas tortor massa ut sapien. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam vel varius libero. Vestibulum nec nulla est. Ut vel ante massa. Morbi in adipiscing velit, in pretium dui. Quisque eget tellus aliquet, iaculis turpis ut, venenatis ante. Nam nec gravida nulla. Fusce sed tellus augue.</p>

					<h2>Sin/Cos/Tan</h2>

					<p>Vivamus eu lobortis turpis. Integer et massa a risus vulputate tristique. Vestibulum imperdiet in ante et euismod. Phasellus eleifend risus neque, eget fermentum urna volutpat id. In in mauris lacinia elit gravida semper in at leo. Etiam sed nisi eleifend, congue turpis eu, rhoncus mauris. Aliquam et mi sagittis, dictum eros in, placerat massa. Mauris dapibus tempor libero, nec fringilla sapien dictum id. Ut interdum, risus quis tristique porttitor, mauris dolor accumsan justo, vel gravida leo eros eget ligula. Ut egestas lacus et tellus porttitor iaculis. Morbi suscipit eros sit amet ultrices tristique. Quisque euismod nisl eu neque scelerisque, vitae feugiat lorem lobortis. Pellentesque tempor gravida blandit. Aliquam erat volutpat.</p>
-->
					<h2>Equation of a circle</h2>

<br />
$(X - a)^2 + (Y - b)^2 = r^2$
<br /><br />

					The graph below displays a circle which can have its radius modified via the slider at the top, and its position changed by dragging the central point. The equation for this specific circle is displayed underneath the graph.</p>

					<br />

					<center><div id='eqcirc' class='jxgbox' style='width: 450px; height: 450px;'></div></center>

					<br />					

					<center>$(X - $<span id='a'>a</span>$)^2 + (Y - $<span id='b'>b</span>$)^2 = $<span id='r'>r</span>$^2$</centeR>

					<script type='text/javascript'>
						var jsx = JXG.JSXGraph.initBoard('eqcirc', {boundingbox: [-6, 6, 6, -6], grid: true, showcopyright: false});
						var r = jsx.createElement('slider', [[-5,5], [4.5,5], [0,1,5]], {name:'r', snapWidth:0.1});
						var centre = jsx.create('point', [0,0], {strokeColor: 'black', fillColor: 'white', name:''});
						var circ = jsx.create('circle', [centre, 1], {fillColor: '#ccf', highlightFillColor: '#ccf', fillOpacity: 0.5, highlightFillOpacity: 0.5, strokeColor: 'black', highlightStrokeColor: 'black'});

						jsx.on('update', function() {
							circ.setRadius(r.Value());
							$('#a').text(' ' + circ.center.X().toFixed(2));
							$('#b').text(' ' + circ.center.Y().toFixed(2));
							$('#r').text(' ' + circ.getRadius().toFixed(2));
						});
						jsx.update();
					</script>

					<br /><br />

			</div>
		</div>
	</body>
</html>
