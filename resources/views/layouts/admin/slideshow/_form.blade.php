<div class="form-group">
    {!! Form::label('title', 'Titulo:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('title', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('subtitle', 'Subtitulo:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('subtitle', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('logoimage', 'Logo:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="radio">
            <label>
                {!! Form::radio('logoimage', 'Y', true, ['id' => 'logoimageY', 'class' => 'flat', 'checked' => '', 'required']) !!}
                Sim
            </label>
        </div>
        <div class="radio">
            <label>
                {!! Form::radio('logoimage', 'N', false, ['id' => 'logoimageN', 'class' => 'flat']) !!}
                Não
            </label>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('image', 'Imagem:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    @if(!empty($slide->imagefile))
        <div class="col-md-1 col-sm-1 col-xs-12">
            <img src="{{ asset('uploads/slideshow/' . $slide->imagefile) }}" height="40"/>
            <p></p>
        </div>
    @endif
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::file('imagefile', null, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::select('status', [
           'published' => 'Publicar',
           'unpublished' => 'Despublicar',
           'Trashed' => 'Trash',
           'archived' => 'Arquivar',
           ], null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>