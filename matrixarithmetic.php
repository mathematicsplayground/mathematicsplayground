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
						<li><a href="#addition">Addition</a></li>
						<li><a href="#subtraction">Subtraction</a></li>
						<li><a href="#multiplication">Multiplication</a></li>
						<li><a href="#scalar">Scalar-Matrix Multiplication</a></li>
					</ul>
				</div>

				<script type='text/javascript'>
					function updateAddition() {
						for(i = 1; i < 5; i++) {
							$("#m1m2a" + i).text($("#m1a" + i).val() + " + " + $("#m2a" + i).val());
							$("#m1m2b" + i).text($("#m1b" + i).val() + " + " + $("#m2b" + i).val());
							$("#ra" + i).text((parseFloat($("#m1a" + i).val()) + parseFloat($("#m2a" + i).val())).toFixed(2));
							$("#rb" + i).text((parseFloat($("#m1b" + i).val()) + parseFloat($("#m2b" + i).val())).toFixed(2));
						}
					}

					function updateSubtraction() {
						for(i = 1; i < 5; i++) {
							$("#m3m4a" + i).text($("#m3a" + i).val() + " - " + $("#m4a" + i).val());
							$("#m3m4b" + i).text($("#m3b" + i).val() + " - " + $("#m4b" + i).val());
							$("#r2a" + i).text((parseFloat($("#m3a" + i).val()) - parseFloat($("#m4a" + i).val())).toFixed(2));
							$("#r2b" + i).text((parseFloat($("#m3b" + i).val()) - parseFloat($("#m4b" + i).val())).toFixed(2));
						}
					}

					$(document).ready(function() {
						updateAddition();
						updateSubtraction();
					});
				</script>

				<div>
					<h2 id='addition'>Addition</h2>

					<br />

					<p>The following two matrices are being added together, change the values in either matrix and observe how the result changes.</p>

					<br /><br />


					<table class='matrix' style='margin-left: 5em;'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='8' id='m1a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m1a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='-3' id='m1a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m1a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='5' id='m1b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='7' id='m1b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m1b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='3' id='m1b4' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator">
						+
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m2a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='3' id='m2a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m2a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='2' id='m2a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='8' id='m2b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m2b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='5' id='m2b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='-4' id='m2b4' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator" style='clear: left; margin-left: 10em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='m1m2a1'></td>
							<td class='matrixresult' id='m1m2a2'></td>
							<td class='matrixresult' id='m1m2a3'></td>
							<td class='matrixresult' id='m1m2a4'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='m1m2b1'></td>
							<td class='matrixresult' id='m1m2b2'></td>
							<td class='matrixresult' id='m1m2b3'></td>
							<td class='matrixresult' id='m1m2b4'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
					<div class="operator" style='clear: left; margin-left: 10em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='ra1'></td>
							<td class='matrixresult' id='ra2'></td>
							<td class='matrixresult' id='ra3'></td>
							<td class='matrixresult' id='ra4'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='rb1'></td>
							<td class='matrixresult' id='rb2'></td>
							<td class='matrixresult' id='rb3'></td>
							<td class='matrixresult' id='rb4'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
				</div>

				<div style='clear: left; padding-top: 2em;'>
					<h2 id='subtraction'>Subtraction</h2>

					<br />

					<p>The following two matrices are being added together, change the values in either matrix and observe how the result changes.</p>

					<br /><br />


					<table class='matrix' style='margin-left: 5em;'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='8' id='m3a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m3a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='-3' id='m3a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m3a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='5' id='m3b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='7' id='m3b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m3b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='3' id='m3b4' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator">
						-
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m4a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='3' id='m4a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m4a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='2' id='m4a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='8' id='m4b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m4b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='5' id='m4b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='-4' id='m4b4' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator" style='clear: left; margin-left: 10em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='m3m4a1'></td>
							<td class='matrixresult' id='m3m4a2'></td>
							<td class='matrixresult' id='m3m4a3'></td>
							<td class='matrixresult' id='m3m4a4'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='m3m4b1'></td>
							<td class='matrixresult' id='m3m4b2'></td>
							<td class='matrixresult' id='m3m4b3'></td>
							<td class='matrixresult' id='m3m4b4'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
					<div class="operator" style='clear: left; margin-left: 10em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='r2a1'></td>
							<td class='matrixresult' id='r2a2'></td>
							<td class='matrixresult' id='r2a3'></td>
							<td class='matrixresult' id='r2a4'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='r2b1'></td>
							<td class='matrixresult' id='r2b2'></td>
							<td class='matrixresult' id='r2b3'></td>
							<td class='matrixresult' id='r2b4'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
