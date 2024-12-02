<?php

/*
* Each line is of the form: 65 67 70 72 74 73
* Check if each line is either increasing or decreasing
* The increase or decrease between the numbers can only be between 1-3
*/

//1: get the file input and split it into individual lines:
$input = file_get_contents('./input.txt');
$lines = explode("\n", $input);

$validReportCount = 0;
//2: for each line, map the line to an array of 5 numbers
foreach ($lines as $line)
{
    $reports = explode(' ', $line);
    $isValidReport = true;
    //3: Are we checking for increasing numbers or decreasing numbers?
    //increasing
    if ($reports[1] > $reports[0])
    {
        //iterate through each number in the reports, and check if it fits the "safe" criteria:
        for ($i = 0; $i < count($reports) - 1; $i++)
        {
            $difference = abs($reports[$i] - $reports[$i + 1]);
            //if the next number is lower, or the differance is not between 1-3 then the report is invalid:
            if (($reports[$i + 1] < $reports[$i]) || ($difference < 1 || $difference > 3))
            {
                $isValidReport = false;
            }
        }
    }
    //decreasing
    elseif ($reports[1] < $reports[0])
    {
        //iterate through each number in the reports, and check if it fits the "safe" criteria:
        for ($i = 0; $i < count($reports) - 1; $i++)
        {
            $difference = abs($reports[$i] - $reports[$i + 1]);
            //if the next number is higher, or the difference is not between 1-3 then the report is invalid:
            if (($reports[$i + 1] > $reports[$i]) || ($difference < 1 || $difference > 3))
            {
                $isValidReport = false;
            }
        }
    }
    //invalid due to the first and next bieng equal
    elseif ($reports[1] == $reports[0])
    {
        $isValidReport = false;
    }

    //if the report is still valid, then increment the validReportCount
    if ($isValidReport)
    {
        $validReportCount++;
    }
}
//output the number of valid reports:
print_r($validReportCount);
