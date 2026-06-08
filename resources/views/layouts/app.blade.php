<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Кредитный документооборот')</title>
  <style>

    body { 
      min-height: 100vh; 
      background-color: #f4f6f9; 
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
      margin: 0;
      color: #2c3e50;
    }
    

    .app-navbar { 
      background: #ffffff; 
      border-bottom: 1px solid #e2e8f0; 
      padding: 12px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      position: sticky;
      top: 0;
      z-index: 1000;
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
      color: #1e293b;
      font-weight: 700;
      font-size: 16px;
    }
    .brand-logo { 
      width: 34px; 
      height: 34px; 
      border-radius: 6px; 
      background: linear-gradient(135deg, #059669, #10b981); 
      flex-shrink: 0; 
    }
    .nav-buttons { display: flex; gap: 10px; }
    

    .btn {
      padding: 8px 16px;
      font-size: 13px;
      border-radius: 6px;
      border: 1px solid transparent;
      cursor: pointer;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      transition: all 0.15s ease-in-out;
    }
    .btg{
  
      margin-left: auto;
      
    }
    .btn-outline-primary { border-color: #10b981; color: #059669; background: transparent; }
    .btn-outline-primary:hover { background: #10b981; color: #fff; }
    .btn-outline-secondary { border-color: #cbd5e1; color: #64748b; background: transparent; }
    .btn-outline-secondary:hover { background: #f1f5f9; color: #334155; border-color: #94a3b8; }
    .btn-primary { background: #059669; color: #fff; }
    .btn-primary:hover { background: #047857; }
    .btn-exit { border-color: #fca5a5; background: #fff5f5; color: #b91c1c; }
    .btn-exit:hover { background: #fee2e2; color: #991b1b; }
    

    .container { max-width: 1100px; margin: 0 auto; padding: 40px 20px; }
    .form-card { 
      background: #ffffff; 
      border: 1px solid #e2e8f0; 
      border-radius: 10px; 
      padding: 30px;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
    }
    .small-title { color: #64748b; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 12px; margin-top: 0; }
    

    .steps-container { margin-bottom: 24px; display: flex; gap: 6px; }
    .step-dot { width: 8px; height: 8px; border-radius: 50%; display: inline-block; background: #e2e8f0; }
    .step-dot.active { background: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2); }
    
  
    .nav-pills { display: flex; flex-wrap: wrap; list-style: none; padding: 0; margin: 0 0 30px 0; border-bottom: 1px solid #e2e8f0; padding-bottom: 16px; }
    .nav-pills .nav-link { 
      color: #64748b; 
      margin: 0 6px 6px 0; 
      border-radius: 6px; 
      font-size: 14px; 
      padding: 8px 16px; 
      text-decoration: none;
      font-weight: 500;
    }
    .nav{
      height: 100px;
    }
    .nav-pills .nav-link:hover { color: #1e293b; background: #f8fafc; }
    .nav-pills .nav-link.active { background: #f0fdf4; color: #166534; font-weight: 600; border: 1px solid #bbf7d0; }
    

    .inner-card { background: #f8fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 30px; }
    .h5 { font-size: 16px; margin-top: 0; margin-bottom: 24px; font-weight: 700; color: #0f172a; text-transform: uppercase; }
    .row { display: flex; flex-wrap: wrap; margin: -12px; }
    .col-md-6 { box-sizing: border-box; padding: 12px; width: 50%; }
    @media (max-width: 768px) { .col-md-6 { width: 100%; } }
    
    .form-label { display: block; margin-bottom: 8px; font-size: 13px; color: #334155; font-weight: 600; }
    .text-danger { color: #ef4444; }
    .form-control, .form-select { 
      width: 100%; box-sizing: border-box; background: #ffffff; border: 1px solid #cbd5e1; 
      color: #1e293b; padding: 10px 14px; font-size: 14px; border-radius: 6px; outline: none; 
    }
    .form-control:focus, .form-select:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15); }
    .form-control.is-invalid, .form-select.is-invalid { border-color: #ef4444 !important; box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.12) !important; }
    
    
    .alert-danger { background-color: #fef2f2; border: 1px solid #fee2e2; color: #991b1b; padding: 16px; border-radius: 6px; margin-bottom: 24px; font-size: 14px; }
    .alert-danger ul { margin: 0; padding-left: 20px; }
    .footer-actions { display: flex; justify-content: space-between; align-items: center; margin-top: 30px; padding-top: 24px; border-top: 1px solid #e2e8f0; }
    .text-secondary { color: #64748b; font-size: 13px; font-weight: 500; }
    
  </style>
</head>
<body>


  <nav class="app-navbar">
    <a class="navbar-brand" href="{{ route('credit.step1') }}">
     
      <span>Кредитный документооборот: Автозаполнение</span>
    </a>
    <div class="nav-buttons">
     
      
      
      <button type="button" class="btn btn-exit" id="btn-exit">Выход</button>
    </div>
  </nav>

  <main class="container">
    <div class="form-card">
      <p class="small-title">Форма ввода данных</p>
      
    
      <div class="steps-container">
        @yield('steps')
        <div class="btg">
        <button type="button" class="btn btn-outline-primary" onclick="submitCurrentFormWithAction();">Заполнить документы</button>
        <a class="btn btn-outline-secondary" href="{{ route('credit.clear') }}">Очистить форму</a>
        </div>
      </div>
      
    
      <ul class="nav nav-pills">
        <li><a class="nav-link @yield('active-tab-1')" href="{{ route('credit.step1') }}">Личные данные</a></li>
        <li><a class="nav-link @yield('active-tab-2')" href="#" onclick="navigateStep(2); return false;">Паспорт и адрес</a></li>
        <li><a class="nav-link @yield('active-tab-3')" href="#" onclick="navigateStep(3); return false;">ИНН/СНИЛС</a></li>
        <li><a class="nav-link @yield('active-tab-4')" href="#" onclick="navigateStep(4); return false;">Работа и доходы</a></li>
        <li><a class="nav-link @yield('active-tab-5')" href="#" onclick="navigateStep(5); return false;">Кредитные параметры</a></li>
        <li><a class="nav-link @yield('active-tab-6')" href="#" onclick="navigateStep(6); return false;">Обеспечение и поручители</a></li>
        <li><a class="nav-link @yield('active-tab-7')" href="#" onclick="navigateStep(7); return false;">Банк</a></li>

      </ul>

     
      @if ($errors->any())
        <div class="alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

    
      <div class="inner-card">
        @yield('content')
      </div>

    </div>
  </main>

  <script>

function navigateStep(targetStep) {

  const currentForm = document.forms[0]; 
  
  if (currentForm) {
   
    if (currentForm.action.includes('generate')) {
      
      currentForm.action = "/save?step=6";
      currentForm.submit();
      return;
    }

    
    let stepInput = currentForm.querySelector('input[name="step"]');
    
   
    let currentStepNum = stepInput ? stepInput.value : (targetStep - 1);
    
    
    currentForm.action = "/save?step=" + currentStepNum;
    
    
    currentForm.submit();
  } else {
    
    window.location.href = targetStep === 1 ? '/' : '/passport';
  }
}


   
    function submitCurrentFormWithAction() {
      const currentForm = document.forms[0];
      if (currentForm) {
      
        currentForm.action = "{{ route('credit.generate') }}";
        currentForm.submit();
      }
    }

  
    document.getElementById("btn-exit")?.addEventListener("click", function (e) { 
      e.preventDefault(); 
      if(confirm("Вы действительно хотите выйти? Все несохраненные данные будут утеряны.")) {
        window.location.href = "{{ route('credit.clear') }}";
      }
    });
  </script>
</body>
</html>
