<?php

namespace App\Presenters;

use App\Models\Rme;
use App\Models\Services;
use Nette\Forms\Controls\TextInput;
use Nette\Utils\Strings;


final class Search extends Presenter
{

	/**
	 * @var Services\Search
	 * @inject
	 */
	public $search;

	public function actionRedirectAutocomplete($contentId)
	{
		$this->redirectToEntity($this->orm->contents->getById($contentId));
	}

	public function renderResults($query)
	{
		if (!Strings::trim($query))
		{
			$this->redirect('Subjects:default');
		}

		/** @var TextInput $input */
		$input = $this->getComponent('search-form-query');
		$input->setDefaultValue($query);

		$this->template->query = $query;
		list($limit, $offset) = $this->getLinearLimitOffset(1);
		$this->template->search = $this->search->query($query, $limit, $offset);
	}

	public function actionMore($query, $page)
	{
		list($limit, $offset) = $this->getLinearLimitOffset($page);
		$this->template->search = $this->search->query($query, $limit, $offset);
	}

	public function actionOpenSearchSuggest($query)
	{
		$search = $this->orm->contents->getWithFulltext($query, 5, 0);

		/** @see http://www.opensearch.org/Specifications/OpenSearch/Extensions/Suggestions/1.1#Declaring_a_JSON-formatted_search_suggestion_URL */
		$response = [
			$query,
			[], // suggestions
			[], // suggestion details
			[], // links
		];
		foreach ($search->getResults() as $content)
		{
			/** @var Rme\Content $content */
			$response[1][] = $content->title;
			$response[2][] = $content instanceof Rme\Video
				? 'Video'
				: ($content instanceof Rme\Blueprint ? 'Cvičení' : '');
			$response[3][] = $this->absoluteLink($content);
		}
		$this->sendJson($response);
	}

	/**
	 * The higher the page number the more results returned
	 * <code>
	 *   page offset  limit
	 *   1    0        8
	 *   2    8        12 (8 + (2-1) * 4)
	 *   3    8+12     16 (8 + (3-1) * 4)
	 *   4    8+12+16  20 (8 + (4-1) * 4)
	 * </code>
	 *
	 * @param int $page
	 * @return int[] [int $limit, int $offset]
	 */
	private function getLinearLimitOffset($page)
	{
		$firstPage = 8;
		$delta = 4;

		$limit = $firstPage + ($page - 1) * $delta;

		if ($page === 1)
		{
			return [$limit, 0];
		}

		// sum of sequence members (first + last) * count / 2
		$offset = ($firstPage + $firstPage + ($page - 2) * $delta) * ($page - 1) / 2;

		return [$limit, $offset];
	}

}
