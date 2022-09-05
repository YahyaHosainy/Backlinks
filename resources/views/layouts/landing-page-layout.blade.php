<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
    @if(isset($gtmHead))
        {!! $gtmHead !!}
    @endif
    @yield('tags')
</head>

<body>
    @if(isset($gtmBody))
        {!! $gtmBody !!}
    @endif

    @include('includes.navbar')

    @yield('content')
    @if(isset($banner))
        @include('includes.footer', ['banner' => $banner])
    @else
        @include('includes.footer')
    @endif
    @yield('scripts')

</body>

</html>
