<h1>BMI Berekenaar</h1>

<?php
	$userGewicht = 70;
	$userLengte = 1.80;
	$userGeslacht = "Man";
	$userLeeftijd = 8;

	#	$teLichtJongen = array(14.03, 14.06, 14.20, 14.41, 14.69, 15.03, 15.47, 15.98, 16.54, 17.13, 17.70, 18);
	#	$teZwaarJongen = array(17.55, 17.92, 18.44, 19.10, 19.84, 20.55, 21.22, 21.91, 22.62, 23.29, 23.90, 25);
	#	$obesitasJongen = array(19.78, 20.63, 21.60, 22.77, 24.00, 25.10, 26.02, 26.84, 27.63, 28.30, 28.88, 30);
	#	$teLichtMeisje = array(13.92, 14.00, 14.16, 14.42, 14.78, 15.25, 15.83, 16.43, 17.01, 17,52, 17.95, 18);
	#	$teZwaarMeisje = array(17.34, 17.75, 18.35, 19.07, 19.86, 20.74, 21.68, 22.58, 23.34, 23.94, 24.37, 25);
	#	$obesitasMeisje = array(19.65, 20.51, 21.57, 22.81, 24.11, 25.42, 26.67, 27.76, 28.57, 29.11, 29.43, 30);

	function leeftijdInArray($leeftijd){
		$bmiIndex = $leeftijd - 6;
		return $bmiIndex;
	}

	function berekenBMI(float $gewicht, float $lengte){
		$bmi = $gewicht / ($lengte * $lengte);
		return $bmi;
	}

	$userBMI = berekenBMI($userGewicht, $userLengte);

	function userAdvies(float $bmi){
		if ($bmi == 0){
			$uitkomst = "geen lengte en gewicht ingevult";
		}
		elseif ($bmi < 18.5) {
			$uitkomst = "Ondergewicht";
		}
		elseif ($bmi >= 18.5 && $bmi < 25){
			$uitkomst = "Goed gewicht";
		}
		elseif ($bmi >= 25 && $bmi < 27){
			$uitkomst = "licht overgewicht";
		}
		elseif ($bmi >= 27 && $bmi < 30){
			$uitkomst = "Overgewicht";
		}
		elseif ($bmi >= 30 && $bmi < 40){
			$uitkomst = "Ernstig overgewicht";
		}
		elseif ($bmi > 40){
			$uitkomst = "Gevaarlijk overgewicht";
		}
	return $uitkomst;
	}

	echo "uw bmi is " . $userBMI . " je hebt " . userAdvies($userBMI);
?>