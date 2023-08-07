<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServicesSeeder extends Seeder
{
    // Function to insert to table service 
    private function insertServices($service)
    {
        $data = [
            'name' => $service,
        ];
        // Insert to table
        $this->db->table('services')->insert($data);
    }

    public function run()
    {
        $this->insertServices('AirCRM');
        $this->insertServices('AirLis');
        $this->insertServices('AirSale');
        $this->insertServices('AirTax');
        $this->insertServices('Bank Mestika');
        $this->insertServices('ChargeIn');
        $this->insertServices('iOffice Internal');
        $this->insertServices('iOffice Eksternal');
        $this->insertServices('LSP+');
        $this->insertServices('Mediatech Kreasi Indonesia');
        $this->insertServices('MESTIKA');
        $this->insertServices('PLN Marketplace');
        $this->insertServices('Service Desk');
        $this->insertServices('Service GSP');
        $this->insertServices('Unrelated');
    }
}
