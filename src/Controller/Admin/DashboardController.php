<?php

namespace App\Controller\Admin;

use App\Entity\DeliverySystem;
use App\Entity\MaquillageImage;
use App\Entity\MaquillageProduct;
use App\Entity\Product;
use App\Entity\ProductColors;
use App\Entity\ProductImage;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use const Sodium\CRYPTO_PWHASH_SCRYPTSALSA208SHA256_STRPREFIX;

class DashboardController extends AbstractDashboardController
{
    #@IsGranted("ROLE_ADMIN")
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();
        return $this->render('admin/index.html.twig');

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
            ->setTitle('HollyFx Overflow Admin');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard');
        yield MenuItem::linkToCrud('MaquillageProduct','fa fa-pen-paintbrush',MaquillageProduct::class);
        yield MenuItem::linkToCrud('MaquillageImage','fa fa-image',MaquillageImage::class);
        yield MenuItem::linkToCrud('Product','fa fa-box',Product::class);
        yield MenuItem::linkToCrud('ProductColors','fa fa-palette',ProductColors::class);
        yield MenuItem::linkToCrud('ProductImage','fa fa-image',ProductImage::class);
        yield MenuItem::linkToCrud('User','fa fa-user',User::class);
        yield MenuItem::linkToCrud('DeliverySystem', 'fa fa-delivery',DeliverySystem::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
        ->add(Crud::PAGE_INDEX,Action::DETAIL);
    }


}
