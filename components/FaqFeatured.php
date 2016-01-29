<?php namespace REDMARLIN\Faq\Components;

use Cms\Classes\ComponentBase;
use REDMARLIN\Faq\Models\Question;

class FaqFeatured extends ComponentBase
{
    public $faqsfeatured;

    public function componentDetails()
    {
        return [
            'name'        => 'FAQ Latest Questions',
            'description' => 'Displays X latest questions from all categories'
        ];
    }

    public function defineProperties()
    {
        return [
             'featuredNumber' => [
             'title'             => 'Questions Number',
             'description'       => 'Show X Featured Questions',
             'default'           => 3,
             'type'              => 'string',
             'validationPattern' => '^[0-9]+$',
             'validationMessage' => 'The Question Number property can contain only numeric symbols'
            ]
        ];
    }
     public function onRun()
    {
        //$faq = new Question();
        $this->faqsfeatured = Question::whereIsApproved('1')
                                ->whereIsFeatured('1')
                                ->orderBy('id', 'desc')
                                ->take($this->property['featuredNumber'])
                                ->get();
       
    }


}