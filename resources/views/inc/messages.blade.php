@if(Session::has('success'))
    <div id="success" class="alert alert-success">
        {{Session::get('success')}}
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('success').style.display = 'none';
        }, 3000);
    </script>
@endif

@if(Session::has('error'))
    <div id="error" class="alert alert-danger">
        {{Session::get('error')}}
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('success').style.display = 'none';
        }, 10000);
    </script>
@endif
