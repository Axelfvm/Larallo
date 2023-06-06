@if ($errors->any())
    <div class="position-fixed bottom-0 p-3 w-100 d-flex justify-content-center" style="z-index: 5; left:0; bottom: 0;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header bg-danger">
                <strong class="mr-auto text-white">Error!</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body bg-danger text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        {{-- {{ toast($error, 'error') }} --}}
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
@if (session('danger'))
    <div class="position-fixed bottom-0 p-3 w-100 d-flex justify-content-center" style="z-index: 5; left:0; bottom: 0;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="5000">
            <div class="toast-header bg-danger">
                <strong class="mr-auto text-white">Error!</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body bg-danger text-white">
                {!! session('danger') !!}
            </div>
        </div>
    </div>
@endif
@if (session('warning'))
    <div class="position-fixed bottom-0 p-3 w-100 d-flex justify-content-center" style="z-index: 5; left:0; bottom: 0;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="5000">
            <div class="toast-header bg-warning">
                <strong class="mr-auto">Error!</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body bg-warning">
                {!! session('warning') !!}
            </div>
        </div>
    </div>
@endif
@if (session('success'))
    <div class="position-fixed bottom-0 p-3 w-100 d-flex justify-content-center" style="z-index: 5; left:0; bottom: 0;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="5000">
            <div class="toast-header bg-success">
                <strong class="mr-auto text-white">Success!</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body bg-success text-white">
                {!! session('success') !!}
            </div>
        </div>
    </div>
@endif



<script>
    $(document).ready(function() {
        $('.toast').toast('show');
    });
</script>
