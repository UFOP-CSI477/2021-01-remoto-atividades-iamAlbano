<div id="alert" class="alert alert-success alert-dismissible fixed-bottom" role="alert">
         <p>{{ session('success')}}</p>

    <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

<script>
    setTimeout(function() {
    $('.alert').fadeOut('slow');
 }, 5000);
</script>