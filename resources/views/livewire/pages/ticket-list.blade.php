@section('page-title')
    Chamados
@endsection

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Chamados</a></li>
                        <li class="breadcrumb-item active">Lista</li>
                    </ol>
                </div>
                <h4 class="page-title">Chamados</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="header-title">Chamados</h4> --}}
                        <form wire:submit.prevent="{{ $isEditing ? 'update' : 'save' }}">
                        <div class="mb-3">
                            <input type="text" wire:model="title" class="form-control" placeholder="Título" maxlength="255">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <textarea wire:model="description" class="form-control" placeholder="Descrição"></textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <select wire:model="status" class="form-select">
                                <option value="aberto">Aberto</option>
                                <option value="em progresso">Em Progresso</option>
                                <option value="resolvido">Resolvido</option>
                            </select>
                            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <div class="input-group input-group-merge">
                                <select wire:model="category_id" class="form-select">
                                    <option value="">Selecione a Categoria</option>
                                    @foreach ($categorys as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-text" data-password="false">
                                    {{-- <span class="password-eye"></span> --}}
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#categoryModal">
                                        <span class="mdi mdi-plus"></span>
                                        Nova Categoria
                                    </button>
                                </div>
                            </div>
                            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <button class="btn btn-primary" type="submit"><span class="mdi mdi-content-save-outline"></span> {{ $isEditing ? 'Atualizar' : 'Criar' }}</button>
                        @if ($isEditing)
                            <button type="button" wire:click="resetForm" class="btn btn-secondary">Cancelar</button>
                        @endif
                    </form>
                    @livewire('category-form')
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Lista de Chamados</h4>

                    <table id="teste-data" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Status</th>
                                <th>Categoria</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach ($chamados as $chamado)
                            <tr>
                                <td>{{ $chamado->id }}</td>
                                <td>{{ $chamado->title }}</td>
                                <td>{{ ucfirst($chamado->status) }}</td>
                                <td>{{ $chamado->category->name ?? '-' }}</td>
                                <td>
                                    <button wire:click="edit({{ $chamado->id }})"
                                        class="btn btn-sm btn-warning">Editar</button>
                                    <button wire:click="delete({{ $chamado->id }})"
                                        class="btn btn-sm btn-danger">Excluir</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div>
@push('styles')
    <link href="{{asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <!-- third party js -->
    <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
    <script>

        const initDatabase = () => {
            if ($.fn.DataTable.isDataTable('#teste-data')) {
                    $('#teste-data').DataTable().destroy();
                }

            setTimeout(() => {
                $("#teste-data").DataTable({
                    language: {
                        decimal: ",",
                        thousands: ".",
                        emptyTable: "Nenhum dado disponível na tabela",
                        info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
                        infoEmpty: "Mostrando 0 até 0 de 0 registros",
                        infoFiltered: "(filtrado de _MAX_ registros no total)",
                        lengthMenu: "Mostrar _MENU_ registros por página",
                        loadingRecords: "Carregando...",
                        processing: "Processando...",
                        search: "Buscar:",
                        zeroRecords: "Nenhum registro encontrado",
                        paginate: {
                        first: "Primeiro",
                        last: "Último",
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>",
                        },
                        aria: {
                            sortAscending: ": ativar para ordenar a coluna de forma crescente",
                            sortDescending: ": ativar para ordenar a coluna de forma decrescente"
                        }
                    },
                    drawCallback: function () {
                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                    },
                });
            }, 500);
        }
        document.addEventListener('DOMContentLoaded', function() {
            initDatabase();

            Livewire.on('close-modal', () => {
                const modalEl = document.getElementById('categoryModal');
                if (modalEl) {
                    const modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }
            });

            Livewire.on('recarregarDataTable', () => {
                initDatabase();
                console.log('DataTable reiniciado após evento');
            });
        });
    </script>
@endpush
