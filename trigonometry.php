<?php 
$title = 'Trigonometry - Mathematics Playground';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Trigonometry</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#radians">Radians</a></li>
						<li><a href="#pythagoras">Pythagoras</a></li>
						<li><a href="#sincostan">Unit Circle &mdash; Sine, Cosine and Tangent</a></li>
						<li><a href="#equationcircle">Equation of a Circle</a></li>
					</ul>
				</div>

				<div>
					<h2 id='radians'>Radians</h2>

					<br />

					<p>Drag the black and white point around the circle to see its angle in both radians and degrees.</p>

					<br /><br />

					<center><div id='radgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="radjsx.zoom100(); radjsx.moveOrigin(225, 225); ">Reset position</button> <span class='mousepos' id='pythmousepos'></span></div>

					<br />
					
					<center>
					<span id='rad'>&theta;</span>$ * \frac{180}{\pi} = $<span id='deg'>0</span>&deg;
					</center>

					<br /><br />

					<script type='text/javascript'>
						var radjsx = JXG.JSXGraph.initBoard('radgraph', {boundingbox: [-1.5, 1.5, 1.5, -1.5], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var radcirc = radjsx.create('circle', [[0, 0], 1], {fillColor: '#ccf', highlightFillColor: '#ccf', fillOpacity: 0.5, highlightFillOpacity: 0.5, strokeColor: 'black', highlightStrokeColor: 'black'});
						var radcentre = radjsx.create('point', [0, 0], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: true, borderColor: 'black'});
						var radstart = radjsx.create('point', [1, 0], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: true, borderColor: 'black'});
						var radend = radjsx.create('point', [0, 0], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: false, borderColor: 'black'});
						var radangle = radjsx.create('glider', [0.45, 0.45, radcirc], {strokeColor: 'black', fillColor: 'white', name: ''});
						radend.setPosition(JXG.COORDS_BY_USER, [radangle.X(), radangle.Y()]);
						var radsector = radjsx.create('angle', [radstart, radcentre, radend], {type:'sector', orthoType:'sector', radius: 1.0, name: ' '});

						radjsx.create('text', [0.77, 0.77, "&pi;/4"]);
						radjsx.create('text', [-0.05, 1.1, "&pi;/2"]);
						radjsx.create('text', [-0.9, 0.78, "3&pi;/4"]);
						radjsx.create('text', [-1.1, 0.0, "&pi;"]);
						radjsx.create('text', [-0.9, -0.78, "5&pi;/4"]);
						radjsx.create('text', [-0.07, -1.15, "3&pi;/2"]);
						radjsx.create('text', [0.77, -0.78, "7&pi;/4"]);
						radjsx.create('text', [1.1, 0.0, "0 or 2&pi;"]);

						radjsx.on('update', function() {
							radend.setPosition(JXG.COORDS_BY_USER, [radangle.X(), radangle.Y()]);
							rad = Math.acos(radangle.X());
							if(radangle.Y() < 0) {
								rad = (Math.PI + (Math.PI - rad))
							}					
							deg = (rad * 180/Math.PI);
							radangle.setLabelText(rad.toFixed(2) + " rad or " + deg.toFixed(0) + "&deg;");
							$("#rad").html(rad.toFixed(2) + ' ');
							$("#deg").html(' ' + deg.toFixed(2));
						});
						radjsx.update();
					</script>

					<h2 id='pythagoras'>Pythagoras</h2>

					<br />

					$a^2 + b^2 = c^2$

					<br /><br />

					<p>Move the sliders on the following graph to change the length of the sides in a right angled triangle. Click the <em>"Show squares"</em> option to display squares attached to each side of the triangle. The value of the hypotenuse is calculated based on Pythagoras' theorem and displayed below the graph.</p>

					<br /><br />

					<center><div id='pythgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="pythjsx.zoom100(); pythjsx.moveOrigin(225, 225); ">Reset position</button> <span class='mousepos' id='pythmousepos'></span><br /><br /><input type='checkbox' id='showsquares' onclick='showSquares();' /><label for='showsquares'>Show squares</label></div>

					<center>
					<span id='pya'>a</span>$^2 + $<span id='pyb'>b</span>$^2 = $<span id='pyc'> c</span>$^2$<br />
					<small><span id='pyasq'>a</span>$ + $<span id='pybsq'>b</span>$ = $<span id='pycsq'> c</span></small>
					</center>

					<script type='text/javascript'>
						var pythjsx = JXG.JSXGraph.initBoard('pythgraph', {boundingbox: [-18, 32, 32, -18], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
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

					<h2 id='sincostan'>Unit Circle &mdash; Sine, Cosine and Tangent</h2>

					<br />

					<p>Drag the black and white point around the circle and watch the sine, cosine and tangent change.</p>

					<br /><br />
					
					<center><div id='unitgraph' class='jxgbox' style='width: 325px; height: 325px; float: left; margin-left: 10px;'></div> <div id='singraph' class='jxgbox' style='width: 325px; height: 325px;'></div></center><br /><br />

					<center>
					$sin($<span id='sinrad'>&theta;</span>$) = $<span id='sin'>0</span><br />
					$cos($<span id='cosrad'>&theta;</span>$) = $<span id='cos'>0</span><br />
					$tan($<span id='tanrad'>&theta;</span>$) = $<span id='tan'>0</span><br />
                                        </center>

					<script type='text/javascript'>
						var unitjsx = JXG.JSXGraph.initBoard('unitgraph', {boundingbox: [-1.5, 1.5, 1.5, -1.5], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var sinjsx = JXG.JSXGraph.initBoard('singraph', {boundingbox: [0, 1.5, 6.31, -1.5], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var singraph = sinjsx.create('functiongraph', [ function(t) { return Math.sin(t); }, -100, 100],{strokeColor: "#00f"});
						var sinpos = sinjsx.create('point', [0, 0, singraph], {strokeColor: '#00f', fixed: true, fillColor: '#00f', name: ''});
						var cospos = sinjsx.create('point', [0, 1, singraph], {strokeColor: '#f00', fixed: true, fillColor: '#f00', name: ''});
							sinpos.setPosition(JXG.COORDS_BY_USER, [rad, Math.sin(rad)]);
						var tanpos = sinjsx.create('point', [0, 0, singraph], {strokeColor: '#0f0', fixed: true, fillColor: '#0f0', name: ''});
						sinjsx.create('functiongraph', [ function(t) { return Math.cos(t); }, -100, 100],{strokeColor: "#f00"});
						sinjsx.create('functiongraph', [ function(t) { return Math.tan(t); }, -100, 100],{strokeColor: "#0f0"});
						var circ = unitjsx.create('circle', [[0, 0], 1], {fillColor: '#ccf', highlightFillColor: '#ccf', fillOpacity: 0.5, highlightFillOpacity: 0.5, strokeColor: 'black', highlightStrokeColor: 'black'});
						var sp = unitjsx.create('point', [1, 0], {size: 0.1, fixed: true, name: ''});
						var scp = unitjsx.create('point', [0, 0], {size: 0.1, fixed: true, name: ''});
						var sinline = unitjsx.create('line', [sp, scp], {strokeColor: '#00f', name: 'sin', withLabel: true});
						sinline.setLabelRelativeCoords([3, -35]);
						sinline.setStraight(false, false);
						var cosline = unitjsx.create('line', [[0, 0], scp], {strokeColor: '#f00', name: 'cos', withLabel: true});
						cosline.setStraight(false, false);
						var unitangle = unitjsx.create('glider', [0.45, 0.45, circ], {strokeColor: 'black', fillColor: 'white', name: ''});
						var unittan = unitjsx.create('tangent', [unitangle], {strokeColor: '#0f0', name: 'tan', withLabel: true});
						sp.setPosition(JXG.COORDS_BY_USER, [unitangle.X(), unitangle.Y()]);
						scp.setPosition(JXG.COORDS_BY_USER, [unitangle.X(), 0]);

						unitjsx.create('text', [0.77, 0.77, "&pi;/4"]);
						unitjsx.create('text', [-0.05, 1.1, "&pi;/2"]);
						unitjsx.create('text', [-0.9, 0.78, "3&pi;/4"]);
						unitjsx.create('text', [-1.1, 0.0, "&pi;"]);
						unitjsx.create('text', [-0.9, -0.78, "5&pi;/4"]);
						unitjsx.create('text', [-0.07, -1.15, "3&pi;/2"]);
						unitjsx.create('text', [0.77, -0.78, "7&pi;/4"]);
						unitjsx.create('text', [1.1, 0.0, "0 or 2&pi;"]);

						unitjsx.on('update', function(){
							rad = Math.acos(unitangle.X());
							if(unitangle.Y() < 0) {
								rad = (Math.PI + (Math.PI - rad));
								sinline.setLabelRelativeCoords([3, 10]);
							} else {
								sinline.setLabelRelativeCoords([3, -35]);
							}
							unitangle.setLabelText(rad.toFixed(2) + " rad");
							sinpos.setPosition(JXG.COORDS_BY_USER, [rad, Math.sin(rad)]);
							cospos.setPosition(JXG.COORDS_BY_USER, [rad, Math.cos(rad)]);
							tanpos.setPosition(JXG.COORDS_BY_USER, [rad, Math.tan(rad)]);
							sp.setPosition(JXG.COORDS_BY_USER, [unitangle.X(), unitangle.Y()]);
							scp.setPosition(JXG.COORDS_BY_USER, [unitangle.X(), 0]);
							$('#sinrad').text(rad.toFixed(2));
							$('#cosrad').text(rad.toFixed(2));
							$('#tanrad').text(rad.toFixed(2));
							$('#sin').text(' ' + Math.sin(rad).toFixed(2));
							$('#cos').text(' ' + Math.cos(rad).toFixed(2));
							$('#tan').text(' ' + Math.tan(rad).toFixed(2));
							sinjsx.update();
						});
						unitjsx.update();
						sinjsx.update();
					</script>

					<br /><br />

					<h2 id='equationcircle'>Equation of a Circle</h2>

					<br />

					$(X - a)^2 + (Y - b)^2 = r^2$

					<br /><br />

					<p>The graph below displays a circle which can have its radius modified via the slider at the top, and its position changed by dragging the central point. The equation for this specific circle is displayed underneath the graph.</p>

					<br />

					<center><div id='circgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="jsx.zoom100(); jsx.moveOrigin(225, 225); ">Reset position</button> <span class='mousepos' id='mousepos'></span></div>

					<br />					

					<center>$(X - $<span id='a'>a</span>$)^2 + (Y - $<span id='b'>b</span>$)^2 = $<span id='r'>r</span>$^2$</center>

					<script type='text/javascript'>
						var jsx = JXG.JSXGraph.initBoard('circgraph', {boundingbox: [-6, 6, 6, -6], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
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
