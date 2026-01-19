
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EMR Admin - Patient List</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Microsoft YaHei UI Light", "Microsoft YaHei", sans-serif;
            font-weight: bold;
        }

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

        /* Sidebar */
        .sidebar {
            width: 250px;
            height: 100vh;
            background: linear-gradient(135deg, #042c15, #2f6e46);
            position: fixed;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .logo {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .logo h2 {
            font-size: 1.5rem;
            font-weight: 700;
            white-space: nowrap;
            overflow: hidden;
            color: white;
        }

        .sidebar.collapsed .logo h2,
        .sidebar.collapsed .nav-links span {
            display: none;
        }

        .toggle-btn {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .nav-links {
            padding: 20px 0;
        }

        .nav-links li {
            list-style: none;
            padding: 0;
            position: relative;
        }

        .nav-links a {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            white-space: nowrap;
            overflow: hidden;
            font-weight: 600;
        }

        .nav-links a:hover,
        .nav-links a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid #a8e6ff;
        }

        .nav-links i {
            margin-right: 15px;
            font-size: 1.2rem;
            min-width: 20px;
            text-align: center;
        }

        /* Submenu Styles */
        .submenu {
            display: none;
            padding-left: 20px;
            background: rgba(0, 0, 0, 0.1);
        }

        .submenu li {
            list-style: none;
        }

        .submenu a {
            padding: 12px 25px 12px 50px;
            font-size: 0.9em;
            border-left: 4px solid transparent;
        }

        .submenu a:hover {
            background-color: rgba(255, 255, 255, 0.05);
            border-left: 4px solid #a8e6ff;
        }

        .dropdown-arrow {
            margin-left: auto;
            transition: transform 0.3s ease;
        }

        .nav-links li.active .dropdown-arrow {
            transform: rotate(180deg);
        }

        .nav-links li.active .submenu {
            display: block;
        }

        .patient-menu.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #a8e6ff;
        }

        .submenu i {
            margin-right: 10px;
            font-size: 1rem;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            /*margin-left: 250px;*/
            transition: all 0.3s ease;
            background: transparent !important;
            min-height: 100vh;
            position: relative;
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        /* User Info */
        .user-info-container {
            position: absolute;
            top: 20px;
            right: 30px;
            z-index: 1001;
        }

        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .user-dropdown-btn {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(70, 136, 76, 0.3);
            border-radius: 8px;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(8px);
        }

        .user-dropdown-btn:hover {
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .user-name {
            font-weight: 600;
            color: #1a3a8f;
        }

        .user-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1;
            overflow: hidden;
            margin-top: 5px;
        }

        .user-dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .user-dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .user-dropdown:hover .user-dropdown-content {
            display: block;
        }

        /* Header */
        .form-header {
            top: 0;
            left: 250px;
            right: 0;
            z-index: 100;
            padding: 20px 0;
            text-align: center;
            background: transparent;
            transition: all 0.3s ease;
        }

        .main-content.expanded .form-header {
            left: 70px;
        }

        .header-container {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            padding: 25px 40px;
            border-radius: 8px;
            background: linear-gradient(
                135deg,
                rgba(210, 245, 255, 0.95) 0%,
                rgba(230, 240, 255, 0.95) 25%,
                rgba(245, 230, 255, 0.95) 50%,
                rgba(219, 252, 216, 0.95) 75%,
                rgba(210, 245, 255, 0.95) 100%
            );
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15),
            inset 0 0 15px rgba(255, 255, 255, 0.7);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .logo-title-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }

        .header-logo {
            height: 50px;
            width: auto;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .agcrc-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            letter-spacing: 0.5px;
            line-height: 1.3;
            background: linear-gradient(
                to right,
                #1a3a8f,
                #1f884b,
                #8f1a3a,
                #1f884b,
                #1a3a8f
            );
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textShine 8s linear infinite;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        @keyframes textShine {
            0% {
                background-position: 0% center;
            }
            100% {
                background-position: 200% center;
            }
        }

        .emr-badge {
            display: inline-flex;
            align-items: center;
            position: relative;
            padding: 15px 35px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            z-index: 2;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
        }

        .emr-badge:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .emr-system {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 0;
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .emr-system span {
            background: linear-gradient(90deg, #1e8525, #2c6a2d, #5b8926);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-size: 200% auto;
            animation: gradientText 3s ease infinite;
        }

        .emr-system i {
            color: #4a8f4c;
            animation: iconGlow 3s infinite alternate;
            font-size: 1.5em;
        }

        @keyframes gradientText {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes iconGlow {
            0% {
                text-shadow: 0 0 5px rgba(74, 143, 76, 0.3);
                transform: scale(1);
            }
            100% {
                text-shadow: 0 0 15px rgba(74, 143, 76, 0.6);
                transform: scale(1.1);
            }
        }

        /* Container */
        .container {
            margin-top: 5px;
            position: relative;
            width: 95%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Enhanced Patient List Box with Background Design */
        .patient-list-box {
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

        .patient-list-box:hover {
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
        .patient-list-box h2,
        .patient-list-box p,
        .search-container,
        table {
            position: relative;
            z-index: 1;
        }

        .patient-list-box h2 {
            font-size: 1.5em;
            text-align: center;
            margin-bottom: 20px;
            font-weight: 700;
            color: #0a2716;
            position: relative;
            padding-bottom: 10px;
        }

        .patient-list-box h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 25%;
            width: 50%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #2c6a2d, transparent);
            border-radius: 50%;
        }

        .patient-list-box p {
            background-color: rgba(219, 252, 216, 0.7);
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #1f293a;
        }

        /* Search Container */
        .search-container {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .search-container input[type="text"],
        .search-container select {
            padding: 8px 15px;
            border: 1px solid #46884c;
            border-radius: 20px;
            font-size: 0.9em;
            color: #1f293a;
            background: rgba(255, 255, 255, 0.9);
            outline: none;
            transition: all 0.3s ease;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            width: 180px;
        }

        .search-container input[type="text"]:focus,
        .search-container select:focus {
            border-color: #042c15;
            box-shadow: 0 0 0 3px rgba(70, 136, 76, 0.2);
        }

        .search-container button {
            background: linear-gradient(135deg, #042c15, #2f6e46);
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 8px 15px;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            box-shadow: 0 3px 10px rgba(4, 44, 21, 0.3);
        }

        .search-container button.reset {
            background: linear-gradient(135deg, #1c6c23, #3a8a41);
        }

        .search-container button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(47, 110, 70, 0.5);
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            font-size: 0.9em;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid rgba(70, 136, 76, 0.3);
        }

        /* Table Header */
        th {
            background: linear-gradient(135deg, #042c15, #2f6e46);
            color: #fff;
            font-size: 0.95em;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: sticky;
            top: 0;
        }

        /* Table Rows - Alternating light green and white */
        tr:nth-child(even) {
            background-color: rgba(230, 255, 230, 0.7); /* Light green */
        }

        tr:nth-child(odd) {
            background-color: rgba(255, 255, 255, 0.9); /* White */
        }

        tr:hover {
            background-color: rgba(
                180,
                230,
                180,
                0.8
            ); /* Darker light green on hover */
        }

        /* View Button */
        .btn.view-btn {
            background: linear-gradient(135deg, #042c15, #2f6e46);
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 5px 12px;
            cursor: pointer;
            font-size: 0.85em;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 3px 10px rgba(4, 44, 21, 0.3);
        }

        .btn.view-btn:hover {
            background: linear-gradient(135deg, #2f6e46, #042c15);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(47, 110, 70, 0.5);
        }

        /* Send Button */
        .btn.send-btn {
            background: linear-gradient(135deg, #1a6c23, #3a8a41);
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 5px 12px;
            cursor: pointer;
            font-size: 0.85em;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 3px 10px rgba(26, 108, 35, 0.3);
        }

        .btn.send-btn:hover {
            background: linear-gradient(135deg, #3a8a41, #1a6c23);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(58, 138, 65, 0.5);
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
            max-width: 400px;
            width: 90%;
            text-align: center;
            position: relative;
            animation: modalFadeIn 0.3s ease;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }

        .confirmation-modal .modal-icon {
            color: #ff9800;
        }

        .success-modal .modal-icon {
            color: #4caf50;
        }

        .cancel-modal .modal-icon {
            color: #f44336;
        }

        .modal-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
            color: #333;
        }

        .modal-message {
            font-size: 1rem;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .modal-btn {
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-width: 120px;
        }

        .modal-btn.cancel-btn {
            background: linear-gradient(135deg, #f44336, #d32f2f);
            color: white;
        }

        .modal-btn.confirm-btn {
            background: linear-gradient(135deg, #4caf50, #2e7d32);
            color: white;
        }

        .modal-btn.ok-btn {
            background: linear-gradient(135deg, #2196f3, #1976d2);
            color: white;
            min-width: 100px;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: #1f293a;
            font-size: 0.9rem;
            margin-top: 30px;
            border-top: 1px solid rgba(70, 136, 76, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
            }

            .main-content {
                margin-left: 70px;
            }

            .form-header {
                left: 70px;
            }
        }

        @media (max-width: 768px) {
            .container {
                margin-top: 20px;
            }

            .patient-list-box {
                padding: 20px;
            }

            .search-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-container input[type="text"],
            .search-container select,
            .search-container button {
                width: 100%;
            }

            table {
                display: block;
                overflow-x: auto;
            }

            .agcrc-title {
                font-size: 1.3rem;
            }

            .emr-system {
                font-size: 1.1rem;
            }

            .user-info-container {
                top: 10px;
                right: 15px;
            }

            .user-dropdown-btn {
                padding: 8px 12px;
                font-size: 0.9rem;
            }

            .modal-content {
                padding: 20px;
            }

            .modal-buttons {
                flex-direction: column;
            }

            .modal-btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin-top: 20px;
            }

            .patient-list-box {
                padding: 15px;
            }

            .patient-list-box h2 {
                font-size: 1.3em;
            }

            th,
            td {
                padding: 8px 5px;
                font-size: 0.8em;
            }

            .agcrc-title {
                font-size: 1.1rem;
            }

            .emr-system {
                font-size: 0.95rem;
                padding: 5px 10px;
            }

            .user-info-container {
                top: 5px;
                right: 10px;
            }

            .user-dropdown-btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
<!-- Video Background -->

<!-- Main Content -->
<div class="main-content" id="mainContent">
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

    <!-- Page Header -->
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

    <!-- Patient List Container -->
    <div class="container">
        <!-- Enhanced Patient List Box -->
        <div class="patient-list-box">
            <!-- Background Design -->
            <div class="background-design">
                <div class="zigzag-pattern"></div>
                <div class="wave-pattern"></div>
            </div>
            <h2><i class="fas fa-users"></i> List of Patients</h2>
            <p>
                This screen displays patients records. Use the search box to find
                specific patients.
            </p>

            <div class="search-container">
                <input type="text" id="searchByName" placeholder="Search by Name" />
                <select id="searchById">
                    <option value="">Search by Patient ID</option>
                    <!-- Options will be dynamically populated -->
                </select>
                <button onclick="searchPatients()">
                    <i class="fas fa-search"></i> Search
                </button>
                <button class="reset" onclick="resetSearch()">
                    <i class="fas fa-redo"></i> Reset
                </button>
            </div>

            <table>
                <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>EMR ID</th>
                    <th>Name</th>
                    <th>Father/Husband Name</th>
                    <th>District</th>
                    <th>Action</th>
                    <th>Share</th>
                </tr>
                </thead>
                <tbody id="patientTableBody"></tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><i class="fas fa-copyright"></i> Design and Developed by AGCRC</p>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div class="modal-overlay confirmation-modal" id="confirmationModal">
    <div class="modal-content">
        <div class="modal-icon">
            <i class="fas fa-question-circle"></i>
        </div>
        <h3 class="modal-title">Are you sure?</h3>
        <p class="modal-message">
            You will send the patient to consultation room!
        </p>
        <div class="modal-buttons">
            <button class="modal-btn cancel-btn" onclick="cancelSend()">
                <i class="fas fa-times"></i> No, cancel!
            </button>
            <button class="modal-btn confirm-btn" onclick="confirmSend()">
                <i class="fas fa-paper-plane"></i> Yes, send!
            </button>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal-overlay success-modal" id="successModal">
    <div class="modal-content">
        <div class="modal-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <h3 class="modal-title">Successful!!</h3>
        <p class="modal-message">Patient has been sent.</p>
        <div class="modal-buttons">
            <button class="modal-btn ok-btn" onclick="closeSuccessModal()">
                <i class="fas fa-check"></i> OK
            </button>
        </div>
    </div>
</div>

<!-- Cancel Modal -->
<div class="modal-overlay cancel-modal" id="cancelModal">
    <div class="modal-content">
        <div class="modal-icon">
            <i class="fas fa-times-circle"></i>
        </div>
        <h3 class="modal-title">Cancelled!!</h3>
        <p class="modal-message">Patient not sent.</p>
        <div class="modal-buttons">
            <button class="modal-btn ok-btn" onclick="closeCancelModal()">
                <i class="fas fa-check"></i> OK
            </button>
        </div>
    </div>
</div>

<script>
    // Toggle sidebar functionality
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

   /* toggleBtn.addEventListener("click", function () {
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
    });*/

    // Submenu toggle functionality
    const patientMenu = document.querySelector(".patient-menu");
    /*patientMenu.addEventListener("click", function (e) {
        e.preventDefault();
        const parentLi = this.parentElement;
        parentLi.classList.toggle("active");

        // Close other open submenus if any
        document.querySelectorAll(".nav-links li").forEach((li) => {
            if (li !== parentLi && li.classList.contains("active")) {
                li.classList.remove("active");
            }
        });
    });*/

    // Sample data for demonstration

    fetch('{{ route('patient-list-date') }}')
        .then(response => response.json())
        .then(data => {
            renderPatients(data)
        })
        .catch(error => {
            console.error('Error:', error);
        });


    // Variable to store the patient ID being processed
    let currentPatientId = null;

    // Populate the dropdown with patient IDs
    const searchByIdDropdown = document.getElementById("searchById");
    patients.forEach((patient) => {
        const option = document.createElement("option");
        option.value = patient.id;
        option.textContent = patient.id;
        searchByIdDropdown.appendChild(option);
    });

    function renderPatients(filteredPatients = patients) {
        const tbody = document.getElementById("patientTableBody");
        tbody.innerHTML = filteredPatients
            .map(
                (patient) => `
                <tr>
                    <td>${patient.id}</td>
                    <td>${patient.recordNo}</td>
                    <td>${patient.name}</td>
                    <td>${patient.fatherHusbandName}</td>
                    <td>${patient.district}</td>
                    <td><button class="btn view-btn"><i class="fas fa-eye"></i> View</button></td>
                    <td><button class="btn send-btn" onclick="sendPatient(${patient.id}, '${patient.name}')"><i class="fas fa-paper-plane"></i> Share</button></td>
                </tr>
            `
            )
            .join("");
    }

    function viewPatient(patientId) {
        // Redirect to EMR page with patient ID
        window.location.href = `Specific-patients.html?patientId=${patientId}`;
    }

    function sendPatient(patientId, patientName) {
        currentPatientId = patientId;
        document.getElementById("confirmationModal").style.display = "flex";
    }

    function confirmSend() {
        // Here you would typically make an API call to send the patient
        console.log(`Patient ${currentPatientId} sent to consultation room`);

        // Close confirmation modal and show success modal
        document.getElementById("confirmationModal").style.display = "none";
        document.getElementById("successModal").style.display = "flex";
    }

    function cancelSend() {
        // Close confirmation modal and show cancel modal
        document.getElementById("confirmationModal").style.display = "none";
        document.getElementById("cancelModal").style.display = "flex";
    }

    function closeSuccessModal() {
        document.getElementById("successModal").style.display = "none";
    }

    function closeCancelModal() {
        document.getElementById("cancelModal").style.display = "none";
    }

    function searchPatients() {
        const searchByName = document
            .getElementById("searchByName")
            .value.toLowerCase();
        const searchById = document.getElementById("searchById").value;

        const filteredPatients = patients.filter((patient) => {
            const matchesName = patient.name.toLowerCase().includes(searchByName);
            const matchesId = searchById
                ? patient.id === parseInt(searchById)
                : true;
            return matchesName && matchesId;
        });

        renderPatients(filteredPatients);
    }

    function resetSearch() {
        document.getElementById("searchByName").value = "";
        document.getElementById("searchById").value = "";
        renderPatients();
    }

    // Close modals when clicking outside
    window.addEventListener("click", function (event) {
        const confirmationModal = document.getElementById("confirmationModal");
        const successModal = document.getElementById("successModal");
        const cancelModal = document.getElementById("cancelModal");

        if (event.target === confirmationModal) {
            confirmationModal.style.display = "none";
        }
        if (event.target === successModal) {
            successModal.style.display = "none";
        }
        if (event.target === cancelModal) {
            cancelModal.style.display = "none";
        }
    });

    // Logout functionality
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
        });
*/
    // Set username
    // document.getElementById("userName").textContent = "Reza Salim";

    // Initial render
    renderPatients();
</script>
</body>
</html>
