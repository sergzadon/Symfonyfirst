<?php

namespace App\Form;

use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Subcategories;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('publicationdate', DateType::class, array(
                
            "label" =>   "Дата создания статьи",
             "attr" => ["placeholder" => "Введите дату"]
            ))
            ->add('title', TextType::class, array(
                
             "label" =>   "Название статьи",
             "attr" => ["placeholder" => "Введите название"]
            ))
            ->add('summary', TextType::class, array(
                
             "label" =>   "Описание статьи",
             "attr" => ["placeholder" => "Введите описание"]
            ))
            ->add('content', TextareaType::class, array(
                
             "label" =>   "Содержание статьи",
             "attr" => ["placeholder" => "Введите содержание"]
            ))
            ->add('active',CheckboxType::class, array(

            ))
            ->add('category', EntityType::class, array(
                'label' => 'Категории',
                'placeholder' => 'Выбрать категорию',
                'class' => Categories::class,
                'choice_label' => 'name'
            ))
            
            ->add('subcategoryid', EntityType::class, array(
                'label' => 'Подкатегории',
                'placeholder' => 'Выбрать подкатегорию',
                'class' => Subcategories::class,
                'choice_label' => 'titlesubcat'
            ))
                
            ->add('save', SubmitType::class, array(
               'label' => 'Сохранить',
                "attr" => ["class" => "btn btn-success float-left mr-2"]
            ))
            
                ->add('delete', SubmitType::class, array(
               'label' => 'Удалить',
                "attr" => ["class" => "btn btn-danger"]
            ));

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articles::class,
        ]);
    }
}
