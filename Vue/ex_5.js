function ex5() {
	arrA
		.filter((x) => !arrB.includes(x))
		.concat(arrB.filter((x) => !arrA.includes(x)));
}
