<?php

/**
 *  2Moons 
 *   by Jan-Otto Kröpke 2009-2016
 *
 * For the full copyright and license information, please view the LICENSE
 *
 * @package 2Moons
 * @author Jan-Otto Kröpke <slaver7@gmail.com>
 * @copyright 2009 Lucky
 * @copyright 2016 Jan-Otto Kröpke <slaver7@gmail.com>
 * @licence MIT
 * @version 1.8.0
 * @link https://github.com/jkroepke/2Moons
 */

//SHORT NAMES FOR COMBAT REPORTS
$LNG['shortTips'] = array (
	106 => '+%s auf das Niveau der Spionage',
	109 => '+%s%s zur Bewaffnung',
	110 => '+%s%s zu schildern',
	111 => '+%s%s zur Rüstung',
	113 => '+%s%s zur Energieproduktion',
	115 => '+%s%s der Geschwindigkeit vom Jet-Motor',
	117 => '+%s%s der Geschwindigkeit vom Pulse Motor',
	118 => '+%s%s Geschwindigkeit vom Motor varp',
	120 => '+%s%s Schaden an Laserwaffe',
	121 => '+%s%s von Ionwaffe beschädigt',
	122 => '+%s%s Schaden an Plasma-Waffen',
	199 => '+%s%s Schaden an Gravitationswaffen',
	//NOUVEAU
	101 => '+%s zu den Schlitzen der Flotten', 
	102 => '+%s%s zur Minenproduktion',
	103 => '+%s auf die maximale Anzahl von Planeten',
	104 => '+%s Wissenschaft für das Studium der Allianzentwicklung',
	105 => '+%s%s zur Fluggeschwindigkeit',
	112 => '+%s Wissenschaftsabzüge zur Allianz',
	116 => '+%s%s von der Ionen-Motorgeschwindigkeit',
	124 => '+%s maximale Flottenpunkte in der Expedition <br> +%s%s zur Verlustwahrscheinlichkeit der Flotte',
	141 => '+%s%s zur leichten Rüstung',
	142 => '+%s%s zu mittlerer Rüstung',
	143 => '+%s%s zu schweren Rüstungen',
	144 => '+%s%s Anstieg der Fehlschläge',
	151 => '+%s%s zu Star Treks Questchance',
	152 => '+%s%s auf die Chance, nach Dark Matter zu suchen',
	153 => '+%s%s zur Flotten-Suche Chance',
	154 => '+%s Anzahl der Expeditionen',
	155 => '+%s%s Ermäßigung',
	156 => '+%s%s Chance, ein Upgrade zu finden <br> Die Mindestflottengröße beträgt %s Punkte',
	157 => '+%s%s Chance, ein Upgrade zu finden <br> Die Mindestflottengröße beträgt %s Punkte',
	158 => '+%s%s Chance, ein Upgrade zu finden <br> Die Mindestflottengröße beträgt %s Punkte',
	165 => '+%s%s um Motoren zu sparen',
	171 => '+%s%s an Lichtschildern <br> +%s%s zur Erholung von Lichtschildern',
	172 => '+%s%s bis mittlere Schilde <br>%s%s zur Erholung von mittleren Schildern',
	173 => '+%s%s zu schweren Schildern <br>+%s%s zur schweren Schildwiederherstellung',
	174 => '+%s%s zur Wiederherstellung von Schildern',
);
$LNG['shortNames'] = array (
	202 => 'Kleiner Transporter',
	203 => 'Großer Transporter',
	208 => 'Kolonieschiff',
	209 => 'Recycler',
	210 => 'Spionagesonde',
	212 => 'Solarsatellit',
	214 => 'Todesstern',
	217 => 'Evolution Transporter',
	219 => 'Gigarecycler',
	220 => 'Intergalaktischer D. Materiensammler',
	228 => 'Schwarzer Wanderer',
	204 => 'FL-1',
	205 => 'FL-4',
	206 => 'FL-3',
	207 => 'FL-5',
	211 => 'FM-45',
	213 => 'FL-9',
	215 => 'FM-40',
	216 => 'FM-50',
	218 => 'FM-75',
	221 => 'H-500',
	222 => 'H-260',
	223 => 'Сейвер',
	224 => 'FX-8',
	225 => 'FM-27',
	226 => 'FH-99',
	227 => 'Фрегат',
	229 => 'FX-7',
	230 => 'FX-32',
	231 => 'FX-19',
	232 => 'FM-60',
	233 => 'FH-140',
	235 => 'FH-109',

	401 => 'Raketenwerfer',
	402 => 'L. Lasergeschütz',
	403 => 'S. Lasergeschütz',
	404 => 'Gaußkanone',
	405 => 'Ionengeschütz',
	406 => 'Plasmawerfer',
	407 => 'Kl. Schildkuppel',
	408 => 'Gr. Schildkuppel',
	409 => 'Gig. Schildkuppel',
	410 => 'Gravitonenkanone',
	411 => 'Orb. VerPla',
	412 => 'Lepton Kanone',
	413 => 'Protonen Kanone',
	414 => 'Canyon',
	415 => 'Quantum Kanone',
	416 => 'Hydrogen Kanone',
	417 => 'Dora Kanone',
	418 => 'Photon Kanone',
	419 => 'Partikel Kanone',
	420 => 'DX-100',
	421 => 'DX-200',
	422 => 'DX-300',
	423 => 'Gatling Kanone',
	443 => 'DX-BOB',
	430 => 'Sentinel',
	434 => 'Armageddon Kanone',
	435 => 'Prometey-Komplex'
);

$LNG['bonus'] = array(
	'Attack'			=> 'Angriff',
	'Defensive'			=> 'Verteidigung',
	'Shield'			=> 'Schild',
	'BuildTime'			=> 'Bauzeit',
	'ResearchTime'		=> 'Forschungszeit',
	'ShipTime'			=> 'Schiffbauzeit',
	'DefensiveTime'		=> 'Verteidungsbauzeit',
	'Resource'			=> 'Mienenertrag',
	'Energy'			=> 'Energieerzeugung',
	'ResourceStorage'	=> 'Speicher',
	'ShipStorage'		=> 'Flottenkapazität',
	'FlyTime'			=> 'Flugzeit',
	'FleetSlots'		=> 'Flottenslots',
	'Planets'			=> 'Planeten',
	'SpyPower'			=> 'Spionagepower',
	'Expedition'		=> 'Expeditionen',
	'GateCoolTime'		=> 'Sprungtoraufladungszeit',
	'MoreFound'			=> 'Expeditionsfund',
);
					
$LNG['tech'] = array(
	0 => 'Gebäude',
	1 => 'Metallmine',
	2 => 'Kristallmine',
	3 => 'Deuteriumsynthetisierer',
	4 => 'Solarkraftwerk',
	6 => 'TechnoDome',
	12 => 'Atomkraftwerk',
	14 => 'Roboterfabrik',
	15 => 'Nanitenfabrik',
	16 => 'Spaceport',
	21 => 'Raumschiffwerft',
	22 => 'Metallspeicher',
	23 => 'Kristallspeicher',
	24 => 'Deuteriumtank',
	31 => 'Forschungslabor',
	33 => 'Terraformer',
	34 => 'Allianzdepot',
	44 => 'Raketensilo',
	40 => 'Mondgebäude',
	41 => 'Basisstützpunkt',
	42 => 'Sensorenphalax',
	43 => 'Sprungtor',

	100 => 'Forschungen',
	106 => 'Spionagetechnik',
	108 => 'Computertechnik',
	109 => 'Waffentechnik',
	110 => 'Schildtechnik',
	111 => 'Raumschiffpanzerung',
	113 => 'Energietechnik',
	114 => 'Hyperraumtechnik',
	115 => 'Verbrennungstriebwerk',
	117 => 'Impulstriebwerk',
	118 => 'Hyperraumantrieb',
	120 => 'Lasertechnik',
	121 => 'Ionentechnik',
	122 => 'Plasmatechnik',
	123 => 'Intergalaktisches Forschungsnetzwerk',
	131 => 'Produktionsmaximierung Metall',
	132 => 'Produktionsmaximierung Kristall',
	133 => 'Produktionsmaximierung Deuterium',
	199 => 'Gravitonforschung',
	//NOUVEAU
	101 => 'Mikroprozessoren',
	102 => 'Bergbau',
	103 => 'Kolonisation',
	104 => 'Allianz Link',
	105 => 'Motoren',
	116 => 'Ionischer Motor',
	124 => 'Expedition',
	141 => 'Leichte Rüstung',
	142 => 'Mittlere Rüstung',
	143 => 'Schwere Rüstung',
	144 => 'Aktive Rüstung',
	151 => 'Star Trek Suche',
	152 => 'Dark Matter Search',
	153 => 'Flotte suchen',
	154 => 'Astrophysik',
	155 => 'Genaue Aufnahmen',
	156 => 'Aggression der Barbaren',
	157 => 'Aggression von Piraten',
	158 => 'Aggression der Alten',
	165 => 'Einsparung von Motoren',
	171 => 'Lichtschilde',
	172 => 'Mittlere Schilde',
	173 => 'Schwere Schilde',
	174 => 'Wiederherstellung von Schildern',

	200 => 'Schiffe',
	202 => 'Kleiner Transporter',
	203 => 'Großer Transporter',
	208 => 'Kolonieschiff',
	209 => 'Recycler',
	210 => 'Spionagesonde',
	212 => 'Solarsatellit',
	214 => 'Todesstern',
	217 => 'Evolution Transporter',
	219 => 'Gigarecycler',
	220 => 'Intergalaktischer D. Materiensammler',
	228 => 'Schwarzer Wanderer',
	204 => 'FL-1',
	205 => 'FL-4',
	206 => 'FL-3',
	207 => 'FL-5',
	211 => 'FM-45',
	213 => 'FL-9',
	215 => 'FM-40',
	216 => 'FM-50',
	218 => 'FM-75',
	221 => 'H-500',
	222 => 'H-260',
	223 => 'Сейвер',
	224 => 'FX-8',
	225 => 'FM-27',
	226 => 'FH-99',
	227 => 'Фрегат',
	229 => 'FX-7',
	230 => 'FX-32',
	231 => 'FX-19',
	232 => 'FM-60',
	233 => 'FH-140',
	235 => 'FH-109',

	400 => 'Verteidigungsanlagen',
	401 => 'Raketenwerfer',
	402 => 'Leichtes Lasergeschütz',
	403 => 'Schweres Lasergeschütz',
	404 => 'Gaußkanone',
	405 => 'Ionengeschütz',
	406 => 'Plasmawerfer',
	407 => 'Kleine Schildkuppel',
	408 => 'Große Schildkuppel',
	409 => 'Gigantische Schildkuppel',
	410 => 'Gravitonkanone',
	411 => 'Orbitale Verteidigungsplattform',
	412 => 'Lepton Kanone',
	413 => 'Protonen Kanone',
	414 => 'Canyon',
	415 => 'Quantum Kanone',
	416 => 'Hydrogen Kanone',
	417 => 'Dora Kanone',
	418 => 'Photon Kanone',
	419 => 'Partikel Kanone',
	420 => 'DX-100',
	421 => 'DX-200',
	422 => 'DX-300',
	423 => 'Gatling Kanone',
	443 => 'DX-BOB',
	430 => 'Sentinel',
	434 => 'Armageddon Kanone',
	435 => 'Prometey-Komplex',
	
	500 => 'Raketen',
	502 => 'Abfangrakete',
	503 => 'Interplanetarrakete',

	600 => 'Offiziere',
	601 => 'Geologe',
	602 => 'Admiral',
	603 => 'Ingenieur',
	604 => 'Technokrat',
	605 => 'Konstrukteur',
	606 => 'Wissenschaftler',
	607 => 'Lagermeister',
	608 => 'Verteidigungsminister',
	609 => 'Bunker',
	610 => 'Spion',
	611 => 'Commander',
	612 => 'Zerstörer',
	613 => 'General',
	614 => 'Eroberer',
	615 => 'Imperator',

	700 => 'Premium Feature',
	701 => 'Waffenoptimierung',
	702 => 'Schildoptimierung',
	703 => 'Baukoordinierung',
	704 => 'Rohstoffoptimierung',
	705 => 'Energieoptimierung',
	706 => 'Forschungsoptimierung',
	707 => 'Flottenkoordinierung',

	900 => 'Rohstoffe',
	901 => 'Metall',
	902 => 'Kristall',
	903 => 'Deuterium',
	911 => 'Energie',
	921 => 'Dunkle Materie',
);

