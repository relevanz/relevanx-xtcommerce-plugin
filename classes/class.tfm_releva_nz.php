<?php
/*
 #########################################################################
 #                       xt:Commerce 5 Shopsoftware
 # ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 #
 # Copyright 2007-2016 xt:Commerce International Ltd. All Rights Reserved.
 # This file may not be redistributed in whole or significant part.
 # Content of this file is Protected By International Copyright Laws.
 #
 # ~~~~~~ xt:Commerce 5 Shopsoftware IS NOT FREE SOFTWARE ~~~~~~~
 #
 # http://www.xt-commerce.com
 #
 # ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 #
 # @copyright xt:Commerce International Ltd., www.xt-commerce.com
 #
 # ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 #
 # xt:Commerce International Ltd., Kafkasou 9, Aglantzia, CY-2112 Nicosia
 #
 # office@xt-commerce.com
 #
 #########################################################################
 */

defined('_VALID_CALL') or die('Direct Access is not allowed.');

class tfm_releva_nz {
    


	function _getConversionCode() {
		global $success_order;

        if (!is_object($success_order)) return false;
        
        $total_net=0;
        $success_order->order_data['orders_id'];
		foreach ($success_order->order_products as $key => $arr) {                                                                  
		    $total_net+=$arr['products_final_price']['plain_otax'];                                                                 
		    $products_list[] =$arr['orders_products_id'];
        }

        /*
         * $total_net= Produktprices without shipping or any fee!
         * Percentage discounts will be applied, "fixed amount" discounts not
         * */
        $code = '';
        $code .= '<script src = "https://d.hyj.mobi/conv?cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'&orderId='.$success_order->order_data['orders_id'].'&amount='.$total_net.'&products='.implode(',',$products_list).'" ></script>';
        // produkte demarkieren nach conversion
        $code .= '<script src = "https://pix.hyj.mobi/rt?t=d&action=t&cid='.trim(TFM_RNZ_USER_ID_CAMP_ID).'&products='.implode(',',$products_list).'" async="async" ></script>';

		return $code;
	}



    function _getTrackingCode($page_type){




    }



}