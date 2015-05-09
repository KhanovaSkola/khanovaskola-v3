import {Coords} from './Coords';
import {Mic} from './Mic';

export class Recorder {
	constructor($container, $time, $onair, recording, penApi, colors, workerPath, onSave) {
		this.size = {width: 800, height: 450}; //1920/1080 ratio

		const expands = {width: 2, height: 3};

		this.ctx = this.createCanvas(this.size.width * expands.width, this.size.height * expands.height);
		this.offsetMax = {
			x: this.size.width * (expands.width - 1),
			y: this.size.height * (expands.height - 1),
		};
		this.scr = this.createCanvas(this.size.width, this.size.height);
        $container.appendChild(this.scr.canvas);

		this.$time = $time;
		this.$onair = $onair;
		this.penApi = penApi;
		this.time = 0;
		this.paused = true;
		this.firstDrawEvent = true;
		this.lastCursor = null;
		this.color = {r: 255, g: 100, b: 150};
		this.mic = new Mic(workerPath);
		this.coords = new Coords(this.ratio, this.scr.canvas.getBoundingClientRect());
		this.onSave = onSave;

		this.recording = recording;
		this.recording.translate(this.time, this.coords.offset.screen);

		const box = this.scr.canvas.getBoundingClientRect();
        this.offset = {x: box.left, y: box.top};

        this.scr.canvas.addEventListener('mousemove', this.onMouseMove.bind(this));
        this.scr.canvas.addEventListener('mousedown', this.onMouseDown.bind(this));
        this.scr.canvas.addEventListener('mouseup', this.onMouseUp.bind(this));
        this.scr.canvas.addEventListener('contextmenu', this.onMouseDown.bind(this), false);

		this.changeColor(colors[0]);

        this.registerControlButtons(colors);
		this.registerKeys();
		this.registerFileDrop(this.scr.canvas);
	}

	registerControlButtons(colors) {
		for (var $input of colors) {
        	$input.addEventListener('click', this.onColorClick.bind(this));
        }

		const $save = document.getElementById('save');
		const that = this;
		$save.addEventListener('click', event => {
			const rec = {
				data: that.recording.getData(),
				size: that.size,
				duration: that.time,
				meta: {
					pointerType: that.penApi ? that.penApi.pointerType : "unknown",
					tabletModel: that.penApi ? that.penApi.tabletModel : "unknown",
					agent: navigator.userAgent,
				}
			};

			const data = JSON.stringify(rec);
			this.mic.stop(audio => {
				that.onSave(data, audio);
			});
		});
	}

	registerFileDrop($el) {
		const handleFileSelect = function(event) {
			event.stopPropagation();
			event.preventDefault();

			const files = event.dataTransfer.files;
			if (files.length != 1) {
				return false;
			}
			const file = files[0];
			if (file.type !== "image/svg+xml") {
				return false;
			}

			const dropPosition = this.coords.eventToLayer(event);
			const reader = new FileReader();
			const that = this;
			reader.onload = function(e) {
				const img = new Image();
				img.src = e.target.result;

				const movedDrop = {
					// img sizes are also both multiplied and divided by ratio here
					x: dropPosition.x - img.width / 2,
					y: dropPosition.y - img.height / 2,
				};
				const coords = that.coords.layerToCanvas(movedDrop);
				that.ctx.drawImage(img, coords.x, coords.y,
					img.width * that.ratio, img.height * that.ratio);
				that.recording.placeSvg(that.time, movedDrop, img.src);
				that.redraw();
			};
			reader.readAsDataURL(file);
		};

		const handleDragOver = function(event) {
			event.stopPropagation();
			event.preventDefault();
		    event.dataTransfer.dropEffect = 'copy';
		};

		$el.addEventListener('dragover', handleDragOver.bind(this), false);
		$el.addEventListener('drop', handleFileSelect.bind(this), false);
	}

	registerKey(code, cb) {
		document.addEventListener('keydown', event => {
			if (event.target.tagName === 'INPUT') {
				return;
			}
			if (event.keyCode !== code) {
				return;
			}

			cb(event);
			event.preventDefault();
		});
	}

