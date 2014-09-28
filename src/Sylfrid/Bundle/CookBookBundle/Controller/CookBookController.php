<?php

namespace Sylfrid\Bundle\CookBookBundle\Controller;

use Sylfrid\Bundle\CookBookBundle\Entity\CookBook;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CookBookController extends Controller
{
    public function showAction(CookBook $cookbook)
    {
        return $this->render('SylfridCookBookBundle:CookBook:show.html.twig', array('cookbook' => $cookbook));
    }
}
