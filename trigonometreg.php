<?php 
$title = 'Trigonometreg - Maes Chwarae Mathemateg';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu_cy.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Trigonometreg</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#radianau">Radianau</a></li>
						<li><a href="#pythagoras">Pythagoras</a></li>
						<li><a href="#sincostan">Cylch Uned &mdash; Sin, Cosin a Thangiad (Sin, Cos, Tan)</a></li>
						<li><a href="#hafaliadcylch">Hafaliad Cylch</a></li>
					</ul>
				</div>

				<div>
					<h2 id='radianau'>Radianau</h2>

					<br />

					<p>Llusgwch y pwynt du a gwyn o amgylch y cylch i weld ei ongl mewn radianau a graddau.</p>

					<br /><br />

					<center><div id='radgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(radjsx); initRad();">Ailosod safleoedd</button> <span class='mousepos' id='radmousepos'></span></div>

					<br />
					
					<center>
					<span id='rad'>&theta;</span>$ * \frac{180}{\pi} = $<span id='deg'>0</span>&deg;
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initRad() {
							radjsx = JXG.JSXGraph.initBoard('radgraph', {boundingbox: [-1.5, 1.5, 1.5, -1.5], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
							var radcirc = radjsx.create('circle', [[0, 0], 1], {fillColor: '#ccf', highlightFillColor: '#ccf', fillOpacity: 0.5, highlightFillOpacity: 0.5, strokeColor: 'black', highlightStrokeColor: 'black'});
							var radcentre = radjsx.create('point', [0, 0], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: true, borderColor: 'black'});
							var radstart = radjsx.create('point', [1, 0], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: true, borderColor: 'black'});
							var radend = radjsx.create('point', [0, 0], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: false, borderColor: 'black'});
							var radangle = radjsx.create('glider', [0.45, 0.45, radcirc], {strokeColor: 'black', fillColor: 'white', name: ''});
							radend.setPosition(JXG.COORDS_BY_USER, [radangle.X(), radangle.Y()]);
							var radsector = radjsx.create('angle', [radstart, radcentre, radend], {type:'sector', orthoType:'sector', radius: 1.0, name: ' '});

							radjsx.create('text', [0.77, 0.77, "&pi;/4"], {fixed: true});
							radjsx.create('text', [-0.05, 1.1, "&pi;/2"], {fixed: true});
							radjsx.create('text', [-0.9, 0.78, "3&pi;/4"], {fixed: true});
							radjsx.create('text', [-1.1, 0.0, "&pi;"], {fixed: true});
							radjsx.create('text', [-0.9, -0.78, "5&pi;/4"], {fixed: true});
							radjsx.create('text', [-0.07, -1.15, "3&pi;/2"], {fixed: true});
							radjsx.create('text', [0.77, -0.78, "7&pi;/4"], {fixed: true});
							radjsx.create('text', [1.1, 0.0, "0 neu 2&pi;"], {fixed: true});

							radjsx.on('update', function() {
								radend.setPosition(JXG.COORDS_BY_USER, [radangle.X(), radangle.Y()]);
								rad = Math.acos(radangle.X());
								if(radangle.Y() < 0) {
									rad = (Math.PI + (Math.PI - rad))
								}					
								deg = (rad * 180/Math.PI);
								radangle.setLabelText(rad.toFixed(2) + " rad neu " + deg.toFixed(0) + "&deg;");
								$("#rad").html(rad.toFixed(2) + ' ');
								$("#deg").html(' ' + deg.toFixed(2));
							});
							radjsx.on('mousemove', function(e) {
								var mPos = radjsx.getUsrCoordsOfMouse(e);
								$('#radmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});
							radjsx.update();
						}
						initRad();
					</script>

					<h2 id='pythagoras'>Pythagoras</h2>

					<br />

					$a^2 + b^2 = c^2$

					<br /><br />

					<p>Symudwch y llithryddion ar y graff isod i newid hyd ochrau triongl ongl sgwâr. Cliciwch ar yr opsiwn <em>"Dangos y sgwariau"</em> er mwyn dangos y sgwariau sydd wedi'u hatodi at bob ochr o'r triongl. Cyfrifir gwerth yr hypotenws ar sail theorem Pythagoras a'i ddangos o dan y graff.</p>

					<br /><br />

					<center><div id='pythgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(pythjsx); initPyth();">Ailosod safleoedd</button> <span class='mousepos' id='pythmousepos'></span><br /><br /><input type='checkbox' id='showsquares' onclick='showSquares();' /><label for='showsquares'>Dangos y sgwariau</label></div>

					<center>
					<span id='pya'>a</span>$^2 + $<span id='pyb'>b</span>$^2 = $<span id='pyc'> c</span>$^2$<br />
					<small><span id='pyasq'>a</span>$ + $<span id='pybsq'>b</span>$ = $<span id='pycsq'> c</span></small>
					</center>

					<script type='text/javascript'>
						function initPyth() {
							pythjsx = JXG.JSXGraph.initBoard('pythgraph', {boundingbox: [-18, 32, 32, -18], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
							var pa = pythjsx.createElement('slider', [[1,1], [1,15], [0,8,14]], {name:'a', snapWidth:0.1});
							var pb = pythjsx.createElement('slider', [[1,1], [15,1], [0,6,14]], {name:'b', snapWidth:0.1});
							var corner = pythjsx.create('point', [1,1], {strokeColor: 'black', fillColor: 'black', size: 1, name: '', fixed: true, borderColor: 'black'});
							var poly = pythjsx.create('polygon', [pa, pb, corner]);
							sqa = pythjsx.create('regularpolygon', [corner, pa, 4], {fillColor: '#88f', highlight: false, withLabel: true, visible: false, label: {offset: [-15, 10]}});
							sqa.vertices[2].hideElement();
							sqa.vertices[3].hideElement();
							sqb = pythjsx.create('regularpolygon', [pb, corner, 4], {fillColor: '#f88', highlight: false, withLabel: true, visible: false, label: {offset: [-15, 10]}});
							sqb.vertices[2].hideElement();
							sqb.vertices[3].hideElement();
							sqc = pythjsx.create('regularpolygon', [pa, pb, 4], {fillColor: '#f18', highlight: false, withLabel: true, visible: false, label: {offset: [-15, 10]}});
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
							$("#showsquares").attr("checked", false);
							pythjsx.update();
						}

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

						initPyth();
					</script>

					<br /><br />

					<h2 id='sincostan'>Cylch Uned &mdash; Sin, Cosin a Thangiad (Sin, Cos, Tan)</h2>

					<br />

					<p>Llusgwch y pwynt du a gwyn o amgylch y cylch a gwyliwch y sin, cos a'r tan yn newid.</p>

					<br /><br />
					
					<center><div id='unitgraph' class='jxgbox' style='width: 325px; height: 325px; float: left; margin-left: 10px;'></div> <div id='singraph' class='jxgbox' style='width: 325px; height: 325px;'></div></center><br /><br />

					<center>
					$sin($<span id='sinrad'>&theta;</span>$) = $<span id='sin'>0</span><br />
					$cos($<span id='cosrad'>&theta;</span>$) = $<span id='cos'>0</span><br />
					$tan($<span id='tanrad'>&theta;</span>$) = $<span id='tan'>0</span><br />
                                        </center>

					<script type='text/javascript'>
						var unitjsx = JXG.JSXGraph.initBoard('unitgraph', {boundingbox: [-1.5, 1.5, 1.5, -1.5], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
						var sinjsx = JXG.JSXGraph.initBoard('singraph', {boundingbox: [0, 1.5, 6.31, -1.5], grid: true, pan: true, zoom: true, showcopyright: false, axis: false, pan: {needShift: false}});
						sinjsx.create('axis', [[0, 0], [1, 0]], {ticks: {scale: Math.PI, scaleSymbol: '&pi;'}});
						sinjsx.create('axis', [[0, 0], [0, 1]]);
						var singraph = sinjsx.create('functiongraph', [ function(t) { return Math.sin(t); }, -100, 100],{strokeColor: "#00f"});
						var sinpos = sinjsx.create('point', [0, 0, singraph], {strokeColor: '#00f', fixed: true, fillColor: '#00f', name: ''});
						var cospos = sinjsx.create('point', [0, 1, singraph], {strokeColor: '#f00', fixed: true, fillColor: '#f00', name: ''});
							sinpos.setPosition(JXG.COORDS_BY_USER, [rad, Math.sin(rad)]);
						var tanpos = sinjsx.create('point', [0, 0, singraph], {strokeColor: '#0f0', fixed: true, fillColor: '#0f0', name: ''});
						sinjsx.create('functiongraph', [ function(t) { return Math.cos(t); }, -100, 100],{strokeColor: "#f00"});
						sinjsx.create('functiongraph', [ function(t) { return Math.tan(t); }, -100, 100],{strokeColor: "#0f0"});
						var circ = unitjsx.create('circle', [[0, 0], 1], {fillColor: '#ccf', highlightFillColor: '#ccf', fillOpacity: 0.5, highlightFillOpacity: 0.5, strokeColor: 'black', highlightStrokeColor: 'black'});
						var sp = unitjsx.create('point', [1, 0], {visible: false, fixed: true, name: ''});
						var scp = unitjsx.create('point', [0, 0], {visible: false, fixed: true, name: ''});
						var sinline = unitjsx.create('line', [sp, scp], {strokeColor: '#00f', name: ''});
						unitjsx.create('text',[
							function(){return (sp.X() + scp.X()) * 0.5 + 0.1;},
							function(){return (sp.Y() + scp.Y()) * 0.5;},
							'sin']);
						sinline.setLabelRelativeCoords([3, -35]);
						sinline.setStraight(false, false);
						var cosline = unitjsx.create('line', [[0, 0], scp], {strokeColor: '#f00', name: ''});
						unitjsx.create('text',[
							function(){return scp.X() * 0.5;},
							function(){return 0.1;},
							'cos']);
						cosline.setStraight(false, false);
						var unitangle = unitjsx.create('glider', [0.45, 0.45, circ], {strokeColor: 'black', fillColor: 'white', name: ''});
						var unittan = unitjsx.create('tangent', [unitangle], {visible: false});
						var ax = unitjsx.create('line', [[0, 0], [1, 0]], {visible: false});
						var tanint = unitjsx.create('intersection', [unittan, ax, 0], {visible: false});
						var tanline = unitjsx.create('line', [sp, tanint], {strokeColor: '#0f0', name: ''});
						tanline.setStraight(false, false);
						unitjsx.create('text',[
							function(){return (sp.X() + tanint.X()) * 0.5 + 0.1;},
							function(){return (sp.Y() + tanint.Y()) * 0.5;},
							'tan']);
						sp.setPosition(JXG.COORDS_BY_USER, [unitangle.X(), unitangle.Y()]);
						scp.setPosition(JXG.COORDS_BY_USER, [unitangle.X(), 0]);

						unitjsx.create('text', [0.77, 0.77, "&pi;/4"], {fixed: true});
						unitjsx.create('text', [-0.05, 1.1, "&pi;/2"], {fixed: true});
						unitjsx.create('text', [-0.9, 0.78, "3&pi;/4"], {fixed: true});
						unitjsx.create('text', [-1.1, 0.0, "&pi;"], {fixed: true});
						unitjsx.create('text', [-0.9, -0.78, "5&pi;/4"], {fixed: true});
						unitjsx.create('text', [-0.07, -1.15, "3&pi;/2"], {fixed: true});
						unitjsx.create('text', [0.77, -0.78, "7&pi;/4"], {fixed: true});
						unitjsx.create('text', [1.1, 0.0, "0 or 2&pi;"], {fixed: true});

						unitjsx.on('update', function(){
							rad = Math.acos(unitangle.X());
							if(unitangle.Y() < 0) {
								rad = (Math.PI + (Math.PI - rad));
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

					<h2 id='hafaliadcylch'>Hafaliad Cylch</h2>

					<br />

					$(X - a)^2 + (Y - b)^2 = r^2$

					<br /><br />

					<p>Mae'r graff isod yn dangos cylch y gellir addasu ei radiws trwy'r llithrydd ar y top, a newid ei safle trwy lusgo'r pwynt canol. Dangosir yr hafaliad ar gyfer y cylch penodol hwn o dan y graff.</p>

					<br />

					<center><div id='circgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(jsx); initCirc();">Ailosod safleoedd</button> <span class='mousepos' id='mousepos'></span></div>

					<br />					

					<center>$(X - $<span id='a'>a</span>$)^2 + (Y - $<span id='b'>b</span>$)^2 = $<span id='r'>r</span>$^2$</center>

					<script type='text/javascript'>
						function initCirc() {
							jsx = JXG.JSXGraph.initBoard('circgraph', {boundingbox: [-6, 6, 6, -6], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
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
						}
						initCirc();
					</script>

					<br /><br />
				</div>
			</div>
		</div>
	</body>
</html>
