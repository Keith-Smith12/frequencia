<div class="form-group">
    <label for="vc_nome">Nome</label>
    <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
           placeholder="Digite seu nome"
           value="{{ old('vc_nome', $usuario->vc_nome ?? '') }}">
</div>

<div class="form-group">
    <label for="vc_email">Email</label>
    <input type="email" class="form-control" id="vc_email" name="vc_email" required
           placeholder="Digite seu email"
           value="{{ old('vc_email', $usuario->vc_email ?? '') }}">
</div>

<div class="form-group">
    <label for="vc_password">Password</label>
    <input type="password" class="form-control" id="vc_password" name="vc_password"
           placeholder="Digite sua senha" 
           value="{{ old('vc_password', $usuario->vc_password ?? '') }}">
</div>

<div class="form-group">
    <label for="vc_classe">Classe</label>
    <input type="text" class="form-control" id="vc_classe" name="vc_classe" required
           placeholder="Digite sua classe"
           value="{{ old('vc_classe', $usuario->vc_classe ?? '') }}">
</div>

<div class="form-group">
    <label for="vc_tipo">Tipo de Usuário</label>
    <select class="form-control" id="vc_tipo" name="vc_tipo" required>
        <option value="">Selecione o tipo</option>
        <option value="aluno" {{ old('vc_tipo', $usuario->vc_tipo ?? '') == 'aluno' ? 'selected' : '' }}>Aluno</option>
        <option value="professor" {{ old('vc_tipo', $usuario->vc_tipo ?? '') == 'professor' ? 'selected' : '' }}>Professor</option>
        <option value="coordenador" {{ old('vc_tipo', $usuario->vc_tipo ?? '') == 'coordenador' ? 'selected' : '' }}>Coordenador</option>
        <option value="admin" {{ old('vc_tipo', $usuario->vc_tipo ?? '') == 'admin' ? 'selected' : '' }}>Administrador</option>
        <option value="secretario" {{ old('vc_tipo', $usuario->vc_tipo ?? '') == 'secretario' ? 'selected' : '' }}>Secretário</option>
    </select>
</div>

