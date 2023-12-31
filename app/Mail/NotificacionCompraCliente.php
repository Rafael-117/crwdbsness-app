<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Projects;
use App\Models\Transactions;

class NotificacionCompraCliente extends Mailable
{
    use Queueable, SerializesModels;
    public $id;
    /**
     * Create a new message instance.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address ('info@crwdbsness.com', 'Info Crwdbsness'),
            subject: 'Notificación de Solicitud de Compra',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $transactions = Transactions::where('id', $this->id )->get()->first();
        $project = Projects::where('id', $transactions->project_id)->get()->first();

        return new Content(
            view: 'mail',
            with: [
                'project' => $project,
                'transaction' => $transactions,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
