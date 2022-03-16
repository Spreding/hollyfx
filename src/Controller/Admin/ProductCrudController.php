<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            Field::new('id')->hideOnForm(),
            TextField::new('Title'),
            NumberField::new('Price'),
            TextareaField::new('Description'),
            TextField::new('Slug'),
            ImageField::new('slugImg')->onlyOnForms()->setUploadDir("public/assets/uploads/images/"),
            ImageField::new('slugImg')->hideOnForm()->setBasePath("/assets/uploads/images/"),
            AssociationField::new('productColors')->setFormTypeOptions([
                'by_reference' => false,
            ])->autocomplete(),
            AssociationField::new('productImages')->setFormTypeOptions([
                'by_reference' => false,
            ])->autocomplete(),
        ];
    }

}
