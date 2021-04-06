<!--Start Main content container-->
<div class="main_content_container">
    <div class="main_container main_menu_open">
        <!--Start system bath-->
        <div class="home_pass hidden-xs">
            <ul>
                <li class="bring_right">
                    <span class="glyphicon glyphicon-home"></span>
                </li>
                <li class="bring_right"><a href="">جۆرەکان</a></li>
                <li class="bring_right"><a href="">زیادکردنی جۆر</a></li>
            </ul>
        </div>
        <!--/End system bath-->
        <div class="page_content">
            <h1 class="heading_title">زیادکردنی جۆر</h1>

            <!--Start status alert-->
            <?php
            echo SuccessMessage();
            echo ErrorMessage();
            ?>
            <!--/End status alert-->

            <div class="form">
                <?php

                $query = "SELECT * FROM system_setting";
                $sql = mysqli_query($con, $query);
                $count = mysqli_num_rows($sql);
                if ($count == 1) {
                    while ($rows = mysqli_fetch_assoc($sql)) {
                        $Title = $rows['title'];
                        $Logo = $rows['logo'];
                        $Icon = $rows['icon_img'];
                ?>

                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">تایتڵ</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?php echo htmlentities($Title); ?>" name="Title" class="form-control" id="input0" placeholder="تایتڵ" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label bring_right left_text">لۆگۆی دانراو</label>
                                <div class="col-sm-10">
                                    <?php
                                    if ($Logo != "") {
                                        echo '<img src="../images/' . $Logo . '" class="img-rounded user_thumb" alt="">';
                                    } else {
                                        echo '<span class="text-danger" >نییە</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">لۆگۆ</label>
                                <div class="col-sm-10">
                                    <input type="file" name="LogoName" class="form-control" id="input2" />
                                    <input type="hidden" name="CurrentLogo" class="form-control" id="input2" value="<?php echo htmlentities($Logo); ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label bring_right left_text">ئایکۆنی دانراو</label>
                                <div class="col-sm-10">
                                    <?php
                                    if ($Icon != "") {
                                        echo '<img src="../images/' . $Icon . '" class="img-rounded user_thumb" alt="">';
                                    } else {
                                        echo '<span class="text-danger" >نییە</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">ئایکۆن</label>
                                <div class="col-sm-10">
                                    <input type="file" name="IconName" class="form-control" id="input3" />
                                    <input type="hidden" name="CurrentIcon" class="form-control" id="input3" value="<?php echo htmlentities($Icon); ?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" name="save" class="btn btn-success">
                                        پاشەکەوتکردن
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        سڕینەوە
                                    </button>
                                </div>
                            </div>
                        </form>
                <?php
                    }
                } else {
                    RedirectTo("/food-order-system/admin");
                }

                if (isset($_POST['save'])) {
                    //wargrtnaway nrx la category form
                    $Title = $_POST['Title'];
                    $DateTime = date('H:M:S d/m/y');
                    $CurrentLogo = $_POST['CurrentLogo'];
                    $CurrentIcon = $_POST['CurrentIcon'];
                    $UpdateBy = $_SESSION['username'];



                    if (isset($_FILES['LogoName']['name'])) {

                        $LogoName = $_FILES['LogoName']['name'];


                        if ($LogoName != "") {
                            //danany extention bo image
                            $ext = end(explode('.', $LogoName));

                            //goriny nawy image
                            $LogoName = "Logo_" . rand(000, 999) . '.' . $ext;
                            //nardny image bo database
                            $LogoNameTemp = $_FILES['LogoName']['tmp_name'];
                            $IconDestination = "../images/" . $LogoName;
                            $UploadIcon = move_uploaded_file($LogoNameTemp, $IconDestination);

                            if ($Image != "") {
                                $Path = "../images/" . $Icon;
                                $Remove = unlink($Path);
                            }
                        } else {
                            $LogoName = $CurrentLogo;
                        }
                    } else {
                        $LogoImage = "";
                    }



                    if (isset($_FILES['IconName']['name'])) {

                        $IconName = $_FILES['IconName']['name'];


                        if ($IconName != "") {
                            //danany extention bo image
                            $ext = end(explode('.', $IconName));

                            //goriny nawy image
                            $IconName = "Icon_" . rand(000, 999) . '.' . $ext;
                            //nardny image bo database
                            $IconNameTemp = $_FILES['IconName']['tmp_name'];
                            $IconDestination = "../images/" . $IconName;
                            $UploadIcon = move_uploaded_file($IconNameTemp, $IconDestination);

                            if ($Image != "") {
                                $Path = "../images/" . $Icon;
                                $Remove = unlink($Path);
                            }
                        } else {
                            $IconName = $CurrentIcon;
                        }
                    } else {
                        $IconImage = "";
                    }

                    $query = "UPDATE system_setting SET title='$Title',logo='$LogoName',icon_img='$IconName',date_time=now(),updateby='$UpdateBy'";
                    $sql = mysqli_query($con, $query);

                    if ($sql) {
                        $_SESSION['SuccessMessage'] = 'بە سەرکەوتوی نوێکرایەوە';
                        RedirectTo("/food-order-system/admin");
                    } else {
                        $_SESSION['ErrorMessage'] = 'تکایە دوبارە هەوڵبدەوە';
                        RedirectTo("user_info.php?source=setting");
                    }
                }




                ?>

            </div>
        </div>
    </div>
</div>
<!--/End Main content container-->
</div>
<!--/End body container section-->
</div>