@if (session()->has('suc'))
    <div class="container">
        <div class="alert alert-success" role="alert">
            {{ session()->get('suc') }}
        </div>
    </div>
    
@endif   
@if (session()->has('err'))
    <div class="container">
        <div class="alert alert-danger" role="alert">
            {{ session()->get('err') }}
        </div>
    </div>
    
@endif   