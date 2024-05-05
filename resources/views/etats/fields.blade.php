<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id', null, ['class' => 'form-control']) !!}
</div>

<!-- Descri Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descri', 'Descri:') !!}
    {!! Form::text('descri', null, ['class' => 'form-control', 'maxlength' => 30, 'maxlength' => 30, 'maxlength' => 30]) !!}
</div>

<!-- Test Field -->
<div class="form-group col-sm-6">
    {!! Form::label('test', 'Test:') !!}
    {!! Form::number('test', null, ['class' => 'form-control']) !!}
</div>