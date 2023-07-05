@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="notification_bar margin_ctr notification_error" >
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="notification_bar margin_ctr notification_success" >
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="notification_bar margin_ctr notification_error" >
        {{session('error')}}
    </div>
@endif