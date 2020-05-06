<?php 
$title = 'Tebygolrwydd ac Ystadegau - Maes Chwarae Mathemateg';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu_cy.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Tebygolrwydd ac Ystadegau</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em; margin-bottom: 2em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#unffurf">Dosraniad Unffurf</a></li>
						<li><a href="#normal">Dosraniad Normal</a></li>
						<li><a href="#binomial">Dosraniad Binomial</a></li>
						<li><a href="#poisson">Dosraniad Poisson</a></li>
					</ul>
				</div>

					<script type='text/javascript'>
					seriesOpts = [
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
									labels: ['cymedr'],
									location: 's',
									ypadding: 3
								}
							},
							{
								renderer: $.jqplot.LineRenderer,
								showMarker: true,
								show: false,
								pointLabels: {
									show: true,
									labels: ['canolrhif'],
									location: 's',
									ypadding: 3
								}
							},
							{
								renderer: $.jqplot.LineRenderer,
								showMarker: true,
								show: false,
								pointLabels: {
									show: true,
									labels: ['modd'],
									location: 's',
									ypadding: 3
								}
							},
							{
								renderer: $.jqplot.LineRenderer,
								showMarker: true,
								show: false,
								pointLabels: {
									show: true,
									labels: ['amrediad'],
									location: 's',
									ypadding: 3
								}
							}
					];

					function update1D(plot, points, renderer) {
						plot.series[0].data = _.zip([0,1,2,3,4,5,6,7,8,9,10], renderer()[0]);
						if(points.length > 0) {
							var pointsCopy = points.slice(0); // Use a copy of points to avoid them getting sorted during averaging
							var min =  Math.min.apply(Math, pointsCopy);
							var max =  Math.max.apply(Math, pointsCopy);
							plot.series[1].data = _.zip([mean(pointsCopy), mean(pointsCopy)], [66.6, "mean"]);
							plot.series[2].data = _.zip([median(pointsCopy), median(pointsCopy)], [72, "median"]);
							plot.series[3].data = _.zip([mode(pointsCopy)[0], mode(pointsCopy)[0]], [78, "mode"]);
							plot.series[4].data = _.zip([min, max, max], [83, "range", 83]);
						} else {
							plot.series[1].data = _.zip([0], [66.6]);
							plot.series[2].data = _.zip([0], [72]);
							plot.series[3].data = _.zip([0], [78]);
							plot.series[4].data = _.zip([0,0], [83]);
						}
						plot.replot();
					}

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
						uniplot.series[2].show = $("#unishowmedian").is(':checked');
						uniplot.series[2].pointLabels.show = $("#unishowmedian").is(':checked');
						uniplot.series[3].show = $("#unishowmode").is(':checked');
						uniplot.series[3].pointLabels.show = $("#unishowmode").is(':checked');
						uniplot.series[4].show = $("#unishowrange").is(':checked');
						uniplot.series[4].pointLabels.show = $("#unishowrange").is(':checked');
						uniplot.replot();
						unijsx.update();
						normplot.series[1].show = $("#normshowmean").is(':checked');
						normplot.series[1].pointLabels.show = $("#normshowmean").is(':checked');
						normplot.series[2].show = $("#normshowmedian").is(':checked');
						normplot.series[2].pointLabels.show = $("#normshowmedian").is(':checked');
						normplot.series[3].show = $("#normshowmode").is(':checked');
						normplot.series[3].pointLabels.show = $("#normshowmode").is(':checked');
						normplot.series[4].show = $("#normshowrange").is(':checked');
						normplot.series[4].pointLabels.show = $("#normshowrange").is(':checked');
						normplot.replot();
						normjsx.update();
						bnplot.series[1].show = $("#bnshowmean").is(':checked');
						bnplot.series[1].pointLabels.show = $("#bnshowmean").is(':checked');
						bnplot.series[2].show = $("#bnshowmedian").is(':checked');
						bnplot.series[2].pointLabels.show = $("#bnshowmedian").is(':checked');
						bnplot.series[3].show = $("#bnshowmode").is(':checked');
						bnplot.series[3].pointLabels.show = $("#bnshowmode").is(':checked');
						bnplot.series[4].show = $("#bnshowrange").is(':checked');
						bnplot.series[4].pointLabels.show = $("#bnshowrange").is(':checked');
						bnplot.replot();
						bnjsx.update();
						psplot.series[1].show = $("#psshowmean").is(':checked');
						psplot.series[1].pointLabels.show = $("#psshowmean").is(':checked');
						psplot.series[2].show = $("#psshowmedian").is(':checked');
						psplot.series[2].pointLabels.show = $("#psshowmedian").is(':checked');
						psplot.series[3].show = $("#psshowmode").is(':checked');
						psplot.series[3].pointLabels.show = $("#psshowmode").is(':checked');
						psplot.series[4].show = $("#psshowrange").is(':checked');
						psplot.series[4].pointLabels.show = $("#psshowrange").is(':checked');
						psplot.replot();
						psjsx.update();
					}

					$(document).ready(function() {
						// JSXGraph can't be initialised correctly if not displayed
						// so all tabs are marked active and then 2D tabs are hidden
						// once all initialisation is complete.
						$("#unitab2d").removeClass("active");
						$("#normtab2d").removeClass("active");
						$("#bntab2d").removeClass("active");
						$("#pstab2d").removeClass("active");
					});
				</script>

				<div>
					<h2 id='unffurf'>Dosraniad Unffurf</h2>

					<br />

					<p>Mae'r graff isod yn dangos hapboblogaeth o gyfanrifau a chanddynt ddosraniad unffurf. Defnyddiwch y llithrydd ar y top i reoli maint y sampl. Dewiswch yr offer ar y chwith i ddangos gwahanol briodweddau’r boblogaeth hon.</p>

					<br /><br />

					<div style='float: left; margin-left: 1em; margin-top: 5em;'>
						<input type='checkbox' id='unishowmean' name='unishowmean' onclick='toggleShowing();' /><label for='unishowmean'>Dangos y cymedr</label><br />
						<input type='checkbox' id='unishowmedian' name='unishowmedian' onclick='toggleShowing();' /><label for='unishowmedian'>Dangos y canolrif </label><br />
						<input type='checkbox' id='unishowmode' name='unishowmode' onclick='toggleShowing();' /><label for='unishowmode'>Dangos y modd</label><br />
						<input type='checkbox' id='unishowrange' name='unishowrange' onclick='toggleShowing();' /><label for='unishowrange'>Dangos yr amrediad</label><br />
					</div>

					<div class="tabbable" style='float: left; padding-left: 1em;'>
						<ul class="nav nav-tabs" style='margin-bottom: 0; margin-left: 10px;'>
							<li class="active"><a href="#unitab1d" data-toggle="tab">1 Dimensiwn</a></li>
							<li><a href="#unitab2d" data-toggle="tab">2 Ddimensiwn</a></li>
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
							$("#uni1dslider").slider({
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
									update1D(uniplot, points, uniRenderer);
								}
							});

							var uniRenderer = function() {
								var data = [[0,0,0,0,0,0,0,0,0,0,0],  [66.6], [72], [78], [83]];
								for (var i=0; i<points.length; i++) {
									data[0][points[i]] = data[0][points[i]] + 1;
								}
								return data;
							};

							uniplot = $.jqplot('uniplot',[],{
								dataRenderer: uniRenderer,
								series: seriesOpts,
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
					<h2 id='normal'>Dosraniad Normal</h2>

					<br />

					<p>Mae'r graff isod yn dangos hapboblogaeth o gyfanrifau a chanddynt ddosraniad normal. Defnyddiwch y llithrydd ar y top i reoli maint y sampl. Dewiswch yr offer ar y chwith i ddangos gwahanol briodweddau'r boblogaeth hon.</p>

					<br /><br />

					<div style='float: left; margin-left: 1em; margin-top: 5em;'>
						<input type='checkbox' id='normshowmean' name='normshowmean' onclick='toggleShowing();' /><label for='normshowmean'>Dangos y cymedr</label><br />
						<input type='checkbox' id='normshowmedian' name='normshowmedian' onclick='toggleShowing();' /><label for='normshowmedian'>Dangos y canolrif</label><br />
						<input type='checkbox' id='normshowmode' name='normshowmode' onclick='toggleShowing();' /><label for='normshowmode'>Dangos y modd</label><br />
						<input type='checkbox' id='normshowrange' name='normshowrange' onclick='toggleShowing();' /><label for='normshowrange'>Dangos yr amrediad </label><br />
					</div>
					<div class="tabbable" style='float: left; padding-left: 1em;'>
						<ul class="nav nav-tabs" style='margin-bottom: 0; margin-left: 10px;'>
							<li class="active"><a href="#normtab1d" data-toggle="tab">1 Dimensiwn</a></li>
							<li><a href="#normtab2d" data-toggle="tab">2 Ddimensiwn</a></li>
						</ul>
						<div class="tab-content" style='overflow: visible; height: 525px;'>
							<div id="normtab1d" class="tab-pane active">
								<center><div style='margin-top: 5px; margin-bottom: 5px;'>Sample: <span id='norm1dsample'>0</span></div><div id='norm1dslider'></div><div id="normplot" class="medgraph"></div></center>
							</div>
							<div id="normtab2d" class="tab-pane active">
								<center><br /><div id='normgraph' class='jxgbox medgraph'></div></center>
								<div class='graphcontrols' style='margin-left: 7px;'><button onclick="JXG.JSXGraph.freeBoard(normjsx); initNorm2D();">Reset</button> <span class='mousepos' id='normmousepos'></span></div>
							</div>
						</div>
					</div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initNorm2D() {
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
						initNorm2D();

						function initNorm1D() {
							var points = [];
							$("#norm1dslider").slider({
								range: "min",
								min: 0,
								max: 200,
								value: 0,
								slide: function( event, ui ) {
									$( "#norm1dsample" ).text(ui.value);
									if (ui.value > points.length) {
										for(var i = points.length; i<ui.value; i++) {
											points[i] = Math.round(normRand(2)[0] + 5);
										}
									} else if (ui.value < points.length) {
										for(var i = points.length - 1; i>=ui.value; i--) {
											points.pop();
										}
									}
									update1D(normplot, points, normRenderer);
								}
							});

							var normRenderer = function() {
								var data = [[0,0,0,0,0,0,0,0,0,0,0], [66.6], [72], [78], [83]];
								for (var i=0; i<points.length; i++) {
									data[0][points[i]] = data[0][points[i]] + 1;
								}
								return data;
							};

							normplot = $.jqplot('normplot',[],{
								dataRenderer: normRenderer,
								series: seriesOpts,
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

						initNorm1D();
					</script>

					<br /><br />
				</div>

				<div style='clear: both;'>
					<h2 id='binomial'>Dosraniad Binomial</h2>

					<br />

					<p>Mae'r graff isod yn dangos hapboblogaeth o gyfanrifau a chanddynt ddosraniad binomial. Defnyddiwch y llithrydd ar y top i reoli maint y sampl a'r llithryddion ar y gwaelod i reoli nifer y treialon a thebygolrwydd llwyddiant treial. Dewiswch yr offer ar y chwith i ddangos gwahanol briodweddau'r boblogaeth hon.</p>

					<br /><br />

					<div style='float: left; margin-left: 1em; margin-top: 5em;'>
						<input type='checkbox' id='bnshowmean' name='bnshowmean' onclick='toggleShowing();' /><label for='bnshowmean'>Dangos y cymedr</label><br />
						<input type='checkbox' id='bnshowmedian' name='bnshowmedian' onclick='toggleShowing();' /><label for='bnshowmedian'>Dangos y canolrif </label><br />
						<input type='checkbox' id='bnshowmode' name='bnshowmode' onclick='toggleShowing();' /><label for='bnshowmode'>Dangos y modd</label><br />
						<input type='checkbox' id='bnshowrange' name='bnshowrange' onclick='toggleShowing();' /><label for='bnshowrange'>Dangos yr amrediad</label><br />
					</div>
					<div class="tabbable" style='float: left; padding-left: 1em;'>
						<ul class="nav nav-tabs" style='margin-bottom: 0; margin-left: 10px;'>
							<li class="active"><a href="#bntab1d" data-toggle="tab">1 Dimensiwn</a></li>
							<li><a href="#bntab2d" data-toggle="tab">2 Ddimensiwn</a></li>
						</ul>
						<div class="tab-content" style='overflow: visible; height: 625px;'>
							<div id="bntab1d" class="tab-pane active">
								<center>
									<div style='margin-top: 5px; margin-bottom: 5px;'>Sample: <span id='bn1dsample'>0</span></div><div id='bn1dslider'></div>
									<div id="bnplot" class="medgraph"></div>
									<div style='margin-top: 5px; margin-bottom: 5px;'>Trials: <span id='bn1dtrialslabel'>5</span></div><div id='bn1dtrials'></div>
									<div style='margin-top: 5px; margin-bottom: 5px;'>Probability: <span id='bn1dprobabilitylabel'>0.5</span></div><div id='bn1dprobability'></div>
								</center>
							</div>
							<div id="bntab2d" class="tab-pane active">
								<center><br /><div id='bngraph' class='jxgbox medgraph'></div></center>
								<div class='graphcontrols' style='margin-left: 7px;'><button onclick="JXG.JSXGraph.freeBoard(bnjsx); initBn2D();">Reset</button> <span class='mousepos' id='bnmousepos'></span></div>
							</div>
						</div>
					</div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initBn2D() {
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

						

							var redrawGraph = function() {
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
							    bnjsx.update();
							};


							var clearAndRedrawPoints = function() { 
							  for(var i = points.length - 1; i>=0; i--) {
							    points.pop().remove();
							  }
							  if (bnsample.Value() > points.length) {
							    for(var i = points.length; i<bnsample.Value(); i++) {
							      points[i] = bnjsx.createElement('point', [bnRand(bntrials.Value(), bnprobability.Value()), bnRand(bntrials.Value(), bnprobability.Value())], {fixed: true, withLabel: false, strokeColor: 'black', fillColor: 'black', size: 1});
							    }
							  }
							  redrawGraph(); 
							}


							bnjsx.on('mousemove', function(e) {
								var mPos = bnjsx.getUsrCoordsOfMouse(e);
								$('#bnmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});


							bnsample.on('drag', redrawGraph);
							bntrials.on("drag", clearAndRedrawPoints );
							bnprobability.on("drag", clearAndRedrawPoints );

							bnjsx.update();
						}
						initBn2D();

						function initBn1D() {
							var points = [];
							$("#bn1dslider").slider({
								range: "min",
								min: 0,
								max: 200,
								value: 0,
								slide: function( event, ui ) {
									$("#bn1dsample").text(ui.value);
									var trials = $("#bn1dtrials").slider("option", "value");
									var probability = $("#bn1dprobability").slider("option", "value");
									if (ui.value > points.length) {
										for(var i = points.length; i<ui.value; i++) {
											points[i] = Math.round(bnRand(trials, probability));
										}
									} else if (ui.value < points.length) {
										for(var i = points.length - 1; i>=ui.value; i--) {
											points.pop();
										}
									}
									update1D(bnplot, points, bnRenderer);
								}
							});

							var bnClearAndRedraw = function(event,ui) {
							  var numPoints = $("#bn1dslider").slider("option","value")
							  var trials = $("#bn1dtrials").slider("option", "value");
							  var probability = $("#bn1dprobability").slider("option", "value");

							  points = [];
							  if (numPoints > points.length) {
							    for(var i = points.length; i<numPoints; i++) {
							      points[i] = Math.round(bnRand(trials, probability));
							    }
							    update1D(bnplot, points, bnRenderer);
							  }
							}

							$("#bn1dtrials").slider({
								range: "min",
								min: 0,
								max: 10,
								value: 5,
								slide: function(event, ui) {
									$("#bn1dtrialslabel").text(ui.value);
							        },
							});
							$( "#bn1dtrials" ).on( "slidechange", bnClearAndRedraw);

							$("#bn1dprobability").slider({
								range: "min",
								min: 0,
								max: 1,
								value: 0.5,
								step: 0.1,
								slide: function(event, ui) {
									$("#bn1dprobabilitylabel").text(ui.value);
								}
							});
							$( "#bn1dprobability" ).on( "slidechange", bnClearAndRedraw);

							var bnRenderer = function() {
								var data = [[0,0,0,0,0,0,0,0,0,0,0], [66.6], [72], [78], [83]];
								for (var i=0; i<points.length; i++) {
									data[0][points[i]] = data[0][points[i]] + 1;
								}
								return data;
							};

							bnplot = $.jqplot('bnplot',[],{
								dataRenderer: bnRenderer,
								series: seriesOpts,
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
						initBn1D();
					</script>

					<br /><br />
				</div>
				<div>
					<h2 id='poisson'>Dosraniad Poisson</h2>

					<br />

					<p>Mae'r graff isod yn dangos hapboblogaeth poblogaeth o gyfanrifau a chanddynt ddosraniad Poisson. Defnyddiwch y llithrydd ar y top i reoli maint y sampl. Dewiswch yr offer ar y chwith i ddangos gwahanol briodweddau'r boblogaeth hon.</p>

					<br /><br />

					<div style='float: left; margin-left: 1em; margin-top: 5em;'>
						<input type='checkbox' id='psshowmean' name='psshowmean' onclick='toggleShowing();' /><label for='psshowmean'>Dangos y cymedr</label><br />
						<input type='checkbox' id='psshowmedian' name='psshowmedian' onclick='toggleShowing();' /><label for='psshowmedian'>Dangos y canolrif</label><br />
						<input type='checkbox' id='psshowmode' name='psshowmode' onclick='toggleShowing();' /><label for='psshowmode'>Dangos y modd </label><br />
						<input type='checkbox' id='psshowrange' name='psshowrange' onclick='toggleShowing();' /><label for='psshowrange'>Dangos yr amrediad</label><br />
					</div>
					<div class="tabbable" style='float: left; padding-left: 1em;'>
						<ul class="nav nav-tabs" style='margin-bottom: 0; margin-left: 10px;'>
							<li class="active"><a href="#pstab1d" data-toggle="tab">1 Dimensional</a></li>
							<li><a href="#pstab2d" data-toggle="tab">2 Dimensional</a></li>
						</ul>
						<div class="tab-content" style='overflow: visible; height: 525px;'>
							<div id="pstab1d" class="tab-pane active">
								<center><div style='margin-top: 5px; margin-bottom: 5px;'>Sample: <span id='ps1dsample'>0</span></div><div id='ps1dslider'></div><div id="psplot" class="medgraph"></div></center>
							</div>
							<div id="pstab2d" class="tab-pane active">
								<center><br /><div id='psgraph' class='jxgbox medgraph'></div></center>
								<div class='graphcontrols' style='margin-left: 7px;'><button onclick="JXG.JSXGraph.freeBoard(psjsx); initPs2D();">Reset</button> <span class='mousepos' id='psmousepos'></span></div>
							</div>
						</div>
					</div>

					<br />
					
					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initPs2D() {
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
						initPs2D();

						function initPs1D() {
							var points = [];
							$("#ps1dslider").slider({
								range: "min",
								min: 0,
								max: 200,
								value: 0,
								slide: function( event, ui ) {
									$( "#ps1dsample" ).text(ui.value);
									if (ui.value > points.length) {
										for(var i = points.length; i<ui.value; i++) {
											points[i] = Math.round(psRand(4));
										}
									} else if (ui.value < points.length) {
										for(var i = points.length - 1; i>=ui.value; i--) {
											points.pop();
										}
									}
									update1D(psplot, points, psRenderer);
								}
							});

							var psRenderer = function() {
								var data = [[0,0,0,0,0,0,0,0,0,0,0], [66.6], [72], [78], [83]];
								for (var i=0; i<points.length; i++) {
									data[0][points[i]] = data[0][points[i]] + 1;
								}
								return data;
							};

							psplot = $.jqplot('psplot',[],{
								dataRenderer: psRenderer,
								series: seriesOpts,
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

						initPs1D();
					</script>

					<br /><br />
				</div>
			</div>
		</div>
	</body>
</html>
