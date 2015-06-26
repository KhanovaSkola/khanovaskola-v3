(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
"use strict";

var _Recorder = require("./src/Recorder");

var _EditedRecording = require("./src/EditedRecording");

define("lib/blackboard/recorder", function () {
	return function (opts) {
		var penApi = document.getElementById("wtPlugin").penAPI;

		var colors = opts.colors;
		var _iteratorNormalCompletion = true;
		var _didIteratorError = false;
		var _iteratorError = undefined;

		try {
			for (var _iterator = colors[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
				var $input = _step.value;

				var c = JSON.parse($input.dataset.color);
				$input.style.backgroundColor = "rgb(" + c[0] + ", " + c[1] + ", " + c[2] + ")";
			}
		} catch (err) {
			_didIteratorError = true;
			_iteratorError = err;
		} finally {
			try {
				if (!_iteratorNormalCompletion && _iterator["return"]) {
					_iterator["return"]();
				}
			} finally {
				if (_didIteratorError) {
					throw _iteratorError;
				}
			}
		}

		var recording = new _EditedRecording.EditedRecording();
		return new _Recorder.Recorder(opts.$canvas, opts.$time, opts.$onair, recording, penApi, colors, opts.workerPath, opts.onSave, opts.$eraser);
	};
});

},{"./src/EditedRecording":3,"./src/Recorder":5}],2:[function(require,module,exports){
"use strict";

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, "__esModule", {
	value: true
});
/**
 * There are four types of coordinates.
 *
 * First type is the raw *event* coordinate from
 * mouse events. It must never be used in the app
 * directly as there is no relation to the canvas.
 *
 * Second type is the *layer* coordinate. This is
 * the one that should be passed between components
 * and saved in the recording as it corrects for all
 * offsets and translation.
 *
 * Thirds type is the *canvas* coordinate. It contains
 * retina ratio correction.
 */

var Coords = (function () {
	function Coords(ratio, layerOffset) {
		_classCallCheck(this, Coords);

		this.ratio = ratio;
		this.offset = {
			layer: {
				x: layerOffset.left + window.scrollX,
				y: layerOffset.top + window.scrollY },
			screen: { x: 0, y: 0 } };
	}

	_createClass(Coords, [{
		key: "eventToLayer",
		value: function eventToLayer(event) {
			return {
				x: event.pageX - this.offset.layer.x + this.offset.screen.x,
				y: event.pageY - this.offset.layer.y + this.offset.screen.y };
		}
	}, {
		key: "layerToCanvas",
		value: function layerToCanvas(coord) {
			return {
				x: this.ratio * coord.x,
				y: this.ratio * coord.y };
		}
	}]);

	return Coords;
})();

exports.Coords = Coords;

},{}],3:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

var _get = function get(object, property, receiver) { var desc = Object.getOwnPropertyDescriptor(object, property); if (desc === undefined) { var parent = Object.getPrototypeOf(object); if (parent === null) { return undefined; } else { return get(parent, property, receiver); } } else if ('value' in desc) { return desc.value; } else { var getter = desc.get; if (getter === undefined) { return undefined; } return getter.call(receiver); } };

var _inherits = function (subClass, superClass) { if (typeof superClass !== 'function' && superClass !== null) { throw new TypeError('Super expression must either be null or a function, not ' + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) subClass.__proto__ = superClass; };

Object.defineProperty(exports, '__esModule', {
	value: true
});

var _Recording2 = require('./Recording');

var EditedRecording = (function (_Recording) {
	function EditedRecording(width, height) {
		_classCallCheck(this, EditedRecording);

		_get(Object.getPrototypeOf(EditedRecording.prototype), 'constructor', this).call(this);
		this.width = width;
		this.height = height;

		this.data = [];
	}

	_inherits(EditedRecording, _Recording);

	_createClass(EditedRecording, [{
		key: 'moveCursor',
		value: function moveCursor(time, coords) {
			this.data.push({
				time: time,
				type: 'cursor',
				loc: coords });
		}
	}, {
		key: 'erase',
		value: function erase(time, coords, radius) {
			this.data.push({
				time: time,
				type: 'erase',
				loc: coords,
				radius: radius });
		}
	}, {
		key: 'beginStroke',
		value: function beginStroke(time, coords) {
			this.data.push({
				time: time,
				type: 'beginStroke',
				loc: coords });
		}
	}, {
		key: 'strokeTo',
		value: function strokeTo(time, coords, width, color) {
			this.data.push({
				time: time,
				type: 'strokeTo',
				loc: coords,
				width: width,
				color: color });
		}
	}, {
		key: 'placeSvg',
		value: function placeSvg(time, coords, data) {
			this.data.push({
				time: time,
				type: 'svg',
				loc: coords,
				data: data });
		}
	}, {
		key: 'translate',
		value: function translate(time, offset) {
			this.data.push({
				time: time,
				type: 'translate',
				loc: offset });
		}
	}, {
		key: 'getData',
		value: function getData() {
			return this.data;
		}
	}]);

	return EditedRecording;
})(_Recording2.Recording);

exports.EditedRecording = EditedRecording;

},{"./Recording":6}],4:[function(require,module,exports){
"use strict";

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, "__esModule", {
	value: true
});

var _Recorderjs = require("../vendor/Recorder");

var Mic = (function () {
	function Mic(workerPath) {
		var _this = this;

		_classCallCheck(this, Mic);

		var nav = window.navigator;
		nav.getUserMedia = nav.getUserMedia || nav.webkitGetUserMedia || nav.mozGetUserMedia || nav.msGetUserMedia;
		this.navigator = nav;

		var AudioContext = window.AudioContext || window.webkitAudioContext;
		this.context = new AudioContext();

		this.navigator.getUserMedia({
			audio: true
		}, function (localMediaStream) {
			_this.mediaStream = localMediaStream;

			var mediaStreamSource = _this.context.createMediaStreamSource(localMediaStream);
			_this.rec = new _Recorderjs.Recorderjs(mediaStreamSource, {
				workerPath: workerPath });
		}, function (err) {
			console.log("Browser not supported");
		});
	}

	_createClass(Mic, [{
		key: "record",
		value: function record() {
			this.rec.record();
		}
	}, {
		key: "pause",
		value: function pause() {
			this.rec.stop();
		}
	}, {
		key: "stop",
		value: function stop(cb) {
			this.pause();

			this.mediaStream.stop();
			this.rec.exportWAV(function (e) {
				cb(e);
				//this.rec.clear();
				// Recorderjs.forceDownload(e, "filename.wav");
			});
		}
	}]);

	return Mic;
})();

exports.Mic = Mic;

},{"../vendor/Recorder":7}],5:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, '__esModule', {
	value: true
});

var _Coords = require('./Coords');

var _Mic = require('./Mic');

