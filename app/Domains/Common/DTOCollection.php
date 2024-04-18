<?php

namespace App\Domains\Common;

use Exception;
use Countable;

/**
 * @template Item
 */
abstract class DTOCollection implements Countable
{
    /**
     * @var Item[] $collection
     */
    protected array $collection = [];

    /**
     * @param Item[] $data
     * @throws Exception
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $item) {
            if($this->canBeStore($item)) throw new Exception('This item cannot be stored.');
            $this->collection[$key] = $item;
        }
    }

    /**
     * @return class-string
     */
    abstract protected function dto(): string;

    public function count(): int
    {
        return count($this->collection);
    }

    /**
     * @param string|int $key
     * @param Item $item
     * @throws Exception
     */
    public function put(string|int $key, mixed $item): void
    {
        if($this->keyExists($key)) throw new Exception('This key already exists.');

        $this->collection[$key] = $item;
    }

    /**
     * @param Item $items
     */
    public function push(mixed $items): void
    {
        if(is_array($items)) {
            foreach($items as $item) {
                $this->push($item);
            }
            return;
        }

        $this->collection[] = $items;
    }

    public function keyExists(string|int $key): bool
    {
        return array_key_exists($key, $this->collection);
    }

    public function canBeStore(object $item): bool
    {
        $dto = $this->dto();
        return $item instanceof $dto;
    }

    public function remove(string|int|array $keys): void
    {
        if(!is_array($keys)) {
            unset($this->collection[$keys]);
            return;
        }

        foreach ($keys as $key) {
            $this->remove($key);
        }
    }

    /**
     * @param mixed $searchable
     * @param bool $is_value
     * @return null|Item
     * @throws Exception
     */
    public function find(array|string|int $searchable, bool $is_value = false): mixed
    {
        if(!$is_value) {
            if(is_array($searchable)) throw new Exception('Array cannot be resolved as key.');
            return $this->collection[$searchable];
        }

        if(!is_array($searchable)) throw new Exception('Searchable must be an array.');

        foreach ($this->collection as $item) {
            foreach ($searchable as $searchable_key => $searchable_value) {
                if(is_array($item) && $item[$searchable_key] === $searchable_value) return $item;
                if(is_object($item) && $item->$searchable_key === $searchable_value) return $item;

                throw new Exception('Unrecognized searchable value.');
            }
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public static function fill(array $data): static
    {
        return new static($data);
    }

    public function __toArray()
    {

    }
}
