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
	106 => '+%s do poziomu szpiegostwa',
	109 => '+%s%s na uzbrojenie',
	110 => '+%s%s na tarcze',
	111 => '+%s%s na zbroję',
	113 => '+%s%s do produkcji energii',
	115 => '+%s%s prędkości silnika Jet',
	117 => '+%s%s prędkości z silnika impulsowego',
	118 => '+%s%s szybkości od silnika varp',
	120 => '+%s%s obrażeń dla broni laserowej',
	121 => '+%s%s do obrażeń od Ion Weapon',
	122 => '+%s%s obrażeń od broni plazmowej',
	199 => '+%s%s obrażeń od karabinów grawitacyjnych',
	//NOUVEAU
	101 => '+%s do gniazd flot', 
	102 => '+%s%s na kopalnię',
	103 => '+%s do maksymalnej liczby planet',
	104 => '+%s nauki na potrzeby badań nad rozwojem Sojuszu',
	105 => '+%s%s do prędkości lotu',
	112 => '+%s odejścia naukowe do sojuszu',
	116 => '+%s%s prędkości z silnika jonowego',
	124 => '+%s maksymalnych punktów floty w Expedition <br>+%s%s do prawdopodobieństwa utraty floty',
	141 => '+%s%s na lekką zbroję',
	142 => '+%s%s do średniej zbroi',
	143 => '+%s%s na Heavy Armor',
	144 => '+%s%s wzrost pomyłek',
	151 => '+%s%s szans na poszukiwania Star Trek',
	152 => '+%s%s szansy na znalezienie Dark Matter',
	153 => '+%s%s w przypadku poszukiwania floty',
	154 => '+%s liczba wypraw',
	155 => '+%s%s redukcja niedociągnięć',
	156 => '+%s%s szansa na znalezienie aktualizacji <br> Minimalna wielkość floty wynosi %s punktów',
	157 => '+%s%s szansa na znalezienie uaktualnienia <br> Minimalna wielkość floty wynosi %s punktów',
	158 => '+%s%s szansa na znalezienie aktualizacji <br> Minimalna wielkość floty wynosi %s punktów',
	165 => '+%s%s w celu oszczędzania silników',
	171 => '+%s%s do ekranów świetlnych <br>+%s%s do odzyskiwania ekranów świetlnych',
	172 => '+%s%s na średnie tarcze <br>+%s%s w celu odzyskania średniej tarczy',
	173 => '+%s%s na Heavy Shields <br>+%s%s na Heavy Shield Restoration',
	174 => '+%s%s, aby przywrócić tarcze',
);
$LNG['shortNames'] = array (
	202 => 'Mały Tranporter',
	203 => 'Duży Tranporter',
	208 => 'Statek Kolonialny',
	209 => 'Recykler',
	210 => 'Sonda Szpiegowska',
	212 => 'Satelita Słoneczny',
	214 => 'Gwiazda śmierci',
	217 => 'Giga Transporter',
	219 => 'Giga-Recycler',
	220 => 'Inter. DM-Collector',
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

	401 => 'Wyrzutnia Rakiet',
	402 => 'L. Laser',
	403 => 'C. Laser',
	404 => 'Działo Gauss',
	405 => 'Działo Jonowe',
	406 => 'Działo Plazmowe',
	407 => 'M. Osłona',
	408 => 'D. Osłona',
	409 => 'Giga Osłona',
	410 => 'Działo Grawitonowe',
	411 => 'Orb. Plat.Obr',
	412 => 'Lepton Gun',
	413 => 'Proton Gun',
	414 => 'Kanion',
	415 => 'Działo kwantowe',
	416 => 'Działa wodorowe',
	417 => 'Dora Cannon',
	418 => 'Fotonowe działo',
	419 => 'Emiter cząstek',
	420 => 'DX-100',
	421 => 'DX-200',
	422 => 'DX-300',
	423 => 'Gatling Cannon',
	443 => 'DX-BOB',
	430 => 'Sentinel',
	434 => 'Armageddon Cannon',
	435 => 'Kompleks Prometey'
);

$LNG['bonus'] = array(
	'Attack'			=> 'Atak',
	'Defensive'			=> 'Obrona',
	'Shield'			=> 'Osłona',
	'BuildTime'			=> 'Czas budowy',
	'ResearchTime'		=> 'Czas badań',
	'ShipTime'			=> 'Czas budowy okrętów',
	'DefensiveTime'		=> 'Czas budowy obrony',
	'Resource'			=> 'Prędkość wydobycia',
	'Energy'			=> 'Produkcja energii',
	'ResourceStorage'	=> 'Wielkość magazynów',
	'ShipStorage'		=> 'Ładowność floty',
	'FlyTime'			=> 'Czas lotu',
	'FleetSlots'		=> 'Ilość możliwych flot',
	'Planets'			=> 'Ilość planet',
	'SpyPower'			=> 'Moc szpiegowania',
	'Expedition'		=> 'Ekspedycje',
	'GateCoolTime'		=> 'Czas ładowania teleportera',
	'MoreFound'			=> 'Zasoby znajdowane podczas ekspedycji',
);
					
