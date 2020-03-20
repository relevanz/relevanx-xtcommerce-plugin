<?php
defined('_VALID_CALL') or die('Direct Access is not allowed.');

if(isset($xtPlugin->active_modules['tfm_releva_nz']) && TFM_RNZ_ACTIVATE =='true') {


    require _SRV_WEBROOT . 'plugins/tfm_releva_nz/classes/class.tfm_releva_nz.php';
    $rnz = new tfm_releva_nz;
    global $page,$current_category_id,$current_product_id;


    if(isset($_SESSION['tfm_releva_nz_product_added'])){
        echo '<script src = "https://pix.hyj.mobi/rt?t=d&action=w&cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'&id='.$_SESSION['tfm_releva_nz_product_pid'].'" async="async" ></script>';

        unset($_SESSION['tfm_releva_nz_product_added']);
        unset($_SESSION['tfm_releva_nz_product_pid']);
    }

    switch ($page->page_name) {
        case 'manufacturers ':
// manufacturere ID like a cat, just with "m_" prefix
            echo '<script src = "https://pix.hyj.mobi/rt?t=d&action=c&cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'&id=m_'.$current_manufacturer_id.'" async="async" ></script>';
            break;        case 'categorie':
// CATEGORY_ID
            echo '<script src = "https://pix.hyj.mobi/rt?t=d&action=c&cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'&id='.$current_category_id.'" async="async" ></script>';
            break;
        case 'product':
// PRODUCT_ID
            echo '<script src = "https://pix.hyj.mobi/rt?t=d&action=p&cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'&id='.$current_product_id.'" async="async" ></script>';
            break;
        case 'checkout':
            if ( $page->page_action == 'success') {
                echo $rnz->_getConversionCode();
            }else{
                echo '<script src = "https://pix.hyj.mobi/rt?t=d&action=s&cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'" async="async" ></script>';
            }
            break;

        default:
            echo '<script src = "https://pix.hyj.mobi/rt?t=d&action=s&cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'" async="async" ></script>';

            // no tag?
            break;
    }


}