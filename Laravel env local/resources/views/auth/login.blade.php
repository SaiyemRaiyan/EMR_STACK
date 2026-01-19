
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | AGCRC</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Microsoft YaHei UI Light", "Microsoft YaHei", sans-serif;
            font-weight: bold;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("AG.jpg") no-repeat center center/cover;
            color: #333;
            overflow: hidden;
            padding: 20px;
        }

        /* Header Styles */
        .form-header {
            position: fixed;
            top: 20px;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 20px 0;
            text-align: center;
            background: transparent;
        }

        .header-container {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 35px;
            border-radius: 10px;
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

        .header-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(
                circle at 20% 30%,
                rgba(255, 255, 255, 0.8) 0%,
                transparent 50%
            ),
            radial-gradient(
                circle at 80% 70%,
                rgba(255, 255, 255, 0.6) 0%,
                transparent 50%
            );
            z-index: 1;
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
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 30px;
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

        .emr-badge::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(30, 133, 37, 0.1) 0%,
                rgba(44, 106, 45, 0.1) 50%,
                rgba(91, 137, 38, 0.1) 100%
            );
            animation: rotate 20s linear infinite;
            z-index: -1;
        }

        .emr-system {
            font-size: 1.4rem;
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
            text-shadow: none;
            filter: none;
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

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
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

        /* Main Container */
        .container {
            display: flex;
            width: 90%;
            max-width: 1000px;
            margin-top: 180px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
        }

        /* Instructions Panel */
        .instructions {
            flex: 1;
            padding: 30px;
            background: linear-gradient(135deg, #e8f9e5, #d4f1d4);
            color: #2c3e50;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 1;
        }

        .instructions h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #0a2716;
            position: relative;
            padding-bottom: 10px;
        }

        .instructions h3::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #2c6a2d, #4a8f4c);
            border-radius: 3px;
        }

        .instructions p {
            margin-bottom: 15px;
            font-size: 1rem;
            line-height: 1.6;
        }

        .instructions ul {
            margin: 15px 0 20px 20px;
        }

        .instructions li {
            margin-bottom: 12px;
            font-size: 0.95rem;
        }

        .note-box {
            background: rgba(213, 237, 150, 0.7);
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #4a8f4c;
            margin-top: 1px;
        }

        .note-box p {
            margin: 0;
            font-size: 0.9rem;
            color: #3a1610;
        }

        /* Login Box */
        .login-box {
            flex: 1.2;
            padding: 40px;
            background: rgba(240, 255, 240, 0.95);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .login-box::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to bottom, #4a8f4c, #72b4e8, #ccb5fd);
        }

        .login-box h2 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #0a2716;
            position: relative;
            padding-bottom: 15px;
        }

        .login-box h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #4a8f4c, #72b4e8);
            border-radius: 4px;
        }

        /* Input Fields */
        .input-box {
            position: relative;
            margin: 25px 0;
        }

        .input-box input {
            width: 100%;
            height: 55px;
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid #d1e7dd;
            outline: none;
            border-radius: 10px;
            font-size: 1.1rem;
            color: #1f293a;
            padding: 0 20px;
            transition: all 0.3s ease;
        }

        .input-box input:focus {
            border-color: #4a8f4c;
            box-shadow: 0 0 0 4px rgba(74, 143, 76, 0.2);
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 1.1rem;
            color: #6c757d;
            pointer-events: none;
            transition: all 0.3s ease;
            background: transparent;
            padding: 0 10px;
        }

        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: 0;
            font-size: 0.9rem;
            background: #fff;
            color: #4a8f4c;
            transform: translateY(-50%);
        }

        /* Forgot Password */
        .forgot-pass {
            margin: -15px 0 20px;
            text-align: right;
        }

        .forgot-pass a {
            font-size: 0.95rem;
            color: #6c757d;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .forgot-pass a:hover {
            color: #4a8f4c;
            text-decoration: underline;
        }

        /* Login Button */
        .btn {
            width: 100%;
            height: 55px;
            background: linear-gradient(135deg, #4a8f4c, #5aa86b, #72b4e8);
            border: none;
            outline: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.2rem;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 6px 20px rgba(74, 143, 76, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(74, 143, 76, 0.6);
            background: linear-gradient(135deg, #5aa86b, #4a8f4c, #72b4e8);
        }

        .btn:active {
            transform: translateY(0);
        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Microsoft YaHei UI Light", "Microsoft YaHei", sans-serif;
            font-weight: bold;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("AG.jpg") no-repeat center center/cover;
            color: #333;
            overflow: hidden;
            padding: 20px;
        }

        /* Header Styles */
        .form-header {
            position: fixed;
            top: 20px;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 20px 0;
            text-align: center;
            background: transparent;
        }

        .header-container {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 35px;
            border-radius: 10px;
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

        .header-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(
                circle at 20% 30%,
                rgba(255, 255, 255, 0.8) 0%,
                transparent 50%
            ),
            radial-gradient(
                circle at 80% 70%,
                rgba(255, 255, 255, 0.6) 0%,
                transparent 50%
            );
            z-index: 1;
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
            padding: 12px 30px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 30px;
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

        .emr-badge::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(30, 133, 37, 0.1) 0%,
                rgba(44, 106, 45, 0.1) 50%,
                rgba(91, 137, 38, 0.1) 100%
            );
            animation: rotate 20s linear infinite;
            z-index: -1;
        }

        .emr-system {
            font-size: 1.4rem;
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
            text-shadow: none;
            filter: none;
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

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
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

        /* Main Container */
        .container {
            display: flex;
            width: 90%;
            max-width: 1000px;
            margin-top: 180px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            position: relative;
        }

        /* Instructions Panel */
        .instructions {
            flex: 1;
            padding: 30px;
            background: linear-gradient(135deg, #e8f9e5, #d4f1d4);
            color: #2c3e50;
            display: flex;
            flex-direction: column;
            justify-content: center;
            z-index: 1;
        }

        .instructions h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #0a2716;
            position: relative;
            padding-bottom: 10px;
        }

        .instructions h3::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #2c6a2d, #4a8f4c);
            border-radius: 3px;
        }

        .instructions p {
            margin-bottom: 15px;
            font-size: 1rem;
            line-height: 1.6;
        }

        .instructions ul {
            margin: 15px 0 20px 20px;
        }

        .instructions li {
            margin-bottom: 12px;
            font-size: 0.95rem;
        }

        .note-box {
            background: rgba(213, 237, 150, 0.7);
            padding: 15px;
            border-radius: 8px;
            border-left: 4px solid #4a8f4c;
            margin-top: 1px;
        }

        .note-box p {
            margin: 0;
            font-size: 0.9rem;
            color: #3a1610;
        }

        /* Login Box */
        .login-box {
            flex: 1.2;
            padding: 40px;
            background: rgba(240, 255, 240, 0.95);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .login-box::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 8px;
            background: linear-gradient(to bottom, #4a8f4c, #72b4e8, #ccb5fd);
        }

        .login-box h2 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: #0a2716;
            position: relative;
            padding-bottom: 15px;
        }

        .login-box h2::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #4a8f4c, #72b4e8);
            border-radius: 4px;
        }

        /* Input Fields */
        .input-box {
            position: relative;
            margin: 25px 0;
        }

        .input-box input {
            width: 100%;
            height: 55px;
            background: rgba(255, 255, 255, 0.95);
            border: 2px solid #d1e7dd;
            outline: none;
            border-radius: 10px;
            font-size: 1.1rem;
            color: #1f293a;
            padding: 0 20px;
            transition: all 0.3s ease;
        }

        .input-box input:focus {
            border-color: #4a8f4c;
            box-shadow: 0 0 0 4px rgba(74, 143, 76, 0.2);
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 1.1rem;
            color: #6c757d;
            pointer-events: none;
            transition: all 0.3s ease;
            background: transparent;
            padding: 0 10px;
        }

        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: 0;
            font-size: 0.9rem;
            background: #fff;
            color: #4a8f4c;
            transform: translateY(-50%);
        }

        /* Forgot Password */
        .forgot-pass {
            margin: -15px 0 20px;
            text-align: right;
        }

        .forgot-pass a {
            font-size: 0.95rem;
            color: #6c757d;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .forgot-pass a:hover {
            color: #4a8f4c;
            text-decoration: underline;
        }

        /* Login Button */
        .btn {
            width: 100%;
            height: 55px;
            background: linear-gradient(135deg, #4a8f4c, #5aa86b, #72b4e8);
            border: none;
            outline: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.2rem;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            box-shadow: 0 6px 20px rgba(74, 143, 76, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(74, 143, 76, 0.6);
            background: linear-gradient(135deg, #5aa86b, #4a8f4c, #72b4e8);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* User Policy Button */
        .user-policy-container {
            text-align: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid rgba(74, 143, 76, 0.2);
        }

        .policy-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px 25px;
            background: linear-gradient(
                135deg,
                #1a5f23 0%,
                #2c6a2d 25%,
                #3a7a3c 50%,
                #2c6a2d 75%,
                #1a5f23 100%
            );
            border: none;
            outline: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.95rem;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(26, 95, 35, 0.3);
            position: relative;
            overflow: hidden;
        }

        .policy-btn::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: left 0.5s ease;
        }

        .policy-btn:hover::before {
            left: 100%;
        }

        .policy-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(26, 95, 35, 0.4);
            background: linear-gradient(
                135deg,
                #1a5f23 0%,
                #3a7a3c 25%,
                #4a8f4c 50%,
                #3a7a3c 75%,
                #1a5f23 100%
            );
        }

        .policy-btn:active {
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(26, 95, 35, 0.3);
        }

        .policy-btn i {
            font-size: 1rem;
            color: #fff;
            transition: transform 0.3s ease;
        }

        .policy-btn:hover i {
            transform: translateY(-2px);
        }

        /* Ripple Effect */
        .btn span.ripple,
        .policy-btn span.ripple {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.4);
            transform: scale(0);
            animation: ripple 0.6s linear;
            pointer-events: none;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin-top: 140px;
            }

            .instructions,
            .login-box {
                padding: 30px;
            }

            .login-box {
                border-top: 5px solid #4a8f4c;
            }

            .login-box::before {
                display: none;
            }

            .user-policy-container {
                margin-top: 15px;
                padding-top: 12px;
            }

            .policy-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                margin-top: 130px;
            }

            .agcrc-title {
                font-size: 1.3rem;
            }

            .emr-system {
                font-size: 1rem;
            }

            .instructions,
            .login-box {
                padding: 25px;
            }

            .login-box h2 {
                font-size: 1.6rem;
            }

            .input-box input {
                height: 50px;
            }

            .btn {
                height: 50px;
                font-size: 1.1rem;
            }

            .policy-btn {
                padding: 8px 18px;
                font-size: 0.85rem;
            }

            .policy-btn i {
                font-size: 0.9rem;
            }
        }

        /* Animations */
        @keyframes float {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Floating Icons */
        .floating-icons {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: -1;
            overflow: hidden;
        }

        .floating-icons i {
            position: absolute;
            color: rgba(74, 143, 76, 0.1);
            font-size: 1.5rem;
            animation: float 6s infinite ease-in-out;
        }

        /* 3D Bubbles Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .animated-bg span {
            position: absolute;
            display: block;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 15s linear infinite;
            bottom: -150px;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }

        /* Floating Particles on Success */
        .success-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 10;
        }

        .success-particles span {
            position: absolute;
            display: block;
            background: rgba(74, 143, 76, 0.7);
            border-radius: 50%;
            animation: floatParticle 2s ease-out forwards;
        }

        @keyframes floatParticle {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
            100% {
                transform: translate(var(--tx), -150%) scale(0);
                opacity: 0;
            }
        }

        /* Shake animation for form validation */
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
        /* Floating Icons */
        .floating-icons {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: -1;
            overflow: hidden;
        }

        .floating-icons i {
            position: absolute;
            color: rgba(74, 143, 76, 0.1);
            font-size: 1.5rem;
            animation: float 6s infinite ease-in-out;
        }

        /* 3D Bubbles Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .animated-bg span {
            position: absolute;
            display: block;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 15s linear infinite;
            bottom: -150px;
        }

        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
            }
        }

        /* Floating Particles on Success */
        .success-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
            z-index: 10;
        }

        .success-particles span {
            position: absolute;
            display: block;
            background: rgba(74, 143, 76, 0.7);
            border-radius: 50%;
            animation: floatParticle 2s ease-out forwards;
        }

        @keyframes floatParticle {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 1;
            }
            100% {
                transform: translate(var(--tx), -150%) scale(0);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
<!-- Page Header -->
<div class="form-header">
    <div class="header-container">
        <div class="logo-title-container">
{{--            <img src="logo.png" alt="AGCRC Logo" class="header-logo" />--}}
            <h1 class="agcrc-title">AMADER GRAM CANCER CARE & RESEARCH CENTER</h1>
        </div>
        <div class="emr-badge">
            <h2 class="emr-system">
                <i class="fas fa-shield-alt"></i> Electronic Medical Record (EMR)
                System
            </h2>
        </div>
    </div>
</div>

<!-- 3D Bubbles Background -->
<div class="animated-bg" id="animated-bg"></div>

<!-- Main Container -->
<div class="container">
    <!-- Instructions Panel -->
    <div class="instructions">
        <h3><i class="fas fa-info-circle"></i> Login Instructions</h3>
        <p>Please login to access patient's medical records and services.</p>

        <ul>
            <li>
                <i class="fas fa-check-circle" style="color: #4a8f4c"></i> Use your
                registered username and password
            </li>
            <li>
                <i class="fas fa-check-circle" style="color: #4a8f4c"></i> Keep your
                login credentials secure
            </li>
            <li>
                <i class="fas fa-check-circle" style="color: #4a8f4c"></i> Don't
                share your password with anyone
            </li>
        </ul>

        <div class="note-box">
            <p>
                <strong>Note:</strong> Login with Amader Gram username and password.
                If you forget your password, click on "Forgot your password" link
                below the login form.
            </p>
        </div>

        <p>For any login issues, please contact support team.</p>
    </div>

    <!-- Login Box -->
    <div class="login-box">
        <!-- Floating Icons Background -->
        <div class="floating-icons">
            <i
                class="fas fa-heartbeat"
                style="top: 10%; left: 20%; animation-delay: 0s"
            ></i>
            <i
                class="fas fa-stethoscope"
                style="top: 30%; left: 80%; animation-delay: 2s"
            ></i>
            <i
                class="fas fa-hospital"
                style="top: 70%; left: 15%; animation-delay: 4s"
            ></i>
            <i
                class="fas fa-pills"
                style="top: 50%; left: 70%; animation-delay: 1s"
            ></i>
            <i
                class="fas fa-user-md"
                style="top: 80%; left: 60%; animation-delay: 3s"
            ></i>
        </div>

        <h2><i class="fas fa-sign-in-alt"></i> Login</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" id="username" name="email" required />
                <label><i class="fas fa-user"></i> Email</label>
            </div>

            <div class="input-box">
                <input type="password" id="password" name="password" required />
                <label><i class="fas fa-lock"></i> Password</label>
            </div>

            <div class="forgot-pass">
                <a href="#"><i class="fas fa-key"></i> Forgot your password?</a>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>

            <!-- In the login form, replace the signup link with this: -->
            <div class="user-policy-container">
                <a
                    href="Guidelines.html"
                    class="policy-btn"
                    id="policy-btn"
                    download="AGCRC_User_Policy.pdf"
                >
                    <i class="fas fa-file-download"></i>
                    <span>User Policy</span>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Create 3D bubbles
    function createBubbles() {
        const animatedBg = document.getElementById("animated-bg");
        const bubbleCount = 15;

        for (let i = 0; i < bubbleCount; i++) {
            const bubble = document.createElement("span");
            const size = Math.random() * 100 + 50;
            const posX = Math.random() * 100;
            const delay = Math.random() * 15;
            const duration = Math.random() * 20 + 10;

            bubble.style.width = `${size}px`;
            bubble.style.height = `${size}px`;
            bubble.style.left = `${posX}%`;
            bubble.style.bottom = `-${size}px`;
            bubble.style.animationDelay = `${delay}s`;
            bubble.style.animationDuration = `${duration}s`;
            bubble.style.opacity = Math.random() * 0.5 + 0.1;
            bubble.style.background = `rgba(210, 255, 210, ${
                Math.random() * 0.3 + 0.2
            })`;

            animatedBg.appendChild(bubble);
        }
    }

    // Initialize bubbles
    createBubbles();

    // Form validation with interactive feedback
    const form = document.querySelector("form");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const policyBtn = document.getElementById("policy-btn");

    // Add focus/blur effects
    username.addEventListener("focus", () => {
        username.parentElement.querySelector("label").style.color = "#4a8f4c";
    });

    username.addEventListener("blur", () => {
        if (!username.value) {
            username.parentElement.querySelector("label").style.color = "#6c757d";
        }
    });

    password.addEventListener("focus", () => {
        password.parentElement.querySelector("label").style.color = "#4a8f4c";
    });

    password.addEventListener("blur", () => {
        if (!password.value) {
            password.parentElement.querySelector("label").style.color = "#6c757d";
        }
    });

    // Ripple effect for buttons
    const buttons = document.querySelectorAll(".btn, .policy-btn");
    buttons.forEach((button) => {
        button.addEventListener("click", function (e) {
            const x = e.clientX - e.target.getBoundingClientRect().left;
            const y = e.clientY - e.target.getBoundingClientRect().top;

            const ripple = document.createElement("span");
            ripple.classList.add("ripple");
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Policy button click handler
    policyBtn.addEventListener("click", function (e) {
        // Show downloading message
        const originalHTML = this.innerHTML;
        this.innerHTML =
            '<i class="fas fa-download"></i> Downloading Policy...';

        // Simulate download delay
        setTimeout(() => {
            this.innerHTML = originalHTML;
        }, 1500);
    });

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        let isValid = true;

        if (!username.value.trim()) {
            username.style.borderColor = "#e74c3c";
            isValid = false;
            shakeElement(username.parentElement);
        } else {
            username.style.borderColor = "#d1e7dd";
        }

        if (!password.value.trim()) {
            password.style.borderColor = "#e74c3c";
            isValid = false;
            shakeElement(password.parentElement);
        } else {
            password.style.borderColor = "#d1e7dd";
        }

        if (isValid) {
            // Form is valid, show success animation
            const btn = document.querySelector(".btn");
            btn.innerHTML = '<i class="fas fa-check"></i> Logging in...';
            btn.style.background = "linear-gradient(135deg, #3a7a3c, #4a8f4c)";

            // Create success particles
            createSuccessParticles();

            // Simulate form submission
            setTimeout(() => {
                form.submit();
            }, 1500);
        }
    });

    function shakeElement(element) {
        element.style.animation = "shake 0.5s";
        setTimeout(() => {
            element.style.animation = "";
        }, 500);
    }

    // Create success particles
    function createSuccessParticles() {
        const container = document.querySelector(".login-box");
        const particlesContainer = document.createElement("div");
        particlesContainer.className = "success-particles";
        container.appendChild(particlesContainer);

        for (let i = 0; i < 20; i++) {
            setTimeout(() => {
                const particle = document.createElement("span");
                particle.style.width = `${Math.random() * 10 + 5}px`;
                particle.style.height = particle.style.width;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = "50%";
                particle.style.setProperty("--tx", `${Math.random() * 100 - 50}%`);
                particle.style.animationDelay = `${i * 0.1}s`;
                particlesContainer.appendChild(particle);

                setTimeout(() => {
                    particle.remove();
                }, 2000);
            }, i * 100);
        }

        setTimeout(() => {
            particlesContainer.remove();
        }, 3000);
    }

    // Add shake animation for form validation
    const style = document.createElement("style");
    style.innerHTML = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;
    document.head.appendChild(style);

    // Create more floating icons dynamically
    const floatingIcons = document.querySelector(".floating-icons");
    const icons = [
        "fa-heart",
        "fa-medkit",
        "fa-ambulance",
        "fa-clipboard",
        "fa-prescription",
    ];

    for (let i = 0; i < 5; i++) {
        const icon = document.createElement("i");
        icon.className = `fas ${
            icons[Math.floor(Math.random() * icons.length)]
        }`;
        icon.style.color = `rgba(74, 143, 76, ${Math.random() * 0.2 + 0.05})`;
        icon.style.fontSize = `${Math.random() * 1 + 1}rem`;
        icon.style.top = `${Math.random() * 100}%`;
        icon.style.left = `${Math.random() * 100}%`;
        icon.style.animationDelay = `${Math.random() * 6}s`;
        icon.style.animationDuration = `${Math.random() * 6 + 4}s`;
        floatingIcons.appendChild(icon);
    }

    // Add interactive bubbles on click
    document.addEventListener("click", function (e) {
        if (
            e.target.tagName !== "INPUT" &&
            e.target.tagName !== "A" &&
            e.target.tagName !== "BUTTON"
        ) {
            const bubble = document.createElement("span");
            bubble.style.left = e.clientX + "px";
            bubble.style.top = e.clientY + "px";
            bubble.style.width = Math.random() * 50 + 20 + "px";
            bubble.style.height = bubble.style.width;
            bubble.style.animationDuration = Math.random() * 10 + 10 + "s";
            bubble.style.background = `rgba(210, 255, 210, ${
                Math.random() * 0.3 + 0.2
            })`;
            document.getElementById("animated-bg").appendChild(bubble);

            // Remove bubble after animation completes
            setTimeout(() => {
                bubble.remove();
            }, 15000);
        }
    });
</script>
</body>
</html>
