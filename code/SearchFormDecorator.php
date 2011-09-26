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
	 * <form action="/search/SearchForm">
	 *	 <input name="Search">
	 *	 <input type="submit">
	 * </form>
	 */
	function SearchForm( SS_HTTPRequest $request ) {
		$searchText =  _t('SearchFormDecorator.SEARCH', 'Search');
		if( $this->owner->request ) {
			$searchText = $this->owner->request->getVar('Search');
		}
		$fields = new FieldSet(new TextField('Search', false, $searchText));
		$actions = new FieldSet(new FormAction('Results', _t('SearchPage.DO_SEARCH', 'Search')));
		
		$form = new SearchForm($this->owner, 'SearchForm', $fields, $actions);
		$form->setFormAction(self::$resultsPage.'/SearchForm');
		$form->classesToSearch(FulltextSearchable::get_searchable_classes());
		$form->addExtraClass('search-page-form no-style');
		$form->getValidator()->setJavascriptValidationHandler('none');
		$form->setFormMethod('GET');
		$form->disableSecurityToken();
		
		return $form;
	}

}

?>