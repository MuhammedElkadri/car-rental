<!-- Start of Selection -->
@if (session('error'))
<div class="alert alert-danger alert-dismissible" role="alert" style=" text-align: center;  position: fixed; top: 0; width: 100%; z-index: 9999; display: block;" id="alertMessage">
    {{ session('error') }}
</div>
@endif
<!-- Start of Selection -->
@if (session('success'))
<div class="alert alert-success" role="alert" style=" text-align: center; position: fixed; top: 0; width: 100%; z-index: 9999; display: block;" id="alertMessage">
    {{ session('success') }}
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var alertMessage = document.getElementById('alertMessage');
        setTimeout(function() {
            alertMessage.style.display = 'none';
        }, 3000);
    });
</script>
<!-- End of Selection -->