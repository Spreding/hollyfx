<?php

namespace App\Controller\Admin;

use App\Entity\ProductColors;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductColorsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductColors::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id')->hideOnForm(),
            TextField::new('ColorName'),
            ColorField::new('Colors'),
        ];
    }

}
