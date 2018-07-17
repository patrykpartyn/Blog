<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-06-27
 * Time: 14:49
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content',TextareaType::class,array(
                'label' => false,
                'attr'=> array('placeholder'=>'Treść komentarza')
            ))
            ->add('save',SubmitType::class, array('label' => 'Dodaj komentarz'));

    }


}