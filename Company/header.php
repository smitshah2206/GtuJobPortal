<?php 
    include '../common_function.php';
    include '../company_function.php';
    include '../connection.php';
    dashboard_session();
    if ($_SERVER['REQUEST_URI'] != '/GtuJobPortal/Company/editprofile.php') {
        $status = company_get_status($conn,$_SESSION['id']);
        if($status == 1)
        {
            $_SESSION['first_time_login'] = 1;
            redirect_link('','editprofile.php');
        } else if ($status == 5) {
            redirect_link('Your profile is under verification','logout.php');
        }
        if(company_get_status($conn,$_SESSION['id']) == 1)
        {
            redirect_link('','editprofile.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $titlename;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">