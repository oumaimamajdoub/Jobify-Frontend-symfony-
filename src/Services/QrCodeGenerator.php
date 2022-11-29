<?php

namespace App\Service\QrCodeGenerator;

use App\Entity\Evenement;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeGenerator
{

    public function __construct()
    {

    }


    public function generate(Evenement $event)
    {

        $string = "Nom Evenement:" . $event->getNom() . "\n Nombre de participant:" . $event->getParnumb() . "\n Date: " . $event->getDateDebut()->format('Y-/m/d ') . "\n Organisateur" . $event->getOrganisateur() . "\n Lieu: " . $event->getLieu();
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($string)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText('QR code to event')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();
        $result->saveToFile(__DIR__ . '\\..\\..\\public\\images\\qrcode' . $event->getId() . '.png');
        $dataUri = $result->getDataUri();
    }
}