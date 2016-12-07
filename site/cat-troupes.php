<?php
include('bdd.php');
$voir = mysql_query("SELECT * FROM troupes WHERE pseudo='$pseudo';");
$base = mysql_fetch_array($voir);

$result = $base['Piquier'] + $base['Archerléger'] + $base['Porteurdemasse'] + $base['Arbalétrier'] + $base['Epéiste']  + $base['Archer']  + $base['Hallebardier']  + $base['Archerlong']  + $base['Epéeàdeuxmains']  + $base['Arbalétrierlourd'] + $base["Massedelombre"] + $base['Arbalétrierdelombre'] + $base["Fripouilledelombre"] + $base["Félondelombre"] + $base['Scélératdelombre']  + $base["Vauriendelombre"] + $base['Pyrommane'] + $base['Pyromanevétéran'] + $base['Maraudeur'] + $base['Maitrepilleurvétéran'] + $base['Porteurdemassevétéran'] + $base['Arbalétriervétéran'] + $base['Piquiervétéran'] + $base['Archerlégervétéran'] + $base['Epéistevétéran'] + $base['Chevaliererrant'] + $base['Arbalétriererrant'] + $base['Chevalierdelagarderoyale'] + $base['Arbalétrierdelagarderoyale'] + $base['Sentinelledelagarderoyale'] + $base['Archerdudésertrenégat'] + $base['Eclaireurdelagarderoyale'] + $base['Scandinaveavechache'] + $base['Scandinaveavecarc'] + $base['Archerscandinaverenégat'] + $base['Guerrierscandinave renégat'] + $base['Barbare'] + $base['Chienloup'] + $base['Archerdudésertrenégat'] + $base['Sabreurdudésertrenégat'] + $base['Archerdudésert'] + $base['Archercomposite'] + $base['Porteurdeflamme'] + 
$base['Archerlégersquelette'] + $base['Archerours'] + $base['Guerrierours'] + $base['Archerlion'] + $base['Boeufarcherlong'] + $base['Hallebardierbovin'] + $base['Archerduculterenégat'] + $base['Guerrierduculterenégat'] + $base['Pirateabordeur'] + $base['LEventreurdesmersrenégat'] + $base['Tentacule'] +  $base['Frondeur'] + $base['Sabreurs'] + $base['Lanciers'] + $base['Lanceursdejavelots'] + $base['GardesduKhan'] + $base['Assassin'] + $base['Tueurdedémons'] + $base['Guerrierdentderequinrenégat'] + $base['Ecrasepierrerenégat'] + $base['Horreurdémoniaque'];

$quete = mysql_query("UPDATE troupes SET nombret ='$result' WHERE pseudo='$pseudo';");

echo $result ;


?>