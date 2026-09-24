<?php

namespace App\Command;

use App\Repository\HomepageRepository;
use App\Repository\ProductOfferRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'app:homepage:refresh-2026', description: 'Appliquer les textes BRASSAIR de septembre 2026')]
class RefreshHomepage2026Command extends Command
{
    public function __construct(private HomepageRepository $pages, private EntityManagerInterface $em, private ProductOfferRepository $offers)
    {
        parent::__construct();
    }
    protected function configure(): void
    {
        $this->addOption('apply', null, InputOption::VALUE_NONE, 'Enregistrer les modifications');
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $page = $this->pages->findAll()[0] ?? null;
        if (!$page) {
            $output->writeln('Aucune page accueil : créez-la dans l’administration.');
            return Command::FAILURE;
        }
        if (!$input->getOption('apply')) {
            $output->writeln('Simulation : mise à jour de l’accueil et transformation de la dernière offre en actualité, sans changer son URL. Utiliser --apply après sauvegarde de la base.');
            return Command::SUCCESS;
        }
        $page->setHero1('BRASS’AIR, spécialiste du brassage d’air professionnel');
        $page->setHero1Part2('à La Réunion');
        $page->setHero2('Ancrée à La Réunion, BRASS’AIR déploie ses solutions de ventilation et de brassage d’air professionnel dans tout l’Océan Indien.');
        $page->setMainImage('images/homepage/mygym-saint-benoit.jpg');
        $page->setTitleSection2Big('NOS SOLUTIONS DE VENTILATION');
        $page->setTitleSection2Small('Des solutions adaptées à vos bâtiments et à vos activités');
        $page->setTitleSection3('NOS RÉALISATIONS');
        $page->setAboutText1('BRASS’AIR accompagne les professionnels dans leurs projets de ventilation et de brassage d’air à La Réunion et dans l’Océan Indien.

Distributeur des solutions EVEL, BRASS’AIR intervient dans l’étude, le dimensionnement et la fourniture de solutions adaptées aux grands volumes professionnels.');
        $page->setAboutText2('Industrie, logistique, commerces, équipements sportifs, bâtiments d’élevage ou espaces recevant du public : chaque projet est étudié en fonction du bâtiment, de son usage et de ses contraintes techniques.

BRASS’AIR accompagne également les électriciens, architectes et bureaux d’études dans l’intégration des solutions EVEL à leurs projets.');
        $news = $this->offers->findBy([], ['id' => 'DESC'], 1)[0] ?? null;
        if ($news) {
            if (!method_exists($news, 'setTitle')) {
                $output->writeln('ProductOffer incompatible : méthode setTitle absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            if (!method_exists($news, 'setDescription')) {
                $output->writeln('ProductOffer incompatible : méthode setDescription absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            if (!method_exists($news, 'setMessage1')) {
                $output->writeln('ProductOffer incompatible : méthode setMessage1 absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            if (!method_exists($news, 'setMessage2')) {
                $output->writeln('ProductOffer incompatible : méthode setMessage2 absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            if (!method_exists($news, 'setMessage3')) {
                $output->writeln('ProductOffer incompatible : méthode setMessage3 absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            if (!method_exists($news, 'setImage1')) {
                $output->writeln('ProductOffer incompatible : méthode setImage1 absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            if (!method_exists($news, 'setImage2')) {
                $output->writeln('ProductOffer incompatible : méthode setImage2 absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            if (!method_exists($news, 'setImage3')) {
                $output->writeln('ProductOffer incompatible : méthode setImage3 absente. Aucune écriture effectuée.');
                return Command::FAILURE;
            }
            $news->setTitle('Actualités BRASS’AIR');
            $news->setDescription('Retrouvez nos réalisations à La Réunion et nos informations sur la ventilation et le brassage d’air professionnel.');
            $news->setMessage1('MYGYM Saint-Benoît : une installation BRASS’AIR en salle de sport.');
            $news->setMessage2('BRASS’AIR accompagne les projets professionnels à La Réunion et dans l’Océan Indien.');
            $news->setMessage3('Vous avez un projet ? Contactez-nous pour demander une étude.');
            $news->setImage1('/images/homepage/mygym-saint-benoit.jpg');
            $news->setImage2('/images/produits/4-0m-egl-ass-de-dieu-st-benoit-overlay-30-66bb0605f1f26088266479.jpg');
            $news->setImage3('/images/produits/5-0m-cineplaza-st-denis-5-66baeba614d80902021457.jpg');
        }
        $this->em->flush();
        $output->writeln('Accueil mis à jour.');
        return Command::SUCCESS;
    }
}
