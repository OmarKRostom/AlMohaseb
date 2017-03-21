@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        <script type="text/javascript">
            swal({
                type: '{{ session('flash_notification.level') }}',
                title: '{{ session('flash_notification.title') }}',
                text: '{!! session('flash_notification.message') !!}',
                html: true
            });
        </script>
    @else
        <div class="alert
                    alert-{{ session('flash_notification.level') }}
                    {{ session()->has('flash_notification.important') ? 'alert-important' : '' }}"
        >
            @if(session()->has('flash_notification.important'))
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! session('flash_notification.message') !!}
        </div>
    @endif
@endif
