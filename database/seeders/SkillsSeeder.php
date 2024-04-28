<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Skills = [
            ['name' => 'Kommunikációs készség', 'description' => 'Hatékony kommunikáció másokkal, beleértve a verbális és írásbeli kommunikációt.'],
            ['name' => 'Csapatmunka', 'description' => 'Képesség a hatékony együttműködésre és az együttes célok elérésére más munkatársakkal.'],
            ['name' => 'Vezetői képesség', 'description' => 'Képesség mások motiválására, irányítására és inspirálására a közös célok elérése érdekében.'],
            ['name' => 'Problémamegoldás', 'description' => 'Képesség a kihívások felismerésére, elemzésére és hatékony megoldások kidolgozására.'],
            ['name' => 'Szerelési képesség', 'description' => 'Képesség gépek, berendezések szerelésére, összeszerelésére és javítására.'],
            ['name' => 'Idegen nyelv ismerete (angol)', 'description' => 'Képesség az angol nyelv megértésére, beszédére és írására, amely segíthet a nemzetközi kommunikációban és az angol nyelvű dokumentumok olvasásában.']

        ];
        foreach ($Skills as $skill) {
            Skill::create($skill);
        }
        // User skill associations
        $adminSkills = ['Kommunikációs készség', 'Vezetői képesség', 'Problémamegoldás'];
        $repairerSkills = ['Szerelési képesség', 'Problémamegoldás'];
        $operatorSkills = ['Csapatmunka', 'Problémamegoldás'];
        $hrSkills = ['Kommunikációs készség', 'Vezetői képesség'];

        $this->assignSkillsToUser('Nagy Pista', $adminSkills);
        $this->assignSkillsToUser('Nagy Sándor', $repairerSkills);
        $this->assignSkillsToUser('Kiss Sándor', $operatorSkills);
        $this->assignSkillsToUser('Kiss Pista', $hrSkills);
    }
    private function assignSkillsToUser(string $userName, array $skills): void
    {
        $user = \App\Models\User::where('name', $userName)->first();

        if ($user) {
            foreach ($skills as $skillName) {
                $skill = Skill::where('name', $skillName)->first();

                if ($skill) {
                    $user->skills()->attach($skill);
                }
            }
        }
    }
}
