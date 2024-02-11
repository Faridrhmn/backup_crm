
<div id="app">

</div>
<script src="<?= base_url(); ?>public/dist/assets/extensions/jquery/jquery.min.js"></script>
<script>
    $(function(){
        loadLoginForm();
    });
    function loadLoginForm(){
        $.ajax({
            type: "GET",
            url: "login",
            success: function (response) {
                $('#app').html(response);
            }
        });
    }
</script>