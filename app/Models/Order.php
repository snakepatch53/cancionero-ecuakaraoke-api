<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'song_id',
    ];

    // crearemos un nuevo campo para formatear la fecha en que se creó el registro
    protected $appends = ['date_str'];

    public function getDateStrAttribute()
    {
        // quiero formatear de forma que sea algo asi: Lunes 12 de Julio de 2021 - 12h:30

        // primero obtengo la fecha en formato Carbon
        $date = $this->created_at;

        // luego formateo la fecha en el formato deseado y en español
        return $date->locale('es')->isoFormat('dddd D [de] MMMM [de] YYYY - H[h]:mm');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}
