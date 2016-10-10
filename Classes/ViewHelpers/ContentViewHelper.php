<?php

namespace Stilbezirk\InfiniteFilter\ViewHelpers;


class ContentViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper{

    public function render( \Stilbezirk\InfiniteFilter\Domain\Model\Content $content){
        $conf['table'] = 'tt_content';
        $conf['select.']['where'] = 'uid = ' . $content->getUid();
        $conf['select.']['pidInList'] = $content->getPid();

        $cObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer');

        return $cObject->getContentObject('CONTENT')->render($conf);
    }
}