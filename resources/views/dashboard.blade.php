<head>
    @if(Auth::user()->role == 1)
        @if(Auth::user()->EmployeeDetail->position_id == 3)
        <meta http-equiv="refresh" content="0; url={{route('courses.index')}}" />
        @else
        <meta http-equiv="refresh" content="0; url={{route('classes.index')}}" />
        @endif
    @elseif(Auth::user()->role == 2)
    <meta http-equiv="refresh" content="0; url={{route('classes.index')}}" />
    @else
    <meta http-equiv="refresh" content="0; url={{route('login')}}" />
    @endif
</head>