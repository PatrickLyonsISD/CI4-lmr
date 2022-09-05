<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation {
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $AddBooking = ['room' => ['label' => 'room',
            'rules' => 'required',
            'errors' => ['required' => 'You must enter a Team name']
        ],
        'date' => ['label' => 'date',
            'rules' => 'required',
            'errors' => ['required' => 'you must select a date']
        ],
        'start_time' => ['label' => 'start_time',
            'rules' => 'required',
            'errors' => ['required' => 'you must select a start time for the booking']
        ],
        'end_time' => ['label' => 'end_time',
            'rules' => 'required',
            'errors' => ['required' => 'you must select an end time for the booking']
        ],
        'k-number' => ['label' => 'k-number',
            'rules' => 'required',
            'errors' => ['required' => 'you must enter your k-number']
        ]
    ];

}
