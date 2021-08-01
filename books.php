<?php
// including database
include('db.php');

if(!empty($_POST['book_name']) && !empty($_POST['book_generation'])  && !empty($_POST['book_price']) 
  && !empty($_POST['book_author'])  && !empty($_POST['book_copyright'])  && !empty($_POST['book_publisher']) 
  && !empty($_POST['book_editionpages'])  && !empty($_POST['book_isbn']) && !empty($_POST['book_status'])){
    
    $name=$_POST['book_name'];
    $generation=$_POST['book_generation'];
    $price=$_POST['book_price'];
    $author=$_POST['book_author'];
    $copyrighs=$_POST['book_copyright'];
    $publisher=$_POST['book_publisher'];
    $editionpages=$_POST['book_editionpages'];
    $isbn=$_POST['book_isbn'];
    $status=$_POST['book_status'];


    if(!empty($_GET['id'])){
      $id=$_GET['id'];
      $result=$conn->query("UPDATE `books` SET `b_name`='$name', `b_generation`='$generation', `b_price`='$price',
            `b_author`='$author', `b_copyright`='$copyrighs', `b_publisher`='$publisher', `b_edition_page`='$editionpages',
            `b_isbn`='$isbn', `b_status`='$status' WHERE `id`=".$id."");
      if($result){
        echo "<script>alert(\"Book has been Updated.\")</script>";
        header("Location:index.php");
      }else{
        echo "error: ".mysqli_error($conn);
      }

    }else{
      $result=$conn->query("INSERT INTO books (`b_name`, `b_generation`, `b_price`, `b_author`, `b_copyright`,
                      `b_publisher`, `b_edition_page`, `b_isbn`, `b_status` )
                      VALUES('$name', '$generation', '$price', '$author', '$copyrighs', '$publisher',
                      '$editionpages', '$isbn', '$status')");
      if($result){
      echo "<script>alert(\"Book has been added.\")</script>";
      }else{
        echo "error: ".mysqli_error($conn);
      }
    }

  }

//    getting data to update
$bname="";
$bgeneration="";
$bprice="";
$bauthor="";
$bcopyright="";
$bpublisher="";
$bedition_page="";
$bisbn="";
$bstatus="";

if(!empty($_GET['id'])){
  $_id=$_GET['id'];
  $bookdetails=mysqli_query($conn, "SELECT * FROM books WHERE id='".$_id."'");
  $book=mysqli_fetch_array($bookdetails);

  $bname=$book['b_name'];
  $bgeneration=$book['b_generation'];
  $bprice=$book['b_price'];
  $bauthor=$book['b_author'];
  $bcopyright=$book['b_copyright'];
  $bpublisher=$book['b_publisher'];
  $bedition_page=$book['b_edition_page'];
  $bisbn=$book['b_isbn'];
  $bstatus=$book['b_status'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Add/Update Book</title>
</head>
<body>
  
  <form method="POST">

    <div class="input_group">
      <label for="book_name">Book Name:</label>
      <input type="text" name="book_name" id="book_name" value="<?php echo $bname ?>" placeholder="Book Name"/>
    </div>

    
    <div class="input_group">
      <label for="deneration">Book Generation:</label>
      <input type="text" name="book_generation" id="book_deneration" value="<?php echo $bgeneration ?>" placeholder="Book Generation"/>
    </div>
    
    <div class="input_group">
      <label for="book_price">Book Price:</label>
      <input type="text" name="book_price" id="book_price" value="<?php echo $bprice ?>" placeholder="Book Price"/>
    </div>
    
    <div class="input_group">
      <label for="book_author">Book Author:</label>
      <input type="text" name="book_author" id="book_author" value="<?php echo $bauthor ?>" placeholder="Book Author"/>
    </div>
    
    <div class="input_group">
      <label for="book_copyright">Copy Rights:</label>
      <input type="text" name="book_copyright" id="book_copyright" value="<?php echo $bcopyright ?>" placeholder="Copy Rights"/>
    </div>
    
    <div class="input_group">
      <label for="book_publisher">Book Publisher:</label>
      <input type="text" name="book_publisher" id="book_publisher" value="<?php echo $bpublisher ?>" placeholder="Book Publisher"/>
    </div>
    
    <div class="input_group">
      <label for="book_editionpages">Book Edition Pages:</label>
      <input type="text" name="book_editionpages" id="book_editionpages" value="<?php echo $bedition_page ?>" placeholder="Book Edition Pages"/>
    </div>

    <div class="input_group">
      <label for="book_isbn">Book ISBN:</label>
      <input type="text" name="book_isbn" id="book_isbn" value="<?php echo $bisbn ?>" placeholder="Book ISBN"/>
    </div>

    <div class="input_group">
      <label for="book_status">Book Status:</label>
      <select name="book_status" id="book_status">
        <option value="available">Available</option>
        <option value="borrowed">Borrowed</option>
      </select>
    </div>

    <div class="btn_group">
      <button type="reset">Cancel</button>
      <button type="submit">Save</button>
    </div>  

  </form>


</body>
</html>

<?php


?>