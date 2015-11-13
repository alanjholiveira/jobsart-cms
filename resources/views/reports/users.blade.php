@extends('layouts.pdf')

@section('content')

    <div style="text-align: center">
        <header>
            <h1>HANASAKI SDN BHD</h1>
            <p>No 178 Jalan Restu 22, Taman Seri Puteri<br>
                Fasa II Meru Off Jalan Kassim, Kapar.<br>
                Tel: +603-333666789  Fax: +603-333666790</p>
        </header>
    </div>

    <div>
        <h2 style="text-align: center">LAPORAN SENARAI PENGGUNA SISTEM</h2>
        <hr>

        @if ($data->count())
            <table style="width: 100%;" cellpadding="5" cellspacing="3">
                <thead>
                <tr>
                    <th class="column-title">#ID</th>
                    <th class="column-title">Titulo</th>
                    <th class="column-title">Subtitulo</th>
                    <th class="column-title">Imagem</th>
                    <th class="column-title">Logo</th>
                    <th class="column-title">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $slide)
                    <tr>
                        <td>{{ $slide->id }}</td>
                        <td>{{ $slide->subtitle }}</td>
                        <td>{{ $slide->title }}</td>
                        <td>{{ $slide->imagefile }}</td>
                        <td>{{ $slide->logoimage }}</td>
                        <td>{{ $slide->status }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3" class="text-center">
                        Jumlah Pengguna Sistem: <strong>{{ $data->count() }} orang</strong>
                    </td>
                </tr>
                </tfoot>
            </table>
        @else
            <div class="alert alert-info text-center">Tiada Maklumat Untuk Dipaparkan</div>
        @endif
    </div>

@stop