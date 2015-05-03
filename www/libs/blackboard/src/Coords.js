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
export class Coords {
	constructor(ratio, layerOffset) {
		this.ratio = ratio;
		this.offset = {
			layer: layerOffset,
			screen: {x: 0, y: 0},
		};
	}

	eventToLayer(event) {
		return {
			x: event.pageX - this.offset.layer.left + this.offset.screen.x,
			y: event.pageY - this.offset.layer.top + this.offset.screen.y,
		}
	}

	layerToCanvas(coord) {
		return {
			x: this.ratio * coord.x,
			y: this.ratio * coord.y,
		};
	}
}
