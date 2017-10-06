<?php
$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo 'Original Array: '.implode(',', $test_array). PHP_EOL;
$test_array = quick_sort($test_array);
echo 'Sorted Array: '.implode(',', $test_array). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array);
echo "\nSorted Array:\n";
echo implode(', ', insertion_Sort($test_array)). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array);
echo "\nSorted Array:\n";
echo implode(', ', selection_sort($test_array)). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', shell_Sort($test_array)). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', bubble_Sort($test_array)). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', cocktailSort($test_array)). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', combSort($test_array)). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', gnome_Sort($test_array)). PHP_EOL;

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', counting_sort($test_array, -1, 5)). PHP_EOL;

$test_array = array(100, 54, 7, 2, 5, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', merge_sort($test_array))."\n";

$test_array = array(100, 0, 2, 5, -1, 4, 1);
echo "Original Array:\n";
echo implode(', ', $test_array );
echo "\nSorted Array:\n";
echo implode(', ', bogo_sort($test_array)). PHP_EOL;

function quick_sort($array)
{
  $loe = $gt = array();
  if(count($array) < 2)
  {
    return $array;
  }
  $pivot_key = key($array);
  $pivot = array_shift($array);
  foreach($array as $val)
  {
    if($val <= $pivot)
    {
      $loe[] = $val;
    }
    elseif ($val > $pivot)
    {
      $gt[] = $val;
    }
  }
  return array_merge(quick_sort($loe), array($pivot_key => $pivot), quick_sort($gt));
}

function insertion_Sort($array)
{
  for($i = 0; $i < count($array); $i++)
  {
    $val = $array[$i];
    $j = $i - 1;
    while($j >= 0 && $array[$j] > $val)
    {
      $array[$j + 1] = $array[$j];
      $j--;
    }
    $array[$j + 1] = $val;
  }
  return $array;
}

function selection_sort($data)
{
  for($i = 0; $i < count($data) - 1; $i++)
  {
    $min = $i;
    for($j = $i + 1; $j < count($data); $j++)
    {
      if ($data[$j] < $data[$min])
      {
        $min = $j;
      }
    }
    $data = swap_positions($data, $i, $min);
  }
  return $data;
}

function swap_positions($data1, $left, $right)
{
  $backup_old_data_right_value = $data1[$right];
  $data1[$right] = $data1[$left];
  $data1[$left] = $backup_old_data_right_value;
  return $data1;
}

function shell_Sort($array)
{
  $x = round(count($array) / 2);
  while($x > 0)
  {
    for($i = $x; $i < count($array); $i++)
    {
      $temp = $array[$i];
      $j = $i;
      while($j >= $x && $array[$j - $x] > $temp)
      {
        $array[$j] = $array[$j - $x];
        $j -= $x;
      }
      $array[$j] = $temp;
    }
    $x = round($x / 2.2);
  }
  return $array;
}

function bubble_Sort($array)
{
  do
  {
    $swapped = false;
    for($i = 0, $c = count($array) - 1; $i < $c; $i++)
    {
      if($array[$i] > $array[$i + 1])
      {
        list($array[$i + 1], $array[$i]) = array($array[$i], $array[$i + 1]);
        $swapped = true;
      }
    }
  }
  while ($swapped);
  return $array;
}

function cocktailSort($array)
{
  if (is_string($array))
  $array = str_split(preg_replace('/\s+/', '', $array));
  do
  {
    $swapped = false;
    for($i = 0; $i < count($array); $i++)
    {
      if(isset($array[$i + 1]))
      {
        if($array[$i] > $array[$i + 1])
        {
          list($array[$i], $array[$i + 1]) = array($array[$i + 1], $array[$i]);
          $swapped = true;
        }
      }
    }
    if ($swapped == false) break;
    $swapped = false;
    for($i = count($array) - 1; $i >= 0; $i--)
    {
      if(isset($array[$i - 1]))
      {
        if($array[$i] < $array[$i - 1])
        {
          list($array[$i],$array[$i - 1]) = array($array[$i - 1],$array[$i]);
          $swapped = true;
        }
      }
    }
  } while($swapped);
  return $array;
}

function combSort($array)
{
  $gap = count($array);
  $swap = true;
  while ($gap > 1 || $swap)
  {
    if($gap > 1) $gap /= 1.25;
    $swap = false;
    $i = 0;
    while($i + $gap < count($array))
    {
      if($array[$i] > $array[$i + $gap])
      {
        list($array[$i], $array[$i + $gap]) = array($array[$i + $gap], $array[$i]);
        $swap = true;
      }
      $i++;
    }
  }
  return $array;
}

function gnome_Sort($array)
{
  $i = 1;
  $j = 2;
  while($i < count($array))
  {
    if ($array[$i - 1] <= $array[$i])
    {
      $i = $j;
      $j++;
    }
    else
    {
      list($array[$i], $array[$i - 1]) = array($array[$i - 1], $array[$i]);
      $i--;
      if($i == 0)
      {
        $i = $j;
        $j++;
      }
    }
  }
  return $array;
}

function counting_sort($array, $min, $max)
{
  $count = array();
  for($i = $min; $i <= $max; $i++)
  {
    $count[$i] = 0;
  }
  foreach($array as $number)
  {
    $count[$number]++;
  }
  $z = 0;
  for($i = $min; $i <= $max; $i++)
  {
    while( $count[$i]-- > 0 )
    {
      $array[$z++] = $i;
    }
  }
  return $array;
}

function merge_sort($array)
{
  if(count($array) == 1) return $array;
  $mid = count($array) / 2;
  $left = array_slice($array, 0, $mid);
  $right = array_slice($array, $mid);
  $left = merge_sort($left);
  $right = merge_sort($right);
  return merge($left, $right);
}

function merge($left, $right)
{
  $res = array();
  while (count($left) > 0 && count($right) > 0)
  {
    if($left[0] > $right[0])
    {
      $res[] = $right[0];
      $right = array_slice($right, 1);
    }
    else
    {
      $res[] = $left[0];
      $left = array_slice($left, 1);
    }
  }
  while (count($left) > 0)
  {
    $res[] = $left[0];
    $left = array_slice($left, 1);
  }
  while (count($right) > 0)
  {
    $res[] = $right[0];
    $right = array_slice($right, 1);
  }
  return $res;
}

function bogo_sort($list)
{
  do
  {
    shuffle($list);
  }
  while (!issorted($list));
  return $list;
}

function issorted($list)
{
  $cnt = count($list);
  for($j = 1; $j < $cnt; $j++)
  {
    if($list[$j - 1] > $list[$j])
    {
      return false;
    }
  }
  return true;
}
?>
