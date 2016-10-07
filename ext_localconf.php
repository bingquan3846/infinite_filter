<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Stilbezirk.' . $_EXTKEY,
    'Filter',
    array(
        'Category' => 'list,show',
        'SearchObject' => 'list, show, new, create, edit, update, delete',

    ),
    // non-cacheable actions
    array(
        'Category' => 'list,show',
        'SearchObject' => 'list,create, update, delete',
    )
);
