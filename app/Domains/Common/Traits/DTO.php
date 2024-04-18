<?php

namespace App\Domains\Common\Traits;

use ReflectionClass;

trait DTO
{
    public static function fill(array $data): static
    {
        $ref = new ReflectionClass(static::class);
        $props = $ref->getProperties();

        # Убираем лишнее параметры если они есть
        foreach (array_diff($props, $data) as $key => $value) {
            unset($data[$key]);
        }

        foreach ($props as $property) {
            $type_name = $property->getType()->getName();
            # Если тип параметра в ДТО это ДТО, то создаем экземпляр ДТО
            if(class_exists($type_name) && method_exists($type_name, 'fill')) {
                $data[$property->getName()] = $type_name::fill($data[$property->getName()]);
            }
        }

        return new static(...$data);
    }
}
