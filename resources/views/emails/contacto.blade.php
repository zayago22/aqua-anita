<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Contacto - Aqua-Anita</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Arial, sans-serif; background-color: #f3f4f6;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f3f4f6; padding: 32px 16px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #16a34a 0%, #15803d 100%); padding: 28px 32px; text-align: center;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 700;">🏊 Aqua-Anita</h1>
                            <p style="margin: 6px 0 0; color: rgba(255,255,255,0.85); font-size: 13px;">Nuevo mensaje de contacto</p>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 32px;">
                            <p style="margin: 0 0 20px; font-size: 15px; color: #374151;">
                                Se ha recibido un nuevo mensaje desde el formulario de contacto de la página web:
                            </p>

                            <!-- Contact details table -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb;">
                                <tr>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 13px; color: #6b7280; font-weight: 600; width: 130px;">Nombre</td>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 14px; color: #111827; font-weight: 600;">{{ $contacto->nombre }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 13px; color: #6b7280; font-weight: 600;">Email</td>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 14px; color: #111827;">
                                        <a href="mailto:{{ $contacto->email }}" style="color: #16a34a; text-decoration: none;">{{ $contacto->email }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 13px; color: #6b7280; font-weight: 600;">Teléfono</td>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 14px; color: #111827;">
                                        <a href="tel:{{ $contacto->telefono }}" style="color: #16a34a; text-decoration: none;">{{ $contacto->telefono }}</a>
                                    </td>
                                </tr>
                                @if($contacto->programa)
                                <tr>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 13px; color: #6b7280; font-weight: 600;">Programa</td>
                                    <td style="padding: 14px 18px; border-bottom: 1px solid #e5e7eb; font-size: 14px; color: #111827;">
                                        <span style="background: #dcfce7; color: #16a34a; padding: 3px 10px; border-radius: 12px; font-size: 12px; font-weight: 600;">{{ ucfirst($contacto->programa) }}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding: 14px 18px; font-size: 13px; color: #6b7280; font-weight: 600; vertical-align: top;">Mensaje</td>
                                    <td style="padding: 14px 18px; font-size: 14px; color: #111827; line-height: 1.6;">{{ $contacto->mensaje }}</td>
                                </tr>
                            </table>

                            <!-- Action buttons -->
                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-top: 24px;">
                                <tr>
                                    <td align="center" style="padding: 0 0 8px;">
                                        <a href="https://wa.me/52{{ preg_replace('/[^0-9]/', '', $contacto->telefono) }}" 
                                           style="display: inline-block; background: #25D366; color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                                            💬 Responder por WhatsApp
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="mailto:{{ $contacto->email }}" 
                                           style="display: inline-block; background: #16a34a; color: #fff; padding: 10px 24px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">
                                            ✉️ Responder por Email
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background: #f9fafb; padding: 18px 32px; border-top: 1px solid #e5e7eb; text-align: center;">
                            <p style="margin: 0; font-size: 11px; color: #9ca3af;">
                                Este correo fue generado automáticamente desde el formulario de contacto de <strong>aqua-anita.com.mx</strong><br>
                                Fecha: {{ $contacto->created_at->format('d/m/Y H:i') }} hrs
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
