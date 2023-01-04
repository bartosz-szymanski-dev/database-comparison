<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class ActionType extends AbstractType
{
    public const CREATE_ACTION_TYPE = 'create';
    public const GET_ALL_ACTION_TYPE = 'get_all';
    public const UPDATE_ALL_ACTION_TYPE = 'update_all';
    public const DELETE_ALL_TYPE = 'delete_all';
    public const MONGO_DB_TYPE = 'mongo_db';
    public const MYSQL_DB_TYPE = 'mysql';
    private const ACTION_TYPE_CHOICES = [
        'action_type.create' => self::CREATE_ACTION_TYPE,
        'action_type.get_all' => self::GET_ALL_ACTION_TYPE,
        'action_type.update_all' => self::UPDATE_ALL_ACTION_TYPE,
        'action_type.delete_all' => self::DELETE_ALL_TYPE,
    ];
    private const DB_TYPE_CHOICES = [
        'db.mongo' => self::MONGO_DB_TYPE,
        'db.mysql' => self::MYSQL_DB_TYPE,
    ];

    public function __construct(
        private readonly TranslatorInterface $translator,
        private readonly UrlGeneratorInterface $urlGenerator,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('db_type', ChoiceType::class, [
                'choices' => self::DB_TYPE_CHOICES,
                'label' => $this->translator->trans('form.db_type'),
            ])
            ->add('action', ChoiceType::class, [
                'choices' => self::ACTION_TYPE_CHOICES,
                'label' => $this->translator->trans('form.action'),
            ])
            ->add('submit', SubmitType::class, [
                'label' => $this->translator->trans('form.submit'),
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'method' => Request::METHOD_POST,
            'action' => $this->urlGenerator->generate('front.action'),
        ]);
    }
}
