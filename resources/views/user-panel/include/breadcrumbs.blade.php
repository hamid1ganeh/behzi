@if (count($breadcrumbs))

    <div class="d-flex align-items-center font-weight-bold my-2 table-responsive user-breadcrumb">
        <a href="#" class="opacity-75 hover-opacity-100">
            <i class="flaticon2-shelter text-white icon-1x"></i>
        </a>

        @foreach ($breadcrumbs as $breadcrumb)

            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>

            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}" style="display: block ruby"
                   class="text-white text-hover-white opacity-75 hover-opacity-100">{{ $breadcrumb->title }}</a>
            @else
                <span  style="display: block ruby"
                      class="text-white text-hover-white opacity-75 hover-opacity-100 active">{{ $breadcrumb->title }}</span>
            @endif

        @endforeach
    </div>

@endif
