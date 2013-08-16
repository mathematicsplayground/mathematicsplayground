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
						<li><a href="#scalar">Scalar-Matrix Multiplication</a></li>
						<li><a href="#multiplication">Multiplication</a></li>
					</ul>
				</div>

				<script type='text/javascript'>
					function updateAddition() {
						for(i = 1; i < 5; i++) {
							$("#m1m2a" + i).html("<span class='leftc'>" + $("#m1a" + i).val() + "</span> + <span class='rightc'>" + $("#m2a" + i).val() + "</span>");
							$("#m1m2b" + i).html("<span class='leftc'>" +$("#m1b" + i).val() + "</span> + <span class='rightc'>" + $("#m2b" + i).val() + "</span>");
							$("#ra" + i).text((parseFloat($("#m1a" + i).val()) + parseFloat($("#m2a" + i).val())).toFixed(2));
							$("#rb" + i).text((parseFloat($("#m1b" + i).val()) + parseFloat($("#m2b" + i).val())).toFixed(2));
						}
					}

					function updateSubtraction() {
						for(i = 1; i < 5; i++) {
							$("#m3m4a" + i).html("<span class='leftc'>" + $("#m3a" + i).val() + "</span> - <span class='rightc'>" + $("#m4a" + i).val() + "</span>");
							$("#m3m4b" + i).html("<span class='leftc'>" + $("#m3b" + i).val() + "</span> - <span class='rightc'>" + $("#m4b" + i).val() + "</span>");
							$("#r2a" + i).text((parseFloat($("#m3a" + i).val()) - parseFloat($("#m4a" + i).val())).toFixed(2));
							$("#r2b" + i).text((parseFloat($("#m3b" + i).val()) - parseFloat($("#m4b" + i).val())).toFixed(2));
						}
					}

					function updateScalar() {
						for(i = 1; i < 5; i++) {
							$("#sm5a" + i).html("<span class='leftc'>" + $("#s").val() + "</span> * <span class='rightc'>" + $("#m5a" + i).val() + "</span>");
							$("#sm5b" + i).html("<span class='leftc'>" + $("#s").val() + "</span> * <span class='rightc'>" + $("#m5b" + i).val() + "</span>");
							$("#r3a" + i).text((parseFloat($("#s").val()) * parseFloat($("#m5a" + i).val())).toFixed(2));
							$("#r3b" + i).text((parseFloat($("#s").val()) * parseFloat($("#m5b" + i).val())).toFixed(2));
						}
					}

					function updateMultiplication() {
						$("#m6m7a1").html("(<span class='leftc'>" + $("#m6a1").val() + "</span> * <span class='rightc'>" + $("#m7a1").val() + "</span> + <span class='leftc'>" + $("#m6a2").val() + "</span> * <span class='rightc'>" + $("#m7b1").val() + "</span> + <span class='leftc'>" + $("#m6a3").val() + "</span> * <span class='rightc'>" + $("#m7c1").val() + "</span>)");
						$("#m6m7a2").html("(<span class='leftc'>" + $("#m6a1").val() + "</span> * <span class='rightc'>" + $("#m7a2").val() + "</span> + <span class='leftc'>" + $("#m6a2").val() + "</span> * <span class='rightc'>" + $("#m7b2").val() + "</span> + <span class='leftc'>" + $("#m6a3").val() + "</span> * <span class='rightc'>" + $("#m7c2").val() + "</span>)");
						$("#m6m7b1").html("(<span class='leftc'>" + $("#m6b1").val() + "</span> * <span class='rightc'>" + $("#m7a1").val() + "</span> + <span class='leftc'>" + $("#m6b2").val() + "</span> * <span class='rightc'>" + $("#m7b1").val() + "</span> + <span class='leftc'>" + $("#m6b3").val() + "</span> * <span class='rightc'>" + $("#m7c1").val() + "</span>)");
						$("#m6m7b2").html("(<span class='leftc'>" + $("#m6b1").val() + "</span> * <span class='rightc'>" + $("#m7a2").val() + "</span> + <span class='leftc'>" + $("#m6b2").val() + "</span> * <span class='rightc'>" + $("#m7b2").val() + "</span> + <span class='leftc'>" + $("#m6b3").val() + "</span> * <span class='rightc'>" + $("#m7c2").val() + "</span>)");

						$("#r4a1").text((parseFloat($("#m6a1").val()) * parseFloat($("#m7a1").val()) + parseFloat($("#m6a2").val()) * parseFloat($("#m7b1").val()) + parseFloat($("#m6a3").val()) * parseFloat($("#m7c1").val())).toFixed(2));
						$("#r4a2").text((parseFloat($("#m6a1").val()) * parseFloat($("#m7a2").val()) + parseFloat($("#m6a2").val()) * parseFloat($("#m7b2").val()) + parseFloat($("#m6a3").val()) * parseFloat($("#m7c2").val())).toFixed(2));
						$("#r4b1").text((parseFloat($("#m6b1").val()) * parseFloat($("#m7a1").val()) + parseFloat($("#m6b2").val()) * parseFloat($("#m7b1").val()) + parseFloat($("#m6b3").val()) * parseFloat($("#m7c1").val())).toFixed(2));
						$("#r4b2").text((parseFloat($("#m6b1").val()) * parseFloat($("#m7a2").val()) + parseFloat($("#m6b2").val()) * parseFloat($("#m7b2").val()) + parseFloat($("#m6b3").val()) * parseFloat($("#m7c2").val())).toFixed(2));
					}

					$(document).ready(function() {
						updateAddition();
						updateSubtraction();
						updateScalar();
						updateMultiplication();
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
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='8' id='m1a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m1a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='-3' id='m1a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m1a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='5' id='m1b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='7' id='m1b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m1b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='3' id='m1b4' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator">
						+
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m2a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='3' id='m2a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='4' id='m2a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='2' id='m2a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='8' id='m2b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='6' id='m2b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='5' id='m2b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateAddition();' onpaste='updateAddition();' onInput='updateAddition();' value='-4' id='m2b4' /></td>
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

					<p>In the following example the second matrix is being taken away from the first one, change the values in either matrix and observe how the result changes.</p>

					<br /><br />


					<table class='matrix' style='margin-left: 5em;'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='8' id='m3a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='4' id='m3a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='-3' id='m3a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='6' id='m3a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='5' id='m3b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='7' id='m3b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='6' id='m3b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='3' id='m3b4' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator">
						-
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='4' id='m4a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='3' id='m4a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='4' id='m4a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='2' id='m4a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='8' id='m4b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='6' id='m4b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='5' id='m4b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateSubtraction();' onpaste='updateSubtraction();' onInput='updateSubtraction();' value='-4' id='m4b4' /></td>
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

				<div style='clear: left; padding-top: 2em;'>
					<h2 id='scalar'>Scalar-Matrix Multiplication</h2>

					<br />

					<p>In the following example a matrix is being multiplied by a scalar value, change either the scalar value or the values in the matrix and observe how the result changes.</p>

					<br /><br />

					<div class="operator" style='margin-left: 7.2em; clear: left;'>
						<input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='3' id='s' style='text-align: right;' /> *
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='4' id='m5a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='3' id='m5a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='4' id='m5a3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='2' id='m5a4' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='8' id='m5b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='6' id='m5b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='5' id='m5b3' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateScalar();' onpaste='updateScalar();' onInput='updateScalar();' value='-4' id='m5b4' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator" style='clear: left; margin-left: 10em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='sm5a1'></td>
							<td class='matrixresult' id='sm5a2'></td>
							<td class='matrixresult' id='sm5a3'></td>
							<td class='matrixresult' id='sm5a4'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='sm5b1'></td>
							<td class='matrixresult' id='sm5b2'></td>
							<td class='matrixresult' id='sm5b3'></td>
							<td class='matrixresult' id='sm5b4'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
					<div class="operator" style='clear: left; margin-left: 10em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='r3a1'></td>
							<td class='matrixresult' id='r3a2'></td>
							<td class='matrixresult' id='r3a3'></td>
							<td class='matrixresult' id='r3a4'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='r3b1'></td>
							<td class='matrixresult' id='r3b2'></td>
							<td class='matrixresult' id='r3b3'></td>
							<td class='matrixresult' id='r3b4'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
				</div>

				<div style='clear: left; padding-top: 2em;'>
					<h2 id='multiplication'>Multiplication</h2>

					<br />

					<p>The following two matrices are being multiplied together, change the values in either matrix and observe how the result changes.</p>

					<br /><br />


					<table class='matrix' style='margin-left: 9em;'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='8' id='m6a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='4' id='m6a2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='-3' id='m6a3' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='5' id='m6b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='7' id='m6b2' /></td>
							<td><input type='text' maxlength='4' class='matrixnum leftc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='6' id='m6b3' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator">
						*
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='4' id='m7a1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='3' id='m7a2' /></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='0' id='m7b1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='2' id='m7b2' /></td>
							<td></td>
						</tr>	
						<tr>
							<td class='matrixbottom'></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='8' id='m7c1' /></td>
							<td><input type='text' maxlength='4' class='matrixnum rightc' onkeypress='updateMultiplication();' onpaste='updateMultiplication();' onInput='updateMultiplication();' value='6' id='m7c2' /></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>

					<div class="operator" style='clear: left; margin-left: 5.5em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='m6m7a1'></td>
							<td class='matrixresult' id='m6m7a2'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='m6m7b1'></td>
							<td class='matrixresult' id='m6m7b2'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
					<div class="operator" style='clear: left; margin-left: 13em;'>
						=
					</div>

					<table class='matrix'>
						<tr>
							<td class='matrixtop'></td>
							<td class='matrixresult' id='r4a1'></td>
							<td class='matrixresult' id='r4a2'></td>
							<td class='matrixtop'></td>
						</tr>
						<tr>
							<td class='matrixbottom'></td>
							<td class='matrixresult' id='r4b1'></td>
							<td class='matrixresult' id='r4b2'></td>
							<td class='matrixbottom'></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
