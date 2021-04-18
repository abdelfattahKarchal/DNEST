@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error )
            <li> <span class="text-danger">{{$error}} </span> </li>
        @endforeach
    </ul>
@endif