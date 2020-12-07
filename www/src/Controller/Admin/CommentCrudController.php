<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Conference')->setIcon('fa fa-calendar'),
            AssociationField::new('conference')
                ->setRequired(true)
                ->setHelp('Please choose conference that you want to give feedback'),
            FormField::addPanel('Comment')->setIcon('fa fa-messages'),
            TextField::new('author')
                ->setHelp('Your name'),
            TextEditorField::new('text', 'Comment')
                ->setHelp('Your feedback is valuable for us'),
            EmailField::new('email', 'Email Address')
                ->setHelp('Your valid email address'),
            DateTimeField::new('createdAt'),
        ];
    }
}
