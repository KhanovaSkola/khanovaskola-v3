define(function() {
	var $exercise = $('[data-exercise]');
	if (!$exercise.length) {
		return;
	}
	var $container = $('.right-inner');

	App.onInactive.push(function() {
		$container.find('[name=inactivity]').val(true);
	});

	var timer = App.getTimer();
	var onSubmit = function() {
		$container.find('[name=time]').val(timer());
	};
	$container.on('submit', '[data-exercise]', onSubmit);
	App.ajax.onBefore.push(function(xhr, settings) {
		settings.data.append('time', timer());
		$container.find('[type="submit"]').addClass('disabled');
	});


	var loadSound = function (src) {
		var sound = document.createElement("audio");
		if ("src" in sound) {
			sound.autoPlay = false;
		} else {
			sound = document.createElement("bgsound");
			sound.volume = -10000;
			sound.play = function () {
				this.src = src;
				this.volume = 0;
			}
		}
		sound.src = src;
		document.body.appendChild(sound);
		return sound;
	};
	var soundWrong = loadSound("/fx/wrong.mp3"); // preloads
	var soundCorrect = loadSound("/fx/correct.mp3");
	var soundDrumroll = loadSound("/fx/drumroll.mp3");


	var hints = null;
	App.ajax.onSuccess.push(function(payload) {
		if (payload.monsterCorrect) {
			soundDrumroll.play();
		} else if (payload.correct) {
			soundCorrect.play();
		} else {
			soundWrong.play();
		}

		hints = null;
		$container.find('[name=hint]').val(false);
		timer = App.getTimer();
		$container.find('input:first').focus();
	});

	$container.on('click', '[data-show-hint]', function() {
		if (hints === null)
		{
			hints = $container.find('[data-hint]').hide().toArray();
		}
		$container.find('[name=hint]').val(true);
		$(hints.shift()).removeClass('hidden').show();
		$container.find('[data-hint-label]').removeClass('hidden');

		if (!hints.length) {
			$(this).hide();
		}
		return false;
	});
});
