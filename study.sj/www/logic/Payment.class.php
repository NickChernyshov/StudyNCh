<?php
class CountingPayment
	{
		private $title;
		private $titleWater;
		private $name;
		private $pre;
		private $now;
		private $used;
		private $rate;
		private $payment;
		private $room;
		private $allPayment;
		private $nowDate;
		private $p;
		private $login;
		private $separator;
		
					//method for gas and light 
		public function setPayment($title, $name)	{
		
			$this->title = $title;
			$this->name= $name;
				
			$this->pre = $_POST[$this->title.'Pre'];
			$this->now=$_POST[$this->title.'Now'];
			$this->used=$this->now-$this->pre;
			$this->rate=number_format($_POST[$this->title.'Rate'], 4, '.', '');
				if(($title == light) && (($this->used)>150))	{
						$n= ucfirst($this->title);
						$this->moreRate=$_POST['more'.$n.'Rate'];
					$this->payment=round(((150*($this->rate))+(($this->used-150)*($this->moreRate))), 2);
				}	else	{
						$this->payment=round(($this->used*($this->rate)), 2);
					}
			$this->allPayment+=$this->payment;			
		}	
		
		
					//method which working with water data
		public function setPaymentWater($title, $where, $name)	{
		
			$this->title = $title.$where;
			$this->titleWater = $title;
			$this->name = $name;
			$this->pre = $_POST["{$this->title}Pre"];
			$this->now = $_POST["{$this->title}Now"];
			$this->used=$this->now-$this->pre;
			$this->rate=number_format($_POST[$this->titleWater.'Rate'], 4, '.', '');
			$this->payment=round(($this->used*($this->rate)), 2);
			$this->allPayment+=$this->payment;
		}

						//method which working with water data
		public function setPaymentSewage($title, $where, $service, $name)	{
		
			$this->title = $title.$where;
			$this->titleWater = $service;
			$this->name = $name;
			$this->pre = $_POST["{$this->title}Pre"];
			$this->now = $_POST["{$this->title}Now"];
			$this->used=$this->now-$this->pre;
			$this->rate=number_format($_POST[$this->titleWater.'Rate'], 4, '.', '');
			$this->payment=round(($this->used*($this->rate)), 2);
			$this->allPayment+=$this->payment;
		}

					//method which working with constant data
		public function setConstPayment($title, $name)	{
		
			$this->title = $title;
			$this->name= $name;
			$this->payment = round(($_POST[$this->title.'Rate']), 2);
			$this->pre = "";
			$this->now = "";
			$this->used = "";
			$this->rate = "";
			$this->allPayment+=$this->payment;
		}

					//method make header of payment
		public function makeAddress()	{
			$this->nowDate = date("m_d_y");
			$this->login = $_SESSION['loguser']['login'];
			$this->p = fopen("payment/".$this->nowDate.$this->login."_payment.txt", "w");
			$this->separator="--------------------------------------------------".PHP_EOL;
				
				if(((empty($_POST['street'])) != 1) && ((empty($_POST['building'])) !=1))  	{
										
					$address = "вул.".$_POST['street']." буд.".$_POST['building'];							
				}
					if((empty($_POST['flat'])) != 1)	{
								
						$address = $address." кв.".$_POST['flat'];
					}
			echo "<div  class='adress'>".$address."</div>";							
			fwrite($this->p, $address);
			fwrite($this->p, PHP_EOL);
			fwrite($this->p, $this->separator);
			fwrite($this->p, $this->separator);
		}
		
					//method that print and save all marked payment
		public function makePayment()	{
			if($this->payment!=0)	{
				echo "<tr><td>".$this->name."</td>";
				echo "<td>".$this->now."</td>";
				echo "<td>".$this->pre."</td>";
				echo "<td>".$this->used."</td>";
				echo "<td>".$this->rate."</td>";	
				echo "<td>".$this->payment."</td>";	
						
					if(empty($this->login) !=1)	{
						
						mysql_query("UPDATE indexPayment SET last{$this->title}='$this->now' WHERE login='$this->login'");										
					}
				$savePayment = "{$this->name}   |".$this->now."|".$this->pre."|".$this->used."|".$this->rate."|".$this->payment."грн".PHP_EOL;
				fwrite($this->p, $savePayment);
				fwrite($this->p, $this->separator);
			}		
		
		}
		
					//method that print and save sum of all payment together
		public function showPayment()	{
			echo "<tr><td colspan='5'>Разом до сплати</td><td>".$this->allPayment."грн</td></tr>";
			$savePayment ="Разом ==========>     ".$this->allPayment."грн";
			fwrite($this->p, $savePayment);
			fclose($this->p);
		}
		
	
	}
