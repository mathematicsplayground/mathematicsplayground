JXG.Options.vector = {
	strokeColor: 'black',
	strokeWidth: 3,
	point: {
		visible: true,
		size: 0.1,
		strokeColor: 'black',
		fillColor: 'black',
		name: '',
		withLabel: false
	}
};

JXG.createVector = function (board, parents, attributes) {
	var attr_vector = JXG.copyAttributes(attributes, board.options, 'vector'),
		attr_point = JXG.copyAttributes(attributes, board.options, 'vector', 'point'),
		attach = parents[0],
		direction = parents[1],
		len = parents[2],
		distance = JXG.Math.Geometry.distance(direction, [0, 0]),
		
		end = board.create('point', [function () {
				return attach.X() + (len.Value()/distance)*direction[0];
			},
			function () {
				return attach.Y() + (len.Value()/distance)*direction[1];
			}], attr_point),
		vector = board.create('arrow', [attach, end], attr_vector);
		
	return vector;
};

JXG.JSXGraph.registerElement('vector', JXG.createVector);
