<?php

    
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class productNotification extends Notification
{
    use Queueable;

    private $product;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->from('no-reply@example.com', 'Mogel Fluidos')
            ->subject('Notificación de Producsafaggsagsagasgto Creado')
            ->greeting('¡Hola!')
            ->line('Se ha creado un asganuevo producto.')
            ->line('Nombre del producto: ' . $this->product['name'])
            // Add any other product-specific information here
            ->action('Ver producto', url('/productos/' . $this->product['id']))
            ->line('Gracias por usar nuestra aplicación!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Se ha creado un nuevo producto.',
            'url' => '/productos/' . $this->product['id'],
            'id' => $this->product['id'],
            'type' => 'ProductCreated',
        ];
    }
}
