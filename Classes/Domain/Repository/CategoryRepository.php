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
 * The repository for Categories
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    /**
     * @param string $cid
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function getTopCategories($cid = ''){
        $query = $this->createQuery();
        if( $cid == '' ){
            $query_str = "select * from tx_infinitefilter_domain_model_category where top = 1 and deleted = 0 and hidden = 0";
        }else{
            $query_str = "select * from tx_infinitefilter_domain_model_category where top = 1 and deleted = 0 and hidden = 0 and uid in (" . $cid . ")";
        }

        $query->statement($query_str);
        return $query->execute();
    }

}