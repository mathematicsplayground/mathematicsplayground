<?php 
$title = 'Quadratic Equations - Mathematics Playground';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Quadratic Equations</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em; margin-bottom: 2em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#quadratic">Quadratic Equations</a></li>
					</ul>
				</div>

				<div>
					<h2 id='quadratic'>Quadratic Equations</h2>

					<br />

					$ax^2 + bx + c = 0$<br />
					<br />
					$(px + q)(rx + s) = 0$<br />
					<br />
					$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$<br />
					<br />

					<p>The graph below shows a quadratic equation. Control the $a$, $b$ and $c$ parameters by moving the sliders at the bottom of the graph. The points at which the curve crosses the X axis are calculated beneath the graph.</p>

					<br /><br />

					<center><div id='qegraph' class='jxgbox medgraph'></div></center>
					<div class='graphcontrols'><button onclick="JXG.JSXGraph.freeBoard(qejsx); initQe();">Reset positions</button> <span class='mousepos' id='qemousepos'></span></div>

					<div style='width: 430px; margin: auto;'>
						<div style='float: right; margin-left: 0;'><span id='qeformula2'></span></div>
						<span id='qeformula1'></span><br /><br />
						<div style='clear: both; padding-top: 1em;'>
							<center><span id='qeformula3'></span></center>
						</div>
					</div>

					<br /><br />

					<script type='text/javascript'>
						function initQe() {
							qejsx = JXG.JSXGraph.initBoard('qegraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var qesla = qejsx.createElement('slider', [[-9.25, -6], [5.5, -6], [-10, 1, 10]], {name:'a', snapWidth: 0.1});	
							var qeslb = qejsx.createElement('slider', [[-9.25, -7], [5.5, -7], [-10, 0, 10]], {name:'b', snapWidth: 0.1});
							var qeslc = qejsx.createElement('slider', [[-9.25, -8], [5.5, -8], [-10, -4, 10]], {name:'c', snapWidth: 0.1});

							var qeplot = qejsx.create('functiongraph', [
								function (x) { return qesla.Value() * Math.pow(x, 2) + qeslb.Value() * x + qeslc.Value(); }, -100, 100], {fixed: true, strokeWidth: 2, strokeColor: '#44c'});

							var qex1 = qejsx.createElement('point', [function () {
								var a = qesla.Value();
								var b = qeslb.Value();
								var c = qeslc.Value();
								return ((-b - Math.sqrt(Math.pow(b, 2) - 4 * a * c)) / (2 * a));
							},0], {strokeColor: '#44c', fillColor: '#44c'});

							var qex2 = qejsx.createElement('point', [function () {
								var a = qesla.Value();
								var b = qeslb.Value();
								var c = qeslc.Value();
								return ((-b + Math.sqrt(Math.pow(b, 2) - 4 * a * c)) / (2 * a));
							}, 0], {strokeColor: '#44c', fillColor: '#44c'});

							qejsx.on('update', function() {
								var a = qesla.Value().toFixed(2);
								var b = qeslb.Value().toFixed(2);
								var c = qeslc.Value().toFixed(2);
								if ((Math.pow(b, 2) - 4 * a * c) > 0) {
								  // Ordinary roots
								  var solution1 = ((-b - Math.sqrt(Math.pow(b, 2) - 4 * a * c)) / (2 * a)).toFixed(2);
								  var solution2 = ((-b + Math.sqrt(Math.pow(b, 2) - 4 * a * c)) / (2 * a)).toFixed(2);
								  qex1.setLabelText(solution1);
								  qex2.setLabelText(solution2);
								  $("#qeformula3").text("$x = \\frac{" + -b + " \\pm \\sqrt{" + b + "^2 - 4*" + a + "*" + c + "}}{-2 * " + a + "} = " + solution1 + "$ or $" + solution2 + "$");

								} else {
								  // Complex roots
								  var sq = (- (Math.pow(b, 2) - 4 * a * c)).toFixed(2);
								  $("#qeformula3").text("$x = \\frac{" + -b + " \\pm \\sqrt{" + b + "^2 - 4*" + a + "*" + c + "}}{-2 * " + a + "} = \\frac{" + -b + " + i \\sqrt{" + sq + "}}{ " + 2 * a + "}" + "$ or $\\frac{" + -b + " -i \\sqrt{" + sq + "}}{ " + 2 * a + "}$");

								}

								$("#qeformula1").text("$" + a + "x^2 + " + b + "x + " + c + "= 0$");
								$("#qeformula2").html("$(px + q)(rx + s) = 0$<br/>$pr = " + a + "$<br/>$ps + qr = " + b + "$<br/>$qs = " + c + "$");
								if (typeof(MathJax) !== 'undefined') {
									MathJax.Hub.Queue(["Typeset", MathJax.Hub, "qeformula1"]);
									MathJax.Hub.Queue(["Typeset", MathJax.Hub, "qeformula2"]);
									MathJax.Hub.Queue(["Typeset", MathJax.Hub, "qeformula3"]);
								}
							});

							qejsx.on('mousemove', function(e) {
								var mPos = qejsx.getUsrCoordsOfMouse(e);
								$('#qemousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							qejsx.update();
						}
						initQe();
					</script>

					<br /><br />
				</div>

			</div>
		</div>
	</body>
</html>
