<?php

namespace App\DataFixtures;

use App\Entity\Faq;
use App\Entity\Blog;
use App\Entity\Home;
use App\Entity\Icon;
use App\Entity\User;
use App\Entity\Theme;
use App\Entity\Contact;
use App\Entity\License;
use App\Entity\Picture;
use App\Entity\ExamFeature;
use App\Entity\InfoContact;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $pictureLicense = ['https://www.zupimages.net/up/20/51/8cyx.jpg', 'https://www.zupimages.net/up/20/51/nclg.jpg', 'https://www.zupimages.net/up/20/51/r6qg.jpg'];
        $titleLicense = ['Permis fluvial', 'Permis côtier', 'Extension hauturière'];
        $contentLicense = ['Pour piloter, sur les eaux intérieures, des bateaux dont la puissance du moteur excède 4,5kW (6CV), il est nécessaire de posséder un permis "plaisance en eaux intérieures"', 'Le permis mer option côtière constitue désormais la base des permis mer : il est nécessaire d\'être titulaire de ce titre (ou d\'un titre équivalent) pour pouvoir piloter un bateau d\'une puissance motrice supérieure à 6 cv, ou un voilier dont le moteur a obligation de permis.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eget dui nec ipsum ultrices tristique eu at dui. Mauris tincidunt accumsan erat vitae tincidunt'];
        $featureLicense = ['L’obtention du permis "plaisance en eaux intérieures" est subordonnée au passage d’une épreuve théorique basée sur un questionnaire à choix multiple, et à la validation, par un établissement de formation agréé, de la formation pratique suivie par le candidat. La formation s’organise autour de 4 soirées (à partir de 19h30) comprenant cours et tests ainsi qu’une formation pratique ( sur le bateau) de 3h30 qui peut être faite dans un second temps.', 'Toutefois, le permis mer option côtière ne permet pas de s\'éloigner à plus de 6 milles d\'un abri. Pour s\'affranchir de cette limite, il est nécessaire d\'être titulaire du Permis Mer Hauturier.
        Le permis mer option côtière permet la navigation sur les lacs et plans d\'eaux fermés, mais n\'autorise pas la navigation sur les canaux et rivières.
        La formation s’organise autour de 4 soirées ( à partir de 19h30) comprenant cours et tests ainsi qu’une formation pratique ( sur le bateau) de 3h30 qui peut être faite dans un second temps.', 'In ac nisl bibendum, facilisis ex a, venenatis lacus. Vestibulum nec risus ac nunc gravida rhoncus eu quis diam. Aliquam tincidunt mauris ut dignissim eleifend. Praesent rutrum lorem eget ipsum congue, ac consectetur libero dictum. Morbi malesuada diam et suscipit mollis. '];
        // générer 3 formation
        for ($i = 1; $i <= 3; $i++) {
            $license = new License();
            $license->setName($titleLicense[$i - 1])
                    ->setContent($contentLicense[$i - 1])
                    ->setFeature($featureLicense[$i - 1])
                    ->setPicture($pictureLicense[$i - 1])
                    ->setIsActivated(1);

            $manager->persist($license);
            // générer 3 examFeature par formation
            for ($j = 1; $j <= 3; $j++) {
                $exam = new ExamFeature();

                $exam->setName($faker->word())
                     ->setContent($faker->paragraph())
                     ->setLicense($license);

                $manager->persist($exam);
            }
        }

        //faire 4 themes
        $forTheme = ['Vacances', 'Réussite au Permis', 'Compétition'];
        $forPicture = ['https://images.unsplash.com/photo-1568018591802-e794b3ab6065?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1055&q=80', 'https://images.unsplash.com/photo-1565150586113-3b40d1c4d36a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1052&q=80', 'https://images.unsplash.com/photo-1519046904884-53103b34b206?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1050&q=80'];
        for ($i = 1; $i <= 3; $i++) {
            $theme = new Theme();

            $theme->setName($forTheme[$i - 1]);
            $manager->persist($theme);

            for ($j = 1; $j <= 3; $j++) {
                $blog = new Blog();

                $content = join($faker->paragraphs(5));

                $blog->setTitle($faker->sentence())
                     ->setContent($content)
                     ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                     ->setTheme($theme)
                     ->setIsActivated(1);

                 $manager->persist($theme);

                for ($k = 1; $k <= 1; $k++) {
                    $picture  = new Picture();

                    $picture->setUrl($forPicture[$j - 1])
                            ->setActu($blog);

                    $manager->persist($picture);
                }
            }
        }
        // for FAQ
        for ($i = 1; $i <= 10; $i++) {
            $faq = new Faq();

            $faq->setQuestion($faker->paragraph())
                ->setAnswer($faker->paragraph());

            $manager->persist($faq);
        }
        // for contactUs
        for ($i = 1; $i <= 10; $i++) {
            $contact = new Contact();

            $contact->setFirstname($faker->word())
                    ->setLastname($faker->word())
                    ->setEmail($faker->email())
                    ->setPhone('0644444444')
                    ->setContent($faker->paragraph());

                    $manager->persist($contact);
        }
        // for User
        $admin = new User();
        $admin->setEmail('plop@plop.com')
              ->setRoles(['ROLE_ADMIN'])
              ->setFirstname($faker->word())
              ->setLastname($faker->word())
              ->setAddress($faker->streetAddress())
              ->setPhone('0644444444')
              ->setCivility('Madame')
              ->setZipCode($faker->postcode())
              ->setCountry('France')
              ->setBirthday($faker->dateTimeBetween('-30 years'))
              ->setIsActivated(1)
              ->setPassword(
                  $this->passwordEncoder->encodePassword(
                      $admin,
                      'plopplop',
                  )
              );
        $manager->persist($admin);

        for ($i = 1; $i <= 10; $i++) {
            $user = new User();

            $user->setEmail($faker->email())
                 ->setRoles(['ROLE_USER'])
                 ->setFirstname($faker->word())
                 ->setLastname($faker->word())
                 ->setAddress($faker->streetAddress())
                 ->setPhone('0644444444')
                 ->setCivility('Madame')
                 ->setZipCode($faker->postcode())
                 ->setCountry('France')
                 ->setBirthday($faker->dateTimeBetween('-30 years'))
                 ->setIsActivated(1)
                 ->setPassword(
                     $this->passwordEncoder->encodePassword(
                         $user,
                         $faker->word(),
                     )
                 );
            $manager->persist($user);
        }

        // for home
        $home = new Home();
        // for Home ( need one only)
        $home->setVideo('https://www.zupimages.net/up/20/51/qozr.jpg')
        ->setTitle('Vos permis plaisance dès 16 ans !')
        ->setContent("En effet, je vous propose le permis côtier et le permis fluvial. 
        Les inscriptions et les séances théoriques se déroulent au sein de l'Ecole de Conduite Pilote de Ponthierry où Marine (quel beau prénom pour ma secrétaire !!) sera ravie de vous accueillir !
        
        Afin de s'adapter au mieux à vos emplois du temps, les cours se déroulent le soir toute l'année!
        Le bateau, un Merry Fisher 625, est amarré à la base de loisirs de Seine Ecole, où je vous formerai à la pratique et aux bons réflexes du Capitaine.")
        ->setQuote("Plus qu'un permis... Une Formation ! ");
        $manager->persist($home);
        // for icon ( need 1 min by home)
        $fontIcon = ['fas fa-anchor', 'fas fa-water', 'fas fa-user-friends'];
        $textIcon = ['Former vous à la navigation', 'Prenons le large ensemble', 'Un accompagnement personnalisé'];
        for ($i = 1; $i <= 3; $i++) {
            $icon = new Icon();
            $icon->setFontAwesome($fontIcon[$i - 1])
            ->setName($textIcon[$i - 1])
            ->setHome($home);
            $manager->persist($icon);
        }

        // for infoContact (need 1 only)
        $infoContact = new InfoContact();
        $infoContact->setPhone('01 60 65 69 80')
                    ->setMail('auto.ecole.pilote@orange.fr')
                    ->setAddress('68 Avenue de Fontainebleau,
                    77310 | Saint Fargeau Ponthierry');
        $manager->persist($infoContact);

        $manager->flush();
    }
}
