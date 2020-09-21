<?php 
require_once 'header.php';
require_once "../vendor/autoload.php";

$catShow = new App\classes\Category();
$CategoryALl  = $catShow->allCategory();
?>
<div class="row">
    <div class="col-sm-12">
        <section class="card">
            <header class="card-header">
                Dynamic Table
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
                                    Status
                                </td>
                                <td style="width:300px">
                                    Action
                                </td>
                            </tr>
                            <tbody>
                                <?php
                                $sl =1;
                                while ($row = mysqli_fetch_assoc($CategoryALl)) {?>
                                <tr>
                                    <td>
                                        <?=$sl?>
                                    </td>
                                    <td>
                                        <?=$row['category_name']?>
                                    </td>
                                        
                                    <td>
                                    <?=($row['status']==1)? 'Active':'Inactive' ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($row['status'] == 1){?>

                                        <a class="btn btn-warning" href="status.php?inactive=<?=$row['id']?>&sta=category"><i class="fa fa-arrow-down"></i> InActive</a>
                                        
                                            <?php

                                        }else{?>
                                        <a class="btn btn-info" href="status.php?active=<?=$row['id']?>&sta=category"><i class="fa fa-arrow-up"></i> Active</a>


                                            <?php
                                        }

                                        ?>
                                        <a class="btn btn-warning" href="edit.php?id=<?=$row['id']?>"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                        <a class="btn btn-danger" href="delete.php?id=<?=$row['id']?>&cat=category"><i class="fa fa-trash-o"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php  $sl++; }?>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php require_once 'footer.php';?>
