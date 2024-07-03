<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $character_name
 * @property int $current_health
 * @property int $max_health
 * @property int $skill
 * @property int $will
 * @property int $strength
 * @property int $spell_slot
 * @property int $user_id
 * @property int $class_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Classe|null $class
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCharacterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCurrentHealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereMaxHealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereSpellSlot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereStrength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereWill($value)
 */
	class Character extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $class_name
 * @property int $health
 * @property int $skill
 * @property int $will
 * @property int $strength
 * @property int $spell_slot
 * @property string $class_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ClasseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Classe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Classe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Classe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereClassImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereClassName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereHealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereSpellSlot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereStrength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Classe whereWill($value)
 */
	class Classe extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $character_id
 * @property int $scenario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|History newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|History query()
 * @method static \Illuminate\Database\Eloquent\Builder|History whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereScenarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|History whereUpdatedAt($value)
 */
	class History extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $map_name
 * @property string $map_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MapFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Map newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Map newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Map query()
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereMapImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereMapName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Map whereUpdatedAt($value)
 */
	class Map extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $location
 * @property int $scenario_id
 * @property int $map_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Map|null $map
 * @property-read \App\Models\Scenario|null $scenario
 * @method static \Database\Factories\MapScenarioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario query()
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario whereMapId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario whereScenarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MapScenario whereUpdatedAt($value)
 */
	class MapScenario extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $monster_name
 * @property string $health
 * @property int $skill
 * @property int $will
 * @property int $strength
 * @property int $spell_slot
 * @property string $monster_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MonsterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Monster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Monster query()
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereHealth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereMonsterImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereMonsterName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereSpellSlot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereStrength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Monster whereWill($value)
 */
	class Monster extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $scenario_name
 * @property string $description
 * @property int $dice_test
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ScenarioFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereDiceTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereScenarioName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Scenario whereUpdatedAt($value)
 */
	class Scenario extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $scenario_id
 * @property int $monster_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ScenarioMonsterFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster query()
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster whereMonsterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster whereScenarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScenarioMonster whereUpdatedAt($value)
 */
	class ScenarioMonster extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

