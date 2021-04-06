<?php

function RedirectTo($NewLocation)
{
    header("Location:" . $NewLocation);
    exit;
}
function ConfirmLogin()
{
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        RedirectTo("../login.php");
    }
}

function Visitors()
{
    global $con;
    $Ip = $_SERVER['REMOTE_ADDR'];
    $query = "SELECT * FROM visitors WHERE ip='$Ip'";
    $sql = mysqli_query($con, $query);
    if (mysqli_num_rows($sql) == 0) {
        $DateTime = date('H:M:S d/m/y');
        $query2 = mysqli_query($con, "INSERT INTO visitors(ip,date_time) VALUES('$Ip',now())");
    }
}

function TotalVisitors()
{
    global $con;
    $query = "SELECT * FROM visitors";
    $sql = mysqli_query($con, $query);
    $countVisitors = mysqli_num_rows($sql);
    return $countVisitors;
}


function SuccessMessage()
{
    if (isset($_SESSION['SuccessMessage'])) {
        $Output = '<div class="alert alert-success text-center" role="alert">';
        $Output .= htmlentities($_SESSION['SuccessMessage']);
        $Output .= '</div>';
        $_SESSION['SuccessMessage'] = null;
        return $Output;
    }
}

function ErrorMessage()
{
    if (isset($_SESSION['ErrorMessage'])) {
        $Output  = '<div class="alert alert-danger text-center role="alert"">';
        $Output .= htmlentities($_SESSION['ErrorMessage']);
        $Output .= '</div>';
        $_SESSION['ErrorMessage'] = null;
        return $Output;
    }
}

function InfoMessage()
{
    if (isset($_SESSION['InfoMessage'])) {
        $Output  = '<div class="alert alert-primary text-center" role="alert">';
        $Output .= htmlentities($_SESSION['InfoMessage']);
        $Output .= '</div>';
        $_SESSION['InfoMessage'] = null;
        return $Output;
    }
}

function WarningMessage()
{
    if (isset($_SESSION['WarningMessage'])) {
        $Output  = '<div class="alert alert-warning text-center" role="alert">';
        $Output .= htmlentities($_SESSION['WarningMessage']);
        $Output .= '</div>';
        $_SESSION['WarningMessage'] = null;
        return $Output;
    }
}


function TotalCategories()
{
    global $con;
    $query = "SELECT * FROM tb_category WHERE recycle='0'";
    $sql = mysqli_query($con, $query);
    $countCategory = mysqli_num_rows($sql);
    return $countCategory;
}


function TotalFoods()
{
    global $con;
    $query = "SELECT * FROM tb_food WHERE recycle='0'";
    $sql = mysqli_query($con, $query);
    $countFood = mysqli_num_rows($sql);
    return $countFood;
}


function TotalRevenue()
{
    global $con;
    $query = "SELECT SUM(total) AS Total FROM tb_order";
    $sql = mysqli_query($con, $query);
    $rows = mysqli_fetch_assoc($sql);
    $Total = $rows['Total'];
    return $Total;
}


function TotalAdmins()
{
    global $con;
    $query = "SELECT * FROM tb_users WHERE type_id='1' AND recycle='0'";
    $sql = mysqli_query($con, $query);
    $countAdmins = mysqli_num_rows($sql);
    return $countAdmins;
}
function TotalCashers()
{
    global $con;
    $query = "SELECT * FROM tb_users WHERE type_id='2' AND recycle='0'";
    $sql = mysqli_query($con, $query);
    $countCasher = mysqli_num_rows($sql);
    return $countCasher;
}

function TotalNewOrders()
{
    global $con;
    $query = "SELECT * FROM tb_order WHERE status='confirm'";
    $sql = mysqli_query($con, $query);
    $countOrders = mysqli_num_rows($sql);
    return $countOrders;
}
function TotalOrders()
{
    global $con;
    $query = "SELECT * FROM tb_order";
    $sql = mysqli_query($con, $query);
    $countOrders = mysqli_num_rows($sql);
    return $countOrders;
}
function TotalConfirmedOrders()
{
    global $con;
    $query = "SELECT * FROM tb_order WHERE status='confirmed' ";
    $sql = mysqli_query($con, $query);
    $countOrders = mysqli_num_rows($sql);
    return $countOrders;
}

