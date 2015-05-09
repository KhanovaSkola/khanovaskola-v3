import {Track} from "./Track";

/**
 * Works with three canvases:
 * - offscreen double buffer canvas that is never translated
 * - offscreen canvas that renders cursor
 * - onscreen canvas that is redrawn from buffer and handles translations
 *
 *
 * ctx canvas context stroke buffer
 * cur canvas context cursor buffer
 * scr canvas context onscreen
 */
export class Blackboard extends Track {
	// @property ctx double buffer canvas context
	// @property scr screen strokes canvas context
	// @property cur screen cursor canvas context
	// @property time DOMHighResTimeStamp
	// @property since DOMHighResTimeStamp
	// @property redraw bool
	// @property drawNext bool
	// @property offset {x: int, y: int}
	// @property ratio float
	// @property sound Sound
	// @property moveTo null|{x: int, y: int}

	constructor($container, size) {
		super();
        this.ctx = this.createCanvas(size.width * 2, size.height * 3);
        this.cur = this.createCanvas(size.width, size.height);
        this.scr = this.createCanvas(size.width, size.height);
        $container.appendChild(this.scr.canvas);

        this.redraw = false;
        this.offset = {x: 0, y: 0};
		this.offsetCenter = null;

        this.time = 0;
		this.since = 0;
		this.moveTo = null;

        this.scr.canvas.addEventListener('mousedown',
        	this.onBoardMouseDown.bind(this));
        this.scr.canvas.addEventListener('mouseup',
        	this.onBoardMouseUp.bind(this));
	}

	createCanvas(width, height) {
		const $canvas = document.createElement('canvas');
		$canvas.width = width;
        $canvas.height = height;

        if (!this.ratio) {
        	this.ratio = this.getRatio($canvas);
        }
        this.scaleCanvas($canvas, this.ratio);

        const ctx = $canvas.getContext('2d');
        ctx.clearAll = function() {
        	ctx.clearRect(0, 0, $canvas.width, $canvas.height);
        };
        return ctx;
	}

	getRatio($canvas) {
		const context = $canvas.getContext('2d');
		const devicePixelRatio = window.devicePixelRatio || 1;
        const backingStoreRatio = context.webkitBackingStorePixelRatio
        	|| context.mozBackingStorePixelRatio
            || context.msBackingStorePixelRatio
            || context.oBackingStorePixelRatio
            || context.backingStorePixelRatio
            || 1;

        return devicePixelRatio / backingStoreRatio;
	}

	scaleCanvas($canvas, ratio) {
        var oldWidth = $canvas.width;
        var oldHeight = $canvas.height;

        $canvas.width = oldWidth * ratio;
        $canvas.height = oldHeight * ratio;

        $canvas.style.width = oldWidth + 'px';
        $canvas.style.height = oldHeight + 'px';
	}

	play() {
		this.ctx.lineCap = "round";
		this.ctx.lineJoin = "round";

		this.cur.lineWidth = 4;
		this.cur.lineCap = "square";
		this.cur.lineJoin = "square";
		this.cur.strokeStyle = "rgb(255, 0, 0)";

		this.drawNext = true;
		this.requestFrame();
	}

	requestFrame() {
		this.redraw = true;

		if (this.offsetCenter === null) {
			this.offsetCenter = {
				x: this.ratio * ((this.scr.canvas.width / this.ratio - this.recording.size.width) / 2),
				y: this.ratio * ((this.scr.canvas.height / this.ratio - this.recording.size.height) / 2),
			};
		}

		this.ctx.clearAll();
		requestAnimationFrame(timestamp => {
			this.frame(timestamp);
		});
	}

	redrawFrameIfPaused() {
		if (!this.drawNext) {
			this.requestFrame();
		}
	}

	pause() {
		this.drawNext = false;
	}

