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

				<script type='text/javascript'>
					function toggleShowing() {
						$("#unishowmean").is(':checked') ? unimean.showElement() : unimean.hideElement();
						$("#unishowmedian").is(':checked') ? unimedian.showElement() : unimedian.hideElement();
						$("#unishowmode").is(':checked') ? unimode.showElement() : unimode.hideElement();
						$("#unishowrange").is(':checked') ? unirange.showElement() : unirange.hideElement();
						$("#normshowmean").is(':checked') ? normmean.showElement() : normmean.hideElement();
						$("#normshowmedian").is(':checked') ? normmedian.showElement() : normmedian.hideElement();
						$("#normshowmode").is(':checked') ? normmode.showElement() : normmode.hideElement();
						$("#normshowrange").is(':checked') ? normrange.showElement() : normrange.hideElement();
						$("#bnshowmean").is(':checked') ? bnmean.showElement() : bnmean.hideElement();
						$("#bnshowmedian").is(':checked') ? bnmedian.showElement() : bnmedian.hideElement();
						$("#bnshowmode").is(':checked') ? bnmode.showElement() : bnmode.hideElement();
						$("#bnshowrange").is(':checked') ? bnrange.showElement() : bnrange.hideElement();
						$("#psshowmean").is(':checked') ? psmean.showElement() : psmean.hideElement();
						$("#psshowmedian").is(':checked') ? psmedian.showElement() : psmedian.hideElement();
						$("#psshowmode").is(':checked') ? psmode.showElement() : psmode.hideElement();
						$("#psshowrange").is(':checked') ? psrange.showElement() : psrange.hideElement();
						uniplot.series[1].show = $("#unishowmean").is(':checked');
						uniplot.series[1].pointLabels.show = $("#unishowmean").is(':checked');
						uniplot.replot();
						unijsx.update();
						normjsx.update();
						bnjsx.update();
						psjsx.update();
					}

					$(document).ready(function() {
						// JSXGraph can't be initialised correctly if not displayed
						// so all tabs are marked active and then 2D tabs are hidden
						// once all initialisation is complete.
						$("#unitab2d").removeClass("active");
					});
				</script>

				<div>
					<h2 id='uniform'>Uniform Distribution</h2>

					<br />

					<p>The graph below shows a random population of integers with a uniform distribution. Use the slider at the top to control the sample size. Select the tools on the left to display different properties of this population.</p>

					<br /><br />

					<div style='float: left; margin-left: 1em; margin-top: 5em;'>
						<input type='checkbox' id='unishowmean' name='unishowmean' onclick='toggleShowing();' /><label for='unishowmean'>Show mean</label><br />
						<input type='checkbox' id='unishowmedian' name='unishowmedian' onclick='toggleShowing();' /><label for='unishowmedian'>Show median</label><br />
						<input type='checkbox' id='unishowmode' name='unishowmode' onclick='toggleShowing();' /><label for='unishowmode'>Show mode</label><br />
						<input type='checkbox' id='unishowrange' name='unishowrange' onclick='toggleShowing();' /><label for='unishowrange'>Show range</label><br />
					</div>

					<div class="tabbable" style='float: left; padding-left: 1em;'>
						<ul class="nav nav-tabs" style='margin-bottom: 0; margin-left: 10px;'>
							<li class="active"><a href="#unitab1d" data-toggle="tab">1 Dimensional</a></li>
							<li><a href="#unitab2d" data-toggle="tab">2 Dimensional</a></li>
						</ul>
						<div class="tab-content" style='overflow: visible; height: 525px;'>
							<div id="unitab1d" class="tab-pane active">
								<center><div style='margin-top: 5px; margin-bottom: 5px;'>Sample: <span id='uni1dsample'>0</span></div><div id='uni1dslider'></div><div id="uniplot" class="medgraph"></div></center>
							</div>
							<div id="unitab2d" class="tab-pane active">
								<center><br /><div id='unigraph' class='jxgbox medgraph'></div></center>
								<div class='graphcontrols' style='margin-left: 7px;'><button onclick="JXG.JSXGraph.freeBoard(unijsx); initUni2D();">Reset</button> <span class='mousepos' id='unimousepos'></span></div>
							</div>
						</div>
					</div>

					<script type='text/javascript'>
						function initUni2D() {
							unijsx = JXG.JSXGraph.initBoard('unigraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var unisample = unijsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 0, 200]], {name: 'Sample', snapWidth: 1});

							var points = [];

							unimean = unijsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44', visible: false});

							unimedian = unijsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4', visible: false});

							unimode = unijsx.createElement('point', [function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getXArray(points))[0];
								}
							}, function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getYArray(points))[0];
								}
							}], {fixed: true, name: 'Mode', strokeColor: '#44c', fillColor: '#44c', visible: false});

							var unirp1 = unijsx.create('point', [0, 0], {visible: false, fixed: true});
							var unirp2 = unijsx.create('point', [0, 0], {visible: false, fixed: true});
							var unirp3 = unijsx.create('point', [0, 0], {visible: false, fixed: true});
							var unirp4 = unijsx.create('point', [0, 0], {visible: false, fixed: true});

							unirange = unijsx.createElement('polygon', [unirp1, unirp2, unirp3, unirp4], {fixed: true, strokeColor: '#44c', fillColor: '#44c', visible: false});

							unijsx.on('update', function() {
								if (unisample.Value() > points.length) {
									for(var i = points.length; i<unisample.Value(); i++) {
										points[i] = unijsx.createElement('point', [Math.round(Math.random() * 16) - 8, Math.round(Math.random() * 16) - 8], {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (unisample.Value() < points.length) {
									for(var i = points.length - 1; i>=unisample.Value(); i--) {
										points.pop().remove();
									}
								}

								if(points.length > 1) {
									var xa = getXArray(points);
									var xmin = Math.min.apply(Math, xa);
									var xmax = Math.max.apply(Math, xa);
									var ya = getYArray(points);
									var ymin = Math.min.apply(Math, ya);
									var ymax = Math.max.apply(Math, ya);
									unirp1.setPosition(JXG.COORDS_BY_USER, [xmin, ymin]);
									unirp2.setPosition(JXG.COORDS_BY_USER, [xmin, ymax]);
									unirp3.setPosition(JXG.COORDS_BY_USER, [xmax, ymax]);
									unirp4.setPosition(JXG.COORDS_BY_USER, [xmax, ymin]);
								} else {
									unirp1.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									unirp2.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									unirp3.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									unirp4.setPosition(JXG.COORDS_BY_USER, [0, 0]);
								}

							});

							unijsx.on('mousemove', function(e) {
								var mPos = unijsx.getUsrCoordsOfMouse(e);
								$('#unimousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							unijsx.update();
						}

						initUni2D();

						function initUni1D() {
							var points = [];
							$( "#uni1dslider" ).slider({
								range: "min",
								min: 0,
								max: 200,
								value: 0,
								slide: function( event, ui ) {
									$( "#uni1dsample" ).text(ui.value);
									if (ui.value > points.length) {
										for(var i = points.length; i<ui.value; i++) {
											points[i] = Math.round(Math.random() * 10);
										}
									} else if (ui.value < points.length) {
										for(var i = points.length - 1; i>=ui.value; i--) {
											points.pop();
										}
									}
									uniplot.series[0].data = _.zip([0,1,2,3,4,5,6,7,8,9,10], uniRenderer()[0]);
									if(points.length > 0) {
										uniplot.series[1].data = _.zip([mean(points), mean(points)], [33, "mean"]);
									} else {
										uniplot.series[1].data = _.zip([0], [33]);
									}
									uniplot.replot();
								}
							});

							var uniRenderer = function() {
								var data = [[0,0,0,0,0,0,0,0,0,0,0], [33]];
								for (var i=0; i<points.length; i++) {
									data[0][points[i]] = data[0][points[i]] + 1;
								}
								return data;
							};

							uniplot = $.jqplot('uniplot',[[],[]],{
								dataRenderer: uniRenderer,
								series: [
									{
										renderer: $.jqplot.BarRenderer,
										rendererOptions: {
											barWidth: 25
										}
									},
									{
										renderer: $.jqplot.LineRenderer,
										showMarker: true,
										show: false,
										pointLabels: {
											show: true,
											labels: ['mean'],
											location: 's',
											ypadding: 3
										}
									}
								],
								axes: {
									xaxis: {
										renderer: $.jqplot.CategoryAxisRenderer,
										min: -1,
										max: 11,
										numberTicks: 13
									},
									yaxis: {
										min: 0,
										max: 100
									}
								},
							});
						}

						initUni1D();
					</script>

					<br /><br />
				</div>

				<div style='clear: both;'>
					<h2 id='normal'>Normal Distribution</h2>

					<br />

					<p>The graph below shows a random population of integers with a normal distribution. Use the slider at the top to control the sample size. Select the tools on the left to display different properties of this population.</p>

					<br /><br />

					<div style='float: left; margin-left: 2em;'>
						<input type='checkbox' id='normshowmean' name='normshowmean' onclick='toggleShowing();' /><label for='normshowmean'>Show mean</label><br />
						<input type='checkbox' id='normshowmedian' name='normshowmedian' onclick='toggleShowing();' /><label for='normshowmedian'>Show median</label><br />
						<input type='checkbox' id='normshowmode' name='normshowmode' onclick='toggleShowing();' /><label for='normshowmode'>Show mode</label><br />
						<input type='checkbox' id='normshowrange' name='normshowrange' onclick='toggleShowing();' /><label for='normshowrange'>Show range</label><br />
					</div>
					<center><div id='normgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols' style='margin-left: 202px;'><button onclick="JXG.JSXGraph.freeBoard(normjsx); initNorm();">Reset</button> <span class='mousepos' id='normmousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initNorm() {
							normjsx = JXG.JSXGraph.initBoard('normgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var normsample = normjsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 0, 200]], {name: 'Sample', snapWidth: 1});

							var points = [];

							normmean = normjsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44', visible: false});

							normmedian = normjsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4', visible: false});

							normmode = normjsx.createElement('point', [function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getXArray(points))[0];
								}
							}, function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getYArray(points))[0];
								}
							}], {fixed: true, name: 'Mode', strokeColor: '#44c', fillColor: '#44c', visible: false});

							var normrp1 = normjsx.create('point', [0, 0], {visible: false, fixed: true});
							var normrp2 = normjsx.create('point', [0, 0], {visible: false, fixed: true});
							var normrp3 = normjsx.create('point', [0, 0], {visible: false, fixed: true});
							var normrp4 = normjsx.create('point', [0, 0], {visible: false, fixed: true});

							normrange = normjsx.createElement('polygon', [normrp1, normrp2, normrp3, normrp4], {fixed: true, strokeColor: '#44c', fillColor: '#44c', visible: false});

							normjsx.on('update', function() {
								if (normsample.Value() > points.length) {
									for(var i = points.length; i<normsample.Value(); i++) {
										points[i] = normjsx.createElement('point', normRand(8), {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (normsample.Value() < points.length) {
									for(var i = points.length - 1; i>=normsample.Value(); i--) {
										points.pop().remove();
									}
								}

								if(points.length > 1) {
									var xa = getXArray(points);
									var xmin = Math.min.apply(Math, xa);
									var xmax = Math.max.apply(Math, xa);
									var ya = getYArray(points);
									var ymin = Math.min.apply(Math, ya);
									var ymax = Math.max.apply(Math, ya);
									normrp1.setPosition(JXG.COORDS_BY_USER, [xmin, ymin]);
									normrp2.setPosition(JXG.COORDS_BY_USER, [xmin, ymax]);
									normrp3.setPosition(JXG.COORDS_BY_USER, [xmax, ymax]);
									normrp4.setPosition(JXG.COORDS_BY_USER, [xmax, ymin]);
								} else {
									normrp1.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									normrp2.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									normrp3.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									normrp4.setPosition(JXG.COORDS_BY_USER, [0, 0]);
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

					<p>The graph below shows a random population of integers with a normal distribution. Use the slider at the top to control the sample size and the sliders at the bottom to control the number of trials and the probability of a trial being successful. Select the tools on the left to display different properties of this population.</p>

					<br /><br />

					<div style='float: left; margin-left: 2em;'>
						<input type='checkbox' id='bnshowmean' name='bnshowmean' onclick='toggleShowing();' /><label for='bnshowmean'>Show mean</label><br />
						<input type='checkbox' id='bnshowmedian' name='bnshowmedian' onclick='toggleShowing();' /><label for='bnshowmedian'>Show median</label><br />
						<input type='checkbox' id='bnshowmode' name='bnshowmode' onclick='toggleShowing();' /><label for='bnshowmode'>Show mode</label><br />
						<input type='checkbox' id='bnshowrange' name='bnshowrange' onclick='toggleShowing();' /><label for='bnshowrange'>Show range</label><br />
					</div>
					<center><div id='bngraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols' style='margin-left: 202px;'><button onclick="JXG.JSXGraph.freeBoard(bnjsx); initBn();">Reset</button> <span class='mousepos' id='bnmousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initBn() {
							bnjsx = JXG.JSXGraph.initBoard('bngraph', {boundingbox: [-1, 12, 12, -3], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var bnsample = bnjsx.createElement('slider', [[0.75, 11], [8.5, 11], [0, 0, 200]], {name: 'Sample', snapWidth: 1});
							var bntrials = bnjsx.createElement('slider', [[0.75, -0.75], [8.5, -0.75], [0, 5, 10]], {name: 'Trials', snapWidth: 1});
							var bnprobability = bnjsx.createElement('slider', [[0.75, -1.5], [8.5, -1.5], [0, 0.5, 1]], {name: 'Probability', snapWidth: 0.1});

							var points = [];

							bnmean = bnjsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44', visible: false});

							bnmedian = bnjsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4', visible: false});

							bnmode = bnjsx.createElement('point', [function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getXArray(points))[0];
								}
							}, function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getYArray(points))[0];
								}
							}], {fixed: true, name: 'Mode', strokeColor: '#44c', fillColor: '#44c', visible: false});

							var bnrp1 = bnjsx.create('point', [0, 0], {visible: false, fixed: true});
							var bnrp2 = bnjsx.create('point', [0, 0], {visible: false, fixed: true});
							var bnrp3 = bnjsx.create('point', [0, 0], {visible: false, fixed: true});
							var bnrp4 = bnjsx.create('point', [0, 0], {visible: false, fixed: true});

							bnrange = bnjsx.createElement('polygon', [bnrp1, bnrp2, bnrp3, bnrp4], {fixed: true, strokeColor: '#44c', fillColor: '#44c', visible: false});

							bnjsx.on('update', function() {
								if (bnsample.Value() > points.length) {
									for(var i = points.length; i<bnsample.Value(); i++) {
										points[i] = bnjsx.createElement('point', [bnRand(bntrials.Value(), bnprobability.Value()), bnRand(bntrials.Value(), bnprobability.Value())], {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (bnsample.Value() < points.length) {
									for(var i = points.length - 1; i>=bnsample.Value(); i--) {
										points.pop().remove();
									}
								}
								if(points.length > 1) {
									var xa = getXArray(points);
									var xmin = Math.min.apply(Math, xa);
									var xmax = Math.max.apply(Math, xa);
									var ya = getYArray(points);
									var ymin = Math.min.apply(Math, ya);
									var ymax = Math.max.apply(Math, ya);
									bnrp1.setPosition(JXG.COORDS_BY_USER, [xmin, ymin]);
									bnrp2.setPosition(JXG.COORDS_BY_USER, [xmin, ymax]);
									bnrp3.setPosition(JXG.COORDS_BY_USER, [xmax, ymax]);
									bnrp4.setPosition(JXG.COORDS_BY_USER, [xmax, ymin]);
								} else {
									bnrp1.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									bnrp2.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									bnrp3.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									bnrp4.setPosition(JXG.COORDS_BY_USER, [0, 0]);
								}
							});

							bnjsx.on('mousemove', function(e) {
								var mPos = bnjsx.getUsrCoordsOfMouse(e);
								$('#bnmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							bnjsx.update();
						}
						initBn();
					</script>

					<br /><br />
				</div>
				<div>
					<h2 id='poisson'>Poisson Distribution</h2>

					<br />

					<p>The graph below shows a random population of integers with a Poisson distribution. Use the slider at the top to control the sample size. Select the tools on the left to display different properties of this population.</p>

					<br /><br />

					<div style='float: left; margin-left: 2em;'>
						<input type='checkbox' id='psshowmean' name='psshowmean' onclick='toggleShowing();' /><label for='psshowmean'>Show mean</label><br />
						<input type='checkbox' id='psshowmedian' name='psshowmedian' onclick='toggleShowing();' /><label for='psshowmedian'>Show median</label><br />
						<input type='checkbox' id='psshowmode' name='psshowmode' onclick='toggleShowing();' /><label for='psshowmode'>Show mode</label><br />
						<input type='checkbox' id='psshowrange' name='psshowrange' onclick='toggleShowing();' /><label for='psshowrange'>Show range</label><br />
					</div>
					<center><div id='psgraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols' style='margin-left: 202px;'><button onclick="JXG.JSXGraph.freeBoard(psjsx); initPs();">Reset</button> <span class='mousepos' id='psmousepos'></span></div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initPs() {
							psjsx = JXG.JSXGraph.initBoard('psgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var pssample = psjsx.createElement('slider', [[-9.25, 9], [5.5 ,9], [0, 0, 200]], {name: 'Sample', snapWidth: 1});

							var points = [];

							psmean = psjsx.createElement('point', [function() {
								return mean(getXArray(points));
							}, function() {
								return mean(getYArray(points));
							}], {fixed: true, name: 'Mean', strokeColor: '#c44', fillColor: '#c44', visible: false});

							psmedian = psjsx.createElement('point', [function() {
								return median(getXArray(points));
							}, function() {
								return median(getYArray(points));
							}], {fixed: true, name: 'Median', strokeColor: '#4c4', fillColor: '#4c4', visible: false});

							psmode = psjsx.createElement('point', [function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getXArray(points))[0];
								}
							}, function() {
								if(points.length == 0) {
									return null;
								} else {
									return mode(getYArray(points))[0];
								}
							}], {fixed: true, name: 'Mode', strokeColor: '#44c', fillColor: '#44c', visible: false});

							psjsx.on('update', function() {
								if (pssample.Value() > points.length) {
									for(var i = points.length; i<pssample.Value(); i++) {
										points[i] = psjsx.createElement('point', [psRand(8) - 8, psRand(8) - 8], {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
									}
								} else if (pssample.Value() < points.length) {
									for(var i = points.length - 1; i>=pssample.Value(); i--) {
										points.pop().remove();
									}
								}

								if(points.length > 1) {
									var xa = getXArray(points);
									var xmin = Math.min.apply(Math, xa);
									var xmax = Math.max.apply(Math, xa);
									var ya = getYArray(points);
									var ymin = Math.min.apply(Math, ya);
									var ymax = Math.max.apply(Math, ya);
									psrp1.setPosition(JXG.COORDS_BY_USER, [xmin, ymin]);
									psrp2.setPosition(JXG.COORDS_BY_USER, [xmin, ymax]);
									psrp3.setPosition(JXG.COORDS_BY_USER, [xmax, ymax]);
									psrp4.setPosition(JXG.COORDS_BY_USER, [xmax, ymin]);
								} else {
									psrp1.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									psrp2.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									psrp3.setPosition(JXG.COORDS_BY_USER, [0, 0]);
									psrp4.setPosition(JXG.COORDS_BY_USER, [0, 0]);
								}
							});

							var psrp1 = psjsx.create('point', [0, 0], {visible: false, fixed: true});
							var psrp2 = psjsx.create('point', [0, 0], {visible: false, fixed: true});
							var psrp3 = psjsx.create('point', [0, 0], {visible: false, fixed: true});
							var psrp4 = psjsx.create('point', [0, 0], {visible: false, fixed: true});

							psrange = psjsx.createElement('polygon', [psrp1, psrp2, psrp3, psrp4], {fixed: true, strokeColor: '#44c', fillColor: '#44c', visible: false});

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
