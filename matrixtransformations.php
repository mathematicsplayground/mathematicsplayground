<?php 
$title = 'Matrix Transformations - Mathematics Playground';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Matrix Transformations</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em; margin-bottom: 2em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#scaling">Scaling</a></li>
						<li><a href="#translation">Translation</a></li>
						<li><a href="#rotation">Rotation</a></li>
						<li><a href="#shearing">Shearing</a></li>
					</ul>
				</div>

				<div>
					<h2 id='scaling'>Scaling</h2>

					<br />

					<p>The graph below shows four vectors which are all being multiplied by the matrix on the left. Drag the slider to change the scaling factor and note the changes to the matrix and the vectors. Selecting the <em>"Apply to image"</em> option will cause this matrix transformation to be applied to an image.</p>

					<br /><br />

                                        <div style="overflow: auto; width: 100%">
					  <table class='matrix' style='margin-left: 1em; margin-right: 1.5em;'>
						<tr>
							<td class='matrixtop'></td>
							<td><span id='m1a1' class='matrixresult'>1.00</span></td>
							<td><span id='m1a2' class='matrixresult'>0.00</span></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><span id='m1b1' class='matrixresult'>0.00</span></td>
							<td><span id='m1b2' class='matrixresult'>1.00</span></td>
							<td class='matrixbottom'></td>
						</tr>
					  </table>

                                          <p style="float:left;"> This matrix multiplied by each vector would give:</p>
                                        </div>

					<div>
					<div id='scalegraph' class='jxgbox medgraph'></div>
					<div class='graphcontrols' style='left: -123px;'><button onclick="JXG.JSXGraph.freeBoard(scalejsx); initScale();">Reset positions</button> <span class='mousepos' id='scalemousepos'></span><br /><br /><input type='checkbox' id='applytoimage1' onclick='applyToImage1();' /><label for='applytoimage1'>Apply to image</label></div>
					</div>

					<br />

					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initScale() {
							scalejsx = JXG.JSXGraph.initBoard('scalegraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var scales = scalejsx.createElement('slider', [[-9,9], [5,9], [-2.5,1,2.5]], {name:'scale', snapWidth:0.1});
							var scalep1 = scalejsx.create('point', [
								function() {return scales.Value() * 1},
								function() {return scales.Value() * 1}], {fixed: true, visible: false});
							var scalev1 = scalejsx.create('arrow', [[0, 0], scalep1], {fixed: true, strokeColor: '#555'});
							var scalep2 = scalejsx.create('point', [
								function() {return scales.Value() * 1},
								function() {return scales.Value() * 3}], {fixed: true, visible: false});
							var scalev2 = scalejsx.create('arrow', [[0, 0], scalep2], {fixed: true, strokeColor: '#555'});
							var scalep3 = scalejsx.create('point', [
								function() {return scales.Value() * 4},
								function() {return scales.Value() * 1}], {fixed: true, visible: false});
							var scalev3 = scalejsx.create('arrow', [[0, 0], scalep3], {fixed: true, strokeColor: '#555'});
							var scalep4 = scalejsx.create('point', [
								function() {return scales.Value() * 4},
								function() {return scales.Value() * 3}], {fixed: true, visible: false});
							var scalev4 = scalejsx.create('arrow', [[0, 0], scalep4], {fixed: true, strokeColor: '#555'});
							scaleimg = scalejsx.create('image',["img/butterfly.png", [1,1], [3,2]], {fixed: true, visible: false});
							var scaletransform = scalejsx.create('transform', [
								function() {return scales.Value();},
								function() {return scales.Value();}], {type:'scale'}); 
							scaletransform.bindTo(scaleimg);

							$("#applytoimage1").attr("checked", false);

							scalejsx.on('mousemove', function(e) {
								var mPos = scalejsx.getUsrCoordsOfMouse(e);
								$('#scalemousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							scalejsx.on('update', function() {
								$("#m1a1").text(scales.Value().toFixed(2));
								$("#m1b2").text(scales.Value().toFixed(2));
							});
							scalejsx.update();
						}

						function applyToImage1() {
							if($("#applytoimage1").is(':checked')) {
								scaleimg.showElement();
							} else {
								scaleimg.hideElement();
							}
						}

						initScale();
					</script>
				</div>

				<div style='clear: both;'>
					<h2 id='translation'>Translation</h2>

					<br />

					<p>The graph below shows four vectors which are all having the values in the left hand matrix added to them. Drag the horizontal slider to change the X translation and the vertical slider to change the Y translation, observing the changes to the matrix and the vectors. Selecting the <em>"Apply to image"</em> option will cause this matrix transformation to be applied to an image.</p>

					<br /><br />

					<div style="overflow: auto; width: 100%">	  
					  <table class='matrix' style='margin-left: 1em; margin-right: 1.5em;'>
						<tr>
							<td class='matrixtop'></td>
							<td><span id='m2a1' class='matrixresult'>0.00</span></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><span id='m2b1' class='matrixresult'>0.00</span></td>
							<td class='matrixbottom'></td>
						</tr>
					  </table>

					  <p>This matrix added to each vector would give:</p>
					</div>

					<div>
					<div id='transgraph' class='jxgbox medgraph'></div>
					<div class='graphcontrols' style='left: -123px;'><button onclick="JXG.JSXGraph.freeBoard(transjsx); initTrans();">Reset positions</button> <span class='mousepos' id='transmousepos'></span><br /><br /><input type='checkbox' id='applytoimage2' onclick='applyToImage2();' /><label for='applytoimage2'>Apply to image</label></div>
					</div>

					<br />

					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initTrans() {
							transjsx = JXG.JSXGraph.initBoard('transgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var transx = transjsx.createElement('slider', [[-8,9], [7,9], [-8,0,7]], {name:'X', snapWidth:0.1});
							var transy = transjsx.createElement('slider', [[-9,8], [-9,-7], [8,0,-7]], {name:'Y', snapWidth:0.1});
							var transp1 = transjsx.create('point', [
								function() {return transx.Value() + 1},
								function() {return transy.Value() + 1}], {fixed: true, visible: false});
							var transv1 = transjsx.create('arrow', [[0, 0], transp1], {fixed: true, strokeColor: '#555'});
							var transp2 = transjsx.create('point', [
								function() {return transx.Value() + 1},
								function() {return transy.Value() + 3}], {fixed: true, visible: false});
							var transv2 = transjsx.create('arrow', [[0, 0], transp2], {fixed: true, strokeColor: '#555'});
							var transp3 = transjsx.create('point', [
								function() {return transx.Value() + 4},
								function() {return transy.Value() + 1}], {fixed: true, visible: false});
							var transv3 = transjsx.create('arrow', [[0, 0], transp3], {fixed: true, strokeColor: '#555'});
							var transp4 = transjsx.create('point', [
								function() {return transx.Value() + 4},
								function() {return transy.Value() + 3}], {fixed: true, visible: false});
							var transv4 = transjsx.create('arrow', [[0, 0], transp4], {fixed: true, strokeColor: '#555'});
							transimg = transjsx.create('image',["img/butterfly.png", [1,1], [3,2]], {fixed: true, visible: false});
							var transtransform = transjsx.create('transform', [
								function() {return transx.Value();},
								function() {return transy.Value();}], {type:'translate'});
							transtransform.bindTo(transimg);

							$("#applytoimage2").attr("checked", false);

							transjsx.on('mousemove', function(e) {
								var mPos = transjsx.getUsrCoordsOfMouse(e);
								$('#transmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							transjsx.on('update', function() {
								$("#m2a1").text(transx.Value().toFixed(2));
								$("#m2b1").text(transy.Value().toFixed(2));
							});

							transjsx.update();
						}

						function applyToImage2() {
							if($("#applytoimage2").is(':checked')) {
								transimg.showElement();
							} else {
								transimg.hideElement();
							}
						}

						initTrans();
					</script>
				</div>

				<div style='clear: both;'>
					<h2 id='rotation'>Rotation</h2>

					<br />

					<p>The graph below shows four vectors which are being rotated by the matrix on the left. Drag the black and white point to change the angle of rotation, observing the changes to the matrix and the vectors. Selecting the <em>"Apply to image"</em> option will cause this matrix transformation to be applied to an image.</p>

					<br /><br />

					<div style="overflow: auto; width: 100%">

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td>cos(<span id='m3a1t' class='matrixresult'>0.00</span>)</td>
							<td>-sin(<span id='m3a2t' class='matrixresult'>0.00</span>)</td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td>sin(<span id='m3b1t' class='matrixresult'>0.00</span>)</td>
							<td>cos(<span id='m3b2t' class='matrixresult'>0.00</span>)</td>
							<td class='matrixbottom'></td>
						</tr>
					</table> 

					<div class="operator">
					=
					</div>


					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td><span id='m3a1' class='matrixresult'>0.00</span></td>
							<td><span id='m3a2' class='matrixresult'>0.00</span></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><span id='m3b1' class='matrixresult'>0.00</span></td>
							<td><span id='m3b2' class='matrixresult'>0.00</span></td>				
							<td class='matrixbottom'></td>
						</tr>
					</table>

					</div>
					<div style="overflow: auto; width: 100%">	  
						  <p>This matrix multiplied by each vector would give:</p>
					</div>

					<div>
					<div id='rotgraph' class='jxgbox medgraph'></div>
					<div class='graphcontrols' style='left: -123px;'><button onclick="JXG.JSXGraph.freeBoard(rotjsx); initRot();">Reset positions</button> <span class='mousepos' id='rotmousepos'></span><br /><br /><input type='checkbox' id='applytoimage3' onclick='applyToImage3();' /><label for='applytoimage3'>Apply to image</label></div>
					</div>

					<br />

					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initRot() {
							rotjsx = JXG.JSXGraph.initBoard('rotgraph', {boundingbox: [-6, 6, 6, -6], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var rotcirc = rotjsx.create('circle', [[0, 0], 5], {fixed: true, visible: false});
							var rotg = rotjsx.create('glider', [5, 0, rotcirc], {strokeColor: 'black', fillColor: 'white', name: '0.00'});
							var roto = rotjsx.create('point', [0, 0], {fixed: true, visible: false});
							var rot5 = rotjsx.create('point', [5, 0], {fixed: true, visible: false});
							var rotangle = rotjsx.create('angle', [rot5, roto, rotg], {radius: 5, withLabel: false, orthoType:'sector'});
							var rotp1 = rotjsx.create('point', [1, 1], {fixed: true, visible: false});
							var rotv1 = rotjsx.create('arrow', [[0, 0], rotp1], {fixed: true, strokeColor: '#555'});
							var rotp2 = rotjsx.create('point', [1, 3], {fixed: true, visible: false});
							var rotv2 = rotjsx.create('arrow', [[0, 0], rotp2], {fixed: true, strokeColor: '#555'});
							var rotp3 = rotjsx.create('point', [4, 1], {fixed: true, visible: false});
							var rotv3 = rotjsx.create('arrow', [[0, 0], rotp3], {fixed: true, strokeColor: '#555'});
							var rotp4 = rotjsx.create('point', [4, 3], {fixed: true, visible: false});
							var rotv4 = rotjsx.create('arrow', [[0, 0], rotp4], {fixed: true, strokeColor: '#555'});
							rotimg = rotjsx.create('image',["img/butterfly.png", [1,1], [3,2]], {fixed: true, visible: false});
							var rotrotate = rotjsx.create('transform', [
								function() {return rotangle.Value();},
								roto], {type:'rotate'});
							rotrotate.bindTo(rotp1);
							rotrotate.bindTo(rotp2);
							rotrotate.bindTo(rotp3);
							rotrotate.bindTo(rotp4);
							rotrotate.bindTo(rotimg);

							$("#applytoimage3").attr("checked", false);

							rotjsx.on('mousemove', function(e) {
								var mPos = rotjsx.getUsrCoordsOfMouse(e);
								$('#rotmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							rotjsx.on('update', function() {
								$("#m3a1t").text(rotangle.Value().toFixed(2));
								$("#m3a2t").text(rotangle.Value().toFixed(2));
								$("#m3b1t").text(rotangle.Value().toFixed(2));
								$("#m3b2t").text(rotangle.Value().toFixed(2));
								$("#m3a1").text(Math.cos(rotangle.Value()).toFixed(2));
								$("#m3a2").text(-Math.sin(rotangle.Value()).toFixed(2));
								$("#m3b1").text(Math.sin(rotangle.Value()).toFixed(2));
								$("#m3b2").text(Math.cos(rotangle.Value()).toFixed(2));
								rotg.setLabelText(rotangle.Value().toFixed(2));
							});

							rotjsx.update();
						}

						function applyToImage3() {
							if($("#applytoimage3").is(':checked')) {
								rotimg.showElement();
							} else {
								rotimg.hideElement();
							}
						}

						initRot();
					</script>
				</div>

				<div style='clear: both;'>
					<h2 id='shearing'>Shearing</h2>

					<br />

					<p>The graph below shows four vectors which are all being multiplied by the matrix on the left. Drag the slider to change the shearing factor and note the changes to the matrix and the vectors. Selecting the <em>"Apply to image"</em> option will cause this matrix transformation to be applied to an image.</p>

					<br /><br />

					<div style="overflow: auto; width: 100%;">
					  <table class='matrix' style='margin-left: 1em; margin-right: 1.5em;'>
						<tr>
							<td class='matrixtop'></td>
							<td><span id='m4a1' class='matrixresult'>1.00</span></td>
							<td><span id='m4a2' class='matrixresult'>0.00</span></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><span id='m4b1' class='matrixresult'>0.00</span></td>
							<td><span id='m4b2' class='matrixresult'>1.00</span></td>
							<td class='matrixbottom'></td>
						</tr>
					  </table>

					  <p>This matrix multiplied by each vector would give:</p>
					</div>


					<div>
					<div id='sheargraph' class='jxgbox medgraph'></div>
					<div class='graphcontrols' style='left: -123px;'><button onclick="JXG.JSXGraph.freeBoard(shearjsx); initShear();">Reset positions</button> <span class='mousepos' id='shearmousepos'></span><br /><br /><input type='checkbox' id='applytoimage4' onclick='applyToImage4();' /><label for='applytoimage4'>Apply to image</label></div>
					</div>

					<br />

					<center>
					</center>

					<br /><br />

					<script type='text/javascript'>
						function initShear() {
							shearjsx = JXG.JSXGraph.initBoard('sheargraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});

							var shearsx = shearjsx.createElement('slider', [[-8,9], [7,9], [-2.5,0,2.5]], {name:'X shear', snapWidth:0.1});
							var shearsy = shearjsx.createElement('slider', [[-9,8], [-9,-7], [2.5,0,-2.5]], {name:'Y shear', snapWidth:0.1});
							var shearp1 = shearjsx.create('point', [1, 1], {fixed: true, visible: false});
							var shearv1 = shearjsx.create('arrow', [[0, 0], shearp1], {fixed: true, strokeColor: '#555'});
							var shearp2 = shearjsx.create('point', [1, 3], {fixed: true, visible: false});
							var shearv2 = shearjsx.create('arrow', [[0, 0], shearp2], {fixed: true, strokeColor: '#555'});
							var shearp3 = shearjsx.create('point', [4, 1], {fixed: true, visible: false});
							var shearv3 = shearjsx.create('arrow', [[0, 0], shearp3], {fixed: true, strokeColor: '#555'});
							var shearp4 = shearjsx.create('point', [4, 3], {fixed: true, visible: false});
							var shearv4 = shearjsx.create('arrow', [[0, 0], shearp4], {fixed: true, strokeColor: '#555'});
							shearimg = shearjsx.create('image',["img/butterfly.png", [1,1], [3,2]], {fixed: true, visible: false});
							var sheartransform = shearjsx.create('transform',[
								1, 0, 0,
								0, 1, function() { return shearsx.Value(); },
								0, function() {return shearsy.Value(); }, 1,
								], {type:'generic'}); 
							sheartransform.bindTo(shearp1);
							sheartransform.bindTo(shearp2);
							sheartransform.bindTo(shearp3);
							sheartransform.bindTo(shearp4);
							sheartransform.bindTo(shearimg);

							$("#applytoimage4").attr("checked", false);

							shearjsx.on('mousemove', function(e) {
								var mPos = shearjsx.getUsrCoordsOfMouse(e);
								$('#shearmousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
							});

							shearjsx.on('update', function() {
								$("#m4a2").text(shearsx.Value().toFixed(2));
								$("#m4b1").text(shearsy.Value().toFixed(2));
							});

							shearjsx.update();
						}

						function applyToImage4() {
							if($("#applytoimage4").is(':checked')) {
								shearimg.showElement();
							} else {
								shearimg.hideElement();
							}
						}

						initShear();
					</script>
				</div>
			</div>
		</div>
	</body>
</html>
