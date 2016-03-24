@if(Session::has('flash_notification.message'))
    <div class="alert alert-{{Session::get('flash_notification.level')}}" role='alert'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('flash_notification.message')}}
    </div>

    <script type="application/javascript">

    </script>
@endif