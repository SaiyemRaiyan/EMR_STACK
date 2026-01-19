
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMR Admin - Patient Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            position: relative;
        }

        #bgVideo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .main-content {
            background: transparent !important;
        }
        /* Additional styles specific to registration page */
        .container {
            margin-top: 5px;
            position: relative;
            width: 95%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Enhanced Registration Box */
        .registration-box {
            position: relative;
            width: 100%;
            padding: 30px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(70, 136, 76, 0.2);
            transition: all 0.3s ease;
            overflow: hidden;
            margin: 0 auto;
        }

        .registration-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }

        /* Background Design */
        .background-design {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            opacity: 0.03;
        }

        .zigzag-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #2f6e46 25%, transparent 25%) -50px 0,
            linear-gradient(225deg, #2f6e46 25%, transparent 25%) -50px 0,
            linear-gradient(315deg, #2f6e46 25%, transparent 25%),
            linear-gradient(45deg, #2f6e46 25%, transparent 25%);
            background-size: 100px 100px;
            background-color: transparent;
        }

        .wave-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(
                circle at 10% 20%,
                rgba(47, 110, 70, 0.1) 0%,
                transparent 20%
            ),
            radial-gradient(
                circle at 90% 80%,
                rgba(47, 110, 70, 0.1) 0%,
                transparent 20%
            ),
            radial-gradient(
                circle at 50% 50%,
                rgba(47, 110, 70, 0.05) 0%,
                transparent 30%
            );
        }

        /* Ensure content stays above background */
        .registration-box h2,
        .registration-box p,
        .form-columns,
        .button-container {
            position: relative;
            z-index: 1;
        }

        .registration-box h2 {
            font-size: 1.5em;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
            color: #0a2716;
            position: relative;
            padding-bottom: 10px;
        }

        .registration-box h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 25%;
            width: 50%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #2c6a2d, transparent);
            border-radius: 50%;
        }

        .registration-box p {
            background-color: rgba(219, 252, 216, 0.7);
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #1f293a;
        }

        /* Radio Buttons */
        .radio-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .radio-label {
            display: flex;
            align-items: center;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 3px 10px rgba(70, 136, 76, 0.1);
            border: 2px solid transparent;
        }

        .radio-label.new {
            color: #0a2716;
            background: rgba(151, 245, 212, 0.2);
            border: 2px solid #46884c;
        }

        .radio-label.follow-up {
            color: #0a2716;
            background: rgba(204, 181, 253, 0.2);
            border: 2px solid #46884c;
        }

        .radio-label:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(70, 136, 76, 0.15);
        }

        .radio-label input[type="radio"] {
            margin-right: 8px;
            cursor: pointer;
            accent-color: #0a2716;
        }

        /* Form Layout */
        .form-columns {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .column {
            width: 100%;
        }

        /* Section Styling */
        .section {
            margin-bottom: 20px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-left: 4px solid #46884c;
        }

        .section:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 1);
        }

        .section h3 {
            font-size: 1.2em;
            color: #0a2716;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid rgba(70, 136, 76, 0.2);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section h3 i {
            color: #2f6e46;
            font-size: 1em;
        }

        /* Enhanced Input Fields */
        .input-box {
            position: relative;
            margin: 15px 0;
        }

        .input-box input,
        .input-box select,
        .input-box textarea {
            width: 100%;
            height: 50px;
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #46884c;
            outline: none;
            border-radius: 6px;
            font-size: 0.9em;
            color: #1f293a;
            padding: 0 15px;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(70, 136, 76, 0.05);
        }

        .input-box textarea {
            height: 100px;
            resize: vertical;
            padding: 10px;
        }

        .input-box input:focus,
        .input-box input:valid,
        .input-box select:focus,
        .input-box select:valid,
        .input-box textarea:focus,
        .input-box textarea:valid {
            border-color: #042c15;
            box-shadow: 0 0 0 3px rgba(70, 136, 76, 0.2);
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 0.9em;
            color: #1f293a;
            pointer-events: none;
            transition: all 0.3s ease;
            background: white;
            padding: 0 5px;
        }

        .input-box input:focus ~ label,
        .input-box input:valid ~ label,
        .input-box select:focus ~ label,
        .input-box select:valid ~ label,
        .input-box textarea:focus ~ label,
        .input-box textarea:valid ~ label {
            top: 0;
            font-size: 0.8em;
            color: #0a2716;
            transform: translateY(-50%);
            font-weight: 600;
        }

        /* Date Input Styles */
        .date-input-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 8px;
        }

        .date-separate-inputs {
            display: flex;
            align-items: center;
            gap: 5px;
            flex: 1;
        }

        .date-input-box {
            position: relative;
            flex: 1;
        }

        .date-input-box input {
            width: 100%;
            height: 50px;
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #46884c;
            border-radius: 6px;
            font-size: 1em;
            color: #1f293a;
            padding: 0 15px;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(70, 136, 76, 0.05);
        }

        .date-input-box input:focus {
            border-color: #042c15;
            box-shadow: 0 0 0 3px rgba(70, 136, 76, 0.2);
            outline: none;
        }

        .date-input-box label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            font-size: 0.8em;
            color: #1f293a;
            background: white;
            padding: 0 5px;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .date-input-box input:focus ~ label,
        .date-input-box input:not(:placeholder-shown) ~ label {
            top: 0;
            font-size: 0.7em;
            color: #042c15;
            font-weight: 600;
            opacity: 1;
        }

        .date-separator {
            font-size: 1.2em;
            font-weight: bold;
            color: #46884c;
        }

        /* Compact date input styles */
        .compact-input {
            width: 100% !important;
            height: 40px !important;
            padding: 0 8px !important;
            font-size: 0.85em !important;
            text-align: center !important;
        }

        .date-input-box.compact {
            flex: 1;
            min-width: 60px;
            max-width: 80px;
        }

        .date-separate-inputs {
            gap: 3px !important;
        }

        .date-separator {
            font-size: 1em !important;
            padding: 0 2px !important;
        }

        .date-picker-btn {
            width: 40px !important;
            height: 40px !important;
            min-width: 40px !important;
        }

        .date-input-group {
            gap: 8px !important;
        }

        /* Marital Status */
        .marital-status {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 15px 0;
        }

        .marital-status label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9em;
            color: #1f293a;
            padding: 8px 15px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(70, 136, 76, 0.1);
        }

        .marital-status label:hover {
            background: #fff;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(70, 136, 76, 0.15);
        }

        .marital-status input[type="radio"] {
            accent-color: #0a2716;
        }

        /* Select Dropdown */
        .input-box select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding-right: 35px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2346884c'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E")
            no-repeat right 10px center/12px;
            cursor: pointer;
        }

        /* Buttons */
        .button-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .btn {
            width: 100%;
            max-width: 200px;
            height: 50px;
            background: linear-gradient(135deg, #042c15, #2f6e46);
            border: none;
            outline: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1em;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 5px 15px rgba(4, 44, 21, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(47, 110, 70, 0.5);
            background: linear-gradient(135deg, #2f6e46, #042c15);
        }

        .btn-reset {
            background: linear-gradient(135deg, #2f6e46, #3a8a41);
        }

        .btn-reset:hover {
            background: linear-gradient(135deg, #3a8a41, #2f6e46);
        }

        .btn-card {
            background: linear-gradient(135deg, #1a5e8f, #2d7ab5);
        }

        .btn-card:hover {
            background: linear-gradient(135deg, #2d7ab5, #1a5e8f);
        }

        /* Confirmation Message */
        .confirmation-message {
            margin-top: 20px;
            text-align: center;
            font-size: 1em;
            color: #0a2716;
            font-weight: 600;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            padding: 15px;
            border-radius: 8px;
            background: rgba(151, 245, 212, 0.3);
        }

        .confirmation-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Child Fields */
        .child-group {
            margin-top: 15px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            border-left: 4px solid #46884c;
            box-shadow: 0 3px 10px rgba(70, 136, 76, 0.1);
        }

        /* Patient Card Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 500px;
            position: relative;
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5em;
            color: #777;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            color: #333;
            transform: rotate(90deg);
        }

        /* Patient Card Design */
        .patient-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            border: 2px solid #46884c;
            position: relative;
            overflow: hidden;
        }

        .patient-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background: linear-gradient(90deg, #46884c, #2f6e46);
        }

        /* Updated Card Header Styles */
        .card-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #46884c;
            padding-bottom: 15px;
        }

        .card-header img {
            height: 50px;
            margin-right: 15px;
        }

        .card-header h2 {
            font-size: 2em;
            font-weight: 800;
            background: linear-gradient(
                90deg,
                #46884c 0%,
                #2f6e46 25%,
                #0a2716 50%,
                #2f6e46 75%,
                #46884c 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: none;
            animation: none;
            color: #0a2716;
        }

        @media print {
            .card-header h2 {
                -webkit-text-fill-color: initial !important;
                color: #0a2716 !important;
                background: none !important;
            }
        }

        .card-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5em;
            font-weight: 700;
            color: #0a2716;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
        }

        .card-title::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 25%;
            width: 50%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #46884c, transparent);
        }

        .card-details {
            margin-bottom: 20px;
        }

        .card-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px dashed #ddd;
        }

        .card-label {
            font-weight: 600;
            color: #0a2716;
        }

        .card-value {
            color: #333;
        }

        .card-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8em;
            color: #777;
        }

        .print-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background: #46884c;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .print-btn:hover {
            background: #0a2716;
            transform: translateY(-2px);
        }

        /* Shake animation for invalid fields */
        @keyframes shake {
            0%,
            100% {
                transform: translateX(0);
            }

            10%,
            30%,
            50%,
            70%,
            90% {
                transform: translateX(-5px);
            }

            20%,
            40%,
            60%,
            80% {
                transform: translateX(5px);
            }
        }

        /* Responsive Design */
        @media (min-width: 992px) {
            .column {
                width: 48%;
            }
        }

        @media (max-width: 768px) {
            .radio-buttons {
                flex-direction: column;
                align-items: center;
            }

            .button-container {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                max-width: none;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .registration-box {
                padding: 20px;
            }

            .section {
                padding: 15px;
            }

            .modal-content {
                padding: 20px 15px;
            }
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                background: white;
            }

            /* Hide everything */
            body * {
                visibility: hidden;
            }

            /* Show only the patient card */
            .patient-card,
            .patient-card * {
                visibility: visible;
            }

            /* Center the card */
            .patient-card {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 90%;
                max-width: 420px;
                box-shadow: none;
                border: 2px solid #2f6e46;
                page-break-inside: avoid;
            }

            /* Improve text alignment */
            .card-row {
                align-items: center;
            }

            .card-label {
                font-weight: 600;
            }

            .card-value {
                text-align: right;
                font-weight: 500;
            }

            /* Hide buttons */
            .print-btn {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<!-- Main Content -->
<div class="main-content" id="mainContent" style="display: flex;
    flex-direction: row;
    align-content: center;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;">

    <div class="user-info-container">
        <div class="user-dropdown">
            <div class="user-dropdown-btn">
                <i class="fas fa-user-md"></i>
                <span class="user-name" id="userName">{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="user-dropdown-content">
                <a href="#" id="logoutBtn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <div class="form-header">
        <div class="header-container">
            <div class="logo-title-container">
                <h1 class="agcrc-title">
                    AMADER GRAM CANCER CARE & RESEARCH CENTER
                </h1>
            </div>
            <div class="emr-badge">
                <h2 class="emr-system">
                    <i class="fas fa-shield-alt"></i> Electronic Medical Record (EMR)
                    System
                </h2>
            </div>
        </div>
    </div>

    <!-- Registration Container -->
    <div class="container">
        <div class="registration-box">
            <!-- Background Design -->
            <div class="background-design">
                <div class="zigzag-pattern"></div>
                <div class="wave-pattern"></div>
            </div>

            <h2><i class="fas fa-user-edit"></i> Patient Registration</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('patient-register') }}" method="POST" id="registration-form">
                @csrf
                <div class="radio-buttons">
                    <label class="radio-label new">
                        <input type="radio" name="registration_type" value="new" checked/>New Patient
                    </label>
                    <label class="radio-label follow-up">
                        <input type="radio" name="registration_type" value="follow-up" id="follow-up-radio"/>Returning Patient
                    </label>
                </div>

                <div class="form-columns">
                    <!-- Column 1 -->
                    <div class="column">
                        <!-- Section 1: Personal Information -->
                        <div class="section">
                            <h3>
                                <i class="fas fa-user-circle"></i> Personal Information
                            </h3>

                            <div class="input-box">
                                <input type="text" id="agms-number" name="agms_number" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required/>
                                <label><i class="fas fa-id-card"></i> Amader Gram Medical Services Number</label>
                            </div>

                            <div class="date-field">
                                <label for="registration-date">
                                    <i class="fas fa-calendar-day"></i> Date of Registration:
                                </label>
                                <div class="date-input-group">
                                    <div class="date-separate-inputs">
                                        <div class="date-input-box compact">
                                            <input type="number" id="reg-day" name="reg_day" min="1" max="31" placeholder="DD" required class="compact-input"/>
                                            <label>DD</label>
                                        </div>
                                        <span class="date-separator">/</span>
                                        <div class="date-input-box compact">
                                            <input type="number" id="reg-month" name="reg_month" min="1" max="12" placeholder="MM" required class="compact-input"/>
                                            <label>MM</label>
                                        </div>
                                        <span class="date-separator">/</span>
                                        <div class="date-input-box compact">
                                            <input type="number" id="reg-year" name="reg_year" min="1900" max="2100" placeholder="YYYY" required class="compact-input"/>
                                            <label>YYYY</label>
                                        </div>
                                    </div>
                                    <button type="button" class="date-picker-btn" id="reg-date-picker-btn" title="Select date from calendar">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                    <input type="hidden" id="registration-date" name="registration_date" required/>
                                </div>
                            </div>

                            <div class="input-box">
                                <input type="text" id="full-name-en" name="full_name_en" oninput="this.value = this.value.replace(/[^A-Za-z\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-signature"></i> Full Name (English)</label>
                            </div>

                            <div class="input-box">
                                <input type="text" id="preferred-name-en" name="preferred_name_en" oninput="this.value = this.value.replace(/[^A-Za-z\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-signature"></i> Preferred Name (English)</label>
                            </div>

                            <div class="input-box">
                                <select name="sex" required>
                                    <option value=""></option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                                <label><i class="fas fa-venus-mars"></i> Sex</label>
                            </div>

                            <!-- Date of Birth Section -->
                            <div class="date-field">
                                <label for="dob">
                                    <i class="fas fa-birthday-cake"></i> Date of Birth:
                                </label>
                                <div class="date-input-group">
                                    <div class="date-separate-inputs">
                                        <div class="date-input-box compact">
                                            <input type="number" id="dob-day" name="dob_day" min="1" max="31" placeholder="DD" required class="compact-input"/>
                                            <label>DD</label>
                                        </div>
                                        <span class="date-separator">/</span>
                                        <div class="date-input-box compact">
                                            <input type="number" id="dob-month" name="dob_month" min="1" max="12" placeholder="MM" required class="compact-input"/>
                                            <label>MM</label>
                                        </div>
                                        <span class="date-separator">/</span>
                                        <div class="date-input-box compact">
                                            <input type="number" id="dob-year" name="dob_year" min="1900" max="2100" placeholder="YYYY" required class="compact-input"/>
                                            <label>YYYY</label>
                                        </div>
                                    </div>
                                    <button type="button" class="date-picker-btn" id="dob-date-picker-btn" title="Select date from calendar">
                                        <i class="fas fa-calendar-alt"></i>
                                    </button>
                                    <input type="hidden" id="dob" name="date_of_birth" required />
                                </div>
                            </div>

                            <div class="input-box">
                                <input type="text" id="national-id" name="national_id" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required
                                />
                                <label><i class="fas fa-id-card-alt"></i> NID Number</label>
                            </div>
                        </div>

                        <!-- Section 3: Marital Status -->
                        <div class="section">
                            <h3><i class="fas fa-heart"></i> Marital Status</h3>

                            <div class="marital-status">
                                <label>
                                    <input type="radio" name="marital_status" value="married"/>
                                    <i class="fas fa-ring"></i> Married
                                </label>
                                <label>
                                    <input type="radio" name="marital_status" value="never-married"/>
                                    <i class="fas fa-user"></i> Never Married
                                </label>
                                <label>
                                    <input type="radio" name="marital_status" value="single"/>
                                    <i class="fas fa-user"></i> Single
                                </label>
                                <label>
                                    <input type="radio" name="marital_status" value="widow" />
                                    <i class="fas fa-user"></i> Widow
                                </label>
                                <label>
                                    <input type="radio" name="marital_status" value="divorced"/>
                                    <i class="fas fa-user-times"></i> Divorced
                                </label>
                                <label>
                                    <input type="radio" name="marital_status" value="separated"/>
                                    <i class="fas fa-user-slash"></i> Separated
                                </label>
                            </div>

                            <!-- Spouse Information (for Married ONLY) -->
                            <div id="spouse-info" style="display: none">
                                <div class="input-box">
                                    <input type="text" id="spouse-name-en" name="spouse_name_en" oninput="this.value = this.value.replace(/[^A-Za-z\s\.\-]/g, '')"/>
                                    <label><i class="fas fa-user-friends"></i> Spouse's Full Name (English)</label>
                                </div>
                            </div>

                            <!-- Children Information for Married, Widow, Divorced, Separated -->
                            <div id="children-info" style="display: none; margin-top: 15px">
                                <div class="input-box">
                                    <select id="child-count" name="number_of_children">
                                        <option value="" disabled selected>Select number of children
                                        </option>
                                        <option value="0">No Children</option>
                                        <option value="1">1 Child</option>
                                        <option value="2">2 Children</option>
                                        <option value="3">3 Children</option>
                                        <option value="4">4 Children</option>
                                        <option value="5">5 Children</option>
                                        <option value="6">6 Children</option>
                                        <option value="7">7 Children</option>
                                        <option value="8">8 Children</option>
                                        <option value="9">9 Children</option>
                                        <option value="10+">10+ Children</option>
                                    </select>
                                    <label><i class="fas fa-child"></i> Number of Children (if any)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="column">
                        <!-- Section 2: Contact Information -->
                        <div class="section">
                            <h3>
                                <i class="fas fa-address-book"></i> Contact Information
                            </h3>

                            <div class="input-box">
                                <input type="text" id="upazila" name="upazila" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-map-marker-alt"></i> Upazila (Sub-district)</label>
                            </div>

                            <div class="input-box">
                                <input type="text" id="union" name="union_name" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-map-marker-alt"></i> Union</label>
                            </div>

                            <div class="input-box">
                                <input type="text" id="village" name="village" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-map-marker-alt"></i> Village</label>
                            </div>

                            <div class="input-box">
                                <input type="text" id="household-number" name="household_number" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-home"></i> Household Number</label>
                            </div>

                            <!-- Phone Number Selection -->
                            <div class="phone-selection-container" style="margin: 20px 0">
                                <div style=" display: flex;align-items: center;  gap: 15px;flex-wrap: wrap;">
                                    <div class="input-box" style="flex: 0 0 200px">
                                        <select id="phone-type" name="phone_type" style="width: 100%">
                                            <option value="">Select Phone Type</option>
                                            <option value="own">Own Phone Number</option>
                                            <option value="family">Family Member Phone Number</option>
                                            <option value="both">Both</option>
                                        </select>
                                        <label><i class="fas fa-mobile-alt"></i> Phone Type</label>
                                    </div>

                                    <!-- Dynamic Phone Input Fields -->
                                    <div id="phone-inputs-container" style=" flex: 1; display: flex; gap: 15px; min-width: 200px;" >
                                        <!-- Phone inputs will appear here based on selection -->
                                    </div>
                                </div>
                            </div>

                            <div class="input-box">
                                <input type="email" id="email" name="email" oninput="this.value = this.value.replace(/[^A-Za-z0-9@\.\-_]/g, '')"/>
                                <label><i class="fas fa-envelope"></i> Email Address (if available)</label>
                            </div>
                        </div>

                        <!-- Section 4: Family Information -->
                        <div class="section">
                            <h3><i class="fas fa-users"></i> Family Information</h3>
                            <div class="input-box">
                                <input type="text" id="father-name" name="father_name" oninput="this.value = this.value.replace(/[^A-Za-z\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-male"></i> Father's Full Name</label>
                            </div>

                            <div class="input-box">
                                <input type="text" id="mother-name" name="mother_name" oninput="this.value = this.value.replace(/[^A-Za-z\s\.\-]/g, '')" required/>
                                <label><i class="fas fa-female"></i> Mother's Full Name</label>
                            </div>

                            <div class="input-box">
                                <input type="text" id="phone-own" name="closest_family_phone" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required/>
                                <label><i class="fas fa-mobile-alt"></i> Phone Number (Family Contact)</label>
                            </div>

                            <div class="input-box">
                                <input type="text" id="closest-family-member" name="closest_family_member" oninput="this.value = this.value.replace(/[^A-Za-z\s\.\-]/g, '')"/>
                                <label><i class="fas fa-user-friends"></i> Closest Adult Family Member (other than spouse)</label>
                            </div>

                            <div class="input-box">
                                <input type="tel" id="family-member-phone" name="family_member_phone" oninput="this.value = this.value.replace(/[^0-9]/g, '')"/>
                                <label><i class="fas fa-mobile-alt"></i> Phone Number of Closest Family Member</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit and Reset Buttons -->
                <div class="button-container">
                    <button type="submit" class="btn">
                        <i class="fas fa-check-circle"></i> Submit Registration
                    </button>
                    <button type="reset" class="btn btn-reset">
                        <i class="fas fa-redo"></i> Reset
                    </button>
                    <button type="button" class="btn btn-card" id="card-btn" disabled>
                        <i class="fas fa-id-card"></i> Record Card
                    </button>
                </div>

                <!-- Confirmation Message -->
                <div id="confirmation-message" class="confirmation-message"></div>
            </form>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><i class="fas fa-copyright"></i> Design and Developed by AGCRC</p>
        </div>
    </div>
</div>

<!-- Patient Card Modal -->
<div class="modal" id="card-modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <div class="patient-card">
            <div class="card-header">
                <img src="logo.png" alt="AGCRC Logo" />
                <h2>AGCRC</h2>
            </div>
            <h3 class="card-title">Patient Record Card</h3>
            <div class="card-details">
                <div class="card-row">
                    <span class="card-label">Patient's Name:</span>
                    <span class="card-value" id="card-patient-name"></span>
                </div>
                <div class="card-row">
                    <span class="card-label">EMR ID:</span>
                    <span class="card-value" id="card-emr-id"></span>
                </div>
                <div class="card-row">
                    <span class="card-label">Date of Birth:</span>
                    <span class="card-value" id="card-dob"></span>
                </div>
                <div class="card-row">
                    <span class="card-label">Registration Date:</span>
                    <span class="card-value" id="card-reg-date"></span>
                </div>
                <div class="card-row">
                    <span class="card-label">Village/Union:</span>
                    <span class="card-value" id="card-address"></span>
                </div>
            </div>
            <div class="card-footer">
                Please present this card during each visit to AGCRC
            </div>
            <button class="print-btn" id="print-card">
                <i class="fas fa-print"></i> Print Card
            </button>
        </div>
    </div>
</div>

<!-- EMR Confirmation Modal -->
<div id="emrModal" class="modal">
    <div class="modal-content" style="text-align: center">
        <span class="close-modal" id="closeEmrModal">&times;</span>

        <h2 style="color: #2f6e46">Patient Account Confirmation</h2>
        <p>Patient has been created. Their EMR ID is</p>

        <div
            id="generatedEmrId"
            style="
            margin: 20px auto;
            padding: 15px 30px;
            background: #2f6e46;
            color: white;
            font-size: 28px;
            font-weight: 700;
            border-radius: 30px;
            width: max-content;
          "
        >
            ---
        </div>

        <button id="confirmRegistration" class="btn">Confirm</button>
    </div>
</div>

<script>
    // Toggle sidebar functionality
   /* const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

    toggleBtn.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");
        mainContent.classList.toggle("expanded");

        // Change the arrow direction
        const icon = toggleBtn.querySelector("i");
        if (sidebar.classList.contains("collapsed")) {
            icon.classList.remove("fa-chevron-left");
            icon.classList.add("fa-chevron-right");
        } else {
            icon.classList.remove("fa-chevron-right");
            icon.classList.add("fa-chevron-left");
        }
    });

    // Submenu toggle functionality
    const patientMenu = document.querySelector(".patient-menu");
    patientMenu.addEventListener("click", function (e) {
        e.preventDefault();
        const parentLi = this.parentElement;
        parentLi.classList.toggle("active");

        // Close other open submenus if any
        document.querySelectorAll(".nav-links li").forEach((li) => {
            if (li !== parentLi && li.classList.contains("active")) {
                li.classList.remove("active");
            }
        });
    });

    // Follow-up radio button redirect
    const followUpRadio = document.getElementById("follow-up-radio");
    followUpRadio.addEventListener("change", () => {
        if (followUpRadio.checked) {
            window.location.href = "patients.html";
        }
    });
*/
    // ========== MARITAL STATUS HANDLING ==========
    const maritalStatusRadios = document.querySelectorAll(
        'input[name="marital_status"]'
    );
    const spouseInfoDiv = document.getElementById("spouse-info");
    const childrenInfoDiv = document.getElementById("children-info");
    const childCountSelect = document.getElementById("child-count");

    // Define which statuses need spouse info and which need children info
    const statusesWithSpouse = ["married"];
    const statusesWithChildren = [
        "married",
        "widow",
        "divorced",
        "separated",
    ];

    maritalStatusRadios.forEach((radio) => {
        radio.addEventListener("change", () => {
            const selectedValue = radio.value;

            console.log("Selected marital status:", selectedValue);

            // Show/hide spouse info (ONLY for Married)
            if (selectedValue === "married") {
                spouseInfoDiv.style.display = "block";
                document.getElementById("spouse-name-en").required = true;
            } else {
                spouseInfoDiv.style.display = "none";
                document.getElementById("spouse-name-en").required = false;
            }

            // Show/hide children info (for Married, Widow, Divorced, Separated)
            if (statusesWithChildren.includes(selectedValue)) {
                childrenInfoDiv.style.display = "block";
                document.getElementById("child-count").required = true;
            } else {
                childrenInfoDiv.style.display = "none";
                document.getElementById("child-count").required = false;
                if (childCountSelect) {
                    childCountSelect.value = "";
                }
            }
        });
    });

    // ========== FORM VALIDATION AND SUBMISSION ==========
    const form = document.getElementById("registration-form");
    const confirmationMessage = document.getElementById(
        "confirmation-message"
    );
    const cardBtn = document.getElementById("card-btn");
    const cardModal = document.getElementById("card-modal");
    const closeModal = document.querySelector(".close-modal");
    const printBtn = document.getElementById("print-card");

    // Date validation function
    function isValidDate(dateString) {
        if (!dateString) return false;
        const inputDate = new Date(dateString);
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        return inputDate <= today;
    }

    // NID validation function
    function isValidNID(nid) {
        return nid && nid.length === 10 && /^\d+$/.test(nid);
    }

    // Function to validate marital status
    function validateMaritalStatus() {
        let isMaritalStatusSelected = false;
        maritalStatusRadios.forEach((radio) => {
            if (radio.checked) {
                isMaritalStatusSelected = true;
            }
        });
        return isMaritalStatusSelected;
    }

    // Function to validate children info if applicable
    function validateChildrenInfo() {
        const selectedMaritalStatus = document.querySelector(
            'input[name="marital-status"]:checked'
        );

        if (
            selectedMaritalStatus &&
            statusesWithChildren.includes(selectedMaritalStatus.value)
        ) {
            const childCountSelect = document.getElementById("child-count");
            if (
                !childCountSelect ||
                !childCountSelect.value ||
                childCountSelect.value === ""
            ) {
                return false;
            }
        }
        return true;
    }

    // Function to validate spouse information if applicable
    function validateSpouseInfo() {
        const selectedMaritalStatus = document.querySelector(
            'input[name="marital-status"]:checked'
        );

        if (
            selectedMaritalStatus &&
            selectedMaritalStatus.value === "married"
        ) {
            const spouseNameEn = document.getElementById("spouse-name-en");
            if (!spouseNameEn || !spouseNameEn.value.trim()) {
                return false;
            }
        }
        return true;
    }

    // Function to reset field styles
    function resetFieldStyles() {
        const allInputs = form.querySelectorAll("input, select, textarea");
        allInputs.forEach((field) => {
            field.style.borderColor = "";
            field.style.animation = "";
        });

        const maritalStatusSection = document.querySelector(".marital-status");
        if (maritalStatusSection) {
            maritalStatusSection.style.border = "";
            maritalStatusSection.style.padding = "";
        }
    }

    // Phone validation function
    function validatePhoneNumbers() {
        const phoneType = document.getElementById("phone-type").value;

        if (phoneType === "own") {
            const ownPhone = document.getElementById("own-phone");
            if (!ownPhone || !ownPhone.value.trim()) {
                return false;
            }
        } else if (phoneType === "family") {
            const familyPhone = document.getElementById("family-phone");
            if (!familyPhone || !familyPhone.value.trim()) {
                return false;
            }
        } else if (phoneType === "both") {
            const ownPhoneBoth = document.getElementById("own-phone-both");
            const familyPhoneBoth = document.getElementById("family-phone-both");
            if (
                !ownPhoneBoth ||
                !ownPhoneBoth.value.trim() ||
                !familyPhoneBoth ||
                !familyPhoneBoth.value.trim()
            ) {
                return false;
            }
        }
        return true;
    }

    // ========== SIMPLE DATE PICKER ==========
    function createDatePicker(
        buttonId,
        dayField,
        monthField,
        yearField,
        hiddenField
    ) {
        const button = document.getElementById(buttonId);

        button.addEventListener("click", function (e) {
            e.stopPropagation(); // Prevent immediate closing

            // Remove existing date picker if any
            const existingPicker = document.getElementById("simple-date-picker");
            if (existingPicker) {
                existingPicker.remove();
                return;
            }

            // Get current date values
            const currentDay = document.getElementById(dayField).value || "";
            const currentMonth = document.getElementById(monthField).value || "";
            const currentYear = document.getElementById(yearField).value || "";

            // Create date picker dropdown
            const picker = document.createElement("div");
            picker.id = "simple-date-picker";
            picker.style.cssText = `
        position: absolute;
        background: white;
        border: 1px solid #46884c;
        border-radius: 6px;
        padding: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        z-index: 1000;
        width: 200px;
        margin-top: 5px;
      `;

            // Position near the button
            const rect = button.getBoundingClientRect();
            picker.style.left = rect.left + window.scrollX + "px";
            picker.style.top = rect.bottom + window.scrollY + "px";

            // Get current date
            const today = new Date();
            const currentYearNum = today.getFullYear();
            const currentMonthNum = today.getMonth() + 1;
            const currentDayNum = today.getDate();

            // Month selection
            picker.innerHTML = `
        <div style="margin-bottom: 10px;">
          <label style="display: block; margin-bottom: 5px; font-weight: 600; color: #0a2716; font-size: 12px;">Month:</label>
          <select id="picker-month" style="width: 100%; padding: 6px; border: 1px solid #46884c; border-radius: 4px; font-size: 14px;">
            <option value="">Select Month</option>
            <option value="1" ${
                currentMonth == 1 ? "selected" : ""
            }>Jan</option>
            <option value="2" ${
                currentMonth == 2 ? "selected" : ""
            }>Feb</option>
            <option value="3" ${
                currentMonth == 3 ? "selected" : ""
            }>Mar</option>
            <option value="4" ${
                currentMonth == 4 ? "selected" : ""
            }>Apr</option>
            <option value="5" ${
                currentMonth == 5 ? "selected" : ""
            }>May</option>
            <option value="6" ${
                currentMonth == 6 ? "selected" : ""
            }>Jun</option>
            <option value="7" ${
                currentMonth == 7 ? "selected" : ""
            }>Jul</option>
            <option value="8" ${
                currentMonth == 8 ? "selected" : ""
            }>Aug</option>
            <option value="9" ${
                currentMonth == 9 ? "selected" : ""
            }>Sep</option>
            <option value="10" ${
                currentMonth == 10 ? "selected" : ""
            }>Oct</option>
            <option value="11" ${
                currentMonth == 11 ? "selected" : ""
            }>Nov</option>
            <option value="12" ${
                currentMonth == 12 ? "selected" : ""
            }>Dec</option>
          </select>
        </div>
        <div style="margin-bottom: 10px;">
          <label style="display: block; margin-bottom: 5px; font-weight: 600; color: #0a2716; font-size: 12px;">Day:</label>
          <input type="number" id="picker-day"
                 min="1" max="31"
                 value="${currentDay}"
                 placeholder="DD"
                 style="width: 100%; padding: 6px; border: 1px solid #46884c; border-radius: 4px; font-size: 14px;">
        </div>
        <div style="margin-bottom: 15px;">
          <label style="display: block; margin-bottom: 5px; font-weight: 600; color: #0a2716; font-size: 12px;">Year:</label>
          <input type="number" id="picker-year"
                 min="1900" max="${currentYearNum}"
                 value="${currentYear || currentYearNum}"
                 placeholder="YYYY"
                 style="width: 100%; padding: 6px; border: 1px solid #46884c; border-radius: 4px; font-size: 14px;">
        </div>
        <div style="display: flex; justify-content: space-between; gap: 8px;">
          <button id="picker-today" style="flex: 1; padding: 6px; background: #46884c; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">
            Today
          </button>
          <button id="picker-apply" style="flex: 1; padding: 6px; background: #042c15; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 12px;">
            Apply
          </button>
        </div>
      `;

            document.body.appendChild(picker);

            // Close picker when clicking outside
            const closePicker = (e) => {
                if (!picker.contains(e.target) && e.target !== button) {
                    picker.remove();
                    document.removeEventListener("click", closePicker);
                }
            };

            // Add slight delay to prevent immediate closing
            setTimeout(() => {
                document.addEventListener("click", closePicker);
            }, 10);

            // Today button
            document
                .getElementById("picker-today")
                .addEventListener("click", function (e) {
                    e.stopPropagation();
                    document.getElementById("picker-day").value = currentDayNum;
                    document.getElementById("picker-month").value = currentMonthNum;
                    document.getElementById("picker-year").value = currentYearNum;
                });

            // Apply button
            document
                .getElementById("picker-apply")
                .addEventListener("click", function (e) {
                    e.stopPropagation();
                    const day = document.getElementById("picker-day").value;
                    const month = document.getElementById("picker-month").value;
                    const year = document.getElementById("picker-year").value;

                    // Validate
                    if (!day || !month || !year) {
                        alert("Please select month, day, and year");
                        return;
                    }

                    // Check if date is in future
                    const selectedDate = new Date(year, month - 1, day);
                    if (selectedDate > today) {
                        alert("You cannot select a future date!");
                        return;
                    }

                    // Update form fields
                    document.getElementById(dayField).value = day;
                    document.getElementById(monthField).value = month;
                    document.getElementById(yearField).value = year;

                    // Update hidden field with ISO format
                    document.getElementById(hiddenField).value = selectedDate
                        .toISOString()
                        .split("T")[0];

                    // Trigger floating labels
                    [dayField, monthField, yearField].forEach((id) => {
                        const input = document.getElementById(id);
                        const label = input.nextElementSibling;
                        if (label && label.tagName === "LABEL") {
                            label.style.top = "0";
                            label.style.fontSize = "0.8em";
                            label.style.color = "#042c15";
                            label.style.transform = "translateY(-50%)";
                            label.style.fontWeight = "600";
                        }
                    });

                    // Remove picker
                    picker.remove();
                    document.removeEventListener("click", closePicker);
                });
        });
    }

    // Initialize date pickers
    createDatePicker(
        "reg-date-picker-btn",
        "reg-day",
        "reg-month",
        "reg-year",
        "registration-date"
    );
    createDatePicker(
        "dob-date-picker-btn",
        "dob-day",
        "dob-month",
        "dob-year",
        "dob"
    );

    // Real-time validation to prevent future dates
    function validateDateInputs() {
        const today = new Date();
        const currentYear = today.getFullYear();
        const currentMonth = today.getMonth() + 1;
        const currentDay = today.getDate();

        // Registration date validation
        const regYear = document.getElementById("reg-year");
        const regMonth = document.getElementById("reg-month");
        const regDay = document.getElementById("reg-day");

        if (regYear.value && regYear.value > currentYear) {
            alert("Registration year cannot be in the future!");
            regYear.value = currentYear;
            return false;
        }

        if (
            regMonth.value &&
            regYear.value == currentYear &&
            regMonth.value > currentMonth
        ) {
            alert("Registration month cannot be in the future!");
            regMonth.value = currentMonth;
            return false;
        }

        if (
            regDay.value &&
            regYear.value == currentYear &&
            regMonth.value == currentMonth &&
            regDay.value > currentDay
        ) {
            alert("Registration day cannot be in the future!");
            regDay.value = currentDay;
            return false;
        }

        // Date of birth validation
        const dobYear = document.getElementById("dob-year");
        const dobMonth = document.getElementById("dob-month");
        const dobDay = document.getElementById("dob-day");

        if (dobYear.value && dobYear.value > currentYear) {
            alert("Birth year cannot be in the future!");
            dobYear.value = currentYear;
            return false;
        }

        if (
            dobMonth.value &&
            dobYear.value == currentYear &&
            dobMonth.value > currentMonth
        ) {
            alert("Birth month cannot be in the future!");
            dobMonth.value = currentMonth;
            return false;
        }

        if (
            dobDay.value &&
            dobYear.value == currentYear &&
            dobMonth.value == currentMonth &&
            dobDay.value > currentDay
        ) {
            alert("Birth day cannot be in the future!");
            dobDay.value = currentDay;
            return false;
        }

        return true;
    }

    // Add blur event listeners for real-time validation
    [
        "reg-year",
        "reg-month",
        "reg-day",
        "dob-year",
        "dob-month",
        "dob-day",
    ].forEach((id) => {
        const input = document.getElementById(id);
        if (input) {
            input.addEventListener("blur", validateDateInputs);
        }
    });

    // Main form submission handler
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        resetFieldStyles();

        // ================= VALIDATION START =================
        const nid = document.getElementById("national-id").value.trim();

        // First validate dates
        if (!validateDateInputs()) {
            return;
        }

        // Get date values after validation
        const dob = document.getElementById("dob").value;
        const regDate = document.getElementById("registration-date").value;

        // Validate NID
        if (!isValidNID(nid)) {
            alert("❌ NID must be exactly 10 digits");
            document.getElementById("national-id").focus();
            document.getElementById("national-id").style.borderColor = "#e74c3c";
            document.getElementById("national-id").style.animation = "shake 0.5s";
            return;
        }

        // Validate dates
        if (!dob) {
            alert("❌ Date of birth is required");
            document.getElementById("dob").focus();
            document.getElementById("dob").style.borderColor = "#e74c3c";
            document.getElementById("dob").style.animation = "shake 0.5s";
            return;
        }

        if (!isValidDate(dob)) {
            alert("❌ Date of birth cannot be in the future!");
            document.getElementById("dob").focus();
            document.getElementById("dob").style.borderColor = "#e74c3c";
            document.getElementById("dob").style.animation = "shake 0.5s";
            return;
        }

        if (!regDate) {
            alert("❌ Registration date is required");
            document.getElementById("registration-date").focus();
            document.getElementById("registration-date").style.borderColor =
                "#e74c3c";
            document.getElementById("registration-date").style.animation =
                "shake 0.5s";
            return;
        }

        if (!isValidDate(regDate)) {
            alert("❌ Registration date cannot be in the future!");
            document.getElementById("registration-date").focus();
            document.getElementById("registration-date").style.borderColor =
                "#e74c3c";
            document.getElementById("registration-date").style.animation =
                "shake 0.5s";
            return;
        }

        // Validate marital status
        if (!validateMaritalStatus()) {
            alert("Please select a marital status!");
            const maritalStatusSection =
                document.querySelector(".marital-status");
            maritalStatusSection.style.border = "2px solid #e74c3c";
            maritalStatusSection.style.padding = "10px";
            maritalStatusSection.style.borderRadius = "8px";
            return;
        }

        // Validate spouse information if married
        if (!validateSpouseInfo()) {
            alert("Please fill in spouse information for married status!");
            const spouseNameEn = document.getElementById("spouse-name-en");
            spouseNameEn.focus();
            spouseNameEn.style.borderColor = "#e74c3c";
            spouseNameEn.style.animation = "shake 0.5s";
            return;
        }

        // Validate children information
        if (!validateChildrenInfo()) {
            alert(
                "Please select the number of children for the selected marital status!"
            );
            const childCountSelect = document.getElementById("child-count");
            if (childCountSelect) {
                childCountSelect.focus();
                childCountSelect.style.borderColor = "#e74c3c";
                childCountSelect.style.animation = "shake 0.5s";
            }
            return;
        }

        // Validate phone numbers
        const phoneType = document.getElementById("phone-type").value;
        if (phoneType && !validatePhoneNumbers()) {
            alert("Please fill in the phone number(s) for the selected option!");
            const phoneTypeSelect = document.getElementById("phone-type");
            phoneTypeSelect.style.borderColor = "#e74c3c";
            phoneTypeSelect.style.animation = "shake 0.5s";
            return;
        }

        // Check all other required fields
        const requiredFields = form.querySelectorAll("[required]");
        for (let field of requiredFields) {
            if (field.name === "marital-status") continue;

            if (!field.value.trim()) {
                alert("❌ Please fill all required fields");
                field.focus();
                field.style.borderColor = "#e74c3c";
                field.style.animation = "shake 0.5s";
                setTimeout(() => {
                    field.style.animation = "";
                }, 500);
                return;
            }
        }

        document.getElementById('registration-form').submit();
        return false;

        // ================= VALIDATION PASSED =================
        // Generate EMR & show modal
        const generatedEmrId =
            "AGCRC-" + Math.floor(100000 + Math.random() * 900000);
        const generatedEmrIdDiv = document.getElementById("generatedEmrId");
        generatedEmrIdDiv.textContent = generatedEmrId;

        // Store patient data for the card
        const patientData = {
            name: document.getElementById("full-name-en").value,
            emrId: generatedEmrId,
            dob: document.getElementById("dob").value,
            regDate: document.getElementById("registration-date").value,
            village: document.getElementById("village").value,
            union: document.getElementById("union").value,
        };

        // Set card data
        document.getElementById("card-patient-name").textContent =
            patientData.name;
        document.getElementById("card-emr-id").textContent = patientData.emrId;
        document.getElementById("card-dob").textContent = new Date(
            patientData.dob
        ).toLocaleDateString();
        document.getElementById("card-reg-date").textContent = new Date(
            patientData.regDate
        ).toLocaleDateString();
        document.getElementById(
            "card-address"
        ).textContent = `${patientData.village}, ${patientData.union}`;

        // Show EMR modal
        const emrModal = document.getElementById("emrModal");
        emrModal.style.display = "flex";
    });

    // ========== EMR MODAL FUNCTIONALITY ==========
    const emrModal = document.getElementById("emrModal");
    const confirmBtn = document.getElementById("confirmRegistration");
    const closeEmrModal = document.getElementById("closeEmrModal");

    confirmBtn.addEventListener("click", function () {
        emrModal.style.display = "none";

        const confirmationMessage = document.getElementById(
            "confirmation-message"
        );
        const generatedEmrId =
            document.getElementById("generatedEmrId").textContent;

        confirmationMessage.innerHTML =
            "✅ Registration for new patient is done.<br><b>EMR ID:</b> " +
            generatedEmrId;
        confirmationMessage.classList.add("show");

        document.getElementById("card-btn").disabled = false;

        setTimeout(() => {
            confirmationMessage.classList.remove("show");
        }, 3000);
    });

    closeEmrModal.addEventListener("click", () => {
        emrModal.style.display = "none";
    });

    window.addEventListener("click", (e) => {
        if (e.target === emrModal) {
            emrModal.style.display = "none";
        }
    });

    // ========== PATIENT CARD MODAL ==========
    cardBtn.addEventListener("click", () => {
        cardModal.style.display = "flex";
    });

    closeModal.addEventListener("click", () => {
        cardModal.style.display = "none";
    });

    printBtn.addEventListener("click", function () {
        window.print();
    });

    window.addEventListener("click", (e) => {
        if (e.target === cardModal) {
            cardModal.style.display = "none";
        }
    });

    // ========== LOGOUT FUNCTIONALITY ==========
    /*document
        .getElementById("logoutBtn")
        .addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "index.html";
            }
        });*/

    /*document
        .getElementById("sidebarLogout")
        .addEventListener("click", function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to logout?")) {
                window.location.href = "index.html";
            }
        });*/

    // Set username
    //document.getElementById("userName").textContent = "Reza Salim";

    // ========== FLOATING LABELS FUNCTIONALITY ==========
    function applyFloatingLabels() {
        document
            .querySelectorAll(
                ".input-box input, .input-box select, .input-box textarea"
            )
            .forEach((input) => {
                if (input.value) {
                    const label = input.nextElementSibling;
                    if (label && label.tagName === "LABEL") {
                        label.style.top = "0";
                        label.style.fontSize = "0.8em";
                        label.style.color = "#042c15";
                        label.style.transform = "translateY(-50%)";
                        label.style.fontWeight = "600";
                    }
                }

                input.addEventListener("focus", () => {
                    const label = input.nextElementSibling;
                    if (label && label.tagName === "LABEL") {
                        label.style.top = "0";
                        label.style.fontSize = "0.8em";
                        label.style.color = "#042c15";
                        label.style.transform = "translateY(-50%)";
                        label.style.fontWeight = "600";
                    }
                });

                input.addEventListener("blur", () => {
                    const label = input.nextElementSibling;
                    if (label && label.tagName === "LABEL" && !input.value) {
                        label.style.top = "50%";
                        label.style.fontSize = "0.9em";
                        label.style.color = "#1f293a";
                        label.style.transform = "translateY(-50%)";
                        label.style.fontWeight = "400";
                    }
                });

                if (input.tagName === "SELECT") {
                    input.addEventListener("change", () => {
                        const label = input.nextElementSibling;
                        if (label && label.tagName === "LABEL") {
                            if (input.value) {
                                label.style.top = "0";
                                label.style.fontSize = "0.8em";
                                label.style.color = "#042c15";
                                label.style.transform = "translateY(-50%)";
                                label.style.fontWeight = "600";
                            } else {
                                label.style.top = "50%";
                                label.style.fontSize = "0.9em";
                                label.style.color = "#1f293a";
                                label.style.transform = "translateY(-50%)";
                                label.style.fontWeight = "400";
                            }
                        }
                    });
                }
            });
    }

    // Apply floating labels on page load
    document.addEventListener("DOMContentLoaded", function () {
        applyFloatingLabels();
        setTimeout(applyFloatingLabels, 100);
    });

    // ========== PHONE NUMBER SELECTION HANDLING ==========
    const phoneTypeSelect = document.getElementById("phone-type");
    const phoneInputsContainer = document.getElementById(
        "phone-inputs-container"
    );

    phoneTypeSelect.addEventListener("change", function () {
        phoneInputsContainer.innerHTML = "";
        const selectedValue = this.value;

        if (selectedValue === "own") {
            const ownPhoneDiv = document.createElement("div");
            ownPhoneDiv.className = "input-box";
            ownPhoneDiv.style.flex = "1";
            ownPhoneDiv.innerHTML = `
            <input
                type="tel"
                id="own-phone"
                name="own_phone"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                placeholder="Enter your phone number"
                required
            >
            <label><i class="fas fa-mobile-alt"></i> Your Phone Number</label>
        `;
            phoneInputsContainer.appendChild(ownPhoneDiv);
            setTimeout(() => applyFloatingLabels(), 100);
        } else if (selectedValue === "family") {
            const familyPhoneDiv = document.createElement("div");
            familyPhoneDiv.className = "input-box";
            familyPhoneDiv.style.flex = "1";
            familyPhoneDiv.innerHTML = `
            <input
                type="tel"
                id="family-phone"
                name="family_phone"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                placeholder="Enter family member's phone"
                required
            >
            <label><i class="fas fa-user-friends"></i> Family Phone Number</label>
        `;
            phoneInputsContainer.appendChild(familyPhoneDiv);
            setTimeout(() => applyFloatingLabels(), 100);
        } else if (selectedValue === "both") {
            const ownPhoneDiv = document.createElement("div");
            ownPhoneDiv.className = "input-box";
            ownPhoneDiv.style.flex = "1";
            ownPhoneDiv.innerHTML = `
            <input
                type="tel"
                id="own-phone-both"
                name="own_phone"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                placeholder="Your phone number"
                required
            >
            <label><i class="fas fa-mobile-alt"></i> Your Phone</label>
        `;

            const familyPhoneDiv = document.createElement("div");
            familyPhoneDiv.className = "input-box";
            familyPhoneDiv.style.flex = "1";
            familyPhoneDiv.innerHTML = `
            <input
                type="tel"
                id="family-phone-both"
                name="family_phone"
                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                placeholder="Family member's phone"
                required
            >
            <label><i class="fas fa-user-friends"></i> Family Phone</label>
        `;

            phoneInputsContainer.appendChild(ownPhoneDiv);
            phoneInputsContainer.appendChild(familyPhoneDiv);
            setTimeout(() => applyFloatingLabels(), 100);
        }
    });
</script>
</body>
</html>
