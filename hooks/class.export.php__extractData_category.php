<?php
defined('_VALID_CALL') or die('Direct Access is not allowed.');

if(isset($xtPlugin->active_modules['tfm_releva_nz']) && TFM_RNZ_ACTIVATE =='true') {


    if ($rs->RecordCount() == 1) {
        $data_array['tfm_category_id'] = $rs->fields['categories_id'];
    }

}

