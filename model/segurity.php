<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SEGURYTY</title>
</head>
<body>
	<?php
		try{
			// Password Eamil
			define("MAILHASH", "+C+CeYHREvP/rJsXe/+InEc02CVL74VXBYLO2kFuaPTz/8ppZhvZHxYzIB7zM7Re9gLr0hbxkJnlrlX1ynmEWhVOjZy4EJUku0iHHC97EC4w8829fXcI1whSD/klKHQJP1wmdyTDayg9j6YWw2DhJE/Sc4PaajtGVaTpTZIZmaf8PIQ/FZK/JBPXPK3yoQ7fiEjd1rQJRVHBFd0EGszKHVcQCWtw81Ppiu/Kgnd2N5PD+5I+ADmizp3ZwR4l0clk/JIA3BndMzbf1sE+5ok04c1xyLY71KtnFbBiI7sOCwlhGhpEEG/cfhNMpF3ZFeW27WFTqtjO/Z/comNY+/G1");
			// Password Numero Documento
			define("DOCHASH", "4+Vm5y63qfzJmEWYZ13bet4lXakR29nbUMj3VJJAhvdpFzx9n43WqtHpVcGvKQcpd1Au10eIM30BoUzatH41xqgLmajX4nf1GFAnLSKKUdqIiJR1loeY940J000lQSsDJUWA0/XdjmC+ZVC3dosBrajxEtnL0dFynLHb7fvgTWJSzPpX7MaSHShPWa+P+chWS0u3T1vas/WhSfc5+0ssw2VDdW19rv1YJC/KmN0JCOO3/IEjv2Ou1cbgJr05qHNysd1XmeoA0GafAg7+kI2lQi14JtJRys4F1ueabKb07JjPEBiIATxSqWSFyHM6owbZZ/stB0TbGcpp4pCG3O+v9");
		}catch(Exception $e){
			die("ERROR DE CONTRASEÑAS" . $e->getMessage());
		}
	?>
</body>
</html>