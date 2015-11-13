@extends('layouts.admin.index')

@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Categoria de Post</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cadastrar Categoria de Post
                            <small>Cadastre aqui sua Categoria de Post.</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>

                        {!! Form::open(['route' => 'admin.post.cat.store', 'files' => true, 'method' => 'post', 'data-parsley-validate', 'class' => 'form-horizontal form-label-left']) !!}

                         @include('layouts.admin.modules.post.cat._form')

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                {!! Form::submit('Adicionar', ['class' => 'btn btn-success']) !!}
                                <a href="{{ route('admin.post.cat.index') }}" class="btn btn-primary">Cancelar</a>
                            </div>
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection