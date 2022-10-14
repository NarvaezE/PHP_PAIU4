<?php
	include "../app/ProductsController.php";

	$productController = new ProductsController(); 

	$product = $productController->getProductBySlug($_GET['slug']);

	#echo json_encode($product);
?> 
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <?php include "../layouts/head.template.php"; ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

    	<?php include "../layouts/nav.template.php"; ?>
        
        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php"; ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php include "../layouts/bread.template.php"; ?>
                    <!-- end page title -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include "../layouts/footer.template.php"; ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.template.php"; ?>
   
</body>


</html>










