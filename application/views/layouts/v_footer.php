<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://saugi.me">PT Seigan</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script>
            $(function(){
                loadDashboard();
            });
            function loadDashboard(){
                $.ajax({
                    type: "GET",
                    url: "<?=site_url('admin/customer');?>",
                    success: function (response) {
                        console.log("aman")
                        $('#content').html(response);
                        
                    }
                });
            }
    </script>
    <script src="<?= base_url(); ?>public/dist/assets/static/js/components/dark.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="<?= base_url(); ?>public/dist/assets/compiled/js/app.js"></script>



    <!-- Need: Apexcharts -->
    <script src="<?= base_url(); ?>public/dist/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>public/dist/assets/static/js/pages/dashboard.js"></script>
    
</body>

</html>