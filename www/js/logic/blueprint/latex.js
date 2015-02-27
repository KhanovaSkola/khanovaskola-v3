define(['mathjax'], function() {
	MathJax.Hub.Config({
		extensions: ["tex2jax.js"],
		jax: ["input/TeX", "output/HTML-CSS"],
		TeX: {
			extensions: ["color.js", "mhchem.js"]
		},
		messageStyle: "none",
		tex2jax: {
			inlineMath: [['$','$'], ["\\(","\\)"]],
			displayMath: [['$$','$$'], ["\\[","\\]"]],
			processEscapes: true
		},
		"HTML-CSS": { availableFonts: ["TeX"] }
	});

	return {
		render: () => {
			MathJax.Hub.Typeset();
		}
	};
});