var Recorder = (function () {
	function Recorder($container, $time, $onair, recording, penApi, colors, workerPath, onSave, $eraser) {
		_classCallCheck(this, Recorder);

		this.size = { width: 800, height: 450 }; //1920/1080 ratio

		var expands = { width: 2, height: 3 };

		this.ctx = this.createCanvas(this.size.width * expands.width, this.size.height * expands.height);
		this.offsetMax = {
			x: this.size.width * (expands.width - 1),
			y: this.size.height * (expands.height - 1) };
		this.scr = this.createCanvas(this.size.width, this.size.height);
		$container.appendChild(this.scr.canvas);

		this.$time = $time;
		this.$onair = $onair;
		this.penApi = penApi;
		this.time = 0;
		this.paused = true;
		this.firstDrawEvent = true;
		this.lastCursor = null;
		this.color = { r: 255, g: 100, b: 150 };
		this.mic = new _Mic.Mic(workerPath);
		this.coords = new _Coords.Coords(this.ratio, this.scr.canvas.getBoundingClientRect());
		this.onSave = onSave;
		this.eraserMode = false;
		this.coords.offset.screen = {
			x: this.size.width / 2, // intentionally not 0 leaving a little bit author to slide
			y: this.size.height / 2 };

		this.recording = recording;
		this.recording.translate(this.time, this.coords.offset.screen);

		this.scr.canvas.addEventListener('mousemove', this.onMouseMove.bind(this));
		this.scr.canvas.addEventListener('mousedown', this.onMouseDown.bind(this));
		this.scr.canvas.addEventListener('mouseup', this.onMouseUp.bind(this));
		this.scr.canvas.addEventListener('contextmenu', this.onMouseDown.bind(this), false);

		this.changeColor(colors[0]);

		this.registerEraser($eraser);
		this.registerControlButtons(colors);
		this.registerKeys();
		this.registerFileDrop(this.scr.canvas);
	}

	_createClass(Recorder, [{
		key: 'registerEraser',
		value: function registerEraser($eraser) {
			var cb = function cb(event) {
				this.eraserMode = true;
				this.scr.canvas.classList.add('eraser');
			};
			$eraser.addEventListener('click', cb.bind(this));
		}
	}, {
		key: 'registerControlButtons',
		value: function registerControlButtons(colors) {
			var _this = this;

			var _iteratorNormalCompletion = true;
			var _didIteratorError = false;
			var _iteratorError = undefined;

			try {
				for (var _iterator = colors[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
					var $input = _step.value;

					$input.addEventListener('click', this.onColorClick.bind(this));
				}
			} catch (err) {
				_didIteratorError = true;
				_iteratorError = err;
			} finally {
				try {
					if (!_iteratorNormalCompletion && _iterator['return']) {
						_iterator['return']();
					}
				} finally {
					if (_didIteratorError) {
						throw _iteratorError;
					}
				}
			}

			var $save = document.getElementById('save');
			var that = this;
			$save.addEventListener('click', function (event) {
				var rec = {
					data: that.recording.getData(),
					size: that.size,
					duration: that.time,
					meta: {
						pointerType: that.penApi ? that.penApi.pointerType : 'unknown',
						tabletModel: that.penApi ? that.penApi.tabletModel : 'unknown',
						agent: navigator.userAgent }
				};

				var data = JSON.stringify(rec);
				_this.mic.stop(function (audio) {
					that.onSave(data, audio);
				});
			});
		}
	}, {
		key: 'registerFileDrop',
		value: function registerFileDrop($el) {
			var handleFileSelect = function handleFileSelect(event) {
				event.stopPropagation();
				event.preventDefault();

				var files = event.dataTransfer.files;
				if (files.length != 1) {
					return false;
				}
				var file = files[0];

				var dropPosition = this.coords.eventToLayer(event);
				var reader = new FileReader();
				var that = this;
				reader.onload = function (e) {
					try {
						(function () {
							var img = new Image();
							img.onload = function (event) {
								var movedDrop = {
									// img sizes are also both multiplied and divided by ratio here
									x: dropPosition.x - img.width / 2,
									y: dropPosition.y - img.height / 2 };
								var coords = that.coords.layerToCanvas(movedDrop);
								that.ctx.drawImage(img, coords.x, coords.y, img.naturalWidth * that.ratio, img.naturalHeight * that.ratio);
								that.recording.placeSvg(that.time, movedDrop, img.src);
								that.redraw();
							};
							img.src = e.target.result;
						})();
					} catch (e) {}
				};
				reader.readAsDataURL(file);
			};

			var handleDragOver = function handleDragOver(event) {
				event.stopPropagation();
				event.preventDefault();
				event.dataTransfer.dropEffect = 'copy';
			};

			$el.addEventListener('dragover', handleDragOver.bind(this), false);
			$el.addEventListener('drop', handleFileSelect.bind(this), false);
		}
	}, {
		key: 'registerKey',
		value: function registerKey(code, cb) {
			document.addEventListener('keydown', function (event) {
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
	}, {
		key: 'registerKeys',
		value: function registerKeys() {
			var _this2 = this;

			// space
			this.registerKey(32, function (event) {
				if (_this2.paused) {
					_this2.paused = false;
					_this2.$onair.textContent = 'recording';
					requestAnimationFrame(_this2.tick.bind(_this2));
					_this2.mic.record();
				} else {
					_this2.mic.pause();
					_this2.$onair.textContent = '';
					_this2.paused = true;
				}
			});
		}
	}, {
		key: 'tick',
		value: function tick(timestamp) {
			var _this3 = this;

			this.$time.textContent = (this.time / 1000).toFixed(2);

			if (!this.paused) {
				(function () {
					var last = timestamp;
					requestAnimationFrame(function (timestamp) {
						_this3.time += timestamp - last;
						_this3.tick(timestamp);
					});
				})();
			}
		}
	}, {
		key: 'createCanvas',
		value: function createCanvas(width, height) {
			var $canvas = document.createElement('canvas');
			$canvas.width = width;
			$canvas.height = height;

			if (!this.ratio) {
				this.ratio = this.getRatio($canvas);
			}
			this.scaleCanvas($canvas, this.ratio);

			var ctx = $canvas.getContext('2d');
			ctx.clearAll = function () {
				ctx.clearRect(0, 0, $canvas.width, $canvas.height);
			};
			return ctx;
		}
	}, {
		key: 'getRatio',
		value: function getRatio($canvas) {
			var context = $canvas.getContext('2d');
			var devicePixelRatio = window.devicePixelRatio || 1;
			var backingStoreRatio = context.webkitBackingStorePixelRatio || context.mozBackingStorePixelRatio || context.msBackingStorePixelRatio || context.oBackingStorePixelRatio || context.backingStorePixelRatio || 1;

			return devicePixelRatio / backingStoreRatio;
		}
	}, {
		key: 'scaleCanvas',
		value: function scaleCanvas($canvas, ratio) {
			var oldWidth = $canvas.width;
			var oldHeight = $canvas.height;

			$canvas.width = oldWidth * ratio;
			$canvas.height = oldHeight * ratio;

			$canvas.style.width = oldWidth + 'px';
			$canvas.style.height = oldHeight + 'px';
		}
	}, {
		key: 'onColorClick',
		value: function onColorClick(event) {
			if (event.target.id !== 'eraser') {
				this.eraserMode = false;
				this.scr.canvas.classList.remove('eraser');
			}

			this.changeColor(event.target);
		}
	}, {
		key: 'changeColor',
		value: function changeColor(target) {
			var arr = JSON.parse(target.dataset.color);

			if (target.id !== 'eraser') {
				this.color = { r: arr[0], g: arr[1], b: arr[2] };
			}

			if (this.lastColor) {
				this.lastColor.classList.remove('active');
			}
			target.classList.add('active');
			this.lastColor = target;
		}
	}, {
		key: 'mouseButton',
		value: function mouseButton(event) {
			return 'event' in window && 'buttons' in window.event ? window.event.buttons // Internet Explorer
			: 'buttons' in event ? event.buttons // Firefox
			: event.which // Chrome
			;
		}
	}, {
		key: 'setTranslationBase',
		value: function setTranslationBase(event) {
			this.translationBase = {
				x: this.coords.offset.screen.x + event.pageX,
				y: this.coords.offset.screen.y + event.pageY };
		}
	}, {
		key: 'onMouseDown',
		value: function onMouseDown(event) {
			var button = this.mouseButton(event);
			if (button == 2) {
				event.stopPropagation();
				event.preventDefault();
				this.setTranslationBase(event);
			}

			var layerCoords = this.coords.eventToLayer(event);
			this.lastCursor = layerCoords;
			this.lastOnscreen = this.coords.layerToCanvas(layerCoords);
		}
	}, {
		key: 'onMouseUp',
		value: function onMouseUp(event) {
			this.translationBase = null;
		}
	}, {
		key: 'onMouseMove',
		value: function onMouseMove(event) {
			if (this.paused) {
				return;
			}

			var cursor = this.coords.eventToLayer(event);
			var button = this.mouseButton(event);
			if (button == 2) {
				if (!this.translationBase) {
					this.setTranslationBase(event);
					return;
				}
				var offset = {
					x: Math.min(this.offsetMax.x, Math.max(0, this.translationBase.x - event.pageX)),
					y: Math.min(this.offsetMax.y, Math.max(0, this.translationBase.y - event.pageY)) };
				this.coords.offset.screen = offset;
				this.recording.translate(this.time, offset);
			} else if (button == 1) {
				var onscreen = this.coords.layerToCanvas(cursor);
				if (this.eraserMode) {
					var radius = 11 * this.ratio;
					this.recording.erase(this.time, cursor, radius);

					var canvas = this.ctx.canvas;
					this.ctx.save();
					this.ctx.beginPath();
					this.ctx.arc(onscreen.x, onscreen.y, radius, 0, Math.PI * 2, true);
					this.ctx.clip();
					this.ctx.clearRect(0, 0, canvas.width, canvas.height);
					this.ctx.restore();
				} else if (this.firstDrawEvent) {
					this.firstDrawEvent = false;
					this.recording.beginStroke(this.time, cursor);
					this.ctx.moveTo(onscreen.x, onscreen.y);
				} else {
					var baseline = 1;
					var width = this.penApi ? (1 + 4 * this.penApi.pressure) * baseline : baseline * 3;
					this.recording.strokeTo(this.time, cursor, width, this.color);

					this.ctx.beginPath();
					if (this.lastOnscreen) {
						this.ctx.moveTo(this.lastOnscreen.x, this.lastOnscreen.y);
					}
					this.ctx.lineWidth = width;
					this.ctx.strokeStyle = 'rgb(' + this.color.r + ', ' + this.color.g + ', ' + this.color.b + ')';
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
	}, {
		key: 'redraw',
		value: function redraw() {
			this.scr.clearAll();
			var can = this.ctx.canvas;
			var scrcan = this.scr.canvas;
			var offset = this.coords.layerToCanvas(this.coords.offset.screen);
			this.scr.drawImage(can, offset.x, offset.y, scrcan.width, scrcan.height, 0, 0, scrcan.width, scrcan.height);
		}
	}]);

	return Recorder;
})();

exports.Recorder = Recorder;

// supplied file was probably not a supported image

},{"./Coords":2,"./Mic":4}],6:[function(require,module,exports){
"use strict";

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, "__esModule", {
	value: true
});

var Recording = (function () {
	function Recording() {
		_classCallCheck(this, Recording);
	}

	_createClass(Recording, [{
		key: "getData",
		value: function getData() {}
	}, {
		key: "getSoundPath",
		value: function getSoundPath() {}
	}]);

	return Recording;
})();

exports.Recording = Recording;

},{}],7:[function(require,module,exports){
'use strict';

var _classCallCheck = function (instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } };

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

Object.defineProperty(exports, '__esModule', {
  value: true
});

var Recorderjs = (function () {
  function Recorderjs(source, cfg) {
    _classCallCheck(this, Recorderjs);

    var config = cfg || {};
    var bufferLen = config.bufferLen || 4096;
    var numChannels = config.numChannels || 2;
    this.context = source.context;
    this.node = (this.context.createScriptProcessor || this.context.createJavaScriptNode).call(this.context, bufferLen, numChannels, numChannels);
    var worker = new Worker(config.workerPath || 'recorderWorker.js');
    worker.postMessage({
      command: 'init',
      config: {
        sampleRate: this.context.sampleRate,
        numChannels: numChannels
      }
    });
    var recording = false,
        currCallback;

    this.node.onaudioprocess = function (e) {
      if (!recording) return;
      var buffer = [];
      for (var channel = 0; channel < numChannels; channel++) {
        buffer.push(e.inputBuffer.getChannelData(channel));
      }
      worker.postMessage({
        command: 'record',
        buffer: buffer
      });
    };

    this.configure = function (cfg) {
      for (var prop in cfg) {
        if (cfg.hasOwnProperty(prop)) {
          config[prop] = cfg[prop];
        }
      }
    };

    this.record = function () {
      recording = true;
    };

    this.stop = function () {
      recording = false;
    };

    this.clear = function () {
      worker.postMessage({ command: 'clear' });
    };

    this.getBuffer = function (cb) {
      currCallback = cb || config.callback;
      worker.postMessage({ command: 'getBuffer' });
    };

    this.exportWAV = function (cb, type) {
      currCallback = cb || config.callback;
      type = type || config.type || 'audio/wav';
      if (!currCallback) throw new Error('Callback not set');
      worker.postMessage({
        command: 'exportWAV',
        type: type
      });
    };

    worker.onmessage = function (e) {
      var blob = e.data;
      currCallback(blob);
    };

    source.connect(this.node);
    this.node.connect(this.context.destination); //this should not be necessary
  }

  _createClass(Recorderjs, null, [{
    key: 'forceDownload',
    value: function forceDownload(blob, filename) {
      var url = (window.URL || window.webkitURL).createObjectURL(blob);
      var link = window.document.createElement('a');
      link.href = url;
      link.download = filename || 'output.wav';
      var click = document.createEvent('Event');
      click.initEvent('click', true, true);
      link.dispatchEvent(click);
    }
  }]);

  return Recorderjs;
})();

exports.Recorderjs = Recorderjs;

},{}]},{},[1])
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC9yZWNvcmRlci5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9Db29yZHMuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC9zcmMvRWRpdGVkUmVjb3JkaW5nLmpzIiwiL1VzZXJzL21pa3VsYXMvUHJvamVjdHMva2hhbm92YXNrb2xhL3d3dy9saWJzL2JsYWNrYm9hcmQvc3JjL01pYy5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9SZWNvcmRlci5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9SZWNvcmRpbmcuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC92ZW5kb3IvUmVjb3JkZXIuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7Ozt3QkNBdUIsZ0JBQWdCOzsrQkFDVCx1QkFBdUI7O0FBRXJELE1BQU0sQ0FBQyx5QkFBeUIsRUFBRSxZQUFXO0FBQzVDLFFBQU8sVUFBUyxJQUFJLEVBQUU7QUFDckIsTUFBTSxNQUFNLEdBQUcsUUFBUSxDQUFDLGNBQWMsQ0FBQyxVQUFVLENBQUMsQ0FBQyxNQUFNLENBQUM7O0FBRTFELE1BQU0sTUFBTSxHQUFHLElBQUksQ0FBQyxNQUFNLENBQUM7Ozs7OztBQUMzQix3QkFBbUIsTUFBTSw4SEFBRTtRQUFsQixNQUFNOztBQUNkLFFBQU0sQ0FBQyxHQUFH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SUFBSSxDQUFDO0FBQ2xCLGtCQUFZLENBQUMsSUFBSSxDQUFDLENBQUM7S0FDcEIsQ0FBQTs7QUFFRCxVQUFNLENBQUMsT0FBTyxDQUFDLElBQUksQ0FBQyxJQUFJLENBQUMsQ0FBQztBQUMxQixRQUFJLENBQUMsSUFBSSxDQUFDLE9BQU8sQ0FBQyxJQUFJLENBQUMsT0FBTyxDQUFDLFdBQVcsQ0FBQyxDQUFDO0dBQzdDOztlQXpFVSxVQUFVOztXQTJFRCx1QkFBQyxJQUFJLEVBQUUsUUFBUSxFQUFFO0FBQ25DLFVBQUksR0FBRyxHQUFHLENBQUMsTUFBTSxDQUFDLEdBQUcsSUFBSSxNQUFNLENBQUMsU0FBUyxDQUFBLENBQUUsZUFBZSxDQUFDLElBQUksQ0FBQyxDQUFDO0FBQ2pFLFVBQUksSUFBSSxHQUFHLE1BQU0sQ0FBQyxRQUFRLENBQUMsYUFBYSxDQUFDLEdBQUcsQ0FBQyxDQUFDO0FBQzlDLFVBQUksQ0FBQyxJQUFJLEdBQUcsR0FBRyxDQUFDO0FBQ2hCLFVBQUksQ0FBQyxRQUFRLEdBQUcsUUFBUSxJQUFJLFlBQVksQ0FBQztBQUN6QyxVQUFJLEtBQUssR0FBRyxRQUFRLENBQUMsV0FBVyxDQUFDLE9BQU8sQ0FBQyxDQUFDO0FBQzFDLFdBQUssQ0FBQyxTQUFTLENBQUMsT0FBTyxFQUFFLElBQUksRUFBRSxJQUFJLENBQUMsQ0FBQztBQUNyQyxVQUFJLENBQUMsYUFBYSxDQUFDLEtBQUssQ0FBQyxDQUFDO0tBQzNCOzs7U0FuRlUsVUFBVTs7O1FBQVYsVUFBVSxHQUFWLFVBQVUiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbiBlKHQsbixyKXtmdW5jdGlvbiBzKG8sdSl7aWYoIW5bb10pe2lmKCF0W29dKXt2YXIgYT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2lmKCF1JiZhKXJldHVybiBhKG8sITApO2lmKGkpcmV0dXJuIGkobywhMCk7dmFyIGY9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitvK1wiJ1wiKTt0aHJvdyBmLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsZn12YXIgbD1uW29dPXtleHBvcnRzOnt9fTt0W29dWzBdLmNhbGwobC5leHBvcnRzLGZ1bmN0aW9uKGUpe3ZhciBuPXRbb11bMV1bZV07cmV0dXJuIHMobj9uOmUpfSxsLGwuZXhwb3J0cyxlLHQsbixyKX1yZXR1cm4gbltvXS5leHBvcnRzfXZhciBpPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7Zm9yKHZhciBvPTA7bzxyLmxlbmd0aDtvKyspcyhyW29dKTtyZXR1cm4gc30pIiwiaW1wb3J0IHtSZWNvcmRlcn0gZnJvbSBcIi4vc3JjL1JlY29yZGVyXCI7XG5pbXBvcnQge0VkaXRlZFJlY29yZGluZ30gZnJvbSBcIi4vc3JjL0VkaXRlZFJlY29yZGluZ1wiO1xuXG5kZWZpbmUoJ2xpYi9ibGFja2JvYXJkL3JlY29yZGVyJywgZnVuY3Rpb24oKSB7XG5cdHJldHVybiBmdW5jdGlvbihvcHRzKSB7XG5cdFx0Y29uc3QgcGVuQXBpID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3d0UGx1Z2luJykucGVuQVBJO1xuXG5cdFx0Y29uc3QgY29sb3JzID0gb3B0cy5jb2xvcnM7XG5cdFx0Zm9yICh2YXIgJGlucHV0IG9mIGNvbG9ycykge1xuXHRcdFx0Y29uc3QgYyA9IEpTT04ucGFyc2UoJGlucHV0LmRhdGFzZXQuY29sb3IpO1xuXHRcdFx0JGlucHV0LnN0eWxlLmJhY2tncm91bmRDb2xvciA9IGByZ2IoJHtjWzBdfSwgJHtjWzFdfSwgJHtjWzJdfSlgO1xuXHRcdH1cblxuXHRcdGNvbnN0IHJlY29yZGluZyA9IG5ldyBFZGl0ZWRSZWNvcmRpbmcoKTtcblx0XHRyZXR1cm4gbmV3IFJlY29yZGVyKG9wdHMuJGNhbnZhcywgb3B0cy4kdGltZSwgb3B0cy4kb25haXIsXG5cdFx0XHRyZWNvcmRpbmcsIHBlbkFwaSwgY29sb3JzLCBvcHRzLndvcmtlclBhdGgsIG9wdHMub25TYXZlLCBvcHRzLiRlcmFzZXIpO1xuXHR9O1xufSk7XG4iLCIvKipcbiAqIFRoZXJlIGFyZSBmb3VyIHR5cGVzIG9mIGNvb3JkaW5hdGVzLlxuICpcbiAqIEZpcnN0IHR5cGUgaXMgdGhlIHJhdyAqZXZlbnQqIGNvb3JkaW5hdGUgZnJvbVxuICogbW91c2UgZXZlbnRzLiBJdCBtdXN0IG5ldmVyIGJlIHVzZWQgaW4gdGhlIGFwcFxuICogZGlyZWN0bHkgYXMgdGhlcmUgaXMgbm8gcmVsYXRpb24gdG8gdGhlIGNhbnZhcy5cbiAqXG4gKiBTZWNvbmQgdHlwZSBpcyB0aGUgKmxheWVyKiBjb29yZGluYXRlLiBUaGlzIGlzXG4gKiB0aGUgb25lIHRoYXQgc2hvdWxkIGJlIHBhc3NlZCBiZXR3ZWVuIGNvbXBvbmVudHNcbiAqIGFuZCBzYXZlZCBpbiB0aGUgcmVjb3JkaW5nIGFzIGl0IGNvcnJlY3RzIGZvciBhbGxcbiAqIG9mZnNldHMgYW5kIHRyYW5zbGF0aW9uLlxuICpcbiAqIFRoaXJkcyB0eXBlIGlzIHRoZSAqY2FudmFzKiBjb29yZGluYXRlLiBJdCBjb250YWluc1xuICogcmV0aW5hIHJhdGlvIGNvcnJlY3Rpb24uXG4gKi9cbmV4cG9ydCBjbGFzcyBDb29yZHMge1xuXHRjb25zdHJ1Y3RvcihyYXRpbywgbGF5ZXJPZmZzZXQpIHtcblx0XHR0aGlzLnJhdGlvID0gcmF0aW87XG5cdFx0dGhpcy5vZmZzZXQgPSB7XG5cdFx0XHRsYXllcjoge1xuXHRcdFx0XHR4OiBsYXllck9mZnNldC5sZWZ0ICsgd2luZG93LnNjcm9sbFgsXG5cdFx0XHRcdHk6IGxheWVyT2Zmc2V0LnRvcCArIHdpbmRvdy5zY3JvbGxZLFxuXHRcdFx0fSxcblx0XHRcdHNjcmVlbjoge3g6IDAsIHk6IDB9LFxuXHRcdH07XG5cdH1cblxuXHRldmVudFRvTGF5ZXIoZXZlbnQpIHtcblx0XHRyZXR1cm4ge1xuXHRcdFx0eDogZXZlbnQucGFnZVggLSB0aGlzLm9mZnNldC5sYXllci54ICsgdGhpcy5vZmZzZXQuc2NyZWVuLngsXG5cdFx0XHR5OiBldmVudC5wYWdlWSAtIHRoaXMub2Zmc2V0LmxheWVyLnkgKyB0aGlzLm9mZnNldC5zY3JlZW4ueSxcblx0XHR9XG5cdH1cblxuXHRsYXllclRvQ2FudmFzKGNvb3JkKSB7XG5cdFx0cmV0dXJuIHtcblx0XHRcdHg6IHRoaXMucmF0aW8gKiBjb29yZC54LFxuXHRcdFx0eTogdGhpcy5yYXRpbyAqIGNvb3JkLnksXG5cdFx0fTtcblx0fVxufVxuIiwiaW1wb3J0IHtSZWNvcmRpbmd9IGZyb20gXCIuL1JlY29yZGluZ1wiO1xuXG5leHBvcnQgY2xhc3MgRWRpdGVkUmVjb3JkaW5nIGV4dGVuZHMgUmVjb3JkaW5nIHtcblx0Y29uc3RydWN0b3Iod2lkdGgsIGhlaWdodCkge1xuXHRcdHN1cGVyKCk7XG5cdFx0dGhpcy53aWR0aCA9IHdpZHRoO1xuXHRcdHRoaXMuaGVpZ2h0ID0gaGVpZ2h0O1xuXG5cdFx0dGhpcy5kYXRhID0gW107XG5cdH1cblxuXHRtb3ZlQ3Vyc29yKHRpbWUsIGNvb3Jkcykge1xuXHRcdHRoaXMuZGF0YS5wdXNoKHtcblx0XHRcdHRpbWU6IHRpbWUsXG5cdFx0XHR0eXBlOiAnY3Vyc29yJyxcblx0XHRcdGxvYzogY29vcmRzLFxuXHRcdH0pO1xuXHR9XG5cblx0ZXJhc2UodGltZSwgY29vcmRzLCByYWRpdXMpIHtcblx0XHR0aGlzLmRhdGEucHVzaCh7XG5cdFx0XHR0aW1lOiB0aW1lLFxuXHRcdFx0dHlwZTogJ2VyYXNlJyxcblx0XHRcdGxvYzogY29vcmRzLFxuXHRcdFx0cmFkaXVzOiByYWRpdXMsXG5cdFx0fSk7XG5cdH1cblxuXHRiZWdpblN0cm9rZSh0aW1lLCBjb29yZHMpIHtcblx0XHR0aGlzLmRhdGEucHVzaCh7XG5cdFx0XHR0aW1lOiB0aW1lLFxuXHRcdFx0dHlwZTogJ2JlZ2luU3Ryb2tlJyxcblx0XHRcdGxvYzogY29vcmRzLFxuXHRcdH0pO1xuXHR9XG5cblx0c3Ryb2tlVG8odGltZSwgY29vcmRzLCB3aWR0aCwgY29sb3IpIHtcblx0XHR0aGlzLmRhdGEucHVzaCh7XG5cdFx0XHR0aW1lOiB0aW1lLFxuXHRcdFx0dHlwZTogJ3N0cm9rZVRvJyxcblx0XHRcdGxvYzogY29vcmRzLFxuXHRcdFx0d2lkdGg6IHdpZHRoLFxuXHRcdFx0Y29sb3I6IGNvbG9yLFxuXHRcdH0pO1xuXHR9XG5cblx0cGxhY2VTdmcodGltZSwgY29vcmRzLCBkYXRhKSB7XG5cdFx0dGhpcy5kYXRhLnB1c2goe1xuXHRcdFx0dGltZTogdGltZSxcblx0XHRcdHR5cGU6ICdzdmcnLFxuXHRcdFx0bG9jOiBjb29yZHMsXG5cdFx0XHRkYXRhOiBkYXRhLFxuXHRcdH0pO1xuXHR9XG5cblx0dHJhbnNsYXRlKHRpbWUsIG9mZnNldCkge1xuXHRcdHRoaXMuZGF0YS5wdXNoKHtcblx0XHRcdHRpbWU6IHRpbWUsXG5cdFx0XHR0eXBlOiAndHJhbnNsYXRlJyxcblx0XHRcdGxvYzogb2Zmc2V0LFxuXHRcdH0pO1xuXHR9XG5cblx0Z2V0RGF0YSgpIHtcblx0XHRyZXR1cm4gdGhpcy5kYXRhO1xuXHR9XG59XG4iLCJpbXBvcnQge1JlY29yZGVyanN9IGZyb20gXCIuLi92ZW5kb3IvUmVjb3JkZXJcIjtcblxuZXhwb3J0IGNsYXNzIE1pYyB7XG5cdGNvbnN0cnVjdG9yKHdvcmtlclBhdGgpIHtcblx0XHRjb25zdCBuYXYgPSB3aW5kb3cubmF2aWdhdG9yO1xuXHRcdG5hdi5nZXRVc2VyTWVkaWEgPSAoXG5cdFx0XHRuYXYuZ2V0VXNlck1lZGlhIHx8XG5cdFx0XHRuYXYud2Via2l0R2V0VXNlck1lZGlhIHx8XG5cdFx0XHRuYXYubW96R2V0VXNlck1lZGlhIHx8XG5cdFx0XHRuYXYubXNHZXRVc2VyTWVkaWFcblx0XHQpO1xuXHRcdHRoaXMubmF2aWdhdG9yID0gbmF2O1xuXG5cdFx0Y29uc3QgQXVkaW9Db250ZXh0ID0gd2luZG93LkF1ZGlvQ29udGV4dCB8fCB3aW5kb3cud2Via2l0QXVkaW9Db250ZXh0O1xuXHRcdHRoaXMuY29udGV4dCA9IG5ldyBBdWRpb0NvbnRleHQoKTtcblxuXHRcdHRoaXMubmF2aWdhdG9yLmdldFVzZXJNZWRpYSh7XG5cdFx0XHRhdWRpbzogdHJ1ZVxuXHRcdH0sIGxvY2FsTWVkaWFTdHJlYW0gPT4ge1xuXHRcdFx0dGhpcy5tZWRpYVN0cmVhbSA9IGxvY2FsTWVkaWFTdHJlYW07XG5cblx0XHRcdHZhciBtZWRpYVN0cmVhbVNvdXJjZSA9IHRoaXMuY29udGV4dC5jcmVhdGVNZWRpYVN0cmVhbVNvdXJjZShsb2NhbE1lZGlhU3RyZWFtKTtcblx0XHRcdHRoaXMucmVjID0gbmV3IFJlY29yZGVyanMobWVkaWFTdHJlYW1Tb3VyY2UsIHtcblx0XHRcdFx0d29ya2VyUGF0aDogd29ya2VyUGF0aCxcblx0XHRcdH0pO1xuXG5cdFx0fSwgZXJyID0+IHtcblx0XHRcdGNvbnNvbGUubG9nKCdCcm93c2VyIG5vdCBzdXBwb3J0ZWQnKTtcblx0XHR9KTtcblx0fVxuXG5cdHJlY29yZCgpIHtcblx0XHR0aGlzLnJlYy5yZWNvcmQoKTtcblx0fVxuXG5cdHBhdXNlKCkge1xuXHRcdHRoaXMucmVjLnN0b3AoKTtcblx0fVxuXG5cdHN0b3AoY2IpIHtcblx0XHR0aGlzLnBhdXNlKCk7XG5cblx0XHR0aGlzLm1lZGlhU3RyZWFtLnN0b3AoKTtcblx0XHR0aGlzLnJlYy5leHBvcnRXQVYoZSA9PiB7XG5cdFx0XHRjYihlKTtcblx0XHRcdC8vdGhpcy5yZWMuY2xlYXIoKTtcblx0XHRcdC8vIFJlY29yZGVyanMuZm9yY2VEb3dubG9hZChlLCBcImZpbGVuYW1lLndhdlwiKTtcblx0XHR9KTtcblx0fVxufVxuIiwiaW1wb3J0IHtDb29yZHN9IGZyb20gJy4vQ29vcmRzJztcbmltcG9ydCB7TWljfSBmcm9tICcuL01pYyc7XG5cbmV4cG9ydCBjbGFzcyBSZWNvcmRlciB7XG5cdGNvbnN0cnVjdG9yKCRjb250YWluZXIsICR0aW1lLCAkb25haXIsIHJlY29yZGluZywgcGVuQXBpLCBjb2xvcnMsIHdvcmtlclBhdGgsIG9uU2F2ZSwgJGVyYXNlcikge1xuXHRcdHRoaXMuc2l6ZSA9IHt3aWR0aDogODAwLCBoZWlnaHQ6IDQ1MH07IC8vMTkyMC8xMDgwIHJhdGlvXG5cblx0XHRjb25zdCBleHBhbmRzID0ge3dpZHRoOiAyLCBoZWlnaHQ6IDN9O1xuXG5cdFx0dGhpcy5jdHggPSB0aGlzLmNyZWF0ZUNhbnZhcyh0aGlzLnNpemUud2lkdGggKiBleHBhbmRzLndpZHRoLCB0aGlzLnNpemUuaGVpZ2h0ICogZXhwYW5kcy5oZWlnaHQpO1xuXHRcdHRoaXMub2Zmc2V0TWF4ID0ge1xuXHRcdFx0eDogdGhpcy5zaXplLndpZHRoICogKGV4cGFuZHMud2lkdGggLSAxKSxcblx0XHRcdHk6IHRoaXMuc2l6ZS5oZWlnaHQgKiAoZXhwYW5kcy5oZWlnaHQgLSAxKSxcblx0XHR9O1xuXHRcdHRoaXMuc2NyID0gdGhpcy5jcmVhdGVDYW52YXModGhpcy5zaXplLndpZHRoLCB0aGlzLnNpemUuaGVpZ2h0KTtcbiAgICAgICAgJGNvbnRhaW5lci5hcHBlbmRDaGlsZCh0aGlzLnNjci5jYW52YXMpO1xuXG5cdFx0dGhpcy4kdGltZSA9ICR0aW1lO1xuXHRcdHRoaXMuJG9uYWlyID0gJG9uYWlyO1xuXHRcdHRoaXMucGVuQXBpID0gcGVuQXBpO1xuXHRcdHRoaXMudGltZSA9IDA7XG5cdFx0dGhpcy5wYXVzZWQgPSB0cnVlO1xuXHRcdHRoaXMuZmlyc3REcmF3RXZlbnQgPSB0cnVlO1xuXHRcdHRoaXMubGFzdEN1cnNvciA9IG51bGw7XG5cdFx0dGhpcy5jb2xvciA9IHtyOiAyNTUsIGc6IDEwMCwgYjogMTUwfTtcblx0XHR0aGlzLm1pYyA9IG5ldyBNaWMod29ya2VyUGF0aCk7XG5cdFx0dGhpcy5jb29yZHMgPSBuZXcgQ29vcmRzKHRoaXMucmF0aW8sIHRoaXMuc2NyLmNhbnZhcy5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKSk7XG5cdFx0dGhpcy5vblNhdmUgPSBvblNhdmU7XG5cdFx0dGhpcy5lcmFzZXJNb2RlID0gZmFsc2U7XG5cdFx0dGhpcy5jb29yZHMub2Zmc2V0LnNjcmVlbiA9IHtcblx0XHRcdHg6IHRoaXMuc2l6ZS53aWR0aCAvIDIsIC8vIGludGVudGlvbmFsbHkgbm90IDAgbGVhdmluZyBhIGxpdHRsZSBiaXQgYXV0aG9yIHRvIHNsaWRlXG5cdFx0XHR5OiB0aGlzLnNpemUuaGVpZ2h0IC8gMixcblx0XHR9O1xuXG5cdFx0dGhpcy5yZWNvcmRpbmcgPSByZWNvcmRpbmc7XG5cdFx0dGhpcy5yZWNvcmRpbmcudHJhbnNsYXRlKHRoaXMudGltZSwgdGhpcy5jb29yZHMub2Zmc2V0LnNjcmVlbik7XG5cbiAgICAgICAgdGhpcy5zY3IuY2FudmFzLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNlbW92ZScsIHRoaXMub25Nb3VzZU1vdmUuYmluZCh0aGlzKSk7XG4gICAgICAgIHRoaXMuc2NyLmNhbnZhcy5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWRvd24nLCB0aGlzLm9uTW91c2VEb3duLmJpbmQodGhpcykpO1xuICAgICAgICB0aGlzLnNjci5jYW52YXMuYWRkRXZlbnRMaXN0ZW5lcignbW91c2V1cCcsIHRoaXMub25Nb3VzZVVwLmJpbmQodGhpcykpO1xuICAgICAgICB0aGlzLnNjci5jYW52YXMuYWRkRXZlbnRMaXN0ZW5lcignY29udGV4dG1lbnUnLCB0aGlzLm9uTW91c2VEb3duLmJpbmQodGhpcyksIGZhbHNlKTtcblxuXHRcdHRoaXMuY2hhbmdlQ29sb3IoY29sb3JzWzBdKTtcblxuXHRcdHRoaXMucmVnaXN0ZXJFcmFzZXIoJGVyYXNlcik7XG5cdFx0dGhpcy5yZWdpc3RlckNvbnRyb2xCdXR0b25zKGNvbG9ycyk7XG5cdFx0dGhpcy5yZWdpc3RlcktleXMoKTtcblx0XHR0aGlzLnJlZ2lzdGVyRmlsZURyb3AodGhpcy5zY3IuY2FudmFzKTtcblx0fVxuXG5cdHJlZ2lzdGVyRXJhc2VyKCRlcmFzZXIpIHtcblx0XHRjb25zdCBjYiA9IGZ1bmN0aW9uKGV2ZW50KSB7XG5cdFx0XHR0aGlzLmVyYXNlck1vZGUgPSB0cnVlO1xuXHRcdFx0dGhpcy5zY3IuY2FudmFzLmNsYXNzTGlzdC5hZGQoJ2VyYXNlcicpO1xuXHRcdH07XG5cdFx0JGVyYXNlci5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGNiLmJpbmQodGhpcykpO1xuXHR9XG5cblx0cmVnaXN0ZXJDb250cm9sQnV0dG9ucyhjb2xvcnMpIHtcblx0XHRmb3IgKHZhciAkaW5wdXQgb2YgY29sb3JzKSB7XG4gICAgICAgIFx0JGlucHV0LmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgdGhpcy5vbkNvbG9yQ2xpY2suYmluZCh0aGlzKSk7XG4gICAgICAgIH1cblxuXHRcdGNvbnN0ICRzYXZlID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3NhdmUnKTtcblx0XHRjb25zdCB0aGF0ID0gdGhpcztcblx0XHQkc2F2ZS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGV2ZW50ID0+IHtcblx0XHRcdGNvbnN0IHJlYyA9IHtcblx0XHRcdFx0ZGF0YTogdGhhdC5yZWNvcmRpbmcuZ2V0RGF0YSgpLFxuXHRcdFx0XHRzaXplOiB0aGF0LnNpemUsXG5cdFx0XHRcdGR1cmF0aW9uOiB0aGF0LnRpbWUsXG5cdFx0XHRcdG1ldGE6IHtcblx0XHRcdFx0XHRwb2ludGVyVHlwZTogdGhhdC5wZW5BcGkgPyB0aGF0LnBlbkFwaS5wb2ludGVyVHlwZSA6IFwidW5rbm93blwiLFxuXHRcdFx0XHRcdHRhYmxldE1vZGVsOiB0aGF0LnBlbkFwaSA/IHRoYXQucGVuQXBpLnRhYmxldE1vZGVsIDogXCJ1bmtub3duXCIsXG5cdFx0XHRcdFx0YWdlbnQ6IG5hdmlnYXRvci51c2VyQWdlbnQsXG5cdFx0XHRcdH1cblx0XHRcdH07XG5cblx0XHRcdGNvbnN0IGRhdGEgPSBKU09OLnN0cmluZ2lmeShyZWMpO1xuXHRcdFx0dGhpcy5taWMuc3RvcChhdWRpbyA9PiB7XG5cdFx0XHRcdHRoYXQub25TYXZlKGRhdGEsIGF1ZGlvKTtcblx0XHRcdH0pO1xuXHRcdH0pO1xuXHR9XG5cblx0cmVnaXN0ZXJGaWxlRHJvcCgkZWwpIHtcblx0XHRjb25zdCBoYW5kbGVGaWxlU2VsZWN0ID0gZnVuY3Rpb24oZXZlbnQpIHtcblx0XHRcdGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuXHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblxuXHRcdFx0Y29uc3QgZmlsZXMgPSBldmVudC5kYXRhVHJhbnNmZXIuZmlsZXM7XG5cdFx0XHRpZiAoZmlsZXMubGVuZ3RoICE9IDEpIHtcblx0XHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdFx0fVxuXHRcdFx0Y29uc3QgZmlsZSA9IGZpbGVzWzBdO1xuXG5cdFx0XHRjb25zdCBkcm9wUG9zaXRpb24gPSB0aGlzLmNvb3Jkcy5ldmVudFRvTGF5ZXIoZXZlbnQpO1xuXHRcdFx0Y29uc3QgcmVhZGVyID0gbmV3IEZpbGVSZWFkZXIoKTtcblx0XHRcdGNvbnN0IHRoYXQgPSB0aGlzO1xuXHRcdFx0cmVhZGVyLm9ubG9hZCA9IGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0dHJ5IHtcblx0XHRcdFx0XHRjb25zdCBpbWcgPSBuZXcgSW1hZ2UoKTtcblx0XHRcdFx0XHRpbWcub25sb2FkID0gZXZlbnQgPT4ge1xuXHRcdFx0XHRcdFx0Y29uc3QgbW92ZWREcm9wID0ge1xuXHRcdFx0XHRcdFx0XHQvLyBpbWcgc2l6ZXMgYXJlIGFsc28gYm90aCBtdWx0aXBsaWVkIGFuZCBkaXZpZGVkIGJ5IHJhdGlvIGhlcmVcblx0XHRcdFx0XHRcdFx0eDogZHJvcFBvc2l0aW9uLnggLSBpbWcud2lkdGggLyAyLFxuXHRcdFx0XHRcdFx0XHR5OiBkcm9wUG9zaXRpb24ueSAtIGltZy5oZWlnaHQgLyAyLFxuXHRcdFx0XHRcdFx0fTtcblx0XHRcdFx0XHRcdGNvbnN0IGNvb3JkcyA9IHRoYXQuY29vcmRzLmxheWVyVG9DYW52YXMobW92ZWREcm9wKTtcblx0XHRcdFx0XHRcdHRoYXQuY3R4LmRyYXdJbWFnZShpbWcsIGNvb3Jkcy54LCBjb29yZHMueSxcblx0XHRcdFx0XHRcdFx0aW1nLm5hdHVyYWxXaWR0aCAqIHRoYXQucmF0aW8sIGltZy5uYXR1cmFsSGVpZ2h0ICogdGhhdC5yYXRpbyk7XG5cdFx0XHRcdFx0XHR0aGF0LnJlY29yZGluZy5wbGFjZVN2Zyh0aGF0LnRpbWUsIG1vdmVkRHJvcCwgaW1nLnNyYyk7XG5cdFx0XHRcdFx0XHR0aGF0LnJlZHJhdygpO1xuXHRcdFx0XHRcdH07XG5cdFx0XHRcdFx0aW1nLnNyYyA9IGUudGFyZ2V0LnJlc3VsdDtcblxuXHRcdFx0XHR9IGNhdGNoIChlKSB7XG5cdFx0XHRcdFx0Ly8gc3VwcGxpZWQgZmlsZSB3YXMgcHJvYmFibHkgbm90IGEgc3VwcG9ydGVkIGltYWdlXG5cdFx0XHRcdH1cblx0XHRcdH07XG5cdFx0XHRyZWFkZXIucmVhZEFzRGF0YVVSTChmaWxlKTtcblx0XHR9O1xuXG5cdFx0Y29uc3QgaGFuZGxlRHJhZ092ZXIgPSBmdW5jdGlvbihldmVudCkge1xuXHRcdFx0ZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XG5cdFx0XHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdCAgICBldmVudC5kYXRhVHJhbnNmZXIuZHJvcEVmZmVjdCA9ICdjb3B5Jztcblx0XHR9O1xuXG5cdFx0JGVsLmFkZEV2ZW50TGlzdGVuZXIoJ2RyYWdvdmVyJywgaGFuZGxlRHJhZ092ZXIuYmluZCh0aGlzKSwgZmFsc2UpO1xuXHRcdCRlbC5hZGRFdmVudExpc3RlbmVyKCdkcm9wJywgaGFuZGxlRmlsZVNlbGVjdC5iaW5kKHRoaXMpLCBmYWxzZSk7XG5cdH1cblxuXHRyZWdpc3RlcktleShjb2RlLCBjYikge1xuXHRcdGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2tleWRvd24nLCBldmVudCA9PiB7XG5cdFx0XHRpZiAoZXZlbnQudGFyZ2V0LnRhZ05hbWUgPT09ICdJTlBVVCcpIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXHRcdFx0aWYgKGV2ZW50LmtleUNvZGUgIT09IGNvZGUpIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRjYihldmVudCk7XG5cdFx0XHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdH0pO1xuXHR9XG5cblx0cmVnaXN0ZXJLZXlzKCkge1xuXHRcdC8vIHNwYWNlXG5cdFx0dGhpcy5yZWdpc3RlcktleSgzMiwgZXZlbnQgPT4ge1xuXHRcdFx0aWYgKHRoaXMucGF1c2VkKSB7XG5cdFx0XHRcdHRoaXMucGF1c2VkID0gZmFsc2U7XG5cdFx0XHRcdHRoaXMuJG9uYWlyLnRleHRDb250ZW50ID0gJ3JlY29yZGluZyc7XG5cdFx0XHRcdHJlcXVlc3RBbmltYXRpb25GcmFtZSh0aGlzLnRpY2suYmluZCh0aGlzKSk7XG5cdFx0XHRcdHRoaXMubWljLnJlY29yZCgpO1xuXG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHR0aGlzLm1pYy5wYXVzZSgpO1xuXHRcdFx0XHR0aGlzLiRvbmFpci50ZXh0Q29udGVudCA9ICcnO1xuXHRcdFx0XHR0aGlzLnBhdXNlZCA9IHRydWU7XG5cdFx0XHR9XG5cdFx0fSk7XG5cdH1cblxuXHR0aWNrKHRpbWVzdGFtcCkge1xuXHRcdHRoaXMuJHRpbWUudGV4dENvbnRlbnQgPSAodGhpcy50aW1lIC8gMTAwMCkudG9GaXhlZCgyKTtcblxuXHRcdGlmICghdGhpcy5wYXVzZWQpIHtcblx0XHRcdGNvbnN0IGxhc3QgPSB0aW1lc3RhbXA7XG5cdFx0XHRyZXF1ZXN0QW5pbWF0aW9uRnJhbWUodGltZXN0YW1wID0+IHtcblx0XHRcdFx0dGhpcy50aW1lICs9IHRpbWVzdGFtcCAtIGxhc3Q7XG5cdFx0XHRcdHRoaXMudGljayh0aW1lc3RhbXApO1xuXHRcdFx0fSk7XG5cdFx0fVxuXHR9XG5cblx0Y3JlYXRlQ2FudmFzKHdpZHRoLCBoZWlnaHQpIHtcblx0XHRjb25zdCAkY2FudmFzID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnY2FudmFzJyk7XG5cdFx0JGNhbnZhcy53aWR0aCA9IHdpZHRoO1xuICAgICAgICAkY2FudmFzLmhlaWdodCA9IGhlaWdodDtcblxuICAgICAgICBpZiAoIXRoaXMucmF0aW8pIHtcbiAgICAgICAgXHR0aGlzLnJhdGlvID0gdGhpcy5nZXRSYXRpbygkY2FudmFzKTtcbiAgICAgICAgfVxuICAgICAgICB0aGlzLnNjYWxlQ2FudmFzKCRjYW52YXMsIHRoaXMucmF0aW8pO1xuXG4gICAgICAgIGNvbnN0IGN0eCA9ICRjYW52YXMuZ2V0Q29udGV4dCgnMmQnKTtcbiAgICAgICAgY3R4LmNsZWFyQWxsID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIFx0Y3R4LmNsZWFyUmVjdCgwLCAwLCAkY2FudmFzLndpZHRoLCAkY2FudmFzLmhlaWdodCk7XG4gICAgICAgIH07XG4gICAgICAgIHJldHVybiBjdHg7XG5cdH1cblxuXHRnZXRSYXRpbygkY2FudmFzKSB7XG5cdFx0Y29uc3QgY29udGV4dCA9ICRjYW52YXMuZ2V0Q29udGV4dCgnMmQnKTtcblx0XHRjb25zdCBkZXZpY2VQaXhlbFJhdGlvID0gd2luZG93LmRldmljZVBpeGVsUmF0aW8gfHwgMTtcbiAgICAgICAgY29uc3QgYmFja2luZ1N0b3JlUmF0aW8gPSBjb250ZXh0LndlYmtpdEJhY2tpbmdTdG9yZVBpeGVsUmF0aW9cbiAgICAgICAgXHR8fCBjb250ZXh0Lm1vekJhY2tpbmdTdG9yZVBpeGVsUmF0aW9cbiAgICAgICAgICAgIHx8IGNvbnRleHQubXNCYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgICAgICB8fCBjb250ZXh0Lm9CYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgICAgICB8fCBjb250ZXh0LmJhY2tpbmdTdG9yZVBpeGVsUmF0aW9cbiAgICAgICAgICAgIHx8IDE7XG5cbiAgICAgICAgcmV0dXJuIGRldmljZVBpeGVsUmF0aW8gLyBiYWNraW5nU3RvcmVSYXRpbztcblx0fVxuXG5cdHNjYWxlQ2FudmFzKCRjYW52YXMsIHJhdGlvKSB7XG4gICAgICAgIGNvbnN0IG9sZFdpZHRoID0gJGNhbnZhcy53aWR0aDtcbiAgICAgICAgY29uc3Qgb2xkSGVpZ2h0ID0gJGNhbnZhcy5oZWlnaHQ7XG5cbiAgICAgICAgJGNhbnZhcy53aWR0aCA9IG9sZFdpZHRoICogcmF0aW87XG4gICAgICAgICRjYW52YXMuaGVpZ2h0ID0gb2xkSGVpZ2h0ICogcmF0aW87XG5cbiAgICAgICAgJGNhbnZhcy5zdHlsZS53aWR0aCA9IG9sZFdpZHRoICsgJ3B4JztcbiAgICAgICAgJGNhbnZhcy5zdHlsZS5oZWlnaHQgPSBvbGRIZWlnaHQgKyAncHgnO1xuXHR9XG5cblx0b25Db2xvckNsaWNrKGV2ZW50KSB7XG5cdFx0aWYgKGV2ZW50LnRhcmdldC5pZCAhPT0gJ2VyYXNlcicpIHtcblx0XHRcdHRoaXMuZXJhc2VyTW9kZSA9IGZhbHNlO1xuXHRcdFx0dGhpcy5zY3IuY2FudmFzLmNsYXNzTGlzdC5yZW1vdmUoJ2VyYXNlcicpO1xuXHRcdH1cblxuXHRcdHRoaXMuY2hhbmdlQ29sb3IoZXZlbnQudGFyZ2V0KTtcblx0fVxuXG5cdGNoYW5nZUNvbG9yKHRhcmdldCkge1xuXHRcdGNvbnN0IGFyciA9IEpTT04ucGFyc2UodGFyZ2V0LmRhdGFzZXQuY29sb3IpO1xuXG5cdFx0aWYgKHRhcmdldC5pZCAhPT0gJ2VyYXNlcicpIHtcblx0XHRcdHRoaXMuY29sb3IgPSB7cjogYXJyWzBdLCBnOiBhcnJbMV0sIGI6IGFyclsyXX07XG5cdFx0fVxuXG5cdFx0aWYgKHRoaXMubGFzdENvbG9yKSB7XG5cdFx0XHR0aGlzLmxhc3RDb2xvci5jbGFzc0xpc3QucmVtb3ZlKCdhY3RpdmUnKTtcblx0XHR9XG5cdFx0dGFyZ2V0LmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuXHRcdHRoaXMubGFzdENvbG9yID0gdGFyZ2V0O1xuXHR9XG5cblx0bW91c2VCdXR0b24oZXZlbnQpIHtcblx0XHRyZXR1cm4gXCJldmVudFwiIGluIHdpbmRvdyAmJiBcImJ1dHRvbnNcIiBpbiB3aW5kb3cuZXZlbnRcblx0XHRcdD8gd2luZG93LmV2ZW50LmJ1dHRvbnMgLy8gSW50ZXJuZXQgRXhwbG9yZXJcblx0XHRcdDogKFwiYnV0dG9uc1wiIGluIGV2ZW50XG5cdFx0XHRcdD8gZXZlbnQuYnV0dG9ucyAvLyBGaXJlZm94XG5cdFx0XHRcdDogZXZlbnQud2hpY2ggLy8gQ2hyb21lXG5cdFx0XHQpO1xuXHR9XG5cblx0c2V0VHJhbnNsYXRpb25CYXNlKGV2ZW50KSB7XG5cdFx0dGhpcy50cmFuc2xhdGlvbkJhc2UgPSB7XG5cdFx0XHR4OiB0aGlzLmNvb3Jkcy5vZmZzZXQuc2NyZWVuLnggKyBldmVudC5wYWdlWCxcblx0XHRcdHk6IHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4ueSArIGV2ZW50LnBhZ2VZLFxuXHRcdH07XG5cdH1cblxuXHRvbk1vdXNlRG93bihldmVudCkge1xuXHRcdGNvbnN0IGJ1dHRvbiA9IHRoaXMubW91c2VCdXR0b24oZXZlbnQpO1xuXHRcdGlmIChidXR0b24gPT0gMikge1xuXHRcdFx0ZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XG5cdFx0XHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0dGhpcy5zZXRUcmFuc2xhdGlvbkJhc2UoZXZlbnQpO1xuXHRcdH1cblxuXHRcdGNvbnN0IGxheWVyQ29vcmRzID0gdGhpcy5jb29yZHMuZXZlbnRUb0xheWVyKGV2ZW50KTtcblx0XHR0aGlzLmxhc3RDdXJzb3IgPSBsYXllckNvb3Jkcztcblx0XHR0aGlzLmxhc3RPbnNjcmVlbiA9IHRoaXMuY29vcmRzLmxheWVyVG9DYW52YXMobGF5ZXJDb29yZHMpO1xuXHR9XG5cblx0b25Nb3VzZVVwKGV2ZW50KSB7XG5cdFx0dGhpcy50cmFuc2xhdGlvbkJhc2UgPSBudWxsO1xuXHR9XG5cblx0b25Nb3VzZU1vdmUoZXZlbnQpIHtcblx0XHRpZiAodGhpcy5wYXVzZWQpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHRjb25zdCBjdXJzb3IgPSB0aGlzLmNvb3Jkcy5ldmVudFRvTGF5ZXIoZXZlbnQpO1xuXHRcdGNvbnN0IGJ1dHRvbiA9IHRoaXMubW91c2VCdXR0b24oZXZlbnQpO1xuXHRcdGlmIChidXR0b24gPT0gMikge1xuXHRcdFx0aWYgKCF0aGlzLnRyYW5zbGF0aW9uQmFzZSkge1xuXHRcdFx0XHR0aGlzLnNldFRyYW5zbGF0aW9uQmFzZShldmVudCk7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblx0XHRcdGNvbnN0IG9mZnNldCA9IHtcblx0XHRcdFx0eDogTWF0aC5taW4odGhpcy5vZmZzZXRNYXgueCwgTWF0aC5tYXgoMCwgdGhpcy50cmFuc2xhdGlvbkJhc2UueCAtIGV2ZW50LnBhZ2VYKSksXG5cdFx0XHRcdHk6IE1hdGgubWluKHRoaXMub2Zmc2V0TWF4LnksIE1hdGgubWF4KDAsIHRoaXMudHJhbnNsYXRpb25CYXNlLnkgLSBldmVudC5wYWdlWSkpLFxuXHRcdFx0fTtcblx0XHRcdHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4gPSBvZmZzZXQ7XG5cdFx0XHR0aGlzLnJlY29yZGluZy50cmFuc2xhdGUodGhpcy50aW1lLCBvZmZzZXQpO1xuXG5cdFx0fSBlbHNlIGlmIChidXR0b24gPT0gMSkge1xuXHRcdFx0Y29uc3Qgb25zY3JlZW4gPSB0aGlzLmNvb3Jkcy5sYXllclRvQ2FudmFzKGN1cnNvcik7XG5cdFx0XHRpZiAodGhpcy5lcmFzZXJNb2RlKSB7XG5cdFx0XHRcdGNvbnN0IHJhZGl1cyA9IDExICogdGhpcy5yYXRpbztcblx0XHRcdFx0dGhpcy5yZWNvcmRpbmcuZXJhc2UodGhpcy50aW1lLCBjdXJzb3IsIHJhZGl1cyk7XG5cblx0XHRcdFx0Y29uc3QgY2FudmFzID0gdGhpcy5jdHguY2FudmFzO1xuXHRcdFx0XHR0aGlzLmN0eC5zYXZlKCk7XG5cdFx0XHRcdHRoaXMuY3R4LmJlZ2luUGF0aCgpO1xuXHRcdFx0XHR0aGlzLmN0eC5hcmMob25zY3JlZW4ueCwgb25zY3JlZW4ueSwgcmFkaXVzLCAwLCBNYXRoLlBJKjIsIHRydWUpO1xuXHRcdFx0XHR0aGlzLmN0eC5jbGlwKCk7XG5cdFx0XHRcdHRoaXMuY3R4LmNsZWFyUmVjdCgwLCAwLCBjYW52YXMud2lkdGgsIGNhbnZhcy5oZWlnaHQpO1xuXHRcdFx0XHR0aGlzLmN0eC5yZXN0b3JlKCk7XG5cblx0XHRcdH0gZWxzZSBpZiAodGhpcy5maXJzdERyYXdFdmVudCkge1xuXHRcdFx0XHR0aGlzLmZpcnN0RHJhd0V2ZW50ID0gZmFsc2U7XG5cdFx0XHRcdHRoaXMucmVjb3JkaW5nLmJlZ2luU3Ryb2tlKHRoaXMudGltZSwgY3Vyc29yKTtcblx0XHRcdFx0dGhpcy5jdHgubW92ZVRvKG9uc2NyZWVuLngsIG9uc2NyZWVuLnkpO1xuXG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRjb25zdCBiYXNlbGluZSA9IDE7XG5cdFx0XHRcdGNvbnN0IHdpZHRoID0gdGhpcy5wZW5BcGkgPyAoMSArIDQgKiB0aGlzLnBlbkFwaS5wcmVzc3VyZSkgKiBiYXNlbGluZSA6IGJhc2VsaW5lICogMztcblx0XHRcdFx0dGhpcy5yZWNvcmRpbmcuc3Ryb2tlVG8odGhpcy50aW1lLCBjdXJzb3IsIHdpZHRoLCB0aGlzLmNvbG9yKTtcblxuXHRcdFx0XHR0aGlzLmN0eC5iZWdpblBhdGgoKTtcblx0XHRcdFx0aWYgKHRoaXMubGFzdE9uc2NyZWVuKSB7XG5cdFx0XHRcdFx0dGhpcy5jdHgubW92ZVRvKHRoaXMubGFzdE9uc2NyZWVuLngsIHRoaXMubGFzdE9uc2NyZWVuLnkpO1xuXHRcdFx0XHR9XG5cdFx0XHRcdHRoaXMuY3R4LmxpbmVXaWR0aCA9IHdpZHRoO1xuXHRcdFx0XHR0aGlzLmN0eC5zdHJva2VTdHlsZSA9IGByZ2IoJHt0aGlzLmNvbG9yLnJ9LCAke3RoaXMuY29sb3IuZ30sICR7dGhpcy5jb2xvci5ifSlgO1xuXHRcdFx0XHR0aGlzLmN0eC5saW5lVG8ob25zY3JlZW4ueCwgb25zY3JlZW4ueSk7XG5cdFx0XHRcdHRoaXMuY3R4LnN0cm9rZSgpO1xuXHRcdFx0XHR0aGlzLmxhc3RPbnNjcmVlbiA9IG9uc2NyZWVuO1xuXHRcdFx0fVxuXG5cdFx0fSBlbHNlIHtcblx0XHRcdHRoaXMuZmlyc3REcmF3RXZlbnQgPSB0cnVlO1xuXHRcdFx0dGhpcy5yZWNvcmRpbmcubW92ZUN1cnNvcih0aGlzLnRpbWUsIGN1cnNvcik7XG5cdFx0XHR0aGlzLmxhc3RPbnNjcmVlbiA9IG51bGw7XG5cdFx0fVxuXG5cdFx0dGhpcy5yZWRyYXcoKTtcblx0fVxuXG5cdHJlZHJhdygpIHtcblx0XHR0aGlzLnNjci5jbGVhckFsbCgpO1xuXHRcdGNvbnN0IGNhbiA9IHRoaXMuY3R4LmNhbnZhcztcblx0XHRjb25zdCBzY3JjYW4gPSB0aGlzLnNjci5jYW52YXM7XG5cdFx0Y29uc3Qgb2Zmc2V0ID0gdGhpcy5jb29yZHMubGF5ZXJUb0NhbnZhcyh0aGlzLmNvb3Jkcy5vZmZzZXQuc2NyZWVuKTtcblx0XHR0aGlzLnNjci5kcmF3SW1hZ2UoY2FuLFxuXHRcdFx0b2Zmc2V0LngsIG9mZnNldC55LFxuXHRcdFx0c2NyY2FuLndpZHRoLCBzY3JjYW4uaGVpZ2h0LFxuXHRcdFx0MCwgMCxcblx0XHRcdHNjcmNhbi53aWR0aCwgc2NyY2FuLmhlaWdodFxuXHRcdCk7XG5cdH1cblxufVxuIiwiZXhwb3J0IGNsYXNzIFJlY29yZGluZyB7XG5cdGdldERhdGEoKSB7fVxuXHRnZXRTb3VuZFBhdGgoKSB7fVxufVxuIiwiZXhwb3J0IGNsYXNzIFJlY29yZGVyanMge1xuICBjb25zdHJ1Y3Rvcihzb3VyY2UsIGNmZykge1xuICAgIHZhciBjb25maWcgPSBjZmcgfHwge307XG4gICAgdmFyIGJ1ZmZlckxlbiA9IGNvbmZpZy5idWZmZXJMZW4gfHwgNDA5NjtcbiAgICB2YXIgbnVtQ2hhbm5lbHMgPSBjb25maWcubnVtQ2hhbm5lbHMgfHwgMjtcbiAgICB0aGlzLmNvbnRleHQgPSBzb3VyY2UuY29udGV4dDtcbiAgICB0aGlzLm5vZGUgPSAodGhpcy5jb250ZXh0LmNyZWF0ZVNjcmlwdFByb2Nlc3NvciB8fFxuICAgICAgICAgICAgICAgICB0aGlzLmNvbnRleHQuY3JlYXRlSmF2YVNjcmlwdE5vZGUpLmNhbGwodGhpcy5jb250ZXh0LFxuICAgICAgICAgICAgICAgICBidWZmZXJMZW4sIG51bUNoYW5uZWxzLCBudW1DaGFubmVscyk7XG4gICAgdmFyIHdvcmtlciA9IG5ldyBXb3JrZXIoY29uZmlnLndvcmtlclBhdGggfHwgJ3JlY29yZGVyV29ya2VyLmpzJyk7XG4gICAgd29ya2VyLnBvc3RNZXNzYWdlKHtcbiAgICAgIGNvbW1hbmQ6ICdpbml0JyxcbiAgICAgIGNvbmZpZzoge1xuICAgICAgICBzYW1wbGVSYXRlOiB0aGlzLmNvbnRleHQuc2FtcGxlUmF0ZSxcbiAgICAgICAgbnVtQ2hhbm5lbHM6IG51bUNoYW5uZWxzXG4gICAgICB9XG4gICAgfSk7XG4gICAgdmFyIHJlY29yZGluZyA9IGZhbHNlLCBjdXJyQ2FsbGJhY2s7XG5cbiAgICB0aGlzLm5vZGUub25hdWRpb3Byb2Nlc3MgPSBmdW5jdGlvbihlKXtcbiAgICAgIGlmICghcmVjb3JkaW5nKSByZXR1cm47XG4gICAgICB2YXIgYnVmZmVyID0gW107XG4gICAgICBmb3IgKHZhciBjaGFubmVsID0gMDsgY2hhbm5lbCA8IG51bUNoYW5uZWxzOyBjaGFubmVsKyspe1xuICAgICAgICAgIGJ1ZmZlci5wdXNoKGUuaW5wdXRCdWZmZXIuZ2V0Q2hhbm5lbERhdGEoY2hhbm5lbCkpO1xuICAgICAgfVxuICAgICAgd29ya2VyLnBvc3RNZXNzYWdlKHtcbiAgICAgICAgY29tbWFuZDogJ3JlY29yZCcsXG4gICAgICAgIGJ1ZmZlcjogYnVmZmVyXG4gICAgICB9KTtcbiAgICB9XG5cbiAgICB0aGlzLmNvbmZpZ3VyZSA9IGZ1bmN0aW9uKGNmZyl7XG4gICAgICBmb3IgKHZhciBwcm9wIGluIGNmZyl7XG4gICAgICAgIGlmIChjZmcuaGFzT3duUHJvcGVydHkocHJvcCkpe1xuICAgICAgICAgIGNvbmZpZ1twcm9wXSA9IGNmZ1twcm9wXTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH1cblxuICAgIHRoaXMucmVjb3JkID0gZnVuY3Rpb24oKXtcbiAgICAgIHJlY29yZGluZyA9IHRydWU7XG4gICAgfVxuXG4gICAgdGhpcy5zdG9wID0gZnVuY3Rpb24oKXtcbiAgICAgIHJlY29yZGluZyA9IGZhbHNlO1xuICAgIH1cblxuICAgIHRoaXMuY2xlYXIgPSBmdW5jdGlvbigpe1xuICAgICAgd29ya2VyLnBvc3RNZXNzYWdlKHsgY29tbWFuZDogJ2NsZWFyJyB9KTtcbiAgICB9XG5cbiAgICB0aGlzLmdldEJ1ZmZlciA9IGZ1bmN0aW9uKGNiKSB7XG4gICAgICBjdXJyQ2FsbGJhY2sgPSBjYiB8fCBjb25maWcuY2FsbGJhY2s7XG4gICAgICB3b3JrZXIucG9zdE1lc3NhZ2UoeyBjb21tYW5kOiAnZ2V0QnVmZmVyJyB9KVxuICAgIH1cblxuICAgIHRoaXMuZXhwb3J0V0FWID0gZnVuY3Rpb24oY2IsIHR5cGUpe1xuICAgICAgY3VyckNhbGxiYWNrID0gY2IgfHwgY29uZmlnLmNhbGxiYWNrO1xuICAgICAgdHlwZSA9IHR5cGUgfHwgY29uZmlnLnR5cGUgfHwgJ2F1ZGlvL3dhdic7XG4gICAgICBpZiAoIWN1cnJDYWxsYmFjaykgdGhyb3cgbmV3IEVycm9yKCdDYWxsYmFjayBub3Qgc2V0Jyk7XG4gICAgICB3b3JrZXIucG9zdE1lc3NhZ2Uoe1xuICAgICAgICBjb21tYW5kOiAnZXhwb3J0V0FWJyxcbiAgICAgICAgdHlwZTogdHlwZVxuICAgICAgfSk7XG4gICAgfVxuXG4gICAgd29ya2VyLm9ubWVzc2FnZSA9IGZ1bmN0aW9uKGUpe1xuICAgICAgdmFyIGJsb2IgPSBlLmRhdGE7XG4gICAgICBjdXJyQ2FsbGJhY2soYmxvYik7XG4gICAgfVxuXG4gICAgc291cmNlLmNvbm5lY3QodGhpcy5ub2RlKTtcbiAgICB0aGlzLm5vZGUuY29ubmVjdCh0aGlzLmNvbnRleHQuZGVzdGluYXRpb24pOyAgICAvL3RoaXMgc2hvdWxkIG5vdCBiZSBuZWNlc3NhcnlcbiAgfVxuXG4gIHN0YXRpYyBmb3JjZURvd25sb2FkKGJsb2IsIGZpbGVuYW1lKSB7XG4gICAgdmFyIHVybCA9ICh3aW5kb3cuVVJMIHx8IHdpbmRvdy53ZWJraXRVUkwpLmNyZWF0ZU9iamVjdFVSTChibG9iKTtcbiAgICB2YXIgbGluayA9IHdpbmRvdy5kb2N1bWVudC5jcmVhdGVFbGVtZW50KCdhJyk7XG4gICAgbGluay5ocmVmID0gdXJsO1xuICAgIGxpbmsuZG93bmxvYWQgPSBmaWxlbmFtZSB8fCAnb3V0cHV0Lndhdic7XG4gICAgdmFyIGNsaWNrID0gZG9jdW1lbnQuY3JlYXRlRXZlbnQoXCJFdmVudFwiKTtcbiAgICBjbGljay5pbml0RXZlbnQoXCJjbGlja1wiLCB0cnVlLCB0cnVlKTtcbiAgICBsaW5rLmRpc3BhdGNoRXZlbnQoY2xpY2spO1xuICB9XG59XG4iXX0=
