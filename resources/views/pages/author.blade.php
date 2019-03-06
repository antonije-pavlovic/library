@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-5 mt-5">
            <img src="{{asset('/')}}images/autor.jpg" class="img-fluid" >
        </div>
        <div class="col-lg-6">

            <div id="str" class="mt-5"></div>
        </div>
    </div>
    <script>
        //Author biography text on autor page
        let string = ` Born in Smederevo 1994. He is specialized for road traffic logistics in high school.
                        During those teenage days he finds himself interested in sports, especially in boxing and kickboxing.
                        On the other hand one of his discoverings was passion for acting.
                        Therefore he became core member of school theater at that time.
                        He also took place in numerous humanitarian actions.
                        Now he is on the final year of his bachelor studies on internet technologies.
                        Antonije is friendly and communicative person who loves challenges and competitions.`;
        let str = string.split(``);
        let el = document.getElementById('str');
        (function animate() {
            str.length > 0 ? el.innerHTML += str.shift() : clearTimeout(running);
            let running = setTimeout(animate, 80);
        })();
    </script>
@endsection