	registerKeys() {
		// space
		this.registerKey(32, event => {
			if (this.paused) {
				this.paused = false;
				this.$onair.textContent = 'recording';
				requestAnimationFrame(this.tick.bind(this));
				this.mic.record();

			} else {
				this.mic.pause();
				this.$onair.textContent = '';
				this.paused = true;
			}
		});
	}

	tick(timestamp) {
		this.$time.textContent = (this.time / 1000).toFixed(2);

		if (!this.paused) {
			const last = timestamp;
			requestAnimationFrame(timestamp => {
				this.time += timestamp - last;
				this.tick(timestamp);
			});
		}
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
        const oldWidth = $canvas.width;
        const oldHeight = $canvas.height;

        $canvas.width = oldWidth * ratio;
        $canvas.height = oldHeight * ratio;

        $canvas.style.width = oldWidth + 'px';
        $canvas.style.height = oldHeight + 'px';
	}

	onColorClick(event) {
		this.changeColor(event.target);
	}

	changeColor(target) {
		const arr = JSON.parse(target.dataset.color);
		this.color = {r: arr[0], g: arr[1], b: arr[2]};
		if (this.lastColor) {
			this.lastColor.classList.remove('active');
		}
		target.classList.add('active');
		this.lastColor = target;
	}

	mouseButton(event) {
		return "event" in window && "buttons" in window.event
			? window.event.buttons // Internet Explorer
			: ("buttons" in event
				? event.buttons // Firefox
				: event.which // Chrome
			);
	}

	setTranslationBase(event) {
		this.translationBase = {
			x: this.coords.offset.screen.x + event.pageX,
			y: this.coords.offset.screen.y + event.pageY,
		};
	}

	onMouseDown(event) {
		const button = this.mouseButton(event);
		if (button == 2) {
			event.stopPropagation();
			event.preventDefault();
			this.setTranslationBase(event);
		}

		const layerCoords = this.coords.eventToLayer(event);
		this.lastCursor = layerCoords;
		this.lastOnscreen = this.coords.layerToCanvas(layerCoords);
	}

	onMouseUp(event) {
		this.translationBase = null;
	}

	onMouseMove(event) {
		if (this.paused) {
			return;
		}

		const cursor = this.coords.eventToLayer(event);
		const button = this.mouseButton(event);
		if (button == 2) {
			if (!this.translationBase) {
				this.setTranslationBase(event);
				return;
			}
			const offset = {
				x: Math.min(this.offsetMax.x, Math.max(0, this.translationBase.x - event.pageX)),
				y: Math.min(this.offsetMax.y, Math.max(0, this.translationBase.y - event.pageY)),
			};
			this.coords.offset.screen = offset;
			this.recording.translate(this.time, offset);

		} else if (button == 1) {
			const onscreen = this.coords.layerToCanvas(cursor);
			if (this.firstDrawEvent) {
				this.firstDrawEvent = false;
				this.recording.beginStroke(this.time, cursor);
				this.ctx.moveTo(onscreen.x, onscreen.y);

			} else {
				const baseline = 1;
				const width = this.penApi ? (1 + 4 * this.penApi.pressure) * baseline : baseline * 3;
				this.recording.strokeTo(this.time, cursor, width, this.color);

				this.ctx.beginPath();
				if (this.lastOnscreen) {
					this.ctx.moveTo(this.lastOnscreen.x, this.lastOnscreen.y);
				}
				this.ctx.lineWidth = width;
				this.ctx.strokeStyle = `rgb(${this.color.r}, ${this.color.g}, ${this.color.b})`;
				this.ctx.lineTo(onscreen.x, onscreen.y);
				this.ctx.stroke();
				this.lastOnscreen = onscreen;
			}

		} else {
			this.firstDrawEvent = true;
			this.recording.moveCursor(this.time, cursor);
			this.lastOnscreen = null;
		}

		this.redraw();
	}

	redraw() {
		this.scr.clearAll();
		const can = this.ctx.canvas;
		const scrcan = this.scr.canvas;
		const offset = this.coords.layerToCanvas(this.coords.offset.screen);
		this.scr.drawImage(can,
			offset.x, offset.y,
			scrcan.width, scrcan.height,
			0, 0,
			scrcan.width, scrcan.height
		);
	}

}
