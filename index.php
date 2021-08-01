<?php
// including database
include('db.php');
$result=$conn->query("SELECT * FROM books");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Books</title>
</head>
<body>
  
<a href="books.php" class="btn addnew">Add new Book</a>

<table>

<tr>
  <th>#</th>
  <th>Book Name</th>
  <th>Generation</th>
  <th>Price</th>
  <th>Author</th>
  <th>Copy right</th>
  <th>Publisher</th>
  <th>Edition pages</th>
  <th>ISBN</th>
  <th>Status</th>
  <th>Update</th>

</tr>

<?php
foreach($result as $book){
  echo "<tr>";
  
  echo "<td>".$book['id']."</td>";
  echo "<td>".$book['b_name']."</td>";
  echo "<td>".$book['b_generation']."</td>";
  echo "<td>".$book['b_price']." Pkr.</td>";
  echo "<td>".$book['b_author']."</td>";
  echo "<td>".$book['b_copyright']."</td>";
  echo "<td>".$book['b_publisher']."</td>";
  echo "<td>".$book['b_edition_page']."</td>";
  echo "<td>".$book['b_isbn']."</td>";
  echo "<td>".$book['b_status']."</td>";
  echo "<td><a href=\"books.php?id=".$book['id']."\" >Update</a></td>";

  echo "</tr>";
}
?>
</table>

</body>
</html>


