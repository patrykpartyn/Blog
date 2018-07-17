<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2018-06-28
 * Time: 10:45
 */

namespace AppBundle\Controller;
use AppBundle\Form\CommentType;

use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use AppBundle\Entity\Comment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ArticleController extends Controller
{

    /**
     * @Route("/article/{id}", name="post_show")
     */


    public function showArticle(Post $post,Request $request)
    {

        $form=null;


        if($user=$this->getUser()){
            $comment=new Comment();
            $comment->setPost($post);
            $comment->setUser($user);

            $form=$this->createForm(CommentType::class,$comment);
            $form->handleRequest($request);

            if($form->isValid()){
                $em= $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();
                $this->addFlash('Succses','komentarza zostral pomyslnie dodany');
                //return $this->redirectToRoute('post_show',array('id'=>$post->getId()));
            }
        }


        return $this->render('default/show.html.twig',array(
            'post'=>$post,
            //'form'=> is_null($form) ? $form : $form->createView()


        ));


    }

}