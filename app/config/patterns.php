<?php

return array(
	// =========== TAXONOMY ============
	'taxonomy' => '@<tr>
<td><b>Phylum</b></td>
<td><b>Class</b></td>
<td><b>Order</b></td>
<td><b>Family</b></td>
<td><b>Subfamily</b></td>
</tr>
<tr>
<td>(?<phylum>.*)</td>
<td>(?<class>.*)</td>
<td>(?<order>.*)</td>
<td>(?<family>.*)</td>
<td>(?<subfamily>.*)</td>
</tr>@',

	// =========== HOST ============ 
	'host' => '@<tr>
<td><b>Host</b></td>
<td><b>Host family</b></td>
</tr>
<tr>
<td>(?<species>.*)</td>
<td>(?<family>.*)</td>
</tr>@',

	// =========== REGION ============
	'region' => '@Region</font></b></td>
<td>(?<name>.*)</td>
</tr>@',

	// =========== GEOGRAPHY ============
	'geography' => '@<!-- Start Sub Table -->
<table.*>
<tr>
<td><b>Continent</b></td>
<td><b>Country</b></td>
<td><b>Island Group</b></td>
<td><b>Island</b></td>
</tr>
<tr>
<td>(?<continent>.*)</td>
<td>(?<country>.*)</td>
<td>(?<island_group>.*)</td>
<td>(?<island>.*)</td>
</tr>
</table>
<!-- End Sub Table --></td>@',
	
	// ========= COUNTRY GEOGRAPHY ==========
	'country_geography' => '@</tr>
.*
<td width="160"><b><font color="#000000" face="Verdana" size="2">Country geography</font></b></td>
.*
<table border="0" cellpadding="1" cellspacing="0" width="100%">
<tr>
<td><b>Province/State/Territory</b></td>
<td><b>District/County/Shire</b></td>
</tr>
<tr>
<td>(?<state>.*)</td>
<td>(?<district>.*)</td>
</tr>
</table>
.*
</tr>@',

	// =========== PRECISE LOCATION ==========
	'precise_location' => '@<td width="160"><b><font color="#000000" face="Verdana" size="2">Precise location</font></b></td>
<td>(?<name>.*)</td>
</tr>@',

	// =========== COORDINATES ===========
	'coordinates'	=> '@<td width="160"><b><font color="#000000" face="Verdana" size="2">Lat / Lon \(Dec.\)</font></b></td>
<td>(?<lat>.*) (?<lon>.*)</td>
</tr>@',

	// =========== COLLECTOR ============
	'collector' => '@<td width="160"><b><font color="#000000" face="Verdana" size="2">Collector\(s\)</font></b></td>
<td>(?<name>.*)</td>
</tr>@',

	// =========== COLLECTED DATE =======
	'collected_date' => '@<td width="160"><b><font color="#000000" face="Verdana" size="2">Collected date\(s\)</font></b></td>
<td>(?<start>.*) to (?<end>.*)</td>
</tr>@',
);