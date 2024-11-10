namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;

class AppointmentsExport implements FromCollection
{
    protected $monthlyData;
    protected $dailyData;


    public function __construct($monthlyData, $dailyData)
    {
        $this->monthlyData = $monthlyData;
        $this->dailyData = $dailyData;
    }



    public function collection()
    {
        return new Collection([
            ['Month', 'Appointments Count'],
            ...array_map(fn($month, $count) => [$month, $count], array_keys($this->monthlyData), $this->monthlyData),
            [],
            ['Day', 'Appointments Count'],
            ...array_map(fn($day, $count) => [$day, $count], array_keys($this->dailyData), $this->dailyData),
        ]);
    }
}