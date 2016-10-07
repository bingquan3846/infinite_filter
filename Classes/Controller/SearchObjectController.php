<?php
namespace Stilbezirk\InfiniteFilter\Controller;


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
 * SearchObjectController
 */
class SearchObjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
    /**
     * searchObjectRepository
     *
     * @var \Stilbezirk\InfiniteFilter\Domain\Repository\SearchObjectRepository
     * @inject
     */
    protected $searchObjectRepository = NULL;
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
        $parameters = $this->request->getArguments();

        if( $parameters['category'] ){
            $searchObjects = $this->searchObjectRepository->findByCategory($parameters['category']);
        }else{
            $searchObjects = $this->searchObjectRepository->findAll();
        }

		$this->view->assign('searchObjects', $searchObjects);
        echo $this->view->render();
        exit;
	}

	/**
	 * action show
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject
	 * @return void
	 */
	public function showAction(\Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject) {
		$this->view->assign('searchObject', $searchObject);
	}

	/**
	 * action new
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $newSearchObject
	 * @ignorevalidation $newSearchObject
	 * @return void
	 */
	public function newAction(\Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $newSearchObject = NULL) {
		$this->view->assign('newSearchObject', $newSearchObject);
	}

	/**
	 * action create
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $newSearchObject
	 * @return void
	 */
	public function createAction(\Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $newSearchObject) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->searchObjectRepository->add($newSearchObject);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject
	 * @ignorevalidation $searchObject
	 * @return void
	 */
	public function editAction(\Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject) {
		$this->view->assign('searchObject', $searchObject);
	}

	/**
	 * action update
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject
	 * @return void
	 */
	public function updateAction(\Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->searchObjectRepository->update($searchObject);
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject
	 * @return void
	 */
	public function deleteAction(\Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->searchObjectRepository->remove($searchObject);
		$this->redirect('list');
	}

}