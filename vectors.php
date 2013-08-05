<?php 
$title = 'Vectors - Mathematics Playground';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Vectors</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em; margin-bottom: 2em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#scalars">Scalars</a></li>
						<li><a href="#addition">Addition</a></li>
						<li><a href="#subtraction">Subtraction</a></li>
						<li><a href="#dotproduct">Dot Product and Cross Product</a></li>
						<li><a href="#eqline">Equation of a Line</a></li>
						<li><a href="#eqplane">Equation of a Plane</a></li>
					</ul>
				</div>

				<div>
					<h2 id='scalars'>Scalars</h2>

					<br />

					<p>The graph below shows three vectors which all share the same scalar component. Adjust the slider at the top of the graph to change the scalar value. The definition for each vector is displayed beneath the graph.</p>

					<br /><br />

					<center><div id='slrgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="slrjsx.zoom100(); slrjsx.moveOrigin(slrox, slroy); ">Reset position</button> <span class='mousepos' id='slrmousepos'></span></div>

					<br />
					
					<center>
					<div style='float: left; margin-left: 130px;'>$\vec{v1} = $<span id='s1'> s</span>$\begin{bmatrix}0.5\\ 0.5\end{bmatrix}$</div>
					<div style='float: left; margin-left: 30px;'>$\vec{v2} = $<span id='s2'> s</span>$\begin{bmatrix}0.75\\ -0.25\end{bmatrix}$</div>
					<div style='float: left; margin-left: 30px;'>$\vec{v3} = $<span id='s3'> s</span>$\begin{bmatrix}0.25\\ 0.75\end{bmatrix}$</div>
					</center>

					<br /><br />

					<script type='text/javascript'>
						var slrjsx = JXG.JSXGraph.initBoard('slrgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var slrox = slrjsx.origin.scrCoords[1];
						var slroy = slrjsx.origin.scrCoords[2];

						var slrscalar = slrjsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 4, 8]], {name:'scalar', snapWidth:0.1});
						var slrp = slrjsx.create('point', [0, 0], {visible: false, fixed: true});
						var slrv1 = slrjsx.create('vector', [slrp, [0.5, 0.5], slrscalar], {name: 'v1', withLabel: true});
						var slrv2 = slrjsx.create('vector', [slrp, [0.75, -0.25], slrscalar], {name: 'v2', withLabel: true});
						var slrv3 = slrjsx.create('vector', [slrp, [0.25, 0.75], slrscalar], {name: 'v3', withLabel: true});

						slrjsx.on('update', function() {
							$("#s1,#s2,#s3").html(' ' + slrscalar.Value().toFixed(2));
						});
						slrjsx.update();
					</script>

					<br /><br />
				</div>

				<div>
					<h2 id='addition'>Addition</h2>

					<br />

					<p>Drag the ends of the two black vectors to change their direction and magnitude. The blue vector shows the result of adding the two black vectors together.</p>

					<br /><br />

					<center><div id='addgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="addjsx.zoom100(); addjsx.moveOrigin(addox, addoy); ">Reset position</button> <span class='mousepos' id='slrmousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						var addjsx = JXG.JSXGraph.initBoard('addgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var addox = addjsx.origin.scrCoords[1];
						var addoy = addjsx.origin.scrCoords[2];

						var addp = addjsx.create('point', [0, 0], {visible: false, fixed: true});
						var addp1 = addjsx.create('point', [2, 2], {fillColor: 'white', strokeColor: 'black', name: 'v1'});
						var addv1 = addjsx.create('arrow', [addp, addp1], {strokecolor: 'black', strokeWidth: 3});
						var addp2 = addjsx.create('point', [2, 6], {fillColor: 'white', strokeColor: 'black', name: 'v2'});
						var addv2 = addjsx.create('arrow', [addp1, addp2], {strokecolor: 'black', strokeWidth: 3});
						var addv3 = addjsx.create('arrow', [addp, addp2], {strokecolor: '#44c', strokeWidth: 3});
					</script>
				</div>
			</div>
		</div>
	</body>
</html>
