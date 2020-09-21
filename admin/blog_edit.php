<?php 

require_once 'header.php';

require_once "../vendor/autoload.php";

$blog = new App\classes\Blog();
$cat = new App\classes\Category();

$allActiveCat = $cat->allActiveCategory();
$tableName = 'blog';
$id = $_GET['id'];
$allPost = $blog->showAllPost($id,$tableName);
$row1 = mysqli_fetch_assoc($allPost);

if(isset($_POST['update_blog'])){

   $blog->editBlog($_POST);
}
?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header style="text-align: center; margin-top:20px;">
                <?php /*if(isset($_SESSION['insertmsg'])){
                echo $_SESSION['insertmsg'];
                session_destroy();
            }*/
                ?>
            </header>
            <header class="card-header">
                BLog Add Forms! 
            </header>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="name" value="<?=$_SESSION['name']?>">
                    <input type="hidden" name="id" value="<?=$row1['id']?>">
                    <div class="form-group row">
                        <label for="cat_id" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <select name="cat_id" id="cat_id" class="form-control">
                                <option>Select Category</option>
                                <?php while ($row = mysqli_fetch_assoc($allActiveCat)) {?>
                                    <option <?=$row['id'] == $row1['cat_id'] ? 'selected': ''?> value="<?=$row['id']?>"><?=$row['category_name']?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Type Your Category Name.." value="<?=$row1['title']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-3 col-form-label">photo</label>
                        <div class="col-sm-9">
                            <input type="file"  id="photo" name="photo" >
                        <img style="width: 100px;height: 60px;" src="../uploads/<?=$row1['photo']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Blog content</label>
                        <div class="col-sm-9">
                            <textarea class="summernote" name="content"><?=$row1['content']?></textarea>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="active" value="1" <?=$row1['status']==1 ?'checked':''?> >
                                    <label class="form-check-label" for="active">
                                        active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?=$row1['status']==0 ?'checked':''?>>
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="update_blog">Update</button>
                        </div>
                    </div>
                    <?php
                    if(isset($LoginError)){?>

                    <p style="text-align: center;"><?=$LoginError ?></p>

                        <?php 
                    }?>
                </form>
            </div>
        </section>
    </div>
</div>
<?php require_once 'footer.php';?>