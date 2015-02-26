define([
	'services/ajax',
	'services/sounds',
	'logic/blueprint/latex',
	'logic/blueprint/setupHints'
], function(ajax, sounds, latex, hints) {
	const $exercise = document.querySelector('[data-exercise]');


	hints.setup();
	ajax.onSuccess.push(latex.render);
	ajax.onSuccess.push(hints.setup);


	const effects = {
		wrong: sounds.preload('/fx/wrong.mp3'),
		correct: sounds.preload('/fx/correct.mp3'),
		drumroll: sounds.preload('/fx/drumroll.mp3')
	};
	ajax.onSuccess.push(payload => {
		if (payload.monsterCorrect) {
			effects.drumroll.play();
		} else if (payload.correct) {
			effects.correct.play();
		} else {
			effects.wrong.play();
		}

		$exercise.querySelector('input').focus();
	});
});
