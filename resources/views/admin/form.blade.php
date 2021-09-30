@extends('twill::layouts.form', [
    'additionalFieldsets' => [
        ['fieldset' => 'metadata', 'label' => 'SEO'],
    ]
])

@section('contentFields')

    @formField('medias', [
    'name' => 'profile',
    'label' => 'Profile Image',
    'translated' => true,
    ])

    @formField('input', [
    'name' => 'role',
    'label' => 'Role',
    'translated' => true,
    ])

    @formField('wysiwyg', [
    'name' => 'bio',
    'label' => 'Bio',
    'translated' => true,
    'toolbarOptions' => [
    'bold',
    'italic',
    'underline',
    'link',
    ],
    ])
    <h4>Contact Methods</h4>
    @formField('repeater', [ 'type' => 'contact_methods' ])
@stop

@section('fieldsets')
    @metadataFields
@stop

