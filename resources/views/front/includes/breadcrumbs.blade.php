@if (count($breadcrumbs))

    <div class="d-flex align-items-center font-weight-bold my-2 small font-weight-lighter">
        <a href="#" class="opacity-75 hover-opacity-100">
            <i class="flaticon2-shelter text-white icon-1x"></i>
        </a>
        <svg width="14" style="padding-top: 1px;fill:#4e5e74" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 30" version="1.1" xml:space="preserve" x="0px" y="0px" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.41421"><rect x="0" y="0" width="24" height="24" style="" fill="none"/><clipPath id="a"><rect x="0" y="0" width="24" height="24"/></clipPath><g clip-path="url(#a)"><g transform="matrix(1.25,0,0,1.25,-3,-3)"><path d="M12.067,3.203C12.181,3.217 12.287,3.244 12.388,3.3C12.44,3.329 12.451,3.34 12.5,3.375L20.5,9.775C20.543,9.813 20.556,9.822 20.594,9.865C20.682,9.962 20.745,10.08 20.776,10.206C20.792,10.271 20.797,10.334 20.8,10.4L20.8,20C20.796,20.094 20.784,20.184 20.752,20.274C20.672,20.494 20.494,20.672 20.274,20.752C20.184,20.784 20.094,20.796 20,20.8L14.4,20.8C14.306,20.796 14.216,20.784 14.126,20.752C13.906,20.672 13.728,20.494 13.648,20.274C13.616,20.184 13.604,20.094 13.6,20L13.6,14.4L10.4,14.4L10.4,20C10.396,20.094 10.384,20.184 10.352,20.274C10.272,20.494 10.094,20.672 9.874,20.752C9.784,20.784 9.694,20.796 9.6,20.8L4,20.8C3.906,20.796 3.816,20.784 3.726,20.752C3.506,20.672 3.328,20.494 3.248,20.274C3.216,20.184 3.204,20.094 3.2,20L3.2,10.4C3.203,10.334 3.208,10.271 3.224,10.206C3.255,10.08 3.318,9.962 3.406,9.865C3.444,9.822 3.457,9.813 3.5,9.775L11.5,3.375C11.592,3.308 11.688,3.254 11.8,3.225C11.858,3.21 11.873,3.21 11.933,3.203C12,3.2 12,3.2 12.067,3.203ZM4.8,10.784L4.8,19.2L8.8,19.2L8.8,13.6L8.803,13.53C8.815,13.437 8.835,13.348 8.875,13.262C8.974,13.049 9.166,12.888 9.393,12.827C9.462,12.809 9.529,12.803 9.6,12.8L14.4,12.8C14.494,12.804 14.584,12.816 14.674,12.848C14.894,12.928 15.072,13.106 15.152,13.326C15.184,13.416 15.196,13.506 15.2,13.6L15.2,19.2L19.2,19.2L19.2,10.784L12,5.024C9.6,6.944 7.2,8.864 4.8,10.784Z" style="" fill-rule="nonzero"/></g></g><text x="0" y="39" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">Created by Explanaicon</text><text x="0" y="44" fill="#000000" font-size="5px" font-weight="bold" font-family="'Helvetica Neue', Helvetica, Arial-Unicode, Arial, Sans-serif">from the Noun Project</text></svg>
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <a href="{{ $breadcrumb->url }}"
                   class="px-3">{{ $breadcrumb->title }}</a>
            @else
                <span href=""
                      class="px-3 active">{{ $breadcrumb->title }}</span>
            @endif

            @if($loop->iteration < count($breadcrumbs))
                    <img src="{{ asset('images/static/chevron-left.png') }}" width="8">
            @endif

        @endforeach
    </div>

@endif