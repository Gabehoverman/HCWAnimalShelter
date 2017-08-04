@extends('layouts.master')

@section('title', 'Manage Animals')

@section('pageCss')

    <link href="/css/contact.css" type="text/css" rel="stylesheet" media="screen,projection"/>
@stop

@section('content')
    <div class="container" style="padding: 15px;">

        <div class="row">
            <div class="col s12 m6">

                <h3 class="blue-text">Contact us</h3>
                {{--<hr>--}}
                <h5>Address</h5>
                <hr>
                <span>1901 James River Rd</span><br>
                <span>Huntington, WV 25701</span><br>
                <span>(304) 696-5551</span><br>
                <span><a href="mailto:hcwanimalcontrolshelter@gmail.com">hcwanimalcontrolshelter@gmail.com</a></span><br>
                <h5>Hours</h5>
                <hr>
                10:00 AM - 4:30 PM

                <br>
                <br>
                {{--<hr>--}}
                <div class="row">
                    <div class="col s4">
                        <a href="https://www.facebook.com/HuntingtonCabellWayneAnimalShelter/" target="_blank">
                            <img class="fb-icon" src="img/social/fb.png">
                            {{--<i class="material-icons blue">facebook-box</i>--}}
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="mailto:hcwanimalcontrolshelter@gmail.com">
                            {{--<img width="75px" src="img/social/email.png">--}}
                            <i class="material-icons blue-text big-icon">mail_outline</i>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="http://www.animalshelter.org/shelters/Huntington__Cabell__Wayne_Animal_Shelter_rId5784_rS_pC.html" target="_blank">
                            {{--<img width="75px" src="img/social/home.ico">--}}
                            <i class="material-icons blue-text big-icon">language</i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col s12 m6">
                <iframe src="//www.google.com/maps/embed/v1/place?q=1901%20James%20River%20Rd%0AHuntington%2C%20West%20Virginia%2C%20WV%2025701
                      &zoom=17
                      &key=AIzaSyCQ3z0FiV_Gi560VkuXgQgXMokuNbG872A"
                style="width: 100%; min-height: 350px; margin-top: 3em;">
                </iframe>
            </div>
        </div>


        {{--<form id="contact" method="POST" action="/contact">--}}
            {{--<div class="row">--}}
                {{--<div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">--}}
                    {{--<h3 class="blue-text">Contact us</h3>--}}
                    {{--<div class="row">--}}
                        {{--<div class="input-field col s12">--}}
                            {{--<input placeholder="Name" id="name" name="name" type="text" class="validate" required autofocus tabindex="1">--}}
                            {{--<label for="first_name">Your Name</label>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s12">--}}
                            {{--<input placeholder="Email" id="email" name="email" type="email" class="validate" required tabindex="2">--}}
                            {{--<label for="first_name">Your Email Address</label>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s12">--}}
                            {{--<input placeholder="Phone" id="phone" name="phone" type="tel" class="validate" required tabindex="3">--}}
                            {{--<label for="first_name">Your Phone Number</label>--}}
                        {{--</div>--}}
                        {{--<div class="input-field col s12">--}}
                            {{--<textarea id="message" placeholder="Type your message here..." name="message" class="materialize-textarea"></textarea>--}}
                            {{--<label for="message">Your Message</label>--}}
                        {{--</div>--}}
                        {{--<input type="submit" id="contact-submit" data-submit="Sending..." value="Submit" class="btn green waves-effect waves-light"/>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
    </div>
@stop
