<?php

namespace App\Controller\Admin;

use App\Entity\Ad;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class AdCrudController extends AbstractCrudController
{

    public const PRODUCTS_BASE_PATH = 'assets/upload';
    public const PRODUCTS_UPLOAD_DIR= 'public/assets/upload';

    public static function getEntityFqcn(): string
    {
        return Ad::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextField::new('model', 'Modele'),
            IntegerField::new('year', 'Année'),
            IntegerField::new('km', 'Killométrage'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR')->setCustomOption('storedAsCents', false),
            ImageField::new('image', 'Image')
                ->setBasePath(
                    self::PRODUCTS_BASE_PATH
                )
                ->setUploadDir(
                    self::PRODUCTS_UPLOAD_DIR
                )
        ];
    }
}
