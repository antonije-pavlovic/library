@include('partials.head')
@include('partials.nav')
@include('partials.bg_image')

<div class="container" style="min-height: 700px">
    <noscript class="overlay" style="position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  background-color: rgba(0,0,0,0.5); "><img src="{{asset('/')}}images/testing.gif" style="margin-top: 350px;margin-left: 700px" alt="no javascript"/></noscript>

    @include('partials.content')

</div>

@include('partials.footer')