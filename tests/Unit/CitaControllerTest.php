<?php

class Appointment
{
    public function calculateNextAppointment($currentDate, $interval)
    {
        $sigueintecita = date('Y-m-d', strtotime($currentDate . ' +' . $interval . ' days'));
        return $sigueintecita;
    }
}

test('Calcular la siguiente cita', function () {
    $appointment = new Appointment();

    // Define la fecha actual y el intervalo de días para la próxima cita
    $currentDate = '2023-11-01';
    $interval = 7; // La cita se programa cada 7 días

    // Calcula la próxima cita
    $sigueintecita = $appointment->calculateNextAppointment($currentDate, $interval);

    // Asegura que la próxima cita sea 7 días después de la fecha actual
    expect($sigueintecita)->toEqual('2023-11-08');
});
