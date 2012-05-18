<?php

/**
 * Provides a $SearchForm method for displaying a basic search form in your template files. 
 * Usage: Object::add_extension('Page_Controller', 'SearchFormDecorator');
 * @author simonwade
 */
class SearchFormDecorator extends Extension {

	/**
	 * Defines the URL that the search form will submit to.
	 * @var string
	 */
	public static $resultsPage = '/search';

	/**
	 * Site search form. The following is the required markup if you want to write it yourself:
	 * <form action="/search/results">
	 *	 <input name="Search">
	 * </form>
	 */
	function SearchForm() {
		$form = parent::SearchForm();
		$form->setFormAction(self::$resultsPage.'/results');
		$form->addExtraClass('search-page-form no-style');
		$form->setFormMethod('GET');
		$form->disableSecurityToken();
		return $form;
	}

}

?>