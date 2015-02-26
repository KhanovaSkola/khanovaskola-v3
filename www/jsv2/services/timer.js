define({
	create: () => {
		const then = (new Date).getTime();
		return () => {
			return (new Date).getTime() - then;
		}
	}
});
