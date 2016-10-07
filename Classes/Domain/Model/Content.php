<?php
/**
 * Created by PhpStorm.
 * User: Bingquan Bao
 * Date: 07.10.2016
 * Time: 11:36
 */

namespace Stilbezirk\InfiniteFilter\Domain\Model;


class Content extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
    /**
     * uid
     *
     * @var string
     */
    protected $uid = '';

    /**
     * contentType
     *
     * @var string
     */
    protected $contentType = '';

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @param string $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    /**
     * @param string $contentType
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
    }


}