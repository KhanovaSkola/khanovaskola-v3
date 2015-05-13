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
		return new _Recorder.Recorder(opts.$canvas, opts.$time, opts.$onair, recording, penApi, colors, opts.workerPath, opts.onSave);
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
	function Recorder($container, $time, $onair, recording, penApi, colors, workerPath, onSave) {
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

		this.registerControlButtons(colors);
		this.registerKeys();
		this.registerFileDrop(this.scr.canvas);
	}

	_createClass(Recorder, [{
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
			this.changeColor(event.target);
		}
	}, {
		key: 'changeColor',
		value: function changeColor(target) {
			var arr = JSON.parse(target.dataset.color);
			this.color = { r: arr[0], g: arr[1], b: arr[2] };
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
				if (this.firstDrawEvent) {
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
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC9yZWNvcmRlci5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9Db29yZHMuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC9zcmMvRWRpdGVkUmVjb3JkaW5nLmpzIiwiL1VzZXJzL21pa3VsYXMvUHJvamVjdHMva2hhbm92YXNrb2xhL3d3dy9saWJzL2JsYWNrYm9hcmQvc3JjL01pYy5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9SZWNvcmRlci5qcyIsIi9Vc2Vycy9taWt1bGFzL1Byb2plY3RzL2toYW5vdmFza29sYS93d3cvbGlicy9ibGFja2JvYXJkL3NyYy9SZWNvcmRpbmcuanMiLCIvVXNlcnMvbWlrdWxhcy9Qcm9qZWN0cy9raGFub3Zhc2tvbGEvd3d3L2xpYnMvYmxhY2tib2FyZC92ZW5kb3IvUmVjb3JkZXIuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7Ozt3QkNBdUIsZ0JBQWdCOzsrQkFDVCx1QkFBdUI7O0FBRXJELE1BQU0sQ0FBQyx5QkFBeUIsRUFBRSxZQUFXO0FBQzVDLFFBQU8sVUFBUyxJQUFJLEVBQUU7QUFDckIsTUFBTSxNQUFNLEdBQUcsUUFBUSxDQUFDLGNBQWMsQ0FBQyxVQUFVLENBQUMsQ0FBQyxNQUFNLENBQUM7O0FBRTFELE1BQU0sTUFBTSxHQUFHLElBQUksQ0FBQyxNQUFNLENBQUM7Ozs7OztBQUMzQix3QkFBbUIsTUFBTSw4SEFBRTtRQUFsQixNQUFNOztBQUNkLFFBQU0sQ0FBQyxHQUFH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SyxHQUFHLFFBQVEsQ0FBQyxXQUFXLENBQUMsT0FBTyxDQUFDLENBQUM7QUFDMUMsV0FBSyxDQUFDLFNBQVMsQ0FBQyxPQUFPLEVBQUUsSUFBSSxFQUFFLElBQUksQ0FBQyxDQUFDO0FBQ3JDLFVBQUksQ0FBQyxhQUFhLENBQUMsS0FBSyxDQUFDLENBQUM7S0FDM0I7OztTQW5GVSxVQUFVOzs7UUFBVixVQUFVLEdBQVYsVUFBVSIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt2YXIgZj1uZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpO3Rocm93IGYuY29kZT1cIk1PRFVMRV9OT1RfRk9VTkRcIixmfXZhciBsPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChsLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGwsbC5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkiLCJpbXBvcnQge1JlY29yZGVyfSBmcm9tIFwiLi9zcmMvUmVjb3JkZXJcIjtcbmltcG9ydCB7RWRpdGVkUmVjb3JkaW5nfSBmcm9tIFwiLi9zcmMvRWRpdGVkUmVjb3JkaW5nXCI7XG5cbmRlZmluZSgnbGliL2JsYWNrYm9hcmQvcmVjb3JkZXInLCBmdW5jdGlvbigpIHtcblx0cmV0dXJuIGZ1bmN0aW9uKG9wdHMpIHtcblx0XHRjb25zdCBwZW5BcGkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnd3RQbHVnaW4nKS5wZW5BUEk7XG5cblx0XHRjb25zdCBjb2xvcnMgPSBvcHRzLmNvbG9ycztcblx0XHRmb3IgKHZhciAkaW5wdXQgb2YgY29sb3JzKSB7XG5cdFx0XHRjb25zdCBjID0gSlNPTi5wYXJzZSgkaW5wdXQuZGF0YXNldC5jb2xvcik7XG5cdFx0XHQkaW5wdXQuc3R5bGUuYmFja2dyb3VuZENvbG9yID0gYHJnYigke2NbMF19LCAke2NbMV19LCAke2NbMl19KWA7XG5cdFx0fVxuXG5cdFx0Y29uc3QgcmVjb3JkaW5nID0gbmV3IEVkaXRlZFJlY29yZGluZygpO1xuXHRcdHJldHVybiBuZXcgUmVjb3JkZXIob3B0cy4kY2FudmFzLCBvcHRzLiR0aW1lLCBvcHRzLiRvbmFpcixcblx0XHRcdHJlY29yZGluZywgcGVuQXBpLCBjb2xvcnMsIG9wdHMud29ya2VyUGF0aCwgb3B0cy5vblNhdmUpO1xuXHR9O1xufSk7XG4iLCIvKipcbiAqIFRoZXJlIGFyZSBmb3VyIHR5cGVzIG9mIGNvb3JkaW5hdGVzLlxuICpcbiAqIEZpcnN0IHR5cGUgaXMgdGhlIHJhdyAqZXZlbnQqIGNvb3JkaW5hdGUgZnJvbVxuICogbW91c2UgZXZlbnRzLiBJdCBtdXN0IG5ldmVyIGJlIHVzZWQgaW4gdGhlIGFwcFxuICogZGlyZWN0bHkgYXMgdGhlcmUgaXMgbm8gcmVsYXRpb24gdG8gdGhlIGNhbnZhcy5cbiAqXG4gKiBTZWNvbmQgdHlwZSBpcyB0aGUgKmxheWVyKiBjb29yZGluYXRlLiBUaGlzIGlzXG4gKiB0aGUgb25lIHRoYXQgc2hvdWxkIGJlIHBhc3NlZCBiZXR3ZWVuIGNvbXBvbmVudHNcbiAqIGFuZCBzYXZlZCBpbiB0aGUgcmVjb3JkaW5nIGFzIGl0IGNvcnJlY3RzIGZvciBhbGxcbiAqIG9mZnNldHMgYW5kIHRyYW5zbGF0aW9uLlxuICpcbiAqIFRoaXJkcyB0eXBlIGlzIHRoZSAqY2FudmFzKiBjb29yZGluYXRlLiBJdCBjb250YWluc1xuICogcmV0aW5hIHJhdGlvIGNvcnJlY3Rpb24uXG4gKi9cbmV4cG9ydCBjbGFzcyBDb29yZHMge1xuXHRjb25zdHJ1Y3RvcihyYXRpbywgbGF5ZXJPZmZzZXQpIHtcblx0XHR0aGlzLnJhdGlvID0gcmF0aW87XG5cdFx0dGhpcy5vZmZzZXQgPSB7XG5cdFx0XHRsYXllcjoge1xuXHRcdFx0XHR4OiBsYXllck9mZnNldC5sZWZ0ICsgd2luZG93LnNjcm9sbFgsXG5cdFx0XHRcdHk6IGxheWVyT2Zmc2V0LnRvcCArIHdpbmRvdy5zY3JvbGxZLFxuXHRcdFx0fSxcblx0XHRcdHNjcmVlbjoge3g6IDAsIHk6IDB9LFxuXHRcdH07XG5cdH1cblxuXHRldmVudFRvTGF5ZXIoZXZlbnQpIHtcblx0XHRyZXR1cm4ge1xuXHRcdFx0eDogZXZlbnQucGFnZVggLSB0aGlzLm9mZnNldC5sYXllci54ICsgdGhpcy5vZmZzZXQuc2NyZWVuLngsXG5cdFx0XHR5OiBldmVudC5wYWdlWSAtIHRoaXMub2Zmc2V0LmxheWVyLnkgKyB0aGlzLm9mZnNldC5zY3JlZW4ueSxcblx0XHR9XG5cdH1cblxuXHRsYXllclRvQ2FudmFzKGNvb3JkKSB7XG5cdFx0cmV0dXJuIHtcblx0XHRcdHg6IHRoaXMucmF0aW8gKiBjb29yZC54LFxuXHRcdFx0eTogdGhpcy5yYXRpbyAqIGNvb3JkLnksXG5cdFx0fTtcblx0fVxufVxuIiwiaW1wb3J0IHtSZWNvcmRpbmd9IGZyb20gXCIuL1JlY29yZGluZ1wiO1xuXG5leHBvcnQgY2xhc3MgRWRpdGVkUmVjb3JkaW5nIGV4dGVuZHMgUmVjb3JkaW5nIHtcblx0Y29uc3RydWN0b3Iod2lkdGgsIGhlaWdodCkge1xuXHRcdHN1cGVyKCk7XG5cdFx0dGhpcy53aWR0aCA9IHdpZHRoO1xuXHRcdHRoaXMuaGVpZ2h0ID0gaGVpZ2h0O1xuXG5cdFx0dGhpcy5kYXRhID0gW107XG5cdH1cblxuXHRtb3ZlQ3Vyc29yKHRpbWUsIGNvb3Jkcykge1xuXHRcdHRoaXMuZGF0YS5wdXNoKHtcblx0XHRcdHRpbWU6IHRpbWUsXG5cdFx0XHR0eXBlOiAnY3Vyc29yJyxcblx0XHRcdGxvYzogY29vcmRzLFxuXHRcdH0pO1xuXHR9XG5cblx0YmVnaW5TdHJva2UodGltZSwgY29vcmRzKSB7XG5cdFx0dGhpcy5kYXRhLnB1c2goe1xuXHRcdFx0dGltZTogdGltZSxcblx0XHRcdHR5cGU6ICdiZWdpblN0cm9rZScsXG5cdFx0XHRsb2M6IGNvb3Jkcyxcblx0XHR9KTtcblx0fVxuXG5cdHN0cm9rZVRvKHRpbWUsIGNvb3Jkcywgd2lkdGgsIGNvbG9yKSB7XG5cdFx0dGhpcy5kYXRhLnB1c2goe1xuXHRcdFx0dGltZTogdGltZSxcblx0XHRcdHR5cGU6ICdzdHJva2VUbycsXG5cdFx0XHRsb2M6IGNvb3Jkcyxcblx0XHRcdHdpZHRoOiB3aWR0aCxcblx0XHRcdGNvbG9yOiBjb2xvcixcblx0XHR9KTtcblx0fVxuXG5cdHBsYWNlU3ZnKHRpbWUsIGNvb3JkcywgZGF0YSkge1xuXHRcdHRoaXMuZGF0YS5wdXNoKHtcblx0XHRcdHRpbWU6IHRpbWUsXG5cdFx0XHR0eXBlOiAnc3ZnJyxcblx0XHRcdGxvYzogY29vcmRzLFxuXHRcdFx0ZGF0YTogZGF0YSxcblx0XHR9KTtcblx0fVxuXG5cdHRyYW5zbGF0ZSh0aW1lLCBvZmZzZXQpIHtcblx0XHR0aGlzLmRhdGEucHVzaCh7XG5cdFx0XHR0aW1lOiB0aW1lLFxuXHRcdFx0dHlwZTogJ3RyYW5zbGF0ZScsXG5cdFx0XHRsb2M6IG9mZnNldCxcblx0XHR9KTtcblx0fVxuXG5cdGdldERhdGEoKSB7XG5cdFx0cmV0dXJuIHRoaXMuZGF0YTtcblx0fVxufVxuIiwiaW1wb3J0IHtSZWNvcmRlcmpzfSBmcm9tIFwiLi4vdmVuZG9yL1JlY29yZGVyXCI7XG5cbmV4cG9ydCBjbGFzcyBNaWMge1xuXHRjb25zdHJ1Y3Rvcih3b3JrZXJQYXRoKSB7XG5cdFx0Y29uc3QgbmF2ID0gd2luZG93Lm5hdmlnYXRvcjtcblx0XHRuYXYuZ2V0VXNlck1lZGlhID0gKFxuXHRcdFx0bmF2LmdldFVzZXJNZWRpYSB8fFxuXHRcdFx0bmF2LndlYmtpdEdldFVzZXJNZWRpYSB8fFxuXHRcdFx0bmF2Lm1vekdldFVzZXJNZWRpYSB8fFxuXHRcdFx0bmF2Lm1zR2V0VXNlck1lZGlhXG5cdFx0KTtcblx0XHR0aGlzLm5hdmlnYXRvciA9IG5hdjtcblxuXHRcdGNvbnN0IEF1ZGlvQ29udGV4dCA9IHdpbmRvdy5BdWRpb0NvbnRleHQgfHwgd2luZG93LndlYmtpdEF1ZGlvQ29udGV4dDtcblx0XHR0aGlzLmNvbnRleHQgPSBuZXcgQXVkaW9Db250ZXh0KCk7XG5cblx0XHR0aGlzLm5hdmlnYXRvci5nZXRVc2VyTWVkaWEoe1xuXHRcdFx0YXVkaW86IHRydWVcblx0XHR9LCBsb2NhbE1lZGlhU3RyZWFtID0+IHtcblx0XHRcdHRoaXMubWVkaWFTdHJlYW0gPSBsb2NhbE1lZGlhU3RyZWFtO1xuXG5cdFx0XHR2YXIgbWVkaWFTdHJlYW1Tb3VyY2UgPSB0aGlzLmNvbnRleHQuY3JlYXRlTWVkaWFTdHJlYW1Tb3VyY2UobG9jYWxNZWRpYVN0cmVhbSk7XG5cdFx0XHR0aGlzLnJlYyA9IG5ldyBSZWNvcmRlcmpzKG1lZGlhU3RyZWFtU291cmNlLCB7XG5cdFx0XHRcdHdvcmtlclBhdGg6IHdvcmtlclBhdGgsXG5cdFx0XHR9KTtcblxuXHRcdH0sIGVyciA9PiB7XG5cdFx0XHRjb25zb2xlLmxvZygnQnJvd3NlciBub3Qgc3VwcG9ydGVkJyk7XG5cdFx0fSk7XG5cdH1cblxuXHRyZWNvcmQoKSB7XG5cdFx0dGhpcy5yZWMucmVjb3JkKCk7XG5cdH1cblxuXHRwYXVzZSgpIHtcblx0XHR0aGlzLnJlYy5zdG9wKCk7XG5cdH1cblxuXHRzdG9wKGNiKSB7XG5cdFx0dGhpcy5wYXVzZSgpO1xuXG5cdFx0dGhpcy5tZWRpYVN0cmVhbS5zdG9wKCk7XG5cdFx0dGhpcy5yZWMuZXhwb3J0V0FWKGUgPT4ge1xuXHRcdFx0Y2IoZSk7XG5cdFx0XHQvL3RoaXMucmVjLmNsZWFyKCk7XG5cdFx0XHQvLyBSZWNvcmRlcmpzLmZvcmNlRG93bmxvYWQoZSwgXCJmaWxlbmFtZS53YXZcIik7XG5cdFx0fSk7XG5cdH1cbn1cbiIsImltcG9ydCB7Q29vcmRzfSBmcm9tICcuL0Nvb3Jkcyc7XG5pbXBvcnQge01pY30gZnJvbSAnLi9NaWMnO1xuXG5leHBvcnQgY2xhc3MgUmVjb3JkZXIge1xuXHRjb25zdHJ1Y3RvcigkY29udGFpbmVyLCAkdGltZSwgJG9uYWlyLCByZWNvcmRpbmcsIHBlbkFwaSwgY29sb3JzLCB3b3JrZXJQYXRoLCBvblNhdmUpIHtcblx0XHR0aGlzLnNpemUgPSB7d2lkdGg6IDgwMCwgaGVpZ2h0OiA0NTB9OyAvLzE5MjAvMTA4MCByYXRpb1xuXG5cdFx0Y29uc3QgZXhwYW5kcyA9IHt3aWR0aDogMiwgaGVpZ2h0OiAzfTtcblxuXHRcdHRoaXMuY3R4ID0gdGhpcy5jcmVhdGVDYW52YXModGhpcy5zaXplLndpZHRoICogZXhwYW5kcy53aWR0aCwgdGhpcy5zaXplLmhlaWdodCAqIGV4cGFuZHMuaGVpZ2h0KTtcblx0XHR0aGlzLm9mZnNldE1heCA9IHtcblx0XHRcdHg6IHRoaXMuc2l6ZS53aWR0aCAqIChleHBhbmRzLndpZHRoIC0gMSksXG5cdFx0XHR5OiB0aGlzLnNpemUuaGVpZ2h0ICogKGV4cGFuZHMuaGVpZ2h0IC0gMSksXG5cdFx0fTtcblx0XHR0aGlzLnNjciA9IHRoaXMuY3JlYXRlQ2FudmFzKHRoaXMuc2l6ZS53aWR0aCwgdGhpcy5zaXplLmhlaWdodCk7XG4gICAgICAgICRjb250YWluZXIuYXBwZW5kQ2hpbGQodGhpcy5zY3IuY2FudmFzKTtcblxuXHRcdHRoaXMuJHRpbWUgPSAkdGltZTtcblx0XHR0aGlzLiRvbmFpciA9ICRvbmFpcjtcblx0XHR0aGlzLnBlbkFwaSA9IHBlbkFwaTtcblx0XHR0aGlzLnRpbWUgPSAwO1xuXHRcdHRoaXMucGF1c2VkID0gdHJ1ZTtcblx0XHR0aGlzLmZpcnN0RHJhd0V2ZW50ID0gdHJ1ZTtcblx0XHR0aGlzLmxhc3RDdXJzb3IgPSBudWxsO1xuXHRcdHRoaXMuY29sb3IgPSB7cjogMjU1LCBnOiAxMDAsIGI6IDE1MH07XG5cdFx0dGhpcy5taWMgPSBuZXcgTWljKHdvcmtlclBhdGgpO1xuXHRcdHRoaXMuY29vcmRzID0gbmV3IENvb3Jkcyh0aGlzLnJhdGlvLCB0aGlzLnNjci5jYW52YXMuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkpO1xuXHRcdHRoaXMub25TYXZlID0gb25TYXZlO1xuXHRcdHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4gPSB7XG5cdFx0XHR4OiB0aGlzLnNpemUud2lkdGggLyAyLCAvLyBpbnRlbnRpb25hbGx5IG5vdCAwIGxlYXZpbmcgYSBsaXR0bGUgYml0IGF1dGhvciB0byBzbGlkZVxuXHRcdFx0eTogdGhpcy5zaXplLmhlaWdodCAvIDIsXG5cdFx0fTtcblxuXHRcdHRoaXMucmVjb3JkaW5nID0gcmVjb3JkaW5nO1xuXHRcdHRoaXMucmVjb3JkaW5nLnRyYW5zbGF0ZSh0aGlzLnRpbWUsIHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4pO1xuXG4gICAgICAgIHRoaXMuc2NyLmNhbnZhcy5hZGRFdmVudExpc3RlbmVyKCdtb3VzZW1vdmUnLCB0aGlzLm9uTW91c2VNb3ZlLmJpbmQodGhpcykpO1xuICAgICAgICB0aGlzLnNjci5jYW52YXMuYWRkRXZlbnRMaXN0ZW5lcignbW91c2Vkb3duJywgdGhpcy5vbk1vdXNlRG93bi5iaW5kKHRoaXMpKTtcbiAgICAgICAgdGhpcy5zY3IuY2FudmFzLmFkZEV2ZW50TGlzdGVuZXIoJ21vdXNldXAnLCB0aGlzLm9uTW91c2VVcC5iaW5kKHRoaXMpKTtcbiAgICAgICAgdGhpcy5zY3IuY2FudmFzLmFkZEV2ZW50TGlzdGVuZXIoJ2NvbnRleHRtZW51JywgdGhpcy5vbk1vdXNlRG93bi5iaW5kKHRoaXMpLCBmYWxzZSk7XG5cblx0XHR0aGlzLmNoYW5nZUNvbG9yKGNvbG9yc1swXSk7XG5cbiAgICAgICAgdGhpcy5yZWdpc3RlckNvbnRyb2xCdXR0b25zKGNvbG9ycyk7XG5cdFx0dGhpcy5yZWdpc3RlcktleXMoKTtcblx0XHR0aGlzLnJlZ2lzdGVyRmlsZURyb3AodGhpcy5zY3IuY2FudmFzKTtcblx0fVxuXG5cdHJlZ2lzdGVyQ29udHJvbEJ1dHRvbnMoY29sb3JzKSB7XG5cdFx0Zm9yICh2YXIgJGlucHV0IG9mIGNvbG9ycykge1xuICAgICAgICBcdCRpbnB1dC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIHRoaXMub25Db2xvckNsaWNrLmJpbmQodGhpcykpO1xuICAgICAgICB9XG5cblx0XHRjb25zdCAkc2F2ZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdzYXZlJyk7XG5cdFx0Y29uc3QgdGhhdCA9IHRoaXM7XG5cdFx0JHNhdmUuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCBldmVudCA9PiB7XG5cdFx0XHRjb25zdCByZWMgPSB7XG5cdFx0XHRcdGRhdGE6IHRoYXQucmVjb3JkaW5nLmdldERhdGEoKSxcblx0XHRcdFx0c2l6ZTogdGhhdC5zaXplLFxuXHRcdFx0XHRkdXJhdGlvbjogdGhhdC50aW1lLFxuXHRcdFx0XHRtZXRhOiB7XG5cdFx0XHRcdFx0cG9pbnRlclR5cGU6IHRoYXQucGVuQXBpID8gdGhhdC5wZW5BcGkucG9pbnRlclR5cGUgOiBcInVua25vd25cIixcblx0XHRcdFx0XHR0YWJsZXRNb2RlbDogdGhhdC5wZW5BcGkgPyB0aGF0LnBlbkFwaS50YWJsZXRNb2RlbCA6IFwidW5rbm93blwiLFxuXHRcdFx0XHRcdGFnZW50OiBuYXZpZ2F0b3IudXNlckFnZW50LFxuXHRcdFx0XHR9XG5cdFx0XHR9O1xuXG5cdFx0XHRjb25zdCBkYXRhID0gSlNPTi5zdHJpbmdpZnkocmVjKTtcblx0XHRcdHRoaXMubWljLnN0b3AoYXVkaW8gPT4ge1xuXHRcdFx0XHR0aGF0Lm9uU2F2ZShkYXRhLCBhdWRpbyk7XG5cdFx0XHR9KTtcblx0XHR9KTtcblx0fVxuXG5cdHJlZ2lzdGVyRmlsZURyb3AoJGVsKSB7XG5cdFx0Y29uc3QgaGFuZGxlRmlsZVNlbGVjdCA9IGZ1bmN0aW9uKGV2ZW50KSB7XG5cdFx0XHRldmVudC5zdG9wUHJvcGFnYXRpb24oKTtcblx0XHRcdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG5cblx0XHRcdGNvbnN0IGZpbGVzID0gZXZlbnQuZGF0YVRyYW5zZmVyLmZpbGVzO1xuXHRcdFx0aWYgKGZpbGVzLmxlbmd0aCAhPSAxKSB7XG5cdFx0XHRcdHJldHVybiBmYWxzZTtcblx0XHRcdH1cblx0XHRcdGNvbnN0IGZpbGUgPSBmaWxlc1swXTtcblxuXHRcdFx0Y29uc3QgZHJvcFBvc2l0aW9uID0gdGhpcy5jb29yZHMuZXZlbnRUb0xheWVyKGV2ZW50KTtcblx0XHRcdGNvbnN0IHJlYWRlciA9IG5ldyBGaWxlUmVhZGVyKCk7XG5cdFx0XHRjb25zdCB0aGF0ID0gdGhpcztcblx0XHRcdHJlYWRlci5vbmxvYWQgPSBmdW5jdGlvbihlKSB7XG5cdFx0XHRcdHRyeSB7XG5cdFx0XHRcdFx0Y29uc3QgaW1nID0gbmV3IEltYWdlKCk7XG5cdFx0XHRcdFx0aW1nLm9ubG9hZCA9IGV2ZW50ID0+IHtcblx0XHRcdFx0XHRcdGNvbnN0IG1vdmVkRHJvcCA9IHtcblx0XHRcdFx0XHRcdFx0Ly8gaW1nIHNpemVzIGFyZSBhbHNvIGJvdGggbXVsdGlwbGllZCBhbmQgZGl2aWRlZCBieSByYXRpbyBoZXJlXG5cdFx0XHRcdFx0XHRcdHg6IGRyb3BQb3NpdGlvbi54IC0gaW1nLndpZHRoIC8gMixcblx0XHRcdFx0XHRcdFx0eTogZHJvcFBvc2l0aW9uLnkgLSBpbWcuaGVpZ2h0IC8gMixcblx0XHRcdFx0XHRcdH07XG5cdFx0XHRcdFx0XHRjb25zdCBjb29yZHMgPSB0aGF0LmNvb3Jkcy5sYXllclRvQ2FudmFzKG1vdmVkRHJvcCk7XG5cdFx0XHRcdFx0XHR0aGF0LmN0eC5kcmF3SW1hZ2UoaW1nLCBjb29yZHMueCwgY29vcmRzLnksXG5cdFx0XHRcdFx0XHRcdGltZy5uYXR1cmFsV2lkdGggKiB0aGF0LnJhdGlvLCBpbWcubmF0dXJhbEhlaWdodCAqIHRoYXQucmF0aW8pO1xuXHRcdFx0XHRcdFx0dGhhdC5yZWNvcmRpbmcucGxhY2VTdmcodGhhdC50aW1lLCBtb3ZlZERyb3AsIGltZy5zcmMpO1xuXHRcdFx0XHRcdFx0dGhhdC5yZWRyYXcoKTtcblx0XHRcdFx0XHR9O1xuXHRcdFx0XHRcdGltZy5zcmMgPSBlLnRhcmdldC5yZXN1bHQ7XG5cblx0XHRcdFx0fSBjYXRjaCAoZSkge1xuXHRcdFx0XHRcdC8vIHN1cHBsaWVkIGZpbGUgd2FzIHByb2JhYmx5IG5vdCBhIHN1cHBvcnRlZCBpbWFnZVxuXHRcdFx0XHR9XG5cdFx0XHR9O1xuXHRcdFx0cmVhZGVyLnJlYWRBc0RhdGFVUkwoZmlsZSk7XG5cdFx0fTtcblxuXHRcdGNvbnN0IGhhbmRsZURyYWdPdmVyID0gZnVuY3Rpb24oZXZlbnQpIHtcblx0XHRcdGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuXHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0XHQgICAgZXZlbnQuZGF0YVRyYW5zZmVyLmRyb3BFZmZlY3QgPSAnY29weSc7XG5cdFx0fTtcblxuXHRcdCRlbC5hZGRFdmVudExpc3RlbmVyKCdkcmFnb3ZlcicsIGhhbmRsZURyYWdPdmVyLmJpbmQodGhpcyksIGZhbHNlKTtcblx0XHQkZWwuYWRkRXZlbnRMaXN0ZW5lcignZHJvcCcsIGhhbmRsZUZpbGVTZWxlY3QuYmluZCh0aGlzKSwgZmFsc2UpO1xuXHR9XG5cblx0cmVnaXN0ZXJLZXkoY29kZSwgY2IpIHtcblx0XHRkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdrZXlkb3duJywgZXZlbnQgPT4ge1xuXHRcdFx0aWYgKGV2ZW50LnRhcmdldC50YWdOYW1lID09PSAnSU5QVVQnKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblx0XHRcdGlmIChldmVudC5rZXlDb2RlICE9PSBjb2RlKSB7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblxuXHRcdFx0Y2IoZXZlbnQpO1xuXHRcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcblx0XHR9KTtcblx0fVxuXG5cdHJlZ2lzdGVyS2V5cygpIHtcblx0XHQvLyBzcGFjZVxuXHRcdHRoaXMucmVnaXN0ZXJLZXkoMzIsIGV2ZW50ID0+IHtcblx0XHRcdGlmICh0aGlzLnBhdXNlZCkge1xuXHRcdFx0XHR0aGlzLnBhdXNlZCA9IGZhbHNlO1xuXHRcdFx0XHR0aGlzLiRvbmFpci50ZXh0Q29udGVudCA9ICdyZWNvcmRpbmcnO1xuXHRcdFx0XHRyZXF1ZXN0QW5pbWF0aW9uRnJhbWUodGhpcy50aWNrLmJpbmQodGhpcykpO1xuXHRcdFx0XHR0aGlzLm1pYy5yZWNvcmQoKTtcblxuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0dGhpcy5taWMucGF1c2UoKTtcblx0XHRcdFx0dGhpcy4kb25haXIudGV4dENvbnRlbnQgPSAnJztcblx0XHRcdFx0dGhpcy5wYXVzZWQgPSB0cnVlO1xuXHRcdFx0fVxuXHRcdH0pO1xuXHR9XG5cblx0dGljayh0aW1lc3RhbXApIHtcblx0XHR0aGlzLiR0aW1lLnRleHRDb250ZW50ID0gKHRoaXMudGltZSAvIDEwMDApLnRvRml4ZWQoMik7XG5cblx0XHRpZiAoIXRoaXMucGF1c2VkKSB7XG5cdFx0XHRjb25zdCBsYXN0ID0gdGltZXN0YW1wO1xuXHRcdFx0cmVxdWVzdEFuaW1hdGlvbkZyYW1lKHRpbWVzdGFtcCA9PiB7XG5cdFx0XHRcdHRoaXMudGltZSArPSB0aW1lc3RhbXAgLSBsYXN0O1xuXHRcdFx0XHR0aGlzLnRpY2sodGltZXN0YW1wKTtcblx0XHRcdH0pO1xuXHRcdH1cblx0fVxuXG5cdGNyZWF0ZUNhbnZhcyh3aWR0aCwgaGVpZ2h0KSB7XG5cdFx0Y29uc3QgJGNhbnZhcyA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ2NhbnZhcycpO1xuXHRcdCRjYW52YXMud2lkdGggPSB3aWR0aDtcbiAgICAgICAgJGNhbnZhcy5oZWlnaHQgPSBoZWlnaHQ7XG5cbiAgICAgICAgaWYgKCF0aGlzLnJhdGlvKSB7XG4gICAgICAgIFx0dGhpcy5yYXRpbyA9IHRoaXMuZ2V0UmF0aW8oJGNhbnZhcyk7XG4gICAgICAgIH1cbiAgICAgICAgdGhpcy5zY2FsZUNhbnZhcygkY2FudmFzLCB0aGlzLnJhdGlvKTtcblxuICAgICAgICBjb25zdCBjdHggPSAkY2FudmFzLmdldENvbnRleHQoJzJkJyk7XG4gICAgICAgIGN0eC5jbGVhckFsbCA9IGZ1bmN0aW9uKCkge1xuICAgICAgICBcdGN0eC5jbGVhclJlY3QoMCwgMCwgJGNhbnZhcy53aWR0aCwgJGNhbnZhcy5oZWlnaHQpO1xuICAgICAgICB9O1xuICAgICAgICByZXR1cm4gY3R4O1xuXHR9XG5cblx0Z2V0UmF0aW8oJGNhbnZhcykge1xuXHRcdGNvbnN0IGNvbnRleHQgPSAkY2FudmFzLmdldENvbnRleHQoJzJkJyk7XG5cdFx0Y29uc3QgZGV2aWNlUGl4ZWxSYXRpbyA9IHdpbmRvdy5kZXZpY2VQaXhlbFJhdGlvIHx8IDE7XG4gICAgICAgIGNvbnN0IGJhY2tpbmdTdG9yZVJhdGlvID0gY29udGV4dC53ZWJraXRCYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgIFx0fHwgY29udGV4dC5tb3pCYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgICAgICB8fCBjb250ZXh0Lm1zQmFja2luZ1N0b3JlUGl4ZWxSYXRpb1xuICAgICAgICAgICAgfHwgY29udGV4dC5vQmFja2luZ1N0b3JlUGl4ZWxSYXRpb1xuICAgICAgICAgICAgfHwgY29udGV4dC5iYWNraW5nU3RvcmVQaXhlbFJhdGlvXG4gICAgICAgICAgICB8fCAxO1xuXG4gICAgICAgIHJldHVybiBkZXZpY2VQaXhlbFJhdGlvIC8gYmFja2luZ1N0b3JlUmF0aW87XG5cdH1cblxuXHRzY2FsZUNhbnZhcygkY2FudmFzLCByYXRpbykge1xuICAgICAgICBjb25zdCBvbGRXaWR0aCA9ICRjYW52YXMud2lkdGg7XG4gICAgICAgIGNvbnN0IG9sZEhlaWdodCA9ICRjYW52YXMuaGVpZ2h0O1xuXG4gICAgICAgICRjYW52YXMud2lkdGggPSBvbGRXaWR0aCAqIHJhdGlvO1xuICAgICAgICAkY2FudmFzLmhlaWdodCA9IG9sZEhlaWdodCAqIHJhdGlvO1xuXG4gICAgICAgICRjYW52YXMuc3R5bGUud2lkdGggPSBvbGRXaWR0aCArICdweCc7XG4gICAgICAgICRjYW52YXMuc3R5bGUuaGVpZ2h0ID0gb2xkSGVpZ2h0ICsgJ3B4Jztcblx0fVxuXG5cdG9uQ29sb3JDbGljayhldmVudCkge1xuXHRcdHRoaXMuY2hhbmdlQ29sb3IoZXZlbnQudGFyZ2V0KTtcblx0fVxuXG5cdGNoYW5nZUNvbG9yKHRhcmdldCkge1xuXHRcdGNvbnN0IGFyciA9IEpTT04ucGFyc2UodGFyZ2V0LmRhdGFzZXQuY29sb3IpO1xuXHRcdHRoaXMuY29sb3IgPSB7cjogYXJyWzBdLCBnOiBhcnJbMV0sIGI6IGFyclsyXX07XG5cdFx0aWYgKHRoaXMubGFzdENvbG9yKSB7XG5cdFx0XHR0aGlzLmxhc3RDb2xvci5jbGFzc0xpc3QucmVtb3ZlKCdhY3RpdmUnKTtcblx0XHR9XG5cdFx0dGFyZ2V0LmNsYXNzTGlzdC5hZGQoJ2FjdGl2ZScpO1xuXHRcdHRoaXMubGFzdENvbG9yID0gdGFyZ2V0O1xuXHR9XG5cblx0bW91c2VCdXR0b24oZXZlbnQpIHtcblx0XHRyZXR1cm4gXCJldmVudFwiIGluIHdpbmRvdyAmJiBcImJ1dHRvbnNcIiBpbiB3aW5kb3cuZXZlbnRcblx0XHRcdD8gd2luZG93LmV2ZW50LmJ1dHRvbnMgLy8gSW50ZXJuZXQgRXhwbG9yZXJcblx0XHRcdDogKFwiYnV0dG9uc1wiIGluIGV2ZW50XG5cdFx0XHRcdD8gZXZlbnQuYnV0dG9ucyAvLyBGaXJlZm94XG5cdFx0XHRcdDogZXZlbnQud2hpY2ggLy8gQ2hyb21lXG5cdFx0XHQpO1xuXHR9XG5cblx0c2V0VHJhbnNsYXRpb25CYXNlKGV2ZW50KSB7XG5cdFx0dGhpcy50cmFuc2xhdGlvbkJhc2UgPSB7XG5cdFx0XHR4OiB0aGlzLmNvb3Jkcy5vZmZzZXQuc2NyZWVuLnggKyBldmVudC5wYWdlWCxcblx0XHRcdHk6IHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4ueSArIGV2ZW50LnBhZ2VZLFxuXHRcdH07XG5cdH1cblxuXHRvbk1vdXNlRG93bihldmVudCkge1xuXHRcdGNvbnN0IGJ1dHRvbiA9IHRoaXMubW91c2VCdXR0b24oZXZlbnQpO1xuXHRcdGlmIChidXR0b24gPT0gMikge1xuXHRcdFx0ZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XG5cdFx0XHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0dGhpcy5zZXRUcmFuc2xhdGlvbkJhc2UoZXZlbnQpO1xuXHRcdH1cblxuXHRcdGNvbnN0IGxheWVyQ29vcmRzID0gdGhpcy5jb29yZHMuZXZlbnRUb0xheWVyKGV2ZW50KTtcblx0XHR0aGlzLmxhc3RDdXJzb3IgPSBsYXllckNvb3Jkcztcblx0XHR0aGlzLmxhc3RPbnNjcmVlbiA9IHRoaXMuY29vcmRzLmxheWVyVG9DYW52YXMobGF5ZXJDb29yZHMpO1xuXHR9XG5cblx0b25Nb3VzZVVwKGV2ZW50KSB7XG5cdFx0dGhpcy50cmFuc2xhdGlvbkJhc2UgPSBudWxsO1xuXHR9XG5cblx0b25Nb3VzZU1vdmUoZXZlbnQpIHtcblx0XHRpZiAodGhpcy5wYXVzZWQpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHRjb25zdCBjdXJzb3IgPSB0aGlzLmNvb3Jkcy5ldmVudFRvTGF5ZXIoZXZlbnQpO1xuXHRcdGNvbnN0IGJ1dHRvbiA9IHRoaXMubW91c2VCdXR0b24oZXZlbnQpO1xuXHRcdGlmIChidXR0b24gPT0gMikge1xuXHRcdFx0aWYgKCF0aGlzLnRyYW5zbGF0aW9uQmFzZSkge1xuXHRcdFx0XHR0aGlzLnNldFRyYW5zbGF0aW9uQmFzZShldmVudCk7XG5cdFx0XHRcdHJldHVybjtcblx0XHRcdH1cblx0XHRcdGNvbnN0IG9mZnNldCA9IHtcblx0XHRcdFx0eDogTWF0aC5taW4odGhpcy5vZmZzZXRNYXgueCwgTWF0aC5tYXgoMCwgdGhpcy50cmFuc2xhdGlvbkJhc2UueCAtIGV2ZW50LnBhZ2VYKSksXG5cdFx0XHRcdHk6IE1hdGgubWluKHRoaXMub2Zmc2V0TWF4LnksIE1hdGgubWF4KDAsIHRoaXMudHJhbnNsYXRpb25CYXNlLnkgLSBldmVudC5wYWdlWSkpLFxuXHRcdFx0fTtcblx0XHRcdHRoaXMuY29vcmRzLm9mZnNldC5zY3JlZW4gPSBvZmZzZXQ7XG5cdFx0XHR0aGlzLnJlY29yZGluZy50cmFuc2xhdGUodGhpcy50aW1lLCBvZmZzZXQpO1xuXG5cdFx0fSBlbHNlIGlmIChidXR0b24gPT0gMSkge1xuXHRcdFx0Y29uc3Qgb25zY3JlZW4gPSB0aGlzLmNvb3Jkcy5sYXllclRvQ2FudmFzKGN1cnNvcik7XG5cdFx0XHRpZiAodGhpcy5maXJzdERyYXdFdmVudCkge1xuXHRcdFx0XHR0aGlzLmZpcnN0RHJhd0V2ZW50ID0gZmFsc2U7XG5cdFx0XHRcdHRoaXMucmVjb3JkaW5nLmJlZ2luU3Ryb2tlKHRoaXMudGltZSwgY3Vyc29yKTtcblx0XHRcdFx0dGhpcy5jdHgubW92ZVRvKG9uc2NyZWVuLngsIG9uc2NyZWVuLnkpO1xuXG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRjb25zdCBiYXNlbGluZSA9IDE7XG5cdFx0XHRcdGNvbnN0IHdpZHRoID0gdGhpcy5wZW5BcGkgPyAoMSArIDQgKiB0aGlzLnBlbkFwaS5wcmVzc3VyZSkgKiBiYXNlbGluZSA6IGJhc2VsaW5lICogMztcblx0XHRcdFx0dGhpcy5yZWNvcmRpbmcuc3Ryb2tlVG8odGhpcy50aW1lLCBjdXJzb3IsIHdpZHRoLCB0aGlzLmNvbG9yKTtcblxuXHRcdFx0XHR0aGlzLmN0eC5iZWdpblBhdGgoKTtcblx0XHRcdFx0aWYgKHRoaXMubGFzdE9uc2NyZWVuKSB7XG5cdFx0XHRcdFx0dGhpcy5jdHgubW92ZVRvKHRoaXMubGFzdE9uc2NyZWVuLngsIHRoaXMubGFzdE9uc2NyZWVuLnkpO1xuXHRcdFx0XHR9XG5cdFx0XHRcdHRoaXMuY3R4LmxpbmVXaWR0aCA9IHdpZHRoO1xuXHRcdFx0XHR0aGlzLmN0eC5zdHJva2VTdHlsZSA9IGByZ2IoJHt0aGlzLmNvbG9yLnJ9LCAke3RoaXMuY29sb3IuZ30sICR7dGhpcy5jb2xvci5ifSlgO1xuXHRcdFx0XHR0aGlzLmN0eC5saW5lVG8ob25zY3JlZW4ueCwgb25zY3JlZW4ueSk7XG5cdFx0XHRcdHRoaXMuY3R4LnN0cm9rZSgpO1xuXHRcdFx0XHR0aGlzLmxhc3RPbnNjcmVlbiA9IG9uc2NyZWVuO1xuXHRcdFx0fVxuXG5cdFx0fSBlbHNlIHtcblx0XHRcdHRoaXMuZmlyc3REcmF3RXZlbnQgPSB0cnVlO1xuXHRcdFx0dGhpcy5yZWNvcmRpbmcubW92ZUN1cnNvcih0aGlzLnRpbWUsIGN1cnNvcik7XG5cdFx0XHR0aGlzLmxhc3RPbnNjcmVlbiA9IG51bGw7XG5cdFx0fVxuXG5cdFx0dGhpcy5yZWRyYXcoKTtcblx0fVxuXG5cdHJlZHJhdygpIHtcblx0XHR0aGlzLnNjci5jbGVhckFsbCgpO1xuXHRcdGNvbnN0IGNhbiA9IHRoaXMuY3R4LmNhbnZhcztcblx0XHRjb25zdCBzY3JjYW4gPSB0aGlzLnNjci5jYW52YXM7XG5cdFx0Y29uc3Qgb2Zmc2V0ID0gdGhpcy5jb29yZHMubGF5ZXJUb0NhbnZhcyh0aGlzLmNvb3Jkcy5vZmZzZXQuc2NyZWVuKTtcblx0XHR0aGlzLnNjci5kcmF3SW1hZ2UoY2FuLFxuXHRcdFx0b2Zmc2V0LngsIG9mZnNldC55LFxuXHRcdFx0c2NyY2FuLndpZHRoLCBzY3JjYW4uaGVpZ2h0LFxuXHRcdFx0MCwgMCxcblx0XHRcdHNjcmNhbi53aWR0aCwgc2NyY2FuLmhlaWdodFxuXHRcdCk7XG5cdH1cblxufVxuIiwiZXhwb3J0IGNsYXNzIFJlY29yZGluZyB7XG5cdGdldERhdGEoKSB7fVxuXHRnZXRTb3VuZFBhdGgoKSB7fVxufVxuIiwiZXhwb3J0IGNsYXNzIFJlY29yZGVyanMge1xuICBjb25zdHJ1Y3Rvcihzb3VyY2UsIGNmZykge1xuICAgIHZhciBjb25maWcgPSBjZmcgfHwge307XG4gICAgdmFyIGJ1ZmZlckxlbiA9IGNvbmZpZy5idWZmZXJMZW4gfHwgNDA5NjtcbiAgICB2YXIgbnVtQ2hhbm5lbHMgPSBjb25maWcubnVtQ2hhbm5lbHMgfHwgMjtcbiAgICB0aGlzLmNvbnRleHQgPSBzb3VyY2UuY29udGV4dDtcbiAgICB0aGlzLm5vZGUgPSAodGhpcy5jb250ZXh0LmNyZWF0ZVNjcmlwdFByb2Nlc3NvciB8fFxuICAgICAgICAgICAgICAgICB0aGlzLmNvbnRleHQuY3JlYXRlSmF2YVNjcmlwdE5vZGUpLmNhbGwodGhpcy5jb250ZXh0LFxuICAgICAgICAgICAgICAgICBidWZmZXJMZW4sIG51bUNoYW5uZWxzLCBudW1DaGFubmVscyk7XG4gICAgdmFyIHdvcmtlciA9IG5ldyBXb3JrZXIoY29uZmlnLndvcmtlclBhdGggfHwgJ3JlY29yZGVyV29ya2VyLmpzJyk7XG4gICAgd29ya2VyLnBvc3RNZXNzYWdlKHtcbiAgICAgIGNvbW1hbmQ6ICdpbml0JyxcbiAgICAgIGNvbmZpZzoge1xuICAgICAgICBzYW1wbGVSYXRlOiB0aGlzLmNvbnRleHQuc2FtcGxlUmF0ZSxcbiAgICAgICAgbnVtQ2hhbm5lbHM6IG51bUNoYW5uZWxzXG4gICAgICB9XG4gICAgfSk7XG4gICAgdmFyIHJlY29yZGluZyA9IGZhbHNlLCBjdXJyQ2FsbGJhY2s7XG5cbiAgICB0aGlzLm5vZGUub25hdWRpb3Byb2Nlc3MgPSBmdW5jdGlvbihlKXtcbiAgICAgIGlmICghcmVjb3JkaW5nKSByZXR1cm47XG4gICAgICB2YXIgYnVmZmVyID0gW107XG4gICAgICBmb3IgKHZhciBjaGFubmVsID0gMDsgY2hhbm5lbCA8IG51bUNoYW5uZWxzOyBjaGFubmVsKyspe1xuICAgICAgICAgIGJ1ZmZlci5wdXNoKGUuaW5wdXRCdWZmZXIuZ2V0Q2hhbm5lbERhdGEoY2hhbm5lbCkpO1xuICAgICAgfVxuICAgICAgd29ya2VyLnBvc3RNZXNzYWdlKHtcbiAgICAgICAgY29tbWFuZDogJ3JlY29yZCcsXG4gICAgICAgIGJ1ZmZlcjogYnVmZmVyXG4gICAgICB9KTtcbiAgICB9XG5cbiAgICB0aGlzLmNvbmZpZ3VyZSA9IGZ1bmN0aW9uKGNmZyl7XG4gICAgICBmb3IgKHZhciBwcm9wIGluIGNmZyl7XG4gICAgICAgIGlmIChjZmcuaGFzT3duUHJvcGVydHkocHJvcCkpe1xuICAgICAgICAgIGNvbmZpZ1twcm9wXSA9IGNmZ1twcm9wXTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH1cblxuICAgIHRoaXMucmVjb3JkID0gZnVuY3Rpb24oKXtcbiAgICAgIHJlY29yZGluZyA9IHRydWU7XG4gICAgfVxuXG4gICAgdGhpcy5zdG9wID0gZnVuY3Rpb24oKXtcbiAgICAgIHJlY29yZGluZyA9IGZhbHNlO1xuICAgIH1cblxuICAgIHRoaXMuY2xlYXIgPSBmdW5jdGlvbigpe1xuICAgICAgd29ya2VyLnBvc3RNZXNzYWdlKHsgY29tbWFuZDogJ2NsZWFyJyB9KTtcbiAgICB9XG5cbiAgICB0aGlzLmdldEJ1ZmZlciA9IGZ1bmN0aW9uKGNiKSB7XG4gICAgICBjdXJyQ2FsbGJhY2sgPSBjYiB8fCBjb25maWcuY2FsbGJhY2s7XG4gICAgICB3b3JrZXIucG9zdE1lc3NhZ2UoeyBjb21tYW5kOiAnZ2V0QnVmZmVyJyB9KVxuICAgIH1cblxuICAgIHRoaXMuZXhwb3J0V0FWID0gZnVuY3Rpb24oY2IsIHR5cGUpe1xuICAgICAgY3VyckNhbGxiYWNrID0gY2IgfHwgY29uZmlnLmNhbGxiYWNrO1xuICAgICAgdHlwZSA9IHR5cGUgfHwgY29uZmlnLnR5cGUgfHwgJ2F1ZGlvL3dhdic7XG4gICAgICBpZiAoIWN1cnJDYWxsYmFjaykgdGhyb3cgbmV3IEVycm9yKCdDYWxsYmFjayBub3Qgc2V0Jyk7XG4gICAgICB3b3JrZXIucG9zdE1lc3NhZ2Uoe1xuICAgICAgICBjb21tYW5kOiAnZXhwb3J0V0FWJyxcbiAgICAgICAgdHlwZTogdHlwZVxuICAgICAgfSk7XG4gICAgfVxuXG4gICAgd29ya2VyLm9ubWVzc2FnZSA9IGZ1bmN0aW9uKGUpe1xuICAgICAgdmFyIGJsb2IgPSBlLmRhdGE7XG4gICAgICBjdXJyQ2FsbGJhY2soYmxvYik7XG4gICAgfVxuXG4gICAgc291cmNlLmNvbm5lY3QodGhpcy5ub2RlKTtcbiAgICB0aGlzLm5vZGUuY29ubmVjdCh0aGlzLmNvbnRleHQuZGVzdGluYXRpb24pOyAgICAvL3RoaXMgc2hvdWxkIG5vdCBiZSBuZWNlc3NhcnlcbiAgfVxuXG4gIHN0YXRpYyBmb3JjZURvd25sb2FkKGJsb2IsIGZpbGVuYW1lKSB7XG4gICAgdmFyIHVybCA9ICh3aW5kb3cuVVJMIHx8IHdpbmRvdy53ZWJraXRVUkwpLmNyZWF0ZU9iamVjdFVSTChibG9iKTtcbiAgICB2YXIgbGluayA9IHdpbmRvdy5kb2N1bWVudC5jcmVhdGVFbGVtZW50KCdhJyk7XG4gICAgbGluay5ocmVmID0gdXJsO1xuICAgIGxpbmsuZG93bmxvYWQgPSBmaWxlbmFtZSB8fCAnb3V0cHV0Lndhdic7XG4gICAgdmFyIGNsaWNrID0gZG9jdW1lbnQuY3JlYXRlRXZlbnQoXCJFdmVudFwiKTtcbiAgICBjbGljay5pbml0RXZlbnQoXCJjbGlja1wiLCB0cnVlLCB0cnVlKTtcbiAgICBsaW5rLmRpc3BhdGNoRXZlbnQoY2xpY2spO1xuICB9XG59XG4iXX0=
