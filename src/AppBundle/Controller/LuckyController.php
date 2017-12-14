<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyController extends Controller
{
    private $users = [
        ['id' => 26,'firstname'=>'vishal','lastname'=>'bhardwaj','place'=>'gurugram'],
        ['id' => 17,'firstname'=>'ankur','lastname'=>'bhan','place'=>'rewari'],
        ['id' => 63,'firstname'=>'sourav','lastname'=>'yadav','place'=>'allahabad'],
    ];
    /**
     * @Route("/lucky/number",name="home")
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        /*return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );*/

        return $this->render('lucky/number.html.twig', array(
            'number' => $number,
        ));
    }

    /**
     * @Route("/about",name="about")
     */
    public function showabout(){
        $data = [];
        $data['users'] = $this->users;
        //echo "<pre>";print_r($data);exit;
        return $this->render('lucky/about.html.twig',$data);
    }

    /**
     * @Route("/lucky/contact_us",name="contact")
     */
    public function showcontact(){
        return $this->render('lucky/contact.html.twig');
    }

    /**
     * @Route("/edit/{id}",name="edit")
     */
    public function edit(Request $request, $id){
        return $this->render("lucky/edit.html.twig",array(
            'id' => $id,
        ));
    }


}