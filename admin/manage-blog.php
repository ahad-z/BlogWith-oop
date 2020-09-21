 <?php 
require_once 'header.php';
require_once "../vendor/autoload.php";

$blog = new App\classes\Blog();
$allPost  = $blog->allBlog();
?>
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
               All BLog
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="card-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>
                                    Sl No
                                </td>
                                <td>
                                    Category Name
                                </td>
                                <td>
                                    title
                                </td>
                                <td>
                                    Post  Content
                                </td> 
                                <td>
                                    Photo
                                </td>
                                 <td>
                                    Status
                                </td>
                                <td>Action</td>
                            </tr>
                            <tbody>
                                <?php
                                $sl =1;
                                while ($row = mysqli_fetch_assoc($allPost)) {?>
                                <tr>
                                    <td> <?=$sl?> </td>
                                    <td> <?=$row['category_name']?> </td>
                                    <td> <?=$row['title']?> </td>
                                    <td> <?=$row['content']?> </td>
                                    <td> <img style="width: 50px; height: 50px;" src="../uploads/<?=$row['photo']?>"> </td>
                                        
                                    <td>
                                    <?=($row['status']==1)? 'Active':'Inactive' ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($row['status'] == 1){?>

                                        <a  class="btn btn-warning" href="status.php?inActive=<?=$row['id']?>&sta=blog"><i class="fa fa-arrow-down"></i> InActive</a>
                                        
                                            <?php

                                        }else{?>
                                        <a class="btn btn-info" href="status.php?Active=<?=$row['id']?>&sta=blog"><i class="fa fa-arrow-up"></i> Active</a>


                                            <?php
                                        }

                                        ?>
                                        <a class="btn btn-warning" href="blog_edit.php?id=<?=$row['id']?>"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                        <a class="btn btn-danger" href="delete.php?id=<?=$row['id']?>&del=blog"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php  $sl++; }?> 
                                <?php if($allPost->num_rows <= 0){?>
                                	<td colspan="7" style="text-align: center; color: red">No Post available</td>
                                <?php } ?>
                                	
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php require_once 'footer.php';?>