$LNG['tech'] = array(
	0 => 'Budynki',
  	1 => 'Kopalnia Metalu',
  	2 => 'Kopalnia Kryształu',
  	3 => 'Ekstraktor Deuterium',
  	4 => 'Elektrownia Słoneczna',
  	6 => 'Uniwersytet',
 	12 => 'Elektrownia Jądrowa',
 	14 => 'Fabryka Robotów',
 	15 => 'Fabryka Nanitów',
 	16 => 'Spaceport',
 	21 => 'Stocznia',
 	22 => 'Magazyn Metalu',
 	23 => 'Magazyn Kryształu',
 	24 => 'Zbiornik Deuterium',
 	31 => 'Laboratorium Badawcze',
 	33 => 'Terraformer',
 	34 => 'Depozyt sojuszniczy',
 	44 => 'Silos Rakietowy',
	40 => 'Budynki Księżycowe',
 	41 => 'Baza Księżycowa',
 	42 => 'Falanga',
 	43 => 'Teleporter',

	100 => 'Badania',
	106 => 'Technologia Szpiegowska',
	108 => 'Technologia Komputerowa',
	109 => 'Technologia Broni',
	110 => 'Technologia Osłony',
	111 => 'Technologia Opancerzenia',
	113 => 'Technologia Energetyczna',
	114 => 'Technologia Nadprzestrzenna',
	115 => 'Napęd spalinowy',
	117 => 'Napęd Impulsowy',
	118 => 'Napęd Nadprzestrzenny',
	120 => 'Technologia Laserowa',
	121 => 'Technologia Jonowa',
	122 => 'Technologia Plazmowa',
	123 => 'Intergalaktyczna Sieć Badań',
	131 => 'Technologia Produkcji Metalu',
	132 => 'Technologia Produkcji Kryształu',
	133 => 'Technologia Produkcji Deuterium',
	199 => 'Rozwój Grawitonów',
	//NOUVEAU
	101 => 'Mikroprocesory',
	102 => 'Górnictwo',
	103 => 'Kolonizacja',
	104 => 'Link Alliance',
	105 => 'Silniki',
	116 => 'Silnik jonowy',
	124 => 'Wyprawa',
	141 => 'Lekka zbroja',
	142 => 'Średnia zbroja',
	143 => 'Ciężka zbroja',
	144 => 'Aktywna pancerza',
	151 => 'Star Trek wyszukuje',
	152 => 'Wyszukiwarka Mrocznych Materii',
	153 => 'Szukaj floty',
	154 => 'Astrofizyka',
	155 => 'Dokładne strzały',
	156 => 'Agresja Barbarzyńców',
	157 => 'Agresja Piraci',
	158 => 'Agresja Pradawnych',
	165 => 'Zapisywanie silników',
	171 => 'Lekkie tarcze',
	172 => 'Średnie tarcze',
	173 => 'Ciężkie Odbudowa tarcz',
  
	200 => 'Statki',
	202 => 'Mały Tranporter',
	203 => 'Duży Tranporter',
	208 => 'Statek Kolonialny',
	209 => 'Recykler',
	210 => 'Sonda Szpiegowska',
	212 => 'Satelita Słoneczny',
	214 => 'Gwiazda śmierci',
	217 => 'Giga Transporter',
	219 => 'Giga-Recycler',
	220 => 'Inter. DM-Collector',
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

	400 => 'Obrona Planetarna',
	401 => 'Wyrzutnia Rakiet',
	402 => 'Lekki Laser',
	403 => 'Ciężki Laser',
	404 => 'Działo Gauss',
	405 => 'Działo Jonowe',
	406 => 'Działo Plazmowe',
	407 => 'Mała Osłona',
	408 => 'Duża Osłona',
	409 => 'Atmospheric Shield',
	410 => 'Działo Grawitonowe',
	411 => 'Orbitalna Platforma Obronna',
	412 => 'Lepton Gun',
	413 => 'Proton Gun',
	414 => 'Kanion',
	415 => 'Działo kwantowe',
	416 => 'Działa wodorowe',
	417 => 'Dora Cannon',
	418 => 'Fotonowe działo',
	419 => 'Emiter cząstek',
	420 => 'DX-100',
	421 => 'DX-200',
	422 => 'DX-300',
	423 => 'Gatling Cannon',
	443 => 'DX-BOB',
	430 => 'Sentinel',
	434 => 'Armageddon Cannon',
	435 => 'Kompleks Prometey',

	500 => 'Rakiety',
	502 => 'Antyrakieta',
	503 => 'Rakieta Międzyplanetarna',

	600 => 'Oficerowie',
601 => 'Geolog',
602 => 'Admirał',
603 => 'Inżynier',
604 => 'Technokrata',
605 => 'Konstruktor',
606 => 'Naukowiec',
607 => 'Magazynier',
608 => 'Minister Obrony',
609 => 'Guardian',
610 => 'Szpieg',
611 => 'Commander',
612 => 'Niszczyciel',
613 => 'Generał',
614 => 'Zdobywca',
615 => 'Imperator',

	700 => 'Premium dodatki',
	701 => 'Optymalizacja Broni',
	702 => 'Optymalizacja Osłony',
	703 => 'Koorydynator Budowy',
	704 => 'Optymalizacja Zasobów',
	705 => 'Optymalizacja Energii',
	706 => 'Optymalizacja Badań',
	707 => 'Koordynacja Floty',
	
	900 => 'Zasoby',
	901 => 'Metal',
	902 => 'Kryształ',
	903 => 'Deuterium',
	911 => 'Energia',
	921 => 'Dark Metter',
);

