<?php

namespace App\Controller\Admin;

use App\Entity\ProductImage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductImage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('image')->onlyOnForms()->setUploadDir("public/assets/uploads/images/"),
            ImageField::new('image')->hideOnForm()->setBasePath("/assets/uploads/images/"),
        ];
    }

}
