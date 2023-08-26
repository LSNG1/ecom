<?php

namespace App\Factory;

use App\Entity\Box;
use App\Repository\BoxRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Box>
 *
 * @method        Box|Proxy                     create(array|callable $attributes = [])
 * @method static Box|Proxy                     createOne(array $attributes = [])
 * @method static Box|Proxy                     find(object|array|mixed $criteria)
 * @method static Box|Proxy                     findOrCreate(array $attributes)
 * @method static Box|Proxy                     first(string $sortedField = 'id')
 * @method static Box|Proxy                     last(string $sortedField = 'id')
 * @method static Box|Proxy                     random(array $attributes = [])
 * @method static Box|Proxy                     randomOrCreate(array $attributes = [])
 * @method static BoxRepository|RepositoryProxy repository()
 * @method static Box[]|Proxy[]                 all()
 * @method static Box[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Box[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Box[]|Proxy[]                 findBy(array $attributes)
 * @method static Box[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Box[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class BoxFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'external_525_bays' => self::faker()->randomNumber(),
            'internal_35_bays' => self::faker()->randomNumber(),
            'name' => self::faker()->text(255),
            'type' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Box $box): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Box::class;
    }
}
