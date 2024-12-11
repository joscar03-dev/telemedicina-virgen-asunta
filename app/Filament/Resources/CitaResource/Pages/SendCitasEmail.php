<?php

namespace App\Filament\Resources\CitaResource\Pages;

use App\Filament\Resources\CitaResource;
use App\Models\Cita;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Mail;
use App\Mail\CitasMail;

use Filament\Notifications\Notification;

class SendCitasEmail extends Page
{
    public ?Cita $record = null;

    protected static string $resource = CitaResource::class;
    protected static string $view = 'filament.resources.cita-resource.pages.send-citas-email-page';

    public function mount($record): void
    {
        $this->record = $record;
    }

    /**
     * Enviar correo con los detalles de la cita
     */
    public function enviarCorreo()
    {
        if (!$this->record) {
            Notification::make()
                ->title('Error')
                ->body('No se pudo encontrar la cita.')
                ->danger()
                ->send();
            return;
        }

        try {
            // Enviar el correo con los detalles de la cita
            Mail::to($this->record->paciente->correo)
                ->send(new CitasMail($this->record)); // Asegúrate de crear el mailable CitasMail

            // Mostrar notificación de éxito
            Notification::make()
                ->title('Éxito')
                ->body('Correo enviado exitosamente con los detalles de la cita.')
                ->success()
                ->send();
        } catch (\Exception $e) {
            // Manejo de errores
            Notification::make()
                ->title('Error')
                ->body('Hubo un error al enviar el correo: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }
}
