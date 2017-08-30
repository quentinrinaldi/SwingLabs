<?php  

namespace MoneyManagementBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Trade;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class TradeFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder->add('stockName',TextType::class, array(
        'trim' => true,
        'label'  => 'Nom de l\'action'
        ));

        $builder->add('ticker',TextType::class, array(
        'trim' => true,
        'label'  => 'Symbole'
        ));

        $builder->add('market',ChoiceType::class, array(
        'choices'   => array('Nyse' => 'Nyse', 'Nasdaq' => 'Nasdaq','Euronext' => 'Euronext'),
        'required'  => true,
        'label'  => 'Place financière',
        ));

        $builder->add('entryPrice',NumberType::class, array(
        'required' => true,
        'scale'  => 2,
        'label' => "Entrée"
        ));

        $builder->add('stopPrice',NumberType::class, array(
        'required' => true,
        'scale'  => 2,
        'label' => "Stop"
        ));

        $builder->add('nbOfShares',IntegerType::class, array(
        'required' => true,
        'scale'  => 2,
        'label' => "Quantité"
        ));

        $builder->add('submittedAt',DateType::class, array(
        'widget' => 'single_text',
        'required' => true,
        'label' => "Date de soumission",
        'format' => 'dd/MM/yyyy',
        'html5' => false
        ));
    }

  public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => Trade::class,
    ));
}
    
    // public function getName()
    // {
    //     return "Trade";
    // }
}