<?php
namespace Ppi\PpiTemplavoilaplusYoast;

/**
 *  Copyright notice
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
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;

use Ppi\TemplaVoilaPlus\Controller\BackendLayoutController;

/**
 * Class to add Yoast SEO to the templavoila page module
 * Uses the renderHeaderFunctionHook hook
 *
 * @author Alexander Opitz <opitz@pluspol-interactive.de>
 */
class RenderHook
{
    public function renderHeaderFunctionHook(array $params, BackendLayoutController $parentObject)
    {
        /** @var TYPO3\CMS\Backend\Controller\PageLayoutController $pageLayoutController */
        $GLOBALS['SOBE'] = GeneralUtility::makeInstance(\TYPO3\CMS\Backend\Controller\PageLayoutController::class);
        $GLOBALS['SOBE']->id = $parentObject->id;
        $GLOBALS['SOBE']->current_sys_language = $parentObject->currentLanguageUid;

        /** @var YoastSeoForTypo3\YoastSeo\Backend\PageLayoutHeader $yoast */
        $yoast = GeneralUtility::makeInstance(\YoastSeoForTypo3\YoastSeo\Backend\PageLayoutHeader::class);
        $output = $yoast->render();

        $returnUrlFalse = BackendUtility::getModuleUrl(
            'web_layout',
            ['id' => (int)$parentObject->id]
        );

        $returnUrlTemplaVoila = BackendUtility::getModuleUrl(
            'web_txtemplavoilaplusLayout',
            ['id' => (int)$parentObject->id]
        );

        $returnUrlFalse = rawurlencode($returnUrlFalse);
        $returnUrlTemplaVoila = rawurlencode($returnUrlTemplaVoila);

        $output = str_replace($returnUrlFalse, $returnUrlTemplaVoila, $output);

        return $output;
    }
}