$LNG['shortDescription'] = array(
	1 => 'Wydobywa Metal, kopalnie metalu mają podstawowe znaczenie dla twojego imperium!',
	2 => 'Wydobywa Kryształ, potrzebny do budowy komponentów elektronicznych!',
	3 => 'Deuterium jest wydobywane przez ekstraktor, służy jako paliwo oraz materiał budowlany.',
	4 => 'Elektrownia słoneczna pobiera energie ze słońca. Wszystkie budynki wymagają energii!',
	6 => 'Z każdym poziomem skraca czas badań o 8%.',
	12 => 'Reaktor fuzyjny, dzieki fuzji deuteru, wytwarza energię!',
	14 => 'Fabryka Robotów przyspiesza budowę. Im wyższy poziom, tym krócej trwa budowa i ulepszanie budynków.',
	15 => 'Zwięczenie rozwoju robotyki. Każdy poziom zwiększa szybkość budowy statków, instalacji obronnych i budynków!',
	16 => 'Chcesz sprzedawać zasoby na rynku lub zainwestować je w system banków sojuszniczych.',
	21 => 'W stoczni budujesz instalacje obronne oraz wszystkie typy stacji. Im wyższy poziom, tym szybciej się je buduje!',
	22 => 'Zwiększa ilość przechowywanego metalu.',
	23 => 'Zwiększa ilość przechowywanego kryształu.',
	24 => 'Zwiększa ilość przechowywanego deuterium',
	31 => 'Konieczne do tego, by móc odkrywać nowe technologie.',
	33 => 'Terraformer przez terraforming zwiększa ilość dostępnych pól do zabudowy na planecie.',
	34 => 'Zasila w paliwo sojusznicza flotę na orbicie.',
	41 => 'Jako iż na księżycu nie ma atmosfery, musisz najpierw zbudować bazę księżycową.',
	42 => 'Falanga pozwala obrserwować aktywne floty w jej zasięgu. Każdy level zwiększa maksymalny zasięg.',
	43 => 'Teleporter pozwala przenosić floty bez staraty cennego czasu!.',
	44 => 'Używane do przechowywania rakiet i antyrakiet.',

	106 => 'Dzięki tej technologi mogą być zbierane informacje o innych planetach i księżycach.',
	108 => 'Dzięki rozwojowi technologi komputerowej możesz zarządzać większą ilością flot. Każdy level zwiększa ilość flot, którymi możesz zarządzać, o 1 jednostkę.',
109 => 'Technologia broni podnosi efektywność używania broni. Każdy level zwiększa obrażenia o 10% wartości bazowej.',
110 => 'Technologia osłony podnosi efektywność wykorzystania osłon statków, jak również ich struktur obronnych. Każdy level zwiększa siłę osłony o 10% wartości bazowej!.',
111 => 'Specjalne stopy metalu zwiększają wytrzymałość opancerzenia. Każdy level zwiększa wytrzymałość opancerzenia o 10% wartości bazowej.',
	113 => 'Znajomość wielu różnych rodzajów energii jest potrzebna dla nowych technologii.',
114 => 'Z połączenia 4 i 5 wymiaru udało się stworzyć napęd znacznie szybszy i bardziej efektywny.',
115 => 'Dalsze rozwijanie tego napędu sprawia, iż niektóre statki poruszają się 10% szybciej w porównaniu do prędkości bazowej.',
	117 => 'Dalsze rozwijanie tego napędu sprawia, iż niektóre statki poruszają się o 20% szybciej w porównaniu do prędkości bazowej.',
118 => 'Napęd nadprzestrzenny zagina przestrzeń wokół statku. Dalszy rozwój tego napędu sprawia, iż niektóre statki poruszają się o 30% szybciej w porównaniu do prędkości bazowej.',
120 => 'Poprawa koncentracji wiązki światła sprawia, iż zadaje ona obrażenia.',
	121 => 'Działo jonowe przyśpiesza jony. Dzięki temu podczas uderzenia w obiekt wyrządzają one duże szkody.',
122 => 'Zwięczenie technologii jonowej. Jony są tak przyspieszone, iż wiązka zmienia się w plazmę. Zadaje olbrzymie obrażenia podczas uderzenia w cel.',
123 => 'Naukowcy z różnych planet komunikują się ze sobą przez tę sieć. Wraz z rozbudową na kolejny poziom, do sieci zostanie przyłączone dodatkowe laboratorium, przy czym przyłączane będą zawsze laboratoria o najwyższym poziomie.',
124 => 'Moduł astrofizyczny pozwala zbierać dane podczas lotu floty. Zwiększając level zyskujesz możliwość kolonizacji wiekszej ilości planet.',
	131 => 'Zwiększa produkcję metalu o 2%.',
132 => 'Zwiększa produkcję kryształu o 2%.',
133 => 'Zwiększa produkcję deuterium o 2%.',
	199 => 'Skoncentrowane cząstki grawitonowe tworzą sztuczne pole grawitacji, które wciąga wszystko w siebie jak czarna dziura. Pole jest tak potężne, że może zniszczyć księżyc.',
	
	202 => 'Mały transportowiec służy do szybkiego transportu surowców na pobliskie planety.',
203 => 'Duży transportowiec może zabrać nie tylko więcej surowców, ale również - dzięki lepszemu napędowi - jest znacznie szybszy.',
204 => 'Jest to pierwsza jednostka wojskowa, którą możesz zbudować. W początkowej fazie gry przydają się, by napadać pobliskie planety posiadające niewielką obronę. Mimo tego, że są stosunkowo słabe, są tanie, a icg duża ilość potrafi być groźna.',
205 => 'Następca lekkiego myśliwca, lepiej uzbrojony i opancerzony.',
206 => 'Krążownik nie dość, że dużo lepiej opancerzony od myśliwców, to jest jeszcze znacznie szybszy.',
207 => 'Okręty wojenne to trzon każdej floty. Ich ciężkie działa, duża szybkość i ładowność sprawia, że są niezastąpione.',
208 => 'Niezamieszkane planety skolonizujesz za pomocą tego statku.',
209 => 'Recyklery - jak nazwa wskazuje - zbierają złom, który powstaje po walkach flot.',
210 => 'Sondy szpiegowskie to małe, bezzałogowe, bardzo szybkie stateczki, które przekazują dane na temat wroga.',
211 => 'Bombowce służą do niszczenia obrony na planecie.',
212 => 'Satelity słoneczne to małe kolektory energii krążące na wysokiej orbicie. Przekazują energię na planetę za pomocą wiązki lasera.',
213 => 'Niszczyciel to król statków wojennych.',
214 => 'Niszczycielska siła gwiazd śmierci nie ma sobie równych. Jest tak duża, że może niszczyć księżyce.',
215 => 'Ten typ statku ma tylko jeden cel - przechwycić i zniszczyć wrogą flotę.',
216 => 'Następca Gwiazdy śmierci. Szybszy, ale nie tak potężny.',
217 => 'Powstał dzięki potrzebie transportu większych ładunków i szybszego transportu.',
218 => 'Można powiedzieć, iż to przedstawiciel koszmaru na tym świecie, niestety strasznie powolny.',
219 => 'Ogromna ładowność, a dzięki nowym technologiom porusza się znacznie szybciej od standardowego recyklera .',
220 => 'Po długich latach badań nad Dark metter można go teraz pozyskać z księżyców.',

	401 => 'Wyrzutnia rakiet to podstawowa struktura obronna, tania i efektywna.',
402 => 'Wiązki laserowe - dzięki specjalnym systemom namierzania i podążania za celem - są kierowane tak, by przebijać kadłub.',
403 => 'Ciężki laser to ulepszona wersja lekkiego.',
404 => 'Działo Gaussa strzela ogromnymi metalowymi pociskami, siejącymi straszne zniszczenia.',
405 => 'Działo jonowe strzela skoncentrowaną wiązką jonów naładowanych dodatnio lub ujemnie.',
406 => 'Działo plazmowe, z powodu jego zapotrzebowania na energię, jest zasilane dużym reaktorem jądrowym.',
407 => 'Mała osłona roztacza nad planetą zabezpieczenie, które pochłania część obrażeń.',
408 => 'Jest to silniejsza wersja małej osłony, niestety wymaga również więcej zasobów energii.',
409 => 'Szczyt badań nad osłonami. Jest dużo bardziej wytrzymała niż duża, ale jej zapotrzebowanie na energię też jest duże!.',
410 => 'Po latach badań nad grawitonami stworzono działo strzelające polem elektormagnetycznym, wyrządzającym znaczne szkody.',
411 => 'To nieruchoma stacja obronna, niepotrzebująca zasilania z zewnątrz. Jej budowa wymaga znacznych ilości energii.',

	502 => 'Antyrakiety przechwytują rakiety międzyplanetarne przeciwnika.',
503 => 'Międzyplanetarne rakiety. Ich jedynym celem jest niszczenie obrony przeciwnika.',

	601 => 'Geolog to specjalista od astro-minerologii i krystalologii. Jego działania odczuwa się w całym imperium.',
	602 => 'Admirał to stary i doświadczony weteran. Mądry imperator mógł liczyć na jego pomoc w walce.',
	603 => 'Inżynier to specjalista w zarządzaniu energią. W czasie pokoju i wojny zwiększa jej produkcję w całym imperium.',
	604 => 'Cech technokratów to naukowcy-geniusze. Swoją obecnością wpływają na innych naukowców, poprawiając sprawność ich pracy.',
	605 => 'To ludzie ze zmienionym DNA. Już 1 potrafi zbudować całe miasto.',
	606 => 'Naukowcy to część cechu technokratów. Specjalizują się w poprawie technologii.',
	607 => 'Magazynier to członek starożytnego bractwa z planety Hsac. Jego dewizą jest zdobycie i maksymalne wykorzystanie dostępnego miejsca!',
	608 => 'Członek armii cesarskiej. Dzięki temu, iż jest skupiony na swojej pracy, może zbudować wspaniałą obronę w krótkim czasie.',
	609 => 'Jego celem jest opracowanie i poprawa technologii obronnych.',
	610 => 'To bardzo tajemniczy człowiek i tak naprawdę nikt nie wie, kim jest ani jak wygląda.',
	611 => 'Dowódca jest częścią armii cesarskiej. Dzięki opanowaniu sztuki zarządzania flotą, jest w stanie bez pomocy komputera obliczyć trajektorię, czas przylotu itd.',
	612 => 'Człowiek bez litości. Doskonały do planowania masowych zniszczeń.',
	613 => 'Stary i doświadczony weteran będący od wielu lat członkiem armii cesarskiej.',
	614 => 'Członek cesarskiej armii. Jego zdolności to nawigacja flotą - jest w tym niezastąpiony.',
	615 => 'Pod jego dowództwem znajdują się wszyscy inni oficerowie. To on decyduje, kto i kiedy wspiera Cię w tworzeniu Imperium, jakiego świat nie widział!',

	701 => 'Podnosi na jakiś czas zdolność ataku i obrony statków.',
702 => 'Podnosi na jakiś czas siłę osłony i obrony.',
703 => 'Podnosi na jakiś czas prędkość powstawania budowli.',
704 => 'Podnosi na jakiś czas prędkość wydobywania surowców.',
705 => 'Podnosi na jakiś czas produkcję energii.',
706 => 'Skraca na jakiś czas długość badań.',
707 => 'Skraca czas lotu floty. Bonus działa tylko przez pewien okres i nie ma wpływu na ekspedycję!',
);

