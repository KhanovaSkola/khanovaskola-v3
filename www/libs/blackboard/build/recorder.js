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

			if (event.target.id !== 'eraser') {
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
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC9yZWNvcmRlci5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9Db29yZHMuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC9zcmMvRWRpdGVkUmVjb3JkaW5nLmpzIiwiL1VzZXJzL21pa3VsYXMvUHJvamVjdHMva2hhbm92YXNrb2xhL3d3dy9saWJzL2JsYWNrYm9hcmQvc3JjL01pYy5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9SZWNvcmRlci5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9SZWNvcmRpbmcuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC92ZW5kb3IvUmVjb3JkZXIuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7Ozt3QkNBdUIsZ0JBQWdCOzsrQkFDVCx1QkFBdUI7O0FBRXJELE1BQU0sQ0FBQyx5QkFBeUIsRUFBRSxZQUFXO0FBQzVDLFFBQU8sVUFBUyxJQUFJLEVBQUU7QUFDckIsTUFBTSxNQUFNLEdBQUcsUUFBUSxDQUFDLGNBQWMsQ0FBQyxVQUFVLENBQUMsQ0FBQyxNQUFNLENBQUM7O0FBRTFELE1BQU0sTUFBTSxHQUFHLElBQUksQ0FBQyxNQUFNLENBQUM7Ozs7OztBQUMzQix3QkFBbUIsTUFBTSw4SEFBRTtRQUFsQixNQUFNOztBQUNkLFFBQU0sQ0FBQyxHQUFH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Q0FBQyxDQUFDLElBQUksQ0FBQztBQUNsQixrQkFBWSxDQUFDLElBQUksQ0FBQyxDQUFDO0tBQ3BCLENBQUE7O0FBRUQsVUFBTSxDQUFDLE9BQU8sQ0FBQyxJQUFJLENBQUMsSUFBSSxDQUFDLENBQUM7QUFDMUIsUUFBSSxDQUFDLElBQUksQ0FBQyxPQUFPLENBQUMsSUFBSSxDQUFDLE9BQU8sQ0FBQyxXQUFXLENBQUMsQ0FBQztHQUM3Qzs7ZUF6RVUsVUFBVTs7V0EyRUQsdUJBQUMsSUFBSSxFQUFFLFFBQVEsRUFBRTtBQUNuQyxVQUFJLEdBQUcsR0FBRyxDQUFDLE1BQU0sQ0FBQyxHQUFHLElBQUksTUFBTSxDQUFDLFNBQVMsQ0FBQSxDQUFFLGVBQWUsQ0FBQyxJQUFJLENBQUMsQ0FBQztBQUNqRSxVQUFJLElBQUksR0FBRyxNQUFNLENBQUMsUUFBUSxDQUFDLGFBQWEsQ0FBQyxHQUFHLENBQUMsQ0FBQztBQUM5QyxVQUFJLENBQUMsSUFBSSxHQUFHLEdBQUcsQ0FBQztBQUNoQixVQUFJLENBQUMsUUFBUSxHQUFHLFFBQVEsSUFBSSxZQUFZLENBQUM7QUFDekMsVUFBSSxLQUFLLEdBQUcsUUFBUSxDQUFDLFdBQVcsQ0FBQyxPQUFPLENBQUMsQ0FBQztBQUMxQyxXQUFLLENBQUMsU0FBUyxDQUFDLE9BQU8sRUFBRSxJQUFJLEVBQUUsSUFBSSxDQUFDLENBQUM7QUFDckMsVUFBSSxDQUFDLGFBQWEsQ0FBQyxLQUFLLENBQUMsQ0FBQztLQUMzQjs7O1NBbkZVLFVBQVU7OztRQUFWLFVBQVUsR0FBVixVQUFVIiwiZmlsZSI6ImdlbmVyYXRlZC5qcyIsInNvdXJjZVJvb3QiOiIiLCJzb3VyY2VzQ29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsImltcG9ydCB7UmVjb3JkZXJ9IGZyb20gXCIuL3NyYy9SZWNvcmRlclwiO1xuaW1wb3J0IHtFZGl0ZWRSZWNvcmRpbmd9IGZyb20gXCIuL3NyYy9FZGl0ZWRSZWNvcmRpbmdcIjtcblxuZGVmaW5lKCdsaWIvYmxhY2tib2FyZC9yZWNvcmRlcicsIGZ1bmN0aW9uKCkge1xuXHRyZXR1cm4gZnVuY3Rpb24ob3B0cykge1xuXHRcdGNvbnN0IHBlbkFwaSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCd3dFBsdWdpbicpLnBlbkFQSTtcblxuXHRcdGNvbnN0IGNvbG9ycyA9IG9wdHMuY29sb3JzO1xuXHRcdGZvciAodmFyICRpbnB1dCBvZiBjb2xvcnMpIHtcblx0XHRcdGNvbnN0IGMgPSBKU09OLnBhcnNlKCRpbnB1dC5kYXRhc2V0LmNvbG9yKTtcblx0XHRcdCRpbnB1dC5zdHlsZS5iYWNrZ3JvdW5kQ29sb3IgPSBgcmdiKCR7Y1swXX0sICR7Y1sxXX0sICR7Y1syXX0pYDtcblx0XHR9XG5cblx0XHRjb25zdCByZWNvcmRpbmcgPSBuZXcgRWRpdGVkUmVjb3JkaW5nKCk7XG5cdFx0cmV0dXJuIG5ldyBSZWNvcmRlcihvcHRzLiRjYW52YXMsIG9wdHMuJHRpbWUsIG9wdHMuJG9uYWlyLFxuXHRcdFx0cmVjb3JkaW5nLCBwZW5BcGksIGNvbG9ycywgb3B0cy53b3JrZXJQYXRoLCBvcHRzLm9uU2F2ZSwgb3B0cy4kZXJhc2VyKTtcblx0fTtcbn0pO1xuIiwiLyoqXG4gKiBUaGVyZSBhcmUgZm91ciB0eXBlcyBvZiBjb29yZGluYXRlcy5cbiAqXG4gKiBGaXJzdCB0eXBlIGlzIHRoZSByYXcgKmV2ZW50KiBjb29yZGluYXRlIGZyb21cbiAqIG1vdXNlIGV2ZW50cy4gSXQgbXVzdCBuZXZlciBiZSB1c2VkIGluIHRoZSBhcHBcbiAqIGRpcmVjdGx5IGFzIHRoZXJlIGlzIG5vIHJlbGF0aW9uIHRvIHRoZSBjYW52YXMuXG4gKlxuICogU2Vjb25kIHR5cGUgaXMgdGhlICpsYXllciogY29vcmRpbmF0ZS4gVGhpcyBpc1xuICogdGhlIG9uZSB0aGF0IHNob3VsZCBiZSBwYXNzZWQgYmV0d2VlbiBjb21wb25lbnRzXG4gKiBhbmQgc2F2ZWQgaW4gdGhlIHJlY29yZGluZyBhcyBpdCBjb3JyZWN0cyBmb3IgYWxsXG4gKiBvZmZzZXRzIGFuZCB0cmFuc2xhdGlvbi5cbiAqXG4gKiBUaGlyZHMgdHlwZSBpcyB0aGUgKmNhbnZhcyogY29vcmRpbmF0ZS4gSXQgY29udGFpbnNcbiAqIHJldGluYSByYXRpbyBjb3JyZWN0aW9uLlxuICovXG5leHBvcnQgY2xhc3MgQ29vcmRzIHtcblx0Y29uc3RydWN0b3IocmF0aW8sIGxheWVyT2Zmc2V0KSB7XG5cdFx0dGhpcy5yYXRpbyA9IHJhdGlvO1xuXHRcdHRoaXMub2Zmc2V0ID0ge1xuXHRcdFx0bGF5ZXI6IHtcblx0XHRcdFx0eDogbGF5ZXJPZmZzZXQubGVmdCArIHdpbmRvdy5zY3JvbGxYLFxuXHRcdFx0XHR5OiBsYXllck9mZnNldC50b3AgKyB3aW5kb3cuc2Nyb2xsWSxcblx0XHRcdH0sXG5cdFx0XHRzY3JlZW46IHt4OiAwLCB5OiAwfSxcblx0XHR9O1xuXHR9XG5cblx0ZXZlbnRUb0xheWVyKGV2ZW50KSB7XG5cdFx0cmV0dXJuIHtcblx0XHRcdHg6IGV2ZW50LnBhZ2VYIC0gdGhpcy5vZmZzZXQubGF5ZXIueCArIHRoaXMub2Zmc2V0LnNjcmVlbi54LFxuXHRcdFx0eTogZXZlbnQucGFnZVkgLSB0aGlzLm9mZnNldC5sYXllci55ICsgdGhpcy5vZmZzZXQuc2NyZWVuLnksXG5cdFx0fVxuXHR9XG5cblx0bGF5ZXJUb0NhbnZhcyhjb29yZCkge1xuXHRcdHJldHVybiB7XG5cdFx0XHR4OiB0aGlzLnJhdGlvICogY29vcmQueCxcblx0XHRcdHk6IHRoaXMucmF0aW8gKiBjb29yZC55LFxuXHRcdH07XG5cdH1cbn1cbiIsImltcG9ydCB7UmVjb3JkaW5nfSBmcm9tIFwiLi9SZWNvcmRpbmdcIjtcblxuZXhwb3J0IGNsYXNzIEVkaXRlZFJlY29yZGluZyBleHRlbmRzIFJlY29yZGluZyB7XG5cdGNvbnN0cnVjdG9yKHdpZHRoLCBoZWlnaHQpIHtcblx0XHRzdXBlcigpO1xuXHRcdHRoaXMud2lkdGggPSB3aWR0aDtcblx0XHR0aGlzLmhlaWdodCA9IGhlaWdodDtcblxuXHRcdHRoaXMuZGF0YSA9IFtdO1xuXHR9XG5cblx0bW92ZUN1cnNvcih0aW1lLCBjb29yZHMpIHtcblx0XHR0aGlzLmRhdGEucHVzaCh7XG5cdFx0XHR0aW1lOiB0aW1lLFxuXHRcdFx0dHlwZTogJ2N1cnNvcicsXG5cdFx0XHRsb2M6IGNvb3Jkcyxcblx0XHR9KTtcblx0fVxuXG5cdGVyYXNlKHRpbWUsIGNvb3JkcywgcmFkaXVzKSB7XG5cdFx0dGhpcy5kYXRhLnB1c2goe1xuXHRcdFx0dGltZTogdGltZSxcblx0XHRcdHR5cGU6ICdlcmFzZScsXG5cdFx0XHRsb2M6IGNvb3Jkcyxcblx0XHRcdHJhZGl1czogcmFkaXVzLFxuXHRcdH0pO1xuXHR9XG5cblx0YmVnaW5TdHJva2UodGltZSwgY29vcmRzKSB7XG5cdFx0dGhpcy5kYXRhLnB1c2goe1xuXHRcdFx0dGltZTogdGltZSxcblx0XHRcdHR5cGU6ICdiZWdpblN0cm9rZScsXG5cdFx0XHRsb2M6IGNvb3Jkcyxcblx0XHR9KTtcblx0fVxuXG5cdHN0cm9rZVRvKHRpbWUsIGNvb3Jkcywgd2lkdGgsIGNvbG9yKSB7XG5cdFx0dGhpcy5kYXRhLnB1c2goe1xuXHRcdFx0dGltZTogdGltZSxcblx0XHRcdHR5cGU6ICdzdHJva2VUbycsXG5cdFx0XHRsb2M6IGNvb3Jkcyxcblx0XHRcdHdpZHRoOiB3aWR0aCxcblx0XHRcdGNvbG9yOiBjb2xvcixcblx0XHR9KTtcblx0fVxuXG5cdHBsYWNlU3ZnKHRpbWUsIGNvb3JkcywgZGF0YSkge1xuXHRcdHRoaXMuZGF0YS5wdXNoKHtcblx0XHRcdHRpbWU6IHRpbWUsXG5cdFx0XHR0eXBlOiAnc3ZnJyxcblx0XHRcdGxvYzogY29vcmRzLFxuXHRcdFx0ZGF0YTogZGF0YSxcblx0XHR9KTtcblx0fVxuXG5cdHRyYW5zbGF0ZSh0aW1lLCBvZmZzZXQpIHtcblx0XHR0aGlzLmRhdGEucHVzaCh7XG5cdFx0XHR0aW1lOiB0aW1lLFxuXHRcdFx0dHlwZTogJ3RyYW5zbGF0ZScsXG5cdFx0XHRsb2M6IG9mZnNldCxcblx0XHR9KTtcblx0fVxuXG5cdGdldERhdGEoKSB7XG5cdFx0cmV0dXJuIHRoaXMuZGF0YTtcblx0fVxufVxuIiwiaW1wb3J0IHtSZWNvcmRlcmpzfSBmcm9tIFwiLi4vdmVuZG9yL1JlY29yZGVyXCI7XG5cbmV4cG9ydCBjbGFzcyBNaWMge1xuXHRjb25zdHJ1Y3Rvcih3b3JrZXJQYXRoKSB7XG5cdFx0Y29uc3QgbmF2ID0gd2luZG93Lm5hdmlnYXRvcjtcblx0XHRuYXYuZ2V0VXNlck1lZGlhID0gKFxuXHRcdFx0bmF2LmdldFVzZXJNZWRpYSB8fFxuXHRcdFx0bmF2LndlYmtpdEdldFVzZXJNZWRpYSB8fFxuXHRcdFx0bmF2Lm1vekdldFVzZXJNZWRpYSB8fFxuXHRcdFx0bmF2Lm1zR2V0VXNlck1lZGlhXG5cdFx0KTtcblx0XHR0aGlzLm5hdmlnYXRvciA9IG5hdjtcblxuXHRcdGNvbnN0IEF1ZGlvQ29udGV4dCA9IHdpbmRvdy5BdWRpb0NvbnRleHQgfHwgd2luZG93LndlYmtpdEF1ZGlvQ29udGV4dDtcblx0XHR0aGlzLmNvbnRleHQgPSBuZXcgQXVkaW9Db250ZXh0KCk7XG5cblx0XHR0aGlzLm5hdmlnYXRvci5nZXRVc2VyTWVkaWEoe1xuXHRcdFx0YXVkaW86IHRydWVcblx0XHR9LCBsb2NhbE1lZGlhU3RyZWFtID0+IHtcblx0XHRcdHRoaXMubWVkaWFTdHJlYW0gPSBsb2NhbE1lZGlhU3RyZWFtO1xuXG5cdFx0XHR2YXIgbWVkaWFTdHJlYW1Tb3VyY2UgPSB0aGlzLmNvbnRleHQuY3JlYXRlTWVkaWFTdHJlYW1Tb3VyY2UobG9jYWxNZWRpYVN0cmVhbSk7XG5cdFx0XHR0aGlzLnJlYyA9IG5ldyBSZWNvcmRlcmpzKG1lZGlhU3RyZWFtU291cmNlLCB7XG5cdFx0XHRcdHdvcmtlclBhdGg6IHdvcmtlclBhdGgsXG5cdFx0XHR9KTtcblxuXHRcdH0sIGVyciA9PiB7XG5cdFx0XHRjb25zb2xlLmxvZygnQnJvd3NlciBub3Qgc3VwcG9ydGVkJyk7XG5cdFx0fSk7XG5cdH1cblxuXHRyZWNvcmQoKSB7XG5cdFx0dGhpcy5yZWMucmVjb3JkKCk7XG5cdH1cblxuXHRwYXVzZSgpIHtcblx0XHR0aGlzLnJlYy5zdG9wKCk7XG5cdH1cblxuXHRzdG9wKGNiKSB7XG5cdFx0dGhpcy5wYXVzZSgpO1xuXG5cdFx0dGhpcy5tZWRpYVN0cmVhbS5zdG9wKCk7XG5cdFx0dGhpcy5yZWMuZXhwb3J0V0FWKGUgPT4ge1xuXHRcdFx0Y2IoZSk7XG5cdFx0XHQvL3RoaXMucmVjLmNsZWFyKCk7XG5cdFx0XHQvLyBSZWNvcmRlcmpzLmZvcmNlRG93bmxvYWQoZSwgXCJmaWxlbmFtZS53YXZcIik7XG5cdFx0fSk7XG5cdH1cbn1cbiIsImltcG9ydCB7Q29vcmRzfSBmcm9tICcuL0Nvb3Jkcyc7XG5pbXBvcnQge01pY30gZnJvbSAnLi9NaWMnO1xuXG5leHBvcnQgY2xhc3MgUmVjb3JkZXIge1xuXHRjb25zdHJ1Y3RvcigkY29udGFpbmVyLCAkdGltZSwgJG9uYWlyLCByZWNvcmRpbmcsIHBlbkFwaSwgY29sb3JzLCB3b3JrZXJQYXRoLCBvblNhdmUsICRlcmFzZXIpIHtcblx0XHR0aGlzLnNpemUgPSB7d2lkdGg6IDgwMCwgaGVpZ2h0OiA0NTB9OyAvLzE5MjAvMTA4MCByYXRpb1xuXG5cdFx0Y29uc3QgZXhwYW5kcyA9IHt3aWR0aDogMiwgaGVpZ2h0OiAzfTtcblxuXHRcdHRoaXMuY3R4ID0gdGhpcy5jcmVhdGVDYW52YXModGhpcy5zaXplLndpZHRoICogZXhwYW5kcy53aWR0aCwgdGhpcy5zaXplLmhlaWdodCAqIGV4cGFuZHMuaGVpZ2h0KTtcblx0XHR0aGlzLm9mZnNldE1heCA9IHtcblx0XHRcdHg6IHRoaXMuc2l6ZS53aWR0aCAqIChleHBhbmRzLndpZHRoIC0gMSksXG5cdFx0XHR5OiB0aGlzLnNpemUuaGVpZ2h0ICogKGV4cGFuZHMuaGVpZ2h0IC0gMSksXG5cdFx0fTtcblx0XHR0aGlzLnNjciA9IHRoaXMuY3JlYXRlQ2FudmFzKHRoaXMuc2l6ZS53aWR0aCwgdGhpcy5zaXplLmhlaWdodCk7XG4gICAgICAgICRjb250YWluZXIuYXBwZW5kQ2hpbGQodGhpcy5zY3IuY2FudmFzKTtcblxuXHRcdHRoaXMuJHRpbWUgPSAkdGltZTtcblx0XHR0aGlzLiRvbmFpciA9ICRvbmFpcjtcblx0XHR0aGlzLnBlbkFwaSA9IHBlbkFwaTtcblx0XHR0aGlzLnRpbWUgPSAwO1xuXHRcdHRoaXMucGF1c2VkID0gdHJ1ZTtcblx0XHR0aGlzLmZpcnN0RHJhd0V2ZW50ID0gdHJ1ZTtcblx0XHR0aGlzLmxhc3RDdXJzb3IgPSBudWxsO1xuXHRcdHRoaXMuY29sb3IgPSB7cjogMjU1LCBnOiAxMDAsIGI6IDE1MH07XG5cdFx0dGhpcy5taWMgPSBuZXcgTWljKHdvcmtlclBhdGgpO1xuXHRcdHRoaXMuY29vcmRzID0gbmV3IENvb3Jkcyh0aGlzLnJhdGlvLCB0aGlzLnNjci5jYW52YXMuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkpO1xuXHRcdHRoaXMub25TYXZlID0gb25TYXZlO1xuXHRcdHRoaXMuZXJhc2VyTW9kZSA9IGZhbHNlO1xuXHRcdHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4gPSB7XG5cdFx0XHR4OiB0aGlzLnNpemUud2lkdGggLyAyLCAvLyBpbnRlbnRpb25hbGx5IG5vdCAwIGxlYXZpbmcgYSBsaXR0bGUgYml0IGF1dGhvciB0byBzbGlkZVxuXHRcdFx0eTogdGhpcy5zaXplLmhlaWdodCAvIDIsXG5cdFx0fTtcblxuXHRcdHRoaXMucmVjb3JkaW5nID0gcmVjb3JkaW5nO1xuXHRcdHRoaXMucmVjb3JkaW5nLnRyYW5zbGF0ZSh0aGlzLnRpbWUsIHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4pO1xuXG4gICAgICAgIHRoaXMuc2NyLmNhbnZhcy5hZGRFdmVudExpc3RlbmVyKCdtb3VzZW1vdmUnLCB0aGlzLm9uTW91c2VNb3ZlLmJpbmQodGhpcykpO1xuICAgICAgICB0aGlzLnNjci5jYW52YXMuYWRkRXZlbnRMaXN0ZW5lcignbW91c2Vkb3duJywgdGhpcy5vbk1vdXNlRG93bi5iaW5kKHRoaXMpKTtcbiAgICAgICAgdGhpcy5zY3IuY2FudmFzLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNldXAnLCB0aGlzLm9uTW91c2VVcC5iaW5kKHRoaXMpKTtcbiAgICAgICAgdGhpcy5zY3IuY2FudmFzLmFkZEV2ZW50TGlzdGVuZXIoJ2NvbnRleHRtZW51JywgdGhpcy5vbk1vdXNlRG93bi5iaW5kKHRoaXMpLCBmYWxzZSk7XG5cblx0XHR0aGlzLmNoYW5nZUNvbG9yKGNvbG9yc1swXSk7XG5cblx0XHR0aGlzLnJlZ2lzdGVyRXJhc2VyKCRlcmFzZXIpO1xuXHRcdHRoaXMucmVnaXN0ZXJDb250cm9sQnV0dG9ucyhjb2xvcnMpO1xuXHRcdHRoaXMucmVnaXN0ZXJLZXlzKCk7XG5cdFx0dGhpcy5yZWdpc3RlckZpbGVEcm9wKHRoaXMuc2NyLmNhbnZhcyk7XG5cdH1cblxuXHRyZWdpc3RlckVyYXNlcigkZXJhc2VyKSB7XG5cdFx0Y29uc3QgY2IgPSBmdW5jdGlvbihldmVudCkge1xuXHRcdFx0dGhpcy5lcmFzZXJNb2RlID0gdHJ1ZTtcblx0XHRcdHRoaXMuc2NyLmNhbnZhcy5jbGFzc0xpc3QuYWRkKCdlcmFzZXInKTtcblx0XHR9O1xuXHRcdCRlcmFzZXIuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBjYi5iaW5kKHRoaXMpKTtcblx0fVxuXG5cdHJlZ2lzdGVyQ29udHJvbEJ1dHRvbnMoY29sb3JzKSB7XG5cdFx0Zm9yICh2YXIgJGlucHV0IG9mIGNvbG9ycykge1xuICAgICAgICBcdCRpbnB1dC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRoaXMub25Db2xvckNsaWNrLmJpbmQodGhpcykpO1xuICAgICAgICB9XG5cblx0XHRjb25zdCAkc2F2ZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzYXZlJyk7XG5cdFx0Y29uc3QgdGhhdCA9IHRoaXM7XG5cdFx0JHNhdmUuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBldmVudCA9PiB7XG5cdFx0XHRjb25zdCByZWMgPSB7XG5cdFx0XHRcdGRhdGE6IHRoYXQucmVjb3JkaW5nLmdldERhdGEoKSxcblx0XHRcdFx0c2l6ZTogdGhhdC5zaXplLFxuXHRcdFx0XHRkdXJhdGlvbjogdGhhdC50aW1lLFxuXHRcdFx0XHRtZXRhOiB7XG5cdFx0XHRcdFx0cG9pbnRlclR5cGU6IHRoYXQucGVuQXBpID8gdGhhdC5wZW5BcGkucG9pbnRlclR5cGUgOiBcInVua25vd25cIixcblx0XHRcdFx0XHR0YWJsZXRNb2RlbDogdGhhdC5wZW5BcGkgPyB0aGF0LnBlbkFwaS50YWJsZXRNb2RlbCA6IFwidW5rbm93blwiLFxuXHRcdFx0XHRcdGFnZW50OiBuYXZpZ2F0b3IudXNlckFnZW50LFxuXHRcdFx0XHR9XG5cdFx0XHR9O1xuXG5cdFx0XHRjb25zdCBkYXRhID0gSlNPTi5zdHJpbmdpZnkocmVjKTtcblx0XHRcdHRoaXMubWljLnN0b3AoYXVkaW8gPT4ge1xuXHRcdFx0XHR0aGF0Lm9uU2F2ZShkYXRhLCBhdWRpbyk7XG5cdFx0XHR9KTtcblx0XHR9KTtcblx0fVxuXG5cdHJlZ2lzdGVyRmlsZURyb3AoJGVsKSB7XG5cdFx0Y29uc3QgaGFuZGxlRmlsZVNlbGVjdCA9IGZ1bmN0aW9uKGV2ZW50KSB7XG5cdFx0XHRldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcblx0XHRcdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG5cblx0XHRcdGNvbnN0IGZpbGVzID0gZXZlbnQuZGF0YVRyYW5zZmVyLmZpbGVzO1xuXHRcdFx0aWYgKGZpbGVzLmxlbmd0aCAhPSAxKSB7XG5cdFx0XHRcdHJldHVybiBmYWxzZTtcblx0XHRcdH1cblx0XHRcdGNvbnN0IGZpbGUgPSBmaWxlc1swXTtcblxuXHRcdFx0Y29uc3QgZHJvcFBvc2l0aW9uID0gdGhpcy5jb29yZHMuZXZlbnRUb0xheWVyKGV2ZW50KTtcblx0XHRcdGNvbnN0IHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7XG5cdFx0XHRjb25zdCB0aGF0ID0gdGhpcztcblx0XHRcdHJlYWRlci5vbmxvYWQgPSBmdW5jdGlvbihlKSB7XG5cdFx0XHRcdHRyeSB7XG5cdFx0XHRcdFx0Y29uc3QgaW1nID0gbmV3IEltYWdlKCk7XG5cdFx0XHRcdFx0aW1nLm9ubG9hZCA9IGV2ZW50ID0+IHtcblx0XHRcdFx0XHRcdGNvbnN0IG1vdmVkRHJvcCA9IHtcblx0XHRcdFx0XHRcdFx0Ly8gaW1nIHNpemVzIGFyZSBhbHNvIGJvdGggbXVsdGlwbGllZCBhbmQgZGl2aWRlZCBieSByYXRpbyBoZXJlXG5cdFx0XHRcdFx0XHRcdHg6IGRyb3BQb3NpdGlvbi54IC0gaW1nLndpZHRoIC8gMixcblx0XHRcdFx0XHRcdFx0eTogZHJvcFBvc2l0aW9uLnkgLSBpbWcuaGVpZ2h0IC8gMixcblx0XHRcdFx0XHRcdH07XG5cdFx0XHRcdFx0XHRjb25zdCBjb29yZHMgPSB0aGF0LmNvb3Jkcy5sYXllclRvQ2FudmFzKG1vdmVkRHJvcCk7XG5cdFx0XHRcdFx0XHR0aGF0LmN0eC5kcmF3SW1hZ2UoaW1nLCBjb29yZHMueCwgY29vcmRzLnksXG5cdFx0XHRcdFx0XHRcdGltZy5uYXR1cmFsV2lkdGggKiB0aGF0LnJhdGlvLCBpbWcubmF0dXJhbEhlaWdodCAqIHRoYXQucmF0aW8pO1xuXHRcdFx0XHRcdFx0dGhhdC5yZWNvcmRpbmcucGxhY2VTdmcodGhhdC50aW1lLCBtb3ZlZERyb3AsIGltZy5zcmMpO1xuXHRcdFx0XHRcdFx0dGhhdC5yZWRyYXcoKTtcblx0XHRcdFx0XHR9O1xuXHRcdFx0XHRcdGltZy5zcmMgPSBlLnRhcmdldC5yZXN1bHQ7XG5cblx0XHRcdFx0fSBjYXRjaCAoZSkge1xuXHRcdFx0XHRcdC8vIHN1cHBsaWVkIGZpbGUgd2FzIHByb2JhYmx5IG5vdCBhIHN1cHBvcnRlZCBpbWFnZVxuXHRcdFx0XHR9XG5cdFx0XHR9O1xuXHRcdFx0cmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSk7XG5cdFx0fTtcblxuXHRcdGNvbnN0IGhhbmRsZURyYWdPdmVyID0gZnVuY3Rpb24oZXZlbnQpIHtcblx0XHRcdGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuXHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0XHQgICAgZXZlbnQuZGF0YVRyYW5zZmVyLmRyb3BFZmZlY3QgPSAnY29weSc7XG5cdFx0fTtcblxuXHRcdCRlbC5hZGRFdmVudExpc3RlbmVyKCdkcmFnb3ZlcicsIGhhbmRsZURyYWdPdmVyLmJpbmQodGhpcyksIGZhbHNlKTtcblx0XHQkZWwuYWRkRXZlbnRMaXN0ZW5lcignZHJvcCcsIGhhbmRsZUZpbGVTZWxlY3QuYmluZCh0aGlzKSwgZmFsc2UpO1xuXHR9XG5cblx0cmVnaXN0ZXJLZXkoY29kZSwgY2IpIHtcblx0XHRkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdrZXlkb3duJywgZXZlbnQgPT4ge1xuXHRcdFx0aWYgKGV2ZW50LnRhcmdldC50YWdOYW1lID09PSAnSU5QVVQnKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblx0XHRcdGlmIChldmVudC5rZXlDb2RlICE9PSBjb2RlKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0Y2IoZXZlbnQpO1xuXHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0XHR9KTtcblx0fVxuXG5cdHJlZ2lzdGVyS2V5cygpIHtcblx0XHQvLyBzcGFjZVxuXHRcdHRoaXMucmVnaXN0ZXJLZXkoMzIsIGV2ZW50ID0+IHtcblx0XHRcdGlmICh0aGlzLnBhdXNlZCkge1xuXHRcdFx0XHR0aGlzLnBhdXNlZCA9IGZhbHNlO1xuXHRcdFx0XHR0aGlzLiRvbmFpci50ZXh0Q29udGVudCA9ICdyZWNvcmRpbmcnO1xuXHRcdFx0XHRyZXF1ZXN0QW5pbWF0aW9uRnJhbWUodGhpcy50aWNrLmJpbmQodGhpcykpO1xuXHRcdFx0XHR0aGlzLm1pYy5yZWNvcmQoKTtcblxuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0dGhpcy5taWMucGF1c2UoKTtcblx0XHRcdFx0dGhpcy4kb25haXIudGV4dENvbnRlbnQgPSAnJztcblx0XHRcdFx0dGhpcy5wYXVzZWQgPSB0cnVlO1xuXHRcdFx0fVxuXHRcdH0pO1xuXHR9XG5cblx0dGljayh0aW1lc3RhbXApIHtcblx0XHR0aGlzLiR0aW1lLnRleHRDb250ZW50ID0gKHRoaXMudGltZSAvIDEwMDApLnRvRml4ZWQoMik7XG5cblx0XHRpZiAoIXRoaXMucGF1c2VkKSB7XG5cdFx0XHRjb25zdCBsYXN0ID0gdGltZXN0YW1wO1xuXHRcdFx0cmVxdWVzdEFuaW1hdGlvbkZyYW1lKHRpbWVzdGFtcCA9PiB7XG5cdFx0XHRcdHRoaXMudGltZSArPSB0aW1lc3RhbXAgLSBsYXN0O1xuXHRcdFx0XHR0aGlzLnRpY2sodGltZXN0YW1wKTtcblx0XHRcdH0pO1xuXHRcdH1cblx0fVxuXG5cdGNyZWF0ZUNhbnZhcyh3aWR0aCwgaGVpZ2h0KSB7XG5cdFx0Y29uc3QgJGNhbnZhcyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2NhbnZhcycpO1xuXHRcdCRjYW52YXMud2lkdGggPSB3aWR0aDtcbiAgICAgICAgJGNhbnZhcy5oZWlnaHQgPSBoZWlnaHQ7XG5cbiAgICAgICAgaWYgKCF0aGlzLnJhdGlvKSB7XG4gICAgICAgIFx0dGhpcy5yYXRpbyA9IHRoaXMuZ2V0UmF0aW8oJGNhbnZhcyk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5zY2FsZUNhbnZhcygkY2FudmFzLCB0aGlzLnJhdGlvKTtcblxuICAgICAgICBjb25zdCBjdHggPSAkY2FudmFzLmdldENvbnRleHQoJzJkJyk7XG4gICAgICAgIGN0eC5jbGVhckFsbCA9IGZ1bmN0aW9uKCkge1xuICAgICAgICBcdGN0eC5jbGVhclJlY3QoMCwgMCwgJGNhbnZhcy53aWR0aCwgJGNhbnZhcy5oZWlnaHQpO1xuICAgICAgICB9O1xuICAgICAgICByZXR1cm4gY3R4O1xuXHR9XG5cblx0Z2V0UmF0aW8oJGNhbnZhcykge1xuXHRcdGNvbnN0IGNvbnRleHQgPSAkY2FudmFzLmdldENvbnRleHQoJzJkJyk7XG5cdFx0Y29uc3QgZGV2aWNlUGl4ZWxSYXRpbyA9IHdpbmRvdy5kZXZpY2VQaXhlbFJhdGlvIHx8IDE7XG4gICAgICAgIGNvbnN0IGJhY2tpbmdTdG9yZVJhdGlvID0gY29udGV4dC53ZWJraXRCYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgIFx0fHwgY29udGV4dC5tb3pCYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgICAgICB8fCBjb250ZXh0Lm1zQmFja2luZ1N0b3JlUGl4ZWxSYXRpb1xuICAgICAgICAgICAgfHwgY29udGV4dC5vQmFja2luZ1N0b3JlUGl4ZWxSYXRpb1xuICAgICAgICAgICAgfHwgY29udGV4dC5iYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgICAgICB8fCAxO1xuXG4gICAgICAgIHJldHVybiBkZXZpY2VQaXhlbFJhdGlvIC8gYmFja2luZ1N0b3JlUmF0aW87XG5cdH1cblxuXHRzY2FsZUNhbnZhcygkY2FudmFzLCByYXRpbykge1xuICAgICAgICBjb25zdCBvbGRXaWR0aCA9ICRjYW52YXMud2lkdGg7XG4gICAgICAgIGNvbnN0IG9sZEhlaWdodCA9ICRjYW52YXMuaGVpZ2h0O1xuXG4gICAgICAgICRjYW52YXMud2lkdGggPSBvbGRXaWR0aCAqIHJhdGlvO1xuICAgICAgICAkY2FudmFzLmhlaWdodCA9IG9sZEhlaWdodCAqIHJhdGlvO1xuXG4gICAgICAgICRjYW52YXMuc3R5bGUud2lkdGggPSBvbGRXaWR0aCArICdweCc7XG4gICAgICAgICRjYW52YXMuc3R5bGUuaGVpZ2h0ID0gb2xkSGVpZ2h0ICsgJ3B4Jztcblx0fVxuXG5cdG9uQ29sb3JDbGljayhldmVudCkge1xuXHRcdGlmIChldmVudC50YXJnZXQuaWQgIT09ICdlcmFzZXInKSB7XG5cdFx0XHR0aGlzLmVyYXNlck1vZGUgPSBmYWxzZTtcblx0XHRcdHRoaXMuc2NyLmNhbnZhcy5jbGFzc0xpc3QucmVtb3ZlKCdlcmFzZXInKTtcblx0XHR9XG5cblx0XHR0aGlzLmNoYW5nZUNvbG9yKGV2ZW50LnRhcmdldCk7XG5cdH1cblxuXHRjaGFuZ2VDb2xvcih0YXJnZXQpIHtcblx0XHRjb25zdCBhcnIgPSBKU09OLnBhcnNlKHRhcmdldC5kYXRhc2V0LmNvbG9yKTtcblxuXHRcdGlmIChldmVudC50YXJnZXQuaWQgIT09ICdlcmFzZXInKSB7XG5cdFx0XHR0aGlzLmNvbG9yID0ge3I6IGFyclswXSwgZzogYXJyWzFdLCBiOiBhcnJbMl19O1xuXHRcdH1cblxuXHRcdGlmICh0aGlzLmxhc3RDb2xvcikge1xuXHRcdFx0dGhpcy5sYXN0Q29sb3IuY2xhc3NMaXN0LnJlbW92ZSgnYWN0aXZlJyk7XG5cdFx0fVxuXHRcdHRhcmdldC5jbGFzc0xpc3QuYWRkKCdhY3RpdmUnKTtcblx0XHR0aGlzLmxhc3RDb2xvciA9IHRhcmdldDtcblx0fVxuXG5cdG1vdXNlQnV0dG9uKGV2ZW50KSB7XG5cdFx0cmV0dXJuIFwiZXZlbnRcIiBpbiB3aW5kb3cgJiYgXCJidXR0b25zXCIgaW4gd2luZG93LmV2ZW50XG5cdFx0XHQ/IHdpbmRvdy5ldmVudC5idXR0b25zIC8vIEludGVybmV0IEV4cGxvcmVyXG5cdFx0XHQ6IChcImJ1dHRvbnNcIiBpbiBldmVudFxuXHRcdFx0XHQ/IGV2ZW50LmJ1dHRvbnMgLy8gRmlyZWZveFxuXHRcdFx0XHQ6IGV2ZW50LndoaWNoIC8vIENocm9tZVxuXHRcdFx0KTtcblx0fVxuXG5cdHNldFRyYW5zbGF0aW9uQmFzZShldmVudCkge1xuXHRcdHRoaXMudHJhbnNsYXRpb25CYXNlID0ge1xuXHRcdFx0eDogdGhpcy5jb29yZHMub2Zmc2V0LnNjcmVlbi54ICsgZXZlbnQucGFnZVgsXG5cdFx0XHR5OiB0aGlzLmNvb3Jkcy5vZmZzZXQuc2NyZWVuLnkgKyBldmVudC5wYWdlWSxcblx0XHR9O1xuXHR9XG5cblx0b25Nb3VzZURvd24oZXZlbnQpIHtcblx0XHRjb25zdCBidXR0b24gPSB0aGlzLm1vdXNlQnV0dG9uKGV2ZW50KTtcblx0XHRpZiAoYnV0dG9uID09IDIpIHtcblx0XHRcdGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuXHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0XHRcdHRoaXMuc2V0VHJhbnNsYXRpb25CYXNlKGV2ZW50KTtcblx0XHR9XG5cblx0XHRjb25zdCBsYXllckNvb3JkcyA9IHRoaXMuY29vcmRzLmV2ZW50VG9MYXllcihldmVudCk7XG5cdFx0dGhpcy5sYXN0Q3Vyc29yID0gbGF5ZXJDb29yZHM7XG5cdFx0dGhpcy5sYXN0T25zY3JlZW4gPSB0aGlzLmNvb3Jkcy5sYXllclRvQ2FudmFzKGxheWVyQ29vcmRzKTtcblx0fVxuXG5cdG9uTW91c2VVcChldmVudCkge1xuXHRcdHRoaXMudHJhbnNsYXRpb25CYXNlID0gbnVsbDtcblx0fVxuXG5cdG9uTW91c2VNb3ZlKGV2ZW50KSB7XG5cdFx0aWYgKHRoaXMucGF1c2VkKSB7XG5cdFx0XHRyZXR1cm47XG5cdFx0fVxuXG5cdFx0Y29uc3QgY3Vyc29yID0gdGhpcy5jb29yZHMuZXZlbnRUb0xheWVyKGV2ZW50KTtcblx0XHRjb25zdCBidXR0b24gPSB0aGlzLm1vdXNlQnV0dG9uKGV2ZW50KTtcblx0XHRpZiAoYnV0dG9uID09IDIpIHtcblx0XHRcdGlmICghdGhpcy50cmFuc2xhdGlvbkJhc2UpIHtcblx0XHRcdFx0dGhpcy5zZXRUcmFuc2xhdGlvbkJhc2UoZXZlbnQpO1xuXHRcdFx0XHRyZXR1cm47XG5cdFx0XHR9XG5cdFx0XHRjb25zdCBvZmZzZXQgPSB7XG5cdFx0XHRcdHg6IE1hdGgubWluKHRoaXMub2Zmc2V0TWF4LngsIE1hdGgubWF4KDAsIHRoaXMudHJhbnNsYXRpb25CYXNlLnggLSBldmVudC5wYWdlWCkpLFxuXHRcdFx0XHR5OiBNYXRoLm1pbih0aGlzLm9mZnNldE1heC55LCBNYXRoLm1heCgwLCB0aGlzLnRyYW5zbGF0aW9uQmFzZS55IC0gZXZlbnQucGFnZVkpKSxcblx0XHRcdH07XG5cdFx0XHR0aGlzLmNvb3Jkcy5vZmZzZXQuc2NyZWVuID0gb2Zmc2V0O1xuXHRcdFx0dGhpcy5yZWNvcmRpbmcudHJhbnNsYXRlKHRoaXMudGltZSwgb2Zmc2V0KTtcblxuXHRcdH0gZWxzZSBpZiAoYnV0dG9uID09IDEpIHtcblx0XHRcdGNvbnN0IG9uc2NyZWVuID0gdGhpcy5jb29yZHMubGF5ZXJUb0NhbnZhcyhjdXJzb3IpO1xuXHRcdFx0aWYgKHRoaXMuZXJhc2VyTW9kZSkge1xuXHRcdFx0XHRjb25zdCByYWRpdXMgPSAxMSAqIHRoaXMucmF0aW87XG5cdFx0XHRcdHRoaXMucmVjb3JkaW5nLmVyYXNlKHRoaXMudGltZSwgY3Vyc29yLCByYWRpdXMpO1xuXG5cdFx0XHRcdGNvbnN0IGNhbnZhcyA9IHRoaXMuY3R4LmNhbnZhcztcblx0XHRcdFx0dGhpcy5jdHguc2F2ZSgpO1xuXHRcdFx0XHR0aGlzLmN0eC5iZWdpblBhdGgoKTtcblx0XHRcdFx0dGhpcy5jdHguYXJjKG9uc2NyZWVuLngsIG9uc2NyZWVuLnksIHJhZGl1cywgMCwgTWF0aC5QSSoyLCB0cnVlKTtcblx0XHRcdFx0dGhpcy5jdHguY2xpcCgpO1xuXHRcdFx0XHR0aGlzLmN0eC5jbGVhclJlY3QoMCwgMCwgY2FudmFzLndpZHRoLCBjYW52YXMuaGVpZ2h0KTtcblx0XHRcdFx0dGhpcy5jdHgucmVzdG9yZSgpO1xuXG5cdFx0XHR9IGVsc2UgaWYgKHRoaXMuZmlyc3REcmF3RXZlbnQpIHtcblx0XHRcdFx0dGhpcy5maXJzdERyYXdFdmVudCA9IGZhbHNlO1xuXHRcdFx0XHR0aGlzLnJlY29yZGluZy5iZWdpblN0cm9rZSh0aGlzLnRpbWUsIGN1cnNvcik7XG5cdFx0XHRcdHRoaXMuY3R4Lm1vdmVUbyhvbnNjcmVlbi54LCBvbnNjcmVlbi55KTtcblxuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0Y29uc3QgYmFzZWxpbmUgPSAxO1xuXHRcdFx0XHRjb25zdCB3aWR0aCA9IHRoaXMucGVuQXBpID8gKDEgKyA0ICogdGhpcy5wZW5BcGkucHJlc3N1cmUpICogYmFzZWxpbmUgOiBiYXNlbGluZSAqIDM7XG5cdFx0XHRcdHRoaXMucmVjb3JkaW5nLnN0cm9rZVRvKHRoaXMudGltZSwgY3Vyc29yLCB3aWR0aCwgdGhpcy5jb2xvcik7XG5cblx0XHRcdFx0dGhpcy5jdHguYmVnaW5QYXRoKCk7XG5cdFx0XHRcdGlmICh0aGlzLmxhc3RPbnNjcmVlbikge1xuXHRcdFx0XHRcdHRoaXMuY3R4Lm1vdmVUbyh0aGlzLmxhc3RPbnNjcmVlbi54LCB0aGlzLmxhc3RPbnNjcmVlbi55KTtcblx0XHRcdFx0fVxuXHRcdFx0XHR0aGlzLmN0eC5saW5lV2lkdGggPSB3aWR0aDtcblx0XHRcdFx0dGhpcy5jdHguc3Ryb2tlU3R5bGUgPSBgcmdiKCR7dGhpcy5jb2xvci5yfSwgJHt0aGlzLmNvbG9yLmd9LCAke3RoaXMuY29sb3IuYn0pYDtcblx0XHRcdFx0dGhpcy5jdHgubGluZVRvKG9uc2NyZWVuLngsIG9uc2NyZWVuLnkpO1xuXHRcdFx0XHR0aGlzLmN0eC5zdHJva2UoKTtcblx0XHRcdFx0dGhpcy5sYXN0T25zY3JlZW4gPSBvbnNjcmVlbjtcblx0XHRcdH1cblxuXHRcdH0gZWxzZSB7XG5cdFx0XHR0aGlzLmZpcnN0RHJhd0V2ZW50ID0gdHJ1ZTtcblx0XHRcdHRoaXMucmVjb3JkaW5nLm1vdmVDdXJzb3IodGhpcy50aW1lLCBjdXJzb3IpO1xuXHRcdFx0dGhpcy5sYXN0T25zY3JlZW4gPSBudWxsO1xuXHRcdH1cblxuXHRcdHRoaXMucmVkcmF3KCk7XG5cdH1cblxuXHRyZWRyYXcoKSB7XG5cdFx0dGhpcy5zY3IuY2xlYXJBbGwoKTtcblx0XHRjb25zdCBjYW4gPSB0aGlzLmN0eC5jYW52YXM7XG5cdFx0Y29uc3Qgc2NyY2FuID0gdGhpcy5zY3IuY2FudmFzO1xuXHRcdGNvbnN0IG9mZnNldCA9IHRoaXMuY29vcmRzLmxheWVyVG9DYW52YXModGhpcy5jb29yZHMub2Zmc2V0LnNjcmVlbik7XG5cdFx0dGhpcy5zY3IuZHJhd0ltYWdlKGNhbixcblx0XHRcdG9mZnNldC54LCBvZmZzZXQueSxcblx0XHRcdHNjcmNhbi53aWR0aCwgc2NyY2FuLmhlaWdodCxcblx0XHRcdDAsIDAsXG5cdFx0XHRzY3JjYW4ud2lkdGgsIHNjcmNhbi5oZWlnaHRcblx0XHQpO1xuXHR9XG5cbn1cbiIsImV4cG9ydCBjbGFzcyBSZWNvcmRpbmcge1xuXHRnZXREYXRhKCkge31cblx0Z2V0U291bmRQYXRoKCkge31cbn1cbiIsImV4cG9ydCBjbGFzcyBSZWNvcmRlcmpzIHtcbiAgY29uc3RydWN0b3Ioc291cmNlLCBjZmcpIHtcbiAgICB2YXIgY29uZmlnID0gY2ZnIHx8IHt9O1xuICAgIHZhciBidWZmZXJMZW4gPSBjb25maWcuYnVmZmVyTGVuIHx8IDQwOTY7XG4gICAgdmFyIG51bUNoYW5uZWxzID0gY29uZmlnLm51bUNoYW5uZWxzIHx8IDI7XG4gICAgdGhpcy5jb250ZXh0ID0gc291cmNlLmNvbnRleHQ7XG4gICAgdGhpcy5ub2RlID0gKHRoaXMuY29udGV4dC5jcmVhdGVTY3JpcHRQcm9jZXNzb3IgfHxcbiAgICAgICAgICAgICAgICAgdGhpcy5jb250ZXh0LmNyZWF0ZUphdmFTY3JpcHROb2RlKS5jYWxsKHRoaXMuY29udGV4dCxcbiAgICAgICAgICAgICAgICAgYnVmZmVyTGVuLCBudW1DaGFubmVscywgbnVtQ2hhbm5lbHMpO1xuICAgIHZhciB3b3JrZXIgPSBuZXcgV29ya2VyKGNvbmZpZy53b3JrZXJQYXRoIHx8ICdyZWNvcmRlcldvcmtlci5qcycpO1xuICAgIHdvcmtlci5wb3N0TWVzc2FnZSh7XG4gICAgICBjb21tYW5kOiAnaW5pdCcsXG4gICAgICBjb25maWc6IHtcbiAgICAgICAgc2FtcGxlUmF0ZTogdGhpcy5jb250ZXh0LnNhbXBsZVJhdGUsXG4gICAgICAgIG51bUNoYW5uZWxzOiBudW1DaGFubmVsc1xuICAgICAgfVxuICAgIH0pO1xuICAgIHZhciByZWNvcmRpbmcgPSBmYWxzZSwgY3VyckNhbGxiYWNrO1xuXG4gICAgdGhpcy5ub2RlLm9uYXVkaW9wcm9jZXNzID0gZnVuY3Rpb24oZSl7XG4gICAgICBpZiAoIXJlY29yZGluZykgcmV0dXJuO1xuICAgICAgdmFyIGJ1ZmZlciA9IFtdO1xuICAgICAgZm9yICh2YXIgY2hhbm5lbCA9IDA7IGNoYW5uZWwgPCBudW1DaGFubmVsczsgY2hhbm5lbCsrKXtcbiAgICAgICAgICBidWZmZXIucHVzaChlLmlucHV0QnVmZmVyLmdldENoYW5uZWxEYXRhKGNoYW5uZWwpKTtcbiAgICAgIH1cbiAgICAgIHdvcmtlci5wb3N0TWVzc2FnZSh7XG4gICAgICAgIGNvbW1hbmQ6ICdyZWNvcmQnLFxuICAgICAgICBidWZmZXI6IGJ1ZmZlclxuICAgICAgfSk7XG4gICAgfVxuXG4gICAgdGhpcy5jb25maWd1cmUgPSBmdW5jdGlvbihjZmcpe1xuICAgICAgZm9yICh2YXIgcHJvcCBpbiBjZmcpe1xuICAgICAgICBpZiAoY2ZnLmhhc093blByb3BlcnR5KHByb3ApKXtcbiAgICAgICAgICBjb25maWdbcHJvcF0gPSBjZmdbcHJvcF07XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9XG5cbiAgICB0aGlzLnJlY29yZCA9IGZ1bmN0aW9uKCl7XG4gICAgICByZWNvcmRpbmcgPSB0cnVlO1xuICAgIH1cblxuICAgIHRoaXMuc3RvcCA9IGZ1bmN0aW9uKCl7XG4gICAgICByZWNvcmRpbmcgPSBmYWxzZTtcbiAgICB9XG5cbiAgICB0aGlzLmNsZWFyID0gZnVuY3Rpb24oKXtcbiAgICAgIHdvcmtlci5wb3N0TWVzc2FnZSh7IGNvbW1hbmQ6ICdjbGVhcicgfSk7XG4gICAgfVxuXG4gICAgdGhpcy5nZXRCdWZmZXIgPSBmdW5jdGlvbihjYikge1xuICAgICAgY3VyckNhbGxiYWNrID0gY2IgfHwgY29uZmlnLmNhbGxiYWNrO1xuICAgICAgd29ya2VyLnBvc3RNZXNzYWdlKHsgY29tbWFuZDogJ2dldEJ1ZmZlcicgfSlcbiAgICB9XG5cbiAgICB0aGlzLmV4cG9ydFdBViA9IGZ1bmN0aW9uKGNiLCB0eXBlKXtcbiAgICAgIGN1cnJDYWxsYmFjayA9IGNiIHx8IGNvbmZpZy5jYWxsYmFjaztcbiAgICAgIHR5cGUgPSB0eXBlIHx8IGNvbmZpZy50eXBlIHx8ICdhdWRpby93YXYnO1xuICAgICAgaWYgKCFjdXJyQ2FsbGJhY2spIHRocm93IG5ldyBFcnJvcignQ2FsbGJhY2sgbm90IHNldCcpO1xuICAgICAgd29ya2VyLnBvc3RNZXNzYWdlKHtcbiAgICAgICAgY29tbWFuZDogJ2V4cG9ydFdBVicsXG4gICAgICAgIHR5cGU6IHR5cGVcbiAgICAgIH0pO1xuICAgIH1cblxuICAgIHdvcmtlci5vbm1lc3NhZ2UgPSBmdW5jdGlvbihlKXtcbiAgICAgIHZhciBibG9iID0gZS5kYXRhO1xuICAgICAgY3VyckNhbGxiYWNrKGJsb2IpO1xuICAgIH1cblxuICAgIHNvdXJjZS5jb25uZWN0KHRoaXMubm9kZSk7XG4gICAgdGhpcy5ub2RlLmNvbm5lY3QodGhpcy5jb250ZXh0LmRlc3RpbmF0aW9uKTsgICAgLy90aGlzIHNob3VsZCBub3QgYmUgbmVjZXNzYXJ5XG4gIH1cblxuICBzdGF0aWMgZm9yY2VEb3dubG9hZChibG9iLCBmaWxlbmFtZSkge1xuICAgIHZhciB1cmwgPSAod2luZG93LlVSTCB8fCB3aW5kb3cud2Via2l0VVJMKS5jcmVhdGVPYmplY3RVUkwoYmxvYik7XG4gICAgdmFyIGxpbmsgPSB3aW5kb3cuZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnYScpO1xuICAgIGxpbmsuaHJlZiA9IHVybDtcbiAgICBsaW5rLmRvd25sb2FkID0gZmlsZW5hbWUgfHwgJ291dHB1dC53YXYnO1xuICAgIHZhciBjbGljayA9IGRvY3VtZW50LmNyZWF0ZUV2ZW50KFwiRXZlbnRcIik7XG4gICAgY2xpY2suaW5pdEV2ZW50KFwiY2xpY2tcIiwgdHJ1ZSwgdHJ1ZSk7XG4gICAgbGluay5kaXNwYXRjaEV2ZW50KGNsaWNrKTtcbiAgfVxufVxuIl19
