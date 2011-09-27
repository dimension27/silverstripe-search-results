<?php

class SearchPage extends Page {

	static $db = array(
		'ResultsPerPage' => 'Int',
	);

	static $defaults = array(
		'ResultsPerPage' => '10',
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Content.Main', $field = new NumericField('ResultsPerPage', 'Number of results to display per page'));
		return $fields;
	}

	/**
	 * Ensures that the /search page exists. If this page is moved then
	 * SearchFormDecorator::$resultsPage will need to be updated.
	 * @see SiteTree::requireDefaultRecords()
	 */
	function requireDefaultRecords() {
		if( !is_object(DataObject::get('SearchPage')) ) {
			$page = new SearchPage();
			$page->Title = _t('SearchPage.DEFAULT_PAGE_TITLE', 'Search');
			$page->Content = '';
			$page->Status = 'New page';
			$page->write();
			DB::alteration_message('Search page created', 'created');
		}
	}

}

class SearchPage_Controller extends Page_Controller {

	protected $SearchQuery;

	/**
	 * Displays the results from the submission of a SearchForm
	 * @see SearchFormDecorator
	 * @return ViewableData
	 */
	function results( $data ) {
		$form = $this->SearchForm();
		$data = array(
			'Results' => $form->getResults(),
			'Query' => $form->getSearchQuery(),
			'Title' => 'Search Results'
		);
		$this->SearchQuery = $form->getSearchQuery();
		return $this->customise($data)->renderWith(array('SearchPage_results', 'Page'));
	}

}

