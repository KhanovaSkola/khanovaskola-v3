<?php

namespace App\Presenters;

use App\Models\Services;
use Nette\Utils\Strings;


final class Search extends Presenter
{

	/**
	 * @var Services\Search
	 * @inject
	 */
	public $search;

	/**
	 * @var Services\Paths
	 * @inject
	 */
	public $paths;

	public function actionRedirectAutocomplete($contentId)
	{
		$this->redirectToEntity($this->orm->contents->getById($contentId));
	}

	public function renderResults($query, $page = NULL, $filter = NULL)
	{
		if (!Strings::trim($query))
		{
			$this->redirect('Homepage:default');
		}

		$this['search-form-query']->setDefaultValue($query);

		$this->template->query = $query;
		$this->template->filter = $filter;
		list($limit, $offset) = $this->getLinearLimitOffset($page ?: 1);
		$this->template->search = $results = $this->search->query($query, $limit, $offset, $filter);

		$this->payload->results = $results->count();
		$this->redrawControl('results');
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
