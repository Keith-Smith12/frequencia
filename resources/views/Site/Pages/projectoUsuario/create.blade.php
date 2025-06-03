@extends('Site/layouts/page')
@section('title') Atribuir Projecto a Usuário @endsection
@section('conteudo')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Colocar um usuário em um Projecto</h5>
                <small class="text-muted float-end">Selecione os campos abaixo</small>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('projectoUsuario.store') }}" method="post">
                    @csrf
                    <!-- select de Usuários -->
                    <div class="form-group mb-3">
                    <label for="it_id_user" class="form-label">Usuários</label>
                    <select id="it_id_user" name="it_id_user[]" class="form-control select2" multiple required>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}"
                                {{ in_array($usuario->id, old('it_id_user', $projectoUsuario->it_id_user ?? [])) ? 'selected' : '' }}>
                                {{ $usuario->vc_nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('it_id_user')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                    <!-- select de projecto -->
                    <div class="form-group mb-3">
                        <label for="it_id_projecto" class="form-label">Projecto</label>
                        <select class="form-select" id="it_id_projecto" name="it_id_projecto" required>
                            <option value="">Selecione o projecto</option>
                            @foreach ($projectos as $projecto)
                                <option value="{{ $projecto->id }}" 
                                        {{ old('it_id_projecto', $projectoUsuario->it_id_projecto ?? '') == $projecto->id ? 'selected' : '' }}>
                                    {{ $projecto->vc_nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-2">
                        <a href="{{ route('projectoUsuario.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Atribuir usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        /* Ajustes para o Select2 com Bootstrap */
        .select2-container .select2-selection--multiple {
            min-height: 38px;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 0 6px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            margin-top: 6px;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__clear {
            margin-right: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#it_id_user').select2({
                placeholder: "Selecione um ou mais usuários",
                allowClear: true,
                width: '100%',
                language: {
                    noResults: function() {
                        return "Nenhum usuário encontrado";
                    }
                }
            });
        });
    </script>
@endpush
@endsection