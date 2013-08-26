<?php
	include_once("logic/bd.php");
	
			//connect class
	require_once("logic/Payment.class.php");
	
	$queryRate = ("SELECT * FROM rates");
	$resultRate = mysql_query($queryRate) or die (mysql_error());
		
		
	if (mysql_num_rows($resultRate) == 0) {
	
		$idRates = 1;
		$queryIdRates = "INSERT INTO rates (idRates) VALUES ($idRates)";	
		$resultRate = mysql_query($queryIdRates) or die(mysql_error());
	}
	
	$rowRates = mysql_fetch_array(mysql_query("SELECT * FROM rates"));
			
	$rowAddress = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE login='$login'"));
	
	$rowLastIndex = mysql_fetch_array(mysql_query("SELECT * FROM indexPayment WHERE login='$login'"));
	
							//check condition and save rates to data base
	if(isset($_POST['saveRates']))	{	
	
		$lightRate=$_POST['lightRate'];
		$moreLightRate=$_POST['moreLightRate'];
		$gasRate=$_POST['gasRate'];
		$waterRate=$_POST['waterRate'];
		$sewageRate=$_POST['sewageRate'];
		$trashRate=$_POST['trashRate'];
		$houseRate=$_POST['houseRate'];
		$TVRate=$_POST['TVRate'];
	
	
		if(!is_numeric($lightRate) || ($lightRate<0))	{	
		}	
			elseif(empty($lightRate))	{
			}	
				elseif($rowRates['light'] != $lightRate)	{	
					
					mysql_query("UPDATE rates SET light='$lightRate'");
				} 			
				
				if(!is_numeric($moreLightRate) || ($moreLightRate<0))	{	}
				elseif(empty($moreLightRate))	{ }
				elseif(($rowRates['moreLight'] != $moreLightRate) && (($moreLightRate-$lightRate)>0))	{
				mysql_query("UPDATE rates SET moreLight='$moreLightRate'"); }
						
				
		if(!is_numeric($gasRate) || ($gasRate<0))	{	
		}	
			elseif(empty($gasRate))	{
			}	
				elseif($rowRates['gas'] != $gasRate)	{	
					
					mysql_query("UPDATE rates SET gas='$gasRate'");
				} 			
				
		if(!is_numeric($waterRate) || ($waterRate<0))	{	
		}	
			elseif(empty($waterRate))	{
			}	
				elseif($rowWater['water'] != $waterRate)	{	
					
					mysql_query("UPDATE rates SET water='$waterRate'");
				} 					
		
		if(!is_numeric($sewageRate) || ($sewagwRate<0))	{	
		}	elseif(empty($sewageRate))	{
			}	elseif($rowWater['sewage'] != $sewageRate)	{	
					mysql_query("UPDATE rates SET sewage='$sewageRate'");
				} 	
				
		if(!is_numeric($trashRate) || ($trashRate<0))	{	
		}	
			elseif(empty($trashRate))	{
			}	
				if($rowWater['trash'] != $trashRate)	{	
				
					mysql_query("UPDATE rates SET trash='$trashRate'");
				} 	
				
		if(!is_numeric($houseRate) || ($houseRate<0))	{	
		}	
			elseif(empty($houseRate))	{
			}	
				elseif($rowHouse['house'] != $houseRate)	{	
					
					mysql_query("UPDATE rates SET house='$houseRate'");
				} 	
		
		if(!is_numeric($TVRate) || ($TVRate<0))	{	
		}	
			elseif(empty($TVRate))	{
			}	
				elseif($rowTV['TV'] != $TVRate)	{	
					
					mysql_query("UPDATE rates SET TV='$TVRate'");
				}
		
		header ("Location: index.php?page=8"); 
		die;		
	}	
