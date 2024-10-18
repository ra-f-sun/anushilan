<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Password Reset Verification Code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
        margin: 40px auto;
        padding: 0;
        border: 1px solid #d1d5db; /* Add a border */
        border-radius: 12px; /* Increase border radius to match the header and content */
        overflow: hidden; /* Ensure the border radius is applied correctly */
        }
        .header {
            background: linear-gradient(135deg, #3075f7, #4a8eff);
            color: #ffffff;
            text-align: center;
            padding: 40px 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .content {
            background-color: #ffffff;
            padding: 40px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 10px;
        }
        h1 {
            color: #ffffff;
            font-size: 32px;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center; /* Explicitly set text-align for h1 */
            width: 100%; /* Ensure full width */
            display: block; /* Change to block element */
        }
        h2 {
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            color: #555555;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .otp {
            background: linear-gradient(135deg, #3075f7, #4a8eff);
            color: #ffffff;
            font-size: 28px;
            font-weight: bold;
            padding: 15px 30px;
            border-radius: 8px;
            display: inline-block;
            margin: 20px 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999999;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 style="color: #ffffff;margin-left:40%">Password Reset</h1>
        </div>
        <div class="content" style="margin: 10px;">
            <h2>Hello,</h2>
            <p>You have requested to reset your password. Please use the following One-Time Password (OTP) to complete the process:</p>
            <div class="otp">{{ $token }}</div>
            <p>This OTP will expire in 10 minutes. If you didn't request this password reset, please ignore this email.</p>
            <p>For security reasons, please do not share this OTP with anyone.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
