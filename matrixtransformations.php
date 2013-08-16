<?php 
$title = 'Matrix Arithmetic - Mathematics Playground';

require_once('header.php');
?>

		<div class="container-fluid">
			<?php require_once('menu.html'); ?>
			<div class="span9">
				<div class="hero-unit">
					<h1>Matrix Arithmetic</h1>
				</div>
				<div class="dropdown clearfix" style='float: right; margin-left: 1em; margin-bottom: 2em;'>
					<ul class="dropdown-menu" style="display: block; position: static; margin-bottom: 5px; *width: 180px;">
						<li><a href="#scaling">Scaling</a></li>
						<li><a href="#translation">Translation</a></li>
						<li><a href="#rotation">Rotation</a></li>
					</ul>
				</div>

				<div>
					<h2 id='scaling'>Scaling</h2>

					<br />

					<p>The graph below shows four vectors which are all being multiplied by the matrix on the left. Drag the slider to change the scaling factor and note the changes to the matrix and the vectors. Selecting the <em>"Apply to image"</em> option will cause this matrix transformation to be applied to an image.</p>

					<br /><br />

					<table class='matrix' style='margin-left: 2em; margin-right: 1.5em; margin-top: 200px; width: 100px;'>
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

					<div class="operator" style='margin-top: 200px;'>
					*
					</div>

					<div style='float: right;'>
					<div id='addgraph' class='jxgbox medgraph'></div>
					<div class='graphcontrols' style='left: -123px;'><button onclick="scalejsx.zoom100(); scalejsx.moveOrigin(scaleox, scaleoy); ">Reset position</button> <span class='mousepos' id='scalemousepos'></span><br /><br /><input type='checkbox' id='applytoimage1' onclick='applyToImage1();' /><label for='applytoimage1'>Apply to image</label></div>
					</div>

                                        <br />

                                        <center>
                                        </center>

                                        <br /><br />

                                        <script type='text/javascript'>
                                                var scalejsx = JXG.JSXGraph.initBoard('addgraph', {boundingbox: [-10, 10, 10, -10], grid: true, pan: true, zoom: true, showcopyright: false, axis: true, pan: {needShift: false}});
                                                var scaleox = scalejsx.origin.scrCoords[1];
						var scaleoy = scalejsx.origin.scrCoords[2];

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
						var scaleimg = scalejsx.create('image',["img/butterfly.png", [1,1], [3,2]], {fixed: true, visible: false});
						var scaletransform = scalejsx.create('transform', [
							function() {return scales.Value();},
							function() {return scales.Value();}], {type:'scale'}); 
						scaletransform.bindTo(scaleimg);

                                                scalejsx.on('mousemove', function(e) {
                                                        var mPos = scalejsx.getUsrCoordsOfMouse(e);
                                                        $('#scalemousepos').text(mPos[0].toFixed(2) + ', ' + mPos[1].toFixed(2));
						});

						scalejsx.on('update', function() {
							$("#m1a1").text(scales.Value().toFixed(2));
							$("#m1b2").text(scales.Value().toFixed(2));
						});

						function applyToImage1() {
							if($("#applytoimage1").is(':checked')) {
								scaleimg.showElement();
							} else {
								scaleimg.hideElement();
							}
						}
                                        </script>


				</div>
			</div>
		</div>
	</body>
</html>
