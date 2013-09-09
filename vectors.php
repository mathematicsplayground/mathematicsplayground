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
						<li><a href="#eqline">Equation of a Line</a></li>
					</ul>
				</div>

				<div>
					<h2 id='scalars'>Scalars</h2>

					<br />

					<p>The graph below shows three vectors which all share the same scalar component. Adjust the slider at the top of the graph to change the scalar value. The definition for each vector is displayed beneath the graph.</p>

					<br /><br />

					<center><div id='slrgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(slrjsx); initSlr();">Reset positions</button> <span class='mousepos' id='slrmousepos'></span></div>

					<br />
					
					<center>
					<div style='float: left; margin-left: 116px;'>$\vec{v1} = $<span id='s1'> s</span>$\begin{bmatrix}-0.75\\ 0.25\end{bmatrix}$</div>
					<div style='float: left; margin-left: 30px;'>$\vec{v2} = $<span id='s2'> s</span>$\begin{bmatrix}0.75\\ -0.25\end{bmatrix}$</div>
					<div style='float: left; margin-left: 30px;'>$\vec{v3} = $<span id='s3'> s</span>$\begin{bmatrix}0.25\\ 0.75\end{bmatrix}$</div>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initSlr() {
							slrjsx = JXG.JSXGraph.initBoard('slrgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

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
						}
						initSlr();
					</script>

					<br /><br />
				</div>

				<div>
					<h2 id='addition'>Addition</h2>

					<br />

					<p>Drag the ends of the two black vectors to change their direction and magnitude. The blue vector shows the result of adding the two black vectors together.</p>

					<br /><br />

					<center><div id='addgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(addjsx); initAdd();">Reset positions</button> <span class='mousepos' id='addmousepos'></span></div>

					<br />
					
					<center><span id='addresult'></span></center>

					<br /><br />

					<script type='text/javascript'>
						function initAdd() {
							addjsx = JXG.JSXGraph.initBoard('addgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

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

							addjsx.on('update', function() {
								var v1x = addp1.X().toFixed(2);
								var v1y = addp1.Y().toFixed(2);
								var v2x = (addp2.X() - addp1.X()).toFixed(2);
								var v2y = (addp2.Y() - addp1.Y()).toFixed(2);
								var resx = addp2.X().toFixed(2);
								var resy = addp2.Y().toFixed(2);
								$("#addresult").text("$\\begin{bmatrix} " + v1x + " \\\\" + v1y + "\\end{bmatrix} + \\begin{bmatrix} " + v1x + " \\\\ " + v2y + " \\end{bmatrix} = \\begin{bmatrix} " + resx + " \\\\" + resy + "\\end{bmatrix}$");
								MathJax.Hub.Queue(["Typeset", MathJax.Hub, "addresult"]);
							});

							addjsx.on('mousemove', function(e) {
								var mPos = addjsx.getUsrCoordsOfMouse(e);
								$('#addmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							addjsx.update();
						}
						initAdd();
					</script>
				</div>
				<div style='clear: both;'>

					<br />

					<h2 id='subtraction'>Subtraction</h2>

					<br />

					<p>Drag the ends of the two black vectors to change their direction and magnitude. The green vector shows the result of subtracting v1 from v2.</p>

					<br /><br />

					<center><div id='subgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(subjsx); initSub();">Reset positions</button> <span class='mousepos' id='submousepos'></span></div>

					<br />
					
					<center><span id='subresult'></span></center>

					<br /><br />

					<script type='text/javascript'>
						function initSub() {
							subjsx = JXG.JSXGraph.initBoard('subgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

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

							subjsx.on('update', function() {
								var v1x = subp2.X().toFixed(2);
								var v1y = subp2.Y().toFixed(2);
								var v2x = subp1.X().toFixed(2);
								var v2y = subp1.Y().toFixed(2);
								var resx = (subp2.X() - subp1.X()).toFixed(2);
								var resy = (subp2.Y() - subp1.Y()).toFixed(2);
								$("#subresult").text("$\\begin{bmatrix} " + v1x + " \\\\" + v1y + "\\end{bmatrix} + \\begin{bmatrix} " + v1x + " \\\\ " + v2y + " \\end{bmatrix} = \\begin{bmatrix} " + resx + " \\\\" + resy + "\\end{bmatrix}$");
								MathJax.Hub.Queue(["Typeset", MathJax.Hub, "subresult"]);
							});

							subjsx.on('mousemove', function(e) {
								var mPos = subjsx.getUsrCoordsOfMouse(e);
								$('#submousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							subjsx.update();
						}
						initSub();
					</script>
				</div>

				<div style='clear: both;'>

					<br />

					<h2 id='dotproduct'>Dot Product</h2>

					<br />

					$\vec{a}.\vec{b} = |\vec{a}| |\vec{b}| cos\theta$<br /><br />
					$\vec{a}.\vec{b} = \vec{a}_1*\vec{b}_1 + \vec{a}_2*\vec{b}_2$<br /><br />

					<p>Drag the ends of the two vectors to change their direction and magnitude. The blue line shows the component of $\vec{b}$ in the direction of $\vec{a}$, which is $\frac{\vec{a}.\vec{b}}{|\vec{a}|}$, or 
equivalently, $|\vec{b}| cos\Theta$</p>

					<br /><br />

					<center><div id='dotgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(dotjsx); initDot();">Reset positions</button> <span class='mousepos' id='dotmousepos'></span></div>

					<br />
					
					<center>
						$\vec{a}.\vec{b} = $<span id='ascalar'>a</span>$ * $<span id='bscalar'>b</span>$ * cos($<span  id='theta'>&Theta;</span>$) = $ <span id='dotres'>0</span><br /><br />
						$\vec{a}.\vec{b} = $<span id='a1'>a1</span>$ * $<span id='b1'>b1</span>$ + $<span  id='a2'>a1</span>$ * $<span id='b2'>b2</span>$ = $ <span id='dotres2'>0</span>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initDot() {
							dotjsx = JXG.JSXGraph.initBoard('dotgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

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
								$("#a1").text(' ' + dotp1.X().toFixed(2) + ' ');
								$("#b1").text(' ' + dotp2.X().toFixed(2) + ' ');
								$("#a2").text(' ' + dotp1.Y().toFixed(2) + ' ');
								$("#b2").text(' ' + dotp2.Y().toFixed(2) + ' ');
								dotproduct = dotv1.L() * dotv2.L() * Math.cos(dotangle.Value());
								$("#dotres").text(' ' + dotproduct.toFixed(2));
								$("#dotres2").text(' ' + dotproduct.toFixed(2));
								dist = JXG.Math.Geometry.distance([dotp1.X(), dotp1.Y()], [0, 0]);
								component = dotproduct / dotv1.L();
								dotr.setPosition(JXG.COORDS_BY_USER, [dotp1.X() * component/dist, dotp1.Y() * component/dist]);
							});
							dotjsx.on('mousemove', function(e) {
								var mPos = dotjsx.getUsrCoordsOfMouse(e);
								$('#dotmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});
							dotjsx.update();
						}
						initDot();
					</script>
				</div>

				<div>
					<h2 id='eqline'>Equation of a Line</h2>

					<br />
					$\vec{r} = \vec{a} + t\vec{d}$<br /><br />
					$y = mx + c$
					<br /><br />

					<p>Drag the two black and white points to modify the vectors $a$ and $d$ which describe the red line, use the slider to change the scalar value ($t$).</p>

					<br /><br />

					<center><div id='linegraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(linejsx); initLine();">Reset positions</button> <span class='mousepos' id='linemousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initLine() {
							linejsx = JXG.JSXGraph.initBoard('linegraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var lineslr = linejsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [-4, 0.5, 4]], {name: 't', snapWidth: 0.1});
							var linep = linejsx.create('point', [0, 0], {visible: false, fixed: true});
							var linep1 = linejsx.create('point', [1, 4], {fillColor: 'white', strokeColor: 'black', name: 'a'});
							var linev1 = linejsx.create('arrow', [linep, linep1], {strokecolor: 'black', strokeWidth: 3, fixed: true});
							var linep2 = linejsx.create('point', [3, 2], {fillColor: 'white', strokeColor: 'black', name: 'd'});
							var linev2 = linejsx.create('arrow', [linep1, linep2], {strokecolor: 'black', strokeWidth: 3, fixed: true});
							var liner = linejsx.create('point', [3, 2], {fillColor: 'red', strokeColor: 'red', name: 'r', fixed: true});
							liner.setPosition(JXG.COORDS_BY_USER, [linep1.X() + lineslr.Value() * (linep2.X() - linep1.X()), linep1.Y() + lineslr.Value() * (linep2.Y() - linep1.Y())]);
							var linevr = linejsx.create('arrow', [linep, liner], {strokecolor: '#4c4', strokeWidth: 3});
							var linel = linejsx.create('line', [linep1, linep2], {strokecolor: '#c44', strokeWidth: 1, fixed: true});
							linejsx.on('update', function() {
								liner.setPosition(JXG.COORDS_BY_USER, [linep1.X() + lineslr.Value() * (linep2.X() - linep1.X()), linep1.Y() + lineslr.Value() * (linep2.Y() - linep1.Y())]);
							});
							linejsx.on('mousemove', function(e) {
								var mPos = linejsx.getUsrCoordsOfMouse(e);
								$('#linemousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});
							linejsx.update();
						}
						initLine();
					</script>
				</div>

			</div>
		</div>
	</body>
</html>
