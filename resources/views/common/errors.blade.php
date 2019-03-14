@if(Session::has('messageD'))
    <div class="alert alert-danger alert-dismissible fade show col col-8 tuychinh" role="alert">
        <strong>{{ Session::get('messageD') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('alert'))
    <script type="text/javascript" charset="utf-8">
        alert("{{ session('alert') }}");
    </script>
@endif