	frame(timestamp) {
		const data = this.recording.data;
		const redrawing = this.redraw;

		var ignoreJoin = redrawing; // treat first stroke as not join

		// draw last cursor position
		const dataLen = data.length;
		for (var i = dataLen - 1; i >= 0; --i) {
			const stroke = data[i];
			if (stroke.time > this.time) {
				continue;
			}

			this.cur.clearAll();
			this.cur.beginPath();
			const size = 4;

			this.cur.moveTo(this.ratio * (stroke.loc.x - size), this.ratio * (stroke.loc.y - size));
			this.cur.lineTo(this.ratio * (stroke.loc.x + size), this.ratio * (stroke.loc.y + size));
			this.cur.moveTo(this.ratio * (stroke.loc.x + size), this.ratio * (stroke.loc.y - size));
			this.cur.lineTo(this.ratio * (stroke.loc.x - size), this.ratio * (stroke.loc.y + size));
			this.cur.stroke();
			break;
		}

		// draw new paths
		for (var i = 0; i < dataLen; ++i) {
			const stroke = data[i];
			if (!redrawing && stroke.time <= this.since) {
				continue;
			}
			if (stroke.time > this.time) {
				break;
			}

			if (stroke.type === "translate") {
				this.offset = {
					x: this.ratio * stroke.loc.x,
					y: this.ratio * stroke.loc.y,
				};

			} else if (stroke.type === "svg") {
				const img = new Image();
				img.src = stroke.data;
				this.ctx.drawImage(img, this.ratio * stroke.loc.x, this.ratio * stroke.loc.y,
					this.ratio * img.width, this.ratio * img.height);

			} else if (ignoreJoin || stroke.type === "beginStroke") {
				ignoreJoin = false;
				this.moveTo = stroke.loc;

			} else if (stroke.type === "strokeTo") {
				this.ctx.lineWidth = stroke.width;
				this.ctx.beginPath();
				this.ctx.moveTo(this.ratio * this.moveTo.x, this.ratio * this.moveTo.y);
				this.ctx.strokeStyle = `rgb(${stroke.color.r}, ${stroke.color.g}, ${stroke.color.b})`;
				this.ctx.lineTo(this.ratio * stroke.loc.x, this.ratio * stroke.loc.y);
				this.ctx.stroke();
				this.moveTo = stroke.loc;
			}
		}

		if (redrawing) {
			this.redraw = false;
		}

		this.scr.clearAll();
		const scrcan = this.scr.canvas;
		this.scr.drawImage(this.ctx.canvas,
			this.offset.x - this.offsetCenter.x, this.offset.y - this.offsetCenter.y,
			scrcan.width, scrcan.height,
			0, 0,
			scrcan.width, scrcan.height
		);

		// TODO measure performance of this vs another double buffer
		this.scr.drawImage(this.cur.canvas,
			this.offset.x - this.offsetCenter.x, this.offset.y - this.offsetCenter.y,
			scrcan.width, scrcan.height,
			0, 0,
			scrcan.width, scrcan.height
		);

		if (this.drawNext && this.time < this.recording.duration) {
			const last = timestamp;
			requestAnimationFrame(timestamp => {
				const delta = timestamp - last;
				this.since = this.time;
				this.time += delta;
				this.frame(timestamp);
			});
		}
	}

	seek(percent) {
		this.ctx.clearAll();
		this.cur.clearAll();
		this.redraw = true;

		this.time = percent * this.recording.duration;

		this.redrawFrameIfPaused();
	}

	onBoardMouseDown(event) {
		const handler = this.onBoardMouseMove.bind(this);
		this.scr.canvas.addEventListener('mousemove', handler);
		this.removeMoveEventListener = function() {
			this.scr.canvas.removeEventListener('mousemove', handler);
		};

		this.mouse = {x: event.pageX, y: event.pageY};
		this.offsetOld = this.offset;
	}

	onBoardMouseMove(event) {
		const delta = {x: this.mouse.x - event.pageX, y: this.mouse.y - event.pageY};
		this.offset = {
			x: this.ratio * (this.offsetOld.x + delta.x),
			y: this.ratio * (this.offsetOld.y + delta.y),
		};

		this.redrawFrameIfPaused();
	}

	onBoardMouseUp(event) {
		this.removeMoveEventListener();
	}

}
