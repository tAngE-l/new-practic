@extends('layouts.app')

@section('title', 'Обеспечение и поручители — Кредитный документооборот')


@section('steps')
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active"></span>
  <span class="step-dot"></span>
@endsection


@section('active-tab-6', 'active')

@section('content')
  <h2 class="h5">Обеспечение (залог)</h2>
  
  <form action="{{ route('save', ['step' => 6]) }}" method="POST" id="collateral-step-form" onsubmit="prepareGuarantorData()">
    @csrf
    
   
    <input type="hidden" id="guarantor_data" name="guarantor_data" value="{{ old('guarantor_data') }}">

    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="collateral_item">Предмет залога</label>
        <input class="form-control @error('collateral_item') is-invalid @enderror" id="collateral_item" name="collateral_item" placeholder="Автомобиль Toyota Camry" value="{{ old('collateral_item') }}">
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="collateral_location">Местонахождение залога</label>
        <input class="form-control @error('collateral_location') is-invalid @enderror" id="collateral_location" name="collateral_location" placeholder="г. Москва" value="{{ old('collateral_location') }}">
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="collateral_storage">Место хранения</label>
        <input class="form-control @error('collateral_storage') is-invalid @enderror" id="collateral_storage" name="collateral_storage" value="{{ old('collateral_storage') }}">
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="collateral_owner">Владелец залога</label>
        <input class="form-control @error('collateral_owner') is-invalid @enderror" id="collateral_owner" name="collateral_owner" value="{{ old('collateral_owner') }}">
      </div>
    </div>

    <h3 class="h5" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0;">Сведения о поручителе</h3>
    
    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="g_fio">ФИО поручителя</label>
        <input class="form-control" id="g_fio" placeholder="Петров Пётр Петрович">
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="g_address">Место жительства</label>
        <input class="form-control" id="g_address" placeholder="г. Москва, ул. Новая, д. 5">
      </div>
      
      <div class="col-md-4">
        <label class="form-label" for="g_age">Возраст</label>
        <input class="form-control" type="number" id="g_age" min="18" max="120">
      </div>
      
      <div class="col-md-4">
        <label class="form-label" for="g_employer">Место работы</label>
        <input class="form-control" id="g_employer" placeholder="АО «Вектор»">
      </div>
      
      <div class="col-md-4">
        <label class="form-label" for="g_income">Доход (руб.)</label>
        <input class="form-control" type="number" id="g_income" placeholder="50000">
      </div>
    </div>

  
    <h3 class="h5" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0;">Кредитная история</h3>
    
    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label">Наличие предыдущих кредитов <span class="text-danger">*</span></label>
        <div style="display: flex; gap: 20px; margin-top: 8px; margin-bottom: 8px;">
          <label style="cursor: pointer; font-size: 14px;">
            <input type="radio" name="has_past_credits" value="Да" {{ old('has_past_credits') == 'Да' ? 'checked' : '' }} required> Да
          </label>
          <label style="cursor: pointer; font-size: 14px;">
            <input type="radio" name="has_past_credits" value="Нет" {{ old('has_past_credits', 'Нет') == 'Нет' ? 'checked' : '' }} required> Нет
          </label>
        </div>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="credit_history_details">Детали предыдущих кредитов</label>
        <textarea class="form-control @error('credit_history_details') is-invalid @enderror" id="credit_history_details" name="credit_history_details" rows="3" placeholder="Банк, сумма, срок…">{{ old('credit_history_details') }}</textarea>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="bki_name">Наименование БКИ</label>
        <input class="form-control @error('bki_name') is-invalid @enderror" id="bki_name" name="bki_name" placeholder="НБКИ" value="{{ old('bki_name') }}">
      </div>
    </div>

    <h3 class="h5" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0;">Имущество</h3>
    
    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="property_list">Перечень собственности</label>
        <textarea class="form-control @error('property_list') is-invalid @enderror" id="property_list" name="property_list" rows="3" placeholder="Квартира, дача, земельный участок…">{{ old('property_list') }}</textarea>
      </div>
    </div>

   
    <div class="footer-actions">
      <a class="btn btn-outline-secondary" href="#" onclick="window.history.back(); return false;">← Назад</a>
      <span class="text-secondary">Шаг 6 из 7</span>
      <button type="submit" class="btn btn-primary">Заполнить документы и сохранить →</button>
    </div>
  </form>

  <script>

    function prepareGuarantorData() {
      const fio = document.getElementById('g_fio').value;
      const address = document.getElementById('g_address').value;
      const age = document.getElementById('g_age').value;
      const employer = document.getElementById('g_employer').value;
      const income = document.getElementById('g_income').value;

      if(fio || address || age || employer || income) {
        document.getElementById('guarantor_data').value = `ФИО: ${fio} | Адрес: ${address} | Возраст: ${age} | Работа: ${employer} | Доход: ${income} руб.`;
      }
    }

   
    document.addEventListener("DOMContentLoaded", function() {
      const rawData = document.getElementById('guarantor_data').value;
      if(rawData && rawData.includes('|')) {
        const parts = rawData.split(' | ');
        document.getElementById('g_fio').value = parts[0]?.replace('ФИО: ', '') || '';
        document.getElementById('g_address').value = parts[1]?.replace('Адрес: ', '') || '';
        document.getElementById('g_age').value = parts[2]?.replace('Возраст: ', '') || '';
        document.getElementById('g_employer').value = parts[3]?.replace('Работа: ', '') || '';
        document.getElementById('g_income').value = parts[4]?.replace('Доход: ', '').replace(' руб.', '') || '';
      }
    });
  </script>
@endsection
