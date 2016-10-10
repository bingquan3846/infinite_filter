<?php

namespace Stilbezirk\InfiniteFilter\Domain\Model;


/**
 * Class Content
 * @package Stilbezirk\InfiniteFilter\Domain\Model
 */
class Content extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
    /**
     * uid
     *
     * @var string
     */
    protected $uid = '';

    /**
     * pid
     *
     * @var string
     */
    protected $pid = '';

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

    /**
     * @return string
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * @param string $pid
     */
    public function setPid($pid)
    {
        $this->pid = $pid;
    }


}