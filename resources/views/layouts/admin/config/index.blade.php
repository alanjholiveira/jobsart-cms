@extends('layouts.admin.index')

@section('content')

    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>
                    Configuração
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Config
                            <small>Configuração do website.</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"></a></li>
                            <li><a class="collapse-link"></a></li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <br/>

                        {!! Form::open(['route' => ['admin.config.update'], 'files' => true, 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal form-label-left', 'name' => 'mmeForm']) !!}

                        <div class="col-sm-6 animated fadeInRight ">
                            <div class="form-group">
                                {!! HTML::decode(Form::label('name-website', 'Nome do website: <span class="required">*</span>', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12'])) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input name="cnf_appname" type="text" id="cnf_appname" class="form-control col-md-7 col-xs-12" required="required" value="{{ CNF_APPNAME }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('description-site', 'Descrição do site:', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input name="cnf_appdesc" type="text" id="cnf_appdesc" class="form-control col-md-7 col-xs-12" value="{{ CNF_APPDESC }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('name-company', 'Nome da empresa:', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input name="cnf_comname" type="text" id="cnf_comname" class="form-control input-sm" value="{{ CNF_COMNAME }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('email-system', 'Email do sistema:', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input name="cnf_email" type="text" id="cnf_email" class="form-control input-sm" value="{{ CNF_EMAIL }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('development-mode', 'Modo de desenvolvimento?:', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <div class="checkbox">
                                        <input name="cnf_mode" class="flat" type="checkbox" id="cnf_mode" value="1"
                                               @if (defined('CNF_MODE') &&  CNF_MODE =='production') checked @endif
                                                />  Produção
                                    </div>
                                    <small> Se você precisa de modo de depuração, por favor desmarcada essa opção. </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 animated fadeInRight ">
                            <div class="form-group">
                                {!! Form::label('metakey', 'Metakey:', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea class="form-control input-sm" name="cnf_metakey">{{ CNF_METAKEY }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('meta-description', 'Meta Descrição:', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <textarea class="form-control input-sm"  name="cnf_metadesc">{{ CNF_METADESC }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('backend-logo', 'Logo backend:', ['class' => 'control-label col-md-4 col-sm-4 col-xs-12']) !!}
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="file" name="logo">
                                    <p> <i>Por favor, use a dimensão da imagem 155px * 30px </i> </p>
                                    <div style="padding:5px; border:solid 1px #ddd; background:#f5f5f5; width:auto;">
                                        @if(file_exists(public_path().'/assets/images/'.CNF_LOGO) && CNF_LOGO !='')
                                            <img src="{{ asset('assets/images/'.CNF_LOGO)}}" alt="{{ CNF_APPNAME }}" />
                                        @else
                                            <img src="{{ asset('assets/images/logo.png')}}" alt="{{ CNF_APPNAME }}" />
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-4">
                                    {!! Form::submit('Salvar Configurações', ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection