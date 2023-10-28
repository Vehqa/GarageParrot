<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use App\Entity\Ad;
use App\Entity\Hour;
use App\Entity\Review;
use App\Entity\Services;
use App\Entity\Users;


class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }
    #[Route('/dashboard', name: 'dashboard')]
    public function index(): Response
    {
        $url = $this-> adminUrlGenerator->setController(AdCrudController::class)->generateUrl();
        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GarageParrot Administration')
            ->setFaviconPath('/assets/images/cleicone.png');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Occasion', 'fa fa-car');

        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Créer une occasion', 'fas fa-plus', Ad::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les occasions', 'fas fa-eye', Ad::class)
        ]);

        yield MenuItem::section('Avis Clients', 'fa fa-commenting');

        yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
            MenuItem::linkToCrud('Mettre un avis client', 'fas fa-plus', Review::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les avis clients', 'fas fa-eye', Review::class)
        ]);

        if ($this->isGranted('ROLE_ADMIN')) {

            yield MenuItem::section('Services', 'fa fa-cogs');

            yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
                MenuItem::linkToCrud('Voir les services', 'fas fa-eye', Services::class)
            ]);

            yield MenuItem::section('Les Horraires', 'fa fa-clock-o');

            yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
                MenuItem::linkToCrud('Modifier les horraires', 'fas fa-plus', Hour::class)->setAction(Crud::PAGE_EDIT),
                MenuItem::linkToCrud('Voir les horraires', 'fas fa-eye', Hour::class)
            ]);

            yield MenuItem::section('Compte Employé', 'fa fa-users');

            yield MenuItem::subMenu('Actions', 'fas fa-bar')->setSubItems([
                MenuItem::linkToCrud('Créer un compte employé', 'fas fa-plus', Users::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Voir les comptes employés', 'fas fa-eye', Users::class)
            ]);

            
        }
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
