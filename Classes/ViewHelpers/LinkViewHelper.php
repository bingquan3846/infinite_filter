<?php

namespace Stilbezirk\InfiniteFilter\ViewHelpers;


class LinkViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper{

    public function render(\Stilbezirk\InfiniteFilter\Domain\Model\SearchObject $searchObject){
        $configuration['parameter'] = $searchObject->getInternalurl();
        $cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');

        $conf['data'] = "DB:pages:{$searchObject->getInternalurl()}:title";

        return $cObject->typolink($cObject->getContentObject('TEXT')->render($conf), $configuration);
    }

}