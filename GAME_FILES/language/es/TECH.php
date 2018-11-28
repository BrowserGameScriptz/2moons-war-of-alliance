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
	106 => '+%s al nivel de espionaje',
	109 => '+%s%s para armamento',
	110 => '+%s%s a los escudos',
	111 => '+%s%s para armadura',
	113 => '+%s%s a la producción de energía',
	115 => '+%s%s de la velocidad del motor Jet',
	117 => '+%s%s de la velocidad del Motor de Pulso',
	118 => '+%s%s de velocidad del motor varp',
	120 => '+%s%s de daño al arma láser',
	121 => '+%s%s al ​​daño de Ion Weapon',
	122 => '+%s%s de daño al arma de plasma',
	199 => '+%s%s de daño a las pistolas gravitatorias',
	//NOUVEAU
	101 => '+%s a las ranuras de las flotas', 
	102 => '+%s%s a la producción minera',
	103 => '+%s al número máximo de planetas',
	104 => '+%s ciencia para el estudio de Alliance Development',
	105 => '+%s%s a la velocidad de vuelo',
	112 => '+%s deducciones de la ciencia a la alianza',
	116 => '+%s%s a la velocidad del motor iónico',
	124 => '+%s puntos máximos de flota en el Expedition +%s%s a la probabilidad de pérdida de la flota',
	141 => '+%s%s a la armadura ligera',
	142 => '+%s%s a Armadura media',
	143 => '+%s%s a Armadura Pesada',
	144 => '+%s%s de aumento en pérdidas',
	151 => '+%s%s a la oportunidad de búsqueda de Star Trek',
	152 => '+%s%s a la posibilidad de buscar Dark Matter',
	153 => '+%s%s a la probabilidad de búsqueda de flota',
	154 => '+%s número de expediciones',
	155 => '+%s%s de reducción en pérdidas',
	156 => '+%s%s de probabilidad de encontrar una actualización <br> El tamaño mínimo de la flota es de %s puntos',
	157 => '+%s%s de probabilidad de encontrar una actualización <br> El tamaño mínimo de la flota es de %s puntos',
	158 => '+%s%s de probabilidad de encontrar una actualización <br> El tamaño mínimo de la flota es de %s puntos',
	165 => '+%s%s para ahorrar motores',
	171 => '+%s%s para blindajes de luz <br>%s%s para recuperación de escudos de luz',
	172 => '+%s%s a escudos medios <br>+%s%s a recuperación de escudos medios',
	173 => '+%s%s a Escudos Pesados ​​<br>+%s%s a Restauración de Escudos Pesados',
	174 => '+%s%s para restaurar escudos',
);
$LNG['shortNames'] = array (
	202 => "Nave peque&ntilde;a de carga",
	203 => "Nave grande de carga",
	208 => "Colonizador",
	209 => "Reciclador",
	210 => "Sonda de espionaje",
	212 => "Sat&eacute;lite solar",
	214 => "Estrella de la muerte",
	217 => 'Transporte Espacial',
	219 => 'Mega-Reciclador',
	220 => 'Colector intergalactico de materia oscura',
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

	401 => "Lanzamisiles",
	402 => "L&aacute;ser",
	403 => "L&aacute;ser Pesado",
	404 => "Ca&ntilde;&oacute;n Gauss",
	405 => "Ca&ntilde;&oacute;n i&oacute;nico",
	406 => "Ca&ntilde;&oacute;n de plasma",
	407 => "C.P de protecci&oacute;n",
	408 => "C.G de protecci&oacute;n",
	409 => 'Proteccion Planetaria',
	410 => 'Ca&ntilde;&oacute;n Grav',
	411 => 'P.D.O.',
	412 => 'Lepton Gun',
	413 => 'Proton Gun',
	414 => 'Canyon',
	415 => 'Quantum Cannon',
	416 => 'Hydrogen Cannon',
	417 => 'Dora Cannon',
	418 => 'Photon cannon',
	419 => 'Particle Emitter',
	420 => 'DX-100',
	421 => 'DX-200',
	422 => 'DX-300',
	423 => 'Gatling Cannon',
	443 => 'DX-BOB',
	430 => 'Centinela',
	434 => 'Cañón de Armagedón',
	435 => 'Prometey Complex'
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
  0 => 'Edificios',
  1 => "Mina de metal",
  2 => "Mina de cristal",
  3 => "Sintetizador de deuterio",
  4 => "Planta de energ&iacute;a solar",
  6 => 'Universidad',
 12 => "Planta de fusi&oacute;n",
 14 => "F&aacute;brica de Robots",
 15 => "F&aacute;brica de Nanobots",
 16 => "Puerto espacial",
 21 => "Hangar",
 22 => "Almac&eacute;n de Metal",
 23 => "Almac&eacute;n de Cristal",
 24 => "Contenedor de deuterio",
 31 => "Laboratorio de investigaci&oacute;n",
 33 => "Terraformer",
 34 => "Dep&oacute;sito de la Alianza",
 44 => "Silo",
 40 => "Construcciones Lunares",
 41 => "Base lunar",
 42 => "Sensor Phalanx",
 43 => "Salto cu&aacute;ntico",

	100 => "Investigaci&oacute;n",
	106 => "Tecnolog&iacute;a de espionaje",
	108 => "Tecnolog&iacute;a de computaci&oacute;n",
	109 => "Tecnolog&iacute;a militar",
	110 => "Tecnolog&iacute;a de defensa",
	111 => "Tecnolog&iacute;a de blindaje",
	113 => "Tecnolog&iacute;a de energ&iacute;a",
	114 => "Tecnolog&iacute;a de hiperespacio",
	115 => "Motor de combusti&oacute;n",
	117 => "Motor de impulso",
	118 => "Propulsor hiperespacial",
	120 => "Tecnolog&iacute;a l&aacute;ser",
	121 => "Tecnolog&iacute;a i&oacute;nica",
	122 => "Tecnolog&iacute;a de plasma",
	123 => "Red de investigaci&oacute;n intergal&aacute;ctica",
	124 => 'Tecnolog&iacute;a de expedici&oacute;n',
	131 => 'M&aacute;xima producci&oacute;n de metal',
	132 => 'M&aacute;xima producci&oacute;n de cristal',
	133 => 'M&aacute;xima producci&oacute;n de deuterio',
	199 => 'Tecnolog&iacute;a de gravit&oacute;n',
	//NOUVEAU
	101 => 'Microprocesadores',
	102 => 'Minería',
	103 => 'Colonización',
	104 => 'Enlace de alianza',
	105 => 'Motores',
	116 => 'Motor iónico',
	124 => 'Expedición',
	141 => 'Armadura ligera',
	142 => 'Armadura mediana',
	143 => 'Armadura pesada',
	144 => 'Armadura Activa',
	151 => 'Búsqueda de Star Trek',
	152 => 'Búsqueda de materia oscura',
	153 => 'Búsqueda de la flota',
	154 => 'Astrofísica',
	155 => 'Fotos exactas',
	156 => 'Agresión de los bárbaros',
	157 => 'Agresión de los piratas',
	158 => 'Agresión de los Antiguos',
	165 => 'Ahorro de motores',
	171 => 'Escudos de luz',
	172 => 'Escudos medios',
	173 => 'Escudos pesados',
	174 => 'Restauración de escudos',

	200 => "Naves",
	202 => "Nave peque&ntilde;a de carga",
	203 => "Nave grande de carga",
	208 => "Colonizador",
	209 => "Reciclador",
	210 => "Sonda de espionaje",
	212 => "Sat&eacute;lite solar",
	214 => "Estrella de la muerte",
	217 => 'Transporte Espacial',
	219 => 'Mega-Reciclador',
	220 => 'Colector intergalactico de materia oscura',
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
	
	400 => "Sistemas de defensa",
	401 => "Lanzamisiles",
	402 => "L&aacute;ser peque&ntilde;o",
	403 => "L&aacute;ser grande",
	404 => "Ca&ntilde;&oacute;n Gauss",
	405 => "Ca&ntilde;&oacute;n i&oacute;nico",
	406 => "Ca&ntilde;&oacute;n de plasma",
	407 => "C&uacute;pula peque&ntilde;a de protecci&oacute;n",
	408 => "C&uacute;pula grande de protecci&oacute;n",
	409 => 'Proteccion Planetaria',
	410 => 'Ca&ntilde;&oacute;n de Graviton',
	411 => 'Plataforma de Defensa Orbital',
	412 => 'Lepton Gun',
	413 => 'Proton Gun',
	414 => 'Canyon',
	415 => 'Quantum Cannon',
	416 => 'Hydrogen Cannon',
	417 => 'Dora Cannon',
	418 => 'Photon cannon',
	419 => 'Particle Emitter',
	420 => 'DX-100',
	421 => 'DX-200',
	422 => 'DX-300',
	423 => 'Gatling Cannon',
	443 => 'DX-BOB',
	430 => 'Centinela',
	434 => 'Cañón de Armagedón',
	435 => 'Prometey Complex',

500 => 'Misiles',
502 => 'Misil de intercepci&oacute;n',
503 => 'Misil interplanetario',

600 => "Oficial",
601 => "Ge&oacute;logo",
602 => "Almirante",
603 => "Ingeniero",
604 => "Tecn&oacute;crata",
605 => "Constructor",
606 => "Cient&iacute;fico",
607 => "Almacenista",
608 => "Defensor",
609 => "Protector",
610 => "Esp&iacute;a",
611 => "Comandante",
612 => "Destructor",
613 => "General",
614 => "Conquistador",
615 => "Emperador",

700 => 'Funciones Premium',
701 => 'Optimizaci&oacute;n de armas',
702 => 'Optimizaci&oacute;n de escudos',
703 => 'Coordinaci&oacute;n de construcci&oacute;n',
704 => 'Optimizaci&oacute;n de recursos',
705 => 'Optimizaci&oacute;n de energ&iacute;a',
706 => 'Optimizaci&oacute;n de investigaciones',
707 => 'Coordinaci&oacute;n de flota',

	900 => 'Recursos',
	901 => 'Metal',
	902 => 'Cristal',
	903 => 'Deutério',
	911 => 'Energía',
	921 => 'Materia Oscura',
);

