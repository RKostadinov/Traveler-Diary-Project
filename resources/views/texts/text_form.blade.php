{{ csrf_field() }}
<div>
    {!! Form::textarea("text") !!}
</div>
<br>
<div>{!! Form::submit('Add', ['class' => 'btn btn-default center-block']) !!}</div>