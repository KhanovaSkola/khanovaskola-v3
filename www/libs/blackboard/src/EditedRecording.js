import {Recording} from "./Recording";

export class EditedRecording extends Recording {
	constructor(width, height) {
		super();
		this.width = width;
		this.height = height;

		this.data = [];
	}

	moveCursor(time, coords) {
		this.data.push({
			time: time,
			type: 'cursor',
			loc: coords,
		});
	}

	beginStroke(time, coords) {
		this.data.push({
			time: time,
			type: 'beginStroke',
			loc: coords,
		});
	}

	strokeTo(time, coords, width, color) {
		this.data.push({
			time: time,
			type: 'strokeTo',
			loc: coords,
			width: width,
			color: color,
		});
	}

	placeSvg(time, coords, data) {
		this.data.push({
			time: time,
			type: 'svg',
			loc: coords,
			data: data,
		});
	}

	translate(time, offset) {
		this.data.push({
			time: time,
			type: 'translate',
			loc: offset,
		});
	}

	getData() {
		return this.data;
	}
}
