<?php

function shuedatacalc($shue)
{
	$slot1= $shue[0];
	$slot3= $shue[2];
	$slot4= $shue[3];

	$info = array();

	$info += slot3info($slot3);
	$info += slot4info($slot4,$info['Lvl']);

	$shuelvl = $info['Lvl'];
	$imgname = './/allitems/shue/';
	$charclass ='';

	if($slot1=='1012' || $slot1 == '66536')
	{		
		$charclass='Warrior';
		if($slot1=='1012')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'Warrior0P.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'Warrior1P.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'Warrior2P.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'Warrior3P.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'Warrior4P.jpg';
			}
		}elseif($slot1=='66536')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'Warrior0N.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'Warrior1N.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'Warrior2N.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'Warrior3N.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'Warrior4N.jpg';
			}
		}
	}elseif($slot1=='1014' || $slot1=='66542')
	{
		$charclass='Mage';
		if($slot1=='1014')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'Mage0P.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'Mage1P.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'Mage2P.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'Mage3P.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'Mage4P.jpg';
			}
		}elseif($slot1=='66542')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'Mage0N.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'Mage1N.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'Mage2N.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'Mage3N.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'Mage4N.jpg';
			}
		}
	}elseif($slot1=='1015' || $slot1=='66545')
	{
		$charclass='Archer';
		if($slot1=='1015')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'Arch0P.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'Arch1P.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'Arch2P.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'Arch3P.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'Arch4P.jpg';

			}
		}elseif($slot1=='66545')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'Arch0N.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'Arch1N.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'Arch2N.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'Arch3N.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'Arch4N.jpg';
			}
		}
	}elseif($slot1=='1013' || $slot1=='66539')
	{
		$charclass='Holy Knight';
		if($slot1=='1013')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'HK0P.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'HK1P.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'HK2P.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'HK3P.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'HK4P.jpg';
			}
		}elseif($slot1=='66539')
		{
			if($shuelvl>1 && $shuelvl< 5)
			{
				$imgname .= 'HK0N.jpg';
			}
			elseif($shuelvl>4 && $shuelvl<10)
			{
				$imgname .= 'HK1N.jpg';
			}elseif($shuelvl>9 && $shuelvl<20)
			{
				$imgname .= 'HK2N.jpg';
			}elseif($shuelvl>19 && $shuelvl<30)
			{
				$imgname .= 'HK3N.jpg';
			}elseif($shuelvl>29)
			{
				$imgname .= 'HK4N.jpg';
			}
		}
	}
	else
	{
		$imgname .= "Blank.jpg";
	}

	$msg = "";

	$msg .= "<span style='color:#000000'>Level $shuelvl</span><br>";
	$msg .= "<span style='color:#000000'>Vitality(HP) $info[HP]</span><br>";
	$msg .= "<span style='color:#000000'>Hunger(SP) $info[Hunger]</span><br>";
	$msg .= "<span style='color:#000000'>Experience(EXP) $info[Exp]</span><br>";

	if($info['AtkPwr']!=0)
	{
		$msg .= "<span style='color:#04B404'>Raise Attack Power by $info[AtkPwr]</span><br>";
	}elseif($info['MagAtk']!=0)
	{
		$msg .= "<span style='color:#04B404'>Raise Magic Power by $info[MagAtk]</span><br>";
	}
	if($info['FireAtk']!=0)
	{
		$msg .= "<span style='color:#DF0101'>Attack Power (Fire) $info[FireAtk]</span><br>";
	}
	if($info['IceAtk']!=0)
	{
		$msg .= "<span style='color:#013ADF'>Attack Power (Ice) $info[IceAtk]</span><br>";
	}
	if($info['AtkLight']!=0)
	{
		$msg .= "<span style='color:#848484'>Attack Power (Lightning) $info[AtkLight]</span><br>";
	}
	if($info['Defence']!=0)
	{
		$msg .= "<span style='color:#04B404'>Raise Defense by $info[Defence]</span><br>";
	}
	if($info['FireDef']!=0)
	{
		$msg .= "<span style='color:#DF0101'>Defense (Fire) $info[FireDef]</span><br>";
	}
	if($info['IceDef']!=0)
	{
		$msg .= "<span style='color:#013ADF'>Defense (Ice) $info[IceDef]</span><br>";
	}
	if($info['DefLight']!=0)
	{
		$msg .= "<span style='color:#848484'>Defense(Lightning) $info[DefLight]</span><br>";
	}
	if($info['Acqexp']!=0)
	{
		$msg .= "<span style='color:#04B404'>Raise Acquired Experience by $info[Acqexp]</span><br>";
	}
	$msg .= "<span style='color:#000000'>$charclass Only</span><br>";
	if($info['CritHit']!=0)
	{
		$msg .= "<span style='color:#DF3A01'>Critical Hit Rate $info[CritHit]%</span><br>";
	}
	
	return array('Msg'=>$msg,'Image'=>$imgname);

}


