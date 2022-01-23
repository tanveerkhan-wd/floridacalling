<div class="sticky-container">
    <ul class="sticky">
        <li>
            <img src="{{asset('/img/phone-calls.png')}}">
            <p><a href="tel:{{$contact->phone_number}}"> Call us on<br>{{$contact->phone_number}} </a></p>
        </li>
        <li>
            <img src="{{asset('/img/message.png')}}">
            <p><a href="{{ url('query-form') }}">Get a Quote<br> Click here</a></p>
        </li>
        <li>
            <img src="{{asset('/img/gmail.png')}}">
            <p><a class="mailto" href="mailto:{{$contact->email}}" target="_blank">Mail us on <br>{{$contact->email}}</a> &nbsp;&nbsp;&nbsp;</p>
        </li>
    </ul>
</div>