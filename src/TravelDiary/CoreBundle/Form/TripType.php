<?php

namespace TravelDiary\CoreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use TravelDiary\CoreBundle\Entity\Privacy;
use TravelDiary\CoreBundle\Entity\Status;

class TripType extends AbstractType {
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('trpName', TextType::class, [
				'label' 		=> 'Name'
			])
			->add('trpDestination', TextType::class, [
				'label' 		=> 'Destination'
			])
			->add('trpDescription', TextareaType::class, [
				'label' 		=> 'Trip description'
			])
			->add('trpStartDate', DateType::class, [
				'label' 		=> 'Start date',
				'widget' 		=> 'single_text',
			])
			->add('trpEstimatedArrival', DateType::class, [
				'label' 		=> 'Estimated arrival',
				'widget' 		=> 'single_text',
			])
			->add('idPrivacy', EntityType::class, [
				'class' 		=> Privacy::class,
				'choice_label' 	=> 'prvDescription',
				'label' 		=> 'Sharing'
			])
			->add('idStatus', EntityType::class, [
				'class' 		=> Status::class,
				'choice_label' 	=> 'staDescription',
				'label' 		=> 'Status'
			])
		;
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
			'data_class' => 'TravelDiary\CoreBundle\Entity\Trip'
		));
	}
}
