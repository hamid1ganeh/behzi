<svg width="100%" data-map xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
     preserveAspectRatio="xMidYMid meet" version="1.1" x="0" y="0" viewBox="0 0 205.2 185.5"
     enable-background="new 0 0 204.181 184.548" xml:space="preserve">
    @foreach($provincesAll as $province)
        <a xlink:href="{{ route('front.pages.index', ['province' => $province->id]) }}">
            <path
                    class="area"
                    data-toggle="tooltip" data-placement="auto" title="{{ $province->name }}"
                    data-gravity="s" data-offset-x="{{ $province->province_meta->offset_x }}"
                    data-offset-y="{{ $province->province_meta->offset_y }}"
                    title="{{ $province->name }}"
                    data-province="{{ $province->id }}"
                    fill-rule="evenodd" clip-rule="evenodd"
                    d="{{ $province->province_meta->d }}">
            </path>
        </a>
    @endforeach

</svg>
@push('css')
    <style>
        .iran-map a {
            fill: teal;
            transition: all 1s;
        }
        .iran-map a:hover {
            fill: lightskyblue;
        }
    </style>
@endpush