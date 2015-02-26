define([
	'services/ajax',
	'services/sounds',
	'services/timer',
	'services/inactivity',
	'logic/blueprint/latex',
	'logic/blueprint/setupHints'
], function(ajax, sounds, timer, inactivity, latex, hints) {
	const $exercise = document.querySelector('[data-exercise]');


	hints.setup();
	ajax.onSuccess.push(latex.render);
	ajax.onSuccess.push(hints.setup);


	let timeSpentOnThisQuestion = timer.create();
	ajax.onBefore.push((xhr, settings) => {
		settings.data.append('time', timeSpentOnThisQuestion());
		$exercise.querySelector('[type="submit"]').classList.add('disabled');
	});
	ajax.onSuccess.push(() => {
		timeSpentOnThisQuestion = timer.create();
	});


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


	inactivity.onInactive.push(() => {
		$exercise.querySelector('input[name="inactivity"]').value = true;
	});
});
