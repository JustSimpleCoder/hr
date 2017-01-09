<?php

namespace AppBundle\Controller;

use AppBundle\Controller\BaseController;
use AppBundle\Entity\Administrator;
use AppBundle\Entity\Employee;
use AppBundle\Form\EmployeeType;
use Doctrine\Common\Util\Debug;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        //获取登录的用户
        $user = $this->get('security.context')->getToken()->getUser();
        if (is_object($user)) {
            echo "y";
        } else {
            echo "n";
        }

        $logger = $this->get('logger');
        $logger->info('I just got the logger');
        $logger->error('An error occurred');



        $hello = $this->get('translator')->trans('date.abbr_day_names.0');

        return new Response($hello);
    }

    /**
     * @Route("/install")
     */
    public function installAction(Request $request)
    {
        //数据库没有记录才能添加管理员
        $em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository('AppBundle:Employee')->findOneBy([]);
        if (!$employee || 1) {
            $employee = new Employee();
            $form = $this->createForm(EmployeeType::class, $employee);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {


                $newEmployee = $form->getData();
                $admin = new Administrator();
                $admin->setEmployee($newEmployee);
                $roles = Administrator::ROLELIST;
                $admin->setRole(current(array_keys($roles)));
                $newEmployee->setAdmin($admin);

                $encoder = $this->container->get('security.password_encoder');
                $encoded = $encoder->encodePassword($employee, $newEmployee->getPassword());
                $newEmployee->setPassword($encoded);
                $newEmployee->setIsActive(1);

                $em->persist($admin);
                $em->persist($newEmployee);
                $em->flush();

                return new Response('add success');
            }

            return $this->render('AppBundle:Auth:firstAdmin.html.twig', [
                "form" => $form->createView(),
            ]);
        }
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/admin",name="adminHome")
     */
    public function adminAction()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

    /**
     * @Route("/setting",name="setting")
     */
    public function settingAction()
    {
        return new Response('<html><body>Setting page!</body></html>');
    }
}
