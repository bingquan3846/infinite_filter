<?php
namespace Stilbezirk\infinitefilter\Tests\Unit\Controller;
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
 * Test case for class Stilbezirk\infinitefilter\Controller\SearchObjectController.
 *
 * @author Bingquan Bao <bingquan3846@gmail.com>
 */
class SearchObjectControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \Stilbezirk\infinitefilter\Controller\SearchObjectController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('Stilbezirk\\infinitefilter\\Controller\\SearchObjectController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllSearchObjectsFromRepositoryAndAssignsThemToView() {

		$allSearchObjects = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$searchObjectRepository = $this->getMock('Stilbezirk\\infinitefilter\\Domain\\Repository\\SearchObjectRepository', array('findAll'), array(), '', FALSE);
		$searchObjectRepository->expects($this->once())->method('findAll')->will($this->returnValue($allSearchObjects));
		$this->inject($this->subject, 'searchObjectRepository', $searchObjectRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('searchObjects', $allSearchObjects);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenSearchObjectToView() {
		$searchObject = new \Stilbezirk\infinitefilter\Domain\Model\SearchObject();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('searchObject', $searchObject);

		$this->subject->showAction($searchObject);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenSearchObjectToView() {
		$searchObject = new \Stilbezirk\infinitefilter\Domain\Model\SearchObject();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newSearchObject', $searchObject);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($searchObject);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenSearchObjectToSearchObjectRepository() {
		$searchObject = new \Stilbezirk\infinitefilter\Domain\Model\SearchObject();

		$searchObjectRepository = $this->getMock('Stilbezirk\\infinitefilter\\Domain\\Repository\\SearchObjectRepository', array('add'), array(), '', FALSE);
		$searchObjectRepository->expects($this->once())->method('add')->with($searchObject);
		$this->inject($this->subject, 'searchObjectRepository', $searchObjectRepository);

		$this->subject->createAction($searchObject);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenSearchObjectToView() {
		$searchObject = new \Stilbezirk\infinitefilter\Domain\Model\SearchObject();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('searchObject', $searchObject);

		$this->subject->editAction($searchObject);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenSearchObjectInSearchObjectRepository() {
		$searchObject = new \Stilbezirk\infinitefilter\Domain\Model\SearchObject();

		$searchObjectRepository = $this->getMock('Stilbezirk\\infinitefilter\\Domain\\Repository\\SearchObjectRepository', array('update'), array(), '', FALSE);
		$searchObjectRepository->expects($this->once())->method('update')->with($searchObject);
		$this->inject($this->subject, 'searchObjectRepository', $searchObjectRepository);

		$this->subject->updateAction($searchObject);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenSearchObjectFromSearchObjectRepository() {
		$searchObject = new \Stilbezirk\infinitefilter\Domain\Model\SearchObject();

		$searchObjectRepository = $this->getMock('Stilbezirk\\infinitefilter\\Domain\\Repository\\SearchObjectRepository', array('remove'), array(), '', FALSE);
		$searchObjectRepository->expects($this->once())->method('remove')->with($searchObject);
		$this->inject($this->subject, 'searchObjectRepository', $searchObjectRepository);

		$this->subject->deleteAction($searchObject);
	}
}
