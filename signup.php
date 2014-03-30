<!DOCTYPE HTML> 
<html>
<head>
</head>
<body> 


<h2>Welcome To 9to5</h2>
<form method="post" action="" name="create" onsubmit="return validateForm()">
    <table>
        <tr>
            <td>
                <h2 style="display:inline;">Name:</h2>
            </td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
   </table>
  
   <br><br>
   <h2>Income:</h2>
   <table>
        <tr>
            <td>
                <h3 style="display:inline;">Name:</h3>
            </td>
            <td>
                <input type="text" name="income-name"><br>
            </td>
        </tr>
        <tr>
            <td>
                <h3 style="display:inline;">Amount:</h3>
            </td>
            <td>
               <input type="text" name="income-amount"  value="0"><br>
            </td>
        </tr>
        <tr>
            <td>
               <h3 style="display:inline;">Rate:</h3>
            </td>
            <td>
               <select>
                    <option name="rate" value="4">Per Year</option>
                    <option name="rate" value="3">Per Month</option>
                    <option name="rate" value="2">Per Week</option>
                    <option name="rate" value="1">Per Day</option>
                </select>
            </td>
        </tr>
   </table>
   <br><br>
   <h2>Expense:</h2>
   <table>
        <tr>
            <td>
                <h3 style="display:inline;">Name:</h3>
            </td>
            <td>
                <input type="text" name="expense-name"><br>
            </td>
        </tr>
        <tr>
            <td>
                <h3 style="display:inline;">Amount:</h3>
            </td>
            <td>
               <input type="text" name="expense-amount" value="0"><br>
            </td>
        </tr>
   </table>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
<script type="text/javascript">
    
    function validateForm()
    {
    var r=document.forms["create"]["name"].value;
    var w=document.forms["create"]["expense-name"].value;
    var q=document.forms["create"]["income-name"].value;
    
    if (r==null || r=="" || w==null || w=="" || q==null || q=="" )
      {
      alert("The name is not valid");
      return false;
      }
    var y=document.forms["create"]["income-amount"].value;
    if (y==null || !y.match(/^\d+/) || parseInt(y) <= 0)
      {
      alert("The income amount is not valid");
      return false;
      }
    var x=document.forms["create"]["expense-amount"].value;
    if (x==null || !x.match(/^\d+/) || parseInt(x) <= 0)
      {
      alert("The expense amount is not valid");
      return false;
      }
    return true;
    }
</script>
</body>
</html>

<?php
//setcookie("user", "name");
?>