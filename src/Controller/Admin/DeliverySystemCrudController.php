<?php

namespace App\Controller\Admin;

use App\Entity\DeliverySystem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DeliverySystemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DeliverySystem::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
