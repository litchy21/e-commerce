<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use App\Repository\CategoriesRepository;
use App\Repository\SubCategoriesRepository;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/users")
 */
class UsersController extends Controller
{
    /**
     * @Route("/", name="users_index", methods="GET")
     */
    public function index(UsersRepository $usersRepository): Response
    {
        return $this->render('users/index.html.twig', ['users' => $usersRepository->findAll()]);
    }

    /**
    * @Route("/register", name="users_registration")
    */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, \Swift_Mailer $mailer, CategoriesRepository $categoriesRepository, SubCategoriesRepository $subCategoriesRepository)
    {
      $token=rand(0, 99999);
      // 1) build the form
      $user = new Users();
      $form = $this->createForm(UsersType::class, $user);

      // 2) handle the submit (will only happen on POST)
      $form->handleRequest($request);
      if ($form->isSubmitted()) {
        // 3) Encode the password (you could also do this via Doctrine listener)
        $password = $passwordEncoder->encodePassword($user, $user->getPassword());
        $user->setPassword($password);
        $user->setVerifyToken($token);
        $user->setActive(0);
        $user->setCreatedAt(new \DateTime());

        // 4) save the User!
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $username=$user->getUsername();
        $email=$user->getEmail();
        // ... do any other work - like sending them an email, etc
        // maybe set a "flash" success message for the user

        $message = (new \Swift_Message('TechFactory Confirmation Email'))
        ->setFrom('alexaokito@gmail.com')
        ->setTo($email)
        ->setBody(
          $this->renderView(
                  // templates/emails/registration.html.twig
                  'emails/registration.html.twig', array("username"=>$username)
              ),
              'text/html')
        ;

        $mailer->send($message);

        return $this->redirectToRoute('login');
      }

      return $this->render(
        'users/new.html.twig',
        array(
            'form' => $form->createView(),
            'categories' => $categoriesRepository->findAll(),
            'subcategories' => $subCategoriesRepository->findAll(),
        )
      );
    }

    /**
    * @Route("/register/activate/{username}", name="user_activation")
    */
    public function activate(Request $request, $username)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $UserRepository = $this->getDoctrine()->getRepository(Users::class);
        $user=$UserRepository->findOneBy(['username'=>$username]);
        $token=$user->getVerifyToken();
        if($token!=="")
        {
        $user->setActive(1);
        $user->setVerifyToken("");
        $entityManager->flush();

      return $this->render("users/valid.html.twig", array('username'=>$username));
    }
    else return $this->render("users/alreadyvalid.html.twig", array('username'=>$username));
    }

    /**
     * @Route("/{id}", name="users_show", methods="GET")
     */
    public function show(Users $user): Response
    {
        return $this->render('users/show.html.twig', ['user' => $user]);
    }

    /**
     * @Route("/{id}/edit", name="users_edit", methods="GET|POST")
     */
    public function edit(Request $request, Users $user): Response
    {
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('users_edit', ['id' => $user->getId()]);
        }

        return $this->render('users/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    //desactiver compte

    /**
     * @Route("/{id}", name="users_delete")
     */
    public function delete(Request $request, Users $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $UserRepository = $this->getDoctrine()->getRepository(Users::class);
            $user=$UserRepository->findOneBy(['id'=>$user->getId()]);
            $user->setActive(0);
            $em->flush();
        }

        return $this->redirectToRoute('users_show', ['id'=>$user->getId()]);
    }
}
