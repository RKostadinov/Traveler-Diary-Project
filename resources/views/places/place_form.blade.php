{!! csrf_field() !!}
<fieldset class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name of the place">
</fieldset>

<fieldset class="form-group">
    <label for="dateFrom">Date From</label>
    <input type="text" class="form-control" id="dateFrom" name="dateFrom" placeholder="Choose date">
</fieldset>

<fieldset class="form-group">
    <label for="dateTo">Date To</label>
    <input type="text" class="form-control" id="dateTo" name="dateTo" placeholder="Choose date">
</fieldset>

<fieldset class="form-group">
    <label for="public">Public?</label>
    {!! Form::checkbox('public', null, ['class' => 'form-control']) !!}
</fieldset>

<div class="form-group">
    <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input type="file" name="mainPhoto">
                    </span>
                </span>
        <input type="text" class="form-control" readonly>
    </div>
</div>


<div>{!! Form::submit('Add', ['class' => 'btn btn-default center-block']) !!}</div>


