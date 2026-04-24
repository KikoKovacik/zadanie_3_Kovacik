<?php

namespace App\Services;

use App\Core\Database;

class Contact extends Database
{
    /**
     * @return array<int, array{name: string, value: string, label: string}>
     */
    public function getInterestOptions(): array
    {
        $options = $this->getConnection()['contact_interests'] ?? [];
        if (!is_array($options)) {
            return [];
        }

        $result = [];
        foreach ($options as $option) {
            if (!is_array($option)) {
                continue;
            }

            $name = isset($option['name']) && is_string($option['name']) ? $option['name'] : '';
            $value = isset($option['value']) && is_string($option['value']) ? $option['value'] : '';
            $label = isset($option['label']) && is_string($option['label']) ? $option['label'] : '';

            if ($name === '' || $value === '' || $label === '') {
                continue;
            }

            $result[] = [
                'name' => $name,
                'value' => $value,
                'label' => $label,
            ];
        }

        return $result;
    }
}
