<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Reset Password</title>
    </head>
    <body>
        <h2>Reset Your Password</h2>
        <p>Hello,</p>
        <p>
            You are receiving this email because we received a password reset
            request for your account.
        </p>
        <p>Click the button below to reset your password:</p>
        <p>
            <a
                href="{{ route('user/reset-password/get', ['token' => $token]) }}"
                target="_blank"
                style="
                    background-color: #007bff;
                    color: #ffffff;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 5px;
                "
                >Reset Password</a
            >
        </p>
        <p>
            If you did not request a password reset, no further action is
            required.
        </p>
        <p>Regards,<br />Spider Gear Store</p>
    </body>
</html>
