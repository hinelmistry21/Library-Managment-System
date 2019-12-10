<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php
include('includes/config.php');
session_start();
$id=$_SESSION['login'];
$output='';
$sql="SELECT * FROM student_issuetable where StudentId='".$_SESSION['login']."' ";
$result=mysqli_query($conn,"CALL sp_ShowBookIssuelistStudent('".$_SESSION['login']."')");

if(mysqli_num_rows($result)>0)
{
    $output .='<div class="table-responsive">
                    <table class="table table bordered" >
                    <tr>
                    <th> Book Name </th>
                    <th> Book Author</th>
                    <th> Book Edition</th>
                    <th> Return Date</th>
                    </tr>';
    while($row=mysqli_fetch_array($result))
    {
        $output .= '
            <tr>
                <td>'.$row["Book_name"].'</td>
                <td>'.$row["Book_author"].'</td>
                <td>'.$row["Book_edition"].'</td>
                <td>'.$row["ReturnDate"].'</td>
            </tr>';
    }
    echo $output;

}
else
{
    echo 'Data not found';
}

?>