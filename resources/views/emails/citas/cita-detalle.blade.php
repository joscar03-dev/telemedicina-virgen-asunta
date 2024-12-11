{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de tu Cita Médica</title>
</head>
<body>
    <h1>Detalles de tu Cita Médica</h1>

    <p><strong>Paciente:</strong> {{ $cita->paciente->nombre }}</p>
    <p><strong>Médico:</strong> {{ $cita->medico->usuario->name }}</p>
    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
    <p><strong>Hora:</strong> {{ $cita->hora_inicio }} - {{ $cita->hora_fin }}</p>
    <p><strong>Tipo de Cita:</strong> {{ $cita->tipo_cita }}</p>
    <p><strong>Observaciones:</strong> {{ $cita->observaciones }}</p>

    <p>¡Te esperamos para tu consulta!</p>
</body>
</html>
 --}}

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de tu Cita Médica</title>
</head>

<body
    style="font-family: Arial, sans-serif; line-height: 1.6; color: #333333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div style="background-color: #f8f8f8; border-bottom: 4px solid #4a90e2; padding: 20px; text-align: center;">
        <h1 style="color: #4a90e2; margin: 0;">Detalles de tu Cita Médica</h1>
    </div>

    <div
        style="background-color: #ffffff; padding: 20px; border-radius: 5px; margin-top: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <p style="margin-bottom: 10px;"><strong style="color: #4a90e2;">Paciente:</strong> {{ $cita->paciente->nombre }}
        </p>
        <p style="margin-bottom: 10px;"><strong style="color: #4a90e2;">Médico:</strong>
            {{ $cita->medico->usuario->name }}</p>
        <p style="margin-bottom: 10px;"><strong style="color: #4a90e2;">Fecha:</strong> {{ $cita->fecha }}</p>
        <p style="margin-bottom: 10px;"><strong style="color: #4a90e2;">Hora:</strong> {{ $cita->hora_inicio }} -
            {{ $cita->hora_fin }}</p>
        <p style="margin-bottom: 10px;"><strong style="color: #4a90e2;">Tipo de Cita:</strong> {{ $cita->tipo_cita }}
        </p>
        <p style="margin-bottom: 20px;"><strong style="color: #4a90e2;">Observaciones:</strong>
            {{ $cita->observaciones }}</p>
        <p style="margin-bottom: 20px;"><strong style="color: #4a90e2;">url meet:</strong>
            {{ $cita->meet_url}}</p>

        <p style="background-color: #e8f4ff; padding: 15px; border-radius: 5px; text-align: center; font-weight: bold;">
            ¡Te esperamos para tu consulta!</p>
    </div>

    <div style="text-align: center; margin-top: 20px; color: #888888; font-size: 12px;">
        <p>Este es un correo electrónico automático, por favor no responda a este mensaje.</p>
    </div>
</body>

</html>
