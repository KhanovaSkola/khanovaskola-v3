import {Recording} from "./Recording";

export class RandomRecording extends Recording {
	constructor(width, height) {
		super();
		this.width = width;
		this.height = height;
	}

	getSoundPath() {
		return "../media/demo.wav";
	}

	getData() {
		if (!this.data) {
			this.data = this.computeData();
		}
		return this.data;
	}

	getDuration() {
		return this.getData().slice(-1)[0].time;
	}

	computeData() {
		// must be ordered by time asc
		var lines = [];
		var last = {x: 500, y: 500};
		var direction = 0; //rads
		var width = 5;
		var color = {r: 150, g: 150, b: 150};

		const dist = 20;
		var sqlength = 0; // squared length of current path

		for (var i = 0; i < 3411; i++) {
			const join =
				(last.x > 0 && last.x < this.width) &&
				(last.y > 0 && last.y < this.height) &&
				sqlength < 80**2;
			var x, y;

			if (join) {
				direction += (Math.random() * 2 - 1) * Math.PI / 8;
				const r = Math.random();
				x = last.x + Math.sin(direction) * dist * r;
				y = last.y + Math.cos(direction) * dist * r;
				sqlength += (last.x - x) * (last.x - x);
				sqlength += (last.y - y) * (last.y - y);

			} else {
				sqlength = 0;
				direction += Math.random() * 2 * Math.PI;
				x = Math.random() * 1000;
				y = Math.random() * 1000;
			}

			const angle = 0.2 * i ** 0.8;
			const mouse = {
				x: (1 + angle/5) * Math.cos(angle) * 10 + 400,
				y: (1 + angle/5) * Math.sin(angle) * 10 + 200,
			}

			const r = Math.random() * 2 - 1;
			width = Math.min(Math.max(width + r, 1), 10);

			if (join) {
				const change = 20;
				color.r = Math.min(255, Math.max(0, Math.round(color.r + Math.random() * change - change / 2)));
				color.g = Math.min(255, Math.max(0, Math.round(color.g + Math.random() * change - change / 2)));
				color.b = Math.min(255, Math.max(0, Math.round(color.b + Math.random() * change - change / 2)));

			} else {
				color = {
					r: Math.round(Math.random() * 255),
					g: Math.round(Math.random() * 255),
					b: Math.round(Math.random() * 255),
				};
			}

			lines.push({
				time: i * 10,
				join: join,
				width: width,
				color: {r: color.r, g: color.g, b: color.b}, // pass as values
				loc: {x: x, y: y},
				mouse: mouse,
			});

			last.x = x;
			last.y = y;
		}
		return lines;
	}
}
