<?php

namespace TaskBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TaskBundle\Command\AssignCategoryToTask;
use TaskBundle\Command\CreateTask;
use TaskBundle\Entity\Task;
use TaskBundle\Form\CategoryChoiceType;
use TaskBundle\Form\TaskType;
use UserBundle\Entity\User;

class TaskController extends Controller
{
    /**
     * @Route("/", name="tasks")
     */
    public function indexAction()
    {
        $tasks = $this->getDoctrine()->getRepository('TaskBundle:Task')->findAll();

        return $this->render('TaskBundle:Task:index.html.twig', [
            'tasks' => $tasks
        ]);
    }

    /**
     * @Route("/show/{id}", name="task_show")
     */
    public function showAction($id)
    {
        $task = $this->getDoctrine()->getRepository('TaskBundle:Task')->find($id);

        return $this->render('TaskBundle:Task:show.html.twig', [
            'task' => $task
        ]);
    }

    /**
     * @Route("/new", name="task_new")
     * @Method({"GET"})
     */
    public function newAction()
    {
        return $this->render('TaskBundle:Task:form.html.twig', [
            'form' => $this->form()->createView()
        ]);
    }

    /**
     * @Route("/create", name="task_create")
     * @Method({"POST"})
     */
    public function createAction(Request $request)
    {
        $form = $this->form();
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->get('command_bus')->handle(
                new CreateTask($form->getData())
            );

            return $this->redirectToRoute('task_success');
        }

        return $this->render('TaskBundle:Task:form.html.twig', [
            'form' => $this->form()->createView()
        ]);
    }

    /**
     * @Route("/success", name="task_success")
     * @Method({"GET"})
     */
    public function successAction()
    {
        return $this->render('TaskBundle:Task:success.html.twig');
    }

    /**
     * @Route("/{id}/category", name="task_category")
     * @Method({"GET"})
     */
    public function categoryAction($id)
    {
        $form = $this->categoryForm($id);

        return $this->render('TaskBundle:Task:form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/assign/category", name="task_assign_category")
     * @Method({"POST"})
     */
    public function assignCategoryAction($id, Request $request)
    {
        $form = $this->categoryForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $task = $this->getDoctrine()->getRepository('TaskBundle:Task')->find($id);

            $this->get('command_bus')->handle(
                new AssignCategoryToTask($form->getData()['category'], $task)
            );

            return $this->redirectToRoute('task_success');
        }

        return $this->render('TaskBundle:Task:form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    private function form()
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task, array(
            'action' => $this->generateUrl('task_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    private function categoryForm($id)
    {
        return $this->createForm(CategoryChoiceType::class, null, array(
            'action' => $this->generateUrl('task_assign_category', ['id' => $id]),
            'method' => 'POST',
        ));
    }
}
