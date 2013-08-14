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
						<li><a href="#dotproduct">Dot Product</a></li>
						<li><a href="#crossproduct">Cross Product</a></li>
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
					<div style='float: left; margin-left: 116px;'>$\vec{v1} = $<span id='s1'> s</span>$\begin{bmatrix}-0.75\\ 0.25\end{bmatrix}$</div>
					<div style='float: left; margin-left: 30px;'>$\vec{v2} = $<span id='s2'> s</span>$\begin{bmatrix}0.75\\ -0.25\end{bmatrix}$</div>
					<div style='float: left; margin-left: 30px;'>$\vec{v3} = $<span id='s3'> s</span>$\begin{bmatrix}0.25\\ 0.75\end{bmatrix}$</div>
					</center>

					<br /><br />

					<script type='text/javascript'>
						var slrjsx = JXG.JSXGraph.initBoard('slrgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var slrox = slrjsx.origin.scrCoords[1];
						var slroy = slrjsx.origin.scrCoords[2];

						var slrscalar = slrjsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [-8, 4, 8]], {name:'scalar', snapWidth:0.1});
						var slrp = slrjsx.create('point', [0, 0], {visible: false, fixed: true});
						var slrv1 = slrjsx.create('vector', [slrp, [-0.75, 0.25], slrscalar], {strokeColor: '#44f', point: {strokeColor: '#44f', name: 'v1', withLabel: true}});
						var slrv2 = slrjsx.create('vector', [slrp, [0.75, -0.25], slrscalar], {strokeColor: '#4f4', point: {strokeColor: '#4f4', name: 'v2', withLabel: true}});
						var slrv3 = slrjsx.create('vector', [slrp, [0.25, 0.75], slrscalar], {strokeColor: '#f44', point: {strokeColor: '#f44', name: 'v3', withLabel: true}});

						slrjsx.on('update', function() {
							$("#s1,#s2,#s3").html(' ' + slrscalar.Value().toFixed(2));
						});
						slrjsx.on('mousemove', function(e) {
							var mPos = slrjsx.getUsrCoordsOfMouse(e);
							$('#slrmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
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
					<div class='graphcontrols'><button onclick="addjsx.zoom100(); addjsx.moveOrigin(addox, addoy); ">Reset position</button> <span class='mousepos' id='addmousepos'></span></div>

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
						addjsx.create('text',[
							function(){return (addp.X() + addp2.X()) * 0.5 - 2;},
							function(){return (addp.Y() + addp2.Y()) * 0.5;},
							'v1 + v2']
						);
						addjsx.on('mousemove', function(e) {
							var mPos = addjsx.getUsrCoordsOfMouse(e);
							$('#addmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
						});
					</script>
				</div>
				<div>
					<h2 id='subtraction'>Subtraction</h2>

					<br />

					<p>Drag the ends of the two black vectors to change their direction and magnitude. The green vector shows the result of subtracting v1 from v2.</p>

					<br /><br />

					<center><div id='subgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="subjsx.zoom100(); subjsx.moveOrigin(subox, suboy); ">Reset position</button> <span class='mousepos' id='submousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						var subjsx = JXG.JSXGraph.initBoard('subgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var subox = subjsx.origin.scrCoords[1];
						var suboy = subjsx.origin.scrCoords[2];

						var subp = subjsx.create('point', [0, 0], {visible: false, fixed: true});
						var subp1 = subjsx.create('point', [3, -2], {fillColor: 'white', strokeColor: 'black', name: 'v1'});
						var subv1 = subjsx.create('arrow', [subp, subp1], {strokecolor: 'black', strokeWidth: 3});
						var subp2 = subjsx.create('point', [1, 4], {fillColor: 'white', strokeColor: 'black', name: 'v2'});
						var subv2 = subjsx.create('arrow', [subp, subp2], {strokecolor: 'black', strokeWidth: 3});
						var subv3 = subjsx.create('arrow', [subp1, subp2], {strokecolor: '#4c4', strokeWidth: 3});
						subjsx.create('text',[
							function(){return (subp1.X() + subp2.X()) * 0.5 + 0.5;},
							function(){return (subp1.Y() + subp2.Y()) * 0.5;},
							'v2 - v1']
						);
						subjsx.on('mousemove', function(e) {
							var mPos = subjsx.getUsrCoordsOfMouse(e);
							$('#submousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
						});
					</script>
				</div>

				<div>
					<h2 id='dotproduct'>Dot Product</h2>

					<br />

					$\vec{a}.\vec{b} = |\vec{a}| |\vec{b}| cos\theta$<br /><br />

					<p>Drag the ends of the two vectors to change their direction and magnitude. The blue line shows the component of $\vec{b}$ in the direction of $\vec{a}$ ($\frac{\vec{a}.\vec{b}}{|\vec{a}|}$) </p>

					<br /><br />

					<center><div id='dotgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="dotjsx.zoom100(); dotjsx.moveOrigin(dotox, dotoy); ">Reset position</button> <span class='mousepos' id='dotmousepos'></span></div>

					<br />
					
					<center>
						$\vec{a}.\vec{b} = $<span id='ascalar'>a</span>$ * $<span id='bscalar'>b</span>$ * cos($<span  id='theta'>&Theta;</span>$) = $ <span id='dotres'>0</span>
					</center>

					<br /><br />

					<script type='text/javascript'>
						var dotjsx = JXG.JSXGraph.initBoard('dotgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var dotox = dotjsx.origin.scrCoords[1];
						var dotoy = dotjsx.origin.scrCoords[2];

						var dotp = dotjsx.create('point', [0, 0], {visible: false, fixed: true});
						var dotp1 = dotjsx.create('point', [1, 4], {fillColor: 'white', strokeColor: 'black', name: 'a'});
						var dotv1 = dotjsx.create('arrow', [dotp, dotp1], {strokecolor: 'black', strokeWidth: 3});
						var dotp2 = dotjsx.create('point', [3, 2], {fillColor: 'white', strokeColor: 'black', name: 'b'});
						var dotv2 = dotjsx.create('arrow', [dotp, dotp2], {strokecolor: 'black', strokeWidth: 3});
						var dotr = dotjsx.create('point', [0, 0], {visible: false, fixed: true});
						var dotl = dotjsx.create('line', [dotp, dotr], {strokecolor: '#22e', strokeWidth: 3});
						dotl.setStraight(false, false);
						var dotangle = dotjsx.create('angle', [dotp2, dotp, dotp1], {name: '&Theta;', radius: 2});
						var dotproduct = dotv1.L() * dotv2.L() * Math.cos(dotangle.Value());
						var dist = JXG.Math.Geometry.distance([dotp1.X(), dotp1.Y()], [0, 0]);
						var component = dotproduct / dotv1.L();
						dotr.setPosition(JXG.COORDS_BY_USER, [dotp1.X() * component/dist, dotp1.Y() * component/dist]);
						dotjsx.on('update', function() {
							$("#ascalar").text(' ' + dotv1.L().toFixed(2));
							$("#bscalar").text(dotv2.L().toFixed(2));
							$("#theta").text(dotangle.Value().toFixed(2));
							dotproduct = dotv1.L() * dotv2.L() * Math.cos(dotangle.Value());
							$("#dotres").text(' ' + dotproduct.toFixed(2));
							dist = JXG.Math.Geometry.distance([dotp1.X(), dotp1.Y()], [0, 0]);
							component = dotproduct / dotv1.L();
							dotr.setPosition(JXG.COORDS_BY_USER, [dotp1.X() * component/dist, dotp1.Y() * component/dist]);
						});
						dotjsx.on('mousemove', function(e) {
							var mPos = dotjsx.getUsrCoordsOfMouse(e);
							$('#dotmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
						});
						dotjsx.update();
					</script>
				</div>

				<div>
					<h2 id='eqline'>Equation of a Line</h2>

					<br />
					$\vec{r} = \vec{a} + t\vec{d}$
					<br /><br />

					<p>Drag the two black and white points to modify the vectors $a$ and $d$ which describe the red line, use the slider to change the scalar value ($t$).</p>

					<br /><br />

					<center><div id='linegraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="linejsx.zoom100(); linejsx.moveOrigin(lineox, lineoy); ">Reset position</button> <span class='mousepos' id='linemousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						var linejsx = JXG.JSXGraph.initBoard('linegraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var lineox = linejsx.origin.scrCoords[1];
						var lineoy = linejsx.origin.scrCoords[2];

						var lineslr = linejsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [-4, 0.5, 4]], {name: 't', snapWidth: 0.1});
						var linep = linejsx.create('point', [0, 0], {visible: false, fixed: true});
						var linep1 = linejsx.create('point', [1, 4], {fillColor: 'white', strokeColor: 'black', name: 'a'});
						var linev1 = linejsx.create('arrow', [linep, linep1], {strokecolor: 'black', strokeWidth: 3, fixed: true});
						var linep2 = linejsx.create('point', [3, 2], {fillColor: 'white', strokeColor: 'black', name: 'd'});
						var linev2 = linejsx.create('arrow', [linep1, linep2], {strokecolor: 'black', strokeWidth: 3, fixed: true});
						var liner = linejsx.create('point', [3, 2], {fillColor: 'red', strokeColor: 'red', name: 'r', fixed: true});
						liner.setPosition(JXG.COORDS_BY_USER, [linep1.X() + lineslr.Value() * (linep2.X() - linep1.X()), linep1.Y() + lineslr.Value() * (linep2.Y() - linep1.Y())]);
						var linevr = linejsx.create('arrow', [linep, liner], {strokecolor: 'black', strokeWidth: 3});
						var linel = linejsx.create('line', [linep1, linep2], {strokecolor: '#c44', strokeWidth: 1, fixed: true});
						linejsx.on('update', function() {
							liner.setPosition(JXG.COORDS_BY_USER, [linep1.X() + lineslr.Value() * (linep2.X() - linep1.X()), linep1.Y() + lineslr.Value() * (linep2.Y() - linep1.Y())]);
						});
						linejsx.on('mousemove', function(e) {
							var mPos = linejsx.getUsrCoordsOfMouse(e);
							$('#linemousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
						});
						linejsx.update();
					</script>
				</div>

			</div>
		</div>
	</body>
</html>
