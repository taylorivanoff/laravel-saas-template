<div class="mt-4 mb-0">
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ $slot }}

        @if(isset($link) && !empty($link))
            <a href="{{ $link }}" class="alert-link">
                {{ session('alert_link_name') }}
            </a>
        @endif
    </div>
</div>
