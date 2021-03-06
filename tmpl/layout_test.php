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

$warn_state = 0;
$array = array();
$report= '<table class="eiko_unwetter_table">';
		$report .= '<tr>'; 
		$report .= '<th class="eiko_unwetter_th">';
	    $report .= '<b>Wetterwarnung für '.$kreis_name.' :</b>';
		$report .= '</th>';
		$report .= '<tr>';
		$report .= '<td class="eiko_space"></td>';
		$report .= '</tr>';
foreach ($arr as $k=>$v){
				$array[$k] = '"'.htmlentities($v[0]['regionName'], ENT_QUOTES, 'UTF-8').'"';
				if ($k==$kreis) : 
				//if ($regionName==$kreis) : $warn_state++; 
				foreach ($v as $h=>$j){ //print_r ($j);
				$warn_state++;
				$regionName = htmlentities($v[$h]['regionName'], ENT_QUOTES, 'UTF-8');
				$altitudeStart = $v[$h]['altitudeStart'];  
				$altitudeEnd = $v[$h]['altitudeEnd']; 
				$start = date('d.m.Y', substr($v[$h]['start'], 0, -3)).' ('.date('H:i', substr($v[$h]['start'], 0, -3)).' Uhr)';  
				$headline = htmlentities($v[$h]['headline'], ENT_QUOTES, 'UTF-8'); 
				$event = htmlentities($v[$h]['event'], ENT_QUOTES, 'UTF-8');
				$instruction = htmlentities($v[$h]['instruction'], ENT_QUOTES, 'UTF-8'); 
				$description = htmlentities($v[$h]['description'], ENT_QUOTES, 'UTF-8'); 
				$end = date('d.m.Y', substr($v[$h]['end'], 0, -3)).' ('.date('H:i', substr($v[$h]['end'], 0, -3)).' Uhr)';
				$type = $v[$h]['type']; 
				$level = $v[$h]['level']; 
				$state = htmlentities($v[$h]['state'], ENT_QUOTES, 'UTF-8'); 
				
				
					$report .= '</tr>';
					$report .= '<tr>';
					$report .= '<td class="eiko_unwetter_td" style="'.$DEFCON[$level]['color'].'">';
					$report .= '<b>'.$headline.'</b>';  
					$report .= '</td>';
					$report .= '</tr>';
					
					if ($show_level_type) :
					$report .= '<tr>';
					$report .= '<td class="eiko_unwetter_td" style="'.$DEFCON[$level]['color'].'">';
					$report .= 'Level: '.$level.' Type: '.$type;  
					$report .= '</td>';
					$report .= '</tr>';
					endif;
					
					if ($show_event) :
					$report .= '<tr>';
					$report .= '<td class="eiko_unwetter_td" style="'.$DEFCON[$level]['color'].'">';
					$report .= 'Event: '.$event;  
					$report .= '</td>';
					$report .= '</tr>';
					endif;
					
					if ($show_state) :
					$report .= '<tr>';
					$report .= '<td class="eiko_unwetter_td" style="'.$DEFCON[$level]['color'].'">';
					$report .= 'Bundesland: '.$state;  
					$report .= '</td>';
					$report .= '</tr>';
					endif;

					if ($show_description && $description) :
					$report .= '<tr>';
					$report .= '<td class="eiko_unwetter_td" style="'.$DEFCON[$level]['color'].'">';
					$report .= $description;
					$report .= '</td>';
					$report .= '</tr>';
					$report .= '<tr>';
					endif;
					
					if ($show_instruction && $instruction) :
					$report .= '<tr>';
					$report .= '<td class="eiko_unwetter_td" style="'.$DEFCON[$level]['color'].'">';
					$report .= $instruction;  
					$report .= '</td>';
					$report .= '</tr>';
					endif;

					$report .= '<td class="eiko_unwetter_td" style="'.$DEFCON[$level]['color'].'">';
					$report .= 'Gültig von '.$start.' bis '.$end.'';
					$report .= '</td>';
					$report .= '</tr>';
					$report .= '<tr>';
					$report .= '<td class="eiko_space"></td>';
					$report .= '</tr>';
				 //echo $regionName.' = '.$headline.'<br/>';
}	
endif;
}
if (!$warn_state) :
					$report .= '<tr>';
					$report .= '<td class="eiko_unwetter_td" style="background-color: #c5e566  !important;color:#000000 !important;">';
					$report .= 'Es ist zur Zeit keine Warnung aktiv.';
					$report .= '</td>';
					$report .= '</tr>';
endif;

	if ($warnkarte) :
			if ($show_germany) :
				$report .= '<tr><td class="eiko_unwetter_td"><a target="_BLANK" href="http://www.dwd.de/DE/wetter/warnungen/warnWetter_node.html"><img src="http://www.dwd.de/DWD/warnungen/warnapp/json/warning_map.png" width="'.$width.'" border="0"></a></td></tr><tr><td class="eiko_space"></td></tr>';
			else:
				$report .= '<tr><td class="eiko_unwetter_td"><a target="_BLANK" href="http://www.dwd.de/DE/wetter/warnungen/warnWetter_node.html"><img src="http://www.dwd.de/DWD/warnungen/warnstatus/Schilder'.$schild.'.jpg" title="Warnkarte: '.$bundesland_name.'" width="'.$width.'" border="0"></a></td></tr><td class="eiko_space"></td></tr>';
		endif;
	endif;	
					$report .= '<td class="eiko_unwetter_td">'; 
					$report .= '<span class="dwd_count">'.$warn_state.' Warnung(en) aktiv</span>  <a class="dwd_copyright" href="http://www.dwd.de" target="_blank">Quelle: Deutsche Wetterdienst</a> <span class="dwd_copyright">( Letzte Aktualisierung '.$time.')</span>';
					$report .= '</td>';
					$report .= '</tr>';
$report .= '</table>';

echo $report;	

								



?>
