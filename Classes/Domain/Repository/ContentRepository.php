<?php

namespace Stilbezirk\InfiniteFilter\Domain\Repository;


class ContentRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     *  ingore the storage page Pid
     */
    public function initializeObject() {
        /** @var $querySettings \TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface */
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\QuerySettingsInterface');
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }


    public function getContentByUid($uid){
        $query = $this->createQuery();
        $result = $query->matching($query->equals('uid', $uid ))->execute();

        /*$parser = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Storage\\Typo3DbQueryParser');
        $queryParts = $parser->parseQuery($query);
        \TYPO3\CMS\Core\Utility\DebugUtility::debug($queryParts, 'query');
        */

        return $result;
    }
}