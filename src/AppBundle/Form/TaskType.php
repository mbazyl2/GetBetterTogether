<?php

namespace AppBundle\Form;

use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use function PHPSTORM_META\type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class TaskType extends AbstractType
{

    /**
     * {@inheritdoc}
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $this->userId = $options['userId'];

        $builder->add('name')
                ->add('description')
                ->add('date')
                ->add('priority', ChoiceType::class, ["choices" =>
                    [ null, "Low"=>"Low", "Medium"=>"Medium", "High"=>"High"]])
                ->add('progress', ChoiceType::class, ["choices" =>
                    [null, "Begins"=>"Begins", "In progress"=>"In progress", "Done"=>"Done"]])
                ->add('category', EntityType::class,
                     [ "class"=> "AppBundle:Category" ,
                      "query_builder" => function (EntityRepository $er){
                    return $er->createQueryBuilder('c')
                        ->where("c.userId = :userId" )
                        ->setParameter("userId", "$this->userId")
                        ->orderBy("c.name", "ASC");
                      }, "choice_label"=>"name",
                      ])
                ->add('public', ChoiceType::class, ["choices" => [true=> "Public", false=> "Private"]]);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Task',
            'userId' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_task';
    }


}
