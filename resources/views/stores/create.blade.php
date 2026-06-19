{{-- resources/views/stores/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Nova Loja XLmotors')
@section('hide_navigation', true)

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .store-create-page {
        min-height: calc(100vh - 4rem);
        background: #0f0f0f;
        color: #f5f5f5;
    }

    .store-create-page .card-xl {
        background: #1b1b1b;
        border: 1px solid #3d3522;
        border-radius: 8px;
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.32);
        overflow: hidden;
    }

    .store-create-page .card-header {
        background: #121212;
        border-bottom: 1px solid #3d3522;
        color: #d6a84f;
        font-size: 1.15rem;
        font-weight: 700;
        padding: 1rem 1.25rem;
    }

    .store-create-page .card-body {
        padding: 1.5rem;
    }

    .store-create-page .text-gold,
    .store-create-page .form-label-xl {
        color: #d6a84f;
    }

    .store-create-page .form-label-xl {
        display: block;
        font-weight: 600;
        margin-bottom: 0.45rem;
    }

    .store-create-page .form-control-xl,
    .store-create-page .form-select {
        background: #101010;
        border: 1px solid #3d3522;
        color: #f5f5f5;
        min-height: 46px;
    }

    .store-create-page .form-control-xl:focus,
    .store-create-page .form-select:focus {
        background: #101010;
        border-color: #d6a84f;
        color: #fff;
        box-shadow: 0 0 0 0.2rem rgba(214, 168, 79, 0.16);
    }

    .store-create-page .form-control-xl::placeholder {
        color: #858585;
    }

    .store-create-page textarea.form-control-xl {
        min-height: 110px;
    }

    .store-create-page .form-check-input {
        background-color: #101010;
        border-color: #6d5a2d;
    }

    .store-create-page .form-check-input:checked {
        background-color: #d6a84f;
        border-color: #d6a84f;
    }

    .store-create-page .btn-gold {
        background: #d6a84f;
        border-color: #d6a84f;
        color: #111;
        font-weight: 700;
    }

    .store-create-page .btn-gold:hover {
        background: #f0c66a;
        border-color: #f0c66a;
        color: #111;
    }

    .store-create-page .btn-outline-gold {
        border-color: #d6a84f;
        color: #d6a84f;
        font-weight: 700;
    }

    .store-create-page .btn-outline-gold:hover {
        background: #d6a84f;
        color: #111;
    }

    .store-create-page .text-muted {
        color: #a8a8a8 !important;
    }

    .store-create-page .invalid-feedback {
        display: block;
    }
</style>
@endpush

@section('content')
<div class="store-create-page py-4">
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card card-xl">
            <div class="card-header">
                <i class="fas fa-plus-circle"></i> Cadastrar Nova Loja
                <span class="ms-2 text-muted" style="font-size: 0.8rem; font-weight: 400;">
                    <i class="fas fa-asterisk text-gold"></i> campos obrigatórios
                </span>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <strong>Não foi possível cadastrar a loja.</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('stores.store') }}" method="POST" id="formStore">
                    @csrf

                    <div class="row g-3">
                        <!-- Nome da Loja -->
                        <div class="col-md-12">
                            <label class="form-label-xl" for="name">
                                <i class="fas fa-store"></i> Nome da Loja <span class="text-gold">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', 'XLmotors ') }}"
                                   placeholder="Ex: XLmotors Matriz, XLmotors Zona Sul" 
                                   required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Máximo 150 caracteres</small>
                        </div>

                        <!-- CNPJ e Telefone -->
                        <div class="col-md-6">
                            <label class="form-label-xl" for="cnpj">
                                <i class="fas fa-id-card"></i> CNPJ <span class="text-gold">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl @error('cnpj') is-invalid @enderror" 
                                   id="cnpj" 
                                   name="cnpj" 
                                   value="{{ old('cnpj') }}"
                                   placeholder="00.000.000/0000-00" 
                                   required
                                   maxlength="18">
                            @error('cnpj')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Formato: 00.000.000/0000-00</small>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-xl" for="phone">
                                <i class="fas fa-phone-alt"></i> Telefone <span class="text-gold">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl @error('phone') is-invalid @enderror" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   placeholder="(99) 99999-9999" 
                                   required
                                   maxlength="20">
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <small class="text-muted">Formato: (DDD) 99999-9999</small>
                        </div>

                        <!-- E-mail -->
                        <div class="col-md-12">
                            <label class="form-label-xl" for="email">
                                <i class="fas fa-envelope"></i> E-mail
                            </label>
                            <input type="email" 
                                   class="form-control form-control-xl @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   placeholder="contato@xlmotors.com"
                                   maxlength="100">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Endereço -->
                        <div class="col-md-12">
                            <label class="form-label-xl" for="address">
                                <i class="fas fa-road"></i> Endereço <span class="text-gold">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl @error('address') is-invalid @enderror" 
                                   id="address" 
                                   name="address" 
                                   value="{{ old('address') }}"
                                   placeholder="Rua, Avenida, número" 
                                   required
                                   maxlength="255">
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Complemento e Bairro -->
                        <div class="col-md-6">
                            <label class="form-label-xl" for="complement">
                                <i class="fas fa-pen"></i> Complemento
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl" 
                                   id="complement" 
                                   name="complement" 
                                   value="{{ old('complement') }}"
                                   placeholder="Sala, bloco, andar"
                                   maxlength="100">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label-xl" for="neighborhood">
                                <i class="fas fa-location-dot"></i> Bairro
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl" 
                                   id="neighborhood" 
                                   name="neighborhood" 
                                   value="{{ old('neighborhood') }}"
                                   placeholder="Bairro"
                                   maxlength="100">
                        </div>

                        <!-- Cidade, Estado e CEP -->
                        <div class="col-md-4">
                            <label class="form-label-xl" for="city">
                                <i class="fas fa-city"></i> Cidade <span class="text-gold">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl @error('city') is-invalid @enderror" 
                                   id="city" 
                                   name="city" 
                                   value="{{ old('city') }}"
                                   placeholder="Cidade" 
                                   required
                                   maxlength="100">
                            @error('city')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label-xl" for="state">
                                <i class="fas fa-flag"></i> Estado <span class="text-gold">*</span>
                            </label>
                            <select class="form-select form-control-xl @error('state') is-invalid @enderror" 
                                    id="state" 
                                    name="state" 
                                    required>
                                <option value="">Selecione</option>
                                <option value="AC" {{ old('state') == 'AC' ? 'selected' : '' }}>AC - Acre</option>
                                <option value="AL" {{ old('state') == 'AL' ? 'selected' : '' }}>AL - Alagoas</option>
                                <option value="AP" {{ old('state') == 'AP' ? 'selected' : '' }}>AP - Amapá</option>
                                <option value="AM" {{ old('state') == 'AM' ? 'selected' : '' }}>AM - Amazonas</option>
                                <option value="BA" {{ old('state') == 'BA' ? 'selected' : '' }}>BA - Bahia</option>
                                <option value="CE" {{ old('state') == 'CE' ? 'selected' : '' }}>CE - Ceará</option>
                                <option value="DF" {{ old('state') == 'DF' ? 'selected' : '' }}>DF - Distrito Federal</option>
                                <option value="ES" {{ old('state') == 'ES' ? 'selected' : '' }}>ES - Espírito Santo</option>
                                <option value="GO" {{ old('state') == 'GO' ? 'selected' : '' }}>GO - Goiás</option>
                                <option value="MA" {{ old('state') == 'MA' ? 'selected' : '' }}>MA - Maranhão</option>
                                <option value="MT" {{ old('state') == 'MT' ? 'selected' : '' }}>MT - Mato Grosso</option>
                                <option value="MS" {{ old('state') == 'MS' ? 'selected' : '' }}>MS - Mato Grosso do Sul</option>
                                <option value="MG" {{ old('state') == 'MG' ? 'selected' : '' }}>MG - Minas Gerais</option>
                                <option value="PA" {{ old('state') == 'PA' ? 'selected' : '' }}>PA - Pará</option>
                                <option value="PB" {{ old('state') == 'PB' ? 'selected' : '' }}>PB - Paraíba</option>
                                <option value="PR" {{ old('state') == 'PR' ? 'selected' : '' }}>PR - Paraná</option>
                                <option value="PE" {{ old('state') == 'PE' ? 'selected' : '' }}>PE - Pernambuco</option>
                                <option value="PI" {{ old('state') == 'PI' ? 'selected' : '' }}>PI - Piauí</option>
                                <option value="RJ" {{ old('state') == 'RJ' ? 'selected' : '' }}>RJ - Rio de Janeiro</option>
                                <option value="RN" {{ old('state') == 'RN' ? 'selected' : '' }}>RN - Rio Grande do Norte</option>
                                <option value="RS" {{ old('state') == 'RS' ? 'selected' : '' }}>RS - Rio Grande do Sul</option>
                                <option value="RO" {{ old('state') == 'RO' ? 'selected' : '' }}>RO - Rondônia</option>
                                <option value="RR" {{ old('state') == 'RR' ? 'selected' : '' }}>RR - Roraima</option>
                                <option value="SC" {{ old('state') == 'SC' ? 'selected' : '' }}>SC - Santa Catarina</option>
                                <option value="SP" {{ old('state') == 'SP' ? 'selected' : '' }}>SP - São Paulo</option>
                                <option value="SE" {{ old('state') == 'SE' ? 'selected' : '' }}>SE - Sergipe</option>
                                <option value="TO" {{ old('state') == 'TO' ? 'selected' : '' }}>TO - Tocantins</option>
                            </select>
                            @error('state')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label-xl" for="zip_code">
                                <i class="fas fa-mailbox"></i> CEP
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl" 
                                   id="zip_code" 
                                   name="zip_code" 
                                   value="{{ old('zip_code') }}"
                                   placeholder="00000-000"
                                   maxlength="10">
                            <small class="text-muted">Formato: 00000-000</small>
                        </div>

                        <!-- Horário de Funcionamento -->
                        <div class="col-md-12">
                            <label class="form-label-xl" for="opening_hours">
                                <i class="fas fa-clock"></i> Horário de Funcionamento
                            </label>
                            <input type="text" 
                                   class="form-control form-control-xl" 
                                   id="opening_hours" 
                                   name="opening_hours" 
                                   value="{{ old('opening_hours') }}"
                                   placeholder="Ex: Seg-Sex 08:30 – 19:00, Sáb 09:00 – 14:00"
                                   maxlength="200">
                        </div>

                        <!-- Observações -->
                        <div class="col-md-12">
                            <label class="form-label-xl" for="observations">
                                <i class="fas fa-pencil-alt"></i> Observações
                            </label>
                            <textarea class="form-control form-control-xl" 
                                      id="observations" 
                                      name="observations" 
                                      rows="3"
                                      placeholder="Informações adicionais sobre a loja...">{{ old('observations') }}</textarea>
                        </div>

                        <!-- Opções (Checkboxes) -->
                        <div class="col-md-12">
                            <label class="form-label-xl">
                                <i class="fas fa-cog"></i> Opções da Loja
                            </label>
                            <div class="p-3 rounded" style="background: #161616; border: 1px solid #3d3522;">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" 
                                           id="is_active" name="is_active" value="1" 
                                           {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label text-gold" for="is_active">
                                        <i class="fas fa-check-circle"></i> Loja Ativa
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" 
                                           id="is_featured" name="is_featured" value="1" 
                                           {{ old('is_featured') ? 'checked' : '' }}>
                                    <label class="form-check-label text-gold" for="is_featured">
                                        <i class="fas fa-star"></i> Destaque
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" 
                                           id="has_local_delivery" name="has_local_delivery" value="1" 
                                           {{ old('has_local_delivery') ? 'checked' : '' }}>
                                    <label class="form-check-label text-gold" for="has_local_delivery">
                                        <i class="fas fa-truck"></i> Entrega Local
                                    </label>
                                </div>
                            </div>
                            <small class="text-muted">Marque as opções desejadas para esta loja</small>
                        </div>
                    </div>

                    <!-- Botões -->
                    <div class="d-flex justify-content-end gap-2 mt-4 pt-3" style="border-top: 1px solid #3d3522;">
                        <button type="reset" class="btn btn-outline-gold" id="btnReset">
                            <i class="fas fa-undo-alt"></i> Limpar
                        </button>
                        <button type="submit" class="btn btn-gold" id="btnSubmit">
                            <i class="fas fa-save"></i> Cadastrar Loja
                        </button>
                    </div>

                    <div class="mt-3 text-end">
                        <small class="text-muted">
                            <i class="fas fa-shield-alt"></i> Todos os dados são seguros
                            <span class="ms-2">|</span>
                            <i class="fas fa-motorcycle"></i> XLmotors © {{ date('Y') }}
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Máscara para CNPJ
        const cnpjInput = document.getElementById('cnpj');
        cnpjInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 14) value = value.slice(0, 14);
            
            // Aplicar máscara: 00.000.000/0000-00
            if (value.length > 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');
            } else if (value.length > 8) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})/, '$1.$2.$3/$4');
            } else if (value.length > 5) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})/, '$1.$2.$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d{3})/, '$1.$2');
            }
            
            this.value = value;
        });

        // Máscara para Telefone
        const phoneInput = document.getElementById('phone');
        phoneInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 11) value = value.slice(0, 11);
            
            if (value.length > 10) {
                value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
            } else if (value.length > 6) {
                value = value.replace(/^(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d{4})/, '($1) $2');
            }
            
            this.value = value;
        });

        // Máscara para CEP
        const cepInput = document.getElementById('zip_code');
        cepInput.addEventListener('input', function(e) {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 8) value = value.slice(0, 8);
            
            if (value.length > 5) {
                value = value.replace(/^(\d{5})(\d{3})$/, '$1-$2');
            }
            
            this.value = value;
        });

        // Confirmar reset
        document.getElementById('btnReset').addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Deseja limpar todos os campos do formulário?')) {
                document.getElementById('formStore').reset();
                // Resetar os campos que ficam com valor padrão
                document.getElementById('is_active').checked = true;
            }
        });

        // Confirmar submit
        document.getElementById('formStore').addEventListener('submit', function(e) {
            const btnSubmit = document.getElementById('btnSubmit');
            btnSubmit.disabled = true;
            btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Cadastrando...';
            
            // O formulário será enviado normalmente
            // Se houver erro, o botão será reativado pela página
            setTimeout(() => {
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = '<i class="fas fa-save"></i> Cadastrar Loja';
            }, 3000);
        });
    });
</script>
@endpush
@endsection
