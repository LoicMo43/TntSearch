<?php

namespace TntSearch\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Thelia\Form\BaseForm;
use TntSearch\TntSearch;

/**
 * Class CustomerSearchForm
 * @package BoSearch\Form
 * @author Etienne Perriere
 */
class CustomerSearchForm extends BaseForm
{
    const CUSTOMER_FORM_NAME = 'customer-search-form';

    /**
     * @return null
     */
    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                'company',
                TextType::class,
                [
                    'label' => $this->translator->trans('Company', [], TntSearch::DOMAIN_NAME),
                    'label_attr' => ['for' => 'company'],
                    'required' => false
                ]
            )->add(
                'lastname',
                TextType::class,
                [
                    'label' => $this->translator->trans('Lastname', [], TntSearch::DOMAIN_NAME),
                    'label_attr' => ['for' => 'lastname'],
                    'required' => false
                ]
            )->add(
                'firstname',
                TextType::class,
                [
                    'label' => $this->translator->trans('Firstname', [], TntSearch::DOMAIN_NAME),
                    'label_attr' => ['for' => 'firstname'],
                    'required' => false
                ]
            )->add(
                'email',
                TextType::class,
                [
                    'label' => $this->translator->trans('Email', [], TntSearch::DOMAIN_NAME),
                    'label_attr' => ['for' => 'email'],
                    'required' => false
                ]
            )->add(
                'subscriptionDateMin',
                DateType::class,
                [
                    "label" => $this->translator->trans("From", [], TntSearch::DOMAIN_NAME),
                    "label_attr" => ["for" => "subscriptionDateMin"],
                    "required" => false,
                    "input"  => "datetime",
                    "widget" => "single_text",
//                    "format" => "dd/MM/yyyy"
                ]
            )->add(
                'subscriptionDateMax',
                DateType::class,
                [
                    'label' => $this->translator->trans('To', [], TntSearch::DOMAIN_NAME),
                    'label_attr' => ['for' => 'subscriptionDateMax'],
                    'required' => false,
                    "input"  => "datetime",
                    "widget" => "single_text",
//                    "format" => "dd/MM/yyyy"
                ]
            )
            ->add(
                'family',
                ChoiceType::class,
                [
                    //TODO: review the choices
                    'choices'  => [
                        'All' => null,
                        'Yes' => true,
                        'No' => false,
                    ],
                    'label' => $this->translator->trans('Customer Family', [], TntSearch::DOMAIN_NAME),
                    'label_attr' => ['for' => 'customerFamily'],
                ]
            );
        return null;
    }

    public static function getName()
    {
        return self::CUSTOMER_FORM_NAME;
    }
}