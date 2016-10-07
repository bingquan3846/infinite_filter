<?php

namespace Stilbezirk\infinitefilter\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Bingquan Bao <bingquan3846@gmail.com>, Stilbezirk.de
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Stilbezirk\infinitefilter\Domain\Model\Category.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Bingquan Bao <bingquan3846@gmail.com>
 */
class CategoryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Stilbezirk\infinitefilter\Domain\Model\Category
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Stilbezirk\infinitefilter\Domain\Model\Category();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTopReturnsInitialValueForBoolean() {
		$this->assertSame(
			FALSE,
			$this->subject->getTop()
		);
	}

	/**
	 * @test
	 */
	public function setTopForBooleanSetsTop() {
		$this->subject->setTop(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'top',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCategoryRelReturnsInitialValueForCategory() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getCategoryRel()
		);
	}

	/**
	 * @test
	 */
	public function setCategoryRelForObjectStorageContainingCategorySetsCategoryRel() {
		$categoryRel = new \Stilbezirk\infinitefilter\Domain\Model\Category();
		$objectStorageHoldingExactlyOneCategoryRel = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneCategoryRel->attach($categoryRel);
		$this->subject->setCategoryRel($objectStorageHoldingExactlyOneCategoryRel);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneCategoryRel,
			'categoryRel',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addCategoryRelToObjectStorageHoldingCategoryRel() {
		$categoryRel = new \Stilbezirk\infinitefilter\Domain\Model\Category();
		$categoryRelObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$categoryRelObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($categoryRel));
		$this->inject($this->subject, 'categoryRel', $categoryRelObjectStorageMock);

		$this->subject->addCategoryRel($categoryRel);
	}

	/**
	 * @test
	 */
	public function removeCategoryRelFromObjectStorageHoldingCategoryRel() {
		$categoryRel = new \Stilbezirk\infinitefilter\Domain\Model\Category();
		$categoryRelObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$categoryRelObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($categoryRel));
		$this->inject($this->subject, 'categoryRel', $categoryRelObjectStorageMock);

		$this->subject->removeCategoryRel($categoryRel);

	}
}
