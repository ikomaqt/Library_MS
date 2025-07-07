<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == 0) { 
    header('location:index.php');
} else { ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Online Library Management System - Admin Dashboard" />
    <meta name="author" content="Library Admin" />
    <title>Online Library Management System | Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- Custom Dashboard CSS -->
    <link href="assets/css/dashboard-style.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background-color: #121212; color: #ffffff; padding-top: 0px; ">
    <!-- MENU SECTION START -->
    <?php include('includes/header.php'); ?>
    <!-- MENU SECTION END -->

    <div class="content-wrapper" style="background-color: #1a1a2e; padding: 20px; border-radius: 8px;">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line" style="color: white;">ADMIN DASHBOARD</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <a href="manage-books.php" class="no-underline">
                        <div class="dashboard-card card-primary" style="background-color: #2c2c2c; color: #ffffff; border: none; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="card-content" style="padding: 20px; background-color: #1a1a2e;">
                                <div class="card-icon">
                                    <i class="material-icons-round" style="color: #ffcc00;">menu_book</i>
                                </div>
                                <?php 
                                $sql = "SELECT id FROM tblbooks";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $listdbooks = $query->rowCount();
                                ?>
                                <h3 class="card-count" style="font-size: 2rem; font-weight: bold;"><?php echo htmlentities($listdbooks); ?></h3>
                                <p class="card-label" style="font-size: 1rem; font-weight: 500;">Books in Collection</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="manage-issued-books.php" class="no-underline">
                        <div class="dashboard-card card-warning" style="background-color: #2c2c2c; color: #ffffff; border: none; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="card-content" style="padding: 20px; background-color: #1a1a2e;">
                                <div class="card-icon">
                                    <i class="material-icons-round" style="color: #ffcc00;">pending_actions</i>
                                </div>
                                <?php 
                                $sql2 = "SELECT id FROM tblissuedbookdetails WHERE (ReturnStatus='' OR ReturnStatus IS NULL)";
                                $query2 = $dbh->prepare($sql2);
                                $query2->execute();
                                $returnedbooks = $query2->rowCount();
                                ?>
                                <h3 class="card-count" style="font-size: 2rem; font-weight: bold;"><?php echo htmlentities($returnedbooks); ?></h3>
                                <p class="card-label" style="font-size: 1rem; font-weight: 500;">Books Checked Out</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="reg-students.php" class="no-underline">
                        <div class="dashboard-card card-danger" style="background-color: #2c2c2c; color: #ffffff; border: none; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="card-content" style="padding: 20px; background-color: #1a1a2e;">
                                <div class="card-icon">
                                    <i class="material-icons-round" style="color: #ffcc00;">school</i>
                                </div>
                                <?php 
                                $sql3 = "SELECT id FROM tblstudents";
                                $query3 = $dbh->prepare($sql3);
                                $query3->execute();
                                $regstds = $query3->rowCount();
                                ?>
                                <h3 class="card-count" style="font-size: 2rem; font-weight: bold;"><?php echo htmlentities($regstds); ?></h3>
                                <p class="card-label" style="font-size: 1rem; font-weight: 500;">Registered Students</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="manage-publishers.php" class="no-underline">
                        <div class="dashboard-card card-success" style="background-color: #2c2c2c; color: #ffffff; border: none; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="card-content" style="padding: 20px; background-color: #1a1a2e;">
                                <div class="card-icon">
                                    <i class="material-icons-round" style="color: #ffcc00;">business</i>
                                </div>
                                <?php 
                                $sql4 = "SELECT id FROM tblpublishers";
                                $query4 = $dbh->prepare($sql4);
                                $query4->execute();
                                $listdpublishers = $query4->rowCount();
                                ?>
                                <h3 class="card-count" style="font-size: 2rem; font-weight: bold;"><?php echo htmlentities($listdpublishers); ?></h3>
                                <p class="card-label" style="font-size: 1rem; font-weight: 500;">Publishing Partners</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="manage-categories.php" class="no-underline">
                        <div class="dashboard-card card-info" style="background-color: #2c2c2c; color: #ffffff; border: none; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="card-content" style="padding: 20px; background-color: #1a1a2e;">
                                <div class="card-icon">
                                    <i class="material-icons-round" style="color: #ffcc00;">category</i>
                                </div>
                                <?php 
                                $sql5 = "SELECT id FROM tblcategory";
                                $query5 = $dbh->prepare($sql5);
                                $query5->execute();
                                $listdcats = $query5->rowCount();
                                ?>
                                <h3 class="card-count" style="font-size: 2rem; font-weight: bold;"><?php echo htmlentities($listdcats); ?></h3>
                                <p class="card-label" style="font-size: 1rem; font-weight: 500;">Book Categories</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="manage-issued-books.php" class="no-underline">
                        <div class="dashboard-card" style="background: linear-gradient(135deg, #7209b7, #560bad); color: #ffffff; border: none; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="card-content" style="padding: 20px; background-color: #1a1a2e;">
                                <div class="card-icon">
                                    <i class="material-icons-round" style="color: #ffcc00;">history_edu</i>
                                </div>
                                <?php 
                                $sql6 = "SELECT id FROM tblissuedbookdetails WHERE ReturnStatus=1";
                                $query6 = $dbh->prepare($sql6);
                                $query6->execute();
                                $returnedcount = $query6->rowCount();
                                ?>
                                <h3 class="card-count" style="font-size: 2rem; font-weight: bold;"><?php echo htmlentities($returnedcount); ?></h3>
                                <p class="card-label" style="font-size: 1rem; font-weight: 500;">Books Returned</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/custom.js"></script>
    
    <script>
        // Add animation on scroll
        $(document).ready(function() {
            // Initialize cards with opacity 0
            $('.dashboard-card').css('opacity', '0');
            
            // Function to check if element is in viewport
            function isInViewport(element) {
                var rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }
            
            // Animate cards when they come into view
            function animateCards() {
                $('.dashboard-card').each(function() {
                    if (isInViewport(this)) {
                        $(this).css({
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }
                });
            }
            
            // Run on load and scroll
            animateCards();
            $(window).scroll(animateCards);
        });
    </script>
</body>
</html>
<?php } ?>