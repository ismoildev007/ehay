<?php

namespace App\Http\Controllers\Insurance\AccidentEvents;

use App\Http\Controllers\Controller;
use App\Models\InsurancePeriod;
use App\Models\Order;
use App\Models\District;
use App\Models\ClickTransactions;
use App\Models\OsagoCitizenship;
use App\Models\OsagoDiscount;
use App\Models\OsagoNumberDriver;
use App\Models\OsagoTypeOfPerson;
use App\Models\OsagoTypeVehicle;
use App\Models\PresenceOfCase;
use App\Models\OnlineService;
use App\Models\VehicleRegistrationRegion;
use App\Models\Dbnonre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

/* ============================------ Accident Events ------============================ */


class AccidentEventsController extends Controller
{

    // Меҳмонхонада истиқомат қилувчи шахс (сайёҳ)ларни бахтсиз ҳодисалардан суғурталаш
    public function travelers()
    {
        $districts = District::all();
        $OnlineService = OnlineService::find(11);
        return view('insurance.accidentEvents.travelers.main', compact('OnlineService', 'districts'));
    }

    public function travelersApplication()
    {
        $OnlineService = OnlineService::find(11);
        return view('insurance.accidentEvents.travelers.application', compact('OnlineService'));
    }

    public function travelersPayment(Request $request)
    {
        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $product = json_decode($request->input('product'), true);

        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }

        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );

        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Mehmonxonada istiqomat qiluvchi shaxs (sayyoh)larni baxtsiz hodisalardan sug‘urtalash
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.35, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [8],
                            'risks' => "Mehmonxonada istiqomat qiluvchi shaxs (sayyoh)larni baxtsiz hodisalardan sug‘urtalash
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                    'passportData' => [
                                        "pinfl" => $owner['pinfl'] ?? '',
                                        "seria" => $owner['seria'] ?? '',
                                        "number" => $owner['number'] ?? '',
                                    ],
                                    'fullName' => [
                                        'firstname' => $owner['firstName'] ?? "ISMOIL",
                                        'lastname' => $owner['lastName'] ?? "USMONOV",
                                        'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                    ],
                                    'regionId' => $owner['regionId'] ?? 10,
                                    'gender' => "m",
                                    'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                    'address' => $owner['address'] ?? "Toshkent",
                                    'residentType' => 1,
                                    'countryId' => 210,
                                    'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        /*return response()->json([
            'status' => $response->status(),
            'response' => $response->json(),
        ]);*/
        session([
            'napData' => $napData,
        ]);

        $order = Order::create([
            'product_ids' => 'accident-travelers',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none',
            'payment_type' => 'none',
            'payment_references' => null,
            'data' => $napData, // JSON formatga o‘tkazildi
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);


        if ($response->successful()) {
            return redirect()->route('accidentEvents.showPaymentPage', ['id' => $order->id]);
        } else {
            // Xatolikni foydalanuvchiga ko‘rsatish
            return redirect()->route('accidentEvents.application');
        }
    }

    public function showPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('accident.travelers')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.travelers')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();

        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }

    // Спорт маданият томошагоҳларида томошабинларни бахтсиз ҳодисалардан суғурталаш
    public function audience()
    {
        $OnlineService = OnlineService::find(12);
        return view('insurance.accidentEvents.audience.main', compact('OnlineService'));
    }

    public function audienceApplication()
    {
        $OnlineService = OnlineService::find(12);
        return view('insurance.accidentEvents.audience.application', compact('OnlineService'));
    }


    public function audiencePayment(Request $request)
    {

        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $product = json_decode($request->input('product'), true);
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }

        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );

        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Sport madaniyat tomoshagohlarida tomoshabinlarni baxtsiz hodisalardan sug‘urtalash
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.2, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [8],
                            'risks' => "Sport madaniyat tomoshagohlarida tomoshabinlarni baxtsiz hodisalardan sug‘urtalash
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                    'passportData' => [
                                        "pinfl" => $owner['pinfl'] ?? '',
                                        "seria" => $owner['seria'] ?? '',
                                        "number" => $owner['number'] ?? '',
                                    ],
                                    'fullName' => [
                                        'firstname' => $owner['firstName'] ?? "ISMOIL",
                                        'lastname' => $owner['lastName'] ?? "USMONOV",
                                        'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                    ],
                                    'regionId' => $owner['regionId'] ?? 10,
                                    'gender' => "m",
                                    'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                    'address' => $owner['address'] ?? "Toshkent",
                                    'residentType' => 1,
                                    'countryId' => 210,
                                    'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-audience',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        if ($response->successful()) {
            return redirect()->route('audience.showPaymentPage', ['id' => $order->id]);
        } else {
            // Xatolikni foydalanuvchiga ko‘rsatish
            return redirect()->route('audience.application');
        }
    }


    public function showAudiencePaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('audience.application')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.audience')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }


    // Спортчиларни бахтсиз ҳодисалардан эҳтиёт шарт суғурта қилиш
    public function athlete()
    {
        $OnlineService = OnlineService::find(13);
        return view('insurance.accidentEvents.athlete.main', compact('OnlineService'));
    }

    public function athleteApplication()
    {
        $OnlineService = OnlineService::find(13);
        return view('insurance.accidentEvents.athlete.application', compact('OnlineService'));
    }


    public function athletePayment(Request $request)
    {

        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }
        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );

        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Sportchilarni baxtsiz hodisalardan ehtiyot shart sug‘urta qilish
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.2, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [8],
                            'risks' => "Sportchilarni baxtsiz hodisalardan ehtiyot shart sug‘urta qilish
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                    'passportData' => [
                                        "pinfl" => $owner['pinfl'] ?? '',
                                        "seria" => $owner['seria'] ?? '',
                                        "number" => $owner['number'] ?? '',
                                    ],
                                    'fullName' => [
                                        'firstname' => $owner['firstName'] ?? "ISMOIL",
                                        'lastname' => $owner['lastName'] ?? "USMONOV",
                                        'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                    ],
                                    'regionId' => $owner['regionId'] ?? 10,
                                    'gender' => "m",
                                    'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                    'address' => $owner['address'] ?? "Toshkent",
                                    'residentType' => 1,
                                    'countryId' => 210,
                                    'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',
                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-athlete',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        if ($response->successful()) {
            return redirect()->route('athlete.showPaymentPage', ['id' => $order->id]);
        } else {
            // Xatolikni foydalanuvchiga ko‘rsatish
            return redirect()->route('athlete.application');
        }
    }

    public function athleteshowPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('athlete.application')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.athlete')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }

    //Аҳолининг иморатлари ва уй-рўзғор буюмларини комплекс суғурта қилиш
    public function comprehensive()
    {
        $OnlineService = OnlineService::find(14);
        return view('insurance.accidentEvents.comprehensive.main', compact('OnlineService'));
    }

    public function comprehensiveApplication()
    {
        $OnlineService = OnlineService::find(14);
        return view('insurance.accidentEvents.comprehensive.application', compact('OnlineService'));
    }

    public function comprehensivePayment(Request $request)
    {
        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $product = json_decode($request->input('product'), true);
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }
        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );

        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Aholining imoratlari ва uy-ro'zg'or buyumlarini kompleks sug'urta qilish
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.2, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [15, 16],
                            'risks' => "Aholining imoratlari va uy-ro'zg'or buyumlarini kompleks sug'urta qilish
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                    'passportData' => [
                                        "pinfl" => $owner['pinfl'] ?? '',
                                        "seria" => $owner['seria'] ?? '',
                                        "number" => $owner['number'] ?? '',
                                    ],
                                    'fullName' => [
                                        'firstname' => $owner['firstName'] ?? "ISMOIL",
                                        'lastname' => $owner['lastName'] ?? "USMONOV",
                                        'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                    ],
                                    'regionId' => $owner['regionId'] ?? 10,
                                    'gender' => "m",
                                    'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                    'address' => $owner['address'] ?? "Toshkent",
                                    'residentType' => 1,
                                    'countryId' => 210,
                                    'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',

                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-comprehensive',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        if ($response->successful()) {
            return redirect()->route('comprehensive.showPaymentPage', ['id' => $order->id]);
        } else {
            // Xatolikni foydalanuvchiga ko‘rsatish
            return redirect()->route('comprehensive.application');
        }
    }


    public function comprehensiveshowPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('comprehensive.application')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.comprehensive')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }

    //  Жисмоний шахсларни бахтсиз ҳодисалардан оилавий комплекс суғурталаш
    public function family()
    {
        $OnlineService = OnlineService::find(15);
        return view('insurance.accidentEvents.family.main', compact('OnlineService'));
    }

    public function familyApplication()
    {
        $OnlineService = OnlineService::find(15);
        return view('insurance.accidentEvents.family.application', compact('OnlineService'));
    }


    public function familyPayment(Request $request)
    {
        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $product = json_decode($request->input('product'), true);
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        $insuredInfo = json_decode($request->insured_info, true); // JSON ma'lumotlarni massiv sifatida olish
        $phoneNumber = $request->phone_number;
        $property = $request->property;

        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );

        $document = $applicationInfo['document'] ?? 'AC2557223';
        $series = substr($document, 0, 2); // Birinchi 2 ta harf
        $number = substr($document, 2);    // Qolgan raqamlar
        $objects = [];

        foreach ($insuredInfo as $person) {
            $fullName = [
                'firstname' => $person['firstName'] ?? '',
                'lastname' => $person['lastName'] ?? '',
                'middlename' => $person['middleName'] ?? '',
            ];

            $passportData = [
                'pinfl' => $person['pinfl'] ?? '',
                'seria' => $person['passportSeries'] ?? '',
                'number' => $person['passportNumber'] ?? '',
            ];

            $cleanPhone = isset($person['phone']) ? preg_replace('/\D/', '', $person['phone']) : null;

            $ownerPerson = [
                'passportData' => $passportData,
                'fullName' => $fullName,
                'regionId' => (int) ($person['regionId'] ?? 10),
                'gender' => $person['gender'] == '1' ? 'm' : 'f',
                'birthDate' => $person['birthDate'] ?? '',
                'address' => $person['address'] ?? '',
                'residentType' => 1,
                'countryId' => 210,
                'phone' => $cleanPhone ?? preg_replace('/\D/', '', $phoneNumber) ?? '998919579717',
            ];

            $objects[] = [
                'classes' => $property == 1 ? [8, 15, 16] : [8],
                'risks' => "“BAXTLI OILA” – Jismoniy shaxslarni baxtsiz hodisalardan oilaviy kompleks sug'urtalash",
                'insuranceSum' => (float) $insuredAmount,
                'insuranceRate' => 0.2,
                'insurancePremium' => (float) $premiumAmount,
                'price' => (float) $premiumAmount,
                'person' => $ownerPerson,
            ];
        }

        $napData = [
            'seria' => $seria,
            'number' => $number,
            'sum' => (float) $insuredAmount,
            'contractStartDate' => date('Y-m-d', strtotime($periodStartDate)),
            'contractEndDate' => date('Y-m-d', strtotime($periodEndDate)),
            'regionId' => (int) ($applicationInfo['regionId'] ?? 10),
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "“BAXTLI OILA” – Jismoniy shaxslarni baxtsiz hodisalardan oilaviy kompleks sug'urtalash",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",
            'exchangeRate' => 12827.9,
            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $applicationInfo['pinfl'] ?? "52810045550054",
                        'seria' => $series,
                        'number' => $number,
                    ],
                    'fullName' => [
                        'firstname' => $applicationInfo['firstName'] ?? "ISMOIL",
                        'lastname' => $applicationInfo['lastName'] ?? "USMONOV",
                        'middlename' => $applicationInfo['middleName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => (int) ($applicationInfo['regionId'] ?? 10),
                    'gender' => $applicationInfo['gender'] ?? "m",
                    'birthDate' => $applicationInfo['birthDate'] ?? "2004-08-13",
                    'address' => $applicationInfo['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $phoneNumber) ?? '998919579717',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => date('Y-m-d', strtotime($periodStartDate)),
                    'endDate' => date('Y-m-d', strtotime($periodEndDate)),
                    'insuranceSum' => (float) $insuredAmount,
                    'insuranceRate' => 0.2,
                    'insurancePremium' => (float) $premiumAmount,
                    'insuranceTermId' => 6,
                    'ruleLink' => "https://kafil.uz",
                    'objects' => $objects,
                ],
            ],
        ];

        // Natijani chiqarish
        // dd($napData);
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-family',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        $cadasterNumber = $request->property_number;
        $clientImage = new \GuzzleHttp\Client();
        $multipart = [
            ['name' => 'order_id', 'contents' => $order->id],
            ['name' => 'kadastr_number', 'contents' => $cadasterNumber],
        ];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $multipart[] = [
                    'name'     => 'images[]',
                    'contents' => fopen($file->getPathname(), 'r'),
                    'filename' => $file->getClientOriginalName(),
                ];
            }
        }
        if (!empty($cadasterNumber)) {
            try {
                $res = $clientImage->post('https://admin.kafil.uz/api/properties', [
                    'multipart' => $multipart,
                    'headers' => [
                        'Accept' => 'application/json',
                        // 'Authorization' => 'Bearer TOKEN',
                    ],
                ]);

                $apiResponse = json_decode($res->getBody(), true);
            } catch (\Exception $e) {
                logger()->error('Property APIga yuborishda xatolik: ' . $e->getMessage());
                dd($e); // yoki xatolikni foydalanuvchiga ko‘rsating
            }
        }



        if ($response->successful()) {
            return redirect()->route('family.showPaymentPage', ['id' => $order->id]);
        } else {
            // Xatolikni foydalanuvchiga ko‘rsatish
            return redirect()->route('accident.family');
        }
    }


    public function familyshowPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('accident.family')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.family')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }


    // Автотранспорт воситаларига ўрнатилган газ ускуналарини суғурталаш (АГУС)
    public function vehiclegas()
    {
        $OnlineService = OnlineService::find(16);
        return view('insurance.accidentEvents.vehiclegas.main', compact('OnlineService'));
    }

    public function vehiclegasApplication()
    {
        $OnlineService = OnlineService::find(16);
        return view('insurance.accidentEvents.vehiclegas.application', compact('OnlineService'));
    }

    public function vehiclegasPayment(Request $request)
    {
        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $product = json_decode($request->input('product'), true);
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }
        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );
        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Avtotransport vositalariga o'rnatilgan gaz uskunalarini sug'urtalash (AGUS)
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.2, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [15, 20],
                            'risks' => "Avtotransport vositalariga o'rnatilgan gaz uskunalarini sug'urtalash (AGUS)
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                'passportData' => [
                                    "pinfl" => $owner['pinfl'] ?? '',
                                    "seria" => $owner['seria'] ?? '',
                                    "number" => $owner['number'] ?? '',
                                ],
                                'fullName' => [
                                    'firstname' => $owner['firstName'] ?? "ISMOIL",
                                    'lastname' => $owner['lastName'] ?? "USMONOV",
                                    'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                ],
                                'regionId' => $owner['regionId'] ?? 10,
                                'gender' => "m",
                                'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                'address' => $owner['address'] ?? "Toshkent",
                                'residentType' => 1,
                                'countryId' => 210,
                                'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',

                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-vehicle-gas',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        if ($response->successful()) {
            return redirect()->route('vehiclegas.showPaymentPage', ['id' => $order->id]);
        } else {
            return redirect()->route('vehiclegas.application');
        }
    }


    public function vehiclegasshowPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('vehiclegas.application')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.vehiclegas')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }

    // Bolalarni maktab ta’tili davrida sog‘lomlashtirish oromgohlarida, pansionatlarida va boshqa tashkilotlarda davolanish, dam olish davrida sug‘urta qilish
    public function schoolChild()
    {
        $OnlineService = OnlineService::find(16);
        return view('insurance.accidentEvents.schoolChild.main', compact('OnlineService'));
    }

    public function schoolChildApplication()
    {
        $OnlineService = OnlineService::find(16);
        return view('insurance.accidentEvents.schoolChild.application', compact('OnlineService'));
    }

    public function schoolChildPayment(Request $request)
    {
        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $product = json_decode($request->input('product'), true);
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }
        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );
        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Bolalarni maktab ta’tili davrida oromgoh, pansionat va boshqa  joylarda dam olish davrida sug‘urta qilish
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($insuredAmount) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.2, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [8],
                            'risks' => "Bolalarni maktab ta’tili davrida oromgoh, pansionat va boshqa  joylarda dam olish davrida sug‘urta qilish
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                'passportData' => [
                                    "pinfl" => $owner['pinfl'] ?? '',
                                    "seria" => $owner['seria'] ?? '',
                                    "number" => $owner['number'] ?? '',
                                ],
                                'fullName' => [
                                    'firstname' => $owner['firstName'] ?? "ISMOIL",
                                    'lastname' => $owner['lastName'] ?? "USMONOV",
                                    'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                ],
                                'regionId' => $owner['regionId'] ?? 10,
                                'gender' => "m",
                                'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                'address' => $owner['address'] ?? "Toshkent",
                                'residentType' => 1,
                                'countryId' => 210,
                                'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',

                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-school',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        if ($response->successful()) {
            return redirect()->route('schoolChild.showPaymentPage', ['id' => $order->id]);
        } else {
            return redirect()->route('schoolChild.application');
        }
    }


    public function schoolChildshowPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('schoolChild.application')->with('error', 'Order not found.');
        }


        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.schoolChild')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }


    // Shaharlararo yo‘nalishda qatnovchi avtobus yo‘lovchilarini baxtsiz hodisalardan ehtiyot shart sug‘urta qilish
    public function intercityPassenger()
    {
        $OnlineService = OnlineService::all();
        return view('insurance.accidentEvents.intercityPassenger.main', compact('OnlineService'));
    }

    public function intercityPassengerApplication()
    {
        $OnlineService = OnlineService::find(16);
        return view('insurance.accidentEvents.intercityPassenger.application', compact('OnlineService'));
    }

    public function intercityPassengerPayment(Request $request)
    {
        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $product = json_decode($request->input('product'), true);
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }
        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );
        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Shaharlararo yo‘nalishda qatnovchi avtobus yo‘ловчиларини sug‘urtalash
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.2, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [8],
                            'risks' => "Shaharlararo yo‘nalishda qatnovchi avtobus yo‘lovchilarni sug‘urtalash-
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                'passportData' => [
                                    "pinfl" => $owner['pinfl'] ?? '',
                                    "seria" => $owner['seria'] ?? '',
                                    "number" => $owner['number'] ?? '',
                                ],
                                'fullName' => [
                                    'firstname' => $owner['firstName'] ?? "ISMOIL",
                                    'lastname' => $owner['lastName'] ?? "USMONOV",
                                    'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                ],
                                'regionId' => $owner['regionId'] ?? 10,
                                'gender' => "m",
                                'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                'address' => $owner['address'] ?? "Toshkent",
                                'residentType' => 1,
                                'countryId' => 210,
                                'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',

                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-intercity-passenger',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        if ($response->successful()) {
            return redirect()->route('intercityPassenger.showPaymentPage', ['id' => $order->id]);
        } else {
            return redirect()->route('intercityPassenger.application');
        }
    }


    public function intercityPassengershowPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('intercityPassenger.application')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.intercityPassenger')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }


    // Aholi gaz ballonlarini sug‘urtalash
    public function gasCylinders()
    {
        $OnlineService = OnlineService::find(16);
        return view('insurance.accidentEvents.gasCylinders.main', compact('OnlineService'));
    }

    public function gasCylindersApplication()
    {
        $OnlineService = OnlineService::find(16);
        return view('insurance.accidentEvents.gasCylinders.application', compact('OnlineService'));
    }

    public function gasCylindersPayment(Request $request)
    {
        $client = json_decode($request->input('client'), true);
        $owner = json_decode($request->input('owner'), true);

        $agreementId = $request->input('agreementId');
        $agreementDate = $request->input('agreementDate');
        $periodStartDate = $request->input('periodStartDate');
        $periodEndDate = $request->input('periodEndDate');
        $filialMfoCode = $request->input('filialMfoCode');
        $insuredAmount = $request->input('insuredAmount');
        $insuredAmountCurrency = $request->input('insuredAmountCurrency');
        $premiumAmount = $request->input('premiumAmount');
        $premiumAmountCurrency = $request->input('premiumAmountCurrency');
        $premiumPaymentDate = $request->input('premiumPaymentDate');
        $accountType = $request->input('accountType');
        $applicationInfo = json_decode($request->applicant_info, true); // JSON ma'lumotlarni massiv sifatida olish
        // if ($applicationInfo['endpointError'] == 999) {
        //return redirect()->back()->with('error', "Bunday ma'lumot ro'yxatga olinmadi.");
        // }
        // 🔐 Takrorlanmas seria va number yaratish
        do {
            $seria = strtoupper(Str::random(3));
            $number = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        } while (
            Order::where('data->seria', $seria)
                ->where('data->number', $number)
                ->exists()
        );
        $napData = [
            "seria" => $seria,
            "number" => $number,
            'sum' => $insuredAmount ?? 3319756800,
            'contractStartDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
            'contractEndDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
            'regionId' => $applicationInfo['regionId'] ?? 10,
            'areaTypeId' => 1,
            'agencyId' => 221,
            'comission' => 0,
            'insuranceProductName' => "Suyultirilgan gaz ballonidan foydalanиш oqibatida kelib chiqishi mumkin bo'lgan xavflardan sug‘urtalash
",
            'formOfInsuranceId' => 2,
            'insuranceTypeId' => 999,
            'contractLink' => "https://kafil.uz",

            'exchangeRate' => 12827.9, // static

            'uprAccountingGroupId' => 1,
            'insurant' => [
                'person' => [
                    'passportData' => [
                        'pinfl' => $client['passport']['pinfl'] ?? "52810045550054",
                        'seria' => $client['passport']['series'] ?? "AC",
                        'number' => $client['passport']['number'] ?? "2557223",
                    ],
                    'fullName' => [
                        'firstname' => $client['firstName'] ?? "ISMOIL",
                        'lastname' => $client['lastName'] ?? "USMONOV",
                        'middlename' => $client['surName'] ?? "DILSHOD O‘G‘LI",
                    ],
                    'regionId' => $client['regionId'] ?? 10,
                    'gender' => "m",
                    'birthDate' => $client['birthDate'] ?? "2004-08-13",
                    'address' => $client['address'] ?? "Toshkent",
                    'residentType' => 1,
                    'countryId' => 210,
                    'phone' => preg_replace('/\D/', '', $client['phone']) ?? '',
                ],
            ],
            'policies' => [
                [
                    'paymentConditionsId' => 3,
                    'startDate' => isset($periodStartDate) ? date('Y-m-d', strtotime($periodStartDate)) : now()->format('Y-m-d'),
                    'endDate' => isset($periodEndDate) ? date('Y-m-d', strtotime($periodEndDate)) : now()->format('Y-m-d'),
                    // static
                    // static
                    'insuranceSum' => $insuredAmount ?? 0,
                    'insuranceRate' => 0.2, // static
                    'insurancePremium' => $premiumAmount ?? 0,
                    'insuranceTermId' => 6, // static
                    'ruleLink' => "https://kafil.uz",
                    'objects' => [
                        [
                            'classes' => [15, 20],
                            'risks' => "Suyultirilgan gaz ballonidan foydalanиш oqibatida kelib chiqishi mumkin bo'lgan xavflardan sug‘urtalash
",
                            'insuranceSum' => $insuredAmount,
                            'insuranceRate' => 0.2,
                            'insurancePremium' => $premiumAmount,
                            // static
                            // static
                            'price' => $premiumAmount,
                            'person' => [
                                'passportData' => [
                                    "pinfl" => $owner['pinfl'] ?? '',
                                    "seria" => $owner['seria'] ?? '',
                                    "number" => $owner['number'] ?? '',
                                ],
                                'fullName' => [
                                    'firstname' => $owner['firstName'] ?? "ISMOIL",
                                    'lastname' => $owner['lastName'] ?? "USMONOV",
                                    'middlename' => $owner['surName'] ?? "DILSHOD O‘G‘LI",
                                ],
                                'regionId' => $owner['regionId'] ?? 10,
                                'gender' => "m",
                                'birthDate' => $owner['birthDate'] ?? "2004-08-13",
                                'address' => $owner['address'] ?? "Toshkent",
                                'residentType' => 1,
                                'countryId' => 210,
                                'phone' => preg_replace('/\D/', '', $owner['phone']) ?? '998919579717',

                            ],
                        ],
                    ],
                ],
            ],
        ];
        $response = Http::post(route('insurance.contract.add'), $napData);
        session([
            'napData' => $napData,
        ]);


        $order = Order::create([
            'product_ids' => 'accident-gas-cylinders',
            'amount' => $premiumAmount,
            'state' => 1,
            'policy_id' => $response['response']['result']['policies'][0]['uuid'] ?? 'none', // uuid saqlash,
            'payment_type' => 'none',
            'payment_references' => null, // Payment references saqlash
            'data' => $napData,
            'contract_response' => json_encode($response['response'] ?? 'none') // JSON formatga o‘tkazildi
        ]);
        /* return response()->json([
                'status' => $response->status(),
                'response' => $response->json(),
            ]); */


        if ($response->successful()) {
            return redirect()->route('gasCylinders.showPaymentPage', ['id' => $order->id]);
        } else {
            return redirect()->route('gasCylinders.application');
        }
    }


    public function gasCylindersshowPaymentPage($id)
    {
        $order = Order::find($id);
        $order_id = $order->id;
        $napData = session('napData');

        if (!$order) {
            // Agar Order topilmasa
            return redirect()->route('gasCylinders.application')->with('error', 'Order not found.');
        }

        // 5 daqiqalik vaqtni tekshirish
        $createdTime = $order->created_at;
        $currentTime = now();

        if ($currentTime->diffInMinutes($createdTime) >= 5) {
            // Agar 5 daqiqadan oshgan bo‘lsa, xatolik chiqariladi
            return redirect()->route('accident.gasCylinders')->with('error', 'This session has expired. Please restart your process.');
        }
        $data = $order->data;
        $confirmPayed = [
            "polisUuid" => $order->policy_id,
            "paidAt" => now()->format('Y-m-d H:i:s'),
            "insurancePremium" => $napData['policies'][0]['insurancePremium'] ?? 1000,
            "startDate" => $napData['policies'][0]['startDate'] ?? "2025-03-18",
            "endDate" => $napData['policies'][0]['endDate'] ?? "2025-03-19",
            "comission" => $napData['comission'] ?? 0,
            "agencyId" => $napData['agencyId'] ?? "221",
        ];
        $order->confirm_payed = $confirmPayed;
        $order->save();
        return view('insurance.accidentEvents.payments.payment', compact('order', 'order_id', 'data', 'confirmPayed'));
    }

}