$LNG['shortDescription'] = array(
	1 => 'Hauptrohstofflieferanten für den Bau tragender Strukturen von Bauwerken und Schiffen.',
	2 => 'Hauptrohstofflieferanten für elektronische Bauteile und Legierungen.',
	3 => 'Entziehen dem Wasser eines Planeten den geringen Deuteriumanteil.',
	4 => 'Solarkraftwerke gewinnen Energie aus Sonneneinstrahlung. Einige Gebäude benötigen Energie für ihren Betrieb.',
	6 => 'Sie verkürzt pro Stufe die Forschungszeit um 8%.',
	12 => 'Das Atomkraftwerk gewinnt Energie aus Brennstäben die aus Deuterium gefertigt werden.',
	14 => 'Roboterfabriken stellen einfache Arbeitskräfte zur Verfügung, die beim Bau der planetaren Infrastruktur eingesetzt werden. Jede Stufe erhöht damit die Geschwindigkeit des Ausbaus von Gebäuden.',
	15 => 'Stellt die Krönung der Robotertechnik dar. Jede Stufe halbiert die Bauzeit von Gebäuden, Schiffen und Verteidigung.',
	16 => 'Sie wollen Ressourcen auf dem Markt verkaufen oder sie in eine Allianz банк System investieren.',
	21 => 'In der planetaren Werft werden alle Arten von Schiffen und Verteidigungsanlagen gebaut.',
	22 => 'Lagerstätte für unbearbeitete Metallerze bevor sie weiter verarbeitet werden.',
	23 => 'Lagerstätte für unbearbeitetes Kristall bevor es weiter verarbeitet wird.',
	24 => 'Riesige Tanks zur Lagerung des neu gewonnenen Deuteriums.',
	31 => 'Um neue Technologien zu erforschen, ist der Betrieb einer Forschungsstation notwendig.',
	33 => 'Der Terraformer vergrößert die nutzbare Fläche auf Planeten.',
	34 => 'Das Allianzdepot bietet die Möglichkeit, befreundete Flotten, die bei der Verteidigung helfen und im Orbit stehen, mit Treibstoff zu versorgen.',
	41 => 'Ein Mond verfügt über keinerlei Atmosphäre, deshalb muss vor der Besiedlung eine Mondbasis errichtet werden.',
	42 => 'Die Sensorphalanx erlaubt es, Flottenbewegungen zu beobachten. Je höher die Ausbaustufe, desto größer ist die Reichweite der Phalanx.',
	43 => 'Sprungtore sind riesige Transmitter, die in der Lage sind, selbst riesige Flotten ohne Zeitverlust durch das Universum zu versenden.',
	44 => 'Raketensilos dienen zum Einlagern von Raketen.',

	106 => 'Mit Hilfe dieser Technik lassen sich Informationen über andere Planeten und Monde gewinnen.',
	108 => 'Mit der Erhöhung der Computerkapazitäten lassen sich immer mehr Flotten befehligen. Jede Stufe Computertechnik erhöht dabei die maximale Flottenanzahl um eins.',
	109 => 'Waffentechnik macht Waffensysteme effizienter. Jede Stufe der Waffentechnik erhöht die Waffenstärke der Einheiten um 10% des Grundwertes.',
	110 => 'Schildtechnik macht die Schilde der Schiffe und Verteidigungsanlagen effizienter. Jede Stufe der Schildtechnik steigert die Effizienz der Schilde um 10% des Grundwertes.',
	111 => 'Spezielle Legierungen machen die Panzerung der Raumschiffe immer besser. Die Wirksamkeit der Panzerung kann so pro Stufe um 10% gesteigert werden.',
	113 => 'Die Beherrschung der unterschiedlichen Arten von Energie ist für viele neue Technologien notwendig.',
	114 => 'Durch die Einbindung der 4. und 5. Dimension ist es nun möglich einen neuartigen Antrieb zu erforschen, welcher sparsamer und leistungsfähiger ist.',
	115 => 'Die Weiterentwicklung dieser Triebwerke macht einige Schiffe schneller, allerdings steigert jede Stufe die Geschwindigkeit nur um 10% des Grundwertes.',
	117 => 'Das Impulstriebwerk basiert auf dem Rückstoßprinzip. Die Weiterentwicklung dieser Triebwerke macht einige Schiffe schneller, allerdings steigert jede Stufe die Geschwindigkeit nur um 20% des Grundwertes.',
	118 => 'Krümmt den Raum um ein Schiff. Die Weiterentwicklung dieser Triebwerke macht einige Schiffe schneller, allerdings steigert jede Stufe die Geschwindigkeit nur um 30% des Grundwertes.',
	120 => 'Durch Bündelung des Lichtes entsteht ein Strahl der beim Auftreffen auf ein Objekt Schaden anrichtet.',
	121 => 'Wahrhaft tödlicher Richtstrahl aus beschleunigten Ionen. Diese richten beim Auftreffen auf ein Objekt einen riesigen Schaden an.',
	122 => 'Eine Weiterentwicklung der Ionentechnik, die nicht Ionen beschleunigt, sondern hochenergetisches Plasma. Dieses hat eine verheerende Wirkung beim Auftreffen auf ein Objekt.',
	123 => 'Forscher verschiedener Planeten kommunizieren über dieses Netzwerk miteinander. Durch das Zusammenschalten der Labore wird die Forschungszeit verkürzt, jede Stufe schaltet die Labore eines Planeten dazu.',
	124 => 'Weitere Erkenntnisse in der Astrophysik ermöglichen den Bau von Laboren, mit denen immer mehr Schiffe ausgestattet werden können. Dadurch werden weite Expeditionsreisen in noch unerforschte Gebiete möglich. Zudem erlauben die Fortschritte die weitere Kolonisation des Weltraumes. Pro zwei Stufen dieser Technologie kann so ein weiterer Planet nutzbar gemacht werden.',
	131 => 'Erhöht die Produktion der Metallmine um 2%',
	132 => 'Erhöht die Produktion der Kristallmine um 2%',
	133 => 'Erhöht die Produktion der Deuteriumsynthetisierer um 2%',
	199 => 'Durch Abschuss einer konzentrierten Ladung von Gravitonpartikeln kann ein künstliches Gravitationsfeld errichtet werden, wodurch Schiffe oder auch Monde vernichtet werden können.',

	202 => 'Der kleine Transporter ist ein wendiges Schiff, welches Rohstoffe schnell zu anderen Planeten transportieren kann und am Anfang ein Bindeglied in der Kolonisierung darstellt.
    <br><br>
    <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Transportiert Ressourcen. 
    <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von leichter Klasse beim Bau unterstützt </font>
    <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Bei Zerstörung werden 30-50% eingebunden.</font>
    <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	203 => 'Die Weiterentwicklung des kleinen Transporters hat ein größeres Ladevermögen und kann sich dank weiterentwickeltem Antrieb noch schneller fortbewegen als der kleine Transporter. Dank besserer Forschung ist dieser Transporter im Preis-Leistungs-Verhältnis auch günstiger. Darüber hinaus ist er sehr effektiv bei Raids.
	<br><br>
    <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Transportiert Ressourcen. 
    <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von leichter Klasse beim Bau unterstützt </font>
    <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Bei Zerstörung werden 30-50% eingebunden.</font>
    <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	204 => 'Der leichte Jäger ist ein wendiges Schiff, das auf fast jedem Planeten vorgefunden wird. Die Kosten sind nicht besonders hoch, Schildstärke und Ladekapazität sind allerdings sehr gering.
	<br><br>
    <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.
    <br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden. 
	</font><br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichter Klasse beim Bau unterstützt.</font>
	<font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Schildstärke und Bewaffnung sind gering.</font>',
	205 => 'Der Schwere Jäger ist die Weiterentwicklung des leichte Jäger. Durch neue Forschungen ist es nun möglich Bessere Materialien und Technik in den schweren Jäger einzubauen. Neben dem Ionentriebwerk hat der Schwere Jäger eine bessere Rüstung, Feuerkraft und höhere Lagerkapazitäten.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.
  <br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden. .</font><br>
  <span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichter Klasse beim Bau unterstützt.</font>',
	206 => 'Schwere Laser und Ionenkanonen sorgtren für dafür, dass der Kreuzer entwickelt werden konnte. Man versuchte zwar auch die Jäger zu verbessern jedoch konnten Modifikationen nur bis zu einem gewissen grad vollzogen werden. Daher wurde die neue Schiffsklasse Kreuzer entwickelt. Kreuzer sind fast dreimal so stark gepanzert wie schwere Jäger und verfügen über mehr als die doppelte Schusskraft. Zudem sind sie sehr schnell.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	207 => 'Schlachtschiffe bilden meist das Rückgrat einer Flotte. Ihre schweren Geschütze, die hohe Geschwindigkeit und der große Frachtraum machen sie zu ernst zu nehmenden Gegnern.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	208 => 'Fremde Planeten können mit diesem Schiff kolonisiert werden. Das Kolonieschiff wird zu Basis zur Kolonisierung umgewandelt. Es stellt Material bereit um die Erschließung zu gewährleisten.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um fremde Planeten zu kolonisieren.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die maximale ANzahl an Planeten beträgt 15.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann beim Kampf nicht teilnehmen.</font>',
	209 => 'Die Weltraumschlachten nahmen immer größere Ausmaße an und die Ressourcen der Trümmerfelder erschienen verloren. Mit der Weiterentwicklung der Schildtenik war es nun möglich eine neue Schiffsklasse zu entwerfen die nur zur Ressourcengewinnung durch Trümmerfelder vorgesehen war.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Abbau von Trümmerfelder genutzt.
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br></font><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font><font color="#00FF00"></font>
  <br> <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen</font>',
	210 => 'Spionagesonden sind kleine wendige Drohnen, welche über weite Entfernungen hinweg Daten über Flotten und Planeten liefern. Ihre Hochleistungstriebwerke ermöglicht ihnen weite Strecken in kurzer Zeit zurück zu legen.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um Feinde auszuspionieren.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann beim Kampf nicht teilnehmen.</font>',
	211 => 'Der Bomber wurde extra entwickelt, um die Verteidigung eines Planeten zu zerstören. Mit Hilfe einer lasergesteuerten Zielvorrichtung wirft er zielgenau Plasmabomben auf die Planetenoberfläche und richtet so einen verheerenden Schaden bei Verteidigungsanlagen an.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	212 => 'Solarsatelliten sind einfache Plattformen aus Solarzellen, die sich in einem hohen stationären Orbit befinden. Sie sammeln das Sonnenlicht und geben es per Laser an die Bodenstation weiter.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Produziert Energie. Je nach Temperatur kann die Energieproduktion variieren.
  <br> <span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt</font><font color="#00FF00">.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font><br>
  <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Wird bei angriffe auf deinen Planeten zerstört.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Generiert keine Energie bei Planeten unter -179 °.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	213 => 'Der Zerstörer ist der König unter den Kriegsschiffen. Seine Multiphalanx Ionen-, Plasma- und Gaußgeschütztürme haben durch ihre verbesserte Peilsensorik besonders leichtes Spiel gegen einfache Technologie wie leichte Laser. Aufgrund seiner Größe ist seine Manövrierfähigkeit stark eingeschränkt, wodurch er im Kampf eher einer Kampfstation gleicht, als einem Schiff. Um ihn in Bewegung zu setzen ist eine große Menge an Deuterium notwendig.
	<br><br> 
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	214 => 'Mit seiner riesigen Gravitonkanone verbreitet der Todesstern Furcht und Schrecken in der gesamten Galaxis. Diese Kanone ist in der Lage, selbst große Schiffe wie Zerstörer oder sogar Monde mühelos zu vernichten. Die ungeheure Menge an Energie, die er dafür benötigt, wird durch Generatoren erzeugt, die für einen Großteil der Masse dieses beinahe mondgroßen Ungetüms sorgen.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt und kann Monde zerstören.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	215 => 'Dieses Schiff ist eines der modernsten Kriegsschiffe, die jemals enwickelt wurden. Sie sind besonders tödlich, wenn es um Abfangen und Zerstören von angreifenden Flotten geht. Durch seine schlanke Bauform und die starke Bewaffnung ist die Ladekapazität begrenzt, dafür ist der Hyperraumantrieb verbrauchsarm.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',	
	216 => 'Durch die Weiterentwicklung neuer Technologien gerieten die derzeiten Schifsklassen langsam aber sicher an ihre Grenzen. Der Nachfolger des beliebten Todessterns ist etwas schneller und stärker
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font><br> 
  <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	217 => 'Der interplanetarische Transport wies nach geraumer Zeit nur noch ein sub-optimales Verhalten auf. Eine Lösung musste gefunden werden. Durch die Weiterentwicklung des großen Transporters wurde eine neue Schiffsklasse geboren. Er hat mehr Ladevermögen und fliegt schneller.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Transport von Ressourcen benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	218 => 'Avatar - die Krone des menschlichen Genies. Die langsame Geschwindigkeit des Schiffes wird von einem schrecklichen Waffenarsenal kompensiert.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	219 => 'Größere Weltraumschlachten führten zu immer größeren Trümmerfeldern. Die normalen Recycler waren nicht in der Lage solche Mengen an Weltraumschrott optimal zu verarbeiten. Daher wurde der Recycler weiterentwickelt und der Gigarecycler wurde geboren. 
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um Trümmerfelder abzubauen.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	220 => 'Wegen der Entdeckung der dunklen Materie in der Schaffung der Monde, gab es dieses Schiff. Die Grundlage für die Sammlung der dunklen Materie ist das Prinzip des Teilchenbeschleunigers aber die erfolgreiche Sammlung von dunkler Materie sorgt dafür, dass das Schiff nicht mehr genutzt werden kann.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> HIlfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um <font color="#913399">Dunkle Materie</font> von Monden zu suchen.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht beim Kampf teilnehmen.</font>',
	221 => 'Designer versuchten ihre Projekte zu verbessern und entwickelten nach einer Weile nicht nur ein neues Schiff sondern eine ganz neue Schiffsklasse. Innovativ, modern und tödlich. Die Entwickler nannten sie die Todesflotte. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    222 => 'Um die Verteidigung der Planeten, Basen und Flotten besser zu bewältigen haben Wissenschaftler den Fliegenden Tod erschaffen. Der Aufbau dieses Schiffs ist erprobte Technologie die bereits in Avatar und ONille verwendet wird.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	223 => 'Ein spezielles Schiff das zur Sicherung der Flotte und Ressourcen dient. Es ist das langsamste Schiff im Universum.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um die Flotte und Ressourcen für eine lange Zeit zu sichern.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Minimale Geschwindigkeit.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Nimmt nicht am Kampf teil.</font>',
	224 => 'Die M-19 ist die beste Wahl der Mittelklasse Schiffen. Große Angriffskraft, ausreichend Strukturpunkte und gute Schilde im Vergleich der anderen Mittelklassen Schiffe sind hier ausschlaggebend. Eine hohe Fluggeschwindigkeit bei akzeptablem Verbrauch ist auch gewährleistet. Perfekt gegen leichte Flotten.
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	225 => 'Galleon – bildet einen Teil der Flottenunterstützung. Es hat gute offensive und defensive Qualitäten mit einem relativ niedrigen Preis. Im Rahmen eines Angriffsverband ist das Schiff unentbehrlich und bereitet den Gegnern viel Ärger.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    226 => 'Ein verbessertes Modell des Bombers. Aufgrund erhöhter Panzerung und zusätzlicher Bewaffnung ist die Beweglichkeit eingeschränkt. Der Destroyer verwandelt schwere feindliche Verteidigungsanlagen zu Staub.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt. Gut geeignet gegen schwere Verteidigungsanlagen. </font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    227 => 'Fregatte - Ein starkes Kriegsschiff. Durch neue Errungenschaften der Wissenschaft, verbesserte Verteidigung und größere Flottenverbände musste eine neue Lösung gefunden werden. Die Wissenschaftler versuchten basierend auf vorhandene Schiffe ein weiteres Schiff zu konzipieren. So wurde die Fregatte geboren. Da die Fregatte recht langsam ist, dafür jedoch mächtige Waffen, Rüstung und Schilde hat kann dieses Schiff zu einem ernsthaften Problem für alle Arten von Flotten und Verteidigungsanlagen werden.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	228 => 'Schwarzer Wanderer - Fortgeschrittene Entwicklung der Raumflotte. Durch Verbesserungen der Werkzeuge, Struktur und vielem mehr kann die Beschädigung der Struktur vermindert werden. Effizienz und Manövermöglichkeiten wurden verbessert. Die Flotte des Lichts hat es schwer.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	229 => 'M7 ist die beste Wahl der leichten Klasse. Sie ist die ein zigste Schiff in ihrer Klasse mit der Fähigkeit Waffen zu verbessern. Die M7 kann die feindliche Flotte ablenken und ist in großer Anzahl ein ernstzunehmender Gegner. 
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von leichte Klasse beim Bau unterstützt </font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	230 => 'M-32 ist die beste Wahl der schweren Klasse. Die Struktur wurde speziell verbessert wie auch die Panzerung und die Wiederherstellungsrate. Gegen durchschnittliche Flotten ist die M-32 optimal.
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	231 => 'M-20 ist die beste Wahl der schweren Klasse. Die Struktur wurde speziell verbessert wie auch die Panzerung und die Wiederherstellungsrate. Gegen durchschnittliche Flotten ist die M-32 optimal.
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	
	401 => 'Der Raketenwerfer ist eine einfache aber kostengünstige Verteidigungsmöglichkeit der die Feinde mit Zielraketen angreift. Forschungen für die Konstruktion werden nicht benötigt. Moderne Verteidigungssystem sind zwar stärker, haben bessere Strukturen jedoch kann man hier sagen „Masse statt Klasse“.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>',
	402 => 'Durch den konzentrierten Beschuss eines Ziels mit Photonen konnte eine wesentlich größere Schadenswirkung erzielt werden als mit gewöhnlichen ballistischen Waffen. Um der größeren Feuerkraft der neuen Schiffstypen widerstehen zu können wurde er außerdem mit verbesserten Schilden ausgestattet.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>',
	403 => 'Der schwere Laser stellt die konsequente Weiterentwicklung des leichten Lasers dar. Hier wurde die Struktur verstärkt und die Energiesysteme wurden optimiert.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>',
	404 => 'Das Konzept der Projektil Waffen wurde lang als altertümlich angesehen. Durch die Energietechnik war es nun möglich tonnenschwere Projektile zu magnetisieren und so zu geschossen zu verwandeln. Die Gaußkanone schießt hochdichte Geschosse unter extremen Mündungsgeschwindigkeiten. Der Rückstoß bringt die Erde zum Beben.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
    <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	405 => 'Es schleudert eine Welle von Ionen (elektrisch geladene Teilchen) auf das Ziel, welche die Schilde destabilisiert und alle Elektronik - sofern diese nicht massiv abgeschirmt ist - beschädigt, was nicht selten einer völligen Zerstörung gleichkommt. Die kinetische Durchschlagskraft kann vernachlässigt werden.
	<br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von mittlere Klasse beim Bau unterstützt.</font>',
	406 => 'Die Laser- sowie Ionentechnik war annähernd ausgereizt. Es musste eine neue Möglichkeit gefunden werden um Waffen und Verteidigungsanlagen zu verbessern. Durch Erforschung der Plasmatechnik war die neue Technologie gefunden. Plasmawerfer setzen die Kraft einer Sonneneruption frei und übertreffen in ihrer zerstörerischen Wirkung sogar den Zerstörer.
	<br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	407 => 'Die kleine Schildkuppel umhüllt den ganzen Planeten mit einem Feld, welches ungeheure Mengen an Energie absorbieren kann um vor feindlichen angriffen wie auch Asteroiden zu schützen.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
	408 => 'Die Weiterentwicklung der Kleinen Schildkuppel verbraucht wesentlich mehr Energie und Ressourcen bietet dafür aber erheblich mehr Schutz. 
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
	409 => 'Die Weiterentwicklung der Großen Schildkuppel ist die Krönung der passiven planetarischen Verteidigung. Sie kann wesentlich mehr Energie einsetzen um Angriffe abzuhalten als alle anderen Schildkuppeln.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
	410 => 'Nach jahrelangen forschen an der Gravitationskraft ist es Forschern gelungen, eine Gravitonenkanone zu entwickeln, die kleine konzentrierte Gravitationsfelder erzeugen kann und sie auf die Gegner schießen lässt.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
   <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	411 => 'Die Orbitale Verteidigungsplattform ist eine unbewegliche defensive Plattform und wird in einer stabilen Umlaufbahn des Planeten durch die Gravitationsforschung gehalten, da sie keinen direkten Antrieb hat. Die Waffen der Verteidigungsplattform sind extrem machtvoll und können selbst große gegnerische Kampfverbände vernichten.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
    412 => 'Die Lepton Kanone ist eine Waffe um den Willen der Menschen zu beeinflussen. Durch Ergänzungen des Projekts kurz vor der Fertigstellung ist es nun auch möglich, dass geladene Lepton Teilchen beim Kontakt mit dem Ziels die Schilde und Rüstungen der Schiffe beschädigen. So wurde diese Waffe zu einem furchtbare Mittel zum Schutz des Planeten. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    413 => 'Die Protonen Kanone feuert umgewandelte Projektile ab. Die Kanone benötigt lange Beschleuniger, daher ist die Platzierung großer stationärer Anlagen beschränkt. Diese Partikelstrahlen sind gefährlich für alle Lebewesen und nicht strahlungsbeständiger Elektronik. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	414 => 'Das Projekt Canyon wurde ins Leben gerufen um die Gravitationskanone zu verbessern. Dies war ein voller Erfolg. Das Gerät benötigt zwar viel Energie und Materialkosten und hochrangige Forschung kann dafür aber enormen Schaden verursachen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	415 => 'Die Quantum Kanone wurde speziell zur Zerstörung der feindlichen Flaggschiffe entwickelt. Das Prinzip dieser Waffe beruht darauf die thermodynamische Phase zu verlagern. Dies bedeutet, dass das Magnetfeld des paramagnetischen Zustands zum ferromagnetischen Zustand verändert wird.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.',
	416 => 'Nach einer Forschungszeit war es den Wissenschaftlern gelungen zu beweisen, dass Deuterium als Waffe dienen kann. Kurz darauf wurde eine Waffe konstruiert die beim Kontakt mit der Haut oder den Schilden eines Schiffes einen Impuls zurück gibt und somit die Integrität schädigt. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	417 => 'Dora Cannon ist der stärkste Schutz der mittleren Verteidigungsanlagen. Angreifer können durch einen elektromagnetischen Puls zerstört werden. Leider überhitzt die Kanone recht schnell und es bedarf viel Energie.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	418 => 'Die Photon Kanone ist der Vorläufer der Protonen Kanone. Mit dessen relativ niedrigem Preis jedoch leistungsfähigem Feuer wurde es eine unentbehrliche Verteidigungsanlage. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    419 => 'Die Partikel Kanone ist das Ergebnis einer langen und mühevollen Zusammenarbeit zwischen Wissenschaftlern und Ingenieuren. Diese Kanone ist eine der wenigen die alle Arten von Schiffen abwehren kann. Seine Macht liegt in der Kombination aus Plasma-, Gravitation- und Ionenwaffen in einem Strahl aus Partikeln zu bündeln. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	420 => 'Leichte Mecador – angetriebene primäre Verteidigung der leichten Klasse mit zwei Arten von Waffen. Es bewältigt mit Leichtigkeit leichte Flotten einschließlich der M-7 und erhält von Interplanetar Raketen weniger Schaden als andere leichte Verteidigungsanlagen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Erhält 10% weniger Schaden von Interplanetar Raketen.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>
  <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit erworbenem Premium Paket.</font>',
	421 => 'Mittlere Mecador – angetriebene primäre Verteidigung der mittleren Klasse mit drei Arten von Waffen. Es bewältigt mit Leichtigkeit mittlere Flotten einschließlich der M-19 und erhält von Interplanetar Raketen weniger Schaden als andere mittlere Verteidigungsanlagen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Erhält 15% weniger Schaden von Interplanetar Raketen
 <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit erworbenem Premium Paket</font>',
	422 => 'Schwere Mecador – angetriebene primäre Verteidigung der schweren Klasse mit drei Arten von Waffen. Es sehr effizient gegen schwere Flotten einschließlich der M-32 und erhält von Interplanetar Raketen weniger Schaden als andere schwere Verteidigungsanlagen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Erhält 20% weniger Schaden von Interplanetar Raketen
 <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von schwere Klasse beim Bau unterstützt.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit erworbenem Premium Paket</font>',

	502 => 'Abfangraketen zerstören angreifende Interplanetarraketen.',
	503 => 'Interplanetarraketen zerstören die gegnerische Verteidigung.',

	601 => 'Der Geologe ist ein Experte bekannt in der Gesteinsphysiologie und der Kristallographie. Mit seinem Expertenteam bestehend aus Metall-Ingenieuren und Chemikern, assistiert er den interplanetaren Regierungen in der Recherche nach neuen Quellen und diese sicher gewinnen zu können.',
	602 => 'Der Flottenadmiral ist ein Kriegsveteran und ein gefürchteter Stratege. Sogar wenn die Schlacht aussichtslos scheint, bewahrt er einen kühlen Kopf, um Herr der Lage zu bleiben und den Kontakt zu seinen unterstellten Flottenkommandeuren aufrecht zu erhalten. Ein Imperator sollte sich den Flottenadmiral leisten um seine Angriffe zu koordinieren und um mehr Flotten in den Kampf ziehen zu lassen.',
	603 => 'Der Ingenieur ist ein Spezialist der energietechnischen Betriebsführung. Er optimiert die Effektivität der Energiereserven der Kolonie und steigert somit die tatsächliche Energieproduktion.',
	604 => 'Die Gilde der Technokraten sind die Wissenschaftler der bekannten Genies. Man findet sie dort wo die Technik ihre Grenzen erreicht. Niemand versteht die Dechiffrierung der Kryptographie eines Technokraten, seine alleinige Präsenz inspiriert die Kontrukteure des ganzen Imperiums.',
	605 => 'Der Konstrukteur ist ein Meister in der Planung von Gebäuden.',
	606 => 'Die Gilde der Wissenschaftler ist ein Zusammenschluss der erfolgreichsten Wissenschaftler des Imperiums. Sie sind die Spezialisten in der Verbesserung der Technologie.',
	607 => 'Der Lagerist beherrscht wertvolle Lagerungs- und Sortierkenntnisse. Durch hochentwickelte Lagertechniken und strukturelle Anpassungen, kann er das nutzbare Volumen eines Lagerraumes deutlich erhöhen.',
	608 => 'Der Verteidigungsminister ist Mitglied der imperialen Armee. Sein Elan und Ehrgeiz ermöglichen es jede Kolonie in Rekordzeit zu einen stark befestigtem Stützpunkt auszubauen.',
	609 => 'Der Bunker sah die beeindruckende Arbeit, die Sie in seinem Königreich gefertigt haben. Um Ihnen zu danken, eröffnet er Ihnen die Chance Bunker zu werden. Der Bunker ist die höchste Auszeichnung der Lagerstättenbranche der Imperialen Armee.',
	610 => 'Der Spion ist eine rätselhafte Person. Niemand kennt jemals sein wirkliches Gesicht, und noch weniger ob er schon tot ist.',
	611 => 'Der Commander der imperialen Armee ist Meister im Umgang mit der Flotte. Seine jahrelangen Erfahrungen mit Flotten, mit vielen strategischen Einsätzen, sind eine Bereicherung für jeden Herrscher.',
	612 => 'Der Zerstörer ist ein Offizier ohne Mitleid. Er hat Planeten nur zum Vergnügen dem Erdboden gleich gemacht. Er entdeckt momentan eine neue Methode um Massenvernichtungswaffen herzustellen.',
	613 => 'Der General ist eine ehrwürdige Person, der seit vielen Jahren in der Armee dient. Durch unzählige Manöver hat der General Strategien entwickelt, um die Flottengeschwindigkeiten in sämtlichen Konstellationen, verschiedenster Shiffstypen, zu optimieren.',
	614 => 'Der Imperator bemerkte bei Ihnen die unleugbaren Qualitäten des Eroberns. Er schlägt Ihnen vor Eroberer zu werden. Der Eroberer ist der Grad der höchsten Ausbildung der Eroberer der imperialen Armee.',
	615 => 'Sie haben gezeigt, dass Sie der größte Eroberer des Universums sind. Es ist Ihrer, solange Sie diesen Platz halten, den Sie bekommen haben.',

	701 => 'Der Bonus ist nur temporär.',
	702 => 'Der Bonus ist nur temporär.',
	703 => 'Der Bonus ist nur temporär.',
	704 => 'Der Bonus ist nur temporär.',
	705 => 'Der Bonus ist nur temporär.',
	706 => 'Der Bonus ist nur temporär.',
	707 => 'Der Bonus ist nur temporär.',
);

