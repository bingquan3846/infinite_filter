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
 * Category
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * top
	 *
	 * @var boolean
	 */
	protected $top = FALSE;

	/**
	 * categoryRel
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Category>
	 */
	protected $categoryRel = NULL;

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
		$this->categoryRel = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the top
	 *
	 * @return boolean $top
	 */
	public function getTop() {
		return $this->top;
	}

	/**
	 * Sets the top
	 *
	 * @param boolean $top
	 * @return void
	 */
	public function setTop($top) {
		$this->top = $top;
	}

	/**
	 * Returns the boolean state of top
	 *
	 * @return boolean
	 */
	public function isTop() {
		return $this->top;
	}

	/**
	 * Adds a Category
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\Category $categoryRel
	 * @return void
	 */
	public function addCategoryRel(\Stilbezirk\InfiniteFilter\Domain\Model\Category $categoryRel) {
		$this->categoryRel->attach($categoryRel);
	}

	/**
	 * Removes a Category
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\Category $categoryRelToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategoryRel(\Stilbezirk\InfiniteFilter\Domain\Model\Category $categoryRelToRemove) {
		$this->categoryRel->detach($categoryRelToRemove);
	}

	/**
	 * Returns the categoryRel
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Category> $categoryRel
	 */
	public function getCategoryRel() {
		return $this->categoryRel;
	}

	/**
	 * Sets the categoryRel
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Stilbezirk\InfiniteFilter\Domain\Model\Category> $categoryRel
	 * @return void
	 */
	public function setCategoryRel(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categoryRel) {
		$this->categoryRel = $categoryRel;
	}

}