?>

							<!--make view payment page -->
	<form method="POST" enctype="multipart/form-data">
			
			<div class="labelRates">
				<label>Тарифи за 1одн</label></div>
							
			<div class="inputPaymentLabel">				
				<label>електроенергія:</label></div>
			<div class="inputPaymentField">
				<input type="text" size="6" name="lightRate" value=<?php echo $rowRates['light'] ?>>
			
				<input type="text" size="6" name="moreLightRate" value=<?php echo $rowRates['moreLight'] ?>></div>
				
			<div class="inputPaymentLabel">
				<label>газ:</label></div>
			<div class="inputPaymentField">
				<input type="text" size="6" name="gasRate" value=<?php echo $rowRates['gas'] ?>></div>

			<div class="inputPaymentLabel">
				<label>хол.вода:</label></div>
			<div class="inputPaymentField">
				<input type="text" size="6" name="waterRate" value=<?php echo $rowRates['water'] ?>></div>	
			
			<div class="inputPaymentLabel">
				<label>стоки:</label></div>
			<div class="inputPaymentField">
				<input type="text" size="6" name="sewageRate" value=<?php echo $rowRates['sewage'] ?>></div>	
				
			<div class="inputPaymentLabel">
				<label>вивіз сміття:</label></div>
			<div class="inputPaymentField">
				<input type="text" size="6" name="trashRate" value=<?php echo $rowRates['trash'] ?>></div>	
				
			<div class="inputPaymentLabel">
				<label>ЄРЦ:</label></div>
			<div class="inputPaymentField">
				<input type="text" size="6" name="houseRate" value=<?php echo $rowRates['house'] ?>></div>	
				
			<div class="inputPaymentLabel">
				<label>кабельне TV:</label></div>
			<div class="inputPaymentField">
				<input type="text" size="6" name="TVRate" value=<?php echo $rowRates['TV'] ?>></div>

			<div class="submitPaymentButton">
				<input type="submit" name="saveRates" value="save ..."></div>	
			<hr>
			<!---------------------------------------------------------------------------------------------------------------------->
			
			<div class="inputPaymentLabel">
				<label>Електроенергія:</label></div>
			<div class="inputPaymentField">
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="lightPre" value=<?php echo $rowLastIndex['lastLight'] ?>>							
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="lightNow">
				<div class="inputAdressLabel"><label>вул.</label>
				<input type="text" size="15" name="street" value=<?php echo $rowAddress['street'] ?>></div>
				</div>				
				
			
			<div class="inputPaymentLabel">
				<label>Газ:</label></div>
			<div class="inputPaymentField">				
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="gasPre" value=<?php echo $rowLastIndex['lastGas'] ?>>							
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="gasNow">
				<div class="inputAdressLabel"><label>буд.</label>
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="3" name="building" value=<?php echo $rowAddress['building'] ?>>
				<label>кв.</label>
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="3" name="flat" value=<?php echo $rowAddress['flat'] ?>></div>
				</div>
				
			<div class="inputPaymentLabel">
				<label>Хол.вода кухня:</label></div>
			<div class="inputPaymentField">				
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="waterKitchenPre" value=<?php echo $rowLastIndex['lastWaterKitchen'] ?>>					
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="waterKitchenNow"></div>
				
			<div class="inputPaymentLabel">
				<label>Хол.вода WC:</label></div>
			<div class="inputPaymentField">				
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="waterWCPre" value=<?php echo $rowLastIndex['lastWaterWC'] ?>>							
				<input type="text" onkeyup="this.value = this.value.replace (/\D+/, '')" size="6" name="waterWCNow"></div>
			
			<div class="checkB">
			<input type="checkbox" name="lightCHB">електр
			<input type="checkbox" name="gasCHB">газ
			<input type="checkbox" name="waterKitchenCHB">х.в кух
			<input type="checkbox" name="waterWCCHB">х.в WC
			<input type="checkbox" name="sewageKitchenCHB">кан кух 
			<input type="checkbox" name="sewageWCCHB">кан WC
			<input type="checkbox" name="trashCHB">сміття
			<input type="checkbox" name="houseCHB">ЄРЦ
			<input type="checkbox" name="TVCHB">TV</div>
			
			<div class="submitPaymentButton">
			<input type="submit" name="countPayment" value="count ..."></div>	
				
			<hr>			
		
