@extends('layouts.app')

@section('title', 'Личные данные — Кредитный документооборот')


@section('steps')
  <span class="step-dot active"></span><span class="step-dot"></span><span class="step-dot"></span>
  <span class="step-dot"></span><span class="step-dot"></span><span class="step-dot"></span><span class="step-dot"></span>
@endsection


@section('active-tab-1', 'active')


@section('content')
  <h2 class="h5">Личные данные заёмщика</h2>
  
  <form action="{{ route ('save', ['step' => 1]) }}" method="POST">
    @csrf
    
    <div class="row">
      <div class="col-md-6">
        <label class="form-label" for="fio">ФИО заёмщика <span class="text-danger">*</span></label>
        <input class="form-control @error('fio') is-invalid @enderror" type="text" id="fio" name="fio" placeholder="Иванов Иван Иванович" value="{{ old('fio') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="birth_date">Дата рождения <span class="text-danger">*</span></label>
        <input class="form-control @error('birth_date') is-invalid @enderror" type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="birth_place">Место рождения <span class="text-danger">*</span></label>
        <input class="form-control @error('birth_place') is-invalid @enderror" type="text" id="birth_place" name="birth_place" placeholder="г. Москва" value="{{ old('birth_place') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="citizenship">Гражданство <span class="text-danger">*</span></label>
        <input class="form-control @error('citizenship') is-invalid @enderror" type="text" id="citizenship" name="citizenship" value="{{ old('citizenship', 'Российская Федерация') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="marital_status">Семейное положение <span class="text-danger">*</span></label>
        <select class="form-select @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status" required>
          <option value="">— выберите —</option>
          <option value="Не состоит в браке" {{ old('marital_status') == 'Не состоит в браке' ? 'selected' : '' }}>Не состоит в браке</option>
          <option value="Состоит в браке" {{ old('marital_status') == 'Состоит в браке' ? 'selected' : '' }}>Состоит в браке</option>
          <option value="Разведён(а)" {{ old('marital_status') == 'Разведён(а)' ? 'selected' : '' }}>Разведён(а)</option>
          <option value="Вдовец / вдова" {{ old('marital_status') == 'Вдовец / вдова' ? 'selected' : '' }}>Вдовец / вдова</option>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label" for="filling_date">Текущая дата заполнения <span class="text-danger">*</span></label>
        <input class="form-control @error('filling_date') is-invalid @enderror" type="date" id="filling_date" name="filling_date" value="{{ old('filling_date', date('Y-m-d')) }}" required>
      </div>
    </div>

    <div class="footer-actions">
      <span class="text-secondary">Шаг 1 из 7</span>
      <button type="submit" class="btn btn-primary">Заполнить документы и сохранить →</button>
    </div>
  </form>
@endsection