$LNG['shortDescription'] = array(
1 => "Las minas de metal proveen los recursos b&aacute;sicos de un imperio emergente, y permiten la construcci&oacute;n de edificios y naves.",
2 => "Los cristales son el recurso principal usado para construir circuitos electr&oacute;nicos y ciertas aleaciones.",
3 => "El deuterio se usa como combustible para naves, y se recolecta en el mar profundo. Es una sustancia muy escasa, y por ello, relativamente cara.",
4 => "Las plantas de energ&iacute;a solar convierten energ&iacute;a fot&oacute;nica en energ&iacute;a el&eacute;ctrica, para su uso en casi todos los edificios y estructuras.",
6 => 'Reduce el tiempo de investigaci&oacute;n de cada nivel en un 8%.',
12 => "Un reactor de fusi&oacute;n nuclear que produce un &aacute;tomo de helio a partir de dos &aacute;tomos de deuterio usando una presi&oacute;n extremadamente alta y una elevad&iacute;sima temperatura.",
14 => "Las f&aacute;bricas de robots proporcionan unidades baratas y de f&aacute;cil construcci&oacute;n que pueden ser usadas para mejorar o construir cualquier estructura planetaria. Cada nivel de mejora de la f&aacute;brica aumenta la eficiencia y el numero de unidades rob&oacute;ticas que ayudan en la construcci&oacute;n.",
15 => 'El tama&ntilde;o microsc&oacute;pico de las nanom&aacute;quinas se traduce en mayor velocidad de funcionamiento. Esta f&aacute;brica produce nanom&aacute;quinas que son la &uacute;ltima evoluci&oacute;n de la tecnolog&iacute;a rob&oacute;tica. Una vez construido, cada actualizaci&oacute;n disminuye significativamente el tiempo de producci&oacute;n para los edificios, barcos y estructuras defensivas.',
16 => "Usted quiere vender los recursos en el mercado o invertirlos en una alianza банк sistema.",
21 => "El hangar es el lugar donde se construyen naves y estructuras de defensa planetaria.",
22 => "Almac&eacute;n de metal sin procesar.",
23 => "Almac&eacute;n de cristal sin procesar.",
24 => "Contenedores enormes para almacenar deuterio.",
31 => "Se necesita un laboratorio de investigaci&oacute;n para conducir la investigaci&oacute;n en nuevas tecnolog&iacute;as.",
33 => 'El Terraformer aumenta la superficie &uacute;til en el planeta.',
34 => "El dep&oacute;sito de la alianza ofrece la posibilidad de repostar a las flotas aliadas que est&eacute;n estacionadas en la &oacute;rbita ayudando a defender.",
41 => 'La luna no tiene atm&oacute;sfera por tanto, una base lunar debe ser construido antes de la liquidaci&oacute;n de otros edificios.',
42 => 'La matriz del sensor le permite controlar los movimientos de la flota. Cuanto mayor sea la etapa, el mayor es el rango de la falange.',
43 => 'Saltar puertas son transmisores enormes que son capaces de enviar grandes flotas sin p&eacute;rdida de tiempo a trav&eacute;s del universo.',
44 => 'El silo es un lugar de almacenamiento y lanzamiento de misiles planetarios.',

106 => "Usando esta tecnolog&iacute;a, puede obtenerse informaci&oacute;n sobre otros planetas.",
108 => "Cuanto m&aacute;s elevado sea el nivel de tecnolog&iacute;a de computaci&oacute;n, m&aacute;s flotas podr&aacute;s controlar simultaneamente. Cada nivel adicional de esta tecnologia, aumenta el numero de flotas en 1.",
109 => "Este tipo de tecnolog&iacute;a incrementa la eficiencia de tus sistemas de armamento. Cada mejora de la tecnolog&iacute;a militar a&ntilde;ade un 10% de potencia a la base de da&ntilde;o de cualquier arma disponible.",
110 => "La tecnolog&iacute;a de defensa se usa para generar un escudo de part&iacute;culas protectoras alrededor de tus estructuras. Cada nivel de esta tecnolog&iacute;a aumenta el escudo efectivo en un 10% (basado en el nivel de una estructura dada).",
111 => "Las aleaciones altamente sofisticadas ayudan a incrementar el blindaje de una nave a&ntilde;adiendo el 10% de su fuerza en cada nivel a la fuerza base.",
113 => "Entendiendo la tecnolog&iacute;a de diferentes tipos de energ&iacute;a, muchas investigaciones nuevas y avanzadas pueden ser adaptadas. La tecnolog&iacute;a de energ&iacute;a es de gran importancia para un laboratorio de investigaci&oacute;n moderno.",
114 => "Incorporando la cuarta y quinta dimensi&oacute;n en la tecnolog&iacute;a de propulsi&oacute;n, se puede disponer de un nuevo tipo de motor; que es m&aacute;s eficiente y usa menos combustible que los convencionales.",
115 => "Ejecutar investigaciones en esta tecnolog&iacute;a proporciona motores de combusti&oacute;n siempre m&aacute;s rapido, aunque cada nivel aumenta solamente la velocidad en un 10% de la velocidad base de una nave dada.",
117 => "El sistema del motor de impulso se basa en el principio de la repulsi&oacute;n de part&iacute;culas. La materia repelida es basura generada por el reactor de fusi&oacute;n usado para proporcionar la energ&iacute;a necesaria para este tipo de motor de propulsi&oacute;n.",
118 => "Los motores de hiperespacio permiten entrar al mismo a trav&eacute;s de una ventana hiperespacial para reducir dr&aacute;sticamente el tiempo de viaje. El hiperespacio es un espacio alternativo con m&aacute;s de 3 dimensiones.",
120 => "La Tecnolog&iacute;a l&aacute;ser es un importante conocimiento; conduce a la luz monocrom&aacute;tica firmemente enfocada sobre un objetivo. El da&ntilde;o puede ser ligero o moderado dependiendo de la potencia del rayo...",
121 => "La Tecnolog&iacute;a i&oacute;nica enfoca un rayo de iones acelerados en un objetivo, lo que puede provocar un gran da&ntilde;o debido a su naturaleza de electrones cargados de energ&iacute;a.",
122 => "Las armas de plasma son incluso m&aacute;s peligrosas que cualquier otro sistema de armamento conocido, debido a la naturaleza agresiva del plasma.",
123 => "Los cient&iacute;ficos de tus planetas pueden comunicarse entre ellos a trav&eacute;s de esta red.",
124 => "Las naves son equipadas con equipo cientifico para tomar datos en largas expediciones.",
131 => 'Aumenta la producci&oacute;n de la mina de metal en un 2%',
132 => 'Aumenta la producci&oacute;n de la mina de cristal en un 2%',
133 => 'Aumenta la producci&oacute;n de la mina de deuterio en un 2%',
199 => 'A trav&eacute;s del disparo de part&iacute;culas concentradas de gravit&oacute;n se genera un campo gravitacional artificial con suficiente potencia y poder de atracci&oacute;n para destruir no solo naves, sino lunas enteras.',

	202 => 'Small cargo - necessary for any governor in the early stages of development of the empire. This multi-functional ship not only has the ability to quickly transfer resources between colonies, but also accompanies larger fleets in the raids on the enemy planet.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Используется для транспорта ресурсов. 
  <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Light conveyor </font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	203 => 'The most economically advantageous due to the increase of the hold. Thanks to highly developed jet engine, it serves as the most cost-effective supplier of resources between the planets, and the most effective in raids on hostile worlds.
  <br><br>
   <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Используется для транспорта ресурсов. 
  <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Light conveyor </font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	204 => 'The first and most expensive of warships, vulnerable in combat, but the widespread use can be a big threat to any empire.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.
  <br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	205 => 'Further development of light fighter and implementation of high-tech materials has led to the creation of the ship. Ion engine on ships of this type has been used for the first time, it will increase costs, but opened up new possibilities in the field of defense and armaments.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.
  <br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	206 => 'With the development of the heavy laser and the ion cannon, light and heavy fighters are faced with a growing number of alarming loss of space battles. It was therefore decided to build a new class of ship that combined improved armor and firepower. As a result of years of research and development, born Cruiser.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	207 => 'The battleship is built to withstand the armadas of fighters in the biggest battles, the ship has a large cargo spaces, heavy guns, and high hyperdrive. After development, it eventually became the basis for any fleet.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	208 => 'This ship, thanks transported them to the colonists and the necessary agro-technical and construction equipment on the recently discovered planet to colonize them. As soon as he arrived at their destination, immediately transformed to form a living space and to obtain primary resources for further building colonies.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used for the development of new planets.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> The maximum can be 15 planets colonised.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	209 => 'Since after the battles began to form huge garbage field on the orbits of the planets, it was the question of the collection of debris of dead fleet for further processing in the necessary resources. This task is designed to solve the Recycler.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used to collect the debris field.<br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction 30-50% of the resources expended fals in the debris.</font><br></font><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font><font color="#00FF00"></font><br> <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	210 => 'Spy probes - a small automatic drones, equipped with over-speed motors, allows you to move quickly over long distances. The probes collect information about the planet\'s orbit is low, and transmits it to the collection point for further processing. In the event of becoming easy targets for enemy defenses.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to enemy espionage.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	211 => 'With the increase in the quantity and quality of defense, there was a task to build a new ship for effective control and break the enemy\'s defenses. Using laser guidance and targeting, as well as plasma bombs, bomber became a formidable weapon attacks.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	212 => 'It soon became clear that without the development of additional means of generating energy, the further development of the colony is threatened by a lack of power generation resources. Scientists have been working on the problem and found a way to transfer electrical energy to the colony using specially designed satellites in geostationary orbit. Solar satellites collect solar energy and transmit it to a ground station using advanced laser technology. The efficiency of the solar satellite depends on the strength of solar radiation it receives.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used for power generation. Development depends on the temperature of the planet.
  <br> <span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor</font><font color="#00FF00">.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Destroyed by the attack of the planet.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Does not generates energy at the planet below -179 °.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	213 => 'Shredder is the result of years of work and development. Thanks to improved sensor homing powerful cannon turrets and armor, he became one of the most formidable ships of the universe.
  <br><br> 
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	214 => 'This is only one of the ships, which can be seen with the naked eye from the surface of the planet. Armed with a giant cannon graviton, using the most advanced weapons systems ever created in the universe, this massive ship can not only destroy entire fleets and defense, but also has the ability devastation moons. Only the most advanced empire can build a ship of this class.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies and the destruction of the moon.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	215 => 'This ship is one of the most advanced warships ever developed especially deadly when it comes to intercepting and destroying attacking fleets. Due to the improved laser cannons on board and modern hyperdrive, the cruiser is a major force. Due to the large amount of weapons in the cargo holds have been reduced, but this is offset by reduced fuel consumption.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	216 => 'In connection with the emergence of new types of attack tools have tremendous firepower, it became necessary to create a modern ship able to resist the attacks of the enemy.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br> 
  <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	217 => 'Further development funds interplanetary transportation has forced designers to create a brand new, spacious and well-protected vehicle. Increased hold and high speed make it a truly indispensable in most advanced empires.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to transport resources.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction 30-50% of the resources expended fals in the debris.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	218 => 'Avatar - the crown of human genius. The slow speed of the vessel is compensated by a terrifying arsenal of weapons.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	219 => 'The global processor space battles could no longer fulfill its role in full, therefore, has been developed entirely new vehicle for the collection of resources. Due to the location on board equipment for the processing of scrap, as well as cargo space, it has become indispensable in the field of battle.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used to collect the debris field.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	220 => 'Due to the discovery of dark matter in the synthesis of the moons, there was this ship. The basis of the collection of the matter is the principle of operation of the collider, but the successful assembly of TM, the ship as a result of high energy loads can not be reused.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to search for dark matter on the Moon.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	221 => 'Designers who developed picture continued to improve their project. After a while, they introduced a completely new ship both in class and used for innovation. Killer fleets - so-called inhabitants of the world of this monster.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	222 => 'Increasing the means of defense, as well as the presence of orbiting planets orbiting bases and fleets, prompting scientists to create the Flying Death. The basis of the construction of this ship have been put proven technology that is already used in Avatar and ONille.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	223 => 'Designed for fleet and saves resources for a long time, it is the slowest ship of the universe.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used for fleet saves for a long time.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It has a minimum speed.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	224 => 'M-19 prime fleet of the middle class, allocated a large attack force sufficiently strong structure and a good amount of boards, in comparison with other fleets of the middle class. It has a high enough flight speed at an acceptable consumption. Perfect against a light fleet.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	225 => 'Galleon - Part fleet support. It has good offensive and defensive qualities with a relatively low price. As part of a general attack fleet is indispensable and gives the enemy a lot of trouble. 
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	226 => 'Destroyer - An improved model of the standard bomber. Lower mobility due to the increased strength of the case and additional weapons. As part of good defensive fleet - will turn to dust heavy enemy defenses.
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	227 => 'Frigate - A powerful warship. In connection with the new achievements in science, defense and the enemy fleet, it has become much stronger. Therefore, the scientists decided to create a more powerful ship, based on the old. Thus it was coined frigate. Due to the powerful weapons, the armor, shields and powerful low speed, he became a serious problem for all types of fleets and Defense.
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	228 => 'Black Wanderer - Advanced development of the space fleet. Multiplatform tools and modular housing sector, reduce the chance of penetration and increase the efficiency of maneuvers in battle. In battle, he has no equal in the destruction of the fleet of light.
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	229 => 'M-7 prime fleet of light class, the only fleet in its class with the ability to improve weapons. Perfect for distracting enemy forces, taking on the part of the fire. Formidable force in large numbers.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Light conveyor </font>
		<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	230 => 'M-32 prime fleet of heavy class, has a better protected environment prime fleets. For its structure it has a large stock of boards and the percentage of recovery. Perfect against average fleet and as firepower in major battles.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	231 => 'M-20 prime fleet of heavy class, has a better protected environment prime fleets. For its structure it has a large stock of boards and the percentage of recovery. Perfect against average fleet and as firepower in major battles.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	
	401 => 'The first line of the main line of defense of the planets and their satellites. Enemy attacks target missiles with simple warhead. For their construction there is no need to carry out research. During the construction of advanced defense systems, are food, taking the brunt of the first wave of attacks. After the battle, the basic ability to recover 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	402 => 'Light Laser has been designed as a new level of protection of the planets from enemy attacks. Use the special sights for firing high-intensity, aimed at reducing the main lung of the enemy fleet. After the battle, the basic ability to recover 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	403 => 'The heavy laser is an improved version of LL. Being more balanced with improved alloy composition and the ultra-modern guidance system, designed to strengthen the defense of the lightweight belt enemy fleet. After the battle, the basic ability to recover 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	404 => 'The concept of using an electromagnetic pulse weapons for the projectile came back in the mid-late 1930s. In principle, Gauss gun consists of a system of powerful electromagnets that shoots a projectile by accelerating between adjacent metal plates. Gauss Cannons firing high-density projectiles at extremely high speed. This weapon is so powerful that when a shot it creates a sonic boom that can be heard for many kilometers.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
    <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	405 => 'Ion gun designed to destroy attacking fleet using an electromagnetic field created a beam of particles - ions. It can be used for the decommissioning of equipment and energy shields attacking fleet. The ability to restore the fortifications after the fight is up to 70%.
  <br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	406 => 'The basis for the creation of a plasma weapon on the principle of operation of the pulse and the plasma toroid, as well as overheating of the gases, resulting in an electromagnetic accelerator arises plasma ball that is launched into the goal. Approximation bluish ball and following this burst, impresses even the bravest of the enemy. The ability to restore the fortifications after the fight is up to 70%.
  <br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	407 => 'The danger of falling to the planet asteroids and space debris marked the beginning of the creation of the small shield dome. By creating a large electromagnetic field around the planet, guaranteed to shield deflects the falling asteroids on the planet, as well as a certain amount of shock suppresses the attacking fleet. It was later discovered that the small panels do not provide adequate protection against enemy attacks on a large scale.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	408 => 'Large Shield Dome - the successful completion of the modernization of small domes. It requires large amounts of energy and resources.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	409 => 'Planetary dome is the final step in the development of passive planetary defense. As a result of the use of equipment that creates a higher electromagnetic field intensity, planetary dome can withstand a fairly long period of protection from enemy attacks.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	410 => 'Graviton cannon creates a distortion of the gravitational field changes dramatically weight goal. Based on similar engines antigravity machines principles. The ability to restore the fortifications after the fight is up to 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
   <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	411 => 'Orbital base have monstrous power of defensive weapons, capable of destroying enemy ships anywhere on the battlefield. Demand for building highly gravitational technology.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	412 => 'Lepton weapons planned to create as a technical device intended to influence the minds of people against their will. But at the last minute additions to the project introduced as a result of which the gun has become a formidable means of protecting the planet from possible aggression. Leptons Charged particles in contact with the aim of producing more damage in shields and armor fleets.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	413 => 'Proton gun when firing the projectile uses a proton inversion. The instrument requires long and cumbersome accelerators, which limits its placing large stationary installations. Particle beams are radiation danger for all living beings, and not radiation-resistant electronics in the vicinity of the point of destruction in the atmosphere, as well as close to the beam path.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	414 => 'The "Canyon" was launched to improve the graviton guns and was a complete success. The instrument requires a lot of energy and material costs, as well as highly-gravitational technology.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	415 => 'Quantum gun specifically designed for the destruction of the enemy fleet flagships, namely the main heavy vehicles. The principle of operation is based on the tools the substance goes from one thermodynamic phase to another when the magnetic field from the paramagnetic state to the ferromagnetic state is weak.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.',
	416 => 'Scientists recently demonstrated that it is possible to use deuterium as a weapon. Some time later, there was an instrument of Hydrogen. During contact with the skin or the shields of the ship, there is a momentum that undermines deuterium.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	417 => 'Dora Gun is the most powerful protection of the middle class. Because of its power, it can destroy enemy armadas by an electromagnetic pulse, but because of it, the gun overheats very quickly and requires a lot of energy, so they are placed in the mountains, and next to them, there is always a power plant.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	418 => 'Photon cannon prototype was Proton gun. Photon cannon at its relatively low price and powerful volley fire, it has become indispensable for the global defense.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	419 => 'The emitter of particles - this is the result of long, painstaking work of scientists and engineers to create this type of defense. This is one of those not many kinds of multi-purpose protection of planet or moon that can repel almost all known types of ships. Its power lies in the combination of plasma, graviton and ion guns, into one powerful beam that is in contact with, the ship splits into particles.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	420 => 'Megador Slim - propelled prime defense light class uses two types of weapons. It copes with light fleet types, including prime and M-7 fleet. Receives less damage from interplanetary missiles, performing well against the bombers, when compared with other lung defense class.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Receives 10% damage when attacking interplanetary missiles.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>
  <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available with the purchase in the premium shop</font>',
	421 => 'Megador Iron - propelled prime defense of the middle class, uses three types of weapons. Effectively coping with an average fleet type, the only defense of the middle class has skorostrel against the Destroyer, also it has a good skorostrel against bombers. It receives less damage from interplanetary missiles, performing well against bombers and destroyers, when compared to other middle class defense.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Receives 15% damage when attacking interplanetary missiles.
 <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available with the purchase in the premium shop</font>',
	422 => 'Megador Grand - propelled prime defense heavy class, uses three types of weapons. Effectively cope with an average fleet type, including the prime fleet of M-19. Receives less damage from interplanetary missiles, performing well against bombers and destroyers, when compared to other defense heavy class.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Receives 20% damage when attacking interplanetary missiles.
 <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available with the purchase in the premium shop</font>',

502 => "Los misiles de intercepci&oacute;n destruyen los misiles interplanetarios.",
503 => "Los misiles interplanetarios destruyen los sistemas de defensa del enemigo.",

	601 => 'El ge&oacute;logo es un experto en astrominerolog&iacute;a y astrocristalograf&iacute;a. Asiste a sus equipos en la metalurgia y qu&iacute;mica y tambi&eacute;n se encarga de las comunicaciones interplanetarias para optimizar el uso y refinamiento de la materia bruta a lo largo de todo el imperio.',
	602 => 'El almirante es un veterano de guerra experimentado y un habilidoso estratega. En las batallas mas duras, es capaz de hacerse una idea de la situaci&oacute;n y contactar a sus almirantes subordinados. Un emperador sabio puede apoyarse en su ayuda durante los combates.',
	603 => 'El Ingeniero es un especialista en la gesti&oacute;n de energ&iacute;a. En tiempos de paz, aumenta la energ&iacute;a de todas las colonias. En caso de ataque, garantiza el abastecimiento de energ&iacute;a a los ca&ntilde;ones, evitando una posible sobrecarga, lo que conduce a una reducci&oacute;n de defensas perdidas en batalla.',
	604 => 'El gremio de los tecn&oacute;cratas est&aacute; compuesto de aut&eacute;nticos genios, y siempre los encontrar&aacute;s en ese peligroso borde donde todo explotar&iacute;a en mil pedazos antes de poder encontrar una explicaci&oacute;n tecnol&oacute;gica y racional. Ning&uacute;n ser humano normal tratar&iacute;a jam&aacute;s descifrar el c&oacute;digo de un tecn&oacute;crata, con su presencia, inspira a los investigadores del imperio.',
	605 => 'El Constructor tiene alterado su ADN, uno solo de estos hombres puede construir una ciudad entera en poco tiempo.',
	606 => 'Los cient&iacute;ficos forman parte de un gremio concurrente al de los tecn&oacute;cratas. Ellos se especializan en la mejora de las tecnolog&iacute;as.',
	607 => 'El Maestro del Almacén ha dominado el almacenaje de elementos valiosos y las habilidades de clasificación. A través de técnicas sofisticadas de almacenamiento y  ajustes estructurales puede aumentar el volumen útil de un espacio de almacenamiento de manera significativa.',
	608 => 'El defensor es un miembro del ej&eacute;rcito imperial. Abocarse en su trabajo le permite construir una formidable defensa en un breve periodo de tiempo.',
	609 => 'El Protector ha realizado un impresionante trabajo para el Reino y por ello se le dio la oportunidad de ser Protector. El protector es el reconocimiento más importante dentro del Ejército Imperial en materia de Defensa.',
	610 => 'El esp&iacute;a es una persona enigm&aacute;tica. Nadie nunca vio su verdadero rostro, la &uacute;nica forma ser&iacute;a asesinandol&oacute;.',
	611 => 'El comandante forma parte del ej&eacute;rcito imperial ha dominado el arte del manejo de flotas. Su cerebro puede calcular las trayectorias de una gran cantidad de flotas.',
	612 => 'El destructor es un miembro del ej&eacute;rcito imperial sin misericordia. Masacra todo lo que est&aacute; a su paso s&oacute;lo por placer. Actualmente est&aacute; desarrollando un nuevo m&eacute;todo de producci&oacute;n de las estrellas de la muerte.',
	613 => 'El general es una persona que ha servido desde hace muchos a&ntilde;os al ej&eacute;rcito imperial. Los fabricantes de naves producen naves m&aacute;s r&aacute;pidas si el lo pide.',
	614 => 'El Conquistador posee cualidades innegables de la conquista. Es parte de la armada imperial, siendo el más alto nivel de educación que se puede alcanzar. Conoce como comandar la Estrella Negra.',
	615 => 'Ha demostrado ser el más grande conquistador del universo. El universo es tuyo, siempre que se mantenga haciendo lo que se debe hacer.',

701 => 'El bono es s&oacute;lo temporal.',
702 => 'El bono es s&oacute;lo temporal.',
703 => 'El bono es s&oacute;lo temporal.',
704 => 'El bono es s&oacute;lo temporal.',
705 => 'El bono es s&oacute;lo temporal.',
706 => 'El bono es s&oacute;lo temporal.',
707 => 'El bono es s&oacute;lo temporal. No afecta a las expediciones.',
);

