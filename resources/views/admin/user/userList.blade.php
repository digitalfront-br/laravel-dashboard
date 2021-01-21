@extends('layouts.admin')


@section('page_title')
<div class="row breadcrumbs-top">
    <div class="col-12 d-flex justify-content-between">
        <h2 class="content-header-title float-left mb-0">Usuários</h2>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{ route('user.create') }}" class="btn btn-outline-primary waves-effect">Novo usuário</a>
        </div>

    </div>
</div>

@endsection

@section('content')
<div class="card">
    <table class="datatables-basic table dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid"
        aria-describedby="DataTables_Table_0_info">
        <thead>
            <tr role="row">
                <th>Nome</th>
                <th>Email</th>
                <th>Início</th>
                <th>Telefone</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users->items() as $user)
            <tr role="row">
                <td>
                    <div class="d-flex justify-content-left align-items-center">
                        <div class="avatar  bg-light-warning  mr-1"><span class="avatar-content">
                                <img style="width: 30px" src="{{ asset('img').'/'.$user->avatar }}" alt="">
                            </span></div>
                        <div class="d-flex flex-column">
                            <span class="emp_name text-truncate font-weight-bold">{{ $user->name}}</span>
                            <small class="emp_post text-truncate text-muted">
                                @if ($user->roles == 0)
                                Administrador
                                @elseif ($user->roles == 1)
                                Usuário
                                @else
                                Cliente
                                @endif
                            </small>
                        </div>
                    </div>
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d/m/y') }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <div class="d-flex justify-content-center">

                        @if ($user->status == 0)
                        <span class="badge badge-pill  badge-secondary">
                            inativo</span>
                        @elseif ($user->status == 1)
                        <span class="badge badge-pill  badge-light-success"> ativo</span>
                        @elseif ($user->status == 2)
                        <span class="badge badge-pill  badge-light-info">
                            testando</span>
                        @else
                        <span class="badge badge-pill  badge-light-danger"> vencido</span>
                        @endif

                    </div>
                </td>
                <td style="">
                    <div class="d-inline-flex justify-content-center w-100">
                        <a class="text-small" data-toggle="dropdown">
                            <i data-feather='more-vertical'></i>
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('user.show', $user->id) }}" class="dropdown-item">Detalhes</a>
                            <a href="{{ route('user.edit', $user->id) }}" class="dropdown-item">Editar</a>
                            <span>
                                <form action="{{ route('user.destroy', $user->id) }}"
                                    onsubmit="return confirm('Você quer Excluir o usuário {{ $user->name }}?');">
                                    @csrf
                                    <button type="submit"
                                        class="dropdown-item delete-record text-danger">Excluir</button>
                                </form>
                            </span>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between align-items-center mx-2 row">
        <div>
            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Página
                {{ $users->currentPage() }} de {{ $users->lastPage() }} -
                {{ $users->total() }} usuários cadastrados</div>
        </div>
        <div>
            {{ $users->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
@endsection
