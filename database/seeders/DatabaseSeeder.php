<?php

namespace Database\Seeders;

use App\Models\PlatoAlergeno;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ConfiguracionTableSeeder::class);
        $this->call(NivelEjercicioTableSeeder::class);
        $this->call(ObjetivoTableSeeder::class);
        $this->call(SexoTableSeeder::class);
        $this->call(AlergenosTableSeeder::class);
        $this->call(EtiquetasTableSeeder::class);
        $this->call(MenusPesosTableSeeder::class);
        $this->call(BaseProteinaTableSeeder::class);
        $this->call(PaquetesTableSeeder::class);
        $this->call(PlatosCodigosTableSeeder::class);
        $this->call(PlatosPesosTableSeeder::class);
        $this->call(PlatosTableSeeder::class);
        $this->call(PlatosAlergenosTableSeeder::class);
        $this->call(PlatosEtiquetasTableSeeder::class);
        $this->call(PlatosInfoNutricionalTableSeeder::class);
        $this->call(IngredientesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenusPlatosTableSeeder::class);
        $this->call(EstadoLaboralTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(ProfesionesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AvailableCPSeeder::class);
    }
}
