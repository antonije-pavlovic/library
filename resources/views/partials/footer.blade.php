<footer class="page-footer font-small bg-dark pt-4 mt-5">
    <div class="container">
        @if(!session()->has('user'))
        <ul class="list-unstyled list-inline text-center py-2">

            <li class="list-inline-item text-light">
                <h5 class="mb-1 ">Register for free</h5>
            </li>
            <li class="list-inline-item">
                <a href="/register" class="btn border rounded text-light">Sign up!</a>
            </li>
        </ul>
    @endif
    </div>
    <div class="footer-copyright text-center py-3 text-light">© 2019 Copyright
        <a href="{{asset('/')}}documentation.odt" target="_blank"> Documentation</a>
    </div>
    <script src="{{asset('/')}}js/script.js"></script>
</footer>


</body>
</html>