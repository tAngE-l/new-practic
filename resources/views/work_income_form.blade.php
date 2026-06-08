@extends('layouts.app')

@section('title', 'Работа и доходы — Кредитный документооборот')


@section('steps')
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active" style="background: rgba(16, 185, 129, 0.5);"></span>
  <span class="step-dot active"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
  <span class="step-dot"></span>
@endsection


@section('active-tab-4', 'active')

@section('content')
  <h2 class="h5">Сведения о работе</h2>
  
  <form action="{{ route('save', ['step' => 4]) }}" method="POST" id="work-income-step-form">
    @csrf
    
    <div class="row">
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="job_place">Место работы <span class="text-danger">*</span></label>
        <input class="form-control @error('job_place') is-invalid @enderror" id="job_place" name="job_place" placeholder="ООО «Пример»" value="{{ old('job_place') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="job_position">Должность <span class="text-danger">*</span></label>
        <input class="form-control @error('job_position') is-invalid @enderror" id="job_position" name="job_position" placeholder="Менеджер" value="{{ old('job_position') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="job_field">Сфера деятельности <span class="text-danger">*</span></label>
        <input class="form-control @error('job_field') is-invalid @enderror" id="job_field" name="job_field" placeholder="Торговля" value="{{ old('job_field') }}" required>
      </div>
      
      <div class="col-md-12" style="width: 100%; padding: 12px;">
        <label class="form-label" for="job_qualification">Квалификация <span class="text-danger">*</span></label>
        <input class="form-control @error('job_qualification') is-invalid @enderror" id="job_qualification" name="job_qualification" placeholder="Высшее образование" value="{{ old('job_qualification') }}" required>
      </div>
    </div>

    <h3 class="h5" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0;">Доходы и расходы</h3>
    
    <div class="row">
      <div class="col-md-6">
        <label class="form-label" for="salary">Зарплата (руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('salary') is-invalid @enderror" type="number" step="0.01" id="salary" name="salary" placeholder="80000" value="{{ old('salary') }}" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="other_income">Прочие доходы (руб.)</label>
        <input class="form-control @error('other_income') is-invalid @enderror" type="number" step="0.01" id="other_income" name="other_income" placeholder="0" value="{{ old('other_income', '0') }}">
      </div>
      
      <div class="col-md-6">
        <label class="form-label" for="expenses">Обязательные платежи (руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('expenses') is-invalid @enderror" type="number" step="0.01" id="expenses" name="expenses" placeholder="15000" value="{{ old('expenses') }}" required>
      </div>
      
    
      <div class="col-md-6">
        <label class="form-label" for="net_income">Чистый доход (руб.) <span class="text-danger">*</span></label>
        <input class="form-control @error('net_income') is-invalid @enderror" type="number" step="0.01" id="net_income" name="net_income" placeholder="65000" value="{{ old('net_income') }}" required>
      </div>
    </div>

  
    <div class="footer-actions">
      <a class="btn btn-outline-secondary" href="#" onclick="window.history.back(); return false;">← Назад</a>
      <span class="text-secondary">Шаг 4 из 7</span>
      <button type="submit" class="btn btn-primary">Заполнить документы и сохранить →</button>
    </div>
  </form>

 
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const salaryInput = document.getElementById('salary');
      const otherIncomeInput = document.getElementById('other_income');
      const expensesInput = document.getElementById('expenses');
      const netIncomeInput = document.getElementById('net_income');

      function calculateNetIncome() {
        const salary = parseFloat(salaryInput.value) || 0;
        const other = parseFloat(otherIncomeInput.value) || 0;
        const expenses = parseFloat(expensesInput.value) || 0;
        
       
        const net = (salary + other) - expenses;
        netIncomeInput.value = net > 0 ? net.toFixed(2) : 0;
      }

      salaryInput.addEventListener('input', calculateNetIncome);
      otherIncomeInput.addEventListener('input', calculateNetIncome);
      expensesInput.addEventListener('input', calculateNetIncome);
    });
  </script>
@endsection
