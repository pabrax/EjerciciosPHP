@extends('layouts.app')

@section('content')
<div class="cronometro">
    <div class="time" id="time">00:00:00.00</div>
    <div class="buttons">
        <button id="start" class="btn btn-primary">Iniciar</button>
        <button id="pause" class="btn btn-secondary">Pausar</button>
        <button id="reset" class="btn btn-danger">Reiniciar</button>
        <button id="lap" class="btn btn-info">Vuelta</button>
    </div>
    <div class="laps" id="laps">
        <h3>Vueltas</h3>
    </div>
</div>
<script>
    
let startTime, updatedTime, difference, tInterval;
let running = false;
let laps = [];
document.getElementById('start').addEventListener('click', start);
document.getElementById('pause').addEventListener('click', pause);
document.getElementById('reset').addEventListener('click', reset);
document.getElementById('lap').addEventListener('click', lap);

function start() {
    if (!running) {
        startTime = new Date().getTime() - (difference || 0);
        tInterval = setInterval(updateTime, 10); // Update every 10 milliseconds
        running = true;
    }
}
function pause() {
    if (running) {
        clearInterval(tInterval);
        difference = new Date().getTime() - startTime;
        running = false;
    }
}
function reset() {
    clearInterval(tInterval);
    document.getElementById('time').innerHTML = "00:00:00.00";
    difference = 0;
    running = false;
    laps = [];
    document.getElementById('laps').innerHTML = "<h3>Vueltas</h3>";
}
function lap() {
    if (running) {
        let lapTime = document.getElementById('time').innerHTML;
        laps.push(lapTime);
        let lapsElement = document.getElementById('laps');
        lapsElement.innerHTML += "<div>" + lapTime + "</div>";
    }
}

function updateTime() {
    updatedTime = new Date().getTime();
    difference = updatedTime - startTime;
    
    let hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((difference % (1000 * 60)) / 1000);
    let milliseconds = Math.floor((difference % 1000) / 10);
    hours = (hours < 10) ? "0" + hours : hours;
    minutes = (minutes < 10) ? "0" + minutes : minutes;
    seconds = (seconds < 10) ? "0" + seconds : seconds;
    milliseconds = (milliseconds < 10) ? "0" + milliseconds : milliseconds;
    milliseconds = (milliseconds < 100) ? "0" + milliseconds : milliseconds;
    document.getElementById('time').innerHTML = hours + ":" + minutes + ":" + seconds + "." + milliseconds;
}
</script>
@endsection
