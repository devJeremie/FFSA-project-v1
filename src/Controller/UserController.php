<?php

namespace App\Controller;

use App\Form\RegistrationFormType;
use App\Form\UserInfosFormUpdateType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /*#[Route('/register', name: 'register', methods: ['GET', 'POST'])]
    public function register(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $userRepository->add($user);
        }
        $user = $userRepository->findBy([], ['name'=>'ASC']);
        return $this->render('registration/register.html.twig', [
            'form'=>$form->createView(),
            'user'=>$user
        ]);
    }*/

    #[Route('/profil/myAccount', name: 'myAccount', methods: ['GET', 'POST'])]
    public function myAccount(UserRepository $userRepository, Request $request): Response
    {

    return $this->render('security/myAccount.html.twig', [
        'user' => $this->getUser()
    ]);
    }

    #[Route('/profil/userInfosUpdate{id}', name: 'userInfosUpdate', methods: ['GET', 'POST'])]
    public function userInfosUpdate(UserRepository $userRepository, Request $request, $id)
    {
        $user = $userRepository->findOneBy(['id'=>$id]);
        $userForm = $this->createForm(UserInfosFormUpdateType::class, $user);
        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $userRepository->add($user);
            return $this->redirectToRoute('myAccount');
        }
        return $this->render('user/userInfosUpdate.html.twig', [
            'userForm' => $userForm->createView()
        ]);
    }
    /*----------------------------Avec la session crash -----------------------------*/
    #[Route('/profil/deleteUser/{id}', name: 'deleteUser' )]
    public function deleteUser(UserRepository $userRepository, $id)
    {
        /*if ($this->getUser()->getId() == $id ){
            $this->redirectToRoute('app_logout');*/
           /* $removeUser = $userRepository->findOneBy(['id'=>$id]);
            $remove = $userRepository->remove($removeUser);*/
        $session = new Session();//on cree une nouvelle session
        $session->invalidate();//et on invalide la session courante et ensuite on supprime l'utilisateur
        $userRepository->remove($this->getUser());
        $this->addFlash('success', 'Votre compte à bien été supprimé !');
        return $this->redirectToRoute('home');

    }
    #[Route('/allMembers', name: 'view_members')]
    public function seeMembers (UserRepository $userRepository){
         // recupere tout les utilisateurs
        $users = $userRepository->findAll();
        return $this->render('security/allMembers.html.twig', [
            'users'=> $users
          ]);
    }
    #[Route('/allMembers/remove/{id}', name: 'remove_user')]
    public function deleteMember (UserRepository $userRepository, $id){
        {

            $removeUser = $userRepository->findOneBy(['id'=> $id]);

            if ($removeUser == true){
                $remove = $userRepository->remove($removeUser);

            }
            return $this->redirectToRoute('home');
        }
        return $this->redirectToRoute('home');
    }

}


