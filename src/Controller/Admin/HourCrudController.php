<?php

namespace App\Controller\Admin;

use App\Entity\Hour;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hour::class;
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
