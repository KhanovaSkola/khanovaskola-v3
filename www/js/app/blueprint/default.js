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


	// TODO refactor
	const $fillin = $exercise.querySelector('.fillin');
	if ($fillin) {
		const redrawFillin = function() {
			let inputs = [];
			for (let $node of $exercise.querySelectorAll('.fillin-box')) {
				$node.innerHTML = '';

				const $input = document.createElement('input');
				$input.setAttribute('name', 'fillin[]');
				inputs.push($input);

				$node.appendChild($input);
			}

			const $answer = $exercise.querySelector('[data-answer]');
			for (let $input of inputs) {
				$input.addEventListener('change', event => {
					let values = [];
					for (let $input of inputs) {
						values.push($input.value);
					}
					$answer.value = JSON.stringify(values);
				});
			}
		};

		redrawFillin();
		ajax.onSuccess.push(redrawFillin);
	}
	// TODO end


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
