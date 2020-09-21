<?php
 require_once 'header.php';

 require_once "./vendor/autoload.php";

$cat = new App\classes\Category();

$AllCat = $cat->allActiveCategory();

$id = $_GET['id'];
$allCatPost = $cat->CatchPost($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blog Home - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="assets/css/blog-home.css" rel="stylesheet">

</head>
<body>
  <!-- Navigation -->
 
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">
        </h1>

        <!-- Blog Post -->
        <?php while ($row = mysqli_fetch_assoc($allCatPost)) {?>
        <div class="card mb-4">
          <img class="card-img-top" src="./uploads/<?=$row['photo']?>">
          <div class="card-body">
            <h2 class="card-title"><?=$row['title']?></h2>
            <p class="card-text"><?=$row['content']?></p>
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?=date('d M Y',strtotime($row['createtime']))?> by
            <a href="#"><?=$row['name']?></a>
          </div>
        </div>
      <?php } ?>

        

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget --> 
       <?php require_once 'widget.php'; ?>
        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <?php while($row = mysqli_fetch_assoc($AllCat)){?>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="category.php?id=<?=$row['id']?>"><?=$row['category_name']?></a>
                  </li>
                </ul>
              </div>
                <?php } ?>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php require_once 'footer.php'; ?>
