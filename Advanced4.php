<?php
function selectionSort($arr)
{
	$count = 0;
	for($i=0;$i<count($arr)-1;$i++)
	{
		$min = $arr[$i];
		$minAddr = $i;
		for($j=$i+1;$j<count($arr);$j++)
		{
			if($arr[$j] < $min)
			{
				$min = $arr[$j];
				$minAddr = $j;
			}
			$count++;
		}
		$arr[$minAddr] = $arr[$i];
		$arr[$i] = $min;
	}
	echo $count . "<br>";
	return $arr;
}
$x = [];//[1,7,9,2,5,6,8,3,4,10];
for($i=0;$i<1000;$i++)
{
	array_push($x, rand(0, 10000));
}
$tStart = microtime();
$y = selectionSort($x);
echo microtime() - $tStart;
var_dump($y);
function selectionSortWithMax($arr)
{
	$count = 0;
	for($i=0;$i<floor(count($arr)/2);$i++)
	{
		$max = $arr[$i];
		$min = $arr[$i];
		$maxAddr = $i;
		$minAddr = $i;
		for($j=$i+1;$j<count($arr)-$i;$j++)
		{
			if($arr[$j] < $min)
			{
				$min = $arr[$j];
				$minAddr = $j;
			}
			elseif($arr[$j] > $max)
			{
				$max = $arr[$j];
				$maxAddr = $j;
			}
			$count++;
		}
		if($i == $maxAddr)
		{
			$arr[$i] = $min;
			$arr[$minAddr] = $max;
			$maxAddr = $minAddr;
		}
		else
		{
			$temp = $arr[$i];
			$arr[$i] = $min;
			$arr[$minAddr] = $temp;
		}
		$temp = $arr[count($arr)-$i-1];
		$arr[count($arr)-$i-1] = $max;
		$arr[$maxAddr] = $temp;
	}
	echo $count . "<br>";
	return $arr;
}
$tStart = microtime();
$z = selectionSortWithMax($x);
echo microtime() - $tStart;
var_dump($z);
if($y == $z){ echo "they are the same array";} else{echo "they are different arrays";}
?>