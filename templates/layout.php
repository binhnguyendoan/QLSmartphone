<!-- /templates/layout.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS via CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link rel="stylesheet" href="../public/css/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../public/css/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../public/css/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../public/css/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="../public/css/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="../public/css/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../public/css/assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../public/css/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../public/css/assets/images/favicon.png" />
    <link rel="stylesheet" href="../public/css/style.css">
    <title>App</title>
</head>

<body>
    <div class=" ">
        <?= $content ?>
    </div>

    <!-- Include Bootstrap JS and Popper.js via CDN (required for Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../public/css/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../public/css/assets/vendors/chart.js/chart.umd.js"></script>
    <script src="../public/css/assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="../public/css/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="../public/css/assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../public/css/assets/js/off-canvas.js"></script>
    <script src="../public/css/assets/js/template.js"></script>
    <script src="../public/css/assets/js/settings.js"></script>
    <script src="../public/css/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../public/css/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../public/css/assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
</body>

</html>