{!! Form::open(['route' => ['admin.portfolio.cat.delete'], 'method' => 'post', 'class' => 'form-horizontal', 'id' =>'frmDelete']) !!}

<div class="table-responsive">
    <table class="table table-striped responsive-utilities jambo_table bulk_action">
        <thead>
        <tr class="headings">
            <th>
                <input type="checkbox" id="check-all" class="flat">
            </th>
            <th class="column-title">#ID</th>
            <th class="column-title">Nome</th>
            <th class="column-title">Status</th>
            <th class="column-title no-link last"><span class="nobr">Ação</span>
            </th>
            <th class="bulk-actions bulk_action" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                            class="action-cnt"> </span> )
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($portfolioCats as $data)
            <tr class="even pointer">
                <td class="a-center "><input type="checkbox" class="flat ids" name="table_recordsId[]" value="{{ $data->id }}"></td>
                <td class=" ">#{{ $data->id }}</td>
                <td class=" ">{{ str_limit($data->name, $limit = 25, $end = '....') }}</td>
                <td class="a-right a-right ">
                                        <span class="label @if($data->status == "published") {{ 'label-success' }} @else {{ 'label-danger' }} @endif">
                                            {{ $data->status }}
                                        </span>
                </td>
                <td class=" last">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-fire"></i> Ação <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu bullet pull-right" role="menu">
                            <li class="dropdown-header"></li>
                            <li><a href="{{ route('admin.portfolio.cat.edit', ['id' => $data->id]) }}"><i class="fa fa-edit"></i> Editar</a></li>
                            <li><a href="#"><i class="fa fa-eye"></i> Publicar</a></li>
                            <li><a href="#"><i class="fa fa-trash"></i> Lixeira</a></li>
                            <li><a href="#"><i class="fa fa-file-o"></i> View Details</a></li>
                            <li class="divider"></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="500">Nenhum registro cadastrado!</td>
                </tr>
        @endforelse
        </tbody>
    </table>
    {!! $portfolioCats->render() !!}
</div>
{!! Form::close() !!}
@include('layouts.admin.modules.portfolio._modal')
