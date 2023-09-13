<?php


$ROW = 5;
$COL = 5;


function checkCells(&$M, $row, $col,
				&$visited)
{
	global $ROW, $COL;
	
	
	return ($row >= 0) && ($row < $ROW) &&	
		($col >= 0) && ($col < $COL) &&	
		($M[$row][$col] &&
			!isset($visited[$row][$col]));
}


function findIslands(&$M, $row, $col,
			&$visited)
{
	// These arrays are used to
	// get row and column numbers
	// of 8 neighbours of a given cell
	$rowNbr = array(-1, -1, -1, 0,
					0, 1, 1, 1);
	$colNbr = array(-1, 0, 1, -1,
					1, -1, 0, 1);

	// Mark this cell as visited
	$visited[$row][$col] = true;

	// Recur for all
	// connected neighbours
	for ($k = 0; $k < 8; ++$k)
		if (checkCells($M, $row + $rowNbr[$k],
				$col + $colNbr[$k], $visited))
			findIslands($M, $row + $rowNbr[$k],
				$col + $colNbr[$k], $visited);
}

// The main function that returns
// count of islands in a given
// boolean 2D matrix
function calculatetIslands(&$M)
{
	global $ROW, $COL;
	
	
	$visited = array(array());

	
	$count = 0;
	for ($i = 0; $i < $ROW; ++$i)
		for ($j = 0; $j < $COL; ++$j)
			if ($M[$i][$j] &&
				!isset($visited[$i][$j])) 
			{							 
				findIslands($M, $i, $j, $visited); 
				++$count;				 
			}							

	return $count;
}

// Input
$M =  [
    [1,1,1,0,1],
    [0,1,0,1,0],
    [1,0,1,0,0],
    [0,0,0,1,0],
    [1,0,0,0,1]
];

echo "Total islands are: ",
			calculatetIslands($M);


?>
