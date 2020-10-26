<h1>BMI Berekenaar</h1>

<?php
	//gebruikers gegevens voor het berekenen van de bmi (hardcoded)
	(float)$userGewicht = 70;
	(float)$userLengte = 1.80;
	(string)$userGeslacht = "Man";
	(string)$userLeeftijd = 21;

	//convert leeftijd die groter is dan 17 naar string die corenspondeert met gegevens in array
	if ($userLeeftijd > 17) {
		$userLeeftijd = ">17";
	}

	$userBMI = berekenBMI($userGewicht, $userLengte);

		//mijn uitwerking van duncans array -> multidemensioneel keyed array.
		//"0" voor man, "1" voor vrouw (of alles wat geen man is)
		$teLicht = array
			(
			array("0", "6"=>14.03, "7"=>14.06, "8"=>14.20,"9"=>14.41, "10"=>14.69, "11"=>15.03, "12"=>15.47,
				"13"=>15.98, "14"=>16.54, "15"=>17.13, "16"=>17.70, "17"=>18, ">17"=>18),
			array("1", "6"=>13.92, "7"=>14.00, "8"=>14.16, "9"=>14.42, "10"=>14.78, "11"=>15.25, "12"=>15.83,
				"13"=>16.43, "14"=>17.01, "15"=>17,52, "16"=>17.95, "17"=>18, ">17"=>18)
			);
		$goedGewicht = array
		(
			array("0", "6"=>17.55,"7"=>17.92, "8"=>18.44, "9"=>19.10, "10"=>19.84, "11"=>20.55, "12"=>21.22,
				"13"=>21.91, "14"=>22.62, "15"=>23.29, "16"=>23.90, "17"=>25, ">17"=>25),
			array("1", "6"=>17.34, "7"=>17.75, "8"=>18.35, "9"=>19.07, "10"=>19.86, "11"=>20.74, "12"=>21.68,
				"13"=>22.58, "14"=>23.34, "15"=>23.94, "16"=>24.37, "17"=>25, ">17"=>25)
		);
		$obesitas = array
		(
			array("0", "6"=>19.78, "7"=>20.63, "8"=>21.60, "9"=>22.77, "10"=>24.00, "11"=>25.10, "12"=>26.02,
			 	"13"=>26.84, "14"=>27.63, "15"=>28.30, "16"=>28.88, "17"=>30, ">17"=>30),
			array("1", "6"=>19.65, "7"=>20.51, "8"=>21.57, "9"=>22.81, "10"=>24.11, "11"=>25.42, "12"=>26.67,
				"13"=>27.76, "14"=>28.57, "15"=>29.11, "16"=>29.43, "17"=>30, ">17"=>30)
		);
	//zet gebruikers leeftijd om naar corrensponderende positie/index in array
	function leeftijdInArray($leeftijd){
		$bmiIndex = (string)$leeftijd;
		return $bmiIndex;
	}
	//berekent BMI
	function berekenBMI(float $gewicht, float $lengte){
		$bmi = $gewicht / ($lengte * $lengte);
		return $bmi;
	}
	//zet geslacht om naar corrensponderende index in array
	function geslachtIndex($geslacht){
		if ($geslacht == "Man"){
			$geslachtsIndex = "0";
		}
		else {
			$geslachtsIndex = "1";
		}
		return $geslachtsIndex;
	}
	//deze functie vergelijkt alle waarden van de gebruiker en geeft geeft een advies mee.
	//hier erg lang mee bezig geweest omdat je niet variables kan gebruiken die buiten de scope van de functie vallen
	//op stackoverflow gelezen dat je de functie/syntax "use" kan gebruiken om variables van buiten de functie kan
	//gebruiken. maar hiervoor heb je de php versie 5.4 of hoger nodig die ik niet heb.
	//nu schijnt dat je de "global" functie kan gebruiken om dit te doen, maar wordt door mensen op stackoverflow,
	//afgeraden omdat dit in grote projecten voor problemen kan zorgen?
	//graag wil ik hier over meer uitleg krijgen.
	function userAdvies(float $bmi) {
		global $obesitas, $goedGewicht, $teLicht, $userGewicht, $userLeeftijd, $userGeslacht; 

		if ($bmi == 0){
			$uitkomst = "geen lengte en gewicht ingevult";
		}
		elseif ($bmi >= $obesitas[geslachtIndex($userGeslacht)][leeftijdInArray($userLeeftijd)]){
			$uitkomst = "Ernstig overgewicht";
		}
		elseif ($bmi <= $goedGewicht[geslachtIndex($userGeslacht)][leeftijdInArray($userLeeftijd)]){
			$uitkomst = "Goed Gewicht";
		}
		elseif ($bmi <= $teLicht[geslachtIndex($userGeslacht)][leeftijdInArray($userLeeftijd)]){
			$uitkomst = "Ondergewicht";
		}
	return $uitkomst;
	}

	echo "uw bmi is " . berekenBMI($userGewicht, $userLengte) . " je hebt " . userAdvies($userBMI);

	#echo "<br> <br> " . $teLicht[1][10];

	#echo "<br> <br> " . $teLicht[geslachtIndex($userGeslacht)][leeftijdInArray($userLeeftijd)];
?>