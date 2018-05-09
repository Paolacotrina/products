<?php

namespace FrontalBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FrontalBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use FrontalBundle\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\TexType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DefaultController extends Controller
{
    public function indexAction()
    {
		$product = $this->getDoctrine()->getRepository(Product::class)->findAll();
		return $this->render('FrontalBundle:Default:mipaginainicial_template.html.twig',array('products' =>$product));
    }
	
	public function viewAction($id)
    {
		$product = $this->getDoctrine()->getRepository(Product::class)->find($id);
			$code= $product->getCode();
			$name= $product->getName();
			$details= $product->getDetail();
			$brand= $product->getBrand();
			$category= $product->getCategory();
			$price= $product->getPrice();
			$id = $product->getId();
		
      
		
		return $this->render('FrontalBundle:Default:view.html.twig',array('code' =>$code,'name' =>$name,'detail'=>$details,
		'brand'=>$brand,'category'=>$category,'price'=>$price,'id'=>$id));
    }
	
	 public function deleteAction($id)
    {
		$em = $this->getDoctrine()->getManager();
		
		$product = $this->getDoctrine()->getRepository(Product::class)->find($id);
	
		$em->remove($product);
		$em->flush();
		
		$successMessage = $this->get('translator')->trans('El producto ha sido eliminado');
		$this->addFlash('mensaje',$successMessage);
		return $this->redirectToRoute('frontal_homepage');
    }

	
	/*
	public function newAction()
	{
        // Creamos una tarea y le ponemos datos dummy
        $product = new Product();

        $form = $this->createFormBuilder($product)
            ->add('code', TextType::class)
            ->add('name', TextType::class)
			->add('details', TextType::class)
			->add('brand', TextType::class)
			->add('category', TextType::class)
			->add('price', NumberType::class)
            ->add('save', SubmitType::class, array('label' => 'Crear Producto'))
            ->getForm();

        return $this->render('FrontalBundle:Default:mipaginainicial_template.html.twig', array('form' => $form->createView(),
        ));
    }*/
	
	
	public function newAction()
    {
		$product = new Product();
        $form = $this->createForm(ProductType::class,$product);
		return $this->render('FrontalBundle:Default:mipaginainicial_template.html.twig',array("form"=>$form->createView()));
    }
	
	
	
	
}
