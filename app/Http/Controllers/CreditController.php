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
            'required' => 'Поле ":attribute" обязательно для заполнения.',
            'email' => 'Укажите корректный адрес электронной почты.',
            'fio.regex' => 'ФИО должно содержать только буквы и пробелы.',
            'passport_code.regex' => 'Код подразделения должен быть в формате xxx-xxx.',
            'inn.regex' => 'ИНН должен состоять из 12 цифр.',
            'snils.regex' => 'СНИЛС должен быть в формате xxx-xxx-xxx xx.',
        ];

        $attributes = [
            'fio' => 'ФИО заёмщика', 'birth_date' => 'Дата рождения', 'birth_place' => 'Место рождения',
            'citizenship' => 'Гражданство', 'marital_status' => 'Семейное положение', 'filling_date' => 'Дата заполнения',
            'passport_type' => 'Вид документа', 'passport_series' => 'Серия паспорта', 'passport_number' => 'Номер паспорта',
            'passport_date' => 'Дата выдачи паспорта', 'passport_issuer' => 'Кем выдан паспорт', 'passport_code' => 'Код подразделения',
            'reg_address' => 'Адрес регистрации', 'fact_address' => 'Фактический адрес', 'phone' => 'Телефон', 'email' => 'E-mail',
            'inn' => 'ИНН', 'snils' => 'СНИЛС'
        ];

        // if ($step == 1) {
        //     $request->validate([
        //         'fio' => 'required|regex:/^[а-яёА-ЯЁ\s\-]+$/u',
        //         'birth_date' => function ($attribute, $value, $fail) {
        //             if (!$value) return $fail('Укажите дату рождения.');
        //             $age = Carbon::parse($value)->age;
        //             if ($age < 18 || $age > 120) { $fail('Укажите корректную дату рождения (от 18 до 120 лет).'); }
        //         },
        //         'birth_place' => 'required|string', 'citizenship' => 'required|string', 'marital_status' => 'required|string', 'filling_date' => 'required|date',
        //     ], $messages, $attributes);
        // }
    
        // if ($step == 2) {
        //     $request->validate([
        //         'passport_type' => 'required|string', 'passport_series' => 'required|string', 'passport_number' => 'required|string',
        //         'passport_date' => 'required|date', 'passport_issuer' => 'required|string', 'passport_code' => 'required|regex:/^\d{3}-\d{3}$/',
        //         'reg_address' => 'required|string', 'fact_address' => 'required|string', 'phone' => 'required|string', 'email' => 'required|email',
        //     ], $messages, $attributes);
        // }

        // if ($step == 3) {
        //     $request->validate([
        //         'inn' => 'required|regex:/^\d{12}$/', 'snils' => 'required|regex:/^\d{3}-\d{3}-\d{3}\s\d{2}$/',
        //     ], $messages, $attributes);
        // }

        foreach ($request->except('_token', 'step', 'target_step') as $key => $value) {
            session([$key => $value]);
        }

        if ($request->has('target_step')) {
            $targetStep = (int)$request->input('target_step');
            return redirect()->route('credit.step' . $targetStep);
        }

        $nextStep = $step + 1;
        if ($nextStep > 7) {
            return redirect()->route('credit.step7');
        }

        return redirect()->route('credit.step' . $nextStep);
    }

    public function clearSession()
    {
        session()->flush(); 
        return redirect()->route('credit.step1');
    }

     public function generate(Request $request)
    {
        foreach ($request->except('_token') as $key => $value) {
            session([$key => $value]);
        }

        $allData = session()->all();

        $fieldNames = [
            'fio', 'birth_date', 'birth_place', 'citizenship', 'marital_status', 'filling_date',
            'passport_type', 'passport_series', 'passport_number', 'passport_date', 'passport_issuer', 'passport_code',
            'reg_address', 'fact_address', 'phone', 'email', 'inn', 'snils', 'client_password',
            'job_place', 'job_position', 'job_field', 'job_qualification', 'salary', 'other_income', 'expenses', 'net_income',
            'credit_purpose', 'credit_amount', 'credit_currency', 'credit_term', 'credit_rate', 'credit_psk', 'credit_overpayment', 'credit_penalty', 'product_category', 'product_total_cost', 'first_payment',
            'collateral_item', 'collateral_location', 'collateral_storage', 'collateral_owner', 'guarantor_data', 'has_past_credits', 'credit_history_details', 'bki_name', 'property_list',
            'bank_name', 'bank_location', 'bank_inn', 'bank_bik', 'bank_ks', 'bank_client_account', 'bank_employee', 'bank_basis'
        ];
        // MAIN/////////////////////////////////////////////////////////////////////////////////////////////
        // foreach ($fieldNames as $field) {
        //     $variables[$field] = isset($allData[$field]) ? trim($allData[$field]) : '';
        // } 
        // MAIN/////////////////////////////////////////////////////////////////////////////////////////////

        // ТЕСТ/////////////////////////////////////////////////////////////////////////////////////////////
        $variables = [];
        foreach ($fieldNames as $field) {
            if (in_array($field, ['birth_date', 'passport_date', 'filling_date'])) {
                $variables[$field] = '2005-05-15';
            } elseif (in_array($field, ['salary', 'other_income', 'expenses', 'net_income', 'credit_amount', 'credit_overpayment', 'product_total_cost', 'first_payment'])) {
                $variables[$field] = '550000';
            } elseif ($field == 'credit_term') {
                $variables[$field] = '36';
            } elseif ($field == 'credit_rate' || $field == 'credit_penalty') {
                $variables[$field] = '12.5';
            } elseif ($field == 'inn') {
                $variables[$field] = '123456789012';
            } elseif ($field == 'snils') {
                $variables[$field] = '123-456-789 01';
            } elseif ($field == 'has_past_credits') {
                $variables[$field] = 'Нет';
            } elseif ($field == 'passport_code') {
                $variables[$field] = '450-110';
            } elseif ($field == 'email') {
                $variables[$field] = 'borrower@example.ru';
            } elseif ($field == 'fio') {
                $variables[$field] = 'ИВАНОВ ИВАН ИВАНОВИЧ';
            } elseif ($field == 'bank_employee') {
                $variables[$field] = 'управляющий петров петр петрович';
            } else {
                $variables[$field] = 'ТЕСТ';
            }
        }
        // ТЕСТ/////////////////////////////////////////////////////////////////////////////////////////////
        if (!empty($variables['fio'])) {
            $variables['fio'] = Str::title(mb_strtolower($variables['fio']));
        }
        if (!empty($variables['bank_employee'])) {
            $variables['bank_employee'] = Str::title(mb_strtolower($variables['bank_employee']));
        }

        $templates = [
            '1.Анкета заемщика.docx', '2.Согласие.docx', '3.Согласие БКИ.docx',
            '4.Кредитный договор.docx', '5.Заключение о возможности предоставления кредита.docx'
        ];

  
        $finalZipPath = storage_path('credit_documents_' . time() . '.zip');
        $finalZip = new ZipArchive;

        if ($finalZip->open($finalZipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            $hasFiles = false;

            foreach ($templates as $templateName) {
                $templateFilePath = storage_path('app' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $templateName);
                
                if (file_exists($templateFilePath)) {
                 
                    $tempDocxFile = tempnam(sys_get_temp_dir(), 'docx');
                    copy($templateFilePath, $tempDocxFile);

                    
                    $templateZip = new ZipArchive;
                    if ($templateZip->open($tempDocxFile) === TRUE) {
                     
                        $documentXmlPath = 'word/document.xml';
                        $xmlContent = $templateZip->getFromName($documentXmlPath);

                        if ($xmlContent) {
                          
                            foreach ($variables as $key => $value) {
                                $searchLabel = '${' . $key . '}';
                                $xmlContent = str_replace($searchLabel, htmlspecialchars($value, ENT_QUOTES, 'UTF-8'), $xmlContent);
                            }
                            
                            
                            $templateZip->deleteName($documentXmlPath);
                            $templateZip->addFromString($documentXmlPath, $xmlContent);
                        }
                        $templateZip->close();
                    }

                  
                    $finalZip->addFile($tempDocxFile, $templateName);
                    $hasFiles = true;
                }
            }
            
            $finalZip->close();

            if (!$hasFiles) {
                if (file_exists($finalZipPath)) { unlink($finalZipPath); }
                return "Ошибка: Шаблоны Word не найдены в папке storage/app/templates/";
            }
        }

        
        CreditApplication::create($variables);
        
        
        // session()->flush();
        session()->forget($fieldNames);
        
        return response()->download($finalZipPath)->deleteFileAfterSend(true);
    }
}