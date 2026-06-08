@extends('layouts.app')

@section('title', 'ИНН/СНИЛС — Кредитный документооборот')


@section('steps')
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
@endsection


@section('active-tab-3', 'active')

@section('content')
  <h2 class="h5">Идентификационные номера</h2>
  
  <form action="{{ route('save', ['step' => 3]) }}" method="POST" id="inn-snils-step-form">
    @csrf
    
    <div class="row">
      
      <div class="col-md-6">
        <label class="form-label" for="inn">ИНН <span class="text-danger">*</span></label>
        <input class="form-control @error('inn') is-invalid @enderror" id="inn" name="inn" placeholder="123456789012" maxlength="12" value="{{ old('inn') }}" required>
        <span style="color: #64748b; font-size: 11px; display: block; margin-top: 4px;">Должно быть ровно 12 цифр</span>
      </div>
      
     
      <div class="col-md-6">
        <label class="form-label" for="snils">СНИЛС <span class="text-danger">*</span></label>
        <input class="form-control @error('snils') is-invalid @enderror" id="snils" name="snils" placeholder="123-456-789 01" value="{{ old('snils') }}" required>
        <span style="color: #64748b; font-size: 11px; display: block; margin-top: 4px;">Формат: xxx-xxx-xxx xx</span>
      </div>
      
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="client_password">Пароль клиента (опционально)</label>
        <input class="form-control @error('client_password') is-invalid @enderror" type="password" id="client_password" name="client_password" placeholder="Необязательное поле" value="{{ old('client_password') }}">
      </div>
    </div>

   
    <div class="footer-actions">
      <a class="btn btn-outline-secondary" href="#" onclick="window.history.back(); return false;">← Назад</a>
      <span class="text-secondary">Шаг 3 из 7</span>
      <button type="submit" class="btn btn-primary">Заполнить документы и сохранить →</button>
    </div>
  </form>
@endsection
