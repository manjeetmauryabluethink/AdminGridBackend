<?php

namespace Bluethinkinc\AdminGrid\Model\Addblog\Source;

use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    /**
     * Set Array to Option
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            0 => [
                'label' => 'Active',
                'value' => '0'
            ],
            1 => [
                'label' => 'Inactive',
                'value' => '1'
            ]

        ];

        return $options;
    }
}
