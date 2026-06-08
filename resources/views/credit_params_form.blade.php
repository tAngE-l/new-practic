@extends('layouts.app')

@section('title', 'Кредитные параметры — Кредитный документооборот')


@section('steps')
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
@endsection


@section('active-tab-5', 'active')

@section('content')
  <h2 class="h5">Кредитные параметры</h2>
  
  <form action="{{ route('save', ['step' => 5]) }}" method="POST" id="credit-params-step-form">
    @csrf
    
    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="credit_purpose">Цель кредита <span class="text-danger">*</span></label>
        <input class="form-control @error('credit_purpose') is-invalid @enderror" id="credit_purpose" name="credit_purpose" placeholder="Потребительские нужды" value="{{ old('credit_purpose') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="credit_amount">Сумма кредита (руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('credit_amount') is-invalid @enderror" type="number" step="0.01" id="credit_amount" name="credit_amount" placeholder="500000" value="{{ old('credit_amount') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="credit_currency">Валюта <span class="text-danger">*</span></label>
        <select class="form-select @error('credit_currency') is-invalid @enderror" id="credit_currency" name="credit_currency" required>
          <option value="RUB" {{ old('credit_currency') == 'RUB' ? 'selected' : '' }}>RUB</option>
          <option value="USD" {{ old('credit_currency') == 'USD' ? 'selected' : '' }}>USD</option>
          <option value="EUR" {{ old('credit_currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
        </select>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="credit_term">Срок (месяцы) <span class="text-danger">*</span></label>
        <input class="form-control @error('credit_term') is-invalid @enderror" type="number" id="credit_term" name="credit_term" placeholder="36" min="1" max="360" value="{{ old('credit_term') }}" required>
        <span style="color: #64748b; font-size: 11px; display: block; margin-top: 4px;">От 1 до 360 месяцев</span>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="credit_rate">Процентная ставка (%) <span class="text-danger">*</span></label>
        <input class="form-control @error('credit_rate') is-invalid @enderror" type="number" step="0.01" id="credit_rate" name="credit_rate" placeholder="12.5" min="0" max="100" value="{{ old('credit_rate') }}" required>
        <span style="color: #64748b; font-size: 11px; display: block; margin-top: 4px;">От 0 до 100 %</span>
      </div>
      
   
      <div class="col-md-6">
        <label class="form-label" for="credit_psk">Полная стоимость кредита (% и руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('credit_psk') is-invalid @enderror" id="credit_psk" name="credit_psk" placeholder="14.2% / 120000 руб." value="{{ old('credit_psk') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="credit_overpayment">Переплата (руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('credit_overpayment') is-invalid @enderror" type="number" step="0.01" id="credit_overpayment" name="credit_overpayment" placeholder="95000" value="{{ old('credit_overpayment') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="credit_penalty">Неустойка (%) <span class="text-danger">*</span></label>
        <input class="form-control @error('credit_penalty') is-invalid @enderror" type="number" step="0.01" id="credit_penalty" name="credit_penalty" placeholder="0.1" min="0" max="100" value="{{ old('credit_penalty') }}" required>
        <span style="color: #64748b; font-size: 11px; display: block; margin-top: 4px;">От 0 до 100 %</span>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="product_category">Категория товаров/услуг <span class="text-danger">*</span></label>
        <input class="form-control @error('product_category') is-invalid @enderror" id="product_category" name="product_category" placeholder="Бытовая техника" value="{{ old('product_category') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="product_total_cost">Общая стоимость товаров (руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('product_total_cost') is-invalid @enderror" type="number" step="0.01" id="product_total_cost" name="product_total_cost" placeholder="550000" value="{{ old('product_total_cost') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="first_payment">Первоначальный взнос (руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('first_payment') is-invalid @enderror" type="number" step="0.01" id="first_payment" name="first_payment" placeholder="50000" value="{{ old('first_payment') }}" required>
      </div>
    </div>

  
    <div class="footer-actions">
      <a class="btn btn-outline-secondary" href="#" onclick="window.history.back(); return false;">← Назад</a>
      <span class="text-secondary">Шаг 5 из 7</span>
      <button type="submit" class="btn btn-primary">Заполнить документы и сохранить →</button>
    </div>
  </form>
@endsection