$LNG['longDescription'] = array(
	 1 => 'Metal is a fundamental resource, invested in the foundation of your empire. With the increase in production of metal produced more products for use in construction of buildings, ships and missile systems and research. Deep mines require more energy to maximize production of the metal. Since the metal is the most common of all available resources, its cost is considered to be the lowest of all the resources for trade and exchange.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Metal mines. Extraction increases with increasing level.</font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For work requires energy.</font>',
	2 => 'Crystals are the main resource for the creation of technology and electronics, and crystal and metal compounds, used for alloy shields and armor. Compared with the metal extraction process for obtaining crude crystal structures on an industrial scale, it requires much more energy to handle them. The development of vessels and facilities, as well as specialized research updates also require a certain amount of crystals.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Crystal produces. Extraction increases with increasing level.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For work requires energy.</font>',
	3 => 'Deuterium is also called heavy hydrogen. It is a stable isotope of hydrogen contained in the planet\'s oceans. Special synthesizers separate water from deuterium using nano-centrifuges. Update synthesizer allows you to increase the amount of deuterium, which is used during the scanning sensor phalanx, viewing galaxies, as fuel for ships and used for the majority of buildings and research.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Deuterium mines. Extraction increases with increasing levels.</font>
	<br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Production increases with a decrease in temperature on the planet.</font><font color="#BC8F8F"></font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For work requires energy</font><font color="#BC8F8F">.</font>',
	4 => 'Giant solar panels used to generate electricity for the mines and the deuterium synthesizer. Increasing the surface area of the photovoltaic cells, increases the energy output of the power grids of your planet.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It produces energy. Energy production increases with the level.</font>',
	6 => 'Technopolis aims to strengthen the innovation process through the regional centers for the development and production development of high technological level. Each level increases the speed of Technopolis research at 16%, which is important at the higher stages of research.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates research study by 16% per level</font>',
	7 => 'El muelle Xterium ofrece la posibilidad de reparar los barcos que se han convertido en un naufragio en el transcurso de una batalla. Esto puede ser completado con condiciones más favorables que una nueva construcción en el astillero y tiene un tiempo máximo de reparación de 48 horas.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Desde el momento en que se crea un naufragio hay 2 días para comenzar con las reparaciones.</font><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Las flottas reparados luego tienen que ser colocados de forma activa de nuevo en servicio una vez que se complete la reparación.</font><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Si esto no sucede, van a ir automáticamente de nuevo en funcionamiento después de pasar 2 días.</font>',
	12 => 'In fusion power plants, hydrogen nuclei fuse into helium nuclei under enormous temperature and pressure, releasing tremendous amounts of energy. During the growth leveled reactor systems, uses more of deuterium, which leads to an increase in energy production per hour. Energy effect can be increased by studying energy technology.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It produces energy. Energy production increases with the level.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It requires Deuterium</font>',
	14 => 'Robots factory used for the production of modern robotics. Each new level of the factory leads to the creation of faster robots that reduce the time required for the construction of buildings.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Speeds construction of buildings and combat units each level by 10%.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up research studies</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up the construction of fast units.</font>',
	15 => 'Nanite factory - a mechanical or electromechanical device whose dimensions are measured in nanometers. Microscopic nano machines are the ultimate evolution in robotics. After the completion of each level of the factory reduced production time for buildings, ships and defensive structures twice.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Speeds construction of buildings and combat units each level by 50%.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up research studies</font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up the construction of fast units.</font>',
	16 => "Usted quiere vender los recursos en el mercado o invertirlos en una alianza банк sistema.",
	21 => 'Planetary shipyards responsible for the construction of spacecraft and defense systems. By increasing the level of the shipyard can produce a wider range of vehicles and combat ships at a much greater speed. Using the shipyard together with a factory nanites dramatically reduces construction time Kosmoflot.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It opens up the possibility for the construction of new units. 
	<br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With each level speeds up the production of units by 10%</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up the construction of fast units.</font>',
	22 => 'This store is used for storing the metal ores. Each level of modernization increases the amount of ore which can be stored. If the storage capacity is exceeded, the production of metal automatically stops to prevent a catastrophic collapse in the mines mines.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to store metal. With each level of the storage increased by 2 times.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If the store is filled with resource development stops</font>',
	23 => 'Untreated crystal stored in buildings of this type. With each level of storage, an increasing number of crystal that will be saved. Once production exceeds the allowable capacity of the crystal production stops automatically to prevent a collapse in mines.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to store crystal. With each level of the storage increased by 2 times.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If the store is filled with resource development stops</font>.',
	24 => 'Designed for storage of newly synthesized deuterium. After processing in the synthesizer, deuterium through the pipes flows into the reservoir for later use. With each level of construction total storage capacity increases. Once reached a critical point, the synthesizer is turned off to prevent rupture of the vessel.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Used to store deuterium. With each level of the storage increased by 2 times.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If the store is filled with resource development stops</font>.',
	31 => 'An important part of any empire is a research laboratory, where improving the old and learn new scientific discoveries. With each level of construction, the speed with which new technologies are investigated increases. To conduct the study as soon as possible, scientists Empire sent to this planet. Thus, knowledge about new technology are easily spread throughout the empire.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Provides access to the study of new technologies. With each level speeds up the study of technologies 10%</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Provides access to the study of new technologies.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up construction.</font>',
	33 => 'With the constant increase in the size of the colony, there was a problem ... How can we continue to work on an overpopulated planet and survive? Increasing the capacity of mining operations and atmospheric pollution may soon destroy the planet and kill every living thing on it. Scientists have developed a method to create huge masses of additional vital space with the help of nano-machines. It requires huge amounts of energy.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It increases the number of available fields on the planet by 7.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	One field is used for the terraformer</font>',
	34 => 'Warehouse Alliance provides fuel-friendly fleet, which may be on the low orbit on hold. The level determines the maximum number of stock at the same time the fleets involved in the defense of the planet. Increased retention times of fleets leads to increased fuel consumption.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It allows you to put hold on your planet. Each level increases the maximum number of the fleet and its retention time</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If you hold a fleet consumes deuterium</font>',
	41 => 'Because the moon has no atmosphere, then, for the existence of the staff, it was built closed dome. Moon Base produces oxygen, heat and gravity, creating conditions for the life of the colonists. With each level of development, the living space of the biosphere is increased by three units.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It increases the number of available fields on the moon by 3 per level</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	One box holds itself Moon Base</font>',
	42 => 'At the heart of a phalanx of high-resolution sensors are used analyzing the spectrum of light, the composition of gases and radiation emissions of distant worlds, with subsequent transfer of the information to be processed in a supercomputer. On the difference changes in the gas composition and the presence of radiation and calculated the fleet within range of the phalanx. To avoid overheating during scanning phalanx used a certain amount of deuterium.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	He sees the movement of enemy fleets. <br> Increases the range of the following formula: (level of the phalanx) ^ 2 - 1.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	To work requires Deuterium.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not see the recalled deploiements</font>',
	43 => 'Jump gate or teleport is a system of giant transceivers intended for the administration of any fleets in the receiving gateway to anywhere in your empire almost instantly. Using technology similar to the splitting of the atom\'s nucleus, to achieve the jump, deuterium - not required. Regeneration and cooling of the gate after the jump takes at least an hour, with increasing levels of teleport - time is reduced. Transportation resources through the gate - is impossible.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It gives the ability to instantly teleport from one fleet to another moon. With each level, and cooldown reduced by 2 times</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For teleportation, you need to build a teleport at least two moons</font>',
	44 => 'Missile Silos used for building, storing and running four or twelve interplanetary missile interceptors. With each level of the mine, in proportion to the number of missiles increases. Storage interplanetary missiles and interceptor missiles in the same silo is allowed.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It allows you to build interplanetary missiles and interceptor missiles. Each level increases the maximum possible number of missiles.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Interceptor missiles is possible to build 2 times more than interplanetary rocket at the same level missile silo.</font>',
	69 => 'After years of study of antimatter, scientists finally have invented a way to create the dark matter. It lies in the acceleration of antimatter in the collider. But the collider interfere with the planet\'s atmosphere, so it was decided to build it on the moon, where the is no atmosphere.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It produces dark matter on the basis of the mine.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	With the destruction of the moon, Collider, destroyed along with it.</font>',
	71 => 'Light conveyor built for continuous construction of a light fleet and defense, taking into account technology and sequence of assembly units of 8 vessels per second. Produced: Small vehicles, large transport, Light Fighter, Heavy Fighter, Recycler, rocket launchers, light laser, heavy laser.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Remove the limit of 1 unit per second during the construction of the fleet and defense. </font><br>
    <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates construction only planet where he built a conveyor.</font>',
	72 => 'Middle conveyor considerably increases productivity and defense fleet average to 5 units per second by changing the routine, monotonous work, ultra-precise machines. Produced: Cruiser, Battleship, Bomber, Destroyer, Battlecruiser, improving transport, Mega processor, Gauss, ion cannon, plasma cannon, hydrogen weapon, dora gun.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Remove the limit of 1 unit per second during the construction of the fleet and defense.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates construction only planet where he built a conveyor.</font>',
	73 => 'Heavy conveyor was built after the introduction of redirecting the output of one program to the input of another process that has allowed to build 2 units of heavy naval and defense in a moment more. Produced: Death Star, Supernova, Avatar, Battleship class ONill, Flying death, Galleon, destroyer, frigate, black wanderer graviton weapon, leptons gun Proton cannon Canyon, photon cannon, particle emitter. 
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Remove the limit of 1 unit per second during the construction of the fleet and defense. </font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates construction only planet where he built a conveyor.</font>',

	106 => "Usando esta tecnolog&iacute;a, puede obtenerse informaci&oacute;n sobre otros planetas.",
	108 => "Cuanto m&aacute;s elevado sea el nivel de tecnolog&iacute;a de computaci&oacute;n, m&aacute;s flotas podr&aacute;s controlar simultaneamente. Cada nivel adicional de esta tecnologia, aumenta el numero de flotas en 1.",
	109 => "Este tipo de tecnolog&iacute;a incrementa la eficiencia de tus sistemas de armamento. Cada mejora de la tecnolog&iacute;a militar a&ntilde;ade un 10% de potencia a la base de da&ntilde;o de cualquier arma disponible.",
	110 => "La tecnolog&iacute;a de defensa se usa para generar un escudo de part&iacute;culas protectoras alrededor de tus estructuras. Cada nivel de esta tecnolog&iacute;a aumenta el escudo efectivo en un 10% (basado en el nivel de una estructura dada).",
	111 => "Las aleaciones altamente sofisticadas ayudan a incrementar el blindaje de una nave a&ntilde;adiendo el 10% de su fuerza en cada nivel a la fuerza base.",
	113 => "Entendiendo la tecnolog&iacute;a de diferentes tipos de energ&iacute;a, muchas investigaciones nuevas y avanzadas pueden ser adaptadas. La tecnolog&iacute;a de energ&iacute;a es de gran importancia para un laboratorio de investigaci&oacute;n moderno.",
	114 => "Incorporando la cuarta y quinta dimensi&oacute;n en la tecnolog&iacute;a de propulsi&oacute;n, se puede disponer de un nuevo tipo de motor; que es m&aacute;s eficiente y usa menos combustible que los convencionales.",
	115 => "Los motores de combusti&oacute;n pertenecen a los m&aacute;s antiguos en funcionamiento y se basan en la repulsi&oacute;n. Las part&iacute;culas son aceleradas y abandonan el motor generando una fuerza de repusli&oacute;n que mueve la nave en la direcci&oacute;n opuesta..",
	117 => "El sistema del motor de impulso se basa en el principio de la repulsi&oacute;n de part&iacute;culas. La materia repelida es basura generada por el reactor de fusi&oacute;n usado para proporcionar la energ&iacute;a necesaria para este tipo de motor de propulsi&oacute;n.",
	118 => "A trav&eacute;s de la curvatura del espacio-tiempo en el entorno inmediato de las naves viajantes, el espacio se comprime hasta tal grado que las distancias m&aacute;s grandes pueden ser cubiertas en un corto per&iacute;odo de tiempo.",
	120 => "El l&aacute;ser (amplificaci&oacute;n de luz por emisi&oacute;n estimulada de radiaci&oacute;n), es un rayo de fotones monocrom&aacute;tico coherente con excelentes capacidades de enfoque..",
	121 => "La tecnolog&iacute;a i&oacute;nica enfoca un rayo de iones acelerados en un objetivo, lo que puede provocar un gran da&ntilde;o debido a su naturaleza de electrones cargados de energ&iacute;a. Los rayos i&oacute;nicos son superiores a los rayos l&aacute;ser, pero requieren un mayor coste de investigaci&oacute;n.",
	122 => "Las armas de plasma son incluso m&aacute;s peligrosas que cualquier otro sistema de armamento conocido, debido a la naturaleza agresiva del plasma. Es uno de los cuatro estados de la materia (s&oacute;lido, l&iacute;quido, gas, plasma), y consiste en un numero igual de part&iacute;culas de gas cargadas positiva y negativamente.",
	123 => "Los cient&iacute;ficos de tus planetas pueden comunicarse entre ellos a trav&eacute;s de esta red. Con cada nivel investigado, uno de tus laboratorios de investigaci&oacute;n del nivel m&aacute;s alto, ser&aacute; enlazado a la red. Sus niveles se a&ntilde;adir&aacute;n cuando la red se establezca.",
	124 => "La Tecnolog&iacute;a de Expedici&oacute;n incluye diversas tecnolog&iacute;as de exploraci&oacute;n y permite dotar a las naves espaciales de diferentes tama&ntilde;os con un m&oacute;dulo de investigaci&oacute;n. Estos incluyen una base de datos y un laboratorio m&oacute;vil completamente equipado.",
	131 => 'Aumenta la producci&oacute;n de la mina de metal en 2%',
	132 => 'Aumenta la producci&oacute;n de la mina de cristal en 2%',
	133 => 'Aumenta la producci&oacute;n del sintetizador de deuterio en 2%',
	199 => 'Un gravit&oacute;n es una part&iacute;cula elemental responsable de los efectos de la gravedad. Es su propia antipart&iacute;cula, tiene masa cero y carece de carga, tambi&eacute;n posee un giro de 2. A trav&eacute;s del disparo de part&iacute;culas concentradas de gravit&oacute;n se genera un campo gravitacional artificial con suficiente potencia y poder de atracci&oacute;n para destruir no solo naves, sino lunas enteras.',
	//NOUVEAU
	101 => 'Microprocesadores',
	102 => 'Minería',
	103 => 'Colonización',
	104 => 'Enlace de alianza',
	105 => 'Motores',
	116 => 'Motor iónico',
	124 => 'Expedición',
	141 => 'Armadura ligera',
	142 => 'Armadura mediana',
	143 => 'Armadura pesada',
	144 => 'Armadura Activa',
	151 => 'Búsqueda de Star Trek',
	152 => 'Búsqueda de materia oscura',
	153 => 'Búsqueda de la flota',
	154 => 'Astrofísica',
	155 => 'Fotos exactas',
	156 => 'Agresión de los bárbaros',
	157 => 'Agresión de los piratas',
	158 => 'Agresión de los Antiguos',
	165 => 'Ahorro de motores',
	171 => 'Escudos de luz',
	172 => 'Escudos medios',
	173 => 'Escudos pesados',
	174 => 'Restauración de escudos',

	202 => 'Small cargo - necessary for any governor in the early stages of development of the empire. This multi-functional ship not only has the ability to quickly transfer resources between colonies, but also accompanies larger fleets in the raids on the enemy planet.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Используется для транспорта ресурсов. 
  <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Light conveyor </font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	203 => 'The most economically advantageous due to the increase of the hold. Thanks to highly developed jet engine, it serves as the most cost-effective supplier of resources between the planets, and the most effective in raids on hostile worlds.
  <br><br>
   <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Используется для транспорта ресурсов. 
  <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Light conveyor </font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	204 => 'The first and most expensive of warships, vulnerable in combat, but the widespread use can be a big threat to any empire.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.
  <br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	205 => 'Further development of light fighter and implementation of high-tech materials has led to the creation of the ship. Ion engine on ships of this type has been used for the first time, it will increase costs, but opened up new possibilities in the field of defense and armaments.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.
  <br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	206 => 'With the development of the heavy laser and the ion cannon, light and heavy fighters are faced with a growing number of alarming loss of space battles. It was therefore decided to build a new class of ship that combined improved armor and firepower. As a result of years of research and development, born Cruiser.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	207 => 'The battleship is built to withstand the armadas of fighters in the biggest battles, the ship has a large cargo spaces, heavy guns, and high hyperdrive. After development, it eventually became the basis for any fleet.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	208 => 'This ship, thanks transported them to the colonists and the necessary agro-technical and construction equipment on the recently discovered planet to colonize them. As soon as he arrived at their destination, immediately transformed to form a living space and to obtain primary resources for further building colonies.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used for the development of new planets.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> The maximum can be 15 planets colonised.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	209 => 'Since after the battles began to form huge garbage field on the orbits of the planets, it was the question of the collection of debris of dead fleet for further processing in the necessary resources. This task is designed to solve the Recycler.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used to collect the debris field.<br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction 30-50% of the resources expended fals in the debris.</font><br></font><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font><font color="#00FF00"></font><br> <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	210 => 'Spy probes - a small automatic drones, equipped with over-speed motors, allows you to move quickly over long distances. The probes collect information about the planet\'s orbit is low, and transmits it to the collection point for further processing. In the event of becoming easy targets for enemy defenses.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to enemy espionage.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	211 => 'With the increase in the quantity and quality of defense, there was a task to build a new ship for effective control and break the enemy\'s defenses. Using laser guidance and targeting, as well as plasma bombs, bomber became a formidable weapon attacks.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	212 => 'It soon became clear that without the development of additional means of generating energy, the further development of the colony is threatened by a lack of power generation resources. Scientists have been working on the problem and found a way to transfer electrical energy to the colony using specially designed satellites in geostationary orbit. Solar satellites collect solar energy and transmit it to a ground station using advanced laser technology. The efficiency of the solar satellite depends on the strength of solar radiation it receives.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used for power generation. Development depends on the temperature of the planet.
  <br> <span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor</font><font color="#00FF00">.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Destroyed by the attack of the planet.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Does not generates energy at the planet below -179 °.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	213 => 'Shredder is the result of years of work and development. Thanks to improved sensor homing powerful cannon turrets and armor, he became one of the most formidable ships of the universe.
  <br><br> 
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	214 => 'This is only one of the ships, which can be seen with the naked eye from the surface of the planet. Armed with a giant cannon graviton, using the most advanced weapons systems ever created in the universe, this massive ship can not only destroy entire fleets and defense, but also has the ability devastation moons. Only the most advanced empire can build a ship of this class.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies and the destruction of the moon.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	215 => 'This ship is one of the most advanced warships ever developed especially deadly when it comes to intercepting and destroying attacking fleets. Due to the improved laser cannons on board and modern hyperdrive, the cruiser is a major force. Due to the large amount of weapons in the cargo holds have been reduced, but this is offset by reduced fuel consumption.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	216 => 'In connection with the emergence of new types of attack tools have tremendous firepower, it became necessary to create a modern ship able to resist the attacks of the enemy.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br> 
  <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	217 => 'Further development funds interplanetary transportation has forced designers to create a brand new, spacious and well-protected vehicle. Increased hold and high speed make it a truly indispensable in most advanced empires.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to transport resources.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction 30-50% of the resources expended fals in the debris.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	218 => 'Avatar - the crown of human genius. The slow speed of the vessel is compensated by a terrifying arsenal of weapons.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	219 => 'The global processor space battles could no longer fulfill its role in full, therefore, has been developed entirely new vehicle for the collection of resources. Due to the location on board equipment for the processing of scrap, as well as cargo space, it has become indispensable in the field of battle.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It is used to collect the debris field.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>
  <font color="#BC8F8F"> <br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It does not attack.</font>',
	220 => 'Due to the discovery of dark matter in the synthesis of the moons, there was this ship. The basis of the collection of the matter is the principle of operation of the collider, but the successful assembly of TM, the ship as a result of high energy loads can not be reused.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to search for dark matter on the Moon.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	221 => 'Designers who developed picture continued to improve their project. After a while, they introduced a completely new ship both in class and used for innovation. Killer fleets - so-called inhabitants of the world of this monster.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	222 => 'Increasing the means of defense, as well as the presence of orbiting planets orbiting bases and fleets, prompting scientists to create the Flying Death. The basis of the construction of this ship have been put proven technology that is already used in Avatar and ONille.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	223 => 'Designed for fleet and saves resources for a long time, it is the slowest ship of the universe.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used for fleet saves for a long time.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It has a minimum speed.</font>
  <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Do not participate in combat.</font>',
	224 => 'M-19 prime fleet of the middle class, allocated a large attack force sufficiently strong structure and a good amount of boards, in comparison with other fleets of the middle class. It has a high enough flight speed at an acceptable consumption. Perfect against a light fleet.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	225 => 'Galleon - Part fleet support. It has good offensive and defensive qualities with a relatively low price. As part of a general attack fleet is indispensable and gives the enemy a lot of trouble. 
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	226 => 'Destroyer - An improved model of the standard bomber. Lower mobility due to the increased strength of the case and additional weapons. As part of good defensive fleet - will turn to dust heavy enemy defenses.
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	227 => 'Frigate - A powerful warship. In connection with the new achievements in science, defense and the enemy fleet, it has become much stronger. Therefore, the scientists decided to create a more powerful ship, based on the old. Thus it was coined frigate. Due to the powerful weapons, the armor, shields and powerful low speed, he became a serious problem for all types of fleets and Defense.
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	228 => 'Black Wanderer - Advanced development of the space fleet. Multiplatform tools and modular housing sector, reduce the chance of penetration and increase the efficiency of maneuvers in battle. In battle, he has no equal in the destruction of the fleet of light.
    <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to attack ennemies.</font>
  <br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font><br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	229 => 'M-7 prime fleet of light class, the only fleet in its class with the ability to improve weapons. Perfect for distracting enemy forces, taking on the part of the fire. Formidable force in large numbers.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>  Light conveyor </font>
		<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	230 => 'M-32 prime fleet of heavy class, has a better protected environment prime fleets. For its structure it has a large stock of boards and the percentage of recovery. Perfect against average fleet and as firepower in major battles.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	231 => 'M-20 prime fleet of heavy class, has a better protected environment prime fleets. For its structure it has a large stock of boards and the percentage of recovery. Perfect against average fleet and as firepower in major battles.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> It used to attacks ennemies.</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With the destruction of 30-50% of resources spent fall in fragments.</font>
	<br><font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available on the planets of the galaxy, and the second with the purchase in the premium shop</font>',
	
	401 => 'The first line of the main line of defense of the planets and their satellites. Enemy attacks target missiles with simple warhead. For their construction there is no need to carry out research. During the construction of advanced defense systems, are food, taking the brunt of the first wave of attacks. After the battle, the basic ability to recover 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	402 => 'Light Laser has been designed as a new level of protection of the planets from enemy attacks. Use the special sights for firing high-intensity, aimed at reducing the main lung of the enemy fleet. After the battle, the basic ability to recover 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	403 => 'The heavy laser is an improved version of LL. Being more balanced with improved alloy composition and the ultra-modern guidance system, designed to strengthen the defense of the lightweight belt enemy fleet. After the battle, the basic ability to recover 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>',
	404 => 'The concept of using an electromagnetic pulse weapons for the projectile came back in the mid-late 1930s. In principle, Gauss gun consists of a system of powerful electromagnets that shoots a projectile by accelerating between adjacent metal plates. Gauss Cannons firing high-density projectiles at extremely high speed. This weapon is so powerful that when a shot it creates a sonic boom that can be heard for many kilometers.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
    <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	405 => 'Ion gun designed to destroy attacking fleet using an electromagnetic field created a beam of particles - ions. It can be used for the decommissioning of equipment and energy shields attacking fleet. The ability to restore the fortifications after the fight is up to 70%.
  <br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	406 => 'The basis for the creation of a plasma weapon on the principle of operation of the pulse and the plasma toroid, as well as overheating of the gases, resulting in an electromagnetic accelerator arises plasma ball that is launched into the goal. Approximation bluish ball and following this burst, impresses even the bravest of the enemy. The ability to restore the fortifications after the fight is up to 70%.
  <br> <br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	407 => 'The danger of falling to the planet asteroids and space debris marked the beginning of the creation of the small shield dome. By creating a large electromagnetic field around the planet, guaranteed to shield deflects the falling asteroids on the planet, as well as a certain amount of shock suppresses the attacking fleet. It was later discovered that the small panels do not provide adequate protection against enemy attacks on a large scale.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	408 => 'Large Shield Dome - the successful completion of the modernization of small domes. It requires large amounts of energy and resources.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	409 => 'Planetary dome is the final step in the development of passive planetary defense. As a result of the use of equipment that creates a higher electromagnetic field intensity, planetary dome can withstand a fairly long period of protection from enemy attacks.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	410 => 'Graviton cannon creates a distortion of the gravitational field changes dramatically weight goal. Based on similar engines antigravity machines principles. The ability to restore the fortifications after the fight is up to 70%.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
   <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	411 => 'Orbital base have monstrous power of defensive weapons, capable of destroying enemy ships anywhere on the battlefield. Demand for building highly gravitational technology.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>',
	412 => 'Lepton weapons planned to create as a technical device intended to influence the minds of people against their will. But at the last minute additions to the project introduced as a result of which the gun has become a formidable means of protecting the planet from possible aggression. Leptons Charged particles in contact with the aim of producing more damage in shields and armor fleets.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	413 => 'Proton gun when firing the projectile uses a proton inversion. The instrument requires long and cumbersome accelerators, which limits its placing large stationary installations. Particle beams are radiation danger for all living beings, and not radiation-resistant electronics in the vicinity of the point of destruction in the atmosphere, as well as close to the beam path.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	414 => 'The "Canyon" was launched to improve the graviton guns and was a complete success. The instrument requires a lot of energy and material costs, as well as highly-gravitational technology.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	415 => 'Quantum gun specifically designed for the destruction of the enemy fleet flagships, namely the main heavy vehicles. The principle of operation is based on the tools the substance goes from one thermodynamic phase to another when the magnetic field from the paramagnetic state to the ferromagnetic state is weak.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.',
	416 => 'Scientists recently demonstrated that it is possible to use deuterium as a weapon. Some time later, there was an instrument of Hydrogen. During contact with the skin or the shields of the ship, there is a momentum that undermines deuterium.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	417 => 'Dora Gun is the most powerful protection of the middle class. Because of its power, it can destroy enemy armadas by an electromagnetic pulse, but because of it, the gun overheats very quickly and requires a lot of energy, so they are placed in the mountains, and next to them, there is always a power plant.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>',
	418 => 'Photon cannon prototype was Proton gun. Photon cannon at its relatively low price and powerful volley fire, it has become indispensable for the global defense.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	419 => 'The emitter of particles - this is the result of long, painstaking work of scientists and engineers to create this type of defense. This is one of those not many kinds of multi-purpose protection of planet or moon that can repel almost all known types of ships. Its power lies in the combination of plasma, graviton and ion guns, into one powerful beam that is in contact with, the ship splits into particles.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
  <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>',
	420 => 'Megador Slim - propelled prime defense light class uses two types of weapons. It copes with light fleet types, including prime and M-7 fleet. Receives less damage from interplanetary missiles, performing well against the bombers, when compared with other lung defense class.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Receives 10% damage when attacking interplanetary missiles.</font>
  <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Light conveyor.</font>
  <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available with the purchase in the premium shop</font>',
	421 => 'Megador Iron - propelled prime defense of the middle class, uses three types of weapons. Effectively coping with an average fleet type, the only defense of the middle class has skorostrel against the Destroyer, also it has a good skorostrel against bombers. It receives less damage from interplanetary missiles, performing well against bombers and destroyers, when compared to other middle class defense.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Receives 15% damage when attacking interplanetary missiles.
 <br> <font color="#D2691E"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Medium conveyor.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available with the purchase in the premium shop</font>',
	422 => 'Megador Grand - propelled prime defense heavy class, uses three types of weapons. Effectively cope with an average fleet type, including the prime fleet of M-19. Receives less damage from interplanetary missiles, performing well against bombers and destroyers, when compared to other defense heavy class.
  <br><br>
  <span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Informacion util:</span><br>
  <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> After the battle, recovering 50-70% of losses. The percentage can be increased ability to pump "Mechanics" at the Academy </font>
 <br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Receives 20% damage when attacking interplanetary missiles.
 <br> <font color="#B22222"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Heavy conveyor.</font>
 <br><br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Available with the purchase in the premium shop</font>',
 
	502 => "Los misiles de intercepci&oacute;n destruyen los misiles interplanetarios. Cada mis&iacute;l de intercepci&oacute;n destruye un mis&iacute;l interplanetario.",
	503 => "Los misiles interplanetarios destruyen los sistemas de defensa del enemigo. Los sistemas de defensa destruidos por los misiles interplanetarios no ser&aacute;n reparados.",

	601 => 'El ge&oacute;logo es un experto en astrominerolog&iacute;a y astrocristalograf&iacute;a. Asiste a sus equipos en la metalurgia y qu&iacute;mica y tambi&eacute;n se encarga de las comunicaciones interplanetarias para optimizar el uso y refinamiento de la materia bruta a lo largo de todo el imperio.<br><br><span style="color:red">+%s%% Producción de Recursos. Nivel Máximo %s</span>',
	602 => 'El almirante es un veterano de guerra experimentado y un habilidoso estratega. En las batallas mas duras, es capaz de hacerse una idea de la situaci&oacute;n y contactar a sus almirantes subordinados. Un emperador sabio puede apoyarse en su ayuda durante los combates.<br><br><span style="color:red">+%s%% Escudos,Defensas y Ataque. Nivel Máximo %s </span>',
	603 => 'El Ingeniero es un especialista en la gesti&oacute;n de energ&iacute;a. En tiempos de paz, aumenta la energ&iacute;a de todas las colonias. En caso de ataque, garantiza el abastecimiento de energ&iacute;a a los ca&ntilde;ones, evitando una posible sobrecarga, lo que conduce a una reducci&oacute;n de defensas perdidas en batalla.<br><br><span style="color:red">+%s%% Energía. Nivel Máximo %s</span>',
	604 => 'El gremio de los tecn&oacute;cratas est&aacute; compuesto de aut&eacute;nticos genios, y siempre los encontrar&aacute;s en ese peligroso borde donde todo explotar&iacute;a en mil pedazos antes de poder encontrar una explicaci&oacute;n tecnol&oacute;gica y racional. Ning&uacute;n ser humano normal tratar&iacute;a jam&aacute;s descifrar el c&oacute;digo de un tecn&oacute;crata, con su presencia, inspira a los investigadores del imperio.<br><br><span style="color:red">-%s%% Tiempo Construcción de Naves. Nivel Máximo %s</span>',
	605 => 'El Constructor tiene alterado su ADN, uno solo de estos hombres puede construir una ciudad entera en poco tiempo.<br><br><span style="color:red">-%s%% Construcción de Edificios. Nivel Máximo %s</span>',
	606 => 'Los cient&iacute;ficos forman parte de un gremio concurrente al de los tecn&oacute;cratas. Ellos se especializan en la mejora de las tecnolog&iacute;as.<br><br><span style="color:red">-%s%% Tiempo de Investigación. Nivel Máximo %s</span>',
	607 => 'El Maestro del Almacén ha dominado el almacenaje de elementos valiosos y las habilidades de clasificación. A través de técnicas sofisticadas de almacenamiento y  ajustes estructurales puede aumentar el volumen útil de un espacio de almacenamiento de manera significativa.<br><br><span style="color:red">+%s%% Depósitos. Nivel Máximo. : %s</span>',
	608 => 'El defensor es un miembro del ej&eacute;rcito imperial. Abocarse en su trabajo le permite construir una formidable defensa en un breve periodo de tiempo.<br><br><span style="color:red">Construcción de defensas -%s%%. Nivel Máximo %s</span>',
	609 => 'El Protector ha realizado un impresionante trabajo para el Reino y por ello se le dio la oportunidad de ser Protector. El protector es el reconocimiento más importante dentro del Ejército Imperial en materia de Defensa<br><br><span style="color:red">Permite construír la Cúpula Grande de Protección. Nivel Máximo %s</span>',
	610 => 'El esp&iacute;a es una persona enigm&aacute;tica. Nadie nunca vio su verdadero rostro, la &uacute;nica forma ser&iacute;a asesinandol&oacute;. <br><br><span style="color:red">+%s Nivel de Espionaje. Nivel Máximo %s</span>',
	611 => 'El comandante forma parte del ej&eacute;rcito imperial ha dominado el arte del manejo de flotas. Su cerebro puede calcular las trayectorias de una gran cantidad de flotas.<br><br><span style="color:red">+%s Espacios de Flota. Nivel Máximo %s </span>',
	612 => 'El destructor es un miembro del ej&eacute;rcito imperial sin misericordia. Masacra todo lo que est&aacute; a su paso s&oacute;lo por placer. Actualmente est&aacute; desarrollando un nuevo m&eacute;todo de producci&oacute;n de las estrellas de la muerte.<br><br><span style="color:red">Construye 2 Estrellas de la Muerte por el precio de Una. Nivel Máximo %s </span>',
	613 => 'El general es una persona que ha servido desde hace muchos a&ntilde;os al ej&eacute;rcito imperial. Los fabricantes de naves producen naves m&aacute;s r&aacute;pidas si el lo pide.<br><br><span style="color:red">+%s%% Velocidad de las Naves. Nivel Máximo %s</span>',
	614 => 'El Conquistador posee cualidades innegables de la conquista. Es parte de la armada imperial, siendo el más alto nivel de educación que se puede alcanzar. Conoce como comandar la Estrella Negra.<br><br><span style="color:red">Permite usar la Estrella Negra. Nivel Máximo %s</span>',
	615 => 'Ha demostrado ser el más grande conquistador del universo. El universo es tuyo, siempre que se mantenga haciendo lo que se debe hacer.<br><br><span style="color:red">Aprueba la destrucción. Nivel Máximo %s</span>',

	701 => 'El bono es s&oacute;lo temporal.',
	702 => 'El bono es s&oacute;lo temporal.',
	703 => 'El bono es s&oacute;lo temporal.',
	704 => 'El bono es s&oacute;lo temporal.',
	705 => 'El bono es s&oacute;lo temporal.',
	706 => 'El bono es s&oacute;lo temporal.',
	707 => 'El bono es s&oacute;lo temporal. No afecta a las expediciones.',
);