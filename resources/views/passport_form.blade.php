@extends('layouts.app')

@section('title', 'Паспорт и адрес — Кредитный документооборот')


@section('steps')
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
@endsection


@section('active-tab-2', 'active')

@section('content')
  <h2 class="h5">Паспортные данные</h2>
  
  
  <form action="{{ route('save', ['step' => 2]) }}" method="POST" id="passport-step-form">
    @csrf
    
    <div class="row">
      <div class="col-md-6">
        <label class="form-label" for="passport_type">Вид документа <span class="text-danger">*</span></label>
        <select class="form-select @error('passport_type') is-invalid @enderror" id="passport_type" name="passport_type" required>
          <option value="Паспорт гражданина РФ" {{ old('passport_type') == 'Паспорт гражданина РФ' ? 'selected' : '' }}>Паспорт гражданина РФ</option>
          <option value="Иной документ" {{ old('passport_type') == 'Иной документ' ? 'selected' : '' }}>Иной документ</option>
        </select>
      </div>
      
      <div class="col-md-6"></div> 
      
      <div class="col-md-6">
        <label class="form-label" for="passport_series">Серия <span class="text-danger">*</span></label>
        <input class="form-control @error('passport_series') is-invalid @enderror" id="passport_series" name="passport_series" placeholder="4510" maxlength="4" value="{{ old('passport_series') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="passport_number">Номер <span class="text-danger">*</span></label>
        <input class="form-control @error('passport_number') is-invalid @enderror" id="passport_number" name="passport_number" placeholder="123456" maxlength="6" value="{{ old('passport_number') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="passport_date">Дата выдачи <span class="text-danger">*</span></label>
        <input class="form-control @error('passport_date') is-invalid @enderror" type="date" id="passport_date" name="passport_date" value="{{ old('passport_date') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="passport_code">Код подразделения <span class="text-danger">*</span></label>
        <input class="form-control @error('passport_code') is-invalid @enderror" id="passport_code" name="passport_code" placeholder="123-456" value="{{ old('passport_code') }}" required>
        <span style="color: #64748b; font-size: 11px; display: block; margin-top: 4px;">Формат: xxx-xxx</span>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="passport_issuer">Кем выдан <span class="text-danger">*</span></label>
        <input class="form-control @error('passport_issuer') is-invalid @enderror" id="passport_issuer" name="passport_issuer" placeholder="ОУФМС России по г. Москве" value="{{ old('passport_issuer') }}" required>
      </div>
    </div>

    <h3 class="h5" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0;">Адреса и контакты</h3>
    
    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="reg_address">Адрес регистрации <span class="text-danger">*</span></label>
        <input class="form-control @error('reg_address') is-invalid @enderror" id="reg_address" name="reg_address" placeholder="г. Москва, ул. Примерная, д. 1" value="{{ old('reg_address') }}" required>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="fact_address">Фактический адрес <span class="text-danger">*</span></label>
        <input class="form-control @error('fact_address') is-invalid @enderror" id="fact_address" name="fact_address" placeholder="Совпадает с адресом регистрации" value="{{ old('fact_address') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="phone">Телефон <span class="text-danger">*</span></label>
        <input class="form-control @error('phone') is-invalid @enderror" type="tel" id="phone" name="phone" placeholder="+7 (999) 000-00-00" value="{{ old('phone') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="email">E-mail <span class="text-danger">*</span></label>
        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" placeholder="borrower@example.ru" value="{{ old('email') }}" required>
      </div>
    </div>

    
    <div class="footer-actions">
      
      <a class="btn btn-outline-secondary" href="#" onclick="window.history.back(); return false;">← Назад</a>
      <span class="text-secondary">Шаг 2 из 7</span>
      <button type="submit" class="btn btn-primary">Заполнить документы и сохранить →</button>
    </div>
  </form>
@endsection
