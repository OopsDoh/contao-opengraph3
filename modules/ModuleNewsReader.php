<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2017 Leo Feyer
 *
 * @package   OpenGraph3
 * @author    Benny Born <benny.born@numero2.de>
 * @license   LGPL
 * @copyright 2017 numero2 - Agentur für Internetdienstleistungen
 */


/**
 * Namespace
 */
namespace numero2\OpenGraph3;


class ModuleNewsReader extends \Contao\ModuleNewsReader {


	/**
	 * Extends the original NewsReader Module
	 * and generates OpenGraph data from the currently
	 * shown news article
	 */
	protected function compile() {

		parent::compile();

		// Get the news item
		$objArticle = \NewsModel::findPublishedByParentAndIdOrAlias(\Input::get('items'), $this->news_archives);

		if( null !== $objArticle ) {

			$openGraph = new OpenGraph3();
			$openGraph->setPageOGTags( $objArticle );
		}
	}
}