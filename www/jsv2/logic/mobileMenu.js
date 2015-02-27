define(function() {
	const $mobileNav = document.querySelector('.mobile-nav');

	const $subjects = document.getElementById('mobile-nav-subjects');
	const $subjectsClone = document.getElementById('mobile-nav-subjects-clone');
	const $navAppend = document.getElementById('mobile-nav-append');
	const $navSnippet = document.getElementById('mobile-nav-snippet');

	const $burger = document.querySelector('.burger');

	$subjectsClone.appendChild($subjects.cloneNode(true));

	for (let $container of [$subjects, $subjectsClone]) {
		for (let $trigger of $container.querySelectorAll('[data-subject-open]')) {
			const subjectId = $trigger.dataset.subjectOpen;
			const $list = $container.querySelector(`[data-subject="${subjectId}"]`);
			$trigger.addEventListener('click', event => {
				$list.classList.toggle('hidden');
				event.preventDefault();
			});
		}
	}

	$navAppend.appendChild($navSnippet);
	$navSnippet.classList.remove('hidden');

	$burger.addEventListener('click', event => {
		$mobileNav.classList.add('open');
		event.preventDefault();
	});


});
