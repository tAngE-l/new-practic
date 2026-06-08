<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditApplication;
use Illuminate\Support\Str;
use Carbon\Carbon;
use ZipArchive;

class CreditController extends Controller
{
    
    public function step1() { return view('credit_form'); }
    public function step2() { return view('passport_form'); }
    public function step3() { return view('inn_snils_form'); }
    public function step4() { return view('work_income_form'); }
    public function step5() { return view('credit_params_form'); }
    public function step6() { return view('collateral_form'); }
    public function step7() { return view('bank_form'); }


   
    public function saveStep(Request $request, $step = null)
    {
        if (!$step) {
            $step = $request->input('step');
        }

        $step = (int)($step ?? 1);

       
        $messages = [
            // 'required' => 'Поле ":attribute" обязательно для заполнения.',
            // 'email' => 'Укажите корректный адрес электронной почты в поле ":attribute".',
            // 'fio.regex' => 'ФИО должно содержать только буквы и пробелы.',
            // 'passport_code.regex' => 'Код подразделения должен быть в формате xxx-xxx.',
            // 'inn.regex' => 'ИНН должен состоять из 12 цифр.',
            // 'snils.regex' => 'СНИЛС должен быть в формате xxx-xxx-xxx xx.',
        ];

        
        $attributes = [
            // 'fio' => 'ФИО заёмщика',
            // 'birth_date' => 'Дата рождения',
            // 'birth_place' => 'Место рождения',
            // 'citizenship' => 'Гражданство',
            // 'marital_status' => 'Семейное положение',
            // 'filling_date' => 'Текущая дата заполнения',
            // 'passport_type' => 'Вид документа',
            // 'passport_series' => 'Серия паспорта',
            // 'passport_number' => 'Номер паспорта',
            // 'passport_date' => 'Дата выдачи паспорта',
            // 'passport_issuer' => 'Кем выдан паспорт',
            // 'passport_code' => 'Код подразделения',
            // 'reg_address' => 'Адрес регистрации',
            // 'fact_address' => 'Фактический адрес',
            // 'phone' => 'Телефон',
            // 'email' => 'E-mail',
            // 'inn' => 'ИНН',
            // 'snils' => 'СНИЛС',
        ];

      
        if ($step == 1) {
            $request->validate([
                // 'fio' => 'required|regex:/^[а-яёА-ЯЁ\s\-]+$/u',
                // 'birth_date' => function ($attribute, $value, $fail) {
                //     if (!$value) return $fail('Укажите дату рождения.');
                //     $age = \Carbon\Carbon::parse($value)->age;
                //     if ($age < 18 || $age > 120) { $fail('Укажите корректную дату рождения (от 18 до 120 лет).'); }
                // },
                // 'birth_place' => 'required|string',
                // 'citizenship' => 'required|string',
                // 'marital_status' => 'required|string',
                // 'filling_date' => 'required|date',
            ], $messages, $attributes);
        }

        if ($step == 2) {
            $request->validate([
                // 'passport_type' => 'required|string',
                // 'passport_series' => 'required|string',
                // 'passport_number' => 'required|string',
                // 'passport_date' => 'required|date',
                // 'passport_issuer' => 'required|string',
                // 'passport_code' => 'required|regex:/^\d{3}-\d{3}$/',
                // 'reg_address' => 'required|string',
                // 'fact_address' => 'required|string',
                // 'phone' => 'required|string',
                // 'email' => 'required|email',
            ], $messages, $attributes);
        }

        if ($step == 3) {
            $request->validate([
                // 'inn' => 'required|regex:/^\d{12}$/',
                // 'snils' => 'required|regex:/^\d{3}-\d{3}-\d{3}\s\d{2}$/',
            ], $messages, $attributes);
        }

        
        foreach ($request->except('_token', 'step') as $key => $value) {
            session([$key => $value]);
        }

        $nextStep = $step + 1;

        if ($nextStep > 7) {
            return redirect()->route('credit.step7');
        }

        return redirect()->route('credit.step' . $nextStep);
    }

