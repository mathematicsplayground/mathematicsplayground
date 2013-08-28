<?php 
$title = 'Probability and Statistics - Mathematics Playground';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Probability and Statistics</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em; margin-bottom: 2em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#uniform">Uniform Distribution</a></li>
						<li><a href="#normal">Normal Distribution</a></li>
						<li><a href="#binomial">Binomial Distribution</a></li>
						<li><a href="#poisson">Poisson Distribution</a></li>
					</ul>
				</div>

				<div>
					<h2 id='uniform'>Uniform Distribution</h2>

					<br />

					<p>The graph below shows a random population with a uniform distribution. Use the slider at the top to control the sample size. Select the tools on the left to display different statistics about this population.</p>

					<br /><br />

					<center><div id='unigraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(unijsx); initUni();">Reset</button> <span class='mousepos' id='unimousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initUni() {
							unijsx = JXG.JSXGraph.initBoard('unigraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var unisample = unijsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 0, 200]], {name: 'Sample', snapWidth: 1});

							var points = [];

							var unimean = unijsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44'});

							var unimedian = unijsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4'});

							unijsx.on('update', function() {
								if (unisample.Value() > points.length) {
									for(i = points.length; i<unisample.Value(); i++) {
										points[i] = unijsx.createElement('point', [Math.random() * 18 - 9, Math.random() * 18 - 9], {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (unisample.Value() < points.length) {
									for(i = points.length - 1; i>=unisample.Value(); i--) {
										points.pop().remove();
									}
								}

							});

							unijsx.on('mousemove', function(e) {
								var mPos = unijsx.getUsrCoordsOfMouse(e);
								$('#unimousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							unijsx.update();
						}
						initUni();
					</script>

					<br /><br />
				</div>

				<div>
					<h2 id='normal'>Normal Distribution</h2>

					<br />

					<p>The graph below shows a random population with a normal distribution. Use the slider at the top to control the sample size. Select the tools on the left to display different statistics about this population.</p>

					<br /><br />

					<center><div id='normgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(normjsx); initNorm();">Reset</button> <span class='mousepos' id='normmousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initNorm() {
							normjsx = JXG.JSXGraph.initBoard('normgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var normsample = normjsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 0, 200]], {name: 'Sample', snapWidth: 1});

							var points = [];

							var normmean = normjsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44'});

							var normmedian = normjsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4'});

							normjsx.on('update', function() {
								if (normsample.Value() > points.length) {
									for(i = points.length; i<normsample.Value(); i++) {
										points[i] = normjsx.createElement('point', normRand(9), {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (normsample.Value() < points.length) {
									for(i = points.length - 1; i>=normsample.Value(); i--) {
										points.pop().remove();
									}
								}

							});

							normjsx.on('mousemove', function(e) {
								var mPos = normjsx.getUsrCoordsOfMouse(e);
								$('#normmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							normjsx.update();
						}
						initNorm();
					</script>

					<br /><br />
				</div>

				<div>
					<h2 id='binomial'>Binomial Distribution</h2>

					<br />

					<p>The graph below shows a random population with a normal distribution. Use the slider at the top to control the sample size. Select the tools on the left to display different statistics about this population.</p>

					<br /><br />

					<center><div id='bngraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(bnjsx); initNorm();">Reset</button> <span class='mousepos' id='bnmousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initNorm() {
							bnjsx = JXG.JSXGraph.initBoard('bngraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var bnsample = bnjsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 0, 200]], {name: 'Sample', snapWidth: 1});

							var points = [];

							var bnmean = bnjsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44'});

							var bnmedian = bnjsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4'});

							bnjsx.on('update', function() {
								if (bnsample.Value() > points.length) {
									for(i = points.length; i<bnsample.Value(); i++) {
										points[i] = bnjsx.createElement('point', [bnRand(10,9), bnRand(10, 9)], {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (bnsample.Value() < points.length) {
									for(i = points.length - 1; i>=bnsample.Value(); i--) {
										points.pop().remove();
									}
								}

							});

							bnjsx.on('mousemove', function(e) {
								var mPos = bnjsx.getUsrCoordsOfMouse(e);
								$('#bnmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							bnjsx.update();
						}
						initNorm();
					</script>

					<br /><br />
				</div>
				<div>
					<h2 id='poisson'>Poisson Distribution</h2>

					<br />

					<p>The graph below shows a random population with a Poisson distribution. Use the slider at the top to control the sample size. Select the tools on the left to display different statistics about this population.</p>

					<br /><br />

					<center><div id='psgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(psjsx); initPs();">Reset</button> <span class='mousepos' id='psmousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initPs() {
							psjsx = JXG.JSXGraph.initBoard('psgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var pssample = psjsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 0, 200]], {name: 'Sample', snapWidth: 1});

							var points = [];

							var psmean = psjsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44'});

							var psmedian = psjsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4'});

							psjsx.on('update', function() {
								if (pssample.Value() > points.length) {
									for(i = points.length; i<pssample.Value(); i++) {
										points[i] = psjsx.createElement('point', [psRand(9) - 9, psRand(9) - 9], {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (pssample.Value() < points.length) {
									for(i = points.length - 1; i>=pssample.Value(); i--) {
										points.pop().remove();
									}
								}

							});

							psjsx.on('mousemove', function(e) {
								var mPos = psjsx.getUsrCoordsOfMouse(e);
								$('#psmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							psjsx.update();
						}
						initPs();
					</script>

					<br /><br />
				</div>
			</div>
		</div>
	</body>
</html>
