@extends('layouts.main')
@section('content')

    <div class="row mt-5">
       <div class="col-lg-6">
           <h1>Contact us</h1>
           <h3>We're here when you need us. </br>Get in touch.</h3>
           <form class="mt-4 ml-3">
               <div class="form-group row">
                   <label for="staticEmail" class="col-sm-4 col-form-label">Phone number</label>
                   <div class="col-sm-8">
                       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="+3410648975148">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="staticEmail" class="col-sm-4 col-form-label">Address </label>
                   <div class="col-sm-8">
                       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Duke Stephen street 45">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="staticEmail" class="col-sm-4 col-form-label">Working hours</label>
                   <div class="col-sm-8">
                       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="staticEmail" class="col-sm-4 col-form-label">Monday to Friday:</label>
                   <div class="col-sm-8">
                       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="09:00 to 17:00">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="staticEmail" class="col-sm-4 col-form-label">Saturday:</label>
                   <div class="col-sm-8">
                       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="09:00 to 15:00">
                   </div>
               </div>
               <div class="form-group row">
                   <label for="staticEmail" class="col-sm-4 col-form-label">Sunday:</label>
                   <div class="col-sm-8">
                       <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Closed">
                   </div>
               </div>
           </form>
       </div>
        <div class="col-lg-6">
           <h4> Drop us email</h4>
            <form class="mt-2">
                <div class="form-group mt-3">
                    <label for="exampleFormControlInput1">Email subject</label>
                    <input type="text" class="form-control" id="emailSubject" placeholder="Enter subject here">
                </div>
                <div class="form-group mt-5">
                    <label for="exampleFormControlTextarea1">Email text</label>
                    <textarea class="form-control" id="emailTxt" rows="5"></textarea>
                </div>
                @if(session()->has('user'))
                    <button type="button" class="btn btn-primary mb-2 mt-3 sendMail">Send us email</button>
                    <input type="hidden" id="email" value="{{session()->get('user')[0]->email}}"/>
                    <input type="hidden" id="username" value="{{session()->get('user')[0]->name}}"/>
                    <input type="hidden" id="userID" value="{{session()->get('user')[0]->id}}"/>
                @else
                    <p class="lead">
                        You need to be registered in order to send us mail
                    </p>
                @endif
            </form>
        </div>
    </div>

    <!--Model Popup starts-->
    <div class="container">
        <div class="row">
            <div class="modal fade" id="ignismyModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                        </div>

                        <div class="modal-body">

                            <div class="thank-you-pop">
                                <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                                <h1>Thank You!</h1>
                                <p>Your email is received and we will contact you soon</p>
                                <a href="/" class="rd_more btn btn-default">Go to Home</a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Model Popup ends-->
    <div class="row mt-5">
        <h1>Company profile</h1>
        <p class="mt-3">
            Library is a self-publishing and marketing platform that unleashes the creative genius inside everyone. Blurb’s platform makes it easy to design, publish, promote, and sell professional-quality printed books and ebooks.

            Library was founded by Eileen Gittins in 2005, and includes a team of design, Internet and media veterans who share a passion for helping people bring their stories to life. Blurb authors have created millions of books using our full suite of free book-making tools, and today a new book is created every minute. Blurb is based in San Francisco with offices in London
        </p>
    </div>
@endsection