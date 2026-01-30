<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f4; padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #2c5530, #4a7c59); padding: 30px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 28px;">
                                🕌 Masjid Abal Qosim
                            </h1>
                            <p style="color: #e0f2e0; margin: 10px 0 0 0; font-size: 14px;">
                                Sistem Admin Masjid
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 30px;">
                            <h2 style="color: #2c5530; margin: 0 0 20px 0; font-size: 24px;">
                                Reset Password
                            </h2>
                            
                            <p style="color: #666666; line-height: 1.6; margin: 0 0 20px 0;">
                                Assalamu'alaikum,
                            </p>
                            
                            <p style="color: #666666; line-height: 1.6; margin: 0 0 20px 0;">
                                Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.
                            </p>
                            
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin: 30px 0;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $url }}" style="display: inline-block; background: linear-gradient(135deg, #2c5530, #4a7c59); color: #ffffff; text-decoration: none; padding: 15px 40px; border-radius: 5px; font-weight: bold; font-size: 16px;">
                                            Reset Password
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            
                            <p style="color: #666666; line-height: 1.6; margin: 0 0 20px 0;">
                                Link reset password ini akan kadaluarsa dalam <strong>60 menit</strong>.
                            </p>
                            
                            <p style="color: #666666; line-height: 1.6; margin: 0 0 20px 0;">
                                Jika Anda tidak meminta reset password, abaikan email ini.
                            </p>
                            
                            <div style="background-color: #f8f9fa; border-left: 4px solid #2c5530; padding: 15px; margin: 20px 0;">
                                <p style="color: #666666; margin: 0; font-size: 12px; line-height: 1.6;">
                                    <strong>Catatan Keamanan:</strong><br>
                                    Jika Anda kesulitan mengklik tombol "Reset Password", copy dan paste URL berikut ke browser Anda:<br>
                                    <a href="{{ $url }}" style="color: #2c5530; word-break: break-all;">{{ $url }}</a>
                                </p>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8f9fa; padding: 20px 30px; text-align: center; border-top: 1px solid #e0e0e0;">
                            <p style="color: #999999; margin: 0 0 10px 0; font-size: 12px;">
                                © {{ date('Y') }} Masjid Abal Qosim. All rights reserved.
                            </p>
                            <p style="color: #999999; margin: 0; font-size: 12px;">
                                Jl. Menur Gg V No. 48 Surabaya
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
