@if(request()->session()->has('status'))

    <div class="alert {{(request()->session()->get('status')) ? 'alert-success' : 'alert-danger'}} alert-dismissible fade show" role="alert">
        {{request()->session()->get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
