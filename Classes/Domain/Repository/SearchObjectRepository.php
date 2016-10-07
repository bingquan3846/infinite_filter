<?php
namespace Stilbezirk\InfiniteFilter\Domain\Repository;


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
 * The repository for SearchObjects
 */
class SearchObjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    /**
     * @param int $cid
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByCategory( $cid = 0){

        $query = $this->createQuery();
        $query_str = "select * from tx_infinitefilter_domain_model_searchobject searchobject
                                    inner join tx_infinitefilter_searchobject_category_mm mm  on (mm.uid_local = searchobject.uid and mm.uid_foreign = ".$cid.")";
        $query->statement($query_str);

        return $query->execute();
    }
	
}