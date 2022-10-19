<?php

require_once  './function/config.php';

if (!isset($_SESSION['ADMIN'])) {
    header("location:login.php");
}

?>

</div>
<footer class="main-footer">
    <div class="footer-left">
        <a href="templateshub.net">Copyright@2022 By 涂正刚 v1.0</a></a>
    </div>
    <div class="footer-right">
    </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="assets/bundles/chartjs/chart.min.js"></script>
<script src="assets/bundles/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="assets/bundles/summernote/summernote-bs4.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/widget-data.js"></script>
<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="assets/js/custom.js"></script>

<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->

</html>