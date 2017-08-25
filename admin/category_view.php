<?php include_once "header_admin.php"?>
<!-- container section start -->
<section id="container" class="">

    <!--include top content of dashboard page like username at the right of the top-->
    <?php require_once("header_sidebar.php") ?>
    <!--header end-->

    <!--sidebar start-->
    <?php require_once("sidebar.php") ?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--Display head of content ex: Dashboard/Home/add about-->
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-id-card" aria-hidden="true"></i> <strong>All Categories</strong>  <i class="fa fa-angle-right" aria-hidden="true"></i></li>
                    </ol>
                </div>
            </div>

            <!-- query all username from database -->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">

                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                            <tr>
                                <th><i class="fa fa-hashtag" aria-hidden="true"></i> cat_id</th>
                                <th><i class="fa fa-th-large" aria-hidden="true"></i> category</th>
                                <th><i class="fa fa-arrow-down" aria-hidden="true"></i> cat_icon</th>
                                <th> # user_id </th>
                                <th><i class="fa fa-calendar" aria-hidden="true"></i> date</th>
                                <th><i class="fa fa-cogs" aria-hidden="true"></i> action</th>
                            </tr>
                            <tr>
                                <?php
                                include "../include/connection.php";

                                $query = "SELECT * FROM tbl_category ORDER BY cat_name ASC ";
                                $display = mysqli_query($conn, $query);
                                ?>


                                <?php

                                while ($row = mysqli_fetch_assoc($display)):?>
                            <tr>
                                <td><?php echo $row['cat_id']?></td>
                                <td><?php echo $row['cat_icon']." "." ".$row['cat_name']?>
                                <td><?php echo $row['cat_icon']?></td>
                                <td><?php echo $row['user_id']?></td>
                                <td><?php echo $row['create_date']?></td>
                                <td>
                                    <?php echo "<a href=category_edit_form.php?id=". $row['cat_id']." ><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> Edit</a>" ?> |
                                    <!--                                          --><?php //echo "<a href=delete_category.php?id=". $row['cat_id']." ><i class=\"fa fa-times\" aria-hidden=\"true\"></i> Delete</a>" ?>
                                    <a href="category_delete.php?id=<?php echo $row['cat_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to delete ?')"><i class="fa fa-times" aria-hidden="true"></i> Delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            </tr>
                            </tbody>
                        </table>


                    </section>
                </div>
            </div>


            <?php if(isset($_GET['deleteSuccess'])) :?>
                <div class="col-md-3 pull-right alert alert-danger text-center">
                    <h5><i class="fa fa-times" aria-hidden="true"></i> <?php echo $_GET['deleteSuccess']; ?></h5>
                </div>
            <?php endif; ?>


            <?php if(isset($_GET['error'])) :?>
                <div class="alert alert-success" style=" background-color: #ffffff; text-align: center; font-weight: bold">
                    <h4><i class="fa fa-check-square" aria-hidden="true"></i>
                        <?php echo $_GET['error']; ?></h4>
                </div>
            <?php endif; ?>


            <!-- End query all users to display dashboard -->


        </section> <!-- End of section -->

        <!-- include javascript code from file -->
        <?php require_once("javascript_footer.php") ?>

