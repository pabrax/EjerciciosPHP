@extends('layouts.app')

@section('content')
<style>
    .calendar {
        width: 100%;
    }
    .calendar table {
        table-layout: fixed;
    }
    .calendar th, .calendar td {
        width: 14.28%;
        height: 100px;
        vertical-align: top;
        position: relative;
    }
    .calendar .day-number {
        position: absolute;
        top: 5px;
        right: 5px;
        font-weight: bold;
    }
    .calendar .event {
        display: block;
        margin: 5px 0;
        font-size: 0.9em;
        text-decoration: none;
    }
</style>

<div class="calendar">
    <h2 class="text-center">{{ \DateTime::createFromFormat('!m', $month)->format('F') }} {{ $year }}</h2>
    <table class="table table-bordered text-center">
        <thead class="thead-light">
            <tr>
                <th scope="col">Sun</th>
                <th scope="col">Mon</th>
                <th scope="col">Tue</th>
                <th scope="col">Wed</th>
                <th scope="col">Thu</th>
                <th scope="col">Fri</th>
                <th scope="col">Sat</th>
            </tr>
        </thead>
        <tbody>
            @php
                $currentDate = new \DateTime();
                $currentDay = $currentDate->format('j');
            @endphp
            <tr>
                @for ($i = 0; $i < $startDay; $i++)
                    <td></td>
                @endfor
                @for ($day = 1; $day <= $daysInMonth; $day++)
                    @if (($day + $startDay - 1) % 7 == 0)
                        </tr><tr>
                    @endif
                    <td class="{{ $day == $currentDay ? 'bg-info text-white' : '' }}">
                        <div class="day-number">{{ $day }}</div>
                        @php
                            $dateString = sprintf('%04d-%02d-%02d', $year, $month, $day);
                        @endphp
                        @if (isset($eventos[$dateString]))
                            @foreach ($eventos[$dateString] as $event)
                                <a href="{{ route('eventos.edit', ['id' => $event->id]) }}" class="event btn btn-link text-truncate d-block">{{ $event->title }}</a>
                            @endforeach
                        @endif
                    </td>
                @endfor
                @for ($i = ($daysInMonth + $startDay) % 7; $i < 7 && $i != 0; $i++)
                    <td></td>
                @endfor
            </tr>
        </tbody>
    </table>
</div>
<div class="text-center mt-4">
    <a href="{{ route('eventos.create') }}" class="btn btn-primary">Crear evento</a>
</div>
@endsection