$LNG['longDescription'] = array(
	1 => 'Metal is a fundamental resource, invested in the foundation of your empire. With the increase in production of metal produced more products for use in construction of buildings, ships and missile systems and research. Deep mines require more energy to maximize production of the metal. Since the metal is the most common of all available resources, its cost is considered to be the lowest of all the resources for trade and exchange.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Metal mines. Extraction increases with increasing level.</font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For work requires energy.</font>',
	2 => 'Crystals are the main resource for the creation of technology and electronics, and crystal and metal compounds, used for alloy shields and armor. Compared with the metal extraction process for obtaining crude crystal structures on an industrial scale, it requires much more energy to handle them. The development of vessels and facilities, as well as specialized research updates also require a certain amount of crystals.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Crystal produces. Extraction increases with increasing level.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For work requires energy.</font>',
	3 => 'Deuterium is also called heavy hydrogen. It is a stable isotope of hydrogen contained in the planet\'s oceans. Special synthesizers separate water from deuterium using nano-centrifuges. Update synthesizer allows you to increase the amount of deuterium, which is used during the scanning sensor phalanx, viewing galaxies, as fuel for ships and used for the majority of buildings and research.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Deuterium mines. Extraction increases with increasing levels.</font>
	<br> <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Production increases with a decrease in temperature on the planet.</font><font color="#BC8F8F"></font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For work requires energy</font><font color="#BC8F8F">.</font>',
	4 => 'Giant solar panels used to generate electricity for the mines and the deuterium synthesizer. Increasing the surface area of the photovoltaic cells, increases the energy output of the power grids of your planet.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It produces energy. Energy production increases with the level.</font>',
	6 => 'Technopolis aims to strengthen the innovation process through the regional centers for the development and production development of high technological level. Each level increases the speed of Technopolis research at 16%, which is important at the higher stages of research.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates research study by 16% per level</font>',
	7 => 'The Xerium Dock offers the chance to repair ships that have become a wreckage through the course of a battle. This can be completed with more favourable conditions than a new construction in the shipyard and has a maximum repair time of 48 hours.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> From the time a wreckage is created there is 2 days to commence with the repairs.</font><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> The repaired ships then have to actively be placed back in service once the repair is completed.</font><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> If this does not happen, they will automatically go back into service after 2 days pass.</font>',
	12 => 'In fusion power plants, hydrogen nuclei fuse into helium nuclei under enormous temperature and pressure, releasing tremendous amounts of energy. During the growth leveled reactor systems, uses more of deuterium, which leads to an increase in energy production per hour. Energy effect can be increased by studying energy technology.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It produces energy. Energy production increases with the level.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It requires Deuterium</font>',
	14 => 'Robots factory used for the production of modern robotics. Each new level of the factory leads to the creation of faster robots that reduce the time required for the construction of buildings.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Speeds construction of buildings and combat units each level by 10%.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up research studies</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up the construction of fast units.</font>',
	15 => 'Nanite factory - a mechanical or electromechanical device whose dimensions are measured in nanometers. Microscopic nano machines are the ultimate evolution in robotics. After the completion of each level of the factory reduced production time for buildings, ships and defensive structures twice.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Speeds construction of buildings and combat units each level by 50%.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up research studies</font>
    <br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up the construction of fast units.</font>',
	16 => 'You want to sell resources in the market or invest them in an alliance bank system.',
	21 => 'Planetary shipyards responsible for the construction of spacecraft and defense systems. By increasing the level of the shipyard can produce a wider range of vehicles and combat ships at a much greater speed. Using the shipyard together with a factory nanites dramatically reduces construction time Kosmoflot.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It opens up the possibility for the construction of new units. 
	<br><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> With each level speeds up the production of units by 10%</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up the construction of fast units.</font>',
	22 => 'This store is used for storing the metal ores. Each level of modernization increases the amount of ore which can be stored. If the storage capacity is exceeded, the production of metal automatically stops to prevent a catastrophic collapse in the mines mines.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to store metal. With each level of the storage increased by 2 times.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If the store is filled with resource development stops</font>',
	23 => 'Untreated crystal stored in buildings of this type. With each level of storage, an increasing number of crystal that will be saved. Once production exceeds the allowable capacity of the crystal production stops automatically to prevent a collapse in mines.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Used to store crystal. With each level of the storage increased by 2 times.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If the store is filled with resource development stops</font>.',
	24 => 'Designed for storage of newly synthesized deuterium. After processing in the synthesizer, deuterium through the pipes flows into the reservoir for later use. With each level of construction total storage capacity increases. Once reached a critical point, the synthesizer is turned off to prevent rupture of the vessel.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Used to store deuterium. With each level of the storage increased by 2 times.</font>
	<br><font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If the store is filled with resource development stops</font>.',
	31 => 'An important part of any empire is a research laboratory, where improving the old and learn new scientific discoveries. With each level of construction, the speed with which new technologies are investigated increases. To conduct the study as soon as possible, scientists Empire sent to this planet. Thus, knowledge about new technology are easily spread throughout the empire.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Provides access to the study of new technologies. With each level speeds up the study of technologies 10%</font>
	<br><font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span> Provides access to the study of new technologies.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not speed up construction.</font>',
	33 => 'With the constant increase in the size of the colony, there was a problem ... How can we continue to work on an overpopulated planet and survive? Increasing the capacity of mining operations and atmospheric pollution may soon destroy the planet and kill every living thing on it. Scientists have developed a method to create huge masses of additional vital space with the help of nano-machines. It requires huge amounts of energy.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It increases the number of available fields on the planet by 7.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	One field is used for the terraformer</font>',
	34 => 'Warehouse Alliance provides fuel-friendly fleet, which may be on the low orbit on hold. The level determines the maximum number of stock at the same time the fleets involved in the defense of the planet. Increased retention times of fleets leads to increased fuel consumption.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It allows you to put hold on your planet. Each level increases the maximum number of the fleet and its retention time</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	If you hold a fleet consumes deuterium</font>',
	41 => 'Because the moon has no atmosphere, then, for the existence of the staff, it was built closed dome. Moon Base produces oxygen, heat and gravity, creating conditions for the life of the colonists. With each level of development, the living space of the biosphere is increased by three units.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It increases the number of available fields on the moon by 3 per level</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	One box holds itself Moon Base</font>',
	42 => 'At the heart of a phalanx of high-resolution sensors are used analyzing the spectrum of light, the composition of gases and radiation emissions of distant worlds, with subsequent transfer of the information to be processed in a supercomputer. On the difference changes in the gas composition and the presence of radiation and calculated the fleet within range of the phalanx. To avoid overheating during scanning phalanx used a certain amount of deuterium.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	He sees the movement of enemy fleets. <br> Increases the range of the following formula: (level of the phalanx) ^ 2 - 1.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	To work requires Deuterium.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Do not see the recalled deploiements</font>',
	43 => 'Jump gate or teleport is a system of giant transceivers intended for the administration of any fleets in the receiving gateway to anywhere in your empire almost instantly. Using technology similar to the splitting of the atom\'s nucleus, to achieve the jump, deuterium - not required. Regeneration and cooling of the gate after the jump takes at least an hour, with increasing levels of teleport - time is reduced. Transportation resources through the gate - is impossible.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It gives the ability to instantly teleport from one fleet to another moon. With each level, and cooldown reduced by 6 minutes </font>(min time 6 minutes)<br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	For teleportation, you need to build a teleport at least two moons</font>',
	44 => 'Missile Silos used for building, storing and running four or twelve interplanetary missile interceptors. With each level of the mine, in proportion to the number of missiles increases. Storage interplanetary missiles and interceptor missiles in the same silo is allowed.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It allows you to build interplanetary missiles and interceptor missiles. Each level increases the maximum possible number of missiles.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Interceptor missiles is possible to build 2 times more than interplanetary rocket at the same level missile silo.</font>',
	69 => 'After years of study of antimatter, scientists finally have invented a way to create the dark matter. It lies in the acceleration of antimatter in the collider. But the collider interfere with the planet\'s atmosphere, so it was decided to build it on the moon, where the is no atmosphere.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	It produces dark matter on the basis of the mine.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	With the destruction of the moon, Collider, destroyed along with it.</font>',
	71 => 'Light conveyor built for continuous construction of a light fleet and defense, taking into account technology and sequence of assembly units of 8 vessels per second. Produced: Small vehicles, large transport, Light Fighter, Heavy Fighter, Recycler, rocket launchers, light laser, heavy laser.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
    <font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Remove the limit of 1 unit per second during the construction of the fleet and defense. </font><br>
    <font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates construction only planet where he built a conveyor.</font>',
	72 => 'Middle conveyor considerably increases productivity and defense fleet average to 5 units per second by changing the routine, monotonous work, ultra-precise machines. Produced: Cruiser, Battleship, Bomber, Destroyer, Battlecruiser, improving transport, Mega processor, Gauss, ion cannon, plasma cannon, hydrogen weapon, dora gun.
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Remove the limit of 1 unit per second during the construction of the fleet and defense.</font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates construction only planet where he built a conveyor.</font>',
	73 => 'Heavy conveyor was built after the introduction of redirecting the output of one program to the input of another process that has allowed to build 2 units of heavy naval and defense in a moment more. Produced: Death Star, Supernova, Avatar, Battleship class ONill, Flying death, Galleon, destroyer, frigate, black wanderer graviton weapon, leptons gun Proton cannon Canyon, photon cannon, particle emitter. 
	<br><br>
	<span style="line-height: 17px; color:#3399CC;"><span style=" margin-left:0px; margin-right:4px; cursor:default; float:left;" class="interrogation">i</span> Helpful information:</span><br>
	<font color="#00FF00"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Remove the limit of 1 unit per second during the construction of the fleet and defense. </font><br>
	<font color="#BC8F8F"><span style=" margin-left:9px; margin-right:4px; cursor:default; float:left;">•</span>	Accelerates construction only planet where he built a conveyor.</font>',
	
	106 => 'Od poziomu tej technologii zależy, jakie dane uda Ci się zebrać o twoim celu. Jeśli przeciwnik ma większy level technologii szpiegowskiej, wtedy musisz wysłać więcej sond, by uzyskać maksymalną ilość danych na temat twojego przeciwnika. Większa ilość sond zwiększa szansę ich wykrycia i zniszczenia. Od poziomu 2 dostaniesz informacje ile jednostek cię atakuje, od levelu 4 dowiesz się również jakie typy statków, a od levelu 8 informacje będą pełne, czyli ile i jakie typy statków są agresorami.',
	108 => 'Ta technologia kontroluje dokładne czasy przylotu, trajektorię lotu itp. Każda flota, którą wyślesz, zajmuje część zasobów(slot). Powinieneś stale rozwijać tą technologię, by móc wysyłać więcej flot jednocześnie.',
	109 => 'Kluczowa technologia bojowa. Każdy level zwiększa skuteczoność stystemów bojowych o 10% wartości bazowej!',
	110 => 'Kolejna technologia bojowa. Każdy level zwiększa skuteczność systemów osłon o 10% wartości bazowej.',
	111 => 'Technologia cywilno-bojowa. Opancerzenie chroni w przestrzeni przed promieniowaniem, jak również zmniejsza szkody podczas walki. Z każdym levelem zwiększa się jakość stopów metalu, jak i jego rodzaj, co skutkuje wzrostem wytrzymałości pancerza o 10% wartości podstawowej.',
	113 => 'Wszystko co budujesz, poczynając od struktur obronnych, budynków i statków, wymaga energii. Wraz z rozwojem tej technologii możesz używać i produkować bardziej zaawansowane jednostki, wymagające różnych rodzajów energii.',
	114 => 'Teoria podróży nadprzestrzennych opiera się na istnieniu wymiarów przyległych. A lot wygląda tak, iż w jednym miejscu statek wchodzi w nadprzestrzeń, a w innym wychodzi, co zajmuje znacznie mniej czasu niż tradycyjny lot. Wraz z rozwojem tej technologii teoria zmiania się w praktykę.',
	115 => 'Mimo iż to stara technologia, wciąż jeszcze jest używana. Każdy poziom rozwoju tej technologi skutkuje zwiększeniem prędkości statków korzystających z tego typu napędu o 10% wartości bazowej. Mały transporter, duży transporter, sonda szpiegowska, jak i lekki myśliwiec korzystają z tej technologii.',
	117 => 'Napęd ten zazwyczaj składa się z rekatora, zespołu przetworników i dyszy napędowej. Dzieki zmieniszeniu strat między reaktorem a dyszami i usprawnieniu pracy przetworników, statki korzystające z tego typu napędu mogą poruszać się 20% szybciej predkości bazowej. Jako, iż ten napęd jest również używany do napędzania rakiet międzyplanetarnych, każdy level zwiększa ich zasięg. Bąmbowiec, krążownik, ciężki myśliwiec i kolonizator korzystają z tego napędu.',
	118 => 'Wraz z rowojem technologi nadprzestrzennej powstał właśnie taki oto napęd, który zakrzywia czasoprzestrzeń wokół jednostki. Dzieki wypaczeniu czasoprzestrzeni podróż na odległość 1000 lat świetlych została skrócona zaledwie do godziny. Każdy level zwiększa predkość statków korzystających z tego napędu o 30% wartości bazowej.',
	120 => 'Lasery są używane w bardzo wielu dziedzinach w twoim imperium, poczynając od komunikacji, gdzie komputery przekształcają wiązkę w czytelny sygnał, po przekazywanie energii na planetę, a kończąc na takim skoncentrowaniu wiązki, by była mordercza.',
	121 => 'Skoncentrowana wiązka jonów rozpędzona przez akcelelatory wyrządza znaczne szkody przy uderzeniu w cel.',
	122 => 'Na świecie są 4 stany skupienia: stały, ciecz, gaz i plazma. Technologia plazmowa to zwieńczenie technologii jonowej, gdzie poprzez dalszy rozwój akcelalatorów i ściśnięcie atomów powstaje plazma, która uderzając w cel wyrządza ogromne szkody.',
	123 => 'Naukowcy z różnych planet komunikują się ze sobą przez tę sieć. Wraz z rozbudową na kolejny poziom, do sieci zostanie przyłączone dodatkowe laboratorium, przy czym przyłączane będą zawsze laboratoria o najwyższym poziomie.',
	124 => 'Moduł astrofizyczny pozwala zbierać dane podczas lotu floty. Zwiększając level, zyskujesz możliwość kolonizacji wiekszej ilości planet. Każde 2 poziomy zwiększają maksymalną ilość planet o 1. Poza tym astrofizyka zwiększa również ilość ekspedycji (30 poziom to 5 ekspedycji!).',
	131 => 'Zwiększa produkcję metalu o 2%.',
	132 => 'Zwiększa produkcję kryształu o 2%.',
	133 => 'Zwiększa produkcję deuterium o 2%.',
	199 => 'Grawiton to cząstka elementarna, która pośredniczy w tworzeniu grawitacji w ramach kwantowej teorii pola. Grawitony są cząstkami, które same w sobie nie mają masy. Rozwój grawitonów jest potrzebny tylko dla jednej technologii - pozwala budować Gwiazdę śmierci!',
	//NOUVEAU
	101 => 'Mikroprocesory',
	102 => 'Górnictwo',
	103 => 'Kolonizacja',
	104 => 'Link Alliance',
	105 => 'Silniki',
	116 => 'Silnik jonowy',
	124 => 'Wyprawa',
	141 => 'Lekka zbroja',
	142 => 'Średnia zbroja',
	143 => 'Ciężka zbroja',
	144 => 'Aktywna pancerza',
	151 => 'Star Trek wyszukuje',
	152 => 'Wyszukiwarka Mrocznych Materii',
	153 => 'Szukaj floty',
	154 => 'Astrofizyka',
	155 => 'Dokładne strzały',
	156 => 'Agresja Barbarzyńców',
	157 => 'Agresja Piraci',
	158 => 'Agresja Pradawnych',
	165 => 'Zapisywanie silników',
	171 => 'Lekkie tarcze',
	172 => 'Średnie tarcze',
	173 => 'Ciężkie Odbudowa tarcz',
	
	202 => 'Pierwszy statek zbudowany przez cesarza, który ma ładowność 5000 jednostek. Służy na początku do tranportu zasobów między koloniami, a z czasem bierze udział w napadach na wrogie planety. Od piątego poziomu napędu impulsowego korzysta z niego również mały transportowiec, dzięki czemu porusza się 2x szybciej.',
	203 => 'To nastepca małego transportowca. Wyposażony w lepszy typ napędu, dużo bardziej pojemny, lepiej opancerzony. Bierze udział w wiekszości napadów na wrogie planety.',
	204 => 'Pierwsze jednostki wojskowe. Są małe i zwinne, ale bardzo słabe, dopiero spora ich ilość potrafi być zagrożeniem. Wykorzystywane do ataku na słabo bronione pobliskie planety.',
	205 => 'Następca swojego poprzednika. Lepiej opancerzony i uzbrojony. Jednak to wciąż słaba jednostka.',
	206 => 'Wraz z rozwojem dział laserowych i jonowych narodził się Krążownik. Swojego czasu był Panem przestworzy. Ponad 2x lepiej opancerzony i uzbrojony od ciężkiego myśliwa, a do tego piekelnie szybki. Niestety w raz z rozwojem dział gaussa ich czas się skończył. Dziś wciąż można je spotkać jako wsparcie, ze względu na ich szybkość również jako rajdery.',
	207 => 'Gdy okazało się, iż straty z ataków są niewspółmiernie wielkie do zysków, powstał on. Uzbrojony w wielorzędowe działa, mocno opancerzony i dysponujący dużą ładownością za sprawą zastosowania napędu nadprzestrzennego, stał sie trzonem nowoczesnej floty.',
	208 => 'W XXI wieku, gdy ludzkość powoli szukała możliwości ekspansji, powstały one - statki kolonizacyjne. Mimo tego, iż nie są najnowsze i niewiele sie w nich zmieniło, wciąż spełniają podstawową rolę, czyli służą zasiedleniu niezamieszkanych planet.',
	209 => 'Okręt wyspecjalizowany w zbieraniu tego, co zostaje po kosmicznych bitwach, czyli metalu i krzystału z pól zniszczeń. Rozwój oficera ładowności okrętów zwiększa ich maksymalną ładowność do 2 Mln.',
	210 => 'To małe jednostki bezzałogowe, wyspecjalizowane w dostarczaniu danych o wrogich planetach. Pomimo tego, iż są bardzo szybkie i małe, czasem zostają wykryte i zniszczone.',
	211 => 'Gdy zauważono, iż niektóre planety zamist floty bronią się straszną ilością struktur obronnych, stworzono go, by był w stanie szybko je niszczyć.',
	212 => 'Z powodu coraz wiekszego zapotrzebowania na energię powstały one - niewielkie, ale bardzo wydajne, a do tego tanie. Umieszczone na wysokich orbitach przekazują zgromadzoną energię na planetę za pomocą zaawansowanych laserów. Nie posiadają obrony, więc w trakcie walki na orbicie planety bardzo często są niszczone!',
	213 => 'Niszczyciel to wynik wielu lat pracy i rozwoju. Wraz z rozwojem Gwiazd śmierci zdecydowano, iż potrzebne jest coś, co by chociaż troche mogło im się przeciwstawić. Ciężki pancerz, wielorzędowe działa jonowe, gaussa, jak i plazmowe sprawiły, iż jest to jeden z najbardziej przerażających statków, jakie się pojawiły w tym świecie. Niestety, jego rozmiary sprawiają, iż jest strasznie deuterożerny.',
	214 => 'Niszczycielska siła Giazd śmierci nie ma sobie równych! Jest tak duża, że może niszczyć księżyce!',
	215 => 'Najbardziej zaawansowany statek we wszechświecie, szczególnie groźny, kiedy stają naprzeciwko siebie floty. Odpowiednia ilość jest w stanie zadecydować o zwycięstwie. Dzięki poprawie dział laserowych i lepszemu napędowi prawdopodobnie zostanie następcą Okretu wojennego. Niestety jego pojemność jest bardzo ograniczona, chociaż częściowo jest to kompensowane przez niewielkie zużycie paliwa.',
	216 => 'Dark Moon to w pewnym sensie następca Gwiazdy śmierci. Niestety, kosztem szybkości zatracił możliwość niszczenia księżyców, jak i ustępuje gwieździe siłą ognia.',
	217 => 'Powstał dzięki potrzebie transportu większych ładunków, jak również szybszego transportu.',
	218 => 'Można powiedzieć, iż to przedstawiciel koszmaru na tym świecie, niestety strasznie powolny.',
	219 => 'Ogromna ładowność, a dzięki nowym technologiom porusza się znacznie szybciej od standardowego recyklera.',
	220 => 'Dzięki temu statkowi jesteś w stanie zbierać dark metter z księżyca.',
	
	401 => 'Twoja pierwsza linia obrony. Po walce i zniszczeniu jest 70% szans, że zostanie naprawiona.',
	402 => 'Wiązki laserowe dzięki specjalnym systemom namierzania i podążania za celem są kierowane tak, by przebijać kadłub. Po walce i zniszczeniu jest 70% szans, że zostanie naprawiona.',
	403 => 'Ciężki laser to ulepszona wersja lekkiego. Po walce i zniszczeniu jest 70% szans, że zostanie naprawiona.',
	404 => 'Działo gaussa strzela ogromnymi metalowymi pociskami, siejącymi straszne zniszczenia. Po walce i zniszczeniu istnieje 70% szans, że zostanie naprawione.',
	405 => 'Działo jonowe strzela skoncentrowaną wiązką jonów naładowanych dodatnio lub ujemnie. Po walce i zniszczeniu istnieje 70% szans, że zostanie naprawione.',
	406 => 'Działo plazmowe. Z powodu jego zapotrzebowania na energię jest zasilane dużym reaktorem jądrowym. Po walce i zniszczeniu istnieje 70% szans, że zostanie naprawione.',
	407 => 'Mała osłona roztacza nad planetą ochronę, która pochłania cześć obrażeń. Po walce i zniszczeniu istnieje 70% szans, że zostanie naprawiona.',
	408 => 'Duża osłona to wynik wielu lat rozwoju małej osłony. Jest w stanie wytrzymać dużo wiekszy ostrzał wroga. Po walce i zniszczeniu istnieje 70% szans, że zostanie naprawiona.',
	409 => 'Szczyt badań nad osłonami. Jest dużo bardziej wytrzymała niż duża, ale jej zapotrzebowanie na energię też jest duże! Po walce i zniszczeniu istnieje 70% szans, że zostanie naprawiona.',
	410 => 'Jak nazwa wskazuje to broń grawitonowa, używana na Gwieździe śmierci.',
	411 => 'To nieruchoma stacja obronna, niepotrzebująca zasilania z zewnatrz. Jej budowa wymaga znacznych ilości energii. Jest tak gigantyczna, iż możesz mieć tylko jednego takiego potwora.',
	502 => 'Służa do przechwytywania i niszczenia wrogich rakiet międzyplanetarnych.',
	503 => 'Służy do niszczenia obrony na planecie. Ma wroga w postaci antyrakiet.',

	601 => 'Geolog to specjalista od astro-minerologii i krystalologii. Jego działania odczuwa się w całym imperium.',
	602 => 'Admirał to stary i doświadczony weteran. Mądry imperator mógł liczyć na jego pomoc w walce.',
	603 => 'Inżynier to specjalista w zarządzaniu energią. W czasie pokoju i wojny zwiększa jej produkcję w całym imperium.',
	604 => 'Cech technokratów to naukowcy-geniusze. Swoją obecnością wpływają na innych naukowców, poprawiając sprawność ich pracy.',
	605 => 'To ludzie ze zmienionym DNA. Już 1 potrafi zbudować całe miasto.',
	606 => 'Naukowcy to część cechu technokratów, specjalizują się w poprawie technologii.',
	607 => 'Magazynier to członek starożytnego bractwa z planety Hsac. Jego dewizą jest zdobycie i wykorzystanie maksymalnie miejsca!',
	608 => 'Członek armii cesarskiej. Dzięki temu, iż jest skupiony na swojej pracy, może zbudować wspaniałą obronę w krótkim czasie.',
	609 => 'Jego celem jest opracowanie i poprawa technologii obronnych.',
	610 => 'To bardzo tajemniczy człowiek i tak naprawde nikt nie wie, kim jest ani jak wygląda.',
	611 => 'Dowódca jest częścią armii cesarskiej. Dzięki opanowaniu sztuki zarządzania flotą, jest w stanie bez pomocy komputera obliczyć trajektorię, czas przylotu itd.',
	612 => 'Człowiek bez litości. Doskonały do planowania masowych zniszczeń.',
	613 => 'Stary i doświadczony weteran, będący od wielu lat członkiem armii cesarskiej.',
	614 => 'Członek cesarskiej armii. Jego zdolności to nawigacja flotą - jest w tym niezastąpiony.',
	615 => 'Pod jego dowództwem znajdują się wszyscy inni oficerowie. To on decyduje, kto i kiedy wspiera Cię w tworzeniu Imperium, jakiego świat nie widział!',

	701 => 'Bonus jest tymczasowy!',
	702 => 'Bonus jest tymczasowy!',
	703 => 'Bonus jest tymczasowy!',
	704 => 'Bonus jest tymczasowy!',
	705 => 'Bonus jest tymczasowy!',
	706 => 'Bonus jest tymczasowy!',
	707 => 'Bonus jest tymczasowy!',	
);

// Translated into Polish by Sirgomo . All rights reversed (C) 2012
