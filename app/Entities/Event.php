<?php

declare(strict_types=1);

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Models\EventModel;
use Carbon\Carbon;

class Event extends Entity
{
    protected $attributes = [
        'name' => 'null',
        'district' => 'null',
        'sub_district' => 'null',
        'village' => 'null',
        'date' => 'null',
        'content' => 'null',
        'picture'   => 'null'
    ];

    public function eventImage()
    {
        $eventImage = new EventModel();

        return $eventImage->where(['event_id' => $this->attributes['id']])->first();
    }

    public function eventPicture()
    {
        return base_url() . '/image/' .  $this->attributes['picture'];
    }




    public function eventTime(): string
    {
        return Carbon::parse($this->attributes['date'])->format('Y-m-d')->locale('id');
    }
    public function eventDate(): string
    {
        return Carbon::parse($this->attributes['date'])->format('d F');
    }

    public function eventDay(): string
    {
        return Carbon::parse($this->attributes['date'])->format('j');
    }

    public function eventMonth(): string
    {
        setlocale(LC_TIME, 'id_ID');
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['date'])->format('F');
    }
}
