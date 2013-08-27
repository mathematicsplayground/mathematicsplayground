function mean(arr) {
	if(arr.length == 0) {
		return;
	}
	var total = 0;
	for(i = 0; i < arr.length; i++) {
		total += arr[i];
	}
	return total / arr.length;
}

function mode(arr) {
	if(arr.length == 0) {
		return;
	}
	var counter = {};
	var mode = [];
	var max = 0;
	for (var i in arr) {
		if (!(arr[i] in counter))
			counter[arr[i]] = 0;
		counter[arr[i]]++;
		
		if (counter[arr[i]] == max) 
			mode.push(arr[i]);
		else if (counter[arr[i]] > max) {
			max = counter[arr[i]];
			mode = [arr[i]];
		}
	}
	return mode; 
}

function median(arr) {
	if(arr.length == 0){
		return;
	}
	arr.sort(function (a,b){return a - b});
	var mid = Math.floor(arr.length / 2);
	if ((arr.length % 2) == 1) {
		return arr[mid];
	} else {
		return (arr[mid - 1] + arr[mid]) / 2;
	}
}

function getXArray(arr) {
	var xarr = [];
	for(i = 0; i<arr.length; i++) {
		xarr[i] = arr[i].X();
	}
	return xarr;
}

function getYArray(arr) {
	var yarr = [];
	for(i = 0; i<arr.length; i++) {
		yarr[i] = arr[i].Y();
	}
	return yarr;
}

function bmRand(v) {
	var x = 0, y = 0, rds, c;
	do {
		x = Math.random()*2-1;
		y = Math.random()*2-1;
		rds = x*x + y*y;
	}
	while (rds == 0 || rds > 1)

	c = Math.sqrt(-2*Math.log(rds)*v/rds);

	return [x*c, y*c];
}
