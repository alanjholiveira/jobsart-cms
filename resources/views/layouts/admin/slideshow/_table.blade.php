{!! Form::open(['route' => ['admin.slideshow.delete'], 'method' => 'delete', 'class' => 'form-horizontal', 'id' =>'frmDelete']) !!}

<div class="table-responsive">
    <table class="table table-striped responsive-utilities jambo_table bulk_action">
        <thead>
        <tr class="headings">
            <th>
                <input type="checkbox" id="check-all" class="flat">
            </th>
            <th class="column-title">#ID</th>
            <th class="column-title">Titulo</th>
            <th class="column-title">Subtitulo</th>
            <th class="column-title">Imagem</th>
            <th class="column-title">Logo</th>
            <th class="column-title">Status</th>
            <th class="column-title no-link last"><span class="nobr">Ação</span>
            </th>
            <th class="bulk-actions bulk_action" colspan="7">
                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                            class="action-cnt"> </span> )<a href="">Deletar</a> <i class="fa fa-chevron-down"></i></a>
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($slides as $slide)
            <tr class="even pointer">
                <td class="a-center "><input type="checkbox" class="flat ids" name="table_recordsId[]" value="{{ $slide->id }}"></td>
                <td class=" ">#{{ $slide->id }}</td>
                <td class=" ">{{ str_limit($slide->title, $limit = 25, $end = '....') }}</td>
                <td class=" ">{{ str_limit($slide->subtitle, $limit = 25, $end = '....') }}</td>
                <td class=" ">
                    <a href="#" class="thumbnail-" data-toggle="modal" data-target="#lightbox">
                        <img src="{{ asset('uploads/slideshow/' . $slide->imagefile) }}" height="40"/>
                    </a>
                </td>
                <td class=" ">{{ $slide->logoimage }}</td>
                <td class="a-right a-right ">
                                        <span class="label @if($slide->status == "published") {{ 'label-success' }} @else {{ 'label-danger' }} @endif">
                                            {{ $slide->status }}
                                        </span>
                </td>
                <td class=" last">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-fire"></i> Ação <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu bullet pull-right" role="menu">
                            <li class="dropdown-header"></li>
                            <li><a href="{{ route('admin.slideshow.edit', ['id' => $slide->id]) }}"><i class="fa fa-edit"></i> Editar</a></li>
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
    {!! $slides->render() !!}
</div>
{!! Form::close() !!}
@include('layouts.admin.slideshow._modal')
