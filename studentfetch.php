<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php
include('includes/config.php');
$output='';
$sql="SELECT student.StudentId,student.DepartmentId,student.BookCount,student.Year,IFNULL(student_issuetable.BookId,'-1') as BookId,IFNULL(student_issuetable.Issue_Date,'0000-00-00') as IssueDate,IFNULL(student_issuetable.ReturnDate,'0000-00-00') as ReturnDate, (CASE WHEN DATEDIFF(now(),student_issuetable.ReturnDate)>0 THEN DATEDIFF(now(),student_issuetable.ReturnDate)*5 ELSE 0 END) as Fine FROM student LEFT JOIN student_issuetable ON student.StudentId = student_issuetable.StudentId where student.StudentId LIKE '%".$_POST["search"]."%'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    $output .= '<h4 align="center">Search Result</h4>';
    $output .='<div class="table-responsive">
                    <table class="table table bordered">
                    <tr>
                    <th>Student Id </th>
                    <th>Department Id</th>
                    <th>Book Count</th>
                    <th>Year</th>
                    <th>Book Id</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Fine</th>
                    </tr>';
    while($row=mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td>'.$row["StudentId"].'</td>
                <td>'.$row["DepartmentId"].'</td>
                <td>'.$row["BookCount"].'</td>
                <td>'.$row["Year"].'</td>
                <td>'.$row["BookId"].'</td>
                <td>'.$row["IssueDate"].'</td>
                <td>'.$row["ReturnDate"].'</td>
                <td>'.$row["Fine"].'</td>
                
               
            </tr>';
    }
    echo $output;

}
else
{
    echo 'Data not found';
}

?>