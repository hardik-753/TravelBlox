<?php 

$file = fopen("employee.csv","r");
$count=0;
$flag = false;

$con = mysqli_connect("localhost","root","","hardik");
if(!$con)
echo "Error..!";
else
{
    while (($raw = fgetcsv($file)) != false)
    {
        if($count != 0)
        {
            $query = "insert into employee_master values ($raw[0],'$raw[1]','$raw[2]','$raw[3]',$raw[4])";
            $result = mysqli_query($con,$query);
            $flag=true;
        }
        $count++;
    }
    if($flag)
    echo "Data Inserted...!!";  
}
fclose($file);

?>