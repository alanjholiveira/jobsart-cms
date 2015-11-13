@extends('layouts.admin.index')

@section('content')

    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>
                    Portfólio
                </h3>
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Portfólio
                            <small>Cadastre aqui seu Portfólio.</small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"></a></li>
                            <li><a class="collapse-link"></a></li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">
                        <div class="fixed-table-toolbar pull-right">
                            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Novo</a>
                            <a href="{{ route('admin.portfolio.cat.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-level-down"></i> Categoria</a>
                            <span data-form="#frmDelete" data-title="Deletar: #" data-message="Tem certeza de que deseja excluir este registro?" >
                                <a class = "formConfirm btn btn-warning btn-sm " href=""><i class="fa fa-close"></i> Deletar</a>
                            </span>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Imprimir</a>
                            <a href="{{ route('admin.portfolio.pdf') }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i> PDF</a>
                            <a href="{{ route('admin.portfolio.trash') }}" class="btn btn-primary btn-sm"><i class="fa fa-trash-o"></i> Lixeira</a>
                        </div>
                        <div class="clear"></div>

                        @include('layouts.admin.modules.portfolio._table')

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection