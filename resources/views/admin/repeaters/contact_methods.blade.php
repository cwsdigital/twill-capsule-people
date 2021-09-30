@twillRepeaterTitle('Contact Method')
@twillRepeaterTitleField('method', ['hidePrefix' => true])
@twillRepeaterTrigger('Add Contact Method')
@twillRepeaterGroup('app')

<x-formColumns>
    <x-slot name="left">
        @formField('select', [
            'name' => 'method',
            'label' => 'Method',
            'options' => [
                [
                    'value' => 'email',
                    'label' => 'Email',
                ],
                [
                    'value' => 'phone',
                    'label' => 'Phone',
                ],
                [
                    'value' => 'twitter',
                    'label' => 'Twitter',
                ],
                [
                    'value' => 'facebook',
                    'label' => 'Facebook',
                ],
                [
                    'value' => 'linkedin',
                    'label' => 'LinkedIn',
                ],
            ]
        ])
    </x-slot>

    <x-slot name="right">
        @formField('input', [
            'name' => 'value',
            'label' => 'Value',
        ])
    </x-slot>
</x-formColumns>




