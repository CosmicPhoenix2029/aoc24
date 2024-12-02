<?php

//get the file input
$input = file_get_contents('./input.txt');

/*
* Each line is of the form: 12345    12345 (so 2 columns)
* We need to split each column into its own array
* Then sort them by smallest to largest
* Then calculate the differance between the numbers in each row
*/

//1: declare required arrays
$columnOne = array();
$columnTwo = array();

//2: split the input into lines
$lines = explode("\n", $input);

//3: populate the arrays with the numbers in each row:
foreach ($lines as $line)
{
    $numbers = explode('   ', $line);
    $columnOne[] = $numbers[0];
    $columnTwo[] = $numbers[1];
}
//4: order the arrays by smallest to largest numbers
sort($columnOne);
sort($columnTwo);

//5: calculate the differance between the numbers, then add the differances to form the total distance
$totalDifferance = 0;
for ($i = 0; $i < 1000; $i++)
{
    $totalDifferance += abs($columnOne[$i] - $columnTwo[$i]);
}

//output the result:
echo $totalDifferance;
