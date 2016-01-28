<?php
namespace Afandi\MainBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('id', 'side-menu')
             ->setChildrenAttribute('class', 'nav');

        $menu->addChild('Home', array('route' => 'homepage'));
        $menu->addChild('Buku Tamu', array('route' => 'bukutamu_index'));

        // ... add more children

        return $menu;
    }
}