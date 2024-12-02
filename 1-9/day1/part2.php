<?php
//get the file input
$input = file_get_contents('./input.txt');

/*
* Each line is of the form: 12345    12345 (so 2 columns)
* We need to split each column into its own array
* Then find out how many times each number on the left column occurs in the right column
* Then multiply the left number by the number of occurances in the right column to get each result
* Then add all the results together to get the similarity score
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

/*4: for each number in the left column, find the number of occurances within the right column:
* Then multiply the number by the number of occurances
* Then add the result to the similarity score
*/
$similarityScore = 0;
foreach ($columnOne as $number)
{
    $numberOfOccurances = 0;
    foreach ($columnTwo as $valueToCheck)
    {
        if ($number == $valueToCheck)
        {
            $numberOfOccurances++;
        }
    }
    $similarityScore += $number * $numberOfOccurances;
}

//output the similarity score:
print_r($similarityScore);