$LNG['longDescription'] = array(
	1 => 'Metall ist eine fundamentale Ressource und die Grundlage deines Reiches. Durch den Ausbau der Minen ist es möglich, dass befindliche Erz, in großen tiefen abzubauen und somit die Produktion zu steigern gleichzeitig muss mehr Energie zur Verfügung gestellt werden um die Produktion zu sichern. Metall kann im Bau von Gebäuden, Schiffen, Verteidigung und Forschung eingesetzt werden. Da das Metall die häufigste aller Ressourcen im Universum ist, werden seine Kosten als die geringsten aller Ressourcen für Handel und Austausch angesehen.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Metallmine: Produktion steigt mit Ausbau der Minen.</font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Die Produktion benötigt Energie.</font>',
	2 => 'Kristalle sind die wichtigsten Ressourcen für die Entwicklung von Technologien und Elektronik. Die Verbindung von Kristall und Metall Legierungen werden für Schilde und Rüstungen benötigt. Verglichen mit der Gewinnung von Metall benötigen die Rohkristallstrukturen mehr Energie um den Abbau zu handhaben. Der Bau von Schiffen und Anlagen sowie spezielle Forschungen benötigen Kristall. 
    <br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Kristallmine: Produktion steigt mit Ausbau der Minen.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Die Produktion benötigt Energie.</font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Ertrag der Kristallmine ist etwa 2/3 geringer im Vergleich zur Metallmine.</font>',
	3 => 'Deuterium ist schwerer Wasserstoff, der aus dem Meer gewonnen werden kann. Der Deuteriumsynthetisierer hat eine ähnliche Arbeitsweise wie die Minen. Durch Nano-Zentrifugen wird das Isotop des Wasserstoffs aus dem Wasser gefiltert. Deuterium wird als Treibstoff für die Schiffe und fast alle Forschungen benötigt. Darüber hinaus gibt es auch spezielle Gebäude die Deuterium benötigen. Zudem wird er eingesetzt um Scans mit der Sensorphalanx durchzuführen.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Deuteriumsynthetisierer: Produktion steigt mit Ausbau des Synthesizers.</font>
	<br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Produktion steigt mit niedrigen Temperaturen des Planeten.</font><font color="#BC8F8F"></font> 
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Die Produktion benötigt Energie</font><font color="#BC8F8F">.</font>',
	4 => 'Solarkraftwerker sind die Grundlage der Planetaren Energieversorgung. Sie versorgen die Minen und den Deuteriumsynthetisierer mit Energie um die Produktion zu gewährleisten. Mit steigendem Ausbau der Solarkraftwerke benötigt man mehr Fläche für die Photovoltaik Zellen. Der Ausbau steigert die Energieproduktion. 
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Solarkraftwerk: Energie Produktion steigt mit Ausbau der Solazellen.</font>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Energieproduktion unabhängig von Planetarischer Temperatur.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Energieproduktion auf dauer unzureichend. Daher werden meistens Fusionskraftwerke und Solar Satelliten gebaut</font><font color="#BC8F8F">.</font>',
	6 => 'Das Technopolis zielt auf die Stärkung der regionalen  Entwicklung. Speziell auf deren Innovationsprozesse in Sachen technischer Fortschritt. Jede Aufwertung beschleunigt, durch das Technopolis, Forschungszeit um 16%. Dies ist vor allem in höheren Forschungsstufen  sehr wichtig.   Sie verkürzt pro Stufe die Forschungszeit um 16%.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Beschleunigt die Forschungszeit um 16% pro Ausbaustufe</font>',
	7 => 'Das Xterium Dock bietet die Möglichkeit, Schiffe zu reparieren, die während einer Schlacht zerstört wurden. Die Reparatur ist günstiger als eine neue Konstruktion in der Raumschiffwerft. Die maximale Reparaturzeit von 48 Stunden wird nicht überschritten.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Binnen 2 Tage muss mit den Reparaturen begonnen werden.</font><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die reparierten Schiffe müssen in den aktiven Bestand genommen werden, sobald die Reparaturen abgeschlossen sind.</font><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wenn sie nicht in den aktiven Bestand genommen werden gehen diese automatisch nach 2 Tagen in den aktiven Bestand.</font>',
	12 => 'In Fusionskraftwerken werden unter enormem Druck und mit großer Temperatur 2 Wasserstoffatome zu einem Heliumatom fusioniert. Dabei werden ungeheure Mengen an Energie erzeugt. Durch weiteren Ausbau des Fusionskraftwerkes wird mehr Deuterium verbraucht. Dafür steigt die Energieproduktion. Die Energiegewinnung kann zudem durch Forschungen im Bereich der Energietechnik gesteigert werden
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Das Fusionskraftwerk erzeugt Energie. Mit steigendem Level wird mehr Energier erzeugt.</font>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Durch Erforschung der Energietechnik kann mehr Energie erzeugt werden.</font>	
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Deuterium wird zur Kernfusion benötigt.</font>',	
	14 => 'In der Roboterfabrik werden moderne Roboter hergestellt. Jede Ausbaustufe erhöht die Anzahl der Roboter und deren Technik. Diese Arbeitskräfte helfen bei dem Bau von Gebäuden sowie Schiffen und reduzieren so deren Bauzeit.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Geschwindigkeit beim Bau von Konstruktionen und Schiffen wird um 10% je Level gesenkt.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Forschungszeit verändert sich nicht</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Ab einem gewissen Punkt kann die Geschwindigkeit nicht weiter verkürzt werden.</font>',
	15 => 'Die Nanitenfrabrik stellt die Vollendung dar. Hier werden Nanometer große ROboter hergestellt. Diese sund untereinander vernetzt und bilden dadurch eine Art Kollektives Gedächtnis dar. Je mehr Naninten zusammentreffen deto größer ist deren gesamte Rechenleistung. Die Nanitenfabrik halbiert die Bauzeit von Gebäuden, Schiffen und Verteidigungsanlagen je Ausbaustufe.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Reduziert die Bauzeit von Gebäuden, Schiffen und Verteidigungsanlagen je Stufe um 50%.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Die Forschungszeit wird nicht beeinflusst</font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Ab einem gewissen Punkt kann die Geschwindigkeit nicht weiter verkürzt werden.</font>',
	16 => 'Sie wollen Ressourcen auf dem Markt verkaufen oder sie in eine Allianz банк System investieren.',
	21 => 'In der Raumschiffwert werden Raumschiffe und Abwehrsysteme gebaut. Mit weiterem Ausbau der Raumschiffwerft ist es möglich größere, bessere und schnellere Schiffe zu bauen aber natürlich auch bessere Verteisigungsanlagen. Darüber hinaus wird die Bauzeit von Verteidigungsanlagen und Schiffen je Ausbaustufe gesenkt. In Verbindung mit der Nanitenfabrik kann so sehr schnell eine gute Planetarische Verteidigung oder Interplanetare Angriffsflotte aufgebaut werden.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Mit weiteren Ausbau können bessere Schiffe und Verteidigungsanlagen gebaut werden. 
	<br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit jedem Level wird die Bauzeit von Schiffen und Verteidigungsdanlagen um 10% gesenkt.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Ab einem gewissen Punkt kann die Geschwindigkeit nicht weiter verkürzt werden.</font>',
	22 => 'Dieser Speichert dient der Lagerung von Metall. Jede Ausbaustufe erhöht die Lagerkapazität. Sobald der Metallspeicher voll ist wird die Produktion der Metallmine eingestellt um eine Katastrophe zu verhindern.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benötigt um Metall zu lagern. Jede Ausbaustufe verdoppelt die Lagerkapazität.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Sollte der Speicher gefüllt sein wird die Produktion eingestellt.</font>',
	23 => 'Der Kristallspeicher dient der Lagerung von unbehandelten Kristallen. Jede Ausbaustufe erhöht die Lagerkapazität. Sobald der Kristallspeicher voll ist wird die Produktion der Kristallmine eingestellt um eine Katastrophe zu verhindern.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benötigt um Kristall zu lagern. Jede Ausbaustufe verdoppelt die Lagerkapazität.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Sollte der Speicher gefüllt sein wird die Produktion eingestellt.</font>.',
	24 => 'Der Deuteriumtank wurde speziell für neu synthetisiertes Deuterium entworfen. Nach der Verarbeitung im Synthesizer fließt das gewonnene Deuterium durch Rohre zur späteren Verwendung in das Reservoir. Mit weiterem Ausbau kann mehr Deuterium gelagert werden.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Wird benötigt um Deuterium zu lagern. Jede Ausbaustufe verdoppelt die Lagerkapazität.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Sollte der Speicher gefüllt sein wird die Produktion eingestellt.</font>.',
	31 => 'Ein wichtiger Bestandteil eines jeden Imperiums ist das Forschungslabor. Hier werden alte Forschungen verbessert und neue wissenschaftlichen Entdeckungen gemacht. Mit jeder Ausbaustufe verringert sich die Forschungszeit. Um Studien so schnell wie möglich durchzuführen ist es möglich, durch das Intergalaktische Forschungsnetzwerk, mit Forschungslaboren anderer Planeten sich zu vernetzten.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Bietet die Möglichkeit neue Studien zu erforschen. Jede Ausbaustufe senkt die Forschungszeit um 10%</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Biete die Möglichkeit alte Studien zu verbessern.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Kann während der Forschung nicht ausgebaut werden.</font>',
	33 => 'Mit zunehmendem Ausbau der Strukturen wurde die Frage des Lebensraums der Kolonie immer wichtiger. Hoch- und TIefbau erwiesen sich als unzureichend. Dadruch bildete sich eine Gruppe aus Physikern und Technikern um nach einer Lösung zu suchen. Das Resultat war das Terraforming.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Je Ausbaustufe werden 7 Felder urbaches Land dem Planeten hinzugefügt.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Ein Feld wird vom Terraformer besetzt.</font>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Je Ausbaustufe wird eine große Menge Ressourcen und Energie benötigt.</font>',
	34 => 'Das Allianzdepot bietet die Möglichkeit, befreundete Flotten, die bei der Verteidigung helfen und im Orbit stehen, mit Treibstoff zu versorgen. Die Ausbaustufe ist ausschlaggebend für die Maximale Anzahl an befreundete Flotte sowie an Haltezeit.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Jede Ausbaustufe erhöht die maximale Anzahl der Flotte und deren Haltezeit.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Die befreundete Flotte wird mit Deuterium versorgt.</font>',
	41 => 'Ein Mond verfügt über keinerlei Atmosphäre, deshalb muss vor der Besiedlung eine Mondbasis errichtet werden. Die Mondbasis produziert Sauerstoff, Wärme und Schwerkraft. Dadruch ist es möglich Kolonisten auf dem Mond anzusiedeln. Mit jeder Ausbaustufe wird der Lebensraum auf dem Mond größer.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Mit jeder Ausbaustufe wird dem Mond 3 Felder Lebensraum hinzugefügt.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Ein Feld wird von der Mondbasis besetzt.</font>',
	42 => 'Die Sensorphalanx scannt mit hochauflösenden Sensoren das komplette Frequenzspektrum von veränderten Gaswerten bis hin zu geladenen Teilchen in der Atmosphäre eines entfernten Planeten. Anschließend werden die gesammelten Daten in einem Supercomputer analysiert und ausgewertet. Die Auswertung kann Aufschluss über die Flotte des analysierten Planeten geben. Um die Phalanx vor Überhitzung zu schützen wird Deuterium benötigt.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	He sees the movement of enemy fleets. <br> Erhöht den zu scannen Bereich wie folgt: (level der Phalanx) ^ 2 - 1.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Benötigt Deuterium.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Zurückgerufene Flotten können nicht erfasst werden.</font>',
	43 => 'Die Sprungtore sind riesige Transmitter, die selbst große Flotten ohne Zeitverlust durch das Universum schicken können. Diese Transmitter verbrauchen kein Deuterium. Allerdings wird bei einem Sprung sehr große Hitze erzeugt. Die Abkühlzeit beläuft sich auf eine Stunde. Die Zeit wird mit zunehmender Ausbaustufe verkürzt.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Ermöglicht es deine Flotte umgehend zu einen anderen deiner Monde zu schicken. Mit jeder Ausbaustufe verringert sich die Abkühlzeit um 6 Minuten </font>(Min. Abkühlzeit ist 6 Minuten)<br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Um einen Teleport durchzuführen benötigt man mindestens zwei Monde mit jeweils einem Spungtor</font>',
	44 => 'Raketensilos werden für den Bau, Lagerung und Taktische Planung von Raketen benötigt. Jede Ausbaustufe erlaubt es doppelt so viele Abfangraketen wie Interplanetarraketen zu bauen. Mit weiteren Ausbau steigt die maximale Anzahl der Raketen. Beide Typen dürfen im gleichen Silo lagern.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Erlaubt es Interplanetarraketen und Abfangraketen zu bauen. Mit weiteren Ausbau steigt die maximale Anzahl der Raketen.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Es können doppelt so viele Abfangraketen wie Interplanetarrakete bei gleicher Ausbaustufe eingelagert werden</font>',
    69 => 'Nach Jahren der Studie von Antimaterie haben Wissenschaftler endlich einen Weg erfunden die dunkle Materie zu schaffen. Es liegt in der Beschleunigung von Antimaterie im Collider. Aber die Collider stören die Atmosphäre des Planeten, so wurde beschlossen, es auf dem Mond zu bauen, wo die Atmosphäre nicht existieren. 
    <br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Es erzeugt <font color="#913399">Dunkle Materie</font> auf Grundlage der Minen.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Wenn der Mond zerstört wird wird auch der Collider zerstört.</font>',
    71 => 'Die leichte Klasse unterstützt bei der Produktion von leichten Flotten und Verteidigungsanlagen. Unter Berücksichtigung der Technologie und Ausbau der Klasse erhöht sich die maximale Anzahl von Schiffen bzw. Verteidigungsanlagen die pro Sekunde gebaut werden können. Produziert werden: Schiffe: Solarsatellit, Kleiner Transporter, Große Transporter, Leichter Jäger und Schwerer Jäger. Verteidigungsanlagen: Raketenwerfer, Leichtes Lasergeschütz, Schweres Lasergeschütz und leichte Mecador.
    <br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Entfernt das Limit von maximaler 1 Einheit pro Sekunde. </font><br>
    <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Um die Produktion zu erhöhen muss die Leichte Klasse auf dem Planeten gebaut werden.</font>',
    72 => 'Die mittlere Klasse unterstützt bei der Produktion von mittleren Flotten und Verteidigungsanlagen. Unter Berücksichtigung der Technologie und Ausbau der Klasse erhöht sich die maximale Anzahl von Schiffen bzw. Verteidigungsanlagen die pro Sekunde gebaut werden können. Produziert werden: Schiffe: Recycler, Kreuzer, Schlachtschiffe, Evolution Transporter, Schlachtkreuzer, Zerstörer, Bomber und Gigarecycler. Verteidigungsanlagen: Ionengeschütz, Gaußkanone, Plasmawerfer, Hydrogen Kanone, Mittlere Mecador und Dora Kanonen.
    <br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Entfernt das Limit von maximaler 1 Einheit pro Sekunde.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Um die Produktion zu erhöhen muss die Mittlere Klasse auf dem Planeten gebaut werden.</font>',
	73 => 'Die schwere Klasse unterstützt bei der Produktion von schweren Flotten und Verteidigungsanlagen. Unter Berücksichtigung der Technologie und Ausbau der Klasse erhöht sich die maximale Anzahl von Schiffen bzw. Verteidigungsanlagen die pro Sekunde gebaut werden können. Produziert werden: Schiffe: Galeone, Destroyer, Fregatte, Battleship Klasse ONeill, Schwarzer Wanderer, Fliegender Tod, Avatar, Todesstern und Lune Noire. Verteidigungsanlagen: Photonen Kanone, Lepton Gun, Gravitonkanone, Protonen Kanone, Parttikel Kanone, Canyon, Schwere Macador und Quantum Kanone.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Entfernt das Limit von maximaler 1 Einheit pro Sekunde </font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Um die Produktion zu erhöhen muss die Schwere Klasse auf dem Planeten gebaut werden.</font>',
	
	106 => 'Die Spionagetechnik befasst sich in erster Linie mit der Erforschung neuer und effizienterer Sensoren. Je höher diese Technik entwickelt ist, um so mehr Informationen stehen dem Nutzer über Vorgänge in seiner Umgebung zur Verfügung. Für Sonden ist die Differenz des eigenen und des gegnerischen Spionagelevels entscheidend. Je weiter die eigene Spionagetechnik erforscht ist, desto mehr Informationen enthält der Bericht und um so kleiner ist die Chance , dass man beim Spionieren entdeckt wird. Je mehr Sonden man schickt, desto mehr Details erfährt man von seinem Gegner, gleichzeitig steigt aber auch die Gefahr einer Entdeckung. Die Spionagetechnik verbessert ebenfalls die Ortung fremder Flotten. Dabei ist nur der eigene Spionagelevel entscheidend. Ab Level 2 wird zusätzlich zur reinen Angriffsmeldung auch die Gesamtanzahl der angreifenden Schiffe angezeigt. Ab Level 4 sieht man die Art der angreifenden Schiffe, sowie die Gesamtanzahl und ab Level 8 die genaue Anzahl der verschiedenen Schiffs-Typen. Für Raider ist diese Technik unverzichtbar, da sie Auskunft darüber gibt, ob das Opfer Flotte und/oder Verteidigung stationiert hat oder nicht. Deshalb sollte diese Technik schon sehr früh erforscht werden. Am besten sofort nach der Erforschung von kleinen Transportern.',
	108 => 'Die Computertechnik befasst sich mit der Erweiterung der vorhandenen Computerkapazitäten. Immer leistungsfähigere und effizientere Computersysteme werden entwickelt. Die Rechenleistung steigt immer weiter und die Geschwindigkeit, mit denen Rechenprozesse ablaufen, wird ebenfalls erhöht. Mit der Erhöhung der Computerkapazitäten lassen sich immer mehr Flotten gleichzeitig befehligen. Jede Stufe Computertechnik erhöht dabei die maximale Flottenanzahl um eins. Je mehr Flotten man gleichzeitig verschicken kann, desto mehr kann man raiden und desto mehr Rohstoffe kann man einnehmen. Natürlich nutzt diese Technik auch Händlern, denn sie können dann ebenfalls mehr Handelsflotten gleichzeitig losschicken. Aus diesem Grund sollte die Computertechnik kontinuierlich über das gesamte Spiel hinweg ausgebaut werden.',
	109 => 'Die Waffentechnik beschäftigt sich vor allem mit der Weiterentwicklung bestehender Waffensysteme. Dabei wird insbesondere darauf Wert gelegt, die vorhandenen Systeme mit mehr Energie auszustatten und diese Energie punktgenau zu kanalisieren. Dadurch werden die Waffensysteme effizienter und Waffen richten mehr Schaden an. Jede Stufe der Waffentechnik erhöht die Waffenstärke der Einheiten um 10% des Grundwertes. Die Waffentechnik ist wichtig, um später die eigenen Einheiten konkurrenzfähig zu halten. Deshalb sollte sie kontinuierlich das ganze Spiel hindurch entwickelt werden.',
	110 => 'Die Schildtechnik beschäftigt sich mit der Erforschung immer neuer Möglichkeiten, die Schilde mit mehr Energie zu versorgen und sie so effizienter und belastbarer zu machen. Dadurch steigt mit jeder erforschten Stufe die Effizienz der Schilde um 10% des Grundwertes.',
	111 => 'Spezielle Legierungen machen die Panzerung der Raumschiffe immer besser. Ist einmal eine sehr widerstandsfähige Legierung gefunden, wird durch spezielle Strahlungen die molekulare Struktur des Raumschiffes verändert und auf den Stand der besten erforschten Legierung gebracht. Die Wirksamkeit der Panzerung kann so pro Stufe um 10% des Grundwertes gesteigert werden.',
	113 => 'Die Energietechnik beschäftigt sich mit der Weiterentwicklung der Energieleitsysteme und Energiespeicher, welche für viele neue Technologien benötigt wird.',
	114 => 'Durch die Einbindung der 4. und 5. Dimension ist es nun möglich einen neuartigen Antrieb zu erforschen, welcher sparsamer und leistungsfähiger ist.',
	115 => 'Verbrennungstriebwerke basieren auf dem uralten Prinzip des Rückstoßes. Hocherhitzte Materie wird weggeschleudert und treibt das Schiff in die entgegengesetzte Richtung. Der Wirkungsgrad dieser Triebwerke ist eher gering, aber sie sind billig und zuverlässig und benötigen kaum Wartung. Außerdem verbrauchen sie weniger Raum und sind deshalb gerade auf kleineren Schiffen immer wieder zu finden. Da Verbrennungstriebwerke die Grundlage jeder Raumfahrt sind, sollten sie so früh wie möglich erforscht werden. Die Weiterentwicklung dieser Triebwerke macht folgende Schiffe um 10% des Grundwertes pro Stufe schneller: Kleine und große Transporter, Leichte Jäger, Recycler und Spionagesonden.',
	117 => 'Das Impulstriebwerk basiert auf dem Rückstoßprinzip, wobei die Strahlmasse zum Großteil als Abfallprodukt der zur Energiegewinnung verwendeten Kernfusion entsteht. Zusätzlich kann weitere Masse eingespritzt werden. Die Weiterentwicklung dieser Triebwerke macht folgende Schiffe um 20% des Grundwertes pro Stufe schneller: Bomber, Kreuzer, Schwere Jäger und Kolonieschiffe. Interplanetarraketen können pro Stufe weiter fliegen.',
	118 => 'Durch eine Raumzeitverkrümmung wird in unmittelbarer Umgebung eines Schiffes der Raum komprimiert, womit sich weite Strecken sehr schnell zurücklegen lassen. Je höher der Hyperraumantrieb entwickelt ist, desto höher wird die Kompression des Raumes, wodurch sich pro Stufe die Geschwindigkeit der Schiffe die damit ausgestattet sind (Schlachtkreuzer, Schlachtschiffe, Zerstörer und Todessterne) um 30% erhöht. Voraussetzungen: Hyperraumtechnik (Stufe 3) Forschungslabor (Stufe 7).',
	120 => 'Laser (Lichtverstärkung durch induzierte Strahlungsemission) erzeugen einen intensiven, energiereichen Strahl von kohärentem Licht. Diese Geräte finden in allen möglichen Bereichen ihre Bewerbung, von optischen Computern bis hin zu schweren Laserwaffen, die mühelos durch Raumschiffpanzerungen schneiden. Die Lasertechnik bildet einen wichtigen Grundstein für die Erforschung weiterer Waffentechnologien. Voraussetzungen: Forschungslabor (Stufe 1) Energietechnik (Stufe 2).',
	121 => 'Wahrhaft tödlicher Richtstrahl aus beschleunigten Ionen. Die beschleunigten Ionen richten beim Auftreffen auf ein Objekt einen riesigen Schaden an.',
	122 => 'Eine Weiterentwicklung der Ionentechnik, die nicht Ionen beschleunigt, sondern hochenergetisches Plasma. Das hochenergetische Plasma hat eine verheerende Wirkung beim Auftreffen auf ein Objekt.',
	123 => 'Forscher verschiedener Planeten kommunizieren über dieses Netzwerk miteinander. Pro erforschtes Level, wird ein Forschungslabor vernetzt. Dabei werden immer die Labors der höchsten Stufe dazugeschaltet. Das vernetzte Labor muss ausreichend ausgebaut sein um die anstehende Forschung selbständig durchführen zu können. Die Ausbaustufen aller beteiligten Labors werden im intergalaktischen Forschungsnetzwerk zusammen gezählt.',
	124 => 'Weitere Erkenntnisse in der Astrophysik ermöglichen den Bau von Laboren, mit denen immer mehr Schiffe ausgestattet werden können. Dadurch werden weite Expeditionsreisen in noch unerforschte Gebiete möglich. Zudem erlauben die Fortschritte die weitere Kolonisation des Weltraumes. Pro zwei Stufen dieser Technologie kann so ein weiterer Planet nutzbar gemacht werden.',
	131 => 'Erhöht die Produktion der Metallmine um 2%',
	132 => 'Erhöht die Produktion der Kristallmine um 2%',
	133 => 'Erhöht die Produktion der Deuteriumsynthetisierer um 2%',
	199 => 'Ein Graviton ist ein Partikel, das keine Masse und keine Ladung besitzt, welche die Gravitationskraft bestimmt. Durch Abschuss einer konzentrierten Ladung von Gravitonen kann ein künstliches Gravitationsfeld errichtet werden, welches ähnlich einem schwarzen Loch, Masse in sich hineinzieht, wodurch Schiffe oder auch Monde vernichtet werden können. Um eine ausreichende Menge Gravitonen herzustellen benötigt es riesige Mengen an Energie. Voraussetzungen: Forschungslabor (Stufe 12).',
	//NOUVEAU
	101 => 'Mikroprozessoren',
	102 => 'Bergbau',
	103 => 'Kolonisation',
	104 => 'Allianz Link',
	105 => 'Motoren',
	116 => 'Ionischer Motor',
	124 => 'Expedition',
	141 => 'Leichte Rüstung',
	142 => 'Mittlere Rüstung',
	143 => 'Schwere Rüstung',
	144 => 'Aktive Rüstung',
	151 => 'Star Trek Suche',
	152 => 'Dark Matter Search',
	153 => 'Flotte suchen',
	154 => 'Astrophysik',
	155 => 'Genaue Aufnahmen',
	156 => 'Aggression der Barbaren',
	157 => 'Aggression von Piraten',
	158 => 'Aggression der Alten',
	165 => 'Einsparung von Motoren',
	171 => 'Lichtschilde',
	172 => 'Mittlere Schilde',
	173 => 'Schwere Schilde',
	174 => 'Wiederherstellung von Schildern',
	
	202 => 'Der kleine Transporter ist ein wendiges Schiff, welches Rohstoffe schnell zu anderen Planeten transportieren kann und am Anfang ein Bindeglied in der Kolonisierung darstellt.
    <br><br>
    <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Transportiert Ressourcen. 
    <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von leichter Klasse beim Bau unterstützt </font>
    <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Bei Zerstörung werden 30-50% eingebunden.</font>
    <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	203 => 'Die Weiterentwicklung des kleinen Transporters hat ein größeres Ladevermögen und kann sich dank weiterentwickeltem Antrieb noch schneller fortbewegen als der kleine Transporter. Dank besserer Forschung ist dieser Transporter im Preis-Leistungs-Verhältnis auch günstiger. Darüber hinaus ist er sehr effektiv bei Raids.
	<br><br>
    <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Transportiert Ressourcen. 
    <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von leichter Klasse beim Bau unterstützt </font>
    <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Bei Zerstörung werden 30-50% eingebunden.</font>
    <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	204 => 'Der leichte Jäger ist ein wendiges Schiff, das auf fast jedem Planeten vorgefunden wird. Die Kosten sind nicht besonders hoch, Schildstärke und Ladekapazität sind allerdings sehr gering.
	<br><br>
    <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.
    <br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden. 
	</font><br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichter Klasse beim Bau unterstützt.</font>
	<font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Schildstärke und Bewaffnung sind gering.</font>',
	205 => 'Der Schwere Jäger ist die Weiterentwicklung des leichte Jäger. Durch neue Forschungen ist es nun möglich Bessere Materialien und Technik in den schweren Jäger einzubauen. Neben dem Ionentriebwerk hat der Schwere Jäger eine bessere Rüstung, Feuerkraft und höhere Lagerkapazitäten.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.
  <br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden. .</font><br>
  <span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichter Klasse beim Bau unterstützt.</font>',
	206 => 'Schwere Laser und Ionenkanonen sorgtren für dafür, dass der Kreuzer entwickelt werden konnte. Man versuchte zwar auch die Jäger zu verbessern jedoch konnten Modifikationen nur bis zu einem gewissen grad vollzogen werden. Daher wurde die neue Schiffsklasse Kreuzer entwickelt. Kreuzer sind fast dreimal so stark gepanzert wie schwere Jäger und verfügen über mehr als die doppelte Schusskraft. Zudem sind sie sehr schnell.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	207 => 'Schlachtschiffe bilden meist das Rückgrat einer Flotte. Ihre schweren Geschütze, die hohe Geschwindigkeit und der große Frachtraum machen sie zu ernst zu nehmenden Gegnern.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	208 => 'Fremde Planeten können mit diesem Schiff kolonisiert werden. Das Kolonieschiff wird zu Basis zur Kolonisierung umgewandelt. Es stellt Material bereit um die Erschließung zu gewährleisten.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um fremde Planeten zu kolonisieren.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die maximale ANzahl an Planeten beträgt 15.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann beim Kampf nicht teilnehmen.</font>',
	209 => 'Die Weltraumschlachten nahmen immer größere Ausmaße an und die Ressourcen der Trümmerfelder erschienen verloren. Mit der Weiterentwicklung der Schildtenik war es nun möglich eine neue Schiffsklasse zu entwerfen die nur zur Ressourcengewinnung durch Trümmerfelder vorgesehen war.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Abbau von Trümmerfelder genutzt.
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br></font><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font><font color="#00FF00"></font>
  <br> <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen</font>',
	210 => 'Spionagesonden sind kleine wendige Drohnen, welche über weite Entfernungen hinweg Daten über Flotten und Planeten liefern. Ihre Hochleistungstriebwerke ermöglicht ihnen weite Strecken in kurzer Zeit zurück zu legen.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um Feinde auszuspionieren.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann beim Kampf nicht teilnehmen.</font>',
	211 => 'Der Bomber wurde extra entwickelt, um die Verteidigung eines Planeten zu zerstören. Mit Hilfe einer lasergesteuerten Zielvorrichtung wirft er zielgenau Plasmabomben auf die Planetenoberfläche und richtet so einen verheerenden Schaden bei Verteidigungsanlagen an.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	212 => 'Solarsatelliten sind einfache Plattformen aus Solarzellen, die sich in einem hohen stationären Orbit befinden. Sie sammeln das Sonnenlicht und geben es per Laser an die Bodenstation weiter.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Produziert Energie. Je nach Temperatur kann die Energieproduktion variieren.
  <br> <span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt</font><font color="#00FF00">.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font><br>
  <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Wird bei angriffe auf deinen Planeten zerstört.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Generiert keine Energie bei Planeten unter -179 °.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	213 => 'Der Zerstörer ist der König unter den Kriegsschiffen. Seine Multiphalanx Ionen-, Plasma- und Gaußgeschütztürme haben durch ihre verbesserte Peilsensorik besonders leichtes Spiel gegen einfache Technologie wie leichte Laser. Aufgrund seiner Größe ist seine Manövrierfähigkeit stark eingeschränkt, wodurch er im Kampf eher einer Kampfstation gleicht, als einem Schiff. Um ihn in Bewegung zu setzen ist eine große Menge an Deuterium notwendig.
	<br><br> 
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	214 => 'Mit seiner riesigen Gravitonkanone verbreitet der Todesstern Furcht und Schrecken in der gesamten Galaxis. Diese Kanone ist in der Lage, selbst große Schiffe wie Zerstörer oder sogar Monde mühelos zu vernichten. Die ungeheure Menge an Energie, die er dafür benötigt, wird durch Generatoren erzeugt, die für einen Großteil der Masse dieses beinahe mondgroßen Ungetüms sorgen.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt und kann Monde zerstören.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	215 => 'Dieses Schiff ist eines der modernsten Kriegsschiffe, die jemals enwickelt wurden. Sie sind besonders tödlich, wenn es um Abfangen und Zerstören von angreifenden Flotten geht. Durch seine schlanke Bauform und die starke Bewaffnung ist die Ladekapazität begrenzt, dafür ist der Hyperraumantrieb verbrauchsarm.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',	
	216 => 'Durch die Weiterentwicklung neuer Technologien gerieten die derzeiten Schifsklassen langsam aber sicher an ihre Grenzen. Der Nachfolger des beliebten Todessterns ist etwas schneller und stärker
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font><br> 
  <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	217 => 'Der interplanetarische Transport wies nach geraumer Zeit nur noch ein sub-optimales Verhalten auf. Eine Lösung musste gefunden werden. Durch die Weiterentwicklung des großen Transporters wurde eine neue Schiffsklasse geboren. Er hat mehr Ladevermögen und fliegt schneller.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Transport von Ressourcen benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>',
	218 => 'Avatar - die Krone des menschlichen Genies. Die langsame Geschwindigkeit des Schiffes wird von einem schrecklichen Waffenarsenal kompensiert.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	219 => 'Größere Weltraumschlachten führten zu immer größeren Trümmerfeldern. Die normalen Recycler waren nicht in der Lage solche Mengen an Weltraumschrott optimal zu verarbeiten. Daher wurde der Recycler weiterentwickelt und der Gigarecycler wurde geboren. 
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um Trümmerfelder abzubauen.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht angreifen.</font>',
	220 => 'Wegen der Entdeckung der dunklen Materie in der Schaffung der Monde, gab es dieses Schiff. Die Grundlage für die Sammlung der dunklen Materie ist das Prinzip des Teilchenbeschleunigers aber die erfolgreiche Sammlung von dunkler Materie sorgt dafür, dass das Schiff nicht mehr genutzt werden kann.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> HIlfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um <font color="#913399">Dunkle Materie</font> von Monden zu suchen.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Kann nicht beim Kampf teilnehmen.</font>',
	221 => 'Designer versuchten ihre Projekte zu verbessern und entwickelten nach einer Weile nicht nur ein neues Schiff sondern eine ganz neue Schiffsklasse. Innovativ, modern und tödlich. Die Entwickler nannten sie die Todesflotte. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    222 => 'Um die Verteidigung der Planeten, Basen und Flotten besser zu bewältigen haben Wissenschaftler den Fliegenden Tod erschaffen. Der Aufbau dieses Schiffs ist erprobte Technologie die bereits in Avatar und ONille verwendet wird.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	223 => 'Ein spezielles Schiff das zur Sicherung der Flotte und Ressourcen dient. Es ist das langsamste Schiff im Universum.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird benutzt um die Flotte und Ressourcen für eine lange Zeit zu sichern.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Minimale Geschwindigkeit.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Nimmt nicht am Kampf teil.</font>',
	224 => 'Die M-19 ist die beste Wahl der Mittelklasse Schiffen. Große Angriffskraft, ausreichend Strukturpunkte und gute Schilde im Vergleich der anderen Mittelklassen Schiffe sind hier ausschlaggebend. Eine hohe Fluggeschwindigkeit bei akzeptablem Verbrauch ist auch gewährleistet. Perfekt gegen leichte Flotten.
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlerer Klasse beim Bau unterstützt.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	225 => 'Galleon – bildet einen Teil der Flottenunterstützung. Es hat gute offensive und defensive Qualitäten mit einem relativ niedrigen Preis. Im Rahmen eines Angriffsverband ist das Schiff unentbehrlich und bereitet den Gegnern viel Ärger.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    226 => 'Ein verbessertes Modell des Bombers. Aufgrund erhöhter Panzerung und zusätzlicher Bewaffnung ist die Beweglichkeit eingeschränkt. Der Destroyer verwandelt schwere feindliche Verteidigungsanlagen zu Staub.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt. Gut geeignet gegen schwere Verteidigungsanlagen. </font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    227 => 'Fregatte - Ein starkes Kriegsschiff. Durch neue Errungenschaften der Wissenschaft, verbesserte Verteidigung und größere Flottenverbände musste eine neue Lösung gefunden werden. Die Wissenschaftler versuchten basierend auf vorhandene Schiffe ein weiteres Schiff zu konzipieren. So wurde die Fregatte geboren. Da die Fregatte recht langsam ist, dafür jedoch mächtige Waffen, Rüstung und Schilde hat kann dieses Schiff zu einem ernsthaften Problem für alle Arten von Flotten und Verteidigungsanlagen werden.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	228 => 'Schwarzer Wanderer - Fortgeschrittene Entwicklung der Raumflotte. Durch Verbesserungen der Werkzeuge, Struktur und vielem mehr kann die Beschädigung der Struktur vermindert werden. Effizienz und Manövermöglichkeiten wurden verbessert. Die Flotte des Lichts hat es schwer.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden</font>
  <br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	229 => 'M7 ist die beste Wahl der leichten Klasse. Sie ist die ein zigste Schiff in ihrer Klasse mit der Fähigkeit Waffen zu verbessern. Die M7 kann die feindliche Flotte ablenken und ist in großer Anzahl ein ernstzunehmender Gegner. 
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von leichte Klasse beim Bau unterstützt </font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	230 => 'M-32 ist die beste Wahl der schweren Klasse. Die Struktur wurde speziell verbessert wie auch die Panzerung und die Wiederherstellungsrate. Gegen durchschnittliche Flotten ist die M-32 optimal.
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	231 => 'M-20 ist die beste Wahl der schweren Klasse. Die Struktur wurde speziell verbessert wie auch die Panzerung und die Wiederherstellungsrate. Gegen durchschnittliche Flotten ist die M-32 optimal.
<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird zum Angiff von Feinden benutzt.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Mit der Zerstörung werden 30-50% der Ressourcen ins Trümmerfeld mit eingebunden.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit Premium Account</font>',
	
	401 => 'Der Raketenwerfer ist eine einfache aber kostengünstige Verteidigungsmöglichkeit der die Feinde mit Zielraketen angreift. Forschungen für die Konstruktion werden nicht benötigt. Moderne Verteidigungssystem sind zwar stärker, haben bessere Strukturen jedoch kann man hier sagen „Masse statt Klasse“.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>',
	402 => 'Durch den konzentrierten Beschuss eines Ziels mit Photonen konnte eine wesentlich größere Schadenswirkung erzielt werden als mit gewöhnlichen ballistischen Waffen. Um der größeren Feuerkraft der neuen Schiffstypen widerstehen zu können wurde er außerdem mit verbesserten Schilden ausgestattet.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>',
	403 => 'Der schwere Laser stellt die konsequente Weiterentwicklung des leichten Lasers dar. Hier wurde die Struktur verstärkt und die Energiesysteme wurden optimiert.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>',
	404 => 'Das Konzept der Projektil Waffen wurde lang als altertümlich angesehen. Durch die Energietechnik war es nun möglich tonnenschwere Projektile zu magnetisieren und so zu geschossen zu verwandeln. Die Gaußkanone schießt hochdichte Geschosse unter extremen Mündungsgeschwindigkeiten. Der Rückstoß bringt die Erde zum Beben.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
    <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	405 => 'Es schleudert eine Welle von Ionen (elektrisch geladene Teilchen) auf das Ziel, welche die Schilde destabilisiert und alle Elektronik - sofern diese nicht massiv abgeschirmt ist - beschädigt, was nicht selten einer völligen Zerstörung gleichkommt. Die kinetische Durchschlagskraft kann vernachlässigt werden.
	<br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von mittlere Klasse beim Bau unterstützt.</font>',
	406 => 'Die Laser- sowie Ionentechnik war annähernd ausgereizt. Es musste eine neue Möglichkeit gefunden werden um Waffen und Verteidigungsanlagen zu verbessern. Durch Erforschung der Plasmatechnik war die neue Technologie gefunden. Plasmawerfer setzen die Kraft einer Sonneneruption frei und übertreffen in ihrer zerstörerischen Wirkung sogar den Zerstörer.
	<br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	407 => 'Die kleine Schildkuppel umhüllt den ganzen Planeten mit einem Feld, welches ungeheure Mengen an Energie absorbieren kann um vor feindlichen angriffen wie auch Asteroiden zu schützen.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
	408 => 'Die Weiterentwicklung der Kleinen Schildkuppel verbraucht wesentlich mehr Energie und Ressourcen bietet dafür aber erheblich mehr Schutz. 
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
	409 => 'Die Weiterentwicklung der Großen Schildkuppel ist die Krönung der passiven planetarischen Verteidigung. Sie kann wesentlich mehr Energie einsetzen um Angriffe abzuhalten als alle anderen Schildkuppeln.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
	410 => 'Nach jahrelangen forschen an der Gravitationskraft ist es Forschern gelungen, eine Gravitonenkanone zu entwickeln, die kleine konzentrierte Gravitationsfelder erzeugen kann und sie auf die Gegner schießen lässt.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
   <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	411 => 'Die Orbitale Verteidigungsplattform ist eine unbewegliche defensive Plattform und wird in einer stabilen Umlaufbahn des Planeten durch die Gravitationsforschung gehalten, da sie keinen direkten Antrieb hat. Die Waffen der Verteidigungsplattform sind extrem machtvoll und können selbst große gegnerische Kampfverbände vernichten.
	<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>',
    412 => 'Die Lepton Kanone ist eine Waffe um den Willen der Menschen zu beeinflussen. Durch Ergänzungen des Projekts kurz vor der Fertigstellung ist es nun auch möglich, dass geladene Lepton Teilchen beim Kontakt mit dem Ziels die Schilde und Rüstungen der Schiffe beschädigen. So wurde diese Waffe zu einem furchtbare Mittel zum Schutz des Planeten. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    413 => 'Die Protonen Kanone feuert umgewandelte Projektile ab. Die Kanone benötigt lange Beschleuniger, daher ist die Platzierung großer stationärer Anlagen beschränkt. Diese Partikelstrahlen sind gefährlich für alle Lebewesen und nicht strahlungsbeständiger Elektronik. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	414 => 'Das Projekt Canyon wurde ins Leben gerufen um die Gravitationskanone zu verbessern. Dies war ein voller Erfolg. Das Gerät benötigt zwar viel Energie und Materialkosten und hochrangige Forschung kann dafür aber enormen Schaden verursachen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	415 => 'Die Quantum Kanone wurde speziell zur Zerstörung der feindlichen Flaggschiffe entwickelt. Das Prinzip dieser Waffe beruht darauf die thermodynamische Phase zu verlagern. Dies bedeutet, dass das Magnetfeld des paramagnetischen Zustands zum ferromagnetischen Zustand verändert wird.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.',
	416 => 'Nach einer Forschungszeit war es den Wissenschaftlern gelungen zu beweisen, dass Deuterium als Waffe dienen kann. Kurz darauf wurde eine Waffe konstruiert die beim Kontakt mit der Haut oder den Schilden eines Schiffes einen Impuls zurück gibt und somit die Integrität schädigt. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	417 => 'Dora Cannon ist der stärkste Schutz der mittleren Verteidigungsanlagen. Angreifer können durch einen elektromagnetischen Puls zerstört werden. Leider überhitzt die Kanone recht schnell und es bedarf viel Energie.
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>',
	418 => 'Die Photon Kanone ist der Vorläufer der Protonen Kanone. Mit dessen relativ niedrigem Preis jedoch leistungsfähigem Feuer wurde es eine unentbehrliche Verteidigungsanlage. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
    419 => 'Die Partikel Kanone ist das Ergebnis einer langen und mühevollen Zusammenarbeit zwischen Wissenschaftlern und Ingenieuren. Diese Kanone ist eine der wenigen die alle Arten von Schiffen abwehren kann. Seine Macht liegt in der Kombination aus Plasma-, Gravitation- und Ionenwaffen in einem Strahl aus Partikeln zu bündeln. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von schwere Klasse beim Bau unterstützt.</font>',
	420 => 'Leichte Mecador – angetriebene primäre Verteidigung der leichten Klasse mit zwei Arten von Waffen. Es bewältigt mit Leichtigkeit leichte Flotten einschließlich der M-7 und erhält von Interplanetar Raketen weniger Schaden als andere leichte Verteidigungsanlagen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Erhält 10% weniger Schaden von Interplanetar Raketen.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von leichte Klasse beim Bau unterstützt.</font>
  <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit erworbenem Premium Paket.</font>',
	421 => 'Mittlere Mecador – angetriebene primäre Verteidigung der mittleren Klasse mit drei Arten von Waffen. Es bewältigt mit Leichtigkeit mittlere Flotten einschließlich der M-19 und erhält von Interplanetar Raketen weniger Schaden als andere mittlere Verteidigungsanlagen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Erhält 15% weniger Schaden von Interplanetar Raketen
 <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Wird von mittlere Klasse beim Bau unterstützt.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit erworbenem Premium Paket</font>',
	422 => 'Schwere Mecador – angetriebene primäre Verteidigung der schweren Klasse mit drei Arten von Waffen. Es sehr effizient gegen schwere Flotten einschließlich der M-32 und erhält von Interplanetar Raketen weniger Schaden als andere schwere Verteidigungsanlagen. 
<br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Hilfreiche Informationen:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Die Wiederherstellungsrate liegt zwischen 50-70% nach einer Schlacht. Die Wiederherstellungsrate kann durch "Mechanics" in der Akadem erhöht werden. </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Erhält 20% weniger Schaden von Interplanetar Raketen
 <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Wird von schwere Klasse beim Bau unterstützt.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Verfügbar auf Planeten der Galaxie mit erworbenem Premium Paket</font>',
 
	502 => 'Abfangraketen zerstören angreifende Interplanetarraketen. Jede Bodenluftrakete zerstört eine Interplanetarrakete.',
	503 => 'Intercontinentalraketen zerstören die gegnerische Verteidigung, können allerdings durch Abfangraketen zerstört werden! Von Interplanetarraketen zerstörte Verteidigungsanlagen bauen sich nicht wieder auf.',

	601 => 'Der Geologe ist ein Experte bekannt in der Gesteinsphysiologie und der Kristallographie. Mit seinem Expertenteam bestehend aus Metall-Ingenieuren und Chemikern, assistiert er den interplanetaren Regierungen in der Recherche nach neuen Quellen und diese sicher gewinnen zu können.',
	602 => 'Der Flottenadmiral ist ein Kriegsveteran und ein gefürchteter Stratege. Sogar wenn die Schlacht aussichtslos scheint, bewahrt er einen kühlen Kopf, um Herr der Lage zu bleiben und den Kontakt zu seinen unterstellten Flottenkommandeuren aufrecht zu erhalten. Ein Imperator sollte sich den Flottenadmiral leisten um seine Angriffe zu koordinieren und um mehr Flotten in den Kampf ziehen zu lassen.',
	603 => 'Der Ingenieur ist ein Spezialist der energietechnischen Betriebsführung. Er optimiert die Effektivität der Energiereserven der Kolonie und steigert somit die tatsächliche Energieproduktion.',
	604 => 'Die Gilde der Technokraten sind die Wissenschaftler der bekannten Genies. Man findet sie dort wo die Technik ihre Grenzen erreicht. Niemand versteht die Dechiffrierung der Kryptographie eines Technokraten, seine alleinige Präsenz inspiriert die Kontrukteure des ganzen Imperiums.',
	605 => 'Der Konstrukteur ist ein Meister in der Planung von Gebäuden.',
	606 => 'Die Gilde der Wissenschaftler ist ein Zusammenschluss der erfolgreichsten Wissenschaftler des Imperiums. Sie sind die Spezialisten in der Verbesserung der Technologie.',
	607 => 'Der Lagerist beherrscht wertvolle Lagerungs- und Sortierkenntnisse. Durch hochentwickelte Lagertechniken und strukturelle Anpassungen, kann er das nutzbare Volumen eines Lagerraumes deutlich erhöhen.',
	608 => 'Der Verteidigungsminister ist Mitglied der imperialen Armee. Sein Elan und Ehrgeiz ermöglichen es jede Kolonie in Rekordzeit zu einen stark befestigtem Stützpunkt auszubauen.',
	609 => 'Der Bunker sah die beeindruckende Arbeit, die Sie in seinem Königreich gefertigt haben. Um Ihnen zu danken, eröffnet er Ihnen die Chance Bunker zu werden. Der Bunker ist die höchste Auszeichnung der Lagerstättenbranche der Imperialen Armee.',
	610 => 'Der Spion ist eine rätselhafte Person. Niemand kennt jemals sein wirkliches Gesicht, und noch weniger ob er schon tot ist.',
	611 => 'Der Commander der imperialen Armee ist Meister im Umgang mit der Flotte. Seine jahrelangen Erfahrungen mit Flotten, mit vielen strategischen Einsätzen, sind eine Bereicherung für jeden Herrscher.',
	612 => 'Der Zerstörer ist ein Offizier ohne Mitleid. Er hat Planeten nur zum Vergnügen dem Erdboden gleich gemacht. Er entdeckt momentan eine neue Methode um Massenvernichtungswaffen herzustellen.',
	613 => 'Der General ist eine ehrwürdige Person, der seit vielen Jahren in der Armee dient. Durch unzählige Manöver hat der General Strategien entwickelt, um die Flottengeschwindigkeiten in sämtlichen Konstellationen, verschiedenster Shiffstypen, zu optimieren.',
	614 => 'Der Imperator bemerkte bei Ihnen die unleugbaren Qualitäten des Eroberns. Er schlägt Ihnen vor Eroberer zu werden. Der Eroberer ist der Grad der höchsten Ausbildung der Eroberer der imperialen Armee.',
	615 => 'Sie haben gezeigt, dass Sie der größte Eroberer des Universums sind. Es ist Ihrer, solange Sie diesen Platz halten, den Sie bekommen haben.',

	701 => 'Der Bonus ist nur temporär.',
	702 => 'Der Bonus ist nur temporär.',
	703 => 'Der Bonus ist nur temporär.',
	704 => 'Der Bonus ist nur temporär.',
	705 => 'Der Bonus ist nur temporär.',
	706 => 'Der Bonus ist nur temporär.',
	707 => 'Der Bonus ist nur temporär.',	
);