<div class="container">
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; padding: 8px; text-align: center; }
    </style>

    <h1>Appointments Report</h1>

    <!-- Monthly Appointments Table -->
    <h2>Monthly Appointments</h2>
    <table>
        <tr><th>Month</th><th>Appointments Count</th></tr>
        @foreach($appointmentsData as $month => $count)
            <tr><td>{{ $month }}</td><td>{{ $count }}</td></tr>
        @endforeach
    </table>

    <!-- Daily Appointments Table -->
    <h2>Daily Appointments</h2>
    <table>
        <tr><th>Date</th><th>Appointments Count</th></tr>
        @foreach($dailyAppointmentsData as $entry)
            <tr><td>{{ $entry['date'] }}</td><td>{{ $entry['count'] }}</td></tr>
        @endforeach
    </table>

   
</div>