<?php
	if(isset($_POST['countPayment']))	{	
											
						//check condition and make print of payment
		if(((isset($_POST['lightCHB'])) && (($_POST['lightNow']-$_POST['lightPre'])>0) && (!(empty($_POST['lightRate']))) && (!(empty($_POST['moreLightRate'])))) ||
			((isset($_POST['gasCHB'])) && (($_POST['gasNow']-$_POST['gasPre'])>0) && (!(empty($_POST['gasRate'])))) ||
			((isset($_POST['waterKitchenCHB'])) && (($_POST['waterKitchenNow']-$_POST['waterKitchenPre'])>0) && (!(empty($_POST['waterRate'])))) ||
			((isset($_POST['waterWCCHB'])) && (($_POST['waterWCNow']-$_POST['waterWCPre'])>0) && (!(empty($_POST['waterRate'])))) ||
			((isset($_POST['sewageKitchenCHB'])) && (($_POST['waterKitchenNow']-$_POST['waterKitchenPre'])>0) && (!(empty($_POST['sewageRate'])))) ||
			((isset($_POST['sewageWCCHB'])) && (($_POST['waterWCNow']-$_POST['waterWCPre'])>0) && (!(empty($_POST['sewageRate'])))) ||
			((isset($_POST['trashCHB'])) && (!(empty($_POST['trashRate'])))) ||
			((isset($_POST['houseCHB'])) && (!(empty($_POST['houseRate'])))) ||
			((isset($_POST['TVCHB']))) && (!(empty($_POST['TVRate']))))		{
						
						$objlight = new CountingPayment();
						
						//make folder if not exists jet
				if (!(is_dir("payment")))	{
							
					mkdir("payment", 0700);
				}	
							
					
				if($login)	{
				
					$rowLastIndex = mysql_fetch_array(mysql_query("SELECT * FROM indexPayment WHERE login='$login'"));						
											
					if(!($rowLastIndex['login']))	{
					
						$query = "INSERT INTO indexPayment (login) VALUES ('$login')";	
						$result = mysql_query($query) or die(mysql_error());
					}
				}						
					
				$objlight->makeAddress();
				print <<<HERE
				<table border="1" bordercolor="#FF0000" RULES=ALL FRAME=VOID cellpadding="4">					
				<tr><td>Послуга</td> <td>Ост показн </td><td>Попер показн</td><td>Спожито</td><td>Тариф</td><td>До сплати</td></tr>
HERE;
						
				if(isset($_POST['lightCHB']) && (($_POST['lightNow']-$_POST['lightPre'])>0))	{							
								
					$objlight->setPayment(light, 'Електроенергія');
					$objlight->makePayment();																
				}
				
				
				if(isset($_POST['gasCHB']) && (($_POST['gasNow']-$_POST['gasPre'])>0))	{
								
					$objlight->setPayment(gas, 'Газ');
					$objlight->makePayment();								
				}

				
				if(isset($_POST['waterKitchenCHB']) && (($_POST['waterKitchenNow']-$_POST['waterKitchenPre'])>0))	{
								
					$objlight->setPaymentWater(water, Kitchen, 'Х.в кухня');
					$objlight->makePayment();								
				}

				
				if(isset($_POST['waterWCCHB']) && (($_POST['waterWCNow']-$_POST['waterWCPre'])>0))	{
								
					$objlight->setPaymentWater(water, WC, 'Х.в туалет');
					$objlight->makePayment();								
				}

				
				if(isset($_POST['sewageKitchenCHB']) && (($_POST['waterKitchenNow']-$_POST['waterKitchenPre'])>0))	{
								
					$objlight->setPaymentSewage(water, Kitchen, sewage, 'Стоки кухня');
					$objlight->makePayment();								
				}

				
				if(isset($_POST['sewageWCCHB']) && (($_POST['waterWCNow']-$_POST['waterWCPre'])>0))	{
								
					$objlight->setPaymentSewage(water, WC, sewage, 'Стоки туалет');
					$objlight->makePayment();								
				}

				
				if(isset($_POST['trashCHB']))	{
							
					$objlight->setConstPayment(trash, 'Вивіз сміття');
					$objlight->makePayment();						
				}

				
				if(isset($_POST['houseCHB']))	{
							
					$objlight->setConstPayment(house, 'ЄРЦ');
					$objlight->makePayment();								
					}

					
				if(isset($_POST['TVCHB']))	{
								
					$objlight->setConstPayment(TV, 'Кабельне ТВ');
					$objlight->makePayment();														
				}

				$objlight->showPayment();
				print <<<HERE
				</table>
HERE;
					
						
			}
	}
?>
		
</form>

			