    public function generate(Request $request)
    {
     
        foreach ($request->except('_token') as $key => $value) {
            session([$key => $value]);
        }

       
        $allData = session()->all();

       
        $validator = \Illuminate\Support\Facades\Validator::make($allData, [
        
            'fio' => 'required|regex:/^[а-яёА-ЯЁ\s\-]+$/u',
            'birth_date' => function ($attribute, $value, $fail) {
                if (!$value) return $fail('Укажите дату рождения.');
                $age = \Carbon\Carbon::parse($value)->age;
                if ($age < 18 || $age > 120) { $fail('Укажите корректную дату рождения (от 18 до 120 лет).'); }
            },
            'birth_place' => 'required|string',
            'citizenship' => 'required|string',
            'marital_status' => 'required|string',
            'filling_date' => 'required|date',
            
            'passport_type' => 'required|string',
            'passport_series' => 'required|string',
            'passport_number' => 'required|string',
            'passport_date' => 'required|date',
            'passport_issuer' => 'required|string',
            'passport_code' => 'required|regex:/^\d{3}-\d{3}$/',
            'reg_address' => 'required|string',
            'fact_address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
          
            'inn' => 'required|regex:/^\d{12}$/',
            'snils' => 'required|regex:/^\d{3}-\d{3}-\d{3}\s\d{2}$/',
         
            'job_place' => 'required|string',
            'job_position' => 'required|string',
            'job_field' => 'required|string',
            'job_qualification' => 'required|string',
            'salary' => 'required|numeric',
            'expenses' => 'required|numeric',
            'net_income' => 'required|numeric',
        
            'credit_purpose' => 'required|string',
            'credit_amount' => 'required|numeric|gt:0',
            'credit_currency' => 'required|string',
            'credit_term' => 'required|integer|between:1,360',
            'credit_rate' => 'required|numeric|between:0,100',
            'credit_psk' => 'required|string',
            'credit_overpayment' => 'required|numeric',
            'credit_penalty' => 'required|numeric|between:0,100',
            'product_category' => 'required|string',
            'product_total_cost' => 'required|numeric',
            'first_payment' => 'required|numeric',
            
            'bank_name' => 'required|string',
            'bank_location' => 'required|string',
            'bank_inn' => 'required|string',
            'bank_bik' => 'required|string',
            'bank_ks' => 'required|string',
            'bank_client_account' => 'required|string',
            'bank_employee' => 'required|string',
            'bank_basis' => 'required|string',
        ], [
            
            'fio.regex' => 'ФИО должно содержать только буквы и пробелы.',
            'passport_code.regex' => 'Код подразделения должен быть в формате xxx-xxx.',
            'inn.regex' => 'ИНН должен состоять из 12 цифр.',
            'snils.regex' => 'СНИЛС должен быть в формате xxx-xxx-xxx xx.',
            'credit_amount.gt' => 'Сумма кредита должна быть положительным числом.',
            'credit_rate.between' => 'Ставка должна быть от 0 до 100 %.',
            'credit_term.between' => 'Срок кредита — от 1 до 360 месяцев.',
            'credit_penalty.between' => 'Неустойка должна быть от 0 до 100 %.',

            
            'required' => 'Поле ":attribute" обязательно для заполнения.',
            'numeric' => 'Поле ":attribute" должно быть числом.',
            'email' => 'Укажите корректный адрес электронной почты в поле ":attribute".',
        ], [
            
            'fio' => 'ФИО заёмщика',
            'birth_date' => 'Дата рождения',
            'birth_place' => 'Место рождения',
            'citizenship' => 'Гражданство',
            'marital_status' => 'Семейное положение',
            'filling_date' => 'Текущая дата заполнения',
            'passport_type' => 'Вид документа',
            'passport_series' => 'Серия паспорта',
            'passport_number' => 'Номер паспорта',
            'passport_date' => 'Дата выдачи паспорта',
            'passport_issuer' => 'Кем выдан паспорт',
            'passport_code' => 'Код подразделения',
            'reg_address' => 'Адрес регистрации',
            'fact_address' => 'Фактический адрес',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'inn' => 'ИНН',
            'snils' => 'СНИЛС',
            'job_place' => 'Место работы',
            'job_position' => 'Должность',
            'job_field' => 'Сфера деятельности',
            'job_qualification' => 'Квалификация',
            'salary' => 'Зарплата',
            'expenses' => 'Обязательные платежи',
            'net_income' => 'Чистый доход',
            'credit_purpose' => 'Цель кредита',
            'credit_amount' => 'Сумма кредита',
            'credit_currency' => 'Валюта',
            'credit_term' => 'Срок кредита',
            'credit_rate' => 'Процентная ставка',
            'credit_psk' => 'Полная стоимость кредита (ПСК)',
            'credit_overpayment' => 'Переплата',
            'credit_penalty' => 'Неустойка',
            'product_category' => 'Категория товаров/услуг',
            'product_total_cost' => 'Общая стоимость товаров/услуг',
            'first_payment' => 'Первоначальный взнос',
            'bank_name' => 'Наименование банка',
            'bank_location' => 'Место нахождения банка',
            'bank_inn' => 'ИНН банка',
            'bank_bik' => 'БИК',
            'bank_ks' => 'Корреспондентский счёт',
            'bank_client_account' => 'Номер счёта клиента',
            'bank_employee' => 'Должность и ФИО сотрудника банка',
            'bank_basis' => 'Основание',
        ]);

      
        if ($validator->fails()) {
            return redirect()->route('credit.step1')->withErrors($validator);
        }

        $validated = $validator->validated();

       
        $validated['client_password'] = $allData['client_password'] ?? null;
        $validated['collateral_item'] = $allData['collateral_item'] ?? null;
        $validated['collateral_location'] = $allData['collateral_location'] ?? null;
        $validated['collateral_storage'] = $allData['collateral_storage'] ?? null;
        $validated['collateral_owner'] = $allData['collateral_owner'] ?? null;
        $validated['guarantor_data'] = $allData['guarantor_data'] ?? null;
        $validated['has_past_credits'] = $allData['has_past_credits'] ?? 'Нет';
        $validated['credit_history_details'] = $allData['credit_history_details'] ?? null;
        $validated['bki_name'] = $allData['bki_name'] ?? null;
        $validated['property_list'] = $allData['property_list'] ?? null;

       
        $validated['fio'] = Str::title(mb_strtolower($validated['fio']));
        $validated['bank_employee'] = Str::title(mb_strtolower($validated['bank_employee']));

      
        $application = CreditApplication::create($validated);

       
        $templates = ['1.Анкета заемщика.docx', '2.Согласие.docx', '3.Согласие БКИ.docx', '4.Кредитный договор.docx', '5.Заключение о возможности предоставления кредита.docx'];
        $zipPath = storage_path('app/public/documents_' . $application->id . '.zip');
        $zip = new ZipArchive;

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            foreach ($templates as $templateName) {
                $templateFilePath = storage_path('app/templates/' . $templateName);
                if (file_exists($templateFilePath)) {
                    $templateProcessor = new \App\Libraries\PhpWord\TemplateProcessor($templateFilePath);
                    foreach ($validated as $key => $value) {
                        $templateProcessor->setValue($key, $value);
                    }
                    $tempFile = tempnam(sys_get_temp_dir(), 'docx');
                    $templateProcessor->saveAs($tempFile);
                    $zip->addFile($tempFile, $templateName);
                }
            }
            $zip->close();
        }

      
        session()->flush();
        return response()->download($zipPath)->deleteFileAfterSend(true);
    }}