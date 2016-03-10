
<div>
    {!! Form::label("name","Name") !!}
    {!! Form::input("text","name") !!}
</div>

<div>
    {!! Form::label("dateFrom","Date from:") !!}
    {!! Form::input("text","dateFrom") !!}
</div>

<div>
    {!! Form::label("dateTo","Date to:") !!}
    {!! Form::input("text","dateTo") !!}
</div>

<div>
    {!! Form::label("public","Make it public?") !!}
    {!! Form::checkbox('public') !!}
</div>

<div>
    {!! Form::label("mainPhoto","Main photo") !!}
    {!! Form::file('mainPhoto')!!}
</div>

<div>{!! Form::submit('Add') !!}</div>