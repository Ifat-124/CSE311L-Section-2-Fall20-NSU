<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "cse311l_section_2_fall_20");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$employees = "INSERT INTO Employees (SELECT job_id, SUM(salary), AVG(salary), MAX(salary), MIN(salary)
FROM employees 
WHERE department_id = '90' 
GROUP BY Job_Id)";


if(mysqli_query($link, $employees)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $employees. " . mysqli_error($link);
}



$employees = "INSERT INTO Employees (SELECT manager_id, MIN(salary)
FROM employees
WHERE manager_id IS NOT NULL
GROUP BY manager_id
HAVING MIN(salary) > 6000
ORDER BY MIN(salary) DESC)";


if(mysqli_query($link, $employees)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $employees. " . mysqli_error($link);
}



$employees = "INSERT INTO Employees (SELECT job_id, COUNT(*)
FROM employees
GROUP BY job_id)";


if(mysqli_query($link, $employees)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $employees. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>