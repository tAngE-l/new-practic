@extends('layouts.app')

@section('title', 'Банк — Кредитный документооборот')

@section('steps')
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active"></span>
@endsection


@section('active-tab-7', 'active')

@section('content')
  <h2 class="h5">Банковские реквизиты</h2>
  
  <form action="{{ route('credit.generate') }}" method="POST" id="bank-step-form" onsubmit="prepareBankEmployeeData()">
    @csrf
    

    <input type="hidden" id="bank_employee" name="bank_employee" value="{{ old('bank_employee') }}">

    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="bank_name">Наименование банка <span class="text-danger">*</span></label>
        <input class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" placeholder="ПАО «Пример-Банк»" value="{{ old('bank_name') }}" required>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="bank_location">Место нахождения <span class="text-danger">*</span></label>
        <input class="form-control @error('bank_location') is-invalid @enderror" id="bank_location" name="bank_location" placeholder="г. Москва" value="{{ old('bank_location') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="bank_inn">ИНН банка <span class="text-danger">*</span></label>
        <input class="form-control @error('bank_inn') is-invalid @enderror" id="bank_inn" maxlength="10" placeholder="7700000000" value="{{ old('bank_inn') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="bank_bik">БИК <span class="text-danger">*</span></label>
        <input class="form-control @error('bank_bik') is-invalid @enderror" id="bank_bik" maxlength="9" placeholder="044525225" value="{{ old('bank_bik') }}" required>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="bank_ks">Корреспондентский счёт <span class="text-danger">*</span></label>
        <input class="form-control @error('bank_ks') is-invalid @enderror" id="bank_ks" maxlength="20" placeholder="30101810..." value="{{ old('bank_ks') }}" required>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="bank_client_account">Номер счёта клиента <span class="text-danger">*</span></label>
        <input class="form-control @error('bank_client_account') is-invalid @enderror" id="bank_client_account" maxlength="20" placeholder="40817810..." value="{{ old('bank_client_account') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="b_position">Должность сотрудника <span class="text-danger">*</span></label>
        <input class="form-control" id="b_position" placeholder="Управляющий директор" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="b_fio">ФИО сотрудника <span class="text-danger">*</span></label>
        <input class="form-control" id="b_fio" placeholder="Петров Петр Петрович" required>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="bank_basis">Основание <span class="text-danger">*</span></label>
        <select class="form-select @error('bank_basis') is-invalid @enderror" id="bank_basis" name="bank_basis" required>
          <option value="">— выберите —</option>
          <option value="Устав" {{ old('bank_basis') == 'Устав' ? 'selected' : '' }}>Устав</option>
          <option value="Доверенность" {{ old('bank_basis') == 'Доверенность' ? 'selected' : '' }}>Доверенность</option>
        </select>
      </div>
    </div>

   
    <div class="footer-actions">
      <a class="btn btn-outline-secondary" href="#" onclick="window.history.back(); return false;">← Назад</a>
      <span class="text-secondary">Шаг 7 из 7</span>
    
      <button type="submit" class="btn btn-primary">Заполнить документы</button>
    </div>
  </form>

  <script>
   
    function prepareBankEmployeeData() {
      const position = document.getElementById('b_position').value.trim();
      const fio = document.getElementById('b_fio').value.trim();
      
      if(position && fio) {
        document.getElementById('bank_employee').value = `${position} ${fio}`;
      }
    }


    document.addEventListener("DOMContentLoaded", function() {
      const rawData = document.getElementById('bank_employee').value;
      if(rawData) {
        const words = rawData.split(' ');
        if(words.length >= 2) {
  
          const fioParts = words.slice(-3);
          const posParts = words.slice(0, -3);
          
          document.getElementById('b_fio').value = fioParts.join(' ');
          document.getElementById('b_position').value = posParts.length ? posParts.join(' ') : words[0];
        }
      }
    });
  </script>
@endsection
