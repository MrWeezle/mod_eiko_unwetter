<?php
/**
 * @version     1.00
 * @package     mod_eiko_unwetter
 * @copyright   Copyright (C) 2015 by Ralf Meyer. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Ralf Meyer <ralf.meyer@einsatzkomponente.de> - http://einsatzkomponente.de
 */

// no direct access
defined('_JEXEC') or die;


?>
<style>
<?php echo $css; ?>
</style>
<?php


echo '<table class="eiko_karte_table">';


if($titel_karte == "1")
{
if($unwetterkarte == "1")
{
echo '<tr class="eiko_karte_tr">';
echo '<th class="eiko_karte_th">';
echo 'Unwetterwarnkarte';
echo '</th>';
echo '</tr>';
}
}

echo '<tr class="eiko_karte_tr">';
echo '<td class="eiko_karte_td">';


if($unwetterkarte == "1")
{
echo '<a target="_BLANK" href="http://www.dwd.de/DE/wetter/warnungen/warnWetter_node.html"><img src="http://www.dwd.de/DWD/warnungen/warnapp/json/warning_map.png" title="Unwetterwarnkarte" width="'.$width_karte.'" border="0"></a>';
}

echo '</td>';
echo '</tr>';

if($titel_karte == "1")
{
if($waldbrandkarte == "1")
{
echo '<tr class="eiko_karte_tr">';
echo '<th class="eiko_karte_th">';
echo 'Waldbrandgefahrenindex';
echo '</th>';
echo '</tr>';
}
}

echo '<tr class="eiko_karte_tr">';
echo '<td class="eiko_karte_td">';

if($waldbrandkarte == "1")
{
echo '<a href="http://www.dwd.de/DE/leistungen/waldbrandgef_bl/waldbrandgefbl.html?nn=16102&cl2Categories_Bundesland=wbh_'.$bundesland.'" target="_blank"><img src="http://www.dwd.de/DWD/warnungen/agrar/wbx/wbx_stationen.png" title="Waldbrandgefahrenindex" width="'.$width_karte.'" border="0"></a>';
}

echo '</td>';
echo '</tr>';

if($titel_karte == "1")
{
if($graslandkarte == "1")
{
echo '<tr class="eiko_karte_tr">';
echo '<th class="eiko_karte_th">';
echo 'Graslandfeuer-Index';
echo '</th>';
echo '</tr>';
}
}

echo '<tr class="eiko_karte_tr">';
echo '<td class="eiko_karte_td">';

if($graslandkarte == "1")
{
echo '<a href="http://www.dwd.de/DE/leistungen/graslandfi_bl/graslandfibl.html?nn=16102&cl2Categories_Bundesland=glh_'.$bundesland.'" target="_blank"><img src="http://www.dwd.de/DWD/warnungen/agrar/glfi/glfi_stationen.png" title="Graslandfeuer-Index" width="'.$width_karte.'" border="0"></a>';
}

echo '</td>';
echo '</tr>';
echo '<tr class="eiko_karte_tr">';

echo '<td class="eiko_karte_td">';

echo '<span style="font-size:9px; color:#969696;">&nbsp;&nbsp;&nbsp;&copy; Deutscher Wetterdienst, (DWD) </a></span>';
echo '</td>';
echo '</tr>';


echo '</table>';

?>
