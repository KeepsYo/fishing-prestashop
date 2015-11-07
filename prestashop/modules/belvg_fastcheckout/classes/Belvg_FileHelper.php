<?php

/*
* 2007-2013 PrestaShop  
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
*         DISCLAIMER   *
* *************************************** */
/* Do not edit or add to this file if you wish to upgrade Prestashop to newer
* versions in the future.
* ****************************************************
* @category   Belvg
* @package    
* @author    Alexander Simonchik <support@belvg.com>
* @site   
* @copyright  Copyright (c) 2010 - 2013 BelVG LLC. (http://www.belvg.com)
* @license    http://store.belvg.com/BelVG-LICENSE-COMMUNITY.txt 
*/

class Belvg_FileHelper
{

    /**
     * Belvg_FileHelper::removeDir()
     * 
     * @param mixed $path
     * @return bool
     */
    public static function removeDir($path)
    {
        if (is_dir($path)) {
            $files = glob($path . '*');
            if (is_array($files)) {
                foreach ($files as $cacheFile) {
                    if (is_dir($cacheFile)) {
                        self::removeDir($cacheFile . '/');
                        rmdir($cacheFile);
                    } else {
                        unlink($cacheFile);
                    }
                }
            }
        }

        return TRUE;
    }

    /**
     * Belvg_FileHelper::copy_directory()
     * 
     * @param mixed $source
     * @param mixed $destination
     * @return void
     */
    public static function copy_directory($source, $destination)
    {
        if (is_dir($source)) {
            if (!is_dir($destination)) {
                mkdir($destination);
            }

            $directory = dir($source);
            while (FALSE !== ($readdirectory = $directory->read())) {
                if ($readdirectory == '.' || $readdirectory == '..') {
                    continue;
                }

                $PathDir = $source . '/' . $readdirectory;
                if (is_dir($PathDir)) {
                    self::copy_directory($PathDir, $destination . '/' . $readdirectory);
                    continue;
                }

                copy($PathDir, $destination . '/' . $readdirectory);
            }

            $directory->close();
        } else {
            copy($source, $destination);
        }
    }

}
