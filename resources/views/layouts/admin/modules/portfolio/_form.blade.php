<div class="form-group">
    {!! Form::label('cat', 'Categoria:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select name="cat_id" class="select2_cat form-control col-md-7 col-xs-12">
            <option disabled selected="selected">--- Selecione a categoria ---</option>
            @forelse($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->name}}</option>
            @empty
                <option>Nenhum registro cadastrado!</option>
            @endforelse
        </select>
    </div>
</div>

<div class="form-group">
    {!! Form::label('title', 'Titulo:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('title', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('details', 'Detralhe:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::textarea('details', null, ['class' => 'form-control col-md-7 col-xs-12', 'rows' => '3']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('client', 'Cliente:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('client', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('image', 'Imagem:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    @if(!empty($portfolio->imagefile))
        <div class="col-md-1 col-sm-1 col-xs-12">
            <img src="{{ asset('uploads/portfolio/' . $portfolio->imagefile) }}" height="40"/>
            <p></p>
        </div>
    @endif
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::file('imagefile', null, ['class'=>'form-control col-md-7 col-xs-12']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('link', 'Link:', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
    <div class="col-md-6 col-sm-6 col-xs-12">
        {!! Form::text('link', null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
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