function slot3info($slot3)
{
	$it = $slot3;
	$i1 = fmod($it, 2147483648);
	$j1 = $it - $i1;
	$icedef = $j1 / 2147483648;

	$i2 = fmod($i1, 1073741824);
	$j4 = $i1 - $i2;
	$iceatk = $j4 / 1073741824;

	$i3 = fmod($i2, 536870912);
	$j5 = $i2 - $i3;
	$firedef = $j5 / 536870912;

	$i4 = fmod($i3, 268435456);
	$j6 = $i3 - $i4;
	$fireatk = $j6 / 268435456;

	$i5 = fmod($i4, 4194304);
	$j7 = $i4 - $i5;
	$hp = $j7 / 4194304;

	$i6 = fmod($i5, 256);
	$j8 = $i5 - $i6;
	$exp = $j8 / 256;

	$lvl = $i6;

	if($icedef==1) { $icedef = ceil($lvl/5) + 1;} else {$icedef=0;}
	if($iceatk==1) { $iceatk = ceil($lvl/5)  + 1;} else {$iceatk=0;}
	if($firedef==1) { $firedef = ceil($lvl/5)  + 1;} else {$firedef=0;}
	if($fireatk==1) { $fireatk = ceil($lvl/5)  + 1;} else {$fireatk=0;}	
	

	return array('IceDef'=>$icedef,'IceAtk'=>$iceatk,'FireDef'=>$firedef,'FireAtk'=>$fireatk,'HP'=>$hp,'Exp'=>$exp,'Lvl'=>$i6);

}





function slot4info($slot4,$lvl)
{
	$it = $slot4 - 536870912;
	$i1 = fmod($it, 2147483648);
	$j1 = $it - $i1;
	$crit = $j1 / 2147483648;

	$i2 = fmod($i1, 1073741824);
	$j4 = $i1 - $i2;
	$alive = $j4 / 1073741824;

	$i3 = fmod($i2, 534773760);
	$j5 = $i2 - $i3;
	$equip = $j5 / 534773760;

	$i4 = fmod($i3, 128);
	$j6 = $i3 - $i4;
	$hunger = $j6 / 128;

	$i5 = fmod($i4, 64);
	$j7 = $i4 - $i5;
	$acexp = $j7 / 64;

	$i6 = fmod($i5, 16);
	$j8 = $i5 - $i6;
	$magatk = $j8 / 16;

	$i7 = fmod($i6, 8);
	$j9 = $i6 - $i7;
	$defence = $j9 / 8;

	$i8 = fmod($i7, 4);
	$j10 = $i7 - $i8;
	$atkpwr = $j10 / 4;

	$i9 = fmod($i8, 2);
	$j11 = $i8 - $i9;
	$deflight = $j11 / 2;

	$i10 = fmod($i9, 1);
	$j12 = $i9 - $i10;
	$atklight = $j12 / 1;

	if($crit==1) { $crit = ceil($lvl/3); } else {$crit=0;}
	if($acexp==1) { 
		if($lvl >0 && $lvl <51)
			$acexp = (floor($lvl/5)+5);
		else
			$acexp = 15;
	} else {$acexp=0;}
	if($magatk%2!=0) { $magatk =$lvl*2;} else {$magatk=0;}	
	if($defence==1) { $defence = $lvl; } else {$defence=0;}	
	if($atkpwr==1) { $atkpwr = $lvl*2;} else {$atkpwr=0;}	
	if($deflight==1) { $deflight = ceil($lvl/5)  + 1;} else {$deflight=0;}	
	if($atklight==1) { $atklight = ceil($lvl/5)  + 1;} else {$atklight=0;}


	return array('CritHit'=>$crit,'Alive'=>$alive,'Equip'=>$equip,'Hunger'=>$hunger,'Acqexp'=>$acexp,'MagAtk'=>$magatk,'Defence'=>$defence,'AtkPwr'=>$atkpwr,'DefLight'=>$deflight,'AtkLight'=>$atklight);

}


?>