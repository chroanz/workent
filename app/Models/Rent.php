<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Rent extends Model
{
    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'rentStart',
        'rentEnd',
        'client_id',
        'room_id'
    ];

    // Define como os atributos devem ser convertidos
    protected $casts = [
        'rentStart' => 'datetime',
        'rentEnd' => 'datetime'
    ];

    // Relacionamento com Client (Muitos aluguéis pertencem a um cliente)
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    // Relacionamento com Room (Muitos aluguéis pertencem a um quarto)
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    // Relacionamento com Guest (Um aluguel tem muitos hóspedes)
    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    // Relacionamento com Payment (Um aluguel tem um pagamento)
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    // Relacionamento com Evaluation (Um aluguel tem uma avaliação)
    public function evaluation(): HasOne
    {
        return $this->hasOne(Evaluation::class);
    }
}
