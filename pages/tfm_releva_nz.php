<?php

if($_GET['seckey'] != _SYSTEM_SECURITY_KEY){

    $xtLink->_redirect($xtLink->_link(array('page'=>'index')));

}

    $display_output = false;
    global $db;

$record = $db->execute('SELECT DISTINCT  `config_value` FROM `' . DB_PREFIX . '_config_plugin` WHERE `config_key` LIKE "TFM_RNZ_API_KEY"');
if ($record->RecordCount() >= 1) {
    while (!$record->EOF) {

        $menu[] = trim($record->fields['config_value']);

        $record->MoveNext();
    }
    $record->Close();
}


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>tfm_releva_nz</title>
        <style type="text/css">
            html, body, div, span, applet, object, iframe,
            h1, h2, h3, h4, h5, h6, p, blockquote, pre,
            a, abbr, acronym, address, big, cite, code,
            del, dfn, em, img, ins, kbd, q, s, samp,
            small, strike, strong, sub, sup, tt, var,
            b, u, i, center,
            dl, dt, dd, ol, ul, li,
            fieldset, form, label, legend,
            table, caption, tbody, tfoot, thead, tr, th, td,
            article, aside, canvas, details, embed,
            figure, figcaption, footer, header, hgroup,
            menu, nav, output, ruby, section, summary,
            time, mark, audio, video {
                margin: 0;
                padding: 0;
                border: 0;
                font-size: 100%;
                font: inherit;
                vertical-align: baseline;
            }

            /* HTML5 display-role reset for older browsers */
            article, aside, details, figcaption, figure,
            footer, header, hgroup, menu, nav, section {
                display: block;
            }

            body {
                line-height: 1;
            }

            ol, ul {
                list-style: none;
            }

            blockquote, q {
                quotes: none;
            }

            blockquote:before, blockquote:after,
            q:before, q:after {
                content: '';
                content: none;
            }

            table {
                border-collapse: collapse;
                border-spacing: 0;
            }

            #menu_selector{float:right;padding:10px;background:#3aa2fb;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif}
        </style>

    </head>


    <body id="home">


    <?php
    $menu_str = '<div id="menu_selector">';
    $menu_str .= '<form name="change">'.TEXT_TFM_RELEVA_NZ_SELECT_ID.'<br /><select name="options" onchange="document.getElementById(\'rnz_frame\').src = this.options[this.selectedIndex].value">';
    foreach ($menu as $k => $v){
        if($k == 0){
            $initial = $v;
        }

        $menu_str .= '<option value="http://customer.releva.nz/?apikey='.$v.'">'.$v.'</option>';
    }
    $menu_str .= '</select></form></div>';


    if(count($menu) >= 2){
        echo $menu_str;
    }


    ?>



    <iframe src="https://customer.releva.nz/?apikey=<?= trim($initial) ?>" id="rnz_frame" style="width:100%;height:100%;border:0;min-height:800px"></iframe>
    </body>
    </html>
