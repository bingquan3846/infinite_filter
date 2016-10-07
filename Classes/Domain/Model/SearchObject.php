<?php
namespace Stilbezirk\InfiniteFilter\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Bingquan Bao <bingquan3846@gmail.com>, Stilbezirk.de
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * SearchObject
 */
class SearchObject extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * objContent
	 *
	 * @var string
	 */
	protected $objContent = '';

	/**
	 * country
	 *
	 * @var string
	 */
	protected $country = '';

	/**
	 * category
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Category>
	 */
	protected $category = NULL;
	/**
	 * content
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Content>
	 */
	protected $content = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->content  = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the objContent
	 *
	 * @return string $objContent
	 */
	public function getObjContent() {
		return $this->objContent;
	}

	/**
	 * Sets the objContent
	 *
	 * @param string $objContent
	 * @return void
	 */
	public function setObjContent($objContent) {
		$this->objContent = $objContent;
	}

	/**
	 * Returns the country
	 *
	 * @return string $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * Adds a Category
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\Stilbezirk\InfiniteFilter\Domain\Model\Category $category) {
		$this->category->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\Stilbezirk\InfiniteFilter\Domain\Model\Category $categoryToRemove) {
		$this->category->detach($categoryToRemove);
	}

	/**
	 * Adds a content
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\Content $content
	 * @return void
	 */
	public function addContent(\Stilbezirk\InfiniteFilter\Domain\Model\Content $content) {
		$this->content->attach($content);
	}

	/**
	 * Removes a Content
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\Content $contentToRemove The Content to be removed
	 * @return void
	 */
	public function removeContent(\Stilbezirk\InfiniteFilter\Domain\Model\Content $contentToRemove) {
		$this->content->detach($contentToRemove);
	}
	/**
	 * Returns the category
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Category> $category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Sets the category
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Category> $category
	 * @return void
	 */
	public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category) {
		$this->category = $category;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Content> $content
	 */
	public function setContent(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $content)
	{
		$this->content = $content;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Content> $content
	 */
	public function getContent()
	{
		return $this->content;
	}


}